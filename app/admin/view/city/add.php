<?php if(!defined('IN_SDCMS')) exit;?><!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="renderer" content="webkit">
<title>添加城市</title>
<link rel="stylesheet" href="{WEB_ROOT}public/css/ui.css">
<link rel="stylesheet" href="{WEB_ROOT}public/admin/css/layout.css">
<script src="{WEB_ROOT}public/js/jquery.js"></script>
<script src="{WEB_ROOT}public/js/ui.js?v=202409"></script>
</head>

<body class="bg_white">
    <div class="border_iframe">
        <!---->
        <form class="ui-form" method="post">
        <!--aaa-->
        <div class="ui-form-group ui-row">
            <label class="ui-col-3 ui-col-form-label">城市名称：</label>
            <div class="ui-col-9">
                <input type="text" name="name" class="ui-form-ip" data-rule="城市名称:required;">
            </div>
        </div>
        <div class="ui-form-group ui-row">
            <label class="ui-col-3 ui-col-form-label">开启分站：</label>
            <div class="ui-col-9 col-right-top">
                <label class="ui-radio"><input type="radio" name="t0" value="1"><i></i>开启</label>
                <label class="ui-radio"><input type="radio" name="t0" value="0" checked><i></i>关闭</label>
                <span class="input-tips">关闭后，以下设置无效</span>
            </div>
        </div>
        <div class="ui-form-group ui-row">
            <label class="ui-col-3 ui-col-form-label">路径：</label>
            <div class="ui-col-9">
                <input type="text" name="t1" class="ui-form-ip" data-rule="路径:required;letters;">
            </div>
        </div>
        <div class="ui-form-group ui-row">
            <label class="ui-col-3 ui-col-form-label">二级域名：</label>
            <div class="ui-col-9 col-right-top">
                <label class="ui-radio"><input type="radio" name="t2" value="1" ><i></i>开启</label>
                <label class="ui-radio"><input type="radio" name="t2" value="0" checked><i></i>关闭</label>
                <span class="input-tips">{if C('city_domain')!=''}开启后效果：test.{C('city_domain')}{else}请先在【系统设置】里配置分站根域名{/if}</span>
            </div>
        </div>
        <div class="ui-form-group ui-row">
            <label class="ui-col-3 ui-col-form-label">SEO设置：</label>
            <div class="ui-col-9 col-right-top">
                <label class="ui-radio"><input type="radio" name="t3" id="t3_0" value="0" checked><i></i>使用主站</label>
                <label class="ui-radio"><input type="radio" name="t3" id="t3_1" value="1"><i></i>自定义</label>
            </div>
        </div>
        <div class="ui-form-group ui-row siteconfig hide">
            <label class="ui-col-3 ui-col-form-label">分站优化标题：</label>
            <div class="ui-col-9">
                <input type="text" name="t4" class="ui-form-ip" >
            </div>
        </div>
        <div class="ui-form-group ui-row siteconfig hide">
            <label class="ui-col-3 ui-col-form-label">分站关键字：</label>
            <div class="ui-col-9">
                <textarea name="t5" rows="3" class="ui-form-ip ui-form-limit" data-max="255"></textarea>
                <div class="ui-form-limit-text"><span>0</span>/255</div>
            </div>
        </div>
        <div class="ui-form-group ui-row siteconfig hide">
            <label class="ui-col-3 ui-col-form-label">分站描述：</label>
            <div class="ui-col-9">
                <textarea name="t6" rows="3" class="ui-form-ip ui-form-limit" data-max="255"></textarea>
                <div class="ui-form-limit-text"><span>0</span>/255</div>
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
	$("#t3_0").click(function()
	{
		$(".siteconfig").addClass("hide");
	});
	$("#t3_1").click(function()
	{
		$(".siteconfig").removeClass("hide");
	});
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