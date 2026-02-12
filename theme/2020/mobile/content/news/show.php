<?php if(!defined('IN_SDCMS')) exit;?>
{include file="mobile/include/top.php"}
<title>{if !isempty($seotitle)}{$seotitle}{else}{$title}{/if}_{if $page>1}第{$page}页_{/if}{$catename}_{sdcms[web_name]}</title>
<meta name="keywords" content="{if !isempty($seokey)}{$seokey}{else}{$title}{/if}">
<meta name="description" content="{if !isempty($seodesc)}{$seodesc}{else}{$title}{/if}">
</head>


<body class="page-news">
  <div class="app-main">
    <!--header-->
	{include file="mobile/include/head.php"}
    <div class="mbnr">
      <div class="in"><img src="{WEB_THEME}mobile/static/picture/m-news-d.jpg"></div>
    </div>
    <div class="bodyer pnews">
      <div class="bodyer">
        <div class="wm">
          <!--content-->
          <div class="article">
            <div class="atc-hder">
              <h2 class="title">{$title}</h2>
              <div class="metas">更新时间：{date('Y-m-d',$createdate)}</div>
            </div>
            <div class="atc-cont">
              <div class="xcont"></div>
              <div class="cpager wrapfix">
			  {$content}
			  </div>
            </div>
            <div class="atc-fter prevnext wrapfix">
			
              <p class="prev">上一篇：
			  {sdcms:rs top="1" table="sd_content" where="islock=1 and id>$id and classid=$classid"}
				<a href="{$rs[link]}" class="prev" title="{$rs[title]}">{$rs[title]}</a>
				{/sdcms:rs}
			</p>
              <p class="next">下一篇：
			  {sdcms:rs top="1" table="sd_content" where="islock=1 and id>$id and classid=$classid"}
			  <a href="{$rs[link]}" class="next" title="{$rs[title]}">{$rs[title]}</a>
			  {/sdcms:rs}
			</p>
			
            </div>
          </div>
          <!--//content-->
        </div>
      </div>
      <!-- footer -->
	  {include file="mobile/include/foot.php"}
    </div>
    <script type="text/javascript">
      $(document).ready(function () {
        var swipernav = new Swiper('.scrollnav', { freeMode: true, slidesPerView: 'auto', watchSlidesVisibility: true, freeModeSticky: true });
      });
    </script>
</div>
</body>
</html>