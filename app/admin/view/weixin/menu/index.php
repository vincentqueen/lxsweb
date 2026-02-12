<?php if(!defined('IN_SDCMS')) exit;?><!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="renderer" content="webkit">
<title>菜单管理</title>
<link rel="stylesheet" href="{WEB_ROOT}public/css/ui.css">
<link rel="stylesheet" href="{WEB_ROOT}public/admin/css/layout.css">
<script src="{WEB_ROOT}public/js/jquery.js"></script>
<script src="{WEB_ROOT}public/js/ui.js?v=202409"></script>
</head>

<body>
    <div class="position">当前位置：微信公众号 > <a href="{THIS_LOCAL}">菜单管理</a></div>
    <div class="border">
        <!---->
        <a href="{U('add')}" class="ui-btn ui-btn-info ui-mr-sm">添加菜单</a>
        <a href="javascript:;" class="ui-btn ui-btn-info ui-mr-sm publish">发布菜单</a>
        <a href="javascript:;" class="ui-btn ui-btn-info ui-mr-sm delete">删除菜单</a>
        <form method="post" class="ui-form">
        <div class="ui-table-wrap">
        <table class="ui-table ui-table-border ui-table-hover ui-table-striped ui-mb ui-mt">
        	<thead class="ui-thead-gray">
                <tr>
                    <th width="80">排序</th>
                    <th width="80">菜单ID</th>
                    <th>菜单名称</th>
                    <th width="120">类型</th>
                    <th width="230">操作</th>
                </tr>
            </thead>
            <tbody>
            {sdcms:rp top="0" table="sd_wx_menu" where="followid=0" order="ordnum,id"}
            {php $classid=$rp[id]}
            <tr>
                <td><input type="hidden" name="mid[]" value="{$rp[id]}"><input type="text" class="ui-form-ip" name="ordnum[]" id="ordnum_{$rp[id]}" value="{$rp[ordnum]}" data-rule="required;int;"></td>
                <td>{$rp[id]}</td>
                <td class="ui-text-left">{$rp[title]}</td>
                <td>{switch $rp[reply_type]}{case 0}一级菜单{/case}{case 1}文本消息{/case}{case 2}图文素材{/case}{case 3}外链{/case}{case 4}小程序{/case}{/switch}</td>
                <td class="ui-text-right">{if $rp[followid]==0 && $rp[reply_type]==0}<a href="{U('add',"fid=".$rp[id]."")}"><span class="ui-icon-plus"></span>添加子菜单</a>　{/if}<a href="{U('edit',"id=".$rp[id]."")}"><span class="ui-icon-edit"></span>编辑</a>　<a href="javascript:;" class="del" data-url="{U('del','id='.$rp[id].'')}"><span class="ui-icon-delete"></span> 删除</a></td>
            </tr>
            {sdcms:rs top="0" table="sd_wx_menu" where="followid=$classid" order="ordnum,id"}
            <tr>
                <td><input type="hidden" name="mid[]" value="{$rs[id]}"><input type="text" class="ui-form-ip" name="ordnum[]" id="ordnum_{$rs[id]}" value="{$rs[ordnum]}" data-rule="required;int;"></td>
                <td>{$rs[id]}</td>
                <td class="ui-text-left">　　{$rs[title]}</td>
                <td>{switch $rs[reply_type]}{case 0}一级菜单{/case}{case 1}文本消息{/case}{case 2}图文素材{/case}{case 3}外链{/case}{case 4}小程序{/case}{/switch}</td>
                <td class="ui-text-right"><a href="{U('edit',"id=".$rs[id]."")}"><span class="ui-icon-edit"></span>编辑</a>　<a href="javascript:;" class="del" data-url="{U('del','id='.$rs[id].'')}"><span class="ui-icon-delete"></span> 删除</a></td>
            </tr>
            {/sdcms:rs}
            {/sdcms:rp}
            </tbody>
        </table>
        </div>
        {if $total_rp!=0}
        <input type="hidden" name="token" value="{$token}">
        <button type="submit" class="ui-btn ui-btn-yellow">保存排序</button>
        {/if}
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
	$(".delete").click(function()
	{
		$.dialog(
		{
			'title':"操作提示",
			'text':"确定要删除已发布的菜单？不可恢复！",
			'oktheme':'ui-btn-info',
			'ok':function(e)
			{
				$.ajax(
				{
					type:"post",
					dataType:'json',
					url:"{U('delall')}",
					data:"token={$token}",
					error:function(e){alert(e.responseText);},
					success:function(d)
					{
						e.close();
						if(d.state=='success')
						{
							sdcms.success(d.msg);
							setTimeout("location.href='?'",1000);
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

	$(".publish").click(function()
	{
		var url=$(this).attr("data-url");
		$.ajax(
		{
			url:"{U('publish')}",
			type:"post",
			dataType:'json',
			data:"token={$token}",
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
})
</script>
</body>
</html>