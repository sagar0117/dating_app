-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 06, 2020 at 03:46 AM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.4.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dating_app`
--
CREATE DATABASE IF NOT EXISTS `dating_app` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `dating_app`;

-- --------------------------------------------------------

--
-- Table structure for table `favorites`
--

CREATE TABLE `favorites` (
  `UserId` int(3) NOT NULL,
  `FavoriteUserId` int(3) NOT NULL,
  `DateCreated` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `favorites`
--

INSERT INTO `favorites` (`UserId`, `FavoriteUserId`, `DateCreated`) VALUES
(5, 1, '2020-10-05'),
(5, 9, '2020-10-05');

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE `messages` (
  `MessageId` int(3) NOT NULL,
  `SenderId` int(3) NOT NULL,
  `ReceiverId` int(3) NOT NULL,
  `Content` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `messages`
--

INSERT INTO `messages` (`MessageId`, `SenderId`, `ReceiverId`, `Content`) VALUES
(3, 5, 1, 'Hi'),
(6, 5, 1, 'Hi'),
(7, 5, 6, 'Hello'),
(8, 5, 6, 'ooo'),
(9, 5, 1, '123'),
(11, 5, 9, 'Hello'),
(12, 5, 1, 'Hey, handsome!'),
(13, 1, 9, 'Hellow'),
(14, 1, 6, 'Hello'),
(15, 17, 1, 'Hello'),
(16, 5, 9, 'Hi'),
(17, 18, 1, 'Hello'),
(18, 5, 6, 'Hello'),
(19, 19, 8, 'Hi');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `RoleId` int(2) NOT NULL,
  `RoleName` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`RoleId`, `RoleName`) VALUES
(1, 'Registered User'),
(2, 'Premium User');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `UserId` int(3) NOT NULL,
  `FirstName` varchar(50) NOT NULL,
  `LastName` varchar(50) NOT NULL,
  `RoleId` int(2) NOT NULL,
  `Email` varchar(50) NOT NULL,
  `Password` varchar(50) NOT NULL,
  `Photo` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`UserId`, `FirstName`, `LastName`, `RoleId`, `Email`, `Password`, `Photo`) VALUES
(1, 'Parth', 'Amin', 1, 'pkamin55@gmail.com', '289ef0d3bf0000d61070fe468c8c8195', 'me.jpg'),
(5, 'Janki', 'Jariwala', 2, 'jj@gmail.com', '597a215bc8797c90fb77ae656a7d68a7', 'woman1.jpg'),
(6, 'Sagar', 'Parmar', 1, 'sp@gmail.com', '41ed44e3038dbeee7d2ffaa7f51d8a4b', 'man2.jpg'),
(7, 'John', 'Bink', 1, 'john@gmail.com', '202cb962ac59075b964b07152d234b70', 'man3.jpg'),
(8, 'Alex', 'Green', 1, 'alex@gmail.com', '202cb962ac59075b964b07152d234b70', 'man5.jpg'),
(9, 'Liam', 'Sophia', 1, 'liam@gmail.com', '202cb962ac59075b964b07152d234b70', 'woman3.jpg'),
(10, 'Oliver', 'Ava', 1, 'oliver@gmail.com', '202cb962ac59075b964b07152d234b70', 'woman4.jpg'),
(11, 'Sophie', 'Ava', 1, 'sophie@gmail.com', '202cb962ac59075b964b07152d234b70', 'woman2.jpg'),
(12, 'Harry', 'Wright', 1, 'harry@gmail.com', '202cb962ac59075b964b07152d234b70', 'man4.jpg'),
(13, 'Peter', 'Green', 1, 'peter@gmail.com', 'e2fc714c4727ee9395f324cd2e7f331f', 'man1.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `favorites`
--
ALTER TABLE `favorites`
  ADD UNIQUE KEY `FavoriteUserId` (`FavoriteUserId`);

--
-- Indexes for table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`MessageId`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`RoleId`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`UserId`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `MessageId` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `UserId` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
--
-- Database: `phpmyadmin`
--
CREATE DATABASE IF NOT EXISTS `phpmyadmin` DEFAULT CHARACTER SET utf8 COLLATE utf8_bin;
USE `phpmyadmin`;

-- --------------------------------------------------------
