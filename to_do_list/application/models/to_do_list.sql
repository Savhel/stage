-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jun 21, 2022 at 11:49 AM
-- Server version: 5.7.33
-- PHP Version: 8.1.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `to_do_list`
--

-- --------------------------------------------------------

--
-- Table structure for table `taches`
--

CREATE TABLE `taches` (
  `idTask` int(11) NOT NULL,
  `nameTask` varchar(30) NOT NULL,
  `descriptionTask` varchar(100) NOT NULL,
  `hourTask` time NOT NULL,
  `statutTask` tinyint(1) NOT NULL,
  `owner` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `taches`
--

INSERT INTO `taches` (`idTask`, `nameTask`, `descriptionTask`, `hourTask`, `statutTask`, `owner`) VALUES
(1, 'azerty', 'aezrearareez', '20:49:21', 1, 8),
(2, 'apprendre Laravel', 'azerty', '10:02:00', 1, 8),
(3, 'apprendre ', 'azeazeaezae', '10:09:00', 1, 8),
(4, 'apprendre Laravel', 'life is code ', '17:33:00', 0, 8);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `idUsers` int(11) NOT NULL,
  `ipAdress` varchar(100) NOT NULL,
  `firstName` varchar(30) NOT NULL,
  `lastName` varchar(30) NOT NULL,
  `phone` varchar(13) NOT NULL,
  `email` varchar(40) NOT NULL,
  `password` varchar(100) NOT NULL,
  `gender` tinyint(1) NOT NULL,
  `beginingHours` time NOT NULL,
  `finishingHours` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`idUsers`, `ipAdress`, `firstName`, `lastName`, `phone`, `email`, `password`, `gender`, `beginingHours`, `finishingHours`) VALUES
(8, '::1', 'blhack', 'root', '690295069', 'blife1255@gmail.com', '$2y$10$SK1K1P7IXXlhgdtnE68nB.UqhSZNqF5br8yr3B8WRdxaohXguK906', 0, '09:38:00', '17:00:00');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `taches`
--
ALTER TABLE `taches`
  ADD PRIMARY KEY (`idTask`),
  ADD KEY `idUsers` (`owner`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`idUsers`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `taches`
--
ALTER TABLE `taches`
  MODIFY `idTask` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `idUsers` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
