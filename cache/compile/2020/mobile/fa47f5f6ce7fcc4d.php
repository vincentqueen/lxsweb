<?php defined('IN_SDCMS') or die(); if(!defined('IN_SDCMS')) exit;?>

<footer>
    <div class="dwrapper">
        <div class="top">
            <ul class="dcontact">
                <h3>联系信息</h3>
                <li>地址：<?php echo add_city(C(strtoupper('ct_address')),3);?></li>
                <li>电话：<?php echo add_city(C(strtoupper('ct_mobile')),3);?></li>
                <li>邮箱：<?php echo add_city(C(strtoupper('ct_email')),3);?></li>
            </ul>
            <form id="form_book" method="post">
                <h3>欢迎与您携手同行</h3>
                <?php if (false) { ?>
                <input type="text" name="truename" value="" placeholder="请输入您称呼"/>
                <input type="text" name="mobile" value="" placeholder="您的号码，我们将及时与您取得联系"/>
                <input type="hidden" name="tel" value="<?php echo THIS_LOCAL;?>" />
                <input type="button" class="submit form_btn" value="商务合作"/>
                <?php }?>
            </form>
            <div class="code clearfloat">
                <div class="item fl"><img src="<?php if (add_city(C(strtoupper('wxqr')),3)!=null) {  echo add_city(C(strtoupper('wxqr')),3); } else { ?>https://w.yksyb.cn/img.php?w=200&h=200<?php }?>" width="120"/><p>微信咨询</p></div>
            </div>
        </div>
        <div class="btm">
            Copyright © <?php echo date('Y');?>  <?php echo add_city(C(strtoupper('ct_company')),3);?>  All Right Reserved.<br /><a href="http://beian.miit.gov.cn" target="_blank"><?php echo add_city(C(strtoupper('web_icp')),3);?></a> &emsp; <a href="<?php echo N('sitemap');?>">网站地图</a>  <?php echo add_city(C(strtoupper('count_code')),3);?>
        </div>
    </div>
</footer>

<button class="scroll-top" id="j_scrolltop" type="button"><i class="fi fi-top"></i></button>

<script src="<?php echo WEB_THEME;?>mobile/static/js/forx.plugin.min.js"></script>
<script src="<?php echo WEB_THEME;?>mobile/static/js/layer.js"></script>
<script src="<?php echo WEB_THEME;?>mobile/static/js/forx.site.min.js"></script>
<script src="<?php echo WEB_THEME;?>mobile/static/js/forx.mobile.min.js"></script>
<script src="<?php echo WEB_THEME;?>mobile/static/js/swiper.min.js"></script>
<script src="<?php echo WEB_THEME;?>mobile/static/js/site.js"></script>
<script src="<?php echo WEB_ROOT;?>public/js/jquery.js"></script>
<script src="<?php echo WEB_ROOT;?>public/js/ui.js?v2"></script>
<script src="<?php echo WEB_THEME;?>mobile/js/cms.js"></script>
