<?php if(!defined('IN_SDCMS')) exit;?>
{php $self_name='站内搜索'}
{php $self_ename='search'}
{php $position=[['name'=>$self_name,'url'=>THIS_LOCAL]]}
{include file="include/top.php"}
<title>{$keyword}_{sdcms[web_name]}</title>
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
					<div class="ui-box-h2">{$keyword}</div>
					<div class="ui-box-body">
						<!--begin-->
						{php $catepage=20}
						{if $table=='news'}
							{include file="include/content/news/list.php"}
						{/if}
						{if $table=='pro'}
							{include file="include/content/pro/list.php"}
						{/if}
						{if $table=='job'}
							{include file="include/content/job/list.php"}
						{/if}
						<!--over-->
					</div>
				</div>
			
			</div>
		</div>
	</div>
	
	{include file="include/foot.php"}

</body>
</html>