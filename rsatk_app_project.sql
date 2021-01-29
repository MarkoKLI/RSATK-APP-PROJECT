-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Jan 29, 2021 at 04:36 PM
-- Server version: 5.7.31
-- PHP Version: 7.4.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `rsatk_app_project`
--

-- --------------------------------------------------------

--
-- Table structure for table `active_diagnoses`
--

DROP TABLE IF EXISTS `active_diagnoses`;
CREATE TABLE IF NOT EXISTS `active_diagnoses` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `patientId` int(10) UNSIGNED NOT NULL,
  `diagnosisId` int(10) UNSIGNED NOT NULL,
  `createdOn` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `ACTIVE_DIAGNOSES_PATIENTID_USERS_ID_FK` (`patientId`),
  KEY `ACTIVE_DIAGNOSES_DIAGNOSISID_DIAGNOSES_ID_FK` (`diagnosisId`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

DROP TABLE IF EXISTS `admins`;
CREATE TABLE IF NOT EXISTS `admins` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `username` varchar(49) NOT NULL,
  `passwordHash` char(64) NOT NULL,
  `passwordSalt` char(8) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `username`, `passwordHash`, `passwordSalt`) VALUES
(1, 'admin', 'OÞ›ì&(–‚åtïåœç#@%ì¤ÕØÀILv¹í~&½ùRà‡®c\'(l[Ž2?~ÿPÎ™~Êä¸Ù]\rhâ\Z?', 'âfž˜–­ZÂ'),
(2, 'admin1', '7T.•(,\n{‡Kd°™k%·òµ€ªgbP¢§6$\0ºÒ^ñßÙßËìT}:fRÐ³Z†˜LÑ»òÍþµ\Zë', 'GªÞ~='),
(3, 'admin2', '„õBæ^ïÎÔYÿò˜®&.òkÁ™öÛã‹žYœ};AÚ)òa¿ÿ*ÀEè[	|=†Ý!fg/Þº‡°a', 'LRÀKtõp');

-- --------------------------------------------------------

--
-- Table structure for table `appointments`
--

DROP TABLE IF EXISTS `appointments`;
CREATE TABLE IF NOT EXISTS `appointments` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `doctorId` int(10) UNSIGNED NOT NULL,
  `patientId` int(10) UNSIGNED NOT NULL,
  `date` varchar(10) NOT NULL,
  `time` varchar(10) NOT NULL,
  `createdOn` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `APPOINTMENTS_DOCTORID_USERS_ID_FK` (`doctorId`),
  KEY `APPOINTMENTS_PATIENTID_USERS_ID_FK` (`patientId`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `diagnoses`
--

DROP TABLE IF EXISTS `diagnoses`;
CREATE TABLE IF NOT EXISTS `diagnoses` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(299) NOT NULL,
  `description` text,
  `createdOn` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updatedOn` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `diagnoses_made`
--

DROP TABLE IF EXISTS `diagnoses_made`;
CREATE TABLE IF NOT EXISTS `diagnoses_made` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `active` tinyint(1) DEFAULT NULL,
  `reportId` int(10) UNSIGNED NOT NULL,
  `diagnosisId` int(10) UNSIGNED NOT NULL,
  `createdOn` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `DIAGNOSES_MADE_REPORTID_DIAGNOSISID_UNIQUE` (`reportId`,`diagnosisId`),
  KEY `DIAGNOSES_MADE_REPORTID_REPORTS_ID_FK` (`reportId`),
  KEY `DIAGNOSES_MADE_DIAGNOSISID_DIAGNOSES_ID_FK` (`diagnosisId`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `reports`
--

DROP TABLE IF EXISTS `reports`;
CREATE TABLE IF NOT EXISTS `reports` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `title` varchar(512) NOT NULL,
  `description` text NOT NULL,
  `date` varchar(10) NOT NULL,
  `doctorId` int(10) UNSIGNED NOT NULL,
  `patientId` int(10) UNSIGNED NOT NULL,
  `createdOn` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updatedOn` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `REPORTS_PATIENTID_USERS_ID` (`patientId`),
  KEY `REPORTS_DOCTORID_USERS_ID` (`doctorId`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `report_references`
--

DROP TABLE IF EXISTS `report_references`;
CREATE TABLE IF NOT EXISTS `report_references` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `doctorId` int(10) UNSIGNED NOT NULL,
  `reportId` int(10) UNSIGNED NOT NULL,
  PRIMARY KEY (`id`),
  KEY `REPORT_REFERENCES_REPORTID_REPORTS_ID_FK` (`reportId`),
  KEY `REPORT_REFERENCES_DOCTORID_USERS_ID_FK` (`doctorId`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `specialties`
--

DROP TABLE IF EXISTS `specialties`;
CREATE TABLE IF NOT EXISTS `specialties` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `title` varchar(100) NOT NULL,
  `description` varchar(1024) DEFAULT NULL,
  `createdOn` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updatedOn` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `specialties`
--

INSERT INTO `specialties` (`id`, `title`, `description`, `createdOn`, `updatedOn`) VALUES
(1, 'DEFAULT', 'TESTING TESTING TESTING', '2021-01-29 16:33:22', '2021-01-29 16:33:22');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `EMBR` char(13) NOT NULL,
  `name` varchar(49) NOT NULL,
  `surname` varchar(99) NOT NULL,
  `email` varchar(99) NOT NULL,
  `telNr` varchar(16) NOT NULL,
  `DOB` varchar(10) NOT NULL,
  `PasswordHash` char(64) NOT NULL,
  `passwordSalt` char(8) NOT NULL,
  `isDoctor` tinyint(1) NOT NULL,
  `description` text,
  `specialtyId` int(11) UNSIGNED DEFAULT NULL,
  `address` varchar(300) DEFAULT NULL,
  `createdOn` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updatedOn` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `USERS_PASSWORDSALT_UNIQUE` (`passwordSalt`),
  UNIQUE KEY `USERS_EMBR_UNIQUE` (`EMBR`),
  KEY `USERS_SPECIALTYID_SPECIALTIES_ID_FK` (`specialtyId`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `EMBR`, `name`, `surname`, `email`, `telNr`, `DOB`, `PasswordHash`, `passwordSalt`, `isDoctor`, `description`, `specialtyId`, `address`, `createdOn`, `updatedOn`) VALUES
(1, '1234567891234', 'Gregory', 'House', 'house@hospital.com', '075500000', '1958-11-06', '\rÐû—´Ã´´‚òÊleóB\rd±6hºÿÒýÊÒi>ó3„-5B‰Hþ¢Ý=¬=I¾ùÁÐ•ABûz¨', '/BÍKþ°+', 1, NULL, 1, '5-19 Codeine bvd.', '2021-01-29 16:33:56', '2021-01-29 16:33:56'),
(2, '2345678912345', 'John', 'Doe', 'doe@hospital.com', '072999888', '1983-05-09', 'Z?#Œ“„·3âdÒ$ñkÉgC¨OüÜ“úÕq‹Ð—€¾H;õlA§—Ä†ØbçbèJg¾HWW;ÄÙ5ç', '¤I&Yèö¦', 0, NULL, NULL, '2-2 Chopin str.', '2021-01-29 16:34:51', '2021-01-29 16:34:51');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `active_diagnoses`
--
ALTER TABLE `active_diagnoses`
  ADD CONSTRAINT `ACTIVE_DIAGNOSES_DIAGNOSISID_DIAGNOSES_ID_FK` FOREIGN KEY (`diagnosisId`) REFERENCES `diagnoses` (`id`),
  ADD CONSTRAINT `ACTIVE_DIAGNOSES_PATIENTID_USERS_ID_FK` FOREIGN KEY (`patientId`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `appointments`
--
ALTER TABLE `appointments`
  ADD CONSTRAINT `APPOINTMENTS_DOCTORID_USERS_ID_FK` FOREIGN KEY (`doctorId`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `APPOINTMENTS_PATIENTID_USERS_ID_FK` FOREIGN KEY (`patientId`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `diagnoses_made`
--
ALTER TABLE `diagnoses_made`
  ADD CONSTRAINT `DIAGNOSES_MADE_DIAGNOSISID_DIAGNOSES_ID_FK` FOREIGN KEY (`diagnosisId`) REFERENCES `diagnoses` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `DIAGNOSES_MADE_REPORTID_REPORTS_ID_FK` FOREIGN KEY (`reportId`) REFERENCES `reports` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `reports`
--
ALTER TABLE `reports`
  ADD CONSTRAINT `REPORTS_DOCTORID_USERS_ID` FOREIGN KEY (`doctorId`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `REPORTS_PATIENTID_USERS_ID` FOREIGN KEY (`patientId`) REFERENCES `users` (`id`);

--
-- Constraints for table `report_references`
--
ALTER TABLE `report_references`
  ADD CONSTRAINT `REPORT_REFERENCES_DOCTORID_USERS_ID_FK` FOREIGN KEY (`doctorId`) REFERENCES `users` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `REPORT_REFERENCES_REPORTID_REPORTS_ID_FK` FOREIGN KEY (`reportId`) REFERENCES `reports` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `USERS_SPECIALTYID_SPECIALTIES_ID_FK` FOREIGN KEY (`specialtyId`) REFERENCES `specialties` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
