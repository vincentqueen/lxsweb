<?php if(!defined('IN_SDCMS')) exit;?><!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="renderer" content="webkit">
<title>编辑帖子</title>
<link rel="stylesheet" href="{WEB_ROOT}public/css/ui.css">
<link rel="stylesheet" href="{WEB_ROOT}public/admin/css/layout.css">
<script>var api_url="{U('upload/imagelist','type=3&multiple=1&iseditor=1')}";</script>
<script src="{WEB_ROOT}public/js/jquery.js"></script>
<script src="{WEB_ROOT}public/js/ui.js?v=202409"></script>
<script src="{WEB_ROOT}public/admin/js/base.js"></script>
<script src="{WEB_ROOT}public/editor/editor.js?v=202409"></script>
</head>

<body>
    <div class="position">当前位置：论坛管理 > <a href="{U('index')}">帖子管理</a> > <a href="{THIS_LOCAL}">编辑帖子</a></div>
    <div class="borders">
        <!---->
        
        <div class="ui-tabs ui-tabs-white" data-href="1">
            <ul class="ui-tabs-nav">
              <li class="active"><a href="{THIS_LOCAL}">编辑帖子</a></li>
            </ul>
            <div class="ui-tabs-content">
                <div class="ui-tabs-pane active">
                    <!--loop-->
                    <form class="ui-form" method="post">
                        <div class="ui-form-group ui-row">
                            <label class="col-left ui-col-form-label">内容：</label>
                            <div class="col-right col-right-full">
                            	<script id="t0" name="t0" class="ui-editor" type="text/plain">{$content}</script>
                            </div>
                        </div>
                        <div class="ui-form-group ui-row">
                            <label class="col-left ui-col-form-label">回复：</label>
                            <div class="col-right col-right-full">
                            	<script id="t2" name="t2" class="ui-editor" type="text/plain">{$reply}</script>
                            </div>
                        </div>
                        <div class="ui-form-group ui-row">
                            <label class="col-left ui-col-form-label">状态：</label>
                            <div class="col-right col-right-top">
                                <label class="ui-radio"><input type="radio" name="t1" id="t1_1" value="1"{if $islock==1} checked{/if}><i></i>启用</label>
                                <label class="ui-radio"><input type="radio" name="t1" id="t1_2" value="0"{if $islock==0} checked{/if}><i></i>锁定</label>
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
                    <!--loop-->
                </div>
            </div>
        </div>
        
        <!---->
    </div>


<script>
$(function()
{
	$(".ui-editor").each(function()
	{
		var toolbar=$(this).data("toolbar");
		var id=$(this).attr("id");
		$("#"+id).editor({toolbar:toolbar,upload:'{U("upload/index")}',url:api_url,save:'{U("upload/outimage")}'});
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
                        setTimeout(function(){location.href='{U("index","")}';},1500);
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