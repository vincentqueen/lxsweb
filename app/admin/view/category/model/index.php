<?php if(!defined('IN_SDCMS')) exit;?><!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="renderer" content="webkit">
<title>模型管理</title>
<link rel="stylesheet" href="{WEB_ROOT}public/css/ui.css">
<link rel="stylesheet" href="{WEB_ROOT}public/admin/css/layout.css">
<script src="{WEB_ROOT}public/js/jquery.js"></script>
<script src="{WEB_ROOT}public/js/ui.js?v=202409"></script>
</head>

<body>
    <div class="position">当前位置：栏目管理 > <a href="{THIS_LOCAL}">模型管理</a></div>
    <div class="border">
        <!---->
        <a href="{U('add')}" class="ui-btn ui-btn-info">添加模型</a>
        <a href="javascript:;" data-url="{U('copy')}" class="copy-iframe ui-btn ui-btn-yellow">复制模型</a>

        <form method="post" class="ui-form">
        <div class="ui-table-wrap">
        <table class="ui-table ui-table-border ui-table-hover ui-table-striped ui-mt ui-mb">
            <thead class="ui-thead-gray">
                <tr>
                    <th width="80">排序</th>
                    <th width="80">模型ID</th>
                    <th>模型名称</th>
                    <th width="120">标识</th>
                    <th width="80">状态</th>
                    <th width="300">操作</th>
                </tr>
            </thead>
            <tbody>
            {sdcms:rs top="0" table="sd_model" where="1=1" order="ordnum,id"}
            <tr>
                <td><input type="hidden" name="mid[]" value="{$rs[id]}"><input type="text" class="ui-form-ip" name="ordnum[]" id="ordnum_{$rs[id]}" value="{$rs[ordnum]}" data-rule="required;int;"></td>
                <td>{$rs[id]}</td>
                <td class="ui-text-left">{$rs[title]}</td>
                <td>{$rs[tablename]}</td>
                <td><label class="ui-switch ui-switch-info"><input type="checkbox" {if $rs[islock]==1} checked{/if} data-url="{U('switchs','id='.$rs[id].'')}"><span class="ui-switch-checkbox ui-switch-text"></span></label></td>
                <td><a href="{U('modelfield/index',"mid=".$rs[id]."")}"><span class="ui-icon-file-text"></span> 字段管理</a>　<a href="javascript:;" class="copy-iframe" data-url="{U('copy',"id=".$rs[id]."")}"><span class="ui-icon-file-copy"></span> 复制</a>　<a href="{U('edit',"id=".$rs[id]."")}"><span class="ui-icon-edit"></span> 编辑</a>　<a href="javascript:;" class="del" data-url="{U('del','id='.$rs[id].'')}"><span class="ui-icon-delete"></span> 删除</a></td>
            </tr>
            {/sdcms:rs}
            </tbody>
        </table>
        </div>
        {if $total_rs!=0}<input type="hidden" name="token" value="{$token}"><button type="submit" class="ui-btn ui-btn-yellow">保存排序</button>{/if}
        </form>
        <!---->
    </div>
    
<script>
$(function()
{
	$('.ui-switch input[type=checkbox]').on('click',function()
	{
		var url=$(this).attr("data-url");
		var result=($(this).is(':checked'))?1:0;
		$.ajax(
		{
			url:url,
			type:"post",
			dataType:'json',
			data:"token={$token}&state="+result,
			error:function(e){alert(e.responseText);},
			success:function(d)
			{
				if(d.state=='success')
				{
					sdcms.success(d.msg);
				}
				else
				{
					sdcms.error(d.msg);
				}
			}
		});
	});
    $(".copy-iframe").click(function()
    {
        var url=$(this).attr("data-url");
        $.dialogbox(
        {
            'title':"复制模型",
            'text':url,
            'width':'500px',
            'height':'230px',
            'type':3,
            'oktheme':'ui-btn-info',
            'ok':function(e)
            {
                e.iframe().contents().find("#sdcms-submit").click();
            }
        });
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
	$(".del").click(function()
	{
		var url=$(this).attr("data-url");
		$.dialog(
		{
			'title':"操作提示",
			'text':"确定要删除？不可恢复！",
			'oktheme':'ui-btn-info',
			'ok':function(e)
			{
				$.ajax(
				{
                    url:url,
					type:'post',
					dataType:'json',
					data:'token={$token}',
					error:function(e){alert(e.responseText);},
                    success:function(d)
                    {
                        e.close();
                        if(d.state=='success')
                        {
                            sdcms.success(d.msg);
                            setTimeout(function(){location.href='{THIS_LOCAL}';},1000);
                        }
                        else
                        {
                            sdcms.error(d.msg);
                        }
                    }
                });
			}
		});
    });
})
</script>
</body>
</html>