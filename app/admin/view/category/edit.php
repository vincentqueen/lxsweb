<?php if(!defined('IN_SDCMS')) exit;?><!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="renderer" content="webkit">
<title>编辑栏目</title>
<link rel="stylesheet" href="{WEB_ROOT}public/css/ui.css">
<link rel="stylesheet" href="{WEB_ROOT}public/admin/css/layout.css">
<script>var api_url="{U('upload/imagelist','type=3&multiple=1')}";</script>
<script src="{WEB_ROOT}public/js/jquery.js"></script>
<script src="{WEB_ROOT}public/js/ui.js?v=202409"></script>
<script src="{WEB_ROOT}public/admin/js/base.js"></script>
<script src="{WEB_ROOT}public/js/dropzone.js"></script>
<script src="{WEB_ROOT}public/editor/editor.js?v=202409"></script>
<script>
$(function()
{
	$("#t1").change(function()
	{
		switch ($(this).val())
		{
			case "-1":
				$("#skins,#seo,#domain").removeClass("dis");
				$("#listskin,#pagenum").addClass("dis");
				$(".inner_class").addClass("ui-hide");
				$("input[name=t2]").removeClass("radius-right-none");
				$("#cateurl").html("别名：");
				break;
			case "-2":
				$("#skins,#seo,#pagenum,#domain").addClass("dis");
				$(".inner_class").removeClass("ui-hide");
				$("input[name=t2]").addClass("radius-right-none");
				$("#cateurl").html("链接网址：");
				break;
			default:
				$("#skins,#seo,#pagenum,#listskin,#domain").removeClass("dis");
				$(".inner_class").addClass("ui-hide");
				$("input[name=t2]").removeClass("radius-right-none");
				$("#cateurl").html("别名：");
			break;
		}
		if($('input[name="way"]:checked ').val()==2)
		{
			$("#domain").addClass("dis");
		}
	});
	{if $catetype==-1}
		$("#skins,#seo,#domain").removeClass("dis");
		$("#listskin,#pagenum").addClass("dis");
		$(".inner_class").addClass("ui-hide");
		$("input[name=t2]").removeClass("radius-right-none");
		$("#cateurl").html("别名：");
	{elseif $catetype==-2}
		$("#skins,#seo,#pagenum,#domain").addClass("dis");
		$(".inner_class").removeClass("ui-hide");
		$("input[name=t2]").addClass("radius-right-none");
		$("#cateurl").html("链接网址：");
	{else}
		$("#skins,#seo,#pagenum,#listskin,#domain").removeClass("dis");
		$(".inner_class").addClass("ui-hide");
		$("input[name=t2]").removeClass("radius-right-none");
		$("#cateurl").html("别名：");
	{/if}
	$(".inner_class").change(function()
	{
		$("input[name=t2]").val($(this).val());
	})
})
</script>
</head>

<body>
    <div class="position">当前位置：<a href="{U('index')}">栏目管理</a>{$position} > <a href="{THIS_LOCAL}">编辑栏目</a></div>
    <div class="borders">
        <!---->
        <form class="ui-form" method="post">
        <div class="ui-tabs ui-tabs-white">
            <ul class="ui-tabs-nav">
                <li class="active"><a href="javascript:;">基本设置</a></li>
                <li id="seo"><a href="javascript:;">Seo设置</a></li>
                <li id="skins"><a href="javascript:;">模板设置</a></li>
                {if count($field)>0}<li id="extend"><a href="javascript:;">栏目扩展</a></li>{/if}
            </ul>
            <div class="ui-tabs-content">
                <div class="ui-tabs-pane active">
                    <!--1111-->
                     <div class="ui-form-group ui-row">
                        <label class="col-left ui-col-form-label">栏目名称：</label>
                        <div class="col-right">
                            <input type="text" name="t0" class="ui-form-ip" value="{$catename}" data-rule="栏目名称:required;">
                        </div>
                    </div>
                    <div class="ui-form-group ui-row">
                        <label class="col-left ui-col-form-label">栏目类型：</label>
                        <div class="col-right">
                            <select class="ui-form-ip"{if $total<=0} name="t1"{/if} id="t1" data-rule="栏目类型:required;"{if $total!=0} disabled{/if}>
                                <option value="">请选择栏目类型</option>
                                <option value="-1"{if $catetype==-1} selected{/if}>单页</option>
                                <option value="-2"{if $catetype==-2} selected{/if}>链接</option>
                                {sdcms:rs top="0" table="sd_model" where="islock=1" order="ordnum,id"}
                                <option value="{$rs[id]}"{if $catetype==$rs[id]} selected{/if}>{$rs[title]}</option>
                                {/sdcms:rs}
                            </select>
                            {if $total!=0}<input type="hidden" name="t1" value="{$catetype}">{/if}
                            <span class="input-tips">{if $total!=0}请先移动栏目下内容再修改{/if}</span>
                        </div>
                    </div>
                    <div class="ui-form-group ui-row">
                    	<label class="col-left ui-col-form-label" id="cateurl">别名：</label>
                        <div class="col-right ui-input-group">
                            <input type="text" name="t2" class="ui-form-ip" value="{$cateurl}">
                            <select class="ui-form-ip after ui-hide inner_class" style="max-width:120px;">
                            	<option value="">内部栏目</option>
                                <option value="book">留言</option>
                                <option value="sitemap">地图</option>
                                <option value="tags">标签</option>
                                <option value="bbs">社区</option>
                                <option value="user">会员</option>
                                <option value="reg">注册</option>
                                <option value="login">登录</option>
                            </select>
                        </div>
                    </div>
                    <div class="ui-form-group ui-row" id="domain">
                        <label class="col-left ui-col-form-label">绑定域名：</label>
                        <div class="col-right">
                            <input type="text" name="t15" class="ui-form-ip" value="{$catedomain}"><span class="input-tips">例：news.baidu.com{if $isbiz==0}，域名未授权，本功能无法使用。{/if}</span>
                        </div>
                    </div>
                    <div class="ui-form-group ui-row" id="pagenum">
                        <label class="col-left ui-col-form-label">分页数量：</label>
                        <div class="col-right">
                            <input type="text" name="t3" class="ui-form-ip" value="{$catepage}">
                            <span class="input-tips">每页显示的数量</span>
                        </div>
                    </div>
                    <div class="ui-form-group ui-row">
                        <label class="col-left ui-col-form-label">排序：</label>
                        <div class="col-right">
                            <input type="text" name="t4" class="ui-form-ip" value="{$catenum}">
                            <span class="input-tips">数字越小越靠前</span>
                        </div>
                    </div>
                    <div class="ui-form-group ui-row">
                        <label class="col-left ui-col-form-label">属性设置：</label>
                        <div class="col-right col-right-top">
                            <label class="ui-checkbox"><input type="checkbox" name="t5[]" value="1"{if $isshow==1} checked{/if}><i></i>导航显示</label>
                            <label class="ui-checkbox"><input type="checkbox" name="t13[]" value="1"{if $isblank==1} checked{/if}><i></i>新窗口</label>
                            <label class="ui-checkbox"><input type="checkbox" name="t14[]" value="1"{if $isfilter==1} checked{/if}><i></i>列表筛选</label>
                        </div>
                    </div>
                    <div class="ui-form-group ui-row">
                        <label class="col-left ui-col-form-label">内容扩展：</label>
                        <div class="col-right">
                            <select class="ui-form-ip" name="t11">
                                <option value="0">请选择内容扩展</option>
                                {sdcms:rs top="0" table="sd_extend" where="islock=1" order="ordnum,id"}
                                <option value="{$rs[id]}"{if $cate_extend==$rs[id]} selected{/if}>{$rs[title]}</option>
                                {/sdcms:rs}
                            </select>
                        </div>
                    </div>
                    <div class="ui-form-group ui-row{if C('user_open')==2} dis{/if}">
                        <label class="col-left ui-col-form-label">阅读权限：</label>
                        <div class="col-right col-right-top">
                            {sdcms:rs top="0" table="sd_user_group" order="ordnum,gid"}
                            <label class="ui-checkbox">
                                <input type="checkbox" name="t16[]" value="{$rs[gid]}"{if in_array($rs[gid],explode(',',$cate_groupid))} checked{/if}><i></i>{$rs[gname]}
                            </label>
                            {/sdcms:rs}
                        </div>
                    </div>
                    <div class="ui-form-group ui-row">
                        <label class="col-left ui-col-form-label">应用到子栏目</label>
                        <div class="col-right col-right-top">
                            <label class="ui-checkbox"><input type="checkbox" name="t12[]" value="1"><i></i>模板</label>
                            <label class="ui-checkbox"><input type="checkbox" name="t12[]" value="2"><i></i>分页数量</label>
                            <label class="ui-checkbox"><input type="checkbox" name="t12[]" value="3"><i></i>内容扩展</label>
                            <label class="ui-checkbox"><input type="checkbox" name="t12[]" value="4"><i></i>列表筛选</label>
                            <label class="ui-checkbox"><input type="checkbox" name="t12[]" value="5"><i></i>阅读权限</label>
                        </div>
                    </div>
                    <!--1111-->
                </div>
                
                <div class="ui-tabs-pane">
                    <!--2222-->
                    <div class="ui-form-group ui-row">
                        <label class="col-left ui-col-form-label">优化标题：</label>
                        <div class="col-right">
                            <input type="text" name="t6" class="ui-form-ip" value="{$catetitle}">
                        </div>
                    </div>
                    <div class="ui-form-group ui-row">
                        <label class="col-left ui-col-form-label">关键字：</label>
                        <div class="col-right">
                            <input type="text" name="t7" class="ui-form-ip" value="{$catekey}">
                        </div>
                    </div>
                    <div class="ui-form-group ui-row">
                        <label class="col-left ui-col-form-label">描述：</label>
                        <div class="col-right">
                            <textarea name="t8" rows="4" class="ui-form-ip ui-form-limit" data-max="255">{$catedesc}</textarea>
                            <div class="ui-form-limit-text"><span>{mb_strlen($catedesc)}</span>/255</div>
                        </div>
                    </div>
                    <!--2222-->
                </div>
                
                <div class="ui-tabs-pane">
                    <!--3333-->
                    <div class="ui-form-group ui-row" id="listskin">
                        <label class="col-left ui-col-form-label">列表模板：</label>
                        <div class="col-right">
                        	<div class="ui-input-group">
                            	<input type="text" name="t9" id="t9" class="ui-form-ip radius-right-none" value="{$catelist}">
                                <a class="after template ui-icon-select" data-name="t9" data-url="{U('theme/template')}" title="选择">选择</a>
                            </div>
                        </div>
                    </div>
                    <div class="ui-form-group ui-row">
                        <label class="col-left ui-col-form-label">内容模板：</label>
                        <div class="col-right">
                        	<div class="ui-input-group">
                            	<input type="text" name="t10" id="t10" class="ui-form-ip radius-right-none" value="{$cateshow}">
                                <a class="after template ui-icon-select" data-name="t10" data-url="{U('theme/template')}" title="选择">选择</a>
                            </div>
                        </div>
                    </div>
                    <!--3333-->
                </div>
                
                <div class="ui-tabs-pane">
                    <!--4444-->
                    {foreach $field as $rs}
                    <div class="ui-form-group ui-row"{if $rs['field_type']==7} style="display:none;"{/if}>
                        <label class="col-left ui-col-form-label">{$rs['field_title']}：</label>
                        <div class="{if in_array($rs['field_type'],[12,13,15])}col-right-full{else}col-right{/if}{if in_array($rs['field_type'],[9,10])} col-form-label{/if}">
                            {switch $rs['field_type']}
                                {case 1}<input type="text" name="{$rs['field_key']}" id="{$rs['field_key']}" class="ui-form-ip"{if $rs['field_length']!=0} maxlength="{$rs['field_length']}"{/if} value="{$record[$rs['field_key']]}" {deal_rule($rs['field_rule'],$rs['field_title'])}>{/case}
                                {case 2}<input type="text" name="{$rs['field_key']}" id="{$rs['field_key']}" class="ui-form-ip datepick"{if $rs['field_length']!=0} maxlength="{$rs['field_length']}"{/if} value="{date('Y-m-d',$record[$rs['field_key']])}" readonly {deal_rule($rs['field_rule'],$rs['field_title'])}>{/case}
                                {case 3}<input type="text" name="{$rs['field_key']}" id="{$rs['field_key']}" class="ui-form-ip"{if $rs['field_length']!=0} maxlength="{$rs['field_length']}"{/if} value="{$record[$rs['field_key']]}" {deal_rule($rs['field_rule'],$rs['field_title'])}>{/case}
                                {case 4}<input type="text" name="{$rs['field_key']}" id="{$rs['field_key']}" class="ui-form-ip"{if $rs['field_length']!=0} maxlength="{$rs['field_length']}"{/if} value="{$record[$rs['field_key']]}" {deal_rule($rs['field_rule'],$rs['field_title'])}>{/case}
                                {case 5}
                                <div class="ui-input-group">
                                <input type="text" name="{$rs['field_key']}" id="{$rs['field_key']}" class="ui-form-ip radius-right-none"{if $rs['field_length']!=0} maxlength="{$rs['field_length']}"{/if} value="{$record[$rs['field_key']]}" {deal_rule($rs['field_rule'],$rs['field_title'])}>
                                <a class="after fm-choose ui-icon-cloud-upload radius-none" data-name="{$rs['field_key']}" data-url="{U('upload/imageupload','type='.$rs['field_upload_type'].'&&multiple=0&thumb=0&water='.C('water_piclist').'')}" data-type="{$rs['field_upload_type']}" data-multiple="0" title="上传">上传</a>
                                    <a class="after fm-choose ui-icon-select{if $rs['field_upload_type']==1} radius-none{/if}" data-name="{$rs['field_key']}" data-url="{U('upload/imagelist','type='.$rs['field_upload_type'].'&multiple=0&thumb=0&water=0')}" data-type="{$rs['field_upload_type']}" data-multiple="0" title="选择">选择</a>
                                    {if $rs['field_upload_type']==1}<a class="after ui-lightbox ui-icon-zoomin" data-id="{$rs['field_key']}"{if $rs['field_upload_type']==2} data-mode="video"{/if} data-name="lightbox-{$rs['field_key']}" title="{$rs['field_title']}">预览</a>{/if}
                                </div>
                                {/case}
                                {case 6}<input type="password" name="{$rs['field_key']}" id="{$rs['field_key']}"{if $rs['field_length']!=0} maxlength="{$rs['field_length']}"{/if} class="ui-form-ip" value="{$record[$rs['field_key']]}" {deal_rule($rs['field_rule'],$rs['field_title'])}>{/case}
                                {case 7}<input type="text" name="{$rs['field_key']}" id="{$rs['field_key']}"{if $rs['field_length']!=0} maxlength="{$rs['field_length']}"{/if} class="ui-form-ip" value="{$record[$rs['field_key']]}">{/case}
                                {case 8}<textarea name="{$rs['field_key']}" class="ui-form-ip" id="{$rs['field_key']}" rows="3" cols="50" {deal_rule($rs['field_rule'],$rs['field_title'])}>{$record[$rs['field_key']]}</textarea>{/case}
                                {case 9}
                                {php $arr=explode(",",$rs['field_list'])}
                                {foreach $arr as $j=>$key}
                                {php $data=explode("|",$key)}
                                	{if $rs['field_radio']==2}<div class="input-group-check">{/if}
                                    <label class="ui-radio"><input type="radio" name="{$rs['field_key']}" value="{$data[1]}"{deal_rule($rs['field_rule'],$rs['field_title'])} {if $record[$rs['field_key']]=="".$data[1].""} checked{/if}>
                                    <i></i>{$data[0]}</label>
                                    {if $rs['field_radio']==2}</div>{/if}
                                {/foreach}
                                {/case}
                                {case 10}
                                {php $arr=explode(",",$rs['field_list'])}
                                {foreach $arr as $j=>$key}
                                {php $data=explode("|",$key)}
                                	 <label class="ui-checkbox"><input type="checkbox" name="{$rs['field_key']}[]" value="{$data[1]}" {deal_rule($rs['field_rule'],$rs['field_title'])} {if stristr(",".$record[$rs['field_key']].",",",".$data[1].",")} checked{/if}><i></i>{$data[0]}</label>
                                {/foreach}
                                {/case}
                                {case 11}
                                <select name="{$rs['field_key']}" id="{$rs['field_key']}" class="ui-form-ip" {deal_rule($rs['field_rule'],$rs['field_title'])}>
                                {php $arr=explode(",",$rs['field_list'])}
                                {foreach $arr as $j=>$key}
                                {php $data=explode("|",$key)}
                                <option value="{$data[1]}" {if $record[$rs['field_key']]=="".$data[1].""} selected{/if}>{$data[0]}</option>
                                {/foreach}
                                </select>
                                {/case}
                                {case 12}<script id="{$rs['field_key']}" name="{$rs['field_key']}" class="ui-editor" type="text/plain" {if $rs['field_editor']==1}data-toolbar="mini"{/if}>{$record[$rs['field_key']]}</script>
                                {/case}
                        {/switch}
                        {if $rs['field_tips']<>''}<span class="input-tips">{$rs['field_tips']}</span>{/if}
                        </div>
                    </div>
                    {/foreach}
                    <!--4444-->
                </div>
                
            </div>
        </div>
        
        <div class="ui-form-group ui-mt">
        	<input type="hidden" name="token" value="{$token}">
            <button type="submit" class="ui-btn ui-btn-info ui-mr-sm">保存</button>
            <button type="button" class="ui-btn ui-back">返回</button>
        </div>
        </form>
        <!---->
    </div>
<script src="{WEB_ROOT}public/datepick/laydate.js"></script>
<script>
$(function()
{
	lay('.datepick').each(function()
	{
		laydate.render(
		{
			elem:this,
			trigger:'click'
		});
	});
	$(".ui-editor").each(function()
	{
		var toolbar=$(this).data("toolbar");
		var id=$(this).attr("id");
		$("#"+id).editor({toolbar:toolbar,upload:'{U("upload/index")}',url:api_url,save:'{U("upload/outimage")}'});
	});
	$(".ui-form").form(
	{
		type:2,
		result:function(form)
		{
			$.ajax(
			{
                type:'post',
                cache:false,
                dataType:'json',
                url:'{THIS_LOCAL}',
                data:$(form).serialize(),
                error:function(e){alert(e.responseText);},
                success:function(d)
                {
                    if(d.state=='success')
                    {
                        sdcms.success(d.msg);
                        setTimeout(function(){location.href='{U("index","fid=".$fid."")}';},1500);
                    }
                    else
                    {
                        sdcms.error(d.msg);
                    }
                }
            });
		}
	});
});
</script>
</body>
</html>