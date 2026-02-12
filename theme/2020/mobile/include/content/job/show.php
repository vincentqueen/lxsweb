<?php if(!defined('IN_SDCMS')) exit;?>
<div class="artshow">
	<h1>{$title}</h1>
	<div class="other">
		<ul>
			<li><span>地点：</span>{$work_address}</li>
            <li><span>性质：</span>{$work_nature}</li>
            <li><span>学历：</span>{$work_education}</li>
			<li><span>年限：</span>{$work_age}</li>
			<li><span>薪资：</span>{$work_money}</li>
            <li><span>人数：</span>{$work_num}</li>
            <li><span>日期：</span>{date('Y-m-d',$createdate)}</li>
			<li><span>人气：</span>{$hits}</li>
		</ul>
	</div>
	
	<div class="ui-menu ui-menu-blue">
		<div class="ui-menu-name">工作内容</div>
	</div>
	<div class="content ui-mt-20">
		{$content}
	</div>
	
	<div class="ui-menu ui-menu-blue">
		<div class="ui-menu-name">任职要求</div>
	</div>
	<div class="content ui-mt-20">
		{$intro}
	</div>
	
	{if count($tagslist)>0}
	<div class="tags">
		<i class="ui-icon-tags"></i> 标签：<br />
		{foreach $tagslist as $rs}
			<a href="{$rs['url']}" title="{$rs['name']}" class="ui-btn ui-btn-sm">{$rs['name']}</a>
		{/foreach}
	</div>
	
	<div class="ui-menu ui-menu-blue">
		<div class="ui-menu-name">相关内容</div>
	</div>
	<ul class="ui-list ui-mt-15">
		{sdcms:rs top="10" table="sd_content" where="$like" order="ontop desc,ordnum desc,id desc"}
		<li class="ui-text-hide"><a href="{$rs[link]}" title="{$rs[title]}"><i class="ui-icon-square ui-font-14 ui-mr ui-text-blue"></i>{$rs[title]}</a></li>
		{/sdcms:rs}
	</ul>
	
	{/if}
			
</div>