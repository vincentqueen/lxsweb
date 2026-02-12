<?php defined('IN_SDCMS') or die(); if(!defined('IN_SDCMS')) exit;?>
<?php include $this->tp->parse_include_twos("include/top.php");?>

<title><?php if (!isempty($seotitle)) {  echo $seotitle; } else {  echo $title; }?>_<?php if ($page>1) { ?>第<?php echo $page;?>页_<?php } echo $catename;?>_<?php echo add_city(C(strtoupper('web_name')),3);?></title>
<meta name="keywords" content="<?php if (!isempty($seokey)) {  echo $seokey; } else {  echo $title; }?>">
<meta name="description" content="<?php if (!isempty($seodesc)) {  echo $seodesc; } else {  echo $title; }?>">
</head>

<body class="app-article">
<div class="wrapper">    
<?php include $this->tp->parse_include_twos("include/head.php");?>


<div class="bodyer pnews-detail">

    <div class="mbnr">
        <div class="bg"><img src="<?php echo WEB_THEME;?>static/picture/news.jpg"></div>
    </div>

    <!--content-->
    <div class="particle pwrap">
        <div class="container">
            <!--content-->
            <div class="pbody article">
                <div class="head">
                    <h1><?php echo $title;?></h1>
                    <div class="metas"><?php echo date('Y-m-d',$createdate);?></div>
                    <div class="summary">摘要：<?php echo cutstr(nohtml($rs[intro]),200,1);?></div>
                </div>
                <div class="cont">
					<div class="xcont">
					<?php echo $content;?>
					</div>
                    <div class="prevnext">
					<?php $array_rs=$this->db->load("select * from sd_content  where islock=1 and id>$id and classid=$classid   limit 1",0,false,0);$total_rs=count($array_rs);if($total_rs==0){ ?>
<?php } else{ ?>
<?php $i=0;} foreach($array_rs as $rs){ $i++;?>
						<p>上一篇：<a href="<?php echo showurl($rs['id'],$rs['alias'],$rs['classid']);?>" class="prev" title="<?php echo add_city($rs['title'],2);?>"><?php echo add_city($rs['title'],2);?></a></p>
					<?php } if($total_rs>0){ ?>
<?php }?>
					<?php $array_rs=$this->db->load("select * from sd_content  where islock=1 and id>$id and classid=$classid   limit 1",0,false,0);$total_rs=count($array_rs);if($total_rs==0){ ?>
<?php } else{ ?>
<?php $i=0;} foreach($array_rs as $rs){ $i++;?>
						<p>下一篇：<a href="<?php echo showurl($rs['id'],$rs['alias'],$rs['classid']);?>" class="next" title="<?php echo add_city($rs['title'],2);?>"><?php echo add_city($rs['title'],2);?></a></p>
					<?php } if($total_rs>0){ ?>
<?php }?>
					</div>
                </div>
            </div>
        </div>
    </div>
</div>
  <?php include $this->tp->parse_include_twos("include/foot.php");?>

</div>
</body>

</html>