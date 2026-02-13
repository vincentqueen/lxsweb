SET FOREIGN_KEY_CHECKS=0;
-- ----------------------------
-- Table structure for sd_ad
-- ----------------------------
DROP TABLE IF EXISTS `sd_ad`;
CREATE TABLE `sd_ad` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `title` varchar(50) DEFAULT '',
  `datalist` text,
  `ordnum` int(10) DEFAULT '0',
  `islock` int(10) DEFAULT '0',
  `akey` varchar(10) DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Table structure for sd_admin
-- ----------------------------
DROP TABLE IF EXISTS `sd_admin`;
CREATE TABLE `sd_admin` (
  `adminid` int(10) NOT NULL AUTO_INCREMENT,
  `adminname` varchar(50) DEFAULT '',
  `adminpass` varchar(50) DEFAULT '',
  `penname` varchar(20) DEFAULT '',
  `pid` int(10) DEFAULT '0',
  `logintimes` int(10) DEFAULT '0',
  `lastlogindate` int(10) DEFAULT '0',
  `lastloginip` varchar(50) DEFAULT '',
  `islock` int(10) DEFAULT '0',
  `readonly` smallint(1) DEFAULT '0',
  PRIMARY KEY (`adminid`),
  KEY `adminname` (`adminname`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Table structure for sd_admin_log
-- ----------------------------
DROP TABLE IF EXISTS `sd_admin_log`;
CREATE TABLE `sd_admin_log` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `title` varchar(50) DEFAULT '',
  `url` varchar(255) DEFAULT '',
  `msg` varchar(255) DEFAULT '',
  `ip` varchar(50) DEFAULT '',
  `createdate` int(10) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Table structure for sd_admin_login_log
-- ----------------------------
DROP TABLE IF EXISTS `sd_admin_login_log`;
CREATE TABLE `sd_admin_login_log` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `loginname` varchar(50) DEFAULT '',
  `loginip` varchar(50) DEFAULT '',
  `logindate` int(10) DEFAULT '0',
  `loginmsg` varchar(255) DEFAULT '',
  `loginstate` int(1) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Table structure for sd_admin_menu
-- ----------------------------
DROP TABLE IF EXISTS `sd_admin_menu`;
CREATE TABLE `sd_admin_menu` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `title` varchar(50) DEFAULT '',
  `cname` varchar(50) DEFAULT '',
  `aname` varchar(50) DEFAULT '',
  `dname` varchar(255) DEFAULT '',
  `followid` int(10) DEFAULT '0',
  `ordnum` int(10) DEFAULT '0',
  `islock` int(10) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Table structure for sd_admin_part
-- ----------------------------
DROP TABLE IF EXISTS `sd_admin_part`;
CREATE TABLE `sd_admin_part` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `title` varchar(50) DEFAULT '',
  `ordnum` int(10) DEFAULT '0',
  `page_list` text,
  `cate_list` text,
  `pagelever` varchar(50) DEFAULT '',
  `pagelock` smallint(1) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Table structure for sd_alias
-- ----------------------------
DROP TABLE IF EXISTS `sd_alias`;
CREATE TABLE `sd_alias` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `alias` varchar(50) DEFAULT '',
  `app` varchar(255) DEFAULT '',
  `sid` int(10) DEFAULT '0',
  `types` int(10) DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `alias` (`alias`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Table structure for sd_attachment
-- ----------------------------
DROP TABLE IF EXISTS `sd_attachment`;
CREATE TABLE `sd_attachment` (
  `id` int(10) NOT NULL AUTO_INCREMENT COMMENT '1：图片，2：视频，3：其他文件',
  `file_url` varchar(255) DEFAULT '',
  `file_name` varchar(255) DEFAULT '' COMMENT '文件名',
  `file_ext` varchar(50) DEFAULT '' COMMENT '后缀',
  `file_size` int(10) DEFAULT '0',
  `file_type` int(10) DEFAULT '0' COMMENT '1：图片，2：视频，3：其他',
  `file_update` int(10) DEFAULT '0' COMMENT '上传的日期',
  `file_local` int(10) DEFAULT '0' COMMENT '存放位置（1：本地，2：阿里云，3：七牛云）',
  `file_adminid` int(10) DEFAULT '0',
  `file_userid` int(10) DEFAULT '0',
  `file_ip` varchar(50) DEFAULT '' COMMENT '传者上IP',
  `gid` int(10) DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `type` (`file_type`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Table structure for sd_attachment_group
-- ----------------------------
DROP TABLE IF EXISTS `sd_attachment_group`;
CREATE TABLE `sd_attachment_group` (
  `aid` int(10) NOT NULL AUTO_INCREMENT,
  `gname` varchar(50) DEFAULT '',
  `ordnum` int(10) DEFAULT '0',
  `islock` smallint(1) DEFAULT '0',
  PRIMARY KEY (`aid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Table structure for sd_auth
-- ----------------------------
DROP TABLE IF EXISTS `sd_auth`;
CREATE TABLE `sd_auth` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `ckey` varchar(50) DEFAULT '',
  `cval` text,
  `cdate` varchar(255) DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Table structure for sd_auto_key
-- ----------------------------
DROP TABLE IF EXISTS `sd_auto_key`;
CREATE TABLE `sd_auto_key` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `title` varchar(50) DEFAULT '',
  `reply_type` int(10) DEFAULT '0',
  `reply_text` text,
  `reply_id` int(10) DEFAULT '0',
  `matchtype` int(10) DEFAULT '0',
  `ordnum` int(10) DEFAULT '0',
  `islock` int(10) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Table structure for sd_auto_reply
-- ----------------------------
DROP TABLE IF EXISTS `sd_auto_reply`;
CREATE TABLE `sd_auto_reply` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `reply_key` varchar(50) DEFAULT '',
  `reply_type` int(10) DEFAULT '0',
  `reply_text` text,
  `reply_id` int(10) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Table structure for sd_badword
-- ----------------------------
DROP TABLE IF EXISTS `sd_badword`;
CREATE TABLE `sd_badword` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `words` mediumtext,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Table structure for sd_bbs
-- ----------------------------
DROP TABLE IF EXISTS `sd_bbs`;
CREATE TABLE `sd_bbs` (
  `bbs_id` int(10) NOT NULL AUTO_INCREMENT,
  `fid` int(10) DEFAULT '0',
  `title` varchar(255) DEFAULT '',
  `userid` int(10) DEFAULT '0',
  `islock` tinyint(4) DEFAULT '0',
  `ontop` tinyint(4) DEFAULT '0',
  `isnice` tinyint(4) DEFAULT '0',
  `hits` int(10) DEFAULT '0',
  `replynum` int(10) DEFAULT '0',
  `createdate` int(10) DEFAULT '0',
  PRIMARY KEY (`bbs_id`),
  KEY `title` (`title`),
  KEY `islock` (`islock`),
  KEY `fid` (`fid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Table structure for sd_bbs_cate
-- ----------------------------
DROP TABLE IF EXISTS `sd_bbs_cate`;
CREATE TABLE `sd_bbs_cate` (
  `cateid` int(10) NOT NULL AUTO_INCREMENT,
  `catename` varchar(50) DEFAULT '',
  `seotitle` varchar(255) DEFAULT '',
  `seokey` varchar(255) DEFAULT '',
  `seodesc` varchar(255) DEFAULT '',
  `ordnum` int(10) DEFAULT '0',
  `isshow` tinyint(4) DEFAULT '0',
  `view_group` varchar(255) DEFAULT '',
  `post_group` varchar(255) DEFAULT '',
  `reply_group` varchar(255) DEFAULT '',
  `cate_icon` varchar(255) DEFAULT '',
  PRIMARY KEY (`cateid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Table structure for sd_bbs_reply
-- ----------------------------
DROP TABLE IF EXISTS `sd_bbs_reply`;
CREATE TABLE `sd_bbs_reply` (
  `replyid` int(10) NOT NULL AUTO_INCREMENT,
  `bbsid` int(10) DEFAULT '0',
  `userid` int(10) DEFAULT '0',
  `istopic` tinyint(4) DEFAULT '0' COMMENT '是否为主题',
  `content` mediumtext,
  `reply` text,
  `createdate` int(10) DEFAULT '0',
  `islock` int(10) DEFAULT '0',
  PRIMARY KEY (`replyid`),
  KEY `bbsid` (`bbsid`),
  KEY `istopic` (`istopic`),
  KEY `islock` (`islock`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Table structure for sd_book
-- ----------------------------
DROP TABLE IF EXISTS `sd_book`;
CREATE TABLE `sd_book` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `truename` varchar(50) DEFAULT '',
  `tel` varchar(20) DEFAULT '',
  `mobile` varchar(11) DEFAULT '',
  `remark` text,
  `reply` text,
  `ontop` int(10) DEFAULT '0',
  `islock` int(10) DEFAULT '0',
  `createdate` int(10) DEFAULT '0',
  `postip` varchar(20) DEFAULT '',
  `replydate` int(10) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Table structure for sd_category
-- ----------------------------
DROP TABLE IF EXISTS `sd_category`;
CREATE TABLE `sd_category` (
  `cateid` int(10) NOT NULL AUTO_INCREMENT,
  `catename` varchar(50) DEFAULT '',
  `followid` int(10) DEFAULT '0',
  `catenum` int(10) DEFAULT '0',
  `catetype` int(11) DEFAULT '0',
  `cateurl` varchar(255) DEFAULT '',
  `catepage` int(10) DEFAULT '0',
  `catelist` varchar(255) DEFAULT '',
  `cateshow` varchar(255) DEFAULT '',
  `catetitle` varchar(255) DEFAULT '',
  `catekey` varchar(255) DEFAULT '',
  `catedesc` varchar(255) DEFAULT '',
  `isshow` int(10) DEFAULT '0',
  `isblank` int(10) DEFAULT '0',
  `isfilter` int(10) DEFAULT '0',
  `catedomain` varchar(255) DEFAULT '',
  `cate_extend` int(10) DEFAULT '0',
  `cate_groupid` varchar(50) DEFAULT '',
  `myename` varchar(255) DEFAULT '',
  PRIMARY KEY (`cateid`),
  KEY `followid` (`followid`),
  KEY `ordnum` (`catenum`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Table structure for sd_category_field
-- ----------------------------
DROP TABLE IF EXISTS `sd_category_field`;
CREATE TABLE `sd_category_field` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `field_title` varchar(50) DEFAULT '',
  `field_key` varchar(50) DEFAULT '',
  `field_type` int(50) DEFAULT '0',
  `field_length` int(10) DEFAULT '0',
  `field_upload_type` int(10) DEFAULT '0',
  `field_default` varchar(255) DEFAULT '',
  `field_list` text,
  `field_sql` varchar(255) DEFAULT '',
  `field_tips` varchar(255) DEFAULT '',
  `field_rule` int(10) DEFAULT '0',
  `field_radio` int(10) DEFAULT '0',
  `field_editor` int(10) DEFAULT '0',
  `ordnum` int(10) DEFAULT '0',
  `islock` int(10) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Table structure for sd_city
-- ----------------------------
DROP TABLE IF EXISTS `sd_city`;
CREATE TABLE `sd_city` (
  `cateid` int(10) NOT NULL AUTO_INCREMENT COMMENT '区域主键',
  `name` varchar(20) DEFAULT '' COMMENT '区域名称',
  `followid` int(10) DEFAULT '0' COMMENT '上级',
  `ordnum` int(10) DEFAULT '0',
  `site_open` smallint(1) DEFAULT '0' COMMENT '是否开启分站功能',
  `site_root` varchar(50) DEFAULT '' COMMENT '路径',
  `site_domain` smallint(1) DEFAULT '0' COMMENT '是否绑定域名',
  `issys` smallint(1) DEFAULT '0',
  `site_self` smallint(1) DEFAULT '0',
  `site_title` varchar(255) DEFAULT '',
  `site_key` varchar(255) DEFAULT '',
  `site_desc` varchar(255) DEFAULT '',
  PRIMARY KEY (`cateid`),
  KEY `followid` (`followid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Table structure for sd_code
-- ----------------------------
DROP TABLE IF EXISTS `sd_code`;
CREATE TABLE `sd_code` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `email` varchar(255) DEFAULT '',
  `code` varchar(50) DEFAULT '',
  `types` int(10) DEFAULT '0',
  `createdate` int(10) DEFAULT '0',
  `isover` int(10) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Table structure for sd_config
-- ----------------------------
DROP TABLE IF EXISTS `sd_config`;
CREATE TABLE `sd_config` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `gid` int(10) DEFAULT '0',
  `ckey` varchar(50) DEFAULT '',
  `ctitle` varchar(50) DEFAULT '',
  `cvalue` text,
  `ordnum` int(10) DEFAULT '0',
  `ctype` int(10) DEFAULT '0',
  `dvalue` text,
  `dtext` varchar(255) DEFAULT NULL,
  `rtype` int(10) DEFAULT '0',
  `utype` int(10) DEFAULT '0',
  `islock` int(10) DEFAULT '0',
  `issys` int(10) DEFAULT '0',
  `ishide` smallint(1) DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `ckey` (`ckey`),
  KEY `gid` (`gid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Table structure for sd_config_group
-- ----------------------------
DROP TABLE IF EXISTS `sd_config_group`;
CREATE TABLE `sd_config_group` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `gname` varchar(50) DEFAULT '',
  `ordnum` int(10) DEFAULT '0',
  `gkey` varchar(50) DEFAULT '',
  `islock` int(10) DEFAULT '0',
  `types` int(1) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Table structure for sd_content
-- ----------------------------
DROP TABLE IF EXISTS `sd_content`;
CREATE TABLE `sd_content` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) DEFAULT '',
  `pic` varchar(255) DEFAULT '',
  `ispic` int(10) DEFAULT '0',
  `classid` int(10) DEFAULT '0',
  `hits` int(10) DEFAULT '0',
  `islock` int(10) DEFAULT '0',
  `ontop` int(10) DEFAULT '0',
  `isnice` int(10) DEFAULT '0',
  `ordnum` int(10) DEFAULT '0',
  `upnum` int(10) DEFAULT '0',
  `downnum` int(10) DEFAULT '0',
  `isurl` int(10) DEFAULT '0',
  `url` varchar(255) DEFAULT '',
  `createdate` int(10) DEFAULT '0',
  `lastupdate` int(10) DEFAULT '0',
  `intro` text,
  `tags` varchar(255) DEFAULT '',
  `seotitle` varchar(255) DEFAULT '',
  `seokey` varchar(255) DEFAULT '',
  `seodesc` varchar(255) DEFAULT '',
  `alias` varchar(50) DEFAULT '',
  `showskin` varchar(255) DEFAULT '',
  `extend` text,
  `subid` varchar(255) DEFAULT '',
  `adminid` int(10) DEFAULT '0',
  `isauto` int(10) DEFAULT '0',
  `view_groupid` varchar(50) DEFAULT '',
  `tagslist` varchar(500) DEFAULT '',
  `ispush` int(10) DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `order` (`id`,`ontop`,`ordnum`,`classid`,`islock`),
  KEY `ontop` (`id`,`ontop`),
  KEY `ordnum` (`id`,`ordnum`),
  KEY `where` (`islock`,`classid`,`id`,`subid`),
  KEY `subid` (`subid`),
  KEY `isauto` (`islock`,`isauto`,`createdate`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Table structure for sd_extend
-- ----------------------------
DROP TABLE IF EXISTS `sd_extend`;
CREATE TABLE `sd_extend` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `title` varchar(50) DEFAULT '',
  `ordnum` int(10) DEFAULT '0',
  `islock` int(10) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Table structure for sd_extend_field
-- ----------------------------
DROP TABLE IF EXISTS `sd_extend_field`;
CREATE TABLE `sd_extend_field` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `eid` int(10) DEFAULT '0',
  `field_title` varchar(50) DEFAULT '',
  `field_key` varchar(50) DEFAULT '',
  `field_type` int(10) DEFAULT '0',
  `field_list` text,
  `field_default` varchar(50) DEFAULT '',
  `ordnum` int(10) DEFAULT '0',
  `islock` int(10) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Table structure for sd_form
-- ----------------------------
DROP TABLE IF EXISTS `sd_form`;
CREATE TABLE `sd_form` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `title` varchar(50) DEFAULT '',
  `tablename` varchar(255) DEFAULT '',
  `add_skins` varchar(255) DEFAULT '',
  `list_skins` varchar(255) DEFAULT '',
  `show_skins` varchar(255) DEFAULT '',
  `seotitle` varchar(255) DEFAULT '',
  `seokey` varchar(255) DEFAULT '',
  `seodesc` varchar(255) DEFAULT '',
  `iscode` int(10) DEFAULT '0',
  `backway` int(10) DEFAULT '0',
  `mid` int(10) DEFAULT '0',
  `ordnum` int(10) DEFAULT '0',
  `islock` int(10) DEFAULT '0',
  `isuser` smallint(1) DEFAULT '0',
  `publish_state` smallint(1) DEFAULT '0',
  `publish_limit` int(10) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Table structure for sd_form_field
-- ----------------------------
DROP TABLE IF EXISTS `sd_form_field`;
CREATE TABLE `sd_form_field` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `form_id` int(10) DEFAULT '0',
  `field_title` varchar(50) DEFAULT '',
  `field_key` varchar(50) DEFAULT '',
  `field_type` int(50) DEFAULT '0',
  `field_length` int(10) DEFAULT '0',
  `field_upload_type` int(10) DEFAULT '0',
  `field_default` varchar(255) DEFAULT '',
  `field_list` text,
  `field_sql` varchar(255) DEFAULT '',
  `field_tips` varchar(255) DEFAULT '',
  `field_rule` int(10) DEFAULT '0',
  `field_radio` int(10) DEFAULT '0',
  `field_editor` int(10) DEFAULT '0',
  `field_filter` int(10) DEFAULT '0',
  `field_table` varchar(50) DEFAULT '',
  `field_join` varchar(255) DEFAULT '',
  `field_where` varchar(255) DEFAULT '',
  `field_order` varchar(255) DEFAULT '',
  `field_value` varchar(50) DEFAULT '',
  `field_label` varchar(50) DEFAULT '',
  `islist` int(10) DEFAULT '0',
  `ordnum` int(10) DEFAULT '0',
  `islock` int(10) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Table structure for sd_form_resume
-- ----------------------------
DROP TABLE IF EXISTS `sd_form_resume`;
CREATE TABLE `sd_form_resume` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `postip` varchar(50) DEFAULT '',
  `ordnum` int(10) DEFAULT '0',
  `islock` int(10) DEFAULT '0',
  `createdate` int(10) DEFAULT '0',
  `lastupdate` int(10) DEFAULT '0',
  `my_title` varchar(255) DEFAULT '',
  `my_truename` varchar(20) DEFAULT '',
  `my_sex` int(10) DEFAULT '0',
  `my_age` int(10) DEFAULT '0',
  `my_mobile` varchar(11) DEFAULT '',
  `my_education` int(10) DEFAULT '0',
  `my_work_exp` text,
  `my_intro` text,
  `userid` int(10) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Table structure for sd_inquiry
-- ----------------------------
DROP TABLE IF EXISTS `sd_inquiry`;
CREATE TABLE `sd_inquiry` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) DEFAULT '',
  `truename` varchar(50) DEFAULT '',
  `mobile` varchar(20) DEFAULT '',
  `remark` text,
  `createdate` int(10) DEFAULT '0',
  `isover` int(10) DEFAULT '0',
  `postip` varchar(50) DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Table structure for sd_link
-- ----------------------------
DROP TABLE IF EXISTS `sd_link`;
CREATE TABLE `sd_link` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `webname` varchar(50) DEFAULT '',
  `weblogo` varchar(255) DEFAULT '',
  `weburl` varchar(255) DEFAULT '',
  `islogo` int(10) DEFAULT '0',
  `classid` int(10) DEFAULT '0',
  `ordnum` int(10) DEFAULT '0',
  `islock` int(10) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Table structure for sd_mass
-- ----------------------------
DROP TABLE IF EXISTS `sd_mass`;
CREATE TABLE `sd_mass` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `title` int(10) DEFAULT '0',
  `mass_type` int(10) DEFAULT '0',
  `mass_text` text,
  `mass_id` int(10) DEFAULT '0',
  `isover` int(10) DEFAULT '0',
  `total_num` int(10) DEFAULT '0',
  `success_num` int(10) DEFAULT '0',
  `fail_num` int(10) DEFAULT '0',
  `msg_id` varchar(255) DEFAULT '',
  `post_type` smallint(2) DEFAULT '0',
  `wxname` varchar(255) DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Table structure for sd_mater
-- ----------------------------
DROP TABLE IF EXISTS `sd_mater`;
CREATE TABLE `sd_mater` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `title` varchar(50) DEFAULT '',
  `media_id` varchar(255) DEFAULT '',
  `islock` int(10) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Table structure for sd_mater_data
-- ----------------------------
DROP TABLE IF EXISTS `sd_mater_data`;
CREATE TABLE `sd_mater_data` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `cid` int(10) DEFAULT '0',
  `title` varchar(255) DEFAULT '',
  `pic` varchar(255) DEFAULT '',
  `intro` varchar(255) DEFAULT '',
  `content` text,
  `url` varchar(1000) DEFAULT '',
  `ordnum` int(10) DEFAULT '0',
  `piclist` text,
  `media_id` varchar(255) DEFAULT '',
  `media_date` int(10) DEFAULT '0',
  `islock` int(10) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Table structure for sd_model
-- ----------------------------
DROP TABLE IF EXISTS `sd_model`;
CREATE TABLE `sd_model` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `title` varchar(50) DEFAULT '',
  `tablename` varchar(50) DEFAULT '',
  `model_desc` varchar(255) DEFAULT '',
  `list_skins` varchar(255) DEFAULT '',
  `show_skins` varchar(255) DEFAULT '',
  `form_group` varchar(255) DEFAULT '',
  `ordnum` int(10) DEFAULT '0',
  `islock` int(10) DEFAULT '0',
  `issys` int(10) DEFAULT '0',
  `leverstate` smallint(1) DEFAULT '0',
  `buystate` smallint(1) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Table structure for sd_model_field
-- ----------------------------
DROP TABLE IF EXISTS `sd_model_field`;
CREATE TABLE `sd_model_field` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `model_id` int(10) DEFAULT '0',
  `field_title` varchar(50) DEFAULT '',
  `field_key` varchar(50) DEFAULT '',
  `field_type` int(50) DEFAULT '0',
  `field_length` int(10) DEFAULT '0',
  `field_upload_type` int(10) DEFAULT '0',
  `field_default` varchar(255) DEFAULT '',
  `field_list` text,
  `field_sql` varchar(255) DEFAULT '',
  `field_tips` varchar(255) DEFAULT '',
  `field_rule` int(10) DEFAULT '0',
  `field_radio` int(10) DEFAULT '0',
  `field_editor` int(10) DEFAULT '0',
  `field_group` int(10) DEFAULT '0',
  `field_filter` int(10) DEFAULT '0',
  `field_table` varchar(50) DEFAULT '',
  `field_join` varchar(255) DEFAULT '',
  `field_where` varchar(255) DEFAULT '',
  `field_order` varchar(255) DEFAULT '',
  `field_value` varchar(50) DEFAULT '',
  `field_label` varchar(50) DEFAULT '',
  `ordnum` int(10) DEFAULT '0',
  `islock` int(10) DEFAULT '0',
  `issys` int(10) DEFAULT '0',
  `isbase` int(10) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Table structure for sd_model_job
-- ----------------------------
DROP TABLE IF EXISTS `sd_model_job`;
CREATE TABLE `sd_model_job` (
  `jobid` int(10) NOT NULL AUTO_INCREMENT,
  `cid` int(10) DEFAULT '0',
  `content` mediumtext,
  `work_address` varchar(50) DEFAULT '',
  `work_nature` varchar(50) DEFAULT '',
  `work_education` varchar(50) DEFAULT '',
  `work_money` varchar(50) DEFAULT '',
  `work_age` varchar(50) DEFAULT '',
  `work_num` varchar(50) DEFAULT '',
  PRIMARY KEY (`jobid`),
  UNIQUE KEY `cid` (`cid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Table structure for sd_model_news
-- ----------------------------
DROP TABLE IF EXISTS `sd_model_news`;
CREATE TABLE `sd_model_news` (
  `newsid` int(10) NOT NULL AUTO_INCREMENT,
  `cid` int(10) DEFAULT '0',
  `price` decimal(10,2) DEFAULT '0.00',
  `content` mediumtext,
  PRIMARY KEY (`newsid`),
  UNIQUE KEY `cid` (`cid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Table structure for sd_model_page
-- ----------------------------
DROP TABLE IF EXISTS `sd_model_page`;
CREATE TABLE `sd_model_page` (
  `pageid` int(10) NOT NULL AUTO_INCREMENT,
  `cid` int(10) DEFAULT '0',
  `piclist` text,
  `content` mediumtext,
  PRIMARY KEY (`pageid`),
  UNIQUE KEY `cid` (`cid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Table structure for sd_model_pro
-- ----------------------------
DROP TABLE IF EXISTS `sd_model_pro`;
CREATE TABLE `sd_model_pro` (
  `proid` int(10) NOT NULL AUTO_INCREMENT,
  `cid` int(10) DEFAULT '0',
  `price` decimal(10,2) DEFAULT '0.00',
  `content` mediumtext,
  `piclist` text,
  PRIMARY KEY (`proid`),
  UNIQUE KEY `cid` (`cid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Table structure for sd_onlinepay
-- ----------------------------
DROP TABLE IF EXISTS `sd_onlinepay`;
CREATE TABLE `sd_onlinepay` (
  `aid` int(10) NOT NULL AUTO_INCREMENT,
  `orderid` varchar(50) DEFAULT '',
  `pay_no` varchar(50) DEFAULT '',
  `paytype` smallint(1) DEFAULT '0',
  `ispay` smallint(1) DEFAULT '0',
  `createdate` int(10) DEFAULT '0',
  `payway` varchar(100) DEFAULT '',
  `paymoney` decimal(10,2) DEFAULT '0.00',
  PRIMARY KEY (`aid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Table structure for sd_order
-- ----------------------------
DROP TABLE IF EXISTS `sd_order`;
CREATE TABLE `sd_order` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `orderid` varchar(50) DEFAULT '',
  `pro_name` varchar(255) DEFAULT '',
  `pro_num` int(10) DEFAULT '0',
  `pro_price` decimal(10,2) DEFAULT '0.00',
  `truename` varchar(50) DEFAULT '',
  `mobile` varchar(20) DEFAULT '',
  `address` varchar(255) DEFAULT '',
  `remark` text,
  `createdate` int(10) DEFAULT '0',
  `isover` int(10) DEFAULT '0',
  `ispay` int(10) DEFAULT '0',
  `payway` varchar(50) DEFAULT '',
  `trade_no` varchar(255) DEFAULT '',
  `postip` varchar(50) DEFAULT '',
  `userid` int(10) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Table structure for sd_order_buy
-- ----------------------------
DROP TABLE IF EXISTS `sd_order_buy`;
CREATE TABLE `sd_order_buy` (
  `aid` int(10) NOT NULL AUTO_INCREMENT,
  `orderid` varchar(255) DEFAULT '',
  `userid` int(10) DEFAULT '0',
  `paymoney` decimal(10,2) DEFAULT '0.00',
  `cid` int(10) DEFAULT '0',
  `ispay` int(10) DEFAULT '0',
  `createdate` int(10) DEFAULT '0',
  PRIMARY KEY (`aid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Table structure for sd_sitelink
-- ----------------------------
DROP TABLE IF EXISTS `sd_sitelink`;
CREATE TABLE `sd_sitelink` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `title` varchar(50) DEFAULT '',
  `url` varchar(255) DEFAULT '',
  `num` int(10) DEFAULT '0',
  `ordnum` int(10) DEFAULT '0',
  `islock` int(10) DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `id` (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Table structure for sd_tags
-- ----------------------------
DROP TABLE IF EXISTS `sd_tags`;
CREATE TABLE `sd_tags` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `title` varchar(50) DEFAULT '',
  `hits` int(10) DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `id` (`id`),
  KEY `title` (`title`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Table structure for sd_temp_mail
-- ----------------------------
DROP TABLE IF EXISTS `sd_temp_mail`;
CREATE TABLE `sd_temp_mail` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `title` varchar(50) DEFAULT '',
  `mail_title` varchar(255) DEFAULT '',
  `mail_content` text,
  `islock` int(10) DEFAULT '0',
  `mkey` varchar(50) DEFAULT '',
  PRIMARY KEY (`id`),
  KEY `id` (`id`),
  KEY `mkey` (`mkey`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Table structure for sd_user
-- ----------------------------
DROP TABLE IF EXISTS `sd_user`;
CREATE TABLE `sd_user` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `uname` varchar(50) DEFAULT '',
  `upass` varchar(50) DEFAULT '',
  `umoney` decimal(10,2) DEFAULT '0.00',
  `uemail` varchar(50) DEFAULT '',
  `uface` varchar(255) DEFAULT '',
  `uid` int(10) DEFAULT '0',
  `islock` int(10) DEFAULT '0',
  `regdate` int(10) DEFAULT '0',
  `regip` varchar(50) DEFAULT '',
  `lastlogindate` int(10) DEFAULT '0',
  `lastloginip` varchar(50) DEFAULT '',
  `logintimes` int(10) DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `uname` (`uname`),
  KEY `uid` (`uid`),
  KEY `islock` (`islock`),
  KEY `uemail` (`uemail`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Table structure for sd_user_buy
-- ----------------------------
DROP TABLE IF EXISTS `sd_user_buy`;
CREATE TABLE `sd_user_buy` (
  `aid` int(10) NOT NULL AUTO_INCREMENT,
  `cid` int(10) DEFAULT '0',
  `userid` int(10) DEFAULT '0',
  `createdate` int(10) DEFAULT '0',
  PRIMARY KEY (`aid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Table structure for sd_user_group
-- ----------------------------
DROP TABLE IF EXISTS `sd_user_group`;
CREATE TABLE `sd_user_group` (
  `gid` int(10) NOT NULL AUTO_INCREMENT,
  `gname` varchar(50) DEFAULT '',
  `ordnum` int(10) DEFAULT '0',
  PRIMARY KEY (`gid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Table structure for sd_user_login
-- ----------------------------
DROP TABLE IF EXISTS `sd_user_login`;
CREATE TABLE `sd_user_login` (
  `oid` int(10) NOT NULL AUTO_INCREMENT,
  `userid` int(10) DEFAULT '0',
  `type` varchar(10) DEFAULT '',
  `openid` varchar(255) DEFAULT '',
  `unionid` varchar(255) DEFAULT '',
  `session_key` varchar(255) DEFAULT '',
  `loginkey` varchar(255) DEFAULT '',
  PRIMARY KEY (`oid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Table structure for sd_user_money
-- ----------------------------
DROP TABLE IF EXISTS `sd_user_money`;
CREATE TABLE `sd_user_money` (
  `aid` int(10) NOT NULL AUTO_INCREMENT,
  `types` smallint(1) DEFAULT '0',
  `title` varchar(255) DEFAULT '',
  `userid` int(10) DEFAULT '0',
  `amount` decimal(10,2) DEFAULT '0.00',
  `oldmoney` decimal(10,2) DEFAULT '0.00',
  `newmoney` decimal(10,2) DEFAULT '0.00',
  `createdate` int(10) DEFAULT '0',
  PRIMARY KEY (`aid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Table structure for sd_user_pay
-- ----------------------------
DROP TABLE IF EXISTS `sd_user_pay`;
CREATE TABLE `sd_user_pay` (
  `aid` int(10) NOT NULL AUTO_INCREMENT,
  `orderid` varchar(50) DEFAULT '',
  `userid` int(10) DEFAULT '0',
  `paymoney` decimal(10,2) DEFAULT '0.00',
  `createdate` int(10) DEFAULT '0',
  `ispay` smallint(1) DEFAULT '0',
  `payway` varchar(50) DEFAULT '',
  `paydate` int(10) DEFAULT '0',
  `trade_no` varchar(255) DEFAULT '',
  PRIMARY KEY (`aid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Table structure for sd_wx_menu
-- ----------------------------
DROP TABLE IF EXISTS `sd_wx_menu`;
CREATE TABLE `sd_wx_menu` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `title` varchar(20) DEFAULT '',
  `followid` int(10) DEFAULT '0',
  `sonnum` int(10) DEFAULT '0',
  `reply_type` int(10) DEFAULT '0',
  `reply_text` text,
  `reply_id` int(10) DEFAULT '0',
  `reply_url` text,
  `appid` varchar(255) DEFAULT '',
  `pagepath` varchar(255) DEFAULT '',
  `ordnum` int(10) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records 
-- ----------------------------
INSERT INTO `sd_ad` VALUES ('1', 'Pc站Banner（尺寸：1920*560）', '{\"1\":{\"image\":\"/upfile/a.jpg\",\"desc\":\"\",\"url\":\"\"},\"2\":{\"image\":\"/upfile/b.jpg\",\"desc\":\"\",\"url\":\"\"},\"3\":{\"image\":\"/upfile/c.jpg\",\"desc\":\"\",\"url\":\"\"}}', '1', '1', 'pc');
INSERT INTO `sd_ad` VALUES ('2', '手机站Banner（尺寸：640*300）', '{\"1\":{\"image\":\"/upfile/a1.jpg\",\"desc\":\"\",\"url\":\"\"},\"2\":{\"image\":\"/upfile/b1.jpg\",\"desc\":\"\",\"url\":\"\"},\"3\":{\"image\":\"/upfile/c1.jpg\",\"desc\":\"\",\"url\":\"\"}}', '2', '1', 'mobile');
INSERT INTO `sd_ad` VALUES ('3', '小程序Banner（尺寸：640*300）', '{\"1\":{\"image\":\"/upfile/a1.jpg\",\"desc\":\"\",\"url\":\"\"},\"2\":{\"image\":\"/upfile/b1.jpg\",\"desc\":\"\",\"url\":\"\"},\"3\":{\"image\":\"/upfile/c1.jpg\",\"desc\":\"\",\"url\":\"\"}}', '3', '1', 'open');
INSERT INTO `sd_admin_menu` VALUES ('1', '网站管理', '', '', '', '0', '1', '1');
INSERT INTO `sd_admin_menu` VALUES ('2', '栏目管理', '', '', '', '0', '3', '1');
INSERT INTO `sd_admin_menu` VALUES ('3', '内容管理', '', '', '', '0', '5', '1');
INSERT INTO `sd_admin_menu` VALUES ('4', '扩展管理', '', '', '', '0', '15', '1');
INSERT INTO `sd_admin_menu` VALUES ('6', '模板插件', '', '', '', '0', '17', '1');
INSERT INTO `sd_admin_menu` VALUES ('7', '网站设置', 'config', 'index', '', '1', '1', '1');
INSERT INTO `sd_admin_menu` VALUES ('17', '设置分组', 'configgroup', 'index', '', '71', '5', '1');
INSERT INTO `sd_admin_menu` VALUES ('20', '模型管理', 'model', 'index', '', '2', '5', '1');
INSERT INTO `sd_admin_menu` VALUES ('19', '栏目管理', 'category', 'index', '', '2', '1', '1');
INSERT INTO `sd_admin_menu` VALUES ('21', '内容管理', 'content', 'index', '', '3', '1', '1');
INSERT INTO `sd_admin_menu` VALUES ('24', '回收站', 'content', 'recycle', '', '3', '3', '1');
INSERT INTO `sd_admin_menu` VALUES ('25', '友情链接', 'link', 'index', '', '4', '1', '1');
INSERT INTO `sd_admin_menu` VALUES ('26', '留言管理', 'book', 'index', '', '4', '3', '1');
INSERT INTO `sd_admin_menu` VALUES ('31', '表单管理', 'form', 'index', '', '2', '7', '1');
INSERT INTO `sd_admin_menu` VALUES ('32', '询价管理', 'inquiry', 'index', '', '4', '5', '1');
INSERT INTO `sd_admin_menu` VALUES ('33', '订单管理', 'order', 'index', '', '4', '7', '1');
INSERT INTO `sd_admin_menu` VALUES ('34', '广告管理', 'ad', 'index', '', '4', '9', '1');
INSERT INTO `sd_admin_menu` VALUES ('35', '部门管理', 'part', 'index', '', '1', '7', '1');
INSERT INTO `sd_admin_menu` VALUES ('36', '插件列表', 'plug', 'index', '', '6', '5', '1');
INSERT INTO `sd_admin_menu` VALUES ('37', '后台用户', 'admin', 'index', '', '1', '9', '1');
INSERT INTO `sd_admin_menu` VALUES ('38', '模板管理', 'theme', 'index', '', '6', '1', '1');
INSERT INTO `sd_admin_menu` VALUES ('39', '后台菜单', 'menu', 'index', '', '71', '13', '1');
INSERT INTO `sd_admin_menu` VALUES ('40', '栏目扩展', 'catefield', 'index', '', '2', '3', '1');
INSERT INTO `sd_admin_menu` VALUES ('41', '区块管理', 'block', 'index', '', '3', '5', '1');
INSERT INTO `sd_admin_menu` VALUES ('42', '微信公众号', '', '', '', '0', '9', '1');
INSERT INTO `sd_admin_menu` VALUES ('43', '素材管理', 'wxmater', 'index', '', '42', '1', '1');
INSERT INTO `sd_admin_menu` VALUES ('44', '关注回复', 'wxsubscribe', 'index', '', '42', '3', '1');
INSERT INTO `sd_admin_menu` VALUES ('45', '自动回复', 'wxauto', 'index', '', '42', '5', '1');
INSERT INTO `sd_admin_menu` VALUES ('46', '关键字回复', 'wxkey', 'index', '', '42', '7', '1');
INSERT INTO `sd_admin_menu` VALUES ('47', '菜单管理', 'wxmenu', 'index', '', '42', '9', '1');
INSERT INTO `sd_admin_menu` VALUES ('48', '内容扩展', 'extend', 'index', '', '2', '9', '1');
INSERT INTO `sd_admin_menu` VALUES ('49', '标签管理', 'tags', 'index', '', '4', '11', '1');
INSERT INTO `sd_admin_menu` VALUES ('50', '群发管理', 'wxmass', 'index', '', '42', '11', '1');
INSERT INTO `sd_admin_menu` VALUES ('51', '管理日志', 'log', 'index', '', '71', '15', '1');
INSERT INTO `sd_admin_menu` VALUES ('52', '错误日志', 'logerror', 'index', '', '71', '17', '1');
INSERT INTO `sd_admin_menu` VALUES ('53', '邮件模板', 'mail', 'index', '', '6', '3', '1');
INSERT INTO `sd_admin_menu` VALUES ('54', '缓存管理', 'cache', 'index', '', '71', '21', '1');
INSERT INTO `sd_admin_menu` VALUES ('55', '内链管理', 'sitelink', 'index', '', '4', '13', '1');
INSERT INTO `sd_admin_menu` VALUES ('57', '会员管理', '', '', '', '0', '7', '1');
INSERT INTO `sd_admin_menu` VALUES ('58', '会员管理', 'user', 'index', '', '57', '1', '1');
INSERT INTO `sd_admin_menu` VALUES ('59', '会员组管理', 'usergroup', 'index', '', '57', '3', '1');
INSERT INTO `sd_admin_menu` VALUES ('60', '会员设置', 'userconfig', 'index', '', '57', '5', '1');
INSERT INTO `sd_admin_menu` VALUES ('62', '社区管理', '', '', '', '0', '11', '1');
INSERT INTO `sd_admin_menu` VALUES ('63', '社区设置', 'bbsconfig', 'index', '', '62', '1', '1');
INSERT INTO `sd_admin_menu` VALUES ('64', '社区分类', 'bbscate', 'index', '', '62', '3', '1');
INSERT INTO `sd_admin_menu` VALUES ('65', '主题管理', 'bbs', 'index', '', '62', '5', '1');
INSERT INTO `sd_admin_menu` VALUES ('66', '帖子管理', 'bbstopic', 'index', '', '62', '7', '1');
INSERT INTO `sd_admin_menu` VALUES ('67', '城市分站', '', '', '', '0', '13', '1');
INSERT INTO `sd_admin_menu` VALUES ('68', '分站设置', 'cityconfig', 'index', '', '67', '1', '1');
INSERT INTO `sd_admin_menu` VALUES ('69', '城市管理', 'city', 'index', '', '67', '3', '1');
INSERT INTO `sd_admin_menu` VALUES ('70', '接口设置', 'api', 'index', '', '1', '3', '1');
INSERT INTO `sd_admin_menu` VALUES ('71', '系统管理', 'api', 'index', '', '0', '19', '1');
INSERT INTO `sd_admin_menu` VALUES ('72', '财务管理', 'usermoney', 'index', '', '57', '7', '1');
INSERT INTO `sd_admin_menu` VALUES ('73', '充值记录', 'userpay', 'index', '', '57', '9', '1');
INSERT INTO `sd_admin_menu` VALUES ('74', '购买记录', 'userbuy', 'index', '', '57', '11', '1');
INSERT INTO `sd_admin_menu` VALUES ('75', '支付记录', 'useronline', 'index', '', '57', '13', '1');
INSERT INTO `sd_alias` VALUES ('1', 'book', 'other/book', '0', '0');
INSERT INTO `sd_alias` VALUES ('2', 'sitemap', 'other/sitemap', '0', '0');
INSERT INTO `sd_alias` VALUES ('3', 'search', 'other/search', '0', '0');
INSERT INTO `sd_alias` VALUES ('4', 'tags', 'other/tags', '0', '0');
INSERT INTO `sd_alias` VALUES ('5', 'user', 'user/index', '0', '0');
INSERT INTO `sd_alias` VALUES ('6', 'login', 'user/login', '0', '0');
INSERT INTO `sd_alias` VALUES ('7', 'reg', 'user/reg', '0', '0');
INSERT INTO `sd_alias` VALUES ('8', 'getpass', 'user/getpass', '0', '0');
INSERT INTO `sd_alias` VALUES ('9', 'editpass', 'user/editpass', '0', '0');
INSERT INTO `sd_alias` VALUES ('10', 'editemail', 'user/editemail', '0', '0');
INSERT INTO `sd_alias` VALUES ('11', 'out', 'user/out', '0', '0');
INSERT INTO `sd_alias` VALUES ('12', 'bbs', 'bbs/index', '0', '0');
INSERT INTO `sd_alias` VALUES ('13', 'bbsadd', 'bbs/add', '0', '0');
INSERT INTO `sd_alias` VALUES ('14', 'bbsshow', 'bbs/show', '0', '0');
INSERT INTO `sd_alias` VALUES ('15', 'bbsedit', 'bbs/edit', '0', '0');
INSERT INTO `sd_alias` VALUES ('16', 'myorder', 'user/myorder', '0', '0');
INSERT INTO `sd_alias` VALUES ('17', 'city', 'index/city', '0', '0');
INSERT INTO `sd_alias` VALUES ('18', 'taglist', 'other/taglist', '0', '0');
INSERT INTO `sd_alias` VALUES ('19', 'pay', 'user/pay', '0', '0');
INSERT INTO `sd_alias` VALUES ('20', 'mymoney', 'user/mymoney', '0', '0');
INSERT INTO `sd_auto_reply` VALUES ('1', 'subscribe', '0', '', '0');
INSERT INTO `sd_auto_reply` VALUES ('2', 'auto', '0', '', '0');
INSERT INTO `sd_badword` VALUES ('1', '');
INSERT INTO `sd_category` VALUES ('1', '关于我们', '0', '0', '-1', '', '20', '', '', '', '', '', '1', '0', '0', '', '0', '', 'about');
INSERT INTO `sd_category` VALUES ('2', '新闻中心', '0', '0', '1', '', '20', '', '', '', '', '', '1', '0', '0', '', '0', '', 'news');
INSERT INTO `sd_category` VALUES ('3', '产品展示', '0', '0', '2', '', '16', '', '', '', '', '', '1', '0', '1', '', '0', '', 'product');
INSERT INTO `sd_category` VALUES ('4', '客户案例', '0', '0', '1', '', '20', 'content/news/list_pic.php', '', '', '', '', '1', '0', '0', '', '0', '', 'case');
INSERT INTO `sd_category` VALUES ('5', '人才招聘', '0', '0', '3', '', '20', '', '', '', '', '', '1', '0', '0', '', '0', '', 'job');
INSERT INTO `sd_category` VALUES ('6', '联系我们', '0', '0', '-1', '', '20', '', '', '', '', '', '1', '0', '0', '', '0', '', 'contact');
INSERT INTO `sd_category` VALUES ('7', '公司简介', '1', '0', '-1', '', '20', '', '', '', '', '', '1', '0', '0', '', '0', '', '');
INSERT INTO `sd_category` VALUES ('8', '企业文化', '1', '0', '-1', '', '20', '', '', '', '', '', '1', '0', '0', '', '0', '', '');
INSERT INTO `sd_category` VALUES ('9', '荣誉资质', '1', '0', '-1', '', '20', '', '', '', '', '', '1', '0', '0', '', '0', '', '');
INSERT INTO `sd_category` VALUES ('10', '公司动态', '2', '0', '1', '', '20', '', '', '', '', '', '1', '0', '0', '', '0', '', '');
INSERT INTO `sd_category` VALUES ('11', '行业资讯', '2', '0', '1', '', '20', '', '', '', '', '', '1', '0', '0', '', '0', '', '');
INSERT INTO `sd_category` VALUES ('12', '生活家电', '3', '0', '2', '', '16', '', '', '', '', '', '1', '0', '1', '', '0', '', '');
INSERT INTO `sd_category` VALUES ('13', '智能家电', '3', '0', '2', '', '16', '', '', '', '', '', '1', '0', '0', '', '0', '', '');
INSERT INTO `sd_category` VALUES ('14', '配件产品', '3', '0', '2', '', '16', '', '', '', '', '', '1', '0', '0', '', '0', '', '');
INSERT INTO `sd_category` VALUES ('15', '电水壶', '12', '0', '2', '', '16', '', '', '', '', '', '1', '0', '1', '', '1', '', '');
INSERT INTO `sd_category` VALUES ('16', '挂烫机', '12', '0', '2', '', '16', '', '', '', '', '', '1', '0', '1', '', '2', '', '');
INSERT INTO `sd_category` VALUES ('17', '吸尘器', '12', '0', '2', '', '16', '', '', '', '', '', '1', '0', '1', '', '3', '', '');
INSERT INTO `sd_category` VALUES ('18', '城市规划', '4', '0', '1', '', '20', 'content/news/list_pic.php', '', '', '', '', '1', '0', '0', '', '0', '', '');
INSERT INTO `sd_category` VALUES ('19', '居住建筑', '4', '0', '1', '', '20', 'content/news/list_pic.php', '', '', '', '', '1', '0', '0', '', '0', '', '');
INSERT INTO `sd_category` VALUES ('20', '公共建筑', '4', '0', '1', '', '20', 'content/news/list_pic.php', '', '', '', '', '1', '0', '0', '', '0', '', '');
INSERT INTO `sd_category_field` VALUES ('1', '英文名称', 'myename', '1', '0', '0', '', '', '', '建议一级栏目填写', '0', '0', '0', '0', '1');
INSERT INTO `sd_config` VALUES ('1', '1', 'web_line', '网站设置', '', '1', '9', '', '', '1', '0', '1', '1', '0');
INSERT INTO `sd_config` VALUES ('2', '1', 'web_open', '网站开关', '1', '3', '6', '网站开启|1,网站关闭|0', '', '1', '0', '1', '1', '0');
INSERT INTO `sd_config` VALUES ('3', '1', 'web_close', '关闭原因', '临时维护，预计开放时间：16:00', '5', '5', '', '', '1', '0', '1', '1', '0');
INSERT INTO `sd_config` VALUES ('4', '1', 'web_name', '网站名称', '{$city}SDCMS四合一企业网站管理系统', '7', '1', '', '', '1', '0', '1', '1', '0');
INSERT INTO `sd_config` VALUES ('5', '1', 'web_logo', '网站Logo', '/upfile/logo.gif', '9', '4', '', '', '1', '1', '1', '1', '0');
INSERT INTO `sd_config` VALUES ('6', '1', 'web_icp', 'ICP备案号', '', '13', '1', '', '', '1', '1', '1', '1', '0');
INSERT INTO `sd_config` VALUES ('7', '1', 'seo_line', '优化设置', '', '23', '9', '', '', '1', '0', '1', '1', '0');
INSERT INTO `sd_config` VALUES ('8', '1', 'seo_title', '优化标题', '', '25', '1', '', '', '1', '0', '1', '1', '0');
INSERT INTO `sd_config` VALUES ('9', '1', 'seo_key', '网站关键字', '', '27', '5', '', '', '1', '0', '1', '1', '0');
INSERT INTO `sd_config` VALUES ('10', '1', 'seo_desc', '网站描述', '', '29', '5', '', '', '1', '0', '1', '1', '0');
INSERT INTO `sd_config` VALUES ('11', '2', 'url_mode', 'Url模式', '1', '1', '6', '普通模式（例: /?m=home）|1,PathInfo模式（例: /index.php/news.html）|2,伪静态模式（例: /news.html）|3', '', '2', '0', '1', '1', '0');
INSERT INTO `sd_config` VALUES ('12', '2', 'url_mid', 'Url间隔符', '/', '3', '8', '/|/,-|-,_|_', '', '1', '0', '1', '1', '0');
INSERT INTO `sd_config` VALUES ('13', '2', 'url_ext', '内容Url后缀', '.html', '7', '8', '无后缀|,.html|.html,/|/', '', '1', '0', '1', '1', '0');
INSERT INTO `sd_config` VALUES ('14', '3', 'mail_type', '发送方式', '0', '0', '6', '关闭|0,开启|2', '', '1', '0', '1', '1', '0');
INSERT INTO `sd_config` VALUES ('120', '1', 'web_order_login', '下单设置', '0', '41', '6', '会员才能下单|1,任何人都可下单|0', '', '1', '0', '1', '1', '0');
INSERT INTO `sd_config` VALUES ('15', '3', 'mail_name', '发件人姓名', '', '0', '1', '', '', '1', '0', '1', '1', '0');
INSERT INTO `sd_config` VALUES ('16', '3', 'mail_sign', '邮件签名', '', '0', '5', '', '', '1', '0', '1', '1', '0');
INSERT INTO `sd_config` VALUES ('17', '3', 'mail_spilt', '邮件头分隔符', '1', '0', '8', '使用CRLF作为分隔符(通常为Windows主机)|1,使用LF作为分隔符(通常为Unix/Linux主机)|2,使用CR作为分隔符(通常为Mac主机)|3', '', '2', '0', '1', '1', '0');
INSERT INTO `sd_config` VALUES ('18', '3', 'mail_smtp', 'SMTP服务器', '', '0', '1', '', '', '1', '0', '1', '1', '0');
INSERT INTO `sd_config` VALUES ('19', '3', 'mail_user', '用户名', '', '0', '1', '', '填写邮箱全称，如：test@qq.com', '1', '0', '1', '1', '1');
INSERT INTO `sd_config` VALUES ('20', '3', 'mail_pass', '密码/授权码', '', '0', '1', '', '', '1', '0', '1', '1', '1');
INSERT INTO `sd_config` VALUES ('21', '3', 'mail_auth', '验证', '1', '0', '6', '是|1,否|0', '', '1', '0', '1', '1', '0');
INSERT INTO `sd_config` VALUES ('22', '3', 'mail_port', '端口', '25', '0', '1', '', '', '1', '0', '1', '1', '0');
INSERT INTO `sd_config` VALUES ('23', '4', 'upload_line', '上传设置', '', '0', '9', '', '', '1', '0', '1', '1', '0');
INSERT INTO `sd_config` VALUES ('24', '4', 'upload_image_max', '图像最大上传', '2', '0', '1', '', '单位：M', '1', '0', '1', '1', '0');
INSERT INTO `sd_config` VALUES ('25', '4', 'upload_video_max', '视频最大上传', '10', '0', '1', '', '单位：M', '1', '0', '1', '1', '0');
INSERT INTO `sd_config` VALUES ('26', '4', 'upload_file_max', '附件最大上传', '10', '0', '1', '', '单位：M', '1', '0', '1', '1', '0');
INSERT INTO `sd_config` VALUES ('27', '4', 'upload_file_folder', '储存方式', '2', '0', '6', '按 年 目录，如：2016/14731414801.jpg|1,按 年/月 目录，如：2016/10/14731414801.jpg|2,按 年/月/日 目录，如：2016/10/21/14731414801.jpg|3', '', '2', '0', '1', '1', '0');
INSERT INTO `sd_config` VALUES ('28', '4', 'thumb_line', '压缩设置', '', '0', '9', '', '', '1', '0', '1', '1', '0');
INSERT INTO `sd_config` VALUES ('29', '4', 'thumb_open', '等比压缩', '0', '0', '6', '开启|1,关闭|0', '', '1', '0', '1', '1', '0');
INSERT INTO `sd_config` VALUES ('30', '4', 'thumb_min', '压缩宽度', '600', '0', '1', '', '图片会被压缩成这个宽度', '1', '0', '1', '1', '0');
INSERT INTO `sd_config` VALUES ('31', '4', 'water_line', '水印设置', '', '0', '9', '', '', '1', '0', '1', '1', '0');
INSERT INTO `sd_config` VALUES ('32', '4', 'water_open', '水印开关', '0', '0', '6', '开启|1,关闭|0', '', '1', '0', '1', '1', '0');
INSERT INTO `sd_config` VALUES ('33', '4', 'water_width', '最小宽度', '400', '0', '1', '', '', '1', '0', '1', '1', '0');
INSERT INTO `sd_config` VALUES ('34', '4', 'water_height', '最小高度', '100', '0', '1', '', '', '1', '0', '1', '1', '0');
INSERT INTO `sd_config` VALUES ('35', '4', 'water_opacity', '透明度', '60', '0', '1', '', '', '1', '0', '1', '1', '0');
INSERT INTO `sd_config` VALUES ('36', '4', 'water_position', '水印位置', '0', '0', '8', '随机显示|0,顶部居左|1,顶部居中|2,顶部居右|3,中部居左|4,中部居中|5,中部居右|6,底部居左|7,底部居中|8,底部居右|9', '', '1', '0', '1', '1', '0');
INSERT INTO `sd_config` VALUES ('37', '4', 'water_logo', '水印Logo', '/upfile/mobile.png', '0', '4', '', '', '1', '1', '1', '1', '0');
INSERT INTO `sd_config` VALUES ('38', '5', 'mobile_open', '开关', '1', '1', '6', '开启|1,关闭|0', '', '1', '0', '1', '1', '0');
INSERT INTO `sd_config` VALUES ('39', '5', 'mobile_domain', '绑定域名', '', '5', '1', '', '例：m.baidu.com', '1', '0', '1', '1', '0');
INSERT INTO `sd_config` VALUES ('40', '6', 'weixin_appid', 'AppID(应用ID)', '', '0', '1', '', '', '1', '0', '1', '1', '1');
INSERT INTO `sd_config` VALUES ('41', '6', 'weixin_appsecret', 'AppSecret(应用密钥)', '', '0', '1', '', '', '1', '0', '1', '1', '1');
INSERT INTO `sd_config` VALUES ('42', '6', 'weixin_token', 'Token(令牌)', '', '0', '1', '', '', '1', '0', '1', '1', '0');
INSERT INTO `sd_config` VALUES ('43', '6', 'weixin_id', '公众号的微信号', '', '0', '1', '', '', '1', '0', '1', '1', '0');
INSERT INTO `sd_config` VALUES ('44', '6', 'weixin_qrcode', '公众号二维码', '', '0', '4', '', '', '1', '1', '1', '1', '0');
INSERT INTO `sd_config` VALUES ('45', '7', 'link_logo', 'LOGO链接', '1', '0', '6', '开启|1,关闭|0', '', '1', '0', '1', '1', '0');
INSERT INTO `sd_config` VALUES ('46', '7', 'link_class', '分类开关', '0', '0', '6', '开启|1,关闭|0', '', '1', '0', '1', '1', '0');
INSERT INTO `sd_config` VALUES ('47', '7', 'link_class_data', '链接分类', '首页链接|1\r\n合作伙伴|2', '0', '5', '', '', '1', '0', '1', '1', '0');
INSERT INTO `sd_config` VALUES ('48', '8', 'ct_company', '公司名称', '您的公司名称', '0', '1', '', '', '1', '0', '1', '1', '0');
INSERT INTO `sd_config` VALUES ('49', '8', 'ct_tel', '服务热线', '400-1234-5678', '0', '1', '', '', '1', '0', '1', '1', '0');
INSERT INTO `sd_config` VALUES ('50', '8', 'ct_fax', '传真号码', '', '0', '1', '', '', '1', '0', '1', '1', '0');
INSERT INTO `sd_config` VALUES ('51', '8', 'ct_mobile', '手机号码', '', '0', '1', '', '', '1', '0', '1', '1', '0');
INSERT INTO `sd_config` VALUES ('52', '8', 'ct_email', '电子邮箱', 'youemail@qq.com', '0', '1', '', '', '1', '0', '1', '1', '0');
INSERT INTO `sd_config` VALUES ('53', '8', 'ct_address', '公司地址', '您的公司地址', '0', '1', '', '', '1', '0', '1', '1', '0');
INSERT INTO `sd_config` VALUES ('54', '5', 'mobile_auto', '自动识别', '1', '7', '6', '开启|1,关闭|0', '', '1', '0', '1', '1', '0');
INSERT INTO `sd_config` VALUES ('55', '5', 'mobile_logo', '手机站LOGO', '/upfile/mobile.png', '9', '4', '', '', '1', '1', '1', '1', '0');
INSERT INTO `sd_config` VALUES ('56', '3', 'mail_admin', '管理员邮箱', '', '0', '1', '', '不能和上面的用户名相同', '1', '0', '1', '1', '0');
INSERT INTO `sd_config` VALUES ('57', '2', 'url_line', '路由映射', '', '9', '9', '', '', '1', '0', '1', '1', '0');
INSERT INTO `sd_config` VALUES ('58', '2', 'url_list', '模型列表页', 'list', '11', '1', '', '', '1', '0', '1', '1', '0');
INSERT INTO `sd_config` VALUES ('59', '2', 'url_show', '模型内容页', 'show', '13', '1', '', '', '1', '0', '1', '1', '0');
INSERT INTO `sd_config` VALUES ('60', '9', 'admin_code', '后台登录验证码', '1', '2', '6', '图形验证码|1,谷歌验证码|3,关闭|2', '', '1', '0', '1', '1', '0');
INSERT INTO `sd_config` VALUES ('61', '9', 'admin_logintimes', '登录尝试次数', '10', '4', '1', '', '超过次数后禁止登录', '1', '0', '1', '1', '0');
INSERT INTO `sd_config` VALUES ('62', '9', 'admin_log', '自动清理日志时间', '30', '5', '1', '', '单位为天，超过多少天的自动清理', '1', '0', '1', '1', '0');
INSERT INTO `sd_config` VALUES ('63', '1', 'count_line', '流量统计', '', '31', '9', '', '', '1', '0', '1', '1', '0');
INSERT INTO `sd_config` VALUES ('64', '1', 'count_code', '统计代码', '', '33', '5', '', '', '1', '0', '1', '1', '0');
INSERT INTO `sd_config` VALUES ('65', '1', 'home_line', '其他设置', '', '35', '9', '', '', '1', '0', '1', '1', '0');
INSERT INTO `sd_config` VALUES ('66', '1', 'home_video', '首页视频/图片', 'https://cms.sdcms.cn/upfile/2020/08/1597194275517.mp4', '11', '4', '', '请上传mp4格式视频，大小建议5M以内，如果没有视频可以上传图片', '1', '3', '1', '1', '0');
INSERT INTO `sd_config` VALUES ('67', '10', 'pay_open', '接口状态', '0', '1', '6', '开启|1,关闭|0', '关闭后以下设置无效，在线支付接口均需要企业（含个体工商户）身份才能申请到', '1', '0', '1', '1', '0');
INSERT INTO `sd_config` VALUES ('68', '10', 'pay_alipay_line', '支付宝接口（含电脑网站支付和手机网站支付）', '', '3', '9', '', '', '1', '0', '1', '1', '0');
INSERT INTO `sd_config` VALUES ('69', '10', 'pay_alipay_open', '是否开启', '0', '5', '6', '开启|1,关闭|0', '', '1', '0', '1', '1', '0');
INSERT INTO `sd_config` VALUES ('70', '10', 'pay_alipay_appid', 'AppID', '', '7', '1', '', '', '1', '0', '1', '1', '1');
INSERT INTO `sd_config` VALUES ('73', '10', 'pay_alipay_biz', '接口授权码', '', '11', '5', '', '支付宝支付接口授权码通过官网购买，未授权时接只能支付0.01元', '1', '0', '1', '1', '1');
INSERT INTO `sd_config` VALUES ('74', '10', 'pay_wxpay_line', '微信支付接口（含扫码支付、公众号支付和微信H5支付）', '', '13', '9', '', '', '1', '0', '1', '1', '0');
INSERT INTO `sd_config` VALUES ('75', '10', 'pay_wxpay_open', '是否开启', '0', '15', '6', '开启|1,关闭|0', '', '1', '0', '1', '1', '0');
INSERT INTO `sd_config` VALUES ('76', '10', 'pay_wxpay_appid', '商户号', '', '17', '1', '', '', '1', '0', '1', '1', '1');
INSERT INTO `sd_config` VALUES ('77', '10', 'pay_wxpay_key', '密钥', '', '19', '1', '', '长度为32位，必须包含：大小写字母和数字', '1', '0', '1', '1', '1');
INSERT INTO `sd_config` VALUES ('78', '10', 'pay_wxpay_biz', '接口授权码', '', '21', '5', '', '微信支付接口授权码通过官网购买，未授权时接只能支付0.01元', '1', '0', '1', '1', '1');
INSERT INTO `sd_config` VALUES ('79', '1', 'web_domain', '站点主域名', '', '19', '1', '', '例：www.baidu.com，使用栏目绑定域名时，必须配置主域名', '1', '0', '1', '1', '0');
INSERT INTO `sd_config` VALUES ('80', '1', 'content_subid', '内容副栏目', '0', '37', '6', '开启|1,关闭|0', '', '1', '0', '1', '1', '0');
INSERT INTO `sd_config` VALUES ('81', '11', 'file_way', '存储方式', 'local', '0', '8', '本地存储|local,阿里云Oss|oss,七牛云|qiniu', '', '1', '0', '1', '1', '0');
INSERT INTO `sd_config` VALUES ('82', '11', 'file_oss_line', '阿里云OSS', '', '0', '9', '', '', '1', '0', '1', '1', '0');
INSERT INTO `sd_config` VALUES ('83', '11', 'file_oss_appid', 'Access Key ID', '', '0', '1', '', '', '1', '0', '1', '1', '1');
INSERT INTO `sd_config` VALUES ('84', '11', 'file_oss_appkey', 'Access Key Secret', '', '0', '1', '', '', '1', '0', '1', '1', '1');
INSERT INTO `sd_config` VALUES ('85', '11', 'file_oss_bucket', 'Bucket', '', '0', '1', '', '', '1', '0', '1', '1', '1');
INSERT INTO `sd_config` VALUES ('86', '11', 'file_oss_domain', '用户域名', '', '0', '1', '', '例：http://file.baidu.com', '1', '0', '1', '1', '1');
INSERT INTO `sd_config` VALUES ('87', '11', 'file_oss_url', 'OSS 域名', '', '0', '1', '', '例：http://test.oss-cn-hangzhou.aliyuncs.com', '1', '0', '1', '1', '1');
INSERT INTO `sd_config` VALUES ('88', '11', 'file_qiniu_line', '七牛云存储', '', '0', '9', '', '', '1', '0', '1', '1', '0');
INSERT INTO `sd_config` VALUES ('89', '11', 'file_qiniu_appid', 'AccessKey', '', '0', '1', '', '', '1', '0', '1', '1', '1');
INSERT INTO `sd_config` VALUES ('90', '11', 'file_qiniu_appkey', 'Secret Key', '', '0', '1', '', '', '1', '0', '1', '1', '1');
INSERT INTO `sd_config` VALUES ('91', '11', 'file_qiniu_bucket', 'Bucket', '', '0', '1', '', '', '1', '0', '1', '1', '1');
INSERT INTO `sd_config` VALUES ('92', '11', 'file_qiniu_domain', '用户域名', '', '0', '1', '', '可以使用绑定的域名，也可以使用测试域名，例：http://file.baidu.com', '1', '0', '1', '1', '1');
INSERT INTO `sd_config` VALUES ('93', '11', 'file_qiniu_url', '上传地址', '', '0', '1', '', '例：http://upload.qiniu.com', '1', '0', '1', '1', '1');
INSERT INTO `sd_config` VALUES ('94', '12', 'user_open', '开放注册', '1', '0', '6', '开放注册|1,关闭注册|2', '', '1', '0', '1', '1', '0');
INSERT INTO `sd_config` VALUES ('95', '12', 'user_reg_type', '注册审核', '1', '0', '6', '直接通过|1,邮箱验证|2,管理员审核|3', '', '1', '0', '1', '1', '0');
INSERT INTO `sd_config` VALUES ('96', '12', 'user_badname', '禁止注册的用户名', 'sdcms|admin|ceo|cto|boss|fuck|cao', '0', '5', '', '多个请用“|”间隔', '1', '0', '1', '1', '0');
INSERT INTO `sd_config` VALUES ('97', '12', 'user_reg_group', '加入用户组', '1', '0', '8', '默认用户组|0', '注册后默认加入哪个会员组', '1', '0', '1', '1', '0');
INSERT INTO `sd_config` VALUES ('98', '12', 'user_reg_auth', '注册验证码', '1', '0', '6', '开启|1,关闭|2', '', '1', '0', '1', '1', '0');
INSERT INTO `sd_config` VALUES ('99', '12', 'user_login_auth', '登录验证码', '1', '0', '6', '开启|1,关闭|2', '', '1', '0', '1', '1', '0');
INSERT INTO `sd_config` VALUES ('100', '12', 'user_getpass_auth', '忘记密码验证码', '1', '0', '6', '开启|1,关闭|2', '', '1', '0', '1', '1', '0');
INSERT INTO `sd_config` VALUES ('101', '13', 'api_qq_line', 'QQ登录接口', '', '0', '9', '', '', '1', '0', '1', '1', '0');
INSERT INTO `sd_config` VALUES ('102', '13', 'api_qq_open', '接口状态', '0', '0', '6', '开启|1,关闭|0', '', '1', '0', '1', '1', '0');
INSERT INTO `sd_config` VALUES ('103', '13', 'api_qq_appid', 'AppId', '', '0', '1', '', '', '1', '0', '1', '1', '1');
INSERT INTO `sd_config` VALUES ('104', '13', 'api_qq_key', 'AppKey', '', '0', '1', '', '', '1', '0', '1', '1', '1');
INSERT INTO `sd_config` VALUES ('105', '13', 'api_weibo_line', '微博登录接口', '', '0', '9', '', '', '1', '0', '1', '1', '0');
INSERT INTO `sd_config` VALUES ('106', '13', 'api_weibo_open', '接口状态', '0', '0', '6', '开启|1,关闭|0', '', '1', '0', '1', '1', '0');
INSERT INTO `sd_config` VALUES ('107', '13', 'api_weibo_appid', 'App Key', '', '0', '1', '', '', '1', '0', '1', '1', '1');
INSERT INTO `sd_config` VALUES ('108', '13', 'api_weibo_key', 'App Secret', '', '0', '1', '', '', '1', '0', '1', '1', '1');
INSERT INTO `sd_config` VALUES ('109', '14', 'bbs_open', '社区开关', '0', '0', '6', '开启|1,关闭|0', '', '1', '0', '1', '1', '0');
INSERT INTO `sd_config` VALUES ('110', '14', 'bbs_close', '关闭原因', '社区维护中', '0', '5', '', '', '1', '0', '1', '1', '0');
INSERT INTO `sd_config` VALUES ('111', '14', 'bbs_webname', '社区名称', '社区名称', '0', '1', '', '', '1', '0', '1', '1', '0');
INSERT INTO `sd_config` VALUES ('112', '14', 'bbs_seotitle', '优化标题', '', '0', '1', '', '', '1', '0', '1', '1', '0');
INSERT INTO `sd_config` VALUES ('113', '14', 'bbs_seokey', '关键字', '', '0', '5', '', '', '1', '0', '1', '1', '0');
INSERT INTO `sd_config` VALUES ('114', '14', 'bbs_seodesc', '描述', '', '0', '5', '', '', '1', '0', '1', '1', '0');
INSERT INTO `sd_config` VALUES ('115', '14', 'bbs_newpost', '发帖时间间隔', '5', '0', '1', '', '单位：分钟', '1', '0', '1', '0', '0');
INSERT INTO `sd_config` VALUES ('116', '14', 'bbs_replypost', '回帖时间间隔', '1', '0', '1', '', '单位：分钟', '1', '0', '1', '1', '0');
INSERT INTO `sd_config` VALUES ('117', '14', 'bbs_post_lock', '发帖需要审核', '1', '0', '6', '不需要审核|1,需要审核|0', '', '1', '0', '1', '1', '0');
INSERT INTO `sd_config` VALUES ('118', '6', 'web_share_pic', '微信分享图片', '', '0', '4', '', '微信分享默认图片，建议尺寸：100*100', '1', '1', '1', '1', '0');
INSERT INTO `sd_config` VALUES ('119', '4', 'water_piclist', '组图水印', '0', '0', '6', '开启|1,关闭|0', '', '1', '0', '1', '1', '0');
INSERT INTO `sd_config` VALUES ('121', '13', 'api_weixin_line', '微信扫码登录接口（Pc网站使用，需要申请开发者认证，创建网站应用）', '', '0', '9', '', '', '1', '0', '1', '1', '0');
INSERT INTO `sd_config` VALUES ('122', '13', 'api_weixin_open', '接口状态', '0', '0', '6', '开启|1,关闭|0', '', '1', '0', '1', '1', '0');
INSERT INTO `sd_config` VALUES ('123', '13', 'api_weixin_appid', 'AppID', '', '0', '1', '', '', '1', '0', '1', '1', '1');
INSERT INTO `sd_config` VALUES ('124', '13', 'api_weixin_appkey', 'AppSecret', '', '0', '1', '', '', '1', '0', '1', '1', '1');
INSERT INTO `sd_config` VALUES ('125', '13', 'api_wx_line', ' 微信公众号登录接口（在微信公众号内访问使用，需要公众号通过认证）', '', '0', '9', '', '', '1', '0', '1', '1', '0');
INSERT INTO `sd_config` VALUES ('126', '13', 'api_wx_open', '接口状态', '0', '0', '6', '开启|1,关闭|0', '', '1', '0', '1', '1', '0');
INSERT INTO `sd_config` VALUES ('130', '15', 'city_class', '栏目加城市名', '0', '7', '6', '开启|1,关闭|0', '', '1', '0', '1', '1', '0');
INSERT INTO `sd_config` VALUES ('129', '15', 'city_domain', '分站根域名', '', '5', '1', '', '', '1', '0', '1', '1', '0');
INSERT INTO `sd_config` VALUES ('131', '15', 'city_content', '内容加城市名', '0', '9', '6', '开启|1,关闭|0', '', '1', '0', '1', '1', '0');
INSERT INTO `sd_config` VALUES ('132', '2', 'url_cate_ext', '栏目及别名后缀', '/', '5', '8', '无后缀|,.html|.html,/|/', '', '1', '0', '1', '1', '0');
INSERT INTO `sd_config` VALUES ('133', '4', 'thumb_auto', '自动缩略图', '0', '0', '6', '开启|1,关闭|0', '开启后前台自动生成图片缩略图', '1', '0', '1', '1', '0');
INSERT INTO `sd_config` VALUES ('134', '6', 'weixin_cache', '微信数据缓存', '1', '0', '6', '开启|1,关闭|0', '多个网站同时使用同一个公众号时，请关闭。', '1', '0', '1', '1', '0');
INSERT INTO `sd_config` VALUES ('135', '14', 'bbs_post_code', '发帖验证码', '1', '0', '6', '开启|1,关闭|0', '', '1', '0', '1', '1', '0');
INSERT INTO `sd_config` VALUES ('136', '14', 'bbs_reply_code', '回帖验证码', '0', '0', '6', '开启|1,关闭|0', '', '1', '0', '1', '1', '0');
INSERT INTO `sd_config` VALUES ('137', '16', 'open_line', '公共设置', '', '0', '9', '', '', '1', '0', '1', '1', '0');
INSERT INTO `sd_config` VALUES ('138', '16', 'open_appkey', '通信密钥', '', '0', '1', '', '小程序通信密钥，不可为空', '1', '0', '1', '1', '1');
INSERT INTO `sd_config` VALUES ('139', '16', 'open_debug', '调试开关', '0', '0', '6', '开启|1,关闭|0', '本地调试时，请开启', '1', '0', '1', '1', '0');
INSERT INTO `sd_config` VALUES ('140', '16', 'open_bizcode', '小程序授权码', '', '0', '5', '', '在正式域名下使用小程序，需要经过授权', '1', '0', '1', '1', '1');
INSERT INTO `sd_config` VALUES ('141', '16', 'open_weixin_line', '微信小程序', '', '0', '9', '', '', '1', '0', '1', '1', '0');
INSERT INTO `sd_config` VALUES ('142', '16', 'open_weixin_appid', 'AppID', '', '0', '1', '', '小程序ID', '1', '0', '1', '1', '1');
INSERT INTO `sd_config` VALUES ('143', '16', 'open_weixin_appsecret', 'AppSecret', '', '0', '1', '', '小程序密钥', '1', '0', '1', '1', '1');
INSERT INTO `sd_config` VALUES ('145', '1', 'web_domain_line', '域名相关', '', '15', '9', '', '', '1', '0', '1', '1', '0');
INSERT INTO `sd_config` VALUES ('146', '1', 'web_http', 'Http类型', 'http://', '17', '6', 'Http://|http://,Https://|https://', '', '1', '0', '1', '1', '0');
INSERT INTO `sd_config` VALUES ('147', '1', 'web_domains', '副域名', '', '21', '5', '', '一行一条，格式：www.baidu.com 或 baidu.com，副域名会自动跳转到主域名', '1', '0', '1', '1', '0');
INSERT INTO `sd_config` VALUES ('148', '5', 'mobile_http', 'Http类型', 'http://', '3', '6', 'Http://|http://,Https://|https://', '', '1', '0', '1', '1', '0');
INSERT INTO `sd_config` VALUES ('149', '16', 'open_baidu_line', '百度小程序', '', '0', '9', '', '', '1', '0', '1', '1', '0');
INSERT INTO `sd_config` VALUES ('150', '16', 'open_baidu_appid', 'App ID', '', '0', '1', '', '智能小程序ID', '1', '0', '1', '1', '1');
INSERT INTO `sd_config` VALUES ('151', '16', 'open_baidu_appkey', 'App Key', '', '0', '1', '', '', '1', '0', '1', '1', '1');
INSERT INTO `sd_config` VALUES ('152', '16', 'open_baidu_appsecret', 'App Secret', '', '0', '1', '', '智能小程序密匙', '1', '0', '1', '1', '1');
INSERT INTO `sd_config` VALUES ('166', '15', 'city_class_mid', '栏目连接符', '', '11', '1', '', '分站栏目在城市名称后的连接字符', '1', '0', '1', '1', '0');
INSERT INTO `sd_config` VALUES ('167', '15', 'city_content_mid', '内容连接符', '', '13', '1', '', '分站内容在城市名称后的连接字符', '1', '0', '1', '1', '0');
INSERT INTO `sd_config` VALUES ('159', '10', 'pay_baidu_line', '百度收银台（小程序使用）', '', '23', '9', '', '', '1', '0', '1', '1', '0');
INSERT INTO `sd_config` VALUES ('160', '10', 'pay_baidu_open', '是否开启', '0', '25', '6', '开启|1,关闭|0', '', '1', '0', '1', '1', '0');
INSERT INTO `sd_config` VALUES ('161', '10', 'pay_baidu_dealid', 'dealId', '', '27', '1', '', '', '1', '0', '1', '1', '1');
INSERT INTO `sd_config` VALUES ('162', '10', 'pay_baidu_appkey', 'APP KEY', '', '29', '1', '', '', '1', '0', '1', '1', '1');
INSERT INTO `sd_config` VALUES ('163', '10', 'pay_baidu_public_key', '平台公钥', '', '31', '5', '', '', '1', '0', '1', '1', '1');
INSERT INTO `sd_config` VALUES ('164', '10', 'pay_baidu_private_key', '开发者私钥', '', '33', '5', '', '', '1', '0', '1', '1', '1');
INSERT INTO `sd_config` VALUES ('165', '10', 'pay_baidu_biz', '接口授权码', '', '35', '5', '', '百度收银台接口授权码通过官网购买，未授权时接只能支付0.01元', '1', '0', '1', '1', '1');
INSERT INTO `sd_config` VALUES ('168', '13', 'api_wx_autologin', '免注册绑定', '0', '0', '6', '开启|1,关闭|0', '微信公众号内访问登录免注册', '1', '0', '1', '1', '0');
INSERT INTO `sd_config` VALUES ('169', '1', 'category_http', '栏目Http类型', 'http://', '21', '6', 'Http://|http://,Https://|https://', '当栏目使用域名绑定功能时使用', '1', '0', '1', '1', '0');
INSERT INTO `sd_config` VALUES ('170', '15', 'city_open', '分站开关', '1', '1', '6', '开启|1,关闭|0', '关闭后前台不显示', '1', '0', '1', '1', '0');
INSERT INTO `sd_config` VALUES ('171', '15', 'city_http', '分站Http类型', 'http://', '3', '6', 'Http://|http://,Https://|https://', '当分站绑定域名时使用', '1', '0', '1', '1', '0');
INSERT INTO `sd_config` VALUES ('172', '16', 'open_douyin_line', '抖音小程序', '', '0', '9', '', '', '1', '0', '1', '1', '0');
INSERT INTO `sd_config` VALUES ('173', '16', 'open_douyin_appid', 'AppID', '', '0', '1', '', '小程序AppID', '1', '0', '1', '1', '1');
INSERT INTO `sd_config` VALUES ('174', '16', 'open_douyin_appsecret', 'AppSecret', '', '0', '1', '', '小程序AppSecret', '1', '0', '1', '1', '1');
INSERT INTO `sd_config` VALUES ('175', '10', 'pay_douyin_line', '抖音支付接口（小程序使用，担保接口）', '', '37', '9', '', '', '1', '0', '1', '1', '0');
INSERT INTO `sd_config` VALUES ('176', '10', 'pay_douyin_open', '是否开启', '0', '39', '6', '开启|1,关闭|0', '', '1', '0', '1', '1', '0');
INSERT INTO `sd_config` VALUES ('178', '10', 'pay_douyin_token', 'Token(令牌)', '', '41', '1', '', '', '1', '0', '1', '1', '1');
INSERT INTO `sd_config` VALUES ('179', '10', 'pay_douyin_salt', 'SALT', '', '43', '1', '', '', '1', '0', '1', '1', '1');
INSERT INTO `sd_config` VALUES ('180', '6', 'weixin_share_open', '分享开关', '1', '0', '6', '开启|1,关闭|0', '微信内访问分享开关', '1', '0', '1', '1', '0');
INSERT INTO `sd_config` VALUES ('181', '12', 'user_default_face', '默认头像', '/upfile/noface.gif', '0', '4', '', '会员默认头像', '1', '1', '1', '1', '0');
INSERT INTO `sd_config` VALUES ('182', '9', 'admin_code_google', '谷歌密钥', '', '3', '1', '', '如果使用：谷歌验证码，请点击【生成】按钮生成密钥，然后通过【身份验证器】APP，扫描二维码', '1', '0', '1', '1', '1');
INSERT INTO `sd_config` VALUES ('183', '9', 'admin_logo', '后台Logo', '/public/admin/images/logo.png', '1', '4', '', '建议尺寸：200*40', '1', '1', '1', '1', '1');
INSERT INTO `sd_config` VALUES ('184', '10', 'pay_alipay_public', '支付宝公钥', '', '7', '5', '', '', '1', '0', '1', '1', '1');
INSERT INTO `sd_config` VALUES ('186', '1', 'beian_line', '公安备案号', '', '13', '9', '', '', '1', '0', '1', '1', '0');
INSERT INTO `sd_config` VALUES ('185', '10', 'pay_alipay_private', '商户私钥', '', '7', '5', '', '', '1', '0', '1', '1', '1');
INSERT INTO `sd_config` VALUES ('187', '1', 'beian_num', '备案号', '', '13', '1', '', '', '1', '0', '1', '1', '0');
INSERT INTO `sd_config` VALUES ('188', '1', 'beian_url', '备案链接', '', '13', '1', '', '', '1', '0', '1', '1', '0');
INSERT INTO `sd_config` VALUES ('189', '10', 'pay_free_line', '免签支付接口（需提现，申请网址：https://www.nicemb.com）', '', '21', '9', '', '', '1', '0', '1', '1', '1');
INSERT INTO `sd_config` VALUES ('190', '10', 'pay_free_open', '接口开关', '0', '21', '6', '开启|1,关闭|0', '', '1', '0', '1', '1', '1');
INSERT INTO `sd_config` VALUES ('191', '10', 'pay_free_id', 'AppId', '', '21', '1', '', '', '1', '0', '1', '1', '1');
INSERT INTO `sd_config` VALUES ('192', '10', 'pay_free_key', 'AppKey', '', '21', '1', '', '', '1', '0', '1', '1', '1');
INSERT INTO `sd_config_group` VALUES ('1', '基本设置', '0', '0', '1', '1');
INSERT INTO `sd_config_group` VALUES ('2', '运行模式', '0', '0', '1', '1');
INSERT INTO `sd_config_group` VALUES ('3', '邮件设置', '0', '0', '1', '1');
INSERT INTO `sd_config_group` VALUES ('4', '附件设置', '0', '0', '1', '1');
INSERT INTO `sd_config_group` VALUES ('5', '手机站', '0', '0', '1', '1');
INSERT INTO `sd_config_group` VALUES ('6', '微信设置', '0', '0', '1', '2');
INSERT INTO `sd_config_group` VALUES ('7', '友情链接', '0', 'link', '1', '0');
INSERT INTO `sd_config_group` VALUES ('8', '联系方式', '0', '0', '1', '1');
INSERT INTO `sd_config_group` VALUES ('9', '后台相关', '0', '0', '1', '1');
INSERT INTO `sd_config_group` VALUES ('10', '支付接口', '0', '0', '1', '2');
INSERT INTO `sd_config_group` VALUES ('11', '云存储', '0', '0', '1', '2');
INSERT INTO `sd_config_group` VALUES ('12', '会员设置', '0', 'user', '1', '0');
INSERT INTO `sd_config_group` VALUES ('13', '快捷登录', '0', '0', '1', '2');
INSERT INTO `sd_config_group` VALUES ('14', '社区设置', '0', 'bbs', '1', '0');
INSERT INTO `sd_config_group` VALUES ('15', '城市分站', '0', 'city', '1', '0');
INSERT INTO `sd_config_group` VALUES ('16', '小程序接口', '0', '0', '1', '2');
INSERT INTO `sd_form` VALUES ('1', '简历', 'resume', '', '', '', '', '', '', '1', '2', '0', '0', '1', '0', '0', '1');
INSERT INTO `sd_form_field` VALUES ('1', '1', '申请职位', 'my_title', '1', '0', '0', '{php:get.jobname}', '', 'varchar(255) NOT NULL', '', '1', '1', '0', '0', '', '', '', '', '', '', '1', '0', '1');
INSERT INTO `sd_form_field` VALUES ('2', '1', '姓名', 'my_truename', '1', '20', '0', '', '', 'varchar(20) NOT NULL', '', '1', '1', '0', '0', '', '', '', '', '', '', '1', '0', '1');
INSERT INTO `sd_form_field` VALUES ('3', '1', '性别', 'my_sex', '11', '0', '0', '', '男|1,女|2', 'int(10) NOT NULL', '', '1', '1', '0', '0', '', '', '', '', '', '', '0', '0', '1');
INSERT INTO `sd_form_field` VALUES ('4', '1', '年龄', 'my_age', '3', '2', '0', '', '', 'int(10) NOT NULL', '', '3', '1', '0', '0', '', '', '', '', '', '', '1', '0', '1');
INSERT INTO `sd_form_field` VALUES ('5', '1', '手机', 'my_mobile', '1', '11', '0', '', '', 'varchar(11) NOT NULL', '', '6', '1', '0', '0', '', '', '', '', '', '', '1', '0', '1');
INSERT INTO `sd_form_field` VALUES ('6', '1', '学历', 'my_education', '11', '0', '0', '', '大专|1,本科|2,硕士|3,博士|4', 'int(10) NOT NULL', '', '1', '1', '0', '0', '', '', '', '', '', '', '0', '0', '1');
INSERT INTO `sd_form_field` VALUES ('7', '1', '工作经验', 'my_work_exp', '8', '0', '0', '', '', 'text NOT NULL', '', '1', '1', '0', '0', '', '', '', '', '', '', '0', '0', '1');
INSERT INTO `sd_form_field` VALUES ('8', '1', '自我评价', 'my_intro', '8', '0', '0', '', '', 'text NOT NULL', '', '1', '1', '0', '0', '', '', '', '', '', '', '0', '0', '1');
INSERT INTO `sd_model` VALUES ('1', '文章模型', 'news', '', 'content/news/list.php', 'content/news/show.php', '基本设置|1,SEO设置|2,可选设置|3', '0', '1', '1', '1', '1');
INSERT INTO `sd_model` VALUES ('2', '产品模型', 'pro', '', 'content/pro/list.php', 'content/pro/show.php', '基本设置|1,SEO设置|2,可选设置|3', '0', '1', '1', '0', '0');
INSERT INTO `sd_model` VALUES ('3', '招聘模型', 'job', '', 'content/job/list.php', 'content/job/show.php', '基本设置|1,SEO设置|2,可选设置|3', '0', '1', '1', '0', '0');
INSERT INTO `sd_model_field` VALUES ('1', '1', '标题', 'title', '1', '255', '0', '', '', '', '', '1', '1', '0', '1', '0', '', '', '', '', '', '', '1', '1', '1', '1');
INSERT INTO `sd_model_field` VALUES ('2', '1', '正文', 'content', '12', '0', '0', '', '', '', '', '0', '1', '2', '1', '0', '', '', '', '', '', '', '3', '1', '1', '0');
INSERT INTO `sd_model_field` VALUES ('3', '1', '缩略图', 'pic', '5', '255', '1', '', '', '', '', '0', '1', '0', '1', '0', '', '', '', '', '', '', '5', '1', '1', '1');
INSERT INTO `sd_model_field` VALUES ('4', '1', '标签', 'tags', '1', '255', '0', '', '', '', '多个标签请使用英文逗号隔开，不能超过10个', '0', '1', '0', '1', '0', '', '', '', '', '', '', '7', '1', '1', '1');
INSERT INTO `sd_model_field` VALUES ('5', '1', '摘要', 'intro', '8', '0', '0', '', '', '', '', '0', '1', '0', '1', '0', '', '', '', '', '', '', '9', '1', '1', '1');
INSERT INTO `sd_model_field` VALUES ('6', '1', '状态', 'islock', '9', '0', '0', '1', '立即发布|1,存为草稿|0', '', '', '0', '1', '0', '1', '0', '', '', '', '', '', '', '11', '1', '1', '1');
INSERT INTO `sd_model_field` VALUES ('7', '1', '优化标题', 'seotitle', '1', '255', '0', '', '', '', '', '0', '1', '0', '2', '0', '', '', '', '', '', '', '13', '1', '1', '1');
INSERT INTO `sd_model_field` VALUES ('8', '1', '关键字', 'seokey', '8', '0', '0', '', '', '', '', '0', '1', '0', '2', '0', '', '', '', '', '', '', '15', '1', '1', '1');
INSERT INTO `sd_model_field` VALUES ('9', '1', '描述', 'seodesc', '8', '0', '0', '', '', '', '', '0', '1', '0', '2', '0', '', '', '', '', '', '', '17', '1', '1', '1');
INSERT INTO `sd_model_field` VALUES ('10', '1', '别名', 'alias', '1', '50', '0', '', '', '', '', '0', '1', '0', '2', '0', '', '', '', '', '', '', '19', '1', '1', '1');
INSERT INTO `sd_model_field` VALUES ('11', '1', '外链', 'url', '1', '255', '0', '', '', '', '添加外链时，将不显示正文内容', '0', '1', '0', '3', '0', '', '', '', '', '', '', '21', '1', '1', '1');
INSERT INTO `sd_model_field` VALUES ('12', '1', '人气', 'hits', '3', '10', '0', '0', '', '', '', '0', '1', '0', '3', '0', '', '', '', '', '', '', '23', '1', '1', '1');
INSERT INTO `sd_model_field` VALUES ('13', '1', '赞数量', 'upnum', '3', '10', '0', '0', '', '', '', '0', '1', '0', '3', '0', '', '', '', '', '', '', '25', '1', '1', '1');
INSERT INTO `sd_model_field` VALUES ('14', '1', '踩数量', 'downnum', '3', '10', '0', '0', '', '', '', '0', '1', '0', '3', '0', '', '', '', '', '', '', '27', '1', '1', '1');
INSERT INTO `sd_model_field` VALUES ('15', '1', '排序', 'ordnum', '3', '10', '0', '0', '', '', '数字越大越靠前', '0', '1', '0', '3', '0', '', '', '', '', '', '', '29', '1', '1', '1');
INSERT INTO `sd_model_field` VALUES ('16', '1', '置顶', 'ontop', '9', '0', '0', '0', '否|0,是|1', '', '', '0', '1', '0', '3', '0', '', '', '', '', '', '', '31', '1', '1', '1');
INSERT INTO `sd_model_field` VALUES ('17', '1', '推荐', 'isnice', '9', '0', '0', '0', '否|0,是|1', '', '', '0', '1', '0', '3', '0', '', '', '', '', '', '', '33', '1', '1', '1');
INSERT INTO `sd_model_field` VALUES ('18', '1', '发布日期', 'createdate', '2', '0', '0', '{php:now}', '', '', '', '0', '1', '0', '3', '0', '', '', '', '', '', '', '35', '1', '1', '1');
INSERT INTO `sd_model_field` VALUES ('19', '1', '内容页模板', 'showskin', '1', '255', '0', '', '', '', '', '0', '1', '0', '3', '0', '', '', '', '', '', '', '37', '1', '1', '1');
INSERT INTO `sd_model_field` VALUES ('20', '2', '标题', 'title', '1', '255', '0', '', '', '', '', '1', '1', '0', '1', '0', '', '', '', '', '', '', '1', '1', '1', '1');
INSERT INTO `sd_model_field` VALUES ('21', '2', '组图', 'piclist', '13', '0', '0', '', '', '', '', '0', '1', '0', '1', '0', '', '', '', '', '', '', '3', '1', '1', '0');
INSERT INTO `sd_model_field` VALUES ('22', '2', '正文', 'content', '12', '0', '0', '', '', '', '', '0', '1', '2', '1', '0', '', '', '', '', '', '', '5', '1', '1', '0');
INSERT INTO `sd_model_field` VALUES ('23', '2', '简介', 'intro', '8', '0', '0', '', '', '', '', '0', '1', '0', '1', '0', '', '', '', '', '', '', '7', '1', '1', '1');
INSERT INTO `sd_model_field` VALUES ('24', '2', '缩略图', 'pic', '5', '255', '1', '', '', '', '', '0', '1', '0', '1', '0', '', '', '', '', '', '', '9', '1', '1', '1');
INSERT INTO `sd_model_field` VALUES ('25', '2', '价格', 'price', '4', '10', '1', '0', '', '', '单位：元', '4', '1', '0', '1', '0', '', '', '', '', '', '', '11', '1', '1', '0');
INSERT INTO `sd_model_field` VALUES ('26', '2', '标签', 'tags', '1', '255', '0', '', '', '', '多个标签请使用英文逗号隔开，不能超过10个', '0', '1', '0', '1', '0', '', '', '', '', '', '', '13', '1', '1', '1');
INSERT INTO `sd_model_field` VALUES ('27', '2', '状态', 'islock', '9', '0', '0', '1', '立即发布|1,存为草稿|0', '', '', '0', '1', '0', '1', '0', '', '', '', '', '', '', '15', '1', '1', '1');
INSERT INTO `sd_model_field` VALUES ('28', '2', '优化标题', 'seotitle', '1', '255', '0', '', '', '', '', '0', '1', '0', '2', '0', '', '', '', '', '', '', '17', '1', '1', '1');
INSERT INTO `sd_model_field` VALUES ('29', '2', '关键字', 'seokey', '8', '0', '0', '', '', '', '', '0', '1', '0', '2', '0', '', '', '', '', '', '', '19', '1', '1', '1');
INSERT INTO `sd_model_field` VALUES ('30', '2', '描述', 'seodesc', '8', '0', '0', '', '', '', '', '0', '1', '0', '2', '0', '', '', '', '', '', '', '21', '1', '1', '1');
INSERT INTO `sd_model_field` VALUES ('31', '2', '别名', 'alias', '1', '50', '0', '', '', '', '', '0', '1', '0', '2', '0', '', '', '', '', '', '', '23', '1', '1', '1');
INSERT INTO `sd_model_field` VALUES ('32', '2', '外链', 'url', '1', '255', '0', '', '', '', '添加外链时，将不显示正文内容', '0', '1', '0', '3', '0', '', '', '', '', '', '', '25', '1', '1', '1');
INSERT INTO `sd_model_field` VALUES ('33', '2', '人气', 'hits', '3', '10', '0', '0', '', '', '', '0', '1', '0', '3', '0', '', '', '', '', '', '', '27', '1', '1', '1');
INSERT INTO `sd_model_field` VALUES ('34', '2', '赞数量', 'upnum', '3', '10', '0', '0', '', '', '', '0', '1', '0', '3', '0', '', '', '', '', '', '', '29', '1', '1', '1');
INSERT INTO `sd_model_field` VALUES ('35', '2', '踩数量', 'downnum', '3', '10', '0', '0', '', '', '', '0', '1', '0', '3', '0', '', '', '', '', '', '', '31', '1', '1', '1');
INSERT INTO `sd_model_field` VALUES ('36', '2', '排序', 'ordnum', '3', '10', '0', '0', '', '', '数字越大越靠前', '0', '1', '0', '3', '0', '', '', '', '', '', '', '33', '1', '1', '1');
INSERT INTO `sd_model_field` VALUES ('37', '2', '置顶', 'ontop', '9', '0', '0', '0', '否|0,是|1', '', '', '0', '1', '0', '3', '0', '', '', '', '', '', '', '35', '1', '1', '1');
INSERT INTO `sd_model_field` VALUES ('38', '2', '推荐', 'isnice', '9', '0', '0', '0', '否|0,是|1', '', '', '0', '1', '0', '3', '0', '', '', '', '', '', '', '37', '1', '1', '1');
INSERT INTO `sd_model_field` VALUES ('39', '2', '发布日期', 'createdate', '2', '0', '0', '{php:now}', '', '', '', '0', '1', '0', '3', '0', '', '', '', '', '', '', '39', '1', '1', '1');
INSERT INTO `sd_model_field` VALUES ('40', '2', '内容页模板', 'showskin', '1', '255', '0', '', '', '', '', '0', '1', '0', '3', '0', '', '', '', '', '', '', '41', '1', '1', '1');
INSERT INTO `sd_model_field` VALUES ('43', '3', '职位名称', 'title', '1', '255', '0', '', '', '', '', '1', '1', '0', '1', '0', '', '', '', '', '', '', '1', '1', '1', '1');
INSERT INTO `sd_model_field` VALUES ('44', '3', '工作内容', 'content', '12', '0', '0', '', '', '', '', '0', '1', '1', '1', '0', '', '', '', '', '', '', '15', '1', '1', '0');
INSERT INTO `sd_model_field` VALUES ('45', '3', '缩略图', 'pic', '5', '0', '1', '', '', '', '', '0', '1', '0', '3', '0', '', '', '', '', '', '', '49', '1', '1', '1');
INSERT INTO `sd_model_field` VALUES ('46', '3', '标签', 'tags', '1', '255', '0', '', '', '', '多个标签请使用英文逗号隔开，不能超过10个', '0', '1', '0', '1', '0', '', '', '', '', '', '', '19', '1', '1', '1');
INSERT INTO `sd_model_field` VALUES ('47', '3', '任职要求', 'intro', '12', '0', '0', '', '', '', '', '0', '1', '1', '1', '0', '', '', '', '', '', '', '17', '1', '1', '1');
INSERT INTO `sd_model_field` VALUES ('48', '3', '状态', 'islock', '9', '0', '0', '1', '立即发布|1,存为草稿|0', '', '', '0', '1', '0', '1', '0', '', '', '', '', '', '', '21', '1', '1', '1');
INSERT INTO `sd_model_field` VALUES ('49', '3', '优化标题', 'seotitle', '1', '0', '0', '', '', '', '', '0', '1', '0', '2', '0', '', '', '', '', '', '', '23', '1', '1', '1');
INSERT INTO `sd_model_field` VALUES ('50', '3', '关键字', 'seokey', '8', '0', '0', '', '', '', '', '0', '1', '0', '2', '0', '', '', '', '', '', '', '25', '1', '1', '1');
INSERT INTO `sd_model_field` VALUES ('51', '3', '描述', 'seodesc', '8', '0', '0', '', '', '', '', '0', '1', '0', '2', '0', '', '', '', '', '', '', '27', '1', '1', '1');
INSERT INTO `sd_model_field` VALUES ('52', '3', '别名', 'alias', '1', '50', '0', '', '', '', '', '0', '1', '0', '2', '0', '', '', '', '', '', '', '29', '1', '1', '1');
INSERT INTO `sd_model_field` VALUES ('53', '3', '外链', 'url', '1', '255', '0', '', '', '', '添加外链时，将不显示正文内容', '0', '1', '0', '3', '0', '', '', '', '', '', '', '31', '1', '1', '1');
INSERT INTO `sd_model_field` VALUES ('54', '3', '人气', 'hits', '3', '10', '0', '0', '', '', '', '0', '1', '0', '3', '0', '', '', '', '', '', '', '33', '1', '1', '1');
INSERT INTO `sd_model_field` VALUES ('55', '3', '赞数量', 'upnum', '3', '0', '0', '0', '', '', '', '0', '1', '0', '3', '0', '', '', '', '', '', '', '35', '1', '1', '1');
INSERT INTO `sd_model_field` VALUES ('56', '3', '踩数量', 'downnum', '3', '0', '0', '0', '', '', '', '0', '1', '0', '3', '0', '', '', '', '', '', '', '37', '1', '1', '1');
INSERT INTO `sd_model_field` VALUES ('57', '3', '排序', 'ordnum', '3', '0', '0', '0', '', '', '数字越大越靠前', '0', '1', '0', '3', '0', '', '', '', '', '', '', '39', '1', '1', '1');
INSERT INTO `sd_model_field` VALUES ('58', '3', '置顶', 'ontop', '9', '0', '0', '0', '否|0,是|1', '', '', '0', '1', '0', '3', '0', '', '', '', '', '', '', '41', '1', '1', '1');
INSERT INTO `sd_model_field` VALUES ('59', '3', '推荐', 'isnice', '9', '0', '0', '0', '否|0,是|1', '', '', '0', '1', '0', '3', '0', '', '', '', '', '', '', '43', '1', '1', '1');
INSERT INTO `sd_model_field` VALUES ('60', '3', '发布日期', 'createdate', '2', '0', '0', '{php:now}', '', '', '', '0', '1', '0', '3', '0', '', '', '', '', '', '', '45', '1', '1', '1');
INSERT INTO `sd_model_field` VALUES ('61', '3', '内容页模板', 'showskin', '1', '0', '0', '', '', '', '', '0', '1', '0', '3', '0', '', '', '', '', '', '', '47', '1', '1', '1');
INSERT INTO `sd_model_field` VALUES ('62', '3', '工作地点', 'work_address', '1', '50', '0', '', '', '', '', '1', '1', '0', '1', '0', '', '', '', '', '', '', '3', '1', '1', '0');
INSERT INTO `sd_model_field` VALUES ('64', '3', '学历要求', 'work_education', '11', '0', '0', '不限', '不限|不限,高中及以上|高中及以上,大专及以上|大专及以上,本科及以上|本科及以上,大专及以上|大专及以上', '', '', '1', '1', '0', '1', '0', '', '', '', '', '', '', '7', '1', '1', '0');
INSERT INTO `sd_model_field` VALUES ('63', '3', '工作性质', 'work_nature', '11', '0', '0', '全职', '全职|全职,兼职|兼职', '', '', '1', '1', '0', '1', '0', '', '', '', '', '', '', '5', '1', '1', '0');
INSERT INTO `sd_model_field` VALUES ('65', '3', '薪资待遇', 'work_money', '11', '0', '0', '面议', '面议|面议,2000-3000元/月|2000-3000元/月,3000-5000元/月|3000-5000元/月,5000-8000元/月|5000-8000元/月,8000-10000元/月|8000-10000元/月,10000-20000元/月|10000-20000元/月,20000-50000元/月|20000-50000元/月', '', '', '1', '1', '0', '1', '0', '', '', '', '', '', '', '9', '1', '1', '0');
INSERT INTO `sd_model_field` VALUES ('66', '3', '工作年限', 'work_age', '11', '0', '0', '不限', '不限|不限,1年及以上|1年及以上,2年及以上|2年及以上,3年及以上|3年及以上,4年及以上|4年及以上,5年及以上|5年及以上', '', '', '1', '1', '0', '1', '0', '', '', '', '', '', '', '11', '1', '1', '0');
INSERT INTO `sd_model_field` VALUES ('67', '3', '招聘人数', 'work_num', '11', '0', '0', '若干', '若干|若干,1|1,2|2,3|3,4|4,5|5,6|6,7|7,8|8,9|9,10|10', '', '', '1', '1', '0', '1', '0', '', '', '', '', '', '', '13', '1', '1', '0');
INSERT INTO `sd_model_field` VALUES ('68', '1', '购买价格', 'price', '4', '10', '1', '0', '', '', '单位：元', '4', '1', '0', '1', '0', '', '', '', '', '', '', '10', '1', '1', '0');
INSERT INTO `sd_temp_mail` VALUES ('1', '留言提醒', '有一条新的留言需要处理', '<p>姓　名：$name<br/>手　机：$mobile<br/>电　话：$tel<br/>内　容：$remark</p>', '1', 'book');
INSERT INTO `sd_temp_mail` VALUES ('2', '询价提醒', '有一条新的询价需要处理', '<p>产　品：$proname<br/>姓　名：$name<br/>手　机：$mobile<br/>备　注：$remark</p>', '1', 'inquiry');
INSERT INTO `sd_temp_mail` VALUES ('3', '订单提醒', '有一条新的订单需要处理', '<p>订单号：$orderid<br/>产　品：$proname<br/>数　量：$num<br/>金　额：$money<br/>姓　名：$name<br/>手　机：$mobile<br/>地　址：$address<br/>备　注：$remark</p>', '1', 'order');
INSERT INTO `sd_temp_mail` VALUES ('4', '用户注册', '账号注册邮箱验证', '<p>您正在进行【注册账户】邮箱验证：<br/>您的验证码是：$code<br/>如本邮件非您操作响应，请忽略。</p>', '1', 'reg');
INSERT INTO `sd_temp_mail` VALUES ('5', '找回密码', '账户找回密码邮箱验证', '<p>您正在进行【找回密码】邮箱验证：<br/>您的验证码是：$code<br/>如本邮件非您操作响应，请忽略。</p>', '1', 'getpass');
INSERT INTO `sd_user_group` VALUES ('1', '普通会员', '0');
INSERT INTO `sd_user_group` VALUES ('2', 'Vip会员', '0');