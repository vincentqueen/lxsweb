<?php defined('IN_SDCMS') or die(); if(!defined('IN_SDCMS')) exit;?><!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="renderer" content="webkit">
<title>字段管理</title>
<link rel="stylesheet" href="<?php echo WEB_ROOT;?>public/css/ui.css">
<link rel="stylesheet" href="<?php echo WEB_ROOT;?>public/admin/css/layout.css">
<script src="<?php echo WEB_ROOT;?>public/js/jquery.js"></script>
<script src="<?php echo WEB_ROOT;?>public/js/ui.js?v=202409"></script>
</head>

<body>
    <div class="position">当前位置：系统管理 > <a href="<?php echo U('configgroup/index');?>">设置分组</a> > <a href="<?php echo THIS_LOCAL;?>">字段管理</a></div>
    <div class="border">
        <!---->
        <a href="<?php echo U('add',"gid=".$gid."");?>" class="ui-btn ui-btn-info ui-mr-sm">添加字段</a>
        <form method="post" class="ui-form">
        <div class="ui-table-wrap">
        <table class="ui-table ui-table-border ui-table-hover ui-table-striped ui-mb ui-mt">
            <thead class="ui-thead-gray">
                <tr>
                    <th width="80">排序</th>
                    <th width="80">字段ID</th>
                    <th>字段名称</th>
                    <th width="120">Key</th>
                    <th width="120">类型</th>
                    <th width="80">状态</th>
                    <th width="120">操作</th>
                </tr>
            </thead>
            <tbody>
            <?php $array_rs=$this->db->load("select * from sd_config  where gid=$gid  order by ordnum,id ",0,false,0);$total_rs=count($array_rs);if($total_rs==0){ ?>
<?php } else{ ?>
<?php $i=0;} foreach($array_rs as $rs){ $i++;?>
            <tr>
                <td><input type="hidden" name="mid[]" value="<?php echo $rs['id'];?>"><input type="text" class="ui-form-ip" name="ordnum[]" id="ordnum_<?php echo $rs['id'];?>" value="<?php echo $rs['ordnum'];?>" data-rule="required;int;"></td>
                <td><?php echo $rs['id'];?></td>
                <td class="ui-text-left"><?php echo $rs['ctitle'];?></td>
                <td><?php echo $rs['ckey'];?></td>
                <td><?php switch ($rs['ctype']){ case 1: ?>普通文本<?php break;  case 2: ?>普通文本-密码<?php break;  case 4: ?>普通文本-上传<?php break;  case 5: ?>多行文本框<?php break;  case 6: ?>单选按钮<?php break;  case 7: ?>复选框<?php break;  case 8: ?>下拉菜单<?php break;  case 9: ?>间隔标题<?php break;  }?></td>
                <td><label class="ui-switch ui-switch-info"><input type="checkbox" <?php if ($rs['islock']==1) { ?> checked<?php }?> data-url="<?php echo U('switchs','id='.$rs['id'].'');?>"><span class="ui-switch-checkbox ui-switch-text"></span></label></td>
                <td><a href="<?php echo U('edit',"id=".$rs['id']."");?>"><span class="ui-icon-edit"></span> 编辑</a>　<a href="javascript:;" class="del" data-url="<?php echo U('del','id='.$rs['id'].'');?>"><span class="ui-icon-delete"></span> 删除</a></td>
            </tr>
            <?php } if($total_rs>0){ ?>
<?php }?>
            </tbody>
        </table>
        </div>
        <input type="hidden" name="token" value="<?php echo $token;?>">
        <button type="submit" class="ui-btn ui-btn-yellow">保存排序</button>
        </form>
        <!---->
    </div>
    
<script>
$(function()
{
    $('.ui-switch input[type=checkbox]').on('click',function()
	{
		var url=$(this).attr("data-url");
		var result=($(this).is(':checked'))?1:0;
		$.ajax(
		{
			url:url,
			type:"post",
			dataType:'json',
			data:"token=<?php echo $token;?>&islock="+result,
			error:function(e){alert(e.responseText);},
			success:function(d)
			{
				if(d.state=='success')
				{
					sdcms.success(d.msg);
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
})
</script>
</body>
</html>