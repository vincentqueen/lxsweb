<?php if(!defined('IN_SDCMS')) exit;?>
{include file="mobile/include/top.php"}
<title>{if !isempty(sdcms[seo_title])}{sdcms[seo_title]}{else}{sdcms[web_name]}{/if}</title>
<meta name="keywords" content="{sdcms[seo_key]}">
<meta name="description" content="{sdcms[seo_desc]}">
{include file="mobile/include/wxshare.php"}
</head>

<body class="page-home">
<div class="app-main">
{include file="mobile/include/head.php"}
	<!--Banner部分开始-->
	<div class="ui-mwidth banner">
    	<div class="ui-carousel" data-arrow="false">
            <div class="ui-carousel-inner">
            	{sdcms:rs table="sd_ad" where="akey='mobile' and islock=1"}
                    {php $adlist=jsdecode($rs[datalist],1)}
                	{php $step=0}
                    {foreach $adlist as $num=>$val}
                    	<div class="ui-carousel-item{if $step==0} active{/if}"><a href="{$val['url']}"><img src="{$val['image']}" alt="{$val['desc']}"></a></div>
                    {php $step++}
                    {/foreach}
                {/sdcms:rs}
            </div>
        </div>
    </div>
	<!--Banner部分结束-->
	
	<!--如有变更，请自行更换（代码特征：cateurl(3)，followid=3，get_sonid_all(3)）,以下其他栏目调用方式相同-->
	<div class="bodyer">
	{sdcms:rp top="1" table="sd_category" where="cateid=2"}
    <div class="fx-row ibnr imrgt i-berneck">
        <div class="container">
          <div class="ibnr-bg">
			<a href="{cateurl($rp[cateid])}" title="{$rp[catename]}">
				<img src="{if $rp[sypic]!=null}{$rp[sypic]}{else}{WEB_THEME}static/picture/iberneck-01.png{/if}" alt="{$rp[catename]}">
			</a>
		</div>
        </div>
    </div>
	{/sdcms:rp}
	{sdcms:rp top="1" table="sd_category" where="cateid=41"}
    <div class="fx-row ibnr imrgt iauvico">
      <div class="container">
          <div class="ibnr-bg">
			<a href="{cateurl($rp[cateid])}" title="{$rp[catename]}">
				<img src="{if $rp[sypic]!=null}{$rp[sypic]}{else}{WEB_THEME}static/picture/iauvico.jpg{/if}" alt="{$rp[catename]}">
			</a>
		</div>
      </div>
    </div>   
	{/sdcms:rp}
	{sdcms:rp top="1" table="sd_category" where="cateid=4"}
    <div class="fx-row ibnr imrgt iaige">
      <div class="container">
          <div class="ibnr-bg">
			<a href="{cateurl($rp[cateid])}" title="{$rp[catename]}">
				<img src="{if $rp[sypic]!=null}{$rp[sypic]}{else}{WEB_THEME}static/picture/iaige.jpg{/if}" alt="{$rp[catename]}">
			</a>
		</div>
      </div>
    </div>     
	{/sdcms:rp}
	{sdcms:rp top="1" table="sd_category" where="cateid=5"}
    <div class="fx-row ibnr imrgt iluhua">
        <div class="container">
            <div class="ibnr-bg">
				<a href="{cateurl($rp[cateid])}" title="{$rp[catename]}">
					<img src="{if $rp[sypic]!=null}{$rp[sypic]}{else}{WEB_THEME}static/picture/iluhua.jpg{/if}" alt="{$rp[catename]}">
				</a>
			</div>
        </div>
    </div> 
	{/sdcms:rp}
</div>
	
	
	{include file="mobile/include/foot.php"}
	<script type="text/javascript" src="{WEB_THEME}mobile/static/js/index.js"></script>
	<!-- <script>
	$(function()
	{
		/*首页链接添加选中效果*/
		$("#bar_home").addClass("active");
	})
	</script> -->
</div>
</body>
</html>
