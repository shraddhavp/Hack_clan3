-- phpMyAdmin SQL Dump
-- version 4.8.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 18, 2020 at 08:17 AM
-- Server version: 10.1.32-MariaDB
-- PHP Version: 5.6.36

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `college`
--

DELIMITER $$
--
-- Procedures
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `countai` (OUT `no of students` INT)  SELECT count(*)   FROM studsec,course,section WHERE studsec.section_no=section.section_no and section.course_name=course.name and course.type='elective' and course.name='ai'$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `countcc` (OUT `no of students` INT)  SELECT count(*) "no of students"  FROM studsec,course,section WHERE studsec.section_no=section.section_no and section.course_name=course.name and course.type='elective' and course.name='cc'$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `countdop` (OUT `total` INT)  SELECT count(*)   FROM studsec,course,section WHERE studsec.section_no=section.section_no and section.course_name=course.name and course.type='elective' and course.name='dop'$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `proc` (OUT `pass` INT, OUT `fail` INT)  select count(case when result.category="pass" then 0 end)'pass',
 count(case when result.category="fail" then 0 end)'fail' from college.result$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `proc_fail` (OUT `count1` INT)  SELECT count(*) FROM college.result WHERE result.category='fail'$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `proc_pass` (OUT `count` INT)  SELECT count(*) FROM college.result WHERE result.category='pass'$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `course`
--

CREATE TABLE `course` (
  `course_code` varchar(20) NOT NULL,
  `name` varchar(20) NOT NULL,
  `offering_dept` int(11) NOT NULL,
  `type` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `course`
--

INSERT INTO `course` (`course_code`, `name`, `offering_dept`, `type`) VALUES
('15me62', 'advanced mom', 3, 'core'),
('15cs552', 'ai', 1, 'elective'),
('15cs562', 'cc', 1, 'elective'),
('15cs52', 'cn', 1, 'core'),
('15me552', 'dop', 3, 'elective'),
('15ci52', 'graphics', 2, 'core'),
('15cs51', 'me', 1, 'core'),
('15me53', 'mom', 3, 'core');

-- --------------------------------------------------------

--
-- Table structure for table `department`
--

CREATE TABLE `department` (
  `dept_no` int(11) NOT NULL,
  `name` varchar(20) NOT NULL,
  `professor_name` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `department`
--

INSERT INTO `department` (`dept_no`, `name`, `professor_name`) VALUES
(1, 'cse', 'naveen'),
(2, 'civil', 'karthika'),
(3, 'mech', 'gaurav'),
(4, 'ece', 'sarikya s.m.');

-- --------------------------------------------------------

--
-- Table structure for table `professor`
--

CREATE TABLE `professor` (
  `ssn` varchar(20) NOT NULL,
  `name` varchar(20) NOT NULL,
  `phone` int(11) NOT NULL,
  `dob` date NOT NULL,
  `email` varchar(20) NOT NULL,
  `salary` int(11) NOT NULL,
  `designation` varchar(20) NOT NULL,
  `sec_no` varchar(20) NOT NULL,
  `dept_no` int(11) NOT NULL,
  `qualification` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `professor`
--

INSERT INTO `professor` (`ssn`, `name`, `phone`, `dob`, `email`, `salary`, `designation`, `sec_no`, `dept_no`, `qualification`) VALUES
('104', 'gaurav', 67890578, '1990-08-12', 'gau@gmail.com', 130000, 'professor', 'me5a', 3, 'mtech'),
('110', 'harish', 4532273, '1981-09-15', 'hari@gmail.com', 150000, ' professor', 'me5b', 3, 'phd'),
('102', 'jagadeesh', 7654321, '1981-09-15', 'jp@gmail.com', 110000, 'professor', 'cse5a', 1, 'phd'),
('105', 'karthika', 876543, '1987-09-08', 'karthi12@gmail.com', 130000, ' professor', 'ci5a', 2, 'mtech'),
('131', 'murali', 2311331, '2018-10-28', 'mura@gmail.com', 100000, 'professor', 'cse5f', 1, 'mtech'),
('101', 'naveen', 987654312, '1976-08-12', 'naveen@gmail.com', 120000, 'professor', 'cse5d', 1, 'phd'),
('103', 'prasad', 654321, '1986-12-11', 'prmr@gmail.com', 100000, 'asst.professor', 'cse5b', 1, 'phd'),
('888', 'Sarikya S.M.', 22221111, '2018-10-29', 'as@gmail.com', 123444, ' professor', 'cse5c', 1, 'mtech');

--
-- Triggers `professor`
--
DELIMITER $$
CREATE TRIGGER `salary1` BEFORE INSERT ON `professor` FOR EACH ROW BEGIN
DECLARE msg varchar(255);
IF ((new.salary>100000 and new.designation='asst.professor') or (new.salary<100000 and new.designation='professor'))THEN
set msg='NOT INSERTED DUE TO INCORRECT SALARY';
SIGNAL SQLSTATE '45000' SET MESSAGE_TEXT=msg;
END IF;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `profuser`
--

CREATE TABLE `profuser` (
  `username` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `profuser`
--

INSERT INTO `profuser` (`username`, `password`) VALUES
('Sarikya S.M.', 'Sa_22abc'),
('gaurav', 'Ga_22abc'),
('karthika', 'Ka_22abc'),
('prasad', 'Pr_22abc'),
('harish', 'Ha_22abc'),
('jagadeesha', 'Ja_22abc'),
('naveen', 'Na_22abc'),
('Murali', 'Mu_22abc'),
('aaa', 'Aa_22abc');

-- --------------------------------------------------------

--
-- Table structure for table `result`
--

CREATE TABLE `result` (
  `usn` varchar(20) NOT NULL,
  `name` varchar(20) NOT NULL,
  `course_name` varchar(20) NOT NULL,
  `test1` int(11) NOT NULL,
  `test2` int(11) NOT NULL,
  `test3` int(11) NOT NULL,
  `finalia` int(11) DEFAULT NULL,
  `category` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `result`
--

INSERT INTO `result` (`usn`, `name`, `course_name`, `test1`, `test2`, `test3`, `finalia`, `category`) VALUES
('1js16cs091', 'sarikya', 'ai', 11, 11, 11, 11, 'fail'),
('1js16cs091', 'sarikya', 'me', 11, 13, 15, 14, 'pass'),
('1js16cs092', 'savita', 'cc', 20, 11, 15, 18, 'pass'),
('1js16cs092', 'savita', 'cn', 12, 14, 15, 15, 'pass'),
('1js16cs092', 'savita', 'me', 11, 11, 12, 12, 'pass'),
('1js16cs094', 'shraddha', 'ai', 12, 16, 13, 15, 'pass'),
('1js16cs094', 'shraddha', 'me', 20, 19, 18, 20, 'pass'),
('1js16cs097', 'shreenidhi', 'cc', 11, 12, 13, 13, 'pass'),
('1js16cs097', 'shreenidhi', 'me', 11, 13, 15, 14, 'pass'),
('1js16cs121', 'faraa', 'ai', 12, 11, 14, 13, ''),
('1js16cs121', 'faraa', 'me', 12, 11, 11, 12, 'pass'),
('1js16cs130', 'www', 'me', 12, 12, 11, 12, 'pass'),
('1js16me045', 'karish', 'dop', 12, 11, 16, 14, 'pass');

--
-- Triggers `result`
--
DELIMITER $$
CREATE TRIGGER `test` BEFORE INSERT ON `result` FOR EACH ROW SET new.finalia=CASE WHEN new.test1<new.test2 AND new.test1<new.test3 THEN ((new.test2+new.test3)/2)
WHEN new.test2<new.test3 and new.test2<new.test3 THEN ((new.test1+new.test3)/2)
ELSE ((new.test1+new.test2)/2)
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `section`
--

CREATE TABLE `section` (
  `section_no` varchar(20) NOT NULL,
  `course_name` varchar(20) NOT NULL,
  `professor_name` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `section`
--

INSERT INTO `section` (`section_no`, `course_name`, `professor_name`) VALUES
('ci5a', 'graphics', 'karthika'),
('cse5a', 'me', 'jagadeesh'),
('cse5b', 'me', 'prasad'),
('cse5c', 'ai', 'Sarikya S.M.'),
('cse5d', 'cc', 'naveen'),
('cse5e', 'me', NULL),
('cse5f', 'cn', 'murali'),
('me5a', 'dop', 'gaurav'),
('me5b', 'mom', 'harish');

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `usn` varchar(20) NOT NULL,
  `name` varchar(20) NOT NULL,
  `dob` date NOT NULL,
  `phone_no` int(11) NOT NULL,
  `email` varchar(25) NOT NULL,
  `department_no` int(11) NOT NULL,
  `gender` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`usn`, `name`, `dob`, `phone_no`, `email`, `department_no`, `gender`) VALUES
('11111', 'qqqq', '2018-11-05', 1234, 'sariky@gmail.com', 4, 'female'),
('1js16ci091', 'cicil', '1998-03-15', 346252111, 'abc@gmail.com', 2, 'male'),
('1js16cs091', 'sarikya', '1998-06-15', 87657842, 'sari@gmail.com', 1, 'female'),
('1js16cs092', 'savita', '1998-07-07', 6363881, 'savita@gmail.com', 1, 'female'),
('1js16cs094', 'shraddha', '1998-03-12', 876548291, 'sharu@gmail.com', 1, 'female'),
('1js16cs097', 'shreenidhi', '1998-08-15', 876578422, 'nidhi@gmail.com', 1, 'female'),
('1js16cs098', 'shreya', '1998-07-08', 5467798, 'shre@gmail.com', 1, 'female'),
('1js16cs101', 'sindhu', '2018-11-06', 8792246, 'sindhuss@gmail.com', 4, 'female'),
('1js16cs103', 'dehu', '1998-06-13', 12345, 'dehu@gmail.com', 1, 'male'),
('1js16cs121', 'faraa', '2018-10-29', 123456, 'a1s@gmail.com', 1, 'female'),
('1js16cs130', 'www', '2018-11-07', 2222, 'as@gmail.com', 1, 'male'),
('1js16cs139', 'hurry', '2018-12-11', 988880, 'as@gmail.com', 1, 'female'),
('1js16me045', 'karish', '1998-06-12', 34625211, 'karish@gmail.com', 3, 'male');

-- --------------------------------------------------------

--
-- Table structure for table `studsec`
--

CREATE TABLE `studsec` (
  `usn` varchar(20) NOT NULL,
  `section_no` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `studsec`
--

INSERT INTO `studsec` (`usn`, `section_no`) VALUES
('11111', 'me5a'),
('1js16ci091', 'ci5a'),
('1js16cs091', 'cse5a'),
('1js16cs091', 'cse5c'),
('1js16cs092', 'cse5b'),
('1js16cs092', 'cse5d'),
('1js16cs092', 'cse5f'),
('1js16cs094', 'cse5a'),
('1js16cs094', 'cse5c'),
('1js16cs094', 'cse5f'),
('1js16cs097', 'cse5b'),
('1js16cs097', 'cse5d'),
('1js16cs097', 'cse5f'),
('1js16cs098', 'cse5b'),
('1js16cs103', 'cse5a'),
('1js16cs103', 'cse5c'),
('1js16cs121', 'cse5a'),
('1js16cs121', 'cse5c'),
('1js16cs130', 'cse5a'),
('1js16me045', 'me5a'),
('1js16me045', 'me5b');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `username` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`username`, `password`) VALUES
('qqqq', 'Qq_11abc'),
('cicil', 'Ci_11abc'),
('sarikya', 'Sa_11abc'),
('savita', 'Sv_11abc'),
('shraddha', 'Sh_11abc'),
('shreenidhi', 'Sn_11ab'),
('shreya', 'Sr_11abc'),
('sindhu', 'Si_11abc'),
('dehu', 'De_11abc'),
('www', 'Ww_11abc'),
('karish', 'Ka_11abc'),
('sangee', 'Sa_11abc'),
('Shret', 'Sh_11abc'),
('faraa', 'Fa_11abc'),
('wqw', 'Wq_11abc'),
('gowri', 'Go_11abc'),
('hurry', 'Hu_11abc'),
('suhas ', 'Su_11abc');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `course`
--
ALTER TABLE `course`
  ADD PRIMARY KEY (`name`),
  ADD KEY `offering_dept` (`offering_dept`);

--
-- Indexes for table `department`
--
ALTER TABLE `department`
  ADD PRIMARY KEY (`dept_no`),
  ADD KEY `professor_name` (`professor_name`);

--
-- Indexes for table `professor`
--
ALTER TABLE `professor`
  ADD PRIMARY KEY (`name`),
  ADD UNIQUE KEY `ssn` (`ssn`),
  ADD KEY `sec_no` (`sec_no`),
  ADD KEY `dept_no` (`dept_no`);

--
-- Indexes for table `result`
--
ALTER TABLE `result`
  ADD PRIMARY KEY (`usn`,`course_name`) USING BTREE,
  ADD KEY `course_name` (`course_name`),
  ADD KEY `name` (`name`);

--
-- Indexes for table `section`
--
ALTER TABLE `section`
  ADD PRIMARY KEY (`section_no`),
  ADD KEY `professor_name` (`professor_name`),
  ADD KEY `course_name` (`course_name`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`usn`),
  ADD KEY `department_no` (`department_no`);

--
-- Indexes for table `studsec`
--
ALTER TABLE `studsec`
  ADD PRIMARY KEY (`usn`,`section_no`),
  ADD KEY `section_no` (`section_no`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `course`
--
ALTER TABLE `course`
  ADD CONSTRAINT `course_ibfk_1` FOREIGN KEY (`offering_dept`) REFERENCES `department` (`dept_no`);

--
-- Constraints for table `department`
--
ALTER TABLE `department`
  ADD CONSTRAINT `department_ibfk_1` FOREIGN KEY (`professor_name`) REFERENCES `professor` (`name`);

--
-- Constraints for table `professor`
--
ALTER TABLE `professor`
  ADD CONSTRAINT `professor_ibfk_1` FOREIGN KEY (`sec_no`) REFERENCES `section` (`section_no`),
  ADD CONSTRAINT `professor_ibfk_2` FOREIGN KEY (`dept_no`) REFERENCES `department` (`dept_no`);

--
-- Constraints for table `result`
--
ALTER TABLE `result`
  ADD CONSTRAINT `result_ibfk_1` FOREIGN KEY (`usn`) REFERENCES `student` (`usn`),
  ADD CONSTRAINT `result_ibfk_2` FOREIGN KEY (`course_name`) REFERENCES `course` (`name`);

--
-- Constraints for table `section`
--
ALTER TABLE `section`
  ADD CONSTRAINT `section_ibfk_1` FOREIGN KEY (`professor_name`) REFERENCES `professor` (`name`),
  ADD CONSTRAINT `section_ibfk_2` FOREIGN KEY (`course_name`) REFERENCES `course` (`name`);

--
-- Constraints for table `student`
--
ALTER TABLE `student`
  ADD CONSTRAINT `student_ibfk_1` FOREIGN KEY (`department_no`) REFERENCES `department` (`dept_no`);

--
-- Constraints for table `studsec`
--
ALTER TABLE `studsec`
  ADD CONSTRAINT `studsec_ibfk_1` FOREIGN KEY (`usn`) REFERENCES `student` (`usn`),
  ADD CONSTRAINT `studsec_ibfk_2` FOREIGN KEY (`section_no`) REFERENCES `section` (`section_no`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
