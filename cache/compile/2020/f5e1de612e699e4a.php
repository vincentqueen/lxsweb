<?php defined('IN_SDCMS') or die(); if(!defined('IN_SDCMS')) exit; $self_name='在线留言';?>
<?php $self_ename='message';?>
<?php $position=[['name'=>$self_name,'url'=>THIS_LOCAL]];?>
<?php include $this->tp->parse_include_twos("include/top.php");?>

<title><?php echo $self_name;?>_<?php echo add_city(C(strtoupper('web_name')),3);?></title>
<meta name="keywords" content="<?php echo add_city(C(strtoupper('seo_key')),3);?>">
<meta name="description" content="<?php echo add_city(C(strtoupper('seo_desc')),3);?>">
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
					<div class="ui-box-h2"><?php echo $self_name;?></div>
					<div class="ui-box-body">
						<!--begin-->
						<?php include $this->tp->parse_include_twos("include/book/body.php");?>

						<!--over-->
					</div>
				</div>
			
			</div>
		</div>
	</div>
	
	<?php include $this->tp->parse_include_twos("include/foot.php");?>

	<?php include $this->tp->parse_include_twos("include/book/foot.php");?>

</body>
</html>