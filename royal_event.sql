-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Dec 09, 2024 at 06:33 PM
-- Server version: 8.2.0
-- PHP Version: 8.3.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `royal_event`
--

-- --------------------------------------------------------

--
-- Table structure for table `permissions`
--

DROP TABLE IF EXISTS `permissions`;
CREATE TABLE IF NOT EXISTS `permissions` (
  `id` int NOT NULL AUTO_INCREMENT,
  `permission` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `createuser` varchar(255) DEFAULT NULL,
  `deleteuser` varchar(255) DEFAULT NULL,
  `createbid` varchar(255) DEFAULT NULL,
  `updatebid` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `permissions`
--

INSERT INTO `permissions` (`id`, `permission`, `createuser`, `deleteuser`, `createbid`, `updatebid`) VALUES
(1, 'Superuser', '1', '1', '1', '1'),
(2, 'Admin', '1', NULL, '1', '1'),
(3, 'User', NULL, NULL, '1', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tbladmin`
--

DROP TABLE IF EXISTS `tbladmin`;
CREATE TABLE IF NOT EXISTS `tbladmin` (
  `ID` int NOT NULL AUTO_INCREMENT,
  `Staffid` varchar(255) DEFAULT NULL,
  `AdminName` varchar(120) DEFAULT NULL,
  `UserName` varchar(120) DEFAULT NULL,
  `FirstName` varchar(255) DEFAULT NULL,
  `LastName` varchar(255) DEFAULT NULL,
  `MobileNumber` bigint DEFAULT NULL,
  `Email` varchar(200) DEFAULT NULL,
  `Status` int NOT NULL DEFAULT '1',
  `Photo` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL DEFAULT 'avatar15.jpg',
  `Password` varchar(120) DEFAULT NULL,
  `AdminRegdate` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=33 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `tbladmin`
--

INSERT INTO `tbladmin` (`ID`, `Staffid`, `AdminName`, `UserName`, `FirstName`, `LastName`, `MobileNumber`, `Email`, `Status`, `Photo`, `Password`, `AdminRegdate`) VALUES
(2, 'U002', 'Admin', 'ndbhalerao91@gmail.com', 'Nikhil', 'Bhalerao', 942397933, 'ndbhalerao91@gmail.com', 1, 'icon-removebg-preview.png', '21232f297a57a5a743894a0e4a801fc3', '2022-07-21 10:18:39'),
(28, 'U001', 'Admin', 'Suraj', 'Suraj', 'kale', 942397933, 'Suraj@gmail.com', 0, 'avatar15.jpg', '21232f297a57a5a743894a0e4a801fc3', '2022-07-25 19:45:45'),
(29, 'ggg', 'User', 'ggg', 'gggg', 'gggg', 9099458674, 'rkishan9099@gmail.com', 1, 'avatar15.jpg', 'e10adc3949ba59abbe56e057f20f883e', '2024-12-09 16:10:42'),
(30, 'ggg', 'User', 'ggg23333', 'Kishan', 'Ramani', 9099458674, 'test123456@gmail.com', 1, 'avatar15.jpg', 'f483126938e520c6fc0ef99db74d1359', '2024-12-09 16:13:01'),
(31, NULL, 'User', 'kishan90999', 'kishan', 'ramani', 9099458674, 'rkishan909911@gmail.com', 1, 'avatar15.jpg', 'e10adc3949ba59abbe56e057f20f883e', '2024-12-09 18:18:57'),
(32, NULL, 'User', 'rkishan9099', 'kishan', 'ramani', 9099458674, 'rkishan909911s@gmail.com', 1, 'avatar15.jpg', 'd16ac0012a5d33e904439421543f2eb8', '2024-12-09 18:20:48');

-- --------------------------------------------------------

--
-- Table structure for table `tblbooking`
--

DROP TABLE IF EXISTS `tblbooking`;
CREATE TABLE IF NOT EXISTS `tblbooking` (
  `ID` int NOT NULL AUTO_INCREMENT,
  `BookingID` int DEFAULT NULL,
  `ServiceID` int DEFAULT NULL,
  `Name` varchar(200) DEFAULT NULL,
  `MobileNumber` bigint DEFAULT NULL,
  `Email` varchar(200) DEFAULT NULL,
  `EventDate` varchar(200) DEFAULT NULL,
  `EventStartingtime` varchar(200) DEFAULT NULL,
  `EventEndingtime` varchar(200) DEFAULT NULL,
  `VenueAddress` mediumtext,
  `EventType` varchar(200) DEFAULT NULL,
  `AdditionalInformation` mediumtext,
  `BookingDate` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `Remark` varchar(200) DEFAULT NULL,
  `Status` varchar(200) DEFAULT NULL,
  `UpdationDate` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`ID`),
  KEY `ServiceID` (`ServiceID`),
  KEY `EventType` (`EventType`(191))
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `tblbooking`
--

INSERT INTO `tblbooking` (`ID`, `BookingID`, `ServiceID`, `Name`, `MobileNumber`, `Email`, `EventDate`, `EventStartingtime`, `EventEndingtime`, `VenueAddress`, `EventType`, `AdditionalInformation`, `BookingDate`, `Remark`, `Status`, `UpdationDate`) VALUES
(14, 954554731, 1, 'Surabhi Kumawat', 8080808080, 'surabhi@gmail.cmo', '2022-03-22', '11 a.m', '12 p.m', 'Suyojeet Tower, near Relience Petrol Pump, Kinaara Hotel, Nashik', 'Birthday Party', 'Special Menu with Professional waiters', '2022-03-22 09:28:13', 'Done', 'Approved', '2022-03-22 09:37:17'),
(15, 977361722, 1, 'Jayesh Panghawane', 7070707070, 'jayesh768@gmail.com', '2022-03-24', '1 p.m', '5 p.m', 'Bansi Plaza, near Kumar Hotel, Nashik', 'Wedding', 'Special Menu', '2022-03-22 09:29:18', 'ff', 'Approved', '2024-12-09 16:09:29'),
(16, 132479015, NULL, 'Kishan Ramani', 2222, 'rkishan9099@gmail.com', '2025-01-03', '4 a.m', '8 a.m', 'Vi GhGhoghavader Ta Gonadal\r\nBandhiya road neaer gvt hospital', 'Sangeet', 'eee', '2024-12-09 16:09:16', NULL, NULL, NULL),
(17, 613452061, NULL, 'Kishan Ramani', 2222, 'rkishan9099@gmail.com', '2025-01-02', '5 a.m', '10 a.m', 'Vi GhGhoghavader Ta Gonadal\r\nBandhiya road neaer gvt hospital', 'Sangeet', 'rrr', '2024-12-09 16:22:10', 'dvbhm.', 'Approved', '2024-12-09 16:22:26'),
(18, 231360624, NULL, 'All_agents_busy', 2222, 'kishanbramani@gmail.com', '', '5 a.m', '8 a.m', 'ff', 'Engagement', 'gg', '2024-12-09 16:27:10', NULL, NULL, NULL),
(19, 874084767, NULL, 'Kishan Ramani', 2222, 'rkishan9099@gmail.com', '2025-01-02', '6 a.m', '9 a.m', 'Vi GhGhoghavader Ta Gonadal\r\nBandhiya road neaer gvt hospital', 'Engagement', 'hhjkl;\'/\r\n', '2024-12-09 16:59:12', 'jkl;/\'\r\n', 'Approved', '2024-12-09 16:59:26');

-- --------------------------------------------------------

--
-- Table structure for table `tblcompany`
--

DROP TABLE IF EXISTS `tblcompany`;
CREATE TABLE IF NOT EXISTS `tblcompany` (
  `id` int NOT NULL AUTO_INCREMENT,
  `regno` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `companyname` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `companyemail` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `country` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `companyphone` text NOT NULL,
  `companyaddress` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `companylogo` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL DEFAULT 'avatar15.jpg',
  `status` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL DEFAULT '0',
  `creationdate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `tblcompany`
--

INSERT INTO `tblcompany` (`id`, `regno`, `companyname`, `companyemail`, `country`, `companyphone`, `companyaddress`, `companylogo`, `status`, `creationdate`) VALUES
(4, '43422332', 'Royal Event Software', 'dummy@royalevents.com', 'India', '+919423979339', 'Kothrud Pune', 'logo.jpg', '1', '2022-03-22 12:17:15');

-- --------------------------------------------------------

--
-- Table structure for table `tblevent`
--

DROP TABLE IF EXISTS `tblevent`;
CREATE TABLE IF NOT EXISTS `tblevent` (
  `id` int NOT NULL AUTO_INCREMENT,
  `event_type` varchar(100) NOT NULL,
  `event_name` varchar(255) NOT NULL,
  `event_description` text NOT NULL,
  `event_image` varchar(255) DEFAULT NULL,
  `event_date` date NOT NULL,
  `event_time` time NOT NULL,
  `event_venue` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `event_organizer` varchar(255) NOT NULL,
  `event_capacity` int DEFAULT NULL,
  `event_ticket_price` decimal(10,2) DEFAULT NULL,
  `event_status` enum('Upcoming','Ongoing','Completed') DEFAULT 'Upcoming',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `tblevent`
--

INSERT INTO `tblevent` (`id`, `event_type`, `event_name`, `event_description`, `event_image`, `event_date`, `event_time`, `event_venue`, `created_at`, `updated_at`, `event_organizer`, `event_capacity`, `event_ticket_price`, `event_status`) VALUES
(6, '5', 'dddd', 'dfyuil;\'', 'about-image.png', '2024-12-19', '23:43:00', 'sdfghjkl', '2024-12-09 18:10:08', '2024-12-09 18:10:08', 'sdfghjkl', 33, 22.00, 'Upcoming');

-- --------------------------------------------------------

--
-- Table structure for table `tbleventtype`
--

DROP TABLE IF EXISTS `tbleventtype`;
CREATE TABLE IF NOT EXISTS `tbleventtype` (
  `ID` int NOT NULL AUTO_INCREMENT,
  `EventType` varchar(200) DEFAULT NULL,
  `CreationDate` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`ID`),
  KEY `EventType` (`EventType`(191))
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `tbleventtype`
--

INSERT INTO `tbleventtype` (`ID`, `EventType`, `CreationDate`) VALUES
(3, 'Charity', '2022-01-22 07:02:43'),
(4, 'Cocktail', '2022-01-22 07:03:00'),
(5, 'College', '2022-01-22 07:03:11'),
(6, 'Community', '2022-01-22 07:03:24'),
(7, 'Concert', '2022-01-22 07:03:35'),
(8, 'Engagement', '2022-01-22 07:03:51'),
(9, 'Get Together', '2022-01-22 07:04:04'),
(10, 'Government', '2022-01-22 07:04:15'),
(14, 'Pre Engagement', '2022-01-22 07:05:18'),
(15, 'Religious', '2022-01-22 07:05:27'),
(16, 'Sangeet', '2022-01-22 07:05:43'),
(17, 'Social', '2022-01-22 07:05:58'),
(18, 'Wedding', '2022-01-22 07:06:07'),
(21, 'test', '2024-12-09 16:19:27');

-- --------------------------------------------------------

--
-- Table structure for table `tblservice`
--

DROP TABLE IF EXISTS `tblservice`;
CREATE TABLE IF NOT EXISTS `tblservice` (
  `ID` int NOT NULL AUTO_INCREMENT,
  `ServiceName` varchar(200) DEFAULT NULL,
  `SerDes` varchar(250) NOT NULL,
  `ServicePrice` varchar(200) DEFAULT NULL,
  `CreationDate` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`ID`),
  KEY `ID` (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `tblservice`
--

INSERT INTO `tblservice` (`ID`, `ServiceName`, `SerDes`, `ServicePrice`, `CreationDate`) VALUES
(1, 'Party decorations', 'we finish designing 4 hours  before your ceremony .', '8000', '2022-01-24 07:17:43'),
(2, 'Party DJ', '(we install the DJ equipment 1 hour before your selected event start time)', '700', '2022-01-24 07:18:32'),
(3, 'Ceremony Music', 'Our ceremony music service is a popular add on to our wedding DJ stay all day hire.', '650', '2022-01-24 07:19:14'),
(4, 'Photo Booth Hire', 'we install the DJ equipment before your ceremony ', '500', '2022-01-24 07:19:51'),
(6, 'Uplighters', 'Uplighters are bright lighting fixtures which are installed on the floor and shine a vibrant wash of colour over the walls of your venue', '200', '2022-01-24 07:21:14');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
