<?php defined('IN_SDCMS') or die(); if(!defined('IN_SDCMS')) exit;?><!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="renderer" content="webkit">
<title>编辑内容</title>
<link rel="stylesheet" href="<?php echo WEB_ROOT;?>public/css/ui.css">
<link rel="stylesheet" href="<?php echo WEB_ROOT;?>public/select/select.css">
<link rel="stylesheet" href="<?php echo WEB_ROOT;?>public/admin/css/layout.css">
<script>var api_url="<?php echo U('upload/imagelist','type=3&multiple=1');?>";</script>
<script src="<?php echo WEB_ROOT;?>public/js/jquery.js"></script>
<script src="<?php echo WEB_ROOT;?>public/js/ui.js?v=202409"></script>
<script src="<?php echo WEB_ROOT;?>public/select/select.js"></script>
<script src="<?php echo WEB_ROOT;?>public/js/dropzone.js"></script>
<script src="<?php echo WEB_ROOT;?>public/js/sortable.min.js"></script>
<script src="<?php echo WEB_ROOT;?>public/admin/js/base.js"></script>
<script src="<?php echo WEB_ROOT;?>public/editor/editor.js?v=202409"></script>
</head>

<body>
    <div class="position">当前位置：<a href="<?php echo U('lists');?>">内容管理</a><?php echo get_content_postion($classid);?> > <a href="<?php echo U('edit','classid='.$classid.'&id='.$id.'');?>">编辑内容</a></div>
    <div class="borders">
        <!---->
        <form class="ui-form" method="post">
        <div class="ui-tabs ui-tabs-white">
            <ul class="ui-tabs-nav">
            	<?php foreach($group as $index=>$key) { ?>
                <?php $arr=explode("|",$key);?>
                <li<?php if ($index==0) { ?> class="active"<?php }?>><a href="javascript:void(0)"><?php echo $arr[0];?></a></li>
                <?php }?>
                <?php if (count($edata)>0) { ?>
                <li><a href="javascript:void(0)">内容扩展</a></li><?php }?>
            </ul>
            
            <div class="ui-tabs-content">
                
                <?php foreach($group as $index=>$key) { ?>
                <?php list(,$num)=explode("|",$key);?>
                <div class="ui-tabs-pane<?php if ($index==0) { ?> active<?php }?>">
                    <!--aaa-->
                    <?php if ($index==0) { ?>
                    <div class="ui-form-group ui-row<?php if (C('content_subid')==0) { ?> dis<?php }?>">
                        <label class="col-left ui-col-form-label">发布到其他栏目：</label>
                        <div class="col-right">
                            <select name="subid[]" placeholder="请选择" class="ui-form-ip selectbox" multiple>
                            <?php $cate=C('category');?>
                            <?php foreach($cate as $jc=>$rs) { ?>
                                <?php if (get_admin_info('pid')!=0) { ?>
                                    <?php $lever=explode(',',CATE_LEVER);?>
                                    <?php if (in_array($jc,$lever)) { ?>
                                         <option value="<?php echo $rs['cateid'];?>"<?php if ($rs['catetype']<0 || strpos($rs['sonid'],',') || $rs['cateid']==$classid || $rs['catetype']!=$model_id) { ?> disabled<?php } if (in_array($rs['cateid'],explode(",",trim($record['subid'],",")))) { ?> selected<?php }?>><?php echo str_repeat("　",$rs['depth']); echo $rs['catename'];?></option>
                                    <?php }?>
                                <?php } else { ?>
                                     <option value="<?php echo $rs['cateid'];?>"<?php if ($rs['catetype']<0 || strpos($rs['sonid'],',') || $rs['cateid']==$classid || $rs['catetype']!=$model_id) { ?> disabled<?php } if (in_array($rs['cateid'],explode(",",trim($record['subid'],",")))) { ?> selected<?php }?>><?php echo str_repeat("　",$rs['depth']); echo $rs['catename'];?></option>
                                <?php }?>
                            <?php }?>
                            </select>
                        </div>
                    </div>
                    <?php }?>
                    <?php if (isset($field[$num])) { ?>
                    <?php foreach($field[$num] as $rs) { ?>
                    <?php if ($rs['field_key']=='createdate') { ?>
                    <div class="ui-form-group ui-row">
                        <label class="col-left ui-col-form-label">定时发布：</label>
                        <div class="col-right col-right-top">
                            <label class="ui-radio"><input type="radio" name="isauto" id="isauto_0" value="0"<?php if ($record['isauto']==0) { ?> checked<?php }?>><i></i>否</label>
                            <label class="ui-radio"><input type="radio" name="isauto" id="isauto_1" value="1"<?php if ($record['isauto']==1) { ?> checked<?php }?>><i></i>是</label>                                                        							
                        </div>
                    </div>
                    <?php }?>
                    
                    <?php if ($rs['field_key']=='islock') { ?>
                    <div class="ui-form-group ui-row<?php if (C('user_open')==2 || $leverstate==0) { ?> dis<?php }?>">
                        <label class="col-left ui-col-form-label">阅读权限：</label>
                        <div class="col-right col-right-top">
                            <?php $array_rg=$this->db->load("select * from sd_user_group  where 1=1   order by ordnum,gid ",0,false,0);$total_rg=count($array_rg);if($total_rg==0){ ?>
<?php } else{ ?>
<?php $i=0;} foreach($array_rg as $rg){ $i++;?>
                            <label class="ui-checkbox"><input type="checkbox" name="view_lever[]" value="<?php echo $rg['gid'];?>"<?php if (in_array($rg['gid'],explode(',',$record['view_groupid']))) { ?> checked<?php }?>><i></i><?php echo $rg['gname'];?></label>
                            <?php } if($total_rg>0){ ?>
<?php }?>
                        </div>
                    </div>
                    <?php }?>
                    
                    <?php $islockshow=1;?>
                    <?php if ($rs['field_key']=='islock' && $pagelock==1) { ?>
                    <?php $islockshow=0;?>
                    <?php }?>
                    <?php if ($islockshow==1) { ?>
                    <div class="ui-form-group ui-row"<?php if ($rs['field_type']==7) { ?> style="display:none;"<?php }?>>
                        <label class="col-left ui-col-form-label"><?php echo $rs['field_title'];?>：</label>
                        <div class="<?php if (in_array($rs['field_type'],[12,13,15])) { ?>col-right-full<?php } else { ?>col-right<?php } if ($rs['field_type']==9) { ?> col-right-top<?php }?>">
                            <?php switch ($rs['field_type']){ case 1: ?>                            <?php if (in_array($rs['field_key'],['url','tags','showskin'])) { ?><div class="ui-input-group"><?php }?>                            <input type="text" name="<?php echo $rs['field_key'];?>" id="<?php echo $rs['field_key'];?>" class="ui-form-ip<?php if (in_array($rs['field_key'],['url','tags','showskin'])) { ?> radius-right-none<?php }?>"<?php if ($rs['field_length']!=0) { ?> maxlength="<?php echo $rs['field_length'];?>"<?php }?> value="<?php echo $record[$rs['field_key']];?>" <?php echo deal_rule($rs['field_rule'],$rs['field_title']);?>>                            <?php if ($rs['field_key']=='url') { ?>                            <a class="after fm-choose ui-icon-cloud-upload radius-none" data-name="<?php echo $rs['field_key'];?>" data-url="<?php echo U('upload/imageupload','type=3&multiple=0&thumb=0&water='.C('water_piclist').'');?>" data-type="<?php echo $rs['field_upload_type'];?>" data-multiple="0" title="上传">上传</a>                            <a class="after fm-choose ui-icon-select" data-name="<?php echo $rs['field_key'];?>" data-url="<?php echo U('upload/imagelist','type=3');?>" data-type="3" data-multiple="0" title="选择">选择</a>                            <?php }?>                            <?php if ($rs['field_key']=='tags') { ?>                            <a class="after ui-icon-select fm-tags" data-name="<?php echo $rs['field_key'];?>" data-url="<?php echo U('taglist');?>" title="选择">选择</a>                            <?php }?>                            <?php if ($rs['field_key']=='showskin') { ?>                            <a class="after ui-icon-select template" data-name="<?php echo $rs['field_key'];?>" data-url="<?php echo U('theme/template');?>" title="选择">选择</a>                            <?php }?>                            <?php if (in_array($rs['field_key'],['url','tags','showskin'])) { ?></div><?php }?>                            <?php break; ?>                            <?php case 2: ?><input type="text" name="<?php echo $rs['field_key'];?>" id="<?php echo $rs['field_key'];?>" class="ui-form-ip<?php if ($rs['field_key']!=='createdate') { ?> datepick<?php } else { ?> datepick-time<?php }?>" <?php if ($rs['field_length']!=0) { ?> maxlength="<?php echo $rs['field_length'];?>"<?php }?> value="<?php if ($rs['field_key']!=='createdate') {  echo date('Y-m-d',$record[$rs['field_key']]); } else {  echo date('Y-m-d H:i:s',$record[$rs['field_key']]); }?>" <?php echo deal_rule($rs['field_rule'],$rs['field_title']);?>><?php break; ?>                            <?php case 3: ?><input type="text" name="<?php echo $rs['field_key'];?>" id="<?php echo $rs['field_key'];?>" class="ui-form-ip"<?php if ($rs['field_length']!=0) { ?> maxlength="<?php echo $rs['field_length'];?>"<?php }?> value="<?php echo $record[$rs['field_key']];?>" <?php echo deal_rule($rs['field_rule'],$rs['field_title']);?>><?php break; ?>                            <?php case 4: ?><input type="text" name="<?php echo $rs['field_key'];?>" id="<?php echo $rs['field_key'];?>" class="ui-form-ip"<?php if ($rs['field_length']!=0) { ?> maxlength="<?php echo $rs['field_length'];?>"<?php }?> value="<?php echo $record[$rs['field_key']];?>" <?php echo deal_rule($rs['field_rule'],$rs['field_title']);?>><?php break; ?>                            <?php case 5: ?>                            <div class="ui-input-group">                            <input type="text" name="<?php echo $rs['field_key'];?>" id="<?php echo $rs['field_key'];?>" class="ui-form-ip radius-right-none"<?php if ($rs['field_length']!=0) { ?> maxlength="<?php echo $rs['field_length'];?>"<?php }?> value="<?php echo $record[$rs['field_key']];?>" <?php echo deal_rule($rs['field_rule'],$rs['field_title']);?>>                            <a class="after fm-choose ui-icon-cloud-upload radius-none" data-name="<?php echo $rs['field_key'];?>" data-url="<?php echo U('upload/imageupload','type='.$rs['field_upload_type'].'&multiple=0&thumb=0&water='.C('water_piclist').'');?>" data-type="<?php echo $rs['field_upload_type'];?>" data-multiple="0" title="上传">上传</a>                            <a class="after fm-choose ui-icon-select radius-none" data-name="<?php echo $rs['field_key'];?>" data-url="<?php echo U('upload/imagelist','type='.$rs['field_upload_type'].'');?>" data-type="<?php echo $rs['field_upload_type'];?>" data-multiple="0" title="选择">选择</a>                            <a class="after ui-lightbox ui-icon-zoomin" data-id="<?php echo $rs['field_key'];?>"<?php if ($rs['field_upload_type']==2) { ?> data-mode="video"<?php }?> data-name="lightbox-pic" title="<?php echo $rs['field_title'];?>">预览</a>                            </div>                            <?php break; ?>                            <?php case 6: ?><input type="password" name="<?php echo $rs['field_key'];?>" id="<?php echo $rs['field_key'];?>"<?php if ($rs['field_length']!=0) { ?> maxlength="<?php echo $rs['field_length'];?>"<?php }?> class="ui-form-ip" value="<?php echo $record[$rs['field_key']];?>" <?php echo deal_rule($rs['field_rule'],$rs['field_title']);?>><?php break; ?>                            <?php case 7: ?><input type="text" name="<?php echo $rs['field_key'];?>" id="<?php echo $rs['field_key'];?>" class="ui-form-ip"<?php if ($rs['field_length']!=0) { ?> maxlength="<?php echo $rs['field_length'];?>"<?php }?> value="<?php echo $record[$rs['field_key']];?>"><?php break; ?>                            <?php case 8: ?><textarea name="<?php echo $rs['field_key'];?>" class="ui-form-ip" id="<?php echo $rs['field_key'];?>" rows="3" cols="50" <?php echo deal_rule($rs['field_rule'],$rs['field_title']);?>><?php echo $record[$rs['field_key']];?></textarea><?php break; ?>                            <?php case 9: ?>                            <?php $arr=explode(",",$rs['field_list']);?>                            <?php foreach($arr as $j=>$key) { ?>                            <?php $data=explode("|",$key);?>                            <?php if ($rs['field_radio']==2) { ?><div class="input-group-check"><?php }?>                            <label class="ui-radio"><input type="radio" name="<?php echo $rs['field_key'];?>" value="<?php echo $data[1];?>" <?php echo deal_rule($rs['field_rule'],$rs['field_title'],1);?> <?php if ($record[$rs['field_key']]=="".$data[1]."") { ?> checked<?php }?>><i></i><?php echo $data[0];?></label>                                                        <?php if ($rs['field_radio']==2) { ?></div><?php }?>                            <?php }?>                            <?php if ($rs['field_key']=='islock' && $record[$rs['field_key']]<0) { ?>                            <label class="ui-radio"><input type="radio" name="islock" value="-1"<?php if ($record[$rs['field_key']]=="-1") { ?> checked<?php }?>><i></i>回收站</label>                            <?php }?>                            <?php break; ?>                            <?php case 10: ?>                            <div class="ui-pt"></div>                            <?php $arr=explode(",",$rs['field_list']);?>                            <?php foreach($arr as $j=>$key) { ?>                            <?php $data=explode("|",$key);?>                            <label class="ui-checkbox"><input type="checkbox" name="<?php echo $rs['field_key'];?>[]" value="<?php echo $data[1];?>" <?php echo deal_rule($rs['field_rule'],$rs['field_title'],1);?> <?php if (stristr(",".$record[$rs['field_key']].",",",".$data[1].",")) { ?> checked<?php }?>><i></i><?php echo $data[0];?></label>                            <?php }?>                            <?php break; ?>                            <?php case 11: ?>                            <select name="<?php echo $rs['field_key'];?>" id="<?php echo $rs['field_key'];?>" class="ui-form-ip" <?php echo deal_rule($rs['field_rule'],$rs['field_title']);?>>                            <option value="">请选择<?php echo $rs['field_title'];?></option>                            <?php $arr=explode(",",$rs['field_list']);?>                            <?php foreach($arr as $j=>$key) { ?>                            <?php $data=explode("|",$key);?>                            <option value="<?php echo $data[1];?>" <?php if ($record[$rs['field_key']]=="".$data[1]."") { ?> selected<?php }?>><?php echo $data[0];?></option>                            <?php }?>                            </select>                            <?php break; ?>                            <?php case 12: ?><script id="<?php echo $rs['field_key'];?>" name="<?php echo $rs['field_key'];?>" class="ui-editor" type="text/plain" <?php if ($rs['field_editor']==1) { ?>data-toolbar="mini"<?php }?>><?php echo $record[$rs['field_key']];?></script>                            <?php if ($rs['field_key']=='content') { ?>                            <label class="ui-checkbox ui-mt"><input type="checkbox" name="savepic" id="savepic" value="1"><i></i>提取正文中第1张图片为缩略图</label>                            <?php }?>                            <?php break; ?>							<?php case 13: ?>							<?php $data=jsdecode($record[$rs['field_key']],1);?>							<div class="ui-btn-group ui-mt-sm">                                <a class="ui-btn-group-item fm-choose ui-icon-cloud-upload" data-name="<?php echo $rs['field_key'];?>" data-url="<?php echo U('upload/imageupload','type=1&multiple=1&thumb=0&water='.C('water_piclist').'');?>" data-type="<?php echo $rs['field_upload_type'];?>" data-multiple="1" title="上传">上传</a>                                <a class="ui-btn-group-item fm-choose ui-icon-select" data-name="<?php echo $rs['field_key'];?>" data-url="<?php echo U('upload/imagelist','type=1&multiple=1&iseditor='.C('water_piclist').'');?>" data-type="<?php echo $rs['field_upload_type'];?>" data-multiple="1" title="选择">选择</a>                            </div>							<div class="imagelist">								<ul id="list_<?php echo $rs['field_key'];?>">									<?php if (is_array($data)) { ?>									<?php foreach($data as $num=>$val) { ?>									<li num="<?php echo $num;?>">										<div class="preview">											<input type="hidden" name="<?php echo $rs['field_key'];?>[<?php echo $num;?>][image]" value="<?php echo $val['image'];?>">											<u href="<?php echo $val['image'];?>" class="ui-lightbox"><img src="<?php echo $val['image'];?>" /></u>                                            <a href="javascript:;" class="fm-choose" data-name="preview" data-url="<?php echo U('upload/imageupload','type=1&multiple=1');?>" data-type="0" data-multiple="0" title="选择"><i class="ui-icon-image ui-mr-sm"></i>换图</a>										</div>										<div class="intro">											<textarea name="<?php echo $rs['field_key'];?>[<?php echo $num;?>][desc]" class="ui-form-ip" placeholder="图片描述..."><?php echo deal_strip($val['desc']);?></textarea>										</div>										<div class="action"><a href="javascript:;" class="img-left"><i class="ui-icon-left"></i>左移</a><a href="javascript:;" class="img-right"><i class="ui-icon-right"></i>右移</a><a href="javascript:;" class="img-del"><i class="ui-icon-delete"></i>删除</a></div>									</li>									<?php }?>									<?php }?>								</ul>							</div>							<?php break; ?>							<?php case 14: ?>                            <select name="<?php echo $rs['field_key'];?>" id="<?php echo $rs['field_key'];?>" class="ui-form-ip" <?php echo deal_rule($rs['field_rule'],$rs['field_title']);?>>                            <?php $table=$rs['field_table'];?>							<?php $join=$rs['field_join'];?>							<?php $where=$rs['field_where'];?>							<?php $order=$rs['field_order'];?>							<?php $value=$rs['field_value'];?>							<?php $label=$rs['field_label'];?>							<?php $default=$record[$rs['field_key']];?>							<?php if ($where=='') { ?>							<?php $where='1=1';?>							<?php }?>							<?php if ($order=='') { ?>							<?php $order="$value desc";?>							<?php }?>							<option value="">请选择<?php echo $rs['field_title'];?></option>							<?php $array_ra=$this->db->load("select * from $table $join where $where  order by $order ",0,false,0);$total_ra=count($array_ra);if($total_ra==0){ ?>
<?php } else{ ?>
<?php $i=0;} foreach($array_ra as $ra){ $i++;?>                            <option value="<?php echo $ra[''.$value.''];?>"<?php if ($default==$ra[''.$value.'']) { ?> selected<?php }?>><?php echo $ra[''.$label.''];?></option>							<?php } if($total_ra>0){ ?>
<?php }?>                            </select>							<?php break; ?>                            <?php case 15: ?>                            <?php $data=jsdecode($record[$rs['field_key']]);?>                            <div class="ui-btn-group ui-mt-sm">                            	<a class="ui-btn-group-item ui-icon-plus downlistadd" data-name="<?php echo $rs['field_key'];?>">添加</a>                                <a class="ui-btn-group-item fm-choose ui-icon-cloud-upload" data-name="<?php echo $rs['field_key'];?>" data-url="<?php echo U('upload/imageupload','type='.$rs['field_upload_type'].'&multiple=1&thumb=0&water='.C('water_piclist').'');?>" data-type="<?php echo $rs['field_upload_type'];?>" data-multiple="2" title="上传">上传</a>                                <a class="ui-btn-group-item fm-choose ui-icon-select" data-name="<?php echo $rs['field_key'];?>" data-url="<?php echo U('upload/imagelist','type='.$rs['field_upload_type'].'&multiple=1&iseditor='.C('water_piclist').'');?>" data-type="<?php echo $rs['field_upload_type'];?>" data-multiple="2" title="选择">选择</a>                            </div>                            <table class="ui-table ui-table-border ui-mt ui-w-auto">                                <thead class="ui-thead-gray">                                    <tr>                                        <th width="150">名称</th>                                        <th width="400">下载地址</th>                                        <th width="200">操作</th>                                    </tr>                                </thead>                                <tbody id="downlist_<?php echo $rs['field_key'];?>">                                    <?php if (is_array($data)) { ?>									<?php foreach($data as $num=>$val) { ?>                                    <tr num="<?php echo $num;?>">                                        <td><input type="text" name="<?php echo $rs['field_key'];?>[<?php echo $num;?>][name]" id="<?php echo $rs['field_key'];?>_name_<?php echo $num;?>" value="<?php echo $val['name'];?>" class="ui-form-ip" data-rule="名称:required;">                                        <td><input type="text" name="<?php echo $rs['field_key'];?>[<?php echo $num;?>][url]" id="<?php echo $rs['field_key'];?>_url_<?php echo $num;?>" value="<?php echo $val['url'];?>" class="ui-form-ip" data-rule="下载地址:required;">                                        <td>                                            <a href="javascript:;" class="down-prev mr-sm"><i class="ui-icon-up"></i>上移</a>                                            <a href="javascript:;" class="down-next mr-sm"><i class="ui-icon-down"></i>下移</a>                                            <a href="javascript:;" class="down-del"><i class="ui-icon-delete"></i>删除</a>                                        </td>                                    </tr>									<?php }?>									<?php }?>                                </tbody>                            </table>							<div class="downlist">								<ul id="list_<?php echo $rs['field_key'];?>"></ul>							</div>							<?php break; ?>                            <?php }?>
                            <?php if ($rs['field_tips']<>'') { ?><span class="input-tips"><?php echo $rs['field_tips'];?></span><?php }?>
                        </div>
                    </div>
                    <?php }?>
                    <?php }?>
                    
                    <?php }?>
                    <!--aaa-->
                </div>
                <?php }?>
                <?php if (count($edata)>0) { ?>
				<?php $extend=unserialize($extend);?>
                <div class="ui-tabs-pane">
					<?php foreach($edata as $rs) { ?>
					<div class="ui-form-group ui-row">
                        <label class="col-left ui-col-form-label"><?php echo $rs['field_title'];?>：</label>
                        <div class="col-right">
							<?php switch ($rs['field_type']){ case 1: ?><input type="text" name="extend[<?php echo $rs['field_key'];?>]" id="<?php echo $rs['field_key'];?>" class="ui-form-ip" value="<?php if (isset($extend[$rs['field_key']])) {  echo $extend[$rs['field_key']]; }?>" ><?php break; ?>                            <?php case 2: ?>                            <select name="extend[<?php echo $rs['field_key'];?>]" id="<?php echo $rs['field_key'];?>" class="ui-form-ip">                            <option value="">请选择<?php echo $rs['field_title'];?></option>                            <?php $arr=explode(",",$rs['field_list']);?>                            <?php foreach($arr as $j=>$key) { ?>                            <option value="<?php echo $key;?>" <?php if (isset($extend[$rs['field_key']])) {  if ($key=="".$extend[$rs['field_key']]."") { ?> selected<?php } }?>><?php echo $key;?></option>                            <?php }?>                            </select>                            <?php break; ?>							<?php }?>
						</div>
					</div>
					<?php }?>
				</div>
				<?php }?>              
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
	<?php if (C('content_subid')==1) { ?>
	
	$('.selectbox').SumoSelect(
	{ 
		csvDispCount:4, 
		captionFormat:'已选择：{0} 个', 
	});
	
	<?php }?>
	lay('.datepick').each(function()
	{
		laydate.render(
		{
			elem:this,
			trigger:'click'
		});
	});
	lay('.datepick-time').each(function()
	{
		laydate.render(
		{
			elem:this,
			type:'datetime',
			trigger:'click'
		});
	});
	<?php foreach($draglist as $key=>$val) { ?>
	Sortable.create($("#list_<?php echo $val;?>")[0],{animation:400});
	<?php }?>
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
                        setTimeout(function(){location.href='<?php echo $backurl;?>';},1500);
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