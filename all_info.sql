
-- phpMyAdmin SQL Dump
-- version 3.5.2.2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Aug 25, 2016 at 06:17 PM
-- Server version: 10.0.20-MariaDB
-- PHP Version: 5.2.17

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `u554935086_cs3`
--

-- --------------------------------------------------------

--
-- Table structure for table `all_info`
--

CREATE TABLE IF NOT EXISTS `all_info` (
  `s_no` int(11) NOT NULL AUTO_INCREMENT,
  `roll_no` int(11) NOT NULL,
  `full_name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `old_pass` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `new_pass` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `skills` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `interest` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `achivements` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `from` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `image_url` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `ip_address` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `date` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`s_no`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=54 ;

--
-- Dumping data for table `all_info`
--

INSERT INTO `all_info` (`s_no`, `roll_no`, `full_name`, `email`, `old_pass`, `new_pass`, `skills`, `interest`, `achivements`, `from`, `image_url`, `ip_address`, `date`) VALUES
(6, 1514310172, 'Sambhav Mishra', '', '1514310172', '1514310172', '', '', '', '', '', '', '25-08-2016'),
(5, 1514310171, 'Salman Mushtaque', '', '1514310171', '1514310171', '', '', '', '', '', '', '25-08-2016'),
(4, 1514310170, 'Sajjan Kumar Singh', '', '1514310170', '1514310170', '', '', '', '', '', '', '25-08-2016'),
(2, 1514310168, 'Sachin Gupta', '', '1514310168', '1514310168', '', '', '', '', '', '', '25-08-2016'),
(3, 1514310169, 'Sagar Saini', '', '1514310169', '1514310169', '', '', '', '', '', '', '25-08-2016'),
(1, 1514310167, 'Rupal Raturi', 'NULL', '1514310167', '1514310167', 'Nothing', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL'),
(7, 1514310173, 'Sanchit Gupta', '', '1514310173', '1514310173', '', '', '', '', '', '', '25-08-2016'),
(8, 1514310175, 'Sanjeet Singh', '', '1514310175', '1514310175', '', '', '', '', '', '', '25-08-2016'),
(9, 1514310178, 'Satyam Sharma', '', '1514310178', '1514310178', '', '', '', '', '', '', '25-08-2016'),
(10, 1514310182, 'Saurabh Verma', '', '1514310182', '1514310182', '', '', '', '', '', '', '25-08-2016'),
(11, 1514310183, 'Shadil Khan', '', '1514310183', '1514310183', '', '', '', '', '', '', '25-08-2016'),
(12, 1514310184, 'Shalvika Shrotriya', '', '1514310184', '1514310184', '', '', '', '', '', '', '25-08-2016'),
(13, 1514310185, 'Shashank Nath Yadav', '', '1514310185', '1514310185', '', '', '', '', '', '', '25-08-2016'),
(14, 1514310186, 'Shivam Gupta', '', '1514310186', '1514310186', '', '', '', '', '', '', '25-08-2016'),
(15, 1514310191, 'Shivam Sharma', '', '1514310191', '1514310191', '', '', '', '', '', '', '25-08-2016'),
(16, 1514310187, 'Shivam Kaul', 'NULL', '1514310187', '1514310187', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL'),
(17, 1514310190, 'Shivam Rai', 'NULL', '1514310190', '1514310190', '', '', '', '', '', '', ''),
(18, 1514310189, 'Shivam Mahendru', '', '1514310189', '1514310189', '', '', '', '', '', '', ''),
(19, 1514310193, 'Shivani Chaudhary', '', '1514310193', '1514310193\r\n', '', '', '', '', '', '', ''),
(20, 1514310195, 'Shivansh Srivastava', '', '1514310195', '1514310195', '', '', '', '', '', '', ''),
(21, 1514310192, 'Shivang Bhatnagar', '', '1514310192', '1514310192', '', '', '', '', '', '', ''),
(22, 1514310196, 'Shourya Gupta', '', '1514310196', '1514310196', '', '', '', '', '', '', ''),
(23, 1514310198, 'Shreya Singh', '', '1514310198', '1514310198', '', '', '', '', '', '', ''),
(24, 1514310197, 'Shreya Agarwal', '', '1514310197', '1514310197', '', '', '', '', '', '', ''),
(25, 1514310199, 'Shristy Maheshwary', '', '1514310199', '1514310199', '', '', '', '', '', '', ''),
(26, 1514310200, 'Shubham Chaurasia', '', '1514310200', '1514310200', '', '', '', '', '', '', ''),
(27, 1514310202, 'Shubhi Garg', '', '1514310202', '1514310202', '', '', '', '', '', '', ''),
(28, 1514310205, 'Sonali Singh', '', '1514310205', '1514310205', '', '', '', '', '', '', ''),
(29, 1514310204, 'Sonali Rawat', '', '1514310204', '1514310204', '', '', '', '', '', '', ''),
(30, 1514310206, 'Soumya Gupta', '', '1514310206', '1514310206', '', '', '', '', '', '', ''),
(31, 1514310209, 'Srishti Robin', '', '1514310209', '1514310209', '', '', '', '', '', '', ''),
(32, 1514310094, 'Srishty Pandey', '', '1514310094', '1514310094', '', '', '', '', '', '', ''),
(33, 1514310210, 'Sudhanshu Singh', '', '1514310210', '1514310210', '', '', '', '', '', '', ''),
(34, 1514310212, 'Suraj Gupta', '', '1514310212', '1514310212', '', '', '', '', '', '', ''),
(35, 1514310214, 'Suryansh Singh', 'suryanshsinghstudy@gmail.com', '1514310214', 'study&study', 'C, Java, PHP, MYSQL, HTML, CSS, LESS, Javascript', 'Programing, Martial Art.', 'Silver medal in state level kick boxing championship', '', 'profile_pics/1514310214.jpg', '139.5.198.14', '25-08-2016'),
(36, 1514310216, 'Sayed Abbas Haider', '', '1514310216', '1514310216', '', '', '', '', '', '', ''),
(37, 1514310218, 'Tushar Chaudhary', '', '1514310218', '1514310218', '', '', '', '', '', '', ''),
(38, 1514310217, 'Tanuj Kumar', '', '1514310217', '1514310217', '', '', '', '', '', '', ''),
(39, 1514310220, 'Ujjawal Goel', '', '1514310220', '1514310220', '', '', '', '', '', '', ''),
(40, 1514310222, 'Utkarsh Lakhrera', '', '1514310222', '1514310222', '', '', '', '', '', '', ''),
(41, 1514310225, 'Vaibhav Gangwar', '', '1514310225', '1514310225', '', '', '', '', '', '', ''),
(42, 1514310227, 'Vaibhav Kapil', '', '1514310227', '1514310227', '', '', '', '', '', '', ''),
(43, 1514310231, 'Vasu Awasthi', '', '1514310231', '1514310231', '', '', '', '', '', '', ''),
(44, 1514310232, 'Vibhav Kumar', '', '1514310232', '1514310232', '', '', '', '', '', '', ''),
(45, 1514310226, 'Vaibhav Gupta', '', '1514310226', '1514310226', '', '', '', '', '', '', ''),
(46, 1514310233, 'Vidushi Singh', '', '1514310233', '1514310233', '', '', '', '', '', '', ''),
(47, 1514310236, 'Vikash Kumar Mishra', '', '1514310236', '1514310236', '', '', '', '', '', '', ''),
(48, 1514310239, 'Vineet Yadav', '', '1514310239', '1514310239', '', '', '', '', '', '', ''),
(49, 1514310238, 'Vineet Singh', '', '15143102398', '1514310238', '', '', '', '', '', '', ''),
(50, 1514310240, 'Vipin Singh', '', '1514310240', '1514310240', '', '', '', '', '', '', ''),
(51, 1514310242, 'Vishal Singh', '', '1514310242', '1514310242', '', '', '', '', '', '', ''),
(52, 1514310244, 'Vrinda Sharma', '', '1514310244', '1514310244', '', '', '', '', '', '', ''),
(53, 1514310247, 'Yash Pratap Singh', '', '1514310247', '1514310247', '', '', '', '', '', '', '');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
