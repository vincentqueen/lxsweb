/**
Ref：jquery3.0+  forx.plugin.js
By Konpi<info@bortay.com>(http://www.bortay.com)
*/
/*表单AJAX提交封装(包含验证)*/
function AjaxInitForm(formId, btnId, isDialog, urlId){
    var formObj = $('#' + formId);
    var btnObj = $("#" + btnId);
    var urlObj = $("#" + urlId);
    formObj.Validform({
        tiptype:3,
        callback:function(form){
        //AJAX提交表单
                $(form).ajaxSubmit({
                    beforeSubmit: formRequest,
                    success: formResponse,
                    error: formError,
                    url: formObj.attr("action"),
                    type: "post",
                    dataType: "json",
                    timeout: 60000
                });
                return false;
        }
    });  
    //表单提交前
    function formRequest(formData, jqForm, options) {
        btnObj.prop("disabled", true);
        btnObj.val("提交中...");
    }

    //表单提交后
    function formResponse(data, textStatus) {
        if (data.status == 1) {
            btnObj.val("提交成功");
            formObj[0].reset();
            //是否提示，默认不提示
            if(isDialog == 1){
                JForx.Message(data.msg, 6, function(){
                if(data.url){
                    location.href = data.url;
                }else if(urlObj.length > 0 && urlObj.val() != ""){
                    location.href = urlObj.val();
                }else{
                    btnObj.prop("disabled", false);
                }
                });
            }else{
                if(data.url){
                    location.href = data.url;
                }else if(urlObj){
                    location.href = urlObj.val();
                }else{
                    btnObj.prop("disabled", false);
                }
            }
        } else {
            $.dialog.alert(data.msg);
            btnObj.prop("disabled", false);
            btnObj.val("再次提交");
        }
    }
    //表单提交出错
    function formError(XMLHttpRequest, textStatus, errorThrown) {
    $.dialog.alert("状态：" + textStatus + "；出错提示：" + errorThrown);
        btnObj.prop("disabled", false);
        btnObj.val("再次提交");
    }
}

function AddSlide()
{
    if ($(window).width()<767 ){
        $(".cate").addClass('scrollnav');
        $('#JslideWrap').addClass("swiper-wrapper");
        var swipernav = new Swiper('.scrollnav', {
            freeMode : true,
            slidesPerView : 'auto',
            watchSlidesVisibility : true,
            freeModeSticky : true 
        });   
    }
}


$(function() {
	$(document).on("mouseenter", ".dropmenu",function() {
		$(this).addClass("open");
	});
	$(document).on("mouseleave", ".dropmenu",function() {
		$(this).removeClass("open");
    });
    //$('.subnav').scrollFix({distanceTop:'72px'});
    var mincnav_width = ($('.subnav ul li').length+1) * $('.subnav ul li').width();
    $('.subnav ul').width(mincnav_width);
    $('.subnav ul li').click(function(){
		$(this).addClass('actived').siblings('li').removeClass('actived');
		offset_left = $(this).offset().left-$('.subnav ul').offset().left-$('.subnav ul a').width();
		$('.subnav').stop(true,true).animate({scrollLeft:offset_left},500);
	});
	if($('.subnav ul li.actived').length!=0){
		$('.subnav').stop(true,true).animate({scrollLeft:$('.subnav li.actived').offset().left-$('.subnav ul').offset().left-$('.subnav li.actived').width()},0);
  }
  $(".subnav").on('click','ul li a',function() {
      var _hashId = $(this.hash);
      if(_hashId.length){
          $("html, body").animate({
              scrollTop: _hashId.offset().top - 120 +"px"
          }, {
              duration: 500,
              easing: "swing"
          });
          return false;
      }
  });
//     $('#js-nav-slide').find('li').click(function(){ 
//         $('#js-nav-slide').find('li').removeClass('active');
//        $(this).addClass('active');
//        var alt=$(this).find('a').attr('alt');
//        var offset=$(alt).offset().top-80;
//        $('html, body').animate({scrollTop:offset}, 'slow');       
//    });
  $(document).on('click', "#j-sq-verify", function () {
    var _this = $(this);
    var code = $(".form-code").val();
    if (JForx.IsNullOrEmpty(code)) {
      JForx.Message("请输入授权码", 0);
      return false;
    } else {
      $("#j-sq-form").submit();
    }
  });
});

$(window).on("resize",function() {
    
});
