<?php if(!defined('IN_SDCMS')) exit;?>
{php $self_name='我的订单'}
{php $self_ename='my order'}
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
						<div class="ui-btn-group ui-btn-group-yellow ui-btn-group-bg ui-mb-15">
							<a class="ui-btn-group-item{if $type==0} active{/if}" href="{N('myorder')}">全部</a>
							<a class="ui-btn-group-item{if $type==1} active{/if}" href="{N('myorder','','type=1')}">已支付</a>
							<a class="ui-btn-group-item{if $type==2} active{/if}" href="{N('myorder','','type=2')}">未支付</a>
						</div>
						
						<table class="ui-table ui-table-border ui-table-hover ui-table-striped">
							<thead class="ui-thead-gray">
								<tr>
									<th width="120">订单号</th>
									<th>产品名称</th>
									<th width="70">数量</th>
									<th width="80">金额</th>
									<th width="80">状态</th>
									<th width="120">下单日期</th>
									<th width="80">操作</th>
								</tr>
							</thead>
							<tbody>
							{sdcms:rs pagesize="20" table="sd_order" where="$where" order="id desc"}
							{rs:eof}
							<tr>
								<td colspan="7">暂无订单</td>
							</tr>
							{/rs:eof}
							<tr>
								<td>{$rs[orderid]}</td>
								<td class="ui-text-left">{cutstr($rs[pro_name],40,1)}</td>
								<td>{$rs[pro_num]}</td>
								<td>{$rs[pro_price]}</td>
								<td>{iif($rs[ispay]==1,'已支付','<em class="ui-text-gray">未支付</em>')}<br>{iif($rs[isover]==1,'已处理','<em class="ui-text-gray">未处理</em>')}</td>
								<td>{date('Y-m-d H:i',$rs[createdate])}</td>
								<td><a href="{U('other/ordershow','orderid='.$rs[orderid].'')}" target="_blank">查看订单</a></td>
							</tr>
							{/sdcms:rs}
							</tbody>
						</table>
						<div class="ui-page ui-page-center ui-page-mid ui-mt-20"><ul>{$showpage}</ul></div>
						<!--over-->
					</div>
				</div>
			
			</div>
		</div>
	</div>
	
	{include file="include/foot.php"}
	

</body>
</html>