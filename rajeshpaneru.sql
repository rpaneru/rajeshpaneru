-- phpMyAdmin SQL Dump
-- version 3.5.2.2
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Apr 26, 2015 at 07:15 PM
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
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=16 ;

--
-- Dumping data for table `access_control`
--

INSERT INTO `access_control` (`id`, `serviceId`, `userTypeId`) VALUES
(1, 1, '1'),
(2, 2, '1'),
(3, 3, '1'),
(4, 4, '4'),
(5, 6, '4'),
(6, 7, '4'),
(7, 8, '4'),
(8, 9, '4'),
(9, 10, '4'),
(10, 11, '4'),
(11, 12, '4'),
(12, 13, '1'),
(13, 14, '1'),
(14, 15, '1'),
(15, 16, '1');

-- --------------------------------------------------------

--
-- Table structure for table `addresses`
--

CREATE TABLE IF NOT EXISTS `addresses` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `address` text NOT NULL,
  `city` varchar(255) NOT NULL,
  `district` varchar(255) NOT NULL,
  `stateId` int(11) NOT NULL,
  `countryId` int(11) NOT NULL,
  `zipCode` int(6) NOT NULL,
  `createdDateTime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `createdBy` varchar(255) NOT NULL,
  `sessionId` varchar(255) NOT NULL,
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
-- Table structure for table `email_relayer`
--

CREATE TABLE IF NOT EXISTS `email_relayer` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `fromEmail` varchar(255) NOT NULL,
  `relayerHost` varchar(255) NOT NULL,
  `relayerSsl` varchar(255) NOT NULL,
  `relayerUserName` varchar(255) NOT NULL,
  `relayerPassword` varchar(255) NOT NULL,
  `relayerPort` int(3) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `email_relayer`
--

INSERT INTO `email_relayer` (`id`, `fromEmail`, `relayerHost`, `relayerSsl`, `relayerUserName`, `relayerPassword`, `relayerPort`) VALUES
(1, 'support@rajeshpaneru.com', 'smtp.mandrillapp.com', 'tls', 'rpaneru1986@gmail.com', 'sVvyzUoDFPQKCKnDl_nYhw', 587);

-- --------------------------------------------------------

--
-- Table structure for table `email_templates`
--

CREATE TABLE IF NOT EXISTS `email_templates` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `emailType` varchar(255) NOT NULL,
  `emailTitle` text NOT NULL,
  `emailSubject` text NOT NULL,
  `emailBody` text NOT NULL,
  `templateStatus` enum('Active','Inactive') NOT NULL DEFAULT 'Active',
  `createdDateTime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `createdBy` varchar(255) NOT NULL,
  `sessionId` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `email_templates`
--

INSERT INTO `email_templates` (`id`, `emailType`, `emailTitle`, `emailSubject`, `emailBody`, `templateStatus`, `createdDateTime`, `createdBy`, `sessionId`) VALUES
(1, 'forgot-password', 'forgot-password', 'Forgot Password', '<html xmlns="http://www.w3.org/1999/xhtml">\n    <head>\n      <meta http-equiv="Content-Type" content="text/html; charset=utf-8">\n      <meta name="viewport" content="width=device-width, initial-scale=1.0">\n      <title>Rajesh Paneru - Reset Password</title>\n      <style type="text/css">\n         /* Client-specific Styles */\n         #outlook a {padding:0;} /* Force Outlook to provide a "view in browser" menu link. */\n         body{width:100% !important; -webkit-text-size-adjust:100%; -ms-text-size-adjust:100%; margin:0; padding:0;}\n         /* Prevent Webkit and Windows Mobile platforms from changing default font sizes, while not breaking desktop design. */\n         .ExternalClass {width:100%;} /* Force Hotmail to display emails at full width */\n         .ExternalClass, .ExternalClass p, .ExternalClass span, .ExternalClass font, .ExternalClass td, .ExternalClass div {line-height: 100%;} /* Force Hotmail to display normal line spacing.  More on that: http://www.emailonacid.com/forum/viewthread/43/ */\n         #backgroundTable {margin:0; padding:0; width:100% !important; line-height: 100% !important;}\n         img {outline:none; text-decoration:none;border:none; -ms-interpolation-mode: bicubic;}\n         a img {border:none;}\n         .image_fix {display:block;}\n         p {margin: 0px 0px !important;}\n         \n         table td {border-collapse: collapse;}\n         table { border-collapse:collapse; mso-table-lspace:0pt; mso-table-rspace:0pt; }\n         /*a {color: #e95353;text-decoration: none;text-decoration:none!important;}*/\n         /*STYLES*/\n         table[class=full] { width: 100%; clear: both; }\n         \n         /*################################################*/\n         /*IPAD STYLES*/\n         /*################################################*/\n         @media only screen and (max-width: 640px) {\n         a[href^="tel"], a[href^="sms"] {\n         text-decoration: none;\n         color: #ffffff; /* or whatever your want */\n         pointer-events: none;\n         cursor: default;\n         }\n         .mobile_link a[href^="tel"], .mobile_link a[href^="sms"] {\n         text-decoration: default;\n         color: #ffffff !important;\n         pointer-events: auto;\n         cursor: default;\n         }\n         table[class=devicewidth] {width: 440px!important;text-align:center!important;}\n         table[class=devicewidthinner] {width: 420px!important;text-align:center!important;}\n         table[class="sthide"]{display: none!important;}\n         img[class="bigimage"]{width: 420px!important;height:219px!important;}\n         img[class="col2img"]{width: 420px!important;height:258px!important;}\n         img[class="image-banner"]{width: 440px!important;height:106px!important;}\n         td[class="menu"]{text-align:center !important; padding: 0 0 10px 0 !important;}\n         td[class="logo"]{padding:10px 0 5px 0!important;margin: 0 auto !important;}\n         img[class="logo"]{padding:0!important;margin: 0 auto !important;}\n\n         }\n         /*##############################################*/\n         /*IPHONE STYLES*/\n         /*##############################################*/\n         @media only screen and (max-width: 480px) {\n         a[href^="tel"], a[href^="sms"] {\n         text-decoration: none;\n         color: #ffffff; /* or whatever your want */\n         pointer-events: none;\n         cursor: default;\n         }\n         .mobile_link a[href^="tel"], .mobile_link a[href^="sms"] {\n         text-decoration: default;\n         color: #ffffff !important; \n         pointer-events: auto;\n         cursor: default;\n         }\n         table[class=devicewidth] {width: 280px!important;text-align:center!important;}\n         table[class=devicewidthinner] {width: 260px!important;text-align:center!important;}\n         table[class="sthide"]{display: none!important;}\n         img[class="bigimage"]{width: 260px!important;height:136px!important;}\n         img[class="col2img"]{width: 260px!important;height:160px!important;}\n         img[class="image-banner"]{width: 280px!important;height:68px!important;}\n         \n         }\n      </style>\n\n      \n   </head>\n<body>\n<div class="block">\n   <!-- Start of preheader -->\n   <table width="100%" bgcolor="#f6f4f5" cellpadding="0" cellspacing="0" border="0" id="backgroundTable" st-sortable="preheader">\n      <tbody>\n         <tr>\n            <td width="100%">\n               <table width="580" cellpadding="0" cellspacing="0" border="0" align="center" class="devicewidth">\n                  <tbody>\n                     <!-- Spacing -->\n                     <tr>\n                        <td width="100%" height="5"></td>\n                     </tr>\n                     <!-- Spacing -->\n                     <tr>\n                        <td align="right" valign="middle" style="font-family: Helvetica, arial, sans-serif; font-size: 10px;color: #999999" st-content="preheader">\n                           If you cannot read this email, please  <a class="hlite" href="#" style="text-decoration: none; color: #0db9ea">click here</a> \n                        </td>\n                     </tr>\n                     <!-- Spacing -->\n                     <tr>\n                        <td width="100%" height="5"></td>\n                     </tr>\n                     <!-- Spacing -->\n                  </tbody>\n               </table>\n            </td>\n         </tr>\n      </tbody>\n   </table>\n   <!-- End of preheader -->\n</div>\n<div class="block">\n   <!-- start of header -->\n   <table width="100%" bgcolor="#f6f4f5" cellpadding="0" cellspacing="0" border="0" id="backgroundTable" st-sortable="header">\n      <tbody>\n         <tr>\n            <td>\n               <table width="580" bgcolor="#0db9ea" cellpadding="0" cellspacing="0" border="0" align="center" class="devicewidth" hlitebg="edit" shadow="edit">\n                  <tbody>\n                     <tr>\n                        <td>\n                           <!-- logo -->\n                           <table width="180" cellpadding="0" cellspacing="0" border="0" align="left" class="devicewidth">\n                              <tbody>\n                                 <tr>\n                                    <td valign="middle" width="270" style="padding: 10px 0 10px 20px;" class="logo">\n                                       <div class="imgpop">\n                                          <a href="#"><img src="logo.png" alt="logo" border="0" style="display:block; border:none; outline:none; text-decoration:none;" st-image="edit" class="logo"></a>\n                                       </div>\n                                    </td>\n                                 </tr>\n                              </tbody>\n                           </table>\n                           <!-- End of logo -->\n                           <!-- menu -->\n                           <table width="380" cellpadding="0" cellspacing="0" border="0" align="right" class="devicewidth">\n                              <tbody>\n                                 <tr>\n                                     <td width="280" valign="middle" style="font-family: Helvetica, Arial, sans-serif;font-size: 14px; color: #ffffff;line-height: 24px; padding: 10px 0;" align="right" class="menu" st-content="menu">\n                                       <a href="#" style="text-decoration: none; color: #ffffff;">HOME</a>\n                                       &nbsp;|&nbsp;\n                                       <a href="#" style="text-decoration: none; color: #ffffff;">ABOUT</a>\n                                       &nbsp;|&nbsp;\n                                       <a href="#" style="text-decoration: none; color: #ffffff;">SERVICE</a>\n                                       &nbsp;|&nbsp;\n                                       <a href="#" style="text-decoration: none; color: #ffffff;">CONTACT</a>\n                                    </td>                                    \n                                 </tr>\n                              </tbody>\n                           </table>\n                           <!-- End of Menu -->\n                        </td>\n                     </tr>\n                  </tbody>\n               </table>\n            </td>\n         </tr>\n      </tbody>\n   </table>\n   <!-- end of header -->\n</div><div class="block">\n   <!-- image + text -->\n   <table width="100%" bgcolor="#f6f4f5" cellpadding="0" cellspacing="0" border="0" id="backgroundTable" st-sortable="bigimage">\n      <tbody>\n         <tr>\n            <td>\n               <table bgcolor="#ffffff" width="580" align="center" cellspacing="0" cellpadding="0" border="0" class="devicewidth" modulebg="edit">\n                  <tbody>\n                     <tr>\n                        <td width="100%" height="20"></td>\n                     </tr>\n                     <tr>\n                        <td>\n                           <table width="540" align="center" cellspacing="0" cellpadding="0" border="0" class="devicewidthinner">\n                              <tbody>                                 \n                                 <!-- title -->\n                                 <tr>\n                                    <td style="font-family: Helvetica, arial, sans-serif; font-size: 18px; color: #333333; text-align:left;line-height: 20px;" st-title="rightimage-title">\n                                    RESET PASSWORD\n                                    </td>\n                                 </tr>\n                                 <!-- end of title -->\n                                 <!-- Spacing -->\n                                 <tr>\n                                    <td width="100%" height="20"></td>\n                                 </tr>\n                                 <!-- Spacing -->\n                                 <!-- content -->\n                                 <tr>\n                                    <td style="font-family: Helvetica, arial, sans-serif; font-size: 13px; color: #95a5a6; text-align:left;line-height: 24px;" st-content="rightimage-paragraph">\n                                       Hello {{{User Name}}},<br />\n                                        <br />\n                                        We have received new password request for your account.<br />\n                                        If this request was initiated by you, please click on following link or submit following form and change your password:<br />\n                                        <a class="hlite" style="text-decoration: none; color: #0db9ea" href="{{{Link}}}">{{{Link}}}</a><br />\n                                        <br />\n                                        This request is valid for only one hour.<br />\n                                        <br />\n                                        Best regards,<br />\n                                        Support team\n                                    </td>\n                                 </tr>\n                                 <!-- end of content -->\n                                 <!-- Spacing -->\n                                 <tr>\n                                    <td width="100%" height="10"></td>\n                                 </tr>\n                                 <tr>\n                                    <td width="100%" height="20"></td>\n                                 </tr>\n                                 <!-- Spacing -->\n                              </tbody>\n                           </table>\n                        </td>\n                     </tr>\n                  </tbody>\n               </table>\n            </td>\n         </tr>\n      </tbody>\n   </table>\n</div>\n<div class="block">\n   <!-- Start of preheader -->\n   <table width="100%" bgcolor="#f6f4f5" cellpadding="0" cellspacing="0" border="0" id="backgroundTable" st-sortable="postfooter">\n      <tbody>\n         <tr>\n            <td width="100%">\n               <table width="580" cellpadding="0" cellspacing="0" border="0" align="center" class="devicewidth">\n                  <tbody>\n                     <!-- Spacing -->\n                     <tr>\n                        <td width="100%" height="5"></td>\n                     </tr>\n                     <!-- Spacing -->\n                     <tr>\n                        <td align="center" valign="middle" style="font-family: Helvetica, arial, sans-serif; font-size: 10px;color: #999999" st-content="preheader">\n                            All right reserved &copy;2014-2015 Rajesh Paneru\n                        </td>\n                     </tr>\n                     <!-- Spacing -->\n                     <tr>\n                        <td width="100%" height="5"></td>\n                     </tr>\n                     <!-- Spacing -->\n                  </tbody>\n               </table>\n            </td>\n         </tr>\n      </tbody>\n   </table>\n   <!-- End of preheader -->\n</div>\n\n</body></html>\n', 'Active', '2015-04-26 10:46:55', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `indian_states`
--

CREATE TABLE IF NOT EXISTS `indian_states` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `stateName` varchar(255) NOT NULL,
  `capitalName` varchar(255) NOT NULL,
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
-- Table structure for table `reset_password`
--

CREATE TABLE IF NOT EXISTS `reset_password` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `userEmail` varchar(255) NOT NULL,
  `resetKey` varchar(255) NOT NULL,
  `createdDateTime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `createdBy` varchar(255) NOT NULL,
  `sessionId` varchar(255) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `resetKey` (`resetKey`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `reset_password`
--

INSERT INTO `reset_password` (`id`, `userEmail`, `resetKey`, `createdDateTime`, `createdBy`, `sessionId`) VALUES
(1, 'rpaneru1986@gmail.com', '6a451ec731bb7038b0797c7d7a5ed4c6', '2015-04-26 03:36:27', 'rpaneru1986@gmail.com', '');

-- --------------------------------------------------------

--
-- Table structure for table `services`
--

CREATE TABLE IF NOT EXISTS `services` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `serviceGroupId` int(11) NOT NULL,
  `serviceName` varchar(256) NOT NULL,
  `controller` varchar(255) NOT NULL,
  `action` varchar(255) NOT NULL,
  `serviceDescription` text NOT NULL,
  `serviceStatus` enum('Active','Inactive') NOT NULL DEFAULT 'Inactive',
  `createdDateTime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `createdBy` varchar(255) NOT NULL,
  `sessionId` varchar(255) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `serviceName` (`serviceName`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=17 ;

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
(11, 3, 'List-services', 'Authorization\\Controller\\Services', 'list-services', '', 'Active', '2015-04-19 17:32:33', '', ''),
(12, 1, 'LogOut', 'Users\\Controller\\Index', 'log-out', '', 'Active', '2015-04-26 02:05:26', '', ''),
(13, 1, 'Forgot Password', 'Users\\Controller\\Index', 'forgot-password', '', 'Active', '2015-04-26 02:40:08', '', ''),
(14, 1, 'Reset Password', 'Users\\Controller\\Index', 'reset-password', '', 'Active', '2015-04-26 03:01:41', '', ''),
(15, 1, 'Process Reset Password', 'Users\\Controller\\Index', 'process-reset-password', '', 'Active', '2015-04-26 03:37:53', '', ''),
(16, 1, 'Process Forgot Password', 'Users\\Controller\\Index', 'process-forgot-password', '', 'Active', '2015-04-26 04:46:43', '', '');

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
  `createdBy` varchar(255) NOT NULL,
  `sessionId` varchar(255) NOT NULL,
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
  `userFax` varchar(255) NOT NULL,
  `userEmail` text NOT NULL,
  `userPassword` varchar(255) NOT NULL,
  `userAddressId` int(11) NOT NULL,
  `userImage` varchar(255) NOT NULL,
  `userTypeId` int(1) NOT NULL,
  `userStatus` enum('Active','Inactive') NOT NULL DEFAULT 'Inactive',
  `createdDateTime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `createdBy` varchar(255) NOT NULL,
  `sessionId` varchar(255) NOT NULL,
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
  `userType` varchar(255) NOT NULL,
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
