-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               10.4.11-MariaDB - mariadb.org binary distribution
-- Server OS:                    Win64
-- HeidiSQL Version:             11.0.0.5919
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


-- Dumping database structure for vfes_info
DROP DATABASE IF EXISTS `vfes_info`;
CREATE DATABASE IF NOT EXISTS `vfes_info` /*!40100 DEFAULT CHARACTER SET utf8mb4 */;
USE `vfes_info`;

-- Dumping structure for table vfes_info.tbl_class
DROP TABLE IF EXISTS `tbl_class`;
CREATE TABLE IF NOT EXISTS `tbl_class` (
  `gradelevel` int(11) NOT NULL,
  `SY` int(11) NOT NULL,
  `studID` int(11) NOT NULL,
  UNIQUE KEY `gradelevel` (`gradelevel`),
  UNIQUE KEY `studID` (`studID`),
  CONSTRAINT `tbl_class_ibfk_1` FOREIGN KEY (`gradelevel`) REFERENCES `tbl_curriculum` (`gradelevel`),
  CONSTRAINT `tbl_class_ibfk_2` FOREIGN KEY (`studID`) REFERENCES `tbl_students` (`studID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Dumping data for table vfes_info.tbl_class: ~2 rows (approximately)
/*!40000 ALTER TABLE `tbl_class` DISABLE KEYS */;
INSERT INTO `tbl_class` (`gradelevel`, `SY`, `studID`) VALUES
	(3, 2020, 1),
	(4, 2020, 2);
/*!40000 ALTER TABLE `tbl_class` ENABLE KEYS */;

-- Dumping structure for table vfes_info.tbl_curriculum
DROP TABLE IF EXISTS `tbl_curriculum`;
CREATE TABLE IF NOT EXISTS `tbl_curriculum` (
  `gradelevel` int(11) NOT NULL,
  `gradename` varchar(50) NOT NULL,
  PRIMARY KEY (`gradelevel`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Dumping data for table vfes_info.tbl_curriculum: ~9 rows (approximately)
/*!40000 ALTER TABLE `tbl_curriculum` DISABLE KEYS */;
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
/*!40000 ALTER TABLE `tbl_curriculum` ENABLE KEYS */;

-- Dumping structure for table vfes_info.tbl_educbg
DROP TABLE IF EXISTS `tbl_educbg`;
CREATE TABLE IF NOT EXISTS `tbl_educbg` (
  `level` int(11) NOT NULL,
  `perID` int(11) NOT NULL,
  `degree` varchar(100) NOT NULL,
  `school` varchar(150) NOT NULL,
  `yrstart` year(4) NOT NULL,
  `yrend` year(4) NOT NULL,
  PRIMARY KEY (`level`),
  UNIQUE KEY `perID` (`perID`),
  CONSTRAINT `tbl_educbg_ibfk_1` FOREIGN KEY (`perID`) REFERENCES `tbl_personproof` (`perID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Dumping data for table vfes_info.tbl_educbg: ~0 rows (approximately)
/*!40000 ALTER TABLE `tbl_educbg` DISABLE KEYS */;
INSERT INTO `tbl_educbg` (`level`, `perID`, `degree`, `school`, `yrstart`, `yrend`) VALUES
	(1, 1, 'BEED', 'Visayas State University', '2010', '0000');
/*!40000 ALTER TABLE `tbl_educbg` ENABLE KEYS */;

-- Dumping structure for table vfes_info.tbl_gradefees
DROP TABLE IF EXISTS `tbl_gradefees`;
CREATE TABLE IF NOT EXISTS `tbl_gradefees` (
  `code` int(11) NOT NULL,
  `gradelevel` int(11) NOT NULL,
  PRIMARY KEY (`code`),
  UNIQUE KEY `gradelevel` (`gradelevel`),
  CONSTRAINT `tbl_gradefees_ibfk_1` FOREIGN KEY (`gradelevel`) REFERENCES `tbl_curriculum` (`gradelevel`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Dumping data for table vfes_info.tbl_gradefees: ~0 rows (approximately)
/*!40000 ALTER TABLE `tbl_gradefees` DISABLE KEYS */;
/*!40000 ALTER TABLE `tbl_gradefees` ENABLE KEYS */;

-- Dumping structure for table vfes_info.tbl_gradesubjects
DROP TABLE IF EXISTS `tbl_gradesubjects`;
CREATE TABLE IF NOT EXISTS `tbl_gradesubjects` (
  `gradelevel` int(11) NOT NULL,
  `subID` int(11) NOT NULL,
  UNIQUE KEY `subID` (`subID`),
  KEY `gradelevel` (`gradelevel`) USING BTREE,
  CONSTRAINT `tbl_gradesubjects_ibfk_1` FOREIGN KEY (`gradelevel`) REFERENCES `tbl_curriculum` (`gradelevel`),
  CONSTRAINT `tbl_gradesubjects_ibfk_2` FOREIGN KEY (`subID`) REFERENCES `tbl_subjects` (`subID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Dumping data for table vfes_info.tbl_gradesubjects: ~9 rows (approximately)
/*!40000 ALTER TABLE `tbl_gradesubjects` DISABLE KEYS */;
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
/*!40000 ALTER TABLE `tbl_gradesubjects` ENABLE KEYS */;

-- Dumping structure for table vfes_info.tbl_parents
DROP TABLE IF EXISTS `tbl_parents`;
CREATE TABLE IF NOT EXISTS `tbl_parents` (
  `PID` int(11) NOT NULL,
  `plast_name` varchar(150) NOT NULL,
  `pfirst_name` varchar(150) NOT NULL,
  `pmiddle_name` varchar(150) NOT NULL,
  `psex` enum('f','m') NOT NULL,
  `occupation` varchar(150) NOT NULL,
  `VSUconnected` enum('Yes','No') NOT NULL,
  `deptoffice` varchar(150) NOT NULL,
  `officehead` varchar(100) NOT NULL,
  `officeAdd` varchar(100) NOT NULL,
  PRIMARY KEY (`PID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Dumping data for table vfes_info.tbl_parents: ~1 rows (approximately)
/*!40000 ALTER TABLE `tbl_parents` DISABLE KEYS */;
INSERT INTO `tbl_parents` (`PID`, `plast_name`, `pfirst_name`, `pmiddle_name`, `psex`, `occupation`, `VSUconnected`, `deptoffice`, `officehead`, `officeAdd`) VALUES
	(1, 'Barcos', 'Nilo', 'Escasinas', 'f', 'forman', 'No', '', '', '');
/*!40000 ALTER TABLE `tbl_parents` ENABLE KEYS */;

-- Dumping structure for table vfes_info.tbl_personproof
DROP TABLE IF EXISTS `tbl_personproof`;
CREATE TABLE IF NOT EXISTS `tbl_personproof` (
  `perID` int(11) NOT NULL,
  `l_name` varchar(50) NOT NULL,
  `f_name` varchar(50) NOT NULL,
  `m_name` varchar(20) NOT NULL,
  `sdob` date NOT NULL,
  `ssex` enum('f','m','o') NOT NULL,
  `sphone` varchar(50) NOT NULL,
  `scivilstatus` enum('Single','Married','Live in','Widowed','Separate') NOT NULL,
  `shome_add` varchar(150) NOT NULL,
  `eligibility` varchar(100) NOT NULL,
  PRIMARY KEY (`perID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Dumping data for table vfes_info.tbl_personproof: ~4 rows (approximately)
/*!40000 ALTER TABLE `tbl_personproof` DISABLE KEYS */;
INSERT INTO `tbl_personproof` (`perID`, `l_name`, `f_name`, `m_name`, `sdob`, `ssex`, `sphone`, `scivilstatus`, `shome_add`, `eligibility`) VALUES
	(1, 'admin', 'admin', 'admin', '1997-03-17', 'f', '09563497543', 'Married', 'Baybay City Leyte', 'LET'),
	(2, 'barcos', 'thalia', 'b', '2020-06-12', 'f', '0987654322', 'Single', 'Baybay', 'Accountant'),
	(3, 'Tabada', 'Winston', 'L', '2020-06-13', 'm', '0934567890', 'Married', 'Visca', 'Dept. Head'),
	(4, 'Lavina', 'Charity Mae', 'S', '2020-06-16', 'm', '093456787654', 'Single', 'Baybay', 'Instructor');
/*!40000 ALTER TABLE `tbl_personproof` ENABLE KEYS */;

-- Dumping structure for table vfes_info.tbl_proof
DROP TABLE IF EXISTS `tbl_proof`;
CREATE TABLE IF NOT EXISTS `tbl_proof` (
  `studID` int(11) NOT NULL,
  `docID` int(11) NOT NULL,
  `datesubmitted` date NOT NULL,
  PRIMARY KEY (`docID`),
  UNIQUE KEY `studID` (`studID`),
  CONSTRAINT `tbl_proof_ibfk_1` FOREIGN KEY (`studID`) REFERENCES `tbl_students` (`studID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Dumping data for table vfes_info.tbl_proof: ~0 rows (approximately)
/*!40000 ALTER TABLE `tbl_proof` DISABLE KEYS */;
/*!40000 ALTER TABLE `tbl_proof` ENABLE KEYS */;

-- Dumping structure for table vfes_info.tbl_pupilparents
DROP TABLE IF EXISTS `tbl_pupilparents`;
CREATE TABLE IF NOT EXISTS `tbl_pupilparents` (
  `studID` int(11) NOT NULL,
  `PID` int(11) NOT NULL,
  `role` enum('Father','Mother','Guardian') NOT NULL,
  UNIQUE KEY `studID` (`studID`),
  UNIQUE KEY `PID` (`PID`),
  CONSTRAINT `tbl_pupilparents_ibfk_1` FOREIGN KEY (`studID`) REFERENCES `tbl_students` (`studID`),
  CONSTRAINT `tbl_pupilparents_ibfk_2` FOREIGN KEY (`PID`) REFERENCES `tbl_parents` (`PID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Dumping data for table vfes_info.tbl_pupilparents: ~0 rows (approximately)
/*!40000 ALTER TABLE `tbl_pupilparents` DISABLE KEYS */;
INSERT INTO `tbl_pupilparents` (`studID`, `PID`, `role`) VALUES
	(1, 1, 'Father');
/*!40000 ALTER TABLE `tbl_pupilparents` ENABLE KEYS */;

-- Dumping structure for table vfes_info.tbl_reqdoc
DROP TABLE IF EXISTS `tbl_reqdoc`;
CREATE TABLE IF NOT EXISTS `tbl_reqdoc` (
  `docID` int(11) NOT NULL,
  `description` varchar(150) NOT NULL,
  UNIQUE KEY `docID` (`docID`),
  CONSTRAINT `tbl_reqdoc_ibfk_1` FOREIGN KEY (`docID`) REFERENCES `tbl_proof` (`docID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Dumping data for table vfes_info.tbl_reqdoc: ~0 rows (approximately)
/*!40000 ALTER TABLE `tbl_reqdoc` DISABLE KEYS */;
/*!40000 ALTER TABLE `tbl_reqdoc` ENABLE KEYS */;

-- Dumping structure for table vfes_info.tbl_schoolfees
DROP TABLE IF EXISTS `tbl_schoolfees`;
CREATE TABLE IF NOT EXISTS `tbl_schoolfees` (
  `code` int(11) NOT NULL,
  `description` varchar(150) NOT NULL,
  `amount` varchar(50) NOT NULL,
  UNIQUE KEY `code` (`code`),
  CONSTRAINT `tbl_schoolfees_ibfk_1` FOREIGN KEY (`code`) REFERENCES `tbl_gradefees` (`code`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Dumping data for table vfes_info.tbl_schoolfees: ~0 rows (approximately)
/*!40000 ALTER TABLE `tbl_schoolfees` DISABLE KEYS */;
/*!40000 ALTER TABLE `tbl_schoolfees` ENABLE KEYS */;

-- Dumping structure for table vfes_info.tbl_servicerec
DROP TABLE IF EXISTS `tbl_servicerec`;
CREATE TABLE IF NOT EXISTS `tbl_servicerec` (
  `srID` int(11) NOT NULL,
  `perID` int(11) NOT NULL,
  `date_started` date NOT NULL,
  `position` varchar(50) NOT NULL,
  `monthly_salary` varchar(50) NOT NULL,
  PRIMARY KEY (`srID`),
  UNIQUE KEY `perID` (`perID`),
  CONSTRAINT `tbl_servicerec_ibfk_1` FOREIGN KEY (`perID`) REFERENCES `tbl_personproof` (`perID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Dumping data for table vfes_info.tbl_servicerec: ~0 rows (approximately)
/*!40000 ALTER TABLE `tbl_servicerec` DISABLE KEYS */;
INSERT INTO `tbl_servicerec` (`srID`, `perID`, `date_started`, `position`, `monthly_salary`) VALUES
	(1, 1, '2013-04-03', 'admin', '30,000');
/*!40000 ALTER TABLE `tbl_servicerec` ENABLE KEYS */;

-- Dumping structure for table vfes_info.tbl_siblings
DROP TABLE IF EXISTS `tbl_siblings`;
CREATE TABLE IF NOT EXISTS `tbl_siblings` (
  `sib_ID` int(11) NOT NULL,
  `studID` int(11) NOT NULL,
  `givenName` varchar(50) NOT NULL,
  `dob` date NOT NULL,
  PRIMARY KEY (`sib_ID`),
  UNIQUE KEY `studID` (`studID`),
  CONSTRAINT `tbl_siblings_ibfk_1` FOREIGN KEY (`studID`) REFERENCES `tbl_students` (`studID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Dumping data for table vfes_info.tbl_siblings: ~0 rows (approximately)
/*!40000 ALTER TABLE `tbl_siblings` DISABLE KEYS */;
INSERT INTO `tbl_siblings` (`sib_ID`, `studID`, `givenName`, `dob`) VALUES
	(1, 1, 'Anjie G. Barcos', '2016-03-17');
/*!40000 ALTER TABLE `tbl_siblings` ENABLE KEYS */;

-- Dumping structure for table vfes_info.tbl_students
DROP TABLE IF EXISTS `tbl_students`;
CREATE TABLE IF NOT EXISTS `tbl_students` (
  `studID` int(11) NOT NULL,
  `last_name` varchar(25) NOT NULL,
  `first_name` varchar(25) NOT NULL,
  `middle_name` varchar(25) NOT NULL,
  `age` varchar(20) NOT NULL,
  `gender` enum('f','m') NOT NULL,
  `dob` date NOT NULL,
  `pob` varchar(50) NOT NULL,
  `religion` varchar(50) NOT NULL,
  `last_school` varchar(150) NOT NULL,
  `school_add` varchar(150) NOT NULL,
  `curr_grdlevel` enum('D','K1','K2','1','2','3','4','5','6') NOT NULL,
  `fam_add` varchar(50) NOT NULL,
  `phone` varchar(50) NOT NULL,
  PRIMARY KEY (`studID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Dumping data for table vfes_info.tbl_students: ~2 rows (approximately)
/*!40000 ALTER TABLE `tbl_students` DISABLE KEYS */;
INSERT INTO `tbl_students` (`studID`, `last_name`, `first_name`, `middle_name`, `age`, `gender`, `dob`, `pob`, `religion`, `last_school`, `school_add`, `curr_grdlevel`, `fam_add`, `phone`) VALUES
	(1, 'Barcos', 'Angel', 'Goder', '', 'f', '2014-03-17', 'Brgy. Altavista Baybay City Leyte', 'Roman Catholic', 'Altavista Elementary School', 'Brgy. Altavista Baybay City Leyte', 'K2', 'Santa Felomina Baybay City Leyte', '093582687483'),
	(2, 'Taotao', 'Dhebie', 'Lombog', '20', 'f', '2020-06-10', 'Baybay', 'Catholic', 'Visca', 'Visca, Baybay', '1', 'Baybay', '093456789');
/*!40000 ALTER TABLE `tbl_students` ENABLE KEYS */;

-- Dumping structure for table vfes_info.tbl_subjects
DROP TABLE IF EXISTS `tbl_subjects`;
CREATE TABLE IF NOT EXISTS `tbl_subjects` (
  `subID` int(11) NOT NULL,
  `description` varchar(150) NOT NULL,
  `hrsperwk` varchar(50) NOT NULL,
  PRIMARY KEY (`subID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Dumping data for table vfes_info.tbl_subjects: ~9 rows (approximately)
/*!40000 ALTER TABLE `tbl_subjects` DISABLE KEYS */;
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
/*!40000 ALTER TABLE `tbl_subjects` ENABLE KEYS */;

-- Dumping structure for table vfes_info.tbl_sysectionadvi
DROP TABLE IF EXISTS `tbl_sysectionadvi`;
CREATE TABLE IF NOT EXISTS `tbl_sysectionadvi` (
  `gradelevel` int(11) NOT NULL,
  `SY` int(11) NOT NULL,
  `secAdviserID` int(11) NOT NULL,
  PRIMARY KEY (`secAdviserID`),
  UNIQUE KEY `gradelevel` (`gradelevel`),
  UNIQUE KEY `SY` (`SY`),
  CONSTRAINT `tbl_sysectionadvi_ibfk_1` FOREIGN KEY (`gradelevel`) REFERENCES `tbl_curriculum` (`gradelevel`),
  CONSTRAINT `tbl_sysectionadvi_ibfk_2` FOREIGN KEY (`SY`) REFERENCES `tbl_class` (`SY`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Dumping data for table vfes_info.tbl_sysectionadvi: ~0 rows (approximately)
/*!40000 ALTER TABLE `tbl_sysectionadvi` DISABLE KEYS */;
/*!40000 ALTER TABLE `tbl_sysectionadvi` ENABLE KEYS */;

-- Dumping structure for table vfes_info.tbl_users
DROP TABLE IF EXISTS `tbl_users`;
CREATE TABLE IF NOT EXISTS `tbl_users` (
  `user_ID` int(11) NOT NULL,
  `perID` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `usercode` enum('admin','teacher','principal','accounting') NOT NULL,
  PRIMARY KEY (`user_ID`),
  UNIQUE KEY `perID` (`perID`),
  CONSTRAINT `tbl_users_ibfk_1` FOREIGN KEY (`perID`) REFERENCES `tbl_personproof` (`perID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Dumping data for table vfes_info.tbl_users: ~4 rows (approximately)
/*!40000 ALTER TABLE `tbl_users` DISABLE KEYS */;
INSERT INTO `tbl_users` (`user_ID`, `perID`, `username`, `password`, `usercode`) VALUES
	(1, 1, 'admin', 'admin', 'admin'),
	(2, 2, 'account', 'account', 'accounting'),
	(3, 3, 'principal', 'principal', 'principal'),
	(4, 4, 'teacher', 'teacher', 'teacher');
/*!40000 ALTER TABLE `tbl_users` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
