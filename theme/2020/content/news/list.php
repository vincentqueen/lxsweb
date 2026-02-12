<?php if(!defined('IN_SDCMS')) exit;?>
{include file="include/top.php"}
<title>{if !isempty($catetitle)}{$catetitle}{else}{$catename}{/if}{$filter_key}_{if $page>1}第{$page}页_{/if}{sdcms[web_name]}</title>
<meta name="keywords" content="{if !isempty($catekey)}{$catekey}{else}{$catename}{/if}">
<meta name="description" content="{if !isempty($catedesc)}{$catedesc}{else}{$catename}{/if}">
</head>

<body class="app-news">
<div class="wrapper">   
{include file="include/head.php"} 
  
<div class="bodyer">

    <div class="mbnr">
        <div class="bg"><img src="{WEB_THEME}static/picture/news.jpg"></div>
    </div>

	<div class="pnews">
		<div class="pwrap">
            <div class="wm">
                <!--main list-->
                <div class="pbody ui-atc">
                    <div class="news-list clr">
					{sdcms:rs top="0" table="sd_content" where="classid=28" order="ontop desc,ordnum desc,id desc"}
                        <div class="news item-1 odd">
                            <div class="news-in">
								<a title="{$rs[title]}" href="{$rs[link]}">
								<div class="thumb 1">
									<img src="{$rs[pic]}" alt="{$rs[title]}">
								</div>
								<div class="info">
									<h5>{$rs[title]}</h5>
									<div class="date">
										{date('m-d',$rs[createdate])}
									</div>
									<div class="txt">
										{cutstr(nohtml($rs[intro]),200,1)}
									</div>
								</div>
							    </a>
						    </div>
                        </div>
						{/sdcms:rs}
                    </div> 
                    <div class="clr pagers">
						<span class="pprev disabled">上一页</span>
						<span class="pnum cpb">1</span>
						<span class="pnext disabled">下一页</span>
					</div>
                </div>
            </div>
        </div>
	</div>
</div>
{include file="include/foot.php"}

</div><!--wrapper-->
<script type="text/javascript" src="{WEB_THEME}static/js/distpicker.min.js"></script>
<script type="text/javascript" src="{WEB_THEME}static/js/jquery.form.min.js"></script>
<script type="text/javascript" src="{WEB_THEME}static/js/Validform_v5.3.2_min.js"></script>
<script type="text/javascript" src="{WEB_THEME}static/js/btmpop.js"></script>
</body>
</html>
