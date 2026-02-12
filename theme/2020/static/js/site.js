/**
Base on：jquery3.0+  forx.plugin.js
*/
// (function (window, undefined) {
//   // 监听页面加载完成后，检查是否需要定位锚点
//   window.onload = function () {
//     scrollToAnchor();
//   };
//   // 监听地址栏url的hash值改变时，检查是否需要定位锚点
//   window.onhashchange = function () {
//     scrollToAnchor();
//   };
//   // 滚动到自定义的伪锚点
//   function scrollToAnchor() {
//     var hash = getHash(), // 获取url的hash值
//       anchor = getAnchor(hash), // 获取伪锚点的id
//       anchorDom, // 伪锚点dom对象
//       anchorScrollTop; // 伪锚点距离页面顶部的距离

//     // 如果不存在伪锚点,则直接结束
//     if (anchor.length < 1) {
//       return;
//     }
//     anchorDom = getDom(anchor);
//     anchorScrollTop = anchorDom.offsetTop -180;//.offset().top;
//     $('html,body').animate({
//       scrollTop: anchorScrollTop
//     }, 1000);
//   }
//   // 获取锚点id
//   function getAnchor(str) {
//     return checkAnchor(str) ? str : "";
//   }
//   // 判断是否为特殊的hash值，也即是否为伪锚点
//   function checkAnchor(str) {
//     return str.indexOf("j_") == 0 ? true : false;
//   }
//   // 获取hash值
//   function getHash() {
//     return window.location.hash.substring(1);
//   }
//   // 获取dom对象
//   function getDom(id) {
//     return document.getElementById(id);
//   }
// })(window);

function AjaxInitForm(formId, btnId, isDialog, urlId) {
  var formObj = $('#' + formId);
  var btnObj = $("#" + btnId);
  var urlObj = $("#" + urlId);
  formObj.Validform({
    tiptype: 3,
    callback: function (form) {
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
      if (isDialog == 1) {
        JForx.Message(data.msg, 6, function () {
          if (data.url) {
            location.href = data.url;
          } else if (urlObj.length > 0 && urlObj.val() != "") {
            location.href = urlObj.val();
          } else {
            btnObj.prop("disabled", false);
          }
        });
      } else {
        if (data.url) {
          location.href = data.url;
        } else if (urlObj) {
          location.href = urlObj.val();
        } else {
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

function AddSlide() {
  if ($(window).width() < 767) {
    $(".cate").addClass('scrollnav');
    $('#JslideWrap').addClass("swiper-wrapper");
    var swipernav = new Swiper('.scrollnav', {
      freeMode: true,
      slidesPerView: 'auto',
      watchSlidesVisibility: true,
      freeModeSticky: true
    });
  }
}
/*
* 页面目录结构导航 v0.01
*/
function DirectoryNav($h, config) {
  this.opts = $.extend(true, {
    scrollThreshold: 0.5,    //滚动检测阀值 0.5在浏览器窗口中间部位
    scrollSpeed: 700,        //滚动到指定位置的动画时间
    scrollTopBorder: 500,    //滚动条距离顶部多少的时候显示导航，如果为0，则一直显示
    easing: 'swing',        //不解释
    delayDetection: 200,     //延时检测，避免滚动的时候检测过于频繁
    objId: 'body',
    scrollChange: function () { }
  }, config);
  this.$win = $(window);
  this.$h = $h;
  this.$pageNavList = "";
  this.$pageNavListLis = "";
  this.$curTag = "";
  this.$pageNavListLiH = "";
  this.offArr = [];
  this.curIndex = 0;
  this.scrollIng = false;
  this.init();
}

DirectoryNav.prototype = {
  init: function () {
    this.make();
    this.setArr();
    this.bindEvent();
  },
  make: function () {
    //生成导航目录结构,这是根据需求自己生成的。如果你直接在页面中输出一个结构那也挺好不用 搞js
    $(this.opts.objId).append('<div class="pcont-nav"><div class="directory-nav" id="directoryNav"><ul></ul><span class="cur-tag"></span><span class="c-top"></span><span class="c-bottom"></span><span class="line"></span></div></div>');
    var $hs = this.$h,
      $directoryNav = $("#directoryNav"),
      temp = [],
      index1 = 0,
      index2 = 0;
    $hs.each(function (index) {
      var $this = $(this),
        text = $this.text();
      if (this.tagName.toLowerCase() == 'h2') {
        index1++;
        if (index1 % 2 == 0) index2 = 0;
        temp.push('<li class="l1"><span class="c-dot"></span>' + index1 + '. <a class="l1-text">' + text + '</a></li>');
      } else {
        index2++;
        temp.push('<li class="l2">' + index1 + '.' + index2 + ' <a class="l2-text">' + text + '</a></li>');

      }
    });
    $directoryNav.find("ul").html(temp.join(""));

    //设置变量
    this.$pageNavList = $directoryNav;
    this.$pageNavListLis = this.$pageNavList.find("li");
    this.$curTag = this.$pageNavList.find(".cur-tag");
    this.$pageNavListLiH = this.$pageNavListLis.eq(0).height();
    if (!this.opts.scrollTopBorder) {
      //this.$pageNavList.show();
    }
  },
  setArr: function () {
    var This = this;
    this.$h.each(function () {
      var $this = $(this),
        offT = Math.round($this.offset().top);
      This.offArr.push(offT);
    });
  },
  posTag: function (top) {
    this.$curTag.css({ top: top + 'px' });
  },
  ifPos: function (st) {
    var offArr = this.offArr;
    //console.log(st);
    var windowHeight = Math.round(this.$win.height() * this.opts.scrollThreshold);
    for (var i = 0; i < offArr.length; i++) {
      if ((offArr[i] - windowHeight) < st) {
        var $curLi = this.$pageNavListLis.eq(i),
          tagTop = $curLi.position().top;
        $curLi.addClass("cur").siblings("li").removeClass("cur");
        this.curIndex = i;
        this.posTag(tagTop + this.$pageNavListLiH * 0.5);
        //this.curIndex = this.$pageNavListLis.filter(".cur").index();
        this.opts.scrollChange.call(this);
      }
    }
  },
  bindEvent: function () {
    var This = this,
      show = false,
      timer = 0;
    this.$win.on("scroll", function () {
      var $this = $(this);
      clearTimeout(timer);
      timer = setTimeout(function () {
        This.scrollIng = true;
        if ($this.scrollTop() > This.opts.scrollTopBorder) {
          if (!This.$pageNavListLiH) This.$pageNavListLiH = This.$pageNavListLis.eq(0).height();
          if (!show) {
            This.$pageNavList.fadeIn();
            show = true;
          }
          This.ifPos($(this).scrollTop());
        } else {
          if (show) {
            This.$pageNavList.fadeOut();
            show = false;
          }
        }
      }, This.opts.delayDetection);
    });

    this.$pageNavList.on("click", "li", function () {
      var $this = $(this),
        index = $this.index();
      This.scrollTo(This.offArr[index]);
    })
  },
  scrollTo: function (offset, callback) {
    var This = this;
    $('html,body').animate({
      scrollTop: offset
    }, this.opts.scrollSpeed, this.opts.easing, function () {
      This.scrollIng = false;
      callback && this.tagName.toLowerCase() == 'body' && callback();
    });
  }
};

//返回顶部
function scrollPageTop() {
  h = $(window).height(),
    t = $(document).scrollTop(),
    t > 100 ? $("#j_scroll_top").show() : $("#j_scroll_top").hide()
}

$(window).on("resize", function () {
  console.log('resize to...')
});

$(window).scroll(function () {
  scrollPageTop();
  if ($(this).scrollTop() > 300) {

  } else {

  }
});

$(function () {
  scrollPageTop();
  $(document).on("click", "#j-nav-trigger", function () {
    $('.navi').slideToggle();
    $(this).toggleClass("on");
  });
  $(document).on("click", ".menut", function () {
    $('.fbar-in-cont').fadeToggle();
    //$(".navi").stop().animate({"width":"250px"},0);
    $(this).toggleClass("on");
  });
  $(document).on("click", "#j_scroll_top", function () {
    $('html,body').animate({ scrollTop: 0 }, 500);
  });
  $("#scrollsidebar2").fix({ float: 'right', minStatue: false, skin: 'gray', durationTime: 1000 });

  $(document).on("mouseenter", ".dropmenu", function () {
    $(this).addClass("open");
  });
  $(document).on("mouseleave", ".dropmenu", function () {
    $(this).removeClass("open");
  });

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
  $(document).on("click", "#j-play-video", function () {
    JForx.Layer({
      type: 1,
      title: false,
      area: ['800px'],
      shade: 0.8,
      closeBtn: 0,
      shadeClose: true,
      content: $(".video-layer"),
      cancel: function (index, layero) {
        var video = $("#j-video");
        video.trigger('pause');
      }
    });
  });
  // $(document).on("click",'.anchor',function () {
  //   if (location.pathname.replace(/^\//, '') == this.pathname.replace(/^\//, '') && location.hostname == this.hostname) {
  //     var $target = $(this.hash);
  //     $target = $target.length && $target || $('[name=' + this.hash.slice(1) + ']');
  //     if ($target.length) {
  //       var targetOffset = $target.offset().top - 150;
  //       $('html,body').animate({
  //         scrollTop: targetOffset
  //       },1000);
  //       window.location.hash = this.hash;
  //       return false;
  //     }
  //   }
  // });
  // $(".fbar-wx").hover(function(){
  // 	$(this).find(".qrcode").show();	
  // },function(){
  // 	$(this).find(".qrcode").hide();
  // });
  // $(".fbar-tel").hover(function(){
  //     $(this).find("a").stop().animate({"width":"250px"},0);
  //     //$(this).find("a").stop().animate({"width":"280px"},200);
  // },function(){
  //     $(this).find("a").stop().animate({"width":"64px"},0);	
  //     //$(this).find("a").stop().animate({"width":"70px"},200);	
  // });	
  // $(".fbar-qq").hover(function(){
  // 	$(this).find("a").stop().animate({"width":"120px"},200);
  // },function(){
  // 	$(this).find("a").stop().animate({"width":"70px"},200);	
  // });
});
