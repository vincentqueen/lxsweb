<?php
/**
 * 作用：订单余额支付
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
$orderid=F("orderid");
$rs=$this->db->row("select pro_price,ispay from sd_order where orderid='$orderid' limit 1");
if(!$rs)
{
	$this->error("订单编号错误");
	return;
}
else
{
	$price=$rs['pro_price'];
	if($rs['ispay']==1)
	{
		$this->error("订单已付款");
		return;
	}
}
if($price<=0)
{
	$this->error("价格错误");
	return;
}

if($oldmoney<$price)
{
	self::error("余额不足，无法支付！");
	return;
}
$umoney=$oldmoney-$price;
#扣除
$this->db->update("sd_user","id=$userid",['umoney'=>$umoney]);
#写财务记录
$this->db->add("sd_user_money",['types'=>2,'title'=>'订单付款（订单号：'.$orderid.'）','userid'=>$userid,'amount'=>$price,'oldmoney'=>$oldmoney,'newmoney'=>$umoney,'createdate'=>time()]);
#更新付款状态
$this->db->update("sd_order","orderid='".$orderid."'",['ispay'=>1,'payway'=>'余额支付']);
self::success('付款成功');