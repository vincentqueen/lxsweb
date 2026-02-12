<?php defined('IN_SDCMS') or die(); if(!defined('IN_SDCMS')) exit;?>
	
	
<div class="toper">
        <div class="header">
        <div class="head">
            <h1 class="logo-t"><a href=""><img src="<?php echo add_city(C(strtoupper('web_logo')),3);?>" alt="<?php echo add_city(C(strtoupper('web_name')),3);?>" ></a></h1>
            <div class="gnav">
                <div class="navi">
                  <ul>
                    <li<?php if (IS_HOME) { ?> class="active"<?php }?>><a class="nav" id="nav_1" title="首页" href="<?php echo $webroot;?>" target="_self"><span class="cn">首页</span></a></li>
                    <?php $a=2;?>
                    <?php $array_rp=$this->db->load("select * from sd_category  where followid=0 and isshow=1  order by catenum,cateid ",0,false,0);$total_rp=count($array_rp);if($total_rp==0){ ?>
<?php } else{ ?>
<?php $i=0;} foreach($array_rp as $rp){ $i++;?>
                    <?php $head_sonid=$rp['cateid'];?>
                    <li<?php echo is_active($rp['cateid'],$parentid,'active');?>>
                        <a class="nav" id="nav_<?php echo $a;?>" title="<?php echo add_city($rp['catename'],1);?>" href="<?php echo cateurl($rp['cateid']);?>" target="_self">
                            <span class="cn"><?php echo add_city($rp['catename'],1);?></span>
                        </a>
                    </li>
                    <?php $a++;?>
                    <?php } if($total_rp>0){ ?>
<?php }?>
                </ul>
                </div>
                <div class="navi-trigger">
                    <!-- <div class="trigger" id="j-nav-trigger" title="切换导航">
                    <span class="line line-top"></span>
                    <span class="line line-middle"></span>
                    <span class="line line-bottom"></span>
                    </div> -->
                    <div class="header_center">
                        <div class="w1200">
                            <div class="tel">咨询热线<b><?php echo add_city(C(strtoupper('ct_mobile')),3);?></b></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>