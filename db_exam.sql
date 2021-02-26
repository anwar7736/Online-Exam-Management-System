-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 26, 2020 at 06:11 PM
-- Server version: 10.1.29-MariaDB
-- PHP Version: 7.1.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_exam`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_admin`
--

CREATE TABLE `tbl_admin` (
  `adminId` int(11) NOT NULL,
  `adminUser` varchar(50) NOT NULL,
  `adminPass` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_admin`
--

INSERT INTO `tbl_admin` (`adminId`, `adminUser`, `adminPass`) VALUES
(1, 'admin', 'admin123');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_ans`
--

CREATE TABLE `tbl_ans` (
  `id` int(11) NOT NULL,
  `quesNo` int(11) NOT NULL,
  `rightAns` int(11) NOT NULL DEFAULT '0',
  `ques` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_ans`
--

INSERT INTO `tbl_ans` (`id`, `quesNo`, `rightAns`, `ques`) VALUES
(1, 1, 1, 'Hyper Text Markup Language'),
(2, 1, 0, 'Hyper Text Pre Processor'),
(3, 1, 0, 'Extensible Markup Language'),
(4, 1, 0, 'Cascading Style Sheet'),
(5, 2, 0, 'File Transfer Protocol'),
(6, 2, 1, 'Cascading Style Sheet'),
(7, 2, 0, 'Database Management System'),
(8, 2, 0, 'Asynchronous JavaScript and XML'),
(16, 3, 0, 'Extensible Markup Language'),
(17, 3, 0, 'Cascading Style Sheet'),
(18, 3, 1, 'Hypertext Pre Processor'),
(19, 3, 0, 'Universal Serial Bus'),
(32, 4, 1, 'Extensible Markup Language'),
(33, 4, 0, 'Cascading Style Sheet'),
(34, 4, 0, 'Hypertext Pre Processor'),
(35, 4, 0, 'Universal Serial Bus'),
(36, 5, 0, 'Extensible Markup Language'),
(37, 5, 0, 'Cascading Style Sheet'),
(38, 5, 0, 'Hypertext Pre Processor'),
(39, 5, 1, 'File Transfer Protocol'),
(48, 6, 0, 'Information Technology'),
(49, 6, 1, 'Information & Communication Technology'),
(50, 6, 0, 'Internet Computer Technology'),
(51, 6, 0, 'Individual Community Testing');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_ques`
--

CREATE TABLE `tbl_ques` (
  `id` int(11) NOT NULL,
  `quesNo` int(11) NOT NULL,
  `ques` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_ques`
--

INSERT INTO `tbl_ques` (`id`, `quesNo`, `ques`) VALUES
(1, 1, 'HTML stands for'),
(4, 2, 'CSS stands for'),
(8, 3, 'PHP stands for'),
(16, 4, 'XML stands for'),
(17, 5, 'FTP stands for'),
(20, 6, 'ICT stands for');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user`
--

CREATE TABLE `tbl_user` (
  `userid` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(32) NOT NULL,
  `email` varchar(255) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_user`
--

INSERT INTO `tbl_user` (`userid`, `name`, `username`, `password`, `email`, `status`) VALUES
(3, 'Sujon', 'sujon', '202cb962ac59075b964b07152d234b70', 'sujon13@gmail.com ', 1),
(4, 'Kamal', 'kamal', '202cb962ac59075b964b07152d234b70', 'kamal@gmail.com', 0),
(5, 'Sumon', 'sumon', 'c20ad4d76fe97759aa27a0c99bff6710', 'sumon@gmail.com', 1),
(6, 'Imran', 'imran', '3546ab441e56fa333f8b44b610d95691', 'imran32@gmail.com', 0),
(7, 'Anwar', 'anwar', '5eac43aceba42c8757b54003a58277b5', 'anwar33@gmail.com', 1),
(8, 'Anwara', 'anwara', 'e3251075554389fe91d17a794861d47b', 'anwara04@gmail.com', 0),
(9, 'Anwar Hossain', 'anwar', 'c8ffe9a587b126f152ed3d89a146b445', 'shara_enterprise@yahoo.com', 0),
(10, 'Anwar Hossain', 'anwar', 'c20ad4d76fe97759aa27a0c99bff6710', 'anwarhossain7736@gmail.com', 0),
(11, 'Anwar Hossain', 'anwar', '827ccb0eea8a706c4c34a16891f84e7b', 'raselrony@gmail.com', 0),
(12, 'Anwar Hossain', 'anwar', 'c645ab57c2737c8d45a7d5fc84ab6f1b', 'ssss@gmail.com', 0),
(13, 'Anwar Hossain', 'anwar', '250cf8b51c773f3f8dc8b4be867a9a02', 'shara_enterprise@ahoo.com', 0),
(14, 'Anwar Hossain', 'anwar', 'c20ad4d76fe97759aa27a0c99bff6710', 'shara64@gmail.com', 0),
(15, 'Anwar Hossain', 'anwar', 'c20ad4d76fe97759aa27a0c99bff6710', 'shohelrana.nestle@gmail.com', 0),
(16, 'Anwar Hossain', 'anwar', '202cb962ac59075b964b07152d234b70', 'azam04@gmail.com', 0),
(17, '', 'sujon13@gmail.com', '202cb962ac59075b964b07152d234b70', '', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  ADD PRIMARY KEY (`adminId`);

--
-- Indexes for table `tbl_ans`
--
ALTER TABLE `tbl_ans`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_ques`
--
ALTER TABLE `tbl_ques`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_user`
--
ALTER TABLE `tbl_user`
  ADD PRIMARY KEY (`userid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  MODIFY `adminId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_ans`
--
ALTER TABLE `tbl_ans`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;

--
-- AUTO_INCREMENT for table `tbl_ques`
--
ALTER TABLE `tbl_ques`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `tbl_user`
--
ALTER TABLE `tbl_user`
  MODIFY `userid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
