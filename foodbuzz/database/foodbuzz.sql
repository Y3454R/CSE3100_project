-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 12, 2021 at 10:28 AM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.3.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `foodbuzz`
--

-- --------------------------------------------------------

--
-- Table structure for table `review`
--

CREATE TABLE `review` (
  `review_id` int(20) NOT NULL,
  `user_id` int(11) NOT NULL,
  `item_name` varchar(50) NOT NULL,
  `restaurant` varchar(50) NOT NULL,
  `district` varchar(50) NOT NULL,
  `rating` int(3) NOT NULL,
  `price` int(10) NOT NULL,
  `meal_type` varchar(20) NOT NULL,
  `cuisine` varchar(20) NOT NULL,
  `description` text NOT NULL,
  `upvote` int(100) NOT NULL,
  `downvote` int(100) NOT NULL,
  `comment_count` int(100) NOT NULL,
  `review_time` datetime DEFAULT NULL,
  `img_url` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `review`
--

INSERT INTO `review` (`review_id`, `user_id`, `item_name`, `restaurant`, `district`, `rating`, `price`, `meal_type`, `cuisine`, `description`, `upvote`, `downvote`, `comment_count`, `review_time`, `img_url`) VALUES
(1, 3, 'Kacchi', 'Mega', 'khulna', 0, 200, 'lunch', 'mughal', 'good.', 0, 0, 0, '2021-12-12 03:27:36', 'REVIMG-61b5c088c09b75.24449773.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `first_name` varchar(25) NOT NULL,
  `last_name` varchar(25) NOT NULL,
  `username` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(256) NOT NULL,
  `signup_date` date NOT NULL,
  `profile_pic` varchar(156) NOT NULL,
  `district` varchar(100) NOT NULL,
  `list_count` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `first_name`, `last_name`, `username`, `email`, `password`, `signup_date`, `profile_pic`, `district`, `list_count`) VALUES
(2, 'Test', 'Test', 'test_test', 'test@gmail.com', '25d55ad283aa400af464c76d713c07ad', '2021-12-11', 'image/user_dp.jpg', 'Dhaka', 0),
(3, 'Samin', 'Yeasar', 'samin_yeasar', 'samin@gmail.com', '25d55ad283aa400af464c76d713c07ad', '2021-12-11', 'image/dp/user_dp.jpg', 'Rangpur', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `review`
--
ALTER TABLE `review`
  ADD PRIMARY KEY (`review_id`),
  ADD KEY `reviewuser` (`user_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `review`
--
ALTER TABLE `review`
  MODIFY `review_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `review`
--
ALTER TABLE `review`
  ADD CONSTRAINT `reviewuser` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
