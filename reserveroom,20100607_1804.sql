-- phpMyAdmin SQL Dump
-- version 3.2.0.1
-- http://www.phpmyadmin.net
--
-- โฮสต์: localhost
-- เวลาในการสร้าง: 07 มิ.ย. 2010  น.
-- รุ่นของเซิร์ฟเวอร์: 5.0.51
-- รุ่นของ PHP: 5.2.6

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- ฐานข้อมูล: `reserveroom`
--

-- --------------------------------------------------------

--
-- โครงสร้างตาราง `admin`
--

CREATE TABLE IF NOT EXISTS `admin` (
  `id` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=tis620;

--
-- dump ตาราง `admin`
--

INSERT INTO `admin` (`id`) VALUES
(62);

-- --------------------------------------------------------

--
-- โครงสร้างตาราง `meetingroom_croom`
--

CREATE TABLE IF NOT EXISTS `meetingroom_croom` (
  `cr_id` int(11) NOT NULL auto_increment,
  `name` varchar(40) NOT NULL COMMENT 'ชื่อห้อง',
  `net` int(11) NOT NULL default '0' COMMENT 'ความจุ',
  `location` text NOT NULL,
  `parent` int(2) NOT NULL,
  `pro` varchar(9) NOT NULL default '0',
  `board` varchar(41) NOT NULL default '',
  `comp` varchar(9) NOT NULL default '',
  `type` varchar(5) NOT NULL default '',
  `tt` int(34) NOT NULL default '0',
  `dater` varchar(29) NOT NULL default '',
  `picType` varchar(100) NOT NULL,
  `picData` text NOT NULL,
  PRIMARY KEY  (`cr_id`),
  KEY `name` (`name`)
) ENGINE=MyISAM  DEFAULT CHARSET=tis620 PACK_KEYS=0 AUTO_INCREMENT=19 ;

--
-- dump ตาราง `meetingroom_croom`
--

INSERT INTO `meetingroom_croom` (`cr_id`, `name`, `net`, `location`, `parent`, `pro`, `board`, `comp`, `type`, `tt`, `dater`, `picType`, `picData`) VALUES
(1, 'ห้องทดสอบ', 15, '', 7, 'มี', 'มี', 'มี', '1', 0, '', '', 'blank.jpg'),
(2, 'ห้องสโมสรนักศึกษา', 34, '', 7, '-', '-', '-', '1', 0, '', '', 'blank.jpg'),
(3, 'ห้องปฏิบัติการคอมพิวเตอร์', 80, '', 18, 'มี', 'มี', 'มี', '1', 0, '', '', 'blank.jpg'),
(4, 'ห้องโสตฯ', 45, '', 7, 'มี', '-', '-', '1', 0, '', '', 'blank.jpg'),
(7, 'ห้องประชุม', 0, '', 0, '0', '', '', '1', 0, '', '', 'blank.jpg'),
(18, 'ห้องเรียน', 0, '', 0, '0', '', '', '', 0, '', '', '');

-- --------------------------------------------------------

--
-- โครงสร้างตาราง `meetingroom_food`
--

CREATE TABLE IF NOT EXISTS `meetingroom_food` (
  `food_id` int(11) NOT NULL auto_increment,
  `food` varchar(100) NOT NULL,
  `cost` int(5) NOT NULL,
  PRIMARY KEY  (`food_id`),
  KEY `food` (`food`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- dump ตาราง `meetingroom_food`
--


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

CREATE TABLE IF NOT EXISTS `meetingroom_media` (
  `media_id` int(11) NOT NULL auto_increment,
  `media` varchar(255) NOT NULL,
  PRIMARY KEY  (`media_id`),
  KEY `media` (`media`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- dump ตาราง `meetingroom_media`
--


-- --------------------------------------------------------

--
-- โครงสร้างตาราง `meetingroom_mediarelation`
--

CREATE TABLE IF NOT EXISTS `meetingroom_mediarelation` (
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

CREATE TABLE IF NOT EXISTS `meetingroom_userq` (
  `uq_id` int(11) NOT NULL auto_increment,
  `u_id` int(11) NOT NULL default '0',
  `cr_id` int(11) NOT NULL default '0',
  `uname` varchar(255) NOT NULL,
  `crname` varchar(29) NOT NULL default '',
  `Dater` varchar(20) NOT NULL default '0000-00-00' COMMENT 'วันที่จอง',
  `time_in` varchar(5) NOT NULL,
  `time_out` varchar(5) NOT NULL,
  `title` varchar(50) NOT NULL COMMENT 'หัวข้อการประชุม',
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
  PRIMARY KEY  (`uq_id`),
  KEY `title` (`title`)
) ENGINE=MyISAM  DEFAULT CHARSET=tis620 PACK_KEYS=0 AUTO_INCREMENT=16 ;

--
-- dump ตาราง `meetingroom_userq`
--

INSERT INTO `meetingroom_userq` (`uq_id`, `u_id`, `cr_id`, `uname`, `crname`, `Dater`, `time_in`, `time_out`, `title`, `detail`, `phone`, `type`, `pratan`, `optionss`, `T_in`, `T_out`, `created`, `status`, `confirm`, `confirm_by`) VALUES
(1, 1, 1, 'จิรัถ บุรพรัตน์', 'ห้องประชานารถ', '2010-04-08', '', '', 'sdfsdf', '27', '123456', '', 'sdf', '', '11', '12', '0000-00-00 00:00:00', 'sta', '0000-00-00 00:00:00', 0),
(2, 1, 1, 'จิรัถ บุรพรัตน์', 'ห้องประชานารถ', '2010-04-08', '', '', 'sdfsdf', '28', '12334', '', 'sdfsdf', '', '13', '14', '0000-00-00 00:00:00', 'sta', '0000-00-00 00:00:00', 0),
(4, 4, 1, 'นาย kk  jj', 'ห้องประชานารถ', '11 พฤศจิกายน 2550', '', '', 'dwadsda', '1', '2213213', '', 'ปช.ทหาร', '', '14', '15', '0000-00-00 00:00:00', 'sta', '0000-00-00 00:00:00', 0),
(5, 4, 1, 'นาย kk  jj', 'ห้องประชานารถ', '11 พฤศจิกายน 2550', '', '', 'asdawd', '28', '23214', '', 'ปช.ทหาร', '', '14', '15', '0000-00-00 00:00:00', 'sta', '0000-00-00 00:00:00', 0),
(7, 2, 1, 'ฝ่ายจัดการอุปกรณ์', 'ห้องประชานารถ', '11 พฤศจิกายน 2550', '', '', 'qdsdf', '123', '123', '', '', '', '15', '16', '0000-00-00 00:00:00', 'sta', '0000-00-00 00:00:00', 0),
(9, 9, 2, 'นาย kk  jj', 'ห้องสโมสรนักศึกษา', '2010-04-08', '', '', 'test', '123', '1234', '', '', '', '15', '16', '0000-00-00 00:00:00', 'sta', '0000-00-00 00:00:00', 0),
(10, 1, 2, 'ผู้บริหารบริหารระบบ', 'ห้องสโมสรนักศึกษา', '16 กันยายน 2550', '', '', 'dsfsdf', '1123', '1234', '', '', '', '15', '16', '0000-00-00 00:00:00', 'sta', '0000-00-00 00:00:00', 0),
(11, 1, 2, 'ผู้บริหารบริหารระบบ', 'ห้องสโมสรนักศึกษา', '16 กันยายน 2550', '', '', 'sfsfsf', '123', '123', '', '', '', '15', '16', '0000-00-00 00:00:00', 'sta', '0000-00-00 00:00:00', 0);

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
  `Types` char(1) NOT NULL,
  `Posit` char(1) NOT NULL default '',
  PRIMARY KEY  (`DeID`),
  KEY `Fname` (`Fname`),
  KEY `Fname_2` (`Fname`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 PACK_KEYS=0 COMMENT='???ง?/?????' AUTO_INCREMENT=45 ;

--
-- dump ตาราง `organization`
--

INSERT INTO `organization` (`DeID`, `Code`, `Fname`, `Sname`, `Chair`, `Types`, `Posit`) VALUES
(1, '', 'ภาควิชา', '', '', '0', ''),
(2, 'PHPN', 'ภาควิชาการพยาบาลสาธารณสุข', 'ภาคพยาบาล', 'หัวหน้าภาควิชา', '1', '1'),
(3, 'PHMI', 'ภาควิชาจุลชีววิทยา', 'ภาคจุลชีว', 'หัวหน้าภาควิชา', '1', '1'),
(4, 'PHBS', 'ภาควิชาชีวสถิติ', 'ชีวสถิติ', 'หัวหน้าภาควิชา', '1', '1'),
(5, 'PHAD', 'ภาควิชาบริหารงานสาธารณสุข', 'ภาคบริหาร', 'หัวหน้าภาควิชา', '1', '1'),
(6, 'PHPR', 'ภาควิชาปรสิตวิทยา', 'ภาคปรสิต', 'หัวหน้าภาควิชา', '1', '1'),
(7, 'PHNU', 'ภาควิชาโภชนวิทยา', 'ภาคโภชน', 'หัวหน้าภาควิชา', '1', '1'),
(8, 'PHEP', 'ภาควิชาระบาดวิทยา', 'ภาคระบาด', 'หัวหน้าภาควิชา', '1', '1'),
(9, 'PHSS', 'ภาควิชาวิทยาศาสตร์อนามัยสิ่งแวดล้อม', 'ภาควิทยาศาสตร์', 'หัวหน้าภาควิชา', '1', '1'),
(10, 'PHSE', 'ภาควิชาวิศวกรรมสุขาภิบาล', 'ภาควิศวกรรม', 'หัวหน้าภาควิชา', '1', '1'),
(11, 'PHHE', 'ภาควิชาสุขศึกษาและพฤติกรรมศาสตร์', 'ภาคสุขศึกษา', 'หัวหน้าภาควิชา', '1', '1'),
(12, 'PHFH', 'ภาควิชาอนามัยครอบครัว', 'ภาคอนามัย', 'หัวหน้าภาควิชา', '1', '1'),
(13, 'PHOH', 'ภาควิชาอาชีวอนามัยและความปลอดภัย', 'ภาคอาชีวอนามัย', 'หัวหน้าภาควิชา', '1', '1'),
(14, 'PHST', 'สถานฝึกอบรมและวิจัยอนามัยชนบท (กรุงเทพ)', 'สถานฝึก-กรุงเทพ', 'หัวหน้าสถานฝึกอบรม', '1', '1'),
(15, 'PHSO', 'สำนักงานคณบดี', 'สนง.คณบดี', 'หัวหน้าสำนักงาน', '0', '1'),
(44, 'PHST', 'สถานฝึกอบรมและวิจัยอนามัยชนบท (สูงเนิน)', 'สถานฝึก-สูงเนิน', '', '1', '1');

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


-- --------------------------------------------------------

--
-- โครงสร้างตาราง `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `NO` int(3) NOT NULL auto_increment,
  `USR_CODE` char(20) default '0',
  `USR_PAS` char(255) default '0',
  `USR_NAME` char(50) default '0',
  `USR_SURNAME` char(50) default '0',
  `DEPARTMENT_NO` int(3) default NULL,
  `SUBDEPARTMENT_NO` int(3) default NULL,
  `USR_LASTUPDATE` char(30) default '0',
  `admin` int(10) default NULL,
  `user` int(10) NOT NULL default '0',
  `report` int(10) NOT NULL default '0',
  `ONLINE_DELETE` int(10) NOT NULL default '0',
  `EMAIL` varchar(255) NOT NULL,
  `LOGIN` int(1) NOT NULL default '0',
  `BLOCK` int(1) NOT NULL default '0',
  `photo` text NOT NULL,
  `G_ID` enum('Member','Administrator') NOT NULL,
  PRIMARY KEY  (`NO`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=50 ;

--
-- dump ตาราง `user`
--

INSERT INTO `user` (`NO`, `USR_CODE`, `USR_PAS`, `USR_NAME`, `USR_SURNAME`, `DEPARTMENT_NO`, `SUBDEPARTMENT_NO`, `USR_LASTUPDATE`, `admin`, `user`, `report`, `ONLINE_DELETE`, `EMAIL`, `LOGIN`, `BLOCK`, `photo`, `G_ID`) VALUES
(1, 'admin', 'admin', 'ผู้ดูแลระบบ', 'CHARUPOOM', 15, 0, '2009-08-06 11:10:00', 0, 0, 0, 0, 'iceeagle99@gmail.com', 0, 0, 'Logo111.gif', 'Administrator'),
(9, 'amporn', '9507', 'เธญเธฑเธกเธเธฃ', 'เธเธฃเธฐเธขเธนเธฃเธเธดเธเธเธดเธเธธเธฅ', 4, 14, '0', 0, 0, 0, 0, 'localhost@localhost', 0, 0, 'Logo111.gif', 'Member'),
(10, 'suphan', 'spx11', 'เธเธฒเธขเธชเธธเธเธฃเธฃเธ', 'เนเธชเธเธเธญเธ', 4, 14, '0', 0, 0, 0, 0, '', 0, 0, '', ''),
(11, 'budget1', 'chxx3', 'เธเธฒเธขเนเธเธฅเธดเธกเธเธฑเธข', 'เธเธเธธเธเธงเธดเธเธขเน', 19, 0, '0', 6, 5, 1, 0, '', 0, 0, '', ''),
(12, 'budget2', 'srxx4', 'เธเธช.เธชเธธเธฃเธฒเธเธเน', 'เธชเธกเธเธเธฉเน', 4, 6, '0', 2, 2, 0, 0, '', 0, 0, '', ''),
(13, 'srisilp', 'srisilp', 'เธเธฒเธเธจเธฃเธตเธจเธดเธฅเธเน', 'เธเธเธชเธฒเธฃเธชเธดเธเธเธดเธเธฃ', 4, 10, '0', 7, 6, 1, 0, '', 0, 0, '', ''),
(14, 'CHOLLADA', 'CLXX6', 'เธเธฒเธเธเธฅเธฅเธเธฒ', 'เธงเธเธจเนเนเธเธตเนเธข', 4, 10, '0', 0, 0, 0, 0, '', 0, 0, '', ''),
(15, 'RACHADA', 'RCX17', 'เธเธฒเธเธฃเธฑเธเธเธฒ', 'เธฅเธดเธกเธเธชเธงเธฃ', 4, 16, '0', 0, 0, 0, 0, '', 0, 0, '', ''),
(16, 'NUTSARUN', 'NRX18', 'เธเธช.เธเธฑเธเธชเธฃเธฑเธ', 'เธเธฃเธฃเธกเธเธเธฃเธฑเธเธเน', 15, 0, '0', 5, 5, 0, 0, '', 0, 0, '', ''),
(17, 'AREE', 'REX19', 'เธเธฒเธเธญเธฒเธฃเธตเธขเน', 'เธเธณเธชเธธเธงเธฃเธฃเธ', 15, 0, '0', 1, 1, 0, 0, '', 0, 0, '', ''),
(18, 'LAOKENG', 'PTXX9', 'เธเธช.เธเธฑเธเธกเธฒ', 'เนเธฅเธฒเนเธเนเธ', 3, 0, '0', 0, 0, 0, 0, '', 0, 0, '', ''),
(19, 'BUNGON', 'BOX2X', 'เธเธช.เธเธฑเธเธญเธฃ', 'เนเธญเธทเนเธญเธกเธเธเธฅเธเธฑเธข', 3, 0, '0', 30, 28, 2, 0, '', 0, 0, '', ''),
(20, 'EM-ON', 'MOX21', 'เธเธฒเธเนเธญเธกเธญเธฃ', 'เนเธเธจเธฅเธเธธเธเธดเนเธเธ', 31, 0, '0', 8, 6, 2, 0, '', 0, 0, '', ''),
(21, 'PUNNEE', '0043255', 'เธเธช.เธเธฃเธฃเธเธต', 'เธเธเธฒเธเธเนเธฃเธเธก', 1, 0, '0', 40, 39, 1, 0, '', 0, 0, '', ''),
(22, 'SUWIMON', 'WIX23', 'เธเธฒเธเธชเธธเธงเธดเธกเธฅ', 'เธญเธดเธเธเธฐเนเธชเธ', 5, 0, '0', 36, 25, 11, 0, '', 0, 0, '', ''),
(23, 'PASUPA', 'PAX24', 'เธเธช.เธเธชเธธเธ�เธฒ', 'เธเธดเธเธงเธฃเนเธชเธ�เธฒเธ', 5, 0, '0', 0, 0, 0, 0, '', 0, 0, '', ''),
(24, 'PIMJAI', 'PJX31', 'เธเธช.เธเธดเธกเธเนเนเธ', 'เธชเธธเธงเธฃเธฃเธเธ�เธนเธกเธด', 6, 0, '0', 1, 1, 0, 0, '', 0, 0, '', ''),
(25, 'SAOWANEE', 'SOX25', 'เธเธช.เนเธชเธฒเธงเธเธตเธขเน', 'เธกเธธเธชเธดเนเธเธ', 9, 0, '0', 0, 0, 0, 0, '', 0, 0, '', ''),
(26, 'ANONG', '999888', 'เธเธช.เธญเธเธเธเน', 'เธเธณเนเธเธฃเนเธเนเธง', 9, 0, '0', 0, 0, 0, 0, '', 0, 0, '', ''),
(27, 'MANOON', 'NOX27', 'เธเธฒเธขเธกเธเธนเธ', 'เธญเธฃเนเธฒเธกเธฃเธฑเธเธเน', 14, 0, '0', 0, 0, 0, 0, '', 0, 0, '', ''),
(28, 'PHONGPORN', 'PPX28', 'เธเธช.เธเธเธจเนเธ�เธฃเธเน', 'เนเธฅเธดเธจเธฃเธฑเธเธเธเธฒเธเธเน', 14, 0, '0', 0, 0, 0, 0, '', 0, 0, '', ''),
(29, 'ARUNEE', 'RNX29', 'เธเธฒเธเธญเธฃเธธเธเธต', 'เธเธเธฉเนเธกเธฐเธฅเธดเธงเธฑเธฅเธขเน', 7, 0, '0', 1, 1, 0, 0, '', 0, 0, '', ''),
(30, 'OCPLO', 'JPX3X', 'เธเธช.เธเธฑเธเธเธฃเนเนเธเนเธ', 'เนเธกเธเธฒเธญเธ�เธดเธฃเธฑเธเธฉเน', 17, 0, '0', 0, 0, 0, 0, '', 0, 0, '', ''),
(31, 'pavana', 'kunkai', 'เธ�เธฒเธงเธเธฒ', 'เนเธเธเธเธเธญเธกเธกเนเธฒ', 0, 0, '0', 0, 0, 0, 0, '', 0, 0, '', ''),
(32, 'Janthorn', 'janthorn', 'เธเธช.เธเธฑเธเธเธฃ', 'เธเธดเธฅเธเนเธเธกเธฅ', 4, 6, '0', 0, 0, 0, 0, '', 0, 0, '', ''),
(33, 'Radee', 'radee', 'เธเธฒเธเธเธฑเธเธเธฑเธเธฃเธเธต', 'เธซเธธเนเธเธเธดเธเธฑเธเธฉเน', 4, 6, '0', 0, 0, 0, 0, '', 0, 0, '', ''),
(34, '123', '123', 'เธฃเธจ.เธเธธเธเธฃเธฑเธเธฉเธฒ', 'เธชเธธเธเธเธฃเธเธฃเธฃเธก', 30, 0, '0', 53, 32, 21, 0, '', 0, 0, '', ''),
(35, 'nimt', 'nimt', 'เธเธธเธเธเธฃเธดเธกเธฒ', 'เนเธเธดเธเธญเธธเธเธก', 21, 19, '0', 0, 0, 0, 0, '', 0, 0, '', ''),
(36, 'pattariya', 'aompatta', 'เธเธธเธเธ�เธฑเธเธฃเธดเธขเธฒ', 'เนเธเธขเธกเธเธต', 9, 0, '0', 0, 0, 0, 0, '', 0, 0, '', ''),
(37, 'pakaporn', 'pakaporn', 'เธเธฒเธเธ�เธเธเธฃ', 'เธงเธฑเธเธเธเธธเธฅ', 20, 0, '0', 0, 0, 0, 0, '', 0, 0, '', ''),
(38, 'wasawan', 'niaorth', 'เธเธช.เธงเธจเธงเธฃเธฃเธ', 'เธฃเธนเนเธฃเธฑเธเธเธต', 16, 0, '0', 0, 0, 0, 0, '', 0, 0, '', ''),
(40, 'sakara', '3009', 'เธเธช.เธชเธฐเธเธฒเธฃเธฐ', 'เธเธงเธเนเธเนเธเธฃเน', 4, 6, '0', 0, 0, 0, 0, '', 0, 0, '', ''),
(41, 'pathom', 'yamkate2', 'เธเธฒเธขเธเธเธก', 'เนเธซเธขเธกเนเธเธเธธ', 25, 0, '0', 0, 0, 0, 0, '', 0, 0, '', ''),
(42, 'saovanee', '95341297', 'เธเธช.เนเธชเธฒเธงเธเธตเธขเน', 'เธเธฃเธชเธธเธเนเธเธดเนเธกเธเธนเธ', 14, 0, '0', 1, 1, 0, 0, '', 0, 0, '', ''),
(43, 'winita', '000999', 'เธเธช.เธงเธดเธเธดเธเธฒ', 'เธเธทเนเธเธเนเธงเธ', 4, 14, '0', 619, 508, 121, 1, '', 0, 0, '', ''),
(44, 'somsri', '1111', 'เธ.เธช.เธชเธกเธจเธฃเธต', 'เธเนเธณเนเธชเธ', 31, 0, '0', 3, 3, 0, 0, '', 0, 0, '', ''),
(45, 'ladda', 'ladda', 'เธ.เธช.เธฅเธฑเธเธเธฒ', 'เธเนเธฒเธขเธเนเธฒ', 4, 14, '0', 188, 182, 6, 0, '', 0, 0, '', ''),
(46, 'nittaya', 'n123', 'เธเธฒเธเธเธดเธเธขเธฒ', 'เธเธฑเธเธเธฃเธฑเธเธเน', 5, 11, '0', 0, 0, 0, 0, '', 0, 0, '', ''),
(47, 'butsara', '2512', 'เธเธฒเธเธเธธเธจเธฃเธฒ', 'เนเธขเนเธกเนเธเธฉเธฃ', 4, 14, '0', 418, 188, 230, 0, '', 0, 0, '', ''),
(48, 'kamolrat', 'thong980', 'เธเธกเธฅเธฃเธฑเธเธเน', 'เธเธญเธเธเธฃเธฐเนเธ', 31, 0, '0', NULL, 0, 0, 0, '', 0, 0, '', ''),
(49, 'natamon', '0911', 'เธ.เธช.เธเธเธกเธ', 'เธเธทเนเธเธเนเธงเธ', 4, 14, '0', 205, 132, 76, 0, '', 0, 0, '', '');

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8 PACK_KEYS=0 COMMENT='เธเธฑเธเธเธถเธเธเธฒเธฃเนเธเนเธฒเนเธเนเธเธฒเธเธฃ' AUTO_INCREMENT=1 ;

--
-- dump ตาราง `user_log`
--


/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
