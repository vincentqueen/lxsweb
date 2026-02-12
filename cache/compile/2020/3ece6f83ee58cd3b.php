<?php defined('IN_SDCMS') or die(); if(!defined('IN_SDCMS')) exit;?>

<footer>
    <div class="dwrapper">
        <div class="top">
        <?php $array_rp=$this->db->load("select * from sd_category  where followid=0 and isshow=1  order by catenum,cateid limit 4",0,false,0);$total_rp=count($array_rp);if($total_rp==0){ ?>
<?php } else{ ?>
<?php $i=0;} foreach($array_rp as $rp){ $i++;?>
			<?php $foot_sonid=$rp['cateid'];?>
            <ul>
                <li>
                    <h3>
                    <a href="<?php echo cateurl($rp['cateid']);?>" title="<?php echo add_city($rp['catename'],1);?>" target="_blank"><?php echo add_city($rp['catename'],1);?></a>
                    </h3>
                </li>
            </ul>
            <?php } if($total_rp>0){ ?>
<?php }?>
            <ul class="dcontact">
                <h3>联系信息</h3>
                <li>地址：<?php echo add_city(C(strtoupper('ct_address')),3);?></li>
                <li>电话：<?php echo add_city(C(strtoupper('ct_mobile')),3);?></li>
                <li>邮箱：<?php echo add_city(C(strtoupper('ct_email')),3);?></li>
            </ul>
            <form id="form_book" method="post">
                <h3>欢迎与您携手同行</h3>
                <input type="text" name="truename" value="" placeholder="请输入您称呼"/>
                <input type="text" name="mobile" value="" placeholder="您的号码，我们将及时与您取得联系"/>
                <input type="hidden" name="tel" value="<?php echo THIS_LOCAL;?>" />
                <input type="button" class="submit" value="商务合作"/>
            </form>
            <?php if (false) { ?>
            <div class="code clearfloat">
                <div class="item fl"><img src="<?php if (add_city(C(strtoupper('wxqr')),3)!=null) {  echo add_city(C(strtoupper('wxqr')),3); } else { ?>https://w.yksyb.cn/img.php?w=200&h=200<?php }?>" width="120"/><p>微信咨询</p></div>
            </div>
            <?php }?>
        </div>
        <div class="btm">
            Copyright © <?php echo date('Y');?>  <?php echo add_city(C(strtoupper('ct_company')),3);?>  All Right Reserved.<br /><a href="http://beian.miit.gov.cn" target="_blank"><?php echo add_city(C(strtoupper('web_icp')),3);?></a> &emsp; <a href="<?php echo N('sitemap');?>">网站地图</a>  <?php echo add_city(C(strtoupper('count_code')),3);?>
        </div>
    </div>
</footer>
<script src="<?php echo WEB_THEME;?>static/js/wow.min.js" type="text/javascript" charset="utf-8"></script>

<script src="<?php echo WEB_ROOT;?>public/js/toastr.min.js"></script>
<script>
$(function(){
	toastr.options={"positionClass":"toast-top-center","timeOut":"3000","onclick":null,showMethod:"slideDown",hideMethod:"slideUp"};
	$('.form_btn').click(function(){
		$.ajax({
			type:'post',
			cache:false,
			dataType:'json',
			url:'<?php echo N(book);?>',
			data:$("#form_book").serialize(),
			error:function(e){alert(e.responseText);},
			success:function(d){
				if(d.state=='success'){
					toastr.success(d.msg);
					setTimeout(function(){location.href='<?php echo THIS_LOCAL;?>';},1500);
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
<script type="text/javascript" src="<?php echo WEB_THEME;?>static/js/layer.js"></script>
<script type="text/javascript" src="<?php echo WEB_THEME;?>static/js/forx.plugin.min.js"></script>
<script type="text/javascript" src="<?php echo WEB_THEME;?>static/js/swiper.min.js"></script>
<script type="text/javascript" src="<?php echo WEB_THEME;?>static/js/forx.site.min.js"></script> 
<script type="text/javascript" src="<?php echo WEB_THEME;?>static/js/site.js"></script>
<script src="<?php echo WEB_ROOT;?>public/js/jquery.js"></script>
<script src="<?php echo WEB_ROOT;?>public/js/ui.js?v=2"></script>
<script src="<?php echo WEB_THEME;?>js/cms.js"></script>