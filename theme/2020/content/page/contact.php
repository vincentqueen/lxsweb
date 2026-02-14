<?php if(!defined('IN_SDCMS')) exit;?>
{include file="include/top.php"}
<title>{if !isempty($catetitle)}{$catetitle}{else}{$catename}{/if}_{if $page>1}第{$page}页_{/if}{sdcms[web_name]}</title>
<meta name="keywords" content="{if !isempty($catekey)}{$catekey}{else}{$catename}{/if}">
<meta name="description" content="{if !isempty($catedesc)}{$catedesc}{else}{$catename}{/if}">
</head>

<body class="page-about sub">
<div class="wrapper">
{include file="include/head.php"}
<div class="bodyer">

    <div class="mbnr" style="padding-bottom: 36.46%;">
        <div class="bg" style="position: absolute; inset: 0; width: 100%; height: 100%;"><img src="/upfile/2025/03/1741744527332.png" class="banner" style="width: 100%; height: 100%; object-fit: cover; display: block;"></div>
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
