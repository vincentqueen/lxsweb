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
<script>
$(function()
{
	$(".list-loop").click(function()
	{
		var that=this;
		var id=$(that).attr("config");
		$(".list-loop").each(function()
		{
			$(this).removeClass("bgs");		  
		});
		$(that).addClass("bgs");
		$("#filelist").html(id);
		$("#master_box").html('<div class="list-loop">'+$(that).html()+'</div>');
	 })
})
</script>
</head>

<body class="bg_white">
<div class="border_iframe">
	<div id="filelist" style="display:none;"></div>
    <div id="master_box" style="display:none;"></div>
    <div id="master">
        {sdcms:rp pagesize="10" field="id,title" table="sd_mater" where="islock=1" order="id desc" auto="j"}
        {php $cid=$rp[id]}
        <div class="list-loop" config="{$rp[id]}">
            <div class="info">{$rp[title]}</div>
            {sdcms:rs field="id,title,pic" table="sd_mater_data" where="cid=$cid and islock=1" order="ordnum,id"}
            {if $i==1}
            <div class="hover">
                <img src="{$rs[pic]}" width="267" >
                <a href="javascript:;">{$rs[title]}</a>
            </div>
            {else}
            <div class="item">
                <img src="{$rs[pic]}" class="bd">
                <a href="javascript:;">{$rs[title]}</a>
            </div>
            {/if}
            {/sdcms:rs}
            <div class="add"></div>
        </div>
        {/sdcms:rp}
    </div>
    
    {if $total_rp!=0}
    <div class="ui-page ui-page-center ui-page-info">
        <ul>{$showpage}</ul>
    </div>
    {/if}
    <input type="hidden" name="token" id="token" value="{$token}">
</div>
</body>
</html>