/*
Navicat MySQL Data Transfer

Source Server         : mysql
Source Server Version : 50508
Source Host           : localhost:3306
Source Database       : questionnaire_db

Target Server Type    : MYSQL
Target Server Version : 50508
File Encoding         : 65001

Date: 2013-03-18 01:51:38
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for `choice`
-- ----------------------------
DROP TABLE IF EXISTS `choice`;
CREATE TABLE `choice` (
  `choice_id` int(11) NOT NULL AUTO_INCREMENT,
  `poll_id` int(11) NOT NULL,
  `question_id` int(11) NOT NULL,
  `question_type` int(1) NOT NULL,
  `choice_value` varchar(255) NOT NULL,
  PRIMARY KEY (`choice_id`)
) ENGINE=MyISAM AUTO_INCREMENT=12 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of choice
-- ----------------------------
INSERT INTO `choice` VALUES ('1', '1', '1', '1', 'A1');
INSERT INTO `choice` VALUES ('2', '1', '1', '1', 'B1');
INSERT INTO `choice` VALUES ('3', '1', '1', '1', 'C1');
INSERT INTO `choice` VALUES ('4', '1', '2', '4', '1');
INSERT INTO `choice` VALUES ('5', '1', '2', '4', '3');
INSERT INTO `choice` VALUES ('6', '1', '3', '2', 'A3');
INSERT INTO `choice` VALUES ('7', '1', '3', '2', 'B3');
INSERT INTO `choice` VALUES ('8', '1', '3', '2', 'C3');
INSERT INTO `choice` VALUES ('9', '1', '4', '4', '1');
INSERT INTO `choice` VALUES ('10', '1', '4', '4', '5');
INSERT INTO `choice` VALUES ('11', '1', '5', '3', 'คำตอบของพวกเขา');

-- ----------------------------
-- Table structure for `condition`
-- ----------------------------
DROP TABLE IF EXISTS `condition`;
CREATE TABLE `condition` (
  `condition_id` int(11) NOT NULL AUTO_INCREMENT,
  `poll_id` int(11) NOT NULL,
  `condition_type` int(1) DEFAULT NULL,
  `condition_value` int(3) DEFAULT NULL,
  PRIMARY KEY (`condition_id`)
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of condition
-- ----------------------------
INSERT INTO `condition` VALUES ('1', '1', '1', '3');
INSERT INTO `condition` VALUES ('2', '1', '1', '1');
INSERT INTO `condition` VALUES ('3', '1', '1', '2');
INSERT INTO `condition` VALUES ('4', '1', '2', '6');
INSERT INTO `condition` VALUES ('5', '1', '2', '1');
INSERT INTO `condition` VALUES ('6', '1', '2', '77');
INSERT INTO `condition` VALUES ('7', '1', '3', '1');
INSERT INTO `condition` VALUES ('8', '1', '4', '1');
INSERT INTO `condition` VALUES ('9', '1', '4', '2');

-- ----------------------------
-- Table structure for `m_age_range`
-- ----------------------------
DROP TABLE IF EXISTS `m_age_range`;
CREATE TABLE `m_age_range` (
  `age_range_id` int(1) NOT NULL AUTO_INCREMENT,
  `age_range_from` int(2) NOT NULL,
  `age_range_to` int(3) NOT NULL,
  PRIMARY KEY (`age_range_id`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of m_age_range
-- ----------------------------
INSERT INTO `m_age_range` VALUES ('1', '15', '24');
INSERT INTO `m_age_range` VALUES ('2', '25', '34');
INSERT INTO `m_age_range` VALUES ('3', '35', '44');
INSERT INTO `m_age_range` VALUES ('4', '45', '54');
INSERT INTO `m_age_range` VALUES ('5', '55', '64');
INSERT INTO `m_age_range` VALUES ('6', '65', '99');

-- ----------------------------
-- Table structure for `m_condition_type`
-- ----------------------------
DROP TABLE IF EXISTS `m_condition_type`;
CREATE TABLE `m_condition_type` (
  `condition_type_id` int(1) NOT NULL AUTO_INCREMENT,
  `condition_name` varchar(255) NOT NULL,
  PRIMARY KEY (`condition_type_id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of m_condition_type
-- ----------------------------
INSERT INTO `m_condition_type` VALUES ('1', 'สายงานที่เข้ามาตอบแบบสอบถามได้');
INSERT INTO `m_condition_type` VALUES ('2', 'จังหวัดของผู้ตอบแบบสอบถามที่เข้ามาตอบแบบสอบถามได้');
INSERT INTO `m_condition_type` VALUES ('3', 'เพศของผู้ตอบแบบสอบถามที่เข้ามาตอบบแบบสอบถามได้');
INSERT INTO `m_condition_type` VALUES ('4', 'ช่วงอายุของผู้ตอบแบบสอบถามที่เข้ามาตอบบแบสอบถามได้');

-- ----------------------------
-- Table structure for `m_occupation`
-- ----------------------------
DROP TABLE IF EXISTS `m_occupation`;
CREATE TABLE `m_occupation` (
  `OCCUPATION_ID` int(5) NOT NULL AUTO_INCREMENT,
  `OCCUPATION_NAME` varchar(150) NOT NULL,
  `OCCUPATION_NAME_ENG` varchar(150) NOT NULL,
  PRIMARY KEY (`OCCUPATION_ID`)
) ENGINE=MyISAM AUTO_INCREMENT=81 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of m_occupation
-- ----------------------------
INSERT INTO `m_occupation` VALUES ('1', 'นักแสดงชาย', 'Actor');
INSERT INTO `m_occupation` VALUES ('2', 'นักแสดงหญิง', 'Actress');
INSERT INTO `m_occupation` VALUES ('3', 'สมุห์บัญชี', 'Accountant');
INSERT INTO `m_occupation` VALUES ('4', 'นักโบราณคดี', 'Archeologist');
INSERT INTO `m_occupation` VALUES ('5', 'จิตรกร', 'Artist');
INSERT INTO `m_occupation` VALUES ('6', 'สถาปนิก', 'Architecture');
INSERT INTO `m_occupation` VALUES ('7', 'ผู้ตรวจสอบบัญชี', 'Auditor');
INSERT INTO `m_occupation` VALUES ('8', 'นักประพันธ์', 'Author');
INSERT INTO `m_occupation` VALUES ('9', 'พนักงานต้อนรับหญิงบนเครื่องบิน', 'Air-hostess');
INSERT INTO `m_occupation` VALUES ('10', 'โฆษก', 'Announcer');
INSERT INTO `m_occupation` VALUES ('11', 'กสิกร', 'Agriculturist');
INSERT INTO `m_occupation` VALUES ('12', 'นายธนาคาร', 'Banker');
INSERT INTO `m_occupation` VALUES ('13', 'เนติบัญญัติ', 'Barrister');
INSERT INTO `m_occupation` VALUES ('14', 'พนักงานทำบัญชี', 'Book-keeper');
INSERT INTO `m_occupation` VALUES ('15', 'พนักงานประจำบาร์', 'Bartender');
INSERT INTO `m_occupation` VALUES ('16', 'คนเก็บเงิน', 'Bill collector');
INSERT INTO `m_occupation` VALUES ('17', 'นักธุรกิจ', 'Business');
INSERT INTO `m_occupation` VALUES ('18', 'นักชีววิทยา', 'Biologist');
INSERT INTO `m_occupation` VALUES ('19', 'นักพฤกษศาสตร์', 'Botanist');
INSERT INTO `m_occupation` VALUES ('20', 'นายหน้า', 'Broker');
INSERT INTO `m_occupation` VALUES ('21', 'แคชเชียร์', 'Cashier');
INSERT INTO `m_occupation` VALUES ('22', 'ช่างซ่อมรองเท้า', 'Cobbler');
INSERT INTO `m_occupation` VALUES ('23', 'คนทำครัว', 'Cook');
INSERT INTO `m_occupation` VALUES ('24', 'นักเคมี', 'Chemist');
INSERT INTO `m_occupation` VALUES ('25', 'ผู้รับเหมา', 'Contractor');
INSERT INTO `m_occupation` VALUES ('26', 'นักแต่งเพลง', 'Composer');
INSERT INTO `m_occupation` VALUES ('27', 'ผู้สื่อข่าว', 'Correspondent');
INSERT INTO `m_occupation` VALUES ('28', 'เสมียน', 'Clerk');
INSERT INTO `m_occupation` VALUES ('29', 'ช่างแต่งบ้าน', 'Decorator');
INSERT INTO `m_occupation` VALUES ('30', 'ทันตแพทย์', 'Dentist');
INSERT INTO `m_occupation` VALUES ('31', 'นักสืบ', 'Detective');
INSERT INTO `m_occupation` VALUES ('32', 'แพทย์', 'Doctor');
INSERT INTO `m_occupation` VALUES ('33', 'นักการฑูต', 'Dilpomat');
INSERT INTO `m_occupation` VALUES ('34', 'ช่างตัดเสื้อสตรี', 'Dressmaker');
INSERT INTO `m_occupation` VALUES ('35', 'คนขับรถ', 'Driver');
INSERT INTO `m_occupation` VALUES ('36', 'บรรณาธิการ', 'Editor');
INSERT INTO `m_occupation` VALUES ('37', 'ช่างไฟฟ้า', 'Electrician');
INSERT INTO `m_occupation` VALUES ('38', 'เจ้าหน้าที่ส่งออก', 'Export officer');
INSERT INTO `m_occupation` VALUES ('39', 'หัวหน้าคนงาน', 'Foreman');
INSERT INTO `m_occupation` VALUES ('40', 'คนทำสวน', 'Gardener');
INSERT INTO `m_occupation` VALUES ('41', 'นักภูมิศาสตร์', 'Geograhpher');
INSERT INTO `m_occupation` VALUES ('42', 'ข้าราชการ', 'Government officer');
INSERT INTO `m_occupation` VALUES ('43', 'นักออกแบบ', 'Graphic designer');
INSERT INTO `m_occupation` VALUES ('44', 'มัคคุเทศก์', 'Guide');
INSERT INTO `m_occupation` VALUES ('45', 'ช่างแต่งผมสตรี', 'Hair-dresser');
INSERT INTO `m_occupation` VALUES ('46', 'ผู้ตรวจการ', 'Inspector');
INSERT INTO `m_occupation` VALUES ('47', 'ล่าม', 'Interpreter');
INSERT INTO `m_occupation` VALUES ('48', 'คนขายเพชรพลอย', 'Jeweller');
INSERT INTO `m_occupation` VALUES ('49', 'ทนายความ', 'Lawyer');
INSERT INTO `m_occupation` VALUES ('50', 'คนส่งเอกสาร', 'Messenger');
INSERT INTO `m_occupation` VALUES ('51', 'พ่อค้า', 'Merchant');
INSERT INTO `m_occupation` VALUES ('52', 'นางแบบ', 'Model');
INSERT INTO `m_occupation` VALUES ('53', 'พยาบาล', 'Nurse');
INSERT INTO `m_occupation` VALUES ('54', 'นักแต่งนิยาย', 'Novelist');
INSERT INTO `m_occupation` VALUES ('55', 'จักษุแพทย์', 'Oculist');
INSERT INTO `m_occupation` VALUES ('56', 'นักเขียนโปรแกรม', 'Programmer');
INSERT INTO `m_occupation` VALUES ('57', 'ช่างภาพ', 'Photographer');
INSERT INTO `m_occupation` VALUES ('58', 'ตำรวจ', 'Policeman');
INSERT INTO `m_occupation` VALUES ('59', 'ผู้สื่อข่าว', 'Reporter');
INSERT INTO `m_occupation` VALUES ('60', 'พนักงานต้อนรับ', 'Receptionist');
INSERT INTO `m_occupation` VALUES ('61', 'นักวิจัย', 'Researcher');
INSERT INTO `m_occupation` VALUES ('62', 'พนักงานขายของ', 'Salesman');
INSERT INTO `m_occupation` VALUES ('63', 'นักวิทยาศาสตร์', 'Scientist');
INSERT INTO `m_occupation` VALUES ('64', 'เลขา', 'Secretary');
INSERT INTO `m_occupation` VALUES ('65', 'เจ้าหน้าที่รักษาความปลอดภัย', 'Security officer');
INSERT INTO `m_occupation` VALUES ('66', 'นักร้อง', 'Singer');
INSERT INTO `m_occupation` VALUES ('67', 'คุณครู', 'Teacher');
INSERT INTO `m_occupation` VALUES ('68', 'ช่างทำรองเท้า', 'Shoe maker');
INSERT INTO `m_occupation` VALUES ('69', 'เจ้าของร้าน', 'Shop keeper');
INSERT INTO `m_occupation` VALUES ('70', 'ผู้ตรวจการ', 'Supervisor');
INSERT INTO `m_occupation` VALUES ('71', 'ช่างสำรวจ', 'Surveyor');
INSERT INTO `m_occupation` VALUES ('72', 'นักกีฬา', 'Sport man');
INSERT INTO `m_occupation` VALUES ('73', 'นักเขียนชวเลข', 'Stenograhper');
INSERT INTO `m_occupation` VALUES ('74', 'ศัลยแพทย์', 'Surgeon');
INSERT INTO `m_occupation` VALUES ('75', 'ช่างตัดเสื้อชาย', 'Tailor');
INSERT INTO `m_occupation` VALUES ('76', 'พนักงานตอบรับโทรศัพท์', 'Telephone operator');
INSERT INTO `m_occupation` VALUES ('77', 'ช่างเทคนิค', 'Technician');
INSERT INTO `m_occupation` VALUES ('78', 'พนักงานแปล', 'Translator');
INSERT INTO `m_occupation` VALUES ('79', 'พนักงานเสิร์ฟ', 'Waiter');
INSERT INTO `m_occupation` VALUES ('80', 'นักเขียน', 'Writer');

-- ----------------------------
-- Table structure for `m_province`
-- ----------------------------
DROP TABLE IF EXISTS `m_province`;
CREATE TABLE `m_province` (
  `PROVINCE_ID` int(5) NOT NULL AUTO_INCREMENT,
  `PROVINCE_NAME` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  `PROVINCE_NAME_ENG` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`PROVINCE_ID`)
) ENGINE=MyISAM AUTO_INCREMENT=78 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of m_province
-- ----------------------------
INSERT INTO `m_province` VALUES ('1', 'กรุงเทพมหานคร   ', 'Bangkok');
INSERT INTO `m_province` VALUES ('2', 'สมุทรปราการ   ', 'Samut Prakan');
INSERT INTO `m_province` VALUES ('3', 'นนทบุรี   ', 'Nonthaburi');
INSERT INTO `m_province` VALUES ('4', 'ปทุมธานี   ', 'Pathum Thani');
INSERT INTO `m_province` VALUES ('5', 'พระนครศรีอยุธยา   ', 'Phra Nakhon Si Ayutthaya');
INSERT INTO `m_province` VALUES ('6', 'อ่างทอง   ', 'Ang Thong');
INSERT INTO `m_province` VALUES ('7', 'ลพบุรี   ', 'Loburi');
INSERT INTO `m_province` VALUES ('8', 'สิงห์บุรี   ', 'Sing Buri');
INSERT INTO `m_province` VALUES ('9', 'ชัยนาท   ', 'Chai Nat');
INSERT INTO `m_province` VALUES ('10', 'สระบุรี', 'Saraburi');
INSERT INTO `m_province` VALUES ('11', 'ชลบุรี   ', 'Chon Buri');
INSERT INTO `m_province` VALUES ('12', 'ระยอง   ', 'Rayong');
INSERT INTO `m_province` VALUES ('13', 'จันทบุรี   ', 'Chanthaburi');
INSERT INTO `m_province` VALUES ('14', 'ตราด   ', 'Trat');
INSERT INTO `m_province` VALUES ('15', 'ฉะเชิงเทรา   ', 'Chachoengsao');
INSERT INTO `m_province` VALUES ('16', 'ปราจีนบุรี   ', 'Prachin Buri');
INSERT INTO `m_province` VALUES ('17', 'นครนายก   ', 'Nakhon Nayok');
INSERT INTO `m_province` VALUES ('18', 'สระแก้ว   ', 'Sa Kaeo');
INSERT INTO `m_province` VALUES ('19', 'นครราชสีมา   ', 'Nakhon Ratchasima');
INSERT INTO `m_province` VALUES ('20', 'บุรีรัมย์   ', 'Buri Ram');
INSERT INTO `m_province` VALUES ('21', 'สุรินทร์   ', 'Surin');
INSERT INTO `m_province` VALUES ('22', 'ศรีสะเกษ   ', 'Si Sa Ket');
INSERT INTO `m_province` VALUES ('23', 'อุบลราชธานี   ', 'Ubon Ratchathani');
INSERT INTO `m_province` VALUES ('24', 'ยโสธร   ', 'Yasothon');
INSERT INTO `m_province` VALUES ('25', 'ชัยภูมิ   ', 'Chaiyaphum');
INSERT INTO `m_province` VALUES ('26', 'อำนาจเจริญ   ', 'Amnat Charoen');
INSERT INTO `m_province` VALUES ('27', 'หนองบัวลำภู   ', 'Nong Bua Lam Phu');
INSERT INTO `m_province` VALUES ('28', 'ขอนแก่น   ', 'Khon Kaen');
INSERT INTO `m_province` VALUES ('29', 'อุดรธานี   ', 'Udon Thani');
INSERT INTO `m_province` VALUES ('30', 'เลย   ', 'Loei');
INSERT INTO `m_province` VALUES ('31', 'หนองคาย   ', 'Nong Khai');
INSERT INTO `m_province` VALUES ('32', 'มหาสารคาม   ', 'Maha Sarakham');
INSERT INTO `m_province` VALUES ('33', 'ร้อยเอ็ด   ', 'Roi Et');
INSERT INTO `m_province` VALUES ('34', 'กาฬสินธุ์   ', 'Kalasin');
INSERT INTO `m_province` VALUES ('35', 'สกลนคร   ', 'Sakon Nakhon');
INSERT INTO `m_province` VALUES ('36', 'นครพนม   ', 'Nakhon Phanom');
INSERT INTO `m_province` VALUES ('37', 'มุกดาหาร   ', 'Mukdahan');
INSERT INTO `m_province` VALUES ('38', 'เชียงใหม่   ', 'Chiang Mai');
INSERT INTO `m_province` VALUES ('39', 'ลำพูน   ', 'Lamphun');
INSERT INTO `m_province` VALUES ('40', 'ลำปาง   ', 'Lampang');
INSERT INTO `m_province` VALUES ('41', 'อุตรดิตถ์   ', 'Uttaradit');
INSERT INTO `m_province` VALUES ('42', 'แพร่   ', 'Phrae');
INSERT INTO `m_province` VALUES ('43', 'น่าน   ', 'Nan');
INSERT INTO `m_province` VALUES ('44', 'พะเยา   ', 'Phayao');
INSERT INTO `m_province` VALUES ('45', 'เชียงราย   ', 'Chiang Rai');
INSERT INTO `m_province` VALUES ('46', 'แม่ฮ่องสอน   ', 'Mae Hong Son');
INSERT INTO `m_province` VALUES ('47', 'นครสวรรค์   ', 'Nakhon Sawan');
INSERT INTO `m_province` VALUES ('48', 'อุทัยธานี   ', 'Uthai Thani');
INSERT INTO `m_province` VALUES ('49', 'กำแพงเพชร   ', 'Kamphaeng Phet');
INSERT INTO `m_province` VALUES ('50', 'ตาก   ', 'Tak');
INSERT INTO `m_province` VALUES ('51', 'สุโขทัย   ', 'Sukhothai');
INSERT INTO `m_province` VALUES ('52', 'พิษณุโลก   ', 'Phitsanulok');
INSERT INTO `m_province` VALUES ('53', 'พิจิตร   ', 'Phichit');
INSERT INTO `m_province` VALUES ('54', 'เพชรบูรณ์   ', 'Phetchabun');
INSERT INTO `m_province` VALUES ('55', 'ราชบุรี   ', 'Ratchaburi');
INSERT INTO `m_province` VALUES ('56', 'กาญจนบุรี   ', 'Kanchanaburi');
INSERT INTO `m_province` VALUES ('57', 'สุพรรณบุรี   ', 'Suphan Buri');
INSERT INTO `m_province` VALUES ('58', 'นครปฐม   ', 'Nakhon Pathom');
INSERT INTO `m_province` VALUES ('59', 'สมุทรสาคร   ', 'Samut Sakhon');
INSERT INTO `m_province` VALUES ('60', 'สมุทรสงคราม   ', 'Samut Songkhram');
INSERT INTO `m_province` VALUES ('61', 'เพชรบุรี   ', 'Phetchaburi');
INSERT INTO `m_province` VALUES ('62', 'ประจวบคีรีขันธ์   ', 'Prachuab Khiri Khan');
INSERT INTO `m_province` VALUES ('63', 'นครศรีธรรมราช   ', 'Nakhon Si Thammarat');
INSERT INTO `m_province` VALUES ('64', 'กระบี่   ', 'Krabi');
INSERT INTO `m_province` VALUES ('65', 'พังงา   ', 'Phangnga');
INSERT INTO `m_province` VALUES ('66', 'ภูเก็ต   ', 'Phuket');
INSERT INTO `m_province` VALUES ('67', 'สุราษฎร์ธานี   ', 'Surat Thani');
INSERT INTO `m_province` VALUES ('68', 'ระนอง   ', 'Ranong');
INSERT INTO `m_province` VALUES ('69', 'ชุมพร   ', 'Chumphon');
INSERT INTO `m_province` VALUES ('70', 'สงขลา   ', 'Songkhla');
INSERT INTO `m_province` VALUES ('71', 'สตูล   ', 'Satun');
INSERT INTO `m_province` VALUES ('72', 'ตรัง   ', 'Trang');
INSERT INTO `m_province` VALUES ('73', 'พัทลุง   ', 'Phatthalung');
INSERT INTO `m_province` VALUES ('74', 'ปัตตานี   ', 'Pattani');
INSERT INTO `m_province` VALUES ('75', 'ยะลา   ', 'Yala');
INSERT INTO `m_province` VALUES ('76', 'นราธิวาส   ', 'Narathiwat');
INSERT INTO `m_province` VALUES ('77', 'บึงกาฬ', 'buogkan');

-- ----------------------------
-- Table structure for `m_question_type`
-- ----------------------------
DROP TABLE IF EXISTS `m_question_type`;
CREATE TABLE `m_question_type` (
  `question_type_id` int(1) NOT NULL AUTO_INCREMENT,
  `question_type_name` varchar(255) NOT NULL,
  PRIMARY KEY (`question_type_id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of m_question_type
-- ----------------------------
INSERT INTO `m_question_type` VALUES ('1', 'หลายตัวเลือก');
INSERT INTO `m_question_type` VALUES ('2', 'ช่องทำเครื่องหมาย');
INSERT INTO `m_question_type` VALUES ('3', 'ข้อความ');
INSERT INTO `m_question_type` VALUES ('4', 'สเกลประมาณค่า');

-- ----------------------------
-- Table structure for `option_scale`
-- ----------------------------
DROP TABLE IF EXISTS `option_scale`;
CREATE TABLE `option_scale` (
  `option_id` int(11) NOT NULL AUTO_INCREMENT,
  `choice_id` int(11) NOT NULL,
  `option_value` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`option_id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of option_scale
-- ----------------------------
INSERT INTO `option_scale` VALUES ('1', '4', 'Poor');
INSERT INTO `option_scale` VALUES ('2', '5', 'Excellent');
INSERT INTO `option_scale` VALUES ('3', '9', 'Slow');
INSERT INTO `option_scale` VALUES ('4', '10', 'Quick');

-- ----------------------------
-- Table structure for `poll`
-- ----------------------------
DROP TABLE IF EXISTS `poll`;
CREATE TABLE `poll` (
  `poll_id` int(11) NOT NULL AUTO_INCREMENT,
  `poll_title` varchar(255) DEFAULT NULL,
  `poll_desc` varchar(255) DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `created_date` datetime DEFAULT NULL,
  PRIMARY KEY (`poll_id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of poll
-- ----------------------------
INSERT INTO `poll` VALUES ('1', 'Test Poll', 'Poll Description', null, '2013-03-18 01:43:40');

-- ----------------------------
-- Table structure for `question`
-- ----------------------------
DROP TABLE IF EXISTS `question`;
CREATE TABLE `question` (
  `question_id` int(11) NOT NULL AUTO_INCREMENT,
  `poll_id` int(11) NOT NULL,
  `question_type` int(1) NOT NULL,
  `question_value` varchar(255) NOT NULL,
  PRIMARY KEY (`question_id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of question
-- ----------------------------
INSERT INTO `question` VALUES ('1', '1', '1', 'Q1');
INSERT INTO `question` VALUES ('2', '1', '4', 'Q2');
INSERT INTO `question` VALUES ('3', '1', '2', 'Q3');
INSERT INTO `question` VALUES ('4', '1', '4', 'Q4');
INSERT INTO `question` VALUES ('5', '1', '3', 'Q5');
