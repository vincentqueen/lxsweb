<?php if(!defined('IN_SDCMS')) exit;?>
{php $self_name=$title}
{include file="mobile/include/top.php"}
<title>{$self_name}_{sdcms[web_name]}</title>
<meta name="keywords" content="{sdcms[bbs_seokey]}">
<meta name="description" content="{sdcms[bbs_seodesc]}">
</head>

<body>
	
	{include file="mobile/include/head.php"}

	<div class="ui-mwidth">

		<!--begin-->
		{include file="mobile/include/bbs/show.php"}
		<!--over-->
		
		<div class="ui-pt-15"></div>

	</div>
	
	{include file="mobile/include/foot.php"}
	{include file="mobile/include/bbs/show_foot.php"}
	<script>
	$(function()
	{
		$("#bar_bbs").addClass("active");
		$(".ui-topbar-title").html("查看主题");
	})
	</script>
</body>
</html>
