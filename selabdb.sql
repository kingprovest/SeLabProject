-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 09, 2018 at 09:35 AM
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
  `ReserveDate` varchar(128) NOT NULL,
  `StartDate` varchar(128) NOT NULL,
  `EndDate` varchar(128) NOT NULL,
  `PickUpTime` varchar(128) NOT NULL,
  `DropOffTime` varchar(128) NOT NULL,
  `PickUpPoint` varchar(128) NOT NULL,
  `DropOffPoint` varchar(128) NOT NULL,
  `Price` int(128) NOT NULL,
  `Id` int(128) DEFAULT NULL,
  `CarID` int(128) NOT NULL,
  `Runner` varchar(125) NOT NULL,
  `Availability` varchar(125) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `carbooking`
--

INSERT INTO `carbooking` (`BookingID`, `ReserveDate`, `StartDate`, `EndDate`, `PickUpTime`, `DropOffTime`, `PickUpPoint`, `DropOffPoint`, `Price`, `Id`, `CarID`, `Runner`, `Availability`) VALUES
(32, '04-11-2018', '06-11-2018', '08-11-2018', '', '', 'uj', 'uj', 900, 6, 5, 'None', ''),
(35, '08-11-2018', '16-11-2018', '17-11-2018', '', '', 'Dahlia', 'Dahlia', 100, 5, 2, 'None', ''),
(39, '08-11-2018', '22-11-2018', '22-11-2018', '1:00am', '2:00am', 'x', 'x', 450, 2, 5, 'None', 'Available'),
(40, '08-11-2018', '29-11-2018', '30-11-2018', '2:00am', '1:00am', 'Red Cafe', 'Yellow Cafe', 700, 6, 6, 'None', 'Available');

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE `feedback` (
  `feedbackID` int(11) NOT NULL,
  `title` varchar(128) NOT NULL,
  `message` varchar(128) NOT NULL,
  `Id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `feedback`
--

INSERT INTO `feedback` (`feedbackID`, `title`, `message`, `Id`) VALUES
(3, 'd', 'd', 6);

-- --------------------------------------------------------

--
-- Table structure for table `maintanencerecord`
--

CREATE TABLE `maintanencerecord` (
  `RecordID` int(11) NOT NULL,
  `Date` varchar(128) NOT NULL,
  `Description` varchar(128) NOT NULL,
  `Cost` decimal(65,2) NOT NULL,
  `Attachment` varchar(128) NOT NULL,
  `CarID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `maintanencerecord`
--

INSERT INTO `maintanencerecord` (`RecordID`, `Date`, `Description`, `Cost`, `Attachment`, `CarID`) VALUES
(6, '11-10-2018', '1', '12.50', '', 2);

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
  `Password` varchar(128) NOT NULL,
  `AccessLevel` varchar(125) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `register`
--

INSERT INTO `register` (`Id`, `FullName`, `Username`, `HpNo`, `EmailAddress`, `Password`, `AccessLevel`) VALUES
(1, 'admin', 'admin', '5678', '5678@gmail.com', 'admin', 'Manager'),
(2, 'Piggy', 'pig', '012232345', 'pig@gmail.com', 'pig', 'Employee'),
(5, 'Ali Bakar', 'ali', '019-3057677', 'ali@gmail.com', 'ali', 'User'),
(6, 'william', 'william', '018-7262253', 'william@gmail.com', 'william', 'User');

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
(2, 'Toyota', 'Vios', '34567', 10, 100, 4, 'header-bg.jpg'),
(5, 'Proton', 'X70', 'X7001', 50, 450, 5, 'protonx70.jpg'),
(6, 'BMW', 'M2', 'M8888', 100, 700, 5, 'index.jpg');

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
-- Indexes for table `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`feedbackID`),
  ADD KEY `FK_ID` (`Id`);

--
-- Indexes for table `maintanencerecord`
--
ALTER TABLE `maintanencerecord`
  ADD PRIMARY KEY (`RecordID`),
  ADD KEY `fkcarid` (`CarID`);

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
  MODIFY `BookingID` int(222) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;
--
-- AUTO_INCREMENT for table `feedback`
--
ALTER TABLE `feedback`
  MODIFY `feedbackID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `maintanencerecord`
--
ALTER TABLE `maintanencerecord`
  MODIFY `RecordID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `register`
--
ALTER TABLE `register`
  MODIFY `Id` int(128) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `vehiclelist`
--
ALTER TABLE `vehiclelist`
  MODIFY `CarID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `carbooking`
--
ALTER TABLE `carbooking`
  ADD CONSTRAINT `carbooking_ibfk_1` FOREIGN KEY (`Id`) REFERENCES `register` (`Id`) ON DELETE CASCADE,
  ADD CONSTRAINT `carbooking_ibfk_2` FOREIGN KEY (`CarID`) REFERENCES `vehiclelist` (`CarID`) ON DELETE CASCADE;

--
-- Constraints for table `feedback`
--
ALTER TABLE `feedback`
  ADD CONSTRAINT `FK_ID` FOREIGN KEY (`Id`) REFERENCES `register` (`Id`) ON DELETE CASCADE;

--
-- Constraints for table `maintanencerecord`
--
ALTER TABLE `maintanencerecord`
  ADD CONSTRAINT `fkcarid` FOREIGN KEY (`CarID`) REFERENCES `vehiclelist` (`CarID`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
