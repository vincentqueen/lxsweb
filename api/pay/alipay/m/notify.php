<?php
/**
 * 作用：支付宝手机网站支付
 * 官网：Http://www.sdcms.cn
 * 作者：IT平民
 * ===========================================================================
 * 这不是一个自由软件！您只能在不用于商业目的的前提下对程序代码进行修改和使用；
 * 未经授权不允许对程序代码以任何形式任何目的的再发布。
 * ===========================================================================
**/

#加载核心文件
require '../../api.php';
require '../alipay.php';

$arr=$_POST;
#写日志
if(PAY_LOG)
{
	file_put_contents('notify.txt',var_export($arr,true));
}
$pay=new alipay($db);
$result=$pay->verify($arr);
if($result)
{
	#商户订单号
	$out_trade_no=F('out_trade_no');

	#支付宝交易号
	$trade_no=F('trade_no');

	#交易状态
	$trade_status=F('trade_status');

	if($trade_status=='TRADE_FINISHED' || $trade_status=='TRADE_SUCCESS')
	{
		#业务处理
		$pay->payback($db,$out_trade_no,$trade_no,'支付宝(Mobile)');
	}
	echo 'success';
}
else
{
	echo 'fail';
}