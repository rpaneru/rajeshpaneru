-- phpMyAdmin SQL Dump
-- version 3.5.2.2
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Apr 06, 2015 at 08:16 PM
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
-- Table structure for table `addresses`
--

CREATE TABLE IF NOT EXISTS `addresses` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `address` text NOT NULL,
  `city` int(11) NOT NULL,
  `district` text NOT NULL,
  `state` int(11) NOT NULL,
  `countryId` int(11) NOT NULL,
  `zipCode` int(6) NOT NULL,
  `createdDateTime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `createdBy` text NOT NULL,
  `sessionId` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `countries`
--

CREATE TABLE IF NOT EXISTS `countries` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `code` varchar(2) COLLATE utf8_unicode_ci NOT NULL,
  `name` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=265 ;

--
-- Dumping data for table `countries`
--

INSERT INTO `countries` (`id`, `code`, `name`) VALUES
(1, 'AD', 'Andorra'),
(2, 'AE', 'United Arab Emirates'),
(3, 'AF', 'Afghanistan'),
(4, 'AG', 'Antigua and Barbuda'),
(5, 'AI', 'Anguilla'),
(6, 'AL', 'Albania'),
(7, 'AM', 'Armenia'),
(8, 'AN', 'Netherlands Antilles'),
(9, 'AO', 'Angola'),
(10, 'AQ', 'Antarctica'),
(11, 'AR', 'Argentina'),
(12, 'AS', 'American Samoa'),
(13, 'AT', 'Austria'),
(14, 'AU', 'Australia'),
(15, 'AW', 'Aruba'),
(16, 'AX', 'Åland Islands'),
(17, 'AZ', 'Azerbaijan'),
(18, 'BA', 'Bosnia and Herzegovina'),
(19, 'BB', 'Barbados'),
(20, 'BD', 'Bangladesh'),
(21, 'BE', 'Belgium'),
(22, 'BF', 'Burkina Faso'),
(23, 'BG', 'Bulgaria'),
(24, 'BH', 'Bahrain'),
(25, 'BI', 'Burundi'),
(26, 'BJ', 'Benin'),
(27, 'BL', 'Saint Barthélemy'),
(28, 'BM', 'Bermuda'),
(29, 'BN', 'Brunei'),
(30, 'BO', 'Bolivia'),
(31, 'BQ', 'British Antarctic Territory'),
(32, 'BR', 'Brazil'),
(33, 'BS', 'Bahamas'),
(34, 'BT', 'Bhutan'),
(35, 'BV', 'Bouvet Island'),
(36, 'BW', 'Botswana'),
(37, 'BY', 'Belarus'),
(38, 'BZ', 'Belize'),
(39, 'CA', 'Canada'),
(40, 'CC', 'Cocos [Keeling] Islands'),
(41, 'CD', 'Congo - Kinshasa'),
(42, 'CF', 'Central African Republic'),
(43, 'CG', 'Congo - Brazzaville'),
(44, 'CH', 'Switzerland'),
(45, 'CI', 'Côte d’Ivoire'),
(46, 'CK', 'Cook Islands'),
(47, 'CL', 'Chile'),
(48, 'CM', 'Cameroon'),
(49, 'CN', 'China'),
(50, 'CO', 'Colombia'),
(51, 'CR', 'Costa Rica'),
(52, 'CS', 'Serbia and Montenegro'),
(53, 'CT', 'Canton and Enderbury Islands'),
(54, 'CU', 'Cuba'),
(55, 'CV', 'Cape Verde'),
(56, 'CX', 'Christmas Island'),
(57, 'CY', 'Cyprus'),
(58, 'CZ', 'Czech Republic'),
(59, 'DD', 'East Germany'),
(60, 'DE', 'Germany'),
(61, 'DJ', 'Djibouti'),
(62, 'DK', 'Denmark'),
(63, 'DM', 'Dominica'),
(64, 'DO', 'Dominican Republic'),
(65, 'DZ', 'Algeria'),
(66, 'EC', 'Ecuador'),
(67, 'EE', 'Estonia'),
(68, 'EG', 'Egypt'),
(69, 'EH', 'Western Sahara'),
(70, 'ER', 'Eritrea'),
(71, 'ES', 'Spain'),
(72, 'ET', 'Ethiopia'),
(73, 'FI', 'Finland'),
(74, 'FJ', 'Fiji'),
(75, 'FK', 'Falkland Islands'),
(76, 'FM', 'Micronesia'),
(77, 'FO', 'Faroe Islands'),
(78, 'FQ', 'French Southern and Antarctic Territories'),
(79, 'FR', 'France'),
(80, 'FX', 'Metropolitan France'),
(81, 'GA', 'Gabon'),
(82, 'GB', 'United Kingdom'),
(83, 'GD', 'Grenada'),
(84, 'GE', 'Georgia'),
(85, 'GF', 'French Guiana'),
(86, 'GG', 'Guernsey'),
(87, 'GH', 'Ghana'),
(88, 'GI', 'Gibraltar'),
(89, 'GL', 'Greenland'),
(90, 'GM', 'Gambia'),
(91, 'GN', 'Guinea'),
(92, 'GP', 'Guadeloupe'),
(93, 'GQ', 'Equatorial Guinea'),
(94, 'GR', 'Greece'),
(95, 'GS', 'South Georgia and the South Sandwich Islands'),
(96, 'GT', 'Guatemala'),
(97, 'GU', 'Guam'),
(98, 'GW', 'Guinea-Bissau'),
(99, 'GY', 'Guyana'),
(100, 'HK', 'Hong Kong SAR China'),
(101, 'HM', 'Heard Island and McDonald Islands'),
(102, 'HN', 'Honduras'),
(103, 'HR', 'Croatia'),
(104, 'HT', 'Haiti'),
(105, 'HU', 'Hungary'),
(106, 'ID', 'Indonesia'),
(107, 'IE', 'Ireland'),
(108, 'IL', 'Israel'),
(109, 'IM', 'Isle of Man'),
(110, 'IN', 'India'),
(111, 'IO', 'British Indian Ocean Territory'),
(112, 'IQ', 'Iraq'),
(113, 'IR', 'Iran'),
(114, 'IS', 'Iceland'),
(115, 'IT', 'Italy'),
(116, 'JE', 'Jersey'),
(117, 'JM', 'Jamaica'),
(118, 'JO', 'Jordan'),
(119, 'JP', 'Japan'),
(120, 'JT', 'Johnston Island'),
(121, 'KE', 'Kenya'),
(122, 'KG', 'Kyrgyzstan'),
(123, 'KH', 'Cambodia'),
(124, 'KI', 'Kiribati'),
(125, 'KM', 'Comoros'),
(126, 'KN', 'Saint Kitts and Nevis'),
(127, 'KP', 'North Korea'),
(128, 'KR', 'South Korea'),
(129, 'KW', 'Kuwait'),
(130, 'KY', 'Cayman Islands'),
(131, 'KZ', 'Kazakhstan'),
(132, 'LA', 'Laos'),
(133, 'LB', 'Lebanon'),
(134, 'LC', 'Saint Lucia'),
(135, 'LI', 'Liechtenstein'),
(136, 'LK', 'Sri Lanka'),
(137, 'LR', 'Liberia'),
(138, 'LS', 'Lesotho'),
(139, 'LT', 'Lithuania'),
(140, 'LU', 'Luxembourg'),
(141, 'LV', 'Latvia'),
(142, 'LY', 'Libya'),
(143, 'MA', 'Morocco'),
(144, 'MC', 'Monaco'),
(145, 'MD', 'Moldova'),
(146, 'ME', 'Montenegro'),
(147, 'MF', 'Saint Martin'),
(148, 'MG', 'Madagascar'),
(149, 'MH', 'Marshall Islands'),
(150, 'MI', 'Midway Islands'),
(151, 'MK', 'Macedonia'),
(152, 'ML', 'Mali'),
(153, 'MM', 'Myanmar [Burma]'),
(154, 'MN', 'Mongolia'),
(155, 'MO', 'Macau SAR China'),
(156, 'MP', 'Northern Mariana Islands'),
(157, 'MQ', 'Martinique'),
(158, 'MR', 'Mauritania'),
(159, 'MS', 'Montserrat'),
(160, 'MT', 'Malta'),
(161, 'MU', 'Mauritius'),
(162, 'MV', 'Maldives'),
(163, 'MW', 'Malawi'),
(164, 'MX', 'Mexico'),
(165, 'MY', 'Malaysia'),
(166, 'MZ', 'Mozambique'),
(167, 'NA', 'Namibia'),
(168, 'NC', 'New Caledonia'),
(169, 'NE', 'Niger'),
(170, 'NF', 'Norfolk Island'),
(171, 'NG', 'Nigeria'),
(172, 'NI', 'Nicaragua'),
(173, 'NL', 'Netherlands'),
(174, 'NO', 'Norway'),
(175, 'NP', 'Nepal'),
(176, 'NQ', 'Dronning Maud Land'),
(177, 'NR', 'Nauru'),
(178, 'NT', 'Neutral Zone'),
(179, 'NU', 'Niue'),
(180, 'NZ', 'New Zealand'),
(181, 'OM', 'Oman'),
(182, 'PA', 'Panama'),
(183, 'PC', 'Pacific Islands Trust Territory'),
(184, 'PE', 'Peru'),
(185, 'PF', 'French Polynesia'),
(186, 'PG', 'Papua New Guinea'),
(187, 'PH', 'Philippines'),
(188, 'PK', 'Pakistan'),
(189, 'PL', 'Poland'),
(190, 'PM', 'Saint Pierre and Miquelon'),
(191, 'PN', 'Pitcairn Islands'),
(192, 'PR', 'Puerto Rico'),
(193, 'PS', 'Palestinian Territories'),
(194, 'PT', 'Portugal'),
(195, 'PU', 'U.S. Miscellaneous Pacific Islands'),
(196, 'PW', 'Palau'),
(197, 'PY', 'Paraguay'),
(198, 'PZ', 'Panama Canal Zone'),
(199, 'QA', 'Qatar'),
(200, 'RE', 'Réunion'),
(201, 'RO', 'Romania'),
(202, 'RS', 'Serbia'),
(203, 'RU', 'Russia'),
(204, 'RW', 'Rwanda'),
(205, 'SA', 'Saudi Arabia'),
(206, 'SB', 'Solomon Islands'),
(207, 'SC', 'Seychelles'),
(208, 'SD', 'Sudan'),
(209, 'SE', 'Sweden'),
(210, 'SG', 'Singapore'),
(211, 'SH', 'Saint Helena'),
(212, 'SI', 'Slovenia'),
(213, 'SJ', 'Svalbard and Jan Mayen'),
(214, 'SK', 'Slovakia'),
(215, 'SL', 'Sierra Leone'),
(216, 'SM', 'San Marino'),
(217, 'SN', 'Senegal'),
(218, 'SO', 'Somalia'),
(219, 'SR', 'Suriname'),
(220, 'ST', 'São Tomé and Príncipe'),
(221, 'SU', 'Union of Soviet Socialist Republics'),
(222, 'SV', 'El Salvador'),
(223, 'SY', 'Syria'),
(224, 'SZ', 'Swaziland'),
(225, 'TC', 'Turks and Caicos Islands'),
(226, 'TD', 'Chad'),
(227, 'TF', 'French Southern Territories'),
(228, 'TG', 'Togo'),
(229, 'TH', 'Thailand'),
(230, 'TJ', 'Tajikistan'),
(231, 'TK', 'Tokelau'),
(232, 'TL', 'Timor-Leste'),
(233, 'TM', 'Turkmenistan'),
(234, 'TN', 'Tunisia'),
(235, 'TO', 'Tonga'),
(236, 'TR', 'Turkey'),
(237, 'TT', 'Trinidad and Tobago'),
(238, 'TV', 'Tuvalu'),
(239, 'TW', 'Taiwan'),
(240, 'TZ', 'Tanzania'),
(241, 'UA', 'Ukraine'),
(242, 'UG', 'Uganda'),
(243, 'UM', 'U.S. Minor Outlying Islands'),
(244, 'US', 'United States'),
(245, 'UY', 'Uruguay'),
(246, 'UZ', 'Uzbekistan'),
(247, 'VA', 'Vatican City'),
(248, 'VC', 'Saint Vincent and the Grenadines'),
(249, 'VD', 'North Vietnam'),
(250, 'VE', 'Venezuela'),
(251, 'VG', 'British Virgin Islands'),
(252, 'VI', 'U.S. Virgin Islands'),
(253, 'VN', 'Vietnam'),
(254, 'VU', 'Vanuatu'),
(255, 'WF', 'Wallis and Futuna'),
(256, 'WK', 'Wake Island'),
(257, 'WS', 'Samoa'),
(258, 'YD', 'People''s Democratic Republic of Yemen'),
(259, 'YE', 'Yemen'),
(260, 'YT', 'Mayotte'),
(261, 'ZA', 'South Africa'),
(262, 'ZM', 'Zambia'),
(263, 'ZW', 'Zimbabwe'),
(264, 'ZZ', 'Unknown or Invalid Region');

-- --------------------------------------------------------

--
-- Table structure for table `indian_states`
--

CREATE TABLE IF NOT EXISTS `indian_states` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` text NOT NULL,
  `capital` text NOT NULL,
  `unionTerritory` enum('Yes','No') NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=36 ;

--
-- Dumping data for table `indian_states`
--

INSERT INTO `indian_states` (`id`, `name`, `capital`, `unionTerritory`) VALUES
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
  `name` text NOT NULL,
  `controller` text NOT NULL,
  `action` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `service_groups`
--

CREATE TABLE IF NOT EXISTS `service_groups` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` text NOT NULL,
  `description` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` text NOT NULL,
  `dob` date NOT NULL,
  `gernder` enum('Male','Female') NOT NULL,
  `mobile` int(10) NOT NULL,
  `fax` text NOT NULL,
  `email` text NOT NULL,
  `password` text NOT NULL,
  `addressId` int(11) NOT NULL,
  `image` int(11) NOT NULL,
  `userTypeId` int(1) NOT NULL,
  `status` enum('1','0') NOT NULL DEFAULT '1',
  `createdDateTime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `createdBy` text NOT NULL,
  `sessionId` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `dob`, `gernder`, `mobile`, `fax`, `email`, `password`, `addressId`, `image`, `userTypeId`, `status`, `createdDateTime`, `createdBy`, `sessionId`) VALUES
(1, 'Rajesh Paneru', '1986-06-03', 'Male', 2147483647, '', 'rpaneru1986@gmail.com', 'rpaneru', 0, 0, 4, '1', '2015-04-05 18:00:32', '', '');

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
-- Table structure for table `user_service_access_control`
--

CREATE TABLE IF NOT EXISTS `user_service_access_control` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `serviceId` int(11) NOT NULL,
  `userType` enum('Guest','Registered User','Administrator','Super Administrator') NOT NULL,
  `description` text NOT NULL,
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
