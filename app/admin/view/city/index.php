<?php if(!defined('IN_SDCMS')) exit;?><!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="renderer" content="webkit">
<title>城市分站</title>
<link rel="stylesheet" href="{WEB_ROOT}public/css/ui.css">
<link rel="stylesheet" href="{WEB_ROOT}public/admin/css/layout.css">
<script src="{WEB_ROOT}public/js/jquery.js"></script>
<script src="{WEB_ROOT}public/js/ui.js?v=202409"></script>
</head>

<body>
    <div class="position">当前位置：城市分站 > <a href="{U('index')}">城市管理</a>{if $fid!=0} > {$position}{/if}</div>
    <div class="border">
        <!---->
		<a href="javascript:;" data-url="{U('add','fid='.$fid.'')}" class="add-iframe ui-btn ui-btn-info ui-mr-sm">添加城市</a>
        {if $fid!=0}
        <a href="{U('index','fid='.$pid.'')}" class="ui-btn ui-btn-yellow">返回上级</a>
        {else}
        <a href="javascript:;" data-url="{U('btach')}" class="ui-btn ui-btn-info btach ui-mr-sm">一键设置</a>
        <a href="javascript:;" class="refresh ui-btn ui-btn-yellow">更新缓存</a>
        {/if}

        <form method="post" class="ui-form">
        <div class="ui-table-wrap">
        <table class="ui-table ui-table-border ui-table-hover ui-table-striped ui-mt ui-mb">
            <thead class="ui-thead-gray">
                <tr>
                    <th width="80">城市ID</th>
                    <th>城市名称</th>
                    <th width="260">路径/域名</th>
                    <th width="120">是否开启</th>
                    <th width="{if $fid==0}300{else}120{/if}">操作</th>
                </tr>
            </thead>
            <tbody>
            {if empty($data)}
            <tr>
                <td colspan="9">暂无数据</td>
            </tr>
            {/if}
            {foreach $data as $rs}
            <tr>
                <td>{$rs['cateid']}</td>
                <td class="ui-text-left">{$rs['name']}</td>
                <td>{$rs['site_root']}{if $rs['site_domain']==1}.{C('city_domain')}{/if}</td>
                <td>{if $rs['site_open']==1}已开启{else}<span class="text-gray">未开启</span>{/if}</td>
                <td>{if $fid==0}<a href="{U('index',"fid=".$rs['cateid']."")}"><span class="ui-icon-list"></span> 子城市（{$rs['snum']}）</a>　{/if}{if $fid==0}<a href="javascript:;" data-url="{U('btach',"fid=".$rs['cateid']."")}" class="btach"><span class="ui-icon-setting"></span> 一键配置</a>　{/if}<a href="javascript:;" data-url="{U('edit',"id=".$rs['cateid']."&fid=".$rs['followid']."")}" class="edit-iframe"><span class="ui-icon-edit"></span> 编辑</a>　<a href="javascript:;" class="del" data-url="{U('del','id='.$rs['cateid'].'')}"><span class="ui-icon-delete"></span> 删除</a></td>
            </tr>
            {/foreach}
        </tbody>
        </table>
        </div>
        </form>
        <!---->
    </div>
    
<script>
$(function()
{
	{if $nodata==1}
	sdcms.loading('正在初始化数据，请稍等');
	$.ajax(
	{
		url:'{U("getdata")}',
		data:'token={$token}',
		type:'post',
		dataType:'json',
		error:function(e){alert(e.responseText);},
		success:function(d)
		{
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
	{/if}
	$(".btach").click(function()
	{
		var url=$(this).attr("data-url");
		$.dialogbox(
		{
			'title':"一键设置",
			'text':url,
			'width':'520px',
			'height':'210px',
			'type':3,
			'oktheme':'ui-btn-info',
			'ok':function(e)
			{
				e.iframe().contents().find("#sdcms-submit").click();
			}
		});
	});
	$(".add-iframe").click(function()
	{
		var url=$(this).attr("data-url");
		$.dialogbox(
		{
			'title':"添加城市",
			'text':url,
			'width':'600px',
			'height':'340px',
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
			'title':"编辑城市",
			'text':url,
			'width':'600px',
			'height':'340px',
			'type':3,
			'oktheme':'ui-btn-info',
			'ok':function(e)
			{
				e.iframe().contents().find("#sdcms-submit").click();
			}
		});
	});
	$(".refresh").click(function()
	{
		$.dialog(
		{
			'title':"操作提示",
			'text':"确定要更新缓存？",
			'oktheme':'ui-btn-info',
			'ok':function(e)
			{
				$.ajax(
				{
                    url:'{U("refresh")}',type:'post',dataType:'json',
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