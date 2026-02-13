<?php if(!defined('IN_SDCMS')) exit;?>
<div class="artshow">
	<div class="ui-row">
		<div class="ui-col-9"><h1>{$title}</h1></div>
		<div class="ui-col-3 ui-text-right"><a href="{U('form/add','fid=1&jobname='.$title.'')}" target="_blank" class="ui-btn ui-btn-blue">提交简历</a></div>
	</div>
	
	<div class="other">
		<ul>
			<li><span>工作地点：</span>{$work_address}<br><span>工作性质：</span>{$work_nature}</li>
			<li><span>学历要求：</span>{$work_education}<br><span>工作年限：</span>{$work_age}</li>
			<li><span>薪资待遇：</span>{$work_money}<br><span>招聘人数：</span>{$work_num}</li>
			<li><span>发布日期：</span>{date('Y-m-d',$createdate)}<br><span>人气：</span>{$hits}</li>
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
	
	<div class="action">
		<div class="ui-text-center"><a class="digs" data-url="{U('other/digs/','id='.$id.'&act=up','',1)}" data-token="{$token}"><i class="ui-icon-like"></i><em>{$upnum}</em></a>赞</div>
		<div class="ui-text-center"><a class="digs" data-url="{U('other/digs/','id='.$id.'&act=down','',1)}" data-token="{$token}"><i class="ui-icon-unlike"></i><em>{$downnum}</em></a>踩</div>
	</div>
	
	{if count($tagslist)>0}
	<div class="tags">
		<i class="ui-icon-tags"></i> 标签：
		{foreach $tagslist as $rs}
			<a href="{$rs['url']}" title="{$rs['name']}" target="_blank" class="ui-btn ui-btn-sm">{$rs['name']}</a>
		{/foreach}
	</div>
	
	<div class="ui-menu ui-menu-blue">
		<div class="ui-menu-name">相关内容</div>
	</div>
	<ul class="ui-list ui-mt-15">
		{sdcms:rs top="10" table="sd_content" where="$like" order="ontop desc,ordnum desc,id desc"}
		<li><a href="{$rs[link]}" title="{$rs[title]}"><i class="ui-icon-square ui-font-14 ui-mr ui-text-blue"></i>{$rs[title]}</a></li>
		{/sdcms:rs}
	</ul>
	{/if}
			
</div>