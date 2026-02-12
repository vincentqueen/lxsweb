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
require 'dypay.php';

$db=new sdcms_db(C('DEFAULT_DB'));
$pay=new dypay($db);

$data=isset($GLOBALS['HTTP_RAW_POST_DATA'])?$GLOBALS['HTTP_RAW_POST_DATA']:file_get_contents("php://input");

if(!isempty($data) && C('pay_douyin_open')==1)
{
	#写日志
	if(C('pay_debug')==1)
	{
		file_put_contents('notify-'.date('Y-m-d H:i:s').'.txt',$data);
	}
	
	#签名验证
	if($pay->verify($data))
	{
		$data=jsdecode($data);
		$rs=jsdecode($data['msg']);
		$orderid=$rs['cp_orderno'];
		$trade_no=$rs['payment_order_no'];

		#业务处理
		$paymoney=$pay->payback($db,$orderid,$trade_no,'抖音支付(小程序)');

		$msg=['err_no'=>'0','err_tips'=>'success'];
		echo jsencode($msg);
	}
	else
	{
		$msg=['err_no'=>'1','err_tips'=>'fail'];
		echo jsencode($msg);
	}
	
}