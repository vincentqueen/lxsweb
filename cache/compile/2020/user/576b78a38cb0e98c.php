<?php defined('IN_SDCMS') or die(); if(!defined('IN_SDCMS')) exit;?>
<?php $self_name='会员登录';?>
<?php $self_ename='sign in';?>
<?php $position=[['name'=>'会员中心','url'=>N('user')],['name'=>$self_name,'url'=>THIS_LOCAL]];?>
<?php include $this->tp->parse_include_twos("include/top.php");?>

<title><?php echo $self_name;?>_<?php echo add_city(C(strtoupper('web_name')),3);?></title>
<meta name="keywords" content="<?php echo add_city(C(strtoupper('seo_key')),3);?>">
<meta name="description" content="<?php echo add_city(C(strtoupper('seo_desc')),3);?>">
</head>

<body>
	<?php include $this->tp->parse_include_twos("include/head.php");?>

	<?php include $this->tp->parse_include_twos("include/banner_inner.php");?>


	<div class="container">
		<div class="width ui-row">
			<div class="container-left">
				<div class="ui-fixed-s" data-parent=".container">
					<?php include $this->tp->parse_include_twos("user/nav.php");?>

				</div>
			</div>
			
			<div class="container-right">
			
				<div class="ui-box">
					<div class="ui-box-h2"><?php if ($isapi==1) { ?>账户绑定<?php } else {  echo $self_name; }?></div>
					<div class="ui-box-body">
						<!--begin-->
						<div class="ui-pt-40">
							<?php if ($isapi==1) { ?>
							<div class="api_user"><span><?php echo $api_info['nickname'];?></span>，请完成账户绑定，如还没有账户，请先完善资料。　【<a href="<?php echo U('user/apiout');?>">退出</a>】</div>
							<?php }?>
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
											<div class="after"><a href="<?php echo N('getpass');?>" class="pl pr" tabindex="-1">忘记密码</a></div>
										</div>
									</div>
								</div>
								<?php if (add_city(C(strtoupper('user_login_auth')),3)==1) { ?>
								<div class="ui-form-group ui-row">
									<label class="ui-col-2 ui-col-form-label ui-text-right">验证码：</label>
									<div class="ui-col-5">
										<div class="ui-input-group">
											<input type="text" name="code" id="code" class="ui-form-ip radius-right-none" placeholder="请输入验证码" data-rule="验证码:required;">
											<div class="code"><img src="<?php echo U('code');?>" height="40" id="verify" title="点击更换验证码"></div>
										</div>
									</div>
								</div>
								<?php }?>
								<div class="ui-form-group ui-row">
									<label class="ui-col-2 ui-col-form-label ui-text-right"></label>
									<div class="ui-col-5">
										<input type="hidden" name="token" value="<?php echo $token;?>"><input type="submit" class="ui-btn ui-btn-blue" value="<?php if ($isapi==1) { ?>确定绑定<?php } else { ?>登录<?php }?>">
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
	
	<?php include $this->tp->parse_include_twos("include/foot.php");?>

	<script>
    $(function()
    {
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