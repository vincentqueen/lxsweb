<?php defined('IN_SDCMS') or die(); if(!defined('IN_SDCMS')) exit;?>
<script>
$(function()
{
	$("#verify").click(function()
	{
		$(this).attr("src",$(this).attr("src")+"<?php echo iif(add_city(C(strtoupper('url_mode')),3)==1,"&","?");?>rnd="+Math.round());
		$("#code").val("");
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
				url:'<?php echo N("book");?>',
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
						$("#verify").click();
						sdcms.error(d.msg);
					}  
				}
			});
		}
	});
})
</script>