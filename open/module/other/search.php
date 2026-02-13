<?php
/**
 * 作用：商品搜索
 * 官网：Https://www.sdcms.cn
 * 作者：IT平民
 * ===========================================================================
 * 这不是一个自由软件！您只能在不用于商业目的的前提下对程序代码进行修改和使用；
 * 未经授权不允许对程序代码以任何形式任何目的的再发布。
 * ===========================================================================
**/

if(!defined('IN_SDCMS')) exit;

$keyword=isset($_POST['keyword'])?rawurldecode(trim($_POST['keyword'])):'';
if(isempty($keyword))
{
	self::error('关键字不能为空');
	return;
}
else
{
	$encode=mb_detect_encoding($keyword,['UTF-8','GBK','GB2312']);
	if($encode!='UTF-8')
	{
		$keyword=mb_convert_encoding($keyword,'utf-8',$encode);   
	}
	$keyword=enhtml($keyword);
}

#每页数量
$pagesize=getint(F('pagesize'),10);
if($pagesize<=0)
{
	$pagesize=10;
}

$where="islock=1 and title like '%$keyword%'";
$table='sd_model_pro';
$join="left join sd_content on sd_model_pro.cid=sd_content.id";

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
foreach($array_rs as $rs=>$val)
{
	if($val['ispic']==1)
	{
		if(!strpos($val['pic'],"://") && !isempty($val['pic']))
		{
			$val['pic']=$this->url.$val['pic'];
		}
	}
	$val['catename']=get_catename($val['classid']);
	$array_rs[$rs]=$val;
}
$db=[];
$db['totalnum']=count($array_rs);
$db['totalpage']=$totalpage;
$db['lists']=$array_rs;
self::success($db);