/*
Navicat MySQL Data Transfer

Source Server         : 阿里Mysql
Source Server Version : 50537
Source Host           : 114.215.80.214:3306
Source Database       : 04007CN

Target Server Type    : MYSQL
Target Server Version : 50537
File Encoding         : 65001

Date: 2020-09-09 13:20:55
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for qd_enterprise
-- ----------------------------
DROP TABLE IF EXISTS `qd_enterprise`;
CREATE TABLE `qd_enterprise` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `category` varchar(10) DEFAULT '国企' COMMENT '1国企，2央企',
  `title` varchar(100) NOT NULL DEFAULT '' COMMENT '企业名字',
  `objectcp` tinyint(1) unsigned NOT NULL DEFAULT '0' COMMENT '重要',
  `score` int(255) NOT NULL DEFAULT '100' COMMENT '得分',
  `leader` varchar(255) NOT NULL DEFAULT '' COMMENT 'CEO',
  `leaderbaike` varchar(255) NOT NULL DEFAULT '' COMMENT 'CEO百科链接',
  `website` varchar(255) NOT NULL DEFAULT '' COMMENT '官网',
  `area` varchar(10) NOT NULL DEFAULT '市南区' COMMENT '青岛区',
  `description` text NOT NULL COMMENT '介绍',
  `sortnum_china` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '中国排名',
  `sortyear` year(4) NOT NULL DEFAULT '2020' COMMENT '排名年份',
  `updateTime` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP COMMENT '更新时间',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=37 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of qd_enterprise
-- ----------------------------
INSERT INTO `qd_enterprise` VALUES ('1', '国企', '山东海丰国际航运集团有限公司', '0', '61', '', '', '', '黄岛区', '', '0', '2020', '2020-03-07 20:33:13');
INSERT INTO `qd_enterprise` VALUES ('2', '国企', '山东省机械进出口集团', '0', '61', '', '', '', '市南区', '', '0', '2020', '2020-03-07 20:33:13');
INSERT INTO `qd_enterprise` VALUES ('3', '国企', '绮丽集团有限责任公司', '0', '61', '', '', '', '市南区', '', '0', '2020', '2020-03-07 20:33:13');
INSERT INTO `qd_enterprise` VALUES ('4', '国企', '山东机械设备进出口集团公司', '0', '61', '', '', '', '市南区', '', '0', '2020', '2020-03-07 20:33:13');
INSERT INTO `qd_enterprise` VALUES ('5', '国企', '青岛一木集团有限责任公司', '0', '61', '', '', '', '市北区', '', '0', '2020', '2020-03-07 20:33:13');
INSERT INTO `qd_enterprise` VALUES ('6', '国企', '青岛工艺美术集团公司', '0', '61', '', '', '', '市北区', '', '0', '2020', '2020-03-07 20:33:13');
INSERT INTO `qd_enterprise` VALUES ('7', '国企', '海尔集团', '1', '90', '张瑞敏', 'https://baike.baidu.com/item/%E5%BC%A0%E7%91%9E%E6%95%8F/19495?fr=aladdin', 'https://www.haier.com/cn/', '崂山区', '', '0', '2020', '2020-03-07 20:38:30');
INSERT INTO `qd_enterprise` VALUES ('8', '国企', '青岛钢铁控股集团有限责任公司', '0', '61', '', '', '', '李沧区', '', '0', '2020', '2020-03-07 20:33:13');
INSERT INTO `qd_enterprise` VALUES ('9', '国企', '青岛长生集团股份有限公司', '0', '61', '', '', '', '市北区', '', '0', '2020', '2020-03-07 20:33:13');
INSERT INTO `qd_enterprise` VALUES ('10', '国企', '青岛华金集团', '0', '61', '', '', '', '市北区', '', '0', '2020', '2020-03-07 20:33:13');
INSERT INTO `qd_enterprise` VALUES ('11', '国企', '利群集团', '1', '63', '徐恭藻', 'https://baike.baidu.com/item/%E5%BE%90%E6%81%AD%E8%97%BB/1001523?fr=aladdin', 'http://www.liqungroup.com/', '崂山区', '', '0', '2020', '2020-03-07 20:33:13');
INSERT INTO `qd_enterprise` VALUES ('12', '国企', '一汽解放青岛汽车厂', '0', '61', '', '', '', '李沧区', '', '0', '2020', '2020-03-07 20:33:13');
INSERT INTO `qd_enterprise` VALUES ('13', '国企', '青岛市新华书店(集团)有限责任公司', '0', '61', '', '', '', '市南区', '', '0', '2020', '2020-03-07 20:33:13');
INSERT INTO `qd_enterprise` VALUES ('14', '国企', '青岛铸造机械集团公司', '0', '61', '', '', '', '市北区', '', '0', '2020', '2020-03-07 20:33:13');
INSERT INTO `qd_enterprise` VALUES ('15', '国企', '双星集团', '0', '61', '', '', '', '市南区', '', '0', '2020', '2020-03-07 20:33:13');
INSERT INTO `qd_enterprise` VALUES ('16', '国企', '青岛华通国有资本运营（集团）有限责任公司', '1', '100', '姜培生', 'https://baike.baidu.com/item/%E5%A7%9C%E5%9F%B9%E7%94%9F/18733529?fr=aladdin', 'http://www.qdhuatong.com/catalog/index.php', '市南区', '', '0', '2020', '2020-03-07 20:38:17');
INSERT INTO `qd_enterprise` VALUES ('17', '国企', '青岛港（集团）有限公司', '1', '81', '李奉利', 'https://baike.baidu.com/item/%E6%9D%8E%E5%A5%89%E5%88%A9/1175353?fr=aladdin', 'http://www.qdport.com/', '市南区', '', '0', '2020', '2020-03-07 20:33:13');
INSERT INTO `qd_enterprise` VALUES ('18', '国企', '青岛啤酒集团有限公司', '1', '66', '孙明波', 'https://baike.baidu.com/item/%E5%AD%99%E6%98%8E%E6%B3%A2/55680?fr=aladdin', 'http://www.tsingtao.com.cn/', '市南区', '', '0', '2020', '2020-03-07 20:33:13');
INSERT INTO `qd_enterprise` VALUES ('19', '国企', '青岛红星化工有限责任公司', '0', '61', '', '', '', '市南区', '', '0', '2020', '2020-03-07 20:33:13');
INSERT INTO `qd_enterprise` VALUES ('20', '国企', '澳柯玛股份有限公司', '1', '62', '李蔚', 'https://baike.baidu.com/item/%E6%9D%8E%E8%94%9A/2275587', 'https://www.eaucma.com/', '市南区', '', '0', '2020', '2020-03-07 20:33:13');
INSERT INTO `qd_enterprise` VALUES ('21', '国企', '青岛海湾集团有限公司', '0', '61', '', '', '', '市南区', '', '0', '2020', '2020-03-07 20:33:13');
INSERT INTO `qd_enterprise` VALUES ('22', '国企', '青岛交运集团', '1', '89', '刘永康', 'https://baike.baidu.com/pic/%E5%88%98%E6%B0%B8%E5%BA%B7/5677727/3050339/024f78f0f736afc3d02a4457b219ebc4b74512d9', 'http://www.qdjyjt.com/Infor/Index.aspx', '市南区', '', '0', '2020', '2020-03-07 20:41:41');
INSERT INTO `qd_enterprise` VALUES ('24', '国企', '青岛市政工程集团有限公司', '0', '61', '', '', '', '市南区', '', '0', '2020', '2020-03-07 20:33:13');
INSERT INTO `qd_enterprise` VALUES ('25', '国企', '青岛银行', '1', '95', '郭少泉', 'http://news.hexun.com/2011-05-31/130126643.html', 'http://www.qdccb.com/', '市南区', '', '0', '2020', '2020-03-07 20:38:37');
INSERT INTO `qd_enterprise` VALUES ('26', '国企', '青岛公交集团有限责任公司', '0', '61', '', '', '', '市南区', '', '0', '2020', '2020-03-07 20:33:13');
INSERT INTO `qd_enterprise` VALUES ('27', '国企', '青岛饮料集团有限公司', '0', '61', '', '', '', '市南区', '', '0', '2020', '2020-03-07 20:33:13');
INSERT INTO `qd_enterprise` VALUES ('28', '国企', '青岛国际机场集团有限公司', '1', '71', '姜军建', 'https://baike.baidu.com/item/%E5%A7%9C%E5%86%9B%E5%BB%BA/4896331?fr=aladdin', 'http://www.qdairport.com/control/main', '市南区', '', '0', '2020', '2020-03-07 20:33:13');
INSERT INTO `qd_enterprise` VALUES ('29', '国企', '青岛国信发展（集团）有限责任公司', '1', '98', '王建辉', 'https://baike.baidu.com/item/%E7%8E%8B%E5%BB%BA%E8%BE%89/3278932?fr=aladdin', 'https://special.zhaopin.com/Flying/Society/20200304/23421561_22280943_ZL65196/zpzw.html', '市南区', '', '0', '2020', '2020-03-07 20:38:47');
INSERT INTO `qd_enterprise` VALUES ('30', '国企', '青岛城市建设投资（集团）有限责任公司', '1', '96', '邢路正', 'https://baike.baidu.com/item/%E9%82%A2%E8%B7%AF%E6%AD%A3/16988649?fr=aladdin', 'http://www.qdct.cn/', '市南区', '', '0', '2020', '2020-03-07 20:39:28');
INSERT INTO `qd_enterprise` VALUES ('32', '国企', '青岛世园（集团）有限公司', '1', '81', '丁伟(曾)', 'https://baike.baidu.com/item/%E4%B8%81%E4%BC%9F/18060465?fr=aladdin', 'http://www.qingdaoshiyuan.com/', '市南区', '', '0', '2020', '2020-03-07 20:33:13');
INSERT INTO `qd_enterprise` VALUES ('33', '国企', '青岛国际投资有限公司', '1', '76', '张世斌', 'http://www.dailyqd.com/channelzt/2014-04/15/content_48957.htm', 'http://www.qdinv.com/', '市南区', '', '0', '2020', '2020-03-07 20:33:13');
INSERT INTO `qd_enterprise` VALUES ('34', '国企', '青岛城市发展集团有限公司', '1', '89', '刘裕良', 'https://baike.baidu.com/item/%E5%88%98%E8%A3%95%E8%89%AF/22601767?fr=aladdin', 'http://www.qdcfjt.com/', '市南区', '', '0', '2020', '2020-03-07 20:33:13');
INSERT INTO `qd_enterprise` VALUES ('35', '国企', '青岛海检集团有限公司', '0', '61', '', '', '', '市南区', '', '0', '2020', '2020-03-07 20:33:13');
INSERT INTO `qd_enterprise` VALUES ('36', '国企', '海信集团', '1', '99', '周厚健', 'https://baike.baidu.com/item/%E5%91%A8%E5%8E%9A%E5%81%A5/1065623?fr=aladdin', 'http://www.hisense.cn/', '市南区', '', '0', '2020', '2020-03-07 20:38:27');
