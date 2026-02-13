<?php if(!defined('IN_SDCMS')) exit;?>
<div class="ui-menu ui-menu-blue">
	<div class="ui-menu-name">留言列表</div>
</div>
{sdcms:rs pagesize="10" table="sd_book" where="islock=1" order="ontop desc,id desc"}
{rs:eof}<div class="ui-pt-15">暂无留言</div>{/rs:eof}
<div class="ui-card ui-card-book ui-mt-20">
	<div class="ui-card-header"><div class="ui-card-header-title">{$rs[truename]}</div><div class="ui-card-header-more ui-text-gray">{date('Y-m-d H:i',$rs[createdate])}</div></div>
	<div class="ui-card-body">
		<div>{$rs[remark]}</div>
	</div>
	{if strlen($rs[reply])>0}
	<div class="ui-card-footer">
		<strong>回复：</strong>{$rs[reply]} 
	</div>
	{/if}
</div>
{/sdcms:rs}
<div class="ui-page ui-page-center ui-page-mid ui-mt-20 ui-mb"><ul>{$showpage}</ul></div>

<div class="ui-menu ui-menu-blue">
	<div class="ui-menu-name">我要留言</div>
</div>
<form class="ui-form ui-mt-30" method="post">
	<div class="ui-form-group ui-row">
		<label class="ui-col-2 ui-col-form-label ui-text-right">姓名：</label>
		<div class="ui-col-10">
			<input type="text" name="truename" class="ui-form-ip" placeholder="请输入姓名" data-rule="姓名:required;">
		</div>
	</div>
	<div class="ui-form-group ui-row">
		<label class="ui-col-2 ui-col-form-label ui-text-right">手机：</label>
		<div class="ui-col-10">
			<input type="text" name="mobile" maxlength="11" class="ui-form-ip" placeholder="请输入手机号码" data-rule="手机号码:required;mobile;">
		</div>
	</div>
	<div class="ui-form-group ui-row">
		<label class="ui-col-2 ui-col-form-label ui-text-right">座机：</label>
		<div class="ui-col-10">
			<input type="text" name="tel" class="ui-form-ip" placeholder="请输入座机号码（可选）">
		</div>
	</div>
	<div class="ui-form-group ui-row">
		<label class="ui-col-2 ui-col-form-label ui-text-right">留言：</label>
		<div class="ui-col-10">
			<textarea name="remark" class="ui-form-ip ui-form-limit" data-max="255" rows="4" placeholder="请输入留言内容" data-rule="留言内容:required;"></textarea>
			<div class="ui-form-limit-text"><span>0</span>/255</div>
		</div>
	</div>
	<div class="ui-form-group ui-row">
		<label class="ui-col-2 ui-col-form-label ui-text-right">验证码：</label>
		<div class="ui-col-10">
			<div class="ui-input-group">
				<input type="text" name="code" id="code" class="ui-form-ip ui-radius-right-none" placeholder="请输入验证码" data-rule="验证码:required;">
				<div class="code"><img src="{U('code')}" height="40" id="verify" title="点击更换验证码"></div>
			</div>
		</div>
	</div>
	<div class="ui-form-group ui-row">
		<div class="ui-col-10 ui-offset-2">
			<input type="hidden" name="token" value="{$token}"><input type="submit" class="ui-btn ui-btn-blue" value="提交">
		</div>
	</div>
</form>