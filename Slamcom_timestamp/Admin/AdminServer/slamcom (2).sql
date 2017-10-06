-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Oct 02, 2017 at 06:37 AM
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
-- Table structure for table `adminusers`
--

CREATE TABLE `adminusers` (
  `userID` int(11) NOT NULL,
  `firstname` varchar(30) NOT NULL,
  `lastname` varchar(30) NOT NULL,
  `emailaddress` varchar(50) NOT NULL,
  `password` varchar(200) NOT NULL,
  `Active` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `adminusers`
--

INSERT INTO `adminusers` (`userID`, `firstname`, `lastname`, `emailaddress`, `password`, `Active`) VALUES
(1, 'Voltaire', 'Caoile', 'slamcom.vjay@gmail.com', 'admin1234', 1),
(2, 'Robin', 'Tubungbanua', 'dalmiet@gmail.com', '$2y$10$QiyEN0YqbNqd4', 1);

-- --------------------------------------------------------

--
-- Table structure for table `specialcases`
--

CREATE TABLE `specialcases` (
  `totalHoliday` varchar(10) NOT NULL,
  `totalSpecialHoliday` varchar(10) NOT NULL,
  `totalrestDay` varchar(10) NOT NULL,
  `userID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
(16, 0, '', '', 1, '9:00 PM', '11:59 PM', 1, '12:00 AM', '9:00 PM', 0, '', '', 0, '', '', 0, '', '', 0, '', '', 1);

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
('2017-09-26 09:32:00', '2017-09-26 09:32:00', '00:00:00.000000', 1);

-- --------------------------------------------------------

--
-- Table structure for table `totalhourspermonth`
--

CREATE TABLE `totalhourspermonth` (
  `TotalLate` varchar(20) NOT NULL,
  `TotalHours` varchar(20) NOT NULL,
  `TotalOvertime` varchar(20) NOT NULL,
  `userID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `totalhourspermonth`
--

INSERT INTO `totalhourspermonth` (`TotalLate`, `TotalHours`, `TotalOvertime`, `userID`) VALUES
('01:03:59', '00:00:00', '00:00:00', 1);

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
(4, 'Jami Brent', 'The Faggot', 'jamifagget@yahoo.com', '$2y$10$XFNTYeSs395lvfk9sP16HOShCsJIAQHVTxyJpVfonxqbh57X6IoDa', 1, 1),
(5, 'Dave Dexter', 'Faggot', 'davefaggot@gmail.com', '$2y$10$jp2ghrlSP.rd/Gir7OkomOb/5OlB0mVKgEJIhT2xyIwrjmwOM0oPi', 2, 1),
(6, 'Jeremy', 'Shawarma', 'shawarmalover@gmail.com', '$2y$10$yBj0PKwK9jpUeqBovUomk.wKGJ.jH4kAgbeiuNxks.HTPxWi3SZnq', 1, 1),
(7, 'Jesus', 'Ramos', 'thechosenone@gmail.com', '$2y$10$SRB6LztBH071r.cs56v0de2v4q5yfi2Mz2D1Pri2RpcOLwISi8KPy', 3, 1),
(8, 'Kirby', 'Cataluna', 'therealmorty@gmail.com', '$2y$10$Hl/DXyNavH53Q1k0K3IKMuCw5wogvMzNnSsyMdx4LAu5UAk9xRu/q', 0, 0);

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
-- Indexes for dumped tables
--

--
-- Indexes for table `adminusers`
--
ALTER TABLE `adminusers`
  ADD PRIMARY KEY (`userID`);

--
-- Indexes for table `specialcases`
--
ALTER TABLE `specialcases`
  ADD KEY `userID` (`userID`);

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
-- Indexes for table `totalhourspermonth`
--
ALTER TABLE `totalhourspermonth`
  ADD PRIMARY KEY (`userID`);

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
  MODIFY `userID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
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
  MODIFY `userID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `userschedule`
--
ALTER TABLE `userschedule`
  MODIFY `ScheduleID` int(11) NOT NULL AUTO_INCREMENT;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `specialcases`
--
ALTER TABLE `specialcases`
  ADD CONSTRAINT `specialcases_ibfk_1` FOREIGN KEY (`userID`) REFERENCES `user` (`userID`);

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
-- Constraints for table `totalhourspermonth`
--
ALTER TABLE `totalhourspermonth`
  ADD CONSTRAINT `totalhourspermonth_ibfk_1` FOREIGN KEY (`userID`) REFERENCES `user` (`userID`);

--
-- Constraints for table `userschedule`
--
ALTER TABLE `userschedule`
  ADD CONSTRAINT `userschedule_ibfk_1` FOREIGN KEY (`UserID`) REFERENCES `user` (`userID`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
