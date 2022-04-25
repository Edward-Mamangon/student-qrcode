-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 11, 2022 at 09:22 AM
-- Server version: 10.1.31-MariaDB
-- PHP Version: 7.2.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `student-qrcode_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_tbl`
--

CREATE TABLE `admin_tbl` (
  `id` int(255) NOT NULL,
  `user_name` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` enum('admin','teacher') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin_tbl`
--

INSERT INTO `admin_tbl` (`id`, `user_name`, `password`, `role`) VALUES
(1, 'Administrator', 'admin', 'admin'),
(2, 'Teacher', '12345', 'teacher');

-- --------------------------------------------------------

--
-- Table structure for table `student_tbl`
--

CREATE TABLE `student_tbl` (
  `id` int(255) NOT NULL,
  `idnumber` varchar(255) NOT NULL,
  `fname` varchar(255) NOT NULL,
  `mname` varchar(255) NOT NULL,
  `lname` varchar(255) NOT NULL,
  `grade` int(255) NOT NULL,
  `section` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `parent` varchar(255) NOT NULL,
  `contact` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `student_tbl`
--

INSERT INTO `student_tbl` (`id`, `idnumber`, `fname`, `mname`, `lname`, `grade`, `section`, `address`, `parent`, `contact`, `email`) VALUES
(47, '2018-02826', 'Ardene', 'Corpuz', 'Palima', 10, 'A', 'Surigao City', 'Archie Palima Sr.', '09460112284', 'rdn@gmail.com'),
(48, '2018-02929', 'Edward', 'Manuel', 'Mamangon', 9, 'B', 'Manila', 'Junrel Ednalig', '09876543231', 'edward@gmail.com'),
(49, '2018-98709', 'Christer', 'Miroy', 'Miroy', 8, 'A', 'Manila', 'Junrel Ednalig', '09876543231', 'christer@gmail.com'),
(50, '121-122', 'gwapito', 'adad', 'adas', 8, 'B', 'qdfgsad', 'wdfsads', '1234563241', 'Dsd@g.c'),
(51, '121-123', 'adasd', 'adasd', 'adad', 8, 'C', 'asdfghfgds', 'adssfdgfd', '0897654321', 'asdasd@g.c');

-- --------------------------------------------------------

--
-- Table structure for table `teacher_tbl`
--

CREATE TABLE `teacher_tbl` (
  `id` int(11) NOT NULL,
  `idnumber` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `grade` varchar(255) NOT NULL,
  `section` varchar(255) NOT NULL,
  `subject` varchar(255) NOT NULL,
  `contact` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `teacher_tbl`
--

INSERT INTO `teacher_tbl` (`id`, `idnumber`, `name`, `grade`, `section`, `subject`, `contact`, `username`, `password`) VALUES
(1, '213-12312', 'ardene', '8', 'A', 'Filipino', '09989877654', 'Administrator', 'admin'),
(3, '10453-123232', 'Ardene Palima', '9', 'B', 'Mathematics', '', 'gwapo', '12345'),
(16, '987-232', 'Edward Mamangon', '8', 'C', 'Science', '09876789011', 'edward', '12345');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin_tbl`
--
ALTER TABLE `admin_tbl`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `student_tbl`
--
ALTER TABLE `student_tbl`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `teacher_tbl`
--
ALTER TABLE `teacher_tbl`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin_tbl`
--
ALTER TABLE `admin_tbl`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `student_tbl`
--
ALTER TABLE `student_tbl`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;

--
-- AUTO_INCREMENT for table `teacher_tbl`
--
ALTER TABLE `teacher_tbl`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
