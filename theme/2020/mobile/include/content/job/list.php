<?php if(!defined('IN_SDCMS')) exit;?>
<ul class="ui-media-list ui-mt-10">
	{sdcms:rs pagesize="$catepage" num="3" table="sd_content" join="$join" where="$where" order="ontop desc,ordnum desc,id desc"}
	{rs:eof}没有资料{/rs:eof}
	<li class="ui-media">
		<a class="ui-media-body" href="{$rs[link]}" title="{$rs[title]}">
			<div class="ui-media-header ui-text-hide">{$rs[title]}</div>
			<div class="ui-media-text ui-text-gray ui-text-hide">{$rs[intro]}</div>
			<div class="ui-media-other ui-row"><div class="ui-col-6"><span class="ui-icon-time-circle text-gray"></span> {date('Y-m-d',$rs[createdate])}</div><div class="ui-col-6 ui-text-right"><span class="ui-icon-eye ui-text-gray"></span> {$rs[hits]}</div></div>
		</a>
	</li>
	{/sdcms:rs}
</ul>
{if $total_rs>0}<div class="ui-page ui-page-center ui-page-mid ui-mt-20"><ul>{$showpage}</ul></div>{/if}
