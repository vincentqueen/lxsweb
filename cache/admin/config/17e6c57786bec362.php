<?php defined('IN_SDCMS') or die(); if(!defined('IN_SDCMS')) exit;?><!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="renderer" content="webkit">
<title>网站设置</title>
<link rel="stylesheet" href="<?php echo WEB_ROOT;?>public/css/ui.css">
<link rel="stylesheet" href="<?php echo WEB_ROOT;?>public/admin/css/layout.css">
<script src="<?php echo WEB_ROOT;?>public/js/jquery.js"></script>
<script src="<?php echo WEB_ROOT;?>public/js/ui.js?v=202409"></script>
<script src="<?php echo WEB_ROOT;?>public/admin/js/base.js"></script>
<script src="<?php echo WEB_ROOT;?>public/js/jquery.qrcode.js"></script>
</head>

<body>

    <div class="position">当前位置：网站管理 > <a href="<?php echo U('index','id='.$id.'');?>">网站设置</a></div>
    <div class="borders">
        <!---->
        <form class="ui-form" method="post">
            <div class="ui-tabs ui-tabs-white" data-href="1">
                <ul class="ui-tabs-nav">
                    <?php $array_rp=$this->db->load("select * from sd_config_group  where islock=1 and gkey='0' and types=1  order by ordnum,id ",0,false,0);$total_rp=count($array_rp);if($total_rp==0){ ?>
<?php } else{ ?>
<?php $j=0;} foreach($array_rp as $rp){ $j++;?>
                    <li<?php if ($id==$rp['id']) { ?> class="active"<?php }?>><a href="<?php echo U('index',"id=".$rp['id']."");?>"><?php echo $rp['gname'];?></a></li>
                    <?php } if($total_rp>0){ ?>
<?php }?>
                </ul>
                <div class="ui-tabs-content">
                    <?php $array_rp=$this->db->load("select * from sd_config_group  where islock=1 and id=$id  order by ordnum,id limit 1",0,false,0);$total_rp=count($array_rp);if($total_rp==0){ ?>
<?php } else{ ?>
<?php $j=0;} foreach($array_rp as $rp){ $j++;?>
                    <?php $gid=$rp['id'];?>
                    <div class="ui-tabs-pane active">
                    	<?php $array_rs=$this->db->load("select * from sd_config  where islock=1 and gid=$gid  order by ordnum,id ",0,false,0);$total_rs=count($array_rs);if($total_rs==0){ ?>
<?php } else{ ?>
<?php $i=0;} foreach($array_rs as $rs){ $i++;?>
                        <?php if ($rs['ctype']==9) { ?>
                            <div class="form-subject"><?php echo $rs['ctitle']; if (strlen($rs['dtext'])) { ?>（<?php echo $rs['dtext'];?>）<?php }?></div>
                        <?php } else { ?>
                        <div class="ui-form-group ui-row">
                            <label class="col-left ui-col-form-label<?php if ($rs['ctype']==5) { ?> ui-col-form-label-top<?php }?>"><?php echo $rs['ctitle'];?>：</label>
                            <div class="col-right<?php if ($rs['ctype']==6 && $rs['rtype']==1) { ?> col-right-top<?php }?>">
                                <?php switch ($rs['ctype']){ case 1: ?>                                <?php if ($rs['ckey']=='admin_code_google') { ?>                                    <div class="ui-input-group">                                    <input type="text" name="<?php echo $rs['ckey'];?>" id="<?php echo $rs['ckey'];?>" class="ui-form-ip radius-right-none" readonly value="<?php if ($rs['ishide']==1 && APP_DEMO) { ?>*************<?php } else {  echo $rs['cvalue']; }?>">                                    <a class="after ui-icon-setting radius-none ui-google-apikey" data-name="<?php echo $rs['ckey'];?>">生成密钥</a>                                    <a class="after ui-icon-qrcode ui-google-qrcode" data-name="<?php echo $rs['ckey'];?>">二维码</a>                                </div>                                <?php } else { ?>                                    <input type="text" name="<?php echo $rs['ckey'];?>" class="ui-form-ip" value="<?php if ($rs['ishide']==1 && APP_DEMO) { ?>*************<?php } else {  echo $rs['cvalue']; }?>">                                <?php }?>                                <?php break; ?>                                <?php case 2: ?><input type="password" name="<?php echo $rs['ckey'];?>" class="ui-form-ip" value="<?php if ($rs['ishide']==1 && APP_DEMO) { ?>*************<?php } else {  echo $rs['cvalue']; }?>"><?php break; ?>                                <?php case 4: ?>                                <div class="ui-input-group">                                    <input type="text" name="<?php echo $rs['ckey'];?>" class="ui-form-ip radius-right-none" id="<?php echo $rs['ckey'];?>" value="<?php echo $rs['cvalue'];?>">                                    <a class="after fm-choose ui-icon-cloud-upload radius-none" data-name="<?php echo $rs['ckey'];?>" <?php if ($rs['ckey']=='water_logo') { ?>data-url="<?php echo U('upload/imageupload','type='.$rs['utype'].'&multiple=0&islocal=1');?>"<?php } else { ?>data-url="<?php echo U('upload/imageupload','type='.$rs['utype'].'&multiple=0');?>"<?php }?> data-type="<?php echo $rs['utype'];?>" data-multiple="0" title="上传">上传</a>                                    <a class="after fm-choose ui-icon-select<?php if ($rs['utype']==1) { ?> radius-none<?php }?>" data-name="<?php echo $rs['ckey'];?>" data-url="<?php if ($rs['ckey']=='water_logo') {  echo U('upload/imagelist','type='.$rs['utype'].'&multiple=0&islocal=1'); } else {  echo U('upload/imagelist','type='.$rs['utype'].'&multiple=0'); }?>" data-type="<?php echo $rs['utype'];?>" data-multiple="0" title="选择">选择</a>                                    <?php if ($rs['utype']==1) { ?><a class="after ui-lightbox ui-icon-zoomin" data-id="<?php echo $rs['ckey'];?>" data-name="lightbox-<?php echo $rs['ckey'];?>" title="<?php echo $rs['ctitle'];?>">预览</a><?php }?>                                </div>                                <?php break; ?>                                <?php case 5: ?><textarea name="<?php echo $rs['ckey'];?>" class="ui-form-ip" rows="3" cols="50"><?php if ($rs['ishide']==1 && APP_DEMO) { ?>*************<?php } else {  echo $rs['cvalue']; }?></textarea><?php break; ?>                                <?php case 6: ?>                                <?php $arr=explode(",",$rs['dvalue']);?>                                <?php foreach($arr as $index=>$key) { ?>                                <?php $data=explode("|",$key);?>                                	<?php if ($rs['rtype']==2) { ?><div class="input-group-check"><?php }?>                                	<label class="ui-radio"><input type="radio" name="<?php echo $rs['ckey'];?>" id="<?php echo $rs['ckey'];?>_<?php echo $index;?>" value="<?php echo $data[1];?>" <?php if ($rs['cvalue']=="".$data[1]."") { ?> checked<?php }?>><i></i><?php echo $data[0];?></label>                                    <?php if ($rs['rtype']==2) { ?></div><?php }?>                                <?php }?>                                <?php break; ?>                                <?php case 7: ?>                                <div class="input-group-check">                                <?php $arr=explode(",",$rs['dvalue']);?>                                <?php foreach($arr as $index=>$key) { ?>                                <?php $data=explode("|",$key);?>                                	<label class="ui-checkbox"><input type="checkbox" name="<?php echo $rs['ckey'];?>[]" id="<?php echo $rs['ckey'];?>_<?php echo $index;?>" value="<?php echo $data[1];?>" <?php if (stristr(",".$rs['cvalue'].",",",".$data[1].",")) { ?> checked<?php }?>><i></i><?php echo $data[0];?></label>                                <?php }?>                                </div>                                <?php break; ?>                                <?php case 8: ?>                                <select name="<?php echo $rs['ckey'];?>" class="ui-form-ip">                                <?php $arr=explode(",",$rs['dvalue']);?>                                <?php foreach($arr as $index=>$key) { ?>                                <?php $data=explode("|",$key);?>                                <option value="<?php echo $data[1];?>" <?php if ($rs['cvalue']=="".$data[1]."") { ?> selected<?php }?>><?php echo $data[0];?></option>                                <?php }?>                                </select>                                <?php break; ?>                                <?php }?>
                                <span class="input-tips"><?php echo $rs['dtext'];?></span>
                            </div>
                        </div>
                        <?php }?>
                    	<?php } if($total_rs>0){ ?>
<?php }?>
                    </div>
                    <?php } if($total_rp>0){ ?>
<?php }?>
                </div>
            </div>
            <input type="hidden" name="token" value="<?php echo $token;?>">
			<button type="submit" class="ui-btn ui-btn-info ui-mt-15">保存设置</button>
        </form>
        <!---->
    </div>
    
<script>
$(function()
{
    $(".ui-google-apikey").click(function()
    {
        sdcms.loading('正在生成');
        var name=$(this).data("name");
        $.ajax(
        {
            type:'post',
            cache:false,
            dataType:'json',
            url:'<?php echo U("googleapi");?>',
            error:function(e){alert(e.responseText);},
            success:function(d)
            {
                $.progress('close')
                if(d.state=='success')
                {
                    $("#"+name).val(d.msg);
                    setTimeout(function()
                    {
                        $(".ui-google-qrcode").click();
                    },500)
                }
                else
                {
                    sdcms.error(d.msg);
                }
            }
        });
    });
    $(".ui-google-qrcode").click(function()
    {
        sdcms.loading('正在生成二维码');
        var name=$(this).data("name");
        var str=$("#"+name).val();
        if(str=='')
        {
            sdcms.error('请先生成密钥');
            return;
        }
        $.ajax(
        {
            type:'post',
            cache:false,
            dataType:'json',
            url:'<?php echo U("qrcode");?>',
            data:'appkey='+str,
            error:function(e){alert(e.responseText);},
            success:function(d)
            {
                $.progress('close')
                if(d.state=='success')
                {
                    $("#qrcode").remove();
                    $.dialog(
                    {
                        title:"扫码绑定",
                        text:'<div class="ui-text-center"><div id="qrcode" style="width:300px;height:300px;margin:0 auto;"></div><div class="ui-text-center ui-mt">请打开【身份验证器】App，扫码完成绑定。</div></div>',
                        okval:'确定',
                        ok:function(e)
                        {
                            e.close();
                        }
                    });
                    $("#qrcode").qrcode({width:300,height:300,text:d.msg}); 
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
                url:'<?php echo U("index","id=".$id."");?>',
                data:$(form).serialize(),
                error:function(e){alert(e.responseText);},
                success:function(d)
                {
                    if(d.state=='success')
                    {
                        sdcms.success(d.msg);
                        <?php if ($id!=2) { ?>
                        setTimeout(function(){location.href='<?php echo U("index","id=".$id."");?>';},1500);
                        <?php } else { ?>
                        var a=$('.ui-form input[name="url_mode"]:checked').val();
                        switch(a)
                        {
                            case '1':
                                var url='<?php echo N(MODULE_NAME,1);?>';
                                break;
                            case '2':
                                var url='<?php echo N(MODULE_NAME,2);?>';
                                break;
                            case '3':
                                var url='<?php echo N(MODULE_NAME,3);?>';
                                break;
                        }
                        setTimeout(function(){top.location.href=''+url+'';},800);
                        <?php }?> 
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