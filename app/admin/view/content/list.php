<?php if(!defined('IN_SDCMS')) exit;?><!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="renderer" content="webkit">
<title>内容管理</title>
<link rel="stylesheet" href="{WEB_ROOT}public/css/ui.css">
<link rel="stylesheet" href="{WEB_ROOT}public/admin/css/layout.css">
<script src="{WEB_ROOT}public/js/jquery.js"></script>
<script src="{WEB_ROOT}public/js/ui.js?v=202409"></script>
</head>

<body>
    <div class="position">当前位置：<a href="{U('lists')}">内容管理</a>{if $classid>0}{get_content_postion($classid)}{/if}</div>
    <div class="border">
        <!---->
        <div class="navbar">
            <div class="lefter">
                {if $classid>0}
                <a href="{U('add','classid='.$classid.'')}" class="ui-btn ui-btn-info ui-mr-sm">添加内容</a>
                {/if}
                
                <a href="javascript:;" class="ui-btn ui-btn-info ui-dropdown-show ui-mr-sm" data-target="#dropdown-1">批量操作</a>
                <div class="ui-dropdown" id="dropdown-1">
                    <a href="javascript:;" class="ui-dropdown-item btach" type="1">设为发布</a>
                    <a href="javascript:;" class="ui-dropdown-item btach" type="2">设为草稿</a>
                    <div class="ui-dropdown-line"></div>
                    <a href="javascript:;" class="ui-dropdown-item btach" type="3">设为推荐</a>
                    <a href="javascript:;" class="ui-dropdown-item btach" type="4">取消推荐</a>
                    <div class="ui-dropdown-line"></div>
                    <a href="javascript:;" class="ui-dropdown-item btach" type="5">设为置顶</a>
                    <a href="javascript:;" class="ui-dropdown-item btach" type="6">取消置顶</a>
                    <div class="ui-dropdown-line"></div>
                    {if $classid>0}<a href="javascript:;" class="ui-dropdown-item move">批量移动</a>{/if}
                    <a href="javascript:;" class="ui-dropdown-item btach" type="7">放入回收站</a>
                </div>
                <span class="ui-btn-group ui-btn-group-yellow ui-btn-group-bg">
                    <a class="ui-btn-group-item{if $type==0} active{/if}" href="{U('lists','classid='.$classid.'&type=0')}">全部</a>
                    <a class="ui-btn-group-item{if $type==1} active{/if}" href="{U('lists','classid='.$classid.'&type=1')}">草稿</a>
                    <a class="ui-btn-group-item{if $type==2} active{/if}" href="{U('lists','classid='.$classid.'&type=2')}">已发</a>
                    {if $classid>0 && in_array($model_id,[1,2,3])}
                    <!--<a class="ui-btn-group-item{if $type==3} active{/if}" href="{U('lists','classid='.$classid.'&type=3')}">收费</a>
                    <a class="ui-btn-group-item{if $type==4} active{/if}" href="{U('lists','classid='.$classid.'&type=4')}">免费</a>-->
                    {/if}
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
        
        {if count($filter)>0 && $isfilter==1}
        <div class="ui-filter ui-mt ui-mb-20">
        	{foreach $filter as $rs}
        	<div class="ui-row">
                <div class="ui-col-1 ui-filter-left">{$rs['field_title']}：</div>
                <div class="ui-col-11 ui-filter-right">
                	<a href="{U('lists','classid='.$classid.'&type='.$type.''.deal_filter($filter_data,$rs['field_key'],0).'')}"{if getint(F('get.'.$rs['field_key'].''),0)==0} class="active"{/if}>全部</a>
                   
                    {if $rs['field_type']==14}
                    {php $table_=$rs['field_table']}{php $join_=$rs['field_join']}{php $where_=$rs['field_where']}{php $order_=$rs['field_order']}{php $value=$rs['field_value']}{php $label=$rs['field_label']}
                    {if $where_==''}{php $where_='1=1'}{/if}
                    {if $order_==''}{php $order_="$value desc"}{/if}
                    {sdcms:ra top="0" table="$table_" join="$join_" where="$where_" order="$order_"}
                    <a href="{U('lists','classid='.$classid.'&type='.$type.''.deal_filter($filter_data,$rs['field_key'],$ra['.$value.']).'')}"{if getint(F('get.'.$rs['field_key'].''),0)==$ra['.$value.']} class="active"{/if}>{$ra['.$label.']}</a>
                    {/sdcms:ra}
                    {else}
                    {php $arr=explode(",",$rs['field_list'])}
                    {foreach $arr as $j=>$key}
                    {php $data=explode("|",$key)}
                    <a href="{U('lists','classid='.$classid.'&type='.$type.''.deal_filter($filter_data,$rs['field_key'],$data[1]).'')}"{if getint(F('get.'.$rs['field_key'].''),0)==$data[1]} class="active"{/if}>{$data[0]}</a>
                    {/foreach}
                    {/if}
                </div>
            </div>
            {/foreach}
        </div>
        {/if}
    
        <form method="post" class="ui-form">
        <div class="ui-table-wrap">
        <table class="ui-table ui-table-border ui-table-hover ui-table-striped ui-mb">
            <thead class="ui-thead-gray">
                <tr>
                    <th width="30" height="30"><label class="ui-checkbox tips" data-align="right-top" data-title="全选/取消"><input type="checkbox" class="checkall" value=""><i></i></label></th>
                    <th width="80">排序</th>
                    <th>标题</th>
                    <th width="150">栏目名称</th>
                    <th width="50">人气</th>
                    <th width="50">缩图</th>
                    <th width="50">置顶</th>
                    <th width="50">推荐</th>
                    <th width="50">状态</th>
                    <th width="100">操作</th>
                </tr>
            </thead>
            <tbody>
            {sdcms:rs pagesize="20" table="sd_content left join sd_category on sd_content.classid=sd_category.cateid" join="$join" where="$where" order="ontop desc,ordnum desc,id desc"}
            {rs:eof}
            <tr>
                <td colspan="10">暂无数据</td>
            </tr>
            {/rs:eof}
            <tr>
                <td><label class="ui-checkbox"><input type="checkbox" name="id" value="{$rs[id]}"><i></i></label></td>
                <td><input type="hidden" name="mid[]" value="{$rs[id]}"><input type="text" class="ui-form-ip" name="ordnum[]" id="ordnum_{$rs[id]}" value="{$rs[ordnum]}" data-rule="required;int;"></td>
                <td class="ui-text-left">{if $rs[isurl]==1}<span class="ui-btn ui-btn-yellow ui-btn-lt ui-mr-sm">外链</span>{/if}<a href="{$rs[link]}" target="_blank" title="查看">{$rs[title]}</a> {if $rs[isauto]==1}<span class="ui-icon-reloadtime ui-text-yellow" title="定时发布：{date('Y-m-d H:i:s',$rs[createdate])}"></span>{/if}
				
				</td>
                <td><a href="{geturl($rs[classid],0)}">{get_catename($rs[classid])}</a></td>
                <td>{$rs[hits]}</td>
                <td>{iif($rs[ispic]==1,"是","<em>否</em>")}</td>
                <td><label class="ui-switch ui-switch-info"><input type="checkbox" {if $rs[ontop]==1} checked{/if} data-url="{U('switchs','type=1&id='.$rs[id].'')}"><span class="ui-switch-checkbox ui-switch-text"></span></label></td>
                <td><label class="ui-switch ui-switch-info"><input type="checkbox" {if $rs[isnice]==1} checked{/if} data-url="{U('switchs','type=2&id='.$rs[id].'')}"><span class="ui-switch-checkbox ui-switch-text"></span></label></td>
                <td><label class="ui-switch ui-switch-info"><input type="checkbox" {if $rs[islock]==1} checked{/if} data-url="{U('switchs','type=3&id='.$rs[id].'')}"><span class="ui-switch-checkbox ui-switch-text"></span></label></td>
                <td><a href="javascript:;" class="copy" data-url="{U('copy',"classid=".$rs[classid]."&id=".$rs[id]."")}" title="复制"><span class="ui-icon-file-copy"></span></a>　<a href="{U('edit',"classid=".$rs[classid]."&id=".$rs[id]."")}" title="编辑"><span class="ui-icon-edit"></span></a>　<a href="javascript:;" class="del" data-url="{U('del','classid='.$classid.'&id='.$rs[id].'')}" title="删除"><span class="ui-icon-delete"></span></a></td>
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
	
    $(".move").click(function()
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
			var list=data.join(",");
			$.dialogbox(
			{
				'title':"批量移动",
				'text':'{U('tree','classid='.$classid.'')}',
				'width':'500px',
				'height':'370px',
				'type':3,
				'oktheme':'ui-btn-info',
				'ok':function(e)
				{
					var t0=e.iframe().contents().find("#go").val();
					if(t0=='')
                    {
                        sdcms.error('请选择目标栏目');
                        return false;
                    }
					$.ajax(
					{
                         type:'post',
                         url:'{U("move")}',
                         dataType:'json',
                         data:'id='+list+'&go='+t0,
                         error:function(e){alert(e.responseText);},
                         success:function(d)
						 {
                            if(d.state=='success')
                            {
								e.close();
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
        }
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
                url:'{U("order","classid=".$classid."")}',
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
	
	$(".copy").click(function()
	{
		var url=$(this).attr("data-url");
		$.dialog(
		{
			'title':"操作提示",
			'text':"确定要复制此内容？",
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
	
	$(".del").click(function()
	{
		var url=$(this).attr("data-url");
		$.dialog(
		{
			'title':"操作提示",
			'text':"确定要放入回收站？",
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