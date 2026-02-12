<?php if(!defined('IN_SDCMS')) exit;?>
{include file="mobile/include/top.php"}
<title>{$title}_{sdcms[web_name]}</title>
<meta name="keywords" content="{if strlen($seokey)>0}{$seokey}{else}{$title}{/if}">
<meta name="description" content="{if strlen($seodesc)>0}{$seodesc}{else}{$title}{/if}">
</head>

<body>
	
	{include file="mobile/include/head.php"}

	<div class="ui-mwidth">
		<div class="ui-box ui-p-10">
			<!--begin-->
			<div class="artshow">
				<h1>{$title}</h1>

				<div class="content mt-20">
					{$content}
				</div>	
			</div>
			
			{if !isempty(sdcms[weixin_qrcode])}
			<div class="ui-menu ui-menu-blue">
				<div class="ui-menu-name">关注我们</div>
			</div>
			
			<div class="artshow">
				<div class="content mt-20">
					<img src="{sdcms[weixin_qrcode]}" width="100%">
				</div>	
			</div>
			{/if}
			
			<!--over-->
			
			<div class="ui-pt-20 ui-bg-white"></div>
			
		</div>
	</div>
	
	{include file="mobile/include/foot.php"}
	<script>
	$(function()
	{
		$(".ui-topbar-title").html("查看内容");
	})
	</script>
</body>
</html>
