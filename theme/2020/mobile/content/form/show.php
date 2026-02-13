<?php if(!defined('IN_SDCMS')) exit;?>
{php $self_name=$title}
{include file="mobile/include/top.php"}
<title>{if !isempty($seotitle)}{$seotitle}_{/if}{$title}_{sdcms[web_name]}</title>
<meta name="keywords" content="{if !isempty($seokey)}{$seokey}{else}{$title}{/if}">
<meta name="description" content="{if !isempty($seodesc)}{$seodesc}{else}{$title}{/if}">
{include file="mobile/include/wxshare.php"}
</head>

<body>
	
	{include file="mobile/include/head.php"}

	<div class="ui-mwidth">
		<div class="ui-box ui-p-10">
			<!--begin-->
			<table class="ui-table ui-table-border ui-table-hover ui-table-striped ui-mb ui-mt">
				<thead class="ui-thead-gray">
					<tr>
						<th width="110">项目</th>
						<th>内容</th>
					</tr>
				</thead>
				<tbody>
				{foreach $field as $key=>$rs}
				<tr>
					<td class="ui-text-right">{$key}：</td>
					<td class="ui-text-left">{$rs}</td>
				</tr>
				{/foreach}
				</tbody>
			</table>
			<!--over-->
			
			<div class="ui-pt-20 ui-bg-white"></div>
			
		</div>
		
	</div>
	
	{include file="mobile/include/foot.php"}
	<script>
	$(function()
	{
		$(".ui-topbar-title").html("{$self_name}");
	})
	</script>
</body>
</html>
