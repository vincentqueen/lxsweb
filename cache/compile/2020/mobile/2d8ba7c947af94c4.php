<?php defined('IN_SDCMS') or die(); if(!defined('IN_SDCMS')) exit;?>
<?php if (count($filter)>0&&$isfilter==1) { ?>
<div class="ui-filter ui-mt-15">
	<?php foreach($filter as $rs) { ?>
	<div class="ui-row">
		<div class="ui-col-2 ui-filter-left"><?php echo $rs['field_title'];?>：</div>
		<div class="ui-col-10 ui-filter-right">
			<a href="<?php echo filter_url($cateurl,$classid,deal_filter($filter_data,$rs['field_key'],0));?>"<?php if (getint(F('get.'.$rs['field_key'].''),0)==0) { ?> class="active"<?php }?>>全部</a>
			<?php if ($rs['field_type']==14) { ?>
			<?php $table_=$rs['field_table']; $join_=$rs['field_join']; $where_=$rs['field_where']; $order_=$rs['field_order']; $value=$rs['field_value']; $label=$rs['field_label'];?>
			<?php if ($where_=='') {  $where_='1=1'; }?>
			<?php if ($order_=='') {  $order_="$value desc"; }?>
			<?php $array_ra=$this->db->load("select * from $table_ $join_ where $where_  order by $order_ ",0,false,0);$total_ra=count($array_ra);if($total_ra==0){ ?>
<?php } else{ ?>
<?php $i=0;} foreach($array_ra as $ra){ $i++;?>
			<a href="<?php echo filter_url($cateurl,$classid,''.deal_filter($filter_data,$rs['field_key'],$ra[''.$value.'']));?>"<?php if (getint(F('get.'.$rs['field_key'].''),0)==$ra[''.$value.'']) { ?> class="active"<?php }?>><?php echo $ra[''.$label.''];?></a>
			<?php } if($total_ra>0){ ?>
<?php }?>
			<?php } else { ?>
			<?php $arr=explode(",",$rs['field_list']);?>
			<?php foreach($arr as $j=>$key) { ?>
			<?php $data=explode("|",$key);?>
			<a href="<?php echo filter_url($cateurl,$classid,deal_filter($filter_data,$rs['field_key'],$data[1]));?>"<?php if (getint(F('get.'.$rs['field_key'].''),0)==$data[1]) { ?> class="active"<?php }?>><?php echo $data[0];?></a>
			<?php }?>
			<?php }?>
		</div>
	</div>
	<?php }?>
</div>
<?php }?>