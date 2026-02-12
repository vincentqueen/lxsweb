<?php defined('IN_SDCMS') or die(); if(!defined('IN_SDCMS')) exit;?>
<?php include $this->tp->parse_include_twos("mobile/include/top.php");?>

<title><?php if (!isempty($catetitle)) {  echo $catetitle; } else {  echo $catename; } echo $filter_key;?>_<?php if ($page>1) { ?>第<?php echo $page;?>页_<?php } echo add_city(C(strtoupper('web_name')),3);?></title>
<meta name="keywords" content="<?php if (!isempty($catekey)) {  echo $catekey; } else {  echo $catename; }?>">
<meta name="description" content="<?php if (!isempty($catedesc)) {  echo $catedesc; } else {  echo $catename; }?>">
</head>

<body class="page-news" id="jpage-newslist">
<div class="app-main"> 
    <!--header-->
	<?php include $this->tp->parse_include_twos("mobile/include/head.php");?>

    <div class="mbnr">
        <div class="in"><img src="<?php echo $mynybanner;?>"></div>
    </div>
    <div class="bodyer pnews">
        <div class="wm"> 
            <!--body content-->
            <div class="bder ui-atc">
                <div class="mod-atcs">
				<?php $array_rs=$this->db->load("select * from sd_content  where classid=28  order by ontop desc,ordnum desc,id desc ",0,false,0);$total_rs=count($array_rs);if($total_rs==0){ ?>
<?php } else{ ?>
<?php $i=0;} foreach($array_rs as $rs){ $i++;?>
                    <div class="mod-atc" data-aid="68">
                        <a title="<?php echo add_city($rs['title'],2);?>" href="<?php echo showurl($rs['id'],$rs['alias'],$rs['classid']);?>">
                            <div class="thumb 1"><img src="<?php echo $rs['pic'];?>" alt="<?php echo add_city($rs['title'],2);?>"></div>
                            <div class="info">
                                <h5><?php echo add_city($rs['title'],2);?></h5>
                                <div class="txt"><?php echo cutstr(nohtml($rs['intro']),100,1);?></div>
                                <div class="tms"><?php echo date('m-d',$rs['createdate']);?></div>
                            </div>
                        </a>
                    </div>
					<?php } if($total_rs>0){ ?>
<?php }?>
                </div> 
                <div class="pagers"></div>
            </div>
            <!--//body content-->
        </div>
    </div>
    <!-- footer -->
	<?php include $this->tp->parse_include_twos("mobile/include/foot.php");?>

</div>
<script type="text/javascript">
    $(document).ready(function () {
    });
</script>
</body>
</html>
