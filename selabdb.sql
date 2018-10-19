-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 19, 2018 at 10:22 AM
-- Server version: 10.1.21-MariaDB
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `selabdb`
--

-- --------------------------------------------------------

--
-- Table structure for table `carbooking`
--

CREATE TABLE `carbooking` (
  `BookingID` int(222) NOT NULL,
  `StartDate` varchar(128) NOT NULL,
  `EndDate` varchar(128) NOT NULL,
  `PickUpPoint` varchar(128) NOT NULL,
  `Price` int(128) NOT NULL,
  `Id` int(128) DEFAULT NULL,
  `CarID` int(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `carbooking`
--

INSERT INTO `carbooking` (`BookingID`, `StartDate`, `EndDate`, `PickUpPoint`, `Price`, `Id`, `CarID`) VALUES
(21, '16-10-2018', '18-10-2018', 'Pavilion2', 1920, 2, 3),
(22, '29-10-2018', '31-10-2018', 'Sakura', 160, 2, 1),
(23, '17-10-2018', '19-10-2018', 'Unijaya', 160, 2, 1),
(24, '24-10-2018', '31-10-2018', 'Autumn', 6720, 3, 3);

-- --------------------------------------------------------

--
-- Table structure for table `register`
--

CREATE TABLE `register` (
  `Id` int(128) NOT NULL,
  `FullName` varchar(128) NOT NULL,
  `Username` varchar(128) NOT NULL,
  `HpNo` varchar(128) NOT NULL,
  `EmailAddress` varchar(128) NOT NULL,
  `Password` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `register`
--

INSERT INTO `register` (`Id`, `FullName`, `Username`, `HpNo`, `EmailAddress`, `Password`) VALUES
(1, 'admin', 'admin', '5678', '5678@gmail.com', 'admin'),
(2, 'Piggy', 'pig', '012232345', 'pig@gmail.com', 'pig'),
(3, 'Big bear', 'bear', '0164533423', 'bear@gmail.com', 'bear');

-- --------------------------------------------------------

--
-- Table structure for table `vehiclelist`
--

CREATE TABLE `vehiclelist` (
  `CarID` int(11) NOT NULL,
  `Brand` varchar(128) NOT NULL,
  `Model` varchar(128) NOT NULL,
  `PlateNumber` varchar(128) NOT NULL,
  `PerHourRate` int(128) NOT NULL,
  `PerDayRate` int(128) NOT NULL,
  `NoOfSeat` int(128) NOT NULL,
  `ImagePath` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `vehiclelist`
--

INSERT INTO `vehiclelist` (`CarID`, `Brand`, `Model`, `PlateNumber`, `PerHourRate`, `PerDayRate`, `NoOfSeat`, `ImagePath`) VALUES
(1, 'Proton', 'Saga', '12345', 8, 80, 8, 't3.png'),
(2, 'Toyota', 'Vios', '34567', 10, 100, 4, 'header-bg.jpg'),
(3, 'BMW', 'M2', 'M8888', 50, 960, 5, 'index.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `carbooking`
--
ALTER TABLE `carbooking`
  ADD PRIMARY KEY (`BookingID`),
  ADD KEY `Id` (`Id`),
  ADD KEY `carID` (`CarID`);

--
-- Indexes for table `register`
--
ALTER TABLE `register`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `vehiclelist`
--
ALTER TABLE `vehiclelist`
  ADD PRIMARY KEY (`CarID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `carbooking`
--
ALTER TABLE `carbooking`
  MODIFY `BookingID` int(222) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;
--
-- AUTO_INCREMENT for table `register`
--
ALTER TABLE `register`
  MODIFY `Id` int(128) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `vehiclelist`
--
ALTER TABLE `vehiclelist`
  MODIFY `CarID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `carbooking`
--
ALTER TABLE `carbooking`
  ADD CONSTRAINT `carbooking_ibfk_1` FOREIGN KEY (`Id`) REFERENCES `register` (`Id`),
  ADD CONSTRAINT `carbooking_ibfk_2` FOREIGN KEY (`CarID`) REFERENCES `vehiclelist` (`CarID`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
