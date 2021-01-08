-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 05, 2018 at 10:35 AM
-- Server version: 10.1.30-MariaDB
-- PHP Version: 7.0.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `projectsystem`
--

-- --------------------------------------------------------

--
-- Table structure for table `general_information`
--

CREATE TABLE `general_information` (
  `Proj_code` varchar(30) NOT NULL,
  `Proj_name` varchar(255) NOT NULL,
  `Procurement_code` varchar(30) NOT NULL,
  `Procurement_type` varchar(255) NOT NULL,
  `Funding` varchar(255) NOT NULL,
  `AppearsIn_BussPlan` varchar(3) NOT NULL,
  `DateOf_initiation` date NOT NULL,
  `CostAt_initiation` varchar(30) NOT NULL,
  `Proj_implementer` varchar(255) NOT NULL,
  `Proj_manager` varchar(255) NOT NULL,
  `Proj_coordinator` varchar(255) NOT NULL,
  `Purpose` text NOT NULL,
  `Scope` text NOT NULL,
  `DateOf_contract` date NOT NULL,
  `Planned_costing` varchar(30) NOT NULL,
  `Current_costing` varchar(30) NOT NULL,
  `Planned_completion` int(11) NOT NULL,
  `Impl_StartDate` date NOT NULL,
  `Impl_EndDate` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `general_information`
--

INSERT INTO `general_information` (`Proj_code`, `Proj_name`, `Procurement_code`, `Procurement_type`, `Funding`, `AppearsIn_BussPlan`, `DateOf_initiation`, `CostAt_initiation`, `Proj_implementer`, `Proj_manager`, `Proj_coordinator`, `Purpose`, `Scope`, `DateOf_contract`, `Planned_costing`, `Current_costing`, `Planned_completion`, `Impl_StartDate`, `Impl_EndDate`) VALUES
('C-P 001', 'Supply of IT spares', 'C-PC 001', 'Contract', 'Capex', 'YES', '0000-00-00', '$37,999', 'BuseTECH.Inc', 'Manager ICT', 'ANGELO P', '   This is a small trick which I want to share with you all where instead of printing an entire window we can print a section from the page.   ', '  This is a small trick which I want to share with you all where instead of printing an entire window we can print a section from the page.  ', '0000-00-00', '$37,733 VAT inclusive', '$37,733 VAT inclusive', 1, '2018-04-26', '2018-05-25'),
('C-P 002', 'Supply of IT spares ..........', 'C-PC 006', 'Contract', 'Capex', 'NO', '2018-03-16', '$37,9996', 'BuseTECH.Inc', 'Manager ICT', 'ANGELO THOMAS', '        iiioio        ', '        kiiii        ', '2018-03-24', '$37,733 VAT inclusive', '$37,733 VAT inclusive', 1, '2018-04-20', '2018-04-21'),
('C-P 0029', 'Building two Dispensaries', 'C-PC 009', 'Contract', 'Capex', 'YES', '0000-00-00', '$37,999', 'V-Constructors', 'Manager ICT', 'ANGELO THOMAS', '  mwsasneeekkeene  ', '  kekeejjeeenn  ', '2018-04-01', '$27,999 VAT inclusive', '$37,733 VAT inclusive', 1, '2018-05-25', '2018-06-13'),
('C-P 0034', 'Building two Dispensaries', 'C-PC 031', 'Contract', 'Capex', 'YES', '2018-04-12', 'Tsh3,337,999', 'V-Constructors', 'Manager V-Constructors', 'XMDM', '   DDDDDDDDDDCEEcxddddddddddddddddd   ', '   cdadddddddddddccca   ', '2018-04-19', '$27,999 VAT inclusive', '$27,999 VAT inclusive', 15, '2018-04-30', '2018-05-16'),
('C-P 006', 'Construction of a bridge', 'C-PC 011', 'Contract', 'Capex', 'YES', '2018-03-29', '$27,999', 'V-Constructors', 'Manager V-Constructors', 'AYOUB KONDO', '    Construction of a bridge along Kilo-River    ', '     kkkkkkkkkk ffff  ', '2018-03-31', '$27,999 VAT inclusive', '$27,999 VAT inclusive', 1, '2018-04-28', '2018-04-28'),
('C-P 007', 'Building two Dispensaries', 'C-PC 010', 'LPO', 'Support Programme', 'YES', '2018-04-11', 'Tsh3,337,999', 'X-Constructors', 'Manager X-Constructors', 'Ismail Abdul', 'Buildin two dispensaries in Kilivo village in Kondoa', 'Rescue young children and mothers', '2018-04-18', 'Tsh2,337,999', 'Tsh2,337,999', 38, '2018-05-24', '2018-05-24'),
('C-P 0097', 'Building two Dispensaries', 'C-PC 013', 'LPO', 'Support Programme', 'NO', '2018-04-10', '$27,999', 'BuseTECH.Inc', 'Manager V-Constructors', 'Chenko Dafz', 'xxxxxxxxxxxxxxxxxxxxxxxxxxaXAXWW', 'FFFFFFFFFVDFS', '2018-04-12', '$27,999 VAT inclusive', '$37,733 VAT inclusive', 44, '2018-04-25', '2018-04-25'),
('C-P 011', 'Building two Dispensaries', 'C-PC 016', 'LPO', 'Capex', 'NO', '2018-04-28', '$27,999', 'V-Constructors', 'Manager V-Constructors', 'Chenko Dafz', 'kkmnmomk', 'mklÃ¦', '2018-04-20', 'Tsh2,337,999', '$27,999 VAT inclusive', 45, '2018-06-06', '2018-06-06'),
('C-P 014', 'Building two Dispensaries', 'C-PC 011', 'LPO', 'Support Programme', 'YES', '2018-04-25', 'Tsh3,337,999', '', '', '', '', '', '0000-00-00', '', '', 1, '0000-00-00', '0000-00-00'),
('C-P 016', 'Supply of Desktop computers', 'C-PC 033', 'Contract', 'Support Programme', 'YES', '2018-04-10', '$7,997', 'BuseTECH.Inc', 'Manager ICT', 'Dr. AYOUB KONDO', 'To supply twenty (20) categories of items. The lis..', 'To provide network spares and tools for the CAA ne..', '2018-04-11', '$7,997', '$7,997', 5, '2018-04-20', '2018-04-20'),
('C-P 018', 'Construction of a hospital', 'C-PC 0063', 'LPO', 'Support Programme', 'NO', '2018-04-10', '$27,999', 'BuseTECH.Inc', 'Manager V-Constructors', 'Chenko Dafz', '', '', '2018-04-18', '$27,999 VAT inclusive', '$27,999 VAT inclusive', 60, '2018-04-10', '2018-04-10'),
('C-P 067', 'Building two Dispensaries', 'C-PC 019', 'LPO', 'Capex', 'NO', '0000-00-00', '$37,999', '', '', '', '', '', '0000-00-00', '', '', 1, '0000-00-00', '0000-00-00');

-- --------------------------------------------------------

--
-- Table structure for table `implementation_status`
--

CREATE TABLE `implementation_status` (
  `Proj_code` varchar(30) NOT NULL,
  `Impl_code` varchar(30) NOT NULL,
  `Impl_status` varchar(255) NOT NULL,
  `Proj_status` varchar(255) NOT NULL,
  `Remarks` varchar(255) NOT NULL,
  `Action_required` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `implementation_status`
--

INSERT INTO `implementation_status` (`Proj_code`, `Impl_code`, `Impl_status`, `Proj_status`, `Remarks`, `Action_required`) VALUES
('C-P 001', 'C-IC001', 'Running', 'Running', 'good', 'ckwkww'),
('C-P 002', 'C-P-S 011', 'Good work', 'Completed', 'Excellent', 'No action required'),
('C-P 0034', 'C-P-S 013', 'xxxxxxxxxxxxxxxxxx', 'Running', 'xz<<cdddddddddd', 'dddddddddddd'),
('C-P 006', 'C-P-S 012', 'Bad work', 'Stalled', 'Worked should be done effeciently', 'No action required'),
('C-P 007', 'C-P-S 024', 'jdwsjkeedcdsj', 'Completed', 'eksdmksds', 'kdenkwkasdx'),
('C-P 011', 'C-P-S 091', 'jn  kl ln ', 'Stalled', 'nkkm l', 'mmjnkjlmjn '),
('C-P 014', 'C-P-S 019', ' zxdcccccccccccccxx<x sdd d ', 'Stalled', 'CDAAAD ', 'cdscC'),
('C-P 016', 'C-P-S 023', 'Nothing done', 'Terminated', 'Work should be  immediately done', 'Ensure effeciency'),
('C-P 018', 'C-P-S 018', 'caecccccccccccccccccc', 'Completed', 'xewwwwwwwwwwwwwwww', 'ewwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwww');

-- --------------------------------------------------------

--
-- Table structure for table `profileimg`
--

CREATE TABLE `profileimg` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` varchar(17) NOT NULL,
  `name` varchar(255) NOT NULL,
  `department` varchar(255) NOT NULL,
  `role` varchar(255) NOT NULL,
  `email_address` varchar(255) NOT NULL,
  `gender` varchar(255) NOT NULL,
  `telephone_no` int(20) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(12) DEFAULT NULL,
  `userimg` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `name`, `department`, `role`, `email_address`, `gender`, `telephone_no`, `username`, `password`, `userimg`) VALUES
('PMS-C-U-011', 'Angelo Thomas', 'I.T Department', 'ADMIN', 'angelobusee@gmail.com', 'Male', 719282772, 'angelobuse', '*EDF84C87293', '486603a5d9046392b9e6fcbee10f4558.jpg'),
('PMS-C-U-012', 'Ayoub Kondo34', 'Procurement Department.', '  USER  ', 'ayoubkondo@gmail.com', 'Male', 719641811, 'ayoubkondo1', '12345', 'IMG-20170530-WA0003.jpg'),
('PMS-C-U-021', 'Angelo Thomasiiii', 'Sales Department', 'USER', 'angelo@gmail.com', 'Male', 71992828, 'thomas', '*A4B61573190', ''),
('PMS-C-U-022', 'Ayoub Kondo22', 'Sales Department', 'USER', 'ayoubkondo@gmail.com', 'male', 719641811, 'ayoub', '1234', 'images.jpeg'),
('PMS-C-U-027', 'Pat Bube', 'Sales Department', 'USER', 'angelobuse9282@yahoo.com', 'Male', 928772622, 'bube', '1234', 'IMG-20170530-WA0003.jpg'),
('PMS-C-U-029', 'Angelo Thomas', 'Procurement Department.', 'USER', 'angelobuse@yahoo.com', 'Male', 928772622, 'buse', '1234', '5067970f23a7f6370d015f0af7549fd0.jpg'),
('PMS-C-U-072', 'Fahad Masoudi', 'Sales Department', ' USER ', 'masoudfahad@yahoo.com', 'Male', 711817277, 'fahadmasoud', '*71723D790DF', ''),
('PMS-C-U-073', 'Ali Rashid', 'Marketing Department', 'USER', 'alirashid72@yahoo.com', 'Male', 92999299, 'alirashidie', '1234', 'IMG-20180416-WA0034.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `general_information`
--
ALTER TABLE `general_information`
  ADD PRIMARY KEY (`Proj_code`);

--
-- Indexes for table `implementation_status`
--
ALTER TABLE `implementation_status`
  ADD PRIMARY KEY (`Proj_code`,`Impl_code`),
  ADD UNIQUE KEY `Proj_code` (`Proj_code`);

--
-- Indexes for table `profileimg`
--
ALTER TABLE `profileimg`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `profileimg`
--
ALTER TABLE `profileimg`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `implementation_status`
--
ALTER TABLE `implementation_status`
  ADD CONSTRAINT `implementation_status_ibfk_1` FOREIGN KEY (`Proj_code`) REFERENCES `general_information` (`Proj_code`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
