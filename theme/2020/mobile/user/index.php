<?php if(!defined('IN_SDCMS')) exit;?>
{php $self_name='会员中心'}
{include file="mobile/include/top.php"}
<title>{$self_name}_{sdcms[web_name]}</title>
<meta name="keywords" content="{sdcms[seo_key]}">
<meta name="description" content="{sdcms[seo_desc]}">
</head>

<body>
	
	{include file="mobile/include/head.php"}
	{sdcms:rs top="1" table="sd_user left join sd_user_group on sd_user.uid=sd_user_group.gid" where="id=$userid"}
	<div class="ui-mwidth">
		<div class="ui-bg-white ui-p-15">
			<ul class="ui-media-list ui-media-border-none">
				<li class="ui-media">
					<div class="ui-media-img ui-mr-20 ui-radius">
						<img src="{if !isempty($rs[uface])}{$rs[uface]}{else}{WEB_ROOT}upfile/noface.gif{/if}" class="dropzone" id="uface" config="uface" url="{U('face','','',1)}" maxsize="{sdcms[upload_image_max]}" width="64" height="64">
					</div>
					<div class="ui-media-body">
						<div class="ui-media-header ui-mt-sm">{get_user_info('uname')}</div>
						<div class="ui-media-text ui-text-gray">{$rs[gname]}</div>
					</div>
				</li>
			</ul>
		</div>
	</div>
	
	<div class="ui-mwidth ui-bg-white ui-mt">
		<ul class="ui-list">
			<li><a href="javascript:;"><i class="ui-icon-moneycollect ui-text-blue ui-ml-sm ui-mr-sm"></i> 账户余额</a><div class="list-right"><span class="ui-badge ui-badge-red">{$rs[umoney]}</span><span class="arrow"></span></div></li>
			<li><a href="{N('mymoney')}"><i class="ui-icon-pay ui-text-blue ui-ml-sm ui-mr-sm"></i> 财务明细</a><div class="list-right"><a href="{N('pay')}" class="ui-btn ui-btn-sm ui-btn-blue">充值</a><span class="arrow"></span></div></li>
			
		</ul>
	</div>
	
	<div class="ui-mwidth ui-bg-white ui-mt">
		<ul class="ui-list">
			<li><a href="{N('myorder')}"><i class="ui-icon-cart ui-text-blue ui-ml-sm ui-mr-sm"></i> 我的订单</a><div class="list-right"><span class="arrow"></span></div></li>
			<li><a href="{N('editemail')}"><i class="ui-icon-mail ui-text-blue ui-ml-sm ui-mr-sm"></i> 修改邮箱</a><div class="list-right"><span class="arrow"></span></div></li>
			<li><a href="{N('editpass')}"><i class="ui-icon-lock ui-text-blue ui-ml-sm ui-mr-sm"></i> 修改密码</a><div class="list-right"><span class="arrow"></span></div></li>
		</ul>
	</div>
	
	{if !(isweixin() && C('api_wx_open')==1)}
	<div class="ui-mwidth ui-bg-white ui-mt">
		<ul class="ui-list">
			<li><a href="{N('out')}"><i class="ui-icon-logout text-blue ui-ml-sm ui-mr-sm"></i> 退出登录</a><div class="list-right"><span class="arrow"></span></div></li>
		</ul>
	</div>
	{/if}
	
	{/sdcms:rs}
	<div class="ui-pt-15 ui-mt"></div>
	{include file="mobile/include/foot.php"}
	<script src="{WEB_ROOT}public/js/dropzone.js"></script>
	<script>
    $(function()
    {
		$("#bar_user").addClass("active");
		$(".ui-topbar-title").html("{$self_name}");
	});
	$(".dropzone").dropzone(
	{
		params:{token:"{$token}"},
		maxFiles:1,
		success:function(file,data,that)
		{
			data=jQuery.parseJSON(data);
			this.removeFile(file);
			if(data.state=="success")
			{
				sdcms.success("上传成功");
				$(that).attr("src",data.msg);
				$("#face").attr("src",data.msg);
			}
			else
			{
				sdcms.error("上传失败："+data.msg);
			}
		},
		sending:function(file)
		{
			sdcms.loading("正在上传，请稍等");
		},
		totaluploadprogress:function(progress)
		{
			$.progress((Math.round(progress*100)/100)+"%");
		},
		queuecomplete:function(progress)
		{
			$.progress('close');
		},
		error:function(file,msg)
		{
			sdcms.error(msg);
		}
	});
    </script>
	
</body>
</html>
