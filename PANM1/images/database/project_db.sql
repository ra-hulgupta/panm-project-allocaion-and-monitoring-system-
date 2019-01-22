-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 21, 2019 at 10:49 AM
-- Server version: 10.1.37-MariaDB
-- PHP Version: 7.3.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
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
(0, 0);

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
(157, 'Neha K', '157', 'nehap03@gmail.com', '9920407018', 1, 1),
(158, 'Shridhar', '454', 'shidhar@gmail.com', '1684123', 0, 1),
(159, 'mahima chauhan', 'mahima', 'mahima@outlook.com', '9102934392', 0, 1),
(160, 'Zahir alam', 'zahirhumain', 'zahirhihumain@khudkaemail.com', 'nahidunga', 1, 1),
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
(12347, 11125, 12348, 12349, 6.52, 0, 123, 159, 213, '123');

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
(123, 0, 'Online Leave Management ', 'Online Leave Management', 0, 0),
(159, 0, 'Resume Generation', 'Automatic Resume Generation (Admin)', 0, 0),
(213, 0, 'some project title1', 'description1...hiii', 1, 0),
(214, 0, 'some project title2', 'description2', 1, 0),
(215, 0, 'some project title3', 'description3...', 1, 0),
(216, 0, 'some project title4', 'description4', 1, 0),
(456, 0, 'Resort Management system', 'Resort Management system', 1, 0),
(555, 0, 'XYZ', 'xcvbn', 1, 0),
(789, 0, 'Resume Generation', 'Automatic Resume Generation (Admin)', 1, 0),
(2000, 157, 'Title 1..', 'description 1........', 1, 0),
(2001, 157, 'Title 2...', 'description 2.......', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `p_12347`
--

CREATE TABLE `p_12347` (
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
(105, 157, '2004-04-02', 8.2, 'vashisth', 'shah', '2004-04-02', 1, 0, 0, 'vashishth@yahoo.com', '9929329499'),
(11122, 157, '1999', 7.06, 'Prince', 'Jain', '1996-03-04', 0, 0, 0, 'p@gmail.com', '9876543210'),
(11123, 157, '1995', 8.05, 'Pravin', 'Joda', '1995-05-05', 1, 0, 0, 'pj@gmail.com', '8765432100'),
(11124, 157, '1995-05-05', 8.07, 'Jagdish', 'Choudary', '1995-05-05', 0, 0, 0, 'j@gmail.com', '7654321098'),
(11125, 157, '1995-08-08', 6.07, 'Ravi', 'Sitara', '1995-08-08', 0, 12347, 0, 'r@gmail.com', '7654321809'),
(11126, 157, '11126', 7.5, 'prashant', 'choudhary', '1996-02-02', 1, 0, 0, 'pr@gmail.com', '7894561238'),
(11127, 157, '1995-03-04', 8.5, 'Dirali', 'Jian', '1995-03-04', 1, 0, 0, 'dj@gmail.com', '8741526308'),
(11128, 157, '1998-04-09', 7.9, 'prashant', 'Jain', '1998-04-09', 1, 0, 0, 'ppj@gmail.com', '5623897410'),
(11129, 157, '11129', 9.4, 'Pravin', 'Sitara', '1997-02-09', 1, 0, 0, 'ps@gmail.com', '7485961230'),
(11130, 157, '1997-12-05', 9.9, 'Dirali', 'Choudary', '1997-12-05', 1, 0, 0, 'dc@gmail.com', '4152637890'),
(11131, 157, '1994-08-05', 6.6, 'Vivek', 'Bajarang', '1994-08-05', 1, 0, 0, 'vb@gmail.com', '8520963741'),
(11132, 157, '1257', 8.1, 'prathamesh', 'padwal', '1996-06-12', 1, 0, 0, 'ps@gmail.com', '9811223333'),
(11133, 157, '1995-05-05', 7.7, 'jadi', 'chouhan', '1995-05-05', 1, 0, 0, 'jd@gmail.com', '9988653121'),
(11134, 157, '1998-12-02', 6.76, 'akansha', 'choudhary', '1998-12-02', 1, 0, 0, 'jagu@gmail.com', '9811223355'),
(12347, 157, 'rahul', 6.67, 'rahul', 'gupta', '1997-08-13', 1, 12347, 0, 'xyz@gmail.com', '9122847505'),
(12348, 158, 'nilesh', 6.67, 'nilesh', 'gupta', '1997-08-13', 1, 12347, 0, 'xyz@gmail.com', '9122847505'),
(12349, 159, 'varun', 6.67, 'varun', 'mishra', '1997-08-13', 1, 12347, 0, 'xyz@gmail.com', '9122847505'),
(12350, 160, 'yogesh', 6.67, 'yogesh', 'mutha', '1997-08-13', 1, 0, 0, 'xyz@gmail.com', '9122847505'),
(12351, 161, 'divyesh', 6.67, 'divyesh', 'gohil', '1997-08-13', 1, 0, 0, 'xyz@gmail.com', '9122847505');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `allocate`
--
ALTER TABLE `allocate`
  ADD UNIQUE KEY `leader` (`leader`);

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
-- Indexes for table `p_12347`
--
ALTER TABLE `p_12347`
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
  MODIFY `Work_No` int(4) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `projects`
--
ALTER TABLE `projects`
  MODIFY `project_id` int(6) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12346;

--
-- AUTO_INCREMENT for table `p_12347`
--
ALTER TABLE `p_12347`
  MODIFY `no` int(5) UNSIGNED NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
