-- phpMyAdmin SQL Dump
-- version 4.4.3
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jun 08, 2015 at 02:01 PM
-- Server version: 5.6.24
-- PHP Version: 5.6.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `allsys`
--

-- --------------------------------------------------------

--
-- Table structure for table `administrator`
--

CREATE TABLE IF NOT EXISTS `administrator` (
  `Adno` int(11) NOT NULL,
  `vono` int(11) DEFAULT NULL,
  `Bossno` int(11) DEFAULT NULL,
  `Adremark` varchar(40) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `area`
--

CREATE TABLE IF NOT EXISTS `area` (
  `Ano` int(11) NOT NULL,
  `Aplace` varchar(100) DEFAULT NULL,
  `Disastertype` varchar(200) DEFAULT NULL,
  `Vcount` int(11) DEFAULT NULL,
  `Traffic` varchar(40) DEFAULT NULL,
  `Supplies` varchar(40) DEFAULT NULL,
  `Report` varchar(100) DEFAULT NULL,
  `Aremark` varchar(300) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `citizen`
--

CREATE TABLE IF NOT EXISTS `citizen` (
  `ID` varchar(18) NOT NULL,
  `Name` varchar(20) DEFAULT NULL,
  `Pass` varchar(20) DEFAULT NULL,
  `Sex` int(11) DEFAULT NULL,
  `Race` varchar(10) DEFAULT NULL,
  `Home` varchar(40) DEFAULT NULL,
  `Bloodtype` int(11) DEFAULT NULL,
  `Ano` int(11) DEFAULT NULL,
  `Level` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `citizen`
--

INSERT INTO `citizen` (`ID`, `Name`, `Pass`, `Sex`, `Race`, `Home`, `Bloodtype`, `Ano`, `Level`) VALUES
('00000', 'Swind', '00000', 0, NULL, NULL, 0, 0, 0),
('11111', '1111', NULL, 0, '', '', 0, 0, 0),
('11112', 'çŽ‹2', NULL, 0, 'æ±‰æ—', 'ä¸­å›½ä¸Šæµ·', 2, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `news`
--

CREATE TABLE IF NOT EXISTS `news` (
  `SHNO` int(10) NOT NULL,
  `ANO` int(10) NOT NULL,
  `NEWS` varchar(2000) COLLATE utf8_unicode_ci NOT NULL,
  `date` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `Author` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `Pic` varchar(50) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `news`
--

INSERT INTO `news` (`SHNO`, `ANO`, `NEWS`, `date`, `Author`, `Pic`) VALUES
(0, 0, 'æ–°é—»åŠŸèƒ½æµ‹è¯•', '2015-01-01', 'swind', ''),
(0, 0, 'æ ¹æ®å—äº¬æ°”è±¡å°çš„ç»Ÿè®¡æ•°æ®ï¼Œå½“æ—¥æµ¦å£ã€åŸŽåŒºã€æ±Ÿå®çš„é™é›¨è¶…è¿‡100æ¯«ç±³ï¼Œå±žäºŽå¤§æš´é›¨ã€‚â€œ@å—äº¬å‘å¸ƒâ€å¾®åšç§°ï¼šâ€œå—äº¬å¸‚æ°”è±¡å°05æ—¶å‘å¸ƒæš´é›¨è­¦æŠ¥ï¼Œä»Šå¤©é›¨æœ€å¤§æ—¶ï¼Œæ¯å°æ—¶é™é›¨é‡æˆ–è¾¾30~50æ¯«ç±³ï¼Œç›¸å½“äºŽä¸€å°æ—¶å†²å…¨åŸŽå€’ä¸‹3.3äº¿å¨æ°´ï¼Œç­‰äºŽ54ä¸ªçŽ„æ­¦æ¹–ï¼Œç®—åˆ°æ¯ä¸ªäººå¤´ä¸Šï¼Œè¦è¢«40å¨æ°´æ´—åˆ·ä¸€éã€‚â€', '2015-06-01', 'swind', 'http://dawenhua.com.cn/uploads/allimg/150603/00501'),
(0, 0, 'é’“é±¼å²›å‘ç”Ÿé±¼ç¾ï¼Œæ•°ä»¥wanjiçš„é±¼å†²ä¸Šå²›å±¿ã€‚', '2015-01-01', 'swind', ''),
(0, 0, 'é‚£ä¸€ç¾¤é±¼å†²ä¸Šäº†æ—¥æœ¬å²›ï¼ï¼', '2015-09-09', 'swind', ''),
(0, 0, 'é‚£ç¾¤é±¼è¢«åšæˆäº†ç”Ÿé±¼ç‰‡ï¼é‚£ç¾¤é±¼è¢«åšæˆäº†ç”Ÿé±¼ç‰‡ï¼é‚£ç¾¤é±¼è¢«åšæˆäº†ç”Ÿé±¼ç‰‡ï¼é‚£ç¾¤é±¼è¢«åšæˆäº†ç”Ÿé±¼ç‰‡ï¼é‚£ç¾¤é±¼è¢«åšæˆäº†ç”Ÿé±¼ç‰‡ï¼é‚£ç¾¤é±¼è¢«åšæˆäº†ç”Ÿé±¼ç‰‡ï¼é‚£ç¾¤é±¼è¢«åšæˆäº†ç”Ÿé±¼ç‰‡ï¼é‚£ç¾¤é±¼è¢«åšæˆäº†ç”Ÿé±¼ç‰‡ï¼é‚£ç¾¤é±¼è¢«åšæˆäº†ç”Ÿé±¼ç‰‡ï¼é‚£ç¾¤é±¼è¢«åšæˆäº†ç”Ÿé±¼ç‰‡ï¼é‚£ç¾¤é±¼è¢«åšæˆäº†ç”Ÿé±¼ç‰‡ï¼é‚£ç¾¤é±¼è¢«åšæˆäº†ç”Ÿé±¼ç‰‡ï¼é‚£ç¾¤é±¼è¢«åšæˆäº†ç”Ÿé±¼ç‰‡ï¼é‚£ç¾¤é±¼è¢«åšæˆäº†ç”Ÿé±¼ç‰‡ï¼', '2015-03-03', 'swind', ''),
(0, 0, 'å›¾ç‰‡æµ‹è¯•', '2015-02-04', 'swind', 'http://picture.youth.cn/qtdb/201506/W0201506021632');

-- --------------------------------------------------------

--
-- Table structure for table `shelter`
--

CREATE TABLE IF NOT EXISTS `shelter` (
  `Shno` int(11) NOT NULL,
  `Ano` varchar(40) DEFAULT NULL,
  `SHname` varchar(40) DEFAULT NULL,
  `SHaddress` varchar(60) DEFAULT NULL,
  `SHstate` int(11) DEFAULT NULL,
  `Shnow` int(11) DEFAULT NULL,
  `Shlimit` int(11) DEFAULT NULL,
  `Adno` int(11) DEFAULT NULL,
  `Shremark` varchar(200) DEFAULT NULL,
  `locationX` varchar(10) NOT NULL,
  `locationY` varchar(10) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `shelter`
--

INSERT INTO `shelter` (`Shno`, `Ano`, `SHname`, `SHaddress`, `SHstate`, `Shnow`, `Shlimit`, `Adno`, `Shremark`, `locationX`, `locationY`) VALUES
(2, '0', 'åº‡æŠ¤æ‰€1', 'è¥¿åŒ—', NULL, 173, 377, NULL, 'è¥¿åŒ—æ–¹å‘åº‡æŠ¤æ‰€ï¼Œå¯æ”¶çº³ç¾æ°‘ï¼Œæœ‰å……è¶³çš„ç‰©èµ„', '120', '40'),
(3, '0', 'åº‡æŠ¤æ‰€2', 'ä¸œå—', NULL, 23, 133, NULL, 'ä¸œå—æ–¹å‘åº‡æŠ¤æ‰€ï¼Œæœ‰å……è¶³çš„æ•‘æ´ç‰©èµ„ï¼Œåœ°å¤„å®‰å…¨åŒºåŸŸã€‚', '117', '44');

-- --------------------------------------------------------

--
-- Table structure for table `supplies`
--

CREATE TABLE IF NOT EXISTS `supplies` (
  `Suno` int(11) NOT NULL,
  `Suname` varchar(40) DEFAULT NULL,
  `Sutype` int(11) DEFAULT NULL,
  `Sustate` int(11) DEFAULT NULL,
  `Suamount` int(11) DEFAULT NULL,
  `Suunit` varchar(20) DEFAULT NULL,
  `Suremark` varchar(100) DEFAULT NULL,
  `Recvtime` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `Recvplace` varchar(40) DEFAULT NULL,
  `Shno` int(11) DEFAULT NULL,
  `Trsrc` int(11) DEFAULT NULL,
  `Trdst` int(11) DEFAULT NULL,
  `Trstart` datetime DEFAULT NULL,
  `Trend` datetime DEFAULT NULL,
  `Trno` varchar(30) NOT NULL,
  `ID` varchar(17) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `supplies`
--

INSERT INTO `supplies` (`Suno`, `Suname`, `Sutype`, `Sustate`, `Suamount`, `Suunit`, `Suremark`, `Recvtime`, `Recvplace`, `Shno`, `Trsrc`, `Trdst`, `Trstart`, `Trend`, `Trno`, `ID`) VALUES
(6, 'æ¯›å·¾', 1, 1, 333, NULL, 'çº¢è‰²', '2015-06-08 11:17:46', '3', 3, NULL, NULL, NULL, NULL, '', ''),
(7, 'è¢«å­', 2, 1, 4555, NULL, 'å†›ç»¿è‰²', '2015-06-08 11:22:39', '2', 2, NULL, NULL, NULL, NULL, '', '');

-- --------------------------------------------------------

--
-- Table structure for table `task`
--

CREATE TABLE IF NOT EXISTS `task` (
  `Tno` int(11) NOT NULL,
  `Tname` varchar(40) DEFAULT NULL,
  `Adno` int(11) DEFAULT NULL,
  `Tstatus` int(11) DEFAULT NULL,
  `Tremark` varchar(300) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `task`
--

INSERT INTO `task` (`Tno`, `Tname`, `Adno`, `Tstatus`, `Tremark`) VALUES
(8, 'ä»»åŠ¡è¯·æ±‚2', NULL, 0, 'åœ¨XXXåœ°åŒºæžåº¦ç¼ºæ°´ï¼Œè¯·æ±‚æ´åŠ©'),
(9, 'æ–°å»ºä»»åŠ¡æµ‹è¯•1', NULL, 1, '6æœˆ2æ—¥ï¼Œæ±Ÿè‹å¤šåœ°å‡ºçŽ°æš´é›¨ï¼Œçœä¼šå—äº¬æ›´æ˜¯è¾¾åˆ°å¤§æš´é›¨çº§åˆ«ï¼Œè¿™æ˜¯å—äº¬ä»Šå¹´æ¥æœ€å¤§çš„ä¸€åœºé›¨ï¼Œå…¨åŸŽè¢«æ·¹ï¼Œéƒ¨åˆ†åœ°åŒºæ°´æ·±åŠè…°ã€‚è™½æœªåˆ°æ¢…é›¨å­£èŠ‚ï¼Œä½†å—äº¬è¿™åœºé›¨ï¼Œå·²é¢‡å…·æ±›æœŸç¥žéŸµã€‚');

-- --------------------------------------------------------

--
-- Table structure for table `victim`
--

CREATE TABLE IF NOT EXISTS `victim` (
  `Vno` int(11) NOT NULL,
  `ID` varchar(18) DEFAULT NULL,
  `Vstatus` varchar(10) DEFAULT NULL,
  `Vfamily` varchar(40) DEFAULT NULL,
  `Vtime` datetime DEFAULT NULL,
  `Vplace` varchar(40) DEFAULT NULL,
  `Injury` varchar(10) DEFAULT NULL,
  `Vhospital` varchar(40) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `remark` varchar(100) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `victim`
--

INSERT INTO `victim` (`Vno`, `ID`, `Vstatus`, `Vfamily`, `Vtime`, `Vplace`, `Injury`, `Vhospital`, `remark`) VALUES
(6, '11111', '', '', '0000-00-00 00:00:00', '', '', '', ''),
(7, '11112', 'å—ä¼¤', 'å¼ 4', '2015-06-01 00:00:00', 'é•¿æ±Ÿ', 'è½»ä¼¤', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `volunteer`
--

CREATE TABLE IF NOT EXISTS `volunteer` (
  `Vono` int(11) NOT NULL,
  `ID` varchar(18) DEFAULT NULL,
  `Vostatus` int(11) DEFAULT NULL,
  `Voheight` int(11) DEFAULT NULL,
  `Voweight` int(11) DEFAULT NULL,
  `Voedu` varchar(60) DEFAULT NULL,
  `Voplace` varchar(60) DEFAULT NULL,
  `Shno` int(11) DEFAULT NULL,
  `Vofamily` varchar(40) DEFAULT NULL,
  `locationX` varchar(10) NOT NULL,
  `locationY` varchar(10) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `volunteer`
--

INSERT INTO `volunteer` (`Vono`, `ID`, `Vostatus`, `Voheight`, `Voweight`, `Voedu`, `Voplace`, `Shno`, `Vofamily`, `locationX`, `locationY`) VALUES
(4, '00000', 1, 187, 75, '', NULL, NULL, NULL, '', '');

-- --------------------------------------------------------

--
-- Table structure for table `vo_t`
--

CREATE TABLE IF NOT EXISTS `vo_t` (
  `Vono` int(11) DEFAULT NULL,
  `Tno` varchar(40) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `vo_t`
--

INSERT INTO `vo_t` (`Vono`, `Tno`) VALUES
(3, '4');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `administrator`
--
ALTER TABLE `administrator`
  ADD PRIMARY KEY (`Adno`);

--
-- Indexes for table `area`
--
ALTER TABLE `area`
  ADD PRIMARY KEY (`Ano`);

--
-- Indexes for table `citizen`
--
ALTER TABLE `citizen`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `shelter`
--
ALTER TABLE `shelter`
  ADD PRIMARY KEY (`Shno`);

--
-- Indexes for table `supplies`
--
ALTER TABLE `supplies`
  ADD PRIMARY KEY (`Suno`);

--
-- Indexes for table `task`
--
ALTER TABLE `task`
  ADD PRIMARY KEY (`Tno`);

--
-- Indexes for table `victim`
--
ALTER TABLE `victim`
  ADD PRIMARY KEY (`Vno`);

--
-- Indexes for table `volunteer`
--
ALTER TABLE `volunteer`
  ADD PRIMARY KEY (`Vono`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `shelter`
--
ALTER TABLE `shelter`
  MODIFY `Shno` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `supplies`
--
ALTER TABLE `supplies`
  MODIFY `Suno` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `task`
--
ALTER TABLE `task`
  MODIFY `Tno` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `victim`
--
ALTER TABLE `victim`
  MODIFY `Vno` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `volunteer`
--
ALTER TABLE `volunteer`
  MODIFY `Vono` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
