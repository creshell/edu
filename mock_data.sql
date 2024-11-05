-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 25, 2024 at 10:54 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mock_data`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `username`, `password`) VALUES
(1, 'admin', '$2y$10$ckRHP0Jv5DSMuWbd8oWT8OsJl8C6YzEInR4eSQBJ4zk6xshBWn7sC');

-- --------------------------------------------------------

--
-- Table structure for table `mock_data`
--

CREATE TABLE `mock_data` (
  `given_name` varchar(50) DEFAULT NULL,
  `last_name` varchar(50) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `contact_no` varchar(50) DEFAULT NULL,
  `address` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `mock_data`
--

INSERT INTO `mock_data` (`given_name`, `last_name`, `email`, `contact_no`, `address`) VALUES
('Devin', 'Hawkeridge', 'dhawkeridge0@list-manage.com', '+62 907 870 3944', '23 Longview Circle'),
('Janot', 'McGuckin', 'jmcguckin1@archive.org', '+84 350 589 4937', '25 Pond Junction'),
('Milli', 'Alabaster', 'malabaster2@youtu.be', '+55 978 358 7020', '70849 Dovetail Way'),
('Bernard', 'Sellers', 'bsellers3@jugem.jp', '+52 128 361 5032', '527 Vidon Drive'),
('Timofei', 'Le Noir', 'tlenoir4@angelfire.com', '+63 607 669 4928', '4 Barnett Hill'),
('Elka', 'Cammish', 'ecammish5@walmart.com', '+63 558 357 1405', '97 Fairfield Point'),
('Tiffy', 'Copperwaite', 'tcopperwaite6@phoca.cz', '+55 112 391 6432', '24247 Merry Park'),
('Chauncey', 'Shevell', 'cshevell7@ihg.com', '+86 972 124 6827', '5091 Jay Drive'),
('Darci', 'Cornels', 'dcornels8@omniture.com', '+62 859 285 4084', '75 New Castle Avenue'),
('Roxi', 'Dosdell', 'rdosdell9@google.com.au', '+7 484 821 4529', '1244 Sutteridge Circle');

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`id`, `name`, `email`, `username`, `password`) VALUES
(1, '', '', 'student', '$2y$10$ckRHP0Jv5DSMuWbd8oWT8OsJl8C6YzEInR4eSQBJ4zk6xshBWn7sC'),
(2, 'qwe', 'qwerty@gmail.com', 'qwerty', '$2y$10$ie93ybfRDj0pr5hdW51RjOb7IIBjEaGg4u3u4cMY1mg918erVAHQ6'),
(4, 'qwerty', 'qwerty@gmail.com', 'qwerty123', '$2y$10$78mBmzAQuepPn1uN3XwXQeJP1igdNvN8ftT5ep9kRhBkURjiT4T5C'),
(5, 'qweqweqwe', 'qwerty11@gmail.com', 'qweqwe', '$2y$10$Zf5cCYlhnmhf5sAR2TSXqusP98ay2N2BEikqSnbuLO6UrYzszf.BS'),
(6, 'Kayle Louise', 'kaylexd6@gmail.com', 'kaylexd', '$2y$10$QGAJoyHPtX4qSt74OC4pvO/YdlZlwepoW5K7qD5ZOhOM6y4XziBIO'),
(7, '', '', '', '$2y$10$8m4b1b5SMMyjFdy0uhrM5OCtPAiAZyNTFfCnDaXakcdLGGC5LZ9ZS'),
(9, 'qwee', 'qwerty@gmail.com', 'qwe', '$2y$10$agcLV4VtJbNJ6Xl5qQ.HE.qxCU6UNpjZvj76VVN41ofKwTRQ4S.Me');

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `id` int(11) NOT NULL,
  `sid` varchar(30) NOT NULL,
  `sfname` varchar(50) NOT NULL,
  `smname` varchar(50) NOT NULL,
  `slname` varchar(50) NOT NULL,
  `sgender` varchar(10) NOT NULL,
  `sdbirth` varchar(10) NOT NULL,
  `s_pass` varchar(60) NOT NULL,
  `sfix` varchar(10) NOT NULL,
  `saddress` text NOT NULL,
  `scontact` varchar(15) NOT NULL,
  `sctship` varchar(50) NOT NULL,
  `scourse` varchar(50) NOT NULL,
  `syear` varchar(50) NOT NULL,
  `semail` varchar(50) NOT NULL,
  `simg` varchar(60) NOT NULL,
  `s_account_status` varchar(20) DEFAULT 'Pending',
  `s_scholarship_type` varchar(20) NOT NULL,
  `is_scholar` tinyint(1) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`id`, `sid`, `sfname`, `smname`, `slname`, `sgender`, `sdbirth`, `s_pass`, `sfix`, `saddress`, `scontact`, `sctship`, `scourse`, `syear`, `semail`, `simg`, `s_account_status`, `s_scholarship_type`, `is_scholar`) VALUES
(1, '', 'John', 'Middle', 'Doe', '', '', '', '', '', '1234567890', '', '', '', '', '', 'Approved', '', 1),
(2, '', 'John Doe', '231', 'Computer Science', 'Male', '2024-09-05', '', 'N/A', 'asdasd', '1231231232', 'A', '', '', '', '', 'Rejected', '', 1),
(5, '', '123', '231', '123', 'Male', '2024-09-02', '', 'N/A', '12', '123123123123', '1', '', '', 'qwerty@gmail.com', '', 'Approved', '', 1),
(6, '', 'Ky', 'Y', 'K', 'Male', '2024-09-15', '', 'N/A', 'asd', '12321323112', 'A', '', '', 'qwerty@gmail.com', '66f17aecc8c98.jpg', 'Rejected', '', 1),
(7, '', '123', '231', '123', 'Male', '2024-10-06', '', 'N/A', '123', '123123123123', 'A', '', '', 'qwerty@gmail.com', '6703f38e1afca.jpg', 'Approved', '', 1),
(8, '', '123', '231', '123', 'Male', '2024-09-29', '', 'N/A', '213', '12321323112', 'A', '', '', 'qwerty@gmail.com', '6703f8144ff78.jpg', 'Approved', '', 1),
(11, '', 'ad', 'd', 'dddd', 'Male', '2024-10-13', '', 'N/A', 'asd', '12321323112', 's', '', '', 'qwerty@gmail.com', '6711fb8719b84.jpg', '', '', 1),
(12, '', '123', '123', '123', 'Male', '2024-10-09', '', 'N/A', '312', '12321323112', '231', '', '', 'qwerty@gmail.com', '671200c4b106c.png', 'Approved', '', 0),
(15, '', 'CHED', '1', '1', 'Male', '2024-10-21', '', 'N/A', '1', '12321323112', '1', '', '', 'qwerty1111@gmail.com', '67177bd6bc9d9.jpg', '', 'CHED', 0),
(16, 'SCC-123123', 'ASD', '', 'ASD', '', '', '$2y$10$1A9I6.nL1NOxlW1fSLYmEubp1KQw/lkGjWZRdePu5X/q6kWVTdntm', '', '', '', '', '', '', 'asd@gmail.com', 'img/yala.JPG', '', '', 0),
(17, 'SCC-000123', 'Kayle', '', 'Lumapay', '', '', '$2y$10$OOl6BeI7XMco3f95JFMji.0CxbIcxRRvT4Gg09sJrCVmc7ULtqBhS', '', '', '', '', '', '', 'kaylexd6@gmail.com', 'img/6717d58438061.png', 'Rejected', '', 0),
(18, 'SCC-00012333', 'ASD1', '', 'ASD1', '', '', '$2y$10$KMHvL8rDXAFPB58JFhMAe.L3jt43Rb4aoZ0VyfzeOR.ZCPLoW6AJG', '', '', '', '', '', '', 'asd@gmail.com', 'img/6718b2d354252.jpg', 'Rejected', '', 0),
(19, 'SCC-0001233', 'Cruz', '', 'Dela', '', '', '$2y$10$fZsJygI1buScvPUNWzj/T.6nlqwwDzKRPtPwksCeX6gK5CUYXTUpa', '', '', '', '', '', '', 'del@gmail.com', 'img/6718b34e89d11.jpg', 'Approved', '', 1),
(20, 'SCC-0002312', 'test', '', 'test', '', '', '$2y$10$XM1jzkxIgNUr9p.kSq6K1eXcAYqp9G4I35wjCUEZEOrWyaCtweVeC', '', '', '', '', '', '', 'test@gmail.com', 'img/6718c14bdaaec.jpg', 'Pending', '', 0),
(21, 'SCC-00012332', 'Qwe', '', 'Qwerty', '', '', '$2y$10$Hb1XkB.IzWEMTW0hYXgQ/OUA856cqnOz8byL3vRLW9Gk9kQ0KIg2S', '', '', '', '', '', '', 'qwee@gmail.com', 'img/6718c1f553e32.jpg', 'Pending', '', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `student`
--
ALTER TABLE `student`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `students`
--
ALTER TABLE `students`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
