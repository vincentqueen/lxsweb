<?php defined('IN_SDCMS') or die(); if(!defined('IN_SDCMS')) exit;?>
<?php include $this->tp->parse_include_twos("include/top.php");?>

<title><?php if (!isempty($catetitle)) {  echo $catetitle; } else {  echo $catename; }?>_<?php if ($page>1) { ?>第<?php echo $page;?>页_<?php } echo add_city(C(strtoupper('web_name')),3);?></title>
<meta name="keywords" content="<?php if (!isempty($catekey)) {  echo $catekey; } else {  echo $catename; }?>">
<meta name="description" content="<?php if (!isempty($catedesc)) {  echo $catedesc; } else {  echo $catename; }?>">
</head>

<body>
	<?php include $this->tp->parse_include_twos("include/head.php");?>

	<?php include $this->tp->parse_include_twos("include/banner_inner.php");?>


	<div class="container">
		<div class="width ui-row">
			<div class="container-left">
				<div class="ui-fixed-s" data-parent=".container">
					<?php include $this->tp->parse_include_twos("include/left_nav.php");?>

				</div>
			</div>
			
			<div class="container-right">
			
				<div class="ui-box">
					<div class="ui-box-h2"><?php echo $catename;?></div>
					<div class="ui-box-body">
						<!---->
						<?php include $this->tp->parse_include_twos("include/content/page.php");?>

						<!---->
					</div>
				</div>
			
			</div>
		</div>
	</div>
	
	<?php include $this->tp->parse_include_twos("include/foot.php");?>


</body>
</html>