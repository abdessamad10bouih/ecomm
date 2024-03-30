-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 30, 2024 at 11:46 AM
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
-- Database: `ws_concours`
--

-- --------------------------------------------------------

--
-- Table structure for table `produit`
--

CREATE TABLE `produit` (
  `RefPdt` varchar(10) NOT NULL,
  `libPdt` varchar(50) NOT NULL,
  `Prix` decimal(10,2) NOT NULL,
  `Qte` int(11) NOT NULL,
  `description` varchar(255) DEFAULT NULL,
  `image` varchar(50) DEFAULT NULL,
  `type` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `produit`
--

INSERT INTO `produit` (`RefPdt`, `libPdt`, `Prix`, `Qte`, `description`, `image`, `type`) VALUES
('1', 'PHONE', 1000.00, 5, 'IPHONE 11', 'iphone.jpg', 'Electronique'),
('10', 'YAMAHA', 2000.00, 5, 'YAMAHA ', 'yamaha-logo-yamaha-icon-transparent-free-png.webp', 'Electronique'),
('P0202', 'Console', 1000.00, 10, 'PS4 New', 'ps4.jpg', 'Electronique');

-- --------------------------------------------------------

--
-- Table structure for table `typeproduit`
--

CREATE TABLE `typeproduit` (
  `type` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `typeproduit`
--

INSERT INTO `typeproduit` (`type`) VALUES
('Electronique'),
('Informatique');

-- --------------------------------------------------------

--
-- Table structure for table `utilisateur`
--

CREATE TABLE `utilisateur` (
  `logins` varchar(20) NOT NULL,
  `pass` varchar(20) NOT NULL,
  `type` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `utilisateur`
--

INSERT INTO `utilisateur` (`logins`, `pass`, `type`) VALUES
('admin', 'admin', 'administrateur'),
('fadil', '1111', 'user'),
('teste', 'teste', 'user'),
('user', 'user', 'user'),
('user05', '0000', 'user');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `produit`
--
ALTER TABLE `produit`
  ADD PRIMARY KEY (`RefPdt`),
  ADD KEY `type` (`type`);

--
-- Indexes for table `typeproduit`
--
ALTER TABLE `typeproduit`
  ADD PRIMARY KEY (`type`);

--
-- Indexes for table `utilisateur`
--
ALTER TABLE `utilisateur`
  ADD PRIMARY KEY (`logins`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `produit`
--
ALTER TABLE `produit`
  ADD CONSTRAINT `produit_ibfk_1` FOREIGN KEY (`type`) REFERENCES `typeproduit` (`type`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
