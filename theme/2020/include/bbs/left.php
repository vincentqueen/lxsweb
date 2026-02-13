<?php if(!defined('IN_SDCMS')) exit;?>
<div class="ui-fixed" data-parent=".bbs-left">
	<div class="bbs-left-title">社区分类</div>
	<ul class="bbs-left-nav">
		{if !isset($fid)}{php $fid=-1;}{/if}
		<li{if $fid==0} class="active"{/if}><a href="{N('bbs')}"><i class="ui-icon-home"></i>全部主题</a></li>
		{sdcms:rs top="0" table="sd_bbs_cate" where="isshow=1" order="ordnum,cateid"}
		<li{if $fid==$rs[cateid]} class="active"{/if}><a href="{N('bbs','','fid='.$rs[cateid].'')}" title="{$rs[catename]}"><i class="{if !isempty($rs[cate_icon])}{$rs[cate_icon]}{else}ui-icon-square{/if}"></i>{$rs[catename]}</a></li>
		{/sdcms:rs}
	</ul>
	<div class="bbs-left-title">主题搜索</div>
	<div class="bbs_search">
		<form action="{U('bbs/search')}" method="post" onSubmit="return checksearch(this)">
		<div class="ui-form-group">
			<div class="ui-input-group">
				{if sdcms[url_mode]==1}<input type="hidden" name="c" value="bbs" /><input type="hidden" name="a" value="search" />{/if}
				<input type="text" name="keyword" class="ui-form-ip radius-right-none" placeholder="查找主题">
                <input type="hidden" name="token" value="{$token}">
				<button type="submit" class="after"><div class="ui-icon-search"></div></button>
			</div>
		</div>
		</form>
	</div>
</div>