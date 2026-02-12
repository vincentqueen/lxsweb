<?php defined('IN_SDCMS') or die(); if(!defined('IN_SDCMS')) exit; if (is_array($piclist)) { ?>
<div class="ui-piclist ui-piclist-col-3 ui-piclist-4-3">
	<?php foreach($piclist as $key=>$rs) { ?>
	<div class="ui-piclist-item">
		<div class="ui-piclist-image"><a href="<?php echo $rs['image'];?>" class="ui-lightbox" data-title="<?php echo $rs['desc'];?>"><img src="<?php echo $rs['image'];?>" alt="<?php echo $rs['desc'];?>" /></a></div>
		<div class="ui-piclist-body">
			<div class="ui-piclist-title ui-text-center ui-text-hide"><?php echo $rs['desc'];?></div>
		</div>
	</div>
	<?php }?>
</div>
<?php }?>
<?php if (!isempty($content)) { ?>
<div class="content">
	<?php echo $content;?>
</div>
<?php }?>
<?php if ($pagenum>1) { ?><div class="ui-page ui-page-center ui-page-mid"><ul><?php echo pagelist($page,$pagenum);?></ul></div><?php }?>