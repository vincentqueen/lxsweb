<?php if(!defined('IN_SDCMS')) exit;?>
	
	
<div class="toper">
        <div class="header">
        <div class="head">
            <h1 class="logo-t"><a href=""><img src="{sdcms[web_logo]}" alt="{sdcms[web_name]}" ></a></h1>
            <div class="gnav">
                <div class="navi">
                  <ul>
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
                <div class="navi-trigger">
                    <!-- <div class="trigger" id="j-nav-trigger" title="切换导航">
                    <span class="line line-top"></span>
                    <span class="line line-middle"></span>
                    <span class="line line-bottom"></span>
                    </div> -->
                    <div class="header_center">
                        <div class="w1200">
                            <div class="tel">咨询热线<b>{sdcms[ct_mobile]}</b></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>