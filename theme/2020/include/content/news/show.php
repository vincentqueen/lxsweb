<?php if(!defined('IN_SDCMS')) exit;?>
<div class="artshow">
	<h1>{$title}</h1>
	<div class="info">
		<span>作者：</span>{sdcms:rs table="sd_admin" where="adminid=$adminid"}{$rs[penname]}{/sdcms:rs}　<span>日期：</span>{date('Y-m-d',$createdate)}　<span>人气：</span>{$hits}
	</div>
	<div class="content">
		{if $viewstate<100}
			<div class="ui-card ui-m-40">
				<div class="ui-card-header"><h5>友情提示</h5></div>
				<div class="ui-card-body">
					<div class="ui-card-text ui-p-15">
					{if $viewstate==1}
						请先<a href="{N('login')}" class="ui-text-red ui-ml ui-mr">登录</a>或<a href="{N('reg')}" class="ui-text-red ui-ml ui-mr">注册</a>
					{/if}
					{if $viewstate==2}
						您的账户权限不足，无法查看！
					{/if}
					{if $viewstate==3}
						本文需要购买后才能继续阅读，价格：<span class="ui-text-red">{$price}</span> 元　 <a href="javascript:;" class="ui-modal-show" data-target="#mymodal-pay">【购买】</a>
					{/if}
					</div>
				</div>
			</div>
		{else}
			{$content}
		{/if}
	</div>
	
	{if $pagenum>1 && $viewstate==100}<div class="ui-page ui-page-center ui-page-mid"><ul>{pagelist($page,$pagenum)}</ul></div>{/if}
	
	<div class="action">
		<div class="ui-text-center"><a class="digs" data-url="{U('other/digs/','id='.$id.'&act=up','',1)}" data-token="{$token}"><i class="ui-icon-like"></i><em>{$upnum}</em></a>赞</div>
		<div class="ui-text-center"><a class="digs" data-url="{U('other/digs/','id='.$id.'&act=down','',1)}" data-token="{$token}"><i class="ui-icon-unlike"></i><em>{$downnum}</em></a>踩</div>
	</div>
	
	{if count($tagslist)>0}
	<div class="tags">
		<i class="ui-icon-tags"></i> 标签：
		{foreach $tagslist as $rs}
			<a href="{$rs['url']}" title="{$rs['name']}" target="_blank" class="ui-btn ui-btn-sm">{$rs['name']}</a>
		{/foreach}
	</div>
	
	<div class="ui-menu ui-menu-blue">
		<div class="ui-menu-name">相关内容</div>
	</div>
	<ul class="ui-list ui-mt-15">
		{sdcms:rs top="10" table="sd_content" where="$like" order="ontop desc,ordnum desc,id desc"}
		<li><a href="{$rs[link]}" title="{$rs[title]}"><i class="ui-icon-square ui-font-14 ui-mr ui-text-blue"></i>{$rs[title]}</a></li>
		{/sdcms:rs}
	</ul>
	
	{/if}
			
</div>

<div class="ui-modal" id="mymodal-pay">
	<div class="ui-modal-header">
		<div class="ui-modal-title">付款方式</div>
		<div class="ui-modal-close ui-rotate">×</div>
	</div>
	<div class="ui-modal-body">
		<form method="post" id="form_buy">
			<ul class="pay" id="orderpay" style="display:block;">
				{if USER_ID>0}<li><div><img src="{WEB_ROOT}api/pay/user/images/pay.png" data-config="user"><i class="ui-icon-check"></i></div></li>{/if}
				{if C('pay_alipay_open')==1}
				<li><div><img src="{WEB_ROOT}api/pay/alipay/images/pay.png" data-config="alipay"><i class="ui-icon-check"></i></div></li>
				{/if}
				{if C('pay_wxpay_open')==1}
				<li><div><img src="{WEB_ROOT}api/pay/wxpay/images/pay.png" data-config="wxpay"><i class="ui-icon-check"></i></div></li>
				{/if}
                {if C('pay_free_open')==1}
                <li><div><img src="{WEB_ROOT}api/pay/zfb/images/pay.png" data-config="zfb"><i class="ui-icon-check"></i></div></li>
                <li><div><img src="{WEB_ROOT}api/pay/weixin/images/pay.png" data-config="weixin"><i class="ui-icon-check"></i></div></li>
                {/if}
			</ul>
			<input type="hidden" name="payway" id="payway" value="" data-rule="支付方式:required;">
            <input type="hidden" name="token" value="{$token}">
			<button type="submit" class="ui-btn ui-btn-blue ui-btn-block ui-btn-big ui-mt-30">支付：{$price}元</button>
		</form>
	</div>
</div>