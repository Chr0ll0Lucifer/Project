-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 16, 2023 at 04:58 PM
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
(1257, 'Sasuke', 'Uchiha', 'sasuke@gmail.com', 'sasuke123', 'kathmandu', 'Male', '2001-06-20', 9800000000),
(1271, 'Boa', 'hancock', 'boa@gmail.com', 'boa123', 'pokhara', 'Female', '2002-02-19', 9800000120);

-- --------------------------------------------------------

--
-- Table structure for table `employees_available_leave`
--

CREATE TABLE `employees_available_leave` (
  `leavedays_id` int(11) NOT NULL,
  `ID` int(11) DEFAULT NULL,
  `Casual leave` int(11) NOT NULL,
  `Sick leave` int(11) NOT NULL,
  `Medical leave` int(11) NOT NULL,
  `Maternity leave` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `employees_available_leave`
--

INSERT INTO `employees_available_leave` (`leavedays_id`, `ID`, `Casual leave`, `Sick leave`, `Medical leave`, `Maternity leave`) VALUES
(1, 1257, 10, 10, 56, 56),
(4, 1271, 0, 1, 56, 56);

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
  `emp_id` int(11) DEFAULT NULL,
  `Response_reason` varchar(255) NOT NULL,
  `processed` int(11) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `leaves`
--

INSERT INTO `leaves` (`ID`, `Leave_type`, `Applied_date`, `Start_date`, `End_date`, `No_of_days`, `Description`, `Status`, `emp_id`, `Response_reason`, `processed`) VALUES
(60, 'Casual leave', '2023-10-16', '2023-10-25', '2023-10-25', 1, 'xcsDFF', 'Approve', 1271, '', 0),
(61, 'Casual leave', '2023-10-16', '2023-10-22', '2023-10-22', 1, 'dsfweg', 'Reject', 1271, 'sorry', 0),
(64, 'Sick leave', '2023-10-16', '2023-10-23', '2023-10-23', 1, 'sick', 'Approve', 1271, 'okay take care', 0),
(65, 'Casual leave', '2023-10-16', '2023-10-18', '2023-10-21', 0, 'leaev', 'Pending', 1271, '', 0),
(66, 'Sick leave', '2023-10-16', '2023-10-18', '2023-10-20', 0, 'sfawf', 'Pending', 1271, '', 0),
(67, 'Sick leave', '2023-10-16', '2023-10-30', '2023-10-30', 1, 'bzdb', 'Pending', 1271, '', 0),
(68, 'Sick leave', '2023-10-16', '2023-10-31', '2023-11-05', 0, 'DVDS', 'Pending', 1271, '', 0),
(69, 'Sick leave', '2023-10-16', '2023-11-09', '2023-11-09', 1, 'bRgfd', 'Pending', 1271, '', 0),
(70, 'Sick leave', '2023-10-16', '2023-11-10', '2023-11-10', 1, 'bsfh', 'Pending', 1271, '', 0),
(71, 'Sick leave', '2023-10-16', '2023-10-17', '2023-10-17', 1, 'scac', 'Pending', 1271, '', 0);

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
(2, 'Casual leave', 'Casual leave', 10),
(3, 'Sick leave', 'Sick leave', 10),
(4, 'Medical leave', 'medical leave', 56);

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
(109, 'Devi', 'Paxton', 'devi@gmail.com', 'devi123', 'kathmandu', 'Female', '2023-07-31', 9841462530),
(110, 'sakura', 'pink', 'sakura@gmail.com', 'sakura123', 'pokhara', 'Female', '2020-10-27', 9849658230);

-- --------------------------------------------------------

--
-- Table structure for table `managerleaves`
--

CREATE TABLE `managerleaves` (
  `ID` int(11) NOT NULL,
  `Leave_type` varchar(50) NOT NULL,
  `Applied_date` date NOT NULL,
  `Start_date` date NOT NULL,
  `End_date` date NOT NULL,
  `No_of_days` int(11) NOT NULL,
  `Description` varchar(50) NOT NULL,
  `Status` char(50) NOT NULL,
  `M_id` int(11) NOT NULL,
  `processed` tinyint(1) DEFAULT 0,
  `Response_reason` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `managerleaves`
--

INSERT INTO `managerleaves` (`ID`, `Leave_type`, `Applied_date`, `Start_date`, `End_date`, `No_of_days`, `Description`, `Status`, `M_id`, `processed`, `Response_reason`) VALUES
(33, 'Sick leave', '2023-08-27', '2023-08-30', '2023-09-01', 3, 'Dgrgr', 'Approve', 110, 0, ''),
(35, 'Sick leave', '2023-10-15', '2023-10-17', '2023-10-19', 3, 'dsdf', 'Approve', 108, 0, ''),
(37, 'Casual leave', '2023-10-16', '2023-10-17', '2023-10-17', 1, 'fgesrg', 'cancelled', 109, 0, '');

-- --------------------------------------------------------

--
-- Table structure for table `manager_available_leave`
--

CREATE TABLE `manager_available_leave` (
  `leavedays_id` int(11) NOT NULL,
  `ID` int(11) DEFAULT NULL,
  `Casual leave` int(11) DEFAULT NULL,
  `Sick leave` int(11) DEFAULT NULL,
  `Medical leave` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `manager_available_leave`
--

INSERT INTO `manager_available_leave` (`leavedays_id`, `ID`, `Casual leave`, `Sick leave`, `Medical leave`) VALUES
(5, 109, 4, 5, 56),
(6, 110, 6, 3, 49);

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
-- Indexes for table `employees_available_leave`
--
ALTER TABLE `employees_available_leave`
  ADD PRIMARY KEY (`leavedays_id`),
  ADD KEY `fk_employeeleave` (`ID`);

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
-- Indexes for table `managerleaves`
--
ALTER TABLE `managerleaves`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `manager_available_leave`
--
ALTER TABLE `manager_available_leave`
  ADD PRIMARY KEY (`leavedays_id`),
  ADD KEY `fk_mid` (`ID`);

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
  MODIFY `emp_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1272;

--
-- AUTO_INCREMENT for table `employees_available_leave`
--
ALTER TABLE `employees_available_leave`
  MODIFY `leavedays_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `leaves`
--
ALTER TABLE `leaves`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=72;

--
-- AUTO_INCREMENT for table `leavetype`
--
ALTER TABLE `leavetype`
  MODIFY `L_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `manager`
--
ALTER TABLE `manager`
  MODIFY `M_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=112;

--
-- AUTO_INCREMENT for table `managerleaves`
--
ALTER TABLE `managerleaves`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `manager_available_leave`
--
ALTER TABLE `manager_available_leave`
  MODIFY `leavedays_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `employees_available_leave`
--
ALTER TABLE `employees_available_leave`
  ADD CONSTRAINT `fk_employeeleave` FOREIGN KEY (`ID`) REFERENCES `employees` (`emp_id`);

--
-- Constraints for table `leaves`
--
ALTER TABLE `leaves`
  ADD CONSTRAINT `emp_id` FOREIGN KEY (`emp_id`) REFERENCES `employees` (`emp_id`) ON DELETE SET NULL ON UPDATE SET NULL;

--
-- Constraints for table `manager_available_leave`
--
ALTER TABLE `manager_available_leave`
  ADD CONSTRAINT `fk_mid` FOREIGN KEY (`ID`) REFERENCES `manager` (`M_id`) ON DELETE SET NULL ON UPDATE SET NULL;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
