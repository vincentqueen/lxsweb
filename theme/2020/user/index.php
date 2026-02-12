<?php if(!defined('IN_SDCMS')) exit;?>
{php $self_name='会员中心'}
{php $self_ename='member center'}
{php $position=[['name'=>$self_name,'url'=>N('user')],['name'=>'个人中心','url'=>THIS_LOCAL]]}
{include file="include/top.php"}
<title>{$self_name}_{sdcms[web_name]}</title>
<meta name="keywords" content="{sdcms[seo_key]}">
<meta name="description" content="{sdcms[seo_desc]}">
</head>

<body>
	{include file="include/head.php"}
	{include file="include/banner_inner.php"}

	<div class="container">
		<div class="width ui-row">
			<div class="container-left">
				<div class="ui-fixed-s" data-parent=".container">
					{include file="user/nav.php"}
				</div>
			</div>
			
			<div class="container-right">
			
				<div class="ui-box">
					<div class="ui-box-h2">{$self_name}</div>
					<div class="ui-box-body">
						<!--begin-->
						<div class="user_info">
							{sdcms:rs top="1" table="sd_user left join sd_user_group on sd_user.uid=sd_user_group.gid" where="id=$userid"}
							<div class="face"><img src="{if !isempty($rs[uface])}{$rs[uface]}{else}{WEB_ROOT}upfile/noface.gif{/if}" class="dropzone" id="uface" config="uface" url="{U('face','','',1)}" maxsize="{sdcms[upload_image_max]}"></div>
							<div class="info">
								<p><span>{get_user_info('uname')}</span>　{$welcome}</p>
								<ul>
									<li><em>级别：</em>{$rs[gname]}</li>
									<li><em>邮箱：</em>{$rs[uemail]}</li>
									<li><em>余额：</em><span>{$rs[umoney]}</span> <a class="ui-btn ui-btn-blue ui-fr ui-mt-sm" href="{N('pay')}">在线充值</a></li>
									<li><em>登录：</em><span>{$rs[logintimes]}</span> 次</li>
								</ul>
							</div>
							{/sdcms:rs}
							<div class="clear"></div>
						</div>
						<!--over-->
					</div>
				</div>
			
			</div>
		</div>
	</div>
	
	{include file="include/foot.php"}
	
	<script src="{WEB_ROOT}public/js/dropzone.js"></script>
    <script>
	$(".dropzone").dropzone(
	{
		maxFiles:1,
		params:{token:"{$token}"},
		acceptedFiles:".jpg,.jpeg,.gif,.png",
		success:function(file,data,that)
		{
			data=jQuery.parseJSON(data);
			this.removeFile(file);
			if(data.state=="success")
			{
				sdcms.success("上传成功");
				$("#"+$(that).attr("src",data.msg));
			}
			else
			{
				sdcms.error("上传失败："+data.msg);
			}
		},
		error:function(file,msg)
		{
			sdcms.error(msg);
		}
	});
	</script>

</body>
</html>