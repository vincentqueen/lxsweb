<?php if(!defined('IN_SDCMS')) exit;?>
{php $self_name='会员注册'}
{php $self_ename='register'}
{php $position=[['name'=>'会员中心','url'=>N('user')],['name'=>$self_name,'url'=>THIS_LOCAL]]}
{include file="include/top.php"}
<title>{$self_name}_{sdcms[web_name]}</title>
<meta name="keywords" content="{sdcms[seo_key]}">
<meta name="description" content="{sdcms[seo_desc]}">
</head>

<body>
	{include file="include/head.php"}
	{include file="include/banner_inner.php"}

	<div class="container">
		<div class="width ui-row">
			<div class="container-left">
				<div class="ui-fixed-s" data-parent=".container">
					{include file="user/nav.php"}
				</div>
			</div>
			
			<div class="container-right">
			
				<div class="ui-box">
					<div class="ui-box-h2">{if $isapi==1}完善资料{else}{$self_name}{/if}</div>
					<div class="ui-box-body">
						<!--begin-->
						<div class="pt-40">
							{if $isapi==1}
							<div class="api_user"><span>{$api_info.nickname}</span>，请完善账户资料，如已有账户，请绑定账户。　【<a href="{U('user/apiout')}">退出</a>】</div>
							{/if}
							<form method="post" class="ui-form ml-40">
							<div class="ui-form-group ui-row">
								<label class="ui-col-2 ui-col-form-label ui-text-right">用户名：</label>
								<div class="ui-col-5">
									<input type="text" name="uname" class="ui-form-ip" {if $isapi==1}value="{$api_info.nickname}" {/if}placeholder="请输入用户名" data-rule="用户名:required;username;">
								</div>
							</div>
							<div class="ui-form-group ui-row">
								<label class="ui-col-2 ui-col-form-label ui-text-right">密码：</label>
								<div class="ui-col-5">
									<input type="password" name="upass" autocomplete="off" id="upass" class="ui-form-ip" placeholder="请输入密码" data-rule="密码:required;password;">
								</div>
							</div>
							<div class="ui-form-group ui-row">
								<label class="ui-col-2 ui-col-form-label ui-text-right">确认密码：</label>
								<div class="ui-col-5">
									<input type="password" name="repass" class="ui-form-ip" placeholder="请再次输入密码" data-rule="确认密码:required;password;match(upass)">
								</div>
							</div>
							<div class="ui-form-group ui-row">
								<label class="ui-col-2 ui-col-form-label ui-text-right">邮箱：</label>
								<div class="ui-col-5">
									<input type="text" name="email" class="ui-form-ip" placeholder="请输入邮箱，用于找回密码等" data-rule="邮箱:required;email;">
								</div>
							</div>
							{if sdcms[user_reg_auth]==1}
							<div class="ui-form-group ui-row">
								<label class="ui-col-2 ui-col-form-label ui-text-right">验证码：</label>
								<div class="ui-col-5">
									<div class="ui-input-group">
										<input type="text" name="code" id="code" class="ui-form-ip radius-right-none" placeholder="请输入验证码" data-rule="验证码:required;">
										<div class="code"><img src="{U('code')}" height="40" id="verify" title="点击更换验证码"></div>
									</div>
								</div>
							</div>
							{/if}
							{if sdcms[user_reg_type]==2&&sdcms[mail_type]>0}
							<div class="ui-form-group ui-row">
								<label class="ui-col-2 ui-col-form-label ui-text-right">邮箱验证码：</label>
								<div class="ui-col-5">
									<div class="ui-input-group">
										<input type="text" name="ecode" id="ecode" class="ui-form-ip radius-right-none" placeholder="请输入邮箱验证码" data-rule="邮箱验证码:required;">
										<button type="button" class="after">获取验证码</button>
									</div>
								</div>
							</div>
							{/if}
							<div class="ui-form-group ui-row">
								<label class="ui-col-2 ui-col-form-label ui-text-right"></label>
								<div class="ui-col-5">
									<input type="hidden" name="token" value="{$token}"><input type="submit" class="ui-btn ui-btn-blue" value="{if $isapi==1}注册新用户{else}注册{/if}">
								</div>
							</div>
							</form>
						</div>

						<!--over-->
					</div>
				</div>
			
			</div>
		</div>
	</div>
	
	{include file="include/foot.php"}
	<script>
	$(function()
	{
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