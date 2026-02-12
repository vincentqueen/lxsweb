<?php if(!defined('IN_SDCMS')) exit;?>
<div class="ui-row subnav">
	{sdcms:rp top="0" table="sd_category" where="followid=$classid" order="catenum,cateid"}
	{rp:eof}{if $followid>0}
		{sdcms:rs top="0" table="sd_category" where="followid=$followid" order="catenum,cateid"}
			<div class="ui-col-4 {if $classid==$rs[cateid]} active{/if}"><a href="{cateurl($rs[cateid])}" title="{$rs[catename]}">{$rs[catename]}</a></div>
		{/sdcms:rs}{/if}
	{/rp:eof}
	<div class="ui-col-4{if $classid==$rp[cateid]} active{/if}"><a href="{cateurl($rp[cateid])}" title="{$rp[catename]}">{$rp[catename]}</a></div>
	{/sdcms:rp}
</div>