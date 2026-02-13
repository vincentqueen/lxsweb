<?php if(!defined('IN_SDCMS')) exit;?><!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="renderer" content="webkit">
<title>会员组管理</title>
<link rel="stylesheet" href="{WEB_ROOT}public/css/ui.css">
<link rel="stylesheet" href="{WEB_ROOT}public/admin/css/layout.css">
<script src="{WEB_ROOT}public/js/jquery.js"></script>
<script src="{WEB_ROOT}public/js/ui.js?v=202409"></script>
</head>

<body>
    <div class="position">当前位置：会员管理 > <a href="{U('index')}">会员组管理</a></div>
    <div class="border">
        <!---->
        <a href="javascript:;" data-url="{U('add')}" class="add-iframe ui-btn ui-btn-info ui-mr-sm ui-mb">添加会员组</a>

        <form method="post" class="ui-form">
        <table class="ui-table ui-table-border ui-table-hover ui-table-striped ui-mb">
            <thead class="ui-thead-gray">
                <tr>
                    <th width="80">排序</th>
                    <th width="80">ID</th>
                    <th>会员组名称</th>
                    <th width="120">操作</th>
                </tr>
            </thead>
            <tbody>
            {sdcms:rs top="0" table="sd_user_group" where="1=1" order="ordnum,gid"}
            {rs:eof}<tr>
                <td colspan="4">没有资料</td>
            </tr>{/rs:eof}
            <tr>
                <td><input type="hidden" name="mid[]" value="{$rs[gid]}"><input type="text" name="ordnum[]" class="ui-form-ip" id="ordnum_{$rs[gid]}" value="{$rs[ordnum]}" data-rule="required;int;"></td>
                <td>{$rs[gid]}</td>
                <td class="ui-text-left">{$rs[gname]}</td>
                <td><a href="javascript:;" data-url="{U('edit',"id=".$rs[gid]."")}" class="edit-iframe"><span class="ui-icon-edit"></span> 编辑</a>　<a href="javascript:;" class="del" data-url="{U('del','id='.$rs[gid].'')}"><span class="ui-icon-delete"></span> 删除</a></td>
            </tr>
            {/sdcms:rs}
            </tbody>
        </table>
        {if $total_rs>0}<input type="hidden" name="token" value="{$token}"><button type="submit" class="ui-btn ui-btn-yellow">保存排序</button>{/if}
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
			'title':"添加会员组",
			'text':url,
			'width':'450px',
			'height':'200px',
			'type':3,
			'oktheme':'ui-btn-info',
			'ok':function(e)
			{
				e.iframe().contents().find("#sdcms-submit").click();
			}
		});
	});
	$(".edit-iframe").click(function()
	{
		var url=$(this).attr("data-url");
		$.dialogbox(
		{
			'title':"编辑会员组",
			'text':url,
			'width':'450px',
			'height':'200px',
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