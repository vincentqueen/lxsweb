<?php if(!defined('IN_SDCMS')) exit;?>
{php $self_name='财务明细'}
{php $self_ename='financial details'}
{php $position=[['name'=>'会员中心','url'=>N('user')],['name'=>$self_name,'url'=>THIS_LOCAL]]}
{include file="include/top.php"}
<title>{$self_name}_{sdcms[web_name]}</title>
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
						<a href="{N('pay')}" class="ui-btn ui-btn-blue ui-mr-sm">在线充值</a>
						<span class="ui-btn-group ui-btn-group-yellow ui-btn-group-bg">
							<a class="ui-btn-group-item{if $type==0} active{/if}" href="{N('mymoney')}">全部</a>
							<a class="ui-btn-group-item{if $type==1} active{/if}" href="{N('mymoney','','type=1')}">收入</a>
							<a class="ui-btn-group-item{if $type==2} active{/if}" href="{N('mymoney','','type=2')}">支出</a>
						</span>
						<table class="ui-table ui-table-border ui-table-hover ui-table-striped ui-mt-20">
							<thead class="ui-thead-gray">
								<tr>
									<th>名称|流水号</th>
									<th width="100">性质</th>
									<th width="100">变动前</th>
									<th width="100">金额</th>
									<th width="100">变动后</th>
									<th width="160">日期</th>
								</tr>
							</thead>
							<tbody>
							{sdcms:rs pagesize="20" table="sd_user_money" join="left join sd_user on sd_user_money.userid=sd_user.id" where="$where" order="aid desc" key="aid"}
							{rs:eof}
							<tr>
								<td colspan="6">暂无记录</td>
							</tr>
							{/rs:eof}
							<tr>
								<td class="ui-text-left">{$rs[title]}</td>
								<td>{iif($rs[types]==1,'收入','<span class="ui-text-gray">支出</span>')}</td>
								<td>{$rs[oldmoney]}</td>
								<td>{iif($rs[types]==1,'+','<span class="ui-text-gray">-</span>')} {$rs[amount]}</td>
								<td>{$rs[newmoney]}</td>
								<td>{date('Y-m-d H:i',$rs[createdate])}</td>
							</tr>
							{/sdcms:rs}
							</tbody>
						</table>
						<div class="ui-page ui-page-center ui-page-mid ui-mt-15"><ul>{$showpage}</ul></div>
						<!--over-->
					</div>
				</div>
			
			</div>
		</div>
	</div>
	
	{include file="include/foot.php"}

</body>
</html>