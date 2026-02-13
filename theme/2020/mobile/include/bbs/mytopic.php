<?php if(!defined('IN_SDCMS')) exit;?>
	
	<div class="ui-tabs ui-pl ui-pr ui-bg-white" data-href="1">
		<div class="ui-tabs-header-nav">
			<ul class="ui-tabs-nav">
				<li class="active"><a href="{U('bbs/mytopic','uid='.$uid.'')}" class="pl-15 pr-15">我的主题</a></li>
				<li><a href="{U('bbs/myreply','uid='.$uid.'')}" class="pl-15 pr-15">我的回复</a></li>
			</ul>
		</div>
	</div>
	<div class="bbs-topic">
		{sdcms:rs pagesize="20" table="sd_bbs" join="left join sd_user on sd_bbs.userid=sd_user.id" where="sd_bbs.islock=1 and userid=$uid" order="ontop desc,bbs_id desc" key="bbs_id"}
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