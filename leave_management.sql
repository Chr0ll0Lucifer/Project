-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 22, 2023 at 04:09 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `leave_management`
--

-- --------------------------------------------------------

--
-- Table structure for table `company`
--

CREATE TABLE `company` (
  `c_id` int(11) NOT NULL,
  `c_name` varchar(255) NOT NULL,
  `c_email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `c_address` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `company`
--

INSERT INTO `company` (`c_id`, `c_name`, `c_email`, `password`, `c_address`) VALUES
(1001, 'Admin', 'admin@gmail.com', 'admin123', 'kathmandu');

-- --------------------------------------------------------

--
-- Table structure for table `employees`
--

CREATE TABLE `employees` (
  `emp_id` int(11) NOT NULL,
  `Firstname` char(20) NOT NULL,
  `Lastname` char(20) NOT NULL,
  `Email` varchar(50) NOT NULL,
  `Password` varchar(30) NOT NULL,
  `Address` varchar(50) NOT NULL,
  `Gender` char(10) NOT NULL,
  `DOB` date NOT NULL,
  `Phone` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `employees`
--

INSERT INTO `employees` (`emp_id`, `Firstname`, `Lastname`, `Email`, `Password`, `Address`, `Gender`, `DOB`, `Phone`) VALUES
(1256, 'Alice', 'Sharma', 'ram@gmail.com', 'alice123', 'ktm', 'Female', '2023-01-24', 9800000000),
(1257, 'Sasuke', 'Uchiha', 'sasuke@gmail.com', 'sasuke123', 'kathmandu', 'Male', '2001-06-20', 9800000000),
(1258, 'reina', 'dark', 'reina@gmail.com', 'reina123', 'kathmandu', 'Female', '2001-02-22', 9800000001),
(1259, 'boa', 'hancock', 'boa@gmail.com', 'boa123', 'kathmandu', 'Female', '2001-06-20', 9841462589);

-- --------------------------------------------------------

--
-- Table structure for table `leaves`
--

CREATE TABLE `leaves` (
  `ID` int(11) NOT NULL,
  `Leave_type` char(50) NOT NULL,
  `Applied_date` date NOT NULL,
  `Start_date` date NOT NULL,
  `End_date` date NOT NULL,
  `No_of_days` int(11) NOT NULL,
  `Description` varchar(255) NOT NULL,
  `Status` char(20) NOT NULL,
  `emp_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `leaves`
--

INSERT INTO `leaves` (`ID`, `Leave_type`, `Applied_date`, `Start_date`, `End_date`, `No_of_days`, `Description`, `Status`, `emp_id`) VALUES
(1, 'Causal leave', '2023-06-04', '2023-06-05', '2023-06-06', 2, 'leave', 'cancelled', 1257),
(35, 'Causal leave', '2023-06-04', '2023-06-06', '2023-06-17', 12, 'ddfd', 'cancelled', 1259),
(36, 'Causal leave', '2023-06-04', '2023-06-06', '2023-06-14', 9, 'i dont want ', 'cancelled', 1257),
(37, 'Sick leave', '2023-06-04', '2023-06-05', '2023-06-06', 2, 'I am sick.', 'Approve', 1259),
(38, 'Sick leave', '2023-06-05', '2023-06-06', '2023-06-07', 2, 'i am sick.', 'cancelled', 1257),
(39, 'Medical leave', '2023-06-05', '2023-06-05', '2023-06-07', 3, 'MEDICAL', 'cancelled', 1257),
(40, 'Sick leave', '2023-06-18', '2023-06-19', '2023-06-20', 2, 'i am sick', 'cancelled', 1257);

-- --------------------------------------------------------

--
-- Table structure for table `leavetype`
--

CREATE TABLE `leavetype` (
  `L_id` int(11) NOT NULL,
  `Leave_type` char(50) NOT NULL,
  `Description` varchar(255) NOT NULL,
  `no of days` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `leavetype`
--

INSERT INTO `leavetype` (`L_id`, `Leave_type`, `Description`, `no of days`) VALUES
(2, 'Causal leave', 'Causal leave', 10),
(3, 'Sick leave', 'Sick leave', 10),
(4, 'Medical leave', 'medical leave', 56),
(6, 'Bereavement leave', 'Time off to grieve and make funeral arrangements', 5),
(7, 'maternity leave', 'Time off before and after child birth', 56),
(14, 'Half Day Leave', 'Half Day Leave', 1);

-- --------------------------------------------------------

--
-- Table structure for table `manager`
--

CREATE TABLE `manager` (
  `M_id` int(11) NOT NULL,
  `Firstname` char(20) NOT NULL,
  `Lastname` char(20) NOT NULL,
  `Email` varchar(255) NOT NULL,
  `Password` varchar(50) NOT NULL,
  `Address` varchar(255) NOT NULL,
  `Gender` char(15) NOT NULL,
  `DOB` date NOT NULL,
  `Phone` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `manager`
--

INSERT INTO `manager` (`M_id`, `Firstname`, `Lastname`, `Email`, `Password`, `Address`, `Gender`, `DOB`, `Phone`) VALUES
(102, 'Devi', 'Kumari', 'devi@gmail.com', 'devi123', 'pokhara', 'Female', '1997-07-13', 9849536278),
(103, 'Alice', 'Paxton', 'alice@gmail.com', 'alice123', 'kathmandu', 'Female', '1995-02-09', 9841425389);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `company`
--
ALTER TABLE `company`
  ADD PRIMARY KEY (`c_id`);

--
-- Indexes for table `employees`
--
ALTER TABLE `employees`
  ADD PRIMARY KEY (`emp_id`);

--
-- Indexes for table `leaves`
--
ALTER TABLE `leaves`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `emp_id` (`emp_id`);

--
-- Indexes for table `leavetype`
--
ALTER TABLE `leavetype`
  ADD PRIMARY KEY (`L_id`);

--
-- Indexes for table `manager`
--
ALTER TABLE `manager`
  ADD PRIMARY KEY (`M_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `company`
--
ALTER TABLE `company`
  MODIFY `c_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1002;

--
-- AUTO_INCREMENT for table `employees`
--
ALTER TABLE `employees`
  MODIFY `emp_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1262;

--
-- AUTO_INCREMENT for table `leaves`
--
ALTER TABLE `leaves`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT for table `leavetype`
--
ALTER TABLE `leavetype`
  MODIFY `L_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `manager`
--
ALTER TABLE `manager`
  MODIFY `M_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=104;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `leaves`
--
ALTER TABLE `leaves`
  ADD CONSTRAINT `emp_id` FOREIGN KEY (`emp_id`) REFERENCES `employees` (`emp_id`) ON DELETE SET NULL ON UPDATE SET NULL;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
