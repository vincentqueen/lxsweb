<?php if(!defined('IN_SDCMS')) exit;?><!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="renderer" content="webkit">
<title>部门管理</title>
<link rel="stylesheet" href="{WEB_ROOT}public/css/ui.css">
<link rel="stylesheet" href="{WEB_ROOT}public/admin/css/layout.css">
<script src="{WEB_ROOT}public/js/jquery.js"></script>
<script src="{WEB_ROOT}public/js/ui.js?v=202409"></script>
</head>

<body>

<div class="position">当前位置：网站管理 > <a href="{THIS_LOCAL}">部门管理</a></div>
<div class="border">
    <!---->
    <a href="javascript:;" data-url="{U('add')}" class="add-iframe ui-btn ui-btn-info">添加部门</a>
    <form method="post" class="ui-form">
    <div class="ui-table-wrap">
    <table class="ui-table ui-table-border ui-table-hover ui-table-striped ui-mt ui-mb">
        <thead class="ui-thead-gray">
            <tr>
                <th width="80">排序</th>
                <th width="80">ID</th>
                <th>部门名称</th>
                <th width="350">操作</th>
            </tr>
        </thead>
        <tbody>
        {sdcms:rs top="0" table="sd_admin_part"  order="ordnum,id"}
        <tr>
            <td><input type="hidden" name="mid[]" value="{$rs[id]}"><input type="text" class="ui-form-ip" name="ordnum[]" id="ordnum_{$rs[id]}" value="{$rs[ordnum]}" data-rule="required;int;"></td>
            <td>{$rs[id]}</td>
            <td class="ui-text-left">{$rs[title]}</td>
            <td><a href="javascript:;" data-url="{U('page',"id=".$rs[id]."")}" class="lever-iframe" data-title="页面权限"><span class="ui-icon-lock"></span> 页面权限</a>　<a href="javascript:;" data-url="{U('cate',"id=".$rs[id]."")}" class="lever-iframe" data-title="栏目权限"><span class="ui-icon-lock"></span> 栏目权限</a>　<a href="javascript:;" data-url="{U('edit',"id=".$rs[id]."")}" class="edit-iframe"><span class="ui-icon-edit"></span> 编辑</a>　<a href="javascript:;" class="del" data-url="{U('del','id='.$rs[id].'')}"><span class="ui-icon-delete"></span> 删除</a></td>
        </tr>
        {/sdcms:rs}
        </tbody>
    </table>
    </div>
    {if $total_rs!=0}
    <input type="hidden" name="token" value="{$token}">
    <button type="submit" class="ui-btn ui-btn-yellow">保存排序</button>
    {/if}
    </form>
    <!---->
</div>

<script>
$(function()
{
    $(".add-iframe").click(function()
	{
		var url=$(this).attr("data-url");
		$.dialogbox(
		{
			'title':"添加部门",
			'text':url,
			'width':'600px',
			'height':'320px',
			'type':3,
			'oktheme':'ui-btn-info',
			'ok':function(e)
			{
				e.iframe().contents().find("#sdcms-submit").click();
			}
		});
	});
	$(".lever-iframe").click(function()
	{
		var url=$(this).attr("data-url");
		var title=$(this).attr("data-title");
		$.dialogbox(
		{
			'title':title,
			'text':url,
			'width':'600px',
			'height':'350px',
			'type':3,
			'oktheme':'ui-btn-info',
			'ok':function(e)
			{
				e.iframe().contents().find("#sdcms-submit").click();
			}
		});
	});
	$(".edit-iframe").click(function(){
		var url=$(this).attr("data-url");
		$.dialogbox(
		{
			'title':"编辑部门",
			'text':url,
			'width':'600px',
			'height':'320px',
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
