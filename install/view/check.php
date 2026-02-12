<?php defined('IN_SDCMS') or die();?><!doctype html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="renderer" content="webkit">
<meta http-equiv="Cache-Control" content="no-siteapp"/>
<title>{$webname}环境检测</title>
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
                    <li class="hover"><a href="javascript:;">环境检测</a></li>
                    <li><a href="javascript:;">参数配置</a></li>
                    <li><a href="javascript:;">安装结果</a></li>
                </ul>
            </div>
        </div>
    </div>
    
    <div class="bg_inner"></div>
    
    <div class="width inner_container">
        <div class="install">
            <div class="subject">
                <b>服务器环境</b>
            </div>
            <table class="ui-table ui-table-border ui-table-hover ui-mb-20">
                <thead class="ui-thead-gray">
                    <tr>
                        <th>项目名称</th>
                        <th width="20%">结果</th>
                        <th width="20%">帮助</th>
                    </tr>
                </thead>
                <tbody>
                	{foreach $data as $key=>$rs}
                    <tr>
                        <td class="ui-text-left">{$key}</td>
                        <td>{$rs['result']}</td>
                        <td>{$rs['help']}</td>
                    </tr>
                    {/foreach}
                </tbody>
            </table>
            <div class="subject">
                <b>目录权限</b>
            </div>
            <table class="ui-table ui-table-border ui-table-hover">
                <thead class="ui-thead-gray">
                    <tr>
                        <th>项目名称</th>
                        <th width="20%">结果</th>
                        <th width="20%">帮助</th>
                    </tr>
                </thead>
                <tbody>
                    {foreach $file as $key=>$rs}
                    <tr>
                    	<td class="ui-text-left">{$key}</td>
                        <td>{$rs['result']}</td>
                        <td>{$rs['help']}</td>
                    </tr>
                    {/foreach}
                </tbody>
            </table>
            <div class="ui-text-center ui-mt-30"><input type="hidden" name="token" value="{$token}"><button class="ui-btn ui-mr" onClick="location.href='./'">上一步</button><button class="ui-btn ui-btn-blue" onClick="location.href='?act=config'" {if !$result}disabled{/if}>{if !$result}请检查不符合的项目{else}下一步{/if}</button></div>
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