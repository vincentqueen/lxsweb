<?php if(!defined('IN_SDCMS')) exit;?><!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="renderer" content="webkit">
<title>会员配置</title>
<link rel="stylesheet" href="{WEB_ROOT}public/css/ui.css">
<link rel="stylesheet" href="{WEB_ROOT}public/admin/css/layout.css">
<script src="{WEB_ROOT}public/js/jquery.js"></script>
<script src="{WEB_ROOT}public/js/ui.js?v=202409"></script>
<script src="{WEB_ROOT}public/admin/js/base.js"></script>
</head>

<body>
    <div class="position">当前位置：会员管理 > <a href="{U('user/index')}">会员管理</a> > <a href="{THIS_LOCAL}">会员配置</a></div>
    <div class="borders">
        <!---->
        <form class="ui-form" method="post">
            <div class="ui-tabs ui-tabs-white" data-href="1">
                <ul class="ui-tabs-nav">
                    {sdcms:rp top="1" table="sd_config_group" where="islock=1 and gkey='user'" order="ordnum,id" auto="j"}
            		{php $gid=$rp[id]}
                    <li class="active"><a href="{U('index',"id=".$rp[id]."")}">{$rp[gname]}</a></li>
                    {/sdcms:rp}
                </ul>
                <div class="ui-tabs-content">
                    <div class="ui-tabs-pane active">
                    	{sdcms:rs top="0" table="sd_config" where="islock=1 and gid=$gid" order="ordnum,id"}
                        {if $rs[ctype]==9}
                            <div class="form-subject">{$rs[ctitle]}{if strlen($rs[dtext])}（{$rs[dtext]}）{/if}</div>
                        {else}
                        <div class="ui-form-group ui-row">
                            <label class="col-left ui-col-form-label">{$rs[ctitle]}：</label>
                            <div class="col-right{if $rs[ctype]==6 && $rs[rtype]==1} col-right-top{/if}">
                                {switch $rs[ctype]}
                                {case 1}<input type="text" name="{$rs[ckey]}" class="ui-form-ip" value="{if $rs[ishide]==1 && APP_DEMO}*************{else}{$rs[cvalue]}{/if}">{/case}
                                {case 2}<input type="password" name="{$rs[ckey]}" class="ui-form-ip" value="{$rs[cvalue]}">{/case}
                                {case 4}
                                <div class="ui-input-group">
                                    <input type="text" name="{$rs[ckey]}" class="ui-form-ip radius-right-none" id="{$rs[ckey]}" value="{$rs[cvalue]}">
                                    <a class="after fm-choose ui-icon-cloud-upload radius-none" data-name="{$rs[ckey]}" data-url="{U('upload/imageupload','type='.$rs[utype].'&multiple=0')}" data-type="{$rs[utype]}" data-multiple="0" title="上传">上传</a>
                                    <a class="after fm-choose ui-icon-select{if $rs[utype]==1} radius-none{/if}" data-name="{$rs[ckey]}" data-url="{U('upload/imagelist','type='.$rs[utype].'&multiple=0')}" data-type="{$rs[utype]}" data-multiple="0" title="选择">选择</a>
                                    {if $rs[utype]==1}<a class="after ui-lightbox ui-icon-zoomin" data-id="{$rs[ckey]}" data-name="lightbox-{$rs[ckey]}" title="{$rs[ctitle]}">预览</a>{/if}
                                </div>
                                {/case}
                                {case 5}<textarea name="{$rs[ckey]}" class="ui-form-ip" rows="3" cols="50">{if $rs[ishide]==1 && APP_DEMO}*************{else}{$rs[cvalue]}{/if}</textarea>{/case}
                                {case 6}
                                {php $arr=explode(",",$rs[dvalue])}
                                {foreach $arr as $index=>$key}
                                {php $data=explode("|",$key)}
                                	{if $rs[rtype]==2}<div class="input-group-check">{/if}
                                	<label class="ui-radio"><input type="radio" name="{$rs[ckey]}" id="{$rs[ckey]}_{$index}" value="{$data[1]}" {if $rs[cvalue]=="".$data[1].""} checked{/if}><i></i>{$data[0]}</label>
                                    {if $rs[rtype]==2}</div>{/if}
                                {/foreach}
                                {/case}
                                {case 7}
                                <div class="input-group-check">
                                {php $arr=explode(",",$rs[dvalue])}
                                {foreach $arr as $index=>$key}
                                {php $data=explode("|",$key)}
                                	<label class="ui-checkbox"><input type="checkbox" name="{$rs[ckey]}[]" id="{$rs[ckey]}_{$index}" value="{$data[1]}" {if stristr(",".$rs[cvalue].",",",".$data[1].",")} checked{/if}><i></i>{$data[0]}</label>
                                {/foreach}
                                </div>
                                {/case}
                                {case 8}
                                <select name="{$rs[ckey]}" class="ui-form-ip">
                                {if $rs[ckey]=='user_reg_group'}
                                    <option value="0">不加入任何组</option>
                                    {sdcms:rg top="0" table="sd_user_group"}
                                    <option value="{$rg[gid]}" {if $rs[cvalue]==$rg[gid]} selected{/if}>{$rg[gname]}</option>
                                    {/sdcms:rg}
                                {else}
                                    {php $arr=explode(",",$rs[dvalue])}
                                    {foreach $arr as $index=>$key}
                                    {php $data=explode("|",$key)}
                                    <option value="{$data[1]}" {if $rs[cvalue]=="".$data[1].""} selected{/if}>{$data[0]}</option>
                                    {/foreach}
                                {/if}
                                </select>
                                {/case}
                                {/switch}
                                <span class="input-tips">{$rs[dtext]}</span>
                            </div>
                        </div>
                        {/if}
                    	{/sdcms:rs}
                    </div>
                </div>
            </div>
            <input type="hidden" name="token" value="{$token}">
			<button type="submit" class="ui-btn ui-btn-info ui-mt-15">保存设置</button>
        </form>
        <!---->
    </div>
    
<script>
$(function()
{
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
                url:'{U("index","id=".$gid."")}',
                data:$(form).serialize(),
                error:function(e){alert(e.responseText);},
                success:function(d)
                {
                    if(d.state=='success')
                    {
                        sdcms.success(d.msg);
                        setTimeout(function(){location.href='{U("index","id=".$gid."")}';},1500);
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