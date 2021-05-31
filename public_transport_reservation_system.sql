-- phpMyAdmin SQL Dump
-- version 4.9.5deb2
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: May 31, 2021 at 06:44 AM
-- Server version: 8.0.25-0ubuntu0.20.04.1
-- PHP Version: 7.4.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `public_transport_reservation_system`
--

-- --------------------------------------------------------

--
-- Table structure for table `message`
--

CREATE TABLE `message` (
  `message_id` int NOT NULL,
  `name` varchar(60) NOT NULL,
  `email` varchar(60) NOT NULL,
  `message` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `message`
--

INSERT INTO `message` (`message_id`, `name`, `email`, `message`) VALUES
(1, 'Shahadh', 'shahadh.hamza@gmail.com', 'Hi!! Im having a problem while registering. please help asap'),
(2, 'sample_user', 'sample@sample.com', 'sample message'),
(4, 'nawas', 'test@test.com', 'test'),
(13, 'asdss', 'rastaman_1994@outlook.com', 'asdadsdasdsd'),
(14, 'test_user123', 'shahadh.hamza@gmail.com', 'damar kada open');

-- --------------------------------------------------------

--
-- Table structure for table `pricing`
--

CREATE TABLE `pricing` (
  `pricing_id` int NOT NULL,
  `vehicle_id` int NOT NULL,
  `price` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `pricing`
--

INSERT INTO `pricing` (`pricing_id`, `vehicle_id`, `price`) VALUES
(3, 4, '320'),
(4, 5, '500'),
(6, 2, '500'),
(7, 3, '120'),
(8, 7, '500'),
(9, 8, '120'),
(10, 9, '120'),
(11, 10, '500'),
(13, 12, '500'),
(14, 13, '50');

-- --------------------------------------------------------

--
-- Table structure for table `reservation`
--

CREATE TABLE `reservation` (
  `reservation_id` int NOT NULL,
  `user_id` int NOT NULL,
  `travel_date` date NOT NULL,
  `location_from` varchar(60) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `location_to` varchar(60) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `time` time NOT NULL,
  `paid_amount` varchar(60) NOT NULL,
  `number_of_seats` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int NOT NULL,
  `username` varchar(60) NOT NULL,
  `nic` varchar(12) NOT NULL,
  `password` varchar(60) NOT NULL,
  `type` varchar(20) DEFAULT NULL,
  `email` varchar(60) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `phone` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `username`, `nic`, `password`, `type`, `email`, `phone`) VALUES
(1, 'admin', '941162304V', 'admin', 'admin', '', NULL),
(12, 'shahadh', '941162304V', 'asdasd', NULL, '', NULL),
(13, 'Test_1', 'test_nic', 'asdqwdawda', NULL, '', NULL),
(20, 'test123', '941162525V', '123123', NULL, '', NULL),
(29, 'john', '941162314V', '0716032', NULL, 'rastaman_1994@outlook.com', 761995253),
(30, 'boba', '943361230V', '12501250', NULL, 'test@test.com', 716655415);

-- --------------------------------------------------------

--
-- Table structure for table `vehicle`
--

CREATE TABLE `vehicle` (
  `vehicle_id` int NOT NULL,
  `name` varchar(60) NOT NULL,
  `type` varchar(60) NOT NULL,
  `location_from` varchar(60) NOT NULL,
  `location_to` varchar(60) NOT NULL,
  `owner` varchar(60) NOT NULL,
  `seat_count` int NOT NULL,
  `number_plate` varchar(60) NOT NULL,
  `time` time DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `vehicle`
--

INSERT INTO `vehicle` (`vehicle_id`, `name`, `type`, `location_from`, `location_to`, `owner`, `seat_count`, `number_plate`, `time`) VALUES
(2, 'ASHOKA TRANSPORT PVT LTD', 'Bus', 'Colombo', 'Kandy', 'Shahadh', 60, 'ASD-123', '00:00:00'),
(3, 'DAMAR BUS SERVICE', 'Bus', 'Kurunegala', 'Matara', 'DAMAR', 60, 'DAMAR-123', '00:00:00'),
(4, 'COLOMBO-KANDY EXPRESS', 'Train', 'Colombo', 'Kandy', 'PTS', 125, 'NONE', '00:00:00'),
(5, 'KHANNA INTERCITY', 'Bus', 'Colombo', 'Kandy', 'Khanna', 60, 'KN-234', '00:00:00'),
(7, 'TEST_001', 'Train', 'Kandy', 'Gampola', 'sample_owner', 120, 'NONE', '00:00:00'),
(8, 'TEST_002', 'Bus', 'Gampola', 'Colombo', 'DAMAR', 60, 'GM-22', '00:00:00'),
(9, 'TEST_003', 'Bus', 'Kandy', 'Badulla', 'DAMAR', 60, 'GM-2222', '00:00:00'),
(10, 'TEST_004', 'Bus', 'Kurunegala', 'Nuwara Eliya', 'DAMAR1', 60, 'ASDW-333', '00:00:00'),
(12, 'TEST_006', 'Bus', 'Gampola', 'Matara', 'DAMAR', 60, 'DAMAR-123', NULL),
(13, 'TEST_007', 'Train', 'Kandy', 'Katugastota', 'DAMAR', 120, 'NONE', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `vehicle_reserve`
--

CREATE TABLE `vehicle_reserve` (
  `vehicle_id` int NOT NULL,
  `reservation_id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `message`
--
ALTER TABLE `message`
  ADD PRIMARY KEY (`message_id`);

--
-- Indexes for table `pricing`
--
ALTER TABLE `pricing`
  ADD PRIMARY KEY (`pricing_id`),
  ADD KEY `id_vehicle` (`vehicle_id`);

--
-- Indexes for table `reservation`
--
ALTER TABLE `reservation`
  ADD PRIMARY KEY (`reservation_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `vehicle`
--
ALTER TABLE `vehicle`
  ADD PRIMARY KEY (`vehicle_id`);

--
-- Indexes for table `vehicle_reserve`
--
ALTER TABLE `vehicle_reserve`
  ADD PRIMARY KEY (`vehicle_id`,`reservation_id`),
  ADD KEY `vehicle_id` (`vehicle_id`,`reservation_id`),
  ADD KEY `FK_RESERVE_ID` (`reservation_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `message`
--
ALTER TABLE `message`
  MODIFY `message_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `pricing`
--
ALTER TABLE `pricing`
  MODIFY `pricing_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `reservation`
--
ALTER TABLE `reservation`
  MODIFY `reservation_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `vehicle`
--
ALTER TABLE `vehicle`
  MODIFY `vehicle_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `pricing`
--
ALTER TABLE `pricing`
  ADD CONSTRAINT `FK_VEHICLE_PRICE_ID` FOREIGN KEY (`vehicle_id`) REFERENCES `vehicle` (`vehicle_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `reservation`
--
ALTER TABLE `reservation`
  ADD CONSTRAINT `FK_USER_ID` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `vehicle_reserve`
--
ALTER TABLE `vehicle_reserve`
  ADD CONSTRAINT `FK_RESERVE_ID` FOREIGN KEY (`reservation_id`) REFERENCES `reservation` (`reservation_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_VEHICLE_ID` FOREIGN KEY (`vehicle_id`) REFERENCES `vehicle` (`vehicle_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
