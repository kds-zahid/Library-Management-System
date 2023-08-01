-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 03, 2020 at 09:56 PM
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
  `book_id` int(10) NOT NULL,
  `Author` varchar(50) NOT NULL,
  `Publication` text NOT NULL,
  `Price` int(5) NOT NULL,
  `Date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `lmsbooks`
--

INSERT INTO `lmsbooks` (`book_image`, `book_code`, `book_name`, `book_stored`, `book_total`, `book_id`, `Author`, `Publication`, `Price`, `Date`) VALUES
('assets/frontend/img/books/bat color.png', 66652, 'Pcb', 50, 50, 15, 'etc', 'Technical Prokashoni', 100, '2019-11-30'),
('assets/frontend/img/books/css.ico', 121212, 'css', 50, 50, 65, 'etc', 'Houqe Prokashoni', 250, '2019-11-21'),
('assets/frontend/img/books/airplane.png', 2000, 'Operating system', 50, 50, 71, 'etc', 'etc', 500, '2019-11-22'),
('assets/frontend/img/books/2.jpg', 123011, 'programming ', 50, 50, 85, 'etc', 'Technical Prokashoni', 100, '2019-12-03'),
('assets/frontend/img/books/py.png', 6549, 'python', 10, 10, 86, 'etc', 'Technical Prokashoni', 100, '2019-12-03'),
('assets/frontend/img/books/defaultBookImage.jpg', 111111, 'bd', 100, 100, 87, 'bnmv', 'Technical Prokashoni', 100, '2019-12-09'),
('assets/frontend/img/books/defaultBookImage.jpg', 65911, 'Mathematicsâ€1', 150, 150, 88, 'etc', 'Technical Prokashoni', 120, '2019-12-12'),
('assets/frontend/img/books/defaultBookImage.jpg', 66611, 'Computer application', 50, 50, 89, 'j a n i na', 'Houqe Prokashoni', 100, '2019-12-12'),
('assets/frontend/img/books/defaultBookImage.jpg', 65912, 'Physicsâ€1', 100, 100, 90, 'j a n i n a', 'Technical Prokashoni', 150, '2019-12-12'),
('assets/frontend/img/books/defaultBookImage.jpg', 66712, 'Electrical engineering fundamentals', 150, 150, 91, 'j a n i n a', 'Technical Prokashoni', 220, '2019-12-12'),
('assets/frontend/img/books/defaultBookImage.jpg', 65712, 'English', 200, 200, 92, 'j a n i n a', 'Houqe Prokashoni', 170, '2019-12-12'),
('assets/frontend/img/books/defaultBookImage.jpg', 65812, 'Physical education & life skills development', 150, 150, 93, 'j a n i n a', 'Houqe Prokashoni', 70, '2019-12-12'),
('assets/frontend/img/books/defaultBookImage.jpg', 65711, 'Bangla', 200, 200, 94, 'j a n i n a', 'Technical Prokashoni', 180, '2019-12-12'),
('assets/frontend/img/books/defaultBookImage.jpg', 66621, 'Database Application', 50, 50, 95, 'j a n i n a', 'Houqe Prokashoni', 80, '2019-12-12'),
('assets/frontend/img/books/defaultBookImage.jpg', 65921, ' Mathematics-2', 200, 200, 96, 'j a n i n a', 'Technical Prokashoni', 120, '2019-12-12'),
('assets/frontend/img/books/defaultBookImage.jpg', 66622, 'IT support System-I', 50, 50, 97, 'j a n i n a', 'Technical Prokashoni', 100, '2019-12-12'),
('assets/frontend/img/books/defaultBookImage.jpg', 65922, 'Physics-2', 100, 100, 98, 'j a n i n a', 'Technical Prokashoni', 120, '2019-12-12'),
('assets/frontend/img/books/defaultBookImage.jpg', 66623, 'Graphics Design-I', 50, 50, 99, 'j a n i n a', 'Technical Prokashoni', 100, '2019-12-12'),
('assets/frontend/img/books/defaultBookImage.jpg', 65722, 'Communicative English', 150, 150, 100, 'j a n i n a', 'prime', 120, '2019-12-12'),
('assets/frontend/img/books/defaultBookImage.jpg', 66823, ' Analog Electronics', 120, 120, 101, 'j a n i n a', 'prime', 180, '2019-12-12'),
('assets/frontend/img/books/defaultBookImage.jpg', 66631, 'Programming Essentials', 120, 120, 102, 'j a n i n a', 'Technical Prokashoni', 280, '2019-12-12'),
('assets/frontend/img/books/defaultBookImage.jpg', 65931, 'Mathematicsâ€3', 180, 180, 103, 'j a n i n a', 'Houqe Prokashoni', 170, '2019-12-12'),
('assets/frontend/img/books/defaultBookImage.jpg', 66632, 'Web Design', 148, 150, 104, 'j a n i n a', 'Technical Prokashoni', 120, '2019-12-12'),
('assets/frontend/img/books/defaultBookImage.jpg', 65913, ' Chemistry', 97, 100, 105, 'j a n i n a', 'Houqe Prokashoni', 200, '2019-12-12'),
('assets/frontend/img/books/defaultBookImage.jpg', 66633, 'Graphics designâ€II', 78, 80, 106, 'j a n i n a', 'Technical Prokashoni', 120, '2019-12-12'),
('assets/frontend/img/books/defaultBookImage.jpg', 65811, 'Social Science', 198, 200, 107, 'j a n i n a', 'Houqe Prokashoni', 180, '2019-12-12'),
('assets/frontend/img/books/defaultBookImage.jpg', 66634, 'IT support Systemâ€II', 75, 80, 108, 'j a n i n a', 'Houqe Prokashoni', 220, '2019-12-12');

-- --------------------------------------------------------

--
-- Table structure for table `lmsgivenbook`
--

CREATE TABLE `lmsgivenbook` (
  `id` int(50) NOT NULL,
  `stdntRoll` int(50) NOT NULL,
  `subjectCode` int(10) NOT NULL,
  `subjectName` varchar(50) NOT NULL,
  `getDate` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='Given book database table';

--
-- Dumping data for table `lmsgivenbook`
--

INSERT INTO `lmsgivenbook` (`id`, `stdntRoll`, `subjectCode`, `subjectName`, `getDate`) VALUES
(1, 121212121, 66634, 'IT support Systemâ€II', '2019-12-13'),
(2, 845153, 66634, 'IT support Systemâ€II', '2019-12-13'),
(3, 845151, 66634, 'IT support Systemâ€II', '2019-12-14'),
(4, 845152, 66634, 'IT support Systemâ€II', '2019-12-14'),
(5, 845151, 65811, 'Social Science', '2019-12-14'),
(6, 845151, 66633, 'Graphics designâ€II', '2019-12-14'),
(7, 845151, 65913, ' Chemistry', '2019-12-14'),
(8, 845152, 65811, 'Social Science', '2019-12-14'),
(9, 845152, 66633, 'Graphics designâ€II', '2019-12-14'),
(10, 845152, 65913, ' Chemistry', '2019-12-14'),
(11, 845152, 66632, 'Web Design', '2019-12-14'),
(12, 321321, 66634, 'IT support Systemâ€II', '2019-12-14'),
(13, 321321, 66632, 'Web Design', '2019-12-14'),
(14, 321321, 65913, ' Chemistry', '2019-12-14');

-- --------------------------------------------------------

--
-- Table structure for table `lms_student`
--

CREATE TABLE `lms_student` (
  `student_id` int(100) NOT NULL,
  `student_name` varchar(50) NOT NULL,
  `fathersName` varchar(50) NOT NULL,
  `Address` varchar(100) NOT NULL,
  `PhoneNumber` text NOT NULL,
  `student_roll` int(10) NOT NULL,
  `student_image` varchar(255) NOT NULL,
  `student_technology` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `lms_student`
--

INSERT INTO `lms_student` (`student_id`, `student_name`, `fathersName`, `Address`, `PhoneNumber`, `student_roll`, `student_image`, `student_technology`) VALUES
(17, 'nahid hasan', 'janina', 'komuna', '01 k o m u n a', 321321, 'assets/frontend/img/students/aa.jpg', 'Computer'),
(24, 'zahid hasan', 'komu na', 'komuna', '01 k o m u n a', 845151, 'assets/frontend/img/students/2.jpg', 'Computer'),
(25, 'à¦œà¦¾à¦¹à¦¿à¦¦ à¦¹à¦¾à¦¸à¦¾à¦¨', 'komu na', 'komuna', '01 k o m u n a', 845153, 'assets/frontend/img/students/1.jpg', 'Computer'),
(26, 'Joynab akter', 'komu na', 'komu na', '0 1   k o m u n a', 845152, 'assets/frontend/img/students/j.jpg', 'Computer'),
(27, 'à¦œà§Ÿà¦¨à¦¾à¦¬ à¦–à¦¾à¦¤à§à¦¨', 'komu na', 'komuna', '0 1   k o m u n a', 121212121, 'assets/frontend/img/students/default.jpg', 'Computer'),
(28, 'à¦¨à¦¾à¦¹à¦¿à¦¦ à¦¹à¦¾à¦¸à¦¾à¦¨', 'komu na', 'komuna', '0 1   k o m u n a', 321322, 'assets/frontend/img/students/default.jpg', 'Civil'),
(29, 'à¦œà¦¾à¦¹à¦¿à¦¦ à¦¹à¦¾à¦¸à¦¾à¦¨', 'komu na', 'komuna', '0 1   k o m u n a', 945151, 'assets/frontend/img/students/default.jpg', 'Computer');

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
(3, 'assets/backend/img/user/3.jpg', 'nahid', 'nahid@gmail.com', 'admin', 3, 1),
(6, 'assets/backend/img/user/2.jpg', 'Zahid Hasan', 'zahidhasan@gmail.com', 'admin', 1, 1),
(7, 'assets/backend/img/user/1.jpg', 'Zahid Hasan', 'zahid@gmail.com', 'admin', 1, 1),
(8, 'assets/backend/img/user/j.jpg', 'joynab akter', 'joynab@gmail.com', 'admin', 3, 1),
(29, 'assets/backend/img/user/default.jpg', 'nahid hasan', 'nahid@gmail.com', 'a', 0, 0),
(30, 'assets/backend/img/user/y.jpg', 'zahid hasan', 'zahid@yahoo.com', 'admin', 2, 1),
(39, 'assets/backend/img/user/ibit-logo-new-red-new-full-copy----------gif-version.gif', 'ibit', 'ibit@gmail.com', 'admin', 3, 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `lmsbooks`
--
ALTER TABLE `lmsbooks`
  ADD PRIMARY KEY (`book_id`),
  ADD KEY `book_id` (`book_id`),
  ADD KEY `book_id_2` (`book_id`);

--
-- Indexes for table `lmsgivenbook`
--
ALTER TABLE `lmsgivenbook`
  ADD PRIMARY KEY (`id`);

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
  MODIFY `book_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=109;

--
-- AUTO_INCREMENT for table `lmsgivenbook`
--
ALTER TABLE `lmsgivenbook`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `lms_student`
--
ALTER TABLE `lms_student`
  MODIFY `student_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
