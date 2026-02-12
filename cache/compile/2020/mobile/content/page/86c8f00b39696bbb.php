<?php defined('IN_SDCMS') or die(); if (!defined('IN_SDCMS'))
    exit; ?>
<?php include $this->tp->parse_include_twos("mobile/include/top.php");?>

<title><?php if (!isempty($catetitle)) {  echo $catetitle; } else {  echo $catename; }?>_<?php if ($page>1) { ?>第<?php echo $page;?>页_<?php } echo add_city(C(strtoupper('web_name')),3);?></title>
<meta name="keywords" content="<?php if (!isempty($catekey)) {  echo $catekey; } else {  echo $catename; }?>">
<meta name="description" content="<?php if (!isempty($catedesc)) {  echo $catedesc; } else {  echo $catename; }?>">
</head>

<body class="page-about">
    <div class="app-main">
        <!--header-->
        <?php include $this->tp->parse_include_twos("mobile/include/head.php");?>

        <!---//menu-wrap-->
        <div class="mbnr">
            <div class="in"><img src="<?php echo $mynybanner;?>"></div>
        </div>

        <div class="pwrap p-about">
            <div class="pbody">
                <div class="p-about-profile" id="j_brand">
                    <div class="wm">
                        <div class="about-cat"><img src="https://w.yksyb.cn/img.php?w=276&h=86" alt="关于理想树"></div>
                        <div class="pcont xcont">
                            <div class="cnc">
                                <p>
                                    <?php echo $content;?>
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
        <?php include $this->tp->parse_include_twos("mobile/include/foot.php");?>

    </div>
    <script type="text/javascript" src="<?php echo WEB_THEME;?>mobile/static/js/lightbox.min.js"></script>
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