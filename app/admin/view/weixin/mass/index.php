<?php if(!defined('IN_SDCMS')) exit;?><!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="renderer" content="webkit">
<title>群发管理</title>
<link rel="stylesheet" href="{WEB_ROOT}public/css/ui.css">
<link rel="stylesheet" href="{WEB_ROOT}public/admin/css/layout.css">
<script src="{WEB_ROOT}public/js/jquery.js"></script>
<script src="{WEB_ROOT}public/js/ui.js?v=202409"></script>
</head>

<body>
    <div class="position">当前位置：微信公众号 > <a href="{THIS_LOCAL}">群发管理</a></div>
    <div class="border">
        <!---->
        <a href="{U('add')}" class="ui-btn ui-btn-info ui-mr-sm">新建群发</a>
        <form method="post" class="ui-form">
        <div class="ui-table-wrap">
        <table class="ui-table ui-table-border ui-table-hover ui-table-striped ui-mb ui-mt">
            <thead class="ui-thead-gray">
                <tr>
                    <th width="80">ID</th>
                    <th>日期</th>
                    <th width="120">类型</th>
                    <th width="120">群发方式</th>
                    <th width="150">微信号</th>
                    <th width="100">状态</th>
                    <th width="230">结果</th>
                    <th width="80">操作</th>
                </tr>
            </thead>
            <tbody>
            {sdcms:rs pagesize="20" table="sd_mass" where="1=1" order="id desc"}
            {rs:eof}
            <tr>
                <td colspan="9">暂无资料</td>
            </tr>
            {/rs:eof}
            <tr>
                <td>{$rs[id]}</td>
                <td class="ui-text-left">{date('Y-m-d H:i:s',$rs[title])}</td>
                <td>{iif($rs[mass_type]==1,'文本消息','<em>图文消息</em>')}</td>
                <td>{iif($rs[post_type]==0,'直接群发','<em>群发预览</em>')}</td>
                <td>{$rs[wxname]}</td>
                <td>{iif($rs[isover]==1,'完成','<em>发送中</em>')}{if $rs[isover]==0}<br><a href="javascript:;" data-url="{U('query','id='.$rs[id].'')}" class="result ui-text-blue">查询</a>{/if}</td>
                <td>{if $rs[post_type]==0}总计：{$rs[total_num]}　成功：{$rs[success_num]}　失败：{$rs[fail_num]}{else}<a href="javascript:;" data-url="{U('send','id='.$rs[id].'')}" class="ui-btn ui-btn-blue ui-btn-outline-blue ui-btn-sm send">执行群发</a>{/if}</td>
                <td><a href="javascript:;" class="del" data-url="{U('del','id='.$rs[id].'')}"><span class="am-icon-delete"></span> 删除</a></td>
            </tr>
            {/sdcms:rs}
            </tbody>
        </table>
        </div>
        {if $total_rs!=0}
        <div class="ui-page ui-page-center ui-page-info">
            <ul>{$showpage}</ul>
        </div>
        {/if}
        </form>
        <!---->
    </div>

<script>
$(function()
{
	$(".send").click(function()
	{
		var url=$(this).data("url");
		$.dialog(
		{
			title:"操作提示",
			text:"确定要群发？",
			oktheme:'ui-btn-info',
			ok:function(e)
			{
				e.close();
				sdcms.loading('正在处理，请稍等');
				$.ajax(
				{
                    url:url,
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
			}
		});
    });
	
	$(".result").click(function()
	{
		var url=$(this).data("url");
		sdcms.loading('正在查询请稍后');
		$.ajax(
		{
			url:url,
			type:'post',
			dataType:'json',
			error:function(e){alert(e.responseText);},
			success:function(d)
			{
				$.progress('close')
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
