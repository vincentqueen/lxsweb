<?php if(!defined('IN_SDCMS')) exit;?>
{php $self_name='在线留言'}
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

			{include file="mobile/include/book/body.php"}
			
			<div class="ui-pt-15 ui-bg-white"></div>
			
		</div>
		
	</div>
	
	{include file="mobile/include/foot.php"}
	{include file="mobile/include/book/foot.php"}
</body>
</html>
