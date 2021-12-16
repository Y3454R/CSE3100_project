-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 16, 2021 at 05:55 AM
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
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `comment_id` int(50) NOT NULL,
  `parent_id` int(20) NOT NULL,
  `review_id` int(20) NOT NULL,
  `profile_id` int(11) NOT NULL,
  `comment_time` datetime NOT NULL,
  `comment_text` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`comment_id`, `parent_id`, `review_id`, `profile_id`, `comment_time`, `comment_text`) VALUES
(18, 0, 13, 3, '2021-12-16 10:23:20', 'test'),
(19, 0, 13, 4, '2021-12-16 10:28:17', 'Test'),
(20, 0, 13, 5, '2021-12-16 10:48:37', 'Testing...'),
(21, 0, 3, 5, '2021-12-16 10:49:58', 'Looks delicious.'),
(22, 0, 13, 5, '2021-12-16 10:52:48', 'hello world');

-- --------------------------------------------------------

--
-- Table structure for table `rating_info`
--

CREATE TABLE `rating_info` (
  `post_id` int(20) NOT NULL,
  `user_id` int(11) NOT NULL,
  `rating_action` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `rating_info`
--

INSERT INTO `rating_info` (`post_id`, `user_id`, `rating_action`) VALUES
(1, 3, 'like'),
(3, 5, 'like'),
(5, 3, 'dislike'),
(6, 3, 'dislike'),
(7, 3, 'dislike'),
(9, 4, 'like'),
(12, 4, 'like'),
(13, 3, 'like'),
(13, 4, 'like'),
(13, 5, 'like');

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
(1, 3, 'Kacchi', 'Mega', 'khulna', 3, 200, 'lunch', 'mughal', 'good.', 0, 0, 0, '2021-12-12 03:27:36', 'REVIMG-61b5c088c09b75.24449773.jpg'),
(3, 3, 'burger', 'burger test', 'khulna', 2, 222, 'snacks', 'fast', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus imperdiet, nulla et dictum interdum, nisi lorem egestas vitae scelerisque enim ligula venenatis dolor. Maecenas nisl est, ultrices nec congue eget, auctor vitae massa. Fusce luctus vestibulum augue ut aliquet. Nunc sagittis dictum nisi, sed ullamcorper ipsum dignissim ac. In at libero sed nunc venenatis imperdiet sed ornare turpis. Donec vitae dui eget tellus gravida venenatis. Integer fringilla congue eros non fermentum. Sed dapibus pulvinar nibh tempor porta.', 0, 0, 0, '2021-12-12 05:57:01', 'REVIMG-61b5e38d370da6.75955308.jpg'),
(4, 4, 'Pasta', 'The Kitchen', 'rangpur', 4, 200, 'snacks', 'italian', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus imperdiet, nulla et dictum interdum, nisi lorem egestas vitae scelerisque enim ligula venenatis dolor. Maecenas nisl est, ultrices nec congue eget, auctor vitae massa. Fusce luctus vestibulum augue ut aliquet. Nunc sagittis dictum nisi, sed ullamcorper ipsum dignissim ac. In at libero sed nunc venenatis imperdiet sed ornare turpis. Donec vitae dui eget tellus gravida venenatis. Integer fringilla congue eros non fermentum. Sed dapibus pulvinar nibh tempor porta.', 0, 0, 0, '2021-12-12 06:07:32', 'REVIMG-61b5e60402e529.24991398.jpg'),
(5, 3, 'dudh pauruti', 'babu mama', 'khulna', 5, 12, 'breakfast', 'deshi', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus imperdiet, nulla et dictum interdum, nisi lorem egestas vitae scelerisque enim ligula venenatis dolor. Maecenas nisl est, ultrices nec congue eget, auctor vitae massa. Fusce luctus vestibulum augue ut aliquet. Nunc sagittis dictum nisi, sed ullamcorper ipsum dignissim ac. In at libero sed nunc venenatis imperdiet sed ornare turpis. Donec vitae dui eget tellus gravida venenatis. Integer fringilla congue eros non fermentum. Sed dapibus pulvinar nibh tempor porta.', 0, 0, 0, '2021-12-12 06:25:45', 'REVIMG-61b5ea4916e4a3.41081185.jpg'),
(6, 3, 'ohoihlkdjfdlk', 'dfsewfsdsa', 'khulna', 3, 43, 'snacks', 'deshi', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus imperdiet, nulla et dictum interdum, nisi lorem egestas vitae scelerisque enim ligula venenatis dolor. Maecenas nisl est, ultrices nec congue eget, auctor vitae massa. Fusce luctus vestibulum augue ut aliquet. Nunc sagittis dictum nisi, sed ullamcorper ipsum dignissim ac. In at libero sed nunc venenatis imperdiet sed ornare turpis. Donec vitae dui eget tellus gravida venenatis. Integer fringilla congue eros non fermentum. Sed dapibus pulvinar nibh tempor porta.', 0, 0, 0, '2021-12-12 06:37:05', 'REVIMG-61b5ecf1269093.31238138.jpg'),
(7, 4, 'kolar mochar chop', 'random', 'khulna', 5, 5, 'snacks', 'deshi', 'নাজিরা বাজারের হাজীর বিরিয়ানি\r\nবিরিয়ানির জগতের ‘রিয়েল মাদ্রিদ’ হচ্ছে হাজীর বিরিয়ানি। আমাকে মাদ্রিদিস্তা ভাবার কোন কারণ নাই, হাজীর বিরিয়ানিকে রিয়েল মাদ্রিদ বলার কারণ চ্যাম্পিয়ন্স লীগের মত বিরিয়ানির জগতে সবচেয়ে সফল হচ্ছে হাজীর বিরিয়ানি।\r\n\r\nহাজী বিরিয়ানির যাত্রা শুরু ১৯৩৯ সালে। বংশ পরম্পরায় এই ব্যবসা দীর্ঘদিন ধরে রেখেছে হাজী হোসেনের পরিবারের লোকজন। এখন এই ব্যবসার দেখাশোনা করেন হাজী মুহাম্মদ বাপী যিনি প্রতিষ্ঠাতা হাজী মুহাম্মদ হোসেনের নাতি।\r\n\r\nহাজীর বিরিয়ানির প্রথম বিশেষত্ব হচ্ছে তারা বিরিয়ানি রান্নায় ঘি বা বাটার ওয়েল এর পরিবর্তে শুধু সরিষার তেল ব্যবহার করে।\r\nআর দ্বিতীয় বিশেষত্ব হচ্ছে, এই দোকানের কোন সাইনবোর্ড নাই। অবশ্যই সবাই এক নামে চেনে।\r\nখাবারের জগতে হাজীর বিরিয়ানী বাংলাদেশের একটা যুগান্তকারী ব্র্যান্ড। হাজীর বিরিয়ানি রান্না করা হয় শুধুই খাসির মাংস দিয়ে। আরেকটা বিশেষত্ব হচ্ছে কাঁঠাল পাতার বিশেষ এক ঠোঙায় করে এই বিরিয়ানি পার্সেল করা হয়। অন্য কোন কাগজ কিংবা বক্সে পার্সেল দেওয়া হয় না। এটিও হাজীর বিরিয়ানির একটি ঐতিহ্য হিসেবে ধরা হয়।', 0, 0, 0, '2021-12-13 12:50:28', 'REVIMG-61b6447465b8f8.42228997.jpg'),
(9, 3, 'roshmalai', 'sweet shop', 'rangpur', 4, 300, 'snacks', 'deshi', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus imperdiet, nulla et dictum interdum, nisi lorem egestas vitae scelerisque enim ligula venenatis dolor. Maecenas nisl est, ultrices nec congue eget, auctor vitae massa. Fusce luctus vestibulum augue ut aliquet. Nunc sagittis dictum nisi, sed ullamcorper ipsum dignissim ac. In at libero sed nunc venenatis imperdiet sed ornare turpis. Donec vitae dui eget tellus gravida venenatis. Integer fringilla congue eros non fermentum. Sed dapibus pulvinar nibh tempor porta.', 0, 0, 0, '2021-12-13 03:17:44', 'REVIMG-61b70fb8bf3298.79465166.jpg'),
(12, 5, 'lassi', 'Saidpur', 'rangpur', 5, 25, 'beverage', 'deshi', 'Sed vel turpis non mauris aliquam pellentesque. Proin vitae volutpat ante, sed pharetra lorem. Fusce ac lacus eget diam convallis venenatis vitae a odio. Suspendisse aliquam eros quis rhoncus commodo. Cras condimentum eu quam dictum egestas. Ut euismod imperdiet augue, sit amet tempor massa interdum non. Nunc pharetra id dui varius sodales. Phasellus leo massa, malesuada id pharetra nec, euismod sit amet augue. Vestibulum a feugiat lectus. Integer enim nisi, suscipit id nibh vel, pretium vehicula lorem. Ut dolor velit, commodo nec pellentesque at, faucibus eget nunc. Cras egestas est vitae nisi finibus blandit.\r\n\r\nPhasellus vel est id quam bibendum vehicula. Ut aliquet cursus dolor eget posuere. Sed vitae auctor odio. Fusce eleifend et nulla eget porta. Nunc condimentum, nibh scelerisque dictum eleifend, orci magna lacinia elit, eget dignissim nulla erat quis felis. Ut venenatis neque nisl, sit amet blandit nibh sodales a. Sed vestibulum aliquet dui scelerisque tincidunt. In quis nunc vel arcu semper pellentesque. Vestibulum lacinia mollis enim sit amet consectetur. Etiam semper eu dui ut dapibus. Curabitur consequat ante ut diam lacinia finibus. Phasellus a varius sapien. Cras faucibus elementum purus, id dapibus nisl bibendum in. Mauris in nisi elit. Nunc facilisis nulla sit amet elementum scelerisque. Nullam aliquam odio orci, sit amet eleifend sem semper in.', 0, 0, 0, '2021-12-13 18:28:32', 'REVIMG-61b73c7081fed2.99328795.jpg'),
(13, 3, 'dfsdfewwasdf', 'sdfsagdfsd', 'khulna', 4, 33, 'snacks', 'deshi', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 0, 0, 0, '2021-12-15 14:01:43', 'REVIMG-61b9a0e7baca38.58760219.jpg');

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
(3, 'Samin', 'Yeasar', 'samin_yeasar', 'samin@gmail.com', '25d55ad283aa400af464c76d713c07ad', '2021-12-11', 'image/dp/DPIMG-61b8148aafda54.63941109.png', 'Rangpur', 0),
(4, 'John', 'Doe', 'john_doe', 'john@mail.com', '25d55ad283aa400af464c76d713c07ad', '2021-12-12', 'image/dp/DPIMG-61b9f96a307397.61701613.jpg', 'Rangpur', 0),
(5, 'Niaz', 'Mahmud', 'niaz_mahmud', 'niazmahmud@gmail.com', '25d55ad283aa400af464c76d713c07ad', '2021-12-13', 'image/dp/user_dp.jpg', 'Dhaka', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`comment_id`);

--
-- Indexes for table `rating_info`
--
ALTER TABLE `rating_info`
  ADD UNIQUE KEY `post_id` (`post_id`,`user_id`);

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
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `comment_id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `review`
--
ALTER TABLE `review`
  MODIFY `review_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

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
