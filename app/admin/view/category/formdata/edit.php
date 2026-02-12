<?php if(!defined('IN_SDCMS')) exit;?><!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="renderer" content="webkit">
<title>编辑{$title}</title>
<link rel="stylesheet" href="{WEB_ROOT}public/css/ui.css">
<link rel="stylesheet" href="{WEB_ROOT}public/admin/css/layout.css">
<script>var api_url="{U('upload/imagelist','type=3&multiple=1')}";</script>
<script src="{WEB_ROOT}public/js/jquery.js"></script>
<script src="{WEB_ROOT}public/js/ui.js?v=202409"></script>
<script src="{WEB_ROOT}public/admin/js/base.js"></script>
<script src="{WEB_ROOT}public/js/dropzone.js"></script>
<script src="{WEB_ROOT}public/js/sortable.min.js"></script>
<script src="{WEB_ROOT}public/editor/editor.js?v=202409"></script>
</head>

<body>
    <div class="position">当前位置：栏目管理 > <a href="{U('form/index')}">表单管理</a> > <a href="{U('index',"fid=".$fid."")}">{$title}管理</a> > <a href="{THIS_LOCAL}">编辑{$title}</a></div>
    <div class="border">
        <!---->
        <form class="ui-form" method="post">
        	<div class="form-subject">编辑{$title}</div>
            {foreach $field as $rs}
            <div class="ui-form-group ui-row"{if $rs['field_type']==7} style="display:none;"{/if}>
                <label class="col-left ui-col-form-label">{$rs['field_title']}：</label>
                <div class="{if in_array($rs['field_type'],[12,13])}col-right-full{else}col-right{/if}{if $rs['field_type']==9} col-right-top{/if}">
                    {switch $rs['field_type']}
                        {case 1}<input type="text" name="{$rs['field_key']}" id="{$rs['field_key']}" class="ui-form-ip"{if $rs['field_length']!=0} maxlength="{$rs['field_length']}"{/if} value="{$record[$rs['field_key']]}" {deal_rule($rs['field_rule'],$rs['field_title'])}>{/case}
                        {case 2}<input type="text" name="{$rs['field_key']}" id="{$rs['field_key']}" class="ui-form-ip datepick"{if $rs['field_length']!=0} maxlength="{$rs['field_length']}"{/if} value="{date('Y-m-d',$record[$rs['field_key']])}"  readonly {deal_rule($rs['field_rule'],$rs['field_title'])}>{/case}
                        {case 3}<input type="text" name="{$rs['field_key']}" id="{$rs['field_key']}" class="ui-form-ip"{if $rs['field_length']!=0} maxlength="{$rs['field_length']}"{/if} value="{$record[$rs['field_key']]}" {deal_rule($rs['field_rule'],$rs['field_title'])}>{/case}
                        {case 4}<input type="text" name="{$rs['field_key']}" id="{$rs['field_key']}" class="ui-form-ip"{if $rs['field_length']!=0} maxlength="{$rs['field_length']}"{/if} value="{$record[$rs['field_key']]}" {deal_rule($rs['field_rule'],$rs['field_title'])}>{/case}
                        {case 5}
                        <div class="ui-input-group">
                        <input type="text" name="{$rs['field_key']}" id="{$rs['field_key']}" class="ui-form-ip radius-right-none"{if $rs['field_length']!=0} maxlength="{$rs['field_length']}"{/if} value="{$record[$rs['field_key']]}" {deal_rule($rs['field_rule'],$rs['field_title'])}>
                        <a class="after fm-choose ui-icon-cloud-upload radius-none" data-name="{$rs['field_key']}" data-url="{U('upload/imageupload','type='.$rs['field_upload_type'].'&multiple=0&thumb=0&water='.C('water_piclist').'')}" data-type="{$rs['field_upload_type']}" data-multiple="0" title="上传">上传</a>
                            <a class="after fm-choose ui-icon-select{if $rs['field_upload_type']==1} radius-none{/if}" data-name="{$rs['field_key']}" data-url="{U('upload/imagelist','type='.$rs['field_upload_type'].'&multiple=0')}" data-type="{$rs['field_upload_type']}" data-multiple="0" title="选择">选择</a>
                            {if $rs['field_upload_type']<3}<a class="after ui-lightbox ui-icon-zoomin" data-id="{$rs['field_key']}"{if $rs['field_upload_type']==2} data-mode="video"{/if} data-name="lightbox-{$rs['field_key']}" title="{$rs['field_title']}">预览</a>{/if}
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
                            <label class="ui-radio"><input type="radio" name="{$rs['field_key']}" value="{$data[1]}" {deal_rule($rs['field_rule'],$rs['field_title'],1)} {if $record[$rs['field_key']]=="".$data[1].""} checked{/if}><i></i>{$data[0]}</label>
                             {if $rs['field_radio']==2}</div>{/if}
                        {/foreach}
                        {/case}
                        {case 10}
                        {php $arr=explode(",",$rs['field_list'])}
                        {foreach $arr as $j=>$key}
                        {php $data=explode("|",$key)}
                        <label class="ui-checkbox"><input type="checkbox" name="{$rs['field_key']}[]" value="{$data[1]}" {deal_rule($rs['field_rule'],$rs['field_title'],1)} {if stristr(",".$record[$rs['field_key']].",",",".$data[1].",")} checked{/if}><i></i>{$data[0]}</label>
                        {/foreach}
                        {/case}
                        {case 11}
                        <select name="{$rs['field_key']}" id="{$rs['field_key']}" class="ui-form-ip" {deal_rule($rs['field_rule'],$rs['field_title'])}>
                        <option value="">请选择{$rs['field_title']}</option>
                        {php $arr=explode(",",$rs['field_list'])}
                        {foreach $arr as $j=>$key}
                        {php $data=explode("|",$key)}
                        <option value="{$data[1]}" {if $record[$rs['field_key']]=="".$data[1].""} selected{/if}>{$data[0]}</option>
                        {/foreach}
                        </select>
                        {/case}
                        {case 12}<script id="{$rs['field_key']}" name="{$rs['field_key']}" class="ui-editor" type="text/plain" {if $rs['field_editor']==1}data-toolbar="mini"{/if}>{$record[$rs['field_key']]}</script>
                        {/case}
                        {case 13}
                        {php $data=jsdecode($record[$rs['field_key']],1)}
                        <div class="ui-btn-group ui-mt-sm">
                            <a class="ui-btn-group-item fm-choose ui-icon-cloud-upload" data-name="{$rs['field_key']}" data-url="{U('upload/imageupload','type=1&multiple=1&thumb=0&water='.C('water_piclist').'')}" data-type="{$rs['field_upload_type']}" data-multiple="1" title="上传">上传</a>
                            <a class="ui-btn-group-item fm-choose ui-icon-select" data-name="{$rs['field_key']}" data-url="{U('upload/imagelist','type=1&multiple=1')}" data-type="{$rs['field_upload_type']}" data-multiple="1" title="选择">选择</a>
                        </div>
                        <div class="imagelist">
                            <ul id="list_{$rs['field_key']}">
                                {if is_array($data)}
                                {foreach $data as $num=>$val}
                                <li num="{$num}">
                                    <div class="preview">
                                        <input type="hidden" name="{$rs['field_key']}[{$num}][image]" value="{$val['image']}">
                                        <u href="{$val['image']}" class="ui-lightbox"><img src="{$val['image']}" /></u>
                                        <a href="javascript:;" class="fm-choose" data-name="preview" data-url="{U('upload/imageupload','type=1&multiple=1')}" data-type="0" data-multiple="0" title="选择"><i class="ui-icon-image ui-mr-sm"></i>换图</a>
                                    </div>
                                    <div class="intro">
                                        <textarea name="{$rs['field_key']}[{$num}][desc]" class="ui-form-ip" placeholder="图片描述...">{deal_strip($val['desc'])}</textarea>
                                    </div>
                                    <div class="action"><a href="javascript:;" class="img-left"><i class="ui-icon-left"></i>左移</a><a href="javascript:;" class="img-right"><i class="ui-icon-right"></i>右移</a><a href="javascript:;" class="img-del"><i class="ui-icon-delete"></i>删除</a></div>
                                </li>
                                {/foreach}
                                {/if}
                            </ul>
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
						{php $default=$record[$rs['field_key']]}
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
                        {/switch}
                        {if $rs['field_tips']<>''}<span class="input-tips">{$rs['field_tips']}</span>{/if}
                </div>
            </div>
            {/foreach}
            
            <div class="ui-form-group ui-row">
                <label class="col-left ui-col-form-label">排序：</label>
                <div class="col-right">
                    <input type="text" name="ordnum" class="ui-form-ip" value="{$ordnum}">
                    <span class="input-tips">数字越大越靠前</span>
                </div>
            </div>
            <div class="ui-form-group ui-row">
                <label class="col-left ui-col-form-label">状态：</label>
                <div class="col-right col-right-top">
                    <label class="ui-radio"><input type="radio" name="islock" value="1"{if $islock==1} checked{/if}><i></i>已审</label>
                    <label class="ui-radio"><input type="radio" name="islock" value="0"{if $islock==0} checked{/if}><i></i>未审</label>
                </div>
            </div>
            <div class="ui-form-group ui-row">
                <label class="col-left ui-col-form-label"></label>
                <div class="col-right">
                	<input type="hidden" name="token" value="{$token}">
                    <button type="submit" class="ui-btn ui-btn-info ui-mr">保存</button>
                    <button type="button" class="ui-btn ui-back">返回</button>
                </div>
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
                        setTimeout(function(){location.href='{U('index','fid='.$fid.'')}';},1500);
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