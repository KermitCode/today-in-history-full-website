/*
Navicat MySQL Data Transfer

Source Server         : 阿里Mysql
Source Server Version : 50537
Source Host           : 114.215.80.214:3306
Source Database       : 91history

Target Server Type    : MYSQL
Target Server Version : 50537
File Encoding         : 65001

Date: 2020-09-09 13:55:29
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for his_brith
-- ----------------------------
DROP TABLE IF EXISTS `his_brith`;
CREATE TABLE `his_brith` (
  `bri_id` int(11) NOT NULL AUTO_INCREMENT COMMENT '生日花语表',
  `bri_month` tinyint(3) DEFAULT NULL COMMENT '月份',
  `bri_day` tinyint(3) DEFAULT NULL COMMENT '日期',
  `bri_img` varchar(30) DEFAULT NULL COMMENT '花图片',
  `bri_huaname` varchar(30) DEFAULT NULL,
  `bri_huacont` longtext COMMENT '花介绍',
  `bri_huayu` varchar(30) DEFAULT NULL COMMENT '花语意',
  `bri_huayucont` longtext COMMENT '花语详解',
  `bri_dansheng` varchar(30) DEFAULT NULL COMMENT '诞生石名',
  `bri_danshengshuo` varchar(30) DEFAULT NULL COMMENT '诞生石详细解说',
  PRIMARY KEY (`bri_id`)
) ENGINE=InnoDB AUTO_INCREMENT=367 DEFAULT CHARSET=gbk COMMENT='生日花语表';

-- ----------------------------
-- Table structure for his_errors
-- ----------------------------
DROP TABLE IF EXISTS `his_errors`;
CREATE TABLE `his_errors` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `jin_ip` varchar(22) DEFAULT NULL,
  `jin_say` varchar(255) DEFAULT NULL,
  `jin_user` varchar(255) DEFAULT NULL COMMENT '登录用户名',
  `jin_time` int(10) unsigned NOT NULL COMMENT '时间',
  PRIMARY KEY (`id`),
  KEY `ip` (`jin_ip`) USING BTREE
) ENGINE=InnoDB DEFAULT CHARSET=gbk COMMENT='用户违规操作';

-- ----------------------------
-- Table structure for his_link
-- ----------------------------
DROP TABLE IF EXISTS `his_link`;
CREATE TABLE `his_link` (
  `lk_id` int(3) NOT NULL AUTO_INCREMENT COMMENT '链接ID',
  `lk_title` varchar(20) CHARACTER SET utf8 NOT NULL COMMENT '链接文字',
  `lk_url` varchar(50) CHARACTER SET utf8 NOT NULL,
  `lk_hot` tinyint(3) NOT NULL COMMENT '先后顺序',
  `lk_datetime` datetime DEFAULT NULL,
  `lk_state` tinyint(1) DEFAULT '1' COMMENT '是否显示',
  PRIMARY KEY (`lk_id`),
  KEY `lkid` (`lk_id`) USING BTREE
) ENGINE=MyISAM AUTO_INCREMENT=23 DEFAULT CHARSET=gbk COMMENT='外链表';

-- ----------------------------
-- Table structure for his_main
-- ----------------------------
DROP TABLE IF EXISTS `his_main`;
CREATE TABLE `his_main` (
  `ls_id` int(11) NOT NULL AUTO_INCREMENT COMMENT '事件ID',
  `ls_title` varchar(100) NOT NULL COMMENT '事件描述',
  `ls_englishtit` varchar(255) DEFAULT NULL,
  `ls_class` tinyint(2) DEFAULT '0' COMMENT '事件类别',
  `ls_year` varchar(10) NOT NULL COMMENT '发生年份',
  `ls_month` varchar(2) DEFAULT NULL COMMENT '发生月份',
  `ls_day` varchar(2) NOT NULL COMMENT '发生日期',
  `ls_nongyear` varchar(10) DEFAULT NULL COMMENT '农历干支纪年',
  `ls_nongmonth` varchar(10) DEFAULT NULL COMMENT '农历月份',
  `ls_nongnummonth` tinyint(3) DEFAULT NULL COMMENT '月份数字',
  `ls_nongday` varchar(10) DEFAULT NULL COMMENT '农历日期',
  `ls_nongnumday` tinyint(3) DEFAULT NULL COMMENT '农历日期数字',
  `ls_cont` text NOT NULL COMMENT '事情详细',
  `publiced` tinyint(1) DEFAULT '0' COMMENT '是否已发表',
  `ls_time` int(10) unsigned DEFAULT NULL COMMENT '发表时间',
  `ls_views` int(10) unsigned DEFAULT '0' COMMENT '阅读次数',
  PRIMARY KEY (`ls_id`)
) ENGINE=MyISAM AUTO_INCREMENT=12081 DEFAULT CHARSET=gbk COMMENT='主历史记录表';

-- ----------------------------
-- Table structure for his_main_img
-- ----------------------------
DROP TABLE IF EXISTS `his_main_img`;
CREATE TABLE `his_main_img` (
  `img_id` int(11) unsigned NOT NULL AUTO_INCREMENT COMMENT '图片ID',
  `img_url` varchar(50) DEFAULT NULL COMMENT '图片路径',
  `img_contid` int(11) DEFAULT NULL COMMENT '对应内容ID',
  `img_month` varchar(2) DEFAULT NULL COMMENT '月份',
  `img_day` varchar(2) DEFAULT NULL COMMENT '日期',
  PRIMARY KEY (`img_id`)
) ENGINE=MyISAM AUTO_INCREMENT=17893 DEFAULT CHARSET=gbk COMMENT='历史记录图片表';

-- ----------------------------
-- Table structure for his_pinglun
-- ----------------------------
DROP TABLE IF EXISTS `his_pinglun`;
CREATE TABLE `his_pinglun` (
  `pl_id` int(11) NOT NULL AUTO_INCREMENT COMMENT '评论ID',
  `pl_month` varchar(2) NOT NULL COMMENT '评论事件月份',
  `pl_day` varchar(2) NOT NULL COMMENT '评论事情日期',
  `pl_main_id` int(10) unsigned NOT NULL COMMENT '评论的历史事件ID',
  `pl_text` tinytext NOT NULL COMMENT '评论内容',
  `pl_ip` varchar(18) DEFAULT NULL COMMENT '评论IP',
  `pl_time` int(10) unsigned NOT NULL COMMENT '评论时间',
  `pl_user` varchar(15) DEFAULT NULL COMMENT '评论用户呢称',
  `pl_visible` tinyint(1) unsigned DEFAULT '1' COMMENT '是否显示',
  PRIMARY KEY (`pl_id`)
) ENGINE=InnoDB AUTO_INCREMENT=75 DEFAULT CHARSET=gbk COMMENT='用户评论表';

-- ----------------------------
-- Table structure for his_sprider
-- ----------------------------
DROP TABLE IF EXISTS `his_sprider`;
CREATE TABLE `his_sprider` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `sprider` varchar(15) DEFAULT NULL,
  `cometime` int(10) unsigned DEFAULT NULL COMMENT '时间',
  PRIMARY KEY (`id`),
  KEY `sprider` (`sprider`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=48104 DEFAULT CHARSET=gbk COMMENT='搜索引擎记录';

-- ----------------------------
-- Table structure for his_system
-- ----------------------------
DROP TABLE IF EXISTS `his_system`;
CREATE TABLE `his_system` (
  `xh_system` tinyint(4) NOT NULL DEFAULT '1' COMMENT '主键ID',
  `web_open` tinyint(1) DEFAULT '1' COMMENT '网站是否打开',
  `web_close_words` varchar(255) DEFAULT NULL COMMENT '网站关闭时提示用户',
  `web_error` tinyint(1) DEFAULT '1' COMMENT '报错设置',
  `web_stat` text COMMENT '网站统计代码',
  `web_keyword` varchar(255) DEFAULT NULL COMMENT '网站关键词',
  `web_name` varchar(50) DEFAULT NULL COMMENT '网站名称',
  `web_url` varchar(50) DEFAULT NULL COMMENT '网站域名',
  `web_description` varchar(255) DEFAULT NULL COMMENT '描述',
  `web_beian` varchar(255) DEFAULT NULL COMMENT '网站备案号',
  `adminer_pass` varchar(32) DEFAULT NULL COMMENT '管理员密码-账号admin',
  `superadmin_pass` varchar(32) DEFAULT NULL COMMENT '超级管理员密码',
  `adtest_pass` varchar(32) DEFAULT NULL COMMENT '游客密码－账号test',
  `no_ips_do` tinyint(1) DEFAULT NULL COMMENT '禁止IP处理办法',
  `no_ips` tinytext COMMENT '禁止IP',
  `auto_public_num` int(6) unsigned DEFAULT '100' COMMENT '每天自动发表多少篇文章',
  `auto_public` int(6) unsigned DEFAULT '1' COMMENT '当日已发表文章笑话数',
  `auto_public_day` date DEFAULT NULL COMMENT '自动发表当日日期',
  `auto_public_precent` int(8) unsigned DEFAULT '10' COMMENT '发布概率',
  `sprider_num` int(8) DEFAULT NULL COMMENT '搜索引擎记录保存条数',
  `sprider_time` tinyint(2) unsigned DEFAULT '1' COMMENT '搜索引擎间隔多少小时记录一次',
  `ad_web_navtop` tinytext COMMENT '导航条上方广告',
  `ad_web_duilian` tinytext COMMENT '全站对联广告',
  `ad_web_tanchuang` tinytext COMMENT '全站弹窗广告',
  `ad_web_middle_new` tinytext COMMENT '首页中通最新内容下',
  `ad_web_mid_down` tinytext COMMENT '网页中通首页下',
  `ad_list_main` tinytext COMMENT '列表页主广告位',
  `ad_irt_downtitle` tinytext COMMENT '三层页标题下方广告',
  `ad_irt_pinglun` tinytext COMMENT '发表评论上方广告',
  `bad_words_do` tinyint(4) DEFAULT '1' COMMENT '(1去除,2用***号替代,3阻止操作',
  `bad_words` tinytext COMMENT '禁止关键词列表',
  `image_pagenum` tinytext COMMENT '英文网站描述',
  `index_class_arr` tinytext COMMENT '英文关键词',
  `pingjia_right` tinyint(1) unsigned DEFAULT '1' COMMENT '评价是否需要审核',
  `pingjia_most` tinyint(3) unsigned DEFAULT '15' COMMENT '每次登录最多能评多少条',
  `web_fangshuaxin` tinyint(1) unsigned DEFAULT '1' COMMENT '是否打开防刷新功能',
  `web_fangshuapin` int(5) unsigned DEFAULT '0' COMMENT '连续多少毫秒访问算刷屏',
  `web_shuapin_num` int(2) DEFAULT '5' COMMENT '刷屏几次进行处理',
  `web_shuapin_time` int(4) DEFAULT '4' COMMENT '刷屏后几分钟可访问',
  `web_shua_times_jinip` tinyint(3) unsigned DEFAULT '5' COMMENT '刷屏多少次加入禁止IP名单',
  `stat_day_cachetime` int(6) unsigned DEFAULT '0' COMMENT '今日随缘花语：小时',
  `stat_all_cachetime` int(10) unsigned DEFAULT '0' COMMENT '今日随缘星座：小时',
  PRIMARY KEY (`xh_system`)
) ENGINE=InnoDB DEFAULT CHARSET=gbk COMMENT='系统设置表';

-- ----------------------------
-- Table structure for his_xingzuo
-- ----------------------------
DROP TABLE IF EXISTS `his_xingzuo`;
CREATE TABLE `his_xingzuo` (
  `xz_id` int(11) NOT NULL AUTO_INCREMENT COMMENT '生日密码-即星座ID',
  `xz_title` varchar(30) DEFAULT NULL COMMENT '总述',
  `xz_month` tinyint(3) DEFAULT NULL COMMENT '月份',
  `xz_day` tinyint(3) DEFAULT NULL COMMENT '日期',
  `xz_content` text COMMENT '介绍',
  `xz_star` text COMMENT '幸运数字和守护星',
  `xz_health` text COMMENT '健康',
  `xz_jianyi` text COMMENT '建议',
  `xz_mingren` text COMMENT '名人',
  `xz_taluopai` text COMMENT '塔罗牌',
  `xz_jingsiyu` text COMMENT '静思语',
  `xz_youdian` text COMMENT '优点',
  `xz_quedian` text COMMENT '缺点',
  `xz_name` varchar(10) DEFAULT NULL COMMENT '星座名称',
  PRIMARY KEY (`xz_id`)
) ENGINE=InnoDB AUTO_INCREMENT=367 DEFAULT CHARSET=gbk COMMENT='每天对应的生日密码-同星座解析';
