<?php defined('IN_SDCMS') or die(); if(!defined('IN_SDCMS')) exit;?>
<?php include $this->tp->parse_include_twos("mobile/include/top.php");?>

<title><?php if (!isempty($seotitle)) {  echo $seotitle; } else {  echo $title; }?>_<?php if ($page>1) { ?>第<?php echo $page;?>页_<?php } echo $catename;?>_<?php echo add_city(C(strtoupper('web_name')),3);?></title>
<meta name="keywords" content="<?php if (!isempty($seokey)) {  echo $seokey; } else {  echo $title; }?>">
<meta name="description" content="<?php if (!isempty($seodesc)) {  echo $seodesc; } else {  echo $title; }?>">
</head>


<body class="page-news">
  <div class="app-main">
    <!--header-->
	<?php include $this->tp->parse_include_twos("mobile/include/head.php");?>

    <div class="mbnr">
      <div class="in"><img src="<?php echo WEB_THEME;?>mobile/static/picture/m-news-d.jpg"></div>
    </div>
    <div class="bodyer pnews">
      <div class="bodyer">
        <div class="wm">
          <!--content-->
          <div class="article">
            <div class="atc-hder">
              <h2 class="title"><?php echo $title;?></h2>
              <div class="metas">更新时间：<?php echo date('Y-m-d',$createdate);?></div>
            </div>
            <div class="atc-cont">
              <div class="xcont"></div>
              <div class="cpager wrapfix">
			  <?php echo $content;?>
			  </div>
            </div>
            <div class="atc-fter prevnext wrapfix">
			
              <p class="prev">上一篇：
			  <?php $array_rs=$this->db->load("select * from sd_content  where islock=1 and id>$id and classid=$classid   limit 1",0,false,0);$total_rs=count($array_rs);if($total_rs==0){ ?>
<?php } else{ ?>
<?php $i=0;} foreach($array_rs as $rs){ $i++;?>
				<a href="<?php echo showurl($rs['id'],$rs['alias'],$rs['classid']);?>" class="prev" title="<?php echo add_city($rs['title'],2);?>"><?php echo add_city($rs['title'],2);?></a>
				<?php } if($total_rs>0){ ?>
<?php }?>
			</p>
              <p class="next">下一篇：
			  <?php $array_rs=$this->db->load("select * from sd_content  where islock=1 and id>$id and classid=$classid   limit 1",0,false,0);$total_rs=count($array_rs);if($total_rs==0){ ?>
<?php } else{ ?>
<?php $i=0;} foreach($array_rs as $rs){ $i++;?>
			  <a href="<?php echo showurl($rs['id'],$rs['alias'],$rs['classid']);?>" class="next" title="<?php echo add_city($rs['title'],2);?>"><?php echo add_city($rs['title'],2);?></a>
			  <?php } if($total_rs>0){ ?>
<?php }?>
			</p>
			
            </div>
          </div>
          <!--//content-->
        </div>
      </div>
      <!-- footer -->
	  <?php include $this->tp->parse_include_twos("mobile/include/foot.php");?>

    </div>
    <script type="text/javascript">
      $(document).ready(function () {
        var swipernav = new Swiper('.scrollnav', { freeMode: true, slidesPerView: 'auto', watchSlidesVisibility: true, freeModeSticky: true });
      });
    </script>
</div>
</body>
</html>