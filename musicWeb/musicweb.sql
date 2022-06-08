-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 07, 2022 at 10:10 PM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.1.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `musicweb`
--

-- --------------------------------------------------------

--
-- Table structure for table `artists`
--

CREATE TABLE `artists` (
  `id` int(11) NOT NULL,
  `Name` varchar(255) NOT NULL,
  `Date of Birth` date NOT NULL,
  `Bio` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `artists`
--

INSERT INTO `artists` (`id`, `Name`, `Date of Birth`, `Bio`) VALUES
(1, 'Lewis capaidi', '1995-06-17', 'Sample Data'),
(2, 'Post Malone', '1991-06-12', 'Artist Bio'),
(3, 'Justin Bieber', '1995-06-13', 'Artist Details');

-- --------------------------------------------------------

--
-- Table structure for table `songs`
--

CREATE TABLE `songs` (
  `id` int(11) NOT NULL,
  `Song_Name` char(255) DEFAULT NULL,
  `DateOfRelease` date DEFAULT NULL,
  `Artist_Name` char(255) DEFAULT NULL,
  `artwork` varchar(2000) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `songs`
--

INSERT INTO `songs` (`id`, `Song_Name`, `DateOfRelease`, `Artist_Name`, `artwork`) VALUES
(1001, 'Someone You Loved', '2019-07-21', 'Lewis capaidi', 'https://i1.sndcdn.com/artworks-5VCxiNQdKysNTV2y-Qu5QwQ-t500x500.jpg'),
(1005, 'Circle', '2022-06-15', 'Justin Bieber', 'https://upload.wikimedia.org/wikipedia/commons/thumb/b/b1/Justin_Bieber_in_Rosemont%2C_Illinois_%282015%29.jpg/1200px-Justin_Bieber_in_Rosemont%2C_Illinois_%282015%29.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `artists`
--
ALTER TABLE `artists`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `songs`
--
ALTER TABLE `songs`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `artists`
--
ALTER TABLE `artists`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `songs`
--
ALTER TABLE `songs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1006;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
