-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 03, 2020 at 05:40 PM
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
  `blog_post_createdat` varchar(50) NOT NULL,
  `blog_post_updatedat` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
(8, 'Miss', 'Ritu', 'Patel', '8877665544', 'ritu@mail.com', 'c4ca4238a0b923820dcc509a6f75849b', '03-02-2020 05:03:52 PM', 'This will be edited.', '03-02-2020 04:47:25 PM', '03-02-2020 04:58:28 PM');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `blog_post`
--
ALTER TABLE `blog_post`
  ADD PRIMARY KEY (`blog_post_id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`category_id`);

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
  MODIFY `blog_post_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `post_category`
--
ALTER TABLE `post_category`
  MODIFY `post_category_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
