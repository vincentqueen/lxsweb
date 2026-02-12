<?php if(!defined('IN_SDCMS')) exit;?><!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="renderer" content="webkit">
<title>添加分类</title>
<link rel="stylesheet" href="{WEB_ROOT}public/css/ui.css">
<link rel="stylesheet" href="{WEB_ROOT}public/admin/css/layout.css">
<script src="{WEB_ROOT}public/js/jquery.js"></script>
<script src="{WEB_ROOT}public/js/ui.js?v=202409"></script>
</head>

<body>
    <div class="position">当前位置：社区管理 > <a href="{U('index')}">社区分类</a> > <a href="{THIS_LOCAL}">添加分类</a></div>
    <div class="borders">
        <!---->
        
        <div class="ui-tabs ui-tabs-white" data-href="1">
            <ul class="ui-tabs-nav">
              <li class="active"><a href="{THIS_LOCAL}">添加分类</a></li>
            </ul>
            <div class="ui-tabs-content">
                <div class="ui-tabs-pane active">
                    <!--loop-->
                    <form class="ui-form" method="post">
                        <div class="ui-form-group ui-row">
                            <label class="col-left ui-col-form-label">分类名称：</label>
                            <div class="col-right">
                                <input type="text" name="t0" class="ui-form-ip" placeholder="请输入分类名称" data-rule="分类名称:required;">
                            </div>
                        </div>
						<div class="ui-form-group ui-row">
                            <label class="col-left ui-col-form-label">分类图标：</label>
                            <div class="col-right">
                                <input type="text" name="t9" class="ui-form-ip" placeholder="请输入分类图标">
								<span class="input-tips"><a href="http://ui.sdcms.cn/icon.html" target="_blank">查看图标</a></span>
                            </div>
                        </div>
                        <div class="ui-form-group ui-row">
                            <label class="col-left ui-col-form-label">优化标题：</label>
                            <div class="col-right">
                                <input type="text" name="t1" class="ui-form-ip">
                            </div>
                        </div>
                        <div class="ui-form-group ui-row">
                            <label class="col-left ui-col-form-label">关键字：</label>
                            <div class="col-right">
                                <input type="text" name="t2" class="ui-form-ip">
                            </div>
                        </div>
                        <div class="ui-form-group ui-row">
                            <label class="col-left ui-col-form-label">描述：</label>
                            <div class="col-right">
                                <textarea name="t3" class="ui-form-ip" rows="3" cols="50"></textarea>
                            </div>
                        </div>
                        <div class="ui-form-group ui-row">
                            <label class="col-left">查看权限：</label>
                            <div class="col-right">
                                {sdcms:rs top="0" table="sd_user_group" order="ordnum,gid"}
                                <label class="ui-checkbox"><input type="checkbox" name="t6[]" value="{$rs[gid]}"><i></i>{$rs[gname]}</label>
                                {/sdcms:rs}
                                <span class="input-tips">如果未勾选，则所有人都可以查看帖子</span>
                            </div>
                        </div>
                        <div class="ui-form-group ui-row">
                            <label class="col-left">发帖权限：</label>
                            <div class="col-right">
                                {sdcms:rs top="0" table="sd_user_group" order="ordnum,gid"}
                                <label class="ui-checkbox"><input type="checkbox" name="t7[]" value="{$rs[gid]}"><i></i>{$rs[gname]}</label>
                                {/sdcms:rs}
                                <span class="input-tips">如果未勾选，则所有用户均可发帖</span>
                            </div>
                        </div>
                        <div class="ui-form-group ui-row">
                            <label class="col-left">回帖权限：</label>
                            <div class="col-right">
                                {sdcms:rs top="0" table="sd_user_group" order="ordnum,gid"}
                                <label class="ui-checkbox"><input type="checkbox" name="t8[]" value="{$rs[gid]}"><i></i>{$rs[gname]}</label>
                                {/sdcms:rs}
                                <span class="input-tips">如果未勾选，则所有用户均可回帖</span>
                            </div>
                        </div>
                        <div class="ui-form-group ui-row">
                            <label class="col-left ui-col-form-label">排序：</label>
                            <div class="col-right">
                                <input type="text" name="t4" class="ui-form-ip" value="0">
                                <span class="input-tips">数字越小越靠前</span>
                            </div>
                        </div>
                        <div class="ui-form-group ui-row">
                            <label class="col-left ui-col-form-label">状态：</label>
                            <div class="col-right col-right-top">
                                <label class="ui-radio"><input type="radio" name="t5" id="t5_1" value="1" checked><i></i>启用</label>
                                <label class="ui-radio"><input type="radio" name="t5" id="t5_2" value="0"><i></i>锁定</label>
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