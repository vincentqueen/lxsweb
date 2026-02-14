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
                                <div class="cnc">{$content}</div>
                            </div>
                        </div>
                    </div>
                    <!--产品介绍-->
                    <div class="p-auvico-intro" id="j_intro">
                        <div class="wm">
                            {sdcms:rs top="1" table="sd_model_pro" join="left join sd_content on sd_model_pro.cid=sd_content.id" where="id=27"}
                            <div class="p-intro-wrapper" style="max-width: 1400px; margin: 60px auto; display: flex; gap: 60px; align-items: flex-start; padding: 0 40px;">
                                <div class="p-intro-left" style="flex: 2.5; display: flex; flex-direction: column; gap: 30px;">
                                    <div class="diagram" style="width: 100%; border-radius: 12px; overflow: hidden; box-shadow: 0 4px 20px rgba(0,0,0,0.08);">
                                        <img src="{WEB_THEME}static/image/auvic-03.png" style="width: 100%; display: block;">
                                    </div>
                                    <div class="tbl" style="width: 100%; border-radius: 12px; overflow: hidden; box-shadow: 0 4px 20px rgba(0,0,0,0.08);">
                                        <img src="{$rs[pic]}" alt="参数表格" style="width: 100%; display: block;">
                                    </div>
                                </div>
                                <div class="bd" style="flex: 1; max-width: 100%; padding-right: 200px; display: flex; flex-direction: column; justify-content: center;">
                                    <h2 class="tit" style="font-size: 32px; font-weight: 700; color: #1a1a1a; margin-bottom: 20px;">{$rs[title]}</h2>
                                    <div class="txt" style="font-size: 15px; line-height: 1.8; color: #555; margin-bottom: 24px;">
                                        {$rs[intro]}
                                    </div>
                                    <div class="specs" style="font-size: 14px; line-height: 1.6; color: #666;">
                                        <p style="margin-bottom: 6px;"><strong>产品规格：</strong>{$rs[cpgg]}</p>
                                        <p style="margin-bottom: 6px;"><strong>幅面规格：</strong>{$rs[fmgg]}</p>
                                        <p style="margin-bottom: 6px;"><strong>密度规格：</strong>{$rs[mdgg]}</p>
                                        <p style="margin-bottom: 6px;"><strong>应用领域：</strong>{$rs[myyyly]}</p>
                                    </div>
                                </div>
                            </div>
                            <style>
                                .p-intro-wrapper { transition: all 0.3s ease; }
                                .p-auvico-intro .wm { height: auto !important; min-width: unset !important; width: 100% !important; }
                                @media (max-width: 992px) {
                                    .p-intro-wrapper { flex-direction: column !important; gap: 40px !important; margin-top: 40px !important; padding: 0 20px !important; }
                                    .p-intro-left { flex: 1 !important; width: 100% !important; }
                                    .bd { flex: 1 !important; width: 100% !important; padding-right: 0 !important; }
                                    .diagram img { margin: 0 auto; }
                                }
                            </style>
                            {/sdcms:rs}
                        </div>
                    </div>

                    <!--产品特点-->
                    <div class="p-features p-berneck-ads" id="j_ads">
                        <div class="wm">
                            <style>
                                .p-berneck-ads ul {
                                    display: grid !important;
                                    grid-template-columns: repeat(2, 1fr) !important;
                                    gap: 30px !important;
                                    list-style: none !important;
                                    padding: 0 !important;
                                    margin: 0 !important;
                                }
                                .p-berneck-ads ul li {
                                    background: #fff !important;
                                    border-radius: 12px !important;
                                    overflow: hidden !important;
                                    box-shadow: 0 4px 20px rgba(0,0,0,0.08) !important;
                                    display: flex !important;
                                    flex-direction: column !important;
                                    width: 100% !important;
                                    height: auto !important;
                                    margin: 0 !important;
                                    transition: transform 0.3s ease !important;
                                }
                                .p-berneck-ads ul li:hover {
                                    transform: translateY(-5px) !important;
                                }
                                .p-berneck-ads ul li img {
                                    width: 100% !important;
                                    height: 240px !important;
                                    object-fit: cover !important;
                                    display: block !important;
                                }
                                .p-berneck-ads .info {
                                    padding: 30px !important;
                                    position: static !important;
                                    height: auto !important;
                                    background: none !important;
                                    flex: 1 !important;
                                    display: flex !important;
                                    flex-direction: column !important;
                                }
                                .p-berneck-ads h5 {
                                    font-size: 20px !important;
                                    font-weight: bold !important;
                                    margin-bottom: 15px !important;
                                    color: #333 !important;
                                }
                                .p-berneck-ads .txt {
                                    font-size: 15px !important;
                                    line-height: 1.8 !important;
                                    color: #666 !important;
                                }
                                @media (max-width: 768px) {
                                    .p-berneck-ads ul {
                                        grid-template-columns: 1fr !important;
                                    }
                                    .p-berneck-ads ul li img {
                                        height: 200px !important;
                                    }
                                }
                            </style>
                            <ul>
                            {sdcms:rs top="0" table="sd_content" where="classid=44" order="ontop desc,ordnum desc,id desc"}
                                <li>
                                    <img src="{$rs[pic]}">
                                    <div class="info">
                                        <h5>{$rs[title]}</h5>
                                        <div class="txt">{$rs[intro]}</div>
                                    </div>
                                </li>
                            {/sdcms:rs}
                            </ul>
                        </div>
                    </div>

                    <!--荣誉资质-->
                    <div class="p-certs p-auvico-certs" id="j_certs">
                        <div class="wm">
                            <div class="hd" style="margin-bottom: 50px; text-align: center;">
                                <h3 style="font-size: 36px; font-weight: 800; color: #333; margin: 0;">产品相关证书</h3>
                                <div style="width: 40px; height: 3px; background: #333; margin: 15px auto 0;"></div>
                            </div>
                            <div class="bd">
                                <div class="cloty-grid">
                                    {sdcms:rs top="1" table="sd_model_page" where="cid=33" order="pageid desc"}
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
