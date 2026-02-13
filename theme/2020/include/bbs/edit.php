<?php if(!defined('IN_SDCMS')) exit;?>
<div class="ui-row bbs">
	<div class="bbs-left">
		{include file="include/bbs/left.php"}
	</div>
	<div class="bbs-right">
		<div class="bbs-right-title">编辑主题</div>
		<div class="bbs-post">
			<!--form begin-->
			<form class="ui-form" method="post">
				<div class="ui-form-group ui-row">
					<label class="ui-col-2 ui-col-form-label">标题：</label>
					<div class="ui-col-10">
						<input type="text" name="title" class="ui-form-ip" value="{$title}" size="60" maxlength="50" data-rule="标题:required;">
					</div>
				</div>
				<div class="ui-form-group ui-row">
					<label class="ui-col-2 ui-col-form-label">内容：</label>
					<div class="ui-col-10">
                        <script id="content" name="content" class="ui-editor" type="text/plain" data-toolbar="mini">{$content}</script>
					</div>
				</div>
				{if sdcms[bbs_post_code]==1}
				<div class="ui-form-group ui-row">
					<label class="ui-col-2 ui-col-form-label">验证码：</label>
					<div class="ui-col-10">
						<div class="ui-input-group">
							<input type="text" class="ui-form-ip radius-right-none" name="code" id="code" size="8" maxlength="8" data-rule="验证码:required;">
							<span class="code"><img src="{U('code')}" height="40" id="verify" title="点击更换验证码"></span>
						</div>
					</div>
				</div>
				{/if}
				<div class="ui-form-group ui-row">
					<label class="ui-col-2 ui-col-form-label"></label>
					<div class="ui-col-10">
                    	<input type="hidden" name="token" value="{$token}">
						<button type="submit" class="ui-btn ui-btn-blue ui-mr">保存</button>
						<button type="button" class="ui-btn" onClick="location.href='{PRE_URL}'">返回</button>
					</div>
				</div>
				</form>
			<!--form over-->
		</div>
		
	</div>
</div>