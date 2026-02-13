<?php if(!defined('IN_SDCMS')) exit;?>
<div class="proshow ui-row">
	<div class="col-left">
		{php $piclist=jsdecode($piclist,1)}
		{if is_array($piclist)}
		{php $big=reset($piclist)}
		<div class="big_pic"><a href="{$big['image']}" class="ui-lightbox" data-hide="true"><img src="{$big['image']}" alt="{$big['desc']}" border="0" ></a></div>
		<div class="thumb_pic">
			<ul>
				{php $step=0}
				{foreach $piclist as $index=>$val}
				{php $step++}
				<li{if $step==1} class="active"{/if}><img src="{thumb($val['image'],60,60)}" data-url="{$val['image']}" alt="{$val['desc']}" width="56" height="56"></li>
				{/foreach}
			</ul>
		</div>
		{/if}
	</div>
	<div class="col-right">
		<h1>{$title}</h1>
		{if !isempty($intro)}<div class="intro">{str_replace("\r","<br>",$intro)}</div>{/if}
		{if is_array($field)}
		<ul class="attribute">
			{foreach $field as $key=>$rs}
			{if !isempty($rs)}
			<li><em>{$key}：</em>{$rs}</li>
			{/if}
			{/foreach}
		</ul>
		{/if}
		{if $price>0}
			<div class="price"><span>{$price}</span><em>元</em></div>
		{/if}
		<div class="action">
			<button class="ui-btn ui-btn-blue ui-modal-show" data-target="#my-inquiry">我要询价</button>
			{if $price>0}<button class="ui-btn ui-btn-yellow ui-ml ui-modal-show" data-target="#my-order">我要订购</button>{/if}
		</div>
		
		{if count($tagslist)>0}
		<div class="tags">
			<i class="ui-icon-tags"></i> 标签：
			{foreach $tagslist as $rs}
				<a href="{$rs['url']}" title="{$rs['name']}" target="_blank" class="ui-btn ui-btn-sm">{$rs['name']}</a>
			{/foreach}
		</div>
		{/if}
	</div>
</div>
