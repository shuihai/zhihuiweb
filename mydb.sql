-- MySQL dump 10.13  Distrib 5.5.49, for Linux (x86_64)
--
-- Host: localhost    Database: zhihuishidai
-- ------------------------------------------------------
-- Server version	5.5.49-cll-lve

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `zh_access`
--

DROP TABLE IF EXISTS `zh_access`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `zh_access` (
  `role_id` smallint(6) unsigned NOT NULL COMMENT '角色id',
  `node_id` smallint(6) unsigned NOT NULL COMMENT '节点id',
  `pid` smallint(6) unsigned NOT NULL COMMENT '父级id',
  `level` tinyint(1) NOT NULL COMMENT '层级',
  `module` varchar(50) DEFAULT NULL COMMENT '模块名',
  KEY `groupId` (`role_id`),
  KEY `nodeId` (`node_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='权限表';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `zh_access`
--

LOCK TABLES `zh_access` WRITE;
/*!40000 ALTER TABLE `zh_access` DISABLE KEYS */;
INSERT INTO `zh_access` VALUES (2,255,246,3,NULL),(2,254,246,3,NULL),(2,253,246,3,NULL),(2,252,246,3,NULL),(2,250,246,3,NULL),(2,246,228,2,NULL),(2,230,229,3,NULL),(2,229,228,2,NULL),(2,228,1,0,NULL),(2,6,2,3,NULL),(2,7,2,3,NULL),(2,4,2,3,NULL),(2,5,2,3,NULL),(2,3,2,3,NULL),(2,2,1,2,NULL),(2,1,0,1,NULL),(3,5,2,3,NULL),(3,3,2,3,NULL),(3,2,1,2,NULL),(3,1,0,1,NULL),(3,4,2,3,NULL),(3,7,2,3,NULL),(3,6,2,3,NULL),(3,289,1,0,NULL),(3,290,289,2,NULL),(3,291,290,3,NULL),(2,255,246,3,NULL),(2,254,246,3,NULL),(2,253,246,3,NULL),(2,252,246,3,NULL),(2,250,246,3,NULL),(2,246,228,2,NULL),(2,230,229,3,NULL),(2,229,228,2,NULL),(2,228,1,0,NULL),(2,6,2,3,NULL),(2,7,2,3,NULL),(2,4,2,3,NULL),(2,5,2,3,NULL),(2,3,2,3,NULL),(2,2,1,2,NULL),(2,1,0,1,NULL),(3,5,2,3,NULL),(3,3,2,3,NULL),(3,2,1,2,NULL),(3,1,0,1,NULL),(3,4,2,3,NULL),(3,7,2,3,NULL),(3,6,2,3,NULL),(3,289,1,0,NULL),(3,290,289,2,NULL),(3,291,290,3,NULL),(2,255,246,3,NULL),(2,254,246,3,NULL),(2,253,246,3,NULL),(2,252,246,3,NULL),(2,250,246,3,NULL),(2,246,228,2,NULL),(2,230,229,3,NULL),(2,229,228,2,NULL),(2,228,1,0,NULL),(2,6,2,3,NULL),(2,7,2,3,NULL),(2,4,2,3,NULL),(2,5,2,3,NULL),(2,3,2,3,NULL),(2,2,1,2,NULL),(2,1,0,1,NULL),(3,5,2,3,NULL),(3,3,2,3,NULL),(3,2,1,2,NULL),(3,1,0,1,NULL),(3,4,2,3,NULL),(3,7,2,3,NULL),(3,6,2,3,NULL),(3,289,1,0,NULL),(3,290,289,2,NULL),(3,291,290,3,NULL),(6,380,376,3,NULL),(6,379,376,3,NULL),(6,378,376,3,NULL),(6,377,376,3,NULL),(6,376,375,2,NULL),(6,375,1,0,NULL),(6,25,14,0,NULL),(6,14,1,0,NULL),(6,1,0,1,NULL);
/*!40000 ALTER TABLE `zh_access` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `zh_action`
--

DROP TABLE IF EXISTS `zh_action`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `zh_action` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `rule` text NOT NULL COMMENT '规则',
  `title` varchar(255) NOT NULL COMMENT '行为名字',
  `name` varchar(255) NOT NULL COMMENT '行为标识',
  `remark` varchar(255) NOT NULL COMMENT '行为备注说明',
  `status` tinyint(1) unsigned NOT NULL DEFAULT '1' COMMENT '0禁用1正常',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COMMENT='行为表';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `zh_action`
--

LOCK TABLES `zh_action` WRITE;
/*!40000 ALTER TABLE `zh_action` DISABLE KEYS */;
INSERT INTO `zh_action` VALUES (1,'table:user|field:score|condition:id={$self} AND status>-1|rule:score+1|cycle:24|max:1;','用户登录','user_login','积分+1，每天一次',1),(2,'table:user|field:score|condition:id={$self}|rule:score+5|cycle:24|max|5','发布活动','add_event','积分+5，每天上限5次',1),(3,'table:user|field:score|condition:id={$self} AND status>-1|rule:score+10;','用户注册','user_reg','注册+10个爱心币',1),(4,'table:user|field:score|condition:id={$self}|rule:score+5|cycle:24|max|10','发布活动照片','add_event_pic','积分+5,每天最多10次',1),(5,'table:user|field:score|condition:id={$self}|rule:score+5|cycle:100000000|max|1','用户资料完善','user_perfect','积分+5,一个用户仅一次机会',1);
/*!40000 ALTER TABLE `zh_action` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `zh_config`
--

DROP TABLE IF EXISTS `zh_config`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `zh_config` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `tel` varchar(20) NOT NULL COMMENT '电话',
  `name` varchar(50) NOT NULL COMMENT '网站名称',
  `title` varchar(50) NOT NULL COMMENT '网站标题',
  `keywords` varchar(255) NOT NULL COMMENT '关键字',
  `description` varchar(255) NOT NULL COMMENT '网站描述',
  `url` varchar(50) NOT NULL COMMENT '网站地址',
  `copyrights` varchar(255) NOT NULL COMMENT '版权信息',
  `code` text NOT NULL COMMENT '统计代码',
  `reg` tinyint(1) unsigned NOT NULL COMMENT '注册状态（0关闭1开启）',
  `status` tinyint(1) unsigned NOT NULL COMMENT '网站状态（0关闭1开启）',
  `address` varchar(255) NOT NULL COMMENT '公司名',
  `map` varchar(80) NOT NULL COMMENT '坐标',
  `logo` varchar(80) NOT NULL COMMENT '网站logo',
  `beian` varchar(30) NOT NULL COMMENT '备案号',
  `post` varchar(500) NOT NULL COMMENT '邮编地址',
  `qq` varchar(80) NOT NULL COMMENT 'qq',
  `config_extend` text NOT NULL,
  `email` varchar(128) NOT NULL COMMENT '邮箱',
  `email_password` varchar(64) NOT NULL COMMENT '邮箱密码',
  `email_host` varchar(128) NOT NULL COMMENT 'smtp服务器',
  `email_port` int(10) NOT NULL COMMENT '端口',
  `email_from_name` varchar(128) NOT NULL COMMENT '发件人名称',
  `retrieve_email_title` varchar(128) NOT NULL COMMENT '找回密码邮件标题',
  `retrieve_email_content` varchar(255) NOT NULL COMMENT '找回密码邮件内容',
  `sms_name` varchar(60) NOT NULL COMMENT '短信接口用户名',
  `sms_password` varchar(64) NOT NULL COMMENT '短信接口密码',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COMMENT='网站配置';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `zh_config`
--

LOCK TABLES `zh_config` WRITE;
/*!40000 ALTER TABLE `zh_config` DISABLE KEYS */;
INSERT INTO `zh_config` VALUES (1,'13502176003','天津智汇时代科技有限公司','智汇时代-科学技术研究院','智汇，时代，智汇时代，科学，技术，研究院，科学技术，科学技术研究院，智能，人工智能，AI，机器人，智能机器人，服务机器人，虚拟现实，生物识别，虹膜识别，指纹识别，静脉识别，步态识别，','智汇时代-科学技术研究院是北京高通盛融投资集团设立的企业级研究院，研究院主体任务是研发国际高精尖的科技项目，并通过完善研发环节、打造生产供应链、调用商务推广资源的方式将研发成果转化到实际的未来人们的生产生活中。\r\n智汇研究院通过扶持高精尖的科技人才，并购具有研究价值的科技项目，鼓励科研团队在知识产权方面的创新设计，已经具备多项国际先进的研发成果和一支稳定团结的高端技术精英团队。通过自有研发技术及国际间的技术专家合作，研究院在机器人智能、虚拟现实系统、生物特征识别、科技交易系统、新能源和新材料等领域均以领先','www.wenshuai.cn','All Power By 文率科技','&lt;script type=&quot;text/javascript&quot;&gt;\r\nvar _bdhmProtocol = ((&quot;https:&quot; == document.location.protocol) ? &quot; https://&quot; : &quot; http://&quot;);\r\ndocument.write(unescape(&quot;%3Cscript src=\'&quot; + _bdhmProtocol + &quot;hm.baidu.com/h.js%3F50bfa4da34df5130b09ff34dc492f60a\' type=\'text/javascript\'%3E%3C/script%3E&quot;));\r\n&lt;/script&gt;\r\n',0,1,'天津市东丽区先锋路61号','117.313629,39.090595','config/0/0/1/13874235015889.jpg','津ICP备13005893号','天津市珠江道25号天津财经大学','9476400','[{\"field_name\":\"\\u8fde\\u63a5\",\"field_type\":\"input\",\"field_var\":\"url\",\"field_content\":\"\"},{\"field_name\":\"\\u5907\\u6848\",\"field_type\":\"input\",\"field_var\":\"beian\",\"field_content\":\"\\u6d25ICP\\u590715001630\\u53f7-1\"},{\"field_name\":\"\\u7535\\u8bdd\",\"field_type\":\"input\",\"field_var\":\"tel\",\"field_content\":\"022-83560730\"},{\"field_name\":\"QQ\",\"field_type\":\"input\",\"field_var\":\"qq\",\"field_content\":\"2730787304 \"},{\"field_name\":\"\\u90ae\\u7bb1\",\"field_type\":\"input\",\"field_var\":\"email\",\"field_content\":\"zhihui@itcrm.com\"},{\"field_name\":\"\\u7edf\\u8ba1\\u4ee3\\u7801\",\"field_type\":\"textarea\",\"field_var\":\"code\",\"field_content\":\"\"},{\"field_name\":\"\\u516c\\u53f8\\u5730\\u5740\",\"field_type\":\"input\",\"field_var\":\"address\",\"field_content\":\"\\u5929\\u6d25\\u5e02\\u5357\\u5f00\\u533a\\u7ea2\\u65d7\\u8def220\\u53f7\\u6167\\u8c37\\u5927\\u53a62413\\u5ba4\"},{\"field_name\":\"\\u90ae\\u7f16\",\"field_type\":\"input\",\"field_var\":\"zipcode\",\"field_content\":\"300113\"},{\"field_name\":\"\\u7248\\u6743\\u4fe1\\u606f\",\"field_type\":\"input\",\"field_var\":\"banquan\",\"field_content\":\"CopyRight \\u00a9 \\u5929\\u6d25\\u667a\\u6c47\\u65f6\\u4ee3\\u79d1\\u6280\\u6709\\u9650\\u516c\\u53f8 \\u7248\\u6743\\u6240\\u6709\"},{\"field_name\":\" \\u62db\\u8058\\u90ae\\u7bb1\",\"field_type\":\"input\",\"field_var\":\"jobemail\",\"field_content\":\"lizheng@itcrm.com\"},{\"field_name\":\"\\u5408\\u4f5c\\u8054\\u7cfb\",\"field_type\":\"input\",\"field_var\":\"Cooperation\",\"field_content\":\"022-83560730\"},{\"field_name\":\"\\u4e8c\\u7ef4\\u7801\",\"field_type\":\"image\",\"field_var\":\"erweima\",\"field_content\":\".\\/Uploads\\/config\\/data\\/image\\/20160427\\/20160427112237_55028.jpg\"}]','wenshuaitest@163.com','123456','smtp.163.com',25,'wenshuaitest@163.com','','','bingchuan412','8d11ab510bee00ec2073');
/*!40000 ALTER TABLE `zh_config` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `zh_flink`
--

DROP TABLE IF EXISTS `zh_flink`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `zh_flink` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL COMMENT '网站名称',
  `desc` varchar(255) NOT NULL COMMENT '站点描述',
  `url` varchar(255) NOT NULL COMMENT '跳转地址',
  `img` varchar(80) NOT NULL COMMENT '网站logo',
  `sort` smallint(6) unsigned NOT NULL DEFAULT '0' COMMENT '排序',
  `tid` int(11) unsigned NOT NULL DEFAULT '4' COMMENT '分类id',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=19 DEFAULT CHARSET=utf8 COMMENT='友情链接';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `zh_flink`
--

LOCK TABLES `zh_flink` WRITE;
/*!40000 ALTER TABLE `zh_flink` DISABLE KEYS */;
/*!40000 ALTER TABLE `zh_flink` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `zh_focus`
--

DROP TABLE IF EXISTS `zh_focus`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `zh_focus` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL COMMENT '网站名称',
  `desc` varchar(255) NOT NULL COMMENT '站点描述',
  `url` varchar(255) NOT NULL COMMENT '跳转地址',
  `img` varchar(80) NOT NULL COMMENT '网站logo',
  `sort` smallint(6) unsigned NOT NULL DEFAULT '0' COMMENT '排序',
  `tid` int(11) unsigned NOT NULL DEFAULT '0' COMMENT '分类id',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=23 DEFAULT CHARSET=utf8 COMMENT='友情链接';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `zh_focus`
--

LOCK TABLES `zh_focus` WRITE;
/*!40000 ALTER TABLE `zh_focus` DISABLE KEYS */;
INSERT INTO `zh_focus` VALUES (1,'首页第一张','','','focus/0/0/1/628479.jpeg',999,5),(2,'首页第二张','','','focus/0/0/2/459959.jpeg',999,5),(3,'首页第三张','','','focus/0/0/3/320972.jpeg',999,5),(5,'首页第五张','','','focus/0/0/5/479463.jpeg',999,5),(6,'机器人1','','','focus/0/0/6/854090.png',999,26),(7,'机器人2','','','focus/0/0/7/51342.jpeg',999,26),(8,'机器人底部1','','','focus/0/0/8/86973.jpeg',999,27),(9,'机器人底部2','','','focus/0/0/9/281406.jpeg',999,27),(10,'机器人底部3','','','focus/0/0/10/710936.jpeg',999,27),(11,'机器人3','','','focus/0/0/11/490720.jpeg',999,26),(13,'VR底部1','','','focus/0/0/13/255943.jpeg',999,31),(14,'VR底部2','','','focus/0/0/14/204658.jpeg',999,31),(15,'VR底部3','','','focus/0/0/15/520711.jpeg',999,31),(16,'VR底部4','','','focus/0/0/16/289252.jpeg',999,31),(20,'虚拟现实','','','focus/0/0/20/565807.jpeg',888,37),(21,'机器人','','','focus/0/0/21/666595.jpeg',889,37);
/*!40000 ALTER TABLE `zh_focus` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `zh_info`
--

DROP TABLE IF EXISTS `zh_info`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `zh_info` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `tid` int(11) DEFAULT NULL,
  `title` varchar(100) DEFAULT NULL COMMENT '名称',
  `hits` int(11) unsigned DEFAULT '0' COMMENT '点击率',
  `text` text COMMENT '内容',
  `desc` text COMMENT '描述',
  `sort` int(6) DEFAULT '999' COMMENT '排序',
  `img` varchar(80) NOT NULL COMMENT '图片',
  `mobile_img` varchar(100) NOT NULL COMMENT '手机封面图',
  `time` int(10) NOT NULL COMMENT '时间',
  `url` varchar(255) NOT NULL COMMENT '链接',
  `status` tinyint(1) NOT NULL DEFAULT '1' COMMENT '-2代表删除0未审核1审核',
  `flags` varchar(255) NOT NULL COMMENT '自定义属性',
  `source` varchar(80) NOT NULL COMMENT '来源',
  `author` varchar(32) NOT NULL COMMENT '作者',
  `keywords` varchar(255) NOT NULL COMMENT '关键字',
  `images` text NOT NULL COMMENT '多图',
  `extend` text NOT NULL COMMENT '多功能拓展 json',
  `template` varchar(80) NOT NULL COMMENT '模板地址',
  `img_status` tinyint(1) unsigned NOT NULL DEFAULT '0' COMMENT '1显示0不显示',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=61 DEFAULT CHARSET=utf8 COMMENT='信息表';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `zh_info`
--

LOCK TABLES `zh_info` WRITE;
/*!40000 ALTER TABLE `zh_info` DISABLE KEYS */;
INSERT INTO `zh_info` VALUES (1,22,'智能机器人',0,'<p class=\"MsoNormal\">\r\n	智汇时代的第二代智能服务型机器人，基于自主研发技术并整合多项前沿科技，囊括了更多可定制的人性化智能模块。\r\n</p>\r\n<p class=\"MsoNormal\">\r\n	<span>&nbsp;</span>\r\n</p>\r\n<p class=\"MsoNormal\">\r\n	基础功能方面，沿用了一代机器人的互动展示、运动导航定位、语音交互及红外监控功能，提高了运动速度、定位精度、反馈速度等，解决了嘈杂环境中语音互动的识别障碍，增加了场景信息库，并支持定制。\r\n</p>\r\n<p class=\"MsoNormal\">\r\n	<span>&nbsp;</span>\r\n</p>\r\n<p class=\"MsoNormal\">\r\n	新增的拓展功能，支持自由定制，用户可根据自己的需求打造一台专属机器人！\r\n</p>\r\n<p class=\"MsoNormal\">\r\n	融合生物特征识别技术，带来安全性能更高的保障体系，以及更具价值的统计数据；\r\n</p>\r\n<p class=\"MsoNormal\">\r\n	<span>10-27</span>寸触控显示屏，更大的信息展示空间，更利于观看、操作及阅读；\r\n</p>\r\n<p class=\"MsoNormal\">\r\n	基于<span>Android</span>系统，为模块功能提供更广阔的设计空间；\r\n</p>\r\n<p class=\"MsoNormal\">\r\n	表情交互，情绪展现的第一途径，可依据场景定制，自动识别用户语境，自主变换；\r\n</p>\r\n<p class=\"MsoNormal\">\r\n	自动充电，低电量自动监测并自主选择最优路线返回充电桩充电，无需人工操作。\r\n</p>\r\n<p class=\"MsoNormal\">\r\n	<span>&nbsp;</span>\r\n</p>\r\n<p class=\"MsoNormal\">\r\n	行业领先的技术水平，模块化定制组合方式，我们致力于提供自动化、智能化、人性化、个性化的服务功能，以用户需求为根本，不做噱头，切实改变传统思维，用科技服务人们的未来生活！\r\n</p>\r\n<p class=\"MsoNormal\">\r\n	<br />\r\n</p>\r\n<p class=\"MsoNormal\">\r\n	<img src=\"./Uploads/info/data/image/20161115/20161115134513_14834.png\" alt=\"\" />\r\n</p>','智汇时代致力于研发智能服务型机器人，从商业到家庭，为大众带来具有现实意义的科技解决方案。',1,'./info/1461939873/146193975446019_374x226.jpg','',1461029567,'',1,'','','admin','','','null','',0),(2,12,'虚拟现实',201,'','优秀制作团队，采用Unity开发引擎及技术领先硬件，支持房地产、旅游等众多领域，提供定制版虚拟现实体验平台。',2,'./info/1461939816/146193969874801_374x226.jpg','',1461029799,'',1,'','','admin','','','null','',0),(4,13,'银行、政务',200,'','提供咨询、讲解服务，助力形象工程建设，辅助业务办理，移动监控。',999,'./info/1479261104/147926112212184_423x423.jpg','',1461029957,'',1,'','','admin','','','null','',0),(5,13,'会展中心及交通枢纽',200,'','降低人员成本，辅助安保。信息及时通知，改善资源分配不均。',999,'./info/1479261064/147926109458617_465.99999999999994x465.99999999999994.jpg','',1461029980,'',1,'','','admin','','','null','',0),(6,13,'商业综合体及酒店',200,'','借势营销，利于用户转化。生物识别技术应用更广泛。',999,'./info/1479261023/147926104826904_487x487.jpg','',1461029993,'',1,'','','admin','','','null','',0),(7,13,'大型园区及楼宇',200,'','协助物业相关服务，远程通话处理访客事宜，智能导航领位。',999,'./info/1479261199/147926120456646_1603.0000000000002x1603.0000000000002.jpg','',1461030007,'',1,'','','admin','','','null','',0),(8,22,'智能机器人',200,'<div style=\"text-align:left;\">\r\n	<span style=\"line-height:1.5;\"></span><span style=\"line-height:1.5;\"></span> \r\n</div>\r\n<img src=\"./Uploads/info/data/image/20161118/20161118172009_29732.png\" alt=\"\" style=\"float:left\"/><br />','智汇时代自主研发了一款集导航服务和安保辅助为一身的移动式智能导航机器人。囊括了传统的智能机器人的核心技术，更加以人性化的智能模块，“智汇机器人”具备自主定位导航功能，搭载高性能运动底盘，可自主精确引导用户到室内指定位置。同时，为综合性商业提供辅助客服及安保人员性能，还能提供7×24小时不间断的服务，分担客服安保工作量，节省企业用人成本，提高企业服务质量。“智汇机器人”的研发，志在为企业提供自动化、智能化、人性化、个性化的服务功能，同时，也体现了智汇研究院技术领域的先进性，响应了我们做科技行业特种兵的口号！',1,'./info/1461940118/146194000341054_374x192.05405405405403.jpg','',1461036209,'',1,'','','admin','','','null','',0),(9,23,'虚拟现实',200,'<p>\r\n	<br />\r\n</p>\r\n<p>\r\n	<br />\r\n</p>','虚拟现实（VR）既是时下热点，又是未来国际主流研发项目。智汇时代紧跟发展，利用计算机技术自主研发，搭建虚拟现实平台，服务于众多行业领域。让用户突破限制，在以假乱真的多种虚拟世界中，身临其境地体验、娱乐、消费、活动、研究和探索。\r\n\r\n我们自主研发搭建的VR平台，可服务于医学、教育、交通、军事、航天、工业、艺术、娱乐、游戏、城市规划、房地产、文物保护等众多行业领域，不仅为使用者带来虚拟逼真的场景和真实奇妙的体验，还为服务商提供完整优化的推广服务及后期问题的解决方案，使沉浸式技术在不同领域串联、共享。\r\n',2,'./info/1461940091/146193998238798_374x192.05405405405403.jpg','',1461036294,'',1,'','','admin','','','null','',1),(11,14,'关于我们',200,'','天津智汇时代科技有限公司成立于2016年1月，是北京高通盛融投资集团（股票代码204259）设立的企业级研究院，注册资金1000万元。',999,'./','',1461038090,'',1,'','','admin','','','null','',0),(18,9,'第一代工程样机进入测试阶段',200,'<p style=\"text-indent:2em;\">\r\n	天津市政府重点扶持的科技型企业，智汇时代科学技术研究院经过长期的技术积累，汇集了国内相关领域顶尖的专家教授，正在日夜不停的研发国内最最顶尖的智能服务机器人。目前，智汇时代机器人项目研发已进入最后整合阶段，机器人中国区首发仪式也会在近期在天津举行，第一代商用导航服务机器人即将面世，它所涉及的服务对象范围十分广泛，包括商场、超市、酒店、政府办公大厅、展会展览等大众服务行业。依托天津作为北方经济中心的地理位置，智汇时代所生产的产品可以面向全国使用，为国内机器人产业做出高品质的贡献。\r\n</p>\r\n<p style=\"text-indent:2em;\">\r\n	<br />\r\n</p>','第一代智能服务机器人工程样机已进入装机测试阶段。',999,'./info/1461940189/146194007425949_499.5833333333333x327.jpg','',1461293242,'',1,'','','admin','','[{\"img\":\"info\\/0\\/0\\/\\/146192838646792.jpeg\",\"title\":\"\",\"desc\":\"\"},{\"img\":\"info\\/0\\/0\\/\\/146192838937721.jpeg\",\"title\":\"\",\"desc\":\"\"},{\"img\":\"info\\/0\\/0\\/\\/146192839274768.jpeg\",\"title\":\"\",\"desc\":\"\"},{\"img\":\"info\\/0\\/0\\/\\/146192839653872.jpeg\",\"title\":\"\",\"desc\":\"\"}]','null','',0),(12,15,'公司简介',200,'<p>\r\n	<p class=\"MsoNormal\">\r\n		智汇时代科学技术研究院，前身为高通盛融财富集团科学技术研究部，配合公司国际投资战略进行高精尖科学技术研究工作。后经集团战略部署，将科学技术研究部从集团内部拆分，独立设置企业型研究院，并于<span>2016</span>年<span>1</span>月在天津设立科研基地——天津智汇时代科技有限公司，以专注于高精尖科技项目的研发、生产、投资、整合及推广\r\n。\r\n	</p>\r\n	<p class=\"MsoNormal\">\r\n		<span>&nbsp;</span>\r\n	</p>\r\n	<p class=\"MsoNormal\">\r\n		智汇时代研究院的主体任务是研发国际高精尖的科技项目，以高科技产业为依托，通过完善研发环节、打造生产供应链、调用商务推广资源的方式，将研发成果转化到实际和未来的生产生活中，为打造科技型智慧城市增添动力。\r\n	</p>\r\n</p>\r\n<p>\r\n	<br />\r\n</p>','',999,'./info/1462439266/146243955514642_373x224.jpg','',1461038187,'',1,'','','admin','','','null','',0),(13,16,'专家介绍',201,'','',999,'./','',1461038207,'',1,'','','admin','','[{\"img\":\"info\\/0\\/0\\/\\/146225720063982.jpeg\",\"title\":\"\\u9ec4\\u73ae \\u535a\\u58eb\\u540e\",\"desc\":\"\\u4e3b\\u8981\\u751f\\u7269\\u4ece\\u4e8b\\u8bc6\\u522b\\u7b97\\u6cd5\\uff0c\\u5305\\u62ec\\u9762\\u5b54\\u8bc6\\u522b\\u3001\\u6b65\\u6001\\u8bc6\\u522b\\u3001\\u8679\\u819c\\u8bc6\\u522b\\u7b49\\u7814\\u7a76\\u3002\"},{\"img\":\"info\\/0\\/0\\/\\/146234355895733.jpeg\",\"title\":\"\\u859b\\u5c71 \\u9ebb\\u7701\\u7406\\u5de5\\u7855\\u58eb\",\"desc\":\"\\u8457\\u540d\\u7684\\u56fe\\u50cf\\u5206\\u6790\\u5904\\u7406\\u4e13\\u5bb6\\uff0c\\u66fe\\u5728Adobe\\u516c\\u53f8\\u4efb\\u804c\\u6280\\u672f\\u9ad8\\u7ba1\\u3002\"},{\"img\":\"info\\/0\\/0\\/\\/146234394951294.jpeg\",\"title\":\"\\u845b\\u4e3a\\u6c11 \\u7406\\u5de5\\u5927\\u5b66\\u9662\\u957f\",\"desc\":\"\\u591a\\u5e74\\u673a\\u5668\\u4eba\\u81ea\\u52a8\\u5316\\u9879\\u76ee\\u7814\\u7a76\\u7ecf\\u9a8c\\uff0c\\u83b7\\u5f97\\u56fd\\u5bb6\\u53ca\\u5929\\u6d25\\u5e02\\u591a\\u9879\\u79d1\\u6280\\u5956\\u9879\\u3002\"},{\"img\":\"info\\/0\\/0\\/\\/146234403139910.jpeg\",\"title\":\"\\u83ab\\u79c0\\u826f \\u8ba1\\u7b97\\u673a\\u5b89\\u5168\\u4e13\\u5bb6\",\"desc\":\"\\u66fe\\u4efb\\u804c\\u56fd\\u5bb6\\u5b89\\u5168\\u90e8\\u95e8\\u4e13\\u4e1a\\u5206\\u6790\\u5bfc\\u5e08\\uff0c\\u591a\\u5e74\\u4ece\\u4e8b\\u8ba1\\u7b97\\u673a\\u53ca\\u7f51\\u7edc\\u7684\\u5b89\\u5168\\u7814\\u7a76\\u3002\"},{\"img\":\"info\\/0\\/0\\/\\/146234411233254.jpeg\",\"title\":\"\\u5218\\u5219 \\u79d1\\u6280\\u91d1\\u878d\\u4e13\\u5bb6\",\"desc\":\"\\u5177\\u6709\\u4e30\\u5bcc\\u7684\\u56fd\\u9645\\u5316\\u4e92\\u8054\\u7f51\\u9879\\u76ee\\u5e76\\u8d2d\\u4ee5\\u53ca\\u8bc1\\u5238\\u884c\\u4e1a\\u548c\\u4e0a\\u5e02\\u516c\\u53f8\\u7684\\u6539\\u5236\\u7ecf\\u9a8c\\u3002\"}]','null','',0),(14,17,'下属机构',200,'<ol class=\"field_list clearfix\">\r\n                <li>天津智汇时代科技有限公司</li>\r\n                <li>苏州工业园区智能智造工厂</li>\r\n                <li>贵州新能源车联网基地</li>\r\n                <li>新疆第十二建设兵团国防科技产业园</li>\r\n                <li>天津善融影视众筹科技有限公司</li>\r\n                <li>智汇O2O生活服务有限公司</li>\r\n            </ol>','',999,'./','',1461038302,'',1,'','','admin','','','null','',0),(20,18,'高通盛融',200,'','合作伙伴',1,'./info/1469093054/146909313173349_167.00000000000003x60.00000000000001.jpg','',1461294648,'http://www.gtsrbj.com/',1,',j,','','admin','','','null','',0),(16,19,'超市应用',200,'','服务机器人应用于大型超市，为顾客提供导购及说明服务。',999,'./info/1461837234/146183726643884_384.8x384.8.jpg','',1461038366,'',1,'','','admin','','','null','',0),(17,20,'售后服务',200,'','提高售后服务质量，提升客户满意程度。服务热线：022-83560731',999,'./','',1461045302,'',1,'','','admin','','','null','',0),(19,10,'日内瓦医生开始使用机器人进行胃旁路手术',200,'<p style=\"text-indent:2em;\">\r\n	日内瓦医生开始使用机器人进行胃旁路手术，以治疗肥胖症。胃旁路手术可用微创手术方式实现，将患者的胃分成上下两部分，术后位于上端用于容纳食物的“小胃”只有原来胃部的六分之一左右，重新排列小肠的位置，改变食物经过消化道的途径，达到减缓胃排空速度，降低吸收，因此可以达到减肥的目的。\r\n</p>\r\n<p style=\"text-indent:2em;\">\r\n	<br />\r\n</p>\r\n<p>\r\n	<img src=\"./Uploads/info/data/image/20160505/20160505154113_90880.jpg\" alt=\"\" width=\"550\" height=\"371\" title=\"\" /> \r\n</p>','日内瓦医生开始使用机器人进行胃旁路手术，以治疗肥胖症。',999,'./info/1461843743/146184377836004_440x288.jpg','',1461293267,'',1,'','','admin','','','null','',0),(21,21,'产品服务',0,'','',999,'./','',1461813739,'',1,'','','admin','','','null','',0),(26,19,'商场应用',0,'','服务机器人应用于商场，为顾客提供导航及产品讲解服务。',999,'./info/1462247601/146224764141151_300x300.jpg','',1462247601,'',1,'','','admin','','','null','',0),(27,19,'政府大厅应用',0,'','服务机器人应用于政府大厅，为社会人员提供咨询、讲解等服务。',999,'./info/1462247660/146224767391807_300x300.jpg','',1462247660,'',1,'','','admin','','','null','',0),(28,19,'展会应用',0,'','服务机器人应用于大型展会，为参观人员提供指引及产品讲解服务。',999,'./info/1462247686/146224770452024_411x411.jpg','',1462247686,'',1,'','','admin','','','null','',0),(29,18,'中国科学院计算技术研究所',0,'','',2,'./info/1463121747/146312180188076_485.4865671641791x174.4263115559925.jpg','',1463118489,'http://www.ict.ac.cn/',1,',j,','','admin','','','null','',0),(31,18,'北京伯盛房地产控股有限公司',0,'','',3,'./info/1463121635/146312170026190_847.1197033898305x304.35438445143615.jpg','',1463121656,'http://www.boshengrealty.com/',1,',j,','','admin','','','null','',0),(32,18,'北京汇富融通征信服务有限公司',0,'','',4,'./info/1463122151/146312224512156_535.6443373493976x192.44706731116082.jpg','',1463121925,'http://www.huifucredit.com/',1,',j,','','admin','','','null','',0),(33,18,'北京万卓智汇商贸有限公司',0,'','',5,'./info/1463122248/146312242496827_936.069276094276x336.3123147644106.jpg','',1463122269,'http://www.wanzhuotrading.com/',1,',j,','','admin','','','null','',0),(34,18,'贵州安远新能源汽车有限公司',0,'','',6,'./info/1463122729/146312278084978_906.4934809348094x325.68628057538064.jpg','',1463122750,'http://www.anyuancar.com/',1,',j,','','admin','','','null','',0),(35,11,'智慧城市',0,'','网络和科技的迅猛发展，使得人类城市信息化应用水平直线上升。智慧型城市，是人类享受智慧生活带来的必然转变。智慧城市的建设，可以促进信息技术的进步和经济社会的发展，可以提高国家综合竞争力，最终实现地球环境的可持续发展。\r\n\r\n智汇时代运用信息和通信技术手段，感测、分析、整合城市运行核心系统的各项关键信息，实现城市智慧式管理和运行。\r\n\r\n智汇时代用科技服务人类的未来生活，与各方携手共同打造智慧的未来之城。',999,'','',1466409197,'',1,'','','admin','','','null','',0),(36,11,'外骨骼',0,'','外骨骼，全称为动力外骨骼或动力服，由骨骼模样的框架组成，是可以让人穿戴的机器。\r\n\r\n智汇时代将科技融入到硬件设备中，研发出可穿戴式的外骨骼设备。通过外置发动机、电池或者液压系统，使穿戴者更有力量和耐力。可以增强、扩充普通人的生理机能、改善心脏健康状况、锻炼肌肉强度，缓解抑郁症等，也为伤残人士带来更好的选择和崭新的未来。\r\n\r\n适用于军事、医疗等行业。\r\n',999,'','',1466410713,'',1,'','','admin','','','null','',0),(37,11,'传感器',0,'','智汇时代秉承技术创新和管理创新的精神，成功研发并生产出具备稳定性及准确性双高优良品质的多种压力传感器、激光传感器、视觉及3D传感器等产品，并成功运用到了机器人、生物识别等领域。\r\n因产品先进智能、科技高新，智汇时代已成为国内公认的传感器研发杰出供应商。\r\n',999,'','',1466472543,'',1,'','','admin','','','null','',0),(38,39,'智能机器人',0,'<br />','“智汇侠”是我公司研发出的一款集导航与安保辅助为一体的新一代智能服务机器人。它不仅囊括传统智能机器人的技术核心，而且拥有更加人性化的智能模块和高性能运动底盘，反应灵敏，动作便捷，可自主精确地辨别并引导用户到室内外指定位置。该项技术已达到国内领先水平。\r\n\r\n“智汇侠”具有交流、导航、导购、避险、巡逻、监测及调整姿态等一系列功能，技术领先、运行稳定、实用性强、性价比高，可应用于政府办公、大型商场、超市、展会等各个地方。既能为各方用户带来自动化、智能化、人性化、个性化的服务，又能为服务商带来新锐的吸睛点。\r\n\r\n“智汇侠”不但可以检测需求、侦查互动，还可以通过我院自主研发的内置生物识别系统，记录使用者的选择偏好，通过数据运算，在之后的使用过程中实现信息的精准投放。\r\n',999,'','',1466493045,'',1,'','','admin','','','null','',0),(39,40,'虚拟现实',0,'<img src=\"./Uploads/info/data/image/20160712/20160712151643_52022.jpg\" alt=\"\" width=\"382\" height=\"208\" title=\"\" align=\"\" />','足不出户知天下，是互联网为人类带来的便利。而如今虚拟现实技术的发展，为人类打破了想象的边界。\r\n \r\n智汇时代自主研发搭建的VR平台，可服务于医学、教育、交通、军事、航天、工业、艺术、娱乐、游戏、城市规划、房地产、文物保护等众多行业领域，为房地产、旅游、汽车、高端制造、能源、国防军工、教育科研和科普文博等领域提供虚拟现实技术的平台和系统产品。\r\n\r\n不仅为使用者带来虚拟逼真的场景和真实奇妙的体验，还为服务商提供完整优化的推广服务及后期问题的解决方案，使沉浸式技术在不同领域串联、共享。',999,'','',1466493057,'',1,'','','admin','','','null','',0),(40,41,'生物识别',0,'','生物识别技术，具有比传统的身份鉴定方法更安全、更保密、更便捷的特点。\r\n\r\n智汇时代研发的新一代人体特征识别计算方法，可更准确的采集、鉴定人体各项特征，减小误差几率，具有不易遗忘、防伪性能好、不易伪造或被盗、随身“携带”方便和随时随地可用等优点。\r\n\r\n此项技术可应用于企业、住宅安全和管理（如人脸识别、门禁、考勤等）、信息安全、自助服务等领域，还可以应用到公安、司法、刑侦、电子护照、身份证检验等行业。\r\n\r\n我院全力推进安全、便捷为一体的解决方案，力求将识别系统更稳定、更精准的运用到各行各业中。',999,'','',1466494062,'',1,'','','admin','','','null','',0),(41,42,'智慧城市',0,'<img src=\"./Uploads/info/data/image/20160712/20160712153715_40510.jpg\" alt=\"\" width=\"382\" height=\"208\" title=\"\" align=\"\" />','网络和科技的迅猛发展，使得人类城市信息化应用水平直线上升。智慧型城市，是人类享受智慧生活带来的必然转变。智慧城市的建设，可以促进信息技术的进步和经济社会的发展，可以提高国家综合竞争力，最终实现地球环境的可持续发展。\r\n\r\n智汇时代运用信息和通信技术手段，感测、分析、整合城市运行核心系统的各项关键信息，实现城市智慧式管理和运行。\r\n\r\n智汇时代用科技服务人类的未来生活，与各方携手共同打造智慧的未来之城。\r\n',999,'','',1466494074,'',1,'','','admin','','','null','',0),(42,43,'外骨骼',0,'','外骨骼，全称为动力外骨骼或动力服，由骨骼模样的框架组成，是可以让人穿戴的机器。\r\n\r\n智汇时代将科技融入到硬件设备中，研发出可穿戴式的外骨骼设备。通过外置发动机、电池或者液压系统，使穿戴者更有力量和耐力。可以增强、扩充普通人的生理机能、改善心脏健康状况、锻炼肌肉强度，缓解抑郁症等，也为伤残人士带来更好的选择和崭新的未来。\r\n\r\n适用于军事、医疗等行业。\r\n',999,'','',1466494086,'',1,'','','admin','','','null','',0),(43,44,'传感器',0,'','智汇时代秉承技术创新和管理创新的精神，成功研发并生产出具备稳定性及准确性双高优良品质的多种压力传感器、激光传感器、视觉及3D传感器等产品，并成功运用到了机器人、生物识别等领域。\r\n\r\n因产品先进智能、科技高新，智汇时代已成为国内公认的传感器研发杰出供应商。\r\n',999,'','',1466494104,'',1,'','','admin','','','null','',0),(44,48,'商场',0,'<p>\r\n	<span style=\"color:#9B9A9A;line-height:22px;\">智能时代来临，在许多大型综合商场几乎随处可见智能触屏导航装置，它能指引消费者找到心仪商家的位置，以及自身的位置。智汇时代的智能机器人，除了具备这些功能外还能够提供移动指引功能，可以亲自引领消费者前往指定商家。更难得的是，它还可以为商家充当电子导购员，在节省人力的同时，还可以提升消费者的购物兴趣，给消费者一个全新的购物体验，引领一个新的商场潮流。</span>\r\n</p>\r\n<p>\r\n	<span style=\"color:#9B9A9A;line-height:22px;\"><img src=\"./Uploads/info/data/image/20160712/20160712140233_31766.jpg\" alt=\"\" /><br />\r\n</span>\r\n</p>','',999,'','',1466495070,'',1,'','','admin','','','null','',0),(45,48,'展会',0,'<p>\r\n	<span style=\"color:#9B9A9A;line-height:22px;\">大型综合类展会越来越多，面对琳琅满目的参展商品，参会人如何能够快速的找到目的地呢？智汇时代的智能机器人，就可以为参会人员做电子导航员，快速、准确的找到参展位置。另外，展会参展商所展示的产品五花八门，展区面积硕大，限于人员的控制以及展位内容不同的限制，不会有条件建立每个站位一名讲解员，也不会有全能讲解员可以讲解每一个展位。这时，智能机器人的优势再一次显现，它可以预先输入各参展商的信息资料，参会人员只需要通过触摸屏就可以了解到相应展商信息，并能声情并茂的为参会人进行讲解，为展会提供更周到的服务。</span>\r\n</p>\r\n<p>\r\n	<span style=\"color:#9B9A9A;line-height:22px;\"><img src=\"./Uploads/info/data/image/20160712/20160712140114_75391.jpg\" alt=\"\" /><br />\r\n</span>\r\n</p>','',999,'','',1466495113,'',1,'','','admin','','','null','',0),(46,48,'超市',0,'<p>\r\n	<span style=\"color:#9B9A9A;line-height:22px;\">随着电商的日益发展，大型综合超市越来越需要新鲜元素的介入，智能机器人的诞生，无疑是新兴综合超市的一个亮点。它不仅可以为消费者提供一个智趣的购物环境，还能够为超市平台提供最真实的市场调研，了解老百姓的需求。在购物过程中，智能机器人可以充当电子导航仪，为消费者提供便捷的购物环境；在超市监管中，智能机器人可以作为安保辅助设备，提供全场巡逻的功能。可以说，智能机器人在超市的应用中是一个利民利商的双效应用装置。</span>\r\n</p>\r\n<p>\r\n	<span style=\"color:#9B9A9A;line-height:22px;\"><img src=\"./Uploads/info/data/image/20160712/20160712135959_77229.jpg\" alt=\"\" /><br />\r\n</span>\r\n</p>','',999,'','',1466495126,'',1,'','','admin','','','null','',0),(47,48,'政府大厅',0,'<p>\r\n	政府办公大厅内都是来自社会的各个行业、各个阶级的不同的办理人，但是在固定办公大厅里业务都是大同小异的，当咨询业务往复进行时，智能机器人诞生了。它不会因公务人员经验不同而得到不同的答案，也不会因为办理人员的理解水平而得到不全面的解答，它可以给出最全面、系统以及统一的答案。\r\n</p>\r\n<p>\r\n	<img src=\"./Uploads/info/0/0/47/146830309297135501.jpg\" alt=\"\" /><span></span>\r\n</p>\r\n<div>\r\n	<br />\r\n</div>','',999,'./info/1468302952/146830302026600_907.2x593.8036363636364.jpg','',1466495136,'',1,'','','admin','','','null','',0),(48,49,'房型展示',0,'<p>\r\n	应用于样板间、小区景观展示等领域。对于地产方而言，VR样板间所需要的空间、时间及成本都大幅减小，并且可以进行多地、异地推广营销。对于看房者而言，VR样板间可以身临其境在短时间内感受昼夜及四季变化，发现户型、层高、家具家电摆放等各种细节问题，可以感受不同的装修风格及互动体验。\r\n</p>\r\n<p>\r\n	<img src=\"./Uploads/info/data/image/20160712/20160712142439_38075.jpg\" alt=\"\" />\r\n</p>\r\n<div>\r\n	<br />\r\n</div>\r\n<br />','',999,'','',1466495166,'',1,'','','admin','','','null','',0),(49,25,'智能机器人',0,'','应用于大型园区及楼宇：\r\n凸显场地特征，便于形象展示；语音交互，智能定位引导；实时政策、入驻企业查询；高清流畅视频通话，沟通无障碍；待办事项检索、物业相关服务等。\r\n\r\n应用于商业综合体：\r\n线上线下借势推广；吸引客流，带动消费；生物特征识别，1对1会员系统，保障信息安全；云数据分析；商业信息宣传展示，商家位置服务；红外可移动监控，辅助安保等。\r\n\r\n应用于会展中心：\r\n信息发布、广告展示；领位导航、辅助安保，展位位置服务；降低人员成本，减轻工作量，改善资源分配不均等。\r\n\r\n应用于银行、政务：\r\n业务介绍及办理；问题解答；领位导航；形象工程建设；反馈数据分析；监控安保等。\r\n\r\n应用于交通枢纽：\r\n操作流程讲解；问题解答；通知展示，周边信息查询；移动监控，辅助安保；提升服务口碑等。\r\n',999,'./info/1479193909/147919392034834_720x423.jpg','',1479189111,'',1,'','','admin','','','null','',0),(50,25,'虚拟现实',0,'','我们的VR项目涉及多方领域，目前已在房地产及旅游行业拥有成熟的技术水平和完善的解决方案。\r\n\r\nVR样板间：\r\n我们采用世界级开发引擎Unity 和顶级VR头显设备HTC Vive及Oculus Rift，按真实设计尺寸1:1还原制作，流畅的画面和精细的材质，每一个角落都真实而精致，力求给客户最好的VR体验。\r\n除了近乎真实的视觉效果，我们的样板间充满了互动元素。物品取放、电器交互、尺寸显示、家具及装修风格的更换，甚至互动游戏，我们都可以根据用户需求定制。每一间都是独一无二。\r\n\r\nVR旅游：\r\n除了广为人知的游戏、影视、医疗等行业，VR与旅游的结合，更是为人们带来了一种前所未有的出行方式，也为旅游业带来了新的营销整合模式。\r\n对传统旅游方式的所有弊端说NO！智汇时代主攻全方位的专业私人化定制服务模式，团队专业，可以根据用户需求专业定制各种VR项目体验，最大程度的还原真实场景，营造美好的体验氛围，在带来尽善尽美的用户体验同时为用户减少成本。\r\n',999,'./info/1479193879/147919389799642_940.0000000000001x672.0000000000001.png','',1479189173,'',1,'','','admin','','','null','',0),(51,25,'智汇建筑',0,'','智汇IBAMS智能建筑管理系统，从8个体系出发，逐步完善建筑的智慧型模式转变，向人们提供安全、高效、自动化、便捷、节能、环保、健康的建筑环境。\r\nCAS通信自动化系统\r\nIDC互联网数据中心\r\nSAS安保监控系统\r\nFAS火灾报警系统\r\nOAS办公自动化系统\r\nSCS一卡通系统\r\nBAS建筑设备自动化系统\r\nEMS建筑能源管理系统\r\n',999,'./info/1479193093/147919381511255_1518x842.png','',1479189209,'',1,'','','admin','','','null','',0),(52,25,'智能系统解决',0,'','智汇时代的第一款民用智能硬件产品已步入量产阶段，即将面世。它具有轻便、安全、智能、防盗等诸多人性化功能。欲知详情，请及时查看我们的网站更新，或关注我们的官方微信智汇时代（微信号：ininera），获得第一手资讯！',999,'./info/1479197141/147919719336959_291x291.png','',1479189260,'',1,'','','admin','','','null','',0),(53,12,'智慧建筑',0,'','智汇时代意在助力智慧城市建设，为城市建筑提供智能运行方案，房地产与科技结合，造就更好的生存生态。',999,'./info/1479193980/147919401790460_1920x1080.jpg','',1479193979,'',1,'','','admin','','','null','',0),(54,12,'智能系统解决',0,'','用科技服务未来生活，智汇时代关注所有生活领域，从多种角度及细节为大众带来智能科技解决方案。',999,'./info/1479194029/147919406252024_500x300.jpg','',1479194028,'',1,'','','admin','','','null','',0),(55,9,'正本置业携手智汇时代 共筑创新2.0智慧建筑',0,'<p class=\"MsoNormal\">\r\n	<br />\r\n</p>','正本置业携手智汇时代 共筑创新2.0智慧建筑',999,'./info/1479194355/147919439430798_720x400.png','',1479194354,'http://mp.weixin.qq.com/s?__biz=MzI3MTI3MTQ4Nw==&amp;mid=2247483857&amp;idx=1&amp;sn=c0703ac4958787038e6a1e1f2005efe0&amp;chksm=eac51281ddb29b976c853e18359fe9093991b1b32795e20a6431ee095b66cd3646b9c13a1ecb&amp;scene=4#wechat_redirect',1,',j,','','admin','','','null','',0),(56,9,'爬坡测试&amp;防爆机器人',0,'','',999,'./info/1479196322/147919633260732_900x501.jpg','',1479196088,'http://mp.weixin.qq.com/s?__biz=MzI3MTI3MTQ4Nw==&amp;mid=2247483811&amp;idx=1&amp;sn=e229034aa86272597ee7f3ba629bce3f&amp;scene=4#wechat_redirect',1,',j,','','admin','','','null','',0),(57,10,'2016世界机器人大会开幕 智汇带你看精彩',0,'','',999,'./info/1479196387/147919641055457_1000x300.jpg','',1479196386,'http://mp.weixin.qq.com/s?__biz=MzI3MTI3MTQ4Nw==&amp;mid=2247483857&amp;idx=2&amp;sn=28cfd32696e45a4f45d54d508f5c71ea&amp;chksm=eac51281ddb29b972141c83dde317fa82336076b7c77f45028e143e803c16972c990f7cad55b&amp;scene=4#wechat_redirect',1,',j,','','admin','','','null','',0),(58,10,'2016双创周启动 智汇新科技助力智慧未来',0,'','',999,'./info/1479196553/147919656575049_600x410.jpg','',1479196552,'http://mp.weixin.qq.com/s?__biz=MzI3MTI3MTQ4Nw==&amp;mid=2247483845&amp;idx=1&amp;sn=d080f7a9d16f251146f042e57101c791&amp;chksm=eac51295ddb29b8313b92a81b1b94f5dd80f0f6df9c08761e444124ed81c06d1db909c45b2c4&amp;scene=4#wechat_redirect',1,',j,','','admin','','','null','',0),(59,10,'【智汇说】是买不起，还是不愿意？',0,'','',999,'./info/1479196662/147919672857136_473x473.jpg','',1479196661,'http://mp.weixin.qq.com/s?__biz=MzI3MTI3MTQ4Nw==&amp;mid=2247483831&amp;idx=2&amp;sn=0bb8310e2ef3dd53018524afea2b06b0&amp;chksm=eac512e7ddb29bf14e08a4812d8bc4587136a0f662b2a95ce6a2f59b64bd332eab6a8d3b9039&amp;scene=4#wechat_redirect',1,',j,','','admin','','','null','',0),(60,10,'【智汇说】波士顿动力又有新突破 机器人稳定性有了新发展',0,'','',999,'./info/1479196748/147919677969483_700x600.jpg','',1479196746,'http://mp.weixin.qq.com/s?__biz=MzI3MTI3MTQ4Nw==&amp;mid=2247483823&amp;idx=3&amp;sn=f2ab1a7204bfe27186ec7d958c65a25b&amp;chksm=eac512ffddb29be9dc09899646316ef6c065df7ced4eca57fbdab0e610ec52de7e94750f7c26&amp;scene=4#wechat_redirect',1,',j,','','admin','','','null','',0);
/*!40000 ALTER TABLE `zh_info` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `zh_node`
--

DROP TABLE IF EXISTS `zh_node`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `zh_node` (
  `id` smallint(6) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(20) NOT NULL COMMENT '节点名称',
  `title` varchar(50) NOT NULL COMMENT '菜单名称',
  `status` tinyint(1) NOT NULL DEFAULT '0' COMMENT '是否激活 1：是 2：否',
  `remark` varchar(255) DEFAULT NULL COMMENT '备注说明',
  `pid` smallint(6) unsigned NOT NULL COMMENT '父ID',
  `level` tinyint(1) unsigned NOT NULL COMMENT '节点等级',
  `data` varchar(255) DEFAULT NULL COMMENT '附加参数',
  `sort` smallint(6) unsigned NOT NULL DEFAULT '0' COMMENT '排序权重',
  `display` tinyint(1) unsigned NOT NULL DEFAULT '0' COMMENT '菜单显示类型 0:不显示 1:导航菜单 2:左侧菜单',
  PRIMARY KEY (`id`),
  KEY `level` (`level`),
  KEY `pid` (`pid`),
  KEY `status` (`status`),
  KEY `name` (`name`)
) ENGINE=MyISAM AUTO_INCREMENT=387 DEFAULT CHARSET=utf8 COMMENT='节点表';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `zh_node`
--

LOCK TABLES `zh_node` WRITE;
/*!40000 ALTER TABLE `zh_node` DISABLE KEYS */;
INSERT INTO `zh_node` VALUES (1,'Admin','根节点',1,'不可删除',0,1,NULL,0,0),(2,'index','后台主框架模块',1,'所有后台用户组都必须有此权限，否则后台无法登录',1,2,'',10,0),(3,'index','index方法',1,'Index模块的index方法',2,3,'',5,0),(4,'left','left方法',1,'Index模块的left方法',2,3,'',3,0),(5,'top','top方法',1,'Index模块的top方法',2,3,'',4,0),(6,'main','main方法',1,'Index模块的main方法',2,3,'',1,0),(7,'footer','footer方法',1,'Index模块的footer方法',2,3,'',2,0),(8,'Node','菜单节点管理',1,'',28,2,'Node/index',10,2),(9,'add','添加菜单',1,'',8,3,'',4,0),(10,'edit','修改菜单',1,'',8,3,'',3,0),(11,'del','删除菜单',1,'',8,3,'',2,0),(14,'Index','基础',1,'',1,0,'',1,1),(15,'main','系统环境',1,'快捷菜单',25,0,'Index/main',0,2),(16,'index','菜单列表',1,'',8,3,'',5,0),(17,'sort','菜单排序',1,'',8,3,'',1,0),(190,'add','添加',1,'',183,3,'',0,0),(21,'User','用户管理',1,'',14,2,'',9,2),(22,'role','角色管理',0,'',21,3,'User/role',1,2),(23,'role_add','角色添加',1,'',21,3,'User/role_add',0,0),(25,'','基础功能',1,'',14,0,'',1,2),(30,'index','后台用户',1,'',21,3,'User/index',3,2),(28,'extend_sub','系统配置',1,'',14,0,'',0,2),(31,'role_edit','角色编辑',1,'',21,3,'',0,0),(32,'role_del','角色删除',1,'',21,3,'',0,0),(33,'role_sort','角色排序',1,'',21,3,'',0,0),(34,'add','用户添加',1,'',21,3,'',9,0),(35,'edit','用户编辑',1,'',21,3,'',8,0),(36,'del','用户删除',1,'',21,3,'',7,0),(215,'setting','网站配置',1,'',25,3,'Config/setting',1,2),(223,'homeUser','前台用户',0,'前台用户管理',21,3,'User/homeUser',3,2),(372,'index','栏目管理',1,'',25,3,'Type/index',2,2),(374,'index','文档管理',1,'',25,3,'Info/index',3,2),(382,'index','友情链接',1,'',25,3,'Flink/index',5,2),(383,'index','焦点图',1,'',25,3,'focus/index',4,2);
/*!40000 ALTER TABLE `zh_node` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `zh_role`
--

DROP TABLE IF EXISTS `zh_role`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `zh_role` (
  `id` smallint(6) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(20) NOT NULL COMMENT '后台组名',
  `pid` smallint(6) unsigned NOT NULL DEFAULT '0' COMMENT '父ID',
  `status` tinyint(1) unsigned DEFAULT '0' COMMENT '是否激活 1：是 0：否',
  `sort` smallint(6) unsigned NOT NULL DEFAULT '0' COMMENT '排序权重',
  `remark` varchar(255) DEFAULT NULL COMMENT '备注说明',
  PRIMARY KEY (`id`),
  KEY `pid` (`pid`),
  KEY `status` (`status`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8 COMMENT='角色表';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `zh_role`
--

LOCK TABLES `zh_role` WRITE;
/*!40000 ALTER TABLE `zh_role` DISABLE KEYS */;
INSERT INTO `zh_role` VALUES (1,'超级管理员',0,1,50,'超级管理员组'),(6,'售后工程师',0,1,0,NULL),(3,'站点监督员',0,1,49,'站点监督员组');
/*!40000 ALTER TABLE `zh_role` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `zh_role_user`
--

DROP TABLE IF EXISTS `zh_role_user`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `zh_role_user` (
  `user_id` int(10) unsigned NOT NULL COMMENT '用户id',
  `role_id` smallint(6) unsigned NOT NULL COMMENT '角色id',
  KEY `group_id` (`role_id`),
  KEY `user_id` (`user_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='角色和用户的对应表';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `zh_role_user`
--

LOCK TABLES `zh_role_user` WRITE;
/*!40000 ALTER TABLE `zh_role_user` DISABLE KEYS */;
INSERT INTO `zh_role_user` VALUES (1,1),(71,3),(85,6);
/*!40000 ALTER TABLE `zh_role_user` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `zh_sms`
--

DROP TABLE IF EXISTS `zh_sms`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `zh_sms` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `phone` varchar(20) NOT NULL COMMENT '手机号',
  `time` int(10) NOT NULL COMMENT '时间',
  `status` tinyint(2) NOT NULL COMMENT '状态0未验证，1已验证',
  `model` varchar(40) NOT NULL COMMENT '标识',
  `text` text NOT NULL COMMENT '内容',
  `uid` int(11) unsigned NOT NULL DEFAULT '0' COMMENT '用户id',
  `user_phone` varchar(11) NOT NULL COMMENT '用户电话',
  `code` char(6) NOT NULL COMMENT '验证码',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8 COMMENT='短信记录';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `zh_sms`
--

LOCK TABLES `zh_sms` WRITE;
/*!40000 ALTER TABLE `zh_sms` DISABLE KEYS */;
INSERT INTO `zh_sms` VALUES (1,'13502176003',1429891631,1,'order','验证码：836413，请勿泄露，请在10分钟内完成。如果非本人操作，请忽略。',0,'','836413'),(2,'13502176003',1429925852,1,'order','验证码：103158，请勿泄露，请在10分钟内完成。如果非本人操作，请忽略。',0,'','103158'),(3,'15620613686',1429960308,1,'order','验证码：500039，请勿泄露，请在10分钟内完成。如果非本人操作，请忽略。',0,'','500039'),(4,'15222145857',1429961799,1,'order','验证码：399349，请勿泄露，请在10分钟内完成。如果非本人操作，请忽略。',0,'','399349'),(5,'15222145857',1429962286,1,'order','验证码：340023，请勿泄露，请在10分钟内完成。如果非本人操作，请忽略。',0,'','340023'),(6,'15222145857',1429962846,1,'order','验证码：358041，请勿泄露，请在10分钟内完成。如果非本人操作，请忽略。',0,'','358041');
/*!40000 ALTER TABLE `zh_sms` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `zh_type`
--

DROP TABLE IF EXISTS `zh_type`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `zh_type` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `title` varchar(60) NOT NULL COMMENT '名字 ',
  `pid` smallint(6) unsigned NOT NULL COMMENT '父级id',
  `level` smallint(6) unsigned NOT NULL DEFAULT '0' COMMENT '层级默认为0',
  `sort` int(11) unsigned NOT NULL DEFAULT '0' COMMENT '排序默认为0',
  `status` tinyint(3) unsigned NOT NULL DEFAULT '1' COMMENT '状态 1为开启0为关闭',
  `desc` text NOT NULL COMMENT '描述',
  `name` varchar(80) NOT NULL COMMENT '唯一标识',
  `template_index` varchar(100) NOT NULL COMMENT '频道页模板',
  `template_list` varchar(100) NOT NULL COMMENT '列表页模板',
  `template_detail` varchar(100) NOT NULL COMMENT '详情页模板',
  `template_type` tinyint(1) NOT NULL DEFAULT '0' COMMENT '0列表1封面',
  `img` varchar(80) NOT NULL COMMENT '封面图',
  `text` text NOT NULL COMMENT '详情',
  `flags` text NOT NULL COMMENT '属性',
  `url` varchar(255) NOT NULL COMMENT '跳转链接',
  `images` text NOT NULL COMMENT '多图上传',
  `extend` text NOT NULL COMMENT '拓展',
  `keywords` varchar(255) NOT NULL COMMENT '关键词',
  `img_status` tinyint(1) unsigned NOT NULL DEFAULT '0' COMMENT '1显示0不显示',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=50 DEFAULT CHARSET=utf8 COMMENT='分类表';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `zh_type`
--

LOCK TABLES `zh_type` WRITE;
/*!40000 ALTER TABLE `zh_type` DISABLE KEYS */;
INSERT INTO `zh_type` VALUES (1,'根',0,0,0,1,'','','','','',0,'','','','','','','',1),(2,'文档分类',1,0,999,1,'','','','','',0,'','','','','','null','',1),(3,'焦点图分类',1,1,999,1,'','','','','',0,'','','','','','','',1),(4,'友情链接分类',1,1,999,1,'','','','','',0,'','','','','','','',1),(5,'首页焦点图',3,2,999,1,'','','','','',0,'','','','','','','',1),(15,'公司简介',14,2,999,1,'','','','','',0,'','','','','','','',0),(14,'关于我们',2,0,5,1,'','','Home/Info/aboutUs','','',0,'','','','','','null','',0),(8,'新闻动态',2,0,3,1,'','','Home/Info/news','','',0,'','','','','','null','',0),(9,'公司动态',8,2,999,1,'','','','','',0,'','','','','','','',0),(10,'科学新闻',8,2,999,1,'','','','','',0,'','','','','','','',0),(11,'首页',2,0,1,1,'','','Home/Index','','',0,'','','','','','null','',0),(12,'涉及领域',11,2,999,1,'','','','','',0,'','','','','','','',0),(13,'智能机器人应用',11,0,999,1,'','','','','',0,'','','','','','null','',0),(16,'专家介绍',14,2,999,1,'','','','','',0,'','','','','','','',0),(17,'下属机构',14,2,999,1,'','','','','',0,'','','','','','','',0),(18,'合作伙伴',14,2,999,1,'','','','','',0,'','','','','','','',0),(19,'应用案例',14,2,999,1,'','','','','',0,'','','','','','','',0),(20,'售后服务',14,2,999,1,'','','','','',0,'','','','','','','',0),(21,'产品服务',2,0,2,1,'','','Home/Info/productServer','','',0,'','','','','','null','',0),(22,'智能机器人',21,0,1,1,'','','','','',0,'','','','','','null','',0),(23,'(VR)虚拟现实',21,2,2,1,'','','','','',0,'','','','','','','',0),(24,'生物识别',21,2,3,1,'','','','','',0,'','','','','','','',0),(25,'应用案例',2,0,4,1,'','','','','',0,'','','','','','null','',0),(26,'机器人智能中部焦点图',3,0,999,1,'','','','','',0,'','','','','','null','',0),(27,'机器人智能底部焦点图',3,0,999,1,'','','','','',0,'','','','','','null','',0),(30,'VR虚拟现实中部焦点图',3,2,999,1,'','','','','',0,'','','','','','','',0),(31,'VR虚拟现实底部焦点图',3,2,999,1,'','','','','',0,'','','','','','','',0),(32,'生物识别中部焦点图',3,2,999,1,'','','','','',0,'','','','','','','',0),(33,'生物识别底部焦点图',3,2,999,1,'','','','','',0,'','','','','','','',0),(39,'智能机器人',38,2,999,1,'','','','','',0,'','','','','','','',0),(38,'手机产品服务',2,1,999,1,'','','','','',0,'','','','','','','',0),(37,'手机端首页焦点图',3,2,999,1,'','','','','',0,'','','','','','','',0),(40,'虚拟现实',38,2,999,1,'','','','','',0,'','','','','','','',0),(41,'生物识别',38,2,999,1,'','','','','',0,'','','','','','','',0),(42,'智慧城市',38,2,999,1,'','','','','',0,'','','','','','','',0),(43,'外骨骼',38,2,999,1,'','','','','',0,'','','','','','','',0),(44,'传感器',38,2,999,1,'','','','','',0,'','','','','','','',0),(48,'智能机器人',47,2,999,1,'','','','','',0,'','','','','','','',0),(47,'手机应用案例',2,1,999,1,'','','','','',0,'','','','','','','',0),(49,'虚拟现实',47,2,999,1,'','','','','',0,'','','','','','','',0);
/*!40000 ALTER TABLE `zh_type` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `zh_user`
--

DROP TABLE IF EXISTS `zh_user`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `zh_user` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT COMMENT '用户id（自动增长）',
  `username` varchar(20) DEFAULT NULL COMMENT '用户名',
  `password` varchar(100) DEFAULT NULL COMMENT '密码',
  `phone` varchar(20) NOT NULL COMMENT '手机号',
  `role` smallint(6) unsigned NOT NULL DEFAULT '0' COMMENT '角色ID(0为前台用户 大于0为后台用户)',
  `avatar` varchar(80) DEFAULT NULL COMMENT '微博用户小头像',
  `status` tinyint(1) unsigned NOT NULL DEFAULT '0' COMMENT '0未审核1审核通过',
  `reg_time` int(10) unsigned DEFAULT NULL COMMENT '注册时间',
  `last_login_time` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '最后登录时间',
  `last_login_ip` varchar(15) NOT NULL DEFAULT '0' COMMENT '最后一次登录ip',
  `email` varchar(40) DEFAULT NULL COMMENT '邮箱',
  `login_times` int(11) unsigned NOT NULL DEFAULT '0' COMMENT '登陆次数',
  `sex` tinyint(1) unsigned NOT NULL COMMENT '1男0女',
  `qq` varchar(13) NOT NULL COMMENT 'QQ',
  `nickname` varchar(80) NOT NULL COMMENT '昵称',
  `web_name` varchar(255) NOT NULL COMMENT '网站名字',
  PRIMARY KEY (`id`),
  UNIQUE KEY `phone` (`phone`),
  UNIQUE KEY `email` (`email`),
  UNIQUE KEY `username` (`username`),
  KEY `password` (`password`)
) ENGINE=MyISAM AUTO_INCREMENT=87 DEFAULT CHARSET=utf8 COMMENT='用户表';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `zh_user`
--

LOCK TABLES `zh_user` WRITE;
/*!40000 ALTER TABLE `zh_user` DISABLE KEYS */;
INSERT INTO `zh_user` VALUES (1,'admin','MDAwMDAwMDAwMLK6e6yxprqX','0',1,NULL,1,NULL,1401866650,'127.0.0.1','645605935@qq.com',0,0,'','小韩 ','');
/*!40000 ALTER TABLE `zh_user` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2017-01-11 14:24:38
