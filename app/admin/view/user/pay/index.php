<?php if(!defined('IN_SDCMS')) exit;?><!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="renderer" content="webkit">
<title>充值管理</title>
<link rel="stylesheet" href="{WEB_ROOT}public/css/ui.css">
<link rel="stylesheet" href="{WEB_ROOT}public/admin/css/layout.css">
<script src="{WEB_ROOT}public/js/jquery.js"></script>
<script src="{WEB_ROOT}public/js/ui.js?v=202409"></script>
</head>

<body>
    <div class="position">当前位置：会员管理 > <a href="{THIS_LOCAL}">充值管理</a></div>
    <div class="border">
        <!---->

        <a href="javascript:;" class="clear ui-btn ui-btn-info ui-mr-sm">删除无效充值</a>
        <div class="ui-table-wrap">
        <table class="ui-table ui-table-border ui-table-hover ui-table-striped ui-mb ui-mt">
            <thead class="ui-thead-gray">
                <tr>
                    <th width="80">ID</th>
                    <th>订单号</th>
                    <th width="120">金额</th>
                    <th width="150">会员名</th>
                    <th width="120">状态</th>
                    <th width="120">创建日期</th>
                    <th width="120">付款日期</th>
                    <th width="150">付款方式</th>
                    <th width="200">交易号</th>
                    <th width="100">操作</th>
                </tr>
            </thead>
            <tbody>
            {sdcms:rs pagesize="20" table="sd_user_pay" join="left join sd_user on sd_user_pay.userid=sd_user.id" order="aid desc" key="aid"}
            {rs:eof}
            <tr>
                <td colspan="10">暂无资料</td>
            </tr>
            {/rs:eof}
            <tr>
                <td>{$rs[aid]}</td>
                <td class="ui-text-left">{$rs[orderid]}</td>
                <td>{$rs[paymoney]}</td>
                <td><a href="{U('user/gouser',"id=".$rs[userid]."")}" target="_blank">{$rs[uname]}</a></td>
                <td>{iif($rs[ispay]==1,'成功','<em>未支付</em>')}</td>
                <td>{date('Y-m-d',$rs[createdate])}</td>
                <td>{if $rs[ispay]==1}{date('Y-m-d',$rs[paydate])}{/if}</td>
                <td>{$rs[payway]}</td>
                <td>{if $rs[ispay]==1}{$rs[trade_no]}{/if}</td>
                <td><a href="javascript:;" class="del" data-url="{U('del','id='.$rs[aid].'')}"><span class="ui-icon-delete"></span> 删除</a></td>
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
        <!---->
    </div>

<script>
$(function()
{
	$(".clear").click(function()
	{
		var url='{U("clear")}';
		$.dialog(
		{
			'title':"操作提示",
			'text':"确定要清除？不可恢复！",
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