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
                    <li><a class="anchor" href="#j_brand">品牌简介</a></li>
                    <li><a class="anchor" href="#j_intro">产品介绍</a></li>
                    <li><a class="anchor" href="#j_ads">产品特点</a></li>
                    {if false}<li><a class="anchor" href="#j_certs">荣誉资质</a></li>{/if}
                    <!-- <li><a class="anchor" href="#j_auth">授权查询</a></li> -->
                </ul>
            </div>
            <!--内页banner-->
            <div class="mbnr">
                <div class="bg"><img src="{$mynybanner}"></div>
            </div>


            <div class="pwrap p-berneck">
                <div class="pbody">
                    <!--品牌简介-->
                    <div class="p-berneck-profile p-auvico-profile" id="j_brand">
                        <div class="wm">
                            <div class="pcont xcont">
                                <p>{$content}</p>
                                <div style="margin-top:48px;text-align:center;">
                                   <!-- <img src="{WEB_THEME}static/picture/berneck-01.jpg" alt="Berneck"> -->
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--产品介绍--> 
                    <div class="p-auvico-intro" id="j_intro">
                        <div class="wm">
                            <div class="diagram"><img src="{WEB_THEME}static/picture/auvico-03.jpg"></div>
                            <div class="bd">
                            {sdcms:rs top="1" table="sd_model_pro" join="left join sd_content on sd_model_pro.cid=sd_content.id" where="id=6"}
                                <p class="tit">{$rs[title]}</p>
                                <p class="txt">
                                {$rs[intro]}
                                </p>
                                <div class="txt">
                                    <div class="para2 sec02">
                                    <p class="bold">产品规格：{$rs[cpgg]}</p>
                                    <p class="bold">幅面规格：{$rs[fmgg]}</p>
                                    <p class="bold">密度规格：{$rs[mdgg]}</p>
                                    <p class="bold">应用领域：{$rs[myyyly]}</p>
                                    </div>
                                     <div class="tbl"><img src="{$rs[pic]}" title="参数表格"></div> 
                                </div>
                            {/sdcms:rs}
                            </div>
                        </div>
                    </div>

                    <!--产品特点-->
                    
                    <div class="p-features p-berneck-ads" id="j_ads">
                        <ul>
                        {sdcms:rs top="0" table="sd_content" where="classid=31" order="ontop desc,ordnum desc,id desc"}
                            <li>
                                <img src="{$rs[pic]}">
                                <div class="info">
                                    <h5>{$rs[title]}</h5>
                                    <div class="txt">{cutstr(nohtml($rs[intro]),1000,1)}</div>
                                </div>
                            </li>
                        {/sdcms:rs}
                        </ul>
                    </div>

                    <!--荣誉资质-->
                    {if false}
                    <div class="p-certs p-auvico-certs" id="j_certs">
                        <div class="wm">
                            <div class="hd">
                                <h3><img src="{WEB_THEME}static/picture/auvico-10-tit.png" alt="产品相关证书"></h3>
                            </div>
                            <div class="bd">
                                <div class="p-certs-body swiper-container" id="j_certs_slide">
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
                    {/if}
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