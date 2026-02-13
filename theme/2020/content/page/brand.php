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
                    <li><a class="anchor" href="#j_certs">授权厂家</a></li>
                </ul>
            </div>
            <!--内页banner-->
            <div class="mbnr">
                <div class="bg"><img src="{$mynybanner}"></div>
            </div>

            <div class="pwrap p-berneck">
                <div class="pbody">
                    <!--品牌简介-->
                    <div class="p-about-profile" id="j_brand">
                        <div class="wm">
                            <div class="about-cat"><img src="{sdcms[web_logo]}" alt="关于理想树"></div>
                            <div class="pcont xcont">
                                <div class="cnc">
                                    {$content}
                                    <div class="profile-grids">
                                        <div class="item"><img src="/upfile/2026/0213-1欧松板.png"></div>
                                        <div class="item"><img src="/upfile/2026/0213-2颗粒板.png"></div>
                                        <div class="item"><img src="/upfile/2026/0213-3多层板.png"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--产品介绍--> 
                    <div class="p-berneck-intro" id="j_intro">
                        <div class="wm">
                            <div class="bd">
                                <div class="hd" style="margin-bottom: 30px;">
                                    <h2 style="font-size: 18px; color: var(--muted); margin-bottom: 10px; font-weight: 500;">产品展示</h2>
                                    <h3 style="font-size: 36px; color: var(--brand-deep); font-weight: 800;">卢卡尔曼精板</h3>
                                </div>
                                <div class="txt">
                                    <p style="margin-bottom: 20px;">秉承“绿色家居，健康生活”的理念，致力于推动家居行业的可持续发展。品牌坚信，环保不仅是责任，更是未来家居生活的核心。</p>
                                    <p style="color: #666; font-size: 15px;">应用领域：采用国际高环保标准ENF，甲醛释放量极低，几乎为零。适用于定制家具、办公家具、教学用家具、酒店家具</p>
                                </div>
                                <div class="ls" style="margin: 30px 0;"><span style="color: red; font-weight: bold; font-size: 18px;">指导零售价：颗粒板699元/㎡，欧松板799元/㎡，多层板899元/㎡</span></div>
                                <div class="tbl">
                                    <img src="/upfile/2025/03/1742889987592.png" title="参数表格" style="width: 100%; border: 1px solid #eee; border-radius: 8px;">
                                </div>
                            </div>
                            <div class="diagram">
                                <img src="/theme/2020/static/image/berneck-05 拷贝.png" alt="产品展示" style="width: 100%; border-radius: 20px;">
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
                                <div class="cloty-grid">
                                    {sdcms:rs top="1" table="sd_model_page" where="cid=46" order="pageid desc"}
                                    {php $piclist=jsdecode($rs[piclist],1);}
                                    {/sdcms:rs}
                                    <?php if(empty($piclist)){ $piclist=[['image'=>'/upfile/2025/12/HS/1764658102609.jpg','desc'=>'V8001-美川胡桃'],['image'=>'/upfile/2025/12/HS/1764658114242.jpg','desc'=>'V8002-欧帝胡桃'],['image'=>'/upfile/2025/12/HS/1764658114244.jpg','desc'=>'V8003-半衫刀木'],['image'=>'/upfile/2025/12/HS/1764658114447.jpg','desc'=>'V8004-北美胡桃']]; } ?>
                                    {foreach $piclist as $key=>$rs}
                                    <div class="clotys-item">
                                        <img src="{$rs['image']}" alt="{$rs['desc']}">
                                        <div class="txt">{$rs['desc']}</div>
                                    </div>
                                    {/foreach}
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <!--产品特点-->
                    <div class="p-berneck-ads" id="j_ads">
                        <div class="wm">
                            <div class="hd" style="margin-bottom: 40px; text-align: center;"><h3>产品特点</h3></div>
                            <ul>
                            {sdcms:rs top="0" table="sd_content" where="classid=26" order="ontop desc,ordnum desc,id desc"}
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
                    
                    <!--授权厂家-->
                    <div class="p-berneck-cert" id="j_certs">
                        <div class="wm">
                            <div class="hd">
                                <h3>授权厂家</h3>
                            </div>
                            <div class="bd">
                                <div class="cert-grid">
                                    <img src="{WEB_THEME}static/image/sq.jpg" alt="授权厂家">
                                    <img src="{WEB_THEME}static/image/sq2.jpg" alt="授权厂家">
                                    <img src="{WEB_THEME}static/image/sq3.jpg" alt="授权厂家">
                                    <img src="{WEB_THEME}static/image/sq4.jpg" alt="授权厂家">
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
