//document.write("<div class=\"fpop hide\"><div class=\"in\"><div class=\"fbrand\"><img src=\"\/statics\/pics\/fbrand.png\"><\/div><div class=\"fjoin clr\"><div class=\"hd\"><a href=\"\/joinus\/index.html\" target=\"_blank\"><img src=\"\/statics\/pics\/fjoin-hd.png\"><\/a><\/div><div class=\"bd fjoin-form\"><form action=\"\/feedback\/save.aspx\" data-event=\"ajax\" method=\"post\" id=\"fpop-bjoin\"><div class=\"form-row\"><div class=\"form-g form-dist\"><div class=\"select-dist\" data-toggle=\"distpicker\" data-autoselect=\"1\"><select name=\"dat_provice\" data-province=\"重庆市\" datatype=\"*\" nullmsg=\"请选择所在省份\" errormsg=\"省份必选\" sucmsg=\"&nbsp;\"><\/select><select name=\"dat_city\" datatype=\"*\" nullmsg=\"请选择市\" errormsg=\"城市必选\" sucmsg=\"&nbsp;\"><\/select><select name=\"dat_district\" sucmsg=\"&nbsp;\"><\/select><\/div><\/div><div class=\"form-g clr\"><div class=\"item\"><input type=\"text\" id=\"uname\" name=\"dat_uname\" placeholder=\"您的姓名\" datatype=\"*\" nullmsg=\"必填\" sucmsg=\"&nbsp;\" errormsg=\"您的姓名\"><\/div><div class=\"item\"><input type=\"text\" id=\"utel\" name=\"dat_tel\" placeholder=\"您的电话\" datatype=\"m\" sucmsg=\"&nbsp;\" nullmsg=\"必填\"><\/div><div class=\"item\"><button class=\"fpop-form-btn\" type=\"submit\" id=\"js-bjoin\">申请加盟<\/button><input type=\"hidden\" name=\"cid\" value=\"111\"\/><\/div><\/div><\/div><\/div><\/div><\/div><div id=\"js_fpop_close\" class=\"close\"><\/div><\/div><div id=\"js_fpop_open\" class=\"fpop-mini\"><img src=\"\/statics\/pics\/fbrand-mini.png\"><\/div>");
$(function(){
    $(document).on('click',"#js_fpop_close",function(){
        $(".fpop").hide();
        $(".fpop-mini").show();
    });
    $(document).on('click',"#js_fpop_open",function(){
        $(this).hide();
        $(".fpop").show();
    });
    AjaxInitForm("fpop-bjoin", "js-bjoin", 1, "");
});