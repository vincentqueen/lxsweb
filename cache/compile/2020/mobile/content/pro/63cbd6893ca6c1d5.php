<?php defined('IN_SDCMS') or die(); if(!defined('IN_SDCMS')) exit;?>
<?php include $this->tp->parse_include_twos("mobile/include/top.php");?>

<title><?php if (!isempty($seotitle)) {  echo $seotitle; } else {  echo $title; }?>_<?php if ($page>1) { ?>第<?php echo $page;?>页_<?php } echo $catename;?>_<?php echo add_city(C(strtoupper('web_name')),3);?></title>
<meta name="keywords" content="<?php if (!isempty($seokey)) {  echo $seokey; } else {  echo $title; }?>">
<meta name="description" content="<?php if (!isempty($seodesc)) {  echo $seodesc; } else {  echo $title; }?>">
<?php include $this->tp->parse_include_twos("mobile/include/wxshare.php");?>

</head>

<body>
	
	<div class="ui-mwidth" id="nav-top">
    	 <div class="ui-topbar ui-topbar-opacity ui-topbar-three ui-fixed ui-mwidth" data-align="fixed-top">
            <div class="ui-topbar-left"><a href="javascript:;" class="ui-icon-left ui-back"></a></div>
            <div class="ui-topbar-title ui-scrollnav" data-offset="1">
            	<ul>
                    <li class="active"><a href="#nav-top">商品详情</a></li>
					<?php if (count($edata)>0) { ?><li><a href="#nav-spec">规格参数</a></li><?php }?>
                </ul>
            </div>
            <div class="ui-topbar-right"><a href="javascript:;" class="ui-offside-show" data-target="#ui-offside-nav"><i class="ui-icon-lists"></i></a></div>
        </div>
    </div>
	<?php include $this->tp->parse_include_twos("mobile/include/nav.php");?>

    <!--商品页大图开始-->
	<?php $piclist=jsdecode($piclist,1);?>
    <?php if (count($piclist)>0) { ?>
	 <div class="ui-mwidth banner" id="show_photo">
		<div class="ui-carousel" data-arrow="false" data-page="true">
			<div class="ui-carousel-inner">
				<?php $step=0;?>
				<?php foreach($piclist as $index=>$val) { ?>
				<?php $step++;?>
				<div class="ui-carousel-item<?php if ($step==1) { ?> active<?php }?>"><a href="<?php echo $val['image'];?>" class="ui-lightbox" title="<?php echo $val['desc'];?>"><img src="<?php echo $val['image'];?>" alt="<?php echo $val['desc'];?>"></a></div>
				<?php }?>
			</div>
		</div>
	</div>
	<?php }?>
	<div class="ui-mwidth">
		<div class="ui-box ui-p-10">
			<?php include $this->tp->parse_include_twos("mobile/include/content/pro/show.php");?>

			
			<div class="ui-pt-20 ui-bg-white"></div>
			
		</div>
	</div>
	
	<?php include $this->tp->parse_include_twos("mobile/include/content/pro/show_foot.php");?>

	
</body>
</html>
