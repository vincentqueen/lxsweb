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
                                <div class="hd" style="margin-bottom: 30px; text-align: center;">
                                    <h2 style="font-size: 30px; color: #333; margin-bottom: 10px; font-weight: 800;">产品展示</h2>
                                    <h3 style="font-size: 24px; color: #666; font-weight: 500;">卢卡尔曼精板</h3>
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
                                <img src="{WEB_THEME}static/image/berneck-05-copy.png" alt="产品展示" style="width: 100%; border-radius: 20px;">
                            </div>
                        </div>
                    </div>
                    
                    <!--花色类型-->
                    <div class="p-berneck-cloty" id="j_clotys">
                        <div class="wm">
                            <div class="hd" style="margin-bottom: 30px; text-align: center;">
                                <h3 style="font-size: 30px; font-weight: 800; color: #333; margin: 0;">花色类型</h3>
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
                                <div class="cloty-more-btn">显示更多</div>
                                <script>
                                (function(){
                                    var items = document.querySelectorAll('.p-berneck-cloty .clotys-item');
                                    var btn = document.querySelector('.p-berneck-cloty .cloty-more-btn');
                                    var limit = 8; 
                                    if(items.length > limit){
                                        for(var i=limit;i<items.length;i++){
                                            items[i].style.display = 'none';
                                        }
                                        if(btn){
                                            btn.style.display = 'block';
                                            btn.style.cursor = 'pointer';
                                            btn.onclick = function(){
                                                for(var i=limit;i<items.length;i++){
                                                    items[i].style.display = '';
                                                }
                                                this.style.display = 'none';
                                            }
                                        }
                                    } else {
                                        if(btn) btn.style.display = 'none';
                                    }
                                })();
                                </script>
                            </div>
                        </div>
                    </div>
                    
                    <!--产品特点-->
                    <div class="p-berneck-ads" id="j_ads">
                        <div class="wm">
                            <div class="hd" style="margin-bottom: 30px; text-align: center;">
                                <h3 style="font-size: 30px; font-weight: 800; color: #333; margin: 0;">产品特点</h3>
                            </div>
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
                            {sdcms:rs top="0" table="sd_content" where="classid=26" order="ontop desc,ordnum desc,id desc"}
                                <li>
                                    <img src="{$rs[pic]}">
                                    <div class="info">
                                        <h5>{$rs[title]}</h5>
                                        <div class="txt">{if !isempty($rs[intro])}{$rs[intro]}{else}{$rs[content]}{/if}</div>
                                    </div>
                                </li>
                                {/sdcms:rs}
                            </ul>
                        </div>
                    </div>
                    
                    <!--授权厂家-->
                    <div class="p-berneck-cert" id="j_certs">
                        <div class="wm">
                            <div class="hd" style="margin-bottom: 30px; text-align: center;">
                                <h3 style="font-size: 30px; font-weight: 800; color: #333; margin: 0;">授权厂家</h3>
                            </div>
                            <div class="bd">
                                <style>
                                    .cert-grid {
                                        display: grid !important;
                                        grid-template-columns: repeat(4, 1fr) !important;
                                        gap: 20px !important;
                                        margin-top: 30px !important;
                                    }
                                    .cert-grid img {
                                        width: 100% !important;
                                        height: auto !important;
                                        border-radius: 8px !important;
                                        box-shadow: 0 4px 10px rgba(0,0,0,0.05) !important;
                                        transition: transform 0.3s !important;
                                        display: block !important;
                                    }
                                    .cert-grid img:hover {
                                        transform: translateY(-5px) !important;
                                        box-shadow: 0 10px 20px rgba(0,0,0,0.1) !important;
                                    }
                                    @media (max-width: 768px) {
                                        .cert-grid {
                                            grid-template-columns: repeat(2, 1fr) !important;
                                        }
                                    }
                                </style>
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
        
        <style>
            /* Color Types Collapse */
            .cloty-grid {
                max-height: 660px; /* Approx 2 rows */
                overflow: hidden;
                transition: max-height 0.8s ease;
                position: relative;
            }
            .cloty-grid::after {
                content: '';
                position: absolute;
                bottom: 0;
                left: 0;
                width: 100%;
                height: 100px;
                background: linear-gradient(to bottom, rgba(255,255,255,0), rgba(255,255,255,1));
                pointer-events: none;
                opacity: 1;
                transition: opacity 0.3s;
            }
            .cloty-grid.expanded {
                max-height: 5000px; /* Large enough */
            }
            .cloty-grid.expanded::after {
                opacity: 0;
            }
            .cloty-more-btn {
                display: block;
                width: 160px;
                margin: 30px auto 0;
                padding: 12px 0;
                text-align: center;
                border: 1px solid #333;
                color: #333;
                border-radius: 30px;
                cursor: pointer;
                transition: all 0.3s;
                background: #fff;
                font-size: 14px;
                letter-spacing: 1px;
                position: relative;
                z-index: 10;
            }
            .cloty-more-btn:hover {
                background: #333;
                color: #fff;
            }

            /* Product Features Redesign */
            #j_ads ul {
                display: grid;
                grid-template-columns: repeat(2, 1fr);
                gap: 30px;
            }
            #j_ads li {
                background: #fff;
                border-radius: 16px;
                box-shadow: 0 10px 30px rgba(0,0,0,0.06);
                overflow: hidden;
                transition: transform 0.3s ease, box-shadow 0.3s ease;
                border: 1px solid #f0f0f0;
                margin-bottom: 0;
                height: 100%;
                display: flex;
                flex-direction: column;
            }
            #j_ads li:hover {
                transform: translateY(-8px);
                box-shadow: 0 20px 40px rgba(0,0,0,0.1);
            }
            #j_ads li img {
                width: 100%;
                height: auto;
                aspect-ratio: 926 / 350;
                object-fit: cover;
                display: block;
            }
            #j_ads li .info {
                padding: 30px;
                background: #fff;
                flex: 1;
                display: flex;
                flex-direction: column;
            }
            #j_ads li h5 {
                font-size: 20px;
                font-weight: 700;
                color: #333;
                margin-bottom: 15px;
                position: relative;
                padding-left: 16px;
                line-height: 1.4;
            }
            #j_ads li h5::before {
                content: '';
                position: absolute;
                left: 0;
                top: 6px;
                width: 4px;
                height: 18px;
                background: #c8a063;
                border-radius: 2px;
            }
            #j_ads li .txt {
                font-size: 15px;
                color: #666;
                line-height: 1.8;
                text-align: justify;
                white-space: pre-line; /* 保留换行符，确保列表展示清晰 */
                overflow: visible;     /* 确保文字不被截断 */
                height: auto;
            }

            /* Authorized Manufacturers Optimization */
            #j_certs .cert-grid {
                display: flex;
                justify-content: center;
                align-items: center;
                gap: 60px;
                flex-wrap: wrap;
                padding: 40px 0;
            }
            #j_certs .cert-grid img {
                height: 60px; /* Increased from 45px */
                width: auto;
                max-width: 220px;
                object-fit: contain;
                filter: grayscale(100%);
                opacity: 0.7;
                transition: all 0.4s ease;
            }
            #j_certs .cert-grid img:hover {
                filter: grayscale(0);
                opacity: 1;
                transform: scale(1.1);
            }
        </style>

        <script type="text/javascript">
            $(function () {
                // Color Types Collapse Logic
                $('.cloty-more-btn').on('click', function() {
                    var $grid = $(this).prev('.cloty-grid');
                    $grid.toggleClass('expanded');
                    if ($grid.hasClass('expanded')) {
                        $(this).text('收起更多');
                    } else {
                        $(this).text('显示更多');
                        $('html, body').animate({
                            scrollTop: $("#j_clotys").offset().top - 100
                        }, 500);
                    }
                });

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
