<?php if(!defined('IN_SDCMS')) exit;?>
<div class="artshow">
	<h1>{$title}</h1>
	<div class="info">
		<span>日期：</span>{date('Y-m-d',$createdate)}　<span>人气：</span>{$hits}
	</div>
	<div class="content">
		{$content}
	</div>
	
	{if count($edata)>0}
	<div class="ui-menu ui-menu-blue" id="nav-spec">
		<div class="ui-menu-name">规格参数</div>
	</div>
	<div class="proshow_content">
		<ul class="extend">
			{foreach $edata as $key=>$rs}
			<li><em>{$rs['field_title']}：</em>{if isset($extend[$rs['field_key']])}{$extend[$rs['field_key']]}{/if}</li>
			{/foreach}
		</ul>
	</div>
	{/if}
	
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
	<div class="ui-piclist ui-piclist-col-2 ui-piclist-1-1 ui-piclist-100 mt">
		{sdcms:rs top="8" table="sd_model_pro" join="left join sd_content on sd_model_pro.cid=sd_content.id" where="$like" order="ontop desc,ordnum desc,id desc"}
		<div class="ui-piclist-item">
			<div class="ui-piclist-image"><a href="{$rs[link]}" title="{$rs[title]}">{if $rs[ispic]==0}<svg width="100%" height="140" xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="xMidYMid slice" focusable="false" role="img" aria-label="Placeholder: Image cap"><rect width="100%" height="100%" fill="#fafafa" /><text x="50%" y="50%" fill="#666666" dy=".3em">暂无图片</text></svg>{else}<img src="{$rs[pic]}" alt="{$rs[title]}" />{/if}</a></div>
			<div class="ui-piclist-body">
				<div class="ui-piclist-title ui-text-center ui-text-hide"><a href="{$rs[link]}" title="{$rs[title]}">{$rs[title]}</a></div>
			</div>
		</div>
		{/sdcms:rs}
	</div>
	
	{/if}
			
</div>