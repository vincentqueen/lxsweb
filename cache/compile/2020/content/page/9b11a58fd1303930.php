<?php defined('IN_SDCMS') or die(); if (!defined('IN_SDCMS'))
    exit; ?>
<?php include $this->tp->parse_include_twos("include/top.php");?>

<title><?php if (!isempty($catetitle)) {  echo $catetitle; } else {  echo $catename; }?>_<?php if ($page>1) { ?>第<?php echo $page;?>页_<?php } echo add_city(C(strtoupper('web_name')),3);?></title>
<meta name="keywords" content="<?php if (!isempty($catekey)) {  echo $catekey; } else {  echo $catename; }?>">
<meta name="description" content="<?php if (!isempty($catedesc)) {  echo $catedesc; } else {  echo $catename; }?>">
</head>

<body class="page-about sub">
    <div class="wrapper">
        <?php include $this->tp->parse_include_twos("include/head.php");?>

        <div class="bodyer">
            <div class="snavbar">
                <ul class="wm snav">
                    <li><a class="anchor" href="#j_brand">公司介绍</a></li>
                    <?php if (false) { ?><li><a class="anchor" href="#j_hist">发展历程</a></li><?php }?>
                    <li><a class="anchor" href="#j_channel">企业文化</a></li>
                    <li><a class="anchor" href="#j_certs">荣誉资质</a></li>
                    <li><a class="anchor" href="#j_certs1">环保等级</a></li>
                </ul>
            </div>
            <!--内页banner-->
            <div class="mbnr">
                <div class="bg"><img src="<?php echo $mynybanner;?>"></div>
            </div>
            <div class="pwrap p-about">
                <div class="pbody">

                    <!--公司介绍-->
                    <div class="p-about-profile" id="j_brand">
                        <div class="wm">
                            <div class="about-cat"><img src="<?php echo add_city(C(strtoupper('web_logo')),3);?>" alt="关于理想树"></div>
                            <div class="pcont xcont">
                                <div class="cnc"><?php echo $content;?></div>
                            </div>
                        </div>
                    </div>

                    <!--企业文化-->
                    <div class="p-about-scale" id="j_channel">
                        <div class="wm"><img src="<?php echo WEB_THEME;?>static/image/ab-wn.jpg" alt="企业文化"></div>
                    </div>

                    <!--发展历程-->
                    <?php if (false) { ?>
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
                    <?php }?>
                    <!--荣誉资质-->
                    <div class="p-berneck-cert" id="j_certs">
                        <div class="wm">
                            <div class="hd">
                                <h3>荣誉资质</h3>
                            </div>
                            <div class="bd">
                                <div class="berneck-certs swiper-container" id="j_certs_slide">
                                    <div class="swiper-wrapper">
                                        <?php $array_rs=$this->db->load("select * from sd_model_page  where cid=21   limit 1",0,false,0);$total_rs=count($array_rs);if($total_rs==0){ ?>
<?php } else{ ?>
<?php $i=0;} foreach($array_rs as $rs){ $i++;?>
                                        <?php $piclist=json_decode($rs['piclist'],true);;?>
                                        <?php } if($total_rs>0){ ?>
<?php }?>
                                        <?php foreach($piclist as $key=>$rs) { ?>
                                        <div class="swiper-slide certs-item">
                                            <img src="<?php echo $rs['image'];?>" alt="<?php echo $rs['desc'];?>">
                                        </div>
                                        <?php }?>
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
                                        <?php $array_rs=$this->db->load("select * from sd_model_page  where cid=53   limit 1",0,false,0);$total_rs=count($array_rs);if($total_rs==0){ ?>
<?php } else{ ?>
<?php $i=0;} foreach($array_rs as $rs){ $i++;?>
                                        <?php $piclist=json_decode($rs['piclist'],true);;?>
                                        <?php } if($total_rs>0){ ?>
<?php }?>
                                        <?php foreach($piclist as $key=>$rs) { ?>
                                        <div class="swiper-slide certs-item">
                                            <img src="<?php echo $rs['image'];?>" alt="<?php echo $rs['desc'];?>">
                                        </div>
                                        <?php }?>
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
        <?php include $this->tp->parse_include_twos("include/foot.php");?>


    </div>
    <!--wrapper-->

    <script type="text/javascript" src="<?php echo WEB_THEME;?>static/js/lightbox.min.js"></script>
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