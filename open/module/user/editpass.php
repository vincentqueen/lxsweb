<?php
/**
 * 作用：修改密码
 * 官网：Https://www.sdcms.cn
 * 作者：IT平民
 * ===========================================================================
 * 这不是一个自由软件！您只能在不用于商业目的的前提下对程序代码进行修改和使用；
 * 未经授权不允许对程序代码以任何形式任何目的的再发布。
 * ===========================================================================
**/

if(!defined('IN_SDCMS')) exit;

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

$rs=$this->db->row("select upass from sd_user where id=$userid limit 1");
if($rs)
{
	$oldpass=F('oldpass');
	$newpass=F('newpass');
	$repass=F('repass');
	$data=[[$oldpass,'null','原密码不能为空'],[md5($oldpass)==$rs['upass'],'other','原密码错误'],[$newpass,'null','新密码不能为空'],[$newpass,'password','新密码为5-16位字符'],[F('repass'),'null','确认密码不能为空'],[$newpass==$repass,'other','两次密码不一致']];
	$v=new sdcms_verify($data);
	if($v->result())
	{
		$this->db->update("sd_user","id=$userid",['upass'=>md5($newpass)]);
		self::success('密码修改成功');
	}
	else
	{
		self::error($v->msg);
	}
}
else
{
	self::error("会员ID错误");
}