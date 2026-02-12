<?php defined('IN_SDCMS') or die(); if (!defined('IN_SDCMS'))
	exit; ?>

<div class="menu-wrap" id="style-1">
	<nav class="gnavbar">
		<dl class="gnav">
			<dt class="gnav-title">网站导航</dt>
			<dd>
				<ul class="nav-main icon-list">
					<li class="active"><a class="nav" title="首页" href="<?php echo $webroot;?>"><span>首页</span></a>
					</li>
					<?php $array_rp=$this->db->load("select * from sd_category  where followid=0 and isshow=1  order by catenum,cateid ",0,false,0);$total_rp=count($array_rp);if($total_rp==0){ ?>
<?php } else{ ?>
<?php $i=0;} foreach($array_rp as $rp){ $i++;?>
					<?php $sub_sonid=$rp['cateid'];?>
					<li class="<?php echo is_active($rp['cateid'],$parentid,'active',1);?>">
						<a class="nav" title="<?php echo add_city($rp['catename'],1);?>"
							href="<?php echo cateurl($rp['cateid']);?>"><span><?php echo add_city($rp['catename'],1);?></span></a>
					</li>
					<?php } if($total_rp>0){ ?>
<?php }?>

				</ul>
			</dd>
		</dl>
	</nav>
	<!-- <button class="gnav-close" id="close-button">C</button> -->
</div>