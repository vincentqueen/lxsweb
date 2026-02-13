<?php defined('IN_SDCMS') or die();?><!doctype html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="renderer" content="webkit">
<meta http-equiv="Cache-Control" content="no-siteapp"/>
<title>{$webname}安装结果</title>
<link rel="stylesheet" href="../public/css/ui.css">
<link rel="stylesheet" href="css/app.css">
<script src="../public/js/jquery.js"></script>
<script src="../public/js/ui.js"></script>
</head>

<body>
    <div class="bg_header">
        <div class="header width">
        	<div class="logo"></div>
            <div class="nav">
                <ul>
                	<li><a href="javascript:;">安装协议</a></li>
                    <li><a href="javascript:;">环境检测</a></li>
                    <li><a href="javascript:;">参数配置</a></li>
                    <li class="hover"><a href="javascript:;">安装结果</a></li>
                </ul>
            </div>
        </div>
    </div>
    
    <div class="bg_inner"></div>
    <div class="width inner_container">
        <div class="install">

            <div class="subject">
                <b>安装结果</b>
            </div>
            <h1>恭喜您，安装成功！</h1>
            <div class="ui-mt-30">
            	<button class="ui-btn ui-btn-yellow ui-mr" onClick="location.href='../'">访问首页</button>
                <button class="ui-btn ui-btn-blue" onClick="location.href='../?m=admin'">访问后台</button>
            </div>

        </div>
        
    </div>
    <div class="ui-text-center ui-mb-20">版权所有 @  成都生动网络科技有限公司　<a href="https://www.sdcms.cn" target="_blank">Powered By Sdcms.Cn</a></div>

    <!--[if lt IE 9]>
    <div class="notsupport">
        <h1>:( 非常遗憾</h1>
        <h2>您的浏览器版本太低，请升级您的浏览器</h2>
    </div>
    <![endif]-->
</body>
</html>