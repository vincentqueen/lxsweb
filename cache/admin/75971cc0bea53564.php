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
</head>

<body>
    <div class="position">当前位置：<a href="<?php echo THIS_LOCAL;?>">管理首页</a></div>
    
    <div class="home">
        <div class="count">
            <a class="box" href="<?php echo U('bbs/index');?>">
                <h3>社区</h3>
                <div class="num"><?php echo $data['bbs']['total'];?></div>
                <div class="total">待审主题：<span class="red"><?php echo $data['bbs']['topic'];?></span>　待审帖子：<span class="red"><?php echo $data['bbs']['reply'];?></span></div>
                <div class="icon icon-1"><span class="ui-icon-file-word"></span></div>
            </a>
            
            <a class="box" href="<?php echo U('order/index');?>">
                <h3>订单</h3>
                <div class="num"><?php echo $data['order']['total'];?></div>
                <div class="total">待处理：<span class="red"><?php echo $data['order']['num'];?></span></div>
                <div class="icon icon-2"><span class="ui-icon-linechart"></span></div>
            </a>
            
            <a class="box" href="<?php echo U('inquiry/index');?>">
                <h3>询价</h3>
                <div class="num"><?php echo $data['inquiry']['total'];?></div>
                <div class="total">待处理：<span class="red"><?php echo $data['inquiry']['num'];?></span></div>
                <div class="icon icon-3"><span class="ui-icon-evaluate"></span></div>
            </a>
            
            <a class="box" href="<?php echo U('book/index');?>">
                <h3>留言</h3>
                <div class="num"><?php echo $data['book']['total'];?></div>
                <div class="total">待处理：<span class="red"><?php echo $data['book']['num'];?></span></div>
                <div class="icon icon-4"><span class="ui-icon-comment"></span></div>
            </a>
        </div>
      
        <div class="ui-row ui-mt-20 homeother">
            <div class="ui-col-4">
            <!---->
            <div class="box">
                <div class="subject">服务器环境</div>
                <ul class="ui-list server">
                    <?php foreach($services as $key=>$val) { ?>
                    <li><a><span><?php echo $key;?>：</span><?php echo $val;?></a></li>
                    <?php }?>
                </ul>
            </div>
            <!---->
            </div>
            <div class="ui-col-4">
            	<!---->
                <div class="box">
                    <div class="subject"><a href="<?php echo U('content/index');?>" target="_blank">更多>></a>最新文章</div>
                    <ul class="ui-list">
                        <?php $array_rs=$this->db->load("select * from sd_content  where 1=1   order by id desc limit 4",0,false,0);$total_rs=count($array_rs);if($total_rs==0){ ?>
<?php } else{ ?>
<?php $i=0;} foreach($array_rs as $rs){ $i++;?>
						<li style="line-height: 30px;"><a href="<?php echo showurl($rs['id'],$rs['alias'],$rs['classid']);?>" title="<?php echo cutstr(add_city($rs['title'],2),80,1);?>" target="_blank"><?php echo cutstr(add_city($rs['title'],2),80,1);?></a></li>
						<?php } if($total_rs>0){ ?>
<?php }?>
                    </ul>
                 </div> 
                <!---->
            </div>
            <div class="ui-col-4">
            	<!---->                 
                 <div class="box">   
                    <div class="subject"><a href="<?php echo U('loginlog/index');?>">更多>></a>登录日志</div>
                    <div class="log">
                        <?php $array_rs=$this->db->load("select * from sd_admin_login_log  where $where  order by id desc limit 20",0,false,0);$total_rs=count($array_rs);if($total_rs==0){ ?>
<?php } else{ ?>
<?php $i=0;} foreach($array_rs as $rs){ $i++;?>
                        <p><strong><span><?php echo date('Y-m-d H:i',$rs['logindate']);?></span><?php echo $rs['loginname'];?></strong><?php echo enhtml($rs['loginip']);?><span><?php echo $rs['loginmsg'];?></span></p>
                        <?php } if($total_rs>0){ ?>
<?php }?>
                    </div>
                </div>
                <!---->
            </div>
        </div>
            
    </div>

    <div class="foottop"></div>
    <div class="copyright"><span><?php if (false) { ?>当前版本：<?php echo C('version');?> <?php echo C('version_number'); if (get_admin_info('pid')==0) { ?>　<a href="javascript:;" class="checkupdate ui-btn ui-btn-sm ui-btn-blue ui-btn-outline-blue">检查更新</a><?php }?>　数据库：<?php echo $dbtype;?>　授权类型：<?php echo $authtype; }?></span>Powered By <a href="http://www.ewinkee.cn" target="_blank">时代赢客</a> @ <?php echo date('Y');?> Inc.</div>
    <script>
	$(function()
	{
		$(".log").slimscroll({height:"254px",size:"5px",color:"#7CB5EC",opacity:0.6,wheelStep:5,touchScrollStep:50});
		$(".checkupdate").click(function()
		{
			sdcms.loading("正在检查，请稍等");
			$.ajax(
			{
				type:'post',
				cache:false,
				dataType:'json',
				url:'<?php echo U("upgrade/version");?>',
				data:'token=<?php echo $token;?>',
				error:function(e){alert(e.responseText);},
				success:function(d)
				{
					if(d.state=='success')
					{
						var data=$.parseJSON(d.msg);
						var zip=data.zip;
						$.dialog(
						{
							title:'在线升级',
							text:'有新版本可升级，版本号：<span class="ui-text-red">'+data.version+'</span><h3 class="ui-text-red ui-mt-30">升级前请务必做好以下准备工作：</h3><div class="ui-height-40">1、备份好网站的<code>数据库</code>和<code>模板文件</code>。<br>2、<code>网站根目录</code>给予读写权限（虚拟主机一般无需设置）。</div>',
							okval:'升级',
							ok:function(e)
							{
								e.close();
								if(confirm("确定已经备份好数据库和模板文件\n并设置好权限？"))
								{
									sdcms.loading('正在升级，请耐心等待');
									$.ajax(
									{
										type:'post',
										cache:false,
										dataType:'json',
										url:'<?php echo U("upgrade/zip");?>',
										data:'token=<?php echo $token;?>&zip='+zip,
										error:function(e){alert(e.responseText);},
										success:function(data)
										{
											if(data.state=='success')
											{
												sdcms.success(data.msg);
												setTimeout(function(){parent.location.href=parent.location.href},5000);
											}
											else
											{
												sdcms.error(data.msg);
											}
										}
									});
								}
							}
						})
					}
					else
					{
						sdcms.error(d.msg);
					}
				}
			});
		});
	});
	</script>
</body>
</html>