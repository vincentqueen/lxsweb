<?php if(!defined('IN_SDCMS')) exit;?>
{include file="include/top.php"}
<title>{if !isempty($catetitle)}{$catetitle}{else}{$catename}{/if}{$filter_key}_{if $page>1}第{$page}页_{/if}{sdcms[web_name]}</title>
<meta name="keywords" content="{if !isempty($catekey)}{$catekey}{else}{$catename}{/if}">
<meta name="description" content="{if !isempty($catedesc)}{$catedesc}{else}{$catename}{/if}">
</head>

<body class="page-about sub">
<div class="wrapper">   
{include file="include/head.php"} 
  
<div class="bodyer">

    <div class="mbnr" style="position: relative; height: auto !important; padding-bottom: 0 !important;">
        <div class="bg" style="position: relative !important; height: auto !important;">
            <img src="/upfile/2026/47/jimeng-2026-02-14-5052.png" style="width: 100%; aspect-ratio: 21/5; object-fit: cover; display: block; height: auto;">
        </div>
        <div class="wm" style="position: absolute; top: 50%; left: 50%; transform: translate(-50%, -50%); text-align: center; width: 100%;">
            <h1 style="font-size: 48px; color: #fff; font-weight: 800; text-shadow: 0 2px 10px rgba(0,0,0,0.3); margin: 0;">新闻中心</h1>
            <p style="font-size: 18px; color: rgba(255,255,255,0.9); margin-top: 15px; letter-spacing: 2px;">NEWS CENTER</p>
        </div>
    </div>

	<div class="pnews" style="background: linear-gradient(135deg, rgba(255,255,255,0.9) 0%, rgba(245,247,250,0.9) 100%), url('data:image/svg+xml;base64,PHN2ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHdpZHRoPSI0IiBoZWlnaHQ9IjQiPgo8cmVjdCB3aWR0aD0iNCIgaGVpZ2h0PSI0IiBmaWxsPSIjZjhmOWZhIi8+CjxyZWN0IHdpZHRoPSIxIiBoZWlnaHQ9IjEiIGZpbGw9IiNlNmU4ZjAiIG9wYWNpdHk9IjAuMiIvPgo8L3N2Zz4='); padding: 60px 0 80px;">
		<div class="pwrap">
            <div class="wm" style="max-width: 1200px; margin: 0 auto;">
                <!--main list-->
                <div class="pbody ui-atc">
                    <div class="news-list-grid" style="display: flex; flex-direction: column; gap: 30px;">
					{sdcms:rs top="0" pagesize="6" table="sd_content" where="sd_content.classid=28" order="ontop desc,ordnum desc,id desc"}
                        <div class="news-item" style="background: rgba(255, 255, 255, 0.7); backdrop-filter: blur(10px); -webkit-backdrop-filter: blur(10px); border: 1px solid rgba(255, 255, 255, 0.5); border-radius: 16px; padding: 24px; transition: all 0.4s ease; box-shadow: 0 4px 30px rgba(0, 0, 0, 0.08);">
                            <a href="{$rs[link]}" title="{$rs[title]}" style="display: flex; text-decoration: none; gap: 24px; align-items: flex-start;">
                                <div class="thumb" style="width: 280px; flex-shrink: 0; aspect-ratio: 16/9; border-radius: 12px; overflow: hidden; box-shadow: 0 4px 15px rgba(0,0,0,0.1);">
                                    <img src="{$rs[pic]}" alt="{$rs[title]}" style="width: 100%; height: 100%; object-fit: cover; transition: transform 0.5s ease;">
                                </div>
                                <div class="info" style="flex: 1; padding-top: 8px;">
                                    <h5 style="font-size: 20px; color: #1a1a1a; font-weight: 700; margin-bottom: 12px; line-height: 1.4;">{$rs[title]}</h5>
                                    <div class="date" style="font-size: 13px; color: #999; margin-bottom: 12px; font-family: Arial, sans-serif; letter-spacing: 0.5px;">
                                        {date('Y-m-d',$rs[createdate])}
                                    </div>
                                    <div class="txt" style="font-size: 15px; color: #555; line-height: 1.8; max-height: 80px; overflow: hidden; display: -webkit-box; -webkit-line-clamp: 3; -webkit-box-orient: vertical;">
                                        {cutstr(nohtml($rs[intro]),200,1)}
                                    </div>
                                </div>
                            </a>
                        </div>
						{/sdcms:rs}
                    </div> 
                    <style>
                        .news-item:hover { transform: translateY(-3px); box-shadow: 0 8px 40px rgba(0, 0, 0, 0.12) !important; background: rgba(255, 255, 255, 0.9) !important; }
                        .news-item:hover .thumb img { transform: scale(1.08); }
                        .news-item:hover h5 { color: #000; }
                        @media (max-width: 768px) {
                            .news-item a { flex-direction: column; }
                            .news-item .thumb { width: 100%; }
                        }
                    </style>
                    <div class="clr pagers" style="margin-top: 50px; text-align: center;">
						{$showpage}
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
