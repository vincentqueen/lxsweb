<?php if(!defined('IN_SDCMS')) exit;?><!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="renderer" content="webkit">
<title>主题管理</title>
<link rel="stylesheet" href="{WEB_ROOT}public/css/ui.css">
<link rel="stylesheet" href="{WEB_ROOT}public/admin/css/layout.css">
<script src="{WEB_ROOT}public/js/jquery.js"></script>
<script src="{WEB_ROOT}public/js/ui.js?v=202409"></script>
</head>

<body>
    <div class="position">当前位置：社区管理 > <a href="{THIS_LOCAL}">主题管理</a></div>
    <div class="border">
        <!---->
        <div class="navbar">
            <div class="lefter">
                
                <a href="javascript:;" class="ui-btn ui-btn-info ui-dropdown-show ui-mr-sm" data-target="#dropdown-1">批量操作</a>
                <div class="ui-dropdown" id="dropdown-1">
                	<li><a href="javascript:;" class="ui-dropdown-item btach" type="1">通过审核</a></li>
                    <li><a href="javascript:;" class="ui-dropdown-item btach" type="2">取消审核</a></li>
                    <div class="ui-dropdown-line"></div>
                    <li><a href="javascript:;" class="ui-dropdown-item btach" type="3">设为置顶</a></li>
                    <li><a href="javascript:;" class="ui-dropdown-item btach" type="4">取消置顶</a></li>
                    <div class="ui-dropdown-line"></div>
                    <li><a href="javascript:;" class="ui-dropdown-item btach" type="5">设为精华</a></li>
                    <li><a href="javascript:;" class="ui-dropdown-item btach" type="6">取消精华</a></li>
                    <div class="ui-dropdown-line"></div>
            		<li><a href="javascript:;" class="ui-dropdown-item btach" type="7">批量删除</a></li>
                </div>
                <span class="ui-btn-group ui-btn-group-yellow ui-btn-group-bg">
                    <a class="ui-btn-group-item{if $type==0} active{/if}" href="{U('index','type=0')}">全部</a>
                    <a class="ui-btn-group-item{if $type==1} active{/if}" href="{U('index','type=1')}">未审</a>
                    <a class="ui-btn-group-item{if $type==2} active{/if}" href="{U('index','type=2')}">已审</a>
                    <a class="ui-btn-group-item{if $type==3} active{/if}" href="{U('index','type=3')}">精华</a>
                    <a class="ui-btn-group-item{if $type==4} active{/if}" href="{U('index','type=4')}">置顶</a>
                </span>
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
                                <input type="hidden" name="type" value="{$type}">
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
                    <th width="80">ID</th>
                    <th>标题</th>
                    <th width="180">用户名</th>
                    <th width="120">发帖日期</th>
                    <th width="80">回复</th>
                    <th width="80">人气</th>
                    <th width="80">待审</th>
                    <th width="60">精华</th>
                    <th width="60">置顶</th>
                    <th width="80">状态</th>
                    <th width="140">操作</th>
                </tr>
            </thead>
            <tbody>
            {sdcms:rs pagesize="20" field="bbs_id,title,uface,userid,uname,replynum,createdate,hits,isnice,ontop,sd_bbs.islock,(select count(1) from sd_bbs_reply where bbsid=bbs_id and islock=0) as locknum" table="sd_bbs" join="left join sd_user on sd_bbs.userid=sd_user.id" where="$where" order="ontop desc,bbs_id desc" key="bbs_id"}
            {rs:eof}
            <tr>
                <td colspan="12">暂无资料</td>
            </tr>
            {/rs:eof}
            <tr>
            	<td><label class="ui-checkbox"><input type="checkbox" name="id" value="{$rs[bbs_id]}"><i></i></label></td>
                <td>{$rs[bbs_id]}</td>
                <td class="ui-text-left ui-font-14"><a href="{N('bbsshow','','id='.$rs[bbs_id].'')}" target="_blank">{$rs[title]}</a></td>
                <td class="ui-text-left"><a href="{if strlen($rs[uface])}{$rs[uface]}{else}{WEB_ROOT}upfile/noface.gif{/if}" target="_blank"><img src="{if strlen($rs[uface])}{$rs[uface]}{else}{WEB_ROOT}upfile/noface.gif{/if}" width="40" class="ui-mr"></a><a href="{U('user/gouser',"id=".$rs[userid]."")}" target="_blank">{$rs[uname]}</a></td>
                <td class="ui-text-gray ui-font-14">{date('Y-m-d',$rs[createdate])}<br>{date('H:i:s',$rs[createdate])}</td>
                <td>{$rs[replynum]}</td>
                <td>{$rs[hits]}</td>
                <td>{$rs[locknum]}</td>
                <td><label class="ui-switch ui-switch-info"><input type="checkbox" {if $rs[isnice]==1} checked{/if} data-url="{U('switchs','type=1&id='.$rs[bbs_id].'')}"><span class="ui-switch-checkbox ui-switch-text"></span></label></td>
                <td><label class="ui-switch ui-switch-info"><input type="checkbox" {if $rs[ontop]==1} checked{/if} data-url="{U('switchs','type=2&id='.$rs[bbs_id].'')}"><span class="ui-switch-checkbox ui-switch-text"></span></label></td>
                <td><label class="ui-switch ui-switch-info"><input type="checkbox" {if $rs[islock]==1} checked{/if} data-url="{U('switchs','type=3&id='.$rs[bbs_id].'')}"><span class="ui-switch-checkbox ui-switch-text"></span></label></td>
                <td><a href="{U('topic',"bbsid=".$rs[bbs_id]."")}">帖子</a><br><a href="{U('edit',"id=".$rs[bbs_id]."")}">编辑</a>　<a href="javascript:;" class="del" data-url="{U('del','id='.$rs[bbs_id].'')}">删除</a></td>
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
