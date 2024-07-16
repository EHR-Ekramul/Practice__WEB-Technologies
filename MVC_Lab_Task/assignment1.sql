-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 16, 2024 at 10:40 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `my_app`
--

-- --------------------------------------------------------

--
-- Table structure for table `assignment1`
--

CREATE TABLE `assignment1` (
  `id` int(11) NOT NULL,
  `firstName` varchar(50) NOT NULL,
  `lastName` varchar(100) DEFAULT NULL,
  `gender` varchar(10) NOT NULL,
  `fatherName` varchar(100) NOT NULL,
  `motherName` varchar(100) NOT NULL,
  `bloodGroup` varchar(5) NOT NULL,
  `religion` varchar(15) NOT NULL,
  `email` varchar(100) NOT NULL,
  `phone` varchar(50) NOT NULL,
  `website` varchar(100) DEFAULT NULL,
  `address` varchar(500) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(50) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `assignment1`
--

INSERT INTO `assignment1` (`id`, `firstName`, `lastName`, `gender`, `fatherName`, `motherName`, `bloodGroup`, `religion`, `email`, `phone`, `website`, `address`, `username`, `password`, `status`) VALUES
(1, 'Eshraful', 'Haque', 'Male', 'Uzzal Hossain', 'Taslima Akter', 'A+', 'Islam', 'eshraful@gmail.com', '01732326075', 'eshraful.com', 'Biswaswh Betka, 1900, Tangail, Bangladesh', 'eshraful', 'eshraful123', 1),
(2, 'Ekramul', 'Haque', 'Male', 'Alamgir Hossain', 'Rubi Begum', 'B-', 'Islam', 'ehr.ekramul@gmail.com', '01772317392', 'ehrmultiverse.com', 'Khilkhet Moddhopara, 1229, Dhaka, Bangladesh', 'ekramulrifat', 'ekramulrifat123', 1),
(5, 'Zahidul', 'Islam', 'Male', 'MD. Zahangir Alam', 'Salma Begum', 'A+', 'Islam', 'mdzahidofficial@gmail.com', '01756983077', 'zahidul.com', 'Khilkhet Moddhopara, 1229, Dhaka, Bangladesh', 'zahidksa', 'zahidksa123', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `assignment1`
--
ALTER TABLE `assignment1`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `phone` (`phone`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `assignment1`
--
ALTER TABLE `assignment1`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
