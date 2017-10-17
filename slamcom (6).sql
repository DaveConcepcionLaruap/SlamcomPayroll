-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Oct 17, 2017 at 05:04 PM
-- Server version: 10.1.19-MariaDB
-- PHP Version: 5.6.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `slamcom`
--

-- --------------------------------------------------------

--
-- Table structure for table `absenttable`
--

CREATE TABLE `absenttable` (
  `id` int(11) NOT NULL,
  `date` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `absenttable`
--

INSERT INTO `absenttable` (`id`, `date`) VALUES
(1, '2017/10/12'),
(2, '2017/10/12'),
(5, '2017/10/12'),
(7, '2017/10/12'),
(9, '2017/10/12'),
(10, '2017/10/12'),
(11, '2017/10/12');

-- --------------------------------------------------------

--
-- Table structure for table `adminusers`
--

CREATE TABLE `adminusers` (
  `userID` int(11) NOT NULL,
  `firstname` varchar(30) NOT NULL,
  `lastname` varchar(30) NOT NULL,
  `bday` date NOT NULL,
  `address` varchar(60) NOT NULL,
  `email` varchar(60) NOT NULL,
  `mobileNo` varchar(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(200) NOT NULL,
  `Active` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `adminusers`
--

INSERT INTO `adminusers` (`userID`, `firstname`, `lastname`, `bday`, `address`, `email`, `mobileNo`, `username`, `password`, `Active`) VALUES
(1, 'Voltaire', 'Caoile', '0000-00-00', '', 'slamcom.vjay@gmail.com', '', 'slamcom.vjay@gmail.com', 'admin1234', 1),
(2, 'Robin', 'Tubungbanua', '0000-00-00', '', 'dalmiet@gmail.com', '', 'dalmiet@gmail.com', '$2y$10$QiyEN0YqbNqd4', 1),
(3, 'Dave', 'Concepcion', '1997-10-20', 'Lower Camp 8, Toledo City', 'dkave123@gmail.com', '09420393483', 'user', 'user', 1),
(4, 'Sherbert', 'Takumi', '0000-00-00', '', 'sherbert@gmail.com', '', '', '$2y$10$Vhl4QW02P9oUxI5rzO95eueexf76jXl7Ki7JNZUtE3Q9k3CFNEFfu', 1);

-- --------------------------------------------------------

--
-- Table structure for table `employeeinfo`
--

CREATE TABLE `employeeinfo` (
  `id` int(11) NOT NULL,
  `monthlySalary` float NOT NULL,
  `late` int(11) NOT NULL,
  `absent` float NOT NULL,
  `overTimie` float NOT NULL,
  `restDay` float NOT NULL,
  `adjustment` float NOT NULL,
  `hiloday` float NOT NULL,
  `specialHoliday` float NOT NULL,
  `totalNumberOfDays` int(11) NOT NULL,
  `npHours` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `item`
--

CREATE TABLE `item` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `category` enum('Office Equipments','Office Supplies','Some Stuff') NOT NULL,
  `qty` int(11) NOT NULL,
  `itemDesc` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `item`
--

INSERT INTO `item` (`id`, `name`, `category`, `qty`, `itemDesc`) VALUES
(1, 'Computer', 'Office Equipments', 30, 'Dave sucks'),
(3, 'Keyboards', 'Office Equipments', 20, 'test');

-- --------------------------------------------------------

--
-- Table structure for table `team`
--

CREATE TABLE `team` (
  `TeamID` int(11) NOT NULL,
  `TeamName` varchar(20) NOT NULL,
  `TeamDesc` varchar(250) NOT NULL,
  `Active` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `team`
--

INSERT INTO `team` (`TeamID`, `TeamName`, `TeamDesc`, `Active`) VALUES
(1, 'google', 'call center for google', 1),
(2, 'microsoft', 'kek', 0),
(3, 'I love siomai', 'we love siomai we all love siomai', 1);

-- --------------------------------------------------------

--
-- Table structure for table `teamschedule`
--

CREATE TABLE `teamschedule` (
  `ScheduleID` int(11) NOT NULL,
  `MondayShift` tinyint(1) NOT NULL,
  `mondayTimeIn` varchar(24) DEFAULT NULL,
  `mondayTimeOut` varchar(24) DEFAULT NULL,
  `TuesdayShift` tinyint(1) NOT NULL,
  `tuesdayTimeIn` varchar(24) DEFAULT NULL,
  `tuesdayTimeOut` varchar(24) DEFAULT NULL,
  `WednesdayShift` tinyint(1) NOT NULL,
  `wednesdayTimeIn` varchar(24) DEFAULT NULL,
  `wednesdayTimeOut` varchar(24) DEFAULT NULL,
  `ThursdayShift` tinyint(1) NOT NULL,
  `thursdayTimeIn` varchar(24) DEFAULT NULL,
  `thursdayTimeOut` varchar(24) DEFAULT NULL,
  `FridayShift` tinyint(1) NOT NULL,
  `fridayTimeIn` varchar(24) DEFAULT NULL,
  `fridayTimeOut` varchar(24) DEFAULT NULL,
  `SaturdayShift` tinyint(1) NOT NULL,
  `saturdayTimeIn` varchar(24) DEFAULT NULL,
  `saturdayTimeOut` varchar(24) DEFAULT NULL,
  `SundayShift` tinyint(1) NOT NULL,
  `sundayTimeIn` varchar(24) DEFAULT NULL,
  `sundayTimeOut` varchar(24) DEFAULT NULL,
  `TeamID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `teamschedule`
--

INSERT INTO `teamschedule` (`ScheduleID`, `MondayShift`, `mondayTimeIn`, `mondayTimeOut`, `TuesdayShift`, `tuesdayTimeIn`, `tuesdayTimeOut`, `WednesdayShift`, `wednesdayTimeIn`, `wednesdayTimeOut`, `ThursdayShift`, `thursdayTimeIn`, `thursdayTimeOut`, `FridayShift`, `fridayTimeIn`, `fridayTimeOut`, `SaturdayShift`, `saturdayTimeIn`, `saturdayTimeOut`, `SundayShift`, `sundayTimeIn`, `sundayTimeOut`, `TeamID`) VALUES
(16, 0, '', '', 1, '9:00 PM', '11:59 PM', 1, '12:00 AM', '9:00 PM', 0, '', '', 1, '9:00 PM', '11:59 PM', 1, '12:00 AM', '9:00 AM', 0, '', '', 1);

-- --------------------------------------------------------

--
-- Table structure for table `timetable`
--

CREATE TABLE `timetable` (
  `timeIn` datetime NOT NULL,
  `timeOut` datetime NOT NULL,
  `HoursMade` time(6) NOT NULL,
  `userID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `timetable`
--

INSERT INTO `timetable` (`timeIn`, `timeOut`, `HoursMade`, `userID`) VALUES
('2017-09-26 09:31:00', '2017-09-26 09:31:00', '00:00:00.000000', 1),
('2017-09-26 09:32:00', '2017-09-26 09:32:00', '00:00:00.000000', 1),
('2017-10-09 06:00:00', '2017-10-09 06:08:00', '00:08:00.000000', 9),
('2017-10-09 06:10:00', '2017-10-09 06:14:00', '00:04:00.000000', 9),
('2017-10-13 09:05:00', '2017-10-13 09:16:00', '00:11:00.000000', 1),
('2017-10-13 09:19:00', '2017-10-13 09:25:00', '00:06:00.000000', 1),
('2017-10-13 09:26:00', '2017-10-13 09:27:00', '00:01:00.000000', 1),
('2017-10-13 09:29:00', '2017-10-13 09:32:00', '00:03:00.000000', 1),
('2017-10-13 09:34:00', '2017-10-13 09:36:00', '00:02:00.000000', 1),
('2017-10-13 09:21:00', '2017-10-13 09:24:00', '00:03:00.000000', 1),
('2017-10-13 09:32:00', '2017-10-13 09:32:00', '00:00:00.000000', 1),
('2017-10-13 09:42:00', '2017-10-13 09:42:00', '00:00:00.000000', 1),
('2017-10-13 09:46:00', '2017-10-13 09:46:00', '00:00:00.000000', 1),
('2017-10-13 09:54:00', '2017-10-13 09:55:00', '00:01:00.000000', 1),
('2017-10-13 09:56:00', '2017-10-13 09:56:00', '00:00:00.000000', 1),
('2017-10-13 09:57:00', '2017-10-13 09:58:00', '00:01:00.000000', 1),
('2017-10-13 09:58:00', '2017-10-13 09:58:00', '00:00:00.000000', 1),
('2017-10-14 02:47:00', '2017-10-14 02:47:00', '00:00:00.000000', 1),
('2017-10-13 09:07:00', '2017-10-13 09:07:00', '00:00:00.000000', 1),
('2017-10-13 09:07:00', '2017-10-13 09:08:00', '00:01:00.000000', 1),
('2017-10-13 09:08:00', '2017-10-13 09:09:00', '00:01:00.000000', 1),
('2017-10-13 09:09:00', '2017-10-13 09:09:00', '00:00:00.000000', 1),
('2017-10-13 09:10:00', '2017-10-13 09:10:00', '00:00:00.000000', 1),
('2017-10-13 09:11:00', '2017-10-13 09:11:00', '00:00:00.000000', 1),
('2017-10-13 09:13:00', '2017-10-13 09:13:00', '00:00:00.000000', 1),
('2017-10-13 09:23:00', '2017-10-13 09:23:00', '00:00:00.000000', 1),
('2017-10-13 09:35:00', '2017-10-13 09:35:00', '00:00:00.000000', 1),
('2017-10-13 09:35:00', '2017-10-13 09:35:00', '00:00:00.000000', 1),
('2017-10-13 09:35:00', '2017-10-13 09:35:00', '00:00:00.000000', 1),
('2017-10-13 09:37:00', '2017-10-13 09:37:00', '00:00:00.000000', 1),
('2017-10-13 09:38:00', '2017-10-13 09:38:00', '00:00:00.000000', 1),
('2017-10-13 09:38:00', '2017-10-13 09:38:00', '00:00:00.000000', 1),
('2017-10-13 09:52:00', '2017-10-13 09:52:00', '00:00:00.000000', 1),
('2017-10-13 09:53:00', '2017-10-13 09:53:00', '00:00:00.000000', 1),
('2017-10-13 09:54:00', '2017-10-13 09:54:00', '00:00:00.000000', 1),
('2017-10-13 09:57:00', '2017-10-13 09:57:00', '00:00:00.000000', 11),
('2017-10-13 09:58:00', '2017-10-13 09:58:00', '00:00:00.000000', 9),
('2017-10-13 10:03:00', '2017-10-13 10:03:00', '00:00:00.000000', 1),
('2017-10-13 10:04:00', '2017-10-13 10:05:00', '00:01:00.000000', 1),
('2017-10-13 10:05:00', '2017-10-13 10:05:00', '00:00:00.000000', 1),
('2017-10-13 10:07:00', '2017-10-13 10:07:00', '00:00:00.000000', 1),
('2017-10-13 10:08:00', '2017-10-13 10:08:00', '00:00:00.000000', 1),
('2017-10-13 10:09:00', '2017-10-13 10:09:00', '00:00:00.000000', 1),
('2017-10-13 10:09:00', '2017-10-13 10:09:00', '00:00:00.000000', 11),
('2017-10-13 10:10:00', '2017-10-13 10:10:00', '00:00:00.000000', 9),
('2017-10-13 10:11:00', '2017-10-13 10:11:00', '00:00:00.000000', 9),
('2017-10-13 10:12:00', '2017-10-13 10:12:00', '00:00:00.000000', 11),
('2017-10-13 10:13:00', '2017-10-13 10:13:00', '00:00:00.000000', 9),
('2017-10-13 10:13:00', '2017-10-13 10:13:00', '00:00:00.000000', 10),
('2017-10-13 10:13:00', '2017-10-13 10:13:00', '00:00:00.000000', 10),
('2017-10-13 10:39:00', '2017-10-13 10:39:00', '00:00:00.000000', 11),
('2017-10-13 10:40:00', '2017-10-13 10:40:00', '00:00:00.000000', 9),
('2017-10-13 10:51:00', '2017-10-13 10:51:00', '00:00:00.000000', 1),
('2017-10-13 10:51:00', '2017-10-13 10:51:00', '00:00:00.000000', 9),
('2017-10-13 10:52:00', '2017-10-13 10:52:00', '00:00:00.000000', 11),
('2017-10-14 01:07:00', '2017-10-14 01:07:00', '00:00:00.000000', 1),
('2017-10-14 09:07:00', '2017-10-14 09:07:00', '00:00:00.000000', 1),
('2017-10-13 09:08:00', '2017-10-13 09:08:00', '00:00:00.000000', 1);

-- --------------------------------------------------------

--
-- Table structure for table `totalholiday`
--

CREATE TABLE `totalholiday` (
  `TotalLate` varchar(20) NOT NULL,
  `TotalHours` varchar(20) NOT NULL,
  `TotalOvertime` varchar(20) NOT NULL,
  `userID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `totalholiday`
--

INSERT INTO `totalholiday` (`TotalLate`, `TotalHours`, `TotalOvertime`, `userID`) VALUES
('00:00:00', '00:00:00', '00:00:00', 1),
('00:00:00', '00:00:00', '00:00:00', 11);

-- --------------------------------------------------------

--
-- Table structure for table `totalhourspermonth`
--

CREATE TABLE `totalhourspermonth` (
  `TotalLate` varchar(20) NOT NULL DEFAULT '00:00:00',
  `TotalHours` varchar(20) NOT NULL DEFAULT '00:00:00',
  `TotalOvertime` varchar(20) NOT NULL DEFAULT '00:00:00',
  `TotalAbsent` int(11) NOT NULL DEFAULT '0',
  `userID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `totalhourspermonth`
--

INSERT INTO `totalhourspermonth` (`TotalLate`, `TotalHours`, `TotalOvertime`, `TotalAbsent`, `userID`) VALUES
('00:00:00', '00:00:00', '00:00:00', 1, 1),
('00:00:00', '00:00:00', '00:00:00', 2, 2),
('00:00:00', '00:00:00', '00:00:00', 2, 5),
('00:00:00', '00:00:00', '00:00:00', 2, 7),
('00:00:00', '00:00:00', '00:00:00', 1, 9),
('00:00:00', '00:00:00', '00:00:00', 2, 10),
('00:00:00', '00:00:00', '00:00:00', 1, 11);

-- --------------------------------------------------------

--
-- Table structure for table `totalrestday`
--

CREATE TABLE `totalrestday` (
  `TotalHours` varchar(20) NOT NULL,
  `DaysRested` int(11) NOT NULL,
  `userID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `totalspecialholiday`
--

CREATE TABLE `totalspecialholiday` (
  `TotalLate` varchar(20) NOT NULL,
  `TotalHours` varchar(20) NOT NULL,
  `TotalOvertime` varchar(20) NOT NULL,
  `userID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `totalspecialholiday`
--

INSERT INTO `totalspecialholiday` (`TotalLate`, `TotalHours`, `TotalOvertime`, `userID`) VALUES
('00:00:00', '00:00:00', '00:00:00', 1);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `userID` int(11) NOT NULL,
  `firstname` varchar(30) NOT NULL,
  `lastname` varchar(30) NOT NULL,
  `emailadd` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `TeamID` int(11) NOT NULL,
  `active` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`userID`, `firstname`, `lastname`, `emailadd`, `password`, `TeamID`, `active`) VALUES
(1, 'Rupert Dalmy', 'Tubungbanua', 'dalmiet@gmail.com', '$2y$10$1d.SE/noFB4d643Vz/iC6./s0I1ZjZP20jxmJFwJPae9NujtuN44q', 1, 1),
(2, 'Hanneh Jonna', 'Wang', 'hannehwang@gmail.com', '$2y$10$t8QrMS9j.aqkAgIyd/Jw9OVZeumorcX8KUIaGJGbO/DD4hxYkso9q', 0, 1),
(3, 'Wilmar bae', 'Zaragoza', 'wilmarzara@gmail.com', '$2y$10$ijbJe6chi3JeE4p/oCVQBepRlP8zd5LpM4CdWsADMnDFuCVSBAZ9y', 0, 0),
(4, 'Jami Brent', 'The Faggot', 'jamifagget@yahoo.com', '$2y$10$XFNTYeSs395lvfk9sP16HOShCsJIAQHVTxyJpVfonxqbh57X6IoDa', 1, 0),
(5, 'Dave Dexter', 'Faggot', 'davefaggot@gmail.com', '$2y$10$jp2ghrlSP.rd/Gir7OkomOb/5OlB0mVKgEJIhT2xyIwrjmwOM0oPi', 2, 1),
(6, 'Jeremy', 'Shawarma', 'shawarmalover@gmail.com', '$2y$10$yBj0PKwK9jpUeqBovUomk.wKGJ.jH4kAgbeiuNxks.HTPxWi3SZnq', 1, 0),
(7, 'Jesus', 'Ramos', 'thechosenone@gmail.com', '$2y$10$SRB6LztBH071r.cs56v0de2v4q5yfi2Mz2D1Pri2RpcOLwISi8KPy', 3, 1),
(8, 'Kirby', 'Cataluna', 'therealmorty@gmail.com', '$2y$10$Hl/DXyNavH53Q1k0K3IKMuCw5wogvMzNnSsyMdx4LAu5UAk9xRu/q', 0, 0),
(9, 'Sherbert', 'Takumi', 'shertbertEmp@gmail.com', '$2y$10$tuhHBwoBcO.pCOIqNK7APODF.viRWHjy/WF/WFXgrRa48ZcW3bsOm', 0, 1),
(10, 'Jeremy', 'Shawarma', 'jsham@gmail.com', '$2y$10$mD6oFCr2JdiWkr6q1S9wF.99/882UeOUJv/4Q1hRkRLsQ71xNzTKq', 1, 1),
(11, 'Bobert', 'Takumi', 'BTak@gmail.com', '$2y$10$igg6kPd2b3ALt0Rpr2QCm.jNzj1hCdsfFCyQpEREgqRQIqUz0c2sy', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `userschedule`
--

CREATE TABLE `userschedule` (
  `ScheduleID` int(11) NOT NULL,
  `MondayShift` tinyint(1) NOT NULL,
  `mondayTimeIn` varchar(24) DEFAULT NULL,
  `mondayTimeOut` varchar(24) DEFAULT NULL,
  `TuesdayShift` tinyint(1) NOT NULL,
  `tuesdayTimeIn` varchar(24) DEFAULT NULL,
  `tuesdayTimeOut` varchar(24) DEFAULT NULL,
  `WednesdayShift` tinyint(1) NOT NULL,
  `wednesdayTimeIn` varchar(24) DEFAULT NULL,
  `wednesdayTimeOut` varchar(24) DEFAULT NULL,
  `ThursdayShift` tinyint(1) NOT NULL,
  `thursdayTimeIn` varchar(24) DEFAULT NULL,
  `thursdayTimeOut` varchar(24) DEFAULT NULL,
  `FridayShift` tinyint(1) NOT NULL,
  `fridayTimeIn` varchar(24) DEFAULT NULL,
  `fridayTimeOut` varchar(24) DEFAULT NULL,
  `SaturdayShift` tinyint(1) NOT NULL,
  `saturdayTimeIn` varchar(24) DEFAULT NULL,
  `saturdayTimeOut` varchar(24) DEFAULT NULL,
  `SundayShift` tinyint(1) NOT NULL,
  `sundayTimeIn` varchar(24) DEFAULT NULL,
  `sundayTimeOut` varchar(24) DEFAULT NULL,
  `UserID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `userschedule`
--

INSERT INTO `userschedule` (`ScheduleID`, `MondayShift`, `mondayTimeIn`, `mondayTimeOut`, `TuesdayShift`, `tuesdayTimeIn`, `tuesdayTimeOut`, `WednesdayShift`, `wednesdayTimeIn`, `wednesdayTimeOut`, `ThursdayShift`, `thursdayTimeIn`, `thursdayTimeOut`, `FridayShift`, `fridayTimeIn`, `fridayTimeOut`, `SaturdayShift`, `saturdayTimeIn`, `saturdayTimeOut`, `SundayShift`, `sundayTimeIn`, `sundayTimeOut`, `UserID`) VALUES
(1, 1, '4:15 AM', '9:00 PM', 0, '', '', 0, '', '', 0, '', '', 0, '', '', 0, '', '', 0, '', '', 2),
(2, 1, '5:00 PM', '10:00 PM', 0, '', '', 0, '', '', 0, '', '', 0, '', '', 0, '', '', 0, '', '', 9);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `adminusers`
--
ALTER TABLE `adminusers`
  ADD PRIMARY KEY (`userID`);

--
-- Indexes for table `employeeinfo`
--
ALTER TABLE `employeeinfo`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `item`
--
ALTER TABLE `item`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `team`
--
ALTER TABLE `team`
  ADD PRIMARY KEY (`TeamID`);

--
-- Indexes for table `teamschedule`
--
ALTER TABLE `teamschedule`
  ADD PRIMARY KEY (`ScheduleID`),
  ADD KEY `fk_foreignkey` (`TeamID`);

--
-- Indexes for table `timetable`
--
ALTER TABLE `timetable`
  ADD KEY `fk_timetable` (`userID`);

--
-- Indexes for table `totalholiday`
--
ALTER TABLE `totalholiday`
  ADD PRIMARY KEY (`userID`),
  ADD KEY `userID` (`userID`),
  ADD KEY `userID_2` (`userID`);

--
-- Indexes for table `totalhourspermonth`
--
ALTER TABLE `totalhourspermonth`
  ADD PRIMARY KEY (`userID`),
  ADD KEY `userID` (`userID`);

--
-- Indexes for table `totalspecialholiday`
--
ALTER TABLE `totalspecialholiday`
  ADD PRIMARY KEY (`userID`),
  ADD KEY `userID` (`userID`),
  ADD KEY `userID_2` (`userID`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`userID`);

--
-- Indexes for table `userschedule`
--
ALTER TABLE `userschedule`
  ADD PRIMARY KEY (`ScheduleID`),
  ADD KEY `fk_foreignkey` (`UserID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `adminusers`
--
ALTER TABLE `adminusers`
  MODIFY `userID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `item`
--
ALTER TABLE `item`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `team`
--
ALTER TABLE `team`
  MODIFY `TeamID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `teamschedule`
--
ALTER TABLE `teamschedule`
  MODIFY `ScheduleID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `userID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `userschedule`
--
ALTER TABLE `userschedule`
  MODIFY `ScheduleID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `employeeinfo`
--
ALTER TABLE `employeeinfo`
  ADD CONSTRAINT `employeeinfo_ibfk_1` FOREIGN KEY (`id`) REFERENCES `user` (`userID`);

--
-- Constraints for table `teamschedule`
--
ALTER TABLE `teamschedule`
  ADD CONSTRAINT `fk_foreignkey` FOREIGN KEY (`TeamID`) REFERENCES `team` (`TeamID`);

--
-- Constraints for table `timetable`
--
ALTER TABLE `timetable`
  ADD CONSTRAINT `fk_timetable` FOREIGN KEY (`userID`) REFERENCES `user` (`userID`);

--
-- Constraints for table `totalholiday`
--
ALTER TABLE `totalholiday`
  ADD CONSTRAINT `totalholiday_ibfk_1` FOREIGN KEY (`userID`) REFERENCES `user` (`userID`);

--
-- Constraints for table `totalhourspermonth`
--
ALTER TABLE `totalhourspermonth`
  ADD CONSTRAINT `totalhourspermonth_ibfk_1` FOREIGN KEY (`userID`) REFERENCES `user` (`userID`);

--
-- Constraints for table `totalspecialholiday`
--
ALTER TABLE `totalspecialholiday`
  ADD CONSTRAINT `totalspecialholiday_ibfk_1` FOREIGN KEY (`userID`) REFERENCES `user` (`userID`);

--
-- Constraints for table `userschedule`
--
ALTER TABLE `userschedule`
  ADD CONSTRAINT `userschedule_ibfk_1` FOREIGN KEY (`UserID`) REFERENCES `user` (`userID`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
