<?php if(!defined('IN_SDCMS')) exit;?>
{include file="include/top.php"}
<title>{if !isempty($seotitle)}{$seotitle}{else}{$title}{/if}_{if $page>1}第{$page}页_{/if}{$catename}_{sdcms[web_name]}</title>
<meta name="keywords" content="{if !isempty($seokey)}{$seokey}{else}{$title}{/if}">
<meta name="description" content="{if !isempty($seodesc)}{$seodesc}{else}{$title}{/if}">
</head>

<body class="app-article">
<div class="wrapper">    
{include file="include/head.php"}

<div class="bodyer pnews-detail">

    <div class="mbnr">
        <div class="bg"><img src="{WEB_THEME}static/picture/news.jpg"></div>
    </div>

    <!--content-->
    <div class="particle pwrap">
        <div class="container">
            <!--content-->
            <div class="pbody article">
                <div class="head">
                    <h1>{$title}</h1>
                    <div class="metas">{date('Y-m-d',$createdate)}</div>
                    <div class="summary">摘要：{cutstr(nohtml($rs[intro]),200,1)}</div>
                </div>
                <div class="cont">
					<div class="xcont">
					{$content}
					</div>
                    <div class="prevnext">
					{sdcms:rs top="1" table="sd_content" where="islock=1 and id>$id and classid=$classid"}
						<p>上一篇：<a href="{$rs[link]}" class="prev" title="{$rs[title]}">{$rs[title]}</a></p>
					{/sdcms:rs}
					{sdcms:rs top="1" table="sd_content" where="islock=1 and id>$id and classid=$classid"}
						<p>下一篇：<a href="{$rs[link]}" class="next" title="{$rs[title]}">{$rs[title]}</a></p>
					{/sdcms:rs}
					</div>
                </div>
            </div>
        </div>
    </div>
</div>
  {include file="include/foot.php"}
</div>
</body>

</html>