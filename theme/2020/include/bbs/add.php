<?php if(!defined('IN_SDCMS')) exit;?>
<div class="ui-row bbs">
	<div class="bbs-left">
		{include file="include/bbs/left.php"}
	</div>
	<div class="bbs-right">
		<div class="bbs-right-title">发表主题</div>
		<div class="bbs-post">
			<!--form begin-->
			<form class="ui-form" method="post">
				<div class="ui-form-group ui-row">
					<label class="ui-col-2 ui-col-form-label">分类：</label>
					<div class="ui-col-10">
						<select name="classid" data-rule="分类:required;int;" class="ui-form-ip">
							<option value="">请选择分类</option>
							{foreach $bbscate as $key=>$val}
							<option value="{$val['cateid']}"{if $fid==$val['cateid']} selected{/if}>{$val['catename']}</option>
							{/foreach}
						</select>
					</div>
				</div>
				<div class="ui-form-group ui-row">
					<label class="ui-col-2 ui-col-form-label">标题：</label>
					<div class="ui-col-10">
						<input type="text" name="title" maxlength="50" class="ui-form-ip" data-rule="标题:required;">
					</div>
				</div>
				<div class="ui-form-group ui-row">
					<label class="ui-col-2 ui-col-form-label">内容：</label>
					<div class="ui-col-10">
						<script id="content" name="content" class="ui-editor" type="text/plain" data-toolbar="mini"></script>
					</div>
				</div>
				{if sdcms[bbs_post_code]==1}
				<div class="ui-form-group ui-row">
					<label class="ui-col-2 ui-col-form-label">验证码：</label>
					<div class="ui-col-6">
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
						<button type="submit" class="ui-btn ui-btn-blue ui-mr">发布主题</button>
						<button type="button" class="ui-btn" onClick="location.href='{N('bbs')}'">返回</button>
					</div>
				</div>
			</form>
			<!--form over-->
		</div>
		
	</div>
</div>