<?php if(!defined('IN_SDCMS')) exit;?>
{include file="mobile/include/top.php"}
<title>{if !isempty($catetitle)}{$catetitle}{else}{$catename}{/if}{$filter_key}_{if $page>1}第{$page}页_{/if}{sdcms[web_name]}</title>
<meta name="keywords" content="{if !isempty($catekey)}{$catekey}{else}{$catename}{/if}">
<meta name="description" content="{if !isempty($catedesc)}{$catedesc}{else}{$catename}{/if}">
</head>

<body class="page-news" id="jpage-newslist">
<div class="app-main"> 
    <!--header-->
	{include file="mobile/include/head.php"}
    <div class="mbnr">
        <div class="in"><img src="{$mynybanner}"></div>
    </div>
    <div class="bodyer pnews">
        <div class="wm"> 
            <!--body content-->
            <div class="bder ui-atc">
                <div class="mod-atcs">
				{sdcms:rs top="0" table="sd_content" where="classid=28" order="ontop desc,ordnum desc,id desc"}
                    <div class="mod-atc" data-aid="68">
                        <a title="{$rs[title]}" href="{$rs[link]}">
                            <div class="thumb 1"><img src="{$rs[pic]}" alt="{$rs[title]}"></div>
                            <div class="info">
                                <h5>{$rs[title]}</h5>
                                <div class="txt">{cutstr(nohtml($rs[intro]),100,1)}</div>
                                <div class="tms">{date('m-d',$rs[createdate])}</div>
                            </div>
                        </a>
                    </div>
					{/sdcms:rs}
                </div> 
                <div class="pagers"></div>
            </div>
            <!--//body content-->
        </div>
    </div>
    <!-- footer -->
	{include file="mobile/include/foot.php"}
</div>
<script type="text/javascript">
    $(document).ready(function () {
    });
</script>
</body>
</html>
