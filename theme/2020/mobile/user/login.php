<?php if(!defined('IN_SDCMS')) exit;?>
{php $self_name='会员登录'}
{include file="mobile/include/top.php"}
<title>{$self_name}_{sdcms[web_name]}</title>
<meta name="keywords" content="{sdcms[seo_key]}">
<meta name="description" content="{sdcms[seo_desc]}">
</head>

<body>
	
	{include file="mobile/include/head.php"}

	<div class="ui-mwidth">
		<div class="ui-box ui-p-20">
			{if $isapi==1}
			<div class="api_user"><span>{$api_info.nickname}</span>，请完成账户绑定，如还没有账户，请先完善资料。　【<a href="{U('user/apiout')}">退出</a>】</div>
			{/if}
			<form method="post" class="ui-form">
				<div class="ui-form-group">
					<input type="text" name="uname" class="ui-form-ip" placeholder="请输入用户名" data-rule="用户名:required;username;">
				</div>
				<div class="ui-form-group">
					<div class="ui-input-group">
						<input type="password" name="upass" autocomplete="off" class="ui-form-ip radius-right-none" placeholder="请输入密码" data-rule="密码:required;password;">
						<div class="after"><a href="{N('getpass')}" class="pl pr" tabindex="-1">忘记密码</a></div>
					</div>
				</div>
				{if sdcms[user_login_auth]==1}
				<div class="ui-form-group">
					<div class="ui-input-group">
						<input type="text" name="code" id="code" class="ui-form-ip radius-right-none" placeholder="请输入验证码" data-rule="验证码:required;">
						<div class="code"><img src="{U('code')}" height="40" id="verify" title="点击更换验证码"></div>
					</div>
				</div>
				{/if}
				<div class="ui-form-group ui-row">
                	<input type="hidden" name="token" value="{$token}">
					<button type="submit" class="ui-btn ui-btn-blue ui-btn-block ui-btn-big ui-btn-radius">{if $isapi==1}确定绑定{else}登录{/if}</button>
            		<a href="{N('reg')}" class="ui-btn ui-btn-block ui-btn-big ui-btn-radius ui-mt-15">{if $isapi==1}注册新用户{else}注册{/if}</a>
				</div>
			</form>
			
			{if $isapi==0 && (sdcms[api_qq_open]==1 || sdcms[api_weibo_open]==1 || sdcms[api_wx_open]==1)}
			<div class="ui-pl-20 ui-pr-20 ui-pt-20">
				<div class="ui-line"><span class="ui-text-gray ui-font-15">快捷登录</span></div>
				<div class="quick-login">
					{if sdcms[api_qq_open]==1}<a href="{WEB_ROOT}api/login/qq/api.php" title="QQ登录"><span class="ui-icon-qq blue"></span>QQ</a>{/if}
					{if sdcms[api_weibo_open]==1}<a href="{WEB_ROOT}api/login/weibo/api.php" title="微博登录"><span class="ui-icon-weibo red"></span>微博</a>{/if}
					{if isweixin() && sdcms[api_wx_open]==1 && sdcms[api_wx_loginway]==0}<a href="{WEB_ROOT}api/pay/wxpay/w/openid.php?type=1" title="微信登录"><span class="ui-icon-weixin red"></span>微信</a>{/if}
				</div>
			</div>
			{/if}
			
			<div class="ui-pt-15 ui-bg-white"></div>
			
		</div>
		
	</div>
	
	{include file="mobile/include/foot.php"}
	<script>
    $(function()
    {
		$("#bar_user").addClass("active");
		$(".ui-topbar-title").html("{$self_name}");
		
    	{if sdcms[user_login_auth]==1}
    	$("#verify").click(function()
    	{
    		$(this).attr("src",$(this).attr("src")+"{iif(sdcms[url_mode]==1,"&","?")}rnd="+Math.round());
    		$("#code").val("");
    	});
    	{/if}
    	$(".ui-form").form(
    	{
    		type:2,
    		align:'center',
    		result:function(form)
    		{
    			$.ajax(
				{
    				type:'post',
    				cache:false,
    				dataType:'json',
    				url:'{THIS_LOCAL}',
    				data:$(form).serialize(),
    				error:function(e){alert(e.responseText);},
    				success:function(d)
    				{
    					if(d.state=='success')
    					{
    						sdcms.success(d.msg);
    						setTimeout(function(){location.href='{$lasturl}';},1500);
    					}
    					else
    					{
                            {if sdcms[user_login_auth]==1}$("#verify").click();{/if}
    						sdcms.error(d.msg);
    					}
    				}
    			});
    		}
    	});
    })
    </script>
	
</body>
</html>
