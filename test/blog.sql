-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 04, 2020 at 06:08 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.2.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `blog`
--

-- --------------------------------------------------------

--
-- Table structure for table `blog_post`
--

CREATE TABLE `blog_post` (
  `blog_post_id` int(11) NOT NULL,
  `blog_post_user_id` int(10) NOT NULL,
  `blog_post_title` varchar(40) NOT NULL,
  `blog_post_url` varchar(30) NOT NULL,
  `blog_post_content` varchar(50) NOT NULL,
  `blog_post_image` varchar(30) NOT NULL,
  `blog_post_publishedat` varchar(50) NOT NULL,
  `blog_post_category` varchar(30) NOT NULL,
  `blog_post_createdat` varchar(50) NOT NULL,
  `blog_post_updatedat` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `blog_post`
--

INSERT INTO `blog_post` (`blog_post_id`, `blog_post_user_id`, `blog_post_title`, `blog_post_url`, `blog_post_content`, `blog_post_image`, `blog_post_publishedat`, `blog_post_category`, `blog_post_createdat`, `blog_post_updatedat`) VALUES
(6, 8, 'Ritu  1', 'lkjlk', 'uoiuj', ' ', '2015-03-29', '#Technology', '04-02-2020 03:28:39 PM', '04-02-2020 03:52:16 PM'),
(8, 8, 'Ritu2', 'lkjlkio', 'uoiuj', ' ', '2015-03-29', 'Education', '04-02-2020 03:32:06 PM', '04-02-2020 03:53:56 PM'),
(9, 8, 'Ritu 3s', '', 'Cjksjkfh', ' ', '2013-09-28', '#Technology', '04-02-2020 03:48:45 PM', '04-02-2020 03:51:14 PM'),
(18, 9, 'Rajnik 1', 'rajnik1', 'okjojo', ' ', '2017-10-29', 'Healthcare', '04-02-2020 04:31:11 PM', '');

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `category_id` int(11) NOT NULL,
  `category_parent_id` int(10) NOT NULL,
  `category_title` varchar(30) NOT NULL,
  `category_metatitle` varchar(30) NOT NULL,
  `category_url` varchar(20) NOT NULL,
  `category_content` varchar(50) NOT NULL,
  `category_createdat` varchar(50) NOT NULL,
  `category_updatedat` varchar(50) NOT NULL,
  `category_image` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`category_id`, `category_parent_id`, `category_title`, `category_metatitle`, `category_url`, `category_content`, `category_createdat`, `category_updatedat`, `category_image`) VALUES
(13, 0, 'Tehkhl', 'lnln', 'n', 'jljlkjlkjkl', '04-02-2020 04:49:23 PM', '04-02-2020 05:41:24 PM', 'kakashi come-of-age.jpg'),
(15, 0, 'Education', 'edu', '/education', 'this contains education content.', '04-02-2020 05:44:08 PM', '', 'kakashi.png');

-- --------------------------------------------------------

--
-- Table structure for table `post_category`
--

CREATE TABLE `post_category` (
  `post_category_id` int(11) NOT NULL,
  `post_category_category_id` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_id` int(11) NOT NULL,
  `user_prefix` varchar(5) NOT NULL,
  `user_firstname` varchar(30) NOT NULL,
  `user_lastname` varchar(30) NOT NULL,
  `user_mobile` varchar(12) NOT NULL,
  `user_email` varchar(60) NOT NULL,
  `user_password` varchar(40) NOT NULL,
  `user_lastlogin` varchar(50) NOT NULL,
  `user_information` varchar(50) NOT NULL,
  `user_createdat` varchar(50) NOT NULL,
  `user_updatedat` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `user_prefix`, `user_firstname`, `user_lastname`, `user_mobile`, `user_email`, `user_password`, `user_lastlogin`, `user_information`, `user_createdat`, `user_updatedat`) VALUES
(1, 'Dr', 'Bhushan', 'Trivedi', '9876543454', 'b@mail.com', 'c20ad4d76fe97759aa27a0c99bff6710', '', 'i am bhushan', '03-02-2020 02:52:51 PM', ''),
(7, 'Mr', 'karan', 'bhogle', '9876567654', 'k@mail.com', 'c20ad4d76fe97759aa27a0c99bff6710', '', 'i am karan.', '03-02-2020 03:07:25 PM', ''),
(8, 'Miss', 'Ritu', 'Patel', '8877665544', 'ritu@mail.com', 'c4ca4238a0b923820dcc509a6f75849b', '04-02-2020 05:59:18 PM', 'This will be edited.', '03-02-2020 04:47:25 PM', '04-02-2020 05:59:33 PM'),
(9, 'Mr', 'Rajnik', 'Tapasiya', '6765456543', 'rt@mail.com', 'c4ca4238a0b923820dcc509a6f75849b', '04-02-2020 04:08:37 PM', 'i am rajnik', '04-02-2020 04:07:35 PM', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `blog_post`
--
ALTER TABLE `blog_post`
  ADD PRIMARY KEY (`blog_post_id`),
  ADD UNIQUE KEY `blog_post_url` (`blog_post_url`),
  ADD KEY `blog_post_user_id` (`blog_post_user_id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`category_id`),
  ADD UNIQUE KEY `category_title` (`category_title`),
  ADD UNIQUE KEY `category_url` (`category_url`);

--
-- Indexes for table `post_category`
--
ALTER TABLE `post_category`
  ADD PRIMARY KEY (`post_category_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `user_email` (`user_email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `blog_post`
--
ALTER TABLE `blog_post`
  MODIFY `blog_post_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `post_category`
--
ALTER TABLE `post_category`
  MODIFY `post_category_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `blog_post`
--
ALTER TABLE `blog_post`
  ADD CONSTRAINT `blog_post_ibfk_1` FOREIGN KEY (`blog_post_user_id`) REFERENCES `user` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
