-- phpMyAdmin SQL Dump
-- version 3.3.9
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jun 02, 2017 at 06:01 PM
-- Server version: 5.5.8
-- PHP Version: 5.3.5

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `school`
--

-- --------------------------------------------------------

--
-- Table structure for table `receipts`
--

CREATE TABLE IF NOT EXISTS `receipts` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `student_name` varchar(255) NOT NULL,
  `admission_number` varchar(10) NOT NULL,
  `class` varchar(10) NOT NULL,
  `amount_owing` int(11) NOT NULL,
  `amount_paying` int(11) NOT NULL,
  `amount_in_words` text NOT NULL,
  `balance` int(11) NOT NULL,
  `payment_method` varchar(6) NOT NULL,
  `check_no_paid_by` text NOT NULL,
  `staff_loggedi_n` varchar(255) NOT NULL,
  `date` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `receipts`
--

INSERT INTO `receipts` (`id`, `student_name`, `admission_number`, `class`, `amount_owing`, `amount_paying`, `amount_in_words`, `balance`, `payment_method`, `check_no_paid_by`, `staff_loggedi_n`, `date`) VALUES
(1, 'Samuellina Annin Yeboah', 'AN455', 'Grade 1', 55, 50, 'Fiffty Ghana Cedis only', 5, 'Cash', 'Sister May', '', '0000-00-00'),
(2, 'Samuellina Annin Yeboah', 'AN455', 'Grade 1', 55, 56, 's', -1, 'Cash', 'Afia Konadu', '', 'May 31, 2017'),
(3, 'Samuellina Annin Yeboah', 'AN455', 'Grade 1', 55, 56, 's', -1, 'Cash', 'Mr Yaw Adjei', '', 'May 31, 2017'),
(4, 'Samuellina Annin Name Yeboah', 'AN455', 'Grade 1', 55, 50, 'Fiffty Ghana Cedis only', 5, 'Check', 'GHH454545', '', 'May 31, 2017'),
(5, 'Samuellina Annin Name Yeboah', 'AN455', 'Grade 1', 55, 400, 'FIUR HUNDRED GHNANA CEDIS', -345, 'Cash', '	', '', 'June 1, 2017'),
(6, 'Samuellina Annin Name Yeboah', 'AN455', 'Grade 1', 55, 50, 'Fiffty Ghana Cedis only', 5, 'Cash', '	', '', 'June 1, 2017'),
(7, 'Nan Yaw Name Dedrick', 'AN450', 'Grade 1', 50, 50, 'Fiffty Ghana Cedis only', 0, 'Cash', '	', '', 'June 1, 2017'),
(8, 'Samuellina Annin Name Name Yeboah', 'AN455', 'Grade 1', 105, 0, 'AD', 105, 'Check', '	87898', '', 'June 1, 2017');

-- --------------------------------------------------------

--
-- Table structure for table `staffs`
--

CREATE TABLE IF NOT EXISTS `staffs` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `staff_name` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `staffs`
--

INSERT INTO `staffs` (`id`, `staff_name`, `password`) VALUES
(1, 'say', 'PASSWORD');

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE IF NOT EXISTS `students` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `middle_name` varchar(255) NOT NULL,
  `preferred_name` varchar(255) NOT NULL,
  `admissionNumber` varchar(10) NOT NULL,
  `dob_day` varchar(2) NOT NULL,
  `dob_month` varchar(10) NOT NULL,
  `dob_year` varchar(4) NOT NULL,
  `gender` varchar(6) NOT NULL,
  `hometown` text NOT NULL,
  `house_address` text NOT NULL,
  `religion` text NOT NULL,
  `class` varchar(10) NOT NULL,
  `fee` int(11) NOT NULL,
  `passport` text NOT NULL,
  `father_name` varchar(255) NOT NULL,
  `father_occupation` text NOT NULL,
  `father_telephone` varchar(15) NOT NULL,
  `father_employer` text NOT NULL,
  `father_mobile_number` varchar(15) NOT NULL,
  `father_address` text NOT NULL,
  `father_email` text NOT NULL,
  `father_work_telephone` varchar(15) NOT NULL,
  `mother_name` varchar(255) NOT NULL,
  `mother_occupation` text NOT NULL,
  `mother_telephone` varchar(15) NOT NULL,
  `mother_employer` text NOT NULL,
  `mother_mobile_number` varchar(15) NOT NULL,
  `mother_address` text NOT NULL,
  `mother_email` text NOT NULL,
  `mother_work_telephone` varchar(15) NOT NULL,
  `family_doctor` text NOT NULL,
  `doctor_telephone` varchar(15) NOT NULL,
  `allergies` text NOT NULL,
  `medical_aid_nr` text NOT NULL,
  `preferred_hospital` text NOT NULL,
  `relativename1` varchar(255) NOT NULL,
  `relationship_to_child1` text NOT NULL,
  `relative_hometel1` varchar(15) NOT NULL,
  `relative_mobile1` varchar(15) NOT NULL,
  `relative_WorkNo1` varchar(15) NOT NULL,
  `relativename2` varchar(255) NOT NULL,
  `relationship_to_child2` text NOT NULL,
  `relative_hometel2` varchar(15) NOT NULL,
  `relative_mobile2` varchar(15) NOT NULL,
  `relative_WorkNo2` varchar(15) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=21 ;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`id`, `first_name`, `last_name`, `middle_name`, `preferred_name`, `admissionNumber`, `dob_day`, `dob_month`, `dob_year`, `gender`, `hometown`, `house_address`, `religion`, `class`, `fee`, `passport`, `father_name`, `father_occupation`, `father_telephone`, `father_employer`, `father_mobile_number`, `father_address`, `father_email`, `father_work_telephone`, `mother_name`, `mother_occupation`, `mother_telephone`, `mother_employer`, `mother_mobile_number`, `mother_address`, `mother_email`, `mother_work_telephone`, `family_doctor`, `doctor_telephone`, `allergies`, `medical_aid_nr`, `preferred_hospital`, `relativename1`, `relationship_to_child1`, `relative_hometel1`, `relative_mobile1`, `relative_WorkNo1`, `relativename2`, `relationship_to_child2`, `relative_hometel2`, `relative_mobile2`, `relative_WorkNo2`) VALUES
(1, 'Samuellina', 'Yeboah', 'Annin Name Name', 'Say', 'AN455', '1', 'January', '2017', 'Male', 'Bawku', 'GAB', 'Christian', 'Grade 1', 105, '/', 'Mr Andrew Yeboah', 'Carpenter', '0240066392', 'Self-employed', '0246453171', 'P.O.BOX 221', 'saytoonz05@gmail.com', '0240066328', 'Monic Aniwaa', 'Treader', '0240033662', 'Government', '024060587', 'P.O.BOX 113', 'nanayawsamuel05@gmail.com', '0540909080', 'Mr Asiama Yeboah Richard', '0273246598', 'Dust', 'Medical_aid_nr', 'Goas Gov''t Hospital', 'Mrs. Osei Y. Say', 'Sister', '024060807', '0406090705', '00333957', 'Mr. Yaw Say', 'Father Friend', '0504804960', '0240066392', '0540663399'),
(2, 'Nan', 'Dedrick', 'Yaw Name', 'Nana Yaw', 'AN450', '5', 'March', '2015', 'Male', 'Goaso', 'F22/1 GAB', 'Christian', 'Grade 1', 100, '/', 'Mr Andrew Yeboah', 'Carpenter', '0240066392', 'Self-employed', '0246453171', 'P.O.BOX 221', 'saytoonz05@gmail.com', '0240066328', 'Monic Aniwaa', 'Treader', '0240033662', 'Government', '024060587', 'P.O.BOX 113', 'nanayawsamuel05@gmail.com', '0540909080', 'Mr Asiama Yeboah Richard', '0273246598', 'Dust', 'Medical_aid_nr', 'Goas Gov''t Hospital', 'Mrs. Osei Y. Say', 'Sister', '024060807', '0406090705', '00333957', 'Mr. Yaw Say', 'Father Friend', '0504804960', '0240066392', '0540663399'),
(16, 'Samuel', 'Yeboah', 'Yaw Name', '', 'AN457', '1', 'January', '2017', 'Male', '', '', '', 'Nursery 1', 100, 'Rjwe51VPMzEXCF4/pious.jpg', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'Medical_aid_nr', '', '', '', '', '', '', '', '', '', '', ''),
(17, 'Samuel', 'Yeboah', 'Annin Name Name', 'Say', 'JR455', '1', 'January', '2017', 'Male', 'Bawku', 'F22/1 GAB', 'Christian', 'Nursery 1', 100, '/', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'Medical_aid_nr', '', '', '', '', '', '', '', '', '', '', ''),
(18, 'Samuel', 'Yeboah', 'Annin Name', 'Nana', 'AN500', '1', 'January', '2017', 'Male', '', 'GAB', '', 'Nursery 1', 100, '/', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'Medical_aid_nr', '', '', '', '', '', '', '', '', '', '', ''),
(19, 'Samuel', 'Yeboah', 'Annin Name', '', 'AN4', '1', 'January', '2017', 'Male', '', '', '', 'Nursery 1', 100, 'CQEvTH13hOA85dy/HTFC 2.jpg', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'Medical_aid_nr', '', '', '', '', '', '', '', '', '', '', ''),
(20, 'Nana', 'Dedrick', '', 'Say Toonz', 'AN459', '1', 'January', '2017', 'Male', 'Ejisu Onwe', 'F22/1 GAB', 'Christian', 'Nursery 1', 100, '/', 'Mr Andrew Yeboah', 'Carpenter', '0240066392', 'Self-employed', '0246453171', 'P.O.BOX 221', 'saytoonz05@gmail.com', '0240066328', 'Monic Aniwaa', 'Treader', '0240033662', 'Government', '024060587', 'P.O.BOX 113', 'nanayawsamuel05@gmail.com', '0540909080', '', '', '', 'Cash', '', '', '', '', '', '', '', '', '', '', '');
