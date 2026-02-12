
// 网站首页 Index
// 沙万.Sawan<info@bortay.com>（http://www.bortay.com）
// 2020-06-23

function changeCkVideo(videoUrl) {
    if(player == null) {
        return;
    }
    var newVideoObject = {
        container: '#j_promo_video', //容器的ID
        variable: 'player',
        autoplay: false, //是否自动播放
        video: videoUrl
    }
    //判断是需要重新加载播放器还是直接换新地址
    if(player.playerType == 'html5video') {
        if(player.getFileExt(videoUrl) == '.flv' || player.getFileExt(videoUrl) == '.m3u8' || player.getFileExt(videoUrl) == '.f4v' || videoUrl.substr(0, 4) == 'rtmp') {
            player.removeChild();
            player = null;
            player = new ckplayer();
            player.embed(newVideoObject);
        } else {
            player.newVideo(newVideoObject);
        }
    } else {
        if(player.getFileExt(videoUrl) == '.mp4' || player.getFileExt(videoUrl) == '.webm' || player.getFileExt(videoUrl) == '.ogg') {
            player = null;
            player = new ckplayer();
            player.embed(newVideoObject);
        } else {
            player.newVideo(newVideoObject);
        }
    }
}
//var player=new ckplayer({
//     container: '#j_promo_video',//“#”代表容器的ID，“.”或“”代表容器的class
//     variable: 'player',//该属性必需设置，值等于下面的new chplayer()的对象
//     flashplayer:false,//如果强制使用flashplayer则设置成true
//     video:'/upfiles/others/video.mp4',//视频地址poster:'/upfiles/video/promo.jpg'        
// });

function changeVideo(videoUrl) {
    // $("#j-video").src=videoUrl;
    // $("#j-video").play();
    // var Player =  videojs("video");  //初始化视频
    // Player.src(url);  //重置video的src
    // Player.load(url);  //使video重新加载
    videoElem = $("#j-video");
    var oldUrl = videoElem.attr("src");
    if(videoUrl != oldUrl)
    {
        videoElem.attr("src",videoUrl);
        videoElem.html('<source class="source" src="' + videoUrl + '" type="video/mp4">');
        videoElem.trigger('play');
    }
}

$(function(){
	var ifoucslide = new Swiper('.ifocus', {
		loop: true,
		slidesPerView:1,
		autoplay: {
			delay: 2000,
			disableOnInteraction: false,
			},
		navigation: {
			nextEl: '.slidenext',
			prevEl: '.slideprev',
		  },
		spaceBetween: 0,
		pagination: {
			el: '.switcher',
			clickable: true,
        },
        lazy: true,
    });
    $('.ifocus').mouseenter(function() {ifoucslide.autoplay.stop();});
    $('.ifocus').mouseleave(function() {ifoucslide.autoplay.start();});

    var inewsSwiper = new Swiper('.inews-list', {
        pagination: {
            el: '.ar-rlt',
            clickable: true
        },
        spaceBetween:0,
        autoHeight:true,
        slidesPerView:'auto',
        loop : false,
        autoplay: {
            delay: 3000,
            disableOnInteraction: false,
        },
        autoplayDisableOnInteraction : false,
        on: {
            resize: function () {
                setTimeout(() => {
                    inewsSwiper.update()
                }, 300)}
            },
    });

    $(document).on("click",".cvideo",function(){
        var videoUrl= $(this).data("video");
        $(".cvideo").removeClass("on");
        $(this).addClass("on");
        changeVideo(videoUrl);
    });

    //$("#scrollsidebar2").fix({float : 'right',minStatue : false,skin : 'gray',durationTime : 1000});

    // $('#fullpage').fullpage({
    //     'navigation': true,
    //     'navigationPosition':'left',
    //     'paddingBottom':0
    // });

    // $(document).on("click",".cvideo",function(){
    //     var videoUrl= $(this).data("video");
    //     $(".cvideo").removeClass("on");
    //     $(this).addClass("on");
    //     changeVideo(videoUrl);
    // });
});

// 
//     function FeedPost(){
//        $("#fbmsg").html('正在提交,请稍后...');
//		if ($('#dat_contx').val().length == 0) {
//		    $('#dat_contx').focus();
//		    JForx.Message("内容必须填写", "error");
//			return false;
//		}
//		$.post('/feedback/save.aspx', {
//			contacts:$('#tel').val(),
// content: $('#content').val(),
// rnd: Math.random().toString() }, function (data) {
//     if (data.status==1) {
//         $("#content").val("");
//         JForx.Message(data.msg, "Success");
//     } else {
//         JForx.Message(data.msg, "Error");
//     }
// }, 'json');
// return false;
// }