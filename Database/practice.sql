-- phpMyAdmin SQL Dump
-- version 4.8.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 08, 2018 at 09:02 PM
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
-- Database: `practice`
--

-- --------------------------------------------------------

--
-- Table structure for table `attendance`
--

CREATE TABLE `attendance` (
  `Att_id` int(11) NOT NULL,
  `Academic_year` varchar(8) NOT NULL,
  `Dept` varchar(10) NOT NULL,
  `Class` varchar(5) NOT NULL,
  `Sem` int(1) NOT NULL,
  `Date` date NOT NULL,
  `T_id` int(11) NOT NULL,
  `Sub_id` int(11) NOT NULL,
  `Roll` int(7) NOT NULL,
  `Status` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `attendance`
--

INSERT INTO `attendance` (`Att_id`, `Academic_year`, `Dept`, `Class`, `Sem`, `Date`, `T_id`, `Sub_id`, `Roll`, `Status`) VALUES
(1, '2018-19', 'IT', 'TE', 1, '2018-10-06', 101, 314441, 1833023, 1);

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `Type` varchar(10) NOT NULL,
  `Username` varchar(20) NOT NULL,
  `Password` varchar(20) NOT NULL,
  `Question` varchar(100) NOT NULL,
  `Answer` varchar(20) NOT NULL,
  `Log_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `Roll` int(7) NOT NULL,
  `Fname` varchar(10) NOT NULL,
  `Mname` varchar(10) NOT NULL,
  `Lname` varchar(10) NOT NULL,
  `Dept` varchar(10) NOT NULL,
  `Class` varchar(2) NOT NULL,
  `Email` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`Roll`, `Fname`, `Mname`, `Lname`, `Dept`, `Class`, `Email`) VALUES
(1833023, 'Shubham', 'Rajendra', 'Hadake', 'IT', 'TE', 'hadakesr714@gmail.com'),
(1833034, 'Omkar', 'Dhananjay', 'Kshirsagar', 'IT', 'TE', 'omkar.kshirsagar.it.2016@vpkbiet.org');

-- --------------------------------------------------------

--
-- Table structure for table `stud_contact`
--

CREATE TABLE `stud_contact` (
  `Roll` int(11) NOT NULL,
  `Contact` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `subject`
--

CREATE TABLE `subject` (
  `Sub_id` int(11) NOT NULL,
  `Sub_name` varchar(10) NOT NULL,
  `Department` varchar(10) NOT NULL,
  `Class` varchar(5) NOT NULL,
  `Sem` int(1) NOT NULL,
  `T_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `subject`
--

INSERT INTO `subject` (`Sub_id`, `Sub_name`, `Department`, `Class`, `Sem`, `T_id`) VALUES
(314441, 'TOC', 'IT', 'TE', 1, 102);

-- --------------------------------------------------------

--
-- Table structure for table `teacher`
--

CREATE TABLE `teacher` (
  `T_id` int(11) NOT NULL,
  `Fname` varchar(10) NOT NULL,
  `Mname` varchar(10) NOT NULL,
  `Lname` varchar(10) NOT NULL,
  `Dept` varchar(10) NOT NULL,
  `Type` varchar(20) NOT NULL,
  `Email` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `teacher`
--

INSERT INTO `teacher` (`T_id`, `Fname`, `Mname`, `Lname`, `Dept`, `Type`, `Email`) VALUES
(101, 'Avinash', 'Jagnnath', 'Kokare', 'IT', 'Assistant Professor', 'avinashsept27@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `teacher_contact`
--

CREATE TABLE `teacher_contact` (
  `T_id` int(11) NOT NULL,
  `Contact` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `attendance`
--
ALTER TABLE `attendance`
  ADD PRIMARY KEY (`Att_id`);

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`Log_id`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`Roll`);

--
-- Indexes for table `subject`
--
ALTER TABLE `subject`
  ADD PRIMARY KEY (`Sub_id`);

--
-- Indexes for table `teacher`
--
ALTER TABLE `teacher`
  ADD PRIMARY KEY (`T_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `attendance`
--
ALTER TABLE `attendance`
  MODIFY `Att_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `login`
--
ALTER TABLE `login`
  MODIFY `Log_id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
