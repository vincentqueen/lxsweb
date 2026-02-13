<?php if(!defined('IN_SDCMS')) exit;?>
{php $self_name='标签'}
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
			{sdcms:rs pagesize="100" table="sd_tags" order="id desc"}
			<a href="{U('taglist','id='.$rs[id].'')}" title="{$rs[title]}" class="ui-mb ui-mr ui-btn">{$rs[title]}</a>
			{/sdcms:rs}
			<div class="ui-page ui-page-center ui-page-mid ui-mt"><ul>{$showpage}</ul></div>
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
