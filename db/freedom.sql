-- phpMyAdmin SQL Dump
-- version 4.1.12
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Apr 08, 2014 at 10:58 PM
-- Server version: 5.5.37-log
-- PHP Version: 5.4.23

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `codingat_hinghorng`
--

-- --------------------------------------------------------

--
-- Table structure for table `hh_categories`
--

DROP TABLE IF EXISTS `hh_categories`;
CREATE TABLE IF NOT EXISTS `hh_categories` (
  `category_id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(45) DEFAULT NULL,
  `deleted` tinyint(1) DEFAULT '0',
  PRIMARY KEY (`category_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `hh_categories`
--

INSERT INTO `hh_categories` (`category_id`, `name`, `deleted`) VALUES
(1, 'happy', 0),
(2, 'lonely', 0),
(3, 'So Happy', 0);

-- --------------------------------------------------------

--
-- Table structure for table `hh_friends`
--

DROP TABLE IF EXISTS `hh_friends`;
CREATE TABLE IF NOT EXISTS `hh_friends` (
  `friend_id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`friend_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `hh_images`
--

DROP TABLE IF EXISTS `hh_images`;
CREATE TABLE IF NOT EXISTS `hh_images` (
  `image_id` int(11) NOT NULL AUTO_INCREMENT,
  `source` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`image_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `hh_images`
--

INSERT INTO `hh_images` (`image_id`, `source`) VALUES
(1, '1.png');

-- --------------------------------------------------------

--
-- Table structure for table `hh_menus`
--

DROP TABLE IF EXISTS `hh_menus`;
CREATE TABLE IF NOT EXISTS `hh_menus` (
  `uid` int(10) NOT NULL AUTO_INCREMENT,
  `menu_name` varchar(150) DEFAULT NULL,
  `alias` varchar(150) DEFAULT NULL,
  `status` tinyint(2) DEFAULT '0',
  `deleted` tinyint(2) DEFAULT '0',
  PRIMARY KEY (`uid`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `hh_menus`
--

INSERT INTO `hh_menus` (`uid`, `menu_name`, `alias`, `status`, `deleted`) VALUES
(1, 'categories', 'categories', 1, 0),
(2, 'questions', 'questions', 1, 0),
(3, 'users', 'users', 1, 0),
(4, 'referfriends', 'referfriends', 1, 0),
(5, 'ads', 'ads', 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `hh_questions`
--

DROP TABLE IF EXISTS `hh_questions`;
CREATE TABLE IF NOT EXISTS `hh_questions` (
  `q_uid` int(11) NOT NULL AUTO_INCREMENT,
  `question` varchar(200) DEFAULT NULL,
  `answer` varchar(45) DEFAULT NULL,
  `parent_q` int(10) NOT NULL DEFAULT '0',
  `cateID` int(10) DEFAULT NULL,
  `imageID` int(10) DEFAULT NULL,
  `deleted` tinyint(1) DEFAULT '0',
  PRIMARY KEY (`q_uid`),
  KEY `fk_hh_questions_hh_categories1_idx` (`cateID`),
  KEY `fk_hh_questions_hh_images1_idx` (`imageID`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=13 ;

--
-- Dumping data for table `hh_questions`
--

INSERT INTO `hh_questions` (`q_uid`, `question`, `answer`, `parent_q`, `cateID`, `imageID`, `deleted`) VALUES
(1, 'Are you sure you are happy? :)', 'No', 0, 1, NULL, 0),
(2, 'Does your dog makes you happy?', 'yes', 1, 1, NULL, 0),
(3, 'So, Are you think you are lonely?', 'no', 1, 1, NULL, 0),
(4, 'Is it talk to you?', 'yes', 2, 1, NULL, 0),
(5, 'Are you sure that today you are really lonely?', NULL, 0, 2, NULL, 0),
(6, 'Do you talks to him back?', 'yes', 4, 1, NULL, 0),
(7, 'You are a dog!', 'yes', 6, 1, 1, 0),
(8, 'Do you really lonely?', 'yes', 5, 2, NULL, 0),
(9, 'Do you often feel lonely? ', 'yes', 8, 2, NULL, 0),
(10, 'Do you nearly feel like this? ', 'yes', 9, 2, NULL, 0),
(11, 'How do you feel when testing?', 'no', 3, 1, NULL, 0),
(12, 'How crazy you are!!! :P', 'no', 11, 1, NULL, 0);

-- --------------------------------------------------------

--
-- Table structure for table `hh_referfriends`
--

DROP TABLE IF EXISTS `hh_referfriends`;
CREATE TABLE IF NOT EXISTS `hh_referfriends` (
  `referfriend_id` int(11) NOT NULL AUTO_INCREMENT,
  `friendID` int(10) DEFAULT NULL,
  `userID` int(10) DEFAULT NULL,
  PRIMARY KEY (`referfriend_id`),
  KEY `fk_hh_refterffriends_hh_users1_idx` (`userID`),
  KEY `fk_hh_refterffriends_hh_friends1_idx` (`friendID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `hh_users`
--

DROP TABLE IF EXISTS `hh_users`;
CREATE TABLE IF NOT EXISTS `hh_users` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `fname` varchar(45) DEFAULT NULL,
  `lname` varchar(45) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `username` varchar(100) DEFAULT NULL,
  `password` varchar(250) DEFAULT NULL,
  `deleted` tinyint(2) DEFAULT '0',
  PRIMARY KEY (`user_id`),
  UNIQUE KEY `username` (`username`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `hh_users`
--

INSERT INTO `hh_users` (`user_id`, `fname`, `lname`, `email`, `username`, `password`, `deleted`) VALUES
(1, 'chhing', 'hem', 'chhing@gmail.com', 'admin', '5f4dcc3b5aa765d61d8327deb882cf99', 0);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `hh_questions`
--
ALTER TABLE `hh_questions`
  ADD CONSTRAINT `fk_hh_questions_hh_categories1` FOREIGN KEY (`cateID`) REFERENCES `hh_categories` (`category_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_hh_questions_hh_images1` FOREIGN KEY (`imageID`) REFERENCES `hh_images` (`image_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `hh_referfriends`
--
ALTER TABLE `hh_referfriends`
  ADD CONSTRAINT `fk_hh_refterffriends_hh_friends1` FOREIGN KEY (`friendID`) REFERENCES `hh_friends` (`friend_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_hh_refterffriends_hh_users1` FOREIGN KEY (`userID`) REFERENCES `hh_users` (`user_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
