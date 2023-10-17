-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 17, 2023 at 11:22 PM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 7.3.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `jas`
--

-- --------------------------------------------------------

--
-- Table structure for table `accepted_jobs`
--

CREATE TABLE `accepted_jobs` (
  `accept_id` int(11) NOT NULL,
  `job_id` int(11) NOT NULL,
  `tec_id` int(11) NOT NULL,
  `tec_name` varchar(255) NOT NULL,
  `accepted_date` timestamp NOT NULL DEFAULT current_timestamp(),
  `name` varchar(255) NOT NULL,
  `address` varchar(500) NOT NULL,
  `work_description` varchar(255) NOT NULL,
  `location` varchar(100) NOT NULL,
  `price` varchar(500) DEFAULT NULL,
  `phone_number` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `accepted_jobs`
--

INSERT INTO `accepted_jobs` (`accept_id`, `job_id`, `tec_id`, `tec_name`, `accepted_date`, `name`, `address`, `work_description`, `location`, `price`, `phone_number`) VALUES
(1, 29, 24, 'Dilan Nawarathna', '2023-10-12 13:17:21', 'Hasitha bandara', 'wadupola ,Ibbagamuwa', '', 'Peradeniya', '23', 7748596),
(2, 29, 24, 'Dilan Nawarathna', '2023-10-12 13:18:18', 'Hasitha bandara', 'wadupola ,Ibbagamuwa', '', 'Peradeniya', '23', 7748596),
(3, 29, 24, 'Dilan Nawarathna', '2023-10-12 13:22:00', 'Hasitha bandara', 'wadupola ,Ibbagamuwa', '', 'Peradeniya', '23', 7748596),
(4, 54, 47, 'Vishan Vimukthi', '2023-10-12 13:26:32', 'Vishan Vimukthi', 'Sadagala ,Uhumiya', 'sdfsdfsdf', 'nun', '123', 7715475),
(5, 29, 24, 'Dilan Nawarathna', '2023-10-15 09:49:36', 'Hasitha bandara', 'wadupola ,Ibbagamuwa', '', 'Peradeniya', '23', 7748596);

-- --------------------------------------------------------

--
-- Table structure for table `cus_posts`
--

CREATE TABLE `cus_posts` (
  `job_id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `age` int(11) DEFAULT NULL,
  `address` text DEFAULT NULL,
  `work_description` text DEFAULT NULL,
  `image1` varchar(255) DEFAULT NULL,
  `image2` varchar(255) DEFAULT NULL,
  `image3` varchar(255) DEFAULT NULL,
  `location` varchar(255) DEFAULT NULL,
  `phone_number` varchar(20) DEFAULT NULL,
  `cus_id` int(11) DEFAULT NULL,
  `need_t` varchar(255) DEFAULT NULL,
  `lat` decimal(10,8) DEFAULT NULL,
  `lng` decimal(11,8) DEFAULT NULL,
  `map_address` varchar(255) DEFAULT NULL,
  `accepted` tinyint(1) NOT NULL DEFAULT 0,
  `price` int(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `cus_posts`
--

INSERT INTO `cus_posts` (`job_id`, `name`, `age`, `address`, `work_description`, `image1`, `image2`, `image3`, `location`, `phone_number`, `cus_id`, `need_t`, `lat`, `lng`, `map_address`, `accepted`, `price`) VALUES
(29, 'Hasitha bandara', NULL, 'wadupola ,Ibbagamuwa', NULL, '../images/us2-use case.jpg', '../images/', '../images/', 'Peradeniya', '07748596', 25, 'Plumber', '7.08445942', '80.86408320', 'B413, Sri Lanka', 0, 23),
(30, 'Hasitha bandara', NULL, 'wadupola ,Ibbagamuwa', NULL, '../images/us2-use case.drawio.png', '../images/us2-use case.drawio.png', '../images/asdasdasd.jpg', 'Theldeniya', '234', 25, 'Plumber', '7.23161887', '80.42463008', 'Kandewaththa Rd, Sri Lanka', 0, 2323),
(31, 'Vishan Vimukthiii', 0, 'Sadagala ,Uhumiya', '', '../images/us2-use case121212121.jpg', '../images/us2-use case.jpg', '../images/us2-use case121212121.jpg', 'Kandy', '0456258', 47, 'Carpenter', '7.61704615', '81.11526348', 'J488+R4 Sandunpura, Sri Lanka', 0, 1200),
(53, 'Hasith Bandara', 32, 'Pannla, Ibbagamuwa.', 'asdas', '../images/', '../images/', '../images/', 'nun', '', 38, 'nun', '7.49180000', '80.36270000', '11, Kurunegala 60000, Sri Lanka', 0, 100),
(55, 'Vishan Vimukthi', NULL, 'Sadagala ,Uhumiya', 'Nee to finalaice the home', '../images/4f84840c1ef141e6984d971eac41f7ad.jfif', '../images/house-construction-with-autoclaved-aerated-concrete-block-structure-building-site_293060-1049-370x245.jpg', '../images/', 'Negambo ', '07715475', 47, 'Carpenter', '7.26844619', '80.00564434', '7294+97 Kasiwatta, Sri Lanka', 0, 50000),
(56, 'Hasith Bandara', NULL, 'Pannla, Ibbagamuwa.', 'adasdasdasd', '../images/Screenshot 2023-10-12 155944.png', '../images/Screenshot 2023-10-12 155903.png', '../images/register.png', 'Theldeniya', '07748596', 38, 'Carpenter', '7.63337991', '80.78018047', 'JQMJ+93 Kongahawela, Sri Lanka', 0, 21323);

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE `messages` (
  `msg_id` int(11) NOT NULL,
  `incoming_msg_id` int(255) NOT NULL,
  `outgoing_msg_id` int(255) NOT NULL,
  `msg` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `messages`
--

INSERT INTO `messages` (`msg_id`, `incoming_msg_id`, `outgoing_msg_id`, `msg`) VALUES
(1, 511986239, 1411385216, 'Hi'),
(2, 456889697, 1411385216, 'dasdasdsd'),
(3, 1230185407, 1411385216, 'Hi');

-- --------------------------------------------------------

--
-- Table structure for table `post_comments`
--

CREATE TABLE `post_comments` (
  `comment_id` int(11) NOT NULL,
  `job_id` int(11) DEFAULT NULL,
  `tec_id` int(11) DEFAULT NULL,
  `comment_text` text DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `post_comments`
--

INSERT INTO `post_comments` (`comment_id`, `job_id`, `tec_id`, `comment_text`, `created_at`) VALUES
(1, 29, NULL, 'asdasdasdasd', '2023-10-09 15:56:21'),
(2, 29, NULL, 'sadasdsad', '2023-10-15 09:50:03');

-- --------------------------------------------------------

--
-- Table structure for table `tec`
--

CREATE TABLE `tec` (
  `id` int(11) NOT NULL,
  `unique_id` int(255) DEFAULT NULL,
  `username` varchar(50) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `address` varchar(255) NOT NULL,
  `job_category` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `profile_image` varchar(255) DEFAULT NULL,
  `status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tec_posts`
--

CREATE TABLE `tec_posts` (
  `job_id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `job_category` varchar(255) NOT NULL,
  `age` int(11) DEFAULT NULL,
  `physical_address` text DEFAULT NULL,
  `work_description` text DEFAULT NULL,
  `image1` varchar(255) DEFAULT NULL,
  `image2` varchar(255) DEFAULT NULL,
  `image3` varchar(255) DEFAULT NULL,
  `location` varchar(255) DEFAULT NULL,
  `phone_number` varchar(20) DEFAULT NULL,
  `tec_id` int(11) DEFAULT NULL,
  `lat` decimal(10,8) DEFAULT NULL,
  `lng` decimal(11,8) DEFAULT NULL,
  `map_address` varchar(255) DEFAULT NULL,
  `accepted` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tec_posts`
--

INSERT INTO `tec_posts` (`job_id`, `name`, `job_category`, `age`, `physical_address`, `work_description`, `image1`, `image2`, `image3`, `location`, `phone_number`, `tec_id`, `lat`, `lng`, `map_address`, `accepted`) VALUES
(66, 'Dilan Nawarathna', 'Driver', 23, 'Debathgama, Kegalle.', 'I am a profecianla driver.', '../images/1465187.png', '../images/1465187.png', '../images/1465187.png', 'Kandy', '07715475', 24, '7.26941547', '80.59612114', '7H9W+J49, Monument Dr, Kandy, Sri Lanka', 0),
(67, 'Hirsi Saadh', 'Carpenter', 35, 'pannala,Ibbagamuwa', 'I am best carpenter.', '../images/11041166_technician_electrician_caucasian_professions_and_icon.png', '../images/11041166_technician_electrician_caucasian_professions_and_icon.png', '../images/11041166_technician_electrician_caucasian_professions_and_icon.png', 'Theldeniya', '0765265524', 46, '7.55948035', '80.45604546', 'HF53+XX7, Ibbagamuwa, Sri Lanka', 0);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `unique_id` int(255) DEFAULT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `NIC` varchar(12) NOT NULL,
  `address` text NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `profile_image` varchar(255) DEFAULT NULL,
  `job_category` varchar(255) NOT NULL,
  `status` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `unique_id`, `name`, `email`, `NIC`, `address`, `username`, `password`, `profile_image`, `job_category`, `status`) VALUES
(24, 1411385216, 'Dilan Nawarathnaaa', 'dilan@gmail.com', '', 'Debathgama, Kegalle.', '1', '$2y$10$UOVEqWZ6yM.hZoGSgdbsJueljHZlePfAfzhS2iAmMcWYe3SGV6X/q', '../profile images/chat.png', 'Driver', 'Active now'),
(38, 456889697, 'Hasith Bandara', 'veeshan@gmail.com', '', 'Pannla, Ibbagamuwa.', 'z', '$2y$10$0BoZ7CFbUp3JbRQLZNdYlORJKFPWnOhoTUrJUjI2LIZweqYSD8Gi2', '../profile images/3067260.png', '', 'Active now'),
(46, 1230185407, 'Hirsi Saadh', 'sadh@gmail.com', '', 'pannala,Ibbagamuwa', '2', '$2y$10$c5jAOMRBN1CrwM5TPgKtnuC5atFwdtCZopdqubL6dibH4f0cyfJLu', '../profile images/20230927_130357.jpg', 'Carpenter', 'Active now'),
(47, 511986239, 'Vishan Vimukthi', 'vishan@gmail.com', '', 'Sadagala ,Uhumiya', 'x', '$2y$10$mMKmuNHu098GiWSLVin3cO72TbaXLDo/DNorqT0jdXuLPs36pwlde', '../profile images/20230927_130503.jpg', '', 'Active now');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `accepted_jobs`
--
ALTER TABLE `accepted_jobs`
  ADD PRIMARY KEY (`accept_id`);

--
-- Indexes for table `cus_posts`
--
ALTER TABLE `cus_posts`
  ADD PRIMARY KEY (`job_id`);

--
-- Indexes for table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`msg_id`);

--
-- Indexes for table `post_comments`
--
ALTER TABLE `post_comments`
  ADD PRIMARY KEY (`comment_id`),
  ADD KEY `job_id` (`job_id`),
  ADD KEY `tec_id` (`tec_id`);

--
-- Indexes for table `tec`
--
ALTER TABLE `tec`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tec_posts`
--
ALTER TABLE `tec_posts`
  ADD PRIMARY KEY (`job_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `accepted_jobs`
--
ALTER TABLE `accepted_jobs`
  MODIFY `accept_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `cus_posts`
--
ALTER TABLE `cus_posts`
  MODIFY `job_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=57;

--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `msg_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `post_comments`
--
ALTER TABLE `post_comments`
  MODIFY `comment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tec`
--
ALTER TABLE `tec`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `tec_posts`
--
ALTER TABLE `tec_posts`
  MODIFY `job_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=70;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `post_comments`
--
ALTER TABLE `post_comments`
  ADD CONSTRAINT `post_comments_ibfk_1` FOREIGN KEY (`job_id`) REFERENCES `cus_posts` (`job_id`),
  ADD CONSTRAINT `post_comments_ibfk_2` FOREIGN KEY (`tec_id`) REFERENCES `tec` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
