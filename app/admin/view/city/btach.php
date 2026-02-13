<?php if(!defined('IN_SDCMS')) exit;?><!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="renderer" content="webkit">
<title>一键设置</title>
<link rel="stylesheet" href="{WEB_ROOT}public/css/ui.css">
<link rel="stylesheet" href="{WEB_ROOT}public/admin/css/layout.css">
<script src="{WEB_ROOT}public/js/jquery.js"></script>
<script src="{WEB_ROOT}public/js/ui.js?v=202409"></script>
</head>

<body class="bg_white">
    <div class="border_iframe">
        <!---->
        {if $fid==0}
        <div class="form-subject">本操作将一次性开启或关闭所有省市分站，请谨慎操作</div>
        {else}
        <div class="form-subject">本操作将一次性开启或关闭【<span class="ui-text-red">{$name}</span>】下城市分站，请谨慎操作</div>
        {/if}
        <form class="ui-form" method="post">
        <!--aaa-->
        <input type="hidden" name="fid" value="{$fid}">
        <div class="ui-form-group ui-row">
            <label class="ui-col-3 ui-col-form-label">开启分站：</label>
            <div class="ui-col-9 col-right-top">
                <label class="ui-radio"><input type="radio" name="t0" value="1" checked><i></i>开启</label>
                <label class="ui-radio"><input type="radio" name="t0" value="0"><i></i>关闭</label>
            </div>
        </div>
        <div class="ui-form-group ui-row">
            <label class="ui-col-3 ui-col-form-label">二级域名：</label>
            <div class="ui-col-9 col-right-top">
                <label class="ui-radio"><input type="radio" name="t1" value="1"><i></i>开启</label>
                <label class="ui-radio"><input type="radio" name="t1" value="0" checked><i></i>关闭</label>
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