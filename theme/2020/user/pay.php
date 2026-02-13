<?php if(!defined('IN_SDCMS')) exit;?>
{php $self_name='在线充值'}
{php $self_ename='online recharge'}
{php $position=[['name'=>'会员中心','url'=>N('user')],['name'=>$self_name,'url'=>THIS_LOCAL]]}
{include file="include/top.php"}
<title>{$self_name}_{sdcms[web_name]}</title>
</head>

<body>
	{include file="include/head.php"}
	{include file="include/banner_inner.php"}

	<div class="container">
		<div class="width ui-row">
			<div class="container-left">
				<div class="ui-fixed-s" data-parent=".container">
					{include file="user/nav.php"}
				</div>
			</div>
			
			<div class="container-right">
			
				<div class="ui-box">
					<div class="ui-box-h2">{$self_name}</div>
					<div class="ui-box-body">
						<!--begin-->
						<form method="post" class="ui-form ui-ml-40 ui-mt-40">
							{sdcms:rs top="1" table="sd_user" where="id=$userid"}
							<div class="ui-form-group ui-row">
								<label class="ui-col-2 ui-col-form-label ui-text-right">账户余额：</label>
								<div class="ui-col-6 ui-mt-10">
									<span class="ui-text-red">{$rs[umoney]}</span> 元
								</div>
							</div>
							{/sdcms:rs}
							<div class="ui-form-group ui-row">
								<label class="ui-col-2 ui-col-form-label ui-text-right">充值金额：</label>
								<div class="ui-col-6">
									<input type="text" name="paymoney" class="ui-form-ip" placeholder="1元起充" data-rule="充值金额:required;dot;between(1,10000);">
								</div>
							</div>
							<div class="ui-form-group ui-row">
								<label class="ui-col-2 ui-col-form-label ui-text-right">支付方式：</label>
								<div class="ui-col-6">
									 <ul class="pay" id="orderpay">
										{if C('pay_open')==1}
											{if C('pay_alipay_open')==1 && isweixin()==0}
											<li><div><img src="{WEB_ROOT}api/pay/alipay/images/pay.png" data-config="alipay"><i class="ui-icon-check"></i></div></li>
											{/if}
											{if C('pay_wxpay_open')==1}
											<li><div><img src="{WEB_ROOT}api/pay/wxpay/images/pay.png" data-config="wxpay"><i class="ui-icon-check"></i></div></li>
											{/if}
                                            {if C('pay_free_open')==1}
                                            <li><div><img src="{WEB_ROOT}api/pay/zfb/images/pay.png" data-config="zfb"><i class="ui-icon-check"></i></div></li>
                                            <li><div><img src="{WEB_ROOT}api/pay/weixin/images/pay.png" data-config="weixin"><i class="ui-icon-check"></i></div></li>
                                            {/if}
										{/if}
									</ul>
									<input type="hidden" name="type" id="payway" data-rule="支付方式:required;" value="">
								</div>
							</div>
							<div class="ui-form-group ui-row">
								<label class="ui-col-2 ui-col-form-label ui-text-right"></label>
								<div class="col-6">
									<input type="hidden" name="token" value="{$token}"><input type="submit" class="ui-btn ui-btn-blue" value="在线支付">
								</div>
							</div>
						</form>
						<!--over-->
					</div>
				</div>
			
			</div>
		</div>
	</div>
	
	{include file="include/foot.php"}
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
					}
				}
			})
		},1000);
	};
    $(function()
    {
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
							if(payway=='wxpay')
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