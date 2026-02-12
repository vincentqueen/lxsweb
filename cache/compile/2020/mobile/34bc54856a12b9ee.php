<?php defined('IN_SDCMS') or die(); if(!defined('IN_SDCMS')) exit;?>
<?php include $this->tp->parse_include_twos("mobile/include/top.php");?>

<title><?php if (!isempty(add_city(C(strtoupper('seo_title')),3))) {  echo add_city(C(strtoupper('seo_title')),3); } else {  echo add_city(C(strtoupper('web_name')),3); }?></title>
<meta name="keywords" content="<?php echo add_city(C(strtoupper('seo_key')),3);?>">
<meta name="description" content="<?php echo add_city(C(strtoupper('seo_desc')),3);?>">
<?php include $this->tp->parse_include_twos("mobile/include/wxshare.php");?>

</head>

<body class="page-home">
<div class="app-main">
<?php include $this->tp->parse_include_twos("mobile/include/head.php");?>

	<!--Banner部分开始-->
	<div class="ui-mwidth banner">
    	<div class="ui-carousel" data-arrow="false">
            <div class="ui-carousel-inner">
            	<?php $array_rs=$this->db->load("select * from sd_ad  where akey='mobile' and islock=1   limit 10",0,false,0);$total_rs=count($array_rs);if($total_rs==0){ ?>
<?php } else{ ?>
<?php $i=0;} foreach($array_rs as $rs){ $i++;?>
                    <?php $adlist=jsdecode($rs['datalist'],1);?>
                	<?php $step=0;?>
                    <?php foreach($adlist as $num=>$val) { ?>
                    	<div class="ui-carousel-item<?php if ($step==0) { ?> active<?php }?>"><a href="<?php echo $val['url'];?>"><img src="<?php echo $val['image'];?>" alt="<?php echo $val['desc'];?>"></a></div>
                    <?php $step++;?>
                    <?php }?>
                <?php } if($total_rs>0){ ?>
<?php }?>
            </div>
        </div>
    </div>
	<!--Banner部分结束-->
	
	<!--如有变更，请自行更换（代码特征：cateurl(3)，followid=3，get_sonid_all(3)）,以下其他栏目调用方式相同-->
	<div class="bodyer">
	<?php $array_rp=$this->db->load("select * from sd_category  where cateid=2   limit 1",0,false,0);$total_rp=count($array_rp);if($total_rp==0){ ?>
<?php } else{ ?>
<?php $i=0;} foreach($array_rp as $rp){ $i++;?>
    <div class="fx-row ibnr imrgt i-berneck">
        <div class="container">
          <div class="ibnr-bg">
			<a href="<?php echo cateurl($rp['cateid']);?>" title="<?php echo add_city($rp['catename'],1);?>">
				<img src="<?php if ($rp['sypic']!=null) {  echo $rp['sypic']; } else {  echo WEB_THEME;?>static/picture/iberneck-01.png<?php }?>" alt="<?php echo add_city($rp['catename'],1);?>">
			</a>
		</div>
        </div>
    </div>
	<?php } if($total_rp>0){ ?>
<?php }?>
	<?php $array_rp=$this->db->load("select * from sd_category  where cateid=41   limit 1",0,false,0);$total_rp=count($array_rp);if($total_rp==0){ ?>
<?php } else{ ?>
<?php $i=0;} foreach($array_rp as $rp){ $i++;?>
    <div class="fx-row ibnr imrgt iauvico">
      <div class="container">
          <div class="ibnr-bg">
			<a href="<?php echo cateurl($rp['cateid']);?>" title="<?php echo add_city($rp['catename'],1);?>">
				<img src="<?php if ($rp['sypic']!=null) {  echo $rp['sypic']; } else {  echo WEB_THEME;?>static/picture/iauvico.jpg<?php }?>" alt="<?php echo add_city($rp['catename'],1);?>">
			</a>
		</div>
      </div>
    </div>   
	<?php } if($total_rp>0){ ?>
<?php }?>
	<?php $array_rp=$this->db->load("select * from sd_category  where cateid=4   limit 1",0,false,0);$total_rp=count($array_rp);if($total_rp==0){ ?>
<?php } else{ ?>
<?php $i=0;} foreach($array_rp as $rp){ $i++;?>
    <div class="fx-row ibnr imrgt iaige">
      <div class="container">
          <div class="ibnr-bg">
			<a href="<?php echo cateurl($rp['cateid']);?>" title="<?php echo add_city($rp['catename'],1);?>">
				<img src="<?php if ($rp['sypic']!=null) {  echo $rp['sypic']; } else {  echo WEB_THEME;?>static/picture/iaige.jpg<?php }?>" alt="<?php echo add_city($rp['catename'],1);?>">
			</a>
		</div>
      </div>
    </div>     
	<?php } if($total_rp>0){ ?>
<?php }?>
	<?php $array_rp=$this->db->load("select * from sd_category  where cateid=5   limit 1",0,false,0);$total_rp=count($array_rp);if($total_rp==0){ ?>
<?php } else{ ?>
<?php $i=0;} foreach($array_rp as $rp){ $i++;?>
    <div class="fx-row ibnr imrgt iluhua">
        <div class="container">
            <div class="ibnr-bg">
				<a href="<?php echo cateurl($rp['cateid']);?>" title="<?php echo add_city($rp['catename'],1);?>">
					<img src="<?php if ($rp['sypic']!=null) {  echo $rp['sypic']; } else {  echo WEB_THEME;?>static/picture/iluhua.jpg<?php }?>" alt="<?php echo add_city($rp['catename'],1);?>">
				</a>
			</div>
        </div>
    </div> 
	<?php } if($total_rp>0){ ?>
<?php }?>
</div>
	
	
	<?php include $this->tp->parse_include_twos("mobile/include/foot.php");?>

	<script type="text/javascript" src="<?php echo WEB_THEME;?>mobile/static/js/index.js"></script>
	<!-- <script>
	$(function()
	{
		/*首页链接添加选中效果*/
		$("#bar_home").addClass("active");
	})
	</script> -->
</div>
</body>
</html>
