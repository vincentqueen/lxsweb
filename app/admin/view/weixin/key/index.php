<?php if(!defined('IN_SDCMS')) exit;?><!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="renderer" content="webkit">
<title>关键字回复</title>
<link rel="stylesheet" href="{WEB_ROOT}public/css/ui.css">
<link rel="stylesheet" href="{WEB_ROOT}public/admin/css/layout.css">
<script src="{WEB_ROOT}public/js/jquery.js"></script>
<script src="{WEB_ROOT}public/js/ui.js?v=202409"></script>
</head>

<body>
    <div class="position">当前位置：微信公众号 > <a href="{THIS_LOCAL}">关键字回复</a></div>
    <div class="border">
        <!---->

        <a href="{U('add')}" class="ui-btn ui-btn-info ui-mr-sm">添加关键字</a>
        <form method="post" class="ui-form">
        <div class="ui-table-wrap">
        <table class="ui-table ui-table-border ui-table-hover ui-table-striped ui-mb ui-mt">
        	<thead class="ui-thead-gray">
                <tr>
                    <th width="80">排序</th>
                    <th width="80">ID</th>
                    <th>关键字</th>
                    <th width="100">类型</th>
                    <th width="100">匹配方式</th>
                    <th width="80">状态</th>
                    <th width="150">操作</th>
                </tr>
            </thead>
            <tbody>
            {sdcms:rs top="0" table="sd_auto_key" where="1=1" order="ordnum,id"}
            {rs:eof}
            <tr>
                <td colspan="7">暂无资料</td>
            </tr>
            {/rs:eof}
            <tr>
                <td><input type="hidden" name="mid[]" value="{$rs[id]}"><input type="text" class="ui-form-ip" name="ordnum[]" id="ordnum_{$rs[id]}" value="{$rs[ordnum]}" data-rule="required;int;"></td>
                <td>{$rs[id]}</td>
                <td class="ui-text-left">{$rs[title]}</td>
                <td>{iif($rs[reply_type]==1,'文本回复','<em>图文素材</em>')}</td>
                <td>{iif($rs[matchtype]==1,'模糊匹配','<em>完全匹配</em>')}</td>
                <td><label class="ui-switch ui-switch-info"><input type="checkbox" {if $rs[islock]==1} checked{/if} data-url="{U('switchs','id='.$rs[id].'')}"><span class="ui-switch-checkbox ui-switch-text"></span></label></td>
                <td><a href="{U('edit',"id=".$rs[id]."")}"><span class="ui-icon-edit"></span> 编辑</a>　<a href="javascript:;" class="del" data-url="{U('del','id='.$rs[id].'')}"><span class="ui-icon-delete"></span> 删除</a></td>
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
	$('.ui-switch input[type=checkbox]').on('click',function()
	{
		var url=$(this).attr("data-url");
		var result=($(this).is(':checked'))?1:0;
		$.ajax(
		{
			url:url,
			type:"post",
			dataType:'json',
			data:"token={$token}&islock="+result,
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
