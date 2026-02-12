<?php if(!defined('IN_SDCMS')) exit;?><!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="renderer" content="webkit">
<title>素材选择</title>
<link rel="stylesheet" href="{WEB_ROOT}public/css/ui.css">
<link rel="stylesheet" href="{WEB_ROOT}public/admin/css/layout.css">
<script src="{WEB_ROOT}public/js/jquery.js"></script>
<script src="{WEB_ROOT}public/js/ui.js?v=202409"></script>
</head>

<body class="bg_white">
    <div class="border_iframe">
	<input type="hidden" name="go" id="go" value="">
    <div class="ui-row">
        <div class="ui-col-4">
            <form action="{THIS_LOCAL}">
                <div class="form-group form-inline">
                    <div class="ui-input-group">
                        {if sdcms[url_mode]==1}
                            <input type="hidden" name="m" value="{C('ADMIN')}" />
                            <input type="hidden" name="c" value="wxmater" />
                            <input type="hidden" name="a" value="master" />
                        {/if}
                        <input type="text" name="keyword" class="ui-form-ip" value="{$keyword}" placeholder="请输入关键字">
                        <button type="submit" class="after"><div class="ui-icon-search"></div></button>
                    </div>
                </div>
            </form>
        </div>
        <div class="ui-col-4"></div>
        <div class="ui-col-4">
			<div class="form-subject">提示：任意一行单击后按确定即可</div>
        </div>
    </div>
    
    <table class="ui-table ui-table-border ui-mt ui-mb">
        <thead class="ui-thead-gray">
            <tr>
                <th width="100">编号</th>
                <th>标题</th>
            </tr>
        </thead>
        <tbody>
        {sdcms:rs pagesize="20" table="sd_mater_data" where="$where" order="id desc"}
        {rs:eof}
        <tr>
            <td colspan="2">暂无数据</td>
        </tr>
        {/rs:eof}
        <tr config="{$rs[id]}::{$token}" class="choose" title="点击选择此内容" style="cursor:pointer;">
            <td>{$rs[id]}</td>
            <td class="ui-text-left">{$rs[title]}</td>
        </tr>
        {/sdcms:rs}
        </tbody>
    </table>
    {if $total_rs!=0}
    <div class="ui-page ui-page-center ui-page-info">
        <ul>{$showpage}</ul>
    </div>
    {/if}
    </div> 
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
});
</script>
</body>
</html>