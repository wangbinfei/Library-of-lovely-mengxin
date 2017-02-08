/*
Navicat MySQL Data Transfer

Source Server         : db
Source Server Version : 50617
Source Host           : localhost:3306
Source Database       : mengxin

Target Server Type    : MYSQL
Target Server Version : 50617
File Encoding         : 65001

Date: 2017-01-16 04:19:22
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for `xin_book`
-- ----------------------------
DROP TABLE IF EXISTS `xin_book`;
CREATE TABLE `xin_book` (
  `book_id` int(11) NOT NULL AUTO_INCREMENT COMMENT '书籍序号',
  `book_name` varchar(50) NOT NULL DEFAULT '' COMMENT '书名',
  `book_author` varchar(50) NOT NULL DEFAULT '' COMMENT '作者',
  `book_cover` varchar(100) NOT NULL DEFAULT '' COMMENT '封面',
  `book_abstract` varchar(500) NOT NULL DEFAULT '' COMMENT '简介',
  `book_content` varchar(200) NOT NULL DEFAULT '' COMMENT '内容地址',
  `book_status` int(11) NOT NULL DEFAULT '1' COMMENT '书籍状态',
  PRIMARY KEY (`book_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of xin_book
-- ----------------------------
INSERT INTO `xin_book` VALUES ('1', '古都', '川端康成', 'Public/image/cover/5869b289e227b.jpg', '《古都》是日本作家川端康成的代表作。在这部小说中，川端康成运用清淡、细腻的笔触，叙述了千重子和苗子这对孪生姐妹的悲欢离合，以及人世的寂寥之感。作者把自己的关注、同情与哀叹，都给予她们，写了她们的辛酸身世和纯洁爱情，还写了她们对美好生活的向往。故事在寂静中开始，在寂静中结束，把读者带到了一个浓重的凄凉的意境，同时也反映了作者本人的虚无、厌世的思想。 作品深刻地揭示了资本主义制度下贫富悬殊以及由此造成的人情冷暖、世俗偏见等社会现状，也表现了日本人民的纯朴和善良的情感。\r\n', 'Public/book/5869b28a05b28.txt', '1');
INSERT INTO `xin_book` VALUES ('2', '白话列子', '列子', 'Public/image/cover/587b0e3619f93.jpg', '《列子》一书是中国古代思想史上的重要著作之一。其思想与道家十分接近，后来被道教奉为经典。唐天宝元年（公元 742 年）诏称《列子》为《冲虚真经》。书中记载了许多民间故事、寓言和神话传说，因而在中国古代文学史上也有一定地位。书中还有大量的养生与古代气功的论述，亦值得研究。我们要了解中国传统文化，吸取其精华为社会主义现代化建设服务，《列子》是有必要认真阅读的。', 'Public/book/587b0e363b2da.txt', '1');
INSERT INTO `xin_book` VALUES ('3', '飞鸟集', '泰戈尔', 'Public/image/cover/587b0f5072e09.jpg', '夏天的飞鸟，飞到我的窗前唱歌，又飞去了。\r\n秋天的黄叶，它们没有什么可唱，只叹息一声，飞落在那里。', 'Public/book/587b0f507be93.txt', '1');
INSERT INTO `xin_book` VALUES ('4', '新月集', '泰戈尔', '/Public/image/cover/587bd50617107.jpg', '\r\n    我独自在横跨过田地的路上走着，夕阳像一个守财奴似的，正藏起它的最后的金子。\r\n    白昼更加深沉地投入黑暗之中，那已经收割了的孤寂的田地，默默地躺在那里。\r\n    天空里突然升起了一个男孩子的尖锐的歌声。他穿过看不见的黑暗，留下他的歌声\r\n的辙痕跨过黄昏的静谧。\r\n    他的乡村的家坐落在荒凉的边上，在甘蔗田的后面，躲藏在香蕉树，瘦长的槟榔树，\r\n椰子树和深绿色的贾克果树的阴影里。\r\n    我在星光下独自走着的路上停留了一会，我看见黑沉沉的大地展开在我的面前，用\r\n她的手臂拥抱着无量数的家庭，在那些家庭里有着摇篮和床铺，母亲们的心和夜晚的灯，\r\n还有年轻轻的生命，他们满心欢乐，却浑然不知这样的欢乐对于世界的价值。', '/Public/book/587bd5061f1f1.txt', '1');
