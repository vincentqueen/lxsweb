<?php if (!defined('IN_SDCMS'))
    exit; ?>
{include file="include/top.php"}
<title>{if !isempty($catetitle)}{$catetitle}{else}{$catename}{/if}_{if $page>1}第{$page}页_{/if}{sdcms[web_name]}</title>
<meta name="keywords" content="{if !isempty($catekey)}{$catekey}{else}{$catename}{/if}">
<meta name="description" content="{if !isempty($catedesc)}{$catedesc}{else}{$catename}{/if}">
</head>

<body class="page-about sub">
    <div class="wrapper">
        {include file="include/head.php"}
        <div class="bodyer">
            <div class="snavbar">
                <ul class="wm snav">
                    <li><a class="anchor" href="#j_brand">公司介绍</a></li>
                    {if false}<li><a class="anchor" href="#j_hist">发展历程</a></li>{/if}
                    <li><a class="anchor" href="#j_channel">企业文化</a></li>
                    <li><a class="anchor" href="#j_certs">荣誉资质</a></li>
                    <li><a class="anchor" href="#j_certs1">环保等级</a></li>
                </ul>
            </div>
            <!--内页banner-->
            <div class="mbnr">
                <div class="bg"><img src="{$mynybanner}"></div>
            </div>
            <div class="pwrap p-about">
                <div class="pbody">

                    <!--公司介绍-->
                    <div class="p-about-profile" id="j_brand">
                        <div class="wm">
                            <div class="about-cat"><img src="{sdcms[web_logo]}" alt="关于理想树"></div>
                            <div class="pcont xcont">
                                <div class="cnc">{$content}</div>
                            </div>
                        </div>
                    </div>

                    <!--企业文化-->
                    <div class="p-about-scale" id="j_channel">
                        <div class="wm"><img src="{WEB_THEME}static/image/ab-wn.jpg" alt="企业文化"></div>
                    </div>

                    <!--发展历程-->
                    {if false}
                    <div class="about-sc p-about-hist" id="j_hist">
                        <div class="wm">
                            <div class="hist-main">
                                <div class="hist-item" id="j-hist-2024" style="display: block;"><img
                                        src="https://w.yksyb.cn/img.php?w=1258&h=419" alt="品牌历史 2024"></div>
                                <div class="hist-item" id="j-hist-2023"><img
                                        src="https://w.yksyb.cn/img.php?w=1258&h=419" alt="品牌历史 2023"></div>
                                <div class="hist-item" id="j-hist-2022"><img
                                        src="https://w.yksyb.cn/img.php?w=1258&h=419" alt="品牌历史 2022"></div>
                                <div class="hist-item" id="j-hist-2021"><img
                                        src="https://w.yksyb.cn/img.php?w=1258&h=419" alt="品牌历史 2021"></div>
                                <div class="hist-item" id="j-hist-2020"><img
                                        src="https://w.yksyb.cn/img.php?w=1258&h=419" alt="品牌历史 2020"></div>
                            </div>
                            <div class="hist-years">
                                <ul>

                                    <li class="current" id="j-year-2024" data-year="2024"><span>2024</span><em
                                            class="right"></em></li>
                                    <li id="j-year-2020" data-year="2023"><span>2023</span><em class="right"></em></li>
                                    <li id="j-year-2018" data-year="2022"><span>2022</span><em class="right"></em></li>
                                    <li id="j-year-2016" data-year="2021"><span>2021</span><em class="right"></em></li>
                                    <li id="j-year-2010" data-year="2020"><span>2020</span><em class="right"></em></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    {/if}
                    <!--荣誉资质-->
                    <div class="p-berneck-cert" id="j_certs">
                        <div class="wm">
                            <div class="hd">
                                <h3>荣誉资质</h3>
                            </div>
                            <div class="bd">
                                <div class="berneck-certs swiper-container" id="j_certs_slide">
                                    <div class="swiper-wrapper">
                                        {sdcms:rs top="1" table="sd_model_page" where="cid=21"}
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
                    <!--环保等级-->
                    <div class="p-berneck-cert" id="j_certs1">
                        <div class="wm">
                            <div class="hd">
                                <h3>环保等级</h3>
                            </div>
                            <div class="bd">
                                <div class="berneck-certs swiper-container" id="j_certs1_slide">
                                    <div class="swiper-wrapper">
                                        {sdcms:rs top="1" table="sd_model_page" where="cid=53"}
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
        {include file="include/foot.php"}

    </div>
    <!--wrapper-->

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
            var iProsSlider = new Swiper('#j_partners_slide', {
                loop: false,
                autoplay: false,
                slidesPerView: 3,
                navigation: {
                    nextEl: '.swiper-button-next',
                    prevEl: '.swiper-button-prev',
                }
            });
            var iPCertsSlider = new Swiper('#j_certs_slide', {
                    loop: true,
                    autoplay: true,
                    slidesPerView: 'auto',
                    spaceBetween: 12,
                    navigation: {
                        nextEl: '.swiper-button-next',
                        prevEl: '.swiper-button-prev',
                    }
            });
                        var iPCertsSlider = new Swiper('#j_certs1_slide', {
                    loop: true,
                    autoplay: true,
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