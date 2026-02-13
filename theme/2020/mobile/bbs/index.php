<?php if(!defined('IN_SDCMS')) exit;?>
{php $self_name=sdcms[bbs_webname]}
{include file="mobile/include/top.php"}
<title>{if !isempty($seotitle)}{$seotitle}{else}{$bbsname}{/if}_{sdcms[bbs_webname]}</title>
<meta name="keywords" content="{$seokey}">
<meta name="description" content="{$seodesc}">
</head>

<body>
	
	{include file="mobile/include/head.php"}

	<div class="ui-mwidth">

		<!--begin-->
		{include file="mobile/include/bbs/index.php"}
		<!--over-->
		
		<div class="ui-pt-15"></div>

	</div>
	
	{include file="mobile/include/foot.php"}
	<script>
	$(function()
	{
		$("#bar_bbs").addClass("active");
		$(".ui-topbar-title").html("{$bbsname}");
	})
	</script>
</body>
</html>
