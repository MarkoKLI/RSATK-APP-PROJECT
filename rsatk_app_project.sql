-- phpMyAdmin SQL Dump
-- version 4.9.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jan 11, 2021 at 09:38 PM
-- Server version: 5.7.24
-- PHP Version: 7.4.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
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

CREATE TABLE `active_diagnoses` (
  `id` int(10) UNSIGNED NOT NULL,
  `patientId` int(10) UNSIGNED NOT NULL,
  `diagnosisId` int(10) UNSIGNED NOT NULL,
  `createdOn` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` int(10) UNSIGNED NOT NULL,
  `username` varchar(49) NOT NULL,
  `passwordHash` char(64) NOT NULL,
  `passwordSalt` char(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `appointments`
--

CREATE TABLE `appointments` (
  `id` int(10) UNSIGNED NOT NULL,
  `doctorId` int(10) UNSIGNED NOT NULL,
  `patientId` int(10) UNSIGNED NOT NULL,
  `date` date NOT NULL,
  `time` varchar(10) NOT NULL,
  `createdOn` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `contact_questions`
--

CREATE TABLE `contact_questions` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(199) NOT NULL,
  `email` varchar(99) NOT NULL,
  `telNr` varchar(16) NOT NULL,
  `desctiption` text NOT NULL,
  `createdOn` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `diagnoses`
--

CREATE TABLE `diagnoses` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(299) NOT NULL,
  `description` text,
  `createdOn` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updatedOn` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `diagnoses_made`
--

CREATE TABLE `diagnoses_made` (
  `id` int(10) UNSIGNED NOT NULL,
  `active` tinyint(1) NOT NULL,
  `reportId` int(10) UNSIGNED NOT NULL,
  `diagnosisId` int(10) UNSIGNED NOT NULL,
  `createdOn` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updatedOn` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `reports`
--

CREATE TABLE `reports` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(512) NOT NULL,
  `description` text NOT NULL,
  `date` date NOT NULL,
  `doctorId` int(10) UNSIGNED NOT NULL,
  `patientId` int(10) UNSIGNED NOT NULL,
  `createdOn` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updatedOn` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `report_references`
--

CREATE TABLE `report_references` (
  `id` int(10) UNSIGNED NOT NULL,
  `doctorId` int(10) UNSIGNED NOT NULL,
  `reportId` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `specialties`
--

CREATE TABLE `specialties` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(100) NOT NULL,
  `description` varchar(1024) DEFAULT NULL,
  `createdOn` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updatedOn` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `EMBR` char(13) NOT NULL,
  `name` varchar(49) NOT NULL,
  `surname` varchar(99) NOT NULL,
  `email` varchar(99) NOT NULL,
  `telNr` varchar(16) NOT NULL,
  `DNR` date NOT NULL,
  `PasswordHash` char(64) NOT NULL,
  `passwordSalt` char(8) NOT NULL,
  `isDoctor` tinyint(1) NOT NULL,
  `description` text,
  `specialtyId` int(11) UNSIGNED DEFAULT NULL,
  `address` varchar(300) DEFAULT NULL,
  `createdOn` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updatedOn` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `active_diagnoses`
--
ALTER TABLE `active_diagnoses`
  ADD PRIMARY KEY (`id`),
  ADD KEY `ACTIVE_DIAGNOSES_PATIENTID_USERS_ID_FK` (`patientId`),
  ADD KEY `ACTIVE_DIAGNOSES_DIAGNOSISID_DIAGNOSES_ID_FK` (`diagnosisId`);

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `appointments`
--
ALTER TABLE `appointments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `APPOINTMENTS_DOCTORID_USERS_ID_FK` (`doctorId`),
  ADD KEY `APPOINTMENTS_PATIENTID_USERS_ID_FK` (`patientId`);

--
-- Indexes for table `contact_questions`
--
ALTER TABLE `contact_questions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `diagnoses`
--
ALTER TABLE `diagnoses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `diagnoses_made`
--
ALTER TABLE `diagnoses_made`
  ADD PRIMARY KEY (`id`),
  ADD KEY `DIAGNOSES_MADE_REPORTID_REPORTS_ID_FK` (`reportId`),
  ADD KEY `DIAGNOSES_MADE_DIAGNOSISID_DIAGNOSES_ID_FK` (`diagnosisId`);

--
-- Indexes for table `reports`
--
ALTER TABLE `reports`
  ADD PRIMARY KEY (`id`),
  ADD KEY `REPORTS_PATIENTID_USERS_ID` (`patientId`),
  ADD KEY `REPORTS_DOCTORID_USERS_ID` (`doctorId`);

--
-- Indexes for table `report_references`
--
ALTER TABLE `report_references`
  ADD PRIMARY KEY (`id`),
  ADD KEY `REPORT_REFERENCES_REPORTID_REPORTS_ID_FK` (`reportId`),
  ADD KEY `REPORT_REFERENCES_DOCTORID_USERS_ID_FK` (`doctorId`);

--
-- Indexes for table `specialties`
--
ALTER TABLE `specialties`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `USERS_PASSWORDSALT_UNIQUE` (`passwordSalt`),
  ADD KEY `USERS_SPECIALTYID_SPECIALTIES_ID_FK` (`specialtyId`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `active_diagnoses`
--
ALTER TABLE `active_diagnoses`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `appointments`
--
ALTER TABLE `appointments`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `contact_questions`
--
ALTER TABLE `contact_questions`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `diagnoses`
--
ALTER TABLE `diagnoses`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `diagnoses_made`
--
ALTER TABLE `diagnoses_made`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `reports`
--
ALTER TABLE `reports`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `report_references`
--
ALTER TABLE `report_references`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `specialties`
--
ALTER TABLE `specialties`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

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
