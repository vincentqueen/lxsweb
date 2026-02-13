<?php if(!defined('IN_SDCMS')) exit;?>
{php $self_name='网站地图'}
{php $self_ename='sitemap'}
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
						{sdcms:rp top="0" table="sd_category" where="followid=0 and isshow=1" order="catenum,cateid"}{php $map_sonid=$rp[cateid]}
						<div class="ui-menu">
							<div class="ui-menu-name"><a href="{cateurl($rp[cateid])}" title="{$rp[catename]}"{if $rp[isblank]==1} target="_blank"{/if}>{$rp[catename]}</a></div>
						</div>
						<div class="ui-mt-20">
							{sdcms:rs top="0" table="sd_category" where="followid=$map_sonid and isshow=1" order="catenum,cateid"}
							<a href="{cateurl($rs[cateid])}" title="{$rs[catename]}"{if $rs[isblank]==1} target="_blank"{/if} class="ui-btn ui-mr ui-mb">{$rs[catename]}</a>
							{/sdcms:rs}
						</div>
						{/sdcms:rp}
						<!--over-->
					</div>
				</div>
			
			</div>
		</div>
	</div>
	
	{include file="include/foot.php"}

</body>
</html>