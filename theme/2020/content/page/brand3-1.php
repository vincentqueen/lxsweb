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
                            </div>
                        </div>
                    </div>
                    <!--产品介绍-->
                    <div class="p-berneck-intro mgs" id="j_intro">
                        <div class="wm">

                            <div class="main">
                            {sdcms:rs top="1" table="sd_model_pro" join="left join sd_content on sd_model_pro.cid=sd_content.id" where="id=38"}
                                <div class="tit"><span>{$rs[title]}</span></div>
                                <div class="bd">
                                    <div class="txt" style="width:600px;font-size:14px;">
                                    {$rs[intro]}
                                    </div>
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

                    <!--产品特点-->
                    <div class="p-berneck-ads" id="j_ads">
                        <div class="wm">
                            <ul>
                                {sdcms:rs top="0" table="sd_content" where="classid=51" order="ontop desc,ordnum desc,id
                                desc"}
                                <li>
                                    <img src="{$rs[pic]}">
                                    <div class="info mgs_info">
                                        <h5>{$rs[title]}</h5>
                                        <div class="txt">{cutstr(nohtml($rs[intro]),1000,1)}</div>
                                    </div>
                                </li>
                                {/sdcms:rs}
                            </ul>
                        </div>
                    </div>
                    <!--荣誉资质-->
                    <div class="p-berneck-cert" id="j_certs">
                        <div class="wm">
                            <div class="hd">
                                <h3>产品相关检测报告</h3>
                            </div>
                            <div class="bd">
                                <div class="cloty-grid">
                                    {sdcms:rs top="1" table="sd_model_page" where="cid=37" order="pageid desc"}
                                    {php $piclist=jsdecode($rs[piclist],1);}
                                    {/sdcms:rs}
                                    <?php if(empty($piclist)){ $piclist=[['image'=>'/upfile/2025/12/1764657616592.jpg','desc'=>'Default Image 1'],['image'=>'/upfile/2025/12/1764657625274.jpg','desc'=>'Default Image 2'],['image'=>'/upfile/2025/12/1764657631517.jpg','desc'=>'Default Image 3']]; } ?>
                                    {foreach $piclist as $key=>$rs}
                                    <div class="clotys-item">
                                        <img src="{$rs['image']}" alt="{$rs['desc']}">
                                    </div>
                                    {/foreach}
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
