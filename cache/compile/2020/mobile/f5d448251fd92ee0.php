<?php defined('IN_SDCMS') or die(); if(!defined('IN_SDCMS')) exit;?>
<ul class="ui-media-list ui-mt-20">
	<?php $total_rs=$this->db->count("select count(1) from sd_content $join where $where ");$pagesize=$catepage;$totalpage=ceil($total_rs/$pagesize);if($page>$totalpage){
$page=1;}$offset=($page-1)*$pagesize;$way=0;if($offset>1000 && $total_rs>2000 && $offset>$total_rs/2){	$offset=$total_rs-$offset-$pagesize;	$way=1;}if($offset<0){	$pagesize+=$offset;	$offset=0;}$key_="id";$table_="sd_content";$join_="$join";$where_="where $where";$group_="";$order_="order by ontop desc,ordnum desc,id desc";$field_="*";$keylist=$this->db->getkeylist($key_,$table_,$join_,$where_,$order_,$offset,$pagesize,$way);$array_rs=$this->db->load("select $field_ from $table_ $join_ $keylist $group_ $order_");$pg=new sdcms_page($total_rs,$totalpage,$pagesize,$page);$showpage=$pg->showpage(3);if($total_rs==0){ ?>没有资料<?php } else{  $i=0;} foreach($array_rs as $rs){ $i++;?>
	
	<li class="ui-media">
		<div class="ui-media-img ui-mr-20">
			<a href="<?php echo showurl($rs['id'],$rs['alias'],$rs['classid']);?>" title="<?php echo add_city($rs['title'],2);?>"><?php if ($rs['ispic']==0) { ?><svg width="100" height="90" xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="xMidYMid slice" focusable="false" role="img" aria-label="Placeholder: Image cap"><rect width="100%" height="100%" fill="#fafafa" /><text x="50%" y="50%" fill="#666666" dy=".3em">暂无图片</text></svg><?php } else { ?><img src="<?php echo $rs['pic'];?>" alt="<?php echo add_city($rs['title'],2);?>" width="100" /><?php }?></a>
		</div>
		<div class="ui-media-body">
			<div class="ui-media-header ui-text-hide"><a href="<?php echo showurl($rs['id'],$rs['alias'],$rs['classid']);?>" title="<?php echo add_city($rs['title'],2);?>"><?php echo add_city($rs['title'],2);?></a></div>
			<div class="ui-media-text ui-font-12 ui-text-gray ui-text-hide"><?php echo nohtml($rs['intro']);?></div>
			<div class="ui-media-other ui-row"><div class="ui-col-6"><span class="ui-icon-time-circle ui-text-gray"></span> <?php echo date('Y-m-d',$rs['createdate']);?></div><div class="ui-col-6 ui-text-right"><span class="ui-icon-eye ui-text-gray"></span> <?php echo $rs['hits'];?></div></div>
		</div>
	</li>
	<?php } if($total_rs>0){  }?>
</ul>
<?php if ($total_rs>0) { ?><div class="ui-page ui-page-center ui-page-mid ui-mt-20"><ul><?php echo $showpage;?></ul></div><?php }?>
