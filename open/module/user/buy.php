<?php
/**
 * 作用：购买文章
 * 官网：Https://www.sdcms.cn
 * 作者：IT平民
 * ===========================================================================
 * 这不是一个自由软件！您只能在不用于商业目的的前提下对程序代码进行修改和使用；
 * 未经授权不允许对程序代码以任何形式任何目的的再发布。
 * ===========================================================================
**/

if(!defined('IN_SDCMS')) exit;

#B的值

$ukey=enhtml(F('ukey'));
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

$rs=$this->db->row("select umoney from sd_user where id=$userid limit 1");
if(!$rs)
{
	self::error("会员ID错误");
	return;
}
$oldmoney=$rs['umoney'];
$id=getint(F("id"),0);
$rs=$this->db->row("select price from sd_model_news where cid=$id limit 1");
if(!$rs)
{
	self::error("ID错误");
	return;
}
$price=$rs['price'];
#检查是否购买过
$rs=$this->db->row("select aid from sd_user_buy where cid=$id and userid=$userid limit 1");
if($rs)
{
	self::success("购买成功");
	return;
}
if($oldmoney<$price)
{
	self::error("余额不足！");
	return;
}
$umoney=$oldmoney-$price;
#扣除
$this->db->update("sd_user","id=$userid",['umoney'=>$umoney]);
#写财务记录
$this->db->add("sd_user_money",['types'=>2,'title'=>'购买内容，ID：'.$id.'','userid'=>$userid,'amount'=>$price,'oldmoney'=>$oldmoney,'newmoney'=>$umoney,'createdate'=>time()]);
#写购买记录
$this->db->add("sd_user_buy",['cid'=>$id,'userid'=>$userid,'createdate'=>time()]);
self::success('购买成功');