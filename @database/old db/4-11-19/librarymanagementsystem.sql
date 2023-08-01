-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 04, 2019 at 11:05 AM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 7.3.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `librarymanagementsystem`
--

-- --------------------------------------------------------

--
-- Table structure for table `lmsbooks`
--

CREATE TABLE `lmsbooks` (
  `book_image` varchar(255) NOT NULL,
  `book_code` int(10) NOT NULL,
  `book_name` text NOT NULL,
  `book_stored` int(5) NOT NULL,
  `book_total` int(5) NOT NULL,
  `book_id` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `lmsbooks`
--

INSERT INTO `lmsbooks` (`book_image`, `book_code`, `book_name`, `book_stored`, `book_total`, `book_id`) VALUES
('assets/frontend/img/books/4.jpg', 66652, 'Surveillance Sycurity System', 40, 100, 1),
('assets/frontend/img/books/2.jpg', 66652, 'Operating System', 30, 40, 2),
('assets/frontend/img/books/3.jpg', 66652, 'Pcb', 50, 80, 3),
('assets/frontend/img/books/4.jpg', 66652, 'Programming in java', 30, 50, 4),
('assets/frontend/img/books/4.jpg', 66652, 'Surveillance Sycurity System', 40, 100, 5),
('assets/frontend/img/books/2.jpg', 66652, 'Operating System', 30, 40, 6),
('assets/frontend/img/books/3.jpg', 66652, 'Pcb', 50, 80, 7),
('assets/frontend/img/books/4.jpg', 66652, 'Programming in java', 30, 50, 8),
('assets/frontend/img/books/4.jpg', 66652, 'Surveillance Sycurity System', 40, 100, 9),
('assets/frontend/img/books/2.jpg', 66652, 'Operating System', 30, 40, 10),
('assets/frontend/img/books/3.jpg', 66652, 'Pcb', 50, 80, 11),
('assets/frontend/img/books/4.jpg', 66652, 'Programming in java', 30, 50, 12),
('assets/frontend/img/books/4.jpg', 66652, 'Surveillance Sycurity System', 40, 100, 13),
('assets/frontend/img/books/2.jpg', 66652, 'Operating System', 30, 40, 14),
('assets/frontend/img/books/3.jpg', 66652, 'Pcb', 50, 80, 15),
('assets/frontend/img/books/4.jpg', 66652, 'Programming in java', 30, 50, 16);

-- --------------------------------------------------------

--
-- Table structure for table `lmsbookshistory`
--

CREATE TABLE `lmsbookshistory` (
  `historyID` int(200) NOT NULL,
  `historyBooksName` varchar(100) NOT NULL,
  `historyStudentName` varchar(50) NOT NULL,
  `historyBooksCode` int(10) NOT NULL,
  `historyStudentRoll` int(10) NOT NULL,
  `historyDate` date NOT NULL,
  `historyStatus` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `lmsbookshistory`
--

INSERT INTO `lmsbookshistory` (`historyID`, `historyBooksName`, `historyStudentName`, `historyBooksCode`, `historyStudentRoll`, `historyDate`, `historyStatus`) VALUES
(1, 'Programming in java', 'Zahid hasan', 66652, 949551, '2019-10-03', 'get'),
(2, 'Programming in java', 'Zahid hasan', 66652, 949551, '2019-11-03', 'return');

-- --------------------------------------------------------

--
-- Table structure for table `lms_student`
--

CREATE TABLE `lms_student` (
  `student_id` int(100) NOT NULL,
  `student_name` varchar(50) NOT NULL,
  `student_roll` int(10) NOT NULL,
  `student_image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `lms_student`
--

INSERT INTO `lms_student` (`student_id`, `student_name`, `student_roll`, `student_image`) VALUES
(1, 'Zahid hasan', 949551, 'assets/frontend/img/students/1.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_id` int(8) NOT NULL,
  `user_image` varchar(255) NOT NULL,
  `user_name` varchar(50) NOT NULL,
  `user_email` varchar(80) NOT NULL,
  `user_password` varchar(50) NOT NULL,
  `user_level` tinyint(1) NOT NULL,
  `activation_status` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `user_image`, `user_name`, `user_email`, `user_password`, `user_level`, `activation_status`) VALUES
(1, 'assets/backend/img/user/1.jpg', 'Zahid Hasan', 'zahidhasan@yahoo.com', 'admin', 1, 1),
(2, 'assets/backend/img/user/2.jpg', 'Zahid Hasan', 'zahidhasan@gmail.com', 'admin', 1, 1),
(3, 'assets/backend/img/user/3.jpg', 'nahid', 'Nahid@gmail.com', 'nahid', 0, 0),
(4, 'assets/backend/img/user/z.png', 'Zahid Hasan', 'zahid@gmail.com', 'admin', 1, 1),
(5, 'assets/backend/img/user/photo7.jpg', 'nahid hasan', 'Nahid@gmail.com', 'admin', 0, 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `lmsbooks`
--
ALTER TABLE `lmsbooks`
  ADD PRIMARY KEY (`book_id`);

--
-- Indexes for table `lmsbookshistory`
--
ALTER TABLE `lmsbookshistory`
  ADD PRIMARY KEY (`historyID`);

--
-- Indexes for table `lms_student`
--
ALTER TABLE `lms_student`
  ADD PRIMARY KEY (`student_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `lmsbooks`
--
ALTER TABLE `lmsbooks`
  MODIFY `book_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `lmsbookshistory`
--
ALTER TABLE `lmsbookshistory`
  MODIFY `historyID` int(200) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `lms_student`
--
ALTER TABLE `lms_student`
  MODIFY `student_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
