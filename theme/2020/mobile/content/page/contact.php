<?php if(!defined('IN_SDCMS')) exit;?>
{include file="mobile/include/top.php"}
<title>{if !isempty($catetitle)}{$catetitle}{else}{$catename}{/if}_{if $page>1}第{$page}页_{/if}{sdcms[web_name]}</title>
<meta name="keywords" content="{if !isempty($catekey)}{$catekey}{else}{$catename}{/if}">
<meta name="description" content="{if !isempty($catedesc)}{$catedesc}{else}{$catename}{/if}">
</head>


<body class="page-contact">
<div class="app-main">
<!--header-->
{include file="mobile/include/head.php"}
<div class="mbnr">
    <div class="in"><img src="https://w.yksyb.cn/img.php?w=750&h=180" alt="联系我们"></div>
</div>
<div class="bodyer"> 
    <!--contact-->
    <div class="pwrap contact">
        <div class="phead"></div>
        <div class="pbody">          
            <div class="ctts">
              <h2><img src="{WEB_THEME}mobile/static/picture/contact-h.png"></h2>
                <div class="info">
                    <p>{$content}</p>
                </div>
            </div>
            <div class="maps">
                <img src="https://w.yksyb.cn/img.php?w=444&h=453" alt="位置">
            </div>
        </div>
    </div>
    <!--contact end-->
</div>
<!-- footer -->
{include file="mobile/include/foot.php"}
</div>
</body>
</html>
