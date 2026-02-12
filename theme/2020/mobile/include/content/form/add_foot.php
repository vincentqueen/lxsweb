<?php if(!defined('IN_SDCMS')) exit;?>
<script src="{WEB_ROOT}public/js/dropzone.js"></script>
<script src="{WEB_ROOT}public/datepick/laydate.js"></script>
<script src="{WEB_ROOT}public/editor/editor.js"></script>
<script>
$(function()
{
	{if $iscode==1}
	$("#verify").click(function(){
		var img=$(this).attr("src");
		if(img.indexOf('?')>0)
		{
			$(this).attr("src",img+'&random='+Math.random());
		}
		else
		{
			$(this).attr("src",img.replace(/\?.*$/,'')+'?'+Math.random());
		}
		$("#code").val("");
	});
	{/if}
	$(document).on("click",".imagelist .img-left",function(){
		var $li=$(this).parent().parent();
		var $pre=$li.prev("li");
		$pre.insertAfter($li)
	})
	$(document).on("click",".imagelist .img-right",function(){
		var $li=$(this).parent().parent();
		var $next=$li.next("li");
		$next.insertBefore($li);
	});
	$(document).on("click",".imagelist .img-del",function(){
		$(this).parent().parent().remove();
	});

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
		$("#"+id).editor({toolbar:toolbar,upload:'{U("upload/index")}'});
	});
	$(".ui-form").form(
	{
		type:2,
		align:'center',
		result:function(form)
		{
			$.ajax(
			{
				type:'post',
				cache:false,
				dataType:'json',
				url:'{U('add','fid='.$fid.'','',1)}',
				data:$(form).serialize(),
				error:function(e){alert(e.responseText);},
				success:function(d)
				{
					if(d.state=='success')
					{
						sdcms.success(d.msg);
						setTimeout(function(){location.href='{if $backway==1}{U('index','fid='.$fid.'','',1)}{else}{U('add','fid='.$fid.'','',1)}{/if}';},1500);
					}
					else
					{
						{if $iscode==1}$("#verify").click();{/if}
						sdcms.error(d.msg);
					}
				}
			});
		}
	});
});
$(".dropzone").dropzone(
{
	maxFiles: 1,
	success:function(file,data,that)
	{
		data=jQuery.parseJSON(data);
		this.removeFile(file);
		if(data.state=="success")
		{
			sdcms.success("上传成功");
			$("#"+$(that).attr("config")).val(data.msg);
		}
		else
		{
			sdcms.error("上传失败："+data.msg);
		}
	},
	sending:function(file)
	{
		sdcms.loading("正在上传，请稍等");
	},
	totaluploadprogress:function(progress)
	{
		$.progress((Math.round(progress*100)/100)+"%");
	},
	queuecomplete:function(progress)
	{
		$.progress('close');
	},
	error:function(file,msg)
	{
		sdcms.error(msg);
	}
});
$(".dropzone-more").dropzone(
{
	maxFiles:50,
	success:function(file,data,that)
	{
		data=jQuery.parseJSON(data);
        this.removeFile(file);
		if(data.state=="success")
		{
			var name=$(that).attr("config");
			var num=1;
			$("#list_"+name+" li").each(function()
			{
				var max=parseInt($(this).attr("num"));
				if (max>=num)
				{
					num=max+1;
				}
			});
			var html='';
			html+='<li num="'+num+'">';
			html+='	<div class="preview">';
			html+='		<input type="hidden" name="'+name+'['+num+'][image]" value="'+data.msg+'">';
			html+='		<u href="'+data.msg+'" class="lightbox"><img src="'+data.msg+'" /></u>';
			html+='	</div>';
			html+='	<div class="intro">';
			html+='		<textarea name="'+name+'['+num+'][desc]" placeholder="图片描述..."></textarea>';
			html+='	</div>';
			html+='	<div class="action"><a href="javascript:;" class="img-left"><i class="ui-icon-left"></i>左移</a><a href="javascript:;" class="img-right"><i class="ui-icon-right"></i>右移</a><a href="javascript:;" class="img-del"><i class="ui-icon-delete"></i>删除</a></div>';
			html+='</li>';
			$("#list_"+name).append(html);
		}
		else
		{
			sdcms.error("上传失败："+data.msg);
		}
	},
	sending:function(file)
	{
		sdcms.loading("正在上传，请稍等");
	},
	totaluploadprogress:function(progress)
	{
		$.progress((Math.round(progress*100)/100)+"%");
	},
	queuecomplete:function(progress)
	{
		$.progress('close');
	},
	error:function(file,msg)
	{
		sdcms.error(msg);
	}
});
</script>