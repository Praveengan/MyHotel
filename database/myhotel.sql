-- phpMyAdmin SQL Dump
-- version 4.5.2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jul 13, 2016 at 04:07 PM
-- Server version: 10.1.9-MariaDB
-- PHP Version: 5.6.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `myhotel`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `Name` varchar(30) NOT NULL,
  `admin_main` varchar(30) NOT NULL,
  `admin_pass` varchar(35) NOT NULL,
  `loggedin` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`Name`, `admin_main`, `admin_pass`, `loggedin`) VALUES
('', 'admin@halli.com', '21232f297a57a5a743894a0e4a801fc3', 0);

-- --------------------------------------------------------

--
-- Table structure for table `charges`
--

CREATE TABLE `charges` (
  `type` varchar(11) NOT NULL,
  `inrsbr` int(11) NOT NULL,
  `inrdbr` int(11) NOT NULL,
  `usdsbr` int(11) NOT NULL,
  `usddbr` int(11) NOT NULL,
  `totrooms` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `charges`
--

INSERT INTO `charges` (`type`, `inrsbr`, `inrdbr`, `usdsbr`, `usddbr`, `totrooms`) VALUES
('delux', 1100, 2200, 16, 32, 20),
('standard', 2600, 3100, 37, 44, 15),
('suite', 2200, 3300, 31, 47, 7),
('Super Delux', 3100, 3600, 44, 51, 10);

-- --------------------------------------------------------

--
-- Table structure for table `Family`
--

CREATE TABLE `Family` (
  `firstname` varchar(30) NOT NULL,
  `lastname` varchar(30) NOT NULL,
  `email` varchar(30) NOT NULL,
  `password` varchar(40) NOT NULL,
  `dob` date NOT NULL,
  `sex` varchar(6) DEFAULT NULL,
  `loggedin` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Family`
--

INSERT INTO `Family` (`firstname`, `lastname`, `email`, `password`, `dob`, `sex`, `loggedin`) VALUES
('abc', 'abv', 'abc@abc.com', '900150983cd24fb0d6963f7d28e17f72', '2016-12-31', 'male', 0),
('Adithya ', 'Kamath', 'adithya@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b', '2016-04-16', 'Male', 0),
('Anuthama', 'koti', 'anuthama@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b', '2016-04-23', 'Male', 0),
('Bharat', 'kumar', 'bharat@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b', '2016-04-22', 'Male', 0),
('Chethan', 'Sharma', 'chethan@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b', '2016-04-06', 'Male', 0),
('gugu', 'gugu', 'gugu@gugu.com', 'c6f5770ad8f0d0c4357ff3854d95392f', '2016-12-31', 'male', 0),
('guru', 'guru', 'guru@guru.com', '77e69c137812518e359196bb2f5e9bb9', '2016-04-30', 'Male', 0),
('fidyfh', 'yfiwyu', 'lala@lala.com', 'a2d10a3211b415832791a6bc6031f9ab', '2015-12-31', 'male', 0),
('lalle', 'lalle', 'lalle@lalle.com', 'af9997672c6b57ea4c842cdccf27187e', '2001-01-01', 'Male', 0),
('lalle', 'lalle', 'lalle@lalle1.com', 'e10adc3949ba59abbe56e057f20f883e', '2016-12-31', 'male', 0),
('nata', 'nata', 'nata@nata.com', 'a817d533ed72329657a2a92db23ec63b', '2016-04-24', 'Male', 0),
('NATARAJU', 'S', 'natigati31195@gmail.com', '92ce4ac4d60297162f4326cb47966a3b', '1995-08-06', 'Male', 0),
('nikhil', 'gv', 'nikhil@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b', '2016-03-28', 'Male', 0),
('Sujit', 'DK', 'sujitdk@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b', '2016-04-26', 'Male', 0);

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE `feedback` (
  `time` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `firstname` varchar(25) NOT NULL DEFAULT '',
  `lastname` varchar(25) NOT NULL DEFAULT '',
  `mobileno` varchar(13) NOT NULL DEFAULT '',
  `email` varchar(50) NOT NULL DEFAULT '',
  `message` varchar(500) NOT NULL DEFAULT '',
  `clock` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `feedback`
--

INSERT INTO `feedback` (`time`, `firstname`, `lastname`, `mobileno`, `email`, `message`, `clock`) VALUES
('2016-05-24 00:28:00', 'NATARAJU', 'S', '9066273873', 'natigati31195@gmail.com', 'Nice facilities', '00:28:00');

-- --------------------------------------------------------

--
-- Table structure for table `reservation`
--

CREATE TABLE `reservation` (
  `id` int(11) NOT NULL,
  `email` varchar(30) NOT NULL,
  `rm_no` int(11) NOT NULL,
  `checkin` date NOT NULL,
  `checkout` date NOT NULL,
  `typ` varchar(15) NOT NULL,
  `bedtype` varchar(6) NOT NULL,
  `sprice` int(11) NOT NULL,
  `dprice` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `reservation`
--

INSERT INTO `reservation` (`id`, `email`, `rm_no`, `checkin`, `checkout`, `typ`, `bedtype`, `sprice`, `dprice`) VALUES
(46, 'nata@nata.com', 100, '2016-05-06', '2016-05-18', 'delux', 'double', 0, 2200),
(47, 'nata@nata.com', 101, '2016-05-06', '2016-05-18', 'delux', 'single', 1100, 0),
(50, 'natigati31195@gmail.com', 102, '2016-05-11', '2016-05-20', 'delux', 'single', 1100, 0),
(52, 'nata@nata.com', 120, '2016-05-24', '2016-05-27', 'standard', 'double', 0, 3100),
(59, 'nata@nata.com', 120, '2016-06-01', '2016-06-16', 'standard', 'single', 2600, 0),
(60, 'nata@nata.com', 121, '2016-06-01', '2016-06-16', 'standard', 'single', 2600, 0),
(61, 'nata@nata.com', 122, '2016-06-01', '2016-06-16', 'standard', 'single', 2600, 0),
(62, 'nata@nata.com', 123, '2016-06-01', '2016-06-16', 'standard', 'single', 2600, 0),
(63, 'nata@nata.com', 124, '2016-06-01', '2016-06-16', 'standard', 'single', 2600, 0),
(64, 'nata@nata.com', 125, '2016-06-01', '2016-06-16', 'standard', 'single', 2600, 0),
(65, 'nata@nata.com', 126, '2016-06-01', '2016-06-16', 'standard', 'single', 2600, 0),
(66, 'nata@nata.com', 127, '2016-06-01', '2016-06-16', 'standard', 'single', 2600, 0),
(67, 'nata@nata.com', 128, '2016-06-01', '2016-06-16', 'standard', 'single', 2600, 0),
(68, 'nata@nata.com', 129, '2016-06-01', '2016-06-16', 'standard', 'single', 2600, 0),
(69, 'nata@nata.com', 130, '2016-06-01', '2016-06-16', 'standard', 'single', 2600, 0),
(70, 'nata@nata.com', 131, '2016-06-01', '2016-06-16', 'standard', 'double', 0, 3100),
(71, 'nata@nata.com', 132, '2016-06-01', '2016-06-16', 'standard', 'single', 2600, 0),
(72, 'nata@nata.com', 133, '2016-06-01', '2016-06-16', 'standard', 'single', 2600, 0),
(73, 'nata@nata.com', 134, '2016-06-01', '2016-06-16', 'standard', 'single', 2600, 0),
(77, 'nata@nata.com', 135, '2016-05-31', '2016-06-08', 'suite', 'single', 2200, 0),
(78, 'nata@nata.com', 135, '2016-10-18', '2016-10-26', 'suite', 'single', 2200, 0),
(79, 'nata@nata.com', 136, '2016-05-31', '2016-06-21', 'suite', 'double', 0, 3300),
(80, 'nata@nata.com', 137, '2016-05-31', '2016-06-21', 'suite', 'single', 2200, 0),
(81, 'nata@nata.com', 138, '2016-05-31', '2016-06-21', 'suite', 'single', 2200, 0),
(82, 'nata@nata.com', 139, '2016-05-31', '2016-06-21', 'suite', 'double', 0, 3300),
(83, 'nata@nata.com', 140, '2016-06-01', '2016-06-02', 'suite', 'double', 0, 3300),
(84, 'nata@nata.com', 141, '2016-06-01', '2016-06-02', 'suite', 'single', 2200, 0),
(85, 'nata@nata.com', 120, '2018-05-01', '2018-05-16', 'standard', 'double', 0, 3100),
(86, 'nata@nata.com', 121, '2018-05-01', '2018-05-16', 'standard', 'single', 2600, 0),
(87, 'nata@nata.com', 122, '2018-05-01', '2018-05-16', 'standard', 'single', 2600, 0),
(88, 'gugu@gugu.com', 123, '2016-07-13', '2016-07-15', 'standard', 'single', 2600, 0);

-- --------------------------------------------------------

--
-- Table structure for table `rooms`
--

CREATE TABLE `rooms` (
  `room_no` int(11) NOT NULL,
  `type` varchar(15) NOT NULL,
  `status` varchar(1) DEFAULT NULL,
  `chckin` date NOT NULL DEFAULT '0000-00-00',
  `chcout` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `rooms`
--

INSERT INTO `rooms` (`room_no`, `type`, `status`, `chckin`, `chcout`) VALUES
(100, 'delux', 'A', '2016-04-23', '2016-04-23'),
(101, 'delux', 'A', '2016-04-23', '2016-04-23'),
(102, 'delux', 'A', '2016-04-23', '2016-04-23'),
(103, 'delux', 'A', '2016-04-23', '2016-04-23'),
(104, 'delux', 'A', '2016-04-23', '2016-04-23'),
(105, 'delux', 'A', '2016-04-23', '2016-04-23'),
(106, 'delux', 'A', '2016-04-23', '2016-04-23'),
(107, 'delux', 'A', '2016-04-23', '2016-04-23'),
(108, 'delux', 'A', '2016-04-23', '2016-04-23'),
(109, 'delux', 'A', '2016-04-23', '2016-04-23'),
(110, 'delux', 'A', '2016-04-23', '2016-04-23'),
(111, 'delux', 'A', '2016-04-23', '2016-04-23'),
(112, 'delux', 'A', '2016-04-23', '2016-04-23'),
(113, 'delux', 'A', '2016-04-23', '2016-04-23'),
(114, 'delux', 'A', '2016-04-23', '2016-04-23'),
(115, 'delux', 'A', '2016-04-23', '2016-04-23'),
(116, 'delux', 'A', '2016-04-23', '2016-04-23'),
(117, 'delux', 'A', '2016-04-23', '2016-04-23'),
(118, 'delux', 'A', '2016-04-23', '2016-04-23'),
(119, 'delux', 'A', '2016-04-23', '2016-04-23'),
(120, 'standard', 'A', '2016-04-23', '2016-04-23'),
(121, 'standard', 'A', '2016-04-23', '2016-04-23'),
(122, 'standard', 'A', '2016-04-23', '2016-04-23'),
(123, 'standard', 'A', '2016-04-23', '2016-04-23'),
(124, 'standard', 'A', '2016-04-23', '2016-04-23'),
(125, 'standard', 'A', '2016-04-23', '2016-04-23'),
(126, 'standard', 'A', '2016-04-23', '2016-04-23'),
(127, 'standard', 'A', '2016-04-23', '2016-04-23'),
(128, 'standard', 'A', '2016-04-23', '2016-04-23'),
(129, 'standard', 'A', '2016-04-23', '2016-04-23'),
(130, 'standard', 'A', '2016-04-23', '2016-04-23'),
(131, 'standard', 'A', '2016-04-23', '2016-04-23'),
(132, 'standard', 'A', '2016-04-23', '2016-04-23'),
(133, 'standard', 'A', '2016-04-23', '2016-04-23'),
(134, 'standard', 'A', '2016-04-23', '2016-04-23'),
(135, 'suite', 'A', '2016-04-23', '2016-04-23'),
(136, 'suite', 'A', '2016-04-23', '2016-04-23'),
(137, 'suite', 'A', '2016-04-23', '2016-04-23'),
(138, 'suite', 'A', '2016-04-23', '2016-04-23'),
(139, 'suite', 'A', '2016-04-23', '2016-04-23'),
(140, 'suite', 'A', '2016-04-23', '2016-04-23'),
(141, 'suite', 'A', '2016-04-23', '2016-04-23'),
(142, 'Super Delux', 'A', '2016-04-23', '2016-04-23'),
(143, 'Super Delux', 'A', '2016-04-23', '2016-04-23'),
(144, 'Super Delux', 'A', '2016-04-23', '2016-04-23'),
(145, 'Super Delux', 'A', '2016-04-23', '2016-04-23'),
(146, 'Super Delux', 'A', '2016-04-23', '2016-04-23'),
(147, 'Super Delux', 'A', '2016-04-23', '2016-04-23'),
(148, 'Super Delux', 'A', '2016-04-23', '2016-04-23'),
(149, 'Super Delux', 'A', '2016-04-23', '2016-04-23'),
(150, 'Super Delux', 'A', '2016-04-23', '2016-04-23'),
(151, 'Super Delux', 'A', '2016-04-23', '2016-04-23');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`admin_main`);

--
-- Indexes for table `charges`
--
ALTER TABLE `charges`
  ADD PRIMARY KEY (`type`);

--
-- Indexes for table `Family`
--
ALTER TABLE `Family`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`time`),
  ADD KEY `email` (`email`);

--
-- Indexes for table `reservation`
--
ALTER TABLE `reservation`
  ADD PRIMARY KEY (`id`),
  ADD KEY `email` (`email`),
  ADD KEY `rm_no` (`rm_no`);

--
-- Indexes for table `rooms`
--
ALTER TABLE `rooms`
  ADD PRIMARY KEY (`room_no`),
  ADD KEY `type` (`type`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `reservation`
--
ALTER TABLE `reservation`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=89;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `feedback`
--
ALTER TABLE `feedback`
  ADD CONSTRAINT `feedback_ibfk_1` FOREIGN KEY (`email`) REFERENCES `Family` (`email`);

--
-- Constraints for table `reservation`
--
ALTER TABLE `reservation`
  ADD CONSTRAINT `reservation_ibfk_1` FOREIGN KEY (`email`) REFERENCES `Family` (`email`),
  ADD CONSTRAINT `reservation_ibfk_2` FOREIGN KEY (`rm_no`) REFERENCES `rooms` (`room_no`);

--
-- Constraints for table `rooms`
--
ALTER TABLE `rooms`
  ADD CONSTRAINT `rooms_ibfk_1` FOREIGN KEY (`type`) REFERENCES `charges` (`type`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
