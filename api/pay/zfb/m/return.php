<?php
/**
 * 作用：支付宝免签-手机支付
 * 官网：Http://www.sdcms.cn
 * 作者：IT平民
 * ===========================================================================
 * 这不是一个自由软件！您只能在不用于商业目的的前提下对程序代码进行修改和使用；
 * 未经授权不允许对程序代码以任何形式任何目的的再发布。
 * ===========================================================================
**/

#加载核心文件
require '../../api.php';
require '../zfb.php';

unset($_GET['m']);
unset($_GET['c']);
unset($_GET['a']);
if(PAY_LOG)
{
	savefile('zfb_return.txt',jsencode($_GET));
}
$pay=new zfb();
$res=$pay->verify(jsdecode(jsencode($_GET)));
if($res)
{
	#商户订单号
	$orderid=F('get.order_no');

	#支付宝交易号
	$trade_no=F('get.trade_no');

	#业务处理
	$url=$pay->backurl($db,$orderid);
	$url=str_replace('/api/pay/zfb/m','',$url);

	#业务处理
	$pay->payback($db,$orderid,$trade_no,'支付宝免签(Mobile)');

	echo "<script>location.href='".$url."';</script>";
}
else
{
	echo '验证失败(可能是AppKey错误)';
}