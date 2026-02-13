<?php
/**
 * 作用：微信H5支付
 * 官网：Http://www.sdcms.cn
 * 作者：IT平民
 * ===========================================================================
 * 这不是一个自由软件！您只能在不用于商业目的的前提下对程序代码进行修改和使用；
 * 未经授权不允许对程序代码以任何形式任何目的的再发布。
 * ===========================================================================
**/

#加载核心文件
require '../../api.php';
require '../wxpay.php';

$pay=new wxpay($db);
$data=isset($GLOBALS['HTTP_RAW_POST_DATA'])?$GLOBALS['HTTP_RAW_POST_DATA']:file_get_contents("php://input");
if(!empty($data))
{
	#写日志
	if(PAY_LOG)
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
		$pay->payback($db,$orderid,$trade_no,'微信(H5)');
		
		$pay->setxml(1);
	}
	else
	{
		$pay->setxml(0);
	}
}