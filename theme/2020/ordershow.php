<?php if(!defined('IN_SDCMS')) exit;?>
{php $self_name='订单详情'}
{php $self_ename='order details'}
{php $position=[['name'=>$self_name,'url'=>THIS_LOCAL]]}
{include file="include/top.php"}
<title>{$self_name}_{sdcms[web_name]}</title>
<meta name="keywords" content="{sdcms[seo_key]}">
<meta name="description" content="{sdcms[seo_desc]}">
</head>

<body>
	{include file="include/head.php"}
	{include file="include/banner_inner.php"}

	<div class="container">
		<div class="width ui-row">
			<div class="container-left">
				<div class="ui-fixed-s" data-parent=".container">
					{include file="include/left_nav.php"}
				</div>
			</div>
			
			<div class="container-right">
			
				<div class="ui-box">
					<div class="ui-box-h2">{$self_name}</div>
					<div class="ui-box-body">
						<!--begin-->
						<div class="order-base">
							<div class="order-base-left">
								<h1><i class="ui-icon-check-circle"></i>{if $ispay==0}订单提交成功{else}订单付款成功{/if}</h1>
								<p><span>订单号：</span>{$orderid}</p>
							</div>
							<div class="order-base-right">
								订单金额：<em>{$pro_price}</em> 元
							</div>
						</div>
						
						<div class="order-goods">
							<div class="ui-collapse-menu-title active" data-type="1">
								<a href="javascript:;"><span class="ui-icon-square"></span>订单明细</a><i class="ui-icon-right"></i>
							</div>
							<div class="ui-collapse-menu-body show">
								<ul>
									<li><span>产品：</span>{$pro_name}</li>
									<li><span>数量：</span>{$pro_num}</li>
									<li><span>姓名：</span>{$truename}</li>
									<li><span>手机：</span>{$mobile}</li>
									<li><span>地址：</span>{$address}</li>
									<li><span>备注：</span>{$remark}</li>
								</ul>
							</div>
						</div>
						
						{if C('pay_open')==1&&$ispay==0}
						<div class="order-pay">
							<div class="ui-menu ui-menu-blue">
								<div class="ui-menu-name">付款方式</div>
							</div>
							<form method="post" id="form_order">
								<ul class="pay ui-mt-20" id="orderpay">
									{if $umoney>=$pro_price}
									<li><div><img src="{WEB_ROOT}api/pay/user/images/pay.png" data-config="user"><i class="ui-icon-check"></i></div></li>
									{/if}
									{if C('pay_alipay_open')==1}
									<li><div><img src="{WEB_ROOT}api/pay/alipay/images/pay.png" data-config="alipay"><i class="ui-icon-check"></i></div></li>
									{/if}
									{if C('pay_wxpay_open')==1}
									<li><div><img src="{WEB_ROOT}api/pay/wxpay/images/pay.png" data-config="wxpay"><i class="ui-icon-check"></i></div></li>
									{/if}
                                    {if C('pay_free_open')==1}
                                    <li><div><img src="{WEB_ROOT}api/pay/zfb/images/pay.png" data-config="zfb"><i class="ui-icon-check"></i></div></li>
                                    <li><div><img src="{WEB_ROOT}api/pay/weixin/images/pay.png" data-config="weixin"><i class="ui-icon-check"></i></div></li>
                                    {/if}
								</ul>
								<input type="hidden" name="payway" id="payway" value="" data-rule="支付方式:required;">
                                <input type="hidden" name="token" value="{$token}">
								<button type="submit" class="ui-btn ui-btn-blue ui-btn-big ui-mt-20">在线支付</button>
							</form>
						</div>
						{/if}
						<!--over-->
					</div>
				</div>
			
			</div>
		</div>
	</div>
	
	{include file="include/foot.php"}
	{if $ispay==0}
    <script src="{WEB_ROOT}public/js/jquery.qrcode.js"></script>  
    <script>
	function freshorder(orderId)
	{
		var interval=setInterval(function()
		{
			$.ajax(
			{
				type:"post",
				cache:"false",
				url:"{THIS_LOCAL}",
				data:"token={$token}&orderid="+orderId,
				success:function(d)
				{
					if(d=='1')
					{
						location.href='{THIS_LOCAL}';
					}
				}
			})
		},1000);
	};
	$(function()
	{
		$("#form_order").form(
		{
			type:2,
			hide:2,
			align:'center',
			result:function(form)
			{
				var payway=$("#payway").val();
				if(payway=='user')
				{
					$.ajax(
					{
						type:'post',
						dataType:'json',
						url:'{U("orderpay")}',
						data:"token={$token}&orderid={$orderid}",
						error:function(e){alert(e.responseText);},
						success:function(d)
						{
							if(d.state=='success')
							{
								sdcms.success(d.msg);
								setTimeout(function(){location.href='{THIS_LOCAL}';},1500)
							}
							else
							{
								sdcms.error(d.msg);
							}
						}
					});
					return;
				}
				{if !ismobile()}
				if(payway=="wxpay" || payway=="weixin" || payway=="zfb")
				{
					var name=(payway=="zfb")?'支付宝':'微信';
					$.ajax(
					{
						type:'get',
						dataType:'json',
						url:'{WEB_ROOT}api/pay/'+payway+'/p/api.php?type=2&orderid={$orderid}',
						error:function(e){alert(e.responseText);},
						success:function(d)
						{
							$(".ui-dialog").remove();
							if(d.state=='success')
							{
								$.dialog(
								{
									'title':name+"支付",
									'text':'<div class="ui-text-center"><div id="qrcode" style="width:300px;height:300px;margin:10px auto"></div><p>请打开【'+name+'】，使用【扫一扫】完成付款。</p></div>',
									'okval':'已完成支付',
									'ok':function(e)
									{
										location.href='{THIS_LOCAL}';
									}
								});
								$("#qrcode").qrcode({width:300,height:300,text:d.msg}); 
							}
							else
							{
								sdcms.error(d.msg);
							}
						}
					});
					freshorder({$orderid});
					return false;
				}
				{/if}
				var root="p";
				{if ismobile()}
				var root="m";
				{/if}
				{if isweixin()}
				if(payway=='wxpay' || payway=='weixin')
				{
					var root='w';
				}
				{/if}
				location.href='{WEB_ROOT}api/pay/'+payway+'/'+root+'/api.php?type=2&orderid={$orderid}';
			}
		});
	});
	</script>
    {/if}
</body>
</html>