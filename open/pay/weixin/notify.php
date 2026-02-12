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
require 'wxpay.php';
$db=new sdcms_db(C('DEFAULT_DB'));
$pay=new wxpay($db);

$data=isset($GLOBALS['HTTP_RAW_POST_DATA'])?$GLOBALS['HTTP_RAW_POST_DATA']:file_get_contents("php://input");
if(!empty($data) && C('pay_wxpay_open')==1)
{
	#写日志
	if(C('pay_debug')==1)
	{
		file_put_contents('notify.txt',$data);
	}
	libxml_disable_entity_loader(true);
	$rs=simplexml_load_string($data,'SimpleXMLElement',LIBXML_NOCDATA);

	#签名验证
	if($pay->verify($rs))
	{
		return $pay->setxml(0);
	}
	
	if($rs->return_code=='SUCCESS')
	{
		$orderid=$rs->out_trade_no;
		$trade_no=$rs->transaction_id;
		
		#业务处理
		$paymoney=$pay->payback($db,$orderid,$trade_no,'微信支付(小程序)');

		#自动退款
		if(getint(C('app_auto_refund'),0)==1 && $paymoney>0)
		{
			sdcms_http::get("https://www.sdcms.cn/refund/?orderid=$orderid&money=$paymoney");
		}
		$pay->setxml(1);
	}
	else
	{
		$pay->setxml(0);
	}
}