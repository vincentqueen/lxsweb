<?php defined('IN_SDCMS') or die(); if(!defined('IN_SDCMS')) exit;?>
<?php include $this->tp->parse_include_twos("include/top.php");?>

<title><?php if (!isempty($catetitle)) {  echo $catetitle; } else {  echo $catename; } echo $filter_key;?>_<?php if ($page>1) { ?>第<?php echo $page;?>页_<?php } echo add_city(C(strtoupper('web_name')),3);?></title>
<meta name="keywords" content="<?php if (!isempty($catekey)) {  echo $catekey; } else {  echo $catename; }?>">
<meta name="description" content="<?php if (!isempty($catedesc)) {  echo $catedesc; } else {  echo $catename; }?>">
</head>

<body class="app-news">
<div class="wrapper">   
<?php include $this->tp->parse_include_twos("include/head.php");?>
 
  
<div class="bodyer">

    <div class="mbnr">
        <div class="bg"><img src="<?php echo WEB_THEME;?>static/picture/news.jpg"></div>
    </div>

	<div class="pnews">
		<div class="pwrap">
            <div class="wm">
                <!--main list-->
                <div class="pbody ui-atc">
                    <div class="news-list clr">
					<?php $array_rs=$this->db->load("select * from sd_content  where classid=28  order by ontop desc,ordnum desc,id desc ",0,false,0);$total_rs=count($array_rs);if($total_rs==0){ ?>
<?php } else{ ?>
<?php $i=0;} foreach($array_rs as $rs){ $i++;?>
                        <div class="news item-1 odd">
                            <div class="news-in">
								<a title="<?php echo add_city($rs['title'],2);?>" href="<?php echo showurl($rs['id'],$rs['alias'],$rs['classid']);?>">
								<div class="thumb 1">
									<img src="<?php echo $rs['pic'];?>" alt="<?php echo add_city($rs['title'],2);?>">
								</div>
								<div class="info">
									<h5><?php echo add_city($rs['title'],2);?></h5>
									<div class="date">
										<?php echo date('m-d',$rs['createdate']);?>
									</div>
									<div class="txt">
										<?php echo cutstr(nohtml($rs['intro']),200,1);?>
									</div>
								</div>
							    </a>
						    </div>
                        </div>
						<?php } if($total_rs>0){ ?>
<?php }?>
                    </div> 
                    <div class="clr pagers">
						<span class="pprev disabled">上一页</span>
						<span class="pnum cpb">1</span>
						<span class="pnext disabled">下一页</span>
					</div>
                </div>
            </div>
        </div>
	</div>
</div>
<?php include $this->tp->parse_include_twos("include/foot.php");?>


</div><!--wrapper-->
<script type="text/javascript" src="<?php echo WEB_THEME;?>static/js/distpicker.min.js"></script>
<script type="text/javascript" src="<?php echo WEB_THEME;?>static/js/jquery.form.min.js"></script>
<script type="text/javascript" src="<?php echo WEB_THEME;?>static/js/Validform_v5.3.2_min.js"></script>
<script type="text/javascript" src="<?php echo WEB_THEME;?>static/js/btmpop.js"></script>
</body>
</html>
