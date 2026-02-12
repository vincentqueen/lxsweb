<?php if(!defined('IN_SDCMS')) exit;?>
{include file="mobile/include/top.php"}
<title>{if !isempty($seotitle)}{$seotitle}{else}{$title}{/if}_{if $page>1}第{$page}页_{/if}{$catename}_{sdcms[web_name]}</title>
<meta name="keywords" content="{if !isempty($seokey)}{$seokey}{else}{$title}{/if}">
<meta name="description" content="{if !isempty($seodesc)}{$seodesc}{else}{$title}{/if}">
{include file="mobile/include/wxshare.php"}
</head>

<body>
	
	{include file="mobile/include/head.php"}

	<div class="ui-mwidth">
		<div class="ui-box ui-p-10">
			{include file="mobile/include/content/job/show.php"}			
		</div>
	</div>
	
	<div class="ui-footbar ui-fixed-bottom ui-mwidth">
		<div class="ui-footbar-left">
			<a href="{$webroot}"><i class="ui-icon-home"></i>首页</a>
		</div>
		<div class="ui-footbar-right">
			<a href="{U('form/add','fid=1&jobname='.$title.'')}">提交简历</a>
		</div>
	</div>
	<script src="{WEB_ROOT}public/js/jquery.js"></script>
	<script src="{WEB_ROOT}public/js/ui.js"></script>
	<script src="{WEB_THEME}mobile/js/cms.js"></script>
	<script>
	$(function()
	{
		$(".ui-topbar-title").html("{get_catename($topid)}");
	})
	</script>
</body>
</html>
