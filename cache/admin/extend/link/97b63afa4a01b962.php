<?php defined('IN_SDCMS') or die(); if(!defined('IN_SDCMS')) exit;?><!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="renderer" content="webkit">
<title>链接管理</title>
<link rel="stylesheet" href="<?php echo WEB_ROOT;?>public/css/ui.css">
<link rel="stylesheet" href="<?php echo WEB_ROOT;?>public/admin/css/layout.css">
<script src="<?php echo WEB_ROOT;?>public/js/jquery.js"></script>
<script src="<?php echo WEB_ROOT;?>public/js/ui.js?v=202409"></script>
</head>

<body>
    <div class="position">当前位置：扩展管理 > <a href="<?php echo THIS_LOCAL;?>">链接管理</a></div>
    <div class="border">
        <!---->
        <div class="navbar">
            <div class="lefter">
                <a href="javascript:;" data-url="<?php echo U('add');?>" class="add-iframe ui-btn ui-btn-info ui-mr-sm">添加链接</a>
                <a href="javascript:;" class="ui-btn ui-btn-info ui-dropdown-show ui-mr-sm" data-target="#dropdown-1">批量操作</a>
                <a href="<?php echo U('config');?>" class="ui-btn ui-btn-yellow ui-mr-sm">链接配置</a>
                
                <div class="ui-dropdown" id="dropdown-1">
                    <a href="javascript:;" class="ui-dropdown-item btach" type="1">批量启用</a>
                    <a href="javascript:;" class="ui-dropdown-item btach" type="2">批量锁定</a>
                    <a href="javascript:;" class="ui-dropdown-item btach" type="3">批量删除</a>
                </div>
                <span class="ui-btn-group ui-btn-group-yellow ui-btn-group-bg">
                    <a class="ui-btn-group-item<?php if ($type==0) { ?> active<?php }?>" href="<?php echo U('index','type=0');?>">全部</a>
                    <a class="ui-btn-group-item<?php if ($type==1) { ?> active<?php }?>" href="<?php echo U('index','type=1');?>">未审</a>
                    <a class="ui-btn-group-item<?php if ($type==2) { ?> active<?php }?>" href="<?php echo U('index','type=2');?>">已审</a>
                    <a class="ui-btn-group-item<?php if ($type==3) { ?> active<?php }?>" href="<?php echo U('index','type=3');?>">文字</a>
                    <a class="ui-btn-group-item<?php if ($type==4) { ?> active<?php }?>" href="<?php echo U('index','type=4');?>">Logo</a>
                </span>
            </div>            
        </div>

        <form method="post" class="ui-form">
        <div class="ui-table-wrap">
        <table class="ui-table ui-table-border ui-table-hover ui-table-striped ui-mb ui-mt">
            <thead class="ui-thead-gray">
                <tr>
                	<th width="30" height="30"><label class="ui-checkbox tips" data-align="right-top" data-title="全选/取消"><input type="checkbox" class="checkall" value=""><i></i></label></th>
                    <th width="80">排序</th>
                    <th width="80">ID</th>
                    <th>网站名称</th>
                    <th width="300">网址</th>
                    <?php if (C('link_class')==1) { ?><th width="130">分类</th><?php }?>
                    <th width="80">状态</th>
                    <th width="150">操作</th>
                </tr>
            </thead>
            <tbody>
            <?php $arr=explode("\r\n",C('link_class_data'));?>
            <?php $total_rs=$this->db->count("select count(1) from sd_link  where $where ");$pagesize=20;$totalpage=ceil($total_rs/$pagesize);if($page>$totalpage){
$page=1;}$offset=($page-1)*$pagesize;$way=0;if($offset>1000 && $total_rs>2000 && $offset>$total_rs/2){	$offset=$total_rs-$offset-$pagesize;	$way=1;}if($offset<0){	$pagesize+=$offset;	$offset=0;}$key_="id";$table_="sd_link";$join_="";$where_="where $where";$group_="";$order_="order by ordnum,id";$field_="*";$keylist=$this->db->getkeylist($key_,$table_,$join_,$where_,$order_,$offset,$pagesize,$way);$array_rs=$this->db->load("select $field_ from $table_ $join_ $keylist $group_ $order_");$pg=new sdcms_page($total_rs,$totalpage,$pagesize,$page);$showpage=$pg->showpage(5);if($total_rs==0){ ?>
            <tr>
                <td colspan="<?php if (C('link_class')==0) { ?>7<?php } else { ?>8<?php }?>">暂无资料</td>
            </tr>
            <?php } else{  $i=0;} foreach($array_rs as $rs){ $i++;?>
            
            <tr>
            	<td><label class="ui-checkbox"><input type="checkbox" name="id" value="<?php echo $rs['id'];?>"><i></i></label></td>
                <td><input type="hidden" name="mid[]" value="<?php echo $rs['id'];?>"><input type="text" class="ui-form-ip" name="ordnum[]" id="ordnum_<?php echo $rs['id'];?>" value="<?php echo $rs['ordnum'];?>" data-rule="required;int;"></td>
                <td><?php echo $rs['id'];?></td>
                <td class="ui-text-left"><?php echo $rs['webname'];?></td>
                <td class="ui-text-left"><a href="<?php echo $rs['weburl'];?>" target="_blank"><?php echo $rs['weburl'];?></a></td>
                <?php if (C('link_class')==1) { ?><td><?php foreach($arr as $key=>$val) {  list($a,$b)=explode('|',$val); if ($b==$rs['classid']) {  echo $a; } }?></td><?php }?>
                <td><label class="ui-switch ui-switch-info"><input type="checkbox" <?php if ($rs['islock']==1) { ?> checked<?php }?> data-url="<?php echo U('switchs','id='.$rs['id'].'');?>"><span class="ui-switch-checkbox ui-switch-text"></span></label></td>
                <td><a href="javascript:;" data-url="<?php echo U('edit',"id=".$rs['id']."");?>" class="edit-iframe"><span class="ui-icon-edit"></span> 编辑</a>　<a href="javascript:;" class="del" data-url="<?php echo U('del','id='.$rs['id'].'');?>"><span class="ui-icon-delete"></span> 删除</a></td>
            </tr>
            <?php } if($total_rs>0){  }?>
            </tbody>
        </table>
        </div>
        <?php if ($total_rs!=0) { ?>
        <div class="ui-page ui-page-right ui-page-info">
            <div class="ui-page-other"><input type="hidden" name="token" value="<?php echo $token;?>"><button type="submit" class="ui-btn ui-btn-yellow">保存排序</button></div>
            <div class="ui-page-list"><ul><?php echo $showpage;?></ul></div>
        </div>
        <?php }?>
        </form>
        <!---->
    </div>

<script>
$(function()
{
    $(".add-iframe").click(function()
	{
		var url=$(this).attr("data-url");
		$.dialogbox(
		{
			'title':"添加链接",
			'text':url,
			'width':'600px',
			'height':'390px',
			'type':3,
			'oktheme':'ui-btn-info',
			'ok':function(e)
			{
				e.iframe().contents().find("#sdcms-submit").click();
			}
		});
	});
	$(".edit-iframe").click(function()
	{
		var url=$(this).attr("data-url");
		$.dialogbox(
		{
			'title':"编辑链接",
			'text':url,
			'width':'600px',
			'height':'390px',
			'type':3,
			'oktheme':'ui-btn-info',
			'ok':function(e)
			{
				e.iframe().contents().find("#sdcms-submit").click();
			}
		});
	});
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
	$(".btach").click(function()
	{
		var type=$(this).attr("type");
		var data=[];
		$(".ui-form").find("input[type=checkbox]:checked").each(function()
		{
			if($(this).attr("class")!='checkall' && !$(this).closest("label").hasClass("ui-switch"))
			{
				data.push($(this).val());
			}
		});
        if(data.length==0)
        {
            sdcms.error('至少选择一条内容');
        }
        else
        {
            $.ajax(
			{
                type:'post',
                cache:false,
                dataType:'json',
                url:'<?php echo U("btach");?>',
                data:'token=<?php echo $token;?>&id='+data.join(",")+'&type='+type,
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