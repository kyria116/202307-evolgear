/*
Navicat MySQL Data Transfer

Source Server         : evolgear
Source Server Version : 50505
Source Host           : localhost:3306
Source Database       : evolgear

Target Server Type    : MYSQL
Target Server Version : 50505
File Encoding         : 65001

Date: 2023-08-01 16:19:41
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for article
-- ----------------------------
DROP TABLE IF EXISTS `article`;
CREATE TABLE `article` (
  `a_id` int(11) NOT NULL AUTO_INCREMENT,
  `a_title` varchar(255) DEFAULT NULL,
  `a_title_en` varchar(255) DEFAULT NULL,
  `a_keyword` varchar(255) DEFAULT NULL,
  `a_desc` text DEFAULT NULL,
  `a_img` varchar(25) DEFAULT NULL,
  `a_ctext` text DEFAULT NULL,
  `a_mtext` text DEFAULT NULL,
  `a_order` int(11) DEFAULT NULL,
  `a_status` int(11) DEFAULT NULL,
  PRIMARY KEY (`a_id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of article
-- ----------------------------
INSERT INTO `article` VALUES ('1', '商用訓練機系列', 'Professional Edition', '', '', '2023_07_25_1002201.jpeg', null, null, null, null);
INSERT INTO `article` VALUES ('2', '家用訓練機系列', 'Home Edition', '', '', '2023_07_25_1007491.jpeg', null, null, null, null);
INSERT INTO `article` VALUES ('3', '皮拉提斯器械系列', 'Pilates Series', '', '', '2023_07_25_1008031.jpeg', null, null, null, null);
INSERT INTO `article` VALUES ('4', '購買流程', 'FLOW', '', '', null, '&lt;h3&gt;關於付款方式&lt;/h3&gt;\r\n\r\n&lt;p&gt;付款方式可透過銀行轉賬。&lt;br /&gt;\r\n&lt;br /&gt;\r\n・銀行轉賬&lt;br /&gt;\r\n這是一種常見的付款方式。在簽訂買賣契約後，需支付預付款（商品總金額的50%），並在商品準備發貨前支付尾款（商品總金額的50%以及安裝費用、運費等所有附加費用）。&lt;/p&gt;\r\n', '', null, null);
INSERT INTO `article` VALUES ('5', '公司介紹', 'COMPANY PROFILE', '業務用健身器材,家庭用健身器材,皮拉提斯器材,家庭健身房,健身房開業', '「EVOLGEAR」品牌創立3年產品種類超過280種！成交案件超過3,000件，產品出貨數量突破100,000件大關！至今，EVOLGEAR的產品已偏布全國各地的健身房、運動中心，不管是公司行號還是個人客戶都有我們的愛用者。', null, '&lt;p&gt;公司名&lt;/p&gt;\r\n\r\n&lt;p&gt;泰景科技有限公司&lt;/p&gt;\r\n\r\n&lt;p&gt;&amp;nbsp;&lt;/p&gt;\r\n\r\n&lt;p&gt;代表人&lt;/p&gt;\r\n\r\n&lt;p&gt;吳三才&lt;/p&gt;\r\n\r\n&lt;p&gt;&amp;nbsp;&lt;/p&gt;\r\n\r\n&lt;p&gt;設立日期&lt;/p&gt;\r\n\r\n&lt;p&gt;2011年5月&lt;/p&gt;\r\n\r\n&lt;p&gt;&amp;nbsp;&lt;/p&gt;\r\n\r\n&lt;p&gt;業務內容&lt;/p&gt;\r\n\r\n&lt;p&gt;健身器材及運動用品銷售&lt;/p&gt;\r\n\r\n&lt;p&gt;&amp;nbsp;&lt;/p&gt;\r\n\r\n&lt;p&gt;公司所在地&lt;/p&gt;\r\n\r\n&lt;p&gt;台灣桃園市桃園區同德六街89號3樓之3&lt;/p&gt;\r\n', '&lt;p&gt;mo&lt;/p&gt;\r\n', null, null);
INSERT INTO `article` VALUES ('6', '引導文字', null, null, null, null, '&lt;p&gt;請來電或填寫諮詢表格，讓我們協助您選擇合適的機器、預算規劃、機器設置、產品相關或其他任何問題等。666&lt;/p&gt;\r\n', '', null, null);
INSERT INTO `article` VALUES ('11', '購買EVOLGEAR健身器材的優勢', 'MERIT', '業務用健身器材,家庭用健身器材,皮拉提斯器材,家庭健身房,健身房開業', '我們詳細介紹了在EVOLGEAR購買商業健身設備的優勢。您可以了解到購買後最長五年的保固，以及全國範圍內的器材選定、提案、運送、安裝和組裝等多項優勢。', null, '&lt;p&gt;pc&lt;/p&gt;\r\n\r\n&lt;p&gt;EVOLGEAR考量了客戶的構想和預算，提供最合適的健身器材方案&lt;br /&gt;\r\n經驗豐富的專業人員會以使用者的角度選擇器材、並提供搬運、安裝、組裝等一條龍服務。&lt;br /&gt;\r\n此外，我們也提供維護和保固服務，讓您在導入後也能夠放心。&lt;/p&gt;\r\n', '&lt;p&gt;mo&lt;/p&gt;\r\n\r\n&lt;p&gt;EVOLGEAR考量了客戶的構想和預算，提供最合適的健身器材方案&lt;br /&gt;\r\n經驗豐富的專業人員會以使用者的角度選擇器材、並提供搬運、安裝、組裝等一條龍服務。&lt;br /&gt;\r\n此外，我們也提供維護和保固服務，讓您在導入後也能夠放心。&lt;/p&gt;\r\n', '2', '0');

-- ----------------------------
-- Table structure for casestudy
-- ----------------------------
DROP TABLE IF EXISTS `casestudy`;
CREATE TABLE `casestudy` (
  `c_id` int(11) NOT NULL AUTO_INCREMENT,
  `c_city` varchar(255) DEFAULT NULL,
  `c_tag` varchar(255) DEFAULT NULL,
  `c_title` varchar(255) DEFAULT NULL,
  `c_img` varchar(25) DEFAULT NULL,
  `c_stext` text DEFAULT NULL,
  `c_keyword` varchar(255) DEFAULT NULL,
  `c_desc` text DEFAULT NULL,
  `c_ctext` text DEFAULT NULL,
  `c_mtext` text DEFAULT NULL,
  `c_title1` varchar(255) DEFAULT NULL,
  `c_ctext1` text DEFAULT NULL,
  `c_mtext1` text DEFAULT NULL,
  `c_status` int(3) DEFAULT NULL,
  `c_order` int(11) DEFAULT NULL,
  PRIMARY KEY (`c_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of casestudy
-- ----------------------------
INSERT INTO `casestudy` VALUES ('1', '美國 內華達州', '健身房', 'POWERHOUSE GYM Iris Kyle, Hidetada Yamagishi, Las Vegas, NV 様', '2023_07_25_0934501.png', '在美國拉斯維加斯，新開業的POWERHOUSE GYM IRIS KYLE, HIDETADA YAMAGISHI, LAS VEGAS, NV，引進了許多EVOLGEAR的健身器材。經營者之一的山岸秀匡選手是日本健美第一人，同時也是EVOLGEAR贊助的選手之一。在一層100坪以上的地方，擺放了琳瑯滿目的EVOLGEAR健身器材，可謂壯觀。所引進的產品種類約50多種，十分齊全。這是EVOLGEAR的機械首次進軍到海外的案例，山岸選手回饋了很多使用後的心得與建議，對品質提升做出了巨大的貢獻。', '業務用健身器材,家庭用健身器材,皮拉提斯器材,家庭健身房,健身房開業', '', '&lt;p&gt;pc&lt;/p&gt;\r\n\r\n&lt;ul&gt;\r\n	&lt;li&gt;名稱\r\n	&lt;p&gt;POWERHOUSE GYM Iris Kyle, Hidetada Yamagishi, Las Vegas, NV&lt;/p&gt;\r\n	&lt;/li&gt;\r\n	&lt;li&gt;地址\r\n	&lt;p&gt;1950 S Rainbow Blvd Suite 10&lt;br /&gt;\r\n	Las Vegas NV 89146&lt;/p&gt;\r\n	&lt;/li&gt;\r\n	&lt;li&gt;營業時間\r\n	&lt;p&gt;24小時&lt;br /&gt;\r\n	▼店員駐店時間&lt;br /&gt;\r\n	星期一～星期五　8：00～20：00&lt;br /&gt;\r\n	星期六　8：00～17：00&lt;br /&gt;\r\n	星期日　10：00～14：00&lt;/p&gt;\r\n	&lt;/li&gt;\r\n	&lt;li&gt;URL\r\n	&lt;p&gt;&lt;a href=&quot;https://phg-las.com/&quot; target=&quot;_blank&quot;&gt;https://phg-las.com/&lt;/a&gt;&lt;/p&gt;\r\n	&lt;/li&gt;\r\n	&lt;li&gt;instagram\r\n	&lt;p&gt;&lt;a href=&quot;https://www.instagram.com/powerhousegymlasvegas/&quot; target=&quot;_blank&quot;&gt;@powerhousegymlasvegas&lt;/a&gt;&lt;/p&gt;\r\n	&lt;/li&gt;\r\n&lt;/ul&gt;\r\n', '&lt;p&gt;mo&lt;/p&gt;\r\n\r\n&lt;ul&gt;\r\n	&lt;li&gt;名稱\r\n	&lt;p&gt;POWERHOUSE GYM Iris Kyle, Hidetada Yamagishi, Las Vegas, NV&lt;/p&gt;\r\n	&lt;/li&gt;\r\n	&lt;li&gt;地址\r\n	&lt;p&gt;1950 S Rainbow Blvd Suite 10&lt;br /&gt;\r\n	Las Vegas NV 89146&lt;/p&gt;\r\n	&lt;/li&gt;\r\n	&lt;li&gt;營業時間\r\n	&lt;p&gt;24小時&lt;br /&gt;\r\n	▼店員駐店時間&lt;br /&gt;\r\n	星期一～星期五　8：00～20：00&lt;br /&gt;\r\n	星期六　8：00～17：00&lt;br /&gt;\r\n	星期日　10：00～14：00&lt;/p&gt;\r\n	&lt;/li&gt;\r\n	&lt;li&gt;URL\r\n	&lt;p&gt;&lt;a href=&quot;https://phg-las.com/&quot; target=&quot;_blank&quot;&gt;https://phg-las.com/&lt;/a&gt;&lt;/p&gt;\r\n	&lt;/li&gt;\r\n	&lt;li&gt;instagram\r\n	&lt;p&gt;&lt;a href=&quot;https://www.instagram.com/powerhousegymlasvegas/&quot; target=&quot;_blank&quot;&gt;@powerhousegymlasvegas&lt;/a&gt;&lt;/p&gt;\r\n	&lt;/li&gt;\r\n&lt;/ul&gt;\r\n', '日本國外首次採用店！ 由被喻為&ldquo;Big Hide&rdquo;的職業健美選手山岸秀匡所經營的健身房。', '&lt;p&gt;pc/mo&lt;/p&gt;\r\n\r\n&lt;p&gt;在美國拉斯維加斯，新開業的POWERHOUSE GYM IRIS KYLE, HIDETADA YAMAGISHI, LAS VEGAS, NV，引進了許多EVOLGEAR的健身器材。經營者之一的山岸秀匡選手是日本健美第一人，同時也是EVOLGEAR贊助的選手之一。&lt;br /&gt;\r\n在一層100坪以上的地方，擺放了琳瑯滿目的EVOLGEAR健身器材，可謂壯觀。所引進的產品種類約50多種，十分齊全。&lt;br /&gt;\r\n這是EVOLGEAR的機械首次進軍到海外的案例，山岸選手回饋了很多使用後的心得與建議，對品質提升做出了巨大的貢獻。&lt;/p&gt;\r\n\r\n&lt;p&gt;&amp;nbsp;&lt;/p&gt;\r\n\r\n&lt;hr /&gt;\r\n&lt;p&gt;&amp;nbsp;&lt;/p&gt;\r\n', '', '1', '1');
INSERT INTO `casestudy` VALUES ('2', '', '', '自閉症 / 語言障礙 / 暴力傾向', '', '', '', '', '', '', '', '', '', '0', '0');

-- ----------------------------
-- Table structure for contact
-- ----------------------------
DROP TABLE IF EXISTS `contact`;
CREATE TABLE `contact` (
  `c_id` int(11) NOT NULL AUTO_INCREMENT,
  `c_date` datetime DEFAULT NULL,
  `c_name` varchar(255) DEFAULT NULL,
  `c_tel` varchar(255) DEFAULT '',
  `c_mail` varchar(255) DEFAULT '',
  `c_addr` varchar(255) DEFAULT '',
  `c_title` varchar(255) DEFAULT '',
  `c_text` text DEFAULT NULL,
  `c_status` int(3) NOT NULL DEFAULT 1,
  `c_ip` text DEFAULT NULL,
  PRIMARY KEY (`c_id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of contact
-- ----------------------------
INSERT INTO `contact` VALUES ('1', '2023-07-25 14:29:55', 'sunny', '0988123456', 'ssp@gmail.com', '台北市中山區', '源做', '123TEST', '1', null);
INSERT INTO `contact` VALUES ('2', '2023-07-28 18:08:38', '666', '4131sfsf', 'aaa', '456@gmail.com', '666', 'erfwer', '1', '::1');
INSERT INTO `contact` VALUES ('3', '2023-07-28 18:10:00', 'ssp', '0966789456', 'aaa', 'ssp@gmail.com', '789', 'test', '1', '::1');
INSERT INTO `contact` VALUES ('4', '2023-07-28 18:10:45', 'sunny test', '0966789456', '666', 'ssp@gmail.com', '1002', 'teee', '1', '::1');
INSERT INTO `contact` VALUES ('5', '2023-07-28 18:11:03', 'sunny test', '0966789456', '666', 'ssp@gmail.com', '1002', 'teee', '1', '::1');
INSERT INTO `contact` VALUES ('6', '2023-07-28 18:11:31', 'ccc', '0966789456', '', 'mak@mak66design.co', '1002', 'eee', '1', '::1');
INSERT INTO `contact` VALUES ('7', '2023-07-28 18:15:05', 'sunny test', '0966789456', '999', 'mak@mak66design.co', '8443', 'eeee', '1', '::1');
INSERT INTO `contact` VALUES ('8', '2023-07-28 18:17:35', 'sunny test', '0966789456', 'mak@mak66design.co', '8443', '999', 'eeee', '1', '::1');
INSERT INTO `contact` VALUES ('9', '2023-07-28 18:18:44', 'sunny test', '0966789456', 'mak@mak66design.co', '8443', '999', 'eeee', '1', '::1');

-- ----------------------------
-- Table structure for document
-- ----------------------------
DROP TABLE IF EXISTS `document`;
CREATE TABLE `document` (
  `d_id` int(11) NOT NULL DEFAULT 0,
  `d_text` text DEFAULT NULL,
  PRIMARY KEY (`d_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of document
-- ----------------------------
INSERT INTO `document` VALUES ('1', 'EVOLGEAR');
INSERT INTO `document` VALUES ('2', null);
INSERT INTO `document` VALUES ('3', null);
INSERT INTO `document` VALUES ('4', 'EVOLGEAR');
INSERT INTO `document` VALUES ('5', 'EVOLGEAR');
INSERT INTO `document` VALUES ('6', '@ 2022 EVOLGEAR All Rights Reserved.');
INSERT INTO `document` VALUES ('7', null);
INSERT INTO `document` VALUES ('8', null);
INSERT INTO `document` VALUES ('9', null);
INSERT INTO `document` VALUES ('10', null);
INSERT INTO `document` VALUES ('11', 'autmwell@mak66design2.com');
INSERT INTO `document` VALUES ('12', 'tAZ2Gvfxij{S');
INSERT INTO `document` VALUES ('13', 'ur17.cx901.com');
INSERT INTO `document` VALUES ('14', '465');
INSERT INTO `document` VALUES ('15', '2');
INSERT INTO `document` VALUES ('16', '1');
INSERT INTO `document` VALUES ('17', null);
INSERT INTO `document` VALUES ('18', null);
INSERT INTO `document` VALUES ('19', null);
INSERT INTO `document` VALUES ('20', null);
INSERT INTO `document` VALUES ('21', '03-358-9863');
INSERT INTO `document` VALUES ('22', '周一~周五10:00~18:00');
INSERT INTO `document` VALUES ('23', 'https://www.instagram.com/evolgear_tw/');
INSERT INTO `document` VALUES ('24', 'https://www.facebook.com/Evolgeartw');
INSERT INTO `document` VALUES ('25', '');
INSERT INTO `document` VALUES ('26', 'https://liff.line.me/1645278921-kWRPP32q/?accountId=126nmgtq');
INSERT INTO `document` VALUES ('27', 'abctede');
INSERT INTO `document` VALUES ('28', 'https://www.youtube.com/channel/UCejFBhzBjGHCtPQanuO1XKQ/featured');
INSERT INTO `document` VALUES ('29', '關於如何購買產品與詳細介紹');
INSERT INTO `document` VALUES ('30', '不管您是想要開設自己的健身工作室的專家教練、\r\n或是沒有相關經驗與知識的一般人，\r\nEVOLGEAR都能根據您的需求與預算量身打造最適合您的方案。');
INSERT INTO `document` VALUES ('31', null);
INSERT INTO `document` VALUES ('32', null);
INSERT INTO `document` VALUES ('33', null);
INSERT INTO `document` VALUES ('34', null);
INSERT INTO `document` VALUES ('35', null);
INSERT INTO `document` VALUES ('36', null);
INSERT INTO `document` VALUES ('37', null);
INSERT INTO `document` VALUES ('38', null);
INSERT INTO `document` VALUES ('39', null);
INSERT INTO `document` VALUES ('40', null);
INSERT INTO `document` VALUES ('41', null);
INSERT INTO `document` VALUES ('42', null);
INSERT INTO `document` VALUES ('43', null);
INSERT INTO `document` VALUES ('44', null);
INSERT INTO `document` VALUES ('45', null);
INSERT INTO `document` VALUES ('46', null);
INSERT INTO `document` VALUES ('47', null);
INSERT INTO `document` VALUES ('48', null);
INSERT INTO `document` VALUES ('49', null);
INSERT INTO `document` VALUES ('50', null);
INSERT INTO `document` VALUES ('51', null);
INSERT INTO `document` VALUES ('52', null);
INSERT INTO `document` VALUES ('53', null);
INSERT INTO `document` VALUES ('54', null);
INSERT INTO `document` VALUES ('55', null);
INSERT INTO `document` VALUES ('56', null);
INSERT INTO `document` VALUES ('57', null);
INSERT INTO `document` VALUES ('58', null);
INSERT INTO `document` VALUES ('59', null);
INSERT INTO `document` VALUES ('60', null);
INSERT INTO `document` VALUES ('61', null);
INSERT INTO `document` VALUES ('62', null);
INSERT INTO `document` VALUES ('63', null);
INSERT INTO `document` VALUES ('64', null);
INSERT INTO `document` VALUES ('65', null);
INSERT INTO `document` VALUES ('66', null);
INSERT INTO `document` VALUES ('67', null);
INSERT INTO `document` VALUES ('68', null);
INSERT INTO `document` VALUES ('69', null);
INSERT INTO `document` VALUES ('70', null);
INSERT INTO `document` VALUES ('71', null);
INSERT INTO `document` VALUES ('72', null);
INSERT INTO `document` VALUES ('73', null);
INSERT INTO `document` VALUES ('74', null);
INSERT INTO `document` VALUES ('75', null);
INSERT INTO `document` VALUES ('76', null);
INSERT INTO `document` VALUES ('77', null);
INSERT INTO `document` VALUES ('78', null);
INSERT INTO `document` VALUES ('79', null);
INSERT INTO `document` VALUES ('80', null);
INSERT INTO `document` VALUES ('81', null);
INSERT INTO `document` VALUES ('82', null);
INSERT INTO `document` VALUES ('83', null);
INSERT INTO `document` VALUES ('84', null);
INSERT INTO `document` VALUES ('85', null);
INSERT INTO `document` VALUES ('86', null);
INSERT INTO `document` VALUES ('87', null);
INSERT INTO `document` VALUES ('88', null);
INSERT INTO `document` VALUES ('89', null);
INSERT INTO `document` VALUES ('90', null);
INSERT INTO `document` VALUES ('91', null);
INSERT INTO `document` VALUES ('92', null);
INSERT INTO `document` VALUES ('93', null);
INSERT INTO `document` VALUES ('94', null);
INSERT INTO `document` VALUES ('95', null);
INSERT INTO `document` VALUES ('96', null);
INSERT INTO `document` VALUES ('97', null);
INSERT INTO `document` VALUES ('98', null);
INSERT INTO `document` VALUES ('99', null);
INSERT INTO `document` VALUES ('100', null);

-- ----------------------------
-- Table structure for download
-- ----------------------------
DROP TABLE IF EXISTS `download`;
CREATE TABLE `download` (
  `d_id` int(11) NOT NULL AUTO_INCREMENT,
  `d_title` varchar(255) DEFAULT NULL,
  `d_pdf` varchar(255) DEFAULT NULL,
  `d_size` varchar(255) DEFAULT NULL,
  `ds_id` int(11) DEFAULT NULL,
  `d_order` int(11) DEFAULT NULL,
  PRIMARY KEY (`d_id`),
  KEY `ds_id` (`ds_id`),
  CONSTRAINT `download_ibfk_1` FOREIGN KEY (`ds_id`) REFERENCES `d_series` (`ds_id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of download
-- ----------------------------
INSERT INTO `download` VALUES ('1', '配重片系列（P70～P23）', 'SSL伺服器數位憑證Apache2.2伺服器操作手冊.pdf', '1631275', '1', '2');
INSERT INTO `download` VALUES ('2', '硬體設備申請666', 't3.pdf', '98960', '1', '1');
INSERT INTO `download` VALUES ('3', '軟體授權申請', '安裝環境.pdf', '583436', '2', '0');

-- ----------------------------
-- Table structure for d_mclass
-- ----------------------------
DROP TABLE IF EXISTS `d_mclass`;
CREATE TABLE `d_mclass` (
  `dm_id` int(11) NOT NULL AUTO_INCREMENT,
  `dm_title` varchar(255) DEFAULT NULL,
  `dm_img` varchar(25) DEFAULT NULL,
  `dm_pdf` varchar(255) DEFAULT NULL,
  `dm_size` varchar(255) DEFAULT NULL,
  `dm_order` int(11) DEFAULT NULL,
  PRIMARY KEY (`dm_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of d_mclass
-- ----------------------------
INSERT INTO `d_mclass` VALUES ('1', 'abctest', '2023_07_31_1126251.jpeg', 'PDFtest.pdf', '33422', '1');
INSERT INTO `d_mclass` VALUES ('3', 'bdetest', '2023_07_31_1152581.jpeg', 'PDFtest.pdf', '33422', '0');

-- ----------------------------
-- Table structure for d_series
-- ----------------------------
DROP TABLE IF EXISTS `d_series`;
CREATE TABLE `d_series` (
  `ds_id` int(11) NOT NULL AUTO_INCREMENT,
  `ds_title` varchar(255) DEFAULT NULL,
  `dm_id` int(11) DEFAULT NULL,
  `ds_order` int(11) DEFAULT NULL,
  PRIMARY KEY (`ds_id`),
  KEY `dm_id` (`dm_id`),
  CONSTRAINT `d_series_ibfk_1` FOREIGN KEY (`dm_id`) REFERENCES `d_mclass` (`dm_id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of d_series
-- ----------------------------
INSERT INTO `d_series` VALUES ('1', 'Professional Edition666', '1', '1');
INSERT INTO `d_series` VALUES ('2', 'Professional Edition', '1', '0');

-- ----------------------------
-- Table structure for essay
-- ----------------------------
DROP TABLE IF EXISTS `essay`;
CREATE TABLE `essay` (
  `e_id` int(11) NOT NULL AUTO_INCREMENT,
  `e_title` varchar(255) DEFAULT NULL,
  `e_img` varchar(25) DEFAULT NULL,
  `e_ctext` text DEFAULT NULL,
  `e_mtext` text DEFAULT NULL,
  `e_page` int(11) DEFAULT NULL,
  `id` int(11) DEFAULT NULL,
  `e_status` int(3) DEFAULT NULL,
  `e_order` int(11) DEFAULT NULL,
  PRIMARY KEY (`e_id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of essay
-- ----------------------------
INSERT INTO `essay` VALUES ('1', 'OFFICIAL SPONSOR', null, '&lt;p&gt;&lt;img src=&quot;https://evolgear.com.tw/img/top_zh/spon-olympia-02.jpg&quot; /&gt;&lt;/p&gt;\r\n', '', '1', null, '1', '5');
INSERT INTO `essay` VALUES ('2', null, null, '&lt;h3&gt;產品種類超過280種！成交案件超過3,000件，產品出貨數量突破100,000件大關！&lt;/h3&gt;\r\n\r\n&lt;p&gt;&lt;img alt=&quot;導入事例イメージ1&quot; src=&quot;https://evolgear.com.tw/img/about/case_01.jpg&quot; /&gt;&lt;/p&gt;\r\n', '', '1', null, '1', '6');
INSERT INTO `essay` VALUES ('3', '展廳資訊', '2023_07_28_0635371.jpeg', 'https://evolgear.com.tw/index.php', null, '1', null, null, '7');
INSERT INTO `essay` VALUES ('4', '客戶案例', '2023_07_28_0634421.jpeg', 'https://evolgear.com.tw/casestudy.php', null, '1', null, null, '8');
INSERT INTO `essay` VALUES ('5', '我們的優勢', '2023_07_28_0633571.jpeg', 'https://evolgear.com.tw/merit.php', null, '1', null, null, '9');
INSERT INTO `essay` VALUES ('6', '公司簡介', '2023_07_28_0632491.jpeg', 'https://evolgear.com.tw/profile.php', null, '1', null, null, '3');
INSERT INTO `essay` VALUES ('7', null, null, '&lt;ul&gt;\r\n	&lt;li&gt;地址\r\n	&lt;p&gt;330桃園市桃園區民生路54號1樓&lt;/p&gt;\r\n	&lt;/li&gt;\r\n	&lt;li&gt;交通方式\r\n	&lt;p&gt;從桃園火車站步行5分鐘&lt;/p&gt;\r\n	&lt;/li&gt;\r\n	&lt;li&gt;營業時間\r\n	&lt;p&gt;周一~周五10:00~18:00&lt;/p&gt;\r\n	&lt;/li&gt;\r\n	&lt;li&gt;電話受理時間\r\n	&lt;p&gt;周一~周五10:00~18&lt;/p&gt;\r\n	&lt;/li&gt;\r\n&lt;/ul&gt;\r\n\r\n&lt;hr /&gt;\r\n&lt;p&gt;&lt;iframe frameborder=&quot;0&quot; height=&quot;450&quot; scrolling=&quot;no&quot; src=&quot;https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3616.259774623001!2d121.31233477599949!3d24.99128744000888!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x34681efb70114957%3A0x1d0aba29373bfaf7!2zMzMw5qGD5ZyS5biC5qGD5ZyS5Y2A5rCR55Sf6LevNTTomZ8xRg!5e0!3m2!1szh-TW!2stw!4v1690533964293!5m2!1szh-TW!2stw&quot; style=&quot;border:0;&quot; width=&quot;100%&quot;&gt;&lt;/iframe&gt;&lt;/p&gt;\r\n', '', '5', null, null, '10');
INSERT INTO `essay` VALUES ('8', null, null, '&lt;p style=&quot;text-align:center&quot;&gt;為您介紹EVOLGEAR的主要客戶案例。&lt;br /&gt;\r\nEVOLGEAR 已被引進全國各地，從健身房、運動俱樂部到公司和私人住宅。&lt;br /&gt;\r\n您可以根據我們實際的客戶經驗來選擇EVOLGEAR 的健身器材。&lt;/p&gt;\r\n', '', '6', null, null, '11');
INSERT INTO `essay` VALUES ('9', null, null, '&lt;p&gt;下載型錄123 pc&lt;/p&gt;\r\n', '', null, null, null, null);
INSERT INTO `essay` VALUES ('11', '多樣化的產品線 實現您想打造的 健身房主題風格', '1', '&lt;p&gt;我們擁有多元豐富的產品，不論是健身房或私人健身房，或是醫療機構,企業,飯店,公寓也好，甚至是初次開設健身房的顧客，我們都會根據設施環境和用途來提出最佳方案。&lt;/p&gt;\r\n', '', '2', '2', '1', '2');
INSERT INTO `essay` VALUES ('12', '經驗豐富的專業人員， 將全力支持，與您共同打造健身房', '0', '&lt;p&gt;我們經驗豐富的專業人員，將根據您想打造的健身房理念，提出最佳的成本計劃，如果您是初次開設的話，也歡迎隨時聯繫我們。&lt;/p&gt;\r\n', '', '2', '1', '1', '1');
INSERT INTO `essay` VALUES ('13', '從事前諮詢到交貨・組裝・設置 售後，完善的一條龍服務', '1', '&lt;p&gt;從機械挑選和引進流程的諮詢到交貨・組裝・設置售後完善的一條龍服務。機械提供最高5年安心保固，如發生故障，將免費協助處理。&lt;/p&gt;\r\n', '', '2', '1', '0', '0');

-- ----------------------------
-- Table structure for image
-- ----------------------------
DROP TABLE IF EXISTS `image`;
CREATE TABLE `image` (
  `i_id` int(11) NOT NULL AUTO_INCREMENT,
  `i_title` varchar(255) DEFAULT NULL,
  `i_img_c` varchar(25) DEFAULT NULL,
  `i_img_m` varchar(25) DEFAULT NULL,
  `i_url` text DEFAULT NULL,
  `i_page` int(11) DEFAULT NULL,
  `related_id` int(11) DEFAULT NULL,
  `i_order` int(11) DEFAULT NULL,
  PRIMARY KEY (`i_id`)
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of image
-- ----------------------------
INSERT INTO `image` VALUES ('1', null, '2023_07_26_1151421.jpeg', '2023_07_26_1151422.jpeg', 'https://evolgear.com.tw/contact.php', '1', null, '19');
INSERT INTO `image` VALUES ('2', null, '2023_07_26_1154541.jpeg', null, null, '4', null, '20');
INSERT INTO `image` VALUES ('10', null, '2023_07_27_0420051.png', '', null, '2', null, '18');
INSERT INTO `image` VALUES ('11', null, '2023_07_27_0426321.jpeg', '2023_07_27_0457202.jpeg', 'https://www.youtube.com/', '2', '1', '14');
INSERT INTO `image` VALUES ('12', null, '2023_07_27_0503311.jpeg', '2023_07_27_0503312.jpeg', null, '2', '3', '13');
INSERT INTO `image` VALUES ('13', null, '2023_07_27_0515591.jpeg', '2023_07_27_0515592.jpeg', null, '2', '2', '12');
INSERT INTO `image` VALUES ('14', null, '2023_07_27_0528161.jpeg', '2023_07_27_0528162.jpeg', null, '2', '3', '11');
INSERT INTO `image` VALUES ('15', null, '2023_07_27_0548381.jpeg', null, null, '6', '1', '9');
INSERT INTO `image` VALUES ('16', null, '2023_07_27_0550131.jpeg', null, null, '6', '1', '10');
INSERT INTO `image` VALUES ('17', null, '2023_07_27_0550581.jpeg', null, null, '6', '2', '8');
INSERT INTO `image` VALUES ('18', null, '2023_07_27_0737541.jpeg', null, null, '5', '0', '7');
INSERT INTO `image` VALUES ('19', null, '2023_07_27_0749201.jpeg', null, null, '5', '0', '2');
INSERT INTO `image` VALUES ('20', null, '2023_07_27_1025171.jpeg', null, null, '3', '1', '5');
INSERT INTO `image` VALUES ('21', null, '2023_07_27_1041531.jpeg', null, null, '3', '1', '6');
INSERT INTO `image` VALUES ('22', null, '2023_07_27_1043261.jpeg', null, null, '3', '2', '4');
INSERT INTO `image` VALUES ('23', null, '2023_07_27_1124291.jpeg', null, null, '4', '1', '3');
INSERT INTO `image` VALUES ('24', null, '2023_07_28_1052331.jpeg', null, null, '5', '0', '1');
INSERT INTO `image` VALUES ('25', null, '2023_07_28_1141521.jpeg', null, null, '4', '1', '0');

-- ----------------------------
-- Table structure for mail
-- ----------------------------
DROP TABLE IF EXISTS `mail`;
CREATE TABLE `mail` (
  `m_id` int(11) NOT NULL AUTO_INCREMENT,
  `m_account` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`m_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of mail
-- ----------------------------
INSERT INTO `mail` VALUES ('1', 'sunnykuo@mak66design.com');

-- ----------------------------
-- Table structure for menu
-- ----------------------------
DROP TABLE IF EXISTS `menu`;
CREATE TABLE `menu` (
  `m_id` varchar(6) NOT NULL DEFAULT '',
  `m_type` varchar(10) DEFAULT NULL,
  `m_name` varchar(255) DEFAULT NULL,
  `m_url` varchar(255) DEFAULT NULL,
  `m_icon_sidebar` varchar(255) DEFAULT NULL,
  `m_icon_index` varchar(255) DEFAULT NULL,
  `m_main_purview` varchar(10) DEFAULT '2',
  `m_sub_purview` varchar(10) DEFAULT '0',
  PRIMARY KEY (`m_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of menu
-- ----------------------------
INSERT INTO `menu` VALUES ('006', 'root', '功能權限', 'menu.php', 'fa fa-users', 'fa fa-users', '0', '0');
INSERT INTO `menu` VALUES ('011', 'root', '網站基本設定', '-', 'fa fa-cogs', '-', '2', '0');
INSERT INTO `menu` VALUES ('011-06', 'leaf', '網頁基本設定', 'sethead.php', '-', 'fa fa-cogs', '2', '0');
INSERT INTO `menu` VALUES ('011-11', 'leaf', '頁尾資訊設定', 'setinfo.php', '-', 'fa fa-info', '2', '0');
INSERT INTO `menu` VALUES ('011-16', 'leaf', '寄件信箱管理', 'setmail.php', '-', 'fa fa-envelope-o', '2', '0');
INSERT INTO `menu` VALUES ('011-21', 'leaf', '收件信箱管理', 'mail.php', '-', 'fa fa-envelope-open-o', '2', '0');
INSERT INTO `menu` VALUES ('016', 'root', '首頁功能專區', '-', 'fa fa-university', '-', '2', '0');
INSERT INTO `menu` VALUES ('016-06', 'leaf', '主視覺設定', 'image_update.php?page_id=1&id=1', '-', 'fa fa-pencil-square-o', '2', '0');
INSERT INTO `menu` VALUES ('016-11', 'leaf', '黑色區塊內容', 'essay_update.php?id=1', '-', 'fa fa-pencil-square-o', '2', '0');
INSERT INTO `menu` VALUES ('016-15', 'leaf', '白色區塊內容', 'essay_update.php?id=2', '-', 'fa fa-external-link', '2', '0');
INSERT INTO `menu` VALUES ('016-16', 'leaf', '快速連結設定', 'quicklink.php', '-', 'fa fa-picture-o', '2', '0');
INSERT INTO `menu` VALUES ('021', 'root', '最新消息', 'news.php', 'fa fa-newspaper-o', 'fa fa-newspaper-o', '2', '0');
INSERT INTO `menu` VALUES ('026', 'root', '產品介紹', 'p_series.php', 'fa fa-empire', 'fa fa-empire', '2', '0');
INSERT INTO `menu` VALUES ('031', 'root', '健身代言', '-', 'fa fa-commenting-o', '-', '2', '0');
INSERT INTO `menu` VALUES ('031-06', 'leaf', '主視覺設定', 'image_update.php?page_id=4&id=2', '-', 'fa fa-picture-o', '2', '0');
INSERT INTO `menu` VALUES ('031-11', 'leaf', '人員介紹列表', 'sponsor.php', '-', 'fa fa-user', '2', '0');
INSERT INTO `menu` VALUES ('036', 'root', '展廳資訊', '-', 'fa fa-building-o', '-', '2', '0');
INSERT INTO `menu` VALUES ('036-06', 'leaf', '展廳圖片', 'image.php?page_id=5&id=0', '-', 'fa fa-picture-o', '2', '0');
INSERT INTO `menu` VALUES ('036-11', 'leaf', '詳細資訊', 'essay_update.php?id=7', '-', 'fa fa-pencil-square-o', '2', '0');
INSERT INTO `menu` VALUES ('041', 'root', '客戶實績', '-', 'fa fa-handshake-o', '-', '2', '0');
INSERT INTO `menu` VALUES ('041-06', 'leaf', '前言', 'essay_update.php?id=8', '-', 'fa fa-pencil-square-o', '2', '0');
INSERT INTO `menu` VALUES ('041-11', 'leaf', '客戶實績列表', 'casestudy.php', '-', 'fa fa-handshake-o', '2', '0');
INSERT INTO `menu` VALUES ('046', 'root', '購買流程', 'article_update.php?id=4', 'fa fa-bullhorn', 'fa fa-bullhorn', '2', '0');
INSERT INTO `menu` VALUES ('051', 'root', '下載型錄', '-', 'fa fa-cloud-download', '-', '2', '0');
INSERT INTO `menu` VALUES ('051-06', 'leaf', '前言', 'essay_update.php?id=9', '-', 'fa fa-pencil-square-o', '2', '0');
INSERT INTO `menu` VALUES ('051-11', 'leaf', '下載型錄列表', 'd_mclass.php', '-', 'fa fa-cloud-download', '2', '0');
INSERT INTO `menu` VALUES ('056', 'root', '公司介紹', 'article_update.php?id=5', 'fa fa-info-circle', 'fa fa-info-circle', '2', '0');
INSERT INTO `menu` VALUES ('061', 'root', '聯絡我們', '-', 'fa fa-comments', '-', '2', '0');
INSERT INTO `menu` VALUES ('061-06', 'leaf', '引導文字', 'article_update.php?id=6', '-', 'fa fa-pencil-square-o', '2', '0');
INSERT INTO `menu` VALUES ('061-11', 'leaf', '聯絡表單資訊', 'contact.php', '-', 'fa fa-comments', '2', '0');
INSERT INTO `menu` VALUES ('066', 'root', '自訂文章', 'article.php', 'fa fa-pencil-square-o', 'fa fa-pencil-square-o', '2', '0');

-- ----------------------------
-- Table structure for news
-- ----------------------------
DROP TABLE IF EXISTS `news`;
CREATE TABLE `news` (
  `n_id` int(11) NOT NULL AUTO_INCREMENT,
  `n_title` varchar(255) DEFAULT NULL,
  `n_date` date DEFAULT NULL,
  `n_keyword` varchar(255) DEFAULT NULL,
  `n_desc` text DEFAULT NULL,
  `n_ctext` text DEFAULT NULL,
  `n_mtext` text DEFAULT NULL,
  `n_order` int(11) DEFAULT NULL,
  `n_status` int(3) DEFAULT 0,
  PRIMARY KEY (`n_id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of news
-- ----------------------------
INSERT INTO `news` VALUES ('1', 'case1', '2022-02-05', null, null, '&lt;p&gt;TEST&lt;/p&gt;\r\n', '&lt;p&gt;TEST&lt;/p&gt;\r\n', '3', '0');
INSERT INTO `news` VALUES ('2', 'test2', '2022-02-04', null, null, '&lt;p&gt;NEW&lt;/p&gt;\r\n\r\n&lt;p&gt;&amp;nbsp;&lt;/p&gt;\r\n', '&lt;p&gt;NEW&lt;/p&gt;\r\n', '1', '0');
INSERT INTO `news` VALUES ('3', 'test3789', '2022-06-12', '#財經 #股票 #錢', '789456123', '&lt;p&gt;pc/mo&lt;/p&gt;\r\n\r\n&lt;p&gt;test&lt;/p&gt;\r\n', '', '0', '1');
INSERT INTO `news` VALUES ('4', 'test1', '2022-02-04', null, null, '', '', '2', '0');
INSERT INTO `news` VALUES ('5', '活動快訊1122', '2023-07-25', '#職場 #正能量', '網頁描述網頁描述網頁描述網頁描述', '&lt;p&gt;pc&lt;/p&gt;\r\n', '&lt;p&gt;mo&lt;/p&gt;\r\n', '4', '1');

-- ----------------------------
-- Table structure for product
-- ----------------------------
DROP TABLE IF EXISTS `product`;
CREATE TABLE `product` (
  `p_id` int(11) NOT NULL AUTO_INCREMENT,
  `p_title` varchar(255) DEFAULT NULL,
  `p_stitle` varchar(255) DEFAULT NULL,
  `p_keyword` varchar(255) DEFAULT NULL,
  `p_desc` text DEFAULT NULL,
  `p_img` varchar(25) DEFAULT NULL,
  `p_news` int(3) DEFAULT NULL,
  `p_ctext1` text DEFAULT NULL,
  `p_mtext1` text DEFAULT NULL,
  `p_ctext2` text DEFAULT NULL,
  `p_mtext2` text DEFAULT NULL,
  `p_order` int(11) DEFAULT NULL,
  `p_status` int(3) DEFAULT NULL,
  `pc_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`p_id`),
  KEY `pc_id` (`pc_id`),
  CONSTRAINT `product_ibfk_1` FOREIGN KEY (`pc_id`) REFERENCES `p_class` (`pc_id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of product
-- ----------------------------
INSERT INTO `product` VALUES ('1', '俯臥腿部訓練機', 'EVW-S001', 'aaa,bbb,ccc', '6666', '2023_07_27_0945271.jpeg', '1', '&lt;p&gt;槓片：110kg&lt;/p&gt;\r\n', '&lt;p&gt;mo槓片：110kg&lt;/p&gt;\r\n', '&lt;p&gt;777&lt;/p&gt;\r\n', '&lt;p&gt;666&lt;/p&gt;\r\n', '1', '0', '2');
INSERT INTO `product` VALUES ('2', 'Changeable Quilter&#039;s Guide Foot', 'CCCC-1234', '', '', '', '0', '', '', null, null, '0', '0', '3');

-- ----------------------------
-- Table structure for p_class
-- ----------------------------
DROP TABLE IF EXISTS `p_class`;
CREATE TABLE `p_class` (
  `pc_id` int(11) NOT NULL AUTO_INCREMENT,
  `pc_title_tw` varchar(255) DEFAULT NULL,
  `pc_title_en` varchar(255) DEFAULT NULL,
  `pc_img` varchar(25) DEFAULT NULL,
  `pc_keyword` varchar(255) DEFAULT NULL,
  `pc_desc` text DEFAULT NULL,
  `pc_ctext` text DEFAULT NULL,
  `pc_mtext` text DEFAULT NULL,
  `ps_id` int(11) DEFAULT NULL,
  `pc_order` int(11) DEFAULT NULL,
  PRIMARY KEY (`pc_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of p_class
-- ----------------------------
INSERT INTO `p_class` VALUES ('1', '配重片系列(皮拉提斯器械系列)', 'WEIGHT STACK', '2023_07_27_0815561.jpeg', null, null, '&lt;p&gt;test&lt;/p&gt;\r\n\r\n&lt;p&gt;123&lt;/p&gt;\r\n\r\n&lt;p&gt;456&lt;/p&gt;\r\n', '', '3', '2');
INSERT INTO `p_class` VALUES ('2', '配重片系列 (商用訓練機系列)', 'WEIGHT STACK2', '2023_07_27_0947421.jpeg', '健身,aaa,bbb,ccc', 'meta,meta,meta', '&lt;p&gt;pc/mo&lt;/p&gt;\r\n\r\n&lt;table border=&quot;1&quot; cellpadding=&quot;1&quot; cellspacing=&quot;1&quot; style=&quot;width:100%&quot;&gt;\r\n	&lt;tbody&gt;\r\n		&lt;tr&gt;\r\n			&lt;td&gt;aa&lt;/td&gt;\r\n			&lt;td&gt;ee&lt;/td&gt;\r\n		&lt;/tr&gt;\r\n		&lt;tr&gt;\r\n			&lt;td&gt;bb&lt;/td&gt;\r\n			&lt;td&gt;aa&lt;/td&gt;\r\n		&lt;/tr&gt;\r\n		&lt;tr&gt;\r\n			&lt;td&gt;dd&lt;/td&gt;\r\n			&lt;td&gt;aa&lt;/td&gt;\r\n		&lt;/tr&gt;\r\n	&lt;/tbody&gt;\r\n&lt;/table&gt;\r\n\r\n&lt;p&gt;&amp;nbsp;&lt;/p&gt;\r\n', '', '1', '1');
INSERT INTO `p_class` VALUES ('3', '配重片系列 (123456789)', '2222222', '2023_07_27_1042271.jpeg', null, null, '', '', '3', '0');

-- ----------------------------
-- Table structure for record
-- ----------------------------
DROP TABLE IF EXISTS `record`;
CREATE TABLE `record` (
  `r_id` int(11) NOT NULL AUTO_INCREMENT,
  `r_date` datetime DEFAULT NULL,
  `r_text` varchar(255) DEFAULT NULL,
  `r_account` varchar(255) DEFAULT NULL,
  `r_name` varchar(255) DEFAULT NULL,
  `r_ip` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`r_id`)
) ENGINE=InnoDB AUTO_INCREMENT=167 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of record
-- ----------------------------
INSERT INTO `record` VALUES ('1', '2023-07-25 13:27:21', '登入', 'MAK_supervisor', '源做總管理者', '::1');
INSERT INTO `record` VALUES ('2', '2023-07-25 14:11:43', 'document 資料修改：25', 'MAK_supervisor', '源做總管理者', '::1');
INSERT INTO `record` VALUES ('3', '2023-07-25 14:13:13', 'document 資料修改：28', 'MAK_supervisor', '源做總管理者', '::1');
INSERT INTO `record` VALUES ('4', '2023-07-25 14:13:57', 'document 資料修改：26', 'MAK_supervisor', '源做總管理者', '::1');
INSERT INTO `record` VALUES ('5', '2023-07-25 14:15:01', 'document 資料修改：30', 'MAK_supervisor', '源做總管理者', '::1');
INSERT INTO `record` VALUES ('6', '2023-07-25 14:15:37', 'document 資料修改：25', 'MAK_supervisor', '源做總管理者', '::1');
INSERT INTO `record` VALUES ('7', '2023-07-25 14:15:59', 'document 資料修改：6', 'MAK_supervisor', '源做總管理者', '::1');
INSERT INTO `record` VALUES ('8', '2023-07-25 14:27:41', 'news 資料狀態修改', 'MAK_supervisor', '源做總管理者', '::1');
INSERT INTO `record` VALUES ('9', '2023-07-25 14:28:05', 'news 資料修改：3', 'MAK_supervisor', '源做總管理者', '::1');
INSERT INTO `record` VALUES ('10', '2023-07-25 14:28:17', 'news 資料新增', 'MAK_supervisor', '源做總管理者', '::1');
INSERT INTO `record` VALUES ('11', '2023-07-25 14:28:34', 'news 資料修改：5', 'MAK_supervisor', '源做總管理者', '::1');
INSERT INTO `record` VALUES ('12', '2023-07-25 14:50:02', 'article 資料新增', 'MAK_supervisor', '源做總管理者', '::1');
INSERT INTO `record` VALUES ('13', '2023-07-25 14:50:53', 'article 資料新增', 'MAK_supervisor', '源做總管理者', '::1');
INSERT INTO `record` VALUES ('14', '2023-07-25 14:51:14', 'article 資料新增', 'MAK_supervisor', '源做總管理者', '::1');
INSERT INTO `record` VALUES ('15', '2023-07-25 15:01:20', 'article 資料修改：11', 'MAK_supervisor', '源做總管理者', '::1');
INSERT INTO `record` VALUES ('16', '2023-07-25 15:01:25', 'article 資料狀態修改', 'MAK_supervisor', '源做總管理者', '::1');
INSERT INTO `record` VALUES ('17', '2023-07-25 15:01:58', 'article 資料狀態修改', 'MAK_supervisor', '源做總管理者', '::1');
INSERT INTO `record` VALUES ('18', '2023-07-25 15:02:01', 'article 資料狀態修改', 'MAK_supervisor', '源做總管理者', '::1');
INSERT INTO `record` VALUES ('19', '2023-07-25 15:10:20', 'article 資料修改：5', 'MAK_supervisor', '源做總管理者', '::1');
INSERT INTO `record` VALUES ('20', '2023-07-25 15:10:40', 'article 資料修改：5', 'MAK_supervisor', '源做總管理者', '::1');
INSERT INTO `record` VALUES ('21', '2023-07-25 15:11:05', 'article 資料修改：4', 'MAK_supervisor', '源做總管理者', '::1');
INSERT INTO `record` VALUES ('22', '2023-07-25 15:34:50', 'casestudy 資料新增', 'MAK_supervisor', '源做總管理者', '::1');
INSERT INTO `record` VALUES ('23', '2023-07-25 15:35:15', 'casestudy 資料狀態修改', 'MAK_supervisor', '源做總管理者', '::1');
INSERT INTO `record` VALUES ('24', '2023-07-25 15:36:05', 'casestudy 資料修改：1', 'MAK_supervisor', '源做總管理者', '::1');
INSERT INTO `record` VALUES ('25', '2023-07-25 15:40:10', 'casestudy 資料修改：1', 'MAK_supervisor', '源做總管理者', '::1');
INSERT INTO `record` VALUES ('26', '2023-07-25 16:02:20', 'article 資料修改：1', 'MAK_supervisor', '源做總管理者', '::1');
INSERT INTO `record` VALUES ('27', '2023-07-25 16:07:49', 'article 資料修改：2', 'MAK_supervisor', '源做總管理者', '::1');
INSERT INTO `record` VALUES ('28', '2023-07-25 16:08:03', 'article 資料修改：3', 'MAK_supervisor', '源做總管理者', '::1');
INSERT INTO `record` VALUES ('29', '2023-07-26 15:31:22', '登入', 'MAK_supervisor', '源做總管理者', '::1');
INSERT INTO `record` VALUES ('30', '2023-07-26 16:10:04', 'essay 資料修改：1', 'MAK_supervisor', '源做總管理者', '::1');
INSERT INTO `record` VALUES ('31', '2023-07-26 16:10:09', 'essay 資料修改：1', 'MAK_supervisor', '源做總管理者', '::1');
INSERT INTO `record` VALUES ('32', '2023-07-26 16:17:54', 'essay 資料修改：2', 'MAK_supervisor', '源做總管理者', '::1');
INSERT INTO `record` VALUES ('33', '2023-07-26 16:19:30', 'essay 資料修改：3', 'MAK_supervisor', '源做總管理者', '::1');
INSERT INTO `record` VALUES ('34', '2023-07-26 16:19:35', 'essay 資料修改：3', 'MAK_supervisor', '源做總管理者', '::1');
INSERT INTO `record` VALUES ('35', '2023-07-26 16:41:09', 'essay 資料修改：4', 'MAK_supervisor', '源做總管理者', '::1');
INSERT INTO `record` VALUES ('36', '2023-07-26 16:42:01', 'essay 資料修改：5', 'MAK_supervisor', '源做總管理者', '::1');
INSERT INTO `record` VALUES ('37', '2023-07-26 16:42:24', 'essay 資料修改：6', 'MAK_supervisor', '源做總管理者', '::1');
INSERT INTO `record` VALUES ('38', '2023-07-26 16:43:29', 'essay 資料修改：6', 'MAK_supervisor', '源做總管理者', '::1');
INSERT INTO `record` VALUES ('39', '2023-07-26 16:44:01', 'essay 資料修改：6', 'MAK_supervisor', '源做總管理者', '::1');
INSERT INTO `record` VALUES ('40', '2023-07-26 16:50:38', 'essay 資料修改：8', 'MAK_supervisor', '源做總管理者', '::1');
INSERT INTO `record` VALUES ('41', '2023-07-26 16:51:41', 'essay 資料修改：7', 'MAK_supervisor', '源做總管理者', '::1');
INSERT INTO `record` VALUES ('42', '2023-07-26 17:11:12', 'essay 資料修改：6', 'MAK_supervisor', '源做總管理者', '::1');
INSERT INTO `record` VALUES ('43', '2023-07-26 17:27:07', 'essay 資料新增', 'MAK_supervisor', '源做總管理者', '::1');
INSERT INTO `record` VALUES ('44', '2023-07-26 17:40:17', 'essay 資料新增', 'MAK_supervisor', '源做總管理者', '::1');
INSERT INTO `record` VALUES ('45', '2023-07-26 17:40:46', 'essay 資料新增', 'MAK_supervisor', '源做總管理者', '::1');
INSERT INTO `record` VALUES ('46', '2023-07-26 17:41:33', 'essay 資料修改：13', 'MAK_supervisor', '源做總管理者', '::1');
INSERT INTO `record` VALUES ('47', '2023-07-26 17:51:43', 'image 資料修改：1', 'MAK_supervisor', '源做總管理者', '::1');
INSERT INTO `record` VALUES ('48', '2023-07-26 17:52:00', 'image 資料修改：1', 'MAK_supervisor', '源做總管理者', '::1');
INSERT INTO `record` VALUES ('49', '2023-07-26 17:54:54', 'image 資料修改：2', 'MAK_supervisor', '源做總管理者', '::1');
INSERT INTO `record` VALUES ('50', '2023-07-27 09:23:59', '登入', 'MAK_supervisor', '源做總管理者', '::1');
INSERT INTO `record` VALUES ('51', '2023-07-27 10:18:37', 'image 資料新增', 'MAK_supervisor', '源做總管理者', '::1');
INSERT INTO `record` VALUES ('52', '2023-07-27 10:18:59', 'image 資料刪除：11', 'MAK_supervisor', '源做總管理者', '::1');
INSERT INTO `record` VALUES ('53', '2023-07-27 10:19:19', 'image 資料新增', 'MAK_supervisor', '源做總管理者', '::1');
INSERT INTO `record` VALUES ('54', '2023-07-27 10:19:56', 'image 資料刪除：12', 'MAK_supervisor', '源做總管理者', '::1');
INSERT INTO `record` VALUES ('55', '2023-07-27 10:20:05', 'image 資料新增', 'MAK_supervisor', '源做總管理者', '::1');
INSERT INTO `record` VALUES ('56', '2023-07-27 10:21:44', 'image 資料新增', 'MAK_supervisor', '源做總管理者', '::1');
INSERT INTO `record` VALUES ('57', '2023-07-27 10:22:47', 'image 資料新增', 'MAK_supervisor', '源做總管理者', '::1');
INSERT INTO `record` VALUES ('58', '2023-07-27 10:23:25', 'image 資料新增', 'MAK_supervisor', '源做總管理者', '::1');
INSERT INTO `record` VALUES ('59', '2023-07-27 10:25:15', 'image 資料新增', 'MAK_supervisor', '源做總管理者', '::1');
INSERT INTO `record` VALUES ('60', '2023-07-27 10:26:32', 'image 資料新增', 'MAK_supervisor', '源做總管理者', '::1');
INSERT INTO `record` VALUES ('61', '2023-07-27 10:57:20', 'image 資料修改：11', 'MAK_supervisor', '源做總管理者', '::1');
INSERT INTO `record` VALUES ('62', '2023-07-27 11:03:31', 'image 資料新增', 'MAK_supervisor', '源做總管理者', '::1');
INSERT INTO `record` VALUES ('63', '2023-07-27 11:15:59', 'image 資料新增', 'MAK_supervisor', '源做總管理者', '::1');
INSERT INTO `record` VALUES ('64', '2023-07-27 11:28:16', 'image 資料新增', 'MAK_supervisor', '源做總管理者', '::1');
INSERT INTO `record` VALUES ('65', '2023-07-27 11:39:46', 'image 資料新增', 'MAK_supervisor', '源做總管理者', '::1');
INSERT INTO `record` VALUES ('66', '2023-07-27 11:48:38', 'image 資料修改：15', 'MAK_supervisor', '源做總管理者', '::1');
INSERT INTO `record` VALUES ('67', '2023-07-27 11:50:13', 'image 資料新增', 'MAK_supervisor', '源做總管理者', '::1');
INSERT INTO `record` VALUES ('68', '2023-07-27 11:50:18', 'image 資料修改：16', 'MAK_supervisor', '源做總管理者', '::1');
INSERT INTO `record` VALUES ('69', '2023-07-27 11:50:49', 'casestudy 資料新增', 'MAK_supervisor', '源做總管理者', '::1');
INSERT INTO `record` VALUES ('70', '2023-07-27 11:50:59', 'image 資料新增', 'MAK_supervisor', '源做總管理者', '::1');
INSERT INTO `record` VALUES ('71', '2023-07-27 13:37:54', 'image 資料新增', 'MAK_supervisor', '源做總管理者', '::1');
INSERT INTO `record` VALUES ('72', '2023-07-27 13:49:20', 'image 資料新增', 'MAK_supervisor', '源做總管理者', '::1');
INSERT INTO `record` VALUES ('73', '2023-07-27 13:49:24', 'image 資料修改：19', 'MAK_supervisor', '源做總管理者', '::1');
INSERT INTO `record` VALUES ('74', '2023-07-27 14:15:56', 'p_class 資料新增', 'MAK_supervisor', '源做總管理者', '::1');
INSERT INTO `record` VALUES ('75', '2023-07-27 14:21:20', 'p_class 資料新增', 'MAK_supervisor', '源做總管理者', '::1');
INSERT INTO `record` VALUES ('76', '2023-07-27 14:25:55', 'p_class 資料修改：1', 'MAK_supervisor', '源做總管理者', '::1');
INSERT INTO `record` VALUES ('77', '2023-07-27 14:47:15', 'p_class 資料修改：1', 'MAK_supervisor', '源做總管理者', '::1');
INSERT INTO `record` VALUES ('78', '2023-07-27 15:25:27', 'product 資料新增', 'MAK_supervisor', '源做總管理者', '::1');
INSERT INTO `record` VALUES ('79', '2023-07-27 15:45:08', 'product 資料修改：1', 'MAK_supervisor', '源做總管理者', '::1');
INSERT INTO `record` VALUES ('80', '2023-07-27 15:45:27', 'product 資料修改：1', 'MAK_supervisor', '源做總管理者', '::1');
INSERT INTO `record` VALUES ('81', '2023-07-27 15:47:42', 'p_class 資料修改：2', 'MAK_supervisor', '源做總管理者', '::1');
INSERT INTO `record` VALUES ('82', '2023-07-27 16:25:17', 'image 資料新增', 'MAK_supervisor', '源做總管理者', '::1');
INSERT INTO `record` VALUES ('83', '2023-07-27 16:41:54', 'image 資料新增', 'MAK_supervisor', '源做總管理者', '::1');
INSERT INTO `record` VALUES ('84', '2023-07-27 16:41:58', 'image 資料修改：21', 'MAK_supervisor', '源做總管理者', '::1');
INSERT INTO `record` VALUES ('85', '2023-07-27 16:42:27', 'p_class 資料新增', 'MAK_supervisor', '源做總管理者', '::1');
INSERT INTO `record` VALUES ('86', '2023-07-27 16:42:52', 'p_class 資料修改：3', 'MAK_supervisor', '源做總管理者', '::1');
INSERT INTO `record` VALUES ('87', '2023-07-27 16:43:10', 'product 資料新增', 'MAK_supervisor', '源做總管理者', '::1');
INSERT INTO `record` VALUES ('88', '2023-07-27 16:43:26', 'image 資料新增', 'MAK_supervisor', '源做總管理者', '::1');
INSERT INTO `record` VALUES ('89', '2023-07-27 16:58:52', 'product 資料修改：1', 'MAK_supervisor', '源做總管理者', '::1');
INSERT INTO `record` VALUES ('90', '2023-07-27 17:00:23', 'product 資料狀態修改', 'MAK_supervisor', '源做總管理者', '::1');
INSERT INTO `record` VALUES ('91', '2023-07-27 17:01:28', 'product 資料狀態修改', 'MAK_supervisor', '源做總管理者', '::1');
INSERT INTO `record` VALUES ('92', '2023-07-27 17:08:36', 'sponsor 資料新增', 'MAK_supervisor', '源做總管理者', '::1');
INSERT INTO `record` VALUES ('93', '2023-07-27 17:11:05', 'sponsor 資料修改：1', 'MAK_supervisor', '源做總管理者', '::1');
INSERT INTO `record` VALUES ('94', '2023-07-27 17:14:28', 'sponsor 資料修改：1', 'MAK_supervisor', '源做總管理者', '::1');
INSERT INTO `record` VALUES ('95', '2023-07-27 17:19:59', 'image 資料新增', 'MAK_supervisor', '源做總管理者', '::1');
INSERT INTO `record` VALUES ('96', '2023-07-27 17:24:29', 'image 資料修改：23', 'MAK_supervisor', '源做總管理者', '::1');
INSERT INTO `record` VALUES ('97', '2023-07-27 17:31:41', 'd_mclass 資料新增', 'MAK_supervisor', '源做總管理者', '::1');
INSERT INTO `record` VALUES ('98', '2023-07-27 17:41:22', 'd_mclass 資料修改：1', 'MAK_supervisor', '源做總管理者', '::1');
INSERT INTO `record` VALUES ('99', '2023-07-27 17:48:38', 'd_series 資料新增', 'MAK_supervisor', '源做總管理者', '::1');
INSERT INTO `record` VALUES ('100', '2023-07-27 17:53:35', 'd_series 資料修改：1', 'MAK_supervisor', '源做總管理者', '::1');
INSERT INTO `record` VALUES ('101', '2023-07-27 18:11:20', 'download 資料新增', 'MAK_supervisor', '源做總管理者', '::1');
INSERT INTO `record` VALUES ('102', '2023-07-27 18:18:31', 'download 資料修改：1', 'MAK_supervisor', '源做總管理者', '::1');
INSERT INTO `record` VALUES ('103', '2023-07-28 08:42:41', '登入', 'MAK_supervisor', '源做總管理者', '::1');
INSERT INTO `record` VALUES ('104', '2023-07-28 11:43:34', 'essay 資料修改：1', 'MAK_supervisor', '源做總管理者', '::1');
INSERT INTO `record` VALUES ('105', '2023-07-28 11:43:40', 'essay 資料修改：2', 'MAK_supervisor', '源做總管理者', '::1');
INSERT INTO `record` VALUES ('106', '2023-07-28 12:26:08', 'essay 資料修改：6', 'MAK_supervisor', '源做總管理者', '::1');
INSERT INTO `record` VALUES ('107', '2023-07-28 12:31:04', 'essay 資料修改：6', 'MAK_supervisor', '源做總管理者', '::1');
INSERT INTO `record` VALUES ('108', '2023-07-28 12:32:31', 'essay 資料修改：6', 'MAK_supervisor', '源做總管理者', '::1');
INSERT INTO `record` VALUES ('109', '2023-07-28 12:32:49', 'essay 資料修改：6', 'MAK_supervisor', '源做總管理者', '::1');
INSERT INTO `record` VALUES ('110', '2023-07-28 12:33:13', 'essay 資料修改：3', 'MAK_supervisor', '源做總管理者', '::1');
INSERT INTO `record` VALUES ('111', '2023-07-28 12:33:35', 'essay 資料修改：4', 'MAK_supervisor', '源做總管理者', '::1');
INSERT INTO `record` VALUES ('112', '2023-07-28 12:33:57', 'essay 資料修改：5', 'MAK_supervisor', '源做總管理者', '::1');
INSERT INTO `record` VALUES ('113', '2023-07-28 12:34:20', 'essay 資料修改：4', 'MAK_supervisor', '源做總管理者', '::1');
INSERT INTO `record` VALUES ('114', '2023-07-28 12:34:42', 'essay 資料修改：4', 'MAK_supervisor', '源做總管理者', '::1');
INSERT INTO `record` VALUES ('115', '2023-07-28 12:35:37', 'essay 資料修改：3', 'MAK_supervisor', '源做總管理者', '::1');
INSERT INTO `record` VALUES ('116', '2023-07-28 14:01:51', 'news 資料狀態修改', 'MAK_supervisor', '源做總管理者', '::1');
INSERT INTO `record` VALUES ('117', '2023-07-28 14:56:58', 'document 資料修改：6', 'MAK_supervisor', '源做總管理者', '::1');
INSERT INTO `record` VALUES ('118', '2023-07-28 15:09:05', 'document 資料修改：27', 'MAK_supervisor', '源做總管理者', '::1');
INSERT INTO `record` VALUES ('119', '2023-07-28 15:45:37', 'news 資料狀態修改', 'MAK_supervisor', '源做總管理者', '::1');
INSERT INTO `record` VALUES ('120', '2023-07-28 15:45:38', 'news 資料狀態修改', 'MAK_supervisor', '源做總管理者', '::1');
INSERT INTO `record` VALUES ('121', '2023-07-28 15:48:09', 'news 資料修改：5', 'MAK_supervisor', '源做總管理者', '::1');
INSERT INTO `record` VALUES ('122', '2023-07-28 15:57:10', 'news 資料修改：3', 'MAK_supervisor', '源做總管理者', '::1');
INSERT INTO `record` VALUES ('123', '2023-07-28 16:28:34', 'casestudy 資料修改：1', 'MAK_supervisor', '源做總管理者', '::1');
INSERT INTO `record` VALUES ('124', '2023-07-28 16:40:37', 'article 資料修改：5', 'MAK_supervisor', '源做總管理者', '::1');
INSERT INTO `record` VALUES ('125', '2023-07-28 16:46:21', 'essay 資料修改：7', 'MAK_supervisor', '源做總管理者', '::1');
INSERT INTO `record` VALUES ('126', '2023-07-28 16:47:08', 'essay 資料修改：7', 'MAK_supervisor', '源做總管理者', '::1');
INSERT INTO `record` VALUES ('127', '2023-07-28 16:48:07', 'essay 資料修改：7', 'MAK_supervisor', '源做總管理者', '::1');
INSERT INTO `record` VALUES ('128', '2023-07-28 16:49:40', 'essay 資料修改：7', 'MAK_supervisor', '源做總管理者', '::1');
INSERT INTO `record` VALUES ('129', '2023-07-28 16:50:19', 'essay 資料修改：7', 'MAK_supervisor', '源做總管理者', '::1');
INSERT INTO `record` VALUES ('130', '2023-07-28 16:52:08', 'image 資料修改：19', 'MAK_supervisor', '源做總管理者', '::1');
INSERT INTO `record` VALUES ('131', '2023-07-28 16:52:34', 'image 資料新增', 'MAK_supervisor', '源做總管理者', '::1');
INSERT INTO `record` VALUES ('132', '2023-07-28 17:08:13', 'sponsor 資料修改：1', 'MAK_supervisor', '源做總管理者', '::1');
INSERT INTO `record` VALUES ('133', '2023-07-28 17:41:52', 'image 資料新增', 'MAK_supervisor', '源做總管理者', '::1');
INSERT INTO `record` VALUES ('134', '2023-07-28 17:53:10', 'article 資料修改：6', 'MAK_supervisor', '源做總管理者', '::1');
INSERT INTO `record` VALUES ('135', '2023-07-28 17:54:07', 'article 資料修改：6', 'MAK_supervisor', '源做總管理者', '::1');
INSERT INTO `record` VALUES ('136', '2023-07-28 18:09:31', 'document 資料修改：11', 'MAK_supervisor', '源做總管理者', '::1');
INSERT INTO `record` VALUES ('137', '2023-07-28 18:09:36', 'document 資料修改：12', 'MAK_supervisor', '源做總管理者', '::1');
INSERT INTO `record` VALUES ('138', '2023-07-31 12:27:20', '登入', 'MAK_supervisor', '源做總管理者', '::1');
INSERT INTO `record` VALUES ('139', '2023-07-31 12:43:25', 'image 資料修改：11', 'MAK_supervisor', '源做總管理者', '::1');
INSERT INTO `record` VALUES ('140', '2023-07-31 14:31:28', 'p_class 資料修改：2', 'MAK_supervisor', '源做總管理者', '::1');
INSERT INTO `record` VALUES ('141', '2023-07-31 14:37:37', 'p_class 資料修改：2', 'MAK_supervisor', '源做總管理者', '::1');
INSERT INTO `record` VALUES ('142', '2023-07-31 14:37:47', 'p_class 資料修改：2', 'MAK_supervisor', '源做總管理者', '::1');
INSERT INTO `record` VALUES ('143', '2023-07-31 14:39:19', 'p_class 資料修改：2', 'MAK_supervisor', '源做總管理者', '::1');
INSERT INTO `record` VALUES ('144', '2023-07-31 15:11:57', 'product 資料修改：1', 'MAK_supervisor', '源做總管理者', '::1');
INSERT INTO `record` VALUES ('145', '2023-07-31 15:18:00', 'product 資料修改：1', 'MAK_supervisor', '源做總管理者', '::1');
INSERT INTO `record` VALUES ('146', '2023-07-31 15:30:26', 'product 資料修改：1', 'MAK_supervisor', '源做總管理者', '::1');
INSERT INTO `record` VALUES ('147', '2023-07-31 17:14:08', 'd_mclass 資料修改：1', 'MAK_supervisor', '源做總管理者', '::1');
INSERT INTO `record` VALUES ('148', '2023-07-31 17:24:22', 'd_mclass 資料修改：1', 'MAK_supervisor', '源做總管理者', '::1');
INSERT INTO `record` VALUES ('149', '2023-07-31 17:26:25', 'd_mclass 資料修改：1', 'MAK_supervisor', '源做總管理者', '::1');
INSERT INTO `record` VALUES ('150', '2023-07-31 17:28:32', 'd_mclass 資料修改：1', 'MAK_supervisor', '源做總管理者', '::1');
INSERT INTO `record` VALUES ('151', '2023-07-31 17:45:01', 'd_mclass 資料修改：1', 'MAK_supervisor', '源做總管理者', '::1');
INSERT INTO `record` VALUES ('152', '2023-07-31 17:47:24', 'd_mclass 資料修改：1', 'MAK_supervisor', '源做總管理者', '::1');
INSERT INTO `record` VALUES ('153', '2023-07-31 17:48:50', 'd_mclass 資料修改：1', 'MAK_supervisor', '源做總管理者', '::1');
INSERT INTO `record` VALUES ('154', '2023-07-31 17:50:22', 'd_mclass 資料新增', 'MAK_supervisor', '源做總管理者', '::1');
INSERT INTO `record` VALUES ('155', '2023-07-31 17:52:03', 'd_mclass 資料刪除：2', 'MAK_supervisor', '源做總管理者', '::1');
INSERT INTO `record` VALUES ('156', '2023-07-31 17:55:10', 'd_mclass 資料新增', 'MAK_supervisor', '源做總管理者', '::1');
INSERT INTO `record` VALUES ('157', '2023-07-31 17:58:55', 'download 資料修改：1', 'MAK_supervisor', '源做總管理者', '::1');
INSERT INTO `record` VALUES ('158', '2023-07-31 17:59:44', 'download 資料修改：1', 'MAK_supervisor', '源做總管理者', '::1');
INSERT INTO `record` VALUES ('159', '2023-07-31 17:59:56', 'download 資料修改：1', 'MAK_supervisor', '源做總管理者', '::1');
INSERT INTO `record` VALUES ('160', '2023-07-31 18:00:19', 'download 資料新增', 'MAK_supervisor', '源做總管理者', '::1');
INSERT INTO `record` VALUES ('161', '2023-07-31 18:14:40', 'essay 資料修改：9', 'MAK_supervisor', '源做總管理者', '::1');
INSERT INTO `record` VALUES ('162', '2023-07-31 18:15:10', 'essay 資料修改：9', 'MAK_supervisor', '源做總管理者', '::1');
INSERT INTO `record` VALUES ('163', '2023-07-31 18:16:37', 'essay 資料修改：9', 'MAK_supervisor', '源做總管理者', '::1');
INSERT INTO `record` VALUES ('164', '2023-07-31 18:35:20', 'd_series 資料新增', 'MAK_supervisor', '源做總管理者', '::1');
INSERT INTO `record` VALUES ('165', '2023-07-31 19:01:42', 'download 資料新增', 'MAK_supervisor', '源做總管理者', '::1');
INSERT INTO `record` VALUES ('166', '2023-07-31 19:14:37', 'download 資料修改：2', 'MAK_supervisor', '源做總管理者', '::1');

-- ----------------------------
-- Table structure for sponsor
-- ----------------------------
DROP TABLE IF EXISTS `sponsor`;
CREATE TABLE `sponsor` (
  `s_id` int(11) NOT NULL AUTO_INCREMENT,
  `s_title_tw` varchar(255) DEFAULT NULL,
  `s_title_en` varchar(255) DEFAULT NULL,
  `s_stitle` varchar(255) DEFAULT NULL,
  `s_ctext` text DEFAULT NULL,
  `s_mtext` text DEFAULT NULL,
  `s_order` int(11) DEFAULT NULL,
  PRIMARY KEY (`s_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of sponsor
-- ----------------------------
INSERT INTO `sponsor` VALUES ('1', '山岸 秀匡', 'Hidetada Yamagishi', 'ARNOLD CLASSIC 212 CHAMPION', '1973年6月30日出生於日本北海道帶廣市。從早稻田大學時期開始認真健身，2002年成為職業健美選手。2007年成為第一個出賽『Mr.Olympia』的日本人，2015年達成取得第三名的創舉。2016年在由阿諾&middot;史瓦辛格主辦的Arnold Classic健美賽事中成為首位優勝的日本人。', '&lt;table border=&quot;1&quot; cellpadding=&quot;1&quot; cellspacing=&quot;1&quot; style=&quot;width:100%&quot;&gt;\r\n	&lt;tbody&gt;\r\n		&lt;tr&gt;\r\n			&lt;td style=&quot;width:70px&quot;&gt;1989年&lt;/td&gt;\r\n			&lt;td&gt;東京公開賽（中量級）冠軍&lt;/td&gt;\r\n		&lt;/tr&gt;\r\n		&lt;tr&gt;\r\n			&lt;td&gt;2001年&lt;/td&gt;\r\n			&lt;td&gt;IFBB Mr. Asia （80kg以下輕中量級）冠軍&lt;/td&gt;\r\n		&lt;/tr&gt;\r\n		&lt;tr&gt;\r\n			&lt;td&gt;2010年&lt;/td&gt;\r\n			&lt;td&gt;EUROPA SHOW OF CHAMPIONS・ORLAND 冠軍&lt;/td&gt;\r\n		&lt;/tr&gt;\r\n		&lt;tr&gt;\r\n			&lt;td&gt;2014年&lt;/td&gt;\r\n			&lt;td&gt;IFBB Tampa Pro （212磅級） 冠軍&lt;/td&gt;\r\n		&lt;/tr&gt;\r\n		&lt;tr&gt;\r\n			&lt;td&gt;2016年&lt;/td&gt;\r\n			&lt;td&gt;IFBB 阿諾德經典賽 （212磅級）冠軍&lt;/td&gt;\r\n		&lt;/tr&gt;\r\n		&lt;tr&gt;\r\n			&lt;td&gt;2019年&lt;/td&gt;\r\n			&lt;td&gt;IFBB Dallas Pro （212磅級） 冠軍／IFBB Monsterzym Pro （212磅級）冠軍&lt;!--&lt;/td--&gt;&lt;/td&gt;\r\n		&lt;/tr&gt;\r\n	&lt;/tbody&gt;\r\n&lt;/table&gt;\r\n\r\n&lt;p&gt;&amp;nbsp;&lt;/p&gt;\r\n', '0');

-- ----------------------------
-- Table structure for user
-- ----------------------------
DROP TABLE IF EXISTS `user`;
CREATE TABLE `user` (
  `u_id` int(11) NOT NULL AUTO_INCREMENT,
  `u_account` varchar(255) DEFAULT NULL,
  `u_password` varchar(255) DEFAULT NULL,
  `u_name` varchar(255) DEFAULT NULL,
  `u_main_purview` varchar(10) DEFAULT NULL,
  `u_sub_purview` varchar(10) DEFAULT NULL,
  `u_check` varchar(5) DEFAULT NULL,
  `u_error` int(3) DEFAULT NULL,
  PRIMARY KEY (`u_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of user
-- ----------------------------
INSERT INTO `user` VALUES ('1', 'MAK_supervisor', '202cb962ac59075b964b07152d234b70', '源做總管理者', '0', '0', 'Y', '0');
INSERT INTO `user` VALUES ('2', 'evolgear_admin', '202cb962ac59075b964b07152d234b70', '【泰景科技】管理者', '1', '0', 'Y', '0');
