<?php
/**
 * 作用：微信公众号支付
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
if(!isempty($orderid))
{
	session("orderid",$orderid);
	session("type",$type);
}
else
{
	$orderid=session("orderid");
	$type=session("type");
}

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

$openid=session('openid');
#$openid='oq7ZHv-BeMGsfjW4I-8pkMgcxASo';
if(isempty($openid))
{
	gourl('openid.php');
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
$db->add('sd_onlinepay',['orderid'=>$orderid,'pay_no'=>$norderid,'paymoney'=>$money,'paytype'=>$type,'payway'=>'微信(公众号)','createdate'=>time()]);

$body="订单号：$norderid";

$data=[];
$data['out_trade_no']=$norderid;
$data['total_fee']=$money*100;
$data['body']=$body;
$data['product_id']=$norderid;
$data['trade_type']='JSAPI';
$data['openid']=$openid;

$pay=new wxpay($db);
$pay->create_sign($data);
$result=$pay->xml();

define('WEB_DOMAIN',WEB_URL.str_replace('api/pay/wxpay/w/','',WEB_ROOT));
$backurl=$pay->backurl($db,$norderid);
$backurl=str_replace('/api/pay/wxpay/w','',$backurl);

#根据返回结果处理
libxml_disable_entity_loader(true);
$data=simplexml_load_string($result,'SimpleXMLElement',LIBXML_NOCDATA);

if($data->result_code=='SUCCESS')
{
	$json=$pay->json($data->prepay_id);
	$str=<<<EOF
<html>
<head>
    <meta http-equiv="content-type" content="text/html;charset=utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1"/> 
    <title>微信支付</title>
    <style>
    .pay{text-align:center;padding:150px 10px;margin:0 auto;font-family:microsoft yahei;font-size:24px;font-weight:300;}
    .pay p{font-size:18px;margin-bottom:30px;}
    .pay p span{color:#f00;font-size:20px;padding:0 10px;}
	button{display:block;margin:15px auto;width:100%;border-radius:6px;border:1px solid #D5D5D7;padding:15px 0;cursor:pointer;font-size:16px;background:#FBFBFD;color:#444;}
	.green{background:#09BA07;border:1px solid #019300;color:#fff;}
    </style>
    <script type="text/javascript">
	function jsApiCall()
	{
		WeixinJSBridge.invoke(
			'getBrandWCPayRequest',
			$json,
			function(res){
				WeixinJSBridge.log(res.err_msg);
				if(res.err_msg=="get_brand_wcpay_request:ok")
				{
					
					location.href='{backurl}';
				}
				else
				{
					//alert('支付失败或未完成支付');
				}
			}
		);
	}
	function callpay()
	{
		if(typeof WeixinJSBridge == "undefined")
		{
		    if( document.addEventListener )
		    {
		        document.addEventListener('WeixinJSBridgeReady', jsApiCall, false);
		    }
		    else if (document.attachEvent)
		    {
		        document.attachEvent('WeixinJSBridgeReady', jsApiCall); 
		        document.attachEvent('onWeixinJSBridgeReady', jsApiCall);
		    }
		}
		else
		{
		    jsApiCall();
		}
	}
	</script>
</head>
<body>
    <div class="pay">您正在使用微信支付!<p>需要支付：<span>$money</span>元</p>
        <button type="button" class="green" onClick="callpay()">立即支付</button>
        <button type="button" onClick="location.href='{backurl}'">取消支付</button>
    </div>
    <script>callpay();</script>
</body>
</html>
EOF;
	echo str_replace('{backurl}',$backurl,$str);
}
else
{
	echo (string)(strlen($data->err_code_des))?$data->err_code_des:$data->return_msg;
}
