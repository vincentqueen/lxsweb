<?php if(!defined('IN_SDCMS')) exit;?>{if isweixin() && C('weixin_appid') && C('weixin_appsecret') && C('weixin_share_open')==1}
<script src="https://res.wx.qq.com/open/js/jweixin-1.6.0.js"></script>
<script>
wx.config({debug:false,appId:'{C('weixin_appid')}',timestamp:'{$timestamp}',nonceStr:'{$noncestr}',signature:'{$signature}',jsApiList:['updateTimelineShareData','updateAppMessageShareData','hideMenuItems','openAddress']});
wx.ready(function()
{
    wx.updateTimelineShareData({
        title:'{$share_title}',
        link:'{$share_link}',
        imgUrl:'{$share_imgurl}',
        success:function()
        {
            //alert('已成功分享至朋友圈');
        }
    });
    wx.updateAppMessageShareData({
        title:'{$share_title}',
        desc:'{$share_desc}',
        link:'{$share_link}',
        imgUrl:'{$share_imgurl}',
        success:function()
        {
            //alert('已成功分享给朋友');
        }
    });
});
</script>
{/if}