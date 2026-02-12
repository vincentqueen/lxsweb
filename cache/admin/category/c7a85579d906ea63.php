<?php defined('IN_SDCMS') or die(); if(!defined('IN_SDCMS')) exit;?><!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="renderer" content="webkit">
<title>编辑栏目</title>
<link rel="stylesheet" href="<?php echo WEB_ROOT;?>public/css/ui.css">
<link rel="stylesheet" href="<?php echo WEB_ROOT;?>public/admin/css/layout.css">
<script>var api_url="<?php echo U('upload/imagelist','type=3&multiple=1');?>";</script>
<script src="<?php echo WEB_ROOT;?>public/js/jquery.js"></script>
<script src="<?php echo WEB_ROOT;?>public/js/ui.js?v=202409"></script>
<script src="<?php echo WEB_ROOT;?>public/admin/js/base.js"></script>
<script src="<?php echo WEB_ROOT;?>public/js/dropzone.js"></script>
<script src="<?php echo WEB_ROOT;?>public/editor/editor.js?v=202409"></script>
<script>
$(function()
{
	$("#t1").change(function()
	{
		switch ($(this).val())
		{
			case "-1":
				$("#skins,#seo,#domain").removeClass("dis");
				$("#listskin,#pagenum").addClass("dis");
				$(".inner_class").addClass("ui-hide");
				$("input[name=t2]").removeClass("radius-right-none");
				$("#cateurl").html("别名：");
				break;
			case "-2":
				$("#skins,#seo,#pagenum,#domain").addClass("dis");
				$(".inner_class").removeClass("ui-hide");
				$("input[name=t2]").addClass("radius-right-none");
				$("#cateurl").html("链接网址：");
				break;
			default:
				$("#skins,#seo,#pagenum,#listskin,#domain").removeClass("dis");
				$(".inner_class").addClass("ui-hide");
				$("input[name=t2]").removeClass("radius-right-none");
				$("#cateurl").html("别名：");
			break;
		}
		if($('input[name="way"]:checked ').val()==2)
		{
			$("#domain").addClass("dis");
		}
	});
	<?php if ($catetype==-1) { ?>
		$("#skins,#seo,#domain").removeClass("dis");
		$("#listskin,#pagenum").addClass("dis");
		$(".inner_class").addClass("ui-hide");
		$("input[name=t2]").removeClass("radius-right-none");
		$("#cateurl").html("别名：");
	<?php } elseif ($catetype==-2) { ?>
		$("#skins,#seo,#pagenum,#domain").addClass("dis");
		$(".inner_class").removeClass("ui-hide");
		$("input[name=t2]").addClass("radius-right-none");
		$("#cateurl").html("链接网址：");
	<?php } else { ?>
		$("#skins,#seo,#pagenum,#listskin,#domain").removeClass("dis");
		$(".inner_class").addClass("ui-hide");
		$("input[name=t2]").removeClass("radius-right-none");
		$("#cateurl").html("别名：");
	<?php }?>
	$(".inner_class").change(function()
	{
		$("input[name=t2]").val($(this).val());
	})
})
</script>
</head>

<body>
    <div class="position">当前位置：<a href="<?php echo U('index');?>">栏目管理</a><?php echo $position;?> > <a href="<?php echo THIS_LOCAL;?>">编辑栏目</a></div>
    <div class="borders">
        <!---->
        <form class="ui-form" method="post">
        <div class="ui-tabs ui-tabs-white">
            <ul class="ui-tabs-nav">
                <li class="active"><a href="javascript:;">基本设置</a></li>
                <li id="seo"><a href="javascript:;">Seo设置</a></li>
                <li id="skins"><a href="javascript:;">模板设置</a></li>
                <?php if (count($field)>0) { ?><li id="extend"><a href="javascript:;">栏目扩展</a></li><?php }?>
            </ul>
            <div class="ui-tabs-content">
                <div class="ui-tabs-pane active">
                    <!--1111-->
                     <div class="ui-form-group ui-row">
                        <label class="col-left ui-col-form-label">栏目名称：</label>
                        <div class="col-right">
                            <input type="text" name="t0" class="ui-form-ip" value="<?php echo $catename;?>" data-rule="栏目名称:required;">
                        </div>
                    </div>
                    <div class="ui-form-group ui-row">
                        <label class="col-left ui-col-form-label">栏目类型：</label>
                        <div class="col-right">
                            <select class="ui-form-ip"<?php if ($total<=0) { ?> name="t1"<?php }?> id="t1" data-rule="栏目类型:required;"<?php if ($total!=0) { ?> disabled<?php }?>>
                                <option value="">请选择栏目类型</option>
                                <option value="-1"<?php if ($catetype==-1) { ?> selected<?php }?>>单页</option>
                                <option value="-2"<?php if ($catetype==-2) { ?> selected<?php }?>>链接</option>
                                <?php $array_rs=$this->db->load("select * from sd_model  where islock=1  order by ordnum,id ",0,false,0);$total_rs=count($array_rs);if($total_rs==0){ ?>
<?php } else{ ?>
<?php $i=0;} foreach($array_rs as $rs){ $i++;?>
                                <option value="<?php echo $rs['id'];?>"<?php if ($catetype==$rs['id']) { ?> selected<?php }?>><?php echo $rs['title'];?></option>
                                <?php } if($total_rs>0){ ?>
<?php }?>
                            </select>
                            <?php if ($total!=0) { ?><input type="hidden" name="t1" value="<?php echo $catetype;?>"><?php }?>
                            <span class="input-tips"><?php if ($total!=0) { ?>请先移动栏目下内容再修改<?php }?></span>
                        </div>
                    </div>
                    <div class="ui-form-group ui-row">
                    	<label class="col-left ui-col-form-label" id="cateurl">别名：</label>
                        <div class="col-right ui-input-group">
                            <input type="text" name="t2" class="ui-form-ip" value="<?php echo $cateurl;?>">
                            <select class="ui-form-ip after ui-hide inner_class" style="max-width:120px;">
                            	<option value="">内部栏目</option>
                                <option value="book">留言</option>
                                <option value="sitemap">地图</option>
                                <option value="tags">标签</option>
                                <option value="bbs">社区</option>
                                <option value="user">会员</option>
                                <option value="reg">注册</option>
                                <option value="login">登录</option>
                            </select>
                        </div>
                    </div>
                    <div class="ui-form-group ui-row" id="domain">
                        <label class="col-left ui-col-form-label">绑定域名：</label>
                        <div class="col-right">
                            <input type="text" name="t15" class="ui-form-ip" value="<?php echo $catedomain;?>"><span class="input-tips">例：news.baidu.com<?php if ($isbiz==0) { ?>，域名未授权，本功能无法使用。<?php }?></span>
                        </div>
                    </div>
                    <div class="ui-form-group ui-row" id="pagenum">
                        <label class="col-left ui-col-form-label">分页数量：</label>
                        <div class="col-right">
                            <input type="text" name="t3" class="ui-form-ip" value="<?php echo $catepage;?>">
                            <span class="input-tips">每页显示的数量</span>
                        </div>
                    </div>
                    <div class="ui-form-group ui-row">
                        <label class="col-left ui-col-form-label">排序：</label>
                        <div class="col-right">
                            <input type="text" name="t4" class="ui-form-ip" value="<?php echo $catenum;?>">
                            <span class="input-tips">数字越小越靠前</span>
                        </div>
                    </div>
                    <div class="ui-form-group ui-row">
                        <label class="col-left ui-col-form-label">属性设置：</label>
                        <div class="col-right col-right-top">
                            <label class="ui-checkbox"><input type="checkbox" name="t5[]" value="1"<?php if ($isshow==1) { ?> checked<?php }?>><i></i>导航显示</label>
                            <label class="ui-checkbox"><input type="checkbox" name="t13[]" value="1"<?php if ($isblank==1) { ?> checked<?php }?>><i></i>新窗口</label>
                            <label class="ui-checkbox"><input type="checkbox" name="t14[]" value="1"<?php if ($isfilter==1) { ?> checked<?php }?>><i></i>列表筛选</label>
                        </div>
                    </div>
                    <div class="ui-form-group ui-row">
                        <label class="col-left ui-col-form-label">内容扩展：</label>
                        <div class="col-right">
                            <select class="ui-form-ip" name="t11">
                                <option value="0">请选择内容扩展</option>
                                <?php $array_rs=$this->db->load("select * from sd_extend  where islock=1  order by ordnum,id ",0,false,0);$total_rs=count($array_rs);if($total_rs==0){ ?>
<?php } else{ ?>
<?php $i=0;} foreach($array_rs as $rs){ $i++;?>
                                <option value="<?php echo $rs['id'];?>"<?php if ($cate_extend==$rs['id']) { ?> selected<?php }?>><?php echo $rs['title'];?></option>
                                <?php } if($total_rs>0){ ?>
<?php }?>
                            </select>
                        </div>
                    </div>
                    <div class="ui-form-group ui-row<?php if (C('user_open')==2) { ?> dis<?php }?>">
                        <label class="col-left ui-col-form-label">阅读权限：</label>
                        <div class="col-right col-right-top">
                            <?php $array_rs=$this->db->load("select * from sd_user_group  where 1=1   order by ordnum,gid ",0,false,0);$total_rs=count($array_rs);if($total_rs==0){ ?>
<?php } else{ ?>
<?php $i=0;} foreach($array_rs as $rs){ $i++;?>
                            <label class="ui-checkbox">
                                <input type="checkbox" name="t16[]" value="<?php echo $rs['gid'];?>"<?php if (in_array($rs['gid'],explode(',',$cate_groupid))) { ?> checked<?php }?>><i></i><?php echo $rs['gname'];?>
                            </label>
                            <?php } if($total_rs>0){ ?>
<?php }?>
                        </div>
                    </div>
                    <div class="ui-form-group ui-row">
                        <label class="col-left ui-col-form-label">应用到子栏目</label>
                        <div class="col-right col-right-top">
                            <label class="ui-checkbox"><input type="checkbox" name="t12[]" value="1"><i></i>模板</label>
                            <label class="ui-checkbox"><input type="checkbox" name="t12[]" value="2"><i></i>分页数量</label>
                            <label class="ui-checkbox"><input type="checkbox" name="t12[]" value="3"><i></i>内容扩展</label>
                            <label class="ui-checkbox"><input type="checkbox" name="t12[]" value="4"><i></i>列表筛选</label>
                            <label class="ui-checkbox"><input type="checkbox" name="t12[]" value="5"><i></i>阅读权限</label>
                        </div>
                    </div>
                    <!--1111-->
                </div>
                
                <div class="ui-tabs-pane">
                    <!--2222-->
                    <div class="ui-form-group ui-row">
                        <label class="col-left ui-col-form-label">优化标题：</label>
                        <div class="col-right">
                            <input type="text" name="t6" class="ui-form-ip" value="<?php echo $catetitle;?>">
                        </div>
                    </div>
                    <div class="ui-form-group ui-row">
                        <label class="col-left ui-col-form-label">关键字：</label>
                        <div class="col-right">
                            <input type="text" name="t7" class="ui-form-ip" value="<?php echo $catekey;?>">
                        </div>
                    </div>
                    <div class="ui-form-group ui-row">
                        <label class="col-left ui-col-form-label">描述：</label>
                        <div class="col-right">
                            <textarea name="t8" rows="4" class="ui-form-ip ui-form-limit" data-max="255"><?php echo $catedesc;?></textarea>
                            <div class="ui-form-limit-text"><span><?php echo mb_strlen($catedesc);?></span>/255</div>
                        </div>
                    </div>
                    <!--2222-->
                </div>
                
                <div class="ui-tabs-pane">
                    <!--3333-->
                    <div class="ui-form-group ui-row" id="listskin">
                        <label class="col-left ui-col-form-label">列表模板：</label>
                        <div class="col-right">
                        	<div class="ui-input-group">
                            	<input type="text" name="t9" id="t9" class="ui-form-ip radius-right-none" value="<?php echo $catelist;?>">
                                <a class="after template ui-icon-select" data-name="t9" data-url="<?php echo U('theme/template');?>" title="选择">选择</a>
                            </div>
                        </div>
                    </div>
                    <div class="ui-form-group ui-row">
                        <label class="col-left ui-col-form-label">内容模板：</label>
                        <div class="col-right">
                        	<div class="ui-input-group">
                            	<input type="text" name="t10" id="t10" class="ui-form-ip radius-right-none" value="<?php echo $cateshow;?>">
                                <a class="after template ui-icon-select" data-name="t10" data-url="<?php echo U('theme/template');?>" title="选择">选择</a>
                            </div>
                        </div>
                    </div>
                    <!--3333-->
                </div>
                
                <div class="ui-tabs-pane">
                    <!--4444-->
                    <?php foreach($field as $rs) { ?>
                    <div class="ui-form-group ui-row"<?php if ($rs['field_type']==7) { ?> style="display:none;"<?php }?>>
                        <label class="col-left ui-col-form-label"><?php echo $rs['field_title'];?>：</label>
                        <div class="<?php if (in_array($rs['field_type'],[12,13,15])) { ?>col-right-full<?php } else { ?>col-right<?php } if (in_array($rs['field_type'],[9,10])) { ?> col-form-label<?php }?>">
                            <?php switch ($rs['field_type']){ case 1: ?><input type="text" name="<?php echo $rs['field_key'];?>" id="<?php echo $rs['field_key'];?>" class="ui-form-ip"<?php if ($rs['field_length']!=0) { ?> maxlength="<?php echo $rs['field_length'];?>"<?php }?> value="<?php echo $record[$rs['field_key']];?>" <?php echo deal_rule($rs['field_rule'],$rs['field_title']);?>><?php break; ?>                                <?php case 2: ?><input type="text" name="<?php echo $rs['field_key'];?>" id="<?php echo $rs['field_key'];?>" class="ui-form-ip datepick"<?php if ($rs['field_length']!=0) { ?> maxlength="<?php echo $rs['field_length'];?>"<?php }?> value="<?php echo date('Y-m-d',$record[$rs['field_key']]);?>" readonly <?php echo deal_rule($rs['field_rule'],$rs['field_title']);?>><?php break; ?>                                <?php case 3: ?><input type="text" name="<?php echo $rs['field_key'];?>" id="<?php echo $rs['field_key'];?>" class="ui-form-ip"<?php if ($rs['field_length']!=0) { ?> maxlength="<?php echo $rs['field_length'];?>"<?php }?> value="<?php echo $record[$rs['field_key']];?>" <?php echo deal_rule($rs['field_rule'],$rs['field_title']);?>><?php break; ?>                                <?php case 4: ?><input type="text" name="<?php echo $rs['field_key'];?>" id="<?php echo $rs['field_key'];?>" class="ui-form-ip"<?php if ($rs['field_length']!=0) { ?> maxlength="<?php echo $rs['field_length'];?>"<?php }?> value="<?php echo $record[$rs['field_key']];?>" <?php echo deal_rule($rs['field_rule'],$rs['field_title']);?>><?php break; ?>                                <?php case 5: ?>                                <div class="ui-input-group">                                <input type="text" name="<?php echo $rs['field_key'];?>" id="<?php echo $rs['field_key'];?>" class="ui-form-ip radius-right-none"<?php if ($rs['field_length']!=0) { ?> maxlength="<?php echo $rs['field_length'];?>"<?php }?> value="<?php echo $record[$rs['field_key']];?>" <?php echo deal_rule($rs['field_rule'],$rs['field_title']);?>>                                <a class="after fm-choose ui-icon-cloud-upload radius-none" data-name="<?php echo $rs['field_key'];?>" data-url="<?php echo U('upload/imageupload','type='.$rs['field_upload_type'].'&&multiple=0&thumb=0&water='.C('water_piclist').'');?>" data-type="<?php echo $rs['field_upload_type'];?>" data-multiple="0" title="上传">上传</a>                                    <a class="after fm-choose ui-icon-select<?php if ($rs['field_upload_type']==1) { ?> radius-none<?php }?>" data-name="<?php echo $rs['field_key'];?>" data-url="<?php echo U('upload/imagelist','type='.$rs['field_upload_type'].'&multiple=0&thumb=0&water=0');?>" data-type="<?php echo $rs['field_upload_type'];?>" data-multiple="0" title="选择">选择</a>                                    <?php if ($rs['field_upload_type']==1) { ?><a class="after ui-lightbox ui-icon-zoomin" data-id="<?php echo $rs['field_key'];?>"<?php if ($rs['field_upload_type']==2) { ?> data-mode="video"<?php }?> data-name="lightbox-<?php echo $rs['field_key'];?>" title="<?php echo $rs['field_title'];?>">预览</a><?php }?>                                </div>                                <?php break; ?>                                <?php case 6: ?><input type="password" name="<?php echo $rs['field_key'];?>" id="<?php echo $rs['field_key'];?>"<?php if ($rs['field_length']!=0) { ?> maxlength="<?php echo $rs['field_length'];?>"<?php }?> class="ui-form-ip" value="<?php echo $record[$rs['field_key']];?>" <?php echo deal_rule($rs['field_rule'],$rs['field_title']);?>><?php break; ?>                                <?php case 7: ?><input type="text" name="<?php echo $rs['field_key'];?>" id="<?php echo $rs['field_key'];?>"<?php if ($rs['field_length']!=0) { ?> maxlength="<?php echo $rs['field_length'];?>"<?php }?> class="ui-form-ip" value="<?php echo $record[$rs['field_key']];?>"><?php break; ?>                                <?php case 8: ?><textarea name="<?php echo $rs['field_key'];?>" class="ui-form-ip" id="<?php echo $rs['field_key'];?>" rows="3" cols="50" <?php echo deal_rule($rs['field_rule'],$rs['field_title']);?>><?php echo $record[$rs['field_key']];?></textarea><?php break; ?>                                <?php case 9: ?>                                <?php $arr=explode(",",$rs['field_list']);?>                                <?php foreach($arr as $j=>$key) { ?>                                <?php $data=explode("|",$key);?>                                	<?php if ($rs['field_radio']==2) { ?><div class="input-group-check"><?php }?>                                    <label class="ui-radio"><input type="radio" name="<?php echo $rs['field_key'];?>" value="<?php echo $data[1];?>"<?php echo deal_rule($rs['field_rule'],$rs['field_title']);?> <?php if ($record[$rs['field_key']]=="".$data[1]."") { ?> checked<?php }?>>                                    <i></i><?php echo $data[0];?></label>                                    <?php if ($rs['field_radio']==2) { ?></div><?php }?>                                <?php }?>                                <?php break; ?>                                <?php case 10: ?>                                <?php $arr=explode(",",$rs['field_list']);?>                                <?php foreach($arr as $j=>$key) { ?>                                <?php $data=explode("|",$key);?>                                	 <label class="ui-checkbox"><input type="checkbox" name="<?php echo $rs['field_key'];?>[]" value="<?php echo $data[1];?>" <?php echo deal_rule($rs['field_rule'],$rs['field_title']);?> <?php if (stristr(",".$record[$rs['field_key']].",",",".$data[1].",")) { ?> checked<?php }?>><i></i><?php echo $data[0];?></label>                                <?php }?>                                <?php break; ?>                                <?php case 11: ?>                                <select name="<?php echo $rs['field_key'];?>" id="<?php echo $rs['field_key'];?>" class="ui-form-ip" <?php echo deal_rule($rs['field_rule'],$rs['field_title']);?>>                                <?php $arr=explode(",",$rs['field_list']);?>                                <?php foreach($arr as $j=>$key) { ?>                                <?php $data=explode("|",$key);?>                                <option value="<?php echo $data[1];?>" <?php if ($record[$rs['field_key']]=="".$data[1]."") { ?> selected<?php }?>><?php echo $data[0];?></option>                                <?php }?>                                </select>                                <?php break; ?>                                <?php case 12: ?><script id="<?php echo $rs['field_key'];?>" name="<?php echo $rs['field_key'];?>" class="ui-editor" type="text/plain" <?php if ($rs['field_editor']==1) { ?>data-toolbar="mini"<?php }?>><?php echo $record[$rs['field_key']];?></script>                                <?php break; ?>                        <?php }?>
                        <?php if ($rs['field_tips']<>'') { ?><span class="input-tips"><?php echo $rs['field_tips'];?></span><?php }?>
                        </div>
                    </div>
                    <?php }?>
                    <!--4444-->
                </div>
                
            </div>
        </div>
        
        <div class="ui-form-group ui-mt">
        	<input type="hidden" name="token" value="<?php echo $token;?>">
            <button type="submit" class="ui-btn ui-btn-info ui-mr-sm">保存</button>
            <button type="button" class="ui-btn ui-back">返回</button>
        </div>
        </form>
        <!---->
    </div>
<script src="<?php echo WEB_ROOT;?>public/datepick/laydate.js"></script>
<script>
$(function()
{
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
                        setTimeout(function(){location.href='<?php echo U("index","fid=".$fid."");?>';},1500);
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
</script>
</body>
</html>