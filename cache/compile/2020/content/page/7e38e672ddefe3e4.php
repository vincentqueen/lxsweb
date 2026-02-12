<?php defined('IN_SDCMS') or die(); if(!defined('IN_SDCMS')) exit;?>
<?php include $this->tp->parse_include_twos("include/top.php");?>

<title><?php if (!isempty($catetitle)) {  echo $catetitle; } else {  echo $catename; }?>_<?php if ($page>1) { ?>第<?php echo $page;?>页_<?php } echo add_city(C(strtoupper('web_name')),3);?></title>
<meta name="keywords" content="<?php if (!isempty($catekey)) {  echo $catekey; } else {  echo $catename; }?>">
<meta name="description" content="<?php if (!isempty($catedesc)) {  echo $catedesc; } else {  echo $catename; }?>">
</head>

<body class="page-contact">
<div class="wrapper">
<?php include $this->tp->parse_include_twos("include/head.php");?>

<div class="bodyer">

    <div class="mbnr">
        <div class="bg"><img src="<?php echo $mynybanner;?>" class="banner"></div>
    </div>

    <div class="pwrap contact">
        <div class="wm">
            <div class="pbody">
                <div class="info">
                    <h2><img src="<?php echo WEB_THEME;?>static/picture/contact-h.png"></h2>
                    <div class="xcont ctts">
                        <p><?php echo $content;?></p>
                    </div>
                </div>
                <div class="map">
                    <img src="<?php echo WEB_THEME;?>static/picture/ard.png" alt="位置">
                </div>
            </div>
        </div>
    </div>
    <!--contact end-->
</div>
<?php include $this->tp->parse_include_twos("include/foot.php");?>

</div>
<!--wrapper-->
</body>
</html>
