<?php if(!defined('IN_SDCMS')) exit;?>
{php $self_name='会员注册'}
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
			<div class="api_user"><span>{$api_info.nickname}</span>，请完善账户资料，如已有账户，请绑定账户。　【<a href="{U('user/apiout')}">退出</a>】</div>
			{/if}
			<form method="post" class="ui-form">
				<div class="ui-form-group">
					<input type="text" name="uname" class="ui-form-ip" {if $isapi==1}value="{$api_info.nickname}" {/if}placeholder="请输入用户名" data-rule="用户名:required;username;">
				</div>
				<div class="ui-form-group">
					<input type="password" name="upass" autocomplete="off" id="upass" class="ui-form-ip" placeholder="请输入密码" data-rule="密码:required;password;">
				</div>
				<div class="ui-form-group">
					<input type="password" name="repass" class="ui-form-ip" placeholder="请再次输入密码" data-rule="确认密码:required;password;match(upass)">
				</div>
				<div class="ui-form-group">
					<input type="text" name="email" class="ui-form-ip" placeholder="请输入邮箱，用于找回密码等" data-rule="邮箱:required;email;">
				</div>
				{if sdcms[user_reg_auth]==1}
				<div class="ui-form-group">
					<div class="ui-input-group">
						<input type="text" name="code" id="code" class="ui-form-ip radius-right-none" placeholder="请输入验证码" data-rule="验证码:required;">
						<div class="code"><img src="{U('code')}" height="40" id="verify" title="点击更换验证码"></div>
					</div>
				</div>
				{/if}
				{if sdcms[user_reg_type]==2&&sdcms[mail_type]>0}
				<div class="ui-form-group">
					<div class="ui-input-group">
						<input type="text" name="ecode" id="ecode" class="ui-form-ip radius-right-none" placeholder="请输入邮箱验证码" data-rule="邮箱验证码:required;">
						<button type="button" class="after">获取验证码</button>
					</div>
				</div>
				{/if}
				<div class="ui-form-group">
					<input type="hidden" name="token" value="{$token}">
                    <button type="submit" class="ui-btn ui-btn-blue ui-btn-block ui-btn-big ui-btn-radius">{if $isapi==1}注册新用户{else}注册{/if}</button>
					<a href="{N('login')}" class="ui-btn ui-btn-block ui-btn-big ui-btn-radius ui-mt-15">{if $isapi==1}绑定已有用户{else}登录{/if}</a>
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
		
    	{if sdcms[user_reg_auth]==1}
		$("#verify").click(function()
		{
			$(this).attr("src",$(this).attr("src")+"{iif(sdcms[url_mode]==1,"&","?")}rnd="+Math.round());
			$("#code").val("");
		});
		{/if}
		$(".after").click(function(event)
		{
			var that=$(this);
			var email=that.closest("form").find("[name=email]").val();
			if(email=='')
			{
				sdcms.warn('请输入邮箱');
				return false;
			}			
			var code='';
			{if sdcms[user_reg_type]==2&&sdcms[mail_type]>0}
			var code=that.closest("form").find("[name=code]").val();
			if(code=='')
			{
				sdcms.warn('请输入验证码');
				return false;
			}
			{/if}
			$.ajax(
			{
				url:"{U('regcode')}",
				type:'post',
				cache:false,
				dataType:'json',
				data:'token={$token}&email='+encodeURIComponent(email)+'&code='+encodeURIComponent(code),
				error:function(e){alert(e.responseText);},
				success:function(d)
				{
					if(d.state=='success')
					{
						that.backtime();
						sdcms.success(d.msg);
					}
					else
					{
						{if sdcms[user_reg_type]==1}$("#verify").click();{/if}
						sdcms.error(d.msg);
					}
				}
			});
			
		});
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
