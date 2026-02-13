<?php if(!defined('IN_SDCMS')) exit;?>
{include file="mobile/include/top.php"}
<title>{if !isempty($seotitle)}{$seotitle}{else}{$title}{/if}_{if $page>1}第{$page}页_{/if}{$catename}_{sdcms[web_name]}</title>
<meta name="keywords" content="{if !isempty($seokey)}{$seokey}{else}{$title}{/if}">
<meta name="description" content="{if !isempty($seodesc)}{$seodesc}{else}{$title}{/if}">
{include file="mobile/include/wxshare.php"}
</head>

<body>
	
	<div class="ui-mwidth" id="nav-top">
    	 <div class="ui-topbar ui-topbar-opacity ui-topbar-three ui-fixed ui-mwidth" data-align="fixed-top">
            <div class="ui-topbar-left"><a href="javascript:;" class="ui-icon-left ui-back"></a></div>
            <div class="ui-topbar-title ui-scrollnav" data-offset="1">
            	<ul>
                    <li class="active"><a href="#nav-top">商品详情</a></li>
					{if count($edata)>0}<li><a href="#nav-spec">规格参数</a></li>{/if}
                </ul>
            </div>
            <div class="ui-topbar-right"><a href="javascript:;" class="ui-offside-show" data-target="#ui-offside-nav"><i class="ui-icon-lists"></i></a></div>
        </div>
    </div>
	{include file="mobile/include/nav.php"}
    <!--商品页大图开始-->
	{php $piclist=jsdecode($piclist,1)}
    {if count($piclist)>0}
	 <div class="ui-mwidth banner" id="show_photo">
		<div class="ui-carousel" data-arrow="false" data-page="true">
			<div class="ui-carousel-inner">
				{php $step=0}
				{foreach $piclist as $index=>$val}
				{php $step++}
				<div class="ui-carousel-item{if $step==1} active{/if}"><a href="{$val['image']}" class="ui-lightbox" title="{$val['desc']}"><img src="{$val['image']}" alt="{$val['desc']}"></a></div>
				{/foreach}
			</div>
		</div>
	</div>
	{/if}
	<div class="ui-mwidth">
		<div class="ui-box ui-p-10">
			{include file="mobile/include/content/pro/show.php"}
			
			<div class="ui-pt-20 ui-bg-white"></div>
			
		</div>
	</div>
	
	{include file="mobile/include/content/pro/show_foot.php"}
	
</body>
</html>
