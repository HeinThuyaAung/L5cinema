-- phpMyAdmin SQL Dump
-- version 3.2.4
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jul 29, 2017 at 07:08 PM
-- Server version: 5.1.41
-- PHP Version: 5.3.1

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `cinemabooking`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE IF NOT EXISTS `admin` (
  `Email` varchar(30) NOT NULL,
  `Password` varchar(30) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`Email`, `Password`) VALUES
('cinema@gmail.com', '24271999');

-- --------------------------------------------------------

--
-- Table structure for table `booking`
--

CREATE TABLE IF NOT EXISTS `booking` (
  `BookingID` varchar(30) NOT NULL,
  `CustomerID` varchar(30) NOT NULL,
  `MovieID` varchar(30) NOT NULL,
  `MovieTime` varchar(30) NOT NULL,
  `TicketPrice` varchar(30) NOT NULL,
  `NoOfSeat` varchar(30) NOT NULL,
  `TargetDate` varchar(30) NOT NULL,
  `BookingDate` varchar(30) NOT NULL,
  `Status` varchar(30) NOT NULL,
  `PaymentStatus` varchar(30) NOT NULL,
  `PaymentDate` varchar(30) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `booking`
--

INSERT INTO `booking` (`BookingID`, `CustomerID`, `MovieID`, `MovieTime`, `TicketPrice`, `NoOfSeat`, `TargetDate`, `BookingDate`, `Status`, `PaymentStatus`, `PaymentDate`) VALUES
('B_000005', 'C-000002', 'M-000002', '9:30pm-11:30pm', '10', '2', '2017-06-24', '2017-06-25', 'Pending', 'Pending', ''),
('B_000006', 'C-000004', 'M-000002', '3:30pm-5:30pm', '12', '4', '2017-06-26', '2017-06-27', 'Pending', 'Paid', '30-Jul-2017'),
('B_000007', 'C-000004', 'M-000002', '6:30pm-8:30pm', '9', '3', '2017-06-27', '2017-06-28', 'Pending', 'Pending', ''),
('B_000009', 'C-000003', 'M-000001', '3:30pm-5:30pm', '25', '5', '2017-07-07', '2017-07-07', 'Pending', 'Paid', ''),
('B_000010', 'C-000012', 'M-000002', '6:30pm-8:30pm', '10', '2', '2017-07-14', '2017-07-15', 'Pending', 'Pending', ''),
('B_000012', 'C-000012', 'M-000001', '3:30pm-5:30pm', '10', '2', '2017-07-14', '2017-07-15', 'Pending', 'Pending', ''),
('B_000022', 'C-000012', 'M-000001', '12:30pm-2:30pm', '10', '6', '2017-07-25', '2017-07-25', 'Confirmed', 'Pending', ''),
('B_000016', 'C-000011', 'M-000001', '9:30pm-11:30pm', '10', '2', '2017-07-14', '2017-07-14', 'Pending', 'Pending', ''),
('B_000017', 'C-000012', 'M-000001', '6:30pm-8:30pm', '10', '2', '2017-07-18', '2017-07-18', 'Pending', 'Pending', ''),
('B_000018', 'C-000012', 'M-000001', '6:30pm-8:30pm', '10', '4', '2017-07-20', '2017-07-20', 'Pending', 'Pending', ''),
('B_000020', 'C-000012', 'M-000002', '6:30pm-8:30pm', '10', '2', '2017-07-20', '2017-07-20', 'Pending', 'Pending', ''),
('B_000021', 'C-000012', 'M-000001', '9:30pm-11:30pm', '10', '6', '2017-07-20', '2017-07-20', 'Pending', 'Pending', ''),
('B_000023', 'C-000012', 'M-000003', '12:30pm-2:30pm', '10', '2', '2017-07-27', '2017-07-27', 'Confirmed', 'Paid', '29-Jul-2017'),
('B_000024', 'C-000012', 'M-000002', '12:30pm-2:30pm', '10', '2', '2017-07-27', '2017-07-28', 'Pending', 'Pending', '');

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE IF NOT EXISTS `customer` (
  `CustomerID` varchar(15) NOT NULL,
  `CustomerName` varchar(50) NOT NULL,
  `Email` varchar(50) NOT NULL,
  `Password` varchar(50) NOT NULL,
  `Phone` varchar(30) NOT NULL,
  `DOB` varchar(30) NOT NULL,
  `Gender` varchar(30) NOT NULL,
  `Paths` varchar(255) NOT NULL,
  PRIMARY KEY (`CustomerID`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`CustomerID`, `CustomerName`, `Email`, `Password`, `Phone`, `DOB`, `Gender`, `Paths`) VALUES
('C-000002', 'HH TT', 'a@gmail.com', '24271999', '09888', '1998-4-2', 'male', 'Images__h.png'),
('C-000001', 'HH NN', 'g@gmail.com', '24271999', '09333', '2004-4-12', 'female', 'Images__n.png'),
('C-000003', 'm mn', 'mmn@gmail.com', '12345678', '09-23456789', '1997-10-9', 'female', 'Images/_1_2.jpg'),
('C-000004', 'ht ya', 'htya@gmail.com', '1234', '0979', '1999-4-2', 'male', 'Images/__h.png'),
('C-000005', 'hein thu ya aung', 'sss@gmail.com', '1234', '0988', '1999-4-2', 'male', 'Images/__h.png'),
('C-000007', 'B B', 'b@gmail.com', 'B', 'B', '2006-6-30', 'female', 'Images/_chinese.jpg'),
('C-000008', 'BC C', 'c@gmail.com', 'C', 'C', '2014-6-30', 'female', 'Images/_chinese.jpg'),
('C-000009', 'Min Htet Aung', 'MHA@gmail.com', '88888888', '09754', '1998-11-12', 'male', 'Images/_qlow-440px-BMW_Isetta_yellow.jpg'),
('C-000010', 'S S', 'S@gmail.com', 's', '09444', '1999-4-2', 'male', 'Images/__t.png'),
('C-000011', 'gg gg', 'gg@gmail.com', '24271999', '0976', '2001-4-30', 'male', 'Images/__e.png'),
('C-000012', 'Hein Thu Ya Aung', 'littlehtya.npl@gmail.com', '24271999', '09972955317', '1999-4-2', 'male', 'Images/_h.png');

-- --------------------------------------------------------

--
-- Table structure for table `movie`
--

CREATE TABLE IF NOT EXISTS `movie` (
  `MovieID` varchar(30) NOT NULL,
  `MovieName` varchar(30) NOT NULL,
  `MovieTypeID` varchar(30) NOT NULL,
  `RoomID` varchar(30) NOT NULL,
  `Description` varchar(30) NOT NULL,
  `StartDate` varchar(30) NOT NULL,
  `EndDate` varchar(30) NOT NULL,
  `Videos` varchar(255) NOT NULL,
  `Paths` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `movie`
--

INSERT INTO `movie` (`MovieID`, `MovieName`, `MovieTypeID`, `RoomID`, `Description`, `StartDate`, `EndDate`, `Videos`, `Paths`) VALUES
('M-000001', 'mummy', 'MT-000001', 'R-000001', 'mummy movie', '2017-07-07', '2017-07-14', 'Video/TheMummy.mp4', 'Images/mummy.jpg'),
('M-000002', 'wonder woman', 'MT-000002', 'R-000002', 'wonder women movie', '2017-07-21', '2017-07-27', 'Video/wonderwomen.mp4', 'Images/wonder_woman.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `movietype`
--

CREATE TABLE IF NOT EXISTS `movietype` (
  `MovieTypeID` varchar(30) NOT NULL,
  `MovieTypeName` varchar(30) NOT NULL,
  PRIMARY KEY (`MovieTypeID`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `movietype`
--

INSERT INTO `movietype` (`MovieTypeID`, `MovieTypeName`) VALUES
('MT-000001', 'honor'),
('MT-000002', 'action'),
('MT-000003', 'alimated movie');

-- --------------------------------------------------------

--
-- Table structure for table `room`
--

CREATE TABLE IF NOT EXISTS `room` (
  `RoomID` varchar(30) NOT NULL,
  `RoomName` varchar(30) NOT NULL,
  `TotalRows` varchar(30) NOT NULL,
  PRIMARY KEY (`RoomID`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `room`
--

INSERT INTO `room` (`RoomID`, `RoomName`, `TotalRows`) VALUES
('R-000001', 'Cinema 3', '20'),
('R-000002', 'Cinema 1', '25'),
('R-000003', 'Cinema 2', '30');

-- --------------------------------------------------------

--
-- Table structure for table `seattype`
--

CREATE TABLE IF NOT EXISTS `seattype` (
  `SeatTypeID` varchar(30) NOT NULL,
  `RoomID` varchar(30) NOT NULL,
  `SeatRow` varchar(30) NOT NULL,
  `SeatPrice` varchar(30) NOT NULL,
  `Quantity` varchar(30) NOT NULL,
  PRIMARY KEY (`SeatTypeID`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `seattype`
--

INSERT INTO `seattype` (`SeatTypeID`, `RoomID`, `SeatRow`, `SeatPrice`, `Quantity`) VALUES
('ST-000001', 'R-000001', 'BB', '100', '12'),
('ST-000002', 'R-000002', 'AA', ' 300', '15'),
('ST-000003', 'R-000003', 'CC', '500', '20');

-- --------------------------------------------------------

--
-- Table structure for table `tmpseat`
--

CREATE TABLE IF NOT EXISTS `tmpseat` (
  `SeatID` varchar(30) NOT NULL,
  `SeatName` varchar(30) NOT NULL,
  `CustomerID` varchar(30) NOT NULL,
  `MovieID` varchar(30) NOT NULL,
  `MovieTime` varchar(30) NOT NULL,
  `BookingDate` varchar(30) NOT NULL,
  PRIMARY KEY (`SeatID`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tmpseat`
--

INSERT INTO `tmpseat` (`SeatID`, `SeatName`, `CustomerID`, `MovieID`, `MovieTime`, `BookingDate`) VALUES
('S-000015', '10_7', 'C-000012', 'M-000001', '12:30pm-2:30pm', '2017-07-25'),
('S-000016', '10_8', 'C-000012', 'M-000001', '12:30pm-2:30pm', '2017-07-25'),
('S-000014', '10_9', 'C-000012', 'M-000001', '9:30pm-11:30pm', '2017-07-20'),
('S-000013', '10_8', 'C-000012', 'M-000001', '9:30pm-11:30pm', '2017-07-20'),
('S-000012', '10_9', 'C-000012', 'M-000002', '6:30pm-8:30pm', '2017-07-20'),
('S-000017', '10_7', 'C-000012', 'M-000001', '12:30pm-2:30pm', '2017-07-25'),
('S-000018', '10_8', 'C-000012', 'M-000001', '12:30pm-2:30pm', '2017-07-25'),
('S-000019', '10_7', 'C-000012', 'M-000001', '12:30pm-2:30pm', '2017-07-25'),
('S-000020', '10_8', 'C-000012', 'M-000001', '12:30pm-2:30pm', '2017-07-25'),
('S-000021', '10_8', 'C-000012', 'M-000003', '12:30pm-2:30pm', '2017-07-27'),
('S-000022', '10_9', 'C-000012', 'M-000003', '12:30pm-2:30pm', '2017-07-27'),
('S-000023', '10_14', 'C-000012', 'M-000002', '12:30pm-2:30pm', '2017-07-28'),
('S-000024', '10_15', 'C-000012', 'M-000002', '12:30pm-2:30pm', '2017-07-28');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
