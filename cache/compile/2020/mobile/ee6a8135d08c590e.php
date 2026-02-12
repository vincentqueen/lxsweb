<?php defined('IN_SDCMS') or die(); if(!defined('IN_SDCMS')) exit;?>
<div class="header"> 
	<div class="logo">
		<h1><a href="<?php echo $webroot;?>"><img src="<?php echo add_city(C(strtoupper('web_logo')),3);?>" alt="<?php echo add_city(C(strtoupper('web_name')),3);?>"></a></h1>
	</div>
	<div class="menu-icon">   
		<button class="menu-button" id="open-button"><i class="fi fi-nav nav-ico"></i></button>
	</div>
</div>
<?php include $this->tp->parse_include_twos("mobile/include/nav.php");?>
