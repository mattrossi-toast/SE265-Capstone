-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3336
-- Generation Time: Sep 05, 2018 at 02:22 AM
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
(2, 'How well did you resist impulse spending?');

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
(1, 1, 4);

-- --------------------------------------------------------

--
-- Table structure for table `responses`
--

CREATE TABLE `responses` (
  `ResponseID` int(11) NOT NULL,
  `ReportID` int(11) NOT NULL,
  `QuestionID` int(11) NOT NULL,
  `Response` int(11) NOT NULL,
  `Date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `responses`
--

INSERT INTO `responses` (`ResponseID`, `ReportID`, `QuestionID`, `Response`, `Date`) VALUES
(1, 1, 1, 2, '2018-08-29'),
(2, 1, 1, 2, '0000-00-00'),
(3, 1, 1, 2, '0000-00-00'),
(36, 1, 1, 1, '2018-09-03'),
(37, 1, 1, 2, '2018-09-03'),
(38, 1, 1, 1, '2018-09-03'),
(39, 1, 1, 1, '2018-09-03'),
(40, 1, 1, 1, '2018-09-03'),
(41, 1, 1, 2, '2018-09-03'),
(42, 1, 1, 1, '2018-09-03'),
(43, 1, 1, 2, '2018-09-03'),
(44, 1, 1, 1, '2018-09-03'),
(45, 1, 1, 1, '2018-09-03'),
(52, 1, 1, 1, '2018-09-03'),
(53, 1, 1, 1, '2018-09-03'),
(54, 1, 1, 1, '2018-09-03'),
(55, 1, 1, 1, '2018-09-03'),
(56, 1, 1, 2, '2018-09-03'),
(57, 1, 1, 1, '2018-09-03'),
(60, 1, 1, 2, '2018-09-03'),
(61, 1, 1, 3, '2018-09-03'),
(62, 1, 1, 1, '2018-09-03'),
(63, 1, 1, 1, '2018-09-03'),
(64, 1, 1, 2, '2018-09-03'),
(65, 1, 1, 3, '2018-09-03'),
(66, 1, 1, 1, '2018-09-03'),
(67, 1, 1, 2, '2018-09-03'),
(68, 1, 1, 2, '2018-09-03'),
(69, 1, 1, 1, '2018-09-03'),
(70, 1, 1, 5, '2018-09-03'),
(71, 1, 1, 1, '2018-09-03'),
(72, 1, 1, 5, '2018-09-03'),
(84, 1, 1, 1, '2018-09-03'),
(85, 1, 1, 1, '2018-09-03'),
(86, 1, 1, 1, '2018-09-03'),
(87, 1, 1, 1, '2018-09-03'),
(88, 1, 1, 1, '2018-09-04'),
(89, 1, 1, 1, '2018-09-04'),
(90, 1, 1, 1, '2018-09-04'),
(91, 1, 1, 1, '2018-09-04'),
(92, 1, 1, 1, '2018-09-04'),
(93, 1, 1, 1, '2018-09-04'),
(94, 1, 1, 1, '2018-09-04'),
(95, 1, 1, 1, '2018-09-04'),
(96, 1, 1, 1, '2018-09-04'),
(97, 1, 1, 1, '2018-09-04'),
(98, 1, 1, 1, '2018-09-04'),
(99, 1, 1, 5, '2018-09-04'),
(100, 1, 1, 5, '2018-09-04'),
(101, 1, 1, 1, '2018-09-04'),
(102, 1, 1, 1, '2018-09-04'),
(107, 1, 1, 1, '2018-09-04'),
(112, 1, 1, 1, '2018-09-04'),
(118, 1, 1, 1, '2018-09-04'),
(129, 1, 1, 1, '2018-09-04'),
(130, 1, 1, 1, '2018-09-04'),
(131, 1, 1, 4, '2018-09-04'),
(132, 1, 1, 5, '2018-09-04'),
(133, 1, 1, 2, '2018-09-04'),
(134, 1, 1, 1, '2018-09-04'),
(135, 1, 1, 1, '2018-09-04'),
(136, 1, 1, 2, '2018-09-04'),
(137, 1, 1, 1, '2018-09-04'),
(138, 1, 1, 1, '2018-09-04'),
(139, 1, 1, 2, '2018-09-04'),
(140, 1, 1, 3, '2018-09-04'),
(141, 1, 1, 1, '2018-09-04'),
(142, 1, 1, 2, '2018-09-04'),
(143, 1, 1, 1, '2018-09-04'),
(144, 1, 1, 2, '2018-09-04'),
(145, 1, 1, 3, '2018-09-04'),
(146, 1, 1, 1, '2018-09-04'),
(147, 1, 1, 1, '2018-09-04'),
(148, 1, 1, 1, '2018-09-04'),
(149, 1, 1, 1, '2018-09-04'),
(150, 1, 1, 1, '2018-09-04'),
(151, 1, 1, 1, '2018-09-04'),
(152, 1, 1, 1, '2018-09-04'),
(153, 1, 1, 1, '2018-09-04'),
(154, 1, 1, 1, '2018-09-04'),
(155, 1, 1, 1, '2018-09-04'),
(156, 1, 1, 2, '2018-09-04'),
(157, 1, 1, 1, '2018-09-04'),
(158, 1, 1, 2, '2018-09-04'),
(159, 1, 1, 1, '2018-09-04'),
(160, 1, 1, 1, '2018-09-04'),
(161, 1, 1, 1, '2018-09-04'),
(162, 1, 1, 1, '2018-09-04'),
(163, 1, 1, 1, '2018-09-04'),
(164, 1, 1, 1, '2018-09-04'),
(165, 1, 1, 2, '2018-09-04'),
(166, 1, 1, 1, '2018-09-04'),
(167, 1, 1, 1, '2018-09-04'),
(168, 1, 1, 1, '2018-09-04'),
(169, 1, 1, 1, '2018-09-04'),
(170, 1, 1, 1, '2018-09-04'),
(171, 1, 1, 1, '2018-09-04'),
(172, 1, 1, 2, '2018-09-04'),
(173, 1, 1, 1, '2018-09-04'),
(174, 1, 1, 1, '2018-09-04'),
(175, 1, 1, 5, '2018-09-04'),
(176, 1, 1, 1, '2018-09-04'),
(177, 1, 1, 1, '2018-09-04'),
(178, 1, 1, 1, '2018-09-04'),
(179, 1, 1, 2, '2018-09-04'),
(180, 1, 1, 1, '2018-09-04'),
(181, 1, 1, 2, '2018-09-04'),
(182, 1, 1, 2, '2018-09-04'),
(183, 1, 1, 2, '2018-09-04'),
(184, 1, 1, 2, '2018-09-04'),
(185, 1, 1, 2, '2018-09-04'),
(186, 1, 1, 2, '2018-09-04'),
(187, 1, 1, 2, '2018-09-04'),
(188, 1, 1, 2, '2018-09-04'),
(189, 1, 1, 2, '2018-09-04'),
(190, 1, 1, 2, '2018-09-04'),
(191, 1, 1, 1, '2018-09-04'),
(192, 1, 1, 2, '2018-09-04'),
(193, 1, 1, 5, '2018-09-04'),
(194, 1, 1, 1, '2018-09-04'),
(195, 1, 1, 2, '2018-09-04'),
(196, 1, 1, 1, '2018-09-04'),
(197, 1, 1, 1, '2018-09-04'),
(198, 1, 1, 1, '2018-09-04'),
(199, 1, 1, 1, '2018-09-04'),
(200, 1, 1, 1, '2018-09-04'),
(201, 1, 1, 1, '2018-09-04'),
(202, 1, 1, 2, '2018-09-04'),
(203, 1, 1, 2, '2018-09-04'),
(204, 1, 1, 1, '2018-09-04'),
(207, 1, 1, 1, '2018-09-04'),
(208, 1, 1, 1, '2018-09-04'),
(209, 1, 1, 2, '2018-09-04'),
(210, 1, 1, 1, '2018-09-04'),
(211, 1, 1, 1, '2018-09-04'),
(212, 1, 1, 1, '2018-09-04'),
(213, 1, 1, 1, '2018-09-04'),
(214, 1, 1, 2, '2018-09-04'),
(215, 1, 1, 1, '2018-09-04'),
(216, 1, 1, 2, '2018-09-04'),
(217, 1, 1, 1, '2018-09-04'),
(218, 1, 1, 2, '2018-09-04'),
(219, 1, 1, 1, '2018-09-04'),
(220, 1, 1, 1, '2018-09-04'),
(221, 1, 1, 1, '2018-09-04'),
(222, 1, 1, 1, '2018-09-04'),
(223, 1, 1, 1, '2018-09-04'),
(224, 1, 1, 1, '2018-09-04'),
(225, 1, 1, 1, '2018-09-04'),
(226, 1, 1, 1, '2018-09-04'),
(227, 1, 1, 2, '2018-09-04'),
(228, 1, 1, 1, '2018-09-04'),
(229, 1, 1, 1, '2018-09-04'),
(230, 1, 1, 5, '2018-09-04'),
(231, 1, 1, 1, '2018-09-04'),
(232, 1, 1, 5, '2018-09-04'),
(233, 1, 1, 3, '2018-09-04'),
(234, 1, 1, 2, '2018-09-04'),
(235, 1, 1, 1, '2018-09-04'),
(236, 1, 1, 5, '2018-09-04'),
(237, 1, 1, 1, '2018-09-04'),
(238, 1, 1, 1, '2018-09-04'),
(239, 1, 1, 1, '2018-09-04'),
(240, 1, 1, 1, '2018-09-04'),
(241, 1, 1, 1, '2018-09-04'),
(242, 1, 1, 1, '2018-09-04'),
(243, 1, 1, 1, '2018-09-04'),
(244, 1, 1, 1, '2018-09-04'),
(245, 1, 1, 2, '2018-09-04'),
(246, 1, 1, 5, '2018-09-04'),
(247, 1, 1, 2, '2018-09-04'),
(248, 1, 1, 3, '2018-09-04'),
(249, 1, 1, 3, '2018-09-04'),
(250, 1, 1, 1, '2018-09-04'),
(251, 1, 1, 1, '2018-09-04'),
(252, 1, 1, 2, '2018-09-04'),
(253, 1, 1, 2, '2018-09-04'),
(254, 1, 1, 2, '2018-09-04'),
(255, 1, 1, 2, '2018-09-04'),
(256, 1, 1, 2, '2018-09-04'),
(257, 1, 1, 2, '2018-09-04'),
(258, 1, 1, 2, '2018-09-04'),
(259, 1, 1, 2, '2018-09-04'),
(260, 1, 1, 2, '2018-09-04'),
(261, 1, 1, 2, '2018-09-04'),
(262, 1, 1, 2, '2018-09-04'),
(263, 1, 1, 2, '2018-09-04'),
(264, 1, 1, 2, '2018-09-04'),
(265, 1, 1, 2, '2018-09-04'),
(266, 1, 1, 2, '2018-09-04'),
(267, 1, 1, 2, '2018-09-04'),
(268, 1, 1, 2, '2018-09-04'),
(269, 1, 1, 2, '2018-09-04'),
(271, 1, 1, 1, '2018-09-04'),
(272, 1, 1, 1, '2018-09-04'),
(273, 1, 2, 2, '2018-09-04'),
(274, 1, 2, 1, '2018-09-04'),
(275, 1, 1, 2, '2018-09-04'),
(276, 1, 2, 2, '2018-09-04'),
(277, 1, 1, 1, '2018-09-04'),
(278, 1, 1, 2, '2018-09-04'),
(279, 1, 2, 2, '2018-09-04'),
(280, 1, 2, 1, '2018-09-04'),
(281, 1, 1, 1, '2018-09-04'),
(282, 1, 1, 3, '2018-09-04'),
(283, 1, 1, 1, '2018-09-04'),
(284, 1, 1, 1, '2018-09-04'),
(285, 1, 1, 2, '2018-09-04'),
(286, 1, 1, 2, '2018-09-04'),
(287, 1, 1, 2, '2018-09-04'),
(288, 1, 1, 2, '2018-09-04'),
(289, 1, 1, 1, '2018-09-04'),
(290, 1, 1, 1, '2018-09-04'),
(291, 1, 1, 2, '2018-09-04'),
(292, 1, 1, 2, '2018-09-04'),
(293, 1, 1, 1, '2018-09-04'),
(294, 1, 1, 1, '2018-09-04'),
(295, 1, 1, 1, '2018-09-04'),
(296, 1, 1, 1, '2018-09-04'),
(297, 1, 1, 1, '2018-09-04'),
(298, 1, 1, 1, '2018-09-04'),
(299, 1, 1, 1, '2018-09-04'),
(300, 1, 1, 1, '2018-09-04'),
(301, 1, 1, 1, '2018-09-04'),
(302, 1, 1, 1, '2018-09-04'),
(303, 1, 2, 1, '2018-09-04'),
(304, 1, 2, 5, '2018-09-04'),
(305, 1, 1, 1, '2018-09-04'),
(306, 1, 1, 2, '2018-09-04'),
(307, 1, 1, 1, '2018-09-04'),
(308, 1, 2, 1, '2018-09-04'),
(309, 1, 1, 1, '2018-09-04'),
(310, 1, 2, 1, '2018-09-04'),
(311, 1, 1, 1, '2018-09-04'),
(312, 1, 1, 2, '2018-09-04'),
(313, 1, 1, 1, '2018-09-04'),
(314, 1, 2, 2, '2018-09-04'),
(315, 1, 1, 1, '2018-09-04'),
(316, 1, 1, 1, '2018-09-04'),
(317, 1, 2, 1, '2018-09-04'),
(318, 1, 2, 2, '2018-09-04'),
(319, 1, 1, 1, '2018-09-04'),
(320, 1, 1, 5, '2018-09-04'),
(321, 1, 1, 2, '2018-09-04'),
(322, 1, 2, 5, '2018-09-04'),
(323, 1, 2, 2, '2018-09-04'),
(324, 1, 1, 1, '2018-09-04'),
(325, 1, 1, 1, '2018-09-04'),
(326, 1, 1, 1, '2018-09-04'),
(327, 1, 2, 3, '2018-09-04'),
(328, 1, 1, 5, '2018-09-04'),
(329, 1, 1, 5, '2018-09-04'),
(330, 1, 1, 5, '2018-09-04'),
(331, 1, 1, 5, '2018-09-04'),
(332, 1, 1, 1, '2018-09-04'),
(333, 1, 1, 2, '2018-09-04'),
(334, 1, 1, 3, '2018-09-04');

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
(1, 2);

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
  `Birthday` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`UserID`, `Fname`, `Lname`, `Email`, `PW`, `TemplateID`, `Birthday`) VALUES
(1, NULL, NULL, 'matt', 'asd', 0, NULL),
(2, NULL, NULL, 'asd', '', 0, NULL),
(4, 'm', 'r', 'mtrossi@email.neit.edu', '$2y$10$R18dHghOSlfVFSIoNW1STeBpXDtM5q4TCBWc63T6umZjP1RhWPff2', 1, '1996-07-18 00:00:00');

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
  ADD KEY `ReportID` (`ReportID`),
  ADD KEY `QuestionID` (`QuestionID`);

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
-- AUTO_INCREMENT for table `responses`
--
ALTER TABLE `responses`
  MODIFY `ResponseID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=335;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `UserID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

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
  ADD CONSTRAINT `responses_ibfk_1` FOREIGN KEY (`ReportID`) REFERENCES `reports` (`ReportID`),
  ADD CONSTRAINT `responses_ibfk_2` FOREIGN KEY (`QuestionID`) REFERENCES `questions` (`QuestionID`);

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
