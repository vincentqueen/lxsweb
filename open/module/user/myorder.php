<?php
/**
 * 作用：我的订单
 * 官网：Https://www.sdcms.cn
 * 作者：IT平民
 * ===========================================================================
 * 这不是一个自由软件！您只能在不用于商业目的的前提下对程序代码进行修改和使用；
 * 未经授权不允许对程序代码以任何形式任何目的的再发布。
 * ===========================================================================
**/

if(!defined('IN_SDCMS')) exit;

$ukey=enhtml(F('ukey'));
$type=getint(F('type'),0);
#每页数量
$pagesize=getint(F('pagesize'),10);
if($pagesize<=0)
{
	$pagesize=10;
}

if($ukey=='')
{
	self::error('参数来源错误');
	return;
}
$rc=$this->db->row("select userid from sd_user_login where loginkey='$ukey' limit 1");
if(!$rc)
{
	self::error('ukey来源错误');
	return;
}
if($rc['userid']<=0)
{
	self::error('ukey错误');
	return;
}
$userid=$rc['userid'];

$where="userid=$userid";
switch($type)
{
	case '1':
		$where.=" and ispay=1";
		break;
	case '2':
		$where.=" and ispay=0";
		break;
}

$table='sd_order';
$join="";

#当前页数，默认第一页
$page=getint(F('page'),1);

#获取总数量
$total_rs=$this->db->count("select count(1) from $table $join where $where");
$totalpage=ceil($total_rs/$pagesize);
if($page>$totalpage)
{
    $page=1;
}
$offset=($page-1)*$pagesize;
$way=0;
if($offset>1000 && $total_rs>2000 && $offset>$total_rs/2)
{
    $offset=$total_rs-$offset-$pagesize;
    $way=1;
}
if($offset<0)
{
	$pagesize+=$offset;
	$offset=0;
}
$key_="id";
$table_=$table;
$join_="$join";
$where_="where $where";
$group_="";
$order_="order by id desc";
$field_="*";
$keylist=$this->db->getkeylist($key_,$table_,$join_,$where_,$order_,$offset,$pagesize,$way);
$array_rs=$this->db->load("select $field_ from $table_ $join_ $group_ $keylist $order_");

$db=[];
$db['totalnum']=count($array_rs);
$db['totalpage']=$totalpage;
$db['lists']=$array_rs;
self::success($db);