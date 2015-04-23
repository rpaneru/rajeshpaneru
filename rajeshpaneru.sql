-- phpMyAdmin SQL Dump
-- version 3.5.2.2
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Apr 23, 2015 at 05:22 PM
-- Server version: 5.5.27
-- PHP Version: 5.4.7

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `rajeshpaneru`
--

-- --------------------------------------------------------

--
-- Table structure for table `access_control`
--

CREATE TABLE IF NOT EXISTS `access_control` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `serviceId` int(11) NOT NULL,
  `userTypeId` enum('1','2','3','4') NOT NULL,
  `description` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Dumping data for table `access_control`
--

INSERT INTO `access_control` (`id`, `serviceId`, `userTypeId`, `description`) VALUES
(1, 1, '1', 'Home page is visible for all users.'),
(2, 2, '1', 'Login Page is visible for everyone'),
(3, 3, '1', 'Authontication should be process  for everyone'),
(4, 4, '4', 'Super Admin dashboard will be visible only for super admin'),
(5, 6, '4', 'User''s listing service will be visible for super admin'),
(6, 7, '4', 'Add new User service will be visible for super admin\r\n'),
(7, 8, '4', 'Update user profile service will be visible for super admin\r\n'),
(8, 9, '4', 'Delete user profile service will be visible for super admin\r\n'),
(9, 10, '4', ''),
(10, 11, '4', '');

-- --------------------------------------------------------

--
-- Table structure for table `addresses`
--

CREATE TABLE IF NOT EXISTS `addresses` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `address` text NOT NULL,
  `city` text NOT NULL,
  `district` text NOT NULL,
  `stateId` int(11) NOT NULL,
  `countryId` int(11) NOT NULL,
  `zipCode` int(6) NOT NULL,
  `createdDateTime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `createdBy` text NOT NULL,
  `sessionId` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `addresses`
--

INSERT INTO `addresses` (`id`, `address`, `city`, `district`, `stateId`, `countryId`, `zipCode`, `createdDateTime`, `createdBy`, `sessionId`) VALUES
(1, 'Subash Nagar', 'Haldwani', 'Nainital', 27, 110, 263139, '2015-04-09 15:24:05', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `countries`
--

CREATE TABLE IF NOT EXISTS `countries` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `countryName` varchar(255) NOT NULL,
  `countryCode` varchar(2) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=281 ;

--
-- Dumping data for table `countries`
--

INSERT INTO `countries` (`id`, `countryName`, `countryCode`) VALUES
(1, 'Aruba', 'AW'),
(2, 'Afghanistan', 'AF'),
(3, 'Angola', 'AO'),
(4, 'Anguilla', 'AI'),
(5, 'Albania', 'AL'),
(6, 'Andorra', 'AD'),
(7, 'Netherlands Antilles', 'AN'),
(8, 'United Arab Emirates', 'AE'),
(9, 'Argentina', 'AR'),
(10, 'Armenia', 'AM'),
(11, 'American Samoa', 'AS'),
(12, 'Antarctica', 'AQ'),
(13, 'French Southern Territories', 'TF'),
(14, 'Antigua and Barbuda', 'AG'),
(15, 'Australia', 'AU'),
(16, 'Austria', 'AT'),
(17, 'Azerbaijan', 'AZ'),
(18, 'Burundi', 'BI'),
(19, 'Belgium', 'BE'),
(20, 'Benin', 'BJ'),
(21, 'Burkina Faso', 'BF'),
(22, 'Bangladesh', 'BD'),
(23, 'Bulgaria', 'BG'),
(24, 'Bahrain', 'BH'),
(25, 'Bahamas', 'BS'),
(26, 'Bosnia and Herzegovina', 'BA'),
(27, 'Belarus', 'BY'),
(28, 'Belize', 'BZ'),
(29, 'Bermuda', 'BM'),
(30, 'Bolivia', 'BO'),
(31, 'Brazil', 'BR'),
(32, 'Barbados', 'BB'),
(33, 'Brunei Darussalam', 'BN'),
(34, 'Bhutan', 'BT'),
(35, 'Bouvet Island', 'BV'),
(36, 'Botswana', 'BW'),
(37, 'Central African Republic', 'CF'),
(38, 'Canada', 'CA'),
(39, 'Cocos (Keeling) Islands', 'CC'),
(40, 'Switzerland', 'CH'),
(41, 'Chile', 'CL'),
(42, 'China', 'CN'),
(43, 'Cote D&#39;Ivoire', 'CI'),
(44, 'Cameroon', 'CM'),
(45, 'Congo, The Democratic Republic', 'CD'),
(46, 'Congo', 'CG'),
(47, 'Cook Islands', 'CK'),
(48, 'Colombia', 'CO'),
(49, 'Comoros', 'KM'),
(50, 'Cape Verde', 'CV'),
(51, 'Costa Rica', 'CR'),
(52, 'Cuba', 'CU'),
(53, 'Christmas Island', 'CX'),
(54, 'Cayman Islands', 'KY'),
(55, 'Cyprus', 'CY'),
(56, 'Czech Republic', 'CZ'),
(57, 'Germany', 'DE'),
(58, 'Djibouti', 'DJ'),
(59, 'Dominica', 'DM'),
(60, 'Denmark', 'DK'),
(61, 'Dominican Republic', 'DO'),
(62, 'Algeria', 'DZ'),
(63, 'Ecuador', 'EC'),
(64, 'Egypt', 'EG'),
(65, 'Eritrea', 'ER'),
(66, 'Western Sahara', 'EH'),
(67, 'Spain', 'ES'),
(68, 'Estonia', 'EE'),
(69, 'Ethiopia', 'ET'),
(70, 'Finland', 'FI'),
(71, 'Fiji', 'FJ'),
(72, 'Falkland Islands (Malvinas)', 'FK'),
(73, 'France', 'FR'),
(74, 'Faroe Islands', 'FO'),
(75, 'Micronesia, Federated States', 'FM'),
(76, 'Gabon', 'GA'),
(77, 'United Kingdom', 'GB'),
(78, 'Georgia', 'GE'),
(79, 'Ghana', 'GH'),
(80, 'Gibraltar', 'GI'),
(81, 'Guinea', 'GN'),
(82, 'Guadeloupe', 'GP'),
(83, 'Gambia', 'GM'),
(84, 'Guinea-Bissau', 'GW'),
(85, 'Equatorial Guinea', 'GQ'),
(86, 'Greece', 'GR'),
(87, 'Grenada', 'GD'),
(88, 'Greenland', 'GL'),
(89, 'Guatemala', 'GT'),
(90, 'French Guiana', 'GF'),
(91, 'Guam', 'GU'),
(92, 'Guyana', 'GY'),
(93, 'Hong Kong', 'HK'),
(94, 'Heard and McDonald Islands', 'HM'),
(95, 'Honduras', 'HN'),
(96, 'Croatia', 'HR'),
(97, 'Haiti', 'HT'),
(98, 'Hungary', 'HU'),
(99, 'Indonesia', 'ID'),
(100, 'India', 'IN'),
(101, 'British Indian Ocean Territory', 'IO'),
(102, 'Ireland', 'IE'),
(103, 'Iran (Islamic Republic Of)', 'IR'),
(104, 'Iraq', 'IQ'),
(105, 'Iceland', 'IS'),
(106, 'Israel', 'IL'),
(107, 'Italy', 'IT'),
(108, 'Jamaica', 'JM'),
(109, 'Jordan', 'JO'),
(110, 'Japan', 'JP'),
(111, 'Kazakstan', 'KZ'),
(112, 'Kenya', 'KE'),
(113, 'Kyrgyzstan', 'KG'),
(114, 'Cambodia', 'KH'),
(115, 'Kiribati', 'KI'),
(116, 'Saint Kitts and Nevis', 'KN'),
(117, 'Korea, Republic of', 'KR'),
(118, 'Kuwait', 'KW'),
(119, 'Lao People&#39;s Democratic Rep', 'LA'),
(120, 'Lebanon', 'LB'),
(121, 'Liberia', 'LR'),
(122, 'Libyan Arab Jamahiriya', 'LY'),
(123, 'Saint Lucia', 'LC'),
(124, 'Liechtenstein', 'LI'),
(125, 'Sri Lanka', 'LK'),
(126, 'Lesotho', 'LS'),
(127, 'Lithuania', 'LT'),
(128, 'Luxembourg', 'LU'),
(129, 'Latvia', 'LV'),
(130, 'Macau', 'MO'),
(131, 'Morocco', 'MA'),
(132, 'Monaco', 'MC'),
(133, 'Moldova, Republic of', 'MD'),
(134, 'Madagascar', 'MG'),
(135, 'Maldives', 'MV'),
(136, 'Mexico', 'MX'),
(137, 'Marshall Islands', 'MH'),
(138, 'Fmr Yugoslav Rep of Macedonia', 'MK'),
(139, 'Mali', 'ML'),
(140, 'Malta', 'MT'),
(141, 'Myanmar', 'MM'),
(142, 'Mongolia', 'MN'),
(143, 'Northern Mariana Islands', 'MP'),
(144, 'Mozambique', 'MZ'),
(145, 'Mauritania', 'MR'),
(146, 'Montserrat', 'MS'),
(147, 'Martinique', 'MQ'),
(148, 'Mauritius', 'MU'),
(149, 'Malawi', 'MW'),
(150, 'Malaysia', 'MY'),
(151, 'Mayotte', 'YT'),
(152, 'Namibia', 'NA'),
(153, 'New Caledonia', 'NC'),
(154, 'Niger', 'NE'),
(155, 'Norfolk Island', 'NF'),
(156, 'Nigeria', 'NG'),
(157, 'Nicaragua', 'NI'),
(158, 'Niue', 'NU'),
(159, 'Netherlands', 'NL'),
(160, 'Norway', 'NO'),
(161, 'Nepal', 'NP'),
(162, 'Nauru', 'NR'),
(163, 'New Zealand', 'NZ'),
(164, 'Oman', 'OM'),
(165, 'Pakistan', 'PK'),
(166, 'Panama', 'PA'),
(167, 'Pitcairn', 'PN'),
(168, 'Peru', 'PE'),
(169, 'Philippines', 'PH'),
(170, 'Palau', 'PW'),
(171, 'Papua New Guinea', 'PG'),
(172, 'Poland', 'PL'),
(173, 'Puerto Rico', 'PR'),
(174, 'Korea, Democratic People&#39;s Rep', 'KP'),
(175, 'Portugal', 'PT'),
(176, 'Paraguay', 'PY'),
(177, 'French Polynesia', 'PF'),
(178, 'Qatar', 'QA'),
(179, 'Reunion', 'RE'),
(180, 'Romania', 'RO'),
(181, 'Russian Federation', 'RU'),
(182, 'Rwanda', 'RW'),
(183, 'Saudi Arabia', 'SA'),
(184, 'Sudan', 'SD'),
(185, 'Senegal', 'SN'),
(186, 'Singapore', 'SG'),
(187, 'Sth Georgia & Sth Sandwich Is', 'GS'),
(188, 'Saint Helena', 'SH'),
(189, 'Svalbard and Jan Mayen', 'SJ'),
(190, 'Solomon Islands', 'SB'),
(191, 'Sierra Leone', 'SL'),
(192, 'El Salvador', 'SV'),
(193, 'San Marino', 'SM'),
(194, 'Somalia', 'SO'),
(195, 'Saint Pierre and Miquelon', 'PM'),
(196, 'Sao Tome and Principe', 'ST'),
(197, 'Suriname', 'SR'),
(198, 'Slovakia', 'SK'),
(199, 'Slovenia', 'SI'),
(200, 'Sweden', 'SE'),
(201, 'Swaziland', 'SZ'),
(202, 'Seychelles', 'SC'),
(203, 'Syrian Arab Republic', 'SY'),
(204, 'Turks and Caicos Islands', 'TC'),
(205, 'Chad', 'TD'),
(206, 'Togo', 'TG'),
(207, 'Thailand', 'TH'),
(208, 'Tajikistan', 'TJ'),
(209, 'Tokelau', 'TK'),
(210, 'Turkmenistan', 'TM'),
(211, 'East Timor', 'TP'),
(212, 'Tonga', 'TO'),
(213, 'Trinidad and Tobago', 'TT'),
(214, 'Tunisia', 'TN'),
(215, 'Turkey', 'TR'),
(216, 'Tuvalu', 'TV'),
(217, 'Taiwan, Province of China', 'TW'),
(218, 'Tanzania, United Republic of', 'TZ'),
(219, 'Uganda', 'UG'),
(220, 'Ukraine', 'UA'),
(221, 'US Minor Outlying Islands', 'UM'),
(222, 'Uruguay', 'UY'),
(223, 'United States', 'US'),
(224, 'Uzbekistan', 'UZ'),
(225, 'Holy See (Vatican City State)', 'VA'),
(226, 'St Vincent and the Grenadines', 'VC'),
(227, 'Venezuela', 'VE'),
(228, 'Virgin Islands (British)', 'VG'),
(229, 'Virgin Islands (U.S.)', 'VI'),
(230, 'Viet Nam', 'VN'),
(231, 'Vanuatu', 'VU'),
(232, 'Wallis and Futuna Islands', 'WF'),
(233, 'Samoa', 'WS'),
(234, 'Yemen', 'YE'),
(235, 'Yugoslavia', 'YU'),
(236, 'South Africa', 'ZA'),
(237, 'Zambia', 'ZM'),
(238, 'Zimbabwe', 'ZW'),
(239, 'Comoros Islands', ''),
(240, 'Congo, Dem. Republic', ''),
(241, 'Cook Islands', ''),
(242, 'Costa Rica', ''),
(243, 'Congo, Republic of', ''),
(244, 'East Timor (Timor Leste)', ''),
(245, 'Falklands (Islas Malvinas)', ''),
(246, 'French S. Territories', ''),
(247, 'Guinea Bissau', ''),
(248, 'Heard and McDonald Isls', ''),
(249, 'Iran', ''),
(250, 'Heard and McDonald Isls.', ''),
(251, 'Kazakhstan', ''),
(252, 'Korea, DPR. (North Korea)', ''),
(253, 'Korea, Rep. (South Korea)', ''),
(254, 'Laos', ''),
(255, 'Libya', ''),
(256, 'Macedonia', ''),
(257, 'Micronesia', ''),
(258, 'Moldova', ''),
(259, 'Northern Marianas', ''),
(260, 'Palestinian Territories/Gaza', ''),
(261, 'Phillipines', ''),
(262, 'Pitcairn Island', ''),
(263, 'Russia', ''),
(264, 'St. Kitts and Nevis', ''),
(265, 'South Georgia Islands', ''),
(266, 'St. Helena', ''),
(267, 'St. Pierre et Miquelon', ''),
(268, 'St. Vincent and Grenadines', ''),
(269, 'Syria', ''),
(270, 'Tajikistan', ''),
(271, 'Tanzania', ''),
(272, 'Turks and Caicos', ''),
(273, 'United States, A-C', ''),
(274, 'United States, D-M', ''),
(275, 'United States, N-R', ''),
(276, 'United States, S-Z', ''),
(277, 'Miscellaneous Places', ''),
(278, 'Virgin Islands, US', ''),
(279, 'Vietnam', ''),
(280, 'Wallis and Futuna', '');

-- --------------------------------------------------------

--
-- Table structure for table `indian_states`
--

CREATE TABLE IF NOT EXISTS `indian_states` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `stateName` text NOT NULL,
  `capitalName` text NOT NULL,
  `unionTerritory` enum('Yes','No') NOT NULL DEFAULT 'No',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=36 ;

--
-- Dumping data for table `indian_states`
--

INSERT INTO `indian_states` (`id`, `stateName`, `capitalName`, `unionTerritory`) VALUES
(1, 'Andhra Pradesh', 'Hyderabad', 'No'),
(2, 'Arunachal Pradesh', 'Itanagar', 'No'),
(3, 'Assam', 'Dispur', 'No'),
(4, 'Bihar', 'Patna', 'No'),
(5, 'Chhattisgarh', 'Raipur', 'No'),
(6, 'Goa', 'Panjim', 'No'),
(7, 'Gujarat', 'Gandhinagar', 'No'),
(8, 'Haryana', 'Chandigarh', 'No'),
(9, 'Himachal Pradesh', 'Shimla', 'No'),
(10, 'Jammu and Kashmir', 'Srinagar', 'No'),
(11, 'Jharkhand', 'Ranchi', 'No'),
(12, 'Karnataka', 'Bangalore', 'No'),
(13, 'Kerala', 'Thiruvananthapuram', 'No'),
(14, 'Madhya Pradesh', 'Bhopal', 'No'),
(15, 'Maharashtra', 'Mumbai', 'No'),
(16, 'Manipur', 'Imphal', 'No'),
(17, 'Meghalaya', 'Shillong', 'No'),
(18, 'Mizoram', 'Aizawl', 'No'),
(19, 'Nagaland', 'Kohima', 'No'),
(20, 'Odisha', 'Bhubaneswar', 'No'),
(21, 'Punjab', 'Chandigarh', 'No'),
(22, 'Rajasthan', 'Jaipur', 'No'),
(23, 'Sikkim', 'Gangtok', 'No'),
(24, 'Tamil Nadu', 'Chennai', 'No'),
(25, 'Tripura', 'Agartala', 'No'),
(26, 'Uttar Pradesh', 'Lucknow', 'No'),
(27, 'Uttarakhand', 'Dehradun', 'No'),
(28, 'West Bengal', 'Kolkata', 'No'),
(29, 'Andaman and Nicobar Islands', 'Port Blair', 'Yes'),
(30, 'Chandigarh', 'Chandigarh', 'Yes'),
(31, 'Dadar and Nagar Haveli', 'Silvassa', 'Yes'),
(32, 'Daman and Diu', 'Daman', 'Yes'),
(33, 'Delhi', 'Delhi', 'Yes'),
(34, 'Lakshadeep', 'Kavaratti', 'Yes'),
(35, 'Pondicherry', 'Pondicherry', 'Yes');

-- --------------------------------------------------------

--
-- Table structure for table `services`
--

CREATE TABLE IF NOT EXISTS `services` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `serviceGroupId` int(11) NOT NULL,
  `serviceName` varchar(256) NOT NULL,
  `controller` text NOT NULL,
  `action` text NOT NULL,
  `serviceDescription` text NOT NULL,
  `serviceStatus` enum('Active','Inactive') NOT NULL DEFAULT 'Inactive',
  `createdDateTime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `createdBy` text NOT NULL,
  `sessionId` text NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `serviceName` (`serviceName`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=12 ;

--
-- Dumping data for table `services`
--

INSERT INTO `services` (`id`, `serviceGroupId`, `serviceName`, `controller`, `action`, `serviceDescription`, `serviceStatus`, `createdDateTime`, `createdBy`, `sessionId`) VALUES
(1, 1, 'Home Page', 'Application\\Controller\\Index', 'index', '', 'Active', '0000-00-00 00:00:00', '', ''),
(2, 1, 'LogIn Page', 'Users\\Controller\\Index', 'login', '', 'Active', '0000-00-00 00:00:00', '', ''),
(3, 1, 'Process Login Page', 'Users\\Controller\\Index', 'process-login', '', 'Active', '0000-00-00 00:00:00', '', ''),
(4, 0, 'Super Admin Dashboard', 'Users\\Controller\\Index', 'dashboard-super-admin', '', 'Active', '0000-00-00 00:00:00', '', ''),
(6, 1, 'User''s List', 'Users\\Controller\\Index', 'list-users', '', 'Active', '0000-00-00 00:00:00', '', ''),
(7, 1, 'Add New User Service', 'Users\\Controller\\Index', 'add-new-user', '', 'Active', '0000-00-00 00:00:00', '', ''),
(8, 1, 'Update User Profile Service', 'Users\\Controller\\Index', 'update-user-profile', '', 'Active', '0000-00-00 00:00:00', '', ''),
(9, 1, 'Delete User Profile', 'Users\\Controller\\Index', 'delete-user-profile', '', 'Active', '0000-00-00 00:00:00', '', ''),
(10, 3, 'Serice Group Management', 'Authorization\\Controller\\ServiceGroups ', 'list-service-groups', '', 'Active', '2015-04-19 16:57:39', '', ''),
(11, 3, 'List-services', 'Authorization\\Controller\\Services', 'list-services', '', 'Active', '2015-04-19 17:32:33', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `service_groups`
--

CREATE TABLE IF NOT EXISTS `service_groups` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `serviceGroupName` varchar(256) NOT NULL,
  `serviceGroupDescription` text NOT NULL,
  `serviceGroupStatus` enum('Active','Inactive') NOT NULL DEFAULT 'Inactive',
  `createdDateTime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `createdBy` text NOT NULL,
  `sessionId` text NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `serviceGroupName` (`serviceGroupName`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `service_groups`
--

INSERT INTO `service_groups` (`id`, `serviceGroupName`, `serviceGroupDescription`, `serviceGroupStatus`, `createdDateTime`, `createdBy`, `sessionId`) VALUES
(1, 'Common', 'Services under this service group has been allotted for everyone', 'Active', '0000-00-00 00:00:00', '', ''),
(2, 'User Management', 'User management related services will be held inside this service group', 'Active', '0000-00-00 00:00:00', '', ''),
(3, 'Service Management', '', 'Active', '0000-00-00 00:00:00', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `userName` text NOT NULL,
  `userDob` date NOT NULL,
  `userGender` enum('Male','Female') NOT NULL,
  `userMobile` bigint(12) NOT NULL,
  `userFax` text NOT NULL,
  `userEmail` text NOT NULL,
  `userPassword` text NOT NULL,
  `userAddressId` int(11) NOT NULL,
  `userImage` text NOT NULL,
  `userTypeId` int(1) NOT NULL,
  `userStatus` enum('Active','Inactive') NOT NULL DEFAULT 'Inactive',
  `createdDateTime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `createdBy` text NOT NULL,
  `sessionId` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `userName`, `userDob`, `userGender`, `userMobile`, `userFax`, `userEmail`, `userPassword`, `userAddressId`, `userImage`, `userTypeId`, `userStatus`, `createdDateTime`, `createdBy`, `sessionId`) VALUES
(1, 'Rajesh Paneru', '1986-06-03', 'Male', 8130654757, '123456789', 'rpaneru1986@gmail.com', '2452aa0a0be563260021b52622dcc360', 1, 'rajesh.png', 4, 'Active', '2015-04-05 18:00:32', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `user_login_history`
--

CREATE TABLE IF NOT EXISTS `user_login_history` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `userid` text NOT NULL,
  `sessionId` tinytext NOT NULL,
  `ipAddress` text NOT NULL,
  `os` text NOT NULL,
  `browser` text NOT NULL,
  `screenResolution` text NOT NULL,
  `screenSize` text NOT NULL,
  `logInDateTime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `logOutDateTime` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `user_types`
--

CREATE TABLE IF NOT EXISTS `user_types` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `userType` text NOT NULL,
  `description` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `user_types`
--

INSERT INTO `user_types` (`id`, `userType`, `description`) VALUES
(1, 'Guest', ''),
(2, 'Registered User', ''),
(3, 'Administrator', ''),
(4, 'Super Administrator', '');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
