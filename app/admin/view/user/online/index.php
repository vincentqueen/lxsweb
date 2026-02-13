<?php if(!defined('IN_SDCMS')) exit;?><!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="renderer" content="webkit">
<title>支付记录</title>
<link rel="stylesheet" href="{WEB_ROOT}public/css/ui.css">
<link rel="stylesheet" href="{WEB_ROOT}public/admin/css/layout.css">
<script src="{WEB_ROOT}public/js/jquery.js"></script>
<script src="{WEB_ROOT}public/js/ui.js?v=202409"></script>
</head>

<body>
    <div class="position">当前位置：会员管理 > <a href="{U('index')}">支付记录</a></div>
    <div class="border">
        <!---->
        <div class="navbar">
            <div class="lefter">
                <a href="javascript:;" class="ui-btn ui-btn-info btach ui-mr-sm">批量删除</a>
                
                <span class="ui-btn-group ui-btn-group-yellow ui-btn-group-bg">
                    <a class="ui-btn-group-item{if $type==0} active{/if}" href="{U('index','type=0')}">全部</a>
                    <a class="ui-btn-group-item{if $type==1} active{/if}" href="{U('index','type=1')}">支付成功</a>
                    <a class="ui-btn-group-item{if $type==2} active{/if}" href="{U('index','type=2')}">等待支付</a>
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
                    <th width="30" height="30"><label class="ui-checkbox ui-tips" data-align="right-top" data-title="全选/取消"><input type="checkbox" class="checkall" value=""><i></i></label></th>
                    <th>付款编号</th>
                    <th width="200">订单号</th>
                    <th width="120">用途</th>
                    <th width="100">金额</th>
                    <th width="120">付款方式</th>
                    <th width="100">付款状态</th>
                    <th width="160">创建时间</th>
                    <th width="100">操作</th>
                </tr>
            </thead>
            <tbody>
            {sdcms:rs pagesize="20" table="sd_onlinepay" where="$where" order="aid desc" key="aid"}
            {rs:eof}
            <tr>
                <td colspan="9">暂无资料</td>
            </tr>
            {/rs:eof}
            <tr>
                <td><label class="ui-checkbox"><input type="checkbox" name="id" value="{$rs[aid]}"><i></i></label></td>
                <td class="ui-text-left">{$rs[pay_no]}</td>
                <td>{$rs[orderid]}</td>
                <td>{if $rs[paytype]==1}在线充值{elseif $rs[paytype]==1}订单支付{else}购买内容{/if}</td>
                <td>{$rs[paymoney]}</td>
                <td>{$rs[payway]}</td>
                <td>{if $rs[ispay]==1}支付成功{else}<div class="text-gray">等待支付</div>{/if}</td>
                <td>{date('Y-m-d H:i',$rs[createdate])}</td>
                <td><a href="javascript:;" class="del" data-url="{U('del','id='.$rs[aid].'')}"><span class="ui-icon-delete"></span> 删除</a></td>
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
