-- phpMyAdmin SQL Dump
-- version 4.4.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jan 18, 2016 at 01:57 PM
-- Server version: 5.6.26
-- PHP Version: 5.6.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `alderaan`
--
CREATE DATABASE IF NOT EXISTS `alderaan` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `alderaan`;

-- --------------------------------------------------------

--
-- Table structure for table `clients`
--

DROP TABLE IF EXISTS `clients`;
CREATE TABLE IF NOT EXISTS `clients` (
  `id` int(12) unsigned NOT NULL,
  `client_name` varchar(100) NOT NULL,
  `street` varchar(250) NOT NULL,
  `street_number` varchar(25) NOT NULL,
  `area_code` varchar(15) NOT NULL,
  `city` varchar(250) NOT NULL,
  `country` varchar(100) NOT NULL,
  `contact_first_name` varchar(100) NOT NULL,
  `contact_last_name` varchar(100) NOT NULL,
  `contact_email` varchar(100) NOT NULL,
  `contact_phone` varchar(50) NOT NULL,
  `contact_fax` varchar(50) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `clients`
--

INSERT INTO `clients` (`id`, `client_name`, `street`, `street_number`, `area_code`, `city`, `country`, `contact_first_name`, `contact_last_name`, `contact_email`, `contact_phone`, `contact_fax`) VALUES
(3, 'AMR - Advanced Research GmbH', 'Wiesenstr.', '3', '94469', 'Deggendorf', 'Germany', 'Daniel', 'Schleindlsperger', 'daniel.schleindlsperger@amr.io', '09916565', '09916565'),
(5, 'MAN Diesel & Turbo SE', 'Werftstraße', '17', '94469', 'Deggendorf', 'Germany', 'Karl', 'Lehmer', 'karl.lehmer@man.de', '0059565', '09596686'),
(6, 'The New Yorker A Wyndham Hotel', '8th Ave', '481', '10001', 'New York', 'United States of America', 'James', 'Dork', 'jamesdork@newyorker.com', '095656', '0956556'),
(7, 'Four Seasons Hotel The Westcliff, Johannesburg', 'Jan Smuts Ave', '67', '2132', 'Johannesburg', 'South Africa', 'Mumbo', 'Doni', 'mumbo@fourseason.org', '09565656', '06565656'),
(8, 'Hotel España', 'Carrer de Sant Pau', '9', '08001', 'Barcelona', 'Spain', 'José', 'Guardiola', 'jose@espana.es', '06556556', '065686868');

-- --------------------------------------------------------

--
-- Table structure for table `projects`
--

DROP TABLE IF EXISTS `projects`;
CREATE TABLE IF NOT EXISTS `projects` (
  `id` int(12) unsigned NOT NULL,
  `client_id` int(12) unsigned NOT NULL,
  `project_name` varchar(250) NOT NULL,
  `status` varchar(50) NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `contract_amount` decimal(13,2) NOT NULL,
  `internal_cost` decimal(13,2) NOT NULL,
  `contact_first_name` varchar(100) NOT NULL,
  `contact_last_name` varchar(100) NOT NULL,
  `contact_email` varchar(100) NOT NULL,
  `contact_phone` varchar(50) NOT NULL,
  `contact_fax` varchar(50) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `projects`
--

INSERT INTO `projects` (`id`, `client_id`, `project_name`, `status`, `start_date`, `end_date`, `contract_amount`, `internal_cost`, `contact_first_name`, `contact_last_name`, `contact_email`, `contact_phone`, `contact_fax`) VALUES
(7, 3, 'Test Projekt', 'planned', '2016-01-11', '2016-01-11', '9564.00', '10657.00', 'Daniel', 'Schleindlsperger', 'daniel.schleindlsperger@amr.io', '234234', '23234'),
(9, 3, 'Test Projekt 2', 'cancelled', '2016-04-25', '2020-09-09', '95649.00', '86562.00', 'Josef', 'Meier', 'josef.meier@aol.de', '05656565', '05656556'),
(10, 3, 'Test Projekt 3', 'began', '2016-08-17', '2018-01-17', '656565.00', '651555.00', 'Domikik', 'Hinterweger', 'dfasdf@sfd.com', '656526', '6562555'),
(11, 8, 'Swimming Pool Cleaning', 'completed', '2015-06-14', '2015-07-06', '10000.00', '9732.00', 'Josef', 'Wegstätter', 'josefwegstaetter@wegstaetter.com', '065656566', '06565656'),
(12, 7, 'New Internet Line', 'cancelled', '2016-01-10', '2016-01-18', '95346.00', '87625.97', 'Michael', 'Maier', 'michaelm@maier.com', '05656565', '0656568686'),
(13, 5, 'Reifen Lieferung', 'stopped', '2016-01-14', '2016-01-17', '987643.00', '786541.00', 'Johannes', 'Hinterweger', 'johannes.hinterweger@man.com', '065656', '0656565');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `clients`
--
ALTER TABLE `clients`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `projects`
--
ALTER TABLE `projects`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `clients`
--
ALTER TABLE `clients`
  MODIFY `id` int(12) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `projects`
--
ALTER TABLE `projects`
  MODIFY `id` int(12) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=14;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
