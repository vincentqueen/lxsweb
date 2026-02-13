<?php if(!defined('IN_SDCMS')) exit;?><!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="renderer" content="webkit">
<title>添加模型</title>
<link rel="stylesheet" href="{WEB_ROOT}public/css/ui.css">
<link rel="stylesheet" href="{WEB_ROOT}public/admin/css/layout.css">
<script src="{WEB_ROOT}public/js/jquery.js"></script>
<script src="{WEB_ROOT}public/js/ui.js?v=202409"></script>
<script src="{WEB_ROOT}public/admin/js/base.js"></script>
</head>

<body>
    <div class="position">当前位置：栏目管理 > <a href="{U('index')}">模型管理</a> > <a href="{THIS_LOCAL}">添加模型</a></div>
    <div class="borders">
		<form class="ui-form" method="post">
        <div class="ui-tabs ui-tabs-white">
            <ul class="ui-tabs-nav">
                <li class="active"><a href="javascript:;">基本设置</a></li>
                <li><a href="javascript:;">模板设置</a></li>
                <li><a href="javascript:;">可选设置</a></li>
            </ul>
            <div class="ui-tabs-content">
                <div class="ui-tabs-pane active">
                    <!--1111-->
                    <div class="ui-form-group ui-row">
						<label class="col-left ui-col-form-label">模型名称：</label>
						<div class="col-right">
							<input type="text" name="t0" class="ui-form-ip" placeholder="请输入模型名称" data-rule="模型名称:required;">
						</div>
					</div>
					<div class="ui-form-group ui-row">
						<label class="col-left ui-col-form-label">模型标识：</label>
						<div class="col-right">
							<input type="text" name="t1" class="ui-form-ip" maxlength="20" placeholder="字母和数字的组合，长度3-50个字符" data-rule="模型标识:required;">
						</div>
					</div>
					<div class="ui-form-group ui-row">
						<label class="col-left ui-col-form-label">模型描述：</label>
						<div class="col-right">
							<input type="text" name="t2" class="ui-form-ip">
						</div>
					</div>
					
					<div class="ui-form-group ui-row">
						<label class="col-left ui-col-form-label">模型排序：</label>
						<div class="col-right">
							<input type="text" name="t5" class="ui-form-ip" value="0">
							<span class="input-tips">数字越小越靠前</span>
						</div>
					</div>
					
					<div class="ui-form-group ui-row">
						<label class="col-left ui-col-form-label">状态：</label>
						<div class="col-right col-right-top">
							<label class="ui-radio"><input type="radio" name="t6" id="t6_1" value="1" checked><i></i>启用</label>
							<label class="ui-radio"><input type="radio" name="t6" id="t6_2" value="0"><i></i>锁定</label>
						</div>
					</div>
                    <!--1111-->
                </div>
                
                <div class="ui-tabs-pane">
                    <!--2222-->
                    <div class="ui-form-group ui-row">
						<label class="col-left ui-col-form-label">列表模板：</label>
						<div class="col-right">
							<div class="ui-input-group">
								<input type="text" name="t3" id="t3" class="ui-form-ip radius-right-none">
								<a class="after template ui-icon-select" data-name="t3" data-url="{U('theme/template')}" title="选择">选择</a>
							</div>
						</div>
					</div>
					<div class="ui-form-group ui-row">
						<label class="col-left ui-col-form-label">内容模板：</label>
						<div class="col-right">
							<div class="ui-input-group">
								<input type="text" name="t4" id="t4" class="ui-form-ip radius-right-none">
								<a class="after template ui-icon-select" data-name="t4" data-url="{U('theme/template')}" title="选择">选择</a>
							</div>
						</div>
					</div>
                    <!--2222-->
                </div>
                
                <div class="ui-tabs-pane">
                    <!--3333-->
                    <div class="ui-form-group ui-row">
						<label class="col-left ui-col-form-label">阅读权限：</label>
						<div class="col-right col-right-top">
							<label class="ui-radio"><input type="radio" name="t8" value="1"><i></i>开启</label>
							<label class="ui-radio"><input type="radio" name="t8" value="0" checked><i></i>关闭</label>
							<span class="input-tips">文章类模型可以开启</span>
						</div>
					</div>
					<div class="ui-form-group ui-row">
						<label class="col-left ui-col-form-label">收费阅读：</label>
						<div class="col-right col-right-top">
							<label class="ui-radio"><input type="radio" name="t9" value="1"><i></i>开启</label>
							<label class="ui-radio"><input type="radio" name="t9" value="0" checked><i></i>关闭</label>
							<span class="input-tips">需要模型中存在【price】字段</span>
						</div>
					</div>
					<div class="ui-form-group ui-row">
						<label class="col-left ui-col-form-label">表单分组：</label>
						<div class="col-right">
							<textarea name="t7" class="ui-form-ip" rows="5" cols="50">基本设置|1
SEO设置|2
可选设置|3</textarea>
							<span class="input-tips">示范：项目名称1|项目值1<br>　　　项目名称2|项目值2</span>
						</div>
					</div>
                    <!--3333-->
                </div>

            </div>
        </div>
        
        <div class="ui-form-group ui-mt">
        	<input type="hidden" name="token" value="{$token}">
            <button type="submit" class="ui-btn ui-btn-info ui-mr-sm">保存</button>
            <button type="button" class="ui-btn ui-back">返回</button>
        </div>
        </form>
        <!---->
    </div>
        
    </div>

<script>
$(function()
{
	$(".ui-form").form(
	{
		type:2,
		align:'top-right',
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