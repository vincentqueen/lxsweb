<?php if(!defined('IN_SDCMS')) exit;?>
	<div class="ui-modal" id="my-inquiry">
        <div class="ui-modal-header">
            <div class="ui-modal-title">我要询价</div>
            <div class="ui-modal-close ui-rotate">×</div>
        </div>
        <div class="ui-modal-body">
        	<!---->
            <form class="ui-form" id="form_inquiry" method="post">
                <div class="ui-form-group ui-row">
                    <label class="ui-col-3 ui-col-form-label ui-text-right">姓名：</label>
            		<div class="ui-col-9">
                    	<input type="text" name="truename" class="ui-form-ip" value="{$truename}" placeholder="请输入您的姓名" data-rule="姓名:required;">
                    </div>
                </div>
                <div class="ui-form-group ui-row">
                    <label class="ui-col-3 ui-col-form-label ui-text-right">手机：</label>
            		<div class="ui-col-9">
                    	<input type="text" name="mobile" maxlength="11" class="ui-form-ip" value="{$mobile}" placeholder="请输入您的手机号码" data-rule="手机号码:required;mobile;">
                    </div>
                </div>
                <div class="ui-form-group ui-row">
                    <label class="ui-col-3 ui-col-form-label ui-text-right">询价：</label>
            		<div class="ui-col-9">
                    	<textarea name="remark" class="ui-form-ip" rows="5" placeholder="请输入询价内容" data-rule="询价内容:required;"></textarea>
                    </div>
                </div>
                <div class="ui-form-group ui-row ui-mb-0">
                    <label class="ui-col-3 ui-col-form-label ui-text-right"></label>
            		<div class="ui-col-9">
                    	<input type="hidden" name="token" value="{$token}"><button type="submit" class="ui-btn ui-btn-blue">提交询价</button>
                    </div>
                </div>
            </form>
            <!---->
        </div>
    </div>
    {if $price>0}
    <div class="ui-modal" id="my-order">
        <div class="ui-modal-header">
            <div class="ui-modal-title">我要订购</div>
            <div class="ui-modal-close ui-rotate">×</div>
        </div>
        <div class="ui-modal-body">
        	<!---->
            {if sdcms[web_order_login]==1 && USER_ID==0}
            	请先<a href="{N('login')}" class="ui-text-red ui-ml ui-mr">登录</a>或<a href="{N('reg')}" class="ui-text-red ui-ml ui-mr">注册</a>
            {else}
            <form class="ui-form" id="form_order" method="post">
                <div class="ui-form-group ui-row">
                    <label class="ui-col-3 ui-col-form-label ui-text-right">姓名：</label>
            		<div class="ui-col-9">
                    	<input type="text" name="truename" class="ui-form-ip" value="{$truename}" placeholder="请输入您的姓名" data-rule="姓名:required;">
                    </div>
                </div>
                <div class="ui-form-group ui-row">
                    <label class="ui-col-3 ui-col-form-label ui-text-right">手机：</label>
            		<div class="ui-col-9">
                    	<input type="text" name="mobile" maxlength="11" class="ui-form-ip" value="{$mobile}" placeholder="请输入您的手机号码" data-rule="手机号码:required;mobile;">
                    </div>
                </div>
                <div class="ui-form-group ui-row">
                    <label class="ui-col-3 ui-col-form-label ui-text-right">数量：</label>
            		<div class="ui-col-9">
                    	<input type="text" name="pronum" maxlength="6" class="ui-form-ip" placeholder="请输入订购数量" data-rule="订购数量:required;int;">
                    </div>
                </div>
                <div class="ui-form-group ui-row">
                    <label class="ui-col-3 ui-col-form-label ui-text-right">地址：</label>
            		<div class="ui-col-9">
                    	<input type="text" name="address" maxlength="255" class="ui-form-ip" value="{$address}" placeholder="请输入收货地址" data-rule="收货地址:required;">
                    </div>
                </div>
                <div class="ui-form-group ui-row">
                    <label class="ui-col-3 ui-col-form-label ui-text-right">备注：</label>
            		<div class="ui-col-9">
                    	<textarea name="remark" class="ui-form-ip" rows="5" placeholder="请输入备注，可以为空"></textarea>
                    </div>
                </div>
                <div class="ui-form-group ui-row ui-mb-0">
                    <label class="ui-col-3 ui-col-form-label ui-text-right"></label>
            		<div class="ui-col-9">
                    	<input type="hidden" name="token" value="{$token}"><button type="submit" class="ui-btn ui-btn-blue">提交订单</button>
                    </div>
                </div>
            </form>
            {/if}
            <!---->
        </div>
    </div>

    {/if}
	
	<div class="ui-footbar ui-fixed-bottom ui-mwidth">
		<div class="ui-footbar-left">
			<a href="{$webroot}"><i class="ui-icon-home"></i>首页</a>
		</div>
		<div class="ui-footbar-right">
			<a href="javascript:;" class="ui-modal-show" data-target="#my-inquiry">询价</a>
			{if $price>0}<a href="javascript:;" class="ui-modal-show" data-target="#my-order">订购 <sub>￥</sub>{$price}</a>{/if}
		</div>
	</div>
	<script src="{WEB_ROOT}public/js/jquery.js"></script>
	<script src="{WEB_ROOT}public/js/ui.js"></script>
	<script src="{WEB_THEME}mobile/js/cms.js"></script>
	<script>
	$(function()
	{
		$("#form_inquiry").form(
		{
			type:2,
			align:'center',
			result:function(form)
			{
				$.ajax(
				{
					type:'post',
					cache:false,
					dataType:'json',
					url:'{U("other/inquiry/","id=".$id."","",1)}',
					data:$(form).serialize(),
					error:function(e){alert(e.responseText);},
					success:function(d)
					{
						if(d.state=='success')
						{
							sdcms.success(d.msg);
							$("#form_inquiry")[0].reset();
							$("#my-inquiry").modal('close');
						}
						else
						{
							sdcms.error(d.msg);
						}
					}
				});
			}
		});
		{if $price>0}
		$("#form_order").form(
		{
			type:2,
			align:'center',
			result:function(form)
			{
				$.ajax(
				{
					type:'post',
					cache:false,
					dataType:'json',
					url:'{U("other/order/","id=".$id."","",1)}',
					data:$(form).serialize(),
					error:function(e){alert(e.responseText);},
					success:function(d)
					{
						if(d.state=='success')
						{
							location.href=d.msg;
						}
						else
						{
							sdcms.error(d.msg);
						}
					}
				});
			}
		});
		{/if}
	})
	</script>