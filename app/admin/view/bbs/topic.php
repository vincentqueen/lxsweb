<?php if(!defined('IN_SDCMS')) exit;?><!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="renderer" content="webkit">
<title>帖子管理</title>
<link rel="stylesheet" href="{WEB_ROOT}public/css/ui.css">
<link rel="stylesheet" href="{WEB_ROOT}public/admin/css/layout.css">
<script src="{WEB_ROOT}public/js/jquery.js"></script>
<script src="{WEB_ROOT}public/js/ui.js?v=202409"></script>
</head>

<body>
    <div class="position">当前位置：社区管理 > <a href="{U('index')}">主题管理</a> > <a href="{U('topic','bbsid='.$bbsid.'&type=0')}">帖子管理</a></div>
    <div class="border">
        <!---->
        <div class="navbar">
            <div class="lefter">

                <span class="ui-btn-group ui-btn-group-yellow ui-btn-group-bg">
                    <a class="ui-btn-group-item{if $type==0} active{/if}" href="{U('topic','bbsid='.$bbsid.'&type=0')}">全部</a>
                    <a class="ui-btn-group-item{if $type==1} active{/if}" href="{U('topic','bbsid='.$bbsid.'&type=1')}">未审</a>
                    <a class="ui-btn-group-item{if $type==2} active{/if}" href="{U('topic','bbsid='.$bbsid.'&type=2')}">已审</a>
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

        {sdcms:rs pagesize="15" field="bbsid,uface,uname,createdate,sd_bbs_reply.islock,replyid,content,reply" table="sd_bbs_reply" join="left join sd_user on sd_bbs_reply.userid=sd_user.id" where="bbsid=$bbsid and istopic=0 $where" order="replyid desc" key="replyid"}
        <ul class="ui-media-list ui-media-border-none ui-mb-15 ui-bd ui-p-15">
            <li class="ui-media">
                <div class="ui-media-img ui-mr-20 ui-radius">
                    <img src="{if strlen($rs[uface])}{$rs[uface]}{else}{WEB_ROOT}upfile/noface.gif{/if}" width="64" height="64">
                </div>
                <div class="ui-media-body">
                    <div class="ui-media-header">{$rs[uname]} <span class="ui-font-14 ui-text-gray ui-ml-15">发表于：{date('Y-m-d H:i:s',$rs[createdate])} {if $rs[islock]==0}<span class="ui-text-red">【未审】</span>{/if}</span>
                            <div class="ui-fr ui-font-14">
                            	<a href="{N('bbsshow','','id='.$rs[bbsid].'')}" class="ui-mr" target="_blank"><i class="ui-icon-link text-gray"></i> 查看主题</a>
                                <a href="{U('edittopic','id='.$rs[replyid].'')}" class="ui-mr"><i class="ui-icon-edit text-gray"></i> 编辑</a>
                                <a href="javascript:;" class="del" data-url="{U('deltopic','id='.$rs[replyid].'')}"><i class="ui-icon-delete text-gray"></i> 删除</a>
                            </div>
                    </div>
                    <div class="ui-media-text ui-pb">
                    	<div class="ui-line"></div>
                        
                       	<div>{str_replace("\r\n",'<br>',$rs[content])}</div>
                        {if $rs[reply]<>''}
                            <div class="ui-line ui-line-left"><span class="ui-text-red">回复：</span></div>
                            {$rs[reply]}
                        {/if}
                    </div>
                </div>
            </li>
        </ul>
        {/sdcms:rs}
        {if $total_rs!=0}
        <div class="ui-page ui-page-center ui-page-info">
            <div class="ui-page-list"><ul>{$showpage}</ul></div>
        </div>
        {/if}
        <!---->
    </div>
<script>
$(function()
{
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