<?php if(!defined('IN_SDCMS')) exit;?>
<ul class="ui-media-list ui-mt-20">
	{sdcms:rs pagesize="$catepage" num="3" table="sd_content" join="$join" where="$where" order="ontop desc,ordnum desc,id desc"}
	{rs:eof}没有资料{/rs:eof}
	<li class="ui-media">
		<div class="ui-media-img ui-mr-20">
			<a href="{$rs[link]}" title="{$rs[title]}">{if $rs[ispic]==0}<svg width="100" height="90" xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="xMidYMid slice" focusable="false" role="img" aria-label="Placeholder: Image cap"><rect width="100%" height="100%" fill="#fafafa" /><text x="50%" y="50%" fill="#666666" dy=".3em">暂无图片</text></svg>{else}<img src="{$rs[pic]}" alt="{$rs[title]}" width="100" />{/if}</a>
		</div>
		<div class="ui-media-body">
			<div class="ui-media-header ui-text-hide"><a href="{$rs[link]}" title="{$rs[title]}">{$rs[title]}</a></div>
			<div class="ui-media-text ui-font-12 ui-text-gray ui-text-hide">{nohtml($rs[intro])}</div>
			<div class="ui-media-other ui-row"><div class="ui-col-6"><span class="ui-icon-time-circle ui-text-gray"></span> {date('Y-m-d',$rs[createdate])}</div><div class="ui-col-6 ui-text-right"><span class="ui-icon-eye ui-text-gray"></span> {$rs[hits]}</div></div>
		</div>
	</li>
	{/sdcms:rs}
</ul>
{if $total_rs>0}<div class="ui-page ui-page-center ui-page-mid ui-mt-20"><ul>{$showpage}</ul></div>{/if}
