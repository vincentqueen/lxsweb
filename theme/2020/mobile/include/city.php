<?php if(!defined('IN_SDCMS')) exit;?>
<div class="ui-filter ui-mt-15">
	<div class="ui-row">
		<div class="ui-col-2 ui-filter-left">全国：</div>
		<div class="ui-col-10 ui-filter-right">
			<a href="{WEB_DOMAIN}"{if $city==''} class="active"{/if}>进入全国站</a>
		</div>
	</div>
	{sdcms:rp top="0" table="sd_city" where="site_open=1 and followid=0" order="ordnum,cateid"}
	{php $fid=$rp[cateid]}
	<div class="ui-row">
		<div class="ui-col-2 ui-filter-left"><a href="{if $rp[site_domain]==1}{C('city_http')}{$rp[site_root]}.{C('city_domain')}{else}{N($rp[site_root],0,'',1,1)}{/if}">{$rp[name]}</a>：</div>
		<div class="ui-col-10 ui-filter-right">
			{sdcms:rs top="0" table="sd_city" where="site_open=1 and followid=$fid" order="ordnum,cateid"}
				<a href="{if $rs[site_domain]==1}{C('city_http')}{$rs[site_root]}.{C('city_domain')}{else}{N($rs[site_root],0,'',1,1)}{/if}"{if $city==$rs[site_root]} class="active"{/if}>{$rs[name]}</a>
			{/sdcms:rs}
		</div>
	</div>
	{/sdcms:rp}
</div>