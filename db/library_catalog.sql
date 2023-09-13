-- phpMyAdmin SQL Dump
-- version 4.2.7.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jun 18, 2023 at 03:48 PM
-- Server version: 5.6.20
-- PHP Version: 5.5.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `library_catalog_enhanced`
--

-- --------------------------------------------------------

--
-- Table structure for table `book_list`
--

CREATE TABLE IF NOT EXISTS `book_list` (
`book_id` int(100) NOT NULL,
  `book_code` varchar(255) NOT NULL,
  `book_name` varchar(255) NOT NULL,
  `book_description` varchar(255) NOT NULL,
  `book_author` varchar(255) NOT NULL,
  `book_publish` varchar(255) NOT NULL,
  `availability` int(11) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8mb4 AUTO_INCREMENT=254 ;

--
-- Dumping data for table `book_list`
--

INSERT INTO `book_list` (`book_id`, `book_code`, `book_name`, `book_description`, `book_author`, `book_publish`, `availability`) VALUES
(230, '234546', 'websystem', 'Angular', 'arthur', '2019', 4),
(231, '234546', 'websystem', 'Angular', 'arthur', '2019', 4),
(232, '234546', 'websystem', 'Angular', 'arthur', '2019', 4),
(234, '234546', 'websystem', 'Angular', 'arthur', '2019', 4),
(235, '234546', 'websystem', 'Angular', 'arthur', '2019', 4),
(236, '234546', 'websystem', 'Angular', 'arthur', '2019', 4),
(237, '234546', 'websystem', 'Angular', 'arthur', '2019', 4),
(238, '234546', 'websystem', 'Angular', 'arthur', '2019', 4),
(239, '234546', 'websystem', 'Angular', 'arthur', '2019', 4),
(240, '234546', 'websystem', 'Angular', 'arthur', '2019', 4),
(241, '234546', 'websystem', 'Angular', 'arthur', '2019', 4),
(242, '234546', 'websystem', 'Angular', 'arthur', '2019', 4),
(243, '234546', 'websystem', 'Angular', 'arthur', '2019', 4),
(244, '234546', 'websystem', 'Angular', 'arthur', '2019', 4),
(245, '234546', 'websystem', 'Angular', 'arthur', '2019', 4),
(246, '234546', 'websystem', 'Angular', 'arthur', '2019', 4),
(247, '234546', 'websystem', 'Angular', 'arthur', '2019', 4),
(248, '45676', 'trigo', 'Basic Math', 'Leny', '2018', 6),
(250, '78645', 'Machine Learning', 'C++', 'ping', '2014', 5),
(251, '78695', 'Sports', 'Basketball', 'isko', '2015', 1),
(252, '875694', 'Pastry', 'Baking', 'rastaman', '2020', 2),
(253, '676879', 'Da Vinci', 'Code', 'Leonardo', '2022', 3);

-- --------------------------------------------------------

--
-- Table structure for table `book_list_borrow`
--

CREATE TABLE IF NOT EXISTS `book_list_borrow` (
`borrow_Id` int(11) NOT NULL,
  `stud_id` int(11) NOT NULL,
  `book_id` int(11) NOT NULL,
  `status` varchar(15) NOT NULL DEFAULT 'Pending',
  `date_borrowed` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `date_approved` varchar(15) NOT NULL,
  `date_returned` varchar(15) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Dumping data for table `book_list_borrow`
--

INSERT INTO `book_list_borrow` (`borrow_Id`, `stud_id`, `book_id`, `status`, `date_borrowed`, `date_approved`, `date_returned`) VALUES
(9, 42, 230, 'Returned', '2023-06-18 13:00:11', '2023-06-12', '2023-06-18'),
(10, 42, 248, 'Returned', '2023-06-18 13:00:52', '2023-06-12', '2023-06-18');

-- --------------------------------------------------------

--
-- Table structure for table `courses`
--

CREATE TABLE IF NOT EXISTS `courses` (
`id` int(11) NOT NULL,
  `course` varchar(50) NOT NULL,
  `date_added` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB  DEFAULT CHARSET=utf8mb4 AUTO_INCREMENT=12 ;

--
-- Dumping data for table `courses`
--

INSERT INTO `courses` (`id`, `course`, `date_added`) VALUES
(1, 'BSIT', '2022-12-19 16:00:00'),
(2, 'BSBA', '2022-12-19 16:00:00'),
(3, 'BPED', '2022-12-19 16:00:00'),
(4, 'BEED', '2022-12-19 16:00:00'),
(5, 'BSED - ENGLISH', '2022-12-19 16:00:00'),
(6, 'BSED - SCIENCE', '2022-12-19 16:00:00'),
(7, 'BSED - MATHEMATICS', '2022-12-19 16:00:00'),
(8, 'BSED - SOCIAL SCIENCE', '2022-12-19 16:00:00'),
(11, 'coursecourse123', '2023-05-16 05:17:01');

-- --------------------------------------------------------

--
-- Table structure for table `ratings`
--

CREATE TABLE IF NOT EXISTS `ratings` (
`rate_Id` int(11) NOT NULL,
  `stud_id` int(11) NOT NULL,
  `book_id` int(11) NOT NULL,
  `ratings` int(11) NOT NULL,
  `feedback` text NOT NULL,
  `date_rated` varchar(30) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `ratings`
--

INSERT INTO `ratings` (`rate_Id`, `stud_id`, `book_id`, `ratings`, `feedback`, `date_rated`) VALUES
(1, 42, 248, 3, 'Okay', '2023-06-18'),
(2, 42, 248, 5, 'Okay pud', '2023-06-18');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
`user_Id` int(11) NOT NULL,
  `student_Id` varchar(50) NOT NULL,
  `firstname` varchar(255) NOT NULL,
  `middlename` varchar(255) NOT NULL,
  `lastname` varchar(255) NOT NULL,
  `suffix` varchar(255) NOT NULL,
  `gender` varchar(255) NOT NULL,
  `dob` varchar(255) NOT NULL,
  `age` varchar(50) NOT NULL,
  `address` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `contact` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `courses` varchar(100) NOT NULL,
  `level_section` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL DEFAULT 'user.png',
  `date_registered` date NOT NULL,
  `user_status` varchar(20) NOT NULL DEFAULT 'Pending',
  `verification_code` varchar(255) NOT NULL,
  `user_type` varchar(20) NOT NULL DEFAULT 'User'
) ENGINE=InnoDB  DEFAULT CHARSET=utf8mb4 AUTO_INCREMENT=79 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_Id`, `student_Id`, `firstname`, `middlename`, `lastname`, `suffix`, `gender`, `dob`, `age`, `address`, `email`, `contact`, `password`, `courses`, `level_section`, `image`, `date_registered`, `user_status`, `verification_code`, `user_type`) VALUES
(40, '', 'Janeth', '', 'Jadman', '', 'Female', '2001-01-30', '21', 'Purok Pag Ibig, Amparo, Macrohon, Southern Leyte', 'admin@gmail.com', '9359428963', '0192023a7bbd73250516f069df18b500', '', '1st year', 'art-hauntington-jzY0KRJopEI-unsplash.jpg', '2022-09-10', 'Confirmed', '462791', 'Admin'),
(42, '', 'Joyce', '', 'Benaventes', '', 'Female', '2022-10-19', '33', 'Purok San Isidro, Sitio Upper Landing, Daanlungsod, Medellin, Cebu', 'sonerwin12@gmail.com', '9359428963', '0192023a7bbd73250516f069df18b500', '', '1st year', 'ali-pazani-9uaNYCqjDLw-unsplash.jpg', '2022-10-22', 'Confirmed', '805842', 'User'),
(43, '', 'Erwingfd', 'Cabag', 'Son', '', 'Male', '2022-10-12', '33', 'Purok San Isidro, Sitio Upper Landing, Daanlungsod, Medellin, Cebu', 'sonerwin8@gmail.com', '9359428963', '0192023a7bbd73250516f069df18b500', '', '1st year', '6207ad7e34af5.jpg', '2022-10-22', 'Confirmed', '223004', 'Admin'),
(48, '', 'Erwins', 'Cabag', 'Son', '', 'Male', '2022-10-20', '34', 'Purok San Isidro, Sitio Upper Landing, Daanlungsod, Medellin, Cebu', 'sonerwin12qwerty@gmail.com', '9359428963', '7488e331b8b64e5794da3fa4eb10ad5d', '', '3rd year', 'minimalism-1644666519306-6515.jpg', '2022-10-25', 'Pending', '', 'User'),
(59, '', 'Joyce', '', 'Benavente', '', 'Female', '1998-07-23', '24', 'Malitbog', 'joycebenavente73@gmail.com', '9385051054', '7488e331b8b64e5794da3fa4eb10ad5d', '', '4th year', 'images (1).jpeg', '2022-12-09', 'Confirmed', '', 'User'),
(60, '', 'Janno', 'Lagahit', 'Batiao', '', 'Male', '2000-11-30', '22', 'Sto. Nino Malitbog So. Leyte', 'batiaojanno@gmail.com', '9639487688', 'a4a93563dbacd03f7effa6142befead5', '', '2nd year', 'images (1).jpeg', '2022-12-14', 'Confirmed', '181785', 'User'),
(61, '', 'Janeth', '', 'Jadman', '', 'Female', '2001-01-03', '0', 'Purok Pag ibig, Amparo, Macrohon, Southern Leyte', 'galdojaneth6@gmail.com', '9701269727', '18b99d1efb3640efa40588609ec64196', '', '4th year', 'images (2).jpeg', '2022-12-15', 'Pending', '', 'User'),
(62, '', 'khylie Mourine', '', 'Galdo', '', 'Female', '', '0', 'Amparo, Macrohon, Southern Leyte', 'khyliemourine6@Gmail.com', '9701269727', '1f1036d9611e5dbc85331b92b44d98f5', '', '1st year', 'images (2).jpeg', '2023-03-19', 'Confirmed', '', 'User'),
(63, '', 'try', 't', 'try', '', 'Male', '', '0', 'try@gmail.com', 'try@gmail.com', '9645568422', 'fbe8ca2f069f63a4d8e3d58d7638c8d0', '', '3rd year', '2x2.PNG', '2023-05-13', 'Pending', '', 'User'),
(64, '', 'Jonas', 'Munda', 'Macapagal', '', 'Male', '1997-12-18', '25', 'Rizal', 'naski@gmail.com', '9446957821', 'beffafbe33cafa87b06b5b79c1ee59c4', '', '4th year', '344556102_603059478435716_248798788891324536_n.jpg', '2023-05-15', 'Pending', '', 'Admin'),
(65, '', 'Marrianne', ' ', 'Bahian', '', 'Female', '1998-11-13', '24', 'Rizal', 'Marianne1@gmail.com', '9652487541', '3fc3a8d33b5797e40fde17d1120c9ce6', '', '2nd year', '344556102_603059478435716_248798788891324536_n.jpg', '2023-05-15', 'Pending', '', 'Admin'),
(66, '', 'Clyde Aldrich', 'Bahian', 'Macapagal', '', 'Male', '', '0', 'Rizal', 'aldrich04@gmail.com', '9946947820', '2b0aba2017a460e5549fd6216c479301', '', '4th year', '344556102_603059478435716_248798788891324536_n.jpg', '2023-05-15', 'Confirmed', '', 'User'),
(67, 'fdsfsdfsd', 'register', 'register', 'register', '', 'Female', '', '0', 'register', 'register@gmail.com', '9359428963', '9de4a97425678c5b1288aa70c1669a64', '', '2nd year', '4.jpg', '2023-05-15', 'Pending', '', 'User'),
(68, '123321', 'Sample name', 'Sample name', 'Sample name', '', 'Female', '', '0', 'Sample name', 'katogon@gmail.com', '9359428963', 'b8f3b1b6c743a9dcc34f03753f9d600b', '', '1st year', '4.jpg', '2023-05-15', 'Pending', '', 'User'),
(69, '21432432', 'Gwapa', 'Gwapa', 'Gwapa', '', 'Female', '', '0', 'Gwapa', 'Gwapa@gmail.com', '9359428963', '0192023a7bbd73250516f069df18b500', '', '3rd year', '14.jpg', '2023-05-15', 'Pending', '', 'User'),
(70, '4343242', 'Register', '', 'Register', '', 'Male', '', '0', 'Register', 'RegisterRegister@gmail.com', '9359428963', '0ba7583639a274c434bbe6ef797115a4', '', '3rd year', '2.jpg', '2023-05-15', 'Pending', '', 'User'),
(71, '4254534', 'gfdgdf', 'gdfgdfg', 'fdgfd', 'gdfgfd', 'Female', '', '0', 'gfdgdfgdf', 'fdsfdgfd@gmail.com', '9359428963', 'b8f3b1b6c743a9dcc34f03753f9d600b', '', '4th year', '13.jpg', '2023-05-16', 'Pending', '', 'User'),
(72, '543535435', 'fdsfsdfsdfds', 'fdsfsdfs', 'dfsdfds', '', 'Male', '', '0', '543535435', 'fsg2543535435@gmail.com', '9359428963', '6388b405eac7773e6713ce5ffdcb153d', '', '2nd year', '16.jpg', '2023-05-16', 'Pending', '', 'User'),
(73, '', 'gfdgdgdfgfd', 'gfdgdgdfgfd', 'gfdgdgdfgfd', '', 'Male', '2023-05-02', '2', 'gfdgdgdfgfd', 'gfdgdgdfgfdgfdgdgdfgfd@gmail.com', '9359428963', 'c926db64f8f15df7ab37b644e0c1557a', '', '1st year', '12.jpg', '2023-05-16', 'Pending', '', 'Admin'),
(75, '543534', 'Lebrons', '', 'James', '', 'Male', '', '0', 'Cebu', 'lebron@gmail.com', '9258938943', '7488e331b8b64e5794da3fa4eb10ad5d', '', '3rd year', 'abe.png', '2023-06-12', 'Confirmed', '', 'User'),
(76, '', 'Ako ni', 'sdfsdf', 'sdfsd', 'fsdfsd', 'Male', '', '0', 'fds', 'dsadada@gmail.com', '9359428963', '0192023a7bbd73250516f069df18b500', '', '4th year', '16.jpg', '2023-06-18', 'Pending', '', 'User'),
(77, '21443', 'Sample ni', 'Sample ni', 'Sample ni', '', 'Male', '2023-05-31', '2 fd', 'Sample ni', 'Sampleni@gmail.com', '9359428963', '0192023a7bbd73250516f069df18b500', 'BSIT', '2nd year', 'amatiel.png', '2023-06-18', 'Confirmed', '', 'User'),
(78, '', 'Admin ako', 'Admin ako', 'Admin ako', 'Admin ako', 'Male', '2023-06-06', '1 week old', 'Admin ako', 'adminAdmin@gmail.com', '9359428953', '9ae5eb1f80fc7ee00c8af618c4c12d99', '', '', '25.jpg', '2023-06-18', 'Pending', '', 'Admin');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `book_list`
--
ALTER TABLE `book_list`
 ADD PRIMARY KEY (`book_id`), ADD KEY `book_code` (`book_code`(191));

--
-- Indexes for table `book_list_borrow`
--
ALTER TABLE `book_list_borrow`
 ADD PRIMARY KEY (`borrow_Id`);

--
-- Indexes for table `courses`
--
ALTER TABLE `courses`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ratings`
--
ALTER TABLE `ratings`
 ADD PRIMARY KEY (`rate_Id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
 ADD PRIMARY KEY (`user_Id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `book_list`
--
ALTER TABLE `book_list`
MODIFY `book_id` int(100) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=254;
--
-- AUTO_INCREMENT for table `book_list_borrow`
--
ALTER TABLE `book_list_borrow`
MODIFY `borrow_Id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `courses`
--
ALTER TABLE `courses`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `ratings`
--
ALTER TABLE `ratings`
MODIFY `rate_Id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
MODIFY `user_Id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=79;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
