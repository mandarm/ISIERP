-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jul 20, 2023 at 01:02 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.0.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `isierp`
--

-- --------------------------------------------------------

--
-- Table structure for table `active_crs_sem`
--

CREATE TABLE `active_crs_sem` (
  `id` int(5) NOT NULL,
  `course` varchar(50) NOT NULL,
  `batch` int(4) NOT NULL,
  `semester` int(1) NOT NULL,
  `status` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `active_crs_sem`
--

INSERT INTO `active_crs_sem` (`id`, `course`, `batch`, `semester`, `status`) VALUES
(1, 'M.Tech. (CS)', 2022, 3, 'Active'),
(2, 'M.Tech. (CS)', 2023, 1, 'Active');

-- --------------------------------------------------------

--
-- Table structure for table `auto_population`
--

CREATE TABLE `auto_population` (
  `ID` int(6) NOT NULL,
  `course` varchar(250) NOT NULL DEFAULT 'NA',
  `course_full` varchar(250) NOT NULL DEFAULT 'NA',
  `off_loc` varchar(50) NOT NULL,
  `unit` varchar(150) NOT NULL DEFAULT 'NA',
  `user_role` varchar(20) NOT NULL DEFAULT 'NA',
  `section` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `auto_population`
--

INSERT INTO `auto_population` (`ID`, `course`, `course_full`, `off_loc`, `unit`, `user_role`, `section`) VALUES
(1, 'M.Tech. (CS)', 'Master of Technology in Computer Science', 'Kolkata', 'NA', 'NA', ''),
(2, 'B. Stat. (Hons)', 'B. Stat. (Hons)', 'Kolkata', 'NA', 'NA', ''),
(3, 'B. Math. (Hons)', 'B. Math. (Hons)', 'Bengaluru', 'NA', 'NA', ''),
(4, 'M. Stat.', 'M. Stat.', 'Delhi & Kolkata', 'NA', 'NA', ''),
(5, 'M. Math.', 'M. Math.', 'Kolkata & Bengaluru', 'NA', 'NA', ''),
(6, 'MS (QE)', 'MS (QE)', 'Delhi & Kolkata', 'NA', 'NA', ''),
(7, 'MS (LIS)', 'MS (LIS)', 'Bengaluru', 'NA', 'NA', ''),
(8, 'MS (QMS)', 'MS (QMS)', 'Bengaluru & Hyderabad', 'NA', 'NA', ''),
(9, 'M. Tech. (CrS)', 'M. Tech. (CrS)', 'Kolkata', 'NA', 'NA', ''),
(10, 'M. Tech. (QROR)', 'M. Tech. (QROR)', 'Kolkata', 'NA', 'NA', ''),
(11, 'NA', 'NA', '', 'Advanced Computing and Microelectronics Unit', 'NA', ''),
(12, 'NA', 'NA', '', 'Computer Vision and Pattern Recognition Unit', 'NA', ''),
(13, 'NA', 'NA', '', 'Electronics and Communication Sciences Unit', 'NA', ''),
(14, 'NA', 'NA', '', 'Machine Intelligence Unit', 'NA', ''),
(15, 'NA', 'NA', '', 'Cryptology and Security Research Unit', 'NA', ''),
(16, 'NA', 'NA', '', 'CHENNAI Unit (CSU)', 'NA', ''),
(17, 'NA', 'NA', '', 'BANGALORE Unit (SSIU)', 'NA', ''),
(18, 'NA', 'NA', '', 'NA', 'Faculty', ''),
(19, 'NA', 'NA', '', 'NA', 'Student', ''),
(20, 'NA', 'NA', '', 'NA', 'DB-Admin', ''),
(21, 'NA', 'NA', '', 'NA', 'Admin-Staff', 'Dean\'s Office'),
(22, 'NA', 'NA', '', 'Dean\'s Office', 'NA', ''),
(23, 'NA', 'NA', '', 'Dean\'s Office', 'NA', '');

-- --------------------------------------------------------

--
-- Table structure for table `grades`
--

CREATE TABLE `grades` (
  `ID` int(10) NOT NULL,
  `course` varchar(150) NOT NULL,
  `stream` varchar(150) NOT NULL,
  `batch` int(4) NOT NULL DEFAULT 0,
  `semester` int(1) NOT NULL,
  `student_email` varchar(50) NOT NULL,
  `student_name` varchar(150) NOT NULL,
  `roll_no` varchar(20) NOT NULL,
  `subject_code` varchar(10) DEFAULT NULL,
  `subject_name` varchar(150) NOT NULL,
  `credit_course` varchar(10) DEFAULT 'Credit',
  `subject_type` varchar(50) NOT NULL,
  `pool` varchar(2) DEFAULT NULL,
  `faculty_email` varchar(150) NOT NULL,
  `faculty_name` varchar(150) NOT NULL,
  `marks` int(3) NOT NULL DEFAULT 0,
  `supply_tag` varchar(3) DEFAULT 'No',
  `prev_marks` int(3) DEFAULT NULL,
  `marks_freezed` varchar(3) NOT NULL DEFAULT 'NO',
  `reg_freezed` varchar(3) NOT NULL DEFAULT 'YES',
  `registration_verification_status` varchar(20) NOT NULL DEFAULT 'PENDING',
  `student_verified` varchar(3) NOT NULL DEFAULT 'NA',
  `verified_value` varchar(20) DEFAULT NULL,
  `recorded_on` varchar(100) DEFAULT current_timestamp(),
  `student_verified_on` varchar(50) DEFAULT NULL,
  `supply_ts` varchar(50) DEFAULT NULL,
  `reg_verified_on` varchar(25) DEFAULT NULL,
  `reg_verified_by` varchar(25) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `grades`
--

INSERT INTO `grades` (`ID`, `course`, `stream`, `batch`, `semester`, `student_email`, `student_name`, `roll_no`, `subject_code`, `subject_name`, `credit_course`, `subject_type`, `pool`, `faculty_email`, `faculty_name`, `marks`, `supply_tag`, `prev_marks`, `marks_freezed`, `reg_freezed`, `registration_verification_status`, `student_verified`, `verified_value`, `recorded_on`, `student_verified_on`, `supply_ts`, `reg_verified_on`, `reg_verified_by`) VALUES
(1, 'M.Tech. (CS)', 'CS', 2022, 2, 'abhishek.bale2000@gmail.com', 'Abhishek Bale', 'CS2202', '', 'Computational Geometry', 'Credit', 'Elective', 'NA', 'X', 'X', 0, 'No', NULL, 'YES', 'YES', 'APPROVED', 'NO', NULL, '14-07-2023 10:15:26', '2023-07-17 13:27:52', '', NULL, NULL),
(2, 'M.Tech. (CS)', 'CS', 2022, 2, 'abhishek.bale2000@gmail.com', 'Abhishek Bale', 'CS2202', '', 'Information Retrieval', 'Credit', 'Elective', 'NA', 'X', 'X', 0, 'No', NULL, 'YES', 'YES', 'APPROVED', 'NO', NULL, '14-07-2023 10:15:26', '2023-07-17 13:27:52', '', NULL, NULL),
(3, 'M.Tech. (CS)', 'CS', 2022, 2, 'abhishek.bale2000@gmail.com', 'Abhishek Bale', 'CS2202', '', 'Machine Learning I', 'Credit', 'Elective', 'NA', 'X', 'X', 0, 'No', NULL, 'YES', 'YES', 'APPROVED', 'NO', NULL, '14-07-2023 10:15:26', '2023-07-17 13:27:52', '', NULL, NULL),
(4, 'M.Tech. (CS)', 'CS', 2022, 2, 'abhishek.bale2000@gmail.com', 'Abhishek Bale', 'CS2202', '', 'Statistical Methods', 'Credit', 'Formative', 'A', 'X', 'X', 0, 'No', NULL, 'YES', 'YES', 'APPROVED', 'NO', NULL, '14-07-2023 10:15:26', '2023-07-17 13:27:52', '', NULL, NULL),
(5, 'M.Tech. (CS)', 'Non-CS', 2022, 2, 'anupamlada@gmail.com', 'Anup Mandal', 'CS2204', '', 'Automata Theory, Languages and Computation', 'Credit', 'Formative', 'B', 'X', 'X', 0, 'No', NULL, 'YES', 'YES', 'APPROVED', 'NO', NULL, '14-07-2023 10:15:26', '2023-07-17 13:03:09', '', NULL, NULL),
(6, 'M.Tech. (CS)', 'Non-CS', 2022, 2, 'anupamlada@gmail.com', 'Anup Mandal', 'CS2204', '', 'Database Management Systems', 'Credit', 'Formative', 'B', 'X', 'X', 0, 'No', NULL, 'YES', 'YES', 'APPROVED', 'NO', NULL, '14-07-2023 10:15:26', '2023-07-17 13:03:09', '', NULL, NULL),
(7, 'M.Tech. (CS)', 'Non-CS', 2022, 2, 'anupamlada@gmail.com', 'Anup Mandal', 'CS2204', '', 'Design and Analysis of Algorithms', 'Credit', 'Compulsory', 'NA', 'X', 'X', 0, 'No', NULL, 'YES', 'YES', 'APPROVED', 'NO', NULL, '14-07-2023 10:15:26', '2023-07-17 13:03:09', '', NULL, NULL),
(8, 'M.Tech. (CS)', 'Non-CS', 2022, 2, 'anupamlada@gmail.com', 'Anup Mandal', 'CS2204', '', 'Machine Learning I', 'Credit', 'Elective', 'NA', 'X', 'X', 0, 'No', NULL, 'YES', 'YES', 'APPROVED', 'NO', NULL, '14-07-2023 10:15:26', '2023-07-17 13:03:09', '', NULL, NULL),
(9, 'M.Tech. (CS)', 'Non-CS', 2022, 2, 'anupamlada@gmail.com', 'Anup Mandal', 'CS2204', '', 'Operating Systems', 'Credit', 'Compulsory', 'NA', 'X', 'X', 0, 'No', NULL, 'YES', 'YES', 'APPROVED', 'NO', NULL, '14-07-2023 10:15:26', '2023-07-17 13:03:09', '', NULL, NULL),
(10, 'M.Tech. (CS)', 'Non-CS', 2022, 2, 'mondalanupam4g@gmail.com', 'Anupam Mondal', 'CS2205', '', 'Database Management Systems', 'Credit', 'Formative', 'B', 'X', 'X', 0, 'No', NULL, 'YES', 'YES', 'APPROVED', 'NO', NULL, '14-07-2023 10:15:26', '2023-07-17 13:03:09', '', NULL, NULL),
(11, 'M.Tech. (CS)', 'Non-CS', 2022, 2, 'mondalanupam4g@gmail.com', 'Anupam Mondal', 'CS2205', '', 'Design and Analysis of Algorithms', 'Credit', 'Compulsory', 'NA', 'X', 'X', 0, 'No', NULL, 'YES', 'YES', 'APPROVED', 'NO', NULL, '14-07-2023 10:15:26', '2023-07-17 13:03:09', '', NULL, NULL),
(12, 'M.Tech. (CS)', 'Non-CS', 2022, 2, 'mondalanupam4g@gmail.com', 'Anupam Mondal', 'CS2205', '', 'Information Retrieval', 'Credit', 'Elective', 'NA', 'X', 'X', 0, 'No', NULL, 'YES', 'YES', 'APPROVED', 'NO', NULL, '14-07-2023 10:15:26', '2023-07-17 13:03:09', '', NULL, NULL),
(13, 'M.Tech. (CS)', 'Non-CS', 2022, 2, 'mondalanupam4g@gmail.com', 'Anupam Mondal', 'CS2205', '', 'Machine Learning I', 'Credit', 'Elective', 'NA', 'X', 'X', 0, 'No', NULL, 'YES', 'YES', 'APPROVED', 'NO', NULL, '14-07-2023 10:15:26', '2023-07-17 13:03:09', '', NULL, NULL),
(14, 'M.Tech. (CS)', 'Non-CS', 2022, 2, 'mondalanupam4g@gmail.com', 'Anupam Mondal', 'CS2205', '', 'Operating Systems', 'Credit', 'Compulsory', 'NA', 'X', 'X', 0, 'No', NULL, 'YES', 'YES', 'APPROVED', 'NO', NULL, '14-07-2023 10:15:26', '2023-07-17 13:03:09', '', NULL, NULL),
(15, 'M.Tech. (CS)', 'Non-CS', 2022, 2, 'mondalanupam4g@gmail.com', 'Anupam Mondal', 'CS2205', '', 'Statistical Methods', 'Credit', 'Formative', 'A', 'X', 'X', 0, 'No', NULL, 'YES', 'YES', 'APPROVED', 'NO', NULL, '14-07-2023 10:15:26', '2023-07-17 13:03:09', '', NULL, NULL),
(16, 'M.Tech. (CS)', 'CS', 2022, 2, 'aratrik1999@gmail.com', 'Aratrik Chandra', 'CS2206', '', 'Automata Theory, Languages and Computation', 'Credit', 'Formative', 'B', 'X', 'X', 0, 'No', NULL, 'YES', 'YES', 'APPROVED', 'NO', NULL, '14-07-2023 10:15:26', '2023-07-17 13:03:09', '', NULL, NULL),
(17, 'M.Tech. (CS)', 'CS', 2022, 2, 'aratrik1999@gmail.com', 'Aratrik Chandra', 'CS2206', '', 'Image Processing I', 'Credit', 'Elective', 'NA', 'X', 'X', 0, 'No', NULL, 'YES', 'YES', 'APPROVED', 'NO', NULL, '14-07-2023 10:15:26', '2023-07-17 13:03:09', '', NULL, NULL),
(18, 'M.Tech. (CS)', 'CS', 2022, 2, 'aratrik1999@gmail.com', 'Aratrik Chandra', 'CS2206', '', 'Machine Learning I', 'Credit', 'Elective', 'NA', 'X', 'X', 0, 'No', NULL, 'YES', 'YES', 'APPROVED', 'NO', NULL, '14-07-2023 10:15:26', '2023-07-17 13:03:09', '', NULL, NULL),
(19, 'M.Tech. (CS)', 'CS', 2022, 2, 'aratrik1999@gmail.com', 'Aratrik Chandra', 'CS2206', '', 'Operating Systems', 'Credit', 'Formative', 'B', 'X', 'X', 0, 'No', NULL, 'YES', 'YES', 'APPROVED', 'NO', NULL, '14-07-2023 10:15:26', '2023-07-17 13:03:09', '', NULL, NULL),
(20, 'M.Tech. (CS)', 'CS', 2022, 2, 'aratrik1999@gmail.com', 'Aratrik Chandra', 'CS2206', '', 'Statistical Methods', 'Credit', 'Formative', 'A', 'X', 'X', 0, 'No', NULL, 'YES', 'YES', 'APPROVED', 'NO', NULL, '14-07-2023 10:15:26', '2023-07-17 13:03:09', '', NULL, NULL),
(21, 'M.Tech. (CS)', 'Non-CS', 2022, 2, 'ashishkrc108@gmail.com', 'Ashish Kumar', 'CS2208', '', 'Automata Theory, Languages and Computation', 'Credit', 'Formative', 'B', 'X', 'X', 0, 'No', NULL, 'YES', 'YES', 'APPROVED', 'NO', NULL, '14-07-2023 10:15:26', '2023-07-17 13:03:09', '', NULL, NULL),
(22, 'M.Tech. (CS)', 'Non-CS', 2022, 2, 'ashishkrc108@gmail.com', 'Ashish Kumar', 'CS2208', '', 'Database Management Systems', 'Credit', 'Formative', 'B', 'X', 'X', 0, 'No', NULL, 'YES', 'YES', 'APPROVED', 'NO', NULL, '14-07-2023 10:15:26', '2023-07-17 13:03:09', '', NULL, NULL),
(23, 'M.Tech. (CS)', 'Non-CS', 2022, 2, 'ashishkrc108@gmail.com', 'Ashish Kumar', 'CS2208', '', 'Design and Analysis of Algorithms', 'Credit', 'Compulsory', 'NA', 'X', 'X', 0, 'No', NULL, 'YES', 'YES', 'APPROVED', 'NO', NULL, '14-07-2023 10:15:26', '2023-07-17 13:03:09', '', NULL, NULL),
(24, 'M.Tech. (CS)', 'Non-CS', 2022, 2, 'ashishkrc108@gmail.com', 'Ashish Kumar', 'CS2208', '', 'Information Retrieval', 'Credit', 'Elective', 'NA', 'X', 'X', 0, 'No', NULL, 'YES', 'YES', 'APPROVED', 'NO', NULL, '14-07-2023 10:15:26', '2023-07-17 13:03:09', '', NULL, NULL),
(25, 'M.Tech. (CS)', 'Non-CS', 2022, 2, 'ashishkrc108@gmail.com', 'Ashish Kumar', 'CS2208', '', 'Operating Systems', 'Credit', 'Compulsory', 'NA', 'X', 'X', 0, 'No', NULL, 'YES', 'YES', 'APPROVED', 'NO', NULL, '14-07-2023 10:15:26', '2023-07-17 13:03:09', '', NULL, NULL),
(26, 'M.Tech. (CS)', 'Non-CS', 2022, 2, 'ashishkrc108@gmail.com', 'Ashish Kumar', 'CS2208', '', 'Statistical Methods', 'Credit', 'Formative', 'A', 'X', 'X', 0, 'No', NULL, 'YES', 'YES', 'APPROVED', 'NO', NULL, '14-07-2023 10:15:26', '2023-07-17 13:03:09', '', NULL, NULL),
(27, 'M.Tech. (CS)', 'Non-CS', 2022, 2, 'mondalavir02@gmail.com', 'Avir Mondal', 'CS2209', '', 'Automata Theory, Languages and Computation', 'Credit', 'Formative', 'B', 'X', 'X', 0, 'No', NULL, 'YES', 'YES', 'APPROVED', 'NO', NULL, '14-07-2023 10:15:26', '2023-07-17 13:03:09', '', NULL, NULL),
(28, 'M.Tech. (CS)', 'Non-CS', 2022, 2, 'mondalavir02@gmail.com', 'Avir Mondal', 'CS2209', '', 'Database Management Systems', 'Credit', 'Formative', 'B', 'X', 'X', 0, 'No', NULL, 'YES', 'YES', 'APPROVED', 'NO', NULL, '14-07-2023 10:15:26', '2023-07-17 13:03:09', '', NULL, NULL),
(29, 'M.Tech. (CS)', 'Non-CS', 2022, 2, 'mondalavir02@gmail.com', 'Avir Mondal', 'CS2209', '', 'Design and Analysis of Algorithms', 'Credit', 'Compulsory', 'NA', 'X', 'X', 0, 'No', NULL, 'YES', 'YES', 'APPROVED', 'NO', NULL, '14-07-2023 10:15:26', '2023-07-17 13:03:09', '', NULL, NULL),
(30, 'M.Tech. (CS)', 'Non-CS', 2022, 2, 'mondalavir02@gmail.com', 'Avir Mondal', 'CS2209', '', 'Information Retrieval', 'Credit', 'Elective', 'NA', 'X', 'X', 0, 'No', NULL, 'YES', 'YES', 'APPROVED', 'NO', NULL, '14-07-2023 10:15:26', '2023-07-17 13:03:09', '', NULL, NULL),
(31, 'M.Tech. (CS)', 'Non-CS', 2022, 2, 'mondalavir02@gmail.com', 'Avir Mondal', 'CS2209', '', 'Machine Learning I', 'Credit', 'Elective', 'NA', 'X', 'X', 0, 'No', NULL, 'YES', 'YES', 'APPROVED', 'NO', NULL, '14-07-2023 10:15:26', '2023-07-17 13:03:09', '', NULL, NULL),
(32, 'M.Tech. (CS)', 'Non-CS', 2022, 2, 'mondalavir02@gmail.com', 'Avir Mondal', 'CS2209', '', 'Operating Systems', 'Credit', 'Compulsory', 'NA', 'X', 'X', 0, 'No', NULL, 'YES', 'YES', 'APPROVED', 'NO', NULL, '14-07-2023 10:15:26', '2023-07-17 13:03:09', '', NULL, NULL),
(33, 'M.Tech. (CS)', 'Non-CS', 2022, 2, 'bhuvandeep23@gmail.com', 'Bhuvandeep ', 'CS2210', '', 'Compiler Construction', 'Credit', 'Formative', 'B', 'X', 'X', 0, 'No', NULL, 'YES', 'YES', 'APPROVED', 'NO', NULL, '14-07-2023 10:15:26', '2023-07-17 13:03:09', '', NULL, NULL),
(34, 'M.Tech. (CS)', 'Non-CS', 2022, 2, 'bhuvandeep23@gmail.com', 'Bhuvandeep ', 'CS2210', '', 'Database Management Systems', 'Credit', 'Formative', 'B', 'X', 'X', 0, 'No', NULL, 'YES', 'YES', 'APPROVED', 'NO', NULL, '14-07-2023 10:15:26', '2023-07-17 13:03:09', '', NULL, NULL),
(35, 'M.Tech. (CS)', 'Non-CS', 2022, 2, 'bhuvandeep23@gmail.com', 'Bhuvandeep ', 'CS2210', '', 'Design and Analysis of Algorithms', 'Credit', 'Compulsory', 'NA', 'X', 'X', 0, 'No', NULL, 'YES', 'YES', 'APPROVED', 'NO', NULL, '14-07-2023 10:15:26', '2023-07-17 13:03:09', '', NULL, NULL),
(36, 'M.Tech. (CS)', 'Non-CS', 2022, 2, 'bhuvandeep23@gmail.com', 'Bhuvandeep ', 'CS2210', '', 'Machine Learning I', 'Credit', 'Elective', 'NA', 'X', 'X', 0, 'No', NULL, 'YES', 'YES', 'APPROVED', 'NO', NULL, '14-07-2023 10:15:26', '2023-07-17 13:03:09', '', NULL, NULL),
(37, 'M.Tech. (CS)', 'Non-CS', 2022, 2, 'bhuvandeep23@gmail.com', 'Bhuvandeep ', 'CS2210', '', 'Operating Systems', 'Credit', 'Compulsory', 'NA', 'X', 'X', 0, 'No', NULL, 'YES', 'YES', 'APPROVED', 'NO', NULL, '14-07-2023 10:15:26', '2023-07-17 13:03:09', '', NULL, NULL),
(38, 'M.Tech. (CS)', 'Non-CS', 2022, 2, 'nagchandradipa@gmail.com', 'Chandradipa Nag', 'CS2211', '', 'Database Management Systems', 'Credit', 'Formative', 'B', 'X', 'X', 0, 'No', NULL, 'YES', 'YES', 'APPROVED', 'NO', NULL, '14-07-2023 10:15:26', '2023-07-17 13:03:09', '', NULL, NULL),
(39, 'M.Tech. (CS)', 'Non-CS', 2022, 2, 'nagchandradipa@gmail.com', 'Chandradipa Nag', 'CS2211', '', 'Design and Analysis of Algorithms', 'Credit', 'Compulsory', 'NA', 'X', 'X', 0, 'No', NULL, 'YES', 'YES', 'APPROVED', 'NO', NULL, '14-07-2023 10:15:26', '2023-07-17 13:03:09', '', NULL, NULL),
(40, 'M.Tech. (CS)', 'Non-CS', 2022, 2, 'nagchandradipa@gmail.com', 'Chandradipa Nag', 'CS2211', '', 'Information Retrieval', 'Credit', 'Elective', 'NA', 'X', 'X', 0, 'No', NULL, 'YES', 'YES', 'APPROVED', 'NO', NULL, '14-07-2023 10:15:26', '2023-07-17 13:03:09', '', NULL, NULL),
(41, 'M.Tech. (CS)', 'Non-CS', 2022, 2, 'nagchandradipa@gmail.com', 'Chandradipa Nag', 'CS2211', '', 'Machine Learning I', 'Credit', 'Elective', 'NA', 'X', 'X', 0, 'No', NULL, 'YES', 'YES', 'APPROVED', 'NO', NULL, '14-07-2023 10:15:26', '2023-07-17 13:03:09', '', NULL, NULL),
(42, 'M.Tech. (CS)', 'Non-CS', 2022, 2, 'nagchandradipa@gmail.com', 'Chandradipa Nag', 'CS2211', '', 'Operating Systems', 'Credit', 'Compulsory', 'NA', 'X', 'X', 0, 'No', NULL, 'YES', 'YES', 'APPROVED', 'NO', NULL, '14-07-2023 10:15:26', '2023-07-17 13:03:09', '', NULL, NULL),
(43, 'M.Tech. (CS)', 'Non-CS', 2022, 2, 'nagchandradipa@gmail.com', 'Chandradipa Nag', 'CS2211', '', 'Statistical Methods', 'Credit', 'Formative', 'A', 'X', 'X', 0, 'No', NULL, 'YES', 'YES', 'APPROVED', 'NO', NULL, '14-07-2023 10:15:26', '2023-07-17 13:03:09', '', NULL, NULL),
(44, 'M.Tech. (CS)', 'Non-CS', 2022, 2, 'harikishants9899@gmail.com', 'Harikishan T S', 'CS2212', '', 'Database Management Systems', 'Credit', 'Formative', 'B', 'X', 'X', 0, 'No', NULL, 'YES', 'YES', 'APPROVED', 'NO', NULL, '14-07-2023 10:15:26', '2023-07-17 13:03:09', '', NULL, NULL),
(45, 'M.Tech. (CS)', 'Non-CS', 2022, 2, 'harikishants9899@gmail.com', 'Harikishan T S', 'CS2212', '', 'Design and Analysis of Algorithms', 'Credit', 'Compulsory', 'NA', 'X', 'X', 0, 'No', NULL, 'YES', 'YES', 'APPROVED', 'NO', NULL, '14-07-2023 10:15:26', '2023-07-17 13:03:09', '', NULL, NULL),
(46, 'M.Tech. (CS)', 'Non-CS', 2022, 2, 'harikishants9899@gmail.com', 'Harikishan T S', 'CS2212', '', 'Information Retrieval', 'Credit', 'Elective', 'NA', 'X', 'X', 0, 'No', NULL, 'YES', 'YES', 'APPROVED', 'NO', NULL, '14-07-2023 10:15:26', '2023-07-17 13:03:09', '', NULL, NULL),
(47, 'M.Tech. (CS)', 'Non-CS', 2022, 2, 'harikishants9899@gmail.com', 'Harikishan T S', 'CS2212', '', 'Machine Learning I', 'Credit', 'Elective', 'NA', 'X', 'X', 0, 'No', NULL, 'YES', 'YES', 'APPROVED', 'NO', NULL, '14-07-2023 10:15:26', '2023-07-17 13:03:09', '', NULL, NULL),
(48, 'M.Tech. (CS)', 'Non-CS', 2022, 2, 'harikishants9899@gmail.com', 'Harikishan T S', 'CS2212', '', 'Operating Systems', 'Credit', 'Compulsory', 'NA', 'X', 'X', 0, 'No', NULL, 'YES', 'YES', 'APPROVED', 'NO', NULL, '14-07-2023 10:15:26', '2023-07-17 13:03:09', '', NULL, NULL),
(49, 'M.Tech. (CS)', 'Non-CS', 2022, 2, 'harikishants9899@gmail.com', 'Harikishan T S', 'CS2212', '', 'Statistical Methods', 'Credit', 'Formative', 'A', 'X', 'X', 0, 'No', NULL, 'YES', 'YES', 'APPROVED', 'NO', NULL, '14-07-2023 10:15:26', '2023-07-17 13:03:09', '', NULL, NULL),
(50, 'M.Tech. (CS)', 'Non-CS', 2022, 2, '1996harsh.agarwal@gmail.com', 'Harsh Agarwal', 'CS2213', '', 'Database Management Systems', 'Credit', 'Formative', 'B', 'X', 'X', 0, 'No', NULL, 'YES', 'YES', 'APPROVED', 'NO', NULL, '14-07-2023 10:15:26', '2023-07-17 13:03:09', '', NULL, NULL),
(51, 'M.Tech. (CS)', 'Non-CS', 2022, 2, '1996harsh.agarwal@gmail.com', 'Harsh Agarwal', 'CS2213', '', 'Design and Analysis of Algorithms', 'Credit', 'Compulsory', 'NA', 'X', 'X', 0, 'No', NULL, 'YES', 'YES', 'APPROVED', 'NO', NULL, '14-07-2023 10:15:26', '2023-07-17 13:03:09', '', NULL, NULL),
(52, 'M.Tech. (CS)', 'Non-CS', 2022, 2, '1996harsh.agarwal@gmail.com', 'Harsh Agarwal', 'CS2213', '', 'Information Retrieval', 'Credit', 'Elective', 'NA', 'X', 'X', 0, 'No', NULL, 'YES', 'YES', 'APPROVED', 'NO', NULL, '14-07-2023 10:15:26', '2023-07-17 13:03:09', '', NULL, NULL),
(53, 'M.Tech. (CS)', 'Non-CS', 2022, 2, '1996harsh.agarwal@gmail.com', 'Harsh Agarwal', 'CS2213', '', 'Machine Learning I', 'Credit', 'Elective', 'NA', 'X', 'X', 0, 'No', NULL, 'YES', 'YES', 'APPROVED', 'NO', NULL, '14-07-2023 10:15:26', '2023-07-17 13:03:09', '', NULL, NULL),
(54, 'M.Tech. (CS)', 'Non-CS', 2022, 2, '1996harsh.agarwal@gmail.com', 'Harsh Agarwal', 'CS2213', '', 'Operating Systems', 'Credit', 'Compulsory', 'NA', 'X', 'X', 0, 'No', NULL, 'YES', 'YES', 'APPROVED', 'NO', NULL, '14-07-2023 10:15:26', '2023-07-17 13:03:09', '', NULL, NULL),
(55, 'M.Tech. (CS)', 'Non-CS', 2022, 2, '1996harsh.agarwal@gmail.com', 'Harsh Agarwal', 'CS2213', '', 'Statistical Methods', 'Credit', 'Formative', 'A', 'X', 'X', 0, 'No', NULL, 'YES', 'YES', 'APPROVED', 'NO', NULL, '14-07-2023 10:15:26', '2023-07-17 13:03:09', '', NULL, NULL),
(56, 'M.Tech. (CS)', 'Non-CS', 2022, 2, 'himanshuyadavhere@gmail.com', 'Himanshu Yadav', 'CS2214', '', 'Automata Theory, Languages and Computation', 'Credit', 'Formative', 'B', 'X', 'X', 0, 'No', NULL, 'YES', 'YES', 'APPROVED', 'NO', NULL, '14-07-2023 10:15:26', '2023-07-17 13:03:09', '', NULL, NULL),
(57, 'M.Tech. (CS)', 'Non-CS', 2022, 2, 'himanshuyadavhere@gmail.com', 'Himanshu Yadav', 'CS2214', '', 'Database Management Systems', 'Credit', 'Formative', 'B', 'X', 'X', 0, 'No', NULL, 'YES', 'YES', 'APPROVED', 'NO', NULL, '14-07-2023 10:15:26', '2023-07-17 13:03:09', '', NULL, NULL),
(58, 'M.Tech. (CS)', 'Non-CS', 2022, 2, 'himanshuyadavhere@gmail.com', 'Himanshu Yadav', 'CS2214', '', 'Design and Analysis of Algorithms', 'Credit', 'Compulsory', 'NA', 'X', 'X', 0, 'No', NULL, 'YES', 'YES', 'APPROVED', 'NO', NULL, '14-07-2023 10:15:26', '2023-07-17 13:03:09', '', NULL, NULL),
(59, 'M.Tech. (CS)', 'Non-CS', 2022, 2, 'himanshuyadavhere@gmail.com', 'Himanshu Yadav', 'CS2214', '', 'Digital Signal Processing', 'Credit', 'Elective', 'NA', 'X', 'X', 0, 'No', NULL, 'YES', 'YES', 'APPROVED', 'NO', NULL, '14-07-2023 10:15:26', '2023-07-17 13:03:09', '', NULL, NULL),
(60, 'M.Tech. (CS)', 'Non-CS', 2022, 2, 'himanshuyadavhere@gmail.com', 'Himanshu Yadav', 'CS2214', '', 'Image Processing I', 'Credit', 'Elective', 'NA', 'X', 'X', 0, 'No', NULL, 'YES', 'YES', 'APPROVED', 'NO', NULL, '14-07-2023 10:15:26', '2023-07-17 13:03:09', '', NULL, NULL),
(61, 'M.Tech. (CS)', 'Non-CS', 2022, 2, 'himanshuyadavhere@gmail.com', 'Himanshu Yadav', 'CS2214', '', 'Information Retrieval', 'Credit', 'Elective', 'NA', 'X', 'X', 0, 'No', NULL, 'YES', 'YES', 'APPROVED', 'NO', NULL, '14-07-2023 10:15:26', '2023-07-17 13:03:09', '', NULL, NULL),
(62, 'M.Tech. (CS)', 'Non-CS', 2022, 2, 'himanshuyadavhere@gmail.com', 'Himanshu Yadav', 'CS2214', '', 'Operating Systems', 'Credit', 'Compulsory', 'NA', 'X', 'X', 0, 'No', NULL, 'YES', 'YES', 'APPROVED', 'NO', NULL, '14-07-2023 10:15:26', '2023-07-17 13:03:09', '', NULL, NULL),
(63, 'M.Tech. (CS)', 'CS', 2022, 2, 'paulindr06@gmail.com', 'Indranil Paul', 'CS2215', '', 'Automata Theory, Languages and Computation', 'Credit', 'Formative', 'B', 'X', 'X', 0, 'No', NULL, 'YES', 'YES', 'APPROVED', 'NO', NULL, '14-07-2023 10:15:26', '2023-07-17 13:03:09', '', NULL, NULL),
(64, 'M.Tech. (CS)', 'CS', 2022, 2, 'paulindr06@gmail.com', 'Indranil Paul', 'CS2215', '', 'Image Processing I', 'Credit', 'Elective', 'NA', 'X', 'X', 0, 'No', NULL, 'YES', 'YES', 'APPROVED', 'NO', NULL, '14-07-2023 10:15:26', '2023-07-17 13:03:09', '', NULL, NULL),
(65, 'M.Tech. (CS)', 'CS', 2022, 2, 'paulindr06@gmail.com', 'Indranil Paul', 'CS2215', '', 'Machine Learning I', 'Credit', 'Elective', 'NA', 'X', 'X', 0, 'No', NULL, 'YES', 'YES', 'APPROVED', 'NO', NULL, '14-07-2023 10:15:26', '2023-07-17 13:03:09', '', NULL, NULL),
(66, 'M.Tech. (CS)', 'CS', 2022, 2, 'paulindr06@gmail.com', 'Indranil Paul', 'CS2215', '', 'Operating Systems', 'Credit', 'Formative', 'B', 'X', 'X', 0, 'No', NULL, 'YES', 'YES', 'APPROVED', 'NO', NULL, '14-07-2023 10:15:26', '2023-07-17 13:03:09', '', NULL, NULL),
(67, 'M.Tech. (CS)', 'CS', 2022, 2, 'paulindr06@gmail.com', 'Indranil Paul', 'CS2215', '', 'Statistical Methods', 'Credit', 'Formative', 'A', 'X', 'X', 0, 'No', NULL, 'YES', 'YES', 'APPROVED', 'NO', NULL, '14-07-2023 10:15:26', '2023-07-17 13:03:09', '', NULL, NULL),
(68, 'M.Tech. (CS)', 'Non-CS', 2022, 2, 'jatinkrdey@gmail.com', 'Jatin Kumar Dey ', 'CS2216 ', '', 'Automata Theory, Languages and Computation', 'Credit', 'Formative', 'B', 'X', 'X', 0, 'No', NULL, 'YES', 'YES', 'APPROVED', 'NO', NULL, '14-07-2023 10:15:26', '2023-07-17 13:03:09', '', NULL, NULL),
(69, 'M.Tech. (CS)', 'Non-CS', 2022, 2, 'jatinkrdey@gmail.com', 'Jatin Kumar Dey ', 'CS2216 ', '', 'Design and Analysis of Algorithms', 'Credit', 'Compulsory', 'NA', 'X', 'X', 0, 'No', NULL, 'YES', 'YES', 'APPROVED', 'NO', NULL, '14-07-2023 10:15:26', '2023-07-17 13:03:09', '', NULL, NULL),
(70, 'M.Tech. (CS)', 'Non-CS', 2022, 2, 'jatinkrdey@gmail.com', 'Jatin Kumar Dey ', 'CS2216 ', '', 'Linear Algebra', 'Credit', 'Elective', 'NA', 'X', 'X', 0, 'No', NULL, 'YES', 'YES', 'APPROVED', 'NO', NULL, '14-07-2023 10:15:26', '2023-07-17 13:03:09', '', NULL, NULL),
(71, 'M.Tech. (CS)', 'Non-CS', 2022, 2, 'jatinkrdey@gmail.com', 'Jatin Kumar Dey ', 'CS2216 ', '', 'Operating Systems', 'Credit', 'Compulsory', 'NA', 'X', 'X', 0, 'No', NULL, 'YES', 'YES', 'APPROVED', 'NO', NULL, '14-07-2023 10:15:26', '2023-07-17 13:03:09', '', NULL, NULL),
(72, 'M.Tech. (CS)', 'Non-CS', 2022, 2, 'jatinkrdey@gmail.com', 'Jatin Kumar Dey ', 'CS2216 ', '', 'Statistical Methods', 'Credit', 'Formative', 'A', 'X', 'X', 0, 'No', NULL, 'YES', 'YES', 'APPROVED', 'NO', NULL, '14-07-2023 10:15:26', '2023-07-17 13:03:09', '', NULL, NULL),
(73, 'M.Tech. (CS)', 'Non-CS', 2022, 2, 'nayangiri49@gmail.com', 'Nayan Giri ', 'CS2218', '', 'Database Management Systems', 'Credit', 'Formative', 'B', 'X', 'X', 0, 'No', NULL, 'YES', 'YES', 'APPROVED', 'NO', NULL, '14-07-2023 10:15:26', '2023-07-17 13:03:09', '', NULL, NULL),
(74, 'M.Tech. (CS)', 'Non-CS', 2022, 2, 'nayangiri49@gmail.com', 'Nayan Giri ', 'CS2218', '', 'Design and Analysis of Algorithms', 'Credit', 'Compulsory', 'NA', 'X', 'X', 0, 'No', NULL, 'YES', 'YES', 'APPROVED', 'NO', NULL, '14-07-2023 10:15:26', '2023-07-17 13:03:09', '', NULL, NULL),
(75, 'M.Tech. (CS)', 'Non-CS', 2022, 2, 'nayangiri49@gmail.com', 'Nayan Giri ', 'CS2218', '', 'Information Retrieval', 'Credit', 'Elective', 'NA', 'X', 'X', 0, 'No', NULL, 'YES', 'YES', 'APPROVED', 'NO', NULL, '14-07-2023 10:15:26', '2023-07-17 13:03:09', '', NULL, NULL),
(76, 'M.Tech. (CS)', 'Non-CS', 2022, 2, 'nayangiri49@gmail.com', 'Nayan Giri ', 'CS2218', '', 'Machine Learning I', 'Credit', 'Elective', 'NA', 'X', 'X', 0, 'No', NULL, 'YES', 'YES', 'APPROVED', 'NO', NULL, '14-07-2023 10:15:26', '2023-07-17 13:03:09', '', NULL, NULL),
(77, 'M.Tech. (CS)', 'Non-CS', 2022, 2, 'nayangiri49@gmail.com', 'Nayan Giri ', 'CS2218', '', 'Operating Systems', 'Credit', 'Compulsory', 'NA', 'X', 'X', 0, 'No', NULL, 'YES', 'YES', 'APPROVED', 'NO', NULL, '14-07-2023 10:15:26', '2023-07-17 13:03:09', '', NULL, NULL),
(78, 'M.Tech. (CS)', 'Non-CS', 2022, 2, 'nayangiri49@gmail.com', 'Nayan Giri ', 'CS2218', '', 'Statistical Methods', 'Credit', 'Formative', 'A', 'X', 'X', 0, 'No', NULL, 'YES', 'YES', 'APPROVED', 'NO', NULL, '14-07-2023 10:15:26', '2023-07-17 13:03:09', '', NULL, NULL),
(79, 'M.Tech. (CS)', 'Non-CS', 2022, 2, 'niladridas943@gmail.com', 'Niladri Das', 'CS2219', '', 'Database Management Systems', 'Credit', 'Formative', 'B', 'X', 'X', 0, 'No', NULL, 'YES', 'YES', 'APPROVED', 'NO', NULL, '14-07-2023 10:15:26', '2023-07-17 13:03:09', '', NULL, NULL),
(80, 'M.Tech. (CS)', 'Non-CS', 2022, 2, 'niladridas943@gmail.com', 'Niladri Das', 'CS2219', '', 'Design and Analysis of Algorithms', 'Credit', 'Compulsory', 'NA', 'X', 'X', 0, 'No', NULL, 'YES', 'YES', 'APPROVED', 'NO', NULL, '14-07-2023 10:15:26', '2023-07-17 13:03:09', '', NULL, NULL),
(81, 'M.Tech. (CS)', 'Non-CS', 2022, 2, 'niladridas943@gmail.com', 'Niladri Das', 'CS2219', '', 'Information Retrieval', 'Credit', 'Elective', 'NA', 'X', 'X', 0, 'No', NULL, 'YES', 'YES', 'APPROVED', 'NO', NULL, '14-07-2023 10:15:26', '2023-07-17 13:03:09', '', NULL, NULL),
(82, 'M.Tech. (CS)', 'Non-CS', 2022, 2, 'niladridas943@gmail.com', 'Niladri Das', 'CS2219', '', 'Machine Learning I', 'Credit', 'Elective', 'NA', 'X', 'X', 0, 'No', NULL, 'YES', 'YES', 'APPROVED', 'NO', NULL, '14-07-2023 10:15:26', '2023-07-17 13:03:09', '', NULL, NULL),
(83, 'M.Tech. (CS)', 'Non-CS', 2022, 2, 'niladridas943@gmail.com', 'Niladri Das', 'CS2219', '', 'Operating Systems', 'Credit', 'Compulsory', 'NA', 'X', 'X', 0, 'No', NULL, 'YES', 'YES', 'APPROVED', 'NO', NULL, '14-07-2023 10:15:26', '2023-07-17 13:03:09', '', NULL, NULL),
(84, 'M.Tech. (CS)', 'Non-CS', 2022, 2, 'niladridas943@gmail.com', 'Niladri Das', 'CS2219', '', 'Statistical Methods', 'Credit', 'Formative', 'A', 'X', 'X', 0, 'No', NULL, 'YES', 'YES', 'APPROVED', 'NO', NULL, '14-07-2023 10:15:26', '2023-07-17 13:03:09', '', NULL, NULL),
(85, 'M.Tech. (CS)', 'Non-CS', 2022, 2, 'niladridas943@gmail.com', 'Niladri Das', 'CS2219', '', 'Database Management Systems', 'Credit', 'Formative', 'B', 'X', 'X', 0, 'No', NULL, 'YES', 'YES', 'APPROVED', 'NO', NULL, '14-07-2023 10:15:26', '2023-07-17 13:03:09', '', NULL, NULL),
(86, 'M.Tech. (CS)', 'Non-CS', 2022, 2, 'niladridas943@gmail.com', 'Niladri Das', 'CS2219', '', 'Design and Analysis of Algorithms', 'Credit', 'Compulsory', 'NA', 'X', 'X', 0, 'No', NULL, 'YES', 'YES', 'APPROVED', 'NO', NULL, '14-07-2023 10:15:26', '2023-07-17 13:03:09', '', NULL, NULL),
(87, 'M.Tech. (CS)', 'Non-CS', 2022, 2, 'niladridas943@gmail.com', 'Niladri Das', 'CS2219', '', 'Information Retrieval', 'Credit', 'Elective', 'NA', 'X', 'X', 0, 'No', NULL, 'YES', 'YES', 'APPROVED', 'NO', NULL, '14-07-2023 10:15:26', '2023-07-17 13:03:09', '', NULL, NULL),
(88, 'M.Tech. (CS)', 'Non-CS', 2022, 2, 'niladridas943@gmail.com', 'Niladri Das', 'CS2219', '', 'Machine Learning I', 'Credit', 'Elective', 'NA', 'X', 'X', 0, 'No', NULL, 'YES', 'YES', 'APPROVED', 'NO', NULL, '14-07-2023 10:15:26', '2023-07-17 13:03:09', '', NULL, NULL),
(89, 'M.Tech. (CS)', 'Non-CS', 2022, 2, 'niladridas943@gmail.com', 'Niladri Das', 'CS2219', '', 'Operating Systems', 'Credit', 'Compulsory', 'NA', 'X', 'X', 0, 'No', NULL, 'YES', 'YES', 'APPROVED', 'NO', NULL, '14-07-2023 10:15:26', '2023-07-17 13:03:09', '', NULL, NULL),
(90, 'M.Tech. (CS)', 'Non-CS', 2022, 2, 'niladridas943@gmail.com', 'Niladri Das', 'CS2219', '', 'Statistical Methods', 'Credit', 'Formative', 'A', 'X', 'X', 0, 'No', NULL, 'YES', 'YES', 'APPROVED', 'NO', NULL, '14-07-2023 10:15:26', '2023-07-17 13:03:09', '', NULL, NULL),
(91, 'M.Tech. (CS)', 'Non-CS', 2022, 2, 'patrickjeeva@gmail.com', 'PATRICK JEEVA A ', 'CS2220 ', '', 'Database Management Systems', 'Credit', 'Formative', 'B', 'X', 'X', 0, 'No', NULL, 'YES', 'YES', 'APPROVED', 'NO', NULL, '14-07-2023 10:15:26', '2023-07-17 13:03:09', '', NULL, NULL),
(92, 'M.Tech. (CS)', 'Non-CS', 2022, 2, 'patrickjeeva@gmail.com', 'PATRICK JEEVA A ', 'CS2220 ', '', 'Design and Analysis of Algorithms', 'Credit', 'Compulsory', 'NA', 'X', 'X', 0, 'No', NULL, 'YES', 'YES', 'APPROVED', 'NO', NULL, '14-07-2023 10:15:26', '2023-07-17 13:03:09', '', NULL, NULL),
(93, 'M.Tech. (CS)', 'Non-CS', 2022, 2, 'patrickjeeva@gmail.com', 'PATRICK JEEVA A ', 'CS2220 ', '', 'Information Retrieval', 'Credit', 'Elective', 'NA', 'X', 'X', 0, 'No', NULL, 'YES', 'YES', 'APPROVED', 'NO', NULL, '14-07-2023 10:15:26', '2023-07-17 13:03:09', '', NULL, NULL),
(94, 'M.Tech. (CS)', 'Non-CS', 2022, 2, 'patrickjeeva@gmail.com', 'PATRICK JEEVA A ', 'CS2220 ', '', 'Machine Learning I', 'Credit', 'Elective', 'NA', 'X', 'X', 0, 'No', NULL, 'YES', 'YES', 'APPROVED', 'NO', NULL, '14-07-2023 10:15:26', '2023-07-17 13:03:09', '', NULL, NULL),
(95, 'M.Tech. (CS)', 'Non-CS', 2022, 2, 'patrickjeeva@gmail.com', 'PATRICK JEEVA A ', 'CS2220 ', '', 'Operating Systems', 'Credit', 'Compulsory', 'NA', 'X', 'X', 0, 'No', NULL, 'YES', 'YES', 'APPROVED', 'NO', NULL, '14-07-2023 10:15:26', '2023-07-17 13:03:09', '', NULL, NULL),
(96, 'M.Tech. (CS)', 'Non-CS', 2022, 2, 'patrickjeeva@gmail.com', 'PATRICK JEEVA A ', 'CS2220 ', '', 'Statistical Methods', 'Credit', 'Formative', 'A', 'X', 'X', 0, 'No', NULL, 'YES', 'YES', 'APPROVED', 'NO', NULL, '14-07-2023 10:15:26', '2023-07-17 13:03:09', '', NULL, NULL),
(97, 'M.Tech. (CS)', 'Non-CS', 2022, 2, 'patrickjeeva@gmail.com', 'PATRICK JEEVA A ', 'CS2220 ', '', 'Database Management Systems', 'Credit', 'Formative', 'B', 'X', 'X', 0, 'No', NULL, 'YES', 'YES', 'APPROVED', 'NO', NULL, '14-07-2023 10:15:26', '2023-07-17 13:03:09', '', NULL, NULL),
(98, 'M.Tech. (CS)', 'Non-CS', 2022, 2, 'patrickjeeva@gmail.com', 'PATRICK JEEVA A ', 'CS2220 ', '', 'Design and Analysis of Algorithms', 'Credit', 'Compulsory', 'NA', 'X', 'X', 0, 'No', NULL, 'YES', 'YES', 'APPROVED', 'NO', NULL, '14-07-2023 10:15:26', '2023-07-17 13:03:09', '', NULL, NULL),
(99, 'M.Tech. (CS)', 'Non-CS', 2022, 2, 'patrickjeeva@gmail.com', 'PATRICK JEEVA A ', 'CS2220 ', '', 'Information Retrieval', 'Credit', 'Elective', 'NA', 'X', 'X', 0, 'No', NULL, 'YES', 'YES', 'APPROVED', 'NO', NULL, '14-07-2023 10:15:26', '2023-07-17 13:03:09', '', NULL, NULL),
(100, 'M.Tech. (CS)', 'Non-CS', 2022, 2, 'patrickjeeva@gmail.com', 'PATRICK JEEVA A ', 'CS2220 ', '', 'Machine Learning I', 'Credit', 'Elective', 'NA', 'X', 'X', 0, 'No', NULL, 'YES', 'YES', 'APPROVED', 'NO', NULL, '14-07-2023 10:15:26', '2023-07-17 13:03:09', '', NULL, NULL),
(101, 'M.Tech. (CS)', 'Non-CS', 2022, 2, 'patrickjeeva@gmail.com', 'PATRICK JEEVA A ', 'CS2220 ', '', 'Operating Systems', 'Credit', 'Compulsory', 'NA', 'X', 'X', 0, 'No', NULL, 'YES', 'YES', 'APPROVED', 'NO', NULL, '14-07-2023 10:15:26', '2023-07-17 13:03:09', '', NULL, NULL),
(102, 'M.Tech. (CS)', 'Non-CS', 2022, 2, 'patrickjeeva@gmail.com', 'PATRICK JEEVA A ', 'CS2220 ', '', 'Statistical Methods', 'Credit', 'Formative', 'A', 'X', 'X', 0, 'No', NULL, 'YES', 'YES', 'APPROVED', 'NO', NULL, '14-07-2023 10:15:26', '2023-07-17 13:03:09', '', NULL, NULL),
(103, 'M.Tech. (CS)', 'Non-CS', 2022, 2, 'ipratapdey@gmail.com', 'Pratap Dey', 'CS2221', '', 'Database Management Systems', 'Credit', 'Formative', 'B', 'X', 'X', 0, 'No', NULL, 'YES', 'YES', 'APPROVED', 'NO', NULL, '14-07-2023 10:15:26', '2023-07-17 13:03:09', '', NULL, NULL),
(104, 'M.Tech. (CS)', 'Non-CS', 2022, 2, 'ipratapdey@gmail.com', 'Pratap Dey', 'CS2221', '', 'Design and Analysis of Algorithms', 'Credit', 'Compulsory', 'NA', 'X', 'X', 0, 'No', NULL, 'YES', 'YES', 'APPROVED', 'NO', NULL, '14-07-2023 10:15:26', '2023-07-17 13:03:09', '', NULL, NULL),
(105, 'M.Tech. (CS)', 'Non-CS', 2022, 2, 'ipratapdey@gmail.com', 'Pratap Dey', 'CS2221', '', 'Information Retrieval', 'Credit', 'Elective', 'NA', 'X', 'X', 0, 'No', NULL, 'YES', 'YES', 'APPROVED', 'NO', NULL, '14-07-2023 10:15:26', '2023-07-17 13:03:09', '', NULL, NULL),
(106, 'M.Tech. (CS)', 'Non-CS', 2022, 2, 'ipratapdey@gmail.com', 'Pratap Dey', 'CS2221', '', 'Machine Learning I', 'Credit', 'Elective', 'NA', 'X', 'X', 0, 'No', NULL, 'YES', 'YES', 'APPROVED', 'NO', NULL, '14-07-2023 10:15:26', '2023-07-17 13:03:09', '', NULL, NULL),
(107, 'M.Tech. (CS)', 'Non-CS', 2022, 2, 'ipratapdey@gmail.com', 'Pratap Dey', 'CS2221', '', 'Operating Systems', 'Credit', 'Compulsory', 'NA', 'X', 'X', 0, 'No', NULL, 'YES', 'YES', 'APPROVED', 'NO', NULL, '14-07-2023 10:15:26', '2023-07-17 13:03:09', '', NULL, NULL),
(108, 'M.Tech. (CS)', 'Non-CS', 2022, 2, 'ipratapdey@gmail.com', 'Pratap Dey', 'CS2221', '', 'Statistical Methods', 'Credit', 'Formative', 'A', 'X', 'X', 0, 'No', NULL, 'YES', 'YES', 'APPROVED', 'NO', NULL, '14-07-2023 10:15:26', '2023-07-17 13:03:09', '', NULL, NULL),
(109, 'M.Tech. (CS)', 'Non-CS', 2022, 2, 'pratyushkumar.iiser@gmail.com', 'Pratyush Kumar Sahoo ', 'CS2222', '', 'Database Management Systems', 'Credit', 'Formative', 'B', 'X', 'X', 0, 'No', NULL, 'YES', 'YES', 'APPROVED', 'NO', NULL, '14-07-2023 10:15:26', '2023-07-17 13:03:09', '', NULL, NULL),
(110, 'M.Tech. (CS)', 'Non-CS', 2022, 2, 'pratyushkumar.iiser@gmail.com', 'Pratyush Kumar Sahoo ', 'CS2222', '', 'Design and Analysis of Algorithms', 'Credit', 'Compulsory', 'NA', 'X', 'X', 0, 'No', NULL, 'YES', 'YES', 'APPROVED', 'NO', NULL, '14-07-2023 10:15:26', '2023-07-17 13:03:09', '', NULL, NULL),
(111, 'M.Tech. (CS)', 'Non-CS', 2022, 2, 'pratyushkumar.iiser@gmail.com', 'Pratyush Kumar Sahoo ', 'CS2222', '', 'Information Retrieval', 'Credit', 'Elective', 'NA', 'X', 'X', 0, 'No', NULL, 'YES', 'YES', 'APPROVED', 'NO', NULL, '14-07-2023 10:15:26', '2023-07-17 13:03:09', '', NULL, NULL),
(112, 'M.Tech. (CS)', 'Non-CS', 2022, 2, 'pratyushkumar.iiser@gmail.com', 'Pratyush Kumar Sahoo ', 'CS2222', '', 'Machine Learning I', 'Credit', 'Elective', 'NA', 'X', 'X', 0, 'No', NULL, 'YES', 'YES', 'APPROVED', 'NO', NULL, '14-07-2023 10:15:26', '2023-07-17 13:03:09', '', NULL, NULL),
(113, 'M.Tech. (CS)', 'Non-CS', 2022, 2, 'pratyushkumar.iiser@gmail.com', 'Pratyush Kumar Sahoo ', 'CS2222', '', 'Operating Systems', 'Credit', 'Compulsory', 'NA', 'X', 'X', 0, 'No', NULL, 'YES', 'YES', 'APPROVED', 'NO', NULL, '14-07-2023 10:15:26', '2023-07-17 13:03:09', '', NULL, NULL),
(114, 'M.Tech. (CS)', 'Non-CS', 2022, 2, 'pratyushkumar.iiser@gmail.com', 'Pratyush Kumar Sahoo ', 'CS2222', '', 'Statistical Methods', 'Credit', 'Formative', 'A', 'X', 'X', 0, 'No', NULL, 'YES', 'YES', 'APPROVED', 'NO', NULL, '14-07-2023 10:15:26', '2023-07-17 13:03:09', '', NULL, NULL),
(115, 'M.Tech. (CS)', 'CS', 2022, 2, 'rahulsingha2009@gmail.com', 'Rahul Singha ', 'CS2223', '', 'Computational Geometry', 'Credit', 'Elective', 'NA', 'X', 'X', 0, 'No', NULL, 'YES', 'YES', 'APPROVED', 'NO', NULL, '14-07-2023 10:15:26', '2023-07-17 13:03:09', '', NULL, NULL),
(116, 'M.Tech. (CS)', 'CS', 2022, 2, 'rahulsingha2009@gmail.com', 'Rahul Singha ', 'CS2223', '', 'Database Management Systems', 'Credit', 'Formative', 'B', 'X', 'X', 0, 'No', NULL, 'YES', 'YES', 'APPROVED', 'NO', NULL, '14-07-2023 10:15:26', '2023-07-17 13:03:09', '', NULL, NULL),
(117, 'M.Tech. (CS)', 'CS', 2022, 2, 'rahulsingha2009@gmail.com', 'Rahul Singha ', 'CS2223', '', 'Information Retrieval', 'Credit', 'Elective', 'NA', 'X', 'X', 0, 'No', NULL, 'YES', 'YES', 'APPROVED', 'NO', NULL, '14-07-2023 10:15:26', '2023-07-17 13:03:09', '', NULL, NULL),
(118, 'M.Tech. (CS)', 'CS', 2022, 2, 'rahulsingha2009@gmail.com', 'Rahul Singha ', 'CS2223', '', 'Machine Learning I', 'Credit', 'Elective', 'NA', 'X', 'X', 0, 'No', NULL, 'YES', 'YES', 'APPROVED', 'NO', NULL, '14-07-2023 10:15:26', '2023-07-17 13:03:09', '', NULL, NULL),
(119, 'M.Tech. (CS)', 'CS', 2022, 2, 'rahulsingha2009@gmail.com', 'Rahul Singha ', 'CS2223', '', 'Statistical Methods', 'Credit', 'Formative', 'A', 'X', 'X', 0, 'No', NULL, 'YES', 'YES', 'APPROVED', 'NO', NULL, '14-07-2023 10:15:26', '2023-07-17 13:03:09', '', NULL, NULL),
(120, 'M.Tech. (CS)', 'Non-CS', 2022, 2, 'ritesh222173@outlook.com', 'Ritesh Kumar Tiwary', 'CS2224', '', 'Automata Theory, Languages and Computation', 'Credit', 'Formative', 'B', 'X', 'X', 0, 'No', NULL, 'YES', 'YES', 'APPROVED', 'NO', NULL, '14-07-2023 10:15:26', '2023-07-17 13:03:09', '', NULL, NULL),
(121, 'M.Tech. (CS)', 'Non-CS', 2022, 2, 'ritesh222173@outlook.com', 'Ritesh Kumar Tiwary', 'CS2224', '', 'Compiler Construction', 'Credit', 'Formative', 'B', 'X', 'X', 0, 'No', NULL, 'YES', 'YES', 'APPROVED', 'NO', NULL, '14-07-2023 10:15:26', '2023-07-17 13:03:09', '', NULL, NULL),
(122, 'M.Tech. (CS)', 'Non-CS', 2022, 2, 'ritesh222173@outlook.com', 'Ritesh Kumar Tiwary', 'CS2224', '', 'Database Management Systems', 'Credit', 'Formative', 'B', 'X', 'X', 0, 'No', NULL, 'YES', 'YES', 'APPROVED', 'NO', NULL, '14-07-2023 10:15:26', '2023-07-17 13:03:09', '', NULL, NULL),
(123, 'M.Tech. (CS)', 'Non-CS', 2022, 2, 'ritesh222173@outlook.com', 'Ritesh Kumar Tiwary', 'CS2224', '', 'Design and Analysis of Algorithms', 'Credit', 'Compulsory', 'NA', 'X', 'X', 0, 'No', NULL, 'YES', 'YES', 'APPROVED', 'NO', NULL, '14-07-2023 10:15:26', '2023-07-17 13:03:09', '', NULL, NULL),
(124, 'M.Tech. (CS)', 'Non-CS', 2022, 2, 'ritesh222173@outlook.com', 'Ritesh Kumar Tiwary', 'CS2224', '', 'Machine Learning I', 'Credit', 'Elective', 'NA', 'X', 'X', 0, 'No', NULL, 'YES', 'YES', 'APPROVED', 'NO', NULL, '14-07-2023 10:15:26', '2023-07-17 13:03:09', '', NULL, NULL),
(125, 'M.Tech. (CS)', 'Non-CS', 2022, 2, 'ritesh222173@outlook.com', 'Ritesh Kumar Tiwary', 'CS2224', '', 'Operating Systems', 'Credit', 'Compulsory', 'NA', 'X', 'X', 0, 'No', NULL, 'YES', 'YES', 'APPROVED', 'NO', NULL, '14-07-2023 10:15:26', '2023-07-17 13:03:09', '', NULL, NULL),
(126, 'M.Tech. (CS)', 'Non-CS', 2022, 2, 'bhowmickshaggy@gmail.com', 'Sagnik Bhowmick', 'CS2225', '', 'Database Management Systems', 'Credit', 'Formative', 'B', 'X', 'X', 0, 'No', NULL, 'YES', 'YES', 'APPROVED', 'NO', NULL, '14-07-2023 10:15:26', '2023-07-17 13:03:09', '', NULL, NULL),
(127, 'M.Tech. (CS)', 'Non-CS', 2022, 2, 'bhowmickshaggy@gmail.com', 'Sagnik Bhowmick', 'CS2225', '', 'Design and Analysis of Algorithms', 'Credit', 'Compulsory', 'NA', 'X', 'X', 0, 'No', NULL, 'YES', 'YES', 'APPROVED', 'NO', NULL, '14-07-2023 10:15:26', '2023-07-17 13:03:09', '', NULL, NULL),
(128, 'M.Tech. (CS)', 'Non-CS', 2022, 2, 'bhowmickshaggy@gmail.com', 'Sagnik Bhowmick', 'CS2225', '', 'Information Retrieval', 'Credit', 'Elective', 'NA', 'X', 'X', 0, 'No', NULL, 'YES', 'YES', 'APPROVED', 'NO', NULL, '14-07-2023 10:15:26', '2023-07-17 13:03:09', '', NULL, NULL),
(129, 'M.Tech. (CS)', 'Non-CS', 2022, 2, 'bhowmickshaggy@gmail.com', 'Sagnik Bhowmick', 'CS2225', '', 'Machine Learning I', 'Credit', 'Elective', 'NA', 'X', 'X', 0, 'No', NULL, 'YES', 'YES', 'APPROVED', 'NO', NULL, '14-07-2023 10:15:26', '2023-07-17 13:03:09', '', NULL, NULL),
(130, 'M.Tech. (CS)', 'Non-CS', 2022, 2, 'bhowmickshaggy@gmail.com', 'Sagnik Bhowmick', 'CS2225', '', 'Operating Systems', 'Credit', 'Compulsory', 'NA', 'X', 'X', 0, 'No', NULL, 'YES', 'YES', 'APPROVED', 'NO', NULL, '14-07-2023 10:15:26', '2023-07-17 13:03:09', '', NULL, NULL),
(131, 'M.Tech. (CS)', 'Non-CS', 2022, 2, 'sarbajit.dey194@gmail.com', 'Sarbajit Dey', 'CS2226', '', 'Database Management Systems', 'Credit', 'Formative', 'B', 'X', 'X', 0, 'No', NULL, 'YES', 'YES', 'APPROVED', 'NO', NULL, '14-07-2023 10:15:26', '2023-07-17 13:03:09', '', NULL, NULL),
(132, 'M.Tech. (CS)', 'Non-CS', 2022, 2, 'sarbajit.dey194@gmail.com', 'Sarbajit Dey', 'CS2226', '', 'Design and Analysis of Algorithms', 'Credit', 'Compulsory', 'NA', 'X', 'X', 0, 'No', NULL, 'YES', 'YES', 'APPROVED', 'NO', NULL, '14-07-2023 10:15:26', '2023-07-17 13:03:09', '', NULL, NULL),
(133, 'M.Tech. (CS)', 'Non-CS', 2022, 2, 'sarbajit.dey194@gmail.com', 'Sarbajit Dey', 'CS2226', '', 'Image Processing I', 'Credit', 'Elective', 'NA', 'X', 'X', 0, 'No', NULL, 'YES', 'YES', 'APPROVED', 'NO', NULL, '14-07-2023 10:15:26', '2023-07-17 13:03:09', '', NULL, NULL),
(134, 'M.Tech. (CS)', 'Non-CS', 2022, 2, 'sarbajit.dey194@gmail.com', 'Sarbajit Dey', 'CS2226', '', 'Information Retrieval', 'Credit', 'Elective', 'NA', 'X', 'X', 0, 'No', NULL, 'YES', 'YES', 'APPROVED', 'NO', NULL, '14-07-2023 10:15:26', '2023-07-17 13:03:09', '', NULL, NULL),
(135, 'M.Tech. (CS)', 'Non-CS', 2022, 2, 'sarbajit.dey194@gmail.com', 'Sarbajit Dey', 'CS2226', '', 'Machine Learning I', 'Credit', 'Elective', 'NA', 'X', 'X', 0, 'No', NULL, 'YES', 'YES', 'APPROVED', 'NO', NULL, '14-07-2023 10:15:26', '2023-07-17 13:03:09', '', NULL, NULL),
(136, 'M.Tech. (CS)', 'Non-CS', 2022, 2, 'sarbajit.dey194@gmail.com', 'Sarbajit Dey', 'CS2226', '', 'Operating Systems', 'Credit', 'Compulsory', 'NA', 'X', 'X', 0, 'No', NULL, 'YES', 'YES', 'APPROVED', 'NO', NULL, '14-07-2023 10:15:26', '2023-07-17 13:03:09', '', NULL, NULL),
(137, 'M.Tech. (CS)', 'Non-CS', 2022, 2, 'sasankaj.Mathematics@gmail.com', 'SASANKA JANA', 'CS2227', '', 'Database Management Systems', 'Credit', 'Formative', 'B', 'X', 'X', 0, 'No', NULL, 'YES', 'YES', 'APPROVED', 'NO', NULL, '14-07-2023 10:15:26', '2023-07-17 13:03:09', '', NULL, NULL),
(138, 'M.Tech. (CS)', 'Non-CS', 2022, 2, 'sasankaj.Mathematics@gmail.com', 'SASANKA JANA', 'CS2227', '', 'Design and Analysis of Algorithms', 'Credit', 'Compulsory', 'NA', 'X', 'X', 0, 'No', NULL, 'YES', 'YES', 'APPROVED', 'NO', NULL, '14-07-2023 10:15:26', '2023-07-17 13:03:09', '', NULL, NULL),
(139, 'M.Tech. (CS)', 'Non-CS', 2022, 2, 'sasankaj.Mathematics@gmail.com', 'SASANKA JANA', 'CS2227', '', 'Information Retrieval', 'Credit', 'Elective', 'NA', 'X', 'X', 0, 'No', NULL, 'YES', 'YES', 'APPROVED', 'NO', NULL, '14-07-2023 10:15:26', '2023-07-17 13:03:09', '', NULL, NULL),
(140, 'M.Tech. (CS)', 'Non-CS', 2022, 2, 'sasankaj.Mathematics@gmail.com', 'SASANKA JANA', 'CS2227', '', 'Machine Learning I', 'Credit', 'Elective', 'NA', 'X', 'X', 0, 'No', NULL, 'YES', 'YES', 'APPROVED', 'NO', NULL, '14-07-2023 10:15:26', '2023-07-17 13:03:09', '', NULL, NULL),
(141, 'M.Tech. (CS)', 'Non-CS', 2022, 2, 'sasankaj.Mathematics@gmail.com', 'SASANKA JANA', 'CS2227', '', 'Operating Systems', 'Credit', 'Compulsory', 'NA', 'X', 'X', 0, 'No', NULL, 'YES', 'YES', 'APPROVED', 'NO', NULL, '14-07-2023 10:15:26', '2023-07-17 13:03:09', '', NULL, NULL),
(142, 'M.Tech. (CS)', 'Non-CS', 2022, 2, 'sasankaj.Mathematics@gmail.com', 'SASANKA JANA', 'CS2227', '', 'Statistical Methods', 'Credit', 'Formative', 'A', 'X', 'X', 0, 'No', NULL, 'YES', 'YES', 'APPROVED', 'NO', NULL, '14-07-2023 10:15:26', '2023-07-17 13:03:09', '', NULL, NULL),
(143, 'M.Tech. (CS)', 'Non-CS', 2022, 2, 'sauravdhara883@gmail.com', 'Saurav Dhara ', 'CS2228', '', 'Automata Theory, Languages and Computation', 'Credit', 'Formative', 'B', 'X', 'X', 0, 'No', NULL, 'YES', 'YES', 'APPROVED', 'NO', NULL, '14-07-2023 10:15:26', '2023-07-17 13:03:09', '', NULL, NULL),
(144, 'M.Tech. (CS)', 'Non-CS', 2022, 2, 'sauravdhara883@gmail.com', 'Saurav Dhara ', 'CS2228', '', 'Database Management Systems', 'Credit', 'Formative', 'B', 'X', 'X', 0, 'No', NULL, 'YES', 'YES', 'APPROVED', 'NO', NULL, '14-07-2023 10:15:26', '2023-07-17 13:03:09', '', NULL, NULL),
(145, 'M.Tech. (CS)', 'Non-CS', 2022, 2, 'sauravdhara883@gmail.com', 'Saurav Dhara ', 'CS2228', '', 'Design and Analysis of Algorithms', 'Credit', 'Compulsory', 'NA', 'X', 'X', 0, 'No', NULL, 'YES', 'YES', 'APPROVED', 'NO', NULL, '14-07-2023 10:15:26', '2023-07-17 13:03:09', '', NULL, NULL),
(146, 'M.Tech. (CS)', 'Non-CS', 2022, 2, 'sauravdhara883@gmail.com', 'Saurav Dhara ', 'CS2228', '', 'Information Retrieval', 'Credit', 'Elective', 'NA', 'X', 'X', 0, 'No', NULL, 'YES', 'YES', 'APPROVED', 'NO', NULL, '14-07-2023 10:15:26', '2023-07-17 13:03:09', '', NULL, NULL),
(147, 'M.Tech. (CS)', 'Non-CS', 2022, 2, 'sauravdhara883@gmail.com', 'Saurav Dhara ', 'CS2228', '', 'Machine Learning I', 'Credit', 'Elective', 'NA', 'X', 'X', 0, 'No', NULL, 'YES', 'YES', 'APPROVED', 'NO', NULL, '14-07-2023 10:15:26', '2023-07-17 13:03:09', '', NULL, NULL),
(148, 'M.Tech. (CS)', 'Non-CS', 2022, 2, 'sauravdhara883@gmail.com', 'Saurav Dhara ', 'CS2228', '', 'Operating Systems', 'Credit', 'Compulsory', 'NA', 'X', 'X', 0, 'No', NULL, 'YES', 'YES', 'APPROVED', 'NO', NULL, '14-07-2023 10:15:26', '2023-07-17 13:03:09', '', NULL, NULL),
(149, 'M.Tech. (CS)', 'CS', 2022, 2, 'snehatiwari2519@gmail.com', 'Sneha Tiwari ', 'CS2229', '', 'Computational Geometry', 'Credit', 'Elective', 'NA', 'X', 'X', 0, 'No', NULL, 'YES', 'YES', 'APPROVED', 'NO', NULL, '14-07-2023 10:15:26', '2023-07-17 13:03:09', '', NULL, NULL),
(150, 'M.Tech. (CS)', 'CS', 2022, 2, 'snehatiwari2519@gmail.com', 'Sneha Tiwari ', 'CS2229', '', 'Database Management Systems', 'Credit', 'Formative', 'B', 'X', 'X', 0, 'No', NULL, 'YES', 'YES', 'APPROVED', 'NO', NULL, '14-07-2023 10:15:26', '2023-07-17 13:03:09', '', NULL, NULL),
(151, 'M.Tech. (CS)', 'CS', 2022, 2, 'snehatiwari2519@gmail.com', 'Sneha Tiwari ', 'CS2229', '', 'Image Processing I', 'Credit', 'Elective', 'NA', 'X', 'X', 0, 'No', NULL, 'YES', 'YES', 'APPROVED', 'NO', NULL, '14-07-2023 10:15:26', '2023-07-17 13:03:09', '', NULL, NULL),
(152, 'M.Tech. (CS)', 'CS', 2022, 2, 'snehatiwari2519@gmail.com', 'Sneha Tiwari ', 'CS2229', '', 'Information Retrieval', 'Credit', 'Elective', 'NA', 'X', 'X', 0, 'No', NULL, 'YES', 'YES', 'APPROVED', 'NO', NULL, '14-07-2023 10:15:26', '2023-07-17 13:03:09', '', NULL, NULL),
(153, 'M.Tech. (CS)', 'CS', 2022, 2, 'snehatiwari2519@gmail.com', 'Sneha Tiwari ', 'CS2229', '', 'Machine Learning I', 'Credit', 'Elective', 'NA', 'X', 'X', 0, 'No', NULL, 'YES', 'YES', 'APPROVED', 'NO', NULL, '14-07-2023 10:15:26', '2023-07-17 13:03:09', '', NULL, NULL),
(154, 'M.Tech. (CS)', 'CS', 2022, 2, 'snehatiwari2519@gmail.com', 'Sneha Tiwari ', 'CS2229', '', 'Statistical Methods', 'Credit', 'Formative', 'A', 'X', 'X', 0, 'No', NULL, 'YES', 'YES', 'APPROVED', 'NO', NULL, '14-07-2023 10:15:26', '2023-07-17 13:03:09', '', NULL, NULL),
(155, 'M.Tech. (CS)', 'Non-CS', 2022, 2, 'soumenmandal712@gmail.com', 'Soumen Mandal', 'CS2230', '', 'Automata Theory, Languages and Computation', 'Credit', 'Formative', 'B', 'X', 'X', 0, 'No', NULL, 'YES', 'YES', 'APPROVED', 'NO', NULL, '14-07-2023 10:15:26', '2023-07-17 13:03:09', '', NULL, NULL),
(156, 'M.Tech. (CS)', 'Non-CS', 2022, 2, 'soumenmandal712@gmail.com', 'Soumen Mandal', 'CS2230', '', 'Database Management Systems', 'Credit', 'Formative', 'B', 'X', 'X', 0, 'No', NULL, 'YES', 'YES', 'APPROVED', 'NO', NULL, '14-07-2023 10:15:26', '2023-07-17 13:03:09', '', NULL, NULL),
(157, 'M.Tech. (CS)', 'Non-CS', 2022, 2, 'soumenmandal712@gmail.com', 'Soumen Mandal', 'CS2230', '', 'Design and Analysis of Algorithms', 'Credit', 'Compulsory', 'NA', 'X', 'X', 0, 'No', NULL, 'YES', 'YES', 'APPROVED', 'NO', NULL, '14-07-2023 10:15:26', '2023-07-17 13:03:09', '', NULL, NULL),
(158, 'M.Tech. (CS)', 'Non-CS', 2022, 2, 'soumenmandal712@gmail.com', 'Soumen Mandal', 'CS2230', '', 'Information Retrieval', 'Credit', 'Elective', 'NA', 'X', 'X', 0, 'No', NULL, 'YES', 'YES', 'APPROVED', 'NO', NULL, '14-07-2023 10:15:26', '2023-07-17 13:03:09', '', NULL, NULL),
(159, 'M.Tech. (CS)', 'Non-CS', 2022, 2, 'soumenmandal712@gmail.com', 'Soumen Mandal', 'CS2230', '', 'Machine Learning I', 'Credit', 'Elective', 'NA', 'X', 'X', 0, 'No', NULL, 'YES', 'YES', 'APPROVED', 'NO', NULL, '14-07-2023 10:15:26', '2023-07-17 13:03:09', '', NULL, NULL),
(160, 'M.Tech. (CS)', 'Non-CS', 2022, 2, 'soumenmandal712@gmail.com', 'Soumen Mandal', 'CS2230', '', 'Operating Systems', 'Credit', 'Compulsory', 'NA', 'X', 'X', 0, 'No', NULL, 'YES', 'YES', 'APPROVED', 'NO', NULL, '14-07-2023 10:15:26', '2023-07-17 13:03:09', '', NULL, NULL),
(161, 'M.Tech. (CS)', 'Non-CS', 2022, 2, 'soumyadiperikson@gmail.com', 'Soumyadip Sikdar', 'CS2231', '', 'Database Management Systems', 'Credit', 'Formative', 'B', 'X', 'X', 0, 'No', NULL, 'YES', 'YES', 'APPROVED', 'NO', NULL, '14-07-2023 10:15:26', '2023-07-17 13:03:09', '', NULL, NULL),
(162, 'M.Tech. (CS)', 'Non-CS', 2022, 2, 'soumyadiperikson@gmail.com', 'Soumyadip Sikdar', 'CS2231', '', 'Design and Analysis of Algorithms', 'Credit', 'Compulsory', 'NA', 'X', 'X', 0, 'No', NULL, 'YES', 'YES', 'APPROVED', 'NO', NULL, '14-07-2023 10:15:26', '2023-07-17 13:03:09', '', NULL, NULL),
(163, 'M.Tech. (CS)', 'Non-CS', 2022, 2, 'soumyadiperikson@gmail.com', 'Soumyadip Sikdar', 'CS2231', '', 'Image Processing I', 'Credit', 'Elective', 'NA', 'X', 'X', 0, 'No', NULL, 'YES', 'YES', 'APPROVED', 'NO', NULL, '14-07-2023 10:15:26', '2023-07-17 13:03:09', '', NULL, NULL),
(164, 'M.Tech. (CS)', 'Non-CS', 2022, 2, 'soumyadiperikson@gmail.com', 'Soumyadip Sikdar', 'CS2231', '', 'Machine Learning I', 'Credit', 'Elective', 'NA', 'X', 'X', 0, 'No', NULL, 'YES', 'YES', 'APPROVED', 'NO', NULL, '14-07-2023 10:15:26', '2023-07-17 13:03:09', '', NULL, NULL),
(165, 'M.Tech. (CS)', 'Non-CS', 2022, 2, 'soumyadiperikson@gmail.com', 'Soumyadip Sikdar', 'CS2231', '', 'Operating Systems', 'Credit', 'Compulsory', 'NA', 'X', 'X', 0, 'No', NULL, 'YES', 'YES', 'APPROVED', 'NO', NULL, '14-07-2023 10:15:26', '2023-07-17 13:03:09', '', NULL, NULL),
(166, 'M.Tech. (CS)', 'Non-CS', 2022, 2, 'sugatarai1998@gmail.com', 'Sugata Ghorai', 'CS2232', '', 'Automata Theory, Languages and Computation', 'Credit', 'Formative', 'B', 'X', 'X', 0, 'No', NULL, 'YES', 'YES', 'APPROVED', 'NO', NULL, '14-07-2023 10:15:26', '2023-07-17 13:03:09', '', NULL, NULL),
(167, 'M.Tech. (CS)', 'Non-CS', 2022, 2, 'sugatarai1998@gmail.com', 'Sugata Ghorai', 'CS2232', '', 'Database Management Systems', 'Credit', 'Formative', 'B', 'X', 'X', 0, 'No', NULL, 'YES', 'YES', 'APPROVED', 'NO', NULL, '14-07-2023 10:15:26', '2023-07-17 13:03:09', '', NULL, NULL),
(168, 'M.Tech. (CS)', 'Non-CS', 2022, 2, 'sugatarai1998@gmail.com', 'Sugata Ghorai', 'CS2232', '', 'Design and Analysis of Algorithms', 'Credit', 'Compulsory', 'NA', 'X', 'X', 0, 'No', NULL, 'YES', 'YES', 'APPROVED', 'NO', NULL, '14-07-2023 10:15:26', '2023-07-17 13:03:09', '', NULL, NULL),
(169, 'M.Tech. (CS)', 'Non-CS', 2022, 2, 'sugatarai1998@gmail.com', 'Sugata Ghorai', 'CS2232', '', 'Information Retrieval', 'Credit', 'Elective', 'NA', 'X', 'X', 0, 'No', NULL, 'YES', 'YES', 'APPROVED', 'NO', NULL, '14-07-2023 10:15:26', '2023-07-17 13:03:09', '', NULL, NULL),
(170, 'M.Tech. (CS)', 'Non-CS', 2022, 2, 'sugatarai1998@gmail.com', 'Sugata Ghorai', 'CS2232', '', 'Machine Learning I', 'Credit', 'Elective', 'NA', 'X', 'X', 0, 'No', NULL, 'YES', 'YES', 'APPROVED', 'NO', NULL, '14-07-2023 10:15:26', '2023-07-17 13:03:09', '', NULL, NULL),
(171, 'M.Tech. (CS)', 'Non-CS', 2022, 2, 'sugatarai1998@gmail.com', 'Sugata Ghorai', 'CS2232', '', 'Operating Systems', 'Credit', 'Compulsory', 'NA', 'X', 'X', 0, 'No', NULL, 'YES', 'YES', 'APPROVED', 'NO', NULL, '14-07-2023 10:15:26', '2023-07-17 13:03:09', '', NULL, NULL),
(172, 'M.Tech. (CS)', 'CS', 2022, 2, 'swastik.mohanty63@gmail.com', 'Swastik Mohanty', 'CS2233', '', 'Automata Theory, Languages and Computation', 'Credit', 'Formative', 'B', 'X', 'X', 0, 'No', NULL, 'YES', 'YES', 'APPROVED', 'NO', NULL, '14-07-2023 10:15:26', '2023-07-17 13:03:09', '', NULL, NULL),
(173, 'M.Tech. (CS)', 'CS', 2022, 2, 'swastik.mohanty63@gmail.com', 'Swastik Mohanty', 'CS2233', '', 'Image Processing I', 'Credit', 'Elective', 'NA', 'X', 'X', 0, 'No', NULL, 'YES', 'YES', 'APPROVED', 'NO', NULL, '14-07-2023 10:15:26', '2023-07-17 13:03:09', '', NULL, NULL),
(174, 'M.Tech. (CS)', 'CS', 2022, 2, 'swastik.mohanty63@gmail.com', 'Swastik Mohanty', 'CS2233', '', 'Information Retrieval', 'Credit', 'Elective', 'NA', 'X', 'X', 0, 'No', NULL, 'YES', 'YES', 'APPROVED', 'NO', NULL, '14-07-2023 10:15:26', '2023-07-17 13:03:09', '', NULL, NULL),
(175, 'M.Tech. (CS)', 'CS', 2022, 2, 'swastik.mohanty63@gmail.com', 'Swastik Mohanty', 'CS2233', '', 'Statistical Methods', 'Credit', 'Formative', 'A', 'X', 'X', 0, 'No', NULL, 'YES', 'YES', 'APPROVED', 'NO', NULL, '14-07-2023 10:15:26', '2023-07-17 13:03:09', '', NULL, NULL),
(176, 'M.Tech. (CS)', 'CS', 2022, 2, 'swastik.mohanty63@gmail.com', 'Swastik Mohanty', 'CS2233', '', 'Graph Algorithms', 'Credit', 'Elective', 'NA', 'X', 'X', 0, 'No', NULL, 'YES', 'YES', 'APPROVED', 'NO', NULL, '14-07-2023 10:15:26', '2023-07-17 13:03:09', '', NULL, NULL),
(177, 'M.Tech. (CS)', 'CS', 2022, 2, 'swn2906@gmail.com', 'Swastik Nandi', 'CS2234', '', 'Automata Theory, Languages and Computation', 'Credit', 'Formative', 'B', 'X', 'X', 0, 'No', NULL, 'YES', 'YES', 'APPROVED', 'NO', NULL, '14-07-2023 10:15:26', '2023-07-17 13:03:09', '', NULL, NULL);
INSERT INTO `grades` (`ID`, `course`, `stream`, `batch`, `semester`, `student_email`, `student_name`, `roll_no`, `subject_code`, `subject_name`, `credit_course`, `subject_type`, `pool`, `faculty_email`, `faculty_name`, `marks`, `supply_tag`, `prev_marks`, `marks_freezed`, `reg_freezed`, `registration_verification_status`, `student_verified`, `verified_value`, `recorded_on`, `student_verified_on`, `supply_ts`, `reg_verified_on`, `reg_verified_by`) VALUES
(178, 'M.Tech. (CS)', 'CS', 2022, 2, 'swn2906@gmail.com', 'Swastik Nandi', 'CS2234', '', 'Image Processing I', 'Credit', 'Elective', 'NA', 'X', 'X', 0, 'No', NULL, 'YES', 'YES', 'APPROVED', 'NO', NULL, '14-07-2023 10:15:26', '2023-07-17 13:03:09', '', NULL, NULL),
(179, 'M.Tech. (CS)', 'CS', 2022, 2, 'swn2906@gmail.com', 'Swastik Nandi', 'CS2234', '', 'Information Retrieval', 'Credit', 'Elective', 'NA', 'X', 'X', 0, 'No', NULL, 'YES', 'YES', 'APPROVED', 'NO', NULL, '14-07-2023 10:15:26', '2023-07-17 13:03:09', '', NULL, NULL),
(180, 'M.Tech. (CS)', 'CS', 2022, 2, 'swn2906@gmail.com', 'Swastik Nandi', 'CS2234', '', 'Machine Learning I', 'Credit', 'Elective', 'NA', 'X', 'X', 0, 'No', NULL, 'YES', 'YES', 'APPROVED', 'NO', NULL, '14-07-2023 10:15:26', '2023-07-17 13:03:09', '', NULL, NULL),
(181, 'M.Tech. (CS)', 'CS', 2022, 2, 'swn2906@gmail.com', 'Swastik Nandi', 'CS2234', '', 'Statistical Methods', 'Credit', 'Formative', 'A', 'X', 'X', 0, 'No', NULL, 'YES', 'YES', 'APPROVED', 'NO', NULL, '14-07-2023 10:15:26', '2023-07-17 13:03:09', '', NULL, NULL),
(239, 'M.Tech. (CS)', 'Non-CS', 2022, 3, 'sarbajit.dey194@gmail.com', 'Sarbajit Dey', 'CS2226', '', 'Data and File Structures', 'Credit', 'Compulsory', 'NA', 'debrup@isical.ac.in', 'Debrup Chakraborty, CSRU', 0, 'No', NULL, 'NO', 'YES', 'APPROVED', 'NA', NULL, '2023-07-20 11:15:30', NULL, NULL, '2023-07-20 11:24:56', 'Susmita SurKolay'),
(240, 'M.Tech. (CS)', 'Non-CS', 2022, 3, 'sarbajit.dey194@gmail.com', 'Sarbajit Dey', 'CS2226', '', 'Database Management Systems', 'Credit', 'Formative', 'B', 'sasthi@isical.ac.in', 'Sasthi C Ghosh, ACMU', 0, 'No', NULL, 'NO', 'YES', 'APPROVED', 'NA', NULL, '2023-07-20 11:15:30', NULL, NULL, '2023-07-20 11:24:56', 'Susmita SurKolay'),
(241, 'M.Tech. (CS)', 'Non-CS', 2022, 3, 'sarbajit.dey194@gmail.com', 'Sarbajit Dey', 'CS2226', '', 'Design and Analysis of Algorithms', 'Non Credit', 'Compulsory', 'NA', 'arijitiitkgpster@gmail.com', 'Arijit Ghosh, ACMU', 0, 'No', NULL, 'NO', 'YES', 'APPROVED', 'NA', NULL, '2023-07-20 11:15:30', NULL, NULL, '2023-07-20 11:24:56', 'Susmita SurKolay'),
(242, 'M.Tech. (CS)', 'Non-CS', 2022, 3, 'sarbajit.dey194@gmail.com', 'Sarbajit Dey', 'CS2226', '', 'Graph Algorithms', 'Non Credit', 'Elective', 'NA', 'naqueebwarsi@isical.ac.in', 'Naqeeb Warsi, ECSU', 0, 'No', NULL, 'NO', 'YES', 'APPROVED', 'NA', NULL, '2023-07-20 11:15:30', NULL, NULL, '2023-07-20 11:24:56', 'Susmita SurKolay'),
(243, 'M.Tech. (CS)', 'Non-CS', 2022, 3, 'sarbajit.dey194@gmail.com', 'Sarbajit Dey', 'CS2226', '', 'Image Processing II', 'Credit', 'Elective', 'NA', 'malaybhattacharyya@isical.ac.in', 'Malay Bhattacharyya, CSU', 0, 'No', NULL, 'NO', 'YES', 'NOT APPROVED', 'NA', NULL, '2023-07-20 11:15:30', NULL, NULL, '2023-07-20 11:24:56', 'Susmita SurKolay'),
(244, 'M.Tech. (CS)', 'Non-CS', 2022, 3, 'sarbajit.dey194@gmail.com', 'Sarbajit Dey', 'CS2226', '', 'Introduction to Programming', 'Credit', 'Compulsory', 'NA', 'biswajit@isical.ac.in', 'Biswajit Halder, ACMU', 0, 'No', NULL, 'NO', 'YES', 'APPROVED', 'NA', NULL, '2023-07-20 11:15:30', NULL, NULL, '2023-07-20 11:24:56', 'Susmita SurKolay'),
(245, 'M.Tech. (CS)', 'Non-CS', 2022, 3, 'sarbajit.dey194@gmail.com', 'Sarbajit Dey', 'CS2226', '', 'Probability and Stochastic\r\nProcesses', 'Credit', 'Formative', 'A', 'rajat@isical.ac.in', 'Rajat K. De, MIU', 0, 'No', NULL, 'NO', 'YES', 'APPROVED', 'NA', NULL, '2023-07-20 11:15:30', NULL, NULL, '2023-07-20 11:24:56', 'Susmita SurKolay'),
(246, 'M.Tech. (CS)', 'Non-CS', 2022, 3, 'bhowmickshaggy@gmail.com', 'Sagnik Bhowmick', 'CS2225', '', 'Data and File Structures', 'Credit', 'Compulsory', 'NA', 'debrup@isical.ac.in', 'Debrup Chakraborty, CSRU', 0, 'No', NULL, 'NO', 'YES', 'APPROVED', 'NA', NULL, '2023-07-20 11:16:16', NULL, NULL, '2023-07-20 11:24:40', 'Susmita SurKolay'),
(247, 'M.Tech. (CS)', 'Non-CS', 2022, 3, 'bhowmickshaggy@gmail.com', 'Sagnik Bhowmick', 'CS2225', '', 'Database Management Systems', 'Non Credit', 'Formative', 'B', 'sasthi@isical.ac.in', 'Sasthi C Ghosh, ACMU', 0, 'No', NULL, 'NO', 'YES', 'APPROVED', 'NA', NULL, '2023-07-20 11:16:16', NULL, NULL, '2023-07-20 11:24:40', 'Susmita SurKolay'),
(248, 'M.Tech. (CS)', 'Non-CS', 2022, 3, 'bhowmickshaggy@gmail.com', 'Sagnik Bhowmick', 'CS2225', '', 'Design and Analysis of Algorithms', 'Credit', 'Compulsory', 'NA', 'arijitiitkgpster@gmail.com', 'Arijit Ghosh, ACMU', 0, 'No', NULL, 'NO', 'YES', 'APPROVED', 'NA', NULL, '2023-07-20 11:16:16', NULL, NULL, '2023-07-20 11:24:40', 'Susmita SurKolay'),
(249, 'M.Tech. (CS)', 'Non-CS', 2022, 3, 'bhowmickshaggy@gmail.com', 'Sagnik Bhowmick', 'CS2225', '', 'Elements of Algebraic\r\nStructures', 'Non Credit', 'Formative', 'A', 'utpal@isical.ac.in', 'Utpal Garain, CVPR', 0, 'No', NULL, 'NO', 'YES', 'APPROVED', 'NA', NULL, '2023-07-20 11:16:16', NULL, NULL, '2023-07-20 11:24:40', 'Susmita SurKolay'),
(250, 'M.Tech. (CS)', 'Non-CS', 2022, 3, 'bhowmickshaggy@gmail.com', 'Sagnik Bhowmick', 'CS2225', '', 'Graph Algorithms', 'Credit', 'Elective', 'NA', 'naqueebwarsi@isical.ac.in', 'Naqeeb Warsi, ECSU', 0, 'No', NULL, 'NO', 'YES', 'APPROVED', 'NA', NULL, '2023-07-20 11:16:16', NULL, NULL, '2023-07-20 11:24:40', 'Susmita SurKolay'),
(251, 'M.Tech. (CS)', 'Non-CS', 2022, 3, 'bhowmickshaggy@gmail.com', 'Sagnik Bhowmick', 'CS2225', '', 'Image Processing I', 'Credit', 'Elective', 'NA', 'psm@isical.ac.in', 'Partha Sarathi Mukherjee, ISRU', 0, 'No', NULL, 'NO', 'YES', 'APPROVED', 'NA', NULL, '2023-07-20 11:16:16', NULL, NULL, '2023-07-20 11:24:40', 'Susmita SurKolay'),
(252, 'M.Tech. (CS)', 'Non-CS', 2022, 3, 'bhowmickshaggy@gmail.com', 'Sagnik Bhowmick', 'CS2225', '', 'Image Processing II', 'Credit', 'Elective', 'NA', 'malaybhattacharyya@isical.ac.in', 'Malay Bhattacharyya, CSU', 0, 'No', NULL, 'NO', 'YES', 'APPROVED', 'NA', NULL, '2023-07-20 11:16:16', NULL, NULL, '2023-07-20 11:24:40', 'Susmita SurKolay'),
(253, 'M.Tech. (CS)', 'Non-CS', 2022, 3, 'ritesh222173@outlook.com', 'Ritesh Kumar Tiwary', 'CS2224', '', 'Design and Analysis of Algorithms', 'Non Credit', 'Compulsory', 'NA', 'arijitiitkgpster@gmail.com', 'Arijit Ghosh, ACMU', 0, 'No', NULL, 'NO', 'YES', 'APPROVED', 'NA', NULL, '2023-07-20 11:16:57', NULL, NULL, '2023-07-20 11:21:18', 'Susmita SurKolay'),
(254, 'M.Tech. (CS)', 'Non-CS', 2022, 3, 'ritesh222173@outlook.com', 'Ritesh Kumar Tiwary', 'CS2224', '', 'Elements of Algebraic\r\nStructures', 'Credit', 'Formative', 'A', 'utpal@isical.ac.in', 'Utpal Garain, CVPR', 0, 'No', NULL, 'NO', 'YES', 'APPROVED', 'NA', NULL, '2023-07-20 11:16:57', NULL, NULL, '2023-07-20 11:21:18', 'Susmita SurKolay'),
(255, 'M.Tech. (CS)', 'Non-CS', 2022, 3, 'ritesh222173@outlook.com', 'Ritesh Kumar Tiwary', 'CS2224', '', 'Graph Algorithms', 'Credit', 'Elective', 'NA', 'naqueebwarsi@isical.ac.in', 'Naqeeb Warsi, ECSU', 0, 'No', NULL, 'NO', 'YES', 'APPROVED', 'NA', NULL, '2023-07-20 11:16:57', NULL, NULL, '2023-07-20 11:21:18', 'Susmita SurKolay'),
(256, 'M.Tech. (CS)', 'Non-CS', 2022, 3, 'ritesh222173@outlook.com', 'Ritesh Kumar Tiwary', 'CS2224', '', 'Image Processing I', 'Credit', 'Elective', 'NA', 'psm@isical.ac.in', 'Partha Sarathi Mukherjee, ISRU', 0, 'No', NULL, 'NO', 'YES', 'APPROVED', 'NA', NULL, '2023-07-20 11:16:57', NULL, NULL, '2023-07-20 11:21:18', 'Susmita SurKolay'),
(257, 'M.Tech. (CS)', 'Non-CS', 2022, 3, 'ritesh222173@outlook.com', 'Ritesh Kumar Tiwary', 'CS2224', '', 'Image Processing II', 'Credit', 'Elective', 'NA', 'malaybhattacharyya@isical.ac.in', 'Malay Bhattacharyya, CSU', 0, 'No', NULL, 'NO', 'YES', 'APPROVED', 'NA', NULL, '2023-07-20 11:16:57', NULL, NULL, '2023-07-20 11:21:18', 'Susmita SurKolay'),
(258, 'M.Tech. (CS)', 'Non-CS', 2022, 3, 'ritesh222173@outlook.com', 'Ritesh Kumar Tiwary', 'CS2224', '', 'Information Retrieval', 'Non Credit', 'Elective', 'NA', 'kuntal.isical@gmail.com', 'Kuntal Ghosh, MIU', 0, 'No', NULL, 'NO', 'YES', 'APPROVED', 'NA', NULL, '2023-07-20 11:16:57', NULL, NULL, '2023-07-20 11:21:18', 'Susmita SurKolay'),
(259, 'M.Tech. (CS)', 'Non-CS', 2022, 3, 'ritesh222173@outlook.com', 'Ritesh Kumar Tiwary', 'CS2224', '', 'Introduction to Programming', 'Credit', 'Compulsory', 'NA', 'biswajit@isical.ac.in', 'Biswajit Halder, ACMU', 0, 'No', NULL, 'NO', 'YES', 'APPROVED', 'NA', NULL, '2023-07-20 11:16:57', NULL, NULL, '2023-07-20 11:21:18', 'Susmita SurKolay'),
(260, 'M.Tech. (CS)', 'CS', 2022, 3, 'rahulsingha2009@gmail.com', 'Rahul Singha', 'CS2223', '', 'Data and File Structures', 'Credit', 'Formative', 'B', 'debrup@isical.ac.in', 'Debrup Chakraborty, CSRU', 0, 'No', NULL, 'NO', 'YES', 'NOT APPROVED', 'NA', NULL, '2023-07-20 11:17:29', NULL, NULL, '2023-07-20 11:21:14', 'Susmita SurKolay'),
(261, 'M.Tech. (CS)', 'CS', 2022, 3, 'rahulsingha2009@gmail.com', 'Rahul Singha', 'CS2223', '', 'Database Management Systems', 'Non Credit', 'Formative', 'B', 'sasthi@isical.ac.in', 'Sasthi C Ghosh, ACMU', 0, 'No', NULL, 'NO', 'YES', 'APPROVED', 'NA', NULL, '2023-07-20 11:17:29', NULL, NULL, '2023-07-20 11:21:14', 'Susmita SurKolay'),
(262, 'M.Tech. (CS)', 'CS', 2022, 3, 'rahulsingha2009@gmail.com', 'Rahul Singha', 'CS2223', '', 'Design and Analysis of Algorithms', 'Credit', 'Compulsory', 'NA', 'arijitiitkgpster@gmail.com', 'Arijit Ghosh, ACMU', 0, 'No', NULL, 'NO', 'YES', 'APPROVED', 'NA', NULL, '2023-07-20 11:17:29', NULL, NULL, '2023-07-20 11:21:14', 'Susmita SurKolay'),
(263, 'M.Tech. (CS)', 'CS', 2022, 3, 'rahulsingha2009@gmail.com', 'Rahul Singha', 'CS2223', '', 'Image Processing II', 'Credit', 'Elective', 'NA', 'malaybhattacharyya@isical.ac.in', 'Malay Bhattacharyya, CSU', 0, 'No', NULL, 'NO', 'YES', 'APPROVED', 'NA', NULL, '2023-07-20 11:17:29', NULL, NULL, '2023-07-20 11:21:14', 'Susmita SurKolay'),
(264, 'M.Tech. (CS)', 'CS', 2022, 3, 'rahulsingha2009@gmail.com', 'Rahul Singha', 'CS2223', '', 'Information Retrieval', 'Non Credit', 'Elective', 'NA', 'kuntal.isical@gmail.com', 'Kuntal Ghosh, MIU', 0, 'No', NULL, 'NO', 'YES', 'APPROVED', 'NA', NULL, '2023-07-20 11:17:29', NULL, NULL, '2023-07-20 11:21:14', 'Susmita SurKolay'),
(265, 'M.Tech. (CS)', 'CS', 2022, 3, 'rahulsingha2009@gmail.com', 'Rahul Singha', 'CS2223', '', 'Introduction to Programming', 'Credit', 'Compulsory', 'NA', 'biswajit@isical.ac.in', 'Biswajit Halder, ACMU', 0, 'No', NULL, 'NO', 'YES', 'APPROVED', 'NA', NULL, '2023-07-20 11:17:29', NULL, NULL, '2023-07-20 11:21:14', 'Susmita SurKolay'),
(266, 'M.Tech. (CS)', 'CS', 2022, 3, 'rahulsingha2009@gmail.com', 'Rahul Singha', 'CS2223', '', 'Probability and Stochastic\r\nProcesses', 'Credit', 'Formative', 'A', 'rajat@isical.ac.in', 'Rajat K. De, MIU', 0, 'No', NULL, 'NO', 'YES', 'APPROVED', 'NA', NULL, '2023-07-20 11:17:29', NULL, NULL, '2023-07-20 11:21:14', 'Susmita SurKolay'),
(267, 'M.Tech. (CS)', 'CS', 2022, 3, 'paulindr06@gmail.com', 'Indranil Paul', 'CS2215', '', 'Data and File Structures', 'Credit', 'Formative', 'B', 'debrup@isical.ac.in', 'Debrup Chakraborty, CSRU', 0, 'No', NULL, 'NO', 'YES', 'APPROVED', 'NA', NULL, '2023-07-20 11:18:04', NULL, NULL, '2023-07-20 11:20:51', 'Susmita SurKolay'),
(268, 'M.Tech. (CS)', 'CS', 2022, 3, 'paulindr06@gmail.com', 'Indranil Paul', 'CS2215', '', 'Database Management Systems', 'Credit', 'Formative', 'B', 'sasthi@isical.ac.in', 'Sasthi C Ghosh, ACMU', 0, 'No', NULL, 'NO', 'YES', 'APPROVED', 'NA', NULL, '2023-07-20 11:18:04', NULL, NULL, '2023-07-20 11:20:51', 'Susmita SurKolay'),
(269, 'M.Tech. (CS)', 'CS', 2022, 3, 'paulindr06@gmail.com', 'Indranil Paul', 'CS2215', '', 'Graph Algorithms', 'Non Credit', 'Elective', 'NA', 'naqueebwarsi@isical.ac.in', 'Naqeeb Warsi, ECSU', 0, 'No', NULL, 'NO', 'YES', 'APPROVED', 'NA', NULL, '2023-07-20 11:18:04', NULL, NULL, '2023-07-20 11:20:51', 'Susmita SurKolay'),
(270, 'M.Tech. (CS)', 'CS', 2022, 3, 'paulindr06@gmail.com', 'Indranil Paul', 'CS2215', '', 'Image Processing I', 'Credit', 'Elective', 'NA', 'psm@isical.ac.in', 'Partha Sarathi Mukherjee, ISRU', 0, 'No', NULL, 'NO', 'YES', 'NOT APPROVED', 'NA', NULL, '2023-07-20 11:18:04', NULL, NULL, '2023-07-20 11:20:51', 'Susmita SurKolay'),
(271, 'M.Tech. (CS)', 'CS', 2022, 3, 'paulindr06@gmail.com', 'Indranil Paul', 'CS2215', '', 'Image Processing II', 'Credit', 'Elective', 'NA', 'malaybhattacharyya@isical.ac.in', 'Malay Bhattacharyya, CSU', 0, 'No', NULL, 'NO', 'YES', 'APPROVED', 'NA', NULL, '2023-07-20 11:18:04', NULL, NULL, '2023-07-20 11:20:51', 'Susmita SurKolay'),
(272, 'M.Tech. (CS)', 'CS', 2022, 3, 'paulindr06@gmail.com', 'Indranil Paul', 'CS2215', '', 'Information Retrieval', 'Credit', 'Elective', 'NA', 'kuntal.isical@gmail.com', 'Kuntal Ghosh, MIU', 0, 'No', NULL, 'NO', 'YES', 'APPROVED', 'NA', NULL, '2023-07-20 11:18:04', NULL, NULL, '2023-07-20 11:20:51', 'Susmita SurKolay'),
(273, 'M.Tech. (CS)', 'CS', 2022, 3, 'paulindr06@gmail.com', 'Indranil Paul', 'CS2215', '', 'Introduction to Programming', 'Non Credit', 'Compulsory', 'NA', 'biswajit@isical.ac.in', 'Biswajit Halder, ACMU', 0, 'No', NULL, 'NO', 'YES', 'APPROVED', 'NA', NULL, '2023-07-20 11:18:04', NULL, NULL, '2023-07-20 11:20:51', 'Susmita SurKolay'),
(274, 'M.Tech. (CS)', 'CS', 2022, 3, 'aratrik1999@gmail.com', 'Aratrik Chandra', 'CS2206', '', 'Data and File Structures', 'Credit', 'Formative', 'B', 'debrup@isical.ac.in', 'Debrup Chakraborty, CSRU', 0, 'No', NULL, 'NO', 'YES', 'APPROVED', 'NA', NULL, '2023-07-20 11:18:56', NULL, NULL, '2023-07-20 15:50:28', 'Susmita SurKolay'),
(275, 'M.Tech. (CS)', 'CS', 2022, 3, 'aratrik1999@gmail.com', 'Aratrik Chandra', 'CS2206', '', 'Database Management Systems', 'Credit', 'Formative', 'B', 'sasthi@isical.ac.in', 'Sasthi C Ghosh, ACMU', 0, 'No', NULL, 'NO', 'YES', 'APPROVED', 'NA', NULL, '2023-07-20 11:18:56', NULL, NULL, '2023-07-20 15:50:28', 'Susmita SurKolay'),
(276, 'M.Tech. (CS)', 'CS', 2022, 3, 'aratrik1999@gmail.com', 'Aratrik Chandra', 'CS2206', '', 'Design and Analysis of Algorithms', 'Non Credit', 'Compulsory', 'NA', 'arijitiitkgpster@gmail.com', 'Arijit Ghosh, ACMU', 0, 'No', NULL, 'NO', 'YES', 'APPROVED', 'NA', NULL, '2023-07-20 11:18:56', NULL, NULL, '2023-07-20 15:50:28', 'Susmita SurKolay'),
(277, 'M.Tech. (CS)', 'CS', 2022, 3, 'aratrik1999@gmail.com', 'Aratrik Chandra', 'CS2206', '', 'Elements of Algebraic\r\nStructures', 'Credit', 'Formative', 'A', 'utpal@isical.ac.in', 'Utpal Garain, CVPR', 0, 'No', NULL, 'NO', 'YES', 'APPROVED', 'NA', NULL, '2023-07-20 11:18:56', NULL, NULL, '2023-07-20 15:50:28', 'Susmita SurKolay'),
(278, 'M.Tech. (CS)', 'CS', 2022, 3, 'aratrik1999@gmail.com', 'Aratrik Chandra', 'CS2206', '', 'Graph Algorithms', 'Credit', 'Elective', 'NA', 'naqueebwarsi@isical.ac.in', 'Naqeeb Warsi, ECSU', 0, 'No', NULL, 'NO', 'YES', 'APPROVED', 'NA', NULL, '2023-07-20 11:18:56', NULL, NULL, '2023-07-20 15:50:28', 'Susmita SurKolay'),
(279, 'M.Tech. (CS)', 'CS', 2022, 3, 'aratrik1999@gmail.com', 'Aratrik Chandra', 'CS2206', '', 'Image Processing II', 'Non Credit', 'Elective', 'NA', 'malaybhattacharyya@isical.ac.in', 'Malay Bhattacharyya, CSU', 0, 'No', NULL, 'NO', 'YES', 'APPROVED', 'NA', NULL, '2023-07-20 11:18:56', NULL, NULL, '2023-07-20 15:50:28', 'Susmita SurKolay'),
(280, 'M.Tech. (CS)', 'CS', 2022, 3, 'aratrik1999@gmail.com', 'Aratrik Chandra', 'CS2206', '', 'Introduction to Programming', 'Credit', 'Compulsory', 'NA', 'biswajit@isical.ac.in', 'Biswajit Halder, ACMU', 0, 'No', NULL, 'NO', 'YES', 'APPROVED', 'NA', NULL, '2023-07-20 11:18:56', NULL, NULL, '2023-07-20 15:50:28', 'Susmita SurKolay'),
(281, 'M.Tech. (CS)', 'CS', 2022, 3, 'aratrik1999@gmail.com', 'Aratrik Chandra', 'CS2206', '', 'Probability and Stochastic\r\nProcesses', 'Credit', 'Formative', 'A', 'rajat@isical.ac.in', 'Rajat K. De, MIU', 0, 'No', NULL, 'NO', 'YES', 'APPROVED', 'NA', NULL, '2023-07-20 11:18:56', NULL, NULL, '2023-07-20 15:50:28', 'Susmita SurKolay'),
(282, 'M.Tech. (CS)', 'Non-CS', 2022, 3, 'mondalanupam4g@gmail.com', 'Anupam Mondal', 'CS2205', '', 'Database Management Systems', 'Credit', 'Formative', 'B', 'sasthi@isical.ac.in', 'Sasthi C Ghosh, ACMU', 0, 'No', NULL, 'NO', 'YES', 'APPROVED', 'NA', NULL, '2023-07-20 15:29:40', NULL, NULL, '2023-07-20 15:46:19', 'Susmita SurKolay'),
(283, 'M.Tech. (CS)', 'Non-CS', 2022, 3, 'mondalanupam4g@gmail.com', 'Anupam Mondal', 'CS2205', '', 'Design and Analysis of Algorithms', 'Credit', 'Compulsory', 'NA', 'arijitiitkgpster@gmail.com', 'Arijit Ghosh, ACMU', 0, 'No', NULL, 'NO', 'YES', 'APPROVED', 'NA', NULL, '2023-07-20 15:29:40', NULL, NULL, '2023-07-20 15:46:19', 'Susmita SurKolay'),
(284, 'M.Tech. (CS)', 'Non-CS', 2022, 3, 'mondalanupam4g@gmail.com', 'Anupam Mondal', 'CS2205', '', 'Graph Algorithms', 'Non Credit', 'Elective', 'NA', 'naqueebwarsi@isical.ac.in', 'Naqeeb Warsi, ECSU', 0, 'No', NULL, 'NO', 'YES', 'APPROVED', 'NA', NULL, '2023-07-20 15:29:40', NULL, NULL, '2023-07-20 15:46:19', 'Susmita SurKolay'),
(285, 'M.Tech. (CS)', 'Non-CS', 2022, 3, 'mondalanupam4g@gmail.com', 'Anupam Mondal', 'CS2205', '', 'Information Retrieval', 'Credit', 'Elective', 'NA', 'kuntal.isical@gmail.com', 'Kuntal Ghosh, MIU', 0, 'No', NULL, 'NO', 'YES', 'NOT APPROVED', 'NA', NULL, '2023-07-20 15:29:40', NULL, NULL, '2023-07-20 15:46:19', 'Susmita SurKolay');

-- --------------------------------------------------------

--
-- Table structure for table `mentorship`
--

CREATE TABLE `mentorship` (
  `id` int(6) NOT NULL,
  `course` varchar(100) NOT NULL,
  `batch` int(4) NOT NULL,
  `faculty_email` varchar(100) NOT NULL,
  `status` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `mentorship`
--

INSERT INTO `mentorship` (`id`, `course`, `batch`, `faculty_email`, `status`) VALUES
(1, 'M.Tech. (CS)', 2022, 'ssk@isical.ac.in', 'Active'),
(2, 'M.Tech. (CS)', 2022, 'ansuman@isical.ac.in', 'Active'),
(3, 'M.Tech. (CS)', 2022, 'mandar@isical.ac.in', 'Active');

-- --------------------------------------------------------

--
-- Table structure for table `min_subject`
--

CREATE TABLE `min_subject` (
  `id` int(3) NOT NULL,
  `course` varchar(100) NOT NULL,
  `stream` varchar(10) NOT NULL,
  `prev_degree` varchar(20) NOT NULL,
  `compulsory_cnt` int(2) NOT NULL,
  `formative_cnt` int(2) NOT NULL,
  `poola_min` int(2) NOT NULL,
  `poolb_min` int(2) NOT NULL,
  `elective_cnt` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `min_subject`
--

INSERT INTO `min_subject` (`id`, `course`, `stream`, `prev_degree`, `compulsory_cnt`, `formative_cnt`, `poola_min`, `poolb_min`, `elective_cnt`) VALUES
(1, 'M.Tech. (CS)', 'CS', 'NA', 3, 5, 2, 0, 8),
(2, 'M.Tech. (CS)', 'Non-CS', 'Mathematics', 6, 4, 0, 3, 8),
(3, 'M.Tech. (CS)', 'Non-CS', 'Statistics', 6, 4, 0, 3, 8),
(4, 'M.Tech. (CS)', 'Non-CS', 'Others', 6, 4, 2, 1, 8);

-- --------------------------------------------------------

--
-- Table structure for table `mtech_cs`
--

CREATE TABLE `mtech_cs` (
  `id` int(3) NOT NULL,
  `subject_code` varchar(10) DEFAULT NULL,
  `subject_name` varchar(150) NOT NULL,
  `sub_type` varchar(50) NOT NULL,
  `pool` varchar(2) NOT NULL DEFAULT 'NA'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `mtech_cs`
--

INSERT INTO `mtech_cs` (`id`, `subject_code`, `subject_name`, `sub_type`, `pool`) VALUES
(1, '', 'Introduction to Programming', 'Compulsory', 'NA'),
(2, '', 'Design and Analysis of Algorithms', 'Compulsory', 'NA'),
(3, '', 'Discrete Mathematics', 'Compulsory', 'NA'),
(4, '', 'Probability and Stochastic\r\nProcesses', 'Formative', 'A'),
(5, '', 'Statistical Methods', 'Formative', 'A'),
(6, '', 'Linear Algebra', 'Formative', 'A'),
(7, '', 'Elements of Algebraic\r\nStructures', 'Formative', 'A'),
(8, '', 'Data and File Structures', 'Formative', 'B'),
(9, '', 'Automata Theory, Languages and Computation', 'Formative', 'B'),
(10, '', 'Operating Systems', 'Formative', 'B'),
(11, '', 'Database Management Systems', 'Formative', 'B'),
(12, '', 'Compiler Construction', 'Formative', 'B'),
(13, '', 'Computer Networks', 'Formative', 'B'),
(14, '', 'Principles of Programming Languages', 'Formative', 'B'),
(15, '', 'Computing Laboratory', 'Formative', 'B'),
(16, '', 'Computer Architecture', 'Formative', 'B'),
(17, '', 'Advanced Operating Systems', 'Elective', 'NA'),
(18, '', 'Advanced Logic and Automata Theory', 'Elective', 'NA'),
(19, '', 'Algorithms for Big Data', 'Elective', 'NA'),
(20, '', 'Algorithms for Electronic Design Automation', 'Elective', 'NA'),
(21, '', 'Coding Theory', 'Elective', 'NA'),
(22, '', 'Computational Algebra and Number Theory', 'Elective', 'NA'),
(23, '', 'Computational Complexity', 'Elective', 'NA'),
(24, '', 'Computational Finance', 'Elective', 'NA'),
(25, '', 'Computational Game Theory', 'Elective', 'NA'),
(26, '', 'Computational Geometry', 'Elective', 'NA'),
(27, '', 'Computational Molecular Biology and Bioinformatics', 'Elective', 'NA'),
(28, '', 'Computational Topology', 'Elective', 'NA'),
(29, '', 'Computing Systems Security I', 'Elective', 'NA'),
(30, '', 'Computing Systems Security II', 'Elective', 'NA'),
(31, '', 'Computer Graphics', 'Elective', 'NA'),
(32, '', 'Computer Vision', 'Elective', 'NA'),
(33, '', 'Cryptology I', 'Elective', 'NA'),
(34, '', 'Cryptology II', 'Elective', 'NA'),
(35, '', 'Cyber-Physical Systems', 'Elective', 'NA'),
(36, '', 'Digital Signal Processing', 'Elective', 'NA'),
(37, '', 'Discrete and Combinatorial Geometry', 'Elective', 'NA'),
(38, '', 'Distributed Computing', 'Elective', 'NA'),
(39, '', 'Fault Tolerance and Testing', 'Elective', 'NA'),
(40, '', 'Formal Verification of Machine Learning Models', 'Elective', 'NA'),
(41, '', 'Graph Algorithms', 'Elective', 'NA'),
(42, '', 'Image Processing I', 'Elective', 'NA'),
(43, '', 'Image Processing II', 'Elective', 'NA'),
(44, '', 'Information Retrieval', 'Elective', 'NA'),
(45, '', 'Information Theory', 'Elective', 'NA'),
(46, '', 'Introduction to Cognitive Science', 'Elective', 'NA'),
(47, '', 'Learning Theory', 'Elective', 'NA'),
(48, '', 'Logic for Computer Science', 'Elective', 'NA'),
(49, '', 'Machine Learning I', 'Elective', 'NA'),
(50, '', 'Machine Learning II', 'Elective', 'NA'),
(51, '', 'Mobile Computing', 'Elective', 'NA'),
(52, '', 'Natural Language Processing', 'Elective', 'NA'),
(53, '', 'Neural Networks', 'Elective', 'NA'),
(54, '', 'Optimization Techniques', 'Elective', 'NA'),
(55, '', 'Quantum Computation', 'Elective', 'NA'),
(56, '', 'Quantum Information Theory', 'Elective', 'NA'),
(57, '', 'Randomized and Approximation Algorithms', 'Elective', 'NA'),
(58, '', 'Specification and Verification of Programs', 'Elective', 'NA'),
(59, '', 'Statistical Computing', 'Elective', 'NA'),
(60, '', 'Topics in Privacy', 'Elective', 'NA');

-- --------------------------------------------------------

--
-- Table structure for table `mtech_noncs`
--

CREATE TABLE `mtech_noncs` (
  `id` int(3) NOT NULL,
  `subject_code` varchar(10) DEFAULT NULL,
  `subject_name` varchar(150) NOT NULL,
  `sub_type` varchar(50) NOT NULL,
  `pool` varchar(2) NOT NULL DEFAULT 'NA'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `mtech_noncs`
--

INSERT INTO `mtech_noncs` (`id`, `subject_code`, `subject_name`, `sub_type`, `pool`) VALUES
(1, '', 'Introduction to Programming', 'Compulsory', 'NA'),
(2, '', 'Design and Analysis of Algorithms', 'Compulsory', 'NA'),
(3, '', 'Discrete Mathematics', 'Compulsory', 'NA'),
(4, '', 'Probability and Stochastic\r\nProcesses', 'Formative', 'A'),
(5, '', 'Statistical Methods', 'Formative', 'A'),
(6, '', 'Linear Algebra', 'Formative', 'A'),
(7, '', 'Elements of Algebraic\r\nStructures', 'Formative', 'A'),
(8, '', 'Data and File Structures', 'Compulsory', 'NA'),
(9, '', 'Automata Theory, Languages and Computation', 'Formative', 'B'),
(10, '', 'Operating Systems', 'Compulsory', 'NA'),
(11, '', 'Database Management Systems', 'Formative', 'B'),
(12, '', 'Compiler Construction', 'Formative', 'B'),
(13, '', 'Computer Networks', 'Formative', 'B'),
(14, '', 'Principles of Programming Languages', 'Formative', 'B'),
(15, '', 'Computing Laboratory', 'Compulsory', 'NA'),
(16, '', 'Computer Architecture', 'Formative', 'B'),
(17, '', 'Advanced Operating Systems', 'Elective', 'NA'),
(18, '', 'Advanced Logic and Automata Theory', 'Elective', 'NA'),
(19, '', 'Algorithms for Big Data', 'Elective', 'NA'),
(20, '', 'Algorithms for Electronic Design Automation', 'Elective', 'NA'),
(21, '', 'Coding Theory', 'Elective', 'NA'),
(22, '', 'Computational Algebra and Number Theory', 'Elective', 'NA'),
(23, '', 'Computational Complexity', 'Elective', 'NA'),
(24, '', 'Computational Finance', 'Elective', 'NA'),
(25, '', 'Computational Game Theory', 'Elective', 'NA'),
(26, '', 'Computational Geometry', 'Elective', 'NA'),
(27, '', 'Computational Molecular Biology and Bioinformatics', 'Elective', 'NA'),
(28, '', 'Computational Topology', 'Elective', 'NA'),
(29, '', 'Computing Systems Security I', 'Elective', 'NA'),
(30, '', 'Computing Systems Security II', 'Elective', 'NA'),
(31, '', 'Computer Graphics', 'Elective', 'NA'),
(32, '', 'Computer Vision', 'Elective', 'NA'),
(33, '', 'Cryptology I', 'Elective', 'NA'),
(34, '', 'Cryptology II', 'Elective', 'NA'),
(35, '', 'Cyber-Physical Systems', 'Elective', 'NA'),
(36, '', 'Digital Signal Processing', 'Elective', 'NA'),
(37, '', 'Discrete and Combinatorial Geometry', 'Elective', 'NA'),
(38, '', 'Distributed Computing', 'Elective', 'NA'),
(39, '', 'Fault Tolerance and Testing', 'Elective', 'NA'),
(40, '', 'Formal Verification of Machine Learning Models', 'Elective', 'NA'),
(41, '', 'Graph Algorithms', 'Elective', 'NA'),
(42, '', 'Image Processing I', 'Elective', 'NA'),
(43, '', 'Image Processing II', 'Elective', 'NA'),
(44, '', 'Information Retrieval', 'Elective', 'NA'),
(45, '', 'Information Theory', 'Elective', 'NA'),
(46, '', 'Introduction to Cognitive Science', 'Elective', 'NA'),
(47, '', 'Learning Theory', 'Elective', 'NA'),
(48, '', 'Logic for Computer Science', 'Elective', 'NA'),
(49, '', 'Machine Learning I', 'Elective', 'NA'),
(50, '', 'Machine Learning II', 'Elective', 'NA'),
(51, '', 'Mobile Computing', 'Elective', 'NA'),
(52, '', 'Natural Language Processing', 'Elective', 'NA'),
(53, '', 'Neural Networks', 'Elective', 'NA'),
(54, '', 'Optimization Techniques', 'Elective', 'NA'),
(55, '', 'Quantum Computation', 'Elective', 'NA'),
(56, '', 'Quantum Information Theory', 'Elective', 'NA'),
(57, '', 'Randomized and Approximation Algorithms', 'Elective', 'NA'),
(58, '', 'Specification and Verification of Programs', 'Elective', 'NA'),
(59, '', 'Statistical Computing', 'Elective', 'NA'),
(60, '', 'Topics in Privacy', 'Elective', 'NA'),
(61, NULL, 'Computer Organization', 'Formative', 'B');

-- --------------------------------------------------------

--
-- Table structure for table `offered_subject`
--

CREATE TABLE `offered_subject` (
  `ID` int(6) NOT NULL,
  `batch` int(4) NOT NULL DEFAULT 0,
  `course` varchar(150) NOT NULL,
  `stream` varchar(150) NOT NULL,
  `semester` int(1) NOT NULL,
  `subject_code` varchar(10) NOT NULL,
  `subject_name` varchar(150) NOT NULL,
  `subject_type` varchar(20) NOT NULL,
  `pool` varchar(2) NOT NULL,
  `faculty_name` varchar(50) NOT NULL,
  `faculty_email` varchar(50) NOT NULL,
  `faculty_unit` varchar(100) NOT NULL,
  `co_faculties` varchar(200) NOT NULL,
  `updated_on` varchar(25) NOT NULL,
  `freezed` varchar(3) NOT NULL DEFAULT 'NO',
  `freezed_on` varchar(25) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `offered_subject`
--

INSERT INTO `offered_subject` (`ID`, `batch`, `course`, `stream`, `semester`, `subject_code`, `subject_name`, `subject_type`, `pool`, `faculty_name`, `faculty_email`, `faculty_unit`, `co_faculties`, `updated_on`, `freezed`, `freezed_on`) VALUES
(1, 2022, 'M.Tech. (CS)', 'CS', 3, '', 'Introduction to Programming', 'Compulsory', 'NA', 'Biswajit Halder', 'biswajit@isical.ac.in', 'ACMU', '', '2023-07-20 11:09:44', 'NO', NULL),
(2, 2022, 'M.Tech. (CS)', 'CS', 3, '', 'Design and Analysis of Algorithms', 'Compulsory', 'NA', 'Arijit Ghosh', 'arijitiitkgpster@gmail.com', 'ACMU', '', '2023-07-20 11:09:44', 'NO', NULL),
(3, 2022, 'M.Tech. (CS)', 'CS', 3, '', 'Information Retrieval', 'Elective', 'NA', 'Kuntal Ghosh', 'kuntal.isical@gmail.com', 'MIU', '', '2023-07-20 11:09:44', 'NO', NULL),
(4, 2022, 'M.Tech. (CS)', 'CS', 3, '', 'Image Processing II', 'Elective', 'NA', 'Malay Bhattacharyya', 'malaybhattacharyya@isical.ac.in', 'CSU', '', '2023-07-20 11:09:44', 'NO', NULL),
(5, 2022, 'M.Tech. (CS)', 'CS', 3, '', 'Image Processing I', 'Elective', 'NA', 'Partha Sarathi Mukherjee', 'psm@isical.ac.in', 'ISRU', '', '2023-07-20 11:09:44', 'NO', NULL),
(6, 2022, 'M.Tech. (CS)', 'CS', 3, '', 'Graph Algorithms', 'Elective', 'NA', 'Naqeeb Warsi', 'naqueebwarsi@isical.ac.in', 'ECSU', '', '2023-07-20 11:09:44', 'NO', NULL),
(7, 2022, 'M.Tech. (CS)', 'CS', 3, '', 'Elements of Algebraic\r\nStructures', 'Formative', 'A', 'Utpal Garain', 'utpal@isical.ac.in', 'CVPR', '', '2023-07-20 11:09:44', 'NO', NULL),
(8, 2022, 'M.Tech. (CS)', 'CS', 3, '', 'Probability and Stochastic\r\nProcesses', 'Formative', 'A', 'Rajat K. De', 'rajat@isical.ac.in', 'MIU', '', '2023-07-20 11:09:44', 'NO', NULL),
(9, 2022, 'M.Tech. (CS)', 'CS', 3, '', 'Database Management Systems', 'Formative', 'B', 'Sasthi C Ghosh', 'sasthi@isical.ac.in', 'ACMU', '', '2023-07-20 11:09:44', 'NO', NULL),
(10, 2022, 'M.Tech. (CS)', 'CS', 3, '', 'Data and File Structures', 'Formative', 'B', 'Debrup Chakraborty', 'debrup@isical.ac.in', 'CSRU', '', '2023-07-20 11:09:44', 'NO', NULL),
(11, 2022, 'M.Tech. (CS)', 'Non-CS', 3, '', 'Introduction to Programming', 'Compulsory', 'NA', 'Biswajit Halder', 'biswajit@isical.ac.in', 'ACMU', '', '2023-07-20 11:14:18', 'NO', NULL),
(12, 2022, 'M.Tech. (CS)', 'Non-CS', 3, '', 'Data and File Structures', 'Compulsory', 'NA', 'Debrup Chakraborty', 'debrup@isical.ac.in', 'CSRU', '', '2023-07-20 11:14:18', 'NO', NULL),
(13, 2022, 'M.Tech. (CS)', 'Non-CS', 3, '', 'Design and Analysis of Algorithms', 'Compulsory', 'NA', 'Arijit Ghosh', 'arijitiitkgpster@gmail.com', 'ACMU', '', '2023-07-20 11:14:18', 'NO', NULL),
(14, 2022, 'M.Tech. (CS)', 'Non-CS', 3, '', 'Information Retrieval', 'Elective', 'NA', 'Kuntal Ghosh', 'kuntal.isical@gmail.com', 'MIU', '', '2023-07-20 11:14:18', 'NO', NULL),
(15, 2022, 'M.Tech. (CS)', 'Non-CS', 3, '', 'Image Processing II', 'Elective', 'NA', 'Malay Bhattacharyya', 'malaybhattacharyya@isical.ac.in', 'CSU', '', '2023-07-20 11:14:18', 'NO', NULL),
(16, 2022, 'M.Tech. (CS)', 'Non-CS', 3, '', 'Image Processing I', 'Elective', 'NA', 'Partha Sarathi Mukherjee', 'psm@isical.ac.in', 'ISRU', '', '2023-07-20 11:14:18', 'NO', NULL),
(17, 2022, 'M.Tech. (CS)', 'Non-CS', 3, '', 'Graph Algorithms', 'Elective', 'NA', 'Naqeeb Warsi', 'naqueebwarsi@isical.ac.in', 'ECSU', '', '2023-07-20 11:14:18', 'NO', NULL),
(18, 2022, 'M.Tech. (CS)', 'Non-CS', 3, '', 'Probability and Stochastic\r\nProcesses', 'Formative', 'A', 'Rajat K. De', 'rajat@isical.ac.in', 'MIU', '', '2023-07-20 11:14:18', 'NO', NULL),
(19, 2022, 'M.Tech. (CS)', 'Non-CS', 3, '', 'Elements of Algebraic\r\nStructures', 'Formative', 'A', 'Utpal Garain', 'utpal@isical.ac.in', 'CVPR', '', '2023-07-20 11:14:18', 'NO', NULL),
(20, 2022, 'M.Tech. (CS)', 'Non-CS', 3, '', 'Database Management Systems', 'Formative', 'B', 'Sasthi C Ghosh', 'sasthi@isical.ac.in', 'ACMU', '', '2023-07-20 11:14:18', 'NO', NULL),
(26, 2022, 'M.Tech. (CS)', 'CS', 3, '', 'Cyber-Physical Systems', 'Elective', 'NA', 'Sasthi C Ghosh', 'sasthi@isical.ac.in', 'ACMU', '', '2023-07-20 15:26:08', 'NO', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `registration_timetable`
--

CREATE TABLE `registration_timetable` (
  `id` int(6) NOT NULL,
  `course` varchar(100) NOT NULL,
  `batch` int(4) NOT NULL,
  `semester` int(1) NOT NULL,
  `from_date_time` varchar(20) NOT NULL,
  `to_date_time` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `registration_timetable`
--

INSERT INTO `registration_timetable` (`id`, `course`, `batch`, `semester`, `from_date_time`, `to_date_time`) VALUES
(1, 'M.Tech. (CS)', 2022, 3, '19-06-2023 10:00:00', '20-07-2023 23:59:59'),
(2, 'M.Tech. (CS)', 2022, 1, '01-06-2022 10:00:00', '01-2023'),
(3, 'M.Tech. (CS)', 2022, 2, '01-01-2023 10:00:00', '01-2023');

-- --------------------------------------------------------

--
-- Table structure for table `staff`
--

CREATE TABLE `staff` (
  `ID` int(6) UNSIGNED ZEROFILL NOT NULL,
  `email` varchar(50) NOT NULL,
  `mob_no` varchar(10) NOT NULL DEFAULT '0',
  `roll_no` varchar(20) NOT NULL DEFAULT 'DEFAULT',
  `full_name` varchar(150) NOT NULL,
  `designation` varchar(150) DEFAULT NULL,
  `unit` varchar(50) DEFAULT NULL,
  `user_type` varchar(20) NOT NULL,
  `regidtered_on` datetime NOT NULL DEFAULT current_timestamp(),
  `user_status` varchar(20) NOT NULL DEFAULT 'Activated',
  `password` varchar(100) NOT NULL DEFAULT '$2y$10$5BI972XBALyS6ESyQCV8cuQPYfvt89Mk2FXcXu0SnvIiq1Qt.2bAy',
  `activated_on` datetime DEFAULT NULL,
  `activated_by` varchar(50) DEFAULT NULL,
  `email_verified` varchar(3) NOT NULL DEFAULT 'YES'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `staff`
--

INSERT INTO `staff` (`ID`, `email`, `mob_no`, `roll_no`, `full_name`, `designation`, `unit`, `user_type`, `regidtered_on`, `user_status`, `password`, `activated_on`, `activated_by`, `email_verified`) VALUES
(000001, 'molla@isical.ac.in', '1234567890', '1', 'Anisur Rahaman Molla', 'Associate Professor', 'CSRU', 'Faculty', '2023-07-17 15:03:22', 'Activated', '$2y$10$QW4SBNapN3CpZaagBpEqJ.86ar41ZZRpEmCs4WZtQgtN0Fkt6znFC', NULL, NULL, 'YES'),
(000002, 'ansuman@isical.ac.in', '1234567890', '2', 'Ansuman Banerjee', 'Professor', 'ACMU', 'Faculty', '2023-07-17 15:05:18', 'Activated', '$2y$10$QW4SBNapN3CpZaagBpEqJ.86ar41ZZRpEmCs4WZtQgtN0Fkt6znFC', NULL, NULL, 'YES'),
(000003, 'arijit@isical.ac.in', '0', '3', 'Arijit Bishnu', 'Professor', 'ACMU', 'Faculty', '2023-07-17 15:06:03', 'Activated', '$2y$10$QW4SBNapN3CpZaagBpEqJ.86ar41ZZRpEmCs4WZtQgtN0Fkt6znFC', NULL, NULL, 'YES'),
(000004, 'arijitiitkgpster@gmail.com', '0', '4', 'Arijit Ghosh', 'Associate Professor', 'ACMU', 'Faculty', '2023-07-17 15:06:04', 'Activated', '$2y$10$QW4SBNapN3CpZaagBpEqJ.86ar41ZZRpEmCs4WZtQgtN0Fkt6znFC', NULL, NULL, 'YES'),
(000005, 'biswajit@isical.ac.in', '8777062079', '5', 'Biswajit Halder', 'Associate Scientist', 'ACMU', 'Faculty', '2023-07-17 15:06:05', 'Activated', '$2y$10$QW4SBNapN3CpZaagBpEqJ.86ar41ZZRpEmCs4WZtQgtN0Fkt6znFC', NULL, NULL, 'YES'),
(000006, 'debapriyo@isical.ac.in', '0', '6', 'Debapriyo Majumdar', 'Assistant Professor', 'CVPR', 'Faculty', '2023-07-17 15:06:06', 'Activated', '$2y$10$QW4SBNapN3CpZaagBpEqJ.86ar41ZZRpEmCs4WZtQgtN0Fkt6znFC', NULL, NULL, 'YES'),
(000007, 'debrup@isical.ac.in', '0', '7', 'Debrup Chakraborty', 'Associate Professor', 'CSRU', 'Faculty', '2023-07-17 15:06:07', 'Activated', '$2y$10$QW4SBNapN3CpZaagBpEqJ.86ar41ZZRpEmCs4WZtQgtN0Fkt6znFC', NULL, NULL, 'YES'),
(000008, 'diganta@isical.ac.in', '1234567890', '8', 'Diganta Mukherjee', 'Professor', 'SOSU', 'Faculty', '2023-07-17 15:06:08', 'Activated', '$2y$10$QW4SBNapN3CpZaagBpEqJ.86ar41ZZRpEmCs4WZtQgtN0Fkt6znFC', NULL, NULL, 'YES'),
(000009, 'kuntal.isical@gmail.com', '0', '9', 'Kuntal Ghosh', 'Associate Professor', 'MIU', 'Faculty', '2023-07-17 15:06:09', 'Activated', '$2y$10$QW4SBNapN3CpZaagBpEqJ.86ar41ZZRpEmCs4WZtQgtN0Fkt6znFC', NULL, NULL, 'YES'),
(000010, 'malaybhattacharyya@isical.ac.in', '0', '10', 'Malay Bhattacharyya', 'Associate Professor', 'CSU', 'Faculty', '2023-07-17 15:06:10', 'Activated', '$2y$10$QW4SBNapN3CpZaagBpEqJ.86ar41ZZRpEmCs4WZtQgtN0Fkt6znFC', NULL, NULL, 'YES'),
(000011, 'mandar@isical.ac.in', '0', '11', 'Mandar Mitra', 'Professor', 'CVPR', 'Faculty', '2023-07-17 15:06:11', 'Activated', '$2y$10$QW4SBNapN3CpZaagBpEqJ.86ar41ZZRpEmCs4WZtQgtN0Fkt6znFC', NULL, NULL, 'YES'),
(000012, 'naqueebwarsi@isical.ac.in', '0', '12', 'Naqeeb Warsi', 'Assistant Professor', 'ECSU', 'Faculty', '2023-07-17 15:06:12', 'Activated', '$2y$10$QW4SBNapN3CpZaagBpEqJ.86ar41ZZRpEmCs4WZtQgtN0Fkt6znFC', NULL, NULL, 'YES'),
(000013, 'psm@isical.ac.in', '0', '13', 'Partha Sarathi Mukherjee', 'Associate Professor', 'ISRU', 'Faculty', '2023-07-17 15:06:13', 'Activated', '$2y$10$QW4SBNapN3CpZaagBpEqJ.86ar41ZZRpEmCs4WZtQgtN0Fkt6znFC', NULL, NULL, 'YES'),
(000014, 'pmaji@isical.ac.in', '0', '14', 'Pradipta Maji', 'Professor', 'MIU', 'Faculty', '2023-07-17 15:06:14', 'Activated', '$2y$10$QW4SBNapN3CpZaagBpEqJ.86ar41ZZRpEmCs4WZtQgtN0Fkt6znFC', NULL, NULL, 'YES'),
(000015, 'rajat@isical.ac.in', '0', '15', 'Rajat K. De', 'Professor', 'MIU', 'Faculty', '2023-07-17 15:06:15', 'Activated', '$2y$10$QW4SBNapN3CpZaagBpEqJ.86ar41ZZRpEmCs4WZtQgtN0Fkt6znFC', NULL, NULL, 'YES'),
(000016, 'ramij_r@isical.ac.in', '0', '16', 'Ramij Rahaman', 'Assistant Professor', 'PAMU', 'Faculty', '2023-07-17 15:06:16', 'Activated', '$2y$10$QW4SBNapN3CpZaagBpEqJ.86ar41ZZRpEmCs4WZtQgtN0Fkt6znFC', NULL, NULL, 'YES'),
(000017, 'sasanka@isical.ac.in', '0', '17', 'Sasanka Roy', 'Professor', 'ACMU', 'Faculty', '2023-07-17 15:06:17', 'Activated', '$2y$10$QW4SBNapN3CpZaagBpEqJ.86ar41ZZRpEmCs4WZtQgtN0Fkt6znFC', NULL, NULL, 'YES'),
(000018, 'sasthi@isical.ac.in', '0', '18', 'Sasthi C Ghosh', 'Professor', 'ACMU', 'Faculty', '2023-07-17 15:06:18', 'Activated', '$2y$10$QW4SBNapN3CpZaagBpEqJ.86ar41ZZRpEmCs4WZtQgtN0Fkt6znFC', NULL, NULL, 'YES'),
(000019, 'nandysc@isical.ac.in', '0', '19', 'Subhas C. Nandy', 'Professor', 'ACMU', 'Faculty', '2023-07-17 15:06:19', 'Activated', '$2y$10$QW4SBNapN3CpZaagBpEqJ.86ar41ZZRpEmCs4WZtQgtN0Fkt6znFC', NULL, NULL, 'YES'),
(000020, 'sujata@isichennai.res.in', '0', '20', 'Sujata Ghosh', 'Associate Professor', 'CSU', 'Faculty', '2023-07-17 15:06:20', 'Activated', '$2y$10$QW4SBNapN3CpZaagBpEqJ.86ar41ZZRpEmCs4WZtQgtN0Fkt6znFC', NULL, NULL, 'YES'),
(000021, 'sumana@isical.ac.in', '0', '21', 'Sumana Ghosh', 'Assistant Professor', 'ECSU', 'Faculty', '2023-07-17 15:06:21', 'Activated', '$2y$10$QW4SBNapN3CpZaagBpEqJ.86ar41ZZRpEmCs4WZtQgtN0Fkt6znFC', NULL, NULL, 'YES'),
(000022, 'sushmita@isical.ac.in ', '0', '22', 'Sushmita Mitra', 'Professor', 'MIU', 'Faculty', '2023-07-17 15:06:22', 'Activated', '$2y$10$QW4SBNapN3CpZaagBpEqJ.86ar41ZZRpEmCs4WZtQgtN0Fkt6znFC', NULL, NULL, 'YES'),
(000023, 'ssk@isical.ac.in', '1234567890', '23', 'Susmita SurKolay', 'Professor', 'ACMU', 'Faculty', '2023-07-17 15:06:23', 'Activated', '$2y$10$QW4SBNapN3CpZaagBpEqJ.86ar41ZZRpEmCs4WZtQgtN0Fkt6znFC', NULL, NULL, 'YES'),
(000024, 'swagatam.das@isical.ac.in', '0', '24', 'Swagatam Das', 'Professor', 'ECSU', 'Faculty', '2023-07-17 15:06:24', 'Activated', '$2y$10$QW4SBNapN3CpZaagBpEqJ.86ar41ZZRpEmCs4WZtQgtN0Fkt6znFC', NULL, NULL, 'YES'),
(000025, 'utpal@isical.ac.in', '0', '25', 'Utpal Garain', 'Professor', 'CVPR', 'Faculty', '2023-07-17 15:06:25', 'Activated', '$2y$10$QW4SBNapN3CpZaagBpEqJ.86ar41ZZRpEmCs4WZtQgtN0Fkt6znFC', NULL, NULL, 'YES');

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `ID` int(6) UNSIGNED ZEROFILL NOT NULL,
  `email` varchar(50) NOT NULL,
  `mob_no` varchar(10) NOT NULL DEFAULT '0',
  `roll_no` varchar(20) NOT NULL DEFAULT 'DEFAULT',
  `full_name` varchar(150) NOT NULL,
  `designation` varchar(150) DEFAULT NULL,
  `course` varchar(50) DEFAULT NULL,
  `stream` varchar(10) NOT NULL DEFAULT 'None',
  `batch` varchar(4) DEFAULT NULL,
  `prev_degree` varchar(20) NOT NULL,
  `regidtered_on` varchar(50) NOT NULL DEFAULT current_timestamp(),
  `user_status` varchar(20) NOT NULL DEFAULT 'Activated',
  `user_type` varchar(10) NOT NULL DEFAULT 'Student',
  `password` varchar(100) NOT NULL DEFAULT '$2y$10$5BI972XBALyS6ESyQCV8cuQPYfvt89Mk2FXcXu0SnvIiq1Qt.2bAy',
  `activated_on` varchar(50) DEFAULT NULL,
  `activated_by` varchar(50) DEFAULT NULL,
  `email_verified` varchar(3) NOT NULL DEFAULT 'YES'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`ID`, `email`, `mob_no`, `roll_no`, `full_name`, `designation`, `course`, `stream`, `batch`, `prev_degree`, `regidtered_on`, `user_status`, `user_type`, `password`, `activated_on`, `activated_by`, `email_verified`) VALUES
(000001, 'abhishek.bale2000@gmail.com', '1234567890', 'CS2202', 'Abhishek Ravindra Bale', 'NA', 'M.Tech. (CS)', 'CS', '2022', 'NA', 'NA', 'Activated', 'Student', '$2y$10$QW4SBNapN3CpZaagBpEqJ.86ar41ZZRpEmCs4WZtQgtN0Fkt6znFC', 'NA', 'NA', 'YES'),
(000002, 'ankitkr3289@gmail.com', '1234567890', 'CS2203', 'Ankit Kumar', 'NA', 'M.Tech. (CS)', 'Non-CS', '2022', 'Others', 'NA', 'Activated', 'Student', '$2y$10$QW4SBNapN3CpZaagBpEqJ.86ar41ZZRpEmCs4WZtQgtN0Fkt6znFC', 'NA', 'NA', 'YES'),
(000003, 'anupamlada@gmail.com', '1234567890', 'CS2204', 'Anup Mandal', 'NA', 'M.Tech. (CS)', 'Non-CS', '2022', 'Mathematics', 'NA', 'Activated', 'Student', '$2y$10$QW4SBNapN3CpZaagBpEqJ.86ar41ZZRpEmCs4WZtQgtN0Fkt6znFC', 'NA', 'NA', 'YES'),
(000004, 'mondalanupam4g@gmail.com', '1234567890', 'CS2205', 'Anupam Mondal', 'NA', 'M.Tech. (CS)', 'Non-CS', '2022', 'Mathematics', 'NA', 'Activated', 'Student', '$2y$10$QW4SBNapN3CpZaagBpEqJ.86ar41ZZRpEmCs4WZtQgtN0Fkt6znFC', 'NA', 'NA', 'YES'),
(000005, 'aratrik1999@gmail.com', '1234567890', 'CS2206', 'Aratrik Chandra', 'NA', 'M.Tech. (CS)', 'CS', '2022', 'NA', 'NA', 'Activated', 'Student', '$2y$10$QW4SBNapN3CpZaagBpEqJ.86ar41ZZRpEmCs4WZtQgtN0Fkt6znFC', 'NA', 'NA', 'YES'),
(000006, 'ashanak1999@gmail.com', '1234567890', 'CS2207', 'Ashana Kushwaha', 'NA', 'M.Tech. (CS)', 'Non-CS', '2022', 'Others', 'NA', 'Activated', 'Student', '$2y$10$QW4SBNapN3CpZaagBpEqJ.86ar41ZZRpEmCs4WZtQgtN0Fkt6znFC', 'NA', 'NA', 'YES'),
(000007, 'ashishkrc108@gmail.com', '1234567890', 'CS2208', 'Ashish Kumar', 'NA', 'M.Tech. (CS)', 'Non-CS', '2022', 'Mathematics', 'NA', 'Activated', 'Student', '$2y$10$QW4SBNapN3CpZaagBpEqJ.86ar41ZZRpEmCs4WZtQgtN0Fkt6znFC', 'NA', 'NA', 'YES'),
(000008, 'mondalavir02@gmail.com', '1234567890', 'CS2209', 'Avir Mondal', 'NA', 'M.Tech. (CS)', 'Non-CS', '2022', 'Mathematics', 'NA', 'Activated', 'Student', '$2y$10$QW4SBNapN3CpZaagBpEqJ.86ar41ZZRpEmCs4WZtQgtN0Fkt6znFC', 'NA', 'NA', 'YES'),
(000009, 'bhuvandeep23@gmail.com', '1234567890', 'CS2210', 'Bhuvandeep', 'NA', 'M.Tech. (CS)', 'Non-CS', '2022', 'Mathematics', 'NA', 'Activated', 'Student', '$2y$10$QW4SBNapN3CpZaagBpEqJ.86ar41ZZRpEmCs4WZtQgtN0Fkt6znFC', 'NA', 'NA', 'YES'),
(000010, 'nagchandradipa@gmail.com', '1234567890', 'CS2211', 'Chandradipa Nag', 'NA', 'M.Tech. (CS)', 'Non-CS', '2022', 'Others', 'NA', 'Activated', 'Student', '$2y$10$QW4SBNapN3CpZaagBpEqJ.86ar41ZZRpEmCs4WZtQgtN0Fkt6znFC', 'NA', 'NA', 'YES'),
(000011, 'harikishants9899@gmail.com', '1234567890', 'CS2212', 'Harikishan T S', 'NA', 'M.Tech. (CS)', 'Non-CS', '2022', 'Others', 'NA', 'Activated', 'Student', '$2y$10$QW4SBNapN3CpZaagBpEqJ.86ar41ZZRpEmCs4WZtQgtN0Fkt6znFC', 'NA', 'NA', 'YES'),
(000012, '1996harsh.agarwal@gmail.com', '1234567890', 'CS2213', 'Harsh Agarwal', 'NA', 'M.Tech. (CS)', 'Non-CS', '2022', 'Others', 'NA', 'Activated', 'Student', '$2y$10$QW4SBNapN3CpZaagBpEqJ.86ar41ZZRpEmCs4WZtQgtN0Fkt6znFC', 'NA', 'NA', 'YES'),
(000013, 'himanshuyadavhere@gmail.com', '1234567890', 'CS2214', 'Himanshu Yadav', 'NA', 'M.Tech. (CS)', 'Non-CS', '2022', 'Mathematics', 'NA', 'Activated', 'Student', '$2y$10$QW4SBNapN3CpZaagBpEqJ.86ar41ZZRpEmCs4WZtQgtN0Fkt6znFC', 'NA', 'NA', 'YES'),
(000014, 'paulindr06@gmail.com', '1234567890', 'CS2215', 'Indranil Paul', 'NA', 'M.Tech. (CS)', 'CS', '2022', 'NA', 'NA', 'Activated', 'Student', '$2y$10$QW4SBNapN3CpZaagBpEqJ.86ar41ZZRpEmCs4WZtQgtN0Fkt6znFC', 'NA', 'NA', 'YES'),
(000015, 'jatinkrdey@gmail.com', '1234567890', 'CS2216', 'Jatin Kumar Dey', 'NA', 'M.Tech. (CS)', 'Non-CS', '2022', 'Others', 'NA', 'Activated', 'Student', '$2y$10$QW4SBNapN3CpZaagBpEqJ.86ar41ZZRpEmCs4WZtQgtN0Fkt6znFC', 'NA', 'NA', 'YES'),
(000016, 'imteyaz.ahmad@gmail.com', '1234567890', 'CS2217', 'Md Imteyaz Ahmad', 'NA', 'M.Tech. (CS)', 'Non-CS', '2022', 'Others', 'NA', 'Activated', 'Student', '$2y$10$QW4SBNapN3CpZaagBpEqJ.86ar41ZZRpEmCs4WZtQgtN0Fkt6znFC', 'NA', 'NA', 'YES'),
(000017, 'nayangiri49@gmail.com', '1234567890', 'CS2218', 'Nayan Giri', 'NA', 'M.Tech. (CS)', 'Non-CS', '2022', 'Mathematics', 'NA', 'Activated', 'Student', '$2y$10$QW4SBNapN3CpZaagBpEqJ.86ar41ZZRpEmCs4WZtQgtN0Fkt6znFC', 'NA', 'NA', 'YES'),
(000018, 'niladridas943@gmail.com', '1234567890', 'CS2219', 'Niladri Das', 'NA', 'M.Tech. (CS)', 'Non-CS', '2022', 'Mathematics', 'NA', 'Activated', 'Student', '$2y$10$QW4SBNapN3CpZaagBpEqJ.86ar41ZZRpEmCs4WZtQgtN0Fkt6znFC', 'NA', 'NA', 'YES'),
(000019, 'patrickjeeva@gmail.com', '1234567890', 'CS2220', 'Patrick Jeeva A', 'NA', 'M.Tech. (CS)', 'Non-CS', '2022', 'Others', 'NA', 'Activated', 'Student', '$2y$10$QW4SBNapN3CpZaagBpEqJ.86ar41ZZRpEmCs4WZtQgtN0Fkt6znFC', 'NA', 'NA', 'YES'),
(000020, 'ipratapdey@gmail.com', '1234567890', 'CS2221', 'Pratap Dey', 'NA', 'M.Tech. (CS)', 'Non-CS', '2022', 'Mathematics', 'NA', 'Activated', 'Student', '$2y$10$QW4SBNapN3CpZaagBpEqJ.86ar41ZZRpEmCs4WZtQgtN0Fkt6znFC', 'NA', 'NA', 'YES'),
(000021, 'pratyushkumar.iiser@gmail.com', '1234567890', 'CS2222', 'Pratyush Kumar Sahoo', 'NA', 'M.Tech. (CS)', 'Non-CS', '2022', 'Others', 'NA', 'Activated', 'Student', '$2y$10$QW4SBNapN3CpZaagBpEqJ.86ar41ZZRpEmCs4WZtQgtN0Fkt6znFC', 'NA', 'NA', 'YES'),
(000022, 'rahulsingha2009@gmail.com', '1234567890', 'CS2223', 'Rahul Singha', 'NA', 'M.Tech. (CS)', 'CS', '2022', 'NA', 'NA', 'Activated', 'Student', '$2y$10$QW4SBNapN3CpZaagBpEqJ.86ar41ZZRpEmCs4WZtQgtN0Fkt6znFC', 'NA', 'NA', 'YES'),
(000023, 'ritesh222173@outlook.com', '1234567890', 'CS2224', 'Ritesh Kumar Tiwary', 'NA', 'M.Tech. (CS)', 'Non-CS', '2022', 'Mathematics', 'NA', 'Activated', 'Student', '$2y$10$QW4SBNapN3CpZaagBpEqJ.86ar41ZZRpEmCs4WZtQgtN0Fkt6znFC', 'NA', 'NA', 'YES'),
(000024, 'bhowmickshaggy@gmail.com', '1234567890', 'CS2225', 'Sagnik Bhowmick', 'NA', 'M.Tech. (CS)', 'Non-CS', '2022', 'Others', 'NA', 'Activated', 'Student', '$2y$10$QW4SBNapN3CpZaagBpEqJ.86ar41ZZRpEmCs4WZtQgtN0Fkt6znFC', 'NA', 'NA', 'YES'),
(000025, 'sarbajit.dey194@gmail.com', '1234567890', 'CS2226', 'Sarbajit Dey', 'NA', 'M.Tech. (CS)', 'Non-CS', '2022', 'Mathematics', 'NA', 'Activated', 'Student', '$2y$10$QW4SBNapN3CpZaagBpEqJ.86ar41ZZRpEmCs4WZtQgtN0Fkt6znFC', 'NA', 'NA', 'YES'),
(000026, 'sasankaj.Mathematics@gmail.com', '1234567890', 'CS2227', 'Sasanka Jana', 'NA', 'M.Tech. (CS)', 'Non-CS', '2022', 'Mathematics', 'NA', 'Activated', 'Student', '$2y$10$QW4SBNapN3CpZaagBpEqJ.86ar41ZZRpEmCs4WZtQgtN0Fkt6znFC', 'NA', 'NA', 'YES'),
(000027, 'sauravdhara883@gmail.com', '1234567890', 'CS2228', 'Saurav Dhara', 'NA', 'M.Tech. (CS)', 'Non-CS', '2022', 'Mathematics', 'NA', 'Activated', 'Student', '$2y$10$QW4SBNapN3CpZaagBpEqJ.86ar41ZZRpEmCs4WZtQgtN0Fkt6znFC', 'NA', 'NA', 'YES'),
(000028, 'snehatiwari2519@gmail.com', '1234567890', 'CS2229', 'Sneha Tiwari', 'NA', 'M.Tech. (CS)', 'CS', '2022', '', 'NA', 'Activated', 'Student', '$2y$10$QW4SBNapN3CpZaagBpEqJ.86ar41ZZRpEmCs4WZtQgtN0Fkt6znFC', 'NA', 'NA', 'YES'),
(000029, 'soumenmandal712@gmail.com', '1234567890', 'CS2230', 'Soumen Mandal', 'NA', 'M.Tech. (CS)', 'Non-CS', '2022', 'Mathematics', 'NA', 'Activated', 'Student', '$2y$10$QW4SBNapN3CpZaagBpEqJ.86ar41ZZRpEmCs4WZtQgtN0Fkt6znFC', 'NA', 'NA', 'YES'),
(000030, 'soumyadiperikson@gmail.com', '1234567890', 'CS2231', 'Soumyadip Sikdar', 'NA', 'M.Tech. (CS)', 'Non-CS', '2022', 'Others', 'NA', 'Activated', 'Student', '$2y$10$QW4SBNapN3CpZaagBpEqJ.86ar41ZZRpEmCs4WZtQgtN0Fkt6znFC', 'NA', 'NA', 'YES'),
(000031, 'sugatarai1998@gmail.com', '1234567890', 'CS2232', 'Sugata Ghorai', 'NA', 'M.Tech. (CS)', 'Non-CS', '2022', 'Mathematics', 'NA', 'Activated', 'Student', '$2y$10$QW4SBNapN3CpZaagBpEqJ.86ar41ZZRpEmCs4WZtQgtN0Fkt6znFC', 'NA', 'NA', 'YES'),
(000032, 'swastik.mohanty63@gmail.com', '1234567890', 'CS2233', 'Swastik Mohanty', 'NA', 'M.Tech. (CS)', 'CS', '2022', '', 'NA', 'Activated', 'Student', '$2y$10$QW4SBNapN3CpZaagBpEqJ.86ar41ZZRpEmCs4WZtQgtN0Fkt6znFC', 'NA', 'NA', 'YES'),
(000033, 'swn2906@gmail.com', '1234567890', 'CS2234', 'Swastik Nandi', 'NA', 'M.Tech. (CS)', 'CS', '2022', '', 'NA', 'Activated', 'Student', '$2y$10$QW4SBNapN3CpZaagBpEqJ.86ar41ZZRpEmCs4WZtQgtN0Fkt6znFC', 'NA', 'NA', 'YES');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_name`
--

CREATE TABLE `tbl_name` (
  `id` int(3) NOT NULL,
  `course` varchar(100) NOT NULL,
  `stream` varchar(100) NOT NULL,
  `table_name` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_name`
--

INSERT INTO `tbl_name` (`id`, `course`, `stream`, `table_name`) VALUES
(2, 'M.Tech. (CS)', 'CS', 'mtech_cs'),
(1, 'M.Tech. (CS)', 'Non-CS', 'mtech_noncs');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `ID` int(6) UNSIGNED ZEROFILL NOT NULL,
  `email` varchar(50) NOT NULL,
  `mob_no` varchar(10) NOT NULL DEFAULT '0',
  `roll_no` int(5) NOT NULL DEFAULT 0,
  `full_name` varchar(150) NOT NULL,
  `designation` varchar(150) DEFAULT NULL,
  `unit` varchar(50) DEFAULT NULL,
  `user_type` varchar(20) NOT NULL,
  `regidtered_on` datetime NOT NULL DEFAULT current_timestamp(),
  `user_status` varchar(20) NOT NULL DEFAULT 'Activated',
  `password` varchar(100) NOT NULL DEFAULT '$2y$10$5BI972XBALyS6ESyQCV8cuQPYfvt89Mk2FXcXu0SnvIiq1Qt.2bAy',
  `activated_on` datetime DEFAULT NULL,
  `activated_by` varchar(50) DEFAULT NULL,
  `email_verified` varchar(3) NOT NULL DEFAULT 'YES'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`ID`, `email`, `mob_no`, `roll_no`, `full_name`, `designation`, `unit`, `user_type`, `regidtered_on`, `user_status`, `password`, `activated_on`, `activated_by`, `email_verified`) VALUES
(001016, 'biswajit@isical.ac.in', '9007525499', 9626, 'Biswajit Halder', 'Associate Scientist - A', 'ACMU', 'DB-Admin', '2023-07-14 14:53:10', 'Activated', '$2y$10$QW4SBNapN3CpZaagBpEqJ.86ar41ZZRpEmCs4WZtQgtN0Fkt6znFC', NULL, NULL, 'YES');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `active_crs_sem`
--
ALTER TABLE `active_crs_sem`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `auto_population`
--
ALTER TABLE `auto_population`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `grades`
--
ALTER TABLE `grades`
  ADD PRIMARY KEY (`ID`),
  ADD UNIQUE KEY `ID` (`ID`);

--
-- Indexes for table `mentorship`
--
ALTER TABLE `mentorship`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `min_subject`
--
ALTER TABLE `min_subject`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mtech_cs`
--
ALTER TABLE `mtech_cs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mtech_noncs`
--
ALTER TABLE `mtech_noncs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `offered_subject`
--
ALTER TABLE `offered_subject`
  ADD PRIMARY KEY (`ID`),
  ADD UNIQUE KEY `batch` (`batch`,`course`,`stream`,`semester`,`subject_name`);

--
-- Indexes for table `registration_timetable`
--
ALTER TABLE `registration_timetable`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `staff`
--
ALTER TABLE `staff`
  ADD PRIMARY KEY (`ID`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `roll_no` (`roll_no`),
  ADD UNIQUE KEY `email_2` (`email`,`roll_no`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `tbl_name`
--
ALTER TABLE `tbl_name`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `course` (`course`,`stream`,`table_name`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `active_crs_sem`
--
ALTER TABLE `active_crs_sem`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `auto_population`
--
ALTER TABLE `auto_population`
  MODIFY `ID` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `grades`
--
ALTER TABLE `grades`
  MODIFY `ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=286;

--
-- AUTO_INCREMENT for table `mentorship`
--
ALTER TABLE `mentorship`
  MODIFY `id` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `min_subject`
--
ALTER TABLE `min_subject`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `mtech_cs`
--
ALTER TABLE `mtech_cs`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=61;

--
-- AUTO_INCREMENT for table `mtech_noncs`
--
ALTER TABLE `mtech_noncs`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=62;

--
-- AUTO_INCREMENT for table `offered_subject`
--
ALTER TABLE `offered_subject`
  MODIFY `ID` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `registration_timetable`
--
ALTER TABLE `registration_timetable`
  MODIFY `id` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `staff`
--
ALTER TABLE `staff`
  MODIFY `ID` int(6) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1020;

--
-- AUTO_INCREMENT for table `student`
--
ALTER TABLE `student`
  MODIFY `ID` int(6) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1016;

--
-- AUTO_INCREMENT for table `tbl_name`
--
ALTER TABLE `tbl_name`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `ID` int(6) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1017;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
