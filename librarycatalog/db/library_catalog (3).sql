-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 27, 2023 at 02:32 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 7.4.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `library_catalog`
--

-- --------------------------------------------------------

--
-- Table structure for table `book`
--

CREATE TABLE `book` (
  `book_id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `catalog_numbers` varchar(255) NOT NULL,
  `catalog_number` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `shelf_location` varchar(255) NOT NULL,
  `orig_available` varchar(255) NOT NULL,
  `availability` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `date_added` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `book`
--

INSERT INTO `book` (`book_id`, `category_id`, `catalog_numbers`, `catalog_number`, `title`, `description`, `shelf_location`, `orig_available`, `availability`, `image`, `date_added`) VALUES
(18, 3, 'RE 031 En19 V.1', 2007, 'Encyclopedia Americana (ANJOU)', 'The Encyclopedia Americana was the first encyclopedia published in the United States. Its first columns appeared in 1892, and it has continued as a standard general reference work 167 years. ', 'Graduate Library', '30', '-1', 'IMG_20221213_155007_543.jpg', '2022-12-13'),
(20, 3, 'RE 031 En19 V.2', 2009, 'Encyclopedia Americana (ANKARA)', 'The Encyclopedia Americana was the first encyclopedia published in the United States. Its first columns appeared in 1892, and it has continued as a standard general reference work 167 years. ', 'Graduate Library', '30', '1', 'IMG_20221213_155007_543.jpg', '2022-12-13'),
(21, 3, 'RE 031 En19 V.3', 2004, 'Encyclopedia Americana (BIRLING)', 'The Encyclopedia Americana was the first encyclopedia published in the United States. Its first columns appeared in 1892, and it has continued as a standard general reference work 167 years. ', 'Graduate Library', '30', '0', 'IMG_20221213_155007_543.jpg', '2022-12-13'),
(22, 3, 'RE 031 En19 V.4', 2009, 'Encyclopedia Americana (BURLINGTON)', 'The Encyclopedia Americana was the first encyclopedia published in the United States. Its first columns appeared in 1892, and it has continued as a standard general reference work 167 years. ', 'Graduate Library', '1', '1', 'IMG_20221213_155007_543.jpg', '2022-12-13'),
(23, 3, 'RE 031 En19 V.5', 2007, 'Encyclopedia Americana (BURMA)', 'The Encyclopedia Americana was the first encyclopedia published in the United States. Its first columns appeared in 1892, and it has continued as a standard general reference work 167 years. ', 'Graduate Library', '1', '1', 'IMG_20221213_155007_543.jpg', '2022-12-13'),
(24, 3, 'RE 031 En19 V.6', 2005, 'Encyclopedia Americana (Civil War)', 'The Encyclopedia Americana was the first encyclopedia published in the United States. Its first columns appeared in 1892, and it has continued as a standard general reference work 167 years. ', 'Graduate Library', '1', '1', 'IMG_20221213_155007_543.jpg', '2022-12-13'),
(25, 3, 'RE 031 En19 V.7', 2007, 'Encyclopedia Americana (Coronium)', 'The Encyclopedia Americana was the first encyclopedia published in the United States. Its first columns appeared in 1892, and it has continued as a standard general reference work 167 years. ', 'Graduate Library', '1', '1', 'IMG_20221213_155007_543.jpg', '2022-12-13'),
(26, 3, 'RE 031 En19 V.8', 2009, 'Encyclopedia Americana (Desdemona)', 'The Encyclopedia Americana was the first encyclopedia published in the United States. Its first columns appeared in 1892, and it has continued as a standard general reference work 167 years. ', 'Graduate Library', '1', '1', 'IMG_20221213_155007_543.jpg', '2022-12-13'),
(27, 3, 'RE 031 En19 V.9', 2007, 'Encyclopedia Americana(Egret)', 'The Encyclopedia Americana was the first encyclopedia published in the United States. Its first columns appeared in 1892, and it has continued as a standard general reference work 167 years. ', 'Graduate Library', '1', '1', 'IMG_20221213_155007_543.jpg', '2022-12-13'),
(28, 3, 'RE 031 En19 V.10', 2008, 'Encyclopedia Americana (Falsetto)', 'The Encyclopedia Americana was the first encyclopedia published in the United States. Its first columns appeared in 1892, and it has continued as a standard general reference work 167 years. ', 'Graduate Library', '1', '1', 'IMG_20221213_155007_543.jpg', '2022-12-13'),
(29, 3, 'G - RE 030 F963 V.1', 2007, 'Funk and Wagnalls New Encyclopedia (A - American)', 'Funk & Wagnalls New Encyclopedia is one of the most widely used and well-regarded reference works in the English language. The publication of the 1993 Library Edition makes this authoritative, multi-volume encyclopedia available in a high-quality, durable library binding that will stand up to daily use by students and general readers.', 'Graduate Library', '1', '1', 'IMG_20221213_155107_377.jpg', '2022-12-13'),
(30, 3, 'G - RE 030 F963 V.2', 2009, 'Funks and Wagnalls New Encyclopedia', 'Funk & Wagnalls New Encyclopedia is one of the most widely used and well-regarded reference works in the English language. The publication of the 1993 Library Edition makes this authoritative, multi-volume encyclopedia available in a high-quality, durable library binding that will stand up to daily use by students and general readers.', 'Graduate Library', '1', '1', 'IMG_20221213_155107_377.jpg', '2022-12-14');

-- --------------------------------------------------------

--
-- Table structure for table `book1`
--

CREATE TABLE `book1` (
  `COL 1` varchar(5) DEFAULT NULL,
  `COL 2` varchar(3) DEFAULT NULL,
  `COL 3` varchar(8) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `book1`
--

INSERT INTO `book1` (`COL 1`, `COL 2`, `COL 3`) VALUES
('name', 'age', 'work'),
('dave', '12', 'assassin'),
('tisoy', '21', 'farmer'),
('mark', '19', 'water');

-- --------------------------------------------------------

--
-- Table structure for table `borrowed_book`
--

CREATE TABLE `borrowed_book` (
  `borrowed_id` int(11) NOT NULL,
  `book_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `date_borrowed` varchar(255) NOT NULL,
  `date_approved` varchar(255) NOT NULL,
  `date_returned` varchar(255) NOT NULL,
  `borrowed_status` varchar(255) NOT NULL DEFAULT 'Pending'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `borrowed_book`
--

INSERT INTO `borrowed_book` (`borrowed_id`, `book_id`, `user_id`, `date_borrowed`, `date_approved`, `date_returned`, `borrowed_status`) VALUES
(11, 13, 42, '2022-11-07', '2022-11-07', '2022-12-13', 'Returned'),
(14, 19, 42, '2022-12-13', '2022-12-13', '2022-12-13', 'Returned'),
(15, 18, 42, '2022-12-14', '2022-12-14', '2022-12-14', 'Returned'),
(16, 27, 42, '2022-12-14', '2022-12-14', '2022-12-14', 'Returned'),
(17, 20, 42, '2022-12-14', '2022-12-14', '2022-12-14', 'Returned'),
(18, 18, 60, '2022-12-14', '2022-12-14', '2022-12-14', 'Returned'),
(19, 22, 60, '2022-12-14', '2022-12-14', '2022-12-14', 'Returned'),
(20, 21, 60, '2022-12-14', '2022-12-15', '2022-12-15', 'Returned'),
(21, 18, 61, '2022-12-15', '2022-12-15', '2022-12-15', 'Returned'),
(24, 18, 42, '2022-12-29', '2022-12-29', '', 'Approved'),
(25, 18, 61, '2023-01-09', '2023-01-09', '', 'Approved');

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `cat_id` int(11) NOT NULL,
  `cat_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`cat_id`, `cat_name`) VALUES
(3, 'General Reference'),
(4, 'Thesis'),
(5, 'three'),
(6, 'four'),
(7, 'five'),
(8, 'six'),
(9, 'seven'),
(10, 'eight'),
(11, 'nine'),
(14, 'English'),
(15, 'Filipino');

-- --------------------------------------------------------

--
-- Table structure for table `courses`
--

CREATE TABLE `courses` (
  `id` int(11) NOT NULL,
  `course` varchar(50) NOT NULL,
  `adlaw` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `courses`
--

INSERT INTO `courses` (`id`, `course`, `adlaw`) VALUES
(1, 'BSIT', '2022-12-20'),
(2, 'BSBA', '2022-12-20'),
(3, 'BPED', '2022-12-20'),
(4, 'BEED', '2022-12-20'),
(5, 'BSED - ENGLISH', '2022-12-20'),
(6, 'BSED - SCIENCE', '2022-12-20'),
(7, 'BSED - MATHEMATICS', '2022-12-20'),
(8, 'BSED - SOCIAL SCIENCE', '2022-12-20');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_Id` int(11) NOT NULL,
  `firstname` varchar(255) NOT NULL,
  `middlename` varchar(255) NOT NULL,
  `lastname` varchar(255) NOT NULL,
  `suffix` varchar(255) NOT NULL,
  `gender` varchar(255) NOT NULL,
  `dob` varchar(255) NOT NULL,
  `age` int(11) NOT NULL,
  `address` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `contact` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `level_section` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL DEFAULT 'user.png',
  `date_registered` date NOT NULL,
  `user_status` varchar(20) NOT NULL DEFAULT 'Pending',
  `verification_code` varchar(255) NOT NULL,
  `user_type` varchar(20) NOT NULL DEFAULT 'User'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_Id`, `firstname`, `middlename`, `lastname`, `suffix`, `gender`, `dob`, `age`, `address`, `email`, `contact`, `password`, `level_section`, `image`, `date_registered`, `user_status`, `verification_code`, `user_type`) VALUES
(40, 'Janeth', '', 'Jadman', '', 'Female', '2001-01-30', 21, 'Purok Pag Ibig, Amparo, Macrohon, Southern Leyte', 'admin@gmail.com', '9359428963', '7488e331b8b64e5794da3fa4eb10ad5d', '', 'art-hauntington-jzY0KRJopEI-unsplash.jpg', '2022-09-10', 'Confirmed', '462791', 'Admin'),
(42, 'Joyce', '', 'Benavente', '', 'Female', '2022-10-19', 33, 'Purok San Isidro, Sitio Upper Landing, Daanlungsod, Medellin, Cebu', 'sonerwin12@gmail.com', '9359428963', '7488e331b8b64e5794da3fa4eb10ad5d', 'gdfgdgdgd', 'ali-pazani-9uaNYCqjDLw-unsplash.jpg', '2022-10-22', 'Confirmed', '339078', 'User'),
(43, 'Erwingfd', 'Cabag', 'Son', '', 'Male', '2022-10-12', 33, 'Purok San Isidro, Sitio Upper Landing, Daanlungsod, Medellin, Cebu', 'sonerwin12@gmail.com', '9359428963', '3028879ab8d5c87dc023049fa5bb5c1a', '', '6207ad7e34af5.jpg', '2022-10-22', 'Pending', '', ''),
(48, 'Erwins', 'Cabag', 'Son', '', 'Male', '2022-10-20', 34, 'Purok San Isidro, Sitio Upper Landing, Daanlungsod, Medellin, Cebu', 'sonerwin12qwerty@gmail.com', '9359428963', '1aabac6d068eef6a7bad3fdf50a05cc8', 'fsfdgd', 'minimalism-1644666519306-6515.jpg', '2022-10-25', 'Pending', '', 'User'),
(59, 'Joyce', '', 'Benavente', '', 'Female', '1998-07-23', 24, 'Malitbog', 'joycebenavente73@gmail.com', '9385051054', '6a5a0a7ba9be0ebe85600f539548126b', '', 'images (1).jpeg', '2022-12-09', 'Pending', '', 'User'),
(60, 'Janno', 'Lagahit', 'Batiao', '', 'Male', '2000-11-30', 22, 'Sto. Nino Malitbog So. Leyte', 'batiaojanno@gmail.com', '9639487688', 'a4a93563dbacd03f7effa6142befead5', '', 'images (1).jpeg', '2022-12-14', 'Pending', '181785', 'User'),
(61, 'Janeth', '', 'Jadman', '', 'Female', '2001-01-03', 0, 'Purok Pag ibig, Amparo, Macrohon, Southern Leyte', 'galdojaneth6@gmail.com', '9701269727', '18b99d1efb3640efa40588609ec64196', '', 'images (2).jpeg', '2022-12-15', 'Pending', '', 'User'),
(62, 'khylie Mourine', '', 'Galdo', '', 'Female', '', 0, 'Amparo, Macrohon, Southern Leyte', 'khyliemourine6@Gmail.com', '9701269727', '1f1036d9611e5dbc85331b92b44d98f5', '', 'images (2).jpeg', '2023-03-19', 'Pending', '', 'User');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `book`
--
ALTER TABLE `book`
  ADD PRIMARY KEY (`book_id`);

--
-- Indexes for table `borrowed_book`
--
ALTER TABLE `borrowed_book`
  ADD PRIMARY KEY (`borrowed_id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`cat_id`);

--
-- Indexes for table `courses`
--
ALTER TABLE `courses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_Id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `book`
--
ALTER TABLE `book`
  MODIFY `book_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `borrowed_book`
--
ALTER TABLE `borrowed_book`
  MODIFY `borrowed_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `cat_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `courses`
--
ALTER TABLE `courses`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=63;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
