-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 19, 2023 at 06:50 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `gcms`
--

-- --------------------------------------------------------

--
-- Table structure for table `appointment`
--

CREATE TABLE `appointment` (
  `id` int(11) NOT NULL,
  `stid` varchar(100) NOT NULL,
  `counseling` varchar(100) NOT NULL,
  `fname` varchar(100) NOT NULL,
  `course` varchar(100) NOT NULL,
  `year` varchar(100) NOT NULL,
  `section` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `mode` varchar(100) NOT NULL,
  `purpose` mediumtext NOT NULL,
  `added` date NOT NULL DEFAULT current_timestamp(),
  `status` varchar(100) NOT NULL DEFAULT '0',
  `sched` varchar(100) NOT NULL DEFAULT '-'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `appointment`
--

INSERT INTO `appointment` (`id`, `stid`, `counseling`, `fname`, `course`, `year`, `section`, `email`, `mode`, `purpose`, `added`, `status`, `sched`) VALUES
(2, '1', 'Counseling', 'Ernest Sacdal', 'Bachelor of Science in Information Technology', '3rd Year', '1', 'samplemail@gmail.com', '', '123', '2023-05-01', '0', 'Appointment date: 2023-05-02 \n \n Report: Hi hehehehehe'),
(3, '1', 'Kiss', 'Ernest Sacdal', 'Bachelor of Science in Information Technology', '3rd Year', '1', 'samplemail@gmail.com', '', 'qwe', '2023-05-01', '0', '                        '),
(4, '1', 'Face to face', 'Ernest Sacdal', 'Bachelor of Science in Information Technology', '4th Year', '1', 'samplemail@gmail.com', '', '123', '2023-05-07', '0', ''),
(5, '1', 'Counseling', 'Ernest Sacdal', 'Bachelor of Science in Information Technology', '4th Year', '1', 'samplemail@gmail.com', 'Online', '123', '2023-05-07', '1', 'Appointment date: 2023-05-03'),
(6, '3', 'Counseling', 'Sample Name', 'Bachelor of Physical Education', '2nd Year', '2', 'sacdalernest01@gmail.com', 'Face to face', '123', '2023-05-17', '2', 'qwe                        '),
(7, '3', 'Bad Moral', 'Sample Name', 'Bachelor of Physical Education', '2nd Year', '2', 'sacdalernest01@gmail.com', 'Face to face', 'qwe', '2023-05-17', '1', 'Appointment date: 2023-05-17 \n \n Report: qwe');

-- --------------------------------------------------------

--
-- Table structure for table `campus`
--

CREATE TABLE `campus` (
  `stid` varchar(100) NOT NULL,
  `campus` varchar(100) NOT NULL,
  `college` varchar(100) NOT NULL,
  `course` varchar(100) NOT NULL,
  `major` varchar(100) NOT NULL,
  `stutype` varchar(100) NOT NULL,
  `level` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `campus`
--

INSERT INTO `campus` (`stid`, `campus`, `college`, `course`, `major`, `stutype`, `level`) VALUES
('1', 'Sumacab Main Campus', 'College of Information and Communications Technology', 'Bachelor of Science in Information Technology', 'N/A', 'Continuing(Old)', '3'),
('2', 'General Tinio Street Campus', 'College of Arts and Sciences', 'Bachelor of Physical Education', '123', 'Continuing(Old)', '1'),
('3', 'Sumacab Main Campus', 'College of Architecture', 'Bachelor of Physical Education', 'na', 'Continuing(Old)', '2nd Year');

-- --------------------------------------------------------

--
-- Table structure for table `counhistory`
--

CREATE TABLE `counhistory` (
  `id` int(11) NOT NULL,
  `date` date NOT NULL DEFAULT current_timestamp(),
  `activity` varchar(255) NOT NULL,
  `user` varchar(100) NOT NULL,
  `uname` varchar(100) NOT NULL,
  `time` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `counhistory`
--

INSERT INTO `counhistory` (`id`, `date`, `activity`, `user`, `uname`, `time`) VALUES
(1, '0000-00-00', 'Updated account user information', 'qwee qwe', 'atate', '12:13 pm'),
(2, '2023-05-16', 'Updated account user information', 'qwe qwe', 'atate', '12:15 pm'),
(3, '2023-05-16', 'Logged out', 'qwe qwe', 'atate', '12:19 pm'),
(4, '2023-05-16', 'Rejects document request of student(Student ID: \r\n                                                        May 11, 2023                                                    )', ' ', '', '12:42 pm'),
(5, '2023-05-16', 'Rejects document request of student(Student ID: \r\n                                                        2                                                    )', ' ', '', '12:49 pm'),
(6, '2023-05-16', 'Rejects document request of student(Student ID: \r\n                                                        1                                                    )', ' ', '', '12:51 pm'),
(7, '2023-05-16', 'Rejects document request of student(Student ID: \r\n                                                        1                                                    )', ' ', '', '12:55 pm'),
(8, '2023-05-16', 'Rejects document request of student(Student ID: \r\n                                                        1                                                    )', 'qwe qwe', 'atate', '12:57 pm'),
(9, '2023-05-16', 'Accepts document request of student(Student ID: )', 'qwe qwe', 'atate', '1:48 pm'),
(10, '2023-05-16', 'Accepts document request of student(Student ID: )', 'qwe qwe', 'atate', '1:49 pm'),
(11, '2023-05-16', 'Accepts document request of student(Student ID: )', 'qwe qwe', 'atate', '1:58 pm'),
(12, '2023-05-16', 'Accepts appointment request of student(Student ID: )', 'qwe qwe', 'atate', '1:59 pm'),
(13, '2023-05-16', 'Rejects appointment request of student(Student ID: )', 'qwe qwe', 'atate', '2:00 pm'),
(14, '2023-05-16', 'Rejects routine form request of student(Student ID: 1)', 'qwe qwe', 'atate', '2:28 pm'),
(15, '2023-05-16', 'Rejects routine form request of student(Student ID: 1)', 'qwe qwe', 'atate', '2:29 pm'),
(16, '2023-05-16', 'Accepts routine form request of student(Student ID: 1)', 'qwe qwe', 'atate', '2:29 pm'),
(17, '2023-05-16', 'Accepts a new member for peer organization(Student ID: 1)', ' ', '', '2:36 pm'),
(18, '2023-05-16', 'Rejects Peer membership form of a student (Student ID: 1)', ' ', '', '2:38 pm'),
(19, '2023-05-16', 'Rejects Peer membership form of a student (Student ID: 1)', 'qwe qwe', 'atate', '2:38 pm'),
(20, '2023-05-16', 'Removes a member of Peer Organization (Student ID: \r\n                                                    1                                                )', 'qwe qwe', 'atate', '2:51 pm'),
(21, '2023-05-16', 'Removes a member of Peer Organization (Student ID: \r\n                                                    1                                                )', 'qwe qwe', 'atate', '2:51 pm'),
(22, '2023-05-16', 'Removes a member of Peer Organization (Student ID: \r\n                                                    1                                                )', 'qwe qwe', 'atate', '2:51 pm'),
(23, '2023-05-16', 'Removes a member of Peer Organization (Student ID: \r\n                                                    1                                                )', 'qwe qwe', 'atate', '2:52 pm'),
(24, '2023-05-16', 'Removes a member of Peer Organization (Student ID: \r\n                                                    1                                                )', 'qwe qwe', 'atate', '2:54 pm'),
(25, '2023-05-16', 'Removes a member of Peer Organization (Student ID: \r\n                                                    1                                                )', 'qwe qwe', 'atate', '2:54 pm'),
(26, '2023-05-16', 'Removes a member of Peer Organization (Student ID: \r\n                                                    1                                                )', 'qwe qwe', 'atate', '2:59 pm'),
(27, '2023-05-16', 'Removes a member of Peer Organization (Student ID: \r\n1                                                )', 'qwe qwe', 'atate', '3:05 pm'),
(28, '2023-05-16', 'Removes a member of Peer Organization (Student ID: \r\n1                                                )', 'qwe qwe', 'atate', '3:06 pm'),
(29, '2023-05-16', 'Removes a member of Peer Organization (Student ID: \r\n1                                                )', 'qwe qwe', 'atate', '3:06 pm'),
(30, '2023-05-16', 'Removes a member of Peer Organization (Student ID: \r\n1                                                )', 'qwe qwe', 'atate', '3:06 pm'),
(31, '2023-05-16', 'Removes a member of Peer Organization (Student ID: \r\n1                                                )', 'qwe qwe', 'atate', '3:07 pm'),
(32, '2023-05-16', 'Removes a member of Peer Organization (Student ID: \r\n1                                                )', 'qwe qwe', 'atate', '3:07 pm'),
(33, '2023-05-16', 'Removes a member of Peer Organization (Student ID: 1)', 'qwe qwe', 'atate', '3:07 pm'),
(34, '2023-05-16', 'Removes a member of Peer Organization (Student ID: 1                                                )', 'qwe qwe', 'atate', '3:08 pm'),
(35, '2023-05-16', 'Accepts document request of student(Student ID: )', 'qwe qwe', 'atate', '3:10 pm'),
(36, '2023-05-16', 'Accepts document request of student(Student ID: \r\n                                                        2                                                    )', 'qwe qwe', 'atate', '3:11 pm'),
(37, '2023-05-16', 'Rejects document request of student(Student ID: \r\n                                                        1                                                    )', 'qwe qwe', 'atate', '3:11 pm'),
(38, '2023-05-16', 'Accepts appointment request of student(Student ID: )', 'qwe qwe', 'atate', '3:13 pm'),
(39, '2023-05-16', 'Rejects appointment request of student(Student ID: )', 'qwe qwe', 'atate', '3:13 pm'),
(40, '2023-05-16', 'Rejects appointment request of student(Student ID: 1                                                    )', 'qwe qwe', 'atate', '3:19 pm'),
(41, '2023-05-16', 'Accepts appointment request of student(Student ID: 1                                                    )', 'qwe qwe', 'atate', '3:19 pm'),
(42, '2023-05-16', 'Rejects document request of student(Student ID: \r\n                                                        1                                                    )', 'qwe qwe', 'atate', '4:49 pm'),
(43, '2023-05-16', 'Rejects document request of student(Student ID: \r\n                                                        1                                                    )', 'qwe qwe', 'atate', '4:50 pm'),
(44, '2023-05-16', 'Rejects document request of student(Student ID: \r\n                                                        1                                                    )', 'qwe qwe', 'atate', '4:56 pm'),
(45, '2023-05-16', 'Rejects document request of student(Student ID: \r\n                                                        1                                                    )', 'qwe qwe', 'atate', '4:56 pm'),
(46, '2023-05-16', 'Rejects document request of student(Student ID: 1                                                    )', 'qwe qwe', 'atate', '5:01 pm'),
(47, '2023-05-16', 'Rejects document request of student(Student ID: 1                                                    )', 'qwe qwe', 'atate', '5:02 pm'),
(48, '2023-05-16', 'Rejects document request of student(Student ID: 1                                                    )', 'qwe qwe', 'atate', '5:03 pm'),
(49, '2023-05-16', 'Rejects appointment request of student(Student ID: 1                                                    )', 'qwe qwe', 'atate', '5:09 pm'),
(50, '2023-05-16', 'Accepts appointment request of student(Student ID: 1                                                    )', 'qwe qwe', 'atate', '5:14 pm'),
(51, '2023-05-16', 'Accepts appointment request of student(Student ID: 1                                                    )', 'qwe qwe', 'atate', '5:16 pm'),
(52, '2023-05-16', 'Accepts document request of student(Student ID: 1                                                    )', 'qwe qwe', 'atate', '5:20 pm'),
(53, '2023-05-16', 'Logged out', 'qwe qwe', 'atate', '5:27 pm'),
(54, '2023-05-16', 'Logged out', 'qwe qwe', 'atate', '7:04 pm'),
(55, '2023-05-16', 'Logged out', 'qwe qwe', 'atate', '7:17 pm'),
(56, '2023-05-16', 'Logged out', 'qwe qwe', 'atate', '10:38 pm'),
(57, '2023-05-17', 'Rejects document request of student(Student ID: 1                                                    )', 'qwe qwe', 'atate', '10:49 am'),
(58, '2023-05-17', 'Logged out', 'qwe qwe', 'atate', '10:58 am'),
(59, '2023-05-17', 'Logged out', 'qwe qwe', 'atate', '11:08 am'),
(60, '2023-05-17', 'Rejects routine form request of student(Student ID: 3)', 'qwe qwe', 'atate', '11:20 am'),
(61, '2023-05-17', 'Accepts routine form request of student(Student ID: 3)', 'qwe qwe', 'atate', '11:20 am'),
(62, '2023-05-17', 'Accepts a new member for peer organization(Student ID: 3)', ' ', '', '11:21 am'),
(63, '2023-05-17', 'Rejects document request of student(Student ID: 1                                                    )', 'qwe qwe', 'atate', '11:22 am'),
(64, '2023-05-17', 'Rejects document request of student(Student ID: 3                                                    )', 'qwe qwe', 'atate', '11:23 am'),
(65, '2023-05-17', 'Rejects appointment request of student(Student ID: 3                                                    )', 'qwe qwe', 'atate', '11:23 am'),
(66, '2023-05-17', 'Accepts appointment request of student(Student ID: 3                                                    )', 'qwe qwe', 'atate', '11:24 am'),
(67, '2023-05-17', 'Accepts document request of student(Student ID: 3                                                    )', 'qwe qwe', 'atate', '11:24 am'),
(68, '2023-05-17', 'Logged out', 'qwe qwe', 'atate', '11:29 am'),
(69, '2023-05-17', 'Logged out', 'qwe qwe', 'atate', '8:12 pm');

-- --------------------------------------------------------

--
-- Table structure for table `counselor`
--

CREATE TABLE `counselor` (
  `uname` varchar(100) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `otp` varchar(255) NOT NULL,
  `fname` varchar(100) NOT NULL,
  `lname` varchar(100) NOT NULL,
  `bdate` varchar(100) NOT NULL,
  `contact` varchar(100) NOT NULL,
  `profile_path` varchar(255) NOT NULL,
  `position` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `counselor`
--

INSERT INTO `counselor` (`uname`, `email`, `password`, `otp`, `fname`, `lname`, `bdate`, `contact`, `profile_path`, `position`) VALUES
('atate', 'sacdalernest02@gmail.com', '$2y$10$uNFLNilVlV8vN/c4/UAPaOjKx30WIEqdaac4oKEdfKzXHhA2Ghm4C', '949573', 'qwe', 'qwe', 'qwe', 'qwe', 'profile/2.png', 'qwe');

-- --------------------------------------------------------

--
-- Table structure for table `director`
--

CREATE TABLE `director` (
  `uname` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `otp` varchar(100) NOT NULL,
  `fname` varchar(100) NOT NULL,
  `lname` varchar(100) NOT NULL,
  `bdate` varchar(100) NOT NULL,
  `contact` varchar(100) NOT NULL,
  `profile_path` varchar(255) NOT NULL,
  `position` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `director`
--

INSERT INTO `director` (`uname`, `email`, `password`, `otp`, `fname`, `lname`, `bdate`, `contact`, `profile_path`, `position`) VALUES
('atatedir', 'sacdalernest02@gmail.com', '$2y$10$cx/bSyWUz8jz0PPYBtCvXO1Ei3MrNw0wIigD6czaumpvbcv.WE9Ay', '833310', 'qwee', 'qweee', '2023-05-04', '098678756856', 'profile/3.png', 'eee');

-- --------------------------------------------------------

--
-- Table structure for table `document`
--

CREATE TABLE `document` (
  `id` int(11) NOT NULL,
  `stid` varchar(100) NOT NULL,
  `docu` varchar(255) NOT NULL,
  `fname` varchar(100) NOT NULL,
  `course` varchar(255) NOT NULL,
  `year` varchar(100) NOT NULL,
  `section` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `grad` varchar(100) NOT NULL DEFAULT 'N/A',
  `purpose` mediumtext NOT NULL,
  `added` date NOT NULL DEFAULT current_timestamp(),
  `status` varchar(100) NOT NULL DEFAULT '0',
  `pickup` varchar(100) NOT NULL DEFAULT '-'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `document`
--

INSERT INTO `document` (`id`, `stid`, `docu`, `fname`, `course`, `year`, `section`, `email`, `grad`, `purpose`, `added`, `status`, `pickup`) VALUES
(1, '1', 'Good Moral', 'Ernest Sacdal', 'Bachelor of Science in Information Technology', '3rd Year', '1', 'samplemail@gmail.com', '', 'headache', '2023-05-01', '2', '                        '),
(2, '1', 'Bad Moral', 'Ernest Sacdal', 'Bachelor of Science in Information Technology', '3rd Year', '1', 'samplemail@gmail.com', '', 'lbm', '2023-05-01', '1', 'Pickup date: 2023-05-02 \n \n Report: qwe'),
(3, '1', 'Good Moral', 'Ernest Sacdal', 'Bachelor of Science in Information Technology', '4th Year', '1', 'samplemail@gmail.com', '', '123', '2023-05-07', '2', '                        '),
(4, '1', 'Good Moral', 'Ernest Sacdal', 'Bachelor of Science in Information Technology', '4th Year', '1', 'samplemail@gmail.com', '', 'weq', '2023-05-07', '2', '                        '),
(5, '1', 'Good Moral', 'Ernest Sacdal', 'Bachelor of Science in Information Technology', '4th Year', '1', 'samplemail@gmail.com', 'N/A', '123', '2023-05-07', '2', '                        '),
(6, '2', 'Good Moral', 'Uchiha     Itachi', 'Bachelor of Science in Information Technology', '4th Year', '2', 'samplemail@gmail.com', 'N/A', 'qwe', '2023-05-11', '1', 'Pickup date: 2023-05-11 \n \n Report: asd'),
(7, '2', 'Bad Moral', 'Uchiha     Itachi', 'Bachelor of Science in Information Technology', '4th Year', '2', 'samplemail@gmail.com', 'N/A', 'qwe', '2023-05-11', '1', 'Pickup date: 2023-05-10 \n \n Report: 123'),
(8, '1', 'Good Moral', 'Ernest   Sacdal', 'Bachelor of Science in Information Technology', '4th Year', '1', 'sacdalernest02@gmail.com', 'N/A', 'qwe', '2023-05-17', '2', '                        '),
(9, '1', 'Good Moral', 'Ernest   Sacdal', 'Bachelor of Science in Information Technology', '4th Year', '1', 'sacdalernest02@gmail.com', 'N/A', 'qwe', '2023-05-17', '0', '-'),
(10, '3', 'Good Moral', 'Sample Name', 'Bachelor of Physical Education', '2nd Year', '2', 'sacdalernest01@gmail.com', 'N/A', 'qwe', '2023-05-17', '2', 'qwe'),
(11, '3', 'Good Moral', 'Sample Name', 'Bachelor of Physical Education', '2nd Year', '2', 'sacdalernest01@gmail.com', 'N/A', 'qwe', '2023-05-17', '1', 'Pickup date: 2023-05-18 \n \n Report: qwe');

-- --------------------------------------------------------

--
-- Table structure for table `education`
--

CREATE TABLE `education` (
  `stid` varchar(100) NOT NULL,
  `shs` varchar(100) NOT NULL,
  `strand` varchar(100) NOT NULL,
  `shsGrad` varchar(100) NOT NULL,
  `shsHnr` varchar(100) NOT NULL,
  `jhs` varchar(100) NOT NULL,
  `jhsGrad` varchar(100) NOT NULL,
  `jhsHnr` varchar(100) NOT NULL,
  `elem` varchar(100) NOT NULL,
  `elemGrad` varchar(100) NOT NULL,
  `elemHnr` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `education`
--

INSERT INTO `education` (`stid`, `shs`, `strand`, `shsGrad`, `shsHnr`, `jhs`, `jhsGrad`, `jhsHnr`, `elem`, `elemGrad`, `elemHnr`) VALUES
('1', 'Scihi', 'haha', '2023-03-29', '', 'Scihi', '2023-03-29', 'N/A', 'JMFA', '2023-04-17', '1'),
('2', 'Scihi', 'ABM', '2023-05-04', 'N/A', 'Scihi', '2023-05-19', 'N/A', 'JMFA', '2023-05-22', '1'),
('3', 'Scihi', 'ABM', '2023-05-03', 'N/A', 'Scihi', '2023-05-16', 'N/A', 'JMFA', '2023-05-10', '1');

-- --------------------------------------------------------

--
-- Table structure for table `ei`
--

CREATE TABLE `ei` (
  `stid` varchar(11) NOT NULL,
  `reason` varchar(100) NOT NULL,
  `date` date NOT NULL DEFAULT current_timestamp(),
  `strat` int(1) NOT NULL,
  `quality` int(1) NOT NULL,
  `instruction` int(1) NOT NULL,
  `response` int(1) NOT NULL,
  `acad` int(1) NOT NULL,
  `sched` int(1) NOT NULL,
  `lecture` int(1) NOT NULL,
  `comp` int(1) NOT NULL,
  `multi` int(1) NOT NULL,
  `emp` int(1) NOT NULL,
  `adm` int(1) NOT NULL,
  `medical` int(1) NOT NULL,
  `rules` int(1) NOT NULL,
  `safety` int(1) NOT NULL,
  `scho` int(1) NOT NULL,
  `registrar` int(1) NOT NULL,
  `gc` int(1) NOT NULL,
  `arts` int(1) NOT NULL,
  `gs` int(1) NOT NULL,
  `career` int(1) NOT NULL,
  `faith` int(1) NOT NULL,
  `lib` int(1) NOT NULL,
  `stud` int(1) NOT NULL,
  `sports` int(1) NOT NULL,
  `org` int(1) NOT NULL,
  `pub` int(1) NOT NULL,
  `sci` int(1) NOT NULL,
  `canteen` int(1) NOT NULL,
  `campus` int(1) NOT NULL,
  `cr` int(1) NOT NULL,
  `overall` mediumtext NOT NULL,
  `exp` mediumtext NOT NULL,
  `abi` mediumtext NOT NULL,
  `suggest` mediumtext NOT NULL,
  `admit` int(100) NOT NULL,
  `admitSem` varchar(100) NOT NULL,
  `last` int(100) NOT NULL,
  `lastSem` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `ei`
--

INSERT INTO `ei` (`stid`, `reason`, `date`, `strat`, `quality`, `instruction`, `response`, `acad`, `sched`, `lecture`, `comp`, `multi`, `emp`, `adm`, `medical`, `rules`, `safety`, `scho`, `registrar`, `gc`, `arts`, `gs`, `career`, `faith`, `lib`, `stud`, `sports`, `org`, `pub`, `sci`, `canteen`, `campus`, `cr`, `overall`, `exp`, `abi`, `suggest`, `admit`, `admitSem`, `last`, `lastSem`) VALUES
('1', 'College Graduate', '2023-05-09', 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 'gg', 'gg', 'gg', 'gg', 2018, '1st Sem', 2022, '2nd Sem'),
('3', 'Transfer', '2023-05-17', 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 2, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 'qe', 'qwe', 'qwe', 'qwe', 2000, '2nd Sem', 2001, '1st Sem');

-- --------------------------------------------------------

--
-- Table structure for table `extra`
--

CREATE TABLE `extra` (
  `id` int(11) NOT NULL,
  `stid` varchar(100) NOT NULL,
  `aff` varchar(255) NOT NULL,
  `pos` varchar(255) NOT NULL,
  `period` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `extra`
--

INSERT INTO `extra` (`id`, `stid`, `aff`, `pos`, `period`) VALUES
(1, '1', 'N/A', 'N/A', 'N/A'),
(2, '1', 'N/A', 'N/A', ''),
(3, '2', 'N/A', 'N/A', 'N/A'),
(4, '2', 'N/A', 'N/A', 'N/A'),
(5, '3', 'N/A', 'N/A', 'N/A');

-- --------------------------------------------------------

--
-- Table structure for table `fam`
--

CREATE TABLE `fam` (
  `stid` varchar(100) NOT NULL,
  `sibling` varchar(100) NOT NULL,
  `order` varchar(100) NOT NULL,
  `cond` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `fam`
--

INSERT INTO `fam` (`stid`, `sibling`, `order`, `cond`) VALUES
('1', '3', '1st', 'Very Good'),
('2', '2', 'Middle', 'Good'),
('3', '2', 'Last', 'Good');

-- --------------------------------------------------------

--
-- Table structure for table `father`
--

CREATE TABLE `father` (
  `stid` varchar(100) NOT NULL,
  `father` varchar(100) NOT NULL,
  `educ` varchar(100) NOT NULL,
  `occu` varchar(100) NOT NULL,
  `income` varchar(100) NOT NULL,
  `emp` varchar(100) NOT NULL,
  `workadd` varchar(100) NOT NULL,
  `contact` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `father`
--

INSERT INTO `father` (`stid`, `father`, `educ`, `occu`, `income`, `emp`, `workadd`, `contact`) VALUES
('1', 'Harry Styles', 'College Graduate', 'Singer', '50000', 'Taho', 'Canada', '09123456788'),
('2', 'Harry Styles', 'College Graduate', 'Singer', '10000', 'Taho', '29, Purok 2', '09123456788'),
('3', 'Harry Styles', 'College Graduate', 'Singer', '10000', 'Taho', '29, Purok 2', '09123456788');

-- --------------------------------------------------------

--
-- Table structure for table `history`
--

CREATE TABLE `history` (
  `id` int(11) NOT NULL,
  `date` date NOT NULL DEFAULT current_timestamp(),
  `time` varchar(100) NOT NULL,
  `activity` varchar(255) NOT NULL,
  `user` varchar(200) NOT NULL,
  `stid` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `history`
--

INSERT INTO `history` (`id`, `date`, `time`, `activity`, `user`, `stid`) VALUES
(1, '2023-05-11', '10:15 am', 'Filled out the Campus form', 'Uchiha Itachi', '2'),
(2, '2023-05-11', '11:16 am', 'Filled out the Campus form', 'Uchiha Itachi', '2'),
(3, '2023-05-11', '11:18 am', 'Filled out the Family Background form', 'Uchiha Itachi', '2'),
(4, '2023-05-11', '11:22 am', 'Filled out the Personal Background form', 'Uchiha Itachi', '2'),
(5, '2023-05-11', '11:24 am', 'Filled out the Scholarship/Financial Assistance form', 'Uchiha Itachi', '2'),
(6, '2023-05-11', '11:32 am', 'Filled out the Educational Background form', 'Uchiha Itachi', '2'),
(7, '2023-05-11', '11:37 am', 'Filled out the Involvement in Arts and Sports Form', 'Uchiha Itachi', '2'),
(8, '2023-05-11', '11:42 am', 'Filled out the Training Programs Attended form', 'Uchiha Itachi', '2'),
(9, '2023-05-11', '11:46 am', 'Filled out the Social and Extracurricular Activites form', 'Uchiha Itachi', '2'),
(10, '2023-05-11', '11:50 am', 'Filled out the Social Media Presence form', 'Uchiha Itachi', '2'),
(11, '2023-05-11', '11:55 am', 'Provided all necessary information on the Student Profiling form', 'Uchiha Itachi', '2'),
(12, '2023-05-11', '12:23 pm', 'Requested a document(Good Moral)', 'Uchiha     Itachi', '2'),
(13, '2023-05-11', '12:23 pm', 'Requested a document(Bad Moral)', 'Uchiha     Itachi', '2'),
(14, '2023-05-11', '12:38 pm', 'Updated college information in student profile', 'Uchiha     Itachi', '2'),
(15, '2023-05-11', '12:43 pm', 'Filled out the Family Background form', 'Uchiha     Itachi', '2'),
(16, '2023-05-11', '12:43 pm', 'Provided all necessary information on the Student Profiling form', 'Uchiha     Itachi', '2'),
(17, '2023-05-11', '12:44 pm', 'Updated Family Background information in student profile', 'Uchiha     Itachi', '2'),
(18, '2023-05-11', '12:52 pm', 'Updated Personal Background information in student profile', 'Uchiha     Itachi', '2'),
(19, '2023-05-11', '12:52 pm', 'Updated Personal Background information in student profile', 'Uchiha    Itachi', '2'),
(20, '2023-05-11', '12:53 pm', 'Updated account user information', 'Uchiha Itachi', '2'),
(21, '2023-05-11', '12:53 pm', 'Updated account user information', 'Uchiha  Itachi', '2'),
(22, '2023-05-11', '12:53 pm', 'Updated account user information', 'Uchiha   Itachi', '2'),
(23, '2023-05-11', '12:54 pm', 'Updated account user information', 'Uchiha Itachi', '2'),
(24, '2023-05-11', '1:01 pm', 'Provided all necessary information on the Student Profiling form', 'Uchiha Itachi', '2'),
(25, '2023-05-11', '1:01 pm', 'Updated account user information', 'Uchiha  Itachi', '2'),
(26, '2023-05-11', '1:08 pm', 'Updated Scholarship/Financial information in student profile', 'Uchiha  Itachi', '2'),
(27, '2023-05-11', '1:09 pm', 'Updated Scholarship/Financial information in student profile', 'Uchiha  Itachi', '2'),
(28, '2023-05-11', '1:56 pm', 'Updated Social Media information in student profile', 'Uchiha  Itachi', '2'),
(29, '2023-05-11', '1:56 pm', 'Updated Extracurricicular activities information in student profile', 'Uchiha  Itachi', '2'),
(30, '2023-05-11', '1:56 pm', 'Updated Programs attended information in student profile', 'Uchiha  Itachi', '2'),
(31, '2023-05-11', '1:56 pm', 'Updated Arts and Sports information in student profile', 'Uchiha  Itachi', '2'),
(32, '2023-05-11', '1:57 pm', 'Updated Educational information in student profile', 'Uchiha  Itachi', '2'),
(33, '2023-05-11', '2:01 pm', 'Filled out the Exit Interview form', 'Ernest Sacdal', '1'),
(35, '2023-05-11', '2:58 pm', 'Logged in', 'Ernest Sacdal', '1'),
(36, '2023-05-11', '3:08 pm', 'Logged in', 'Ernest Sacdal', '1'),
(37, '2023-05-11', '3:08 pm', 'Logged in', 'Ernest Sacdal', '1'),
(38, '2023-05-11', '3:08 pm', 'Logged out', 'Ernest Sacdal', '1'),
(39, '2023-05-11', '3:08 pm', 'Logged in', 'Ernest Sacdal', '1'),
(40, '2023-05-12', '6:38 pm', 'Logged in', 'Ernest Sacdal', '1'),
(41, '2023-05-13', '9:12 am', 'Logged in', 'Ernest Sacdal', '1'),
(42, '2023-05-13', '9:51 am', 'Logged in', 'Ernest Sacdal', '1'),
(43, '2023-05-13', '1:58 pm', 'Filled out the Routine Interview form', 'Ernest Sacdal', '1'),
(44, '2023-05-13', '1:58 pm', 'Updated Personal Background information in student profile', 'Ernest Sacdal', '1'),
(45, '2023-05-13', '1:59 pm', 'Logged out', 'Ernest Sacdal', '1'),
(46, '2023-05-13', '1:59 pm', 'Filled out the Personal Background form', 'Uchiha  Itachi', '2'),
(47, '2023-05-13', '1:59 pm', 'Provided all necessary information on the Student Profiling form', 'Uchiha  Itachi', '2'),
(48, '2023-05-13', '2:00 pm', 'Updated Personal Background information in student profile', 'Uchiha  Itachi', '2'),
(49, '2023-05-13', '2:00 pm', 'Updated account user information', 'Uchiha   Itachi', '2'),
(50, '2023-05-13', '2:03 pm', 'Logged out', 'Uchiha   Itachi', '2'),
(51, '2023-05-13', '2:03 pm', 'Logged in', 'Ernest Sacdal', '1'),
(52, '2023-05-13', '2:03 pm', 'Updated account user information', 'Ernest  Sacdal', '1'),
(53, '2023-05-13', '3:29 pm', 'Submitted a request for the routine form', 'Ernest  Sacdal', '1'),
(54, '2023-05-13', '4:29 pm', 'Logged out', 'Ernest  Sacdal', '1'),
(55, '2023-05-13', '4:59 pm', 'Logged in', 'Ernest  Sacdal', '1'),
(56, '2023-05-13', '5:02 pm', 'Submitted a request for the routine form', 'Ernest  Sacdal', '1'),
(57, '2023-05-13', '5:08 pm', 'Filled out the Routine Interview form', 'Ernest  Sacdal', '1'),
(58, '2023-05-13', '5:08 pm', 'Submitted a request for the routine form', 'Ernest  Sacdal', '1'),
(59, '2023-05-13', '5:17 pm', 'Submitted a request for the routine form', 'Ernest  Sacdal', '1'),
(60, '2023-05-13', '5:17 pm', 'Submitted a request for the routine form', 'Ernest  Sacdal', '1'),
(61, '2023-05-14', '4:59 pm', 'Logged in', 'Ernest  Sacdal', '1'),
(62, '2023-05-14', '5:00 pm', 'Filled out the Routine Interview form', 'Ernest  Sacdal', '1'),
(63, '2023-05-14', '6:37 pm', 'Logged out', 'Ernest  Sacdal', '1'),
(64, '2023-05-14', '6:37 pm', 'Logged in', 'Ernest  Sacdal', '1'),
(65, '2023-05-14', '7:36 pm', 'Updated account user information', 'Ernest   Sacdal', '1'),
(66, '2023-05-15', '8:24 am', 'Logged in', 'Ernest   Sacdal', '1'),
(67, '2023-05-15', '8:28 am', 'Logged out', 'Ernest   Sacdal', '1'),
(68, '2023-05-15', '8:43 am', 'Logged in', 'Ernest   Sacdal', '1'),
(69, '2023-05-15', '10:42 am', 'Filled out the Peer Application form', 'Ernest   Sacdal', '1'),
(70, '2023-05-15', '10:43 am', 'Filled out the Peer Application form', 'Ernest   Sacdal', '1'),
(71, '2023-05-15', '11:14 am', 'Submitted a request for the routine form', 'Ernest   Sacdal', '1'),
(72, '2023-05-15', '11:18 am', 'Filled out the Routine Interview form', 'Ernest   Sacdal', '1'),
(73, '2023-05-15', '11:19 am', 'Submitted a request for the routine form', 'Ernest   Sacdal', '1'),
(74, '2023-05-15', '11:20 am', 'Filled out the Routine Interview form', 'Ernest   Sacdal', '1'),
(75, '2023-05-15', '11:20 am', 'Submitted a request for the routine form', 'Ernest   Sacdal', '1'),
(76, '2023-05-15', '1:46 pm', 'Logged out', 'Ernest   Sacdal', '1'),
(77, '2023-05-15', '1:51 pm', 'Logged in', 'Ernest   Sacdal', '1'),
(78, '2023-05-15', '1:55 pm', 'Filled out the Peer Application form', 'Ernest   Sacdal', '1'),
(79, '2023-05-15', '1:57 pm', 'Filled out the Peer Application form', 'Ernest   Sacdal', '1'),
(80, '2023-05-15', '8:18 pm', 'Logged in', 'Ernest   Sacdal', '1'),
(81, '2023-05-15', '8:19 pm', 'Filled out the Routine Interview form', 'Ernest   Sacdal', '1'),
(82, '2023-05-15', '11:33 pm', 'Logged in', 'Ernest   Sacdal', '1'),
(83, '2023-05-15', '11:34 pm', 'Logged out', 'Ernest   Sacdal', '1'),
(84, '2023-05-16', '11:02 pm', 'Logged in', 'Ernest   Sacdal', '1'),
(85, '2023-05-16', '11:50 pm', 'Logged out', 'Ernest   Sacdal', '1'),
(86, '2023-05-17', '7:19 am', 'Logged in', 'Ernest   Sacdal', '1'),
(87, '2023-05-17', '7:55 am', 'Logged out', 'Ernest   Sacdal', '1'),
(88, '2023-05-17', '7:57 am', 'Logged in', 'Ernest   Sacdal', '1'),
(89, '2023-05-17', '7:57 am', 'Logged out', 'Ernest   Sacdal', '1'),
(90, '2023-05-17', '9:08 am', 'Logged in', 'Ernest   Sacdal', '1'),
(91, '2023-05-17', '9:09 am', 'Logged out', 'Ernest   Sacdal', '1'),
(92, '2023-05-17', '9:18 am', 'Logged in', 'Ernest   Sacdal', '1'),
(93, '2023-05-17', '9:18 am', 'Logged out', 'Ernest   Sacdal', '1'),
(94, '2023-05-17', '10:48 am', 'Logged in', 'Ernest   Sacdal', '1'),
(95, '2023-05-17', '10:51 am', 'Requested a document(Good Moral)', 'Ernest   Sacdal', '1'),
(96, '2023-05-17', '10:57 am', 'Logged out', 'Ernest   Sacdal', '1'),
(97, '2023-05-17', '10:58 am', 'Logged in', 'Ernest   Sacdal', '1'),
(98, '2023-05-17', '11:04 am', 'Requested a document(Good Moral)', 'Ernest   Sacdal', '1'),
(99, '2023-05-17', '11:08 am', 'Logged out', 'Ernest   Sacdal', '1'),
(100, '2023-05-17', '11:09 am', 'Filled out the College form', 'Sample Name', '3'),
(101, '2023-05-17', '11:10 am', 'Filled out the Personal Background form', 'Sample Name', '3'),
(102, '2023-05-17', '11:10 am', 'Filled out the Family Background form', 'Sample Name', '3'),
(103, '2023-05-17', '11:16 am', 'Filled out the Scholarship/Financial Assistance form', 'Sample Name', '3'),
(104, '2023-05-17', '11:17 am', 'Filled out the Educational Background form', 'Sample Name', '3'),
(105, '2023-05-17', '11:17 am', 'Filled out the Involvement in Arts and Sports form', 'Sample Name', '3'),
(106, '2023-05-17', '11:17 am', 'Filled out the Training Programs Attended form', 'Sample Name', '3'),
(107, '2023-05-17', '11:17 am', 'Filled out the Training Programs Attended form', 'Sample Name', '3'),
(108, '2023-05-17', '11:18 am', 'Filled out the Social and Extracurricular Activites form', 'Sample Name', '3'),
(109, '2023-05-17', '11:18 am', 'Filled out the Social Media Presence form', 'Sample Name', '3'),
(110, '2023-05-17', '11:18 am', 'Provided all necessary information on the Student Profiling form', 'Sample Name', '3'),
(111, '2023-05-17', '11:18 am', 'Logged out', 'Sample Name', '3'),
(112, '2023-05-17', '11:18 am', 'Logged in', 'Sample Name', '3'),
(113, '2023-05-17', '11:19 am', 'Submitted a request for the routine form', 'Sample Name', '3'),
(114, '2023-05-17', '11:20 am', 'Submitted a request for the routine form', 'Sample Name', '3'),
(115, '2023-05-17', '11:20 am', 'Filled out the Routine Interview form', 'Sample Name', '3'),
(116, '2023-05-17', '11:21 am', 'Filled out the Peer Application form', 'Sample Name', '3'),
(117, '2023-05-17', '11:22 am', 'Requested a document(Good Moral)', 'Sample Name', '3'),
(118, '2023-05-17', '11:22 am', 'Requested an Appointment', 'Sample Name', '3'),
(119, '2023-05-17', '11:24 am', 'Requested a document(Good Moral)', 'Sample Name', '3'),
(120, '2023-05-17', '11:24 am', 'Requested an Appointment', 'Sample Name', '3'),
(121, '2023-05-17', '11:26 am', 'Updated account user information', 'Samplee Namee', '3'),
(122, '2023-05-17', '11:27 am', 'Updated account user information', 'Samplee  Namee', '3'),
(123, '2023-05-17', '11:28 am', 'Filled out the Exit Interview form', 'Samplee  Namee', '3'),
(124, '2023-05-17', '11:28 am', 'Filled out the Exit Interview form', 'Samplee  Namee', '3'),
(125, '2023-05-17', '7:52 pm', 'Logged in', 'Ernest   Sacdal', '1'),
(126, '2023-05-17', '7:53 pm', 'Logged out', 'Ernest   Sacdal', '1'),
(127, '2023-05-17', '8:19 pm', 'Logged in', 'Ernest   Sacdal', '1'),
(128, '2023-05-17', '8:20 pm', 'Logged out', 'Ernest   Sacdal', '1');

-- --------------------------------------------------------

--
-- Table structure for table `mother`
--

CREATE TABLE `mother` (
  `stid` varchar(100) NOT NULL,
  `mother` varchar(100) NOT NULL,
  `educ` varchar(100) NOT NULL,
  `occu` varchar(100) NOT NULL,
  `income` varchar(100) NOT NULL,
  `emp` varchar(100) NOT NULL,
  `workadd` varchar(100) NOT NULL,
  `contact` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `mother`
--

INSERT INTO `mother` (`stid`, `mother`, `educ`, `occu`, `income`, `emp`, `workadd`, `contact`) VALUES
('1', 'Taylor Swift', 'College Graduate', 'Singer', '60000', 'Taho', 'Canada', '09123456788'),
('2', 'Taylor Swift', 'College Graduate', 'Singer', '10000', 'Taho', 'as', '09123456788'),
('3', 'Taylor Swift', 'College Graduate', 'Singer', '10000', 'Taho', 'qwe', '09123456788');

-- --------------------------------------------------------

--
-- Table structure for table `peer`
--

CREATE TABLE `peer` (
  `stid` varchar(100) NOT NULL,
  `date` date NOT NULL DEFAULT current_timestamp(),
  `training` mediumtext NOT NULL,
  `faci` mediumtext NOT NULL,
  `status` varchar(100) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `peer`
--

INSERT INTO `peer` (`stid`, `date`, `training`, `faci`, `status`) VALUES
('1', '2023-05-16', 'qwe', 'qwe', '1'),
('3', '2023-05-17', 'qwe', 'qwe', '1');

-- --------------------------------------------------------

--
-- Table structure for table `personal`
--

CREATE TABLE `personal` (
  `stid` varchar(100) NOT NULL,
  `address` varchar(100) NOT NULL,
  `contact` varchar(100) NOT NULL,
  `birth` varchar(100) NOT NULL,
  `sex` varchar(100) NOT NULL,
  `civil` varchar(100) NOT NULL,
  `citizen` varchar(100) NOT NULL,
  `height` varchar(100) NOT NULL,
  `weight` varchar(100) NOT NULL,
  `religion` varchar(100) NOT NULL,
  `blood` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `personal`
--

INSERT INTO `personal` (`stid`, `address`, `contact`, `birth`, `sex`, `civil`, `citizen`, `height`, `weight`, `religion`, `blood`) VALUES
('1', 'Pula Cabanatuan City', '09912339914', '2023-05-03', 'Others', 'Married', 'Filipino', '64', '60', 'INC', 'AB-'),
('2', '', '09912339914', '2023-05-10', 'Others', 'Married', 'Filipino', '64', '60', 'INC', 'AB-'),
('3', 'Pula Cabanatuan City', '09912339914', '2023-05-12', 'Others', 'Married', 'Filipino', '64', '60', 'INC', 'AB-');

-- --------------------------------------------------------

--
-- Table structure for table `routine`
--

CREATE TABLE `routine` (
  `id` int(11) NOT NULL,
  `stid` varchar(100) NOT NULL,
  `date` date NOT NULL DEFAULT current_timestamp(),
  `parents` mediumtext NOT NULL,
  `siblings` mediumtext NOT NULL,
  `relatives` mediumtext NOT NULL,
  `family` mediumtext NOT NULL,
  `perf` mediumtext NOT NULL,
  `classmates` mediumtext NOT NULL,
  `teachers` mediumtext NOT NULL,
  `staff` mediumtext NOT NULL,
  `org` mediumtext NOT NULL,
  `services` mediumtext NOT NULL,
  `friends` mediumtext NOT NULL,
  `romantic` mediumtext NOT NULL,
  `self` mediumtext NOT NULL,
  `belief` mediumtext NOT NULL,
  `exp` mediumtext NOT NULL,
  `skills` mediumtext NOT NULL,
  `other` mediumtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `routine`
--

INSERT INTO `routine` (`id`, `stid`, `date`, `parents`, `siblings`, `relatives`, `family`, `perf`, `classmates`, `teachers`, `staff`, `org`, `services`, `friends`, `romantic`, `self`, `belief`, `exp`, `skills`, `other`) VALUES
(4, '1', '2023-05-15', 'qwe', 'qwe', 'qwe', 'qwe', 'qwe', 'qwe', 'qwe', 'qwe', 'qwe', 'qwe', 'qwe', 'qwe', 'qwe', 'qwe', 'qwe', 'qwe', 'qwe'),
(9, '2', '2023-05-15', '123', '123', '123', '123', '123', '123', '123', '123', '12', '3123', '123', '123', '123', '123', '123', '123', '123'),
(10, '3', '2023-05-17', 'qwe', 'qwe', 'qwe', 'qwe', 'qwe', 'qwe', 'qe', 'qwe', 'qwe', 'qwe', 'qwe', 'qwe', 'qwe', 'qwe', 'qwe', 'qwe', 'wqe');

-- --------------------------------------------------------

--
-- Table structure for table `routine_req`
--

CREATE TABLE `routine_req` (
  `id` int(11) NOT NULL,
  `stid` varchar(100) NOT NULL,
  `date` date NOT NULL DEFAULT current_timestamp(),
  `status` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `routine_req`
--

INSERT INTO `routine_req` (`id`, `stid`, `date`, `status`) VALUES
(1, '1', '2023-05-13', 1),
(2, '1', '2023-05-13', 1),
(3, '1', '2023-05-13', 1),
(4, '1', '2023-05-13', 2),
(5, '1', '2023-05-13', 1),
(6, '1', '2023-05-15', 1),
(7, '1', '2023-05-15', 1),
(8, '1', '2023-05-15', 2),
(9, '3', '2023-05-17', 2),
(10, '3', '2023-05-17', 1);

-- --------------------------------------------------------

--
-- Table structure for table `scholarship`
--

CREATE TABLE `scholarship` (
  `stid` varchar(100) NOT NULL,
  `assist` varchar(100) NOT NULL,
  `grantee` varchar(100) NOT NULL,
  `working` varchar(100) NOT NULL,
  `dependent` varchar(100) NOT NULL,
  `solo` varchar(100) NOT NULL,
  `pwd` varchar(100) NOT NULL,
  `indeg` varchar(100) NOT NULL,
  `depID` varchar(100) NOT NULL,
  `soloID` varchar(100) NOT NULL,
  `pwdID` varchar(100) NOT NULL,
  `indID` varchar(100) NOT NULL,
  `other` varchar(255) NOT NULL DEFAULT 'qwe'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `scholarship`
--

INSERT INTO `scholarship` (`stid`, `assist`, `grantee`, `working`, `dependent`, `solo`, `pwd`, `indeg`, `depID`, `soloID`, `pwdID`, `indID`, `other`) VALUES
('1', '4Ps', 'StuFAP', 'Yes', 'Yes - ID Number: ', 'Yes - ID Number: ', 'Yes - ID Number: ', 'Yes - Group name: ', '123', '1234', '12345', 'Igorot', ''),
('2', 'Listahan 2.0', 'ESGP-PA', 'Yes', 'No', 'No', 'No', 'No', '', '', '', '', ''),
('3', 'Listahan 2.0', 'ESGP-PA', 'Yes', 'No', 'No', 'No', 'No', '', '', '', '', 'N/A');

-- --------------------------------------------------------

--
-- Table structure for table `signature`
--

CREATE TABLE `signature` (
  `id` int(11) NOT NULL,
  `stid` varchar(100) NOT NULL,
  `added` date NOT NULL DEFAULT current_timestamp(),
  `file` varchar(100) NOT NULL,
  `type` varchar(100) NOT NULL,
  `purpose` mediumtext NOT NULL,
  `status` varchar(100) NOT NULL DEFAULT '0',
  `size` varchar(255) NOT NULL,
  `report` varchar(255) NOT NULL DEFAULT '-'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `signature`
--

INSERT INTO `signature` (`id`, `stid`, `added`, `file`, `type`, `purpose`, `status`, `size`, `report`) VALUES
(1, '1', '2023-05-16', '6463a509383e1.pdf', 'excel', '123', '1', '635946', 'Pickup date: 2023-05-10 \n \n Report: qwe'),
(2, '3', '2023-05-17', '64644a9e3b2a1.docx', 'excel', 'qwe', '1', '15559', 'Pickup date: 2023-05-18 \n \n Report: qwe');

-- --------------------------------------------------------

--
-- Table structure for table `skills`
--

CREATE TABLE `skills` (
  `id` int(11) NOT NULL,
  `stid` varchar(100) NOT NULL,
  `skill` varchar(255) NOT NULL,
  `hob` varchar(255) NOT NULL,
  `recog` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `skills`
--

INSERT INTO `skills` (`id`, `stid`, `skill`, `hob`, `recog`) VALUES
(1, '1', 'N/A', 'N/A', 'N/A'),
(6, '1', 'N/A', 'N/A', 'N/A'),
(7, '1', 'N/A', 'N/A', 'N/Aaa'),
(8, '2', 'N/A', 'N/A', 'N/A'),
(9, '2', 'N/A', 'N/A', 'N/A'),
(10, '3', 'N/A', 'N/A', 'N/A');

-- --------------------------------------------------------

--
-- Table structure for table `social`
--

CREATE TABLE `social` (
  `stid` varchar(100) NOT NULL,
  `fb` varchar(255) NOT NULL,
  `twt` varchar(255) NOT NULL,
  `ig` varchar(255) NOT NULL,
  `yt` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `social`
--

INSERT INTO `social` (`stid`, `fb`, `twt`, `ig`, `yt`) VALUES
('1', 'N/A', 'N/A', 'N/A', 'N/Aaa'),
('2', 'N/A', 'N/A', 'N/A', 'N/A'),
('3', 'N/A', 'N/A', 'N/A', 'N/A');

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `stid` varchar(100) NOT NULL,
  `email` varchar(60) NOT NULL,
  `fname` varchar(20) NOT NULL,
  `lname` varchar(20) NOT NULL,
  `course` varchar(255) NOT NULL,
  `section` varchar(100) NOT NULL,
  `year` varchar(10) NOT NULL,
  `date` date NOT NULL DEFAULT current_timestamp(),
  `passw` varchar(255) NOT NULL,
  `profile_path` varchar(255) NOT NULL,
  `statusA` varchar(6) NOT NULL DEFAULT '0',
  `statusB` varchar(10) NOT NULL DEFAULT '0',
  `statusC` int(100) NOT NULL DEFAULT 0,
  `statusD` int(100) NOT NULL DEFAULT 0,
  `statusE` int(100) NOT NULL DEFAULT 0,
  `statusF` int(100) NOT NULL DEFAULT 0,
  `statusG` varchar(100) NOT NULL DEFAULT '0',
  `statusH` varchar(100) NOT NULL DEFAULT '0',
  `statusI` varchar(100) NOT NULL DEFAULT '0',
  `statusJ` varchar(10) NOT NULL DEFAULT '0',
  `statusK` int(11) NOT NULL DEFAULT 0,
  `statusL` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`stid`, `email`, `fname`, `lname`, `course`, `section`, `year`, `date`, `passw`, `profile_path`, `statusA`, `statusB`, `statusC`, `statusD`, `statusE`, `statusF`, `statusG`, `statusH`, `statusI`, `statusJ`, `statusK`, `statusL`) VALUES
('1', 'sacdalernest02@gmail.com', 'Ernest  ', 'Sacdal', 'Bachelor of Science in Information Technology', '1', '4th Year', '2023-04-28', '$2y$10$zIQAET/K4orKiDIdlIYnfeKl0442141xdS/iZ9Hj1x3ivY6DMUfim', 'profile/3.png', '1', '1', 1, 1, 1, 1, '1', '1', '1', '0', 1, 0),
('2', 'ersa.sacdal.au@phinmaed.com', 'Uchiha  ', 'Itachi', 'Bachelor of Science in Information Technology', '3', '4th Year', '2023-05-01', '$2y$10$3kPq/dRXb9hrJZEipTG0o.Y5finkzAhp9AmbIhfTM5GCdTcgpeN6C', '', '1', '1', 1, 1, 1, 1, '1', '1', '1', '0', 1, 0),
('3', 'sacdalernest01@gmail.com', 'Samplee ', 'Namee', 'Bachelor of Physical Education', '2', '4th Year', '2023-05-17', '$2y$10$vBM0FgmLikbHtRBblZ3jNu6apYvcQjiucWTvHmJBXxRuSEGEWPBM6', 'profile/1.png', '1', '1', 1, 1, 1, 1, '1', '1', '1', '0', 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `training`
--

CREATE TABLE `training` (
  `id` int(11) NOT NULL,
  `stid` varchar(100) NOT NULL,
  `seminar` varchar(255) NOT NULL,
  `date` varchar(255) NOT NULL,
  `agency` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `training`
--

INSERT INTO `training` (`id`, `stid`, `seminar`, `date`, `agency`) VALUES
(1, '1', 'Na', '2023-03-30', 'na'),
(2, '1', 'Na', '2023-04-05', 'na'),
(3, '2', 'Na', '2023-05-09', 'na'),
(4, '2', 'Na', '2023-05-06', 'na'),
(5, '3', 'Na', '2023-05-10', 'na'),
(6, '3', 'Na', '2023-05-11', 'na');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `appointment`
--
ALTER TABLE `appointment`
  ADD PRIMARY KEY (`id`),
  ADD KEY `stid` (`stid`);

--
-- Indexes for table `campus`
--
ALTER TABLE `campus`
  ADD PRIMARY KEY (`stid`),
  ADD KEY `stid` (`stid`);

--
-- Indexes for table `counhistory`
--
ALTER TABLE `counhistory`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `counselor`
--
ALTER TABLE `counselor`
  ADD PRIMARY KEY (`uname`);

--
-- Indexes for table `director`
--
ALTER TABLE `director`
  ADD PRIMARY KEY (`uname`);

--
-- Indexes for table `document`
--
ALTER TABLE `document`
  ADD PRIMARY KEY (`id`),
  ADD KEY `stid` (`stid`);

--
-- Indexes for table `education`
--
ALTER TABLE `education`
  ADD PRIMARY KEY (`stid`),
  ADD KEY `stid` (`stid`);

--
-- Indexes for table `ei`
--
ALTER TABLE `ei`
  ADD PRIMARY KEY (`stid`),
  ADD KEY `stid` (`stid`);

--
-- Indexes for table `extra`
--
ALTER TABLE `extra`
  ADD PRIMARY KEY (`id`),
  ADD KEY `stid` (`stid`);

--
-- Indexes for table `fam`
--
ALTER TABLE `fam`
  ADD PRIMARY KEY (`stid`),
  ADD KEY `stid` (`stid`);

--
-- Indexes for table `father`
--
ALTER TABLE `father`
  ADD PRIMARY KEY (`stid`),
  ADD KEY `stid` (`stid`);

--
-- Indexes for table `history`
--
ALTER TABLE `history`
  ADD PRIMARY KEY (`id`),
  ADD KEY `stid` (`stid`);

--
-- Indexes for table `mother`
--
ALTER TABLE `mother`
  ADD PRIMARY KEY (`stid`),
  ADD KEY `stid` (`stid`);

--
-- Indexes for table `peer`
--
ALTER TABLE `peer`
  ADD PRIMARY KEY (`stid`),
  ADD KEY `stid` (`stid`);

--
-- Indexes for table `personal`
--
ALTER TABLE `personal`
  ADD PRIMARY KEY (`stid`),
  ADD KEY `stid` (`stid`);

--
-- Indexes for table `routine`
--
ALTER TABLE `routine`
  ADD PRIMARY KEY (`id`),
  ADD KEY `stid` (`stid`);

--
-- Indexes for table `routine_req`
--
ALTER TABLE `routine_req`
  ADD PRIMARY KEY (`id`),
  ADD KEY `stid` (`stid`);

--
-- Indexes for table `scholarship`
--
ALTER TABLE `scholarship`
  ADD PRIMARY KEY (`stid`),
  ADD KEY `stid` (`stid`);

--
-- Indexes for table `signature`
--
ALTER TABLE `signature`
  ADD PRIMARY KEY (`id`),
  ADD KEY `stid` (`stid`);

--
-- Indexes for table `skills`
--
ALTER TABLE `skills`
  ADD PRIMARY KEY (`id`),
  ADD KEY `stid` (`stid`);

--
-- Indexes for table `social`
--
ALTER TABLE `social`
  ADD PRIMARY KEY (`stid`),
  ADD KEY `stid` (`stid`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`stid`);

--
-- Indexes for table `training`
--
ALTER TABLE `training`
  ADD PRIMARY KEY (`id`),
  ADD KEY `stid` (`stid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `appointment`
--
ALTER TABLE `appointment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `counhistory`
--
ALTER TABLE `counhistory`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=70;

--
-- AUTO_INCREMENT for table `document`
--
ALTER TABLE `document`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `extra`
--
ALTER TABLE `extra`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `history`
--
ALTER TABLE `history`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=129;

--
-- AUTO_INCREMENT for table `routine`
--
ALTER TABLE `routine`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `routine_req`
--
ALTER TABLE `routine_req`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `signature`
--
ALTER TABLE `signature`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `skills`
--
ALTER TABLE `skills`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `training`
--
ALTER TABLE `training`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `appointment`
--
ALTER TABLE `appointment`
  ADD CONSTRAINT `appointment_ibfk_1` FOREIGN KEY (`stid`) REFERENCES `student` (`stid`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `campus`
--
ALTER TABLE `campus`
  ADD CONSTRAINT `campus_ibfk_1` FOREIGN KEY (`stid`) REFERENCES `student` (`stid`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `document`
--
ALTER TABLE `document`
  ADD CONSTRAINT `document_ibfk_1` FOREIGN KEY (`stid`) REFERENCES `student` (`stid`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `education`
--
ALTER TABLE `education`
  ADD CONSTRAINT `education_ibfk_1` FOREIGN KEY (`stid`) REFERENCES `student` (`stid`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `ei`
--
ALTER TABLE `ei`
  ADD CONSTRAINT `ei_ibfk_1` FOREIGN KEY (`stid`) REFERENCES `student` (`stid`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `extra`
--
ALTER TABLE `extra`
  ADD CONSTRAINT `extra_ibfk_1` FOREIGN KEY (`stid`) REFERENCES `student` (`stid`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `fam`
--
ALTER TABLE `fam`
  ADD CONSTRAINT `fam_ibfk_1` FOREIGN KEY (`stid`) REFERENCES `student` (`stid`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `father`
--
ALTER TABLE `father`
  ADD CONSTRAINT `father_ibfk_1` FOREIGN KEY (`stid`) REFERENCES `student` (`stid`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `history`
--
ALTER TABLE `history`
  ADD CONSTRAINT `history_ibfk_1` FOREIGN KEY (`stid`) REFERENCES `student` (`stid`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `mother`
--
ALTER TABLE `mother`
  ADD CONSTRAINT `mother_ibfk_1` FOREIGN KEY (`stid`) REFERENCES `student` (`stid`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `peer`
--
ALTER TABLE `peer`
  ADD CONSTRAINT `peer_ibfk_1` FOREIGN KEY (`stid`) REFERENCES `student` (`stid`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `personal`
--
ALTER TABLE `personal`
  ADD CONSTRAINT `personal_ibfk_1` FOREIGN KEY (`stid`) REFERENCES `student` (`stid`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `routine`
--
ALTER TABLE `routine`
  ADD CONSTRAINT `routine_ibfk_1` FOREIGN KEY (`stid`) REFERENCES `student` (`stid`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `routine_req`
--
ALTER TABLE `routine_req`
  ADD CONSTRAINT `routine_req_ibfk_1` FOREIGN KEY (`stid`) REFERENCES `student` (`stid`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `scholarship`
--
ALTER TABLE `scholarship`
  ADD CONSTRAINT `scholarship_ibfk_1` FOREIGN KEY (`stid`) REFERENCES `student` (`stid`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `signature`
--
ALTER TABLE `signature`
  ADD CONSTRAINT `signature_ibfk_1` FOREIGN KEY (`stid`) REFERENCES `student` (`stid`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `skills`
--
ALTER TABLE `skills`
  ADD CONSTRAINT `skills_ibfk_1` FOREIGN KEY (`stid`) REFERENCES `student` (`stid`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `social`
--
ALTER TABLE `social`
  ADD CONSTRAINT `social_ibfk_1` FOREIGN KEY (`stid`) REFERENCES `student` (`stid`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `training`
--
ALTER TABLE `training`
  ADD CONSTRAINT `training_ibfk_1` FOREIGN KEY (`stid`) REFERENCES `student` (`stid`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
