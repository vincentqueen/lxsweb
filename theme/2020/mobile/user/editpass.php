<?php if(!defined('IN_SDCMS')) exit;?>
{php $self_name='修改密码'}
{include file="mobile/include/top.php"}
<title>{$self_name}_{sdcms[web_name]}</title>
<meta name="keywords" content="{sdcms[seo_key]}">
<meta name="description" content="{sdcms[seo_desc]}">
</head>

<body>
	
	{include file="mobile/include/head.php"}
	<div class="ui-mwidth">
		<div class="ui-box ui-p-10">
			<!--begin-->
			<form method="post" class="ui-form">
				<div class="ui-form-group">
					<input type="password" name="oldpass" class="ui-form-ip" placeholder="请输入原密码" data-rule="原密码:required;password;">
				</div>
				<div class="ui-form-group">
					<input type="password" name="newpass" id="newpass" class="ui-form-ip" placeholder="请输入新密码" data-rule="新密码:required;password;">
				</div>
				<div class="ui-form-group">
					<input type="password" name="repass" class="ui-form-ip" placeholder="请再次输入新密码" data-rule="确认新密码:required;password;match(newpass)">
				</div>
				<div class="ui-form-group">
					<input type="hidden" name="token" value="{$token}"><input type="submit" class="ui-btn ui-btn-block ui-btn-blue" value="修改密码">
				</div>
			</form>
			<!--over-->
		</div>
	</div>

	<div class="pt-15 mt"></div>
	{include file="mobile/include/foot.php"}
	<script>
    $(function()
    {
		$("#bar_user").addClass("active");
		$(".ui-topbar-title").html("{$self_name}");
		
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
							setTimeout(function(){location.href='{N("user")}';},1500);
						}
						else
						{
							sdcms.error(d.msg);
						}  
					}
				});
			}
		});
	});
    </script>
	
</body>
</html>
