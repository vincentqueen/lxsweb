<?php
/**
 * 作用：接口文件
 * 官网：Http://www.sdcms.cn
 * 作者：IT平民
 * ===========================================================================
 * 这不是一个自由软件！您只能在不用于商业目的的前提下对程序代码进行修改和使用；
 * 未经授权不允许对程序代码以任何形式任何目的的再发布。
 * ===========================================================================
**/

#加载核心文件
require '../../api.php';
require 'bdpay.php';
$db=new sdcms_db(C('DEFAULT_DB'));
$pay=new bdpay($db);

$data=$_POST;

if(!empty($data) && C('pay_baidu_open')==1)
{
	#写日志
	if(C('pay_debug')==1)
	{
		file_put_contents('notify.txt',var_export($data,true));
	}
	$status=$data['status'];
	#签名验证
	if($pay->verify($data) && getint($status,0)==2)
	{
		$orderid=$data['tpOrderId'];
		$trade_no=$data['orderId'];
		$userid=$data['userId'];

		#业务处理
		$paymoney=$pay->payback($db,$orderid,$trade_no,'百度支付(小程序)');

		echo '{"errno":0,"msg":"success","data":{"isConsumed":2}}';

		#自动退款
		if(getint(C('app_auto_refund'),0)==1 && $paymoney>0)
		{
			$pay->refund($trade_no,$userid,$orderid);
		}
	}
	else
	{
		echo '{"errno":0,"msg":"success","data":{"isErrorOrder":1,"isConsumed":2}';
	}
}