<?php if(!defined('IN_SDCMS')) exit;?><!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="renderer" content="webkit">
<title>移动分类</title>
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
                <label class="ui-col-2 ui-col-form-label">当前栏目：</label>
                <div class="ui-col-10">
                    <input type="text" class="ui-form-ip" value="{$catename}" readonly>
                </div>
            </div>
            <div class="ui-form-group ui-row">
                <label class="ui-col-2 ui-col-form-label">目标栏目：</label>
                <div class="ui-col-10">
                    <select name="t0" size="10" class="ui-form-ip" data-rule="目标栏目:required;">
                        <option value="0">作为一级栏目</option>
                        {foreach $data as $rs}
                        <option value="{$rs['cateid']}"{if $id==$rs['cateid']} selected{/if}{if in_array($rs['cateid'],$sonid)} disabled{/if}>{str_repeat("　",$rs['depth'])}{$rs['catename']}</option>
                        {/foreach}
                    </select>
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