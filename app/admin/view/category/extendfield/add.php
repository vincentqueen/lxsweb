<?php if(!defined('IN_SDCMS')) exit;?><!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="renderer" content="webkit">
<title>添加字段</title>
<link rel="stylesheet" href="{WEB_ROOT}public/css/ui.css">
<link rel="stylesheet" href="{WEB_ROOT}public/admin/css/layout.css">
<script src="{WEB_ROOT}public/js/jquery.js"></script>
<script src="{WEB_ROOT}public/js/ui.js?v=202409"></script>
</head>

<body>
    <div class="position">当前位置：栏目管理 > <a href="{U('extend/index')}">内容扩展</a> > <a href="{U('index',"eid=".$eid."")}">{$mtitle}</a> > <a href="{U('index',"eid=".$eid."")}">字段管理</a> > <a href="{THIS_LOCAL}">添加字段</a></div>
    <div class="borders">
        <!---->
        
        <div class="ui-tabs ui-tabs-white" data-href="1">
            <ul class="ui-tabs-nav">
              <li class="active"><a href="{THIS_LOCAL}">添加字段</a></li>
            </ul>
            <div class="ui-tabs-content">
                <div class="ui-tabs-pane active">
                    <!--loop-->
                    <form class="ui-form" method="post">
                        <div class="ui-form-group ui-row">
                            <label class="col-left ui-col-form-label">字段名称：</label>
                            <div class="col-right">
                                <input type="text" name="t0" class="ui-form-ip" placeholder="请输入字段名称" data-rule="字段名称:required;">
                            </div>
                        </div>
                        <div class="ui-form-group ui-row">
                            <label class="col-left ui-col-form-label">字段Key：</label>
                            <div class="col-right">
                                <input type="text" name="t1" class="ui-form-ip" placeholder="字母和数字的组合，长度3-50个字符" data-rule="字段Key:required;">
                            </div>
                        </div>
                        <div class="ui-form-group ui-row">
                            <label class="col-left ui-col-form-label">字段类型：</label>
                            <div class="col-right">
                                <select name="t2" id="t2" class="ui-form-ip" data-rule="字段类型:required;">
                                    <option value="">请选择字段类型</option>
                                    <option value="1">普通文本</option>
                                    <option value="2">下拉列表</option>
                                </select>
                            </div>
                        </div>
                        <div class="ui-form-group ui-row dis" id="listval">
                            <label class="col-left ui-col-form-label">候选值：</label>
                            <div class="col-right">
                                <textarea name="t3" class="ui-form-ip" rows="5" cols="50" data-rule="候选值:required;"></textarea>
                                <span class="gray"><br>示范：项目名称1<br>　　　项目名称2</span>
                            </div>
                        </div>
                        <div class="ui-form-group ui-row">
                            <label class="col-left ui-col-form-label">默认值：</label>
                            <div class="col-right">
                                <input type="text" name="t4" class="ui-form-ip">
                            </div>
                        </div>
                        <div class="ui-form-group ui-row">
                            <label class="col-left ui-col-form-label">字段排序：</label>
                            <div class="col-right">
                                <input type="text" name="t5" class="ui-form-ip" value="0">
                                <span class="input-tips">数字越小越靠前</span>
                            </div>
                        </div>
                        <div class="ui-form-group ui-row">
                            <label class="col-left ui-col-form-label">状态：</label>
                            <div class="col-right col-right-top">
                                <label class="ui-radio"><input type="radio" name="t6" value="1" checked><i></i>正常</label>
                                <label class="ui-radio"><input type="radio" name="t6" value="0"><i></i>锁定</label>
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
    $("#t2").change(function(){
        switch ($(this).val())
        {
            case "1":
				$("#listval").addClass("dis");
				break;
            case "2":
				$("#listval").removeClass("dis");
				break;
        }
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
                        setTimeout(function(){location.href='{U("index","eid=".$eid."")}';},1500);
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