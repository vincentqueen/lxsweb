<?php defined('IN_SDCMS') or die(); if(!defined('IN_SDCMS')) exit;?>
<div class="ui-box ui-box-radius">
	<div class="ui-box-title">会员中心<span>member center</span></div>
	<div class="ui-box-nav ui-collapse-menu">
		<?php if (USER_ID==0) { ?>
			<div class="ui-collapse-menu-title <?php if (ACTION_NAME=='reg') { ?> active<?php }?>"><a href="<?php echo N('reg');?>">会员注册</a></div>
			<div class="ui-collapse-menu-title <?php if (ACTION_NAME=='login') { ?> active<?php }?>"><a href="<?php echo N('login');?>">会员登录</a></div>
			<div class="ui-collapse-menu-title <?php if (ACTION_NAME=='getpass') { ?> active<?php }?>"><a href="<?php echo N('getpass');?>">忘记密码</a></div>
			<?php if (ACTION_NAME!='getpass') { ?>
				<?php if ($isapi==0 && (add_city(C(strtoupper('api_qq_open')),3)==1 || add_city(C(strtoupper('api_weibo_open')),3)==1 || add_city(C(strtoupper('api_weixin_open')),3)==1)) { ?>
				<div class="quicklogin">
					<div class="line line-center">快捷登录</div>
					<?php if (add_city(C(strtoupper('api_qq_open')),3)==1) { ?><a href="<?php echo WEB_URL; echo WEB_ROOT;?>api/login/qq/api.php" title="QQ登录"><span class="ui-icon-qq blue"></span>QQ登录</a><?php }?>
					<?php if (add_city(C(strtoupper('api_weibo_open')),3)==1) { ?><a href="<?php echo WEB_URL; echo WEB_ROOT;?>api/login/weibo/api.php" title="微博登录"><span class="ui-icon-weibo red"></span>微博登录</a><?php }?>
					<?php if (add_city(C(strtoupper('api_weixin_open')),3)==1) { ?><a href="<?php echo WEB_URL; echo WEB_ROOT;?>api/login/weixin/api.php" title="微信登录"><span class="ui-icon-weixin green"></span>微信登录</a><?php }?>
				</div>
				<?php }?>
			<?php }?>
		<?php } else { ?>
			<div class="ui-collapse-menu-title <?php if (ACTION_NAME=='index') { ?> active<?php }?>"><a href="<?php echo N('user');?>">个人中心</a></div>
			<div class="ui-collapse-menu-title <?php if (ACTION_NAME=='myorder') { ?> active<?php }?>"><a href="<?php echo N('myorder');?>">我的订单</a></div>
			<div class="ui-collapse-menu-title <?php if (ACTION_NAME=='mymoney' || ACTION_NAME=='pay') { ?> active<?php }?>"><a href="<?php echo N('mymoney');?>">财务明细</a></div>
			<div class="ui-collapse-menu-title <?php if (ACTION_NAME=='editemail') { ?> active<?php }?>"><a href="<?php echo N('editemail');?>">修改邮箱</a></div>
			<div class="ui-collapse-menu-title <?php if (ACTION_NAME=='editpass') { ?> active<?php }?>"><a href="<?php echo N('editpass');?>">修改密码</a></div>
			<div class="ui-collapse-menu-title"><a href="<?php echo N('out');?>">退出登录</a></div>
		<?php }?>
	</div>
</div>

