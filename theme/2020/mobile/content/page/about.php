<?php if (!defined('IN_SDCMS'))
    exit; ?>
{include file="mobile/include/top.php"}
<title>{if !isempty($catetitle)}{$catetitle}{else}{$catename}{/if}_{if $page>1}第{$page}页_{/if}{sdcms[web_name]}</title>
<meta name="keywords" content="{if !isempty($catekey)}{$catekey}{else}{$catename}{/if}">
<meta name="description" content="{if !isempty($catedesc)}{$catedesc}{else}{$catename}{/if}">
</head>

<body class="page-about">
    <div class="app-main">
        <!--header-->
        {include file="mobile/include/head.php"}
        <!---//menu-wrap-->
        <div class="mbnr">
            <div class="in"><img src="{$mynybanner}"></div>
        </div>

        <div class="pwrap p-about">
            <div class="pbody">
                <div class="p-about-profile" id="j_brand">
                    <div class="wm">
                        <div class="about-cat"><img src="https://w.yksyb.cn/img.php?w=276&h=86" alt="关于理想树"></div>
                        <div class="pcont xcont">
                            <div class="cnc">
                                <p>
                                    {$content}
                                </p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="p-about-scale" id="j_channel">
                    <div class="wm"><img src="https://w.yksyb.cn/img.php?w=1200&h=886" alt="企业文化"></div>
                </div>


                <div class="about-sc p-about-hist" id="j_hist">
                    <div class="wm">
                        <div class="hist-main">
                            <div class="hist-item" id="j-hist-2024" style="display: block;"><img
                                    src="https://w.yksyb.cn/img.php?w=1258&h=419" alt="品牌历史 2024"></div>
                            <div class="hist-item" id="j-hist-2023"><img src="https://w.yksyb.cn/img.php?w=1258&h=419"
                                    alt="品牌历史 2023"></div>
                            <div class="hist-item" id="j-hist-2022"><img src="https://w.yksyb.cn/img.php?w=1258&h=419"
                                    alt="品牌历史 2022"></div>
                            <div class="hist-item" id="j-hist-2021"><img src="https://w.yksyb.cn/img.php?w=1258&h=419"
                                    alt="品牌历史 2021"></div>
                            <div class="hist-item" id="j-hist-2020"><img src="https://w.yksyb.cn/img.php?w=1258&h=419"
                                    alt="品牌历史 2020"></div>
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

                <!--conent end-->
            </div>
        </div>
        <!-- footer -->
        {include file="mobile/include/foot.php"}
    </div>
    <script type="text/javascript" src="{WEB_THEME}mobile/static/js/lightbox.min.js"></script>
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
        });
    </script>
</body>

</html>