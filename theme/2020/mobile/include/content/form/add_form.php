<?php if(!defined('IN_SDCMS')) exit;?>
<form class="ui-form ui-mt" method="post">
	{foreach $field as $rs}
	{php $default=deal_default($rs['field_default'])}
	<div class="ui-form-group ui-row{if $rs['field_type']==7} ui-hide{/if}">
		<label class="ui-col-3 ui-col-form-label ui-text-right">{$rs['field_title']}：</label>
		<div class="ui-col-9{if $rs['field_type']==9} ui-pt-15{/if}">
		{switch $rs['field_type']}{case 1}<input type="text" name="{$rs['field_key']}" id="{$rs['field_key']}" class="ui-form-ip"{if $rs['field_length']!=0} maxlength="{$rs['field_length']}"{/if} value="{$default}" {deal_rule($rs['field_rule'],$rs['field_title'])}>{/case}
		{case 2}<input type="text" name="{$rs['field_key']}" id="{$rs['field_key']}" class="ui-form-ip datepick"{if $rs['field_length']!=0} maxlength="{$rs['field_length']}"{/if} value="{$default}"  readonly {deal_rule($rs['field_rule'],$rs['field_title'])}>{/case}
		{case 3}<input type="text" name="{$rs['field_key']}" id="{$rs['field_key']}" class="ui-form-ip"{if $rs['field_length']!=0} maxlength="{$rs['field_length']}"{/if} value="{$default}" {deal_rule($rs['field_rule'],$rs['field_title'])}>{/case}
		{case 4}<input type="text" name="{$rs['field_key']}" id="{$rs['field_key']}" class="ui-form-ip"{if $rs['field_length']!=0} maxlength="{$rs['field_length']}"{/if} value="{$default}" {deal_rule($rs['field_rule'],$rs['field_title'])}>{/case}
		{case 5}
		<div class="ui-input-group">
		<input type="text" name="{$rs['field_key']}" id="{$rs['field_key']}" class="ui-form-ip radius-right-none"{if $rs['field_length']!=0} maxlength="{$rs['field_length']}"{/if} value="{$default}" {deal_rule($rs['field_rule'],$rs['field_title'])}>
		<a class="after dropzone ui-icon-cloud-upload radius-none" config="{$rs['field_key']}" url="{U('upload/upfile','type='.$rs['field_upload_type'].'')}"maxsize="{if $rs['field_upload_type']==1}{C('upload_image_max')}{elseif $rs['field_upload_type']==2}{C('upload_video_max')}{else}{C('upload_file_max')}{/if}" title="上传">上传</a>
		{if $rs['field_upload_type']==1}<a class="after ui-lightbox ui-icon-zoomin" data-id="{$rs['field_key']}" data-name="lightbox-{$rs['field_key']}" title="{$rs['field_title']}">预览</a>{/if}
		
		</div>
		{/case}
		{case 6}<input type="password" name="{$rs['field_key']}" id="{$rs['field_key']}" class="ui-form-ip" value="{$default}" {deal_rule($rs['field_rule'],$rs['field_title'])}>{/case}
		{case 7}<input type="text" name="{$rs['field_key']}" id="{$rs['field_key']}" class="ui-form-ip"{if $rs['field_length']!=0} maxlength="{$rs['field_length']}"{/if} value="{$default}">{/case}
		{case 8}<textarea name="{$rs['field_key']}" class="ui-form-ip" id="{$rs['field_key']}" rows="3" cols="50" {deal_rule($rs['field_rule'],$rs['field_title'])}>{$default}</textarea>{/case}
		{case 9}
		{php $arr=explode(",",$rs['field_list'])}
		{foreach $arr as $j=>$key}
		{php $data=explode("|",$key)}
		{if $rs['field_radio']==2}<div class="input-group-check">{/if}
		<label class="ui-radio"><input type="radio" name="{$rs['field_key']}" value="{$data[1]}" {deal_rule($rs['field_rule'],$rs['field_title'],1)} {if $default=="".$data[1].""} checked{/if}>
		<i></i>{$data[0]}</label>
		{if $rs['field_radio']==2}</div>{/if}
		{/foreach}
		{/case}
		{case 10}
		{php $arr=explode(",",$rs['field_list'])}
		{foreach $arr as $j=>$key}
		{php $data=explode("|",$key)}
		<label class="ui-checkbox"><input type="checkbox" name="{$rs['field_key']}[]" value="{$data[1]}" {deal_rule($rs['field_rule'],$rs['field_title'],1)} {if stristr(",".$default.",",",".$data[1].",")} checked{/if}><i></i>{$data[0]}</label>
		{/foreach}
		{/case}
		{case 11}
		<select name="{$rs['field_key']}" id="{$rs['field_key']}" class="ui-form-ip" {deal_rule($rs['field_rule'],$rs['field_title'])}>
		<option value="">请选择{$rs['field_title']}</option>
		{php $arr=explode(",",$rs['field_list'])}
		{foreach $arr as $j=>$key}
		{php $data=explode("|",$key)}
		<option value="{$data[1]}" {if $default=="".$data[1].""} selected{/if}>{$data[0]}</option>
		{/foreach}
		</select>
		{/case}
		{case 12}<script id="{$rs['field_key']}" name="{$rs['field_key']}" class="ui-editor" type="text/plain" {if $rs['field_editor']==1}data-toolbar="mini"{/if}></script>
		{/case}
		{case 13}
		<div class="ui-btn-group ui-mt-sm">
		<a class="ui-btn-group-item dropzone-more ui-icon-cloud-upload" config="{$rs['field_key']}" url="{U('upload/upfile','type=1&thumb=1&water='.C('water_piclist').'')}" maxsize="{C('upload_image_max')}" title="上传">上传</a>
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
			{if $rs['field_tips']<>''}<span class="ui-input-tips">{$rs['field_tips']}</span>{/if}
		</div>
	</div>
	{/foreach}
	{if $iscode==1}
	<div class="ui-form-group ui-row">
		<label class="ui-col-3 ui-col-form-label ui-text-right">验证码：</label>
		<div class="ui-col-9">
			<div class="ui-input-group">
				<input type="text" name="code" class="ui-form-ip radius-right-none" id="code" data-rule="验证码:required;">
				<span class="code"><img src="{U('code')}" height="40" id="verify" title="点击更换验证码"></span>
			</div>
		</div>
	</div>
	{/if}
	<div class="ui-form-group ui-row">
		<div class="ui-col-9 ui-offset-3"><input type="hidden" name="token" value="{$token}"><button type="submit" class="ui-btn ui-btn-blue">提交</button></div>
	</div>
</form>