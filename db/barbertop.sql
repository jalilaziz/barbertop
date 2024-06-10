-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 10, 2024 at 06:15 PM
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
-- Database: `barbertop`
--

-- --------------------------------------------------------

--
-- Table structure for table `appointments`
--

CREATE TABLE `appointments` (
  `appointment_id` int(5) NOT NULL,
  `date_created` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `client_id` int(5) NOT NULL,
  `employee_id` int(2) NOT NULL,
  `start_time` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `end_time_expected` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `canceled` tinyint(1) NOT NULL DEFAULT 0,
  `cancellation_reason` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `appointments`
--

INSERT INTO `appointments` (`appointment_id`, `date_created`, `client_id`, `employee_id`, `start_time`, `end_time_expected`, `canceled`, `cancellation_reason`) VALUES
(18, '2024-05-10 17:00:00', 19, 1, '2024-05-11 12:30:00', '2024-05-11 13:00:00', 0, NULL),
(19, '2024-05-10 17:11:00', 20, 2, '2024-05-11 16:00:00', '2024-05-11 16:30:00', 0, NULL),
(20, '2024-05-10 17:13:00', 21, 3, '2024-05-11 18:00:00', '2024-05-11 18:30:00', 1, 'بطلب من الزبون'),
(21, '2024-05-10 17:15:00', 22, 1, '2024-05-11 16:00:00', '2024-05-11 16:20:00', 0, NULL),
(22, '2024-05-18 17:23:00', 23, 2, '2024-05-22 18:00:00', '2024-05-22 18:20:00', 0, NULL),
(23, '2024-05-19 17:25:00', 24, 3, '2024-05-23 14:00:00', '2024-05-23 14:20:00', 0, NULL),
(24, '2024-06-10 16:26:00', 25, 1, '2024-06-14 12:30:00', '2024-06-14 12:50:00', 0, NULL),
(25, '2024-06-10 16:51:00', 26, 1, '2024-06-13 14:30:00', '2024-06-13 15:00:00', 0, NULL),
(26, '2024-06-10 16:53:00', 26, 1, '2024-06-13 14:30:00', '2024-06-13 15:00:00', 0, NULL),
(27, '2024-06-10 16:55:00', 27, 2, '2024-06-15 14:30:00', '2024-06-15 15:00:00', 0, NULL),
(28, '2024-06-10 16:56:00', 28, 3, '2024-06-14 14:30:00', '2024-06-14 14:50:00', 0, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `barber_admin`
--

CREATE TABLE `barber_admin` (
  `admin_id` int(5) NOT NULL,
  `username` varchar(50) NOT NULL,
  `admin_email` varchar(50) NOT NULL,
  `full_name` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `barber_admin`
--

INSERT INTO `barber_admin` (`admin_id`, `username`, `admin_email`, `full_name`, `password`) VALUES
(1, 'admin', 'admin@gmail.com', 'Admin Admin', 'f9527d25bf8a6da52ec9cf0355ae18ad3bee444f');

-- --------------------------------------------------------

--
-- Table structure for table `clients`
--

CREATE TABLE `clients` (
  `client_id` int(5) NOT NULL,
  `first_name` varchar(30) NOT NULL,
  `last_name` varchar(30) NOT NULL,
  `phone_number` varchar(30) NOT NULL,
  `client_email` varchar(50) NOT NULL,
  `employee_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `clients`
--

INSERT INTO `clients` (`client_id`, `first_name`, `last_name`, `phone_number`, `client_email`, `employee_id`) VALUES
(19, 'jalil', 'aziz', '0663636363', 'jalilaziz@gmail.com', 1),
(20, 'khaled', 'morabit', '0634343434', 'khaledmorabit@gmail.com', 2),
(21, 'morad', 'nadir', '0667676767', 'moradnadir@gmail.com', 3),
(22, 'samir', 'kamel', '0623232323', 'samirkamel@gmail.com', 1),
(23, 'mohamed', 'radi', '0645454545', 'mohamedradi@gmail.com', 2),
(24, 'jamal', 'nasiri', '0667676767', 'jamalnasiri@gmail.com', 3),
(25, 'monir', 'hajji', '0632323232', 'monirhajji@gmail.com', 1),
(26, 'abdessamad', 'khalil', '0645454545', 'abdesskhalil@gmail.com', 1),
(27, 'youssef', 'karim', '0667676767', 'youssefkarim@gmail.com', 2),
(28, 'salim', 'mounir', '0623232323', 'salimmounir@gmail.com', 3);

-- --------------------------------------------------------

--
-- Table structure for table `employees`
--

CREATE TABLE `employees` (
  `employee_id` int(2) NOT NULL,
  `first_name` varchar(20) NOT NULL,
  `last_name` varchar(20) NOT NULL,
  `phone_number` varchar(30) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `employees`
--

INSERT INTO `employees` (`employee_id`, `first_name`, `last_name`, `phone_number`, `email`, `password`) VALUES
(1, 'Karim', 'alami', '0632323232', 'karimalami@gmail.com', '9099734a044f8ded9ccd97ccb922435956f6d15b'),
(2, 'Soufiane', 'khattabi', '0615151515', 'soufianekhattabi@gmail.com', '9099734a044f8ded9ccd97ccb922435956f6d15b'),
(3, 'Adil', 'benmlik', '0617171717', 'adilbenmlik@gmail.com', '9099734a044f8ded9ccd97ccb922435956f6d15b');

-- --------------------------------------------------------

--
-- Table structure for table `employees_schedule`
--

CREATE TABLE `employees_schedule` (
  `id` int(5) NOT NULL,
  `employee_id` int(2) NOT NULL,
  `day_id` tinyint(1) NOT NULL,
  `from_hour` time NOT NULL,
  `to_hour` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `employees_schedule`
--

INSERT INTO `employees_schedule` (`id`, `employee_id`, `day_id`, `from_hour`, `to_hour`) VALUES
(65, 2, 1, '10:00:00', '22:00:00'),
(66, 2, 2, '10:00:00', '22:00:00'),
(67, 2, 3, '10:00:00', '22:00:00'),
(68, 2, 4, '10:00:00', '22:00:00'),
(69, 2, 5, '10:00:00', '22:00:00'),
(70, 2, 6, '10:00:00', '22:00:00'),
(85, 1, 1, '11:00:00', '22:00:00'),
(86, 1, 2, '11:00:00', '22:00:00'),
(87, 1, 3, '11:00:00', '22:00:00'),
(88, 1, 4, '11:00:00', '22:00:00'),
(89, 1, 5, '11:00:00', '22:00:00'),
(90, 1, 6, '11:00:00', '22:00:00'),
(91, 1, 7, '11:00:00', '22:00:00'),
(92, 3, 1, '10:00:00', '22:00:00'),
(93, 3, 2, '10:00:00', '22:00:00'),
(94, 3, 3, '09:00:00', '18:00:00'),
(95, 3, 4, '10:00:00', '22:00:00'),
(96, 3, 5, '10:00:00', '22:00:00'),
(97, 3, 6, '10:00:00', '22:00:00'),
(98, 3, 7, '10:00:00', '22:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `services`
--

CREATE TABLE `services` (
  `service_id` int(5) NOT NULL,
  `service_name` varchar(50) NOT NULL,
  `service_description` varchar(255) NOT NULL,
  `service_price` decimal(6,2) NOT NULL,
  `service_duration` int(5) NOT NULL,
  `category_id` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `services`
--

INSERT INTO `services` (`service_id`, `service_name`, `service_description`, `service_price`, `service_duration`, `category_id`) VALUES
(1, 'حلاقة الشعر', '', 40.00, 30, 2),
(2, 'تسريح الشعر', '', 50.00, 30, 2),
(3, 'تشذيب الشعر', '', 30.00, 30, 2),
(4, 'حلاقة اللحية', '', 20.00, 20, 3),
(5, 'تشذيب اللحية', '', 20.00, 20, 3),
(6, 'حلاقة ناعمة', '', 20.00, 20, 3),
(7, 'تنظيف الوجه', '', 30.00, 30, 6),
(8, 'ماسك الوجه', '', 20.00, 20, 6);

-- --------------------------------------------------------

--
-- Table structure for table `services_booked`
--

CREATE TABLE `services_booked` (
  `appointment_id` int(5) NOT NULL,
  `service_id` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `services_booked`
--

INSERT INTO `services_booked` (`appointment_id`, `service_id`) VALUES
(18, 1),
(19, 2),
(20, 3),
(21, 4),
(22, 5),
(23, 6),
(24, 8),
(25, 1),
(26, 1),
(27, 3),
(28, 5);

-- --------------------------------------------------------

--
-- Table structure for table `service_categories`
--

CREATE TABLE `service_categories` (
  `category_id` int(2) NOT NULL,
  `category_name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `service_categories`
--

INSERT INTO `service_categories` (`category_id`, `category_name`) VALUES
(2, 'الشعر'),
(3, 'اللحية'),
(4, 'Uncategorized'),
(6, 'ماسك الوجه');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `appointments`
--
ALTER TABLE `appointments`
  ADD PRIMARY KEY (`appointment_id`),
  ADD KEY `FK_client_appointment` (`client_id`),
  ADD KEY `FK_employee_appointment` (`employee_id`);

--
-- Indexes for table `barber_admin`
--
ALTER TABLE `barber_admin`
  ADD PRIMARY KEY (`admin_id`),
  ADD UNIQUE KEY `username` (`username`,`admin_email`);

--
-- Indexes for table `clients`
--
ALTER TABLE `clients`
  ADD PRIMARY KEY (`client_id`),
  ADD UNIQUE KEY `client_email` (`client_email`),
  ADD KEY `employee_idd` (`employee_id`);

--
-- Indexes for table `employees`
--
ALTER TABLE `employees`
  ADD PRIMARY KEY (`employee_id`);

--
-- Indexes for table `employees_schedule`
--
ALTER TABLE `employees_schedule`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_emp` (`employee_id`);

--
-- Indexes for table `services`
--
ALTER TABLE `services`
  ADD PRIMARY KEY (`service_id`),
  ADD KEY `FK_service_category` (`category_id`);

--
-- Indexes for table `services_booked`
--
ALTER TABLE `services_booked`
  ADD PRIMARY KEY (`appointment_id`,`service_id`),
  ADD KEY `FK_SB_service` (`service_id`);

--
-- Indexes for table `service_categories`
--
ALTER TABLE `service_categories`
  ADD PRIMARY KEY (`category_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `appointments`
--
ALTER TABLE `appointments`
  MODIFY `appointment_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `barber_admin`
--
ALTER TABLE `barber_admin`
  MODIFY `admin_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `clients`
--
ALTER TABLE `clients`
  MODIFY `client_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `employees`
--
ALTER TABLE `employees`
  MODIFY `employee_id` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `employees_schedule`
--
ALTER TABLE `employees_schedule`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=99;

--
-- AUTO_INCREMENT for table `services`
--
ALTER TABLE `services`
  MODIFY `service_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `service_categories`
--
ALTER TABLE `service_categories`
  MODIFY `category_id` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `appointments`
--
ALTER TABLE `appointments`
  ADD CONSTRAINT `FK_client_appointment` FOREIGN KEY (`client_id`) REFERENCES `clients` (`client_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `FK_employee_appointment` FOREIGN KEY (`employee_id`) REFERENCES `employees` (`employee_id`) ON DELETE CASCADE;

--
-- Constraints for table `clients`
--
ALTER TABLE `clients`
  ADD CONSTRAINT `employee_idd` FOREIGN KEY (`employee_id`) REFERENCES `employees` (`employee_id`);

--
-- Constraints for table `employees_schedule`
--
ALTER TABLE `employees_schedule`
  ADD CONSTRAINT `FK_emp` FOREIGN KEY (`employee_id`) REFERENCES `employees` (`employee_id`) ON DELETE CASCADE;

--
-- Constraints for table `services`
--
ALTER TABLE `services`
  ADD CONSTRAINT `FK_service_category` FOREIGN KEY (`category_id`) REFERENCES `service_categories` (`category_id`) ON DELETE CASCADE;

--
-- Constraints for table `services_booked`
--
ALTER TABLE `services_booked`
  ADD CONSTRAINT `FK_SB_appointment` FOREIGN KEY (`appointment_id`) REFERENCES `appointments` (`appointment_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `FK_SB_service` FOREIGN KEY (`service_id`) REFERENCES `services` (`service_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `FK_appointment` FOREIGN KEY (`appointment_id`) REFERENCES `appointments` (`appointment_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
