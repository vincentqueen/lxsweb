<?php defined('IN_SDCMS') or die(); if (!defined('IN_SDCMS'))
    exit; ?>
<meta charset="utf-8">
<?php include $this->tp->parse_include_twos("mobile/include/top.php");?>

<title><?php if (!isempty($catetitle)) {  echo $catetitle; } else {  echo $catename; }?>_<?php if ($page>1) { ?>第<?php echo $page;?>页_<?php } echo add_city(C(strtoupper('web_name')),3);?></title>
<meta name="keywords" content="<?php if (!isempty($catekey)) {  echo $catekey; } else {  echo $catename; }?>">
<meta name="description" content="<?php if (!isempty($catedesc)) {  echo $catedesc; } else {  echo $catename; }?>">
</head>

<body class="page-berneck">
<div class="app-main">
<!--header-->
<?php include $this->tp->parse_include_twos("mobile/include/head.php");?>

<div class="mbnr">
  <div class="in"><img src="<?php echo $mynybanner;?>" alt="无醛板"></div>
</div>
<div class="bodyer">
    <div class="pwrap p-berneck">
        <div class="pbody">

            <div class="p-berneck-profile" id="j_brand">
                <div class="wm">
                    <div class="pcont xcont">
                        <p><?php echo $content;?></p>
                    </div>
                </div>
            </div>

            <div class="p-berneck-intro p-aige-intro" id="j_intro">
                <div class="wm">
                <?php $array_rs=$this->db->load("select * from sd_model_pro left join sd_content on sd_model_pro.cid=sd_content.id where id=11   limit 1",0,false,0);$total_rs=count($array_rs);if($total_rs==0){ ?>
<?php } else{ ?>
<?php $i=0;} foreach($array_rs as $rs){ $i++;?>
                    <div class="tit"><span><?php echo add_city($rs['title'],2);?></span></div>                        
                    <div class="bd">
                        <div class="txt"><?php echo $rs['intro'];?></div>
                        <div class="demo"><img src="<?php echo WEB_THEME;?>mobile/static/picture/aige-05-m.jpg"></div>
                        <div class="metas">
                            <p><span>产品规格：</span><?php echo $rs['cpgg'];?> </p>
                            <p><span>幅面规格：</span><?php echo $rs['fmgg'];?></p>
                            <p><span>密度规格：</span><?php echo $rs['mdgg'];?></p>
                            <p><span>应用领域：</span><?php echo $rs['myyyly'];?></p>
                        </div>
                        <div class="tbl"><img src="<?php echo $rs['pic'];?>" alt="参数表格"></div>
                    </div>
                <?php } if($total_rs>0){ ?>
<?php }?>
                </div>
            </div>

            <div class="p-berneck-ads" id="j_ads">
                <ul>
                <?php $array_rs=$this->db->load("select * from sd_content  where classid=35   ",0,false,0);$total_rs=count($array_rs);if($total_rs==0){ ?>
<?php } else{ ?>
<?php $i=0;} foreach($array_rs as $rs){ $i++;?>
                    <li>
                        <img src="<?php echo $rs['pic'];?>">
                        <div class="info">
                            <h5><?php echo add_city($rs['title'],2);?></h5>
                            <div class="txt"><?php echo cutstr(nohtml($rs['intro']),210,1);?></div>
                        </div>
                    </li>
                <?php } if($total_rs>0){ ?>
<?php }?>
                </ul>
            </div>

            <div class="p-berneck-cert p-aige-cert" id="j_certs">
                <div class="wm">
                    <div class="hd"><h3>产品相关证书</h3></div>
                    <div class="bd">
                        <div class="berneck-certs swiper-container" id="j_certs_slide">
                            <div class="swiper-wrapper">
                            <?php $array_rs=$this->db->load("select * from sd_model_page  where cid=36   limit 1",0,false,0);$total_rs=count($array_rs);if($total_rs==0){ ?>
<?php } else{ ?>
<?php $i=0;} foreach($array_rs as $rs){ $i++;?>
                                        <?php $piclist=json_decode($rs['piclist'],true);;?>
                                        <?php } if($total_rs>0){ ?>
<?php }?>
                                        <?php foreach($piclist as $key=>$rs) { ?>
                                <div class="swiper-slide certs-item"><img src="<?php echo $rs['image'];?>" alt="<?php echo $rs['desc'];?>"></div>
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
<!-- footer -->
<?php include $this->tp->parse_include_twos("mobile/include/foot.php");?>

</div><!--wrapper-->
<script type="text/javascript" src="<?php echo WEB_THEME;?>mobile/static/js/lightbox.min.js"></script>
<script type="text/javascript">  
$(function(){  
    $(".hist-years ul").on('click','li',function(){
        var _this = $(this);
        var year = $(this).data("year");
        _this.siblings('li').removeClass("current");
        _this.addClass("current");
        $(".hist-item").hide();
        $("#j-hist-"+year).show();
    });
    var iPCertsSlider = new Swiper('#j_certs_slide', {
        loop:false,
        autoplay:false,
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