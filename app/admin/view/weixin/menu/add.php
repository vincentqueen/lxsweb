<?php if(!defined('IN_SDCMS')) exit;?><!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="renderer" content="webkit">
<title>添加菜单</title>
<link rel="stylesheet" href="{WEB_ROOT}public/css/ui.css">
<link rel="stylesheet" href="{WEB_ROOT}public/admin/css/layout.css">
<script src="{WEB_ROOT}public/js/jquery.js"></script>
<script src="{WEB_ROOT}public/js/ui.js?v=202409"></script>
<script src="{WEB_ROOT}public/admin/js/base.js"></script>
</head>

<body>
    <div class="position">当前位置：微信公众号 > <a href="{U('index')}">菜单管理</a> > <a href="{THIS_LOCAL}">添加菜单</a></div>
    <div class="border">
        <!---->
        <div class="form-subject">添加菜单</div>
        <form class="ui-form" method="post">
            <div class="ui-form-group ui-row">
                <label class="col-left ui-col-form-label">菜单名称：</label>
                <div class="col-right">
                    <input type="text" name="t0" class="ui-form-ip" maxlength="{if $fid==0}5{else}7{/if}" placeholder="请输入菜单名称" data-rule="菜单名称:required;">
                </div>
            </div>
            <div class="ui-form-group ui-row">
                <label class="col-left ui-col-form-label">菜单类型：</label>
                <div class="col-right">
                    <select name="t1" id="t1" class="ui-form-ip" data-rule="菜单类型:required;">
                    	<option value="">请选择菜单类型</option>
                    	{if $fid==0}<option value="0">作为一级菜单</option>{/if}
                        <option value="1">文本消息</option>
                        <option value="2">图文素材</option>
                        <option value="3">外链</option>
                        <option value="4">小程序</option>
                    </select>
                </div>
            </div>
            <div class="ui-form-group ui-row dis" id="reply_content">
                <label class="col-left ui-col-form-label">消息内容：</label>
                <div class="col-right">
                    <textarea name="t2" rows="5" class="ui-form-ip" data-rule="消息内容:required;"></textarea>
                </div>
            </div>
            <div class="ui-form-group ui-row dis" id="reply_id">
                <label class="col-left ui-col-form-label">素材选择：</label>
                <div class="col-right">
                	<div class="ui-btn-group">
                        <a class="ui-btn-group-item" href="javascript:;" id="select_master" data-name="t3" data-url="{U('all')}">选择素材</a>
                        <a class="ui-btn-group-item" href="javascript:;" id="delete_master" data-name="t3">清空素材</a>
                    </div>
                    <input type="hidden" name="t3" id="t3" class="ui-form-ip" value="0">
                    <div class="master_box"></div>
                </div>
            </div>
            <div class="ui-form-group ui-row dis" id="reply_url">
                <label class="col-left ui-col-form-label">网页链接：</label>
                <div class="col-right">
                    <input type="text" name="t4" class="ui-form-ip" data-rule="网页链接:required;">
                </div>
            </div>
            <div class="ui-form-group ui-row dis" id="appid">
                <label class="col-left ui-col-form-label">小程序appid：</label>
                <div class="col-right">
                    <input type="text" name="t5" class="ui-form-ip" data-rule="小程序appid:required;">
                </div>
            </div>
            <div class="ui-form-group ui-row dis" id="pagepath">
                <label class="col-left ui-col-form-label">小程序页面路径：</label>
                <div class="col-right">
                    <input type="text" name="t6" class="ui-form-ip" data-rule="小程序的页面路径:required;">
                </div>
            </div>
            <div class="ui-form-group ui-row">
                <label class="col-left ui-col-form-label">排序：</label>
                <div class="col-right">
                    <input type="text" name="t7" class="ui-form-ip" value="0">
                    <span class="input-tips">数字越小越靠前</span>
                </div>
            </div>
            <div class="ui-form-group ui-row">
                <label class="col-left ui-col-form-label"></label>
                <div class="col-right">
                	<input type="hidden" name="token" value="{$token}">
                    <button type="submit" class="ui-btn ui-btn-info ui-mr-sm">保存</button>
                    <button type="button" class="ui-btn ui-back">返回</button>
                </div>
            </div>
        </form>
        <!---->
    </div>

<script>
$(function(){
	$("#t1").change(function()
	{
		switch ($(this).val())
		{
			case "1":
				$("#reply_id,#reply_url,#appid,#pagepath").addClass("dis");
				$("#reply_content").removeClass("dis");
				break;
			case "2":
				$("#reply_content,#reply_url,#appid,#pagepath").addClass("dis");
				$("#reply_id").removeClass("dis");
				break;
			case "3":
				$("#reply_content,#reply_id,#appid,#pagepath").addClass("dis");
				$("#reply_url").removeClass("dis");
				break;
			case "4":
				$("#reply_content,#reply_id").addClass("dis");
				$("#reply_url,#appid,#pagepath").removeClass("dis");
				break;
			default:
				$("#reply_content,#reply_id,#reply_url,#appid,#pagepath").addClass("dis");
				break;
		}
	})
	$("#delete_master").click(function()
	{
		$(".master_box").html("");
		$("#t3").val("0");
	});
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
						setTimeout(function(){location.href='{U("index")}';},1500);
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