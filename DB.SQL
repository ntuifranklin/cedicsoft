-- phpMyAdmin SQL Dump
-- version 4.4.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Aug 27, 2016 at 01:48 AM
-- Server version: 5.6.26
-- PHP Version: 5.6.12

SET FOREIGN_KEY_CHECKS=0;
SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";

--
-- Database: `cedicsoft`
--
CREATE DATABASE IF NOT EXISTS `cedicsoft` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `cedicsoft`;

-- --------------------------------------------------------

--
-- Table structure for table `account`
--
-- Creation: Aug 26, 2016 at 10:32 PM
--

DROP TABLE IF EXISTS `account`;
CREATE TABLE IF NOT EXISTS `account` (
  `accno` bigint(20) NOT NULL COMMENT 'Account number',
  `datetimeopen` datetime NOT NULL COMMENT 'date opened',
  `balance` float NOT NULL COMMENT 'current balance',
  `acctype` enum('checking','savings','autoloan','mortgage','credit card') NOT NULL COMMENT 'Account type',
  `apr` decimal(10,0) NOT NULL COMMENT 'Annual percentage rate if it''s a loan type account',
  `idowner` int(11) NOT NULL COMMENT 'id of owner(person or customer)that owns the account'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- RELATIONS FOR TABLE `account`:
--

-- --------------------------------------------------------

--
-- Table structure for table `owner`
--
-- Creation: Aug 26, 2016 at 10:47 PM
--

DROP TABLE IF EXISTS `owner`;
CREATE TABLE IF NOT EXISTS `owner` (
  `id` int(11) NOT NULL,
  `fullname` int(11) NOT NULL,
  `type` enum('Person','Company') NOT NULL,
  `street` text,
  `city` text,
  `stateId` int(11) DEFAULT NULL,
  `zipcode` tinytext,
  `apt` varchar(15) DEFAULT NULL,
  `personid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- RELATIONS FOR TABLE `owner`:
--

-- --------------------------------------------------------

--
-- Table structure for table `person`
--
-- Creation: Aug 26, 2016 at 10:53 PM
--

DROP TABLE IF EXISTS `person`;
CREATE TABLE IF NOT EXISTS `person` (
  `personid` int(11) NOT NULL COMMENT 'numeric Identifier for person',
  `fname` text NOT NULL COMMENT 'first name',
  `lname` text NOT NULL COMMENT 'last name',
  `gender` enum('Male','Female') NOT NULL COMMENT 'gender',
  `dob` date NOT NULL COMMENT 'date of birth',
  `datetimeopen` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT 'date time person created in database'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- RELATIONS FOR TABLE `person`:
--

-- --------------------------------------------------------

--
-- Table structure for table `transaction`
--
-- Creation: Aug 26, 2016 at 10:01 PM
--

DROP TABLE IF EXISTS `transaction`;
CREATE TABLE IF NOT EXISTS `transaction` (
  `transactionid` int(11) NOT NULL COMMENT 'transaction Identifier that identifies a transaction',
  `accno` text NOT NULL COMMENT 'Account number of the account on whcih the transaction is being made',
  `oldbalance` decimal(20,0) NOT NULL COMMENT 'Previous balance of the account on which transaction is being made',
  `newbalance` decimal(20,0) NOT NULL COMMENT 'new balance of the account on which transaction is being made',
  `type` enum('atm withdrawal','atm check deposit','atm cash deposit','online deposit','counter cash deposit') NOT NULL COMMENT 'type of transaction',
  `status` enum('pending','cleared','processing','insufficient funds') NOT NULL COMMENT 'status of the transaction',
  `datetime` datetime NOT NULL COMMENT 'timestamp of the transaction'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='transaction on accounts on any type';

--
-- RELATIONS FOR TABLE `transaction`:
--

-- --------------------------------------------------------

--
-- Table structure for table `user`
--
-- Creation: Aug 26, 2016 at 11:23 PM
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `userid` int(11) NOT NULL COMMENT 'userid',
  `username` varchar(20) NOT NULL COMMENT 'User can log in with their username or email directly',
  `email` varchar(20) NOT NULL COMMENT 'User can log in with their username or email directly',
  `password` varchar(100) NOT NULL COMMENT 'password will be hashed with a random text key',
  `haskkey` varchar(8) NOT NULL,
  `timeopen` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `lastlogin` datetime NOT NULL,
  `status` enum('blocked','available') NOT NULL COMMENT 'Status of the account. It can be blocked or available',
  `timeblocked` datetime DEFAULT NULL COMMENT 'Time at which it was blocked if account is blocked'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- RELATIONS FOR TABLE `user`:
--

--
-- Indexes for dumped tables
--

--
-- Indexes for table `account`
--
ALTER TABLE `account`
  ADD PRIMARY KEY (`accno`);

--
-- Indexes for table `owner`
--
ALTER TABLE `owner`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `transaction`
--
ALTER TABLE `transaction`
  ADD PRIMARY KEY (`transactionid`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`userid`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `haskkey` (`haskkey`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `owner`
--
ALTER TABLE `owner`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `userid` int(11) NOT NULL AUTO_INCREMENT COMMENT 'userid';SET FOREIGN_KEY_CHECKS=1;
COMMIT;
