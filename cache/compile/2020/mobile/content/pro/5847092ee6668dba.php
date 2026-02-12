<?php defined('IN_SDCMS') or die(); if(!defined('IN_SDCMS')) exit;?>
<?php include $this->tp->parse_include_twos("mobile/include/top.php");?>

<title><?php if (!isempty($catetitle)) {  echo $catetitle; } else {  echo $catename; } echo $filter_key;?>_<?php if ($page>1) { ?>第<?php echo $page;?>页_<?php } echo add_city(C(strtoupper('web_name')),3);?></title>
<meta name="keywords" content="<?php if (!isempty($catekey)) {  echo $catekey; } else {  echo $catename; }?>">
<meta name="description" content="<?php if (!isempty($catedesc)) {  echo $catedesc; } else {  echo $catename; }?>">
<?php include $this->tp->parse_include_twos("mobile/include/wxshare.php");?>

</head>

<body>
	
	<?php include $this->tp->parse_include_twos("mobile/include/head.php");?>


	<div class="ui-mwidth">
		<div class="ui-box ui-p-10">

			<?php include $this->tp->parse_include_twos("mobile/include/content/category.php");?>

			<?php include $this->tp->parse_include_twos("mobile/include/content/filter.php");?>

			<?php include $this->tp->parse_include_twos("mobile/include/content/pro/list.php");?>

			
			<div class="ui-pt-20 ui-bg-white"></div>
			
		</div>
		
	</div>
	
	<?php include $this->tp->parse_include_twos("mobile/include/foot.php");?>

	<script>
	$(function()
	{
		$(".ui-topbar-title").html("<?php echo get_catename($topid);?>");
	})
	</script>
</body>
</html>
