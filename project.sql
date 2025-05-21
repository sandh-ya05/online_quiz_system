-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 23, 2024 at 09:11 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `project`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_login`
--

CREATE TABLE `admin_login` (
  `id` int(5) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin_login`
--

INSERT INTO `admin_login` (`id`, `username`, `password`) VALUES
(1, 'admin', 'admin123'),
(2, 'sandhya', 'sandhya123');

-- --------------------------------------------------------

--
-- Table structure for table `exam_category`
--

CREATE TABLE `exam_category` (
  `id` int(5) NOT NULL,
  `category` varchar(50) NOT NULL,
  `exam_time_in_minutes` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `exam_category`
--

INSERT INTO `exam_category` (`id`, `category`, `exam_time_in_minutes`) VALUES
(12, 'science', '1'),
(13, 'maths', '1');

-- --------------------------------------------------------

--
-- Table structure for table `exam_results`
--

CREATE TABLE `exam_results` (
  `id` int(5) NOT NULL,
  `username` varchar(100) NOT NULL,
  `exam_type` varchar(100) NOT NULL,
  `total_question` varchar(10) NOT NULL,
  `correct_answer` varchar(10) NOT NULL,
  `wrong_answer` varchar(10) NOT NULL,
  `exam_time` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `exam_results`
--

INSERT INTO `exam_results` (`id`, `username`, `exam_type`, `total_question`, `correct_answer`, `wrong_answer`, `exam_time`) VALUES
(3, 'sandhya', 'maths', '2', '2', '0', '2024-05-22'),
(4, 'sandhya', 'science', '3', '1', '2', '2024-05-22'),
(5, 'sandhya', 'physics', '0', '0', '0', '2024-05-22'),
(6, 'sandhya', 'maths', '2', '0', '2', '2024-05-22'),
(7, 'sandhya', 'physics', '0', '0', '0', '2024-05-22'),
(8, 'sandhya', 'maths', '2', '2', '0', '2024-05-22'),
(9, 'sandhya', 'maths', '2', '1', '1', '2024-05-22'),
(10, 'sandhya', 'maths', '2', '2', '0', '2024-05-22'),
(11, 'sandhya', 'science', '0', '0', '0', '2024-05-22'),
(12, 'sandhya123', 'science', '0', '0', '0', '2024-05-23'),
(13, 'sandhya123', 'science', '0', '0', '0', '2024-05-23'),
(14, 'sandhya123', 'bio', '3', '0', '3', '2024-05-23'),
(15, 'sandhya123', 'bio', '3', '1', '2', '2024-05-23'),
(16, 'sandhya123', 'bio', '3', '1', '2', '2024-05-23'),
(17, 'sandhya123', 'bio', '3', '1', '2', '2024-05-23'),
(18, 'sandhya123', 'bio', '3', '1', '2', '2024-05-23'),
(19, 'sandhya123', 'maths', '1', '0', '1', '2024-05-23'),
(20, 'sandhya123', 'maths', '1', '1', '0', '2024-05-23'),
(21, 'sandhya123', 'bio', '3', '0', '3', '2024-05-23'),
(22, 'Satkar', 'science', '0', '0', '0', '2024-05-25'),
(23, 'Satkar', 'maths', '1', '1', '0', '2024-05-25'),
(24, 'Satkar', 'bio', '3', '1', '2', '2024-05-25'),
(25, 'sandhya123', 'science', '0', '0', '0', '2024-06-23'),
(26, 'sandhya123', 'bio', '3', '0', '3', '2024-06-23'),
(27, 'sandhya123', 'maths', '1', '1', '0', '2024-06-23'),
(28, 'ram123', 'maths', '1', '1', '0', '2024-06-23'),
(29, 'ram123', 'bio', '3', '0', '3', '2024-06-23'),
(30, 'ram123', 'bio', '3', '0', '3', '2024-06-23'),
(31, 'sandhya123', 'science', '0', '0', '0', '2024-06-23'),
(32, 'sandhya123', 'maths', '1', '1', '0', '2024-06-23'),
(33, 'sandhya123', 'bio', '2', '0', '2', '2024-06-23'),
(34, 'sandhya123', 'science', '1', '0', '1', '2024-06-23'),
(35, 'sandhya123', 'science', '1', '0', '1', '2024-06-23'),
(36, 'sandhya123', 'science', '1', '0', '1', '2024-06-23'),
(37, 'sandhya123', 'science', '1', '1', '0', '2024-06-23'),
(38, 'sandhya123', 'science', '2', '2', '0', '2024-06-23'),
(39, 'sandhya123', 'science', '2', '0', '2', '2024-06-23'),
(40, 'sandhya123', 'science', '2', '0', '2', '2024-06-23'),
(41, 'sandhya123', 'science', '2', '0', '2', '2024-06-23'),
(42, 'sandhya123', 'science', '2', '0', '2', '2024-06-23'),
(43, 'sandhya123', 'science', '2', '2', '0', '2024-06-23'),
(44, 'sandhya123', 'science', '2', '2', '0', '2024-06-23'),
(45, 'sandhya123', 'science', '2', '2', '0', '2024-06-23'),
(46, 'sandhya123', 'science', '2', '2', '0', '2024-06-23'),
(47, 'sandhya123', 'science', '2', '1', '1', '2024-06-23'),
(48, 'sandhya123', 'maths', '2', '0', '2', '2024-06-23'),
(49, 'sandhya123', 'maths', '2', '2', '0', '2024-06-23'),
(50, 'sandhya123', 'maths', '2', '2', '0', '2024-06-23'),
(51, 'sandhya123', 'science', '2', '0', '2', '2024-06-23'),
(52, 'sandhya123', 'science', '2', '0', '2', '2024-06-23'),
(53, 'sandhya123', 'science', '2', '0', '2', '2024-06-23'),
(54, 'sandhya123', 'maths', '2', '2', '0', '2024-06-23'),
(55, 'sandhya123', 'science', '2', '0', '2', '2024-06-23'),
(56, 'sandhya123', 'maths', '2', '2', '0', '2024-06-23'),
(57, 'sandhya123', 'science', '2', '1', '1', '2024-06-23'),
(58, 'sandhya123', 'maths', '2', '1', '1', '2024-06-23'),
(59, 'sandhya123', 'science', '2', '1', '1', '2024-06-23'),
(60, 'sandhya123', 'science', '2', '1', '1', '2024-06-23'),
(61, 'sandhya123', 'maths', '2', '1', '1', '2024-06-23'),
(62, 'sandhya123', 'science', '2', '1', '1', '2024-06-23'),
(63, 'sandhya123', 'maths', '2', '2', '0', '2024-06-23');

-- --------------------------------------------------------

--
-- Table structure for table `questions`
--

CREATE TABLE `questions` (
  `id` int(5) NOT NULL,
  `question_no` varchar(5) NOT NULL,
  `question` varchar(500) NOT NULL,
  `opt1` varchar(100) NOT NULL,
  `opt2` varchar(100) NOT NULL,
  `opt3` varchar(100) NOT NULL,
  `opt4` varchar(100) NOT NULL,
  `answer` varchar(100) NOT NULL,
  `category` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `questions`
--

INSERT INTO `questions` (`id`, `question_no`, `question`, `opt1`, `opt2`, `opt3`, `opt4`, `answer`, `category`) VALUES
(12, '2', 'Which of the following is NOT a component of the human circulatory system?', 'Heart', 'Lungs', 'Blood Vessels', 'Blood', 'Lungs', 'bio'),
(13, '3', 'Which blood type is known as the universal donor?', 'A+', 'AB-', 'O-', 'B+', 'O-', 'bio'),
(14, '1', '2+2', '7', '4', '5', '2', '4', 'maths'),
(15, '1', ' What is the PH of H2O?', '1', '4', '7', '6', '7', 'science'),
(16, '2', ' What is the PH of H2O?', '1', '6', '7', '6', '7', 'science'),
(17, '2', '2+2', '1', '4', '7', '45', '4', 'maths');

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `id` int(11) NOT NULL,
  `firstname` varchar(50) NOT NULL,
  `lastname` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`id`, `firstname`, `lastname`, `username`, `email`, `password`) VALUES
(1, 'satkar', 'shrestha', 'Satkar', 'satkarstha81@gmail.com', 'asdf'),
(2, 'sandhya', 'gharti', 'sandhya123', 'sandhya@gmail.com', 'sandhya123'),
(3, 'sandhya', 'ss', 'san', 'san@gmail.com', 'san'),
(4, 'samyog', 'shrestha', 'samyog', 'samyog@gmail.com', 'samyog'),
(5, 'satkar', 'stha', 'satkar123', 'satkar@gmail.com', 'satkar'),
(6, 'satkar', 'stha', 'satkar1234', 'satkar@gmail.com', 'satkar'),
(8, 'satkar', 'stha', 'sat', 'satka123@gmail.com', 'sasthgjgjg'),
(9, 'ram', 'bahadur', 'ram123', 'ram@gmail.com', 'rambahadur123');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin_login`
--
ALTER TABLE `admin_login`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `exam_category`
--
ALTER TABLE `exam_category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `exam_results`
--
ALTER TABLE `exam_results`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `questions`
--
ALTER TABLE `questions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin_login`
--
ALTER TABLE `admin_login`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `exam_category`
--
ALTER TABLE `exam_category`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `exam_results`
--
ALTER TABLE `exam_results`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=64;

--
-- AUTO_INCREMENT for table `questions`
--
ALTER TABLE `questions`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `student`
--
ALTER TABLE `student`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
