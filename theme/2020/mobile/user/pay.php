<?php if(!defined('IN_SDCMS')) exit;?>
{php $self_name='在线充值'}
{include file="mobile/include/top.php"}
<title>{$self_name}_{sdcms[web_name]}</title>
<meta name="keywords" content="{sdcms[seo_key]}">
<meta name="description" content="{sdcms[seo_desc]}">
</head>

<body>
	
	{include file="mobile/include/head.php"}
	<div class="ui-mwidth">
		<div class="ui-box ui-p-10">
			<!--begin-->
            <form method="post" class="ui-form">
                {sdcms:rs top="1" table="sd_user" where="id=$userid"}
                <div class="ui-form-group">
                    <label>账户余额：</label>
                    <span class="ui-text-red">{$rs[umoney]}</span> 元
                </div>
                {/sdcms:rs}
                <div class="ui-form-group">
                    <label>充值金额：</label>
                    <input type="text" name="paymoney" class="ui-form-ip" placeholder="1元起充" data-rule="充值金额:required;dot;between(1,10000);">
                </div>
                <div class="ui-form-group">
                    <label>支付方式：</label>
                     <ul class="pay" id="orderpay">
                        {if C('pay_open')==1}
                            {if C('pay_alipay_open')==1}
                            <li><div><img src="{WEB_ROOT}api/pay/alipay/images/pay.png" data-config="alipay"><i class="ui-icon-check"></i></div></li>
                            {/if}
                            {if C('pay_wxpay_open')==1}
                            <li><div><img src="{WEB_ROOT}api/pay/wxpay/images/pay.png" data-config="wxpay"><i class="ui-icon-check"></i></div></li>
                            {/if}
                            {if C('pay_free_open')==1}
                            <li><div><img src="{WEB_ROOT}api/pay/zfb/images/pay.png" data-config="zfb"><i class="ui-icon-check"></i></div></li>
                            {if isweixin()}<li><div><img src="{WEB_ROOT}api/pay/weixin/images/pay.png" data-config="weixin"><i class="ui-icon-check"></i></div></li>{/if}
                            {/if}
                        {/if}
                    </ul>
                    <input type="hidden" name="type" id="payway" data-rule="支付方式:required;" value="">
                </div>
                <div class="form-group mt">
                	<input type="hidden" name="token" value="{$token}"><input type="submit" class="ui-btn ui-btn-blue ui-btn-block" value="在线支付">
                </div>
            </form>
			<!--over-->
		</div>
	</div>

	<div class="ui-pt-15 ui-mt"></div>
	{include file="mobile/include/foot.php"}
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
				url:"{U('checkpay')}",
				data:"token={$token}&orderid="+orderId,
				success:function(d)
				{
					if(d=='1')
					{
						location.href='{THIS_LOCAL}';
						clearInterval(interval);
					}
				}
			})
		}, 1000);
	};
    $(function()
    {
		$("#bar_user").addClass("active");
		$(".ui-topbar-title").html("{$self_name}");
    	$(".ui-form").form(
    	{
    		type:2,
			hide:2,
    		align:'center',
    		result:function(form)
    		{
				var payway=$("#payway").val();
    			$.ajax(
				{
    				type:'post',
    				cache:false,
    				dataType:'json',
    				url:'{THIS_LOCAL}',
    				data:$(form).serialize(),
    				error:function(e){alert(e.responseText);},
    				success:function(d)
    				{
    					if(d.state=='success')
						{
							{if !ismobile()}
							if(payway=="wxpay" || payway=="weixin" || payway=="zfb")
							{
								var name=(payway=="zfb")?'支付宝':'微信';
								$.ajax(
								{
									type:'get',
									dataType:'json',
									url:'{WEB_ROOT}api/pay/'+payway+'/p/api.php?type=1&orderid='+d.msg,
									error:function(e){alert(e.responseText);},
									success:function(data)
									{
										$(".ui-dialog").remove();
										if(data.state=='success')
										{
											$.dialog(
											{
												'title':name+"支付",
												'text':'<div class="ui-text-center"><div id="qrcode" style="width:300px;height:300px;margin:0 auto 15px auto;"></div><div>请打开【'+name+'】，使用【扫一扫】完成付款。</div></div>',
												'okval':'已完成支付',
												'ok':function(e)
												{
													location.href='{N("user")}';
												}
											});
											$("#qrcode").qrcode({width:300,height:300,text:data.msg}); 
										}
										else
										{
											sdcms.error(data.msg);
										}
									}
								});
								freshorder(d.msg);
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
							location.href='{WEB_ROOT}api/pay/'+payway+'/'+root+'/api.php?type=1&orderid='+d.msg+'';
						}
						else
						{
							sdcms.error(d.msg);
						}
    				}
    			});
    		}
    	});
    })
    </script>
	
</body>
</html>
