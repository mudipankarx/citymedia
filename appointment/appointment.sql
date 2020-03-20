-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 20, 2020 at 03:36 PM
-- Server version: 10.4.6-MariaDB
-- PHP Version: 7.3.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `appointment`
--

-- --------------------------------------------------------

--
-- Table structure for table `apointment`
--

CREATE TABLE `apointment` (
  `id` int(11) NOT NULL,
  `user_id` int(10) NOT NULL,
  `session_id` varchar(30) NOT NULL,
  `key` text NOT NULL,
  `val` varchar(20) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `appointment_det`
--

CREATE TABLE `appointment_det` (
  `id` int(11) NOT NULL,
  `user_id` int(10) NOT NULL,
  `session_id` varchar(100) NOT NULL,
  `size_name` varchar(20) NOT NULL,
  `size_price` varchar(20) NOT NULL,
  `type_name` varchar(20) NOT NULL,
  `type_price` varchar(20) NOT NULL,
  `spot` varchar(20) NOT NULL,
  `wall_type` varchar(20) NOT NULL,
  `wall_price` varchar(20) NOT NULL,
  `option1` varchar(20) NOT NULL,
  `option1_price` varchar(20) NOT NULL,
  `option2` varchar(20) NOT NULL,
  `option2_price` varchar(20) NOT NULL,
  `option3` varchar(20) NOT NULL,
  `option3_price` varchar(20) NOT NULL,
  `option4` varchar(20) NOT NULL,
  `option4_price` varchar(20) NOT NULL,
  `option5` varchar(20) NOT NULL,
  `option5_price` varchar(20) NOT NULL,
  `option6` varchar(20) NOT NULL,
  `option6_price` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `appointment_det`
--

INSERT INTO `appointment_det` (`id`, `user_id`, `session_id`, `size_name`, `size_price`, `type_name`, `type_price`, `spot`, `wall_type`, `wall_price`, `option1`, `option1_price`, `option2`, `option2_price`, `option3`, `option3_price`, `option4`, `option4_price`, `option5`, `option5_price`, `option6`, `option6_price`) VALUES
(1, 1, '1', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(2, 1, '1', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `bracket_type`
--

CREATE TABLE `bracket_type` (
  `bracket_id` int(11) NOT NULL,
  `size_id` int(11) NOT NULL,
  `title` text NOT NULL,
  `gross_price` int(15) NOT NULL,
  `price` int(15) NOT NULL,
  `status` enum('y','n') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bracket_type`
--

INSERT INTO `bracket_type` (`bracket_id`, `size_id`, `title`, `gross_price`, `price`, `status`) VALUES
(1, 0, 'Fixed', 50, 25, 'y'),
(2, 0, 'Tilting', 56, 28, 'y'),
(3, 0, 'Full motion', 58, 29, 'y'),
(4, 0, 'None - I already have a bracket', 0, 0, 'y');

-- --------------------------------------------------------

--
-- Table structure for table `size`
--

CREATE TABLE `size` (
  `id` int(11) NOT NULL,
  `name` text NOT NULL,
  `price` int(22) NOT NULL,
  `status` enum('y','n') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `size`
--

INSERT INTO `size` (`id`, `name`, `price`, `status`) VALUES
(1, 'Up to 31', 69, 'y'),
(2, '32\" - 60\"', 99, 'y'),
(3, '61\" - 80\"', 139, 'y'),
(4, 'Over 81\"', 159, 'y');

-- --------------------------------------------------------

--
-- Table structure for table `spot`
--

CREATE TABLE `spot` (
  `spot_id` int(11) NOT NULL,
  `title` text NOT NULL,
  `status` enum('y','n') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `spot`
--

INSERT INTO `spot` (`spot_id`, `title`, `status`) VALUES
(1, 'On the wall', 'y'),
(2, 'Above a fireplace', 'y');

-- --------------------------------------------------------

--
-- Table structure for table `temp_rec`
--

CREATE TABLE `temp_rec` (
  `id` int(11) NOT NULL,
  `session_id` varchar(50) NOT NULL,
  `section` varchar(20) NOT NULL,
  `key` varchar(100) NOT NULL,
  `val` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `temp_rec`
--

INSERT INTO `temp_rec` (`id`, `session_id`, `section`, `key`, `val`) VALUES
(2, 'r05mn4nsa3hj9m8gbv3n1343b2', '', '', ''),
(7, 'r05mn4nsa3hj9m8gbv3n1343b2', '', '', ''),
(8, 'm1626qnhaem5nar0i0kv4p9rmr', 'size', '32\" - 60\"', '99'),
(10, 'm1626qnhaem5nar0i0kv4p9rmr', 'type', 'Tilting', '28'),
(11, 'm1626qnhaem5nar0i0kv4p9rmr', 'spot', '1', '0'),
(12, 'm1626qnhaem5nar0i0kv4p9rmr', 'wall_det', 'Brick', '35');

-- --------------------------------------------------------

--
-- Table structure for table `user_detils`
--

CREATE TABLE `user_detils` (
  `id` int(11) NOT NULL,
  `session_id` varchar(100) NOT NULL,
  `fname` text NOT NULL,
  `lname` text NOT NULL,
  `email` varchar(250) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `address` text NOT NULL,
  `address_instructions` text NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_detils`
--

INSERT INTO `user_detils` (`id`, `session_id`, `fname`, `lname`, `email`, `phone`, `address`, `address_instructions`, `date`) VALUES
(1, 'm1626qnhaem5nar0i0kv4p9rmr', '', '', 'srmukherjee27@gmail.com', '7980969257', '', '', '2020-02-20'),
(2, 'm1626qnhaem5nar0i0kv4p9rmr', 'd', 'd', 'srmukherjee27@gmail.com', '7980969257', '', '', '2020-02-20'),
(3, 'm1626qnhaem5nar0i0kv4p9rmr', 'd', 'd', 'srmukherjee27@gmail.com', '7980969257', '', '', '2020-02-20'),
(4, 'm1626qnhaem5nar0i0kv4p9rmr', 'rew', 'rwrw', 'srmukherjee27@gmail.com', '646-334-4875', 'rewrwrw', 'rwrwerw', '2020-02-20'),
(5, 'm1626qnhaem5nar0i0kv4p9rmr', 'wewr', 'wrwr', 'srmukherjee27@gmail.com', '7980969257', 'twetet', 'rtwrwer', '2020-02-20'),
(6, 'm1626qnhaem5nar0i0kv4p9rmr', 'wewr', 'wrwr', 'srmukherjee27@gmail.com', '7980969257', '', '', '2020-02-20');

-- --------------------------------------------------------

--
-- Table structure for table `wall_type`
--

CREATE TABLE `wall_type` (
  `wall_id` int(11) NOT NULL,
  `title` text NOT NULL,
  `price` int(22) NOT NULL,
  `status` enum('y','n') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `wall_type`
--

INSERT INTO `wall_type` (`wall_id`, `title`, `price`, `status`) VALUES
(1, 'Drywall or wood', 0, 'y'),
(2, 'Brick', 35, 'y'),
(3, 'Concrete', 35, 'y');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `apointment`
--
ALTER TABLE `apointment`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `appointment_det`
--
ALTER TABLE `appointment_det`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `bracket_type`
--
ALTER TABLE `bracket_type`
  ADD PRIMARY KEY (`bracket_id`);

--
-- Indexes for table `size`
--
ALTER TABLE `size`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `spot`
--
ALTER TABLE `spot`
  ADD PRIMARY KEY (`spot_id`);

--
-- Indexes for table `temp_rec`
--
ALTER TABLE `temp_rec`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_detils`
--
ALTER TABLE `user_detils`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `wall_type`
--
ALTER TABLE `wall_type`
  ADD PRIMARY KEY (`wall_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `apointment`
--
ALTER TABLE `apointment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `appointment_det`
--
ALTER TABLE `appointment_det`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `bracket_type`
--
ALTER TABLE `bracket_type`
  MODIFY `bracket_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `size`
--
ALTER TABLE `size`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `spot`
--
ALTER TABLE `spot`
  MODIFY `spot_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `temp_rec`
--
ALTER TABLE `temp_rec`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `user_detils`
--
ALTER TABLE `user_detils`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `wall_type`
--
ALTER TABLE `wall_type`
  MODIFY `wall_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
