<?php defined('IN_SDCMS') or die(); if(!defined('IN_SDCMS')) exit;?>
<?php $self_name='会员登录';?>
<?php include $this->tp->parse_include_twos("mobile/include/top.php");?>

<title><?php echo $self_name;?>_<?php echo add_city(C(strtoupper('web_name')),3);?></title>
<meta name="keywords" content="<?php echo add_city(C(strtoupper('seo_key')),3);?>">
<meta name="description" content="<?php echo add_city(C(strtoupper('seo_desc')),3);?>">
</head>

<body>
	
	<?php include $this->tp->parse_include_twos("mobile/include/head.php");?>


	<div class="ui-mwidth">
		<div class="ui-box ui-p-20">
			<?php if ($isapi==1) { ?>
			<div class="api_user"><span><?php echo $api_info['nickname'];?></span>，请完成账户绑定，如还没有账户，请先完善资料。　【<a href="<?php echo U('user/apiout');?>">退出</a>】</div>
			<?php }?>
			<form method="post" class="ui-form">
				<div class="ui-form-group">
					<input type="text" name="uname" class="ui-form-ip" placeholder="请输入用户名" data-rule="用户名:required;username;">
				</div>
				<div class="ui-form-group">
					<div class="ui-input-group">
						<input type="password" name="upass" autocomplete="off" class="ui-form-ip radius-right-none" placeholder="请输入密码" data-rule="密码:required;password;">
						<div class="after"><a href="<?php echo N('getpass');?>" class="pl pr" tabindex="-1">忘记密码</a></div>
					</div>
				</div>
				<?php if (add_city(C(strtoupper('user_login_auth')),3)==1) { ?>
				<div class="ui-form-group">
					<div class="ui-input-group">
						<input type="text" name="code" id="code" class="ui-form-ip radius-right-none" placeholder="请输入验证码" data-rule="验证码:required;">
						<div class="code"><img src="<?php echo U('code');?>" height="40" id="verify" title="点击更换验证码"></div>
					</div>
				</div>
				<?php }?>
				<div class="ui-form-group ui-row">
                	<input type="hidden" name="token" value="<?php echo $token;?>">
					<button type="submit" class="ui-btn ui-btn-blue ui-btn-block ui-btn-big ui-btn-radius"><?php if ($isapi==1) { ?>确定绑定<?php } else { ?>登录<?php }?></button>
            		<a href="<?php echo N('reg');?>" class="ui-btn ui-btn-block ui-btn-big ui-btn-radius ui-mt-15"><?php if ($isapi==1) { ?>注册新用户<?php } else { ?>注册<?php }?></a>
				</div>
			</form>
			
			<?php if ($isapi==0 && (add_city(C(strtoupper('api_qq_open')),3)==1 || add_city(C(strtoupper('api_weibo_open')),3)==1 || add_city(C(strtoupper('api_wx_open')),3)==1)) { ?>
			<div class="ui-pl-20 ui-pr-20 ui-pt-20">
				<div class="ui-line"><span class="ui-text-gray ui-font-15">快捷登录</span></div>
				<div class="quick-login">
					<?php if (add_city(C(strtoupper('api_qq_open')),3)==1) { ?><a href="<?php echo WEB_ROOT;?>api/login/qq/api.php" title="QQ登录"><span class="ui-icon-qq blue"></span>QQ</a><?php }?>
					<?php if (add_city(C(strtoupper('api_weibo_open')),3)==1) { ?><a href="<?php echo WEB_ROOT;?>api/login/weibo/api.php" title="微博登录"><span class="ui-icon-weibo red"></span>微博</a><?php }?>
					<?php if (isweixin() && add_city(C(strtoupper('api_wx_open')),3)==1 && add_city(C(strtoupper('api_wx_loginway')),3)==0) { ?><a href="<?php echo WEB_ROOT;?>api/pay/wxpay/w/openid.php?type=1" title="微信登录"><span class="ui-icon-weixin red"></span>微信</a><?php }?>
				</div>
			</div>
			<?php }?>
			
			<div class="ui-pt-15 ui-bg-white"></div>
			
		</div>
		
	</div>
	
	<?php include $this->tp->parse_include_twos("mobile/include/foot.php");?>

	<script>
    $(function()
    {
		$("#bar_user").addClass("active");
		$(".ui-topbar-title").html("<?php echo $self_name;?>");
		
    	<?php if (add_city(C(strtoupper('user_login_auth')),3)==1) { ?>
    	$("#verify").click(function()
    	{
    		$(this).attr("src",$(this).attr("src")+"<?php echo iif(add_city(C(strtoupper('url_mode')),3)==1,"&","?");?>rnd="+Math.round());
    		$("#code").val("");
    	});
    	<?php }?>
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
    				url:'<?php echo THIS_LOCAL;?>',
    				data:$(form).serialize(),
    				error:function(e){alert(e.responseText);},
    				success:function(d)
    				{
    					if(d.state=='success')
    					{
    						sdcms.success(d.msg);
    						setTimeout(function(){location.href='<?php echo $lasturl;?>';},1500);
    					}
    					else
    					{
                            <?php if (add_city(C(strtoupper('user_login_auth')),3)==1) { ?>$("#verify").click();<?php }?>
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
