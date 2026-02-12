<?php defined('IN_SDCMS') or die();?><!--<?php if(!defined('IN_SDCMS')) exit;?>-->
<!--<?php if (!isset($self_name)) {  $self_name=''; }?>-->
<!--<?php if (!isset($self_ename)) {  $self_ename=''; }?>-->
<!--<?php if (!isset($topid)) {  $topid=-1; }?>-->
<!--<div class="banner_inner" style="background:url(<?php echo WEB_THEME;?>images/banner.jpg) no-repeat center;">-->
<!--	<div class="width">-->
<!--		<div class="title"><?php echo get_catename($topid,$self_name);?><span><?php echo get_cate_info($topid,'myename',$self_ename);?></span></div>-->
<!--		<div class="intro"><?php $data_block=include("theme/2020/block/inner_text.php");echo $data_block[0];?></div>-->
<!--		<div class="position">-->
<!--			<div class="ui-bread ui-bread-1">-->
<!--				<ul>-->
<!--					<li><a href="<?php echo $webroot;?>"><i class="ui-icon-home ui-text-gray ui-mr"></i>首页</a></li>-->
<!--					<?php foreach($position as $rs) { ?>-->
<!--					<li><a href="<?php echo $rs['url'];?>" title="<?php echo $rs['name'];?>"><?php echo $rs['name'];?></a></li>-->
<!--					<?php }?>-->
<!--				</ul>-->
<!--			</div>-->
<!--		</div>-->
<!--	</div>-->
<!--</div>-->

<div class="mixbanner">
		<script type="text/javascript" src="<?php echo WEB_THEME;?>static/js/ad-1.js"></script>
	</div>