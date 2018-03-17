-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 17, 2018 at 07:41 PM
-- Server version: 10.1.25-MariaDB
-- PHP Version: 7.1.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `vetopia_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbladmins`
--

CREATE TABLE `tbladmins` (
  `admin_id` int(11) NOT NULL,
  `admin_user_id` text NOT NULL,
  `admin_type` varchar(45) NOT NULL,
  `first_name` varchar(45) NOT NULL,
  `middle_name` varchar(45) NOT NULL,
  `last_name` varchar(45) NOT NULL,
  `gender` varchar(45) NOT NULL,
  `date_birth` date NOT NULL,
  `cellphone` text NOT NULL,
  `telephone` text NOT NULL,
  `address` text NOT NULL,
  `date_added` datetime NOT NULL,
  `email` text NOT NULL,
  `password` text NOT NULL,
  `is_active` int(11) NOT NULL,
  `image` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbladmins`
--

INSERT INTO `tbladmins` (`admin_id`, `admin_user_id`, `admin_type`, `first_name`, `middle_name`, `last_name`, `gender`, `date_birth`, `cellphone`, `telephone`, `address`, `date_added`, `email`, `password`, `is_active`, `image`) VALUES
(4, 'SA1802120123200', 'superadmin', 'Kim', 'Kang', 'Kong', 'male', '1990-02-13', '090911212112', '23232323', 'Central City', '2018-02-12 01:23:53', 'kangkong@gmail.com', 'kangkong', 1, ''),
(5, 'SA1802120134251', 'superadmin', 'Ivan Christian Jay', 'Echanes', 'Funcion', 'male', '1995-11-23', '09479888749', '666', 'Makait', '2018-02-12 01:36:06', 'adminivan@gmail.com', 'adminivan', 1, 'ivan.jpg'),
(6, 'A1802120140362', 'admin', 'So-Hyun', '', 'Kim', 'female', '1999-06-04', '90093343434', '090911', 'SoKor', '2018-02-12 01:41:26', 'wowkimsohyun@gmail.com', 'wowkimsohyun', 1, '');

-- --------------------------------------------------------

--
-- Table structure for table `tblappointments`
--

CREATE TABLE `tblappointments` (
  `appointment_id` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `customer_name` text NOT NULL,
  `telephone` text NOT NULL,
  `cellphone` text NOT NULL,
  `preferred_date` date NOT NULL,
  `preferred_time_of_day` varchar(45) NOT NULL,
  `appointment_reason` text NOT NULL,
  `date_requested` datetime NOT NULL,
  `status` varchar(45) NOT NULL,
  `cancellation_reason` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblappointments`
--

INSERT INTO `tblappointments` (`appointment_id`, `customer_id`, `customer_name`, `telephone`, `cellphone`, `preferred_date`, `preferred_time_of_day`, `appointment_reason`, `date_requested`, `status`, `cancellation_reason`) VALUES
(2, 0, 'Customer 1', '111111', '1111111', '2018-02-14', 'evening', 'hahha sample1', '2018-02-14 23:59:18', 'approved', ''),
(3, 21, 'Karla Rose Mayumi Dele Cruz', '090911', '09121212121', '2018-02-15', 'afternoon', 'sdsdsdsd', '2018-02-15 00:25:03', 'approved', ''),
(4, 0, 'Customer 2', '3232', '434', '2018-02-15', 'evening', 'ssddsds', '2018-02-15 00:41:31', 'cancelled', 'hahhahahaha na cancel ko to'),
(5, 0, 'Bruno Mars', '9999', '090911212112', '2018-02-17', 'evening', 'may sakit si junny boy', '2018-02-17 19:38:41', 'done', ''),
(6, 15, 'Christine Batacan Domingo', '09111', '090911212112', '2018-02-19', 'afternoon', 'pacheck up ng aso ko', '2018-02-17 22:42:22', 'cancelled', 'ayaw ko na'),
(7, 15, 'Christine Batacan Domingo', '09111', '090911212112', '2018-02-23', 'moring', 'hahahhaha', '2018-02-19 00:14:04', 'done', ''),
(8, 15, 'Christine Batacan Domingo', '09111', '090911212112', '2018-02-27', 'afternoon', 'checking last', '2018-02-24 13:35:52', 'done', ''),
(9, 20, 'Terrence Bill Mendoza Romeo', '7777', '0907777777227', '2018-03-11', 'afternoon', 'sdsdasdasfd', '2018-03-11 18:05:12', 'approved', ''),
(10, 0, 'ivan2', '34343242', '342424242', '2018-03-11', 'moring', 'dadsadadasd', '2018-03-11 18:06:08', 'approved', '');

-- --------------------------------------------------------

--
-- Table structure for table `tblcolorskins`
--

CREATE TABLE `tblcolorskins` (
  `colorskin_id` int(11) NOT NULL,
  `color_skin` varchar(45) NOT NULL,
  `background_color` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblcolorskins`
--

INSERT INTO `tblcolorskins` (`colorskin_id`, `color_skin`, `background_color`) VALUES
(1, 'skin-blue', '#3c8dbc'),
(2, 'skin-blue-light', '#3c8dbc'),
(3, 'skin-black', '#ffffff'),
(4, 'skin-black-light', '#ffffff'),
(5, 'skin-yellow', '#e08e0b'),
(6, 'skin-yellow-light', '#e08e0b'),
(7, 'skin-green', '#008d4c'),
(8, 'skin-green-light', '#008d4c');

-- --------------------------------------------------------

--
-- Table structure for table `tblcustomers`
--

CREATE TABLE `tblcustomers` (
  `customer_id` int(11) NOT NULL,
  `customer_user_id` text NOT NULL,
  `first_name` varchar(45) NOT NULL,
  `middle_name` varchar(45) NOT NULL,
  `last_name` varchar(45) NOT NULL,
  `address` text NOT NULL,
  `cellphone` text NOT NULL,
  `telephone` text NOT NULL,
  `email` text NOT NULL,
  `image` text NOT NULL,
  `gender` varchar(45) NOT NULL,
  `is_active` int(11) NOT NULL,
  `password` text NOT NULL,
  `date_added` datetime NOT NULL,
  `date_birth` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblcustomers`
--

INSERT INTO `tblcustomers` (`customer_id`, `customer_user_id`, `first_name`, `middle_name`, `last_name`, `address`, `cellphone`, `telephone`, `email`, `image`, `gender`, `is_active`, `password`, `date_added`, `date_birth`) VALUES
(15, 'C1802110323006', 'Christine', '', 'Lazaro', 'Makait', '090911212112', '09111', 'christinelazaro@gmail.com', 'avatar3.png', 'female', 1, 'christinelazaro', '2018-02-11 15:24:33', '1995-06-06'),
(16, 'C1802110324497', 'Rey Vincent Phillip', '', 'Villaver', 'Brgy. Olimpia Makati City', '090911212112', '090911', 'rvpvillaver@gmail.com', '', 'male', 0, 'rvpvillaver', '2018-02-11 15:28:45', '1995-06-06'),
(17, 'C1802110328459', 'Aldwin ', 'Balagtas', 'Labrador', 'Cavite', '90093343434', '09111', 'A8labrador@gmail.com', '', 'male', 1, 'A8labrador', '2018-02-11 15:30:35', '1995-09-19'),
(18, 'C1802110330352', 'Jay Jay', '', 'Helterbrand', 'Brgy. Ginebra San Miguel', '090911212112', '090911', 'mr.fast13@gmail.com', '', 'male', 1, 'mr.fast13', '2018-02-11 15:31:54', '1976-06-15'),
(19, 'C1802110331543', 'Apple', '', 'David', 'Central City', '90093343434', '09111', 'appledavid@gmail.com', '', 'female', 1, 'appledavid', '2018-02-11 15:32:46', '1993-01-20'),
(20, 'C1802111139284', 'Terrence Bill', 'Mendoza', 'Romeo', 'Global City', '0907777777227', '7777', 'TRomeo@gmail.com', '', 'male', 1, 'TRomeo', '2018-02-11 23:40:39', '1992-05-17'),
(21, 'C1802111144176', 'Karla Rose', 'Mayumi', 'Dele Cruz', 'Central City', '09121212121', '090911', 'karlarose@gmail.com', 'avatar2.png', 'female', 1, 'karlarose', '2018-02-11 23:45:18', '1998-06-23'),
(22, 'C1803111109329', 'Naruto', '', 'Uzumaki', 'Hidden Leaf Village', '090911212112', '09111', 'narutouzumaki@gmail.com', '', 'male', 1, 'narutouzumaki', '2018-03-11 23:11:10', '1995-06-13');

-- --------------------------------------------------------

--
-- Table structure for table `tbldrugprescribed`
--

CREATE TABLE `tbldrugprescribed` (
  `drugprescribed_id` int(11) NOT NULL,
  `employee_id` int(11) NOT NULL,
  `animal_id` int(11) NOT NULL,
  `drug_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbldrugtype`
--

CREATE TABLE `tbldrugtype` (
  `drugtype_id` int(11) NOT NULL,
  `drug_type` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbldrugtype`
--

INSERT INTO `tbldrugtype` (`drugtype_id`, `drug_type`) VALUES
(1, 'antibiotic'),
(2, 'vitamins'),
(3, 'sedatives'),
(4, 'c++');

-- --------------------------------------------------------

--
-- Table structure for table `tblemployees`
--

CREATE TABLE `tblemployees` (
  `employee_id` int(11) NOT NULL,
  `employee_user_id` text NOT NULL,
  `employee_type` varchar(45) NOT NULL,
  `first_name` varchar(45) NOT NULL,
  `middle_name` varchar(45) NOT NULL,
  `last_name` varchar(45) NOT NULL,
  `email` text NOT NULL,
  `cellphone` text NOT NULL,
  `telephone` text NOT NULL,
  `address` text NOT NULL,
  `image` text NOT NULL,
  `password` text NOT NULL,
  `gender` varchar(45) NOT NULL,
  `is_active` int(11) NOT NULL,
  `date_birth` date NOT NULL,
  `date_added` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblemployees`
--

INSERT INTO `tblemployees` (`employee_id`, `employee_user_id`, `employee_type`, `first_name`, `middle_name`, `last_name`, `email`, `cellphone`, `telephone`, `address`, `image`, `password`, `gender`, `is_active`, `date_birth`, `date_added`) VALUES
(11, 'V1802121253177', 'veterinarian', 'John', 'Hernandez', 'Villete', 'jvillete@gmail.com', '090911212112', '090911', 'Makait', '', 'jvillete', 'male', 1, '1995-06-14', '2018-02-12 00:54:00'),
(12, 'S1802121254076', 'staff', 'John Rey', 'Gulo', 'Cruz', 'johnrey@gmail.com', '90093343434', '090911', 'Central City', 'images1.jpg', 'johnrey', 'male', 1, '1989-05-17', '2018-02-12 00:55:17'),
(13, 'V1803111218034', 'veterinarian', 'Irene Joy', 'Echanes', 'Funcion', 'irenejoy@gmail.com', '0909112121', '911', 'Central City', '', 'irenejoy', 'female', 1, '1999-10-22', '2018-03-11 00:19:20'),
(14, 'V1803171052333', 'veterinarian', 'Karen Grace', 'Dasma', 'Smith', 'karengrace@gmail.com', '090911212112', '9999', 'Central City', '', 'karengrace', 'female', 1, '1990-05-14', '2018-03-17 22:56:13');

-- --------------------------------------------------------

--
-- Table structure for table `tblimagegallery`
--

CREATE TABLE `tblimagegallery` (
  `image_id` int(11) NOT NULL,
  `image_name` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblimagegallery`
--

INSERT INTO `tblimagegallery` (`image_id`, `image_name`) VALUES
(1, 'carousel-mission.jpg'),
(2, 'carousel-lifestyle.jpg'),
(3, 'carousel-fish.jpg'),
(4, 'carousel-mission.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `tblinventoryforitems`
--

CREATE TABLE `tblinventoryforitems` (
  `inv_item_id` int(11) NOT NULL,
  `user_type` varchar(45) NOT NULL,
  `user_name` text NOT NULL,
  `user_id` int(11) NOT NULL,
  `action` varchar(45) NOT NULL,
  `product_item_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `inventory_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblinventoryforitems`
--

INSERT INTO `tblinventoryforitems` (`inv_item_id`, `user_type`, `user_name`, `user_id`, `action`, `product_item_id`, `quantity`, `inventory_date`) VALUES
(1, 'Admin', '', 2, 'Add Product', 2, 101, '2018-02-11 23:45:18'),
(2, 'Admin', '', 2, 'Update Quantity', 1, 102, '2018-02-11 23:45:18'),
(3, 'Admin', '', 2, 'Update Quantity', 2, 110, '2018-02-11 23:45:18'),
(4, 'Admin', '', 5, 'Add Product', 3, 1000, '2018-02-11 23:45:18'),
(5, 'Admin', '', 5, 'Add Product', 4, 100, '2018-02-11 23:45:18'),
(6, 'Admin', '', 5, 'Update Quantity', 4, 102, '2018-02-25 23:25:56'),
(7, 'Admin', '', 5, 'Add Product', 5, 100, '2018-02-25 23:27:08'),
(8, 'Admin', '', 4, 'Update Quantity', 1, 56, '2018-02-26 21:13:06'),
(9, 'Admin', '', 4, 'Update Quantity', 5, 101, '2018-02-26 21:27:19'),
(10, 'Customer', '', 18, 'Purchased Product', 5, 1, '2018-03-07 14:12:08'),
(11, 'Customer (Member)', '', 18, 'Purchased Product', 5, 5, '2018-03-08 15:55:01'),
(12, 'Customer (Member)', 'Apple  David', 19, 'Purchased Product', 2, 3, '2018-03-08 16:08:57'),
(13, 'Customer (Walkin)', 'dsds', 0, 'Purchased Product', 6, 7, '2018-03-08 16:24:35'),
(14, 'Customer (Walkin)', 'ds', 0, 'Purchased Product', 5, 4, '2018-03-08 16:26:39'),
(15, 'Customer (Member)', 'Terrence Bill Mendoza Romeo', 20, 'Purchased Product', 6, 5, '2018-03-08 16:29:05'),
(16, 'Customer (Walkin)', 'Carla jane', 0, 'Purchased Product', 2, 5, '2018-03-08 16:40:02'),
(17, 'Customer (Walkin)', 'dsds', 0, 'Purchased Product', 4, 5, '2018-03-08 17:39:59'),
(18, 'Customer (Member)', 'Jay Jay  Helterbrand', 18, 'Purchased Product', 5, 5, '2018-03-08 23:05:16'),
(19, 'Customer (Member)', 'Aldwin  Balagtas Labrador', 17, 'Purchased Product', 2, 2, '2018-03-08 23:14:03'),
(20, 'Customer (Walk in)', 'ivan the ahhaha', 0, 'Purchased Product', 4, 4, '2018-03-08 23:17:38'),
(21, 'Customer (Member)', 'Aldwin  Balagtas Labrador', 17, 'Purchased Product', 3, 2, '2018-03-08 23:25:15'),
(22, 'Customer (Member)', 'Apple  David', 19, 'Purchased Product', 6, 2, '2018-03-09 02:29:57'),
(23, 'Customer (Member)', 'Apple  David', 19, 'Purchased Product', 5, 2, '2018-03-09 02:29:57'),
(24, 'Customer (Member)', 'Apple  David', 19, 'Purchased Product', 4, 2, '2018-03-09 02:29:57'),
(25, 'Customer (Member)', 'Apple  David', 19, 'Purchased Product', 3, 2, '2018-03-09 02:29:57'),
(26, 'Customer (Member)', 'Apple  David', 19, 'Purchased Product', 2, 2, '2018-03-09 02:29:57'),
(27, 'Customer (Member)', 'Apple  David', 19, 'Purchased Product', 6, 2, '2018-03-09 02:46:23'),
(28, 'Customer (Walk in)', 'iaisadadsadsad', 0, 'Purchased Product', 3, 2, '2018-03-09 02:49:03'),
(29, 'Customer (Member)', 'Jay Jay  Helterbrand', 18, 'Purchased Product', 6, 3, '2018-03-10 23:19:23'),
(30, 'Customer (Member)', 'Jay Jay  Helterbrand', 18, 'Purchased Product', 5, 2, '2018-03-10 23:19:23'),
(31, 'staff', 'John Rey Gulo Cruz', 12, 'Update Quantity', 5, 107, '2018-03-11 18:22:48'),
(32, 'Customer (Walk in)', '', 0, 'Purchased Product', 5, 2, '2018-03-11 23:35:55'),
(33, 'Customer (Walk in)', '', 0, 'Purchased Product', 2, 2, '2018-03-11 23:35:55'),
(34, 'Customer (Walk in)', 'Sarada Uchiha', 0, 'Purchased Product', 6, 3, '2018-03-11 23:36:33');

-- --------------------------------------------------------

--
-- Table structure for table `tblinventoryformedicines`
--

CREATE TABLE `tblinventoryformedicines` (
  `inv_med_id` int(11) NOT NULL,
  `user_type` varchar(45) NOT NULL,
  `user_id` int(11) NOT NULL,
  `action` varchar(45) NOT NULL,
  `product_med_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `inventory_date` datetime NOT NULL,
  `user_name` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblinventoryformedicines`
--

INSERT INTO `tblinventoryformedicines` (`inv_med_id`, `user_type`, `user_id`, `action`, `product_med_id`, `quantity`, `inventory_date`, `user_name`) VALUES
(1, 'Admin', 2, 'Add Product', 3, 41, '2018-02-11 23:45:18', ''),
(2, 'Admin', 2, 'Update Quantity', 1, 11, '2018-02-11 23:45:18', ''),
(3, 'Admin', 5, 'Add Product', 4, 168, '2018-02-11 23:45:18', ''),
(4, 'Admin', 5, 'Update Quantity', 4, 161, '2018-02-25 23:29:21', ''),
(5, 'Admin', 4, 'Add Product', 5, 100, '2018-02-26 22:24:10', ''),
(6, 'Admin', 4, 'Update Quantity', 5, 121, '2018-02-26 22:24:20', ''),
(7, 'Customer', 18, 'Purchased Product', 5, 6, '2018-03-07 14:12:08', ''),
(8, 'Customer', 18, 'Purchased Product', 4, 5, '2018-03-07 14:12:08', ''),
(9, 'Admin', 5, 'Update Quantity', 5, 126, '2018-03-08 13:37:39', ''),
(10, 'Admin', 5, 'Update Quantity', 5, 124, '2018-03-08 13:38:40', ''),
(11, 'Admin', 5, 'Update Quantity', 5, 555, '2018-03-08 13:39:38', ''),
(12, 'Admin', 5, 'Add Product', 6, 541, '2018-03-08 13:40:15', 'Ivan Christian Jay Echanes Funcion'),
(13, 'superadmin', 5, 'Update Quantity', 6, 1111, '2018-03-08 14:07:54', 'Ivan Christian Jay Echanes Funcion'),
(14, 'Customer (Member)', 18, 'Purchased Product', 5, 5, '2018-03-08 15:55:01', ''),
(15, 'Customer (Member)', 18, 'Purchased Product', 4, 2, '2018-03-08 15:55:01', ''),
(16, 'Customer (Member)', 20, 'Purchased Product', 5, 4, '2018-03-08 15:59:43', ''),
(17, 'Customer (Member)', 20, 'Purchased Product', 4, 2, '2018-03-08 15:59:43', ''),
(18, 'Customer (Member)', 19, 'Purchased Product', 5, 5, '2018-03-08 16:08:57', 'Apple  David'),
(19, 'Customer (Member)', 19, 'Purchased Product', 4, 5, '2018-03-08 16:08:57', 'Apple  David'),
(20, 'Customer (Member)', 19, 'Purchased Product', 2, 1, '2018-03-08 16:08:57', 'Apple  David'),
(21, 'Customer (Walkin)', 0, 'Purchased Product', 5, 6, '2018-03-08 16:23:28', 'dsdsd'),
(22, 'Customer (Walkin)', 0, 'Purchased Product', 4, 5, '2018-03-08 16:23:28', 'dsdsd'),
(23, 'Customer (Walkin)', 0, 'Purchased Product', 5, 6, '2018-03-08 16:24:35', 'dsds'),
(24, 'Customer (Walkin)', 0, 'Purchased Product', 4, 1, '2018-03-08 16:24:35', 'dsds'),
(25, 'Customer (Walkin)', 0, 'Purchased Product', 4, 3, '2018-03-08 16:26:39', 'ds'),
(26, 'Customer (Member)', 20, 'Purchased Product', 5, 1, '2018-03-08 16:29:05', 'Terrence Bill Mendoza Romeo'),
(27, 'Customer (Walkin)', 0, 'Purchased Product', 5, 5, '2018-03-08 16:40:02', 'Carla jane'),
(28, 'Customer (Walkin)', 0, 'Purchased Product', 4, 2, '2018-03-08 16:40:02', 'Carla jane'),
(29, 'Customer (Walkin)', 0, 'Purchased Product', 5, 4, '2018-03-08 16:42:49', 'dsd'),
(30, 'Customer (Walkin)', 0, 'Purchased Product', 5, 5, '2018-03-08 16:43:44', 'ds'),
(31, 'Customer (Walkin)', 0, 'Purchased Product', 4, 2, '2018-03-08 16:43:44', 'ds'),
(32, 'Customer (Walkin)', 0, 'Purchased Product', 5, 3, '2018-03-08 17:39:59', 'dsds'),
(33, 'Customer (Walkin)', 0, 'Purchased Product', 4, 2, '2018-03-08 17:39:59', 'dsds'),
(34, 'Customer (Member)', 21, 'Purchased Product', 5, 1, '2018-03-08 21:25:44', 'Karla Rose Mayumi Dele Cruz'),
(35, 'Customer (Member)', 21, 'Purchased Product', 5, 4, '2018-03-08 23:03:59', 'Karla Rose Mayumi Dele Cruz'),
(36, 'Customer (Member)', 21, 'Purchased Product', 4, 4, '2018-03-08 23:03:59', 'Karla Rose Mayumi Dele Cruz'),
(37, 'Customer (Member)', 18, 'Purchased Product', 5, 5, '2018-03-08 23:05:16', 'Jay Jay  Helterbrand'),
(38, 'Customer (Member)', 18, 'Purchased Product', 4, 2, '2018-03-08 23:05:16', 'Jay Jay  Helterbrand'),
(39, 'Customer (Member)', 20, 'Purchased Product', 5, 5, '2018-03-08 23:06:02', 'Terrence Bill Mendoza Romeo'),
(40, 'Customer (Member)', 20, 'Purchased Product', 3, 1, '2018-03-08 23:06:02', 'Terrence Bill Mendoza Romeo'),
(41, 'Customer (Member)', 17, 'Purchased Product', 5, 3, '2018-03-08 23:14:03', 'Aldwin  Balagtas Labrador'),
(42, 'Customer (Walk in)', 0, 'Purchased Product', 5, 3, '2018-03-08 23:17:38', 'ivan the ahhaha'),
(43, 'Customer (Member)', 17, 'Purchased Product', 5, 5, '2018-03-08 23:25:15', 'Aldwin  Balagtas Labrador'),
(44, 'Customer (Member)', 19, 'Purchased Product', 5, 2, '2018-03-09 02:29:57', 'Apple  David'),
(45, 'Customer (Member)', 19, 'Purchased Product', 4, 2, '2018-03-09 02:29:57', 'Apple  David'),
(46, 'Customer (Member)', 19, 'Purchased Product', 3, 2, '2018-03-09 02:29:57', 'Apple  David'),
(47, 'Customer (Member)', 19, 'Purchased Product', 2, 2, '2018-03-09 02:29:57', 'Apple  David'),
(48, 'Customer (Member)', 19, 'Purchased Product', 1, 2, '2018-03-09 02:29:57', 'Apple  David'),
(49, 'Customer (Member)', 19, 'Purchased Product', 5, 4, '2018-03-09 02:46:23', 'Apple  David'),
(50, 'Customer (Walk in)', 0, 'Purchased Product', 5, 5, '2018-03-09 02:49:03', 'iaisadadsadsad'),
(51, 'Customer (Walk in)', 0, 'Purchased Product', 5, 1, '2018-03-09 02:50:28', 'sds'),
(52, 'Customer (Walk in)', 0, 'Purchased Product', 5, 1, '2018-03-09 02:51:22', 'sdsdadfdfd'),
(53, 'Customer (Member)', 20, 'Purchased Product', 5, 3, '2018-03-09 03:17:20', 'Terrence Bill Mendoza Romeo'),
(54, 'Customer (Walk in)', 0, 'Purchased Product', 5, 4, '2018-03-09 03:17:47', 'dsds'),
(55, 'Customer (Walk in)', 0, 'Purchased Product', 4, 2, '2018-03-09 03:17:47', 'dsds'),
(56, 'Customer (Member)', 18, 'Purchased Product', 5, 5, '2018-03-10 23:19:23', 'Jay Jay  Helterbrand'),
(57, 'Customer (Member)', 18, 'Purchased Product', 4, 3, '2018-03-10 23:19:23', 'Jay Jay  Helterbrand'),
(58, 'Customer (Walk in)', 0, 'Purchased Product', 5, 2, '2018-03-11 14:49:21', 'ivan 2'),
(59, 'Customer (Walk in)', 0, 'Purchased Product', 4, 2, '2018-03-11 14:49:21', 'ivan 2'),
(60, 'Customer (Walk in)', 0, 'Purchased Product', 5, 4, '2018-03-11 14:54:49', ''),
(61, 'staff', 12, 'Update Quantity', 6, 111, '2018-03-11 22:00:47', 'John Rey Gulo Cruz'),
(62, 'staff', 12, 'Update Quantity', 6, 116, '2018-03-11 22:12:44', 'John Rey Gulo Cruz'),
(63, 'Customer (Walk in)', 0, 'Purchased Product', 5, 3, '2018-03-11 23:35:55', ''),
(64, 'Customer (Walk in)', 0, 'Purchased Product', 5, 2, '2018-03-11 23:36:33', 'Sarada Uchiha'),
(65, 'Customer (Walk in)', 0, 'Purchased Product', 4, 2, '2018-03-11 23:36:33', 'Sarada Uchiha'),
(66, 'Customer (Walk in)', 0, 'Purchased Product', 5, 3, '2018-03-18 00:09:00', 'das'),
(67, 'Customer (Walk in)', 0, 'Purchased Product', 4, 3, '2018-03-18 00:09:00', 'das');

-- --------------------------------------------------------

--
-- Table structure for table `tblpetbreed`
--

CREATE TABLE `tblpetbreed` (
  `breed_id` int(11) NOT NULL,
  `breed` varchar(45) NOT NULL,
  `pettype_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblpetbreed`
--

INSERT INTO `tblpetbreed` (`breed_id`, `breed`, `pettype_id`) VALUES
(1, 'Labrador Retriever', 1),
(2, 'Great Dane', 1),
(3, 'Garfield', 2),
(4, 'Tilapya', 3),
(5, 'lazy cat', 2);

-- --------------------------------------------------------

--
-- Table structure for table `tblpetcheckup`
--

CREATE TABLE `tblpetcheckup` (
  `checkup_id` int(11) NOT NULL,
  `employee_id` int(11) NOT NULL,
  `pet_id` int(11) NOT NULL,
  `checkup_date` date NOT NULL,
  `checkup_time` time NOT NULL,
  `checkup_diagnosis` text NOT NULL,
  `checkup_summary` text NOT NULL,
  `chechup_fee` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tblpets`
--

CREATE TABLE `tblpets` (
  `pet_id` int(11) NOT NULL,
  `pet_data_id` text NOT NULL,
  `pet_name` text NOT NULL,
  `pet_type` int(11) NOT NULL,
  `pet_breed` int(11) NOT NULL,
  `pet_size` varchar(45) NOT NULL,
  `date_birth` date NOT NULL,
  `gender` varchar(45) NOT NULL,
  `pet_color` varchar(45) NOT NULL,
  `pet_image` text NOT NULL,
  `date_added` datetime NOT NULL,
  `customer_id` int(11) NOT NULL,
  `is_active` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblpets`
--

INSERT INTO `tblpets` (`pet_id`, `pet_data_id`, `pet_name`, `pet_type`, `pet_breed`, `pet_size`, `date_birth`, `gender`, `pet_color`, `pet_image`, `date_added`, `customer_id`, `is_active`) VALUES
(2, 'P1802111149553', 'Nimo', 1, 1, '3', '2016-05-17', 'female', '', '', '2018-02-11 23:50:33', 21, 0),
(3, 'P1802111152454', 'Lily', 1, 2, '2', '2016-05-16', 'female', '', '', '2018-02-11 23:53:17', 21, 1),
(4, 'P1802121206494', 'Vice Dragon', 1, 2, '5', '2010-06-15', 'male', '', '', '2018-02-12 00:11:22', 20, 1),
(5, 'P1802170830167', 'tine', 1, 2, '4', '2016-06-23', 'female', '', '', '2018-02-17 20:30:39', 15, 1),
(6, 'P1803111050360', 'Lara', 1, 1, '2', '2016-06-07', 'female', '', '', '2018-03-11 22:51:04', 18, 1),
(7, 'P1803111053138', 'Rey', 2, 5, '1', '2012-07-23', 'male', '', '', '2018-03-11 22:53:45', 16, 0);

-- --------------------------------------------------------

--
-- Table structure for table `tblpettype`
--

CREATE TABLE `tblpettype` (
  `pettype_id` int(11) NOT NULL,
  `pet_type` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblpettype`
--

INSERT INTO `tblpettype` (`pettype_id`, `pet_type`) VALUES
(1, 'Dog'),
(2, 'Cat'),
(3, 'Fish');

-- --------------------------------------------------------

--
-- Table structure for table `tblproductitems`
--

CREATE TABLE `tblproductitems` (
  `prod_item_id` int(11) NOT NULL,
  `item_name` varchar(45) NOT NULL,
  `item_price` decimal(10,2) NOT NULL,
  `item_qty` int(11) NOT NULL,
  `image` text NOT NULL,
  `is_active` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblproductitems`
--

INSERT INTO `tblproductitems` (`prod_item_id`, `item_name`, `item_price`, `item_qty`, `image`, `is_active`) VALUES
(1, 'Dog Lace', '50.00', 56, 'g4.jpg', 1),
(2, 'Dog Lace 2', '50.00', 110, '', 1),
(3, 'Cat lace', '55.00', 1000, '', 1),
(4, 'Cat Food (50mg)', '160.00', 102, '', 1),
(5, 'Cat Food (70mg)', '50.00', 107, '', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tblproductmedicines`
--

CREATE TABLE `tblproductmedicines` (
  `prod_med_id` int(11) NOT NULL,
  `drugtype_id` int(11) NOT NULL,
  `med_name` varchar(45) COLLATE hp8_bin NOT NULL,
  `med_price` decimal(10,2) NOT NULL,
  `med_qty` int(11) NOT NULL,
  `image` text CHARACTER SET latin1 NOT NULL,
  `is_active` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=hp8 COLLATE=hp8_bin;

--
-- Dumping data for table `tblproductmedicines`
--

INSERT INTO `tblproductmedicines` (`prod_med_id`, `drugtype_id`, `med_name`, `med_price`, `med_qty`, `image`, `is_active`) VALUES
(1, 1, 'Antibiotic A+B', '51.00', 11, 'cirrus.png', 1),
(2, 1, 'Antibiotic B', '444.00', 41, '', 1),
(3, 1, 'Antibiotic C', '444.00', 41, '', 1),
(4, 2, 'Vitamin C++', '300.00', 161, '', 1),
(5, 2, 'Carrots meds', '90.00', 555, '', 1),
(6, 3, 'HAHAHAA1', '300.00', 116, '', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tblsales`
--

CREATE TABLE `tblsales` (
  `sales_id` int(11) NOT NULL,
  `customer_type` varchar(45) NOT NULL,
  `customer_name` text NOT NULL,
  `customer_id` int(11) NOT NULL,
  `total_amount` text NOT NULL,
  `total_tax` text NOT NULL,
  `sales_total` text NOT NULL,
  `sales_date` datetime NOT NULL,
  `invoice_number` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblsales`
--

INSERT INTO `tblsales` (`sales_id`, `customer_type`, `customer_name`, `customer_id`, `total_amount`, `total_tax`, `sales_total`, `sales_date`, `invoice_number`) VALUES
(1, 'member', '', 20, '', '', '15', '0000-00-00 00:00:00', ''),
(2, 'member', '', 19, '', '', '618', '2018-03-07 13:19:16', ''),
(3, 'member', '', 19, '', '', '2', '2018-03-07 13:19:56', ''),
(4, 'walkin', '', 0, '', '', '3', '2018-03-07 13:22:45', ''),
(5, 'walkin', 'ivan 1', 0, '', '', '2', '2018-03-07 13:25:58', ''),
(6, 'member', '', 21, '', '', '1', '2018-03-07 13:27:01', ''),
(7, 'walkin', 'sdsd', 0, '', '', '619', '2018-03-07 13:28:08', ''),
(8, 'member', '', 21, '', '', '1', '2018-03-07 13:28:54', ''),
(9, 'member', '', 18, '', '', '7', '2018-03-07 13:29:27', ''),
(10, 'member', '', 21, '', '', '6', '2018-03-07 13:31:28', ''),
(11, 'walkin', 'sdsd', 0, '', '', '1,394.00', '2018-03-07 13:43:03', ''),
(12, 'member', '', 20, '', '', '1,081.00', '2018-03-07 13:58:57', ''),
(13, 'member', '', 18, '', '', '1,230.00', '2018-03-07 14:12:08', ''),
(14, 'member', '', 18, '', '', '1,183.00', '2018-03-08 15:55:01', ''),
(15, 'member', '', 20, '', '', '620.00', '2018-03-08 15:59:43', ''),
(16, 'member', 'Apple  David', 19, '', '', '2,485.00', '2018-03-08 16:08:57', ''),
(17, 'walkin', 'dsdsd', 0, '', '', '1,138.00', '2018-03-08 16:23:28', ''),
(18, 'walkin', 'dsdsd', 0, '', '', '1,138.00', '2018-03-08 16:24:02', ''),
(19, 'walkin', 'dsds', 0, '', '', '2,836.00', '2018-03-08 16:24:35', ''),
(20, 'walkin', 'dsds', 0, '', '', '2,836.00', '2018-03-08 16:26:10', ''),
(21, 'walkin', 'ds', 0, '', '', '680.00', '2018-03-08 16:26:39', ''),
(22, 'member', 'Terrence Bill Mendoza Romeo', 20, '', '', '1,613.00', '2018-03-08 16:29:05', ''),
(23, 'walkin', 'Carla jane', 0, '', '', '3,257.00', '2018-03-08 16:40:02', ''),
(24, 'walkin', 'dsd', 0, '', '', '564.00', '2018-03-08 16:42:49', ''),
(25, 'walkin', 'ds', 0, '', '', '723.00', '2018-03-08 16:43:44', ''),
(26, 'walkin', 'dsds', 0, '20.00', '20.00', '2,027.00', '2018-03-08 17:39:59', ''),
(27, 'member', 'Karla Rose Mayumi Dele Cruz', 21, '2.00', '2.00', '103.00', '2018-03-08 21:25:44', ''),
(28, 'member', 'Karla Rose Mayumi Dele Cruz', 21, '812.00', '16.00', '828.00', '2018-03-08 23:03:59', '#180308110359'),
(29, 'member', 'Jay Jay  Helterbrand', 18, '1,159.00', '24.00', '1,183.00', '2018-03-08 23:05:16', '#180308110516'),
(30, 'member', 'Terrence Bill Mendoza Romeo', 20, '1,805.00', '16.00', '1,821.00', '2018-03-08 23:06:02', '#180308110602'),
(31, 'walk in', 'ivan', 0, '750.00', '10.00', '760.00', '2018-03-08 23:07:25', '#180308110725'),
(32, 'member', 'Aldwin  Balagtas Labrador', 17, '1,191.00', '10.00', '1,201.00', '2018-03-08 23:14:03', '#180308111403'),
(33, 'walk in', 'ivan the ahhaha', 0, '1,503.00', '14.00', '1,517.00', '2018-03-08 23:17:38', '#180308111738'),
(34, 'member', 'Aldwin  Balagtas Labrador', 17, '1,693.00', '18.00', '1,711.00', '2018-03-08 23:25:15', '#180308112515'),
(35, 'member', 'Apple  David', 19, '5,894.00', '40.00', '5,934.00', '2018-03-09 02:29:57', '#180309022957'),
(36, 'member', 'Apple  David', 19, '800.00', '12.00', '812.00', '2018-03-09 02:46:23', '#180309024623'),
(37, 'walk in', 'iaisadadsadsad', 0, '1,288.00', '16.00', '1,304.00', '2018-03-09 02:49:03', '#180309024903'),
(38, 'walk in', 'sds', 0, '50.00', '2.00', '52.00', '2018-03-09 02:50:28', '#180309025028'),
(39, 'walk in', 'sdsdadfdfd', 0, '50.00', '2.00', '52.00', '2018-03-09 02:51:22', '#180309025122'),
(40, 'member', 'Terrence Bill Mendoza Romeo', 20, '150.00', '6.00', '156.00', '2018-03-09 03:17:20', '#180309031720'),
(41, 'walk in', 'dsds', 0, '520.00', '12.00', '532.00', '2018-03-09 03:17:47', '#180309031747'),
(42, 'member', 'Jay Jay  Helterbrand', 18, '1,810.00', '26.00', '1,836.00', '2018-03-10 23:19:23', '#180310111923'),
(43, 'walk in', 'ivan 2', 0, '420.00', '8.00', '428.00', '2018-03-11 14:49:21', '#180311024921'),
(44, 'walk in', '', 0, '200.00', '8.00', '208.00', '2018-03-11 14:54:49', '#180311025449'),
(45, 'walk in', '', 0, '1,218.00', '14.00', '1,232.00', '2018-03-11 23:35:55', '#180311113555'),
(46, 'walk in', 'Sarada Uchiha', 0, '1,320.00', '14.00', '1,334.00', '2018-03-11 23:36:33', '#180311113633'),
(47, 'walk in', 'das', 0, '630.00', '12.00', '642.00', '2018-03-18 00:09:00', '#180318120900'),
(48, 'walk in', 'dada', 0, '600.00', '8.00', '608.00', '2018-03-18 00:10:38', '#180318121038');

-- --------------------------------------------------------

--
-- Table structure for table `tblsales_detail`
--

CREATE TABLE `tblsales_detail` (
  `salesdetail_id` int(11) NOT NULL,
  `sales_id` int(11) NOT NULL,
  `product_type` varchar(45) NOT NULL,
  `product_name` text NOT NULL,
  `price_per_product` decimal(10,2) NOT NULL,
  `sales_quantity` int(11) NOT NULL,
  `total_per_product` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblsales_detail`
--

INSERT INTO `tblsales_detail` (`salesdetail_id`, `sales_id`, `product_type`, `product_name`, `price_per_product`, `sales_quantity`, `total_per_product`) VALUES
(1, 1, 'item', 'Dog Lace', '0.00', 5, '280.00'),
(2, 2, 'item', 'Cat Food (70mg)', '0.00', 6, '606.00'),
(3, 3, 'item', 'Cat Food (70mg)', '0.00', 6, '606.00'),
(4, 3, 'medicine', 'Antibiotic C', '0.00', 4, '1776.00'),
(5, 3, 'item', 'Dog Lace', '0.00', 5, '280.00'),
(6, 4, 'item', 'Cat Food (70mg)', '0.00', 6, '606.00'),
(7, 4, 'medicine', 'Antibiotic C', '0.00', 4, '1776.00'),
(8, 4, 'item', 'Dog Lace', '0.00', 5, '280.00'),
(9, 4, 'service', 'Nail Cutting (Big Breed)', '0.00', 3, '450.00'),
(10, 5, 'item', 'Dog Lace', '0.00', 5, '280.00'),
(11, 5, 'item', 'Cat Food (70mg)', '0.00', 2, '202.00'),
(12, 5, 'medicine', 'Vitamin C++', '0.00', 5, '1500.00'),
(13, 5, 'service', 'Nail Cutting (Big Breed)', '0.00', 1, '150.00'),
(14, 6, 'item', 'Cat Food (70mg)', '0.00', 5, '505.00'),
(15, 6, 'item', 'Cat Food (50mg)', '0.00', 5, '510.00'),
(16, 7, 'item', 'Cat Food (70mg)', '0.00', 5, '505.00'),
(17, 7, 'item', 'Cat Food (50mg)', '0.00', 1, '102.00'),
(18, 8, 'item', 'Cat Food (70mg)', '0.00', 5, '505.00'),
(19, 8, 'item', 'Cat Food (50mg)', '0.00', 5, '510.00'),
(20, 9, 'item', 'Cat Food (70mg)', '0.00', 5, '505.00'),
(21, 9, 'item', 'Cat Food (50mg)', '0.00', 2, '204.00'),
(22, 9, 'item', 'Cat lace', '0.00', 7, '7000.00'),
(23, 10, 'item', 'Cat lace', '0.00', 6, '6000.00'),
(24, 10, 'item', 'Dog Lace', '0.00', 7, '392.00'),
(25, 10, 'item', 'Cat Food (70mg)', '0.00', 1, '101.00'),
(26, 11, 'item', 'Cat Food (70mg)', '0.00', 6, '606.00'),
(27, 11, 'item', 'Cat Food (50mg)', '0.00', 3, '306.00'),
(28, 11, 'item', 'Dog Lace', '0.00', 8, '448.00'),
(29, 12, 'item', 'Cat Food (70mg)', '0.00', 7, '707.00'),
(30, 12, 'item', 'Cat Food (50mg)', '0.00', 2, '204.00'),
(31, 12, 'service', 'Nail Cutting (Big Breed)', '0.00', 1, '150.00'),
(32, 13, 'item', 'Cat Food (70mg)', '0.00', 6, '606.00'),
(33, 13, 'item', 'Cat Food (50mg)', '0.00', 5, '510.00'),
(34, 13, 'medicine', 'Carrots meds', '0.00', 1, '90.00'),
(35, 14, 'item', 'Cat Food (70mg)', '0.00', 5, '505.00'),
(36, 14, 'item', 'Cat Food (50mg)', '0.00', 2, '204.00'),
(37, 14, 'medicine', 'Carrots meds', '0.00', 5, '450.00'),
(38, 15, 'item', 'Cat Food (70mg)', '0.00', 4, '404.00'),
(39, 15, 'item', 'Cat Food (50mg)', '0.00', 2, '204.00'),
(40, 16, 'item', 'Cat Food (70mg)', '0.00', 5, '505.00'),
(41, 16, 'item', 'Cat Food (50mg)', '0.00', 5, '510.00'),
(42, 16, 'item', 'Dog Lace 2', '0.00', 1, '110.00'),
(43, 16, 'medicine', 'Antibiotic B', '0.00', 3, '1332.00'),
(44, 17, 'item', 'Cat Food (70mg)', '0.00', 6, '606.00'),
(45, 17, 'item', 'Cat Food (50mg)', '0.00', 5, '510.00'),
(46, 19, 'item', 'Cat Food (70mg)', '0.00', 6, '606.00'),
(47, 19, 'item', 'Cat Food (50mg)', '0.00', 1, '102.00'),
(48, 19, 'medicine', 'HAHAHAA1', '0.00', 7, '2100.00'),
(49, 21, 'medicine', 'Carrots meds', '0.00', 4, '360.00'),
(50, 21, 'item', 'Cat Food (50mg)', '0.00', 3, '306.00'),
(51, 22, 'medicine', 'HAHAHAA1', '0.00', 5, '1500.00'),
(52, 22, 'item', 'Cat Food (70mg)', '0.00', 1, '101.00'),
(53, 23, 'item', 'Cat Food (70mg)', '0.00', 5, '505.00'),
(54, 23, 'item', 'Cat Food (50mg)', '0.00', 2, '204.00'),
(55, 23, 'medicine', 'Antibiotic B', '0.00', 5, '2220.00'),
(56, 23, 'service', 'Nail Cutting (Big Breed)', '0.00', 2, '300.00'),
(57, 24, 'item', 'Cat Food (70mg)', '0.00', 4, '404.00'),
(58, 24, 'service', 'Nail Cutting (Big Breed)', '0.00', 1, '150.00'),
(59, 25, 'item', 'Cat Food (70mg)', '0.00', 5, '505.00'),
(60, 25, 'item', 'Cat Food (50mg)', '0.00', 2, '204.00'),
(61, 26, 'item', 'Cat Food (70mg)', '0.00', 3, '303.00'),
(62, 26, 'item', 'Cat Food (50mg)', '0.00', 2, '204.00'),
(63, 26, 'medicine', 'Vitamin C++', '0.00', 5, '1500.00'),
(64, 27, 'item', 'Cat Food (70mg)', '0.00', 1, '101.00'),
(65, 28, 'item', 'Cat Food (70mg)', '0.00', 4, '404.00'),
(66, 28, 'item', 'Cat Food (50mg)', '0.00', 4, '408.00'),
(67, 29, 'item', 'Cat Food (70mg)', '0.00', 5, '505.00'),
(68, 29, 'item', 'Cat Food (50mg)', '0.00', 2, '204.00'),
(69, 29, 'medicine', 'Carrots meds', '0.00', 5, '450.00'),
(70, 30, 'item', 'Cat Food (70mg)', '0.00', 5, '505.00'),
(71, 30, 'service', 'Nail Cutting (Big Breed)', '0.00', 2, '300.00'),
(72, 30, 'item', 'Cat lace', '0.00', 1, '1000.00'),
(73, 31, 'service', 'Nail Cutting (Big Breed)', '0.00', 5, '750.00'),
(74, 32, 'item', 'Cat Food (70mg)', '0.00', 3, '303.00'),
(75, 32, 'medicine', 'Antibiotic B', '0.00', 2, '888.00'),
(76, 33, 'item', 'Cat Food (70mg)', '0.00', 3, '303.00'),
(77, 33, 'medicine', 'Vitamin C++', '0.00', 4, '1200.00'),
(78, 34, 'item', 'Cat Food (70mg)', '0.00', 5, '505.00'),
(79, 34, 'service', 'Nail Cutting (Big Breed)', '0.00', 2, '300.00'),
(80, 34, 'medicine', 'Antibiotic C', '0.00', 2, '888.00'),
(81, 35, 'item', 'Cat Food (70mg)', '0.00', 2, '202.00'),
(82, 35, 'item', 'Cat Food (50mg)', '0.00', 2, '204.00'),
(83, 35, 'item', 'Cat lace', '0.00', 2, '2000.00'),
(84, 35, 'item', 'Dog Lace 2', '0.00', 2, '220.00'),
(85, 35, 'item', 'Dog Lace', '0.00', 2, '112.00'),
(86, 35, 'medicine', 'HAHAHAA1', '0.00', 2, '600.00'),
(87, 35, 'medicine', 'Carrots meds', '0.00', 2, '180.00'),
(88, 35, 'medicine', 'Vitamin C++', '0.00', 2, '600.00'),
(89, 35, 'medicine', 'Antibiotic C', '0.00', 2, '888.00'),
(90, 35, 'medicine', 'Antibiotic B', '0.00', 2, '888.00'),
(91, 36, 'item', 'Cat Food (70mg)', '50.00', 4, '200.00'),
(92, 36, 'medicine', 'HAHAHAA1', '300.00', 2, '600.00'),
(93, 37, 'item', 'Cat Food (70mg)', '50.00', 5, '250.00'),
(94, 37, 'service', 'Nail Cutting (Big Breed)', '150.00', 1, '150.00'),
(95, 37, 'medicine', 'Antibiotic C', '444.00', 2, '888.00'),
(96, 38, 'item', 'Cat Food (70mg)', '50.00', 1, '50.00'),
(97, 39, 'item', 'Cat Food (70mg)', '50.00', 1, '50.00'),
(98, 40, 'item', 'Cat Food (70mg)', '50.00', 3, '150.00'),
(99, 41, 'item', 'Cat Food (70mg)', '50.00', 4, '200.00'),
(100, 41, 'item', 'Cat Food (50mg)', '160.00', 2, '320.00'),
(101, 42, 'item', 'Cat Food (70mg)', '50.00', 5, '250.00'),
(102, 42, 'item', 'Cat Food (50mg)', '160.00', 3, '480.00'),
(103, 42, 'medicine', 'HAHAHAA1', '300.00', 3, '900.00'),
(104, 42, 'medicine', 'Carrots meds', '90.00', 2, '180.00'),
(105, 43, 'item', 'Cat Food (70mg)', '50.00', 2, '100.00'),
(106, 43, 'item', 'Cat Food (50mg)', '160.00', 2, '320.00'),
(107, 44, 'item', 'Cat Food (70mg)', '50.00', 4, '200.00'),
(108, 45, 'item', 'Cat Food (70mg)', '50.00', 3, '150.00'),
(109, 45, 'medicine', 'Carrots meds', '90.00', 2, '180.00'),
(110, 45, 'medicine', 'Antibiotic B', '444.00', 2, '888.00'),
(111, 46, 'item', 'Cat Food (70mg)', '50.00', 2, '100.00'),
(112, 46, 'item', 'Cat Food (50mg)', '160.00', 2, '320.00'),
(113, 46, 'medicine', 'HAHAHAA1', '300.00', 3, '900.00'),
(114, 47, 'item', 'Cat Food (70mg)', '50.00', 3, '150.00'),
(115, 47, 'item', 'Cat Food (50mg)', '160.00', 3, '480.00'),
(116, 48, 'service', 'Nail Cutting (Big Breed)', '150.00', 4, '600.00');

-- --------------------------------------------------------

--
-- Table structure for table `tblserviceoffered`
--

CREATE TABLE `tblserviceoffered` (
  `service_id` int(11) NOT NULL,
  `service_name` varchar(45) NOT NULL,
  `service_fee` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tblserviceprovided`
--

CREATE TABLE `tblserviceprovided` (
  `serviceprovided_id` int(11) NOT NULL,
  `service_id` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `pet_id` varchar(45) NOT NULL,
  `service_date_provided` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tblservices`
--

CREATE TABLE `tblservices` (
  `service_id` int(11) NOT NULL,
  `servicetype_id` int(11) NOT NULL,
  `service_name` varchar(45) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `service_description` text NOT NULL,
  `is_active` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblservices`
--

INSERT INTO `tblservices` (`service_id`, `servicetype_id`, `service_name`, `price`, `service_description`, `is_active`) VALUES
(1, 1, 'Nail Cutting (Smal Breed)', '74.00', 'nail cutting for small breeds', 0),
(2, 1, 'Nail Cutting (Big Breed)', '150.00', 'Nail Cutting for Big Breeds\r\n', 1),
(3, 2, 'Deworming (Big Breads)', '250.00', 'Deworming for Big Breads ', 0),
(4, 2, 'Deworming (Small Breads)', '200.00', 'Deworming for Small Breads', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tblservicetype`
--

CREATE TABLE `tblservicetype` (
  `servicetype_id` int(11) NOT NULL,
  `servicetype_name` varchar(45) NOT NULL,
  `servicetype_description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblservicetype`
--

INSERT INTO `tblservicetype` (`servicetype_id`, `servicetype_name`, `servicetype_description`) VALUES
(1, 'Grooming', 'Grooming includes the following services'),
(2, 'Deworming', 'To eliminate worm infestation');

-- --------------------------------------------------------

--
-- Table structure for table `tblsystemsettings`
--

CREATE TABLE `tblsystemsettings` (
  `systemsetting_id` int(11) NOT NULL,
  `system_name` varchar(45) NOT NULL,
  `system_logo` text NOT NULL,
  `color_skin` varchar(45) NOT NULL,
  `background_color` varchar(45) NOT NULL,
  `login_photo_admin` text NOT NULL,
  `login_photo_employee` text NOT NULL,
  `login_photo_customer` text NOT NULL,
  `mission` text NOT NULL,
  `company_contact` varchar(45) NOT NULL,
  `company_address` varchar(45) NOT NULL,
  `company_telephone` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblsystemsettings`
--

INSERT INTO `tblsystemsettings` (`systemsetting_id`, `system_name`, `system_logo`, `color_skin`, `background_color`, `login_photo_admin`, `login_photo_employee`, `login_photo_customer`, `mission`, `company_contact`, `company_address`, `company_telephone`) VALUES
(1, 'Vetopia', 'vet4.png', 'skin-green', '#008d4c', 'carousel-stateoftheart1.jpg', 'b22.jpg', 'carousel-fish.jpg', 'Generally, the import section of phpMyAdmin is used to import or restore the database from a SQL file. Like phpMyAdmin, there are various options are available to restore the tables of MySQL database. To import SQL file in the database, you need to login to your hosting server or phpMyAdmin. Also, you can restore the database from PHP script without login to your hosting server or phpMyAdmin.\r\n\r\nRestore database from PHP script is very useful when you want to allow the user to restore the database from your web application. A backup of the database needs to be taken for importing tables in MySQL database. In this tutorial, we will show you how to import and restore the database from SQL file using PHP. Our simple PHP script helps to restore MySQL database from SQL file.                                                                                                                                                                                                                                                                   ', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_petdiagnosis`
--

CREATE TABLE `tbl_petdiagnosis` (
  `diagnosis_id` int(11) NOT NULL,
  `diagnosis_data_id` text NOT NULL,
  `employee_user_id` text NOT NULL,
  `customer_user_id` text NOT NULL,
  `pet_id` int(11) NOT NULL,
  `pet_data_id` text NOT NULL,
  `subject` text NOT NULL,
  `objective` text NOT NULL,
  `assessment` text NOT NULL,
  `plan` text NOT NULL,
  `diagnosis_date` datetime NOT NULL,
  `body_weight` varchar(45) NOT NULL,
  `body_temperature` varchar(45) NOT NULL,
  `service_fee` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_petdiagnosis`
--

INSERT INTO `tbl_petdiagnosis` (`diagnosis_id`, `diagnosis_data_id`, `employee_user_id`, `customer_user_id`, `pet_id`, `pet_data_id`, `subject`, `objective`, `assessment`, `plan`, `diagnosis_date`, `body_weight`, `body_temperature`, `service_fee`) VALUES
(1, 'D1803171122082', 'V1803111218034', 'C1802110330352', 6, 'P1803111050360', 'dadas', 'adasd', 'asdasd', 'adada', '2018-03-17 23:22:19', '44', '44', '588.00'),
(2, 'D1803171131003', 'V1803111218034', 'C1802110330352', 6, 'P1803111050360', 'dadsad', 'dada', 'sdada', 'sadad', '2018-03-17 23:31:13', '33', '44', '555.00'),
(3, 'D1803171156107', 'V1803171052333', 'C1802110330352', 6, 'P1803111050360', 'dasda', 'dasdad', 'ada', 'dadasd', '2018-03-17 23:56:29', '33', '44', '333.00'),
(4, 'D1803181231190', 'V1803171052333', 'C1802110323006', 5, 'P1802170830167', 'asdsad', 'adad', 'adad', 'asdad', '2018-03-18 00:31:19', '33', '44', '555.00'),
(5, 'D1803181238299', 'V1803171052333', 'C1802110330352', 6, 'P1803111050360', 'dasdsad', 'adasd', 'sada', 'dad', '2018-03-18 00:38:29', '44', '44', '222.00');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbladmins`
--
ALTER TABLE `tbladmins`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `tblappointments`
--
ALTER TABLE `tblappointments`
  ADD PRIMARY KEY (`appointment_id`);

--
-- Indexes for table `tblcolorskins`
--
ALTER TABLE `tblcolorskins`
  ADD PRIMARY KEY (`colorskin_id`);

--
-- Indexes for table `tblcustomers`
--
ALTER TABLE `tblcustomers`
  ADD PRIMARY KEY (`customer_id`);

--
-- Indexes for table `tbldrugprescribed`
--
ALTER TABLE `tbldrugprescribed`
  ADD PRIMARY KEY (`drugprescribed_id`);

--
-- Indexes for table `tbldrugtype`
--
ALTER TABLE `tbldrugtype`
  ADD PRIMARY KEY (`drugtype_id`);

--
-- Indexes for table `tblemployees`
--
ALTER TABLE `tblemployees`
  ADD PRIMARY KEY (`employee_id`);

--
-- Indexes for table `tblimagegallery`
--
ALTER TABLE `tblimagegallery`
  ADD PRIMARY KEY (`image_id`);

--
-- Indexes for table `tblinventoryforitems`
--
ALTER TABLE `tblinventoryforitems`
  ADD PRIMARY KEY (`inv_item_id`);

--
-- Indexes for table `tblinventoryformedicines`
--
ALTER TABLE `tblinventoryformedicines`
  ADD PRIMARY KEY (`inv_med_id`);

--
-- Indexes for table `tblpetbreed`
--
ALTER TABLE `tblpetbreed`
  ADD PRIMARY KEY (`breed_id`);

--
-- Indexes for table `tblpetcheckup`
--
ALTER TABLE `tblpetcheckup`
  ADD PRIMARY KEY (`checkup_id`);

--
-- Indexes for table `tblpets`
--
ALTER TABLE `tblpets`
  ADD PRIMARY KEY (`pet_id`);

--
-- Indexes for table `tblpettype`
--
ALTER TABLE `tblpettype`
  ADD PRIMARY KEY (`pettype_id`);

--
-- Indexes for table `tblproductitems`
--
ALTER TABLE `tblproductitems`
  ADD PRIMARY KEY (`prod_item_id`);

--
-- Indexes for table `tblproductmedicines`
--
ALTER TABLE `tblproductmedicines`
  ADD PRIMARY KEY (`prod_med_id`);

--
-- Indexes for table `tblsales`
--
ALTER TABLE `tblsales`
  ADD PRIMARY KEY (`sales_id`);

--
-- Indexes for table `tblsales_detail`
--
ALTER TABLE `tblsales_detail`
  ADD PRIMARY KEY (`salesdetail_id`);

--
-- Indexes for table `tblserviceoffered`
--
ALTER TABLE `tblserviceoffered`
  ADD PRIMARY KEY (`service_id`);

--
-- Indexes for table `tblserviceprovided`
--
ALTER TABLE `tblserviceprovided`
  ADD PRIMARY KEY (`serviceprovided_id`);

--
-- Indexes for table `tblservices`
--
ALTER TABLE `tblservices`
  ADD PRIMARY KEY (`service_id`);

--
-- Indexes for table `tblservicetype`
--
ALTER TABLE `tblservicetype`
  ADD PRIMARY KEY (`servicetype_id`);

--
-- Indexes for table `tblsystemsettings`
--
ALTER TABLE `tblsystemsettings`
  ADD PRIMARY KEY (`systemsetting_id`);

--
-- Indexes for table `tbl_petdiagnosis`
--
ALTER TABLE `tbl_petdiagnosis`
  ADD PRIMARY KEY (`diagnosis_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbladmins`
--
ALTER TABLE `tbladmins`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `tblappointments`
--
ALTER TABLE `tblappointments`
  MODIFY `appointment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `tblcolorskins`
--
ALTER TABLE `tblcolorskins`
  MODIFY `colorskin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `tblcustomers`
--
ALTER TABLE `tblcustomers`
  MODIFY `customer_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
--
-- AUTO_INCREMENT for table `tbldrugprescribed`
--
ALTER TABLE `tbldrugprescribed`
  MODIFY `drugprescribed_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tbldrugtype`
--
ALTER TABLE `tbldrugtype`
  MODIFY `drugtype_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `tblemployees`
--
ALTER TABLE `tblemployees`
  MODIFY `employee_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT for table `tblimagegallery`
--
ALTER TABLE `tblimagegallery`
  MODIFY `image_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `tblinventoryforitems`
--
ALTER TABLE `tblinventoryforitems`
  MODIFY `inv_item_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;
--
-- AUTO_INCREMENT for table `tblinventoryformedicines`
--
ALTER TABLE `tblinventoryformedicines`
  MODIFY `inv_med_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=68;
--
-- AUTO_INCREMENT for table `tblpetbreed`
--
ALTER TABLE `tblpetbreed`
  MODIFY `breed_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `tblpetcheckup`
--
ALTER TABLE `tblpetcheckup`
  MODIFY `checkup_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tblpets`
--
ALTER TABLE `tblpets`
  MODIFY `pet_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `tblpettype`
--
ALTER TABLE `tblpettype`
  MODIFY `pettype_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `tblproductitems`
--
ALTER TABLE `tblproductitems`
  MODIFY `prod_item_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `tblproductmedicines`
--
ALTER TABLE `tblproductmedicines`
  MODIFY `prod_med_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `tblsales`
--
ALTER TABLE `tblsales`
  MODIFY `sales_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;
--
-- AUTO_INCREMENT for table `tblsales_detail`
--
ALTER TABLE `tblsales_detail`
  MODIFY `salesdetail_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=117;
--
-- AUTO_INCREMENT for table `tblserviceoffered`
--
ALTER TABLE `tblserviceoffered`
  MODIFY `service_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tblserviceprovided`
--
ALTER TABLE `tblserviceprovided`
  MODIFY `serviceprovided_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tblservices`
--
ALTER TABLE `tblservices`
  MODIFY `service_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `tblservicetype`
--
ALTER TABLE `tblservicetype`
  MODIFY `servicetype_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `tblsystemsettings`
--
ALTER TABLE `tblsystemsettings`
  MODIFY `systemsetting_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `tbl_petdiagnosis`
--
ALTER TABLE `tbl_petdiagnosis`
  MODIFY `diagnosis_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
