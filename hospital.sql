-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 04, 2021 at 07:40 AM
-- Server version: 10.4.18-MariaDB
-- PHP Version: 8.0.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hospital`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_det`
--

CREATE TABLE `admin_det` (
  `id` int(11) NOT NULL,
  `a_email` varchar(200) NOT NULL,
  `a_password` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin_det`
--

INSERT INTO `admin_det` (`id`, `a_email`, `a_password`) VALUES
(1, 'admin@gmail.com', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `user_det`
--

CREATE TABLE `user_det` (
  `id` int(11) NOT NULL,
  `name` varchar(300) NOT NULL,
  `email` varchar(300) NOT NULL,
  `phone` varchar(300) NOT NULL,
  `gender` text NOT NULL,
  `file` varchar(300) NOT NULL,
  `age` varchar(300) NOT NULL,
  `password` varchar(300) NOT NULL,
  `login` varchar(300) NOT NULL,
  `created_date` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_det`
--

INSERT INTO `user_det` (`id`, `name`, `email`, `phone`, `gender`, `file`, `age`, `password`, `login`, `created_date`) VALUES
(10, 'veeresh', 'a@b.com', '9154793843', 'male', 'upload/job.png', '25', 'password', 'offline', ''),
(11, 'k veeresh kumar', 'veeresh@gmail.com', '9154793843', 'male', 'upload/WhatsApp Image 2021-03-19 at 8.08.05 AM.jpeg', '25', 'veeresh', 'offline', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin_det`
--
ALTER TABLE `admin_det`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_det`
--
ALTER TABLE `user_det`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin_det`
--
ALTER TABLE `admin_det`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `user_det`
--
ALTER TABLE `user_det`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
