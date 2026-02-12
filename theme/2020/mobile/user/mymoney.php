<?php if(!defined('IN_SDCMS')) exit;?>
{php $self_name='财务明细'}
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
                <a class="ui-btn-group-item{if $type==0} active{/if}" href="{N('mymoney')}">全部</a>
                <a class="ui-btn-group-item{if $type==1} active{/if}" href="{N('mymoney','','type=1')}">收入</a>
                <a class="ui-btn-group-item{if $type==2} active{/if}" href="{N('mymoney','','type=2')}">支出</a>
            </div>
            
            <div class="ui-p ui-bg-white ui-mt-15">
                <ul class="ui-media-list ui-media-border">
                {sdcms:rs pagesize="20" num="3" table="sd_user_money" where="$where" order="aid desc" key="aid"}
                    <li class="ui-media">
                        <div class="ui-media-body">
                            <div class="ui-media-header">{$rs[title]}</div>
                            <div class="ui-media-text"><span class="ui-font-16 ui-text-gray">{date('Y-m-d H:i:s',$rs[createdate])}</span></div>
                        </div>
                        <div class="ui-media-link ui-media-center"><strong>{if $rs[types]==1}<span class="ui-text-red">+{$rs[amount]}</span>{else}-{$rs[amount]}{/if}</strong></div>
                    </li>
                {/sdcms:rs}
                </ul>
            </div>
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
