-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 17, 2021 at 09:33 AM
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
-- Database: `sunfarms`
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
  `city` text DEFAULT NULL,
  `pincode` int(11) DEFAULT NULL,
  `status` varchar(200) DEFAULT NULL,
  `coupon_code` varchar(10) DEFAULT NULL,
  `discount` float(10,2) DEFAULT NULL,
  `sub_total` float(10,2) DEFAULT NULL,
  `total_amount` float(10,2) DEFAULT 0.00,
  `bill_date` date DEFAULT NULL,
  `notes` varchar(200) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp(),
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `bill`
--

INSERT INTO `bill` (`id`, `customer_id`, `name`, `mobile`, `area`, `state`, `city`, `pincode`, `status`, `coupon_code`, `discount`, `sub_total`, `total_amount`, `bill_date`, `notes`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 2, ' Ramu Bhai', 9638045924, 'aakar park', 'gujrat', 'surat', 3964458, 'delivering', 'DOV160', 10.00, NULL, 1000.00, '2021-01-13', 'xaxsacx', '2021-01-16 08:36:59', '2021-01-16 12:12:58', NULL),
(3, 2, ' Bhai Bhai', 9638045929, 'aakar park adajan', 'vijalpore,gujrat ', 'surat', 3964458, 'delivering', 'DOV1625', 10.00, NULL, 2000.00, '2021-02-02', 'xaxsacx', '2020-12-25 08:36:59', '2021-01-16 05:37:29', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `bill_products`
--

CREATE TABLE `bill_products` (
  `id` int(11) NOT NULL,
  `bill_id` int(11) DEFAULT NULL,
  `product_cat_id` int(11) DEFAULT NULL,
  `product_id` int(11) DEFAULT NULL,
  `product_name` varchar(50) DEFAULT NULL,
  `image` text DEFAULT NULL,
  `mrp` int(20) DEFAULT NULL,
  `quantity` int(11) DEFAULT NULL,
  `size` varchar(50) DEFAULT NULL,
  `sub_total` float(10,2) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp(),
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `bill_products`
--

INSERT INTO `bill_products` (`id`, `bill_id`, `product_cat_id`, `product_id`, `product_name`, `image`, `mrp`, `quantity`, `size`, `sub_total`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 3, 2, 1, 'Testing', NULL, 2000, 10, '1kg', 20000.00, '2021-01-16 08:24:24', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `blog`
--

CREATE TABLE `blog` (
  `id` int(11) NOT NULL,
  `name` text DEFAULT NULL,
  `photo` text DEFAULT NULL,
  `description` varchar(250) DEFAULT NULL,
  `tags` varchar(100) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp(),
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `blog`
--

INSERT INTO `blog` (`id`, `name`, `photo`, `description`, `tags`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'testing', NULL, 'testing 6 bhai', 'chicken', '2021-01-17 07:56:57', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `coupons`
--

CREATE TABLE `coupons` (
  `id` int(11) NOT NULL,
  `coupon_name` varchar(200) DEFAULT NULL,
  `coupon_code` varchar(10) NOT NULL,
  `coupon_expiry` date DEFAULT NULL,
  `minimum_price` int(20) DEFAULT NULL,
  `max_discount` int(20) NOT NULL,
  `coupon_products` int(11) DEFAULT NULL,
  `coupon_type` varchar(20) DEFAULT NULL,
  `coupon_categories` varchar(100) DEFAULT NULL,
  `coupon_status` tinyint(4) DEFAULT NULL,
  `coupon_published` tinyint(1) DEFAULT NULL,
  `coupon_images` text DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp(),
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `coupons`
--

INSERT INTO `coupons` (`id`, `coupon_name`, `coupon_code`, `coupon_expiry`, `minimum_price`, `max_discount`, `coupon_products`, `coupon_type`, `coupon_categories`, `coupon_status`, `coupon_published`, `coupon_images`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'FREE 165 DOVE 3x100g', 'DOV160', '2021-01-13', 9600, 10, 1, NULL, '1', 1, 1, '1610542182.ic_launcher-png.png', '2021-01-13 07:19:42', '2021-01-17 02:08:16', '2021-01-17 02:08:16'),
(2, '75 OFF ON 1L OIL', 'DOV166', '2021-01-17', 500, 1000, 1, NULL, '1', 1, 1, '1610867910.nouvelle-foods.png', '2021-01-17 01:48:30', '2021-01-17 01:48:30', NULL),
(3, 'FREE 165 DOVE 3x100g', 'PAT500', '2021-01-17', 500, 500, 2, NULL, '4', 1, 0, '1610869164.png', '2021-01-17 02:09:24', '2021-01-17 02:09:24', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `customers_address`
--

CREATE TABLE `customers_address` (
  `customer_address_id` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `full_name` varchar(255) DEFAULT NULL,
  `mobile_no` bigint(20) DEFAULT NULL,
  `pincode` int(11) DEFAULT NULL,
  `house_no` int(11) DEFAULT NULL,
  `area` varchar(255) DEFAULT NULL,
  `landmark` varchar(255) DEFAULT NULL,
  `city` varchar(255) DEFAULT NULL,
  `state` varchar(255) DEFAULT NULL,
  `address_type` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp(),
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `customers_address`
--

INSERT INTO `customers_address` (`customer_address_id`, `customer_id`, `full_name`, `mobile_no`, `pincode`, `house_no`, `area`, `landmark`, `city`, `state`, `address_type`, `created_at`, `updated_at`, `deleted_at`) VALUES
(3, 7, 'kalpesh', 2581473693, 396445, 202, 'aakar park', 'temple', 'navsari', 'MN', 'Home', '2021-01-16 06:29:09', '2021-01-16 06:29:09', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `instagram`
--

CREATE TABLE `instagram` (
  `id` int(11) NOT NULL,
  `hashtags` text DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp(),
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1);

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

--
-- Dumping data for table `notification_message`
--

INSERT INTO `notification_message` (`id`, `t_title`, `t_message`, `image`, `customer_id`, `created_at`, `updated_at`) VALUES
(1, 'frgbvrfgb', 'rttgbvthb', '161054730367.vegetable-002.png', 2, '2021-01-13 08:45:03', '2021-01-13 08:45:03');

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

--
-- Dumping data for table `offers_slider`
--

INSERT INTO `offers_slider` (`id`, `image`, `category_id`, `created_at`, `updated_at`) VALUES
(1, '161054481467.tata.webp', 1, '2021-01-13 05:28:06', '2021-01-13 08:03:34'),
(2, '161079848267.sun19-slider.jpg', 2, '2021-01-13 06:16:15', '2021-01-16 06:31:23'),
(3, '161054415867.vegitables.jpg', 3, '2021-01-13 06:20:13', '2021-01-13 07:52:38');

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
(1, 'Terms & Conditions', '<div class=\"row\" style=\"margin: 0px; font-family: JioLight; font-size: 14px;\"><div class=\"col-sm-12\" style=\"width: 990px;\"><h3 style=\"margin-top: 0px; margin-bottom: 0.5rem; font-weight: 500; font-size: 18px; font-family: JioMedium; letter-spacing: 0.25px; padding: 4px 0px;\">Terms and Conditions</h3></div></div><div class=\"row\" style=\"margin: 0px; font-family: JioLight; font-size: 14px;\"><div class=\"col-sm-12 padding-static\" style=\"width: 990px;\"><span style=\"font-weight: bolder;\">GENERAL</span><br><br><p style=\"margin-bottom: 12px !important;\">This document is an electronic record in terms of The Information Technology Act, 2000 ( \"IT Act\") and rules thereunder, and is published in accordance with the provisions of Rule 3 (1) under IT Act which mandates for publishing of rules and regulations, privacy policy and terms of use for access or usage of the Website and application. This electronic record is generated by a computer system and does not require any physical or digital signatures.<br><br>JioMart (\"Website and application\") is an online selling channel of Reliance Retail, having its office at 3rd Floor, Court House, Lokmanya Tilak Marg, Dhobi Talao, Mumbai – 400002<br><br>Your use / access of the Website and application, its related sites and hyperlinks, shall be governed by the terms and conditions, policies, rules of Reliance (\"Terms\") posted on the Website and application from time to time. These Terms applies to all users (whether Registered user or Guest User) of the Website and application.<br><br>Please read the Terms and conditions very carefully before using the Website and application as your use of the Website and application is subject to your acceptance of and compliance with the Terms. If you do not agree or are not willing to be bound by the terms and conditions of this User Agreement and any Rules and Policies of Reliance, please do not click on the \" I Accept\" button/check box and on the \"Continue\" button or \"Pay Now\" button and do not subscribe or seek to obtain access to or otherwise use the Website and application.<br><br>By subscribing to or using the website and application or any of our services through the Website and application you agree that you have read, understood and are bound by the Terms, Policies, directions of Reliance regardless of how you subscribe to or use the Website and application. This Agreement comes into effect upon your \"Acceptance\" of these terms and conditions (\"Terms\") however Reliance at its sole discretion reserves its right not to accept a user from registering on the Website and application without assigning any reason thereof.<br><br></p><span style=\"font-weight: bolder;\">DEFINITION</span><br><br><p style=\"margin-bottom: 12px !important;\">\"Agreement\" means the terms and conditions as detailed herein including all schedules, appendices, annexures, Privacy Policy, Disclaimer and will include the references to this Agreement as amended, novated, supplemented, varied or replaced from time to time.<br><br>\"You\"/ \"User\" shall mean the end user accessing the Website and application, its contents and using the services offered through the Website and application.<br><br>\"Reliance\"/ \"we\"/ \"us\"/ \"our\" shall mean Reliance Retail Limited or its affiliates, franchisees, service providers, successors and assigns \"Site\" means the online shopping platform owned and operated by Reliance Retail Ltd. (\"JioMart\"), which provides a venue to the users of JioMart to buy the Products listed on Site.<br><br>\"Customer\"/\"Buyer\" shall mean the person or any legal entity who access the Website and application and places an order for and or purchases any products /services against the invitation of offer for sale of products / services on the Website and application.<br><br>\"Acceptance\" shall mean your affirmative action in clicking on \"check box\"™ and on the \"continue button as provided on the registration page or clicking on<br><br>\"˜Pay Now\" button while transacting as User or such other actions that implies your acceptance.<br><br>\"Product\" shall mean the Products offered for sale on the website and application from time to time<br><br>\"Delivery\" shall mean the physical delivery of goods under your order placed with us<br><br>\"Price\" means the price communicated at the time of order and confirmed by us<br><br>\"Payment Facility\" shall mean applicable mode of payments made available to User from time to time.<br><br>\"Content\" means all text, graphics, user interfaces, visual interfaces, photographs, trademarks, logos, sounds, music, artwork and computer code collectively By impliedly or expressly accepting this User Agreement, Policies and Terms, You also accept and agree to be bound by Rules, Policies and Terms of Reliance as provided from time to time in its Website and application and corresponding hyperlinks.</p><span style=\"font-weight: bolder;\">PURCHASE</span><br><br><p style=\"margin-bottom: 12px !important;\"><span style=\"font-weight: bolder;\">1) Registration and Submission of personal details:</span><br><br>You can use the services offered by the Website and application as a \"Registered User\". As part of the registration process on the Site, Reliance may collect certain personally identifiable information about you including first and last name, email address, mobile phone number and contact details, Postal code, Demographic profile (like your age, gender, occupation, education, address etc.) and information about the pages on the site you visit/access, the links you click on the site, the number of times you access the page and any such browsing information.<br><br>As a Registered User, you are responsible for maintaining the confidentiality of your user id and password. You are also responsible for maintaining the confidentiality of your email id and mobile number and for any unauthorised access to your mobile , tab, computer, computer system and computer network, and you are responsible for all activities that occur under your user id and password, email id and mobile number as the case may be. You agree to maintain and promptly update all data provided by you and to keep it true, accurate, current and complete. If you provide any information that is untrue, inaccurate, not current or incomplete or we have reasonable grounds to suspect that such information is untrue, inaccurate, not current or incomplete, or not in accordance with the Terms, we have the right to indefinitely suspend or terminate or block access of your user account with the Website and application and refuse to provide you with access to the Website and application.<br><br>We will collect personally identifiable information about you only as part of a voluntary registration process, on-line survey, or contest or any combination thereof.<br><br><span style=\"font-weight: bolder;\">2) User\'s Liability:</span><br><br>The User hereby affirms that the information provided by him / her is true, correct and complete to the best of his / her knowledge and belief. The User agrees and understands that he / she will be solely responsible in the event of any inaccuracy or deviation therefrom at a later stage.<br><br>You agree to comply with all applicable laws in connection with your use of the Website and application, and such further limitations as may be set forth in any written or on-screen notice from us.<br><br>To register with &amp; shop with JioMart you must be eighteen years of age or over. Our website and application is not directed to children under the age of 18. If we become aware that a child and/ or customer is under the age of 18 and has registered or using our Website and application, we are entitled to remove his or her account from our system and cancel any order placed by him or her.<br><br>You agree and undertake not to reverse engineer, modify, copy, distribute, transmit, display, perform, reproduce, publish, license, create derivative works from, transfer, or sell any information or software obtained from the Website and application. Reproduction, copying of the content for commercial or non-commercial purposes and unwarranted modification of data and information within the content of the Website and application is not permitted<br><br>You agree and undertake not to display, upload, modify, publish, transmit, update or share any information that:<br><br>i. belongs to another person and to which you do not have any legal right<br><br>ii. is grossly harmful, harassing, blasphemous, defamatory, obscene, pornographic, invasive of another\'s privacy, hateful, or racially, ethnically objectionable, disparaging, relating or encouraging money laundering or gambling, or otherwise unlawful in any manner what so ever;<br><br>iii. harm minors in any way;<br><br>iv. infringes any patent, trademark, copyright or other proprietary rights or third party\'s trade secrets or rights of publicity or privacy;<br><br>v. violates any law for the time being in force;<br><br>vi. impersonate another person<br><br>vii. contains software viruses or any other computer code, files or programs designed to interrupt, destroy or limit the functionality of any computer resource; or contains any Trojan horses, worms, time bombs, cancelbots, easter eggs or other computer programming routines that may damage, detrimentally interfere with, diminish value of, surreptitiously intercept or expropriate any system, data or personal information.<br><br>You, as a Buyer, understand that upon initiating a transaction you are entering into a legally binding and enforceable contract with Reliance to purchase the products and /or services from Reliance, and pay the transaction price to Reliance using appropriate Payment Facility. You, as a Buyer, understand that the all payment facility may not be available in full or in part for certain category of products and for certain locations and hence you may not be entitled to use that Payment Facility in respect of the transactions for those products or locations.<br><br><span style=\"font-weight: bolder;\">3) Availability of Website and application and its services:</span><br><br>This Website and application is controlled and operated by Reliance from India and Reliance makes no representation that the materials are appropriate or will be available for use in other locations. If you use this web site from outside the India, you are entirely responsible for compliance with all applicable local laws.<br><br>Reliance has several website and applications offering products, services, content and various other functionalities (collectively the \"Services\") to specific regions worldwide. The Services offered in one region may differ from those in other regions due to availability, local or regional laws, shipment and other considerations. Reliance does not make any warranty or representation that a user in one region may obtain the Services from the Reliance site in another region and Reliance may cancel a user\'s order or redirect a user to the site for that user\'s region if a user attempts to order Services offered on a site in another region.<br><br>Information that Reliance publishes on the World Wide Web may contain references or cross references to Reliance products, programs and services that are not announced or available in your country. Such references do not imply that Reliance intends to announce such products, programs or services in your country. Consult your local Reliance business contact for information regarding the products, programs and services that may be available to you.<br><br><span style=\"font-weight: bolder;\">4) Access to Website:</span><br><br>We will do our utmost to ensure that availability of the website and application will be uninterrupted and that transmissions will be error-free. However, due to the nature of the Internet, this cannot be guaranteed. Also, your access to the website and application may also be occasionally suspended or restricted to allow for repairs, maintenance, or the introduction of new facilities or services at any time without prior notice. We will attempt to limit the frequency and duration of any such suspension or restriction.<br><br><span style=\"font-weight: bolder;\">5) Permission to access website and application:</span><br><br>Reliance grants you a limited, revocable permission to access and make personal use of this Website and application, but not to download or modify it, its Contents or any portion of it, except with express written consent of Reliance. This permission does not include any resale or commercial use of this website and application or its contents; any collection and use of any product listings, descriptions, or prices; any derivative use of this website and application or its contents; any downloading or copying of account information for the benefit of another seller; or any use of data mining, robots, or similar data gathering and extraction tools<br><br>The use of the Website and application and its Content grants no rights to you in relation to any copyright, designs, trademarks and all other intellectual property and material rights relating to the Content. Including the content but not limited to the design, structure, selection, coordination, expression, \"look and feel\" and arrangement of such Content, contained on the Website and application are original to Reliance and are owned and controlled or licensed by us, and are protected by trade dress, copyright, patent and trademark laws, and various other intellectual property rights.<br><br>Except as expressly provided in Terms of Use, no part of the Website and application and no Content may be copied, reproduced, republished, uploaded, posted, publicly displayed, encoded, translated, transmitted or distributed in any way (including \"mirroring\") to any other computer, server, website and application or other medium for publication or distribution or for any commercial enterprise, without our express prior written consent.<br><br><span style=\"font-weight: bolder;\">6) Applicability of Terms:</span><br><br>You will be subject to the policies, conditions and Terms of use in force at the time that you use the website and application or that you order goods from us, unless any change to those policies or these conditions is required to be made by law or government authority (in which case it will apply to orders previously placed by you).<br><br><span style=\"font-weight: bolder;\">7) Communications:</span><br><br>When you place an order on our Website and application or send e-mails to us, you are communicating with us electronically so you must provide a valid mobile phone number / email address and your address while placing an order with us. We may communicate with you by e-mail, SMS, phone call or by posting notices on the Website and application or by any other mode of communication. For contractual purposes, you consent to receive communications including SMS, e-mails or phone calls from us with respect to your order.<br><br>Your Obligations:<br><br>You shall<br><br>i. not acquire any ownership rights by downloading material /Contents from this website and application.<br><br>ii. read the Terms and policies of website and application and agree to accept the Terms before use of Website and application<br><br>iii. abide by the Terms and Policies of Website and application<br><br>iv. Neither copy or modify the Contents of the website and application nor use the Website and application for commercial purpose<br><br>v. purchase the product(s) from this Website and application for your internal / personal purpose and not for resale by you or any other person.<br><br>vi. comply with all applicable laws in connection with your use of the Website and application, and such further limitations as may be set forth in any written or on-screen notice from us.<br><br>vii. not refuse to accept the delivery of the Products under your order upon delivery except for damages and deficiencies<br><br>viii. authorize us to declare and provide declaration to any governmental authority on your behalf stating the aforesaid purpose of the products ordered by you on the website and application.<br><br><span style=\"font-weight: bolder;\">8) Products/Services:</span><br><br>All products/services and information displayed on Website and application constitute an \"invitation to offer\". Your order for purchase constitutes your \"offer\". All orders placed by you on the Website and application are subject to availability and acceptance by us and conditional on your acceptance and adherence to these terms and conditions.<br><br><span style=\"font-weight: bolder;\">9) Our Contract:</span><br><br>Your order is an offer to us to buy the product(s) in your order. We will confirm our acceptance of your offer either through an e-mail / SMS or through shipment of the items you requested. Upon placing an order, you will receive an e-mail confirming receipt of your order with details (the \"Order Confirmation E-mail\"). The Order Confirmation E-mail is an acknowledgement that we have received your order, and does not confirm acceptance of your offer to buy the product(s) ordered. Our acceptance to your offer takes place and the contract of sale for a product ordered by you concludes only upon actual dispatch of products to you and an e-mail confirmation in that regard is sent to you (the \"Dispatch E-mail\"). We, at our sole discretion, reserve our right to limit the quantity of items and cancel any order, even after acceptance.<br><br>Reliance has complete right to accept or reject an order placed online. No act or omission of Reliance prior to actual dispatch of the product(s) ordered will constitute an acceptance of your offer. You agree not to dispute the decision of Reliance in this regard.<br><br><span style=\"font-weight: bolder;\">10) Delivery/Shipment of Product:</span><br><br>Delivery of the Products under your Order in the Website and application shall be made as per our Delivery/shipment policy mentioned herein. Title of the Product shall pass on to you upon receipt of payment.<br><br><span style=\"font-weight: bolder;\">11) Exactness / Accuracy of product:</span><br><br>We have made significant efforts to accurately display the colours / dimension / specification of products that appear on the Website and application. However, we do not warrant/guarantee that product description or other content of this Website and application is accurate, complete, reliable, current, or error-free. The particular technical specifications and settings of your computer and its display could affect the accuracy of its display of the colours, dimension, specifications of products offered on this Website and application.<br><br>Copyright: All Content included on the website and application, such as text, graphics, logos, button icons, images, audio clips, digital downloads, data compilations, and software, is the property of Reliance, its affiliates or its content suppliers and is protected by the Intellectual Property Laws of India.<br><br>Trademarks: The trademark Reliance, its logo and all products and logos denoted with TM are trademarks owned or registered trademarks of Reliance or its affiliates.<br><br>Intellectual Property Claims: Reliance and its affiliates or its content suppliers respect the intellectual property of others. If you believe that your intellectual property rights have been used in a way that gives rise to concerns of infringement, please write to us with your concerns.<br><br><span style=\"font-weight: bolder;\">12) Disclaimer:</span><br><br>You acknowledge and undertake that you are accessing the services on the Website and application and transacting at your own risk and are using your best and prudent judgment before placing any order or availing the services or entering into any transactions with us through our Website and application. We shall not be held liable nor responsible for any representations or warranties/guarantees of the products save and except the limited manufacturer\'s warranty/guarantee on the respective Product is assigned unto us and we hereby expressly disclaim and any all responsibility and liability in that regard.<br><br><span style=\"font-weight: bolder;\">13) Severability:</span><br><br>If any of these Terms is deemed invalid, void or unenforceable in whole or in part for any reasons, such invalidity or unenforceability condition or part thereof will be deemed severable and will not affect the validity and enforceability of any remaining condition or part of such condition / Terms<br><br><span style=\"font-weight: bolder;\">14) Amendments:</span><br><br>Reliance reserves its right to amend the Website and application, Policies, Conditions or Terms of use and at any time without prior notice. All such updates and amendments shall be posted on the Website and application and will be effective from the time of its posting on the Website and application. You are advised to regularly check for any amendments or updates to the terms and conditions contained in this User Agreement, Terms and Policies.<br><br><span style=\"font-weight: bolder;\">15) Indemnification:</span><br><br>You agree to indemnify, defend and hold harmless us and affiliates including employees, directors, officers, agents and their successors and assigns from and against any and all losses, liabilities, claims, damages, costs and expenses (including legal fees and disbursements in connection therewith and interest chargeable thereon) asserted against or incurred by us arising out of your actions or inactions or result from your breach of the Terms and Conditions herein or any document incorporated by reference/hyperlink or infringement of intellectual property rights or your violation of any law, rules or regulations or the rights of any third party.<br><br>You hereby expressly release Reliance and/or its affiliates and/or any of its officers and representatives from any cost, damage, liability or other consequence of any of the actions/inactions of the Manufacturers/Brand owners of the Products purchased through the website and application and specifically waiver any claims or demands that you may have in this behalf under any statute, contract or otherwise.<br><br>This clause shall survive the expiry or termination of this Agreement.<br><br><span style=\"font-weight: bolder;\">16) Limitation on Liability:</span><br><br>In no event shall we or our affiliates be liable for any special, indirect, incidental, consequential or exemplary damages including but not limited to, damages for loss of profits, goodwill, use, data or other intangible losses arising out of or in connection with the Website and application, its services or this User Agreement whatsoever, whether in an action of contract, negligence or other tortious action.<br><br>Without prejudice to the generality of this section the total liability of Reliance to you for all liabilities arising out of this User Agreement be it in tort or contract is limited to the value of the product ordered by you. However in case of missing a delivery in transit, Our liability is limited only to delivery at a later agreed time at no additional charge.</p><span style=\"font-weight: bolder;\">PRICE &amp; PAYMENT POLICY</span><br><br><p style=\"margin-bottom: 12px !important;\"><span style=\"font-weight: bolder;\">1) Price Policy:</span><br><br>Prices and taxes thereon in respect of all products are subject to change from time to time, without prior notice by Reliance. We strive to provide you with the best prices possible on our Website and application. All the products listed on the Website and application will be sold at Indian Rupees either at Maximum Retail Price ( MRP) (inclusive of all taxes) or at an Offer/discounted price with taxes, unless otherwise specified. The prices mentioned at the time of ordering will be the prices charged to you on the date of delivery. Although prices of most of the products do not fluctuate on a daily basis but some of the commodities and fresh food products prices do change on a daily basis. In case of products such as Fresh Food, Vegetables and Fruits etc. the delivered weight may have variance and product will be billed accordingly on the actual weight.<br><br>There may be cases where M.R.P. of the product delivered is different from the M.R.P. quoted / reflected on the Website and application due to various reasons including time lag in updating prices post changes in M.R.P. or product belonging to a different batch or different M.R.P.s being used by manufacturers in different regions.<br><br>Despite our best efforts, there may be an instance of mispricing of items in our catalogue/offer on Website and application. However, we verify prices as part of our dispatch procedures. If a product\'s correct price is lower than our stated price, we charge the lower amount and send you the item. If a product\'s correct price is higher than our stated price, you may return at the time of delivery or we may not supply the product unless the problem get resolved and if you do not want to purchase the Product in such higher price we shall cancel your order and refund you the amount paid by you for such cancelled transaction as per existing refund policy.<br><br>Our online price may not match with offline price at store. You shall not raise any dispute on the same.<br><br><span style=\"font-weight: bolder;\">2) Payment Policy:</span><br><br>Reliance offers you multiple payment options both online and offline however Reliance reserves its right to add or delete any mode of payment without any prior notice.<br><br><span style=\"font-weight: bolder;\">A. Offline Payment Mode:</span><br><br>Cash on Delivery (CoD) - Buyer needs to make payment in cash to the delivery person at the time of receipt of delivery of the Products at its delivery location<br><br>Food Coupons on Delivery - Food Coupons shall be accepted at the sole discretion of Reliance against value of Ready to Eat / certain category of food items on the invoice at the time of Delivery of Products at the delivery location. Items permissible for purchase through food coupons shall change without prior notice and you shall have the option to cancel the item/order or shall pay in cash or card.<br><br>For CoD Payment option, maximum order value is Rs 20,000/- However Reliance can change this limit without further notice.<br><br>Card on Delivery: A mobile EDC machine may be made available at your door step to facilitate payment by Credit / Debit Card . However due to prevailing network condition in your area or any technical glitch in the equipment or due to any other reason if the EDC terminal is not able to collect the payment, you shall make payment by cash.<br><br>In cases where payment is attempted but remains unsuccessful and a successful charge slip does not get generated, you shall make the payment in cash for that particular order. In certain cases though you may receive a payment confirmation sms from your bank, the amount generally gets reversed in the same account. You may raise the incident with customer care number on the back of card to reverse the amount in case of unreasonable delay, Reliance will not be responsible for such failed attempts due to any network or technical reasons. We on our part, upon request of customer, after due verification with our back end team may give a written confirmation of the non-receipt of payment for you to appropriately take up with card issuing bank.<br><br><span style=\"font-weight: bolder;\">B. Online Payment Mode:</span><br><br>i. Credit Cards<br><br>ii. Debit Card<br><br>iii. Net Banking<br><br>iv. Wallet Payment<br><br><span style=\"font-weight: bolder;\">Acceptance:</span><br><br>We accept payments made by most of the major credit/debit cards issued in India. Acceptance of card payment is at the sole discretion of Reliance and you may be asked to submit copy of photo identity proof too. However Reliance reserves its right to deny acceptance of card payment without any prior notice. We don\'t accept internationally issued credit/debit cards and certain cards issued by banks in India too.<br><br><span style=\"font-weight: bolder;\">Order:</span><br><br>You can place your order with us either on our Website and application or over phone and choose any of our payment modes made available to you. In case of payment to be made offline, Buyer needs to pay the invoice amount in cash / coupon / card at the time of delivery of the Product at its doorstep/preferred location.<br><br>Orders will be processed for shipment/delivery upon selection of your preferred delivery location, date and time and confirmation by us. Reliance may change maximum order value of COD and items/locations available for COD without prior intimation.<br><br><span style=\"font-weight: bolder;\">Payment:</span><br><br>While availing any of the payment method/s available on the Website and application, we will not be responsible or assume any liability, whatsoever in respect of any loss or damage arising directly or indirectly to you due to:<br><br>i. Lack of authorization for any transaction/s, or<br><br>ii. Exceeding the present limit mutually agreed by you and your issuing bank, or<br><br>iii. Any payment issues arising out of the transaction, or<br><br>iv. Decline of transaction for any other reason/s<br><br>Reliance reserves its right to change the price of any product in the Website and application any time without any notice. Prices stated at the time of an order is placed shall apply in respect to that order.<br><br>All payments made against the purchases of products on Website and application by you shall be in Indian Rupees only. Website and application will not facilitate transaction with respect to any other form of currency with respect to the purchases made on Website and application.<br><br>You represent and confirm that the credit/debit card that is being used is yours or that you have been specifically authorized by the owner of the credit/debit card to use it. You further agree and undertake to provide the correct and valid credit card details to carry out a transaction on the Website and application. All credit/debit card holders are subject to validation checks and authorization by the card issuer. If the issuer of your payment card refuses to authorize payment to us, we will not be liable for any delay or non-delivery.<br><br>In case of payment made through online, before shipping / delivering your order to you, we may request you to provide copy of photo identity proof document as acceptable to Reliance to establish your ownership of the payment instrument used by you for your purchase. This is done in the interest of providing a safe online shopping environment to our users.<br><br>Reliance reserves the right to impose limits on the number of transactions which Reliance may receive from an individual valid credit/debit/ valid bank account and reserves the right to refuse to process transactions exceeding such limit.<br><br>Reliance reserves its right to refuse to process transactions by buyers with a prior history of questionable charges including without limitation breach of any agreements by buyer with Reliance or breach/violation of any law or any charges imposed by bank or breach of any policy. Reliance may do such checks as it deems fit before approving the buyer\'s order ) for security or other reasons at the discretion of Reliance. As a result of such check if Reliance is not satisfied with the creditability of the Buyer or genuineness of the transaction, it will have the right to reject such order. Reliance may delay dispatch or cancel any transaction at its sole discretion, if Reliance is suspicious of any Buyer\'s authenticity or activity or if the Buyer is conducting high transaction volumes, to ensure safety of the transaction.<br><br>In cases where the payment of an online order does not get succesfully communicated to our system due to any network or technical issue between intermediary, bank or payment gateway, the order shall not be processed and a refund will be initiated for the same. However in an unsuccessful attempt if the customer’s account gets debited, such amounts generally gets auto reversed in the same account. However Reliance shall not be held responsible for such amounts debited in unsuccessful attempts and customer can raise reversal request with their bank should there be any unreasonable delay in refund.<br><br>Buyer acknowledges that Reliance will not be liable for any damages, interests, claims etc. resulting from not processing a transaction or any delay in processing a transaction which is beyond control of Reliance.<br><br><span style=\"font-weight: bolder;\">For Credit Card:</span><br><br>Note:<br>Credit cards not enabled for online/ecommerce transaction will not be processed for payment. Please check with your credit card issuing Bank or authority on the status or to activate online transaction capabilities for your credit card.<br><br><span style=\"font-weight: bolder;\">For Debit Card:</span><br><br>Note:<br>Debit cards not enabled for online/ecommerce transaction will not be processed for payment. Please check with your debit card issuing Bank or authority on the status or to activate of online transaction capabilities for your debit card.</p><br><br><span style=\"font-weight: bolder;\">RETURN, EXCHANGE &amp; REFUND</span><br><br><p style=\"margin-bottom: 12px !important;\"><span style=\"font-weight: bolder;\">1) Return &amp; Refund Policy:</span><br><br>We endeavour to provide the best quality products every single time you order with us.<br><br>We have a \"no questions asked return and refund policy\" which entitles all our customers to return the product at the time of delivery if they are not satisfied with the quality, freshness or physical condition of the product. At the time of delivery, we will take the returned product back with us and if already paid the corresponding value would be refunded to you through the same mode of payment used at the time of purchase viz., credit card, debit card, net banking. Alternatively, at your option, the said amount can be credited to your store credit account which can be used for your subsequent purchases.<br><br>After the delivery, the amount shall be refunded to you through the same mode of payment or via credit to your store credit account which can be used for subsequent purchases.<br><br>Products once sold and delivered to you, shall be eligible for return only if the product condition is found to be damaged, broken, faulty or different from the ordered one. You can return the product(s), purchased from us under your order as per below, provided the product(s) packs are sealed/unopened/unused and in original condition.</p></div></div>', '2020-08-21 06:40:37', '2020-12-18 07:59:58', NULL),
(2, 'Privacy Policy', '<h1>Privacy Policy</h1>', '2020-11-07 10:51:30', '2020-11-09 05:07:32', NULL),
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
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `product_id` int(11) NOT NULL,
  `product_cat_id` int(11) DEFAULT NULL,
  `product_name` varchar(100) DEFAULT NULL,
  `order_number` int(11) DEFAULT NULL,
  `image` text DEFAULT NULL,
  `mrp` bigint(20) DEFAULT NULL,
  `quantity` int(11) DEFAULT 0,
  `min_qty` int(20) DEFAULT NULL,
  `max_qty` int(20) DEFAULT NULL,
  `size` varchar(100) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `sub_title` varchar(200) DEFAULT NULL,
  `gross_wt` varchar(50) DEFAULT NULL,
  `net_wt` varchar(50) DEFAULT NULL,
  `serves` varchar(50) DEFAULT NULL,
  `featured` tinyint(4) DEFAULT 0,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp(),
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`product_id`, `product_cat_id`, `product_name`, `order_number`, `image`, `mrp`, `quantity`, `min_qty`, `max_qty`, `size`, `description`, `sub_title`, `gross_wt`, `net_wt`, `serves`, `featured`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 2, 'Apple', 123, '16105434431.imgbin_apple-juice-fruit-seed-png.png', 1000, 10, 2, 10, '1kg', NULL, NULL, NULL, NULL, NULL, 1, '2021-01-13 11:55:29', '2021-01-13 07:40:43', NULL),
(2, 2, 'Graps', 1, '16105434741.grapes-16955.png', 2000, 15, 1, 8, '250ml', NULL, NULL, NULL, NULL, NULL, 1, '2021-01-13 06:58:11', '2021-01-16 10:07:13', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `products_categories`
--

CREATE TABLE `products_categories` (
  `id` int(11) NOT NULL,
  `cat_name` varchar(100) DEFAULT NULL,
  `active` tinyint(1) DEFAULT 1,
  `order_no` tinyint(4) DEFAULT NULL,
  `img` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp(),
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `products_categories`
--

INSERT INTO `products_categories` (`id`, `cat_name`, `active`, `order_no`, `img`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Vegetables', 1, 121, '16105426951.vegetable-002.png', '2021-01-13 05:51:25', '2021-01-13 07:28:15', NULL),
(2, 'Fruits', 1, 12, '16105427041.pineapple_jpg-removebg-preview.png', '2021-01-13 07:06:45', '2021-01-13 07:28:24', NULL),
(3, 'Spices', 1, NULL, '16105427141.spice.png', '2021-01-13 07:26:06', '2021-01-13 07:28:34', NULL),
(4, 'Nouvelle Foods', 1, NULL, '16105427231.nouvelle-foods.png', '2021-01-13 07:27:12', '2021-01-13 07:28:43', NULL),
(5, 'Testing', 1, NULL, '16108685121.PRE.png', '2021-01-17 01:58:32', '2021-01-17 01:58:32', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `recipes`
--

CREATE TABLE `recipes` (
  `rec_id` int(11) NOT NULL,
  `product_id` int(11) DEFAULT NULL,
  `photo` text DEFAULT NULL,
  `name` varchar(200) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `preparation_method` text DEFAULT NULL,
  `how_to_cook` text DEFAULT NULL,
  `sub_title` varchar(100) DEFAULT NULL,
  `cook_time` varchar(100) DEFAULT NULL,
  `gross_wt` varchar(50) DEFAULT NULL,
  `net_wt` varchar(50) DEFAULT NULL,
  `serves` varchar(50) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp(),
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `recipes`
--

INSERT INTO `recipes` (`rec_id`, `product_id`, `photo`, `name`, `description`, `preparation_method`, `how_to_cook`, `sub_title`, `cook_time`, `gross_wt`, `net_wt`, `serves`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 2, NULL, 'testing', 'testing 6 bhai', 'Roasting', 'https://www.youtube.com/watch?v=z_bCU56cjYg&list=RDz_bCU56cjYg&start_radio=1', 'Test', '5 min', '2 kg', '2.30kg', '5', '2021-01-17 07:57:55', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `recipe_ingredients`
--

CREATE TABLE `recipe_ingredients` (
  `rec_ing_id` int(11) NOT NULL,
  `rec_id` int(11) DEFAULT NULL,
  `item` varchar(100) DEFAULT NULL,
  `weight` varchar(100) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp(),
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `recipe_ingredients`
--

INSERT INTO `recipe_ingredients` (`rec_ing_id`, `rec_id`, `item`, `weight`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 1, 'salt', '200 grams', '2021-01-17 08:01:38', NULL, NULL),
(2, 1, 'sugar', '100 grams', '2021-01-17 08:02:08', NULL, NULL);

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
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `usertype` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `photo` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `phone`, `email`, `usertype`, `photo`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Abhishek', '+918849675420', 'info@beepixl.com', 'admin', '1610545604imgbin_apple-juice-fruit-seed-png.png', NULL, '$2y$10$XsJCmkJJx6H5xE6b920oLeDqcxfgNP6Uef0eaP3Su1MgsRNphlBn6', NULL, '2021-01-11 07:27:47', '2021-01-13 08:16:44', NULL),
(3, 'Jay', '2581479635', 'jay@gmail.com', 'admin', NULL, NULL, '$2y$10$AIgDKYljk640ULYxuZmzvOuyQeiqQ6iskdj.pb3JG7D5o5BrBEUva', NULL, '2021-01-13 08:19:13', '2021-01-13 08:19:13', NULL),
(7, 'kalpesh', '2581473693', NULL, 'customer', NULL, NULL, NULL, NULL, '2021-01-16 06:26:52', '2021-01-16 06:26:52', NULL),
(8, 'Ramu Bhai', '2581473696', NULL, 'customer', NULL, NULL, NULL, NULL, '2021-01-16 06:33:57', '2021-01-16 06:33:57', NULL),
(9, 'kk', '918866884496', '918866884496', 'customer', NULL, NULL, NULL, NULL, '2021-01-16 08:07:20', '2021-01-16 08:07:20', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `video`
--

CREATE TABLE `video` (
  `id` int(11) NOT NULL,
  `title` varchar(50) DEFAULT NULL,
  `image` text DEFAULT NULL,
  `link` varchar(50) DEFAULT NULL,
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
-- Indexes for table `bill_products`
--
ALTER TABLE `bill_products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `blog`
--
ALTER TABLE `blog`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `coupons`
--
ALTER TABLE `coupons`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customers_address`
--
ALTER TABLE `customers_address`
  ADD PRIMARY KEY (`customer_address_id`);

--
-- Indexes for table `instagram`
--
ALTER TABLE `instagram`
  ADD PRIMARY KEY (`id`);

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
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`product_id`),
  ADD UNIQUE KEY `product_name` (`product_name`);

--
-- Indexes for table `products_categories`
--
ALTER TABLE `products_categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `recipes`
--
ALTER TABLE `recipes`
  ADD PRIMARY KEY (`rec_id`);

--
-- Indexes for table `recipe_ingredients`
--
ALTER TABLE `recipe_ingredients`
  ADD PRIMARY KEY (`rec_ing_id`);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `bill_products`
--
ALTER TABLE `bill_products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `blog`
--
ALTER TABLE `blog`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `coupons`
--
ALTER TABLE `coupons`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `customers_address`
--
ALTER TABLE `customers_address`
  MODIFY `customer_address_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `instagram`
--
ALTER TABLE `instagram`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `notification_message`
--
ALTER TABLE `notification_message`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `offers_slider`
--
ALTER TABLE `offers_slider`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `pages`
--
ALTER TABLE `pages`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `products_categories`
--
ALTER TABLE `products_categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `recipes`
--
ALTER TABLE `recipes`
  MODIFY `rec_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `recipe_ingredients`
--
ALTER TABLE `recipe_ingredients`
  MODIFY `rec_ing_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `transaction`
--
ALTER TABLE `transaction`
  MODIFY `transaction_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `video`
--
ALTER TABLE `video`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
