<?php if(!defined('IN_SDCMS')) exit;?><!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="renderer" content="webkit">
<title>添加内容</title>
<link rel="stylesheet" href="{WEB_ROOT}public/css/ui.css">
<link rel="stylesheet" href="{WEB_ROOT}public/select/select.css">
<link rel="stylesheet" href="{WEB_ROOT}public/admin/css/layout.css">
<script>var api_url="{U('upload/imagelist','type=3&multiple=1')}";</script>
<script src="{WEB_ROOT}public/js/jquery.js"></script>
<script src="{WEB_ROOT}public/js/ui.js?v=202409"></script>
<script src="{WEB_ROOT}public/select/select.js"></script>
<script src="{WEB_ROOT}public/js/dropzone.js"></script>
<script src="{WEB_ROOT}public/js/sortable.min.js"></script>
<script src="{WEB_ROOT}public/admin/js/base.js"></script>
<script src="{WEB_ROOT}public/editor/editor.js?v=202409"></script>
</head>

<body>
	
    <div class="position">当前位置：<a href="{U('lists')}">内容管理</a>{get_content_postion($classid)} > <a href="{U('add','classid='.$classid.'')}">添加内容</a></div>
    <div class="borders">
        <!---->
        <form class="ui-form" method="post">
        <div class="ui-tabs ui-tabs-white">
            <ul class="ui-tabs-nav">
            	{foreach $group as $index=>$key}
                {php $arr=explode("|",$key)}
                <li{if $index==0} class="active"{/if}><a href="javascript:void(0)">{$arr[0]}</a></li>
                {/foreach}
                {if count($edata)>0}
                <li><a href="javascript:void(0)">内容扩展</a></li>{/if}
            </ul>
            
             <div class="ui-tabs-content">
                
                {foreach $group as $index=>$key}
                {php list(,$num)=explode("|",$key)}
                <div class="ui-tabs-pane{if $index==0} active{/if}">
                    <!--aaa-->
                    {if $index==0}
                    <div class="ui-form-group ui-row{if C('content_subid')==0} dis{/if}">
                        <label class="col-left ui-col-form-label">发布到其他栏目：</label>
                        <div class="col-right">
                            <select name="subid[]" placeholder="请选择" class="ui-form-ip selectbox" multiple>
                            {php $cate=C('category')}
                            {foreach $cate as $jc=>$rs}
                                {if get_admin_info('pid')!=0}
                                    {php $lever=explode(',',CATE_LEVER)}
                                    {if in_array($jc,$lever)}
                                        <option value="{$rs['cateid']}"{if $rs['catetype']<0 || strpos($rs['sonid'],',') || $rs['cateid']==$classid || $rs['catetype']!=$model_id} disabled{/if}>{str_repeat("　",$rs['depth'])}{$rs['catename']}</option>
                                    {/if}
                                {else}
                                    <option value="{$rs['cateid']}"{if $rs['catetype']<0 || strpos($rs['sonid'],',') || $rs['cateid']==$classid || $rs['catetype']!=$model_id} disabled{/if}>{str_repeat("　",$rs['depth'])}{$rs['catename']}</option>
                                {/if}
                            {/foreach}
                            </select>
                            {if $isbiz==0}<span class="input-tips">域名未授权，本功能无法使用。</span>{/if}
                        </div>
                    </div>
                    {/if}
                    {if isset($field[$num])}
                    {foreach $field[$num] as $rs}
                    
                    {if $rs['field_key']=='createdate'}
                    <div class="ui-form-group ui-row">
                        <label class="col-left ui-col-form-label">定时发布：</label>
                        <div class="col-right col-right-top">
                            <label class="ui-radio"><input type="radio" name="isauto" value="0" checked><i></i>否</label>
                            <label class="ui-radio"><input type="radio" name="isauto" value="1" ><i></i>是</label>                                                        							
                        </div>
                    </div>
                    {/if}
                    
                    {if $rs['field_key']=='islock'}
                    <div class="ui-form-group ui-row{if C('user_open')==2 || $leverstate==0} dis{/if}">
                        <label class="col-left ui-col-form-label">阅读权限：</label>
                        <div class="col-right col-right-top">
                            {sdcms:rg top="0" table="sd_user_group" order="ordnum,gid"}
                            <label class="ui-checkbox"><input type="checkbox" name="view_lever[]" value="{$rg[gid]}"><i></i>{$rg[gname]}</label>
                            {/sdcms:rg}
                        </div>
                    </div>
                    {/if}
                    
                    {php $islockshow=1}
                    {if $rs['field_key']=='islock' && $pagelock==1}
                    {php $islockshow=0}
                    {/if}
                    {if $islockshow==1}
                    <div class="ui-form-group ui-row"{if $rs['field_type']==7} style="display:none;"{/if}>
                        <label class="col-left ui-col-form-label">{$rs['field_title']}：</label>
                        <div class="{if in_array($rs['field_type'],[12,13,15])}col-right-full{else}col-right{/if}{if $rs['field_type']==9} col-right-top{/if}">
                            {switch $rs['field_type']}
                            {case 1}
                            {if in_array($rs['field_key'],['url','tags','showskin'])}<div class="ui-input-group">{/if}
                            <input type="text" name="{$rs['field_key']}" id="{$rs['field_key']}" class="ui-form-ip{if in_array($rs['field_key'],['url','tags','showskin'])} radius-right-none{/if}"{if $rs['field_length']!=0} maxlength="{$rs['field_length']}"{/if} value="{deal_default($rs['field_default'])}" {deal_rule($rs['field_rule'],$rs['field_title'])}>
                            {if $rs['field_key']=='url'}
                            <a class="after fm-choose ui-icon-cloud-upload radius-none" data-name="{$rs['field_key']}" data-url="{U('upload/imageupload','type=3&multiple=0&thumb=0&water='.C('water_piclist').'')}" data-type="{$rs['field_upload_type']}" data-multiple="0" title="上传">上传</a>
                            <a class="after fm-choose ui-icon-select" data-name="{$rs['field_key']}" data-url="{U('upload/imagelist','type=3')}" data-type="3" data-multiple="0" title="选择">选择</a>
                            {/if}
                            {if $rs['field_key']=='tags'}
                            <a class="after ui-icon-select fm-tags" data-name="{$rs['field_key']}" data-url="{U('taglist')}" title="选择">选择</a>
                            {/if}
                            {if $rs['field_key']=='showskin'}
                            <a class="after ui-icon-select template" data-name="{$rs['field_key']}" data-url="{U('theme/template')}" title="选择">选择</a>
                            {/if}
                            {if in_array($rs['field_key'],['url','tags','showskin'])}</div>{/if}
                            {/case}
                            {case 2}<input type="text" name="{$rs['field_key']}" id="{$rs['field_key']}" class="ui-form-ip{if $rs['field_key']!=='createdate'} datepick{else} datepick-time{/if}"{if $rs['field_length']!=0} maxlength="{$rs['field_length']}"{/if} value="{deal_default($rs['field_default'])}" {deal_rule($rs['field_rule'],$rs['field_title'])}>{/case}
                            {case 3}<input type="text" name="{$rs['field_key']}" id="{$rs['field_key']}" class="ui-form-ip"{if $rs['field_length']!=0} maxlength="{$rs['field_length']}"{/if} value="{deal_default($rs['field_default'])}" {deal_rule($rs['field_rule'],$rs['field_title'])}>{/case}
                            {case 4}<input type="text" name="{$rs['field_key']}" id="{$rs['field_key']}" class="ui-form-ip"{if $rs['field_length']!=0} maxlength="{$rs['field_length']}"{/if} value="{deal_default($rs['field_default'])}" {deal_rule($rs['field_rule'],$rs['field_title'])}>{/case}
                            {case 5}
                            <div class="ui-input-group">
                            <input type="text" name="{$rs['field_key']}" id="{$rs['field_key']}" class="ui-form-ip radius-right-none"{if $rs['field_length']!=0} maxlength="{$rs['field_length']}"{/if} value="{deal_default($rs['field_default'])}" {deal_rule($rs['field_rule'],$rs['field_title'])}>
                            <a class="after fm-choose ui-icon-cloud-upload radius-none" data-name="{$rs['field_key']}" data-url="{U('upload/imageupload','type='.$rs['field_upload_type'].'&multiple=0&thumb=0&water='.C('water_piclist').'')}" data-type="{$rs['field_upload_type']}" data-multiple="0" title="上传">上传</a>
                            <a class="after fm-choose ui-icon-select radius-none" data-name="{$rs['field_key']}" data-url="{U('upload/imagelist','type='.$rs['field_upload_type'].'')}" data-type="{$rs['field_upload_type']}" data-multiple="0" title="选择">选择</a>
                            <a class="after ui-lightbox ui-icon-zoomin" data-id="{$rs['field_key']}"{if $rs['field_upload_type']==2} data-mode="video"{/if} data-name="lightbox-pic" title="{$rs['field_title']}">预览</a>
                            </div>
                            {/case}
                            {case 6}<input type="password" name="{$rs['field_key']}" id="{$rs['field_key']}" class="ui-form-ip"{if $rs['field_length']!=0} maxlength="{$rs['field_length']}"{/if} value="{deal_default($rs['field_default'])}" {deal_rule($rs['field_rule'],$rs['field_title'])}>{/case}
                            {case 7}<input type="text" name="{$rs['field_key']}" id="{$rs['field_key']}" class="ui-form-ip"{if $rs['field_length']!=0} maxlength="{$rs['field_length']}"{/if} value="{deal_default($rs['field_default'])}">{/case}
                            {case 8}<textarea name="{$rs['field_key']}" class="ui-form-ip" id="{$rs['field_key']}" rows="3" cols="50" {deal_rule($rs['field_rule'],$rs['field_title'])}>{deal_default($rs['field_default'])}</textarea>{/case}
                            {case 9}
                                {php $arr=explode(",",$rs['field_list'])}
                                {foreach $arr as $j=>$key}
                                {php $data=explode("|",$key)}
                                    {if $rs['field_radio']==2}<div class="input-group-check">{/if}
                                    <label class="ui-radio"><input type="radio" name="{$rs['field_key']}" value="{$data[1]}" {deal_rule($rs['field_rule'],$rs['field_title'],1)} {if $rs['field_default']=="".$data[1].""} checked{/if}><i></i>{$data[0]}</label>
                                     {if $rs['field_radio']==2}</div>{/if}
                                {/foreach}
                            {/case}
                            {case 10}
                            <div class="ui-pt"></div>
                            {php $arr=explode(",",$rs['field_list'])}
                            {foreach $arr as $j=>$key}
                            {php $data=explode("|",$key)}
                            <label class="ui-checkbox"><input type="checkbox" name="{$rs['field_key']}[]"  value="{$data[1]}" {deal_rule($rs['field_rule'],$rs['field_title'],1)} {if stristr(",".$rs['field_default'].",",",".$data[1].",")} checked{/if}><i></i>{$data[0]}</label>
                            {/foreach}
                            {/case}
                            {case 11}
                            <select name="{$rs['field_key']}" id="{$rs['field_key']}" class="ui-form-ip" {deal_rule($rs['field_rule'],$rs['field_title'])}>
                            <option value="">请选择{$rs['field_title']}</option>
                            {php $arr=explode(",",$rs['field_list'])}
                            {foreach $arr as $j=>$key}
                            {php $data=explode("|",$key)}
                            <option value="{$data[1]}" {if $rs['field_default']=="".$data[1].""} selected{/if}>{$data[0]}</option>
                            {/foreach}
                            </select>
                            {/case}
                            {case 12}<script id="{$rs['field_key']}" name="{$rs['field_key']}" class="ui-editor" type="text/plain" {if $rs['field_editor']==1}data-toolbar="mini"{/if}></script>
                            {if $rs['field_key']=='content'}
                            <label class="ui-checkbox ui-mt"><input type="checkbox" name="savepic" id="savepic" value="1"><i></i>提取正文中第1张图片为缩略图</label>
                            {/if}
                            {/case}
							{case 13}
                            <div class="ui-btn-group ui-mt-sm">
                                <a class="ui-btn-group-item fm-choose ui-icon-cloud-upload" data-name="{$rs['field_key']}" data-url="{U('upload/imageupload','type=1&multiple=1&thumb=0&water='.C('water_piclist').'')}" data-type="{$rs['field_upload_type']}" data-multiple="1" title="上传">上传</a>
                                <a class="ui-btn-group-item fm-choose ui-icon-select" data-name="{$rs['field_key']}" data-url="{U('upload/imagelist','type=1&multiple=1&iseditor='.C('water_piclist').'')}" data-type="{$rs['field_upload_type']}" data-multiple="1" title="选择">选择</a>
                            </div>
							<div class="imagelist">
								<ul id="list_{$rs['field_key']}"></ul>
							</div>
							{/case}
							{case 14}
                            <select name="{$rs['field_key']}" id="{$rs['field_key']}" class="ui-form-ip" {deal_rule($rs['field_rule'],$rs['field_title'])}>
                            {php $table=$rs['field_table']}
							{php $join=$rs['field_join']}
							{php $where=$rs['field_where']}
							{php $order=$rs['field_order']}
							{php $value=$rs['field_value']}
							{php $label=$rs['field_label']}
							{php $default=$rs['field_default']}
							{if $where==''}
							{php $where='1=1'}
							{/if}
							{if $order==''}
							{php $order="$value desc"}
							{/if}
							<option value="">请选择{$rs['field_title']}</option>
							{sdcms:ra top="0" table="$table" join="$join" where="$where" order="$order"}
                            <option value="{$ra['.$value.']}"{if $default==$ra['.$value.']} selected{/if}>{$ra['.$label.']}</option>
							{/sdcms:ra}
                            </select>
							{/case}
                            {case 15}
                            <div class="ui-btn-group ui-mt-sm">
                            	<a class="ui-btn-group-item ui-icon-plus downlistadd" data-name="{$rs['field_key']}">添加</a>
                                <a class="ui-btn-group-item fm-choose ui-icon-cloud-upload" data-name="{$rs['field_key']}" data-url="{U('upload/imageupload','type='.$rs['field_upload_type'].'&multiple=1&thumb=0&water='.C('water_piclist').'')}" data-type="{$rs['field_upload_type']}" data-multiple="2" title="上传">上传</a>
                                <a class="ui-btn-group-item fm-choose ui-icon-select" data-name="{$rs['field_key']}" data-url="{U('upload/imagelist','type='.$rs['field_upload_type'].'&multiple=1&iseditor='.C('water_piclist').'')}" data-type="{$rs['field_upload_type']}" data-multiple="2" title="选择">选择</a>
                            </div>
                            <table class="ui-table ui-table-border ui-mt ui-w-auto">
                                <thead class="ui-thead-gray">
                                    <tr>
                                        <th width="150">名称</th>
                                        <th width="400">下载地址</th>
                                        <th width="200">操作</th>
                                    </tr>
                                </thead>
                                <tbody id="downlist_{$rs['field_key']}">
                                </tbody>
                            </table>
							<div class="downlist">
								<ul id="list_{$rs['field_key']}"></ul>
							</div>
							{/case}
                            {/switch}
                            {if $rs['field_tips']<>''}<span class="input-tips">{$rs['field_tips']}</span>{/if}
                        </div>
                    </div>
                    {/if}
                    {/foreach}
                    
                    {/if}
                    <!--aaa-->
                </div>
                {/foreach}
				{if count($edata)>0}
                <div class="ui-tabs-pane">
					{foreach $edata as $rs}
					<div class="ui-form-group ui-row">
                        <label class="col-left ui-col-form-label">{$rs['field_title']}：</label>
                        <div class="col-right">
							{switch $rs['field_type']}
                            {case 1}<input type="text" name="extend[{$rs['field_key']}]" id="{$rs['field_key']}" class="ui-form-ip" value="{deal_default($rs['field_default'])}" >{/case}
                            {case 2}
                            <select name="extend[{$rs['field_key']}]" id="{$rs['field_key']}" class="ui-form-ip">
                            <option value="">请选择{$rs['field_title']}</option>
                            {php $arr=explode(",",$rs['field_list'])}
                            {foreach $arr as $j=>$key}
                            <option value="{$key}" {if $rs['field_default']=="".$key.""} selected{/if}>{$key}</option>
                            {/foreach}
                            </select>
                            {/case}
							{/switch}
						</div>
					</div>
					{/foreach}
				</div>
				{/if}
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
	{if C('content_subid')==1}
	{no}
	$('.selectbox').SumoSelect(
	{ 
		csvDispCount:4, 
		captionFormat:'已选择：{0} 个', 
	});
	{/no}
	{/if}
	lay('.datepick').each(function()
	{
		laydate.render(
		{
			elem:this,
			trigger:'click'
		});
	});
	lay('.datepick-time').each(function()
	{
		laydate.render(
		{
			elem:this,
			type:'datetime',
			trigger:'click'
		});
	});
	{foreach $draglist as $key=>$val}
	Sortable.create($("#list_{$val}")[0],{animation:400});
	{/foreach}
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
                        setTimeout(function(){location.href='{U('lists','classid='.$classid.'')}';},1500);
                    }
                    else
                    {
                        sdcms.error(d.msg);
                    }
                }
            });
		}
	});
})
</script>
</body>
</html>