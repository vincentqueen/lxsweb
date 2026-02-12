<?php if(!defined('IN_SDCMS')) exit;?><!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="renderer" content="webkit">
<title>添加表单</title>
<link rel="stylesheet" href="{WEB_ROOT}public/css/ui.css">
<link rel="stylesheet" href="{WEB_ROOT}public/admin/css/layout.css">
<script src="{WEB_ROOT}public/js/jquery.js"></script>
<script src="{WEB_ROOT}public/js/ui.js?v=202409"></script>
<script src="{WEB_ROOT}public/admin/js/base.js"></script>
</head>

<body>
    <div class="position">当前位置：栏目管理 > <a href="{U('index')}">表单管理</a> > <a href="{THIS_LOCAL}">添加表单</a></div>
    <div class="borders">
        <!---->
        <form class="ui-form" method="post">
        <div class="ui-tabs ui-tabs-white">
            <ul class="ui-tabs-nav">
                <li class="active"><a href="javascript:;">基本设置</a></li>
                <li><a href="javascript:;">模板设置</a></li>
                <li><a href="javascript:;">Seo设置</a></li>
            </ul>
            <div class="ui-tabs-content">
                <div class="ui-tabs-pane active">
                    <!--1111-->
                    <div class="ui-form-group ui-row">
                        <label class="col-left ui-col-form-label">表单名称：</label>
                        <div class="col-right">
                            <input type="text" name="t0" class="ui-form-ip" placeholder="请输入表单名称" data-rule="表单名称:required;">
                        </div>
                    </div>
                    <div class="ui-form-group ui-row">
                        <label class="col-left ui-col-form-label">表单标识：</label>
                        <div class="col-right">
                            <input type="text" name="t1" class="ui-form-ip" maxlength="20" placeholder="字母和数字的组合，长度3-50个字符" data-rule="表单标识:required;">
                        </div>
                    </div>
                    <div class="ui-form-group ui-row">
                        <label class="col-left ui-col-form-label">验证码：</label>
                        <div class="col-right col-right-top">
                            <label class="ui-radio"><input type="radio" name="t2" value="1" checked><i></i>启用</label>
                            <label class="ui-radio"><input type="radio" name="t2" value="0" ><i></i>锁定</label>
                        </div>
                    </div>
                    <div class="ui-form-group ui-row">
                        <label class="col-left ui-col-form-label">提交后返回：</label>
                        <div class="col-right col-right-top">
                            <label class="ui-radio"><input type="radio" name="t11" value="1" checked><i></i>列表页</label>
                            <label class="ui-radio"><input type="radio" name="t11" value="2" ><i></i>当前页</label>
                        </div>
                    </div>
                    <div class="ui-form-group ui-row">
                        <label class="col-left ui-col-form-label">邮件提醒：</label>
                        <div class="col-right">
                            <select name="t12" class="ui-form-ip">
                                <option value="0">不使用邮件提醒</option>
                                {sdcms:rs top="0" table="sd_temp_mail" where="islock=1 and mkey=''" order="id desc"}
                                <option value="{$rs[id]}">{$rs[title]}</option>
                                {/sdcms:rs}
                            </select>
                            <span class="input-tips">可在邮件模板中新建</span>
                        </div>
                    </div>
                    <div class="ui-form-group ui-row">
                        <label class="col-left ui-col-form-label">会员提交：</label>
                        <div class="col-right col-right-top">
                            <label class="ui-radio"><input type="radio" name="t13" value="1" ><i></i>开启</label>
                            <label class="ui-radio"><input type="radio" name="t13" value="0" checked><i></i>关闭</label>
                            <span class="input-tips">开启后，必须会员才能提交</span>
                        </div>
                    </div>
					<div class="ui-form-group ui-row">
                        <label class="col-left ui-col-form-label">审核设置：</label>
                        <div class="col-right col-right-top">
                            <label class="ui-radio"><input type="radio" name="t14" value="0" checked><i></i>需要审核</label>
                            <label class="ui-radio"><input type="radio" name="t14" value="1" ><i></i>直接通过</label>
							<span class="input-tips">提交后是否需要审核</span>
                        </div>
                    </div>
					<div class="ui-form-group ui-row"> 
                        <label class="col-left ui-col-form-label">提交限制：</label>
                        <div class="col-right">
                            <input type="text" name="t15" class="ui-form-ip">
                            <span class="input-tips">单位：分钟，为0时不限制</span>
                        </div>
                    </div>
                    <div class="ui-form-group ui-row"> 
                        <label class="col-left ui-col-form-label">表单排序：</label>
                        <div class="col-right">
                            <input type="text" name="t3" class="ui-form-ip" value="0">
                            <span class="input-tips">数字越小越靠前</span>
                        </div>
                    </div>
                    <div class="ui-form-group ui-row">
                        <label class="col-left ui-col-form-label">状态：</label>
                        <div class="col-right col-right-top">
                            <label class="ui-radio"><input type="radio" name="t4" value="1" checked><i></i>启用</label>
                            <label class="ui-radio"><input type="radio" name="t4" value="0"><i></i>锁定</label>
                        </div>
                    </div>
                    <!--1111-->
                </div>
                
                <div class="ui-tabs-pane">
                    <!--2222-->
                    <div class="ui-form-group ui-row">
                        <label class="col-left ui-col-form-label">提交模板：</label>
                        <div class="col-right">
                        	<div class="ui-input-group">
                            	<input type="text" name="t5" id="t5" class="ui-form-ip radius-right-none">
                                <a class="after template ui-icon-select" data-name="t5" data-url="{U('theme/template')}" title="选择">选择</a>
                            </div>
                        </div>
                    </div>
                    <div class="ui-form-group ui-row">
                        <label class="col-left ui-col-form-label">列表模板：</label>
                        <div class="col-right">
                        	<div class="ui-input-group">
                            	<input type="text" name="t6" id="t6" class="ui-form-ip radius-right-none">
                                <a class="after template ui-icon-select" data-name="t6" data-url="{U('theme/template')}" title="选择">选择</a>
                            </div>
                        </div>
                    </div>
                    <div class="ui-form-group ui-row">
                        <label class="col-left ui-col-form-label">内容模板：</label>
                        <div class="col-right">
                        	<div class="ui-input-group">
                            	<input type="text" name="t7" id="t7" class="ui-form-ip radius-right-none">
                                <a class="after template ui-icon-select" data-name="t7" data-url="{U('theme/template')}" title="选择">选择</a>
                            </div>
                        </div>
                    </div>
                    <!--2222-->
                </div>
                
                <div class="ui-tabs-pane">
                    <!--3333-->
                    <div class="ui-form-group ui-row">
                        <label class="col-left ui-col-form-label">优化标题：</label>
                        <div class="col-right">
                            <input type="text" name="t8" class="ui-form-ip">
                        </div>
                    </div>
                    <div class="ui-form-group ui-row">
                        <label class="col-left ui-col-form-label">关键字：</label>
                        <div class="col-right">
                            <input type="text" name="t9" class="ui-form-ip">
                        </div>
                    </div>
                    <div class="ui-form-group ui-row">
                        <label class="col-left ui-col-form-label">描述：</label>
                        <div class="col-right">
                            <textarea name="t10" rows="4" class="ui-form-ip ui-form-limit" data-max="255"></textarea>
                            <div class="ui-form-limit-text"><span>0</span>/255</div>
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
   
<script>
$(function()
{
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