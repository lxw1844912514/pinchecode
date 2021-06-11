-- MySQL dump 10.13  Distrib 5.7.18, for Linux (x86_64)
--
-- Host: localhost    Database: car_test
-- ------------------------------------------------------
-- Server version	5.7.18-log

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
-- Current Database: `car_test`
--

CREATE DATABASE /*!32312 IF NOT EXISTS*/ `car_test` /*!40100 DEFAULT CHARACTER SET utf8 */;

USE `car_test`;

--
-- Table structure for table `dc_addon_entry`
--

DROP TABLE IF EXISTS `dc_addon_entry`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `dc_addon_entry` (
  `id` int(10) NOT NULL AUTO_INCREMENT COMMENT '自增ID',
  `mpid` int(10) NOT NULL COMMENT '公众号标识',
  `addon` varchar(50) NOT NULL COMMENT '插件名称',
  `name` varchar(255) DEFAULT NULL COMMENT '入口名称',
  `act` varchar(50) NOT NULL COMMENT '操作',
  `title` varchar(255) NOT NULL COMMENT '封面标题',
  `desc` text COMMENT '封面描述',
  `cover` varchar(255) NOT NULL DEFAULT '0' COMMENT '封面图片',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='插件功能入口表';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `dc_addon_entry`
--

LOCK TABLES `dc_addon_entry` WRITE;
/*!40000 ALTER TABLE `dc_addon_entry` DISABLE KEYS */;
/*!40000 ALTER TABLE `dc_addon_entry` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `dc_addon_setting`
--

DROP TABLE IF EXISTS `dc_addon_setting`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `dc_addon_setting` (
  `id` int(10) NOT NULL AUTO_INCREMENT COMMENT '自增ID',
  `mpid` int(10) NOT NULL COMMENT '公众号标识',
  `addon` varchar(50) NOT NULL COMMENT '插件标识',
  `name` varchar(50) NOT NULL COMMENT '配置项',
  `value` text NOT NULL COMMENT '配置值',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='插件配置参数表';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `dc_addon_setting`
--

LOCK TABLES `dc_addon_setting` WRITE;
/*!40000 ALTER TABLE `dc_addon_setting` DISABLE KEYS */;
/*!40000 ALTER TABLE `dc_addon_setting` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `dc_addons`
--

DROP TABLE IF EXISTS `dc_addons`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `dc_addons` (
  `id` int(10) NOT NULL AUTO_INCREMENT COMMENT '自增ID',
  `name` varchar(255) NOT NULL COMMENT '插件名称',
  `bzname` varchar(50) NOT NULL COMMENT '标识名',
  `desc` text COMMENT '描述',
  `version` varchar(10) NOT NULL COMMENT '版本号',
  `author` varchar(50) NOT NULL COMMENT '作者姓名',
  `logo` varchar(255) NOT NULL COMMENT 'LOGO',
  `status` int(1) NOT NULL DEFAULT '1' COMMENT '状态',
  `config` text COMMENT '插件配置',
  `type` varchar(50) DEFAULT NULL COMMENT '插件分类',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COMMENT='插件表';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `dc_addons`
--

LOCK TABLES `dc_addons` WRITE;
/*!40000 ALTER TABLE `dc_addons` DISABLE KEYS */;
INSERT INTO `dc_addons` VALUES (1,'拼车','pinche','在线拼车 kuhou.net','1.2.3','宝树','http://car.com/Addons/pinche/logo.png',1,'{\"index_url\":\"\\/index.php?s=\\/addon\\/pinche\\/web\\/setting\",\"respond_rule\":0,\"setting\":1,\"entry\":1,\"menu\":1,\"entry_list\":{\"index\":\"\\u4e3b\\u9875\"},\"menu_list\":{\"messages\":\"\\u4fe1\\u606f\\u7ba1\\u7406\"},\"setting_list\":{\"title\":{\"title\":\"\\u6807\\u9898\",\"type\":\"text\",\"placeholder\":\"\"},\"ad1\":{\"title\":\"\\u9996\\u9875\\u5e7b\\u706f\\u72471\",\"type\":\"image\",\"placeholder\":\"\"},\"ad1url\":{\"title\":\"\\u5e7b\\u706f\\u72471\\u8df3\\u8f6c\\u94fe\\u63a5\",\"type\":\"text\"},\"ad2\":{\"title\":\"\\u9996\\u9875\\u5e7b\\u706f\\u72472\",\"type\":\"image\",\"placeholder\":\"\"},\"ad2url\":{\"title\":\"\\u5e7b\\u706f\\u72472\\u8df3\\u8f6c\\u94fe\\u63a5\",\"type\":\"text\"},\"ad3\":{\"title\":\"\\u9996\\u9875\\u5e7b\\u706f\\u72473\",\"type\":\"image\",\"placeholder\":\"\"},\"ad3url\":{\"title\":\"\\u5e7b\\u706f\\u72473\\u8df3\\u8f6c\\u94fe\\u63a5\",\"type\":\"text\"},\"user_add_num\":{\"title\":\"\\u7528\\u6237\\u6bcf\\u65e5\\u6700\\u591a\\u53d1\\u5e03\\u6570\\u91cf\",\"type\":\"text\"},\"timeout\":{\"title\":\"\\u8fc7\\u671f\\u662f\\u5426\\u663e\\u793a\",\"type\":\"radio\",\"format\":\"enum\",\"extra\":{\"options\":{\"1\":\"\\u662f\",\"2\":\"\\u5426\"}}},\"attention\":{\"title\":\"\\u662f\\u5426\\u5fc5\\u987b\\u5173\\u6ce8\\u624d\\u53ef\\u4ee5\\u4f7f\\u7528\",\"type\":\"radio\",\"format\":\"enum\",\"extra\":{\"options\":{\"1\":\"\\u662f\",\"2\":\"\\u5426\"}},\"tip\":\"\\u5982\\u679c\\u201c\\u662f\\u201d\\uff0c\\u53ea\\u6709\\u5173\\u6ce8\\u624d\\u53ef\\u4ee5\\u4f7f\\u7528\\uff0c\\u5426\\u5219\\u8df3\\u51fa\\u4e8c\\u7ef4\\u7801\"},\"user_center_is_show_charge\":{\"title\":\"\\u7528\\u6237\\u4e2d\\u5fc3\\u662f\\u5426\\u663e\\u793a\\u3010\\u6211\\u7684\\u4f59\\u989d\\u3011\",\"type\":\"radio\",\"format\":\"enum\",\"extra\":{\"options\":{\"1\":\"\\u662f\",\"2\":\"\\u5426\"}}},\"charge\":{\"title\":\"\\u53d1\\u5e03\\u6536\\u8d39\\u91d1\\u989d(\\u6263\\u7528\\u6237\\u4f59\\u989d)\",\"type\":\"text\",\"placeholder\":\"\\u7559\\u7a7a\\u6216\\u4e3a0\\u5219\\u4e0d\\u6536\\u8d39\"},\"charge1\":{\"title\":\"\\u7f6e\\u9876\\u6536\\u8d39\\u7b2c\\u4e00\\u6863\",\"type\":\"text\",\"placeholder\":\"\\u683c\\u5f0f \\u5982\\uff1a 1#2 \\u4ee3\\u88681\\u59292\\u5143\"},\"charge2\":{\"title\":\"\\u7f6e\\u9876\\u6536\\u8d39\\u7b2c\\u4e8c\\u6863\",\"type\":\"text\",\"placeholder\":\"\\u683c\\u5f0f \\u5982\\uff1a 3#5 \\u4ee3\\u88683\\u59295\\u5143\"},\"charge3\":{\"title\":\"\\u7f6e\\u9876\\u6536\\u8d39\\u7b2c\\u4e09\\u6863\",\"type\":\"text\",\"placeholder\":\"\\u683c\\u5f0f \\u5982\\uff1a 30#30 \\u4ee3\\u886830\\u592930\\u5143\"},\"recharge\":{\"title\":\"\\u5145\\u503c\\u989d\\u5ea6\\u8bbe\\u7f6e\",\"type\":\"textarea\",\"placeholder\":\"5,10,30,100\",\"tip\":\"\\u5355\\u4f4d\\uff1a\\u5143\\u3002\\u591a\\u4e2a\\u5145\\u503c\\u989d\\u5ea6\\u7528\\u82f1\\u6587\\u9017\\u53f7(,)\\u5206\\u5f00\"},\"share_title\":{\"title\":\"\\u5206\\u4eab\\u6807\\u9898\",\"type\":\"text\",\"placeholder\":\"\"},\"share_desc\":{\"title\":\"\\u5206\\u4eab\\u63cf\\u8ff0\",\"type\":\"text\",\"placeholder\":\"\"},\"share_pic\":{\"title\":\"\\u9996\\u9875\\u5206\\u4eab\\u56fe\\u7247\",\"type\":\"image\",\"placeholder\":\"\"}}}',NULL);
/*!40000 ALTER TABLE `dc_addons` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `dc_addons_access`
--

DROP TABLE IF EXISTS `dc_addons_access`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `dc_addons_access` (
  `user_id` int(10) NOT NULL,
  `addon` varchar(50) NOT NULL,
  `mpid` int(10) NOT NULL,
  `status` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `dc_addons_access`
--

LOCK TABLES `dc_addons_access` WRITE;
/*!40000 ALTER TABLE `dc_addons_access` DISABLE KEYS */;
/*!40000 ALTER TABLE `dc_addons_access` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `dc_attach`
--

DROP TABLE IF EXISTS `dc_attach`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `dc_attach` (
  `id` int(10) NOT NULL AUTO_INCREMENT COMMENT '自增ID',
  `mpid` int(10) DEFAULT NULL COMMENT '公众号ID',
  `user_id` int(10) DEFAULT NULL COMMENT '上传者的用户ID',
  `file_name` varchar(255) DEFAULT NULL COMMENT '文件名',
  `file_extension` varchar(10) DEFAULT NULL COMMENT '附件后缀名',
  `file_size` int(10) DEFAULT NULL COMMENT '附件大小',
  `file_path` varchar(255) DEFAULT NULL COMMENT '附件存储位置',
  `hash` varchar(50) DEFAULT NULL COMMENT '哈希',
  `create_time` int(10) DEFAULT NULL COMMENT '附件创建时间',
  `item_type` varchar(50) DEFAULT NULL COMMENT '类型',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8 COMMENT='附件表';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `dc_attach`
--

LOCK TABLES `dc_attach` WRITE;
/*!40000 ALTER TABLE `dc_attach` DISABLE KEYS */;
INSERT INTO `dc_attach` VALUES (1,0,1,'t01f47a775b47528dc2.png','png',13820,'./Uploads/Pictures/20210407/606d84e40cb12.png','8335e128f47a775b47528dc2404257d7',1617790180,'image'),(2,0,1,'xin.jpg','jpg',21683,'./Uploads/Pictures/20210407/606d84f10eba8.jpg','3517ad7f8e05ce97bb76f990eec25c38',1617790193,'image'),(3,1,1,'2 2.jpg','jpg',44947,'./Uploads/Pictures/20210413/6074746550336.jpg','2ec5b6a4fcd08d1b44a264f4bf86ed82',1618244709,'image'),(4,1,1,'1 2.jpg','jpg',35656,'./Uploads/Pictures/20210413/607475c2cbb2e.jpg','271ac638c0fcaa2fee13747d3eccf4a6',1618245058,'image'),(5,1,1,'2 2.jpg','jpg',44947,'./Uploads/Pictures/20210413/607475d00a12f.jpg','2ec5b6a4fcd08d1b44a264f4bf86ed82',1618245072,'image'),(6,1,1,'4.jpeg','jpeg',17362,'./Uploads/Pictures/20210414/60766d232299a.jpeg','ede3526e5f4fa285701621b7d67dfca6',1618373923,'image'),(7,1,1,'5.jpeg','jpeg',17909,'./Uploads/Pictures/20210414/60766e2801933.jpeg','a16266bdde34743776a0bb432ffb6553',1618374184,'image');
/*!40000 ALTER TABLE `dc_attach` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `dc_bs_pay_list`
--

DROP TABLE IF EXISTS `dc_bs_pay_list`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `dc_bs_pay_list` (
  `id` int(10) NOT NULL AUTO_INCREMENT COMMENT '自增ID',
  `mpid` int(10) DEFAULT NULL COMMENT '公众号标识',
  `openid` varchar(255) DEFAULT NULL COMMENT '用户标识',
  `money` float(10,2) DEFAULT NULL COMMENT '付款金额',
  `pay_status` int(1) NOT NULL DEFAULT '0' COMMENT '支付状态',
  `create_time` int(10) DEFAULT NULL COMMENT '创建时间',
  `is_show` tinyint(1) DEFAULT NULL COMMENT '是否显示',
  `is_ok` tinyint(1) DEFAULT NULL COMMENT '是否完成',
  `orderid` varchar(50) DEFAULT NULL COMMENT '订单号',
  `info_id` int(10) DEFAULT NULL,
  `top_time` int(10) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COMMENT='vip支付列表';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `dc_bs_pay_list`
--

LOCK TABLES `dc_bs_pay_list` WRITE;
/*!40000 ALTER TABLE `dc_bs_pay_list` DISABLE KEYS */;
INSERT INTO `dc_bs_pay_list` VALUES (1,1,NULL,100.00,0,1617795808,0,0,'11617795808',NULL,NULL),(2,1,NULL,5.00,0,1617974543,0,0,'11617974543',NULL,NULL),(3,1,NULL,5.00,0,1617974556,0,0,'11617974556',NULL,NULL),(4,1,NULL,5.00,0,1618111838,0,0,'11618111838',NULL,NULL);
/*!40000 ALTER TABLE `dc_bs_pay_list` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `dc_bs_pinche`
--

DROP TABLE IF EXISTS `dc_bs_pinche`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `dc_bs_pinche` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '自增ID',
  `mpid` int(10) DEFAULT NULL COMMENT '公众号标识',
  `openid` varchar(255) DEFAULT NULL COMMENT '用户标识',
  `nickname` varchar(50) NOT NULL COMMENT '用户昵称',
  `types` varchar(10) NOT NULL COMMENT '拼车类型',
  `gotime` varchar(20) DEFAULT NULL COMMENT '出发时间',
  `time_add` varchar(50) DEFAULT NULL COMMENT '时间补充',
  `from` varchar(100) DEFAULT NULL COMMENT '出发地',
  `to` varchar(100) DEFAULT NULL COMMENT '目的地',
  `money` decimal(6,2) DEFAULT NULL COMMENT '价格',
  `num` int(3) DEFAULT NULL COMMENT '座位数量',
  `cartype` tinyint(1) DEFAULT NULL COMMENT '车型',
  `through` varchar(100) DEFAULT NULL COMMENT '途经',
  `people_count` int(2) DEFAULT NULL COMMENT '人数',
  `remark` text COMMENT '备注',
  `contact` varchar(20) DEFAULT NULL COMMENT '联系人',
  `tel` varchar(11) DEFAULT NULL COMMENT '联系电话',
  `pubtime` varchar(20) DEFAULT NULL COMMENT '发布时间',
  `is_top` char(1) NOT NULL DEFAULT '0' COMMENT '是否置顶',
  `status` tinyint(1) DEFAULT '1' COMMENT '状态',
  `top_time` int(10) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=utf8 COMMENT='拼车';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `dc_bs_pinche`
--

LOCK TABLES `dc_bs_pinche` WRITE;
/*!40000 ALTER TABLE `dc_bs_pinche` DISABLE KEYS */;
INSERT INTO `dc_bs_pinche` VALUES (1,0,NULL,'606d56bb168a3','1','1617778963',NULL,'邯郸','北京',22.00,22,1,'22',0,'sdfab','22','2222222','1617778363','0',1,NULL),(2,1,NULL,'60704d2dcf005','1','1617973125',NULL,'北京','衡水',22.00,22,1,'22',0,'sdfa','22','2222222','1617972525','0',1,NULL),(5,1,NULL,'admin','1','1618139349',NULL,'北京','邯郸',100.00,5,1,'廊坊,邢台,衡水',0,'无','李先生','18231879999','1618138749','0',1,NULL),(4,1,NULL,'1234567','2','1617974851',NULL,'邢台','北京',22.00,0,0,'',3,'343','李先生','2222222','1617974251','0',1,NULL),(6,1,NULL,'李先生','1','1619827320',NULL,'北京','邯郸',100.00,1,1,'廊坊,衡水',5,'无行李','宋女士','18297654356','1618402455','0',1,NULL),(7,1,NULL,'123456','1','1618602900',NULL,'北京','邯郸',100.00,2,1,'衡水',0,'无','段先生','18309876524','1618474185','0',1,NULL),(8,0,NULL,'和和hi','1','1622886580',NULL,'邯郸','北京',232.00,2,2,'汉北,廊坊,衡水',0,'无','22','2222222','1622885980','0',1,NULL);
/*!40000 ALTER TABLE `dc_bs_pinche` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `dc_bs_user`
--

DROP TABLE IF EXISTS `dc_bs_user`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `dc_bs_user` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL DEFAULT '' COMMENT '昵称',
  `password` varchar(60) NOT NULL DEFAULT '' COMMENT '密码',
  `gender` tinyint(4) NOT NULL DEFAULT '1' COMMENT '性别:1:男 2:女',
  `headImg` varchar(255) NOT NULL DEFAULT '' COMMENT '头像',
  `email` varchar(50) NOT NULL DEFAULT '' COMMENT '邮箱',
  `phonenum` char(11) NOT NULL DEFAULT '0' COMMENT '手机号',
  `type` tinyint(1) NOT NULL DEFAULT '0' COMMENT '1乘客  2司机 ',
  `status` tinyint(4) NOT NULL DEFAULT '1' COMMENT '状态:1:正常 0:已删除',
  `created_at` int(11) DEFAULT NULL COMMENT '添加时间',
  `updated_at` int(11) DEFAULT NULL COMMENT '更新时间',
  PRIMARY KEY (`id`),
  UNIQUE KEY `car_user_name_password` (`name`,`password`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=utf8mb4 COMMENT='用户表';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `dc_bs_user`
--

LOCK TABLES `dc_bs_user` WRITE;
/*!40000 ALTER TABLE `dc_bs_user` DISABLE KEYS */;
INSERT INTO `dc_bs_user` VALUES (1,'二万二千那','33333',1,'','','33333',2,0,NULL,1618240265),(4,'好人一生平安','96e79218965eb72c92a549dd5a330112',1,'','1844912514@qq.com','18244444666',1,0,1617967949,1622885874),(5,'是是是','士大夫撒发',1,'','','0',1,0,NULL,1618239764),(6,'是是是','97866a9c805a7a4b9420e4d5057b4b39',1,'','12514@qq.com','183445667',1,1,1617968313,NULL),(14,'士大夫撒发','65e161beb4fb4fa74d5f8b33f6e0b488',1,'','1827001@163.com','135999087',1,1,1617969713,NULL),(15,'额外','e5909cea38572a7b2fc7341f9ddb7abe',1,'','xiangli@xinyinhe.com','13599876',1,1,1617969800,NULL),(16,'123456','96e79218965eb72c92a549dd5a330112',1,'','','111111',1,1,1617970889,NULL),(17,'1234567','96e79218965eb72c92a549dd5a330112',1,'','','123456',1,0,1617972453,1618372653),(18,'King1234','96e79218965eb72c92a549dd5a330112',1,'','','1823186000',2,1,1618136192,NULL),(19,'king22','96e79218965eb72c92a549dd5a330112',1,'','','18231837000',2,1,1618136270,NULL),(20,'李先生','96e79218965eb72c92a549dd5a330112',1,'','','13589076547',2,1,1618393805,NULL),(21,'和和hi','db3686d63e3317e74ff043e5955b3ad8',1,'','','18231867888',1,1,1622884135,NULL);
/*!40000 ALTER TABLE `dc_bs_user` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `dc_car`
--

DROP TABLE IF EXISTS `dc_car`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `dc_car` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL DEFAULT '' COMMENT '品牌名称',
  `type` int(11) unsigned NOT NULL DEFAULT '0' COMMENT '车型',
  `car_img` varchar(255) NOT NULL DEFAULT '' COMMENT '汽车图片',
  `car_type` int(11) DEFAULT NULL COMMENT '车型1 小轿车 2 SUV 3: 微面'' 4:货车',
  `steatnum` int(11) unsigned NOT NULL DEFAULT '0' COMMENT '座位数',
  `color` char(20) NOT NULL DEFAULT '' COMMENT '颜色',
  `buy_year` int(11) NOT NULL DEFAULT '0' COMMENT '生产年份',
  `status` tinyint(4) NOT NULL DEFAULT '1' COMMENT '状态:1:正常 0:已删除',
  `created_at` int(11) DEFAULT NULL COMMENT '添加时间',
  `updated_at` int(11) DEFAULT NULL COMMENT '更新时间',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COMMENT='汽车表';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `dc_car`
--

LOCK TABLES `dc_car` WRITE;
/*!40000 ALTER TABLE `dc_car` DISABLE KEYS */;
INSERT INTO `dc_car` VALUES (2,'江淮',2,'http://car.com/Uploads/Pictures/20210414/60766e2801933.jpeg',1,5,'2',0,1,1618245073,NULL),(3,'雪佛兰',2,'http://car.com/Uploads/Pictures/20210414/60766d232299a.jpeg',2,5,'3',0,1,1618373932,NULL);
/*!40000 ALTER TABLE `dc_car` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `dc_mp`
--

DROP TABLE IF EXISTS `dc_mp`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `dc_mp` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '自增ID',
  `user_id` int(10) NOT NULL COMMENT '用户ID',
  `group_id` varchar(50) DEFAULT NULL COMMENT '可用套餐ID',
  `name` varchar(50) NOT NULL COMMENT '公众号名称',
  `origin_id` varchar(50) NOT NULL COMMENT '公众号原始ID',
  `type` int(1) NOT NULL DEFAULT '0' COMMENT '公众号类型（1：普通订阅号；2：认证订阅号；3：普通服务号；4：认证服务号',
  `status` tinyint(1) NOT NULL DEFAULT '1' COMMENT '状态（0：禁用，1：正常，2：审核中）',
  `create_time` int(10) NOT NULL COMMENT '创建时间',
  `valid_token` varchar(40) DEFAULT NULL COMMENT '接口验证Token',
  `token` varchar(50) DEFAULT NULL COMMENT '公众号标识',
  `encodingaeskey` varchar(50) DEFAULT NULL COMMENT '消息加解密秘钥',
  `appid` varchar(50) DEFAULT NULL COMMENT 'AppId',
  `appsecret` varchar(50) DEFAULT NULL COMMENT 'AppSecret',
  `mp_number` varchar(50) DEFAULT NULL COMMENT '微信号',
  `desc` text COMMENT '描述',
  `headimg` varchar(255) DEFAULT NULL COMMENT '头像',
  `qrcode` varchar(255) DEFAULT NULL COMMENT '二维码',
  `login_name` varchar(50) DEFAULT NULL COMMENT '公众号登录名',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COMMENT='公众号表';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `dc_mp`
--

LOCK TABLES `dc_mp` WRITE;
/*!40000 ALTER TABLE `dc_mp` DISABLE KEYS */;
INSERT INTO `dc_mp` VALUES (1,1,NULL,'青春阳光','gh_123456789012',5,1,1617794830,'EOmSq8yyRw3PZrQ2ebH1a0aRniBloOfi','e4b3cfad4ec623fac768bb0e0865a2ec','9hHhpjPEobM2u0MURwdmL6kziWxgYVX8k3d5va03vvF','wxec20bf2e581b35e2','fdd97dcae5a614543a0f61dc5c3a8ec4','l1844912514',NULL,'http://car.com/Uploads/Pictures/20210407/606d84e40cb12.png','http://car.com/Uploads/Pictures/20210407/606d84f10eba8.jpg',NULL);
/*!40000 ALTER TABLE `dc_mp` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `dc_mp_auto_reply`
--

DROP TABLE IF EXISTS `dc_mp_auto_reply`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `dc_mp_auto_reply` (
  `id` int(10) NOT NULL AUTO_INCREMENT COMMENT '自增ID',
  `mpid` int(10) NOT NULL COMMENT '公众号标识',
  `type` varchar(50) DEFAULT NULL COMMENT '回复场景',
  `reply_type` varchar(50) DEFAULT NULL COMMENT '回复类型',
  `material_id` int(10) DEFAULT NULL COMMENT '回复素材ID',
  `keyword` varchar(50) DEFAULT NULL COMMENT '绑定的关键词',
  `addon` varchar(50) DEFAULT NULL COMMENT '处理消息的插件',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='公众号自动回复表';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `dc_mp_auto_reply`
--

LOCK TABLES `dc_mp_auto_reply` WRITE;
/*!40000 ALTER TABLE `dc_mp_auto_reply` DISABLE KEYS */;
/*!40000 ALTER TABLE `dc_mp_auto_reply` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `dc_mp_fans`
--

DROP TABLE IF EXISTS `dc_mp_fans`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `dc_mp_fans` (
  `id` int(10) NOT NULL AUTO_INCREMENT COMMENT '自增ID',
  `mpid` int(10) NOT NULL COMMENT '公众号标识',
  `openid` varchar(255) NOT NULL COMMENT '粉丝标识',
  `is_subscribe` tinyint(1) NOT NULL DEFAULT '0' COMMENT '是否关注',
  `subscribe_time` int(10) DEFAULT NULL COMMENT '关注时间',
  `unsubscribe_time` int(10) DEFAULT NULL COMMENT '取消关注时间',
  `nickname` varchar(50) CHARACTER SET utf8mb4 DEFAULT NULL COMMENT '粉丝昵称',
  `sex` tinyint(1) DEFAULT NULL COMMENT '粉丝性别',
  `headimgurl` varchar(255) DEFAULT NULL COMMENT '粉丝头像',
  `relname` varchar(50) DEFAULT NULL COMMENT '真实姓名',
  `signature` text COMMENT '个性签名',
  `mobile` varchar(15) DEFAULT NULL COMMENT '手机号',
  `is_bind` tinyint(1) NOT NULL DEFAULT '0' COMMENT '是否绑定',
  `language` varchar(50) DEFAULT NULL COMMENT '使用语言',
  `country` varchar(50) DEFAULT NULL COMMENT '国家',
  `province` varchar(50) DEFAULT NULL COMMENT '身份',
  `city` varchar(50) DEFAULT NULL COMMENT '城市',
  `remark` varchar(50) DEFAULT NULL COMMENT '备注',
  `groupid` int(10) DEFAULT NULL COMMENT '分组ID',
  `tagid_list` varchar(255) DEFAULT NULL COMMENT '标签',
  `score` int(10) DEFAULT '0' COMMENT '积分',
  `money` int(10) DEFAULT '0' COMMENT '金钱',
  `latitude` varchar(50) DEFAULT NULL COMMENT '纬度',
  `longitude` varchar(50) DEFAULT NULL COMMENT '经度',
  `location_precision` varchar(50) DEFAULT NULL COMMENT '精度',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COMMENT='公众号粉丝表';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `dc_mp_fans`
--

LOCK TABLES `dc_mp_fans` WRITE;
/*!40000 ALTER TABLE `dc_mp_fans` DISABLE KEYS */;
INSERT INTO `dc_mp_fans` VALUES (1,1213,'oBKxE1a22E9fV9ay4a0THFMqhlnE',1,NULL,NULL,'谷梅',1,'http://thirdwx.qlogo.cn/mmopen/vi_32/Q0j4TwGTfTIpRhjAhJfzicgJibdzvibVib8RyvePLh0wBRGlcj3Rg02uB0GkDpoB7OYlBMgtqYVsJAwZJiaswpH4eHw/132',NULL,NULL,NULL,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,0,NULL,NULL,NULL);
/*!40000 ALTER TABLE `dc_mp_fans` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `dc_mp_group`
--

DROP TABLE IF EXISTS `dc_mp_group`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `dc_mp_group` (
  `id` int(10) NOT NULL AUTO_INCREMENT COMMENT '自增ID',
  `name` varchar(255) NOT NULL COMMENT '套餐名称',
  `addons` text COMMENT '可管理的插件',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COMMENT='公众号套餐表';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `dc_mp_group`
--

LOCK TABLES `dc_mp_group` WRITE;
/*!40000 ALTER TABLE `dc_mp_group` DISABLE KEYS */;
INSERT INTO `dc_mp_group` VALUES (1,'Anchor Manager333',NULL);
/*!40000 ALTER TABLE `dc_mp_group` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `dc_mp_material`
--

DROP TABLE IF EXISTS `dc_mp_material`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `dc_mp_material` (
  `id` int(10) NOT NULL AUTO_INCREMENT COMMENT '自增ID',
  `mpid` int(10) NOT NULL COMMENT '公众号标识',
  `type` varchar(50) DEFAULT NULL COMMENT '素材类型',
  `content` text COMMENT '文本素材内容',
  `image` varchar(255) DEFAULT NULL COMMENT '图片素材路径',
  `title` varchar(255) DEFAULT NULL COMMENT '图文素材标题',
  `picurl` varchar(255) DEFAULT NULL COMMENT '图文素材封面',
  `url` varchar(255) DEFAULT NULL COMMENT '图文链接',
  `description` text COMMENT '图文素材描述',
  `detail` text COMMENT '图文素材详情',
  `create_time` int(10) DEFAULT NULL COMMENT '素材创建时间',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='公众号素材表';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `dc_mp_material`
--

LOCK TABLES `dc_mp_material` WRITE;
/*!40000 ALTER TABLE `dc_mp_material` DISABLE KEYS */;
/*!40000 ALTER TABLE `dc_mp_material` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `dc_mp_message`
--

DROP TABLE IF EXISTS `dc_mp_message`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `dc_mp_message` (
  `id` int(10) NOT NULL AUTO_INCREMENT COMMENT '自增ID',
  `mpid` int(10) NOT NULL COMMENT '公众号标识',
  `openid` varchar(50) NOT NULL COMMENT '用户标识',
  `msgid` varchar(50) DEFAULT NULL COMMENT '消息ID',
  `msgtype` varchar(10) NOT NULL COMMENT '消息类型',
  `content` text COMMENT '消息内容',
  `create_time` int(10) NOT NULL COMMENT '消息发送时间',
  `picurl` varchar(255) DEFAULT NULL COMMENT '图片链接',
  `mediaid` varchar(255) DEFAULT NULL COMMENT '媒体ID',
  `format` varchar(50) DEFAULT NULL COMMENT '语音格式',
  `recognition` text COMMENT '语音识别结果',
  `thumb_mediaid` varchar(255) DEFAULT NULL COMMENT '视频消息缩略图ID',
  `location_x` float DEFAULT NULL COMMENT '地理位置纬度',
  `location_y` float DEFAULT NULL COMMENT '地理位置精度',
  `scale` int(5) DEFAULT NULL COMMENT '地图缩放大小',
  `label` varchar(50) DEFAULT NULL COMMENT '地理位置信息',
  `title` varchar(255) DEFAULT NULL COMMENT '链接消息标题',
  `description` varchar(255) DEFAULT NULL COMMENT '链接消息描述',
  `url` varchar(255) DEFAULT NULL COMMENT '链接消息地址',
  `reply_status` tinyint(1) NOT NULL DEFAULT '0' COMMENT '回复状态',
  `save_status` tinyint(1) NOT NULL DEFAULT '0' COMMENT '保存为素材状态',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='消息表';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `dc_mp_message`
--

LOCK TABLES `dc_mp_message` WRITE;
/*!40000 ALTER TABLE `dc_mp_message` DISABLE KEYS */;
/*!40000 ALTER TABLE `dc_mp_message` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `dc_mp_payment`
--

DROP TABLE IF EXISTS `dc_mp_payment`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `dc_mp_payment` (
  `id` int(10) NOT NULL AUTO_INCREMENT COMMENT '自增ID',
  `mpid` int(10) NOT NULL COMMENT '公众号标识',
  `openid` varchar(255) DEFAULT NULL COMMENT '用户标识',
  `orderid` varchar(255) DEFAULT NULL COMMENT '订单号',
  `create_time` int(10) DEFAULT NULL COMMENT '支付时间',
  `detail` text COMMENT '支付详情',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='公众号支付配置';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `dc_mp_payment`
--

LOCK TABLES `dc_mp_payment` WRITE;
/*!40000 ALTER TABLE `dc_mp_payment` DISABLE KEYS */;
/*!40000 ALTER TABLE `dc_mp_payment` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `dc_mp_rule`
--

DROP TABLE IF EXISTS `dc_mp_rule`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `dc_mp_rule` (
  `id` int(10) NOT NULL AUTO_INCREMENT COMMENT '自增ID',
  `mpid` int(10) NOT NULL COMMENT '公众号ID',
  `addon` varchar(50) DEFAULT NULL COMMENT '插件标识',
  `keyword` varchar(255) DEFAULT NULL COMMENT '关键词内容',
  `type` varchar(50) DEFAULT NULL COMMENT '触发类型',
  `entry_id` int(10) DEFAULT NULL COMMENT '功能入口ID',
  `reply_id` int(10) DEFAULT NULL COMMENT '自动回复ID',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='公众号响应规则';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `dc_mp_rule`
--

LOCK TABLES `dc_mp_rule` WRITE;
/*!40000 ALTER TABLE `dc_mp_rule` DISABLE KEYS */;
/*!40000 ALTER TABLE `dc_mp_rule` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `dc_mp_score_record`
--

DROP TABLE IF EXISTS `dc_mp_score_record`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `dc_mp_score_record` (
  `id` int(10) NOT NULL AUTO_INCREMENT COMMENT '自增ID',
  `mpid` int(10) NOT NULL COMMENT '公众号标识',
  `openid` varchar(255) NOT NULL COMMENT '粉丝openid',
  `type` varchar(50) DEFAULT 'score' COMMENT '积分类型，socre、money等',
  `source` varchar(50) DEFAULT 'system' COMMENT '积分来源，system，addon',
  `value` int(10) NOT NULL COMMENT '积分值',
  `flag` varchar(50) DEFAULT NULL COMMENT '标识，fans_bind，IdouChat',
  `remark` text COMMENT '积分说明',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='积分记录表';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `dc_mp_score_record`
--

LOCK TABLES `dc_mp_score_record` WRITE;
/*!40000 ALTER TABLE `dc_mp_score_record` DISABLE KEYS */;
/*!40000 ALTER TABLE `dc_mp_score_record` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `dc_mp_setting`
--

DROP TABLE IF EXISTS `dc_mp_setting`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `dc_mp_setting` (
  `id` int(10) NOT NULL AUTO_INCREMENT COMMENT '自增ID',
  `mpid` int(10) NOT NULL COMMENT '公众号ID',
  `name` varchar(255) NOT NULL COMMENT '配置项',
  `value` text COMMENT '配置值',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='公众号配置';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `dc_mp_setting`
--

LOCK TABLES `dc_mp_setting` WRITE;
/*!40000 ALTER TABLE `dc_mp_setting` DISABLE KEYS */;
/*!40000 ALTER TABLE `dc_mp_setting` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `dc_opinion`
--

DROP TABLE IF EXISTS `dc_opinion`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `dc_opinion` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(11) unsigned NOT NULL DEFAULT '0' COMMENT '发布者id',
  `name` varchar(100) NOT NULL DEFAULT '' COMMENT '名称',
  `content` varchar(250) NOT NULL DEFAULT '0' COMMENT '内容',
  `created_at` int(11) DEFAULT NULL COMMENT '添加时间',
  `updated_at` int(11) DEFAULT NULL COMMENT '更新时间',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COMMENT='意见反馈表';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `dc_opinion`
--

LOCK TABLES `dc_opinion` WRITE;
/*!40000 ALTER TABLE `dc_opinion` DISABLE KEYS */;
INSERT INTO `dc_opinion` VALUES (2,19,'king22','其他乘客在车上吸烟',1618137961,NULL),(3,19,'king22','你们做的很棒,继续加油',1618138002,NULL),(4,20,'李先生','建议同乘人员不要在车上吸烟,避免影响好旅途心情',1618402850,NULL);
/*!40000 ALTER TABLE `dc_opinion` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `dc_rbac_access`
--

DROP TABLE IF EXISTS `dc_rbac_access`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `dc_rbac_access` (
  `role_id` smallint(6) unsigned NOT NULL,
  `node_id` smallint(6) unsigned NOT NULL,
  `level` tinyint(1) NOT NULL,
  `module` varchar(50) DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1' COMMENT '开启状态'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `dc_rbac_access`
--

LOCK TABLES `dc_rbac_access` WRITE;
/*!40000 ALTER TABLE `dc_rbac_access` DISABLE KEYS */;
/*!40000 ALTER TABLE `dc_rbac_access` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `dc_rbac_mp_access`
--

DROP TABLE IF EXISTS `dc_rbac_mp_access`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `dc_rbac_mp_access` (
  `role_id` int(10) NOT NULL COMMENT '角色ID',
  `mp_groups` varchar(255) DEFAULT NULL COMMENT '可使用的公众号套餐',
  `mp_count` int(5) DEFAULT NULL COMMENT '可创建公众号数',
  `register_invite_count` int(10) DEFAULT NULL COMMENT '注册邀请数',
  `addons` varchar(255) DEFAULT NULL COMMENT '插件权限'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='公众号权限表';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `dc_rbac_mp_access`
--

LOCK TABLES `dc_rbac_mp_access` WRITE;
/*!40000 ALTER TABLE `dc_rbac_mp_access` DISABLE KEYS */;
INSERT INTO `dc_rbac_mp_access` VALUES (2,'\"\"',0,0,'\"\"');
/*!40000 ALTER TABLE `dc_rbac_mp_access` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `dc_rbac_node`
--

DROP TABLE IF EXISTS `dc_rbac_node`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `dc_rbac_node` (
  `id` smallint(6) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(20) NOT NULL,
  `title` varchar(50) DEFAULT NULL,
  `status` tinyint(1) DEFAULT '0',
  `remark` varchar(255) DEFAULT NULL,
  `sort` smallint(6) unsigned DEFAULT NULL,
  `pid` smallint(6) unsigned NOT NULL,
  `level` tinyint(1) unsigned NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `dc_rbac_node`
--

LOCK TABLES `dc_rbac_node` WRITE;
/*!40000 ALTER TABLE `dc_rbac_node` DISABLE KEYS */;
/*!40000 ALTER TABLE `dc_rbac_node` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `dc_rbac_role`
--

DROP TABLE IF EXISTS `dc_rbac_role`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `dc_rbac_role` (
  `id` smallint(6) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(20) NOT NULL,
  `pid` smallint(6) DEFAULT NULL,
  `status` tinyint(1) unsigned DEFAULT NULL,
  `remark` varchar(255) DEFAULT NULL,
  `type` varchar(50) DEFAULT NULL COMMENT '角色类型',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `dc_rbac_role`
--

LOCK TABLES `dc_rbac_role` WRITE;
/*!40000 ALTER TABLE `dc_rbac_role` DISABLE KEYS */;
INSERT INTO `dc_rbac_role` VALUES (1,'超级管理员',0,1,'拥有系统管理和公众号管理权限','system_manager'),(2,'系统管理员',0,1,'拥有系统后台管理权限','admin_manager'),(5,'司机人员',0,1,'司机','system_manager'),(6,'乘客人员',0,1,'乘客','system_manager');
/*!40000 ALTER TABLE `dc_rbac_role` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `dc_rbac_role_user`
--

DROP TABLE IF EXISTS `dc_rbac_role_user`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `dc_rbac_role_user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `role_id` mediumint(9) unsigned DEFAULT NULL,
  `user_id` char(32) DEFAULT NULL,
  `passenger_id` char(32) DEFAULT NULL,
  `driver_id` char(32) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `role_user_key` (`role_id`,`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `dc_rbac_role_user`
--

LOCK TABLES `dc_rbac_role_user` WRITE;
/*!40000 ALTER TABLE `dc_rbac_role_user` DISABLE KEYS */;
INSERT INTO `dc_rbac_role_user` VALUES (2,1,'1',NULL,NULL),(3,1,'3',NULL,NULL),(4,2,'2',NULL,NULL);
/*!40000 ALTER TABLE `dc_rbac_role_user` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `dc_scene_qrcode`
--

DROP TABLE IF EXISTS `dc_scene_qrcode`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `dc_scene_qrcode` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '主键',
  `mpid` int(10) DEFAULT NULL COMMENT '公众号标识',
  `scene_name` varchar(255) DEFAULT NULL COMMENT '场景名称',
  `keyword` varchar(255) DEFAULT NULL COMMENT '关联关键词',
  `scene_type` char(10) DEFAULT '0' COMMENT '二维码类型',
  `scene_id` int(32) DEFAULT NULL COMMENT '场景值ID',
  `scene_str` varchar(255) DEFAULT NULL COMMENT '场景值字符串',
  `expire` int(10) DEFAULT NULL COMMENT '过期时间',
  `ticket` varchar(255) DEFAULT NULL COMMENT '二维码Ticket',
  `url` varchar(255) DEFAULT NULL COMMENT '二维码图片解析后的地址',
  `ctime` int(10) DEFAULT NULL COMMENT '二维码创建时间',
  `short_url` varchar(255) DEFAULT NULL COMMENT '二维码短地址',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `dc_scene_qrcode`
--

LOCK TABLES `dc_scene_qrcode` WRITE;
/*!40000 ALTER TABLE `dc_scene_qrcode` DISABLE KEYS */;
/*!40000 ALTER TABLE `dc_scene_qrcode` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `dc_scene_qrcode_statistics`
--

DROP TABLE IF EXISTS `dc_scene_qrcode_statistics`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `dc_scene_qrcode_statistics` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '主键',
  `mpid` int(10) DEFAULT NULL COMMENT '公众号标识',
  `openid` varchar(255) DEFAULT NULL COMMENT '扫码者openid',
  `scene_name` varchar(255) DEFAULT NULL COMMENT '场景名称',
  `keyword` varchar(255) DEFAULT NULL COMMENT '关联关键词',
  `scene_id` varchar(255) DEFAULT NULL COMMENT '场景ID/场景字符串',
  `scan_type` varchar(255) DEFAULT NULL COMMENT '扫描类型',
  `ctime` int(10) DEFAULT NULL COMMENT '扫描时间',
  `qrcode_id` int(10) DEFAULT NULL COMMENT '二维码ID',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `dc_scene_qrcode_statistics`
--

LOCK TABLES `dc_scene_qrcode_statistics` WRITE;
/*!40000 ALTER TABLE `dc_scene_qrcode_statistics` DISABLE KEYS */;
/*!40000 ALTER TABLE `dc_scene_qrcode_statistics` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `dc_system_setting`
--

DROP TABLE IF EXISTS `dc_system_setting`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `dc_system_setting` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '自增ID',
  `name` varchar(255) NOT NULL COMMENT '配置项',
  `value` text COMMENT '配置值',
  `type` varchar(50) DEFAULT NULL COMMENT '配置类型',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8 COMMENT='全局配置表';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `dc_system_setting`
--

LOCK TABLES `dc_system_setting` WRITE;
/*!40000 ALTER TABLE `dc_system_setting` DISABLE KEYS */;
INSERT INTO `dc_system_setting` VALUES (1,'site_name','迅达拼车平台系统','siteinfo'),(2,'site_intro','迅达拼车平台管理系统','siteinfo'),(3,'site_keywords','拼车 顺风车','siteinfo'),(4,'site_copyright','@本服务由 迅达拼车平台  开发','siteinfo'),(5,'site_icp_beian','京ICP备***号-6','siteinfo'),(6,'register_on','0','register'),(7,'fields','[{&quot;name&quot;:&quot;site_name&quot;,&quot;title&quot;:&quot;\\u7ad9\\u70b9\\u6807\\u9898&quot;,&quot;type&quot;:&quot;text&quot;,&quot;value&quot;:&quot;\\u8fc5\\u8fbe\\u62fc\\u8f66\\u5e73\\u53f0\\u7cfb\\u7edf&quot;},{&quot;name&quot;:&quot;site_intro&quot;,&quot;title&quot;:&quot;\\u7ad9\\u70b9\\u7b80\\u4ecb&quot;,&quot;type&quot;:&quot;textarea&quot;,&quot;value&quot;:&quot;\\u5728\\u4ea4\\u901a\\u4fbf\\u5229\\u548c\\u4fe1\\u606f\\u5316\\u7684\\u65f6\\u4ee3,\\u5fd9\\u788c\\u7684\\u5317\\u6f02\\u4e00\\u65cf\\u6bcf\\u9022\\u8282\\u5047\\u65e5\\u90fd\\u6709\\u56de\\u5bb6\\u770b\\u770b\\u7684\\u5ff5\\u5934,\\u4e3a\\u89e3\\u51b3\\u5317\\u6f02\\u4e00\\u65cf\\u7684\\u4e2d\\u9014\\u8f6c\\u8f66\\u7684\\u9ebb\\u70e6,\\u5b9e\\u73b0\\u4e0a\\u8f66\\u5c31\\u5230\\u5bb6\\u95e8\\u53e3\\u7684\\u5c0f\\u613f\\u671b,\\u8fbe\\u5230\\u65b9\\u4fbf\\u5feb\\u6377\\u7684\\u4f5c\\u7528,\\u7531\\u6b64\\u8bde\\u751f\\u4e86\\u62fc\\u8f66\\u5e73\\u53f0\\u7ba1\\u7406\\u7cfb\\u7edf.&quot;},{&quot;name&quot;:&quot;site_keywords&quot;,&quot;title&quot;:&quot;\\u7ad9\\u70b9\\u5173\\u952e\\u8bcd&quot;,&quot;type&quot;:&quot;textarea&quot;,&quot;value&quot;:&quot;\\u62fc\\u8f66 \\u987a\\u98ce\\u8f66&quot;},{&quot;name&quot;:&quot;site_copyright&quot;,&quot;title&quot;:&quot;\\u7248\\u6743\\u4fe1\\u606f&quot;,&quot;type&quot;:&quot;text&quot;,&quot;value&quot;:&quot;@\\u672c\\u670d\\u52a1\\u7531 \\u8fc5\\u8fbe\\u62fc\\u8f66\\u5e73\\u53f0  \\u5f00\\u53d1&quot;},{&quot;name&quot;:&quot;site_icp_beian&quot;,&quot;title&quot;:&quot;\\u5907\\u6848\\u4fe1\\u606f&quot;,&quot;type&quot;:&quot;text&quot;,&quot;value&quot;:&quot;\\u4eacICP\\u5907***\\u53f7-6&quot;}]','siteinfo');
/*!40000 ALTER TABLE `dc_system_setting` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `dc_user`
--

DROP TABLE IF EXISTS `dc_user`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `dc_user` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '自增ID',
  `username` varchar(255) NOT NULL COMMENT '用户名',
  `password` varchar(255) NOT NULL COMMENT '密码',
  `nickname` varchar(50) DEFAULT NULL COMMENT '昵称',
  `headimg` varchar(255) DEFAULT NULL COMMENT '头像',
  `default_mpid` int(10) DEFAULT NULL COMMENT '默认管理的公众号ID',
  `email` varchar(255) DEFAULT NULL COMMENT '用户邮箱',
  `group_id` int(11) DEFAULT NULL COMMENT '用户组',
  `register_time` int(10) NOT NULL COMMENT '注册时间',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COMMENT='用户表';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `dc_user`
--

LOCK TABLES `dc_user` WRITE;
/*!40000 ALTER TABLE `dc_user` DISABLE KEYS */;
INSERT INTO `dc_user` VALUES (2,'support','e10adc3949ba59abbe56e057f20f883e','support',NULL,NULL,'12514@qq.com',NULL,1617711315),(3,'admin2','96e79218965eb72c92a549dd5a330112','admin2',NULL,NULL,'125142@qq.com',NULL,1618240449);
/*!40000 ALTER TABLE `dc_user` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2021-06-11 10:12:58
