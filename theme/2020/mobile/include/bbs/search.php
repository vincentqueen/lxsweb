<?php if(!defined('IN_SDCMS')) exit;?>

	<div class="bbs_search">
		<form action="{U('bbs/search')}" method="post" onSubmit="return checksearch(this)">
			<div class="ui-input-group">
				{if sdcms[url_mode]==1}<input type="hidden" name="c" value="bbs" /><input type="hidden" name="a" value="search" />{/if}
				<input type="text" name="keyword" value="{$keyword}" class="ui-form-ip radius-right-none" placeholder="查找主题">
                <input type="hidden" name="token" value="{$token}">
				<button type="submit" class="after"><div class="ui-icon-search"></div></button>
			</div>
		</form>
	</div>

	<div class="bbs-topic">
		{sdcms:rs pagesize="20" table="sd_bbs" join="left join sd_user on sd_bbs.userid=sd_user.id" where="sd_bbs.islock=1 $where" order="ontop desc,bbs_id desc" key="bbs_id"}
		{rs:eof}<div class="ui-mt-20">没有找到您要的结果</div>{/rs:eof}
		<div class="bbs-topic-item">
			<div class="bbs-topic-item-head">
				<div class="face"><img src="{if !isempty($rs[uface])}{$rs[uface]}{else}{WEB_ROOT}upfile/noface.gif{/if}" alt="{$rs[uname]}"></div>
				<div class="info">
					<div class="name"><a href="{U('bbs/mytopic','uid='.$rs[userid].'')}">{$rs[uname]}</a></div>
					<div class="time">{formatTime($rs[createdate])}</div>
				</div>
				<div class="action">
				{if $rs[ontop]==1}<em>置顶</em>{/if}{if $rs[isnice]==1}<em>精</em>{/if}
				</div>
			</div>
			<div class="bbs-topic-item-body">
				<div class="title"><a href="{N('bbsshow','','id='.$rs[bbs_id].'')}" title="{$rs[title]}">{$rs[title]}</a></div>
			</div>
			<div class="bbs-topic-item-foot ui-row">
				<div class="ui-col-6"><i class="ui-icon-eye"></i>{$rs[hits]}</div>
				<div class="ui-col-6"><i class="ui-icon-comment"></i>{$rs[replynum]}</div>
			</div>
			
		</div>
		{/sdcms:rs}
		{if $pg->totalpage>1}<div class="ui-page ui-page-center ui-page-mid ui-mt-20"><ul>{$showpage}</ul></div>{/if}
	</div>