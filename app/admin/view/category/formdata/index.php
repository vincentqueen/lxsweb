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
    <div class="position">当前位置：栏目管理 > <a href="{U('form/index')}">表单管理</a> > <a href="{THIS_LOCAL}">{$title}管理</a></div>
    <div class="border">
        <!---->
        <div class="navbar">
            <div class="lefter">
                <a href="{U('add','fid='.$fid.'')}" class="ui-btn ui-btn-info ui-mr-sm">添加内容</a>
                <a href="javascript:;" class="ui-btn ui-btn-info ui-dropdown-show ui-mr-sm" data-target="#dropdown-1">批量操作</a>
                <div class="ui-dropdown" id="dropdown-1">
                    <a href="javascript:;" class="ui-dropdown-item btach" type="1">设为已审</a>
                    <a href="javascript:;" class="ui-dropdown-item btach" type="2">设为未审</a>
                    <div class="ui-dropdown-line"></div>
                    <a href="javascript:;" class="ui-dropdown-item btach" type="3">批量删除</a>
                </div>
                <span class="ui-btn-group ui-btn-group-yellow ui-btn-group-bg">
                    <a class="ui-btn-group-item{if $type==0} active{/if}" href="{U('index','fid='.$fid.'&type=0')}">全部</a>
                    <a class="ui-btn-group-item{if $type==1} active{/if}" href="{U('index','fid='.$fid.'&type=1')}">启用</a>
                    <a class="ui-btn-group-item{if $type==2} active{/if}" href="{U('index','fid='.$fid.'&type=2')}">锁定</a>
                </span>
            </div>

        </div>
        {if count($filter)}
        <div class="ui-filter ui-mt">
        	{foreach $filter as $rs}
        	<div class="ui-row">
                <div class="ui-col-1 ui-filter-left">{$rs['field_title']}：</div>
                <div class="ui-col-11 ui-filter-right">
                    <a href="{U('index','fid='.$fid.'&type='.$type.''.deal_filter($filter_data,$rs['field_key'],0).'')}"{if getint(F('get.'.$rs['field_key'].''),0)==0} class="active"{/if}>全部</a>
                    {if $rs['field_type']==14}
                    {php $table_=$rs['field_table']}{php $join_=$rs['field_join']}{php $where_=$rs['field_where']}{php $order_=$rs['field_order']}{php $value=$rs['field_value']}{php $label=$rs['field_label']}
                    {if $where_==''}{php $where_='1=1'}{/if}
                    {if $order_==''}{php $order_="$value desc"}{/if}
                    {sdcms:ra top="0" table="$table_" join="$join_" where="$where_" order="$order_"}
                    <a href="{U('index','fid='.$fid.'&type='.$type.''.deal_filter($filter_data,$rs['field_key'],$ra['.$value.']).'')}"{if getint(F('get.'.$rs['field_key'].''),0)==$ra['.$value.']} class="active"{/if}>{$ra['.$label.']}</a>
                    {/sdcms:ra}
                    {else}
                    {php $arr=explode(",",$rs['field_list'])}
                    {foreach $arr as $j=>$key}
                    {php $data=explode("|",$key)}
                    <a href="{U('index','fid='.$fid.'&type='.$type.''.deal_filter($filter_data,$rs['field_key'],$data[1]).'')}"{if getint(F('get.'.$rs['field_key'].''),0)==$data[1]} class="active"{/if}>{$data[0]}</a>
                    {/foreach}
                    {/if}
                </div>
            </div>
            {/foreach}
        </div>
        {/if}
       <form method="post" class="ui-form">
       <div class="ui-table-wrap">
        <table class="ui-table ui-table-border ui-table-hover ui-table-striped ui-mt-20 ui-mb">
            <thead class="ui-thead-gray">
                <tr>
                    <th width="30" height="30"><label class="ui-checkbox tips" data-align="right-top" data-title="全选/取消"><input type="checkbox" class="checkall" value=""><i></i></label></th>
                    <th width="80">排序</th>
                    {foreach $field as $key}
                    <th>{$key['field_title']}</th>
                    {/foreach}
                    <th width="120">发布日期</th>
                    <th width="130">发布IP</th>
                    <th width="50">状态</th>
                    <th width="150">操作</th>
                </tr>
            </thead>
            <tbody>
            {sdcms:rs pagesize="20" table="$tablename" where="$where" order="ordnum desc,id desc"}
            {rs:eof}
            <tr>
                <td colspan="{php echo count($field)+6}">暂无数据</td>
            </tr>
            {/rs:eof}
            <tr>
            	<td><label class="ui-checkbox"><input type="checkbox" name="id" value="{$rs[id]}"><i></i></label></td>
                <td><input type="hidden" name="mid[]" value="{$rs[id]}"><input type="text" name="ordnum[]" class="ui-form-ip" id="ordnum_{$rs[id]}" value="{$rs[ordnum]}" data-rule="required;int;"></td>
                {foreach $field as $key}
                {php $name=$key['field_key']}
                <td>{$rs['.$name.']}</td>
                {/foreach}
                <td>{date('Y-m-d',$rs[createdate])}</td>
                <td>{$rs[postip]}</td>
                <td><label class="ui-switch ui-switch-info"><input type="checkbox" {if $rs[islock]==1} checked{/if} data-url="{U('switchs','fid='.$fid.'&id='.$rs[id].'')}"><span class="ui-switch-checkbox ui-switch-text"></span></label></td>
                <td><a href="{U('edit',"fid=".$fid."&id=".$rs[id]."")}"><span class="ui-icon-edit"></span> 编辑</a>　<a href="javascript:;" class="del" data-url="{U('del','fid='.$fid.'&id='.$rs[id].'')}"><span class="ui-icon-delete"></span> 删除</a></td>
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
                url:'{U("btach","fid=".$fid."")}',
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
                url:'{U("order","fid=".$fid."")}',
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
})
</script>
</body>
</html>
