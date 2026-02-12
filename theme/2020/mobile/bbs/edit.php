<?php if(!defined('IN_SDCMS')) exit;?>
{php $self_name='编辑主题'}
{include file="mobile/include/top.php"}
<title>{$self_name}_{sdcms[web_name]}</title>
</head>

<body>
	
	{include file="mobile/include/head.php"}

	<div class="ui-mwidth ui-bg-white ui-p">

		<!--begin-->
		{include file="mobile/include/bbs/edit.php"}
		<!--over-->
		
		<div class="ui-pt-15"></div>

	</div>
	
	{include file="mobile/include/foot.php"}
	{include file="mobile/include/bbs/edit_foot.php"}
	<script>
	$(function()
	{
		$("#bar_bbs").addClass("active");
		$(".ui-topbar-title").html("{$self_name}");
	})
	</script>
</body>
</html>
