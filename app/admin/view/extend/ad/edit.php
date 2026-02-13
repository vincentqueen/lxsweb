<?php if(!defined('IN_SDCMS')) exit;?><!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="renderer" content="webkit">
<title>编辑广告</title>
<link rel="stylesheet" href="{WEB_ROOT}public/css/ui.css">
<link rel="stylesheet" href="{WEB_ROOT}public/admin/css/layout.css">
<script src="{WEB_ROOT}public/js/jquery.js"></script>
<script src="{WEB_ROOT}public/js/ui.js?v=202409"></script>
<script src="{WEB_ROOT}public/js/dropzone.js"></script>
<script src="{WEB_ROOT}public/js/sortable.min.js"></script>
<script src="{WEB_ROOT}public/admin/js/base.js"></script>
</head>

<body>

    <div class="position">当前位置：扩展管理 > <a href="{U('index')}">广告管理</a> > <a href="{THIS_LOCAL}">编辑广告</a></div>
    <div class="border">
        <!---->
        <form class="ui-form" method="post">
        	<div class="form-subject">编辑广告</div>
            <div class="ui-form-group ui-row">
                <label class="col-left ui-col-form-label">广告名称：</label>
                <div class="col-right">
                    <input type="text" name="t0" class="ui-form-ip" value="{$title}" placeholder="请输入广告名称" data-rule="广告名称:required;">
                </div>
            </div>
            <div class="ui-form-group ui-row">
                <label class="col-left ui-col-form-label">广告内容：</label>
                <div class="col-right-full">
                    {php $data=jsdecode($datalist,1)}
                    <div class="ui-btn-group ui-mt-sm">
                        <a class="ui-btn-group-item fm-choose-ad ui-icon-cloud-upload" data-name="t1" data-url="{U('upload/imageupload','type=1&multiple=1')}" data-type="1" data-multiple="1" title="上传">上传</a>
                        <a class="ui-btn-group-item fm-choose-ad ui-icon-select" data-name="t1" data-url="{U('upload/imagelist','type=1&multiple=1')}" data-type="1" data-multiple="1" title="选择">选择</a>
                    </div>
                    <div class="imagelist">
                        <ul id="list_t1">
                            {if is_array($data)}
                            {foreach $data as $num=>$val}
                            <li num="{$num}">
                                <div class="preview">
                                    <input type="hidden" name="t1[{$num}][image]" value="{$val['image']}">
                                    <u href="{$val['image']}" class="ui-lightbox"><img src="{$val['image']}" /></u>
                                    <a href="javascript:;" class="fm-choose" data-name="preview" data-url="{U('upload/imageupload','type=1&multiple=1')}" data-type="0" data-multiple="0" title="选择"><i class="ui-icon-image ui-mr-sm"></i>换图</a>
                                </div>
                                <div class="intro">
                                    <textarea name="t1[{$num}][desc]" class="ui-form-ip" placeholder="请输入描述...">{if isset($val['desc'])}{deal_strip($val['desc'])}{/if}</textarea>
                                </div>
                                <div class="intro">
                                    <textarea name="t1[{$num}][url]" class="ui-form-ip" placeholder="请输入链接网址...">{deal_strip($val['url'])}</textarea>
                                </div>
                                <div class="action"><a href="javascript:;" class="img-left"><i class="ui-icon-left"></i>左移</a><a href="javascript:;" class="img-right"><i class="ui-icon-right"></i>右移</a><a href="javascript:;" class="img-del"><i class="ui-icon-delete"></i>删除</a></div>
                            </li>
                            {/foreach}
                            {/if}
                        </ul>
                    </div>
                </div>
            </div>
            <div class="ui-form-group ui-row">
                <label class="col-left ui-col-form-label">排序：</label>
                <div class="col-right">
                    <input type="text" name="t2" class="ui-form-ip" value="{$ordnum}">
                    <span class="input-tips">数字越小越靠前</span>
                </div>
            </div>
            <div class="ui-form-group ui-row">
                <label class="col-left ui-col-form-label">状态：</label>
                <div class="col-right col-right-top">
                	<label class="ui-radio"><input type="radio" name="t3" value="1" {if $islock==1} checked{/if}><i></i>启用</label>
                    <label class="ui-radio"><input type="radio" name="t3" value="0" {if $islock==0} checked{/if}><i></i>锁定</label>
                </div>
            </div>
            <div class="ui-form-group ui-row">
                <label class="col-left ui-col-form-label"></label>
                <div class="col-right">
                	<input type="hidden" name="token" value="{$token}">
                    <button type="submit" class="ui-btn ui-btn-info ui-mr">保存</button>
                    <button type="button" class="ui-btn ui-back">返回</button>
                </div>
            </div>
        </form>
        <!---->
    </div>

<script>
$(function()
{
	Sortable.create($("#list_t1")[0],{animation:400,});
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