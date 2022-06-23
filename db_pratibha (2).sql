-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 23, 2022 at 06:07 AM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 7.4.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_pratibha`
--

-- --------------------------------------------------------

--
-- Table structure for table `about_us`
--

CREATE TABLE `about_us` (
  `id` int(11) NOT NULL,
  `images` varchar(255) DEFAULT NULL,
  `content` text DEFAULT NULL,
  `content2` text DEFAULT NULL,
  `date` date NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `about_us`
--

INSERT INTO `about_us` (`id`, `images`, `content`, `content2`, `date`, `status`) VALUES
(14, '1651213320img01.jpg', ' Established in the year 2017, The Education Pratibha Darpan in Bokaro, Bokaro is a top player in the category Computer Academy in the Bokaro. Education Pratibha Darpan Private Limited to offer quality education which will ultimately lead the young minds to a successful career. We do not limit ourselves only to classroom teaching but we think beyond it. Registered Under Ministry of Corporate Affairs, Govt. of India and Registered under Income Tax Department, Govt. of India.The Company is also Certified by Quality Management System An ISO 9001:2015 Certified.The Institution Conducting Computer Oriented Courses. It Offers Courses of One Month, Two Months, Three Months, Six Months, One Year, One Year Six Months, Two Years and Short Term Duration Courses.The Institute Provide Value Based Quality Education For Computer Technology.', ' We embrace a learning environment that will prepare you for the path ahead. Our classes incorporate traditional learning styles as well as hands-on experiences. It is known to provide top service in the following categories: DNITC, DCITC, PG-DCSC, MDCSC, ADCPC, DCOMPC, ADCSC, DCOAC, MCCSC etc. Your success is our priority. To support our inclusive community, we provide a personal approach, tailoring learning methods to each students needs. our time duration is 07:00 AM to 05:00 PM.', '2022-04-29', 1);

-- --------------------------------------------------------

--
-- Table structure for table `add_notice`
--

CREATE TABLE `add_notice` (
  `id` int(11) NOT NULL,
  `notice` text DEFAULT NULL,
  `added_on` date DEFAULT NULL,
  `status` varchar(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `cent_id` varchar(100) DEFAULT NULL,
  `name` varchar(200) DEFAULT NULL,
  `email` varchar(200) DEFAULT NULL,
  `password` varchar(100) DEFAULT NULL,
  `role` varchar(100) DEFAULT NULL,
  `status` varchar(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `cent_id`, `name`, `email`, `password`, `role`, `status`) VALUES
(1, NULL, 'admin', 'admin@gmail.com', '12345', '1', '1');

-- --------------------------------------------------------

--
-- Table structure for table `admission_enquiry`
--

CREATE TABLE `admission_enquiry` (
  `id` int(11) NOT NULL,
  `name` varchar(50) DEFAULT NULL,
  `mobile` varchar(20) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `academic_qualification` text DEFAULT NULL,
  `course` varchar(20) DEFAULT NULL,
  `training_mode` varchar(100) DEFAULT NULL,
  `educational_doc` varchar(200) DEFAULT NULL,
  `aadhar` varchar(200) DEFAULT NULL,
  `added_on` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admission_enquiry`
--

INSERT INTO `admission_enquiry` (`id`, `name`, `mobile`, `email`, `academic_qualification`, `course`, `training_mode`, `educational_doc`, `aadhar`, `added_on`) VALUES
(10, 'Pankaj Mani tiwari', '7860403210', 'pmt.pankaj29@gmail.com', 'MCA', 'PG-DCC', 'online', '16424855428.jpg', '16424855421 (1).jpg', '2022-01-18'),
(11, 'asdasd asdsad asdasd', '7412589635', 'asfsfsd@gmail.com', 'dfgdsg', 'DCITC', 'ragular', '1642486114xperson_4_sq.jpg', '16424861145.jpg', '2022-01-18'),
(12, 'Pankaj Mani Tiwari', '7860403210', 'abcd@gmail.com', 'inter', 'DNITC', 'ragular', '16424864817.jpg', '16424864813.jpg', '2022-01-18');

-- --------------------------------------------------------

--
-- Table structure for table `centre_request`
--

CREATE TABLE `centre_request` (
  `id` int(11) NOT NULL,
  `name` varchar(200) DEFAULT NULL,
  `gender` varchar(50) DEFAULT NULL,
  `dob` date DEFAULT NULL,
  `mobile` varchar(200) DEFAULT NULL,
  `email` varchar(200) DEFAULT NULL,
  `location` varchar(200) DEFAULT NULL,
  `city` varchar(200) DEFAULT NULL,
  `state` varchar(200) DEFAULT NULL,
  `pincode` varchar(20) DEFAULT NULL,
  `precenter` varchar(200) DEFAULT NULL,
  `language` varchar(100) DEFAULT NULL,
  `other_info` varchar(100) DEFAULT NULL,
  `aadhar_img` varchar(100) DEFAULT NULL,
  `added_on` date NOT NULL,
  `status` varchar(1) DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `centre_request`
--

INSERT INTO `centre_request` (`id`, `name`, `gender`, `dob`, `mobile`, `email`, `location`, `city`, `state`, `pincode`, `precenter`, `language`, `other_info`, `aadhar_img`, `added_on`, `status`) VALUES
(7, 'Pankaj', 'male', '2022-01-06', '7485963652', 'pmt@gmail.com', 'Ranchi jharkhand', 'Ranchi', 'Jharkhand', '74856', 'yes', 'hindi', '', '16424229698.jpg', '2022-01-17', '1'),
(8, 'rtyrty', 'male', '2022-03-08', 'retertre', 'ertret', 'erter', 'etre', 'ertret', 'etertret', 'yes', 'hindi', 'ertertret', NULL, '2022-03-10', '1');

-- --------------------------------------------------------

--
-- Table structure for table `course`
--

CREATE TABLE `course` (
  `id` int(11) NOT NULL,
  `short_name` varchar(200) DEFAULT NULL,
  `course_name` text DEFAULT NULL,
  `status` varchar(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `course`
--

INSERT INTO `course` (`id`, `short_name`, `course_name`, `status`) VALUES
(1, 'DNITC', 'Diploma in Nursery teacher training Course', '1'),
(2, 'DCITC', 'Diploma in Computer Teacher Training Course', '1'),
(3, 'PG-DCC', 'PG-Diploma in Computer Course ', '1'),
(4, 'MDCC', 'Marter Diploma in Computer Course', '1'),
(5, 'ADCPC', 'Advance Diploma in Computer Programming Course', '1'),
(6, 'DCOMPC', 'Diploma in Computer Office Management & Publishing Course', '1'),
(7, 'ADCC', 'Advance Diploma in Computer Course', '1'),
(8, 'DCOAC', 'Diploma in Computer Office & Accounting Course', '1'),
(9, 'MCCC', 'Master Certificate in Computer Course', '1'),
(10, 'DCFAC', 'Diploma in Computer Financial Accounting Course', '1'),
(11, 'DDTPC', 'Diploma in Desktop Publishing Course', '1'),
(12, 'DWDC', 'Diploma in Web Designing Course', '1'),
(13, 'DCC', 'Diploma in Computer Course', '1'),
(14, 'CCC', 'Certificate in Computer Course', '1'),
(15, 'CBCC', 'Certificate in Basic Computer Course', '1'),
(16, 'CCFAC', 'Certificate in Computer Financial Accounting Course', '1'),
(17, 'CCET', 'Certificate in Computer English Typing', '1'),
(18, 'CCHT', 'Certificate in Computer Hindi Typing', '1'),
(19, 'CCEHT', 'Certificate in Computer Eng/Hindi Typing', '1'),
(20, 'CBC', 'Certificate in Basic Computer', '1'),
(21, 'CESPD', 'Certificate in English Speaking & PD', '1'),
(22, 'CDTP', 'Certificate in DTP', '1'),
(23, 'CT', 'Certificate in Tally', '1'),
(24, 'CBP', 'Certificate in Basic Programming', '1');

-- --------------------------------------------------------

--
-- Table structure for table `field_excutive`
--

CREATE TABLE `field_excutive` (
  `id` int(11) NOT NULL,
  `name` varchar(200) DEFAULT NULL,
  `gender` varchar(200) DEFAULT NULL,
  `dob` date DEFAULT NULL,
  `mobile` varchar(200) DEFAULT NULL,
  `email` varchar(200) DEFAULT NULL,
  `location` varchar(200) DEFAULT NULL,
  `city` varchar(200) DEFAULT NULL,
  `state` varchar(200) DEFAULT NULL,
  `pincode` varchar(200) DEFAULT NULL,
  `fathername` text NOT NULL,
  `aadhaar` text NOT NULL,
  `bankname` text NOT NULL,
  `bankaccount` text NOT NULL,
  `ifsc` text NOT NULL,
  `password` varchar(200) DEFAULT NULL,
  `otp` int(100) NOT NULL,
  `added_on` date DEFAULT NULL,
  `role` varchar(2) DEFAULT '2',
  `status` varchar(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `field_excutive`
--

INSERT INTO `field_excutive` (`id`, `name`, `gender`, `dob`, `mobile`, `email`, `location`, `city`, `state`, `pincode`, `fathername`, `aadhaar`, `bankname`, `bankaccount`, `ifsc`, `password`, `otp`, `added_on`, `role`, `status`) VALUES
(13, 'kumar', 'male', '2022-04-01', '8507284575', 'admin@gmail.com', 'dfsadf', 'dsfsd', 'sdfds', 'fdsfs', 'dfsdsfds', 'dfsfsdfd', 'fdsfsd', 'dfssafds', 'sdffsd', '12345', 0, '2022-04-06', '2', '1'),
(14, 'Nakul', 'male', '2022-03-02', '7536985215', 'nakul@gmail.com', 'kadru', 'ranchi', 'Jharkhand', '741258', 'sunil kumar Mahto', '741258963214', 'Canara Bank', '231110005865', 'CNRB654465', 'nakul@123', 779295, '2022-04-06', '2', '1');

-- --------------------------------------------------------

--
-- Table structure for table `homework`
--

CREATE TABLE `homework` (
  `pid` int(11) NOT NULL,
  `assessment` varchar(255) NOT NULL,
  `name` text NOT NULL,
  `date` date NOT NULL,
  `status` int(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `homework`
--

INSERT INTO `homework` (`pid`, `assessment`, `name`, `date`, `status`) VALUES
(11, '1651467625demo.pdf', 'science', '2022-05-02', 1);

-- --------------------------------------------------------

--
-- Table structure for table `master_result`
--

CREATE TABLE `master_result` (
  `pid` int(11) NOT NULL,
  `candi_id` int(11) NOT NULL,
  `exam_id` int(11) NOT NULL,
  `total_marks` int(200) NOT NULL,
  `correct_marks` int(200) NOT NULL,
  `added_on` date NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `master_result`
--

INSERT INTO `master_result` (`pid`, `candi_id`, `exam_id`, `total_marks`, `correct_marks`, `added_on`, `status`) VALUES
(1, 18, 1, 3, 3, '0000-00-00', 1),
(2, 0, 0, 0, 0, '0000-00-00', 1),
(3, 18, 1, 3, 2, '2022-03-05', 1),
(4, 16, 1, 12, 11, '2022-06-18', 1);

-- --------------------------------------------------------

--
-- Table structure for table `material_upload`
--

CREATE TABLE `material_upload` (
  `id` int(11) NOT NULL,
  `course` text DEFAULT NULL,
  `topic_name` text DEFAULT NULL,
  `upload_image` varchar(200) DEFAULT NULL,
  `upload_pdf` varchar(200) DEFAULT NULL,
  `video` text DEFAULT NULL,
  `added_on` date DEFAULT NULL,
  `status` varchar(1) DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `material_upload`
--

INSERT INTO `material_upload` (`id`, `course`, `topic_name`, `upload_image`, `upload_pdf`, `video`, `added_on`, `status`) VALUES
(21, 'DNITC', NULL, NULL, '1647352479SPMC PROFILE.pdf', NULL, NULL, '1');

-- --------------------------------------------------------

--
-- Table structure for table `online_question`
--

CREATE TABLE `online_question` (
  `id` int(11) NOT NULL,
  `test_id` int(100) DEFAULT NULL,
  `question` text DEFAULT NULL,
  `option_a` varchar(200) DEFAULT NULL,
  `option_b` varchar(200) DEFAULT NULL,
  `option_c` varchar(200) DEFAULT NULL,
  `option_d` varchar(200) DEFAULT NULL,
  `correct_ans` varchar(200) DEFAULT NULL,
  `marks` varchar(200) DEFAULT NULL,
  `added_on` date DEFAULT NULL,
  `status` varchar(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `online_question`
--

INSERT INTO `online_question` (`id`, `test_id`, `question`, `option_a`, `option_b`, `option_c`, `option_d`, `correct_ans`, `marks`, `added_on`, `status`) VALUES
(10, 0, 'what is current ?', 'ampere', 'voltage', 'watt', 'none', 'ampere', '2', '2022-04-15', '1'),
(11, 0, 'what is class?\r\n', 'blue print of object', 'blue print of method', 'blue print of  function', 'none', 'blue print of object', '1', '2022-04-15', '1'),
(12, 0, 'what is  enheritance', 'grap the data and functionality', 'data and functionality ', 'functionalilty ', 'none', 'grap the data and functionality', '2', '2022-04-14', '1'),
(13, 0, 'what is function?', 'set of instruction ', 'set of data', 'set of order', 'none', 'set of instruction ', '2', '2022-04-14', '1'),
(14, 1, 'what is name', 'name', 'workd', 'title', 'none', 'name', '1', '2022-04-15', '1'),
(15, 1, 'what is current?', 'Ampere', 'voltage', 'flow  the voltage', 'none', 'Ampere', '2', '2022-04-15', '1');

-- --------------------------------------------------------

--
-- Table structure for table `paid_student`
--

CREATE TABLE `paid_student` (
  `id` int(11) NOT NULL,
  `name` varchar(200) DEFAULT NULL,
  `student_id` varchar(200) DEFAULT NULL,
  `mobile` varchar(20) DEFAULT NULL,
  `email` varchar(200) DEFAULT NULL,
  `amount` varchar(200) DEFAULT NULL,
  `request_no` varchar(200) DEFAULT NULL,
  `payment_id` varchar(200) DEFAULT NULL,
  `payment_details` text DEFAULT NULL,
  `payment_status` varchar(1) NOT NULL DEFAULT '0',
  `added_on` date DEFAULT NULL,
  `status` varchar(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `paid_student`
--

INSERT INTO `paid_student` (`id`, `name`, `student_id`, `mobile`, `email`, `amount`, `request_no`, `payment_id`, `payment_details`, `payment_status`, `added_on`, `status`) VALUES
(4, 'Pankaj', '10', '7485963652', 'a@gmail.com', '200', 'EskrNRA3FfzUHx8', 'pay_J7iRvRu3Raw7HO', '{\"razorpay_payment_id\":\"pay_J7iRvRu3Raw7HO\",\"merchant_order_id\":\"Sj3d1oJkW4UevMYx7G\",\"merchant_trans_id\":\"1647423941\",\"merchant_product_info_id\":\"Payment for Admission\",\"merchant_surl_id\":\"payment-success.php\",\"merchant_furl_id\":\"payment-success.php\",\"card_holder_name_id\":\"Pankaj\",\"merchant_total\":\"20000\",\"merchant_amount\":\"200\",\"order_id\":\"Sj3d1oJkW4UevMYx7G\"}', '1', '2022-03-16', '1');

-- --------------------------------------------------------

--
-- Table structure for table `result`
--

CREATE TABLE `result` (
  `id` int(11) NOT NULL,
  `enroll` varchar(200) DEFAULT NULL,
  `center_id` varchar(200) DEFAULT NULL,
  `course` varchar(200) DEFAULT NULL,
  `name` varchar(200) DEFAULT NULL,
  `upload_image` varchar(200) DEFAULT NULL,
  `added_on` varchar(200) DEFAULT NULL,
  `status` bit(2) NOT NULL DEFAULT b'1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `result`
--

INSERT INTO `result` (`id`, `enroll`, `center_id`, `course`, `name`, `upload_image`, `added_on`, `status`) VALUES
(58, 'ED00025', '', 'Deploma In Computer Application', 'Pankaj Mani Tiwari', '1640769077WITHQNJ5ZVI57HWPUROYW6TGEM (1).jpg', '2021-12-29', b'01'),
(59, 'ED00012', '', 'Deploma in Computer Teacher Training Course(DCITC)', 'Mohan Singh', '1640777768WhatsApp Image 2021-08-31 at 12.jpg', '2021-12-29', b'01'),
(60, 'UCC007825', '8', 'Certificate in basic Computer', 'Ramesh Singh', '1640777966WhatsApp Image 2021-08-31 at 12.jpg', '2021-12-29', b'01'),
(62, '', '', '---SELECT---', 'Pankaj', '', '', b'01');

-- --------------------------------------------------------

--
-- Table structure for table `sh_addcenter`
--

CREATE TABLE `sh_addcenter` (
  `id` int(11) NOT NULL,
  `cent_code` varchar(200) DEFAULT NULL,
  `cent_name` varchar(200) DEFAULT NULL,
  `address` text DEFAULT NULL,
  `mobile` varchar(20) DEFAULT NULL,
  `email` varchar(200) DEFAULT NULL,
  `password` varchar(200) DEFAULT NULL,
  `added_on` date DEFAULT NULL,
  `status` varchar(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `sh_addcenter`
--

INSERT INTO `sh_addcenter` (`id`, `cent_code`, `cent_name`, `address`, `mobile`, `email`, `password`, `added_on`, `status`) VALUES
(1, 'SCE0001', 'NATIONAL EDUCATION CENTER', '2nd Floor, Janki Tower, Opp. Easy Day Club, Morabadi, Ranchi – 834008, Jharkhand', '7865258436', 'necranchi@23gmail.com', '12345', '2021-12-24', '1'),
(4, 'SCE0004', 'NEED INFORMATION TECHNOLOGY', 'Street1, Near Ratu, ranchi 8200015 Jharkhand', '7865259246', 'needIT123@gmail.com', '16952', '2021-12-24', '1'),
(5, 'SCE0005', 'SATYAM COMPUTER', 'Gandhi nagar, Near bank Mode, Bokaro 8270045 Jharkhand', '4589653481', 'satyamcom@gmail.com', '43956', '2021-12-24', '1'),
(6, 'SCE0006', 'FUTURE GALAXY COMPUTER EDUCATION', 'ACC Colony, Near ASC Collage, Hazaribagh 845762 Jharkhand', '7485962886', 'fgceComputer@gmail.com', '12345', '2021-12-24', '1'),
(7, 'SCE0007', 'WAVE COMPUTERS', 'Subash nagar,Dhanbad 8309876,Jharkhand', '7856257936', 'wavec@gmail.com', '49268', '2021-12-24', '1'),
(8, 'SCE0008', 'ULTRA COMPUTER CENTRE', 'ST-987, Ranchi road, Dhanbad 8245006 Jharkhand', '4585694917', 'ucc@gmail.com', '12345', '2021-12-24', '1'),
(9, 'SCE0009', 'VIJAY COMPUTER INSTITUTE', '762-BS,Near SO office, Khalari ranchi 827305 Jharkhand', '4585694910', 'vcicomputer@gmail.com', '49316', '2021-12-24', '1'),
(10, 'SCE0010', 'INSTITUTE OF YOUNG ENGINEERS', 'AV87-12,Near Durga Printers,Ratu ranchi 824570 Jharkhand', '1245783017', 'iyc29@gmail.com', '12459', '2021-12-24', '1');

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `id` int(11) NOT NULL,
  `name` varchar(200) DEFAULT NULL,
  `ac_qualify` varchar(200) DEFAULT NULL,
  `dob` varchar(200) DEFAULT NULL,
  `fathername` text NOT NULL,
  `bankname` text NOT NULL,
  `bankaccount` text NOT NULL,
  `ifsc` text NOT NULL,
  `executive_id` varchar(200) DEFAULT NULL,
  `course` varchar(200) DEFAULT NULL,
  `address` text DEFAULT NULL,
  `mobile` varchar(20) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `otp` text NOT NULL,
  `password` varchar(100) DEFAULT NULL,
  `amount` text NOT NULL,
  `pay_date` date NOT NULL,
  `payment_id` text NOT NULL,
  `payment_details` text NOT NULL,
  `payment_status` int(10) NOT NULL DEFAULT 0,
  `role` varchar(1) NOT NULL DEFAULT '3',
  `added_on` date DEFAULT NULL,
  `status` varchar(1) NOT NULL DEFAULT '1',
  `request_no` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`id`, `name`, `ac_qualify`, `dob`, `fathername`, `bankname`, `bankaccount`, `ifsc`, `executive_id`, `course`, `address`, `mobile`, `email`, `otp`, `password`, `amount`, `pay_date`, `payment_id`, `payment_details`, `payment_status`, `role`, `added_on`, `status`, `request_no`) VALUES
(16, 'aadarsh', 'B.E', '1999-02-15', 'sunil kumar mahto', 'canara bank', '654798465846954', 'CNRB65456', '14', '', 'Kadru', '7412589635', 'aadarsh629@gmail.com', '551442', '123456', '', '0000-00-00', '', '', 1, '3', '2022-04-06', '1', ''),
(17, 'aadarsh', 'B.E', '2022-04-09', 'sunil kumar mahto', 'asdfasd', '', 'CNRB65456', '13', '', 'dsfdsfsd', '8507284575', 'a@gmail.com', '', '12345', '', '0000-00-00', '', '', 1, '3', '2022-04-06', '1', ''),
(18, 'aadarsh', 'B.E', '2022-04-09', '', '', '', '', '13', '', 'asdfasd', '8507284575', 'admin@gmail.com', '', 'aadarsh@123', '531', '2022-04-15', 'pay_JJYP2JSoUZt4V6', '{\"razorpay_payment_id\":\"pay_JJYP2JSoUZt4V6\",\"merchant_order_id\":\"OEsG2g01FHRyQkbwc9\",\"merchant_trans_id\":\"1650008636\",\"merchant_product_info_id\":\"Payment for Admission\",\"merchant_surl_id\":\"payment-success.php\",\"merchant_furl_id\":\"payment-success.php\",\"card_holder_name_id\":\"aadarsh\",\"merchant_total\":\"53100\",\"merchant_amount\":\"531\",\"order_id\":\"OEsG2g01FHRyQkbwc9\"}', 1, '3', '2022-04-07', '1', 'p8ghU0DFP2XeIAb'),
(19, 'kumar', 'B.E', '2022-04-05', '', '', '', '', '14', '', 'sdfasdfsadf', '7894561236', 'kumar@gmail.com', '', 'kumar@123', '531', '2022-05-04', '', '', 1, '3', '2022-04-07', '1', '12ETe76yjzn8a9A'),
(20, 'Damodar', 'B.E', '1885-12-05', '', '', '', '', '14', '', 'kadru', '7412589636', 'nakul@gmail.com', '', '12345', '', '0000-00-00', '', '', 1, '3', '2022-04-07', '1', ''),
(21, 'dassdfds', 'B.E', '2022-03-31', 'sadfasdf', 'asdfasd', 'asdfasdf', 'asdfasdf', '13', '', 'sdfasdf', '8507284575', 'asdfa@gmail.com', '', '12345', '', '0000-00-00', '', '', 1, '3', '2022-04-07', '1', ''),
(22, 'aadarsh', 'lksd', '2022-04-08', 'sunil kumar mahto', 'canara bank', '6547984658', 'CNRB65456', '13', NULL, 'Kadru', '7412589635', 'anshukumar@gmail.com', '', '12345', '', '0000-00-00', '', '', 0, '3', '2022-04-12', '1', ''),
(23, 'swati', 'B.E', '1995-11-12', 'ashok kumar shrivastaVA', 'CANARA bANK', '23100010055', 'CNRB65456', '13', NULL, 'kadru', '7894561235', 'swati@gmail.com', '', '123456', '', '0000-00-00', '', '', 0, '3', '2022-04-13', '1', ''),
(24, 'swati', 'B.E', '2022-03-31', 'ashok kumar shrivastaVA', 'canara bank', '6547984658', 'CNRB65456', '13', NULL, 'kadru', '8507284575', 'b@gmail.com', '', '12345', '', '0000-00-00', '', '', 0, '3', '2022-04-13', '1', ''),
(25, 'Gallery', 'B.E', '2022-04-08', 'sunil kumar mahto', 'canara bank', '6547984658', 'CNRB65456', '14', NULL, 'kadru', '7412589635', 'c@gmail.com', '', '123456', '531', '2022-04-15', '', '', 0, '3', '2022-04-13', '1', 'y0SNUfrztuQXFde'),
(26, 'Afarni', 'B.E', '2022-04-09', 'mohd khan', 'canra bank', '23100100655', 'IFSC54564', '13', NULL, 'Kadru ranchi 4100147', '8507284575', 'afrani@gmail.com', '', 'abc@123', '', '0000-00-00', '', '', 0, '3', '2022-04-29', '1', '');

-- --------------------------------------------------------

--
-- Table structure for table `testimonial`
--

CREATE TABLE `testimonial` (
  `id` int(11) NOT NULL,
  `testimonial` text NOT NULL,
  `testi_name` varchar(200) NOT NULL,
  `added_on` date NOT NULL,
  `status` varchar(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `testimonial`
--

INSERT INTO `testimonial` (`id`, `testimonial`, `testi_name`, `added_on`, `status`) VALUES
(1, 'This was my first time taking a course in this format and it far exceeded my expectations.', 'Pankaj Mani Tiwari', '2021-12-30', '1'),
(2, 'I came to the class already with some knowledge of the program, but learned a good deal more thanks to your class.', 'Satya', '2021-12-30', '1'),
(3, 'The class is awesome! The instructor spoke very clear and was very knowledgeable and patient.', 'Saurabh Kumar', '2021-12-30', '1');

-- --------------------------------------------------------

--
-- Table structure for table `test_master`
--

CREATE TABLE `test_master` (
  `id` int(11) NOT NULL,
  `test_name` varchar(200) DEFAULT NULL,
  `no_question` varchar(200) DEFAULT NULL,
  `total_marks` varchar(200) DEFAULT NULL,
  `time_duration` int(100) DEFAULT NULL,
  `added_on` date DEFAULT NULL,
  `status` varchar(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `test_master`
--

INSERT INTO `test_master` (`id`, `test_name`, `no_question`, `total_marks`, `time_duration`, `added_on`, `status`) VALUES
(1, 'TEST1', '2', '200', 35, '2022-03-16', '1'),
(2, 'TEST2', '0', '50', 30, '2022-03-16', '1'),
(4, 'TEST4', '0', '100', 30, '2022-04-12', '1');

-- --------------------------------------------------------

--
-- Table structure for table `test_result`
--

CREATE TABLE `test_result` (
  `pid` int(200) NOT NULL,
  `candidate_id` int(100) NOT NULL,
  `answer` text NOT NULL,
  `correct_ans` text NOT NULL,
  `ques_id` int(100) NOT NULL,
  `exam_id` int(100) NOT NULL,
  `added_on` datetime NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `test_result`
--

INSERT INTO `test_result` (`pid`, `candidate_id`, `answer`, `correct_ans`, `ques_id`, `exam_id`, `added_on`, `status`) VALUES
(11, 0, 'blue print of object', 'blue print of object', 11, 2, '2022-04-13 00:00:00', 1),
(12, 0, 'blue print of  function', 'blue print of object', 11, 2, '2022-04-13 00:00:00', 1),
(13, 2, 'blue print of  function', 'blue print of object', 11, 2, '2022-04-13 00:00:00', 1),
(14, 18, 'blue print of  function', 'blue print of object', 11, 2, '2022-04-13 00:00:00', 1),
(15, 18, 'ampere', 'ampere', 10, 1, '2022-04-13 00:00:00', 1),
(16, 18, 'functionalilty ', 'grap the data and functionality', 12, 1, '2022-04-13 00:00:00', 1),
(17, 18, 'ampere', 'ampere', 10, 1, '2022-04-13 00:00:00', 1),
(18, 18, 'functionalilty ', 'grap the data and functionality', 12, 1, '2022-04-13 00:00:00', 1),
(19, 18, 'ampere', 'ampere', 10, 1, '2022-04-13 00:00:00', 1),
(20, 18, 'functionalilty ', 'grap the data and functionality', 12, 1, '2022-04-13 00:00:00', 1),
(21, 18, 'watt', 'ampere', 10, 1, '2022-04-13 00:00:00', 1),
(22, 18, 'functionalilty ', 'grap the data and functionality', 12, 1, '2022-04-13 00:00:00', 1),
(23, 18, 'ampere', 'ampere', 10, 1, '2022-04-13 00:00:00', 1),
(24, 18, 'grap the data and functionality', 'grap the data and functionality', 12, 1, '2022-04-13 00:00:00', 1),
(25, 18, 'ampere', 'ampere', 10, 1, '2022-04-13 00:00:00', 1),
(26, 18, 'grap the data and functionality', 'grap the data and functionality', 12, 1, '2022-04-13 00:00:00', 1),
(27, 18, 'watt', 'ampere', 10, 1, '2022-04-13 00:00:00', 1),
(28, 18, 'functionalilty ', 'grap the data and functionality', 12, 1, '2022-04-13 00:00:00', 1),
(29, 18, 'voltage', 'ampere', 10, 1, '2022-04-13 00:00:00', 1),
(30, 18, 'functionalilty ', 'grap the data and functionality', 12, 1, '2022-04-13 00:00:00', 1),
(31, 18, 'watt', 'ampere', 10, 1, '2022-04-13 00:00:00', 1),
(32, 18, 'none', 'grap the data and functionality', 12, 1, '2022-04-13 00:00:00', 1),
(33, 18, 'watt', 'ampere', 10, 1, '2022-04-13 00:00:00', 1),
(34, 18, 'none', 'grap the data and functionality', 12, 1, '2022-04-13 00:00:00', 1),
(35, 18, 'watt', 'ampere', 10, 1, '2022-04-13 00:00:00', 1),
(36, 18, 'functionalilty ', 'grap the data and functionality', 12, 1, '2022-04-13 00:00:00', 1),
(37, 18, 'none', 'ampere', 10, 1, '2022-04-13 00:00:00', 1),
(38, 18, 'none', 'grap the data and functionality', 12, 1, '2022-04-13 00:00:00', 1),
(39, 18, 'ampere', 'ampere', 10, 1, '2022-04-13 00:00:00', 1),
(40, 18, 'grap the data and functionality', 'grap the data and functionality', 12, 1, '2022-04-13 00:00:00', 1),
(41, 18, 'watt', 'ampere', 10, 1, '2022-04-13 00:00:00', 1),
(42, 18, 'grap the data and functionality', 'grap the data and functionality', 12, 1, '2022-04-13 00:00:00', 1),
(43, 18, 'watt', 'ampere', 10, 1, '2022-04-13 00:00:00', 1),
(44, 18, 'grap the data and functionality', 'grap the data and functionality', 12, 1, '2022-04-13 00:00:00', 1),
(45, 18, 'watt', 'ampere', 10, 1, '2022-04-13 00:00:00', 1),
(46, 18, 'functionalilty ', 'grap the data and functionality', 12, 1, '2022-04-13 00:00:00', 1),
(47, 18, 'ampere', 'ampere', 10, 1, '2022-04-14 00:00:00', 1),
(48, 18, 'grap the data and functionality', 'grap the data and functionality', 12, 1, '2022-04-14 00:00:00', 1),
(49, 18, 'ampere', 'ampere', 10, 1, '2022-04-14 00:00:00', 1),
(50, 18, 'set of instruction ', 'set of instruction', 13, 1, '2022-04-14 00:00:00', 1),
(51, 18, 'ampere', 'ampere', 10, 1, '2022-04-14 00:00:00', 1),
(52, 18, 'set of instruction ', 'set of instruction', 13, 1, '2022-04-14 00:00:00', 1),
(53, 18, 'ampere', 'ampere', 10, 1, '2022-04-14 00:00:00', 1),
(54, 18, 'set of instruction ', 'set of instruction', 13, 1, '2022-04-14 00:00:00', 1),
(55, 18, 'ampere', 'ampere', 10, 1, '2022-04-14 00:00:00', 1),
(56, 18, 'set of instruction ', 'set of instruction', 13, 1, '2022-04-14 00:00:00', 1),
(57, 18, 'ampere', 'ampere', 10, 1, '2022-04-14 13:14:00', 1),
(58, 18, 'set of instruction ', 'set of instruction', 13, 1, '2022-04-14 13:14:00', 1),
(59, 18, 'ampere', 'ampere', 10, 1, '2022-04-14 13:19:00', 1),
(60, 18, 'name', 'name', 14, 1, '2022-04-14 13:19:00', 1),
(61, 18, 'ampere', 'ampere', 10, 1, '2022-04-14 13:00:00', 1),
(62, 18, 'name', 'name', 14, 1, '2022-04-14 13:00:00', 1),
(63, 18, 'ampere', 'ampere', 10, 1, '2022-04-14 14:00:00', 1),
(64, 18, 'name', 'name', 14, 1, '2022-04-14 14:00:00', 1),
(65, 18, 'ampere', 'ampere', 10, 1, '2022-04-14 14:00:00', 1),
(66, 18, 'name', 'name', 14, 1, '2022-04-14 14:00:00', 1),
(67, 18, 'ampere', 'ampere', 10, 1, '2022-04-14 14:00:00', 1),
(68, 18, 'workd', 'name', 14, 1, '2022-04-14 14:00:00', 1),
(69, 18, 'ampere', 'ampere', 10, 1, '2022-04-14 15:00:00', 1),
(70, 18, 'workd', 'name', 14, 1, '2022-04-14 15:00:00', 1),
(71, 18, 'ampere', 'ampere', 10, 1, '2022-04-14 15:00:00', 1),
(72, 18, 'name', 'name', 14, 1, '2022-04-14 15:00:00', 1),
(73, 18, 'ampere', 'ampere', 10, 1, '2022-04-14 15:00:00', 1),
(74, 18, 'name', 'name', 14, 1, '2022-04-14 15:00:00', 1),
(75, 18, 'ampere', 'ampere', 10, 1, '2022-04-14 15:00:00', 1),
(76, 18, 'name', 'name', 14, 1, '2022-04-14 15:00:00', 1),
(77, 19, 'name', 'name', 14, 1, '2022-05-03 17:00:00', 1),
(78, 19, 'Ampere', 'Ampere', 15, 1, '2022-05-03 17:00:00', 1),
(79, 19, 'name', 'name', 14, 1, '2022-05-04 11:00:00', 1),
(80, 19, 'voltage', 'Ampere', 15, 1, '2022-05-04 11:00:00', 1),
(81, 18, 'title', 'name', 14, 1, '2022-05-04 12:00:00', 1),
(82, 18, 'Ampere', 'Ampere', 15, 1, '2022-05-04 12:00:00', 1),
(83, 18, 'title', 'name', 14, 1, '2022-05-04 12:00:00', 1),
(84, 18, 'Ampere', 'Ampere', 15, 1, '2022-05-04 12:00:00', 1),
(85, 19, 'name', 'name', 14, 1, '2022-05-04 12:00:00', 1),
(86, 19, 'voltage', 'Ampere', 15, 1, '2022-05-04 12:00:00', 1),
(87, 18, 'name', 'name', 14, 1, '2022-06-09 09:00:00', 1),
(88, 18, 'Ampere', 'Ampere', 15, 1, '2022-06-09 09:00:00', 1),
(89, 16, 'title', 'name', 14, 1, '2022-06-18 16:00:00', 1),
(90, 16, 'Ampere', 'Ampere', 15, 1, '2022-06-18 16:00:00', 1),
(91, 16, 'name', 'name', 14, 1, '2022-06-18 16:00:00', 1),
(92, 16, 'Ampere', 'Ampere', 15, 1, '2022-06-18 16:00:00', 1),
(93, 16, 'name', 'name', 14, 1, '2022-06-18 16:00:00', 1),
(94, 16, 'Ampere', 'Ampere', 15, 1, '2022-06-18 16:00:00', 1),
(95, 16, 'name', 'name', 14, 1, '2022-06-18 16:00:00', 1),
(96, 16, 'Ampere', 'Ampere', 15, 1, '2022-06-18 16:00:00', 1);

-- --------------------------------------------------------

--
-- Table structure for table `winner`
--

CREATE TABLE `winner` (
  `pid` int(11) NOT NULL,
  `name` text NOT NULL,
  `percentage` varchar(255) NOT NULL,
  `father_name` text NOT NULL,
  `mother_name` text NOT NULL,
  `Rank` int(10) NOT NULL,
  `year` text NOT NULL,
  `date` date NOT NULL,
  `status` int(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `winner`
--

INSERT INTO `winner` (`pid`, `name`, `percentage`, `father_name`, `mother_name`, `Rank`, `year`, `date`, `status`) VALUES
(7, 'anil', '75', 'Mahto', 'miss mahto', 3, '2022-04-06', '2022-04-01', 1),
(8, 'kunal', '72.4', 'srinivas', 'miss srinivas', 7, '2022-04-14', '2022-04-01', 1),
(10, 'Aakash', '98.6', 'Ashok kumar Shrivastava', 'sunita Devi', 1, '2022-04-07', '2022-04-01', 1),
(11, 'kumar', '84.6', 'ashok', 'sunita Devi', 2, '2022-04-14', '2022-04-04', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `about_us`
--
ALTER TABLE `about_us`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `add_notice`
--
ALTER TABLE `add_notice`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `admission_enquiry`
--
ALTER TABLE `admission_enquiry`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `centre_request`
--
ALTER TABLE `centre_request`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `course`
--
ALTER TABLE `course`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `field_excutive`
--
ALTER TABLE `field_excutive`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `homework`
--
ALTER TABLE `homework`
  ADD PRIMARY KEY (`pid`);

--
-- Indexes for table `master_result`
--
ALTER TABLE `master_result`
  ADD PRIMARY KEY (`pid`);

--
-- Indexes for table `material_upload`
--
ALTER TABLE `material_upload`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `online_question`
--
ALTER TABLE `online_question`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `paid_student`
--
ALTER TABLE `paid_student`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `result`
--
ALTER TABLE `result`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sh_addcenter`
--
ALTER TABLE `sh_addcenter`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `testimonial`
--
ALTER TABLE `testimonial`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `test_master`
--
ALTER TABLE `test_master`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `test_result`
--
ALTER TABLE `test_result`
  ADD PRIMARY KEY (`pid`);

--
-- Indexes for table `winner`
--
ALTER TABLE `winner`
  ADD PRIMARY KEY (`pid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `about_us`
--
ALTER TABLE `about_us`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `add_notice`
--
ALTER TABLE `add_notice`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `admission_enquiry`
--
ALTER TABLE `admission_enquiry`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `centre_request`
--
ALTER TABLE `centre_request`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `course`
--
ALTER TABLE `course`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `field_excutive`
--
ALTER TABLE `field_excutive`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `homework`
--
ALTER TABLE `homework`
  MODIFY `pid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `master_result`
--
ALTER TABLE `master_result`
  MODIFY `pid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `material_upload`
--
ALTER TABLE `material_upload`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `online_question`
--
ALTER TABLE `online_question`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `paid_student`
--
ALTER TABLE `paid_student`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `result`
--
ALTER TABLE `result`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=63;

--
-- AUTO_INCREMENT for table `sh_addcenter`
--
ALTER TABLE `sh_addcenter`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `student`
--
ALTER TABLE `student`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `testimonial`
--
ALTER TABLE `testimonial`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `test_master`
--
ALTER TABLE `test_master`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `test_result`
--
ALTER TABLE `test_result`
  MODIFY `pid` int(200) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=97;

--
-- AUTO_INCREMENT for table `winner`
--
ALTER TABLE `winner`
  MODIFY `pid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
