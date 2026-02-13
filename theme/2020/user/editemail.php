<?php if(!defined('IN_SDCMS')) exit;?>
{php $self_name='修改邮箱'}
{php $self_ename='modify mailbox'}
{php $position=[['name'=>'会员中心','url'=>N('user')],['name'=>$self_name,'url'=>THIS_LOCAL]]}
{include file="include/top.php"}
<title>{$self_name}_{sdcms[web_name]}</title>
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
					<div class="ui-box-h2">{$self_name}</div>
					<div class="ui-box-body">
						<!--begin-->
						{sdcms:rs top="1" table="sd_user" where="id=$userid"}
						<form method="post" class="ui-form ui-mt-40">
							<div class="ui-form-group ui-row">
								<label class="ui-col-2 ui-col-form-label ui-text-right">用户名：</label>
								<div class="ui-col-5">
									<input type="text" name="username" class="ui-form-ip" value="{get_user_info('uname')}" disabled>
								</div>
							</div>
							<div class="ui-form-group ui-row">
								<label class="ui-col-2 ui-col-form-label ui-text-right">邮箱：</label>
								<div class="ui-col-5">
									<input type="text" name="email" class="ui-form-ip" value="{$rs[uemail]}" placeholder="请输入邮箱" data-rule="邮箱:required;email;">
								</div>
							</div>
							<div class="ui-form-group ui-row">
								<label class="ui-col-2 ui-col-form-label ui-text-right"></label>
								<div class="ui-col-5">
									<input type="hidden" name="token" value="{$token}">
                                    <input type="submit" class="ui-btn ui-btn-blue" value="修改邮箱">
								</div>
							</div>
						</form>
						{/sdcms:rs}
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
							setTimeout(function(){location.href='{THIS_LOCAL}';},1500);
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