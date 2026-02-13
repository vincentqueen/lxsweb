<?php
/**
 * 作用：留言提交
 * 官网：Https://www.sdcms.cn
 * 作者：IT平民
 * ===========================================================================
 * 这不是一个自由软件！您只能在不用于商业目的的前提下对程序代码进行修改和使用；
 * 未经授权不允许对程序代码以任何形式任何目的的再发布。
 * ===========================================================================
**/

if(!defined('IN_SDCMS')) exit;

$name=F('name');
$mobile=F('mobile');
$tel=F('tel');
$remark=F('remark');
$postip=getip();
#获取IP用户上次提交时间
$rs=$this->db->row("select createdate from sd_inquiry where postip='$postip' order by id desc limit 1");
if($rs)
{
	#默认1分钟
	if((time()-$rs['createdate'])/60<1)
	{
		self::error('提交太频繁');
		return;
	}
}
$data=[[$name,'null','姓名不能为空'],[$mobile,'null','手机不能为空'],[$mobile,'mobile','手机号码不正确'],[$remark,'null','留言内容不能为空']];
$v=new sdcms_verify($data);
if($v->result())
{
	$d=[];
	$d['truename']=$name;
	$d['mobile']=$mobile;
	$d['tel']=$tel;
	$d['remark']=$remark;
	$d['islock']=0;
	$d['ontop']=0;
	$d['reply']='';
	$d['postip']=$postip;
	$d['createdate']=time();
	$this->db->add('sd_book',$d);
	self::success('提交成功');
	#发邮件
	if(!isempty(C('mail_admin')))
	{
		#获取邮件模板
		$mail=mail_temp(0,'book',$this->db);
		if(count($mail)>0)
		{
			$title=$mail['mail_title'];
			$title=str_replace('$webname',C('web_name'),$title);
			$title=str_replace('$weburl',WEB_URL,$title);
			$content=$mail['mail_content'];
			$content=str_replace('$webname',C('web_name'),$content);
			$content=str_replace('$weburl',WEB_URL,$content);
			$content=str_replace('$name',$name,$content);
			$content=str_replace('$mobile',$mobile,$content);
			$content=str_replace('$tel',$tel,$content);
			$content=str_replace('$remark',$remark,$content);
			#发邮件
			send_mail(C('mail_admin'),$title,$content);
		}
	}
}
else
{
	self::error($v->msg);
}