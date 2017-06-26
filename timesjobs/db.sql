-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jun 26, 2017 at 09:16 PM
-- Server version: 10.1.16-MariaDB
-- PHP Version: 7.0.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `timesjobs`
--
CREATE DATABASE IF NOT EXISTS `timesjobs` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `timesjobs`;

-- --------------------------------------------------------

--
-- Table structure for table `company`
--

CREATE TABLE `company` (
  `company_id` int(50) NOT NULL,
  `company_name` varchar(50) NOT NULL,
  `industry` varchar(50) NOT NULL,
  `logo` varchar(50) NOT NULL,
  `company_email` varchar(50) NOT NULL,
  `company_phone` varchar(10) NOT NULL,
  `website` text NOT NULL,
  `location` varchar(50) NOT NULL,
  `ratings` int(5) NOT NULL,
  `num_employees` int(50) NOT NULL,
  `num_jobs` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `company`
--

INSERT INTO `company` (`company_id`, `company_name`, `industry`, `logo`, `company_email`, `company_phone`, `website`, `location`, `ratings`, `num_employees`, `num_jobs`) VALUES
(1, 'Facebook', '1', 'assets/images/logos/1.png', 'careees@facebook.com', '+1 455 455', 'www.facebook.com', 'Palo Alto, California', 2, 4000, 5),
(2, 'Dell', '1', 'assets/images/logos/2.png', 'careers@dell.com', '+1 455 544', 'www.dell.com', 'Silicon Valley', 4, 9000, 10),
(3, 'Tata Steel', '2', 'assets/images/logos/3.png', 'careers@tatasteel.com', '1800 2400', 'www.tatasteel.com', 'Jamshedpur', 5, 15000, 40);

-- --------------------------------------------------------

--
-- Table structure for table `industry`
--

CREATE TABLE `industry` (
  `id` int(50) NOT NULL,
  `industry_name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `industry`
--

INSERT INTO `industry` (`id`, `industry_name`) VALUES
(1, 'IT'),
(2, 'Engineering'),
(3, 'Medical'),
(4, 'Banking'),
(5, 'Pharmaceutical');

-- --------------------------------------------------------

--
-- Table structure for table `job`
--

CREATE TABLE `job` (
  `job_id` int(50) NOT NULL,
  `job_title` varchar(50) NOT NULL,
  `company_name` varchar(50) NOT NULL,
  `experience` varchar(50) NOT NULL,
  `salary` varchar(50) NOT NULL,
  `location` varchar(50) NOT NULL,
  `skills` varchar(255) NOT NULL,
  `descr` varchar(255) NOT NULL,
  `posted_on` datetime(5) NOT NULL,
  `industry` int(10) NOT NULL,
  `keywords` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `job`
--

INSERT INTO `job` (`job_id`, `job_title`, `company_name`, `experience`, `salary`, `location`, `skills`, `descr`, `posted_on`, `industry`, `keywords`) VALUES
(1, 'Frontend Developer', 'Facebook', '0-2yr', '$120k', 'Palo Alto', 'HTML, CSS, JavaScript', 'Will have to make the front-end systems', '2017-06-24 00:00:00.00000', 1, 'frontend, html, css, javascript, facebook, developer, palo alto'),
(2, 'Systems Engineer', 'Dell', '2-3y', '$80k', 'Mountain View, Cali', 'Node.js, Python', 'Make the logic that drives these huge websites', '2017-06-27 00:00:00.00000', 1, 'systems engineer dell node python'),
(3, 'Manufacturing Officer', 'Tata Steel', '2-3y', '$100k', 'Jamshedpur', 'Catia, ANSYS', 'Guide the workers and maintain a large project', '2017-06-22 00:00:00.00000', 2, 'tata steel jamshedpur manufacturing catia ansys'),
(4, 'Full-Stack Developer', 'Facebook', '2-4yr', '$140k', 'Silicon Valley, CA', 'MVC, Angular, Node.js, Sockets.io, Django', 'You will be responsible for managing the application, from starting to the deployment, testing of new features, regular updates on teams working under', '2017-06-25 00:00:12.00000', 1, 'full stack mvc angular node nodejs, node.js js javascript facebook sockets django developer silicon valley it ');

-- --------------------------------------------------------

--
-- Table structure for table `job_applications`
--

CREATE TABLE `job_applications` (
  `id` int(50) NOT NULL,
  `job_title` varchar(50) NOT NULL,
  `company_name` varchar(50) NOT NULL,
  `ref_num` int(50) NOT NULL,
  `applied_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `resume` varchar(50) NOT NULL,
  `applicant_name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `username` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `user_info`
--

CREATE TABLE `user_info` (
  `user_id` int(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `email` varchar(250) NOT NULL,
  `password` varchar(50) NOT NULL,
  `name` varchar(50) NOT NULL,
  `mobile` varchar(10) NOT NULL,
  `location` varchar(50) NOT NULL,
  `skills` varchar(255) NOT NULL,
  `age` int(10) NOT NULL,
  `address` text NOT NULL,
  `experience` varchar(10) NOT NULL,
  `qualification` varchar(100) NOT NULL,
  `preferences` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_info`
--

INSERT INTO `user_info` (`user_id`, `username`, `email`, `password`, `name`, `mobile`, `location`, `skills`, `age`, `address`, `experience`, `qualification`, `preferences`) VALUES
(1, 'stym06', 'satyammast@gmail.com', '3814d460c26c2dbab2d80294d2cc9882', 'Satyam Raj', '8235639917', 'Ranchi', 'HTML, CSS, JavaScript, Bootstrap, PHP', 20, 'Hostel D, NIT Jamshedpur, Jharkhand', '0', 'B.Tech', 'IT, Engineering'),
(2, 'shbmrj', 'shubhamraj50@gmail.com', '5568fda880263b9be0b72104354fa3dc', 'Shubham Raj', '9916059341', 'Bangalore', 'Java, C++, Python', 22, 'KS Layout, Bangalore', '1', 'BE', 'IT, Telecom'),
(3, 'prnv', 'pranavprem6@gmail.com', '9e1135ff4157f14358c7c94c79aad47d', 'Pranav Prem', '7903292834', 'ranchi', 'Ansys, AutoCad', 15, 'Block Road, Ratu, Ranchi', '0', 'Xth', 'Engineering'),
(6, 'kislay123', 'kislay@gmail.com', 'eac9073b431b28ce77fb02d0ac4b0295', 'Kislay Crosby', '9917956876', 'Bangalore', '', 0, '', '', '', ''),
(7, 'rishvrrj', 'rishav@hotmail.com', 'b4a7927a2c39e8e653247e129314420e', 'Rishav Raj', '8239576687', 'Jamshedpur', '', 0, '', '', '', ''),
(9, 'user', 'user@test.com', '81dc9bdb52d04dc20036dbd8313ed055', 'user', '9900990099', 'somewhere on earth', 'many skilss', 21, 'bngalore', '0', 'Btech', 'angular php');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `company`
--
ALTER TABLE `company`
  ADD PRIMARY KEY (`company_id`);

--
-- Indexes for table `industry`
--
ALTER TABLE `industry`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `job`
--
ALTER TABLE `job`
  ADD PRIMARY KEY (`job_id`);

--
-- Indexes for table `job_applications`
--
ALTER TABLE `job_applications`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_info`
--
ALTER TABLE `user_info`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `company`
--
ALTER TABLE `company`
  MODIFY `company_id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `industry`
--
ALTER TABLE `industry`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `job`
--
ALTER TABLE `job`
  MODIFY `job_id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `job_applications`
--
ALTER TABLE `job_applications`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;
--
-- AUTO_INCREMENT for table `user_info`
--
ALTER TABLE `user_info`
  MODIFY `user_id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
