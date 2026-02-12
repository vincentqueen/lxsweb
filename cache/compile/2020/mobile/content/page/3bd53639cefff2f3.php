<?php defined('IN_SDCMS') or die(); if(!defined('IN_SDCMS')) exit;?>
<?php include $this->tp->parse_include_twos("mobile/include/top.php");?>

<title><?php if (!isempty($catetitle)) {  echo $catetitle; } else {  echo $catename; }?>_<?php if ($page>1) { ?>第<?php echo $page;?>页_<?php } echo add_city(C(strtoupper('web_name')),3);?></title>
<meta name="keywords" content="<?php if (!isempty($catekey)) {  echo $catekey; } else {  echo $catename; }?>">
<meta name="description" content="<?php if (!isempty($catedesc)) {  echo $catedesc; } else {  echo $catename; }?>">
</head>


<body class="page-contact">
<div class="app-main">
<!--header-->
<?php include $this->tp->parse_include_twos("mobile/include/head.php");?>

<div class="mbnr">
    <div class="in"><img src="https://w.yksyb.cn/img.php?w=750&h=180" alt="联系我们"></div>
</div>
<div class="bodyer"> 
    <!--contact-->
    <div class="pwrap contact">
        <div class="phead"></div>
        <div class="pbody">          
            <div class="ctts">
              <h2><img src="<?php echo WEB_THEME;?>mobile/static/picture/contact-h.png"></h2>
                <div class="info">
                    <p><?php echo $content;?></p>
                </div>
            </div>
            <div class="maps">
                <img src="https://w.yksyb.cn/img.php?w=444&h=453" alt="位置">
            </div>
        </div>
    </div>
    <!--contact end-->
</div>
<!-- footer -->
<?php include $this->tp->parse_include_twos("mobile/include/foot.php");?>

</div>
</body>
</html>
