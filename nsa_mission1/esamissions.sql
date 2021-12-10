-- phpMyAdmin SQL Dump
-- version 4.8.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 10, 2021 at 10:59 AM
-- Server version: 10.1.32-MariaDB
-- PHP Version: 7.2.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `esamissions`
--

-- --------------------------------------------------------

--
-- Table structure for table `astronaut`
--

CREATE TABLE `astronaut` (
  `astronaut_ID` int(11) NOT NULL,
  `name` text,
  `no_missions` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `astronaut`
--

INSERT INTO `astronaut` (`astronaut_ID`, `name`, `no_missions`) VALUES
(1, 'Mollie', 10),
(2, 'Dillan', 7),
(3, 'Thema', 51),
(4, 'Amber', 4),
(5, 'Fernando', 9),
(8, 'Eamon', 10),
(9, 'Jack', 15),
(10, 'Jack1', 11);

-- --------------------------------------------------------

--
-- Table structure for table `attends`
--

CREATE TABLE `attends` (
  `Mission_ID` int(11) NOT NULL,
  `astronaut_ID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `attends`
--

INSERT INTO `attends` (`Mission_ID`, `astronaut_ID`) VALUES
(1, 1),
(1, 5),
(1, 8),
(2, 2),
(4, 3);

-- --------------------------------------------------------

--
-- Table structure for table `mission`
--

CREATE TABLE `mission` (
  `Mission_ID` int(11) NOT NULL,
  `Destination` text,
  `Launch_date` date DEFAULT NULL,
  `type` text,
  `Crew_size` int(11) DEFAULT NULL,
  `Target_ID` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mission`
--

INSERT INTO `mission` (`Mission_ID`, `Destination`, `Launch_date`, `type`, `Crew_size`, `Target_ID`) VALUES
(1, 'pluto', '1996-08-21', 'group', 15, 3),
(2, 'mars', '1983-04-05', 'satellite', 10, 1),
(3, 'moon', '1999-01-01', 'group', 52, 4),
(4, 'jupiter', '2021-03-13', 'group', 48, 2),
(5, 'Moon', '0000-00-00', 'Group', 10, 1);

-- --------------------------------------------------------

--
-- Table structure for table `targets`
--

CREATE TABLE `targets` (
  `Target_ID` int(11) NOT NULL,
  `Name` text,
  `First_mission` text,
  `type` text,
  `No_mission` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `targets`
--

INSERT INTO `targets` (`Target_ID`, `Name`, `First_mission`, `type`, `No_mission`) VALUES
(1, 'RedPlanet', '1996-01-02', 'space', 2),
(2, 'Alack', '1992-06-13', 'space', 3),
(3, 'TinyTarget', '1984-02-02', 'space', 1),
(4, 'Luna', '1965-02-04', 'space', 6),
(5, 'BluePlanet', '2003', 'space', 17),
(6, 'Eamon', '2000', 'spacewalk', 5),
(7, 'Eamon', '2008', 'spacewalk', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `astronaut`
--
ALTER TABLE `astronaut`
  ADD PRIMARY KEY (`astronaut_ID`),
  ADD KEY `Foreign` (`no_missions`) USING BTREE;

--
-- Indexes for table `attends`
--
ALTER TABLE `attends`
  ADD PRIMARY KEY (`Mission_ID`,`astronaut_ID`),
  ADD KEY `fk_attends_astroID` (`astronaut_ID`);

--
-- Indexes for table `mission`
--
ALTER TABLE `mission`
  ADD PRIMARY KEY (`Mission_ID`),
  ADD KEY `fk_mission_targetID` (`Target_ID`);

--
-- Indexes for table `targets`
--
ALTER TABLE `targets`
  ADD PRIMARY KEY (`Target_ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `astronaut`
--
ALTER TABLE `astronaut`
  MODIFY `astronaut_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `mission`
--
ALTER TABLE `mission`
  MODIFY `Mission_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `targets`
--
ALTER TABLE `targets`
  MODIFY `Target_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `attends`
--
ALTER TABLE `attends`
  ADD CONSTRAINT `fk_attends_astroID` FOREIGN KEY (`astronaut_ID`) REFERENCES `astronaut` (`astronaut_ID`),
  ADD CONSTRAINT `fk_attends_missionID` FOREIGN KEY (`Mission_ID`) REFERENCES `mission` (`Mission_ID`);

--
-- Constraints for table `mission`
--
ALTER TABLE `mission`
  ADD CONSTRAINT `fk_mission_targetID` FOREIGN KEY (`Target_ID`) REFERENCES `targets` (`Target_ID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
