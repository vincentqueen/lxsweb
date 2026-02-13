<?php if(!defined('IN_SDCMS')) exit;?>
<form class="ui-form" method="post">
    <div class="ui-form-group">
        <input type="text" name="title" class="ui-form-ip" value="{$title}" placeholder="请输入标题" size="60" maxlength="50" data-rule="标题:required;">
    </div>
    <div class="ui-form-group">
    	<script id="content" name="content" class="ui-editor" type="text/plain" data-toolbar="mini">{$content}</script>
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
        <input type="hidden" name="token" value="{$token}"><button type="submit" class="ui-btn ui-btn-block ui-btn-blue ui-mr">保存</button>
    </div>
</form>