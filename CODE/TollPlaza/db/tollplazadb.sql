-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 12, 2021 at 01:18 PM
-- Server version: 10.1.37-MariaDB
-- PHP Version: 5.6.39

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tollplazadb`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `ID` int(10) NOT NULL,
  `AdminName` varchar(50) DEFAULT NULL,
  `UserName` varchar(50) DEFAULT NULL,
  `MobileNumber` bigint(10) DEFAULT NULL,
  `Email` varchar(120) DEFAULT NULL,
  `Password` varchar(120) DEFAULT NULL,
  `AdminRegdate` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`ID`, `AdminName`, `UserName`, `MobileNumber`, `Email`, `Password`, `AdminRegdate`) VALUES
(1, 'test', 'admin', 7889898987, 'tester1@gmail.com', 'f925916e2754e5e03f75dd58a5733251', '2021-04-21 11:12:29');

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `ID` int(10) NOT NULL,
  `VehicleCat` varchar(120) DEFAULT NULL,
  `cost` float NOT NULL,
  `returncost` int(11) NOT NULL,
  `monthlycost` int(11) NOT NULL,
  `CreationDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`ID`, `VehicleCat`, `cost`, `returncost`, `monthlycost`, `CreationDate`) VALUES
(1, 'Car/Jeep', 55, 85, 1835, '2021-05-12 11:11:56'),
(2, 'LCV', 90, 135, 2965, '2021-05-12 11:11:57'),
(3, 'Bus', 185, 280, 6215, '2021-05-12 11:11:57'),
(4, 'Three Wheeler', 265, 395, 8820, '2021-05-12 11:11:57'),
(5, 'Truck', 380, 570, 12675, '2021-05-12 11:11:57');

-- --------------------------------------------------------

--
-- Table structure for table `pass`
--

CREATE TABLE `pass` (
  `ID` int(10) NOT NULL,
  `UserId` varchar(120) NOT NULL,
  `VehicleCat` varchar(120) DEFAULT NULL,
  `VehicleName` varchar(120) DEFAULT NULL,
  `RegNumber` char(50) DEFAULT NULL,
  `passtype` varchar(30) NOT NULL,
  `Validityfrom` varchar(120) DEFAULT NULL,
  `ValidityTo` varchar(120) DEFAULT NULL,
  `AppName` varchar(120) DEFAULT NULL,
  `AppAge` int(20) NOT NULL,
  `AppAdd` mediumtext,
  `PassCost` varchar(50) DEFAULT NULL,
  `CreationDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `status` varchar(30) NOT NULL DEFAULT 'Not Approved',
  `EnterVehiclecity` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pass`
--

INSERT INTO `pass` (`ID`, `UserId`, `VehicleCat`, `VehicleName`, `RegNumber`, `passtype`, `Validityfrom`, `ValidityTo`, `AppName`, `AppAge`, `AppAdd`, `PassCost`, `CreationDate`, `status`, `EnterVehiclecity`) VALUES
(462982533, '526337008', 'Bus', 'Bus', 'TN23DO2007', 'Return Journey', '2021-05-12', '2021-05-13', 'Ansh Sharma', 26, 'Delhi', '280', '2021-05-12 11:13:30', 'Not Approved', 'Vellore'),
(894402844, '269091289', 'Car/Jeep', 'Swift Dzire', 'TN23DO1017', 'Single Journey', '2021-05-12', '2021-05-13', 'Aditya Krishna', 19, 'Vellore, T.N', '30', '2021-05-12 08:35:42', 'Paid', 'Vellore');

-- --------------------------------------------------------

--
-- Table structure for table `receipt`
--

CREATE TABLE `receipt` (
  `ID` int(10) NOT NULL,
  `OwnerId` int(11) DEFAULT NULL,
  `VehicleNumber` varchar(120) DEFAULT NULL,
  `PassType` varchar(120) NOT NULL,
  `PassID` varchar(50) DEFAULT NULL,
  `EnterVehiclecity` varchar(120) DEFAULT NULL,
  `Cost` varchar(120) DEFAULT NULL,
  `CreationDate` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `valfrom` date NOT NULL,
  `valto` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `receipt`
--

INSERT INTO `receipt` (`ID`, `OwnerId`, `VehicleNumber`, `PassType`, `PassID`, `EnterVehiclecity`, `Cost`, `CreationDate`, `valfrom`, `valto`) VALUES
(614545707, 269091289, 'TN23DO1017', 'Single Journey', '894402844', 'Vellore', '30', '2021-05-12 08:48:24', '2021-05-12', '2021-05-13');

-- --------------------------------------------------------

--
-- Table structure for table `toll`
--

CREATE TABLE `toll` (
  `id` int(11) NOT NULL,
  `source` varchar(30) NOT NULL,
  `destn` varchar(30) NOT NULL,
  `number` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `toll`
--

INSERT INTO `toll` (`id`, `source`, `destn`, `number`) VALUES
(1, 'Vellore', 'Chennai', 2),
(2, 'Chennai', 'Vellore', 2),
(3, 'Chennai', 'Bengaluru', 4),
(4, 'Bengaluru', 'Chennai', 4);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `ID` int(10) NOT NULL,
  `username` varchar(120) DEFAULT NULL,
  `password` varchar(120) DEFAULT NULL,
  `mobno` bigint(10) DEFAULT NULL,
  `email` varchar(120) DEFAULT NULL,
  `gender` varchar(20) DEFAULT NULL,
  `address` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`ID`, `username`, `password`, `mobno`, `email`, `gender`, `address`) VALUES
(4, 'Raghav', 'f925916e2754e5e03f75dd58a5733251', 1234567890, 'test@gmail.com', 'Male', 'New Delhi'),
(269091289, 'Aditya Krishna', 'c7ec45010eb4736337262de89c993cf9', 7999854551, 'adityakrishna@gmail.com', 'Male', 'Indore,M.P'),
(526337008, 'Ansh Sharma', 'a12b61025c1f493a8ad8d4dcf6630883', 7787787764, 'anshsharma@gmail.com', 'Male', 'Delhi'),
(868756491, 'Sparsh Sharma', '52779dbbec294633b8d6f2abee584aad', 9899133755, 'sparshsharma@gmail.com', 'Male', 'Delhi');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `pass`
--
ALTER TABLE `pass`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `receipt`
--
ALTER TABLE `receipt`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `toll`
--
ALTER TABLE `toll`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `pass`
--
ALTER TABLE `pass`
  MODIFY `ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=894402845;

--
-- AUTO_INCREMENT for table `receipt`
--
ALTER TABLE `receipt`
  MODIFY `ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=956877417;

--
-- AUTO_INCREMENT for table `toll`
--
ALTER TABLE `toll`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=868756492;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
