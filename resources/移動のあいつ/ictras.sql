-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 15, 2022 at 03:55 AM
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
-- Database: `ictras`
--

-- --------------------------------------------------------

--
-- Table structure for table `coursereq`
--

CREATE TABLE `coursereq` (
  `reqid` int(10) NOT NULL,
  `matric` varchar(50) DEFAULT NULL,
  `coursecode` varchar(50) DEFAULT NULL,
  `coursename` varchar(50) DEFAULT NULL,
  `credithr` varchar(50) DEFAULT NULL,
  `grade` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `coursereq`
--

INSERT INTO `coursereq` (`reqid`, `matric`, `coursecode`, `coursename`, `credithr`, `grade`) VALUES
(3, '123456', 'ece1234', 'ELECTRIC CIRCUITE', '3', 'A'),
(4, '123456', 'ECON1122', 'PROJECT MANAGEMENT', '2', 'B'),
(5, '123456', 'MATH2030', 'Calculus', '3', 'A'),
(7, '343434', 'comm2992', 'Mass Communication', '3', 'A'),
(8, '123666', 'COMM2032', 'MASS COMMUNICATION', '3', 'A');

-- --------------------------------------------------------

--
-- Table structure for table `deanremark`
--

CREATE TABLE `deanremark` (
  `id` varchar(50) NOT NULL,
  `staffid` varchar(50) NOT NULL,
  `remark` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `department`
--

CREATE TABLE `department` (
  `departmentid` varchar(50) NOT NULL,
  `departmentname` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `department`
--

INSERT INTO `department` (`departmentid`, `departmentname`) VALUES
('AERO', 'Aerospace engineering '),
('AUTO', 'Automotive Engineering'),
('BIO', 'Biotechnology engineering'),
('CIV', 'Civil Engineering'),
('COMM', 'Communication Engineering '),
('ECiE', 'Electrical Computer and Information Engineering'),
('MANU', 'Manufacturing Engineering'),
('MATER', 'Material Engineering'),
('MECH', 'Mechatronics engineering ');

-- --------------------------------------------------------

--
-- Table structure for table `ecourses`
--

CREATE TABLE `ecourses` (
  `id` int(11) NOT NULL,
  `universities` varchar(50) DEFAULT NULL,
  `programme` varchar(50) DEFAULT NULL,
  `department` varchar(50) DEFAULT NULL,
  `coursecode` varchar(50) DEFAULT NULL,
  `ecoursecode` varchar(50) DEFAULT NULL,
  `status` varchar(50) DEFAULT NULL,
  `updationDate` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ecourses`
--

INSERT INTO `ecourses` (`id`, `universities`, `programme`, `department`, `coursecode`, `ecoursecode`, `status`, `updationDate`) VALUES
(155, 'Monash University', 'Electrical and Computer System Engineering', 'Electrical', 'ENG1005 - Engineering Mathematics', 'MATH2310 - Differential Equations ', 'APPROVED', '2021-02-18 17:40:32'),
(157, 'Universiti Teknikal Malaysia Melaka', ' Mechanical Engineering', 'Mechanical', 'BMCG 2613 - FLUID MECHANICS I', 'MECH2340 - Fluid Mechanics', 'APPROVED', '2021-02-18 17:46:19'),
(158, 'Universiti Teknologi MARA Shah Alam', 'Manufacturing Engineering', 'Manufacturing and Materials', 'MEC411 â€“ MECHANICS OF MATERIALS', 'MECH 2342 - Mechanics of Materials', 'DISAPPROVED', '2021-02-18 17:51:51'),
(159, 'Universiti Tun Hussein Onn Malaysia', 'Civil Engineering', 'Civil', 'BFC 31602  - Contract and Esmation', 'CIVE 3221 - Contract and Estimation', 'APPROVED', '2021-02-18 17:55:40'),
(160, 'Universiti Tun Hussein Onn Malaysia', 'Civil Engineering', 'Civil', 'BFC 32102 - Reinforced Concrete Design I ', 'CIVE 3313 - Reinforced Concrete Design I ', 'APPROVED', '2021-02-18 17:57:42'),
(161, 'Politeknik Ibrahim Sultan', 'Diploma Kejuruteraan Mekanikal ', 'Mechanical', 'DJF6102 - Quality Control', 'MANU 3313 - Quality Control ', 'APPROVED', '2021-02-18 18:04:46'),
(162, 'Sunway University', 'Civil Engineering', 'Civil', ' MATH 1024  - Pre-calculus', 'MATH2310 - Differential Equations', 'DISAPPROVED', '2021-02-18 18:07:58'),
(164, 'Sunway University', 'Civil Engineering', 'Civil', 'MATH 1034 - Calculus I', 'MTH 1112 - Engineering Calculus I', 'APPROVED', '2021-02-18 18:11:38'),
(165, 'Univeriti Kebangsaan Malaysia', 'Chemical Engineering', 'Biotechnology', 'KKKR3563 - Biochemistry and Biomolecular Engineeri', 'BTEN 2315 - Biochemistry ', 'DISAPPROVED', '2021-02-18 18:17:09'),
(166, 'University Malaya', ' Electrical Engineering', 'Electrical', 'KIE1005 - Circuit Analysis I', 'EECE 2312 - Circuit Analysis', 'APPROVED', '2021-02-18 18:20:59'),
(167, 'University Malaya', 'Electrical Engineering', 'Electrical', 'KIE1007 - Electronic Circuit I', 'EECE 2313 - Electronic Circuits', 'DISAPPROVED', '2021-02-18 18:22:06'),
(168, 'University Malaya', 'Electrical Engineering', 'Electrical', 'KIE3007 - Digital Signal Processing', 'EECE 3314 - Digital Signal Processing', 'APPROVED', '2021-02-18 18:23:30'),
(169, 'Universiti Malaysia Perlis ', 'Civil Engineering ', 'Civil', 'PAT 202/3 - HYDRAULIC AND HYDROLOGY', 'CIVE 2323 - Hydraulics', 'DISAPPROVED', '2021-02-18 18:27:05'),
(170, 'Universiti Malaysia Perlis', 'Civil Engineering', 'Civil', 'PAT253/3 - GEOTECHNIC', 'CIVE 3315 - Geotechnical Engineering', 'APPROVED', '2021-02-18 18:28:38'),
(171, 'Universiti Malaysia Perlis', 'Civil Engineering', 'Civil', 'PAT203/2 - SOIL MECHANICS', 'CIVE 2315 - Geology and Soil Mechanics', 'DISAPPROVED', '2021-02-18 18:31:26'),
(173, 'Sunway University', 'Electrical Engineering', 'Electrical', 'ENGR 2013 - Basic Statics for Engineering', 'MEC 1193 - Statics', 'APPROVED', '2021-02-19 03:56:48'),
(174, 'Sunway University', 'Electrical Engineering', 'Electrical', 'MATH 1044 - Calculus II', 'MTH 1212 - Engineering Calculus II', 'APPROVED', '2021-02-19 03:58:45'),
(175, 'Sunway University', 'Electrical Engineering', 'Electrical', 'ENGR 2064 - Digital Logic', 'EECE 2311- Digital Logic Design', 'DISAPPROVED', '2021-02-19 04:00:42'),
(176, 'Universiti Putra Malaysia', 'Aerospace Engineering', 'Mechanical', 'EAS 3202 - Aerodynamics I', 'MECH 3322 - Aerodynamics I', 'APPROVED', '2021-02-19 04:05:43'),
(177, 'Universiti Putra Malaysia', 'Aerospace Engineering', 'Mechanical', 'EAS 3801 - Space Mechanics', 'MECH 3220 - Space Mechanics ', 'APPROVED', '2021-02-19 04:07:28');

-- --------------------------------------------------------

--
-- Table structure for table `enginstaff`
--

CREATE TABLE `enginstaff` (
  `staffid` varchar(50) NOT NULL,
  `staffname` varchar(50) DEFAULT NULL,
  `posid` int(11) NOT NULL,
  `departmentid` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `prevuni`
--

CREATE TABLE `prevuni` (
  `universityid` int(10) NOT NULL,
  `matric` varchar(50) DEFAULT NULL,
  `uniname` varchar(50) DEFAULT NULL,
  `diplomaname` varchar(50) DEFAULT NULL,
  `degreename` varchar(50) DEFAULT NULL,
  `yearstudy` varchar(50) DEFAULT NULL,
  `CGPA` varchar(50) DEFAULT NULL,
  `reason` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `prevuni`
--

INSERT INTO `prevuni` (`universityid`, `matric`, `uniname`, `diplomaname`, `degreename`, `yearstudy`, `CGPA`, `reason`) VALUES
(5, '123456', 'qwe', 'qwe', 'qwe', 'qwe', 'qwe', 'qwe'),
(6, '123456', 'asd', 'qweasd', 'qweasd', 'asda', 'asd', 'asd'),
(7, '123456', 'dfgdg', 'dfgdfg', 'gdgd', 'dfgdg', 'fgdffgd', 'dfgd');

-- --------------------------------------------------------

--
-- Table structure for table `reference`
--

CREATE TABLE `reference` (
  `id` int(10) NOT NULL,
  `refnum` varchar(50) DEFAULT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `reference`
--

INSERT INTO `reference` (`id`, `refnum`, `date`) VALUES
(1, 'IIUM/306/12/1/1', '2022-01-22 15:22:50');

-- --------------------------------------------------------

--
-- Table structure for table `staffpos`
--

CREATE TABLE `staffpos` (
  `posid` int(10) NOT NULL,
  `posname` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `staffpos`
--

INSERT INTO `staffpos` (`posid`, `posname`) VALUES
(1, 'normal staff'),
(2, 'Head of Department'),
(3, 'Deputy Dean'),
(4, 'Dean');

-- --------------------------------------------------------

--
-- Table structure for table `status`
--

CREATE TABLE `status` (
  `statusid` int(10) NOT NULL,
  `matric` varchar(50) DEFAULT NULL,
  `coursecode` varchar(50) DEFAULT NULL,
  `approval` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `status`
--

INSERT INTO `status` (`statusid`, `matric`, `coursecode`, `approval`) VALUES
(4, '123456', 'ece1234', '0'),
(5, '123456', 'ECON1122', '0'),
(6, '123456', 'MATH2030', '0'),
(8, '343434', 'comm2992', '1'),
(9, '123666', 'COMM2032', '0');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `matric` varchar(50) NOT NULL,
  `name` varchar(50) DEFAULT NULL,
  `password` varchar(50) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `department` varchar(50) DEFAULT NULL,
  `semester` varchar(50) DEFAULT NULL,
  `phonenum` varchar(50) NOT NULL,
  `address` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`matric`, `name`, `password`, `email`, `department`, `semester`, `phonenum`, `address`) VALUES
('121212', 'ADMIN', 'admin', 'admin@mail.com', 'HOD', '111', '', ''),
('123456', 'farhan', 'asdqwe', 'f@mail.com', 'CIE', '2', '', ''),
('123666', 'farhan 2022', 'asdqwe', 'test@gmail.com', 'CIE', '3', '1234567890', 'gombak'),
('343434', 'Aiman', 'asdqwe', 'aiman@gmail.com', 'COMM', '4', '1234567980', 'gombak iium');

-- --------------------------------------------------------

--
-- Table structure for table `userlog`
--

CREATE TABLE `userlog` (
  `logid` int(10) NOT NULL,
  `matric` varchar(50) DEFAULT NULL,
  `userip` binary(16) DEFAULT NULL,
  `logintime` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `logout` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `status` int(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `userlog`
--

INSERT INTO `userlog` (`logid`, `matric`, `userip`, `logintime`, `logout`, `status`) VALUES
(7, '123456', 0x3a3a3100000000000000000000000000, '2022-01-22 07:14:21', '2022-01-22 07:14:21', 1),
(8, '121212', 0x3a3a3100000000000000000000000000, '2022-01-22 07:14:42', '2022-01-22 07:14:42', 1),
(9, '123456', 0x3a3a3100000000000000000000000000, '2022-01-22 12:12:37', '2022-01-22 12:12:37', 1),
(10, '123456', 0x3a3a3100000000000000000000000000, '2022-01-22 15:38:36', '2022-01-22 15:38:36', 1),
(12, '123456', 0x3a3a3100000000000000000000000000, '2022-01-22 16:40:20', '2022-01-22 16:40:20', 1),
(13, '123456', 0x3a3a3100000000000000000000000000, '2022-01-23 06:54:41', '2022-01-23 06:54:41', 1),
(14, '121212', 0x3a3a3100000000000000000000000000, '2022-01-23 06:58:14', '2022-01-23 06:58:14', 1),
(15, '123456', 0x3a3a3100000000000000000000000000, '2022-01-23 08:42:26', '2022-01-23 08:42:26', 1),
(22, '123456', 0x3a3a3100000000000000000000000000, '2022-01-23 08:43:12', '2022-01-23 08:43:12', 1),
(23, '121212', 0x3a3a3100000000000000000000000000, '2022-01-23 12:02:44', '2022-01-23 12:02:44', 1),
(25, '121212', 0x3a3a3100000000000000000000000000, '2022-01-23 12:58:10', '2022-01-23 12:58:10', 1),
(26, '123456', 0x3a3a3100000000000000000000000000, '2022-01-23 13:15:05', '2022-01-23 13:15:05', 1),
(27, '123456', 0x3a3a3100000000000000000000000000, '2022-01-23 13:15:10', '2022-01-23 13:15:10', 1),
(28, '121212', 0x3a3a3100000000000000000000000000, '2022-01-23 13:15:34', '2022-01-23 13:15:34', 1),
(29, '121212', 0x3a3a3100000000000000000000000000, '2022-01-23 13:39:58', '2022-01-23 13:39:58', 1),
(32, '121212', 0x3a3a3100000000000000000000000000, '2022-01-24 01:44:52', '2022-01-24 01:44:52', 1),
(34, '121212', 0x3a3a3100000000000000000000000000, '2022-01-24 06:24:02', '2022-01-24 06:24:02', 1),
(35, '123456', 0x3a3a3100000000000000000000000000, '2022-01-24 06:25:07', '2022-01-24 06:25:07', 1),
(36, '121212', 0x3a3a3100000000000000000000000000, '2022-01-24 06:31:23', '2022-01-24 06:31:23', 1),
(37, '123456', 0x3a3a3100000000000000000000000000, '2022-01-24 06:36:10', '2022-01-24 06:36:10', 1),
(38, '121212', 0x3a3a3100000000000000000000000000, '2022-01-24 07:58:07', '2022-01-24 07:58:07', 1),
(39, '123456', 0x3a3a3100000000000000000000000000, '2022-01-24 08:11:50', '2022-01-24 08:11:50', 1),
(40, '123456', 0x3a3a3100000000000000000000000000, '2022-01-24 08:12:05', '2022-01-24 08:12:05', 1),
(41, '121212', 0x3a3a3100000000000000000000000000, '2022-01-24 08:13:17', '2022-01-24 08:13:17', 1),
(42, '123456', 0x3a3a3100000000000000000000000000, '2022-01-24 17:03:45', '2022-01-24 17:03:45', 1),
(43, '123456', 0x3a3a3100000000000000000000000000, '2022-01-25 04:51:57', '2022-01-25 04:51:57', 1),
(44, '121212', 0x3a3a3100000000000000000000000000, '2022-01-25 04:53:05', '2022-01-25 04:53:05', 1),
(45, '123456', 0x3a3a3100000000000000000000000000, '2022-01-25 07:55:58', '2022-01-25 07:55:58', 1),
(46, '123456', 0x3a3a3100000000000000000000000000, '2022-01-25 07:58:28', '2022-01-25 07:58:28', 1),
(47, '121212', 0x3a3a3100000000000000000000000000, '2022-01-25 08:06:56', '2022-01-25 08:06:56', 1),
(48, '121212', 0x3a3a3100000000000000000000000000, '2022-01-25 08:09:32', '2022-01-25 08:09:32', 1),
(49, '123456', 0x3a3a3100000000000000000000000000, '2022-01-25 08:20:33', '2022-01-25 08:20:33', 1),
(50, '121212', 0x3a3a3100000000000000000000000000, '2022-01-25 08:22:05', '2022-01-25 08:22:05', 1),
(51, '123456', 0x3a3a3100000000000000000000000000, '2022-01-25 08:28:17', '2022-01-25 08:28:17', 1),
(52, '121212', 0x3a3a3100000000000000000000000000, '2022-01-25 08:28:45', '2022-01-25 08:28:45', 1),
(53, '123456', 0x3a3a3100000000000000000000000000, '2022-01-25 09:20:57', '2022-01-25 09:20:57', 1),
(54, '121212', 0x3a3a3100000000000000000000000000, '2022-01-25 09:21:58', '2022-01-25 09:21:58', 1),
(55, '123456', 0x3a3a3100000000000000000000000000, '2022-01-25 09:23:36', '2022-01-25 09:23:36', 1),
(56, '123456', 0x3a3a3100000000000000000000000000, '2022-01-25 10:19:49', '2022-01-25 10:19:49', 1),
(57, '121212', 0x3a3a3100000000000000000000000000, '2022-01-25 10:20:37', '2022-01-25 10:20:37', 1),
(58, '123456', 0x3a3a3100000000000000000000000000, '2022-01-25 10:21:32', '2022-01-25 10:21:32', 1),
(61, '121212', 0x3a3a3100000000000000000000000000, '2022-02-11 02:03:52', '2022-02-11 02:03:52', 1),
(62, '123456', 0x3a3a3100000000000000000000000000, '2022-02-11 02:14:17', '2022-02-11 02:14:17', 1),
(63, '121212', 0x3a3a3100000000000000000000000000, '2022-02-11 02:17:05', '2022-02-11 02:17:05', 1),
(65, '121212', 0x3a3a3100000000000000000000000000, '2022-02-11 02:21:14', '2022-02-11 02:21:14', 1),
(70, '121212', 0x3a3a3100000000000000000000000000, '2022-02-11 02:25:39', '2022-02-11 02:25:39', 1),
(71, '123456', 0x3a3a3100000000000000000000000000, '2022-02-11 02:33:23', '2022-02-11 02:33:23', 1),
(72, '123456', 0x3a3a3100000000000000000000000000, '2022-02-11 02:33:34', '2022-02-11 02:33:34', 1),
(73, '121212', 0x3a3a3100000000000000000000000000, '2022-02-11 02:34:06', '2022-02-11 02:34:06', 1),
(74, '121212', 0x3a3a3100000000000000000000000000, '2022-03-03 03:16:46', '2022-03-03 03:16:46', 1),
(75, '123456', 0x3a3a3100000000000000000000000000, '2022-08-08 01:21:01', '2022-08-08 01:21:01', 1),
(76, '123456', 0x3a3a3100000000000000000000000000, '2022-08-08 01:21:07', '2022-08-08 01:21:07', 1),
(79, '343434', 0x3a3a3100000000000000000000000000, '2022-08-09 02:24:41', '2022-08-09 02:24:41', 1),
(81, '123666', 0x3a3a3100000000000000000000000000, '2022-08-09 02:30:29', '2022-08-09 02:30:29', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `coursereq`
--
ALTER TABLE `coursereq`
  ADD PRIMARY KEY (`reqid`),
  ADD KEY `coursereq_ibfk_1` (`matric`);

--
-- Indexes for table `department`
--
ALTER TABLE `department`
  ADD PRIMARY KEY (`departmentid`);

--
-- Indexes for table `ecourses`
--
ALTER TABLE `ecourses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `enginstaff`
--
ALTER TABLE `enginstaff`
  ADD PRIMARY KEY (`staffid`);

--
-- Indexes for table `prevuni`
--
ALTER TABLE `prevuni`
  ADD PRIMARY KEY (`universityid`),
  ADD KEY `matric` (`matric`);

--
-- Indexes for table `reference`
--
ALTER TABLE `reference`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `status`
--
ALTER TABLE `status`
  ADD PRIMARY KEY (`statusid`),
  ADD KEY `matric` (`matric`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`matric`);

--
-- Indexes for table `userlog`
--
ALTER TABLE `userlog`
  ADD PRIMARY KEY (`logid`),
  ADD KEY `matric` (`matric`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `coursereq`
--
ALTER TABLE `coursereq`
  MODIFY `reqid` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `ecourses`
--
ALTER TABLE `ecourses`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=178;

--
-- AUTO_INCREMENT for table `prevuni`
--
ALTER TABLE `prevuni`
  MODIFY `universityid` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `reference`
--
ALTER TABLE `reference`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `status`
--
ALTER TABLE `status`
  MODIFY `statusid` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `userlog`
--
ALTER TABLE `userlog`
  MODIFY `logid` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=82;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `coursereq`
--
ALTER TABLE `coursereq`
  ADD CONSTRAINT `coursereq_ibfk_1` FOREIGN KEY (`matric`) REFERENCES `user` (`matric`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `prevuni`
--
ALTER TABLE `prevuni`
  ADD CONSTRAINT `prevuni_ibfk_1` FOREIGN KEY (`matric`) REFERENCES `user` (`matric`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `status`
--
ALTER TABLE `status`
  ADD CONSTRAINT `status_ibfk_1` FOREIGN KEY (`matric`) REFERENCES `user` (`matric`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `userlog`
--
ALTER TABLE `userlog`
  ADD CONSTRAINT `userlog_ibfk_1` FOREIGN KEY (`matric`) REFERENCES `user` (`matric`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
