-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 01, 2024 at 10:55 PM
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
  `username` varchar(20) NOT NULL,
  `password` varchar(100) NOT NULL,
  `name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`user_id`, `username`, `password`, `name`) VALUES
(1, 'admin', '21232f297a57a5a743894a0e4a801fc3', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `announcements`
--

CREATE TABLE `announcements` (
  `id` int(11) NOT NULL,
  `message` varchar(800) NOT NULL,
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
(40, 'Fitness Infinity celebrates 6 amazing years!\r\nWe couldn’t have reached this milestone without our dedicated clients, hardworking team, and supportive partners—thank you all for your trust and commitment.\r\nA heartfelt thanks to the community and everyone who’s been part of our journey. Here’s to many more years of growth, strength, and success together!', '2024-10-30'),
(41, 'When the forecast says nope, but your goals say gooo.\r\nRain or shine, gym’s open and ready to roll!', '2024-11-17'),
(47, 'Yes! We are open on November 1.', '2024-11-01');

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
-- Table structure for table `classes`
--

CREATE TABLE `classes` (
  `id` int(11) NOT NULL,
  `classname` varchar(70) NOT NULL,
  `trainer` varchar(100) NOT NULL,
  `start_time` time NOT NULL,
  `end_time` time NOT NULL,
  `date` date NOT NULL,
  `capacity` int(11) NOT NULL,
  `amount` decimal(10,2) NOT NULL,
  `enrolled` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `classes`
--

INSERT INTO `classes` (`id`, `classname`, `trainer`, `start_time`, `end_time`, `date`, `capacity`, `amount`, `enrolled`) VALUES
(14, 'HIIT (High-Intensity Interval Training)', '24', '07:00:00', '07:45:00', '2024-12-06', 5, 500.00, 3),
(15, 'Yoga for Beginners', '21', '19:00:00', '08:00:00', '2024-12-04', 8, 300.00, 8),
(16, 'Powerlifting Basics', '23', '10:00:00', '11:30:00', '2024-12-14', 4, 600.00, 3),
(17, 'Cardio Kickboxing', '30', '09:00:00', '09:45:00', '2024-12-08', 10, 450.00, 4),
(18, 'Pilates Reformer', '28', '15:00:00', '15:30:00', '2024-12-17', 8, 550.00, 4),
(19, 'Core & Abs Sculpt', '21', '18:00:00', '18:45:00', '2024-12-22', 6, 350.00, 0);

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
(29, 'Pull-Up Bar Station', 108000.00, 3, 'Gym Master Vendors', '09947386941', '2020-02-28', 'Active'),
(33, 'Rogue Echo Air Bike', 179999.97, 3, 'Rogue Fitness Asia', '09825738253', '2019-06-12', 'Maintenance'),
(34, 'Hexagonal Rubber Kettlebells (10-30kg Set)', 125000.00, 5, 'Decathlon PH', '09927351812', '2020-10-27', 'Active');

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
  `attendance_count` int(100) NOT NULL,
  `reset_token_hash` varchar(644) DEFAULT NULL,
  `reset_token_hash_exp_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `members`
--

INSERT INTO `members` (`user_id`, `fullname`, `username`, `password`, `gender`, `amount`, `address`, `contact`, `email`, `status`, `reminder`, `membership_start`, `membership_end`, `type`, `attendance_count`, `reset_token_hash`, `reset_token_hash_exp_at`) VALUES
(2, 'Alexis Galicio', 'alex', '6010aa88d54a55d0dfaf86873a1ba8ad', 'Female', 300.00, '112 Bagong Kalsada, San Isidro 1, Paombong, Bulacan', '09974033049', 'sample.user@gmail.com', 'Active', 1, '2024-12-01', '2025-12-01', 'Regular', 15, NULL, NULL),
(3, 'Eddhan Gabryell Tan', 'eddhan', 'f16b4aa756badc922849', 'Male', 0.00, 'B42 L99 Malinis St., Maunlad Homes Subdivision, Barangay Mojon, Malolos, Bulacan', '09157715588', 'eddhan@gmail.com', 'N/A', 0, '2024-11-29', 'N/A', 'Student', 20, NULL, NULL),
(4, 'John Joshua Alcaraz', 'joshua', '55acdb825f26a181a3de', 'Male', 300.00, 'Blk 16 Lot 6 Jasmine St. Phs 1, Golden Hills Subd. Loma De Gato, Marilao, Bulacan', '09560141008', 'joshua@gmail.com', 'Active', 1, '2024-11-29', '2025-11-29', 'Regular', 16, NULL, NULL),
(5, 'Ynez Yzabel Sanchez', 'ynez', '8abcbf8ddb733d01fd44', 'Female', 0.00, '#03 Poseidon St. St. Michael Homes, Lias, Marilao, Bulacan', '09935086025', 'ynezsanchez@gmail.com', 'Expired', 0, '2024-11-29', 'N/A', 'Walk-in', 9, NULL, NULL),
(6, 'Reyan Concepcion', 'reyan', '5ea30ecc3eb80ebd862f', 'Male', 300.00, 'Marilao, Bulacan', '09360392208', 'concepcio@gmail.com', 'Active', 1, '2024-11-29', '2025-11-29', 'Regular', 13, NULL, NULL),
(8, 'User', 'user', 'b5b73fae0d87d8b4e2573105f8fbe7bc', 'Other', 300.00, 'Paombong, Bulacan', '09974033049', 'alexisjoygalicio@gmail.com', 'Active', 0, '2024-12-01', '2024-12-03', 'Regular', 9, NULL, NULL),
(22, 'Beatrice Perez', 'beatrice_perez', 'e2c503452f5a1f1ec37e8261d5a2453b', 'Female', 0.00, '90 Gen. Luna St., Balagtas, Bulacan', '09100123456', 'beatriceperez@email.com', 'N/A', 0, '2024-12-01', 'N/A', 'Walk-in', 6, NULL, NULL),
(23, 'Juan Dela Cruz', 'juan123', 'e1a96958e58569128477741fdf7549bb', 'Male', 300.00, '123 Main St., Malolos, Bulacan', '09171234567', 'juandelacruz@email.com', 'Active', 0, '2024-12-01', '2025-12-01', 'Regular', 14, NULL, NULL),
(24, 'Pedro Garcia', 'pedro_garcia', 'c31f4c27c1ae5b0b8b8df0bd71248daf', 'Male', 0.00, 'San Fernando, Bulacan', '09323456789', 'pedrogarcia@email.com', 'N/A', 0, '2024-12-01', 'N/A', 'Student', 4, NULL, NULL),
(25, 'Roberto Ramos', 'roberto_ramos', 'e53b2985863981a370aecc772febbb17', 'Male', 300.00, '10 Main Rd., Plaridel, Bulacan', '09137890123', 'robertoramos@email.com', 'Active', 0, '2024-12-01', '2025-12-01', 'Regular', 15, NULL, NULL),
(26, 'Ernesto Mendoza', 'ernesto_m', 'f4d29bbb393a936ec0431686fca30262', 'Male', 0.00, 'Marilao, Bulacan', '09359012345', 'ernestomendoza@email.com', 'N/A', 0, '2024-12-01', 'N/A', 'Student', 8, NULL, NULL),
(27, 'Elena Garcia', 'elena_garcia', '909bb7e95561ad04e4d7c9627f0fe23a', 'Female', 0.00, 'Hagonoy, Bulacan', '09248901234', 'elenagarcia@email.com', 'N/A', 0, '2024-12-01', 'N/A', 'Student', 3, NULL, NULL),
(28, 'Adrian Cruz', 'adrian_cruz', '67b0c65c70887184391fe99925e9285a', 'Other', 0.00, '12 C. Santos St., Calumpit, Bulacan', '09387890123', 'adriacruz@email.com', 'N/A', 0, '2024-12-01', 'N/A', 'Walk-in', 1, NULL, NULL);

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
  `contact` varchar(11) NOT NULL,
  `username` varchar(20) DEFAULT NULL,
  `password` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `staffs`
--

INSERT INTO `staffs` (`user_id`, `email`, `fullname`, `address`, `designation`, `gender`, `contact`, `username`, `password`) VALUES
(21, 'johndoe@gmail.com', 'John Doe', '1637 Harbors Malolos Bulacan', 'Trainer', 'Male', '09836273628', 'trainer', '4d9a96c8e1650dc161f1adcf5c5082a0'),
(22, 'marymajor123@gmail.com', 'Mary Major', '885 ruz Meadows Pandi Bulacan', 'GYM Assistant', 'Female', '09384637853', '', '0'),
(23, 'bob0@gmail.com', 'Bob Johnson', 'Biak na Bato San Miguel Bulacan', 'Trainer', 'Male', '09983747383', 'trainer3', '72977b63f9bf5a01f30bfe2ca802a3c1'),
(24, 'charliebrrwn@gmail.com', 'Charlie Brown', '2184 Bernier Course Bulacan', 'Trainer', 'Male', '09263743831', 'trainer2', '6662f54a6c5033357408e6839a5c0a05'),
(25, 'wilsonsarah@gmail.com', 'Sarah Wilson', 'Von Junctions Taliptip Malolos Bulacan', 'Trainer', 'Female', '09287463920', 'trainer4', '06de2cced0f700b155d4d04d2ef3245c'),
(26, 'liam69@gmail.com', 'Liam Adams', 'San Rafael Bulacan', 'Front Desk Staff', 'Other', '09934859047', '', '0'),
(27, 'johnthemanager@gmail.com', 'John Doe', '44 MacArthur Highway Balagtas Bulacan', 'Manager', 'Male', '09925389563', '', '0'),
(28, 'isabel@gmail.com', 'Isabel Robinson', 'Mayert Circle Hagonoy Bulacan', 'Trainer', 'Female', '09273473895', 'trainer5', '191be98376838b92608915fb8a9e2818'),
(29, 'avalewis6@gmail.com', 'Ava Lewis', '3670 Dibber Keys Malolos Bulacan', 'GYM Assistant', 'Male', '09374899287', '', '0'),
(30, 'noahthearc@gmail.com', 'Noah Walker', 'Malolos, Bulacan', 'Trainer', 'Male', '09342859331', 'trainer6', 'a3b02d67308e7a6560e9a39f3c69860b');

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
(4, 'In Progress', 'Review health assessment', 8),
(14, 'In Progress', ' Ensure all participants are following the correct form and technique.', 21),
(15, 'Pending', 'Keep track of attendance for each class.', 21),
(16, 'Pending', 'Advise clients on their fitness goals and progress.', 21);

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
(1, 24, 1250000.00, '2024-12-01'),
(2, 2, 132.00, '2024-12-01'),
(3, 3, 132.00, '2024-12-01'),
(4, 4, 132.00, '2024-12-01'),
(5, 5, 132.00, '2024-12-01'),
(6, 6, 132.00, '2024-12-01'),
(7, 8, 132.00, '2024-12-01'),
(8, 22, 132.00, '2024-12-01'),
(9, 8, 1.00, '2024-12-01'),
(10, 5, 1.00, '2024-12-01'),
(11, 8, 300.00, '2024-12-01');

-- --------------------------------------------------------

--
-- Table structure for table `user_class`
--

CREATE TABLE `user_class` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `class_id` int(11) NOT NULL,
  `enrollment_date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user_class`
--

INSERT INTO `user_class` (`id`, `user_id`, `class_id`, `enrollment_date`) VALUES
(6, 3, 14, '2024-12-01 13:16:49'),
(7, 2, 14, '2024-12-01 13:16:50'),
(8, 4, 14, '2024-12-01 13:16:51'),
(9, 2, 15, '2024-12-01 13:16:59'),
(10, 5, 15, '2024-12-01 13:17:01'),
(11, 8, 15, '2024-12-01 13:17:03'),
(12, 22, 15, '2024-12-01 13:17:05'),
(13, 27, 15, '2024-12-01 13:17:08'),
(14, 28, 15, '2024-12-01 13:17:10'),
(15, 23, 15, '2024-12-01 13:17:15'),
(16, 25, 15, '2024-12-01 13:17:20'),
(17, 3, 16, '2024-12-01 13:17:30'),
(18, 4, 16, '2024-12-01 13:17:33'),
(19, 23, 16, '2024-12-01 13:17:35'),
(20, 26, 17, '2024-12-01 13:17:43'),
(21, 24, 17, '2024-12-01 13:17:47'),
(22, 8, 17, '2024-12-01 13:17:50'),
(23, 6, 17, '2024-12-01 13:17:54'),
(24, 2, 18, '2024-12-01 13:18:00'),
(25, 5, 18, '2024-12-01 13:18:03'),
(26, 22, 18, '2024-12-01 13:18:06'),
(27, 27, 18, '2024-12-01 13:18:08');

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
(1, 8, 13, '2024-12-01 12:58:33'),
(2, 8, 14, '2024-12-01 12:59:26');

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
-- Indexes for table `classes`
--
ALTER TABLE `classes`
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
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `reset_token_hash` (`reset_token_hash`);

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
-- Indexes for table `user_class`
--
ALTER TABLE `user_class`
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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;

--
-- AUTO_INCREMENT for table `attendance`
--
ALTER TABLE `attendance`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=92;

--
-- AUTO_INCREMENT for table `classes`
--
ALTER TABLE `classes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `equipment`
--
ALTER TABLE `equipment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `members`
--
ALTER TABLE `members`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `offers`
--
ALTER TABLE `offers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `staffs`
--
ALTER TABLE `staffs`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `todo`
--
ALTER TABLE `todo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `transaction_history`
--
ALTER TABLE `transaction_history`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `user_class`
--
ALTER TABLE `user_class`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT for table `user_offers`
--
ALTER TABLE `user_offers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

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
