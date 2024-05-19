-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 20, 2024 at 01:06 AM
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
-- Database: `barbershop`
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
(13, '2024-05-10 16:08:00', 14, 2, '2024-05-18 14:00:00', '2024-05-18 14:20:00', 0, NULL),
(14, '2024-05-14 21:13:00', 15, 1, '2024-05-22 09:00:00', '2024-05-22 09:20:00', 0, NULL),
(15, '2024-05-14 21:19:00', 16, 3, '2024-05-20 13:00:00', '2024-05-20 13:15:00', 0, NULL),
(16, '2024-05-19 18:36:00', 17, 2, '2024-05-25 14:30:00', '2024-05-25 15:05:00', 0, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `barber_admin`
--

CREATE TABLE `barber_admin` (
  `admin_id` int(5) NOT NULL,
  `username` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `full_name` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `barber_admin`
--

INSERT INTO `barber_admin` (`admin_id`, `username`, `email`, `full_name`, `password`) VALUES
(1, 'admin', 'admin.admin@gmail.com', 'Admin Admin', 'f7c3bc1d808e04732adf679965ccc34ca7ae3441'),
(2, 'admin1', 'admin1@gmail.com', 'Admin ad', 'f7c3bc1d808e04732adf679965ccc34ca7ae3441');

-- --------------------------------------------------------

--
-- Table structure for table `clients`
--

CREATE TABLE `clients` (
  `client_id` int(5) NOT NULL,
  `first_name` varchar(30) NOT NULL,
  `last_name` varchar(30) NOT NULL,
  `phone_number` varchar(30) NOT NULL,
  `client_email` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `clients`
--

INSERT INTO `clients` (`client_id`, `first_name`, `last_name`, `phone_number`, `client_email`) VALUES
(13, 'Driss', 'Jabiri', '0789342481', 'driss.jabiri@gmail.com'),
(14, 'jalil', 'aziz', '0625252525', 'jalil@aziz.com'),
(15, 'naji', 'adam', '0621212121', 'adamnaji@gmail.com'),
(16, 'radi', 'hamid', '0678787878', 'radihamid@gmail.com'),
(17, 'bhubh', 'jijijij', '0514251515', 'jnii@vcftc.com');

-- --------------------------------------------------------

--
-- Table structure for table `employees`
--

CREATE TABLE `employees` (
  `employee_id` int(2) NOT NULL,
  `first_name` varchar(20) NOT NULL,
  `last_name` varchar(20) NOT NULL,
  `phone_number` varchar(30) NOT NULL,
  `email` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `employees`
--

INSERT INTO `employees` (`employee_id`, `first_name`, `last_name`, `phone_number`, `email`) VALUES
(1, 'Karim', 'alami', '0613131313', 'karimalami@gmail.com'),
(2, 'Soufiane', 'khattabi', '0615151515', 'soufianekhattabi@gmail.com'),
(3, 'Adil', 'benmlik', '0617171717', 'adilbenmlik@gmail.com');

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
(47, 2, 2, '10:00:00', '22:00:00'),
(48, 2, 3, '10:00:00', '22:00:00'),
(49, 2, 4, '10:00:00', '22:00:00'),
(50, 2, 5, '10:00:00', '22:00:00'),
(51, 2, 6, '10:00:00', '22:00:00'),
(52, 2, 7, '10:00:00', '22:00:00'),
(53, 1, 1, '11:00:00', '22:00:00'),
(54, 1, 3, '11:00:00', '22:00:00'),
(55, 1, 4, '11:00:00', '22:00:00'),
(56, 1, 5, '11:00:00', '22:00:00'),
(57, 1, 6, '11:00:00', '22:00:00'),
(58, 1, 7, '11:00:00', '22:00:00'),
(59, 3, 1, '10:00:00', '22:00:00'),
(60, 3, 2, '10:00:00', '22:00:00'),
(61, 3, 4, '10:00:00', '22:00:00'),
(62, 3, 5, '10:00:00', '22:00:00'),
(63, 3, 6, '10:00:00', '22:00:00'),
(64, 3, 7, '10:00:00', '22:00:00');

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
(1, 'Hair Cut', '', 21.00, 20, 6),
(2, 'Hair Styling', '', 9.00, 15, 6),
(3, 'Hair Triming', '', 10.00, 10, 6),
(4, 'Clean Shaving', '', 20.00, 20, 2),
(5, 'Beard Triming', '', 20.00, 15, 2),
(6, 'Smooth Shave', '', 15.00, 20, 2),
(7, 'White Facial', '', 16.00, 15, 3),
(8, 'Face Cleaning', '', 20.00, 20, 3),
(9, 'Bright Tuning', '', 14.00, 20, 3);

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
(13, 9),
(14, 4),
(15, 5),
(16, 5),
(16, 6);

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
(2, 'Shaving'),
(3, 'Face Masking'),
(4, 'Uncategorized'),
(6, 'Hair Cut');

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
  ADD UNIQUE KEY `username` (`username`,`email`);

--
-- Indexes for table `clients`
--
ALTER TABLE `clients`
  ADD PRIMARY KEY (`client_id`),
  ADD UNIQUE KEY `client_email` (`client_email`);

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
  MODIFY `appointment_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `barber_admin`
--
ALTER TABLE `barber_admin`
  MODIFY `admin_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `clients`
--
ALTER TABLE `clients`
  MODIFY `client_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `employees`
--
ALTER TABLE `employees`
  MODIFY `employee_id` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `employees_schedule`
--
ALTER TABLE `employees_schedule`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=65;

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
