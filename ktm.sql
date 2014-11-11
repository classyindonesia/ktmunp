-- phpMyAdmin SQL Dump
-- version 3.4.10.1deb1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Apr 17, 2013 at 01:07 PM
-- Server version: 5.5.29
-- PHP Version: 5.3.10-1ubuntu3.5

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `ktm`
--

-- --------------------------------------------------------

--
-- Table structure for table `ci_sessions`
--

CREATE TABLE IF NOT EXISTS `ci_sessions` (
  `session_id` varchar(40) NOT NULL DEFAULT '0',
  `ip_address` varchar(16) NOT NULL DEFAULT '0',
  `user_agent` varchar(120) NOT NULL,
  `last_activity` int(10) unsigned NOT NULL DEFAULT '0',
  `user_data` text NOT NULL,
  PRIMARY KEY (`session_id`),
  KEY `last_activity_idx` (`last_activity`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ci_sessions`
--

INSERT INTO `ci_sessions` (`session_id`, `ip_address`, `user_agent`, `last_activity`, `user_data`) VALUES
('de033ea89436cdc8584e704b97ec542b', '192.168.2.100', 'Mozilla/5.0 (X11; Ubuntu; Linux i686; rv:18.0) Gecko/20100101 Firefox/18.0', 1366178549, 'a:6:{s:9:"user_data";s:0:"";s:2:"id";s:1:"1";s:5:"login";b:1;s:8:"username";s:5:"admin";s:5:"email";s:19:"admin@example.cz.cc";s:17:"ref_level_user_id";s:1:"1";}');

-- --------------------------------------------------------

--
-- Table structure for table `log_user`
--

CREATE TABLE IF NOT EXISTS `log_user` (
  `id` int(20) NOT NULL AUTO_INCREMENT,
  `ket` varchar(300) NOT NULL,
  `tgl` datetime NOT NULL,
  `aktif` tinyint(1) NOT NULL DEFAULT '1',
  `op` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=298 ;

--
-- Dumping data for table `log_user`
--

INSERT INTO `log_user` (`id`, `ket`, `tgl`, `aktif`, `op`) VALUES
(1, 'Mahasiswa dengan NIM <b>8023</bi> sudah ada dalam database. maka data tdk di import ke db', '2013-02-09 09:29:13', 1, 'admin 2013-02-09 09:29:13'),
(2, 'Mahasiswa dengan NIM <b>8024</bi> sudah ada dalam database. maka data tdk di import ke db', '2013-02-09 09:29:13', 1, 'admin 2013-02-09 09:29:13'),
(3, 'Mahasiswa dengan NIM <b>2112</bi> sudah ada dalam database. maka data tdk di import ke db', '2013-02-09 09:29:13', 1, 'admin 2013-02-09 09:29:13'),
(4, 'Mahasiswa dengan NIM <b>8023</bi> sudah ada dalam database. maka data tdk di import ke db', '2013-02-09 10:07:01', 1, 'admin 2013-02-09 10:07:01'),
(5, 'Mahasiswa dengan NIM <b>8024</bi> sudah ada dalam database. maka data tdk di import ke db', '2013-02-09 10:07:01', 1, 'admin 2013-02-09 10:07:01'),
(6, 'Mahasiswa dengan NIM <b>2112</bi> sudah ada dalam database. maka data tdk di import ke db', '2013-02-09 10:07:01', 1, 'admin 2013-02-09 10:07:01'),
(7, 'warning! login error from 127.0.0.1 | user :dsa', '2013-02-09 12:38:01', 1, ' 2013-02-09 12:38:01'),
(8, 'warning! login error from 127.0.0.1 | user :admin', '2013-02-09 12:39:13', 1, ' 2013-02-09 12:39:13'),
(9, '<span style=''color: red''>warning! login error from 127.0.0.1 | user :root</span>', '2013-02-09 12:43:17', 1, ' 2013-02-09 12:43:17'),
(10, '<span style=''color: green''>login success! from 127.0.0.1 | user :admin</span>', '2013-02-09 13:14:15', 1, 'admin 2013-02-09 13:14:15'),
(11, '<span style=''color: green''>login success! from 127.0.0.1 | user :admin</span>', '2013-02-11 07:22:53', 1, 'admin 2013-02-11 07:22:53'),
(12, 'user admin telah berhasil menambahkan batch dgn tgl aktif 12 Juni 2013', '2013-02-11 09:28:40', 1, 'admin 2013-02-11 09:28:40'),
(13, 'user admin berhasil mencetak KTM', '2013-02-11 09:54:09', 1, 'admin 2013-02-11 09:54:09'),
(14, 'user admin berhasil mencetak KTM', '2013-02-11 10:29:08', 1, 'admin 2013-02-11 10:29:08'),
(15, 'user admin berhasil mencetak KTM', '2013-02-11 10:31:27', 1, 'admin 2013-02-11 10:31:27'),
(16, 'user admin berhasil mencetak KTM', '2013-02-11 10:33:17', 1, 'admin 2013-02-11 10:33:17'),
(17, 'user admin berhasil mencetak KTM', '2013-02-11 10:33:39', 1, 'admin 2013-02-11 10:33:39'),
(18, 'user admin berhasil mencetak KTM', '2013-02-11 10:36:05', 1, 'admin 2013-02-11 10:36:05'),
(19, 'user admin berhasil mencetak KTM', '2013-02-11 10:36:31', 1, 'admin 2013-02-11 10:36:31'),
(20, 'user admin berhasil mencetak KTM', '2013-02-11 10:36:55', 1, 'admin 2013-02-11 10:36:55'),
(21, 'user admin berhasil mencetak KTM', '2013-02-11 10:37:00', 1, 'admin 2013-02-11 10:37:00'),
(22, 'user admin berhasil mencetak KTM', '2013-02-11 10:37:11', 1, 'admin 2013-02-11 10:37:11'),
(23, '<span style=''color: green''>login success! from 127.0.0.1 | user :admin</span>', '2013-02-11 11:05:18', 1, 'admin 2013-02-11 11:05:18'),
(24, 'user admin berhasil mencetak KTM', '2013-02-11 11:31:41', 1, 'admin 2013-02-11 11:31:41'),
(25, 'user admin berhasil mencetak KTM', '2013-02-11 11:32:05', 1, 'admin 2013-02-11 11:32:05'),
(26, 'user admin berhasil mencetak KTM', '2013-02-11 11:41:03', 1, 'admin 2013-02-11 11:41:03'),
(27, 'user admin berhasil mencetak KTM', '2013-02-11 11:44:17', 1, 'admin 2013-02-11 11:44:17'),
(28, 'user admin berhasil mencetak KTM', '2013-02-11 11:49:08', 1, 'admin 2013-02-11 11:49:08'),
(29, 'user admin berhasil mencetak KTM', '2013-02-11 11:50:36', 1, 'admin 2013-02-11 11:50:36'),
(30, 'user admin berhasil mencetak KTM', '2013-02-11 11:50:45', 1, 'admin 2013-02-11 11:50:45'),
(31, 'user admin berhasil mencetak KTM', '2013-02-11 11:51:11', 1, 'admin 2013-02-11 11:51:11'),
(32, 'user admin berhasil mencetak KTM', '2013-02-11 11:51:51', 1, 'admin 2013-02-11 11:51:51'),
(33, 'user admin berhasil meng-update mahasiswa dgn NIM 3146', '2013-02-11 11:52:46', 1, 'admin 2013-02-11 11:52:46'),
(34, 'user admin berhasil meng-update mahasiswa dgn NIM 3146', '2013-02-11 11:53:29', 1, 'admin 2013-02-11 11:53:29'),
(35, 'user admin berhasil mencetak KTM', '2013-02-11 11:55:14', 1, 'admin 2013-02-11 11:55:14'),
(36, 'user admin berhasil mencetak KTM', '2013-02-11 12:01:56', 1, 'admin 2013-02-11 12:01:56'),
(37, 'user admin berhasil mencetak KTM', '2013-02-11 12:02:25', 1, 'admin 2013-02-11 12:02:25'),
(38, 'user admin berhasil mencetak KTM', '2013-02-11 12:08:59', 1, 'admin 2013-02-11 12:08:59'),
(39, 'user admin berhasil mencetak KTM', '2013-02-11 12:11:13', 1, 'admin 2013-02-11 12:11:13'),
(40, 'user admin berhasil mencetak KTM', '2013-02-11 12:13:29', 1, 'admin 2013-02-11 12:13:29'),
(41, 'user admin berhasil mencetak KTM', '2013-02-11 12:16:09', 1, 'admin 2013-02-11 12:16:09'),
(42, '<span style=''color: green''>login success! from 127.0.0.1 | user :admin</span>', '2013-02-11 12:18:17', 1, 'admin 2013-02-11 12:18:17'),
(43, 'user admin berhasil mencetak KTM', '2013-02-11 12:20:02', 1, 'admin 2013-02-11 12:20:02'),
(44, 'user admin berhasil mencetak KTM', '2013-02-11 12:23:51', 1, 'admin 2013-02-11 12:23:51'),
(45, 'user admin berhasil mencetak KTM', '2013-02-11 12:28:24', 1, 'admin 2013-02-11 12:28:24'),
(46, 'user admin berhasil mencetak KTM', '2013-02-11 12:31:57', 1, 'admin 2013-02-11 12:31:57'),
(47, 'user admin berhasil mencetak KTM', '2013-02-11 12:41:55', 1, 'admin 2013-02-11 12:41:55'),
(48, 'user admin berhasil mencetak KTM', '2013-02-11 12:44:15', 1, 'admin 2013-02-11 12:44:15'),
(49, 'user admin berhasil mencetak KTM', '2013-02-11 12:52:50', 1, 'admin 2013-02-11 12:52:50'),
(50, 'user admin berhasil meng-update mahasiswa dgn NIM 8023', '2013-02-11 13:24:57', 1, 'admin 2013-02-11 13:24:57'),
(51, 'user admin berhasil mencetak KTM', '2013-02-11 13:25:11', 1, 'admin 2013-02-11 13:25:11'),
(52, 'user admin telah menghapus mahasiswa dgn NIM Array', '2013-02-11 13:40:58', 1, 'admin 2013-02-11 13:40:58'),
(53, 'user admin telah menghapus mahasiswa dgn NIM Array', '2013-02-11 13:40:58', 1, 'admin 2013-02-11 13:40:58'),
(54, 'user admin telah menghapus mahasiswa dgn NIM Array', '2013-02-11 13:40:58', 1, 'admin 2013-02-11 13:40:58'),
(55, 'user admin telah menghapus mahasiswa dgn NIM Array', '2013-02-11 13:40:58', 1, 'admin 2013-02-11 13:40:58'),
(56, 'user admin telah menghapus mahasiswa dgn NIM Array', '2013-02-11 13:40:58', 1, 'admin 2013-02-11 13:40:58'),
(57, 'user admin telah menghapus mahasiswa dgn NIM Array', '2013-02-11 13:40:58', 1, 'admin 2013-02-11 13:40:58'),
(58, 'user admin telah menghapus mahasiswa dgn NIM Array', '2013-02-11 13:40:59', 1, 'admin 2013-02-11 13:40:59'),
(59, 'user admin telah menghapus mahasiswa dgn NIM Array', '2013-02-11 13:40:59', 1, 'admin 2013-02-11 13:40:59'),
(60, 'user admin telah menghapus mahasiswa dgn NIM Array', '2013-02-11 13:40:59', 1, 'admin 2013-02-11 13:40:59'),
(61, 'user admin telah menghapus mahasiswa dgn NIM Array', '2013-02-11 13:40:59', 1, 'admin 2013-02-11 13:40:59'),
(62, 'user admin telah menghapus mahasiswa dgn NIM Array', '2013-02-11 13:40:59', 1, 'admin 2013-02-11 13:40:59'),
(63, 'user admin telah menghapus mahasiswa dgn NIM Array', '2013-02-11 13:40:59', 1, 'admin 2013-02-11 13:40:59'),
(64, 'user admin telah menghapus mahasiswa dgn NIM Array', '2013-02-11 13:40:59', 1, 'admin 2013-02-11 13:40:59'),
(65, 'user admin telah menghapus mahasiswa dgn NIM Array', '2013-02-11 13:40:59', 1, 'admin 2013-02-11 13:40:59'),
(66, 'user admin telah menghapus mahasiswa dgn NIM Array', '2013-02-11 13:40:59', 1, 'admin 2013-02-11 13:40:59'),
(67, 'user admin telah menghapus mahasiswa dgn NIM Array', '2013-02-11 13:40:59', 1, 'admin 2013-02-11 13:40:59'),
(68, 'user admin telah menghapus mahasiswa dgn NIM Array', '2013-02-11 13:41:00', 1, 'admin 2013-02-11 13:41:00'),
(69, 'user admin telah menghapus mahasiswa dgn NIM Array', '2013-02-11 13:41:00', 1, 'admin 2013-02-11 13:41:00'),
(70, 'user admin telah menghapus mahasiswa dgn NIM Array', '2013-02-11 13:41:00', 1, 'admin 2013-02-11 13:41:00'),
(71, 'user admin telah menghapus mahasiswa dgn NIM Array', '2013-02-11 13:41:00', 1, 'admin 2013-02-11 13:41:00'),
(72, 'user admin telah menghapus mahasiswa dgn NIM Array', '2013-02-11 13:41:06', 1, 'admin 2013-02-11 13:41:06'),
(73, 'user admin telah menghapus mahasiswa dgn NIM Array', '2013-02-11 13:41:06', 1, 'admin 2013-02-11 13:41:06'),
(74, 'user admin telah menghapus mahasiswa dgn NIM Array', '2013-02-11 13:41:06', 1, 'admin 2013-02-11 13:41:06'),
(75, 'user admin telah menghapus mahasiswa dgn NIM Array', '2013-02-11 13:41:06', 1, 'admin 2013-02-11 13:41:06'),
(76, 'user admin telah menghapus mahasiswa dgn NIM Array', '2013-02-11 13:41:06', 1, 'admin 2013-02-11 13:41:06'),
(77, 'user admin telah menghapus mahasiswa dgn NIM Array', '2013-02-11 13:41:06', 1, 'admin 2013-02-11 13:41:06'),
(78, 'user admin telah menghapus mahasiswa dgn NIM Array', '2013-02-11 13:41:06', 1, 'admin 2013-02-11 13:41:06'),
(79, 'user admin telah menghapus mahasiswa dgn NIM Array', '2013-02-11 13:41:06', 1, 'admin 2013-02-11 13:41:06'),
(80, 'user admin telah menghapus mahasiswa dgn NIM Array', '2013-02-11 13:41:07', 1, 'admin 2013-02-11 13:41:07'),
(81, 'user admin telah menghapus mahasiswa dgn NIM Array', '2013-02-11 13:41:07', 1, 'admin 2013-02-11 13:41:07'),
(82, 'user admin telah menghapus mahasiswa dgn NIM Array', '2013-02-11 13:41:07', 1, 'admin 2013-02-11 13:41:07'),
(83, 'user admin telah menghapus mahasiswa dgn NIM Array', '2013-02-11 13:41:07', 1, 'admin 2013-02-11 13:41:07'),
(84, 'user admin telah menghapus mahasiswa dgn NIM Array', '2013-02-11 13:41:07', 1, 'admin 2013-02-11 13:41:07'),
(85, 'user admin telah menghapus mahasiswa dgn NIM Array', '2013-02-11 13:41:07', 1, 'admin 2013-02-11 13:41:07'),
(86, 'user admin telah menghapus mahasiswa dgn NIM Array', '2013-02-11 13:41:07', 1, 'admin 2013-02-11 13:41:07'),
(87, 'user admin telah menghapus mahasiswa dgn NIM Array', '2013-02-11 13:41:07', 1, 'admin 2013-02-11 13:41:07'),
(88, 'user admin telah menghapus mahasiswa dgn NIM Array', '2013-02-11 13:41:08', 1, 'admin 2013-02-11 13:41:08'),
(89, 'user admin telah menghapus mahasiswa dgn NIM Array', '2013-02-11 13:41:08', 1, 'admin 2013-02-11 13:41:08'),
(90, 'user admin telah menghapus mahasiswa dgn NIM Array', '2013-02-11 13:41:08', 1, 'admin 2013-02-11 13:41:08'),
(91, 'user admin telah menghapus mahasiswa dgn NIM Array', '2013-02-11 13:41:09', 1, 'admin 2013-02-11 13:41:09'),
(92, 'user admin telah menghapus mahasiswa dgn NIM Array', '2013-02-11 13:41:14', 1, 'admin 2013-02-11 13:41:14'),
(93, 'user admin telah menghapus mahasiswa dgn NIM Array', '2013-02-11 13:41:14', 1, 'admin 2013-02-11 13:41:14'),
(94, 'user admin telah menghapus mahasiswa dgn NIM Array', '2013-02-11 13:41:14', 1, 'admin 2013-02-11 13:41:14'),
(95, 'user admin telah menghapus mahasiswa dgn NIM Array', '2013-02-11 13:41:14', 1, 'admin 2013-02-11 13:41:14'),
(96, 'user admin telah menghapus mahasiswa dgn NIM Array', '2013-02-11 13:41:14', 1, 'admin 2013-02-11 13:41:14'),
(97, 'user admin telah menghapus mahasiswa dgn NIM Array', '2013-02-11 13:41:14', 1, 'admin 2013-02-11 13:41:14'),
(98, 'user admin telah menghapus mahasiswa dgn NIM Array', '2013-02-11 13:41:14', 1, 'admin 2013-02-11 13:41:14'),
(99, 'user admin telah menghapus mahasiswa dgn NIM Array', '2013-02-11 13:41:14', 1, 'admin 2013-02-11 13:41:14'),
(100, 'user admin telah menghapus mahasiswa dgn NIM Array', '2013-02-11 13:41:14', 1, 'admin 2013-02-11 13:41:14'),
(101, 'user admin telah menghapus mahasiswa dgn NIM Array', '2013-02-11 13:41:15', 1, 'admin 2013-02-11 13:41:15'),
(102, 'user admin telah menghapus mahasiswa dgn NIM Array', '2013-02-11 13:41:15', 1, 'admin 2013-02-11 13:41:15'),
(103, 'user admin telah menghapus mahasiswa dgn NIM Array', '2013-02-11 13:41:15', 1, 'admin 2013-02-11 13:41:15'),
(104, 'user admin telah menghapus mahasiswa dgn NIM Array', '2013-02-11 13:41:15', 1, 'admin 2013-02-11 13:41:15'),
(105, 'user admin telah menghapus mahasiswa dgn NIM Array', '2013-02-11 13:41:15', 1, 'admin 2013-02-11 13:41:15'),
(106, 'user admin telah menghapus mahasiswa dgn NIM Array', '2013-02-11 13:41:15', 1, 'admin 2013-02-11 13:41:15'),
(107, 'user admin telah menghapus mahasiswa dgn NIM Array', '2013-02-11 13:41:15', 1, 'admin 2013-02-11 13:41:15'),
(108, 'user admin telah menghapus mahasiswa dgn NIM Array', '2013-02-11 13:41:15', 1, 'admin 2013-02-11 13:41:15'),
(109, 'user admin telah menghapus mahasiswa dgn NIM Array', '2013-02-11 13:41:15', 1, 'admin 2013-02-11 13:41:15'),
(110, 'user admin telah menghapus mahasiswa dgn NIM Array', '2013-02-11 13:41:16', 1, 'admin 2013-02-11 13:41:16'),
(111, 'user admin telah menghapus mahasiswa dgn NIM Array', '2013-02-11 13:41:16', 1, 'admin 2013-02-11 13:41:16'),
(112, 'user admin telah menghapus mahasiswa dgn NIM Array', '2013-02-11 13:41:21', 1, 'admin 2013-02-11 13:41:21'),
(113, 'user admin telah menghapus mahasiswa dgn NIM Array', '2013-02-11 13:41:21', 1, 'admin 2013-02-11 13:41:21'),
(114, 'user admin telah menghapus mahasiswa dgn NIM Array', '2013-02-11 13:41:21', 1, 'admin 2013-02-11 13:41:21'),
(115, 'user admin telah menghapus mahasiswa dgn NIM Array', '2013-02-11 13:41:21', 1, 'admin 2013-02-11 13:41:21'),
(116, 'user admin telah menghapus mahasiswa dgn NIM Array', '2013-02-11 13:41:21', 1, 'admin 2013-02-11 13:41:21'),
(117, 'user admin telah menghapus mahasiswa dgn NIM Array', '2013-02-11 13:41:21', 1, 'admin 2013-02-11 13:41:21'),
(118, 'user admin telah menghapus mahasiswa dgn NIM Array', '2013-02-11 13:41:21', 1, 'admin 2013-02-11 13:41:21'),
(119, 'user admin telah menghapus mahasiswa dgn NIM Array', '2013-02-11 13:41:22', 1, 'admin 2013-02-11 13:41:22'),
(120, 'user admin telah menghapus mahasiswa dgn NIM Array', '2013-02-11 13:41:22', 1, 'admin 2013-02-11 13:41:22'),
(121, 'user admin telah menghapus mahasiswa dgn NIM Array', '2013-02-11 13:41:22', 1, 'admin 2013-02-11 13:41:22'),
(122, 'user admin telah menghapus mahasiswa dgn NIM Array', '2013-02-11 13:41:22', 1, 'admin 2013-02-11 13:41:22'),
(123, 'user admin telah menghapus mahasiswa dgn NIM Array', '2013-02-11 13:41:22', 1, 'admin 2013-02-11 13:41:22'),
(124, 'user admin telah menghapus mahasiswa dgn NIM Array', '2013-02-11 13:41:22', 1, 'admin 2013-02-11 13:41:22'),
(125, 'user admin telah menghapus mahasiswa dgn NIM Array', '2013-02-11 13:41:22', 1, 'admin 2013-02-11 13:41:22'),
(126, 'user admin telah menghapus mahasiswa dgn NIM Array', '2013-02-11 13:41:22', 1, 'admin 2013-02-11 13:41:22'),
(127, 'user admin telah menghapus mahasiswa dgn NIM Array', '2013-02-11 13:41:22', 1, 'admin 2013-02-11 13:41:22'),
(128, 'user admin telah menghapus mahasiswa dgn NIM Array', '2013-02-11 13:41:23', 1, 'admin 2013-02-11 13:41:23'),
(129, 'user admin telah menghapus mahasiswa dgn NIM Array', '2013-02-11 13:41:23', 1, 'admin 2013-02-11 13:41:23'),
(130, 'user admin telah menghapus mahasiswa dgn NIM Array', '2013-02-11 13:41:23', 1, 'admin 2013-02-11 13:41:23'),
(131, 'user admin telah menghapus mahasiswa dgn NIM Array', '2013-02-11 13:41:23', 1, 'admin 2013-02-11 13:41:23'),
(132, 'user admin telah menghapus mahasiswa dgn NIM Array', '2013-02-11 13:41:38', 1, 'admin 2013-02-11 13:41:38'),
(133, 'user admin telah menghapus mahasiswa dgn NIM Array', '2013-02-11 13:41:38', 1, 'admin 2013-02-11 13:41:38'),
(134, 'user admin telah menghapus mahasiswa dgn NIM Array', '2013-02-11 13:41:38', 1, 'admin 2013-02-11 13:41:38'),
(135, 'user admin telah menghapus mahasiswa dgn NIM Array', '2013-02-11 13:41:39', 1, 'admin 2013-02-11 13:41:39'),
(136, 'user admin telah menghapus mahasiswa dgn NIM Array', '2013-02-11 13:41:39', 1, 'admin 2013-02-11 13:41:39'),
(137, 'user admin telah menghapus mahasiswa dgn NIM Array', '2013-02-11 13:41:39', 1, 'admin 2013-02-11 13:41:39'),
(138, 'user admin telah menghapus mahasiswa dgn NIM Array', '2013-02-11 13:41:39', 1, 'admin 2013-02-11 13:41:39'),
(139, 'user admin telah menghapus mahasiswa dgn NIM Array', '2013-02-11 13:41:39', 1, 'admin 2013-02-11 13:41:39'),
(140, 'user admin telah menghapus mahasiswa dgn NIM Array', '2013-02-11 13:41:39', 1, 'admin 2013-02-11 13:41:39'),
(141, 'user admin telah menghapus mahasiswa dgn NIM Array', '2013-02-11 13:41:39', 1, 'admin 2013-02-11 13:41:39'),
(142, 'user admin telah menghapus mahasiswa dgn NIM Array', '2013-02-11 13:41:39', 1, 'admin 2013-02-11 13:41:39'),
(143, 'user admin telah menghapus mahasiswa dgn NIM Array', '2013-02-11 13:41:39', 1, 'admin 2013-02-11 13:41:39'),
(144, 'user admin telah menghapus mahasiswa dgn NIM Array', '2013-02-11 13:41:40', 1, 'admin 2013-02-11 13:41:40'),
(145, 'user admin telah menghapus mahasiswa dgn NIM Array', '2013-02-11 13:41:40', 1, 'admin 2013-02-11 13:41:40'),
(146, 'user admin telah menghapus mahasiswa dgn NIM Array', '2013-02-11 13:41:40', 1, 'admin 2013-02-11 13:41:40'),
(147, 'user admin telah menghapus mahasiswa dgn NIM Array', '2013-02-11 13:41:40', 1, 'admin 2013-02-11 13:41:40'),
(148, 'user admin telah menghapus mahasiswa dgn NIM Array', '2013-02-11 13:41:40', 1, 'admin 2013-02-11 13:41:40'),
(149, 'user admin telah menghapus mahasiswa dgn NIM Array', '2013-02-11 13:41:40', 1, 'admin 2013-02-11 13:41:40'),
(150, 'user admin telah menghapus mahasiswa dgn NIM Array', '2013-02-11 13:41:40', 1, 'admin 2013-02-11 13:41:40'),
(151, 'user admin telah menghapus mahasiswa dgn NIM Array', '2013-02-11 13:41:40', 1, 'admin 2013-02-11 13:41:40'),
(152, 'user admin telah menghapus mahasiswa dgn NIM 3046', '2013-02-11 13:43:08', 1, 'admin 2013-02-11 13:43:08'),
(153, 'user admin berhasil mencetak KTM', '2013-02-11 15:29:52', 1, 'admin 2013-02-11 15:29:52'),
(154, 'user admin telah menghapus mahasiswa dgn NIM 2112', '2013-02-11 15:36:16', 1, 'admin 2013-02-11 15:36:16'),
(155, 'user admin telah menghapus mahasiswa dgn NIM 8024', '2013-02-11 15:36:17', 1, 'admin 2013-02-11 15:36:17'),
(156, 'user admin telah menghapus mahasiswa dgn NIM 8023', '2013-02-11 15:36:17', 1, 'admin 2013-02-11 15:36:17'),
(157, 'user admin berhasil mencetak KTM', '2013-02-11 15:37:02', 1, 'admin 2013-02-11 15:37:02'),
(158, 'user admin berhasil menambahkan foto untuk mahasiswa dgn NIM 2112', '2013-02-11 15:37:25', 1, 'admin 2013-02-11 15:37:25'),
(159, 'user admin berhasil mencetak KTM', '2013-02-11 15:37:37', 1, 'admin 2013-02-11 15:37:37'),
(160, 'user admin berhasil mencetak KTM', '2013-02-11 15:39:40', 1, 'admin 2013-02-11 15:39:40'),
(161, 'user admin berhasil mencetak KTM', '2013-02-11 15:40:35', 1, 'admin 2013-02-11 15:40:35'),
(162, 'user admin berhasil mencetak KTM', '2013-02-11 15:42:07', 1, 'admin 2013-02-11 15:42:07'),
(163, 'user admin berhasil mencetak KTM', '2013-02-11 15:42:24', 1, 'admin 2013-02-11 15:42:24'),
(164, 'user admin berhasil mencetak KTM', '2013-02-11 15:43:26', 1, 'admin 2013-02-11 15:43:26'),
(165, '<span style=''color: green''>login success! from 127.0.0.1 | user :admin</span>', '2013-02-11 16:29:57', 1, 'admin 2013-02-11 16:29:57'),
(166, '<span style=''color: green''>login success! from 127.0.0.1 | user :admin</span>', '2013-02-11 16:31:49', 1, 'admin 2013-02-11 16:31:49'),
(167, '<span style=''color: green''>login success! from 127.0.0.1 | user :reka</span>', '2013-02-11 16:31:58', 1, 'reka 2013-02-11 16:31:58'),
(168, '<span style=''color: green''>login success! from 127.0.0.1 | user :admin</span>', '2013-02-11 16:32:23', 1, 'admin 2013-02-11 16:32:23'),
(169, '<span style=''color: green''>login success! from 127.0.0.1 | user :reka</span>', '2013-02-11 16:32:36', 1, 'reka 2013-02-11 16:32:36'),
(170, 'user reka berhasil mencetak KTM', '2013-02-11 16:33:14', 1, 'reka 2013-02-11 16:33:14'),
(171, 'user reka telah menghapus mahasiswa dgn NIM 2112', '2013-02-11 16:33:39', 1, 'reka 2013-02-11 16:33:39'),
(172, 'user reka telah menghapus mahasiswa dgn NIM 8024', '2013-02-11 16:33:39', 1, 'reka 2013-02-11 16:33:39'),
(173, 'user reka telah menghapus mahasiswa dgn NIM 8023', '2013-02-11 16:33:39', 1, 'reka 2013-02-11 16:33:39'),
(174, 'user reka berhasil mencetak KTM', '2013-02-11 16:34:52', 1, 'reka 2013-02-11 16:34:52'),
(175, '<span style=''color: green''>login success! from 127.0.0.1 | user :admin</span>', '2013-02-11 18:34:11', 1, 'admin 2013-02-11 18:34:11'),
(176, 'user admin berhasil menambahkan foto untuk mahasiswa dgn NIM 2112', '2013-02-11 18:34:56', 1, 'admin 2013-02-11 18:34:56'),
(177, 'user admin berhasil menambahkan foto untuk mahasiswa dgn NIM 8024', '2013-02-11 18:35:29', 1, 'admin 2013-02-11 18:35:29'),
(178, 'user admin berhasil mencetak KTM', '2013-02-11 18:35:48', 1, 'admin 2013-02-11 18:35:48'),
(179, 'user admin berhasil mencetak KTM', '2013-02-11 18:38:51', 1, 'admin 2013-02-11 18:38:51'),
(180, 'user admin berhasil mencetak KTM', '2013-02-11 18:41:24', 1, 'admin 2013-02-11 18:41:24'),
(181, 'user admin berhasil mencetak KTM', '2013-02-11 18:43:14', 1, 'admin 2013-02-11 18:43:14'),
(182, 'user admin berhasil mencetak KTM', '2013-02-11 18:44:41', 1, 'admin 2013-02-11 18:44:41'),
(183, 'user admin berhasil mencetak KTM', '2013-02-11 18:45:56', 1, 'admin 2013-02-11 18:45:56'),
(184, 'user admin berhasil mencetak KTM', '2013-02-11 18:47:03', 1, 'admin 2013-02-11 18:47:03'),
(185, 'user admin berhasil mencetak KTM', '2013-02-11 18:49:08', 1, 'admin 2013-02-11 18:49:08'),
(186, 'user admin berhasil mencetak KTM', '2013-02-11 18:51:01', 1, 'admin 2013-02-11 18:51:01'),
(187, 'user admin berhasil mencetak KTM', '2013-02-11 18:51:19', 1, 'admin 2013-02-11 18:51:19'),
(188, 'user admin berhasil mencetak KTM', '2013-02-11 19:09:58', 1, 'admin 2013-02-11 19:09:58'),
(189, '<span style=''color: green''>login success! from 127.0.0.1 | user :admin</span>', '2013-02-12 07:44:42', 1, 'admin 2013-02-12 07:44:42'),
(190, 'user admin berhasil mencetak KTM', '2013-02-12 07:44:57', 1, 'admin 2013-02-12 07:44:57'),
(191, 'user admin berhasil menambahkan foto untuk mahasiswa dgn NIM 8024', '2013-02-12 07:47:03', 1, 'admin 2013-02-12 07:47:03'),
(192, 'user admin berhasil mencetak KTM', '2013-02-12 07:47:08', 1, 'admin 2013-02-12 07:47:08'),
(193, 'user admin berhasil mencetak KTM', '2013-02-12 07:48:32', 1, 'admin 2013-02-12 07:48:32'),
(194, 'user admin berhasil menambahkan foto untuk mahasiswa dgn NIM 8023', '2013-02-12 07:50:12', 1, 'admin 2013-02-12 07:50:12'),
(195, 'user admin berhasil mencetak KTM', '2013-02-12 07:50:16', 1, 'admin 2013-02-12 07:50:16'),
(196, 'user admin berhasil menambahkan foto untuk mahasiswa dgn NIM 8023', '2013-02-12 07:51:02', 1, 'admin 2013-02-12 07:51:02'),
(197, 'user admin berhasil mencetak KTM', '2013-02-12 07:51:05', 1, 'admin 2013-02-12 07:51:05'),
(198, 'user admin berhasil mencetak KTM', '2013-02-12 07:51:55', 1, 'admin 2013-02-12 07:51:55'),
(199, 'user admin berhasil menambahkan foto untuk mahasiswa dgn NIM 854654687', '2013-02-12 07:55:08', 1, 'admin 2013-02-12 07:55:08'),
(200, 'user admin berhasil menambahkan foto untuk mahasiswa dgn NIM 802354123', '2013-02-12 07:56:40', 1, 'admin 2013-02-12 07:56:40'),
(201, 'user admin berhasil menambahkan foto untuk mahasiswa dgn NIM 4565461238', '2013-02-12 07:59:24', 1, 'admin 2013-02-12 07:59:24'),
(202, 'user admin berhasil meng-update mahasiswa dgn NIM 854654687', '2013-02-12 07:59:47', 1, 'admin 2013-02-12 07:59:47'),
(203, 'user admin berhasil menambahkan <b>Itachi Uchiha</b> ke dalam list mahasiswa secara manual', '2013-02-12 08:00:33', 1, 'admin 2013-02-12 08:00:33'),
(204, 'user admin berhasil menambahkan foto untuk mahasiswa dgn NIM 21.30.2131.0321', '2013-02-12 08:02:11', 1, 'admin 2013-02-12 08:02:11'),
(205, 'user admin berhasil mencetak KTM', '2013-02-12 08:02:50', 1, 'admin 2013-02-12 08:02:50'),
(206, '<span style=''color: green''>login success! from 127.0.0.1 | user :admin</span>', '2013-02-12 10:53:12', 1, 'admin 2013-02-12 10:53:12'),
(207, '<span style=''color: green''>login success! from 127.0.0.1 | user :admin</span>', '2013-02-12 11:17:18', 1, 'admin 2013-02-12 11:17:18'),
(208, 'user admin berhasil menambahkan foto untuk mahasiswa dgn NIM 854654687', '2013-02-12 11:25:36', 1, 'admin 2013-02-12 11:25:36'),
(209, 'user admin berhasil menambahkan foto untuk mahasiswa dgn NIM 2112', '2013-02-12 11:27:44', 1, 'admin 2013-02-12 11:27:44'),
(210, 'user admin berhasil mencetak KTM', '2013-02-12 11:28:15', 1, 'admin 2013-02-12 11:28:15'),
(211, 'user admin berhasil menambahkan foto untuk mahasiswa dgn NIM 8024', '2013-02-12 11:30:07', 1, 'admin 2013-02-12 11:30:07'),
(212, 'user admin berhasil mencetak KTM', '2013-02-12 11:30:12', 1, 'admin 2013-02-12 11:30:12'),
(213, 'user admin berhasil mencetak KTM', '2013-02-12 11:34:03', 1, 'admin 2013-02-12 11:34:03'),
(214, 'user admin berhasil mencetak KTM', '2013-02-12 11:34:15', 1, 'admin 2013-02-12 11:34:15'),
(215, '<span style=''color: red''>warning! login error from 127.0.0.1 | user :admin</span>', '2013-02-12 12:00:05', 1, 'admin 2013-02-12 12:00:05'),
(216, '<span style=''color: green''>login success! from 127.0.0.1 | user :admin</span>', '2013-02-12 12:00:10', 1, 'admin 2013-02-12 12:00:10'),
(217, '<span style=''color: green''>login success! from 127.0.0.1 | user :admin</span>', '2013-02-12 12:34:48', 1, 'admin 2013-02-12 12:34:48'),
(218, 'user admin berhasil mencetak KTM', '2013-02-12 12:35:11', 1, 'admin 2013-02-12 12:35:11'),
(219, 'user admin berhasil mencetak KTM', '2013-02-12 12:35:26', 1, 'admin 2013-02-12 12:35:26'),
(220, '<span style=''color: green''>login success! from 127.0.0.1 | user :admin</span>', '2013-02-12 13:29:07', 1, 'admin 2013-02-12 13:29:07'),
(221, 'user admin berhasil mencetak KTM', '2013-02-12 13:29:28', 1, 'admin 2013-02-12 13:29:28'),
(222, '<span style=''color: green''>login success! from 110.138.215.142 | user :admin</span>', '2013-02-12 13:33:50', 1, 'admin 2013-02-12 13:33:50'),
(223, 'user admin berhasil mencetak KTM', '2013-02-12 13:39:55', 1, 'admin 2013-02-12 13:39:55'),
(224, 'user admin berhasil mencetak KTM', '2013-02-12 13:40:08', 1, 'admin 2013-02-12 13:40:08'),
(225, 'user admin berhasil mencetak KTM', '2013-02-12 13:40:11', 1, 'admin 2013-02-12 13:40:11'),
(226, 'user admin berhasil mencetak KTM', '2013-02-12 13:40:14', 1, 'admin 2013-02-12 13:40:14'),
(227, 'user admin berhasil mencetak KTM', '2013-02-12 13:40:15', 1, 'admin 2013-02-12 13:40:15'),
(228, '<span style=''color: green''>login success! from 180.247.181.77 | user :admin</span>', '2013-02-12 22:35:49', 1, 'admin 2013-02-12 22:35:49'),
(229, 'user admin berhasil mencetak KTM', '2013-02-12 22:36:25', 1, 'admin 2013-02-12 22:36:25'),
(230, 'user admin berhasil mencetak KTM', '2013-02-12 22:36:29', 1, 'admin 2013-02-12 22:36:29'),
(231, 'user admin berhasil mencetak KTM', '2013-02-12 22:36:36', 1, 'admin 2013-02-12 22:36:36'),
(232, 'user admin berhasil mencetak KTM', '2013-02-12 22:36:39', 1, 'admin 2013-02-12 22:36:39'),
(233, '<span style=''color: green''>login success! from 127.0.0.1 | user :admin</span>', '2013-02-13 06:57:26', 1, 'admin 2013-02-13 06:57:26'),
(234, 'user admin berhasil mencetak KTM', '2013-02-13 06:57:37', 1, 'admin 2013-02-13 06:57:37'),
(235, 'user admin berhasil mencetak KTM', '2013-02-13 06:57:42', 1, 'admin 2013-02-13 06:57:42'),
(236, 'user admin berhasil mencetak KTM', '2013-02-13 06:58:04', 1, 'admin 2013-02-13 06:58:04'),
(237, 'user admin berhasil mencetak KTM', '2013-02-13 10:47:32', 1, 'admin 2013-02-13 10:47:32'),
(238, '<span style=''color: green''>login success! from 127.0.0.1 | user :admin</span>', '2013-02-18 11:46:27', 1, 'admin 2013-02-18 11:46:27'),
(239, 'user admin berhasil mencetak KTM', '2013-02-18 11:48:24', 1, 'admin 2013-02-18 11:48:24'),
(240, '<span style=''color: green''>login success! from 127.0.0.1 | user :admin</span>', '2013-02-18 12:40:53', 1, 'admin 2013-02-18 12:40:53'),
(241, 'user admin berhasil mencetak KTM', '2013-02-18 12:42:17', 1, 'admin 2013-02-18 12:42:17'),
(242, '<span style=''color: green''>login success! from 127.0.0.1 | user :admin</span>', '2013-02-18 13:26:25', 1, 'admin 2013-02-18 13:26:25'),
(243, 'user admin berhasil menambahkan foto untuk mahasiswa dgn NIM 21.30.2131.0321', '2013-02-18 13:32:29', 1, 'admin 2013-02-18 13:32:29'),
(244, 'user admin berhasil menambahkan foto untuk mahasiswa dgn NIM 21.30.2131.0321', '2013-02-18 13:32:44', 1, 'admin 2013-02-18 13:32:44'),
(245, 'user admin berhasil mencetak KTM', '2013-02-18 13:34:20', 1, 'admin 2013-02-18 13:34:20'),
(246, '<span style=''color: green''>login success! from 110.138.215.142 | user :admin</span>', '2013-02-18 16:51:51', 1, 'admin 2013-02-18 16:51:51'),
(247, 'user admin berhasil mencetak KTM', '2013-02-18 16:55:14', 1, 'admin 2013-02-18 16:55:14'),
(248, 'user admin berhasil mencetak KTM', '2013-02-18 16:58:20', 1, 'admin 2013-02-18 16:58:20'),
(249, 'user admin berhasil meng-update mahasiswa dgn NIM 21.30.2131.0321', '2013-02-18 17:19:52', 1, 'admin 2013-02-18 17:19:52'),
(250, 'user admin berhasil mencetak KTM', '2013-02-18 17:20:04', 1, 'admin 2013-02-18 17:20:04'),
(251, 'user admin berhasil mencetak KTM', '2013-02-18 17:21:27', 1, 'admin 2013-02-18 17:21:27'),
(252, '<span style=''color: green''>login success! from 127.0.0.1 | user :admin</span>', '2013-02-19 10:13:43', 1, 'admin 2013-02-19 10:13:43'),
(253, 'user admin berhasil mencetak KTM', '2013-02-19 10:13:52', 1, 'admin 2013-02-19 10:13:52'),
(254, 'user admin berhasil mencetak KTM', '2013-02-19 10:13:58', 1, 'admin 2013-02-19 10:13:58'),
(255, 'user admin berhasil mencetak KTM', '2013-02-19 10:17:12', 1, 'admin 2013-02-19 10:17:12'),
(256, '<span style=''color: green''>login success! from 192.168.2.1 | user :admin</span>', '2013-02-19 10:55:01', 1, 'admin 2013-02-19 10:55:01'),
(257, 'user admin berhasil mencetak KTM', '2013-02-19 10:55:41', 1, 'admin 2013-02-19 10:55:41'),
(258, '<span style=''color: green''>login success! from 192.168.2.22 | user :admin</span>', '2013-02-19 10:56:25', 1, 'admin 2013-02-19 10:56:25'),
(259, 'user admin berhasil mencetak KTM', '2013-02-19 10:56:36', 1, 'admin 2013-02-19 10:56:36'),
(260, '<span style=''color: green''>login success! from 114.79.60.233 | user :admin</span>', '2013-02-19 20:29:36', 1, 'admin 2013-02-19 20:29:36'),
(261, 'user admin berhasil mencetak KTM', '2013-02-19 20:29:55', 1, 'admin 2013-02-19 20:29:55'),
(262, 'user admin berhasil mencetak KTM', '2013-02-19 20:30:00', 1, 'admin 2013-02-19 20:30:00'),
(263, 'user admin berhasil mencetak KTM', '2013-02-19 20:30:19', 1, 'admin 2013-02-19 20:30:19'),
(264, 'user admin berhasil mencetak KTM', '2013-02-19 20:30:23', 1, 'admin 2013-02-19 20:30:23'),
(265, '<span style=''color: green''>login success! from 127.0.0.1 | user :admin</span>', '2013-02-20 09:08:30', 1, 'admin 2013-02-20 09:08:30'),
(266, 'user admin berhasil mencetak KTM', '2013-02-20 09:08:38', 1, 'admin 2013-02-20 09:08:38'),
(267, 'user admin berhasil mencetak KTM', '2013-02-20 09:09:30', 1, 'admin 2013-02-20 09:09:30'),
(268, '<span style=''color: green''>login success! from 127.0.0.1 | user :admin</span>', '2013-02-20 09:09:48', 1, 'admin 2013-02-20 09:09:48'),
(269, 'user admin berhasil mencetak KTM', '2013-02-20 09:09:59', 1, 'admin 2013-02-20 09:09:59'),
(270, '<span style=''color: green''>login success! from 127.0.0.1 | user :admin</span>', '2013-02-20 11:23:13', 1, 'admin 2013-02-20 11:23:13'),
(271, 'user admin berhasil mencetak KTM', '2013-02-20 11:23:25', 1, 'admin 2013-02-20 11:23:25'),
(272, 'user admin berhasil mencetak KTM', '2013-02-20 11:23:53', 1, 'admin 2013-02-20 11:23:53'),
(273, 'user admin berhasil mencetak KTM', '2013-02-20 11:24:04', 1, 'admin 2013-02-20 11:24:04'),
(274, 'user admin berhasil mencetak KTM', '2013-02-20 11:28:33', 1, 'admin 2013-02-20 11:28:33'),
(275, 'user admin berhasil mencetak KTM', '2013-02-20 11:31:08', 1, 'admin 2013-02-20 11:31:08'),
(276, '<span style=''color: green''>login success! from 127.0.0.1 | user :admin</span>', '2013-02-20 15:16:56', 1, 'admin 2013-02-20 15:16:56'),
(277, 'user admin berhasil mencetak KTM', '2013-02-20 15:17:06', 1, 'admin 2013-02-20 15:17:06'),
(278, 'user admin berhasil mencetak KTM', '2013-02-20 15:18:12', 1, 'admin 2013-02-20 15:18:12'),
(279, 'user admin berhasil mencetak KTM', '2013-02-20 15:21:44', 1, 'admin 2013-02-20 15:21:44'),
(280, 'user admin berhasil mencetak KTM', '2013-02-20 15:22:19', 1, 'admin 2013-02-20 15:22:19'),
(281, '<span style=''color: green''>login success! from 127.0.0.1 | user :admin</span>', '2013-03-20 09:49:01', 1, 'admin 2013-03-20 09:49:01'),
(282, 'user admin berhasil mencetak KTM', '2013-03-20 10:00:51', 1, 'admin 2013-03-20 10:00:51'),
(283, 'user admin berhasil mencetak KTM', '2013-03-20 10:01:18', 1, 'admin 2013-03-20 10:01:18'),
(284, 'user admin telah menghapus mahasiswa dgn NIM 21.30.2131.0321', '2013-03-20 10:02:06', 1, 'admin 2013-03-20 10:02:06'),
(285, 'user admin telah berhasil menambahkan <b>batch</b> dgn tgl aktif 20 Maret 2013', '2013-03-20 10:36:08', 1, 'admin 2013-03-20 10:36:08'),
(286, 'user admin telah berhasil menambahkan <b>batch</b> dgn tgl aktif 20 Maret 2013', '2013-03-20 10:36:34', 1, 'admin 2013-03-20 10:36:34'),
(287, 'user admin berhasil mencetak KTM', '2013-03-20 10:46:00', 1, 'admin 2013-03-20 10:46:00'),
(288, 'user admin berhasil mencetak KTM', '2013-03-20 10:46:42', 1, 'admin 2013-03-20 10:46:42'),
(289, '<span style=''color: green''>login success! from 127.0.0.1 | user :admin</span>', '2013-03-23 10:44:44', 1, 'admin 2013-03-23 10:44:44'),
(290, '<span style=''color: green''>login success! from 127.0.0.1 | user :admin</span>', '2013-03-26 08:05:57', 1, 'admin 2013-03-26 08:05:57'),
(291, '<span style=''color: green''>login success! from 127.0.0.1 | user :admin</span>', '2013-03-26 08:12:32', 1, 'admin 2013-03-26 08:12:32'),
(292, '<span style=''color: green''>login success! from 127.0.0.1 | user :admin</span>', '2013-03-30 09:13:21', 1, 'admin 2013-03-30 09:13:21'),
(293, '<span style=''color: green''>login success! from 127.0.0.1 | user :admin</span>', '2013-04-02 08:47:56', 1, 'admin 2013-04-02 08:47:56'),
(294, '<span style=''color: green''>login success! from 127.0.0.1 | user :admin</span>', '2013-04-03 12:48:55', 1, 'admin 2013-04-03 12:48:55'),
(295, '<span style=''color: green''>login success! from 127.0.0.1 | user :admin</span>', '2013-04-03 14:34:06', 1, 'admin 2013-04-03 14:34:06'),
(296, '<span style=''color: green''>login success! from 192.168.2.100 | user :admin</span>', '2013-04-04 07:24:38', 1, 'admin 2013-04-04 07:24:38'),
(297, '<span style=''color: green''>login success! from 192.168.2.100 | user :admin</span>', '2013-04-17 11:51:41', 1, 'admin 2013-04-17 11:51:41');

-- --------------------------------------------------------

--
-- Table structure for table `mst_batch`
--

CREATE TABLE IF NOT EXISTS `mst_batch` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `keterangan` varchar(300) NOT NULL,
  `tgl_aktif` date NOT NULL,
  `tampil_keterangan` tinyint(1) NOT NULL,
  `aktif` tinyint(1) NOT NULL DEFAULT '1',
  `op` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `mst_batch`
--

INSERT INTO `mst_batch` (`id`, `keterangan`, `tgl_aktif`, `tampil_keterangan`, `aktif`, `op`) VALUES
(1, 'ok, sip', '2013-11-30', 0, 1, '2012-11-01 10:04:25'),
(2, 'cat', '2013-08-28', 0, 1, 'admin 2013-02-11 09:22:58'),
(3, '123', '2013-06-12', 0, 1, 'admin 2013-02-11 09:28:40'),
(4, '', '2013-03-20', 0, 1, 'admin 2013-03-20 10:36:08'),
(5, 'sadsadasdsa', '2013-03-20', 1, 1, 'admin 2013-03-20 10:36:34');

-- --------------------------------------------------------

--
-- Table structure for table `mst_batches_mahasiswa`
--

CREATE TABLE IF NOT EXISTS `mst_batches_mahasiswa` (
  `id` int(20) NOT NULL AUTO_INCREMENT,
  `mst_batch_id` varchar(20) NOT NULL,
  `mst_mahasiswa_id` varchar(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=973 ;

--
-- Dumping data for table `mst_batches_mahasiswa`
--

INSERT INTO `mst_batches_mahasiswa` (`id`, `mst_batch_id`, `mst_mahasiswa_id`) VALUES
(967, '1', '8023'),
(968, '1', '8024'),
(969, '1', '2112'),
(970, '2', '802354123'),
(971, '2', '4565461238'),
(972, '2', '854654687');

-- --------------------------------------------------------

--
-- Table structure for table `mst_fakultas`
--

CREATE TABLE IF NOT EXISTS `mst_fakultas` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `nama` varchar(100) NOT NULL,
  `aktif` tinyint(1) NOT NULL DEFAULT '1',
  `op` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `mst_fakultas`
--

INSERT INTO `mst_fakultas` (`id`, `nama`, `aktif`, `op`) VALUES
(6, 'FTek.', 1, 'admin 2013-01-26 08:38:38');

-- --------------------------------------------------------

--
-- Table structure for table `mst_foto`
--

CREATE TABLE IF NOT EXISTS `mst_foto` (
  `id` int(20) NOT NULL AUTO_INCREMENT,
  `mst_mahasiswa_id` varchar(20) NOT NULL,
  `nama_file` varchar(200) NOT NULL,
  `aktif` tinyint(1) NOT NULL DEFAULT '1',
  `op` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=13 ;

--
-- Dumping data for table `mst_foto`
--

INSERT INTO `mst_foto` (`id`, `mst_mahasiswa_id`, `nama_file`, `aktif`, `op`) VALUES
(1, '2112', '2112.jpg', 1, 'admin 2013-02-11 18:34:56'),
(2, '8024', '8024.jpg', 1, 'admin 2013-02-11 18:35:29'),
(3, '8024', '80241.jpg', 1, 'admin 2013-02-12 07:47:03'),
(4, '8023', '8023.jpg', 1, 'admin 2013-02-12 07:50:12'),
(5, '8023', '80231.jpg', 1, 'admin 2013-02-12 07:51:02'),
(6, '854654687', '854654687.jpg', 1, 'admin 2013-02-12 07:55:08'),
(7, '802354123', '802354123.jpg', 1, 'admin 2013-02-12 07:56:40'),
(8, '4565461238', '4565461238.jpg', 1, 'admin 2013-02-12 07:59:24'),
(10, '854654687', '8546546871.jpg', 1, 'admin 2013-02-12 11:25:36'),
(11, '2112', '21121.jpg', 1, 'admin 2013-02-12 11:27:44'),
(12, '8024', '80242.jpg', 1, 'admin 2013-02-12 11:30:07');

-- --------------------------------------------------------

--
-- Table structure for table `mst_jurusan`
--

CREATE TABLE IF NOT EXISTS `mst_jurusan` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `mst_fakultas_id` int(10) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `aktif` tinyint(1) NOT NULL DEFAULT '1',
  `op` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `mst_jurusan`
--

INSERT INTO `mst_jurusan` (`id`, `mst_fakultas_id`, `nama`, `aktif`, `op`) VALUES
(2, 6, 'sistem informasi', 1, 'admin 2013-01-26 08:41:32');

-- --------------------------------------------------------

--
-- Table structure for table `mst_mahasiswa`
--

CREATE TABLE IF NOT EXISTS `mst_mahasiswa` (
  `id` varchar(20) NOT NULL COMMENT 'NIM mahasiswa',
  `urut` int(20) NOT NULL AUTO_INCREMENT,
  `mst_jurusan_id` int(10) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `tempat_lahir` varchar(30) NOT NULL,
  `tgl_lahir` date NOT NULL,
  `alamat` varchar(300) NOT NULL,
  `ref_jenis_kelamin_id` int(2) NOT NULL,
  `no_hp` varchar(15) NOT NULL,
  `aktif` tinyint(1) NOT NULL DEFAULT '1',
  `op` varchar(60) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `urut` (`urut`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=1269 ;

--
-- Dumping data for table `mst_mahasiswa`
--

INSERT INTO `mst_mahasiswa` (`id`, `urut`, `mst_jurusan_id`, `nama`, `tempat_lahir`, `tgl_lahir`, `alamat`, `ref_jenis_kelamin_id`, `no_hp`, `aktif`, `op`) VALUES
('2112', 1265, 2, 'Sakura Haruno', 'Konoha', '0000-00-00', 'Ds Konoha Kec Konoha gakure', 2, '8122210214', 1, ''),
('4565461238', 1267, 2, 'Obito Uchiha', 'Konoha', '0000-00-00', 'Ds Konoha Kec Konoha gakure', 1, '8122210213', 1, ''),
('8023', 1263, 2, 'Uzumaki Naruto', 'Konoha', '0000-00-00', 'Ds Konoha Kec Konoha gakure', 1, '8122210212', 1, ''),
('802354123', 1266, 2, 'Kakashi Hatake', 'Konoha', '0000-00-00', 'Ds Konoha Kec Konoha gakure', 1, '8122210212', 1, ''),
('8024', 1264, 2, 'Sasuke Uchiha', 'Konoha', '0000-00-00', 'Ds Konoha Kec Konoha gakure', 1, '8122210213', 1, ''),
('854654687', 1268, 2, 'oki', 'Konoha1', '0000-00-00', '1Ds Konoha Kec Konoha gakure', 2, '81222102141', 1, '');

-- --------------------------------------------------------

--
-- Table structure for table `mst_request`
--

CREATE TABLE IF NOT EXISTS `mst_request` (
  `id` int(30) NOT NULL AUTO_INCREMENT,
  `mst_mahasiswa_id` varchar(20) NOT NULL,
  `ref_jenis_request_id` int(1) NOT NULL,
  `tgl` date NOT NULL,
  `no_hp` varchar(20) NOT NULL,
  `aktif` tinyint(1) NOT NULL DEFAULT '1' COMMENT '1= approve, 2=pending, 3=ditolak, 0=ktm telah diterima',
  `op` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=20 ;

--
-- Dumping data for table `mst_request`
--

INSERT INTO `mst_request` (`id`, `mst_mahasiswa_id`, `ref_jenis_request_id`, `tgl`, `no_hp`, `aktif`, `op`) VALUES
(17, '854654687', 2, '2013-04-17', '8122210214', 1, 'admin 2013-04-17 12:58:17'),
(18, '854654687', 2, '2013-04-17', '81222102141', 3, 'admin 2013-04-17 13:00:30'),
(19, '854654687', 1, '2013-04-17', '81222102141', 2, 'admin 2013-04-17 13:06:29');

-- --------------------------------------------------------

--
-- Table structure for table `mst_user`
--

CREATE TABLE IF NOT EXISTS `mst_user` (
  `id` int(7) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `ref_level_user_id` int(2) NOT NULL,
  `aktif` tinyint(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `mst_user`
--

INSERT INTO `mst_user` (`id`, `username`, `password`, `email`, `ref_level_user_id`, `aktif`) VALUES
(1, 'admin', 'f44b5f0fef87af0078ae9572c482e39e', 'admin@example.cz.cc', 1, 1),
(3, 'reka', 'c2d000641fc9716700d4dc2112f6750f', 'rey.barrolz@live.com', 2, 1);

-- --------------------------------------------------------

--
-- Table structure for table `ref_jenis_kelamin`
--

CREATE TABLE IF NOT EXISTS `ref_jenis_kelamin` (
  `id` int(2) NOT NULL AUTO_INCREMENT,
  `nama` varchar(15) NOT NULL,
  `aktif` tinyint(1) NOT NULL DEFAULT '1',
  `op` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `ref_jenis_kelamin`
--

INSERT INTO `ref_jenis_kelamin` (`id`, `nama`, `aktif`, `op`) VALUES
(1, 'Laki-laki', 1, ''),
(2, 'Perempuan', 1, '');

-- --------------------------------------------------------

--
-- Table structure for table `ref_jenis_request`
--

CREATE TABLE IF NOT EXISTS `ref_jenis_request` (
  `id` tinyint(1) NOT NULL AUTO_INCREMENT,
  `nama` varchar(15) NOT NULL,
  `aktif` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `ref_jenis_request`
--

INSERT INTO `ref_jenis_request` (`id`, `nama`, `aktif`) VALUES
(1, 'Perpanjangan', 1),
(2, 'Buat Baru', 1);

-- --------------------------------------------------------

--
-- Table structure for table `ref_level_user`
--

CREATE TABLE IF NOT EXISTS `ref_level_user` (
  `id` int(2) NOT NULL AUTO_INCREMENT,
  `nama` varchar(20) NOT NULL,
  `aktif` tinyint(1) NOT NULL DEFAULT '1',
  `op` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `ref_level_user`
--

INSERT INTO `ref_level_user` (`id`, `nama`, `aktif`, `op`) VALUES
(1, 'administrator', 1, ''),
(2, 'user', 1, '');

-- --------------------------------------------------------

--
-- Table structure for table `setup_variable`
--

CREATE TABLE IF NOT EXISTS `setup_variable` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `jenis` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `variable` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `value` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `tabel_relasi` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `keterangan` varchar(100) COLLATE latin1_general_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=33 ;

--
-- Dumping data for table `setup_variable`
--

INSERT INTO `setup_variable` (`id`, `jenis`, `variable`, `value`, `tabel_relasi`, `keterangan`) VALUES
(10, 'template', 'template', 'fcf3f6b1ccbd40b97b4cdc97a5b3dca8.jpg', '', 'setting template'),
(24, 'template', 'template_belakang', 'd64ba0419dcca515abec6bbd00fb311d.jpg', '', 'setting template'),
(1, 'alamat_kampus', 'alamat_kampus', 'Jl. KH. Achmad Dahlan 76 Telp. (0354) 771579', '', 'setting alamat kampus di template'),
(2, 'logo', 'logo', '07714c0af7fb65c0452413cf7b727efa.png', '', 'setting logo kampus di template'),
(25, 'style_head', 'style_head1', 'font-size: 17px; font-weight: bold; font-style: italic;', '', 'setting header1 template'),
(26, 'value_head', 'value_head1', '', '', 'setting header1 template'),
(27, 'align_header', 'align_header', 'left', '', 'setting align header template'),
(28, 'align_alamat_kampus', 'align_alamat_kampus', 'right', '', 'setting align alamat kampus'),
(29, 'value_head', 'value_head2', '<br>', '', 'setting header1 template'),
(30, 'style_head', 'style_head2', 'font-size: 14px; font-weight: bold; font-style: italic;', '', 'setting header2 template'),
(31, 'warna_header', 'warna_header1', '#800000', '', 'setting warna header di template'),
(32, 'warna_header', 'warna_header2', '#800000', '', 'setting warna header di template');

-- --------------------------------------------------------

--
-- Table structure for table `user_ci`
--

CREATE TABLE IF NOT EXISTS `user_ci` (
  `id` int(7) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `level` int(4) NOT NULL,
  `status` enum('1','0') NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `user_ci`
--

INSERT INTO `user_ci` (`id`, `username`, `password`, `email`, `level`, `status`) VALUES
(1, 'admin', '21232f297a57a5a743894a0e4a801fc3', 'admin@example.com', 1, '1');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
