<?php if(!defined('IN_SDCMS')) exit;?>
{php $self_name='我的订单'}
{include file="mobile/include/top.php"}
<title>{$self_name}_{sdcms[web_name]}</title>
<meta name="keywords" content="{sdcms[seo_key]}">
<meta name="description" content="{sdcms[seo_desc]}">
</head>

<body>
	
	{include file="mobile/include/head.php"}
	<div class="ui-mwidth">
		<div class="ui-box ui-p-10">
			<!--begin-->
            <div class="ui-btn-group ui-btn-group-blue ui-btn-group-bg ui-btn-group-full ui-mb-20">
                <a class="ui-btn-group-item{if $type==0} active{/if}" href="{N('myorder')}">全部</a>
                <a class="ui-btn-group-item{if $type==1} active{/if}" href="{N('myorder','','type=1')}">已支付</a>
                <a class="ui-btn-group-item{if $type==2} active{/if}" href="{N('myorder','','type=2')}">未支付</a>
            </div>
            
            {sdcms:rs pagesize="10" num="3" table="sd_order" where="$where" order="id desc"}
			{rs:eof}
			<p>暂无订单</p>
			{/rs:eof}
			<div class="ui-card ui-mb-15">
				<div class="ui-card-header" style="border-bottom:1px solid #eaeaea;"><a href="{U('other/ordershow','orderid='.$rs[orderid].'')}">订单号：{$rs[orderid]}</a></div>
				<div class="ui-card-body ui-card-text">
					<ul>
						<li>产品名称：{$rs[pro_name]}</li>
						<li>购买数量：{$rs[pro_num]}</li>
					</ul>
				</div>
				<div class="ui-card-footer ui-row">
				   <div class="ui-col-6">订单金额：<span class="ui-text-red">{$rs[pro_price]}</span></div>
				   <div class="ui-col-6 ui-text-right"> {if $rs[ispay]==0}<span class="ui-badge ui-badge-red">未支付</span>{/if} {if $rs[isover]==0}<span class="ui-badge ui-badge-green ui-ml">未处理</span>{/if}</div>
				</div>
			</div>
			{/sdcms:rs}
            <div class="ui-page ui-page-center ui-page-mid"><ul>{$showpage}</ul></div>
			<!--over-->
		</div>
	</div>

	<div class="ui-pt-15 ui-mt"></div>
	{include file="mobile/include/foot.php"}
	<script>
    $(function()
    {
		$("#bar_user").addClass("active");
		$(".ui-topbar-title").html("{$self_name}");
	});
    </script>
	
</body>
</html>
