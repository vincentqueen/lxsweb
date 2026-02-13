<?php if(!defined('IN_SDCMS')) exit;?>
{php $self_name='会员登录'}
{php $self_ename='sign in'}
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
					<div class="ui-box-h2">{if $isapi==1}账户绑定{else}{$self_name}{/if}</div>
					<div class="ui-box-body">
						<!--begin-->
						<div class="ui-pt-40">
							{if $isapi==1}
							<div class="api_user"><span>{$api_info.nickname}</span>，请完成账户绑定，如还没有账户，请先完善资料。　【<a href="{U('user/apiout')}">退出</a>】</div>
							{/if}
							<form method="post" class="ui-form ui-ml-40">
								<div class="ui-form-group ui-row">
									<label class="ui-col-2 ui-col-form-label ui-text-right">用户名：</label>
									<div class="ui-col-5">
										<input type="text" name="uname" class="ui-form-ip" placeholder="请输入用户名" data-rule="用户名:required;username;">
									</div>
								</div>
								<div class="ui-form-group ui-row">
									<label class="ui-col-2 ui-col-form-label ui-text-right">密码：</label>
									<div class="ui-col-5">
										<div class="ui-input-group">
											<input type="password" name="upass" autocomplete="off" class="ui-form-ip radius-right-none" placeholder="请输入密码" data-rule="密码:required;password;">
											<div class="after"><a href="{N('getpass')}" class="pl pr" tabindex="-1">忘记密码</a></div>
										</div>
									</div>
								</div>
								{if sdcms[user_login_auth]==1}
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
								<div class="ui-form-group ui-row">
									<label class="ui-col-2 ui-col-form-label ui-text-right"></label>
									<div class="ui-col-5">
										<input type="hidden" name="token" value="{$token}"><input type="submit" class="ui-btn ui-btn-blue" value="{if $isapi==1}确定绑定{else}登录{/if}">
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