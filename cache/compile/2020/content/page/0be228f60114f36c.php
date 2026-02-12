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
                    <li><a class="anchor" href="#j_brand">品牌简介</a></li>
                    <li><a class="anchor" href="#j_intro">产品介绍</a></li>
                    <li><a class="anchor" href="#j_ads">产品特点</a></li>
                   <?php if (false) { ?> <li><a class="anchor" href="#j_certs">荣誉资质</a></li><?php }?>
                    <!-- <li><a class="anchor" href="#j_auth">授权查询</a></li> -->
                </ul>
            </div>
            <!--内页banner-->
            <div class="mbnr">
                <div class="bg"><img src="<?php echo $mynybanner;?>"></div>
            </div>


            <div class="pwrap p-berneck">
                <div class="pbody">
                    <!--品牌简介-->
                    <div class="p-berneck-profile p-auvico-profile" id="j_brand">
                        <div class="wm">
                            <div class="pcont xcont">
                                <p><?php echo $content;?></p>
                                <div style="margin-top:48px;text-align:center;">
                                   <!-- <img src="<?php echo WEB_THEME;?>static/picture/berneck-01.jpg" alt="Berneck"> -->
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--产品介绍--> 
                    <div class="p-auvico-intro" id="j_intro">
                        <div class="wm">
                            <div class="diagram"><img src="<?php echo WEB_THEME;?>static/image/auvic-03.png"></div>
                            <div class="bd">
                            <?php $array_rs=$this->db->load("select * from sd_model_pro left join sd_content on sd_model_pro.cid=sd_content.id where id=27   limit 1",0,false,0);$total_rs=count($array_rs);if($total_rs==0){ ?>
<?php } else{ ?>
<?php $i=0;} foreach($array_rs as $rs){ $i++;?>
                                <p class="tit"><?php echo add_city($rs['title'],2);?></p>
                                <p class="txt">
                                <?php echo $rs['intro'];?>
                                </p>
                                <div class="txt">
                                    <div class="para2 sec02">
                                    <p class="bold">产品规格：<?php echo $rs['cpgg'];?></p>
                                    <p class="bold">幅面规格：<?php echo $rs['fmgg'];?></p>
                                    <p class="bold">密度规格：<?php echo $rs['mdgg'];?></p>
                                    <p class="bold">应用领域：<?php echo $rs['myyyly'];?></p>
                                    </div>
                                     <div class="tbl"><img src="<?php echo $rs['pic'];?>" title="参数表格"></div> 
                                </div>
                            <?php } if($total_rs>0){ ?>
<?php }?>
                            </div>
                        </div>
                    </div>

                    <!--产品特点-->
                    <div class="p-features p-berneck-ads" id="j_ads">
                        <ul>
                        <?php $array_rs=$this->db->load("select * from sd_content  where classid=44  order by ontop desc,ordnum desc,id desc ",0,false,0);$total_rs=count($array_rs);if($total_rs==0){ ?>
<?php } else{ ?>
<?php $i=0;} foreach($array_rs as $rs){ $i++;?>
                            <li>
                                <img src="<?php echo $rs['pic'];?>">
                                <div class="info">
                                    <h5><?php echo add_city($rs['title'],2);?></h5>
                                    <div class="txt"><?php echo cutstr(nohtml($rs['intro']),1000,1);?></div>
                                </div>
                            </li>
                        <?php } if($total_rs>0){ ?>
<?php }?>
                        </ul>
                    </div>

                    <!--荣誉资质-->
                    <?php if (false) { ?>
                    <div class="p-certs p-auvico-certs" id="j_certs">
                        <div class="wm">
                            <div class="hd">
                                <h3><img src="<?php echo WEB_THEME;?>static/picture/auvico-10-tit.png" alt="产品相关证书"></h3>
                            </div>
                            <div class="bd">
                                <div class="p-certs-body swiper-container" id="j_certs_slide">
                                    <div class="swiper-wrapper">
                                    <?php $array_rs=$this->db->load("select * from sd_model_page  where cid=32   limit 1",0,false,0);$total_rs=count($array_rs);if($total_rs==0){ ?>
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
                    <?php }?>
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