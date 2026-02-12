<?php defined('IN_SDCMS') or die(); if(!defined('IN_SDCMS')) exit;?>
<div class="artshow">
	<h1><?php echo $title;?></h1>
	<div class="info">
		<span>日期：</span><?php echo date('Y-m-d',$createdate);?>　<span>人气：</span><?php echo $hits;?>
	</div>
	<div class="content">
		<?php echo $content;?>
	</div>
	
	<?php if (count($edata)>0) { ?>
	<div class="ui-menu ui-menu-blue" id="nav-spec">
		<div class="ui-menu-name">规格参数</div>
	</div>
	<div class="proshow_content">
		<ul class="extend">
			<?php foreach($edata as $key=>$rs) { ?>
			<li><em><?php echo $rs['field_title'];?>：</em><?php if (isset($extend[$rs['field_key']])) {  echo $extend[$rs['field_key']]; }?></li>
			<?php }?>
		</ul>
	</div>
	<?php }?>
	
	<?php if (count($tagslist)>0) { ?>
	<div class="tags">
		<i class="ui-icon-tags"></i> 标签：<br />
		<?php foreach($tagslist as $rs) { ?>
			<a href="<?php echo $rs['url'];?>" title="<?php echo $rs['name'];?>" class="ui-btn ui-btn-sm"><?php echo $rs['name'];?></a>
		<?php }?>
	</div>
	
	<div class="ui-menu ui-menu-blue">
		<div class="ui-menu-name">相关内容</div>
	</div>
	<div class="ui-piclist ui-piclist-col-2 ui-piclist-1-1 ui-piclist-100 mt">
		<?php $array_rs=$this->db->load("select * from sd_model_pro left join sd_content on sd_model_pro.cid=sd_content.id where $like  order by ontop desc,ordnum desc,id desc limit 8",0,false,0);$total_rs=count($array_rs);if($total_rs==0){ ?>
<?php } else{ ?>
<?php $i=0;} foreach($array_rs as $rs){ $i++;?>
		<div class="ui-piclist-item">
			<div class="ui-piclist-image"><a href="<?php echo showurl($rs['id'],$rs['alias'],$rs['classid']);?>" title="<?php echo add_city($rs['title'],2);?>"><?php if ($rs['ispic']==0) { ?><svg width="100%" height="140" xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="xMidYMid slice" focusable="false" role="img" aria-label="Placeholder: Image cap"><rect width="100%" height="100%" fill="#fafafa" /><text x="50%" y="50%" fill="#666666" dy=".3em">暂无图片</text></svg><?php } else { ?><img src="<?php echo $rs['pic'];?>" alt="<?php echo add_city($rs['title'],2);?>" /><?php }?></a></div>
			<div class="ui-piclist-body">
				<div class="ui-piclist-title ui-text-center ui-text-hide"><a href="<?php echo showurl($rs['id'],$rs['alias'],$rs['classid']);?>" title="<?php echo add_city($rs['title'],2);?>"><?php echo add_city($rs['title'],2);?></a></div>
			</div>
		</div>
		<?php } if($total_rs>0){ ?>
<?php }?>
	</div>
	
	<?php }?>
			
</div>