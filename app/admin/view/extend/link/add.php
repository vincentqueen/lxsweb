<?php if(!defined('IN_SDCMS')) exit;?><!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="renderer" content="webkit">
<title>添加链接</title>
<link rel="stylesheet" href="{WEB_ROOT}public/css/ui.css">
<link rel="stylesheet" href="{WEB_ROOT}public/admin/css/layout.css">
<script src="{WEB_ROOT}public/js/jquery.js"></script>
<script src="{WEB_ROOT}public/js/ui.js?v=202409"></script>
<script src="{WEB_ROOT}public/js/dropzone.js"></script>
<script src="{WEB_ROOT}public/admin/js/base.js"></script>
</head>

<body class="bg_white">
	
    <div class="border_iframe">
        <!---->
        <form class="ui-form" method="post">
            <div class="ui-form-group ui-row">
                <label class="ui-col-3 ui-col-form-label">网站名称：</label>
                <div class="ui-col-9">
                    <input type="text" name="t0" class="ui-form-ip" placeholder="请输入网站名称" data-rule="网站名称:required;">
                </div>
            </div>
            <div class="ui-form-group ui-row{if C('link_logo')==0} dis{/if}">
                <label class="ui-col-3 ui-col-form-label">网站Logo：</label>
                <div class="ui-col-9">
                    <div class="ui-input-group">
                        <input type="text" name="t1" id="t1" class="ui-form-ip radius-right-none">
                        <a class="after dropzone ui-icon-cloud-upload radius-none" config="t1" url="{U('upload/upfile','type=1&mode=1')}" maxsize="{C('upload_image_max')}" data-thumb="0" title="上传">上传</a>
                        <a class="after ui-lightbox ui-icon-zoomin" data-id="t1" data-name="lightbox-pic" title="网站Logo">预览</a>
                    </div>
                    <span class="input-tips"></span>
                </div>
            </div>
            <div class="ui-form-group ui-row">
                <label class="ui-col-3 ui-col-form-label">网址：</label>
                <div class="ui-col-9">
                    <input type="text" name="t2" class="ui-form-ip" placeholder="请输入网址" data-rule="网址:required;">
                </div>
            </div>
            <div class="ui-form-group ui-row {if C('link_class')==0} dis{/if}">
                <label class="ui-col-3 ui-col-form-label">类别：</label>
                <div class="ui-col-9">
                    <select name="t3" class="ui-form-ip">
                    	<option value="0" >不分类</option>
                    	{php $arr=explode("\r\n",C('link_class_data'))}
                        {foreach $arr as $key=>$val}
                        {php list($a,$b)=explode('|',$val)}
                        <option value="{$b}">{$a}</option>
                        {/foreach}
                    </select>
                </div>
            </div>
            <div class="ui-form-group ui-row">
                <label class="ui-col-3 ui-col-form-label">排序：</label>
                <div class="ui-col-9">
                    <input type="text" name="t4" class="ui-form-ip" value="0">
                    <span class="input-tips">数字越小越靠前</span>
                </div>
            </div>
            <div class="ui-form-group ui-row">
                <label class="ui-col-3 ui-col-form-label">状态：</label>
                <div class="ui-col-9 col-right-top">
                    <label class="ui-radio"><input type="radio" name="t5" value="1" checked><i></i>启用</label>
                    <label class="ui-radio"><input type="radio" name="t5" value="0"><i></i>锁定</label>
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
$(".dropzone").dropzone(
{
	maxFiles:1,
	acceptedFiles:".jpg,.gif,.png",
	success:function(file,data,that)
	{
		data=jQuery.parseJSON(data);
        this.removeFile(file);
		if(data.state=="success")
		{
			sdcms.success("上传成功");
			$("#"+$(that).attr("config")).val(data.msg);
		}
		else
		{
			sdcms.error("上传失败："+data.msg);
		}
	},
	sending:function(file)
	{
		sdcms.loading("正在上传，请稍等");
	},
	totaluploadprogress:function(progress)
	{
		$.progress((Math.round(progress*100)/100)+"%");
	},
	queuecomplete:function(progress)
	{
		$.progress('close');
	},
	error:function(file,msg)
	{
		sdcms.error(msg);
	}
});
</script>
</body>
</html>