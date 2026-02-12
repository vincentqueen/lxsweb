<?php if(!defined('IN_SDCMS')) exit;?>
<div class="ui-row bbs">
	<div class="bbs-left">
		{include file="include/bbs/left.php"}
	</div>
	<div class="bbs-right">
		<div class="bbs-right-title">主题搜索</div>
		<div class="ui-tabs ui-mt-20" data-href="1">
			<div class="ui-tabs-header-nav">
				
			</div>
		</div>
		<div class="bbs-topic">
			{sdcms:rs pagesize="20" table="sd_bbs" join="left join sd_user on sd_bbs.userid=sd_user.id" where="sd_bbs.islock=1 $where" order="ontop desc,bbs_id desc" key="bbs_id"}
			{rs:eof}<div class="ui-mt-20">没有找到您要的结果</div>{/rs:eof}
			<div class="bbs-topic-item">
				<div class="face"><img src="{if !isempty($rs[uface])}{$rs[uface]}{else}{WEB_ROOT}upfile/noface.gif{/if}" alt="{$rs[uname]}"></div>
				<div class="body">
					<div class="title text-hide"><a href="{N('bbsshow','','id='.$rs[bbs_id].'')}" title="{$rs[title]}">{$rs[title]}</a>{if $rs[ontop]==1}<em>置顶</em>{/if}{if $rs[isnice]==1}<em>精</em>{/if}</div>
                    <div class="desc"><a href="{U('bbs/mytopic','uid='.$rs[userid].'')}">{$rs[uname]}</a>　{formatTime($rs[createdate])}</div>
				</div>
				<div class="other"><i class="ui-icon-eye"></i>{$rs[hits]}<br /><i class="ui-icon-comment"></i>{$rs[replynum]}</div>
			</div>
			{/sdcms:rs}
			{if $pg->totalpage>1}<div class="ui-page ui-page-center ui-page-mid ui-mt-20"><ul>{$showpage}</ul></div>{/if}
		</div>
		
	</div>
</div>