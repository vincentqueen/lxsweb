<?php if(!defined('IN_SDCMS')) exit;?>
<div class="ui-box ui-box-radius">
	<div class="ui-box-title">会员中心<span>member center</span></div>
	<div class="ui-box-nav ui-collapse-menu">
		{if USER_ID==0}
			<div class="ui-collapse-menu-title {if ACTION_NAME=='reg'} active{/if}"><a href="{N('reg')}">会员注册</a></div>
			<div class="ui-collapse-menu-title {if ACTION_NAME=='login'} active{/if}"><a href="{N('login')}">会员登录</a></div>
			<div class="ui-collapse-menu-title {if ACTION_NAME=='getpass'} active{/if}"><a href="{N('getpass')}">忘记密码</a></div>
			{if ACTION_NAME!='getpass'}
				{if $isapi==0 && (sdcms[api_qq_open]==1 || sdcms[api_weibo_open]==1 || sdcms[api_weixin_open]==1)}
				<div class="quicklogin">
					<div class="line line-center">快捷登录</div>
					{if sdcms[api_qq_open]==1}<a href="{WEB_URL}{WEB_ROOT}api/login/qq/api.php" title="QQ登录"><span class="ui-icon-qq blue"></span>QQ登录</a>{/if}
					{if sdcms[api_weibo_open]==1}<a href="{WEB_URL}{WEB_ROOT}api/login/weibo/api.php" title="微博登录"><span class="ui-icon-weibo red"></span>微博登录</a>{/if}
					{if sdcms[api_weixin_open]==1}<a href="{WEB_URL}{WEB_ROOT}api/login/weixin/api.php" title="微信登录"><span class="ui-icon-weixin green"></span>微信登录</a>{/if}
				</div>
				{/if}
			{/if}
		{else}
			<div class="ui-collapse-menu-title {if ACTION_NAME=='index'} active{/if}"><a href="{N('user')}">个人中心</a></div>
			<div class="ui-collapse-menu-title {if ACTION_NAME=='myorder'} active{/if}"><a href="{N('myorder')}">我的订单</a></div>
			<div class="ui-collapse-menu-title {if ACTION_NAME=='mymoney' || ACTION_NAME=='pay'} active{/if}"><a href="{N('mymoney')}">财务明细</a></div>
			<div class="ui-collapse-menu-title {if ACTION_NAME=='editemail'} active{/if}"><a href="{N('editemail')}">修改邮箱</a></div>
			<div class="ui-collapse-menu-title {if ACTION_NAME=='editpass'} active{/if}"><a href="{N('editpass')}">修改密码</a></div>
			<div class="ui-collapse-menu-title"><a href="{N('out')}">退出登录</a></div>
		{/if}
	</div>
</div>

