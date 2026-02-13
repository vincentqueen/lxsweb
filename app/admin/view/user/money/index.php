<?php if(!defined('IN_SDCMS')) exit;?><!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="renderer" content="webkit">
<title>财务管理</title>
<link rel="stylesheet" href="{WEB_ROOT}public/css/ui.css">
<link rel="stylesheet" href="{WEB_ROOT}public/admin/css/layout.css">
<script src="{WEB_ROOT}public/js/jquery.js"></script>
<script src="{WEB_ROOT}public/js/ui.js?v=202409"></script>
</head>

<body>
    <div class="position">当前位置：会员管理 > <a href="{U('index')}">财务管理</a></div>
    <div class="border">
        <!---->
        <div class="navbar">
            <div class="lefter">
                <a href="javascript:;" data-url="{U('add')}" class="add-iframe ui-btn ui-btn-info ui-mr-sm">财务入账</a>
                <span class="ui-btn-group ui-btn-group-yellow ui-btn-group-bg">
                    <a class="ui-btn-group-item{if $type==0} active{/if}" href="{U('index','type=0')}">全部</a>
                    <a class="ui-btn-group-item{if $type==1} active{/if}" href="{U('index','type=1')}">收入</a>
                    <a class="ui-btn-group-item{if $type==2} active{/if}" href="{U('index','type=2')}">支出</a>
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
        <table class="ui-table ui-table-border ui-table-hover ui-table-striped ui-mb">
            <thead class="ui-thead-gray">
                <tr>
                    <th width="80">ID</th>
                    <th>名称|流水号</th>
                    <th width="180">会员</th>
                    <th width="120">变更前</th>
                    <th width="120">金额</th>
                    <th width="120">变更后</th>
                    <th width="80">性质</th>
                    <th width="150">日期</th>
                    <th width="80">操作</th>
                </tr>
            </thead>
            <tbody>
            {sdcms:rs pagesize="20" table="sd_user_money a left join sd_user b on a.userid=b.id" where="$where" order="aid desc" key="aid"}
            {rs:eof}
            <tr>
                <td colspan="9">暂无资料</td>
            </tr>
            {/rs:eof}
            <tr>
                <td>{$rs[aid]}</td>
                <td class="ui-text-left">{$rs[title]}</td>
                <td class="ui-text-left"><a href="{$rs[uface]}" class="ui-lightbox" data-title="{$rs[uname]}"><img src="{$rs[uface]}" width="40" height="40" class="ui-mr"></a><a href="{U('user/gouser',"id=".$rs[id]."")}" target="_blank">{$rs[uname]}</a></td>
                <td>{$rs[oldmoney]}</td>
                <td>{iif($rs[types]==1,'+','-')} {$rs[amount]}</td>
                <td>{$rs[newmoney]}</td>
                <td>{iif($rs[types]==1,'收入','<em>支出</em>')}</td>
                <td>{date('Y-m-d H:i',$rs[createdate])}</td>
                <td><a href="javascript:;" class="del" data-url="{U('del','id='.$rs[aid].'')}">删除</a></td>
            </tr>
            {/sdcms:rs}
            </tbody>
        </table>
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
	$(".add-iframe").click(function()
	{
		var url=$(this).attr("data-url");
		$.dialogbox(
		{
			'title':"财务入账",
			'text':url,
			'width':'500px',
			'height':'290px',
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