<?php if(!defined('IN_SDCMS')) exit;?><!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="renderer" content="webkit">
<title>新建群发</title>
<link rel="stylesheet" href="{WEB_ROOT}public/css/ui.css">
<link rel="stylesheet" href="{WEB_ROOT}public/admin/css/layout.css">
<script src="{WEB_ROOT}public/js/jquery.js"></script>
<script src="{WEB_ROOT}public/js/ui.js?v=202409"></script>
<script src="{WEB_ROOT}public/admin/js/base.js"></script>
</head>

<body>
    <div class="position">当前位置：微信公众号 > <a href="{U('index')}">群发管理</a> > <a href="{THIS_LOCAL}">新建群发</a></div>
    <div class="border">
        <!---->
        <div class="form-subject">新建群发</div>
        <form class="ui-form" method="post">
            <div class="ui-form-group ui-row">
                <label class="col-left ui-col-form-label">消息类型：</label>
                <div class="col-right">
                    <select name="t1" id="t1" class="ui-form-ip" data-rule="消息类型:required;">
                    	<option value="">请选择消息类型</option>
                        <option value="1">文本消息</option>
                        <option value="2">图文素材</option>
                    </select>
                </div>
            </div>
            <div class="ui-form-group ui-row ui-hide" id="reply_content">
                <label class="col-left ui-col-form-label">消息内容：</label>
                <div class="col-right">
                    <textarea name="t2" rows="5" class="ui-form-ip" data-rule="消息内容:required;"></textarea>
                </div>
            </div>
            <div class="ui-form-group ui-row ui-hide" id="reply_id">
                <label class="col-left ui-col-form-label">素材选择：</label>
                <div class="col-right">
                	<div class="ui-btn-group">
                        <a class="ui-btn-group-item" href="javascript:;" id="select_master" data-name="t3" data-url="{U('all')}">选择素材</a>
                        <a class="ui-btn-group-item" href="javascript:;" id="delete_master" data-name="t3">清空素材</a>
                    </div>
                    <input type="hidden" name="t3" id="t3" value="0">
                    <div class="master_box">
                    </div>
                </div>
            </div>
            <div class="ui-form-group ui-row">
                <label class="col-left ui-col-form-label">发送方式：</label>
                <div class="col-right ui-mt">
                    <label class="ui-radio"><input type="radio" name="t4" id="t4_0" value="0" checked><i></i>直接群发</label>
                    <label class="ui-radio"><input type="radio" name="t4" id="t4_1" value="1"><i></i>群发预览</label>
                </div>
            </div>
            <div class="ui-form-group ui-row wxname ui-hide">
                <label class="col-left ui-col-form-label">微信号：</label>
                <div class="col-right">
                    <input type="text" name="t5" class="ui-form-ip" value="{$wxname}" placeholder="请输入接收者微信号" data-rule="微信号:required;">
                    <span class="input-tips">该微信号必须已关注公众号</span>
                </div>
            </div>
            <div class="ui-form-group ui-row">
            	<label class="col-left form-label"></label>
                <div class="col-right">
                	<input type="hidden" name="token" id="token" value="{$token}">
                    <button type="submit" id="sdcms-submit" class="ui-btn ui-btn-info">执行</button>
                    <button type="button" class="ui-btn ui-back">返回</button>
                </div>
            </div>
        </form>
        <!---->
    </div>

<script>
$(function()
{
	$("#t1").change(function()
	{
		switch ($(this).val())
		{
			case "1":
				$("#reply_content").removeClass("ui-hide");$("#reply_id").addClass("ui-hide");
				break;
			case "2":
				$("#reply_content").addClass("ui-hide");$("#reply_id").removeClass("ui-hide");
				break;
			default:
				$("#reply_content,#reply_id").addClass("ui-hide");
				break;
		}
	});
	$("#t4_0").click(function()
	{
		$(".wxname").addClass("ui-hide");
	});
	$("#t4_1").click(function()
	{
		$(".wxname").removeClass("ui-hide");
	});
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
			$("#sdcms-submit").attr("disabled",true);
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
						$("#sdcms-submit").attr("disabled",false);
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