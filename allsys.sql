-- phpMyAdmin SQL Dump
-- version 4.3.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 2015-05-19 13:10:57
-- 服务器版本： 5.6.24
-- PHP Version: 5.5.24

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
-- 表的结构 `administrator`
--

CREATE TABLE IF NOT EXISTS `administrator` (
  `Adno` int(11) NOT NULL,
  `vono` int(11) DEFAULT NULL,
  `Bossno` int(11) DEFAULT NULL,
  `Adremark` varchar(40) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- 表的结构 `area`
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
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- 表的结构 `citizen`
--

CREATE TABLE IF NOT EXISTS `citizen` (
  `ID` varchar(18) NOT NULL,
  `Name` varchar(20) DEFAULT NULL,
  `Sex` int(11) DEFAULT NULL,
  `Race` varchar(10) DEFAULT NULL,
  `Home` varchar(40) DEFAULT NULL,
  `Bloodtype` int(11) DEFAULT NULL,
  `Ano` int(11) DEFAULT NULL,
  `Level` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- 表的结构 `dead`
--

CREATE TABLE IF NOT EXISTS `dead` (
  `Vno` int(11) NOT NULL,
  `DVtime` datetime DEFAULT NULL,
  `DVplace` varchar(40) DEFAULT NULL,
  `Corpse` varchar(60) DEFAULT NULL,
  `DVremark` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- 表的结构 `injured`
--

CREATE TABLE IF NOT EXISTS `injured` (
  `Vno` int(11) NOT NULL,
  `Injury` varchar(10) DEFAULT NULL,
  `Ivplace` varchar(30) DEFAULT NULL,
  `Ivremark` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- 表的结构 `missing`
--

CREATE TABLE IF NOT EXISTS `missing` (
  `Vno` int(11) NOT NULL,
  `MVTime` datetime DEFAULT NULL,
  `MVplace` varchar(40) DEFAULT NULL,
  `MVremark` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- 表的结构 `receivingsu`
--

CREATE TABLE IF NOT EXISTS `receivingsu` (
  `Suno` int(11) DEFAULT NULL,
  `Recvtime` datetime DEFAULT NULL,
  `Recvplace` varchar(40) DEFAULT NULL,
  `Recvremark` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- 表的结构 `shelter`
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
  `Shremark` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- 表的结构 `storesu`
--

CREATE TABLE IF NOT EXISTS `storesu` (
  `Suno` int(11) DEFAULT NULL,
  `Shno` int(11) DEFAULT NULL,
  `Stremark` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- 表的结构 `supplies`
--

CREATE TABLE IF NOT EXISTS `supplies` (
  `Suno` int(11) NOT NULL,
  `Suname` varchar(40) DEFAULT NULL,
  `Sutype` int(11) DEFAULT NULL,
  `Sustate` int(11) DEFAULT NULL,
  `Suamount` int(11) DEFAULT NULL,
  `Suunit` varchar(20) DEFAULT NULL,
  `Suremark` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- 表的结构 `task`
--

CREATE TABLE IF NOT EXISTS `task` (
  `Tno` int(11) NOT NULL,
  `Tname` varchar(10) DEFAULT NULL,
  `Adno` int(11) DEFAULT NULL,
  `Tstatus` int(11) DEFAULT NULL,
  `Tremark` varchar(300) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- 表的结构 `transsu`
--

CREATE TABLE IF NOT EXISTS `transsu` (
  `Suno` int(11) DEFAULT NULL,
  `Trsrc` int(11) DEFAULT NULL,
  `Trdst` int(11) DEFAULT NULL,
  `Trstart` datetime DEFAULT NULL,
  `Trend` datetime DEFAULT NULL,
  `Trremark` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- 表的结构 `usingsu`
--

CREATE TABLE IF NOT EXISTS `usingsu` (
  `Suno` int(11) DEFAULT NULL,
  `Shno` int(11) DEFAULT NULL,
  `Usstart` datetime DEFAULT NULL,
  `Usend` datetime DEFAULT NULL,
  `Usleft` int(11) DEFAULT NULL,
  `Usremark` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- 表的结构 `victim`
--

CREATE TABLE IF NOT EXISTS `victim` (
  `Vno` int(11) NOT NULL,
  `ID` varchar(18) DEFAULT NULL,
  `Vstatus` varchar(10) DEFAULT NULL,
  `Vfamily` varchar(40) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- 转存表中的数据 `victim`
--

INSERT INTO `victim` (`Vno`, `ID`, `Vstatus`, `Vfamily`) VALUES
(3, '2013-2-2', 'ss', 'ss');

-- --------------------------------------------------------

--
-- 表的结构 `volunteer`
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
  `Vofamily` varchar(40) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- 表的结构 `vo_t`
--

CREATE TABLE IF NOT EXISTS `vo_t` (
  `Vono` int(11) DEFAULT NULL,
  `Tno` varchar(40) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
-- Indexes for table `dead`
--
ALTER TABLE `dead`
  ADD PRIMARY KEY (`Vno`);

--
-- Indexes for table `injured`
--
ALTER TABLE `injured`
  ADD PRIMARY KEY (`Vno`);

--
-- Indexes for table `missing`
--
ALTER TABLE `missing`
  ADD PRIMARY KEY (`Vno`);

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

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
