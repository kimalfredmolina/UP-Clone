-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Mar 06, 2025 at 08:14 AM
-- Server version: 8.0.37
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `enrollment_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `student_applications`
--

CREATE TABLE `student_applications` (
  `id` int NOT NULL,
  `first_name` varchar(50) NOT NULL,
  `middle_name` varchar(50) DEFAULT NULL,
  `last_name` varchar(50) NOT NULL,
  `suffix` varchar(50) DEFAULT NULL,
  `birthdate` date NOT NULL,
  `nationality` varchar(50) NOT NULL,
  `guardian_name` varchar(50) NOT NULL,
  `occupation` varchar(50) DEFAULT NULL,
  `guardian_nationality` varchar(50) NOT NULL,
  `guardian_contact` bigint NOT NULL,
  `address` varchar(50) NOT NULL,
  `strand` varchar(50) NOT NULL,
  `preferred_course` varchar(50) NOT NULL,
  `contact_number` bigint NOT NULL,
  `email_address` varchar(50) NOT NULL,
  `submission_date` timestamp NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `student_applications`
--

INSERT INTO `student_applications` (`id`, `first_name`, `middle_name`, `last_name`, `suffix`, `birthdate`, `nationality`, `guardian_name`, `occupation`, `guardian_nationality`, `guardian_contact`, `address`, `strand`, `preferred_course`, `contact_number`, `email_address`, `submission_date`) VALUES
(29, 'KIM ALFRED', 'A.', 'MOLINA', 'XXII', '2025-03-07', 'filipino', 'KIM ALFRED A. MOLINA', 'qweqw', 'qweqw', 9277324896, '23 Medel St.', 'ABM', 'BS Biology', 9277324896, 'kimalfred22molina@gmail.com', '2025-03-06 07:09:45');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `student_applications`
--
ALTER TABLE `student_applications`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `student_applications`
--
ALTER TABLE `student_applications`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
