<?php if(!defined('IN_SDCMS')) exit;?>
{php $self_name=sdcms[bbs_webname]}
{php $self_ename='bbs'}
{php $position=[['name'=>$self_name,'url'=>N('bbs')],['name'=>'查看主题','url'=>THIS_LOCAL]]}
{include file="include/top.php"}
<title>{$title}_{sdcms[web_name]}</title>
<meta name="keywords" content="{sdcms[bbs_seokey]}">
<meta name="description" content="{sdcms[bbs_seodesc]}">
</head>

<body>
	{include file="include/head.php"}
	{include file="include/banner_inner.php"}

	<div class="container">
		<div class="width">
			 <div class="ui-box">
				<!--begin-->
				{include file="include/bbs/show.php"}
				<!--over-->
			</div>
		</div>
	</div>
	
	{include file="include/foot.php"}
	{include file="include/bbs/show_foot.php"}

</body>
</html>