<?php if(!defined('IN_SDCMS')) exit;?>
<div class="artlist">
	{sdcms:rs pagesize="$catepage" table="sd_content" join="$join" where="$where" order="ontop desc,ordnum desc,id desc"}
	{rs:eof}没有资料{/rs:eof}
	<div class="artlist-item">
		<div class="artlist-item-body">
			<a href="{$rs[link]}" title="{$rs[title]}" target="_blank">
				<div class="title">{$rs[title]}</div>
				<div class="desc">{$rs[intro]}</div>
			</a>
			{php $tags=jsdecode($rs[tagslist])}
			{if count($tags)>0}
			<div class="tags">
				<i class="ui-icon-tags ui-mr-sm"></i>
				{foreach $tags as $key=>$rt}
					<a href="{N('taglist','','id='.$rt['id'].'')}" target="_blank" class="btn btn-sm">{$rt['name']}</a>
				{/foreach}
			</div>
			{/if}
		</div>
		<div class="artlist-item-date artlist-item-money"><span>薪资待遇：</span>{$rs[work_money]}</div>
	</div>
	{/sdcms:rs}
</div>
{if $total_rs>0}<div class="ui-page ui-page-center ui-page-mid ui-mt-20"><ul>{$showpage}</ul></div>{/if}