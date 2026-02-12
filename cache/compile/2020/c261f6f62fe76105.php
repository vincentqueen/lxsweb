<?php defined('IN_SDCMS') or die(); if(!defined('IN_SDCMS')) exit;?>
<!DOCTYPE html>
<head>
<meta charset="utf-8">
  <meta content="IE=edge,chrome=1" http-equiv="X-UA-Compatible">
  <title><?php if (!isempty(add_city(C(strtoupper('seo_title')),3))) {  echo add_city(C(strtoupper('seo_title')),3); } else {  echo add_city(C(strtoupper('web_name')),3); }?></title>
  <meta name="description" content="<?php echo add_city(C(strtoupper('seo_desc')),3);?>">
  <meta name="keywords" content="<?php echo add_city(C(strtoupper('seo_key')),3);?>">
  <meta content="IE=edge,chrome=1" http-equiv="X-UA-Compatible">
<meta name="viewport" content="width=device-width,maximum-scale=1.0">
<script src="<?php echo WEB_THEME;?>static/js/uaredirect.js" type="text/javascript"></script>
<link rel="shortcut icon" href="/favicon.ico" type="image/x-icon">
<link href="<?php echo WEB_ROOT;?>public/css/ui.css" rel="stylesheet" type="text/css">
<link rel="stylesheet" type="text/css" href="<?php echo WEB_THEME;?>static/css/font-forx.min.css">  
<link rel="stylesheet" type="text/css" href="<?php echo WEB_THEME;?>static/css/global.min.css">  
<link rel="stylesheet" type="text/css" href="<?php echo WEB_THEME;?>static/css/swiper.min.css">
<link rel="stylesheet" type="text/css" href="<?php echo WEB_THEME;?>static/css/style.min.css">
<script type="text/javascript" src="<?php echo WEB_THEME;?>static/js/jquery-latest.min.js"></script>

