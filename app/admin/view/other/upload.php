<?php if(!defined('IN_SDCMS')) exit;?><!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="renderer" content="webkit">
<title>本地上传</title>
<link rel="stylesheet" href="{WEB_ROOT}public/css/ui.css">
<link rel="stylesheet" href="{WEB_ROOT}public/admin/css/layout.css">
<link rel="stylesheet" href="{WEB_ROOT}public/upload/css/style.css" />
<script src="{WEB_ROOT}public/js/jquery.js"></script>
<script src="{WEB_ROOT}public/js/ui.js?v=202409"></script>
<script src="{WEB_ROOT}public/admin/js/base.js"></script>
<script src="{WEB_ROOT}public/upload/upload.js?v=20240909"></script>
</head>

<body class="ui-p-10">

<div class="ui-tabs ui-tabs-white" data-href="1">
	<ul class="ui-tabs-nav">
	  <li><a href="{U('imagelist','multiple='.$multiple.'&type='.$type.'&gid=0&iseditor='.$iseditor.'&islocal='.$islocal.'&thumb='.$thumb.'&water='.$water.'')}">附件选择</a></li>
	  <li class="active"><a href="javascript:;">本地上传</a></li>
	</ul>
	<div class="ui-tabs-content">
		<div class="ui-tabs-pane active">
			<!--loop-->
			<div class="ui-upload"></div>
			<!--loop-->
		</div>
	</div>
</div>

<input type="hidden" id="piclist">
<input type="hidden" id="gourl" value="{$gid}">
<script>
$(function()
{
	$(".ui-upload").upload(
	{
		url:"{U('upload/upfile','type='.$type.'&gid='.$gid.'&iseditor='.$iseditor.'&islocal='.$islocal.'&thumb='.$thumb.'&water='.$water.'')}",
		maxsize:{sdcms[upload_file_max]},
		minsize:0,
		type:'all',
		multiple:{if $multiple==0}false{else}true{/if},
		target:[[0,'未分组',0]{sdcms:rs top="0" table="sd_attachment_group" where="islock=1" order="ordnum,aid"},[{$rs[aid]},'{$rs[gname]}',{$gid==$rs[aid]?1:0}]{/sdcms:rs}],
		success:function(e,s)
		{
			/*已弃用*/
			{if $multiple==1}
				var str=$("#piclist").val();
				if(str!='')
				{
					str=str+'|';
				}
				str=str+s.url;
			{else}
				var str=s.url;
			{/if}
			//$("#piclist").val(str)
		},
		complete:function(e)
		{
			var data=$(".ui-upload-list").find(".success");
			var html='';
			var pic=data;
			var str='';
			for(i=0;i<pic.length;i++)
			{
				var file=$(pic[i]).attr("data-url");
				if(str!='')
				{
					str=str+'|';
				}
				str=str+file;
			}
			$("#piclist").val(str)
			console.log(str)
		}
	});
	$(".add-iframe").click(function()
	{
		$.dialogbox(
		{
			title:"添加分组",
			inputval:"",
			inputholder:"请输入分组名称",
			type:1,
			ok:function(e)
			{
				var val=e.inputval();
				if(val=='')
				{
					sdcms.error("分组名称不能为空");
				}
				else
				{
					$.ajax(
					{
						url:'{U("addgroup")}',
						type:'post',
						dataType:'json',
						data:"token={$token}&name="+encodeURIComponent(val),
						error:function(e){alert(e.responseText);},
						success:function(d)
						{
							if(d.state=='success')
							{
								sdcms.success(d.msg);
								setTimeout(function(){location.href='{THIS_LOCAL}';},1000);
							}
							else
							{
								sdcms.error(d.msg);
							}
						}
					});
				}
			}
		});
	});
})

</script>

</body>
</html>