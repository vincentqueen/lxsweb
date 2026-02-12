<?php if(!defined('IN_SDCMS')) exit;?><!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="renderer" content="webkit">
<title>模板选择</title>
<link rel="stylesheet" href="{WEB_ROOT}public/css/ui.css">
<link rel="stylesheet" href="{WEB_ROOT}public/admin/css/layout.css">
<script src="{WEB_ROOT}public/js/jquery.js"></script>
<script src="{WEB_ROOT}public/js/ui.js?v=202409"></script>
</head>

<body class="bg_tree">
<div class="border_iframe">
    <input type="hidden" name="go" id="go" value="">
    <div class="position">当前位置：<a href="{U('template')}">根目录</a>{$position}模板列表</div>
    <table class="ui-table ui-mb ui-w-100">
        <thead class="ui-thead-gray">
            <tr>
                <th>名称</th>
                <th width="120">说明</th>
            </tr>
        </thead>
        <tbody>
        {foreach $folder as $key=>$val}
        {if !(in_array($val[0],['block','mobile']))}
        <tr>
            <td class="ui-text-left"><span class="ui-icon-folder ui-text-yellow"></span>　<a href="{U('template','root='.$val[2].'')}">{$val[0]}</a></td>
            <td></td>
        </tr>
        {/if}
        {/foreach}
        {foreach $file as $key=>$val}
        {php $a=trim($dir.$val[0],"/")}
        {if !(in_array($val[0],['_config.php','_note.php','_theme.php']))}
        <tr config="{ltrim($a,"/")}" class="choose" title="点击选择此模板">
            <td class="ui-text-left">　<span class="ui-icon-file-text ui-text-blue"></span>　<a href="javascript:;">{$val[0]}</a></td>
            <td>{if isset($name[$a])}{$name[$a]}{/if}</td>
        </tr>
        {/if}
        {/foreach}
        </tbody>
    </table>
</div>
<script>
$(function()
{
	$(".choose").click(function()
	{
		var val=$(this).attr("config");
		$("table tr").each(function()
		{
			$(this).removeClass("ui-active");
		})
		$(this).addClass("ui-active");
		$("#go").val(val);
	})
})
</script>
</body>
</html>