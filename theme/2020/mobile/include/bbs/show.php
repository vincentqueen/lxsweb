<?php if(!defined('IN_SDCMS')) exit;?>
	
	<div class="bbs-topic">
		<div class="bbs-topic-item">
			<h1>{$title}</h1>
			<div class="bbs-topic-item-head">
				<div class="face"><img src="{if !isempty($uface)}{$uface}{else}{WEB_ROOT}upfile/noface.gif{/if}" alt="{$uname}"></div>
				<div class="info">
					<div class="name">{$uname}</div>
					<div class="time">{formatTime($createdate)}</div>
				</div>
				<div class="action">
				{if $islogin==$userid}　<a href="{N('bbsedit','','id='.$id.'')}"><i class="ui-icon-edit"></i>编辑</a>{/if}
				</div>
			</div>
			<div class="bbs-topic-item-body bbs-show" id="bbsshow">
				{if $view_lever==1}
					{$content}
				{else}
					{if $islogin==0}
						<div class="tip">您需要登录后才可以查看，请先<a href="{N('login')}">登录</a>或<a href="{N('reg')}">注册</a></div>
					{elseif $view_lever==0}
						<div class="tip">您所在用户组，无法查看帖子</div>
					{else}
						{$content}
					{/if}
				{/if}
			</div>
			<div class="bbs-topic-item-foot ui-row">
				<div class="ui-col-6"><i class="ui-icon-eye"></i>{$hits}</div>
				<div class="ui-col-6"><i class="ui-icon-comment"></i>{$replynum}</div>
			</div>
			
		</div>
	</div>
	
	<div class="ui-bg-white ui-p">
		<div class="ui-menu ui-menu-blue"><div class="ui-menu-name">最新回复</div></div>
		<ul class="ui-media-list ui-media-border ui-mt-20">
			{sdcms:rs pagesize="15" table="sd_bbs_reply" join="left join sd_user on sd_bbs_reply.userid=sd_user.id" where="sd_bbs_reply.islock=1 and bbsid=$id and istopic=0" order="replyid" key="replyid"}
			<li class="ui-media">
				<div class="ui-media-img ui-mr-20 ui-radius">
					<img src="{if strlen($rs[uface])}{$rs[uface]}{else}{WEB_ROOT}upfile/noface.gif{/if}" alt="{$rs[uname]}" width="40" height="40" >
				</div>
				<div class="ui-media-body">
					<div class="ui-media-header ui-row align-items-center">
						<div class="ui-col-8 ui-font-14">{$rs[uname]}<span class="ui-pl ui-text-gray">{formatTime($rs[createdate])}</span></div>
						<div class="ui-col-4 ui-text-right ui-font-13 ui-text-gray">{switch ($i+15*($page-1))}{case 1}沙发{/case}{case 2}板凳{/case}{case 3}地板{/case}{default}{$i+15*($page-1)}楼{/switch}</div>
					</div>
					<div class="ui-media-text bbs-show">
						{if $view_lever==1}
							{$rs[content]}
							{if $rs[reply]<>''}<div class="ui-line ui-line-left"><span class="ui-text-red">管理员回复：</span></div>{$rs[reply]}{/if}
						{else}
							{if $islogin==0}
							<div class="tip">您需要登录后才可以查看，请先<a href="{N('login')}">登录</a>或<a href="{N('reg')}">注册</a></div>
							{elseif $view_lever==0 && $rs[userid]==$userid}
							<div class="tip">您所在用户组，无法查看帖子</div>
							{else}
								{$rs[content]}
								{if $rs[reply]<>''}<div class="ui-line ui-line-left"><span class="ui-text-red">管理员回复：</span></div>{$rs[reply]}{/if}
							{/if}
						{/if}
					</div>
				</div>
			</li>
			{/sdcms:rs}
		</ul>
		{if $pg->totalpage>1}<div class="ui-page ui-page-center ui-page-mid"><ul>{$showpage}</ul></div>{/if}
		
		<form method="post" class="post_reply">
		<ul class="ui-media-list ui-media-border-none mt-20">
			<li class="ui-media">
				<div class="ui-media-body">
					<div class="ui-media-text">
                    <input type="hidden" name="token" value="{$token}">
					{if $islogin==0}
						<textarea class="ui-form-ip" placeholder="您需要登录后才可以回复" disabled></textarea>
					{else}
						{if $reply_lever==0}
							<textarea class="ui-form-ip" placeholder="您所在用户组没有回帖权限" disabled></textarea>
						{else}
                        	<script id="content" name="content" class="ui-editor" type="text/plain" data-toolbar="mini"></script>
							{if sdcms[bbs_reply_code]==1}
							<div class="ui-input-group ui-mt">
								<input type="text" class="ui-form-ip radius-right-none" name="code" id="code" size="8" maxlength="8" placeholder="请输入验证码" data-rule="验证码:required;">
								<span class="code"><img src="{U('code')}" height="40" id="verify" title="点击更换验证码"></span>
							</div>
							{/if}
							<input type="submit" value="回复" class="ui-btn ui-btn-block ui-btn-blue ui-mt">
						{/if}
					{/if}
					</div>
				</div>
			</li>
		</ul>
		</form>
		
		<div class="ui-pt-15"></div>
	</div>