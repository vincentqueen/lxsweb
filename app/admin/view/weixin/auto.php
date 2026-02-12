<?php if(!defined('IN_SDCMS')) exit;?><!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="renderer" content="webkit">
<title>自动回复</title>
<link rel="stylesheet" href="{WEB_ROOT}public/css/ui.css">
<link rel="stylesheet" href="{WEB_ROOT}public/admin/css/layout.css">
<script src="{WEB_ROOT}public/js/jquery.js"></script>
<script src="{WEB_ROOT}public/js/ui.js?v=202409"></script>
<script src="{WEB_ROOT}public/admin/js/base.js"></script>
</head>

<body>
    <div class="position">当前位置：微信公众号 > <a href="{THIS_LOCAL}">自动回复</a></div>
    <div class="border">
        <!---->
        <div class="form-subject">自动回复</div>
        <form class="ui-form" method="post">
            <div class="ui-form-group ui-row">
                <label class="col-left ui-col-form-label">是否启用：</label>
                <div class="col-right">
                    <select name="t0" id="t0" class="ui-form-ip" data-rule="是否启用:required;">
                    	<option value="0"{if $reply_type==0} selected{/if}>关闭</option>
                        <option value="1"{if $reply_type==1} selected{/if}>文本回复</option>
                        <option value="2"{if $reply_type==2} selected{/if}>图文素材</option>
                    </select>
                </div>
            </div>
            <div class="ui-form-group ui-row" id="reply_content">
                <label class="col-left ui-col-form-label">回复内容：</label>
                <div class="col-right">
                    <textarea name="t1" rows="5" class="ui-form-ip" data-rule="回复内容:required;">{$reply_text}</textarea>
                </div>
            </div>
            <div class="ui-form-group ui-row" id="reply_id">
                <label class="col-left ui-col-form-label">素材选择：</label>
                <div class="col-right">
                	<div class="ui-btn-group">
                        <a class="ui-btn-group-item" href="javascript:;" id="select_master" data-name="t2" data-url="{U('all')}">选择素材</a>
                        <a class="ui-btn-group-item" href="javascript:;" id="delete_master" data-name="t2">清空素材</a>
                    </div>
                    <input type="hidden" name="t2" id="t2" class="ui-form-ip" value="{$reply_id}">
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
                <label class="col-left ui-col-form-label"></label>
                <div class="col-right">
                	<input type="hidden" name="token" id="token" value="{$token}">
                    <button type="submit" class="ui-btn ui-btn-info">保存</button>
                </div>
            </div>
        </form>
        <!---->
    </div>

<script>
$(function()
{
	{if $reply_type==0}
	$("#reply_content,#reply_id").addClass("dis");
	{/if}
	{if $reply_type==1}
	$("#reply_content").removeClass("dis");$("#reply_id").addClass("dis");
	{/if}
	{if $reply_type==2}
	$("#reply_content").addClass("dis");$("#reply_id").removeClass("dis");
	{/if}
	$("#t0").change(function()
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
	});

	$("#delete_master").click(function()
	{
		$(".master_box").html("");
		$("#t2").val("0");
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
						setTimeout(function(){location.href='{THIS_LOCAL}';},1500);
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