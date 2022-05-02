-- phpMyAdmin SQL Dump
-- version 3.3.7
-- http://www.phpmyadmin.net
--
-- โฮสต์: localhost
-- เวลาในการสร้าง: 
-- รุ่นของเซิร์ฟเวอร์: 5.0.51
-- รุ่นของ PHP: 5.2.6

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- ฐานข้อมูล: `phlabcom`
--

-- --------------------------------------------------------

--
-- โครงสร้างตาราง `admin`
--

CREATE TABLE IF NOT EXISTS `admin` (
  `NO` int(5) default NULL,
  KEY `NO` (`NO`)
) ENGINE=InnoDB DEFAULT CHARSET=tis620;

--
-- dump ตาราง `admin`
--

INSERT INTO `admin` (`NO`) VALUES
(1),
(62),
(68),
(89);

-- --------------------------------------------------------

--
-- โครงสร้างตาราง `config`
--

CREATE TABLE IF NOT EXISTS `config` (
  `online` int(1) default NULL,
  `sitename` varchar(200) default NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- dump ตาราง `config`
--

INSERT INTO `config` (`online`, `sitename`) VALUES
(1, NULL);

-- --------------------------------------------------------

--
-- โครงสร้างตาราง `day_name`
--

CREATE TABLE IF NOT EXISTS `day_name` (
  `id` int(1) NOT NULL auto_increment,
  `d` varchar(5) default NULL,
  `days` varchar(10) default NULL,
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=8 ;

--
-- dump ตาราง `day_name`
--

INSERT INTO `day_name` (`id`, `d`, `days`) VALUES
(1, 'อา.', 'อาทิตย์'),
(2, 'จ.', 'จันทร์'),
(3, 'อ.', 'อังคาร'),
(4, 'พ.', 'พุธ'),
(5, 'พฤ.', 'พฤหัสบดี'),
(6, 'ศ.', 'ศุกร์'),
(7, 'ส.', 'เสาร์');

-- --------------------------------------------------------

--
-- โครงสร้างตาราง `jos_users`
--

CREATE TABLE IF NOT EXISTS `jos_users` (
  `id` int(11) NOT NULL auto_increment,
  `name` varchar(255) NOT NULL default '',
  `surname` varchar(200) default NULL,
  `username` varchar(150) NOT NULL default '',
  `email` varchar(100) NOT NULL default '',
  `password` varchar(100) NOT NULL default '',
  `usertype` varchar(25) NOT NULL default '1',
  `block` tinyint(4) NOT NULL default '0',
  `sendEmail` tinyint(4) default '0',
  `gid` tinyint(3) unsigned NOT NULL default '1',
  `registerDate` datetime NOT NULL default '0000-00-00 00:00:00',
  `lastvisitDate` datetime NOT NULL default '0000-00-00 00:00:00',
  `activation` varchar(100) NOT NULL default '',
  `params` text NOT NULL,
  `DeID` int(5) default NULL,
  `tel` varchar(20) default NULL,
  `img` text,
  PRIMARY KEY  (`id`),
  KEY `usertype` (`usertype`),
  KEY `idx_name` (`name`),
  KEY `gid_block` (`gid`,`block`),
  KEY `username` (`username`),
  KEY `email` (`email`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=93 ;

--
-- dump ตาราง `jos_users`
--

INSERT INTO `jos_users` (`id`, `name`, `surname`, `username`, `email`, `password`, `usertype`, `block`, `sendEmail`, `gid`, `registerDate`, `lastvisitDate`, `activation`, `params`, `DeID`, `tel`, `img`) VALUES
(62, 'Chakkapan Charupoom', NULL, 'admin', 'phccr@mahidol.ac.th', 'admin', '2', 0, 1, 25, '2009-09-24 13:50:11', '2011-03-29 17:50:24', '', 'admin_language=\nlanguage=\neditor=fckeditor\nhelpsite=\ntimezone=7\npage_title=แก้ไขรายละเอียดของคุณ\nshow_page_title=1\n\n', 32, '7305,7306', NULL),
(69, 'Chakkapan Charupoom', NULL, 'chakkapan', 'chakkapan@ovi.com', '123456', 'Administrator', 0, 1, 24, '2009-09-27 13:45:56', '2010-07-30 02:34:49', '4b688ea69c83ef9436db5b7407cefdb2', 'language=\ntimezone=7\nadmin_language=\neditor=\nhelpsite=\npage_title=Edit Your Details\nshow_page_title=1\n\n', 32, NULL, NULL),
(68, 'วีณา', NULL, 'itunit', 'phwww@mahidol.ac.th', '123456', '2', 0, 1, 21, '2009-09-27 11:17:26', '2010-06-17 08:07:23', '', 'admin_language=th-TH\r\nlanguage=th-TH\r\neditor=\r\nhelpsite=\r\ntimezone=7\r\n\r\n', 32, '7305', NULL),
(70, 'user2', NULL, 'user2', 'user2@user2', '123456', 'Author', 1, 0, 19, '2009-10-23 10:34:23', '2009-10-28 07:56:23', '', 'admin_language=\nlanguage=\neditor=\nhelpsite=\ntimezone=7\n\n', 32, NULL, NULL),
(71, 'ภาควิชาจุลชีววิทยา', NULL, 'phmi01', 'phmi01@localhost', '123456', 'Author', 0, 0, 19, '2010-03-12 02:23:41', '2010-07-29 07:28:38', '', 'language=\neditor=\nhelpsite=\ntimezone=7\n\n', 3, NULL, NULL),
(72, 'ภาควิชาชีวสถิติ', NULL, 'phbs02', 'phbs02@localhost', '123456', 'Author', 0, 0, 19, '2010-03-12 02:26:39', '2010-07-29 06:36:38', '', 'admin_language=\nlanguage=\neditor=\nhelpsite=\ntimezone=7\n\n', 4, NULL, NULL),
(73, 'ภาควิชาบริหารงานสาธารณสุข', NULL, 'phad03', 'phad03@localhost', '123456', 'Author', 0, 0, 19, '2010-03-12 02:27:31', '2010-07-30 01:58:35', '', 'admin_language=\nlanguage=\neditor=\nhelpsite=\ntimezone=7\n\n', 5, NULL, NULL),
(74, 'ภาควิชาปรสิตวิทยาและกีฏวิทยา', NULL, 'phpr04', 'phpr04@localhost', '123456', 'Author', 0, 0, 19, '2010-03-12 02:28:48', '2010-07-29 06:37:03', '', 'admin_language=\nlanguage=\neditor=\nhelpsite=\ntimezone=7\n\n', 6, NULL, NULL),
(75, 'ภาควิชาการพยาบาลสาธารณสุข', NULL, 'phpn05', 'phpn05@localhost', '123456', 'Author', 0, 0, 19, '2010-03-12 02:29:43', '2010-07-29 07:27:30', '', 'admin_language=\nlanguage=\neditor=\nhelpsite=\ntimezone=7\n\n', 2, NULL, NULL),
(76, 'ภาควิชาโภชนวิทยา', NULL, 'phnu06', 'phnu06@localhost', '123456', 'Author', 0, 0, 19, '2010-03-12 02:31:16', '2010-07-29 06:38:20', '', 'language=\neditor=\nhelpsite=\ntimezone=7\n\n', 7, NULL, NULL),
(77, 'ภาควิชาระบาดวิทยา', NULL, 'phep07', 'phep07@localhost', '123456', 'Author', 0, 0, 19, '2010-03-12 02:32:02', '2010-07-29 08:04:35', '', 'admin_language=\nlanguage=\neditor=\nhelpsite=\ntimezone=7\n\n', 8, NULL, NULL),
(78, 'ภาควิชาวิศวกรรมสุขาภิบาล', NULL, 'phse08', 'phse08@localhost', '123456', 'Author', 0, 0, 19, '2010-03-12 02:32:55', '0000-00-00 00:00:00', '', 'admin_language=\r\nlanguage=\r\neditor=\r\nhelpsite=\r\ntimezone=7\r\n\r\n', 10, NULL, NULL),
(79, 'ภาควิชาวิทยาศาสตร์อนามัยสิ่งแวดล้อม', NULL, 'phss09', 'phss09@localhost', '123456', 'Author', 0, 0, 19, '2010-03-12 02:33:45', '2010-07-29 07:00:20', '', 'admin_language=\r\nlanguage=\r\neditor=\r\nhelpsite=\r\ntimezone=7\r\n\r\n', 9, NULL, NULL),
(80, 'ภาควิชาสุขศึกษาและพฤติกรรมศาสตร์', NULL, 'phhe10', 'phhe10@localhost', '123456', 'Author', 0, 0, 19, '2010-03-12 02:34:43', '2010-07-29 07:10:25', '', 'admin_language=\nlanguage=\neditor=\nhelpsite=\ntimezone=7\n\n', 11, NULL, NULL),
(81, 'ภาควิชาอนามัยครอบครัว', NULL, 'phfh11', 'phfh11@localhost', '123456', 'Author', 0, 0, 19, '2010-03-12 02:35:26', '2010-07-29 07:10:21', '', 'admin_language=\nlanguage=\neditor=\nhelpsite=\ntimezone=7\n\n', 12, NULL, NULL),
(82, 'ภาควิชาอาชีวอนามัยและความปลอดภัย', NULL, 'phoh12', 'phoh12@localhost', '123456', 'Author', 0, 0, 19, '2010-03-12 02:36:23', '0000-00-00 00:00:00', '', 'admin_language=\nlanguage=\neditor=\nhelpsite=\ntimezone=7\n\n', 13, NULL, NULL),
(83, 'สถานฝึกอบรมและวิจัยอนามัยชนบท', NULL, 'phst13', 'phst13@localhost', '123456', 'Author', 0, 0, 19, '2010-03-12 02:37:18', '0000-00-00 00:00:00', '', 'admin_language=\nlanguage=\neditor=\nhelpsite=\ntimezone=7\n\n', 14, NULL, NULL),
(84, 'สำนักบริการเทคโนโลยีสาธารณสุข', NULL, 'phet14', 'phet14@localhost', '123456', 'Author', 0, 0, 19, '2010-03-12 02:38:08', '0000-00-00 00:00:00', '', 'admin_language=\nlanguage=\neditor=\nhelpsite=\ntimezone=7\n\n', 15, NULL, NULL),
(85, 'หน่วยบริการวิชาการและธุรกิจสัมพันธ์', NULL, 'phac15', 'phac15@localhost', '123456', 'Author', 0, 0, 19, '2010-03-12 02:39:10', '0000-00-00 00:00:00', '', 'admin_language=\nlanguage=\neditor=\nhelpsite=\ntimezone=7\n\n', 16, NULL, NULL),
(86, 'หน่วยวิเทศสัมพันธ์และฝึกอบรมนานาชาติ', NULL, 'phir16', 'phir16@localhost', '123456', 'Author', 0, 0, 19, '2010-03-12 02:40:00', '0000-00-00 00:00:00', '', 'admin_language=\nlanguage=\neditor=\nhelpsite=\ntimezone=7\n\n', 17, NULL, NULL),
(87, 'หน่วยสารบรรณ', NULL, 'phcr17', 'phcr17@localhost', '123456', 'Author', 0, 0, 19, '2010-03-12 02:40:35', '0000-00-00 00:00:00', '', 'admin_language=\nlanguage=\neditor=\nhelpsite=\ntimezone=7\n\n', 18, NULL, NULL),
(88, 'สำนักงานคณบดี', NULL, 'phso18', 'phso18@localhost', '123456', 'Author', 0, 0, 19, '2010-03-12 02:41:05', '0000-00-00 00:00:00', '', 'admin_language=\nlanguage=\neditor=\nhelpsite=\ntimezone=7\n\n', 19, NULL, NULL),
(89, 'สุนันทา ไตรภพ', NULL, 'phteste', 'phteste@hotmail.com', '123456', '2', 0, 0, 21, '2010-06-03 01:56:32', '2010-06-03 07:41:41', '', 'admin_language=\r\nlanguage=\r\neditor=\r\nhelpsite=\r\ntimezone=7\r\n\r\n', 32, '7306', NULL),
(90, 'phadmin', NULL, 'phadmin', 'sirimayee@hotmail.com', '123456', 'Author', 0, 0, 19, '2010-06-03 02:27:45', '2010-06-03 07:29:28', '', 'admin_language=\nlanguage=\neditor=\nhelpsite=\ntimezone=7\n\n', 20, NULL, NULL),
(91, 'phnu', NULL, 'phnu', 'phnu@phnu', '123456', 'Author', 0, 0, 19, '2010-06-03 07:22:41', '2010-06-03 07:28:59', '', 'admin_language=\nlanguage=\neditor=\nhelpsite=\ntimezone=7\n\n', 20, NULL, NULL);

-- --------------------------------------------------------

--
-- โครงสร้างตาราง `labcom_booktemp`
--

CREATE TABLE IF NOT EXISTS `labcom_booktemp` (
  `uq_id` int(11) NOT NULL auto_increment,
  `u_id` int(11) default '0',
  `cr_id` int(11) default '0',
  `uname` varchar(255) default NULL,
  `crname` varchar(29) default NULL,
  `Dater` varchar(20) default '0000-00-00' COMMENT 'วันที่จอง',
  `time_in` varchar(5) default NULL,
  `time_out` varchar(5) default NULL,
  `title` text COMMENT 'หัวข้อการประชุม',
  `detail` varchar(30) default NULL COMMENT 'จำนวนผู้เข้าร่วม',
  `phone` varchar(10) default NULL,
  `type` char(3) default NULL,
  `pratan` varchar(20) default NULL,
  `optionss` longtext,
  `T_in` varchar(5) default NULL,
  `T_out` varchar(5) default NULL,
  `created` datetime default NULL COMMENT 'วันที่ทำรายการ',
  `status1` varchar(10) default 'wait' COMMENT '1=ใช้งาน,0=ยกเลิก',
  `modified_by` int(3) default NULL,
  `modified` datetime default NULL,
  `confirm` datetime default NULL,
  `confirm_by` int(5) default NULL,
  `DeID` int(5) default NULL,
  PRIMARY KEY  (`uq_id`),
  KEY `DeID` (`DeID`)
) ENGINE=MyISAM  DEFAULT CHARSET=tis620 PACK_KEYS=0 AUTO_INCREMENT=53 ;

--
-- dump ตาราง `labcom_booktemp`
--


-- --------------------------------------------------------

--
-- โครงสร้างตาราง `mail`
--

CREATE TABLE IF NOT EXISTS `mail` (
  `texts` text,
  `userId` int(2) default NULL,
  `dateSent` datetime default NULL,
  `ipSent` varchar(20) default NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- dump ตาราง `mail`
--


-- --------------------------------------------------------

--
-- โครงสร้างตาราง `meetingroom_croom`
--

CREATE TABLE IF NOT EXISTS `meetingroom_croom` (
  `cr_id` int(11) NOT NULL auto_increment,
  `name` varchar(40) default NULL COMMENT 'ชื่อห้อง',
  `net` int(11) default '0' COMMENT 'ความจุ',
  `location` text,
  `parent` int(2) default NULL,
  `pro` varchar(9) default '0',
  `board` varchar(41) default NULL,
  `comp` varchar(9) default NULL,
  `trash` varchar(5) default NULL,
  `tt` int(34) default '0',
  `dater` varchar(50) default NULL,
  `picType` varchar(100) default NULL,
  `picData` text,
  `color` varchar(10) default NULL,
  `created_by` int(3) default NULL,
  `modified` text,
  `modified_by` int(3) default NULL,
  `enable` int(1) NOT NULL,
  PRIMARY KEY  (`cr_id`),
  KEY `name` (`name`),
  KEY `cr_id` (`cr_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=tis620 PACK_KEYS=0 AUTO_INCREMENT=38 ;

--
-- dump ตาราง `meetingroom_croom`
--

INSERT INTO `meetingroom_croom` (`cr_id`, `name`, `net`, `location`, `parent`, `pro`, `board`, `comp`, `trash`, `tt`, `dater`, `picType`, `picData`, `color`, `created_by`, `modified`, `modified_by`, `enable`) VALUES
(1, 'ห้องปฏิบัติการคอมพิวเตอร์ 7402', 30, '', 35, '0', '', '', '0', 0, ' | ', '', 'blank.jpg', 'orange', NULL, NULL, NULL, 1),
(2, 'ห้องปฏิบัติการคอมพิวเตอร์ 7403', 20, '', 35, '0', '', '', '0', 0, ' | ', '', 'blank.jpg', 'blue', NULL, NULL, NULL, 1),
(3, 'ห้องปฏิบัติการคอมพิวเตอร์ 7404', 20, '', 35, '0', '', '', '0', 0, ' | ', '', 'blank.jpg', 'green', NULL, NULL, NULL, 1);

-- --------------------------------------------------------

--
-- โครงสร้างตาราง `meetingroom_food`
--

CREATE TABLE IF NOT EXISTS `meetingroom_food` (
  `food_id` int(11) NOT NULL auto_increment,
  `food` varchar(100) NOT NULL,
  `cost` int(5) NOT NULL,
  `lastupdate` varchar(40) default NULL,
  PRIMARY KEY  (`food_id`),
  KEY `food` (`food`),
  KEY `food_id` (`food_id`,`food`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- dump ตาราง `meetingroom_food`
--

INSERT INTO `meetingroom_food` (`food_id`, `food`, `cost`, `lastupdate`) VALUES
(1, 'กาแฟ', 0, NULL),
(3, 'กาแฟ+อาหารว่าง', 0, '2010-06-28 13:13:43 | 127.0.0.1'),
(4, 'อาหารกลางวัน', 0, NULL);

-- --------------------------------------------------------

--
-- โครงสร้างตาราง `meetingroom_foodrelation`
--

CREATE TABLE IF NOT EXISTS `meetingroom_foodrelation` (
  `or_id` int(11) NOT NULL auto_increment,
  `uq_id` int(11) NOT NULL default '0',
  `food_id` varchar(30) NOT NULL default '-',
  `computer` varchar(30) NOT NULL default '-',
  `projecter` varchar(30) NOT NULL default '-',
  `other` text NOT NULL,
  `status1` varchar(12) default NULL,
  `drink` text,
  `status2` text,
  PRIMARY KEY  (`or_id`),
  KEY `uq_id` (`uq_id`,`food_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=tis620 PACK_KEYS=0 AUTO_INCREMENT=21 ;

--
-- dump ตาราง `meetingroom_foodrelation`
--

INSERT INTO `meetingroom_foodrelation` (`or_id`, `uq_id`, `food_id`, `computer`, `projecter`, `other`, `status1`, `drink`, `status2`) VALUES
(15, 12, '1', '', '', '', '', '', ''),
(16, 12, '1', '', '', '', '', '', ''),
(20, 14, '3', '', '', '', '', '', ''),
(19, 14, '1', '', '', '', '', '', '');

-- --------------------------------------------------------

--
-- โครงสร้างตาราง `meetingroom_media`
--

CREATE TABLE IF NOT EXISTS `meetingroom_media` (
  `media_id` int(11) NOT NULL auto_increment,
  `media` varchar(255) NOT NULL,
  `lastupdate` varchar(40) default NULL,
  PRIMARY KEY  (`media_id`),
  KEY `media` (`media`),
  KEY `media_id` (`media_id`,`media`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- dump ตาราง `meetingroom_media`
--

INSERT INTO `meetingroom_media` (`media_id`, `media`, `lastupdate`) VALUES
(1, 'Notebook', NULL),
(2, 'Projector', NULL),
(3, 'Visualizer', '2010-06-29 11:20:08 | 127.0.0.1');

-- --------------------------------------------------------

--
-- โครงสร้างตาราง `meetingroom_mediarelation`
--

CREATE TABLE IF NOT EXISTS `meetingroom_mediarelation` (
  `uq_id` int(5) NOT NULL,
  `media_id` int(5) NOT NULL,
  `net` varchar(5) NOT NULL,
  KEY `uq_id` (`uq_id`,`media_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- dump ตาราง `meetingroom_mediarelation`
--

INSERT INTO `meetingroom_mediarelation` (`uq_id`, `media_id`, `net`) VALUES
(12, 1, ''),
(12, 1, ''),
(12, 1, ''),
(14, 1, ''),
(14, 2, '');

-- --------------------------------------------------------

--
-- โครงสร้างตาราง `meetingroom_userq`
--

CREATE TABLE IF NOT EXISTS `meetingroom_userq` (
  `uq_id` int(11) NOT NULL auto_increment,
  `u_id` int(11) default '0',
  `cr_id` int(11) default '0',
  `uname` varchar(255) default NULL,
  `crname` varchar(29) default NULL,
  `Dater` varchar(20) default '0000-00-00' COMMENT 'วันที่จอง',
  `enddate` varchar(15) default NULL COMMENT 'วันสิ้นสุด',
  `time_in` varchar(5) default NULL,
  `time_out` varchar(5) default NULL,
  `title` text COMMENT 'หัวข้อ/วัตถุประสงค์',
  `edu_level` varchar(50) default NULL,
  `course` varchar(100) default NULL,
  `major` varchar(200) default NULL,
  `detail` varchar(30) default NULL COMMENT 'จำนวนผู้เข้าร่วม',
  `phone` varchar(10) default NULL,
  `type` char(3) default NULL,
  `pratan` varchar(20) default NULL,
  `optionss` longtext,
  `T_in` varchar(5) default NULL,
  `T_out` varchar(5) default NULL,
  `created` datetime default NULL COMMENT 'วันที่ทำรายการ',
  `status1` varchar(10) default 'wait' COMMENT '1=ใช้งาน,0=ยกเลิก',
  `modified_by` int(3) default NULL,
  `modified` datetime default NULL,
  `confirm` datetime default NULL,
  `confirm_by` int(5) default NULL,
  `DeID` int(5) default NULL,
  PRIMARY KEY  (`uq_id`),
  KEY `DeID` (`DeID`)
) ENGINE=MyISAM  DEFAULT CHARSET=tis620 PACK_KEYS=0 AUTO_INCREMENT=84 ;

--
-- dump ตาราง `meetingroom_userq`
--

INSERT INTO `meetingroom_userq` (`uq_id`, `u_id`, `cr_id`, `uname`, `crname`, `Dater`, `enddate`, `time_in`, `time_out`, `title`, `edu_level`, `course`, `major`, `detail`, `phone`, `type`, `pratan`, `optionss`, `T_in`, `T_out`, `created`, `status1`, `modified_by`, `modified`, `confirm`, `confirm_by`, `DeID`) VALUES
(29, 68, 1, NULL, NULL, '2010-10-18', '2010-10-18', NULL, NULL, 'สศสอ.306 คอมพิวเตอร์สำหรับงานอนามัยชุมชน นศ.วิทยาศาสตรบํณฑิต (สาธารณสุขศาสตร์) เอกอนามัยชุมชน ชั้นปีที่ 3 ', NULL, NULL, NULL, '34', NULL, NULL, NULL, '', '10:00', '15:00', '2010-10-04 16:01:44', '1', NULL, NULL, NULL, NULL, 32),
(28, 68, 1, NULL, NULL, '2010-10-11', '2010-10-11', NULL, NULL, 'สศสอ.306 คอมพิวเตอร์สำหรับงานอนามัยชุมชน นศ.วิทยาศาสตรบํณฑิต (สาธารณสุขศาสตร์) เอกอนามัยชุมชน ชั้นปีที่ 3 ', NULL, NULL, NULL, '34', NULL, NULL, NULL, '', '10:00', '15:00', '2010-10-04 16:00:25', '1', NULL, NULL, NULL, NULL, 32),
(26, 68, 2, NULL, NULL, '2010-09-20', '2010-09-20', NULL, NULL, 'นักศึกษาซูดาน ขอใช้งานโปรแกรม End Note x4', NULL, NULL, NULL, '18', NULL, NULL, NULL, '', '09:00', '16:00', '2010-09-17 17:44:09', '1', NULL, '2010-09-17 17:48:31', NULL, NULL, 32),
(27, 68, 3, NULL, NULL, '2010-09-22', '2010-09-22', NULL, NULL, 'สศออ. 654 การประเมินความเสี่ยงและการบริหารความเสี่ยง ', NULL, NULL, NULL, '22', NULL, NULL, NULL, 'CAMEO & ALOHA', '09:00', '12:00', '2010-09-17 17:45:19', '1', NULL, NULL, NULL, NULL, 32),
(25, 68, 3, NULL, NULL, '2010-09-17', '2010-09-17', NULL, NULL, 'นักศึกษาซูดาน ขอให้โปรแกรม MineManager7.0', NULL, NULL, NULL, '18', NULL, NULL, NULL, '', '09:00', '16:00', '2010-09-17 17:43:34', '1', NULL, '2010-09-17 17:48:55', NULL, NULL, 32),
(24, 68, 3, NULL, NULL, '2010-10-04', '2010-10-04', NULL, NULL, 'PHBS 651 Computer Application in Health Science Research', NULL, NULL, NULL, '6', NULL, NULL, NULL, '', '13:00', '16:00', '2010-09-17 17:41:32', '1', NULL, NULL, NULL, NULL, 32),
(23, 68, 3, NULL, NULL, '2010-09-27', '2010-09-27', NULL, NULL, 'PHBS 651 Computer Application in Health Science Research', NULL, NULL, NULL, '6', NULL, NULL, NULL, '', '13:00', '16:00', '2010-09-17 17:40:53', '1', NULL, NULL, NULL, NULL, 32),
(22, 68, 3, NULL, NULL, '2010-09-20', '2010-09-20', NULL, NULL, 'PHBS 651 Computer Application in Health Science Research', NULL, NULL, NULL, '6', NULL, NULL, NULL, '', '13:00', '16:00', '2010-09-17 17:39:56', '1', NULL, NULL, NULL, NULL, 32),
(30, 68, 0, NULL, NULL, '2010-11-08', '2010-11-08', NULL, NULL, 'สศสอ.306 คอมพิวเตอร์สำหรับงานอนามัยชุมชน นศ.วิทยาศาสตรบํณฑิต (สาธารณสุขศาสตร์) เอกอนามัยชุมชน ชั้นปีที่ 3 ', NULL, NULL, NULL, '34', NULL, NULL, NULL, '', '10:00', '15:00', '2010-10-04 16:04:25', '1', NULL, NULL, NULL, NULL, 32),
(31, 77, 2, NULL, NULL, '2010-11-05', '2010-11-05', NULL, NULL, 'ใช้ในการเรียนการสอนรายวิชา สศรบ 626 การใช้คอมพิวเตอร์และระบบสารสนเทศในการศึกษาวิจัยทางวิทยาการระบาด', NULL, NULL, NULL, '30', NULL, NULL, NULL, 'SPSS 17.0, Endnote13, WStata10,Microsoft Office 2003 หรือ Microsoft Office 2007', '13:00', '16:00', '2010-10-06 08:12:43', '1', NULL, '2010-10-06 10:05:11', NULL, NULL, 8),
(32, 77, 2, NULL, NULL, '2010-11-12', '2010-11-12', NULL, NULL, 'ใช้ในการเรียนการสอนรายวิชา สศรบ 626 การใช้คอมพิวเตอร์และระบบสารสนเทศในการศึกษาวิจัยทางวิทยาการระบาด', NULL, NULL, NULL, '30', NULL, NULL, NULL, 'โปรแกรม SPSS 17.0 โปรแกรม STATA 10.0 และโปรแกรม   Endnote 13.0 ', '13:00', '16:00', '2010-10-06 10:06:46', '1', NULL, NULL, NULL, NULL, 8),
(33, 77, 2, NULL, NULL, '2010-11-19', '2010-11-19', NULL, NULL, 'ใช้ในการเรียนการสอนรายวิชา สศรบ 626 การใช้คอมพิวเตอร์และระบบสารสนเทศในการศึกษาวิจัยทางวิทยาการระบาด', NULL, NULL, NULL, '30', NULL, NULL, NULL, 'โปรแกรม SPSS 17.0 โปรแกรม STATA 10.0 และโปรแกรม   Endnote 13.0 ', '13:00', '16:00', '2010-10-06 10:07:30', '1', NULL, NULL, NULL, NULL, 8),
(34, 77, 2, NULL, NULL, '2010-11-26', '2010-11-26', NULL, NULL, 'ใช้ในการเรียนการสอนรายวิชา สศรบ 626 การใช้คอมพิวเตอร์และระบบสารสนเทศในการศึกษาวิจัยทางวิทยาการระบาด', NULL, NULL, NULL, '30', NULL, NULL, NULL, 'โปรแกรม SPSS 17.0 โปรแกรม STATA 10.0 และโปรแกรม   Endnote 13.0 ', '13:00', '16:00', '2010-10-06 10:08:50', '1', NULL, NULL, NULL, NULL, 8),
(35, 77, 2, NULL, NULL, '2010-12-03', '2010-12-03', NULL, NULL, 'ใช้ในการเรียนการสอนรายวิชา สศรบ 626 การใช้คอมพิวเตอร์และระบบสารสนเทศในการศึกษาวิจัย ทางวิทยาการระบาด ', NULL, NULL, NULL, '30', NULL, NULL, NULL, 'โปรแกรม SPSS 17.0 โปรแกรม STATA 10.0 และโปรแกรม   Endnote 13.0 ', '13:00', '16:00', '2010-10-06 10:10:21', '1', NULL, '2010-10-06 10:10:50', NULL, NULL, 8),
(36, 77, 2, NULL, NULL, '2010-12-17', '2010-12-17', NULL, NULL, 'ใช้ในการเรียนการสอนรายวิชา สศรบ 626 การใช้คอมพิวเตอร์และระบบสารสนเทศในการศึกษาวิจัย ทางวิทยาการระบาด', NULL, NULL, NULL, '30', NULL, NULL, NULL, 'โปรแกรม SPSS 17.0 โปรแกรม STATA 10.0 และโปรแกรม   Endnote 13.0 ', '13:00', '16:00', '2010-10-06 10:11:35', '1', NULL, NULL, NULL, NULL, 8),
(37, 77, 2, NULL, NULL, '2010-12-24', '2010-12-24', NULL, NULL, 'ใช้ในการเรียนการสอนรายวิชา สศรบ 626 การใช้คอมพิวเตอร์และระบบสารสนเทศในการศึกษาวิจัย ทางวิทยาการระบาด', NULL, NULL, NULL, '30', NULL, NULL, NULL, 'โปรแกรม SPSS 17.0 \r\nโปรแกรม STATA 10.0 และโปรแกรม   Endnote 13.0 ', '13:00', '16:00', '2010-10-06 10:12:19', '1', NULL, NULL, NULL, NULL, 8),
(38, 77, 2, NULL, NULL, '2011-01-07', '2011-01-07', NULL, NULL, 'ใช้ในการเรียนการสอนรายวิชา สศรบ 626 การใช้คอมพิวเตอร์และระบบสารสนเทศในการศึกษาวิจัย ทางวิทยาการระบาด', NULL, NULL, NULL, '30', NULL, NULL, NULL, 'โปรแกรม SPSS 17.0 โปรแกรม STATA 10.0 และโปรแกรม   Endnote 13.0 ', '13:00', '16:00', '2010-10-06 10:13:42', '1', NULL, NULL, NULL, NULL, 8),
(39, 77, 2, NULL, NULL, '2011-01-14', '2011-01-14', NULL, NULL, 'ใช้ในการเรียนการสอนรายวิชา สศรบ 626 การใช้คอมพิวเตอร์และระบบสารสนเทศในการศึกษาวิจัย ทางวิทยาการระบาด', NULL, NULL, NULL, '30', NULL, NULL, NULL, 'โปรแกรม SPSS 17.0 โปรแกรม STATA 10.0 และโปรแกรม   Endnote 13.0 ', '13:00', '16:00', '2010-10-06 10:14:26', '1', NULL, NULL, NULL, NULL, 8),
(40, 77, 2, NULL, NULL, '2011-01-21', '2011-01-21', NULL, NULL, 'ใช้ในการเรียนการสอนรายวิชา สศรบ 626 การใช้คอมพิวเตอร์และระบบสารสนเทศในการศึกษาวิจัย ทางวิทยาการระบาด', NULL, NULL, NULL, '30', NULL, NULL, NULL, 'โปรแกรม SPSS 17.0 โปรแกรม STATA 10.0 และโปรแกรม   Endnote 13.0 ', '13:00', '16:00', '2010-10-06 10:15:07', '1', NULL, NULL, NULL, NULL, 8),
(41, 77, 2, NULL, NULL, '2011-01-28', '2011-01-28', NULL, NULL, 'ใช้ในการเรียนการสอนรายวิชา สศรบ 626 การใช้คอมพิวเตอร์และระบบสารสนเทศในการศึกษาวิจัย ทางวิทยาการระบาด', NULL, NULL, NULL, '30', NULL, NULL, NULL, 'โปรแกรม SPSS 17.0 โปรแกรม STATA 10.0 และโปรแกรม   Endnote 13.0 ', '13:00', '16:00', '2010-10-06 10:15:52', '1', NULL, NULL, NULL, NULL, 8),
(42, 77, 2, NULL, NULL, '2011-02-04', '2011-02-04', NULL, NULL, 'ใช้ในการเรียนการสอนรายวิชา สศรบ 626 การใช้คอมพิวเตอร์และระบบสารสนเทศในการศึกษาวิจัย ทางวิทยาการระบาด', NULL, NULL, NULL, '30', NULL, NULL, NULL, 'โปรแกรม SPSS 17.0 โปรแกรม STATA 10.0 และโปรแกรม   Endnote 13.0 ', '13:00', '16:00', '2010-10-06 10:16:39', '1', NULL, NULL, NULL, NULL, 8),
(43, 77, 2, NULL, NULL, '2011-02-11', '2011-02-11', NULL, NULL, 'ใช้ในการเรียนการสอนรายวิชา สศรบ 626 การใช้คอมพิวเตอร์และระบบสารสนเทศในการศึกษาวิจัย ทางวิทยาการระบาด', NULL, NULL, NULL, '30', NULL, NULL, NULL, 'โปรแกรม SPSS 17.0 โปรแกรม STATA 10.0 และโปรแกรม   Endnote 13.0 ', '13:00', '16:00', '2010-10-06 10:17:21', '1', NULL, NULL, NULL, NULL, 8),
(44, 77, 2, NULL, NULL, '2011-02-18', '2011-02-18', NULL, NULL, 'ใช้ในการเรียนการสอนรายวิชา สศรบ 626 การใช้คอมพิวเตอร์และระบบสารสนเทศในการศึกษาวิจัย ทางวิทยาการระบาด', NULL, NULL, NULL, '30', NULL, NULL, NULL, 'โปรแกรม SPSS 17.0 โปรแกรม STATA 10.0 และโปรแกรม   Endnote 13.0 ', '13:00', '16:00', '2010-10-06 10:18:01', '1', NULL, NULL, NULL, NULL, 8),
(45, 77, 2, NULL, NULL, '2011-02-25', '2011-02-25', NULL, NULL, 'ใช้ในการเรียนการสอนรายวิชา สศรบ 626 การใช้คอมพิวเตอร์และระบบสารสนเทศในการศึกษาวิจัย ทางวิทยาการระบาด', NULL, NULL, NULL, '30', NULL, NULL, NULL, 'โปรแกรม SPSS 17.0 โปรแกรม STATA 10.0 และโปรแกรม   Endnote 13.0 ', '13:00', '16:00', '2010-10-06 10:18:49', '1', NULL, NULL, NULL, NULL, 8),
(46, 76, 1, NULL, NULL, '2010-12-23', '2010-12-23', NULL, NULL, 'เพื่อสอนนักศึกษาระดับปริญญาตรี วิชา สศภว 450 การประเมินทางโภชนาการ (การวิเคราะห์อาหารด้วยโปรแกรมสำเร็จรูป) ', NULL, NULL, NULL, '45', NULL, NULL, NULL, '', '13:00', '17:00', '2010-10-07 14:26:14', '1', NULL, NULL, NULL, NULL, 7),
(47, 77, 1, NULL, NULL, '2010-11-01', '2010-11-01', NULL, NULL, 'การเรียนการสอนรายวิชา สศรบ 604 วิธีการทางสถิติในงานวิทยาการระบาด 1 ', NULL, NULL, NULL, '55', NULL, NULL, NULL, 'SPSS 17.0 Stata 10 Epi info 2003', '13:00', '17:00', '2010-10-13 12:55:37', '1', NULL, NULL, NULL, NULL, 8),
(48, 77, 1, NULL, NULL, '2010-12-13', '2010-12-13', NULL, NULL, 'การเรียนการสอนรายวิชา สศรบ 604 วิธีการทางสถิติในงานวิทยาการระบาด 1 ', NULL, NULL, NULL, '55', NULL, NULL, NULL, 'SPSS 17.0 Stata 10 Epi info 2003', '13:00', '17:00', '2010-10-13 12:56:29', '1', NULL, NULL, NULL, NULL, 8),
(49, 77, 1, NULL, NULL, '2010-12-20', '2010-12-20', NULL, NULL, 'การเรียนการสอนรายวิชา สศรบ 604 วิธีการทางสถิติในงานวิทยาการระบาด 1 ', NULL, NULL, NULL, '55', NULL, NULL, NULL, 'SPSS 17.0 Stata 10 Epi info 2003', '13:00', '17:00', '2010-10-13 12:57:20', '1', NULL, NULL, NULL, NULL, 8),
(50, 77, 1, NULL, NULL, '2011-01-06', '2011-01-06', NULL, NULL, 'การเรียนการสอนรายวิชา สศรบ 604 วิธีการทางสถิติในงานวิทยาการระบาด 1 ', NULL, NULL, NULL, '55', NULL, NULL, NULL, 'SPSS 17.0 Stata 10 Epi info 2003', '13:00', '17:00', '2010-10-13 12:58:05', '1', NULL, NULL, NULL, NULL, 8),
(51, 77, 1, NULL, NULL, '2011-01-24', '2011-01-24', NULL, NULL, 'การเรียนการสอนรายวิชา สศรบ 604 วิธีการทางสถิติในงานวิทยาการระบาด 1 ', NULL, NULL, NULL, '55', NULL, NULL, NULL, 'SPSS 17.0 Stata 10 Epi info 2003', '13:00', '17:00', '2010-10-13 12:58:57', '1', NULL, NULL, NULL, NULL, 8),
(52, 77, 1, NULL, NULL, '2011-02-14', '2011-02-14', NULL, NULL, 'การเรียนการสอนรายวิชา สศรบ 604 วิธีการทางสถิติในงานวิทยาการระบาด 1 ', NULL, NULL, NULL, '55', NULL, NULL, NULL, 'SPSS 17.0 Stata 10 Epi info 2003', '13:00', '17:00', '2010-10-13 12:59:41', '1', NULL, NULL, NULL, NULL, 8),
(54, 76, 3, NULL, NULL, '2010-11-09', '2010-11-09', NULL, NULL, 'สืบค้นข้อมูล', NULL, NULL, NULL, '13', NULL, NULL, NULL, '', '09:00', '11:00', '2010-11-01 10:59:31', '1', NULL, NULL, NULL, NULL, 7),
(55, 89, 3, NULL, NULL, '2010-11-30', '2010-11-30', NULL, NULL, 'PHBS 630', NULL, NULL, NULL, '20', NULL, NULL, NULL, 'spss', '09:00', '12:00', '2010-11-04 09:20:56', '1', NULL, NULL, NULL, NULL, 32),
(56, 72, 3, NULL, NULL, '2010-11-11', '2010-11-11', NULL, NULL, 'Introduction to STATA', NULL, NULL, NULL, '9', NULL, NULL, NULL, '', '09:00', '12:00', '2010-11-09 09:01:02', '1', NULL, NULL, NULL, NULL, 4),
(57, 72, 3, NULL, NULL, '2010-11-12', '2010-11-12', NULL, NULL, 'Theory of GLM I', NULL, NULL, NULL, '9', NULL, NULL, NULL, '', '09:00', '12:00', '2010-11-09 09:02:11', '1', NULL, NULL, NULL, NULL, 4),
(58, 72, 3, NULL, NULL, '2010-11-18', '2010-11-18', NULL, NULL, 'Theory of GLM II', NULL, NULL, NULL, '9', NULL, NULL, NULL, '', '09:00', '12:00', '2010-11-09 09:04:22', '1', NULL, NULL, NULL, NULL, 4),
(59, 72, 3, NULL, NULL, '2010-11-19', '2010-11-19', NULL, NULL, 'Linear Models of Full Rank: Regression Models', NULL, NULL, NULL, '9', NULL, NULL, NULL, '', '09:00', '12:00', '2010-11-09 09:08:06', '1', NULL, NULL, NULL, NULL, 4),
(60, 72, 3, NULL, NULL, '2010-11-25', '2010-11-25', NULL, NULL, 'Linear Models of Less Than Full Rank: One-way ANOVA, and Two-way ANOVA Models', NULL, NULL, NULL, '9', NULL, NULL, NULL, '', '09:00', '12:00', '2010-11-09 09:10:06', '1', NULL, NULL, NULL, NULL, 4),
(61, 72, 3, NULL, NULL, '2010-11-26', '2010-11-26', NULL, NULL, 'Linear Models: ANCOVA Models', NULL, NULL, NULL, '9', NULL, NULL, NULL, '', '09:00', '12:00', '2010-11-09 09:11:19', '1', NULL, NULL, NULL, NULL, 4),
(62, 72, 3, NULL, NULL, '2010-12-03', '2010-12-03', NULL, NULL, 'Logit Models for Binary Data', NULL, NULL, NULL, '9', NULL, NULL, NULL, '', '09:00', '12:00', '2010-11-09 09:12:29', '1', NULL, NULL, NULL, NULL, 4),
(63, 72, 3, NULL, NULL, '2010-12-06', '2010-12-06', NULL, NULL, 'Logit Models for Binary Data', NULL, NULL, NULL, '9', NULL, NULL, NULL, '', '09:00', '12:00', '2010-11-09 09:13:10', '1', NULL, NULL, NULL, NULL, 4),
(64, 72, 3, NULL, NULL, '2010-12-09', '2010-12-09', NULL, NULL, 'Polytomous/ Ordinal Logistic Regression for Multiple/ Ordinal Response Data', NULL, NULL, NULL, '9', NULL, NULL, NULL, '', '09:00', '12:00', '2010-11-09 09:38:41', '1', NULL, NULL, NULL, NULL, 4),
(65, 72, 3, NULL, NULL, '2010-12-13', '2010-12-13', NULL, NULL, 'Conditional Logit Models for Matched Data', NULL, NULL, NULL, '9', NULL, NULL, NULL, '', '09:00', '12:00', '2010-11-09 09:40:07', '1', NULL, NULL, NULL, NULL, 4),
(66, 72, 3, NULL, NULL, '2010-12-20', '2010-12-20', NULL, NULL, 'Examination Part I-III (Topic 1-10)', NULL, NULL, NULL, '9', NULL, NULL, NULL, '', '09:00', '12:00', '2010-11-09 09:42:01', '1', NULL, NULL, NULL, NULL, 4),
(67, 72, 3, NULL, NULL, '2010-12-23', '2010-12-23', NULL, NULL, 'Poisson Models for Count Data', NULL, NULL, NULL, '9', NULL, NULL, NULL, '', '09:00', '12:00', '2010-11-09 09:49:13', '1', NULL, NULL, NULL, NULL, 4),
(68, 72, 3, NULL, NULL, '2010-12-27', '2010-12-27', NULL, NULL, 'Truncated Count Models', NULL, NULL, NULL, '9', NULL, NULL, NULL, '', '09:00', '12:00', '2010-11-09 09:50:07', '1', NULL, NULL, NULL, NULL, 4),
(69, 72, 3, NULL, NULL, '2010-12-30', '2010-12-30', NULL, NULL, 'Log-Linear Models for Contingency Tables', NULL, NULL, NULL, '9', NULL, NULL, NULL, '', '09:00', '12:00', '2010-11-09 09:50:46', '1', NULL, NULL, NULL, NULL, 4),
(70, 72, 3, NULL, NULL, '2011-01-06', '2011-01-06', NULL, NULL, 'Capture-Recapture Models for Contingency Tables', NULL, NULL, NULL, '9', NULL, NULL, NULL, '', '09:00', '12:00', '2010-11-09 09:51:21', '1', NULL, NULL, NULL, NULL, 4),
(71, 72, 3, NULL, NULL, '2011-01-07', '2011-01-07', NULL, NULL, 'Survival Models I', NULL, NULL, NULL, '9', NULL, NULL, NULL, '', '09:00', '12:00', '2010-11-09 09:52:00', '1', NULL, NULL, NULL, NULL, 4),
(72, 72, 3, NULL, NULL, '2011-01-13', '2011-01-13', NULL, NULL, 'Survival Models II', NULL, NULL, NULL, '9', NULL, NULL, NULL, '', '09:00', '12:00', '2010-11-09 09:52:37', '1', NULL, NULL, NULL, NULL, 4),
(73, 72, 3, NULL, NULL, '2011-01-14', '2011-01-14', NULL, NULL, 'Multi-level and Repeated Measures Models', NULL, NULL, NULL, '9', NULL, NULL, NULL, '', '09:00', '12:00', '2010-11-09 09:53:02', '1', NULL, NULL, NULL, NULL, 4),
(74, 72, 3, NULL, NULL, '2011-01-20', '2011-01-20', NULL, NULL, 'Multi-level and Repeated Measures Models', NULL, NULL, NULL, '9', NULL, NULL, NULL, '', '09:00', '12:00', '2010-11-09 09:53:48', '1', NULL, NULL, NULL, NULL, 4),
(75, 72, 3, NULL, NULL, '2011-01-21', '2011-01-21', NULL, NULL, 'Multi-level and Repeated Measures Models', NULL, NULL, NULL, '9', NULL, NULL, NULL, '', '09:00', '12:00', '2010-11-09 09:54:48', '1', NULL, NULL, NULL, NULL, 4),
(76, 72, 3, NULL, NULL, '2011-01-27', '2011-01-27', NULL, NULL, 'Examination Part IV-V (Topic 12-20)', NULL, NULL, NULL, '9', NULL, NULL, NULL, '', '09:00', '12:00', '2010-11-09 09:55:22', '1', NULL, NULL, NULL, NULL, 4),
(77, 68, 1, NULL, NULL, '2010-11-30', '2010-11-30', NULL, NULL, 'สศสอ. 412 การประมวลผลข้อมูลในงานอนามัยชุมชน', NULL, NULL, NULL, '95', NULL, NULL, NULL, 'วิเเคราะห์ข้อมูลทางระบาดวิทยา', '08:00', '17:00', '2010-11-15 14:33:02', '1', NULL, NULL, NULL, NULL, 32),
(78, 68, 1, NULL, NULL, '2010-11-20', '2010-11-20', NULL, NULL, 'สศสอ. 412 การประมวลผลข้อมูลในงานอนามัยชุมชน', NULL, NULL, NULL, '95', NULL, NULL, NULL, 'การประมวลผลทางระบาดวิทยา', '08:00', '17:00', '2010-11-15 15:24:26', '1', NULL, NULL, NULL, NULL, 32),
(79, 68, 1, NULL, NULL, '2010-12-11', '2010-12-11', NULL, NULL, 'สศสอ. 412 การประมวลผลข้อมูลในงานอนามัยชุมชน', NULL, NULL, NULL, '95', NULL, NULL, NULL, 'การวิเคราะห์ข้อมูลทางระบาดวิทยา', '08:00', '17:00', '2010-11-15 15:25:14', '1', NULL, NULL, NULL, NULL, 32),
(80, 68, 1, NULL, NULL, '2010-12-12', '2010-12-12', NULL, NULL, 'สศสอ. 412 การประมวลผลข้อมูลในงานอนามัยชุมชน', NULL, NULL, NULL, '95', NULL, NULL, NULL, 'การวิเคราะห์ข้อมูลทางระบาดวิทยา', '08:00', '16:00', '2010-11-15 15:26:15', '1', NULL, NULL, NULL, NULL, 32),
(81, 89, 2, NULL, NULL, '2011-01-17', NULL, NULL, NULL, 'สอบนักศึกษา วิชา PHBS651', NULL, NULL, NULL, '30', NULL, NULL, NULL, 'spss', '13:00', '16:00', '2010-12-13 11:30:22', '1', NULL, NULL, NULL, NULL, 32),
(82, 89, 3, NULL, NULL, '2010-12-17', NULL, NULL, NULL, 'สอบนักศึกษา วิชา PHBS65', NULL, NULL, NULL, '20', NULL, NULL, NULL, 'spss', '13:00', '16:00', '2010-12-13 11:34:25', '1', NULL, NULL, NULL, NULL, 32),
(83, 62, 3, NULL, NULL, '2011-01-14', '', NULL, NULL, 'test', 'ปริญญาโท', 'test', 'test', '20', NULL, NULL, NULL, 'test', '13:00', '16:30', '2011-01-13 11:19:04', '1', NULL, NULL, NULL, NULL, 32);

-- --------------------------------------------------------

--
-- โครงสร้างตาราง `organization`
--

CREATE TABLE IF NOT EXISTS `organization` (
  `DeID` int(2) unsigned NOT NULL auto_increment,
  `Code` varchar(8) NOT NULL default '',
  `Fname` varchar(50) NOT NULL,
  `Sname` varchar(16) NOT NULL default '',
  `Chair` varchar(32) NOT NULL default '',
  `Type` char(2) default NULL,
  `Posit` char(1) NOT NULL default '',
  `trash` int(1) NOT NULL,
  PRIMARY KEY  (`DeID`),
  KEY `DeID` (`DeID`,`Fname`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 PACK_KEYS=0 COMMENT='???ง?/?????' AUTO_INCREMENT=45 ;

--
-- dump ตาราง `organization`
--

INSERT INTO `organization` (`DeID`, `Code`, `Fname`, `Sname`, `Chair`, `Type`, `Posit`, `trash`) VALUES
(1, 'PH', 'ภาควิชา', 'คณะสาสุข', '', '0', '1', 0),
(2, '1', 'ภาควิชาการพยาบาลสาธารณสุข', '3402', '1', '1', '', 0),
(3, '2', 'ภาควิชาจุลชีววิทยา', '6514', '1', '1', '', 0),
(4, '3', 'ภาควิชาชีวสถิติ', '3203', '1', '1', '', 0),
(5, 'PHAD', 'ภาควิชาบริหารงานสาธารณสุข', 'ภาคบริหาร', 'หัวหน้าภาควิชา', '1', '1', 0),
(6, '5', 'ภาควิชาปรสิตวิทยา', '1208', '1', '1', '', 0),
(7, '6', 'ภาควิชาโภชนวิทยา', '1304', '1', '1', '', 0),
(8, '7', 'ภาควิชาระบาดวิทยา', '3301', '1', '1', '', 0),
(9, '8', 'ภาควิชาวิทยาศาสตร์อนามัยสิ่งแวดล้อม', '2403', '1', '1', '', 0),
(10, '9', 'ภาควิชาวิศวกรรมสุขาภิบาล', '2201', '1', '1', '', 0),
(11, '10', 'ภาควิชาสุขศึกษาและพฤติกรรมศาสตร์', '3604', '1', '1', '', 0),
(12, '11', 'ภาควิชาอนามัยครอบครัว', '1302', '1', '1', '', 0),
(13, '12', 'ภาควิชาอาชีวอนามัยและความปลอดภัย', '2601', '1', '1', '', 0),
(14, '13', 'สถานฝึกอบรมและวิจัยอนามัยชนบท', '', '1', '1', '', 0),
(15, 'PHSO', 'สำนักงานคณบดี', 'สนง.คณบดี', 'หัวหน้าสำนักงาน', '0', '1', 0),
(16, 'PHSOFA', 'หน่วยการเงินและบัญชี', 'การเงิน', 'หัวหน้าหน่วย', '15', '1', 0),
(17, 'PHSOPS', 'หน่วยพัสดุ', 'พัสดุ', 'หัวหน้าหน่วย', '15', '1', 0),
(18, 'PHSOCU', 'หน่วยสารบรรณ', 'สารบรรณ', 'หัวหน้าหน่วย', '15', '1', 0),
(19, 'PHSOMU', 'หน่วยซ่อมบำรุง', 'ซ่อมบำรุง', 'หัวหน้าหน่วย', '15', '1', 0),
(20, 'PHSOPP', 'งานนโยบายและแผน', 'งานแผน', 'หัวหน้างาน', '15', '1', 0),
(21, 'PHSOAA', 'งานบริการการศึกษา', 'การศึกษา', 'หัวหน้างาน', '15', '1', 0),
(22, 'PHSOPU', 'หน่วยการเจ้าหน้าที่', 'การเจ้าหน้าที่', 'หัวหน้าหน่วย', '15', '1', 0),
(23, 'PHSOTU', 'หน่วยยานยนต์', 'ยานยนต์', 'หัวหน้าหน่วย', '15', '1', 0),
(24, 'PHSOLU', 'หน่วยประชาสัมพันธ์', 'ประชาสัมพันธ์', 'หัวหน้าหน่วย', '15', '1', 0),
(25, 'PHSORU', 'หน่วยบริหารและพัฒนางานวิจัย', 'หน่วยวิจัย', 'หัวหน้าหน่วย', '15', '1', 0),
(26, 'PHSOIU', 'หน่วยวิเทศสัมพันธ์', 'หน่วยวิเทศ', 'หัวหน้าหน่วย', '15', '1', 0),
(27, 'PHSOAV', 'ศูนย์ผลิตและพัฒนาสื่อสาธารณสุข', 'ศูนย์ผลิต', 'หัวหน้าศูนย์', '15', '1', 0),
(28, 'PHSOMP', 'หน่วยประสานงานหลักสูตร ส.ม.', 'ส.ม.', 'ประธานหลักสูตร', '15', '1', 0),
(29, 'PHSOOV', 'สำนักงานเทคโนโลยีสาธารณสุข', 'สนง.เทคโน', 'หัวหน้าสำนักงาน', '15', '1', 0),
(30, 'PHSOCL', 'สำนักงานปฏิบัติการกลาง', 'LAB กลาง', 'หัวหน้าสำนักงาน', '15', '1', 0),
(31, 'PHSOSG', 'ฝ่ายเลขานุการ', 'ฝ่ายเลขา', '', '15', '1', 0),
(32, 'PHSOIT', 'หน่วยเทคโนโลยีสารสนเทศ', 'ไอที', 'หัวหน้าหน่วย', '15', '1', 0),
(33, 'PHSOBA', 'หน่วยอาคารสถานที่', 'สถานที่', 'หัวหน้าหน่วย', '15', '1', 0),
(34, 'PHSOSM', 'หน่วยบริการการประชุม', 'การประชุม', 'หัวหน้าหน่วย', '15', '1', 0),
(35, 'PHSODP', 'หน่วยประสานงานหลักสูตร ส.ด.', 'ส.ด.', 'ประธานหลักสูตร', '15', '1', 0),
(36, '', 'ฝ่ายกิจการนักศึกษา', 'กิจการ น.ศ.', 'หัวหน้าฝ่าย', '15', '1', 0),
(37, '', 'ศูนย์ส่งเสริมสุขภาพ', 'ศูนย์สุขภาพ', '', '15', '1', 0),
(38, '', 'อาคารเอนกประสงค์', 'อาคาร 7', '', '15', '1', 0),
(39, '', 'หน่วยประกันคุณภาพการศึกษา', 'ประกันคุณภาพ', '', '15', '1', 0),
(40, '', 'โครงการเร่งรัดผลิตบัณฑิตทันตแพทย์', 'ผลิตทันต', '', '15', '1', 0),
(41, '', 'ชมรมดนตรีไทย', 'ดนตรีไทย', 'ประธานชมรม', '15', '1', 0),
(42, 'PHSOFP', 'งานคลังและพัสดุ', 'งานคลัง', 'หัวหน้างาน', '15', '1', 0),
(43, 'PHSOAG', 'งานบริหารและธุรการ', 'งานบริหาร', 'หัวหน้างาน', '15', '1', 0),
(44, '', 'บุคคลภายนอก', '', '', NULL, '', 0);

-- --------------------------------------------------------

--
-- โครงสร้างตาราง `permission`
--

CREATE TABLE IF NOT EXISTS `permission` (
  `NO` int(5) NOT NULL,
  `confirm` int(1) NOT NULL,
  `basic` int(1) NOT NULL,
  `user` int(1) NOT NULL,
  `report` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=tis620;

--
-- dump ตาราง `permission`
--

INSERT INTO `permission` (`NO`, `confirm`, `basic`, `user`, `report`) VALUES
(1, 1, 1, 1, 0),
(9, 1, 1, 0, 0);

-- --------------------------------------------------------

--
-- โครงสร้างตาราง `picroom`
--

CREATE TABLE IF NOT EXISTS `picroom` (
  `cr_id` int(2) NOT NULL,
  `pictype` varchar(200) NOT NULL,
  `picdata` mediumblob NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- dump ตาราง `picroom`
--


-- --------------------------------------------------------

--
-- โครงสร้างตาราง `room_type`
--

CREATE TABLE IF NOT EXISTS `room_type` (
  `id` int(1) NOT NULL auto_increment,
  `name` varchar(50) default NULL,
  `trash` int(1) default NULL,
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- dump ตาราง `room_type`
--

INSERT INTO `room_type` (`id`, `name`, `trash`) VALUES
(1, 'ห้องประชุม', 0),
(2, 'ห้องเรียน', 0),
(3, 'ห้องปฏิบัติการคอมพิวเตอร์', 0);

-- --------------------------------------------------------

--
-- โครงสร้างตาราง `software`
--

CREATE TABLE IF NOT EXISTS `software` (
  `id` int(2) NOT NULL auto_increment,
  `names` varchar(200) NOT NULL,
  `active` int(1) NOT NULL,
  `created` datetime default NULL,
  `created_by` int(3) default NULL,
  `modified` datetime default NULL,
  `modified_by` int(3) default NULL,
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6 ;

--
-- dump ตาราง `software`
--

INSERT INTO `software` (`id`, `names`, `active`, `created`, `created_by`, `modified`, `modified_by`) VALUES
(1, 'SPSS', 1, '2010-10-28 11:36:54', 62, NULL, NULL),
(2, 'Microsoft Office 2003', 1, '2010-10-28 11:37:25', 62, NULL, NULL),
(3, 'Endnote', 1, NULL, NULL, NULL, NULL),
(4, 'Photoshop', 1, NULL, NULL, NULL, NULL),
(5, 'Dreamweaver', 1, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- โครงสร้างตาราง `software_relation`
--

CREATE TABLE IF NOT EXISTS `software_relation` (
  `uq_id` int(5) NOT NULL,
  `softId` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- dump ตาราง `software_relation`
--


-- --------------------------------------------------------

--
-- โครงสร้างตาราง `term`
--

CREATE TABLE IF NOT EXISTS `term` (
  `id` int(2) NOT NULL auto_increment,
  `term` int(1) NOT NULL,
  `years` int(4) NOT NULL,
  `datestart` date NOT NULL,
  `dateend` date NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- dump ตาราง `term`
--

INSERT INTO `term` (`id`, `term`, `years`, `datestart`, `dateend`) VALUES
(1, 2, 2010, '2010-10-26', '2011-01-15');

-- --------------------------------------------------------

--
-- โครงสร้างตาราง `time`
--

CREATE TABLE IF NOT EXISTS `time` (
  `timeId` int(1) NOT NULL auto_increment,
  `name` text NOT NULL,
  `start` varchar(5) NOT NULL,
  `end` varchar(5) NOT NULL,
  `modified` text NOT NULL,
  `modified_by` int(1) NOT NULL,
  PRIMARY KEY  (`timeId`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- dump ตาราง `time`
--

INSERT INTO `time` (`timeId`, `name`, `start`, `end`, `modified`, `modified_by`) VALUES
(1, 'ช่วงเช้า', '08:30', '12:00', '', 0),
(2, 'ช่วงบ่าย', '13:00', '16:30', '', 0),
(3, 'นอกเวลาราชการ', '16:30', '20:00', '', 0);

-- --------------------------------------------------------

--
-- โครงสร้างตาราง `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `NO` int(3) NOT NULL auto_increment,
  `USR_CODE` char(20) default '0',
  `USR_PAS` char(255) default '0',
  `USR_NAME` text,
  `USR_SURNAME` char(50) default '0',
  `DEPARTMENT_NO` int(3) default NULL,
  `SUBDEPARTMENT_NO` int(3) default NULL,
  `USR_LASTUPDATE` char(30) default '0',
  `confirm` int(1) NOT NULL,
  `basic` int(10) default NULL,
  `user` int(10) NOT NULL default '0',
  `report` int(10) NOT NULL default '0',
  `ONLINE_DELETE` int(10) NOT NULL default '0',
  `EMAIL` varchar(255) NOT NULL,
  `LOGIN` int(1) NOT NULL default '0',
  `BLOCK` int(1) NOT NULL default '0',
  `photo` text NOT NULL,
  `G_ID` enum('Member','Administrator') NOT NULL,
  PRIMARY KEY  (`NO`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=10 ;

--
-- dump ตาราง `user`
--

INSERT INTO `user` (`NO`, `USR_CODE`, `USR_PAS`, `USR_NAME`, `USR_SURNAME`, `DEPARTMENT_NO`, `SUBDEPARTMENT_NO`, `USR_LASTUPDATE`, `confirm`, `basic`, `user`, `report`, `ONLINE_DELETE`, `EMAIL`, `LOGIN`, `BLOCK`, `photo`, `G_ID`) VALUES
(1, 'admin', 'admin', 'ผู้ดูแลระบบ', '', 32, 0, '2009-08-06 11:10:00', 1, 1, 1, 0, 0, 'iceeagle99@gmail.com', 0, 0, 'Logo111.gif', 'Administrator'),
(9, 'demo', 'demo', 'ทดสอบระบบ', 'เธเธฃเธฐเธขเธนเธฃเธเธดเธเธเธดเธเธธเธฅ', 32, 14, '0', 0, 0, 0, 0, 0, 'localhost@localhost', 0, 0, 'Logo111.gif', 'Member');

-- --------------------------------------------------------

--
-- โครงสร้างตาราง `user_log`
--

CREATE TABLE IF NOT EXISTS `user_log` (
  `ul_id` int(4) unsigned NOT NULL auto_increment,
  `us_id` int(2) default NULL,
  `ul_in` datetime default '0000-00-00 00:00:00',
  `ul_out` datetime default '0000-00-00 00:00:00',
  `ul_ip` varchar(16) NOT NULL default '',
  `ul_url` text,
  PRIMARY KEY  (`ul_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 PACK_KEYS=0 COMMENT='เธเธฑเธเธเธถเธเธเธฒเธฃเนเธเนเธฒเนเธเนเธเธฒเธเธฃ' AUTO_INCREMENT=107 ;

--
-- dump ตาราง `user_log`
--

INSERT INTO `user_log` (`ul_id`, `us_id`, `ul_in`, `ul_out`, `ul_ip`, `ul_url`) VALUES
(1, 1, '2010-06-16 13:53:16', '0000-00-00 00:00:00', '127.0.0.1', NULL),
(2, 1, '2010-06-16 13:53:32', '0000-00-00 00:00:00', '127.0.0.1', NULL),
(3, 1, '2010-06-16 13:53:50', '0000-00-00 00:00:00', '127.0.0.1', NULL),
(4, 1, '2010-06-16 13:53:52', '0000-00-00 00:00:00', '127.0.0.1', NULL),
(5, 1, '2010-06-16 13:53:57', '0000-00-00 00:00:00', '127.0.0.1', NULL),
(6, 1, '2010-06-16 13:55:14', '0000-00-00 00:00:00', '127.0.0.1', NULL),
(7, 1, '2010-06-16 15:12:53', '0000-00-00 00:00:00', '127.0.0.1', NULL),
(8, 1, '2010-06-21 14:00:13', '0000-00-00 00:00:00', '127.0.0.1', NULL),
(9, 1, '2010-06-21 14:03:22', '0000-00-00 00:00:00', '127.0.0.1', NULL),
(10, 1, '2010-06-21 14:14:56', '0000-00-00 00:00:00', '127.0.0.1', NULL),
(11, 1, '2010-06-21 14:15:17', '0000-00-00 00:00:00', '127.0.0.1', NULL),
(12, 1, '2010-06-21 14:26:09', '0000-00-00 00:00:00', '127.0.0.1', NULL),
(13, 1, '2010-06-21 14:26:29', '0000-00-00 00:00:00', '127.0.0.1', NULL),
(14, 1, '2010-06-22 09:15:43', '0000-00-00 00:00:00', '127.0.0.1', NULL),
(15, 1, '2010-06-22 11:08:18', '0000-00-00 00:00:00', '127.0.0.1', NULL),
(16, 1, '2010-06-22 16:18:32', '0000-00-00 00:00:00', '127.0.0.1', NULL),
(17, 9, '2010-06-23 09:04:36', '0000-00-00 00:00:00', '127.0.0.1', NULL),
(18, 9, '2010-06-23 11:08:35', '0000-00-00 00:00:00', '127.0.0.1', NULL),
(19, 1, '2010-06-23 14:17:39', '0000-00-00 00:00:00', '127.0.0.1', NULL),
(20, 1, '2010-06-23 15:34:46', '0000-00-00 00:00:00', '127.0.0.1', NULL),
(21, 1, '2010-06-24 10:49:09', '0000-00-00 00:00:00', '127.0.0.1', NULL),
(22, 1, '2010-06-24 14:23:44', '0000-00-00 00:00:00', '127.0.0.1', NULL),
(23, 1, '2010-06-25 13:18:25', '0000-00-00 00:00:00', '127.0.0.1', NULL),
(24, 1, '2010-06-26 11:52:27', '0000-00-00 00:00:00', '127.0.0.1', NULL),
(25, 1, '2010-06-26 12:00:22', '0000-00-00 00:00:00', '127.0.0.1', NULL),
(26, 1, '2010-06-26 23:02:43', '0000-00-00 00:00:00', '127.0.0.1', NULL),
(27, 1, '2010-06-27 09:15:05', '0000-00-00 00:00:00', '127.0.0.1', NULL),
(28, 1, '2010-06-28 09:46:48', '0000-00-00 00:00:00', '127.0.0.1', NULL),
(29, 1, '2010-06-28 12:28:03', '0000-00-00 00:00:00', '127.0.0.1', NULL),
(30, 1, '2010-06-29 09:15:03', '0000-00-00 00:00:00', '127.0.0.1', NULL),
(31, 9, '2010-06-29 09:51:36', '0000-00-00 00:00:00', '127.0.0.1', NULL),
(32, 9, '2010-06-29 11:13:04', '0000-00-00 00:00:00', '127.0.0.1', NULL),
(33, 1, '2010-06-29 11:42:51', '0000-00-00 00:00:00', '127.0.0.1', NULL),
(34, 1, '2010-06-29 14:52:50', '0000-00-00 00:00:00', '127.0.0.1', NULL),
(35, 1, '2010-06-30 10:53:49', '0000-00-00 00:00:00', '127.0.0.1', NULL),
(36, 1, '2010-08-10 14:18:26', '0000-00-00 00:00:00', '127.0.0.1', NULL),
(37, 1, '2010-08-13 17:30:57', '0000-00-00 00:00:00', '127.0.0.1', NULL),
(38, 1, '2010-08-13 22:11:07', '0000-00-00 00:00:00', '127.0.0.1', NULL),
(39, 1, '2010-08-15 11:10:14', '0000-00-00 00:00:00', '127.0.0.1', NULL),
(40, 1, '2010-08-15 14:55:21', '0000-00-00 00:00:00', '127.0.0.1', NULL),
(41, 62, '2010-08-15 21:56:47', '0000-00-00 00:00:00', '127.0.0.1', NULL),
(42, 62, '2010-08-15 22:07:27', '0000-00-00 00:00:00', '127.0.0.1', NULL),
(43, 62, '2010-08-16 09:22:46', '0000-00-00 00:00:00', '127.0.0.1', NULL),
(44, 68, '2010-08-16 10:32:45', '0000-00-00 00:00:00', '127.0.0.1', NULL),
(45, 62, '2010-08-16 13:31:52', '0000-00-00 00:00:00', '127.0.0.1', NULL),
(46, 62, '2010-08-17 09:10:23', '0000-00-00 00:00:00', '127.0.0.1', NULL),
(47, 62, '2010-08-17 14:13:12', '0000-00-00 00:00:00', '127.0.0.1', NULL),
(48, 62, '2010-08-21 12:06:21', '0000-00-00 00:00:00', '127.0.0.1', NULL),
(49, 62, '2010-08-26 13:10:28', '0000-00-00 00:00:00', '127.0.0.1', NULL),
(50, 62, '2010-08-29 15:53:04', '0000-00-00 00:00:00', '127.0.0.1', NULL),
(51, 62, '2010-08-29 15:54:50', '0000-00-00 00:00:00', '127.0.0.1', NULL),
(52, 62, '2010-08-29 19:06:49', '0000-00-00 00:00:00', '127.0.0.1', NULL),
(53, 62, '2010-08-30 09:04:32', '0000-00-00 00:00:00', '127.0.0.1', NULL),
(54, 62, '2010-08-31 09:21:55', '0000-00-00 00:00:00', '127.0.0.1', NULL),
(55, 62, '2010-08-31 09:25:46', '0000-00-00 00:00:00', '127.0.0.1', NULL),
(56, 62, '2010-08-31 18:29:50', '0000-00-00 00:00:00', '127.0.0.1', NULL),
(57, 62, '2010-09-01 10:01:16', '0000-00-00 00:00:00', '127.0.0.1', NULL),
(58, 62, '2010-09-02 08:47:19', '0000-00-00 00:00:00', '127.0.0.1', NULL),
(59, 62, '2010-09-02 08:49:30', '0000-00-00 00:00:00', '127.0.0.1', NULL),
(60, 62, '2010-09-02 08:53:24', '0000-00-00 00:00:00', '127.0.0.1', NULL),
(61, 62, '2010-09-02 08:55:42', '0000-00-00 00:00:00', '127.0.0.1', NULL),
(62, 62, '2010-09-02 08:57:26', '0000-00-00 00:00:00', '127.0.0.1', NULL),
(63, 62, '2010-09-02 08:58:50', '0000-00-00 00:00:00', '127.0.0.1', NULL),
(64, 62, '2010-09-08 09:16:35', '0000-00-00 00:00:00', '127.0.0.1', NULL),
(65, 62, '2010-09-08 11:11:20', '0000-00-00 00:00:00', '127.0.0.1', NULL),
(66, 62, '2010-09-20 09:46:09', '0000-00-00 00:00:00', '127.0.0.1', NULL),
(67, 62, '2010-09-20 15:35:03', '0000-00-00 00:00:00', '127.0.0.1', NULL),
(68, 62, '2010-10-04 09:00:07', '0000-00-00 00:00:00', '127.0.0.1', NULL),
(69, 62, '2010-10-13 13:18:32', '0000-00-00 00:00:00', '127.0.0.1', NULL),
(70, 62, '2010-10-18 12:18:00', '0000-00-00 00:00:00', '127.0.0.1', NULL),
(71, 62, '2010-10-26 16:10:11', '0000-00-00 00:00:00', '127.0.0.1', NULL),
(72, 62, '2010-10-28 16:19:10', '0000-00-00 00:00:00', '127.0.0.1', NULL),
(73, 62, '2010-10-29 10:51:12', '0000-00-00 00:00:00', '127.0.0.1', NULL),
(74, 62, '2010-11-09 10:21:24', '0000-00-00 00:00:00', '127.0.0.1', NULL),
(75, 62, '2010-11-09 10:24:59', '0000-00-00 00:00:00', '127.0.0.1', NULL),
(76, 62, '2010-11-09 14:29:34', '0000-00-00 00:00:00', '127.0.0.1', NULL),
(77, 62, '2010-11-10 09:42:08', '0000-00-00 00:00:00', '127.0.0.1', NULL),
(78, 62, '2010-11-11 11:33:36', '0000-00-00 00:00:00', '127.0.0.1', NULL),
(79, 62, '2010-11-12 15:09:06', '0000-00-00 00:00:00', '127.0.0.1', NULL),
(80, 62, '2010-11-15 13:42:22', '0000-00-00 00:00:00', '127.0.0.1', NULL),
(81, 62, '2010-11-19 16:06:53', '0000-00-00 00:00:00', '127.0.0.1', NULL),
(82, 62, '2010-11-24 13:15:41', '0000-00-00 00:00:00', '127.0.0.1', NULL),
(83, 62, '2010-11-24 14:33:16', '0000-00-00 00:00:00', '127.0.0.1', NULL),
(84, 62, '2010-11-24 15:25:08', '0000-00-00 00:00:00', '127.0.0.1', NULL),
(85, 62, '2010-12-14 15:35:22', '0000-00-00 00:00:00', '127.0.0.1', NULL),
(86, 62, '2010-12-16 16:07:34', '0000-00-00 00:00:00', '127.0.0.1', NULL),
(87, 62, '2010-12-23 10:53:06', '0000-00-00 00:00:00', '127.0.0.1', NULL),
(88, 62, '2010-12-27 09:57:14', '0000-00-00 00:00:00', '127.0.0.1', NULL),
(89, 62, '2010-12-28 16:00:11', '0000-00-00 00:00:00', '127.0.0.1', NULL),
(90, 62, '2011-01-13 11:09:55', '0000-00-00 00:00:00', '127.0.0.1', NULL),
(91, 1, '2011-03-14 11:35:32', '0000-00-00 00:00:00', '127.0.0.1', NULL),
(92, 62, '2011-03-29 11:18:19', '0000-00-00 00:00:00', '127.0.0.1', NULL),
(93, 62, '2012-07-00 00:01:00', '0000-00-00 00:00:00', '2011-03-29 11:18', '/ph/labcom/formbooking.php?mode=add'),
(94, 62, '2012-07-00 00:01:00', '0000-00-00 00:00:00', '2011-03-29 11:39', '/ph/labcom/formbooking.php?mode=add'),
(95, 62, '2012-07-00 00:01:00', '0000-00-00 00:00:00', '2011-03-29 11:55', '/ph/labcom/formbooking.php?mode=add'),
(96, 62, '2011-03-29 17:50:24', '0000-00-00 00:00:00', '127.0.0.1', NULL),
(97, 62, '2012-07-00 00:01:00', '0000-00-00 00:00:00', '2011-03-29 17:50', '/ph/labcom/formbooking.php?mode=add'),
(98, 62, '2012-07-00 00:01:00', '0000-00-00 00:00:00', '2011-03-29 17:50', '/ph/labcom/mybooking.php'),
(99, 62, '2012-07-00 00:01:00', '0000-00-00 00:00:00', '2011-03-29 17:50', '/ph/labcom/usercancel.php'),
(100, 62, '2012-07-00 00:01:00', '0000-00-00 00:00:00', '2011-03-29 17:50', '/ph/labcom/mybooking.php'),
(101, 62, '2012-07-00 00:01:00', '0000-00-00 00:00:00', '2011-03-29 18:04', '/ph/labcom/formbooking.php?mode=edit&keyuq_id=24'),
(102, 62, '2012-07-00 00:01:00', '0000-00-00 00:00:00', '2011-03-29 18:04', '/ph/labcom/mybooking.php'),
(103, 62, '2012-07-00 00:01:00', '0000-00-00 00:00:00', '2011-03-29 18:04', '/ph/labcom/formbooking.php?mode=copy&keyuq_id=81'),
(104, 62, '2012-07-00 00:01:00', '0000-00-00 00:00:00', '2011-03-29 18:04', '/ph/labcom/mybooking.php'),
(105, 62, '2012-07-00 00:01:00', '0000-00-00 00:00:00', '2011-03-29 18:20', '/ph/labcom/formbooking.php?mode=add'),
(106, 62, '2012-07-00 00:01:00', '0000-00-00 00:00:00', '2011-03-29 19:29', '/ph/labcom/formbooking.php?mode=add');

-- --------------------------------------------------------

--
-- โครงสร้างตาราง `user_type`
--

CREATE TABLE IF NOT EXISTS `user_type` (
  `id` int(1) NOT NULL auto_increment,
  `types` varchar(100) default NULL,
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- dump ตาราง `user_type`
--

INSERT INTO `user_type` (`id`, `types`) VALUES
(1, 'สมาชิก'),
(2, 'ผู้ดูแลระบบ');
