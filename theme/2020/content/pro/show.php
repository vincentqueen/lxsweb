<?php if(!defined('IN_SDCMS')) exit;?>
{include file="include/top.php"}
<title>{if !isempty($seotitle)}{$seotitle}{else}{$title}{/if}_{if $page>1}第{$page}页_{/if}{$catename}_{sdcms[web_name]}</title>
<meta name="keywords" content="{if !isempty($seokey)}{$seokey}{else}{$title}{/if}">
<meta name="description" content="{if !isempty($seodesc)}{$seodesc}{else}{$title}{/if}">
</head>

<body>
	{include file="include/head.php"}
	{include file="include/banner_inner.php"}

	<div class="container">
		<div class="width">
			<div class="ui-box">
				<!---->
				{include file="include/content/pro/show_head.php"}
				<!---->
			</div>
		</div>
		
		<div class="width ui-row">
			<div class="container-left">
				<div class="ui-fixed" data-parent=".container-left">
					{include file="include/left_nav.php"}
				</div>
			</div>
			
			<div class="container-right">
			
				<div class="ui-box">
					<div class="ui-box-body">
						<!---->
						{include file="include/content/pro/show_body.php"}
						<!---->
					</div>
				</div>
			
			</div>
		</div>
	</div>
	
	{include file="include/foot.php"}
	{include file="include/content/pro/show_action.php"}
</body>
</html>