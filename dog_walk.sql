-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 25, 2022 at 10:51 AM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.1.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `new_dog_walk`
--

-- --------------------------------------------------------

--
-- Table structure for table `notebook`
--

CREATE TABLE `notebook` (
                            `id_notebook` int(8) NOT NULL,
                            `id_reservation` int(8) NOT NULL,
                            `id_walker` int(8) NOT NULL,
                            `id_user` int(8) NOT NULL,
                            `path` text NOT NULL,
                            `duration` int(11) NOT NULL,
                            `walk_description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `reservation`
--

CREATE TABLE `reservation` (
                               `id_reservation` int(8) NOT NULL,
                               `id_walker` int(8) NOT NULL,
                               `id_user` int(8) NOT NULL,
                               `date` datetime NOT NULL,
                               `start_location` varchar(40) NOT NULL,
                               `end_location` varchar(40) NOT NULL,
                               `dogs_breed` varchar(40) NOT NULL,
                               `dogs_name` varchar(40) NOT NULL,
                               `dogs_gender` char(1) NOT NULL,
                               `dogs_age` int(40) NOT NULL,
                               `specifics` varchar(255) NOT NULL,
                               `description` text NOT NULL,
                               `is_finished` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
                        `id_user` int(8) NOT NULL,
                        `first_name` varchar(20) NOT NULL,
                        `last_name` varchar(20) NOT NULL,
                        `email` varchar(40) NOT NULL,
                        `password` varchar(40) NOT NULL,
                        `phone_number` varchar(20) NOT NULL,
                        `address` varchar(40) NOT NULL,
                        `verified` int(8) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `verify_user`
--

CREATE TABLE `verify_user` (
                               `id_verification` int(8) NOT NULL,
                               `is_verified` tinyint(1) NOT NULL DEFAULT 0,
                               `verification_code` varchar(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `walker`
--

CREATE TABLE `walker` (
                          `id_walker` int(8) NOT NULL,
                          `first_name` varchar(20) NOT NULL,
                          `last_name` varchar(20) NOT NULL,
                          `email` varchar(40) NOT NULL,
                          `password` varchar(40) NOT NULL,
                          `phone_number` varchar(20) NOT NULL,
                          `address` varchar(40) NOT NULL,
                          `biography` text NOT NULL,
                          `favorite_breeds` text NOT NULL,
                          `picture` varchar(40) DEFAULT NULL,
                          `verified` int(8) DEFAULT NULL,
                          `active` tinyint(1) NOT NULL DEFAULT 0,
                          `rate` tinyint(10) DEFAULT NULL,
                          `number_of_walks` int(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `notebook`
--
ALTER TABLE `notebook`
    ADD PRIMARY KEY (`id_notebook`),
  ADD KEY `id_reservation` (`id_reservation`),
  ADD KEY `id_walker` (`id_walker`),
  ADD KEY `id_user` (`id_user`);

--
-- Indexes for table `reservation`
--
ALTER TABLE `reservation`
    ADD PRIMARY KEY (`id_reservation`),
  ADD KEY `id_walker` (`id_walker`),
  ADD KEY `id_user` (`id_user`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
    ADD PRIMARY KEY (`id_user`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `password` (`password`),
  ADD UNIQUE KEY `phone_number` (`phone_number`),
  ADD KEY `verified` (`verified`);

--
-- Indexes for table `verify_user`
--
ALTER TABLE `verify_user`
    ADD PRIMARY KEY (`id_verification`),
  ADD UNIQUE KEY `verification_code` (`verification_code`);

--
-- Indexes for table `walker`
--
ALTER TABLE `walker`
    ADD PRIMARY KEY (`id_walker`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `password` (`password`),
  ADD UNIQUE KEY `phone_number` (`phone_number`),
  ADD KEY `verified` (`verified`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `notebook`
--
ALTER TABLE `notebook`
    MODIFY `id_notebook` int(8) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `reservation`
--
ALTER TABLE `reservation`
    MODIFY `id_reservation` int(8) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
    MODIFY `id_user` int(8) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `verify_user`
--
ALTER TABLE `verify_user`
    MODIFY `id_verification` int(8) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `walker`
--
ALTER TABLE `walker`
    MODIFY `id_walker` int(8) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `notebook`
--
ALTER TABLE `notebook`
    ADD CONSTRAINT `notebook_ibfk_1` FOREIGN KEY (`id_reservation`) REFERENCES `reservation` (`id_reservation`),
  ADD CONSTRAINT `notebook_ibfk_2` FOREIGN KEY (`id_walker`) REFERENCES `walker` (`id_walker`),
  ADD CONSTRAINT `notebook_ibfk_3` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`);

--
-- Constraints for table `reservation`
--
ALTER TABLE `reservation`
    ADD CONSTRAINT `reservation_ibfk_1` FOREIGN KEY (`id_walker`) REFERENCES `walker` (`id_walker`),
  ADD CONSTRAINT `reservation_ibfk_2` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`);

--
-- Constraints for table `user`
--
ALTER TABLE `user`
    ADD CONSTRAINT `user_ibfk_1` FOREIGN KEY (`verified`) REFERENCES `verify_user` (`id_verification`);

--
-- Constraints for table `walker`
--
ALTER TABLE `walker`
    ADD CONSTRAINT `walker_ibfk_1` FOREIGN KEY (`verified`) REFERENCES `verify_user` (`id_verification`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
