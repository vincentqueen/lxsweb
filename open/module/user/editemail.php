<?php
/**
 * 作用：修改邮箱
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

$rs=$this->db->row("select uemail from sd_user where id=$userid limit 1");
if($rs)
{
	$email=F('email');
	$oldemail=$rs['uemail'];
	$data=[[$email,'null','邮箱不能为空'],[$email,'email','邮箱格式错误']];
	$v=new sdcms_verify($data);
	if($v->result())
	{
		$where='';
		if($oldemail!='')
		{
			$where=" and id<>$userid";
		}
		$ro=$this->db->row("select uemail from sd_user where uemail='$email' $where limit 1");
		if($ro)
		{
			self::error('邮箱已存在，请更换');
			return;
		}
		$this->db->update("sd_user","id=$userid",['uemail'=>$email]);
		self::success('修改成功');
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