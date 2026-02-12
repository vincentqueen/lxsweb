<?php if(!defined('IN_SDCMS')) exit;?>
<div class="ui-tabs">
	<div class="ui-tabs-header-nav">
		<ul class="ui-tabs-nav">
			<li class="active"><a href="javascript:;">产品介绍</a></li>
			{if count($edata)>0}
			<li><a href="javascript:;">规格参数</a></li>
			{/if}
		</ul>
	</div>
	<div class="ui-tabs-body ui-p">
		<div class="ui-tabs-content">
			<div class="ui-tabs-pane active proshow_content">
				{$content}
			</div>
			{if count($edata)>0}
			<div class="ui-tabs-pane proshow_content">
				<ul class="extend">
					{foreach $edata as $key=>$rs}
                    {if isset($extend[$rs['field_key']])  && $extend[$rs['field_key']]!=''}
					<li><em>{$rs['field_title']}：</em>{$extend[$rs['field_key']]}</li>
                    {/if}
					{/foreach}
				</ul>
			</div>
			{/if}
		</div>
   </div>
</div>
{if count($tagslist)>0}
<div class="ui-menu ui-menu-blue ui-mb-15">
	<div class="ui-menu-name">相关产品</div>
</div>
<div class="ui-piclist ui-piclist-col-3 ui-piclist-1-1 ui-piclist-100">
	{sdcms:rs top="9" table="sd_model_pro" join="left join sd_content on sd_model_pro.cid=sd_content.id" where="$like" order="ontop desc,ordnum desc,id desc"}
	<div class="ui-piclist-item">
		<div class=ui-"piclist-image"><a href="{$rs[link]}" title="{$rs[title]}" target="_blank">{if $rs[ispic]==0}<svg width="100%" height="140" xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="xMidYMid slice" focusable="false" role="img" aria-label="Placeholder: Image cap"><rect width="100%" height="100%" fill="#fafafa" /><text x="50%" y="50%" fill="#666666" dy=".3em">暂无图片</text></svg>{else}<img src="{$rs[pic]}" alt="{$rs[title]}" />{/if}</a></div>
		<div class="ui-piclist-body">
			<div class="ui-piclist-title ui-text-center ui-text-hide"><a href="{$rs[link]}" title="{$rs[title]}" target="_blank">{$rs[title]}</a></div>
		</div>
	</div>
	{/sdcms:rs}
</div>
{/if}