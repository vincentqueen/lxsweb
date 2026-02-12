<?php if(!defined('IN_SDCMS')) exit;?>
{if !isset($topid) || $topid<0}{php $topid=1}{/if}
<div class="ui-box ui-box-radius">
	<div class="ui-box-title">{get_catename($topid)}<span>{get_cate_info($topid,'myename')}</span></div>
	<div class="ui-box-nav ui-collapse-menu">
		{sdcms:rp top="0" table="sd_category" where="followid=$topid" order="catenum,cateid"}
		{php $sub_sonid=$rp[cateid]}
		{php $sub_num=get_sonid_num($rp[cateid])}
		{rp:eof}
		<div class="ui-collapse-menu-title active">
			<a href="{cateurl($topid)}">{get_catename($topid)}</a>
		</div>
		{/rp:eof}

		<div class="ui-collapse-menu-title {is_active($rp[cateid],$parentid,'active',1)}">
			<a href="{cateurl($rp[cateid])}" title="{$rp[catename]}">{$rp[catename]}</a>{if $sub_num>0}<i class="ui-icon-right"></i>{/if}
		</div>
		{if $sub_num>0}
		<div class="ui-collapse-menu-body {is_active($rp[cateid],$parentid,'show',1)}">
			<ul>
				{sdcms:rs top="0" table="sd_category" where="followid=$sub_sonid" order="catenum,cateid"}
				<li{is_active($rs[cateid],$parentid,'active')}><a href="{cateurl($rs[cateid])}" title="{$rs[catename]}"{if $rs[isblank]==1} target="_blank"{/if}><i class="ui-icon-square ui-font-14 ui-mr"></i>{$rs[catename]}</a></li>
				{/sdcms:rs}
			</ul>
		</div>
		{/if}
		{/sdcms:rp}
	</div>
</div>