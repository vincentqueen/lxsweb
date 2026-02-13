<?php if(!defined('IN_SDCMS')) exit;?>

<footer>
    <div class="dwrapper">
        <div class="top">
            <ul class="dcontact">
                <h3>联系信息</h3>
                <li>地址：{sdcms[ct_address]}</li>
                <li>电话：{sdcms[ct_mobile]}</li>
                <li>邮箱：{sdcms[ct_email]}</li>
            </ul>
            <form id="form_book" method="post">
                <h3>欢迎与您携手同行</h3>
                {if false}
                <input type="text" name="truename" value="" placeholder="请输入您称呼"/>
                <input type="text" name="mobile" value="" placeholder="您的号码，我们将及时与您取得联系"/>
                <input type="hidden" name="tel" value="{THIS_LOCAL}" />
                <input type="button" class="submit form_btn" value="商务合作"/>
                {/if}
            </form>
            <div class="code clearfloat">
                <div class="item fl"><img src="{if sdcms[wxqr]!=null}{sdcms[wxqr]}{else}https://w.yksyb.cn/img.php?w=200&h=200{/if}" width="120"/><p>微信咨询</p></div>
            </div>
        </div>
        <div class="btm">
            Copyright © {date('Y')}  {sdcms[ct_company]}  All Right Reserved.<br /><a href="http://beian.miit.gov.cn" target="_blank">{sdcms[web_icp]}</a> &emsp; <a href="{N('sitemap')}">网站地图</a>  {sdcms[count_code]}
        </div>
    </div>
</footer>

<button class="scroll-top" id="j_scrolltop" type="button"><i class="fi fi-top"></i></button>

<script src="{WEB_THEME}mobile/static/js/forx.plugin.min.js"></script>
<script src="{WEB_THEME}mobile/static/js/layer.js"></script>
<script src="{WEB_THEME}mobile/static/js/forx.site.min.js"></script>
<script src="{WEB_THEME}mobile/static/js/forx.mobile.min.js"></script>
<script src="{WEB_THEME}mobile/static/js/swiper.min.js"></script>
<script src="{WEB_THEME}mobile/static/js/site.js"></script>
<script src="{WEB_ROOT}public/js/jquery.js"></script>
<script src="{WEB_ROOT}public/js/ui.js?v2"></script>
<script src="{WEB_THEME}mobile/js/cms.js"></script>
