<?php defined('IN_SDCMS') or die(); if(!defined('IN_SDCMS')) exit;?>

<?php include $this->tp->parse_include_twos("include/top.php");?>

</head>
<body class="home">
<div class="wrapper">

<?php include $this->tp->parse_include_twos("include/head.php");?>

<div class="bodyer">
	<div class="ui-carousel banner">
        <div class="ui-carousel-inner">
			<?php $array_rs=$this->db->load("select * from sd_ad  where akey='pc' and islock=1   limit 10",0,false,0);$total_rs=count($array_rs);if($total_rs==0){ ?>
<?php } else{ ?>
<?php $i=0;} foreach($array_rs as $rs){ $i++;?>
            <?php $adlist=jsdecode($rs['datalist'],1);?>
            <?php $step=0;?>
            <?php foreach($adlist as $num=>$val) { ?>
                <div class="ui-carousel-item<?php if ($step==0) { ?> active<?php }?>"><a href="<?php echo $val['url'];?>" title="<?php echo $val['desc'];?>"><img src="<?php echo $val['image'];?>" alt="<?php echo $val['desc'];?>"></a></div>
            <?php $step++;?>
            <?php }?>
            <?php } if($total_rs>0){ ?>
<?php }?>
		</div>
    </div>



    <div class="fx-row ibnr imrgt ibernecka">
    <?php $array_rp=$this->db->load("select * from sd_category  where cateid=2   limit 1",0,false,0);$total_rp=count($array_rp);if($total_rp==0){ ?>
<?php } else{ ?>
<?php $i=0;} foreach($array_rp as $rp){ $i++;?>
        <div class="wm">
            <div class="ibnr-bg"><img src="<?php if ($rp['sypic']!=null) {  echo $rp['sypic']; } else {  echo WEB_THEME;?>static/picture/iberneck-01.png<?php }?>" alt="<?php echo add_city($rp['catename'],1);?>"></div>
            <div class="inc">
                <div class="maina"><a href="<?php echo cateurl($rp['cateid']);?>" title="<?php echo add_city($rp['catename'],1);?>">进一步了解</a></div>
                <!-- <div class="ibnr-sq"><a href="index2.html#j_auth" class="ibnr-sq-a" title="授权查询 Query">授权查询QUERY</a></div> -->
            </div>
        </div>
    <?php } if($total_rp>0){ ?>
<?php }?> 
    </div>  
  
    <div class="fx-row ibnr imrgt iauvico">
    <?php $array_rp=$this->db->load("select * from sd_category  where cateid=41   limit 1",0,false,0);$total_rp=count($array_rp);if($total_rp==0){ ?>
<?php } else{ ?>
<?php $i=0;} foreach($array_rp as $rp){ $i++;?>
      <div class="wm">
          <div class="ibnr-bg"><img src="<?php if ($rp['sypic']!=null) {  echo $rp['sypic']; } else {  echo WEB_THEME;?>static/picture/iauvico.jpg<?php }?>" alt="<?php echo add_city($rp['catename'],1);?>"></div>
          <div class="inc">
              <div class="maina2"><a href="<?php echo cateurl($rp['cateid']);?>" title="<?php echo add_city($rp['catename'],1);?>">进一步了解</a></div>
              <!-- <div class="ibnr-sq died"><a href="index3.html#j_auth" class="ibnr-sq-a" title="授权查询 Query">授权查询QUERY</a></div> -->
          </div>
      </div>
      <?php } if($total_rp>0){ ?>
<?php }?>
    </div>
    <div class="fx-row ibnr imrgt iaige">
    <?php $array_rp=$this->db->load("select * from sd_category  where cateid=4   limit 1",0,false,0);$total_rp=count($array_rp);if($total_rp==0){ ?>
<?php } else{ ?>
<?php $i=0;} foreach($array_rp as $rp){ $i++;?>
        <div class="wm">
            <div class="ibnr-bg"><img src="<?php if ($rp['sypic']!=null) {  echo $rp['sypic']; } else {  echo WEB_THEME;?>static/picture/iaige.jpg<?php }?>" alt="<?php echo add_city($rp['catename'],1);?>"></div>
            <div class="inc">
                <div class="maina"><a href="<?php echo cateurl($rp['cateid']);?>" title="<?php echo add_city($rp['catename'],1);?>">进一步了解</a></div>
                <!-- <div class="ibnr-sq"><a href="index4.html#j_auth" class="ibnr-sq-a" title="授权查询 Query">授权查询QUERY</a></div> -->
            </div>
        </div>
        <?php } if($total_rp>0){ ?>
<?php }?>
    </div>     
    <div class="fx-row ibnr imrgt iluhua">
    <?php $array_rp=$this->db->load("select * from sd_category  where cateid=5   limit 1",0,false,0);$total_rp=count($array_rp);if($total_rp==0){ ?>
<?php } else{ ?>
<?php $i=0;} foreach($array_rp as $rp){ $i++;?>
        <div class="wm">
            <div class="ibnr-bg"><img src="<?php if ($rp['sypic']!=null) {  echo $rp['sypic']; } else {  echo WEB_THEME;?>static/picture/iluhua.jpg<?php }?>" alt="<?php echo add_city($rp['catename'],1);?>"></div>
            <div class="inc">
                <div class="maina2"><a href="<?php echo cateurl($rp['cateid']);?>" title="<?php echo add_city($rp['catename'],1);?>">进一步了解</a></div>
                <!-- <div class="ibnr-sq"><a href="index5.html#j_auth" class="ibnr-sq-a black" title="授权查询 Query">授权查询QUERY</a></div> -->
            </div>
        </div>
        <?php } if($total_rp>0){ ?>
<?php }?>
    </div>
        <div class="fx-row ibnr imrgt iaige">
    <?php $array_rp=$this->db->load("select * from sd_category  where cateid=47   limit 1",0,false,0);$total_rp=count($array_rp);if($total_rp==0){ ?>
<?php } else{ ?>
<?php $i=0;} foreach($array_rp as $rp){ $i++;?>
        <div class="wm">
            <div class="ibnr-bg"><img src="<?php if ($rp['sypic']!=null) {  echo $rp['sypic']; } else {  echo WEB_THEME;?>static/picture/iaige.jpg<?php }?>" alt="<?php echo add_city($rp['catename'],1);?>"></div>
            <div class="inc">
                <div class="maina"><a href="<?php echo cateurl($rp['cateid']);?>" title="<?php echo add_city($rp['catename'],1);?>">进一步了解</a></div>
                <!-- <div class="ibnr-sq"><a href="index4.html#j_auth" class="ibnr-sq-a" title="授权查询 Query">授权查询QUERY</a></div> -->
            </div>
        </div>
        <?php } if($total_rp>0){ ?>
<?php }?>
    </div> 

</div>

<?php include $this->tp->parse_include_twos("include/foot.php");?>

</div>
<script type="text/javascript" src="<?php echo WEB_THEME;?>static/js/index.js"></script>
</body>
</html>