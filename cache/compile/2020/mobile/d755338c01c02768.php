<?php defined('IN_SDCMS') or die(); if(!defined('IN_SDCMS')) exit; if (isweixin() && C('weixin_appid') && C('weixin_appsecret') && C('weixin_share_open')==1) { ?>
<script src="https://res.wx.qq.com/open/js/jweixin-1.6.0.js"></script>
<script>
wx.config({debug:false,appId:'<?php echo C('weixin_appid');?>',timestamp:'<?php echo $timestamp;?>',nonceStr:'<?php echo $noncestr;?>',signature:'<?php echo $signature;?>',jsApiList:['updateTimelineShareData','updateAppMessageShareData','hideMenuItems','openAddress']});
wx.ready(function()
{
    wx.updateTimelineShareData({
        title:'<?php echo $share_title;?>',
        link:'<?php echo $share_link;?>',
        imgUrl:'<?php echo $share_imgurl;?>',
        success:function()
        {
            //alert('已成功分享至朋友圈');
        }
    });
    wx.updateAppMessageShareData({
        title:'<?php echo $share_title;?>',
        desc:'<?php echo $share_desc;?>',
        link:'<?php echo $share_link;?>',
        imgUrl:'<?php echo $share_imgurl;?>',
        success:function()
        {
            //alert('已成功分享给朋友');
        }
    });
});
</script>
<?php }?>