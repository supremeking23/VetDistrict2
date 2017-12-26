-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 26, 2017 at 03:07 PM
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
-- Database: `vetdistrictweb1`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbladmins`
--

CREATE TABLE `tbladmins` (
  `admin_id` int(11) NOT NULL,
  `first_name` varchar(45) NOT NULL,
  `middle_name` varchar(45) NOT NULL,
  `last_name` varchar(45) NOT NULL,
  `gender` varchar(45) NOT NULL,
  `date_birth` date NOT NULL,
  `cellphone` text NOT NULL,
  `telephone` text NOT NULL,
  `address` text NOT NULL,
  `date_added` int(11) NOT NULL,
  `email` text NOT NULL,
  `password` text NOT NULL,
  `is_active` int(11) NOT NULL,
  `image` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbladmins`
--

INSERT INTO `tbladmins` (`admin_id`, `first_name`, `middle_name`, `last_name`, `gender`, `date_birth`, `cellphone`, `telephone`, `address`, `date_added`, `email`, `password`, `is_active`, `image`) VALUES
(1, 'Ernesto', 'Dimayuga', 'Enrile', 'male', '1986-05-12', '090911212112', '09111', 'Makait', 1514096346, 'icjfuncion@gmail.com', '1234', 1, '21740072_758328241017235_7088747667943620100_n.png');

-- --------------------------------------------------------

--
-- Table structure for table `tblappointments`
--

CREATE TABLE `tblappointments` (
  `appointment_id` int(11) NOT NULL,
  `customer_name` text NOT NULL,
  `pet_name` varchar(45) NOT NULL,
  `appointment_date` date NOT NULL,
  `appointment_time` time NOT NULL,
  `date_created` datetime NOT NULL,
  `appointment_reason` text NOT NULL,
  `is_cancelled` int(11) NOT NULL,
  `cancellation_reason` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tblcustomers`
--

CREATE TABLE `tblcustomers` (
  `customer_id` int(11) NOT NULL,
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
  `date_added` int(11) NOT NULL,
  `date_birth` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblcustomers`
--

INSERT INTO `tblcustomers` (`customer_id`, `first_name`, `middle_name`, `last_name`, `address`, `cellphone`, `telephone`, `email`, `image`, `gender`, `is_active`, `password`, `date_added`, `date_birth`) VALUES
(1, 'IVan', '', 'Johnson', 'Makait', '4343', '343', '4343', 'Capture_11.PNG', 'male', 1, '', 1513793545, '2003-01-06'),
(2, 'ivan', 'ivan', 'ivan', '6464646', '666', '66', 'ivanchristianjayfuncion@yahoo.com.ph', '', 'male', 1, '123', 1513793634, '1991-06-18'),
(3, 'Lordes\'s', 'dsds', 'dsds', '444', '444', '44', '44', '', 'male', 1, '4', 1513794430, '2017-12-05'),
(4, 'wewe', 'wewe', 'wew', '343', '343', 'wew', '343', '', 'male', 0, '33', 1513794478, '2017-12-08'),
(5, 'rere', 'er', 'ere', '454', '454', '454', '545', '', 'female', 1, '454', 1513794573, '2017-12-13'),
(6, 'rer', '', '', '', '', '', '', '', '', 1, '', 1513834391, '0000-00-00'),
(7, 'rereerer', 'erereeerer', '', '', '', '', '', '', '', 1, '', 1513835373, '0000-00-00'),
(8, '\'/dsdsere', 'dsds', 'dsds', '2323', '2323', '<?script>alert(\'haha\');</script>', 'ivanchristianjayfuncion@yahoo.com.ph', 'AGAIN.PNG', 'male', 1, '233', 1513854612, '2017-12-05'),
(9, 'hehehehhe', 'Sdsd', 'dsd', '', '', 'ss', '', '', 'male', 1, '', 1513945682, '2017-12-04');

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
(1, 'antibiotic');

-- --------------------------------------------------------

--
-- Table structure for table `tblemployees`
--

CREATE TABLE `tblemployees` (
  `employee_id` int(11) NOT NULL,
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
  `date_added` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblemployees`
--

INSERT INTO `tblemployees` (`employee_id`, `employee_type`, `first_name`, `middle_name`, `last_name`, `email`, `cellphone`, `telephone`, `address`, `image`, `password`, `gender`, `is_active`, `date_birth`, `date_added`) VALUES
(1, 'staff', 'John', 'Sniper', 'Snipes', 'wes@gmail.com', '090911212112', '09111', 'Makait', '21740072_758328241017235_7088747667943620100_n3.png', '1234', 'male', 1, '1997-06-17', 1513834245),
(2, 'staff', 'Tony', 'Miranda', 'Dela Criz', 'tonydelaa@gmail.com', '90093343434', '33s', 'Alaska Milkmen', 'AGAIN.PNG', '333', 'male', 1, '2017-12-12', 1513834357),
(3, 'staff', 'Ivan Christian Jay ', 'Echanes', 'Funcion', 'icjfuncion@gmail.com', '090911212112', '911', 'Makait', 'soil_m.jpg', '33333', 'male', 1, '1995-11-23', 1513834465),
(4, 'vet', 'fdfe', 'rer', 'erer', '34343', '3434', 'erer', '3434', '', '3', 'male', 1, '2017-12-19', 1513834504),
(5, 'staff', 'Lordes\'s', 'dsd', 'sdsd', '333333', '3434', '3434', '3434', '', '34343', 'female', 1, '2017-11-27', 1513841712),
(6, 'vet', 'dsd', 'Sds', 'Sns', 's', 's', 'd', 'd', '', 'd', 'male', 1, '2017-12-14', 1513945232),
(7, 'staff', 'dsdsds', 'Sds', 'Ss', 's', 's', 'ds', 's', 'DSC_0692.JPG', 's', 'female', 1, '1999-07-22', 1513945255);

-- --------------------------------------------------------

--
-- Table structure for table `tblinstoreproducts`
--

CREATE TABLE `tblinstoreproducts` (
  `instoreproduct_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
(4, 'Tilapya', 3);

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
  `pet_name` text NOT NULL,
  `pet_type` int(11) NOT NULL,
  `pet_breed` int(11) NOT NULL,
  `pet_size` varchar(45) NOT NULL,
  `date_birth` datetime NOT NULL,
  `gender` varchar(45) NOT NULL,
  `pet_image` text NOT NULL,
  `date_added` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `is_active` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblpets`
--

INSERT INTO `tblpets` (`pet_id`, `pet_name`, `pet_type`, `pet_breed`, `pet_size`, `date_birth`, `gender`, `pet_image`, `date_added`, `customer_id`, `is_active`) VALUES
(1, 'Rica', 1, 1, '2', '2015-05-11 00:00:00', 'female', '', 1514184327, 1, 1),
(2, 'Hha', 1, 1, '3', '2013-02-12 00:00:00', 'female', '', 1514184327, 1, 1),
(3, 'Ashley', 2, 3, '2.4', '2013-01-15 00:00:00', 'female', '', 1514215656, 3, 1),
(4, 'hahahhaasdsdsda', 1, 2, '13', '2016-06-15 00:00:00', 'male', '', 1514220010, 5, 1),
(5, 'sds', 1, 1, '2', '2012-02-23 00:00:00', 'male', '', 1514220053, 1, 1),
(6, 'aa', 1, 1, '2.4', '2017-12-03 00:00:00', 'male', '', 1514220109, 1, 1),
(7, 'k11', 2, 3, '13', '2007-06-13 00:00:00', 'female', '', 1514220170, 5, 1),
(8, 'has', 1, 1, '2.4', '2015-01-13 00:00:00', 'male', '', 1514220234, 1, 1),
(9, 'karla', 2, 3, '2.4', '2014-06-26 00:00:00', 'female', '', 1514220342, 4, 1),
(10, 'Nimo', 3, 4, '2.4', '2016-05-16 00:00:00', 'male', '', 1514274398, 5, 1);

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
-- Table structure for table `tblproductinwarehouse`
--

CREATE TABLE `tblproductinwarehouse` (
  `productinwarehouse_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tblpurchase`
--

CREATE TABLE `tblpurchase` (
  `purchase_id` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `total_price` double(10,2) NOT NULL,
  `final_price` double(10,2) NOT NULL,
  `date_purchased` datetime NOT NULL,
  `over_all_quantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tblservices`
--

CREATE TABLE `tblservices` (
  `service_id` int(11) NOT NULL,
  `service_offer` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbltransaction`
--

CREATE TABLE `tbltransaction` (
  `transaction_id` int(11) NOT NULL,
  `drug_id` int(11) NOT NULL,
  `employee_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `transfer_from` varchar(45) NOT NULL,
  `transfet_to` varchar(45) NOT NULL,
  `date_transfer` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbproducts`
--

CREATE TABLE `tbproducts` (
  `product_id` int(11) NOT NULL,
  `product_type_id` int(11) NOT NULL,
  `product_code` text NOT NULL,
  `product_description` text NOT NULL,
  `product_image` text NOT NULL,
  `date_added` date NOT NULL,
  `unitofmeasure` varchar(45) NOT NULL,
  `unit_cost` double(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
-- Indexes for table `tblinstoreproducts`
--
ALTER TABLE `tblinstoreproducts`
  ADD PRIMARY KEY (`instoreproduct_id`);

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
-- Indexes for table `tblproductinwarehouse`
--
ALTER TABLE `tblproductinwarehouse`
  ADD PRIMARY KEY (`productinwarehouse_id`);

--
-- Indexes for table `tblpurchase`
--
ALTER TABLE `tblpurchase`
  ADD PRIMARY KEY (`purchase_id`);

--
-- Indexes for table `tblservices`
--
ALTER TABLE `tblservices`
  ADD PRIMARY KEY (`service_id`);

--
-- Indexes for table `tbltransaction`
--
ALTER TABLE `tbltransaction`
  ADD PRIMARY KEY (`transaction_id`);

--
-- Indexes for table `tbproducts`
--
ALTER TABLE `tbproducts`
  ADD PRIMARY KEY (`product_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbladmins`
--
ALTER TABLE `tbladmins`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `tblappointments`
--
ALTER TABLE `tblappointments`
  MODIFY `appointment_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tblcustomers`
--
ALTER TABLE `tblcustomers`
  MODIFY `customer_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `tbldrugprescribed`
--
ALTER TABLE `tbldrugprescribed`
  MODIFY `drugprescribed_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tbldrugtype`
--
ALTER TABLE `tbldrugtype`
  MODIFY `drugtype_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `tblemployees`
--
ALTER TABLE `tblemployees`
  MODIFY `employee_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `tblinstoreproducts`
--
ALTER TABLE `tblinstoreproducts`
  MODIFY `instoreproduct_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tblpetbreed`
--
ALTER TABLE `tblpetbreed`
  MODIFY `breed_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `tblpetcheckup`
--
ALTER TABLE `tblpetcheckup`
  MODIFY `checkup_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tblpets`
--
ALTER TABLE `tblpets`
  MODIFY `pet_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `tblpettype`
--
ALTER TABLE `tblpettype`
  MODIFY `pettype_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `tblproductinwarehouse`
--
ALTER TABLE `tblproductinwarehouse`
  MODIFY `productinwarehouse_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tblpurchase`
--
ALTER TABLE `tblpurchase`
  MODIFY `purchase_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tblservices`
--
ALTER TABLE `tblservices`
  MODIFY `service_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tbltransaction`
--
ALTER TABLE `tbltransaction`
  MODIFY `transaction_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tbproducts`
--
ALTER TABLE `tbproducts`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
