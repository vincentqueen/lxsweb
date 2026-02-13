<?php if(!defined('IN_SDCMS')) exit;?>
<div class="ui-piclist ui-piclist-col-3 ui-piclist-1-1 ui-piclist-100">
	{sdcms:rs pagesize="$catepage" table="sd_content" join="$join" where="$where" order="ontop desc,ordnum desc,id desc"}
	{rs:eof}<div class="ui-font-14">没有资料</div>{/rs:eof}
	<div class="ui-piclist-item">
		<div class="ui-piclist-image"><a href="{$rs[link]}" title="{$rs[title]}" target="_blank">{if $rs[ispic]==0}<svg width="100%" height="140" xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="xMidYMid slice" focusable="false" role="img" aria-label="Placeholder: Image cap"><rect width="100%" height="100%" fill="#fafafa" /><text x="50%" y="50%" fill="#666666" dy=".3em">暂无图片</text></svg>{else}<img src="{thumb($rs[pic],400,400)}" alt="{$rs[title]}" />{/if}</a></div>
		<div class="ui-piclist-body">
			<div class="ui-piclist-title ui-text-center ui-text-hide"><a href="{$rs[link]}" title="{$rs[title]}" target="_blank">{$rs[title]}</a></div>
            <div class="ui-piclist-flex">
                <div class="ui-piclist-price"><strong>￥{$rs[price]}</strong></div>
                <div class="action"><a href="{$rs[link]}" title="{$rs[title]}" class="ui-btn ui-btn-blue">详情</a></div>
            </div>
		</div>
	</div>
	{/sdcms:rs}
</div>

{if $total_rs>0}<div class="ui-page ui-page-center ui-page-mid ui-mt-20"><ul>{$showpage}</ul></div>{/if}