-- phpMyAdmin SQL Dump
-- version 3.4.3.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jun 22, 2012 at 07:19 PM
-- Server version: 5.0.51
-- PHP Version: 5.2.6

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `phroom`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

DROP TABLE IF EXISTS `admin`;
CREATE TABLE IF NOT EXISTS `admin` (
  `NO` varchar(20) default NULL,
  `system` int(1) NOT NULL,
  `confirm` int(1) NOT NULL,
  KEY `NO` (`NO`)
) ENGINE=MyISAM DEFAULT CHARSET=tis620;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`NO`, `system`, `confirm`) VALUES
('1', 0, 0),
('62', 1, 1),
('68', 1, 0),
('89', 1, 0),
('10000', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `book_status`
--

DROP TABLE IF EXISTS `book_status`;
CREATE TABLE IF NOT EXISTS `book_status` (
  `sta_id` int(1) NOT NULL auto_increment,
  `sta` varchar(100) NOT NULL,
  `img` varchar(100) NOT NULL,
  PRIMARY KEY  (`sta_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=tis620 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `book_status`
--

INSERT INTO `book_status` (`sta_id`, `sta`, `img`) VALUES
(1, 'อนุมัติ', 'tick.png'),
(2, 'รออนุมัติ', 'yellow.png'),
(3, 'ยกเลิก', 'publish_x.png');

-- --------------------------------------------------------

--
-- Table structure for table `config`
--

DROP TABLE IF EXISTS `config`;
CREATE TABLE IF NOT EXISTS `config` (
  `id` int(1) NOT NULL,
  `online` int(1) default NULL,
  `sitename` varchar(200) default NULL,
  `days` int(1) NOT NULL COMMENT 'กำหนดวันจองล่วงหน้า',
  `filetype` text,
  `ftphost` varchar(100) default NULL,
  `ftpuser` varchar(50) default NULL,
  `ftppassword` varchar(50) default NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `config`
--

INSERT INTO `config` (`id`, `online`, `sitename`, `days`, `filetype`, `ftphost`, `ftpuser`, `ftppassword`) VALUES
(1, 1, NULL, 3, '.pdf,.jpg,.jpeg,.png', 'ns2.ph.mahidol.ac.th', 'demowww', 'Cy9YbGM');

-- --------------------------------------------------------

--
-- Table structure for table `day_name`
--

DROP TABLE IF EXISTS `day_name`;
CREATE TABLE IF NOT EXISTS `day_name` (
  `id` int(1) NOT NULL auto_increment,
  `d` varchar(5) default NULL,
  `days` varchar(10) default NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `day_name`
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
-- Table structure for table `jos_users`
--

DROP TABLE IF EXISTS `jos_users`;
CREATE TABLE IF NOT EXISTS `jos_users` (
  `id` int(11) NOT NULL auto_increment,
  `name` varchar(255) NOT NULL default '',
  `surname` varchar(200) default NULL,
  `username` varchar(150) NOT NULL default '',
  `email` varchar(100) NOT NULL default '',
  `password` varchar(100) NOT NULL default '',
  `usertype` varchar(25) default '1' COMMENT 'SuperAdministrator,Administrator,User',
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
  `job_title` varchar(255) NOT NULL,
  `usergroup` int(5) default NULL,
  PRIMARY KEY  (`id`),
  KEY `usertype` (`usertype`),
  KEY `idx_name` (`name`),
  KEY `gid_block` (`gid`,`block`),
  KEY `username` (`username`),
  KEY `email` (`email`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=93 ;

--
-- Dumping data for table `jos_users`
--

INSERT INTO `jos_users` (`id`, `name`, `surname`, `username`, `email`, `password`, `usertype`, `block`, `sendEmail`, `gid`, `registerDate`, `lastvisitDate`, `activation`, `params`, `DeID`, `tel`, `img`, `job_title`, `usergroup`) VALUES
(62, 'Chakkapan Charupoom', NULL, 'admin', 'chakkapan.cha@mahidol.ac.th', 'admin', '3', 0, 1, 25, '2009-09-24 13:50:11', '2012-06-22 10:20:39', '', 'admin_language=\nlanguage=\neditor=fckeditor\nhelpsite=\ntimezone=7\npage_title=แก้ไขรายละเอียดของคุณ\nshow_page_title=1\n\n', 32, '7305,7306', NULL, 'นักวิชาการคอมพิวเตอร์', 10001),
(68, 'วีณา', NULL, 'itunit', 'phwww@mahidol.ac.th', '123456', '2', 0, 1, 21, '2009-09-27 11:17:26', '2012-06-22 09:40:30', '', 'admin_language=th-TH\r\nlanguage=th-TH\r\neditor=\r\nhelpsite=\r\ntimezone=7\r\n\r\n', 32, '7305', NULL, '', NULL),
(70, 'user2', NULL, 'user2', 'user2@user2', '123456', '1', 0, 0, 19, '2009-10-23 10:34:23', '2009-10-28 07:56:23', '', 'admin_language=\nlanguage=\neditor=\nhelpsite=\ntimezone=7\n\n', 32, NULL, NULL, '', NULL),
(71, 'ภาควิชาจุลชีววิทยา', NULL, 'phmi01', 'phmi01@localhost', '123456', '1', 0, 0, 19, '2010-03-12 02:23:41', '2010-07-29 07:28:38', '', 'language=\neditor=\nhelpsite=\ntimezone=7\n\n', 3, NULL, NULL, '', NULL),
(72, 'ภาควิชาชีวสถิติ', NULL, 'phbs02', 'phbs02@localhost', '123456', '1', 0, 0, 19, '2010-03-12 02:26:39', '2010-07-29 06:36:38', '', 'admin_language=\nlanguage=\neditor=\nhelpsite=\ntimezone=7\n\n', 4, NULL, NULL, '', NULL),
(73, 'ภาควิชาบริหารงานสาธารณสุข', NULL, 'phad03', 'phad03@localhost', '123456', '1', 0, 0, 19, '2010-03-12 02:27:31', '2010-07-30 01:58:35', '', 'admin_language=\nlanguage=\neditor=\nhelpsite=\ntimezone=7\n\n', 5, NULL, NULL, '', NULL),
(74, 'ภาควิชาปรสิตวิทยาและกีฏวิทยา', NULL, 'phpr04', 'phpr04@localhost', '123456', '1', 0, 0, 19, '2010-03-12 02:28:48', '2010-07-29 06:37:03', '', 'admin_language=\nlanguage=\neditor=\nhelpsite=\ntimezone=7\n\n', 6, NULL, NULL, '', NULL),
(75, 'ภาควิชาการพยาบาลสาธารณสุข', NULL, 'phpn05', 'phpn05@localhost', '123456', '1', 0, 0, 19, '2010-03-12 02:29:43', '2010-07-29 07:27:30', '', 'admin_language=\nlanguage=\neditor=\nhelpsite=\ntimezone=7\n\n', 2, NULL, NULL, '', NULL),
(76, 'ภาควิชาโภชนวิทยา', NULL, 'phnu06', 'phnu06@localhost', '123456', '1', 0, 0, 19, '2010-03-12 02:31:16', '2010-07-29 06:38:20', '', 'language=\neditor=\nhelpsite=\ntimezone=7\n\n', 7, NULL, NULL, '', NULL),
(77, 'ภาควิชาระบาดวิทยา', NULL, 'phep07', 'phep07@localhost', '123456', '1', 0, 0, 19, '2010-03-12 02:32:02', '2010-07-29 08:04:35', '', 'admin_language=\nlanguage=\neditor=\nhelpsite=\ntimezone=7\n\n', 8, NULL, NULL, '', NULL),
(78, 'ภาควิชาวิศวกรรมสุขาภิบาล', NULL, 'phse08', 'phse08@localhost', '123456', '1', 0, 0, 19, '2010-03-12 02:32:55', '0000-00-00 00:00:00', '', 'admin_language=\r\nlanguage=\r\neditor=\r\nhelpsite=\r\ntimezone=7\r\n\r\n', 10, NULL, NULL, '', NULL),
(79, 'ภาควิชาวิทยาศาสตร์อนามัยสิ่งแวดล้อม', NULL, 'phss09', 'phss09@localhost', '123456', '1', 0, 0, 19, '2010-03-12 02:33:45', '2010-07-29 07:00:20', '', 'admin_language=\r\nlanguage=\r\neditor=\r\nhelpsite=\r\ntimezone=7\r\n\r\n', 9, NULL, NULL, '', NULL),
(80, 'ภาควิชาสุขศึกษาและพฤติกรรมศาสตร์', NULL, 'phhe10', 'phhe10@localhost', '123456', '1', 0, 0, 19, '2010-03-12 02:34:43', '2010-07-29 07:10:25', '', 'admin_language=\nlanguage=\neditor=\nhelpsite=\ntimezone=7\n\n', 11, NULL, NULL, '', NULL),
(81, 'ภาควิชาอนามัยครอบครัว', NULL, 'phfh11', 'phfh11@localhost', '123456', '1', 0, 0, 19, '2010-03-12 02:35:26', '2010-07-29 07:10:21', '', 'admin_language=\nlanguage=\neditor=\nhelpsite=\ntimezone=7\n\n', 12, NULL, NULL, '', NULL),
(82, 'ภาควิชาอาชีวอนามัยและความปลอดภัย', NULL, 'phoh12', 'phoh12@localhost', '123456', '1', 0, 0, 19, '2010-03-12 02:36:23', '0000-00-00 00:00:00', '', 'admin_language=\nlanguage=\neditor=\nhelpsite=\ntimezone=7\n\n', 13, NULL, NULL, '', NULL),
(83, 'สถานฝึกอบรมและวิจัยอนามัยชนบท', NULL, 'phst13', 'phst13@localhost', '123456', '1', 0, 0, 19, '2010-03-12 02:37:18', '0000-00-00 00:00:00', '', 'admin_language=\nlanguage=\neditor=\nhelpsite=\ntimezone=7\n\n', 14, NULL, NULL, '', NULL),
(84, 'สำนักบริการเทคโนโลยีสาธารณสุข', NULL, 'phet14', 'phet14@localhost', '123456', '1', 0, 0, 19, '2010-03-12 02:38:08', '0000-00-00 00:00:00', '', 'admin_language=\nlanguage=\neditor=\nhelpsite=\ntimezone=7\n\n', 15, NULL, NULL, '', NULL),
(85, 'หน่วยบริการวิชาการและธุรกิจสัมพันธ์', NULL, 'phac15', 'phac15@localhost', '123456', '1', 0, 0, 19, '2010-03-12 02:39:10', '0000-00-00 00:00:00', '', 'admin_language=\nlanguage=\neditor=\nhelpsite=\ntimezone=7\n\n', 16, NULL, NULL, '', NULL),
(86, 'หน่วยวิเทศสัมพันธ์และฝึกอบรมนานาชาติ', NULL, 'phir16', 'phir16@localhost', '123456', '1', 0, 0, 19, '2010-03-12 02:40:00', '0000-00-00 00:00:00', '', 'admin_language=\nlanguage=\neditor=\nhelpsite=\ntimezone=7\n\n', 17, NULL, NULL, '', NULL),
(87, 'หน่วยสารบรรณ', NULL, 'phcr17', 'phcr17@localhost', '123456', '1', 0, 0, 19, '2010-03-12 02:40:35', '0000-00-00 00:00:00', '', 'admin_language=\nlanguage=\neditor=\nhelpsite=\ntimezone=7\n\n', 18, NULL, NULL, '', NULL),
(88, 'สำนักงานคณบดี', NULL, 'phso18', 'phso18@localhost', '123456', '1', 0, 0, 19, '2010-03-12 02:41:05', '0000-00-00 00:00:00', '', 'admin_language=\nlanguage=\neditor=\nhelpsite=\ntimezone=7\n\n', 19, NULL, NULL, '', NULL),
(89, 'สุนันทา ไตรภพ', NULL, 'phteste', 'phteste@hotmail.com', '123456', '3', 0, 0, 21, '2010-06-03 01:56:32', '2010-06-03 07:41:41', '', 'admin_language=\r\nlanguage=\r\neditor=\r\nhelpsite=\r\ntimezone=7\r\n\r\n', 32, '7306', NULL, '', NULL),
(90, 'phadmin', NULL, 'phadmin', 'sirimayee@hotmail.com', '123456', '1', 0, 0, 19, '2010-06-03 02:27:45', '2010-06-03 07:29:28', '', 'admin_language=\nlanguage=\neditor=\nhelpsite=\ntimezone=7\n\n', 20, NULL, NULL, '', NULL),
(91, 'phnu', NULL, 'phnu', 'phnu@phnu', '123456', '1', 0, 0, 19, '2010-06-03 07:22:41', '2010-06-03 07:28:59', '', 'admin_language=\nlanguage=\neditor=\nhelpsite=\ntimezone=7\n\n', 20, NULL, NULL, '', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `labcom_booktemp`
--

DROP TABLE IF EXISTS `labcom_booktemp`;
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

-- --------------------------------------------------------

--
-- Table structure for table `mail`
--

DROP TABLE IF EXISTS `mail`;
CREATE TABLE IF NOT EXISTS `mail` (
  `id` int(11) NOT NULL auto_increment,
  `uq_id` int(11) default NULL,
  `texts` text,
  `userId` int(2) default NULL,
  `dateSent` datetime default NULL,
  `ipSent` varchar(20) default NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `meetingroom_croom`
--

DROP TABLE IF EXISTS `meetingroom_croom`;
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
  `enable` int(1) NOT NULL,
  PRIMARY KEY  (`cr_id`),
  KEY `name` (`name`),
  KEY `net` (`net`,`parent`,`dater`,`color`)
) ENGINE=MyISAM  DEFAULT CHARSET=tis620 PACK_KEYS=0 AUTO_INCREMENT=5567213 ;

--
-- Dumping data for table `meetingroom_croom`
--

INSERT INTO `meetingroom_croom` (`cr_id`, `name`, `net`, `location`, `parent`, `pro`, `board`, `comp`, `trash`, `tt`, `dater`, `picType`, `picData`, `color`, `enable`) VALUES
(1, 'ห้องประชุมราชพฤกษ์', 30, '', 1, '0', '', '', '0', 0, '2012-06-18', '', 'blank.jpg', 'orange', 1),
(2, 'ห้องประชุม ศ.นพ.เทพนม เมืองแมน', 20, 'อาคาร 5 ชั้น 2', 1, '0', '', '', '0', 0, '2012-06-20 09:55:09', '', 'blank.jpg', 'blue', 1),
(3, 'ห้องประชุม ศ.นพ.จรัส  ยามะรัต', 20, 'อาคาร 6 ชั้น 2', 1, '0', '', '', '0', 0, '2012-06-20 16:40:43', '', 'blank.jpg', 'green', 1),
(38, 'ห้องประชุม 5206', 20, 'อาคาร 5 ชั้น 2', 1, '0', NULL, NULL, '0', 0, '2012-06-20 16:41:18', NULL, 'blank.jpg', '#c3e379', 1),
(39, 'ห้องประชุม 7507', 20, 'อาคาร 7 ชั้น 5', 1, '0', NULL, NULL, '0', 0, '2012-06-20 16:40:56', NULL, 'blank.jpg', '#dd58ac', 1),
(40, 'ห้องประชุม 7508', 20, 'อาคาร 7 ชั้น 5', 1, '0', NULL, NULL, '0', 0, '2012-06-20 16:41:07', NULL, 'blank.jpg', '#f4d063', 1),
(41, 'ห้องประชุม 7510', 20, 'อาคาร 7 ชั้น 5', 1, '0', NULL, NULL, '0', 0, '2012-06-20 16:41:26', NULL, 'blank.jpg', '#ad90c6', 1);

-- --------------------------------------------------------

--
-- Table structure for table `meetingroom_food`
--

DROP TABLE IF EXISTS `meetingroom_food`;
CREATE TABLE IF NOT EXISTS `meetingroom_food` (
  `food_id` int(11) NOT NULL auto_increment,
  `food` varchar(100) NOT NULL,
  `cost` int(5) NOT NULL,
  `lastupdate` varchar(40) default NULL,
  `trash` int(1) NOT NULL,
  PRIMARY KEY  (`food_id`),
  KEY `food` (`food`),
  KEY `food_id` (`food_id`,`food`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5590188 ;

--
-- Dumping data for table `meetingroom_food`
--

INSERT INTO `meetingroom_food` (`food_id`, `food`, `cost`, `lastupdate`, `trash`) VALUES
(1, 'กาแฟ', 30, '2011-04-01 15:31:04 | 127.0.0.1', 0),
(3, 'กาแฟ+อาหารว่าง', 30, '2010-06-28 13:13:43 | 127.0.0.1', 0),
(4, 'อาหารกลางวัน', 0, '2012-06-19 14:29:03', 0),
(5, 'เครื่องดื่ม+อาหารว่าง', 0, '2012-06-19 14:25:51 | 127.0.0.1', 0);

-- --------------------------------------------------------

--
-- Table structure for table `meetingroom_foodrelation`
--

DROP TABLE IF EXISTS `meetingroom_foodrelation`;
CREATE TABLE IF NOT EXISTS `meetingroom_foodrelation` (
  `or_id` int(11) NOT NULL auto_increment,
  `uq_id` varchar(11) NOT NULL default '0',
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
-- Dumping data for table `meetingroom_foodrelation`
--

INSERT INTO `meetingroom_foodrelation` (`or_id`, `uq_id`, `food_id`, `computer`, `projecter`, `other`, `status1`, `drink`, `status2`) VALUES
(15, '12', '1', '', '', '', '', '', ''),
(16, '12', '1', '', '', '', '', '', ''),
(20, '14', '3', '', '', '', '', '', ''),
(19, '14', '1', '', '', '', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `meetingroom_media`
--

DROP TABLE IF EXISTS `meetingroom_media`;
CREATE TABLE IF NOT EXISTS `meetingroom_media` (
  `media_id` int(11) NOT NULL auto_increment,
  `media` varchar(255) NOT NULL,
  `lastupdate` varchar(40) default NULL,
  `trash` int(1) NOT NULL,
  PRIMARY KEY  (`media_id`),
  KEY `media` (`media`),
  KEY `lastupdate` (`lastupdate`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5574324 ;

--
-- Dumping data for table `meetingroom_media`
--

INSERT INTO `meetingroom_media` (`media_id`, `media`, `lastupdate`, `trash`) VALUES
(1, 'Notebook', NULL, 0),
(2, 'Projector', '2012-06-20 09:59:23', 0),
(3, 'Visualizer', '2010-06-29 11:20:08 | 127.0.0.1', 0),
(4, 'เครื่องเล่น VDO', NULL, 0),
(5, 'Microphone', NULL, 0),
(6, 'Internet', NULL, 0);

-- --------------------------------------------------------

--
-- Table structure for table `meetingroom_mediarelation`
--

DROP TABLE IF EXISTS `meetingroom_mediarelation`;
CREATE TABLE IF NOT EXISTS `meetingroom_mediarelation` (
  `id` int(11) NOT NULL auto_increment,
  `uq_id` varchar(20) NOT NULL,
  `media_id` int(5) NOT NULL,
  `net` varchar(5) NOT NULL,
  PRIMARY KEY  (`id`),
  KEY `uq_id` (`uq_id`,`media_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `meetingroom_mediarelation`
--

INSERT INTO `meetingroom_mediarelation` (`id`, `uq_id`, `media_id`, `net`) VALUES
(1, '12', 1, ''),
(2, '12', 1, ''),
(3, '12', 1, ''),
(4, '14', 1, ''),
(5, '14', 2, ''),
(6, '84', 1, ''),
(7, '84', 2, ''),
(8, '84', 3, '');

-- --------------------------------------------------------

--
-- Table structure for table `meetingroom_userq`
--

DROP TABLE IF EXISTS `meetingroom_userq`;
CREATE TABLE IF NOT EXISTS `meetingroom_userq` (
  `uq_id` varchar(11) NOT NULL,
  `u_id` int(11) default '0',
  `cr_id` int(11) default '0',
  `uname` varchar(255) default NULL COMMENT 'ชื่อผู้จอง',
  `email` varchar(200) default NULL COMMENT 'tel or email',
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
  `optionss` longtext COMMENT 'รายละเอียดเพิ่มเติม',
  `T_in` varchar(5) default NULL,
  `T_out` varchar(5) default NULL,
  `created` datetime default NULL COMMENT 'วันที่ทำรายการ',
  `status1` varchar(10) default 'wait' COMMENT '1=รอยืนยัน,2=ยืนยัน,0=ยกเลิก',
  `comment` text NOT NULL,
  `modified_by` int(3) default NULL,
  `modified` datetime default NULL,
  `confirm` datetime default NULL,
  `confirm_by` int(5) default NULL,
  `DeID` int(5) default NULL,
  `att` varchar(255) NOT NULL COMMENT 'เอกสารแนบ',
  `boss_confirm` int(1) NOT NULL,
  `boss_confirm_by` int(11) NOT NULL,
  `boss_confirm_date` datetime NOT NULL,
  PRIMARY KEY  (`uq_id`),
  KEY `DeID` (`DeID`),
  KEY `u_id` (`u_id`,`cr_id`,`time_in`,`status1`,`confirm_by`)
) ENGINE=MyISAM  DEFAULT CHARSET=tis620 PACK_KEYS=0;

--
-- Dumping data for table `meetingroom_userq`
--

INSERT INTO `meetingroom_userq` (`uq_id`, `u_id`, `cr_id`, `uname`, `email`, `Dater`, `enddate`, `time_in`, `time_out`, `title`, `edu_level`, `course`, `major`, `detail`, `phone`, `type`, `pratan`, `optionss`, `T_in`, `T_out`, `created`, `status1`, `comment`, `modified_by`, `modified`, `confirm`, `confirm_by`, `DeID`, `att`, `boss_confirm`, `boss_confirm_by`, `boss_confirm_date`) VALUES
('29', 68, 1, NULL, NULL, '2010-10-18', '2010-10-18', NULL, NULL, 'สศสอ.306 คอมพิวเตอร์สำหรับงานอนามัยชุมชน นศ.วิทยาศาสตรบํณฑิต (สาธารณสุขศาสตร์) เอกอนามัยชุมชน ชั้นปีที่ 3 ', NULL, NULL, NULL, '34', NULL, NULL, NULL, '', '10:00', '15:00', '2010-10-04 16:01:44', '1', '', NULL, NULL, NULL, NULL, 32, '', 0, 0, '0000-00-00 00:00:00'),
('28', 68, 1, NULL, NULL, '2010-10-11', '2010-10-11', NULL, NULL, 'สศสอ.306 คอมพิวเตอร์สำหรับงานอนามัยชุมชน นศ.วิทยาศาสตรบํณฑิต (สาธารณสุขศาสตร์) เอกอนามัยชุมชน ชั้นปีที่ 3 ', NULL, NULL, NULL, '34', NULL, NULL, NULL, '', '10:00', '15:00', '2010-10-04 16:00:25', '1', '', NULL, NULL, NULL, NULL, 32, '', 0, 0, '0000-00-00 00:00:00'),
('26', 68, 2, NULL, NULL, '2010-09-20', '2010-09-20', NULL, NULL, 'นักศึกษาซูดาน ขอใช้งานโปรแกรม End Note x4', NULL, NULL, NULL, '18', NULL, NULL, NULL, '', '09:00', '16:00', '2010-09-17 17:44:09', '1', '', NULL, '2010-09-17 17:48:31', NULL, NULL, 32, '', 0, 0, '0000-00-00 00:00:00'),
('27', 68, 3, NULL, NULL, '2010-09-22', '2010-09-22', NULL, NULL, 'สศออ. 654 การประเมินความเสี่ยงและการบริหารความเสี่ยง ', NULL, NULL, NULL, '22', NULL, NULL, NULL, 'CAMEO & ALOHA', '09:00', '12:00', '2010-09-17 17:45:19', '1', '', NULL, NULL, NULL, NULL, 32, '', 0, 0, '0000-00-00 00:00:00'),
('25', 68, 3, NULL, NULL, '2010-09-17', '2010-09-17', NULL, NULL, 'นักศึกษาซูดาน ขอให้โปรแกรม MineManager7.0', NULL, NULL, NULL, '18', NULL, NULL, NULL, '', '09:00', '16:00', '2010-09-17 17:43:34', '1', '', NULL, '2010-09-17 17:48:55', NULL, NULL, 32, '', 0, 0, '0000-00-00 00:00:00'),
('24', 68, 3, NULL, NULL, '2010-10-04', '2010-10-04', NULL, NULL, 'PHBS 651 Computer Application in Health Science Research', NULL, NULL, NULL, '6', NULL, NULL, NULL, '', '13:00', '16:00', '2010-09-17 17:41:32', '1', '', NULL, NULL, NULL, NULL, 32, '', 0, 0, '0000-00-00 00:00:00'),
('23', 68, 3, NULL, NULL, '2010-09-27', '2010-09-27', NULL, NULL, 'PHBS 651 Computer Application in Health Science Research', NULL, NULL, NULL, '6', NULL, NULL, NULL, '', '13:00', '16:00', '2010-09-17 17:40:53', '1', '', NULL, NULL, NULL, NULL, 32, '', 0, 0, '0000-00-00 00:00:00'),
('22', 68, 3, NULL, NULL, '2010-09-20', '2010-09-20', NULL, NULL, 'PHBS 651 Computer Application in Health Science Research', NULL, NULL, NULL, '6', NULL, NULL, NULL, '', '13:00', '16:00', '2010-09-17 17:39:56', '1', '', NULL, NULL, NULL, NULL, 32, '', 0, 0, '0000-00-00 00:00:00'),
('30', 68, 0, NULL, NULL, '2010-11-08', '2010-11-08', NULL, NULL, 'สศสอ.306 คอมพิวเตอร์สำหรับงานอนามัยชุมชน นศ.วิทยาศาสตรบํณฑิต (สาธารณสุขศาสตร์) เอกอนามัยชุมชน ชั้นปีที่ 3 ', NULL, NULL, NULL, '34', NULL, NULL, NULL, '', '10:00', '15:00', '2010-10-04 16:04:25', '1', '', NULL, NULL, NULL, NULL, 32, '', 0, 0, '0000-00-00 00:00:00'),
('31', 77, 2, NULL, NULL, '2010-11-05', '2010-11-05', NULL, NULL, 'ใช้ในการเรียนการสอนรายวิชา สศรบ 626 การใช้คอมพิวเตอร์และระบบสารสนเทศในการศึกษาวิจัยทางวิทยาการระบาด', NULL, NULL, NULL, '30', NULL, NULL, NULL, 'SPSS 17.0, Endnote13, WStata10,Microsoft Office 2003 หรือ Microsoft Office 2007', '13:00', '16:00', '2010-10-06 08:12:43', '1', '', NULL, '2010-10-06 10:05:11', NULL, NULL, 8, '', 0, 0, '0000-00-00 00:00:00'),
('32', 77, 2, NULL, NULL, '2010-11-12', '2010-11-12', NULL, NULL, 'ใช้ในการเรียนการสอนรายวิชา สศรบ 626 การใช้คอมพิวเตอร์และระบบสารสนเทศในการศึกษาวิจัยทางวิทยาการระบาด', NULL, NULL, NULL, '30', NULL, NULL, NULL, 'โปรแกรม SPSS 17.0 โปรแกรม STATA 10.0 และโปรแกรม   Endnote 13.0 ', '13:00', '16:00', '2010-10-06 10:06:46', '1', '', NULL, NULL, NULL, NULL, 8, '', 0, 0, '0000-00-00 00:00:00'),
('33', 77, 2, NULL, NULL, '2010-11-19', '2010-11-19', NULL, NULL, 'ใช้ในการเรียนการสอนรายวิชา สศรบ 626 การใช้คอมพิวเตอร์และระบบสารสนเทศในการศึกษาวิจัยทางวิทยาการระบาด', NULL, NULL, NULL, '30', NULL, NULL, NULL, 'โปรแกรม SPSS 17.0 โปรแกรม STATA 10.0 และโปรแกรม   Endnote 13.0 ', '13:00', '16:00', '2010-10-06 10:07:30', '1', '', NULL, NULL, NULL, NULL, 8, '', 0, 0, '0000-00-00 00:00:00'),
('34', 77, 2, NULL, NULL, '2010-11-26', '2010-11-26', NULL, NULL, 'ใช้ในการเรียนการสอนรายวิชา สศรบ 626 การใช้คอมพิวเตอร์และระบบสารสนเทศในการศึกษาวิจัยทางวิทยาการระบาด', NULL, NULL, NULL, '30', NULL, NULL, NULL, 'โปรแกรม SPSS 17.0 โปรแกรม STATA 10.0 และโปรแกรม   Endnote 13.0 ', '13:00', '16:00', '2010-10-06 10:08:50', '1', '', NULL, NULL, NULL, NULL, 8, '', 0, 0, '0000-00-00 00:00:00'),
('35', 77, 2, NULL, NULL, '2010-12-03', '2010-12-03', NULL, NULL, 'ใช้ในการเรียนการสอนรายวิชา สศรบ 626 การใช้คอมพิวเตอร์และระบบสารสนเทศในการศึกษาวิจัย ทางวิทยาการระบาด ', NULL, NULL, NULL, '30', NULL, NULL, NULL, 'โปรแกรม SPSS 17.0 โปรแกรม STATA 10.0 และโปรแกรม   Endnote 13.0 ', '13:00', '16:00', '2010-10-06 10:10:21', '1', '', NULL, '2010-10-06 10:10:50', NULL, NULL, 8, '', 0, 0, '0000-00-00 00:00:00'),
('36', 77, 2, NULL, NULL, '2010-12-17', '2010-12-17', NULL, NULL, 'ใช้ในการเรียนการสอนรายวิชา สศรบ 626 การใช้คอมพิวเตอร์และระบบสารสนเทศในการศึกษาวิจัย ทางวิทยาการระบาด', NULL, NULL, NULL, '30', NULL, NULL, NULL, 'โปรแกรม SPSS 17.0 โปรแกรม STATA 10.0 และโปรแกรม   Endnote 13.0 ', '13:00', '16:00', '2010-10-06 10:11:35', '1', '', NULL, NULL, NULL, NULL, 8, '', 0, 0, '0000-00-00 00:00:00'),
('37', 77, 2, NULL, NULL, '2010-12-24', '2010-12-24', NULL, NULL, 'ใช้ในการเรียนการสอนรายวิชา สศรบ 626 การใช้คอมพิวเตอร์และระบบสารสนเทศในการศึกษาวิจัย ทางวิทยาการระบาด', NULL, NULL, NULL, '30', NULL, NULL, NULL, 'โปรแกรม SPSS 17.0 \r\nโปรแกรม STATA 10.0 และโปรแกรม   Endnote 13.0 ', '13:00', '16:00', '2010-10-06 10:12:19', '1', '', NULL, NULL, NULL, NULL, 8, '', 0, 0, '0000-00-00 00:00:00'),
('38', 77, 2, NULL, NULL, '2011-01-07', '2011-01-07', NULL, NULL, 'ใช้ในการเรียนการสอนรายวิชา สศรบ 626 การใช้คอมพิวเตอร์และระบบสารสนเทศในการศึกษาวิจัย ทางวิทยาการระบาด', NULL, NULL, NULL, '30', NULL, NULL, NULL, 'โปรแกรม SPSS 17.0 โปรแกรม STATA 10.0 และโปรแกรม   Endnote 13.0 ', '13:00', '16:00', '2010-10-06 10:13:42', '2', '', NULL, NULL, NULL, NULL, 8, '', 0, 0, '0000-00-00 00:00:00'),
('39', 77, 2, NULL, NULL, '2011-01-14', '2011-01-14', NULL, NULL, 'ใช้ในการเรียนการสอนรายวิชา สศรบ 626 การใช้คอมพิวเตอร์และระบบสารสนเทศในการศึกษาวิจัย ทางวิทยาการระบาด', NULL, NULL, NULL, '30', NULL, NULL, NULL, 'โปรแกรม SPSS 17.0 โปรแกรม STATA 10.0 และโปรแกรม   Endnote 13.0 ', '13:00', '16:00', '2010-10-06 10:14:26', '2', '', NULL, NULL, NULL, NULL, 8, '', 0, 0, '0000-00-00 00:00:00'),
('40', 77, 2, NULL, NULL, '2011-01-21', '2011-01-21', NULL, NULL, 'ใช้ในการเรียนการสอนรายวิชา สศรบ 626 การใช้คอมพิวเตอร์และระบบสารสนเทศในการศึกษาวิจัย ทางวิทยาการระบาด', NULL, NULL, NULL, '30', NULL, NULL, NULL, 'โปรแกรม SPSS 17.0 โปรแกรม STATA 10.0 และโปรแกรม   Endnote 13.0 ', '13:00', '16:00', '2010-10-06 10:15:07', '2', '', NULL, NULL, NULL, NULL, 8, '', 0, 0, '0000-00-00 00:00:00'),
('41', 77, 2, NULL, NULL, '2011-01-28', '2011-01-28', NULL, NULL, 'ใช้ในการเรียนการสอนรายวิชา สศรบ 626 การใช้คอมพิวเตอร์และระบบสารสนเทศในการศึกษาวิจัย ทางวิทยาการระบาด', NULL, NULL, NULL, '30', NULL, NULL, NULL, 'โปรแกรม SPSS 17.0 โปรแกรม STATA 10.0 และโปรแกรม   Endnote 13.0 ', '13:00', '16:00', '2010-10-06 10:15:52', '1', '', NULL, NULL, NULL, NULL, 8, '', 0, 0, '0000-00-00 00:00:00'),
('42', 77, 2, NULL, NULL, '2011-02-04', '2011-02-04', NULL, NULL, 'ใช้ในการเรียนการสอนรายวิชา สศรบ 626 การใช้คอมพิวเตอร์และระบบสารสนเทศในการศึกษาวิจัย ทางวิทยาการระบาด', NULL, NULL, NULL, '30', NULL, NULL, NULL, 'โปรแกรม SPSS 17.0 โปรแกรม STATA 10.0 และโปรแกรม   Endnote 13.0 ', '13:00', '16:00', '2010-10-06 10:16:39', '1', '', NULL, NULL, NULL, NULL, 8, '', 0, 0, '0000-00-00 00:00:00'),
('43', 77, 2, NULL, NULL, '2011-02-11', '2011-02-11', NULL, NULL, 'ใช้ในการเรียนการสอนรายวิชา สศรบ 626 การใช้คอมพิวเตอร์และระบบสารสนเทศในการศึกษาวิจัย ทางวิทยาการระบาด', NULL, NULL, NULL, '30', NULL, NULL, NULL, 'โปรแกรม SPSS 17.0 โปรแกรม STATA 10.0 และโปรแกรม   Endnote 13.0 ', '13:00', '16:00', '2010-10-06 10:17:21', '1', '', NULL, NULL, NULL, NULL, 8, '', 0, 0, '0000-00-00 00:00:00'),
('44', 77, 2, NULL, NULL, '2011-02-18', '2011-02-18', NULL, NULL, 'ใช้ในการเรียนการสอนรายวิชา สศรบ 626 การใช้คอมพิวเตอร์และระบบสารสนเทศในการศึกษาวิจัย ทางวิทยาการระบาด', NULL, NULL, NULL, '30', NULL, NULL, NULL, 'โปรแกรม SPSS 17.0 โปรแกรม STATA 10.0 และโปรแกรม   Endnote 13.0 ', '13:00', '16:00', '2010-10-06 10:18:01', '1', '', NULL, NULL, NULL, NULL, 8, '', 0, 0, '0000-00-00 00:00:00'),
('45', 77, 2, NULL, NULL, '2011-02-25', '2011-02-25', NULL, NULL, 'ใช้ในการเรียนการสอนรายวิชา สศรบ 626 การใช้คอมพิวเตอร์และระบบสารสนเทศในการศึกษาวิจัย ทางวิทยาการระบาด', NULL, NULL, NULL, '30', NULL, NULL, NULL, 'โปรแกรม SPSS 17.0 โปรแกรม STATA 10.0 และโปรแกรม   Endnote 13.0 ', '13:00', '16:00', '2010-10-06 10:18:49', '1', '', NULL, NULL, NULL, NULL, 8, '', 0, 0, '0000-00-00 00:00:00'),
('46', 76, 1, NULL, NULL, '2010-12-23', '2010-12-23', NULL, NULL, 'เพื่อสอนนักศึกษาระดับปริญญาตรี วิชา สศภว 450 การประเมินทางโภชนาการ (การวิเคราะห์อาหารด้วยโปรแกรมสำเร็จรูป) ', NULL, NULL, NULL, '45', NULL, NULL, NULL, '', '13:00', '17:00', '2010-10-07 14:26:14', '1', '', NULL, NULL, NULL, NULL, 7, '', 0, 0, '0000-00-00 00:00:00'),
('47', 77, 1, NULL, NULL, '2010-11-01', '2010-11-01', NULL, NULL, 'การเรียนการสอนรายวิชา สศรบ 604 วิธีการทางสถิติในงานวิทยาการระบาด 1 ', NULL, NULL, NULL, '55', NULL, NULL, NULL, 'SPSS 17.0 Stata 10 Epi info 2003', '13:00', '17:00', '2010-10-13 12:55:37', '1', '', NULL, NULL, NULL, NULL, 8, '', 0, 0, '0000-00-00 00:00:00'),
('48', 77, 1, NULL, NULL, '2010-12-13', '2010-12-13', NULL, NULL, 'การเรียนการสอนรายวิชา สศรบ 604 วิธีการทางสถิติในงานวิทยาการระบาด 1 ', NULL, NULL, NULL, '55', NULL, NULL, NULL, 'SPSS 17.0 Stata 10 Epi info 2003', '13:00', '17:00', '2010-10-13 12:56:29', '1', '', NULL, NULL, NULL, NULL, 8, '', 0, 0, '0000-00-00 00:00:00'),
('49', 77, 1, NULL, NULL, '2010-12-20', '2010-12-20', NULL, NULL, 'การเรียนการสอนรายวิชา สศรบ 604 วิธีการทางสถิติในงานวิทยาการระบาด 1 ', NULL, NULL, NULL, '55', NULL, NULL, NULL, 'SPSS 17.0 Stata 10 Epi info 2003', '13:00', '17:00', '2010-10-13 12:57:20', '1', '', NULL, NULL, NULL, NULL, 8, '', 0, 0, '0000-00-00 00:00:00'),
('50', 77, 1, NULL, NULL, '2011-01-06', '2011-01-06', NULL, NULL, 'การเรียนการสอนรายวิชา สศรบ 604 วิธีการทางสถิติในงานวิทยาการระบาด 1 ', NULL, NULL, NULL, '55', NULL, NULL, NULL, 'SPSS 17.0 Stata 10 Epi info 2003', '13:00', '17:00', '2010-10-13 12:58:05', '1', '', NULL, NULL, NULL, NULL, 8, '', 0, 0, '0000-00-00 00:00:00'),
('51', 77, 1, NULL, NULL, '2011-01-24', '2011-01-24', NULL, NULL, 'การเรียนการสอนรายวิชา สศรบ 604 วิธีการทางสถิติในงานวิทยาการระบาด 1 ', NULL, NULL, NULL, '55', NULL, NULL, NULL, 'SPSS 17.0 Stata 10 Epi info 2003', '13:00', '17:00', '2010-10-13 12:58:57', '1', '', NULL, NULL, NULL, NULL, 8, '', 0, 0, '0000-00-00 00:00:00'),
('52', 77, 1, NULL, NULL, '2011-02-14', '2011-02-14', NULL, NULL, 'การเรียนการสอนรายวิชา สศรบ 604 วิธีการทางสถิติในงานวิทยาการระบาด 1 ', NULL, NULL, NULL, '55', NULL, NULL, NULL, 'SPSS 17.0 Stata 10 Epi info 2003', '13:00', '17:00', '2010-10-13 12:59:41', '1', '', NULL, NULL, NULL, NULL, 8, '', 0, 0, '0000-00-00 00:00:00'),
('54', 76, 3, NULL, NULL, '2010-11-09', '2010-11-09', NULL, NULL, 'สืบค้นข้อมูล', NULL, NULL, NULL, '13', NULL, NULL, NULL, '', '09:00', '11:00', '2010-11-01 10:59:31', '1', '', NULL, NULL, NULL, NULL, 7, '', 0, 0, '0000-00-00 00:00:00'),
('55', 89, 3, NULL, NULL, '2010-11-30', '2010-11-30', NULL, NULL, 'PHBS 630', NULL, NULL, NULL, '20', NULL, NULL, NULL, 'spss', '09:00', '12:00', '2010-11-04 09:20:56', '1', '', NULL, NULL, NULL, NULL, 32, '', 0, 0, '0000-00-00 00:00:00'),
('56', 72, 3, NULL, NULL, '2010-11-11', '2010-11-11', NULL, NULL, 'Introduction to STATA', NULL, NULL, NULL, '9', NULL, NULL, NULL, '', '09:00', '12:00', '2010-11-09 09:01:02', '1', '', NULL, NULL, NULL, NULL, 4, '', 0, 0, '0000-00-00 00:00:00'),
('57', 72, 3, NULL, NULL, '2010-11-12', '2010-11-12', NULL, NULL, 'Theory of GLM I', NULL, NULL, NULL, '9', NULL, NULL, NULL, '', '09:00', '12:00', '2010-11-09 09:02:11', '1', '', NULL, NULL, NULL, NULL, 4, '', 0, 0, '0000-00-00 00:00:00'),
('58', 72, 3, NULL, NULL, '2010-11-18', '2010-11-18', NULL, NULL, 'Theory of GLM II', NULL, NULL, NULL, '9', NULL, NULL, NULL, '', '09:00', '12:00', '2010-11-09 09:04:22', '1', '', NULL, NULL, NULL, NULL, 4, '', 0, 0, '0000-00-00 00:00:00'),
('59', 72, 3, NULL, NULL, '2010-11-19', '2010-11-19', NULL, NULL, 'Linear Models of Full Rank: Regression Models', NULL, NULL, NULL, '9', NULL, NULL, NULL, '', '09:00', '12:00', '2010-11-09 09:08:06', '1', '', NULL, NULL, NULL, NULL, 4, '', 0, 0, '0000-00-00 00:00:00'),
('60', 72, 3, NULL, NULL, '2010-11-25', '2010-11-25', NULL, NULL, 'Linear Models of Less Than Full Rank: One-way ANOVA, and Two-way ANOVA Models', NULL, NULL, NULL, '9', NULL, NULL, NULL, '', '09:00', '12:00', '2010-11-09 09:10:06', '1', '', NULL, NULL, NULL, NULL, 4, '', 0, 0, '0000-00-00 00:00:00'),
('61', 72, 3, NULL, NULL, '2010-11-26', '2010-11-26', NULL, NULL, 'Linear Models: ANCOVA Models', NULL, NULL, NULL, '9', NULL, NULL, NULL, '', '09:00', '12:00', '2010-11-09 09:11:19', '1', '', NULL, NULL, NULL, NULL, 4, '', 0, 0, '0000-00-00 00:00:00'),
('62', 72, 3, NULL, NULL, '2010-12-03', '2010-12-03', NULL, NULL, 'Logit Models for Binary Data', NULL, NULL, NULL, '9', NULL, NULL, NULL, '', '09:00', '12:00', '2010-11-09 09:12:29', '1', '', NULL, NULL, NULL, NULL, 4, '', 0, 0, '0000-00-00 00:00:00'),
('63', 72, 3, NULL, NULL, '2010-12-06', '2010-12-06', NULL, NULL, 'Logit Models for Binary Data', NULL, NULL, NULL, '9', NULL, NULL, NULL, '', '09:00', '12:00', '2010-11-09 09:13:10', '1', '', NULL, NULL, NULL, NULL, 4, '', 0, 0, '0000-00-00 00:00:00'),
('64', 72, 3, NULL, NULL, '2010-12-09', '2010-12-09', NULL, NULL, 'Polytomous/ Ordinal Logistic Regression for Multiple/ Ordinal Response Data', NULL, NULL, NULL, '9', NULL, NULL, NULL, '', '09:00', '12:00', '2010-11-09 09:38:41', '1', '', NULL, NULL, NULL, NULL, 4, '', 0, 0, '0000-00-00 00:00:00'),
('65', 72, 3, NULL, NULL, '2010-12-13', '2010-12-13', NULL, NULL, 'Conditional Logit Models for Matched Data', NULL, NULL, NULL, '9', NULL, NULL, NULL, '', '09:00', '12:00', '2010-11-09 09:40:07', '1', '', NULL, NULL, NULL, NULL, 4, '', 0, 0, '0000-00-00 00:00:00'),
('66', 72, 3, NULL, NULL, '2010-12-20', '2010-12-20', NULL, NULL, 'Examination Part I-III (Topic 1-10)', NULL, NULL, NULL, '9', NULL, NULL, NULL, '', '09:00', '12:00', '2010-11-09 09:42:01', '1', '', NULL, NULL, NULL, NULL, 4, '', 0, 0, '0000-00-00 00:00:00'),
('67', 72, 3, NULL, NULL, '2010-12-23', '2010-12-23', NULL, NULL, 'Poisson Models for Count Data', NULL, NULL, NULL, '9', NULL, NULL, NULL, '', '09:00', '12:00', '2010-11-09 09:49:13', '1', '', NULL, NULL, NULL, NULL, 4, '', 0, 0, '0000-00-00 00:00:00'),
('68', 72, 3, NULL, NULL, '2010-12-27', '2010-12-27', NULL, NULL, 'Truncated Count Models', NULL, NULL, NULL, '9', NULL, NULL, NULL, '', '09:00', '12:00', '2010-11-09 09:50:07', '1', '', NULL, NULL, NULL, NULL, 4, '', 0, 0, '0000-00-00 00:00:00'),
('69', 72, 3, NULL, NULL, '2010-12-30', '2010-12-30', NULL, NULL, 'Log-Linear Models for Contingency Tables', NULL, NULL, NULL, '9', NULL, NULL, NULL, '', '09:00', '12:00', '2010-11-09 09:50:46', '1', '', NULL, NULL, NULL, NULL, 4, '', 0, 0, '0000-00-00 00:00:00'),
('70', 72, 3, NULL, NULL, '2011-01-06', '2011-01-06', NULL, NULL, 'Capture-Recapture Models for Contingency Tables', NULL, NULL, NULL, '9', NULL, NULL, NULL, '', '09:00', '12:00', '2010-11-09 09:51:21', '1', '', NULL, NULL, NULL, NULL, 4, '', 0, 0, '0000-00-00 00:00:00'),
('71', 72, 3, NULL, NULL, '2011-01-07', '2011-01-07', NULL, NULL, 'Survival Models I', NULL, NULL, NULL, '9', NULL, NULL, NULL, '', '09:00', '12:00', '2010-11-09 09:52:00', '1', '', NULL, NULL, NULL, NULL, 4, '', 0, 0, '0000-00-00 00:00:00'),
('72', 72, 3, NULL, NULL, '2011-01-13', '2011-01-13', NULL, NULL, 'Survival Models II', NULL, NULL, NULL, '9', NULL, NULL, NULL, '', '09:00', '12:00', '2010-11-09 09:52:37', '1', '', NULL, NULL, NULL, NULL, 4, '', 0, 0, '0000-00-00 00:00:00'),
('73', 72, 3, NULL, NULL, '2011-01-14', '2011-01-14', NULL, NULL, 'Multi-level and Repeated Measures Models', NULL, NULL, NULL, '9', NULL, NULL, NULL, '', '09:00', '12:00', '2010-11-09 09:53:02', '1', '', NULL, NULL, NULL, NULL, 4, '', 0, 0, '0000-00-00 00:00:00'),
('74', 72, 3, NULL, NULL, '2011-01-20', '2011-01-20', NULL, NULL, 'Multi-level and Repeated Measures Models', NULL, NULL, NULL, '9', NULL, NULL, NULL, '', '09:00', '12:00', '2010-11-09 09:53:48', '1', '', NULL, NULL, NULL, NULL, 4, '', 0, 0, '0000-00-00 00:00:00'),
('75', 72, 3, NULL, NULL, '2011-01-21', '2011-01-21', NULL, NULL, 'Multi-level and Repeated Measures Models', NULL, NULL, NULL, '9', NULL, NULL, NULL, '', '09:00', '12:00', '2010-11-09 09:54:48', '1', '', NULL, NULL, NULL, NULL, 4, '', 0, 0, '0000-00-00 00:00:00'),
('76', 72, 3, NULL, NULL, '2011-01-27', '2011-01-27', NULL, NULL, 'Examination Part IV-V (Topic 12-20)', NULL, NULL, NULL, '9', NULL, NULL, NULL, '', '09:00', '12:00', '2010-11-09 09:55:22', '1', '', NULL, NULL, NULL, NULL, 4, '', 0, 0, '0000-00-00 00:00:00'),
('77', 68, 1, NULL, NULL, '2010-11-30', '2010-11-30', NULL, NULL, 'สศสอ. 412 การประมวลผลข้อมูลในงานอนามัยชุมชน', NULL, NULL, NULL, '95', NULL, NULL, NULL, 'วิเเคราะห์ข้อมูลทางระบาดวิทยา', '08:00', '17:00', '2010-11-15 14:33:02', '1', '', NULL, NULL, NULL, NULL, 32, '', 0, 0, '0000-00-00 00:00:00'),
('78', 68, 1, NULL, NULL, '2010-11-20', '2010-11-20', NULL, NULL, 'สศสอ. 412 การประมวลผลข้อมูลในงานอนามัยชุมชน', NULL, NULL, NULL, '95', NULL, NULL, NULL, 'การประมวลผลทางระบาดวิทยา', '08:00', '17:00', '2010-11-15 15:24:26', '1', '', NULL, NULL, NULL, NULL, 32, '', 0, 0, '0000-00-00 00:00:00'),
('79', 68, 1, NULL, NULL, '2010-12-11', '2010-12-11', NULL, NULL, 'สศสอ. 412 การประมวลผลข้อมูลในงานอนามัยชุมชน', NULL, NULL, NULL, '95', NULL, NULL, NULL, 'การวิเคราะห์ข้อมูลทางระบาดวิทยา', '08:00', '17:00', '2010-11-15 15:25:14', '1', '', NULL, NULL, NULL, NULL, 32, '', 0, 0, '0000-00-00 00:00:00'),
('80', 68, 1, NULL, NULL, '2010-12-12', '2010-12-12', NULL, NULL, 'สศสอ. 412 การประมวลผลข้อมูลในงานอนามัยชุมชน', NULL, NULL, NULL, '95', NULL, NULL, NULL, 'การวิเคราะห์ข้อมูลทางระบาดวิทยา', '08:00', '16:00', '2010-11-15 15:26:15', '1', '', NULL, NULL, NULL, NULL, 32, '', 0, 0, '0000-00-00 00:00:00'),
('81', 89, 2, NULL, NULL, '2011-01-17', NULL, NULL, NULL, 'สอบนักศึกษา วิชา PHBS651', NULL, NULL, NULL, '30', NULL, NULL, NULL, 'spss', '13:00', '16:00', '2010-12-13 11:30:22', '1', '', NULL, NULL, NULL, NULL, 32, '', 0, 0, '0000-00-00 00:00:00'),
('82', 89, 42, NULL, NULL, '2010-12-17', NULL, NULL, NULL, 'สอบนักศึกษา วิชา PHBS65', NULL, NULL, NULL, '20', NULL, NULL, NULL, 'spss', '13:00', '16:00', '2010-12-13 11:34:25', '1', '', NULL, NULL, NULL, NULL, 32, '', 0, 0, '0000-00-00 00:00:00'),
('83', 62, 42, NULL, NULL, '2011-01-14', '', NULL, NULL, 'test', 'ปริญญาโท', 'test', 'test', '20', NULL, NULL, NULL, 'test', '13:00', '16:30', '2011-01-13 11:19:04', '1', '', NULL, NULL, NULL, NULL, 32, '', 0, 0, '0000-00-00 00:00:00'),
('84', 62, 3, NULL, NULL, '2012-01-19', '2012-01-19', '1', NULL, 'test', NULL, NULL, NULL, '30', NULL, NULL, NULL, 'test', NULL, NULL, '2012-01-18 10:44:28', '1', '', NULL, NULL, NULL, NULL, NULL, '', 0, 0, '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `organization`
--

DROP TABLE IF EXISTS `organization`;
CREATE TABLE IF NOT EXISTS `organization` (
  `DeID` int(2) unsigned NOT NULL auto_increment,
  `Code` varchar(8) NOT NULL default '',
  `Fname` varchar(50) NOT NULL,
  `Sname` varchar(16) NOT NULL default '',
  `Chair` varchar(32) NOT NULL default '',
  `Type` char(2) default NULL,
  `Posit` char(1) NOT NULL default '',
  `tel` varchar(200) NOT NULL,
  PRIMARY KEY  (`DeID`),
  KEY `DeID` (`DeID`,`Fname`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 PACK_KEYS=0 COMMENT='???ง?/?????' AUTO_INCREMENT=47 ;

--
-- Dumping data for table `organization`
--

INSERT INTO `organization` (`DeID`, `Code`, `Fname`, `Sname`, `Chair`, `Type`, `Posit`, `tel`) VALUES
(1, 'PH', 'ภาควิชา', 'คณะสาสุข', '', '0', '1', ''),
(2, '1', 'ภาควิชาการพยาบาลสาธารณสุข', '3402', '1', '1', '', ''),
(3, '2', 'ภาควิชาจุลชีววิทยา', '6514', '1', '1', '', ''),
(4, '3', 'ภาควิชาชีวสถิติ', '3203', '1', '1', '', ''),
(5, 'PHAD', 'ภาควิชาบริหารงานสาธารณสุข', 'ภาคบริหาร', 'หัวหน้าภาควิชา', '1', '1', ''),
(6, '5', 'ภาควิชาปรสิตวิทยา', '1208', '1', '1', '', ''),
(7, '6', 'ภาควิชาโภชนวิทยา', '1304', '1', '1', '', ''),
(8, '7', 'ภาควิชาระบาดวิทยา', '3301', '1', '1', '', ''),
(9, '8', 'ภาควิชาวิทยาศาสตร์อนามัยสิ่งแวดล้อม', '2403', '1', '1', '', ''),
(10, '9', 'ภาควิชาวิศวกรรมสุขาภิบาล', '2201', '1', '1', '', ''),
(11, '10', 'ภาควิชาสุขศึกษาและพฤติกรรมศาสตร์', '3604', '1', '1', '', ''),
(12, '11', 'ภาควิชาอนามัยครอบครัว', '1302', '1', '1', '', ''),
(13, '12', 'ภาควิชาอาชีวอนามัยและความปลอดภัย', '2601', '1', '1', '', ''),
(14, '13', 'สถานฝึกอบรมและวิจัยอนามัยชนบท', '', '1', '1', '', ''),
(15, 'PHSO', 'สำนักงานคณบดี', 'สนง.คณบดี', 'หัวหน้าสำนักงาน', '0', '1', ''),
(16, 'PHSOFA', 'หน่วยการเงินและบัญชี', 'การเงิน', 'หัวหน้าหน่วย', '15', '1', ''),
(17, 'PHSOPS', 'หน่วยพัสดุ', 'พัสดุ', 'หัวหน้าหน่วย', '15', '1', ''),
(18, 'PHSOCU', 'หน่วยสารบรรณ', 'สารบรรณ', 'หัวหน้าหน่วย', '15', '1', ''),
(19, 'PHSOMU', 'หน่วยซ่อมบำรุง', 'ซ่อมบำรุง', 'หัวหน้าหน่วย', '15', '1', ''),
(20, 'PHSOPP', 'งานนโยบายและแผน', 'งานแผน', 'หัวหน้างาน', '15', '1', ''),
(21, 'PHSOAA', 'งานบริการการศึกษา', 'การศึกษา', 'หัวหน้างาน', '15', '1', ''),
(22, 'PHSOPU', 'หน่วยการเจ้าหน้าที่', 'การเจ้าหน้าที่', 'หัวหน้าหน่วย', '15', '1', ''),
(23, 'PHSOTU', 'หน่วยยานยนต์', 'ยานยนต์', 'หัวหน้าหน่วย', '15', '1', ''),
(24, 'PHSOLU', 'หน่วยประชาสัมพันธ์', 'ประชาสัมพันธ์', 'หัวหน้าหน่วย', '15', '1', ''),
(25, 'PHSORU', 'หน่วยบริหารและพัฒนางานวิจัย', 'หน่วยวิจัย', 'หัวหน้าหน่วย', '15', '1', ''),
(26, 'PHSOIU', 'หน่วยวิเทศสัมพันธ์', 'หน่วยวิเทศ', 'หัวหน้าหน่วย', '15', '1', ''),
(27, 'PHSOAV', 'ศูนย์ผลิตและพัฒนาสื่อสาธารณสุข', 'ศูนย์ผลิต', 'หัวหน้าศูนย์', '15', '1', '4102,4103'),
(28, 'PHSOMP', 'หน่วยประสานงานหลักสูตร ส.ม.', 'ส.ม.', 'ประธานหลักสูตร', '15', '1', ''),
(29, 'PHSOOV', 'สำนักงานเทคโนโลยีสาธารณสุข', 'สนง.เทคโน', 'หัวหน้าสำนักงาน', '15', '1', ''),
(30, 'PHSOCL', 'สำนักงานปฏิบัติการกลาง', 'LAB กลาง', 'หัวหน้าสำนักงาน', '15', '1', ''),
(31, 'PHSOSG', 'ฝ่ายเลขานุการ', 'ฝ่ายเลขา', '', '15', '1', ''),
(32, 'PHSOIT', 'หน่วยเทคโนโลยีสารสนเทศ', 'ไอที', 'หัวหน้าหน่วย', '15', '1', '7305,7306'),
(33, 'PHSOBA', 'หน่วยอาคารสถานที่', 'สถานที่', 'หัวหน้าหน่วย', '15', '1', ''),
(34, 'PHSOSM', 'หน่วยบริการการประชุม', 'การประชุม', 'หัวหน้าหน่วย', '15', '1', ''),
(35, 'PHSODP', 'หน่วยประสานงานหลักสูตร ส.ด.', 'ส.ด.', 'ประธานหลักสูตร', '15', '1', ''),
(36, '', 'ฝ่ายกิจการนักศึกษา', 'กิจการ น.ศ.', 'หัวหน้าฝ่าย', '15', '1', ''),
(37, '', 'ศูนย์ส่งเสริมสุขภาพ', 'ศูนย์สุขภาพ', '', '15', '1', ''),
(38, '', 'อาคารเอนกประสงค์', 'อาคาร 7', '', '15', '1', ''),
(39, '', 'หน่วยประกันคุณภาพการศึกษา', 'ประกันคุณภาพ', '', '15', '1', ''),
(40, '', 'โครงการเร่งรัดผลิตบัณฑิตทันตแพทย์', 'ผลิตทันต', '', '15', '1', ''),
(41, '', 'ชมรมดนตรีไทย', 'ดนตรีไทย', 'ประธานชมรม', '15', '1', ''),
(42, 'PHSOFP', 'งานคลังและพัสดุ', 'งานคลัง', 'หัวหน้างาน', '15', '1', ''),
(43, 'PHSOAG', 'งานบริหารและธุรการ', 'งานบริหาร', 'หัวหน้างาน', '15', '1', ''),
(44, '', 'บุคคลภายนอก', '', '', NULL, '', '');

-- --------------------------------------------------------

--
-- Table structure for table `permission`
--

DROP TABLE IF EXISTS `permission`;
CREATE TABLE IF NOT EXISTS `permission` (
  `NO` int(5) NOT NULL,
  `confirm` int(1) NOT NULL,
  `basic` int(1) NOT NULL,
  `user` int(1) NOT NULL,
  `report` int(1) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=tis620;

--
-- Dumping data for table `permission`
--

INSERT INTO `permission` (`NO`, `confirm`, `basic`, `user`, `report`) VALUES
(1, 1, 1, 1, 0),
(9, 1, 1, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `picroom`
--

DROP TABLE IF EXISTS `picroom`;
CREATE TABLE IF NOT EXISTS `picroom` (
  `cr_id` int(2) NOT NULL,
  `pictype` varchar(200) NOT NULL,
  `picdata` mediumblob NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `room_time`
--

DROP TABLE IF EXISTS `room_time`;
CREATE TABLE IF NOT EXISTS `room_time` (
  `tim_id` int(1) NOT NULL auto_increment,
  `name` varchar(50) NOT NULL,
  `start` varchar(5) NOT NULL,
  `end` varchar(5) NOT NULL,
  `modified` text NOT NULL,
  `modified_by` int(2) NOT NULL,
  `trash` int(1) NOT NULL,
  PRIMARY KEY  (`tim_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=tis620 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `room_time`
--

INSERT INTO `room_time` (`tim_id`, `name`, `start`, `end`, `modified`, `modified_by`, `trash`) VALUES
(1, 'เช้า', '08:30', '12:00', '', 0, 0),
(2, 'บ่าย', '13:00', '16:30', '', 0, 0),
(3, 'ตลอดวัน', '08:30', '16:30', '', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `room_type`
--

DROP TABLE IF EXISTS `room_type`;
CREATE TABLE IF NOT EXISTS `room_type` (
  `id` int(10) NOT NULL auto_increment,
  `name` varchar(50) default NULL,
  `trash` int(1) default NULL,
  `lastupdate` datetime NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5578388 ;

--
-- Dumping data for table `room_type`
--

INSERT INTO `room_type` (`id`, `name`, `trash`, `lastupdate`) VALUES
(1, 'ห้องประชุม', 0, '2012-06-18 00:00:00'),
(2, 'ห้องเรียน', 0, '2012-06-18 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `software`
--

DROP TABLE IF EXISTS `software`;
CREATE TABLE IF NOT EXISTS `software` (
  `id` int(2) NOT NULL auto_increment,
  `names` varchar(200) NOT NULL,
  `active` int(1) NOT NULL,
  `created` datetime default NULL,
  `created_by` int(3) default NULL,
  `modified` datetime default NULL,
  `modified_by` int(3) default NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `software`
--

INSERT INTO `software` (`id`, `names`, `active`, `created`, `created_by`, `modified`, `modified_by`) VALUES
(1, 'SPSS', 1, '2010-10-28 11:36:54', 62, NULL, NULL),
(2, 'Microsoft Office 2003', 1, '2010-10-28 11:37:25', 62, NULL, NULL),
(3, 'Endnote', 1, NULL, NULL, NULL, NULL),
(4, 'Photoshop', 1, NULL, NULL, NULL, NULL),
(5, 'Dreamweaver', 1, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `software_relation`
--

DROP TABLE IF EXISTS `software_relation`;
CREATE TABLE IF NOT EXISTS `software_relation` (
  `uq_id` int(5) NOT NULL,
  `softId` int(2) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `tb_booking_time`
--

DROP TABLE IF EXISTS `tb_booking_time`;
CREATE TABLE IF NOT EXISTS `tb_booking_time` (
  `uq_id` int(11) NOT NULL,
  `tim_id` int(11) NOT NULL,
  KEY `up_id` (`uq_id`,`tim_id`)
) ENGINE=MyISAM DEFAULT CHARSET=tis620;

--
-- Dumping data for table `tb_booking_time`
--

INSERT INTO `tb_booking_time` (`uq_id`, `tim_id`) VALUES
(84, 1),
(84, 2);

-- --------------------------------------------------------

--
-- Table structure for table `tb_mail_contact`
--

DROP TABLE IF EXISTS `tb_mail_contact`;
CREATE TABLE IF NOT EXISTS `tb_mail_contact` (
  `id` int(11) NOT NULL auto_increment,
  `name` varchar(255) default NULL,
  `email` varchar(200) NOT NULL,
  `DeID` int(11) NOT NULL,
  PRIMARY KEY  (`id`),
  KEY `DeID` (`DeID`),
  KEY `email_2` (`email`)
) ENGINE=MyISAM  DEFAULT CHARSET=tis620 AUTO_INCREMENT=10 ;

--
-- Dumping data for table `tb_mail_contact`
--

INSERT INTO `tb_mail_contact` (`id`, `name`, `email`, `DeID`) VALUES
(1, NULL, 'phpse@mahidol.ac.th', 27),
(2, NULL, 'phnarin@mahidol.ac.th', 27),
(3, NULL, 'shairwab@hotmail.com', 27),
(4, NULL, 'phcyy@mahidol.ac.th', 27),
(5, NULL, 'tekwp@mahidol.ac.th', 27),
(6, NULL, 'phwww@mahidol.ac.th', 32),
(7, NULL, 'teste@mahidol.ac.th', 32),
(8, NULL, 'phsye@mahidol.ac.th', 32),
(9, NULL, 'phccr@mahidol.ac.th', 32);

-- --------------------------------------------------------

--
-- Table structure for table `tb_room_res`
--

DROP TABLE IF EXISTS `tb_room_res`;
CREATE TABLE IF NOT EXISTS `tb_room_res` (
  `id` int(11) NOT NULL auto_increment,
  `cr_id` varchar(5) default NULL,
  `user_id` varchar(5) default NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=tis620 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `term`
--

DROP TABLE IF EXISTS `term`;
CREATE TABLE IF NOT EXISTS `term` (
  `id` int(2) NOT NULL auto_increment,
  `term` int(1) NOT NULL,
  `years` int(4) NOT NULL,
  `datestart` date NOT NULL,
  `dateend` date NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `term`
--

INSERT INTO `term` (`id`, `term`, `years`, `datestart`, `dateend`) VALUES
(1, 2, 2010, '2010-10-26', '2011-01-15');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
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
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=10 ;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`NO`, `USR_CODE`, `USR_PAS`, `USR_NAME`, `USR_SURNAME`, `DEPARTMENT_NO`, `SUBDEPARTMENT_NO`, `USR_LASTUPDATE`, `confirm`, `basic`, `user`, `report`, `ONLINE_DELETE`, `EMAIL`, `LOGIN`, `BLOCK`, `photo`, `G_ID`) VALUES
(1, 'admin', 'admin', 'ผู้ดูแลระบบ', '', 32, 0, '2009-08-06 11:10:00', 1, 1, 1, 0, 0, 'iceeagle99@gmail.com', 0, 0, 'Logo111.gif', 'Administrator'),
(9, 'demo', 'demo', 'ทดสอบระบบ', 'เธเธฃเธฐเธขเธนเธฃเธเธดเธเธเธดเธเธธเธฅ', 32, 14, '0', 0, 0, 0, 0, 0, 'localhost@localhost', 0, 0, 'Logo111.gif', 'Member');

-- --------------------------------------------------------

--
-- Table structure for table `user_log`
--

DROP TABLE IF EXISTS `user_log`;
CREATE TABLE IF NOT EXISTS `user_log` (
  `ul_id` int(11) unsigned NOT NULL auto_increment,
  `us_id` int(2) default NULL,
  `ul_in` datetime default '0000-00-00 00:00:00',
  `ul_out` datetime default '0000-00-00 00:00:00',
  `ul_ip` varchar(16) NOT NULL default '',
  `ul_url` text,
  `class` char(3) default NULL,
  PRIMARY KEY  (`ul_id`),
  KEY `us_id` (`us_id`,`ul_in`,`ul_ip`,`class`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 PACK_KEYS=0 COMMENT='เธเธฑเธเธเธถเธเธเธฒเธฃเนเธเนเธฒเนเธเนเธเธฒเธเธฃ' AUTO_INCREMENT=1282 ;

--
-- Dumping data for table `user_log`
--

INSERT INTO `user_log` (`ul_id`, `us_id`, `ul_in`, `ul_out`, `ul_ip`, `ul_url`, `class`) VALUES
(1, 1, '2010-06-16 13:53:16', '0000-00-00 00:00:00', '127.0.0.1', NULL, NULL),
(2, 1, '2010-06-16 13:53:32', '0000-00-00 00:00:00', '127.0.0.1', NULL, NULL),
(3, 1, '2010-06-16 13:53:50', '0000-00-00 00:00:00', '127.0.0.1', NULL, NULL),
(4, 1, '2010-06-16 13:53:52', '0000-00-00 00:00:00', '127.0.0.1', NULL, NULL),
(5, 1, '2010-06-16 13:53:57', '0000-00-00 00:00:00', '127.0.0.1', NULL, NULL),
(6, 1, '2010-06-16 13:55:14', '0000-00-00 00:00:00', '127.0.0.1', NULL, NULL),
(7, 1, '2010-06-16 15:12:53', '0000-00-00 00:00:00', '127.0.0.1', NULL, NULL),
(8, 1, '2010-06-21 14:00:13', '0000-00-00 00:00:00', '127.0.0.1', NULL, NULL),
(9, 1, '2010-06-21 14:03:22', '0000-00-00 00:00:00', '127.0.0.1', NULL, NULL),
(10, 1, '2010-06-21 14:14:56', '0000-00-00 00:00:00', '127.0.0.1', NULL, NULL),
(11, 1, '2010-06-21 14:15:17', '0000-00-00 00:00:00', '127.0.0.1', NULL, NULL),
(12, 1, '2010-06-21 14:26:09', '0000-00-00 00:00:00', '127.0.0.1', NULL, NULL),
(13, 1, '2010-06-21 14:26:29', '0000-00-00 00:00:00', '127.0.0.1', NULL, NULL),
(14, 1, '2010-06-22 09:15:43', '0000-00-00 00:00:00', '127.0.0.1', NULL, NULL),
(15, 1, '2010-06-22 11:08:18', '0000-00-00 00:00:00', '127.0.0.1', NULL, NULL),
(16, 1, '2010-06-22 16:18:32', '0000-00-00 00:00:00', '127.0.0.1', NULL, NULL),
(17, 9, '2010-06-23 09:04:36', '0000-00-00 00:00:00', '127.0.0.1', NULL, NULL),
(18, 9, '2010-06-23 11:08:35', '0000-00-00 00:00:00', '127.0.0.1', NULL, NULL),
(19, 1, '2010-06-23 14:17:39', '0000-00-00 00:00:00', '127.0.0.1', NULL, NULL),
(20, 1, '2010-06-23 15:34:46', '0000-00-00 00:00:00', '127.0.0.1', NULL, NULL),
(21, 1, '2010-06-24 10:49:09', '0000-00-00 00:00:00', '127.0.0.1', NULL, NULL),
(22, 1, '2010-06-24 14:23:44', '0000-00-00 00:00:00', '127.0.0.1', NULL, NULL),
(23, 1, '2010-06-25 13:18:25', '0000-00-00 00:00:00', '127.0.0.1', NULL, NULL),
(24, 1, '2010-06-26 11:52:27', '0000-00-00 00:00:00', '127.0.0.1', NULL, NULL),
(25, 1, '2010-06-26 12:00:22', '0000-00-00 00:00:00', '127.0.0.1', NULL, NULL),
(26, 1, '2010-06-26 23:02:43', '0000-00-00 00:00:00', '127.0.0.1', NULL, NULL),
(27, 1, '2010-06-27 09:15:05', '0000-00-00 00:00:00', '127.0.0.1', NULL, NULL),
(28, 1, '2010-06-28 09:46:48', '0000-00-00 00:00:00', '127.0.0.1', NULL, NULL),
(29, 1, '2010-06-28 12:28:03', '0000-00-00 00:00:00', '127.0.0.1', NULL, NULL),
(30, 1, '2010-06-29 09:15:03', '0000-00-00 00:00:00', '127.0.0.1', NULL, NULL),
(31, 9, '2010-06-29 09:51:36', '0000-00-00 00:00:00', '127.0.0.1', NULL, NULL),
(32, 9, '2010-06-29 11:13:04', '0000-00-00 00:00:00', '127.0.0.1', NULL, NULL),
(33, 1, '2010-06-29 11:42:51', '0000-00-00 00:00:00', '127.0.0.1', NULL, NULL),
(34, 1, '2010-06-29 14:52:50', '0000-00-00 00:00:00', '127.0.0.1', NULL, NULL),
(35, 1, '2010-06-30 10:53:49', '0000-00-00 00:00:00', '127.0.0.1', NULL, NULL),
(36, 1, '2010-08-10 14:18:26', '0000-00-00 00:00:00', '127.0.0.1', NULL, NULL),
(37, 1, '2010-08-13 17:30:57', '0000-00-00 00:00:00', '127.0.0.1', NULL, NULL),
(38, 1, '2010-08-13 22:11:07', '0000-00-00 00:00:00', '127.0.0.1', NULL, NULL),
(39, 1, '2010-08-15 11:10:14', '0000-00-00 00:00:00', '127.0.0.1', NULL, NULL),
(40, 1, '2010-08-15 14:55:21', '0000-00-00 00:00:00', '127.0.0.1', NULL, NULL),
(41, 62, '2010-08-15 21:56:47', '0000-00-00 00:00:00', '127.0.0.1', NULL, NULL),
(42, 62, '2010-08-15 22:07:27', '0000-00-00 00:00:00', '127.0.0.1', NULL, NULL),
(43, 62, '2010-08-16 09:22:46', '0000-00-00 00:00:00', '127.0.0.1', NULL, NULL),
(44, 68, '2010-08-16 10:32:45', '0000-00-00 00:00:00', '127.0.0.1', NULL, NULL),
(45, 62, '2010-08-16 13:31:52', '0000-00-00 00:00:00', '127.0.0.1', NULL, NULL),
(46, 62, '2010-08-17 09:10:23', '0000-00-00 00:00:00', '127.0.0.1', NULL, NULL),
(47, 62, '2010-08-17 14:13:12', '0000-00-00 00:00:00', '127.0.0.1', NULL, NULL),
(48, 62, '2010-08-21 12:06:21', '0000-00-00 00:00:00', '127.0.0.1', NULL, NULL),
(49, 62, '2010-08-26 13:10:28', '0000-00-00 00:00:00', '127.0.0.1', NULL, NULL),
(50, 62, '2010-08-29 15:53:04', '0000-00-00 00:00:00', '127.0.0.1', NULL, NULL),
(51, 62, '2010-08-29 15:54:50', '0000-00-00 00:00:00', '127.0.0.1', NULL, NULL),
(52, 62, '2010-08-29 19:06:49', '0000-00-00 00:00:00', '127.0.0.1', NULL, NULL),
(53, 62, '2010-08-30 09:04:32', '0000-00-00 00:00:00', '127.0.0.1', NULL, NULL),
(54, 62, '2010-08-31 09:21:55', '0000-00-00 00:00:00', '127.0.0.1', NULL, NULL),
(55, 62, '2010-08-31 09:25:46', '0000-00-00 00:00:00', '127.0.0.1', NULL, NULL),
(56, 62, '2010-08-31 18:29:50', '0000-00-00 00:00:00', '127.0.0.1', NULL, NULL),
(57, 62, '2010-09-01 10:01:16', '0000-00-00 00:00:00', '127.0.0.1', NULL, NULL),
(58, 62, '2010-09-02 08:47:19', '0000-00-00 00:00:00', '127.0.0.1', NULL, NULL),
(59, 62, '2010-09-02 08:49:30', '0000-00-00 00:00:00', '127.0.0.1', NULL, NULL),
(60, 62, '2010-09-02 08:53:24', '0000-00-00 00:00:00', '127.0.0.1', NULL, NULL),
(61, 62, '2010-09-02 08:55:42', '0000-00-00 00:00:00', '127.0.0.1', NULL, NULL),
(62, 62, '2010-09-02 08:57:26', '0000-00-00 00:00:00', '127.0.0.1', NULL, NULL),
(63, 62, '2010-09-02 08:58:50', '0000-00-00 00:00:00', '127.0.0.1', NULL, NULL),
(64, 62, '2010-09-08 09:16:35', '0000-00-00 00:00:00', '127.0.0.1', NULL, NULL),
(65, 62, '2010-09-08 11:11:20', '0000-00-00 00:00:00', '127.0.0.1', NULL, NULL),
(66, 62, '2010-09-20 09:46:09', '0000-00-00 00:00:00', '127.0.0.1', NULL, NULL),
(67, 62, '2010-09-20 15:35:03', '0000-00-00 00:00:00', '127.0.0.1', NULL, NULL),
(68, 62, '2010-10-04 09:00:07', '0000-00-00 00:00:00', '127.0.0.1', NULL, NULL),
(69, 62, '2010-10-13 13:18:32', '0000-00-00 00:00:00', '127.0.0.1', NULL, NULL),
(70, 62, '2010-10-18 12:18:00', '0000-00-00 00:00:00', '127.0.0.1', NULL, NULL),
(71, 62, '2010-10-26 16:10:11', '0000-00-00 00:00:00', '127.0.0.1', NULL, NULL),
(72, 62, '2010-10-28 16:19:10', '0000-00-00 00:00:00', '127.0.0.1', NULL, NULL),
(73, 62, '2010-10-29 10:51:12', '0000-00-00 00:00:00', '127.0.0.1', NULL, NULL),
(74, 62, '2010-11-09 10:21:24', '0000-00-00 00:00:00', '127.0.0.1', NULL, NULL),
(75, 62, '2010-11-09 10:24:59', '0000-00-00 00:00:00', '127.0.0.1', NULL, NULL),
(76, 62, '2010-11-09 14:29:34', '0000-00-00 00:00:00', '127.0.0.1', NULL, NULL),
(77, 62, '2010-11-10 09:42:08', '0000-00-00 00:00:00', '127.0.0.1', NULL, NULL),
(78, 62, '2010-11-11 11:33:36', '0000-00-00 00:00:00', '127.0.0.1', NULL, NULL),
(79, 62, '2010-11-12 15:09:06', '0000-00-00 00:00:00', '127.0.0.1', NULL, NULL),
(80, 62, '2010-11-15 13:42:22', '0000-00-00 00:00:00', '127.0.0.1', NULL, NULL),
(81, 62, '2010-11-19 16:06:53', '0000-00-00 00:00:00', '127.0.0.1', NULL, NULL),
(82, 62, '2010-11-24 13:15:41', '0000-00-00 00:00:00', '127.0.0.1', NULL, NULL),
(83, 62, '2010-11-24 14:33:16', '0000-00-00 00:00:00', '127.0.0.1', NULL, NULL),
(84, 62, '2010-11-24 15:25:08', '0000-00-00 00:00:00', '127.0.0.1', NULL, NULL),
(85, 62, '2010-12-14 15:35:22', '0000-00-00 00:00:00', '127.0.0.1', NULL, NULL),
(86, 62, '2010-12-16 16:07:34', '0000-00-00 00:00:00', '127.0.0.1', NULL, NULL),
(87, 62, '2010-12-23 10:53:06', '0000-00-00 00:00:00', '127.0.0.1', NULL, NULL),
(88, 62, '2010-12-27 09:57:14', '0000-00-00 00:00:00', '127.0.0.1', NULL, NULL),
(89, 62, '2010-12-28 16:00:11', '0000-00-00 00:00:00', '127.0.0.1', NULL, NULL),
(90, 62, '2011-01-13 11:09:55', '0000-00-00 00:00:00', '127.0.0.1', NULL, NULL),
(92, 0, '2011-04-04 12:26:32', '0000-00-00 00:00:00', '127.0.0.1', '/ph/reserveroom/home.php', NULL),
(93, 0, '2011-04-04 13:34:50', '0000-00-00 00:00:00', '127.0.0.1', '/ph/reserveroom/home.php?Y=2011&m=3&d=4', NULL),
(94, 0, '2011-04-04 13:34:52', '0000-00-00 00:00:00', '127.0.0.1', '/ph/reserveroom/home.php?Y=2011&m=2&d=4', NULL),
(95, 0, '2011-04-04 13:39:08', '0000-00-00 00:00:00', '127.0.0.1', '/ph/reserveroom/home.php?Y=2011&m=2&d=4', NULL),
(96, 0, '2011-04-04 13:39:12', '0000-00-00 00:00:00', '127.0.0.1', '/ph/reserveroom/home.php?times=2011-02-04&mode=act', NULL),
(97, 0, '2011-04-04 13:39:38', '0000-00-00 00:00:00', '127.0.0.1', '/ph/reserveroom/home.php?times=2011-02-04&mode=act', NULL),
(98, 0, '2011-04-04 13:39:56', '0000-00-00 00:00:00', '127.0.0.1', '/ph/reserveroom/home.php?Y=2011&m=3&d=4', NULL),
(99, 0, '2011-04-04 13:39:57', '0000-00-00 00:00:00', '127.0.0.1', '/ph/reserveroom/home.php?Y=2011&m=2&d=4', NULL),
(100, 0, '2011-04-04 13:40:08', '0000-00-00 00:00:00', '127.0.0.1', '/ph/reserveroom/home.php?times=2011-02-25&mode=act', NULL),
(101, 0, '2011-04-04 13:40:28', '0000-00-00 00:00:00', '127.0.0.1', '/ph/reserveroom/home.php?Y=2011&m=3&d=4', NULL),
(102, 0, '2011-04-04 13:40:28', '0000-00-00 00:00:00', '127.0.0.1', '/ph/reserveroom/home.php?Y=2011&m=2&d=4', NULL),
(103, 0, '2011-04-04 13:40:51', '0000-00-00 00:00:00', '127.0.0.1', '/ph/reserveroom/home.php?Y=2011&m=3&d=4', NULL),
(104, 0, '2011-04-04 13:40:54', '0000-00-00 00:00:00', '127.0.0.1', '/ph/reserveroom/home.php?Y=2011&m=2&d=4', NULL),
(105, 0, '2011-04-04 13:43:56', '0000-00-00 00:00:00', '127.0.0.1', '/ph/reserveroom/home.php?Y=2011&m=2&d=4', NULL),
(106, 0, '2011-04-04 13:43:59', '0000-00-00 00:00:00', '127.0.0.1', '/ph/reserveroom/home.php?Y=2011&m=02&d=04&mode=act', NULL),
(107, 0, '2011-04-04 13:44:34', '0000-00-00 00:00:00', '127.0.0.1', '/ph/reserveroom/home.php?Y=2011&m=1&d=04', NULL),
(108, 0, '2011-04-04 13:45:10', '0000-00-00 00:00:00', '127.0.0.1', '/ph/reserveroom/home.php?Y=2011&m=01&d=06&mode=act', NULL),
(109, 0, '2011-04-04 13:45:18', '0000-00-00 00:00:00', '127.0.0.1', '/ph/reserveroom/home.php?Y=2010&m=12&d=06', NULL),
(110, 0, '2011-04-04 13:45:22', '0000-00-00 00:00:00', '127.0.0.1', '/ph/reserveroom/home.php?Y=2011&m=1&d=06', NULL),
(111, 0, '2011-04-04 13:45:24', '0000-00-00 00:00:00', '127.0.0.1', '/ph/reserveroom/home.php?Y=2011&m=2&d=06', NULL),
(112, 0, '2011-04-04 14:08:13', '0000-00-00 00:00:00', '127.0.0.1', '/ph/reserveroom/home.php?Y=2011&m=2&d=06', NULL),
(113, 0, '2011-04-04 14:08:15', '0000-00-00 00:00:00', '127.0.0.1', '/ph/reserveroom/home.php?times=2011-02-04&mode=act', NULL),
(114, 0, '2011-04-04 14:09:50', '0000-00-00 00:00:00', '127.0.0.1', '/ph/reserveroom/home.php?times=2011-02-04&mode=act', NULL),
(115, 0, '2011-04-04 14:12:17', '0000-00-00 00:00:00', '127.0.0.1', '/ph/reserveroom/home.php?Y=2011&m=3&d=4', NULL),
(116, 0, '2011-04-04 14:12:19', '0000-00-00 00:00:00', '127.0.0.1', '/ph/reserveroom/home.php?Y=2011&m=2&d=4', NULL),
(117, 0, '2011-04-04 14:12:20', '0000-00-00 00:00:00', '127.0.0.1', '/ph/reserveroom/home.php?Y=2011&m=1&d=4', NULL),
(118, 0, '2011-04-04 14:12:22', '0000-00-00 00:00:00', '127.0.0.1', '/ph/reserveroom/home.php?times=2011-01-13&mode=act', NULL),
(119, 0, '2011-04-04 14:12:22', '0000-00-00 00:00:00', '127.0.0.1', '/ph/reserveroom/home.php?times=2011-01-13&mode=act', NULL),
(120, 0, '2011-04-04 15:19:30', '0000-00-00 00:00:00', '127.0.0.1', '/ph/reserveroom/home.php?times=2011-01-13&mode=act', NULL),
(121, 0, '2011-04-04 15:19:33', '0000-00-00 00:00:00', '127.0.0.1', '/ph/reserveroom/home.php?times=2011-01-13&mode=act', NULL),
(122, 0, '2011-04-04 15:19:36', '0000-00-00 00:00:00', '127.0.0.1', '/ph/reserveroom/home.php?Y=2011&m=3&d=4', NULL),
(123, 0, '2011-04-04 15:19:37', '0000-00-00 00:00:00', '127.0.0.1', '/ph/reserveroom/home.php?Y=2011&m=2&d=4', NULL),
(124, 0, '2011-04-04 15:19:43', '0000-00-00 00:00:00', '127.0.0.1', '/ph/reserveroom/home.php?Y=2011&m=1&d=4', NULL),
(125, 0, '2011-04-04 15:19:44', '0000-00-00 00:00:00', '127.0.0.1', '/ph/reserveroom/home.php?Y=2010&m=12&d=4', NULL),
(126, 0, '2011-04-04 15:19:45', '0000-00-00 00:00:00', '127.0.0.1', '/ph/reserveroom/home.php?Y=2010&m=11&d=4', NULL),
(127, 0, '2011-04-04 15:19:53', '0000-00-00 00:00:00', '127.0.0.1', '/ph/reserveroom/home.php?times=2010-11-26&mode=act', NULL),
(128, 0, '2011-04-04 15:20:05', '0000-00-00 00:00:00', '127.0.0.1', '/ph/reserveroom/home.php?Y=2011&m=3&d=4', NULL),
(129, 0, '2011-04-04 15:20:06', '0000-00-00 00:00:00', '127.0.0.1', '/ph/reserveroom/home.php?Y=2011&m=2&d=4', NULL),
(130, 0, '2011-04-04 15:20:07', '0000-00-00 00:00:00', '127.0.0.1', '/ph/reserveroom/home.php?Y=2011&m=1&d=4', NULL),
(131, 0, '2011-04-04 15:20:08', '0000-00-00 00:00:00', '127.0.0.1', '/ph/reserveroom/home.php?Y=2010&m=12&d=4', NULL),
(132, 0, '2011-04-04 15:20:09', '0000-00-00 00:00:00', '127.0.0.1', '/ph/reserveroom/home.php?Y=2010&m=11&d=4', NULL),
(133, 0, '2011-04-04 15:20:11', '0000-00-00 00:00:00', '127.0.0.1', '/ph/reserveroom/home.php?times=2010-11-01&mode=act', NULL),
(134, 62, '2011-04-05 13:33:29', '0000-00-00 00:00:00', '127.0.0.1', NULL, NULL),
(142, 62, '2011-04-20 14:43:10', '0000-00-00 00:00:00', '127.0.0.1', NULL, NULL),
(143, 62, '2011-04-22 16:21:06', '0000-00-00 00:00:00', '127.0.0.1', NULL, NULL),
(144, 62, '2011-12-20 10:23:22', '0000-00-00 00:00:00', '127.0.0.1', NULL, NULL),
(145, 62, '2011-12-20 13:15:09', '0000-00-00 00:00:00', '127.0.0.1', NULL, NULL),
(146, 62, '2011-12-20 13:20:28', '0000-00-00 00:00:00', '127.0.0.1', NULL, NULL),
(147, 62, '2011-12-23 13:53:31', '0000-00-00 00:00:00', '127.0.0.1', NULL, NULL),
(148, 62, '2011-12-28 10:44:20', '0000-00-00 00:00:00', '127.0.0.1', NULL, NULL),
(162, 62, '2011-12-28 10:53:36', '0000-00-00 00:00:00', '127.0.0.1', '/ph/room/reserveroom/home.php', NULL),
(163, 62, '2011-12-28 10:58:10', '0000-00-00 00:00:00', '127.0.0.1', '/ph/room/reserveroom/home.php', NULL),
(164, 69, '2011-12-28 10:58:45', '0000-00-00 00:00:00', '127.0.0.1', NULL, NULL),
(165, 69, '2011-12-28 10:58:45', '0000-00-00 00:00:00', '127.0.0.1', '/ph/room/reserveroom/home.php', NULL),
(166, 69, '2011-12-28 10:59:04', '0000-00-00 00:00:00', '127.0.0.1', '/ph/room/reserveroom/home.php', NULL),
(167, 69, '2011-12-28 10:59:45', '0000-00-00 00:00:00', '127.0.0.1', '/ph/room/reserveroom/home.php', NULL),
(168, 69, '2011-12-28 10:59:54', '0000-00-00 00:00:00', '127.0.0.1', '/ph/room/reserveroom/home.php', NULL),
(169, 69, '2011-12-28 10:59:58', '0000-00-00 00:00:00', '127.0.0.1', '/ph/room/reserveroom/home.php', NULL),
(170, 62, '2011-12-28 13:57:01', '0000-00-00 00:00:00', '127.0.0.1', NULL, NULL),
(171, 62, '2011-12-28 13:57:01', '0000-00-00 00:00:00', '127.0.0.1', '/ph/room/reserveroom/home.php', NULL),
(172, 62, '2011-12-28 13:57:07', '0000-00-00 00:00:00', '127.0.0.1', '/ph/room/reserveroom/user.php', NULL),
(173, 62, '2011-12-28 13:57:11', '0000-00-00 00:00:00', '127.0.0.1', '/ph/room/reserveroom/home.php', NULL),
(174, 62, '2011-12-28 14:05:12', '0000-00-00 00:00:00', '127.0.0.1', '/ph/room/reserveroom/formbooking.php', NULL),
(175, 62, '2011-12-28 14:05:24', '0000-00-00 00:00:00', '127.0.0.1', '/ph/room/reserveroom/home.php', NULL),
(176, 62, '2011-12-28 14:05:40', '0000-00-00 00:00:00', '127.0.0.1', '/ph/room/reserveroom/formbooking.php', NULL),
(177, 62, '2011-12-28 14:05:45', '0000-00-00 00:00:00', '127.0.0.1', '/ph/room/reserveroom/home.php', NULL),
(178, 62, '2011-12-28 14:24:48', '0000-00-00 00:00:00', '127.0.0.1', '/ph/room/reserveroom/home.php', NULL),
(179, 62, '2011-12-28 14:24:51', '0000-00-00 00:00:00', '127.0.0.1', '/ph/room/reserveroom/room.php', NULL),
(180, 62, '2011-12-28 14:24:58', '0000-00-00 00:00:00', '127.0.0.1', '/ph/room/reserveroom/home.php', NULL),
(181, 62, '2011-12-28 14:25:03', '0000-00-00 00:00:00', '127.0.0.1', '/ph/room/reserveroom/home.php', NULL),
(182, 62, '2011-12-28 14:25:05', '0000-00-00 00:00:00', '127.0.0.1', '/ph/room/reserveroom/org.php', NULL),
(183, 62, '2011-12-28 14:25:07', '0000-00-00 00:00:00', '127.0.0.1', '/ph/room/reserveroom/home.php', NULL),
(184, 62, '2011-12-28 14:25:09', '0000-00-00 00:00:00', '127.0.0.1', '/ph/room/reserveroom/user.php', NULL),
(185, 62, '2011-12-28 14:25:14', '0000-00-00 00:00:00', '127.0.0.1', '/ph/room/reserveroom/home.php', NULL),
(186, 62, '2011-12-29 13:52:09', '0000-00-00 00:00:00', '127.0.0.1', NULL, NULL),
(187, 62, '2011-12-29 13:52:09', '0000-00-00 00:00:00', '127.0.0.1', '/ph/room/reserveroom/home.php', NULL),
(188, 62, '2011-12-29 13:54:39', '0000-00-00 00:00:00', '127.0.0.1', '/ph/room/reserveroom/home.php', NULL),
(189, 62, '2011-12-29 14:08:52', '0000-00-00 00:00:00', '127.0.0.1', '/ph/room/reserveroom/formbooking.php', NULL),
(190, 62, '2011-12-29 14:10:07', '0000-00-00 00:00:00', '127.0.0.1', '/ph/room/reserveroom/formbooking.php', NULL),
(191, 62, '2011-12-29 14:17:28', '0000-00-00 00:00:00', '127.0.0.1', '/ph/room/reserveroom/formbooking.php', NULL),
(192, 62, '2011-12-29 14:18:20', '0000-00-00 00:00:00', '127.0.0.1', '/ph/room/reserveroom/formbooking.php', NULL),
(193, 62, '2011-12-29 14:39:49', '0000-00-00 00:00:00', '127.0.0.1', '/ph/room/reserveroom/home.php', NULL),
(194, 62, '2011-12-29 16:06:01', '0000-00-00 00:00:00', '127.0.0.1', '/ph/room/reserveroom/home.php', NULL),
(195, 62, '2011-12-29 16:06:13', '0000-00-00 00:00:00', '127.0.0.1', '/ph/room/reserveroom/formbooking.php', NULL),
(196, 62, '2011-12-29 16:33:55', '0000-00-00 00:00:00', '127.0.0.1', '/ph/room/reserveroom/home.php', NULL),
(197, 62, '2011-12-29 16:51:36', '0000-00-00 00:00:00', '127.0.0.1', '/ph/room/reserveroom/home.php', NULL),
(198, 62, '2011-12-30 09:05:47', '0000-00-00 00:00:00', '127.0.0.1', NULL, NULL),
(199, 62, '2011-12-30 09:05:47', '0000-00-00 00:00:00', '127.0.0.1', '/ph/room/reserveroom/home.php', NULL),
(200, 62, '2011-12-30 11:36:09', '0000-00-00 00:00:00', '127.0.0.1', '/ph/room/reserveroom/home.php', NULL),
(201, 62, '2011-12-30 11:53:04', '0000-00-00 00:00:00', '127.0.0.1', '/ph/room/reserveroom/formbooking.php', NULL),
(202, 62, '2011-12-30 11:53:52', '0000-00-00 00:00:00', '127.0.0.1', '/ph/room/reserveroom/formbooking.php?mode=edit&keyuq_id=29', NULL),
(203, 62, '2011-12-30 12:05:25', '0000-00-00 00:00:00', '127.0.0.1', '/ph/room/reserveroom/home.php', NULL),
(204, 62, '2011-12-30 13:26:19', '0000-00-00 00:00:00', '127.0.0.1', '/ph/room/reserveroom/home.php', NULL),
(205, 62, '2012-01-06 08:29:06', '0000-00-00 00:00:00', '127.0.0.1', NULL, NULL),
(206, 62, '2012-01-06 08:29:06', '0000-00-00 00:00:00', '127.0.0.1', '/ph/room/reserveroom/home.php', NULL),
(207, 62, '2012-01-06 08:30:07', '0000-00-00 00:00:00', '127.0.0.1', '/ph/room/reserveroom/home.php', NULL),
(208, 62, '2012-01-06 08:34:23', '0000-00-00 00:00:00', '127.0.0.1', '/ph/room/reserveroom/home.php', NULL),
(209, 62, '2012-01-06 08:34:57', '0000-00-00 00:00:00', '127.0.0.1', '/ph/room/reserveroom/home.php', NULL),
(210, 62, '2012-01-06 08:36:58', '0000-00-00 00:00:00', '127.0.0.1', '/ph/room/reserveroom/home.php', NULL),
(211, 62, '2012-01-06 08:38:30', '0000-00-00 00:00:00', '127.0.0.1', '/ph/room/reserveroom/home.php', NULL),
(212, 62, '2012-01-06 09:10:03', '0000-00-00 00:00:00', '127.0.0.1', '/ph/room/reserveroom/home.php', NULL),
(213, 62, '2012-01-06 09:10:37', '0000-00-00 00:00:00', '127.0.0.1', '/ph/room/reserveroom/home.php', NULL),
(214, 62, '2012-01-06 11:26:51', '0000-00-00 00:00:00', '127.0.0.1', NULL, NULL),
(215, 62, '2012-01-06 11:26:51', '0000-00-00 00:00:00', '127.0.0.1', '/ph/room/reserveroom/home.php', NULL),
(216, 62, '2012-01-06 11:27:45', '0000-00-00 00:00:00', '127.0.0.1', '/ph/room/reserveroom/home.php', NULL),
(217, 62, '2012-01-06 13:43:30', '0000-00-00 00:00:00', '127.0.0.1', '/ph/room/reserveroom/formbooking.php', NULL),
(218, 62, '2012-01-06 15:50:52', '0000-00-00 00:00:00', '127.0.0.1', '/ph/room/reserveroom/home.php', NULL),
(219, 62, '2012-01-09 09:21:40', '0000-00-00 00:00:00', '127.0.0.1', NULL, NULL),
(220, 62, '2012-01-09 09:21:40', '0000-00-00 00:00:00', '127.0.0.1', '/ph/room/reserveroom/home.php', NULL),
(221, 62, '2012-01-09 09:21:55', '0000-00-00 00:00:00', '127.0.0.1', '/ph/room/reserveroom/home.php', NULL),
(222, 62, '2012-01-09 10:18:15', '0000-00-00 00:00:00', '127.0.0.1', '/ph/room/reserveroom/room.php', NULL),
(223, 62, '2012-01-09 10:18:18', '0000-00-00 00:00:00', '127.0.0.1', '/ph/room/reserveroom/home.php', NULL),
(224, 62, '2012-01-09 10:18:21', '0000-00-00 00:00:00', '127.0.0.1', '/ph/room/reserveroom/org.php', NULL),
(225, 62, '2012-01-09 10:18:24', '0000-00-00 00:00:00', '127.0.0.1', '/ph/room/reserveroom/home.php', NULL),
(226, 62, '2012-01-09 10:18:36', '0000-00-00 00:00:00', '127.0.0.1', '/ph/room/reserveroom/home.php', NULL),
(227, 62, '2012-01-09 10:19:06', '0000-00-00 00:00:00', '127.0.0.1', '/ph/room/reserveroom/home.php', NULL),
(228, 62, '2012-01-09 10:19:16', '0000-00-00 00:00:00', '127.0.0.1', '/ph/room/reserveroom/home.php', NULL),
(229, 62, '2012-01-09 10:19:18', '0000-00-00 00:00:00', '127.0.0.1', '/ph/room/reserveroom/home.php', NULL),
(230, 62, '2012-01-09 10:52:33', '0000-00-00 00:00:00', '127.0.0.1', '/ph/room/reserveroom/home.php', NULL),
(231, 62, '2012-01-09 10:56:15', '0000-00-00 00:00:00', '127.0.0.1', '/ph/room/reserveroom/home.php', NULL),
(232, 62, '2012-01-09 10:56:18', '0000-00-00 00:00:00', '127.0.0.1', '/ph/room/reserveroom/home.php', NULL),
(233, 62, '2012-01-09 10:57:04', '0000-00-00 00:00:00', '127.0.0.1', '/ph/room/reserveroom/home.php', NULL),
(234, 62, '2012-01-09 10:57:06', '0000-00-00 00:00:00', '127.0.0.1', '/ph/room/reserveroom/home.php', NULL),
(235, 62, '2012-01-09 10:58:33', '0000-00-00 00:00:00', '127.0.0.1', '/ph/room/reserveroom/home.php', NULL),
(236, 62, '2012-01-09 10:58:42', '0000-00-00 00:00:00', '127.0.0.1', '/ph/room/reserveroom/home.php', NULL),
(237, 62, '2012-01-09 10:58:44', '0000-00-00 00:00:00', '127.0.0.1', '/ph/room/reserveroom/home.php', NULL),
(238, 62, '2012-01-09 11:02:41', '0000-00-00 00:00:00', '127.0.0.1', '/ph/room/reserveroom/home.php', NULL),
(239, 62, '2012-01-09 11:24:01', '0000-00-00 00:00:00', '127.0.0.1', '/ph/room/reserveroom/home.php', NULL),
(240, 62, '2012-01-09 11:24:03', '0000-00-00 00:00:00', '127.0.0.1', '/ph/room/reserveroom/home.php', NULL),
(241, 62, '2012-01-09 11:24:49', '0000-00-00 00:00:00', '127.0.0.1', '/ph/room/reserveroom/home.php', NULL),
(242, 62, '2012-01-09 11:24:51', '0000-00-00 00:00:00', '127.0.0.1', '/ph/room/reserveroom/home.php', NULL),
(243, 62, '2012-01-09 11:24:52', '0000-00-00 00:00:00', '127.0.0.1', '/ph/room/reserveroom/home.php', NULL),
(244, 62, '2012-01-09 11:26:58', '0000-00-00 00:00:00', '127.0.0.1', '/ph/room/reserveroom/home.php', NULL),
(245, 62, '2012-01-09 11:27:00', '0000-00-00 00:00:00', '127.0.0.1', '/ph/room/reserveroom/home.php', NULL),
(246, 62, '2012-01-09 11:28:35', '0000-00-00 00:00:00', '127.0.0.1', '/ph/room/reserveroom/home.php', NULL),
(247, 62, '2012-01-09 11:28:36', '0000-00-00 00:00:00', '127.0.0.1', '/ph/room/reserveroom/home.php', NULL),
(248, 62, '2012-01-09 11:29:47', '0000-00-00 00:00:00', '127.0.0.1', '/ph/room/reserveroom/home.php', NULL),
(249, 62, '2012-01-09 11:36:16', '0000-00-00 00:00:00', '127.0.0.1', '/ph/room/reserveroom/home.php', NULL),
(250, 62, '2012-01-09 11:36:31', '0000-00-00 00:00:00', '127.0.0.1', '/ph/room/reserveroom/home.php', NULL),
(251, 62, '2012-01-09 12:56:48', '0000-00-00 00:00:00', '127.0.0.1', '/ph/room/reserveroom/home.php', NULL),
(252, 62, '2012-01-09 12:56:51', '0000-00-00 00:00:00', '127.0.0.1', '/ph/room/reserveroom/home.php', NULL),
(253, 62, '2012-01-09 12:56:52', '0000-00-00 00:00:00', '127.0.0.1', '/ph/room/reserveroom/home.php', NULL),
(254, 62, '2012-01-09 12:57:19', '0000-00-00 00:00:00', '127.0.0.1', '/ph/room/reserveroom/home.php', NULL),
(255, 62, '2012-01-09 12:57:21', '0000-00-00 00:00:00', '127.0.0.1', '/ph/room/reserveroom/home.php', NULL),
(256, 62, '2012-01-09 13:47:18', '0000-00-00 00:00:00', '127.0.0.1', '/ph/room/reserveroom/home.php', NULL),
(257, 62, '2012-01-09 13:47:20', '0000-00-00 00:00:00', '127.0.0.1', '/ph/room/reserveroom/home.php', NULL),
(258, 62, '2012-01-09 13:47:21', '0000-00-00 00:00:00', '127.0.0.1', '/ph/room/reserveroom/home.php', NULL),
(259, 62, '2012-01-09 13:54:02', '0000-00-00 00:00:00', '127.0.0.1', '/ph/room/reserveroom/home.php', NULL),
(260, 62, '2012-01-09 13:54:07', '0000-00-00 00:00:00', '127.0.0.1', '/ph/room/reserveroom/home.php', NULL),
(261, 62, '2012-01-09 13:55:11', '0000-00-00 00:00:00', '127.0.0.1', '/ph/room/reserveroom/home.php', NULL),
(262, 62, '2012-01-09 13:55:13', '0000-00-00 00:00:00', '127.0.0.1', '/ph/room/reserveroom/home.php', NULL),
(263, 62, '2012-01-09 13:57:41', '0000-00-00 00:00:00', '127.0.0.1', '/ph/room/reserveroom/home.php', NULL),
(264, 62, '2012-01-09 13:57:43', '0000-00-00 00:00:00', '127.0.0.1', '/ph/room/reserveroom/home.php', NULL),
(265, 62, '2012-01-09 13:57:44', '0000-00-00 00:00:00', '127.0.0.1', '/ph/room/reserveroom/home.php', NULL),
(266, 62, '2012-01-09 13:57:46', '0000-00-00 00:00:00', '127.0.0.1', '/ph/room/reserveroom/home.php', NULL),
(267, 62, '2012-01-09 13:58:06', '0000-00-00 00:00:00', '127.0.0.1', '/ph/room/reserveroom/home.php', NULL),
(268, 62, '2012-01-09 13:58:52', '0000-00-00 00:00:00', '127.0.0.1', '/ph/room/reserveroom/home.php', NULL),
(269, 62, '2012-01-09 13:59:18', '0000-00-00 00:00:00', '127.0.0.1', '/ph/room/reserveroom/home.php', NULL),
(270, 62, '2012-01-09 14:20:52', '0000-00-00 00:00:00', '127.0.0.1', '/ph/room/reserveroom/home.php', NULL),
(271, 62, '2012-01-09 14:33:07', '0000-00-00 00:00:00', '127.0.0.1', '/ph/room/reserveroom/home.php', NULL),
(272, 62, '2012-01-10 09:24:45', '0000-00-00 00:00:00', '127.0.0.1', NULL, NULL),
(273, 62, '2012-01-10 09:24:46', '0000-00-00 00:00:00', '127.0.0.1', '/ph/room/reserveroom/home.php', NULL),
(274, 62, '2012-01-10 09:28:33', '0000-00-00 00:00:00', '127.0.0.1', '/ph/room/reserveroom/room.php', NULL),
(275, 62, '2012-01-10 09:28:41', '0000-00-00 00:00:00', '127.0.0.1', '/ph/room/reserveroom/home.php', NULL),
(276, 62, '2012-01-10 09:37:56', '0000-00-00 00:00:00', '127.0.0.1', '/ph/room/reserveroom/home.php?Y=2012&m=2&d=10', NULL),
(277, 62, '2012-01-10 09:37:57', '0000-00-00 00:00:00', '127.0.0.1', '/ph/room/reserveroom/home.php?Y=2012&m=3&d=10', NULL),
(278, 62, '2012-01-10 09:37:58', '0000-00-00 00:00:00', '127.0.0.1', '/ph/room/reserveroom/home.php?Y=2012&m=2&d=10', NULL),
(279, 62, '2012-01-10 09:53:44', '0000-00-00 00:00:00', '127.0.0.1', '/ph/room/reserveroom/home.php', NULL),
(280, 62, '2012-01-10 09:53:47', '0000-00-00 00:00:00', '127.0.0.1', '/ph/room/reserveroom/room.php', NULL),
(281, 62, '2012-01-10 09:56:08', '0000-00-00 00:00:00', '127.0.0.1', '/ph/room/reserveroom/room.php', NULL),
(282, 62, '2012-01-10 09:56:34', '0000-00-00 00:00:00', '127.0.0.1', '/ph/room/reserveroom/room.php', NULL),
(283, 62, '2012-01-10 10:01:20', '0000-00-00 00:00:00', '127.0.0.1', '/ph/room/reserveroom/home.php', NULL),
(284, 62, '2012-01-10 10:01:24', '0000-00-00 00:00:00', '127.0.0.1', '/ph/room/reserveroom/org.php', NULL),
(285, 62, '2012-01-10 10:19:49', '0000-00-00 00:00:00', '127.0.0.1', '/ph/room/reserveroom/org.php', NULL),
(286, 62, '2012-01-10 10:20:09', '0000-00-00 00:00:00', '127.0.0.1', '/ph/room/reserveroom/org.php', NULL),
(287, 62, '2012-01-10 10:21:00', '0000-00-00 00:00:00', '127.0.0.1', '/ph/room/reserveroom/org.php', NULL),
(288, 62, '2012-01-10 10:21:50', '0000-00-00 00:00:00', '127.0.0.1', '/ph/room/reserveroom/org.php', NULL),
(289, 62, '2012-01-10 10:24:23', '0000-00-00 00:00:00', '127.0.0.1', '/ph/room/reserveroom/org.php', NULL),
(290, 62, '2012-01-10 10:24:50', '0000-00-00 00:00:00', '127.0.0.1', '/ph/room/reserveroom/org.php', NULL),
(291, 62, '2012-01-10 10:47:52', '0000-00-00 00:00:00', '127.0.0.1', '/ph/room/reserveroom/home.php', NULL),
(292, 62, '2012-01-10 10:47:56', '0000-00-00 00:00:00', '127.0.0.1', '/ph/room/reserveroom/user.php', NULL),
(293, 62, '2012-01-10 10:50:31', '0000-00-00 00:00:00', '127.0.0.1', '/ph/room/reserveroom/user.php', NULL),
(294, 62, '2012-01-10 10:50:45', '0000-00-00 00:00:00', '127.0.0.1', '/ph/room/reserveroom/user.php', NULL),
(295, 62, '2012-01-10 10:50:59', '0000-00-00 00:00:00', '127.0.0.1', '/ph/room/reserveroom/user.php', NULL),
(296, 62, '2012-01-10 10:51:13', '0000-00-00 00:00:00', '127.0.0.1', '/ph/room/reserveroom/user.php', NULL),
(297, 62, '2012-01-10 10:51:53', '0000-00-00 00:00:00', '127.0.0.1', '/ph/room/reserveroom/user.php', NULL),
(298, 62, '2012-01-10 10:52:51', '0000-00-00 00:00:00', '127.0.0.1', '/ph/room/reserveroom/user.php', NULL),
(299, 62, '2012-01-10 10:54:20', '0000-00-00 00:00:00', '127.0.0.1', '/ph/room/reserveroom/user.php', NULL),
(300, 62, '2012-01-10 10:55:31', '0000-00-00 00:00:00', '127.0.0.1', '/ph/room/reserveroom/user.php', NULL),
(301, 62, '2012-01-10 11:00:36', '0000-00-00 00:00:00', '127.0.0.1', '/ph/room/reserveroom/user.php', NULL),
(302, 62, '2012-01-10 11:00:41', '0000-00-00 00:00:00', '127.0.0.1', '/ph/room/reserveroom/user.php', NULL),
(303, 62, '2012-01-10 11:00:55', '0000-00-00 00:00:00', '127.0.0.1', '/ph/room/reserveroom/user.php', NULL),
(304, 62, '2012-01-10 11:01:36', '0000-00-00 00:00:00', '127.0.0.1', '/ph/room/reserveroom/user.php', NULL),
(305, 62, '2012-01-10 11:02:08', '0000-00-00 00:00:00', '127.0.0.1', '/ph/room/reserveroom/user.php', NULL),
(306, 62, '2012-01-10 11:03:10', '0000-00-00 00:00:00', '127.0.0.1', '/ph/room/reserveroom/user.php', NULL),
(307, 62, '2012-01-10 11:03:24', '0000-00-00 00:00:00', '127.0.0.1', '/ph/room/reserveroom/user.php', NULL),
(308, 62, '2012-01-10 11:03:44', '0000-00-00 00:00:00', '127.0.0.1', '/ph/room/reserveroom/user.php', NULL),
(309, 62, '2012-01-10 11:04:22', '0000-00-00 00:00:00', '127.0.0.1', '/ph/room/reserveroom/user.php', NULL),
(310, 62, '2012-01-10 11:28:06', '0000-00-00 00:00:00', '127.0.0.1', '/ph/room/reserveroom/home.php', NULL),
(311, 62, '2012-01-12 14:24:00', '0000-00-00 00:00:00', '127.0.0.1', NULL, NULL),
(312, 62, '2012-01-12 14:24:00', '0000-00-00 00:00:00', '127.0.0.1', '/ph/room/reserveroom/home.php', NULL),
(313, 62, '2012-01-12 14:29:44', '0000-00-00 00:00:00', '127.0.0.1', '/ph/room/reserveroom/home.php', NULL),
(314, 62, '2012-01-12 14:30:23', '0000-00-00 00:00:00', '127.0.0.1', '/ph/room/reserveroom/home.php', NULL),
(315, 62, '2012-01-12 14:32:33', '0000-00-00 00:00:00', '127.0.0.1', NULL, NULL),
(316, 62, '2012-01-12 14:32:33', '0000-00-00 00:00:00', '127.0.0.1', '/ph/room/reserveroom/home.php', NULL),
(317, 62, '2012-01-12 14:32:46', '0000-00-00 00:00:00', '127.0.0.1', '/ph/room/reserveroom/home.php', NULL),
(318, 62, '2012-01-12 14:33:47', '0000-00-00 00:00:00', '127.0.0.1', '/ph/room/reserveroom/home.php', NULL),
(319, 62, '2012-01-12 14:34:30', '0000-00-00 00:00:00', '127.0.0.1', '/ph/room/reserveroom/home.php', NULL),
(320, 62, '2012-01-12 14:35:19', '0000-00-00 00:00:00', '127.0.0.1', '/ph/room/reserveroom/home.php', NULL),
(321, 62, '2012-01-12 14:35:43', '0000-00-00 00:00:00', '127.0.0.1', '/ph/room/reserveroom/home.php', NULL),
(322, 62, '2012-01-12 14:36:05', '0000-00-00 00:00:00', '127.0.0.1', '/ph/room/reserveroom/home.php', NULL),
(323, 62, '2012-01-12 14:38:44', '0000-00-00 00:00:00', '127.0.0.1', '/ph/room/reserveroom/home.php', NULL),
(324, 62, '2012-01-16 08:53:07', '0000-00-00 00:00:00', '127.0.0.1', NULL, NULL),
(325, 62, '2012-01-16 08:53:07', '0000-00-00 00:00:00', '127.0.0.1', '/ph/room/reserveroom/home.php', NULL),
(326, 62, '2012-01-16 08:53:30', '0000-00-00 00:00:00', '127.0.0.1', '/ph/room/reserveroom/home.php', NULL),
(327, 62, '2012-01-16 09:30:59', '0000-00-00 00:00:00', '127.0.0.1', '/ph/room/reserveroom/room.php', NULL),
(328, 62, '2012-01-16 09:32:22', '0000-00-00 00:00:00', '127.0.0.1', '/ph/room/reserveroom/room.php', NULL),
(329, 62, '2012-01-16 09:32:29', '0000-00-00 00:00:00', '127.0.0.1', '/ph/room/reserveroom/room.php?mode=add', NULL),
(330, 62, '2012-01-16 09:32:31', '0000-00-00 00:00:00', '127.0.0.1', '/ph/room/reserveroom/room.php', NULL),
(331, 62, '2012-01-16 09:32:51', '0000-00-00 00:00:00', '127.0.0.1', '/ph/room/reserveroom/room.php', NULL),
(332, 62, '2012-01-16 09:33:50', '0000-00-00 00:00:00', '127.0.0.1', '/ph/room/reserveroom/room.php', NULL),
(333, 62, '2012-01-16 09:33:51', '0000-00-00 00:00:00', '127.0.0.1', '/ph/room/reserveroom/room.php', NULL),
(334, 62, '2012-01-16 09:33:53', '0000-00-00 00:00:00', '127.0.0.1', '/ph/room/reserveroom/media.php', NULL),
(335, 62, '2012-01-16 09:34:07', '0000-00-00 00:00:00', '127.0.0.1', '/ph/room/reserveroom/media.php', NULL),
(336, 62, '2012-01-16 09:34:32', '0000-00-00 00:00:00', '127.0.0.1', '/ph/room/reserveroom/org.php', NULL),
(337, 62, '2012-01-16 09:35:18', '0000-00-00 00:00:00', '127.0.0.1', '/ph/room/reserveroom/org.php', NULL),
(338, 62, '2012-01-16 09:35:57', '0000-00-00 00:00:00', '127.0.0.1', '/ph/room/reserveroom/user.php', NULL),
(339, 62, '2012-01-16 09:36:24', '0000-00-00 00:00:00', '127.0.0.1', '/ph/room/reserveroom/user.php', NULL),
(340, 62, '2012-01-16 09:36:28', '0000-00-00 00:00:00', '127.0.0.1', '/ph/room/reserveroom/user.php?mode=add', NULL),
(341, 62, '2012-01-16 09:36:29', '0000-00-00 00:00:00', '127.0.0.1', '/ph/room/reserveroom/user.php', NULL),
(342, 62, '2012-01-16 09:36:30', '0000-00-00 00:00:00', '127.0.0.1', '/ph/room/reserveroom/user.php?mode=add', NULL),
(343, 62, '2012-01-16 09:36:32', '0000-00-00 00:00:00', '127.0.0.1', '/ph/room/reserveroom/user.php', NULL),
(344, 62, '2012-01-16 09:44:06', '0000-00-00 00:00:00', '127.0.0.1', '/ph/room/reserveroom/user.php?mode=edit&keyno=', NULL),
(345, 62, '2012-01-16 09:44:12', '0000-00-00 00:00:00', '127.0.0.1', '/ph/room/reserveroom/user.php', NULL),
(346, 62, '2012-01-16 09:44:14', '0000-00-00 00:00:00', '127.0.0.1', '/ph/room/reserveroom/user.php?mode=add', NULL),
(347, 62, '2012-01-16 09:44:17', '0000-00-00 00:00:00', '127.0.0.1', '/ph/room/reserveroom/user.php', NULL),
(348, 62, '2012-01-16 09:47:02', '0000-00-00 00:00:00', '127.0.0.1', '/ph/room/reserveroom/user.php', NULL),
(349, 62, '2012-01-16 09:47:03', '0000-00-00 00:00:00', '127.0.0.1', '/ph/room/reserveroom/user.php?mode=add', NULL),
(350, 62, '2012-01-16 09:47:28', '0000-00-00 00:00:00', '127.0.0.1', '/ph/room/reserveroom/user.php?mode=add', NULL),
(351, 62, '2012-01-16 09:47:54', '0000-00-00 00:00:00', '127.0.0.1', '/ph/room/reserveroom/user.php?mode=add', NULL),
(352, 62, '2012-01-16 09:49:57', '0000-00-00 00:00:00', '127.0.0.1', '/ph/room/reserveroom/user.php?mode=add', NULL),
(353, 62, '2012-01-16 09:50:17', '0000-00-00 00:00:00', '127.0.0.1', '/ph/room/reserveroom/user.php?mode=add', NULL),
(354, 62, '2012-01-16 10:07:58', '0000-00-00 00:00:00', '127.0.0.1', '/ph/room/reserveroom/home.php', NULL),
(355, 62, '2012-01-16 10:11:33', '0000-00-00 00:00:00', '127.0.0.1', '/ph/room/reserveroom/home.php', NULL),
(356, 62, '2012-01-16 10:11:49', '0000-00-00 00:00:00', '127.0.0.1', '/ph/room/reserveroom/home.php', NULL),
(357, 62, '2012-01-16 10:12:37', '0000-00-00 00:00:00', '127.0.0.1', '/ph/room/reserveroom/home.php', NULL),
(358, 62, '2012-01-16 10:13:02', '0000-00-00 00:00:00', '127.0.0.1', '/ph/room/reserveroom/home.php', NULL),
(359, 62, '2012-01-16 10:13:06', '0000-00-00 00:00:00', '127.0.0.1', '/ph/room/reserveroom/home.php', NULL),
(360, 62, '2012-01-16 10:13:25', '0000-00-00 00:00:00', '127.0.0.1', '/ph/room/reserveroom/home.php', NULL),
(361, 62, '2012-01-16 10:15:44', '0000-00-00 00:00:00', '127.0.0.1', '/ph/room/reserveroom/home.php', NULL),
(362, 62, '2012-01-16 10:16:16', '0000-00-00 00:00:00', '127.0.0.1', '/ph/room/reserveroom/home.php', NULL),
(363, 62, '2012-01-16 10:17:03', '0000-00-00 00:00:00', '127.0.0.1', '/ph/room/reserveroom/home.php', NULL),
(364, 62, '2012-01-16 10:27:51', '0000-00-00 00:00:00', '127.0.0.1', '/ph/room/reserveroom/home.php', NULL),
(365, 62, '2012-01-16 10:27:54', '0000-00-00 00:00:00', '127.0.0.1', '/ph/room/reserveroom/home.php?Y=2011&m=12&d=16', NULL),
(366, 62, '2012-01-16 10:51:40', '0000-00-00 00:00:00', '127.0.0.1', '/ph/room/reserveroom/user.php', NULL),
(367, 62, '2012-01-16 10:52:54', '0000-00-00 00:00:00', '127.0.0.1', '/ph/room/reserveroom/user.php', NULL),
(368, 62, '2012-01-16 10:52:56', '0000-00-00 00:00:00', '127.0.0.1', '/ph/room/reserveroom/user.php?mode=edit&keyno=', NULL),
(369, 62, '2012-01-16 10:52:58', '0000-00-00 00:00:00', '127.0.0.1', '/ph/room/reserveroom/user.php', NULL),
(370, 62, '2012-01-16 10:53:29', '0000-00-00 00:00:00', '127.0.0.1', '/ph/room/reserveroom/user.php', NULL),
(371, 62, '2012-01-16 10:53:31', '0000-00-00 00:00:00', '127.0.0.1', '/ph/room/reserveroom/user.php?mode=add&keyno=', NULL),
(372, 62, '2012-01-16 10:53:33', '0000-00-00 00:00:00', '127.0.0.1', '/ph/room/reserveroom/user.php', NULL),
(373, 62, '2012-01-16 10:53:37', '0000-00-00 00:00:00', '127.0.0.1', '/ph/room/reserveroom/user.php?mode=add&keyno=', NULL),
(374, 62, '2012-01-16 10:53:40', '0000-00-00 00:00:00', '127.0.0.1', '/ph/room/reserveroom/user.php', NULL),
(375, 62, '2012-01-16 10:53:56', '0000-00-00 00:00:00', '127.0.0.1', '/ph/room/reserveroom/user.php', NULL),
(376, 62, '2012-01-16 10:53:57', '0000-00-00 00:00:00', '127.0.0.1', '/ph/room/reserveroom/user.php?mode=add&keyno=91', NULL),
(377, 62, '2012-01-16 10:54:03', '0000-00-00 00:00:00', '127.0.0.1', '/ph/room/reserveroom/user.php', NULL),
(378, 62, '2012-01-16 10:56:01', '0000-00-00 00:00:00', '127.0.0.1', '/ph/room/reserveroom/user.php?mode=add&keyno=91', NULL),
(379, 62, '2012-01-16 10:56:33', '0000-00-00 00:00:00', '127.0.0.1', '/ph/room/reserveroom/user.php?mode=add&keyno=91', NULL),
(380, 62, '2012-01-16 10:56:50', '0000-00-00 00:00:00', '127.0.0.1', '/ph/room/reserveroom/user.php?mode=add&keyno=91', NULL),
(381, 62, '2012-01-16 10:57:47', '0000-00-00 00:00:00', '127.0.0.1', '/ph/room/reserveroom/user.php?mode=add&keyno=91', NULL),
(382, 62, '2012-01-16 10:58:34', '0000-00-00 00:00:00', '127.0.0.1', '/ph/room/reserveroom/user.php?mode=add&keyno=91', NULL),
(383, 62, '2012-01-16 11:02:48', '0000-00-00 00:00:00', '127.0.0.1', '/ph/room/reserveroom/user.php', NULL),
(384, 62, '2012-01-16 11:03:48', '0000-00-00 00:00:00', '127.0.0.1', '/ph/room/reserveroom/user.php', NULL),
(385, 62, '2012-01-16 11:04:31', '0000-00-00 00:00:00', '127.0.0.1', '/ph/room/reserveroom/user.php', NULL),
(386, 62, '2012-01-16 11:04:47', '0000-00-00 00:00:00', '127.0.0.1', '/ph/room/reserveroom/user.php?mode=add&keyno=90', NULL),
(387, 62, '2012-01-16 11:04:51', '0000-00-00 00:00:00', '127.0.0.1', '/ph/room/reserveroom/user.php', NULL),
(388, 62, '2012-01-16 11:05:19', '0000-00-00 00:00:00', '127.0.0.1', '/ph/room/reserveroom/home.php', NULL),
(389, 62, '2012-01-16 11:45:27', '0000-00-00 00:00:00', '127.0.0.1', '/ph/room/reserveroom/formbooking.php', NULL),
(390, 62, '2012-01-16 11:54:11', '0000-00-00 00:00:00', '127.0.0.1', '/ph/room/reserveroom/formbooking.php', NULL),
(391, 62, '2012-01-17 09:42:43', '0000-00-00 00:00:00', '127.0.0.1', NULL, NULL),
(392, 62, '2012-01-17 09:42:43', '0000-00-00 00:00:00', '127.0.0.1', '/ph/room/reserveroom/home.php', NULL),
(393, 62, '2012-01-17 09:45:19', '0000-00-00 00:00:00', '127.0.0.1', '/ph/room/reserveroom/formbooking.php', NULL),
(394, 62, '2012-01-17 09:53:51', '0000-00-00 00:00:00', '127.0.0.1', '/ph/room/reserveroom/formbooking.php', NULL),
(395, 62, '2012-01-17 09:53:59', '0000-00-00 00:00:00', '127.0.0.1', '/ph/room/reserveroom/formbooking.php', NULL),
(396, 62, '2012-01-18 08:40:34', '0000-00-00 00:00:00', '127.0.0.1', NULL, NULL),
(397, 62, '2012-01-18 08:40:35', '0000-00-00 00:00:00', '127.0.0.1', '/ph/room/reserveroom/home.php', NULL),
(398, 62, '2012-01-18 09:03:00', '0000-00-00 00:00:00', '127.0.0.1', '/ph/room/reserveroom/formbooking.php', NULL),
(399, 62, '2012-01-18 09:06:25', '0000-00-00 00:00:00', '127.0.0.1', '/ph/room/reserveroom/formbooking.php', NULL),
(400, 62, '2012-01-18 10:37:38', '0000-00-00 00:00:00', '127.0.0.1', '/ph/room/reserveroom/formbooking.php', NULL),
(401, 62, '2012-01-18 10:38:15', '0000-00-00 00:00:00', '127.0.0.1', '/ph/room/reserveroom/formbooking.php', NULL),
(402, 62, '2012-01-18 10:38:19', '0000-00-00 00:00:00', '127.0.0.1', '/ph/room/reserveroom/home.php', NULL),
(403, 62, '2012-01-18 10:38:22', '0000-00-00 00:00:00', '127.0.0.1', '/ph/room/reserveroom/formbooking.php', NULL),
(404, 62, '2012-01-18 10:44:01', '0000-00-00 00:00:00', '127.0.0.1', '/ph/room/reserveroom/formbooking.php', NULL),
(405, 62, '2012-01-18 10:44:03', '0000-00-00 00:00:00', '127.0.0.1', '/ph/room/reserveroom/home.php', NULL),
(406, 62, '2012-01-18 10:44:05', '0000-00-00 00:00:00', '127.0.0.1', '/ph/room/reserveroom/formbooking.php', NULL),
(407, 62, '2012-01-18 10:44:29', '0000-00-00 00:00:00', '127.0.0.1', '/ph/room/reserveroom/home.php', NULL),
(408, 62, '2012-01-18 10:55:35', '0000-00-00 00:00:00', '127.0.0.1', '/ph/room/reserveroom/home.php', NULL),
(409, 62, '2012-01-18 10:55:38', '0000-00-00 00:00:00', '127.0.0.1', '/ph/room/reserveroom/home.php', NULL),
(410, 62, '2012-01-18 10:56:53', '0000-00-00 00:00:00', '127.0.0.1', '/ph/room/reserveroom/home.php', NULL),
(411, 62, '2012-01-18 10:56:56', '0000-00-00 00:00:00', '127.0.0.1', '/ph/room/reserveroom/home.php', NULL),
(412, 62, '2012-01-18 10:58:32', '0000-00-00 00:00:00', '127.0.0.1', '/ph/room/reserveroom/home.php', NULL),
(413, 62, '2012-01-18 10:58:34', '0000-00-00 00:00:00', '127.0.0.1', '/ph/room/reserveroom/home.php?Y=2012&m=2&d=18', NULL),
(414, 62, '2012-01-18 10:58:36', '0000-00-00 00:00:00', '127.0.0.1', '/ph/room/reserveroom/home.php?Y=2012&m=1&d=18', NULL),
(415, 62, '2012-01-18 11:23:59', '0000-00-00 00:00:00', '127.0.0.1', '/ph/room/reserveroom/home.php?Y=2012&m=1&d=18', NULL),
(416, 62, '2012-01-18 11:24:04', '0000-00-00 00:00:00', '127.0.0.1', '/ph/room/reserveroom/home.php?Y=2012&m=1&d=18', NULL),
(417, 62, '2012-01-18 11:24:10', '0000-00-00 00:00:00', '127.0.0.1', '/ph/room/reserveroom/home.php?Y=2011&m=12&d=18', NULL),
(418, 62, '2012-01-18 11:24:13', '0000-00-00 00:00:00', '127.0.0.1', '/ph/room/reserveroom/home.php?Y=2012&m=1&d=18', NULL),
(419, 62, '2012-01-18 11:25:26', '0000-00-00 00:00:00', '127.0.0.1', '/ph/room/reserveroom/home.php?Y=2012&m=1&d=18', NULL),
(420, 62, '2012-01-18 11:26:13', '0000-00-00 00:00:00', '127.0.0.1', '/ph/room/reserveroom/home.php?Y=2012&m=1&d=18', NULL),
(421, 62, '2012-01-18 11:28:25', '0000-00-00 00:00:00', '127.0.0.1', '/ph/room/reserveroom/home.php?Y=2012&m=1&d=18', NULL),
(422, 62, '2012-01-18 11:28:28', '0000-00-00 00:00:00', '127.0.0.1', '/ph/room/reserveroom/home.php?Y=2012&m=1&d=18', NULL),
(423, 62, '2012-01-18 11:28:59', '0000-00-00 00:00:00', '127.0.0.1', '/ph/room/reserveroom/home.php?Y=2011&m=12&d=18', NULL),
(424, 62, '2012-01-18 11:28:59', '0000-00-00 00:00:00', '127.0.0.1', '/ph/room/reserveroom/home.php?Y=2011&m=11&d=18', NULL),
(425, 62, '2012-01-18 11:29:00', '0000-00-00 00:00:00', '127.0.0.1', '/ph/room/reserveroom/home.php?Y=2011&m=10&d=18', NULL),
(426, 62, '2012-01-18 11:29:01', '0000-00-00 00:00:00', '127.0.0.1', '/ph/room/reserveroom/home.php?Y=2011&m=9&d=18', NULL),
(427, 62, '2012-01-18 11:29:14', '0000-00-00 00:00:00', '127.0.0.1', '/ph/room/reserveroom/home.php?Y=2011&m=9&d=18', NULL),
(428, 62, '2012-01-18 11:29:43', '0000-00-00 00:00:00', '127.0.0.1', '/ph/room/reserveroom/home.php', NULL),
(429, 62, '2012-01-18 11:32:14', '0000-00-00 00:00:00', '127.0.0.1', '/ph/room/reserveroom/home.php', NULL),
(430, 62, '2012-01-18 11:32:41', '0000-00-00 00:00:00', '127.0.0.1', '/ph/room/reserveroom/home.php', NULL),
(431, 62, '2012-01-18 11:35:32', '0000-00-00 00:00:00', '127.0.0.1', '/ph/room/reserveroom/home.php', NULL),
(432, 62, '2012-01-18 11:37:13', '0000-00-00 00:00:00', '127.0.0.1', '/ph/room/reserveroom/home.php', NULL),
(433, 62, '2012-01-18 11:38:01', '0000-00-00 00:00:00', '127.0.0.1', '/ph/room/reserveroom/home.php', NULL),
(434, 62, '2012-01-18 11:38:05', '0000-00-00 00:00:00', '127.0.0.1', '/ph/room/reserveroom/home.php', NULL),
(435, 62, '2012-01-18 11:38:07', '0000-00-00 00:00:00', '127.0.0.1', '/ph/room/reserveroom/home.php', NULL),
(436, 62, '2012-01-18 11:41:30', '0000-00-00 00:00:00', '127.0.0.1', '/ph/room/reserveroom/home.php', NULL),
(437, 62, '2012-01-18 11:42:00', '0000-00-00 00:00:00', '127.0.0.1', '/ph/room/reserveroom/home.php', NULL),
(438, 62, '2012-01-18 11:44:15', '0000-00-00 00:00:00', '127.0.0.1', '/ph/room/reserveroom/home.php', NULL),
(439, 62, '2012-01-18 11:45:07', '0000-00-00 00:00:00', '127.0.0.1', NULL, NULL),
(440, 62, '2012-01-18 11:45:07', '0000-00-00 00:00:00', '127.0.0.1', '/ph/room/reserveroom/home.php', NULL),
(441, 62, '2012-01-18 11:50:51', '0000-00-00 00:00:00', '127.0.0.1', '/ph/room/reserveroom/home.php', NULL),
(442, 62, '2012-01-20 09:23:25', '0000-00-00 00:00:00', '127.0.0.1', NULL, NULL),
(443, 62, '2012-01-20 09:23:25', '0000-00-00 00:00:00', '127.0.0.1', '/ph/room/reserveroom/home.php', NULL),
(444, 62, '2012-01-20 09:24:04', '0000-00-00 00:00:00', '127.0.0.1', '/ph/room/reserveroom/home.php', NULL),
(445, 62, '2012-01-20 09:24:27', '0000-00-00 00:00:00', '127.0.0.1', '/ph/room/reserveroom/home.php', NULL),
(446, 62, '2012-01-20 09:24:30', '0000-00-00 00:00:00', '127.0.0.1', '/ph/room/reserveroom/home.php', NULL),
(447, 62, '2012-01-20 09:24:58', '0000-00-00 00:00:00', '127.0.0.1', '/ph/room/reserveroom/home.php', NULL),
(448, 62, '2012-01-20 10:58:37', '0000-00-00 00:00:00', '127.0.0.1', '/ph/room/reserveroom/home.php', NULL),
(449, 62, '2012-01-20 10:59:02', '0000-00-00 00:00:00', '127.0.0.1', '/ph/room/reserveroom/home.php', NULL),
(450, 62, '2012-01-20 10:59:14', '0000-00-00 00:00:00', '127.0.0.1', '/ph/room/reserveroom/home.php', NULL),
(451, 62, '2012-01-20 14:58:44', '0000-00-00 00:00:00', '127.0.0.1', NULL, NULL),
(452, 62, '2012-01-20 14:58:44', '0000-00-00 00:00:00', '127.0.0.1', '/ph/room/reserveroom/home.php', NULL),
(453, 62, '2012-01-20 15:10:11', '0000-00-00 00:00:00', '127.0.0.1', '/ph/room/reserveroom/home.php', NULL),
(454, 62, '2012-01-20 15:58:52', '0000-00-00 00:00:00', '127.0.0.1', '/ph/room/reserveroom/room.php', NULL),
(455, 62, '2012-01-20 15:58:56', '0000-00-00 00:00:00', '127.0.0.1', '/ph/room/reserveroom/media.php', NULL),
(456, 62, '2012-01-20 15:59:02', '0000-00-00 00:00:00', '127.0.0.1', '/ph/room/reserveroom/org.php', NULL),
(457, 62, '2012-01-20 16:00:15', '0000-00-00 00:00:00', '127.0.0.1', '/ph/room/reserveroom/org.php', NULL),
(458, 62, '2012-01-20 16:02:18', '0000-00-00 00:00:00', '127.0.0.1', '/ph/room/reserveroom/org.php', NULL),
(459, 62, '2012-01-20 16:03:10', '0000-00-00 00:00:00', '127.0.0.1', '/ph/room/reserveroom/org.php', NULL),
(460, 62, '2012-01-20 16:03:11', '0000-00-00 00:00:00', '127.0.0.1', '/ph/room/reserveroom/org.php', NULL),
(461, 62, '2012-01-20 16:03:32', '0000-00-00 00:00:00', '127.0.0.1', '/ph/room/reserveroom/org.php', NULL),
(462, 62, '2012-01-20 16:04:35', '0000-00-00 00:00:00', '127.0.0.1', '/ph/room/reserveroom/org.php', NULL),
(463, 62, '2012-01-20 16:05:08', '0000-00-00 00:00:00', '127.0.0.1', '/ph/room/reserveroom/org.php', NULL),
(464, 62, '2012-01-20 16:17:16', '0000-00-00 00:00:00', '127.0.0.1', '/ph/room/reserveroom/media.php', NULL),
(465, 62, '2012-01-20 16:17:18', '0000-00-00 00:00:00', '127.0.0.1', '/ph/room/reserveroom/org.php', NULL),
(466, 62, '2012-01-20 16:17:20', '0000-00-00 00:00:00', '127.0.0.1', '/ph/room/reserveroom/user.php', NULL),
(467, 62, '2012-01-20 16:17:43', '0000-00-00 00:00:00', '127.0.0.1', '/ph/room/reserveroom/room.php', NULL),
(468, 62, '2012-01-20 16:17:51', '0000-00-00 00:00:00', '127.0.0.1', '/ph/room/reserveroom/home.php', NULL),
(469, 62, '2012-01-20 16:17:55', '0000-00-00 00:00:00', '127.0.0.1', '/ph/room/reserveroom/room.php', NULL),
(470, 62, '2012-01-20 16:19:10', '0000-00-00 00:00:00', '127.0.0.1', '/ph/room/reserveroom/room.php', NULL),
(471, 62, '2012-01-23 09:38:57', '0000-00-00 00:00:00', '127.0.0.1', NULL, NULL),
(472, 62, '2012-01-23 09:38:57', '0000-00-00 00:00:00', '127.0.0.1', '/ph/room/reserveroom/home.php', NULL),
(473, 62, '2012-01-23 09:46:32', '0000-00-00 00:00:00', '127.0.0.1', '/ph/room/reserveroom/formbooking.php', NULL),
(474, 62, '2012-01-23 09:55:33', '0000-00-00 00:00:00', '127.0.0.1', '/ph/room/reserveroom/home.php', NULL),
(475, 62, '2012-01-23 10:12:18', '0000-00-00 00:00:00', '127.0.0.1', '/ph/room/reserveroom/home.php', NULL),
(476, 62, '2012-01-23 10:12:52', '0000-00-00 00:00:00', '127.0.0.1', '/ph/room/reserveroom/home.php', NULL),
(477, 62, '2012-01-23 10:14:35', '0000-00-00 00:00:00', '127.0.0.1', '/ph/room/reserveroom/home.php', NULL),
(478, 62, '2012-01-23 10:14:50', '0000-00-00 00:00:00', '127.0.0.1', '/ph/room/reserveroom/home.php', NULL),
(479, 62, '2012-01-23 10:15:12', '0000-00-00 00:00:00', '127.0.0.1', '/ph/room/reserveroom/home.php', NULL),
(480, 62, '2012-01-23 10:15:19', '0000-00-00 00:00:00', '127.0.0.1', '/ph/room/reserveroom/home.php', NULL),
(481, 62, '2012-01-23 10:21:10', '0000-00-00 00:00:00', '127.0.0.1', '/ph/room/reserveroom/home.php', NULL),
(482, 62, '2012-01-23 10:21:23', '0000-00-00 00:00:00', '127.0.0.1', '/ph/room/reserveroom/home.php', NULL),
(483, 62, '2012-01-25 09:04:15', '0000-00-00 00:00:00', '127.0.0.1', NULL, NULL),
(484, 62, '2012-01-25 09:04:15', '0000-00-00 00:00:00', '127.0.0.1', '/project/ph/room/reserveroom/home.php', NULL),
(485, 62, '2012-01-25 09:04:58', '0000-00-00 00:00:00', '127.0.0.1', '/project/ph/room/reserveroom/user.php', NULL),
(486, 62, '2012-01-25 09:05:18', '0000-00-00 00:00:00', '127.0.0.1', '/project/ph/room/reserveroom/room.php', NULL),
(487, 62, '2012-01-25 09:05:23', '0000-00-00 00:00:00', '127.0.0.1', '/project/ph/room/reserveroom/media.php', NULL),
(488, 62, '2012-01-25 09:05:29', '0000-00-00 00:00:00', '127.0.0.1', '/project/ph/room/reserveroom/org.php', NULL),
(489, 62, '2012-01-25 09:05:44', '0000-00-00 00:00:00', '127.0.0.1', '/project/ph/room/reserveroom/home.php', NULL),
(490, 62, '2012-01-25 09:45:34', '0000-00-00 00:00:00', '127.0.0.1', '/project/ph/room/reserveroom/formbooking.php', NULL),
(491, 62, '2012-01-25 09:46:02', '0000-00-00 00:00:00', '127.0.0.1', '/project/ph/room/reserveroom/formbooking.php', NULL),
(492, 62, '2012-01-25 09:46:04', '0000-00-00 00:00:00', '127.0.0.1', '/project/ph/room/reserveroom/formbooking.php', NULL),
(493, 62, '2012-01-25 09:52:47', '0000-00-00 00:00:00', '127.0.0.1', '/project/ph/room/reserveroom/home.php', NULL),
(494, 62, '2012-01-25 14:14:02', '0000-00-00 00:00:00', '127.0.0.1', NULL, NULL),
(495, 62, '2012-01-25 14:14:02', '0000-00-00 00:00:00', '127.0.0.1', '/project/ph/room/reserveroom/home.php', NULL),
(496, 62, '2012-01-25 14:36:35', '0000-00-00 00:00:00', '127.0.0.1', '/project/ph/room/reserveroom/org.php', NULL),
(497, 62, '2012-01-25 14:36:46', '0000-00-00 00:00:00', '127.0.0.1', '/project/ph/room/reserveroom/org.php', NULL),
(498, 62, '2012-01-25 14:41:45', '0000-00-00 00:00:00', '127.0.0.1', '/project/ph/room/reserveroom/org.php', NULL),
(499, 62, '2012-01-25 14:41:48', '0000-00-00 00:00:00', '127.0.0.1', '/project/ph/room/reserveroom/org.php', NULL),
(500, 62, '2012-01-25 14:42:19', '0000-00-00 00:00:00', '127.0.0.1', '/project/ph/room/reserveroom/org.php', NULL),
(501, 62, '2012-01-25 14:42:21', '0000-00-00 00:00:00', '127.0.0.1', '/project/ph/room/reserveroom/org.php', NULL),
(502, 62, '2012-01-25 14:42:55', '0000-00-00 00:00:00', '127.0.0.1', '/project/ph/room/reserveroom/org.php', NULL),
(503, 62, '2012-01-25 14:43:19', '0000-00-00 00:00:00', '127.0.0.1', '/project/ph/room/reserveroom/org.php', NULL),
(504, 62, '2012-01-25 14:47:00', '0000-00-00 00:00:00', '127.0.0.1', '/project/ph/room/reserveroom/org.php', NULL);
INSERT INTO `user_log` (`ul_id`, `us_id`, `ul_in`, `ul_out`, `ul_ip`, `ul_url`, `class`) VALUES
(505, 62, '2012-01-25 14:47:19', '0000-00-00 00:00:00', '127.0.0.1', '/project/ph/room/reserveroom/org.php', NULL),
(506, 62, '2012-01-25 14:47:36', '0000-00-00 00:00:00', '127.0.0.1', '/project/ph/room/reserveroom/org.php', NULL),
(507, 62, '2012-01-25 14:48:05', '0000-00-00 00:00:00', '127.0.0.1', '/project/ph/room/reserveroom/org.php', NULL),
(508, 62, '2012-01-25 14:49:17', '0000-00-00 00:00:00', '127.0.0.1', '/project/ph/room/reserveroom/org.php', NULL),
(509, 62, '2012-01-25 14:51:17', '0000-00-00 00:00:00', '127.0.0.1', '/project/ph/room/reserveroom/room.php', NULL),
(510, 62, '2012-01-25 14:51:20', '0000-00-00 00:00:00', '127.0.0.1', '/project/ph/room/reserveroom/media.php', NULL),
(511, 62, '2012-01-25 14:51:24', '0000-00-00 00:00:00', '127.0.0.1', '/project/ph/room/reserveroom/org.php', NULL),
(512, 62, '2012-01-25 14:51:26', '0000-00-00 00:00:00', '127.0.0.1', '/project/ph/room/reserveroom/user.php', NULL),
(513, 62, '2012-01-26 13:51:14', '0000-00-00 00:00:00', '127.0.0.1', NULL, NULL),
(514, 62, '2012-01-26 13:51:14', '0000-00-00 00:00:00', '127.0.0.1', '/project/ph/room/reserveroom/home.php', NULL),
(515, 62, '2012-01-26 14:24:16', '0000-00-00 00:00:00', '127.0.0.1', '/project/ph/room/reserveroom/formbooking.php', NULL),
(516, 62, '2012-01-26 14:24:23', '0000-00-00 00:00:00', '127.0.0.1', '/project/ph/room/reserveroom/room.php', NULL),
(517, 62, '2012-01-26 14:24:33', '0000-00-00 00:00:00', '127.0.0.1', '/project/ph/room/reserveroom/media.php', NULL),
(518, 62, '2012-01-26 14:30:20', '0000-00-00 00:00:00', '127.0.0.1', '/project/ph/room/reserveroom/formbooking.php', NULL),
(519, 62, '2012-01-26 14:30:49', '0000-00-00 00:00:00', '127.0.0.1', '/project/ph/room/reserveroom/formbooking.php?mode=edit&keyuq_id=84', NULL),
(520, 62, '2012-01-26 14:38:19', '0000-00-00 00:00:00', '127.0.0.1', '/project/ph/room/reserveroom/home.php', NULL),
(521, 62, '2012-01-27 14:59:18', '0000-00-00 00:00:00', '127.0.0.1', NULL, NULL),
(522, 62, '2012-01-27 14:59:19', '0000-00-00 00:00:00', '127.0.0.1', '/project/ph/room/reserveroom/home.php', NULL),
(523, 62, '2012-01-30 09:55:49', '0000-00-00 00:00:00', '127.0.0.1', NULL, NULL),
(524, 62, '2012-01-30 09:55:49', '0000-00-00 00:00:00', '127.0.0.1', '/project/ph/room/reserveroom/home.php', NULL),
(525, 62, '2012-01-30 09:58:40', '0000-00-00 00:00:00', '127.0.0.1', '/project/ph/room/reserveroom/home.php', NULL),
(526, 62, '2012-01-30 09:58:41', '0000-00-00 00:00:00', '127.0.0.1', '/project/ph/room/reserveroom/home.php', NULL),
(527, 62, '2012-01-30 10:11:31', '0000-00-00 00:00:00', '127.0.0.1', '/project/ph/room/reserveroom/room.php', NULL),
(528, 62, '2012-01-30 10:11:33', '0000-00-00 00:00:00', '127.0.0.1', '/project/ph/room/reserveroom/room.php?mode=add', NULL),
(529, 62, '2012-01-30 10:11:44', '0000-00-00 00:00:00', '127.0.0.1', '/project/ph/room/reserveroom/room.php', NULL),
(530, 62, '2012-01-30 10:11:46', '0000-00-00 00:00:00', '127.0.0.1', '/project/ph/room/reserveroom/room.php?mode=add', NULL),
(531, 62, '2012-01-30 10:11:49', '0000-00-00 00:00:00', '127.0.0.1', '/project/ph/room/reserveroom/room.php', NULL),
(532, 62, '2012-01-30 10:12:37', '0000-00-00 00:00:00', '127.0.0.1', '/project/ph/room/reserveroom/room.php?mode=add', NULL),
(533, 62, '2012-01-30 10:12:42', '0000-00-00 00:00:00', '127.0.0.1', '/project/ph/room/reserveroom/room.php', NULL),
(534, 62, '2012-01-30 10:15:24', '0000-00-00 00:00:00', '127.0.0.1', '/project/ph/room/reserveroom/room.php?mode=add', NULL),
(535, 62, '2012-01-30 10:15:25', '0000-00-00 00:00:00', '127.0.0.1', '/project/ph/room/reserveroom/room.php?mode=add', NULL),
(536, 62, '2012-01-30 10:16:33', '0000-00-00 00:00:00', '127.0.0.1', '/project/ph/room/reserveroom/room.php?mode=add', NULL),
(537, 62, '2012-01-30 10:16:49', '0000-00-00 00:00:00', '127.0.0.1', '/project/ph/room/reserveroom/room.php?mode=add', NULL),
(538, 62, '2012-01-30 10:16:59', '0000-00-00 00:00:00', '127.0.0.1', '/project/ph/room/reserveroom/room.php?mode=add', NULL),
(539, 62, '2012-01-30 10:17:25', '0000-00-00 00:00:00', '127.0.0.1', '/project/ph/room/reserveroom/room.php?mode=add', NULL),
(540, 62, '2012-01-30 10:18:22', '0000-00-00 00:00:00', '127.0.0.1', '/project/ph/room/reserveroom/room.php?mode=add', NULL),
(541, 62, '2012-01-30 10:20:13', '0000-00-00 00:00:00', '127.0.0.1', '/project/ph/room/reserveroom/room.php?mode=add', NULL),
(542, 62, '2012-01-30 10:20:43', '0000-00-00 00:00:00', '127.0.0.1', '/project/ph/room/reserveroom/room.php?mode=add', NULL),
(543, 62, '2012-01-30 10:30:57', '0000-00-00 00:00:00', '127.0.0.1', '/project/ph/room/reserveroom/room.php?mode=add', NULL),
(544, 62, '2012-01-30 10:31:25', '0000-00-00 00:00:00', '127.0.0.1', '/project/ph/room/reserveroom/room.php?mode=add', NULL),
(545, 62, '2012-01-30 10:31:49', '0000-00-00 00:00:00', '127.0.0.1', '/project/ph/room/reserveroom/room.php?mode=add', NULL),
(546, 62, '2012-01-30 10:31:57', '0000-00-00 00:00:00', '127.0.0.1', '/project/ph/room/reserveroom/room.php?mode=add', NULL),
(547, 62, '2012-01-30 10:32:21', '0000-00-00 00:00:00', '127.0.0.1', '/project/ph/room/reserveroom/room.php?mode=add', NULL),
(548, 62, '2012-01-30 10:32:43', '0000-00-00 00:00:00', '127.0.0.1', '/project/ph/room/reserveroom/room.php', NULL),
(549, 62, '2012-01-30 10:37:04', '0000-00-00 00:00:00', '127.0.0.1', '/project/ph/room/reserveroom/room.php', NULL),
(550, 62, '2012-01-30 10:39:24', '0000-00-00 00:00:00', '127.0.0.1', '/project/ph/room/reserveroom/room.php', NULL),
(551, 62, '2012-01-30 10:39:27', '0000-00-00 00:00:00', '127.0.0.1', '/project/ph/room/reserveroom/room.php', NULL),
(552, 62, '2012-01-30 10:39:52', '0000-00-00 00:00:00', '127.0.0.1', '/project/ph/room/reserveroom/room.php', NULL),
(553, 62, '2012-01-30 10:40:57', '0000-00-00 00:00:00', '127.0.0.1', '/project/ph/room/reserveroom/room.php', NULL),
(554, 62, '2012-01-30 10:40:58', '0000-00-00 00:00:00', '127.0.0.1', '/project/ph/room/reserveroom/room.php', NULL),
(555, 62, '2012-01-30 10:41:14', '0000-00-00 00:00:00', '127.0.0.1', '/project/ph/room/reserveroom/room.php?mode=add', NULL),
(556, 62, '2012-01-30 10:44:34', '0000-00-00 00:00:00', '127.0.0.1', '/project/ph/room/reserveroom/room.php', NULL),
(557, 62, '2012-01-30 10:46:33', '0000-00-00 00:00:00', '127.0.0.1', '/project/ph/room/reserveroom/room.php', NULL),
(558, 62, '2012-01-30 10:46:35', '0000-00-00 00:00:00', '127.0.0.1', '/project/ph/room/reserveroom/room.php', NULL),
(559, 62, '2012-01-30 10:47:23', '0000-00-00 00:00:00', '127.0.0.1', '/project/ph/room/reserveroom/room.php', NULL),
(560, 62, '2012-01-30 10:47:36', '0000-00-00 00:00:00', '127.0.0.1', '/project/ph/room/reserveroom/room.php', NULL),
(561, 62, '2012-01-30 10:47:49', '0000-00-00 00:00:00', '127.0.0.1', '/project/ph/room/reserveroom/room.php', NULL),
(562, 62, '2012-01-30 10:48:25', '0000-00-00 00:00:00', '127.0.0.1', '/project/ph/room/reserveroom/room.php', NULL),
(563, 62, '2012-01-30 10:50:29', '0000-00-00 00:00:00', '127.0.0.1', '/project/ph/room/reserveroom/room.php', NULL),
(564, 62, '2012-01-30 10:51:46', '0000-00-00 00:00:00', '127.0.0.1', '/project/ph/room/reserveroom/room.php', NULL),
(565, 62, '2012-01-30 10:52:01', '0000-00-00 00:00:00', '127.0.0.1', '/project/ph/room/reserveroom/room.php', NULL),
(566, 62, '2012-01-30 10:52:06', '0000-00-00 00:00:00', '127.0.0.1', '/project/ph/room/reserveroom/room.php', NULL),
(567, 62, '2012-01-30 10:52:37', '0000-00-00 00:00:00', '127.0.0.1', '/project/ph/room/reserveroom/room.php', NULL),
(568, 62, '2012-01-30 11:08:13', '0000-00-00 00:00:00', '127.0.0.1', '/project/ph/room/reserveroom/room.php?mode=add', NULL),
(569, 62, '2012-01-30 11:29:50', '0000-00-00 00:00:00', '127.0.0.1', '/project/ph/room/reserveroom/media.php', NULL),
(570, 62, '2012-01-30 11:29:52', '0000-00-00 00:00:00', '127.0.0.1', '/project/ph/room/reserveroom/org.php', NULL),
(571, 62, '2012-02-06 10:19:08', '0000-00-00 00:00:00', '127.0.0.1', NULL, NULL),
(572, 62, '2012-02-06 10:19:08', '0000-00-00 00:00:00', '127.0.0.1', '/project/ph/room/reserveroom/home.php', NULL),
(573, 62, '2012-02-06 10:19:31', '0000-00-00 00:00:00', '127.0.0.1', '/project/ph/room/reserveroom/home.php', NULL),
(574, 62, '2012-02-06 10:33:51', '0000-00-00 00:00:00', '127.0.0.1', NULL, NULL),
(575, 62, '2012-02-06 10:33:51', '0000-00-00 00:00:00', '127.0.0.1', '/project/ph/room/reserveroom/home.php', NULL),
(576, 62, '2012-02-06 10:34:48', '0000-00-00 00:00:00', '127.0.0.1', '/project/ph/room/reserveroom/home.php', NULL),
(577, 62, '2012-05-17 11:23:15', '0000-00-00 00:00:00', '127.0.0.1', NULL, NULL),
(578, 62, '2012-05-17 11:23:15', '0000-00-00 00:00:00', '127.0.0.1', '/ph/room/reserveroom/home.php', NULL),
(579, 62, '2012-05-17 11:23:39', '0000-00-00 00:00:00', '127.0.0.1', '/ph/room/reserveroom/formbooking.php', NULL),
(580, 62, '2012-05-17 11:26:52', '0000-00-00 00:00:00', '127.0.0.1', '/ph/room/reserveroom/room.php', NULL),
(581, 62, '2012-05-17 11:26:59', '0000-00-00 00:00:00', '127.0.0.1', '/ph/room/reserveroom/org.php', NULL),
(582, 62, '2012-05-17 11:27:08', '0000-00-00 00:00:00', '127.0.0.1', '/ph/room/reserveroom/user.php', NULL),
(583, 62, '2012-05-17 11:27:20', '0000-00-00 00:00:00', '127.0.0.1', '/ph/room/reserveroom/home.php', NULL),
(584, 62, '2012-05-17 11:42:12', '0000-00-00 00:00:00', '127.0.0.1', '/ph/room/reserveroom/home.php', NULL),
(585, 62, '2012-05-17 11:42:12', '0000-00-00 00:00:00', '127.0.0.1', '/ph/room/reserveroom/home.php', NULL),
(586, 62, '2012-06-15 14:40:34', '0000-00-00 00:00:00', '127.0.0.1', NULL, NULL),
(587, 62, '2012-06-15 14:40:34', '0000-00-00 00:00:00', '127.0.0.1', '/ph/room/reserveroom/home.php', NULL),
(588, 62, '2012-06-15 14:45:36', '0000-00-00 00:00:00', '127.0.0.1', '/ph/room/reserveroom/home.php', NULL),
(589, 62, '2012-06-15 14:45:37', '0000-00-00 00:00:00', '127.0.0.1', '/ph/room/reserveroom/formbooking.php', NULL),
(590, 62, '2012-06-15 14:46:22', '0000-00-00 00:00:00', '127.0.0.1', '/ph/room/reserveroom/formbooking.php', NULL),
(591, 62, '2012-06-15 14:48:14', '0000-00-00 00:00:00', '127.0.0.1', '/ph/room/reserveroom/room.php', NULL),
(592, 62, '2012-06-15 14:48:25', '0000-00-00 00:00:00', '127.0.0.1', '/ph/room/reserveroom/home.php', NULL),
(593, 62, '2012-06-15 14:48:27', '0000-00-00 00:00:00', '127.0.0.1', '/ph/room/reserveroom/formbooking.php', NULL),
(594, 62, '2012-06-15 14:48:28', '0000-00-00 00:00:00', '127.0.0.1', '/ph/room/reserveroom/home.php', NULL),
(595, 62, '2012-06-15 14:48:41', '0000-00-00 00:00:00', '127.0.0.1', '/ph/room/reserveroom/media.php', NULL),
(596, 62, '2012-06-15 14:48:50', '0000-00-00 00:00:00', '127.0.0.1', '/ph/room/reserveroom/org.php', NULL),
(597, 62, '2012-06-15 14:49:07', '0000-00-00 00:00:00', '127.0.0.1', '/ph/room/reserveroom/user.php', NULL),
(598, 62, '2012-06-15 14:49:24', '0000-00-00 00:00:00', '127.0.0.1', '/ph/room/reserveroom/user.php?mode=add', NULL),
(599, 62, '2012-06-15 14:50:59', '0000-00-00 00:00:00', '127.0.0.1', '/ph/room/reserveroom/home.php', NULL),
(600, 62, '2012-06-15 14:51:01', '0000-00-00 00:00:00', '127.0.0.1', '/ph/room/reserveroom/home.php?Y=2012&m=5&d=15', NULL),
(601, 62, '2012-06-15 14:51:01', '0000-00-00 00:00:00', '127.0.0.1', '/ph/room/reserveroom/home.php?Y=2012&m=4&d=15', NULL),
(602, 62, '2012-06-15 14:51:02', '0000-00-00 00:00:00', '127.0.0.1', '/ph/room/reserveroom/home.php?Y=2012&m=3&d=15', NULL),
(603, 62, '2012-06-15 14:51:02', '0000-00-00 00:00:00', '127.0.0.1', '/ph/room/reserveroom/home.php?Y=2012&m=2&d=15', NULL),
(604, 62, '2012-06-15 14:51:03', '0000-00-00 00:00:00', '127.0.0.1', '/ph/room/reserveroom/home.php?Y=2012&m=1&d=15', NULL),
(605, 62, '2012-06-15 14:51:05', '0000-00-00 00:00:00', '127.0.0.1', '/ph/room/reserveroom/home.php?Y=2011&m=12&d=15', NULL),
(606, 62, '2012-06-15 14:51:06', '0000-00-00 00:00:00', '127.0.0.1', '/ph/room/reserveroom/home.php?Y=2012&m=1&d=15', NULL),
(607, 62, '2012-06-15 14:51:27', '0000-00-00 00:00:00', '127.0.0.1', '/ph/room/reserveroom/home.php', NULL),
(608, 62, '2012-06-18 10:48:33', '0000-00-00 00:00:00', '127.0.0.1', NULL, NULL),
(609, 62, '2012-06-18 10:48:33', '0000-00-00 00:00:00', '127.0.0.1', '/ph/room/reserveroom/home.php', NULL),
(610, 62, '2012-06-18 10:50:14', '0000-00-00 00:00:00', '127.0.0.1', '/ph/room/reserveroom/home.php', NULL),
(611, 62, '2012-06-18 10:50:17', '0000-00-00 00:00:00', '127.0.0.1', '/ph/room/reserveroom/room.php', NULL),
(612, 62, '2012-06-18 10:50:21', '0000-00-00 00:00:00', '127.0.0.1', '/ph/room/reserveroom/room.php?key_cid=38&mode=add', NULL),
(613, 62, '2012-06-18 10:50:23', '0000-00-00 00:00:00', '127.0.0.1', '/ph/room/reserveroom/room.php', NULL),
(614, 62, '2012-06-18 10:50:26', '0000-00-00 00:00:00', '127.0.0.1', '/ph/room/reserveroom/room.php', NULL),
(615, 62, '2012-06-18 10:50:28', '0000-00-00 00:00:00', '127.0.0.1', '/ph/room/reserveroom/room.php', NULL),
(616, 62, '2012-06-18 11:04:06', '0000-00-00 00:00:00', '127.0.0.1', '/ph/room/reserveroom/room.php', NULL),
(617, 62, '2012-06-18 11:04:09', '0000-00-00 00:00:00', '127.0.0.1', '/ph/room/reserveroom/room.php?mode=add', NULL),
(618, 62, '2012-06-18 11:04:12', '0000-00-00 00:00:00', '127.0.0.1', '/ph/room/reserveroom/room.php', NULL),
(619, 62, '2012-06-18 11:05:10', '0000-00-00 00:00:00', '127.0.0.1', '/ph/room/reserveroom/room.php?mode=add', NULL),
(620, 62, '2012-06-18 11:05:13', '0000-00-00 00:00:00', '127.0.0.1', '/ph/room/reserveroom/room.php', NULL),
(621, 62, '2012-06-18 11:07:44', '0000-00-00 00:00:00', '127.0.0.1', '/ph/room/reserveroom/room.php?mode=add', NULL),
(622, 62, '2012-06-18 11:08:15', '0000-00-00 00:00:00', '127.0.0.1', '/ph/room/reserveroom/room.php?mode=add', NULL),
(623, 62, '2012-06-18 11:09:28', '0000-00-00 00:00:00', '127.0.0.1', '/ph/room/reserveroom/room.php?mode=add', NULL),
(624, 62, '2012-06-18 11:11:20', '0000-00-00 00:00:00', '127.0.0.1', '/ph/room/reserveroom/room.php?mode=add', NULL),
(625, 62, '2012-06-18 11:11:42', '0000-00-00 00:00:00', '127.0.0.1', '/ph/room/reserveroom/room.php?mode=add', NULL),
(626, 62, '2012-06-18 11:12:17', '0000-00-00 00:00:00', '127.0.0.1', '/ph/room/reserveroom/room.php?mode=add', NULL),
(627, 62, '2012-06-18 11:12:34', '0000-00-00 00:00:00', '127.0.0.1', '/ph/room/reserveroom/room.php?mode=add', NULL),
(628, 62, '2012-06-18 11:14:28', '0000-00-00 00:00:00', '127.0.0.1', NULL, NULL),
(629, 62, '2012-06-18 11:14:28', '0000-00-00 00:00:00', '127.0.0.1', '/ph/room/reserveroom/home.php', NULL),
(630, 62, '2012-06-18 11:16:52', '0000-00-00 00:00:00', '127.0.0.1', '/ph/room/reserveroom/home.php', NULL),
(631, 62, '2012-06-18 11:16:55', '0000-00-00 00:00:00', '127.0.0.1', '/ph/room/reserveroom/user.php', NULL),
(632, 62, '2012-06-18 11:16:58', '0000-00-00 00:00:00', '127.0.0.1', '/ph/room/reserveroom/user.php?mode=add', NULL),
(633, 62, '2012-06-18 11:17:31', '0000-00-00 00:00:00', '127.0.0.1', '/ph/room/reserveroom/user.php?mode=add', NULL),
(634, 62, '2012-06-18 11:17:46', '0000-00-00 00:00:00', '127.0.0.1', '/ph/room/reserveroom/user.php?mode=add', NULL),
(635, 62, '2012-06-18 11:17:59', '0000-00-00 00:00:00', '127.0.0.1', '/ph/room/reserveroom/user.php?mode=add', NULL),
(636, 62, '2012-06-18 11:18:33', '0000-00-00 00:00:00', '127.0.0.1', '/ph/room/reserveroom/user.php?mode=add', NULL),
(637, 62, '2012-06-18 11:19:26', '0000-00-00 00:00:00', '127.0.0.1', '/ph/room/reserveroom/room.php', NULL),
(638, 62, '2012-06-18 11:19:28', '0000-00-00 00:00:00', '127.0.0.1', '/ph/room/reserveroom/room.php?mode=add', NULL),
(639, 62, '2012-06-18 11:27:45', '0000-00-00 00:00:00', '127.0.0.1', '/ph/room/reserveroom/room.php?mode=add', NULL),
(640, 62, '2012-06-18 11:30:34', '0000-00-00 00:00:00', '127.0.0.1', '/ph/room/reserveroom/room.php?mode=add', NULL),
(641, 62, '2012-06-18 11:32:00', '0000-00-00 00:00:00', '127.0.0.1', '/ph/room/reserveroom/room.php?mode=add', NULL),
(642, 62, '2012-06-18 11:32:11', '0000-00-00 00:00:00', '127.0.0.1', '/ph/room/reserveroom/room.php?mode=add', NULL),
(643, 62, '2012-06-18 11:33:08', '0000-00-00 00:00:00', '127.0.0.1', '/ph/room/reserveroom/room.php', NULL),
(644, 62, '2012-06-18 11:33:11', '0000-00-00 00:00:00', '127.0.0.1', '/ph/room/reserveroom/room.php?key_cid=38&mode=add', NULL),
(645, 62, '2012-06-18 11:33:19', '0000-00-00 00:00:00', '127.0.0.1', '/ph/room/reserveroom/room.php', NULL),
(646, 62, '2012-06-18 11:40:09', '0000-00-00 00:00:00', '127.0.0.1', '/ph/room/reserveroom/room.php', NULL),
(647, 62, '2012-06-18 11:40:41', '0000-00-00 00:00:00', '127.0.0.1', '/ph/room/reserveroom/room.php', NULL),
(648, 62, '2012-06-18 11:40:43', '0000-00-00 00:00:00', '127.0.0.1', '/ph/room/reserveroom/home.php', NULL),
(649, 62, '2012-06-18 11:57:25', '0000-00-00 00:00:00', '127.0.0.1', '/ph/room/reserveroom/home.php', NULL),
(650, 62, '2012-06-18 11:57:37', '0000-00-00 00:00:00', '127.0.0.1', '/ph/room/reserveroom/home.php', NULL),
(651, 62, '2012-06-18 11:57:42', '0000-00-00 00:00:00', '127.0.0.1', '/ph/room/reserveroom/home.php', NULL),
(652, 62, '2012-06-18 11:57:54', '0000-00-00 00:00:00', '127.0.0.1', '/ph/room/reserveroom/org.php', NULL),
(653, 62, '2012-06-18 11:57:59', '0000-00-00 00:00:00', '127.0.0.1', '/ph/room/reserveroom/user.php', NULL),
(654, 62, '2012-06-18 12:07:34', '0000-00-00 00:00:00', '127.0.0.1', '/ph/room/reserveroom/user.php', NULL),
(655, 62, '2012-06-18 12:08:11', '0000-00-00 00:00:00', '127.0.0.1', '/ph/room/reserveroom/user.php', NULL),
(656, 62, '2012-06-18 12:09:47', '0000-00-00 00:00:00', '127.0.0.1', '/ph/room/reserveroom/user.php', NULL),
(657, 62, '2012-06-18 12:10:52', '0000-00-00 00:00:00', '127.0.0.1', '/ph/room/reserveroom/user.php?mode=add', NULL),
(658, 62, '2012-06-18 12:10:59', '0000-00-00 00:00:00', '127.0.0.1', '/ph/room/reserveroom/user.php', NULL),
(659, 62, '2012-06-18 12:11:01', '0000-00-00 00:00:00', '127.0.0.1', '/ph/room/reserveroom/user.php?mode=add', NULL),
(660, 62, '2012-06-18 12:11:02', '0000-00-00 00:00:00', '127.0.0.1', '/ph/room/reserveroom/user.php', NULL),
(661, 62, '2012-06-18 14:19:50', '0000-00-00 00:00:00', '127.0.0.1', '/ph/room/reserveroom/user.php', NULL),
(662, 62, '2012-06-18 14:22:49', '0000-00-00 00:00:00', '127.0.0.1', '/ph/room/reserveroom/home.php', NULL),
(663, 62, '2012-06-18 14:22:51', '0000-00-00 00:00:00', '127.0.0.1', '/ph/room/reserveroom/formbooking.php', NULL),
(664, 62, '2012-06-18 14:25:20', '0000-00-00 00:00:00', '127.0.0.1', '/ph/room/reserveroom/formbooking.php', NULL),
(665, 62, '2012-06-18 14:26:13', '0000-00-00 00:00:00', '127.0.0.1', '/ph/room/reserveroom/formbooking.php', NULL),
(666, 62, '2012-06-18 14:26:50', '0000-00-00 00:00:00', '127.0.0.1', '/ph/room/reserveroom/formbooking.php', NULL),
(667, 62, '2012-06-18 14:27:15', '0000-00-00 00:00:00', '127.0.0.1', '/ph/room/reserveroom/formbooking.php', NULL),
(668, 62, '2012-06-18 14:28:24', '0000-00-00 00:00:00', '127.0.0.1', '/ph/room/reserveroom/formbooking.php', NULL),
(669, 62, '2012-06-18 14:28:44', '0000-00-00 00:00:00', '127.0.0.1', '/ph/room/reserveroom/formbooking.php', NULL),
(670, 62, '2012-06-18 14:29:07', '0000-00-00 00:00:00', '127.0.0.1', '/ph/room/reserveroom/formbooking.php', NULL),
(671, 62, '2012-06-18 14:29:25', '0000-00-00 00:00:00', '127.0.0.1', '/ph/room/reserveroom/formbooking.php', NULL),
(672, 62, '2012-06-18 14:30:20', '0000-00-00 00:00:00', '127.0.0.1', '/ph/room/reserveroom/formbooking.php', NULL),
(673, 62, '2012-06-18 14:31:46', '0000-00-00 00:00:00', '127.0.0.1', '/ph/room/reserveroom/formbooking.php', NULL),
(674, 62, '2012-06-18 14:31:52', '0000-00-00 00:00:00', '127.0.0.1', '/ph/room/reserveroom/formbooking.php', NULL),
(675, 62, '2012-06-18 14:32:50', '0000-00-00 00:00:00', '127.0.0.1', '/ph/room/reserveroom/room.php', NULL),
(676, 62, '2012-06-18 14:53:01', '0000-00-00 00:00:00', '127.0.0.1', '/ph/room/reserveroom/room.php', NULL),
(677, 62, '2012-06-18 14:53:20', '0000-00-00 00:00:00', '127.0.0.1', '/ph/room/reserveroom/room.php', NULL),
(678, 62, '2012-06-18 14:53:51', '0000-00-00 00:00:00', '127.0.0.1', '/ph/room/reserveroom/room.php', NULL),
(679, 62, '2012-06-18 14:54:02', '0000-00-00 00:00:00', '127.0.0.1', '/ph/room/reserveroom/room.php', NULL),
(680, 62, '2012-06-18 14:58:32', '0000-00-00 00:00:00', '127.0.0.1', '/ph/room/reserveroom/room.php', NULL),
(681, 62, '2012-06-18 14:59:20', '0000-00-00 00:00:00', '127.0.0.1', '/ph/room/reserveroom/room.php?mode=add', NULL),
(682, 62, '2012-06-18 15:00:05', '0000-00-00 00:00:00', '127.0.0.1', '/ph/room/reserveroom/room.php', NULL),
(683, 62, '2012-06-18 15:16:28', '0000-00-00 00:00:00', '127.0.0.1', '/ph/room/reserveroom/room.php', NULL),
(684, 62, '2012-06-18 15:47:51', '0000-00-00 00:00:00', '127.0.0.1', '/ph/room/reserveroom/home.php', NULL),
(685, 62, '2012-06-18 16:00:11', '0000-00-00 00:00:00', '127.0.0.1', '/ph/room/reserveroom/home.php', NULL),
(686, 62, '2012-06-18 16:00:14', '0000-00-00 00:00:00', '127.0.0.1', '/ph/room/reserveroom/media.php', NULL),
(687, 62, '2012-06-18 16:00:30', '0000-00-00 00:00:00', '127.0.0.1', '/ph/room/reserveroom/formbooking.php', NULL),
(688, 62, '2012-06-18 16:00:35', '0000-00-00 00:00:00', '127.0.0.1', '/ph/room/reserveroom/media.php', NULL),
(689, 62, '2012-06-18 16:01:08', '0000-00-00 00:00:00', '127.0.0.1', '/ph/room/reserveroom/media.php', NULL),
(690, 62, '2012-06-18 16:01:11', '0000-00-00 00:00:00', '127.0.0.1', '/ph/room/reserveroom/media.php', NULL),
(691, 62, '2012-06-18 16:04:28', '0000-00-00 00:00:00', '127.0.0.1', '/ph/room/reserveroom/room.php', NULL),
(692, 62, '2012-06-18 16:17:28', '0000-00-00 00:00:00', '127.0.0.1', NULL, NULL),
(693, 62, '2012-06-18 16:17:28', '0000-00-00 00:00:00', '127.0.0.1', '/room/home.php', NULL),
(694, 62, '2012-06-18 16:17:42', '0000-00-00 00:00:00', '127.0.0.1', '/room/home.php', NULL),
(695, 62, '2012-06-19 09:45:33', '0000-00-00 00:00:00', '127.0.0.1', NULL, NULL),
(696, 62, '2012-06-19 09:45:33', '0000-00-00 00:00:00', '127.0.0.1', '/room/home.php', NULL),
(697, 62, '2012-06-19 09:45:37', '0000-00-00 00:00:00', '127.0.0.1', '/room/user.php', NULL),
(698, 62, '2012-06-19 09:51:44', '0000-00-00 00:00:00', '127.0.0.1', '/room/home.php', NULL),
(699, 62, '2012-06-19 09:55:25', '0000-00-00 00:00:00', '127.0.0.1', '/room/home.php', NULL),
(700, 62, '2012-06-19 09:56:33', '0000-00-00 00:00:00', '127.0.0.1', '/room/home.php', NULL),
(701, 62, '2012-06-19 09:56:48', '0000-00-00 00:00:00', '127.0.0.1', '/room/home.php', NULL),
(702, 62, '2012-06-19 09:57:24', '0000-00-00 00:00:00', '127.0.0.1', '/room/home.php', NULL),
(703, 62, '2012-06-19 09:57:25', '0000-00-00 00:00:00', '127.0.0.1', '/room/formbooking.php', NULL),
(704, 62, '2012-06-19 09:57:28', '0000-00-00 00:00:00', '127.0.0.1', '/room/home.php', NULL),
(705, 62, '2012-06-19 09:57:32', '0000-00-00 00:00:00', '127.0.0.1', '/room/formbooking.php', NULL),
(706, 62, '2012-06-19 09:57:33', '0000-00-00 00:00:00', '127.0.0.1', '/room/home.php', NULL),
(707, 62, '2012-06-19 09:59:02', '0000-00-00 00:00:00', '127.0.0.1', '/room/home.php', NULL),
(708, 62, '2012-06-19 10:27:08', '0000-00-00 00:00:00', '127.0.0.1', '/room/home.php', NULL),
(709, 62, '2012-06-19 10:34:39', '0000-00-00 00:00:00', '127.0.0.1', '/room/home.php', NULL),
(710, 62, '2012-06-19 10:34:41', '0000-00-00 00:00:00', '127.0.0.1', '/room/room_cate.php', NULL),
(711, 62, '2012-06-19 10:35:27', '0000-00-00 00:00:00', '127.0.0.1', '/room/room_cate.php', NULL),
(712, 62, '2012-06-19 10:35:57', '0000-00-00 00:00:00', '127.0.0.1', '/room/room_cate.php', NULL),
(713, 62, '2012-06-19 10:36:24', '0000-00-00 00:00:00', '127.0.0.1', '/room/room_cate.php', NULL),
(714, 62, '2012-06-19 10:37:05', '0000-00-00 00:00:00', '127.0.0.1', '/room/room_cate.php', NULL),
(715, 62, '2012-06-19 10:37:35', '0000-00-00 00:00:00', '127.0.0.1', '/room/room_cate.php', NULL),
(716, 62, '2012-06-19 10:38:55', '0000-00-00 00:00:00', '127.0.0.1', '/room/room_cate.php', NULL),
(717, 62, '2012-06-19 10:39:11', '0000-00-00 00:00:00', '127.0.0.1', '/room/room_cate.php', NULL),
(718, 62, '2012-06-19 10:39:12', '0000-00-00 00:00:00', '127.0.0.1', '/room/room_cate.php?keyId=1', NULL),
(719, 62, '2012-06-19 10:39:24', '0000-00-00 00:00:00', '127.0.0.1', '/room/room_cate.php?keyId=1', NULL),
(720, 62, '2012-06-19 10:39:57', '0000-00-00 00:00:00', '127.0.0.1', '/room/room_cate.php?keyId=1', NULL),
(721, 62, '2012-06-19 10:40:44', '0000-00-00 00:00:00', '127.0.0.1', '/room/room_cate.php?keyId=1', NULL),
(722, 62, '2012-06-19 10:42:30', '0000-00-00 00:00:00', '127.0.0.1', '/room/room_cate.php?keyId=1', NULL),
(723, 62, '2012-06-19 10:46:43', '0000-00-00 00:00:00', '127.0.0.1', '/room/room_cate.php?keyId=1', NULL),
(724, 62, '2012-06-19 10:46:56', '0000-00-00 00:00:00', '127.0.0.1', '/room/room_cate.php', NULL),
(725, 62, '2012-06-19 10:47:03', '0000-00-00 00:00:00', '127.0.0.1', '/room/room_cate.php', NULL),
(726, 62, '2012-06-19 10:48:30', '0000-00-00 00:00:00', '127.0.0.1', '/room/room_cate.php', NULL),
(727, 62, '2012-06-19 10:49:06', '0000-00-00 00:00:00', '127.0.0.1', '/room/room_cate.php', NULL),
(728, 62, '2012-06-19 10:49:21', '0000-00-00 00:00:00', '127.0.0.1', '/room/room_cate.php', NULL),
(729, 62, '2012-06-19 10:49:58', '0000-00-00 00:00:00', '127.0.0.1', '/room/room_cate.php', NULL),
(730, 62, '2012-06-19 10:50:05', '0000-00-00 00:00:00', '127.0.0.1', '/room/room_cate.php?keyId=2', NULL),
(731, 62, '2012-06-19 10:50:06', '0000-00-00 00:00:00', '127.0.0.1', '/room/room_cate.php?keyId=1', NULL),
(732, 62, '2012-06-19 10:50:10', '0000-00-00 00:00:00', '127.0.0.1', '/room/room_cate.php', NULL),
(733, 62, '2012-06-19 10:51:11', '0000-00-00 00:00:00', '127.0.0.1', '/room/room_cate.php', NULL),
(734, 62, '2012-06-19 10:52:27', '0000-00-00 00:00:00', '127.0.0.1', '/room/room_cate.php', NULL),
(735, 62, '2012-06-19 10:52:32', '0000-00-00 00:00:00', '127.0.0.1', '/room/room_cate.php', NULL),
(736, 62, '2012-06-19 10:52:37', '0000-00-00 00:00:00', '127.0.0.1', '/room/room_cate.php?keyId=5518943&action=%27del%27', NULL),
(737, 62, '2012-06-19 10:53:24', '0000-00-00 00:00:00', '127.0.0.1', '/room/room_cate.php', NULL),
(738, 62, '2012-06-19 10:53:27', '0000-00-00 00:00:00', '127.0.0.1', '/room/room_cate.php?keyId=5518943&action=del', NULL),
(739, 62, '2012-06-19 10:55:43', '0000-00-00 00:00:00', '127.0.0.1', '/room/room_cate.php?keyId=5518943&action=del', NULL),
(740, 62, '2012-06-19 10:55:53', '0000-00-00 00:00:00', '127.0.0.1', '/room/room_cate.php?keyId=5518943&action=del', NULL),
(741, 62, '2012-06-19 10:57:01', '0000-00-00 00:00:00', '127.0.0.1', '/room/room_cate.php?keyId=5518943&action=del', NULL),
(742, 62, '2012-06-19 10:57:13', '0000-00-00 00:00:00', '127.0.0.1', '/room/room_cate.php?keyId=5518943&action=del', NULL),
(743, 62, '2012-06-19 10:58:47', '0000-00-00 00:00:00', '127.0.0.1', '/room/room_cate.php', NULL),
(744, 62, '2012-06-19 10:58:55', '0000-00-00 00:00:00', '127.0.0.1', '/room/room.php?mode=add', NULL),
(745, 62, '2012-06-19 10:59:01', '0000-00-00 00:00:00', '127.0.0.1', '/room/room_cate.php', NULL),
(746, 62, '2012-06-19 11:06:06', '0000-00-00 00:00:00', '127.0.0.1', '/room/room_cate.php', NULL),
(747, 62, '2012-06-19 11:08:21', '0000-00-00 00:00:00', '127.0.0.1', '/room/room_cate.php', NULL),
(748, 62, '2012-06-19 11:09:11', '0000-00-00 00:00:00', '127.0.0.1', '/room/room_cate.php', NULL),
(749, 62, '2012-06-19 11:09:19', '0000-00-00 00:00:00', '127.0.0.1', '/room/room_cate.php', NULL),
(750, 62, '2012-06-19 11:09:22', '0000-00-00 00:00:00', '127.0.0.1', '/room/room_cate.php?keyId=5550323', NULL),
(751, 62, '2012-06-19 11:09:26', '0000-00-00 00:00:00', '127.0.0.1', '/room/room_cate.php', NULL),
(752, 62, '2012-06-19 11:09:30', '0000-00-00 00:00:00', '127.0.0.1', '/room/room_cate.php', NULL),
(753, 62, '2012-06-19 11:21:26', '0000-00-00 00:00:00', '127.0.0.1', '/room/room_cate.php?keyId=2', NULL),
(754, 62, '2012-06-19 11:21:28', '0000-00-00 00:00:00', '127.0.0.1', '/room/room_cate.php?keyId=1', NULL),
(755, 62, '2012-06-19 11:21:51', '0000-00-00 00:00:00', '127.0.0.1', '/room/room_cate.php?keyId=1', NULL),
(756, 62, '2012-06-19 11:21:53', '0000-00-00 00:00:00', '127.0.0.1', '/room/room_cate.php', NULL),
(757, 62, '2012-06-19 11:23:38', '0000-00-00 00:00:00', '127.0.0.1', '/room/room_cate.php', NULL),
(758, 62, '2012-06-19 11:24:05', '0000-00-00 00:00:00', '127.0.0.1', NULL, NULL),
(759, 62, '2012-06-19 11:24:05', '0000-00-00 00:00:00', '127.0.0.1', '/room/home.php', NULL),
(760, 62, '2012-06-19 11:24:54', '0000-00-00 00:00:00', '127.0.0.1', NULL, NULL),
(761, 62, '2012-06-19 11:24:54', '0000-00-00 00:00:00', '127.0.0.1', '/room/home.php', NULL),
(762, 62, '2012-06-19 11:25:44', '0000-00-00 00:00:00', '127.0.0.1', NULL, NULL),
(763, 62, '2012-06-19 11:25:44', '0000-00-00 00:00:00', '127.0.0.1', '/room/home.php', NULL),
(764, 62, '2012-06-19 11:25:48', '0000-00-00 00:00:00', '127.0.0.1', '/room/formbooking.php', NULL),
(765, 62, '2012-06-19 11:26:19', '0000-00-00 00:00:00', '127.0.0.1', '/room/room_cate.php', NULL),
(766, 62, '2012-06-19 11:28:01', '0000-00-00 00:00:00', '127.0.0.1', '/room/room_cate.php', NULL),
(767, 62, '2012-06-19 11:28:14', '0000-00-00 00:00:00', '127.0.0.1', '/room/room_cate.php', NULL),
(768, 62, '2012-06-19 11:28:57', '0000-00-00 00:00:00', '127.0.0.1', '/room/room_cate.php', NULL),
(769, 62, '2012-06-19 11:28:59', '0000-00-00 00:00:00', '127.0.0.1', '/room/room_cate.php', NULL),
(770, 62, '2012-06-19 11:29:02', '0000-00-00 00:00:00', '127.0.0.1', '/room/room_cate.php', NULL),
(771, 62, '2012-06-19 11:29:05', '0000-00-00 00:00:00', '127.0.0.1', '/room/room_cate.php?keyId=2', NULL),
(772, 62, '2012-06-19 11:29:06', '0000-00-00 00:00:00', '127.0.0.1', '/room/room_cate.php', NULL),
(773, 62, '2012-06-19 11:29:08', '0000-00-00 00:00:00', '127.0.0.1', '/room/room_cate.php', NULL),
(774, 62, '2012-06-19 11:30:02', '0000-00-00 00:00:00', '127.0.0.1', '/room/room_cate.php', NULL),
(775, 62, '2012-06-19 11:31:11', '0000-00-00 00:00:00', '127.0.0.1', '/room/home.php', NULL),
(776, 62, '2012-06-19 11:31:12', '0000-00-00 00:00:00', '127.0.0.1', '/room/formbooking.php', NULL),
(777, 62, '2012-06-19 11:31:18', '0000-00-00 00:00:00', '127.0.0.1', '/room/room.php', NULL),
(778, 62, '2012-06-19 11:31:19', '0000-00-00 00:00:00', '127.0.0.1', '/room/room.php?mode=add', NULL),
(779, 62, '2012-06-19 11:31:29', '0000-00-00 00:00:00', '127.0.0.1', '/room/home.php', NULL),
(780, 62, '2012-06-19 11:31:34', '0000-00-00 00:00:00', '127.0.0.1', '/room/room_cate.php', NULL),
(781, 62, '2012-06-19 11:33:49', '0000-00-00 00:00:00', '127.0.0.1', '/room/room_cate.php', NULL),
(782, 62, '2012-06-19 11:34:43', '0000-00-00 00:00:00', '127.0.0.1', '/room/room.php', NULL),
(783, 62, '2012-06-19 11:36:19', '0000-00-00 00:00:00', '127.0.0.1', '/room/room.php', NULL),
(784, 62, '2012-06-19 11:36:38', '0000-00-00 00:00:00', '127.0.0.1', '/room/room.php', NULL),
(785, 62, '2012-06-19 11:37:12', '0000-00-00 00:00:00', '127.0.0.1', '/room/room.php?key_cid=41&mode=add', NULL),
(786, 62, '2012-06-19 11:37:16', '0000-00-00 00:00:00', '127.0.0.1', '/room/room.php', NULL),
(787, 62, '2012-06-19 11:39:09', '0000-00-00 00:00:00', '127.0.0.1', '/room/room.php', NULL),
(788, 62, '2012-06-19 11:39:11', '0000-00-00 00:00:00', '127.0.0.1', '/room/room.php?key_cid=41', NULL),
(789, 62, '2012-06-19 11:39:16', '0000-00-00 00:00:00', '127.0.0.1', '/room/room.php?mode=add', NULL),
(790, 62, '2012-06-19 11:39:17', '0000-00-00 00:00:00', '127.0.0.1', '/room/room.php', NULL),
(791, 62, '2012-06-19 11:40:16', '0000-00-00 00:00:00', '127.0.0.1', '/room/room.php', NULL),
(792, 62, '2012-06-19 11:40:17', '0000-00-00 00:00:00', '127.0.0.1', '/room/room.php?key_cid=41', NULL),
(793, 62, '2012-06-19 11:40:20', '0000-00-00 00:00:00', '127.0.0.1', '/room/room.php?mode=add', NULL),
(794, 62, '2012-06-19 11:41:29', '0000-00-00 00:00:00', '127.0.0.1', '/room/room.php?mode=add', NULL),
(795, 62, '2012-06-19 11:41:30', '0000-00-00 00:00:00', '127.0.0.1', '/room/room.php?key_cid=41', NULL),
(796, 62, '2012-06-19 11:43:16', '0000-00-00 00:00:00', '127.0.0.1', '/room/room.php?key_cid=41', NULL),
(797, 62, '2012-06-19 11:44:53', '0000-00-00 00:00:00', '127.0.0.1', '/room/room.php?key_cid=41', NULL),
(798, 62, '2012-06-19 11:44:58', '0000-00-00 00:00:00', '127.0.0.1', '/room/room.php', NULL),
(799, 62, '2012-06-19 11:45:02', '0000-00-00 00:00:00', '127.0.0.1', '/room/room.php?key_cid=1', NULL),
(800, 62, '2012-06-19 11:46:28', '0000-00-00 00:00:00', '127.0.0.1', '/room/room.php', NULL),
(801, 62, '2012-06-19 11:46:30', '0000-00-00 00:00:00', '127.0.0.1', '/room/room.php?key_cid=41', NULL),
(802, 62, '2012-06-19 11:46:34', '0000-00-00 00:00:00', '127.0.0.1', '/room/room.php?key_cid=38', NULL),
(803, 62, '2012-06-19 11:46:37', '0000-00-00 00:00:00', '127.0.0.1', '/room/room.php?key_cid=1', NULL),
(804, 62, '2012-06-19 11:46:49', '0000-00-00 00:00:00', '127.0.0.1', '/room/room.php?mode=add', NULL),
(805, 62, '2012-06-19 11:46:55', '0000-00-00 00:00:00', '127.0.0.1', '/room/room.php?key_cid=41', NULL),
(806, 62, '2012-06-19 11:48:01', '0000-00-00 00:00:00', '127.0.0.1', '/room/room.php?key_cid=2', NULL),
(807, 62, '2012-06-19 11:49:11', '0000-00-00 00:00:00', '127.0.0.1', '/room/room.php?key_cid=2', NULL),
(808, 62, '2012-06-19 11:49:35', '0000-00-00 00:00:00', '127.0.0.1', '/room/room.php?key_cid=2', NULL),
(809, 62, '2012-06-19 11:49:38', '0000-00-00 00:00:00', '127.0.0.1', '/room/room.php?mode=add', NULL),
(810, 62, '2012-06-19 11:50:31', '0000-00-00 00:00:00', '127.0.0.1', '/room/room.php?key_cid=41', NULL),
(811, 62, '2012-06-19 11:50:31', '0000-00-00 00:00:00', '127.0.0.1', '/room/room.php?key_cid=41', NULL),
(812, 62, '2012-06-19 11:51:30', '0000-00-00 00:00:00', '127.0.0.1', '/room/room.php?mode=add', NULL),
(813, 62, '2012-06-19 11:52:29', '0000-00-00 00:00:00', '127.0.0.1', '/room/room.php?mode=add', NULL),
(814, 62, '2012-06-19 11:52:54', '0000-00-00 00:00:00', '127.0.0.1', '/room/room.php?mode=add', NULL),
(815, 62, '2012-06-19 11:53:33', '0000-00-00 00:00:00', '127.0.0.1', '/room/room.php?mode=add', NULL),
(816, 62, '2012-06-19 11:53:35', '0000-00-00 00:00:00', '127.0.0.1', '/room/room.php', NULL),
(817, 62, '2012-06-19 11:57:56', '0000-00-00 00:00:00', '127.0.0.1', '/room/room.php', NULL),
(818, 62, '2012-06-19 12:03:39', '0000-00-00 00:00:00', '127.0.0.1', '/room/room.php', NULL),
(819, 62, '2012-06-19 12:03:41', '0000-00-00 00:00:00', '127.0.0.1', '/room/media.php', NULL),
(820, 62, '2012-06-19 12:03:43', '0000-00-00 00:00:00', '127.0.0.1', '/room/media.php?media_id=6&mode=add', NULL),
(821, 62, '2012-06-19 12:03:45', '0000-00-00 00:00:00', '127.0.0.1', '/room/media.php?media_id=5&mode=add', NULL),
(822, 62, '2012-06-19 12:03:50', '0000-00-00 00:00:00', '127.0.0.1', '/room/media.php', NULL),
(823, 62, '2012-06-19 12:05:03', '0000-00-00 00:00:00', '127.0.0.1', '/room/media.php', NULL),
(824, 62, '2012-06-19 12:07:00', '0000-00-00 00:00:00', '127.0.0.1', '/room/room.php', NULL),
(825, 62, '2012-06-19 12:07:02', '0000-00-00 00:00:00', '127.0.0.1', '/room/room.php', NULL),
(826, 62, '2012-06-19 12:07:08', '0000-00-00 00:00:00', '127.0.0.1', '/room/media.php', NULL),
(827, 62, '2012-06-19 12:07:59', '0000-00-00 00:00:00', '127.0.0.1', '/room/room.php', NULL),
(828, 62, '2012-06-19 12:08:56', '0000-00-00 00:00:00', '127.0.0.1', '/room/room_cate.php', NULL),
(829, 62, '2012-06-19 12:10:12', '0000-00-00 00:00:00', '127.0.0.1', '/room/room_cate.php', NULL),
(830, 62, '2012-06-19 12:10:37', '0000-00-00 00:00:00', '127.0.0.1', '/room/room_cate.php', NULL),
(831, 62, '2012-06-19 12:10:49', '0000-00-00 00:00:00', '127.0.0.1', '/room/room_cate.php', NULL),
(832, 62, '2012-06-19 12:11:17', '0000-00-00 00:00:00', '127.0.0.1', '/room/room.php', NULL),
(833, 62, '2012-06-19 12:11:19', '0000-00-00 00:00:00', '127.0.0.1', '/room/media.php', NULL),
(834, 62, '2012-06-19 12:11:21', '0000-00-00 00:00:00', '127.0.0.1', '/room/media.php', NULL),
(835, 62, '2012-06-19 12:12:19', '0000-00-00 00:00:00', '127.0.0.1', '/room/media.php', NULL),
(836, 62, '2012-06-19 12:12:39', '0000-00-00 00:00:00', '127.0.0.1', '/room/org.php', NULL),
(837, 62, '2012-06-19 12:12:55', '0000-00-00 00:00:00', '127.0.0.1', '/room/room_cate.php', NULL),
(838, 62, '2012-06-19 12:14:44', '0000-00-00 00:00:00', '127.0.0.1', '/room/home.php', NULL),
(839, 62, '2012-06-19 12:24:08', '0000-00-00 00:00:00', '127.0.0.1', NULL, NULL),
(840, 62, '2012-06-19 12:24:08', '0000-00-00 00:00:00', '127.0.0.1', '/room/home.php', NULL),
(841, 62, '2012-06-19 12:24:12', '0000-00-00 00:00:00', '127.0.0.1', '/room/room_cate.php', NULL),
(842, 62, '2012-06-19 12:24:14', '0000-00-00 00:00:00', '127.0.0.1', '/room/room.php', NULL),
(843, 62, '2012-06-19 12:24:16', '0000-00-00 00:00:00', '127.0.0.1', '/room/media.php', NULL),
(844, 62, '2012-06-19 12:24:19', '0000-00-00 00:00:00', '127.0.0.1', '/room/org.php', NULL),
(845, 62, '2012-06-19 12:24:22', '0000-00-00 00:00:00', '127.0.0.1', '/room/user.php', NULL),
(846, 62, '2012-06-19 12:24:29', '0000-00-00 00:00:00', '127.0.0.1', '/room/room.php', NULL),
(847, 62, '2012-06-19 13:31:14', '0000-00-00 00:00:00', '127.0.0.1', '/room/room.php', NULL),
(848, 62, '2012-06-19 13:31:16', '0000-00-00 00:00:00', '127.0.0.1', '/room/food.php', NULL),
(849, 62, '2012-06-19 13:32:40', '0000-00-00 00:00:00', '127.0.0.1', '/room/food.php', NULL),
(850, 62, '2012-06-19 13:33:14', '0000-00-00 00:00:00', '127.0.0.1', '/room/food.php', NULL),
(851, 62, '2012-06-19 13:33:56', '0000-00-00 00:00:00', '127.0.0.1', '/room/food.php', NULL),
(852, 62, '2012-06-19 13:35:02', '0000-00-00 00:00:00', '127.0.0.1', '/room/food.php', NULL),
(853, 62, '2012-06-19 13:35:13', '0000-00-00 00:00:00', '127.0.0.1', '/room/food.php', NULL),
(854, 62, '2012-06-19 13:35:46', '0000-00-00 00:00:00', '127.0.0.1', '/room/food.php', NULL),
(855, 62, '2012-06-19 13:36:20', '0000-00-00 00:00:00', '127.0.0.1', '/room/food.php', NULL),
(856, 62, '2012-06-19 13:36:40', '0000-00-00 00:00:00', '127.0.0.1', '/room/food.php', NULL),
(857, 62, '2012-06-19 13:37:11', '0000-00-00 00:00:00', '127.0.0.1', '/room/food.php', NULL),
(858, 62, '2012-06-19 13:37:40', '0000-00-00 00:00:00', '127.0.0.1', '/room/food.php', NULL),
(859, 62, '2012-06-19 13:38:01', '0000-00-00 00:00:00', '127.0.0.1', '/room/food.php', NULL),
(860, 62, '2012-06-19 13:38:09', '0000-00-00 00:00:00', '127.0.0.1', '/room/food.php', NULL),
(861, 62, '2012-06-19 13:38:27', '0000-00-00 00:00:00', '127.0.0.1', '/room/food.php', NULL),
(862, 62, '2012-06-19 13:39:02', '0000-00-00 00:00:00', '127.0.0.1', '/room/food.php', NULL),
(863, 62, '2012-06-19 13:44:40', '0000-00-00 00:00:00', '127.0.0.1', '/room/food.php', NULL),
(864, 62, '2012-06-19 13:44:42', '0000-00-00 00:00:00', '127.0.0.1', '/room/food.php?food_id=5&mode=add', NULL),
(865, 62, '2012-06-19 13:44:44', '0000-00-00 00:00:00', '127.0.0.1', '/room/food.php?food_id=3&mode=add', NULL),
(866, 62, '2012-06-19 13:45:38', '0000-00-00 00:00:00', '127.0.0.1', '/room/food.php?food_id=3&mode=add', NULL),
(867, 62, '2012-06-19 13:45:44', '0000-00-00 00:00:00', '127.0.0.1', '/room/food.php?food_id=1&mode=add', NULL),
(868, 62, '2012-06-19 13:45:45', '0000-00-00 00:00:00', '127.0.0.1', '/room/food.php?food_id=3&mode=add', NULL),
(869, 62, '2012-06-19 13:45:46', '0000-00-00 00:00:00', '127.0.0.1', '/room/food.php?food_id=4&mode=add', NULL),
(870, 62, '2012-06-19 13:45:47', '0000-00-00 00:00:00', '127.0.0.1', '/room/food.php?food_id=5&mode=add', NULL),
(871, 62, '2012-06-19 13:47:24', '0000-00-00 00:00:00', '127.0.0.1', '/room/food.php?food_id=5&mode=add', NULL),
(872, 62, '2012-06-19 13:48:20', '0000-00-00 00:00:00', '127.0.0.1', '/room/food.php', NULL),
(873, 62, '2012-06-19 13:49:09', '0000-00-00 00:00:00', '127.0.0.1', '/room/food.php', NULL),
(874, 62, '2012-06-19 13:49:31', '0000-00-00 00:00:00', '127.0.0.1', '/room/food.php?food_id=5&mode=add', NULL),
(875, 62, '2012-06-19 13:49:35', '0000-00-00 00:00:00', '127.0.0.1', '/room/food.php', NULL),
(876, 62, '2012-06-19 13:49:38', '0000-00-00 00:00:00', '127.0.0.1', '/room/food.php', NULL),
(877, 62, '2012-06-19 13:50:11', '0000-00-00 00:00:00', '127.0.0.1', '/room/food.php', NULL),
(878, 62, '2012-06-19 13:50:12', '0000-00-00 00:00:00', '127.0.0.1', '/room/food.php?food_id=5&mode=add', NULL),
(879, 62, '2012-06-19 13:50:15', '0000-00-00 00:00:00', '127.0.0.1', '/room/food.php', NULL),
(880, 62, '2012-06-19 14:25:41', '0000-00-00 00:00:00', '127.0.0.1', '/room/food.php', NULL),
(881, 62, '2012-06-19 14:25:47', '0000-00-00 00:00:00', '127.0.0.1', '/room/food.php?food_id=5&mode=add', NULL),
(882, 62, '2012-06-19 14:25:51', '0000-00-00 00:00:00', '127.0.0.1', '/room/bookingroom/food.php', NULL),
(883, 62, '2012-06-19 14:25:51', '0000-00-00 00:00:00', '127.0.0.1', '/room/food.php', NULL),
(884, 62, '2012-06-19 14:26:45', '0000-00-00 00:00:00', '127.0.0.1', '/room/food.php?food_id=4&mode=add', NULL),
(885, 62, '2012-06-19 14:26:48', '0000-00-00 00:00:00', '127.0.0.1', '/room/bookingroom/food.php', NULL),
(886, 62, '2012-06-19 14:26:48', '0000-00-00 00:00:00', '127.0.0.1', '/room/food.php', NULL),
(887, 62, '2012-06-19 14:29:00', '0000-00-00 00:00:00', '127.0.0.1', '/room/food.php?food_id=4&mode=add', NULL),
(888, 62, '2012-06-19 14:29:03', '0000-00-00 00:00:00', '127.0.0.1', '/room/bookingroom/food.php', NULL),
(889, 62, '2012-06-19 14:29:03', '0000-00-00 00:00:00', '127.0.0.1', '/room/food.php', NULL),
(890, 62, '2012-06-19 14:29:17', '0000-00-00 00:00:00', '127.0.0.1', '/room/bookingroom/food.php', NULL),
(891, 62, '2012-06-19 14:29:17', '0000-00-00 00:00:00', '127.0.0.1', '/room/food.php', NULL),
(892, 62, '2012-06-19 14:29:41', '0000-00-00 00:00:00', '127.0.0.1', '/room/bookingroom/food.php?food_id=5590187&action=del', NULL),
(893, 62, '2012-06-19 14:30:23', '0000-00-00 00:00:00', '127.0.0.1', '/room/bookingroom/food.php?food_id=5590187&action=del', NULL),
(894, 62, '2012-06-19 14:30:23', '0000-00-00 00:00:00', '127.0.0.1', '/room/food.php', NULL),
(895, 62, '2012-06-19 14:30:40', '0000-00-00 00:00:00', '127.0.0.1', '/room/bookingroom/food.php', NULL),
(896, 62, '2012-06-19 14:30:40', '0000-00-00 00:00:00', '127.0.0.1', '/room/food.php', NULL),
(897, 62, '2012-06-19 14:30:44', '0000-00-00 00:00:00', '127.0.0.1', '/room/bookingroom/food.php?food_id=5543256&action=del', NULL),
(898, 62, '2012-06-19 14:30:44', '0000-00-00 00:00:00', '127.0.0.1', '/room/food.php', NULL),
(899, 62, '2012-06-19 14:58:10', '0000-00-00 00:00:00', '127.0.0.1', '/room/media.php', NULL),
(900, 62, '2012-06-19 14:58:23', '0000-00-00 00:00:00', '127.0.0.1', '/room/food.php', NULL),
(901, 62, '2012-06-19 14:58:28', '0000-00-00 00:00:00', '127.0.0.1', '/room/media.php', NULL),
(902, 62, '2012-06-19 14:59:19', '0000-00-00 00:00:00', '127.0.0.1', '/room/media.php', NULL),
(903, 62, '2012-06-19 14:59:35', '0000-00-00 00:00:00', '127.0.0.1', '/room/media.php', NULL),
(904, 62, '2012-06-19 15:00:15', '0000-00-00 00:00:00', '127.0.0.1', '/room/media.php', NULL),
(905, 62, '2012-06-19 15:00:23', '0000-00-00 00:00:00', '127.0.0.1', '/room/media.php', NULL),
(906, 62, '2012-06-19 15:04:15', '0000-00-00 00:00:00', '127.0.0.1', '/room/media.php', NULL),
(907, 62, '2012-06-19 15:10:30', '0000-00-00 00:00:00', '127.0.0.1', '/room/media.php?media_id=6&mode=add', NULL),
(908, 62, '2012-06-19 15:10:32', '0000-00-00 00:00:00', '127.0.0.1', '/room/media.php?media_id=5&mode=add', NULL),
(909, 62, '2012-06-19 15:10:33', '0000-00-00 00:00:00', '127.0.0.1', '/room/media.php?media_id=4&mode=add', NULL),
(910, 62, '2012-06-19 15:10:34', '0000-00-00 00:00:00', '127.0.0.1', '/room/media.php?media_id=1&mode=add', NULL),
(911, 62, '2012-06-19 15:10:34', '0000-00-00 00:00:00', '127.0.0.1', '/room/media.php?media_id=2&mode=add', NULL),
(912, 62, '2012-06-19 15:10:44', '0000-00-00 00:00:00', '127.0.0.1', '/room/media.php', NULL),
(913, 62, '2012-06-19 15:11:48', '0000-00-00 00:00:00', '127.0.0.1', '/room/media.php', NULL),
(914, 62, '2012-06-19 15:11:50', '0000-00-00 00:00:00', '127.0.0.1', '/room/media.php?media_id=2&mode=add', NULL),
(915, 62, '2012-06-19 15:11:53', '0000-00-00 00:00:00', '127.0.0.1', '/room/bookingroom/media.php', NULL),
(916, 62, '2012-06-19 15:11:53', '0000-00-00 00:00:00', '127.0.0.1', '/room/media.php', NULL),
(917, 62, '2012-06-19 15:11:57', '0000-00-00 00:00:00', '127.0.0.1', '/room/media.php?media_id=2&mode=add', NULL),
(918, 62, '2012-06-19 15:11:59', '0000-00-00 00:00:00', '127.0.0.1', '/room/bookingroom/media.php', NULL),
(919, 62, '2012-06-19 15:11:59', '0000-00-00 00:00:00', '127.0.0.1', '/room/media.php', NULL),
(920, 62, '2012-06-19 15:12:11', '0000-00-00 00:00:00', '127.0.0.1', '/room/bookingroom/media.php', NULL),
(921, 62, '2012-06-19 15:12:11', '0000-00-00 00:00:00', '127.0.0.1', '/room/media.php', NULL),
(922, 62, '2012-06-19 15:35:59', '0000-00-00 00:00:00', '127.0.0.1', '/room/home.php', NULL),
(923, 62, '2012-06-19 15:36:04', '0000-00-00 00:00:00', '127.0.0.1', '/room/media.php', NULL),
(924, 62, '2012-06-19 15:36:17', '0000-00-00 00:00:00', '127.0.0.1', '/room/food.php', NULL),
(925, 62, '2012-06-19 15:37:02', '0000-00-00 00:00:00', '127.0.0.1', '/room/media.php', NULL),
(926, 62, '2012-06-19 15:37:05', '0000-00-00 00:00:00', '127.0.0.1', '/room/bookingroom/media.php?media_id=5574323&action=del', NULL),
(927, 62, '2012-06-19 15:37:05', '0000-00-00 00:00:00', '127.0.0.1', '/room/media.php', NULL),
(928, 62, '2012-06-19 15:48:14', '0000-00-00 00:00:00', '127.0.0.1', '/room/org.php', NULL),
(929, 62, '2012-06-19 16:05:37', '0000-00-00 00:00:00', '127.0.0.1', '/room/user.php', NULL),
(930, 62, '2012-06-19 16:05:39', '0000-00-00 00:00:00', '127.0.0.1', '/room/media.php', NULL),
(931, 62, '2012-06-19 16:51:24', '0000-00-00 00:00:00', '127.0.0.1', '/room/home.php', NULL),
(932, 62, '2012-06-19 16:57:49', '0000-00-00 00:00:00', '127.0.0.1', '/room/formbooking.php?mode=edit&keyuq_id=84', NULL),
(933, 62, '2012-06-19 16:58:00', '0000-00-00 00:00:00', '127.0.0.1', '/room/formbooking.php?mode=edit&keyuq_id=84', NULL),
(934, 62, '2012-06-19 17:10:15', '0000-00-00 00:00:00', '127.0.0.1', '/room/home.php', NULL),
(935, 62, '2012-06-19 17:10:22', '0000-00-00 00:00:00', '127.0.0.1', '/room/home.php?Y=2012&m=7&d=19', NULL),
(936, 62, '2012-06-19 17:10:30', '0000-00-00 00:00:00', '127.0.0.1', '/room/home.php', NULL),
(937, 62, '2012-06-19 17:10:31', '0000-00-00 00:00:00', '127.0.0.1', '/room/home.php?Y=2012&m=5&d=19', NULL),
(938, 62, '2012-06-19 17:10:32', '0000-00-00 00:00:00', '127.0.0.1', '/room/home.php?Y=2012&m=4&d=19', NULL),
(939, 62, '2012-06-19 17:10:32', '0000-00-00 00:00:00', '127.0.0.1', '/room/home.php?Y=2012&m=3&d=19', NULL),
(940, 62, '2012-06-19 17:10:33', '0000-00-00 00:00:00', '127.0.0.1', '/room/home.php?Y=2012&m=2&d=19', NULL),
(941, 62, '2012-06-19 17:10:34', '0000-00-00 00:00:00', '127.0.0.1', '/room/home.php?Y=2012&m=1&d=19', NULL),
(942, 62, '2012-06-19 17:24:59', '0000-00-00 00:00:00', '127.0.0.1', '/room/formbooking.php', NULL),
(943, 62, '2012-06-19 17:25:03', '0000-00-00 00:00:00', '127.0.0.1', '/room/home.php', NULL),
(944, 62, '2012-06-19 17:25:10', '0000-00-00 00:00:00', '127.0.0.1', '/room/user.php', NULL),
(945, 62, '2012-06-19 17:29:42', '0000-00-00 00:00:00', '127.0.0.1', '/room/user.php', NULL),
(946, 62, '2012-06-20 09:36:44', '0000-00-00 00:00:00', '127.0.0.1', NULL, NULL),
(947, 62, '2012-06-20 09:36:44', '0000-00-00 00:00:00', '127.0.0.1', '/room/home.php', NULL),
(948, 62, '2012-06-20 09:38:18', '0000-00-00 00:00:00', '127.0.0.1', '/room/room_cate.php', NULL),
(949, 62, '2012-06-20 09:38:21', '0000-00-00 00:00:00', '127.0.0.1', '/room/room_cate.php', NULL),
(950, 62, '2012-06-20 09:38:47', '0000-00-00 00:00:00', '127.0.0.1', '/room/room.php', NULL),
(951, 62, '2012-06-20 09:39:08', '0000-00-00 00:00:00', '127.0.0.1', '/room/room.php?key_cid=2', NULL),
(952, 62, '2012-06-20 09:39:14', '0000-00-00 00:00:00', '127.0.0.1', '/room/room.php', NULL),
(953, 62, '2012-06-20 09:50:59', '0000-00-00 00:00:00', '127.0.0.1', '/room/room.php', NULL),
(954, 62, '2012-06-20 09:51:27', '0000-00-00 00:00:00', '127.0.0.1', '/room/bookingroom/room/admin3-2.php', NULL),
(955, 62, '2012-06-20 09:51:27', '0000-00-00 00:00:00', '127.0.0.1', '/room/room.php', NULL),
(956, 62, '2012-06-20 09:52:22', '0000-00-00 00:00:00', '127.0.0.1', '/room/room.php', NULL),
(957, 62, '2012-06-20 09:52:38', '0000-00-00 00:00:00', '127.0.0.1', '/room/bookingroom/room/admin3-2.php', NULL),
(958, 62, '2012-06-20 09:52:38', '0000-00-00 00:00:00', '127.0.0.1', '/room/room.php', NULL),
(959, 62, '2012-06-20 09:53:47', '0000-00-00 00:00:00', '127.0.0.1', '/room/bookingroom/room/admin3-2.php?key_cid=5538503&action=del', NULL),
(960, 62, '2012-06-20 09:53:47', '0000-00-00 00:00:00', '127.0.0.1', '/room/room.php', NULL),
(961, 62, '2012-06-20 09:54:14', '0000-00-00 00:00:00', '127.0.0.1', '/room/bookingroom/room/admin3-2.php', NULL),
(962, 62, '2012-06-20 09:54:14', '0000-00-00 00:00:00', '127.0.0.1', '/room/room.php', NULL),
(963, 62, '2012-06-20 09:54:56', '0000-00-00 00:00:00', '127.0.0.1', '/room/room.php?key_cid=2', NULL),
(964, 62, '2012-06-20 09:55:09', '0000-00-00 00:00:00', '127.0.0.1', '/room/bookingroom/room/admin3-2.php', NULL),
(965, 62, '2012-06-20 09:55:09', '0000-00-00 00:00:00', '127.0.0.1', '/room/room.php', NULL),
(966, 62, '2012-06-20 09:55:26', '0000-00-00 00:00:00', '127.0.0.1', '/room/bookingroom/room/admin3-2.php?key_cid=5554121&action=del', NULL),
(967, 62, '2012-06-20 09:55:26', '0000-00-00 00:00:00', '127.0.0.1', '/room/room.php', NULL),
(968, 62, '2012-06-20 09:56:28', '0000-00-00 00:00:00', '127.0.0.1', '/room/room.php', NULL),
(969, 62, '2012-06-20 09:56:47', '0000-00-00 00:00:00', '127.0.0.1', '/room/room.php', NULL),
(970, 62, '2012-06-20 09:56:52', '0000-00-00 00:00:00', '127.0.0.1', '/room/room.php?key_cid=2', NULL),
(971, 62, '2012-06-20 09:56:55', '0000-00-00 00:00:00', '127.0.0.1', '/room/room.php', NULL),
(972, 62, '2012-06-20 09:57:00', '0000-00-00 00:00:00', '127.0.0.1', '/room/room.php?key_cid=1', NULL),
(973, 62, '2012-06-20 09:57:02', '0000-00-00 00:00:00', '127.0.0.1', '/room/room.php', NULL),
(974, 62, '2012-06-20 09:57:17', '0000-00-00 00:00:00', '127.0.0.1', '/room/room.php?key_cid=2', NULL),
(975, 62, '2012-06-20 09:57:25', '0000-00-00 00:00:00', '127.0.0.1', '/room/room_cate.php', NULL),
(976, 62, '2012-06-20 09:57:27', '0000-00-00 00:00:00', '127.0.0.1', '/room/room.php', NULL),
(977, 62, '2012-06-20 09:57:29', '0000-00-00 00:00:00', '127.0.0.1', '/room/food.php', NULL),
(978, 62, '2012-06-20 09:57:35', '0000-00-00 00:00:00', '127.0.0.1', '/room/food.php', NULL),
(979, 62, '2012-06-20 09:57:36', '0000-00-00 00:00:00', '127.0.0.1', '/room/room.php', NULL),
(980, 62, '2012-06-20 09:58:50', '0000-00-00 00:00:00', '127.0.0.1', '/room/media.php', NULL),
(981, 62, '2012-06-20 09:59:03', '0000-00-00 00:00:00', '127.0.0.1', '/room/media.php?media_id=2&mode=add', NULL),
(982, 62, '2012-06-20 09:59:08', '0000-00-00 00:00:00', '127.0.0.1', '/room/bookingroom/media.php', NULL),
(983, 62, '2012-06-20 09:59:08', '0000-00-00 00:00:00', '127.0.0.1', '/room/media.php', NULL);
INSERT INTO `user_log` (`ul_id`, `us_id`, `ul_in`, `ul_out`, `ul_ip`, `ul_url`, `class`) VALUES
(984, 62, '2012-06-20 09:59:20', '0000-00-00 00:00:00', '127.0.0.1', '/room/media.php?media_id=2&mode=add', NULL),
(985, 62, '2012-06-20 09:59:23', '0000-00-00 00:00:00', '127.0.0.1', '/room/bookingroom/media.php', NULL),
(986, 62, '2012-06-20 09:59:23', '0000-00-00 00:00:00', '127.0.0.1', '/room/media.php', NULL),
(987, 62, '2012-06-20 10:05:24', '0000-00-00 00:00:00', '127.0.0.1', '/room/org.php', NULL),
(988, 62, '2012-06-20 10:07:28', '0000-00-00 00:00:00', '127.0.0.1', '/room/org.php', NULL),
(989, 62, '2012-06-20 10:08:09', '0000-00-00 00:00:00', '127.0.0.1', '/room/org.php', NULL),
(990, 62, '2012-06-20 10:08:14', '0000-00-00 00:00:00', '127.0.0.1', '/room/org.php', NULL),
(991, 62, '2012-06-20 10:08:49', '0000-00-00 00:00:00', '127.0.0.1', '/room/org.php', NULL),
(992, 62, '2012-06-20 10:10:05', '0000-00-00 00:00:00', '127.0.0.1', '/room/org.php', NULL),
(993, 62, '2012-06-20 10:24:55', '0000-00-00 00:00:00', '127.0.0.1', '/room/org.php', NULL),
(994, 62, '2012-06-20 10:24:58', '0000-00-00 00:00:00', '127.0.0.1', '/room/org.php?key_dp_id=&mode=add', NULL),
(995, 62, '2012-06-20 10:25:09', '0000-00-00 00:00:00', '127.0.0.1', '/room/org.php', NULL),
(996, 62, '2012-06-20 10:25:46', '0000-00-00 00:00:00', '127.0.0.1', '/room/org.php', NULL),
(997, 62, '2012-06-20 10:26:03', '0000-00-00 00:00:00', '127.0.0.1', '/room/org.php', NULL),
(998, 62, '2012-06-20 10:26:05', '0000-00-00 00:00:00', '127.0.0.1', '/room/org.php?key_dp_id=1', NULL),
(999, 62, '2012-06-20 10:26:54', '0000-00-00 00:00:00', '127.0.0.1', '/room/org.php?key_dp_id=1', NULL),
(1000, 62, '2012-06-20 10:26:57', '0000-00-00 00:00:00', '127.0.0.1', '/room/org.php?key_dp_id=1', NULL),
(1001, 62, '2012-06-20 10:27:10', '0000-00-00 00:00:00', '127.0.0.1', '/room/org.php?key_dp_id=1', NULL),
(1002, 62, '2012-06-20 10:27:12', '0000-00-00 00:00:00', '127.0.0.1', '/room/org.php?key_dp_id=2', NULL),
(1003, 62, '2012-06-20 10:27:13', '0000-00-00 00:00:00', '127.0.0.1', '/room/org.php?key_dp_id=3', NULL),
(1004, 62, '2012-06-20 10:27:14', '0000-00-00 00:00:00', '127.0.0.1', '/room/org.php?key_dp_id=5', NULL),
(1005, 62, '2012-06-20 10:28:02', '0000-00-00 00:00:00', '127.0.0.1', '/room/org.php?key_dp_id=5', NULL),
(1006, 62, '2012-06-20 10:28:07', '0000-00-00 00:00:00', '127.0.0.1', '/room/org.php', NULL),
(1007, 62, '2012-06-20 10:30:22', '0000-00-00 00:00:00', '127.0.0.1', '/room/org.php', NULL),
(1008, 62, '2012-06-20 10:32:38', '0000-00-00 00:00:00', '127.0.0.1', '/room/org.php', NULL),
(1009, 62, '2012-06-20 10:34:41', '0000-00-00 00:00:00', '127.0.0.1', '/room/org.php', NULL),
(1010, 62, '2012-06-20 10:34:43', '0000-00-00 00:00:00', '127.0.0.1', '/room/bookingroom/department/delorg.php', NULL),
(1011, 62, '2012-06-20 10:34:44', '0000-00-00 00:00:00', '127.0.0.1', '/room/org.php', NULL),
(1012, 62, '2012-06-20 10:36:04', '0000-00-00 00:00:00', '127.0.0.1', '/room/org.php', NULL),
(1013, 62, '2012-06-20 10:36:23', '0000-00-00 00:00:00', '127.0.0.1', '/room/org.php', NULL),
(1014, 62, '2012-06-20 10:37:47', '0000-00-00 00:00:00', '127.0.0.1', '/room/org.php', NULL),
(1015, 62, '2012-06-20 10:38:00', '0000-00-00 00:00:00', '127.0.0.1', '/room/org.php', NULL),
(1016, 62, '2012-06-20 10:38:02', '0000-00-00 00:00:00', '127.0.0.1', '/room/org.php?key_dp_id=1', NULL),
(1017, 62, '2012-06-20 10:38:05', '0000-00-00 00:00:00', '127.0.0.1', '/room/org.php', NULL),
(1018, 62, '2012-06-20 10:38:20', '0000-00-00 00:00:00', '127.0.0.1', '/room/org.php', NULL),
(1019, 62, '2012-06-20 10:39:02', '0000-00-00 00:00:00', '127.0.0.1', '/room/org.php', NULL),
(1020, 62, '2012-06-20 10:39:08', '0000-00-00 00:00:00', '127.0.0.1', '/room/bookingroom/department/delorg.php', NULL),
(1021, 62, '2012-06-20 10:39:08', '0000-00-00 00:00:00', '127.0.0.1', '/room/org.php', NULL),
(1022, 62, '2012-06-20 10:39:15', '0000-00-00 00:00:00', '127.0.0.1', '/room/org.php?key_dp_id=45', NULL),
(1023, 62, '2012-06-20 10:39:22', '0000-00-00 00:00:00', '127.0.0.1', '/room/bookingroom/department/delorg.php', NULL),
(1024, 62, '2012-06-20 10:39:22', '0000-00-00 00:00:00', '127.0.0.1', '/room/org.php', NULL),
(1025, 62, '2012-06-20 10:40:47', '0000-00-00 00:00:00', '127.0.0.1', '/room/org.php?key_dp_id=45', NULL),
(1026, 62, '2012-06-20 10:40:51', '0000-00-00 00:00:00', '127.0.0.1', '/room/bookingroom/department/delorg.php', NULL),
(1027, 62, '2012-06-20 10:40:51', '0000-00-00 00:00:00', '127.0.0.1', '/room/org.php', NULL),
(1028, 62, '2012-06-20 10:41:01', '0000-00-00 00:00:00', '127.0.0.1', '/room/bookingroom/department/delorg.php?key_dp_id=45&action=del', NULL),
(1029, 62, '2012-06-20 10:41:01', '0000-00-00 00:00:00', '127.0.0.1', '/room/org.php', NULL),
(1030, 62, '2012-06-20 10:41:15', '0000-00-00 00:00:00', '127.0.0.1', '/room/bookingroom/department/delorg.php', NULL),
(1031, 62, '2012-06-20 10:41:15', '0000-00-00 00:00:00', '127.0.0.1', '/room/org.php', NULL),
(1032, 62, '2012-06-20 10:41:42', '0000-00-00 00:00:00', '127.0.0.1', '/room/bookingroom/department/delorg.php?key_dp_id=46&action=del', NULL),
(1033, 62, '2012-06-20 10:41:42', '0000-00-00 00:00:00', '127.0.0.1', '/room/org.php', NULL),
(1034, 62, '2012-06-20 10:42:52', '0000-00-00 00:00:00', '127.0.0.1', '/room/org.php', NULL),
(1035, 62, '2012-06-20 10:49:31', '0000-00-00 00:00:00', '127.0.0.1', '/room/org.php', NULL),
(1036, 62, '2012-06-20 10:50:10', '0000-00-00 00:00:00', '127.0.0.1', '/room/org.php', NULL),
(1037, 62, '2012-06-20 10:50:27', '0000-00-00 00:00:00', '127.0.0.1', '/room/org.php', NULL),
(1038, 62, '2012-06-20 11:43:22', '0000-00-00 00:00:00', '127.0.0.1', '/room/home.php', NULL),
(1039, 62, '2012-06-20 11:43:23', '0000-00-00 00:00:00', '127.0.0.1', '/room/formbooking.php', NULL),
(1040, 62, '2012-06-20 11:43:40', '0000-00-00 00:00:00', '127.0.0.1', '/room/formbooking.php', NULL),
(1041, 62, '2012-06-20 11:44:29', '0000-00-00 00:00:00', '127.0.0.1', '/room/formbooking.php', NULL),
(1042, 62, '2012-06-20 11:45:24', '0000-00-00 00:00:00', '127.0.0.1', '/room/formbooking.php', NULL),
(1043, 62, '2012-06-20 11:46:13', '0000-00-00 00:00:00', '127.0.0.1', '/room/formbooking.php', NULL),
(1044, 62, '2012-06-20 11:47:17', '0000-00-00 00:00:00', '127.0.0.1', '/room/formbooking.php', NULL),
(1045, 62, '2012-06-20 11:47:40', '0000-00-00 00:00:00', '127.0.0.1', '/room/formbooking.php', NULL),
(1046, 62, '2012-06-20 14:15:06', '0000-00-00 00:00:00', '127.0.0.1', '/room/formbooking.php?mode=edit&keyuq_id=84', NULL),
(1047, 62, '2012-06-20 14:17:19', '0000-00-00 00:00:00', '127.0.0.1', '/room/home.php', NULL),
(1048, 62, '2012-06-20 16:39:59', '0000-00-00 00:00:00', '127.0.0.1', '/room/formbooking.php', NULL),
(1049, 62, '2012-06-20 16:40:24', '0000-00-00 00:00:00', '127.0.0.1', '/room/room.php', NULL),
(1050, 62, '2012-06-20 16:40:34', '0000-00-00 00:00:00', '127.0.0.1', '/room/room.php?key_cid=3', NULL),
(1051, 62, '2012-06-20 16:40:43', '0000-00-00 00:00:00', '127.0.0.1', '/room/bookingroom/room/admin3-2.php', NULL),
(1052, 62, '2012-06-20 16:40:44', '0000-00-00 00:00:00', '127.0.0.1', '/room/room.php', NULL),
(1053, 62, '2012-06-20 16:40:51', '0000-00-00 00:00:00', '127.0.0.1', '/room/room.php?key_cid=39', NULL),
(1054, 62, '2012-06-20 16:40:56', '0000-00-00 00:00:00', '127.0.0.1', '/room/bookingroom/room/admin3-2.php', NULL),
(1055, 62, '2012-06-20 16:40:56', '0000-00-00 00:00:00', '127.0.0.1', '/room/room.php', NULL),
(1056, 62, '2012-06-20 16:41:00', '0000-00-00 00:00:00', '127.0.0.1', '/room/room.php?key_cid=40', NULL),
(1057, 62, '2012-06-20 16:41:07', '0000-00-00 00:00:00', '127.0.0.1', '/room/bookingroom/room/admin3-2.php', NULL),
(1058, 62, '2012-06-20 16:41:07', '0000-00-00 00:00:00', '127.0.0.1', '/room/room.php', NULL),
(1059, 62, '2012-06-20 16:41:10', '0000-00-00 00:00:00', '127.0.0.1', '/room/room.php?key_cid=38', NULL),
(1060, 62, '2012-06-20 16:41:18', '0000-00-00 00:00:00', '127.0.0.1', '/room/bookingroom/room/admin3-2.php', NULL),
(1061, 62, '2012-06-20 16:41:18', '0000-00-00 00:00:00', '127.0.0.1', '/room/room.php', NULL),
(1062, 62, '2012-06-20 16:41:21', '0000-00-00 00:00:00', '127.0.0.1', '/room/room.php?key_cid=41', NULL),
(1063, 62, '2012-06-20 16:41:26', '0000-00-00 00:00:00', '127.0.0.1', '/room/bookingroom/room/admin3-2.php', NULL),
(1064, 62, '2012-06-20 16:41:26', '0000-00-00 00:00:00', '127.0.0.1', '/room/room.php', NULL),
(1065, 62, '2012-06-20 17:11:06', '0000-00-00 00:00:00', '127.0.0.1', '/room/room.php', NULL),
(1066, 62, '2012-06-20 17:18:31', '0000-00-00 00:00:00', '127.0.0.1', '/room/home.php', NULL),
(1067, 62, '2012-06-20 18:38:51', '0000-00-00 00:00:00', '127.0.0.1', '/room/home.php', NULL),
(1068, 62, '2012-06-20 18:41:33', '0000-00-00 00:00:00', '127.0.0.1', '/room/home.php', NULL),
(1069, 62, '2012-06-20 18:41:55', '0000-00-00 00:00:00', '127.0.0.1', '/room/home.php', NULL),
(1070, 62, '2012-06-20 18:42:12', '0000-00-00 00:00:00', '127.0.0.1', '/room/home.php', NULL),
(1071, 62, '2012-06-20 18:59:51', '0000-00-00 00:00:00', '127.0.0.1', '/room/home.php', NULL),
(1072, 62, '2012-06-20 18:59:56', '0000-00-00 00:00:00', '127.0.0.1', '/room/formbooking.php', NULL),
(1073, 62, '2012-06-20 18:59:56', '0000-00-00 00:00:00', '127.0.0.1', '/room/formbooking.php', NULL),
(1074, 62, '2012-06-20 19:03:30', '0000-00-00 00:00:00', '127.0.0.1', NULL, NULL),
(1075, 62, '2012-06-20 19:03:30', '0000-00-00 00:00:00', '127.0.0.1', '/room/home.php', NULL),
(1076, 62, '2012-06-20 19:04:24', '0000-00-00 00:00:00', '127.0.0.1', NULL, NULL),
(1077, 62, '2012-06-20 19:04:24', '0000-00-00 00:00:00', '127.0.0.1', '/room/home.php', NULL),
(1078, 62, '2012-06-20 19:04:27', '0000-00-00 00:00:00', '127.0.0.1', '/room/formbooking.php', NULL),
(1079, 62, '2012-06-20 19:04:42', '0000-00-00 00:00:00', '127.0.0.1', '/room/home.php', NULL),
(1080, 62, '2012-06-20 19:04:43', '0000-00-00 00:00:00', '127.0.0.1', '/room/formbooking.php', NULL),
(1081, 62, '2012-06-20 19:04:49', '0000-00-00 00:00:00', '127.0.0.1', '/room/room_cate.php', NULL),
(1082, 62, '2012-06-20 19:04:52', '0000-00-00 00:00:00', '127.0.0.1', '/room/room_cate.php', NULL),
(1083, 62, '2012-06-20 19:04:55', '0000-00-00 00:00:00', '127.0.0.1', '/room/room_cate.php?keyId=2', NULL),
(1084, 62, '2012-06-20 19:04:59', '0000-00-00 00:00:00', '127.0.0.1', '/room/room.php', NULL),
(1085, 62, '2012-06-20 19:08:43', '0000-00-00 00:00:00', '127.0.0.1', NULL, NULL),
(1086, 62, '2012-06-20 19:08:43', '0000-00-00 00:00:00', '127.0.0.1', '/room/home.php', NULL),
(1087, 62, '2012-06-20 19:08:46', '0000-00-00 00:00:00', '127.0.0.1', '/room/room_cate.php', NULL),
(1088, 62, '2012-06-20 19:08:49', '0000-00-00 00:00:00', '127.0.0.1', '/room/room_cate.php?keyId=2', NULL),
(1089, 62, '2012-06-21 15:23:19', '0000-00-00 00:00:00', '127.0.0.1', NULL, NULL),
(1090, 62, '2012-06-21 15:23:20', '0000-00-00 00:00:00', '127.0.0.1', '/room/home.php', NULL),
(1091, 62, '2012-06-21 15:26:06', '0000-00-00 00:00:00', '127.0.0.1', '/room/home.php', NULL),
(1092, 62, '2012-06-21 15:26:07', '0000-00-00 00:00:00', '127.0.0.1', '/room/home.php?Y=2012&m=5&d=21', NULL),
(1093, 62, '2012-06-21 15:26:08', '0000-00-00 00:00:00', '127.0.0.1', '/room/home.php?Y=2012&m=4&d=21', NULL),
(1094, 62, '2012-06-21 15:26:08', '0000-00-00 00:00:00', '127.0.0.1', '/room/home.php?Y=2012&m=3&d=21', NULL),
(1095, 62, '2012-06-21 15:26:09', '0000-00-00 00:00:00', '127.0.0.1', '/room/home.php?Y=2012&m=2&d=21', NULL),
(1096, 62, '2012-06-21 15:26:10', '0000-00-00 00:00:00', '127.0.0.1', '/room/home.php?Y=2012&m=1&d=21', NULL),
(1097, 62, '2012-06-21 15:26:52', '0000-00-00 00:00:00', '127.0.0.1', '/room/home.php?Y=2012&m=1&d=21', NULL),
(1098, 62, '2012-06-21 15:27:22', '0000-00-00 00:00:00', '127.0.0.1', '/room/home.php?Y=2012&m=1&d=21', NULL),
(1099, 62, '2012-06-21 15:30:07', '0000-00-00 00:00:00', '127.0.0.1', '/room/home.php?Y=2012&m=1&d=21', NULL),
(1100, 62, '2012-06-21 15:31:52', '0000-00-00 00:00:00', '127.0.0.1', '/room/home.php?Y=2012&m=1&d=21', NULL),
(1101, 62, '2012-06-21 15:32:32', '0000-00-00 00:00:00', '127.0.0.1', '/room/home.php?Y=2012&m=1&d=21', NULL),
(1102, 62, '2012-06-21 15:32:41', '0000-00-00 00:00:00', '127.0.0.1', '/room/home.php?Y=2012&m=1&d=21', NULL),
(1103, 62, '2012-06-21 15:33:34', '0000-00-00 00:00:00', '127.0.0.1', '/room/home.php?Y=2012&m=1&d=21', NULL),
(1104, 62, '2012-06-21 15:34:16', '0000-00-00 00:00:00', '127.0.0.1', '/room/home.php?Y=2012&m=1&d=21', NULL),
(1105, 62, '2012-06-21 15:34:25', '0000-00-00 00:00:00', '127.0.0.1', '/room/home.php?Y=2012&m=1&d=21', NULL),
(1106, 62, '2012-06-21 15:34:59', '0000-00-00 00:00:00', '127.0.0.1', '/room/home.php?Y=2012&m=1&d=21', NULL),
(1107, 62, '2012-06-21 15:35:49', '0000-00-00 00:00:00', '127.0.0.1', '/room/home.php?Y=2012&m=1&d=21', NULL),
(1108, 62, '2012-06-21 15:52:48', '0000-00-00 00:00:00', '127.0.0.1', '/room/home.php', NULL),
(1109, 62, '2012-06-21 15:52:50', '0000-00-00 00:00:00', '127.0.0.1', '/room/home.php?Y=2012&m=5&d=21', NULL),
(1110, 62, '2012-06-21 15:52:50', '0000-00-00 00:00:00', '127.0.0.1', '/room/home.php?Y=2012&m=4&d=21', NULL),
(1111, 62, '2012-06-21 15:52:51', '0000-00-00 00:00:00', '127.0.0.1', '/room/home.php?Y=2012&m=3&d=21', NULL),
(1112, 62, '2012-06-21 15:52:52', '0000-00-00 00:00:00', '127.0.0.1', '/room/home.php?Y=2012&m=2&d=21', NULL),
(1113, 62, '2012-06-21 15:52:53', '0000-00-00 00:00:00', '127.0.0.1', '/room/home.php?Y=2012&m=1&d=21', NULL),
(1114, 62, '2012-06-21 16:04:22', '0000-00-00 00:00:00', '127.0.0.1', '/room/home.php', NULL),
(1115, 62, '2012-06-21 16:04:24', '0000-00-00 00:00:00', '127.0.0.1', '/room/formbooking.php', NULL),
(1116, 62, '2012-06-21 16:04:29', '0000-00-00 00:00:00', '127.0.0.1', '/room/home.php', NULL),
(1117, 62, '2012-06-22 09:36:01', '0000-00-00 00:00:00', '127.0.0.1', NULL, NULL),
(1118, 62, '2012-06-22 09:36:01', '0000-00-00 00:00:00', '127.0.0.1', '/room/home.php', NULL),
(1119, 62, '2012-06-22 09:39:51', '0000-00-00 00:00:00', '127.0.0.1', '/room/home.php', NULL),
(1120, 62, '2012-06-22 09:40:00', '0000-00-00 00:00:00', '127.0.0.1', '/room/home.php', NULL),
(1121, 68, '2012-06-22 09:40:30', '0000-00-00 00:00:00', '127.0.0.1', NULL, NULL),
(1122, 68, '2012-06-22 09:40:30', '0000-00-00 00:00:00', '127.0.0.1', '/room/home.php', NULL),
(1123, 68, '2012-06-22 09:40:43', '0000-00-00 00:00:00', '127.0.0.1', '/room/home.php', NULL),
(1124, 68, '2012-06-22 09:41:04', '0000-00-00 00:00:00', '127.0.0.1', '/room/home.php?Y=2012&m=5&d=22', NULL),
(1125, 68, '2012-06-22 09:41:05', '0000-00-00 00:00:00', '127.0.0.1', '/room/home.php?Y=2012&m=4&d=22', NULL),
(1126, 68, '2012-06-22 09:41:05', '0000-00-00 00:00:00', '127.0.0.1', '/room/home.php?Y=2012&m=3&d=22', NULL),
(1127, 68, '2012-06-22 09:41:06', '0000-00-00 00:00:00', '127.0.0.1', '/room/home.php?Y=2012&m=2&d=22', NULL),
(1128, 68, '2012-06-22 09:41:07', '0000-00-00 00:00:00', '127.0.0.1', '/room/home.php?Y=2012&m=1&d=22', NULL),
(1129, 62, '2012-06-22 10:20:39', '0000-00-00 00:00:00', '127.0.0.1', NULL, NULL),
(1130, 62, '2012-06-22 10:20:39', '0000-00-00 00:00:00', '127.0.0.1', '/room/home.php', NULL),
(1131, 62, '2012-06-22 10:20:50', '0000-00-00 00:00:00', '127.0.0.1', '/room/user.php', NULL),
(1132, 62, '2012-06-22 10:22:39', '0000-00-00 00:00:00', '127.0.0.1', '/room/user.php', NULL),
(1133, 62, '2012-06-22 10:22:52', '0000-00-00 00:00:00', '127.0.0.1', '/room/user.php', NULL),
(1134, 62, '2012-06-22 10:23:46', '0000-00-00 00:00:00', '127.0.0.1', '/room/user.php', NULL),
(1135, 62, '2012-06-22 10:24:46', '0000-00-00 00:00:00', '127.0.0.1', '/room/user.php', NULL),
(1136, 62, '2012-06-22 10:26:21', '0000-00-00 00:00:00', '127.0.0.1', '/room/user.php?mode=add&keyno=1', NULL),
(1137, 62, '2012-06-22 10:26:27', '0000-00-00 00:00:00', '127.0.0.1', '/room/user.php?mode=add', NULL),
(1138, 62, '2012-06-22 10:26:28', '0000-00-00 00:00:00', '127.0.0.1', '/room/user.php', NULL),
(1139, 62, '2012-06-22 10:26:30', '0000-00-00 00:00:00', '127.0.0.1', '/room/user.php?mode=add', NULL),
(1140, 62, '2012-06-22 10:26:35', '0000-00-00 00:00:00', '127.0.0.1', '/room/user.php', NULL),
(1141, 62, '2012-06-22 10:27:07', '0000-00-00 00:00:00', '127.0.0.1', '/room/user.php?mode=add', NULL),
(1142, 62, '2012-06-22 10:30:12', '0000-00-00 00:00:00', '127.0.0.1', '/room/user.php?mode=add', NULL),
(1143, 62, '2012-06-22 10:30:47', '0000-00-00 00:00:00', '127.0.0.1', '/room/user.php?mode=add', NULL),
(1144, 62, '2012-06-22 10:31:51', '0000-00-00 00:00:00', '127.0.0.1', '/room/user.php?mode=add', NULL),
(1145, 62, '2012-06-22 10:32:20', '0000-00-00 00:00:00', '127.0.0.1', '/room/user.php?mode=add', NULL),
(1146, 62, '2012-06-22 10:32:56', '0000-00-00 00:00:00', '127.0.0.1', '/room/user.php?mode=add', NULL),
(1147, 62, '2012-06-22 10:33:18', '0000-00-00 00:00:00', '127.0.0.1', '/room/user.php', NULL),
(1148, 62, '2012-06-22 10:33:20', '0000-00-00 00:00:00', '127.0.0.1', '/room/user.php?mode=add&keyno=1', NULL),
(1149, 62, '2012-06-22 10:33:23', '0000-00-00 00:00:00', '127.0.0.1', '/room/user.php', NULL),
(1150, 62, '2012-06-22 10:33:25', '0000-00-00 00:00:00', '127.0.0.1', '/room/user.php?mode=add&keyno=1', NULL),
(1151, 62, '2012-06-22 10:33:36', '0000-00-00 00:00:00', '127.0.0.1', '/room/user.php', NULL),
(1152, 62, '2012-06-22 10:35:12', '0000-00-00 00:00:00', '127.0.0.1', '/room/user.php', NULL),
(1153, 62, '2012-06-22 10:35:15', '0000-00-00 00:00:00', '127.0.0.1', '/room/user.php?mode=add&keyno=1', NULL),
(1154, 62, '2012-06-22 10:35:19', '0000-00-00 00:00:00', '127.0.0.1', '/room/user.php', NULL),
(1155, 62, '2012-06-22 10:35:30', '0000-00-00 00:00:00', '127.0.0.1', '/room/user.php', NULL),
(1156, 62, '2012-06-22 10:35:34', '0000-00-00 00:00:00', '127.0.0.1', '/room/user.php?mode=add&keyno=1', NULL),
(1157, 62, '2012-06-22 10:35:40', '0000-00-00 00:00:00', '127.0.0.1', '/room/user.php', NULL),
(1158, 62, '2012-06-22 10:38:53', '0000-00-00 00:00:00', '127.0.0.1', '/room/user.php', NULL),
(1159, 62, '2012-06-22 10:38:57', '0000-00-00 00:00:00', '127.0.0.1', '/room/user.php?mode=add&keyno=91', NULL),
(1160, 62, '2012-06-22 10:39:43', '0000-00-00 00:00:00', '127.0.0.1', '/room/user.php?mode=add&keyno=91', NULL),
(1161, 62, '2012-06-22 10:40:37', '0000-00-00 00:00:00', '127.0.0.1', '/room/user.php?mode=add&keyno=91', NULL),
(1162, 62, '2012-06-22 10:40:41', '0000-00-00 00:00:00', '127.0.0.1', '/room/user.php?mode=add&keyno=91', NULL),
(1163, 62, '2012-06-22 10:40:52', '0000-00-00 00:00:00', '127.0.0.1', '/room/user.php?mode=add&keyno=91', NULL),
(1164, 62, '2012-06-22 10:40:56', '0000-00-00 00:00:00', '127.0.0.1', '/room/user.php', NULL),
(1165, 62, '2012-06-22 10:40:59', '0000-00-00 00:00:00', '127.0.0.1', '/room/user.php?mode=add&keyno=90', NULL),
(1166, 62, '2012-06-22 10:41:00', '0000-00-00 00:00:00', '127.0.0.1', '/room/user.php', NULL),
(1167, 62, '2012-06-22 10:41:02', '0000-00-00 00:00:00', '127.0.0.1', '/room/user.php?mode=add&keyno=89', NULL),
(1168, 62, '2012-06-22 10:41:04', '0000-00-00 00:00:00', '127.0.0.1', '/room/user.php', NULL),
(1169, 62, '2012-06-22 10:41:06', '0000-00-00 00:00:00', '127.0.0.1', '/room/user.php?mode=add&keyno=76', NULL),
(1170, 62, '2012-06-22 10:41:09', '0000-00-00 00:00:00', '127.0.0.1', '/room/user.php', NULL),
(1171, 62, '2012-06-22 10:42:45', '0000-00-00 00:00:00', '127.0.0.1', '/room/user.php', NULL),
(1172, 62, '2012-06-22 10:42:47', '0000-00-00 00:00:00', '127.0.0.1', '/room/user.php?mode=add&keyno=91', NULL),
(1173, 62, '2012-06-22 10:42:50', '0000-00-00 00:00:00', '127.0.0.1', '/room/user.php', NULL),
(1174, 62, '2012-06-22 10:42:52', '0000-00-00 00:00:00', '127.0.0.1', '/room/user.php?mode=add&keyno=89', NULL),
(1175, 62, '2012-06-22 10:42:54', '0000-00-00 00:00:00', '127.0.0.1', '/room/user.php', NULL),
(1176, 62, '2012-06-22 10:42:56', '0000-00-00 00:00:00', '127.0.0.1', '/room/user.php?mode=add&keyno=68', NULL),
(1177, 62, '2012-06-22 10:42:58', '0000-00-00 00:00:00', '127.0.0.1', '/room/user.php', NULL),
(1178, 62, '2012-06-22 10:44:39', '0000-00-00 00:00:00', '127.0.0.1', '/room/user.php', NULL),
(1179, 62, '2012-06-22 10:44:43', '0000-00-00 00:00:00', '127.0.0.1', '/room/user.php?mode=add&keyno=90', NULL),
(1180, 62, '2012-06-22 10:45:07', '0000-00-00 00:00:00', '127.0.0.1', '/room/user.php?mode=add&keyno=90', NULL),
(1181, 62, '2012-06-22 11:08:00', '0000-00-00 00:00:00', '127.0.0.1', '/room/home.php', NULL),
(1182, 62, '2012-06-22 14:16:57', '0000-00-00 00:00:00', '127.0.0.1', '/room/home.php', NULL),
(1183, 62, '2012-06-22 14:17:03', '0000-00-00 00:00:00', '127.0.0.1', '/room/config.php', NULL),
(1184, 62, '2012-06-22 14:17:28', '0000-00-00 00:00:00', '127.0.0.1', '/room/config.php', NULL),
(1185, 62, '2012-06-22 14:17:42', '0000-00-00 00:00:00', '127.0.0.1', '/room/config.php', NULL),
(1186, 62, '2012-06-22 14:18:13', '0000-00-00 00:00:00', '127.0.0.1', '/room/config.php', NULL),
(1187, 62, '2012-06-22 14:18:21', '0000-00-00 00:00:00', '127.0.0.1', '/room/config.php', NULL),
(1188, 62, '2012-06-22 14:18:48', '0000-00-00 00:00:00', '127.0.0.1', '/room/config.php', NULL),
(1189, 62, '2012-06-22 14:20:17', '0000-00-00 00:00:00', '127.0.0.1', '/room/config.php', NULL),
(1190, 62, '2012-06-22 14:21:03', '0000-00-00 00:00:00', '127.0.0.1', '/room/config.php', NULL),
(1191, 62, '2012-06-22 14:21:33', '0000-00-00 00:00:00', '127.0.0.1', '/room/config.php', NULL),
(1192, 62, '2012-06-22 14:22:39', '0000-00-00 00:00:00', '127.0.0.1', '/room/config.php', NULL),
(1193, 62, '2012-06-22 14:22:54', '0000-00-00 00:00:00', '127.0.0.1', '/room/config.php', NULL),
(1194, 62, '2012-06-22 14:24:09', '0000-00-00 00:00:00', '127.0.0.1', '/room/config.php', NULL),
(1195, 62, '2012-06-22 14:25:00', '0000-00-00 00:00:00', '127.0.0.1', '/room/config.php', NULL),
(1196, 62, '2012-06-22 14:28:00', '0000-00-00 00:00:00', '127.0.0.1', '/room/config.php', NULL),
(1197, 62, '2012-06-22 14:28:20', '0000-00-00 00:00:00', '127.0.0.1', '/room/config.php', NULL),
(1198, 62, '2012-06-22 14:29:11', '0000-00-00 00:00:00', '127.0.0.1', '/room/config.php', NULL),
(1199, 62, '2012-06-22 14:30:36', '0000-00-00 00:00:00', '127.0.0.1', '/room/config.php', NULL),
(1200, 62, '2012-06-22 14:31:35', '0000-00-00 00:00:00', '127.0.0.1', '/room/config.php', NULL),
(1201, 62, '2012-06-22 14:32:14', '0000-00-00 00:00:00', '127.0.0.1', '/room/config.php', NULL),
(1202, 62, '2012-06-22 14:38:58', '0000-00-00 00:00:00', '127.0.0.1', '/room/config.php', NULL),
(1203, 62, '2012-06-22 14:58:06', '0000-00-00 00:00:00', '127.0.0.1', '/room/config.php', NULL),
(1204, 62, '2012-06-22 14:58:19', '0000-00-00 00:00:00', '127.0.0.1', '/room/config.php', NULL),
(1205, 62, '2012-06-22 15:05:49', '0000-00-00 00:00:00', '127.0.0.1', '/room/config.php', NULL),
(1206, 62, '2012-06-22 15:07:34', '0000-00-00 00:00:00', '127.0.0.1', '/room/config.php', NULL),
(1207, 62, '2012-06-22 15:08:05', '0000-00-00 00:00:00', '127.0.0.1', '/room/config.php', NULL),
(1208, 62, '2012-06-22 15:08:25', '0000-00-00 00:00:00', '127.0.0.1', '/room/config.php', NULL),
(1209, 62, '2012-06-22 15:09:16', '0000-00-00 00:00:00', '127.0.0.1', '/room/config.php', NULL),
(1210, 62, '2012-06-22 15:09:29', '0000-00-00 00:00:00', '127.0.0.1', '/room/config.php', NULL),
(1211, 62, '2012-06-22 15:10:23', '0000-00-00 00:00:00', '127.0.0.1', '/room/config.php', NULL),
(1212, 62, '2012-06-22 15:10:29', '0000-00-00 00:00:00', '127.0.0.1', '/room/admin/config_action.php', NULL),
(1213, 62, '2012-06-22 15:10:29', '0000-00-00 00:00:00', '127.0.0.1', '/room/config.php', NULL),
(1214, 62, '2012-06-22 15:10:48', '0000-00-00 00:00:00', '127.0.0.1', '/room/admin/config_action.php', NULL),
(1215, 62, '2012-06-22 15:10:48', '0000-00-00 00:00:00', '127.0.0.1', '/room/config.php', NULL),
(1216, 62, '2012-06-22 15:11:13', '0000-00-00 00:00:00', '127.0.0.1', '/room/room_cate.php', NULL),
(1217, 62, '2012-06-22 15:11:20', '0000-00-00 00:00:00', '127.0.0.1', '/room/room.php', NULL),
(1218, 62, '2012-06-22 15:11:24', '0000-00-00 00:00:00', '127.0.0.1', '/room/food.php', NULL),
(1219, 62, '2012-06-22 15:11:26', '0000-00-00 00:00:00', '127.0.0.1', '/room/media.php', NULL),
(1220, 62, '2012-06-22 15:11:28', '0000-00-00 00:00:00', '127.0.0.1', '/room/org.php', NULL),
(1221, 62, '2012-06-22 15:12:29', '0000-00-00 00:00:00', '127.0.0.1', '/room/org.php', NULL),
(1222, 62, '2012-06-22 15:49:00', '0000-00-00 00:00:00', '127.0.0.1', '/room/home.php', NULL),
(1223, 62, '2012-06-22 15:49:02', '0000-00-00 00:00:00', '127.0.0.1', '/room/home.php?Y=2012&m=5&d=22', NULL),
(1224, 62, '2012-06-22 15:49:03', '0000-00-00 00:00:00', '127.0.0.1', '/room/home.php?Y=2012&m=4&d=22', NULL),
(1225, 62, '2012-06-22 15:49:03', '0000-00-00 00:00:00', '127.0.0.1', '/room/home.php?Y=2012&m=3&d=22', NULL),
(1226, 62, '2012-06-22 15:49:04', '0000-00-00 00:00:00', '127.0.0.1', '/room/home.php?Y=2012&m=2&d=22', NULL),
(1227, 62, '2012-06-22 15:49:05', '0000-00-00 00:00:00', '127.0.0.1', '/room/home.php?Y=2012&m=1&d=22', NULL),
(1228, 62, '2012-06-22 15:50:55', '0000-00-00 00:00:00', '127.0.0.1', '/room/home.php', NULL),
(1229, 62, '2012-06-22 15:50:56', '0000-00-00 00:00:00', '127.0.0.1', '/room/home.php?Y=2012&m=5&d=22', NULL),
(1230, 62, '2012-06-22 15:50:57', '0000-00-00 00:00:00', '127.0.0.1', '/room/home.php?Y=2012&m=4&d=22', NULL),
(1231, 62, '2012-06-22 15:50:57', '0000-00-00 00:00:00', '127.0.0.1', '/room/home.php?Y=2012&m=3&d=22', NULL),
(1232, 62, '2012-06-22 15:50:58', '0000-00-00 00:00:00', '127.0.0.1', '/room/home.php?Y=2012&m=2&d=22', NULL),
(1233, 62, '2012-06-22 15:50:59', '0000-00-00 00:00:00', '127.0.0.1', '/room/home.php?Y=2012&m=1&d=22', NULL),
(1234, 62, '2012-06-22 15:51:24', '0000-00-00 00:00:00', '127.0.0.1', '/room/user.php', NULL),
(1235, 62, '2012-06-22 15:52:08', '0000-00-00 00:00:00', '127.0.0.1', '/room/user.php', NULL),
(1236, 62, '2012-06-22 16:02:17', '0000-00-00 00:00:00', '127.0.0.1', '/room/user.php?mode=add&keyno=89', NULL),
(1237, 62, '2012-06-22 16:02:30', '0000-00-00 00:00:00', '127.0.0.1', '/room/user.php', NULL),
(1238, 62, '2012-06-22 16:02:34', '0000-00-00 00:00:00', '127.0.0.1', '/room/user.php?mode=add&keyno=88', NULL),
(1239, 62, '2012-06-22 16:02:36', '0000-00-00 00:00:00', '127.0.0.1', '/room/user.php', NULL),
(1240, 62, '2012-06-22 18:34:21', '0000-00-00 00:00:00', '127.0.0.1', '/room/user.php?mode=add&keyno=91', NULL),
(1241, 62, '2012-06-22 18:36:32', '0000-00-00 00:00:00', '127.0.0.1', '/room/user.php', NULL),
(1242, 62, '2012-06-22 18:37:14', '0000-00-00 00:00:00', '127.0.0.1', '/room/user.php', NULL),
(1243, 62, '2012-06-22 18:37:15', '0000-00-00 00:00:00', '127.0.0.1', '/room/user.php?mode=add', NULL),
(1244, 62, '2012-06-22 18:37:35', '0000-00-00 00:00:00', '127.0.0.1', '/room/user.php?mode=add', NULL),
(1245, 62, '2012-06-22 18:38:00', '0000-00-00 00:00:00', '127.0.0.1', '/room/user.php?mode=add', NULL),
(1246, 62, '2012-06-22 18:39:37', '0000-00-00 00:00:00', '127.0.0.1', '/room/user.php?mode=add', NULL),
(1247, 62, '2012-06-22 18:41:01', '0000-00-00 00:00:00', '127.0.0.1', '/room/user.php?mode=add', NULL),
(1248, 62, '2012-06-22 18:41:39', '0000-00-00 00:00:00', '127.0.0.1', '/room/user.php?mode=add', NULL),
(1249, 62, '2012-06-22 18:42:37', '0000-00-00 00:00:00', '127.0.0.1', '/room/user.php?mode=add', NULL),
(1250, 62, '2012-06-22 18:42:57', '0000-00-00 00:00:00', '127.0.0.1', '/room/user.php?mode=add', NULL),
(1251, 62, '2012-06-22 18:43:41', '0000-00-00 00:00:00', '127.0.0.1', '/room/user.php?mode=add', NULL),
(1252, 62, '2012-06-22 18:43:52', '0000-00-00 00:00:00', '127.0.0.1', '/room/config.php', NULL),
(1253, 62, '2012-06-22 18:44:09', '0000-00-00 00:00:00', '127.0.0.1', '/room/user.php', NULL),
(1254, 62, '2012-06-22 18:44:11', '0000-00-00 00:00:00', '127.0.0.1', '/room/user.php?mode=add', NULL),
(1255, 62, '2012-06-22 18:44:34', '0000-00-00 00:00:00', '127.0.0.1', '/room/user.php', NULL),
(1256, 62, '2012-06-22 18:44:36', '0000-00-00 00:00:00', '127.0.0.1', '/room/user.php?mode=add&keyno=91', NULL),
(1257, 62, '2012-06-22 18:44:38', '0000-00-00 00:00:00', '127.0.0.1', '/room/user.php', NULL),
(1258, 62, '2012-06-22 18:44:43', '0000-00-00 00:00:00', '127.0.0.1', '/room/user.php?mode=add&keyno=62', NULL),
(1259, 62, '2012-06-22 18:44:47', '0000-00-00 00:00:00', '127.0.0.1', '/room/user.php', NULL),
(1260, 62, '2012-06-22 18:45:17', '0000-00-00 00:00:00', '127.0.0.1', '/room/user.php', NULL),
(1261, 62, '2012-06-22 18:45:18', '0000-00-00 00:00:00', '127.0.0.1', '/room/user.php?mode=add', NULL),
(1262, 62, '2012-06-22 18:45:20', '0000-00-00 00:00:00', '127.0.0.1', '/room/user.php?mode=add', NULL),
(1263, 62, '2012-06-22 18:45:44', '0000-00-00 00:00:00', '127.0.0.1', '/room/user.php?mode=add', NULL),
(1264, 62, '2012-06-22 18:46:24', '0000-00-00 00:00:00', '127.0.0.1', '/room/home.php', NULL),
(1265, 62, '2012-06-22 18:46:44', '0000-00-00 00:00:00', '127.0.0.1', '/room/home.php?Y=2012&m=5&d=22', NULL),
(1266, 62, '2012-06-22 18:46:46', '0000-00-00 00:00:00', '127.0.0.1', '/room/home.php?Y=2012&m=4&d=22', NULL),
(1267, 62, '2012-06-22 18:46:47', '0000-00-00 00:00:00', '127.0.0.1', '/room/home.php?Y=2012&m=3&d=22', NULL),
(1268, 62, '2012-06-22 18:46:48', '0000-00-00 00:00:00', '127.0.0.1', '/room/home.php?Y=2012&m=2&d=22', NULL),
(1269, 62, '2012-06-22 18:46:49', '0000-00-00 00:00:00', '127.0.0.1', '/room/home.php?Y=2012&m=1&d=22', NULL),
(1270, 62, '2012-06-22 18:47:03', '0000-00-00 00:00:00', '127.0.0.1', '/room/home.php?Y=2012&m=2&d=22', NULL),
(1271, 62, '2012-06-22 18:47:07', '0000-00-00 00:00:00', '127.0.0.1', '/room/home.php?Y=2012&m=3&d=22', NULL),
(1272, 62, '2012-06-22 18:47:09', '0000-00-00 00:00:00', '127.0.0.1', '/room/home.php?Y=2012&m=2&d=22', NULL),
(1273, 62, '2012-06-22 18:47:10', '0000-00-00 00:00:00', '127.0.0.1', '/room/home.php?Y=2012&m=1&d=22', NULL),
(1274, 62, '2012-06-22 18:47:11', '0000-00-00 00:00:00', '127.0.0.1', '/room/home.php?Y=2011&m=12&d=22', NULL),
(1275, 62, '2012-06-22 18:47:13', '0000-00-00 00:00:00', '127.0.0.1', '/room/home.php?Y=2012&m=1&d=22', NULL),
(1276, 62, '2012-06-22 18:47:39', '0000-00-00 00:00:00', '127.0.0.1', '/room/home.php?Y=2012&m=1&d=22', NULL),
(1277, 62, '2012-06-22 18:47:45', '0000-00-00 00:00:00', '127.0.0.1', '/room/config.php', NULL),
(1278, 62, '2012-06-22 18:47:50', '0000-00-00 00:00:00', '127.0.0.1', '/room/user.php', NULL),
(1279, 62, '2012-06-22 18:47:51', '0000-00-00 00:00:00', '127.0.0.1', '/room/user.php', NULL),
(1280, 62, '2012-06-22 18:47:52', '0000-00-00 00:00:00', '127.0.0.1', '/room/user.php?mode=add', NULL),
(1281, 62, '2012-06-22 18:47:54', '0000-00-00 00:00:00', '127.0.0.1', '/room/home.php', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `user_type`
--

DROP TABLE IF EXISTS `user_type`;
CREATE TABLE IF NOT EXISTS `user_type` (
  `id` int(1) NOT NULL auto_increment,
  `types` varchar(100) default NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `user_type`
--

INSERT INTO `user_type` (`id`, `types`) VALUES
(1, 'เจ้าหน้าที่ส่วนงาน'),
(2, 'หัวหน้าส่วนงาน'),
(3, 'Administrator');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
