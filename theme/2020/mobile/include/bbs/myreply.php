<?php if(!defined('IN_SDCMS')) exit;?>
	<div class="ui-bg-white ui-p">
		<div class="ui-tabs ui-pl ui-pr ui-bg-white" data-href="1">
			<div class="ui-tabs-header-nav">
				<ul class="ui-tabs-nav">
					<li><a href="{U('bbs/mytopic','uid='.$uid.'')}" class="pl-15 pr-15">我的主题</a></li>
					<li class="active"><a href="{U('bbs/myreply','uid='.$uid.'')}" class="pl-15 pr-15">我的回复</a></li>
				</ul>
			</div>
		</div>
		<ul class="ui-media-list ui-media-border ui-mt-20">
			{sdcms:rs pagesize="15" table="sd_bbs_reply" join="left join sd_user on sd_bbs_reply.userid=sd_user.id" where="sd_bbs_reply.islock=1 and istopic=0 and userid=$uid" order="replyid desc" key="replyid"}
			<li class="ui-media">
				<div class="ui-media-img ui-mr-20 ui-radius">
					<img src="{if strlen($rs[uface])}{$rs[uface]}{else}{WEB_ROOT}upfile/noface.gif{/if}" alt="{$rs[uname]}" width="40" height="40" >
				</div>
				<div class="ui-media-body">
					<div class="ui-media-header ui-row align-items-center">
						<div class="ui-col-8 ui-font-14">{$rs[uname]}<span class="ui-pl ui-text-gray">{formatTime($rs[createdate])}</span></div>
						<div class="ui-col-4 ui-text-right ui-font-13 ui-text-gray">{switch ($i+15*($page-1))}{case 1}沙发{/case}{case 2}板凳{/case}{case 3}地板{/case}{default}{$i+15*($page-1)}楼{/switch}</div>
					</div>
					<div class="ui-media-text">
						{$rs[content]}
						{if $rs[reply]<>''}<div class="ui-line ui-line-left"><span class="text-red">管理员回复：</span></div>{$rs[reply]}{/if}
					</div>
				</div>
			</li>
			{/sdcms:rs}
		</ul>
		{if $pg->totalpage>1}<div class="ui-page ui-page-center ui-page-mid"><ul>{$showpage}</ul></div>{/if}
		
		<div class="pt-15"></div>
	</div>