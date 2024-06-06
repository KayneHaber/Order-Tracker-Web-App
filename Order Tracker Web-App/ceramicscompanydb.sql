-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 27, 2024 at 06:40 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ceramicscompanydb`
--

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `OrderID` int(11) NOT NULL,
  `ClientName` varchar(50) NOT NULL,
  `ClientSurname` varchar(50) NOT NULL,
  `ClientAddress` varchar(200) NOT NULL,
  `ClientEmail` varchar(100) NOT NULL,
  `MobileNumber` varchar(15) NOT NULL,
  `DateOfOrder` date NOT NULL,
  `OrderCode` varchar(35) NOT NULL,
  `OrderDescription` varchar(255) NOT NULL,
  `Quantity` int(10) NOT NULL,
  `UnitRetailPrice` decimal(10,2) NOT NULL,
  `TotalRetail` decimal(10,2) NOT NULL,
  `VAT` int(2) NOT NULL,
  `TotalIncVAT` decimal(10,2) NOT NULL,
  `DepositAmount` decimal(10,2) NOT NULL,
  `BalanceLeft` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`OrderID`, `ClientName`, `ClientSurname`, `ClientAddress`, `ClientEmail`, `MobileNumber`, `DateOfOrder`, `OrderCode`, `OrderDescription`, `Quantity`, `UnitRetailPrice`, `TotalRetail`, `VAT`, `TotalIncVAT`, `DepositAmount`, `BalanceLeft`) VALUES
(15, 'Jonathan', 'Friggieri', 'Hal Warda Residence', 'jonathan.friggieri@gmail.com', '79342534', '2024-02-16', '00003', 'Newborn Handprint', 2, 25.00, 50.00, 18, 59.00, 30.00, 29.00);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `UserID` int(11) NOT NULL,
  `FirstName` varchar(50) NOT NULL,
  `Surname` varchar(50) NOT NULL,
  `Email` varchar(50) NOT NULL,
  `MobileNumber` varchar(15) NOT NULL,
  `Username` varchar(50) NOT NULL,
  `Password` varchar(50) NOT NULL,
  `UserProfileImg` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`UserID`, `FirstName`, `Surname`, `Email`, `MobileNumber`, `Username`, `Password`, `UserProfileImg`) VALUES
(32, 'CeramicsCompany', 'Ltd.', 'ceramics@gmail.com', '79445321', 'admin', 'password', 'images/pfp 1.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`OrderID`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`UserID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `OrderID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `UserID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
