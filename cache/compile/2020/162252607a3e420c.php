<?php defined('IN_SDCMS') or die(); if(!defined('IN_SDCMS')) exit;?>
<?php $self_name='网站地图';?>
<?php $self_ename='sitemap';?>
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
						<?php $array_rp=$this->db->load("select * from sd_category  where followid=0 and isshow=1  order by catenum,cateid ",0,false,0);$total_rp=count($array_rp);if($total_rp==0){ ?>
<?php } else{ ?>
<?php $i=0;} foreach($array_rp as $rp){ $i++; $map_sonid=$rp['cateid'];?>
						<div class="ui-menu">
							<div class="ui-menu-name"><a href="<?php echo cateurl($rp['cateid']);?>" title="<?php echo add_city($rp['catename'],1);?>"<?php if ($rp['isblank']==1) { ?> target="_blank"<?php }?>><?php echo add_city($rp['catename'],1);?></a></div>
						</div>
						<div class="ui-mt-20">
							<?php $array_rs=$this->db->load("select * from sd_category  where followid=$map_sonid and isshow=1  order by catenum,cateid ",0,false,0);$total_rs=count($array_rs);if($total_rs==0){ ?>
<?php } else{ ?>
<?php $i=0;} foreach($array_rs as $rs){ $i++;?>
							<a href="<?php echo cateurl($rs['cateid']);?>" title="<?php echo add_city($rs['catename'],1);?>"<?php if ($rs['isblank']==1) { ?> target="_blank"<?php }?> class="ui-btn ui-mr ui-mb"><?php echo add_city($rs['catename'],1);?></a>
							<?php } if($total_rs>0){ ?>
<?php }?>
						</div>
						<?php } if($total_rp>0){ ?>
<?php }?>
						<!--over-->
					</div>
				</div>
			
			</div>
		</div>
	</div>
	
	<?php include $this->tp->parse_include_twos("include/foot.php");?>


</body>
</html>