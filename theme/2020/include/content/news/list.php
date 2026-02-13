<?php if(!defined('IN_SDCMS')) exit;?>
<div class="artlist">
	{sdcms:rs pagesize="$catepage" table="sd_content" join="$join" where="$where" order="ontop desc,ordnum desc,id desc"}
	{rs:eof}没有资料{/rs:eof}
	<div class="artlist-item">
		{if $rs[ispic]==1}<div class="artlist-item-image"><a href="{$rs[link]}" title="{$rs[title]}" target="_blank"><img src="{$rs[pic]}" alt="{$rs[title]}" /></a></div>{/if}
		<div class="artlist-item-body">
			<a href="{$rs[link]}" title="{$rs[title]}" target="_blank">
				<div class="title">{$rs[title]}</div>
				<div class="desc">{cutstr(nohtml($rs[intro]),200,1)}</div>
			</a>
			{php $tags=jsdecode($rs[tagslist])}
			{if count($tags)>0}
			<div class="tags">
				<i class="ui-icon-tags ui-mr-sm"></i>
				{foreach $tags as $key=>$rt}
					<a href="{U('other/taglist','id='.$rt['id'].'')}" target="_blank" class="ui-btn ui-btn-sm ui-mb">{$rt['name']}</a>
				{/foreach}
			</div>
			{/if}
		</div>
		<div class="artlist-item-date">{date('m-d',$rs[createdate])}</div>
	</div>
	{/sdcms:rs}
</div>
{if $total_rs>0}<div class="ui-page ui-page-center ui-page-mid ui-mt-20"><ul>{$showpage}</ul></div>{/if}