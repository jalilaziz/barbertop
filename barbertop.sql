-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 10, 2024 at 03:32 AM
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
(18, '2024-05-11 00:58:00', 22, 1, '2024-05-13 10:30:00', '2024-05-13 11:00:00', 0, NULL),
(20, '2024-06-10 02:15:00', 24, 3, '2024-06-11 18:00:00', '2024-06-11 18:20:00', 0, NULL),
(22, '2024-06-10 02:26:00', 26, 1, '2024-06-11 15:00:00', '2024-06-11 15:20:00', 0, NULL);

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
(1, 'admin', 'admin@gmail.com', 'Admin Admin', '0c4b97c01fb8f2c2c3e235e694c0aa91b922e38c');

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
(22, 'jalil', 'aziz', '0665656565', 'jalilaziz@gmail.com', 1),
(24, 'khaled', 'nejari', '0663636363', 'khalednejari@gmail.com', 3),
(26, 'adil', 'malek', '0625454545', 'adilmalek@gmail.com', 1);

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
(85, 2, 1, '10:00:00', '22:00:00'),
(86, 2, 2, '10:00:00', '22:00:00'),
(87, 2, 3, '10:00:00', '22:00:00'),
(88, 2, 4, '10:00:00', '22:00:00'),
(89, 2, 5, '10:00:00', '22:00:00'),
(90, 2, 6, '10:00:00', '22:00:00'),
(91, 2, 7, '09:00:00', '18:00:00'),
(134, 1, 1, '11:00:00', '22:00:00'),
(135, 1, 2, '11:00:00', '22:00:00'),
(136, 1, 3, '11:00:00', '22:00:00'),
(137, 1, 4, '11:00:00', '22:00:00'),
(138, 1, 5, '11:00:00', '22:00:00'),
(139, 1, 6, '11:00:00', '22:00:00'),
(140, 1, 7, '11:00:00', '22:00:00'),
(141, 3, 1, '10:00:00', '22:00:00'),
(142, 3, 2, '10:00:00', '22:00:00'),
(143, 3, 3, '09:00:00', '18:00:00'),
(144, 3, 4, '10:00:00', '22:00:00'),
(145, 3, 5, '10:00:00', '22:00:00'),
(146, 3, 6, '10:00:00', '22:00:00'),
(147, 3, 7, '10:00:00', '22:00:00');

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
(1, 'حلاقة الشعر', '', 30.00, 30, 2),
(2, 'تسريح الشعر', '', 60.00, 30, 2),
(3, 'تشذيب الشعر', '', 20.00, 20, 2),
(4, 'حلاقة كاملة', '', 20.00, 20, 3),
(5, 'تشذيب اللحية', '', 30.00, 30, 3),
(6, 'حلاقة ناعمة', '', 20.00, 20, 3),
(7, 'تنظيف الوجه', '', 30.00, 30, 6),
(8, 'ماسك للوجه', '', 20.00, 20, 6);

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
(20, 3),
(22, 4);

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
(6, 'ماسك للوجه');

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
  MODIFY `appointment_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `barber_admin`
--
ALTER TABLE `barber_admin`
  MODIFY `admin_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `clients`
--
ALTER TABLE `clients`
  MODIFY `client_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `employees`
--
ALTER TABLE `employees`
  MODIFY `employee_id` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `employees_schedule`
--
ALTER TABLE `employees_schedule`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=148;

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
