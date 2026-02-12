<?php if(!defined('IN_SDCMS')) exit;?>

{include file="include/top.php"}
</head>
<body class="home">
<div class="wrapper">

{include file="include/head.php"}
<div class="bodyer">
	<div class="ui-carousel banner">
        <div class="ui-carousel-inner">
			{sdcms:rs table="sd_ad" where="akey='pc' and islock=1"}
            {php $adlist=jsdecode($rs[datalist],1)}
            {php $step=0}
            {foreach $adlist as $num=>$val}
                <div class="ui-carousel-item{if $step==0} active{/if}"><a href="{$val['url']}" title="{$val['desc']}"><img src="{$val['image']}" alt="{$val['desc']}"></a></div>
            {php $step++}
            {/foreach}
            {/sdcms:rs}
		</div>
    </div>



    <div class="fx-row ibnr imrgt ibernecka">
    {sdcms:rp top="1" table="sd_category" where="cateid=2"}
        <div class="wm">
            <div class="ibnr-bg"><img src="{if $rp[sypic]!=null}{$rp[sypic]}{else}{WEB_THEME}static/picture/iberneck-01.png{/if}" alt="{$rp[catename]}"></div>
            <div class="inc">
                <div class="maina"><a href="{cateurl($rp[cateid])}" title="{$rp[catename]}">进一步了解</a></div>
                <!-- <div class="ibnr-sq"><a href="index2.html#j_auth" class="ibnr-sq-a" title="授权查询 Query">授权查询QUERY</a></div> -->
            </div>
        </div>
    {/sdcms:rp} 
    </div>  
  
    <div class="fx-row ibnr imrgt iauvico">
    {sdcms:rp top="1" table="sd_category" where="cateid=41"}
      <div class="wm">
          <div class="ibnr-bg"><img src="{if $rp[sypic]!=null}{$rp[sypic]}{else}{WEB_THEME}static/picture/iauvico.jpg{/if}" alt="{$rp[catename]}"></div>
          <div class="inc">
              <div class="maina2"><a href="{cateurl($rp[cateid])}" title="{$rp[catename]}">进一步了解</a></div>
              <!-- <div class="ibnr-sq died"><a href="index3.html#j_auth" class="ibnr-sq-a" title="授权查询 Query">授权查询QUERY</a></div> -->
          </div>
      </div>
      {/sdcms:rp}
    </div>
    <div class="fx-row ibnr imrgt iaige">
    {sdcms:rp top="1" table="sd_category" where="cateid=4"}
        <div class="wm">
            <div class="ibnr-bg"><img src="{if $rp[sypic]!=null}{$rp[sypic]}{else}{WEB_THEME}static/picture/iaige.jpg{/if}" alt="{$rp[catename]}"></div>
            <div class="inc">
                <div class="maina"><a href="{cateurl($rp[cateid])}" title="{$rp[catename]}">进一步了解</a></div>
                <!-- <div class="ibnr-sq"><a href="index4.html#j_auth" class="ibnr-sq-a" title="授权查询 Query">授权查询QUERY</a></div> -->
            </div>
        </div>
        {/sdcms:rp}
    </div>     
    <div class="fx-row ibnr imrgt iluhua">
    {sdcms:rp top="1" table="sd_category" where="cateid=5"}
        <div class="wm">
            <div class="ibnr-bg"><img src="{if $rp[sypic]!=null}{$rp[sypic]}{else}{WEB_THEME}static/picture/iluhua.jpg{/if}" alt="{$rp[catename]}"></div>
            <div class="inc">
                <div class="maina2"><a href="{cateurl($rp[cateid])}" title="{$rp[catename]}">进一步了解</a></div>
                <!-- <div class="ibnr-sq"><a href="index5.html#j_auth" class="ibnr-sq-a black" title="授权查询 Query">授权查询QUERY</a></div> -->
            </div>
        </div>
        {/sdcms:rp}
    </div>
        <div class="fx-row ibnr imrgt iaige">
    {sdcms:rp top="1" table="sd_category" where="cateid=47"}
        <div class="wm">
            <div class="ibnr-bg"><img src="{if $rp[sypic]!=null}{$rp[sypic]}{else}{WEB_THEME}static/picture/iaige.jpg{/if}" alt="{$rp[catename]}"></div>
            <div class="inc">
                <div class="maina"><a href="{cateurl($rp[cateid])}" title="{$rp[catename]}">进一步了解</a></div>
                <!-- <div class="ibnr-sq"><a href="index4.html#j_auth" class="ibnr-sq-a" title="授权查询 Query">授权查询QUERY</a></div> -->
            </div>
        </div>
        {/sdcms:rp}
    </div> 

</div>

{include file="include/foot.php"}
</div>
<script type="text/javascript" src="{WEB_THEME}static/js/index.js"></script>
</body>
</html>