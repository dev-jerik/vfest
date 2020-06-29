-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 29, 2020 at 07:08 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `vfes_info`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_class`
--

CREATE TABLE `tbl_class` (
  `classID` int(11) NOT NULL,
  `gradelevel` int(11) NOT NULL,
  `SY` int(11) NOT NULL,
  `studID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_class`
--

INSERT INTO `tbl_class` (`classID`, `gradelevel`, `SY`, `studID`) VALUES
(1, 3, 2020, 1),
(2, 4, 2020, 2),
(3, 4, 2020, 2),
(4, 4, 2020, 3),
(5, 4, 2020, 4),
(6, 4, 2019, 1),
(7, 4, 2019, 2),
(8, 4, 2019, 3),
(9, 4, 2019, 4);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_curriculum`
--

CREATE TABLE `tbl_curriculum` (
  `gradelevel` int(11) NOT NULL,
  `gradename` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_curriculum`
--

INSERT INTO `tbl_curriculum` (`gradelevel`, `gradename`) VALUES
(1, 'Daycare'),
(2, 'Kinder 1'),
(3, 'Kinder 2'),
(4, 'Grade 1'),
(5, 'Grade 2'),
(6, 'Grade 3'),
(7, 'Grade 4'),
(8, 'Grade 5'),
(9, 'Grade 6');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_educbg`
--

CREATE TABLE `tbl_educbg` (
  `level` int(11) NOT NULL,
  `perID` int(11) NOT NULL,
  `degree` varchar(100) NOT NULL,
  `school` varchar(150) NOT NULL,
  `yrstart` year(4) NOT NULL,
  `yrend` year(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_educbg`
--

INSERT INTO `tbl_educbg` (`level`, `perID`, `degree`, `school`, `yrstart`, `yrend`) VALUES
(1, 1, 'BEED', 'Visayas State University', 2010, 0000);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_gradefees`
--

CREATE TABLE `tbl_gradefees` (
  `code` int(11) NOT NULL,
  `gradelevel` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_gradesubjects`
--

CREATE TABLE `tbl_gradesubjects` (
  `gradelevel` int(11) NOT NULL,
  `subID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_gradesubjects`
--

INSERT INTO `tbl_gradesubjects` (`gradelevel`, `subID`) VALUES
(4, 1),
(4, 2),
(4, 3),
(4, 4),
(4, 5),
(4, 6),
(4, 7),
(4, 8),
(5, 9);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_parents`
--

CREATE TABLE `tbl_parents` (
  `PID` int(11) NOT NULL,
  `plast_name` varchar(150) NOT NULL,
  `pfirst_name` varchar(150) NOT NULL,
  `pmiddle_name` varchar(150) NOT NULL,
  `psex` enum('f','m') NOT NULL,
  `occupation` varchar(150) NOT NULL,
  `VSUconnected` enum('Yes','No') NOT NULL,
  `deptoffice` varchar(150) NOT NULL,
  `officehead` varchar(100) NOT NULL,
  `officeAdd` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_parents`
--

INSERT INTO `tbl_parents` (`PID`, `plast_name`, `pfirst_name`, `pmiddle_name`, `psex`, `occupation`, `VSUconnected`, `deptoffice`, `officehead`, `officeAdd`) VALUES
(1, 'Barcos', 'Nilo', 'Escasinas', 'f', 'forman', 'No', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_personproof`
--

CREATE TABLE `tbl_personproof` (
  `perID` int(11) NOT NULL,
  `l_name` varchar(50) NOT NULL,
  `f_name` varchar(50) NOT NULL,
  `m_name` varchar(20) NOT NULL,
  `sdob` date NOT NULL,
  `ssex` enum('f','m','o') NOT NULL,
  `sphone` varchar(50) NOT NULL,
  `scivilstatus` enum('Single','Married','Live in','Widowed','Separate') NOT NULL,
  `shome_add` varchar(150) NOT NULL,
  `eligibility` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_personproof`
--

INSERT INTO `tbl_personproof` (`perID`, `l_name`, `f_name`, `m_name`, `sdob`, `ssex`, `sphone`, `scivilstatus`, `shome_add`, `eligibility`) VALUES
(1, 'dhebz', 'dhebz', 'L', '1997-03-21', 'm', '456789', 'Live in', 'Baybay City Leyte', 'admin'),
(2, 'Barcos', 'Thalia', 'b', '2020-06-09', 'm', '0987654322', 'Single', 'Baybay', 'Accountant'),
(3, 'Tabada', 'Winston', 'b', '2020-06-09', 'm', '0987654322', 'Married', 'Visca', 'Dept. Head'),
(4, 'Lavina', 'Charity Mae', 'S', '2020-06-09', 'm', '0987654322', 'Single', 'Baybay', 'Instructor'),
(5, 'Park', 'Sandara', 'dara', '2020-06-12', 'm', '0987654321', 'Live in', 'Baybay City Leyte', 'ELIT');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_proof`
--

CREATE TABLE `tbl_proof` (
  `studID` int(11) NOT NULL,
  `docID` int(11) NOT NULL,
  `datesubmitted` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_pupilparents`
--

CREATE TABLE `tbl_pupilparents` (
  `studID` int(11) NOT NULL,
  `PID` int(11) NOT NULL,
  `role` enum('Father','Mother','Guardian') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_pupilparents`
--

INSERT INTO `tbl_pupilparents` (`studID`, `PID`, `role`) VALUES
(1, 1, 'Father');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_reqdoc`
--

CREATE TABLE `tbl_reqdoc` (
  `docID` int(11) NOT NULL,
  `description` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_schoolfees`
--

CREATE TABLE `tbl_schoolfees` (
  `code` int(11) NOT NULL,
  `description` varchar(150) NOT NULL,
  `amount` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_servicerec`
--

CREATE TABLE `tbl_servicerec` (
  `srID` int(11) NOT NULL,
  `perID` int(11) NOT NULL,
  `date_started` date NOT NULL,
  `position` varchar(50) NOT NULL,
  `monthly_salary` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_servicerec`
--

INSERT INTO `tbl_servicerec` (`srID`, `perID`, `date_started`, `position`, `monthly_salary`) VALUES
(1, 1, '2013-04-03', 'admin', '30,000'),
(2, 4, '2019-06-04', 'Teacher', '35,000');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_siblings`
--

CREATE TABLE `tbl_siblings` (
  `sib_ID` int(11) NOT NULL,
  `studID` int(11) NOT NULL,
  `givenName` varchar(50) NOT NULL,
  `dob` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_siblings`
--

INSERT INTO `tbl_siblings` (`sib_ID`, `studID`, `givenName`, `dob`) VALUES
(1, 1, 'Anjie G. Barcos', '2016-03-17'),
(2, 1, 'Thalia Barcos', '2020-06-09');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_students`
--

CREATE TABLE `tbl_students` (
  `studID` int(11) NOT NULL,
  `last_name` varchar(25) NOT NULL,
  `first_name` varchar(25) NOT NULL,
  `middle_name` varchar(25) NOT NULL,
  `gender` enum('f','m') NOT NULL,
  `dob` date NOT NULL,
  `pob` varchar(50) NOT NULL,
  `religion` varchar(50) NOT NULL,
  `last_school` varchar(150) NOT NULL,
  `school_add` varchar(150) NOT NULL,
  `curr_grdlevel` int(11) NOT NULL DEFAULT 0,
  `fam_add` varchar(50) NOT NULL,
  `phone` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_students`
--

INSERT INTO `tbl_students` (`studID`, `last_name`, `first_name`, `middle_name`, `gender`, `dob`, `pob`, `religion`, `last_school`, `school_add`, `curr_grdlevel`, `fam_add`, `phone`) VALUES
(1, 'Barcos', 'Angel', 'Goder', 'm', '2014-03-17', 'Brgy. Altavista Baybay City Leyte', 'Catholic', 'Altavista Elementary School', 'Brgy. Altavista Baybay City Leyte', 3, 'Santa Felomina Baybay City Leyte', '093582687483'),
(2, 'Taotao', 'Dhebie', 'Lombog', 'f', '2020-06-06', 'Baybay', 'Catholic', 'Visca', 'Visca, Baybay', 4, 'Baybay', '3456789'),
(3, 'aaaaaaa', 'aaaaaaa', 'aaaaaaa', 'f', '2020-06-06', 'Baybay', 'Catholic', 'Visca', 'Visca, Baybay', 4, 'Baybay', '3456789'),
(4, 'bbbbb', 'bbbbb', 'bcbcbc', 'm', '2020-06-06', 'Baybay', 'Catholic', 'Visca', 'Visca, Baybay', 4, 'Baybay', '3456789');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_subjects`
--

CREATE TABLE `tbl_subjects` (
  `subID` int(11) NOT NULL,
  `description` varchar(150) NOT NULL,
  `hrsperwk` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_subjects`
--

INSERT INTO `tbl_subjects` (`subID`, `description`, `hrsperwk`) VALUES
(1, 'Filipino 1', '1'),
(2, 'English 1', '1'),
(3, 'Math 1', '1'),
(4, 'Economics 1', '1'),
(5, 'Science 1', '1'),
(6, 'EPP 1', '1'),
(7, 'Values 1', '1'),
(8, 'MAPEH 1', '1'),
(9, 'Economics 2', '1');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_sysectionadvi`
--

CREATE TABLE `tbl_sysectionadvi` (
  `gradelevel` int(11) NOT NULL,
  `SY` int(11) NOT NULL,
  `secAdviserID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_sysectionadvi`
--

INSERT INTO `tbl_sysectionadvi` (`gradelevel`, `SY`, `secAdviserID`) VALUES
(4, 2020, 4),
(4, 2019, 4);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_users`
--

CREATE TABLE `tbl_users` (
  `user_ID` int(11) NOT NULL,
  `perID` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `usercode` enum('admin','teacher','principal','accounting') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_users`
--

INSERT INTO `tbl_users` (`user_ID`, `perID`, `username`, `password`, `usercode`) VALUES
(1, 1, 'admin', 'admin', 'admin'),
(2, 2, 'account', 'account', 'accounting'),
(3, 3, 'principal', 'principal', 'principal'),
(4, 4, 'teacher', 'teacher', 'teacher');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_class`
--
ALTER TABLE `tbl_class`
  ADD PRIMARY KEY (`classID`),
  ADD KEY `SY` (`SY`) USING BTREE,
  ADD KEY `FK_tbl_class_tbl_curriculum` (`gradelevel`),
  ADD KEY `FK_tbl_class_tbl_students` (`studID`);

--
-- Indexes for table `tbl_curriculum`
--
ALTER TABLE `tbl_curriculum`
  ADD PRIMARY KEY (`gradelevel`);

--
-- Indexes for table `tbl_educbg`
--
ALTER TABLE `tbl_educbg`
  ADD PRIMARY KEY (`level`),
  ADD UNIQUE KEY `perID` (`perID`);

--
-- Indexes for table `tbl_gradefees`
--
ALTER TABLE `tbl_gradefees`
  ADD PRIMARY KEY (`code`),
  ADD UNIQUE KEY `gradelevel` (`gradelevel`);

--
-- Indexes for table `tbl_gradesubjects`
--
ALTER TABLE `tbl_gradesubjects`
  ADD UNIQUE KEY `subID` (`subID`),
  ADD KEY `gradelevel` (`gradelevel`) USING BTREE;

--
-- Indexes for table `tbl_parents`
--
ALTER TABLE `tbl_parents`
  ADD PRIMARY KEY (`PID`);

--
-- Indexes for table `tbl_personproof`
--
ALTER TABLE `tbl_personproof`
  ADD PRIMARY KEY (`perID`);

--
-- Indexes for table `tbl_proof`
--
ALTER TABLE `tbl_proof`
  ADD PRIMARY KEY (`docID`),
  ADD UNIQUE KEY `studID` (`studID`);

--
-- Indexes for table `tbl_pupilparents`
--
ALTER TABLE `tbl_pupilparents`
  ADD UNIQUE KEY `studID` (`studID`),
  ADD UNIQUE KEY `PID` (`PID`);

--
-- Indexes for table `tbl_reqdoc`
--
ALTER TABLE `tbl_reqdoc`
  ADD UNIQUE KEY `docID` (`docID`);

--
-- Indexes for table `tbl_schoolfees`
--
ALTER TABLE `tbl_schoolfees`
  ADD UNIQUE KEY `code` (`code`);

--
-- Indexes for table `tbl_servicerec`
--
ALTER TABLE `tbl_servicerec`
  ADD PRIMARY KEY (`srID`),
  ADD UNIQUE KEY `perID` (`perID`);

--
-- Indexes for table `tbl_siblings`
--
ALTER TABLE `tbl_siblings`
  ADD PRIMARY KEY (`sib_ID`),
  ADD KEY `studID` (`studID`) USING BTREE;

--
-- Indexes for table `tbl_students`
--
ALTER TABLE `tbl_students`
  ADD PRIMARY KEY (`studID`),
  ADD KEY `FK_tbl_students_tbl_curriculum` (`curr_grdlevel`);

--
-- Indexes for table `tbl_subjects`
--
ALTER TABLE `tbl_subjects`
  ADD PRIMARY KEY (`subID`);

--
-- Indexes for table `tbl_sysectionadvi`
--
ALTER TABLE `tbl_sysectionadvi`
  ADD KEY `FK_tbl_sysectionadvi_tbl_personproof` (`secAdviserID`),
  ADD KEY `gradelevel` (`gradelevel`) USING BTREE,
  ADD KEY `SY` (`SY`) USING BTREE;

--
-- Indexes for table `tbl_users`
--
ALTER TABLE `tbl_users`
  ADD PRIMARY KEY (`user_ID`),
  ADD UNIQUE KEY `perID` (`perID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_class`
--
ALTER TABLE `tbl_class`
  MODIFY `classID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tbl_class`
--
ALTER TABLE `tbl_class`
  ADD CONSTRAINT `FK_tbl_class_tbl_curriculum` FOREIGN KEY (`gradelevel`) REFERENCES `tbl_curriculum` (`gradelevel`),
  ADD CONSTRAINT `FK_tbl_class_tbl_students` FOREIGN KEY (`studID`) REFERENCES `tbl_students` (`studID`);

--
-- Constraints for table `tbl_educbg`
--
ALTER TABLE `tbl_educbg`
  ADD CONSTRAINT `tbl_educbg_ibfk_1` FOREIGN KEY (`perID`) REFERENCES `tbl_personproof` (`perID`);

--
-- Constraints for table `tbl_gradefees`
--
ALTER TABLE `tbl_gradefees`
  ADD CONSTRAINT `tbl_gradefees_ibfk_1` FOREIGN KEY (`gradelevel`) REFERENCES `tbl_curriculum` (`gradelevel`);

--
-- Constraints for table `tbl_gradesubjects`
--
ALTER TABLE `tbl_gradesubjects`
  ADD CONSTRAINT `tbl_gradesubjects_ibfk_1` FOREIGN KEY (`gradelevel`) REFERENCES `tbl_curriculum` (`gradelevel`),
  ADD CONSTRAINT `tbl_gradesubjects_ibfk_2` FOREIGN KEY (`subID`) REFERENCES `tbl_subjects` (`subID`);

--
-- Constraints for table `tbl_proof`
--
ALTER TABLE `tbl_proof`
  ADD CONSTRAINT `tbl_proof_ibfk_1` FOREIGN KEY (`studID`) REFERENCES `tbl_students` (`studID`);

--
-- Constraints for table `tbl_pupilparents`
--
ALTER TABLE `tbl_pupilparents`
  ADD CONSTRAINT `tbl_pupilparents_ibfk_1` FOREIGN KEY (`studID`) REFERENCES `tbl_students` (`studID`),
  ADD CONSTRAINT `tbl_pupilparents_ibfk_2` FOREIGN KEY (`PID`) REFERENCES `tbl_parents` (`PID`);

--
-- Constraints for table `tbl_reqdoc`
--
ALTER TABLE `tbl_reqdoc`
  ADD CONSTRAINT `tbl_reqdoc_ibfk_1` FOREIGN KEY (`docID`) REFERENCES `tbl_proof` (`docID`);

--
-- Constraints for table `tbl_schoolfees`
--
ALTER TABLE `tbl_schoolfees`
  ADD CONSTRAINT `tbl_schoolfees_ibfk_1` FOREIGN KEY (`code`) REFERENCES `tbl_gradefees` (`code`);

--
-- Constraints for table `tbl_servicerec`
--
ALTER TABLE `tbl_servicerec`
  ADD CONSTRAINT `tbl_servicerec_ibfk_1` FOREIGN KEY (`perID`) REFERENCES `tbl_personproof` (`perID`);

--
-- Constraints for table `tbl_siblings`
--
ALTER TABLE `tbl_siblings`
  ADD CONSTRAINT `tbl_siblings_ibfk_1` FOREIGN KEY (`studID`) REFERENCES `tbl_students` (`studID`);

--
-- Constraints for table `tbl_students`
--
ALTER TABLE `tbl_students`
  ADD CONSTRAINT `FK_tbl_students_tbl_curriculum` FOREIGN KEY (`curr_grdlevel`) REFERENCES `tbl_curriculum` (`gradelevel`);

--
-- Constraints for table `tbl_sysectionadvi`
--
ALTER TABLE `tbl_sysectionadvi`
  ADD CONSTRAINT `FK_tbl_sysectionadvi_tbl_personproof` FOREIGN KEY (`secAdviserID`) REFERENCES `tbl_personproof` (`perID`),
  ADD CONSTRAINT `tbl_sysectionadvi_ibfk_1` FOREIGN KEY (`gradelevel`) REFERENCES `tbl_curriculum` (`gradelevel`),
  ADD CONSTRAINT `tbl_sysectionadvi_ibfk_2` FOREIGN KEY (`SY`) REFERENCES `tbl_class` (`SY`);

--
-- Constraints for table `tbl_users`
--
ALTER TABLE `tbl_users`
  ADD CONSTRAINT `tbl_users_ibfk_1` FOREIGN KEY (`perID`) REFERENCES `tbl_personproof` (`perID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
