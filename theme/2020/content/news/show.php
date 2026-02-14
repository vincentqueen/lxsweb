<?php if(!defined('IN_SDCMS')) exit;?>
{include file="include/top.php"}
<title>{if !isempty($seotitle)}{$seotitle}{else}{$title}{/if}_{if $page>1}第{$page}页_{/if}{$catename}_{sdcms[web_name]}</title>
<meta name="keywords" content="{if !isempty($seokey)}{$seokey}{else}{$title}{/if}">
<meta name="description" content="{if !isempty($seodesc)}{$seodesc}{else}{$title}{/if}">
</head>

<body class="app-article">
<div class="wrapper">    
{include file="include/head.php"}

<div class="bodyer pnews-detail">

    <div class="mbnr" style="position: relative; height: auto !important; padding-bottom: 0 !important;">
        <div class="bg" style="position: relative !important; height: auto !important;">
            <img src="/upfile/2026/47/jimeng-2026-02-14-5052.png" style="width: 100%; aspect-ratio: 21/5; object-fit: cover; display: block; height: auto;">
        </div>
        <div class="wm" style="position: absolute; top: 50%; left: 50%; transform: translate(-50%, -50%); text-align: center; width: 100%;">
            <h1 style="font-size: 48px; color: #fff; font-weight: 800; text-shadow: 0 2px 10px rgba(0,0,0,0.3); margin: 0;">新闻中心</h1>
            <p style="font-size: 18px; color: rgba(255,255,255,0.9); margin-top: 15px; letter-spacing: 2px;">NEWS CENTER</p>
        </div>
    </div>

    <!--content-->
    <div class="pnews-detail" style="background: linear-gradient(135deg, rgba(255,255,255,0.9) 0%, rgba(245,247,250,0.9) 100%), url('data:image/svg+xml;base64,PHN2ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHdpZHRoPSI0IiBoZWlnaHQ9IjQiPgo8cmVjdCB3aWR0aD0iNCIgaGVpZ2h0PSI0IiBmaWxsPSIjZjhmOWZhIi8+CjxyZWN0IHdpZHRoPSIxIiBoZWlnaHQ9IjEiIGZpbGw9IiNlNmU4ZjAiIG9wYWNpdHk9IjAuMiIvPgo8L3N2Zz4='); padding: 60px 0 100px;">
        <div class="wm" style="max-width: 900px; margin: 0 auto;">
            <!--content-->
            <div class="article-body" style="background: rgba(255, 255, 255, 0.7); backdrop-filter: blur(10px); -webkit-backdrop-filter: blur(10px); border: 1px solid rgba(255, 255, 255, 0.5); border-radius: 20px; padding: 50px; box-shadow: 0 8px 40px rgba(0, 0, 0, 0.08);">
                <div class="head" style="text-align: center; margin-bottom: 40px; border-bottom: 1px solid #eee; padding-bottom: 30px;">
                    <h1 style="font-size: 32px; color: #1a1a1a; font-weight: 700; margin-bottom: 20px; line-height: 1.4;">{$title}</h1>
                    <div class="metas" style="font-size: 14px; color: #999; font-family: Arial, sans-serif;">
                        发布时间：{date('Y-m-d',$createdate)}
                    </div>
                    {if !isempty($intro)}
                    <div class="summary" style="margin-top: 30px; padding: 20px; background: rgba(249, 249, 249, 0.8); border-radius: 8px; text-align: left; color: #666; font-size: 15px; line-height: 1.8;">
                        <strong>摘要：</strong>{cutstr(nohtml($rs[intro]),200,1)}
                    </div>
                    {/if}
                </div>
                
                <div class="cont">
					<div class="xcont" style="font-size: 16px; line-height: 2; color: #333; text-align: justify;">
                        <style>
                            .xcont img { max-width: 100% !important; height: auto !important; margin: 20px 0; border-radius: 8px; }
                            .xcont p { margin-bottom: 20px; }
                        </style>
					    {$content}
					</div>
                    
                    <div class="prevnext" style="margin-top: 60px; padding-top: 30px; border-top: 1px solid #eee; display: flex; justify-content: space-between; flex-wrap: wrap; gap: 20px;">
                        <div class="prev" style="flex: 1; min-width: 300px;">
                            {sdcms:rs top="1" table="sd_content" where="islock=1 and id<$id and classid=$classid" order="id desc"}
                                <p style="font-size: 14px; color: #999; margin-bottom: 5px;">上一篇</p>
                                <a href="{$rs[link]}" title="{$rs[title]}" style="font-size: 16px; color: #333; font-weight: 600; text-decoration: none; display: block; overflow: hidden; white-space: nowrap; text-overflow: ellipsis;">{$rs[title]}</a>
                            {/sdcms:rs}
                            {if count($rs)==0}<p style="color:#ccc">没有了</p>{/if}
                        </div>
                        <div class="next" style="flex: 1; min-width: 300px; text-align: right;">
                            {sdcms:rs top="1" table="sd_content" where="islock=1 and id>$id and classid=$classid" order="id asc"}
                                <p style="font-size: 14px; color: #999; margin-bottom: 5px;">下一篇</p>
                                <a href="{$rs[link]}" title="{$rs[title]}" style="font-size: 16px; color: #333; font-weight: 600; text-decoration: none; display: block; overflow: hidden; white-space: nowrap; text-overflow: ellipsis;">{$rs[title]}</a>
                            {/sdcms:rs}
                             {if count($rs)==0}<p style="color:#ccc">没有了</p>{/if}
                        </div>
					</div>
                </div>
            </div>
        </div>
    </div>
</div>
  {include file="include/foot.php"}
</div>
</body>

</html>