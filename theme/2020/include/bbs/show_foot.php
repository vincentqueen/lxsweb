<?php if(!defined('IN_SDCMS')) exit;?>
<script src="{WEB_ROOT}public/editor/editor.js"></script>
<script>
	$(function()
	{
		{if sdcms[bbs_reply_code]==1}
		$("#verify").click(function()
		{
			$(this).attr("src",$(this).attr("src")+"{iif(sdcms[url_mode]==1,"&","?")}rnd="+Math.round());
			$("#code").val("");
		});
		{/if}
		
		$("#bbsshow img").each(function()
		{
			var html=$('<a class="ui-lightbox"></a>').attr("href",this.src);
			$(this).wrap(html);
		});
		
		{if $islogin!=0 && $reply_lever==1}
		//快捷键提交评论
	    $(".post_reply").find('textarea').on("keydown", function(e){
	    	e.stopPropagation();
	    	if(e.ctrlKey && e.which ==13){
	    		$('.post_reply').submit();
	    	}
	    });
		$(".ui-editor").each(function()
		{
			var toolbar=$(this).data("toolbar");
			var id=$(this).attr("id");
			$("#"+id).editor({toolbar:toolbar,upload:'{U("upload/index")}'});
		});
		$(".post_reply").form(
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
					url:"{U('bbs/reply','id='.$id.'')}",
					data:$(form).serialize(),
					error:function(e){alert(e.responseText);},
					success:function(d)
					{
						if(d.state=='success')
						{
							sdcms.success(d.msg);
							setTimeout(function(){location.href='{THIS_LOCAL}';},1500);
						}
						else
						{
							sdcms.error(d.msg);
						}  
					}
				});
			}
		});
		{/if}
	})
	</script>