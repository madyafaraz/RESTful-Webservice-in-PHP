-- phpMyAdmin SQL Dump
-- version 4.8.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 04, 2018 at 10:45 PM
-- Server version: 10.1.33-MariaDB
-- PHP Version: 7.2.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cs602`
--

-- --------------------------------------------------------

--
-- Table structure for table `sk_courses`
--

CREATE TABLE `sk_courses` (
  `courseID` varchar(12) NOT NULL,
  `courseName` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sk_courses`
--

INSERT INTO `sk_courses` (`courseID`, `courseName`) VALUES
('cs502', 'information structures'),
('cs601', 'Web Application Development'),
('cs602', 'Server-Side Web Development'),
('cs701', 'Rich Internet Application Development'),
('cs702', 'test course'),
('cs786', 'course 786');

-- --------------------------------------------------------

--
-- Table structure for table `sk_students`
--

CREATE TABLE `sk_students` (
  `studentID` int(11) NOT NULL,
  `courseID` varchar(12) NOT NULL,
  `firstName` varchar(255) NOT NULL,
  `lastName` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sk_students`
--

INSERT INTO `sk_students` (`studentID`, `courseID`, `firstName`, `lastName`, `email`) VALUES
(1, 'cs601', 'John', 'Doe', 'john@doe.com'),
(2, 'cs601', 'Jane', 'Doe', 'jane@doe.com'),
(3, 'cs602', 'John', 'Smith', 'john@smith.com'),
(4, 'cs602', 'Jame', 'Smith', 'jane@smith.com'),
(5, 'cs701', 'John', 'Doe', 'john@doe.com'),
(6, 'cs701', 'Jane', 'Smith', 'jane@smith.com'),
(9, 'cs502', 'IBRAHIM', 'IBRAHIM', 'rob.syd@aol.com'),
(12, 'cs702', 'esdasd', 'esdasd', 'ds@gmail.com'),
(13, 'cs502', 'vvv', 'vvv', 'vv@vv.com'),
(14, 'cs601', 'user', 'user', 'user@user.com'),
(15, 'cs786', 'user1', 'user1', 'user@user1.com');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `sk_courses`
--
ALTER TABLE `sk_courses`
  ADD PRIMARY KEY (`courseID`);

--
-- Indexes for table `sk_students`
--
ALTER TABLE `sk_students`
  ADD PRIMARY KEY (`studentID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `sk_students`
--
ALTER TABLE `sk_students`
  MODIFY `studentID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
