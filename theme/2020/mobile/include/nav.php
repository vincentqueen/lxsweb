<?php if (!defined('IN_SDCMS'))
	exit; ?>

<div class="menu-wrap" id="style-1">
	<nav class="gnavbar">
		<dl class="gnav">
			<dt class="gnav-title">网站导航</dt>
			<dd>
				<ul class="nav-main icon-list">
					<li class="active"><a class="nav" title="首页" href="{$webroot}"><span>首页</span></a>
					</li>
					{sdcms:rp top="0" table="sd_category" where="followid=0 and isshow=1" order="catenum,cateid"}
					{php $sub_sonid=$rp[cateid]}
					<li class="{is_active($rp[cateid],$parentid,'active',1)}">
						<a class="nav" title="{$rp[catename]}"
							href="{cateurl($rp[cateid])}"><span>{$rp[catename]}</span></a>
					</li>
					{/sdcms:rp}

				</ul>
			</dd>
		</dl>
	</nav>
	<!-- <button class="gnav-close" id="close-button">C</button> -->
</div>