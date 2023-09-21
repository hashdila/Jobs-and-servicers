-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 21, 2023 at 08:04 PM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.1.1

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
-- Table structure for table `cus`
--

CREATE TABLE `cus` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `NIC` varchar(12) NOT NULL,
  `address` text NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `profile_image` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `cus`
--

INSERT INTO `cus` (`id`, `name`, `email`, `NIC`, `address`, `username`, `password`, `profile_image`) VALUES
(1, 'z', 'z@gmail.com', '991191470v', 'Debathgama', 'z', '$2y$10$.aQYGdivjyVMOCY6ylk0l.WBJDe7LSEWyMkmNChBHPOz1xvqOeTEi', NULL),
(2, 'dilan', 'z@gmail.com', '991191470v', 'Debathgama', 'z', '$2y$10$qNjlcNtOSjwo05oqzq2yYe.pHhLDfDQyU4FBAabYBTZbDgH7PqHs6', NULL),
(3, 'x', 'x@gmail.com', '991191470v', 'fdfsdf', 'x', '$2y$10$FaqoJz5XL0K9QgB3oM.pL.3/ZFbKXEOedDMW1L95XTG6OTozomORC', NULL),
(6, 'asmila', 'dilan@gmail.com', '991191470v', 'Debathgama', 'b', '$2y$10$TPBGAI8Z59ZHfZJi3xiVBeFLCcO8p6PqMuUp.p2DLA2YjDdywkgr2', 'old-black-background-grunge-texture-dark-wallpaper-blackboard-chalkboard-room-wall.jpg'),
(7, 'asmila', 'dilan@gmail.com', '991191470v', 'Debathgama', 'b', '$2y$10$8AGA/0tR95eE6opK/bOUrOLRqwbVh8csBUOjbFYWfeL/IWyaxH3x6', 'old-black-background-grunge-texture-dark-wallpaper-blackboard-chalkboard-room-wall.jpg'),
(8, 'asmila', 'dilan@gmail.com', '991191470v', 'Debathgama', 'b', '$2y$10$83jdUF9RWynixn3wlVLaoe6CrgdaCOS6j0uHiCPKNgqGx0jurlSOC', 'old-black-background-grunge-texture-dark-wallpaper-blackboard-chalkboard-room-wall.jpg'),
(9, 'asdasd', 'dilannawa@gmail.com', 'asdasd', 'sadasd', 'm', '$2y$10$bZRcmarCL1eMWQYBe4k.DecUJSgrCK/PHyrNVxaJmW0M7kObwGg3u', '');

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
  `accepted` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `cus_posts`
--

INSERT INTO `cus_posts` (`job_id`, `name`, `age`, `address`, `work_description`, `image1`, `image2`, `image3`, `location`, `phone_number`, `cus_id`, `need_t`, `lat`, `lng`, `map_address`, `accepted`) VALUES
(6, 'asdasdadas', 12, 'asdasd', 'asdasd', 'images/logo.png', 'images/logo.png', 'images/logo.png', 'Theldeniya', '07715475', 1, 'Electrician', '7.66020885', '80.25966484', 'M765+3V Wariyapola, Sri Lanka', 0),
(12, 'dilan', NULL, 'Debathgama, kegalle', 'Nedd best carpenter to Make table', 'images/logo.png', 'images/logo.png', 'images/logo.png', 'Peradeniya', '0765265524', 3, 'Carpenter', '7.26941547', '80.60436089', '1059 Colombo - Kandy Rd, Kandy, Sri Lanka', 0),
(13, 'Amila Nuwan', NULL, 'karadana, pinawala', 'I wnt o clear the map', 'images/us2-class.jpg', 'images/us2-class.jpg', 'images/us2-class.jpg', 'Kandy', '0765265524', 1, 'Electrician', '7.27895114', '80.36952813', '79H9+HR Rambukkana, Sri Lanka', 0),
(15, 'Hasitha', NULL, 'sdagala, uhumiya', 'dscsdsdvsdvfdvfvfv', 'images/us2-class.jpg', 'images/us2-class.jpg', 'images/us2-class.jpg', 'Colombo 1', '0777', 1, 'Electrician', '7.59195960', '80.50430732', 'HGR3+QP Gokarella, Sri Lanka', 0),
(16, 'asdad', NULL, 'asdasd', 'asdasdas', 'images/', 'images/', 'images/', 'Peradeniya', 'asdasd', 1, 'Plumber', '7.48288000', '80.35619000', '83 Bauddhaloka Rd, Kurunegala 60000, Sri Lanka', 0);

-- --------------------------------------------------------

--
-- Table structure for table `locations`
--

CREATE TABLE `locations` (
  `id` int(11) UNSIGNED NOT NULL,
  `lat` float NOT NULL,
  `lng` float NOT NULL,
  `address` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `locations`
--

INSERT INTO `locations` (`id`, `lat`, `lng`, `address`) VALUES
(1, 0, 0, '');

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
(1, 1376074816, 240764149, 'hi'),
(2, 240764149, 1376074816, 'hi'),
(3, 240764149, 1376074816, 'cgfcgcgfc');

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
(1, 6, NULL, 'asdasdasd', '2023-09-14 13:41:15'),
(2, 6, NULL, 'sdasdasdasd', '2023-09-14 13:44:08'),
(3, 6, NULL, 'wwdasd', '2023-09-17 17:36:37');

-- --------------------------------------------------------

--
-- Table structure for table `tec`
--

CREATE TABLE `tec` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `address` varchar(255) NOT NULL,
  `job_category` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `profile_image` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tec`
--

INSERT INTO `tec` (`id`, `username`, `name`, `email`, `address`, `job_category`, `password`, `profile_image`) VALUES
(1, '1', 'dilan', 'dilannawa2@gmail.com', 'Debathgama', 'Mason', '$2y$10$EL311fVlwbEF7kc6JHSYGO1.SI5Ol4sttmYFg5JQEHsEmMh6PdDXy', NULL),
(2, '2', 'dilan', 'dilannawa2@gmail.com', 'Debathgama', 'Carpenter', '$2y$10$dmA9lK63xWjkOTwE.CkLzeHz7MFuc7kZsILJ2uhySnp8vTjOBiXnC', NULL),
(9, '3', 'hasitha', 'veeshan@gmail.com', 'Debathgama', 'Mason', '$2y$10$v.boJbo1JPUSGNQkMLryw.fYiiTi.SfzWunQAUaE/Ky1/lK68FGF6', 'profile images/Cardiff-Metropolitan-University-logo-removebg-preview.png'),
(11, '6', 'sfga', 'veeshan@gmail.com', 'Debathgama', 'Plumber', '$2y$10$hmzyBkvIEZSbkbzn.2omdunvm1aynm0P/8lEaZCwZuBnp4imrptMy', 'profile images/QRCode (3).png'),
(12, '7', 'Sameera', 'veeshan@gmail.com', 'Debathgama', 'Plumber', '$2y$10$28hO8n2u8cM5uP6dk25j1.DUq8L5G9JC0zNJYG9NqdgiDpE7q6cTK', 'profile images/QRCode.png'),
(15, '9', 'Saadh', 'veeshan@gmail.com', 'Debathgama', 'Plumber', '$2y$10$fjnlETMO2cUo6APOXcC4Ju2hawruAqezxxLQ00ysRas/CuANHr4ie', 'profile images/eaa97eec-b116-4b6f-b5d4-ec9e6f0c0d06-removebg-preview.png'),
(17, 'fgg', 'fghdfg', 'veeshan@gmail.com', 'gdfg', 'Mason', '$2y$10$tSp9txGeMhbfiSIM.XKXFuQLEa9gZxv4ynfbp80zAZbheEtFb1EgW', 'profile images/dart-155726_640.webp'),
(18, '4', '4', 'veeshan@gmail.com', '4', 'Plumber', '$2y$10$e5zPRYEjscHSmpCyfwhvbO0xKTcp3rIk689W9tkt8pKjcDbdDu5Jq', 'profile images/dulafinal-02.jpg');

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
(21, 'Dilan NAwarathna', 'Carpenter', 34, 'Debathgama, kegalle', 'I have good experince for crate the sample works', 'images/QRCode.png', 'images/QRCode.png', 'images/old-black-background-grunge-texture-dark-wallpaper-blackboard-chalkboard-room-wall.jpg', 'Kandy', '07715475', 2, '7.37702048', '81.06715996', '93G8+RV Welanpela, Sri Lanka', 0),
(27, 'dilan', 'Carpenter', 32, 'Debathgama', 'adadasdadasd', 'images/Screenshot_2023-08-20_194123-removebg-preview.png', 'images/Screenshot_2023-08-20_194123-removebg-preview.png', 'images/QRCode (1).png', 'kaluthara', '07748596', 2, '8.20970417', '81.32533867', '685G+V4 Verugal, Sri Lanka', 0),
(32, 'asdas', 'Carpenter', 34, 'asdas', 'dasdas', 'images/logo.png', 'images/logo.png', 'images/logo.png', 'Peradeniya', '234243234', 1, '7.40970544', '81.31435234', 'C857+VP Warapitiya, Sri Lanka', 0),
(34, 'we', 'Electrician', 12, 'rwer', 'erwer', 'images/logo.png', 'images/logo.png', 'images/logo.png', 'Theldeniya', '07715475', NULL, '6.23706134', '80.14430840', '64PV+RP Ethkandura, Sri Lanka', 0),
(35, 'asdasd', 'Plumber', 23, 'asdasd', 'asdasdas', 'images/', 'images/', 'images/', 'Kandy', '07715475', NULL, '6.23160066', '80.26515801', '67J8+J3 Thalgaswala, Sri Lanka', 0),
(38, 'asdasd', 'nun', 34, 'asdasd', 'asdasdasd', 'images/', 'images/', 'images/', 'Peradeniya', '23', 1, '0.00000000', '0.00000000', '', 0);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `unique_id` int(255) NOT NULL,
  `fname` varchar(255) NOT NULL,
  `lname` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `img` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `unique_id`, `fname`, `lname`, `email`, `password`, `img`, `status`) VALUES
(1, 177262191, 'Dilan', 'NAwarathna', 'dilan@gmail.com', 'c4ca4238a0b923820dcc509a6f75849b', '1695319162logo.png', 'Offline now'),
(2, 781367248, 'Hasitha', 'Bandara', 'Hasitha@gmail.com', 'c4ca4238a0b923820dcc509a6f75849b', '1695319212profile.png', 'Offline now'),
(3, 1376074816, 'Saadh', 'Mohomad', 'saadh@gmail.com', 'c4ca4238a0b923820dcc509a6f75849b', '1695319240profile.png', 'Active now'),
(4, 240764149, 'vishan', 'vimukthi', 'vishan@gmail.com', 'c4ca4238a0b923820dcc509a6f75849b', '1695319281profile.png', 'Offline now');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cus`
--
ALTER TABLE `cus`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cus_posts`
--
ALTER TABLE `cus_posts`
  ADD PRIMARY KEY (`job_id`);

--
-- Indexes for table `locations`
--
ALTER TABLE `locations`
  ADD PRIMARY KEY (`id`);

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
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cus`
--
ALTER TABLE `cus`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `cus_posts`
--
ALTER TABLE `cus_posts`
  MODIFY `job_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `locations`
--
ALTER TABLE `locations`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `msg_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `post_comments`
--
ALTER TABLE `post_comments`
  MODIFY `comment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tec`
--
ALTER TABLE `tec`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `tec_posts`
--
ALTER TABLE `tec_posts`
  MODIFY `job_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

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
