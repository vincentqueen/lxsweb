<?php if(!defined('IN_SDCMS')) exit;?>
{php $self_name='修改邮箱'}
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
			{sdcms:rs top="1" table="sd_user" where="id=$userid"}
			<form method="post" class="ui-form">
				<div class="ui-form-group">
						<input type="text" name="username" class="ui-form-ip" value="{get_user_info('uname')}" disabled>
				</div>
				<div class="ui-form-group">
					<input type="text" name="email" class="ui-form-ip" value="{$rs[uemail]}" placeholder="请输入邮箱" data-rule="邮箱:required;email;">
				</div>
				<div class="ui-form-group">
					<input type="hidden" name="token" value="{$token}"><input type="submit" class="ui-btn ui-btn-block ui-btn-blue" value="修改邮箱">
				</div>
			</form>
			{/sdcms:rs}
			<!--over-->
		</div>
	</div>

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
