-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3336
-- Generation Time: Sep 14, 2018 at 02:50 AM
-- Server version: 10.1.31-MariaDB
-- PHP Version: 7.2.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `capstone`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `AdminID` int(11) NOT NULL,
  `Email` varchar(25) NOT NULL,
  `PW` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `questions`
--

CREATE TABLE `questions` (
  `QuestionID` int(11) NOT NULL,
  `QuestionText` varchar(180) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `questions`
--

INSERT INTO `questions` (`QuestionID`, `QuestionText`) VALUES
(1, 'How well did you follow your budget this week?'),
(2, 'How well did you resist impulse spending?'),
(3, 'How well did you work with others today?');

-- --------------------------------------------------------

--
-- Table structure for table `reports`
--

CREATE TABLE `reports` (
  `ReportID` int(11) NOT NULL,
  `TemplateID` int(11) NOT NULL,
  `UserID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `reports`
--

INSERT INTO `reports` (`ReportID`, `TemplateID`, `UserID`) VALUES
(1, 1, 4),
(8, 2, 4),
(28, 1, 7),
(29, 2, 7);

-- --------------------------------------------------------

--
-- Table structure for table `responses`
--

CREATE TABLE `responses` (
  `ResponseID` int(11) NOT NULL,
  `ReportID` int(11) DEFAULT NULL,
  `QuestionID` int(11) NOT NULL,
  `Response` int(11) NOT NULL,
  `Date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `responses`
--

INSERT INTO `responses` (`ResponseID`, `ReportID`, `QuestionID`, `Response`, `Date`) VALUES
(1, 1, 1, 1, '2018-09-11 20:40:48'),
(2, 1, 1, 2, '2018-09-11 20:40:48'),
(3, 1, 1, 3, '2018-09-11 20:40:49'),
(4, 1, 2, 5, '2018-09-12 15:33:57'),
(5, 1, 2, 2, '2018-09-12 15:33:58'),
(6, 8, 3, 1, '2018-09-12 15:51:54'),
(7, 8, 3, 1, '2018-09-12 15:54:19'),
(8, 8, 3, 2, '2018-09-12 15:54:20'),
(9, 1, 1, 5, '2018-09-12 15:54:34'),
(10, 1, 1, 4, '2018-09-12 15:54:34'),
(11, 1, 1, 1, '2018-09-12 15:56:50'),
(12, 8, 3, 2, '2018-09-12 15:57:47'),
(13, 8, 3, 5, '2018-09-12 15:57:49'),
(14, 1, 1, 4, '2018-09-12 16:05:17'),
(15, NULL, 3, 1, '2018-09-12 17:00:51'),
(16, NULL, 3, 5, '2018-09-12 17:00:52'),
(17, NULL, 1, 1, '2018-09-12 17:00:54'),
(18, NULL, 1, 5, '2018-09-12 17:00:55'),
(19, NULL, 3, 1, '2018-09-12 17:04:05'),
(20, NULL, 3, 2, '2018-09-12 17:04:06'),
(21, NULL, 3, 3, '2018-09-12 17:04:07'),
(22, NULL, 2, 5, '2018-09-12 17:04:15'),
(23, NULL, 2, 2, '2018-09-12 17:04:16'),
(24, NULL, 2, 4, '2018-09-12 17:04:16'),
(25, NULL, 2, 2, '2018-09-12 17:04:17'),
(26, NULL, 1, 1, '2018-09-12 17:05:25'),
(27, NULL, 1, 5, '2018-09-12 17:05:30'),
(28, NULL, 1, 4, '2018-09-12 17:05:30'),
(29, NULL, 1, 2, '2018-09-12 17:05:31'),
(30, NULL, 1, 1, '2018-09-12 17:05:56'),
(31, NULL, 1, 5, '2018-09-12 17:05:57'),
(32, NULL, 1, 1, '2018-09-12 17:07:08'),
(33, NULL, 1, 5, '2018-09-12 17:07:09'),
(34, NULL, 1, 1, '2018-09-12 17:13:37'),
(35, NULL, 1, 2, '2018-09-12 17:13:38'),
(36, 28, 1, 1, '2018-09-12 17:13:58'),
(37, 28, 1, 2, '2018-09-12 17:13:58'),
(38, 28, 1, 3, '2018-09-12 17:13:59'),
(39, 28, 1, 4, '2018-09-12 17:13:59'),
(40, NULL, 3, 5, '2018-09-12 17:14:31'),
(41, 29, 3, 5, '2018-09-12 17:14:44'),
(42, 29, 3, 2, '2018-09-12 17:15:27');

-- --------------------------------------------------------

--
-- Table structure for table `templates`
--

CREATE TABLE `templates` (
  `TemplateID` int(11) NOT NULL,
  `TemplateName` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `templates`
--

INSERT INTO `templates` (`TemplateID`, `TemplateName`) VALUES
(1, 'Money Management'),
(2, 'Social Skills');

-- --------------------------------------------------------

--
-- Table structure for table `template_questions`
--

CREATE TABLE `template_questions` (
  `TemplateID` int(11) NOT NULL,
  `QuestionID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `template_questions`
--

INSERT INTO `template_questions` (`TemplateID`, `QuestionID`) VALUES
(1, 1),
(1, 2),
(2, 3);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `UserID` int(11) NOT NULL,
  `Fname` varchar(35) DEFAULT NULL,
  `Lname` varchar(35) DEFAULT NULL,
  `Email` varchar(25) NOT NULL,
  `PW` varchar(60) NOT NULL,
  `TemplateID` int(11) NOT NULL,
  `Birthday` datetime DEFAULT NULL,
  `isAdmin` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`UserID`, `Fname`, `Lname`, `Email`, `PW`, `TemplateID`, `Birthday`, `isAdmin`) VALUES
(4, 'Matt', 'Rossi', 'mtrossi@email.neit.edu', '$2y$10$3H/A.fVOXJRFKuv.t2fQv./z9vJiLFw5iRgCAR7IBUKuQIUFawukW', 1, '1996-07-26 00:00:00', 1),
(6, 'Matt', 'R', 'mt@mt.mt', '$2y$10$8gFKoi6i.G79aIcBnIHk0ODVUXbNFpFYfqE5M/7cjD2zuXXn749hC', 1, '1996-07-18 00:00:00', 0),
(7, 'a', 'a', 'm@m.m', '$2y$10$r8dVE5g0riH7dB55aFMbrO2VecvovhQINdItPRchqooV3DemOGyD2', 2, '1996-07-18 00:00:00', 0),
(8, 'asd', 'asd', 'ma@ma.ma', '$2y$10$w7Pijlh8wEa9h2nH9LO7PeUVVw7ab5i3/PiwGgWXUp/1Al9eHgO9i', 0, '1995-01-12 00:00:00', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`AdminID`);

--
-- Indexes for table `questions`
--
ALTER TABLE `questions`
  ADD PRIMARY KEY (`QuestionID`);

--
-- Indexes for table `reports`
--
ALTER TABLE `reports`
  ADD PRIMARY KEY (`ReportID`),
  ADD KEY `UserID` (`UserID`),
  ADD KEY `TemplateID` (`TemplateID`);

--
-- Indexes for table `responses`
--
ALTER TABLE `responses`
  ADD PRIMARY KEY (`ResponseID`),
  ADD KEY `QuestionID` (`QuestionID`),
  ADD KEY `ReportID` (`ReportID`);

--
-- Indexes for table `templates`
--
ALTER TABLE `templates`
  ADD PRIMARY KEY (`TemplateID`);

--
-- Indexes for table `template_questions`
--
ALTER TABLE `template_questions`
  ADD KEY `TemplateID` (`TemplateID`),
  ADD KEY `QuestionID` (`QuestionID`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`UserID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `reports`
--
ALTER TABLE `reports`
  MODIFY `ReportID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `responses`
--
ALTER TABLE `responses`
  MODIFY `ResponseID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `UserID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `reports`
--
ALTER TABLE `reports`
  ADD CONSTRAINT `reports_ibfk_1` FOREIGN KEY (`UserID`) REFERENCES `users` (`UserID`),
  ADD CONSTRAINT `reports_ibfk_2` FOREIGN KEY (`TemplateID`) REFERENCES `templates` (`TemplateID`);

--
-- Constraints for table `responses`
--
ALTER TABLE `responses`
  ADD CONSTRAINT `responses_ibfk_1` FOREIGN KEY (`QuestionID`) REFERENCES `questions` (`QuestionID`),
  ADD CONSTRAINT `responses_ibfk_2` FOREIGN KEY (`ReportID`) REFERENCES `reports` (`ReportID`);

--
-- Constraints for table `template_questions`
--
ALTER TABLE `template_questions`
  ADD CONSTRAINT `template_questions_ibfk_1` FOREIGN KEY (`TemplateID`) REFERENCES `templates` (`TemplateID`),
  ADD CONSTRAINT `template_questions_ibfk_2` FOREIGN KEY (`QuestionID`) REFERENCES `questions` (`QuestionID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
