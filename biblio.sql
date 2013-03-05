-- phpMyAdmin SQL Dump
-- version 2.9.1.1-Debian-3
-- http://www.phpmyadmin.net
-- 
-- Host: localhost
-- Generation Time: May 29, 2008 at 02:32 AM
-- Server version: 5.0.32
-- PHP Version: 5.2.0-8+etch10
-- 
-- Database: `biblio`
-- 

-- --------------------------------------------------------

-- 
-- Table structure for table `emprunts`
-- 

CREATE TABLE `loans` (
  `id` int(11) NOT NULL auto_increment,
  `reader_id` int(11) NOT NULL,
  `book_id` int(11) NOT NULL,
  `date_begin` date NOT NULL,
  `date_end` date NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=2 ;

-- 
-- Dumping data for table `emprunts`
-- 

INSERT INTO `loans` VALUES 
(1, 1, 1, '2008-05-29', '2008-07-29');

-- --------------------------------------------------------

-- 
-- Table structure for table `lecteurs`
-- 

CREATE TABLE `readers` (
  `id` int(11) NOT NULL auto_increment,
  `firstName` varchar(25) character set latin1 NOT NULL,
  `lastName` varchar(25) character set latin1 NOT NULL,
  `address` varchar(100) character set latin1 NOT NULL,
  `password` varchar(100) character set latin1 NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=2 ;

-- 
-- Dumping data for table `lecteurs`
-- 

INSERT INTO `readers`  VALUES 
(1, 'rafik', 'Mattiche', 'Adresse1', 'rafik');

-- --------------------------------------------------------

-- 
-- Table structure for table `livres`
-- 

CREATE TABLE `books` (
  `id` int(11) NOT NULL auto_increment,
  `title` varchar(25) character set latin1 NOT NULL,
  `author` varchar(100) character set latin1 NOT NULL,
  `category` varchar(25) character set latin1 NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=2 ;

-- 
-- Dumping data for table `livres`
-- 

INSERT INTO `books`  VALUES 
(1, 'Livre1', 'rafik ', 'Programmation');
