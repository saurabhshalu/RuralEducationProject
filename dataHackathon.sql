-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Oct 15, 2018 at 08:58 AM
-- Server version: 10.1.36-MariaDB
-- PHP Version: 7.2.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dataHackathon`
--

-- --------------------------------------------------------

--
-- Table structure for table `tblcitylist`
--

CREATE TABLE `tblcitylist` (
  `id` int(11) NOT NULL,
  `pincode` int(11) NOT NULL,
  `district` varchar(50) NOT NULL,
  `state` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblcitylist`
--

INSERT INTO `tblcitylist` (`id`, `pincode`, `district`, `state`) VALUES
(18, 382610, 'Gandhinagar', 'Gujarat'),
(19, 320008, 'Ahmedabad', 'Gujarat'),
(20, 383315, 'Modasa', 'Gujarat'),
(21, 389230, 'Lunawada', 'Gujarat');

-- --------------------------------------------------------

--
-- Table structure for table `tbleventlist`
--

CREATE TABLE `tbleventlist` (
  `id` int(11) NOT NULL,
  `mydate` date NOT NULL,
  `learner_id` varchar(30) NOT NULL,
  `subject` varchar(50) NOT NULL,
  `teacher_id` varchar(30) NOT NULL,
  `location` int(11) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbleventlist`
--

INSERT INTO `tbleventlist` (`id`, `mydate`, `learner_id`, `subject`, `teacher_id`, `location`, `status`) VALUES
(6, '2018-10-14', 'shivam@vs3.com', 'Maths', 'saurabh@vs3.com', 383315, 1),
(7, '2018-10-14', 'mahershi@vs3.com', 'Science', 'saurabh@vs3.com', 389230, 1),
(8, '2018-10-14', 'mahershi@vs3.com', 'History', 'saurabh@vs3.com', 389230, 1),
(9, '2018-10-14', 'mahershi@vs3.com', 'Maths', 'saurabh@vs3.com', 389230, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbllearner`
--

CREATE TABLE `tbllearner` (
  `id` int(11) NOT NULL,
  `password` varchar(25) NOT NULL,
  `email` varchar(50) NOT NULL,
  `pincode` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `phone` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbllearner`
--

INSERT INTO `tbllearner` (`id`, `password`, `email`, `pincode`, `name`, `phone`) VALUES
(4, '12345', 'shivam@vs3.com', 383315, 'Shivam Cholin', '7043680461'),
(5, '12345', 'mahershi@vs3.com', 389230, 'Mahershi Bhavsar', '9586657841');

-- --------------------------------------------------------

--
-- Table structure for table `tblteacher`
--

CREATE TABLE `tblteacher` (
  `id` int(11) NOT NULL,
  `password` varchar(25) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `pincode` varchar(300) NOT NULL,
  `phone` varchar(15) NOT NULL,
  `rating` double NOT NULL,
  `eventcount` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblteacher`
--

INSERT INTO `tblteacher` (`id`, `password`, `name`, `email`, `pincode`, `phone`, `rating`, `eventcount`) VALUES
(21, '12345', 'Saurabh Verma', 'saurabh@vs3.com', '382610', '8238378122', 0, 0),
(22, '12345', 'Suzen Christian', 'suzen@vs3.com', '320008', '9033406010', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_interestedteachers`
--

CREATE TABLE `tbl_interestedteachers` (
  `id` int(11) NOT NULL,
  `teacher_id` varchar(30) NOT NULL,
  `subject` varchar(30) NOT NULL,
  `pincode` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  `requestedBy` longtext
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_interestedteachers`
--

INSERT INTO `tbl_interestedteachers` (`id`, `teacher_id`, `subject`, `pincode`, `status`, `requestedBy`) VALUES
(7, 'saurabh@vs3.com', 'Maths', 383315, 1, 'shivam@vs3.com'),
(8, 'saurabh@vs3.com', 'Science', 389230, 1, 'mahershi@vs3.com'),
(9, 'saurabh@vs3.com', 'History', 389230, 1, NULL),
(11, 'saurabh@vs3.com', 'Science', 383315, 0, NULL),
(12, 'saurabh@vs3.com', 'History', 383315, 0, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_neededteachers`
--

CREATE TABLE `tbl_neededteachers` (
  `id` int(11) NOT NULL,
  `learner_id` varchar(30) NOT NULL,
  `subject` varchar(30) NOT NULL,
  `pincode` int(11) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_neededteachers`
--

INSERT INTO `tbl_neededteachers` (`id`, `learner_id`, `subject`, `pincode`, `status`) VALUES
(5, 'shivam@vs3.com', 'Maths', 383315, 1),
(6, 'mahershi@vs3.com', 'Maths', 389230, 1),
(7, 'shivam@vs3.com', 'Science', 383315, 0),
(8, 'shivam@vs3.com', 'History', 383315, 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tblcitylist`
--
ALTER TABLE `tblcitylist`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbleventlist`
--
ALTER TABLE `tbleventlist`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbllearner`
--
ALTER TABLE `tbllearner`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tblteacher`
--
ALTER TABLE `tblteacher`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_interestedteachers`
--
ALTER TABLE `tbl_interestedteachers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_neededteachers`
--
ALTER TABLE `tbl_neededteachers`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tblcitylist`
--
ALTER TABLE `tblcitylist`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `tbleventlist`
--
ALTER TABLE `tbleventlist`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `tbllearner`
--
ALTER TABLE `tbllearner`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tblteacher`
--
ALTER TABLE `tblteacher`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `tbl_interestedteachers`
--
ALTER TABLE `tbl_interestedteachers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `tbl_neededteachers`
--
ALTER TABLE `tbl_neededteachers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
