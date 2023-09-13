-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 13, 2023 at 09:10 PM
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
(7, 'Asitha Bandara', NULL, 'Debathgama', 'ASasSsASsA', 'images/j-s-low-resolution-logo-black-on-white-background.png', 'images/profile.png', 'images/j-s-low-resolution-logo-black-on-white-background.png', 'Kandy', '07715475', 1, 'Plumber', '8.13901858', '81.01772148', '42Q9+J3 Diyasenpura, Sri Lanka', 0);

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
-- Table structure for table `private_chats`
--

CREATE TABLE `private_chats` (
  `id` int(11) NOT NULL,
  `tec_id` int(11) DEFAULT NULL,
  `cus_id` int(11) DEFAULT NULL,
  `message` text DEFAULT NULL,
  `sender` varchar(255) DEFAULT 'tec',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
(21, 'Dilan NAwarathna', 'Carpenter', 34, 'Debathgama, kegalle', 'I have good experince for crate the sample works', 'images/QRCode.png', 'images/QRCode.png', 'images/old-black-background-grunge-texture-dark-wallpaper-blackboard-chalkboard-room-wall.jpg', 'kandy', '07715475', 2, '7.37702048', '81.06715996', '93G8+RV Welanpela, Sri Lanka', 0),
(27, 'dilan', 'Carpenter', 32, 'Debathgama', 'adadasdadasd', 'images/Screenshot_2023-08-20_194123-removebg-preview.png', 'images/Screenshot_2023-08-20_194123-removebg-preview.png', 'images/QRCode (1).png', 'kaluthara', '07748596', 2, '8.20970417', '81.32533867', '685G+V4 Verugal, Sri Lanka', 0),
(32, 'asdas', 'Carpenter', 34, 'asdas', 'dasdas', 'images/logo.png', 'images/logo.png', 'images/logo.png', 'Peradeniya', '234243234', 1, '7.40970544', '81.31435234', 'C857+VP Warapitiya, Sri Lanka', 0),
(33, 'asdasd', 'nun', 123123, 'asda', 'sdasd', 'images/', 'images/', 'images/', 'Peradeniya', 'asdsd', NULL, '7.51863776', '80.99025566', 'GX9R+F4 Hembarawa, Sri Lanka', 0);

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
-- Indexes for table `private_chats`
--
ALTER TABLE `private_chats`
  ADD PRIMARY KEY (`id`);

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
  MODIFY `job_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `locations`
--
ALTER TABLE `locations`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `private_chats`
--
ALTER TABLE `private_chats`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tec`
--
ALTER TABLE `tec`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `tec_posts`
--
ALTER TABLE `tec_posts`
  MODIFY `job_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
