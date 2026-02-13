<?php if(!defined('IN_SDCMS')) exit;?>
	
	
<div class="toper">
    <div class="header">
        <div class="head nav-shell">
            <div class="brand">
                <h1 class="logo-t"><a href="{$webroot}"><img src="{sdcms[web_logo]}" alt="{sdcms[web_name]}" ></a></h1>
            </div>
            <div class="gnav">
                <div class="navi">
                    <ul class="nav-list">
                        <li{if IS_HOME} class="active"{/if}><a class="nav" id="nav_1" title="首页" href="{$webroot}" target="_self"><span class="cn">首页</span></a></li>
                        {php $a=2}
                        {sdcms:rp top="0" table="sd_category" where="followid=0 and isshow=1" order="catenum,cateid"}
                        {php $head_sonid=$rp[cateid]}
                        <li{is_active($rp[cateid],$parentid,'active')}>
                            <a class="nav" id="nav_{$a}" title="{$rp[catename]}" href="{cateurl($rp[cateid])}" target="_self">
                                <span class="cn">{$rp[catename]}</span>
                            </a>
                        </li>
                        {php $a++}
                        {/sdcms:rp}
                    </ul>
                </div>
            </div>
        </div>
        <div class="nav-actions">
            <div class="nav-contact">
                <span class="label">咨询热线</span>
                <a href="tel:400-1016383">400-1016383</a>
            </div>
            <a class="nav-cta" href="tel:400-1016383">立即咨询</a>
        </div>
    </div>
</div>
