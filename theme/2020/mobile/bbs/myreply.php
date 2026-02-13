<?php if(!defined('IN_SDCMS')) exit;?>
{php $self_name="我的回复"}
{include file="mobile/include/top.php"}
<title>{$self_name}_{sdcms[bbs_webname]}</title>
</head>

<body>
	
	{include file="mobile/include/head.php"}

	<div class="ui-mwidth">

		<!--begin-->
		{include file="mobile/include/bbs/myreply.php"}
		<!--over-->
		
		<div class="ui-pt-15"></div>

	</div>
	
	{include file="mobile/include/foot.php"}
	<script>
	$(function()
	{
		$("#bar_bbs").addClass("active");
		$(".ui-topbar-title").html("{$self_name}");
	})
	</script>
</body>
</html>
