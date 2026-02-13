<?php if(!defined('IN_SDCMS')) exit;?>
{php $self_name=$title}
{php $self_ename='form'}
{php $position=[['name'=>$self_name,'url'=>THIS_LOCAL]]}
{include file="include/top.php"}
<title>{if !isempty($seotitle)}{$seotitle}_{/if}{$title}_{sdcms[web_name]}</title>
<meta name="keywords" content="{if !isempty($seokey)}{$seokey}{else}{$title}{/if}">
<meta name="description" content="{if !isempty($seodesc)}{$seodesc}{else}{$title}{/if}">
</head>

<body>
	{include file="include/head.php"}
	{include file="include/banner_inner.php"}

	<div class="container">
		<div class="width ui-row">
			<div class="container-left">
				<div class="ui-fixed-s" data-parent=".container">
					{include file="include/left_nav.php"}
				</div>
			</div>
			
			<div class="container-right">
			
				<div class="ui-box">
					<div class="ui-box-h2">{$self_name}</div>
					<div class="ui-box-body">
						<!--begin-->
						<table class="table table-border table-hover table-striped mb mt">
							<thead class="thead-gray">
								<tr>
									<th width="130">项目</th>
									<th>内容</th>
								</tr>
							</thead>
							<tbody>
							{foreach $field as $key=>$rs}
							<tr>
								<td class="text-right">{$key}：</td>
								<td class="text-left">{$rs}</td>
							</tr>
							{/foreach}
							</tbody>
						</table>
						<!--over-->
					</div>
				</div>
			
			</div>
		</div>
	</div>
	
	{include file="include/foot.php"}

</body>
</html>