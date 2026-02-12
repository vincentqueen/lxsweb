<?php if(!defined('IN_SDCMS')) exit;?>

<footer>
    <div class="dwrapper">
        <div class="top">
        {sdcms:rp top="4" table="sd_category" where="followid=0 and isshow=1" order="catenum,cateid"}
			{php $foot_sonid=$rp[cateid]}
            <ul>
                <li>
                    <h3>
                    <a href="{cateurl($rp[cateid])}" title="{$rp[catename]}" target="_blank">{$rp[catename]}</a>
                    </h3>
                </li>
            </ul>
            {/sdcms:rp}
            <ul class="dcontact">
                <h3>联系信息</h3>
                <li>地址：{sdcms[ct_address]}</li>
                <li>电话：{sdcms[ct_mobile]}</li>
                <li>邮箱：{sdcms[ct_email]}</li>
            </ul>
            <form id="form_book" method="post">
                <h3>欢迎与您携手同行</h3>
                <input type="text" name="truename" value="" placeholder="请输入您称呼"/>
                <input type="text" name="mobile" value="" placeholder="您的号码，我们将及时与您取得联系"/>
                <input type="hidden" name="tel" value="{THIS_LOCAL}" />
                <input type="button" class="submit" value="商务合作"/>
            </form>
            {if false}
            <div class="code clearfloat">
                <div class="item fl"><img src="{if sdcms[wxqr]!=null}{sdcms[wxqr]}{else}https://w.yksyb.cn/img.php?w=200&h=200{/if}" width="120"/><p>微信咨询</p></div>
            </div>
            {/if}
        </div>
        <div class="btm">
            Copyright © {date('Y')}  {sdcms[ct_company]}  All Right Reserved.<br /><a href="http://beian.miit.gov.cn" target="_blank">{sdcms[web_icp]}</a> &emsp; <a href="{N('sitemap')}">网站地图</a>  {sdcms[count_code]}
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
			url:'{N(book)}',
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
<script type="text/javascript" src="{WEB_THEME}static/js/layer.js"></script>
<script type="text/javascript" src="{WEB_THEME}static/js/forx.plugin.min.js"></script>
<script type="text/javascript" src="{WEB_THEME}static/js/swiper.min.js"></script>
<script type="text/javascript" src="{WEB_THEME}static/js/forx.site.min.js"></script> 
<script type="text/javascript" src="{WEB_THEME}static/js/site.js"></script>
<script src="{WEB_ROOT}public/js/jquery.js"></script>
<script src="{WEB_ROOT}public/js/ui.js?v=2"></script>
<script src="{WEB_THEME}js/cms.js"></script>