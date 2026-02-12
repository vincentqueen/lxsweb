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
                    <li><a class="anchor" href="#j_clotys">花色类型</a></li>
                    <li><a class="anchor" href="#j_ads">产品特点</a></li>
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
                    <div class="p-berneck-profile" id="j_brand">
                        <div class="wm">
                            <div class="pcont xcont">
                                <p>{$content}</p>
                                <div style="margin-top:48px;text-align:center;">
                                    <img src="{WEB_THEME}static/picture/berneck-01.jpg" alt="Berneck">
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--产品介绍-->
                    <div class="p-berneck-intro" id="j_intro">
                        <div class="wm">

                            <div class="main">
                            {sdcms:rs top="1" table="sd_model_pro" join="left join sd_content on sd_model_pro.cid=sd_content.id" where="id=11"}
                                <div class="tit"><span>{$rs[title]}</span></div>
                                <div class="bd">
                                    <div class="txt" style="width:600px;font-size:14px;">
                                    {$rs[intro]}
                                    </div>
                                    <div class="ls"></div>
                                    <!--<div class="metas">-->
                                    <!--<p><span>产品规格：</span>{$rs[cpgg]} </p>-->
                                    <!--<p><span>幅面规格：</span>{$rs[fmgg]}</p>-->
                                    <!--<p><span>密度规格：</span>{$rs[mdgg]}</p>-->
                                    <!--<p><span>应用领域：</span>{$rs[myyyly]}</p>-->
                                    <!--</div>-->
                                    <div class="tbl"><img src="{$rs[pictwo]}" alt="参数表格"></div>
                                    <div class="tbl"><img src="{$rs[pic]}" alt="参数表格"></div>
                                </div>
                                {/sdcms:rs}
                            </div>

                        </div>
                    </div>
                    
                  <!--花色类型-->
                    <div class="p-berneck-cloty" id="j_clotys">
                        <div class="wm">
                            <div class="hd">
                                <h3>花色类型</h3>
                            </div>
                            <div class="bd">
                                <div class="berneck-clotys swiper-container" id="j_clotys_slide">
                                    <div class="swiper-wrapper">
                                    {sdcms:rs top="1" table="sd_model_page" where="cid=52"}
                                    {php $piclist=json_decode($rs[piclist],true);}
                                    {/sdcms:rs}
                                    {foreach $piclist as $key=>$rs}
                                        <div class="swiper-slide clotys-item">
                                            <img src="{$rs['image']}" alt="{$rs['desc']}">
                                            <div class="txt">{$rs[desc]}</div>
                                        </div>
                                    {/foreach}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!--产品特点-->
                    <div class="p-berneck-ads" id="j_ads">
                        <ul>
                            {sdcms:rs top="0" table="sd_content" where="classid=35" order="ontop desc,ordnum desc,id
                            desc"}
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
                var iPCertsSlider = new Swiper('#j_clotys_slide', {
                    slidesPerView: 4,
                    spaceBetween: 10,
                    slidesPerColumn: 4,
                    slidesPerColumnFill:"row"
                });
            });
        </script>
</body>

</html>