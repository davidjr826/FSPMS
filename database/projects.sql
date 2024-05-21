-- phpMyAdmin SQL Dump
-- version 4.8.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jun 12, 2019 at 12:21 AM
-- Server version: 10.1.34-MariaDB
-- PHP Version: 7.2.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `projects`
--

-- --------------------------------------------------------

--
-- Table structure for table `department`
--

CREATE TABLE `department` (
  `dept_name` varchar(100) NOT NULL,
  `address` varchar(255) NOT NULL,
  `TELEPHONE` varchar(40) NOT NULL,
  `email` varchar(100) NOT NULL,
  `physical_address` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `department`
--

INSERT INTO `department` (`dept_name`, `address`, `TELEPHONE`, `email`, `physical_address`) VALUES
('CICT', 'P.O BOX 3218, Morogoro, Tanzania', '+255 23 2603511 -4', 'dircict@suanet.ac.tz', 'MOROGORO, TANZANIA'),
('DCS', 'P. O BOX 2089, tanga', '078964736', 'DCS.go.tz', 'MOROGORO, TANZANIA'),
('DOAE', 'P.O BOX 064, MOROGORO', '+255 456 23 45 3', 'AE@gmail.go.tz', 'MOROGORO, TANZANIA'),
('DOANIM', 'POBOX16', '98898', 'adventina@gmail.com', 'TANZANIA, ARUSHA'),
('DOS', 'P.O BOX 004, MOROGORO', '+224 456 75 49 3', 'brabra@suanet.co.tz', 'MAZIMBU, MOROGORO, TANZANIA'),
('DPOM', 'SLP 15', '089989', 'pome@jhj', 'Morogoro'),
('EDUCATION', 'S L P 2018', '7676868', 'patricknachenga@gmail.com', 'TANZANIA, MOROGORO '),
('ENVSTD', 'P O BOX 219', '89798798798', 'magunga@gmail.com', 'Arusha, Kilimanjaro, Tanzania');

-- --------------------------------------------------------

--
-- Table structure for table `Program`
--

CREATE TABLE `Program` (
  `prog_ID` varchar(10) NOT NULL,
  `ProgramFullName` varchar(100) NOT NULL,
  `dept_name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Program`
--

INSERT INTO `Program` (`prog_ID`, `ProgramFullName`, `dept_name`) VALUES
('DIT', 'DIPLOMA IN INFORMATION TECHNOLOGY', 'CICT'),
('IFM', 'Btch in Informatics with Mathematics', 'DCS');

-- --------------------------------------------------------

--
-- Table structure for table `project`
--

CREATE TABLE `project` (
  `projectID` int(100) NOT NULL,
  `tittle` varchar(200) NOT NULL,
  `proposal` varchar(200) NOT NULL,
  `final_project` text NOT NULL,
  `project_type` varchar(100) NOT NULL,
  `domain_name` varchar(100) NOT NULL,
  `st_ID` varchar(100) NOT NULL,
  `sup_email` varchar(100) NOT NULL,
  `year` int(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `project`
--

INSERT INTO `project` (`projectID`, `tittle`, `proposal`, `final_project`, `project_type`, `domain_name`, `st_ID`, `sup_email`, `year`) VALUES
(2, 'Student result management stystem ', 'nop', 'zip.zip', 'Website', 'SRMS', 'DIT/E/2016/0102', 'patricknachenga@gmail.com', 2018),
(3, 'Finalist Student Project Managment System', 'nop', 'nop', 'Activity', 'no', 'DIT/E/2016/0103', 'jacob@suanet.ac', 2018),
(12, 'Field report managment system', '12253.pdf', '48028.png', 'Web-based system', 'FTP.suanet.ac', 'DIT/D/2017/0102', 'patricknachenga@gmail.com', 2019);

-- --------------------------------------------------------

--
-- Table structure for table `project_type`
--

CREATE TABLE `project_type` (
  `project_type` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `project_type`
--

INSERT INTO `project_type` (`project_type`) VALUES
('Activity'),
('Computer-based system'),
('Web-based system'),
('Website');

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `st_ID` varchar(100) NOT NULL,
  `fname` varchar(30) NOT NULL,
  `mname` varchar(30) NOT NULL,
  `lname` varchar(30) NOT NULL,
  `gender` varchar(8) NOT NULL,
  `contact` int(15) NOT NULL,
  `prog_ID` varchar(10) NOT NULL,
  `study_year` int(2) NOT NULL,
  `st_pass` varchar(40) NOT NULL,
  `image` varchar(200) NOT NULL,
  `dob` date NOT NULL,
  `citizenship` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`st_ID`, `fname`, `mname`, `lname`, `gender`, `contact`, `prog_ID`, `study_year`, `st_pass`, `image`, `dob`, `citizenship`) VALUES
('DIT/D/2017/0102', 'Jasmin', 'July', 'Jafo', 'female', 786366333, 'IFM', 2019, '81dc9bdb52d04dc20036dbd8313ed055', 'user.ico', '1997-03-02', 'Tanzanian'),
('DIT/E/2016/0102', 'Patrick', 'Peter', 'Nachenga', 'male', 713567439, 'DIT', 34, '81dc9bdb52d04dc20036dbd8313ed055', 'user.png', '2019-06-28', ''),
('DIT/E/2016/0103', 'Heren', 'John', 'Msulwa', 'female', 786353536, 'IFM', 19, '81dc9bdb52d04dc20036dbd8313ed055', 'user.png', '1990-06-11', 'Tanzanian');

-- --------------------------------------------------------

--
-- Table structure for table `supervisor`
--

CREATE TABLE `supervisor` (
  `sup_email` varchar(40) NOT NULL,
  `fname` varchar(30) NOT NULL,
  `mname` varchar(30) NOT NULL,
  `lname` varchar(30) NOT NULL,
  `gender` varchar(8) NOT NULL,
  `contact` varchar(15) NOT NULL,
  `password` varchar(200) NOT NULL,
  `co_image` varchar(40) NOT NULL,
  `user_type` varchar(10) NOT NULL,
  `dept_name` varchar(100) NOT NULL,
  `citizenship` varchar(30) NOT NULL,
  `physical_address` varchar(100) NOT NULL,
  `dob` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='this is supervisor table';

--
-- Dumping data for table `supervisor`
--

INSERT INTO `supervisor` (`sup_email`, `fname`, `mname`, `lname`, `gender`, `contact`, `password`, `co_image`, `user_type`, `dept_name`, `citizenship`, `physical_address`, `dob`) VALUES
('anna@suanet.ac', 'Anna', 'F', 'Geofrey', 'male', '0785356334', '81dc9bdb52d04dc20036dbd8313ed055', 'user.ico', 'USER', 'DOS', 'Kenyan', 'kenya, kikuyu', '1988-12-04'),
('geogina@suanet.ac', 'Jeogena', 'jabil', 'japhet', 'female', '0986', '81dc9bdb52d04dc20036dbd8313ed055', 'user.ico', 'ADMIN', 'ENVSTD', 'Tanzanian', 'tanzania, Morogoro, Morogoro Mjini', '1999-12-09'),
('jacob@suanet.ac', 'Jacob', 'John', 'Jonathan', 'male', '0713567439', '81dc9bdb52d04dc20036dbd8313ed055', 'user.ico', 'USER', 'DOS', 'Tanzania', 'Tanzania Morogoro Morogoro Mjini', '2019-06-14'),
('juma@gmail.com', 'juma', 'jabil', 'hashim', 'male', '078536636', '81dc9bdb52d04dc20036dbd8313ed055', 'user.ico', 'USER', 'EDUCATION', 'Tanzanian', 'tanzania, Morogoro, Morogoro Mjini', '1991-12-03'),
('patricknachenga@gmail.com', 'Patrick', 'Peter', 'Nachenga', 'male', '074536257', '81dc9bdb52d04dc20036dbd8313ed055', 'pmkaleFB.jpg', 'ADMIN', 'DOS', 'Tanzania', 'tanzania', '2019-06-18');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `department`
--
ALTER TABLE `department`
  ADD PRIMARY KEY (`dept_name`);

--
-- Indexes for table `Program`
--
ALTER TABLE `Program`
  ADD PRIMARY KEY (`prog_ID`),
  ADD KEY `dept_name` (`dept_name`);

--
-- Indexes for table `project`
--
ALTER TABLE `project`
  ADD PRIMARY KEY (`projectID`),
  ADD UNIQUE KEY `st_ID_2` (`st_ID`),
  ADD KEY `project_type` (`project_type`),
  ADD KEY `st_ID` (`st_ID`),
  ADD KEY `sup_email` (`sup_email`);

--
-- Indexes for table `project_type`
--
ALTER TABLE `project_type`
  ADD PRIMARY KEY (`project_type`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`st_ID`),
  ADD KEY `prog_ID` (`prog_ID`);

--
-- Indexes for table `supervisor`
--
ALTER TABLE `supervisor`
  ADD PRIMARY KEY (`sup_email`),
  ADD KEY `dept_name` (`dept_name`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `project`
--
ALTER TABLE `project`
  MODIFY `projectID` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `Program`
--
ALTER TABLE `Program`
  ADD CONSTRAINT `Program_ibfk_1` FOREIGN KEY (`dept_name`) REFERENCES `department` (`dept_name`);

--
-- Constraints for table `project`
--
ALTER TABLE `project`
  ADD CONSTRAINT `project_ibfk_1` FOREIGN KEY (`project_type`) REFERENCES `project_type` (`project_type`),
  ADD CONSTRAINT `project_ibfk_2` FOREIGN KEY (`st_ID`) REFERENCES `student` (`st_ID`),
  ADD CONSTRAINT `project_ibfk_3` FOREIGN KEY (`sup_email`) REFERENCES `supervisor` (`sup_email`);

--
-- Constraints for table `student`
--
ALTER TABLE `student`
  ADD CONSTRAINT `student_ibfk_1` FOREIGN KEY (`prog_ID`) REFERENCES `Program` (`prog_ID`);

--
-- Constraints for table `supervisor`
--
ALTER TABLE `supervisor`
  ADD CONSTRAINT `supervisor_ibfk_1` FOREIGN KEY (`dept_name`) REFERENCES `department` (`dept_name`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
