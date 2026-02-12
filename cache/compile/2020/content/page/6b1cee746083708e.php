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
                    <li><a class="anchor" href="#j_clotys">花色类型</a></li>
                    <li><a class="anchor" href="#j_ads">产品特点</a></li>
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
                    <div class="p-berneck-profile" id="j_brand">
                        <div class="wm">
                            <div class="pcont xcont">
                                <p><?php echo $content;?></p>
                                <div style="margin-top:48px;text-align:center;">
                                    <img src="<?php echo WEB_THEME;?>static/picture/berneck-01.jpg" alt="Berneck">
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--产品介绍-->
                    <div class="p-berneck-intro" id="j_intro">
                        <div class="wm">

                            <div class="main">
                            <?php $array_rs=$this->db->load("select * from sd_model_pro left join sd_content on sd_model_pro.cid=sd_content.id where id=11   limit 1",0,false,0);$total_rs=count($array_rs);if($total_rs==0){ ?>
<?php } else{ ?>
<?php $i=0;} foreach($array_rs as $rs){ $i++;?>
                                <div class="tit"><span><?php echo add_city($rs['title'],2);?></span></div>
                                <div class="bd">
                                    <div class="txt" style="width:600px;font-size:14px;">
                                    <?php echo $rs['intro'];?>
                                    </div>
                                    <div class="ls"></div>
                                    <!--<div class="metas">-->
                                    <!--<p><span>产品规格：</span><?php echo $rs['cpgg'];?> </p>-->
                                    <!--<p><span>幅面规格：</span><?php echo $rs['fmgg'];?></p>-->
                                    <!--<p><span>密度规格：</span><?php echo $rs['mdgg'];?></p>-->
                                    <!--<p><span>应用领域：</span><?php echo $rs['myyyly'];?></p>-->
                                    <!--</div>-->
                                    <div class="tbl"><img src="<?php echo $rs['pictwo'];?>" alt="参数表格"></div>
                                    <div class="tbl"><img src="<?php echo $rs['pic'];?>" alt="参数表格"></div>
                                </div>
                                <?php } if($total_rs>0){ ?>
<?php }?>
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
                                    <?php $array_rs=$this->db->load("select * from sd_model_page  where cid=52   limit 1",0,false,0);$total_rs=count($array_rs);if($total_rs==0){ ?>
<?php } else{ ?>
<?php $i=0;} foreach($array_rs as $rs){ $i++;?>
                                    <?php $piclist=json_decode($rs['piclist'],true);;?>
                                    <?php } if($total_rs>0){ ?>
<?php }?>
                                    <?php foreach($piclist as $key=>$rs) { ?>
                                        <div class="swiper-slide clotys-item">
                                            <img src="<?php echo $rs['image'];?>" alt="<?php echo $rs['desc'];?>">
                                            <div class="txt"><?php echo $rs[desc];?></div>
                                        </div>
                                    <?php }?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!--产品特点-->
                    <div class="p-berneck-ads" id="j_ads">
                        <ul>
                            <?php $array_rs=$this->db->load("select * from sd_content  where classid=35  order by ontop desc,ordnum desc,id                             desc ",0,false,0);$total_rs=count($array_rs);if($total_rs==0){ ?>
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