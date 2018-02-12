-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 12, 2018 at 04:40 PM
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
(15, 'C1802110323006', 'Christine', 'Batacan', 'Domingo', 'Makait', '090911212112', '09111', 'christinedomingo@gmail.com', '', 'female', 1, 'christinedomingo', '2018-02-11 15:24:33', '1995-06-06'),
(16, 'C1802110324497', 'Rey Vincent Phillip', 'Dineros', 'Villaver', 'Brgy. Olimpia Makati City', '090911212112', '090911', 'rvpvillaver@gmail.com', '', 'male', 0, 'rvpvillaver', '2018-02-11 15:28:45', '1995-06-06'),
(17, 'C1802110328459', 'Aldwin ', 'Balagtas', 'Labrador', 'Cavite', '90093343434', '09111', 'A8labrador@gmail.com', '', 'male', 1, 'A8labrador', '2018-02-11 15:30:35', '1995-09-19'),
(18, 'C1802110330352', 'Jay Jay', '', 'Helterbrand', 'Brgy. Ginebra San Miguel', '090911212112', '090911', 'mr.fast13@gmail.com', '', 'male', 1, 'mr.fast13', '2018-02-11 15:31:54', '1976-06-15'),
(19, 'C1802110331543', 'Apple', '', 'David', 'Central City', '90093343434', '09111', 'appledavid@gmail.com', '', 'female', 1, 'appledavid', '2018-02-11 15:32:46', '1993-01-20'),
(20, 'C1802111139284', 'Terrence Bill', 'Mendoza', 'Romeo', 'Global City', '0907777777227', '7777', 'TRomeo@gmail.com', '', 'male', 1, 'TRomeo', '2018-02-11 23:40:39', '1992-05-17'),
(21, 'C1802111144176', 'Karla Rose', 'Mayumi', 'Dele Cruz', 'Central City', '09121212121', '090911', 'karlarose@gmail.com', '', 'female', 1, 'karlarose', '2018-02-11 23:45:18', '1998-06-23');

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
(11, 'V1802121253177', 'vet', 'John', 'Hernandez', 'Villete', 'jvillete@gmail.com', '090911212112', '090911', 'Makait', '', 'jvillete', 'male', 1, '1995-06-14', '2018-02-12 00:54:00'),
(12, 'S1802121254076', 'staff', 'John Rey', 'Gulo', 'Cruz', 'johnrey@gmail.com', '90093343434', '090911', 'Central City', '', 'johnrey', 'male', 1, '1989-05-17', '2018-02-12 00:55:17');

-- --------------------------------------------------------

--
-- Table structure for table `tblinventoryforitems`
--

CREATE TABLE `tblinventoryforitems` (
  `inv_item_id` int(11) NOT NULL,
  `user_type` varchar(45) NOT NULL,
  `user_id` int(11) NOT NULL,
  `action` varchar(45) NOT NULL,
  `product_item_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `inventory_date` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblinventoryforitems`
--

INSERT INTO `tblinventoryforitems` (`inv_item_id`, `user_type`, `user_id`, `action`, `product_item_id`, `quantity`, `inventory_date`) VALUES
(1, 'Admin', 2, 'Add Product', 2, 101, 1514904600),
(2, 'Admin', 2, 'Update Quantity', 1, 102, 1514914567),
(3, 'Admin', 2, 'Update Quantity', 2, 110, 1514914605),
(4, 'Admin', 5, 'Add Product', 3, 1000, 1518371891);

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
  `inventory_date` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblinventoryformedicines`
--

INSERT INTO `tblinventoryformedicines` (`inv_med_id`, `user_type`, `user_id`, `action`, `product_med_id`, `quantity`, `inventory_date`) VALUES
(1, 'Admin', 2, 'Add Product', 3, 41, 1514822057),
(2, 'Admin', 2, 'Update Quantity', 1, 11, 1514974347);

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
(4, 'P1802121206494', 'Vice Dragon', 1, 2, '5', '2010-06-15', 'male', '', '', '2018-02-12 00:11:22', 20, 1);

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
(1, 'Dog Lace', '50.00', 102, 'g4.jpg', 1),
(2, 'Dog Lace 2', '50.00', 110, '', 1),
(3, 'Cat lace', '55.00', 1000, '', 1);

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
(3, 1, 'Antibiotic C', '444.00', 41, '', 1);

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
  `add_to_store` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tblservicetype`
--

CREATE TABLE `tblservicetype` (
  `servicetype_id` int(11) NOT NULL,
  `servicetype_name` varchar(45) NOT NULL,
  `servicetype_description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
  `login_photo_customer` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblsystemsettings`
--

INSERT INTO `tblsystemsettings` (`systemsetting_id`, `system_name`, `system_logo`, `color_skin`, `background_color`, `login_photo_admin`, `login_photo_employee`, `login_photo_customer`) VALUES
(1, 'Vetopia', 'vet4.png', 'skin-green', '#008d4c', 'carousel-stateoftheart1.jpg', 'b22.jpg', 'carousel-fish.jpg');

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
  MODIFY `appointment_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tblcolorskins`
--
ALTER TABLE `tblcolorskins`
  MODIFY `colorskin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `tblcustomers`
--
ALTER TABLE `tblcustomers`
  MODIFY `customer_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
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
  MODIFY `employee_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `tblinventoryforitems`
--
ALTER TABLE `tblinventoryforitems`
  MODIFY `inv_item_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `tblinventoryformedicines`
--
ALTER TABLE `tblinventoryformedicines`
  MODIFY `inv_med_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
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
  MODIFY `pet_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `tblpettype`
--
ALTER TABLE `tblpettype`
  MODIFY `pettype_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `tblproductitems`
--
ALTER TABLE `tblproductitems`
  MODIFY `prod_item_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `tblproductmedicines`
--
ALTER TABLE `tblproductmedicines`
  MODIFY `prod_med_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
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
  MODIFY `service_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tblservicetype`
--
ALTER TABLE `tblservicetype`
  MODIFY `servicetype_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tblsystemsettings`
--
ALTER TABLE `tblsystemsettings`
  MODIFY `systemsetting_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;