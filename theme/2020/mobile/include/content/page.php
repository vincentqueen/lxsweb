<?php if(!defined('IN_SDCMS')) exit;?>
{if is_array($piclist)}
<div class="ui-piclist ui-piclist-col-2 ui-piclist-4-3">
	{foreach $piclist as $key=>$rs}
	<div class="ui-piclist-item">
		<div class="ui-piclist-image"><a href="{$rs['image']}" class="ui-lightbox" data-title="{$rs['desc']}"><img src="{$rs['image']}" alt="{$rs['desc']}" /></a></div>
		<div class="ui-piclist-body">
			<div class="ui-piclist-title ui-text-center ui-text-hide">{$rs['desc']}</div>
		</div>
	</div>
	{/foreach}
</div>
{/if}
{if !isempty($content)}
<div class="page_content">
	{$content}
</div>
{/if}
{if $pagenum>1}<div class="ui-page ui-page-center ui-page-mid ui-mt-20"><ul>{pagelist($page,$pagenum)}</ul></div>{/if}