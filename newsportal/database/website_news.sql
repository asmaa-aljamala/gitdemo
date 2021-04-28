-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 27, 2021 at 01:12 AM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 8.0.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `website_news`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `full_name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `email`, `password`, `full_name`) VALUES
(1, 'admin', 'admin', 'asmaa'),
(2, 'sss@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', 'raghdamm');

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `title` varchar(1000) NOT NULL,
  `pic` varchar(1000) NOT NULL,
  `active` varchar(100) NOT NULL,
  `featured` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `title`, `pic`, `active`, `featured`) VALUES
(2, 'spotrs', 'images/3956630x355.jpg', 'Yes', 'Yes'),
(3, 'Fachion', 'images/120230227130_2048366708769028_3147408650767695872_n.jpg', 'Yes', 'No');

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `id` int(11) NOT NULL,
  `id_post` int(11) NOT NULL,
  `full_name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `message` text NOT NULL,
  `date_comment` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`id`, `id_post`, `full_name`, `email`, `message`, `date_comment`) VALUES
(3, 2, 'asmaa', 'roroter999@gmail.com', 'hello asmaa', 'Apr 26,2021 11:41 pm'),
(4, 3, 'Raghdaa', 'roroter199@gmail.com', 'ruwhfsLHLkfs', 'Apr 26,2021 11:42 pm');

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `title` varchar(1000) NOT NULL,
  `description` varchar(1000) NOT NULL,
  `active` varchar(1000) NOT NULL,
  `date_post` varchar(100) NOT NULL,
  `image` varchar(1000) NOT NULL,
  `featured` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `category_id`, `title`, `description`, `active`, `date_post`, `image`, `featured`) VALUES
(1, 2, 'hello every one', 'Welcome To The Best Model Winner Contest At Look of the year Welcome To The Best Model Winner Conte Tahiti To Reopen To International Travel in May Tahiti To Reopen To International Travel in May Tahiti To Reopen To International Travel in May\r\nWelcome To The Best Model Winner Contest At Look of the year Welcome To The Best Model Winner Conte Tahiti To Reopen To International Travel in May Tahiti To Reopen To International Travel in May Tahiti To Reopen To International Travel in MayWelcome To The Best Model Winner Contest At Look of the year Welcome To The Best Model Winner Conte Tahiti To Reopen To International Travel in May Tahiti To Reopen To International Travel in May Tahiti To Reopen To International Travel in May', 'Yes', 'Apr,26 2021', 'images/3832g3.jpg', 'Yes'),
(2, 2, 'Get the Illusion of Fuller Lashes by “Mascng.”', 'Inter Milan continued its march to its first Serie A title in more than a decade as it beat relegation-threatened Cagliari 1-0 on Sunday. Defender Matteo Darmian scored the only goal of the match in the 77th minute as Inter found it tougher than expected against a side fighting for Serie A survival. Coach Antonio Conte ran onto the pitch to celebrate with his players as the goal restored Inter’s 11-point advantage over second-place AC Milan, which won 3-1 at Parma on Saturday. Inter Milan continued its march to its first Serie A title in more than a decade as it beat relegation-threatened Cagliari 1-0 on Sunday. Defender Matteo Darmian scored the only goal of the match in the 77th minute as Inter found it tougher than expected against a side fighting for Serie A survival. Coach Antonio Conte ran onto the pitch to celebrate with his players as the goal restored Inter’s 11-point advantage over second-place AC Milan, which won 3-1 at Parma on Saturday.', 'Yes', 'Apr,26 2021', 'images/5271', 'Yes'),
(3, 3, 'Every avid independent filmmaker', 'Inter Milan continued its march to its first Serie A title in more than a decade as it beat relegation-threatened Cagliari 1-0 on Sunday. Defender Matteo Darmian scored the only goal of the match in the 77th minute as Inter found it tougher than expected against a side fighting for Serie A survival. Coach Antonio Conte ran onto the pitch to celebrate with his players as the goal restored Inter’s 11-point advantage over second-place AC Milan, which won 3-1 at Parma on Saturday. Inter Milan continued its march to its first Serie A title in more than a decade as it beat relegation-threatened Cagliari 1-0 on Sunday. Defender Matteo Darmian scored the only goal of the match in the 77th minute as Inter found it tougher than expected against a side fighting for Serie A survival. Coach Antonio Conte ran onto the pitch to celebrate with his players as the goal restored Inter’s 11-point advantage over second-place AC Milan, which won 3-1 at Parma on Saturday.', 'Yes', 'Apr,26 2021', 'images/5814630x355.jpg', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_category` (`category_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `posts`
--
ALTER TABLE `posts`
  ADD CONSTRAINT `posts_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `category` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
