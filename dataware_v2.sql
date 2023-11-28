-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 28, 2023 at 09:41 PM
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
-- Database: `dataware_v2`
--

-- --------------------------------------------------------

--
-- Table structure for table `projects`
--

CREATE TABLE `projects` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `date_start` date NOT NULL,
  `date_end` date NOT NULL,
  `status` int(1) NOT NULL DEFAULT 0,
  `productOwner` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `projects`
--

INSERT INTO `projects` (`id`, `name`, `date_start`, `date_end`, `status`, `productOwner`) VALUES
(1, 'dataWare', '2023-12-15', '2024-03-02', 0, 15);

-- --------------------------------------------------------

--
-- Table structure for table `teams`
--

CREATE TABLE `teams` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `created-at` date NOT NULL DEFAULT current_timestamp(),
  `description` longtext NOT NULL,
  `projectId` int(11) DEFAULT NULL,
  `scrumMaster` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `teams`
--

INSERT INTO `teams` (`id`, `name`, `created-at`, `description`, `projectId`, `scrumMaster`) VALUES
(1, 'nightOwels', '2023-11-28', 'lorem ipsum', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `fname` varchar(25) NOT NULL,
  `lname` varchar(25) NOT NULL,
  `birthdate` date DEFAULT NULL,
  `service` varchar(25) NOT NULL,
  `adress` varchar(100) DEFAULT NULL,
  `tel` varchar(20) NOT NULL,
  `email` varchar(30) NOT NULL,
  `password` varchar(20) NOT NULL,
  `role` int(1) NOT NULL DEFAULT 0,
  `teamId` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `fname`, `lname`, `birthdate`, `service`, `adress`, `tel`, `email`, `password`, `role`, `teamId`) VALUES
(1, 'adam', 'smith', '1994-01-22', 'CEO', '4, Privet drive', '0711223344', 'adam94@gmail.com', 'cGFzc3dvcmQxMjM=', 3, NULL),
(2, 'Tana', 'Oneal', NULL, 'Rhiannon Coffey', NULL, '0762384425', 'hyvyrymy@mailinator.com', 'd2lnaXd1Y28=', 0, NULL),
(3, 'Adria', 'Ferguson', NULL, 'Chaim Bowers', NULL, '0629718852', 'fatetek@mailinator.com', 'cGFoeW1lbHk=', 2, NULL),
(4, 'Linda', 'Orr', NULL, 'Cara Brown', NULL, '0728712402', 'bemu@mailinator.com', 'aG9weWt5cGE=', 0, NULL),
(5, 'Cara', 'Mcknight', NULL, 'Orli Cobb', NULL, '0791482598', 'hicycob@mailinator.com', 'amVnb2dhcmk=', 0, NULL),
(6, 'Brent', 'Bradford', NULL, 'Elizabeth Deleon', NULL, '0683537068', 'beliqix@mailinator.com', 'Y3ltaW15bmU=', 0, NULL),
(7, 'Lillian', 'Zimmerman', NULL, 'Jolene Lott', NULL, '0648261466', 'giviqo@mailinator.com', 'd2Ftb25hZ2E=', 1, NULL),
(8, 'Hayley', 'Snyder', NULL, 'Zelda Kirk', NULL, '+1 (515) 353-5608', 'tyjetigu@mailinator.com', 'a3lreWxlcmU=', 0, NULL),
(9, 'Liberty', 'Roberson', NULL, 'Zephania Burke', NULL, '+1 (924) 523-5544', 'zymodydesi@mailinator.com', 'anl0eXNldmU=', 0, NULL),
(10, 'Quyn', 'Cantrell', NULL, 'Holmes Harding', NULL, '+1 (239) 821-5284', 'qohal@mailinator.com', 'bm9jYXNpeG8=', 0, NULL),
(11, 'Maile', 'Carney', NULL, 'Mari Foley', NULL, '+1 (348) 545-3307', 'ricyfily@mailinator.com', 'em93aXR5eG8=', 0, NULL),
(12, 'Wilma', 'Stephens', NULL, 'Travis Gomez', NULL, '+1 (651) 733-7252', 'bugux@mailinator.com', 'a2FodWtpbWE=', 0, NULL),
(14, 'Orlando', 'Randall', NULL, 'Portia Davidson', NULL, '+1 (205) 662-4694', 'kumew@mailinator.com', 'bGVxb21pbmE=', 0, NULL),
(15, 'Zineb', 'Machrouh', NULL, 'Full-Stack Dev', NULL, '0586742569', 'zineb.m@gmail.com', 'cGFzc3dvcmQxMjM=', 0, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `projects`
--
ALTER TABLE `projects`
  ADD PRIMARY KEY (`id`),
  ADD KEY `productOwner` (`productOwner`);

--
-- Indexes for table `teams`
--
ALTER TABLE `teams`
  ADD PRIMARY KEY (`id`),
  ADD KEY `scrumMaster` (`scrumMaster`),
  ADD KEY `projectId` (`projectId`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD KEY `teamId` (`teamId`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `projects`
--
ALTER TABLE `projects`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `teams`
--
ALTER TABLE `teams`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `projects`
--
ALTER TABLE `projects`
  ADD CONSTRAINT `productOwner` FOREIGN KEY (`productOwner`) REFERENCES `users` (`id`);

--
-- Constraints for table `teams`
--
ALTER TABLE `teams`
  ADD CONSTRAINT `projectId` FOREIGN KEY (`projectId`) REFERENCES `projects` (`id`),
  ADD CONSTRAINT `scrumMaster` FOREIGN KEY (`scrumMaster`) REFERENCES `users` (`id`);

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `teamId` FOREIGN KEY (`teamId`) REFERENCES `teams` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
