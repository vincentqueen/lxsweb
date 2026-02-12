<?php defined('IN_SDCMS') or die(); if(!defined('IN_SDCMS')) exit;?><!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="renderer" content="webkit">
<title>内容管理</title>
<link rel="stylesheet" href="<?php echo WEB_ROOT;?>public/css/ui.css">
<link rel="stylesheet" href="<?php echo WEB_ROOT;?>public/admin/css/layout.css">
<script>var api_url="<?php echo U('upload/imagelist','type=3&multiple=1');?>";</script>
<script src="<?php echo WEB_ROOT;?>public/js/jquery.js"></script>
<script src="<?php echo WEB_ROOT;?>public/js/ui.js?v=202409"></script>
<script src="<?php echo WEB_ROOT;?>public/js/dropzone.js"></script>
<script src="<?php echo WEB_ROOT;?>public/js/sortable.min.js"></script>
<script src="<?php echo WEB_ROOT;?>public/admin/js/base.js"></script>
<script src="<?php echo WEB_ROOT;?>public/editor/editor.js?v=202409"></script>
</head>

<body>
    <div class="position">当前位置：<a href="<?php echo U('lists');?>">内容管理</a><?php echo get_page_postion($classid);?></div>
    <div class="border">
        <!---->
        <form class="ui-form" method="post">
            <div class="ui-form-group ui-row">
                <label class="col-left ui-col-form-label">组图：</label>
                <div class="col-right col-right-full">
                	<!---->
                    <div class="ui-btn-group ui-mt-sm">
                    <a class="ui-btn-group-item fm-choose ui-icon-cloud-upload" data-name="t1" data-url="<?php echo U('upload/imageupload','type=3&multiple=1&thumb=0&water='.C('water_piclist').'');?>" data-type="0" data-multiple="1" title="上传">上传</a>
                    <a class="ui-btn-group-item fm-choose ui-icon-select" data-name="t1" data-url="<?php echo U('upload/imagelist','type=1&multiple=1');?>" data-type="0" data-multiple="1" title="选择">选择</a>
                    </div>
                    <div class="imagelist">
                    <ul id="list_t1">
                        <?php $picdata=jsdecode($piclist,1);?>
                        <?php if (is_array($picdata)) { ?>
                            <?php foreach($picdata as $num=>$val) { ?>
                            <li num="<?php echo $num;?>">
                                <div class="preview">
                                    <input type="hidden" name="t1[<?php echo $num;?>][image]" value="<?php echo $val['image'];?>">
                                    <u href="<?php echo $val['image'];?>" class="ui-lightbox" data-title="<?php echo deal_strip($val['desc']);?>"><img src="<?php echo $val['image'];?>" /></u>
                                    <a href="javascript:;" class="fm-choose" data-name="preview" data-url="<?php echo U('upload/imageupload','type=1&multiple=1');?>" data-type="0" data-multiple="0" title="选择"><i class="ui-icon-image ui-mr-sm"></i>换图</a>
                                </div>
                                <div class="intro">
                                    <textarea name="t1[<?php echo $num;?>][desc]" class="ui-form-ip" placeholder="图片描述..."><?php echo deal_strip($val['desc']);?></textarea>
                                </div>
                                <div class="action"><a href="javascript:;" class="img-left"><i class="ui-icon-left"></i>左移</a><a href="javascript:;" class="img-right"><i class="ui-icon-right"></i>右移</a><a href="javascript:;" class="img-del"><i class="ui-icon-delete"></i>删除</a></div>
                            </li>
                            <?php }?>
                        <?php }?>
                    </ul>
                    </div>
                    <!---->
                </div>
            </div>
            <div class="ui-form-group ui-row">
                <label class="col-left ui-col-form-label">内容：</label>
                <div class="col-right-full">
                    <script id="t0" name="t0" class="ui-editor" type="text/plain"><?php echo $content;?></script>
                </div>
            </div>
			
			<div class="ui-form-group ui-row">
                <label class="col-left ui-col-form-label"></label>
                <div class="col-right">
                	<input type="hidden" name="token" value="<?php echo $token;?>">
                    <button type="submit" class="ui-btn ui-btn-info ui-mr-sm">保存</button>
                    <?php if ($isdel==1) { ?>
                    <button type="button" class="ui-btn isdel" data-url="<?php echo U('delpage','classid='.$classid.'');?>">删除内容</button>
                    <?php } else { ?>
                    <button type="button" class="ui-btn ui-back">返回</button>
                    <?php }?>
                </div>
            </div>

        </form>
        <!---->
    </div>

<script>
$(function()
{
	Sortable.create($("#list_t1")[0],{animation:400});
	$(".ui-editor").each(function()
	{
		var toolbar=$(this).data("toolbar");
		var id=$(this).attr("id");
		$("#"+id).editor({toolbar:toolbar,upload:'<?php echo U("upload/index");?>',url:api_url,save:'<?php echo U("upload/outimage");?>'});
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
                url:'<?php echo THIS_LOCAL;?>',
                data:$(form).serialize(),
                error:function(e){alert(e.responseText);},
                success:function(d)
                {
                    if(d.state=='success')
                    {
                        sdcms.success(d.msg);
                        setTimeout(function(){location.href='<?php echo THIS_LOCAL;?>';},1500);
                    }
                    else
                    {
                        sdcms.error(d.msg);
                    }
                }
            });
		}
	});
	$(".isdel").click(function()
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
					data:'token=<?php echo $token;?>',
					error:function(e){alert(e.responseText);},
                    success:function(d)
                    {
                        e.close();
                        if(d.state=='success')
                        {
                            sdcms.success(d.msg);
                            setTimeout(function(){location.href='<?php echo THIS_LOCAL;?>';},1000);
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

});
</script>
</body>
</html>