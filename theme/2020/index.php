<?php if(!defined('IN_SDCMS')) exit;?>

{include file="include/top.php"}
</head>
<body class="home">
<div class="wrapper">

{include file="include/head.php"}
<div class="bodyer">
    <section class="home-hero">
        <div class="hero-media">
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
        </div>
        <div class="hero-overlay"></div>
        <div class="hero-content">
            <div class="hero-inner">
                <div class="hero-kicker">GREEN TECH LIVING</div>
                <div class="hero-title">让空间回归自然与科技的平衡</div>
                <div class="hero-desc">以绿色材料与精密工艺，构建更健康、更长久的木作体系，为家与商业空间提供高标准的品质体验。</div>
                <div class="hero-actions">
                    {sdcms:rp top="1" table="sd_category" where="cateid=2"}
                    <a class="btn-primary" href="{cateurl($rp[cateid])}" title="{$rp[catename]}">查看产品</a>
                    {/sdcms:rp}
                    <a class="btn-ghost" href="tel:{sdcms[ct_mobile]}">在线咨询</a>
                </div>
            </div>
        </div>
    </section>

    <section class="section">
        <div class="section-head">
            <div>
                <div class="section-title">核心产品矩阵</div>
                <div class="section-sub">精选场景解决方案，兼顾功能与美学</div>
            </div>
        </div>
        <div class="feature-grid">
            {sdcms:rp top="1" table="sd_category" where="cateid=2"}
            <a class="feature-card" href="{cateurl($rp[cateid])}" title="{$rp[catename]}">
                <div class="feature-thumb"><img src="{if $rp[sypic]!=null}{$rp[sypic]}{else}{WEB_THEME}static/picture/iberneck-01.png{/if}" alt="{$rp[catename]}"></div>
                <div class="feature-body">
                    <div class="feature-name">{$rp[catename]}</div>
                    <div class="feature-link">进一步了解</div>
                </div>
            </a>
            {/sdcms:rp}
            {sdcms:rp top="1" table="sd_category" where="cateid=41"}
            <a class="feature-card" href="{cateurl($rp[cateid])}" title="{$rp[catename]}">
                <div class="feature-thumb"><img src="{if $rp[sypic]!=null}{$rp[sypic]}{else}{WEB_THEME}static/picture/iauvico.jpg{/if}" alt="{$rp[catename]}"></div>
                <div class="feature-body">
                    <div class="feature-name">{$rp[catename]}</div>
                    <div class="feature-link">进一步了解</div>
                </div>
            </a>
            {/sdcms:rp}
            {sdcms:rp top="1" table="sd_category" where="cateid=4"}
            <a class="feature-card" href="{cateurl($rp[cateid])}" title="{$rp[catename]}">
                <div class="feature-thumb"><img src="{if $rp[sypic]!=null}{$rp[sypic]}{else}{WEB_THEME}static/picture/iaige.jpg{/if}" alt="{$rp[catename]}"></div>
                <div class="feature-body">
                    <div class="feature-name">{$rp[catename]}</div>
                    <div class="feature-link">进一步了解</div>
                </div>
            </a>
            {/sdcms:rp}
            {sdcms:rp top="1" table="sd_category" where="cateid=5"}
            <a class="feature-card" href="{cateurl($rp[cateid])}" title="{$rp[catename]}">
                <div class="feature-thumb"><img src="{if $rp[sypic]!=null}{$rp[sypic]}{else}{WEB_THEME}static/picture/iluhua.jpg{/if}" alt="{$rp[catename]}"></div>
                <div class="feature-body">
                    <div class="feature-name">{$rp[catename]}</div>
                    <div class="feature-link">进一步了解</div>
                </div>
            </a>
            {/sdcms:rp}
            {sdcms:rp top="1" table="sd_category" where="cateid=47"}
            <a class="feature-card" href="{cateurl($rp[cateid])}" title="{$rp[catename]}">
                <div class="feature-thumb"><img src="{if $rp[sypic]!=null}{$rp[sypic]}{else}{WEB_THEME}static/picture/iaige.jpg{/if}" alt="{$rp[catename]}"></div>
                <div class="feature-body">
                    <div class="feature-name">{$rp[catename]}</div>
                    <div class="feature-link">进一步了解</div>
                </div>
            </a>
            {/sdcms:rp}
        </div>
    </section>

    <section class="section">
        <div class="section-head">
            <div>
                <div class="section-title">品质承诺</div>
                <div class="section-sub">从材料、工艺到交付，全面提升空间体验</div>
            </div>
        </div>
        <div class="value-grid">
            <div class="value-card">
                <div class="value-title">环保选材</div>
                <div class="value-desc">精选可持续供应链原材，减少挥发物，确保居住与商业空间健康安全。</div>
            </div>
            <div class="value-card">
                <div class="value-title">精密工艺</div>
                <div class="value-desc">标准化加工与细节控制，提升结构稳定性与使用寿命，兼顾质感与触感。</div>
            </div>
            <div class="value-card">
                <div class="value-title">场景定制</div>
                <div class="value-desc">以空间场景为核心，灵活组合模块与色系，打造专属的美学与功能方案。</div>
            </div>
        </div>
    </section>
</div>

{include file="include/foot.php"}
</div>
<script type="text/javascript" src="{WEB_THEME}static/js/index.js"></script>
</body>
</html>
