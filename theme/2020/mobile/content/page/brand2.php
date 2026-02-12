<?php if (!defined('IN_SDCMS'))
    exit; ?>
<meta charset="utf-8">
{include file="mobile/include/top.php"}
<title>{if !isempty($catetitle)}{$catetitle}{else}{$catename}{/if}_{if $page>1}第{$page}页_{/if}{sdcms[web_name]}</title>
<meta name="keywords" content="{if !isempty($catekey)}{$catekey}{else}{$catename}{/if}">
<meta name="description" content="{if !isempty($catedesc)}{$catedesc}{else}{$catename}{/if}">
</head>

<body class="page-berneck">
    <div class="app-main">
        <!--header-->
        {include file="mobile/include/head.php"}
        <div class="mbnr">
            <div class="in"><img src="{$mynybanner}" alt="Banner"></div>
        </div>

        <div class="bodyer">
            <div class="pwrap p-berneck">
                <div class="pbody">
                    <div class="p-berneck-profile p-auvico-profile" id="j_brand">
                        <div class="wm">
                            <div class="pcont xcont">
                                <p>{$content}</p>
                            </div>
                        </div>
                    </div>

            <div class="p-intro p-auvico-intro" id="j_intro">
                <div class="wm">
                    <div class="tit"><span>{$rs[title]}</span></div>
                    {sdcms:rs top="1" table="sd_model_pro" join="left join sd_content on sd_model_pro.cid=sd_content.id" where="id=6"}
                    <div class="bd">
                      <p class="txt">{$rs[intro]}</p>
                      <div class="diagram"><img src="{WEB_THEME}mobile/static/picture/auvico-03.jpg"></div>
                      <div class="txt">
                        <div class="para2 sec02">
                          <p class="bold">产品规格：{$rs[cpgg]}</p>
                          <p class="bold">幅面规格：{$rs[fmgg]}</p>
                          <p class="bold">密度规格：{$rs[mdgg]}</p>
                          <p class="bold">应用领域：{$rs[myyyly]}</p>
                        </div>
                      </div>
                    </div>
                    {/sdcms:rs}
                </div>
            </div>



                    <div class="p-features p-berneck-ads" id="j_ads">
                        <ul>
                        {sdcms:rs top="0" table="sd_content" where="classid=31" order="ontop desc,ordnum desc,id desc"}
                            <li>
                                <img src="{$rs[pic]}">
                                <div class="info">
                                    <h5>{$rs[title]}</h5>
                                    <div class="txt">{cutstr(nohtml($rs[intro]),210,1)}</div>
                                </div>
                            </li>
                        {/sdcms:rs}
                        </ul>
                    </div>

                    <div class="p-certs p-auvico-certs" id="j_certs">
                        <div class="wm">
                            <div class="hd">
                                <h3><img src="{WEB_THEME}static/picture/auvico-10-tit.png" alt="产品相关证书"></h3>
                            </div>
                            <div class="bd">
                                <div class="berneck-certs swiper-container" id="j_certs_slide">
                                    <div class="swiper-wrapper">
                                    {sdcms:rs top="1" table="sd_model_page" where="cid=32"}
                                    {php $piclist=json_decode($rs[piclist],true);}
                                    {/sdcms:rs}
                                    {foreach $piclist as $key=>$rs}
                                        <div class="swiper-slide certs-item">
                                            <img src="{$rs['image']}" alt="{$rs['desc']}">
                                        </div>
                                    {/foreach}
                                    </div>
                                </div>
                                <div class="swiper-button-next swiper-button-white"></div>
                                <div class="swiper-button-prev swiper-button-white"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- footer -->
        {include file="mobile/include/foot.php"}
    </div><!--wrapper-->
    <script type="text/javascript" src="{WEB_THEME}static/js/lightbox.min.js"></script>
    <script type="text/javascript">
        $(function () {
            $(".hist-years ul").on('click', 'li', function () {
                var _this = $(this);
                var year = $(this).data("year");
                _this.siblings('li').removeClass("current");
                _this.addClass("current");
                $(".hist-item").hide();
                $("#j-hist-" + year).show();
            });
            var iPCertsSlider = new Swiper('#j_certs_slide', {
                loop: false,
                autoplay: false,
                slidesPerView: 'auto',
                spaceBetween: 12,
                navigation: {
                    nextEl: '.swiper-button-next',
                    prevEl: '.swiper-button-prev',
                }
            });
        });
    </script>
</body>
</html>
