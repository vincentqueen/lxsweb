<?php defined('IN_SDCMS') or die(); if(!defined('IN_SDCMS')) exit;?>
<div class="ui-row subnav">
	<?php $array_rp=$this->db->load("select * from sd_category  where followid=$classid  order by catenum,cateid ",0,false,0);$total_rp=count($array_rp);if($total_rp==0){  if ($followid>0) { ?>
		<?php $array_rs=$this->db->load("select * from sd_category  where followid=$followid  order by catenum,cateid ",0,false,0);$total_rs=count($array_rs);if($total_rs==0){ ?>
<?php } else{ ?>
<?php $i=0;} foreach($array_rs as $rs){ $i++;?>
			<div class="ui-col-4 <?php if ($classid==$rs['cateid']) { ?> active<?php }?>"><a href="<?php echo cateurl($rs['cateid']);?>" title="<?php echo add_city($rs['catename'],1);?>"><?php echo add_city($rs['catename'],1);?></a></div>
		<?php } if($total_rs>0){ ?>
<?php } }?>
	
<?php } else{ ?>
<?php $i=0;} foreach($array_rp as $rp){ $i++;?>
	
	<div class="ui-col-4<?php if ($classid==$rp['cateid']) { ?> active<?php }?>"><a href="<?php echo cateurl($rp['cateid']);?>" title="<?php echo add_city($rp['catename'],1);?>"><?php echo add_city($rp['catename'],1);?></a></div>
	<?php } if($total_rp>0){ ?>
<?php }?>
</div>