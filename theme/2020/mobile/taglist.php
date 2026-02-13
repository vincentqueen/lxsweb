<?php if(!defined('IN_SDCMS')) exit;?>
{php $self_name=$tagname}
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

			{php $catepage=20}
			{php $join=''}
			{include file="mobile/include/content/news/list.php"}
			
			<div class="ui-pt-20 ui-bg-white"></div>
			
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
