-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 13, 2023 at 07:06 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hotel`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_ac_head`
--

CREATE TABLE `tbl_ac_head` (
  `id` int(11) NOT NULL,
  `head_name` varchar(255) NOT NULL,
  `head_code` int(11) NOT NULL DEFAULT 0,
  `head_type` int(11) NOT NULL,
  `created_at` datetime NOT NULL,
  `created_by` varchar(255) NOT NULL,
  `updated_at` datetime NOT NULL,
  `updated_by` varchar(255) NOT NULL,
  `deleted_at` datetime NOT NULL,
  `status` varchar(255) NOT NULL,
  `action` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_ac_head`
--

INSERT INTO `tbl_ac_head` (`id`, `head_name`, `head_code`, `head_type`, `created_at`, `created_by`, `updated_at`, `updated_by`, `deleted_at`, `status`, `action`) VALUES
(1, 'Cash', 101, 1, '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', '', 0),
(2, 'Chaque', 102, 1, '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', '', 0),
(3, 'Cash', 201, 2, '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', '', 0),
(4, 'Cheque', 202, 2, '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', '', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_booking`
--

CREATE TABLE `tbl_booking` (
  `id` int(11) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `nationality` varchar(255) NOT NULL,
  `nid_no` varchar(11) NOT NULL,
  `contact_no` int(11) NOT NULL,
  `room_type_id` int(11) NOT NULL,
  `check_in` date NOT NULL,
  `check_out` date NOT NULL,
  `status` int(11) NOT NULL COMMENT '0 pending, 1 accepted, 2 finish',
  `created_at` datetime NOT NULL,
  `created_by` varchar(255) NOT NULL,
  `updated_at` datetime NOT NULL,
  `updated_by` varchar(255) NOT NULL,
  `deleted_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_customer`
--

CREATE TABLE `tbl_customer` (
  `id` int(11) NOT NULL,
  `first_name` varchar(255) DEFAULT NULL,
  `last_name` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `nationality` varchar(255) DEFAULT NULL,
  `nid_no` varchar(255) DEFAULT NULL,
  `contact_no` varchar(255) DEFAULT NULL,
  `created_at` datetime NOT NULL,
  `created_by` varchar(255) NOT NULL,
  `updated_at` datetime NOT NULL,
  `updated_by` varchar(255) NOT NULL,
  `deleted_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_customer`
--

INSERT INTO `tbl_customer` (`id`, `first_name`, `last_name`, `email`, `nationality`, `nid_no`, `contact_no`, `created_at`, `created_by`, `updated_at`, `updated_by`, `deleted_at`) VALUES
(1, 'Noman', 'Hossain', 'noman@gmail.com', 'Bangladeshi', '0545452', '1689754152', '2023-06-07 08:36:41', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00'),
(2, 'maksuda', 'akter', 'maksuda@gmail.com', 'bangladeshi', '12335466877', '2147483647', '2023-06-07 09:00:06', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00'),
(3, 'Maksuda', 'Akter', 'maksuda@gamil.com', 'Bangladeshi', '12435365678', '2147483647', '2023-06-07 17:07:50', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00'),
(4, 'mahmuda', 'arobi', 'mahmuda@gmail.com', 'bangladeshi', '24354564756', '2147483647', '2023-06-11 17:30:48', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00'),
(5, 'fahmida', 'akter', 'fahmida@gmail.com', 'bangladeshi', '46456867908', '2147483647', '2023-06-12 08:47:01', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_gallery`
--

CREATE TABLE `tbl_gallery` (
  `id` int(11) NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `title` text DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_gallery`
--

INSERT INTO `tbl_gallery` (`id`, `image`, `title`, `created_at`, `created_by`, `updated_at`, `updated_by`, `deleted_at`) VALUES
(1, '16864999931588.jpg', 'Marco Polo Games', '2023-06-11 18:13:13', 3, NULL, NULL, NULL),
(2, '16865000257826.jpg', 'The Beach', '2023-06-11 18:13:45', 3, NULL, NULL, NULL),
(3, '16865000499239.jpg', 'Life Style Gym', '2023-06-11 18:14:09', 3, NULL, NULL, NULL),
(4, '16865000804884.jpg', 'Meetings & Events', '2023-06-11 18:14:40', 3, NULL, NULL, NULL),
(5, '16865001185921.jpg', 'Restaurant', '2023-06-11 18:15:18', 3, NULL, NULL, NULL),
(6, '16865001564280.jpg', 'Infinity Pool', '2023-06-11 18:15:56', 3, NULL, NULL, NULL),
(7, '16865001895591.jpg', 'Accommodation', '2023-06-11 18:16:29', 3, NULL, NULL, NULL),
(8, '16865002189783.jpg', 'Reception', '2023-06-11 18:16:58', 3, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_invoice`
--

CREATE TABLE `tbl_invoice` (
  `id` int(11) NOT NULL,
  `num_days` int(11) DEFAULT NULL,
  `invoice_number` varchar(255) DEFAULT NULL,
  `customer_id` int(11) NOT NULL,
  `amount` decimal(10,2) NOT NULL,
  `discount` decimal(10,2) NOT NULL DEFAULT 0.00,
  `vat` decimal(10,2) NOT NULL DEFAULT 0.00,
  `service_charge` decimal(10,2) NOT NULL DEFAULT 0.00,
  `total` decimal(10,2) NOT NULL,
  `created_at` datetime NOT NULL,
  `created_by` varchar(255) NOT NULL,
  `updated_at` datetime NOT NULL,
  `updated_by` varchar(255) NOT NULL,
  `deleted_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_invoice`
--

INSERT INTO `tbl_invoice` (`id`, `num_days`, `invoice_number`, `customer_id`, `amount`, `discount`, `vat`, `service_charge`, `total`, `created_at`, `created_by`, `updated_at`, `updated_by`, `deleted_at`) VALUES
(3, 2, 'INV_3', 1, '25000.00', '5.00', '15.00', '10.00', '30000.00', '2023-06-13 09:50:03', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00'),
(4, 4, 'INV_4', 2, '48000.00', '5.00', '15.00', '10.00', '57600.00', '2023-06-11 00:00:00', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00'),
(5, 2, 'INV_5', 1, '25000.00', '5.00', '15.00', '10.00', '30000.00', '2023-06-11 00:00:00', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_journal`
--

CREATE TABLE `tbl_journal` (
  `id` int(11) NOT NULL,
  `tbl_ac_head_id` int(11) DEFAULT NULL,
  `trans_date` datetime DEFAULT NULL,
  `amount` decimal(10,0) DEFAULT NULL,
  `head_type` int(11) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `created_by` varchar(255) DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `updated_by` varchar(255) DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_journal`
--

INSERT INTO `tbl_journal` (`id`, `tbl_ac_head_id`, `trans_date`, `amount`, `head_type`, `created_at`, `created_by`, `updated_at`, `updated_by`, `deleted_at`) VALUES
(1, 1, '2023-06-12 00:00:00', '500', 1, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_payment`
--

CREATE TABLE `tbl_payment` (
  `id` int(11) NOT NULL,
  `invoice_id` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `customer_name` varchar(255) NOT NULL,
  `payment_type` varchar(255) NOT NULL,
  `paid_date` datetime NOT NULL,
  `paid_amount` decimal(10,2) NOT NULL,
  `created_at` datetime NOT NULL,
  `created_by` varchar(255) NOT NULL,
  `updated_at` datetime NOT NULL,
  `updated_by` varchar(255) NOT NULL,
  `deleted_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_reservation`
--

CREATE TABLE `tbl_reservation` (
  `id` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `room_id` int(11) NOT NULL,
  `check_in` date NOT NULL,
  `check_out` date NOT NULL,
  `status` int(11) NOT NULL COMMENT '0 pending, 1 accepted, 2 finish',
  `created_at` datetime NOT NULL,
  `created_by` varchar(255) NOT NULL,
  `updated_at` datetime NOT NULL,
  `updated_by` varchar(255) NOT NULL,
  `deleted_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_reservation`
--

INSERT INTO `tbl_reservation` (`id`, `customer_id`, `room_id`, `check_in`, `check_out`, `status`, `created_at`, `created_by`, `updated_at`, `updated_by`, `deleted_at`) VALUES
(1, 1, 1, '2023-06-06', '2023-06-08', 2, '2023-06-07 08:36:41', '', '2023-06-07 09:22:11', '1', '0000-00-00 00:00:00'),
(2, 1, 2, '2023-06-06', '2023-06-08', 1, '2023-06-07 08:59:45', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00'),
(3, 2, 23, '2023-06-07', '2023-06-08', 2, '2023-06-07 09:00:06', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00'),
(4, 3, 22, '2023-06-23', '2023-06-24', 1, '2023-06-07 17:07:50', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00'),
(5, 4, 21, '2023-06-08', '2023-06-10', 1, '2023-06-11 17:30:48', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00'),
(6, 5, 21, '2023-06-09', '2023-06-10', 1, '2023-06-12 08:47:01', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_room`
--

CREATE TABLE `tbl_room` (
  `id` int(11) NOT NULL,
  `room_type_id` int(11) DEFAULT NULL,
  `room_no` varchar(255) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_room`
--

INSERT INTO `tbl_room` (`id`, `room_type_id`, `room_no`, `created_at`, `created_by`, `updated_at`, `updated_by`, `deleted_at`) VALUES
(1, 1, '101', NULL, NULL, NULL, NULL, NULL),
(2, 1, '102', NULL, NULL, NULL, NULL, NULL),
(3, 1, '103', NULL, NULL, NULL, NULL, NULL),
(4, 1, '104', NULL, NULL, NULL, NULL, NULL),
(5, 1, '105', NULL, NULL, NULL, NULL, NULL),
(6, 2, '201', NULL, NULL, NULL, NULL, NULL),
(7, 2, '202', NULL, NULL, NULL, NULL, NULL),
(8, 2, '203', NULL, NULL, NULL, NULL, NULL),
(9, 2, '204', NULL, NULL, NULL, NULL, NULL),
(10, 2, '205', NULL, NULL, NULL, NULL, NULL),
(11, 3, '301', NULL, NULL, NULL, NULL, NULL),
(12, 3, '302', NULL, NULL, NULL, NULL, NULL),
(13, 3, '303', NULL, NULL, NULL, NULL, NULL),
(14, 3, '304', NULL, NULL, NULL, NULL, NULL),
(15, 3, '305', NULL, NULL, NULL, NULL, NULL),
(16, 4, '401', NULL, NULL, NULL, NULL, NULL),
(17, 4, '402', NULL, NULL, NULL, NULL, NULL),
(18, 4, '403', NULL, NULL, NULL, NULL, NULL),
(19, 4, '404', NULL, NULL, NULL, NULL, NULL),
(20, 4, '405', NULL, NULL, NULL, NULL, NULL),
(21, 5, '501', NULL, NULL, NULL, NULL, NULL),
(22, 5, '502', NULL, NULL, NULL, NULL, NULL),
(23, 5, '503', NULL, NULL, NULL, NULL, NULL),
(24, 5, '504', NULL, NULL, NULL, NULL, NULL),
(25, 5, '505', NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_room_type`
--

CREATE TABLE `tbl_room_type` (
  `id` int(11) NOT NULL,
  `room_type` varchar(255) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `aircondition` int(11) DEFAULT NULL COMMENT '0 non ac, 1 ac',
  `food` int(11) DEFAULT NULL,
  `bed_count` int(11) DEFAULT NULL,
  `cancel_charge` int(11) DEFAULT 0,
  `rent` decimal(10,2) DEFAULT NULL,
  `remarks` text DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_room_type`
--

INSERT INTO `tbl_room_type` (`id`, `room_type`, `image`, `aircondition`, `food`, `bed_count`, `cancel_charge`, `rent`, `remarks`, `created_at`, `created_by`, `updated_at`, `updated_by`, `deleted_at`) VALUES
(1, 'Super Deluxe Twin', '16860652154620.jpg', 1, 1, 2, 100, '12500.00', '475 Sft, Twin Bed, bathroom with luxury fittings, Single Room with one spacious balcony', '2023-06-06 17:26:55', 3, NULL, NULL, NULL),
(2, 'Super Deluxe King', '16860660122346.jpg', 1, 1, 1, 100, '20000.00', '475 Sft , King Bed, bathroom with luxury fittings,  Single Room with one spacious balcony', '2023-06-06 17:40:12', 3, '2023-06-06 18:19:28', 3, NULL),
(3, 'Infinity Sea View', '16860663919301.jpg', 1, 1, 1, 100, '25000.00', '500 Sft.  Occupancy for 2 adults,  Single Room with one spacious balcony,  Sea view King Bed, bathroom with luxury fittings', '2023-06-06 17:46:31', 3, '2023-06-06 18:17:31', 3, NULL),
(4, 'Junior Suite', '16860666324377.jpg', 1, 1, 1, 100, '25000.00', ' 1000 Sft, Occupancy for 2 adults, One Bed Room, 1.5 Bath, Living/Dining & Kitchenette, Ocean View with two spacious balconies, King Bed, large bathroom with luxury fittings', '2023-06-06 17:49:25', 3, '2023-06-06 18:18:45', 3, NULL),
(5, 'Panorama Ocean Suite', '16860668351820.jpg', 1, 1, 3, 100, '48000.00', '1500 Sft, Occupancy for 4 adults, Two Bed Room, 2.5 Baths, Living/Dining & Kitchenette, Full Kitchenette with wet bar, Guest Bedroom with two twin bed, Large Master Bedroom with King Size Bed, 180-degree Ocean view with two large balconies', '2023-06-06 17:53:55', 3, '2023-06-06 18:18:24', 3, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_users`
--

CREATE TABLE `tbl_users` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `contact_no` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL,
  `status` varchar(255) NOT NULL,
  `action` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_users`
--

INSERT INTO `tbl_users` (`id`, `name`, `email`, `contact_no`, `password`, `image`, `created_by`, `created_at`, `updated_by`, `updated_at`, `deleted_at`, `status`, `action`) VALUES
(1, 'Kamal Uddin', 'kamal@yahoo.com', '015', 'adcd7048512e64b48da55b027577886ee5a36350', '16847298293346.jpg', NULL, NULL, NULL, NULL, NULL, '', 0),
(2, 'maksuda', 'maksuda@gmail.com', '', 'adcd7048512e64b48da55b027577886ee5a36350', NULL, NULL, NULL, NULL, NULL, NULL, '', 0),
(3, 'mahmuda', 'mahmuda@gmail.com', '', '63982e54a7aeb0d89910475ba6dbd3ca6dd4e5a1', NULL, NULL, NULL, NULL, NULL, NULL, '', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_ac_head`
--
ALTER TABLE `tbl_ac_head`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_booking`
--
ALTER TABLE `tbl_booking`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_customer`
--
ALTER TABLE `tbl_customer`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_gallery`
--
ALTER TABLE `tbl_gallery`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_invoice`
--
ALTER TABLE `tbl_invoice`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_journal`
--
ALTER TABLE `tbl_journal`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_payment`
--
ALTER TABLE `tbl_payment`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_reservation`
--
ALTER TABLE `tbl_reservation`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_room`
--
ALTER TABLE `tbl_room`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_room_type`
--
ALTER TABLE `tbl_room_type`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_users`
--
ALTER TABLE `tbl_users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_ac_head`
--
ALTER TABLE `tbl_ac_head`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tbl_booking`
--
ALTER TABLE `tbl_booking`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tbl_customer`
--
ALTER TABLE `tbl_customer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tbl_gallery`
--
ALTER TABLE `tbl_gallery`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `tbl_invoice`
--
ALTER TABLE `tbl_invoice`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tbl_journal`
--
ALTER TABLE `tbl_journal`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_payment`
--
ALTER TABLE `tbl_payment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_reservation`
--
ALTER TABLE `tbl_reservation`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tbl_room`
--
ALTER TABLE `tbl_room`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `tbl_room_type`
--
ALTER TABLE `tbl_room_type`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tbl_users`
--
ALTER TABLE `tbl_users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
