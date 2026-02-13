<?php
/**
 * 作用：微信免签-公众号支付
 * 官网：Http://www.sdcms.cn
 * 作者：IT平民
 * ===========================================================================
 * 这不是一个自由软件！您只能在不用于商业目的的前提下对程序代码进行修改和使用；
 * 未经授权不允许对程序代码以任何形式任何目的的再发布。
 * ===========================================================================
**/

#加载核心文件
require '../../api.php';
require '../weixin.php';

if(PAY_LOG)
{
	savefile('weixin_notify.txt',jsencode($_POST));
}
$pay=new weixin();
$res=$pay->verify(jsdecode(jsencode($_POST)));
if($res)
{
	#商户订单号
	$out_trade_no=F('post.order_no');
	list($orderid)=explode("_",$out_trade_no);

	#微信交易号
	$trade_no=F('post.trade_no');

	#业务处理	
	$pay->payback($db,$orderid,$trade_no,'微信免签(公众号支付)');
	echo 'success';
}
else
{
	echo 'fail';
}