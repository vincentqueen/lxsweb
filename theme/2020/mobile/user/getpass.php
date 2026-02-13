<?php if(!defined('IN_SDCMS')) exit;?>
{php $self_name='忘记密码'}
{include file="mobile/include/top.php"}
<title>{$self_name}_{sdcms[web_name]}</title>
<meta name="keywords" content="{sdcms[seo_key]}">
<meta name="description" content="{sdcms[seo_desc]}">
</head>

<body>
	
	{include file="mobile/include/head.php"}

	<div class="ui-mwidth">
		<div class="ui-box ui-p-20">
			
			<!--表单部分开始-->
            <form method="post" class="ui-form">
                <div class="ui-form-group">
                    <input type="text" name="email" class="ui-form-ip" placeholder="请输入注册时填写的邮箱" data-rule="邮箱:required;email;">
                </div>
                {if sdcms[user_getpass_auth]==1}
                <div class="ui-form-group">
                    <div class="ui-input-group">
                        <input type="text" name="code" id="code" class="ui-form-ip radius-right-none" placeholder="请输入验证码" data-rule="验证码:required;">
                        <div class="code"><img src="{U('code')}" height="40" id="verify" title="点击更换验证码"></div>
                    </div>
                </div>
                {/if}
                <div class="ui-form-group">
                    <div class="ui-input-group">
                        <input type="text" name="ecode" id="ecode" class="ui-form-ip radius-right-none" placeholder="请输入邮箱验证码" data-rule="邮箱验证码:required;">
                        <button type="button" class="after">发送验证码</button>
                    </div>
                </div>
                <div class="ui-form-group">
                    <input type="password" name="password" id="password" autocomplete="off" class="ui-form-ip" placeholder="请输入新密码" data-rule="新密码:required;password;">
                </div>
                <div class="ui-form-group">
                    <input type="password" name="repass" autocomplete="off" class="ui-form-ip" placeholder="请再次输入密码" data-rule="确认密码:required;password;match(password)">
                </div>
                <div class="ui-form-group">
                    <input type="hidden" name="token" value="{$token}"><input type="submit" class="ui-btn ui-btn-blue ui-btn-block ui-btn-big" value="修改密码">
                </div>
            </form>
            <!--表单部分结束-->
			
			<div class="ui-pt-15 ui-bg-white"></div>
			
		</div>
		
	</div>
	
	{include file="mobile/include/foot.php"}
	<script>
	$(function()
	{
		$("#bar_user").addClass("active");
		$(".ui-topbar-title").html("{$self_name}");
		
		{if sdcms[user_getpass_auth]==1}
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
			{if sdcms[user_getpass_auth]==1}
			var code=that.closest("form").find("[name=code]").val();
			if(code=='')
			{
				sdcms.warn('请输入验证码');
				return false;
			}
			{/if}
			$.ajax(
			{
				url:"{U('getpasscode')}",
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
							setTimeout(function(){location.href='{N('login')}';},1500);
						}
						else
						{
							{if sdcms[user_getpass_auth]==1}$("#verify").click();{/if}
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
