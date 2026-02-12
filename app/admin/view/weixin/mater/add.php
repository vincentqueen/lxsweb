<?php if(!defined('IN_SDCMS')) exit;?><!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="renderer" content="webkit">
<title>新增素材</title>
<script>var api_url="{U('upload/imagelist','type=3&multiple=1&mode=3&iseditor=1&islocal=1')}";</script>
<link rel="stylesheet" href="{WEB_ROOT}public/css/ui.css">
<link rel="stylesheet" href="{WEB_ROOT}public/admin/css/layout.css">
<script src="{WEB_ROOT}public/js/jquery.js"></script>
<script src="{WEB_ROOT}public/js/ui.js?v=202409"></script>
<script src="{WEB_ROOT}public/admin/js/base.js"></script>
<script src="{WEB_ROOT}public/editor/editor.js?v=202409"></script>
</head>

<body>
	
    <div class="position">当前位置：微信公众号 > <a href="{U('index')}">素材管理</a> > <a href="{THIS_LOCAL}">新增素材</a></div>
    <div class="border">
        <!---->
        <div class="form-subject">新增素材</div>
        <div id="master_add">
             <div class="left">
                 <div id="left_master">
                     {sdcms:rs top="10" table="sd_mater_data" where="cid=$classid" order="ordnum,id"}
                     {if $i==1}
                     <div class="header{if $cid==$rs[id]} top{/if}">
                         <div class="img frist_pic_{$rs[id]}">{if strlen($rs[pic])==0}封面图片{else}<img src="{$rs[pic]}">{/if}</div>
                         <a href="" class="frist_title_{$rs[id]}">{if strlen($rs[title])==0}标题{else}{$rs[title]}{/if}</a>
                         <div class="hover"><a href="{U('down','cid='.$rs[id].'&lc='.$i.'')}"><span>下移</span></a>　<a href="{U('add','classid='.$classid.'&cid='.$rs[id].'&f=1&lc='.$i.'')}"><span>编辑</span></a></div>
                     </div>
                     {else}
                     <a name="last_{$rs[id]}"></a>
                     <div class="items{if $cid==$rs[id]} active{/if}">
                         <div class="img frist_pic_{$rs[id]}">{if strlen($rs[pic])==0}缩略图{else}<img src="{$rs[pic]}" class="bd">{/if}</div>
                         <a href="" class="frist_title_{$rs[id]}">{if strlen($rs[title])==0}标题{else}{$rs[title]}{/if}</a>
                         <div class="hover"><a href="{U('up','cid='.$rs[id].'&lc='.$i.'')}"><span>上移</span></a>　<a href="{U('down','cid='.$rs[id].'&lc='.$i.'')}"><span>下移</span></a>　<a href="{U('add','classid='.$classid.'&cid='.$rs[id].'&f=0&lc='.$i.'')}"><span>编辑</span></a>　<a href="javascript:;" class="del" data-url="{U('del','id='.$rs[id].'')}"><span>删除</span></a></div>
                     </div>
                     {/if}
                     {/sdcms:rs}
                     {if $i<8}
                     <div class="more"><a href="javascript:;" class="addone" title="新增一条"><span class="ui-icon-file"></span></a><a href="javascript:;" class="choose" data-type="1" title="选择内容"><span class="ui-icon-file-text"></span></a><a href="javascript:;" class="choose" data-type="2" title="选择已有素材"><span class="ui-icon-file-word"></span></a></div>
                     {/if}             
                 </div>
             </div>
             <div class="right">
                <!---->
                <div class="table_form">
                    <form class="ui-form" method="post">
                    	<div id="arraw-left"><span></span></div>
                        
                        <div class="ui-form-group ui-row">
                            <label class="col-left ui-col-form-label">标题：</label>
                            <div class="col-right">
                                <input type="text" name="t0" id="t0" class="ui-form-ip" value="{$title}" data-rule="标题:required;">
                            </div>
                        </div>
                        <div class="ui-form-group ui-row">
                            <label class="col-left ui-col-form-label">{if $ordnum==1}封面{else}缩略图{/if}：</label>
                            <div class="col-right">
                            	<div class="ui-input-group">
                                    <input type="text" name="t1" id="t1" class="ui-form-ip radius-right-none" value="{$pic}">
                                    <a class="after fm-choose ui-icon-cloud-upload radius-none"data-name="t1" data-url="{U('upload/imageupload','type=1&multiple=0&islocal=1')}" data-type="1" data-multiple="0" title="上传">上传</a>
                                    <a class="after fm-choose ui-icon-select radius-none" data-name="t1" data-url="{U('upload/imagelist','type=1&multiple=0&mode=3&islocal=1')}" data-type="1" data-multiple="0" title="选择">选择</a>
                                    <a class="after ui-lightbox ui-icon-zoomin" data-id="t1" data-name="lightbox-t1" title="{if $ordnum==1}封面{else}缩略图{/if}">预览</a>
                                </div>
                                <span class="input-tips">{if $ordnum==1}建议尺寸：900像素 * 383像素{else}建议尺寸：200像素 * 200像素{/if}</span>
                            </div>
                        </div>
                        <div class="ui-form-group ui-row">
                            <label class="col-left ui-col-form-label">正文：</label>
                            <div class="col-right" style="min-width:480px;">
                            	<script id="t2" name="t2" class="ui-editor" type="text/plain">{$content}</script>
                            </div>
                        </div>
                        <div class="ui-form-group ui-row">
                            <label class="col-left ui-col-form-label">摘要：</label>
							<div class="col-right">
								<textarea name="t3" rows="3" class="ui-form-ip ui-form-limit" data-max="100">{$intro}</textarea>
								<div class="ui-form-limit-text"><span>{mb_strlen($intro)}</span>/100</div>
							</div>
                        </div>
                        <div class="ui-form-group ui-row">
                            <label class="col-left ui-col-form-label">原文链接：</label>
                            <div class="col-right">
                                <input type="text" name="t4" class="ui-form-ip" value="{$url}">
                            </div>
                        </div>
                        <div class="ui-form-group ui-row">
                            <label class="col-left ui-col-form-label"></label>
                            <div class="col-right">
                            	<input type="hidden" name="token" value="{$token}">
								<button type="submit" class="ui-btn ui-btn-info">保存素材</button>
                            </div>
                        </div>
                    </form>
                </div>

                <!---->
             </div>
         </div>
        <!---->
    </div>
<script>
$(function()
{
	$("#t0").keyup(function()
	{
		var v=$(this).val();
		$('.frist_title_{$cid}').html(v);
	});
	$("#t1").keyup(function()
	{
		var v=$(this).val();
		if(v=='')
		{
			$('.frist_pic_{$cid}').html('{if $f==1}封面图片{else}缩略图{/if}');
		}
		else
		{
			$('.frist_pic_{$cid}').html('<img src='+v+'>');
		}
	});
	$(".addone").click(function()
	{
		$.ajax(
		{
		   type:"post",
		   url:"{U('one','classid='.$classid.'')}",
		   data:'token={$token}',
		   success:function(e)
		   {
				if(e=="0")
				{
					{if APP_DEMO}
					alert("演示站已禁止新增素材")
					{else}
					alert("最多只能添加8条")
					{/if}
				}
				else
				{
					var arr=e.split(":");
					var cid=arr[0];
					var lc=arr[1];
					location.href='{U("add")}{if C('url_mode')==1}&{else}?{/if}classid={$classid}&cid='+cid+'&f=0&lc='+lc+'#last_'+cid+'';
				}
		   }
		})
	});
	$(".choose").click(function()
	{
		var type=$(this).data("type");
		var url=(type=="1")?"{U('all')}":"{U('master')}";
		$.dialogbox(
		{
			'title':"选择内容",
			'text':url,
			'width':'60%',
			'height':'80%',
			'type':3,
			'oktheme':'ui-btn-info',
			'ok':function(e)
			{
				var val=e.iframe().contents().find("#go").val();
				if(val.length==0)
				{
					sdcms.error('请选择内容');
					return false;
				}
				else
				{
					var s=val.split(":");
					//获取到内容ID后，添加进数据库
					$.ajax(
					{
					   type:"post",
					   url:"{U('two','classid='.$classid.'')}",
					   data:'token='+s[2]+'&id='+s[0]+'&m='+s[1]+'&type='+type,
					   success:function(e)
					   {
							if(e=="0")
							{
								{if APP_DEMO}
								sdcms.error("演示站已禁止新增素材")
								{else}
								sdcms.error("最多只能添加8条")
								{/if}
							}
							else if(e=="1")
							{
								sdcms.error("内容错误");
							}
							else
							{
								var arr=e.split(":");
								var cid=arr[0];
								var lc=arr[1];
								location.href='{U("add")}{if C('url_mode')==1}&{else}?{/if}classid={$classid}&cid='+cid+'&f=0&lc='+lc+'#last_'+cid+'';
							}
					   }
					})
					e.close();
				}
			}
		});
	});
	$(".del").click(function()
	{
		var url=$(this).attr("data-url");
		$.dialog(
		{
			'title':"操作提示",
			'text':"确定要删除？不可恢复！",
			'oktheme':'ui-btn-info',
			'ok':function(e)
			{
				$.ajax(
				{
                    url:url,
					type:'post',
					dataType:'json',
					data:'token={$token}',
					error:function(e){alert(e.responseText);},
                    success:function(d)
                    {
                        e.close();
                        if(d.state=='success')
                        {
                            sdcms.success(d.msg);
                            setTimeout(function(){location.href='{U('add','classid='.$classid.'')}';},1000);
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

	$(".table_form").css("margin-top","{$lc}px");
	$(".ui-editor").each(function()
	{
		var id=$(this).attr("id");
		$("#"+id).editor({toolbar:'mini',upload:'{U("upload/index","mode=3")}',url:api_url,save:'{U("upload/outimage")}'});
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
                url:'{U('edit','id='.$cid.'&classid='.$classid.'')}',
                data:$(form).serialize(),
                error:function(e){alert(e.responseText);},
                success:function(d)
                {
                    if(d.state=='success')
                    {
                        sdcms.success(d.msg);
                        setTimeout(function(){location.href='{U('add','classid='.$classid.'')}';},1500);
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