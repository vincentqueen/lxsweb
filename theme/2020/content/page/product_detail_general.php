<?php if(!defined('IN_SDCMS')) exit;?>
{include file="include/top.php"}
<title>{if !isempty($catetitle)}{$catetitle}{else}{$catename}{/if}_{sdcms[web_name]}</title>
<meta name="keywords" content="{if !isempty($catekey)}{$catekey}{else}{$catename}{/if}">
<meta name="description" content="{if !isempty($catedesc)}{$catedesc}{else}{$catename}{/if}">
<style>
  body.page-about, .bodyer, .wrapper, .pnews-detail {
    background: #fff !important;
  }
  .article-body {
    background: #fff !important;
    box-shadow: none !important;
    border: none !important;
  }
  .cont {
    font-size: 16px;
    line-height: 2;
    color: #333;
    text-align: justify;
  }
  .cont p {
    margin-bottom: 20px;
  }
  .cont h2 {
    font-size: 24px;
    color: #1a1a1a;
    font-weight: 700;
    margin: 30px 0 15px;
    border-left: 4px solid #000;
    padding-left: 15px;
  }
  .cont img {
    max-width: 100% !important;
    height: auto !important;
    margin: 20px 0;
    border-radius: 8px;
  }
</style>
</head>

<body class="app-article">
<div class="wrapper" style="background: #fff !important;">    
{include file="include/head.php"}

<div class="bodyer pnews-detail" style="background: #fff !important;">

    <div class="mbnr" style="position: relative; height: auto !important; padding-bottom: 0 !important;">
        <div class="bg" style="position: relative !important; height: auto !important;">
            <img src="{if !isempty($mynybanner)}{$mynybanner}{else}/upfile/2026/47/jimeng-2026-02-14-5052.png{/if}" style="width: 100%; aspect-ratio: 21/5; object-fit: cover; display: block; height: auto;">
        </div>
        <div class="wm" style="position: absolute; top: 50%; left: 50%; transform: translate(-50%, -50%); text-align: center; width: 100%;">
            <h1 style="font-size: 48px; color: #fff; font-weight: 800; text-shadow: 0 2px 10px rgba(0,0,0,0.3); margin: 0;">{if $followid==28 || $cateid==28}新闻中心{else}{$catename}{/if}</h1>
            <p style="font-size: 18px; color: rgba(255,255,255,0.9); margin-top: 15px; letter-spacing: 2px;">{if !isempty($myename)}{strtoupper($myename)}{else}{if $followid==28 || $cateid==28}NEWS CENTER{else}PRODUCT INTRODUCTION{/if}{/if}</p>
        </div>
    </div>

    <!--content-->
    <div class="pnews-detail" style="background: #fff !important; padding: 60px 0 100px;">
        <div class="wm" style="max-width: 900px; margin: 0 auto;">
            <!--content-->
            <div class="article-body" style="background: #fff !important; padding: 0;">
                <div class="head" style="text-align: center; margin-bottom: 40px; border-bottom: 1px solid #eee; padding-bottom: 30px;">
                    <h1 style="font-size: 32px; color: #1a1a1a; font-weight: 700; margin-bottom: 20px; line-height: 1.4;">{$catename}</h1>
                </div>
                
                <div class="cont">
                    {$content}
                </div>
            </div>
        </div>
    </div>
</div>
{include file="include/foot.php"}
</div>
</body>
</html>