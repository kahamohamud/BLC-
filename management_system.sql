-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 31, 2023 at 08:59 AM
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
-- Database: `management_system`
--

-- --------------------------------------------------------

--
-- Table structure for table `acadimic`
--

CREATE TABLE `acadimic` (
  `ID` int(100) NOT NULL,
  `studentID` int(11) NOT NULL,
  `studentName` varchar(45) DEFAULT NULL,
  `VocabSpeaking` int(11) DEFAULT NULL,
  `Grammar` int(11) DEFAULT NULL,
  `Reading` int(11) DEFAULT NULL,
  `Writing` int(11) DEFAULT NULL,
  `Listening` int(11) DEFAULT NULL,
  `Tassessment` int(11) DEFAULT NULL,
  `TotalS` int(11) DEFAULT NULL,
  `TotalP` int(11) DEFAULT NULL,
  `Attendance` int(11) DEFAULT NULL,
  `TRecom` varchar(45) DEFAULT NULL,
  `TeacherName` text DEFAULT NULL,
  `Progress` varchar(45) DEFAULT NULL,
  `studentPassportNo` varchar(50) DEFAULT NULL,
  `studentCountry` varchar(50) DEFAULT NULL,
  `sdate` text DEFAULT NULL,
  `Units` varchar(50) DEFAULT NULL,
  `Teacher` varchar(50) NOT NULL,
  `Notes` varchar(1000) NOT NULL,
  `Level` varchar(100) NOT NULL,
  `idAuthintication` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `acadimic`
--

INSERT INTO `acadimic` (`ID`, `studentID`, `studentName`, `VocabSpeaking`, `Grammar`, `Reading`, `Writing`, `Listening`, `Tassessment`, `TotalS`, `TotalP`, `Attendance`, `TRecom`, `TeacherName`, `Progress`, `studentPassportNo`, `studentCountry`, `sdate`, `Units`, `Teacher`, `Notes`, `Level`, `idAuthintication`) VALUES
(654, 401, 'Ahlam Jabbar', 10, 10, 10, 10, 10, 10, 60, 60, 100, 'Progress', 'Ahlam', NULL, 'P0BHFUVTB', 'MALAYSIA', '15th April 2023', '1-3', '', 'Good Job', '', 0),
(655, 402, 'Kaha Mohamud Mohamed Haid ', 10, 10, 10, 10, 10, 10, 60, 60, 100, 'Progress', 'Raneem', NULL, 'BY1234571111', 'MALAYSIA', '15th April 2023', '1-3', 'Raneem', 'Good Job', 'Starter 1', 0),
(656, 403, 'Raneem Ashoor', 20, 20, 20, 20, 10, 10, 100, 100, 100, 'Progress', 'Kaha', NULL, 'Bill1234', 'MALAYSIA', '15th April 2023', '1-8', 'Kaha', 'Good Job', 'Starter 1', 0),
(657, 404, 'LAKADJF', 10, 10, 10, 10, 10, 10, 60, 60, 100, 'Progress', 'Ahlam', NULL, 'Bill1234444', 'MALAYSIA', '15th April 2023', '10', '', 'Good Job', '', 0),
(658, 405, 'Ahlam Jabbarerr', 10, 10, 10, 10, 10, 10, 60, 60, 100, 'Progress', '', NULL, 'BY1234575555', 'MALAYSIA', '15th April 2023', '1-3', '', 'Good Job', '', 0),
(659, 406, 'Kahagg', 10, 10, 10, 10, 10, 10, 60, 60, 100, 'Progress', 'Ahlam', NULL, 'BY123457ffftttt', 'SOMALI', '15th April 2023', '1-8', '', 'Good Job', '', 0),
(660, 407, 'LAKADJFdd', 10, 10, 10, 10, 10, 10, 60, 60, 100, 'Progress', 'Ahlam', NULL, 'Bill1234555', 'MALAYSIA', '15th April 2023', '1-3', '', 'Good Job', '', 0),
(661, 408, 'ffff', 10, 10, 10, 10, 10, 10, 60, 60, 100, 'Progress', 'Ahlam', NULL, 'BY123457ffffff', 'MALAYSIA', '15th April 2023', '1-3', '', 'Good Job', '', 0),
(662, 409, 'Ahlam Jabbar', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Bill1234676767', 'MALAYSIA', NULL, NULL, '', '', '', 0);

-- --------------------------------------------------------

--
-- Table structure for table `accounting`
--

CREATE TABLE `accounting` (
  `Ref` varchar(50) DEFAULT NULL,
  `studentName` varchar(45) DEFAULT NULL,
  `studentID` int(11) NOT NULL,
  `studentNationality` varchar(45) DEFAULT NULL,
  `studentPassportNo` varchar(45) DEFAULT NULL,
  `intake` varchar(50) NOT NULL,
  `Level` varchar(50) NOT NULL,
  `RegistrationFee` int(255) DEFAULT NULL,
  `VisaFee` int(255) DEFAULT NULL,
  `TuitionFee` int(255) DEFAULT NULL,
  `SpecialPass` int(255) DEFAULT NULL,
  `ShortenFee` int(255) DEFAULT NULL,
  `ACFee` int(255) DEFAULT NULL,
  `MFee` int(255) DEFAULT NULL,
  `StudentType` varchar(255) DEFAULT NULL,
  `TotalFees` int(11) NOT NULL,
  `PaidFees` int(11) NOT NULL,
  `OutFees` int(11) NOT NULL,
  `PaymentM` varchar(50) NOT NULL,
  `AmountIn` int(11) NOT NULL,
  `AmountOut` int(11) NOT NULL,
  `RefundType` text NOT NULL,
  `Date` date NOT NULL,
  `Months` int(11) NOT NULL,
  `Rref` int(11) DEFAULT NULL,
  `PaidAmount` varchar(50) NOT NULL,
  `PaymentOf` varchar(50) NOT NULL,
  `PaidInNumber` int(11) NOT NULL,
  `Reason` text NOT NULL,
  `TotalRefund` int(11) NOT NULL,
  `RefundM` text DEFAULT NULL,
  `RDate` date DEFAULT NULL,
  `RefundRef` int(100) DEFAULT NULL,
  `ID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `accounting`
--

INSERT INTO `accounting` (`Ref`, `studentName`, `studentID`, `studentNationality`, `studentPassportNo`, `intake`, `Level`, `RegistrationFee`, `VisaFee`, `TuitionFee`, `SpecialPass`, `ShortenFee`, `ACFee`, `MFee`, `StudentType`, `TotalFees`, `PaidFees`, `OutFees`, `PaymentM`, `AmountIn`, `AmountOut`, `RefundType`, `Date`, `Months`, `Rref`, `PaidAmount`, `PaymentOf`, `PaidInNumber`, `Reason`, `TotalRefund`, `RefundM`, `RDate`, `RefundRef`, `ID`) VALUES
('3313', 'Fammart', 349, 'BELARUSIAN', 'KFC1111', '', 'Preintermediate 1', 806, 1000, 8000, 6888, 1000, 150, 23, 'Non-Visa Application', 17867, 0, 0, 'TT', 0, 0, '', '2023-07-01', 7, 2, '', '', 0, '', 0, NULL, NULL, 2, 1);

--
-- Triggers `accounting`
--
DELIMITER $$
CREATE TRIGGER `trg_auto_increment_ref` BEFORE INSERT ON `accounting` FOR EACH ROW BEGIN
    IF NEW.Ref IS NULL THEN
        SET NEW.Ref = (SELECT IFNULL(MAX(Ref), 0) + 1 FROM accounting);
    END IF;
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `trg_auto_increment_refundref` BEFORE INSERT ON `accounting` FOR EACH ROW BEGIN
    IF NEW.RefundRef IS NULL THEN
        SET NEW.RefundRef = (SELECT IFNULL(MAX(RefundRef), 0) + 1 FROM accounting);
    END IF;
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `trg_auto_increment_rref` BEFORE INSERT ON `accounting` FOR EACH ROW BEGIN
    IF NEW.Rref IS NULL THEN
        SET NEW.Rref = (SELECT IFNULL(MAX(Rref), 0) + 1 FROM accounting);
    END IF;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `authintication`
--

CREATE TABLE `authintication` (
  `idAuthintication` int(11) NOT NULL,
  `staffName` varchar(45) NOT NULL,
  `UserName` varchar(45) NOT NULL,
  `staffPassword` varchar(45) NOT NULL,
  `user_type` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `authintication`
--

INSERT INTO `authintication` (`idAuthintication`, `staffName`, `UserName`, `staffPassword`, `user_type`) VALUES
(50, 'Kaha', 'Kaha', 'K123', 'Academic'),
(51, 'SirKhan', 'SirKhan1', 'Khan1', 'Admin'),
(52, 'Ahlam', 'Ahlam1', 'A123', 'Marketing'),
(53, 'Raneem', 'Raneem', 'R123', 'Academic'),
(56, 'Sir Abdul Kareem', 'Aka1', 'aka1', 'Admin'),
(57, 'Olga T', 'Lga11', '229900', 'Marketing');

--
-- Triggers `authintication`
--
DELIMITER $$
CREATE TRIGGER `insert_class_staff` AFTER INSERT ON `authintication` FOR EACH ROW BEGIN
  IF NEW.user_type = 'academic' THEN
    INSERT INTO class (idAuthintication, staffName)
    VALUES (NEW.idAuthintication, NEW.staffName);
  END IF;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `class`
--

CREATE TABLE `class` (
  `classID` int(100) NOT NULL,
  `Level` varchar(100) NOT NULL,
  `ClassVenue` varchar(13) DEFAULT NULL,
  `prog` varchar(100) NOT NULL,
  `Time` time NOT NULL,
  `Time1` time NOT NULL,
  `Date` date NOT NULL,
  `TeacherName` text NOT NULL,
  `idAuthintication` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `class`
--

INSERT INTO `class` (`classID`, `Level`, `ClassVenue`, `prog`, `Time`, `Time1`, `Date`, `TeacherName`, `idAuthintication`) VALUES
(2335, 'Starter 1', 'Classroom 1', 'GENERAL ENGLISH COURSE (GES)', '00:54:00', '02:54:00', '2023-07-02', 'Kaha', 0),
(6855, 'Starter 1', 'Classroom 1', 'INTENSIVE ENGLISH COURSE (IES)', '11:55:00', '00:55:00', '2023-07-06', 'Raneem', 0);

-- --------------------------------------------------------

--
-- Table structure for table `class_student`
--

CREATE TABLE `class_student` (
  `classID` int(100) NOT NULL,
  `studentID` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `class_student`
--

INSERT INTO `class_student` (`classID`, `studentID`) VALUES
(2335, 353),
(6855, 344),
(6855, 343),
(6855, 346),
(6855, 359),
(6855, 379),
(6855, 379),
(2335, 380),
(6855, 386),
(6855, 399),
(6855, 344),
(2335, 403),
(6855, 402),
(6855, 359);

--
-- Triggers `class_student`
--
DELIMITER $$
CREATE TRIGGER `update_acadimic_level` AFTER INSERT ON `class_student` FOR EACH ROW BEGIN
    UPDATE acadimic SET Level = (SELECT Level FROM class WHERE classID = NEW.classID) WHERE studentID = NEW.studentID;
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `update_teacher` AFTER INSERT ON `class_student` FOR EACH ROW BEGIN
    UPDATE acadimic
    SET Teacher = (
        SELECT TeacherName
        FROM class
        WHERE class.classID = NEW.classID
    )
    WHERE acadimic.studentID = NEW.studentID;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `course`
--

CREATE TABLE `course` (
  `courseID` int(11) NOT NULL,
  `courseName` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `offerletter`
--

CREATE TABLE `offerletter` (
  `ID` int(11) NOT NULL,
  `Ref` varchar(50) NOT NULL,
  `Date` varchar(50) NOT NULL,
  `Name` varchar(50) NOT NULL,
  `passport` varchar(50) NOT NULL,
  `Nationalty` varchar(50) NOT NULL,
  `prog` varchar(50) NOT NULL,
  `CourseD` varchar(50) NOT NULL,
  `intake` varchar(50) NOT NULL,
  `RVPfee` int(50) NOT NULL,
  `ACPfee` int(50) NOT NULL,
  `Toutionfee` int(50) NOT NULL,
  `other_fees` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `offerletter`
--

INSERT INTO `offerletter` (`ID`, `Ref`, `Date`, `Name`, `passport`, `Nationalty`, `prog`, `CourseD`, `intake`, `RVPfee`, `ACPfee`, `Toutionfee`, `other_fees`) VALUES
(418, '645c62679f541', '23rd May 2023', 'Ahlam Jabbar', '  BY12345678', 'Moroccan', 'INTENSIVE ENGLISH COURSE (IES)', '4', 'June 2023', 100, 100, 100, 100),
(426, '64630ca376413', '12th May 2023', ' Raneem Ash', 'BY12345678', 'Algerian', 'GENERAL ENGLISH COURSE (GES)', '4', 'MAY 2023', 1, 1, 1, 11),
(429, '646322c599188', '10th June 2023', ' Ahlam Nassim', 'N011882934', 'Angolan', 'IELTS PREPARATION COURSE (IELTS)', '2', 'MAY 2023', 2, 0, 2, 2),
(431, '64632de216af4', '10th June 2023', ' Raneem Ash', 'BY12345678', 'Angolan', 'INTENSIVE ENGLISH COURSE (IES)', '6', 'June 2023', 3, 3, 3, 3),
(432, '64632ef06f7a5', '10th June 2023', ' Raneem Ash', 'R12345678', 'Algerian', 'IELTS PREPARATION COURSE (IELTS)', '6', 'June 2023', 3, 3, 33, 3),
(434, '64632ff46017e', '1st June 2023', ' Raneem Ash', 'N011882934', 'Algerian', 'ENGLISH FOR KIDS (EFK)', '3', '3', 3, 3, 3, 3),
(435, '64633043ac77a', '10th June 2023', ' Ahlam Jabbar', 'EEEE', 'Andorran', 'INTENSIVE ENGLISH COURSE (IES)', '6', 'MAY 2023', 1, 1, 1, 1),
(437, '646331ed466ef', '10th June 2023', ' ', 'R12345678', 'Albanian', 'INTENSIVE ENGLISH COURSE (IES)', '1', '1', 1, 1, 1, 1),
(438, '64633234a9295', '1st June 2023', ' khkhkhkhkh', 'N011882934', 'Albanian', 'INTENSIVE ENGLISH COURSE (IES)', '11', '1', 1, 1, 1, 1),
(439, '646332aa35461', '12th May 2023', ' ooooo', 'R12345678', 'Algerian', 'INTENSIVE ENGLISH COURSE (IES)', '1', '1', 1, 1, 1, 1),
(440, '6463330566acc', '12th May 2023', 'llll', '1', 'Afghan', 'GENERAL ENGLISH COURSE (GES)', '1', '1', 1, 1, 1, 1),
(441, '646334042554c', '10th June 2023', 'kk', '1', 'Algerian', 'GENERAL ENGLISH COURSE (GES)', '11', '1', 1, 1, 11, 11),
(443, '646476346ac9d', '16th April 2022', 'Kaka', '12345', 'Afghan', 'GENERAL ENGLISH COURSE (GES)', '1', 'MAY 2023', 1, 0, 1, 1),
(444, '646476346ac9d', '16th April 2022', 'Kaka', '12345', 'Afghan', 'GENERAL ENGLISH COURSE (GES)', '1', 'MAY 2023', 1, 0, 1, 1),
(445, '646476346ac9d', '16th April 2022', 'Kaka', '12345', 'Afghan', 'GENERAL ENGLISH COURSE (GES)', '1', 'MAY 2023', 1, 0, 1, 1),
(446, '646476346ac9d', '16th April 2022', 'Kaka', '12345', 'Afghan', 'GENERAL ENGLISH COURSE (GES)', '1', 'MAY 2023', 1, 0, 1, 1),
(447, '64658f10411b1', '12th May 2023', 'Raneem Ash', 'BY12345678', 'Albanian', 'GENERAL ENGLISH COURSE (GES)', '1', 'MAY 2023', 1, 1, 1, 1),
(448, '646592c495609', '12th May 2023', 'Raneem Ash', 'BY12345678', 'Albanian', 'GENERAL ENGLISH COURSE (GES)', '1', 'MAY 2023', 1, 1, 1, 1),
(449, '6465948025d10', '12th May 2023', 'Raneem Ash', 'BY12345678', 'Afghan', 'GENERAL ENGLISH COURSE (GES)', '1', 'MAY 2023', 1, 1, 1, 1),
(450, '646594ce5f6c4', '12th May 2023', 'Raneem Ash', 'BY12345678', 'Afghan', 'GENERAL ENGLISH COURSE (GES)', '1', 'MAY 2023', 1, 1, 1, 1),
(451, '6465a35e80473', '12th May 2023', 'Raneem Ash', 'BY12345678', 'Albanian', 'GENERAL ENGLISH COURSE (GES)', '1', 'MAY 2023', 1, 1, 1, 1),
(452, '6465a35e80473', '12th May 2023', 'Raneem Ash', 'BY12345678', 'Albanian', 'GENERAL ENGLISH COURSE (GES)', '1', 'MAY 2023', 1, 1, 1, 1),
(453, '6465a3c228104', '12th May 2023', 'Raneem Ash', 'BY12345678', 'Antiguans', 'GENERAL ENGLISH COURSE (GES)', '1', 'MAY 2023', 1, 1, 1, 1),
(454, '6465a40923302', '12th May 2023', 'Raneem Ash', 'BY12345678', 'Albanian', 'GENERAL ENGLISH COURSE (GES)', '1', 'MAY 2023', 1, 1, 1, 1),
(455, '6465a439b4959', '12th May 2023', 'Raneem Ash', 'BY12345678', 'American', 'INTENSIVE ENGLISH COURSE (IES)', '1', 'MAY 2023', 1, 1, 1, 1),
(456, '6465a7f36777c', '12th May 2023', 'Al-HEKRI MOHAMMED AHMED ALI', '10713403', 'Yemenite', 'GENERAL ENGLISH COURSE (GES)', '6', 'MAY 2023', 2000, 320, 8300, 0),
(457, '6465a896f1a3b', '12th May 2023', 'Al-HEKRI MOHAMMED AHMED ALI', '10713403', 'Yemenite', 'GENERAL ENGLISH COURSE (GES)', '6', 'MAY 2023', 2000, 320, 8300, 0),
(458, '6465a896f1a3b', '12th May 2023', 'Al-HEKRI MOHAMMED AHMED ALI', '10713403', 'Yemenite', 'GENERAL ENGLISH COURSE (GES)', '6', 'MAY 2023', 2000, 320, 8300, 0),
(459, '6465a896f1a3b', '12th May 2023', 'Al-HEKRI MOHAMMED AHMED ALI', '10713403', 'Yemenite', 'GENERAL ENGLISH COURSE (GES)', '6', 'MAY 2023', 2000, 320, 8300, 0),
(460, '6465aa6ddcc61', '12th May 2023', 'Al-HEKRI MOHAMMED AHMED ALI', '10713403', 'Yemeni', 'GENERAL ENGLISH COURSE (GES)', '6', 'MAY 2023', 2000, 320, 8300, 0),
(461, '6465ab2c5cbe4', '12th May 2023', 'Al-HEKRI MOHAMMED AHMED ALI', '10713403', 'Yemeni', 'GENERAL ENGLISH COURSE (GES)', '6', 'MAY 2023', 2000, 0, 8300, 0),
(462, '6465ab2c5cbe4', '12th May 2023', 'Al-HEKRI MOHAMMED AHMED ALI', '10713403', 'Yemeni', 'GENERAL ENGLISH COURSE (GES)', '6', 'MAY 2023', 2000, 0, 8300, 0),
(463, '6465ab2c5cbe4', '12th May 2023', 'Al-HEKRI MOHAMMED AHMED ALI', '10713403', 'Yemeni', 'GENERAL ENGLISH COURSE (GES)', '6', 'MAY 2023', 2000, 0, 8300, 0),
(464, '6465aeb7c782c', '12th May 2023', 'Al-HEKRI MOHAMMED AHMED ALI', '10713403', 'Yemeni', 'GENERAL ENGLISH COURSE (GES)', '6', 'MAY 2023', 2000, 0, 8300, 0),
(465, '6466315dcced0', '12th April 2022', 'K', 'P00988720', 'Afghan', 'GENERAL ENGLISH COURSE (GES)', '1', 'MAY 2023', 1, 1, 1, 1),
(467, '646ad098e9d7c', '12th April 2023', 'Miss Raneem', ' A1234567890', 'Afghan', 'GENERAL ENGLISH COURSE (GES)', '1', 'MAY 2023', 1000, 100, 100, 1001),
(468, '646ad0ff86e75', '12th April 2023', 'Ahlam ', ' A12345678901111', 'Moroccan', 'GENERAL ENGLISH COURSE (GES)', '1', 'MAY 2023', 100, 0, 100, 100),
(469, '646b0bdaeec0a', '12th April 2023', 'Kaha Mohamud Haid', 'P00988720', 'Somali', 'GENERAL ENGLISH COURSE (GES)', '1', 'MAY 2023', 100, 100, 100, 100),
(470, '646c28c060e60', '12th April 2023', 'Ahlam Jabbar', 'P00988720', 'American', 'GENERAL ENGLISH COURSE (GES)', '1', 'MAY 2023', 1, 1, 1, 1),
(471, '646c3914e0fda', '12th April 2023', 'Kaha Mohamud Haid', 'P00988720', 'Antiguans', 'IELTS PREPARATION COURSE (IELTS)', '1', 'MAY 2023', 100, 100, 100, 100),
(472, '646c397f50477', '12th April 2023', 'Kaha Mohamud Haid', 'P00988720', 'Algerian', 'INTENSIVE ENGLISH COURSE (IES)', '1', 'MAY 2023', 100, 0, 100, 100),
(473, '646c3d40cfa9a', '12', '1', '1', 'ANTIGUANS', 'INTENSIVE ENGLISH COURSE (IES)', '1', '11', 1, 1, 1, 1),
(474, '646c3d5d15124', '12', '1', '1', 'ANDORRAN', 'INTENSIVE ENGLISH COURSE (IES)', '1', '11', 100, 0, 100, 100),
(475, '646c60cf27c2b', '22nd May 2023', 'Kakashi Hatake', 'k12345678', 'JAPANESE', 'GENERAL ENGLISH COURSE (GES)', '1', 'May 2023', 100, 0, 100, 100),
(476, '646c60fb276fb', '22nd May 2023', 'Kakashi Hatake', 'k12345678', 'JAPANESE', 'GENERAL ENGLISH COURSE (GES)', '1', 'May 2023', 100, 0, 100, 100),
(477, '646c60fb276fb', '22nd May 2023', 'Kakashi Hatake', 'k12345678', 'JAPANESE', 'GENERAL ENGLISH COURSE (GES)', '1', 'May 2023', 100, 0, 100, 100),
(478, '646c60fb276fb', '22nd May 2023', 'Kakashi Hatake', 'k12345678', 'JAPANESE', 'GENERAL ENGLISH COURSE (GES)', '1', 'May 2023', 100, 0, 100, 100),
(479, '64758eb6a7592', '22nd May 2023', 'Ahlam Jabbar', 'BY12345678', 'MOROCCAN', 'GENERAL ENGLISH COURSE (GES)', '3', 'May 2023', 1000, 100, 8200, 50),
(481, '64758f65f10ab', '22nd May 2023', 'Raneem Ashoor', '  R123', 'SYRIAN', 'GENERAL ENGLISH COURSE (GES)', '3', 'May 2023', 100, 0, 8200, 50),
(483, '6475a4bcbf812', '22nd May 2023', 'Raneem Ashoor', 'k12345678', 'ANDORRAN', 'GENERAL ENGLISH COURSE (GES)', '3', 'May 2023', 100, 0, 100, 100),
(484, '647eab6be3bf2', '22nd May 2023', 'Kakashi Hatake', 'R123', 'ANGOLAN', 'INTENSIVE ENGLISH COURSE (IES)', '3', 'May 2023', 100, 0, 100, 100),
(485, '647ed6c4f2a6b', '22nd May 2023', 'Ahlam Jabbar', 'BY12345678', 'MAURITANIAN', 'GENERAL ENGLISH COURSE (GES)', '3', 'May 2023', 100, 0, 100, 100),
(486, '64acf90f10e35', '22th April 2023', 'Kaha Haid', '1234', 'ANDORRAN', 'INTENSIVE ENGLISH COURSE (IES)', '2', 'May 2023', 100, 0, 1000, 100);

-- --------------------------------------------------------

--
-- Table structure for table `receipt`
--

CREATE TABLE `receipt` (
  `Rref` int(100) NOT NULL,
  `studentName` varchar(100) NOT NULL,
  `Date` date NOT NULL,
  `PaymentM` varchar(100) NOT NULL,
  `PaidAmount` varchar(100) NOT NULL,
  `PaymentOf` varchar(100) NOT NULL,
  `PaidInNumber` int(100) NOT NULL,
  `ID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `receipt`
--

INSERT INTO `receipt` (`Rref`, `studentName`, `Date`, `PaymentM`, `PaidAmount`, `PaymentOf`, `PaidInNumber`, `ID`) VALUES
(2805, 'Raneem Ash', '2023-07-13', 'TT', 'eleven thousand two hundred fifty', 'Reg, Visa, Tution Feessss', 12, 1),
(6291, 'Bill Gates', '0000-00-00', 'Cash', 'eleven thousand two hundred fifty', 'tution fees and visa fees', 3, 2);

-- --------------------------------------------------------

--
-- Table structure for table `record`
--

CREATE TABLE `record` (
  `ID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `refund`
--

CREATE TABLE `refund` (
  `RefundRef` int(100) NOT NULL,
  `studentName` varchar(100) NOT NULL,
  `studentNationality` varchar(100) NOT NULL,
  `studentPassportNo` varchar(100) NOT NULL,
  `RDate` date NOT NULL,
  `RefundM` text NOT NULL,
  `TotalRefund` int(100) NOT NULL,
  `Reason` text NOT NULL,
  `Level` varchar(100) NOT NULL,
  `ID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `refund`
--

INSERT INTO `refund` (`RefundRef`, `studentName`, `studentNationality`, `studentPassportNo`, `RDate`, `RefundM`, `TotalRefund`, `Reason`, `Level`, `ID`) VALUES
(7843, 'Raneem Ash', 'BARBADIAN', 'R123', '0000-00-00', 'Local Bank Transfer', 677, 'no', 'General English course', 1);

-- --------------------------------------------------------

--
-- Table structure for table `staff`
--

CREATE TABLE `staff` (
  `staffID` int(11) NOT NULL,
  `staffName` varchar(45) NOT NULL,
  `staffPosition` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `RefNo` varchar(100) NOT NULL,
  `studentID` int(11) NOT NULL,
  `about` text NOT NULL,
  `studentName` varchar(45) DEFAULT NULL,
  `studentNationality` varchar(45) DEFAULT NULL,
  `studentPic` blob DEFAULT NULL,
  `studentStatus` varchar(45) DEFAULT NULL,
  `studentSex` varchar(45) DEFAULT NULL,
  `studentDateOfBirth` date DEFAULT NULL,
  `studentPassportNo` varchar(45) DEFAULT NULL,
  `studentICNo` varchar(45) DEFAULT NULL,
  `studentAddress` varchar(45) DEFAULT NULL,
  `studentPostCode` varchar(45) DEFAULT NULL,
  `studentCity` varchar(45) DEFAULT NULL,
  `studentState` varchar(45) DEFAULT NULL,
  `studentCountry` varchar(45) DEFAULT NULL,
  `studentMobile` varchar(45) DEFAULT NULL,
  `studentMobileW` varchar(45) DEFAULT NULL,
  `studentHouseNo` varchar(45) DEFAULT NULL,
  `studenEmail` varchar(45) DEFAULT NULL,
  `studentPEmail` varchar(45) DEFAULT NULL,
  `studentHow` varchar(45) DEFAULT NULL,
  `studentProgram` varchar(45) DEFAULT NULL,
  `studentStart` date DEFAULT NULL,
  `studentEnd` date DEFAULT NULL,
  `studentIntroducer` varchar(45) DEFAULT NULL,
  `studentCouncelor` varchar(45) DEFAULT NULL,
  `photo` longblob DEFAULT NULL,
  `photo_type` varchar(50) DEFAULT NULL,
  `Status` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`RefNo`, `studentID`, `about`, `studentName`, `studentNationality`, `studentPic`, `studentStatus`, `studentSex`, `studentDateOfBirth`, `studentPassportNo`, `studentICNo`, `studentAddress`, `studentPostCode`, `studentCity`, `studentState`, `studentCountry`, `studentMobile`, `studentMobileW`, `studentHouseNo`, `studenEmail`, `studentPEmail`, `studentHow`, `studentProgram`, `studentStart`, `studentEnd`, `studentIntroducer`, `studentCouncelor`, `photo`, `photo_type`, `Status`) VALUES
('64881a4d973a0', 343, 'Agent', 'Raneem Ash', 'BARBADIAN', '', 'Single', 'Female', '2023-06-01', 'R123', '', 'Mahallah Asiah', '53100', 'Kuala Lumpur', 'Kuala Lumpur', 'BAHAMAS', '0123456789', NULL, 'KFC11', 'A@GMAIL.COM', 'A@GMAIL.COM', NULL, 'INTENSIVE ENGLISH COURSE (IEC)', '2023-05-28', '2023-07-07', 'Raneem', 'Ahlam', NULL, NULL, ''),
('64881ead00755', 344, 'Newspaper', 'Ahlam nassim', 'BAHRAINI', '', 'Single', 'Female', '2023-06-24', 'A123', '', 'Mahallah Asiah', '12345', 'New York', 'Kuala Lumpur', 'AUSTRIA', '0123456789', NULL, 'KFC11', 'K@GMAIL.COM', '1K@GMAIL.COM', NULL, 'INTENSIVE ENGLISH COURSE (IEC)', '2023-06-13', '2023-07-07', 'Raneem', 'Ahlam', NULL, NULL, ''),
('648fc0ab7a3fe', 345, 'Agent', 'Ahlam nassim', 'BAHRAINI', '', 'Single', 'Female', '2023-06-07', 'A123', '', 'Mahallah Asiah', '53100', 'Kuala Lumpur', 'Kuala Lumpur', 'AUSTRIA', '0123456789', NULL, 'B123', 'Ahlam@gmail.com', 'Ahlam@gmail.com', NULL, 'INTENSIVE ENGLISH COURSE (IEC)', '2023-06-06', '2023-07-07', 'Ahlam', 'Raneem', NULL, NULL, ''),
('648fc156b0643', 346, 'Event/ fair', 'Raneem Ash', 'BANGLADESHI', '', 'Single', 'Female', '2023-05-31', 'R123', '', 'Mahallah Asiah', '53100', 'Kuala Lumpur', 'Kuala Lumpur', 'AZERBAIJAN', '0123456789', NULL, 'B123', 'Ahlam@gmail.com', 'Ahlam@gmail.com', NULL, 'ENGLISH FOR KIDS (EFK)', '2023-06-29', '2023-07-08', 'Ahlam', 'Ahlam', NULL, NULL, ''),
('648fc1b3e1a1d', 347, 'Agent', 'Raneem Ash', 'BANGLADESHI', '', 'Single', 'Female', '2023-06-14', 'R123', '', 'Mahallah Asiah', '53100', 'Kuala Lumpur', 'Kuala Lumpur', 'AUSTRIA', '0123456789', NULL, 'B123', 'K@GMAIL.COM', 'Ahlam@gmail.com', NULL, 'IELTS PREPARATION COURSE (IELTS)', '2023-06-30', '2023-07-06', 'Ahlam', 'Ahlam', NULL, NULL, ''),
('648fc43730903', 348, 'Agent', 'Ahlam nassim', 'BARBUDANS', '', 'Single', 'Female', '2023-06-08', 'A123', '', 'Mahallah Asiah', '53100', 'Kuala Lumpur', 'Kuala Lumpur', 'BAHAMAS', '0123456789', NULL, 'B123', 'Ahlam@gmail.com', 'Ahlam@gmail.com', NULL, 'INTENSIVE ENGLISH COURSE (IEC)', '2023-06-07', '2023-06-30', 'Ahlam', 'Ahlam', NULL, NULL, ''),
('648fef63d9b5f', 349, 'School/ Counselor', 'Fammart', 'BELARUSIAN', '', 'Married', 'Male', '2023-06-20', 'KFC1111', '', 'Mahallah Asiah', '12345', 'Kuala Lumpur', 'Kuala Lumpur', 'AZERBAIJAN', '0123456789', NULL, 'KFC11', 'K@GMAIL.COM', '1K@GMAIL.COM', NULL, 'IELTS PREPARATION COURSE (IELTS)', '2023-06-30', '2023-06-22', 'Ahlam', 'Sam', NULL, NULL, ''),
('64910db108498', 350, 'Internet/ social media', 'Raneem Ash', 'ARMENIAN', '', 'Single', 'Female', '2023-06-21', 'R123', '', 'Mahallah Asiah', '53100', 'Kuala Lumpur', 'Kuala Lumpur', 'AUSTRALIA', '0123456789', NULL, 'B123', 'Ahlam@gmail.com', 'Ahlam@gmail.com', NULL, 'IELTS PREPARATION COURSE (IELTS)', '2023-06-24', '2023-07-08', 'A', 'Ahlam', NULL, NULL, ''),
('649914d850f7e', 351, 'Friend', 'Ahlam Nassima', 'AMERICAN', '', 'Single', 'Female', '2023-06-16', 'A123', '', 'ASIAH', '53100', 'Kuala Lumpur', 'Kuala Lumpur', 'AMERICAN SAMOA', '12345789', NULL, 'B123', 'Ahlam@gmail.com', 'Ahlam@gmail.com', NULL, 'IELTS PREPARATION COURSE (IELTS)', '2023-06-20', '2023-07-08', 'SAM', 'SAM', NULL, NULL, ''),
('64991775dddd2', 352, '', 'Ahlam Nassima', 'BAHAMIAN', '', 'Single', 'Female', '2023-05-31', 'A123', '', 'ASIAH', '53100', 'Kuala Lumpur', 'Kuala Lumpur', 'AZERBAIJAN', '12345789', NULL, 'B123', 'Ahlam@gmail.com', 'Ahlam@gmail.com', NULL, 'INTENSIVE ENGLISH COURSE (IEC)', '2023-06-07', '2023-06-30', 'SAM', 'SAM', NULL, NULL, ''),
('649a50bdcd975', 353, 'School/ Counselor', 'Elite Desk', 'Barbadian', '', 'Single', 'Male', '2023-06-15', '123123', '', 'ASIAH', '53100', 'Kuala Lumpur', 'Kuala Lumpur', '', '12345789', NULL, 'B123', 'Ahlam@gmail.com', 'Ahlam@gmail.com', NULL, 'IELTS PREPARATION COURSE (IELTS)', '2023-06-23', '2023-06-28', 'SAM', 'SAM', NULL, NULL, ''),
('64acc26548c67', 358, 'Event/ fair', 'LAKADJF', 'BARBADIAN', '', 'Single', 'Female', '2023-07-04', '123123123', '', 'A', '123', 'A', 'A', 'AUSTRIA', '123', NULL, 'A', 'A@GMAIL.COM', 'A@GMAIL.COM', NULL, 'IELTS PREPARATION COURSE (IELTS)', '2023-07-17', '2023-08-03', 'LLL', 'LLL', NULL, NULL, ''),
('64acc51a99e02', 359, '', 'Ahlam Jabbar', 'MOROCCAN', '', 'Single', 'Female', '2023-07-01', 'BY123457', '-', 'Mahallah Asiah', '123', 'Kuala Lumpur', 'Kuala Lumpur', 'MOROCCO', '+601163520', NULL, 'B-12-7', 'ahlam@gmail.com', 'ahlam@gmail.com', NULL, 'GENERAL ENGLISH COURSE (GEC)', '2023-07-01', '2023-08-01', 'Raneem', 'Raneem', NULL, NULL, ''),
('64acf0dea8401', 360, 'Event/ fair', 'LALA', 'BARBADIAN', '', 'Single', 'Female', '2023-07-05', 'BY123457', '', 'Mahallah Asiah', '53100', 'Kuala Lumpur', 'Kuala Lumpur', 'AZERBAIJAN', '+601163520', NULL, 'B-12-7', 'A@GMAIL.COM', 'A@GMAIL.COM', NULL, 'GENERAL ENGLISH COURSE (GEC)', '2023-06-27', '2023-08-03', 'LLL', 'LLL', NULL, NULL, ''),
('64acfbfe5486c', 361, 'Agent', 'Ahlam Jabbar', 'LIECHTENSTEINER', '', 'Single', 'Female', '2023-07-06', 'BY123457', '', 'Mahallah Asiah', '53100', 'Kuala Lumpur', 'Kuala Lumpur', 'AUSTRALIA', '+601163520', NULL, 'B-12-7', 'ahlam@gmail.com', 'ahlam@gmail.com', NULL, 'INTENSIVE ENGLISH COURSE (IEC)', '2023-07-07', '2023-08-03', 'Raneem', 'Raneem', NULL, NULL, ''),
('64b4afdb4aac5', 362, 'Event/ fair', 'Ahlam Jabbar', 'AZERBAIJANI', NULL, 'Single', 'Female', '2023-07-13', 'BY123457', '-', 'Mahallah Asiah', '53100', 'Kuala Lumpur', 'Kuala Lumpur', 'AZERBAIJAN', '+601163520', NULL, 'B-12-7', 'ahlam@gmail.com', 'ahlam@gmail.com', NULL, 'INTENSIVE ENGLISH COURSE (IEC)', '2023-07-05', '2023-07-17', 'Raneem', 'Raneem', '', NULL, ''),
('64b4b7540ab47', 363, 'Internet/ social media', 'Ahlam Jabbar', 'BARBUDANS', 0x646f776e6c6f61642e6a7067, 'Single', 'Female', '2023-07-13', 'BY123457', '-', 'Mahallah Asiah', '53100', 'A', 'Kuala Lumpur', 'BAHAMAS', '+601163520', NULL, 'B-12-7', 'ahlam@gmail.com', 'ahlam@gmail.com', NULL, 'GENERAL ENGLISH COURSE (GEC)', '2023-07-28', '2023-07-17', 'Raneem', 'Raneem', NULL, NULL, ''),
('64b4c28ceb585', 364, 'Event/ fair', 'Ahlam Jabbar', 'BAHRAINI', 0x646f776e6c6f61642e6a7067, 'Single', 'Female', '2023-07-12', 'BY123457', '-', 'Mahallah Asiah', '53100', 'Kuala Lumpur', 'Kuala Lumpur', 'BAHAMAS', '+601163520', NULL, 'B-12-7', 'ahlam@gmail.com', 'ahlam@gmail.com', NULL, 'INTENSIVE ENGLISH COURSE (IEC)', '2023-07-04', '2023-07-17', 'Raneem', 'Raneem', NULL, NULL, ''),
('64b4c5155d6dc', 365, 'Event/ fair', 'LAKADJF', 'BANGLADESHI', 0x646f776e6c6f61642e6a7067, 'Single', 'Female', '2023-07-04', 'BY123457', '-', 'Mahallah Asiah', '53100', 'Kuala Lumpur', 'Kuala Lumpur', 'AUSTRIA', '+601163520', NULL, 'B-12-7', 'ahlam@gmail.com', 'ahlam@gmail.com', NULL, 'IELTS PREPARATION COURSE (IELTS)', '2023-07-13', '2023-07-20', 'Raneem', 'Raneem', NULL, NULL, ''),
('64b4dd5d8cec3', 366, 'Event/ fair', 'Ahlam Jabbar', 'BARBADIAN', '', 'Single', 'Male', '2023-07-05', 'BY123457', '-', 'Mahallah Asiah', '53100', 'Kuala Lumpur', 'Kuala Lumpur', 'AZERBAIJAN', '+601163520', NULL, 'B-12-7', 'ahlam@gmail.com', 'ahlam@gmail.com', NULL, 'INTENSIVE ENGLISH COURSE (IEC)', '2023-07-27', '2023-08-05', 'Raneem', 'Raneem', NULL, NULL, ''),
('64b4e0b51551f', 367, 'Internet/ social media', 'Kaha', 'BATSWANA', '', 'Single', 'Female', '2023-06-27', 'BY123457', '-', 'Mahallah Asiah', '53100', 'Kuala Lumpur', 'Kuala Lumpur', 'BAHRAIN', '+601163520', NULL, 'B-12-7', 'ahlam@gmail.com', 'ahlam@gmail.com', NULL, 'IELTS PREPARATION COURSE (IELTS)', '2023-07-27', '2023-08-05', 'Raneem', 'Raneem', NULL, NULL, ''),
('64b4e2e1932c8', 368, 'Newspaper', 'Ahlam Jabbar', 'BATSWANA', '', 'Single', 'Female', '2023-07-14', 'BY123457', '-', 'Mahallah Asiah', '53100', 'Kuala Lumpur', 'Kuala Lumpur', 'AUSTRIA', '+601163520', NULL, 'B-12-7', 'ahlam@gmail.com', 'ahlam@gmail.com', NULL, 'INTENSIVE ENGLISH COURSE (IEC)', '2023-07-12', '2023-08-04', 'Raneem', 'Raneem', NULL, NULL, ''),
('64b4e3d0049c8', 369, 'Friend', 'Ahlam Jabbar', 'BARBADIAN', 0x3f3f3f3f00104a464946000101000001000100003f3f003f000a0708151515181516151818181a1c1a1a181c18181818151a1818181a191a1819181c212e251c1e2b1f18162638262b2f313535351a243b403b343f2e343531010c0c0c100f101f12121f, 'Single', 'Female', '2023-07-13', 'BY123457', '-', 'Mahallah Asiah', '53100', 'Kuala Lumpur', 'Kuala Lumpur', 'AZERBAIJAN', '+601163520', NULL, 'B-12-7', 'ahlam@gmail.com', 'ahlam@gmail.com', NULL, 'INTENSIVE ENGLISH COURSE (IEC)', '2023-07-05', '2023-07-28', 'Raneem', 'Raneem', NULL, NULL, ''),
('64b4e59c59633', 370, 'Event/ fair', 'Ahlam Jabbar', 'AUSTRIAN', 0x75706c6f6164732f646f776e6c6f61642e6a7067, 'Single', 'Female', '2023-07-06', 'BY123457', '-', 'Mahallah Asiah', '53100', 'Kuala Lumpur', 'Kuala Lumpur', 'AUSTRALIA', '+601163520', NULL, 'B-12-7', 'ahlam@gmail.com', 'ahlam@gmail.com', NULL, 'IELTS PREPARATION COURSE (IELTS)', '2023-07-20', '2023-08-04', 'Raneem', 'Raneem', NULL, NULL, ''),
('64b4e5dadfc8c', 371, 'Event/ fair', 'Ahlam Jabbar', 'AUSTRIAN', 0x3f3f3f3f00104a464946000101000001000100003f3f003f000a0708151515181516151818181a1c1a1a181c18181818151a1818181a191a1819181c212e251c1e2b1f18162638262b2f313535351a243b403b343f2e343531010c0c0c100f101f12121f, 'Single', 'Female', '2023-07-06', 'BY123457', '-', 'Mahallah Asiah', '53100', 'Kuala Lumpur', 'Kuala Lumpur', 'AUSTRALIA', '+601163520', NULL, 'B-12-7', 'ahlam@gmail.com', 'ahlam@gmail.com', NULL, 'IELTS PREPARATION COURSE (IELTS)', '2023-07-20', '2023-08-04', 'Raneem', 'Raneem', NULL, NULL, ''),
('64b4e67f2f035', 372, 'Event/ fair', 'Ahlam Jabbar', 'BARBADIAN', 0x646f776e6c6f61642e6a7067, 'Married', 'Female', '2023-06-29', 'BY123457', '-', 'Mahallah Asiah', '53100', 'Kuala Lumpur', 'Kuala Lumpur', 'AZERBAIJAN', '+601163520', NULL, 'B-12-7', 'ahlam@gmail.com', 'ahlam@gmail.com', NULL, 'INTENSIVE ENGLISH COURSE (IEC)', '2023-07-29', '2023-08-05', 'Raneem', 'Raneem', NULL, NULL, ''),
('64b4e726c822f', 373, 'Event/ fair', 'Ahlam Jabbar', 'BARBADIAN', 0x4e6577424c432f646f776e6c6f61642e6a7067, 'Married', 'Female', '2023-06-29', 'BY123457', '-', 'Mahallah Asiah', '53100', 'Kuala Lumpur', 'Kuala Lumpur', 'AZERBAIJAN', '+601163520', NULL, 'B-12-7', 'ahlam@gmail.com', 'ahlam@gmail.com', NULL, 'INTENSIVE ENGLISH COURSE (IEC)', '2023-07-29', '2023-08-05', 'Raneem', 'Raneem', NULL, NULL, ''),
('64b4e7330f5c8', 374, 'Event/ fair', 'Kaha', 'BANGLADESHI', 0x4e6577424c432f646f776e6c6f61642e6a7067, 'Single', 'Female', '2023-07-13', 'BY123457', '-', 'Mahallah Asiah', '53100', 'Kuala Lumpur', 'Kuala Lumpur', 'BAHAMAS', '+601163520', NULL, 'B-12-7', 'ahlam@gmail.com', 'ahlam@gmail.com', NULL, 'INTENSIVE ENGLISH COURSE (IEC)', '2023-06-27', '2023-08-05', 'Raneem', 'Raneem', NULL, NULL, ''),
('64b4e9a6e2c2b', 375, 'Newspaper', 'Ahlam Jabbar', 'BARBADIAN', 0x433a0a6d70706874646f63734e6577424c432f646f776e6c6f61642e6a7067, 'Single', 'Male', '2023-07-06', 'BY123457', '-', 'Mahallah Asiah', '53100', 'Kuala Lumpur', 'Kuala Lumpur', 'BAHAMAS', '+601163520', NULL, 'B-12-7', 'ahlam@gmail.com', 'ahlam@gmail.com', NULL, 'GENERAL ENGLISH COURSE (GEC)', '2023-07-04', '2023-07-27', 'Raneem', 'Raneem', NULL, NULL, ''),
('64b4f227ba0e4', 376, 'Agent', 'Kaha', 'BANGLADESHI', 0x433a0a6d70706874646f63734e6577424c432f746573747474742e6a7067, 'Single', 'Female', '2023-06-28', 'BY123457', '-', 'Mahallah Asiah', '53100', 'Kuala Lumpur', 'Kuala Lumpur', 'BAHAMAS', '+601163520', NULL, 'B-12-7', 'ahlam@gmail.com', 'ahlam@gmail.com', NULL, 'INTENSIVE ENGLISH COURSE (IEC)', '2023-07-04', '2023-08-04', 'Raneem', 'Raneem', NULL, NULL, ''),
('64b4f2e762ec9', 377, 'Internet/ social media', 'Kaha Haid', 'BATSWANA', 0x433a0a6d70706874646f63734e6577424c432f746573747474742e6a7067, 'Single', 'Male', '2023-06-29', 'BY123457', '-', 'Mahallah Asiah', '53100', 'Kuala Lumpur', 'Kuala Lumpur', 'BAHRAIN', '+601163520', NULL, 'B-12-7', 'ahlam@gmail.com', 'ahlam@gmail.com', NULL, 'GENERAL ENGLISH COURSE (GEC)', '2023-07-18', '2023-08-05', 'Raneem', 'Raneem', NULL, NULL, ''),
('64b4f403d9aec', 378, 'Internet/ social media', 'Kaha', 'BARBADIAN', 0x4e6577424c432f746573747474742e6a7067, 'Single', 'Female', '2023-07-20', 'BY123457', '-', 'Mahallah Asiah', '53100', 'Kuala Lumpur', 'Kuala Lumpur', 'BAHAMAS', '+601163520', NULL, 'B-12-7', 'ahlam@gmail.com', 'ahlam@gmail.com', NULL, 'INTENSIVE ENGLISH COURSE (IEC)', '2023-07-29', '2023-08-05', 'Raneem', 'Raneem', NULL, NULL, ''),
('64b5f71361300', 379, 'Internet/ social media', 'Ahlam Jabbar', 'BARBUDANS', 0x4e6577424c432f646f776e6c6f61642e6a7067, 'Single', 'Female', '2023-06-28', 'BY123457', '-', 'Mahallah Asiah', '53100', 'Kuala Lumpur', 'Kuala Lumpur', 'BAHAMAS', '+601163520', NULL, 'B-12-7', 'ahlam@gmail.com', 'ahlam@gmail.com', NULL, 'ENGLISH FOR KIDS (EFK)', '2023-07-20', '2023-07-22', 'Raneem', 'Raneem', NULL, NULL, ''),
('64b6035f44a5d', 380, 'Newspaper', 'Kahaaa', 'BANGLADESHI', 0x4e6577424c432f646f776e6c6f61642e6a7067, 'Single', 'Female', '2023-07-12', 'BY123457', '-', 'Mahallah Asiah', '53100', 'Kuala Lumpur', 'Kuala Lumpur', 'AZERBAIJAN', '+601163520', NULL, 'B-12-7', 'ahlam@gmail.com', 'ahlam@gmail.com', NULL, 'INTENSIVE ENGLISH COURSE (IEC)', '2023-07-07', '2023-08-04', 'Raneem', 'Raneem', NULL, NULL, ''),
('64b62f5a54dc0', 381, 'Internet/ social media', 'Lala', 'AZERBAIJANI', 0x75706c6f6164732f646f776e6c6f61642e6a7067, 'Single', 'Male', '2023-07-06', 'BY123457', '-', 'Mahallah Asiah', '53100', 'Kuala Lumpur', 'Kuala Lumpur', 'BAHAMAS', '+601163520', NULL, 'B-12-7', 'ahlam@gmail.com', 'ahlam@gmail.com', NULL, 'IELTS PREPARATION COURSE (IELTS)', '2023-07-06', '2023-08-03', 'Raneem', 'Raneem', NULL, NULL, ''),
('64b63570831a5', 382, 'Internet/ social media', 'JSHAKdg', 'BARBADIAN', 0x75706c6f6164732f746573747474742e6a7067, 'Single', 'Male', '2023-07-21', 'BY123457', '-', 'Mahallah Asiah', '53100', 'Kuala Lumpur', 'Kuala Lumpur', 'AZERBAIJAN', '+601163520', NULL, 'B-12-7', 'ahlam@gmail.com', 'ahlam@gmail.com', NULL, 'IELTS PREPARATION COURSE (IELTS)', '2023-07-13', '2023-08-02', 'Raneem', 'Raneem', NULL, NULL, ''),
('64b63ba0a1003', 383, 'Event/ fair', 'KAKA', 'BANGLADESHI', 0x75706c6f6164732f746573747474742e6a7067, 'Married', 'Female', '2023-07-14', 'BY123457', '-', 'Mahallah Asiah', '53100', 'Kuala Lumpur', 'Kuala Lumpur', 'AUSTRIA', '+601163520', NULL, 'B-12-7', 'ahlam@gmail.com', 'ahlam@gmail.com', NULL, 'INTENSIVE ENGLISH COURSE (IEC)', '2023-07-22', '2023-08-05', 'Raneem', 'Raneem', NULL, NULL, ''),
('64b64060996b7', 384, 'Event/ fair', 'Ssfaf', 'BARBADIAN', 0x75706c6f6164732f646f776e6c6f61642e6a7067, 'Single', 'Male', '2023-07-13', 'BY123457', '-', 'Mahallah Asiah', '53100', 'Kuala Lumpur', 'Kuala Lumpur', 'BAHAMAS', '+601163520', NULL, 'B-12-7', 'ahlam@gmail.com', 'ahlam@gmail.com', NULL, 'IELTS PREPARATION COURSE (IELTS)', '2023-07-14', '2023-07-13', 'Raneem', 'Raneem', NULL, NULL, ''),
('64be05cd76408', 385, 'Internet/ social media', 'Ahlam Jabbar', 'BARBADIAN', 0x75706c6f6164732f646f776e6c6f61642e6a7067, 'Single', 'Female', '2023-06-29', 'BY123457', '-', 'Mahallah Asiah', '53100', 'Kuala Lumpur', 'Kuala Lumpur', 'AUSTRIA', '+601163520', NULL, 'B-12-7', 'ahlam@gmail.com', 'ahlam@gmail.com', NULL, 'INTENSIVE ENGLISH COURSE (IEC)', '2023-07-12', '2023-07-27', 'Raneem', 'Raneem', NULL, NULL, ''),
('64bf33d1b712b', 386, 'Event/ fair', 'Elon Musk', 'AMERICAN', 0x75706c6f6164732f6c6f676f322e706e67, 'Married', 'Male', '2023-07-04', 'ELON123', '-', 'TWITTER', '12345', 'New York', 'New York', 'SOUTH AFRICAN', '1234579', NULL, 'B-12-7', 'elon@gmail.com', 'elonsdad@gmail.com', NULL, 'INTENSIVE ENGLISH COURSE (IEC)', '2023-07-19', '2023-08-04', 'Bill Gates', 'Bill Gates', NULL, NULL, ''),
('64bf3569b42eb', 387, 'Internet/ social media', 'Bill Gates', 'AMERICAN', 0x75706c6f6164732f6c6f676f2e706e67, 'Married', 'Male', '2023-06-27', 'Bill1234', '-', 'Facebook', '53100', 'New York', 'New York', 'AMERICAN SAMOA', '+601163520', NULL, 'B-12-7', 'Bill@gmail.com', 'BillsDad@gmail.com', NULL, 'GENERAL ENGLISH COURSE (GEC)', '2023-07-27', '2023-08-05', 'ELON MUSK', 'ELON MUSK', NULL, NULL, ''),
('64bf390fad7b0', 388, 'Internet/ social media', 'Raneem', 'BAHAMIAN', 0x75706c6f6164732f746573747474742e6a7067, 'Single', 'Female', '2023-06-29', 'P0BHFUVTB', '-', 'TWITTER', '53100', 'New York', 'New York', 'ARUBA', '+601163520', NULL, 'B-12-7', 'elon@gmail.com', 'elonsdad@gmail.com', NULL, 'IELTS PREPARATION COURSE (IELTS)', '2023-07-13', '2023-08-05', 'Bill Gates', 'ELON MUSK', NULL, NULL, 'Completed'),
('64bf3ea371918', 389, 'Agent', 'Kaha Kaha', 'BARBADIAN', 0x75706c6f6164732f646f776e6c6f61642e6a7067, 'Married', 'Male', '2023-07-22', 'Bill1234bbbb', '-', 'TWITTER', '53100', 'New York', 'Kuala Lumpur', 'AUSTRALIA', '+601163520', NULL, 'B-12-7', 'elon@gmail.com', 'BillsDad@gmail.com', NULL, 'IELTS PREPARATION COURSE (IELTS)', '2023-07-26', '2023-08-05', 'Bill Gates', 'ELON MUSK', NULL, NULL, ''),
('64bf3f0c12fce', 390, 'Event/ fair', 'Gojo', 'BAHAMIAN', 0x75706c6f6164732f696d616765732e6a706567, 'Single', 'Male', '2023-07-13', 'gojojojoj', '-', 'TWITTER', '53100', 'Kuala Lumpur', '', 'BAHAMAS', '+601163520', NULL, 'A', 'A@GMAIL.COM', 'BillsDad@gmail.com', NULL, 'GENERAL ENGLISH COURSE (GEC)', '2023-07-13', '2023-08-04', 'ELON MUSK', 'Bill Gates', NULL, NULL, ''),
('64bf53202d574', 391, 'Internet/ social media', 'ffff', 'BATSWANA', 0x75706c6f6164732f646f776e6c6f61642e6a7067, 'Single', 'Male', '2023-07-12', 'BY123457fff', '-', 'TWITTERffff', '53100', 'New York', 'New York', 'BANGLADESH', '+601163520', NULL, 'B-12-7', 'f@gmail.com', 'f@gmail.com', NULL, 'INTENSIVE ENGLISH COURSE (IEC)', '2023-07-07', '2023-08-04', 'Bill Gates', 'ELON MUSK', NULL, NULL, 'Completed'),
('64bf53507b357', 392, 'Internet/ social media', 'ffffn', 'BATSWANA', 0x3f, 'Single', 'Male', '2023-07-12', 'BY123457fffnn', '-', 'TWITTERffff', '53100', 'New York', 'New York', 'BANGLADESH', '+601163520', NULL, 'B-12-7', 'f@gmail.com', 'f@gmail.com', NULL, 'INTENSIVE ENGLISH COURSE (IEC)', '2023-07-07', '2023-08-04', 'Bill Gates', 'ELON MUSK', NULL, NULL, ''),
('64bf538a46587', 393, 'Event/ fair', 'Ahlam Jabbar', 'BARBUDANS', 0x75706c6f6164732f746573747474742e6a7067, 'Married', 'Female', '2023-07-13', 'BY1234571111', '-', 'A', '53100', 'New York', 'Kuala Lumpur', 'BAHAMAS', '+601163520', NULL, 'B-12-7', 'ahlam@gmail.com', 'ahlam@gmail.com', NULL, 'IELTS PREPARATION COURSE (IELTS)', '2023-07-20', '2023-07-28', 'Raneem', 'Raneem', NULL, NULL, ''),
('64bf57629a50c', 394, 'Internet/ social media', 'Khaaa', 'BARBADIAN', 0x75706c6f6164732f646f776e6c6f61642e6a7067, 'Single', 'Female', '2023-07-07', 'BY123457aaaa', '-', 'Facebook', '53100', 'Kuala Lumpur', 'Kuala Lumpur', 'BAHRAIN', '+601163520', NULL, 'B-12-7', 'ahlam@gmail.com', 'ahlam@gmail.com', NULL, 'IELTS PREPARATION COURSE (IELTS)', '2023-07-29', '2023-08-05', 'Raneem', 'Raneem', NULL, NULL, ''),
('64bf69600470c', 395, 'Event/ fair', 'LEMO', 'BAHRAINI', 0x75706c6f6164732f6c6f676f322e706e67, 'Single', 'Female', '2023-06-29', 'BY123457222222', '-', 'Facebook', '53100', 'New York', 'Kuala Lumpur', 'AZERBAIJAN', '+601163520', NULL, 'A', 'Bill@gmail.com', 'BillsDad@gmail.com', NULL, 'GENERAL ENGLISH COURSE (GEC)', '2023-07-27', '2023-07-15', 'Bill Gates', 'Raneem', NULL, NULL, ''),
('64bf6b4355e78', 396, 'Internet/ social media', 'Jane Fahi John Oo', 'Malay', 0x75706c6f6164732f34393432313131372e6a706567, 'Single', 'Female', '2023-06-30', 'P00988720', '-', 'Platinum Hill PV6', '53100', 'Kuala Lumpur', 'Kuala Lumpur', 'Malaysia', '+601169395920', NULL, 'B-12-7', 'JaneFahi@gmail.com', 'JaneFahi@gmail.com', NULL, 'GENERAL ENGLISH COURSE (GEC)', '2023-08-01', '2023-09-01', 'Raneem Ashoor', 'Ahlam Jabbar', NULL, NULL, 'Completed'),
('64c71d29b0e96', 399, 'Friend', 'Hp Windows', 'ANGOLAN', 0x75706c6f6164732f746573747474742e6a7067, 'Single', 'Male', '2023-07-20', '120012', '', '10/23 tamarind square', '3322445', 'Selangor', 'Seri Kembangan', 'CONGO', '00601111373426', NULL, '00601111373426', 'elmahennache@gmail.com', 'dsn@hotmail.com', NULL, 'IELTS PREPARATION COURSE (IELTS)', '2023-07-27', '2023-06-27', 'Ahmed', 'Khan', NULL, NULL, 'Completed'),
('64e73c1dcf3e6', 400, 'Internet/ social media', 'Raneem', 'BAHAMIAN', 0x75706c6f6164732f646f776e6c6f61642e6a7067, 'Single', 'Female', '2023-06-29', 'P0BHFUVTB', '-', 'TWITTER', '53100', 'New York', 'New York', 'ARUBA', '+601163520', NULL, 'B-12-7', 'elon@gmail.com', 'elonsdad@gmail.com', NULL, 'IELTS PREPARATION COURSE (IELTS)', '2023-07-13', '2023-08-05', 'Bill Gates', 'ELON MUSK', NULL, NULL, 'Completed'),
('64eedda88ec62', 401, 'Agent', 'Ahlam Jabbar', 'BAHRAINI', 0x75706c6f6164732f646f776e6c6f61642e6a7067, 'Single', 'Female', '2023-09-01', 'P0BHFUVTB', '-', 'PLATINUM HILL PV6', '53100', 'JALAN MELATI UTAMA 1, MELATI UTAMA', 'KUALA LUMPUR', 'MALAYSIA', '01123399864', NULL, 'B-12-7', 'manhalhospital1312@gmail.com', 'manhalhospital1312@gmail.com', NULL, 'INTENSIVE ENGLISH COURSE (IEC)', '2023-08-04', '2023-08-23', 'Raneem', 'Raneem', NULL, NULL, 'Active'),
('64eeddc73dd62', 402, 'Internet/ social media', 'Kaha Mohamud Mohamed Haid ', 'BAHRAINI', 0x75706c6f6164732f746573747474742e6a7067, 'Single', 'Male', '2023-08-10', 'BY1234571111', '-', 'PLATINUM HILL PV6', '53100', 'JALAN MELATI UTAMA 1, MELATI UTAMA', 'KUALA LUMPUR', 'MALAYSIA', '01123399864', NULL, 'B-12-7', 'manhalhospital1312@gmail.com', 'manhalhospital1312@gmail.com', NULL, 'IELTS PREPARATION COURSE (IELTS)', '2023-08-19', '2023-09-09', 'Raneem', 'Raneem', NULL, NULL, 'Active'),
('64eeddeab86a0', 403, 'Internet/ social media', 'Raneem Ashoor', 'BAHAMIAN', 0x75706c6f6164732f746573747474742e6a7067, 'Single', 'Female', '2023-08-17', 'Bill1234', '-', 'PLATINUM HILL PV6', '53100', 'JALAN MELATI UTAMA 1, MELATI UTAMA', 'KUALA LUMPUR', 'MALAYSIA', '01123399864', NULL, 'B-12-7', 'manhalhospital1312@gmail.com', 'manhalhospital1312@gmail.com', NULL, 'INTENSIVE ENGLISH COURSE (IEC)', '2023-08-05', '2023-09-08', 'Raneem', 'Raneem', NULL, NULL, 'Completed'),
('64eede841111b', 404, 'Event/ fair', 'LAKADJF', 'BAHRAINI', 0x75706c6f6164732f746573747474742e6a7067, 'Single', 'Male', '2023-09-08', 'Bill1234444', '-', 'PLATINUM HILL PV6', '53100', 'JALAN MELATI UTAMA 1, MELATI UTAMA', 'KUALA LUMPUR', 'MALAYSIA', '01123399864', NULL, 'B-12-7', 'manhalhospital1312@gmail.com', 'manhalhospital1312@gmail.com', NULL, 'INTENSIVE ENGLISH COURSE (IEC)', '2023-08-03', '2023-09-03', 'Raneem', 'Raneem', NULL, NULL, 'Active'),
('64eede9fefb6f', 405, 'Event/ fair', 'Ahlam Jabbarerr', 'BAHAMIAN', 0x75706c6f6164732f646f776e6c6f61642e6a7067, 'Single', 'Female', '2023-08-19', 'BY1234575555', '-', 'PLATINUM HILL PV6', '53100', 'JALAN MELATI UTAMA 1, MELATI UTAMA', 'KUALA LUMPUR', 'MALAYSIA', '01123399864', NULL, 'B-12-7', 'manhalhospital1312@gmail.com', 'manhalhospital1312@gmail.com', NULL, 'INTENSIVE ENGLISH COURSE (IEC)', '2023-08-19', '2023-09-09', 'Kaha', 'Ahlam Jabbar', NULL, NULL, 'Completed'),
('64eedebfda242', 406, 'Newspaper', 'Kahagg', 'BARBUDANS', 0x75706c6f6164732f746573747474742e6a7067, 'Single', 'Male', '2023-08-25', 'BY123457ffftttt', '-', 'MANHAL HOSPITAL', 'Somalia', '757P+FHX, Bosaso', 'PUNTLAND', 'SOMALI', '+252907080199', NULL, 'B-12-7', 'manhalhospital1312@gmail.com', 'manhalhospital1312@gmail.com', NULL, 'INTENSIVE ENGLISH COURSE (IEC)', '2023-08-11', '2023-09-09', 'Raneem', 'Raneem', NULL, NULL, 'Completed'),
('64eededf5ebac', 407, 'Event/ fair', 'LAKADJFdd', 'AZERBAIJANI', 0x75706c6f6164732f746573747474742e6a7067, 'Single', 'Male', '2023-09-01', 'Bill1234555', '-', 'PLATINUM HILL PV6', '53100', 'JALAN MELATI UTAMA 1, MELATI UTAMA', 'KUALA LUMPUR', 'MALAYSIA', '01123399864', NULL, 'B-12-7', 'manhalhospital1312@gmail.com', 'manhalhospital1312@gmail.com', NULL, 'INTENSIVE ENGLISH COURSE (IEC)', '2023-09-02', '2023-09-09', 'Raneem Ashoor', 'Bill Gates', NULL, NULL, 'Completed'),
('64eedf071fdda', 408, 'Event/ fair', 'ffff', 'BAHRAINI', 0x75706c6f6164732f746573747474742e6a7067, 'Single', 'Male', '2023-08-24', 'BY123457ffffff', '-', 'PLATINUM HILL PV6', '53100', 'JALAN MELATI UTAMA 1, MELATI UTAMA', 'KUALA LUMPUR', 'MALAYSIA', '01123399864', NULL, 'B-12-7', 'manhalhospital1312@gmail.com', 'manhalhospital1312@gmail.com', NULL, 'GENERAL ENGLISH COURSE (GEC)', '2023-08-26', '2023-09-08', 'Raneem', 'Raneem', NULL, NULL, 'Completed'),
('64eee17df34b7', 409, 'Event/ fair', 'Ahlam Jabbar', 'BARBADIAN', 0x75706c6f6164732f646f776e6c6f61642e6a7067, 'Single', 'Female', '2023-08-25', 'Bill1234676767', '-', 'PLATINUM HILL PV6', '53100', 'JALAN MELATI UTAMA 1, MELATI UTAMA', 'KUALA LUMPUR', 'MALAYSIA', '01123399864', NULL, 'B-12-7', 'manhalhospital1312@gmail.com', 'manhalhospital1312@gmail.com', NULL, 'INTENSIVE ENGLISH COURSE (IEC)', '2023-08-05', '2023-09-09', 'Kaha', 'Raneem', NULL, NULL, 'Completed');

--
-- Triggers `student`
--
DELIMITER $$
CREATE TRIGGER `insert_acadimic` AFTER INSERT ON `student` FOR EACH ROW BEGIN
    INSERT INTO acadimic (studentID, studentName, studentPassportNo, studentCountry) 
    VALUES (NEW.studentID, NEW.studentName, NEW.studentPassportNo, NEW.studentCountry);
END
$$
DELIMITER ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `acadimic`
--
ALTER TABLE `acadimic`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `studentID` (`studentID`);

--
-- Indexes for table `accounting`
--
ALTER TABLE `accounting`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `authintication`
--
ALTER TABLE `authintication`
  ADD PRIMARY KEY (`idAuthintication`);

--
-- Indexes for table `class`
--
ALTER TABLE `class`
  ADD PRIMARY KEY (`classID`),
  ADD KEY `ID` (`classID`),
  ADD KEY `ID_2` (`classID`),
  ADD KEY `staffID` (`idAuthintication`);

--
-- Indexes for table `class_student`
--
ALTER TABLE `class_student`
  ADD KEY `student_id` (`studentID`),
  ADD KEY `class_id` (`classID`);

--
-- Indexes for table `course`
--
ALTER TABLE `course`
  ADD PRIMARY KEY (`courseID`);

--
-- Indexes for table `offerletter`
--
ALTER TABLE `offerletter`
  ADD PRIMARY KEY (`ID`),
  ADD UNIQUE KEY `ID` (`ID`,`passport`);

--
-- Indexes for table `receipt`
--
ALTER TABLE `receipt`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `refund`
--
ALTER TABLE `refund`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `staff`
--
ALTER TABLE `staff`
  ADD PRIMARY KEY (`staffID`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`studentID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `acadimic`
--
ALTER TABLE `acadimic`
  MODIFY `ID` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=663;

--
-- AUTO_INCREMENT for table `accounting`
--
ALTER TABLE `accounting`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `authintication`
--
ALTER TABLE `authintication`
  MODIFY `idAuthintication` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=58;

--
-- AUTO_INCREMENT for table `course`
--
ALTER TABLE `course`
  MODIFY `courseID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `offerletter`
--
ALTER TABLE `offerletter`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=487;

--
-- AUTO_INCREMENT for table `receipt`
--
ALTER TABLE `receipt`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `refund`
--
ALTER TABLE `refund`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `staff`
--
ALTER TABLE `staff`
  MODIFY `staffID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `student`
--
ALTER TABLE `student`
  MODIFY `studentID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=410;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `acadimic`
--
ALTER TABLE `acadimic`
  ADD CONSTRAINT `studentID` FOREIGN KEY (`studentID`) REFERENCES `student` (`studentID`);

--
-- Constraints for table `class_student`
--
ALTER TABLE `class_student`
  ADD CONSTRAINT `class_id` FOREIGN KEY (`classID`) REFERENCES `class` (`classID`) ON DELETE CASCADE,
  ADD CONSTRAINT `student_id` FOREIGN KEY (`studentID`) REFERENCES `student` (`studentID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
