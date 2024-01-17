-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 06, 2021 at 09:08 AM
-- Server version: 10.4.18-MariaDB
-- PHP Version: 7.3.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mustard`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `ID` varchar(250) NOT NULL,
  `first_name` varchar(250) NOT NULL,
  `last_name` varchar(250) NOT NULL,
  `phone_number` varchar(250) NOT NULL,
  `email` varchar(250) NOT NULL,
  `address` varchar(250) NOT NULL,
  `password` varchar(250) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 0,
  `type` varchar(250) NOT NULL DEFAULT 'staff',
  `token` varchar(250) NOT NULL,
  `date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`ID`, `first_name`, `last_name`, `phone_number`, `email`, `address`, `password`, `status`, `type`, `token`, `date`) VALUES
('60fd61a733c30', 'seriki', 'oluwasola', '0238230978', 'serikioluwagbenga@gmail.com', 'Bank road', '$2y$10$8gszgGUqAXq9QBCrdVPV7.mqaMVTNW2/CFr/hJjg7EcgJx/XuDhwK', 0, 'staff', 'e2213676468044ec7837896cdb7b9ffbecff5d', '2021-07-25 14:05:48'),
('61080ab2dadaa', 'Nathan', 'Fair', '5809774669', 'johnsmith@gmail.com', '158 Sprenger Avenue, NY', '$2y$10$Wm/YHHanYRWfyyysdfi2r.epBfdOLtgEQNSditSvaqG385Ya6LsdO', 0, 'staff', '', '2021-08-02 16:09:42'),
('626', 'Seriki', 'Gbenga', '07036269979', 'segma@gmail.com', 'Ado Ekiti', '$2y$10$UgrqJ8NA0TUeu6SCiuOcx.rwgcj5BirOULiVJpsBPA2LjKPvKcpxO', 1, 'admin', '947a21579b7bea5ba30d658e563e2028bc44b1', '2021-06-22 03:32:18');

-- --------------------------------------------------------

--
-- Table structure for table `cooperative`
--

CREATE TABLE `cooperative` (
  `ID` varchar(250) NOT NULL,
  `userID` varchar(250) NOT NULL,
  `created_by` varchar(250) NOT NULL,
  `amount` int(20) NOT NULL,
  `interest` varchar(250) NOT NULL,
  `balance` varchar(250) NOT NULL,
  `status` int(20) NOT NULL DEFAULT 1,
  `date` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `ID` varchar(250) NOT NULL,
  `ledger_no` bigint(200) NOT NULL,
  `first_name` varchar(250) NOT NULL,
  `last_name` varchar(250) NOT NULL,
  `gender` varchar(250) NOT NULL,
  `age` varchar(250) NOT NULL,
  `state_of_origin` varchar(250) NOT NULL,
  `LGA` varchar(250) NOT NULL,
  `town_of_residence` varchar(250) NOT NULL,
  `phone_number` varchar(250) NOT NULL,
  `email` varchar(250) NOT NULL,
  `address` varchar(250) NOT NULL,
  `employment_status` varchar(250) NOT NULL,
  `office_address` varchar(250) NOT NULL,
  `grade_level_step` varchar(250) NOT NULL,
  `date_of_first_appointment` varchar(250) NOT NULL,
  `biometric` varchar(250) NOT NULL,
  `nickname` varchar(250) NOT NULL,
  `business_address` varchar(250) NOT NULL,
  `home_address` varchar(250) NOT NULL,
  `customer_type` varchar(250) NOT NULL,
  `image` varchar(250) NOT NULL,
  `status` varchar(250) NOT NULL DEFAULT 'pending',
  `date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `customer_grouped_list`
--

CREATE TABLE `customer_grouped_list` (
  `ID` int(11) NOT NULL,
  `userID` varchar(250) NOT NULL,
  `groupID` varchar(250) NOT NULL,
  `date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `grouped`
--

CREATE TABLE `grouped` (
  `ID` varchar(250) NOT NULL,
  `added_by` varchar(250) NOT NULL,
  `group_name` varchar(250) NOT NULL,
  `date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `idcards`
--

CREATE TABLE `idcards` (
  `ID` int(11) NOT NULL,
  `userID` varchar(250) NOT NULL,
  `addedby` varchar(250) NOT NULL,
  `IDtype` varchar(250) NOT NULL,
  `image` varchar(250) NOT NULL,
  `date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `loans`
--

CREATE TABLE `loans` (
  `ID` bigint(11) NOT NULL,
  `userID` varchar(250) NOT NULL,
  `created_by` varchar(250) NOT NULL,
  `amount_applied_for` varchar(250) NOT NULL,
  `date_borrowed` varchar(250) NOT NULL,
  `date_to_pay` varchar(250) NOT NULL,
  `interest_rate` varchar(250) NOT NULL,
  `payment_duration` varchar(250) NOT NULL,
  `amount_to_pay` varchar(250) NOT NULL,
  `purpose` varchar(250) NOT NULL,
  `loantype` varchar(250) NOT NULL,
  `typeID` varchar(250) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `markers`
--

CREATE TABLE `markers` (
  `id` int(11) NOT NULL,
  `name` varchar(60) NOT NULL,
  `address` varchar(80) NOT NULL,
  `lat` float(10,6) NOT NULL,
  `lng` float(10,6) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `markers`
--

INSERT INTO `markers` (`id`, `name`, `address`, `lat`, `lng`) VALUES
(1, 'Frankie Johnnie & Luigo Too', '939 W El Camino Real, Mountain View, CA', 37.386337, -122.085823),
(2, 'Amici\'s East Coast Pizzeria', '790 Castro St, Mountain View, CA', 37.387138, -122.083237),
(3, 'Kapp\'s Pizza Bar & Grill', '191 Castro St, Mountain View, CA', 37.393887, -122.078918),
(4, 'Round Table Pizza: Mountain View', '570 N Shoreline Blvd, Mountain View, CA', 37.402653, -122.079353),
(5, 'Tony & Alba\'s Pizza & Pasta', '619 Escuela Ave, Mountain View, CA', 37.394012, -122.095528),
(6, 'Oregano\'s Wood-Fired Pizza', '4546 El Camino Real, Los Altos, CA', 37.401726, -122.114647);

-- --------------------------------------------------------

--
-- Table structure for table `meta`
--

CREATE TABLE `meta` (
  `ID` int(11) NOT NULL,
  `meta_data` varchar(250) NOT NULL,
  `meta_value` varchar(250) NOT NULL,
  `date` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `meta_data`
--

CREATE TABLE `meta_data` (
  `ID` int(11) NOT NULL,
  `userID` varchar(250) NOT NULL,
  `meta_name` varchar(250) NOT NULL,
  `meta_value` varchar(250) NOT NULL,
  `added_by` varchar(250) NOT NULL,
  `date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `next_of_kin`
--

CREATE TABLE `next_of_kin` (
  `ID` int(11) NOT NULL,
  `userID` varchar(250) NOT NULL,
  `kin_full_name` varchar(250) NOT NULL,
  `kin_phone_number` varchar(250) NOT NULL,
  `kin_relationship` varchar(250) NOT NULL,
  `kin_contact_address` varchar(250) NOT NULL,
  `date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `people_assign`
--

CREATE TABLE `people_assign` (
  `ID` int(11) NOT NULL,
  `adminID` varchar(250) NOT NULL,
  `userID` varchar(250) NOT NULL,
  `type` varchar(250) NOT NULL DEFAULT 'customers',
  `date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `ID` int(11) NOT NULL,
  `userID` varchar(250) NOT NULL,
  `therole` varchar(250) NOT NULL,
  `date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `sponsors`
--

CREATE TABLE `sponsors` (
  `ID` int(11) NOT NULL,
  `userID` varchar(250) NOT NULL,
  `sponsor_full_name` varchar(250) NOT NULL,
  `sponsor_address` varchar(250) NOT NULL,
  `sponsor_place_of_work` varchar(250) NOT NULL,
  `sponsor_phone_number` varchar(250) NOT NULL,
  `added_by` varchar(250) NOT NULL,
  `date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `staff_assign`
--

CREATE TABLE `staff_assign` (
  `ID` int(11) NOT NULL,
  `adminID` varchar(250) NOT NULL,
  `staffID` varchar(250) NOT NULL,
  `assign_by` varchar(250) NOT NULL,
  `date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tasks`
--

CREATE TABLE `tasks` (
  `ID` int(11) NOT NULL,
  `payID` varchar(250) NOT NULL,
  `pay_in_by` varchar(250) NOT NULL,
  `userID` varchar(250) NOT NULL,
  `amount` varchar(250) DEFAULT NULL,
  `amount_paid` varchar(250) NOT NULL DEFAULT '0',
  `task_for` varchar(250) DEFAULT NULL,
  `date_to_pay` date NOT NULL,
  `status` int(11) NOT NULL DEFAULT 0,
  `date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `thrift`
--

CREATE TABLE `thrift` (
  `ID` varchar(250) NOT NULL,
  `userID` varchar(250) NOT NULL,
  `created_by` varchar(250) NOT NULL,
  `amount` varchar(250) NOT NULL,
  `interest` varchar(250) NOT NULL,
  `duration_from` varchar(250) NOT NULL,
  `duration_to` varchar(250) NOT NULL,
  `payment_plan` varchar(250) NOT NULL,
  `balance` varchar(250) NOT NULL,
  `status` varchar(250) NOT NULL DEFAULT '1',
  `date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `thriftloan`
--

CREATE TABLE `thriftloan` (
  `ID` varchar(250) NOT NULL,
  `added_by` varchar(250) NOT NULL,
  `loantype` varchar(250) NOT NULL,
  `payment_plan` varchar(250) NOT NULL,
  `amount` bigint(250) NOT NULL,
  `duration` varchar(250) NOT NULL,
  `date_borrowed` varchar(250) NOT NULL,
  `interest` varchar(250) NOT NULL,
  `guarantor_name` varchar(250) NOT NULL,
  `guarantor_phone_number` varchar(250) NOT NULL,
  `guarantor_address` varchar(250) NOT NULL,
  `collateral_name` varchar(250) NOT NULL,
  `collateral_price_worth` bigint(250) NOT NULL,
  `collateral_description` varchar(250) NOT NULL,
  `userID` varchar(250) NOT NULL,
  `status` int(250) NOT NULL DEFAULT 1,
  `date` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `withdraw`
--

CREATE TABLE `withdraw` (
  `ID` varchar(250) NOT NULL,
  `withformID` varchar(250) NOT NULL,
  `withform` varchar(250) NOT NULL,
  `amount` varchar(250) NOT NULL,
  `withfor` varchar(250) NOT NULL,
  `withby` varchar(250) NOT NULL,
  `date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `customer_grouped_list`
--
ALTER TABLE `customer_grouped_list`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `grouped`
--
ALTER TABLE `grouped`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `idcards`
--
ALTER TABLE `idcards`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `loans`
--
ALTER TABLE `loans`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `markers`
--
ALTER TABLE `markers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `meta`
--
ALTER TABLE `meta`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `meta_data`
--
ALTER TABLE `meta_data`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `next_of_kin`
--
ALTER TABLE `next_of_kin`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `people_assign`
--
ALTER TABLE `people_assign`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `sponsors`
--
ALTER TABLE `sponsors`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `staff_assign`
--
ALTER TABLE `staff_assign`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `tasks`
--
ALTER TABLE `tasks`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `thrift`
--
ALTER TABLE `thrift`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `thriftloan`
--
ALTER TABLE `thriftloan`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `withdraw`
--
ALTER TABLE `withdraw`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `customer_grouped_list`
--
ALTER TABLE `customer_grouped_list`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `idcards`
--
ALTER TABLE `idcards`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `loans`
--
ALTER TABLE `loans`
  MODIFY `ID` bigint(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `markers`
--
ALTER TABLE `markers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `meta`
--
ALTER TABLE `meta`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `meta_data`
--
ALTER TABLE `meta_data`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `next_of_kin`
--
ALTER TABLE `next_of_kin`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `people_assign`
--
ALTER TABLE `people_assign`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `sponsors`
--
ALTER TABLE `sponsors`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `staff_assign`
--
ALTER TABLE `staff_assign`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tasks`
--
ALTER TABLE `tasks`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
