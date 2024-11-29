-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 29, 2024 at 05:59 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `gymnsb`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `user_id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`user_id`, `username`, `password`, `name`) VALUES
(1, 'admin', '21232f297a57a5a743894a0e4a801fc3', 'admin'),
(2, 'admin', 'f925a92696859cd7e4ad68dad5af6ba4', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `announcements`
--

CREATE TABLE `announcements` (
  `id` int(11) NOT NULL,
  `message` varchar(300) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `announcements`
--

INSERT INTO `announcements` (`id`, `message`, `date`) VALUES
(36, 'Fitness Infinity is closed today due to severe weather conditions.\r\nStay safe, everyone!', '2024-07-25'),
(37, 'We\'re now back open!\r\nJoin us for an energizing workout session.\r\n\r\nRegular Schedule:\r\nMonday-Sunday, 8:00 AM-9:00 PM', '2024-07-26'),
(38, 'Whey king x Fitness Infinity\r\nWhey king Supplements Malolos Bulacan Free Product Tasting. \r\nCatch them tonight until 8:00 PM!\r\nVisit them at their new home, located at:\r\nMCF Lifestyle Hub 2nd floor, Tikay, Malolos, Bulacan', '2024-08-14'),
(39, 'Please be advised that there is no flooding along Citywalk and the surrounding areas. Fitness Infinity is fully accessible and safe for your workout. Thank you.', '2024-09-06'),
(40, 'Fitness Infinity celebrates 6 amazing years!\r\nWe couldn’t have reached this milestone without our dedicated clients, hardworking team, and supportive partners—thank you all for your trust and commitment.\r\nA heartfelt thanks to the community and everyone who’s been part of our journey. Here’s to many', '2024-10-30'),
(41, 'When the forecast says nope, but your goals say gooo.\r\nRain or shine, gym’s open and ready to roll!', '2024-11-17');

-- --------------------------------------------------------

--
-- Table structure for table `attendance`
--

CREATE TABLE `attendance` (
  `id` int(11) NOT NULL,
  `user_id` varchar(100) NOT NULL,
  `curr_date` text NOT NULL,
  `curr_time` text NOT NULL,
  `present` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `equipment`
--

CREATE TABLE `equipment` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `amount` decimal(10,2) NOT NULL,
  `quantity` int(100) NOT NULL,
  `vendor` varchar(100) NOT NULL,
  `contact` varchar(11) NOT NULL,
  `date` date NOT NULL,
  `status` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `equipment`
--

INSERT INTO `equipment` (`id`, `name`, `amount`, `quantity`, `vendor`, `contact`, `date`, `status`) VALUES
(20, 'Treadmil X100', 225008.91, 3, 'FitGear Suppliers', '09375927483', '2019-02-05', 'Active'),
(21, 'Elliptical Trainer E5', 585000.00, 3, 'ActivePro Equipments', '09938573832', '2019-09-15', 'Maintenance'),
(22, 'Dumbbell Set (2-50kg)', 625000.00, 5, 'StrengthHub Co.', '09274827482', '2019-05-27', 'Active'),
(23, 'Bench Press B300', 180000.60, 2, 'PowerHouse Supply', '09347294524', '2020-09-05', 'Active'),
(24, 'Stationary Bike S10', 880003.12, 4, 'CycleFit Dealers', '09838427201', '2019-10-13', 'Maintenance'),
(25, 'Rowing Machine R200', 300001.96, 2, 'Endurance Works', '09384927581', '2020-01-30', 'Repair Needed'),
(26, 'Resistance Bands Set', 550000.10, 10, 'Flexit Suppliers', '09448489283', '2019-11-04', 'Active'),
(27, 'Cable Machine CMX700', 95000.99, 1, 'GymCore Equipments', '09348269171', '2019-06-10', 'Maintenance'),
(28, 'Kettlebell Set (5-30kg)', 648001.50, 6, 'LiftCore Distributors', '09938385090', '2019-08-09', 'Active'),
(29, 'Pull-Up Bar Station', 108000.00, 3, 'Gym Master Vendors', '09947386941', '2020-02-28', 'Active');

-- --------------------------------------------------------

--
-- Table structure for table `members`
--

CREATE TABLE `members` (
  `user_id` int(11) NOT NULL,
  `fullname` varchar(100) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(100) NOT NULL,
  `gender` varchar(20) NOT NULL,
  `amount` decimal(10,2) NOT NULL,
  `address` varchar(150) NOT NULL,
  `contact` varchar(11) NOT NULL,
  `email` varchar(100) NOT NULL,
  `status` varchar(20) NOT NULL,
  `reminder` int(11) NOT NULL DEFAULT 0,
  `membership_start` varchar(20) NOT NULL,
  `membership_end` varchar(20) NOT NULL,
  `type` varchar(50) NOT NULL,
  `attendance_count` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `members`
--

INSERT INTO `members` (`user_id`, `fullname`, `username`, `password`, `gender`, `amount`, `address`, `contact`, `email`, `status`, `reminder`, `membership_start`, `membership_end`, `type`, `attendance_count`) VALUES
(2, 'Alexis Galicio', 'alex', 'd41d8cd98f00b204e9800998ecf8427e', 'Female', 300.00, '112 Bagong Kalsada, San Isidro 1, Paombong, Bulacan', '09974033049', 'alexisjoygalicio@gmail.com', 'Active', 0, '2024-11-29', '2025-11-29', 'Regular', 14),
(3, 'Eddhan Gabryell Tan', 'eddhan', 'f16b4aa756badc922849da186bf6d7c7', 'Male', 0.00, 'B42 L99 Malinis St., Maunlad Homes Subdivision, Barangay Mojon, Malolos, Bulacan', '09157715588', 'eddhan@gmail.com', 'N/A', 0, '2024-11-29', 'N/A', 'Student', 19),
(4, 'John Joshua Alcaraz', 'joshua', '55acdb825f26a181a3de48590865b08c', 'Male', 300.00, 'Blk 16 Lot 6 Jasmine St. Phs 1, Golden Hills Subd. Loma De Gato, Marilao, Bulacan', '09560141008', 'joshua@gmail.com', 'Active', 0, '2024-11-29', '2025-11-29', 'Regular', 15),
(5, 'Ynez Yzabel Sanchez', 'ynez', '8abcbf8ddb733d01fd4407f4f58320ab', 'Female', 0.00, '#03 Poseidon St. St. Michael Homes, Lias, Marilao, Bulacan', '09935086025', 'ynezsanchez@gmail.com', 'Expired', 0, '2024-11-29', 'N/A', 'Walk-in', 8),
(6, 'Reyan Concepcion', 'reyan', '5ea30ecc3eb80ebd862f8b2e1bdffab8', 'Male', 300.00, 'Marilao, Bulacan', '09360392208', 'concepcio@gmail.com', 'Active', 0, '2024-11-29', '2025-11-29', 'Regular', 12),
(8, 'Sample User', 'user', 'b5b73fae0d87d8b4e2573105f8fbe7bc', 'Other', 300.00, 'Malolos, Bulacan', '09212091488', 'user@gmail.com', 'Active', 0, '2024-11-29', '2025-11-29', 'Regular', 1);

-- --------------------------------------------------------

--
-- Table structure for table `offers`
--

CREATE TABLE `offers` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `amount` decimal(10,2) NOT NULL,
  `duration` varchar(100) NOT NULL,
  `description` varchar(150) DEFAULT NULL,
  `type` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `offers`
--

INSERT INTO `offers` (`id`, `name`, `amount`, `duration`, `description`, `type`) VALUES
(13, 'Unlimited Gym Access', 600.00, '365', 'For members only (monthly renewal)', 'Regular,Student'),
(14, 'Workout + Boxing session with Coach', 150.00, '1', 'Please contact us for more details', 'Walk-in,Regular,Student');

-- --------------------------------------------------------

--
-- Table structure for table `staffs`
--

CREATE TABLE `staffs` (
  `user_id` int(11) NOT NULL,
  `email` varchar(100) NOT NULL,
  `fullname` varchar(100) NOT NULL,
  `address` varchar(150) NOT NULL,
  `designation` varchar(20) NOT NULL,
  `gender` varchar(10) NOT NULL,
  `contact` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `staffs`
--

INSERT INTO `staffs` (`user_id`, `email`, `fullname`, `address`, `designation`, `gender`, `contact`) VALUES
(21, 'johndoe@gmail.com', 'John Doe', '1637 Beahan Harbors Malolos Bulacan', 'Cashier', 'Male', '09836273628'),
(22, 'marymajor123@gmail.com', 'Mary Major', '885 ruz Meadows Pandi Bulacan', 'GYM Assistant', 'Female', '09384637853'),
(23, 'bob0@gmail.com', 'Bob Johnson', 'Biak na Bato San Miguel Bulacan', 'Trainer', 'Male', '09983747383'),
(24, 'charliebrrwn@gmail.com', 'Charlie Brown', '2184 Bernier Course Bulacan', 'Trainer', 'Male', '09263743831'),
(25, 'wilsonsarah@gmail.com', 'Sarah Wilson', 'Von Junctions Taliptip Malolos Bulacan', 'Trainer', 'Female', '09287463920'),
(26, 'liam69@gmail.com', 'Liam Adams', 'San Rafael Bulacan', 'Front Desk Staff', 'Other', '09934859047'),
(27, 'johnthemanager@gmail.com', 'John Doe', '44 MacArthur Highway Balagtas Bulacan', 'Manager', 'Male', '09925389563'),
(28, 'isabel@gmail.com', 'Isabel Robinson', 'Mayert Circle Hagonoy Bulacan', 'Trainer', 'Female', '09273473895'),
(29, 'avalewis6@gmail.com', 'Ava Lewis', '3670 Dibber Keys Malolos Bulacan', 'GYM Assistant', 'Male', '09374899287'),
(30, 'noahthearc@gmail.com', 'Noah Walker', 'Malolos, Bulacan', 'Trainer', 'Male', '09342859331');

-- --------------------------------------------------------

--
-- Table structure for table `todo`
--

CREATE TABLE `todo` (
  `id` int(11) NOT NULL,
  `task_status` varchar(50) NOT NULL,
  `task_desc` varchar(200) NOT NULL,
  `user_id` int(7) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `todo`
--

INSERT INTO `todo` (`id`, `task_status`, `task_desc`, `user_id`) VALUES
(2, 'In Progress', 'Pay membership fee', 8),
(3, 'Pending', 'Schedule personal training', 8),
(4, 'In Progress', 'Review health assessment', 8);

-- --------------------------------------------------------

--
-- Table structure for table `transaction_history`
--

CREATE TABLE `transaction_history` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `amount` decimal(10,2) NOT NULL,
  `date` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `transaction_history`
--

INSERT INTO `transaction_history` (`id`, `user_id`, `amount`, `date`) VALUES
(1, 6, 1200000.00, '2024-11-29'),
(2, 5, 80.00, '2024-11-29'),
(3, 4, 50.00, '2024-11-29'),
(4, 3, 50.00, '2024-11-29'),
(5, 2, 80.00, '2024-11-29'),
(6, 3, 50.00, '2024-11-29'),
(7, 3, 50.00, '2024-11-29'),
(8, 3, 50.00, '2024-11-29'),
(9, 3, 50.00, '2024-11-29'),
(10, 2, 80.00, '2024-11-29'),
(11, 4, 50.00, '2024-11-29'),
(12, 4, 50.00, '2024-11-29'),
(13, 6, 50.00, '2024-11-29'),
(14, 6, 50.00, '2024-11-29'),
(15, 4, 50.00, '2024-11-29'),
(16, 3, 50.00, '2024-11-29'),
(17, 2, 80.00, '2024-11-29'),
(18, 2, 80.00, '2024-11-29'),
(19, 2, 80.00, '2024-11-29'),
(20, 2, 80.00, '2024-11-29'),
(21, 2, 80.00, '2024-11-29'),
(22, 2, 80.00, '2024-11-29'),
(23, 2, 80.00, '2024-11-29'),
(24, 2, 80.00, '2024-11-29'),
(25, 2, 80.00, '2024-11-29'),
(26, 2, 80.00, '2024-11-29'),
(27, 2, 80.00, '2024-11-29'),
(28, 3, 50.00, '2024-11-29'),
(29, 3, 50.00, '2024-11-29'),
(30, 3, 50.00, '2024-11-29'),
(31, 3, 50.00, '2024-11-29'),
(32, 3, 50.00, '2024-11-29'),
(33, 3, 50.00, '2024-11-29'),
(34, 3, 50.00, '2024-11-29'),
(35, 3, 50.00, '2024-11-29'),
(36, 3, 50.00, '2024-11-29'),
(37, 3, 50.00, '2024-11-29'),
(38, 3, 50.00, '2024-11-29'),
(39, 3, 50.00, '2024-11-29'),
(40, 4, 50.00, '2024-11-29'),
(41, 4, 50.00, '2024-11-29'),
(42, 4, 50.00, '2024-11-29'),
(43, 4, 50.00, '2024-11-29'),
(44, 4, 50.00, '2024-11-29'),
(45, 4, 50.00, '2024-11-29'),
(46, 5, 80.00, '2024-11-29'),
(47, 5, 80.00, '2024-11-29'),
(48, 5, 80.00, '2024-11-29'),
(49, 5, 80.00, '2024-11-29'),
(50, 5, 80.00, '2024-11-29'),
(51, 5, 80.00, '2024-11-29'),
(52, 6, 50.00, '2024-11-29'),
(53, 6, 50.00, '2024-11-29'),
(54, 6, 50.00, '2024-11-29'),
(55, 6, 50.00, '2024-11-29'),
(56, 6, 50.00, '2024-11-29'),
(57, 6, 50.00, '2024-11-29'),
(58, 6, 50.00, '2024-11-29'),
(59, 6, 50.00, '2024-11-29'),
(60, 4, 50.00, '2024-11-29'),
(61, 4, 50.00, '2024-11-29'),
(62, 4, 50.00, '2024-11-29'),
(63, 4, 50.00, '2024-11-29'),
(64, 2, 300.00, '2024-11-29'),
(65, 2, 150.00, '2024-11-29'),
(66, 2, 300.00, '2024-11-29'),
(67, 3, 600.00, '2024-11-29'),
(68, 8, 300.00, '2024-11-29'),
(69, 8, 600.00, '2024-11-29'),
(70, 8, 150.00, '2024-11-29'),
(71, 8, 600.00, '2024-11-29'),
(72, 8, 600.00, '2024-11-29'),
(73, 8, 600.00, '2024-11-29'),
(74, 8, 150.00, '2024-11-29'),
(75, 8, 600.00, '2024-11-29'),
(76, 2, 300.00, '2024-11-29'),
(77, 4, 300.00, '2024-11-29'),
(78, 6, 300.00, '2024-11-29'),
(79, 8, 300.00, '2024-11-29'),
(80, 2, 50.00, '2024-11-29'),
(81, 3, 50.00, '2024-11-29'),
(82, 4, 50.00, '2024-11-29'),
(83, 5, 80.00, '2024-11-29'),
(84, 6, 50.00, '2024-11-29'),
(85, 8, 50.00, '2024-11-29'),
(86, 8, 600.00, '2024-11-29'),
(87, 8, 600.00, '2024-11-29'),
(88, 2, 300.00, '2024-11-29');

-- --------------------------------------------------------

--
-- Table structure for table `user_offers`
--

CREATE TABLE `user_offers` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `offer_id` int(11) NOT NULL,
  `enrollment_date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user_offers`
--

INSERT INTO `user_offers` (`id`, `user_id`, `offer_id`, `enrollment_date`) VALUES
(7, 8, 14, '2024-11-29 04:20:45'),
(8, 8, 13, '2024-11-29 04:21:47');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `announcements`
--
ALTER TABLE `announcements`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `attendance`
--
ALTER TABLE `attendance`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `equipment`
--
ALTER TABLE `equipment`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `members`
--
ALTER TABLE `members`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Indexes for table `offers`
--
ALTER TABLE `offers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `staffs`
--
ALTER TABLE `staffs`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `todo`
--
ALTER TABLE `todo`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `transaction_history`
--
ALTER TABLE `transaction_history`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_offers`
--
ALTER TABLE `user_offers`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `offer_id` (`offer_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `announcements`
--
ALTER TABLE `announcements`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- AUTO_INCREMENT for table `attendance`
--
ALTER TABLE `attendance`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=70;

--
-- AUTO_INCREMENT for table `equipment`
--
ALTER TABLE `equipment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `members`
--
ALTER TABLE `members`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `offers`
--
ALTER TABLE `offers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `staffs`
--
ALTER TABLE `staffs`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `todo`
--
ALTER TABLE `todo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `transaction_history`
--
ALTER TABLE `transaction_history`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=89;

--
-- AUTO_INCREMENT for table `user_offers`
--
ALTER TABLE `user_offers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `user_offers`
--
ALTER TABLE `user_offers`
  ADD CONSTRAINT `user_offers_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `members` (`user_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `user_offers_ibfk_2` FOREIGN KEY (`offer_id`) REFERENCES `offers` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
