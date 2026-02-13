<?php if(!defined('IN_SDCMS')) exit;?><!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="renderer" content="webkit">
<title>网站设置</title>
<link rel="stylesheet" href="{WEB_ROOT}public/css/ui.css">
<link rel="stylesheet" href="{WEB_ROOT}public/admin/css/layout.css">
<script src="{WEB_ROOT}public/js/jquery.js"></script>
<script src="{WEB_ROOT}public/js/ui.js?v=202409"></script>
<script src="{WEB_ROOT}public/admin/js/base.js"></script>
<script src="{WEB_ROOT}public/js/jquery.qrcode.js"></script>
</head>

<body>

    <div class="position">当前位置：网站管理 > <a href="{U('index','id='.$id.'')}">网站设置</a></div>
    <div class="borders">
        <!---->
        <form class="ui-form" method="post">
            <div class="ui-tabs ui-tabs-white" data-href="1">
                <ul class="ui-tabs-nav">
                    {sdcms:rp top="0" table="sd_config_group" where="islock=1 and gkey='0' and types=1" order="ordnum,id" auto="j"}
                    <li{if $id==$rp[id]} class="active"{/if}><a href="{U('index',"id=".$rp[id]."")}">{$rp[gname]}</a></li>
                    {/sdcms:rp}
                </ul>
                <div class="ui-tabs-content">
                    {sdcms:rp top="1" table="sd_config_group" where="islock=1 and id=$id" order="ordnum,id" auto="j"}
                    {php $gid=$rp[id]}
                    <div class="ui-tabs-pane active">
                    	{sdcms:rs top="0" table="sd_config" where="islock=1 and gid=$gid" order="ordnum,id"}
                        {if $rs[ctype]==9}
                            <div class="form-subject">{$rs[ctitle]}{if strlen($rs[dtext])}（{$rs[dtext]}）{/if}</div>
                        {else}
                        <div class="ui-form-group ui-row">
                            <label class="col-left ui-col-form-label{if $rs[ctype]==5} ui-col-form-label-top{/if}">{$rs[ctitle]}：</label>
                            <div class="col-right{if $rs[ctype]==6 && $rs[rtype]==1} col-right-top{/if}">
                                {switch $rs[ctype]}
                                {case 1}
                                {if $rs[ckey]=='admin_code_google'}
                                    <div class="ui-input-group">
                                    <input type="text" name="{$rs[ckey]}" id="{$rs[ckey]}" class="ui-form-ip radius-right-none" readonly value="{if $rs[ishide]==1 && APP_DEMO}*************{else}{$rs[cvalue]}{/if}">
                                    <a class="after ui-icon-setting radius-none ui-google-apikey" data-name="{$rs[ckey]}">生成密钥</a>
                                    <a class="after ui-icon-qrcode ui-google-qrcode" data-name="{$rs[ckey]}">二维码</a>
                                </div>
                                {else}
                                    <input type="text" name="{$rs[ckey]}" class="ui-form-ip" value="{if $rs[ishide]==1 && APP_DEMO}*************{else}{$rs[cvalue]}{/if}">
                                {/if}
                                {/case}
                                {case 2}<input type="password" name="{$rs[ckey]}" class="ui-form-ip" value="{if $rs[ishide]==1 && APP_DEMO}*************{else}{$rs[cvalue]}{/if}">{/case}
                                {case 4}
                                <div class="ui-input-group">
                                    <input type="text" name="{$rs[ckey]}" class="ui-form-ip radius-right-none" id="{$rs[ckey]}" value="{$rs[cvalue]}">
                                    <a class="after fm-choose ui-icon-cloud-upload radius-none" data-name="{$rs[ckey]}" {if $rs[ckey]=='water_logo'}data-url="{U('upload/imageupload','type='.$rs[utype].'&multiple=0&islocal=1')}"{else}data-url="{U('upload/imageupload','type='.$rs[utype].'&multiple=0')}"{/if} data-type="{$rs[utype]}" data-multiple="0" title="上传">上传</a>
                                    <a class="after fm-choose ui-icon-select{if $rs[utype]==1} radius-none{/if}" data-name="{$rs[ckey]}" data-url="{if $rs[ckey]=='water_logo'}{U('upload/imagelist','type='.$rs[utype].'&multiple=0&islocal=1')}{else}{U('upload/imagelist','type='.$rs[utype].'&multiple=0')}{/if}" data-type="{$rs[utype]}" data-multiple="0" title="选择">选择</a>
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
                                {php $arr=explode(",",$rs[dvalue])}
                                {foreach $arr as $index=>$key}
                                {php $data=explode("|",$key)}
                                <option value="{$data[1]}" {if $rs[cvalue]=="".$data[1].""} selected{/if}>{$data[0]}</option>
                                {/foreach}
                                </select>
                                {/case}
                                {/switch}
                                <span class="input-tips">{$rs[dtext]}</span>
                            </div>
                        </div>
                        {/if}
                    	{/sdcms:rs}
                    </div>
                    {/sdcms:rp}
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
    $(".ui-google-apikey").click(function()
    {
        sdcms.loading('正在生成');
        var name=$(this).data("name");
        $.ajax(
        {
            type:'post',
            cache:false,
            dataType:'json',
            url:'{U("googleapi")}',
            error:function(e){alert(e.responseText);},
            success:function(d)
            {
                $.progress('close')
                if(d.state=='success')
                {
                    $("#"+name).val(d.msg);
                    setTimeout(function()
                    {
                        $(".ui-google-qrcode").click();
                    },500)
                }
                else
                {
                    sdcms.error(d.msg);
                }
            }
        });
    });
    $(".ui-google-qrcode").click(function()
    {
        sdcms.loading('正在生成二维码');
        var name=$(this).data("name");
        var str=$("#"+name).val();
        if(str=='')
        {
            sdcms.error('请先生成密钥');
            return;
        }
        $.ajax(
        {
            type:'post',
            cache:false,
            dataType:'json',
            url:'{U("qrcode")}',
            data:'appkey='+str,
            error:function(e){alert(e.responseText);},
            success:function(d)
            {
                $.progress('close')
                if(d.state=='success')
                {
                    $("#qrcode").remove();
                    $.dialog(
                    {
                        title:"扫码绑定",
                        text:'<div class="ui-text-center"><div id="qrcode" style="width:300px;height:300px;margin:0 auto;"></div><div class="ui-text-center ui-mt">请打开【身份验证器】App，扫码完成绑定。</div></div>',
                        okval:'确定',
                        ok:function(e)
                        {
                            e.close();
                        }
                    });
                    $("#qrcode").qrcode({width:300,height:300,text:d.msg}); 
                }
                else
                {
                    sdcms.error(d.msg);
                }
            }
        });
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
                url:'{U("index","id=".$id."")}',
                data:$(form).serialize(),
                error:function(e){alert(e.responseText);},
                success:function(d)
                {
                    if(d.state=='success')
                    {
                        sdcms.success(d.msg);
                        {if $id!=2}
                        setTimeout(function(){location.href='{U("index","id=".$id."")}';},1500);
                        {else}
                        var a=$('.ui-form input[name="url_mode"]:checked').val();
                        switch(a)
                        {
                            case '1':
                                var url='{N(MODULE_NAME,1)}';
                                break;
                            case '2':
                                var url='{N(MODULE_NAME,2)}';
                                break;
                            case '3':
                                var url='{N(MODULE_NAME,3)}';
                                break;
                        }
                        setTimeout(function(){top.location.href=''+url+'';},800);
                        {/if} 
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