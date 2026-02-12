<?php if(!defined('IN_SDCMS')) exit;?>
	<div class="topquick">
		<a href="{N('bbs')}"{if $fid==0} class="active"{/if}><i class="ui-icon-home"></i>全部主题</a>
		{sdcms:rs top="0" table="sd_bbs_cate" order="ordnum,cateid"}
		<a href="{N('bbs','','fid='.$rs[cateid].'')}" title="{$rs[catename]}"{if $fid==$rs[cateid]} class="active"{/if}><i class="{if !isempty($rs[cate_icon])}{$rs[cate_icon]}{else}ui-icon-square{/if}"></i>{$rs[catename]}</a>
		{/sdcms:rs}
	</div>
	<div class="bbs_search">
		<form action="{U('bbs/search')}" method="post" onSubmit="return checksearch(this)">
			<div class="ui-input-group">
				{if sdcms[url_mode]==1}<input type="hidden" name="c" value="bbs" /><input type="hidden" name="a" value="search" />{/if}
				<input type="text" name="keyword" class="ui-form-ip radius-right-none" placeholder="查找主题">
                <input type="hidden" name="token" value="{$token}">
				<button type="submit" class="after"><div class="ui-icon-search"></div></button>
			</div>
		</form>
	</div>
	
	<div class="ui-tabs ui-pl ui-pr ui-bg-white" data-href="1">
		<div class="ui-tabs-header-nav">
			<ul class="ui-tabs-nav">
				<li{if $type==0} class="active"{/if}><a href="{N('bbs','','fid='.$fid.'&type=0')}" class="pl-15 pr-15">最新</a></li>
				<li{if $type==1} class="active"{/if}><a href="{N('bbs','','fid='.$fid.'&type=1')}" class="pl-15 pr-15">热门</a></li>
				<li{if $type==2} class="active"{/if}><a href="{N('bbs','','fid='.$fid.'&type=2')}" class="pl-15 pr-15">精华</a></li>
			</ul>
			<div class="ui-tabs-header-more"><a href="{N('bbsadd','','fid='.$fid.'')}" class="ui-btn ui-btn-yellow">发表主题</a></div>
		</div>
	</div>
	<div class="bbs-topic">
		{sdcms:rs pagesize="20" num="3" table="sd_bbs" join="left join sd_user on sd_bbs.userid=sd_user.id" where="sd_bbs.islock=1 $where" order="$order" key="bbs_id"}
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