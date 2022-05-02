-- phpMyAdmin SQL Dump
-- version 2.10.3
-- http://www.phpmyadmin.net
-- 
-- โฮสต์: localhost
-- เวลาในการสร้าง: 18 มิ.ย. 2009  น.
-- รุ่นของเซิร์ฟเวอร์: 5.0.51
-- รุ่นของ PHP: 5.2.6

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";

-- 
-- ฐานข้อมูล: `ph_bookingroom`
-- 

-- --------------------------------------------------------

-- 
-- โครงสร้างตาราง `course`
-- 

CREATE TABLE `course` (
  `id` int(5) NOT NULL auto_increment,
  `course` varchar(255) NOT NULL,
  `modified` datetime NOT NULL,
  `modifiedby` int(5) NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- 
-- dump ตาราง `course`
-- 


-- --------------------------------------------------------

-- 
-- โครงสร้างตาราง `room_booking`
-- 

CREATE TABLE `room_booking` (
  `id` int(11) NOT NULL auto_increment,
  `subject` varchar(255) default NULL COMMENT 'วิชา',
  `cid` int(11) default '0' COMMENT 'รหัสห้อง',
  `teacher` text COMMENT 'ผู้สอน',
  `subject2` varchar(255) default '- N/A -',
  `course` varchar(100) default NULL COMMENT 'หลักสูตร',
  `starttime` varchar(8) default NULL COMMENT 'เวลาเริ่ม',
  `endtime` varchar(8) default NULL COMMENT 'เวลาจบ',
  `startdate` varchar(10) default '0' COMMENT 'วันเริ่ม',
  `enddate` varchar(10) default '0' COMMENT 'วันจบ',
  `useradd` varchar(30) default NULL COMMENT 'ผู้จอง',
  `location` text,
  `depid` int(5) default '0' COMMENT 'หน่วยงาน',
  `another` text,
  `responsible` text,
  `tel` varchar(30) default NULL,
  `fax` varchar(15) default NULL,
  `email` varchar(50) default NULL,
  `fileupload` varchar(255) default NULL,
  `status` varchar(10) default NULL COMMENT 'สถานะการจอง',
  `created` datetime default NULL,
  `private` varchar(1) default NULL,
  `comment` text,
  `modified` datetime default NULL COMMENT 'วันที่กรอกข้อมูล',
  `us_id` int(11) default NULL COMMENT 'ผู้กรอกข้อมูล',
  `amount` int(11) default NULL COMMENT 'จำนวน',
  PRIMARY KEY  (`id`),
  UNIQUE KEY `id` (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=tis620 AUTO_INCREMENT=24 ;

-- 
-- dump ตาราง `room_booking`
-- 

INSERT INTO `room_booking` VALUES (1, 'ทดสอบ', 17, 'ทดสอบ', '- N/A -', 'ทดสอบ', '08.30', '12.00', '2009-05-30', '2009-05-30', 'admin', NULL, 27, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 20);
INSERT INTO `room_booking` VALUES (2, 'ทดสอบ2', 16, 'ทดสอบ2', '- N/A -', 'ทดสอบ2', '08.30', '16.30', '2009-06-03', '2009-06-03', 'admin', NULL, 8, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 15);
INSERT INTO `room_booking` VALUES (3, 'asdf', 17, 'asdf', '- N/A -', 'sadf', '08.30', '16.30', '2009-06-01', '2009-06-01', 'asdf', NULL, 8, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 60);
INSERT INTO `room_booking` VALUES (4, 'phad 609', 17, 'ภูษิตา  อินทรประสงค์', '- N/A -', 'วท.ม', '09.00', '12.00', '2009-06-15', '2009-06-15', 'ศิริมา', NULL, 5, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 20);
INSERT INTO `room_booking` VALUES (5, 'Program Endnote', 17, 'อ.พร้อมลักษณ์  สมบูรณ์ปัญญากุล', '- N/A -', '', '09.00', '12.00', '2009-06-30', '2009-06-30', 'วีณา', NULL, 7, '<P>วิชา สศภว. 685 Seminar in Nutrition</P>', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 10);
INSERT INTO `room_booking` VALUES (6, 'program Emucal', 15, 'ผศ.สุภัทร  ไชยกุล', '- N/A -', 'ปริญญาตรี ', '13.00', '16.00', '2009-09-07', '2009-09-07', 'คุณยุพดี', NULL, 7, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 41);
INSERT INTO `room_booking` VALUES (7, 'Progrma SPSS', 16, 'ผศ.ณัฐนารีย์  เอมยงค์', '- N/A -', 'สาธารณสุขศาสตร์ มหาบัณฑิต', '13.00', '16.00', '2009-06-04', '2009-06-04', 'คุณโศรดา', NULL, 4, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 25);
INSERT INTO `room_booking` VALUES (8, 'Progrma SPSS', 16, 'อ.นัฐนารี  เอมยงค์', '- N/A -', 'สาธารณสุขศาสตร์ มหาบัณฑิต', '13.00', '16.00', '2009-06-05', '2009-06-05', 'คุณโศรดา', NULL, 4, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 25);
INSERT INTO `room_booking` VALUES (9, 'Progrma SPSS', 16, 'อ.นัฐนารี  เอมยงค์', '- N/A -', 'สาธารณสุขศาสตร์ มหาบัณฑิต', '13.00', '16.00', '2009-06-18', '2009-06-18', 'คุณโศรดา', NULL, 4, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 25);
INSERT INTO `room_booking` VALUES (10, 'Progrma SPSS', 16, 'อ.นัฐนารี  เอมยงค์', '- N/A -', 'สาธารณสุขศาสตร์ มหาบัณฑิต', '09.00', '12.00', '2009-07-01', '2009-07-01', 'คุณโศรดา', NULL, 4, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 25);
INSERT INTO `room_booking` VALUES (11, 'Progrma SPSS', 16, 'อ.นัฐนารี  เอมยงค์', '- N/A -', 'สาธารณสุขศาสตร์ มหาบัณฑิต', '09.00', '12.00', '2009-07-15', '2009-07-15', 'คุณโศรดา', NULL, 4, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 25);
INSERT INTO `room_booking` VALUES (12, 'Progrma SPSS', 16, 'อ.นัฐนารี  เอมยงค์', '- N/A -', 'สาธารณสุขศาสตร์ มหาบัณฑิต', '09.00', '12.00', '2009-08-05', '2009-08-05', 'คุณโศรดา', NULL, 4, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 25);
INSERT INTO `room_booking` VALUES (13, 'Progrma SPSS', 16, 'อ.นัฐนารี  เอมยงค์', '- N/A -', 'สาธารณสุขศาสตร์ มหาบัณฑิต', '09.00', '12.00', '2009-08-24', '2009-08-24', 'คุณโศรดา', NULL, 4, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 25);
INSERT INTO `room_booking` VALUES (14, 'Progrma SPSS', 16, 'อ.นัฐนารี  เอมยงค์', '- N/A -', 'สาธารณสุขศาสตร์ มหาบัณฑิต', '09.00', '12.00', '2009-09-14', '2009-09-14', 'คุณโศรดา', NULL, 4, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 25);
INSERT INTO `room_booking` VALUES (15, 'Progrma SPSS', 16, 'อ.นัฐนารี  เอมยงค์', '- N/A -', 'สาธารณสุขศาสตร์ มหาบัณฑิต', '13.00', '16.00', '2009-11-02', '2009-11-02', 'คุณโศรดา', NULL, 4, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 25);
INSERT INTO `room_booking` VALUES (16, 'Progrma SPSS', 17, 'ผศ.ปรารถนา  สถิตวิภาวี', '- N/A -', 'สาธารณสุขศาสตร์ มหาบัณฑิต', '13.00', '16.00', '2009-11-02', '2009-11-02', 'คุณโศรดา', NULL, 4, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 25);
INSERT INTO `room_booking` VALUES (17, 'Progrma SPSS', 16, 'อ.นัฐนารี  เอมยงค์', '- N/A -', 'สาธารณสุขศาสตร์ มหาบัณฑิต', '13.00', '16.00', '2009-11-30', '2009-11-30', 'คุณโศรดา', NULL, 4, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 25);
INSERT INTO `room_booking` VALUES (18, 'Progrma SPSS', 16, 'อ.นัฐนารี  เอมยงค์', '- N/A -', 'สาธารณสุขศาสตร์ มหาบัณฑิต', '13.00', '16.00', '2009-12-21', '2009-12-21', 'คุณโศรดา', NULL, 4, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 25);
INSERT INTO `room_booking` VALUES (19, 'Progrma SPSS', 16, 'อ.นัฐนารี  เอมยงค์', '- N/A -', 'สาธารณสุขศาสตร์ มหาบัณฑิต', '13.00', '16.00', '2009-12-28', '2009-12-28', 'คุณโศรดา', NULL, 4, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 25);
INSERT INTO `room_booking` VALUES (20, 'Progrma SPSS', 16, 'อ.นัฐนารี  เอมยงค์', '- N/A -', 'สาธารณสุขศาสตร์ มหาบัณฑิต', '13.00', '16.00', '2010-01-11', '2010-01-11', 'คุณโศรดา', NULL, 4, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 25);
INSERT INTO `room_booking` VALUES (21, 'Progrma SPSS', 16, 'อ.นัฐนารี  เอมยงค์', '- N/A -', 'สาธารณสุขศาสตร์ มหาบัณฑิต', '13.00', '16.00', '2010-01-18', '2010-01-18', 'คุณโศรดา', NULL, 4, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 25);
INSERT INTO `room_booking` VALUES (22, 'Progrma SPSS', 17, 'รศ.ชูเกียรติ  วิวัฒน์วงศ์เกษฒ', '- N/A -', 'ปริญญาโท', '09.00', '12.00', '2009-06-03', '2009-07-01', 'คุณโศรดา', NULL, 4, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 6);
INSERT INTO `room_booking` VALUES (23, 'Progrma SPSS', 17, 'รศ.ชูเกียรติ  วิวัฒน์วงศ์เกษฒ', '- N/A -', 'ปริญญาโท', '08.30', '16.30', '2009-06-09', '2009-09-01', 'คุณโศรดา', NULL, 4, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 6);

-- --------------------------------------------------------

-- 
-- โครงสร้างตาราง `room_category`
-- 

CREATE TABLE `room_category` (
  `cid` int(11) NOT NULL auto_increment,
  `category` varchar(255) NOT NULL default '',
  `description` text,
  `amount` varchar(255) default '-',
  `ordering` int(11) default '0',
  `lastupdate` datetime default '0000-00-00 00:00:00',
  `modified_by` varchar(255) default NULL,
  `type_id` int(11) NOT NULL,
  PRIMARY KEY  (`cid`)
) ENGINE=MyISAM  DEFAULT CHARSET=tis620 AUTO_INCREMENT=18 ;

-- 
-- dump ตาราง `room_category`
-- 

INSERT INTO `room_category` VALUES (15, 'ห้องเรียน 7402', NULL, '30', 0, '2009-06-15 09:56:52', NULL, 1);
INSERT INTO `room_category` VALUES (16, 'ห้องเรียน 7403', NULL, '20', 0, '2009-06-15 09:56:55', NULL, 1);
INSERT INTO `room_category` VALUES (17, 'ห้องเรียน 7404', NULL, '20', 0, '2009-06-15 09:57:00', NULL, 1);

-- --------------------------------------------------------

-- 
-- โครงสร้างตาราง `room_program`
-- 

CREATE TABLE `room_program` (
  `id` int(11) NOT NULL,
  `program` varchar(255) default NULL
) ENGINE=MyISAM DEFAULT CHARSET=tis620;

-- 
-- dump ตาราง `room_program`
-- 

INSERT INTO `room_program` VALUES (1, 'Ms Office');
INSERT INTO `room_program` VALUES (1, 'SPSS');
INSERT INTO `room_program` VALUES (1, 'Macromedia Flash');
INSERT INTO `room_program` VALUES (2, 'Ms Office');
INSERT INTO `room_program` VALUES (2, 'SPSS');
INSERT INTO `room_program` VALUES (3, 'asd');
INSERT INTO `room_program` VALUES (4, 'Spss');

-- --------------------------------------------------------

-- 
-- โครงสร้างตาราง `room_type`
-- 

CREATE TABLE `room_type` (
  `type_id` int(11) NOT NULL auto_increment,
  `types` varchar(255) NOT NULL default '- N/A -',
  PRIMARY KEY  (`type_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

-- 
-- dump ตาราง `room_type`
-- 

INSERT INTO `room_type` VALUES (1, 'ห้องอบรมคอมพิวเตอร์');
INSERT INTO `room_type` VALUES (2, 'ห้องประชุม');

-- --------------------------------------------------------

-- 
-- โครงสร้างตาราง `subject`
-- 

CREATE TABLE `subject` (
  `id` int(11) NOT NULL auto_increment,
  `subject` varchar(255) NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

-- 
-- dump ตาราง `subject`
-- 

INSERT INTO `subject` VALUES (1, 'Program Endnote');
INSERT INTO `subject` VALUES (2, 'program Emucal');
INSERT INTO `subject` VALUES (3, 'Progrma SPSS');

-- --------------------------------------------------------

-- 
-- โครงสร้างตาราง `tb_department`
-- 

CREATE TABLE `tb_department` (
  `dp_id` int(2) NOT NULL auto_increment,
  `dp_order` int(1) default '99',
  `dp_name` varchar(64) NOT NULL default '',
  `dp_tel` varchar(16) NOT NULL default '',
  `dp_flag` char(1) NOT NULL default '',
  PRIMARY KEY  (`dp_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=tis620 COMMENT='ส่วนราชการ (ภาควิชา/หน' AUTO_INCREMENT=43 ;

-- 
-- dump ตาราง `tb_department`
-- 

INSERT INTO `tb_department` VALUES (1, 0, 'คณะสาธารณสุขศาสตร์', '', '1');
INSERT INTO `tb_department` VALUES (2, 1, 'ภาควิชาการพยาบาลสาธารณสุข', '3402', '1');
INSERT INTO `tb_department` VALUES (3, 2, 'ภาควิชาจุลชีววิทยา', '6514', '1');
INSERT INTO `tb_department` VALUES (4, 3, 'ภาควิชาชีวสถิติ', '3203', '1');
INSERT INTO `tb_department` VALUES (5, 4, 'ภาควิชาบริหารงานสาธารณสุข', '2304', '1');
INSERT INTO `tb_department` VALUES (6, 5, 'ภาควิชาปรสิตวิทยา', '1208', '1');
INSERT INTO `tb_department` VALUES (7, 6, 'ภาควิชาโภชนวิทยา', '1304', '1');
INSERT INTO `tb_department` VALUES (8, 7, 'ภาควิชาระบาดวิทยา', '3301', '1');
INSERT INTO `tb_department` VALUES (9, 8, 'ภาควิชาวิทยาศาสตร์อนามัยสิ่งแวดล้อม', '2403', '1');
INSERT INTO `tb_department` VALUES (10, 9, 'ภาควิชาวิศวกรรมสุขาภิบาล', '2201', '1');
INSERT INTO `tb_department` VALUES (11, 10, 'ภาควิชาสุขศึกษาและพฤติกรรมศาสตร์', '3604', '1');
INSERT INTO `tb_department` VALUES (12, 11, 'ภาควิชาอนามัยครอบครัว', '1302', '1');
INSERT INTO `tb_department` VALUES (13, 12, 'ภาควิชาอาชีวอนามัยและความปลอดภัย', '2601', '1');
INSERT INTO `tb_department` VALUES (14, 13, 'สถานฝึกอบรมและวิจัยอนามัยชนบท', '', '1');
INSERT INTO `tb_department` VALUES (15, 14, 'สำนักงานคณบดี', '1110', '1');
INSERT INTO `tb_department` VALUES (16, 14, 'หน่วยการเงินและบัญชี', '', '1');
INSERT INTO `tb_department` VALUES (17, 14, 'หน่วยพัสดุ', '5102, 5107', '1');
INSERT INTO `tb_department` VALUES (18, 14, 'หน่วยสารบรรณ', '', '1');
INSERT INTO `tb_department` VALUES (19, 14, 'หน่วยซ่อมบำรุง', '', '1');
INSERT INTO `tb_department` VALUES (20, 22, 'งานนโยบายและแผน', '', '1');
INSERT INTO `tb_department` VALUES (21, 24, 'งานบริการการศึกษา', '', '1');
INSERT INTO `tb_department` VALUES (22, 14, 'หน่วยการเจ้าหน้าที่', '', '1');
INSERT INTO `tb_department` VALUES (23, 14, 'หน่วยยานยนต์', '', '1');
INSERT INTO `tb_department` VALUES (24, 14, 'หน่วยประชาสัมพันธ์', '', '1');
INSERT INTO `tb_department` VALUES (25, 14, 'หน่วยบริหารและพัฒนางานวิจัย', '', '1');
INSERT INTO `tb_department` VALUES (26, 14, 'หน่วยวิเทศสัมพันธ์', '', '1');
INSERT INTO `tb_department` VALUES (27, 14, 'ศูนย์ผลิตและพัฒนาสื่อสาธารณสุข', '', '1');
INSERT INTO `tb_department` VALUES (28, 14, 'หน่วยประสานงานหลักสูตร ส.ม.', '', '1');
INSERT INTO `tb_department` VALUES (29, 14, 'สำนักงานเทคโนโลยีสาธารณสุข', '', '1');
INSERT INTO `tb_department` VALUES (30, 14, 'สำนักงานปฏิบัติการกลาง', '', '1');
INSERT INTO `tb_department` VALUES (31, 14, 'ฝ่ายเลขานุการ', '', '1');
INSERT INTO `tb_department` VALUES (32, 14, 'หน่วยเทคโนโลยีสารสนเทศ', '7305', '1');
INSERT INTO `tb_department` VALUES (33, 14, 'หน่วยอาคารสถานที่', '', '1');
INSERT INTO `tb_department` VALUES (34, 14, 'หน่วยบริการการประชุม', '', '1');
INSERT INTO `tb_department` VALUES (35, 14, 'หน่วยประสานงานหลักสูตร ส.ด.', '', '1');
INSERT INTO `tb_department` VALUES (36, 14, 'ฝ่ายกิจการนักศึกษา', '', '1');
INSERT INTO `tb_department` VALUES (37, 14, 'ศูนย์ส่งเสริมสุขภาพ', '', '1');
INSERT INTO `tb_department` VALUES (38, 23, 'งานคลังและพัสดุ', '', '1');
INSERT INTO `tb_department` VALUES (39, 21, 'งานบริหารและธุรการ', '', '1');
INSERT INTO `tb_department` VALUES (40, 51, 'ชมรมดนตรีไทย', '', '2');
INSERT INTO `tb_department` VALUES (42, 99, 'โครงการเร่งรัดพัฒนาบัณฑิตทันตแพทย์', '', '1');

-- --------------------------------------------------------

-- 
-- โครงสร้างตาราง `tb_ulog`
-- 

CREATE TABLE `tb_ulog` (
  `ul_id` int(4) unsigned NOT NULL auto_increment,
  `us_id` int(2) default NULL,
  `ul_in` datetime default '0000-00-00 00:00:00',
  `ul_out` datetime default '0000-00-00 00:00:00',
  `ul_ip` varchar(16) NOT NULL default '',
  PRIMARY KEY  (`ul_id`)
) ENGINE=MyISAM DEFAULT CHARSET=tis620 PACK_KEYS=0 COMMENT='บันทึกการเข้าใช้งานร' AUTO_INCREMENT=1 ;

-- 
-- dump ตาราง `tb_ulog`
-- 


-- --------------------------------------------------------

-- 
-- โครงสร้างตาราง `tb_user`
-- 

CREATE TABLE `tb_user` (
  `us_id` int(2) NOT NULL auto_increment,
  `us_name` varchar(255) NOT NULL,
  `us_pwd` varchar(255) NOT NULL,
  `names` varchar(255) default NULL,
  `email` varchar(255) default NULL,
  `dp_id` int(2) default '0',
  `us_type` varchar(255) default NULL,
  `us_flag` char(1) NOT NULL default '1',
  PRIMARY KEY  (`us_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=tis620 COMMENT='ข้อมูลผู้ใช้งานระบบ' AUTO_INCREMENT=24 ;

-- 
-- dump ตาราง `tb_user`
-- 

INSERT INTO `tb_user` VALUES (1, 'phadmin', 'aawd', 'Chakkapan Charupoom', 'chakkapan@most.go.th', 1, 'admin', '1');
INSERT INTO `tb_user` VALUES (2, 'PH01', 'aawd', NULL, NULL, 1, '1', '1');
INSERT INTO `tb_user` VALUES (3, 'PH02', 'aawd', NULL, NULL, 1, '2', '1');
INSERT INTO `tb_user` VALUES (4, 'PHPN', 'aawd', NULL, NULL, 2, '6', '1');
INSERT INTO `tb_user` VALUES (5, 'PHMI', 'aawd', NULL, NULL, 3, '6', '1');
INSERT INTO `tb_user` VALUES (6, 'PHBS', 'aawd', NULL, NULL, 4, '6', '1');
INSERT INTO `tb_user` VALUES (7, 'PHAD', 'aawd', NULL, NULL, 5, '6', '1');
INSERT INTO `tb_user` VALUES (8, 'PHPR', 'aawd', NULL, NULL, 6, '6', '1');
INSERT INTO `tb_user` VALUES (9, 'PHNU', 'aawd', NULL, NULL, 7, '6', '1');
INSERT INTO `tb_user` VALUES (10, 'PHEP', 'aawd', NULL, NULL, 8, '6', '1');
INSERT INTO `tb_user` VALUES (11, 'PHSS', 'aawd', NULL, NULL, 9, '6', '1');
INSERT INTO `tb_user` VALUES (12, 'PHSE', 'aawd', NULL, NULL, 10, '6', '1');
INSERT INTO `tb_user` VALUES (13, 'PHHE', 'aawd', NULL, NULL, 11, '6', '1');
INSERT INTO `tb_user` VALUES (14, 'PHFH', 'aawd', NULL, NULL, 12, '6', '1');
INSERT INTO `tb_user` VALUES (15, 'PHOH', 'aawd', NULL, NULL, 13, '6', '1');
INSERT INTO `tb_user` VALUES (16, 'PHSTB', 'aawd', NULL, NULL, 14, '6', '1');
INSERT INTO `tb_user` VALUES (17, 'PHSOIT', 'aawd', NULL, NULL, 32, '6', '1');
INSERT INTO `tb_user` VALUES (18, 'PH08', 'aawd', NULL, NULL, 1, '8', '2');
INSERT INTO `tb_user` VALUES (19, 'PHSOFA', 'aawd', NULL, NULL, 16, '6', '1');
INSERT INTO `tb_user` VALUES (20, 'PHSO', 'aawd', NULL, NULL, 15, '6', '1');
INSERT INTO `tb_user` VALUES (21, 'PHSOPO', 'aawd', NULL, NULL, 17, '6', '1');
INSERT INTO `tb_user` VALUES (22, 'PHSTS', 'aawd', NULL, NULL, 14, '6', '1');
INSERT INTO `tb_user` VALUES (23, 'PHEPDT', 'aawd', NULL, NULL, 42, '6', '1');

-- --------------------------------------------------------

-- 
-- โครงสร้างตาราง `teacher`
-- 

CREATE TABLE `teacher` (
  `id` int(5) NOT NULL auto_increment,
  `teacher` varchar(255) NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=7 ;

-- 
-- dump ตาราง `teacher`
-- 

INSERT INTO `teacher` VALUES (1, 'อ.พร้อมลักษณ์  สมบูรณ์ปัญญากุล');
INSERT INTO `teacher` VALUES (2, 'ผศ.สุภัทร  ไชยกุล');
INSERT INTO `teacher` VALUES (3, 'ผศ.ณัฐนารีย์  เอมยงค์');
INSERT INTO `teacher` VALUES (4, 'อ.นัฐนารี  เอมยงค์');
INSERT INTO `teacher` VALUES (5, 'ผศ.ปรารถนา  สถิตวิภาวี');
INSERT INTO `teacher` VALUES (6, 'รศ.ชูเกียรติ  วิวัฒน์วงศ์เกษฒ');
