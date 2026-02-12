<?php if(!defined('IN_SDCMS')) exit;?>
{php $self_name='标签'}
{php $self_ename='tags'}
{php $position=[['name'=>$self_name,'url'=>THIS_LOCAL]]}
{include file="include/top.php"}
<title>{$self_name}_{sdcms[web_name]}</title>
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
					<div class="ui-box-h2">{$self_name}</div>
					<div class="ui-box-body">
						<!--begin-->
						{sdcms:rs pagesize="100" table="sd_tags" order="id desc"}
						<a href="{U('taglist','id='.$rs[id].'')}" title="{$rs[title]}" target="_blank" class="ui-mb ui-mr ui-btn">{$rs[title]}</a>
						{/sdcms:rs}
						 <div class="ui-page ui-page-center ui-page-mid ui-mt"><ul>{$showpage}</ul></div>
						<!--over-->
					</div>
				</div>
			
			</div>
		</div>
	</div>
	
	{include file="include/foot.php"}

</body>
</html>