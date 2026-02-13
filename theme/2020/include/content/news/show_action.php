<?php if(!defined('IN_SDCMS')) exit;?>
{if $price>0}
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
			url:"{U('user/ordercheck')}",
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
function userpay()
{
	$.ajax(
	{
		type:'post',
		url:'{U("user/buy","id=$id","",1)}',
		data:'token={$token}',
		dataType:'json',
		error:function(e){alert(e.responseText);},
		success:function(d)
		{
			if(d.state=='success')
			{
				sdcms.success(d.msg);
				setTimeout(function(){location.href='{THIS_LOCAL}';},1500);
			}
			else
			{
				sdcms.error(d.msg);
			}
		}
	})
}

$(function()
{
	$("#form_buy").form(
	{
		type:2,
		hide:2,
		align:'center',
		result:function(form)
		{
			var payway=$("#payway").val();
			if(payway=='user')
			{
				userpay();
				return;
			}
			else
			{
				$.ajax(
				{
					type:'post',
					url:'{U("user/order")}',
					data:'token={$token}&id={$id}',
					dataType:'json',
					error:function(e){alert(e.responseText);},
					success:function(d)
					{
						if(d.state=='success')
						{
							var orderid=d.msg;
							/////
							{if !ismobile()}
							if(payway=="wxpay" || payway=="weixin" || payway=="zfb")
							{
								var name=(payway=="zfb")?'支付宝':'微信';
								$.ajax(
								{
									type:'get',
									dataType:'json',
									url:'{WEB_ROOT}api/pay/'+payway+'/p/api.php?type=3&orderid='+orderid,
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
								freshorder(orderid);
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
							location.href='{WEB_ROOT}api/pay/'+payway+'/'+root+'/api.php?type=3&orderid='+orderid;
							/////
						}
						else
						{
							sdcms.error(d.msg);
						}
					}
				})
				
			}
		}
	});
});
</script>
{/if}