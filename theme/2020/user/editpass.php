<?php if(!defined('IN_SDCMS')) exit;?>
{php $self_name='修改密码'}
{php $self_ename='change Password'}
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
						<form method="post" class="ui-form ui-mt-40">
							<div class="ui-form-group ui-row">
								<label class="ui-col-2 ui-col-form-label ui-text-right">原密码：</label>
								<div class="ui-col-5">
									<input type="password" name="oldpass" class="ui-form-ip" placeholder="请输入原密码" data-rule="原密码:required;password;">
								</div>
							</div>
							<div class="ui-form-group ui-row">
								<label class="ui-col-2 ui-col-form-label ui-text-right">新密码：</label>
								<div class="ui-col-5">
									<input type="password" name="newpass" id="newpass" class="ui-form-ip" placeholder="请输入新密码" data-rule="新密码:required;password;">
								</div>
							</div>
							<div class="ui-form-group ui-row">
								<label class="ui-col-2 ui-col-form-label ui-text-right">确认新密码：</label>
								<div class="ui-col-5">
									<input type="password" name="repass" class="ui-form-ip" placeholder="请再次输入新密码" data-rule="确认新密码:required;password;match(newpass)">
								</div>
							</div>
							<div class="ui-form-group ui-row">
								<label class="ui-col-2 ui-col-form-label ui-text-right"></label>
								<div class="ui-col-5">
									<input type="hidden" name="token" value="{$token}">
                                    <input type="submit" class="ui-btn ui-btn-blue" value="修改密码">
								</div>
							</div>
						</form>
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