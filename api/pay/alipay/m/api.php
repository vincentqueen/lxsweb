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

if(isweixin())
{
	$html=<<<EOF
<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="renderer" content="webkit">
<meta name="viewport" content="width=device-width,initial-scale=1,maximum-scale=1,shrink-to-fit=no">
<title>在线支付</title>
</head>

<body>
<div style="position:fixed;background:rgba(51,51,51,.7) url(../images/open.png) no-repeat top right;background-size:100%;top:0;bottom:0;left:0;right:0;z-index:999;"></div>
</body>
</html>
EOF;
	echo $html;
	exit;
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
$db->add('sd_onlinepay',['orderid'=>$orderid,'pay_no'=>$norderid,'paymoney'=>$money,'paytype'=>$type,'payway'=>'支付宝(Mobile)','createdate'=>time()]);

$subject="订单号：$norderid";
$body='订单支付';

$data=[];
$data['out_trade_no']=$norderid;
$data['product_code']='QUICK_WAP_WAY';
$data['total_amount']=$money;
$data['subject']=$subject;
$data['body']=$body;

$pay=new alipay($db);
$pay->create_sign($data,2);
$pay->form();