<?php if(!defined('IN_SDCMS')) exit;?><!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="renderer" content="webkit">
<title>回收站</title>
<link rel="stylesheet" href="{WEB_ROOT}public/css/ui.css">
<link rel="stylesheet" href="{WEB_ROOT}public/admin/css/layout.css">
<script src="{WEB_ROOT}public/js/jquery.js"></script>
<script src="{WEB_ROOT}public/js/ui.js?v=202409"></script>
</head>

<body>
    <div class="position">当前位置：<a href="{U('index')}">内容管理</a> > <a href="{U('recycle')}">回收站</a></div>
    <div class="border">
        <!---->
        <div class="navbar">
            <div class="lefter">
                <a href="javascript:;" class="ui-btn ui-btn-info ui-dropdown-show ui-mr-sm" data-target="#dropdown-1">批量操作</a>
                <div class="ui-dropdown" id="dropdown-1">
                    <a href="javascript:;" class="ui-dropdown-item btach" type="1">批量恢复</a>
                    <div class="ui-dropdown-line"></div>
                    <a href="javascript:;" class="ui-dropdown-item btach" type="8">批量删除</a>
                </div>

            </div>
            
            <div class="righter">
                <form action="{THIS_LOCAL}">
                    <div class="ui-form-group">
                        <div class="ui-input-group">
                            {if !isempty(sdcms[pathinfo]) && sdcms[url_mode]>1}<input type="hidden" name="s" value="{PATH_URL}" />{/if}
                            {if sdcms[url_mode]==1}
                                <input type="hidden" name="m" value="{C('ADMIN')}" />
                                <input type="hidden" name="c" value="{CONTROLLER_NAME}" />
                                <input type="hidden" name="a" value="{ACTION_NAME}" />
                            {/if}
                            <input type="text" name="keyword" class="ui-form-ip radius-right-none" value="{$keyword}" placeholder="请输入关键字">
                            <button type="submit" class="after"><div class="ui-icon-search"></div></button>
                        </div>
                    </div>
                </form>
            </div>
            
        </div>
        
       <form method="post" class="ui-form">
       <div class="ui-table-wrap">
        <table class="ui-table ui-table-border ui-table-hover ui-table-striped ui-mb">
            <thead class="ui-thead-gray">
                <tr>
                    <th width="30" height="30"><label class="ui-checkbox tips" data-align="right-top" data-title="全选/取消"><input type="checkbox" class="checkall" value=""><i></i></label></th>
                    <th>标题</th>
                    <th width="150">栏目名称</th>
                    <th width="50">人气</th>
                    <th width="50">缩图</th>
                    <th width="50">置顶</th>
                    <th width="50">推荐</th>
                    <th width="150">操作</th>
                </tr>
            </thead>
            <tbody>
            {sdcms:rs pagesize="20" table="sd_content" where="$where" order="ontop desc,ordnum desc,id desc"}
            {rs:eof}
            <tr>
                <td colspan="8">暂无数据</td>
            </tr>
            {/rs:eof}
            <tr>
                <td><label class="ui-checkbox"><input type="checkbox" name="id" value="{$rs[id]}"><i></i></label></td>
                <td class="ui-text-left">{$rs[title]}</td>
                <td>{get_catename($rs[classid])}</td>
                <td>{$rs[hits]}</td>
                <td>{iif($rs[ispic]==1,"是","<em>否</em>")}</td>
                <td>{iif($rs[ontop]==1,"是","<em>否</em>")}</td>
                <td>{iif($rs[isnice]==1,"是","<em>否</em>")}</td>
                <td><a href="{U('edit',"classid=".$rs[classid]."&id=".$rs[id]."")}"><span class="ui-icon-edit"></span> 编辑</a>　<a href="javascript:;" class="del" data-url="{U('clear','id='.$rs[id].'')}"><span class="ui-icon-delete"></span> 删除</a></td>
            </tr>
            {/sdcms:rs}
            </tbody>
        </table>
        </div>
        {if $total_rs!=0}
        <div class="ui-page ui-page-center ui-page-info">
            <div class="ui-page-list"><ul>{$showpage}</ul></div>
        </div>
        {/if}
        </form>
        <!---->
    </div>
    
<script>
$(function()
{
	$(".btach").click(function()
	{
		var type=$(this).attr("type");
		var data=[];
		$(".ui-form").find("input[type=checkbox]:checked").each(function()
		{
			if($(this).attr("class")!='checkall' && !$(this).closest("label").hasClass("ui-switch"))
			{
				data.push($(this).val());
			}
		});
        if(data.length==0)
        {
            sdcms.error('至少选择一条内容');
        }
        else
        {
            $.ajax(
			{
                type:'post',
                cache:false,
                dataType:'json',
                url:'{U("btach")}',
                data:'token={$token}&id='+data.join(",")+'&type='+type,
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