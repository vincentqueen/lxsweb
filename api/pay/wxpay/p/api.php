<?php
/**
 * 作用：微信扫码支付
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

$orderid=enhtml(F('orderid'));
$type=getint(F('type'),0);
switch($type) 
{
	case '1':
		$field="paymoney";
		$table="sd_user_pay";
		break;
	case '2':
		$field="pro_price";
		$table="sd_order";
		break;
	case "3":
		$field="paymoney";
		$table="sd_order_buy";
		break;
	default:
		exit('订单来源错误');
		break;
}

$total=$db->count("select count(1) from sd_onlinepay where orderid='$orderid' and paytype=$type");
#新订单号
$norderid=$orderid.($total+100);

$rs=$db->row("select $field from $table where orderid='$orderid' and ispay=0 limit 1");
if(!$rs)
{
	exit('订单号错误：'.$orderid);
}

$money=$rs[$field];

#写入付款记录表
$db->add('sd_onlinepay',['orderid'=>$orderid,'pay_no'=>$norderid,'paymoney'=>$money,'paytype'=>$type,'payway'=>'微信(扫码)','createdate'=>time()]);

$body="订单号：$norderid";

$data=[];
$data['out_trade_no']=$norderid;
$data['total_fee']=$money*100;
$data['body']=$body;
$data['product_id']=$norderid;
$data['trade_type']='NATIVE';

$pay=new wxpay($db);
$pay->create_sign($data);
$result=$pay->xml();

#根据返回结果处理
libxml_disable_entity_loader(true);
$data=simplexml_load_string($result,'SimpleXMLElement',LIBXML_NOCDATA);

$arr=['state'=>'error','msg'=>'error'];
if($data->result_code=='SUCCESS')
{
	$arr['state']='success';
	$arr['msg']=(string)$data->code_url;
}
else
{
	$arr['msg']=(!isempty($data->err_code_des))?$data->err_code_des:$data->return_msg;
	$arr['msg']=(string)$arr['msg'];
}
echo jsencode($arr);