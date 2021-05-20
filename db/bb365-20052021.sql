-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 20, 2021 at 03:45 PM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.3.22

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bb365`
--

-- --------------------------------------------------------

--
-- Table structure for table `bill`
--

CREATE TABLE `bill` (
  `id` int(11) NOT NULL,
  `customer_id` int(11) DEFAULT NULL,
  `name` varchar(200) DEFAULT NULL,
  `mobile` double DEFAULT NULL,
  `area` varchar(200) DEFAULT NULL,
  `state` text DEFAULT NULL,
  `house_no` varchar(100) DEFAULT NULL,
  `landmark` varchar(100) DEFAULT NULL,
  `address_type` varchar(100) DEFAULT NULL,
  `city` text DEFAULT NULL,
  `pincode` int(11) DEFAULT NULL,
  `status` varchar(200) DEFAULT NULL,
  `coupon_code` varchar(10) DEFAULT NULL,
  `discount` float(10,2) DEFAULT NULL,
  `sub_total` float(10,2) DEFAULT NULL,
  `total_amount` float(10,2) DEFAULT 0.00,
  `bill_date` date DEFAULT NULL,
  `notes` varchar(200) DEFAULT NULL,
  `email_sent` tinyint(4) NOT NULL DEFAULT 0,
  `notification_sent` tinyint(4) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp(),
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `blog`
--

CREATE TABLE `blog` (
  `id` int(11) NOT NULL,
  `name` text DEFAULT NULL,
  `photo` text DEFAULT NULL,
  `description` longtext DEFAULT NULL,
  `tags` varchar(250) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp(),
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `business`
--

CREATE TABLE `business` (
  `id` int(11) NOT NULL,
  `Business_1619854444.jpg` varchar(25) DEFAULT NULL,
  `Advocate` varchar(34) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `business`
--

INSERT INTO `business` (`id`, `Business_1619854444.jpg`, `Advocate`) VALUES
(1, 'Business_1619854116.jpg', 'Agarbatti'),
(2, 'Business_1619851740.jpg', 'Agriculture'),
(3, 'Business_1619851684.jpg', 'Art and Design'),
(4, 'Business_1600509077.png', 'Astrologer'),
(5, 'Business_1619851493.jpg', 'Automobile'),
(6, 'Business_1619854473.jpg', 'Ayurvedic'),
(7, 'Business_1614407850.png', 'Bakery and Cake'),
(8, 'Business_1611579264.png', 'Bathroom Accessories'),
(9, 'Business_1619854496.jpg', 'Beauty parlor and salon'),
(10, 'Business_1620030521.jpg', 'Bicycle'),
(11, 'Business_1619854158.jpg', 'Building Chemical'),
(12, 'Business_1619852077.jpg', 'Building Traders'),
(13, 'Business_1619850355.jpg', 'Ceramic'),
(14, 'Business_1619854182.jpg', 'Chartered Accountant'),
(15, 'Business_1619854206.jpg', 'Chemical'),
(16, 'Business_1619852336.jpg', 'Clothes'),
(17, 'Business_1619854260.jpg', 'Cold Storage'),
(18, 'Business_1619854280.jpg', 'Computer Hardware'),
(19, 'Business_1587472451.jpg', 'Consultant'),
(20, 'Business_1619851320.jpg', 'Cosmetic'),
(21, 'Business_1619854608.jpg', 'Cosmetics'),
(22, 'Business_1619854080.png', 'Courier Services'),
(23, 'Business_1591277004.png', 'Dairy &amp; Sweets'),
(24, 'Business_1588859985.jpg', 'Diamond'),
(25, 'Business_1619854794.jpg', 'Dry Cleaners'),
(26, 'Business_1619847876.jpg', 'Education'),
(27, 'Business_1619854517.jpg', 'Electrical'),
(28, 'Business_1606912219.jpg', 'Elevator'),
(29, 'Business_1619850756.jpg', 'Events'),
(30, 'Business_1619854536.jpg', 'Finance'),
(31, 'Business_1604932141.jpg', 'Fire Safety'),
(32, 'Business_1619854426.jfif>', 'Flower'),
(33, 'Business_1619850579.jpg', 'FMCG'),
(34, 'Business_1613213066.png', 'Footwear'),
(35, 'Business_1587472541.jpg', 'Fruits and vegetables'),
(36, 'Business_1619852497.jpg', 'Furniture'),
(37, 'Business_1615458334.jpg', 'Gift and Articles'),
(38, 'Business_1619853915.jpg', 'Glass &amp; Hardware'),
(39, 'Business_1619854682.jpg', 'Graphic Designing'),
(40, 'Business_1617625163.png', 'Grocery'),
(41, 'Business_1587445830.jpg', 'GYM &amp; Yoga'),
(42, 'Business_1613468149.jpg', 'Handloom'),
(43, 'Business_1619854303.jpg', 'Home Appliances'),
(44, 'Business_1619854709.jpg', 'Home Automation'),
(45, 'Business_1620026097.jpg', 'Hospital and Clinic'),
(46, 'Business_1619853076.jpg', 'Hotel'),
(47, 'Business_1587446098.jpg', 'Immigration &amp; Visa consultants'),
(48, 'Business_1619855368.jpg', 'Import Export'),
(49, 'Business_1620714983.jpg', 'Industrial Equipment'),
(50, 'Business_1619854763.jpg', 'Information Technology'),
(51, 'Business_1619853674.jpg', 'Insurance'),
(52, 'Business_1619854409.jpg', 'Interior'),
(53, 'Business_1619589024.png', 'Investment'),
(54, 'Business_1619848724.jpg', 'Jewllery'),
(55, 'Business_1613133524.png', 'Laboratory'),
(56, 'Business_1607412721.jpg', 'Laser Technology'),
(57, 'Business_1619855398.jpg', 'Marketing &amp; Advertising'),
(58, 'Business_1617877666.png', 'Mechanical'),
(59, 'Business_1617959448.jpg', 'Medical Equipment'),
(60, 'Business_1619853166.jpg', 'Mobile Store'),
(61, 'Business_1587472575.jpg', 'Musician'),
(62, 'Business_1587356374.jpg', 'Packaging'),
(63, 'Business_1619848925.jpg', 'Paints'),
(64, 'Business_1619854832.jpg', 'Pest Control'),
(65, 'Business_1619854360.jpg', 'Petrol Pump'),
(66, 'Business_1619849160.jpg', 'Pharmaceutical'),
(67, 'Business_1619855426.jpg', 'Photography'),
(68, 'Business_1619854859.jpg', 'Placement Services'),
(69, 'Business_1587472401.jpg', 'Plastic'),
(70, 'Business_1609393966.jpg', 'Politics'),
(71, 'Business_1604500053.jpg', 'Pooja Ghar'),
(72, 'Business_1587356490.jpg', 'Printing'),
(73, 'Business_1619849288.jpg', 'PVC Pipes'),
(74, 'Business_1619848479.jpg', 'R.O. Water'),
(75, 'Business_1619847661.jpg', 'Real Estate'),
(76, 'Business_1587445719.jpg', 'Restaurant, Catering and Fast Food'),
(77, 'Business_1619855579.jpg', 'Security Agency'),
(78, 'Business_1619849508.jpg', 'Security Surveillance'),
(79, 'Business_1619849662.jpg', 'Social Activist'),
(80, 'Business_1619849846.jpg', 'Solar'),
(81, 'Business_1619855513.png', 'Spectacles'),
(82, 'Business_1587356516.jpg', 'Sports Academy'),
(83, 'Business_1587356981.jpg', 'Stationary'),
(84, 'Business_1619851827.jpg', 'Steel and Aluminium'),
(85, 'Business_1618577031.png', 'Submersible Pump'),
(86, 'Business_1619854389.jfif>', 'Tailor'),
(87, 'Business_1619850053.jpg', 'Textile'),
(88, 'Business_1619853586.jpg', 'Tour and Travels'),
(89, 'Business_1605942062.jpg', 'Toys'),
(90, 'Business_1617080976.png', 'Veterinary'),
(91, 'Business_1619847790.jpg', 'Wood');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `cat_name` varchar(100) DEFAULT NULL,
  `active` tinyint(1) DEFAULT 1,
  `order_no` tinyint(4) DEFAULT NULL,
  `img` text DEFAULT NULL,
  `cat_type` tinyint(1) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp(),
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `cat_name`, `active`, `order_no`, `img`, `cat_type`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Astrologer', 1, 1, 'Astrologer.jpg', 1, '2021-05-20 12:05:02', '2021-05-20 13:33:22', NULL),
(2, 'Bags', 1, 2, 'Bags.jpg', 1, '2021-05-20 12:05:02', NULL, NULL),
(3, 'bakery and cake', 1, 3, 'bakery and cake.jpg', 1, '2021-05-20 12:05:02', NULL, NULL),
(4, 'Beauty Salon', 1, 4, 'Beauty Salon.jpg', 1, '2021-05-20 12:05:02', NULL, NULL),
(5, 'Ceramic', 1, 5, 'Ceramic.jpg', 1, '2021-05-20 12:05:02', NULL, NULL),
(6, 'Clinic', 1, 6, 'Clinic.jpg', 1, '2021-05-20 12:05:02', NULL, NULL),
(7, 'Clothes', 1, 7, 'Clothes.jpg', 1, '2021-05-20 12:05:02', NULL, NULL),
(8, 'computer & hardware', 1, 8, 'computer & hardware.jpg', 1, '2021-05-20 12:05:02', NULL, NULL),
(9, 'cosmetics', 1, 9, 'cosmetics.jpg', 1, '2021-05-20 12:05:02', NULL, NULL),
(10, 'Dairy & Sweets', 1, 10, 'Dairy & Sweets.jpg', 1, '2021-05-20 12:05:02', NULL, NULL),
(11, 'Education', 1, 11, 'Education.jpg', 1, '2021-05-20 12:05:02', NULL, NULL),
(12, 'event planners', 1, 12, 'event planners.jpg', 1, '2021-05-20 12:05:02', NULL, NULL),
(13, 'Eye Care', 1, 13, 'Eye Care.jpg', 1, '2021-05-20 12:05:02', NULL, NULL),
(14, 'Fast Food', 1, 14, 'Fast Food.jpg', 1, '2021-05-20 12:05:02', NULL, NULL),
(15, 'Financial Services', 1, 15, 'Financial Services.jpg', 1, '2021-05-20 12:05:02', NULL, NULL),
(16, 'Footwear', 1, 16, 'Footwear.jpg', 1, '2021-05-20 12:05:02', NULL, NULL),
(17, 'fragrance', 1, 17, 'fragrance.jpg', 1, '2021-05-20 12:05:02', NULL, NULL),
(18, 'Fruits & Vegetables', 1, 18, 'Fruits & Vegetables.jpg', 1, '2021-05-20 12:05:02', NULL, NULL),
(19, 'Furniture', 1, 19, 'Furniture.jpg', 1, '2021-05-20 12:05:02', NULL, NULL),
(20, 'Gym & Yoga', 1, 20, 'Gym & Yoga.jpg', 1, '2021-05-20 12:05:02', NULL, NULL),
(21, 'Hardware', 1, 21, 'Hardware.jpg', 1, '2021-05-20 12:05:02', NULL, NULL),
(22, 'Home Appliances', 1, 22, 'Home Appliances.jpg', 1, '2021-05-20 12:05:02', NULL, NULL),
(23, 'Hotels', 1, 23, 'Hotels.jpg', 1, '2021-05-20 12:05:02', NULL, NULL),
(24, 'Insurance', 1, 24, 'Insurance.jpg', 1, '2021-05-20 12:05:02', NULL, NULL),
(25, 'Interior Design', 1, 25, 'Interior Design.jpg', 1, '2021-05-20 12:05:02', NULL, NULL),
(26, 'jewellery', 1, 26, 'jewellery.jpg', 1, '2021-05-20 12:05:02', NULL, NULL),
(27, 'kitchen accessories', 1, 27, 'kitchen accessories.jpg', 1, '2021-05-20 12:05:02', NULL, NULL),
(28, 'list.txt', 1, 28, 'list.txt', 1, '2021-05-20 12:05:02', NULL, NULL),
(29, 'Mobile Store', 1, 29, 'Mobile Store.jpg', 1, '2021-05-20 12:05:02', NULL, NULL),
(30, 'Photography', 1, 30, 'Photography.jpg', 1, '2021-05-20 12:05:02', NULL, NULL),
(31, 'Real Estate', 1, 31, 'Real Estate.jpg', 1, '2021-05-20 12:05:02', NULL, NULL),
(32, 'RO Water', 1, 32, 'RO Water.jpg', 1, '2021-05-20 12:05:02', NULL, NULL),
(33, 'Spare-Parts', 1, 33, 'Spare-Parts.jpg', 1, '2021-05-20 12:05:02', NULL, NULL),
(34, 'stationery', 1, 34, 'stationery.jpg', 1, '2021-05-20 12:05:02', NULL, NULL),
(35, 'Textile Industry', 1, 35, 'Textile Industry.jpg', 1, '2021-05-20 12:05:02', NULL, NULL),
(36, 'Tours & Travels', 1, 36, 'Tours & Travels.jpg', 1, '2021-05-20 12:05:02', NULL, NULL),
(37, 'Toys Store', 1, 37, 'Toys Store.jpg', 1, '2021-05-20 12:05:02', NULL, NULL),
(38, 'Wishes', 1, 1, NULL, NULL, '2021-05-20 12:38:34', '2021-05-20 12:38:34', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `images`
--

CREATE TABLE `images` (
  `image_id` int(11) NOT NULL,
  `sub_cat_id` int(11) DEFAULT NULL,
  `image` text DEFAULT NULL,
  `image_type` tinyint(4) DEFAULT NULL,
  `post_type` tinyint(4) DEFAULT 0,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp(),
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `images`
--

INSERT INTO `images` (`image_id`, `sub_cat_id`, `image`, `image_type`, `post_type`, `created_at`, `updated_at`, `deleted_at`) VALUES
(4, 2, '1621516498.jpeg', 1, 1, '2021-05-20 13:14:58', '2021-05-20 13:14:58', NULL),
(5, 2, '1621517205.jpg', 1, 1, '2021-05-20 13:26:45', '2021-05-20 13:26:45', NULL),
(6, 2, '1621517212.jpg', 1, 1, '2021-05-20 13:26:52', '2021-05-20 13:26:52', NULL),
(7, 2, '1621517221.jpg', 1, 1, '2021-05-20 13:27:01', '2021-05-20 13:27:01', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `notification_message`
--

CREATE TABLE `notification_message` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `t_title` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `t_message` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `customer_id` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `offers_slider`
--

CREATE TABLE `offers_slider` (
  `id` int(11) NOT NULL,
  `image` text DEFAULT NULL,
  `category_id` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `pages`
--

CREATE TABLE `pages` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `page_title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `page_description` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pages`
--

INSERT INTO `pages` (`id`, `page_title`, `page_description`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Terms & Conditions', '<div class=\"row\" style=\"margin: 0px; font-family: JioLight; font-size: 14px;\"><div class=\"col-sm-12\" style=\"width: 990px;\"><h3 style=\"margin-top: 0px; margin-bottom: 0.5rem; font-weight: 500; font-size: 18px; font-family: JioMedium; letter-spacing: 0.25px; padding: 4px 0px;\"><br></h3></div></div><div class=\"row\" style=\"margin: 0px; font-family: JioLight; font-size: 14px;\"><div class=\"col-sm-12 padding-static\" style=\"width: 990px;\"><br><p style=\"margin-bottom: 12px !important;\"><h1>This document is an electronic record in terms of The Information Technology Act, 2000 ( \"IT Act\") and rules thereunder, and is published in accordance with the provisions of Rule 3 (1) under IT Act which mandates for publishing of rules and regulations, privacy policy and terms of use for access or usage of the Website and application. This electronic record is generated by a computer system and does not require any physical or digital signatures.</h1><br>JioMart (\"Website and application\") is an online selling channel of Reliance Retail, having its office at 3rd Floor, Court House, Lokmanya Tilak Marg, Dhobi Talao, Mumbai – 400002<br><br>Your use / access of the Website and application, its related sites and hyperlinks, shall be governed by the terms and conditions, policies, rules of Reliance (\"Terms\") posted on the Website and application from time to time. These Terms applies to all users (whether Registered user or Guest User) of the Website and application.<br><br>Please read the Terms and conditions very carefully before using the Website and application as your use of the Website and application is subject to your acceptance of and compliance with the Terms. If you do not agree or are not willing to be bound by the terms and conditions of this User Agreement and any Rules and Policies of Reliance, please do not click on the \" I Accept\" button/check box and on the \"Continue\" button or \"Pay Now\" button and do not subscribe or seek to obtain access to or otherwise use the Website and application.<br><br>By subscribing to or using the website and application or any of our services through the Website and application you agree that you have read, understood and are bound by the Terms, Policies, directions of Reliance regardless of how you subscribe to or use the Website and application. This Agreement comes into effect upon your \"Acceptance\" of these terms and conditions (\"Terms\") however Reliance at its sole discretion reserves its right not to accept a user from registering on the Website and application without assigning any reason thereof.<br><br></p><span style=\"font-weight: bolder;\">DEFINITION</span><br><br><p style=\"margin-bottom: 12px !important;\">\"Agreement\" means the terms and conditions as detailed herein including all schedules, appendices, annexures, Privacy Policy, Disclaimer and will include the references to this Agreement as amended, novated, supplemented, varied or replaced from time to time.<br><br>\"You\"/ \"User\" shall mean the end user accessing the Website and application, its contents and using the services offered through the Website and application.<br><br>\"Reliance\"/ \"we\"/ \"us\"/ \"our\" shall mean Reliance Retail Limited or its affiliates, franchisees, service providers, successors and assigns \"Site\" means the online shopping platform owned and operated by Reliance Retail Ltd. (\"JioMart\"), which provides a venue to the users of JioMart to buy the Products listed on Site.<br><br>\"Customer\"/\"Buyer\" shall mean the person or any legal entity who access the Website and application and places an order for and or purchases any products /services against the invitation of offer for sale of products / services on the Website and application.<br><br>\"Acceptance\" shall mean your affirmative action in clicking on \"check box\"™ and on the \"continue button as provided on the registration page or clicking on<br><br>\"˜Pay Now\" button while transacting as User or such other actions that implies your acceptance.<br><br>\"Product\" shall mean the Products offered for sale on the website and application from time to time<br><br>\"Delivery\" shall mean the physical delivery of goods under your order placed with us<br><br>\"Price\" means the price communicated at the time of order and confirmed by us<br><br>\"Payment Facility\" shall mean applicable mode of payments made available to User from time to time.<br><br>\"Content\" means all text, graphics, user interfaces, visual interfaces, photographs, trademarks, logos, sounds, music, artwork and computer code collectively By impliedly or expressly accepting this User Agreement, Policies and Terms, You also accept and agree to be bound by Rules, Policies and Terms of Reliance as provided from time to time in its Website and application and corresponding hyperlinks.</p><span style=\"font-weight: bolder;\">PURCHASE</span><br><br><p style=\"margin-bottom: 12px !important;\"><span style=\"font-weight: bolder;\">1) Registration and Submission of personal details:</span><br><br>You can use the services offered by the Website and application as a \"Registered User\". As part of the registration process on the Site, Reliance may collect certain personally identifiable information about you including first and last name, email address, mobile phone number and contact details, Postal code, Demographic profile (like your age, gender, occupation, education, address etc.) and information about the pages on the site you visit/access, the links you click on the site, the number of times you access the page and any such browsing information.<br><br>As a Registered User, you are responsible for maintaining the confidentiality of your user id and password. You are also responsible for maintaining the confidentiality of your email id and mobile number and for any unauthorised access to your mobile , tab, computer, computer system and computer network, and you are responsible for all activities that occur under your user id and password, email id and mobile number as the case may be. You agree to maintain and promptly update all data provided by you and to keep it true, accurate, current and complete. If you provide any information that is untrue, inaccurate, not current or incomplete or we have reasonable grounds to suspect that such information is untrue, inaccurate, not current or incomplete, or not in accordance with the Terms, we have the right to indefinitely suspend or terminate or block access of your user account with the Website and application and refuse to provide you with access to the Website and application.<br><br>We will collect personally identifiable information about you only as part of a voluntary registration process, on-line survey, or contest or any combination thereof.<br><br><span style=\"font-weight: bolder;\">2) User\'s Liability:</span><br><br>The User hereby affirms that the information provided by him / her is true, correct and complete to the best of his / her knowledge and belief. The User agrees and understands that he / she will be solely responsible in the event of any inaccuracy or deviation therefrom at a later stage.<br><br>You agree to comply with all applicable laws in connection with your use of the Website and application, and such further limitations as may be set forth in any written or on-screen notice from us.<br><br>To register with &amp; shop with JioMart you must be eighteen years of age or over. Our website and application is not directed to children under the age of 18. If we become aware that a child and/ or customer is under the age of 18 and has registered or using our Website and application, we are entitled to remove his or her account from our system and cancel any order placed by him or her.<br><br>You agree and undertake not to reverse engineer, modify, copy, distribute, transmit, display, perform, reproduce, publish, license, create derivative works from, transfer, or sell any information or software obtained from the Website and application. Reproduction, copying of the content for commercial or non-commercial purposes and unwarranted modification of data and information within the content of the Website and application is not permitted<br><br>You agree and undertake not to display, upload, modify, publish, transmit, update or share any information that:<br><br>i. belongs to another person and to which you do not have any legal right<br><br>ii. is grossly harmful, harassing, blasphemous, defamatory, obscene, pornographic, invasive of another\'s privacy, hateful, or racially, ethnically objectionable, disparaging, relating or encouraging money laundering or gambling, or otherwise unlawful in any manner what so ever;<br><br>iii. harm minors in any way;<br><br>iv. infringes any patent, trademark, copyright or other proprietary rights or third party\'s trade secrets or rights of publicity or privacy;<br><br>v. violates any law for the time being in force;<br><br>vi. impersonate another person<br><br>vii. contains software viruses or any other computer code, files or programs designed to interrupt, destroy or limit the functionality of any computer resource; or contains any Trojan horses, worms, time bombs, cancelbots, easter eggs or other computer programming routines that may damage, detrimentally interfere with, diminish value of, surreptitiously intercept or expropriate any system, data or personal information.<br><br>You, as a Buyer, understand that upon initiating a transaction you are entering into a legally binding and enforceable contract with Reliance to purchase the products and /or services from Reliance, and pay the transaction price to Reliance using appropriate Payment Facility. You, as a Buyer, understand that the all payment facility may not be available in full or in part for certain category of products and for certain locations and hence you may not be entitled to use that Payment Facility in respect of the transactions for those products or locations.<br><br><span style=\"font-weight: bolder;\">3) Availability of Website and application and its services:</span><br><br>This Website and application is controlled and operated by Reliance from India and Reliance makes no representation that the materials are appropriate or will be available for use in other locations. If you use this web site from outside the India, you are entirely responsible for compliance with all applicable local laws.<br><br>Reliance has several website and applications offering products, services, content and various other functionalities (collectively the \"Services\") to specific regions worldwide. The Services offered in one region may differ from those in other regions due to availability, local or regional laws, shipment and other considerations. Reliance does not make any warranty or representation that a user in one region may obtain the Services from the Reliance site in another region and Reliance may cancel a user\'s order or redirect a user to the site for that user\'s region if a user attempts to order Services offered on a site in another region.<br><br>Information that Reliance publishes on the World Wide Web may contain references or cross references to Reliance products, programs and services that are not announced or available in your country. Such references do not imply that Reliance intends to announce such products, programs or services in your country. Consult your local Reliance business contact for information regarding the products, programs and services that may be available to you.<br><br><span style=\"font-weight: bolder;\">4) Access to Website:</span><br><br>We will do our utmost to ensure that availability of the website and application will be uninterrupted and that transmissions will be error-free. However, due to the nature of the Internet, this cannot be guaranteed. Also, your access to the website and application may also be occasionally suspended or restricted to allow for repairs, maintenance, or the introduction of new facilities or services at any time without prior notice. We will attempt to limit the frequency and duration of any such suspension or restriction.<br><br><span style=\"font-weight: bolder;\">5) Permission to access website and application:</span><br><br>Reliance grants you a limited, revocable permission to access and make personal use of this Website and application, but not to download or modify it, its Contents or any portion of it, except with express written consent of Reliance. This permission does not include any resale or commercial use of this website and application or its contents; any collection and use of any product listings, descriptions, or prices; any derivative use of this website and application or its contents; any downloading or copying of account information for the benefit of another seller; or any use of data mining, robots, or similar data gathering and extraction tools<br><br>The use of the Website and application and its Content grants no rights to you in relation to any copyright, designs, trademarks and all other intellectual property and material rights relating to the Content. Including the content but not limited to the design, structure, selection, coordination, expression, \"look and feel\" and arrangement of such Content, contained on the Website and application are original to Reliance and are owned and controlled or licensed by us, and are protected by trade dress, copyright, patent and trademark laws, and various other intellectual property rights.<br><br>Except as expressly provided in Terms of Use, no part of the Website and application and no Content may be copied, reproduced, republished, uploaded, posted, publicly displayed, encoded, translated, transmitted or distributed in any way (including \"mirroring\") to any other computer, server, website and application or other medium for publication or distribution or for any commercial enterprise, without our express prior written consent.<br><br><span style=\"font-weight: bolder;\">6) Applicability of Terms:</span><br><br>You will be subject to the policies, conditions and Terms of use in force at the time that you use the website and application or that you order goods from us, unless any change to those policies or these conditions is required to be made by law or government authority (in which case it will apply to orders previously placed by you).<br><br><span style=\"font-weight: bolder;\">7) Communications:</span><br><br>When you place an order on our Website and application or send e-mails to us, you are communicating with us electronically so you must provide a valid mobile phone number / email address and your address while placing an order with us. We may communicate with you by e-mail, SMS, phone call or by posting notices on the Website and application or by any other mode of communication. For contractual purposes, you consent to receive communications including SMS, e-mails or phone calls from us with respect to your order.<br><br>Your Obligations:<br><br>You shall<br><br>i. not acquire any ownership rights by downloading material /Contents from this website and application.<br><br>ii. read the Terms and policies of website and application and agree to accept the Terms before use of Website and application<br><br>iii. abide by the Terms and Policies of Website and application<br><br>iv. Neither copy or modify the Contents of the website and application nor use the Website and application for commercial purpose<br><br>v. purchase the product(s) from this Website and application for your internal / personal purpose and not for resale by you or any other person.<br><br>vi. comply with all applicable laws in connection with your use of the Website and application, and such further limitations as may be set forth in any written or on-screen notice from us.<br><br>vii. not refuse to accept the delivery of the Products under your order upon delivery except for damages and deficiencies<br><br>viii. authorize us to declare and provide declaration to any governmental authority on your behalf stating the aforesaid purpose of the products ordered by you on the website and application.<br><br><span style=\"font-weight: bolder;\">8) Products/Services:</span><br><br>All products/services and information displayed on Website and application constitute an \"invitation to offer\". Your order for purchase constitutes your \"offer\". All orders placed by you on the Website and application are subject to availability and acceptance by us and conditional on your acceptance and adherence to these terms and conditions.<br><br><span style=\"font-weight: bolder;\">9) Our Contract:</span><br><br>Your order is an offer to us to buy the product(s) in your order. We will confirm our acceptance of your offer either through an e-mail / SMS or through shipment of the items you requested. Upon placing an order, you will receive an e-mail confirming receipt of your order with details (the \"Order Confirmation E-mail\"). The Order Confirmation E-mail is an acknowledgement that we have received your order, and does not confirm acceptance of your offer to buy the product(s) ordered. Our acceptance to your offer takes place and the contract of sale for a product ordered by you concludes only upon actual dispatch of products to you and an e-mail confirmation in that regard is sent to you (the \"Dispatch E-mail\"). We, at our sole discretion, reserve our right to limit the quantity of items and cancel any order, even after acceptance.<br><br>Reliance has complete right to accept or reject an order placed online. No act or omission of Reliance prior to actual dispatch of the product(s) ordered will constitute an acceptance of your offer. You agree not to dispute the decision of Reliance in this regard.<br><br><span style=\"font-weight: bolder;\">10) Delivery/Shipment of Product:</span><br><br>Delivery of the Products under your Order in the Website and application shall be made as per our Delivery/shipment policy mentioned herein. Title of the Product shall pass on to you upon receipt of payment.<br><br><span style=\"font-weight: bolder;\">11) Exactness / Accuracy of product:</span><br><br>We have made significant efforts to accurately display the colours / dimension / specification of products that appear on the Website and application. However, we do not warrant/guarantee that product description or other content of this Website and application is accurate, complete, reliable, current, or error-free. The particular technical specifications and settings of your computer and its display could affect the accuracy of its display of the colours, dimension, specifications of products offered on this Website and application.<br><br>Copyright: All Content included on the website and application, such as text, graphics, logos, button icons, images, audio clips, digital downloads, data compilations, and software, is the property of Reliance, its affiliates or its content suppliers and is protected by the Intellectual Property Laws of India.<br><br>Trademarks: The trademark Reliance, its logo and all products and logos denoted with TM are trademarks owned or registered trademarks of Reliance or its affiliates.<br><br>Intellectual Property Claims: Reliance and its affiliates or its content suppliers respect the intellectual property of others. If you believe that your intellectual property rights have been used in a way that gives rise to concerns of infringement, please write to us with your concerns.<br><br><span style=\"font-weight: bolder;\">12) Disclaimer:</span><br><br>You acknowledge and undertake that you are accessing the services on the Website and application and transacting at your own risk and are using your best and prudent judgment before placing any order or availing the services or entering into any transactions with us through our Website and application. We shall not be held liable nor responsible for any representations or warranties/guarantees of the products save and except the limited manufacturer\'s warranty/guarantee on the respective Product is assigned unto us and we hereby expressly disclaim and any all responsibility and liability in that regard.<br><br><span style=\"font-weight: bolder;\">13) Severability:</span><br><br>If any of these Terms is deemed invalid, void or unenforceable in whole or in part for any reasons, such invalidity or unenforceability condition or part thereof will be deemed severable and will not affect the validity and enforceability of any remaining condition or part of such condition / Terms<br><br><span style=\"font-weight: bolder;\">14) Amendments:</span><br><br>Reliance reserves its right to amend the Website and application, Policies, Conditions or Terms of use and at any time without prior notice. All such updates and amendments shall be posted on the Website and application and will be effective from the time of its posting on the Website and application. You are advised to regularly check for any amendments or updates to the terms and conditions contained in this User Agreement, Terms and Policies.<br><br><span style=\"font-weight: bolder;\">15) Indemnification:</span><br><br>You agree to indemnify, defend and hold harmless us and affiliates including employees, directors, officers, agents and their successors and assigns from and against any and all losses, liabilities, claims, damages, costs and expenses (including legal fees and disbursements in connection therewith and interest chargeable thereon) asserted against or incurred by us arising out of your actions or inactions or result from your breach of the Terms and Conditions herein or any document incorporated by reference/hyperlink or infringement of intellectual property rights or your violation of any law, rules or regulations or the rights of any third party.<br><br>You hereby expressly release Reliance and/or its affiliates and/or any of its officers and representatives from any cost, damage, liability or other consequence of any of the actions/inactions of the Manufacturers/Brand owners of the Products purchased through the website and application and specifically waiver any claims or demands that you may have in this behalf under any statute, contract or otherwise.<br><br>This clause shall survive the expiry or termination of this Agreement.<br><br><span style=\"font-weight: bolder;\">16) Limitation on Liability:</span><br><br>In no event shall we or our affiliates be liable for any special, indirect, incidental, consequential or exemplary damages including but not limited to, damages for loss of profits, goodwill, use, data or other intangible losses arising out of or in connection with the Website and application, its services or this User Agreement whatsoever, whether in an action of contract, negligence or other tortious action.<br><br>Without prejudice to the generality of this section the total liability of Reliance to you for all liabilities arising out of this User Agreement be it in tort or contract is limited to the value of the product ordered by you. However in case of missing a delivery in transit, Our liability is limited only to delivery at a later agreed time at no additional charge.</p><span style=\"font-weight: bolder;\">PRICE &amp; PAYMENT POLICY</span><br><br><p style=\"margin-bottom: 12px !important;\"><span style=\"font-weight: bolder;\">1) Price Policy:</span><br><br>Prices and taxes thereon in respect of all products are subject to change from time to time, without prior notice by Reliance. We strive to provide you with the best prices possible on our Website and application. All the products listed on the Website and application will be sold at Indian Rupees either at Maximum Retail Price ( MRP) (inclusive of all taxes) or at an Offer/discounted price with taxes, unless otherwise specified. The prices mentioned at the time of ordering will be the prices charged to you on the date of delivery. Although prices of most of the products do not fluctuate on a daily basis but some of the commodities and fresh food products prices do change on a daily basis. In case of products such as Fresh Food, Vegetables and Fruits etc. the delivered weight may have variance and product will be billed accordingly on the actual weight.<br><br>There may be cases where M.R.P. of the product delivered is different from the M.R.P. quoted / reflected on the Website and application due to various reasons including time lag in updating prices post changes in M.R.P. or product belonging to a different batch or different M.R.P.s being used by manufacturers in different regions.<br><br>Despite our best efforts, there may be an instance of mispricing of items in our catalogue/offer on Website and application. However, we verify prices as part of our dispatch procedures. If a product\'s correct price is lower than our stated price, we charge the lower amount and send you the item. If a product\'s correct price is higher than our stated price, you may return at the time of delivery or we may not supply the product unless the problem get resolved and if you do not want to purchase the Product in such higher price we shall cancel your order and refund you the amount paid by you for such cancelled transaction as per existing refund policy.<br><br>Our online price may not match with offline price at store. You shall not raise any dispute on the same.<br><br><span style=\"font-weight: bolder;\">2) Payment Policy:</span><br><br>Reliance offers you multiple payment options both online and offline however Reliance reserves its right to add or delete any mode of payment without any prior notice.<br><br><span style=\"font-weight: bolder;\">A. Offline Payment Mode:</span><br><br>Cash on Delivery (CoD) - Buyer needs to make payment in cash to the delivery person at the time of receipt of delivery of the Products at its delivery location<br><br>Food Coupons on Delivery - Food Coupons shall be accepted at the sole discretion of Reliance against value of Ready to Eat / certain category of food items on the invoice at the time of Delivery of Products at the delivery location. Items permissible for purchase through food coupons shall change without prior notice and you shall have the option to cancel the item/order or shall pay in cash or card.<br><br>For CoD Payment option, maximum order value is Rs 20,000/- However Reliance can change this limit without further notice.<br><br>Card on Delivery: A mobile EDC machine may be made available at your door step to facilitate payment by Credit / Debit Card . However due to prevailing network condition in your area or any technical glitch in the equipment or due to any other reason if the EDC terminal is not able to collect the payment, you shall make payment by cash.<br><br>In cases where payment is attempted but remains unsuccessful and a successful charge slip does not get generated, you shall make the payment in cash for that particular order. In certain cases though you may receive a payment confirmation sms from your bank, the amount generally gets reversed in the same account. You may raise the incident with customer care number on the back of card to reverse the amount in case of unreasonable delay, Reliance will not be responsible for such failed attempts due to any network or technical reasons. We on our part, upon request of customer, after due verification with our back end team may give a written confirmation of the non-receipt of payment for you to appropriately take up with card issuing bank.<br><br><span style=\"font-weight: bolder;\">B. Online Payment Mode:</span><br><br>i. Credit Cards<br><br>ii. Debit Card<br><br>iii. Net Banking<br><br>iv. Wallet Payment<br><br><span style=\"font-weight: bolder;\">Acceptance:</span><br><br>We accept payments made by most of the major credit/debit cards issued in India. Acceptance of card payment is at the sole discretion of Reliance and you may be asked to submit copy of photo identity proof too. However Reliance reserves its right to deny acceptance of card payment without any prior notice. We don\'t accept internationally issued credit/debit cards and certain cards issued by banks in India too.<br><br><span style=\"font-weight: bolder;\">Order:</span><br><br>You can place your order with us either on our Website and application or over phone and choose any of our payment modes made available to you. In case of payment to be made offline, Buyer needs to pay the invoice amount in cash / coupon / card at the time of delivery of the Product at its doorstep/preferred location.<br><br>Orders will be processed for shipment/delivery upon selection of your preferred delivery location, date and time and confirmation by us. Reliance may change maximum order value of COD and items/locations available for COD without prior intimation.<br><br><span style=\"font-weight: bolder;\">Payment:</span><br><br>While availing any of the payment method/s available on the Website and application, we will not be responsible or assume any liability, whatsoever in respect of any loss or damage arising directly or indirectly to you due to:<br><br>i. Lack of authorization for any transaction/s, or<br><br>ii. Exceeding the present limit mutually agreed by you and your issuing bank, or<br><br>iii. Any payment issues arising out of the transaction, or<br><br>iv. Decline of transaction for any other reason/s<br><br>Reliance reserves its right to change the price of any product in the Website and application any time without any notice. Prices stated at the time of an order is placed shall apply in respect to that order.<br><br>All payments made against the purchases of products on Website and application by you shall be in Indian Rupees only. Website and application will not facilitate transaction with respect to any other form of currency with respect to the purchases made on Website and application.<br><br>You represent and confirm that the credit/debit card that is being used is yours or that you have been specifically authorized by the owner of the credit/debit card to use it. You further agree and undertake to provide the correct and valid credit card details to carry out a transaction on the Website and application. All credit/debit card holders are subject to validation checks and authorization by the card issuer. If the issuer of your payment card refuses to authorize payment to us, we will not be liable for any delay or non-delivery.<br><br>In case of payment made through online, before shipping / delivering your order to you, we may request you to provide copy of photo identity proof document as acceptable to Reliance to establish your ownership of the payment instrument used by you for your purchase. This is done in the interest of providing a safe online shopping environment to our users.<br><br>Reliance reserves the right to impose limits on the number of transactions which Reliance may receive from an individual valid credit/debit/ valid bank account and reserves the right to refuse to process transactions exceeding such limit.<br><br>Reliance reserves its right to refuse to process transactions by buyers with a prior history of questionable charges including without limitation breach of any agreements by buyer with Reliance or breach/violation of any law or any charges imposed by bank or breach of any policy. Reliance may do such checks as it deems fit before approving the buyer\'s order ) for security or other reasons at the discretion of Reliance. As a result of such check if Reliance is not satisfied with the creditability of the Buyer or genuineness of the transaction, it will have the right to reject such order. Reliance may delay dispatch or cancel any transaction at its sole discretion, if Reliance is suspicious of any Buyer\'s authenticity or activity or if the Buyer is conducting high transaction volumes, to ensure safety of the transaction.<br><br>In cases where the payment of an online order does not get succesfully communicated to our system due to any network or technical issue between intermediary, bank or payment gateway, the order shall not be processed and a refund will be initiated for the same. However in an unsuccessful attempt if the customer’s account gets debited, such amounts generally gets auto reversed in the same account. However Reliance shall not be held responsible for such amounts debited in unsuccessful attempts and customer can raise reversal request with their bank should there be any unreasonable delay in refund.<br><br>Buyer acknowledges that Reliance will not be liable for any damages, interests, claims etc. resulting from not processing a transaction or any delay in processing a transaction which is beyond control of Reliance.<br><br><span style=\"font-weight: bolder;\">For Credit Card:</span><br><br>Note:<br>Credit cards not enabled for online/ecommerce transaction will not be processed for payment. Please check with your credit card issuing Bank or authority on the status or to activate online transaction capabilities for your credit card.<br><br><span style=\"font-weight: bolder;\">For Debit Card:</span><br><br>Note:<br>Debit cards not enabled for online/ecommerce transaction will not be processed for payment. Please check with your debit card issuing Bank or authority on the status or to activate of online transaction capabilities for your debit card.</p><br><br><span style=\"font-weight: bolder;\">RETURN, EXCHANGE &amp; REFUND</span><br><br><p style=\"margin-bottom: 12px !important;\"><span style=\"font-weight: bolder;\">1) Return &amp; Refund Policy:</span><br><br>We endeavour to provide the best quality products every single time you order with us.<br><br>We have a \"no questions asked return and refund policy\" which entitles all our customers to return the product at the time of delivery if they are not satisfied with the quality, freshness or physical condition of the product. At the time of delivery, we will take the returned product back with us and if already paid the corresponding value would be refunded to you through the same mode of payment used at the time of purchase viz., credit card, debit card, net banking. Alternatively, at your option, the said amount can be credited to your store credit account which can be used for your subsequent purchases.<br><br>After the delivery, the amount shall be refunded to you through the same mode of payment or via credit to your store credit account which can be used for subsequent purchases.<br><br>Products once sold and delivered to you, shall be eligible for return only if the product condition is found to be damaged, broken, faulty or different from the ordered one. You can return the product(s), purchased from us under your order as per below, provided the product(s) packs are sealed/unopened/unused and in original condition.</p></div></div>', '2020-08-21 06:40:37', '2021-01-30 13:35:12', NULL),
(2, 'Privacy Policy', '<ul><li><span style=\"background-color: rgb(255, 255, 0);\">Privacy Policy</span></li></ul>', '2020-11-07 10:51:30', '2021-01-30 13:30:17', NULL),
(3, 'Terms & Conditions', '<p><b>kalpesh</b></p>', '2020-12-18 06:56:50', '2020-12-18 06:56:56', '2020-12-18 06:56:56'),
(4, 'Terms & Conditions', '<p><span style=\"color: rgb(103, 106, 108);\">e for access or usage of the Website and application. This electronic record is generated by a computer system and does not require any physical or digital signatures.&lt;br&gt;&lt;br&gt;JioMart (\"Website and application\") is an online selling channel of Reliance Retail, having its office at 3rd Floor, Court House, Lokmanya Tilak Marg, Dhobi Talao, Mumbai – 400002&lt;br&gt;&lt;br&gt;Your use / access of the Website and application, its related sites and hyperlinks, shall be governed by the terms and conditions, policies, rules of <b>Reliance (\"Terms\") posted on the Website and application from time to time. These Terms applies to all users (whether Registered user or Guest User) of the Website and application.&lt;br&gt;&lt;br&gt;Please read the Terms and conditions very carefully before using the Website and application as your use of the Website and application is subject to your acceptance of and comp</b></span><br></p>', '2021-01-13 07:47:24', '2021-01-13 07:47:31', '2021-01-13 07:47:31');

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sub_categories`
--

CREATE TABLE `sub_categories` (
  `sub_cat_id` int(11) NOT NULL,
  `cat_id` int(11) DEFAULT NULL,
  `sub_cat_name` varchar(100) DEFAULT NULL,
  `active` tinyint(1) DEFAULT 1,
  `img` text DEFAULT NULL,
  `festival_date` date DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp(),
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `sub_categories`
--

INSERT INTO `sub_categories` (`sub_cat_id`, `cat_id`, `sub_cat_name`, `active`, `img`, `festival_date`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 1, 'Pooja Ghar', 1, 'Business_1604500053.jpg', NULL, '2021-05-20 05:19:06', '2021-05-20 13:05:41', '2021-05-20 13:05:41'),
(2, 38, 'Good Morning', 1, '1621515965.jpeg', NULL, '2021-05-20 12:41:55', '2021-05-20 13:06:05', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `transaction`
--

CREATE TABLE `transaction` (
  `transaction_id` int(11) NOT NULL,
  `name` varchar(250) DEFAULT NULL,
  `mobile_number` varchar(15) DEFAULT NULL,
  `payment_id` varchar(250) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `bill_id` int(11) DEFAULT NULL,
  `user_type` varchar(250) DEFAULT NULL,
  `transaction_type` varchar(250) DEFAULT NULL,
  `transaction_signature` text DEFAULT NULL,
  `status` varchar(250) DEFAULT NULL,
  `payment_method` varchar(250) DEFAULT NULL,
  `amount` float(10,2) DEFAULT NULL,
  `remarks` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp(),
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(15) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `usertype` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `package_type` tinyint(1) NOT NULL DEFAULT 0,
  `package_start` date DEFAULT NULL,
  `package_end` date DEFAULT NULL,
  `business_name` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `category_id` int(11) DEFAULT NULL,
  `phone1` varchar(15) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone2` varchar(15) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `photo` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `city` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `device_token` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `device_type` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `phone`, `email`, `usertype`, `package_type`, `package_start`, `package_end`, `business_name`, `category_id`, `phone1`, `phone2`, `photo`, `address`, `city`, `email_verified_at`, `password`, `remember_token`, `device_token`, `device_type`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Abhishek', '+918849675420', 'info@beepixl.com', 'admin', 0, NULL, NULL, NULL, NULL, NULL, NULL, '1610545604imgbin_apple-juice-fruit-seed-png.png', NULL, NULL, NULL, '$2y$10$XsJCmkJJx6H5xE6b920oLeDqcxfgNP6Uef0eaP3Su1MgsRNphlBn6', NULL, NULL, NULL, '2021-01-11 07:27:47', '2021-01-13 08:16:44', NULL),
(2, 'kalpesh G', '2581479635', 'admin@gmail.com', 'admin', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '$2y$10$NPu9xaTHghzKr.WCOp2y2eOTKLaAk03W5q/hDzVQ0o/VYKJSy2Xeq', NULL, NULL, NULL, '2021-01-13 08:19:13', '2021-04-16 09:16:26', NULL),
(12, 'null', '913117984633', 'parth@gmail.com', 'customer', 0, NULL, NULL, NULL, NULL, NULL, '9876543210', '12.png', 'Aakar Park', 'Navsari', NULL, NULL, NULL, 'c_WG3ulCTTCt9YQwXlul0g:APA91bFmAeNdCrxIANm-R87ysZ6BA4mMsL5be-8Zoa7zgVbgFaxLK-i0aXBi5EDXlHBrhfcEI-WPPlMP0poKhRpehZl2nRtWjfEgAE9QB-TqoRYA14I6MSf85AieWAnJx6-p30TX4rfx', 'Android', '2021-05-20 12:52:20', '2021-05-20 13:41:06', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `video`
--

CREATE TABLE `video` (
  `id` int(11) NOT NULL,
  `title` text DEFAULT NULL,
  `image` text DEFAULT NULL,
  `link` longtext DEFAULT NULL,
  `product_id` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp(),
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bill`
--
ALTER TABLE `bill`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `blog`
--
ALTER TABLE `blog`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `business`
--
ALTER TABLE `business`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `images`
--
ALTER TABLE `images`
  ADD PRIMARY KEY (`image_id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `notification_message`
--
ALTER TABLE `notification_message`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `offers_slider`
--
ALTER TABLE `offers_slider`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pages`
--
ALTER TABLE `pages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `sub_categories`
--
ALTER TABLE `sub_categories`
  ADD PRIMARY KEY (`sub_cat_id`);

--
-- Indexes for table `transaction`
--
ALTER TABLE `transaction`
  ADD PRIMARY KEY (`transaction_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD UNIQUE KEY `phone` (`phone`);

--
-- Indexes for table `video`
--
ALTER TABLE `video`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bill`
--
ALTER TABLE `bill`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `blog`
--
ALTER TABLE `blog`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `business`
--
ALTER TABLE `business`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=92;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `images`
--
ALTER TABLE `images`
  MODIFY `image_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `notification_message`
--
ALTER TABLE `notification_message`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `offers_slider`
--
ALTER TABLE `offers_slider`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pages`
--
ALTER TABLE `pages`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `sub_categories`
--
ALTER TABLE `sub_categories`
  MODIFY `sub_cat_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `transaction`
--
ALTER TABLE `transaction`
  MODIFY `transaction_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `video`
--
ALTER TABLE `video`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
