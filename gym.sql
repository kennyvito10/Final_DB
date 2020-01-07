-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 07, 2020 at 05:32 PM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 7.3.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `gym`
--

-- --------------------------------------------------------

--
-- Table structure for table `address`
--

CREATE TABLE `address` (
  `addressID` int(11) NOT NULL,
  `country` varchar(50) NOT NULL,
  `postalCode` varchar(50) NOT NULL,
  `province` varchar(50) NOT NULL,
  `district` varchar(50) NOT NULL,
  `city` varchar(50) NOT NULL,
  `address` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `address`
--

INSERT INTO `address` (`addressID`, `country`, `postalCode`, `province`, `district`, `city`, `address`) VALUES
(1, 'Indonesia', '10310', 'DKI Jakarta', 'Menteng', 'Jakarta Pusat', 'Jl MH Thamrin No. 2'),
(2, 'Indonesia', '11470', 'DKI Jakarta', 'Grogol Pertamburan', 'Jakrta Barat', 'Jl Taman Apel 2 No.15'),
(3, 'Indonesia', '11460', 'DKI Jakarta', 'Grogol Pertamburan', 'Jakarta Barat', 'Jl Hadiah 4 No. 1440'),
(4, 'a', 'a', 'a', 'a', 'a', 'a'),
(5, 'Indonesia', '11520', 'DKI Jakarta', 'Grogol', 'Jakarta Barat', 'Jl S Parman No 14'),
(6, 'Indonesia', '11520', 'Jakarta', 'tyt', 'Kota Jakarta Barat', 'Apartemen Satu8 Residence'),
(7, 'Indonesia', '11520', 'Jakarta', 'Grogol', 'Kota Jakarta Barat', 'Apartemen Satu8 Residence');

-- --------------------------------------------------------

--
-- Table structure for table `bill`
--

CREATE TABLE `bill` (
  `billID` int(11) NOT NULL,
  `customerID` int(11) NOT NULL,
  `branchID` int(11) NOT NULL,
  `billDate` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bill`
--

INSERT INTO `bill` (`billID`, `customerID`, `branchID`, `billDate`) VALUES
(1, 1, 1, '2020-01-02'),
(2, 2, 1, '2020-01-03'),
(3, 3, 1, '2020-01-07'),
(4, 4, 1, '2020-01-07');

-- --------------------------------------------------------

--
-- Table structure for table `bill_detail`
--

CREATE TABLE `bill_detail` (
  `detailID` int(11) NOT NULL,
  `billID` int(11) NOT NULL,
  `productID` int(11) NOT NULL,
  `qty` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bill_detail`
--

INSERT INTO `bill_detail` (`detailID`, `billID`, `productID`, `qty`) VALUES
(1, 1, 1, 1),
(2, 2, 1, 10),
(3, 3, 1, 6),
(4, 4, 2, 3);

-- --------------------------------------------------------

--
-- Table structure for table `branch`
--

CREATE TABLE `branch` (
  `branchID` int(11) NOT NULL,
  `branchName` varchar(50) NOT NULL,
  `addressID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `branch`
--

INSERT INTO `branch` (`branchID`, `branchName`, `addressID`) VALUES
(1, 'WAK Gym Thamrin', 1),
(4, 'WAK Gym S Parman', 5);

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `customerID` int(11) NOT NULL,
  `addressID` int(11) NOT NULL,
  `firstName` varchar(100) NOT NULL,
  `lastName` varchar(100) NOT NULL,
  `dob` date NOT NULL,
  `gender` varchar(10) NOT NULL,
  `email` varchar(50) NOT NULL,
  `phone` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`customerID`, `addressID`, `firstName`, `lastName`, `dob`, `gender`, `email`, `phone`) VALUES
(1, 2, 'Budi', 'Satrio', '1999-01-11', 'Male', 'budisatrio@gmail.com', '081767987546'),
(2, 3, 'Raffi', 'Putra', '2000-03-11', 'Male', 'raffiputra@gmail.com', '08188965788'),
(3, 6, 'Klara', 'Salim', '2020-01-01', 'Female', 'vanilystar@hotmail.com', '08176027288'),
(4, 7, 'Klara', 'Salim', '2020-01-28', 'Male', 'kennyvitostar@gmail.com', '08176027288');

-- --------------------------------------------------------

--
-- Table structure for table `personal_trainer`
--

CREATE TABLE `personal_trainer` (
  `ptID` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `positionID` int(11) NOT NULL,
  `branchID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `personal_trainer`
--

INSERT INTO `personal_trainer` (`ptID`, `name`, `positionID`, `branchID`) VALUES
(1, 'Adi Irawan', 1, 1),
(6, 'Budi', 2, 1),
(7, 'Luis', 2, 4);

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `productID` int(11) NOT NULL,
  `productName` varchar(50) NOT NULL,
  `price` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`productID`, `productName`, `price`) VALUES
(1, 'Weight-Lifting', 80000),
(2, 'Yoga', 100000),
(3, 'Zumba', 125000),
(4, 'Calisthenics', 150000);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `address`
--
ALTER TABLE `address`
  ADD PRIMARY KEY (`addressID`);

--
-- Indexes for table `bill`
--
ALTER TABLE `bill`
  ADD PRIMARY KEY (`billID`),
  ADD KEY `customerID` (`customerID`),
  ADD KEY `branchID` (`branchID`);

--
-- Indexes for table `bill_detail`
--
ALTER TABLE `bill_detail`
  ADD PRIMARY KEY (`detailID`),
  ADD KEY `bill_detail_ibfk_1` (`billID`),
  ADD KEY `productID` (`productID`);

--
-- Indexes for table `branch`
--
ALTER TABLE `branch`
  ADD PRIMARY KEY (`branchID`),
  ADD KEY `addressID` (`addressID`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`customerID`),
  ADD KEY `addressID` (`addressID`);

--
-- Indexes for table `personal_trainer`
--
ALTER TABLE `personal_trainer`
  ADD PRIMARY KEY (`ptID`),
  ADD KEY `branchID` (`branchID`),
  ADD KEY `positionID` (`positionID`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`productID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `address`
--
ALTER TABLE `address`
  MODIFY `addressID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `bill`
--
ALTER TABLE `bill`
  MODIFY `billID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `bill_detail`
--
ALTER TABLE `bill_detail`
  MODIFY `detailID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `branch`
--
ALTER TABLE `branch`
  MODIFY `branchID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `customerID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `personal_trainer`
--
ALTER TABLE `personal_trainer`
  MODIFY `ptID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `productID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `bill`
--
ALTER TABLE `bill`
  ADD CONSTRAINT `bill_ibfk_1` FOREIGN KEY (`customerID`) REFERENCES `customer` (`customerID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `bill_ibfk_2` FOREIGN KEY (`branchID`) REFERENCES `branch` (`branchID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `bill_detail`
--
ALTER TABLE `bill_detail`
  ADD CONSTRAINT `bill_detail_ibfk_1` FOREIGN KEY (`billID`) REFERENCES `bill` (`billID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `bill_detail_ibfk_2` FOREIGN KEY (`productID`) REFERENCES `product` (`productID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `branch`
--
ALTER TABLE `branch`
  ADD CONSTRAINT `branch_ibfk_1` FOREIGN KEY (`addressID`) REFERENCES `address` (`addressID`);

--
-- Constraints for table `customer`
--
ALTER TABLE `customer`
  ADD CONSTRAINT `customer_ibfk_1` FOREIGN KEY (`addressID`) REFERENCES `address` (`addressID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `personal_trainer`
--
ALTER TABLE `personal_trainer`
  ADD CONSTRAINT `personal_trainer_ibfk_1` FOREIGN KEY (`branchID`) REFERENCES `branch` (`branchID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `personal_trainer_ibfk_2` FOREIGN KEY (`positionID`) REFERENCES `product` (`productID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
