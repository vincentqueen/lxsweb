<?php defined('IN_SDCMS') or die(); if(!defined('IN_SDCMS')) exit;?><!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="renderer" content="webkit">
<title>管理首页</title>
<link rel="stylesheet" href="<?php echo WEB_ROOT;?>public/css/ui.css">
<link rel="stylesheet" href="<?php echo WEB_ROOT;?>public/admin/css/layout.css">
<script src="<?php echo WEB_ROOT;?>public/js/jquery.js"></script>
<script src="<?php echo WEB_ROOT;?>public/js/ui.js?v=202409"></script>
<script src="<?php echo WEB_ROOT;?>public/scroll/jquery.slimscroll.js"></script>
<base target="iframe_body">
</head>

<body>

    <div class="ui-north">
        <div class="logo"><img src="<?php echo C('admin_logo');?>" height="40"></div>
        <div class="user_base"><?php echo get_admin_info('penname');?><span class="ui-icon-down"></span>
            <ul>
                <li><a href="javascript:;" class="editpass" data-url="<?php echo U('pass');?>">修改密码</a></li>
                <li><a href="<?php echo U('out');?>" target="_parent">退出登录</a></li>
            </ul>
        </div>
        <div class="other_left"><a href="javascript:;" class="ui-icon-Import"></a></div>
        <div class="other_menu"><a class="ui-icon-list ui-offside-show" href="javascript:;" data-target="#offside-left"></a></div>
        <div class="other_link">
            <ul>
                <li><a href="<?php echo WEB_ROOT;?>" target="_blank">预览网站</a></li>
                <?php if (false) { ?>
                <?php if (get_admin_info('pid')==0) { ?>
                <li><a href="javascript:;" class="bizcode">授权码</a></li>
				<li><a href="javascript:;" class="bind">账号绑定</a></li>
				<?php }?>
				<?php }?>
            </ul>
        </div>
    </div>
    
    <div class="ui-body">
        <div class="ui-west">
        	<!---->
            <div class="leftwarp">
                <div class="ui-collapse-menu-title active"><a href="<?php echo THIS_LOCAL;?>" target="_parent">管理首页</a></div>
                <?php $array_rp=$this->db->load("select * from sd_admin_menu  where islock=1 and followid=0 $where  order by ordnum,id ",0,false,0);$total_rp=count($array_rp);if($total_rp==0){ ?>
<?php } else{ ?>
<?php $j=0;} foreach($array_rp as $rp){ $j++;?>
                <?php $classid=$rp['id'];?>
                <div class="ui-collapse-menu-title" data-id="<?php echo $rp['id'];?>" data-type="1"><a href="javascript:;"><?php echo $rp['title'];?></a><i class="ui-icon-right"></i>	</div>
                <div class="ui-collapse-menu-body">
                    <ul>
                        <?php $array_rs=$this->db->load("select * from sd_admin_menu  where islock=1 and followid=$classid $where  order by ordnum,id ",0,false,0);$total_rs=count($array_rs);if($total_rs==0){ ?>
<?php } else{ ?>
<?php $i=0;} foreach($array_rs as $rs){ $i++;?>
                        <li data-name="<?php echo $rs['cname'];?>"><a href="<?php echo get_admin_menu_url($rs['cname'],$rs['aname'],$rs['dname']);?>"><?php echo $rs['title'];?></a></li>
                        <?php } if($total_rs>0){ ?>
<?php }?>
                    </ul>
                </div>
                <?php } if($total_rp>0){ ?>
<?php }?>
            </div>
            <!---->
        </div>
        
        <div class="ui-center<?php if (isipad()) { ?> ipad<?php }?>"></div>
        
    </div>
	<div class="ui-offside ui-offside-left" id="offside-left">
        
    </div>
    <script>
	function editbiz()
	{
		var html='<div class="ui-mb-15"><span class="ui-text-gray">授权类型：</span>';
			html+='<label class="ui-radio"><input type="radio" name="authtype" value="1" <?php if (C("sys_auth_type")=="network") { ?> checked<?php }?>><i></i>网络授权</label>';
			html+='<label class="ui-radio"><input type="radio" name="authtype" value="0" <?php if (C("sys_auth_type")=="local") { ?> checked<?php }?>><i></i>本地授权</label>';
			html+='</div>';
		$.dialogbox({
			'title':"录入授权码",
			'text':'<div class="ui-mb-15">当前域名：<span class="ui-text-red"><?php echo $domain;?></span></div>'+html,
			'inputval':'<?php echo C("BIZ_ID");?>',
			'type':2,
			'width':'450px',
			'align':'',
			'mask':true,
			'okval':'保存授权码',
			'oktheme':'ui-btn-info',
			'ok':function(e)
			{
				var type=$("input[name='authtype']:checked").val();
				var code=e.inputval();
				$.ajax(
				{
					type:'post',
					cache:false,
					dataType:'json',
					url:'<?php echo THIS_LOCAL;?>',
					data:'type='+type+'&code='+code,
					error:function(e){alert(e.responseText);},
					success:function(d)
					{
						sdcms.success(d.msg);
						if(d.state=='success')
						{
							setTimeout(function(){location.href='<?php echo THIS_LOCAL;?>';},1500);
						}
					}
				})
			},
			'cancelval':'购买授权码',
			'cancel':function(e)
			{
				location.href='https://www.sdcms.cn';
			}
		})
	}
    $(function()
	{
		<?php if (APP_DEMO) { ?>
		$.dialog(
		{
			'title':"友情提示",
			'text':"您的账户权限为：只读。<div class='ui-text-red'>您所做的任何修改均不会生效！！！</div>",
			'ok':function(e)
			{
				e.close();
			},
			'cancelshow':false
		});
		<?php }?>
		<?php if ($isbiz==0) { ?>
		$.dialog(
		{
			'title':"授权提示",
			'text':'<div style="padding:0 5px;line-height:30px;">域名：<span style="color:#f30;"><?php echo $domain;?></span><br>暂未授权，部分功能将无法正常使用。</div><div style="text-align:center;padding:15px;"><button class="ui-btn ui-btn-info ui-btn-block bizcode">录入授权码</button></div>',
			'align':'bottom-right',
			'okval':'录入授权码',
			'mask':false,
			'footer':false,
			'oktheme':'ui-btn-info',
			'ok':function(e)
			{
				e.close();
				$(".bizcode").click();
			}
		});
		<?php }?>
		$(".bizcode").click(function()
		{
			//关闭所有窗口
			$.dialogclose();
			editbiz();
		});
		$(".bind").click(function()
		{
			$.dialogbox(
			{
				title:"官网账号绑定",
				text:'<?php echo U("bind/index");?>',
				width:'420px',
				height:'210px',
				type:3,
				oktheme:'ui-btn-info',
				okval:'绑定',
				ok:function(e)
				{
					e.iframe().contents().find("#sdcms-submit").click();
				}
				<?php if (C('sys_uname')) { ?>,cancelval:'解除绑定',
				cancel:function(e)
				{
					e.close();
					setTimeout(function()
					{
						$.dialog(
						{
							title:"操作提示",
							text:"确定要解除绑定？",
							oktheme:'ui-btn-info',
							ok:function(e)
							{
								$.ajax(
								{
									url:'<?php echo U("bind/clear");?>',
									type:'post',
									dataType:'json',
									error:function(e){alert(e.responseText);},
									success:function(d)
									{
										e.close();
										if(d.state=='success')
										{
											sdcms.success(d.msg);
											setTimeout(function(){location.href='<?php echo THIS_LOCAL;?>';},3000);
										}
										else
										{
											sdcms.error(d.msg);
										}
									}
								});
							}
						});
					},500)
				}<?php }?>
			});
		});
        $(".user_base").hover(function()
		{
            $("ul",this).css("display","block");},
            function(){$("ul",this).css("display","none");
        });
		$("#offside-left").html($(".ui-west").html());
		$('.ui-collapse-menu-body li').bind('click',function()
		{
            $('.ui-collapse-menu-body li').removeClass('hover');
            $(this).addClass('hover');
        });
		//模拟滚动条		
		$(".leftwarp").slimscroll({height:"auto",size:"5px",color:"#9CABC3",opacity:0.6,wheelStep:5,touchScrollStep:50});
        $(".ui-center").html('<iframe name="iframe_body" src="<?php echo U('right');?>" width="100%" height="100%" frameborder="0"></iframe>');
		$(".other_left a").click(function()
		{
			if($(".ui-body").hasClass("ui-mobile"))
			{
				$(".ui-body").removeClass("ui-mobile");
			}
			else
			{
				$(".ui-body").addClass("ui-mobile");
			}
		})

		$(".editpass").click(function()
		{
			var url=$(this).attr("data-url");
			$.dialogbox(
			{
				'title':"修改密码",
				'text':url,
				'width':'480px',
				'height':'230px',
				'type':3,
				'oktheme':'ui-btn-info',
				'ok':function(e)
				{
					e.iframe().contents().find("#sdcms-submit").click();
				}
			});
		});
    })
    </script>
</body>
</html>