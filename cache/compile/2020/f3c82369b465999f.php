<?php defined('IN_SDCMS') or die(); if(!defined('IN_SDCMS')) exit;?>
<?php if (!isset($topid) || $topid<0) {  $topid=1; }?>
<div class="ui-box ui-box-radius">
	<div class="ui-box-title"><?php echo get_catename($topid);?><span><?php echo get_cate_info($topid,'myename');?></span></div>
	<div class="ui-box-nav ui-collapse-menu">
		<?php $array_rp=$this->db->load("select * from sd_category  where followid=$topid  order by catenum,cateid ",0,false,0);$total_rp=count($array_rp);if($total_rp==0){ ?>
		<div class="ui-collapse-menu-title active">
			<a href="<?php echo cateurl($topid);?>"><?php echo get_catename($topid);?></a>
		</div>
		
<?php } else{ ?>
<?php $i=0;} foreach($array_rp as $rp){ $i++;?>
		<?php $sub_sonid=$rp['cateid'];?>
		<?php $sub_num=get_sonid_num($rp['cateid']);?>
		

		<div class="ui-collapse-menu-title <?php echo is_active($rp['cateid'],$parentid,'active',1);?>">
			<a href="<?php echo cateurl($rp['cateid']);?>" title="<?php echo add_city($rp['catename'],1);?>"><?php echo add_city($rp['catename'],1);?></a><?php if ($sub_num>0) { ?><i class="ui-icon-right"></i><?php }?>
		</div>
		<?php if ($sub_num>0) { ?>
		<div class="ui-collapse-menu-body <?php echo is_active($rp['cateid'],$parentid,'show',1);?>">
			<ul>
				<?php $array_rs=$this->db->load("select * from sd_category  where followid=$sub_sonid  order by catenum,cateid ",0,false,0);$total_rs=count($array_rs);if($total_rs==0){ ?>
<?php } else{ ?>
<?php $i=0;} foreach($array_rs as $rs){ $i++;?>
				<li<?php echo is_active($rs['cateid'],$parentid,'active');?>><a href="<?php echo cateurl($rs['cateid']);?>" title="<?php echo add_city($rs['catename'],1);?>"<?php if ($rs['isblank']==1) { ?> target="_blank"<?php }?>><i class="ui-icon-square ui-font-14 ui-mr"></i><?php echo add_city($rs['catename'],1);?></a></li>
				<?php } if($total_rs>0){ ?>
<?php }?>
			</ul>
		</div>
		<?php }?>
		<?php } if($total_rp>0){ ?>
<?php }?>
	</div>
</div>