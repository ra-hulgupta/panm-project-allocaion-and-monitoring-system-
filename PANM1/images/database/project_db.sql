-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 28, 2018 at 03:07 AM
-- Server version: 10.1.21-MariaDB
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `project_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `allocate`
--

CREATE TABLE `allocate` (
  `leader` int(11) NOT NULL,
  `pidal` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `allocate`
--

INSERT INTO `allocate` (`leader`, `pidal`) VALUES
(11126, 123);

-- --------------------------------------------------------

--
-- Table structure for table `allocation_process`
--

CREATE TABLE `allocation_process` (
  `id` int(1) NOT NULL,
  `process` int(2) NOT NULL,
  `news` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `allocation_process`
--

INSERT INTO `allocation_process` (`id`, `process`, `news`) VALUES
(1, 1, 'help news ');

-- --------------------------------------------------------

--
-- Table structure for table `assign`
--

CREATE TABLE `assign` (
  `Work_No` int(4) NOT NULL,
  `Leaderid` int(6) NOT NULL,
  `Work` varchar(100) NOT NULL,
  `Description` varchar(150) NOT NULL DEFAULT 'Incomplete'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `assign`
--

INSERT INTO `assign` (`Work_No`, `Leaderid`, `Work`, `Description`) VALUES
(1, 11122, 'Front end', 'Incomplete'),
(2, 11125, 'Bluebook', 'Incomplete'),
(3, 11122, 'Connect Database', 'Incomplete');

-- --------------------------------------------------------

--
-- Table structure for table `faculty`
--

CREATE TABLE `faculty` (
  `faculty_id` int(6) UNSIGNED NOT NULL,
  `name` varchar(25) NOT NULL,
  `password` varchar(20) DEFAULT NULL,
  `email` varchar(30) NOT NULL,
  `contact_no` varchar(14) NOT NULL,
  `admin` int(1) DEFAULT NULL,
  `enable` int(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `faculty`
--

INSERT INTO `faculty` (`faculty_id`, `name`, `password`, `email`, `contact_no`, `admin`, `enable`) VALUES
(157, 'Neha K', '157', 'nehap03@gmail.com', '9920407018', 0, 1),
(158, 'Shridhar', '454', 'shidhar@gmail.com', '1684123', 0, 1),
(4545, 'abcd', '45454545', 'kjhkjg@lkj.kjh', '98765465', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `groups`
--

CREATE TABLE `groups` (
  `leader` int(6) UNSIGNED NOT NULL,
  `mem1` int(6) DEFAULT NULL,
  `mem2` int(6) DEFAULT NULL,
  `mem3` int(6) DEFAULT NULL,
  `average` float NOT NULL,
  `project` int(6) NOT NULL,
  `PID1` int(6) NOT NULL,
  `PID2` int(6) NOT NULL,
  `PID3` int(6) NOT NULL,
  `Allocate9` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `groups`
--

INSERT INTO `groups` (`leader`, `mem1`, `mem2`, `mem3`, `average`, `project`, `PID1`, `PID2`, `PID3`, `Allocate9`) VALUES
(11122, 11123, 11124, 11125, 7.3125, 0, 123, 456, 789, '789'),
(11126, 11127, 11128, 11128, 7.95, 0, 123, 456, 789, '456'),
(11129, 11130, 11131, 11131, 8.125, 0, 123, 456, 789, '123'),
(11132, 11132, 11133, 11134, 7.665, 0, 123, 456, 159, '159');

-- --------------------------------------------------------

--
-- Table structure for table `projects`
--

CREATE TABLE `projects` (
  `project_id` int(6) UNSIGNED NOT NULL,
  `faculty` int(6) NOT NULL,
  `definition` varchar(25) NOT NULL,
  `description` varchar(50) DEFAULT NULL,
  `enable` int(1) DEFAULT NULL,
  `selected` int(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `projects`
--

INSERT INTO `projects` (`project_id`, `faculty`, `definition`, `description`, `enable`, `selected`) VALUES
(123, 4545, 'Online Leave Management ', 'Online Leave Management', 1, 0),
(159, 4545, 'Resume Generation', 'Automatic Resume Generation (Admin)', 1, 0),
(456, 4545, 'Resort Management system', 'Resort Management system', 1, 0),
(555, 157, 'XYZ', 'xcvbn', 1, 0),
(789, 4545, 'Resume Generation', 'Automatic Resume Generation (Admin)', 1, 0),
(12345, 157, 'xyz', 'Abc', 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `p_11122`
--

CREATE TABLE `p_11122` (
  `no` int(5) UNSIGNED NOT NULL,
  `project_id` int(6) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `p_11126`
--

CREATE TABLE `p_11126` (
  `no` int(5) UNSIGNED NOT NULL,
  `project_id` int(6) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `p_11129`
--

CREATE TABLE `p_11129` (
  `no` int(5) UNSIGNED NOT NULL,
  `project_id` int(6) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `p_11132`
--

CREATE TABLE `p_11132` (
  `no` int(5) UNSIGNED NOT NULL,
  `project_id` int(6) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `student_id` int(6) UNSIGNED NOT NULL,
  `faculty` int(6) NOT NULL,
  `password` varchar(20) DEFAULT NULL,
  `cpi` float NOT NULL,
  `first_name` varchar(15) DEFAULT NULL,
  `last_name` varchar(15) DEFAULT NULL,
  `birthdate` varchar(10) NOT NULL,
  `participate` int(1) DEFAULT NULL,
  `leader` int(6) DEFAULT NULL,
  `allocated` int(1) DEFAULT NULL,
  `email` varchar(35) NOT NULL,
  `contact_no` varchar(13) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`student_id`, `faculty`, `password`, `cpi`, `first_name`, `last_name`, `birthdate`, `participate`, `leader`, `allocated`, `email`, `contact_no`) VALUES
(11122, 157, '1999', 7.06, 'Prince', 'Jain', '1996-03-04', 1, 11122, 0, 'p@gmail.com', '9876543210'),
(11123, 157, '1995', 8.05, 'Pravin', 'Joda', '1995-05-05', 1, 11122, 0, 'pj@gmail.com', '8765432100'),
(11124, 157, '1995-05-05', 8.07, 'Jagdish', 'Choudary', '1995-05-05', 1, 11122, 0, 'j@gmail.com', '7654321098'),
(11125, 157, '1995-08-08', 6.07, 'Ravi', 'Sitara', '1995-08-08', 1, 11122, 0, 'r@gmail.com', '7654321809'),
(11126, 157, '11126', 7.5, 'prashant', 'choudhary', '1996-02-02', 1, 11126, 0, 'pr@gmail.com', '7894561238'),
(11127, 157, '1995-03-04', 8.5, 'Dirali', 'Jian', '1995-03-04', 1, 11126, 0, 'dj@gmail.com', '8741526308'),
(11128, 157, '1998-04-09', 7.9, 'prashant', 'Jain', '1998-04-09', 1, 11126, 0, 'ppj@gmail.com', '5623897410'),
(11129, 157, '11129', 9.4, 'Pravin', 'Sitara', '1997-02-09', 1, 11129, 0, 'ps@gmail.com', '7485961230'),
(11130, 157, '1997-12-05', 9.9, 'Dirali', 'Choudary', '1997-12-05', 1, 11129, 0, 'dc@gmail.com', '4152637890'),
(11131, 157, '1994-08-05', 6.6, 'Vivek', 'Bajarang', '1994-08-05', 1, 11129, 0, 'vb@gmail.com', '8520963741'),
(11132, 157, '1257', 8.1, 'prathamesh', 'padwal', '1996-06-12', 1, 11132, 0, 'ps@gmail.com', '9811223333'),
(11133, 157, '1995-05-05', 7.7, 'jadi', 'chouhan', '1995-05-05', 1, 11132, 0, 'jd@gmail.com', '9988653121'),
(11134, 157, '1998-12-02', 6.76, 'akansha', 'choudhary', '1998-12-02', 1, 11132, 0, 'jagu@gmail.com', '9811223355'),
(11135, 157, '19', 8.4, 'world', 'Jagu', '1995-05-05', 1, 0, 0, 'ds@gmail.com', '123456789');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `allocation_process`
--
ALTER TABLE `allocation_process`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `assign`
--
ALTER TABLE `assign`
  ADD PRIMARY KEY (`Work_No`);

--
-- Indexes for table `faculty`
--
ALTER TABLE `faculty`
  ADD PRIMARY KEY (`faculty_id`);

--
-- Indexes for table `groups`
--
ALTER TABLE `groups`
  ADD PRIMARY KEY (`leader`);

--
-- Indexes for table `projects`
--
ALTER TABLE `projects`
  ADD PRIMARY KEY (`project_id`);

--
-- Indexes for table `p_11122`
--
ALTER TABLE `p_11122`
  ADD UNIQUE KEY `no` (`no`),
  ADD UNIQUE KEY `project_id` (`project_id`);

--
-- Indexes for table `p_11126`
--
ALTER TABLE `p_11126`
  ADD UNIQUE KEY `no` (`no`),
  ADD UNIQUE KEY `project_id` (`project_id`);

--
-- Indexes for table `p_11129`
--
ALTER TABLE `p_11129`
  ADD UNIQUE KEY `no` (`no`),
  ADD UNIQUE KEY `project_id` (`project_id`);

--
-- Indexes for table `p_11132`
--
ALTER TABLE `p_11132`
  ADD UNIQUE KEY `no` (`no`),
  ADD UNIQUE KEY `project_id` (`project_id`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`student_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `assign`
--
ALTER TABLE `assign`
  MODIFY `Work_No` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `projects`
--
ALTER TABLE `projects`
  MODIFY `project_id` int(6) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12346;
--
-- AUTO_INCREMENT for table `p_11122`
--
ALTER TABLE `p_11122`
  MODIFY `no` int(5) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `p_11126`
--
ALTER TABLE `p_11126`
  MODIFY `no` int(5) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `p_11129`
--
ALTER TABLE `p_11129`
  MODIFY `no` int(5) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `p_11132`
--
ALTER TABLE `p_11132`
  MODIFY `no` int(5) UNSIGNED NOT NULL AUTO_INCREMENT;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
