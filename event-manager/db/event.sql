-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 06, 2020 at 07:21 AM
-- Server version: 10.4.13-MariaDB
-- PHP Version: 7.4.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `event`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `admin_id` int(11) NOT NULL,
  `admin_name` varchar(255) NOT NULL,
  `admin_pass` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`admin_id`, `admin_name`, `admin_pass`) VALUES
(1, 'admin', '0192023a7bbd73250516f069df18b500');

-- --------------------------------------------------------

--
-- Table structure for table `booking`
--

CREATE TABLE `booking` (
  `bk_id` int(11) NOT NULL,
  `bk_user_id` int(11) NOT NULL,
  `bk_evnt_name` varchar(255) NOT NULL,
  `bk_user_name` varchar(255) NOT NULL,
  `bk_user_email` varchar(255) NOT NULL,
  `bk_user_person` int(50) NOT NULL,
  `bk_evnt_price` decimal(50,0) NOT NULL,
  `bk_event_status` varchar(50) NOT NULL,
  `bk_evnt_date` datetime(6) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `booking`
--

INSERT INTO `booking` (`bk_id`, `bk_user_id`, `bk_evnt_name`, `bk_user_name`, `bk_user_email`, `bk_user_person`, `bk_evnt_price`, `bk_event_status`, `bk_evnt_date`, `created_at`) VALUES
(4, 1, 'Desing Compition', 'Subashbist', 'subash123@gmail.com', 1, '20', 'Rejected', '0000-00-00 00:00:00.000000', '2020-04-28 05:32:22'),
(5, 1, 'Python Workshop', 'Subash Singh Bist', 'subash123@gmail.com', 2, '100', 'pending', '2020-05-15 00:00:00.000000', '2020-04-28 05:36:24'),
(6, 3, 'Trade Fair', 'Amit Sharma', 'amit123@gmail.com', 1, '0', 'Approved', '2020-04-18 00:00:00.000000', '2020-04-28 06:38:56'),
(7, 3, 'Book Trade Fair ', 'Amit Sharma', 'amit123@gmail.com', 1, '50', 'Rejected', '0000-00-00 00:00:00.000000', '2020-04-28 07:52:27'),
(8, 5, 'Science Project Showcase ', 'Ankit Verma', 'ankitverma@gmail.com', 5, '330', 'pending', '2020-06-14 00:00:00.000000', '2020-04-30 06:41:16'),
(9, 1, 'Pragati Maidan Trade Fair ', 'Subashbist', 'subash123@gmail.com', 5, '250', 'Approved', '2020-04-24 00:00:00.000000', '2020-04-30 11:51:37'),
(10, 6, 'Book Trade Fair Event ', 'Himanshi', 'himanshi@gmail.com', 4, '200', 'pending', '2020-04-30 00:00:00.000000', '2020-06-29 16:11:35'),
(11, 6, 'Book Trade Fair Event ', 'Himanshi', 'himanshi@gmail.com', 1, '50', 'pending', '2020-04-30 00:00:00.000000', '2020-07-05 15:28:59'),
(12, 6, 'Pragati Maidan Trade Fair ', 'Himanshi', 'himanshi@gmail.com', 1, '50', 'pending', '2020-04-24 00:00:00.000000', '2020-07-06 05:14:38');

-- --------------------------------------------------------

--
-- Table structure for table `event`
--

CREATE TABLE `event` (
  `event_id` int(11) NOT NULL,
  `location_id` int(11) NOT NULL,
  `event_name` varchar(255) NOT NULL,
  `event_image` varchar(255) NOT NULL,
  `event_price` decimal(50,0) NOT NULL,
  `event_date` datetime NOT NULL,
  `event_max_person` int(20) NOT NULL,
  `event_min_person` int(20) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `event`
--

INSERT INTO `event` (`event_id`, `location_id`, `event_name`, `event_image`, `event_price`, `event_date`, `event_max_person`, `event_min_person`, `created_at`, `updated_at`) VALUES
(1, 1, 'Book Trade Fair Event', '5ea92dbf061c5_img.jpg', '50', '2020-04-30 00:00:00', 2, 10, '2020-04-26 13:21:31', '2020-04-29 09:33:19'),
(2, 2, 'Pragati Maidan Trade Fair', '5eaa753578545_logo.png', '50', '2020-04-24 00:00:00', 20, 1, '2020-04-26 14:58:41', '2020-04-30 08:50:29'),
(3, 1, 'Desing Compition', '5ea92e50435b8_bg_3.jpg', '20', '2020-04-15 00:00:00', 3, 5, '2020-04-26 14:59:22', '2020-04-29 09:35:44'),
(6, 2, 'Photography Event', '5eaa70fe4eceb_photosevent.jpg', '20', '2020-07-15 00:00:00', 3, 20, '2020-04-30 06:32:30', '0000-00-00 00:00:00'),
(7, 1, 'Music Concerts', '5eaa716e65917_music.jpg', '80', '2020-05-15 00:00:00', 1, 40, '2020-04-30 06:34:22', '0000-00-00 00:00:00'),
(8, 2, 'Corporate Event', '5eaa71f232627_Corporateevent.jpg', '100', '2020-06-28 00:00:00', 10, 150, '2020-04-30 06:36:34', '0000-00-00 00:00:00'),
(9, 2, 'Science Project Showcase', '5eaa72623020e_science.jpg', '66', '2020-06-14 00:00:00', 5, 500, '2020-04-30 06:38:26', '0000-00-00 00:00:00'),
(10, 1, 'Evern Green Music Event', '5efad194511cb_music.jpg', '500', '2020-07-25 00:00:00', 5, 1, '2020-06-30 05:45:56', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE `feedback` (
  `feed_id` int(11) NOT NULL,
  `feed_email` varchar(255) NOT NULL,
  `feed_message` varchar(255) NOT NULL,
  `feed_created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `feedback`
--

INSERT INTO `feedback` (`feed_id`, `feed_email`, `feed_message`, `feed_created_at`) VALUES
(1, 'karan@gmail.com', 'This Best website is useful for manage events', '2020-04-27 08:03:16'),
(2, 'karan@gmail.com', 'This is sample message', '2020-04-27 08:03:29'),
(9, 'Amit_Sharma@gmail.com', 'Amazing Website For online events management', '2020-04-27 08:08:45'),
(11, 'AnjaliKanta123@gmail.com', 'This is a very best website for providing events .', '2020-04-30 06:02:58');

-- --------------------------------------------------------

--
-- Table structure for table `location`
--

CREATE TABLE `location` (
  `location_id` int(11) NOT NULL,
  `country` varchar(150) NOT NULL,
  `state` varchar(150) NOT NULL,
  `city` varchar(150) NOT NULL,
  `address` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `location`
--

INSERT INTO `location` (`location_id`, `country`, `state`, `city`, `address`, `created_at`) VALUES
(1, 'India', 'Uttar Pradesh', 'Ghaziabad', 'Sahibabad, Ghaziabad, Uttar Pradesh', '2020-06-29 15:28:28'),
(2, 'India', 'Haryana', 'Gurgoan', 'Iffo Chowk, Gurgaon, Harayan', '2020-06-30 06:17:31');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_id` int(11) NOT NULL,
  `user_name` varchar(255) NOT NULL,
  `user_pass` varchar(255) NOT NULL,
  `user_email` varchar(255) NOT NULL,
  `user_contact` varchar(50) NOT NULL,
  `user_address` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `user_name`, `user_pass`, `user_email`, `user_contact`, `user_address`, `created_at`) VALUES
(1, 'Subashbist', 'b4caefa3d450d0e36e183160d17aba24 ', 'subash123@gmail.com', '9599487888', 'Noida', '2020-04-27 07:00:31'),
(3, 'Amit Sharma', 'd2b3f63948406cb893544cee035531d3 ', 'amit123@gmail.com', '8010551055', 'Delhi', '2020-04-27 12:39:03'),
(4, 'Anuj Khanna', 'ae69a331121724849f83f2aca559eb49 ', 'anuj123@gmail.com', '7888999988', 'Agra', '2020-04-29 05:47:54'),
(5, 'Ankit Verma', '447d2c8dc25efbc493788a322f1a00e7 ', 'ankitverma@gmail.com', '8465566699', 'Uttar Pradesh', '2020-04-30 06:40:42'),
(6, 'Himanshi', '827ccb0eea8a706c4c34a16891f84e7b ', 'himanshi@gmail.com', '8810554455', 'Gurgaon', '2020-06-29 15:41:01');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `booking`
--
ALTER TABLE `booking`
  ADD PRIMARY KEY (`bk_id`);

--
-- Indexes for table `event`
--
ALTER TABLE `event`
  ADD PRIMARY KEY (`event_id`);

--
-- Indexes for table `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`feed_id`);

--
-- Indexes for table `location`
--
ALTER TABLE `location`
  ADD PRIMARY KEY (`location_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `booking`
--
ALTER TABLE `booking`
  MODIFY `bk_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `event`
--
ALTER TABLE `event`
  MODIFY `event_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `feedback`
--
ALTER TABLE `feedback`
  MODIFY `feed_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `location`
--
ALTER TABLE `location`
  MODIFY `location_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
