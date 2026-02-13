<?php if(!defined('IN_SDCMS')) exit;?>
{php $self_name='网站地图'}
{include file="mobile/include/top.php"}
<title>{$self_name}_{sdcms[web_name]}</title>
<meta name="keywords" content="{sdcms[seo_key]}">
<meta name="description" content="{sdcms[seo_desc]}">
{include file="mobile/include/wxshare.php"}
</head>

<body>
	
	{include file="mobile/include/head.php"}

	<div class="ui-mwidth">
		<div class="ui-box ui-p-10">

			<!--begin-->
			{sdcms:rp top="0" table="sd_category" where="followid=0 and isshow=1" order="catenum,cateid"}{php $map_sonid=$rp[cateid]}
			<div class="ui-menu">
				<div class="ui-menu-name"><a href="{cateurl($rp[cateid])}" title="{$rp[catename]}"{if $rp[isblank]==1}{/if}>{$rp[catename]}</a></div>
			</div>
			<div class="ui-mt-20">
				{sdcms:rs top="0" table="sd_category" where="followid=$map_sonid and isshow=1" order="catenum,cateid"}
				<a href="{cateurl($rs[cateid])}" title="{$rs[catename]}"{if $rs[isblank]==1}{/if} class="ui-btn ui-mr ui-mb">{$rs[catename]}</a>
				{/sdcms:rs}
			</div>
			{/sdcms:rp}
			<!--over-->
			
			<div class="ui-pt-15 ui-bg-white"></div>
			
		</div>
		
	</div>
	
	{include file="mobile/include/foot.php"}
	<script>
	$(function()
	{
		$(".ui-topbar-title").html("{$self_name}");
	})
	</script>
</body>
</html>
