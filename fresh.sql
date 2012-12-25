-- phpMyAdmin SQL Dump
-- version 3.3.7deb7
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Dec 25, 2012 at 12:53 PM
-- Server version: 5.5.23
-- PHP Version: 5.4.7-1~dotdeb.0

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `u64digi_v4`
--

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(32) NOT NULL,
  `email` varchar(254) NOT NULL,
  `password` varchar(64) NOT NULL,
  `logins` int(10) unsigned NOT NULL DEFAULT '0',
  `last_login` int(10) unsigned DEFAULT NULL,
  `gender` enum('m','f') DEFAULT NULL,
  `birthday` int(10) unsigned DEFAULT NULL,
  `join_date` int(10) unsigned NOT NULL,
  `location` varchar(200) DEFAULT NULL,
  `referrer` int(11) DEFAULT NULL,
  `avatar_location` varchar(255) DEFAULT NULL,
  `banned` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`,`email`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `password`, `logins`, `last_login`, `gender`, `birthday`, `join_date`, `location`, `referrer`, `avatar_location`, `banned`) VALUES
(1, 'ChIkEn', 'ryanwebdev@gmail.com', '18b4491592d5e1b094b5307ae77e9f6bde8b6acf4e4d83c1eeb1f5d83d07d769', 0, 4294967295, 'm', 689752800, 1356457745, 'Bowling Green, OH', 0, 'http://www.64digits.com/users/ChIkEn/avatar05.gif', 0),
(2, 'sirxemic', 'pimscheurs@gmail.com', '6167d9b7f6d342b403442477947cf5de4c10342663d92a7d03957b30282a9606', 0, 0, 'm', NULL, 1356457745, 'Eindhoven, NL', NULL, 'http://www.64digits.com/users/sirxemic/croxer-cropped.png', 0),
(3, 'Cesque', 'cesque@gmail.com', '11de98019767838e5cbd9d23c732635d58d129c9374b5119ba28bf24cc125833', 0, NULL, 'm', NULL, 1356457745, 'Pinesol, Poland', NULL, 'http://www.64digits.com/users/Cesque/wolf_anim2.gif', 0),
(4, 'cyrusroberto', 'cyrusroberto@gmail.com', 'f52e98c1eeee84c1272f37cac8cce80de5a3fb972c23551c5f02fe781861fdc4', 0, NULL, 'm', NULL, 1356457745, 'California', NULL, 'http://www.64digits.com/users/CyrusRoberto/JoHumanAvvy_80x80.png', 0);
