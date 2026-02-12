<?php if(!defined('IN_SDCMS')) exit;?><!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="renderer" content="webkit">
<title>栏目管理</title>
<link rel="stylesheet" href="{WEB_ROOT}public/css/ui.css">
<link rel="stylesheet" href="{WEB_ROOT}public/admin/css/layout.css">
<script src="{WEB_ROOT}public/js/jquery.js"></script>
<script src="{WEB_ROOT}public/js/ui.js?v=202409"></script>
</head>

<body>
    <div class="position">当前位置：<a href="{U('index')}">栏目管理</a>{$position}</div>
    <div class="border">
        <!---->
        <a href="{U('add','fid='.$fid.'')}" class="ui-btn ui-btn-info ui-mr-sm">添加分类</a>
        {if $fid!=0}
        <a href="{U('index','fid='.$pid.'')}" class="ui-btn ui-btn-yellow">返回上级</a>
        {else}
        <a href="javascript:;" class="refresh ui-btn ui-btn-yellow">更新缓存</a>
        {/if}
        
        <form method="post" class="ui-form">
        <div class="ui-table-wrap">
        <table class="ui-table ui-table-border ui-table-hover ui-table-striped ui-mt ui-mb">
            <thead class="ui-thead-gray">
                <tr>
                    <th width="80">排序</th>
                    <th width="80">栏目ID</th>
                    <th>栏目名称</th>
                    <th width="120">模型</th>
                    <th width="90">导航显示</th>
                    <th width="90">新窗口</th>
                    <th width="90">列表筛选</th>
                    <th width="360">操作</th>
                </tr>
            </thead>
            <tbody>
            {sdcms:rs pagesize="50" field="cateid,cateurl,catename,catetype,isshow,isblank,isfilter,followid,catenum,(select count(1) from sd_category b where b.followid=a.cateid) as snum" table="sd_category a" where="followid=$fid" order="catenum,cateid" key="cateid"}
            {rs:eof}
            <tr>
                <td colspan="8">暂无数据</td>
            </tr>
            {/rs:eof}
            <tr>
                <td><input type="hidden" name="mid[]" value="{$rs[cateid]}"><input type="text" class="ui-form-ip" name="ordnum[]" id="ordnum_{$rs[cateid]}" value="{$rs[catenum]}" data-rule="required;int;"></td>
                <td>{$rs[cateid]}</td>
                <td class="ui-text-left"><a href="{cateurl($rs[cateid])}" target="_blank">{$rs[catename]}</a></td>
                <td>{switch $rs[catetype]}{case -1}单页{/case}
                {case -2}链接{/case}
                {default}{if isset($model[$rs[catetype]]['title'])}{$model[$rs[catetype]]['title']}{/if}
                {/switch}</td>
                <td><label class="ui-switch ui-switch-info"><input type="checkbox" {if $rs[isshow]==1} checked{/if} data-url="{U('switchs','type=1&id='.$rs[cateid].'')}"><span class="ui-switch-checkbox ui-switch-text"></span></label></td>
                <td><label class="ui-switch ui-switch-info"><input type="checkbox" {if $rs[isblank]==1} checked{/if} data-url="{U('switchs','type=2&id='.$rs[cateid].'')}"><span class="ui-switch-checkbox ui-switch-text"></span></label></td>
                <td><label class="ui-switch ui-switch-info"><input type="checkbox" {if $rs[isfilter]==1} checked{/if} data-url="{U('switchs','type=3&id='.$rs[cateid].'')}"><span class="ui-switch-checkbox ui-switch-text"></span></label></td>
                <td><a href="{U('index',"fid=".$rs[cateid]."")}"><span class="ui-icon-apartment"></span> 子分类（{$rs[snum]}）</a>　<a href="{U('edit',"id=".$rs[cateid]."&fid=".$rs[followid]."")}"><span class="ui-icon-edit"></span> 编辑</a>　<a href="javascript:;" data-url="{U('move',"id=".$rs[cateid]."")}" class="move"><span class="ui-icon-block"></span> 移动</a>　<a href="javascript:;" class="del" data-url="{U('del','id='.$rs[cateid].'')}"><span class="ui-icon-delete"></span> 删除</a></td>
            </tr>
            {/sdcms:rs}
            </tbody>
        </table>
        </div>
        {if $total_rs!=0}
        <div class="ui-page ui-page-right ui-page-info">
            <div class="ui-page-other"><input type="hidden" name="token" value="{$token}"><button type="submit" class="ui-btn ui-btn-yellow">保存排序</button></div>
            <div class="ui-page-list"><ul>{$showpage}</ul></div>
        </div>
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
	
	$(".refresh").click(function()
	{
		$.dialog(
		{
			'title':"操作提示",
			'text':"确定要更新分类缓存？",
			'oktheme':'ui-btn-info',
			'ok':function(e)
			{
				$.ajax(
				{
                    url:'{U("refresh")}',
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
	
	$(".move").click(function()
	{
		var url=$(this).attr("data-url");
		$.dialogbox(
		{
			'title':"移动分类",
			'text':url,
			'width':'600px',
			'height':'330px',
			'type':3,
			'oktheme':'ui-btn-info',
			'ok':function(e)
			{
				e.iframe().contents().find("#sdcms-submit").click();
			}
		});
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