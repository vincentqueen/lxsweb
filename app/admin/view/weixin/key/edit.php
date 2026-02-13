<?php if(!defined('IN_SDCMS')) exit;?><!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="renderer" content="webkit">
<title>编辑关键字</title>
<link rel="stylesheet" href="{WEB_ROOT}public/css/ui.css">
<link rel="stylesheet" href="{WEB_ROOT}public/admin/css/layout.css">
<script src="{WEB_ROOT}public/js/jquery.js"></script>
<script src="{WEB_ROOT}public/js/ui.js?v=202409"></script>
<script src="{WEB_ROOT}public/admin/js/base.js"></script>
</head>

<body>
    <div class="position">当前位置：微信公众号 > <a href="{U('index')}">关键字回复</a> > <a href="{THIS_LOCAL}">编辑关键字</a></div>
    <div class="border">
        <!---->
        <div class="form-subject">编辑关键字</div>
        <form class="ui-form" method="post">
            <div class="ui-form-group ui-row">
                <label class="col-left ui-col-form-label">关键字名称：</label>
                <div class="col-right">
                    <input type="text" name="t0" class="ui-form-ip" value="{$title}" placeholder="请输入关键字" data-rule="关键字:required;">
                </div>
            </div>
            <div class="ui-form-group ui-row">
                <label class="col-left ui-col-form-label">回复类型：</label>
                <div class="col-right">
                    <select name="t1" id="t1" class="ui-form-ip" data-rule="回复类型:required;">
                    	<option value="">请选择回复类型</option>
                        <option value="1"{if $reply_type==1} selected{/if}>文本回复</option>
                        <option value="2"{if $reply_type==2} selected{/if}>图文素材</option>
                    </select>
                </div>
            </div>
            <div class="ui-form-group ui-row" id="reply_content">
                <label class="col-left ui-col-form-label">回复内容：</label>
                <div class="col-right">
                    <textarea name="t2" rows="5" class="ui-form-ip" data-rule="回复内容:required;">{$reply_text}</textarea>
                </div>
            </div>
            <div class="ui-form-group ui-row" id="reply_id">
                <label class="col-left ui-col-form-label">素材选择：</label>
                <div class="col-right">
                	<div class="ui-btn-group">
                        <a class="ui-btn-group-item" href="javascript:;" id="select_master" data-name="t3" data-url="{U('all')}">选择素材</a>
                        <a class="ui-btn-group-item" href="javascript:;" id="delete_master" data-name="t3">清空素材</a>
                    </div>
                    <input type="hidden" name="t3" id="t3" class="ui-form-ip" value="{$reply_id}">
                    <div class="master_box">
                        {sdcms:rp top="1" field="id,title" table="sd_mater" where="islock=1 and id=$reply_id" order="id desc" auto="j"}
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
                </div>
            </div>
            <div class="ui-form-group ui-row">
                <label class="col-left">匹配方式：</label>
                <div class="col-right">
                	<label class="ui-radio"><input type="radio" name="t4" id="t4_1" value="1" {if $matchtype==1} checked{/if}><i></i>模糊匹配</label>
                    <label class="ui-radio"><input type="radio" name="t4" id="t4_2" value="2" {if $matchtype==2} checked{/if}><i></i>完全匹配</label>
                </div>
            </div>
            <div class="ui-form-group ui-row">
                <label class="col-left ui-col-form-label">排序：</label>
                <div class="col-right">
                    <input type="text" name="t5" class="ui-form-ip" value="{$ordnum}">
                    <span class="input-tips">数字越小越靠前</span>
                </div>
            </div>
            <div class="ui-form-group ui-row">
                <label class="col-left">状态：</label>
                <div class="col-right">
                	<label class="ui-radio"><input type="radio" name="t6" id="t6_1" value="1" {if $islock==1} checked{/if}><i></i>启用</label>
                    <label class="ui-radio"><input type="radio" name="t6" id="t6_2" value="0" {if $islock==0} checked{/if}><i></i>锁定</label>
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
    {if $reply_type==0}
	$("#reply_content,#reply_id").addClass("dis");
	{/if}
	{if $reply_type==1}
	$("#reply_content").removeClass("dis");$("#reply_id").addClass("dis");
	{/if}
	{if $reply_type==2}
	$("#reply_content").addClass("dis");$("#reply_id").removeClass("dis");
	{/if}
	$("#t1").change(function()
	{
		switch ($(this).val())
		{
			case "1":
				$("#reply_content").removeClass("dis");$("#reply_id").addClass("dis");
				break;
			case "2":
				$("#reply_content").addClass("dis");$("#reply_id").removeClass("dis");
				break;
			default:
				$("#reply_content,#reply_id").addClass("dis");
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