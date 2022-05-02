-- phpMyAdmin SQL Dump
-- version 2.10.3
-- http://www.phpmyadmin.net
-- 
-- โฮสต์: localhost
-- เวลาในการสร้าง: 27 ก.พ. 2010  น.
-- รุ่นของเซิร์ฟเวอร์: 5.0.51
-- รุ่นของ PHP: 5.2.6

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";

-- 
-- ฐานข้อมูล: `pheoffice`
-- 

-- --------------------------------------------------------

-- 
-- โครงสร้างตาราง `meetingroom_admin`
-- 

CREATE TABLE `meetingroom_admin` (
  `NO` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- 
-- dump ตาราง `meetingroom_admin`
-- 

INSERT INTO `meetingroom_admin` VALUES (1);

-- --------------------------------------------------------

-- 
-- โครงสร้างตาราง `meetingroom_croom`
-- 

CREATE TABLE `meetingroom_croom` (
  `cr_id` int(11) NOT NULL auto_increment,
  `name` varchar(40) NOT NULL COMMENT 'ชื่อห้อง',
  `net` int(11) NOT NULL default '0' COMMENT 'ความจุ',
  `parent` int(2) NOT NULL,
  `pro` varchar(9) NOT NULL default '0',
  `board` varchar(41) NOT NULL default '',
  `comp` varchar(9) NOT NULL default '',
  `type` varchar(5) NOT NULL default '',
  `tt` int(34) NOT NULL default '0',
  `dater` varchar(29) NOT NULL default '',
  `picType` varchar(100) NOT NULL,
  `picData` blob NOT NULL,
  PRIMARY KEY  (`cr_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=tis620 PACK_KEYS=0 AUTO_INCREMENT=9 ;

-- 
-- dump ตาราง `meetingroom_croom`
-- 

INSERT INTO `meetingroom_croom` VALUES (1, 'ห้องทดสอบ', 15, 7, 'มี', 'มี', 'มี', '', 0, '', '', '');
INSERT INTO `meetingroom_croom` VALUES (2, 'ห้องสโมสรนักศึกษา', 34, 7, '-', '-', '-', '', 0, '', '', '');
INSERT INTO `meetingroom_croom` VALUES (3, 'ห้องปฏิบัติการคอมพิวเตอร์', 80, 0, 'มี', 'มี', 'มี', '', 0, '', '', '');
INSERT INTO `meetingroom_croom` VALUES (4, 'ห้องโสตฯ', 45, 7, 'มี', '-', '-', '', 0, '', '', '');
INSERT INTO `meetingroom_croom` VALUES (7, 'ห้องประชุม', 0, 0, '0', '', '', '', 0, '', '', '');

-- --------------------------------------------------------

-- 
-- โครงสร้างตาราง `meetingroom_food`
-- 

CREATE TABLE `meetingroom_food` (
  `food_id` int(11) NOT NULL auto_increment,
  `food` varchar(100) NOT NULL,
  PRIMARY KEY  (`food_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- 
-- dump ตาราง `meetingroom_food`
-- 


-- --------------------------------------------------------

-- 
-- โครงสร้างตาราง `meetingroom_foodrelation`
-- 

CREATE TABLE `meetingroom_foodrelation` (
  `or_id` int(11) NOT NULL auto_increment,
  `uq_id` int(11) NOT NULL default '0',
  `food_id` varchar(30) NOT NULL default '-',
  `computer` varchar(30) NOT NULL default '-',
  `projecter` varchar(30) NOT NULL default '-',
  `other` text NOT NULL,
  `status` varchar(12) default NULL,
  `drink` text,
  `status2` text,
  PRIMARY KEY  (`or_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=tis620 PACK_KEYS=0 AUTO_INCREMENT=15 ;

-- 
-- dump ตาราง `meetingroom_foodrelation`
-- 


-- --------------------------------------------------------

-- 
-- โครงสร้างตาราง `meetingroom_media`
-- 

CREATE TABLE `meetingroom_media` (
  `media_id` int(11) NOT NULL auto_increment,
  `media` varchar(255) NOT NULL,
  PRIMARY KEY  (`media_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- 
-- dump ตาราง `meetingroom_media`
-- 


-- --------------------------------------------------------

-- 
-- โครงสร้างตาราง `meetingroom_mediarelation`
-- 

CREATE TABLE `meetingroom_mediarelation` (
  `uq_id` int(5) NOT NULL,
  `media_id` int(5) NOT NULL,
  `net` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- 
-- dump ตาราง `meetingroom_mediarelation`
-- 


-- --------------------------------------------------------

-- 
-- โครงสร้างตาราง `meetingroom_userq`
-- 

CREATE TABLE `meetingroom_userq` (
  `uq_id` int(11) NOT NULL auto_increment,
  `u_id` int(11) NOT NULL default '0',
  `cr_id` int(11) NOT NULL default '0',
  `uname` varchar(29) NOT NULL default '',
  `crname` varchar(29) NOT NULL default '',
  `Dater` varchar(20) NOT NULL default '0000-00-00' COMMENT 'วันที่จอง',
  `time_in` varchar(5) NOT NULL,
  `time_out` varchar(5) NOT NULL,
  `object` varchar(50) NOT NULL COMMENT 'หัวข้อการประชุม',
  `detail` varchar(30) NOT NULL COMMENT 'จำนวนผู้เข้าร่วม',
  `phone` varchar(10) NOT NULL default '',
  `type` char(3) NOT NULL default '',
  `pratan` varchar(20) NOT NULL default '',
  `optionss` longtext NOT NULL,
  `T_in` varchar(5) NOT NULL default '',
  `T_out` varchar(5) NOT NULL default '',
  `created` datetime NOT NULL COMMENT 'วันที่ทำรายการ',
  `status` varchar(10) NOT NULL default 'wait',
  `confirm` datetime NOT NULL,
  `confirm_by` int(5) NOT NULL,
  PRIMARY KEY  (`uq_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=tis620 PACK_KEYS=0 AUTO_INCREMENT=16 ;

-- 
-- dump ตาราง `meetingroom_userq`
-- 

INSERT INTO `meetingroom_userq` VALUES (1, 1, 1, 'จิรัถ บุรพรัตน์', 'ห้องประชานารถ', '11 พฤศจิกายน 2550', '', '', 'sdfsdf', '27', '123456', '', 'sdf', '', '11', '12', '0000-00-00 00:00:00', 'sta', '0000-00-00 00:00:00', 0);
INSERT INTO `meetingroom_userq` VALUES (2, 1, 1, 'จิรัถ บุรพรัตน์', 'ห้องประชานารถ', '11 พฤศจิกายน 2550', '', '', 'sdfsdf', '28', '12334', '', 'sdfsdf', '', '13', '14', '0000-00-00 00:00:00', 'sta', '0000-00-00 00:00:00', 0);
INSERT INTO `meetingroom_userq` VALUES (4, 4, 1, 'นาย kk  jj', 'ห้องประชานารถ', '11 พฤศจิกายน 2550', '', '', 'dwadsda', '1', '2213213', '', 'ปช.ทหาร', '', '14', '15', '0000-00-00 00:00:00', 'sta', '0000-00-00 00:00:00', 0);
INSERT INTO `meetingroom_userq` VALUES (5, 4, 1, 'นาย kk  jj', 'ห้องประชานารถ', '11 พฤศจิกายน 2550', '', '', 'asdawd', '28', '23214', '', 'ปช.ทหาร', '', '14', '15', '0000-00-00 00:00:00', 'sta', '0000-00-00 00:00:00', 0);
INSERT INTO `meetingroom_userq` VALUES (7, 2, 1, 'ฝ่ายจัดการอุปกรณ์', 'ห้องประชานารถ', '11 พฤศจิกายน 2550', '', '', 'qdsdf', '123', '123', '', '', '', '15', '16', '0000-00-00 00:00:00', 'sta', '0000-00-00 00:00:00', 0);
INSERT INTO `meetingroom_userq` VALUES (9, 4, 2, 'นาย kk  jj', 'ห้องสโมสรนักศึกษา', '10 สิงหาคม 2550', '', '', 'test', '123', '1234', '', '', '', '15', '16', '0000-00-00 00:00:00', 'sta', '0000-00-00 00:00:00', 0);
INSERT INTO `meetingroom_userq` VALUES (10, 1, 2, 'ผู้บริหารบริหารระบบ', 'ห้องสโมสรนักศึกษา', '16 กันยายน 2550', '', '', 'dsfsdf', '1123', '1234', '', '', '', '15', '16', '0000-00-00 00:00:00', 'sta', '0000-00-00 00:00:00', 0);
INSERT INTO `meetingroom_userq` VALUES (11, 1, 2, 'ผู้บริหารบริหารระบบ', 'ห้องสโมสรนักศึกษา', '16 กันยายน 2550', '', '', 'sfsfsf', '123', '123', '', '', '', '15', '16', '0000-00-00 00:00:00', 'sta', '0000-00-00 00:00:00', 0);

-- --------------------------------------------------------

-- 
-- โครงสร้างตาราง `organization`
-- 

CREATE TABLE `organization` (
  `DeID` int(2) unsigned NOT NULL auto_increment,
  `Code` varchar(8) NOT NULL default '',
  `Fname` varchar(50) NOT NULL,
  `Sname` varchar(16) NOT NULL default '',
  `Chair` varchar(32) NOT NULL default '',
  `Type` char(1) NOT NULL default '',
  `Posit` char(1) NOT NULL default '',
  PRIMARY KEY  (`DeID`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 PACK_KEYS=0 COMMENT='???ง?/?????' AUTO_INCREMENT=45 ;

-- 
-- dump ตาราง `organization`
-- 

INSERT INTO `organization` VALUES (1, 'PH', 'คณะสาธารณสุขศาสตร์', 'คณะสาสุข', '', '0', '1');
INSERT INTO `organization` VALUES (2, 'PHPN', 'ภาควิชาการพยาบาลสาธารณสุข', 'ภาคพยาบาล', 'หัวหน้าภาควิชา', '1', '1');
INSERT INTO `organization` VALUES (3, 'PHMI', 'ภาควิชาจุลชีววิทยา', 'ภาคจุลชีว', 'หัวหน้าภาควิชา', '1', '1');
INSERT INTO `organization` VALUES (4, 'PHBS', 'ภาควิชาชีวสถิติ', 'ชีวสถิติ', 'หัวหน้าภาควิชา', '1', '1');
INSERT INTO `organization` VALUES (5, 'PHAD', 'ภาควิชาบริหารงานสาธารณสุข', 'ภาคบริหาร', 'หัวหน้าภาควิชา', '1', '1');
INSERT INTO `organization` VALUES (6, 'PHPR', 'ภาควิชาปรสิตวิทยา', 'ภาคปรสิต', 'หัวหน้าภาควิชา', '1', '1');
INSERT INTO `organization` VALUES (7, 'PHNU', 'ภาควิชาโภชนวิทยา', 'ภาคโภชน', 'หัวหน้าภาควิชา', '1', '1');
INSERT INTO `organization` VALUES (8, 'PHEP', 'ภาควิชาระบาดวิทยา', 'ภาคระบาด', 'หัวหน้าภาควิชา', '1', '1');
INSERT INTO `organization` VALUES (9, 'PHSS', 'ภาควิชาวิทยาศาสตร์อนามัยสิ่งแวดล้อม', 'ภาควิทยาศาสตร์', 'หัวหน้าภาควิชา', '1', '1');
INSERT INTO `organization` VALUES (10, 'PHSE', 'ภาควิชาวิศวกรรมสุขาภิบาล', 'ภาควิศวกรรม', 'หัวหน้าภาควิชา', '1', '1');
INSERT INTO `organization` VALUES (11, 'PHHE', 'ภาควิชาสุขศึกษาและพฤติกรรมศาสตร์', 'ภาคสุขศึกษา', 'หัวหน้าภาควิชา', '1', '1');
INSERT INTO `organization` VALUES (12, 'PHFH', 'ภาควิชาอนามัยครอบครัว', 'ภาคอนามัย', 'หัวหน้าภาควิชา', '1', '1');
INSERT INTO `organization` VALUES (13, 'PHOH', 'ภาควิชาอาชีวอนามัยและความปลอดภัย', 'ภาคอาชีวอนามัย', 'หัวหน้าภาควิชา', '1', '1');
INSERT INTO `organization` VALUES (14, 'PHST', 'สถานฝึกอบรมและวิจัยอนามัยชนบท (กรุงเทพ)', 'สถานฝึก-กรุงเทพ', 'หัวหน้าสถานฝึกอบรม', '1', '1');
INSERT INTO `organization` VALUES (15, 'PHSO', 'สำนักงานคณบดี', 'สนง.คณบดี', 'หัวหน้าสำนักงาน', '0', '1');
INSERT INTO `organization` VALUES (16, 'PHSOFA', 'หน่วยการเงินและบัญชี', 'การเงิน', 'หัวหน้าหน่วย', '2', '1');
INSERT INTO `organization` VALUES (17, 'PHSOPS', 'หน่วยพัสดุ', 'พัสดุ', 'หัวหน้าหน่วย', '2', '1');
INSERT INTO `organization` VALUES (18, 'PHSOCU', 'หน่วยสารบรรณ', 'สารบรรณ', 'หัวหน้าหน่วย', '2', '1');
INSERT INTO `organization` VALUES (19, 'PHSOMU', 'หน่วยซ่อมบำรุง', 'ซ่อมบำรุง', 'หัวหน้าหน่วย', '2', '1');
INSERT INTO `organization` VALUES (20, 'PHSOPP', 'งานนโยบายและแผน', 'งานแผน', 'หัวหน้างาน', '2', '1');
INSERT INTO `organization` VALUES (21, 'PHSOAA', 'งานบริการการศึกษา', 'การศึกษา', 'หัวหน้างาน', '2', '1');
INSERT INTO `organization` VALUES (22, 'PHSOPU', 'หน่วยการเจ้าหน้าที่', 'การเจ้าหน้าที่', 'หัวหน้าหน่วย', '2', '1');
INSERT INTO `organization` VALUES (23, 'PHSOTU', 'หน่วยยานยนต์', 'ยานยนต์', 'หัวหน้าหน่วย', '2', '1');
INSERT INTO `organization` VALUES (24, 'PHSOLU', 'หน่วยประชาสัมพันธ์', 'ประชาสัมพันธ์', 'หัวหน้าหน่วย', '2', '1');
INSERT INTO `organization` VALUES (25, 'PHSORU', 'หน่วยบริหารและพัฒนางานวิจัย', 'หน่วยวิจัย', 'หัวหน้าหน่วย', '2', '1');
INSERT INTO `organization` VALUES (26, 'PHSOIU', 'หน่วยวิเทศสัมพันธ์', 'หน่วยวิเทศ', 'หัวหน้าหน่วย', '2', '1');
INSERT INTO `organization` VALUES (27, 'PHSOAV', 'ศูนย์ผลิตและพัฒนาสื่อสาธารณสุข', 'ศูนย์ผลิต', 'หัวหน้าศูนย์', '2', '1');
INSERT INTO `organization` VALUES (28, 'PHSOMP', 'หน่วยประสานงานหลักสูตร ส.ม.', 'ส.ม.', 'ประธานหลักสูตร', '2', '1');
INSERT INTO `organization` VALUES (29, 'PHSOOV', 'สำนักงานเทคโนโลยีสาธารณสุข', 'สนง.เทคโน', 'หัวหน้าสำนักงาน', '2', '1');
INSERT INTO `organization` VALUES (30, 'PHSOCL', 'สำนักงานปฏิบัติการกลาง', 'LAB กลาง', 'หัวหน้าสำนักงาน', '2', '1');
INSERT INTO `organization` VALUES (31, 'PHSOSG', 'ฝ่ายเลขานุการ', 'ฝ่ายเลขา', '', '2', '1');
INSERT INTO `organization` VALUES (32, 'PHSOIT', 'หน่วยเทคโนโลยีสารสนเทศ', 'ไอที', 'หัวหน้าหน่วย', '2', '1');
INSERT INTO `organization` VALUES (33, 'PHSOBA', 'หน่วยอาคารสถานที่', 'สถานที่', 'หัวหน้าหน่วย', '2', '1');
INSERT INTO `organization` VALUES (34, 'PHSOSM', 'หน่วยบริการการประชุม', 'การประชุม', 'หัวหน้าหน่วย', '2', '1');
INSERT INTO `organization` VALUES (35, 'PHSODP', 'หน่วยประสานงานหลักสูตร ส.ด.', 'ส.ด.', 'ประธานหลักสูตร', '2', '1');
INSERT INTO `organization` VALUES (36, '', 'ฝ่ายกิจการนักศึกษา', 'กิจการ น.ศ.', 'หัวหน้าฝ่าย', '2', '1');
INSERT INTO `organization` VALUES (37, '', 'ศูนย์ส่งเสริมสุขภาพ', 'ศูนย์สุขภาพ', '', '2', '1');
INSERT INTO `organization` VALUES (38, '', 'อาคารเอนกประสงค์', 'อาคาร 7', '', '2', '1');
INSERT INTO `organization` VALUES (39, '', 'หน่วยประกันคุณภาพการศึกษา', 'ประกันคุณภาพ', '', '2', '1');
INSERT INTO `organization` VALUES (40, '', 'โครงการเร่งรัดผลิตบัณฑิตทันตแพทย์', 'ผลิตทันต', '', '3', '1');
INSERT INTO `organization` VALUES (41, '', 'ชมรมดนตรีไทย', 'ดนตรีไทย', 'ประธานชมรม', '3', '1');
INSERT INTO `organization` VALUES (42, 'PHSOFP', 'งานคลังและพัสดุ', 'งานคลัง', 'หัวหน้างาน', '2', '1');
INSERT INTO `organization` VALUES (43, 'PHSOAG', 'งานบริหารและธุรการ', 'งานบริหาร', 'หัวหน้างาน', '2', '1');
INSERT INTO `organization` VALUES (44, 'PHST', 'สถานฝึกอบรมและวิจัยอนามัยชนบท (สูงเนิน)', 'สถานฝึก-สูงเนิน', '', '1', '1');

-- --------------------------------------------------------

-- 
-- โครงสร้างตาราง `tt_course`
-- 

CREATE TABLE `tt_course` (
  `id` bigint(10) unsigned NOT NULL auto_increment,
  `category` bigint(10) unsigned NOT NULL default '0' COMMENT 'หมวดหมู่',
  `sortorder` bigint(10) unsigned NOT NULL default '0',
  `password` varchar(50) NOT NULL default '',
  `fullname` varchar(254) NOT NULL COMMENT 'ชื่อวิชา',
  `shortname` varchar(100) NOT NULL default '',
  `idnumber` varchar(100) NOT NULL COMMENT 'รหัสวิชา',
  `summary` text NOT NULL COMMENT 'รายละเอียดรายวิชา',
  `format` varchar(10) NOT NULL default 'topics',
  `showgrades` tinyint(2) unsigned NOT NULL default '1',
  `modinfo` longtext,
  `newsitems` mediumint(5) unsigned NOT NULL default '1',
  `teacher` varchar(100) NOT NULL default 'Teacher',
  `teachers` varchar(100) NOT NULL default 'Teachers',
  `student` varchar(100) NOT NULL default 'Student',
  `students` varchar(100) NOT NULL default 'Students',
  `guest` tinyint(2) unsigned NOT NULL default '0',
  `startdate` bigint(10) unsigned NOT NULL default '0',
  `enrolperiod` bigint(10) unsigned NOT NULL default '0',
  `numsections` mediumint(5) unsigned NOT NULL default '1',
  `marker` bigint(10) unsigned NOT NULL default '0',
  `maxbytes` bigint(10) unsigned NOT NULL default '0',
  `showreports` smallint(4) unsigned NOT NULL default '0',
  `visible` tinyint(1) unsigned NOT NULL default '1',
  `hiddensections` tinyint(2) unsigned NOT NULL default '0',
  `groupmode` smallint(4) unsigned NOT NULL default '0',
  `groupmodeforce` smallint(4) unsigned NOT NULL default '0',
  `lang` varchar(30) NOT NULL default '',
  `theme` varchar(50) NOT NULL default '',
  `cost` varchar(10) NOT NULL default '',
  `currency` varchar(3) NOT NULL default 'USD',
  `timecreated` bigint(10) unsigned NOT NULL default '0',
  `timemodified` bigint(10) unsigned NOT NULL default '0',
  `metacourse` tinyint(1) unsigned NOT NULL default '0',
  `requested` tinyint(1) unsigned NOT NULL default '0',
  `restrictmodules` tinyint(1) unsigned NOT NULL default '0',
  `expirynotify` tinyint(1) unsigned NOT NULL default '0',
  `expirythreshold` bigint(10) unsigned NOT NULL default '0',
  `notifystudents` tinyint(1) unsigned NOT NULL default '0',
  `enrollable` tinyint(1) unsigned NOT NULL default '1',
  `enrolstartdate` bigint(10) unsigned NOT NULL default '0',
  `enrolenddate` bigint(10) unsigned NOT NULL default '0',
  `enrol` varchar(20) NOT NULL default '',
  `defaultrole` bigint(10) unsigned NOT NULL default '0',
  PRIMARY KEY  (`id`),
  KEY `mdl_cour_cat_ix` (`category`),
  KEY `mdl_cour_idn_ix` (`idnumber`),
  KEY `mdl_cour_sho_ix` (`shortname`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COMMENT='Central course table' AUTO_INCREMENT=25 ;

-- 
-- dump ตาราง `tt_course`
-- 

INSERT INTO `tt_course` VALUES (1, 0, 1000, '', 'PH-Moodle', 'e-Learning', '', '<span style="font-family: tahoma,arial,helvetica,sans-serif">test ทดสอบ</span>', 'site', 1, 'a:1:{i:5;O:8:"stdClass":6:{s:2:"cm";i:5;s:3:"mod";s:5:"forum";s:7:"section";s:1:"0";s:4:"name";s:117:"%E0%B8%82%E0%B9%88%E0%B8%B2%E0%B8%A7%E0%B9%81%E0%B8%A5%E0%B8%B0%E0%B8%9B%E0%B8%A3%E0%B8%B0%E0%B8%81%E0%B8%B2%E0%B8%A8";s:7:"visible";s:1:"1";s:5:"extra";s:0:"";}}', 3, 'Teacher', 'Teachers', 'Student', 'Students', 0, 0, 0, 1, 0, 0, 0, 1, 0, 0, 0, '', '', '', 'USD', 0, 1243565930, 0, 0, 0, 0, 0, 0, 1, 0, 0, '', 0);
INSERT INTO `tt_course` VALUES (2, 1, 2000, '', 'การป้องกันไวรัส', 'ไวรัส011', '011', ' ทดสอบ Add course <br />', 'topics', 1, 'a:1:{i:1;O:8:"stdClass":6:{s:2:"cm";i:1;s:3:"mod";s:5:"forum";s:7:"section";s:1:"0";s:4:"name";s:10:"News+forum";s:7:"visible";s:1:"1";s:5:"extra";s:0:"";}}', 5, 'Teacher', 'Teachers', 'Student', 'Students', 0, 1240502400, 0, 10, 0, 83886080, 0, 1, 0, 0, 0, '', '', '', 'USD', 1240448579, 1240448579, 0, 0, 0, 0, 864000, 0, 1, 0, 0, '', 0);
INSERT INTO `tt_course` VALUES (3, 2, 3017, '', 'วท.บ. สาธารณสุขศาสตร์ สาขาเอกโภชนวิทยา', 'MD002', '', 'อธิบายสั้นๆ เกี่ยวกับรายวิชาของท่าน ', 'topics', 1, 'a:1:{i:2;O:8:"stdClass":6:{s:2:"cm";i:2;s:3:"mod";s:5:"forum";s:7:"section";s:1:"0";s:4:"name";s:90:"%E0%B8%81%E0%B8%A3%E0%B8%B0%E0%B8%94%E0%B8%B2%E0%B8%99%E0%B8%82%E0%B9%88%E0%B8%B2%E0%B8%A7";s:7:"visible";s:1:"1";s:5:"extra";s:0:"";}}', 5, 'อาจารย์', 'อาจารย์', 'นักเรียน', 'นักเรียน', 0, 1243357200, 0, 10, 0, 83886080, 0, 1, 0, 0, 0, '', '', '', 'USD', 1243307409, 1243307409, 0, 0, 0, 0, 864000, 0, 1, 0, 0, '', 0);
INSERT INTO `tt_course` VALUES (4, 10, 7028, '', 'PHOH 412 OCCUPATIONAL TOXICOLOGY', 'Occ Tox', 'PHOH 412', '<p>ศึกษาหลักการทางพิษวิทยา ความเป็นพิษของสารเคมีซึ่งมักใช้ในงานอุตสาหกรรม ความเป็นพิษเฉียบพลันและความเป็นพิษเรื้อรังของสารตัวทำละลายอินทรีย์ โลหะหนัก รวมถึงการศึกษาระบบการจำแนกประเภทและการติดฉลากบอกของสารเคมี </p>\r\n<p></p>', 'topics', 1, 'a:24:{i:3;O:8:"stdClass":6:{s:2:"cm";i:3;s:3:"mod";s:5:"forum";s:7:"section";s:1:"0";s:4:"name";s:288:"%E0%B8%82%E0%B9%88%E0%B8%B2%E0%B8%A7%E0%B8%9B%E0%B8%A3%E0%B8%B0%E0%B8%81%E0%B8%B2%E0%B8%A8%E0%B8%88%E0%B8%B2%E0%B8%81%E0%B8%9E%E0%B8%B4%E0%B8%A9%E0%B8%A7%E0%B8%B4%E0%B8%97%E0%B8%A2%E0%B8%B2%E0%B8%AD%E0%B8%B2%E0%B8%8A%E0%B8%B5%E0%B8%A7%E0%B8%AD%E0%B8%99%E0%B8%B2%E0%B8%A1%E0%B8%B1%E0%B8%A2";s:7:"visible";s:1:"1";s:5:"extra";s:0:"";}i:268;O:8:"stdClass":6:{s:2:"cm";i:268;s:3:"mod";s:4:"chat";s:7:"section";s:1:"0";s:4:"name";s:108:"%E0%B8%AB%E0%B9%89%E0%B8%AD%E0%B8%87%E0%B8%9E%E0%B8%B4%E0%B8%A9%E0%B8%A7%E0%B8%B4%E0%B8%97%E0%B8%A2%E0%B8%B2";s:7:"visible";s:1:"1";s:5:"extra";s:0:"";}i:270;O:8:"stdClass":6:{s:2:"cm";i:270;s:3:"mod";s:5:"forum";s:7:"section";s:1:"0";s:4:"name";s:144:"%E0%B8%81%E0%B8%A3%E0%B8%B0%E0%B8%94%E0%B8%B2%E0%B8%99%E0%B8%9D%E0%B8%B2%E0%B8%81%E0%B8%82%E0%B9%89%E0%B8%AD%E0%B8%84%E0%B8%A7%E0%B8%B2%E0%B8%A1";s:7:"visible";s:1:"1";s:5:"extra";s:0:"";}i:301;O:8:"stdClass":7:{s:2:"cm";i:301;s:3:"mod";s:8:"resource";s:7:"section";s:1:"0";s:4:"name";s:297:"%E0%B8%95%E0%B8%B2%E0%B8%A3%E0%B8%B2%E0%B8%87%E0%B9%80%E0%B8%A3%E0%B8%B5%E0%B8%A2%E0%B8%99%E0%B8%A7%E0%B8%B4%E0%B8%8A%E0%B8%B2%E0%B8%9E%E0%B8%B4%E0%B8%A9%E0%B8%A7%E0%B8%B4%E0%B8%97%E0%B8%A2%E0%B8%B2%E0%B8%AD%E0%B8%B2%E0%B8%8A%E0%B8%B5%E0%B8%A7%E0%B8%AD%E0%B8%99%E0%B8%B2%E0%B8%A1%E0%B8%B1%E0%B8%A2";s:7:"visible";s:1:"1";s:5:"extra";s:0:"";s:4:"icon";s:9:"f/pdf.gif";}i:43;O:8:"stdClass":7:{s:2:"cm";i:43;s:3:"mod";s:8:"resource";s:7:"section";s:1:"1";s:4:"name";s:252:"%E0%B8%AA%E0%B8%B7%E0%B9%88%E0%B8%AD%E0%B8%81%E0%B8%B2%E0%B8%A3%E0%B8%AA%E0%B8%AD%E0%B8%99%E0%B8%AB%E0%B8%A5%E0%B8%B1%E0%B8%81%E0%B8%81%E0%B8%B2%E0%B8%A3%E0%B8%97%E0%B8%B2%E0%B8%87%E0%B8%9E%E0%B8%B4%E0%B8%A9%E0%B8%A7%E0%B8%B4%E0%B8%97%E0%B8%A2%E0%B8%B2";s:7:"visible";s:1:"1";s:5:"extra";s:0:"";s:4:"icon";s:9:"f/pdf.gif";}i:107;O:8:"stdClass":7:{s:2:"cm";i:107;s:3:"mod";s:8:"resource";s:7:"section";s:1:"1";s:4:"name";s:261:"%E0%B9%80%E0%B8%AD%E0%B8%81%E0%B8%AA%E0%B8%B2%E0%B8%A3%E0%B8%84%E0%B8%B3%E0%B8%AA%E0%B8%AD%E0%B8%99%E0%B8%AB%E0%B8%A5%E0%B8%B1%E0%B8%81%E0%B8%81%E0%B8%B2%E0%B8%A3%E0%B8%97%E0%B8%B2%E0%B8%87%E0%B8%9E%E0%B8%B4%E0%B8%A9%E0%B8%A7%E0%B8%B4%E0%B8%97%E0%B8%A2%E0%B8%B2";s:7:"visible";s:1:"1";s:5:"extra";s:0:"";s:4:"icon";s:9:"f/pdf.gif";}i:165;O:8:"stdClass":6:{s:2:"cm";i:165;s:3:"mod";s:4:"quiz";s:7:"section";s:1:"1";s:4:"name";s:146:"%E0%B8%81%E0%B8%B2%E0%B8%A3%E0%B8%97%E0%B8%94%E0%B8%AA%E0%B8%AD%E0%B8%9A%E0%B8%84%E0%B8%A3%E0%B8%B1%E0%B9%89%E0%B8%87%E0%B8%97%E0%B8%B5%E0%B9%88+1";s:7:"visible";s:1:"1";s:5:"extra";s:0:"";}i:208;O:8:"stdClass":6:{s:2:"cm";i:208;s:3:"mod";s:8:"feedback";s:7:"section";s:1:"1";s:4:"name";s:189:"%E0%B8%84%E0%B8%A7%E0%B8%B2%E0%B8%A1%E0%B8%9E%E0%B8%B6%E0%B8%87%E0%B8%9E%E0%B8%AD%E0%B9%83%E0%B8%88%E0%B9%83%E0%B8%99%E0%B8%81%E0%B8%B2%E0%B8%A3%E0%B9%80%E0%B8%A3%E0%B8%B5%E0%B8%A2%E0%B8%99";s:7:"visible";s:1:"1";s:5:"extra";s:0:"";}i:110;O:8:"stdClass":7:{s:2:"cm";i:110;s:3:"mod";s:8:"resource";s:7:"section";s:1:"2";s:4:"name";s:396:"%E0%B9%80%E0%B8%AD%E0%B8%81%E0%B8%AA%E0%B8%B2%E0%B8%A3%E0%B8%84%E0%B8%B3%E0%B8%AA%E0%B8%AD%E0%B8%99%E0%B8%81%E0%B8%B2%E0%B8%A3%E0%B9%80%E0%B8%9B%E0%B8%A5%E0%B8%B5%E0%B9%88%E0%B8%A2%E0%B8%99%E0%B9%81%E0%B8%9B%E0%B8%A5%E0%B8%87%E0%B9%82%E0%B8%84%E0%B8%A3%E0%B8%87%E0%B8%AA%E0%B8%A3%E0%B9%89%E0%B8%B2%E0%B8%87%E0%B8%82%E0%B8%AD%E0%B8%87%E0%B8%AA%E0%B8%B2%E0%B8%A3%E0%B9%80%E0%B8%84%E0%B8%A1%E0%B8%B5";s:7:"visible";s:1:"1";s:5:"extra";s:0:"";s:4:"icon";s:9:"f/pdf.gif";}i:124;O:8:"stdClass":7:{s:2:"cm";i:124;s:3:"mod";s:8:"resource";s:7:"section";s:1:"3";s:4:"name";s:207:"%E0%B8%AA%E0%B8%B7%E0%B9%88%E0%B8%AD%E0%B8%81%E0%B8%B2%E0%B8%A3%E0%B8%AA%E0%B8%AD%E0%B8%99%E0%B8%AD%E0%B8%B1%E0%B8%99%E0%B8%95%E0%B8%A3%E0%B8%B2%E0%B8%A2%E0%B8%95%E0%B9%88%E0%B8%AD%E0%B8%95%E0%B8%B1%E0%B8%9A";s:7:"visible";s:1:"1";s:5:"extra";s:0:"";s:4:"icon";s:9:"f/pdf.gif";}i:239;O:8:"stdClass":6:{s:2:"cm";i:239;s:3:"mod";s:8:"feedback";s:7:"section";s:1:"3";s:4:"name";s:189:"%E0%B8%84%E0%B8%A7%E0%B8%B2%E0%B8%A1%E0%B8%9E%E0%B8%B6%E0%B8%87%E0%B8%9E%E0%B8%AD%E0%B9%83%E0%B8%88%E0%B9%83%E0%B8%99%E0%B8%81%E0%B8%B2%E0%B8%A3%E0%B9%80%E0%B8%A3%E0%B8%B5%E0%B8%A2%E0%B8%99";s:7:"visible";s:1:"1";s:5:"extra";s:0:"";}i:238;O:8:"stdClass":7:{s:2:"cm";i:238;s:3:"mod";s:8:"resource";s:7:"section";s:1:"4";s:4:"name";s:198:"%E0%B8%AA%E0%B8%B7%E0%B9%88%E0%B8%AD%E0%B8%81%E0%B8%B2%E0%B8%A3%E0%B8%AA%E0%B8%AD%E0%B8%99%E0%B8%AD%E0%B8%B1%E0%B8%99%E0%B8%95%E0%B8%A3%E0%B8%B2%E0%B8%A2%E0%B8%95%E0%B9%88%E0%B8%AD%E0%B9%84%E0%B8%95";s:7:"visible";s:1:"1";s:5:"extra";s:0:"";s:4:"icon";s:9:"f/pdf.gif";}i:240;O:8:"stdClass":6:{s:2:"cm";i:240;s:3:"mod";s:8:"feedback";s:7:"section";s:1:"4";s:4:"name";s:189:"%E0%B8%84%E0%B8%A7%E0%B8%B2%E0%B8%A1%E0%B8%9E%E0%B8%B6%E0%B8%87%E0%B8%9E%E0%B8%AD%E0%B9%83%E0%B8%88%E0%B9%83%E0%B8%99%E0%B8%81%E0%B8%B2%E0%B8%A3%E0%B9%80%E0%B8%A3%E0%B8%B5%E0%B8%A2%E0%B8%99";s:7:"visible";s:1:"1";s:5:"extra";s:0:"";}i:127;O:8:"stdClass":7:{s:2:"cm";i:127;s:3:"mod";s:8:"resource";s:7:"section";s:1:"5";s:4:"name";s:324:"%E0%B8%AA%E0%B8%B7%E0%B9%88%E0%B8%AD%E0%B8%81%E0%B8%B2%E0%B8%A3%E0%B8%AA%E0%B8%AD%E0%B8%99%E0%B8%AD%E0%B8%B1%E0%B8%99%E0%B8%95%E0%B8%A3%E0%B8%B2%E0%B8%A2%E0%B8%95%E0%B9%88%E0%B8%AD%E0%B8%A3%E0%B8%B0%E0%B8%9A%E0%B8%9A%E0%B8%97%E0%B8%B2%E0%B8%87%E0%B9%80%E0%B8%94%E0%B8%B4%E0%B8%99%E0%B8%AB%E0%B8%B2%E0%B8%A2%E0%B9%83%E0%B8%88";s:7:"visible";s:1:"1";s:5:"extra";s:0:"";s:4:"icon";s:9:"f/pdf.gif";}i:241;O:8:"stdClass":6:{s:2:"cm";i:241;s:3:"mod";s:8:"feedback";s:7:"section";s:1:"5";s:4:"name";s:189:"%E0%B8%84%E0%B8%A7%E0%B8%B2%E0%B8%A1%E0%B8%9E%E0%B8%B6%E0%B8%87%E0%B8%9E%E0%B8%AD%E0%B9%83%E0%B8%88%E0%B9%83%E0%B8%99%E0%B8%81%E0%B8%B2%E0%B8%A3%E0%B9%80%E0%B8%A3%E0%B8%B5%E0%B8%A2%E0%B8%99";s:7:"visible";s:1:"1";s:5:"extra";s:0:"";}i:137;O:8:"stdClass":7:{s:2:"cm";i:137;s:3:"mod";s:8:"resource";s:7:"section";s:1:"6";s:4:"name";s:261:"%E0%B8%AA%E0%B8%B7%E0%B9%88%E0%B8%AD%E0%B8%81%E0%B8%B2%E0%B8%A3%E0%B8%AA%E0%B8%AD%E0%B8%99%E0%B8%AD%E0%B8%B1%E0%B8%99%E0%B8%95%E0%B8%A3%E0%B8%B2%E0%B8%A2%E0%B8%95%E0%B9%88%E0%B8%AD%E0%B8%A3%E0%B8%B0%E0%B8%9A%E0%B8%9A%E0%B9%80%E0%B8%A5%E0%B8%B7%E0%B8%AD%E0%B8%94";s:7:"visible";s:1:"1";s:5:"extra";s:0:"";s:4:"icon";s:9:"f/pdf.gif";}i:242;O:8:"stdClass":6:{s:2:"cm";i:242;s:3:"mod";s:8:"feedback";s:7:"section";s:1:"6";s:4:"name";s:189:"%E0%B8%84%E0%B8%A7%E0%B8%B2%E0%B8%A1%E0%B8%9E%E0%B8%B6%E0%B8%87%E0%B8%9E%E0%B8%AD%E0%B9%83%E0%B8%88%E0%B9%83%E0%B8%99%E0%B8%81%E0%B8%B2%E0%B8%A3%E0%B9%80%E0%B8%A3%E0%B8%B5%E0%B8%A2%E0%B8%99";s:7:"visible";s:1:"1";s:5:"extra";s:0:"";}i:140;O:8:"stdClass":7:{s:2:"cm";i:140;s:3:"mod";s:8:"resource";s:7:"section";s:1:"7";s:4:"name";s:316:"%E0%B8%AA%E0%B8%B7%E0%B9%88%E0%B8%AD%E0%B8%81%E0%B8%B2%E0%B8%A3%E0%B8%AA%E0%B8%AD%E0%B8%99%E0%B8%AD%E0%B8%B1%E0%B8%99%E0%B8%95%E0%B8%A3%E0%B8%B2%E0%B8%A2%E0%B8%95%E0%B9%88%E0%B8%AD%E0%B8%A3%E0%B8%B0%E0%B8%9A%E0%B8%9A%E0%B8%A0%E0%B8%B9%E0%B8%A1%E0%B8%B4%E0%B8%84%E0%B8%B8%E0%B9%89%E0%B8%A1%E0%B8%81%E0%B8%B1%E0%B8%991";s:7:"visible";s:1:"1";s:5:"extra";s:0:"";s:4:"icon";s:9:"f/pdf.gif";}i:142;O:8:"stdClass":7:{s:2:"cm";i:142;s:3:"mod";s:8:"resource";s:7:"section";s:1:"7";s:4:"name";s:318:"%E0%B8%AA%E0%B8%B7%E0%B9%88%E0%B8%AD%E0%B8%81%E0%B8%B2%E0%B8%A3%E0%B8%AA%E0%B8%AD%E0%B8%99%E0%B8%AD%E0%B8%B1%E0%B8%99%E0%B8%95%E0%B8%A3%E0%B8%B2%E0%B8%A2%E0%B8%95%E0%B9%88%E0%B8%AD%E0%B8%A3%E0%B8%B0%E0%B8%9A%E0%B8%9A%E0%B8%A0%E0%B8%B9%E0%B8%A1%E0%B8%B4%E0%B8%84%E0%B8%B8%E0%B9%89%E0%B8%A1%E0%B8%81%E0%B8%B1%E0%B8%99+2+";s:7:"visible";s:1:"1";s:5:"extra";s:0:"";s:4:"icon";s:9:"f/pdf.gif";}i:243;O:8:"stdClass":6:{s:2:"cm";i:243;s:3:"mod";s:8:"feedback";s:7:"section";s:1:"7";s:4:"name";s:189:"%E0%B8%84%E0%B8%A7%E0%B8%B2%E0%B8%A1%E0%B8%9E%E0%B8%B6%E0%B8%87%E0%B8%9E%E0%B8%AD%E0%B9%83%E0%B8%88%E0%B9%83%E0%B8%99%E0%B8%81%E0%B8%B2%E0%B8%A3%E0%B9%80%E0%B8%A3%E0%B8%B5%E0%B8%A2%E0%B8%99";s:7:"visible";s:1:"1";s:5:"extra";s:0:"";}i:151;O:8:"stdClass":7:{s:2:"cm";i:151;s:3:"mod";s:8:"resource";s:7:"section";s:1:"8";s:4:"name";s:319:"%E0%B8%AA%E0%B8%B7%E0%B9%88%E0%B8%AD%E0%B8%81%E0%B8%B2%E0%B8%A3%E0%B8%AA%E0%B8%AD%E0%B8%99GHS+%E0%B9%81%E0%B8%A5%E0%B8%B0%E0%B8%AD%E0%B8%B1%E0%B8%99%E0%B8%95%E0%B8%A3%E0%B8%B2%E0%B8%A2%E0%B8%95%E0%B9%88%E0%B8%AD%E0%B8%A3%E0%B8%B0%E0%B8%9A%E0%B8%9A%E0%B8%AA%E0%B8%B7%E0%B8%9A%E0%B8%9E%E0%B8%B1%E0%B8%99%E0%B8%98%E0%B9%8C";s:7:"visible";s:1:"1";s:5:"extra";s:0:"";s:4:"icon";s:9:"f/pdf.gif";}i:244;O:8:"stdClass":6:{s:2:"cm";i:244;s:3:"mod";s:8:"feedback";s:7:"section";s:1:"8";s:4:"name";s:189:"%E0%B8%84%E0%B8%A7%E0%B8%B2%E0%B8%A1%E0%B8%9E%E0%B8%B6%E0%B8%87%E0%B8%9E%E0%B8%AD%E0%B9%83%E0%B8%88%E0%B9%83%E0%B8%99%E0%B8%81%E0%B8%B2%E0%B8%A3%E0%B9%80%E0%B8%A3%E0%B8%B5%E0%B8%A2%E0%B8%99";s:7:"visible";s:1:"1";s:5:"extra";s:0:"";}i:153;O:8:"stdClass":7:{s:2:"cm";i:153;s:3:"mod";s:8:"resource";s:7:"section";s:1:"9";s:4:"name";s:198:"%E0%B8%81%E0%B8%B2%E0%B8%A3%E0%B8%82%E0%B8%99%E0%B8%AA%E0%B9%88%E0%B8%87%E0%B8%AA%E0%B8%B2%E0%B8%A3%E0%B9%80%E0%B8%84%E0%B8%A1%E0%B8%B5%E0%B8%AD%E0%B8%B1%E0%B8%99%E0%B8%95%E0%B8%A3%E0%B8%B2%E0%B8%A2";s:7:"visible";s:1:"1";s:5:"extra";s:0:"";s:4:"icon";s:9:"f/pdf.gif";}i:245;O:8:"stdClass":6:{s:2:"cm";i:245;s:3:"mod";s:8:"feedback";s:7:"section";s:1:"9";s:4:"name";s:189:"%E0%B8%84%E0%B8%A7%E0%B8%B2%E0%B8%A1%E0%B8%9E%E0%B8%B6%E0%B8%87%E0%B8%9E%E0%B8%AD%E0%B9%83%E0%B8%88%E0%B9%83%E0%B8%99%E0%B8%81%E0%B8%B2%E0%B8%A3%E0%B9%80%E0%B8%A3%E0%B8%B5%E0%B8%A2%E0%B8%99";s:7:"visible";s:1:"1";s:5:"extra";s:0:"";}}', 5, 'อาจารย์', 'อาจารย์', 'นักเรียน', 'นักเรียน', 0, 1243357200, 0, 9, 0, 83886080, 0, 1, 0, 0, 0, '', '', '', 'USD', 1243307465, 1243565292, 0, 0, 0, 0, 864000, 0, 1, 0, 0, '', 0);
INSERT INTO `tt_course` VALUES (5, 2, 3012, '', 'Teacher15', 'Teacher15', '', 'อธิบายสั้นๆ เกี่ยวกับรายวิชาของท่าน ', 'topics', 1, 'a:1:{i:18;O:8:"stdClass":6:{s:2:"cm";i:18;s:3:"mod";s:5:"forum";s:7:"section";s:1:"0";s:4:"name";s:10:"News+forum";s:7:"visible";s:1:"1";s:5:"extra";s:0:"";}}', 5, 'อาจารย์', 'อาจารย์', 'นักเรียน', 'นักเรียน', 0, 1243357200, 0, 10, 0, 83886080, 0, 1, 0, 0, 0, '', '', '', 'USD', 1243319602, 1243319602, 0, 0, 0, 0, 864000, 0, 1, 0, 0, '', 0);
INSERT INTO `tt_course` VALUES (6, 2, 3011, '', 'Teacher14', 'Teacher14', '', 'อธิบายสั้นๆ เกี่ยวกับรายวิชาของท่าน ', 'topics', 1, 'a:1:{i:185;O:8:"stdClass":6:{s:2:"cm";i:185;s:3:"mod";s:5:"forum";s:7:"section";s:1:"0";s:4:"name";s:90:"%E0%B8%81%E0%B8%A3%E0%B8%B0%E0%B8%94%E0%B8%B2%E0%B8%99%E0%B8%82%E0%B9%88%E0%B8%B2%E0%B8%A7";s:7:"visible";s:1:"1";s:5:"extra";s:0:"";}}', 5, 'อาจารย์', 'อาจารย์', 'นักเรียน', 'นักเรียน', 0, 1243357200, 0, 10, 0, 83886080, 0, 1, 0, 0, 0, '', '', '', 'USD', 1243319687, 1243319687, 0, 0, 0, 0, 864000, 0, 1, 0, 0, '', 0);
INSERT INTO `tt_course` VALUES (7, 2, 3013, '', 'ไวรัส', 'ไวรัส', '', '<p>..............ไวรัส</p>', 'topics', 1, 'a:1:{i:21;O:8:"stdClass":6:{s:2:"cm";i:21;s:3:"mod";s:5:"forum";s:7:"section";s:1:"0";s:4:"name";s:90:"%E0%B8%81%E0%B8%A3%E0%B8%B0%E0%B8%94%E0%B8%B2%E0%B8%99%E0%B8%82%E0%B9%88%E0%B8%B2%E0%B8%A7";s:7:"visible";s:1:"1";s:5:"extra";s:0:"";}}', 5, 'อาจารย์', 'อาจารย์', 'นักเรียน', 'นักเรียน', 0, 1243357200, 0, 10, 0, 83886080, 0, 1, 0, 0, 0, '', '', '', 'USD', 1243319748, 1243570333, 0, 0, 0, 0, 864000, 0, 1, 0, 0, '', 0);
INSERT INTO `tt_course` VALUES (8, 2, 3014, '', 'Teacher17', 'Teacher17', '', 'อธิบายสั้นๆ เกี่ยวกับรายวิชาของท่าน ', 'topics', 1, 'a:7:{i:9;O:8:"stdClass":6:{s:2:"cm";i:9;s:3:"mod";s:5:"forum";s:7:"section";s:1:"0";s:4:"name";s:10:"News+forum";s:7:"visible";s:1:"1";s:5:"extra";s:0:"";}i:126;O:8:"stdClass":7:{s:2:"cm";i:126;s:3:"mod";s:8:"resource";s:7:"section";s:1:"1";s:4:"name";s:3:"pdf";s:7:"visible";s:1:"1";s:5:"extra";s:0:"";s:4:"icon";s:9:"f/pdf.gif";}i:160;O:8:"stdClass":6:{s:2:"cm";i:160;s:3:"mod";s:4:"quiz";s:7:"section";s:1:"1";s:4:"name";s:72:"%E0%B9%81%E0%B8%9A%E0%B8%9A%E0%B8%97%E0%B8%94%E0%B8%AA%E0%B8%AD%E0%B8%9A";s:7:"visible";s:1:"1";s:5:"extra";s:0:"";}i:203;O:8:"stdClass":6:{s:2:"cm";i:203;s:3:"mod";s:6:"survey";s:7:"section";s:1:"1";s:4:"name";s:4:"test";s:7:"visible";s:1:"1";s:5:"extra";s:0:"";}i:206;O:8:"stdClass":6:{s:2:"cm";i:206;s:3:"mod";s:8:"feedback";s:7:"section";s:1:"1";s:4:"name";s:72:"%E0%B9%81%E0%B8%9A%E0%B8%9A%E0%B8%AA%E0%B8%B3%E0%B8%A3%E0%B8%A7%E0%B8%88";s:7:"visible";s:1:"1";s:5:"extra";s:0:"";}i:223;O:8:"stdClass":6:{s:2:"cm";i:223;s:3:"mod";s:4:"chat";s:7:"section";s:1:"1";s:4:"name";s:126:"%E0%B8%AB%E0%B9%89%E0%B8%AD%E0%B8%87%E0%B9%81%E0%B8%A5%E0%B8%81%E0%B9%80%E0%B8%9B%E0%B8%A5%E0%B8%B5%E0%B9%88%E0%B8%A2%E0%B8%99";s:7:"visible";s:1:"1";s:5:"extra";s:0:"";}i:233;O:8:"stdClass":6:{s:2:"cm";i:233;s:3:"mod";s:5:"forum";s:7:"section";s:1:"1";s:4:"name";s:126:"%E0%B8%81%E0%B8%A3%E0%B8%B0%E0%B8%94%E0%B8%B2%E0%B8%99%E0%B8%96%E0%B8%B2%E0%B8%A1%E0%B8%9B%E0%B8%B1%E0%B8%8D%E0%B8%AB%E0%B8%B2";s:7:"visible";s:1:"1";s:5:"extra";s:0:"";}}', 5, 'อาจารย์', 'อาจารย์', 'นักเรียน', 'นักเรียน', 0, 1243357200, 0, 10, 0, 83886080, 0, 1, 0, 0, 0, '', '', '', 'USD', 1243319810, 1243319810, 0, 0, 0, 0, 864000, 0, 1, 0, 0, '', 0);
INSERT INTO `tt_course` VALUES (9, 2, 3015, '', 'PHNU 418วิทยาศาสตร์การอาหารขั้นแนะนำ', 'phnu 418', 'phnu 418', '<p style="text-justify: inter-cluster; text-align: justify; margin: 0in 0in 0pt" class="MsoNormal"><span style="font-family: "><span style="mso-tab-count: 1">                </span><span lang="TH">อาหารมีความสำคัญอย่างยิ่งต่อการดำรงชีวิตของมนุษย์โดยเป็นเครื่องค้ำจุนชีวิต <span style="mso-spacerun: yes">         </span>วิทยาศาตร์และเทคโนโลยีการอาหารเกิดจากคำว่า </span>“<span lang="TH">วิทยาศาสตร์</span>” , “<span lang="TH">เทคโนโลยี</span>” <span lang="TH">และ </span><span style="mso-spacerun: yes">          </span>“<span lang="TH">อาหาร</span>” <span lang="TH">วิชาวิทยาศาสตร์การอาหารจัดเป็นวิชาวิทยาศาสตร์ประยุกต์ที่เกิดจากรากฐานวิชาการหลายแขนง<span style="mso-spacerun: yes">  </span>อาทิเช่น เคมีอาหาร </span>(Food chemistry) <span lang="TH">การวิเคราะห์อาหาร </span>(Food analysis) <span lang="TH">จุลินทรีย์ในอาหาร </span>(Food microbiology) <span lang="TH">วิศวกรรมอาหาร (</span>Food processing) <span lang="TH">การถนอมอาหาร </span>(Food preservation) <span lang="TH">อุตสาหกรรมอาหารต้องประกอบไปด้วย </span>4 <span lang="TH">ส่วน คือ การผลิต (</span>Production) <span lang="TH">การแปรรูป (</span>Processing) <span lang="TH">การกระจายสินค้า </span>(Distribution) <span lang="TH">และ การตลาด (</span>Marketing) <span lang="TH">อุตสาหกรรมอาหารหลักแบ่งได้เป็น ธัญชาติและเบเกอรี (</span>Cereals and bakery products)<span lang="TH">เนื้อสัตว์และผลิตภัณฑ์ (</span>Meat and meat products) <span lang="TH">นมและผลิตภัณฑ์นม (</span>Milk and milk products)<span lang="TH">ผักและผลไม้ (</span>Fruits and vegetables) <span lang="TH">ไขมันและน้ำมัน (</span>Fats and oils) <span lang="TH">นักวิทยาศาสตร์การอาหารจึงมีบทบาทหน้าที่ในการวิจัยและพัฒนาผลิตภัณฑ์อาหาร ควบคุมการผลิตและควบคุมคุณภาพอาหารให้ความปลอดภัยต่อผู้บริโภค</span> </span></p>\r\n<p></p>\r\n<p></p>\r\n<p></p>', 'topics', 1, 'a:8:{i:23;O:8:"stdClass":6:{s:2:"cm";i:23;s:3:"mod";s:5:"forum";s:7:"section";s:1:"0";s:4:"name";s:90:"%E0%B8%81%E0%B8%A3%E0%B8%B0%E0%B8%94%E0%B8%B2%E0%B8%99%E0%B8%82%E0%B9%88%E0%B8%B2%E0%B8%A7";s:7:"visible";s:1:"1";s:5:"extra";s:0:"";}i:26;O:8:"stdClass":6:{s:2:"cm";i:26;s:3:"mod";s:5:"label";s:7:"section";s:1:"1";s:4:"name";s:277:"PHNU+418+%E0%B8%A7%E0%B8%B4%E0%B8%97%E0%B8%A2%E0%B8%B2%E0%B8%A8%E0%B8%B2%E0%B8%AA%E0%B8%95%E0%B8%A3%E0%B9%8C%E0%B8%81%E0%B8%B2%E0%B8%A3%E0%B8%AD%E0%B8%B2%E0%B8%AB%E0%B8%B2%E0%B8%A3%E0%B8%82%E0%B8%B1%E0%B9%89%E0%B8%99%E0%B9%81%E0%B8%99%E0%B8%B0%E0%B8%99%E0%B8%B3++%0D%0A++%0D%0A";s:7:"visible";s:1:"1";s:5:"extra";s:512:"%3Cp+style%3D%22margin%3A+0in+0in+0pt%22+class%3D%22MsoNormal%22%3E%3Cspan+style%3D%22font-family%3A+%22+lang%3D%22TH%22%3EPHNU+418+%E0%B8%A7%E0%B8%B4%E0%B8%97%E0%B8%A2%E0%B8%B2%E0%B8%A8%E0%B8%B2%E0%B8%AA%E0%B8%95%E0%B8%A3%E0%B9%8C%E0%B8%81%E0%B8%B2%E0%B8%A3%E0%B8%AD%E0%B8%B2%E0%B8%AB%E0%B8%B2%E0%B8%A3%E0%B8%82%E0%B8%B1%E0%B9%89%E0%B8%99%E0%B9%81%E0%B8%99%E0%B8%B0%E0%B8%99%E0%B8%B3%3C%2Fspan%3E%3Cspan+style%3D%22font-size%3A+16pt%22%3E+%3C%2Fspan%3E+%0D%0A++%3Cp%3E%3C%2Fp%3E%3C%2Fp%3E%0D%0A%3Cp%3E%3C%2Fp%3E";}i:112;O:8:"stdClass":7:{s:2:"cm";i:112;s:3:"mod";s:8:"resource";s:7:"section";s:1:"1";s:4:"name";s:90:"%E0%B8%95%E0%B8%B2%E0%B8%A3%E0%B8%B2%E0%B8%87%E0%B9%80%E0%B8%A3%E0%B8%B5%E0%B8%A2%E0%B8%99";s:7:"visible";s:1:"1";s:5:"extra";s:0:"";s:4:"icon";s:9:"f/pdf.gif";}i:129;O:8:"stdClass":7:{s:2:"cm";i:129;s:3:"mod";s:8:"resource";s:7:"section";s:1:"1";s:4:"name";s:63:"%E0%B8%9A%E0%B8%97%E0%B9%80%E0%B8%A3%E0%B8%B5%E0%B8%A2%E0%B8%99";s:7:"visible";s:1:"1";s:5:"extra";s:0:"";s:4:"icon";s:9:"f/pdf.gif";}i:177;O:8:"stdClass":6:{s:2:"cm";i:177;s:3:"mod";s:4:"quiz";s:7:"section";s:1:"1";s:4:"name";s:126:"%E0%B8%82%E0%B9%89%E0%B8%AD%E0%B8%AA%E0%B8%AD%E0%B8%9A%E0%B8%84%E0%B8%A3%E0%B8%B1%E0%B9%89%E0%B8%87%E0%B8%97%E0%B8%B5%E0%B9%88";s:7:"visible";s:1:"1";s:5:"extra";s:0:"";}i:209;O:8:"stdClass":7:{s:2:"cm";i:209;s:3:"mod";s:8:"resource";s:7:"section";s:1:"1";s:4:"name";s:198:"%E0%B9%81%E0%B8%9A%E0%B8%9A%E0%B8%AA%E0%B8%B3%E0%B8%A3%E0%B8%A7%E0%B8%88%E0%B8%AA%E0%B8%B3%E0%B8%AB%E0%B8%A3%E0%B8%B1%E0%B8%9A%E0%B8%99%E0%B8%B1%E0%B8%81%E0%B8%A8%E0%B8%B6%E0%B8%81%E0%B8%A9%E0%B8%B2";s:7:"visible";s:1:"1";s:5:"extra";s:0:"";s:4:"icon";s:9:"f/web.gif";}i:214;O:8:"stdClass":6:{s:2:"cm";i:214;s:3:"mod";s:8:"feedback";s:7:"section";s:1:"1";s:4:"name";s:73:"%E0%B9%81%E0%B8%9A%E0%B8%9A%E0%B8%AA%E0%B8%B3%E0%B8%A3%E0%B8%A7%E0%B8%88+";s:7:"visible";s:1:"1";s:5:"extra";s:0:"";}i:228;O:8:"stdClass":6:{s:2:"cm";i:228;s:3:"mod";s:5:"forum";s:7:"section";s:1:"1";s:4:"name";s:63:"%E0%B8%84%E0%B8%A7%E0%B8%B2%E0%B8%A1%E0%B8%87%E0%B8%B2%E0%B8%A1";s:7:"visible";s:1:"1";s:5:"extra";s:0:"";}}', 5, 'อาจารย์', 'อาจารย์', 'นักเรียน', 'นักเรียน', 0, 1243357200, 0, 10, 0, 83886080, 0, 1, 0, 0, 0, '', 'EduMoodle_V2', '', 'USD', 1243319899, 1243479548, 0, 0, 0, 0, 864000, 0, 1, 0, 0, '', 0);
INSERT INTO `tt_course` VALUES (10, 2, 3001, '', 'E-Learning', 'Elearning', '', '<p>เกี่ยวกับการเรียนการสอนผ่านเว็บ</p>', 'topics', 1, 'a:4:{i:186;O:8:"stdClass":6:{s:2:"cm";i:186;s:3:"mod";s:5:"forum";s:7:"section";s:1:"0";s:4:"name";s:90:"%E0%B8%81%E0%B8%A3%E0%B8%B0%E0%B8%94%E0%B8%B2%E0%B8%99%E0%B8%82%E0%B9%88%E0%B8%B2%E0%B8%A7";s:7:"visible";s:1:"1";s:5:"extra";s:0:"";}i:254;O:8:"stdClass":6:{s:2:"cm";i:254;s:3:"mod";s:10:"assignment";s:7:"section";s:1:"1";s:4:"name";s:200:"%E0%B8%81%E0%B8%B2%E0%B8%A3%E0%B8%9A%E0%B9%89%E0%B8%B2%E0%B8%99+%E0%B9%81%E0%B8%9A%E0%B8%9A+%E0%B8%84%E0%B8%B3%E0%B8%95%E0%B8%AD%E0%B8%9A%E0%B8%AD%E0%B8%AD%E0%B8%99%E0%B9%84%E0%B8%A5%E0%B8%99%E0%B9%8C";s:7:"visible";s:1:"1";s:5:"extra";s:0:"";}i:188;O:8:"stdClass":6:{s:2:"cm";i:188;s:3:"mod";s:8:"feedback";s:7:"section";s:1:"2";s:4:"name";s:243:"%E0%B8%95%E0%B8%B1%E0%B8%A7%E0%B8%AD%E0%B8%A2%E0%B9%88%E0%B8%B2%E0%B8%87%E0%B9%81%E0%B8%9A%E0%B8%9A%E0%B8%AA%E0%B8%B3%E0%B8%A3%E0%B8%A7%E0%B8%88%E0%B8%A3%E0%B8%B9%E0%B8%9B%E0%B9%81%E0%B8%9A%E0%B8%9A%E0%B8%95%E0%B9%88%E0%B8%B2%E0%B8%87%E0%B9%86";s:7:"visible";s:1:"1";s:5:"extra";s:0:"";}i:295;O:8:"stdClass":7:{s:2:"cm";i:295;s:3:"mod";s:8:"resource";s:7:"section";s:1:"3";s:4:"name";s:5:"flash";s:7:"visible";s:1:"1";s:5:"extra";s:306:"onclick%3D%22this.target%3D%27resource176%27%3B+return+openpopup%28%27%2Fmod%2Fresource%2Fview.php%3Finpopup%3Dtrue%26amp%3Bid%3D295%27%2C%27resource176%27%2C%27resizable%3D1%2Cscrollbars%3D1%2Cdirectories%3D1%2Clocation%3D1%2Cmenubar%3D1%2Ctoolbar%3D1%2Cstatus%3D1%2Cwidth%3D620%2Cheight%3D450%27%29%3B%22";s:4:"icon";s:11:"f/flash.gif";}}', 5, 'อาจารย์', 'อาจารย์', 'นักเรียน', 'นักเรียน', 0, 1243357200, 0, 10, 0, 83886080, 0, 1, 0, 0, 0, '', '', '', 'USD', 1243320176, 1243486810, 0, 0, 0, 0, 864000, 0, 1, 0, 0, '', 0);
INSERT INTO `tt_course` VALUES (11, 2, 3016, '', 'PHPN 630 Geriatric Nursing in Community', 'GNC', 'PHPN 630', '<p>การดูแล สร้างเสริม ป้องกัน และฟื้นฟูสุขภาพผู้สูงอายุในชุมชน</p>', 'topics', 1, 'a:8:{i:8;O:8:"stdClass":6:{s:2:"cm";i:8;s:3:"mod";s:5:"forum";s:7:"section";s:1:"0";s:4:"name";s:10:"News+forum";s:7:"visible";s:1:"1";s:5:"extra";s:0:"";}i:187;O:8:"stdClass":7:{s:2:"cm";i:187;s:3:"mod";s:8:"resource";s:7:"section";s:1:"1";s:4:"name";s:23:"Course+syllabus+PHPN630";s:7:"visible";s:1:"1";s:5:"extra";s:0:"";s:4:"icon";s:9:"f/pdf.gif";}i:189;O:8:"stdClass":7:{s:2:"cm";i:189;s:3:"mod";s:8:"resource";s:7:"section";s:1:"1";s:4:"name";s:24:"Changes+in+Older+Persons";s:7:"visible";s:1:"1";s:5:"extra";s:306:"onclick%3D%22this.target%3D%27resource136%27%3B+return+openpopup%28%27%2Fmod%2Fresource%2Fview.php%3Finpopup%3Dtrue%26amp%3Bid%3D189%27%2C%27resource136%27%2C%27resizable%3D1%2Cscrollbars%3D1%2Cdirectories%3D1%2Clocation%3D1%2Cmenubar%3D1%2Ctoolbar%3D1%2Cstatus%3D1%2Cwidth%3D620%2Cheight%3D450%27%29%3B%22";s:4:"icon";s:9:"f/pdf.gif";}i:191;O:8:"stdClass":6:{s:2:"cm";i:191;s:3:"mod";s:4:"chat";s:7:"section";s:1:"1";s:4:"name";s:55:"Trend+of+Care+for+Older+adults+in+community+In+Thailand";s:7:"visible";s:1:"1";s:5:"extra";s:0:"";}i:202;O:8:"stdClass":6:{s:2:"cm";i:202;s:3:"mod";s:4:"quiz";s:7:"section";s:1:"1";s:4:"name";s:11:"older+adult";s:7:"visible";s:1:"1";s:5:"extra";s:0:"";}i:213;O:8:"stdClass":6:{s:2:"cm";i:213;s:3:"mod";s:8:"feedback";s:7:"section";s:1:"1";s:4:"name";s:12:"satisfaction";s:7:"visible";s:1:"1";s:5:"extra";s:0:"";}i:306;O:8:"stdClass":6:{s:2:"cm";i:306;s:3:"mod";s:10:"assignment";s:7:"section";s:1:"1";s:4:"name";s:34:"trends+of+elderly+care+in+thailand";s:7:"visible";s:1:"1";s:5:"extra";s:0:"";}i:221;O:8:"stdClass":7:{s:2:"cm";i:221;s:3:"mod";s:8:"resource";s:7:"section";s:1:"2";s:4:"name";s:15:"video+streeming";s:7:"visible";s:1:"1";s:5:"extra";s:0:"";s:4:"icon";s:9:"f/web.gif";}}', 5, 'อาจารย์', 'อาจารย์', 'นักเรียน', 'นักเรียน', 0, 1243357200, 0, 15, 0, 83886080, 0, 1, 0, 0, 0, '', '', '', 'USD', 1243320238, 1243495800, 0, 0, 0, 0, 864000, 0, 1, 0, 0, '', 0);
INSERT INTO `tt_course` VALUES (12, 2, 3010, '', 'PHPN 617  Advance Public Health Nursing', 'สศพส', 'PHPN 617', '<p></p>\r\n<p style="text-align: justify; margin: 0in 0in 0pt" class="MsoNormal"><font size="3"><span style="font-family: " lang="TH"><strong><font size="5">         Õ  </font></strong>บทบาทหน้าที่และความรับผิดชอบของพยาบาลสาธารณสุข</span><span style="font-family: " lang="TH"> </span><span style="font-family: " lang="TH">การพัฒนาสุขภาพและคุณภาพชีวิตในลักษณะหุ้นส่วน</span><span style="font-family: " lang="TH"> </span><span style="font-family: " lang="TH">และภาคีเครือข่าย</span><span style="font-family: " lang="TH"> </span><span style="font-family: " lang="TH">การประยุกต์แนวคิด</span><span style="font-family: " lang="TH"> </span><span style="font-family: " lang="TH">หลักการ</span><span style="font-family: " lang="TH"> </span><span style="font-family: " lang="TH">ทฤษฎีทางการพยาบาล</span><span style="font-family: " lang="TH"> </span><span style="font-family: " lang="TH">การสาธารณสุข</span><span style="font-family: " lang="TH"> </span><span style="font-family: " lang="TH">และทฤษฎีทางสังคม</span><span style="font-family: " lang="TH"> </span><span style="font-family: " lang="TH">เพื่อการวางแผน</span><span style="font-family: " lang="TH"> </span><span style="font-family: " lang="TH">การออกแบบบริการสุขภาพ</span><span style="font-family: " lang="TH"> </span><span style="font-family: " lang="TH">และกิจกรรมการบริการ</span><span style="font-family: " lang="TH"> </span><span style="font-family: " lang="TH">และประเมินผลการปฏิบัติการพยาบาลสำหรับ</span><span style="font-family: " lang="TH"> </span><span style="font-family: " lang="TH">บุคคล</span><span style="font-family: " lang="TH"> </span><span style="font-family: " lang="TH">ครอบครัว</span><span style="font-family: " lang="TH"> </span><span style="font-family: " lang="TH">กลุ่ม และ</span><span style="font-family: " lang="TH"> </span><span style="font-family: " lang="TH">ชุมชนอย่างเป็นองค์รวมและต่อเนื่อง</span><span style="font-family: " lang="TH">  ö</span><span style="font-family: "></span></font></p>\r\n<p></p>\r\n<p></p>\r\n<p></p>\r\n<p></p>\r\n<p></p>', 'topics', 1, 'a:7:{i:19;O:8:"stdClass":6:{s:2:"cm";i:19;s:3:"mod";s:5:"forum";s:7:"section";s:1:"0";s:4:"name";s:90:"%E0%B8%81%E0%B8%A3%E0%B8%B0%E0%B8%94%E0%B8%B2%E0%B8%99%E0%B8%82%E0%B9%88%E0%B8%B2%E0%B8%A7";s:7:"visible";s:1:"1";s:5:"extra";s:0:"";}i:162;O:8:"stdClass":6:{s:2:"cm";i:162;s:3:"mod";s:4:"quiz";s:7:"section";s:1:"0";s:4:"name";s:8:"Pre-test";s:7:"visible";s:1:"1";s:5:"extra";s:0:"";}i:215;O:8:"stdClass":6:{s:2:"cm";i:215;s:3:"mod";s:8:"feedback";s:7:"section";s:1:"0";s:4:"name";s:99:"%E0%B8%84%E0%B8%A7%E0%B8%B2%E0%B8%A1%E0%B8%9E%E0%B8%B6%E0%B8%87%E0%B8%9E%E0%B8%AD%E0%B9%83%E0%B8%88";s:7:"visible";s:1:"1";s:5:"extra";s:0:"";}i:109;O:8:"stdClass":7:{s:2:"cm";i:109;s:3:"mod";s:8:"resource";s:7:"section";s:1:"1";s:4:"name";s:3:"APN";s:7:"visible";s:1:"1";s:5:"extra";s:0:"";s:4:"icon";s:16:"f/powerpoint.gif";}i:130;O:8:"stdClass":7:{s:2:"cm";i:130;s:3:"mod";s:8:"resource";s:7:"section";s:1:"2";s:4:"name";s:162:"%E0%B8%AD%E0%B8%87%E0%B8%84%E0%B9%8C%E0%B8%9B%E0%B8%A3%E0%B8%B0%E0%B8%81%E0%B8%AD%E0%B8%9A%E0%B8%82%E0%B8%AD%E0%B8%87%E0%B8%8A%E0%B8%B8%E0%B8%A1%E0%B8%8A%E0%B8%99";s:7:"visible";s:1:"1";s:5:"extra";s:0:"";s:4:"icon";s:16:"f/powerpoint.gif";}i:132;O:8:"stdClass":7:{s:2:"cm";i:132;s:3:"mod";s:8:"resource";s:7:"section";s:1:"2";s:4:"name";s:162:"%E0%B8%AD%E0%B8%87%E0%B8%84%E0%B9%8C%E0%B8%9B%E0%B8%A3%E0%B8%B0%E0%B8%81%E0%B8%AD%E0%B8%9A%E0%B8%82%E0%B8%AD%E0%B8%87%E0%B8%8A%E0%B8%B8%E0%B8%A1%E0%B8%8A%E0%B8%99";s:7:"visible";s:1:"1";s:5:"extra";s:0:"";s:4:"icon";s:11:"f/image.gif";}i:134;O:8:"stdClass":7:{s:2:"cm";i:134;s:3:"mod";s:8:"resource";s:7:"section";s:1:"2";s:4:"name";s:162:"%E0%B8%AD%E0%B8%87%E0%B8%84%E0%B9%8C%E0%B8%9B%E0%B8%A3%E0%B8%B0%E0%B8%81%E0%B8%AD%E0%B8%9A%E0%B8%82%E0%B8%AD%E0%B8%87%E0%B8%8A%E0%B8%B8%E0%B8%A1%E0%B8%8A%E0%B8%99";s:7:"visible";s:1:"1";s:5:"extra";s:306:"onclick%3D%22this.target%3D%27resource108%27%3B+return+openpopup%28%27%2Fmod%2Fresource%2Fview.php%3Finpopup%3Dtrue%26amp%3Bid%3D134%27%2C%27resource108%27%2C%27resizable%3D1%2Cscrollbars%3D1%2Cdirectories%3D1%2Clocation%3D1%2Cmenubar%3D1%2Ctoolbar%3D1%2Cstatus%3D1%2Cwidth%3D620%2Cheight%3D450%27%29%3B%22";s:4:"icon";s:11:"f/image.gif";}}', 5, 'อาจารย์', 'อาจารย์', 'นักเรียน', 'นักเรียน', 0, 1244307600, 0, 19, 0, 83886080, 0, 1, 0, 0, 0, '', 'orangewhite', '', 'USD', 1243320390, 1243478362, 0, 0, 0, 0, 864000, 0, 1, 0, 0, '', 0);
INSERT INTO `tt_course` VALUES (13, 12, 8031, '', 'PHAD 509  Principles of Supervision', 'Supervision', 'PHAD 509', '<p style="margin: 0in 0in 0pt" class="MsoBodyTextIndent2"><span style="font-family: " lang="TH"><font style="background-color: #ffffff"><font color="#cc6633">วิวัฒนาการของการนิเทศงาน</font> <font color="#cc6600">หลักและวิธีการนิเทศงาน</font> <font color="#cc6600">วิธีการปฏิบัติในการนิเทศงานในหน่วยงานสาธารณสุขต่างๆ <span style="mso-spacerun: yes"> </span>รวมทั้งอภิปรายปัญหาของการนิเทศงาน</font> <font color="#cc6600">และวิธีการแก้ไข</font></font></span><span style="font-family: "><font color="#cc6600"> </font></span></p>', 'topics', 1, 'a:13:{i:193;O:8:"stdClass":7:{s:2:"cm";i:193;s:3:"mod";s:8:"resource";s:7:"section";s:1:"0";s:4:"name";s:90:"%E0%B8%95%E0%B8%B2%E0%B8%A3%E0%B8%B2%E0%B8%87%E0%B9%80%E0%B8%A3%E0%B8%B5%E0%B8%A2%E0%B8%99";s:7:"visible";s:1:"1";s:5:"extra";s:0:"";s:4:"icon";s:10:"f/word.gif";}i:100;O:8:"stdClass":7:{s:2:"cm";i:100;s:3:"mod";s:8:"resource";s:7:"section";s:1:"1";s:4:"name";s:99:"%E0%B8%81%E0%B8%B2%E0%B8%A3%E0%B8%99%E0%B8%B4%E0%B9%80%E0%B8%97%E0%B8%A8%E0%B8%87%E0%B8%B2%E0%B8%99";s:7:"visible";s:1:"1";s:5:"extra";s:0:"";s:4:"icon";s:9:"f/pdf.gif";}i:111;O:8:"stdClass":7:{s:2:"cm";i:111;s:3:"mod";s:8:"resource";s:7:"section";s:1:"1";s:4:"name";s:180:"%E0%B8%A7%E0%B8%B1%E0%B8%95%E0%B8%96%E0%B8%B8%E0%B8%9B%E0%B8%A3%E0%B8%B0%E0%B8%AA%E0%B8%87%E0%B8%84%E0%B9%8C%E0%B8%81%E0%B8%B2%E0%B8%A3%E0%B8%99%E0%B8%B4%E0%B9%80%E0%B8%97%E0%B8%A8";s:7:"visible";s:1:"1";s:5:"extra";s:0:"";s:4:"icon";s:9:"f/pdf.gif";}i:170;O:8:"stdClass":6:{s:2:"cm";i:170;s:3:"mod";s:4:"quiz";s:7:"section";s:1:"1";s:4:"name";s:13:"Question+Bank";s:7:"visible";s:1:"1";s:5:"extra";s:0:"";}i:190;O:8:"stdClass":6:{s:2:"cm";i:190;s:3:"mod";s:10:"assignment";s:7:"section";s:1:"1";s:4:"name";s:355:"%E0%B8%81%E0%B8%B2%E0%B8%A3%E0%B8%9A%E0%B9%89%E0%B8%B2%E0%B8%99%E0%B8%84%E0%B8%A3%E0%B8%B1%E0%B9%89%E0%B8%87%E0%B8%97%E0%B8%B5%E0%B9%88+1+%E0%B8%9B%E0%B8%B1%E0%B8%8D%E0%B8%AB%E0%B8%B2%E0%B8%81%E0%B8%B2%E0%B8%A3%E0%B8%99%E0%B8%B4%E0%B9%80%E0%B8%97%E0%B8%A8+%28%E0%B9%83%E0%B8%AB%E0%B9%89%E0%B8%AA%E0%B9%88%E0%B8%87%E0%B9%82%E0%B8%94%E0%B8%A2+upload+file%29";s:7:"visible";s:1:"1";s:5:"extra";s:0:"";}i:123;O:8:"stdClass":7:{s:2:"cm";i:123;s:3:"mod";s:8:"resource";s:7:"section";s:1:"2";s:4:"name";s:117:"%E0%B8%9A%E0%B8%97%E0%B8%9A%E0%B8%B2%E0%B8%97%E0%B8%9C%E0%B8%B9%E0%B9%89%E0%B8%99%E0%B8%B4%E0%B9%80%E0%B8%97%E0%B8%A8";s:7:"visible";s:1:"1";s:5:"extra";s:304:"onclick%3D%22this.target%3D%27resource97%27%3B+return+openpopup%28%27%2Fmod%2Fresource%2Fview.php%3Finpopup%3Dtrue%26amp%3Bid%3D123%27%2C%27resource97%27%2C%27resizable%3D1%2Cscrollbars%3D1%2Cdirectories%3D1%2Clocation%3D1%2Cmenubar%3D1%2Ctoolbar%3D1%2Cstatus%3D1%2Cwidth%3D620%2Cheight%3D450%27%29%3B%22";s:4:"icon";s:9:"f/pdf.gif";}i:125;O:8:"stdClass":7:{s:2:"cm";i:125;s:3:"mod";s:8:"resource";s:7:"section";s:1:"2";s:4:"name";s:117:"%E0%B8%97%E0%B8%B1%E0%B8%81%E0%B8%A9%E0%B8%B0%E0%B8%9C%E0%B8%B9%E0%B9%89%E0%B8%99%E0%B8%B4%E0%B9%80%E0%B8%97%E0%B8%A8";s:7:"visible";s:1:"1";s:5:"extra";s:0:"";s:4:"icon";s:9:"f/pdf.gif";}i:184;O:8:"stdClass":6:{s:2:"cm";i:184;s:3:"mod";s:4:"quiz";s:7:"section";s:1:"2";s:4:"name";s:328:"%E0%B8%81%E0%B8%B2%E0%B8%A3%E0%B8%9A%E0%B9%89%E0%B8%B2%E0%B8%99%E0%B8%84%E0%B8%A3%E0%B8%B1%E0%B9%89%E0%B8%87%E0%B8%97%E0%B8%B5%E0%B9%88+2+%E0%B9%81%E0%B8%9A%E0%B8%9A%E0%B8%97%E0%B8%94%E0%B8%AA%E0%B8%AD%E0%B8%9A+%E0%B8%9A%E0%B8%97%E0%B8%9A%E0%B8%B2%E0%B8%97%E0%B8%9C%E0%B8%B9%E0%B9%89%E0%B8%99%E0%B8%B4%E0%B9%80%E0%B8%97%E0%B8%A8";s:7:"visible";s:1:"1";s:5:"extra";s:0:"";}i:291;O:8:"stdClass":6:{s:2:"cm";i:291;s:3:"mod";s:8:"feedback";s:7:"section";s:1:"2";s:4:"name";s:189:"%E0%B8%A0%E0%B8%B2%E0%B8%A7%E0%B8%B0%E0%B8%9C%E0%B8%B9%E0%B9%89%E0%B8%99%E0%B8%B3%E0%B8%95%E0%B8%B2%E0%B8%A1%E0%B8%81%E0%B8%B2%E0%B8%A3%E0%B8%A3%E0%B8%B1%E0%B8%9A%E0%B8%A3%E0%B8%B9%E0%B9%89";s:7:"visible";s:1:"1";s:5:"extra";s:0:"";}i:201;O:8:"stdClass":7:{s:2:"cm";i:201;s:3:"mod";s:8:"resource";s:7:"section";s:1:"3";s:4:"name";s:72:"%E0%B8%81%E0%B8%B2%E0%B8%A3%E0%B8%88%E0%B8%B9%E0%B8%87%E0%B9%83%E0%B8%88";s:7:"visible";s:1:"1";s:5:"extra";s:306:"onclick%3D%22this.target%3D%27resource140%27%3B+return+openpopup%28%27%2Fmod%2Fresource%2Fview.php%3Finpopup%3Dtrue%26amp%3Bid%3D201%27%2C%27resource140%27%2C%27resizable%3D1%2Cscrollbars%3D1%2Cdirectories%3D1%2Clocation%3D1%2Cmenubar%3D1%2Ctoolbar%3D1%2Cstatus%3D1%2Cwidth%3D620%2Cheight%3D450%27%29%3B%22";s:4:"icon";s:9:"f/pdf.gif";}i:205;O:8:"stdClass":6:{s:2:"cm";i:205;s:3:"mod";s:8:"feedback";s:7:"section";s:1:"3";s:4:"name";s:17:"motivative+survey";s:7:"visible";s:1:"1";s:5:"extra";s:0:"";}i:196;O:8:"stdClass":7:{s:2:"cm";i:196;s:3:"mod";s:8:"resource";s:7:"section";s:1:"4";s:4:"name";s:10:"leadership";s:7:"visible";s:1:"1";s:5:"extra";s:306:"onclick%3D%22this.target%3D%27resource139%27%3B+return+openpopup%28%27%2Fmod%2Fresource%2Fview.php%3Finpopup%3Dtrue%26amp%3Bid%3D196%27%2C%27resource139%27%2C%27resizable%3D1%2Cscrollbars%3D1%2Cdirectories%3D1%2Clocation%3D1%2Cmenubar%3D1%2Ctoolbar%3D1%2Cstatus%3D1%2Cwidth%3D620%2Cheight%3D450%27%29%3B%22";s:4:"icon";s:11:"f/flash.gif";}i:292;O:8:"stdClass":7:{s:2:"cm";i:292;s:3:"mod";s:8:"resource";s:7:"section";s:1:"5";s:4:"name";s:17:"5.+10+better+ways";s:7:"visible";s:1:"1";s:5:"extra";s:306:"onclick%3D%22this.target%3D%27resource173%27%3B+return+openpopup%28%27%2Fmod%2Fresource%2Fview.php%3Finpopup%3Dtrue%26amp%3Bid%3D292%27%2C%27resource173%27%2C%27resizable%3D1%2Cscrollbars%3D1%2Cdirectories%3D1%2Clocation%3D1%2Cmenubar%3D1%2Ctoolbar%3D1%2Cstatus%3D1%2Cwidth%3D620%2Cheight%3D450%27%29%3B%22";s:4:"icon";s:11:"f/flash.gif";}}', 5, 'อาจารย์', 'อาจารย์', 'นักเรียน', 'นักเรียน', 0, 1244912400, 0, 9, 5, 83886080, 0, 1, 0, 0, 0, '', 'oceanblue', '', 'USD', 1243320445, 1243570679, 0, 0, 0, 0, 864000, 1, 1, 0, 0, '', 0);
INSERT INTO `tt_course` VALUES (14, 2, 3009, '', 'PHPN 634 Community Mental Health Nursing', 'PHPN 634', '', '<p style="text-justify: inter-cluster; text-align: justify; margin: 0in 0in 0pt" class="MsoNormal"><font color="#3300ff"><span style="font-family: " lang="TH"><img class="icon" onclick="function onclick() { function onclick() { function onclick() { function onclick() { insert(''http://10.13.2.2/moodle/theme/EduMoodle_V2/pix/s/approve.gif'',''เห็นด้วย'') } } } }" alt="เห็นด้วย" src="http://10.13.2.2/moodle/theme/EduMoodle_V2/pix/s/approve.gif" />แนวคิด ทฤษฎี และปัจจัยที่เกี่ยวข้องกับการพยาบาลสุขภาพจิตชุมชน บทบาทของพยาบาลสาธารณสุขในการพยาบาลสุขภาพจิตชุมชน การประเมินและวินิจฉัยสภาวะสุขภาพจิตชุมชน <span style="mso-spacerun: yes">     </span>การวางแผน การบริการและการแนะแนวให้คำปรึกษาด้านสุขภาพจิต การประเมินผลการให้บริการสุขภาพจิตในชุมชนการป้องกันและการส่งเสริมสุขภาพจิตชุมชน<span style="mso-spacerun: yes"> </span><span style="mso-spacerun: yes">  </span>การวิเคราะห์แนวโน้มของสุขภาพจิตชุมชน</span><span style="font-family: "> </span></font></p>\r\n<p></p>\r\n<p></p>\r\n<p></p>\r\n<p></p>\r\n<div class="buttonActive button buttonHover" title="แทรกไอคอน"><img style="width: 18px; height: 18px" src="http://10.13.2.2/moodle/lib/editor/htmlarea/images/em.icon.smile.gif" width="18" height="18" /></div>\r\n<div class="buttonActive button buttonHover" title="แทรกไอคอน"></div>', 'topics', 1, 'a:11:{i:51;O:8:"stdClass":7:{s:2:"cm";i:51;s:3:"mod";s:8:"resource";s:7:"section";s:1:"0";s:4:"name";s:72:"%E0%B8%9B%E0%B8%90%E0%B8%A1%E0%B8%99%E0%B8%B4%E0%B9%80%E0%B8%97%E0%B8%A8";s:7:"visible";s:1:"1";s:5:"extra";s:0:"";s:4:"icon";s:16:"f/powerpoint.gif";}i:15;O:8:"stdClass":6:{s:2:"cm";i:15;s:3:"mod";s:5:"forum";s:7:"section";s:1:"0";s:4:"name";s:10:"News+forum";s:7:"visible";s:1:"1";s:5:"extra";s:0:"";}i:303;O:8:"stdClass":7:{s:2:"cm";i:303;s:3:"mod";s:8:"resource";s:7:"section";s:1:"0";s:4:"name";s:16:"Introduction+swf";s:7:"visible";s:1:"1";s:5:"extra";s:0:"";s:4:"icon";s:11:"f/flash.gif";}i:70;O:8:"stdClass":7:{s:2:"cm";i:70;s:3:"mod";s:8:"resource";s:7:"section";s:1:"1";s:4:"name";s:24:"community+mental+health1";s:7:"visible";s:1:"1";s:5:"extra";s:0:"";s:4:"icon";s:16:"f/powerpoint.gif";}i:133;O:8:"stdClass":7:{s:2:"cm";i:133;s:3:"mod";s:8:"resource";s:7:"section";s:1:"2";s:4:"name";s:10:"Statistics";s:7:"visible";s:1:"1";s:5:"extra";s:306:"onclick%3D%22this.target%3D%27resource107%27%3B+return+openpopup%28%27%2Fmod%2Fresource%2Fview.php%3Finpopup%3Dtrue%26amp%3Bid%3D133%27%2C%27resource107%27%2C%27resizable%3D1%2Cscrollbars%3D1%2Cdirectories%3D1%2Clocation%3D1%2Cmenubar%3D1%2Ctoolbar%3D1%2Cstatus%3D1%2Cwidth%3D620%2Cheight%3D450%27%29%3B%22";s:4:"icon";s:9:"f/web.gif";}i:138;O:8:"stdClass":7:{s:2:"cm";i:138;s:3:"mod";s:8:"resource";s:7:"section";s:1:"2";s:4:"name";s:5:"music";s:7:"visible";s:1:"1";s:5:"extra";s:0:"";s:4:"icon";s:9:"f/web.gif";}i:141;O:8:"stdClass":6:{s:2:"cm";i:141;s:3:"mod";s:4:"chat";s:7:"section";s:1:"2";s:4:"name";s:13:"talk+together";s:7:"visible";s:1:"1";s:5:"extra";s:0:"";}i:150;O:8:"stdClass":6:{s:2:"cm";i:150;s:3:"mod";s:5:"forum";s:7:"section";s:1:"2";s:4:"name";s:20:"Question%3F%3F%3F%3F";s:7:"visible";s:1:"1";s:5:"extra";s:0:"";}i:163;O:8:"stdClass":6:{s:2:"cm";i:163;s:3:"mod";s:4:"quiz";s:7:"section";s:1:"2";s:4:"name";s:101:"%E0%B9%81%E0%B8%9A%E0%B8%9A%E0%B8%97%E0%B8%94%E0%B8%AA%E0%B8%AD%E0%B8%9A%E0%B8%97%E0%B8%B5%E0%B9%88+1";s:7:"visible";s:1:"1";s:5:"extra";s:0:"";}i:222;O:8:"stdClass":6:{s:2:"cm";i:222;s:3:"mod";s:6:"choice";s:7:"section";s:1:"2";s:4:"name";s:200:"%E0%B8%84%E0%B8%A7%E0%B8%B2%E0%B8%A1%E0%B8%9E%E0%B8%B6%E0%B8%87%E0%B8%9E%E0%B8%AD%E0%B9%83%E0%B8%88%E0%B9%83%E0%B8%99%E0%B8%81%E0%B8%B2%E0%B8%A3%E0%B9%80%E0%B8%A3%E0%B8%B5%E0%B8%A2%E0%B8%99+e-learning";s:7:"visible";s:1:"1";s:5:"extra";s:0:"";}i:235;O:8:"stdClass":6:{s:2:"cm";i:235;s:3:"mod";s:5:"forum";s:7:"section";s:1:"2";s:4:"name";s:137:"%E0%B8%84%E0%B8%B3%E0%B8%96%E0%B8%B2%E0%B8%A1%E0%B8%AA%E0%B8%B1%E0%B8%9B%E0%B8%94%E0%B8%B2%E0%B8%AB%E0%B9%8C%E0%B8%97%E0%B8%B5%E0%B9%88+1";s:7:"visible";s:1:"1";s:5:"extra";s:0:"";}}', 5, 'อาจารย์', 'อาจารย์', 'นักเรียน', 'นักเรียน', 0, 1243357200, 0, 10, 0, 83886080, 0, 1, 0, 0, 0, '', 'wood', '', 'USD', 1243320518, 1243478371, 0, 0, 0, 0, 864000, 0, 1, 0, 0, '', 0);
INSERT INTO `tt_course` VALUES (15, 2, 3008, '', 'PHPN607 Health Promotion and Disease Prevention in Community', 'HP', 'PHPN607', '<p style="margin: 0in 0in 0pt" class="MsoBodyTextIndent"><span style="font-size: 14pt; mso-hansi-font-family: ''browallia new''"><font face="verdana,arial,helvetica,sans-serif"><font size="2"> </font></font></span> </p>\r\n<p></p>\r\n<p></p>\r\n<p></p>\r\n<p style="text-indent: 0.5in; margin: 0in 0in 0pt" class="MsoNormal"><font size="4"><font face="arial,helvetica,sans-serif"><span style="font-family: " lang="TH">หลักการ แนวคิดทฤษฎี เกี่ยวกับการส่งเสริมสุขภาพและการป้องกันโรค ปัจจัยที่มีอิทธิพลต่อการส่งเสริมสุขภาพและการป้องกันโรค <span style="mso-spacerun: yes"> </span>กลยุทธ์ในการส่งเสริมสุขภาพและการป้องกันโรค ทักษะของพยาบาลสาธารณสุขในการการส่งเสริมสุขภาพและการป้องกันโรค และการวิเคราะห์แนวโน้มการส่งเสริมสุขภาพและป้องกันโรค</span><b><span style="font-size: 16pt; mso-bidi-font-family: angsanaupc"> </span></b></font></font> \r\n  <p></p> \r\n  <p style="margin: 0in 0in 0pt" class="MsoBodyTextIndent"></p></p>\r\n<p></p>', 'topics', 1, 'a:17:{i:113;O:8:"stdClass":7:{s:2:"cm";i:113;s:3:"mod";s:8:"resource";s:7:"section";s:1:"0";s:4:"name";s:135:"%E0%B9%80%E0%B8%84%E0%B9%89%E0%B8%B2%E0%B9%82%E0%B8%84%E0%B8%A3%E0%B8%87%E0%B8%A3%E0%B8%B2%E0%B8%A2%E0%B8%A7%E0%B8%B4%E0%B8%8A%E0%B8%B2";s:7:"visible";s:1:"1";s:5:"extra";s:0:"";s:4:"icon";s:9:"f/pdf.gif";}i:255;O:8:"stdClass":7:{s:2:"cm";i:255;s:3:"mod";s:8:"resource";s:7:"section";s:1:"0";s:4:"name";s:50:"Unit+I+Health+Concept+and+Determinations+of+Health";s:7:"visible";s:1:"1";s:5:"extra";s:0:"";s:4:"icon";s:9:"f/pdf.gif";}i:256;O:8:"stdClass":7:{s:2:"cm";i:256;s:3:"mod";s:8:"resource";s:7:"section";s:1:"0";s:4:"name";s:87:"Unit+II+Application+of+Concepts+and+Theories+in+Health+promotion+and+Disease+Prevention";s:7:"visible";s:1:"1";s:5:"extra";s:0:"";s:4:"icon";s:9:"f/pdf.gif";}i:257;O:8:"stdClass":7:{s:2:"cm";i:257;s:3:"mod";s:8:"resource";s:7:"section";s:1:"0";s:4:"name";s:48:"Unit+III+Health+Promotion+Strategies+and+Methods";s:7:"visible";s:1:"1";s:5:"extra";s:0:"";s:4:"icon";s:9:"f/pdf.gif";}i:258;O:8:"stdClass":7:{s:2:"cm";i:258;s:3:"mod";s:8:"resource";s:7:"section";s:1:"0";s:4:"name";s:61:"Unit+IV+Principles+of+Health+Promotion+and+Disease+prevention";s:7:"visible";s:1:"1";s:5:"extra";s:0:"";s:4:"icon";s:9:"f/pdf.gif";}i:259;O:8:"stdClass":7:{s:2:"cm";i:259;s:3:"mod";s:8:"resource";s:7:"section";s:1:"0";s:4:"name";s:56:"Unit+V+Issues+and+Trends+of+Health+promotion+in+Thailand";s:7:"visible";s:1:"1";s:5:"extra";s:0:"";s:4:"icon";s:9:"f/pdf.gif";}i:118;O:8:"stdClass":6:{s:2:"cm";i:118;s:3:"mod";s:5:"forum";s:7:"section";s:1:"0";s:4:"name";s:90:"%E0%B8%81%E0%B8%A3%E0%B8%B0%E0%B8%94%E0%B8%B2%E0%B8%99%E0%B8%82%E0%B9%88%E0%B8%B2%E0%B8%A7";s:7:"visible";s:1:"1";s:5:"extra";s:0:"";}i:285;O:8:"stdClass":6:{s:2:"cm";i:285;s:3:"mod";s:5:"label";s:7:"section";s:1:"1";s:4:"name";s:19:"Reading+Assignments";s:7:"visible";s:1:"1";s:5:"extra";s:125:"%3Cp%3E%3Cfont+color%3D%22%230000ff%22+size%3D%224%22%3E%3Cstrong%3EReading+Assignments%3C%2Fstrong%3E%3C%2Ffont%3E%3C%2Fp%3E";}i:271;O:8:"stdClass":7:{s:2:"cm";i:271;s:3:"mod";s:8:"resource";s:7:"section";s:1:"1";s:4:"name";s:19:"Reading+AssignmentI";s:7:"visible";s:1:"1";s:5:"extra";s:0:"";s:4:"icon";s:9:"f/pdf.gif";}i:275;O:8:"stdClass":7:{s:2:"cm";i:275;s:3:"mod";s:8:"resource";s:7:"section";s:1:"1";s:4:"name";s:20:"Reading+AssignmentII";s:7:"visible";s:1:"1";s:5:"extra";s:0:"";s:4:"icon";s:9:"f/pdf.gif";}i:287;O:8:"stdClass":6:{s:2:"cm";i:287;s:3:"mod";s:8:"feedback";s:7:"section";s:1:"1";s:4:"name";s:7:"ghksdgh";s:7:"visible";s:1:"1";s:5:"extra";s:0:"";}i:288;O:8:"stdClass":6:{s:2:"cm";i:288;s:3:"mod";s:5:"label";s:7:"section";s:1:"1";s:4:"name";s:11:"Assigments+";s:7:"visible";s:1:"1";s:5:"extra";s:123:"%3Cfont+size%3D%224%22%3E%3Cstrong%3E%3Cfont+color%3D%22%230000ff%22%3EAssigments%3C%2Ffont%3E+%3C%2Fstrong%3E%3C%2Ffont%3E";}i:248;O:8:"stdClass":6:{s:2:"cm";i:248;s:3:"mod";s:10:"assignment";s:7:"section";s:1:"1";s:4:"name";s:11:"AssignmentI";s:7:"visible";s:1:"1";s:5:"extra";s:0:"";}i:289;O:8:"stdClass":6:{s:2:"cm";i:289;s:3:"mod";s:10:"assignment";s:7:"section";s:1:"1";s:4:"name";s:12:"AssignmentII";s:7:"visible";s:1:"1";s:5:"extra";s:0:"";}i:298;O:8:"stdClass":6:{s:2:"cm";i:298;s:3:"mod";s:5:"label";s:7:"section";s:1:"1";s:4:"name";s:20:"Reading+Requirements";s:7:"visible";s:1:"1";s:5:"extra";s:109:"%3Cfont+color%3D%22%230000ff%22+size%3D%224%22%3E%3Cstrong%3EReading+Requirements%3C%2Fstrong%3E%3C%2Ffont%3E";}i:297;O:8:"stdClass":7:{s:2:"cm";i:297;s:3:"mod";s:8:"resource";s:7:"section";s:1:"1";s:4:"name";s:20:"Reading+RequirementI";s:7:"visible";s:1:"1";s:5:"extra";s:0:"";s:4:"icon";s:11:"f/flash.gif";}i:304;O:8:"stdClass":7:{s:2:"cm";i:304;s:3:"mod";s:8:"resource";s:7:"section";s:1:"1";s:4:"name";s:21:"Reading+requirementII";s:7:"visible";s:1:"1";s:5:"extra";s:0:"";s:4:"icon";s:11:"f/flash.gif";}}', 5, 'อาจารย์', 'อาจารย์', 'นักเรียน', 'นักเรียน', 0, 1243789200, 0, 5, 0, 83886080, 0, 1, 1, 0, 0, '', 'standardblue', '', 'USD', 1243320557, 1243568367, 0, 0, 0, 0, 864000, 0, 1, 0, 0, '', 0);
INSERT INTO `tt_course` VALUES (16, 2, 3007, '', 'PHPN 602 Research Methodology in Public Health Nursing', 'PHPN 602', 'PHPN 602', '<p>Application of research findings to nursing and health situation. The research process, especially, problem formulation, research designs, development of data collection instrument, data analysis , and interpretation. Reporting of research results will be emphasized. </p>', 'topics', 1, 'a:4:{i:4;O:8:"stdClass":6:{s:2:"cm";i:4;s:3:"mod";s:5:"forum";s:7:"section";s:1:"0";s:4:"name";s:90:"%E0%B8%81%E0%B8%A3%E0%B8%B0%E0%B8%94%E0%B8%B2%E0%B8%99%E0%B8%82%E0%B9%88%E0%B8%B2%E0%B8%A7";s:7:"visible";s:1:"1";s:5:"extra";s:0:"";}i:69;O:8:"stdClass":7:{s:2:"cm";i:69;s:3:"mod";s:8:"resource";s:7:"section";s:1:"0";s:4:"name";s:15:"Course+Syllabus";s:7:"visible";s:1:"1";s:5:"extra";s:0:"";s:4:"icon";s:9:"f/web.gif";}i:90;O:8:"stdClass":6:{s:2:"cm";i:90;s:3:"mod";s:8:"resource";s:7:"section";s:1:"0";s:4:"name";s:24:"Course+Syllabus+PHPN+602";s:7:"visible";s:1:"1";s:5:"extra";s:0:"";}i:103;O:8:"stdClass":7:{s:2:"cm";i:103;s:3:"mod";s:8:"resource";s:7:"section";s:1:"1";s:4:"name";s:16:"Research+Process";s:7:"visible";s:1:"1";s:5:"extra";s:0:"";s:4:"icon";s:9:"f/pdf.gif";}}', 5, 'อาจารย์', 'อาจารย์', 'นักเรียน', 'นักเรียน', 0, 1244221200, 0, 6, 0, 83886080, 0, 1, 0, 0, 0, '', 'standardred', '', 'USD', 1243320615, 1243414263, 0, 0, 0, 0, 864000, 0, 1, 0, 0, '', 0);
INSERT INTO `tt_course` VALUES (17, 2, 3006, '', 'PHPN 646 Instrumental Development in Public Health Nursing Research and Education', 'PHPN 646', 'PHPN 646', '<p><img title="ยักคิ้ว" alt="ยักคิ้ว" src="http://10.13.2.2/moodle/theme/EduMoodle_V2/pix/s/wink.gif" /> ทฤษฎีการวัด แนวคิดหลักของวิธีการวัดแบบอิงกลุ่มและการวัดแบบอิงเกณฑ์ หลักการสร้างเครื่องมือวัด และการประเมินคุณภาพที่สำคัญของการวัดทางจิตวิทยาของเครื่องมือวัดแบบอิงกลุ่มและอิงเกณฑ์ ประกอบด้วย การวัดทางสรีรภาพและการสังเกต การสัมภาษณ์ แบบสอบถาม มาตรวัด และแบบทดสอบ ที่นำมาใช้ในการวิจัยและการศึกษาพยาบาลสาธารณสุขและที่เกี่ยวข้องกับสุขภาพ </p>', 'topics', 1, 'a:12:{i:154;O:8:"stdClass":7:{s:2:"cm";i:154;s:3:"mod";s:8:"resource";s:7:"section";s:1:"0";s:4:"name";s:72:"%E0%B8%95%E0%B8%B2%E0%B8%A3%E0%B8%B2%E0%B8%87%E0%B8%AA%E0%B8%AD%E0%B8%99";s:7:"visible";s:1:"1";s:5:"extra";s:306:"onclick%3D%22this.target%3D%27resource125%27%3B+return+openpopup%28%27%2Fmod%2Fresource%2Fview.php%3Finpopup%3Dtrue%26amp%3Bid%3D154%27%2C%27resource125%27%2C%27resizable%3D1%2Cscrollbars%3D1%2Cdirectories%3D1%2Clocation%3D1%2Cmenubar%3D1%2Ctoolbar%3D1%2Cstatus%3D1%2Cwidth%3D620%2Cheight%3D450%27%29%3B%22";s:4:"icon";s:9:"f/pdf.gif";}i:173;O:8:"stdClass":7:{s:2:"cm";i:173;s:3:"mod";s:8:"resource";s:7:"section";s:1:"0";s:4:"name";s:5:"Video";s:7:"visible";s:1:"1";s:5:"extra";s:306:"onclick%3D%22this.target%3D%27resource130%27%3B+return+openpopup%28%27%2Fmod%2Fresource%2Fview.php%3Finpopup%3Dtrue%26amp%3Bid%3D173%27%2C%27resource130%27%2C%27resizable%3D1%2Cscrollbars%3D1%2Cdirectories%3D1%2Clocation%3D1%2Cmenubar%3D1%2Ctoolbar%3D1%2Cstatus%3D1%2Cwidth%3D620%2Cheight%3D450%27%29%3B%22";s:4:"icon";s:9:"f/avi.gif";}i:192;O:8:"stdClass":6:{s:2:"cm";i:192;s:3:"mod";s:5:"forum";s:7:"section";s:1:"0";s:4:"name";s:90:"%E0%B8%81%E0%B8%A3%E0%B8%B0%E0%B8%94%E0%B8%B2%E0%B8%99%E0%B8%82%E0%B9%88%E0%B8%B2%E0%B8%A7";s:7:"visible";s:1:"1";s:5:"extra";s:0:"";}i:207;O:8:"stdClass":6:{s:2:"cm";i:207;s:3:"mod";s:6:"survey";s:7:"section";s:1:"0";s:4:"name";s:81:"%E0%B9%81%E0%B8%9A%E0%B8%9A%E0%B8%AA%E0%B8%AD%E0%B8%9A%E0%B8%96%E0%B8%B2%E0%B8%A1";s:7:"visible";s:1:"1";s:5:"extra";s:0:"";}i:116;O:8:"stdClass":6:{s:2:"cm";i:116;s:3:"mod";s:8:"resource";s:7:"section";s:1:"1";s:4:"name";s:8:"module+1";s:7:"visible";s:1:"1";s:5:"extra";s:0:"";}i:164;O:8:"stdClass":7:{s:2:"cm";i:164;s:3:"mod";s:8:"resource";s:7:"section";s:1:"1";s:4:"name";s:26:"slide+1+measurementconcept";s:7:"visible";s:1:"1";s:5:"extra";s:306:"onclick%3D%22this.target%3D%27resource127%27%3B+return+openpopup%28%27%2Fmod%2Fresource%2Fview.php%3Finpopup%3Dtrue%26amp%3Bid%3D164%27%2C%27resource127%27%2C%27resizable%3D1%2Cscrollbars%3D1%2Cdirectories%3D1%2Clocation%3D1%2Cmenubar%3D1%2Ctoolbar%3D1%2Cstatus%3D1%2Cwidth%3D620%2Cheight%3D450%27%29%3B%22";s:4:"icon";s:9:"f/pdf.gif";}i:169;O:8:"stdClass":6:{s:2:"cm";i:169;s:3:"mod";s:4:"quiz";s:7:"section";s:1:"1";s:4:"name";s:7:"pretest";s:7:"visible";s:1:"1";s:5:"extra";s:0:"";}i:194;O:8:"stdClass":6:{s:2:"cm";i:194;s:3:"mod";s:10:"flashvideo";s:7:"section";s:1:"1";s:4:"name";s:81:"%E0%B8%81%E0%B8%B2%E0%B8%A3%E0%B8%9D%E0%B8%B6%E0%B8%81%E0%B8%87%E0%B8%B2%E0%B8%99";s:7:"visible";s:1:"1";s:5:"extra";s:0:"";}i:204;O:8:"stdClass":6:{s:2:"cm";i:204;s:3:"mod";s:6:"survey";s:7:"section";s:1:"1";s:4:"name";s:81:"%E0%B9%81%E0%B8%9A%E0%B8%9A%E0%B8%AA%E0%B8%AD%E0%B8%9A%E0%B8%96%E0%B8%B2%E0%B8%A1";s:7:"visible";s:1:"1";s:5:"extra";s:0:"";}i:212;O:8:"stdClass":6:{s:2:"cm";i:212;s:3:"mod";s:8:"feedback";s:7:"section";s:1:"1";s:4:"name";s:171:"%E0%B9%81%E0%B8%9A%E0%B8%9A%E0%B8%AA%E0%B8%B3%E0%B8%A3%E0%B8%A7%E0%B8%88%E0%B8%84%E0%B8%A7%E0%B8%B2%E0%B8%A1%E0%B8%9E%E0%B8%B6%E0%B8%87%E0%B8%9E%E0%B8%AD%E0%B9%83%E0%B8%88";s:7:"visible";s:1:"1";s:5:"extra";s:0:"";}i:227;O:8:"stdClass":6:{s:2:"cm";i:227;s:3:"mod";s:4:"chat";s:7:"section";s:1:"1";s:4:"name";s:351:"%E0%B8%AB%E0%B9%89%E0%B8%AD%E0%B8%87%E0%B9%81%E0%B8%A5%E0%B8%81%E0%B9%80%E0%B8%9B%E0%B8%A5%E0%B8%B5%E0%B9%88%E0%B8%A2%E0%B8%99%E0%B8%84%E0%B8%A7%E0%B8%B2%E0%B8%A1%E0%B8%84%E0%B8%B4%E0%B8%94%E0%B9%80%E0%B8%AB%E0%B9%87%E0%B8%99%E0%B8%9A%E0%B8%97%E0%B8%84%E0%B8%A7%E0%B8%B2%E0%B8%A1%E0%B8%97%E0%B8%B5%E0%B9%88%E0%B8%81%E0%B8%B3%E0%B8%AB%E0%B8%99%E0%B8%94";s:7:"visible";s:1:"1";s:5:"extra";s:0:"";}i:231;O:8:"stdClass":6:{s:2:"cm";i:231;s:3:"mod";s:5:"forum";s:7:"section";s:1:"1";s:4:"name";s:235:"%E0%B8%81%E0%B8%A3%E0%B8%B0%E0%B8%94%E0%B8%B2%E0%B8%99%E0%B8%84%E0%B8%B3%E0%B8%96%E0%B8%B2%E0%B8%A1+%E0%B9%81%E0%B8%A5%E0%B8%B0%E0%B9%81%E0%B8%AA%E0%B8%94%E0%B8%87%E0%B8%84%E0%B8%A7%E0%B8%B2%E0%B8%A1%E0%B9%80%E0%B8%AB%E0%B9%87%E0%B8%99";s:7:"visible";s:1:"1";s:5:"extra";s:0:"";}}', 5, 'อาจารย์', 'อาจารย์', 'นักเรียน', 'นักเรียน', 0, 1243357200, 0, 4, 0, 83886080, 0, 1, 0, 0, 0, '', 'standardblue', '', 'USD', 1243320688, 1243488016, 0, 0, 0, 0, 864000, 0, 1, 0, 0, '', 0);
INSERT INTO `tt_course` VALUES (18, 2, 3005, '', 'PHFH 601 Principle of Reproductive Health', 'Principle of RH', 'PHFH 601 ', 'คำอธิบายรายวิชา ความสำคัญและ แนวโน้มปัญหาอนามัยการเจริญพันธุ์ การดูแลสุขภาพอนามัยการเจริญพันธุ์ งานอนามัยการเจริญพันธุ์ขั้นมูลฐาน การเจริญเติบโตทั้งร่างกาย จิตใจ สังคม และจิตวิญญาน ตลอดวงจรชีวิต ประเมินปัจจัยและผลกระทบของการเปลี่ยนแปลง ด้านเศรษฐกิจ สังคม สิ่งแวดล้อม การป้องกันปัญหาอนามัยการเจริญพันธุ์ บทบาทเจ้าหน้าที่สาธารณสุขต่องานอนามัยการเจริญพันธุ์ ', 'topics', 1, 'a:11:{i:16;O:8:"stdClass":6:{s:2:"cm";i:16;s:3:"mod";s:5:"forum";s:7:"section";s:1:"0";s:4:"name";s:10:"News+forum";s:7:"visible";s:1:"1";s:5:"extra";s:0:"";}i:36;O:8:"stdClass":7:{s:2:"cm";i:36;s:3:"mod";s:8:"resource";s:7:"section";s:1:"0";s:4:"name";s:63:"%E0%B8%9A%E0%B8%97%E0%B9%80%E0%B8%A3%E0%B8%B5%E0%B8%A2%E0%B8%99";s:7:"visible";s:1:"1";s:5:"extra";s:0:"";s:4:"icon";s:11:"f/image.gif";}i:225;O:8:"stdClass":6:{s:2:"cm";i:225;s:3:"mod";s:4:"chat";s:7:"section";s:1:"0";s:4:"name";s:90:"%E0%B8%AB%E0%B9%89%E0%B8%AD%E0%B8%87%E0%B8%AA%E0%B8%9A%E0%B8%B2%E0%B8%A2%E0%B9%83%E0%B8%88";s:7:"visible";s:1:"1";s:5:"extra";s:0:"";}i:232;O:8:"stdClass":6:{s:2:"cm";i:232;s:3:"mod";s:5:"forum";s:7:"section";s:1:"0";s:4:"name";s:108:"%E0%B9%80%E0%B8%A3%E0%B8%B5%E0%B8%A2%E0%B8%99%E0%B9%83%E0%B8%AB%E0%B9%89%E0%B8%AA%E0%B8%99%E0%B8%B8%E0%B8%81";s:7:"visible";s:1:"1";s:5:"extra";s:0:"";}i:249;O:8:"stdClass":6:{s:2:"cm";i:249;s:3:"mod";s:10:"assignment";s:7:"section";s:1:"0";s:4:"name";s:351:"%E0%B8%88%E0%B8%87%E0%B8%AD%E0%B8%98%E0%B8%B4%E0%B8%9A%E0%B8%B2%E0%B8%A2%E0%B8%84%E0%B8%A7%E0%B8%B2%E0%B8%A1%E0%B8%AB%E0%B8%A1%E0%B8%B2%E0%B8%A2%E0%B8%82%E0%B8%AD%E0%B8%87%E0%B8%AD%E0%B8%99%E0%B8%B2%E0%B8%A1%E0%B8%B1%E0%B8%A2%E0%B8%81%E0%B8%B2%E0%B8%A3%E0%B9%80%E0%B8%88%E0%B8%A3%E0%B8%B4%E0%B8%8D%E0%B8%9E%E0%B8%B1%E0%B8%99%E0%B8%98%E0%B8%B8%E0%B9%8C";s:7:"visible";s:1:"1";s:5:"extra";s:0:"";}i:250;O:8:"stdClass":6:{s:2:"cm";i:250;s:3:"mod";s:10:"assignment";s:7:"section";s:1:"0";s:4:"name";s:460:"%E0%B8%84%E0%B8%A7%E0%B8%B2%E0%B8%A1%E0%B8%AB%E0%B8%A1%E0%B8%B2%E0%B8%A2%E0%B8%82%E0%B8%AD%E0%B8%87%E0%B8%AD%E0%B8%99%E0%B8%B2%E0%B8%A1%E0%B8%B1%E0%B8%A2%E0%B8%81%E0%B8%B2%E0%B8%A3%E0%B9%80%E0%B8%88%E0%B8%A3%E0%B8%B4%E0%B8%8D%E0%B8%9E%E0%B8%B1%E0%B8%99%E0%B8%98%E0%B8%B8%E0%B9%8C+%E0%B9%81%E0%B8%A5%E0%B8%B0%E0%B8%81%E0%B8%B2%E0%B8%A3%E0%B8%AA%E0%B9%88%E0%B8%87%E0%B9%80%E0%B8%AA%E0%B8%A3%E0%B8%B4%E0%B8%A1%E0%B8%AA%E0%B8%B8%E0%B8%82%E0%B8%A0%E0%B8%B2%E0%B8%9E";s:7:"visible";s:1:"1";s:5:"extra";s:0:"";}i:135;O:8:"stdClass":7:{s:2:"cm";i:135;s:3:"mod";s:8:"resource";s:7:"section";s:1:"1";s:4:"name";s:2:"ph";s:7:"visible";s:1:"1";s:5:"extra";s:306:"onclick%3D%22this.target%3D%27resource109%27%3B+return+openpopup%28%27%2Fmod%2Fresource%2Fview.php%3Finpopup%3Dtrue%26amp%3Bid%3D135%27%2C%27resource109%27%2C%27resizable%3D1%2Cscrollbars%3D1%2Cdirectories%3D1%2Clocation%3D1%2Cmenubar%3D1%2Ctoolbar%3D1%2Cstatus%3D1%2Cwidth%3D620%2Cheight%3D450%27%29%3B%22";s:4:"icon";s:11:"f/image.gif";}i:211;O:8:"stdClass":6:{s:2:"cm";i:211;s:3:"mod";s:8:"feedback";s:7:"section";s:1:"1";s:4:"name";s:99:"%E0%B8%84%E0%B8%A7%E0%B8%B2%E0%B8%A1%E0%B8%9E%E0%B8%B6%E0%B8%87%E0%B8%9E%E0%B8%AD%E0%B9%83%E0%B8%88";s:7:"visible";s:1:"1";s:5:"extra";s:0:"";}i:156;O:8:"stdClass":6:{s:2:"cm";i:156;s:3:"mod";s:4:"quiz";s:7:"section";s:1:"2";s:4:"name";s:232:"%E0%B8%81%E0%B8%B2%E0%B8%A3%E0%B8%97%E0%B8%94%E0%B8%AA%E0%B8%AD%E0%B8%9A%E0%B8%81%E0%B9%88%E0%B8%AD%E0%B8%99%E0%B9%80%E0%B8%A3%E0%B8%B5%E0%B8%A2%E0%B8%99+RH1+%E0%B8%84%E0%B8%A3%E0%B8%B1%E0%B9%89%E0%B8%87%E0%B8%97%E0%B8%B5%E0%B9%88+1";s:7:"visible";s:1:"1";s:5:"extra";s:0:"";}i:159;O:8:"stdClass":6:{s:2:"cm";i:159;s:3:"mod";s:4:"quiz";s:7:"section";s:1:"2";s:4:"name";s:101:"%E0%B9%81%E0%B8%9A%E0%B8%9A%E0%B8%97%E0%B8%94%E0%B8%AA%E0%B8%AD%E0%B8%9A%E0%B8%97%E0%B8%B5%E0%B9%88+1";s:7:"visible";s:1:"1";s:5:"extra";s:0:"";}i:290;O:8:"stdClass":7:{s:2:"cm";i:290;s:3:"mod";s:8:"resource";s:7:"section";s:1:"2";s:4:"name";s:2:"RH";s:7:"visible";s:1:"1";s:5:"extra";s:0:"";s:4:"icon";s:9:"f/pdf.gif";}}', 5, 'อาจารย์', 'อาจารย์', 'นักเรียน', 'นักเรียน', 0, 1243962000, 0, 15, 3, 83886080, 0, 1, 0, 0, 0, '', 'standardgreen', '', 'USD', 1243320741, 1243470558, 0, 0, 0, 0, 864000, 0, 1, 0, 0, '', 0);
INSERT INTO `tt_course` VALUES (19, 2, 3004, '', 'Phfh606 Reproductive Physiology and Fertility Regulation', 'PHFH606', 'PHFH606', '<p style="margin: 0in 0in 0pt" class="MsoNormal"><span style="font-family: " lang="TH">สศอค606 การเจริญพันธุ์ของมนุษย์<span style="mso-spacerun: yes">  </span>พัฒนาการของระบบอวัยวะสืบพันธุ์<span style="mso-spacerun: yes">  </span>ปัญหาการเจริญพันธุ์ แนวทาง<span style="mso-spacerun: yes">  </span>การดูแลปัญหาการมีบุตรยาก<span style="mso-spacerun: yes">  </span>วิธีการและความต้องการทำแท้ง โครงการวางแผนครอบครัว การคุมกำเนิดวิธีต่างๆ <span style="mso-spacerun: yes"> </span>งานวิจัยที่เกี่ยวข้องกับวิธีคุมกำเนิดที่ทันสมัย</span><span style="font-family: "> </span></p>\r\n<p></p>\r\n<p></p>\r\n<p></p>', 'weeks', 1, 'a:14:{i:17;O:8:"stdClass":6:{s:2:"cm";i:17;s:3:"mod";s:5:"forum";s:7:"section";s:1:"0";s:4:"name";s:10:"News+forum";s:7:"visible";s:1:"1";s:5:"extra";s:0:"";}i:145;O:8:"stdClass":7:{s:2:"cm";i:145;s:3:"mod";s:8:"resource";s:7:"section";s:1:"0";s:4:"name";s:10:"Time+Table";s:7:"visible";s:1:"1";s:5:"extra";s:0:"";s:4:"icon";s:9:"f/pdf.gif";}i:157;O:8:"stdClass":6:{s:2:"cm";i:157;s:3:"mod";s:4:"quiz";s:7:"section";s:1:"0";s:4:"name";s:146:"%E0%B8%81%E0%B8%B2%E0%B8%A3%E0%B8%97%E0%B8%94%E0%B8%AA%E0%B8%AD%E0%B8%9A%E0%B8%84%E0%B8%A3%E0%B8%B1%E0%B9%89%E0%B8%87%E0%B8%97%E0%B8%B5%E0%B9%88+1";s:7:"visible";s:1:"1";s:5:"extra";s:0:"";}i:210;O:8:"stdClass":6:{s:2:"cm";i:210;s:3:"mod";s:8:"feedback";s:7:"section";s:1:"0";s:4:"name";s:9:"Presurvey";s:7:"visible";s:1:"1";s:5:"extra";s:0:"";}i:229;O:8:"stdClass":6:{s:2:"cm";i:229;s:3:"mod";s:4:"chat";s:7:"section";s:1:"0";s:4:"name";s:198:"%E0%B8%AB%E0%B9%89%E0%B8%AD%E0%B8%87%E0%B9%81%E0%B8%A5%E0%B8%81%E0%B9%80%E0%B8%9B%E0%B8%A5%E0%B8%B5%E0%B9%88%E0%B8%A2%E0%B8%99%E0%B9%80%E0%B8%A3%E0%B8%B5%E0%B8%A2%E0%B8%99%E0%B8%A3%E0%B8%B9%E0%B9%89";s:7:"visible";s:1:"1";s:5:"extra";s:0:"";}i:236;O:8:"stdClass":6:{s:2:"cm";i:236;s:3:"mod";s:5:"forum";s:7:"section";s:1:"0";s:4:"name";s:198:"%E0%B8%81%E0%B8%A3%E0%B8%B0%E0%B8%94%E0%B8%B2%E0%B8%99%E0%B8%96%E0%B8%B2%E0%B8%A1%E0%B8%9B%E0%B8%B1%E0%B8%8D%E0%B8%AB%E0%B8%B2%E0%B8%81%E0%B8%B2%E0%B8%A3%E0%B9%80%E0%B8%A3%E0%B8%B5%E0%B8%A2%E0%B8%99";s:7:"visible";s:1:"1";s:5:"extra";s:0:"";}i:305;O:8:"stdClass":7:{s:2:"cm";i:305;s:3:"mod";s:8:"resource";s:7:"section";s:1:"2";s:4:"name";s:34:"Development+of+Reproductive+Organs";s:7:"visible";s:1:"1";s:5:"extra";s:0:"";s:4:"icon";s:11:"f/flash.gif";}i:171;O:8:"stdClass":7:{s:2:"cm";i:171;s:3:"mod";s:8:"resource";s:7:"section";s:1:"5";s:4:"name";s:23:"Family+Planning+Program";s:7:"visible";s:1:"1";s:5:"extra";s:0:"";s:4:"icon";s:9:"f/pdf.gif";}i:220;O:8:"stdClass":7:{s:2:"cm";i:220;s:3:"mod";s:8:"resource";s:7:"section";s:1:"5";s:4:"name";s:27:"Family+Planning+in+Thailand";s:7:"visible";s:1:"1";s:5:"extra";s:0:"";s:4:"icon";s:9:"f/pdf.gif";}i:266;O:8:"stdClass":7:{s:2:"cm";i:266;s:3:"mod";s:8:"resource";s:7:"section";s:1:"5";s:4:"name";s:15:"Family+Planning";s:7:"visible";s:1:"1";s:5:"extra";s:306:"onclick%3D%22this.target%3D%27resource155%27%3B+return+openpopup%28%27%2Fmod%2Fresource%2Fview.php%3Finpopup%3Dtrue%26amp%3Bid%3D266%27%2C%27resource155%27%2C%27resizable%3D1%2Cscrollbars%3D1%2Cdirectories%3D1%2Clocation%3D1%2Cmenubar%3D1%2Ctoolbar%3D1%2Cstatus%3D1%2Cwidth%3D620%2Cheight%3D450%27%29%3B%22";s:4:"icon";s:11:"f/flash.gif";}i:269;O:8:"stdClass":7:{s:2:"cm";i:269;s:3:"mod";s:8:"resource";s:7:"section";s:1:"5";s:4:"name";s:3:"F.P";s:7:"visible";s:1:"1";s:5:"extra";s:306:"onclick%3D%22this.target%3D%27resource156%27%3B+return+openpopup%28%27%2Fmod%2Fresource%2Fview.php%3Finpopup%3Dtrue%26amp%3Bid%3D269%27%2C%27resource156%27%2C%27resizable%3D1%2Cscrollbars%3D1%2Cdirectories%3D1%2Clocation%3D1%2Cmenubar%3D1%2Ctoolbar%3D1%2Cstatus%3D1%2Cwidth%3D620%2Cheight%3D450%27%29%3B%22";s:4:"icon";s:11:"f/flash.gif";}i:172;O:8:"stdClass":7:{s:2:"cm";i:172;s:3:"mod";s:8:"resource";s:7:"section";s:2:"10";s:4:"name";s:19:"Periodic+Abstinence";s:7:"visible";s:1:"1";s:5:"extra";s:0:"";s:4:"icon";s:9:"f/pdf.gif";}i:174;O:8:"stdClass":7:{s:2:"cm";i:174;s:3:"mod";s:8:"resource";s:7:"section";s:2:"10";s:4:"name";s:13:"Gnrh+Analogue";s:7:"visible";s:1:"1";s:5:"extra";s:0:"";s:4:"icon";s:9:"f/pdf.gif";}i:158;O:8:"stdClass":7:{s:2:"cm";i:158;s:3:"mod";s:8:"resource";s:7:"section";s:2:"12";s:4:"name";s:21:"Contraceptive+Vaccine";s:7:"visible";s:1:"1";s:5:"extra";s:0:"";s:4:"icon";s:9:"f/pdf.gif";}}', 5, 'อาจารย์', 'อาจารย์', 'นักเรียน', 'นักเรียน', 0, 1244048400, 0, 15, 0, 83886080, 0, 1, 0, 0, 0, '', 'oceanblue', '', 'USD', 1243320789, 1243478918, 0, 0, 0, 0, 864000, 0, 1, 0, 0, '', 0);
INSERT INTO `tt_course` VALUES (20, 2, 3003, '', 'PHPN 503 Mind Body Medicine: Neuro Psycho Immnology ', 'MBD:NPI ', '503', '<p>Concepts of mind body medicine and integrative medicine, Philosophy, western and eastern modalities, applications, NPI indicators and measurment, holistic health benefits and healing outcomes, and impact to individual, family, and communities.</p>', 'weeks', 1, 'a:1:{i:11;O:8:"stdClass":6:{s:2:"cm";i:11;s:3:"mod";s:5:"forum";s:7:"section";s:1:"0";s:4:"name";s:10:"News+forum";s:7:"visible";s:1:"1";s:5:"extra";s:0:"";}}', 7, 'อาจารย์', 'อาจารย์', 'นักเรียน', 'นักเรียน', 1, 1244048400, 0, 7, 0, 83886080, 1, 1, 1, 1, 1, '', '', '', 'USD', 1243320835, 1243408794, 0, 0, 0, 1, 2592000, 1, 2, 1256576400, 1256922000, '', 0);
INSERT INTO `tt_course` VALUES (21, 7, 6024, '', 'Principle of Communication', 'PHHE 414 ', 'สศสษ 414', '<p>องค์ประกอบการสื่อสาร การสื่อสารภายในบุคคล ระหว่างบุคคล จนกระทั่งถึงการสื่อสารมวลชน และสามารถนำไปประยุกต์ใช้ในงานสาธารณสุขได้</p>', 'topics', 1, 'a:5:{i:10;O:8:"stdClass":6:{s:2:"cm";i:10;s:3:"mod";s:5:"forum";s:7:"section";s:1:"0";s:4:"name";s:10:"News+forum";s:7:"visible";s:1:"1";s:5:"extra";s:0:"";}i:166;O:8:"stdClass":6:{s:2:"cm";i:166;s:3:"mod";s:4:"quiz";s:7:"section";s:1:"1";s:4:"name";s:307:"%E0%B8%81%E0%B8%B2%E0%B8%A3%E0%B8%97%E0%B8%94%E0%B8%AA%E0%B8%AD%E0%B8%9A%E0%B8%81%E0%B9%88%E0%B8%AD%E0%B8%99%E0%B8%A7%E0%B8%B4%E0%B8%8A%E0%B8%B2%E0%B8%AB%E0%B8%A5%E0%B8%B1%E0%B8%81%E0%B8%81%E0%B8%B2%E0%B8%A3%E0%B8%AA%E0%B8%B7%E0%B9%88%E0%B8%AD%E0%B8%AA%E0%B8%B2%E0%B8%A3+%E0%B8%A0%E0%B8%B2%E0%B8%84+1%2F2552";s:7:"visible";s:1:"1";s:5:"extra";s:0:"";}i:197;O:8:"stdClass":6:{s:2:"cm";i:197;s:3:"mod";s:4:"quiz";s:7:"section";s:1:"1";s:4:"name";s:72:"%E0%B9%81%E0%B8%9A%E0%B8%9A%E0%B8%97%E0%B8%94%E0%B8%AA%E0%B8%AD%E0%B8%9A";s:7:"visible";s:1:"1";s:5:"extra";s:0:"";}i:293;O:8:"stdClass":7:{s:2:"cm";i:293;s:3:"mod";s:8:"resource";s:7:"section";s:1:"2";s:4:"name";s:162:"%E0%B8%9E%E0%B8%B1%E0%B8%92%E0%B8%99%E0%B8%B2%E0%B8%81%E0%B8%B2%E0%B8%A3%E0%B8%81%E0%B8%B2%E0%B8%A3%E0%B8%AA%E0%B8%B7%E0%B9%88%E0%B8%AD%E0%B8%AA%E0%B8%B2%E0%B8%A3";s:7:"visible";s:1:"1";s:5:"extra";s:0:"";s:4:"icon";s:11:"f/flash.gif";}i:299;O:8:"stdClass":7:{s:2:"cm";i:299;s:3:"mod";s:8:"resource";s:7:"section";s:1:"2";s:4:"name";s:162:"%E0%B8%9E%E0%B8%B1%E0%B8%92%E0%B8%99%E0%B8%B2%E0%B8%81%E0%B8%B2%E0%B8%A3%E0%B8%81%E0%B8%B2%E0%B8%A3%E0%B8%AA%E0%B8%B7%E0%B9%88%E0%B8%AD%E0%B8%AA%E0%B8%B2%E0%B8%A3";s:7:"visible";s:1:"1";s:5:"extra";s:0:"";s:4:"icon";s:11:"f/flash.gif";}}', 5, 'อาจารย์', 'อาจารย์', 'นักเรียน', 'นักเรียน', 0, 1243875600, 0, 14, 0, 83886080, 0, 1, 0, 0, 0, '', 'metal', '', 'USD', 1243320995, 1243565842, 0, 0, 0, 0, 864000, 0, 1, 0, 0, '', 0);
INSERT INTO `tt_course` VALUES (22, 5, 5022, '', 'PHEH 419 Principle of Food Safety', 'Food Safety', 'PHEH 419', '<p style="text-align: justify; margin: 0in 0in 0pt" class="MsoNormal"><span style="font-family: ">Introduction to toxicity of food and nutrient that effect to consumer health, food toxicology, contamination and adulteration of hazard food additive, hygiene in food processing, hygiene and personal hygiene of food handler, sanitation of food industry, development of food sanitation program. Good Manufacturing Practice (GMP), hazard analysis and critical control point (HACCP), including regulation and standard of food. </span> \r\n  <p></p></p>\r\n<p></p>', 'topics', 1, 'a:17:{i:12;O:8:"stdClass":6:{s:2:"cm";i:12;s:3:"mod";s:5:"forum";s:7:"section";s:1:"0";s:4:"name";s:10:"News+forum";s:7:"visible";s:1:"1";s:5:"extra";s:0:"";}i:168;O:8:"stdClass":6:{s:2:"cm";i:168;s:3:"mod";s:4:"quiz";s:7:"section";s:1:"0";s:4:"name";s:72:"%E0%B9%81%E0%B8%9A%E0%B8%9A%E0%B8%97%E0%B8%94%E0%B8%AA%E0%B8%AD%E0%B8%9A";s:7:"visible";s:1:"1";s:5:"extra";s:0:"";}i:183;O:8:"stdClass":6:{s:2:"cm";i:183;s:3:"mod";s:4:"quiz";s:7:"section";s:1:"0";s:4:"name";s:7:"Env+Bio";s:7:"visible";s:1:"1";s:5:"extra";s:0:"";}i:219;O:8:"stdClass":6:{s:2:"cm";i:219;s:3:"mod";s:8:"feedback";s:7:"section";s:1:"0";s:4:"name";s:135:"%E0%B8%A7%E0%B8%B4%E0%B8%99%E0%B8%B1%E0%B8%A2%E0%B8%97%E0%B8%B2%E0%B8%87%E0%B8%81%E0%B8%B2%E0%B8%A3%E0%B9%80%E0%B8%87%E0%B8%B4%E0%B8%99";s:7:"visible";s:1:"1";s:5:"extra";s:0:"";}i:224;O:8:"stdClass":6:{s:2:"cm";i:224;s:3:"mod";s:4:"chat";s:7:"section";s:1:"0";s:4:"name";s:7:"Env+Bio";s:7:"visible";s:1:"1";s:5:"extra";s:0:"";}i:237;O:8:"stdClass":6:{s:2:"cm";i:237;s:3:"mod";s:5:"forum";s:7:"section";s:1:"0";s:4:"name";s:12:"Env+Bio+talk";s:7:"visible";s:1:"1";s:5:"extra";s:0:"";}i:74;O:8:"stdClass":7:{s:2:"cm";i:74;s:3:"mod";s:8:"resource";s:7:"section";s:1:"1";s:4:"name";s:54:"%E0%B8%99%E0%B9%82%E0%B8%A2%E0%B8%9A%E0%B8%B2%E0%B8%A2";s:7:"visible";s:1:"1";s:5:"extra";s:0:"";s:4:"icon";s:16:"f/powerpoint.gif";}i:121;O:8:"stdClass":7:{s:2:"cm";i:121;s:3:"mod";s:8:"resource";s:7:"section";s:1:"1";s:4:"name";s:14:"Introduction-2";s:7:"visible";s:1:"1";s:5:"extra";s:0:"";s:4:"icon";s:16:"f/powerpoint.gif";}i:122;O:8:"stdClass":7:{s:2:"cm";i:122;s:3:"mod";s:8:"resource";s:7:"section";s:1:"1";s:4:"name";s:14:"Introduction-1";s:7:"visible";s:1:"1";s:5:"extra";s:0:"";s:4:"icon";s:16:"f/powerpoint.gif";}i:182;O:8:"stdClass":7:{s:2:"cm";i:182;s:3:"mod";s:8:"resource";s:7:"section";s:1:"3";s:4:"name";s:5:"micro";s:7:"visible";s:1:"1";s:5:"extra";s:0:"";s:4:"icon";s:16:"f/powerpoint.gif";}i:246;O:8:"stdClass":7:{s:2:"cm";i:246;s:3:"mod";s:8:"resource";s:7:"section";s:1:"3";s:4:"name";s:5:"virus";s:7:"visible";s:1:"1";s:5:"extra";s:0:"";s:4:"icon";s:16:"f/powerpoint.gif";}i:286;O:8:"stdClass":7:{s:2:"cm";i:286;s:3:"mod";s:8:"resource";s:7:"section";s:1:"4";s:4:"name";s:5:"plant";s:7:"visible";s:1:"1";s:5:"extra";s:0:"";s:4:"icon";s:16:"f/powerpoint.gif";}i:247;O:8:"stdClass":7:{s:2:"cm";i:247;s:3:"mod";s:8:"resource";s:7:"section";s:1:"5";s:4:"name";s:5:"metal";s:7:"visible";s:1:"1";s:5:"extra";s:0:"";s:4:"icon";s:16:"f/powerpoint.gif";}i:251;O:8:"stdClass":7:{s:2:"cm";i:251;s:3:"mod";s:8:"resource";s:7:"section";s:1:"9";s:4:"name";s:7:"birdflu";s:7:"visible";s:1:"1";s:5:"extra";s:0:"";s:4:"icon";s:16:"f/powerpoint.gif";}i:279;O:8:"stdClass":7:{s:2:"cm";i:279;s:3:"mod";s:8:"resource";s:7:"section";s:1:"9";s:4:"name";s:3:"GMO";s:7:"visible";s:1:"1";s:5:"extra";s:0:"";s:4:"icon";s:16:"f/powerpoint.gif";}i:282;O:8:"stdClass":7:{s:2:"cm";i:282;s:3:"mod";s:8:"resource";s:7:"section";s:1:"9";s:4:"name";s:7:"mad+cow";s:7:"visible";s:1:"1";s:5:"extra";s:0:"";s:4:"icon";s:16:"f/powerpoint.gif";}i:283;O:8:"stdClass":7:{s:2:"cm";i:283;s:3:"mod";s:8:"resource";s:7:"section";s:2:"10";s:4:"name";s:3:"law";s:7:"visible";s:1:"1";s:5:"extra";s:0:"";s:4:"icon";s:16:"f/powerpoint.gif";}}', 5, 'อาจารย์', 'อาจารย์', 'นักเรียน', 'นักเรียน', 0, 1243270800, 0, 15, 0, 83886080, 0, 1, 0, 0, 0, '', 'standardblue', '', 'USD', 1243321046, 1243565769, 0, 0, 0, 0, 864000, 0, 1, 0, 0, '', 0);
INSERT INTO `tt_course` VALUES (23, 2, 3002, '', 'moodle 2009', 'moodle', '', 'อธิบายสั้นๆ เกี่ยวกับรายวิชาของท่าน ', 'topics', 1, 'a:7:{i:7;O:8:"stdClass":6:{s:2:"cm";i:7;s:3:"mod";s:5:"forum";s:7:"section";s:1:"0";s:4:"name";s:10:"News+forum";s:7:"visible";s:1:"1";s:5:"extra";s:0:"";}i:29;O:8:"stdClass":6:{s:2:"cm";i:29;s:3:"mod";s:8:"resource";s:7:"section";s:1:"0";s:4:"name";s:54:"%E0%B8%98%E0%B8%A3%E0%B8%A3%E0%B8%A1%E0%B8%94%E0%B8%B2";s:7:"visible";s:1:"1";s:5:"extra";s:0:"";}i:32;O:8:"stdClass":6:{s:2:"cm";i:32;s:3:"mod";s:8:"resource";s:7:"section";s:1:"0";s:4:"name";s:55:"%E0%B8%98%E0%B8%A3%E0%B8%A3%E0%B8%A1%E0%B8%94%E0%B8%B22";s:7:"visible";s:1:"1";s:5:"extra";s:0:"";}i:37;O:8:"stdClass":7:{s:2:"cm";i:37;s:3:"mod";s:8:"resource";s:7:"section";s:1:"0";s:4:"name";s:90:"%E0%B8%95%E0%B8%B2%E0%B8%A3%E0%B8%B2%E0%B8%87%E0%B9%80%E0%B8%A3%E0%B8%B5%E0%B8%A2%E0%B8%99";s:7:"visible";s:1:"1";s:5:"extra";s:0:"";s:4:"icon";s:9:"f/web.gif";}i:42;O:8:"stdClass":7:{s:2:"cm";i:42;s:3:"mod";s:8:"resource";s:7:"section";s:1:"0";s:4:"name";s:90:"%E0%B8%95%E0%B8%B2%E0%B8%A3%E0%B8%B2%E0%B8%87%E0%B9%80%E0%B8%A3%E0%B8%B5%E0%B8%A2%E0%B8%99";s:7:"visible";s:1:"1";s:5:"extra";s:0:"";s:4:"icon";s:9:"f/web.gif";}i:68;O:8:"stdClass":7:{s:2:"cm";i:68;s:3:"mod";s:8:"resource";s:7:"section";s:1:"0";s:4:"name";s:90:"%E0%B8%95%E0%B8%B2%E0%B8%A3%E0%B8%B2%E0%B8%87%E0%B9%80%E0%B8%A3%E0%B8%B5%E0%B8%A2%E0%B8%99";s:7:"visible";s:1:"1";s:5:"extra";s:0:"";s:4:"icon";s:9:"f/web.gif";}i:87;O:8:"stdClass":7:{s:2:"cm";i:87;s:3:"mod";s:8:"resource";s:7:"section";s:1:"0";s:4:"name";s:3:"ppt";s:7:"visible";s:1:"1";s:5:"extra";s:303:"onclick%3D%22this.target%3D%27resource62%27%3B+return+openpopup%28%27%2Fmod%2Fresource%2Fview.php%3Finpopup%3Dtrue%26amp%3Bid%3D87%27%2C%27resource62%27%2C%27resizable%3D1%2Cscrollbars%3D1%2Cdirectories%3D1%2Clocation%3D1%2Cmenubar%3D1%2Ctoolbar%3D1%2Cstatus%3D1%2Cwidth%3D620%2Cheight%3D450%27%29%3B%22";s:4:"icon";s:9:"f/web.gif";}}', 5, 'อาจารย์', 'อาจารย์', 'นักเรียน', 'นักเรียน', 0, 1243357200, 0, 1, 0, 83886080, 0, 1, 0, 0, 0, '', 'wood', '', 'USD', 1243321102, 1243414232, 0, 0, 0, 0, 864000, 0, 1, 0, 0, '', 0);
INSERT INTO `tt_course` VALUES (24, 3, 4021, '', 'Non-Communicalbe Diseases', 'Measurement', 'PHEP402', '<p style="line-height: normal; margin: 0in 0in 0pt; mso-hyphenate: none" dir="ltr" class="MsoBodyText"><font face="Times New Roman">       </font></p>\r\n<p style="text-align: justify; line-height: 16pt; margin: 0in 0in 0pt; mso-hyphenate: none; mso-pagination: none; mso-line-height-rule: exactly" class="MsoNormal"><span style="font-family: " lang="TH"></span></p>\r\n<p style="text-align: justify; line-height: 16pt; margin: 0in 0in 0pt; mso-hyphenate: none; mso-pagination: none; mso-line-height-rule: exactly" class="MsoNormal"><b><span style="font-family: " lang="TH">การวัดผลกระทบที่เกิดต่อชุมชน </span></b><span style="font-family: " lang="TH">เป็นดัชนีที่ชี้ให้เห็นถึงความสำคัญของโครงการต่างๆว่า</span><span style="font-family: "><span style="mso-spacerun: yes">   </span></span><span style="font-family: " lang="TH">ถ้าทำสำเร็จตามโครงการนั้นๆ</span><span style="font-family: "><span style="mso-spacerun: yes">     </span></span><span style="font-family: " lang="TH">จะสามารถลดภาวะการป่วยและการตายได้มากน้อยเพียงใด</span></p>\r\n<p style="text-align: justify; line-height: 16pt; margin: 0in 0in 0pt; mso-hyphenate: none; mso-pagination: none; mso-line-height-rule: exactly" class="MsoNormal"><span style="font-family: " lang="TH"></span><span style="font-family: "></span></p>\r\n<p></p>\r\n<p></p>\r\n<p></p>', 'topics', 1, 'a:9:{i:25;O:8:"stdClass":6:{s:2:"cm";i:25;s:3:"mod";s:5:"forum";s:7:"section";s:1:"0";s:4:"name";s:90:"%E0%B8%81%E0%B8%A3%E0%B8%B0%E0%B8%94%E0%B8%B2%E0%B8%99%E0%B8%82%E0%B9%88%E0%B8%B2%E0%B8%A7";s:7:"visible";s:1:"1";s:5:"extra";s:0:"";}i:104;O:8:"stdClass":7:{s:2:"cm";i:104;s:3:"mod";s:8:"resource";s:7:"section";s:1:"0";s:4:"name";s:90:"%E0%B8%95%E0%B8%B2%E0%B8%A3%E0%B8%B2%E0%B8%87%E0%B9%80%E0%B8%A3%E0%B8%B5%E0%B8%A2%E0%B8%99";s:7:"visible";s:1:"1";s:5:"extra";s:304:"onclick%3D%22this.target%3D%27resource79%27%3B+return+openpopup%28%27%2Fmod%2Fresource%2Fview.php%3Finpopup%3Dtrue%26amp%3Bid%3D104%27%2C%27resource79%27%2C%27resizable%3D1%2Cscrollbars%3D1%2Cdirectories%3D1%2Clocation%3D1%2Cmenubar%3D1%2Ctoolbar%3D1%2Cstatus%3D1%2Cwidth%3D620%2Cheight%3D450%27%29%3B%22";s:4:"icon";s:9:"f/pdf.gif";}i:117;O:8:"stdClass":7:{s:2:"cm";i:117;s:3:"mod";s:8:"resource";s:7:"section";s:1:"2";s:4:"name";s:297:"%E0%B9%80%E0%B8%AD%E0%B8%81%E0%B8%AA%E0%B8%B2%E0%B8%A3%E0%B8%AD%E0%B9%88%E0%B8%B2%E0%B8%99%E0%B8%9B%E0%B8%A3%E0%B8%B0%E0%B8%81%E0%B8%AD%E0%B8%9A%E0%B8%81%E0%B9%88%E0%B8%AD%E0%B8%99%E0%B9%80%E0%B8%82%E0%B9%89%E0%B8%B2%E0%B8%8A%E0%B8%B1%E0%B9%89%E0%B8%99%E0%B9%80%E0%B8%A3%E0%B8%B5%E0%B8%A2%E0%B8%99";s:7:"visible";s:1:"1";s:5:"extra";s:0:"";s:4:"icon";s:9:"f/pdf.gif";}i:167;O:8:"stdClass":6:{s:2:"cm";i:167;s:3:"mod";s:4:"quiz";s:7:"section";s:1:"3";s:4:"name";s:158:"%E0%B9%81%E0%B8%9A%E0%B8%9A%E0%B8%97%E0%B8%94%E0%B8%AA%E0%B8%AD%E0%B8%9A+%3A+%E0%B9%81%E0%B8%AD%E0%B8%A5%E0%B8%81%E0%B8%AD%E0%B8%AE%E0%B8%AD%E0%B8%A5%E0%B9%8C";s:7:"visible";s:1:"1";s:5:"extra";s:0:"";}i:216;O:8:"stdClass":6:{s:2:"cm";i:216;s:3:"mod";s:8:"feedback";s:7:"section";s:1:"4";s:4:"name";s:432:"%E0%B8%A3%E0%B8%B0%E0%B8%A2%E0%B8%B0%E0%B9%80%E0%B8%A7%E0%B8%A5%E0%B8%B2%E0%B9%83%E0%B8%99%E0%B8%81%E0%B8%B2%E0%B8%A3%E0%B8%97%E0%B8%9A%E0%B8%97%E0%B8%A7%E0%B8%99%E0%B8%9A%E0%B8%97%E0%B9%80%E0%B8%A3%E0%B8%B5%E0%B8%A2%E0%B8%99%E0%B9%83%E0%B8%99%E0%B9%81%E0%B8%95%E0%B9%88%E0%B8%A5%E0%B8%B0%E0%B8%A7%E0%B8%B1%E0%B8%99%E0%B8%AB%E0%B8%A5%E0%B8%B1%E0%B8%87%E0%B9%80%E0%B8%A5%E0%B8%B4%E0%B8%81%E0%B9%80%E0%B8%A3%E0%B8%B5%E0%B8%A2%E0%B8%99";s:7:"visible";s:1:"1";s:5:"extra";s:0:"";}i:217;O:8:"stdClass":6:{s:2:"cm";i:217;s:3:"mod";s:6:"survey";s:7:"section";s:1:"5";s:4:"name";s:315:"%E0%B8%81%E0%B8%B2%E0%B8%A3%E0%B8%AA%E0%B8%B3%E0%B8%A3%E0%B8%A7%E0%B8%88%E0%B8%84%E0%B8%A7%E0%B8%B2%E0%B8%A1%E0%B8%9E%E0%B8%B6%E0%B8%87%E0%B8%9E%E0%B8%AD%E0%B9%83%E0%B8%88%E0%B9%83%E0%B8%99%E0%B8%81%E0%B8%B2%E0%B8%A3%E0%B9%80%E0%B8%A3%E0%B8%B5%E0%B8%A2%E0%B8%99%E0%B8%81%E0%B8%B2%E0%B8%A3%E0%B8%AA%E0%B8%AD%E0%B8%99";s:7:"visible";s:1:"1";s:5:"extra";s:0:"";}i:218;O:8:"stdClass":6:{s:2:"cm";i:218;s:3:"mod";s:8:"feedback";s:7:"section";s:1:"6";s:4:"name";s:90:"%E0%B8%81%E0%B8%B2%E0%B8%A3%E0%B9%83%E0%B8%8A%E0%B9%89%E0%B9%80%E0%B8%87%E0%B8%B4%E0%B8%99";s:7:"visible";s:1:"1";s:5:"extra";s:0:"";}i:230;O:8:"stdClass":6:{s:2:"cm";i:230;s:3:"mod";s:4:"chat";s:7:"section";s:1:"7";s:4:"name";s:225:"%E0%B8%9E%E0%B8%B9%E0%B8%94%E0%B8%84%E0%B8%B8%E0%B8%A2%E0%B9%81%E0%B8%9A%E0%B8%9A%E0%B8%AA%E0%B8%9A%E0%B8%B2%E0%B8%A2%E0%B9%83%E0%B8%88%E0%B9%83%E0%B8%99%E0%B8%81%E0%B8%B2%E0%B8%A3%E0%B9%80%E0%B8%A3%E0%B8%B5%E0%B8%A2%E0%B8%99";s:7:"visible";s:1:"1";s:5:"extra";s:0:"";}i:302;O:8:"stdClass":7:{s:2:"cm";i:302;s:3:"mod";s:8:"resource";s:7:"section";s:1:"8";s:4:"name";s:180:"%E0%B9%80%E0%B8%AD%E0%B8%81%E0%B8%AA%E0%B8%B2%E0%B8%A3%E0%B8%9B%E0%B8%A3%E0%B8%B0%E0%B8%81%E0%B8%AD%E0%B8%9A%E0%B8%81%E0%B8%B2%E0%B8%A3%E0%B9%80%E0%B8%A3%E0%B8%B5%E0%B8%A2%E0%B8%99";s:7:"visible";s:1:"1";s:5:"extra";s:306:"onclick%3D%22this.target%3D%27resource182%27%3B+return+openpopup%28%27%2Fmod%2Fresource%2Fview.php%3Finpopup%3Dtrue%26amp%3Bid%3D302%27%2C%27resource182%27%2C%27resizable%3D1%2Cscrollbars%3D1%2Cdirectories%3D1%2Clocation%3D1%2Cmenubar%3D1%2Ctoolbar%3D1%2Cstatus%3D1%2Cwidth%3D620%2Cheight%3D450%27%29%3B%22";s:4:"icon";s:11:"f/flash.gif";}}', 5, 'อาจารย์', 'อาจารย์', 'นักเรียน', 'นักเรียน', 0, 1244048400, 0, 15, 0, 83886080, 1, 1, 0, 0, 0, '', 'standardwhite', '', 'USD', 1243321170, 1243565683, 0, 0, 0, 0, 864000, 0, 1, 0, 0, '', 0);

-- --------------------------------------------------------

-- 
-- โครงสร้างตาราง `tt_course_categories`
-- 

CREATE TABLE `tt_course_categories` (
  `id` bigint(10) unsigned NOT NULL auto_increment,
  `name` varchar(255) NOT NULL default '',
  `description` text,
  `parent` bigint(10) unsigned NOT NULL default '0',
  `sortorder` bigint(10) unsigned NOT NULL default '0',
  `coursecount` bigint(10) unsigned NOT NULL default '0',
  `visible` tinyint(1) NOT NULL default '1',
  `timemodified` bigint(10) unsigned NOT NULL default '0',
  `depth` bigint(10) unsigned NOT NULL default '0',
  `path` varchar(255) NOT NULL default '',
  PRIMARY KEY  (`id`),
  KEY `mdl_courcate_par_ix` (`parent`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COMMENT='Course categories' AUTO_INCREMENT=16 ;

-- 
-- dump ตาราง `tt_course_categories`
-- 

INSERT INTO `tt_course_categories` VALUES (1, 'Miscellaneous', NULL, 0, 0, 1, 1, 0, 1, '/1');
INSERT INTO `tt_course_categories` VALUES (2, 'คณะสาธารณสุขศาสตร์', NULL, 0, 999, 17, 1, 0, 1, '/2');
INSERT INTO `tt_course_categories` VALUES (3, 'ภาควิชาระบาดวิทยา', NULL, 2, 2, 1, 1, 0, 2, '/2/3');
INSERT INTO `tt_course_categories` VALUES (4, 'ภาควิชาชีวสถิติ', NULL, 2, 1, 0, 1, 0, 2, '/2/4');
INSERT INTO `tt_course_categories` VALUES (5, 'ภาควิชาวิทยาศาสตร์อนามัยสิ่งแวดล้อม', NULL, 2, 999, 1, 1, 0, 2, '/2/5');
INSERT INTO `tt_course_categories` VALUES (6, 'ภาควิชาอนามัยครอบครัว', NULL, 2, 999, 0, 1, 0, 2, '/2/6');
INSERT INTO `tt_course_categories` VALUES (7, 'ภาควิชาสุขศึกษาและพฤติกรรมศาสตร์', NULL, 2, 999, 1, 1, 0, 2, '/2/7');
INSERT INTO `tt_course_categories` VALUES (8, 'ภาควิชาจุลชีววิทยา', NULL, 2, 999, 0, 1, 0, 2, '/2/8');
INSERT INTO `tt_course_categories` VALUES (9, 'ภาควิชาโภชนวิทยา', NULL, 2, 999, 0, 1, 0, 2, '/2/9');
INSERT INTO `tt_course_categories` VALUES (10, 'ภาควิชาอาชีวอนามัยและความปลอดภัย', NULL, 2, 999, 1, 1, 0, 2, '/2/10');
INSERT INTO `tt_course_categories` VALUES (11, 'ภาควิชาปรสิตวิทยาและกีฏวิทยา', NULL, 2, 999, 0, 1, 0, 2, '/2/11');
INSERT INTO `tt_course_categories` VALUES (12, 'ภาควิชาบริหารงานสาธารณสุข', NULL, 2, 999, 1, 1, 0, 2, '/2/12');
INSERT INTO `tt_course_categories` VALUES (13, 'ภาควิชาการพยาบาลสาธารณสุข', NULL, 2, 999, 0, 1, 0, 2, '/2/13');
INSERT INTO `tt_course_categories` VALUES (14, 'ภาควิชาวิศวกรรมสุขาภิบาล', NULL, 2, 999, 0, 1, 0, 2, '/2/14');
INSERT INTO `tt_course_categories` VALUES (15, 'สถานฝึกอบรมและวิจัยอนามัยชนบทสูงเนิน', NULL, 2, 999, 0, 1, 0, 2, '/2/15');

-- --------------------------------------------------------

-- 
-- โครงสร้างตาราง `tt_group`
-- 

CREATE TABLE `tt_group` (
  `g_id` int(11) NOT NULL auto_increment,
  `groups` varchar(255) NOT NULL,
  PRIMARY KEY  (`g_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

-- 
-- dump ตาราง `tt_group`
-- 

INSERT INTO `tt_group` VALUES (1, 'administrator');
INSERT INTO `tt_group` VALUES (2, 'teacher');

-- --------------------------------------------------------

-- 
-- โครงสร้างตาราง `tt_module`
-- 

CREATE TABLE `tt_module` (
  `FUNCTION_NO` int(3) NOT NULL auto_increment,
  `FUNCTION_NAME` char(60) default NULL,
  `parent` int(5) NOT NULL default '0',
  `script` varchar(255) NOT NULL,
  PRIMARY KEY  (`FUNCTION_NO`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=9 ;

-- 
-- dump ตาราง `tt_module`
-- 

INSERT INTO `tt_module` VALUES (1, 'เธเนเธญเธกเธนเธฅเนเธเธทเนเธญเธเธเนเธ', 0, '');
INSERT INTO `tt_module` VALUES (2, 'เธเธฑเธเธเธถเธเธเนเธญเธกเธนเธฅเธเธเธเธฃเธฐเธกเธฒเธ', 0, '');
INSERT INTO `tt_module` VALUES (3, 'เธเธฑเธเธเธถเธเนเธเธดเธเธเธฑเธ/เธเธนเธเธเธฑเธ', 0, '');
INSERT INTO `tt_module` VALUES (4, 'เนเธเธ/เธเธฅเธเธฒเธฃเธเธณเนเธเธดเธเธเธฒเธ', 0, '');
INSERT INTO `tt_module` VALUES (5, 'เธฃเธฒเธขเธเธฒเธ', 0, '');
INSERT INTO `tt_module` VALUES (6, 'เธเนเธญเธกเธนเธฅเธเธนเนเนเธเนเธฃเธฐเธเธ', 0, '');
INSERT INTO `tt_module` VALUES (7, 'home', 0, '');
INSERT INTO `tt_module` VALUES (8, 'เนเธเธดเธเธญเธทเนเธเน', 0, '');

-- --------------------------------------------------------

-- 
-- โครงสร้างตาราง `tt_permission`
-- 

CREATE TABLE `tt_permission` (
  `FUNCTION_NO` int(3) default NULL,
  `G_ID` int(3) default NULL,
  `ADD_STATUS` int(3) default NULL,
  `UPDATE_STATUS` int(3) default NULL,
  `DELETE_STATUS` int(3) default NULL,
  `VIEW_STATUS` int(3) default NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- 
-- dump ตาราง `tt_permission`
-- 

INSERT INTO `tt_permission` VALUES (8, 43, 1, 1, 1, 1);
INSERT INTO `tt_permission` VALUES (7, 1, 1, 1, 1, 1);
INSERT INTO `tt_permission` VALUES (6, 1, 1, 1, 1, 1);
INSERT INTO `tt_permission` VALUES (5, 32, 0, 0, 0, 1);
INSERT INTO `tt_permission` VALUES (5, 1, 1, 1, 1, 1);
INSERT INTO `tt_permission` VALUES (4, 1, 1, 1, 1, 1);
INSERT INTO `tt_permission` VALUES (3, 1, 1, 1, 1, 1);
INSERT INTO `tt_permission` VALUES (7, 43, 1, 1, 1, 1);
INSERT INTO `tt_permission` VALUES (7, 9, 1, 1, 1, 1);
INSERT INTO `tt_permission` VALUES (8, 8, 1, 1, 1, 1);
INSERT INTO `tt_permission` VALUES (5, 8, 1, 1, 1, 1);
INSERT INTO `tt_permission` VALUES (6, 9, 1, 1, 1, 1);
INSERT INTO `tt_permission` VALUES (5, 9, 1, 1, 1, 1);
INSERT INTO `tt_permission` VALUES (4, 8, 1, 1, 1, 1);
INSERT INTO `tt_permission` VALUES (1, 10, 0, 0, 0, 1);
INSERT INTO `tt_permission` VALUES (2, 10, 0, 0, 0, 1);
INSERT INTO `tt_permission` VALUES (3, 10, 0, 0, 0, 1);
INSERT INTO `tt_permission` VALUES (5, 10, 0, 0, 0, 1);
INSERT INTO `tt_permission` VALUES (4, 11, 1, 1, 1, 1);
INSERT INTO `tt_permission` VALUES (5, 11, 1, 1, 1, 1);
INSERT INTO `tt_permission` VALUES (4, 12, 1, 1, 1, 1);
INSERT INTO `tt_permission` VALUES (5, 12, 1, 1, 1, 1);
INSERT INTO `tt_permission` VALUES (5, 13, 1, 1, 1, 1);
INSERT INTO `tt_permission` VALUES (4, 13, 1, 1, 1, 1);
INSERT INTO `tt_permission` VALUES (4, 14, 1, 1, 1, 1);
INSERT INTO `tt_permission` VALUES (5, 14, 1, 1, 1, 1);
INSERT INTO `tt_permission` VALUES (5, 15, 1, 1, 1, 1);
INSERT INTO `tt_permission` VALUES (4, 15, 1, 1, 1, 1);
INSERT INTO `tt_permission` VALUES (4, 16, 1, 1, 1, 1);
INSERT INTO `tt_permission` VALUES (5, 16, 1, 1, 1, 1);
INSERT INTO `tt_permission` VALUES (4, 17, 1, 1, 1, 1);
INSERT INTO `tt_permission` VALUES (5, 17, 1, 1, 1, 1);
INSERT INTO `tt_permission` VALUES (4, 18, 1, 1, 1, 1);
INSERT INTO `tt_permission` VALUES (5, 18, 1, 1, 1, 1);
INSERT INTO `tt_permission` VALUES (4, 19, 1, 1, 1, 1);
INSERT INTO `tt_permission` VALUES (5, 19, 1, 1, 1, 1);
INSERT INTO `tt_permission` VALUES (5, 20, 1, 1, 1, 1);
INSERT INTO `tt_permission` VALUES (4, 20, 1, 1, 1, 1);
INSERT INTO `tt_permission` VALUES (5, 21, 1, 1, 1, 1);
INSERT INTO `tt_permission` VALUES (4, 21, 1, 1, 1, 1);
INSERT INTO `tt_permission` VALUES (4, 22, 1, 1, 1, 1);
INSERT INTO `tt_permission` VALUES (5, 22, 1, 1, 1, 1);
INSERT INTO `tt_permission` VALUES (4, 23, 1, 1, 1, 1);
INSERT INTO `tt_permission` VALUES (5, 23, 1, 1, 1, 1);
INSERT INTO `tt_permission` VALUES (4, 24, 1, 1, 1, 1);
INSERT INTO `tt_permission` VALUES (5, 24, 1, 1, 1, 1);
INSERT INTO `tt_permission` VALUES (4, 25, 1, 1, 1, 1);
INSERT INTO `tt_permission` VALUES (5, 25, 1, 1, 1, 1);
INSERT INTO `tt_permission` VALUES (5, 26, 1, 1, 1, 1);
INSERT INTO `tt_permission` VALUES (4, 26, 1, 1, 1, 1);
INSERT INTO `tt_permission` VALUES (4, 27, 1, 1, 1, 1);
INSERT INTO `tt_permission` VALUES (5, 27, 1, 1, 1, 1);
INSERT INTO `tt_permission` VALUES (4, 28, 1, 1, 1, 1);
INSERT INTO `tt_permission` VALUES (5, 28, 1, 1, 1, 1);
INSERT INTO `tt_permission` VALUES (4, 29, 1, 1, 1, 1);
INSERT INTO `tt_permission` VALUES (5, 29, 1, 1, 1, 1);
INSERT INTO `tt_permission` VALUES (4, 30, 1, 1, 1, 1);
INSERT INTO `tt_permission` VALUES (5, 30, 1, 1, 1, 1);
INSERT INTO `tt_permission` VALUES (1, 31, 0, 0, 0, 1);
INSERT INTO `tt_permission` VALUES (2, 31, 0, 0, 0, 1);
INSERT INTO `tt_permission` VALUES (3, 31, 0, 0, 0, 1);
INSERT INTO `tt_permission` VALUES (4, 31, 0, 0, 0, 1);
INSERT INTO `tt_permission` VALUES (5, 31, 0, 0, 0, 1);
INSERT INTO `tt_permission` VALUES (2, 1, 1, 1, 1, 1);
INSERT INTO `tt_permission` VALUES (4, 9, 1, 1, 1, 1);
INSERT INTO `tt_permission` VALUES (3, 9, 1, 1, 1, 1);
INSERT INTO `tt_permission` VALUES (5, 33, 0, 0, 0, 1);
INSERT INTO `tt_permission` VALUES (5, 35, 1, 1, 1, 1);
INSERT INTO `tt_permission` VALUES (4, 35, 1, 1, 1, 1);
INSERT INTO `tt_permission` VALUES (5, 34, 1, 1, 1, 1);
INSERT INTO `tt_permission` VALUES (4, 34, 1, 1, 1, 1);
INSERT INTO `tt_permission` VALUES (4, 36, 1, 1, 1, 1);
INSERT INTO `tt_permission` VALUES (5, 36, 1, 1, 1, 1);
INSERT INTO `tt_permission` VALUES (4, 37, 1, 1, 1, 1);
INSERT INTO `tt_permission` VALUES (5, 37, 1, 1, 1, 1);
INSERT INTO `tt_permission` VALUES (4, 38, 1, 1, 1, 1);
INSERT INTO `tt_permission` VALUES (5, 38, 1, 1, 1, 1);
INSERT INTO `tt_permission` VALUES (1, 41, 0, 0, 0, 1);
INSERT INTO `tt_permission` VALUES (5, 40, 0, 0, 0, 1);
INSERT INTO `tt_permission` VALUES (1, 40, 0, 0, 0, 1);
INSERT INTO `tt_permission` VALUES (5, 41, 0, 0, 0, 1);
INSERT INTO `tt_permission` VALUES (1, 8, 1, 1, 1, 1);
INSERT INTO `tt_permission` VALUES (2, 9, 1, 1, 1, 1);
INSERT INTO `tt_permission` VALUES (1, 1, 1, 1, 1, 1);
INSERT INTO `tt_permission` VALUES (1, 9, 1, 1, 1, 1);
INSERT INTO `tt_permission` VALUES (5, 42, 1, 1, 1, 1);
INSERT INTO `tt_permission` VALUES (4, 42, 1, 1, 1, 1);
INSERT INTO `tt_permission` VALUES (6, 43, 1, 1, 1, 1);
INSERT INTO `tt_permission` VALUES (5, 43, 1, 1, 1, 1);
INSERT INTO `tt_permission` VALUES (4, 43, 1, 1, 1, 1);
INSERT INTO `tt_permission` VALUES (3, 43, 1, 1, 1, 1);
INSERT INTO `tt_permission` VALUES (2, 43, 1, 1, 1, 1);
INSERT INTO `tt_permission` VALUES (1, 43, 1, 1, 1, 1);
INSERT INTO `tt_permission` VALUES (5, 44, 1, 1, 1, 1);
INSERT INTO `tt_permission` VALUES (4, 44, 1, 1, 1, 1);
INSERT INTO `tt_permission` VALUES (1, 45, 1, 1, 1, 1);
INSERT INTO `tt_permission` VALUES (2, 45, 1, 1, 1, 1);
INSERT INTO `tt_permission` VALUES (3, 45, 1, 1, 1, 1);
INSERT INTO `tt_permission` VALUES (4, 45, 1, 1, 1, 1);
INSERT INTO `tt_permission` VALUES (5, 45, 1, 1, 1, 1);
INSERT INTO `tt_permission` VALUES (6, 45, 1, 1, 1, 1);
INSERT INTO `tt_permission` VALUES (7, 45, 1, 1, 1, 1);
INSERT INTO `tt_permission` VALUES (8, 45, 1, 1, 1, 1);
INSERT INTO `tt_permission` VALUES (4, 46, 1, 1, 1, 1);
INSERT INTO `tt_permission` VALUES (5, 46, 1, 1, 1, 1);
INSERT INTO `tt_permission` VALUES (8, 46, 1, 1, 1, 1);
INSERT INTO `tt_permission` VALUES (1, 47, 1, 1, 1, 1);
INSERT INTO `tt_permission` VALUES (2, 47, 1, 1, 1, 1);
INSERT INTO `tt_permission` VALUES (3, 47, 1, 1, 1, 1);
INSERT INTO `tt_permission` VALUES (4, 47, 1, 1, 1, 1);
INSERT INTO `tt_permission` VALUES (5, 47, 1, 1, 1, 1);
INSERT INTO `tt_permission` VALUES (6, 47, 1, 1, 1, 1);
INSERT INTO `tt_permission` VALUES (7, 47, 1, 1, 1, 1);
INSERT INTO `tt_permission` VALUES (8, 47, 1, 1, 1, 1);
INSERT INTO `tt_permission` VALUES (4, 48, 0, 0, 0, 1);
INSERT INTO `tt_permission` VALUES (5, 48, 0, 0, 0, 1);
INSERT INTO `tt_permission` VALUES (8, 48, 0, 0, 0, 1);
INSERT INTO `tt_permission` VALUES (1, 49, 1, 1, 1, 1);
INSERT INTO `tt_permission` VALUES (2, 49, 1, 1, 1, 1);
INSERT INTO `tt_permission` VALUES (3, 49, 1, 1, 1, 1);
INSERT INTO `tt_permission` VALUES (4, 49, 1, 1, 1, 1);
INSERT INTO `tt_permission` VALUES (5, 49, 1, 1, 1, 1);
INSERT INTO `tt_permission` VALUES (6, 49, 1, 1, 1, 1);
INSERT INTO `tt_permission` VALUES (7, 49, 1, 1, 1, 1);
INSERT INTO `tt_permission` VALUES (8, 49, 1, 1, 1, 1);

-- --------------------------------------------------------

-- 
-- โครงสร้างตาราง `user`
-- 

CREATE TABLE `user` (
  `NO` int(3) NOT NULL auto_increment,
  `USR_CODE` char(20) default '0',
  `USR_PAS` char(255) default '0',
  `USR_NAME` char(50) default '0',
  `USR_SURNAME` char(50) default '0',
  `DEPARTMENT_NO` int(3) default NULL,
  `SUBDEPARTMENT_NO` int(3) default NULL,
  `USR_LASTUPDATE` char(30) default '0',
  `ONLINE_COUNT` int(10) default NULL,
  `ONLINE_ADD` int(10) NOT NULL default '0',
  `ONLINE_UPDATE` int(10) NOT NULL default '0',
  `ONLINE_DELETE` int(10) NOT NULL default '0',
  `EMAIL` varchar(255) NOT NULL,
  `LOGIN` int(1) NOT NULL default '0',
  `BLOCK` int(1) NOT NULL default '0',
  `G_ID` enum('User','Administrator') NOT NULL,
  PRIMARY KEY  (`NO`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=50 ;

-- 
-- dump ตาราง `user`
-- 

INSERT INTO `user` VALUES (1, 'admin', 'admin', 'CHAKKAPAN', 'CHARUPOOM', 15, 0, '2009-08-06 11:10:00', 0, 0, 0, 0, 'iceeagle99@gmail.com', 0, 0, '');
INSERT INTO `user` VALUES (9, 'amporn', '9507', 'เธญเธฑเธกเธเธฃ', 'เธเธฃเธฐเธขเธนเธฃเธเธดเธเธเธดเธเธธเธฅ', 4, 14, '0', 0, 0, 0, 0, '', 0, 0, '');
INSERT INTO `user` VALUES (10, 'suphan', 'spx11', 'เธเธฒเธขเธชเธธเธเธฃเธฃเธ', 'เนเธชเธเธเธญเธ', 4, 14, '0', 0, 0, 0, 0, '', 0, 0, '');
INSERT INTO `user` VALUES (11, 'budget1', 'chxx3', 'เธเธฒเธขเนเธเธฅเธดเธกเธเธฑเธข', 'เธเธเธธเธเธงเธดเธเธขเน', 19, 0, '0', 6, 5, 1, 0, '', 0, 0, '');
INSERT INTO `user` VALUES (12, 'budget2', 'srxx4', 'เธเธช.เธชเธธเธฃเธฒเธเธเน', 'เธชเธกเธเธเธฉเน', 4, 6, '0', 2, 2, 0, 0, '', 0, 0, '');
INSERT INTO `user` VALUES (13, 'srisilp', 'srisilp', 'เธเธฒเธเธจเธฃเธตเธจเธดเธฅเธเน', 'เธเธเธชเธฒเธฃเธชเธดเธเธเธดเธเธฃ', 4, 10, '0', 7, 6, 1, 0, '', 0, 0, '');
INSERT INTO `user` VALUES (14, 'CHOLLADA', 'CLXX6', 'เธเธฒเธเธเธฅเธฅเธเธฒ', 'เธงเธเธจเนเนเธเธตเนเธข', 4, 10, '0', 0, 0, 0, 0, '', 0, 0, '');
INSERT INTO `user` VALUES (15, 'RACHADA', 'RCX17', 'เธเธฒเธเธฃเธฑเธเธเธฒ', 'เธฅเธดเธกเธเธชเธงเธฃ', 4, 16, '0', 0, 0, 0, 0, '', 0, 0, '');
INSERT INTO `user` VALUES (16, 'NUTSARUN', 'NRX18', 'เธเธช.เธเธฑเธเธชเธฃเธฑเธ', 'เธเธฃเธฃเธกเธเธเธฃเธฑเธเธเน', 15, 0, '0', 5, 5, 0, 0, '', 0, 0, '');
INSERT INTO `user` VALUES (17, 'AREE', 'REX19', 'เธเธฒเธเธญเธฒเธฃเธตเธขเน', 'เธเธณเธชเธธเธงเธฃเธฃเธ', 15, 0, '0', 1, 1, 0, 0, '', 0, 0, '');
INSERT INTO `user` VALUES (18, 'LAOKENG', 'PTXX9', 'เธเธช.เธเธฑเธเธกเธฒ', 'เนเธฅเธฒเนเธเนเธ', 3, 0, '0', 0, 0, 0, 0, '', 0, 0, '');
INSERT INTO `user` VALUES (19, 'BUNGON', 'BOX2X', 'เธเธช.เธเธฑเธเธญเธฃ', 'เนเธญเธทเนเธญเธกเธเธเธฅเธเธฑเธข', 3, 0, '0', 30, 28, 2, 0, '', 0, 0, '');
INSERT INTO `user` VALUES (20, 'EM-ON', 'MOX21', 'เธเธฒเธเนเธญเธกเธญเธฃ', 'เนเธเธจเธฅเธเธธเธเธดเนเธเธ', 31, 0, '0', 8, 6, 2, 0, '', 0, 0, '');
INSERT INTO `user` VALUES (21, 'PUNNEE', '0043255', 'เธเธช.เธเธฃเธฃเธเธต', 'เธเธเธฒเธเธเนเธฃเธเธก', 1, 0, '0', 40, 39, 1, 0, '', 0, 0, '');
INSERT INTO `user` VALUES (22, 'SUWIMON', 'WIX23', 'เธเธฒเธเธชเธธเธงเธดเธกเธฅ', 'เธญเธดเธเธเธฐเนเธชเธ', 5, 0, '0', 36, 25, 11, 0, '', 0, 0, '');
INSERT INTO `user` VALUES (23, 'PASUPA', 'PAX24', 'เธเธช.เธเธชเธธเธ�เธฒ', 'เธเธดเธเธงเธฃเนเธชเธ�เธฒเธ', 5, 0, '0', 0, 0, 0, 0, '', 0, 0, '');
INSERT INTO `user` VALUES (24, 'PIMJAI', 'PJX31', 'เธเธช.เธเธดเธกเธเนเนเธ', 'เธชเธธเธงเธฃเธฃเธเธ�เธนเธกเธด', 6, 0, '0', 1, 1, 0, 0, '', 0, 0, '');
INSERT INTO `user` VALUES (25, 'SAOWANEE', 'SOX25', 'เธเธช.เนเธชเธฒเธงเธเธตเธขเน', 'เธกเธธเธชเธดเนเธเธ', 9, 0, '0', 0, 0, 0, 0, '', 0, 0, '');
INSERT INTO `user` VALUES (26, 'ANONG', '999888', 'เธเธช.เธญเธเธเธเน', 'เธเธณเนเธเธฃเนเธเนเธง', 9, 0, '0', 0, 0, 0, 0, '', 0, 0, '');
INSERT INTO `user` VALUES (27, 'MANOON', 'NOX27', 'เธเธฒเธขเธกเธเธนเธ', 'เธญเธฃเนเธฒเธกเธฃเธฑเธเธเน', 14, 0, '0', 0, 0, 0, 0, '', 0, 0, '');
INSERT INTO `user` VALUES (28, 'PHONGPORN', 'PPX28', 'เธเธช.เธเธเธจเนเธ�เธฃเธเน', 'เนเธฅเธดเธจเธฃเธฑเธเธเธเธฒเธเธเน', 14, 0, '0', 0, 0, 0, 0, '', 0, 0, '');
INSERT INTO `user` VALUES (29, 'ARUNEE', 'RNX29', 'เธเธฒเธเธญเธฃเธธเธเธต', 'เธเธเธฉเนเธกเธฐเธฅเธดเธงเธฑเธฅเธขเน', 7, 0, '0', 1, 1, 0, 0, '', 0, 0, '');
INSERT INTO `user` VALUES (30, 'OCPLO', 'JPX3X', 'เธเธช.เธเธฑเธเธเธฃเนเนเธเนเธ', 'เนเธกเธเธฒเธญเธ�เธดเธฃเธฑเธเธฉเน', 17, 0, '0', 0, 0, 0, 0, '', 0, 0, '');
INSERT INTO `user` VALUES (31, 'pavana', 'kunkai', 'เธ�เธฒเธงเธเธฒ', 'เนเธเธเธเธเธญเธกเธกเนเธฒ', 0, 0, '0', 0, 0, 0, 0, '', 0, 0, '');
INSERT INTO `user` VALUES (32, 'Janthorn', 'janthorn', 'เธเธช.เธเธฑเธเธเธฃ', 'เธเธดเธฅเธเนเธเธกเธฅ', 4, 6, '0', 0, 0, 0, 0, '', 0, 0, '');
INSERT INTO `user` VALUES (33, 'Radee', 'radee', 'เธเธฒเธเธเธฑเธเธเธฑเธเธฃเธเธต', 'เธซเธธเนเธเธเธดเธเธฑเธเธฉเน', 4, 6, '0', 0, 0, 0, 0, '', 0, 0, '');
INSERT INTO `user` VALUES (34, '123', '123', 'เธฃเธจ.เธเธธเธเธฃเธฑเธเธฉเธฒ', 'เธชเธธเธเธเธฃเธเธฃเธฃเธก', 30, 0, '0', 53, 32, 21, 0, '', 0, 0, '');
INSERT INTO `user` VALUES (35, 'nimt', 'nimt', 'เธเธธเธเธเธฃเธดเธกเธฒ', 'เนเธเธดเธเธญเธธเธเธก', 21, 19, '0', 0, 0, 0, 0, '', 0, 0, '');
INSERT INTO `user` VALUES (36, 'pattariya', 'aompatta', 'เธเธธเธเธ�เธฑเธเธฃเธดเธขเธฒ', 'เนเธเธขเธกเธเธต', 9, 0, '0', 0, 0, 0, 0, '', 0, 0, '');
INSERT INTO `user` VALUES (37, 'pakaporn', 'pakaporn', 'เธเธฒเธเธ�เธเธเธฃ', 'เธงเธฑเธเธเธเธธเธฅ', 20, 0, '0', 0, 0, 0, 0, '', 0, 0, '');
INSERT INTO `user` VALUES (38, 'wasawan', 'niaorth', 'เธเธช.เธงเธจเธงเธฃเธฃเธ', 'เธฃเธนเนเธฃเธฑเธเธเธต', 16, 0, '0', 0, 0, 0, 0, '', 0, 0, '');
INSERT INTO `user` VALUES (40, 'sakara', '3009', 'เธเธช.เธชเธฐเธเธฒเธฃเธฐ', 'เธเธงเธเนเธเนเธเธฃเน', 4, 6, '0', 0, 0, 0, 0, '', 0, 0, '');
INSERT INTO `user` VALUES (41, 'pathom', 'yamkate2', 'เธเธฒเธขเธเธเธก', 'เนเธซเธขเธกเนเธเธเธธ', 25, 0, '0', 0, 0, 0, 0, '', 0, 0, '');
INSERT INTO `user` VALUES (42, 'saovanee', '95341297', 'เธเธช.เนเธชเธฒเธงเธเธตเธขเน', 'เธเธฃเธชเธธเธเนเธเธดเนเธกเธเธนเธ', 14, 0, '0', 1, 1, 0, 0, '', 0, 0, '');
INSERT INTO `user` VALUES (43, 'winita', '000999', 'เธเธช.เธงเธดเธเธดเธเธฒ', 'เธเธทเนเธเธเนเธงเธ', 4, 14, '0', 619, 508, 121, 1, '', 0, 0, '');
INSERT INTO `user` VALUES (44, 'somsri', '1111', 'เธ.เธช.เธชเธกเธจเธฃเธต', 'เธเนเธณเนเธชเธ', 31, 0, '0', 3, 3, 0, 0, '', 0, 0, '');
INSERT INTO `user` VALUES (45, 'ladda', 'ladda', 'เธ.เธช.เธฅเธฑเธเธเธฒ', 'เธเนเธฒเธขเธเนเธฒ', 4, 14, '0', 188, 182, 6, 0, '', 0, 0, '');
INSERT INTO `user` VALUES (46, 'nittaya', 'n123', 'เธเธฒเธเธเธดเธเธขเธฒ', 'เธเธฑเธเธเธฃเธฑเธเธเน', 5, 11, '0', 0, 0, 0, 0, '', 0, 0, '');
INSERT INTO `user` VALUES (47, 'butsara', '2512', 'เธเธฒเธเธเธธเธจเธฃเธฒ', 'เนเธขเนเธกเนเธเธฉเธฃ', 4, 14, '0', 418, 188, 230, 0, '', 0, 0, '');
INSERT INTO `user` VALUES (48, 'kamolrat', 'thong980', 'เธเธกเธฅเธฃเธฑเธเธเน', 'เธเธญเธเธเธฃเธฐเนเธ', 31, 0, '0', NULL, 0, 0, 0, '', 0, 0, '');
INSERT INTO `user` VALUES (49, 'natamon', '0911', 'เธ.เธช.เธเธเธกเธ', 'เธเธทเนเธเธเนเธงเธ', 4, 14, '0', 205, 132, 76, 0, '', 0, 0, '');

-- --------------------------------------------------------

-- 
-- โครงสร้างตาราง `user_log`
-- 

CREATE TABLE `user_log` (
  `ul_id` int(4) unsigned NOT NULL auto_increment,
  `us_id` int(2) default NULL,
  `ul_in` datetime default '0000-00-00 00:00:00',
  `ul_out` datetime default '0000-00-00 00:00:00',
  `ul_ip` varchar(16) NOT NULL default '',
  `ul_url` text,
  PRIMARY KEY  (`ul_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 PACK_KEYS=0 COMMENT='เธเธฑเธเธเธถเธเธเธฒเธฃเนเธเนเธฒเนเธเนเธเธฒเธเธฃ' AUTO_INCREMENT=1 ;

-- 
-- dump ตาราง `user_log`
-- 

