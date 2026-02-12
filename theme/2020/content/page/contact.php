<?php if(!defined('IN_SDCMS')) exit;?>
{include file="include/top.php"}
<title>{if !isempty($catetitle)}{$catetitle}{else}{$catename}{/if}_{if $page>1}第{$page}页_{/if}{sdcms[web_name]}</title>
<meta name="keywords" content="{if !isempty($catekey)}{$catekey}{else}{$catename}{/if}">
<meta name="description" content="{if !isempty($catedesc)}{$catedesc}{else}{$catename}{/if}">
</head>

<body class="page-contact">
<div class="wrapper">
{include file="include/head.php"}
<div class="bodyer">

    <div class="mbnr">
        <div class="bg"><img src="{$mynybanner}" class="banner"></div>
    </div>

    <div class="pwrap contact">
        <div class="wm">
            <div class="pbody">
                <div class="info">
                    <h2><img src="{WEB_THEME}static/picture/contact-h.png"></h2>
                    <div class="xcont ctts">
                        <p>{$content}</p>
                    </div>
                </div>
                <div class="map">
                    <img src="{WEB_THEME}static/picture/ard.png" alt="位置">
                </div>
            </div>
        </div>
    </div>
    <!--contact end-->
</div>
{include file="include/foot.php"}
</div>
<!--wrapper-->
</body>
</html>
