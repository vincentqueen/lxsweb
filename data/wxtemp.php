<?php if(!defined('IN_SDCMS')) exit;?><!doctype html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>微信授权</title>
    <link href="/public/css/ui.css" rel="stylesheet" type="text/css">
    <script src="/public/js/jquery.js"></script>
    <style>
	html{display:flex;justify-content:center;align-items:center;height:100%;}
	body{background:#F0F4FB;display:flex;justify-content:center;align-items:center;height:100%;}
	.ui-dialog.green{min-width:320px;}
	.page-main{min-width:90%;max-width:98%;padding:30px;}
	.ui-dialog-tips{position:relative;border-radius:10px;min-width:320px;max-width:100%;}
	.ui-dialog-tips .ui-dialog-header .ui-dialog-title{cursor:auto;font-size:16px;}
	.ui-dialog-tips .ui-dialog-body{padding:20px;}
	.ui-dialog-tips .ui-dialog-body a{display:block;color:#fff;font-size:18px;}
	.ui-dialog-tips .pay-intro{padding:0 30px 30px 30px;line-height:30px;}
	.ui-dialog-tips .pay-icon{text-align:center;padding:10px 30px 20px 30px;}
	.ui-dialog-tips .pay-icon i{color:#07C160;font-size:120px;}
	.ui-dialog-tips .pay-footer{background:#08BB21;border-radius:20px;text-align:center;padding:10px 0;color:#fff;font-size:16px;}
    </style>
</head>
<body>
	<div class="page-main">
    	<div class="ui-dialog green ui-dialog-tips">
    		<div class="ui-dialog-header">
    			<div class="ui-dialog-title">微信授权</div>
    			<div class="ui-dialog-close" id="close">×</div>
    		</div>
            <div class="ui-dialog-body">
            	<div class="pay-icon"><i class="ui-icon-weixin"></i></div>
            	<div class="pay-intro">需要获取微信昵称、头像。</div>
            	<div class="pay-footer"><a href="{url}" id="href">同意获取</a></div>
            </div>
        </div>
    </div>
<script>
$(function()
{
	$("#close").click(function()
	{
		WeixinJSBridge.invoke('closeWindow',{},function(res){
		});
	})
})
</script>
</body>
</html>