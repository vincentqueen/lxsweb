<?php
/**
 * 作用：获取会员字段的值
 * 官网：Https://www.sdcms.cn
 * 作者：IT平民
 * ===========================================================================
 * 这不是一个自由软件！您只能在不用于商业目的的前提下对程序代码进行修改和使用；
 * 未经授权不允许对程序代码以任何形式任何目的的再发布。
 * ===========================================================================
**/

if(!defined('IN_SDCMS')) exit;

$ukey=enhtml(F('ukey'));
$field=enhtml(F('field'));
#2.1版本改动
if($field=='')
{
	$field="uemail";
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

$rs=$this->db->row("select $field from sd_user where id=$userid limit 1");
if($rs)
{
	self::success($rs[$field]);
}
else
{
	self::error("会员ID错误");
}