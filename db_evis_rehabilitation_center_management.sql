-- phpMyAdmin SQL Dump
-- version 4.5.2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jan 11, 2017 at 12:22 PM
-- Server version: 10.1.13-MariaDB
-- PHP Version: 5.6.20

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_evis_rehabilitation_center_management`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_admin`
--

CREATE TABLE `tbl_admin` (
  `admin_id` int(2) NOT NULL,
  `admin_name` varchar(100) NOT NULL,
  `admin_email` varchar(100) NOT NULL,
  `admin_password` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_admin`
--

INSERT INTO `tbl_admin` (`admin_id`, `admin_name`, `admin_email`, `admin_password`) VALUES
(1, 'Admin', 'admin@evis.com', '111111');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_expense`
--

CREATE TABLE `tbl_expense` (
  `expense_id` int(10) NOT NULL,
  `expense_category` int(2) NOT NULL,
  `net_expense` float(10,2) NOT NULL,
  `expense_paid_amount` float(10,2) NOT NULL,
  `expense_payable` float(10,2) NOT NULL,
  `expense_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `comment` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_expense`
--

INSERT INTO `tbl_expense` (`expense_id`, `expense_category`, `net_expense`, `expense_paid_amount`, `expense_payable`, `expense_time`, `comment`) VALUES
(1, 1, 50000.00, 40000.00, 10000.00, '2017-01-11 11:19:15', '');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_expense_category`
--

CREATE TABLE `tbl_expense_category` (
  `expense_category` int(2) NOT NULL,
  `expense_category_name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_expense_category`
--

INSERT INTO `tbl_expense_category` (`expense_category`, `expense_category_name`) VALUES
(1, 'House Rent');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_income`
--

CREATE TABLE `tbl_income` (
  `income_id` int(10) NOT NULL,
  `payment_id` int(10) DEFAULT NULL,
  `income_category` int(2) NOT NULL,
  `net_income` float(10,2) DEFAULT NULL,
  `income_received_amount` float(10,2) DEFAULT NULL,
  `income_receivable` float(10,2) DEFAULT NULL,
  `income_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `comment` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_income`
--

INSERT INTO `tbl_income` (`income_id`, `payment_id`, `income_category`, `net_income`, `income_received_amount`, `income_receivable`, `income_time`, `comment`) VALUES
(1, 1, 1, 10000.00, 9000.00, 1000.00, '2017-01-11 11:18:27', '');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_income_category`
--

CREATE TABLE `tbl_income_category` (
  `income_category` int(2) NOT NULL,
  `income_category_name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_income_category`
--

INSERT INTO `tbl_income_category` (`income_category`, `income_category_name`) VALUES
(1, 'Patient Payment'),
(2, 'Donation');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_patient`
--

CREATE TABLE `tbl_patient` (
  `patient_id` int(10) NOT NULL,
  `patient_due` float(10,2) NOT NULL,
  `patient_monthly_installment` float(10,2) NOT NULL,
  `patient_name` varchar(100) NOT NULL,
  `patient_image` varchar(255) NOT NULL,
  `patient_fathers_name` varchar(100) NOT NULL,
  `patient_mothers_name` varchar(100) NOT NULL,
  `patient_legal_guardian` varchar(100) NOT NULL,
  `patient_present_address` text NOT NULL,
  `patient_permanent_address` text NOT NULL,
  `patient_NID` varchar(50) NOT NULL,
  `patient_contact_mobile_1` varchar(50) NOT NULL,
  `patient_contact_mobile_2` varchar(50) NOT NULL,
  `patient_age` varchar(10) NOT NULL,
  `patient_education` text NOT NULL,
  `patient_material_status` varchar(10) NOT NULL,
  `patient_addition_name` varchar(50) NOT NULL,
  `patient_drug_addicted_length` varchar(10) NOT NULL,
  `patient_last_dose` varchar(20) NOT NULL,
  `patient_admission_date` varchar(11) NOT NULL,
  `patient_admission_id` varchar(50) NOT NULL,
  `patient_status` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_patient`
--

INSERT INTO `tbl_patient` (`patient_id`, `patient_due`, `patient_monthly_installment`, `patient_name`, `patient_image`, `patient_fathers_name`, `patient_mothers_name`, `patient_legal_guardian`, `patient_present_address`, `patient_permanent_address`, `patient_NID`, `patient_contact_mobile_1`, `patient_contact_mobile_2`, `patient_age`, `patient_education`, `patient_material_status`, `patient_addition_name`, `patient_drug_addicted_length`, `patient_last_dose`, `patient_admission_date`, `patient_admission_id`, `patient_status`) VALUES
(1, 1000.00, 10000.00, 'Md Bodrul Alam', '', 'Md Ahadul Alam', 'Morjina Alam', 'Md Ahadul Alam', 'Savar, Dhaka', 'Savar, Dhaka', '18854541256544775654', '01619542547', '01745489364', '34', 'B.Sc. Engg in CSE', 'Unmarried', 'Ya ba', '1 Year', '4 Hour Before', ' 11-01-2017', '11011484133031', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_payment`
--

CREATE TABLE `tbl_payment` (
  `payment_id` int(10) NOT NULL,
  `patient_id` int(10) NOT NULL,
  `payment_receipt_no` varchar(50) NOT NULL,
  `payment_balance` float(10,2) NOT NULL,
  `payment_paid` float(10,2) NOT NULL,
  `payment_due` float(10,2) NOT NULL,
  `payment_date` varchar(11) NOT NULL,
  `payment_due_date` varchar(11) NOT NULL,
  `payment_comment` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_payment`
--

INSERT INTO `tbl_payment` (`payment_id`, `patient_id`, `payment_receipt_no`, `payment_balance`, `payment_paid`, `payment_due`, `payment_date`, `payment_due_date`, `payment_comment`) VALUES
(1, 1, 'AS726542', 10000.00, 9000.00, 1000.00, ' 11-01-2017', ' 11-02-2017', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `tbl_expense`
--
ALTER TABLE `tbl_expense`
  ADD PRIMARY KEY (`expense_id`);

--
-- Indexes for table `tbl_expense_category`
--
ALTER TABLE `tbl_expense_category`
  ADD PRIMARY KEY (`expense_category`);

--
-- Indexes for table `tbl_income`
--
ALTER TABLE `tbl_income`
  ADD PRIMARY KEY (`income_id`);

--
-- Indexes for table `tbl_income_category`
--
ALTER TABLE `tbl_income_category`
  ADD PRIMARY KEY (`income_category`);

--
-- Indexes for table `tbl_patient`
--
ALTER TABLE `tbl_patient`
  ADD PRIMARY KEY (`patient_id`);

--
-- Indexes for table `tbl_payment`
--
ALTER TABLE `tbl_payment`
  ADD PRIMARY KEY (`payment_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  MODIFY `admin_id` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `tbl_expense`
--
ALTER TABLE `tbl_expense`
  MODIFY `expense_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `tbl_expense_category`
--
ALTER TABLE `tbl_expense_category`
  MODIFY `expense_category` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `tbl_income`
--
ALTER TABLE `tbl_income`
  MODIFY `income_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `tbl_income_category`
--
ALTER TABLE `tbl_income_category`
  MODIFY `income_category` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `tbl_patient`
--
ALTER TABLE `tbl_patient`
  MODIFY `patient_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `tbl_payment`
--
ALTER TABLE `tbl_payment`
  MODIFY `payment_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
