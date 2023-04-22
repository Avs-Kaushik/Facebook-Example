-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 05, 2023 at 11:16 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `kaushik`
--

-- --------------------------------------------------------

--
-- Table structure for table `chats`
--

CREATE TABLE `chats` (
  `send` varchar(100) NOT NULL,
  `receive` varchar(100) NOT NULL,
  `msg` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `chats`
--

INSERT INTO `chats` (`send`, `receive`, `msg`) VALUES
('avskaushik123@gmail.com', 'kanna@gmail.com', 'Hello!'),
('kanna@gmail.com', 'avskaushik123@gmail.com', 'Hello all'),
('kanna@gmail.com', 'avskaushik123@gmail.com', 'Waiting'),
('avskaushik123@gmail.com', 'akhil@gmail.com', 'Hey Akhil'),
('deepu@gmail.com', 'avskaushik123@gmail.com', 'Well Done!'),
('deepu@gmail.com', 'akhil@gmail.com', 'Lets discuss about the project'),
('akhil@gmail.com', 'avskaushik123@gmail.com', 'Welcome to Google');

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `name` varchar(100) NOT NULL,
  `imgno` bigint(100) NOT NULL,
  `file` varchar(100) NOT NULL,
  `cmt` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`name`, `imgno`, `file`, `cmt`) VALUES
('Harsha', 1, 'uploads/6.jpg', 'Rey evarra meerantha'),
('Harsha', 2, 'uploads/7.jpg', 'Attt Akhil Hasan'),
('Akhil', 4, 'uploads/facebook.jpg', 'Google ki ra appudu cheptha'),
('Kanna', 6, 'uploads/images.jpg', 'My fav so far'),
('Kaushik', 3, 'uploads/1.jpg', 'Bavundanna Nijanga bavundanna');

-- --------------------------------------------------------

--
-- Table structure for table `images`
--

CREATE TABLE `images` (
  `imgno` bigint(100) NOT NULL,
  `file` varchar(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `gmail` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `images`
--

INSERT INTO `images` (`imgno`, `file`, `name`, `gmail`) VALUES
(1, 'uploads/6.jpg', 'Akhil', 'akhil@gmail.com'),
(2, 'uploads/7.jpg', 'Akhil', 'akhil@gmail.com'),
(3, 'uploads/1.jpg', 'Deepika', 'deepu@gmail.com'),
(4, 'uploads/facebook.jpg', 'Kaushik', 'avskaushik123@gmail.com'),
(5, 'uploads/2.jpeg', 'Harsha', 'harsha@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `likes`
--

CREATE TABLE `likes` (
  `file` varchar(100) NOT NULL,
  `like_cnt` bigint(100) NOT NULL DEFAULT 0,
  `user` varchar(100) DEFAULT NULL,
  `imgno` bigint(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `likes`
--

INSERT INTO `likes` (`file`, `like_cnt`, `user`, `imgno`) VALUES
('uploads/6.jpg', 0, NULL, 1),
('uploads/6.jpg', 1, 'akhil@gmail.com', 1),
('uploads/7.jpg', 0, NULL, 2),
('uploads/1.jpg', 0, NULL, 3),
('uploads/7.jpg', 1, 'deepu@gmail.com', 2),
('uploads/6.jpg', 3, 'avskaushik123@gmail.com', 1),
('uploads/facebook.jpg', 0, NULL, 4),
('uploads/facebook.jpg', 1, 'avskaushik123@gmail.com', 4),
('uploads/6.jpg', 4, 'harsha@gmail.com', 1),
('uploads/facebook.jpg', 2, 'harsha@gmail.com', 4),
('uploads/facebook.jpg', 3, 'deepu@gmail.com', 4),
('uploads/1.jpg', 1, 'deepu@gmail.com', 3),
('uploads/2.jpeg', 0, NULL, 5),
('uploads/1.jpg', 2, 'harsha@gmail.com', 3),
('uploads/2.jpeg', 1, 'harsha@gmail.com', 5),
('uploads/1.jpg', 3, 'akhil@gmail.com', 3),
('uploads/2.jpeg', 2, 'akhil@gmail.com', 5),
('uploads/7.jpg', 2, 'akhil@gmail.com', 2),
('uploads/images.jpg', 0, NULL, 6),
('uploads/images.jpg', 1, 'kanna@gmail.com', 6),
('uploads/7.jpg', 3, 'kanna@gmail.com', 2),
('uploads/6.jpg', 4, 'kanna@gmail.com', 1),
('uploads/facebook.jpg', 4, 'kanna@gmail.com', 4);

-- --------------------------------------------------------

--
-- Table structure for table `registrations`
--

CREATE TABLE `registrations` (
  `Name` varchar(100) NOT NULL,
  `Email` varchar(100) NOT NULL,
  `Phone` bigint(100) NOT NULL,
  `Gender` varchar(50) NOT NULL,
  `DOB` date NOT NULL,
  `Password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `registrations`
--

INSERT INTO `registrations` (`Name`, `Email`, `Phone`, `Gender`, `DOB`, `Password`) VALUES
('Kaushik', 'avskaushik123@gmail.com', 7075824426, 'Male', '2023-04-04', '20092003'),
('Kanna', 'kanna@gmail.com', 7675497765, 'Female', '2023-04-28', '12345678'),
('Akhil', 'akhil@gmail.com', 8789678765, 'Male', '2023-04-18', '1234'),
('Harsha', 'harsha@gmail.com', 9876543210, 'Male', '2023-04-19', '1234'),
('Rohita', 'rohitha@gmail.com', 987989098, 'Female', '2022-07-13', '12345'),
('Deeepika', 'deepiu@gmail.com', 6756789876, 'Female', '2023-04-17', '20092003'),
('Deepika', 'deepu@gmail.com', 9876598765, 'Female', '2002-11-17', '20092003');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
