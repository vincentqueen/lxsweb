<?php if(!defined('IN_SDCMS')) exit;?>

<footer class="site-footer">
    <div class="dwrapper">
        <div class="footer-top">
            <div class="footer-brand">
                <img src="{sdcms[web_logo]}" alt="{sdcms[web_name]}">
                <div class="footer-text">以绿色科技为底色，打造健康、耐用、可持续的空间木作解决方案。</div>
                <div class="footer-meta">
                    <span>地址：{sdcms[ct_address]}</span>
                    <span>电话：{sdcms[ct_mobile]}</span>
                    <span>邮箱：{sdcms[ct_email]}</span>
                </div>
            </div>
            <div class="footer-links">
                <div class="footer-title">快速入口</div>
                <ul>
                    {sdcms:rp top="4" table="sd_category" where="followid=0 and isshow=1" order="catenum,cateid"}
                    <li><a href="{cateurl($rp[cateid])}" title="{$rp[catename]}" target="_blank">{$rp[catename]}</a></li>
                    {/sdcms:rp}
                    <li><a href="{N('sitemap')}">网站地图</a></li>
                    <li><a href="tel:{sdcms[ct_mobile]}">服务热线</a></li>
                </ul>
            </div>
            <div class="footer-form">
                <div class="footer-title">商务合作</div>
                <form id="form_book" method="post">
                    <input type="text" name="truename" value="" placeholder="您的称呼"/>
                    <input type="text" name="mobile" value="" placeholder="联系电话"/>
                    <input type="hidden" name="tel" value="{THIS_LOCAL}" />
                    <input type="button" class="submit form_btn" value="提交需求"/>
                </form>
            </div>
        </div>
        <div class="footer-bottom">
            <div>Copyright © {date('Y')} {sdcms[ct_company]} All Right Reserved.</div>
            <div><a href="http://beian.miit.gov.cn" target="_blank">{sdcms[web_icp]}</a> {sdcms[count_code]}</div>
        </div>
    </div>
</footer>
<script src="{WEB_THEME}static/js/wow.min.js" type="text/javascript" charset="utf-8"></script>

<script src="{WEB_ROOT}public/js/toastr.min.js"></script>
<script>
$(function(){
	toastr.options={"positionClass":"toast-top-center","timeOut":"3000","onclick":null,showMethod:"slideDown",hideMethod:"slideUp"};
	$('.form_btn').click(function(){
		$.ajax({
			type:'post',
			cache:false,
			dataType:'json',
			url:'{N("book")}',
			data:$("#form_book").serialize(),
			error:function(e){alert(e.responseText);},
			success:function(d){
				if(d.state=='success'){
					toastr.success(d.msg);
					setTimeout(function(){location.href='{THIS_LOCAL}';},1500);
				}else{
					toastr.error(d.msg);
				}
				
			}
		})
	})

    $('footer .top ul h3').on('click', function () {
	    $(this).stop(true).toggleClass('toggle');
	    $(this).siblings('.section').slideToggle();
	})
})
</script>


<button class="m-scrolltop active" id="j_scroll_top" type="button">回到顶部</button>
<script type="text/javascript" src="{WEB_ROOT}public/js/ui.js?v=2"></script>
<script type="text/javascript" src="{WEB_THEME}static/js/layer.js"></script>
<script type="text/javascript" src="{WEB_THEME}static/js/forx.plugin.min.js"></script>
<script type="text/javascript" src="{WEB_THEME}static/js/swiper.min.js"></script>
<script type="text/javascript" src="{WEB_THEME}static/js/forx.site.min.js"></script>
<script type="text/javascript" src="{WEB_THEME}static/js/site.js"></script>
<script type="text/javascript" src="{WEB_THEME}js/cms.js"></script>
