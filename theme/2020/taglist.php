<?php if(!defined('IN_SDCMS')) exit;?>
{php $self_name='标签'}
{php $self_ename='tags'}
{php $position=[['name'=>$self_name,'url'=>N('tags')],['name'=>$tagname,'url'=>THIS_LOCAL]]}
{include file="include/top.php"}
<title>{$tagname}_{sdcms[web_name]}</title>
<meta name="keywords" content="{sdcms[seo_key]}">
<meta name="description" content="{sdcms[seo_desc]}">
</head>

<body>
	{include file="include/head.php"}
	{include file="include/banner_inner.php"}

	<div class="container">
		<div class="width ui-row">
			<div class="container-left">
				<div class="ui-fixed-s" data-parent=".container">
					{include file="include/left_nav.php"}
				</div>
			</div>
			
			<div class="container-right">
			
				<div class="ui-box">
					<div class="ui-box-h2">{$tagname}</div>
					<div class="ui-box-body">
						<!--begin-->
						{php $catepage=20}
						{php $join=''}
						{include file="include/content/news/list.php"}
						<!--over-->
					</div>
				</div>
			
			</div>
		</div>
	</div>
	
	{include file="include/foot.php"}

</body>
</html>