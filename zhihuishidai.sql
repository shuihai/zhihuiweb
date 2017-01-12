-- phpMyAdmin SQL Dump
-- version 3.2.0.1
-- http://www.phpmyadmin.net
--
-- 主机: localhost
-- 生成日期: 2015 年 08 月 24 日 02:01
-- 服务器版本: 5.5.8
-- PHP 版本: 5.3.3

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- 数据库: `mobansql`  
--

-- --------------------------------------------------------

--
-- 表的结构 `ez_access`
--

CREATE TABLE IF NOT EXISTS `ez_access` (
  `role_id` smallint(6) unsigned NOT NULL COMMENT '角色id',
  `node_id` smallint(6) unsigned NOT NULL COMMENT '节点id',
  `pid` smallint(6) unsigned NOT NULL COMMENT '父级id',
  `level` tinyint(1) NOT NULL COMMENT '层级',
  `module` varchar(50) DEFAULT NULL COMMENT '模块名',
  KEY `groupId` (`role_id`),
  KEY `nodeId` (`node_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='权限表';

--
-- 转存表中的数据 `ez_access`
--

INSERT INTO `ez_access` (`role_id`, `node_id`, `pid`, `level`, `module`) VALUES
(2, 255, 246, 3, NULL),
(2, 254, 246, 3, NULL),
(2, 253, 246, 3, NULL),
(2, 252, 246, 3, NULL),
(2, 250, 246, 3, NULL),
(2, 246, 228, 2, NULL),
(2, 230, 229, 3, NULL),
(2, 229, 228, 2, NULL),
(2, 228, 1, 0, NULL),
(2, 6, 2, 3, NULL),
(2, 7, 2, 3, NULL),
(2, 4, 2, 3, NULL),
(2, 5, 2, 3, NULL),
(2, 3, 2, 3, NULL),
(2, 2, 1, 2, NULL),
(2, 1, 0, 1, NULL),
(3, 5, 2, 3, NULL),
(3, 3, 2, 3, NULL),
(3, 2, 1, 2, NULL),
(3, 1, 0, 1, NULL),
(3, 4, 2, 3, NULL),
(3, 7, 2, 3, NULL),
(3, 6, 2, 3, NULL),
(3, 289, 1, 0, NULL),
(3, 290, 289, 2, NULL),
(3, 291, 290, 3, NULL),
(2, 255, 246, 3, NULL),
(2, 254, 246, 3, NULL),
(2, 253, 246, 3, NULL),
(2, 252, 246, 3, NULL),
(2, 250, 246, 3, NULL),
(2, 246, 228, 2, NULL),
(2, 230, 229, 3, NULL),
(2, 229, 228, 2, NULL),
(2, 228, 1, 0, NULL),
(2, 6, 2, 3, NULL),
(2, 7, 2, 3, NULL),
(2, 4, 2, 3, NULL),
(2, 5, 2, 3, NULL),
(2, 3, 2, 3, NULL),
(2, 2, 1, 2, NULL),
(2, 1, 0, 1, NULL),
(3, 5, 2, 3, NULL),
(3, 3, 2, 3, NULL),
(3, 2, 1, 2, NULL),
(3, 1, 0, 1, NULL),
(3, 4, 2, 3, NULL),
(3, 7, 2, 3, NULL),
(3, 6, 2, 3, NULL),
(3, 289, 1, 0, NULL),
(3, 290, 289, 2, NULL),
(3, 291, 290, 3, NULL),
(2, 255, 246, 3, NULL),
(2, 254, 246, 3, NULL),
(2, 253, 246, 3, NULL),
(2, 252, 246, 3, NULL),
(2, 250, 246, 3, NULL),
(2, 246, 228, 2, NULL),
(2, 230, 229, 3, NULL),
(2, 229, 228, 2, NULL),
(2, 228, 1, 0, NULL),
(2, 6, 2, 3, NULL),
(2, 7, 2, 3, NULL),
(2, 4, 2, 3, NULL),
(2, 5, 2, 3, NULL),
(2, 3, 2, 3, NULL),
(2, 2, 1, 2, NULL),
(2, 1, 0, 1, NULL),
(3, 5, 2, 3, NULL),
(3, 3, 2, 3, NULL),
(3, 2, 1, 2, NULL),
(3, 1, 0, 1, NULL),
(3, 4, 2, 3, NULL),
(3, 7, 2, 3, NULL),
(3, 6, 2, 3, NULL),
(3, 289, 1, 0, NULL),
(3, 290, 289, 2, NULL),
(3, 291, 290, 3, NULL),
(6, 380, 376, 3, NULL),
(6, 379, 376, 3, NULL),
(6, 378, 376, 3, NULL),
(6, 377, 376, 3, NULL),
(6, 376, 375, 2, NULL),
(6, 375, 1, 0, NULL),
(6, 25, 14, 0, NULL),
(6, 14, 1, 0, NULL),
(6, 1, 0, 1, NULL);

-- --------------------------------------------------------

--
-- 表的结构 `ez_action`
--

CREATE TABLE IF NOT EXISTS `ez_action` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `rule` text NOT NULL COMMENT '规则',
  `title` varchar(255) NOT NULL COMMENT '行为名字',
  `name` varchar(255) NOT NULL COMMENT '行为标识',
  `remark` varchar(255) NOT NULL COMMENT '行为备注说明',
  `status` tinyint(1) unsigned NOT NULL DEFAULT '1' COMMENT '0禁用1正常',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COMMENT='行为表' AUTO_INCREMENT=6 ;

--
-- 转存表中的数据 `ez_action`
--

INSERT INTO `ez_action` (`id`, `rule`, `title`, `name`, `remark`, `status`) VALUES
(1, 'table:user|field:score|condition:id={$self} AND status>-1|rule:score+1|cycle:24|max:1;', '用户登录', 'user_login', '积分+1，每天一次', 1),
(2, 'table:user|field:score|condition:id={$self}|rule:score+5|cycle:24|max|5', '发布活动', 'add_event', '积分+5，每天上限5次', 1),
(3, 'table:user|field:score|condition:id={$self} AND status>-1|rule:score+10;', '用户注册', 'user_reg', '注册+10个爱心币', 1),
(4, 'table:user|field:score|condition:id={$self}|rule:score+5|cycle:24|max|10', '发布活动照片', 'add_event_pic', '积分+5,每天最多10次', 1),
(5, 'table:user|field:score|condition:id={$self}|rule:score+5|cycle:100000000|max|1', '用户资料完善', 'user_perfect', '积分+5,一个用户仅一次机会', 1);

-- --------------------------------------------------------

--
-- 表的结构 `ez_config`
--

CREATE TABLE IF NOT EXISTS `ez_config` (
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
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COMMENT='网站配置' AUTO_INCREMENT=2 ;

--
-- 转存表中的数据 `ez_config`
--

INSERT INTO `ez_config` (`id`, `tel`, `name`, `title`, `keywords`, `description`, `url`, `copyrights`, `code`, `reg`, `status`, `address`, `map`, `logo`, `beian`, `post`, `qq`, `config_extend`, `email`, `email_password`, `email_host`, `email_port`, `email_from_name`, `retrieve_email_title`, `retrieve_email_content`, `sms_name`, `sms_password`) VALUES
(1, '13502176003', '天津APP开发公司，天津网站建设公司，手机APP软件开发，企业app开发-文率科技', '天津APP开发公司，天津网站建设公司，手机APP软件开发，企业app开发-文率科技', '天津app开发，天津app公司，天津APP开发公司，天津手机APP开发，天津app软件开发，天津app定制开发，天津企业app开发', '【文率科技】是天津一家集App开发，网站建设，APP推广等综合型的互联网公司，文率手机App开发公司为顾客提供一站式的企业APP软件开发，网站建设，营销推广服务，同时为中国企业提供全面互联网电子商务解决方案，是国内综合型软件开发公司。', 'www.wenshuai.cn', 'All Power By 文率科技', '&lt;script type=&quot;text/javascript&quot;&gt;\r\nvar _bdhmProtocol = ((&quot;https:&quot; == document.location.protocol) ? &quot; https://&quot; : &quot; http://&quot;);\r\ndocument.write(unescape(&quot;%3Cscript src=''&quot; + _bdhmProtocol + &quot;hm.baidu.com/h.js%3F50bfa4da34df5130b09ff34dc492f60a'' type=''text/javascript''%3E%3C/script%3E&quot;));\r\n&lt;/script&gt;\r\n', 0, 1, '天津市东丽区先锋路61号', '117.313629,39.090595', 'config/0/0/1/13874235015889.jpg', '津ICP备13005893号', '天津市珠江道25号天津财经大学', '9476400', '[{"field_name":"\\u8fde\\u63a5","field_type":"input","field_var":"url","field_content":"www.wenshuai.cn "},{"field_name":"\\u5907\\u6848","field_type":"input","field_var":"beian","field_content":"\\u6d25ICP\\u590715002318\\u53f7"},{"field_name":"\\u7535\\u8bdd","field_type":"input","field_var":"tel","field_content":"13502176003"},{"field_name":"QQ","field_type":"input","field_var":"qq","field_content":"9476400"},{"field_name":"\\u90ae\\u7bb1","field_type":"input","field_var":"email","field_content":"9476400@qq.com"},{"field_name":"\\u7edf\\u8ba1\\u4ee3\\u7801","field_type":"textarea","field_var":"code","field_content":""},{"field_name":"\\u516c\\u53f8\\u5730\\u5740","field_type":"input","field_var":"address","field_content":"\\u5929\\u6d25\\u5e02\\u6cb3\\u897f\\u533a\\u9752\\u6797\\u5927\\u53a6B\\u5ea71016"},{"field_name":"\\u90ae\\u7f16","field_type":"input","field_var":"zipcode","field_content":"300356"},{"field_name":"\\u63a5\\u53d7\\u77ed\\u4fe1\\u7684\\u624b\\u673a","field_type":"input","field_var":"receive_sms_phone","field_content":"13502176003"},{"field_name":"\\u5fae\\u4fe1","field_type":"image","field_var":"weixin","field_content":".\\/Uploads\\/config\\/data\\/image\\/20150425\\/20150425095734_86242.jpg"},{"field_name":"\\u65b0\\u6d6a\\u5fae\\u535a","field_type":"input","field_var":"weibo","field_content":"http:\\/\\/weibo.com\\/"},{"field_name":"\\u7248\\u6743\\u4fe1\\u606f","field_type":"input","field_var":"banquan","field_content":"\\u6240\\u6709\\u7248\\u6743\\u5f52 www.wenshuai.cn "},{"field_name":" \\u62db\\u8058\\u90ae\\u7bb1","field_type":"input","field_var":"jobemail","field_content":"job.wenshuai.cn"}]', 'wenshuaitest@163.com', '123456', 'smtp.163.com', 25, 'wenshuaitest@163.com', '', '', 'bingchuan412', '8d11ab510bee00ec2073');

-- --------------------------------------------------------

--
-- 表的结构 `ez_flink`
--

CREATE TABLE IF NOT EXISTS `ez_flink` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL COMMENT '网站名称',
  `desc` varchar(255) NOT NULL COMMENT '站点描述',
  `url` varchar(255) NOT NULL COMMENT '跳转地址',
  `img` varchar(80) NOT NULL COMMENT '网站logo',
  `sort` smallint(6) unsigned NOT NULL DEFAULT '0' COMMENT '排序',
  `tid` int(11) unsigned NOT NULL DEFAULT '4' COMMENT '分类id',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COMMENT='友情链接' AUTO_INCREMENT=19 ;

--
-- 转存表中的数据 `ez_flink`
--


-- --------------------------------------------------------

--
-- 表的结构 `ez_focus`
--

CREATE TABLE IF NOT EXISTS `ez_focus` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL COMMENT '网站名称',
  `desc` varchar(255) NOT NULL COMMENT '站点描述',
  `url` varchar(255) NOT NULL COMMENT '跳转地址',
  `img` varchar(80) NOT NULL COMMENT '网站logo',
  `sort` smallint(6) unsigned NOT NULL DEFAULT '0' COMMENT '排序',
  `tid` int(11) unsigned NOT NULL DEFAULT '0' COMMENT '分类id',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COMMENT='友情链接' AUTO_INCREMENT=4 ;

--
-- 转存表中的数据 `ez_focus`
--

INSERT INTO `ez_focus` (`id`, `title`, `desc`, `url`, `img`, `sort`, `tid`) VALUES
(1, '第一张', '', 'http://www.wenshuai.cn', '', 999, 5),
(2, '第二张', '', 'https://www.baidu.com/', '', 999, 5),
(3, '第三张', '', 'https://hao.360.cn/?wd_xp1', '', 999, 5);

-- --------------------------------------------------------

--
-- 表的结构 `ez_info`
--

CREATE TABLE IF NOT EXISTS `ez_info` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `tid` int(11) DEFAULT NULL,
  `title` varchar(100) DEFAULT NULL COMMENT '名称',
  `hits` int(11) unsigned DEFAULT '0' COMMENT '点击率',
  `text` text COMMENT '内容',
  `desc` varchar(255) DEFAULT NULL COMMENT '描述',
  `sort` int(6) DEFAULT '999' COMMENT '排序',
  `img` varchar(80) NOT NULL COMMENT '图片',
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
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='信息表' AUTO_INCREMENT=1 ;

--
-- 转存表中的数据 `ez_info`
--


-- --------------------------------------------------------

--
-- 表的结构 `ez_node`
--

CREATE TABLE IF NOT EXISTS `ez_node` (
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
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COMMENT='节点表' AUTO_INCREMENT=387 ;

--
-- 转存表中的数据 `ez_node`
--

INSERT INTO `ez_node` (`id`, `name`, `title`, `status`, `remark`, `pid`, `level`, `data`, `sort`, `display`) VALUES
(1, 'Admin', '根节点', 1, '不可删除', 0, 1, NULL, 0, 0),
(2, 'index', '后台主框架模块', 1, '所有后台用户组都必须有此权限，否则后台无法登录', 1, 2, '', 10, 0),
(3, 'index', 'index方法', 1, 'Index模块的index方法', 2, 3, '', 5, 0),
(4, 'left', 'left方法', 1, 'Index模块的left方法', 2, 3, '', 3, 0),
(5, 'top', 'top方法', 1, 'Index模块的top方法', 2, 3, '', 4, 0),
(6, 'main', 'main方法', 1, 'Index模块的main方法', 2, 3, '', 1, 0),
(7, 'footer', 'footer方法', 1, 'Index模块的footer方法', 2, 3, '', 2, 0),
(8, 'Node', '菜单节点管理', 1, '', 28, 2, 'Node/index', 10, 2),
(9, 'add', '添加菜单', 1, '', 8, 3, '', 4, 0),
(10, 'edit', '修改菜单', 1, '', 8, 3, '', 3, 0),
(11, 'del', '删除菜单', 1, '', 8, 3, '', 2, 0),
(14, 'Index', '基础', 1, '', 1, 0, '', 1, 1),
(15, 'main', '系统环境', 1, '快捷菜单', 25, 0, 'Index/main', 0, 2),
(16, 'index', '菜单列表', 1, '', 8, 3, '', 5, 0),
(17, 'sort', '菜单排序', 1, '', 8, 3, '', 1, 0),
(190, 'add', '添加', 1, '', 183, 3, '', 0, 0),
(21, 'User', '用户管理', 1, '', 14, 2, '', 9, 2),
(22, 'role', '角色管理', 0, '', 21, 3, 'User/role', 1, 2),
(23, 'role_add', '角色添加', 1, '', 21, 3, 'User/role_add', 0, 0),
(25, '', '基础功能', 1, '', 14, 0, '', 1, 2),
(30, 'index', '后台用户', 1, '', 21, 3, 'User/index', 3, 2),
(28, 'extend_sub', '系统配置', 1, '', 14, 0, '', 0, 2),
(31, 'role_edit', '角色编辑', 1, '', 21, 3, '', 0, 0),
(32, 'role_del', '角色删除', 1, '', 21, 3, '', 0, 0),
(33, 'role_sort', '角色排序', 1, '', 21, 3, '', 0, 0),
(34, 'add', '用户添加', 1, '', 21, 3, '', 9, 0),
(35, 'edit', '用户编辑', 1, '', 21, 3, '', 8, 0),
(36, 'del', '用户删除', 1, '', 21, 3, '', 7, 0),
(215, 'setting', '网站配置', 1, '', 25, 3, 'Config/setting', 1, 2),
(223, 'homeUser', '前台用户', 0, '前台用户管理', 21, 3, 'User/homeUser', 3, 2),
(372, 'index', '栏目管理', 1, '', 25, 3, 'Type/index', 2, 2),
(374, 'index', '文档管理', 1, '', 25, 3, 'Info/index', 3, 2),
(382, 'index', '友情链接', 1, '', 25, 3, 'Flink/index', 5, 2),
(383, 'index', '焦点图', 1, '', 25, 3, 'focus/index', 4, 2);

-- --------------------------------------------------------

--
-- 表的结构 `ez_role`
--

CREATE TABLE IF NOT EXISTS `ez_role` (
  `id` smallint(6) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(20) NOT NULL COMMENT '后台组名',
  `pid` smallint(6) unsigned NOT NULL DEFAULT '0' COMMENT '父ID',
  `status` tinyint(1) unsigned DEFAULT '0' COMMENT '是否激活 1：是 0：否',
  `sort` smallint(6) unsigned NOT NULL DEFAULT '0' COMMENT '排序权重',
  `remark` varchar(255) DEFAULT NULL COMMENT '备注说明',
  PRIMARY KEY (`id`),
  KEY `pid` (`pid`),
  KEY `status` (`status`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COMMENT='角色表' AUTO_INCREMENT=7 ;

--
-- 转存表中的数据 `ez_role`
--

INSERT INTO `ez_role` (`id`, `name`, `pid`, `status`, `sort`, `remark`) VALUES
(1, '超级管理员', 0, 1, 50, '超级管理员组'),
(6, '售后工程师', 0, 1, 0, NULL),
(3, '站点监督员', 0, 1, 49, '站点监督员组');

-- --------------------------------------------------------

--
-- 表的结构 `ez_role_user`
--

CREATE TABLE IF NOT EXISTS `ez_role_user` (
  `user_id` int(10) unsigned NOT NULL COMMENT '用户id',
  `role_id` smallint(6) unsigned NOT NULL COMMENT '角色id',
  KEY `group_id` (`role_id`),
  KEY `user_id` (`user_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='角色和用户的对应表';

--
-- 转存表中的数据 `ez_role_user`
--

INSERT INTO `ez_role_user` (`user_id`, `role_id`) VALUES
(1, 1),
(71, 3),
(85, 6);

-- --------------------------------------------------------

--
-- 表的结构 `ez_sms`
--

CREATE TABLE IF NOT EXISTS `ez_sms` (
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
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COMMENT='短信记录' AUTO_INCREMENT=7 ;

--
-- 转存表中的数据 `ez_sms`
--

INSERT INTO `ez_sms` (`id`, `phone`, `time`, `status`, `model`, `text`, `uid`, `user_phone`, `code`) VALUES
(1, '13502176003', 1429891631, 1, 'order', '验证码：836413，请勿泄露，请在10分钟内完成。如果非本人操作，请忽略。', 0, '', '836413'),
(2, '13502176003', 1429925852, 1, 'order', '验证码：103158，请勿泄露，请在10分钟内完成。如果非本人操作，请忽略。', 0, '', '103158'),
(3, '15620613686', 1429960308, 1, 'order', '验证码：500039，请勿泄露，请在10分钟内完成。如果非本人操作，请忽略。', 0, '', '500039'),
(4, '15222145857', 1429961799, 1, 'order', '验证码：399349，请勿泄露，请在10分钟内完成。如果非本人操作，请忽略。', 0, '', '399349'),
(5, '15222145857', 1429962286, 1, 'order', '验证码：340023，请勿泄露，请在10分钟内完成。如果非本人操作，请忽略。', 0, '', '340023'),
(6, '15222145857', 1429962846, 1, 'order', '验证码：358041，请勿泄露，请在10分钟内完成。如果非本人操作，请忽略。', 0, '', '358041');

-- --------------------------------------------------------

--
-- 表的结构 `ez_type`
--

CREATE TABLE IF NOT EXISTS `ez_type` (
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
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COMMENT='分类表' AUTO_INCREMENT=6 ;

--
-- 转存表中的数据 `ez_type`
--

INSERT INTO `ez_type` (`id`, `title`, `pid`, `level`, `sort`, `status`, `desc`, `name`, `template_index`, `template_list`, `template_detail`, `template_type`, `img`, `text`, `flags`, `url`, `images`, `extend`, `keywords`, `img_status`) VALUES
(1, '根', 0, 0, 0, 1, '', '', '', '', '', 0, '', '', '', '', '', '', '', 1),
(2, '文档分类', 1, 0, 999, 1, '', '', '', '', '', 0, '', '', '', '', '', 'null', '', 1),
(3, '焦点图分类', 1, 1, 999, 1, '', '', '', '', '', 0, '', '', '', '', '', '', '', 1),
(4, '友情链接分类', 1, 1, 999, 1, '', '', '', '', '', 0, '', '', '', '', '', '', '', 1),
(5, '首页焦点图', 3, 2, 999, 1, '', '', '', '', '', 0, '', '', '', '', '', '', '', 1);

-- --------------------------------------------------------

--
-- 表的结构 `ez_user`
--

CREATE TABLE IF NOT EXISTS `ez_user` (
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
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COMMENT='用户表' AUTO_INCREMENT=87 ;

--
-- 转存表中的数据 `ez_user`
--

INSERT INTO `ez_user` (`id`, `username`, `password`, `phone`, `role`, `avatar`, `status`, `reg_time`, `last_login_time`, `last_login_ip`, `email`, `login_times`, `sex`, `qq`, `nickname`, `web_name`) VALUES
(1, 'admin', 'MDAwMDAwMDAwMLK6e6yxprqX', '0', 1, NULL, 1, NULL, 1401866650, '127.0.0.1', '645605935@qq.com', 0, 0, '', '小韩 ', '');
