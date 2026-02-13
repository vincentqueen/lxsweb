<?php
/**
 * 作用：订单提交
 * 官网：Https://www.sdcms.cn
 * 作者：IT平民
 * ===========================================================================
 * 这不是一个自由软件！您只能在不用于商业目的的前提下对程序代码进行修改和使用；
 * 未经授权不允许对程序代码以任何形式任何目的的再发布。
 * ===========================================================================
**/

if(!defined('IN_SDCMS')) exit;

$id=getint(F("id"),0);
$name=F('name');
$mobile=F('mobile');
$pronum=getint(F('pronum'),0);
$address=F('address');
$remark=F('remark');
$postip=getip();

$userid=0;

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
$userid=$rc['userid'];
if(C('web_order_login')==1)
{
	if($userid<=0)
	{
		self::error('请先登录');
		return;
	}
}
#获取IP用户上次提交时间
$rs=$this->db->row("select createdate from sd_order where postip='$postip' and userid=$userid order by id desc limit 1");
if($rs)
{
	#默认1分钟
	if((time()-$rs['createdate'])/60<1)
	{
		self::error('提交太频繁');
		return;
	}
}
$rs=$this->db->row("select title,price from sd_model_pro left join sd_content on sd_model_pro.cid=sd_content.id where islock=1 and id=$id limit 1");
if(!$rs)
{
	self::error('参数错误');
}
else
{
	$proname=enhtml($rs['title']);
	$price=$rs['price'];
	$data=[[$name,'null','姓名不能为空'],[$mobile,'mobile','手机号码不正确'],[$pronum,'int','订购数量不能为空'],[($pronum!=0),'other','订购数量不能为空'],[$address,'null','收货地址不能为空']];
	$v=new sdcms_verify($data);
	if($v->result())
	{
		$orderid=date('YmdHis').mt_rand(0,9);
		$d['pro_name']=$proname;
		$d['pro_num']=getint(F('pronum'),0);
		$d['pro_price']=getint(F('pronum'),0)*$price;
		$d['orderid']=$orderid;
		$d['truename']=$name;
		$d['mobile']=$mobile;
		$d['address']=$address;
		$d['remark']=$remark;
		$d['ispay']=0;
		$d['isover']=0;
		$d['createdate']=time();
		$d['postip']=$postip;
		$d['userid']=$userid;
		$this->db->add('sd_order',$d);
		self::success($orderid);
		
		#处理邮件
		if(!isempty(C('mail_admin')))
		{
			#获取邮件模板
			$mail=mail_temp(0,'order',$this->db);
			if(count($mail)>0)
			{
				$title=$mail['mail_title'];
				$title=str_replace('$webname',C('web_name'),$title);
				$title=str_replace('$weburl',WEB_URL,$title);
				$content=$mail['mail_content'];
				$content=str_replace('$webname',C('web_name'),$content);
				$content=str_replace('$weburl',WEB_URL,$content);
				$content=str_replace('$orderid',$orderid,$content);
				$content=str_replace('$proname',$proname,$content);
				$content=str_replace('$num',$pronum,$content);
				$content=str_replace('$money',$pronum*$price,$content);
				$content=str_replace('$name',$name,$content);
				$content=str_replace('$mobile',$mobile,$content);
				$content=str_replace('$address',$address,$content);
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
}