<?php defined('IN_SDCMS') or die(); if(!defined('IN_SDCMS')) exit;?><!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="renderer" content="webkit">
<title>编辑字段</title>
<link rel="stylesheet" href="<?php echo WEB_ROOT;?>public/css/ui.css">
<link rel="stylesheet" href="<?php echo WEB_ROOT;?>public/admin/css/layout.css">
<script src="<?php echo WEB_ROOT;?>public/js/jquery.js"></script>
<script src="<?php echo WEB_ROOT;?>public/js/ui.js?v=202409"></script>
</head>

<body>
    <div class="position">当前位置：栏目管理 > <a href="<?php echo U('model/index');?>">模型管理</a> > <a href="<?php echo U('index',"mid=".$mid."");?>"><?php echo $mtitle;?></a> > <a href="<?php echo U('index',"mid=".$mid."");?>">字段管理</a> > <a href="<?php echo THIS_LOCAL;?>">编辑字段</a></div>
    <div class="borders">
        <!---->
        
        <div class="ui-tabs ui-tabs-white" data-href="1">
            <ul class="ui-tabs-nav">
              <li class="active"><a href="<?php echo THIS_LOCAL;?>">编辑字段</a></li>
            </ul>
            <div class="ui-tabs-content">
                <div class="ui-tabs-pane active">
                    <!--loop-->
                    <form class="ui-form" method="post">
                        <div class="ui-form-group ui-row">
                            <label class="col-left ui-col-form-label">字段名称：</label>
                            <div class="col-right">
                                <input type="text" name="t0" class="ui-form-ip" value="<?php echo $field_title;?>" placeholder="请输入字段名称" data-rule="字段名称:required;">
                            </div>
                        </div>
                        <div class="ui-form-group ui-row">
                            <label class="col-left ui-col-form-label">字段Key：</label>
                            <div class="col-right">
                                <input type="text" name="t1" class="ui-form-ip" value="<?php echo $field_key;?>" disabled="disabled">
                            </div>
                        </div>
                        <div class="ui-form-group ui-row">
                            <label class="col-left ui-col-form-label">字段类型：</label>
                            <div class="col-right">
                                <select name="t2" class="ui-form-ip" data-rule="字段类型:required;" disabled>
                                    <option value="">请选择字段类型</option>
                                    <option value="1"<?php if ($field_type==1) { ?> selected<?php }?>>普通文本</option>
                                    <option value="2"<?php if ($field_type==2) { ?> selected<?php }?>>普通文本-日期</option>
                                    <option value="3"<?php if ($field_type==3) { ?> selected<?php }?>>普通文本-整数</option>
                                    <option value="4"<?php if ($field_type==4) { ?> selected<?php }?>>普通文本-价格</option>
                                    <option value="5"<?php if ($field_type==5) { ?> selected<?php }?>>普通文本-上传</option>
                                    <option value="6"<?php if ($field_type==6) { ?> selected<?php }?>>普通文本-密码</option>
                                    <option value="7"<?php if ($field_type==7) { ?> selected<?php }?>>普通文本-隐藏域</option>
                                    <option value="8"<?php if ($field_type==8) { ?> selected<?php }?>>多行文本框</option>
                                    <option value="9"<?php if ($field_type==9) { ?> selected<?php }?>>单选按钮</option>
                                    <option value="10"<?php if ($field_type==10) { ?> selected<?php }?>>复选框</option>
                                    <option value="11"<?php if ($field_type==11) { ?> selected<?php }?>>下拉列表</option>
                                    <option value="12"<?php if ($field_type==12) { ?> selected<?php }?>>编辑器</option>
                                    <option value="13"<?php if ($field_type==13) { ?> selected<?php }?>>图集</option>
                                    <option value="14"<?php if ($field_type==14) { ?> selected<?php }?>>数据集</option>
                                    <option value="15"<?php if ($field_type==15) { ?> selected<?php }?>>下载集</option>
                                </select>
                            </div>
                        </div>
                        <div class="ui-form-group ui-row dis" id="upload_type">
                            <label class="col-left ui-col-form-label">上传类型：</label>
                            <div class="col-right">
                                <select name="t3" class="ui-form-ip" data-rule="上传类型:required;">
                                    <option value="">请选择上传类型</option>
                                    <option value="1"<?php if ($field_upload_type==1) { ?> selected<?php }?>>只能上传图片</option>
                                    <option value="2"<?php if ($field_upload_type==2) { ?> selected<?php }?>>只能上传视频</option>
                                    <option value="3"<?php if ($field_upload_type==3) { ?> selected<?php }?>>全部都可以上传</option>
                                </select>
                            </div>
                        </div>
                        <div class="ui-form-group ui-row dis" id="editor_type">
                            <label class="col-left ui-col-form-label">编辑器模式：</label>
                            <div class="col-right">
                                <select name="t4" class="ui-form-ip" data-rule="编辑器模式:required;">
                                    <option value="">请选择编辑器模式</option>
                                    <option value="1"<?php if ($field_editor==1) { ?> selected<?php }?>>精简模式</option>
                                    <option value="2"<?php if ($field_editor==2) { ?> selected<?php }?>>全功能模式</option>
                                </select>
                            </div>
                        </div>
                        <div class="ui-form-group ui-row dis" id="listval">
                            <label class="col-left ui-col-form-label">候选值：</label>
                            <div class="col-right">
                                <textarea name="t5" class="ui-form-ip" rows="5" cols="50" data-rule="候选值:required;"><?php echo $field_list;?></textarea>
                                <span class="gray">示范：项目名称1|项目值1<br>　　　项目名称2|项目值2</span>
                            </div>
                        </div>
                        <div class="ui-form-group ui-row dis" id="field_select">
                            <label class="col-left ui-col-form-label">作为筛选字段：</label>
                            <div class="col-right col-right-top">
                                <label class="ui-radio"><input type="radio" name="t14" id="t14_1" value="1" <?php if ($field_filter==1) { ?> checked<?php }?>><i></i>是</label>
                                <label class="ui-radio"><input type="radio" name="t14" id="t14_0" value="0" <?php if ($field_filter==0) { ?> checked<?php }?>><i></i>否</label>
                            </div>
                        </div>
                        <div class="ui-form-group ui-row dis" id="field_radio">
                            <label class="col-left ui-col-form-label">排列方式：</label>
                            <div class="col-right col-right-top">
                                <label class="ui-radio"><input type="radio" name="t6" id="t6_1" value="1" <?php if ($field_radio==1) { ?> checked<?php }?>><i></i>横排</label>
                                <label class="ui-radio"><input type="radio" name="t6" id="t6_2" value="2" <?php if ($field_radio==2) { ?> checked<?php }?>><i></i>竖排</label>
                            </div>
                        </div>
                        <div class="ui-form-group ui-row field_data dis">
                            <label class="col-left ui-col-form-label">数据表：</label>
                            <div class="col-right">
                                <input type="text" name="t15" class="ui-form-ip" value="<?php echo $field_table;?>" data-rule="数据表:required;"><span class="input-tips">示范：sd_model_news</span>
                            </div>
                        </div>
                        <div class="ui-form-group ui-row field_data dis">
                            <label class="col-left ui-col-form-label">Join参数：</label>
                            <div class="col-right">
                                <input type="text" name="t16" class="ui-form-ip" value="<?php echo $field_join;?>"><span class="input-tips">可以为空，示范：left join sd_content on sd_model_news.cid=sd_content.id</span>
                            </div>
                        </div>
                        <div class="ui-form-group ui-row field_data dis">
                            <label class="col-left ui-col-form-label">Where参数：</label>
                            <div class="col-right">
                                <input type="text" name="t17" class="ui-form-ip" value="<?php echo $field_where;?>"><span class="input-tips">可以为空，示范：islock=1</span>
                            </div>
                        </div>
                        <div class="ui-form-group ui-row field_data dis">
                            <label class="col-left ui-col-form-label">Order参数：</label>
                            <div class="col-right">
                                <input type="text" name="t18" class="ui-form-ip" value="<?php echo $field_order;?>"><span class="input-tips">可以为空，示范：id desc</span>
                            </div>
                        </div>
                        <div class="ui-form-group ui-row field_data dis">
                            <label class="col-left ui-col-form-label">项目值：</label>
                            <div class="col-right">
                                <input type="text" name="t19" class="ui-form-ip" value="<?php echo $field_value;?>" data-rule="项目值:required;"><span class="input-tips">示范：id</span>
                            </div>
                        </div>
                        <div class="ui-form-group ui-row field_data dis">
                            <label class="col-left ui-col-form-label">项目标签：</label>
                            <div class="col-right">
                                <input type="text" name="t20" class="ui-form-ip" value="<?php echo $field_label;?>" data-rule="项目标签:required;"><span class="input-tips">示范：title</span>
                            </div>
                        </div>
                        <div class="ui-form-group ui-row dis" id="maxlength">
                            <label class="col-left ui-col-form-label">最大输入长度：</label>
                            <div class="col-right">
                                <input type="text" name="t7" class="ui-form-ip" value="<?php echo $field_length;?>"><span class="input-tips">0-255，为0时表示不限制</span>
                            </div>
                        </div>
                        <div class="ui-form-group ui-row">
                            <label class="col-left ui-col-form-label">默认值：</label>
                            <div class="col-right">
                                <input type="text" name="t8" class="ui-form-ip" value="<?php echo $field_default;?>">
                            </div>
                        </div>
                        <div class="ui-form-group ui-row">
                            <label class="col-left ui-col-form-label">提示文字：</label>
                            <div class="col-right">
                                <input type="text" name="t9" class="ui-form-ip" value="<?php echo $field_tips;?>">
                            </div>
                        </div>
                        <div class="ui-form-group ui-row">
                            <label class="col-left ui-col-form-label">验证规则：</label>
                            <div class="col-right">
                                <select name="t10" class="ui-form-ip" >
                                    <option value="0"<?php if ($field_rule==0) { ?> selected<?php }?>>不验证</option>
                                    <option value="1"<?php if ($field_rule==1) { ?> selected<?php }?>>不能为空</option>
                                    <option value="2"<?php if ($field_rule==2) { ?> selected<?php }?>>日期格式</option>
                                    <option value="3"<?php if ($field_rule==3) { ?> selected<?php }?>>整数格式</option>
                                    <option value="4"<?php if ($field_rule==4) { ?> selected<?php }?>>小数格式</option>
                                    <option value="5"<?php if ($field_rule==5) { ?> selected<?php }?>>电话格式</option>
                                    <option value="6"<?php if ($field_rule==6) { ?> selected<?php }?>>手机格式</option>
                                    <option value="7"<?php if ($field_rule==7) { ?> selected<?php }?>>邮箱</option>
                                    <option value="8"<?php if ($field_rule==8) { ?> selected<?php }?>>邮编格式</option>
                                    <option value="9"<?php if ($field_rule==9) { ?> selected<?php }?>>QQ号码格式</option>
                                    <option value="10"<?php if ($field_rule==10) { ?> selected<?php }?>>网址格式</option>
                                    <option value="11"<?php if ($field_rule==11) { ?> selected<?php }?>>用户名</option>
                                    <option value="12"<?php if ($field_rule==12) { ?> selected<?php }?>>密码</option>
                                    <option value="13"<?php if ($field_rule==13) { ?> selected<?php }?>>身份证</option>
                                </select>
                            </div>
                        </div>
                        <div class="ui-form-group ui-row">
                            <label class="col-left ui-col-form-label">表单分组：</label>
                            <div class="col-right">
                                <select name="t13" class="ui-form-ip" data-rule="表单分组:required;">
                                    <option value="">请选择表单分组</option>
                                    <?php foreach($group as $key) { ?>
                                    <?php $arr=explode("|",$key);?>
                                    <option value="<?php echo $arr[1];?>"<?php if ($field_group==$arr[1]) { ?> selected<?php }?>><?php echo $arr[0];?></option>
                                    <?php }?>
                                </select>
                            </div>
                        </div>
                        <div class="ui-form-group ui-row">
                            <label class="col-left ui-col-form-label">字段排序：</label>
                            <div class="col-right">
                                <input type="text" name="t11" class="ui-form-ip" value="<?php echo $ordnum;?>">
                                <span class="input-tips">数字越小越靠前</span>
                            </div>
                        </div>
                        <div class="ui-form-group ui-row<?php if (substr($field_key,0,2)!='my') { ?> dis<?php }?>">
                            <label class="col-left ui-col-form-label">类型转换：</label>
                            <div class="col-right col-right-top">
                                <label class="ui-radio"><input type="radio" name="t21" id="t21_1" value="1" <?php if ($issys==1) { ?> checked<?php }?>><i></i>系统字段</label>
                                <label class="ui-radio"><input type="radio" name="t21" id="t21_2" value="0" <?php if ($issys==0) { ?> checked<?php }?>><i></i>用户字段</label>
                            </div>
                        </div>
                        <div class="ui-form-group ui-row">
                            <label class="col-left ui-col-form-label">状态：</label>
                            <div class="col-right col-right-top">
                                <label class="ui-radio"><input type="radio" name="t12" id="t12_1" value="1" <?php if ($islock==1) { ?> checked<?php }?>><i></i>正常</label>
                                <label class="ui-radio"><input type="radio" name="t12" id="t12_2" value="0" <?php if ($islock==0) { ?> checked<?php }?>><i></i>锁定</label>
                            </div>
                        </div>
                        <div class="ui-form-group ui-row">
                            <label class="col-left ui-col-form-label"></label>
                            <div class="col-right">
                            	<input type="hidden" name="token" value="<?php echo $token;?>">
                                <button type="submit" class="ui-btn ui-btn-info ui-mr">保存</button>
                                <button type="button" class="ui-btn ui-back">返回</button>
                            </div>
                        </div>
                    </form>
                    <!--loop-->
                </div>
            </div>
        </div>
        
        <!---->
    </div>


<script>
$(function()
{
    <?php if ($field_type==1||$field_type==2||$field_type==3||$field_type==4||$field_type==6||$field_type==7) { ?>
    $("#upload_type,#listval,#field_radio,#editor_type,#field_select,.field_data").addClass("dis");
    $("#maxlength").removeClass("dis");
    <?php } elseif ($field_type==5) { ?>
    $("#listval,#field_radio,#editor_type,#field_select,.field_data").addClass("dis");
    $("#upload_type,#maxlength").removeClass("dis");
    <?php } elseif ($field_type==9) { ?>
    $("#upload_type,#maxlength,#editor_type,.field_data").addClass("dis");
    $("#listval,#field_select,#field_radio").removeClass("dis");
    <?php } elseif ($field_type==10) { ?>
    $("#upload_type,#maxlength,#field_radio,#editor_type,.field_data").addClass("dis");
    $("#listval,#field_select").removeClass("dis");
	<?php } elseif ($field_type==11) { ?>
    $("#upload_type,#maxlength,#field_radio,#editor_type,.field_data").addClass("dis");
    $("#listval,#field_select").removeClass("dis");
    <?php } elseif ($field_type==12) { ?>
    $("#upload_type,#maxlength,#field_radio,#listval,#field_select,.field_data").addClass("dis");
    $("#editor_type").removeClass("dis");
	<?php } elseif ($field_type==14) { ?>
	$("#upload_type,#listval,#field_radio,#editor_type,#maxlength").addClass("dis");
	$(".field_data,#field_select").removeClass("dis");
	<?php } elseif ($field_type==15) { ?>
	$("#listval,#field_radio,#editor_type,#field_select,.field_data,#maxlength").addClass("dis");
	$("#upload_type").removeClass("dis");
    <?php } else { ?>
    $("#upload_type,#maxlength,#listval,#field_radio,#editor_type,#field_select,.field_data").addClass("dis");
    <?php }?>
	$(".ui-form").form(
	{
		type:2,
		align:'top-right',
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
                       	setTimeout(function(){location.href='<?php echo U("index","mid=".$model_id."");?>';},1500);
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
</body>
</html>