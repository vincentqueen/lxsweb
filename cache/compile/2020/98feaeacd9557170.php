<?php defined('IN_SDCMS') or die(); if(!defined('IN_SDCMS')) exit;?>
<div class="ui-menu ui-menu-blue">
	<div class="ui-menu-name">留言列表</div>
</div>
<?php $total_rs=$this->db->count("select count(1) from sd_book  where islock=1 ");$pagesize=10;$totalpage=ceil($total_rs/$pagesize);if($page>$totalpage){
$page=1;}$offset=($page-1)*$pagesize;$way=0;if($offset>1000 && $total_rs>2000 && $offset>$total_rs/2){	$offset=$total_rs-$offset-$pagesize;	$way=1;}if($offset<0){	$pagesize+=$offset;	$offset=0;}$key_="id";$table_="sd_book";$join_="";$where_="where islock=1";$group_="";$order_="order by ontop desc,id desc";$field_="*";$keylist=$this->db->getkeylist($key_,$table_,$join_,$where_,$order_,$offset,$pagesize,$way);$array_rs=$this->db->load("select $field_ from $table_ $join_ $keylist $group_ $order_");$pg=new sdcms_page($total_rs,$totalpage,$pagesize,$page);$showpage=$pg->showpage(5);if($total_rs==0){ ?><div class="ui-pt-15">暂无留言</div><?php } else{  $i=0;} foreach($array_rs as $rs){ $i++;?>

<div class="ui-card ui-card-book ui-mt-20">
	<div class="ui-card-header"><div class="ui-card-header-title"><?php echo $rs['truename'];?></div><div class="ui-card-header-more ui-text-gray"><?php echo date('Y-m-d H:i',$rs['createdate']);?></div></div>
	<div class="ui-card-body">
		<div><?php echo $rs['remark'];?></div>
	</div>
	<?php if (strlen($rs['reply'])>0) { ?>
	<div class="ui-card-footer">
		<strong>回复：</strong><?php echo $rs['reply'];?> 
	</div>
	<?php }?>
</div>
<?php } if($total_rs>0){  }?>
<div class="ui-page ui-page-center ui-page-mid ui-mt-20 ui-mb"><ul><?php echo $showpage;?></ul></div>

<div class="ui-menu ui-menu-blue">
	<div class="ui-menu-name">我要留言</div>
</div>
<form class="ui-form ui-mt-30" method="post">
	<div class="ui-form-group ui-row">
		<label class="ui-col-2 ui-col-form-label ui-text-right">姓名：</label>
		<div class="ui-col-10">
			<input type="text" name="truename" class="ui-form-ip" placeholder="请输入姓名" data-rule="姓名:required;">
		</div>
	</div>
	<div class="ui-form-group ui-row">
		<label class="ui-col-2 ui-col-form-label ui-text-right">手机：</label>
		<div class="ui-col-10">
			<input type="text" name="mobile" maxlength="11" class="ui-form-ip" placeholder="请输入手机号码" data-rule="手机号码:required;mobile;">
		</div>
	</div>
	<div class="ui-form-group ui-row">
		<label class="ui-col-2 ui-col-form-label ui-text-right">座机：</label>
		<div class="ui-col-10">
			<input type="text" name="tel" class="ui-form-ip" placeholder="请输入座机号码（可选）">
		</div>
	</div>
	<div class="ui-form-group ui-row">
		<label class="ui-col-2 ui-col-form-label ui-text-right">留言：</label>
		<div class="ui-col-10">
			<textarea name="remark" class="ui-form-ip ui-form-limit" data-max="255" rows="4" placeholder="请输入留言内容" data-rule="留言内容:required;"></textarea>
			<div class="ui-form-limit-text"><span>0</span>/255</div>
		</div>
	</div>
	<div class="ui-form-group ui-row">
		<label class="ui-col-2 ui-col-form-label ui-text-right">验证码：</label>
		<div class="ui-col-10">
			<div class="ui-input-group">
				<input type="text" name="code" id="code" class="ui-form-ip ui-radius-right-none" placeholder="请输入验证码" data-rule="验证码:required;">
				<div class="code"><img src="<?php echo U('code');?>" height="40" id="verify" title="点击更换验证码"></div>
			</div>
		</div>
	</div>
	<div class="ui-form-group ui-row">
		<div class="ui-col-10 ui-offset-2">
			<input type="hidden" name="token" value="<?php echo $token;?>"><input type="submit" class="ui-btn ui-btn-blue" value="提交">
		</div>
	</div>
</form>