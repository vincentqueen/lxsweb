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
                            {sdcms:rs top="1" table="sd_model_pro" join="left join sd_content on sd_model_pro.cid=sd_content.id" where="id=16"}
                            <div class="p-intro-grid" style="max-width: 1500px; margin: 60px auto; display: grid; grid-template-columns: 2.5fr 1fr; gap: 80px; align-items: center; padding: 0 40px; justify-content: flex-start;">
                                <div class="diagram" style="position: relative; width: 100% !important; max-width: 100% !important; margin: 0 !important;">
                                    <img src="{WEB_THEME}static/picture/karrisen-02-demo.jpg" style="position: relative; width: 100%; border-radius: 12px; display: block; box-shadow: 0 4px 20px rgba(0,0,0,0.08); z-index: 1;">
                                </div>
                                <div class="bd" style="padding-right: 20px;">
                                    <div style="width: 60px; height: 4px; background: #333; margin-bottom: 24px;"></div>
                                    <h2 class="tit" style="font-size: 36px; font-weight: 800; color: #1a1a1a; margin-bottom: 24px; letter-spacing: -0.5px;">{$rs[title]}</h2>
                                    <div class="txt" style="font-size: 16px; line-height: 1.9; color: #555; margin-bottom: 32px; text-align: justify;">
                                        {$rs[intro]}
                                    </div>
                                    <div class="tbl" style="background: #fff; padding: 24px; border-radius: 16px; border: 1px solid #eee; box-shadow: 0 4px 12px rgba(0,0,0,0.03);">
                                        <img src="{$rs[pic]}" alt="参数表格" style="max-width: 100%; display: block;">
                                    </div>
                                </div>
                            </div>
                            <style>
                                @media (max-width: 992px) {
                                    .p-intro-grid { grid-template-columns: 1fr !important; gap: 40px !important; margin-top: 40px !important; padding: 0 20px !important; }
                                    .p-intro-grid .bd { padding-right: 0 !important; }
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
                            {sdcms:rs top="0" table="sd_content" where="classid=39" order="ontop desc,ordnum desc,id desc"}
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
                            <div class="hd">
                                <h3 style="font-size: 30px; color: #333; font-weight: 800; text-align: center; margin-bottom: 40px;">产品相关证书</h3>
                            </div>
                            <div class="bd">
                                <div class="cloty-grid">
                                    {sdcms:rs top="1" table="sd_model_page" where="cid=42" order="pageid desc"}
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
