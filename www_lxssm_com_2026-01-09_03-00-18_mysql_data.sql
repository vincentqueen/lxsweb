-- MySQL dump 10.13  Distrib 5.6.50, for Linux (x86_64)
--
-- Host: localhost    Database: www_lxssm_com
-- ------------------------------------------------------
-- Server version	5.6.50-log

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `sd_ad`
--

DROP TABLE IF EXISTS `sd_ad`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `sd_ad` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `title` varchar(50) DEFAULT '',
  `datalist` text,
  `ordnum` int(10) DEFAULT '0',
  `islock` int(10) DEFAULT '0',
  `akey` varchar(10) DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sd_ad`
--

LOCK TABLES `sd_ad` WRITE;
/*!40000 ALTER TABLE `sd_ad` DISABLE KEYS */;
INSERT INTO `sd_ad` VALUES (1,'Pc站Banner（尺寸：1920*560）','{\"1\":{\"image\":\"/upfile/2025/03/1741744682120.jpg\",\"desc\":\"\",\"url\":\"\"},\"2\":{\"image\":\"/upfile/2025/03/1741944272889.jpg\",\"desc\":\"\",\"url\":\"\"}}',1,1,'pc'),(2,'手机站Banner（尺寸：640*300）','{\"1\":{\"image\":\"/upfile/2025/03/1742802214515.jpg\",\"desc\":\"\",\"url\":\"\"},\"2\":{\"image\":\"/upfile/2025/03/1742802231402.jpg\",\"desc\":\"\",\"url\":\"\"}}',2,1,'mobile'),(3,'小程序Banner（尺寸：640*300）','{\"1\":{\"image\":\"/upfile/a1.jpg\",\"desc\":\"\",\"url\":\"\"},\"2\":{\"image\":\"/upfile/b1.jpg\",\"desc\":\"\",\"url\":\"\"},\"3\":{\"image\":\"/upfile/c1.jpg\",\"desc\":\"\",\"url\":\"\"}}',3,1,'open');
/*!40000 ALTER TABLE `sd_ad` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sd_admin`
--

DROP TABLE IF EXISTS `sd_admin`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
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
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sd_admin`
--

LOCK TABLES `sd_admin` WRITE;
/*!40000 ALTER TABLE `sd_admin` DISABLE KEYS */;
INSERT INTO `sd_admin` VALUES (1,'admin','21232f297a57a5a743894a0e4a801fc3','创始人',0,11,1732421044,'127.0.0.1',1,0),(2,'kefu','1d10e0cd4179ac897803ca04d4b6bb6a','客服',0,46,1767150659,'171.212.99.236',1,0);
/*!40000 ALTER TABLE `sd_admin` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sd_admin_log`
--

DROP TABLE IF EXISTS `sd_admin_log`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `sd_admin_log` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `title` varchar(50) DEFAULT '',
  `url` varchar(255) DEFAULT '',
  `msg` varchar(255) DEFAULT '',
  `ip` varchar(50) DEFAULT '',
  `createdate` int(10) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=552 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sd_admin_log`
--

LOCK TABLES `sd_admin_log` WRITE;
/*!40000 ALTER TABLE `sd_admin_log` DISABLE KEYS */;
INSERT INTO `sd_admin_log` VALUES (548,'kefu','/?m=admin&c=content&a=page&classid=46','保存成功','171.212.98.78',1764831983),(549,'kefu','/?m=admin&c=content&a=page&classid=46','保存成功','171.212.98.78',1764832172),(547,'kefu','/?m=admin&c=index&a=check','登录成功','171.212.98.78',1764831845),(546,'kefu','/?m=admin&c=content&a=page&classid=53','保存成功','171.212.98.78',1764733402),(545,'kefu','/?m=admin&c=index&a=check','登录成功','171.212.98.78',1764733322),(543,'kefu','/?m=admin&c=content&a=page&classid=46','保存成功','171.212.97.132',1764658833),(544,'kefu','/?m=admin&c=index&a=check','登录成功','171.212.97.132',1764724214),(541,'kefu','/?m=admin&c=content&a=page&classid=21','保存成功','171.212.97.132',1764657652),(542,'kefu','/?m=admin&c=content&a=page&classid=52','保存成功','171.212.97.132',1764658173),(540,'kefu','/?m=admin&c=index&a=check','登录成功','171.212.97.132',1764657553),(551,'kefu','/?m=admin&c=content&a=edit&classid=28&id=37','保存成功','171.212.99.236',1767150943),(550,'kefu','/?m=admin&c=index&a=check','登录成功','171.212.99.236',1767150659);
/*!40000 ALTER TABLE `sd_admin_log` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sd_admin_login_log`
--

DROP TABLE IF EXISTS `sd_admin_login_log`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `sd_admin_login_log` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `loginname` varchar(50) DEFAULT '',
  `loginip` varchar(50) DEFAULT '',
  `logindate` int(10) DEFAULT '0',
  `loginmsg` varchar(255) DEFAULT '',
  `loginstate` int(1) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=66 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sd_admin_login_log`
--

LOCK TABLES `sd_admin_login_log` WRITE;
/*!40000 ALTER TABLE `sd_admin_login_log` DISABLE KEYS */;
INSERT INTO `sd_admin_login_log` VALUES (64,'kefu','171.212.98.78',1764831845,'登录成功',1),(63,'kefu','171.212.98.78',1764733322,'登录成功',1),(62,'kefu','171.212.97.132',1764724214,'登录成功',1),(61,'kefu','171.212.97.132',1764657553,'登录成功',1),(65,'kefu','171.212.99.236',1767150659,'登录成功',1);
/*!40000 ALTER TABLE `sd_admin_login_log` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sd_admin_menu`
--

DROP TABLE IF EXISTS `sd_admin_menu`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
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
) ENGINE=MyISAM AUTO_INCREMENT=76 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sd_admin_menu`
--

LOCK TABLES `sd_admin_menu` WRITE;
/*!40000 ALTER TABLE `sd_admin_menu` DISABLE KEYS */;
INSERT INTO `sd_admin_menu` VALUES (1,'网站管理','','','',0,1,1),(2,'栏目管理','','','',0,3,1),(3,'内容管理','','','',0,5,1),(4,'扩展管理','','','',0,15,1),(6,'模板插件','','','',0,17,1),(7,'网站设置','config','index','',1,1,1),(17,'设置分组','configgroup','index','',71,5,1),(20,'模型管理','model','index','',2,5,1),(19,'栏目管理','category','index','',2,1,1),(21,'内容管理','content','index','',3,1,1),(24,'回收站','content','recycle','',3,3,1),(25,'友情链接','link','index','',4,1,1),(26,'留言管理','book','index','',4,3,1),(31,'表单管理','form','index','',2,7,1),(32,'询价管理','inquiry','index','',4,5,1),(33,'订单管理','order','index','',4,7,1),(34,'广告管理','ad','index','',4,9,1),(35,'部门管理','part','index','',1,7,1),(36,'插件列表','plug','index','',6,5,1),(37,'后台用户','admin','index','',1,9,1),(38,'模板管理','theme','index','',6,1,1),(39,'后台菜单','menu','index','',71,13,1),(40,'栏目扩展','catefield','index','',2,3,1),(41,'区块管理','block','index','',3,5,1),(42,'微信公众号','','','',0,9,0),(43,'素材管理','wxmater','index','',42,1,1),(44,'关注回复','wxsubscribe','index','',42,3,1),(45,'自动回复','wxauto','index','',42,5,1),(46,'关键字回复','wxkey','index','',42,7,1),(47,'菜单管理','wxmenu','index','',42,9,1),(48,'内容扩展','extend','index','',2,9,1),(49,'标签管理','tags','index','',4,11,1),(50,'群发管理','wxmass','index','',42,11,1),(51,'管理日志','log','index','',71,15,1),(52,'错误日志','logerror','index','',71,17,1),(53,'邮件模板','mail','index','',6,3,1),(54,'缓存管理','cache','index','',71,21,1),(55,'内链管理','sitelink','index','',4,13,1),(57,'会员管理','','','',0,7,0),(58,'会员管理','user','index','',57,1,1),(59,'会员组管理','usergroup','index','',57,3,1),(60,'会员设置','userconfig','index','',57,5,1),(62,'社区管理','','','',0,11,0),(63,'社区设置','bbsconfig','index','',62,1,1),(64,'社区分类','bbscate','index','',62,3,1),(65,'主题管理','bbs','index','',62,5,1),(66,'帖子管理','bbstopic','index','',62,7,1),(67,'城市分站','','','',0,13,1),(68,'分站设置','cityconfig','index','',67,1,1),(69,'城市管理','city','index','',67,3,1),(70,'接口设置','api','index','',1,3,1),(71,'系统管理','api','index','',0,19,1),(72,'财务管理','usermoney','index','',57,7,1),(73,'充值记录','userpay','index','',57,9,1),(74,'购买记录','userbuy','index','',57,11,1),(75,'支付记录','useronline','index','',57,13,1);
/*!40000 ALTER TABLE `sd_admin_menu` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sd_admin_part`
--

DROP TABLE IF EXISTS `sd_admin_part`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
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
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sd_admin_part`
--

LOCK TABLES `sd_admin_part` WRITE;
/*!40000 ALTER TABLE `sd_admin_part` DISABLE KEYS */;
/*!40000 ALTER TABLE `sd_admin_part` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sd_alias`
--

DROP TABLE IF EXISTS `sd_alias`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `sd_alias` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `alias` varchar(50) DEFAULT '',
  `app` varchar(255) DEFAULT '',
  `sid` int(10) DEFAULT '0',
  `types` int(10) DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `alias` (`alias`)
) ENGINE=MyISAM AUTO_INCREMENT=22 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sd_alias`
--

LOCK TABLES `sd_alias` WRITE;
/*!40000 ALTER TABLE `sd_alias` DISABLE KEYS */;
INSERT INTO `sd_alias` VALUES (1,'book','other/book',0,0),(2,'sitemap','other/sitemap',0,0),(3,'search','other/search',0,0),(4,'tags','other/tags',0,0),(5,'user','user/index',0,0),(6,'login','user/login',0,0),(7,'reg','user/reg',0,0),(8,'getpass','user/getpass',0,0),(9,'editpass','user/editpass',0,0),(10,'editemail','user/editemail',0,0),(11,'out','user/out',0,0),(12,'bbs','bbs/index',0,0),(13,'bbsadd','bbs/add',0,0),(14,'bbsshow','bbs/show',0,0),(15,'bbsedit','bbs/edit',0,0),(16,'myorder','user/myorder',0,0),(17,'city','index/city',0,0),(18,'taglist','other/taglist',0,0),(19,'pay','user/pay',0,0),(20,'mymoney','user/mymoney',0,0),(21,'hs','category',46,1);
/*!40000 ALTER TABLE `sd_alias` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sd_attachment`
--

DROP TABLE IF EXISTS `sd_attachment`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
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
) ENGINE=MyISAM AUTO_INCREMENT=169 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sd_attachment`
--

LOCK TABLES `sd_attachment` WRITE;
/*!40000 ALTER TABLE `sd_attachment` DISABLE KEYS */;
INSERT INTO `sd_attachment` VALUES (1,'/upfile/2024/11/1731394586109.png','公司logo.png','.png',15196,1,1731394586,1,1,0,'127.0.0.1',0),(2,'/upfile/2024/11/1731394635129.png','公司logo .png','.png',21336,1,1731394635,1,1,0,'127.0.0.1',0),(3,'/upfile/2024/11/1731394653763.png','SDCMS.png','.png',7924,1,1731394653,1,1,0,'127.0.0.1',0),(4,'/upfile/2024/11/1731574991803.jpg','berneck-04.jpg','.jpg',72010,1,1731574991,1,1,0,'127.0.0.1',0),(5,'/upfile/2024/11/1731577656803.jpg','346x260.jpg','.jpg',17297,1,1731577656,1,1,0,'127.0.0.1',0),(6,'/upfile/2024/11/1731577671236.jpg','346x260.jpg','.jpg',17297,1,1731577671,1,1,0,'127.0.0.1',0),(7,'/upfile/2024/11/1731577676620.jpg','346x260.jpg','.jpg',17297,1,1731577676,1,1,0,'127.0.0.1',0),(8,'/upfile/2024/11/1731577680492.jpg','346x260.jpg','.jpg',17297,1,1731577680,1,1,0,'127.0.0.1',0),(9,'/upfile/2024/11/1731577686413.jpg','346x260.jpg','.jpg',17297,1,1731577686,1,1,0,'127.0.0.1',0),(10,'/upfile/2024/11/1731651490265.jpg','346x260.jpg','.jpg',17297,1,1731651490,1,1,0,'127.0.0.1',0),(11,'/upfile/2024/11/1731651501222.jpg','346x260.jpg','.jpg',17297,1,1731651501,1,1,0,'127.0.0.1',0),(12,'/upfile/2024/11/1731651506443.jpg','346x260.jpg','.jpg',17297,1,1731651506,1,1,0,'127.0.0.1',0),(13,'/upfile/2024/11/1731651513554.jpg','346x260.jpg','.jpg',17297,1,1731651513,1,1,0,'127.0.0.1',0),(14,'/upfile/2024/11/1731651517651.jpg','346x260.jpg','.jpg',17297,1,1731651517,1,1,0,'127.0.0.1',0),(15,'/upfile/2024/11/1731651537456.jpg','346x260.jpg','.jpg',17297,1,1731651538,1,1,0,'127.0.0.1',0),(16,'/upfile/2024/11/1731651542251.jpg','346x260.jpg','.jpg',17297,1,1731651543,1,1,0,'127.0.0.1',0),(17,'/upfile/2024/11/1731651550955.jpg','346x260.jpg','.jpg',17297,1,1731651550,1,1,0,'127.0.0.1',0),(18,'/upfile/2024/11/1731651554223.jpg','346x260.jpg','.jpg',17297,1,1731651554,1,1,0,'127.0.0.1',0),(19,'/upfile/2024/11/1731651559957.jpg','346x260.jpg','.jpg',17297,1,1731651559,1,1,0,'127.0.0.1',0),(20,'/upfile/2024/11/1731652402428.jpg','346x260.jpg','.jpg',17297,1,1731652402,1,1,0,'127.0.0.1',0),(21,'/upfile/2024/11/1731652407809.jpg','346x260.jpg','.jpg',17297,1,1731652407,1,1,0,'127.0.0.1',0),(22,'/upfile/2024/11/1731652411637.jpg','346x260.jpg','.jpg',17297,1,1731652411,1,1,0,'127.0.0.1',0),(23,'/upfile/2024/11/1731652415595.jpg','346x260.jpg','.jpg',17297,1,1731652415,1,1,0,'127.0.0.1',0),(24,'/upfile/2024/11/1731652421893.jpg','346x260.jpg','.jpg',17297,1,1731652421,1,1,0,'127.0.0.1',0),(25,'/upfile/2024/11/1731660294979.jpg','346x260.jpg','.jpg',17297,1,1731660294,1,1,0,'127.0.0.1',0),(26,'/upfile/2024/11/1731660300502.jpg','346x260.jpg','.jpg',17297,1,1731660300,1,1,0,'127.0.0.1',0),(27,'/upfile/2024/11/1731660304804.jpg','346x260.jpg','.jpg',17297,1,1731660304,1,1,0,'127.0.0.1',0),(28,'/upfile/2024/11/1731660309635.jpg','346x260.jpg','.jpg',17297,1,1731660309,1,1,0,'127.0.0.1',0),(29,'/upfile/2024/11/1731660315238.jpg','346x260.jpg','.jpg',17297,1,1731660315,1,1,0,'127.0.0.1',0),(30,'/upfile/2024/11/1732585627728.jpg','640x300.jpg','.jpg',15263,1,1732585627,1,2,0,'171.212.99.246',0),(31,'/upfile/2024/11/1732585644688.jpg','1920x750.jpg','.jpg',51920,1,1732585644,1,2,0,'171.212.99.246',0),(32,'/upfile/2025/03/1741744527332.png','iberneck-01.png','.png',1379537,1,1741744530,1,2,0,'171.212.180.218',0),(33,'/upfile/2025/03/1741744682120.jpg','banner1_副本.jpg','.jpg',335255,1,1741744682,1,2,0,'171.212.180.218',0),(34,'/upfile/2025/03/1741746779564.jpg','banner1_副本1.jpg','.jpg',316978,1,1741746779,1,2,0,'171.212.180.218',0),(35,'/upfile/2025/03/1741770109981.png','logo1.png','.png',2414,1,1741770109,1,2,0,'171.212.180.218',0),(36,'/upfile/2025/03/1741770670719.png','logo1.png','.png',9401,1,1741770670,1,2,0,'171.212.180.218',0),(37,'/upfile/2025/03/1741772747832.png','检测.png','.png',110699,1,1741772747,1,2,0,'171.212.180.218',0),(38,'/upfile/2025/03/1741773993757.jpg','49269c25-f7e8-409b-bdbf-7c58f7562ed4_副本.jpg','.jpg',92013,1,1741773993,1,2,0,'171.212.180.218',0),(39,'/upfile/2025/03/1741774010339.jpg','5bed64bc-4929-4719-a622-660b620a524e_副本.jpg','.jpg',43888,1,1741774010,1,2,0,'171.212.180.218',0),(40,'/upfile/2025/03/1741774023377.jpg','d946ecac-51bb-4985-97c5-ec99fbb5d159_副本.jpg','.jpg',102891,1,1741774023,1,2,0,'171.212.180.218',0),(41,'/upfile/2025/03/1741774036532.jpg','0d1291fa-a731-4441-8dda-cb494a363eeb_副本.jpg','.jpg',147785,1,1741774037,1,2,0,'171.212.180.218',0),(42,'/upfile/2025/03/1741774277707.jpg','49269c25-f7e8-409b-bdbf-7c58f7562ed4_副本.jpg','.jpg',227996,1,1741774278,1,2,0,'171.212.180.218',0),(43,'/upfile/2025/03/1741774294555.jpg','5bed64bc-4929-4719-a622-660b620a524e_副本.jpg','.jpg',126653,1,1741774294,1,2,0,'171.212.180.218',0),(44,'/upfile/2025/03/1741774310556.jpg','d946ecac-51bb-4985-97c5-ec99fbb5d159_副本.jpg','.jpg',250833,1,1741774310,1,2,0,'171.212.180.218',0),(45,'/upfile/2025/03/1741774323307.jpg','0d1291fa-a731-4441-8dda-cb494a363eeb_副本.jpg','.jpg',410000,1,1741774323,1,2,0,'171.212.180.218',0),(46,'/upfile/2025/03/1741775429525.png','精板.png','.png',96298,1,1741775429,1,2,0,'171.212.180.218',0),(47,'/upfile/2025/03/1741776044323.png','j1.png','.png',594353,1,1741776045,1,2,0,'171.212.180.218',0),(48,'/upfile/2025/03/1741776072949.png','j2.png','.png',382686,1,1741776073,1,2,0,'171.212.180.218',0),(49,'/upfile/2025/03/1741776085989.png','j3.png','.png',456516,1,1741776086,1,2,0,'171.212.180.218',0),(50,'/upfile/2025/03/1741776098110.png','j4.png','.png',593546,1,1741776099,1,2,0,'171.212.180.218',0),(51,'/upfile/2025/03/1741851505169.jpg','1.jpg','.jpg',167260,1,1741851506,1,2,0,'171.212.180.218',0),(52,'/upfile/2025/03/1741851515176.jpg','1-1.jpg','.jpg',475473,1,1741851516,1,2,0,'171.212.180.218',0),(53,'/upfile/2025/03/1741851569444.png','2.png','.png',271244,1,1741851569,1,2,0,'171.212.180.218',0),(54,'/upfile/2025/03/1741851575349.jpg','2-1.jpg','.jpg',225182,1,1741851576,1,2,0,'171.212.180.218',0),(55,'/upfile/2025/03/1741851610420.jpg','3.jpg','.jpg',49188,1,1741851610,1,2,0,'171.212.180.218',0),(56,'/upfile/2025/03/1741851619833.jpg','3-1.jpg','.jpg',179514,1,1741851620,1,2,0,'171.212.180.218',0),(57,'/upfile/2025/03/1741859700184.png','素板.png','.png',89620,1,1741859701,1,2,0,'171.212.180.218',0),(58,'/upfile/2025/03/1741859786682.png','j1.png','.png',594353,1,1741859787,1,2,0,'171.212.180.218',0),(59,'/upfile/2025/03/1741859897144.png','j2.png','.png',382686,1,1741859897,1,2,0,'171.212.180.218',0),(60,'/upfile/2025/03/1741859966119.png','j3.png','.png',456516,1,1741859967,1,2,0,'171.212.180.218',0),(61,'/upfile/2025/03/1741860010687.png','j4.png','.png',593546,1,1741860011,1,2,0,'171.212.180.218',0),(62,'/upfile/2025/03/1741941248392.jpg','n1_副本.jpg','.jpg',141121,1,1741941249,1,2,0,'182.149.163.74',0),(63,'/upfile/2025/03/1741942930563.jpg','营业执照.jpg','.jpg',88042,1,1741942930,1,2,0,'182.149.163.74',0),(64,'/upfile/2025/03/1741942940332.png','卢卡尔曼- 饰面胶合板_00.png','.png',912864,1,1741942942,1,2,0,'182.149.163.74',0),(65,'/upfile/2025/03/1741942946448.jpg','检测1.jpg','.jpg',58723,1,1741942946,1,2,0,'182.149.163.74',0),(66,'/upfile/2025/03/1741942952145.jpg','检测2.jpg','.jpg',58780,1,1741942952,1,2,0,'182.149.163.74',0),(67,'/upfile/2025/03/1741942958524.jpg','检测3.jpg','.jpg',45804,1,1741942958,1,2,0,'182.149.163.74',0),(68,'/upfile/2025/03/1741943675513.png','卢卡尔曼.png','.png',55021,1,1741943675,1,2,0,'182.149.163.74',0),(69,'/upfile/2025/03/1741943772190.jpg','n3_副本.jpg','.jpg',154451,1,1741943773,1,2,0,'182.149.163.74',0),(70,'/upfile/2025/03/1741944169301.png','iberneck-01.png','.png',1715262,1,1741944173,1,2,0,'182.149.163.74',0),(71,'/upfile/2025/03/1741944272889.jpg','n2_副本.jpg','.jpg',170206,1,1741944272,1,2,0,'182.149.163.74',0),(72,'/upfile/2025/03/1742204657238.png','logo_副本.png','.png',13032,1,1742204657,1,2,0,'222.209.10.249',0),(73,'/upfile/2025/03/1742268657431.jpg','场景图合集_08_副本.jpg','.jpg',412351,1,1742268658,1,2,0,'222.209.10.249',0),(74,'/upfile/2025/03/1742268726184.jpg','鲁丽木业宣传册-3(3)_00_副本.jpg','.jpg',368054,1,1742268726,1,2,0,'222.209.10.249',0),(75,'/upfile/2025/03/1742277822875.jpg','检测6.jpg','.jpg',95895,1,1742277822,1,2,0,'222.209.10.249',0),(76,'/upfile/2025/03/1742277823721.jpg','检测5.jpg','.jpg',100715,1,1742277823,1,2,0,'222.209.10.249',0),(77,'/upfile/2025/03/1742277823625.jpg','检测4.jpg','.jpg',101440,1,1742277823,1,2,0,'222.209.10.249',0),(78,'/upfile/2025/03/1742362848934.jpg','未标题-1.jpg','.jpg',285502,1,1742362848,1,2,0,'222.209.10.249',0),(79,'/upfile/2025/03/1742802214515.jpg','banner1_副本2.jpg','.jpg',44595,1,1742802214,1,2,0,'125.69.47.121',0),(80,'/upfile/2025/03/1742802231402.jpg','n2_副本1.jpg','.jpg',35835,1,1742802231,1,2,0,'125.69.47.121',0),(81,'/upfile/2025/03/1742889987592.png','微信截图_20250325160348_副本.png','.png',75321,1,1742889987,1,2,0,'125.69.47.121',0),(82,'/upfile/2025/05/1747103037654.jpg','30-S-1001(1).jpg','.jpg',2344,1,1747103037,1,2,0,'171.212.99.96',0),(83,'/upfile/2025/05/1747103076506.jpg','1-S-1011 (1)(1).jpg','.jpg',58119,1,1747103076,1,2,0,'171.212.99.96',0),(84,'/upfile/2025/05/1747103103441.jpg','2-锦丝缎杨 (2)(1).jpg','.jpg',283963,1,1747103104,1,2,0,'171.212.99.96',0),(85,'/upfile/2025/05/1747103182192.jpg','1-S-1011 (1)(1).jpg','.jpg',58119,1,1747103183,1,2,0,'171.212.99.96',0),(86,'/upfile/2025/05/1747103215438.jpg','2-S-1008 (2)(1).jpg','.jpg',64037,1,1747103215,1,2,0,'171.212.99.96',0),(87,'/upfile/2025/05/1747103237637.jpg','1-木理绘影 (1)(1).jpg','.jpg',54749,1,1747103237,1,2,0,'171.212.99.96',0),(88,'/upfile/2025/05/1747104903951.png','经典系列.png','.png',30303,1,1747104903,1,2,0,'171.212.99.96',0),(89,'/upfile/2025/05/1747104929349.png','实木系列.png','.png',19370,1,1747104930,1,2,0,'171.212.99.96',0),(90,'/upfile/2025/05/1747289086262.png','经典.png','.png',68069,1,1747289087,1,2,0,'171.212.99.96',0),(91,'/upfile/2025/09/1756715279603.jpg','抗菌_副本.jpg','.jpg',117980,1,1756715279,1,2,0,'171.222.188.192',0),(92,'/upfile/2025/09/1756715445346.jpg','抗菌_副本.jpg','.jpg',66849,1,1756715445,1,2,0,'171.222.188.192',0),(93,'/upfile/2025/09/1756715451728.png','环保_副本.png','.png',91932,1,1756715452,1,2,0,'171.222.188.192',0),(94,'/upfile/2025/09/1756716283366.jpg','banner-mgs.jpg','.jpg',684125,1,1756716284,1,2,0,'171.222.188.192',0),(95,'/upfile/2025/09/1756716716732.jpg','身份.jpg','.jpg',167911,1,1756716716,1,2,0,'171.222.188.192',0),(96,'/upfile/2025/09/1756716731746.jpg','环保.jpg','.jpg',169146,1,1756716731,1,2,0,'171.222.188.192',0),(97,'/upfile/2025/09/1756716743573.jpg','中药.jpg','.jpg',209279,1,1756716743,1,2,0,'171.222.188.192',0),(98,'/upfile/2025/09/1756716755897.jpg','花色.jpg','.jpg',155014,1,1756716756,1,2,0,'171.222.188.192',0),(99,'/upfile/2025/09/1756716966144.jpg','mgs.jpg','.jpg',304734,1,1756716967,1,2,0,'171.222.188.192',0),(100,'/upfile/2025/09/1756717775459.jpg','mgs.jpg','.jpg',670751,1,1756717777,1,2,0,'171.222.188.192',0),(101,'/upfile/2025/09/1757993643754.jpg','sq5.jpg','.jpg',23497,1,1757993643,1,2,0,'171.222.190.183',0),(102,'/upfile/2025/11/1764312536808.jpg','346x260.jpg','.jpg',17297,1,1764312536,1,2,0,'171.212.97.132',0),(103,'/upfile/2025/11/1764312549313.jpg','346x260.jpg','.jpg',17297,1,1764312549,1,2,0,'171.212.97.132',0),(104,'/upfile/2025/11/1764312555660.jpg','346x260.jpg','.jpg',17297,1,1764312555,1,2,0,'171.212.97.132',0),(105,'/upfile/2025/11/1764312564375.jpg','346x260.jpg','.jpg',17297,1,1764312564,1,2,0,'171.212.97.132',0),(106,'/upfile/2025/11/1764312570701.jpg','346x260.jpg','.jpg',17297,1,1764312570,1,2,0,'171.212.97.132',0),(107,'/upfile/2025/11/1764312575968.jpg','346x260.jpg','.jpg',17297,1,1764312575,1,2,0,'171.212.97.132',0),(108,'/upfile/2025/11/1764312581132.jpg','346x260.jpg','.jpg',17297,1,1764312581,1,2,0,'171.212.97.132',0),(109,'/upfile/2025/11/1764312587585.jpg','346x260.jpg','.jpg',17297,1,1764312587,1,2,0,'171.212.97.132',0),(110,'/upfile/2025/11/1764314067406.jpg','346x260.jpg','.jpg',17297,1,1764314067,1,2,0,'171.212.97.132',0),(111,'/upfile/2025/11/1764314073284.jpg','346x260.jpg','.jpg',17297,1,1764314073,1,2,0,'171.212.97.132',0),(112,'/upfile/2025/11/1764314080595.jpg','346x260.jpg','.jpg',17297,1,1764314080,1,2,0,'171.212.97.132',0),(113,'/upfile/2025/11/1764314086376.jpg','346x260.jpg','.jpg',17297,1,1764314086,1,2,0,'171.212.97.132',0),(114,'/upfile/2025/11/1764314097392.jpg','346x260.jpg','.jpg',17297,1,1764314097,1,2,0,'171.212.97.132',0),(115,'/upfile/2025/11/1764314102759.jpg','346x260.jpg','.jpg',17297,1,1764314102,1,2,0,'171.212.97.132',0),(116,'/upfile/2025/11/1764314108787.jpg','346x260.jpg','.jpg',17297,1,1764314108,1,2,0,'171.212.97.132',0),(117,'/upfile/2025/11/1764314114339.jpg','346x260.jpg','.jpg',17297,1,1764314114,1,2,0,'171.212.97.132',0),(118,'/upfile/2025/11/1764314590177.jpg','346x260.jpg','.jpg',17297,1,1764314590,1,2,0,'171.212.97.132',0),(119,'/upfile/2025/11/1764314597734.jpg','346x260.jpg','.jpg',17297,1,1764314597,1,2,0,'171.212.97.132',0),(120,'/upfile/2025/11/1764314603161.jpg','346x260.jpg','.jpg',17297,1,1764314603,1,2,0,'171.212.97.132',0),(121,'/upfile/2025/11/1764314607657.jpg','346x260.jpg','.jpg',17297,1,1764314607,1,2,0,'171.212.97.132',0),(122,'/upfile/2025/11/1764314612729.jpg','346x260.jpg','.jpg',17297,1,1764314612,1,2,0,'171.212.97.132',0),(123,'/upfile/2025/11/1764314616986.jpg','346x260.jpg','.jpg',17297,1,1764314616,1,2,0,'171.212.97.132',0),(124,'/upfile/2025/12/1764657616592.jpg','AAA级信用企业.jpg','.jpg',122448,1,1764657616,1,2,0,'171.212.97.132',0),(125,'/upfile/2025/12/1764657625274.jpg','诚信供应商.jpg','.jpg',81846,1,1764657625,1,2,0,'171.212.97.132',0),(126,'/upfile/2025/12/1764657631517.jpg','诚信经营示范企业.jpg','.jpg',82653,1,1764657632,1,2,0,'171.212.97.132',0),(127,'/upfile/2025/12/1764657642850.jpg','诚信无投诉单位.jpg','.jpg',82528,1,1764657642,1,2,0,'171.212.97.132',0),(128,'/upfile/2025/12/1764657649676.jpg','招投标信用等级证书.jpg','.jpg',82873,1,1764657649,1,2,0,'171.212.97.132',0),(129,'/upfile/2025/12/1764658102609.jpg','21-B-015.jpg','.jpg',15066,1,1764658102,1,2,0,'171.212.97.132',0),(130,'/upfile/2025/12/1764658114455.jpg','22-S-1005.jpg','.jpg',15119,1,1764658114,1,2,0,'171.212.97.132',0),(131,'/upfile/2025/12/1764658114242.jpg','24-S-1006.jpg','.jpg',15214,1,1764658114,1,2,0,'171.212.97.132',0),(132,'/upfile/2025/12/1764658114447.jpg','28-B-017.jpg','.jpg',15441,1,1764658114,1,2,0,'171.212.97.132',0),(133,'/upfile/2025/12/1764658114939.jpg','29-B-013.jpg','.jpg',15441,1,1764658114,1,2,0,'171.212.97.132',0),(134,'/upfile/2025/12/1764658114458.jpg','25-S-1002.jpg','.jpg',15286,1,1764658114,1,2,0,'171.212.97.132',0),(135,'/upfile/2025/12/1764658114244.jpg','26-S-1003.jpg','.jpg',15389,1,1764658115,1,2,0,'171.212.97.132',0),(136,'/upfile/2025/12/1764658115561.jpg','23-B-006.jpg','.jpg',15184,1,1764658115,1,2,0,'171.212.97.132',0),(137,'/upfile/2025/12/1764658783453.jpg','V8015-珍珠白.jpg','.jpg',14946,1,1764658783,1,2,0,'171.212.97.132',0),(138,'/upfile/2025/12/1764658783556.jpg','V8016-温暖白.jpg','.jpg',14995,1,1764658783,1,2,0,'171.212.97.132',0),(139,'/upfile/2025/12/1764658783386.jpg','V8017-风雅灰.jpg','.jpg',15018,1,1764658783,1,2,0,'171.212.97.132',0),(140,'/upfile/2025/12/1764658783982.jpg','V8020-玛瑙灰.jpg','.jpg',14928,1,1764658783,1,2,0,'171.212.97.132',0),(141,'/upfile/2025/12/1764658783977.jpg','V8021-烟雨灰.jpg','.jpg',14997,1,1764658783,1,2,0,'171.212.97.132',0),(142,'/upfile/2025/12/1764658783133.jpg','V8019-浅墨灰.jpg','.jpg',14952,1,1764658783,1,2,0,'171.212.97.132',0),(143,'/upfile/2025/12/1764658784669.jpg','V8018-奶油白.jpg','.jpg',15007,1,1764658784,1,2,0,'171.212.97.132',0),(144,'/upfile/2025/12/1764658784943.jpg','V8022-明月灰.jpg','.jpg',14959,1,1764658784,1,2,0,'171.212.97.132',0),(145,'/upfile/2025/12/1764733355906.jpg','4.jpg','.jpg',60089,1,1764733355,1,2,0,'171.212.98.78',0),(146,'/upfile/2025/12/1764733355303.jpg','2.jpg','.jpg',66512,1,1764733355,1,2,0,'171.212.98.78',0),(147,'/upfile/2025/12/1764733355960.jpg','3.jpg','.jpg',67364,1,1764733355,1,2,0,'171.212.98.78',0),(148,'/upfile/2025/12/1764733355470.jpg','1.jpg','.jpg',82491,1,1764733356,1,2,0,'171.212.98.78',0),(149,'/upfile/2025/12/1764733356595.jpg','7.jpg','.jpg',61875,1,1764733356,1,2,0,'171.212.98.78',0),(150,'/upfile/2025/12/1764733356796.jpg','6.jpg','.jpg',67384,1,1764733356,1,2,0,'171.212.98.78',0),(151,'/upfile/2025/12/1764733356984.jpg','5.jpg','.jpg',66692,1,1764733356,1,2,0,'171.212.98.78',0),(152,'/upfile/2025/12/1764733356342.jpg','8.jpg','.jpg',54376,1,1764733356,1,2,0,'171.212.98.78',0),(153,'/upfile/2025/12/1764733357570.jpg','9.jpg','.jpg',66372,1,1764733357,1,2,0,'171.212.98.78',0),(154,'/upfile/2025/12/1764733357862.jpg','10.jpg','.jpg',61677,1,1764733357,1,2,0,'171.212.98.78',0),(155,'/upfile/2025/12/1764831874354.jpg','V8003-半衫刀木.jpg','.jpg',70365,1,1764831874,1,2,0,'171.212.98.78',0),(156,'/upfile/2025/12/1764831874215.jpg','V8001-美川胡桃.jpg','.jpg',84264,1,1764831875,1,2,0,'171.212.98.78',0),(157,'/upfile/2025/12/1764831875538.jpg','V8005-欧莱雅胡桃.jpg','.jpg',64990,1,1764831875,1,2,0,'171.212.98.78',0),(158,'/upfile/2025/12/1764831875443.jpg','V8002-欧帝胡桃.jpg','.jpg',80451,1,1764831875,1,2,0,'171.212.98.78',0),(159,'/upfile/2025/12/1764831875899.jpg','V8004-北美胡桃.jpg','.jpg',72207,1,1764831875,1,2,0,'171.212.98.78',0),(160,'/upfile/2025/12/1764831875772.jpg','V8010-幻影木.jpg','.jpg',76241,1,1764831875,1,2,0,'171.212.98.78',0),(161,'/upfile/2025/12/1764831876869.jpg','V8007-半衫铁木.jpg','.jpg',62251,1,1764831876,1,2,0,'171.212.98.78',0),(162,'/upfile/2025/12/1764831876157.jpg','V8006-铭熙榆木.jpg','.jpg',83659,1,1764831876,1,2,0,'171.212.98.78',0),(163,'/upfile/2025/12/1764831876818.jpg','V8008-烟熏橡木.jpg','.jpg',45839,1,1764831876,1,2,0,'171.212.98.78',0),(164,'/upfile/2025/12/1764831876118.jpg','V8009-艾格橡木.jpg','.jpg',90229,1,1764831876,1,2,0,'171.212.98.78',0),(165,'/upfile/2025/12/1764831877174.jpg','V8013-百达翡翠.jpg','.jpg',95943,1,1764831877,1,2,0,'171.212.98.78',0),(166,'/upfile/2025/12/1764831877692.jpg','V8014-范思哲.jpg','.jpg',98520,1,1764831877,1,2,0,'171.212.98.78',0),(167,'/upfile/2025/12/1764831877571.jpg','V8012-理想榆木.jpg','.jpg',73331,1,1764831877,1,2,0,'171.212.98.78',0),(168,'/upfile/2025/12/1764831877326.jpg','V8011-千丝木.jpg','.jpg',82384,1,1764831878,1,2,0,'171.212.98.78',0);
/*!40000 ALTER TABLE `sd_attachment` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sd_attachment_group`
--

DROP TABLE IF EXISTS `sd_attachment_group`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `sd_attachment_group` (
  `aid` int(10) NOT NULL AUTO_INCREMENT,
  `gname` varchar(50) DEFAULT '',
  `ordnum` int(10) DEFAULT '0',
  `islock` smallint(1) DEFAULT '0',
  PRIMARY KEY (`aid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sd_attachment_group`
--

LOCK TABLES `sd_attachment_group` WRITE;
/*!40000 ALTER TABLE `sd_attachment_group` DISABLE KEYS */;
/*!40000 ALTER TABLE `sd_attachment_group` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sd_auth`
--

DROP TABLE IF EXISTS `sd_auth`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `sd_auth` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `ckey` varchar(50) DEFAULT '',
  `cval` text,
  `cdate` varchar(255) DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=140 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sd_auth`
--

LOCK TABLES `sd_auth` WRITE;
/*!40000 ALTER TABLE `sd_auth` DISABLE KEYS */;
INSERT INTO `sd_auth` VALUES (139,'main','NzQxYzlYa2xZZFdTM1p6ZnhBRklORkNEeDFwT0RkRWlBOUxXYjZZWFFmdHh0MGpjNDAwckI3YUIxY0ljRVRKR29YSjhsZVh5T2xQSUszcHdzeEk3VUFyQnIxbUF4eUVrMENqajdCcnNIci8vNVhtVTJzdStxK2pFckpzRWhkdHlQVXppbnRXa1ZpeU9XZ1hrcFAvNUtncUtYOXJoaVh5TFZGaUVhYlUyNTJkU1NkYkx5R2lTN0ZsMVNtYzg0aW11Ukx0VmJjNGh0V2VHNm8rdlJ5dVlUejhpd3pIZi91WVRKMjNFUmREdUJ5SFQ3N3ZNYnVrWmVRZm95czl1d3lwK3Fwa040eDE2aHp4UFVRb2pKcmcvd2VGVTFYNFplZTBFN0s3cFYwQWxrZ2tRWkN0RllxOElBNW9uaTlzMS9RSVhtdUZzNXk0WU5ENDVBL2ViM2NNWkdJRkFnU2xPVFJLcy9GVUdGdkthbmxmb21PT3dLTlJoL1FXZ21nOTNvNXplRWhURHBxQ3JBL0VLVE9pL3RUVi9zMWdvc3EzL1BlWE44dExCU3RZZjZSZTVBS1JVMTVra0ltdWFLYWFTaUV4MFZIS2hZTjlBa0tUVm9qL3JpRWlOWUt0dHdmemVLS0pZVmtlMGF0RmxaQy9qcGpFWFh5LzBGbFV3VnY2MEg4cHlvT290VER3RVAxdHRMMFR4OEJwNGp3ZUt4WGVMbDJVdHRpakU2aGxDVHlNMUpJZTRzQldVUXlRbEpsbHdFQ0FERVlmOXVkSmZQck1kMFRtaTBaMEQzMnZLbjlWb054R2tCbjhNY1hGbUdmNVZiNHJ0TVhVTWVYZ0tCUVdQcU56VzJidjhpTHdhUUc0WGdQK0gwd0hycC96dWcyWVY5Q1MvTGtpdkpoQ3FnaU9UcDBlWjg5SHIvemtHTUp5Vm44eE4ycHdmYTluVk9VNnR6SFFVZkFZUk4vVUtWbkJJVndNSmpRM0cyOTRNeUhRRjdOMXJQWG9rNkZXQnl0TWFkS2N2UEZDbEltMWVNdGhJQ1RmNTdaa3FZM2g0Y2RiRFVrQXZXTHFYdGFUOUhtOWdicGFtWm81a3NBRTh6WkM3d3FZSnpETkNtbjFrNWM4TDdJajV6dm16NzVSS01UMVhKdFNQc2ZtMGkyVkNsYzYzRm1Ba0N6VHhkWUY3cVgwTkhvWnhCSDV0V1dOb0lVTkVjNzl6aUJ2U3NBdUt4eGhyQ2JKOVB1VHZiVlUxNGk0N1ByVzc2NFVDNlJVdnQyQmpieVZOVStJVGVlOVFwTk9QcUxYOEpUN0xHTDdLeUllS21QZjhQR24rUlZGZzZPSGYzZkQ5cW9uOFROQWNyZGJmUzdzcGZ5R2xhb2dJZFMxZ2RidlhaTkI0VVJXZmhGNEhUZzVUS242Y1pETTZBMWc4blBBVVJmaVFhMjc0SnVsNkdOdnNPaklpUmRWS2J2TkJwYi9COVBOVHNscDVEaFcwNk9aTENad3dyOURkSnc','NzIyYkV4ck1SU1h1cTBPZ2daL1pWSmszNCtvNDNFbTdickpvdW10bFJJYVBsalIzMHh4Tg');
/*!40000 ALTER TABLE `sd_auth` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sd_auto_key`
--

DROP TABLE IF EXISTS `sd_auto_key`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
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
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sd_auto_key`
--

LOCK TABLES `sd_auto_key` WRITE;
/*!40000 ALTER TABLE `sd_auto_key` DISABLE KEYS */;
/*!40000 ALTER TABLE `sd_auto_key` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sd_auto_reply`
--

DROP TABLE IF EXISTS `sd_auto_reply`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `sd_auto_reply` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `reply_key` varchar(50) DEFAULT '',
  `reply_type` int(10) DEFAULT '0',
  `reply_text` text,
  `reply_id` int(10) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sd_auto_reply`
--

LOCK TABLES `sd_auto_reply` WRITE;
/*!40000 ALTER TABLE `sd_auto_reply` DISABLE KEYS */;
INSERT INTO `sd_auto_reply` VALUES (1,'subscribe',0,'',0),(2,'auto',0,'',0);
/*!40000 ALTER TABLE `sd_auto_reply` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sd_badword`
--

DROP TABLE IF EXISTS `sd_badword`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `sd_badword` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `words` mediumtext,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sd_badword`
--

LOCK TABLES `sd_badword` WRITE;
/*!40000 ALTER TABLE `sd_badword` DISABLE KEYS */;
INSERT INTO `sd_badword` VALUES (1,'');
/*!40000 ALTER TABLE `sd_badword` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sd_bbs`
--

DROP TABLE IF EXISTS `sd_bbs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
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
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sd_bbs`
--

LOCK TABLES `sd_bbs` WRITE;
/*!40000 ALTER TABLE `sd_bbs` DISABLE KEYS */;
/*!40000 ALTER TABLE `sd_bbs` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sd_bbs_cate`
--

DROP TABLE IF EXISTS `sd_bbs_cate`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
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
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sd_bbs_cate`
--

LOCK TABLES `sd_bbs_cate` WRITE;
/*!40000 ALTER TABLE `sd_bbs_cate` DISABLE KEYS */;
/*!40000 ALTER TABLE `sd_bbs_cate` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sd_bbs_reply`
--

DROP TABLE IF EXISTS `sd_bbs_reply`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
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
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sd_bbs_reply`
--

LOCK TABLES `sd_bbs_reply` WRITE;
/*!40000 ALTER TABLE `sd_bbs_reply` DISABLE KEYS */;
/*!40000 ALTER TABLE `sd_bbs_reply` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sd_book`
--

DROP TABLE IF EXISTS `sd_book`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
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
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sd_book`
--

LOCK TABLES `sd_book` WRITE;
/*!40000 ALTER TABLE `sd_book` DISABLE KEYS */;
/*!40000 ALTER TABLE `sd_book` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sd_category`
--

DROP TABLE IF EXISTS `sd_category`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
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
  `mynybanner` varchar(255) DEFAULT NULL,
  `sypic` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`cateid`),
  KEY `followid` (`followid`),
  KEY `ordnum` (`catenum`)
) ENGINE=MyISAM AUTO_INCREMENT=54 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sd_category`
--

LOCK TABLES `sd_category` WRITE;
/*!40000 ALTER TABLE `sd_category` DISABLE KEYS */;
INSERT INTO `sd_category` VALUES (1,'关于我们',0,0,-1,'',20,'','content/page/about.php','','','',1,0,0,'',0,'','about','/upfile/2025/03/1741746779564.jpg',''),(2,'卢卡尔曼精板',0,1,-1,'',20,'','content/page/brand.php','','','',1,0,0,'',0,'','','/upfile/2025/03/1742268657431.jpg','/upfile/2025/03/1741944169301.png'),(4,'经典系列',0,4,-1,'',20,'content/news/list_pic.php','content/page/brand3.php','','','',1,0,0,'',0,'','','/upfile/2025/03/1741746779564.jpg',''),(5,'实木系列',0,4,-1,'',20,'','content/page/brand4.php','','','',1,0,0,'',0,'','job','/upfile/2025/03/1741746779564.jpg',''),(6,'联系我们',0,8,-1,'',20,'','content/page/contact.php','','','',1,0,0,'',0,'','contact','/upfile/2025/03/1741943772190.jpg',''),(7,'公司简介',1,0,-1,'',20,'','','','','',0,0,0,'',0,'','',NULL,NULL),(8,'企业文化',1,0,-1,'',20,'','','','','',0,0,0,'',0,'','',NULL,NULL),(9,'发展历程',1,0,-1,'',20,'','','','','',0,0,0,'',0,'','',NULL,NULL),(10,'品牌简介',2,0,-1,'',20,'','','','','',0,0,0,'',0,'','',NULL,NULL),(37,'品牌简介',5,0,-1,'',20,'','','','','',0,0,0,'',0,'','',NULL,NULL),(51,'产品特点',47,0,1,'',20,'','','','','',1,0,0,'',0,'','','',''),(48,'品牌简介',47,0,-1,'',20,'','','','','',1,0,0,'',0,'','','',''),(35,'产品特点',4,0,1,'',20,'','','','','',0,0,0,'',0,'','',NULL,NULL),(34,'产品介绍',4,0,2,'',20,'','','','','',0,0,0,'',0,'','',NULL,NULL),(33,'品牌简介',4,0,-1,'',20,'','','','','',0,0,0,'',0,'','',NULL,NULL),(21,'荣誉资质',1,0,-1,'',20,'','','','','',0,0,0,'',0,'','',NULL,NULL),(39,'产品特点',5,0,1,'',20,'','','','','',0,0,0,'',0,'','',NULL,NULL),(38,'产品介绍',5,0,2,'',20,'','','','','',0,0,0,'',0,'','',NULL,NULL),(28,'新闻中心',0,7,1,'',20,'','','','','',1,0,0,'',0,'','','https://w.yksyb.cn/img.php?w=1920&h=366',''),(25,'产品介绍',2,0,2,'',20,'','','','','',0,0,0,'',0,'','',NULL,NULL),(26,'产品特点',2,0,1,'',12,'','','','','',0,0,0,'',0,'','',NULL,NULL),(46,'花色类型',2,0,-1,'hs',20,'','','','','',0,0,0,'',0,'','','',''),(50,'产品介绍',47,0,2,'',20,'','','','','',1,0,0,'',0,'','','',''),(41,'鲁丽精板',0,5,-1,'',20,'','content/page/brand2-1.php','','','',1,0,0,'',0,'','','/upfile/2025/03/1742268726184.jpg',''),(42,'品牌简介',41,0,-1,'',20,'','','','','',0,0,0,'',0,'','','',''),(43,'产品介绍',41,0,2,'',20,'','','','','',0,0,0,'',0,'','','',''),(44,'产品特点',41,0,1,'',20,'','','','','',0,0,0,'',0,'','','',''),(47,'莫干山抗菌板',0,6,-1,'',20,'','content/page/brand3-1.php','','','',1,0,0,'',0,'','','/upfile/2025/09/1756716283366.jpg','/upfile/2025/09/1756717775459.jpg'),(52,'花色类型',4,0,-1,'',20,'','','','','',0,0,0,'',0,'','','',''),(53,'环保等级',1,0,-1,'',20,'','','','','',1,0,0,'',0,'','','','');
/*!40000 ALTER TABLE `sd_category` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sd_category_field`
--

DROP TABLE IF EXISTS `sd_category_field`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
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
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sd_category_field`
--

LOCK TABLES `sd_category_field` WRITE;
/*!40000 ALTER TABLE `sd_category_field` DISABLE KEYS */;
INSERT INTO `sd_category_field` VALUES (1,'英文名称','myename',1,0,0,'','','','建议一级栏目填写',0,0,0,0,1),(2,'内页banner','mynybanner',5,0,1,'','','varchar(255) DEFAULT NULL','用英语内页banner图上传',0,1,0,0,1),(3,'首页品牌大图','sypic',5,0,1,'','','varchar(255) DEFAULT NULL','首页品牌大图 1920*700',0,1,0,0,1);
/*!40000 ALTER TABLE `sd_category_field` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sd_city`
--

DROP TABLE IF EXISTS `sd_city`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
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
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sd_city`
--

LOCK TABLES `sd_city` WRITE;
/*!40000 ALTER TABLE `sd_city` DISABLE KEYS */;
/*!40000 ALTER TABLE `sd_city` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sd_code`
--

DROP TABLE IF EXISTS `sd_code`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `sd_code` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `email` varchar(255) DEFAULT '',
  `code` varchar(50) DEFAULT '',
  `types` int(10) DEFAULT '0',
  `createdate` int(10) DEFAULT '0',
  `isover` int(10) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sd_code`
--

LOCK TABLES `sd_code` WRITE;
/*!40000 ALTER TABLE `sd_code` DISABLE KEYS */;
/*!40000 ALTER TABLE `sd_code` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sd_config`
--

DROP TABLE IF EXISTS `sd_config`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
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
) ENGINE=MyISAM AUTO_INCREMENT=194 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sd_config`
--

LOCK TABLES `sd_config` WRITE;
/*!40000 ALTER TABLE `sd_config` DISABLE KEYS */;
INSERT INTO `sd_config` VALUES (1,1,'web_line','网站设置','',1,9,'','',1,0,1,1,0),(2,1,'web_open','网站开关','1',3,6,'网站开启|1,网站关闭|0','',1,0,1,1,0),(3,1,'web_close','关闭原因','临时维护，预计开放时间：16:00',5,5,'','',1,0,1,1,0),(4,1,'web_name','网站名称','成都理想树商贸有限公司',7,1,'','',1,0,1,1,0),(5,1,'web_logo','网站Logo','/upfile/2025/03/1742204657238.png',9,4,'','',1,1,1,1,0),(6,1,'web_icp','ICP备案号','蜀ICP备2024110988号-1',13,1,'','',1,1,1,1,0),(7,1,'seo_line','优化设置','',23,9,'','',1,0,1,1,0),(8,1,'seo_title','优化标题','四川高端定制家具板材厂家-欧松板批发-板材供应-理想树商贸',25,1,'','',1,0,1,1,0),(9,1,'seo_key','网站关键字','高端定制家具板材,定制门墙柜板材,定制衣柜板材,定制门板材,无醛板,欧松板,四川定制家具板材,定制家具板材厂',27,5,'','',1,0,1,1,0),(10,1,'seo_desc','网站描述','成都理想树商贸有限公司是提供高端定制家具板材的厂家,产品包括门板材、门墙柜板材、衣柜板材定制、欧松板、无醛板批发,公司集生产销售、仓储配送于一体,与您共筑安全、温暖之家!',29,5,'','',1,0,1,1,0),(11,2,'url_mode','Url模式','1',1,6,'普通模式（例: /?m=home）|1,PathInfo模式（例: /index.php/news.html）|2,伪静态模式（例: /news.html）|3','',2,0,1,1,0),(12,2,'url_mid','Url间隔符','/',3,8,'/|/,-|-,_|_','',1,0,1,1,0),(13,2,'url_ext','内容Url后缀','.html',7,8,'无后缀|,.html|.html,/|/','',1,0,1,1,0),(14,3,'mail_type','发送方式','0',0,6,'关闭|0,开启|2','',1,0,1,1,0),(120,1,'web_order_login','下单设置','0',41,6,'会员才能下单|1,任何人都可下单|0','',1,0,0,1,0),(15,3,'mail_name','发件人姓名','',0,1,'','',1,0,1,1,0),(16,3,'mail_sign','邮件签名','',0,5,'','',1,0,1,1,0),(17,3,'mail_spilt','邮件头分隔符','1',0,8,'使用CRLF作为分隔符(通常为Windows主机)|1,使用LF作为分隔符(通常为Unix/Linux主机)|2,使用CR作为分隔符(通常为Mac主机)|3','',2,0,1,1,0),(18,3,'mail_smtp','SMTP服务器','',0,1,'','',1,0,1,1,0),(19,3,'mail_user','用户名','',0,1,'','填写邮箱全称，如：test@qq.com',1,0,1,1,1),(20,3,'mail_pass','密码/授权码','',0,1,'','',1,0,1,1,1),(21,3,'mail_auth','验证','1',0,6,'是|1,否|0','',1,0,1,1,0),(22,3,'mail_port','端口','25',0,1,'','',1,0,1,1,0),(23,4,'upload_line','上传设置','',0,9,'','',1,0,1,1,0),(24,4,'upload_image_max','图像最大上传','2',0,1,'','单位：M',1,0,1,1,0),(25,4,'upload_video_max','视频最大上传','10',0,1,'','单位：M',1,0,1,1,0),(26,4,'upload_file_max','附件最大上传','10',0,1,'','单位：M',1,0,1,1,0),(27,4,'upload_file_folder','储存方式','2',0,6,'按 年 目录，如：2016/14731414801.jpg|1,按 年/月 目录，如：2016/10/14731414801.jpg|2,按 年/月/日 目录，如：2016/10/21/14731414801.jpg|3','',2,0,1,1,0),(28,4,'thumb_line','压缩设置','',0,9,'','',1,0,1,1,0),(29,4,'thumb_open','等比压缩','0',0,6,'开启|1,关闭|0','',1,0,1,1,0),(30,4,'thumb_min','压缩宽度','600',0,1,'','图片会被压缩成这个宽度',1,0,1,1,0),(31,4,'water_line','水印设置','',0,9,'','',1,0,1,1,0),(32,4,'water_open','水印开关','0',0,6,'开启|1,关闭|0','',1,0,1,1,0),(33,4,'water_width','最小宽度','400',0,1,'','',1,0,1,1,0),(34,4,'water_height','最小高度','100',0,1,'','',1,0,1,1,0),(35,4,'water_opacity','透明度','60',0,1,'','',1,0,1,1,0),(36,4,'water_position','水印位置','0',0,8,'随机显示|0,顶部居左|1,顶部居中|2,顶部居右|3,中部居左|4,中部居中|5,中部居右|6,底部居左|7,底部居中|8,底部居右|9','',1,0,1,1,0),(37,4,'water_logo','水印Logo','/upfile/mobile.png',0,4,'','',1,1,1,1,0),(38,5,'mobile_open','开关','1',1,6,'开启|1,关闭|0','',1,0,1,1,0),(39,5,'mobile_domain','绑定域名','m.127.0.0.1:81',5,1,'','例：m.baidu.com',1,0,1,1,0),(40,6,'weixin_appid','AppID(应用ID)','',0,1,'','',1,0,1,1,1),(41,6,'weixin_appsecret','AppSecret(应用密钥)','',0,1,'','',1,0,1,1,1),(42,6,'weixin_token','Token(令牌)','',0,1,'','',1,0,1,1,0),(43,6,'weixin_id','公众号的微信号','',0,1,'','',1,0,1,1,0),(44,6,'weixin_qrcode','公众号二维码','',0,4,'','',1,1,1,1,0),(45,7,'link_logo','LOGO链接','1',0,6,'开启|1,关闭|0','',1,0,1,1,0),(46,7,'link_class','分类开关','0',0,6,'开启|1,关闭|0','',1,0,1,1,0),(47,7,'link_class_data','链接分类','首页链接|1\r\n合作伙伴|2',0,5,'','',1,0,1,1,0),(48,8,'ct_company','公司名称','成都理想树商贸有限公司',0,1,'','',1,0,1,1,0),(49,8,'ct_tel','服务热线','400-1234-5678',0,1,'','',1,0,0,1,0),(50,8,'ct_fax','传真号码','',0,1,'','',1,0,0,1,0),(51,8,'ct_mobile','手机号码','19150249019',0,1,'','',1,0,1,1,0),(52,8,'ct_email','电子邮箱','lxsl@qq.com',0,1,'','',1,0,1,1,0),(53,8,'ct_address','公司地址','成都市新都区新繁金度路',0,1,'','',1,0,1,1,0),(54,5,'mobile_auto','自动识别','1',7,6,'开启|1,关闭|0','',1,0,1,1,0),(55,5,'mobile_logo','手机站LOGO','/upfile/mobile.png',9,4,'','',1,1,1,1,0),(56,3,'mail_admin','管理员邮箱','',0,1,'','不能和上面的用户名相同',1,0,1,1,0),(57,2,'url_line','路由映射','',9,9,'','',1,0,1,1,0),(58,2,'url_list','模型列表页','list',11,1,'','',1,0,1,1,0),(59,2,'url_show','模型内容页','show',13,1,'','',1,0,1,1,0),(60,9,'admin_code','后台登录验证码','1',2,6,'图形验证码|1,谷歌验证码|3,关闭|2','',1,0,1,1,0),(61,9,'admin_logintimes','登录尝试次数','10',4,1,'','超过次数后禁止登录',1,0,1,1,0),(62,9,'admin_log','自动清理日志时间','30',5,1,'','单位为天，超过多少天的自动清理',1,0,1,1,0),(63,1,'count_line','流量统计','',31,9,'','',1,0,0,1,0),(64,1,'count_code','统计代码','',33,5,'','',1,0,1,1,0),(65,1,'home_line','其他设置','',35,9,'','',1,0,1,1,0),(66,1,'home_video','首页视频/图片','',11,4,'','请上传mp4格式视频，大小建议5M以内，如果没有视频可以上传图片',1,3,0,1,0),(67,10,'pay_open','接口状态','0',1,6,'开启|1,关闭|0','关闭后以下设置无效，在线支付接口均需要企业（含个体工商户）身份才能申请到',1,0,1,1,0),(68,10,'pay_alipay_line','支付宝接口（含电脑网站支付和手机网站支付）','',3,9,'','',1,0,1,1,0),(69,10,'pay_alipay_open','是否开启','0',5,6,'开启|1,关闭|0','',1,0,1,1,0),(70,10,'pay_alipay_appid','AppID','',7,1,'','',1,0,1,1,1),(73,10,'pay_alipay_biz','接口授权码','',11,5,'','支付宝支付接口授权码通过官网购买，未授权时接只能支付0.01元',1,0,1,1,1),(74,10,'pay_wxpay_line','微信支付接口（含扫码支付、公众号支付和微信H5支付）','',13,9,'','',1,0,1,1,0),(75,10,'pay_wxpay_open','是否开启','0',15,6,'开启|1,关闭|0','',1,0,1,1,0),(76,10,'pay_wxpay_appid','商户号','',17,1,'','',1,0,1,1,1),(77,10,'pay_wxpay_key','密钥','',19,1,'','长度为32位，必须包含：大小写字母和数字',1,0,1,1,1),(78,10,'pay_wxpay_biz','接口授权码','',21,5,'','微信支付接口授权码通过官网购买，未授权时接只能支付0.01元',1,0,1,1,1),(79,1,'web_domain','站点主域名','www.lxssm.com',19,1,'','例：www.baidu.com，使用栏目绑定域名时，必须配置主域名',1,0,1,1,0),(80,1,'content_subid','内容副栏目','0',37,6,'开启|1,关闭|0','',1,0,1,1,0),(81,11,'file_way','存储方式','local',0,8,'本地存储|local,阿里云Oss|oss,七牛云|qiniu','',1,0,1,1,0),(82,11,'file_oss_line','阿里云OSS','',0,9,'','',1,0,1,1,0),(83,11,'file_oss_appid','Access Key ID','',0,1,'','',1,0,1,1,1),(84,11,'file_oss_appkey','Access Key Secret','',0,1,'','',1,0,1,1,1),(85,11,'file_oss_bucket','Bucket','',0,1,'','',1,0,1,1,1),(86,11,'file_oss_domain','用户域名','',0,1,'','例：http://file.baidu.com',1,0,1,1,1),(87,11,'file_oss_url','OSS 域名','',0,1,'','例：http://test.oss-cn-hangzhou.aliyuncs.com',1,0,1,1,1),(88,11,'file_qiniu_line','七牛云存储','',0,9,'','',1,0,1,1,0),(89,11,'file_qiniu_appid','AccessKey','',0,1,'','',1,0,1,1,1),(90,11,'file_qiniu_appkey','Secret Key','',0,1,'','',1,0,1,1,1),(91,11,'file_qiniu_bucket','Bucket','',0,1,'','',1,0,1,1,1),(92,11,'file_qiniu_domain','用户域名','',0,1,'','可以使用绑定的域名，也可以使用测试域名，例：http://file.baidu.com',1,0,1,1,1),(93,11,'file_qiniu_url','上传地址','',0,1,'','例：http://upload.qiniu.com',1,0,1,1,1),(94,12,'user_open','开放注册','1',0,6,'开放注册|1,关闭注册|2','',1,0,1,1,0),(95,12,'user_reg_type','注册审核','1',0,6,'直接通过|1,邮箱验证|2,管理员审核|3','',1,0,1,1,0),(96,12,'user_badname','禁止注册的用户名','sdcms|admin|ceo|cto|boss|fuck|cao',0,5,'','多个请用“|”间隔',1,0,1,1,0),(97,12,'user_reg_group','加入用户组','1',0,8,'默认用户组|0','注册后默认加入哪个会员组',1,0,1,1,0),(98,12,'user_reg_auth','注册验证码','1',0,6,'开启|1,关闭|2','',1,0,1,1,0),(99,12,'user_login_auth','登录验证码','1',0,6,'开启|1,关闭|2','',1,0,1,1,0),(100,12,'user_getpass_auth','忘记密码验证码','1',0,6,'开启|1,关闭|2','',1,0,1,1,0),(101,13,'api_qq_line','QQ登录接口','',0,9,'','',1,0,1,1,0),(102,13,'api_qq_open','接口状态','0',0,6,'开启|1,关闭|0','',1,0,1,1,0),(103,13,'api_qq_appid','AppId','',0,1,'','',1,0,1,1,1),(104,13,'api_qq_key','AppKey','',0,1,'','',1,0,1,1,1),(105,13,'api_weibo_line','微博登录接口','',0,9,'','',1,0,1,1,0),(106,13,'api_weibo_open','接口状态','0',0,6,'开启|1,关闭|0','',1,0,1,1,0),(107,13,'api_weibo_appid','App Key','',0,1,'','',1,0,1,1,1),(108,13,'api_weibo_key','App Secret','',0,1,'','',1,0,1,1,1),(109,14,'bbs_open','社区开关','0',0,6,'开启|1,关闭|0','',1,0,1,1,0),(110,14,'bbs_close','关闭原因','社区维护中',0,5,'','',1,0,1,1,0),(111,14,'bbs_webname','社区名称','社区名称',0,1,'','',1,0,1,1,0),(112,14,'bbs_seotitle','优化标题','',0,1,'','',1,0,1,1,0),(113,14,'bbs_seokey','关键字','',0,5,'','',1,0,1,1,0),(114,14,'bbs_seodesc','描述','',0,5,'','',1,0,1,1,0),(115,14,'bbs_newpost','发帖时间间隔','5',0,1,'','单位：分钟',1,0,1,0,0),(116,14,'bbs_replypost','回帖时间间隔','1',0,1,'','单位：分钟',1,0,1,1,0),(117,14,'bbs_post_lock','发帖需要审核','1',0,6,'不需要审核|1,需要审核|0','',1,0,1,1,0),(118,6,'web_share_pic','微信分享图片','',0,4,'','微信分享默认图片，建议尺寸：100*100',1,1,1,1,0),(119,4,'water_piclist','组图水印','0',0,6,'开启|1,关闭|0','',1,0,1,1,0),(121,13,'api_weixin_line','微信扫码登录接口（Pc网站使用，需要申请开发者认证，创建网站应用）','',0,9,'','',1,0,1,1,0),(122,13,'api_weixin_open','接口状态','0',0,6,'开启|1,关闭|0','',1,0,1,1,0),(123,13,'api_weixin_appid','AppID','',0,1,'','',1,0,1,1,1),(124,13,'api_weixin_appkey','AppSecret','',0,1,'','',1,0,1,1,1),(125,13,'api_wx_line',' 微信公众号登录接口（在微信公众号内访问使用，需要公众号通过认证）','',0,9,'','',1,0,1,1,0),(126,13,'api_wx_open','接口状态','0',0,6,'开启|1,关闭|0','',1,0,1,1,0),(130,15,'city_class','栏目加城市名','0',7,6,'开启|1,关闭|0','',1,0,1,1,0),(129,15,'city_domain','分站根域名','',5,1,'','',1,0,1,1,0),(131,15,'city_content','内容加城市名','0',9,6,'开启|1,关闭|0','',1,0,1,1,0),(132,2,'url_cate_ext','栏目及别名后缀','/',5,8,'无后缀|,.html|.html,/|/','',1,0,1,1,0),(133,4,'thumb_auto','自动缩略图','0',0,6,'开启|1,关闭|0','开启后前台自动生成图片缩略图',1,0,1,1,0),(134,6,'weixin_cache','微信数据缓存','1',0,6,'开启|1,关闭|0','多个网站同时使用同一个公众号时，请关闭。',1,0,1,1,0),(135,14,'bbs_post_code','发帖验证码','1',0,6,'开启|1,关闭|0','',1,0,1,1,0),(136,14,'bbs_reply_code','回帖验证码','0',0,6,'开启|1,关闭|0','',1,0,1,1,0),(137,16,'open_line','公共设置','',0,9,'','',1,0,1,1,0),(138,16,'open_appkey','通信密钥','',0,1,'','小程序通信密钥，不可为空',1,0,1,1,1),(139,16,'open_debug','调试开关','0',0,6,'开启|1,关闭|0','本地调试时，请开启',1,0,1,1,0),(140,16,'open_bizcode','小程序授权码','',0,5,'','在正式域名下使用小程序，需要经过授权',1,0,1,1,1),(141,16,'open_weixin_line','微信小程序','',0,9,'','',1,0,1,1,0),(142,16,'open_weixin_appid','AppID','',0,1,'','小程序ID',1,0,1,1,1),(143,16,'open_weixin_appsecret','AppSecret','',0,1,'','小程序密钥',1,0,1,1,1),(145,1,'web_domain_line','域名相关','',15,9,'','',1,0,1,1,0),(146,1,'web_http','Http类型','http://',17,6,'Http://|http://,Https://|https://','',1,0,1,1,0),(147,1,'web_domains','副域名','lxssm.com',21,5,'','一行一条，格式：www.baidu.com 或 baidu.com，副域名会自动跳转到主域名',1,0,1,1,0),(148,5,'mobile_http','Http类型','http://',3,6,'Http://|http://,Https://|https://','',1,0,1,1,0),(149,16,'open_baidu_line','百度小程序','',0,9,'','',1,0,1,1,0),(150,16,'open_baidu_appid','App ID','',0,1,'','智能小程序ID',1,0,1,1,1),(151,16,'open_baidu_appkey','App Key','',0,1,'','',1,0,1,1,1),(152,16,'open_baidu_appsecret','App Secret','',0,1,'','智能小程序密匙',1,0,1,1,1),(166,15,'city_class_mid','栏目连接符','',11,1,'','分站栏目在城市名称后的连接字符',1,0,1,1,0),(167,15,'city_content_mid','内容连接符','',13,1,'','分站内容在城市名称后的连接字符',1,0,1,1,0),(159,10,'pay_baidu_line','百度收银台（小程序使用）','',23,9,'','',1,0,1,1,0),(160,10,'pay_baidu_open','是否开启','0',25,6,'开启|1,关闭|0','',1,0,1,1,0),(161,10,'pay_baidu_dealid','dealId','',27,1,'','',1,0,1,1,1),(162,10,'pay_baidu_appkey','APP KEY','',29,1,'','',1,0,1,1,1),(163,10,'pay_baidu_public_key','平台公钥','',31,5,'','',1,0,1,1,1),(164,10,'pay_baidu_private_key','开发者私钥','',33,5,'','',1,0,1,1,1),(165,10,'pay_baidu_biz','接口授权码','',35,5,'','百度收银台接口授权码通过官网购买，未授权时接只能支付0.01元',1,0,1,1,1),(168,13,'api_wx_autologin','免注册绑定','0',0,6,'开启|1,关闭|0','微信公众号内访问登录免注册',1,0,1,1,0),(169,1,'category_http','栏目Http类型','http://',21,6,'Http://|http://,Https://|https://','当栏目使用域名绑定功能时使用',1,0,1,1,0),(170,15,'city_open','分站开关','1',1,6,'开启|1,关闭|0','关闭后前台不显示',1,0,1,1,0),(171,15,'city_http','分站Http类型','http://',3,6,'Http://|http://,Https://|https://','当分站绑定域名时使用',1,0,1,1,0),(172,16,'open_douyin_line','抖音小程序','',0,9,'','',1,0,1,1,0),(173,16,'open_douyin_appid','AppID','',0,1,'','小程序AppID',1,0,1,1,1),(174,16,'open_douyin_appsecret','AppSecret','',0,1,'','小程序AppSecret',1,0,1,1,1),(175,10,'pay_douyin_line','抖音支付接口（小程序使用，担保接口）','',37,9,'','',1,0,1,1,0),(176,10,'pay_douyin_open','是否开启','0',39,6,'开启|1,关闭|0','',1,0,1,1,0),(178,10,'pay_douyin_token','Token(令牌)','',41,1,'','',1,0,1,1,1),(179,10,'pay_douyin_salt','SALT','',43,1,'','',1,0,1,1,1),(180,6,'weixin_share_open','分享开关','1',0,6,'开启|1,关闭|0','微信内访问分享开关',1,0,1,1,0),(181,12,'user_default_face','默认头像','/upfile/noface.gif',0,4,'','会员默认头像',1,1,1,1,0),(182,9,'admin_code_google','谷歌密钥','',3,1,'','如果使用：谷歌验证码，请点击【生成】按钮生成密钥，然后通过【身份验证器】APP，扫描二维码',1,0,1,1,1),(183,9,'admin_logo','后台Logo','/upfile/2024/11/1731394653763.png',1,4,'','建议尺寸：200*40',1,1,1,1,1),(184,10,'pay_alipay_public','支付宝公钥','',7,5,'','',1,0,1,1,1),(186,1,'beian_line','公安备案号','',13,9,'','',1,0,1,1,0),(185,10,'pay_alipay_private','商户私钥','',7,5,'','',1,0,1,1,1),(187,1,'beian_num','备案号','',13,1,'','',1,0,0,1,0),(188,1,'beian_url','备案链接','',13,1,'','',1,0,1,1,0),(189,10,'pay_free_line','免签支付接口（需提现，申请网址：https://www.nicemb.com）','',21,9,'','',1,0,1,1,1),(190,10,'pay_free_open','接口开关','0',21,6,'开启|1,关闭|0','',1,0,1,1,1),(191,10,'pay_free_id','AppId','',21,1,'','',1,0,1,1,1),(192,10,'pay_free_key','AppKey','',21,1,'','',1,0,1,1,1),(193,8,'wxqr','咨询微信','https://w.yksyb.cn/img.php?w=200&h=200',0,4,'','微信二维码',1,1,1,0,0);
/*!40000 ALTER TABLE `sd_config` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sd_config_group`
--

DROP TABLE IF EXISTS `sd_config_group`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `sd_config_group` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `gname` varchar(50) DEFAULT '',
  `ordnum` int(10) DEFAULT '0',
  `gkey` varchar(50) DEFAULT '',
  `islock` int(10) DEFAULT '0',
  `types` int(1) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=17 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sd_config_group`
--

LOCK TABLES `sd_config_group` WRITE;
/*!40000 ALTER TABLE `sd_config_group` DISABLE KEYS */;
INSERT INTO `sd_config_group` VALUES (1,'基本设置',0,'0',1,1),(2,'运行模式',0,'0',1,1),(3,'邮件设置',0,'0',1,1),(4,'附件设置',0,'0',1,1),(5,'手机站',0,'0',1,1),(6,'微信设置',0,'0',1,2),(7,'友情链接',0,'link',1,0),(8,'联系方式',0,'0',1,1),(9,'后台相关',0,'0',1,1),(10,'支付接口',0,'0',1,2),(11,'云存储',0,'0',1,2),(12,'会员设置',0,'user',1,0),(13,'快捷登录',0,'0',1,2),(14,'社区设置',0,'bbs',1,0),(15,'城市分站',0,'city',1,0),(16,'小程序接口',0,'0',1,2);
/*!40000 ALTER TABLE `sd_config_group` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sd_content`
--

DROP TABLE IF EXISTS `sd_content`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
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
) ENGINE=MyISAM AUTO_INCREMENT=45 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sd_content`
--

LOCK TABLES `sd_content` WRITE;
/*!40000 ALTER TABLE `sd_content` DISABLE KEYS */;
INSERT INTO `sd_content` VALUES (1,'卢卡尔曼精板','/upfile/2025/03/1742889987592.png',1,25,0,0,0,0,0,0,0,0,'',1731573083,1742890854,'秉承“绿色家居，健康生活”的理念，致力于推动家居行业的可持续发展。品牌坚信，环保不仅是责任，更是未来家居生活的核心。','','','','','','','a:0:{}','',1,0,'','[]',0),(2,'4、ENF级环保板材','/upfile/2025/03/1741774323307.jpg',1,26,0,1,0,0,0,0,0,0,'',1731576042,1741774328,' - 采用国际最高环保标准ENF，甲醛释放量极低，几乎为零，适合儿童房、医院等对环保要求极高的场所。 - 使用无醛胶粘剂，确保产品从源头到成品全程环保。','','','','','','','a:0:{}','',1,0,'','[]',0),(38,'莫干山抗菌板','/upfile/2025/09/1756715451728.png',1,50,4,1,0,0,0,0,0,0,'',1756714828,1756715455,'理想树重磅携手中国十大板材品牌「莫干山」，带来全新产品 ——莫干山悦享系列植物源抗菌板！这不仅是一块能撑起家居颜值的装饰板，更是守护家人健康的隐形卫士。','','','','','','','a:0:{}','',2,0,'','[]',0),(37,'成都理想树商贸有限公司','/upfile/2025/03/1742362848934.jpg',1,28,78,1,0,0,0,0,0,0,'',1742362702,1767150943,'成都理想树商贸有限公司成立于2021年4月23日，坐落于成都龙桥家具园区。','','','','','','','a:0:{}','',2,0,'','[]',0),(3,'3、严格质量控制','/upfile/2025/03/1741774310556.jpg',1,26,0,1,0,0,0,0,0,0,'',1731576042,1741774312,'  - 从原材料采购到成品出厂，卢卡尔曼实行全程质量监控，确保每一块板材都符合高标准。  - 定期进行环保性能测试，确保产品始终符合ENF级环保标准。','','','','','','','a:0:{}','',1,0,'','[]',0),(29,'4、德国装备','/upfile/2025/03/1741776098110.png',1,44,0,0,0,0,0,0,0,0,'',1731638030,1741776102,'与德国迪芬巴赫公司共同研发0SB生产线，流水线一次成型，确保从原木到成品的高效产出，实现了由传统劳动密集型生产工艺升级为自动化、数字化和清洁化的巨大转变。','','','','','','','a:0:{}','',1,0,'','[]',0),(4,'2、环保创新','/upfile/2025/03/1741774294555.jpg',1,26,0,1,0,0,0,0,0,0,'',1731576042,1741774296,'- 卢卡尔曼与多家科研机构合作，开发无醛胶粘剂和环保生产工艺，减少对环境的影响。- 通过多项国际环保认证，如FSC（森林管理委员会）认证、CARB（加州空气资源委员会）认证等。','','','','','','','a:0:{}','',1,0,'','[]',0),(5,'1、先进生产工艺','/upfile/2025/03/1741774277707.jpg',1,26,0,1,0,0,0,0,0,0,'',1731576042,1741774280,'   - 卢卡尔曼引进国际领先的生产设备和技术，确保板材的均匀性和稳定性。   - 采用高温高压工艺，增强板材的密度和强度。','','','','','','','a:0:{}','',1,0,'','[]',0),(27,'鲁丽精板','/upfile/2025/03/1741775429525.png',1,43,6,1,0,0,0,0,0,0,'',1741775084,1741775432,'鲁丽精板生产原材料为松木类小经材、技极材及木材加工边角料，大量节约了木材资源，其力学性能方面在方向性、耐久性、防潮性能和尺寸稳定性优于普通创花板。具有膨胀系数小、不变形、稳定性好，材质均匀及握钉力高等特点。','','','','','','','a:0:{}','',2,0,'','[]',0),(39,'18 种花色，承包你家的所有风格想象','/upfile/2025/09/1756716755897.jpg',1,51,0,1,0,0,0,0,0,0,'',1756715466,1756716757,'18 个自然色系，从温润的原木肌理到低饱和的莫兰迪色调，无论是追求返璞归真的原木风家居，还是偏爱复古优雅的中古风空间，或是打造精致高级的轻奢氛围，都能精准匹配你的审美需求。每一块板材都自带细腻质感，让家的颜值瞬间升级。​','','','','','','','a:0:{}','',2,0,'','[]',0),(11,'经典系列','/upfile/2025/05/1747103037654.jpg',1,34,0,1,0,0,0,0,0,0,'',1731650402,1747289090,'','','','','','','','a:0:{}','',1,0,'','[]',0),(40,'中药加身，给细菌病毒「致命一击」','/upfile/2025/09/1756716743573.jpg',1,51,0,1,0,0,0,0,0,0,'',1756715569,1756716745,'特别添加艾草、金银花、板蓝根等天然中药成分。通过先进的超临界萃取技术提纯有效成分，再经独创的分子巢技术牢牢锁在板材内部，让抗菌功效从源头持续释放。','','','','','','','a:0:{}','',2,0,'','[]',0),(41,'十年如新，环保等级拉满','/upfile/2025/09/1756716731746.jpg',1,51,0,1,0,0,0,0,0,0,'',1756715625,1756716734,'模拟十年老化测试，板材的抗菌性能依旧稳定在线，真正做到长久守护。环保方面更是无可挑剔，达到HENF 级环保标准。','','','','','','','a:0:{}','',2,0,'','[]',0),(42,'专属「身份证」，扫码解锁更多','/upfile/2025/09/1756716716732.jpg',1,51,0,1,0,0,0,0,0,0,'',1756715669,1756716719,'每一块悦享系列抗菌板都拥有独一无二的溯源二维码，如同专属「身份证」，扫码即可查询生产信息，品质透明可追溯，买得更放心。','','','','','','','a:0:{}','',2,0,'','[]',0),(43,'上新啦！理想树 × 莫干山联名抗菌板，给家「植」入十年健康护盾','/upfile/2025/09/1756716966144.jpg',1,28,14,1,0,0,0,0,0,0,'',1756716818,1756716973,'理想树重磅携手中国十大板材品牌「莫干山」，带来全新产品 ——莫干山悦享系列植物源抗菌板！这不仅是一块能撑起家居颜值的装饰板，更是守护家人健康的隐形卫士。​','莫干山板材,抗菌板,莫干山抗菌板','','','','','','a:0:{}','',2,0,'','[{\"name\":\"莫干山板材\",\"id\":\"1\"},{\"name\":\"抗菌板\",\"id\":\"2\"},{\"name\":\"莫干山抗菌板\",\"id\":\"3\"}]',0),(12,'握钉力强','/upfile/2025/05/1747103237637.jpg',1,35,0,1,0,0,0,0,0,0,'',1731650453,1747103240,'握钉力强','','','','','','','a:0:{}','',1,0,'','[]',0),(16,'实木系列','/upfile/2025/05/1747104929349.png',1,38,0,1,0,0,0,0,0,0,'',1731652192,1747104932,'纯松木欧松板是一款环境友好型产品，在被认为是国际上最健康的环保标准JIS A 5908:2015标准”中，它顺利通过甲醛释放量F4星等级的要求。同时，产品还拥有国际森林管理委员会认证（FSC）、PEFC 等多项认证。这也就意味着，您每购买一张KARRISEN凯立森 板材，都在为祖国“碳中和、碳达峰”战略贡献出力量。','','','','','','','a:0:{}','',1,0,'','[]',0),(13,'结构稳定','/upfile/2025/05/1747103215438.jpg',1,35,0,1,0,0,0,0,0,0,'',1731650453,1747103220,'结构稳定','','','','','','','a:0:{}','',1,0,'','[]',0),(14,'无醛添加','/upfile/2025/05/1747103182192.jpg',1,35,0,1,0,0,0,0,0,0,'',1731650453,1747103186,'无醛添加','','','','','','','a:0:{}','',1,0,'','[]',0),(15,'健康无异味','/upfile/2025/05/1747103103441.jpg',1,35,0,1,0,0,0,0,0,0,'',1731650453,1747103194,'健康无异味','','','','','','','a:0:{}','',1,0,'','[]',0),(17,'4、出色的定制加工性能','https://w.yksyb.cn/img.php?w=962&h=350',1,39,0,0,0,0,0,0,0,0,'',1731652259,1731652393,'产品特点详情产品特点详情产品特点详情产品特点详情产品特点详情产品特点详情产品特点详情产品特点详情产品特点详情产品特点详情产品特点详情产品特点详情产品特点详情产品特点详情产品特点详情产品特点详情产品特点详情产品特点详情产品特点详情产品特点详情产品特点详情。','','','','','','','a:0:{}','',1,0,'','[]',0),(18,'3、先进的设备与工艺','https://w.yksyb.cn/img.php?w=962&h=350',1,39,0,0,0,0,0,0,0,0,'',1731652259,1731652373,'产品特点详情产品特点详情产品特点详情产品特点详情产品特点详情产品特点详情产品特点详情产品特点详情产品特点详情产品特点详情产品特点详情产品特点详情产品特点详情产品特点详情产品特点详情产品特点详情产品特点详情产品特点详情产品特点详情产品特点详情产品特点详情。','','','','','','','a:0:{}','',1,0,'','[]',0),(19,'2、环保胶粘剂','https://w.yksyb.cn/img.php?w=962&h=350',1,39,0,0,0,0,0,0,0,0,'',1731652259,1731652352,'产品特点详情产品特点详情产品特点详情产品特点详情产品特点详情产品特点详情产品特点详情产品特点详情产品特点详情产品特点详情产品特点详情产品特点详情产品特点详情产品特点详情产品特点详情产品特点详情产品特点详情产品特点详情产品特点详情产品特点详情产品特点详情。','','','','','','','a:0:{}','',1,0,'','[]',0),(20,'1、优质原材料','https://w.yksyb.cn/img.php?w=962&h=350',1,39,0,0,0,0,0,0,0,0,'',1731652259,1731652319,'产品特点详情产品特点详情产品特点详情产品特点详情产品特点详情产品特点详情产品特点详情产品特点详情产品特点详情产品特点详情产品特点详情产品特点详情产品特点详情产品特点详情产品特点详情产品特点详情产品特点详情产品特点详情产品特点详情产品特点详情产品特点详情。','','','','','','','a:0:{}','',1,0,'','[]',0),(30,'3、高握钉力','/upfile/2025/03/1741776085989.png',1,44,0,0,0,0,0,0,0,0,'',1731638030,1741776090,'定向刨花结构特性增强了正侧面握钉力。解决了编木工板、普通创花板握钉力差的缺陷，保证了制作成品的尺寸精确虚和长期性使用。','','','','','','','a:0:{}','',1,0,'','[]',0),(32,'2、无醛添加','/upfile/2025/03/1741776072949.png',1,44,0,0,0,0,0,0,0,0,'',1731638030,1741776076,'生产过程中使用异氰酸酯(MDI)无醛胶粘剂。真正做到天然绿色无污染、无损身体健康，满足消费者对环保品质的追求。(呵护家人身体，尽享绿色生活)','','','','','','','a:0:{}','',1,0,'','[]',0),(33,'1、进口原木','/upfile/2025/03/1741776044323.png',1,44,0,0,0,0,0,0,0,0,'',1731638030,1741776060,'在新西兰自建林厂，并与其他多个国家建立长，期合作关系，在确保木材质量的同时与供货渠道建立稳定发展关系。','','','','','','','a:0:{}','',1,0,'','[]',0),(34,'理想树公司3月8号妇女节组织同事团建旅游','/upfile/2025/03/1741851515176.jpg',1,28,37,1,0,0,0,0,0,0,'',1741851415,1741851532,'近日，公司组织全体员工前往[团建地点]开展了一次别开生面的团建活动。此次活动旨在增强团队凝聚力，提升员工之间的协作能力，同时让大家在繁忙的工作之余放松身心，享受大自然的美丽风光。','','','','','','','a:0:{}','',2,0,'','[]',0),(35,'公司成功举办消防安全演练，提升员工应急处理能力','/upfile/2025/03/1741851575349.jpg',1,28,39,1,0,0,0,0,0,0,'',1741851538,1741851586,'为进一步增强员工的消防安全意识，提高应对突发火灾事件的能力，在公司园区内组织了一场全员参与的消防安全演练。此次演练旨在通过模拟真实火灾场景，帮助员工掌握正确的逃生和灭火技能，确保在紧急情况下能够迅速、有效地应对。','','','','','','','a:0:{}','',2,0,'','[]',0),(36,'企业积极参与政府安全生产培训，筑牢安全管理防线','/upfile/2025/03/1741851619833.jpg',1,28,34,1,0,0,0,0,0,0,'',1741851589,1741851629,'为深入贯彻落实国家安全生产政策，提升企业安全管理水平，公司组织管理层及安全负责人参加了由新都区（香城）新消费活力区管委主办的安全生产专题培训。此次培训旨在帮助企业进一步强化安全生产意识，掌握最新的安全生产法规和操作规范，确保企业生产经营活动安全、有序进行。','','','','','','','a:0:{}','',2,0,'','[]',0);
/*!40000 ALTER TABLE `sd_content` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sd_extend`
--

DROP TABLE IF EXISTS `sd_extend`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `sd_extend` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `title` varchar(50) DEFAULT '',
  `ordnum` int(10) DEFAULT '0',
  `islock` int(10) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sd_extend`
--

LOCK TABLES `sd_extend` WRITE;
/*!40000 ALTER TABLE `sd_extend` DISABLE KEYS */;
/*!40000 ALTER TABLE `sd_extend` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sd_extend_field`
--

DROP TABLE IF EXISTS `sd_extend_field`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
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
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sd_extend_field`
--

LOCK TABLES `sd_extend_field` WRITE;
/*!40000 ALTER TABLE `sd_extend_field` DISABLE KEYS */;
/*!40000 ALTER TABLE `sd_extend_field` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sd_form`
--

DROP TABLE IF EXISTS `sd_form`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
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
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sd_form`
--

LOCK TABLES `sd_form` WRITE;
/*!40000 ALTER TABLE `sd_form` DISABLE KEYS */;
INSERT INTO `sd_form` VALUES (1,'简历','resume','','','','','','',1,2,0,0,1,0,0,1);
/*!40000 ALTER TABLE `sd_form` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sd_form_field`
--

DROP TABLE IF EXISTS `sd_form_field`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
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
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sd_form_field`
--

LOCK TABLES `sd_form_field` WRITE;
/*!40000 ALTER TABLE `sd_form_field` DISABLE KEYS */;
INSERT INTO `sd_form_field` VALUES (1,1,'申请职位','my_title',1,0,0,'{php:get.jobname}','','varchar(255) NOT NULL','',1,1,0,0,'','','','','','',1,0,1),(2,1,'姓名','my_truename',1,20,0,'','','varchar(20) NOT NULL','',1,1,0,0,'','','','','','',1,0,1),(3,1,'性别','my_sex',11,0,0,'','男|1,女|2','int(10) NOT NULL','',1,1,0,0,'','','','','','',0,0,1),(4,1,'年龄','my_age',3,2,0,'','','int(10) NOT NULL','',3,1,0,0,'','','','','','',1,0,1),(5,1,'手机','my_mobile',1,11,0,'','','varchar(11) NOT NULL','',6,1,0,0,'','','','','','',1,0,1),(6,1,'学历','my_education',11,0,0,'','大专|1,本科|2,硕士|3,博士|4','int(10) NOT NULL','',1,1,0,0,'','','','','','',0,0,1),(7,1,'工作经验','my_work_exp',8,0,0,'','','text NOT NULL','',1,1,0,0,'','','','','','',0,0,1),(8,1,'自我评价','my_intro',8,0,0,'','','text NOT NULL','',1,1,0,0,'','','','','','',0,0,1);
/*!40000 ALTER TABLE `sd_form_field` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sd_form_resume`
--

DROP TABLE IF EXISTS `sd_form_resume`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
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
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sd_form_resume`
--

LOCK TABLES `sd_form_resume` WRITE;
/*!40000 ALTER TABLE `sd_form_resume` DISABLE KEYS */;
/*!40000 ALTER TABLE `sd_form_resume` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sd_inquiry`
--

DROP TABLE IF EXISTS `sd_inquiry`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
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
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sd_inquiry`
--

LOCK TABLES `sd_inquiry` WRITE;
/*!40000 ALTER TABLE `sd_inquiry` DISABLE KEYS */;
/*!40000 ALTER TABLE `sd_inquiry` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sd_link`
--

DROP TABLE IF EXISTS `sd_link`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
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
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sd_link`
--

LOCK TABLES `sd_link` WRITE;
/*!40000 ALTER TABLE `sd_link` DISABLE KEYS */;
/*!40000 ALTER TABLE `sd_link` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sd_mass`
--

DROP TABLE IF EXISTS `sd_mass`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
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
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sd_mass`
--

LOCK TABLES `sd_mass` WRITE;
/*!40000 ALTER TABLE `sd_mass` DISABLE KEYS */;
/*!40000 ALTER TABLE `sd_mass` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sd_mater`
--

DROP TABLE IF EXISTS `sd_mater`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `sd_mater` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `title` varchar(50) DEFAULT '',
  `media_id` varchar(255) DEFAULT '',
  `islock` int(10) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sd_mater`
--

LOCK TABLES `sd_mater` WRITE;
/*!40000 ALTER TABLE `sd_mater` DISABLE KEYS */;
/*!40000 ALTER TABLE `sd_mater` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sd_mater_data`
--

DROP TABLE IF EXISTS `sd_mater_data`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
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
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sd_mater_data`
--

LOCK TABLES `sd_mater_data` WRITE;
/*!40000 ALTER TABLE `sd_mater_data` DISABLE KEYS */;
/*!40000 ALTER TABLE `sd_mater_data` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sd_model`
--

DROP TABLE IF EXISTS `sd_model`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
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
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sd_model`
--

LOCK TABLES `sd_model` WRITE;
/*!40000 ALTER TABLE `sd_model` DISABLE KEYS */;
INSERT INTO `sd_model` VALUES (1,'文章模型','news','','content/news/list.php','content/news/show.php','基本设置|1,SEO设置|2,可选设置|3',0,1,1,1,1),(2,'产品模型','pro','','content/pro/list.php','content/pro/show.php','基本设置|1,SEO设置|2,可选设置|3',0,1,1,0,0),(3,'招聘模型','job','','content/job/list.php','content/job/show.php','基本设置|1,SEO设置|2,可选设置|3',0,1,1,0,0),(5,'花色模型','col','','content/pro/list.php','content/pro/show.php','基本设置|1,SEO设置|2,可选设置|3',0,1,0,0,0);
/*!40000 ALTER TABLE `sd_model` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sd_model_col`
--

DROP TABLE IF EXISTS `sd_model_col`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `sd_model_col` (
  `colid` int(10) NOT NULL AUTO_INCREMENT,
  `cid` int(10) DEFAULT '0',
  `price` decimal(10,2) DEFAULT '0.00',
  `content` mediumtext,
  `piclist` text,
  PRIMARY KEY (`colid`),
  UNIQUE KEY `cid` (`cid`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sd_model_col`
--

LOCK TABLES `sd_model_col` WRITE;
/*!40000 ALTER TABLE `sd_model_col` DISABLE KEYS */;
/*!40000 ALTER TABLE `sd_model_col` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sd_model_field`
--

DROP TABLE IF EXISTS `sd_model_field`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
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
) ENGINE=MyISAM AUTO_INCREMENT=126 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sd_model_field`
--

LOCK TABLES `sd_model_field` WRITE;
/*!40000 ALTER TABLE `sd_model_field` DISABLE KEYS */;
INSERT INTO `sd_model_field` VALUES (1,1,'标题','title',1,255,0,'','','','',1,1,0,1,0,'','','','','','',1,1,1,1),(2,1,'正文','content',12,0,0,'','','','',0,1,2,1,0,'','','','','','',3,1,1,0),(3,1,'缩略图','pic',5,255,1,'','','','',0,1,0,1,0,'','','','','','',5,1,1,1),(4,1,'标签','tags',1,255,0,'','','','多个标签请使用英文逗号隔开，不能超过10个',0,1,0,1,0,'','','','','','',7,1,1,1),(5,1,'摘要','intro',8,0,0,'','','','',0,1,0,1,0,'','','','','','',9,1,1,1),(6,1,'状态','islock',9,0,0,'1','立即发布|1,存为草稿|0','','',0,1,0,1,0,'','','','','','',11,1,1,1),(7,1,'优化标题','seotitle',1,255,0,'','','','',0,1,0,2,0,'','','','','','',13,1,1,1),(8,1,'关键字','seokey',8,0,0,'','','','',0,1,0,2,0,'','','','','','',15,1,1,1),(9,1,'描述','seodesc',8,0,0,'','','','',0,1,0,2,0,'','','','','','',17,1,1,1),(10,1,'别名','alias',1,50,0,'','','','',0,1,0,2,0,'','','','','','',19,1,1,1),(11,1,'外链','url',1,255,0,'','','','添加外链时，将不显示正文内容',0,1,0,3,0,'','','','','','',21,1,1,1),(12,1,'人气','hits',3,10,0,'0','','','',0,1,0,3,0,'','','','','','',23,1,1,1),(13,1,'赞数量','upnum',3,10,0,'0','','','',0,1,0,3,0,'','','','','','',25,1,1,1),(14,1,'踩数量','downnum',3,10,0,'0','','','',0,1,0,3,0,'','','','','','',27,1,1,1),(15,1,'排序','ordnum',3,10,0,'0','','','数字越大越靠前',0,1,0,3,0,'','','','','','',29,1,1,1),(16,1,'置顶','ontop',9,0,0,'0','否|0,是|1','','',0,1,0,3,0,'','','','','','',31,1,1,1),(17,1,'推荐','isnice',9,0,0,'0','否|0,是|1','','',0,1,0,3,0,'','','','','','',33,1,1,1),(18,1,'发布日期','createdate',2,0,0,'{php:now}','','','',0,1,0,3,0,'','','','','','',35,1,1,1),(19,1,'内容页模板','showskin',1,255,0,'','','','',0,1,0,3,0,'','','','','','',37,1,1,1),(20,2,'标题','title',1,255,0,'','','','',1,1,0,1,0,'','','','','','',1,1,1,1),(21,2,'组图','piclist',13,0,0,'','','','',0,1,0,1,0,'','','','','','',3,0,1,0),(22,2,'正文','content',12,0,0,'','','','',0,1,2,1,0,'','','','','','',5,0,1,0),(23,2,'简介','intro',8,0,0,'','','','',0,1,0,1,0,'','','','','','',7,1,1,1),(24,2,'缩略图','pic',5,255,1,'','|','','',0,1,0,1,0,'','','','','','',9,1,1,1),(25,2,'价格','price',4,10,1,'0','','','单位：元',4,1,0,1,0,'','','','','','',11,0,1,0),(26,2,'标签','tags',1,255,0,'','','','多个标签请使用英文逗号隔开，不能超过10个',0,1,0,1,0,'','','','','','',13,0,1,1),(27,2,'状态','islock',9,0,0,'1','立即发布|1,存为草稿|0','','',0,1,0,1,0,'','','','','','',15,1,1,1),(28,2,'优化标题','seotitle',1,255,0,'','','','',0,1,0,2,0,'','','','','','',17,0,1,1),(29,2,'关键字','seokey',8,0,0,'','','','',0,1,0,2,0,'','','','','','',19,0,1,1),(30,2,'描述','seodesc',8,0,0,'','','','',0,1,0,2,0,'','','','','','',21,0,1,1),(31,2,'别名','alias',1,50,0,'','','','',0,1,0,2,0,'','','','','','',23,0,1,1),(32,2,'外链','url',1,255,0,'','','','添加外链时，将不显示正文内容',0,1,0,3,0,'','','','','','',25,0,1,1),(33,2,'人气','hits',3,10,0,'0','','','',0,1,0,3,0,'','','','','','',27,0,1,1),(34,2,'赞数量','upnum',3,10,0,'0','','','',0,1,0,3,0,'','','','','','',29,0,1,1),(35,2,'踩数量','downnum',3,10,0,'0','','','',0,1,0,3,0,'','','','','','',31,0,1,1),(36,2,'排序','ordnum',3,10,0,'0','','','数字越大越靠前',0,1,0,3,0,'','','','','','',33,1,1,1),(37,2,'置顶','ontop',9,0,0,'0','否|0,是|1','','',0,1,0,3,0,'','','','','','',35,1,1,1),(38,2,'推荐','isnice',9,0,0,'0','否|0,是|1','','',0,1,0,3,0,'','','','','','',37,1,1,1),(39,2,'发布日期','createdate',2,0,0,'{php:now}','','','',0,1,0,3,0,'','','','','','',39,1,1,1),(40,2,'内容页模板','showskin',1,255,0,'','','','',0,1,0,3,0,'','','','','','',41,1,1,1),(43,3,'职位名称','title',1,255,0,'','','','',1,1,0,1,0,'','','','','','',1,1,1,1),(44,3,'工作内容','content',12,0,0,'','','','',0,1,1,1,0,'','','','','','',15,1,1,0),(45,3,'缩略图','pic',5,0,1,'','','','',0,1,0,3,0,'','','','','','',49,1,1,1),(46,3,'标签','tags',1,255,0,'','','','多个标签请使用英文逗号隔开，不能超过10个',0,1,0,1,0,'','','','','','',19,1,1,1),(47,3,'任职要求','intro',12,0,0,'','','','',0,1,1,1,0,'','','','','','',17,1,1,1),(48,3,'状态','islock',9,0,0,'1','立即发布|1,存为草稿|0','','',0,1,0,1,0,'','','','','','',21,1,1,1),(49,3,'优化标题','seotitle',1,0,0,'','','','',0,1,0,2,0,'','','','','','',23,1,1,1),(50,3,'关键字','seokey',8,0,0,'','','','',0,1,0,2,0,'','','','','','',25,1,1,1),(51,3,'描述','seodesc',8,0,0,'','','','',0,1,0,2,0,'','','','','','',27,1,1,1),(52,3,'别名','alias',1,50,0,'','','','',0,1,0,2,0,'','','','','','',29,1,1,1),(53,3,'外链','url',1,255,0,'','','','添加外链时，将不显示正文内容',0,1,0,3,0,'','','','','','',31,1,1,1),(54,3,'人气','hits',3,10,0,'0','','','',0,1,0,3,0,'','','','','','',33,1,1,1),(55,3,'赞数量','upnum',3,0,0,'0','','','',0,1,0,3,0,'','','','','','',35,1,1,1),(56,3,'踩数量','downnum',3,0,0,'0','','','',0,1,0,3,0,'','','','','','',37,1,1,1),(57,3,'排序','ordnum',3,0,0,'0','','','数字越大越靠前',0,1,0,3,0,'','','','','','',39,1,1,1),(58,3,'置顶','ontop',9,0,0,'0','否|0,是|1','','',0,1,0,3,0,'','','','','','',41,1,1,1),(59,3,'推荐','isnice',9,0,0,'0','否|0,是|1','','',0,1,0,3,0,'','','','','','',43,1,1,1),(60,3,'发布日期','createdate',2,0,0,'{php:now}','','','',0,1,0,3,0,'','','','','','',45,1,1,1),(61,3,'内容页模板','showskin',1,0,0,'','','','',0,1,0,3,0,'','','','','','',47,1,1,1),(62,3,'工作地点','work_address',1,50,0,'','','','',1,1,0,1,0,'','','','','','',3,1,1,0),(64,3,'学历要求','work_education',11,0,0,'不限','不限|不限,高中及以上|高中及以上,大专及以上|大专及以上,本科及以上|本科及以上,大专及以上|大专及以上','','',1,1,0,1,0,'','','','','','',7,1,1,0),(63,3,'工作性质','work_nature',11,0,0,'全职','全职|全职,兼职|兼职','','',1,1,0,1,0,'','','','','','',5,1,1,0),(65,3,'薪资待遇','work_money',11,0,0,'面议','面议|面议,2000-3000元/月|2000-3000元/月,3000-5000元/月|3000-5000元/月,5000-8000元/月|5000-8000元/月,8000-10000元/月|8000-10000元/月,10000-20000元/月|10000-20000元/月,20000-50000元/月|20000-50000元/月','','',1,1,0,1,0,'','','','','','',9,1,1,0),(66,3,'工作年限','work_age',11,0,0,'不限','不限|不限,1年及以上|1年及以上,2年及以上|2年及以上,3年及以上|3年及以上,4年及以上|4年及以上,5年及以上|5年及以上','','',1,1,0,1,0,'','','','','','',11,1,1,0),(67,3,'招聘人数','work_num',11,0,0,'若干','若干|若干,1|1,2|2,3|3,4|4,5|5,6|6,7|7,8|8,9|9,10|10','','',1,1,0,1,0,'','','','','','',13,1,1,0),(68,1,'购买价格','price',4,10,1,'0','','','单位：元',4,1,0,1,0,'','','','','','',10,0,1,0),(95,2,'产品规格','cpgg',1,0,0,'待填写','|','varchar(255) DEFAULT &#039;&#039;','',0,1,0,1,0,'','','','','','',1,1,0,0),(96,2,'幅面规格','fmgg',1,0,0,'待填写','|','varchar(255) DEFAULT &#039;&#039;','',0,1,0,1,0,'','','','','','',1,1,0,0),(97,2,'密度规格','mdgg',1,0,0,'待填写','|','varchar(255) DEFAULT &#039;&#039;','',0,1,0,1,0,'','','','','','',1,1,0,0),(98,2,'应用领域','myyyly',1,0,0,'待填写','|','varchar(255) DEFAULT &#039;&#039;','',0,1,0,1,0,'','','','','','',1,1,0,0),(99,2,'缩略图二','pictwo',5,255,1,'','|','varchar(255) DEFAULT &#039;&#039;','',0,1,0,1,0,'','','','','','',8,1,0,0),(100,5,'标题','title',1,255,0,'','','','',1,1,0,1,0,'','','','','','',1,1,1,1),(101,5,'组图','piclist',13,0,0,'','','','',0,1,0,1,0,'','','','','','',3,1,1,0),(102,5,'正文','content',12,0,0,'','','','',0,1,2,1,0,'','','','','','',5,1,1,0),(103,5,'简介','intro',8,0,0,'','','','',0,1,0,1,0,'','','','','','',7,1,1,1),(104,5,'缩略图','pic',5,255,1,'','|','','',0,1,0,1,0,'','','','','','',9,1,1,1),(105,5,'价格','price',4,10,1,'0','','','单位：元',4,1,0,1,0,'','','','','','',11,0,1,0),(106,5,'标签','tags',1,255,0,'','','','多个标签请使用英文逗号隔开，不能超过10个',0,1,0,1,0,'','','','','','',13,0,1,1),(107,5,'状态','islock',9,0,0,'1','立即发布|1,存为草稿|0','','',0,1,0,1,0,'','','','','','',15,1,1,1),(108,5,'优化标题','seotitle',1,255,0,'','','','',0,1,0,2,0,'','','','','','',17,0,1,1),(109,5,'关键字','seokey',8,0,0,'','','','',0,1,0,2,0,'','','','','','',19,0,1,1),(110,5,'描述','seodesc',8,0,0,'','','','',0,1,0,2,0,'','','','','','',21,0,1,1),(111,5,'别名','alias',1,50,0,'','','','',0,1,0,2,0,'','','','','','',23,0,1,1),(112,5,'外链','url',1,255,0,'','','','添加外链时，将不显示正文内容',0,1,0,3,0,'','','','','','',25,0,1,1),(113,5,'人气','hits',3,10,0,'0','','','',0,1,0,3,0,'','','','','','',27,0,1,1),(114,5,'赞数量','upnum',3,10,0,'0','','','',0,1,0,3,0,'','','','','','',29,0,1,1),(115,5,'踩数量','downnum',3,10,0,'0','','','',0,1,0,3,0,'','','','','','',31,0,1,1),(116,5,'排序','ordnum',3,10,0,'0','','','数字越大越靠前',0,1,0,3,0,'','','','','','',33,1,1,1),(117,5,'置顶','ontop',9,0,0,'0','否|0,是|1','','',0,1,0,3,0,'','','','','','',35,1,1,1),(118,5,'推荐','isnice',9,0,0,'0','否|0,是|1','','',0,1,0,3,0,'','','','','','',37,1,1,1),(119,5,'发布日期','createdate',2,0,0,'{php:now}','','','',0,1,0,3,0,'','','','','','',39,1,1,1),(120,5,'内容页模板','showskin',1,255,0,'','','','',0,1,0,3,0,'','','','','','',41,1,1,1);
/*!40000 ALTER TABLE `sd_model_field` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sd_model_job`
--

DROP TABLE IF EXISTS `sd_model_job`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
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
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sd_model_job`
--

LOCK TABLES `sd_model_job` WRITE;
/*!40000 ALTER TABLE `sd_model_job` DISABLE KEYS */;
/*!40000 ALTER TABLE `sd_model_job` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sd_model_news`
--

DROP TABLE IF EXISTS `sd_model_news`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `sd_model_news` (
  `newsid` int(10) NOT NULL AUTO_INCREMENT,
  `cid` int(10) DEFAULT '0',
  `price` decimal(10,2) DEFAULT '0.00',
  `content` mediumtext,
  PRIMARY KEY (`newsid`),
  UNIQUE KEY `cid` (`cid`)
) ENGINE=MyISAM AUTO_INCREMENT=38 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sd_model_news`
--

LOCK TABLES `sd_model_news` WRITE;
/*!40000 ALTER TABLE `sd_model_news` DISABLE KEYS */;
INSERT INTO `sd_model_news` VALUES (1,2,0.00,'<p>&nbsp;-&nbsp;采用国际最高环保标准ENF，甲醛释放量极低，几乎为零，适合儿童房、医院等对环保要求极高的场所。<br>&nbsp;-&nbsp;使用无醛胶粘剂，确保产品从源头到成品全程环保。<br></p>'),(24,29,0.00,'<p>与德国迪芬巴赫公司共同研发0SB生产线，流水线一次成型，确保从原木到成品的高效产出，实现了由传统劳动密集型生产工艺升级为自动化、数字化和清洁化的巨大转变。</p>'),(29,34,0.00,'<p>近日，公司组织全体员工前往[团建地点]开展了一次别开生面的团建活动。此次活动旨在增强团队凝聚力，提升员工之间的协作能力，同时让大家在繁忙的工作之余放松身心，享受大自然的美丽风光。参与活动的员工纷纷表示，此次团建不仅让大家在紧张的工作之余得到了放松，还增进了同事之间的感情，提升了团队的凝聚力和向心力。许多员工表示，通过这次活动，他们更加深刻地理解了团队合作的重要性，未来将以更加积极的态度投入到工作中。<br></p>\r\n<p style=\"text-align: center;\"><img src=\"/upfile/2025/03/1741851505169.jpg\" alt=\"1.jpg\"><br></p>'),(25,30,0.00,'<p>定向刨花结构特性增强了正侧面握钉力。解决了编木工板、普通创花板握钉力差的缺陷，保证了制作成品的尺寸精确虚和长期性使用。</p>'),(2,3,0.00,'<p>&nbsp; -&nbsp;从原材料采购到成品出厂，卢卡尔曼实行全程质量监控，确保每一块板材都符合高标准。<br>&nbsp; -&nbsp;定期进行环保性能测试，确保产品始终符合ENF级环保标准。<br></p>'),(27,32,0.00,'<p>生产过程中使用异氰酸酯(MDI)无醛胶粘剂。真正做到天然绿色无污染、无损身体健康，满足消费者对环保品质的追求。</p>\r\n<p>(呵护家人身体，尽享绿色生活)</p>'),(3,4,0.00,'<p>-&nbsp;卢卡尔曼与多家科研机构合作，开发无醛胶粘剂和环保生产工艺，减少对环境的影响。<br>-&nbsp;通过多项国际环保认证，如FSC（森林管理委员会）认证、CARB（加州空气资源委员会）认证等。<br></p>'),(28,33,0.00,'<p>在新西兰自建林厂，并与其他多个国家建立长，期合作关系，在确保木材质量的同时与供货渠道建立稳定发展关系。</p>'),(4,5,0.00,'<p>&nbsp; &nbsp;-&nbsp;卢卡尔曼引进国际领先的生产设备和技术，确保板材的均匀性和稳定性。<br>&nbsp;&nbsp;&nbsp;-&nbsp;采用高温高压工艺，增强板材的密度和强度。<br></p>'),(30,35,0.00,'<p>为进一步增强员工的消防安全意识，提高应对突发火灾事件的能力，在公司园区内组织了一场全员参与的消防安全演练。此次演练旨在通过模拟真实火灾场景，帮助员工掌握正确的逃生和灭火技能，确保在紧急情况下能够迅速、有效地应对。</p>\r\n<p><div style=\"text-align: center;\"><img src=\"/upfile/2025/03/1741851569444.png\" alt=\"2.png\"><br></div><br>演练内容：<br>消防知识培训：演练开始前，公司邀请了[消防部门或专业机构名称]的消防专家为全体员工进行了消防安全知识培训。培训内容包括火灾的常见原因、灭火器的正确使用方法、火灾发生时的逃生技巧以及如何报警等。通过生动的案例讲解，员工们对消防安全有了更深刻的认识。<br><br>模拟火灾场景：演练中，公司模拟了办公区域突发火灾的场景。随着警报声响起，全体员工迅速按照预定的逃生路线，有序撤离至安全区域。整个疏散过程井然有序，体现了员工们对消防逃生流程的熟练掌握。<br><br>灭火器实操演练：在安全区域，消防专家现场演示了灭火器的正确使用方法，并指导员工进行实操练习。员工们积极参与，轮流操作灭火器扑灭模拟火源，切实掌握了灭火技能。<br><br>应急救护演练：演练还模拟了火灾中人员受伤的场景，公司急救小组成员迅速行动，展示了如何对伤者进行初步救护，并等待专业救援人员的到来。这一环节进一步提升了员工的应急救护能力。<br></p>'),(9,12,0.00,'<p>握钉力强</p>'),(33,39,0.00,'<p class=\"MsoNormal\" style=\"text-indent: 24pt;\"><span style=\"mso-spacerun:&#039;yes&#039;;font-family:宋体;font-size:12.0000pt;mso-font-kerning:0.0000pt;\">18 个自然色系，从温润的原木肌理到低饱和的莫兰迪色调，无论是追求返璞归真的原木风家居，还是偏爱复古优雅的中古风空间，或是打造精致高级的轻奢氛围，都能精准匹配你的审美需求。每一块板材都自带细腻质感，让家的颜值瞬间升级。​</span><span style=\"mso-spacerun:&#039;yes&#039;;font-family:Calibri;mso-fareast-font-family:宋体;mso-bidi-font-family:&#039;Times New Roman&#039;;font-size:10.5000pt;mso-font-kerning:1.0000pt;\"></span></p>'),(10,13,0.00,'<p>结构稳定</p>'),(11,14,0.00,'<p>无醛添加</p>'),(12,15,0.00,'<p>健康无异味</p>'),(34,40,0.00,'<p class=\"MsoNormal\"><span style=\"mso-spacerun:&#039;yes&#039;;font-family:宋体;font-size:12.0000pt;mso-font-kerning:0.0000pt;\"><span style=\"font-family:宋体;\">特别添加艾草、金银花、板蓝根等天然中药成分。通过先进的超临界萃取技术提纯有效成分，再经独创的分子巢技术牢牢锁在板材内部，让抗菌功效从源头持续释放。</span></span></p>'),(13,17,0.00,'<p>产品特点详情产品特点详情产品特点详情产品特点详情产品特点详情产品特点详情产品特点详情产品特点详情产品特点详情产品特点详情产品特点详情产品特点详情产品特点详情产品特点详情产品特点详情产品特点详情产品特点详情产品特点详情产品特点详情产品特点详情产品特点详情。</p>'),(14,18,0.00,'<p>产品特点详情产品特点详情产品特点详情产品特点详情产品特点详情产品特点详情产品特点详情产品特点详情产品特点详情产品特点详情产品特点详情产品特点详情产品特点详情产品特点详情产品特点详情产品特点详情产品特点详情产品特点详情产品特点详情产品特点详情产品特点详情。</p>'),(15,19,0.00,'<p>产品特点详情产品特点详情产品特点详情产品特点详情产品特点详情产品特点详情产品特点详情产品特点详情产品特点详情产品特点详情产品特点详情产品特点详情产品特点详情产品特点详情产品特点详情产品特点详情产品特点详情产品特点详情产品特点详情产品特点详情产品特点详情。</p>'),(16,20,0.00,'<p>产品特点详情产品特点详情产品特点详情产品特点详情产品特点详情产品特点详情产品特点详情产品特点详情产品特点详情产品特点详情产品特点详情产品特点详情产品特点详情产品特点详情产品特点详情产品特点详情产品特点详情产品特点详情产品特点详情产品特点详情产品特点详情。</p>'),(32,37,0.00,'<p class=\"MsoNormal\" style=\"text-indent:28.1000pt;mso-char-indent-count:2.0000;\"><b><u><span style=\"font-family: 宋体; font-size: 14pt;\"><span style=\"font-family:宋体;\">企业简介</span></span></u></b><b><u><span style=\"font-family: 宋体; font-size: 14pt;\"></span></u></b></p><p class=\"MsoNormal\" style=\"text-indent:28.0000pt;mso-char-indent-count:2.0000;\"><span style=\"mso-spacerun:&#039;yes&#039;;font-family:宋体;mso-ascii-font-family:Calibri;mso-hansi-font-family:Calibri;mso-bidi-font-family:&#039;Times New Roman&#039;;font-size:14.0000pt;mso-font-kerning:1.0000pt;\"><span style=\"font-family:宋体;\">成都理想树商贸有限公司成立于</span><span style=\"font-family:Calibri;\">2021</span><span style=\"font-family:宋体;\">年，坐落于成都龙桥家具园区，是一家专注于中高端家具板材研发、生产、销售的</span></span><span style=\"mso-spacerun:&#039;yes&#039;;font-family:宋体;mso-ascii-font-family:Calibri;mso-hansi-font-family:Calibri;mso-bidi-font-family:&#039;Times New Roman&#039;;font-size:14.0000pt;mso-font-kerning:1.0000pt;\"><span style=\"font-family:宋体;\">企业</span></span><span style=\"mso-spacerun:&#039;yes&#039;;font-family:宋体;mso-ascii-font-family:Calibri;mso-hansi-font-family:Calibri;mso-bidi-font-family:&#039;Times New Roman&#039;;font-size:14.0000pt;mso-font-kerning:1.0000pt;\"><span style=\"font-family:宋体;\">。</span></span><span style=\"mso-spacerun:&#039;yes&#039;;font-family:宋体;mso-ascii-font-family:Calibri;mso-hansi-font-family:Calibri;mso-bidi-font-family:&#039;Times New Roman&#039;;font-size:14.0000pt;mso-font-kerning:1.0000pt;\"></span></p><p class=\"MsoNormal\" style=\"text-indent:28.1000pt;mso-char-indent-count:2.0000;\"><b><u><span style=\"font-family: 宋体; font-size: 14pt;\"><span style=\"font-family:宋体;\">企业文化</span></span></u></b><b><u><span style=\"font-family: Calibri; font-size: 14pt;\"></span></u></b></p><p class=\"MsoNormal\" style=\"text-indent:28.0000pt;mso-char-indent-count:2.0000;\"><span style=\"mso-spacerun:&#039;yes&#039;;font-family:宋体;mso-ascii-font-family:Calibri;mso-hansi-font-family:Calibri;mso-bidi-font-family:&#039;Times New Roman&#039;;font-size:14.0000pt;mso-font-kerning:1.0000pt;\"><span style=\"font-family:宋体;\">公司秉持</span><span style=\"font-family:宋体;\">“品质至上，诚信为本”的经营理念，打造了一支经验丰富、专业素养过硬的服务团队，能全程、全方位从售前、售中、售后为客户提供贴心、周到的服务。公司物流配送网络完善，覆盖全川，辐射全国。</span></span><span style=\"mso-spacerun:&#039;yes&#039;;font-family:宋体;mso-ascii-font-family:Calibri;mso-hansi-font-family:Calibri;mso-bidi-font-family:&#039;Times New Roman&#039;;font-size:14.0000pt;mso-font-kerning:1.0000pt;\"></span></p><p class=\"MsoNormal\" style=\"text-indent:28.1000pt;mso-char-indent-count:2.0000;\"><b><u><span style=\"font-family: 宋体; font-size: 14pt;\"><span style=\"font-family:宋体;\">产品系列</span></span></u></b><b><u><span style=\"font-family: 宋体; font-size: 14pt;\"></span></u></b></p><p class=\"MsoNormal\" style=\"text-indent:28.0000pt;mso-char-indent-count:2.0000;\"><span style=\"mso-spacerun:&#039;yes&#039;;font-family:宋体;mso-ascii-font-family:Calibri;mso-hansi-font-family:Calibri;mso-bidi-font-family:&#039;Times New Roman&#039;;font-size:14.0000pt;mso-font-kerning:1.0000pt;\"><span style=\"font-family:宋体;\">公司自创立以来，坚守</span><span style=\"font-family:宋体;\">“有爱有家有理想”的初心，围绕“爱”、“家”、“理想”等主题先后推出了</span><span style=\"font-family:Calibri;\">A</span><span style=\"font-family:宋体;\">、</span></span><span style=\"mso-spacerun:&#039;yes&#039;;font-family:Calibri;mso-fareast-font-family:宋体;mso-bidi-font-family:&#039;Times New Roman&#039;;font-size:14.0000pt;mso-font-kerning:1.0000pt;\">B</span><span style=\"mso-spacerun:&#039;yes&#039;;font-family:宋体;mso-ascii-font-family:Calibri;mso-hansi-font-family:Calibri;mso-bidi-font-family:&#039;Times New Roman&#039;;font-size:14.0000pt;mso-font-kerning:1.0000pt;\"><span style=\"font-family:宋体;\">、</span></span><span style=\"mso-spacerun:&#039;yes&#039;;font-family:Calibri;mso-fareast-font-family:宋体;mso-bidi-font-family:&#039;Times New Roman&#039;;font-size:14.0000pt;mso-font-kerning:1.0000pt;\">C</span><span style=\"mso-spacerun:&#039;yes&#039;;font-family:宋体;mso-ascii-font-family:Calibri;mso-hansi-font-family:Calibri;mso-bidi-font-family:&#039;Times New Roman&#039;;font-size:14.0000pt;mso-font-kerning:1.0000pt;\"><span style=\"font-family:宋体;\">、</span></span><span style=\"mso-spacerun:&#039;yes&#039;;font-family:Calibri;mso-fareast-font-family:宋体;mso-bidi-font-family:&#039;Times New Roman&#039;;font-size:14.0000pt;mso-font-kerning:1.0000pt;\">Z</span><span style=\"mso-spacerun:&#039;yes&#039;;font-family:宋体;mso-ascii-font-family:Calibri;mso-hansi-font-family:Calibri;mso-bidi-font-family:&#039;Times New Roman&#039;;font-size:14.0000pt;mso-font-kerning:1.0000pt;\"><span style=\"font-family:宋体;\">、</span></span><span style=\"mso-spacerun:&#039;yes&#039;;font-family:Calibri;mso-fareast-font-family:宋体;mso-bidi-font-family:&#039;Times New Roman&#039;;font-size:14.0000pt;mso-font-kerning:1.0000pt;\">S</span><span style=\"mso-spacerun:&#039;yes&#039;;font-family:宋体;mso-ascii-font-family:Calibri;mso-hansi-font-family:Calibri;mso-bidi-font-family:&#039;Times New Roman&#039;;font-size:14.0000pt;mso-font-kerning:1.0000pt;\"><span style=\"font-family:宋体;\">经典系列、</span></span><span style=\"mso-spacerun:&#039;yes&#039;;font-family:宋体;mso-ascii-font-family:Calibri;mso-hansi-font-family:Calibri;mso-bidi-font-family:&#039;Times New Roman&#039;;font-size:14.0000pt;mso-font-kerning:1.0000pt;\"><span style=\"font-family:宋体;\">卢卡尔曼尊享系列</span></span><span style=\"mso-spacerun:&#039;yes&#039;;font-family:宋体;mso-ascii-font-family:Calibri;mso-hansi-font-family:Calibri;mso-bidi-font-family:&#039;Times New Roman&#039;;font-size:14.0000pt;mso-font-kerning:1.0000pt;\"><span style=\"font-family:宋体;\">、实木指接板和门墙柜一体化配套材料</span></span><span style=\"mso-spacerun:&#039;yes&#039;;font-family:宋体;mso-ascii-font-family:Calibri;mso-hansi-font-family:Calibri;mso-bidi-font-family:&#039;Times New Roman&#039;;font-size:14.0000pt;mso-font-kerning:1.0000pt;\"><span style=\"font-family:宋体;\">等多个</span></span><span style=\"mso-spacerun:&#039;yes&#039;;font-family:宋体;mso-ascii-font-family:Calibri;mso-hansi-font-family:Calibri;mso-bidi-font-family:&#039;Times New Roman&#039;;font-size:14.0000pt;mso-font-kerning:1.0000pt;\"><span style=\"font-family:宋体;\">产品系列</span></span><span style=\"mso-spacerun:&#039;yes&#039;;font-family:宋体;mso-ascii-font-family:Calibri;mso-hansi-font-family:Calibri;mso-bidi-font-family:&#039;Times New Roman&#039;;font-size:14.0000pt;mso-font-kerning:1.0000pt;\"></span></p><p class=\"MsoNormal\" style=\"text-indent:28.0000pt;mso-char-indent-count:2.0000;\"><span style=\"mso-spacerun:&#039;yes&#039;;font-family:宋体;mso-ascii-font-family:Calibri;mso-hansi-font-family:Calibri;mso-bidi-font-family:&#039;Times New Roman&#039;;font-size:14.0000pt;mso-font-kerning:1.0000pt;\"><span style=\"font-family:宋体;\">产品</span></span><span style=\"mso-spacerun:&#039;yes&#039;;font-family:宋体;mso-ascii-font-family:Calibri;mso-hansi-font-family:Calibri;mso-bidi-font-family:&#039;Times New Roman&#039;;font-size:14.0000pt;mso-font-kerning:1.0000pt;\"><span style=\"font-family:宋体;\">涵盖了颗粒板、欧松板、多层实木板、</span><span style=\"font-family:Calibri;\">PET</span><span style=\"font-family:宋体;\">板，</span></span><span style=\"mso-spacerun:&#039;yes&#039;;font-family:Calibri;mso-fareast-font-family:宋体;mso-bidi-font-family:&#039;Times New Roman&#039;;font-size:14.0000pt;mso-font-kerning:1.0000pt;\">E0</span><span style=\"mso-spacerun:&#039;yes&#039;;font-family:宋体;mso-ascii-font-family:Calibri;mso-hansi-font-family:Calibri;mso-bidi-font-family:&#039;Times New Roman&#039;;font-size:14.0000pt;mso-font-kerning:1.0000pt;\"><span style=\"font-family:宋体;\">级到</span></span><span style=\"mso-spacerun:&#039;yes&#039;;font-family:Calibri;mso-fareast-font-family:宋体;mso-bidi-font-family:&#039;Times New Roman&#039;;font-size:14.0000pt;mso-font-kerning:1.0000pt;\">ENF</span><span style=\"mso-spacerun:&#039;yes&#039;;font-family:宋体;mso-ascii-font-family:Calibri;mso-hansi-font-family:Calibri;mso-bidi-font-family:&#039;Times New Roman&#039;;font-size:14.0000pt;mso-font-kerning:1.0000pt;\"><span style=\"font-family:宋体;\">级等不同环保等级的产品。</span></span><span style=\"mso-spacerun:&#039;yes&#039;;font-family:宋体;mso-ascii-font-family:Calibri;mso-hansi-font-family:Calibri;mso-bidi-font-family:&#039;Times New Roman&#039;;font-size:14.0000pt;mso-font-kerning:1.0000pt;\"></span></p><p class=\"MsoNormal\" style=\"text-indent:28.1000pt;mso-char-indent-count:2.0000;\"><b><u><span style=\"font-family: 宋体; font-size: 14pt;\"><span style=\"font-family:宋体;\">卢卡尔曼系列</span></span></u></b><b><u><span style=\"font-family: 宋体; font-size: 14pt;\"></span></u></b></p><p class=\"MsoNormal\" style=\"text-indent:28.0000pt;mso-char-indent-count:2.0000;\"><span style=\"mso-spacerun:&#039;yes&#039;;font-family:宋体;mso-ascii-font-family:Calibri;mso-hansi-font-family:Calibri;mso-bidi-font-family:&#039;Times New Roman&#039;;font-size:14.0000pt;mso-font-kerning:1.0000pt;\"><span style=\"font-family:宋体;\">卢卡尔曼系列的基材由成都理想树公司为该品牌专用定制，板材片状按照</span><span style=\"font-family:Calibri;\">LSB</span><span style=\"font-family:宋体;\">级别要求，高于普通颗粒板结构，环保等级高，同时拥有</span></span><span style=\"mso-spacerun:&#039;yes&#039;;font-family:Calibri;mso-fareast-font-family:宋体;mso-bidi-font-family:&#039;Times New Roman&#039;;font-size:14.0000pt;mso-font-kerning:1.0000pt;\">F4</span><span style=\"mso-spacerun:&#039;yes&#039;;font-family:宋体;mso-ascii-font-family:Calibri;mso-hansi-font-family:Calibri;mso-bidi-font-family:&#039;Times New Roman&#039;;font-size:14.0000pt;mso-font-kerning:1.0000pt;\"><span style=\"font-family:宋体;\">星及</span></span><span style=\"mso-spacerun:&#039;yes&#039;;font-family:Calibri;mso-fareast-font-family:宋体;mso-bidi-font-family:&#039;Times New Roman&#039;;font-size:14.0000pt;mso-font-kerning:1.0000pt;\">ENF</span><span style=\"mso-spacerun:&#039;yes&#039;;font-family:宋体;mso-ascii-font-family:Calibri;mso-hansi-font-family:Calibri;mso-bidi-font-family:&#039;Times New Roman&#039;;font-size:14.0000pt;mso-font-kerning:1.0000pt;\"><span style=\"font-family:宋体;\">双重认证，防水效果达到</span></span><span style=\"mso-spacerun:&#039;yes&#039;;font-family:Calibri;mso-fareast-font-family:宋体;mso-bidi-font-family:&#039;Times New Roman&#039;;font-size:14.0000pt;mso-font-kerning:1.0000pt;\">P8</span><span style=\"mso-spacerun:&#039;yes&#039;;font-family:宋体;mso-ascii-font-family:Calibri;mso-hansi-font-family:Calibri;mso-bidi-font-family:&#039;Times New Roman&#039;;font-size:14.0000pt;mso-font-kerning:1.0000pt;\"><span style=\"font-family:宋体;\">标准级别，防水防潮，降低了板材的变形度，对门，墙，柜的使用更有保障。</span> </span><span style=\"mso-spacerun:&#039;yes&#039;;font-family:宋体;mso-ascii-font-family:Calibri;mso-hansi-font-family:Calibri;mso-bidi-font-family:&#039;Times New Roman&#039;;font-size:14.0000pt;mso-font-kerning:1.0000pt;\"></span></p><p class=\"MsoNormal\" style=\"text-indent:28.0000pt;mso-char-indent-count:2.0000;\"><span style=\"mso-spacerun:&#039;yes&#039;;font-family:宋体;mso-ascii-font-family:Calibri;mso-hansi-font-family:Calibri;mso-bidi-font-family:&#039;Times New Roman&#039;;font-size:14.0000pt;mso-font-kerning:1.0000pt;\"><span style=\"font-family:宋体;\">作为理想树的明星产品，卢卡尔曼板面及封边条都有</span></span><span style=\"mso-spacerun:&#039;yes&#039;;font-family:Calibri;mso-fareast-font-family:宋体;mso-bidi-font-family:&#039;Times New Roman&#039;;font-size:14.0000pt;mso-font-kerning:1.0000pt;\">\"</span><span style=\"mso-spacerun:&#039;yes&#039;;font-family:宋体;mso-ascii-font-family:Calibri;mso-hansi-font-family:Calibri;mso-bidi-font-family:&#039;Times New Roman&#039;;font-size:14.0000pt;mso-font-kerning:1.0000pt;\"><span style=\"font-family:宋体;\">卢卡尔曼</span></span><span style=\"mso-spacerun:&#039;yes&#039;;font-family:Calibri;mso-fareast-font-family:宋体;mso-bidi-font-family:&#039;Times New Roman&#039;;font-size:14.0000pt;mso-font-kerning:1.0000pt;\">\"</span><span style=\"mso-spacerun:&#039;yes&#039;;font-family:宋体;mso-ascii-font-family:Calibri;mso-hansi-font-family:Calibri;mso-bidi-font-family:&#039;Times New Roman&#039;;font-size:14.0000pt;mso-font-kerning:1.0000pt;\"><span style=\"font-family:宋体;\">字样水印暗标，同时和拥有专业技术的厂家进行圆弧，门套线，及包覆的全方面合作，该品牌有：超平多层板，进口剥皮的橡胶木欧松板，防水无醛添加颗粒板，卢卡尔曼全套系列共拥有</span></span><span style=\"mso-spacerun:&#039;yes&#039;;font-family:Calibri;mso-fareast-font-family:宋体;mso-bidi-font-family:&#039;Times New Roman&#039;;font-size:14.0000pt;mso-font-kerning:1.0000pt;\">22</span><span style=\"mso-spacerun:&#039;yes&#039;;font-family:宋体;mso-ascii-font-family:Calibri;mso-hansi-font-family:Calibri;mso-bidi-font-family:&#039;Times New Roman&#039;;font-size:14.0000pt;mso-font-kerning:1.0000pt;\"><span style=\"font-family:宋体;\">个花色，搭配多套进口钢板压制而成</span></span><span style=\"mso-spacerun:&#039;yes&#039;;font-family:宋体;mso-ascii-font-family:Calibri;mso-hansi-font-family:Calibri;mso-bidi-font-family:&#039;Times New Roman&#039;;font-size:14.0000pt;mso-font-kerning:1.0000pt;\"><span style=\"font-family:宋体;\">，</span></span><span style=\"mso-spacerun:&#039;yes&#039;;font-family:宋体;mso-ascii-font-family:Calibri;mso-hansi-font-family:Calibri;mso-bidi-font-family:&#039;Times New Roman&#039;;font-size:14.0000pt;mso-font-kerning:1.0000pt;\"><span style=\"font-family:宋体;\">我们不追求品牌，只做品质。</span></span><span style=\"mso-spacerun:&#039;yes&#039;;font-family:Calibri;mso-fareast-font-family:宋体;mso-bidi-font-family:&#039;Times New Roman&#039;;font-size:14.0000pt;mso-font-kerning:1.0000pt;\"></span></p><p class=\"MsoNormal\" style=\"text-indent:28.1000pt;mso-char-indent-count:2.0000;\"><b><u><span style=\"font-family: Calibri; font-size: 14pt;\"><span style=\"font-family:宋体;\">经典系列</span></span></u></b><b><u><span style=\"font-family: Calibri; font-size: 14pt;\"></span></u></b></p><p class=\"MsoNormal\" style=\"text-indent:28.0000pt;mso-char-indent-count:2.0000;\"><span style=\"mso-spacerun:&#039;yes&#039;;font-family:宋体;mso-ascii-font-family:Calibri;mso-hansi-font-family:Calibri;mso-bidi-font-family:&#039;Times New Roman&#039;;font-size:14.0000pt;mso-font-kerning:1.0000pt;\"><span style=\"font-family:宋体;\">该类板材</span></span><span style=\"mso-spacerun:&#039;yes&#039;;font-family:宋体;mso-ascii-font-family:Calibri;mso-hansi-font-family:Calibri;mso-bidi-font-family:&#039;Times New Roman&#039;;font-size:14.0000pt;mso-font-kerning:1.0000pt;\"><span style=\"font-family:宋体;\">备</span></span><span style=\"mso-spacerun:&#039;yes&#039;;font-family:宋体;mso-ascii-font-family:Calibri;mso-hansi-font-family:Calibri;mso-bidi-font-family:&#039;Times New Roman&#039;;font-size:14.0000pt;mso-font-kerning:1.0000pt;\"><span style=\"font-family:宋体;\">有充足的存货以配合客户不同的需求，</span></span><span style=\"mso-spacerun:&#039;yes&#039;;font-family:宋体;mso-ascii-font-family:Calibri;mso-hansi-font-family:Calibri;mso-bidi-font-family:&#039;Times New Roman&#039;;font-size:14.0000pt;mso-font-kerning:1.0000pt;\"><span style=\"font-family:宋体;\">包含</span></span><span style=\"mso-spacerun:&#039;yes&#039;;font-family:宋体;mso-ascii-font-family:Calibri;mso-hansi-font-family:Calibri;mso-bidi-font-family:&#039;Times New Roman&#039;;font-size:14.0000pt;mso-font-kerning:1.0000pt;\"><span style=\"font-family:Calibri;\">A</span><span style=\"font-family:宋体;\">、</span></span><span style=\"mso-spacerun:&#039;yes&#039;;font-family:Calibri;mso-fareast-font-family:宋体;mso-bidi-font-family:&#039;Times New Roman&#039;;font-size:14.0000pt;mso-font-kerning:1.0000pt;\">B</span><span style=\"mso-spacerun:&#039;yes&#039;;font-family:宋体;mso-ascii-font-family:Calibri;mso-hansi-font-family:Calibri;mso-bidi-font-family:&#039;Times New Roman&#039;;font-size:14.0000pt;mso-font-kerning:1.0000pt;\"><span style=\"font-family:宋体;\">、</span></span><span style=\"mso-spacerun:&#039;yes&#039;;font-family:Calibri;mso-fareast-font-family:宋体;mso-bidi-font-family:&#039;Times New Roman&#039;;font-size:14.0000pt;mso-font-kerning:1.0000pt;\">C</span><span style=\"mso-spacerun:&#039;yes&#039;;font-family:宋体;mso-ascii-font-family:Calibri;mso-hansi-font-family:Calibri;mso-bidi-font-family:&#039;Times New Roman&#039;;font-size:14.0000pt;mso-font-kerning:1.0000pt;\"><span style=\"font-family:宋体;\">、</span></span><span style=\"mso-spacerun:&#039;yes&#039;;font-family:Calibri;mso-fareast-font-family:宋体;mso-bidi-font-family:&#039;Times New Roman&#039;;font-size:14.0000pt;mso-font-kerning:1.0000pt;\">Z</span><span style=\"mso-spacerun:&#039;yes&#039;;font-family:宋体;mso-ascii-font-family:Calibri;mso-hansi-font-family:Calibri;mso-bidi-font-family:&#039;Times New Roman&#039;;font-size:14.0000pt;mso-font-kerning:1.0000pt;\"><span style=\"font-family:宋体;\">、</span></span><span style=\"mso-spacerun:&#039;yes&#039;;font-family:Calibri;mso-fareast-font-family:宋体;mso-bidi-font-family:&#039;Times New Roman&#039;;font-size:14.0000pt;mso-font-kerning:1.0000pt;\">S</span><span style=\"mso-spacerun:&#039;yes&#039;;font-family:宋体;mso-ascii-font-family:Calibri;mso-hansi-font-family:Calibri;mso-bidi-font-family:&#039;Times New Roman&#039;;font-size:14.0000pt;mso-font-kerning:1.0000pt;\"><span style=\"font-family:宋体;\">等上百个不同花色，用以搭配各式钢板。</span></span><span style=\"mso-spacerun:&#039;yes&#039;;font-family:宋体;mso-ascii-font-family:Calibri;mso-hansi-font-family:Calibri;mso-bidi-font-family:&#039;Times New Roman&#039;;font-size:14.0000pt;mso-font-kerning:1.0000pt;\"><span style=\"font-family:宋体;\">主要包括以下材质</span></span><span style=\"mso-spacerun:&#039;yes&#039;;font-family:宋体;mso-ascii-font-family:Calibri;mso-hansi-font-family:Calibri;mso-bidi-font-family:&#039;Times New Roman&#039;;font-size:14.0000pt;mso-font-kerning:1.0000pt;\"><span style=\"font-family:宋体;\">：</span></span><span style=\"mso-spacerun:&#039;yes&#039;;font-family:宋体;mso-ascii-font-family:Calibri;mso-hansi-font-family:Calibri;mso-bidi-font-family:&#039;Times New Roman&#039;;font-size:14.0000pt;mso-font-kerning:1.0000pt;\"><span style=\"font-family:宋体;\">颗粒板、欧松板、多层实木板、</span><span style=\"font-family:Calibri;\">PET</span><span style=\"font-family:宋体;\">板、</span></span><span style=\"mso-spacerun:&#039;yes&#039;;font-family:宋体;mso-ascii-font-family:Calibri;mso-hansi-font-family:Calibri;mso-bidi-font-family:&#039;Times New Roman&#039;;font-size:14.0000pt;mso-font-kerning:1.0000pt;\"><span style=\"font-family:宋体;\">实木指接等等，满足客户不同的需求。经典系列，以简约大气的设计，打造永恒的家居风格</span></span><span style=\"mso-spacerun:&#039;yes&#039;;font-family:Calibri;mso-fareast-font-family:宋体;mso-bidi-font-family:&#039;Times New Roman&#039;;font-size:14.0000pt;mso-font-kerning:1.0000pt;\"><span style=\"font-family:宋体;\">。</span></span><span style=\"mso-spacerun:&#039;yes&#039;;font-family:Calibri;mso-fareast-font-family:宋体;mso-bidi-font-family:&#039;Times New Roman&#039;;font-size:14.0000pt;mso-font-kerning:1.0000pt;\"></span></p><p class=\"MsoNormal\" style=\"text-indent:28.1000pt;mso-char-indent-count:2.0000;\"><b><u><span style=\"font-family: Calibri; font-size: 14pt;\"><span style=\"font-family:宋体;\">实木系列</span></span></u></b><b><u><span style=\"font-family: Calibri; font-size: 14pt;\"></span></u></b></p><p class=\"p\" style=\"margin: 12pt 0pt 0pt; text-indent: 28pt; padding: 0pt; background: rgb(254, 254, 254);\"><span style=\"mso-spacerun:&#039;yes&#039;;font-family:宋体;mso-ascii-font-family:Calibri;mso-hansi-font-family:Calibri;mso-bidi-font-family:&#039;Times New Roman&#039;;font-size:14.0000pt;mso-font-kerning:1.0000pt;\"><span style=\"font-family:宋体;\">理想树精选</span><span style=\"font-family:Calibri;\">16</span><span style=\"font-family:宋体;\">个花色特别推出实木指接板系列，包含：泰国进口橡胶木指接板、新西兰松木指接板、尤加利桉木指接板、香杉实木指接板、俄罗斯桦木指接板，满足客户不同的装修需求。</span></span><span style=\"mso-spacerun:&#039;yes&#039;;font-family:Calibri;mso-fareast-font-family:宋体;mso-bidi-font-family:&#039;Times New Roman&#039;;font-size:14.0000pt;mso-font-kerning:1.0000pt;\"><span style=\"font-family:宋体;\">实木指接板采用</span></span><span style=\"mso-spacerun:&#039;yes&#039;;font-family:宋体;mso-ascii-font-family:Calibri;mso-hansi-font-family:Calibri;mso-bidi-font-family:&#039;Times New Roman&#039;;font-size:14.0000pt;mso-font-kerning:1.0000pt;\"><span style=\"font-family:宋体;\">先进的直接工艺，结构稳定，强度高，不易变形，</span></span><span style=\"mso-spacerun:&#039;yes&#039;;font-family:Calibri;mso-fareast-font-family:宋体;mso-bidi-font-family:&#039;Times New Roman&#039;;font-size:14.0000pt;mso-font-kerning:1.0000pt;\"><span style=\"font-family:宋体;\">环保健康，给您和家人一个安全的居住环境。</span></span><span style=\"mso-spacerun:&#039;yes&#039;;font-family:Calibri;mso-fareast-font-family:宋体;mso-bidi-font-family:&#039;Times New Roman&#039;;font-size:14.0000pt;mso-font-kerning:1.0000pt;\"></span></p><p class=\"MsoNormal\" style=\"text-indent:28.1000pt;mso-char-indent-count:2.0000;\"><b><u><span style=\"font-family: 宋体; font-size: 14pt;\"><span style=\"font-family:宋体;\">企业地址</span></span></u></b><b><u><span style=\"font-family: 宋体; font-size: 14pt;\"></span></u></b></p><p class=\"p\" style=\"margin: 12pt 0pt 0pt; text-indent: 0pt; padding: 0pt; background: rgb(254, 254, 254);\"><b><span style=\"font-family: Helvetica; color: rgb(81, 81, 81); letter-spacing: 0pt; font-size: 10.5pt; background-image: initial; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial;\"><span style=\"font-family:Helvetica;\">成都理想树商贸有限公司</span></span></b><b><span style=\"font-family: Helvetica; color: rgb(81, 81, 81); letter-spacing: 0pt; font-size: 10.5pt; background-image: initial; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial;\"></span></b></p><p class=\"p\" style=\"margin: 12pt 0pt 0pt; text-indent: 0pt; padding: 0pt; background: rgb(254, 254, 254);\"><b><span style=\"font-family: Helvetica; color: rgb(81, 81, 81); letter-spacing: 0pt; font-size: 10.5pt; background-image: initial; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial;\"><span style=\"font-family:Helvetica;\">地址：成都市新都区新繁金度路</span></span></b><b><span style=\"font-family: Helvetica; color: rgb(81, 81, 81); letter-spacing: 0pt; font-size: 10.5pt; background-image: initial; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial;\"></span></b></p>'),(31,36,0.00,'<p>为深入贯彻落实国家安全生产政策，提升企业安全管理水平，公司组织管理层及安全负责人参加了由新都区（香城）新消费活力区管委主办的安全生产专题培训。此次培训旨在帮助企业进一步强化安全生产意识，掌握最新的安全生产法规和操作规范，确保企业生产经营活动安全、有序进行。<br></p>\r\n<p style=\"text-align: center;\"><img src=\"/upfile/2025/03/1741851610420.jpg\" alt=\"3.jpg\"><br></p>'),(35,41,0.00,'<p class=\"MsoNormal\"><span style=\"mso-spacerun:&#039;yes&#039;;font-family:宋体;font-size:12.0000pt;mso-font-kerning:0.0000pt;\"><span style=\"font-family:宋体;\">模拟十年老化测试，板材的抗菌性能依旧稳定在线，真正做到长久守护。环保方面更是无可挑剔，达到</span>HENF 级环保标准。</span></p>'),(36,42,0.00,'<p class=\"MsoNormal\"><span style=\"mso-spacerun:&#039;yes&#039;;font-family:宋体;font-size:12.0000pt;mso-font-kerning:0.0000pt;\"><span style=\"font-family:宋体;\">每一块悦享系列抗菌板都拥有独一无二的溯源二维码，如同专属「身份证」，扫码即可查询生产信息，品质透明可追溯，买得更放心</span></span><span style=\"mso-spacerun:&#039;yes&#039;;font-family:宋体;font-size:12.0000pt;mso-font-kerning:0.0000pt;\"><span style=\"font-family:宋体;\">。</span></span></p>'),(37,43,0.00,'<p class=\"MsoNormal\" style=\"text-indent: 24pt;\"><span style=\"mso-spacerun:&#039;yes&#039;;font-family:宋体;font-size:12.0000pt;mso-font-kerning:0.0000pt;\"><span style=\"font-family:宋体;\">家里有老人孩子，总担心日常接触的家具藏着看不见的细菌病毒？装修选板材时，既想要颜值适配家居风格，又想兼顾环保健康？现在，你的这些顾虑终于有了完美答案！</span><span style=\"font-family:宋体;\">​</span></span><span style=\"mso-spacerun:&#039;yes&#039;;font-family:Calibri;mso-fareast-font-family:宋体;mso-bidi-font-family:&#039;Times New Roman&#039;;font-size:10.5000pt;mso-font-kerning:1.0000pt;\"></span></p><p class=\"MsoNormal\" style=\"text-indent: 24pt;\"><span style=\"mso-spacerun:&#039;yes&#039;;font-family:宋体;font-size:12.0000pt;mso-font-kerning:0.0000pt;\"><span style=\"font-family:宋体;\">理想树重磅携手中国十大板材品牌「莫干山」，带来全新</span></span><span style=\"mso-spacerun:&#039;yes&#039;;font-family:宋体;font-size:12.0000pt;mso-font-kerning:0.0000pt;\"><span style=\"font-family:宋体;\">产品</span></span><span style=\"mso-spacerun:&#039;yes&#039;;font-family:宋体;font-size:12.0000pt;mso-font-kerning:0.0000pt;\">&nbsp;<span style=\"font-family:宋体;\">——莫干山悦享系列植物源抗菌板！这不仅是一块能撑起家居颜值的装饰板，更是守护家人健康的隐形卫士。​</span></span><span style=\"mso-spacerun:&#039;yes&#039;;font-family:Calibri;mso-fareast-font-family:宋体;mso-bidi-font-family:&#039;Times New Roman&#039;;font-size:10.5000pt;mso-font-kerning:1.0000pt;\"></span></p><p class=\"MsoNormal\" style=\"text-indent: 22pt;\"><span style=\"mso-spacerun:&#039;yes&#039;;font-family:微软雅黑;font-size:11.0000pt;mso-font-kerning:0.0000pt;\"><span style=\"font-family:微软雅黑;\">18 种花色，承包你家的所有风格想象</span></span><span style=\"mso-spacerun:&#039;yes&#039;;font-family:宋体;font-size:11.0000pt;mso-font-kerning:0.0000pt;\"><span style=\"font-family:宋体;\">​</span></span><span style=\"mso-spacerun:&#039;yes&#039;;font-family:宋体;font-size:12.0000pt;mso-font-kerning:0.0000pt;\"></span></p><p class=\"MsoNormal\" style=\"text-indent: 24pt;\"><span style=\"mso-spacerun:&#039;yes&#039;;font-family:宋体;font-size:12.0000pt;mso-font-kerning:0.0000pt;\"><span style=\"font-family:宋体;\">装修风格总在原木风、中古风、轻奢风之间纠结？不必妥协！悦享系列一口气推出</span>18 个自然色系，从温润的原木肌理到低饱和的莫兰迪色调，无论是追求返璞归真的原木风家居，还是偏爱复古优雅的中古风空间，或是打造精致高级的轻奢氛围，都能精准匹配你的审美需求。每一块板材都自带细腻质感，让家的颜值瞬间升级。​</span><span style=\"mso-spacerun:&#039;yes&#039;;font-family:Calibri;mso-fareast-font-family:宋体;mso-bidi-font-family:&#039;Times New Roman&#039;;font-size:10.5000pt;mso-font-kerning:1.0000pt;\"></span></p><p class=\"MsoNormal\" style=\"text-indent: 22pt;\"><span style=\"mso-spacerun:&#039;yes&#039;;font-family:微软雅黑;font-size:11.0000pt;mso-font-kerning:0.0000pt;\"><span style=\"font-family:微软雅黑;\">中药加身，给细菌病毒「致命一击」</span></span><span style=\"mso-spacerun:&#039;yes&#039;;font-family:宋体;font-size:12.0000pt;mso-font-kerning:0.0000pt;\"><span style=\"font-family:宋体;\">​</span></span><span style=\"mso-spacerun:&#039;yes&#039;;font-family:Calibri;mso-fareast-font-family:宋体;mso-bidi-font-family:&#039;Times New Roman&#039;;font-size:10.5000pt;mso-font-kerning:1.0000pt;\"></span></p><p class=\"MsoNormal\" style=\"text-indent: 24pt;\"><span style=\"mso-spacerun:&#039;yes&#039;;font-family:宋体;font-size:12.0000pt;mso-font-kerning:0.0000pt;\"><span style=\"font-family:宋体;\">不同于普通板材，这款抗菌板藏着一份「东方智慧」</span><span style=\"font-family:宋体;\">—— 特别添加艾草、金银花、板蓝根等天然中药成分。通过先进的超临界萃取技术提纯有效成分，再经独创的分子巢技术牢牢锁在板材内部，让抗菌功效从源头持续释放。权威检测数据显示，它对甲型流感病毒（H3N2）、肠道病毒（EV71）的灭活率高达≥99%，相当于给家具装上了长效抗菌屏障，宝宝</span></span><span style=\"mso-spacerun:&#039;yes&#039;;font-family:宋体;font-size:12.0000pt;mso-font-kerning:0.0000pt;\"><span style=\"font-family:宋体;\">、</span></span><span style=\"mso-spacerun:&#039;yes&#039;;font-family:宋体;font-size:12.0000pt;mso-font-kerning:0.0000pt;\"><span style=\"font-family:宋体;\">老人日常接触都更安心。</span><span style=\"font-family:宋体;\">​</span></span><span style=\"mso-spacerun:&#039;yes&#039;;font-family:宋体;font-size:12.0000pt;mso-font-kerning:0.0000pt;\"></span></p><p class=\"MsoNormal\" style=\"text-indent: 22pt;\"><span style=\"mso-spacerun:&#039;yes&#039;;font-family:微软雅黑;font-size:11.0000pt;mso-font-kerning:0.0000pt;\"><span style=\"font-family:微软雅黑;\">十年如新，环保等级拉满</span></span><span style=\"mso-spacerun:&#039;yes&#039;;font-family:宋体;font-size:11.0000pt;mso-font-kerning:0.0000pt;\"><span style=\"font-family:宋体;\">​</span></span><span style=\"mso-spacerun:&#039;yes&#039;;font-family:宋体;font-size:11.0000pt;mso-font-kerning:0.0000pt;\"></span></p><p class=\"MsoNormal\" style=\"text-indent: 24pt;\"><span style=\"mso-spacerun:&#039;yes&#039;;font-family:宋体;font-size:12.0000pt;mso-font-kerning:0.0000pt;\"><span style=\"font-family:宋体;\">担心抗菌效果昙花一现？实验数据给出定心丸：经过模拟十年老化测试，板材的抗菌性能依旧稳定在线，真正做到长久守护。环保方面更是无可挑剔，达到</span>HENF 级环保标准（无醛添加最高等级），从生产源头拒绝甲醛等有害物质释放，装修完无需长时间通风，即刻入住也能呼吸清新空气。​</span><span style=\"mso-spacerun:&#039;yes&#039;;font-family:宋体;font-size:12.0000pt;mso-font-kerning:0.0000pt;\"></span></p><p class=\"MsoNormal\" style=\"text-indent: 22pt;\"><span style=\"mso-spacerun:&#039;yes&#039;;font-family:微软雅黑;font-size:11.0000pt;mso-font-kerning:0.0000pt;\"><span style=\"font-family:微软雅黑;\">专属「身份证」，扫码解锁更多</span></span><span style=\"mso-spacerun:&#039;yes&#039;;font-family:宋体;font-size:12.0000pt;mso-font-kerning:0.0000pt;\"><span style=\"font-family:宋体;\">​</span></span><span style=\"mso-spacerun:&#039;yes&#039;;font-family:宋体;font-size:12.0000pt;mso-font-kerning:0.0000pt;\"></span></p><p class=\"MsoNormal\" style=\"text-indent: 24pt;\"><span style=\"mso-spacerun:&#039;yes&#039;;font-family:宋体;font-size:12.0000pt;mso-font-kerning:0.0000pt;\"><span style=\"font-family:宋体;\">每一块悦享系列抗菌板都拥有独一无二的溯源二维码，如同专属「身份证」，扫码即可查询生产信息，品质透明可追溯，买得更放心</span></span><span style=\"mso-spacerun:&#039;yes&#039;;font-family:宋体;font-size:12.0000pt;mso-font-kerning:0.0000pt;\"><span style=\"font-family:宋体;\">。</span></span><span style=\"mso-spacerun:&#039;yes&#039;;font-family:宋体;font-size:12.0000pt;mso-font-kerning:0.0000pt;\"><span style=\"font-family:宋体;\">还在纠结颜色搭配？只需扫描板材小样上的二维码，就能一键查看不同花色在各种家居场景中的效果预览，轻松找到最适合你家的风格方案。</span><span style=\"font-family:宋体;\">​</span></span><span style=\"mso-spacerun:&#039;yes&#039;;font-family:宋体;font-size:12.0000pt;mso-font-kerning:0.0000pt;\"></span></p><p class=\"MsoNormal\" style=\"text-indent: 24pt;\"><span style=\"mso-spacerun:&#039;yes&#039;;font-family:宋体;font-size:12.0000pt;mso-font-kerning:0.0000pt;\"></span></p><p class=\"MsoNormal\" style=\"text-indent: 24pt;\"><span style=\"mso-spacerun:&#039;yes&#039;;font-family:宋体;font-size:12.0000pt;mso-font-kerning:0.0000pt;\"><span style=\"font-family:宋体;\">家，是最需要安全感的地方。选择莫干山悦享系列植物源抗菌板，让天然中药成分守护家人健康，让高环保标准筑牢居家防线，更让多样花色装点生活美学。</span><span style=\"font-family:宋体;\">​</span></span><span style=\"mso-spacerun:&#039;yes&#039;;font-family:宋体;font-size:12.0000pt;mso-font-kerning:0.0000pt;\">&nbsp;&nbsp;</span><span style=\"mso-spacerun:&#039;yes&#039;;font-family:宋体;font-size:12.0000pt;mso-font-kerning:0.0000pt;\"><span style=\"font-family:宋体;\">现在起，前往理想树线下门店或线上旗舰店，即可解锁你的健康家居新选择，给家人一份看得见的安心守护～</span><span style=\"font-family:宋体;\">​</span></span><span style=\"mso-spacerun:&#039;yes&#039;;font-family:宋体;font-size:12.0000pt;mso-font-kerning:0.0000pt;\"></span></p>');
/*!40000 ALTER TABLE `sd_model_news` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sd_model_page`
--

DROP TABLE IF EXISTS `sd_model_page`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `sd_model_page` (
  `pageid` int(10) NOT NULL AUTO_INCREMENT,
  `cid` int(10) DEFAULT '0',
  `piclist` text,
  `content` mediumtext,
  PRIMARY KEY (`pageid`),
  UNIQUE KEY `cid` (`cid`)
) ENGINE=MyISAM AUTO_INCREMENT=18 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sd_model_page`
--

LOCK TABLES `sd_model_page` WRITE;
/*!40000 ALTER TABLE `sd_model_page` DISABLE KEYS */;
INSERT INTO `sd_model_page` VALUES (1,7,'\"\"','<span style=\"font-size: x-large;\"><span style=\"font-family:宋体;text-indent: 28pt;text-indent: 28pt;\">成都理想树商贸有限公司成立于</span><span style=\"font-family:Calibri;text-indent: 28pt;text-indent: 28pt;\">2021</span><span style=\"font-family:宋体;text-indent: 28pt;text-indent: 28pt;\">年，坐落于成都龙桥家具园区，是一家专注于中高端家具板材研发、生产、销售的行业翘楚。</span></span><div><span style=\"font-size: x-large;\"><span style=\"font-family: 宋体;\"><span style=\"font-family:宋体;\">公司自创立以来，坚守</span><span style=\"font-family:宋体;\">“有爱有家有理想”的初心，围绕“爱”、“家”、“理想”等主题先后推出了</span><span style=\"font-family:Calibri;\">A</span><span style=\"font-family:宋体;\">、</span><span style=\"font-family:Calibri;\">B</span><span style=\"font-family:宋体;\">、</span><span style=\"font-family:Calibri;\">C</span><span style=\"font-family:宋体;\">、</span><span style=\"font-family:Calibri;\">Z</span><span style=\"font-family:宋体;\">、</span><span style=\"font-family:Calibri;\">S</span><span style=\"font-family:宋体;\">等多个广受市场好评系列，近期又精心研发了卢卡尔曼尊享系列，涵盖了颗粒板、欧松板、多层实木板、</span><span style=\"font-family:Calibri;\">PET</span><span style=\"font-family:宋体;\">板、禾香板等不同材质，</span><span style=\"font-family:Calibri;\">E0</span><span style=\"font-family:宋体;\">级到</span><span style=\"font-family:Calibri;\">ENF</span><span style=\"font-family:宋体;\">级等不同环保等级的产品。公司同时与万华、鲁丽等多家知名板材供应商建立了长期稳定的合作关系，引入优质丰富多样的板材品类，全方位满足家具制造企业、装修公司以及零售客户的多元需求。</span></span><span style=\"font-family: 宋体;\"></span></span><span style=\"font-size: x-large;\"><span style=\"font-family: 宋体;\"><span style=\"font-family:宋体;\">公司秉持</span><span style=\"font-family:宋体;\">“品质至上，诚信为本”的经营理念，打造了一支经验丰富、专业素养过硬的服务团队，能全程、全方位从售前、售中、售后为客户提供贴心、周到的服务。公司物流配送网络完善，覆盖全川，辐射全国，确保产品能高效、及时地送达客户手中。</span></span><span style=\"font-family: 宋体;\"></span></span><p></p><p class=\"MsoNormal\"><span style=\"font-family: 宋体; font-size: x-large;\"><span style=\"font-family:宋体;\">多年来，凭借对品质的坚守和对服务的执着，公司赢得了众多合作伙伴的信赖与支持，业务范围不断拓展，市场份额稳步提升。未来公司将继续砥砺前行，深耕家具板材行业，提供更多更优质的产品和更完善的服务，为推动行业的发展贡献力量。</span></span><span style=\"mso-spacerun:&#039;yes&#039;;font-family:Calibri;mso-fareast-font-family:宋体;mso-bidi-font-family:&#039;Times New Roman&#039;;font-size:14.0000pt;mso-font-kerning:1.0000pt;\"></span></p></div>'),(2,10,'\"\"','<p class=\"MsoNormal\"><span style=\"font-family: 宋体; font-size: x-large;\"><span style=\"font-family: 宋体;\">卢卡尔曼系列的基材由成都理想树公司为该品牌专用定制，板材片状按照</span><span style=\"font-family: Calibri;\">LSB</span><span style=\"font-family: 宋体;\">级别要求，高于普通颗粒板结构，环保等级高，同时拥有</span><span style=\"font-family: Calibri;\">F4</span><span style=\"font-family: 宋体;\">星及</span><span style=\"font-family: Calibri;\">ENF</span><span style=\"font-family: 宋体;\">双重认证，特别是防水效果达到</span><span style=\"font-family: Calibri;\">P8</span><span style=\"font-family: 宋体;\">标准级别，防水防潮在家具板材行业有绝对的保证，大大降低了板材的变形度，对门，墙，柜的使用更有保障。 作为理想树的明星产品，卢卡尔曼板面及封边条都有</span><span style=\"font-family: Calibri;\">\"</span><span style=\"font-family: 宋体;\">卢卡尔曼</span><span style=\"font-family: Calibri;\">\"</span><span style=\"font-family: 宋体;\">字样水印暗标，更加体现出了该板材的高级感，同时和拥有专业技术的厂家进行圆弧，门套线，及包覆的全方面合作，让您更省心！该品牌全现货供应，有：超平多层板，进口剥皮的橡胶木欧松板，防水无醛添加颗粒板，卢卡尔曼全套系列共拥有</span><span style=\"font-family: Calibri;\">22</span><span style=\"font-family: 宋体;\">个花色，搭配多套进口钢板压制而成，让您的家更加独特、舒心！</span></span><span style=\"mso-spacerun:&#039;yes&#039;;font-family:宋体;mso-ascii-font-family:Calibri;mso-hansi-font-family:Calibri;mso-bidi-font-family:&#039;Times New Roman&#039;;font-size:10.5000pt;mso-font-kerning:1.0000pt;\"></span></p>'),(5,33,'\"\"','<p style=\"margin-bottom: 36px; padding: 0px; outline: 0px; line-height: 2; color: rgb(81, 81, 81); font-size: 22px; font-family: tahoma, Arial, Helvetica, 微软雅黑, 华文细黑, sans-serif; background-color: rgb(254, 254, 254);\">装修选板材，为什么90%的业主首选理想树经典系列？——因为真正的好板材，经得起时间考验！无论是现代简约客厅、北欧风卧室，还是轻奢厨柜，理想树经典系列都能一键匹配，省心省力省预算！<br></p>'),(14,48,'\"\"','<p class=\"MsoNormal\" style=\"text-indent: 24pt;\"><span style=\"font-family: 微软雅黑; font-size: x-large; color: rgb(136, 136, 136);\">家里有老人孩子，总担心日常接触的家具藏着看不见的细菌病毒？装修选板材时，既想要颜值适配家居风格，又想兼顾环保健康？现在，你的这些顾虑终于有了完美答案！​</span></p><p class=\"MsoNormal\" style=\"text-indent: 24pt;\"><span style=\"font-size: x-large; color: rgb(136, 136, 136);\"><span style=\"font-family: 微软雅黑;\">理想树重磅携手中国十大板材品牌「莫干山」，带来全新产品</span><span style=\"font-family: 微软雅黑;\">&nbsp;——莫干山悦享系列植物源抗菌板！这不仅是一块能撑起家居颜值的装饰板，更是守护家人健康的隐形卫士。</span></span><span style=\"font-size: 12pt; font-family: 宋体;\">​</span><span style=\"mso-spacerun:&#039;yes&#039;;font-family:Calibri;mso-fareast-font-family:宋体;mso-bidi-font-family:&#039;Times New Roman&#039;;font-size:10.5000pt;mso-font-kerning:1.0000pt;\"></span></p>'),(8,37,'\"\"','<p><span style=\"color: rgb(81, 81, 81); font-family: tahoma, Arial, Helvetica, 微软雅黑, 华文细黑, sans-serif; font-size: 22px; background-color: rgb(254, 254, 254);\">立足于科学严谨、精益求精的工业生产工艺，结合“善用资源，服务建设”的理念，发挥二十余年进口高端人造板的经验，为全球客户提供质量稳定、品质上乘的木质材料与产品。始终寻求高效、科学地使用天然的木材资源，在整个产业链的发展过程中，致力于推动环境可持续发展，积极承担社会责任，并被客户、员工和社会高度认可。</span><br></p>'),(10,6,'\"\"','<span style=\"font-family: arial; font-size: x-large; font-weight: bold;\">成都理想树商贸有限公司</span><div><span style=\"font-family: arial; font-size: large;\">\r\n联系人： 陈先生</span></div><div><span style=\"font-family: arial; font-size: large;\">联系电话：</span><span style=\"font-size: small; font-family: arial;\">&nbsp;</span><span style=\"font-size: medium;\"><span style=\"font-family: Helvetica, &quot;Pingfang SC&quot;, &quot;Microsoft YaHei&quot;, STHeiti, Verdana, Arial, Tahoma, sans-serif; margin: 0px; padding: 0px; outline: 0px; line-height: 16px; color: rgb(51, 51, 51); display: inline !important;\">1</span><span style=\"font-family: Helvetica, &quot;Pingfang SC&quot;, &quot;Microsoft YaHei&quot;, STHeiti, Verdana, Arial, Tahoma, sans-serif; margin: 0px; padding: 0px; outline: 0px; line-height: 16px; color: rgb(51, 51, 51); display: inline !important;\">9150249019</span></span></div><div><span style=\"font-family: arial; font-size: large;\">公司地址：成都市新都区新繁金度路</span></div>'),(11,21,'{\"2\":{\"image\":\"/upfile/2025/12/1764657616592.jpg\",\"desc\":\"\"},\"1\":{\"image\":\"/upfile/2025/03/1741942930563.jpg\",\"desc\":\"\"},\"3\":{\"image\":\"/upfile/2025/12/1764657625274.jpg\",\"desc\":\"\"},\"4\":{\"image\":\"/upfile/2025/12/1764657631517.jpg\",\"desc\":\"\"},\"5\":{\"image\":\"/upfile/2025/12/1764657642850.jpg\",\"desc\":\"\"},\"6\":{\"image\":\"/upfile/2025/12/1764657649676.jpg\",\"desc\":\"\"}}',''),(12,42,'\"\"','<p>匠心未变，创新不止。鲁丽木业研制出可直接贴面的零甲醛添加定向结构板引发国内人造板行业的结构升级与产品革命:重视绿色发展理念，为消费者缔造安全、健康、环保的居室环境，致力于提升现代家居生活健康品质，引领绿色环保建材新潮流。</p>'),(13,8,'\"\"','<p><img src=\"/upfile/2025/03/1741941248392.jpg\" alt=\"n1_副本.jpg\"><br></p>'),(15,46,'{\"9\":{\"image\":\"/upfile/2025/12/1764831874215.jpg\",\"desc\":\"V8001-美川胡桃\"},\"10\":{\"image\":\"/upfile/2025/12/1764831875443.jpg\",\"desc\":\"V8002-欧帝胡桃\"},\"11\":{\"image\":\"/upfile/2025/12/1764831874354.jpg\",\"desc\":\"V8003-半衫刀木\"},\"12\":{\"image\":\"/upfile/2025/12/1764831875899.jpg\",\"desc\":\"V8004-北美胡桃\"},\"13\":{\"image\":\"/upfile/2025/12/1764831875538.jpg\",\"desc\":\"V8005-欧莱雅胡桃\"},\"14\":{\"image\":\"/upfile/2025/12/1764831876157.jpg\",\"desc\":\"V8006-铭熙榆木\"},\"15\":{\"image\":\"/upfile/2025/12/1764831876869.jpg\",\"desc\":\"V8007-半衫铁木\"},\"16\":{\"image\":\"/upfile/2025/12/1764831876818.jpg\",\"desc\":\"V8008-烟熏橡木\"},\"17\":{\"image\":\"/upfile/2025/12/1764831876118.jpg\",\"desc\":\"V8009-艾格橡木\"},\"18\":{\"image\":\"/upfile/2025/12/1764831875772.jpg\",\"desc\":\"V8010-幻影木\"},\"19\":{\"image\":\"/upfile/2025/12/1764831877326.jpg\",\"desc\":\"V8011-千丝木\"},\"20\":{\"image\":\"/upfile/2025/12/1764831877571.jpg\",\"desc\":\"V8012-理想榆木\"},\"21\":{\"image\":\"/upfile/2025/12/1764831877174.jpg\",\"desc\":\"V8013-百达翡翠\"},\"22\":{\"image\":\"/upfile/2025/12/1764831877692.jpg\",\"desc\":\"V8014-范思哲\"},\"1\":{\"image\":\"/upfile/2025/12/1764658783453.jpg\",\"desc\":\"V8015-珍珠白\"},\"2\":{\"image\":\"/upfile/2025/12/1764658783556.jpg\",\"desc\":\"V8016-温暖白\"},\"3\":{\"image\":\"/upfile/2025/12/1764658783386.jpg\",\"desc\":\"V8017-风雅灰\"},\"4\":{\"image\":\"/upfile/2025/12/1764658784669.jpg\",\"desc\":\"V8018-奶油白\"},\"5\":{\"image\":\"/upfile/2025/12/1764658783133.jpg\",\"desc\":\"V8019-浅墨灰\"},\"6\":{\"image\":\"/upfile/2025/12/1764658783982.jpg\",\"desc\":\"V8020-玛瑙灰\"},\"7\":{\"image\":\"/upfile/2025/12/1764658783977.jpg\",\"desc\":\"V8021-烟雨灰\"},\"8\":{\"image\":\"/upfile/2025/12/1764658784943.jpg\",\"desc\":\"V8022-明月灰\"}}',''),(16,52,'{\"1\":{\"image\":\"/upfile/2025/12/1764658102609.jpg\",\"desc\":\"21-B-015\"},\"2\":{\"image\":\"/upfile/2025/12/1764658114455.jpg\",\"desc\":\"22-S-1005\"},\"3\":{\"image\":\"/upfile/2025/12/1764658115561.jpg\",\"desc\":\"23-B-006\"},\"4\":{\"image\":\"/upfile/2025/12/1764658114242.jpg\",\"desc\":\"24-S-1006\"},\"5\":{\"image\":\"/upfile/2025/12/1764658114458.jpg\",\"desc\":\"25-S-1002\"},\"6\":{\"image\":\"/upfile/2025/12/1764658114244.jpg\",\"desc\":\"26-S-1003\"},\"7\":{\"image\":\"/upfile/2025/12/1764658114447.jpg\",\"desc\":\"28-B-017\"},\"8\":{\"image\":\"/upfile/2025/12/1764658114939.jpg\",\"desc\":\"29-B-013\"}}',''),(17,53,'{\"1\":{\"image\":\"/upfile/2025/12/1764733355470.jpg\",\"desc\":\"\"},\"2\":{\"image\":\"/upfile/2025/12/1764733355303.jpg\",\"desc\":\"\"},\"3\":{\"image\":\"/upfile/2025/12/1764733355960.jpg\",\"desc\":\"\"},\"4\":{\"image\":\"/upfile/2025/12/1764733355906.jpg\",\"desc\":\"\"},\"5\":{\"image\":\"/upfile/2025/12/1764733356984.jpg\",\"desc\":\"\"},\"6\":{\"image\":\"/upfile/2025/12/1764733356796.jpg\",\"desc\":\"\"},\"7\":{\"image\":\"/upfile/2025/12/1764733356595.jpg\",\"desc\":\"\"},\"8\":{\"image\":\"/upfile/2025/12/1764733356342.jpg\",\"desc\":\"\"},\"9\":{\"image\":\"/upfile/2025/12/1764733357570.jpg\",\"desc\":\"\"},\"10\":{\"image\":\"/upfile/2025/12/1764733357862.jpg\",\"desc\":\"\"}}','');
/*!40000 ALTER TABLE `sd_model_page` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sd_model_pro`
--

DROP TABLE IF EXISTS `sd_model_pro`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `sd_model_pro` (
  `proid` int(10) NOT NULL AUTO_INCREMENT,
  `cid` int(10) DEFAULT '0',
  `price` decimal(10,2) DEFAULT '0.00',
  `content` mediumtext,
  `piclist` text,
  `cpgg` varchar(255) DEFAULT '',
  `fmgg` varchar(255) DEFAULT '',
  `mdgg` varchar(255) DEFAULT '',
  `myyyly` varchar(255) DEFAULT '',
  `pictwo` varchar(255) DEFAULT '',
  PRIMARY KEY (`proid`),
  UNIQUE KEY `cid` (`cid`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sd_model_pro`
--

LOCK TABLES `sd_model_pro` WRITE;
/*!40000 ALTER TABLE `sd_model_pro` DISABLE KEYS */;
INSERT INTO `sd_model_pro` VALUES (1,1,0.00,NULL,NULL,'(2440*1220*18)mm/(500*500)mm','待填写','0.69（g/cm³）','采用国际最高环保标准ENF，甲醛释放量极低，几乎为零，适合儿童房、医院等对环保要求极高的场所',''),(3,11,0.00,NULL,NULL,'待填写','待填写','待填写','待填写','/upfile/2025/05/1747289086262.png'),(4,16,0.00,NULL,NULL,'待填写','待填写','待填写','待填写',''),(5,27,0.00,NULL,NULL,'1220mm*2440mm*9、12、15、18、22、25mm;1220mm*2745mm*9、12、15、18、22、25mm','待填写','待填写','主要用于木结构房的内墙、隔热板、天花板，普通家具及室内裴饰装修基板，木门和沙发龙骨用板',''),(6,38,0.00,NULL,NULL,'2440×1220×18(mm)HENF级','待定','抗菌率&gt;99%','各种家居场景','/upfile/2025/09/1756715445346.jpg');
/*!40000 ALTER TABLE `sd_model_pro` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sd_onlinepay`
--

DROP TABLE IF EXISTS `sd_onlinepay`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
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
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sd_onlinepay`
--

LOCK TABLES `sd_onlinepay` WRITE;
/*!40000 ALTER TABLE `sd_onlinepay` DISABLE KEYS */;
/*!40000 ALTER TABLE `sd_onlinepay` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sd_order`
--

DROP TABLE IF EXISTS `sd_order`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
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
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sd_order`
--

LOCK TABLES `sd_order` WRITE;
/*!40000 ALTER TABLE `sd_order` DISABLE KEYS */;
/*!40000 ALTER TABLE `sd_order` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sd_order_buy`
--

DROP TABLE IF EXISTS `sd_order_buy`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
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
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sd_order_buy`
--

LOCK TABLES `sd_order_buy` WRITE;
/*!40000 ALTER TABLE `sd_order_buy` DISABLE KEYS */;
/*!40000 ALTER TABLE `sd_order_buy` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sd_sitelink`
--

DROP TABLE IF EXISTS `sd_sitelink`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
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
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sd_sitelink`
--

LOCK TABLES `sd_sitelink` WRITE;
/*!40000 ALTER TABLE `sd_sitelink` DISABLE KEYS */;
/*!40000 ALTER TABLE `sd_sitelink` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sd_tags`
--

DROP TABLE IF EXISTS `sd_tags`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `sd_tags` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `title` varchar(50) DEFAULT '',
  `hits` int(10) DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `id` (`id`),
  KEY `title` (`title`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sd_tags`
--

LOCK TABLES `sd_tags` WRITE;
/*!40000 ALTER TABLE `sd_tags` DISABLE KEYS */;
INSERT INTO `sd_tags` VALUES (1,'莫干山板材',1),(2,'抗菌板',1),(3,'莫干山抗菌板',1);
/*!40000 ALTER TABLE `sd_tags` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sd_temp_mail`
--

DROP TABLE IF EXISTS `sd_temp_mail`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
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
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sd_temp_mail`
--

LOCK TABLES `sd_temp_mail` WRITE;
/*!40000 ALTER TABLE `sd_temp_mail` DISABLE KEYS */;
INSERT INTO `sd_temp_mail` VALUES (1,'留言提醒','有一条新的留言需要处理','<p>姓　名：$name<br/>手　机：$mobile<br/>电　话：$tel<br/>内　容：$remark</p>',1,'book'),(2,'询价提醒','有一条新的询价需要处理','<p>产　品：$proname<br/>姓　名：$name<br/>手　机：$mobile<br/>备　注：$remark</p>',1,'inquiry'),(3,'订单提醒','有一条新的订单需要处理','<p>订单号：$orderid<br/>产　品：$proname<br/>数　量：$num<br/>金　额：$money<br/>姓　名：$name<br/>手　机：$mobile<br/>地　址：$address<br/>备　注：$remark</p>',1,'order'),(4,'用户注册','账号注册邮箱验证','<p>您正在进行【注册账户】邮箱验证：<br/>您的验证码是：$code<br/>如本邮件非您操作响应，请忽略。</p>',1,'reg'),(5,'找回密码','账户找回密码邮箱验证','<p>您正在进行【找回密码】邮箱验证：<br/>您的验证码是：$code<br/>如本邮件非您操作响应，请忽略。</p>',1,'getpass');
/*!40000 ALTER TABLE `sd_temp_mail` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sd_user`
--

DROP TABLE IF EXISTS `sd_user`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
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
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sd_user`
--

LOCK TABLES `sd_user` WRITE;
/*!40000 ALTER TABLE `sd_user` DISABLE KEYS */;
/*!40000 ALTER TABLE `sd_user` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sd_user_buy`
--

DROP TABLE IF EXISTS `sd_user_buy`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `sd_user_buy` (
  `aid` int(10) NOT NULL AUTO_INCREMENT,
  `cid` int(10) DEFAULT '0',
  `userid` int(10) DEFAULT '0',
  `createdate` int(10) DEFAULT '0',
  PRIMARY KEY (`aid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sd_user_buy`
--

LOCK TABLES `sd_user_buy` WRITE;
/*!40000 ALTER TABLE `sd_user_buy` DISABLE KEYS */;
/*!40000 ALTER TABLE `sd_user_buy` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sd_user_group`
--

DROP TABLE IF EXISTS `sd_user_group`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `sd_user_group` (
  `gid` int(10) NOT NULL AUTO_INCREMENT,
  `gname` varchar(50) DEFAULT '',
  `ordnum` int(10) DEFAULT '0',
  PRIMARY KEY (`gid`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sd_user_group`
--

LOCK TABLES `sd_user_group` WRITE;
/*!40000 ALTER TABLE `sd_user_group` DISABLE KEYS */;
INSERT INTO `sd_user_group` VALUES (1,'普通会员',0),(2,'Vip会员',0);
/*!40000 ALTER TABLE `sd_user_group` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sd_user_login`
--

DROP TABLE IF EXISTS `sd_user_login`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
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
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sd_user_login`
--

LOCK TABLES `sd_user_login` WRITE;
/*!40000 ALTER TABLE `sd_user_login` DISABLE KEYS */;
/*!40000 ALTER TABLE `sd_user_login` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sd_user_money`
--

DROP TABLE IF EXISTS `sd_user_money`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
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
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sd_user_money`
--

LOCK TABLES `sd_user_money` WRITE;
/*!40000 ALTER TABLE `sd_user_money` DISABLE KEYS */;
/*!40000 ALTER TABLE `sd_user_money` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sd_user_pay`
--

DROP TABLE IF EXISTS `sd_user_pay`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
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
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sd_user_pay`
--

LOCK TABLES `sd_user_pay` WRITE;
/*!40000 ALTER TABLE `sd_user_pay` DISABLE KEYS */;
/*!40000 ALTER TABLE `sd_user_pay` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sd_wx_menu`
--

DROP TABLE IF EXISTS `sd_wx_menu`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
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
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sd_wx_menu`
--

LOCK TABLES `sd_wx_menu` WRITE;
/*!40000 ALTER TABLE `sd_wx_menu` DISABLE KEYS */;
/*!40000 ALTER TABLE `sd_wx_menu` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping events for database 'www_lxssm_com'
--

--
-- Dumping routines for database 'www_lxssm_com'
--
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2026-01-09  3:00:19
