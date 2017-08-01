-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Generation Time: Aug 01, 2017 at 02:08 PM
-- Server version: 5.6.34-log
-- PHP Version: 7.1.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tevinson`
--

-- --------------------------------------------------------

--
-- Table structure for table `doctors_details`
--

CREATE TABLE `doctors_details` (
  `Dostor_Id` varchar(65) NOT NULL,
  `Doctor_Name` varchar(65) NOT NULL,
  `Doctor_Rank` varchar(65) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `doctors_details`
--

INSERT INTO `doctors_details` (`Dostor_Id`, `Doctor_Name`, `Doctor_Rank`) VALUES
('456', 'ten', 'co'),
('656', 'rtr', 'trtr');

-- --------------------------------------------------------

--
-- Table structure for table `fingerprint_details`
--

CREATE TABLE `fingerprint_details` (
  `Fingerprint_Id` int(65) NOT NULL,
  `Fingerprint_Volunteer_Id` varchar(65) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `fingerprint_details`
--

INSERT INTO `fingerprint_details` (`Fingerprint_Id`, `Fingerprint_Volunteer_Id`) VALUES
(1, ''),
(2, '767567657'),
(3, '123321'),
(4, '1243'),
(5, '1134'),
(6, '1234'),
(7, '103'),
(8, '104');

-- --------------------------------------------------------

--
-- Table structure for table `nurse_details`
--

CREATE TABLE `nurse_details` (
  `Nurse_Id` varchar(65) NOT NULL,
  `Nurse_Name` varchar(65) NOT NULL,
  `Nurse_Department` varchar(65) NOT NULL,
  `Nurse_Rank` varchar(65) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `nurse_details`
--

INSERT INTO `nurse_details` (`Nurse_Id`, `Nurse_Name`, `Nurse_Department`, `Nurse_Rank`) VALUES
('', '', '', ''),
('34', '343', '343', '34'),
('343434', 'erer', 'erererer', 'ere');

-- --------------------------------------------------------

--
-- Table structure for table `protocol_details`
--

CREATE TABLE `protocol_details` (
  `Protocol_Id` int(65) NOT NULL,
  `Protocol_Name` varchar(65) NOT NULL,
  `Protocol_Description` varchar(65) NOT NULL,
  `Protocol_Duration` varchar(65) NOT NULL,
  `Protocol_Nurse_Id` varchar(65) NOT NULL,
  `Protocol_Doctor_Id` varchar(65) NOT NULL,
  `Protocol_Volunteer_Id` varchar(65) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `protocol_details`
--

INSERT INTO `protocol_details` (`Protocol_Id`, `Protocol_Name`, `Protocol_Description`, `Protocol_Duration`, `Protocol_Nurse_Id`, `Protocol_Doctor_Id`, `Protocol_Volunteer_Id`) VALUES
(1, 'er', 'ere', 'erer', 'erer', 'erer', 'er');

-- --------------------------------------------------------

--
-- Table structure for table `receptionist_details`
--

CREATE TABLE `receptionist_details` (
  `Receptionist_Id` varchar(65) NOT NULL,
  `Receptionist_Name` varchar(65) NOT NULL,
  `Receptionist_Password` varchar(65) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `staff_login`
--

CREATE TABLE `staff_login` (
  `Staff_Login_Id` varchar(65) NOT NULL,
  `Staff_Login_Name` varchar(65) NOT NULL,
  `Staff_Login_Password` varchar(65) NOT NULL,
  `Staff_Login_Rank` varchar(65) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `staff_login`
--

INSERT INTO `staff_login` (`Staff_Login_Id`, `Staff_Login_Name`, `Staff_Login_Password`, `Staff_Login_Rank`) VALUES
('12345678', 'sec', '74459ca3cf85a81df90da95ff6e7a207', '2'),
('312343', 'admin', '21232f297a57a5a743894a0e4a801fc3', '1'),
('5465', 'admin', '21232f297a57a5a743894a0e4a801fc3', '1'),
('78786786', 'colo', '96ed1498ec94cb6ed3e47fda0c6f84da', '1');

-- --------------------------------------------------------

--
-- Table structure for table `volunteer_details`
--

CREATE TABLE `volunteer_details` (
  `Volunteer_Id` varchar(65) NOT NULL,
  `Volunteer_Name` varchar(65) NOT NULL,
  `Voluteer_Age` varchar(65) NOT NULL,
  `Volunteer_Gender` varchar(65) NOT NULL,
  `Volunteer_Figerprint_Id` longblob NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `volunteer_details`
--

INSERT INTO `volunteer_details` (`Volunteer_Id`, `Volunteer_Name`, `Voluteer_Age`, `Volunteer_Gender`, `Volunteer_Figerprint_Id`) VALUES
('987808', 'jopjklj', '9790', 'Male', 0x393038303938),
('2423', 'efefw', 'ewfef', 'Female', 0x3334333433),
('', 'Samson', '34', 'Male', 0x33),
('1236', 'joy', '56', 'Female', 0x313233),
('1237', 'caro', '15', 'Female', 0x313233),
('', 'poly', '19', 'Male', 0x38);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `doctors_details`
--
ALTER TABLE `doctors_details`
  ADD PRIMARY KEY (`Dostor_Id`);

--
-- Indexes for table `fingerprint_details`
--
ALTER TABLE `fingerprint_details`
  ADD PRIMARY KEY (`Fingerprint_Id`);

--
-- Indexes for table `protocol_details`
--
ALTER TABLE `protocol_details`
  ADD PRIMARY KEY (`Protocol_Id`);

--
-- Indexes for table `staff_login`
--
ALTER TABLE `staff_login`
  ADD PRIMARY KEY (`Staff_Login_Id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `fingerprint_details`
--
ALTER TABLE `fingerprint_details`
  MODIFY `Fingerprint_Id` int(65) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `protocol_details`
--
ALTER TABLE `protocol_details`
  MODIFY `Protocol_Id` int(65) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
