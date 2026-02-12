<?php if(!defined('IN_SDCMS')) exit;?>
{php $self_name=sdcms[bbs_webname]}
{php $self_ename='bbs'}
{if $fid==0}
	{php $position=[['name'=>$self_name,'url'=>THIS_LOCAL]]}
{else}
	{php $position=[['name'=>$self_name,'url'=>N('bbs')],['name'=>$bbsname,'url'=>THIS_LOCAL]]}
{/if}
{include file="include/top.php"}
<title>{if !isempty($seotitle)}{$seotitle}{else}{$bbsname}{/if}_{sdcms[bbs_webname]}</title>
<meta name="keywords" content="{$seokey}">
<meta name="description" content="{$seodesc}">
</head>

<body>
	{include file="include/head.php"}
	{include file="include/banner_inner.php"}

	<div class="container">
		<div class="width">
			 <div class="ui-box">
				<!--begin-->
				{include file="include/bbs/index.php"}
				<!--over-->
			</div>
		</div>
	</div>
	
	{include file="include/foot.php"}

</body>
</html>