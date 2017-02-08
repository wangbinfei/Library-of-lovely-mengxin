/*
Navicat MySQL Data Transfer

Source Server         : db
Source Server Version : 50617
Source Host           : localhost:3306
Source Database       : mengxin

Target Server Type    : MYSQL
Target Server Version : 50617
File Encoding         : 65001

Date: 2017-01-14 19:29:47
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for `xin_book`
-- ----------------------------
CREATE TABLE `xin_book` (
  `book_id` int(11) NOT NULL AUTO_INCREMENT COMMENT '书籍序号',
  `book_name` varchar(50) NOT NULL DEFAULT '' COMMENT '书名',
  `book_author` varchar(50) NOT NULL DEFAULT '' COMMENT '作者',
  `book_cover` varchar(100) NOT NULL DEFAULT '' COMMENT '封面',
  `book_abstract` varchar(500) NOT NULL DEFAULT '' COMMENT '简介',
  `book_content` varchar(200) NOT NULL DEFAULT '' COMMENT '内容地址',
  `book_status` int(11) NOT NULL DEFAULT '1' COMMENT '书籍状态',
  PRIMARY KEY (`book_id`)
) ENGINE=InnoDB AUTO_INCREMENT=132 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of xin_book
-- ----------------------------
INSERT INTO `xin_book` VALUES ('1', '古都', '川端康成', 'Public/image/cover/5869b289e227b.jpg', '《古都》是日本作家川端康成的代表作。在这部小说中，川端康成运用清淡、细腻的笔触，叙述了千重子和苗子这对孪生姐妹的悲欢离合，以及人世的寂寥之感。作者把自己的关注、同情与哀叹，都给予她们，写了她们的辛酸身世和纯洁爱情，还写了她们对美好生活的向往。故事在寂静中开始，在寂静中结束，把读者带到了一个浓重的凄凉的意境，同时也反映了作者本人的虚无、厌世的思想。 作品深刻地揭示了资本主义制度下贫富悬殊以及由此造成的人情冷暖、世俗偏见等社会现状，也表现了日本人民的纯朴和善良的情感。\r\n', 'Public/book/5869b28a05b28.txt', '1');

-- ----------------------------
-- Table structure for `xin_bookmark`
-- ----------------------------
CREATE TABLE `xin_bookmark` (
  `bookmark_id` int(11) NOT NULL AUTO_INCREMENT COMMENT '书签id',
  `bookmark_uid` int(11) NOT NULL DEFAULT '0' COMMENT '书签所属用户id',
  `bookmark_bid` int(11) NOT NULL DEFAULT '0' COMMENT '书签所属图书id',
  `bookmark_page` int(11) NOT NULL DEFAULT '1' COMMENT '书签页',
  `bookmark_status` int(11) NOT NULL DEFAULT '0' COMMENT '0代表自动书签，1代表手动书签',
  PRIMARY KEY (`bookmark_id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of xin_bookmark
-- ----------------------------
INSERT INTO `xin_bookmark` VALUES ('1', '1', '1', '22', '0');
INSERT INTO `xin_bookmark` VALUES ('2', '2', '1', '29', '0');
INSERT INTO `xin_bookmark` VALUES ('3', '1', '1', '36', '1');
INSERT INTO `xin_bookmark` VALUES ('4', '1', '1', '39', '1');
INSERT INTO `xin_bookmark` VALUES ('5', '1', '1', '40', '1');
INSERT INTO `xin_bookmark` VALUES ('6', '1', '1', '41', '1');
INSERT INTO `xin_bookmark` VALUES ('7', '1', '1', '42', '1');
INSERT INTO `xin_bookmark` VALUES ('8', '1', '1', '43', '1');
INSERT INTO `xin_bookmark` VALUES ('9', '1', '1', '44', '1');
INSERT INTO `xin_bookmark` VALUES ('10', '1', '1', '47', '1');
INSERT INTO `xin_bookmark` VALUES ('11', '1', '1', '51', '1');
INSERT INTO `xin_bookmark` VALUES ('12', '1', '1', '54', '1');
INSERT INTO `xin_bookmark` VALUES ('13', '1', '1', '57', '1');

-- ----------------------------
-- Table structure for `xin_cycle`
-- ----------------------------
CREATE TABLE `xin_cycle` (
  `cycle_id` int(11) NOT NULL AUTO_INCREMENT COMMENT '图片id',
  `cycle_address` varchar(100) NOT NULL DEFAULT '' COMMENT '图片地址',
  `cycle_title` varchar(20) NOT NULL DEFAULT '' COMMENT '图片标题',
  `cycle_status` int(11) NOT NULL DEFAULT '1' COMMENT '图片状态',
  PRIMARY KEY (`cycle_id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of xin_cycle
-- ----------------------------
INSERT INTO `xin_cycle` VALUES ('1', 'image/dd329364034f78f0ee79d2e87a310a55b2191c9d.jpg', '绝园的暴风雨--不破爱花', '1');
INSERT INTO `xin_cycle` VALUES ('2', 'image/bupoaihua.jpg', '绝园的暴风雨--不破爱花', '1');
INSERT INTO `xin_cycle` VALUES ('3', 'image/ailuxi.jpg', '妖精的尾巴--艾露莎', '1');
INSERT INTO `xin_cycle` VALUES ('4', 'image/ailusha3.jpg', '妖精的尾巴--艾露莎', '1');
INSERT INTO `xin_cycle` VALUES ('5', 'image/xizi5.jpg', '黄昏少女--庚夕子', '1');
INSERT INTO `xin_cycle` VALUES ('6', 'image/xizi.jpg', '黄昏少女--庚夕子', '1');

-- ----------------------------
-- Table structure for `xin_user`
-- ----------------------------
CREATE TABLE `xin_user` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT COMMENT '用户id',
  `user_name` varchar(20) NOT NULL DEFAULT '' COMMENT '用户账号',
  `user_password` varchar(32) NOT NULL DEFAULT '' COMMENT '用户密码',
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of xin_user
-- ----------------------------
INSERT INTO `xin_user` VALUES ('1', '萌昕萌昕萌昕', '3f57d554d52c2fae3f9d7853cc58e473');
INSERT INTO `xin_user` VALUES ('2', '王斌飞王斌飞', 'c23813818e66e2581d0fbc86a1cbba48');
