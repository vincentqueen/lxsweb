<?php if(!defined('IN_SDCMS')) exit;?>
<script src="{WEB_ROOT}public/editor/editor.js"></script>
<script>
$(function()
{
	{if sdcms[bbs_post_code]==1}
	$("#verify").click(function(){
		$(this).attr("src",$(this).attr("src")+"{iif(sdcms[url_mode]==1,"&","?")}rnd="+Math.round());
		$("#code").val("");
	});
	{/if}
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
				url:'{THIS_LOCAL}',
				data:$(form).serialize(),
				error:function(e){alert(e.responseText);},
				success:function(d)
				{
					if(d.state=='success')
					{
						sdcms.success(d.msg);
						setTimeout(function(){location.href='{PRE_URL}';},1500);
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