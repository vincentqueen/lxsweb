<?php if(!defined('IN_SDCMS')) exit;?><!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="renderer" content="webkit">
<title>编辑订单</title>
<link rel="stylesheet" href="{WEB_ROOT}public/css/ui.css">
<link rel="stylesheet" href="{WEB_ROOT}public/admin/css/layout.css">
<script src="{WEB_ROOT}public/js/jquery.js"></script>
<script src="{WEB_ROOT}public/js/ui.js?v=202409"></script>
</head>

<body class="bg_white">
    <div class="border_iframe">
        <!---->
        <form class="ui-form" method="post">
            <div class="ui-form-group ui-row">
                <label class="ui-col-3 ui-col-form-label">订单号：</label>
                <div class="ui-col-9">
                    <input type="text" name="t0" class="ui-form-ip" value="{$orderid}" disabled>
                </div>
            </div>
            <div class="ui-form-group ui-row">
                <label class="ui-col-3 ui-col-form-label">订单产品：</label>
                <div class="ui-col-9">
                    <input type="text" name="t1" class="ui-form-ip" value="{$pro_name}" disabled>
                </div>
            </div>
            <div class="ui-form-group ui-row">
                <label class="ui-col-3 ui-col-form-label">购买数量：</label>
                <div class="ui-col-9">
                    <input type="text" name="t2" class="ui-form-ip" value="{$pro_num}"  disabled>
                </div>
            </div>
            <div class="ui-form-group ui-row">
                <label class="ui-col-3 ui-col-form-label">总金额：</label>
                <div class="ui-col-9">
                    <input type="text" name="t3" class="ui-form-ip" value="{$pro_price}"  disabled>
                </div>
            </div>
            <div class="ui-form-group ui-row">
                <label class="ui-col-3 ui-col-form-label">姓名：</label>
                <div class="ui-col-9">
                    <input type="text" name="t4" class="ui-form-ip" value="{$truename}" data-rule="姓名:required;">
                </div>
            </div>
            <div class="ui-form-group ui-row">
                <label class="ui-col-3 ui-col-form-label">手机：</label>
                <div class="ui-col-9">
                    <input type="text" name="t5" class="ui-form-ip" value="{$mobile}" data-rule="手机:required;mobile">
                </div>
            </div>
            <div class="ui-form-group ui-row">
                <label class="ui-col-3 ui-col-form-label">收货地址：</label>
                <div class="ui-col-9">
                    <input type="text" name="t6" class="ui-form-ip" value="{$address}" data-rule="收货地址:required;">
                </div>
            </div>
            <div class="ui-form-group ui-row">
                <label class="ui-col-3 ui-col-form-label">备注：</label>
                <div class="ui-col-9">
                    <textarea name="t7" class="ui-form-ip" rows="4" cols="50">{$remark}</textarea>
                </div>
            </div>
            <div class="ui-form-group ui-row">
                <label class="ui-col-3 ui-col-form-label">状态：</label>
                <div class="ui-col-9 col-right-top">
                	<label class="ui-radio"><input type="radio" name="t8" value="1"{if $isover==1} checked{/if}><i></i>已处理</label>
                    <label class="ui-radio"><input type="radio" name="t8" value="0"{if $isover==0} checked{/if}><i></i>未处理</label>
                </div>
            </div>
            <div class="ui-form-group ui-row">
                <label class="ui-col-3 ui-col-form-label">付款状态：</label>
                <div class="ui-col-9">
                    <input type="text" name="ispay" class="ui-form-ip" value="{if $ispay==1}已付款{else}未付款{/if}" readonly>
                </div>
            </div>
            <div class="ui-form-group ui-row">
                <label class="ui-col-3 ui-col-form-label">付款方式：</label>
                <div class="ui-col-9">
                    <input type="text" name="payway" class="ui-form-ip" value="{$payway}" readonly>
                </div>
            </div>
            <div class="ui-form-group ui-row">
                <label class="ui-col-3 ui-col-form-label">交易号：</label>
                <div class="ui-col-9">
                    <input type="text" name="payway" class="ui-form-ip" value="{$trade_no}" readonly>
                </div>
            </div>
            <div class="ui-form-group ui-hide">
                <input type="hidden" name="token" value="{$token}">
                <button type="submit" id="sdcms-submit">保存</button>
            </div>
        </form>
        <!---->
    </div>

<script>
$(function()
{
	var backurl=window.parent.location;
	$(".ui-form").form(
	{
		type:2,
		align:'bottom-center',
		result:function(form)
		{
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
						sdcms.success(d.msg);
						setTimeout(function(){parent.location.href=backurl;},1000);
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