-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Feb 02, 2020 at 09:04 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `brandbuc_acme`
--

-- --------------------------------------------------------

--
-- Table structure for table `books`
--

CREATE TABLE `books` (
  `id` int(111) NOT NULL,
  `maincategory_id` int(100) NOT NULL,
  `dropdown_id` int(100) DEFAULT NULL,
  `author_name` varchar(111) NOT NULL,
  `main_cat` varchar(200) DEFAULT NULL,
  `description` longtext NOT NULL,
  `image` varchar(111) NOT NULL,
  `isChecked` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `cas` varchar(100) DEFAULT NULL,
  `abbr` varchar(100) DEFAULT NULL,
  `hsn` varchar(100) DEFAULT NULL,
  `pdf_path` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `books`
--

INSERT INTO `books` (`id`, `maincategory_id`, `dropdown_id`, `author_name`, `main_cat`, `description`, `image`, `isChecked`, `created_at`, `cas`, `abbr`, `hsn`, `pdf_path`) VALUES
(19, 10, 2, 'prod second main', NULL, '', '', 0, '2020-02-01 19:33:45', '123', 'sfdzgsd', '234', NULL),
(20, 10, 2, 'this is product', '19', '<p>sfjsanfs</p>\r\n', 'default.png', 0, '2020-02-01 20:56:29', NULL, NULL, NULL, 'none'),
(22, 11, NULL, 'its direct link though', NULL, '<p>its description</p>\r\n', 'default.png', 1, '2020-02-02 15:52:39', NULL, NULL, NULL, 'none'),
(23, 10, 2, 'prod second main yee', '19', '<p>sajbka kbcc</p>\r\n', 'default.png', 1, '2020-02-02 18:31:57', NULL, NULL, NULL, 'none');

-- --------------------------------------------------------

--
-- Table structure for table `dropdownCategories`
--

CREATE TABLE `dropdownCategories` (
  `id` int(100) NOT NULL,
  `maincategory_id` int(100) DEFAULT NULL,
  `title` varchar(250) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `dropdownCategories`
--

INSERT INTO `dropdownCategories` (`id`, `maincategory_id`, `title`, `created_at`, `updated_at`) VALUES
(1, 10, 'the one dropDown', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(2, 10, 'the two dropDown ', '2020-02-02 00:23:12', '0000-00-00 00:00:00'),
(6, 2, 'af', '2020-02-02 20:36:35', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `maincategory`
--

CREATE TABLE `maincategory` (
  `id` int(100) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` text DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `maincategory`
--

INSERT INTO `maincategory` (`id`, `title`, `description`, `created_at`) VALUES
(1, 'firstMain', 'this is desc of first main', '2020-01-05 15:38:32'),
(2, 'secondMain', 'second description', '2020-01-05 15:42:19'),
(3, 'secondMain2', 'sdg', '2020-01-05 15:42:58'),
(7, 'how can I stringify multiple objects in javascript', 'ada', '2020-01-24 20:28:17'),
(8, 'how can I stringify multiple objects in javascript', 'ad', '2020-01-24 20:28:39'),
(10, 'ada', 'saf', '2020-02-01 18:49:22'),
(11, 'direct product', '', '2020-02-02 15:51:34');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(111) NOT NULL,
  `username` varchar(111) NOT NULL,
  `password` varchar(111) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`) VALUES
(1, 'admin', '1234');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `books`
--
ALTER TABLE `books`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `dropdownCategories`
--
ALTER TABLE `dropdownCategories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `maincategory`
--
ALTER TABLE `maincategory`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `books`
--
ALTER TABLE `books`
  MODIFY `id` int(111) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `dropdownCategories`
--
ALTER TABLE `dropdownCategories`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `maincategory`
--
ALTER TABLE `maincategory`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(111) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
