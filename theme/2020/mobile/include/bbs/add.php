<?php if(!defined('IN_SDCMS')) exit;?>
<form class="ui-form" method="post">
	<div class="ui-form-group">
		<select name="classid" data-rule="分类:required;int;" class="ui-form-ip">
			<option value="">请选择分类</option>
			{foreach $bbscate as $key=>$val}
			<option value="{$val['cateid']}"{if $fid==$val['cateid']} selected{/if}>{$val['catename']}</option>
			{/foreach}
		</select>
	</div>
	<div class="ui-form-group">
		<input type="text" name="title" maxlength="50" class="ui-form-ip" placeholder="请输入标题" data-rule="标题:required;">
	</div>
	<div class="ui-form-group">
		<script id="content" name="content" class="ui-editor" type="text/plain" data-toolbar="mini"></script>
	</div>
	{if sdcms[bbs_post_code]==1}
	<div class="ui-form-group">
		<div class="ui-input-group">
			<input type="text" class="ui-form-ip radius-right-none" name="code" id="code" size="8" maxlength="8" placeholder="请输入验证码" data-rule="验证码:required;">
			<span class="code"><img src="{U('code')}" height="40" id="verify" title="点击更换验证码"></span>
		</div>
	</div>
	{/if}
	<div class="ui-form-group">
		<input type="hidden" name="token" value="{$token}"><button type="submit" class="ui-btn ui-btn-block ui-btn-blue">发布主题</button>
	</div>
</form>