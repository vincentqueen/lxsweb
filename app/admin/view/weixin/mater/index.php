<?php if(!defined('IN_SDCMS')) exit;?><!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="renderer" content="webkit">
<title>素材管理</title>
<link rel="stylesheet" href="{WEB_ROOT}public/css/ui.css">
<link rel="stylesheet" href="{WEB_ROOT}public/admin/css/layout.css">
<script src="{WEB_ROOT}public/js/jquery.js"></script>
<script src="{WEB_ROOT}public/js/ui.js?v=202409"></script>
<script src="{WEB_ROOT}public/js/jquery.masonry.min.js"></script>
</head>

<body>
    <div class="position">当前位置：微信公众号 > <a href="{THIS_LOCAL}">素材管理</a></div>
    <div class="border">
        <!---->
        <a href="{U('add')}" class="ui-btn ui-btn-info">新增素材</a>
        <div id="master">
            {sdcms:rp pagesize="10" field="id,title" table="sd_mater" where="islock=1" order="id desc" auto="j"}
            {php $cid=$rp[id]}
            <div class="list-loop">
                <div class="info"><a href="javascript:;" config="{$rp[id]}" defaultval="{$rp[title]}" class="remark"><span class="ui-icon-edit"></span> 重命名</a>{$rp[title]}</div>
                {sdcms:rs top="0" field="id,title,pic" table="sd_mater_data" where="cid=$cid and islock=1" order="ordnum,id"}
                {if $i==1}
                <div class="hover">
                    <img src="{$rs[pic]}" width="267">
                    <a href="javascript:;">{$rs[title]}</a>
                </div>
                {else}
                <div class="item">
                    <img src="{$rs[pic]}" class="bd">
                    <a href="javascript:;">{$rs[title]}</a>
                </div>
                {/if}
                {/sdcms:rs}
                <div class="admin">
                    <ul>
                        <li><a href="{U('add','classid='.$rp[id].'')}"><span class="ui-icon-edit"></span> 编辑</a></li>
                        <li><a href="javascript:;" class="del" data-url="{U('delcate','id='.$rp[id].'')}"><span class="ui-icon-delete"></span> 删除</a></li>
                    </ul>
                </div>
            </div>
            {/sdcms:rp}
        </div>
        {if $total_rp!=0}
        <div class="ui-page ui-page-center ui-page-info">
            <ul>{$showpage}</ul>
        </div>
        {/if}
        <!---->
    </div>

<script>
$(function()
{
	$('#master').masonry({itemSelector:'.list-loop'});
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
                            setTimeout(function(){location.href='{THIS_LOCAL}';},1000);
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
	
	$(".remark").click(function()
	{
		var id=$(this).attr("config");
		var defaultval=$(this).attr("defaultval");
		$.dialogbox(
		{
			'title':"重命名",
			'inputval':defaultval,
			'type':1,
			'oktheme':'ui-btn-info',
			'ok':function(e)
			{
				var val=e.inputval();
				if(val==defaultval)
				{
					e.close();
				}
				else
				{
					$.ajax(
					{
						url:"{U('remark')}",
						data:"token={$token}&id="+id+"&name="+encodeURIComponent(val),
						type:"post",
						success:function(data)
						{
							if(data=="1")
							{
								e.close();
								sdcms.success('设置成功');
								setTimeout('location.href="{THIS_LOCAL}"',1000);
							}
							else
							{
								sdcms.error(data);
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