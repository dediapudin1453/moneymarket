-- phpMyAdmin SQL Dump
-- version 4.9.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Nov 03, 2021 at 04:09 AM
-- Server version: 5.7.33-cll-lve
-- PHP Version: 7.3.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `moneymarketdb`
--

-- --------------------------------------------------------

--
-- Table structure for table `t_account_receiver`
--

CREATE TABLE `t_account_receiver` (
  `id` int(11) NOT NULL,
  `account_id` varchar(50) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `t_account_trading`
--

CREATE TABLE `t_account_trading` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `account` varchar(25) NOT NULL,
  `product_id` int(11) NOT NULL,
  `type_account` varchar(50) NOT NULL,
  `leverage` enum('1:100','1:200','1:500') NOT NULL,
  `password` varchar(50) NOT NULL,
  `password_investor` varchar(50) NOT NULL,
  `server` text NOT NULL,
  `amount` double(10,2) NOT NULL,
  `commission` double(10,2) NOT NULL,
  `status_request` enum('Pending','Approved','Rejected') NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `t_account_trading`
--

INSERT INTO `t_account_trading` (`id`, `user_id`, `account`, `product_id`, `type_account`, `leverage`, `password`, `password_investor`, `server`, `amount`, `commission`, `status_request`, `date`) VALUES
(1, 6, '1674571517', 1, 'STANDART ACCOUNT', '', 'M78hyjU', 'profit2021', 'MoneyMarketIntl-Live1', 500.00, 0.00, 'Approved', '2021-11-02 09:33:18'),
(2, 8, '1674571518', 1, 'STANDART ACCOUNT', '', '4hSjxau', '2mvdqdN', 'MoneyMarketIntl-Live1', 500.00, 0.00, 'Approved', '2021-11-02 09:42:21'),
(3, 10, '1674571519', 1, 'STANDART ACCOUNT', '', 'Ag4CFZl', 'A2zlplF', 'MoneyMarketIntl-Live1', 500.00, 0.00, 'Approved', '2021-11-02 11:51:24'),
(4, 7, '1674571520', 1, 'STANDARD ACCOUNT', '', 'd1fdLts', '0Vrmhua', 'MoneyMarketIntl-Live1', 500.00, 0.00, 'Approved', '2021-11-02 11:50:44'),
(5, 11, '1674571521', 1, 'STANDARD ACCOUNT', '', '5iehbdS', '3anhtWk', 'MoneyMarketIntl-Live1', 500.00, 0.00, 'Approved', '2021-11-02 11:50:20'),
(6, 9, '1674571522', 1, 'STANDARD ACCOUNT', '', 'Qm6Hrex', 'baRw2vD', 'MoneyMarketIntl-Live1', 500.00, 0.00, 'Approved', '2021-11-02 11:51:46');

-- --------------------------------------------------------

--
-- Table structure for table `t_account_trading_amount_history`
--

CREATE TABLE `t_account_trading_amount_history` (
  `id` int(11) NOT NULL,
  `account_trading_id` int(11) NOT NULL,
  `internal_transfer_id` int(11) NOT NULL,
  `amount_before` double(20,4) NOT NULL,
  `amount` double(20,4) NOT NULL,
  `amount_after` double(20,4) NOT NULL,
  `keterangan` text NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `t_account_trading_amount_history`
--

INSERT INTO `t_account_trading_amount_history` (`id`, `account_trading_id`, `internal_transfer_id`, `amount_before`, `amount`, `amount_after`, `keterangan`, `date`) VALUES
(1, 1, 1, 0.0000, 500.0000, 500.0000, 'Internal Transfer Approved', '2021-11-02 09:33:18'),
(2, 2, 2, 0.0000, 500.0000, 500.0000, 'Internal Transfer Approved', '2021-11-02 09:42:21'),
(3, 5, 3, 0.0000, 500.0000, 500.0000, 'Internal Transfer Approved', '2021-11-02 11:50:20'),
(4, 4, 4, 0.0000, 500.0000, 500.0000, 'Internal Transfer Approved', '2021-11-02 11:50:44'),
(5, 3, 5, 0.0000, 500.0000, 500.0000, 'Internal Transfer Approved', '2021-11-02 11:51:24'),
(6, 6, 6, 0.0000, 500.0000, 500.0000, 'Internal Transfer Approved', '2021-11-02 11:51:46');

-- --------------------------------------------------------

--
-- Table structure for table `t_activity`
--

CREATE TABLE `t_activity` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `type` enum('Login','Logout','Deposit','Withdraw','Internal Transfer','Account Trading') NOT NULL,
  `activity` text NOT NULL,
  `date` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `t_activity`
--

INSERT INTO `t_activity` (`id`, `user_id`, `type`, `activity`, `date`) VALUES
(1, 48, 'Login', 'Login, Welcome testong-xyon', ''),
(2, 5, 'Login', 'Login, Welcome dimasfer1502', ''),
(3, 5, 'Logout', 'Logout', ''),
(4, 5, 'Login', 'Login, Welcome dimasfer1502', ''),
(5, 5, 'Logout', 'Logout', ''),
(6, 5, 'Login', 'Login, Welcome dimasfer1502', ''),
(7, 5, 'Logout', 'Logout', ''),
(8, 5, 'Login', 'Login, Welcome dimasfer1502', ''),
(9, 6, 'Login', 'Login, Welcome mkpromax', ''),
(10, 6, 'Login', 'Login, Welcome mkpromax', ''),
(11, 6, 'Deposit', 'Deposit', ''),
(12, 6, 'Deposit', 'Request Deposit Approved', ''),
(13, 7, 'Login', 'Login, Welcome harrier7', ''),
(14, 8, 'Login', 'Login, Welcome evolution', ''),
(15, 10, 'Login', 'Login, Welcome glory8', ''),
(16, 5, 'Logout', 'Logout', ''),
(17, 11, 'Login', 'Login, Welcome richmaker', ''),
(18, 11, 'Logout', 'Logout', ''),
(19, 11, 'Login', 'Login, Welcome richmaker', ''),
(20, 11, 'Deposit', 'Deposit', ''),
(21, 8, 'Login', 'Login, Welcome evolution', ''),
(22, 8, 'Deposit', 'Deposit', ''),
(23, 7, 'Login', 'Login, Welcome harrier7', ''),
(24, 7, 'Deposit', 'Deposit', ''),
(25, 10, 'Login', 'Login, Welcome glory8', ''),
(26, 10, 'Deposit', 'Deposit', ''),
(27, 9, 'Login', 'Login, Welcome sultan18', ''),
(28, 9, 'Logout', 'Logout', ''),
(29, 9, 'Login', 'Login, Welcome sultan18', ''),
(30, 11, 'Deposit', 'Request Deposit Approved', ''),
(31, 8, 'Deposit', 'Request Deposit Approved', ''),
(32, 7, 'Deposit', 'Request Deposit Approved', ''),
(33, 10, 'Deposit', 'Request Deposit Approved', ''),
(34, 9, 'Deposit', 'Deposit', ''),
(35, 9, 'Deposit', 'Request Deposit Approved', ''),
(36, 6, 'Login', 'Login, Welcome mkpromax', ''),
(37, 6, 'Account Trading', 'Request Account Trading', ''),
(38, 8, 'Account Trading', 'Request Account Trading', ''),
(39, 6, 'Internal Transfer', 'Request Internal Transfer', ''),
(40, 10, 'Account Trading', 'Request Account Trading', ''),
(41, 12, 'Login', 'Login, Welcome harizjum2306', ''),
(42, 8, 'Internal Transfer', 'Request Internal Transfer', ''),
(43, 7, 'Account Trading', 'Request Account Trading', ''),
(44, 11, 'Account Trading', 'Request Account Trading', ''),
(45, 9, 'Account Trading', 'Request Account Trading', ''),
(46, 11, 'Internal Transfer', 'Request Internal Transfer', ''),
(47, 7, 'Internal Transfer', 'Request Internal Transfer', ''),
(48, 10, 'Internal Transfer', 'Request Internal Transfer', ''),
(49, 9, 'Internal Transfer', 'Request Internal Transfer', ''),
(50, 10, 'Logout', 'Logout', ''),
(51, 11, 'Logout', 'Logout', ''),
(52, 11, 'Login', 'Login, Welcome richmaker', ''),
(53, 11, 'Logout', 'Logout', ''),
(54, 11, 'Login', 'Login, Welcome richmaker', ''),
(55, 11, 'Logout', 'Logout', ''),
(56, 10, 'Login', 'Login, Welcome glory8', ''),
(57, 11, 'Login', 'Login, Welcome richmaker', ''),
(58, 11, 'Logout', 'Logout', '');

-- --------------------------------------------------------

--
-- Table structure for table `t_album`
--

CREATE TABLE `t_album` (
  `id` int(100) NOT NULL,
  `title` varchar(200) NOT NULL,
  `seotitle` varchar(200) NOT NULL,
  `active` enum('Y','N') NOT NULL DEFAULT 'N'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `t_album`
--

INSERT INTO `t_album` (`id`, `title`, `seotitle`, `active`) VALUES
(1, 'Nature', '20190527034902809554383216', 'Y'),
(2, 'Vintage', '20190527034958457628159932', 'Y');

-- --------------------------------------------------------

--
-- Table structure for table `t_bank`
--

CREATE TABLE `t_bank` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `currency` enum('Rupiah/IDR') NOT NULL,
  `bank_name` varchar(250) NOT NULL,
  `acc_number` varchar(30) NOT NULL,
  `owner_name` varchar(250) NOT NULL,
  `branch` varchar(250) NOT NULL,
  `date` date NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `t_bank`
--

INSERT INTO `t_bank` (`id`, `user_id`, `currency`, `bank_name`, `acc_number`, `owner_name`, `branch`, `date`) VALUES
(1, 5, 'Rupiah/IDR', 'BCA', '15648978', 'Dimas Ferdiansyah', 'surabaya', '0000-00-00'),
(2, 6, 'Rupiah/IDR', 'BCA', '7880951399', 'Aswin Jahja', 'Klampis', '0000-00-00'),
(3, 7, 'Rupiah/IDR', 'BCA', '7805106042', 'Decson', 'Tarakan', '0000-00-00'),
(4, 8, 'Rupiah/IDR', 'BCA', '7805175362', 'Irawan', 'Tarakan', '0000-00-00'),
(5, 10, 'Rupiah/IDR', 'Bca', '0885676168', 'Christian Tara Ilianto', 'Darmo', '0000-00-00'),
(6, 11, 'Rupiah/IDR', 'BCA', '1131165515', 'Gatot Siswanto', 'Jombang', '0000-00-00'),
(7, 9, 'Rupiah/IDR', 'BCA', '1131233456', 'Richard', 'Surabaya', '0000-00-00');

-- --------------------------------------------------------

--
-- Table structure for table `t_broker`
--

CREATE TABLE `t_broker` (
  `id` int(11) NOT NULL,
  `amount` double(10,2) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `t_broker`
--

INSERT INTO `t_broker` (`id`, `amount`, `date`) VALUES
(1, 0.00, '2021-01-28 05:36:23');

-- --------------------------------------------------------

--
-- Table structure for table `t_broker_investor`
--

CREATE TABLE `t_broker_investor` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `amount` double(10,2) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `t_category`
--

CREATE TABLE `t_category` (
  `id` int(100) NOT NULL,
  `id_parent` int(100) NOT NULL,
  `title` varchar(100) NOT NULL,
  `seotitle` varchar(100) NOT NULL,
  `description` varchar(200) NOT NULL,
  `picture` text NOT NULL,
  `active` enum('Y','N') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `t_category`
--

INSERT INTO `t_category` (`id`, `id_parent`, `title`, `seotitle`, `description`, `picture`, `active`) VALUES
(1, 0, 'Uncategory', 'uncategory', 'Kategory tidak ditentukan', '', 'Y'),
(5, 0, 'Market Analyis', 'market-analyis', 'Lorem ipsum dolor sit amet consectetur adipisicing elit sed do eiusmod tempor incididunt ut labore et dolore magna aliquaUt enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliq', '', 'Y'),
(6, 0, 'News', 'news', '', '', 'Y'),
(7, 5, 'Promotion', 'promotion', 'promotion', '', 'Y');

-- --------------------------------------------------------

--
-- Table structure for table `t_chat_whatsapp`
--

CREATE TABLE `t_chat_whatsapp` (
  `id` int(11) NOT NULL,
  `chat` text NOT NULL,
  `type` enum('Homepage') NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `t_chat_whatsapp`
--

INSERT INTO `t_chat_whatsapp` (`id`, `chat`, `type`) VALUES
(1, 'Any Question? Please Chat', 'Homepage');

-- --------------------------------------------------------

--
-- Table structure for table `t_comment`
--

CREATE TABLE `t_comment` (
  `id` int(100) NOT NULL,
  `id_user` int(100) NOT NULL,
  `id_post` int(100) NOT NULL,
  `parent` int(100) NOT NULL DEFAULT '0',
  `name` varchar(100) NOT NULL,
  `email` varchar(50) NOT NULL,
  `comment` text NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `ip` varchar(30) NOT NULL,
  `active` enum('N','Y','X') NOT NULL DEFAULT 'N'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `t_component`
--

CREATE TABLE `t_component` (
  `id` int(100) NOT NULL,
  `name` varchar(200) NOT NULL,
  `type` varchar(100) NOT NULL,
  `class` varchar(200) NOT NULL,
  `table_name` varchar(200) NOT NULL,
  `status` enum('Y','N') NOT NULL DEFAULT 'N'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `t_data_pesan`
--

CREATE TABLE `t_data_pesan` (
  `id` int(11) NOT NULL,
  `nama` varchar(150) NOT NULL,
  `no_hp` varchar(15) NOT NULL,
  `email` varchar(150) NOT NULL,
  `paket` varchar(150) NOT NULL,
  `tema` varchar(150) NOT NULL,
  `domain` varchar(200) NOT NULL,
  `status` enum('Pending','Diterima','Ditolak') NOT NULL,
  `tanggal` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `t_deposit`
--

CREATE TABLE `t_deposit` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `bank_id` int(11) NOT NULL,
  `username` varchar(150) NOT NULL,
  `destination` enum('Wallet') NOT NULL,
  `rate_amount` double(10,2) NOT NULL,
  `amount` double(20,4) NOT NULL,
  `amount_usd` double(20,4) NOT NULL,
  `photo` text NOT NULL,
  `status` enum('Pending','Approved','Rejected') NOT NULL,
  `date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `update_date` double(10,2) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `t_deposit`
--

INSERT INTO `t_deposit` (`id`, `user_id`, `bank_id`, `username`, `destination`, `rate_amount`, `amount`, `amount_usd`, `photo`, `status`, `date`, `update_date`) VALUES
(1, 6, 2, 'mkpromax', 'Wallet', 15000.00, 7500000.0000, 500.0000, '6e51f8a7b4198677f72679ef92275288.jpg', 'Approved', '2021-11-01 22:10:40', 0.00),
(2, 11, 6, 'richmaker', 'Wallet', 15000.00, 7500000.0000, 500.0000, 'f0e80c38ddf38fc46817afba52be2962.jpg', 'Approved', '2021-11-02 02:05:44', 0.00),
(3, 8, 4, 'evolution', 'Wallet', 15000.00, 7500000.0000, 500.0000, 'e932afc597effe0feca6fce2ebf5b48d.jpg', 'Approved', '2021-11-02 02:05:59', 0.00),
(4, 7, 3, 'harrier7', 'Wallet', 15000.00, 7500000.0000, 500.0000, 'a45a851a51368bb0da5396cd0f0895fa.jpg', 'Approved', '2021-11-02 02:06:14', 0.00),
(5, 10, 5, 'glory8', 'Wallet', 15000.00, 7500000.0000, 500.0000, '021879fd125ae785799d1740870f8c09.jpg', 'Approved', '2021-11-02 02:06:31', 0.00),
(6, 9, 7, 'sultan18', 'Wallet', 15000.00, 7500000.0000, 500.0000, 'f0ec91b19e670f04317d6ffac76f58ec.jpg', 'Approved', '2021-11-02 02:09:22', 0.00);

-- --------------------------------------------------------

--
-- Table structure for table `t_footer`
--

CREATE TABLE `t_footer` (
  `id` int(11) NOT NULL,
  `copyright` varchar(150) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `t_footer`
--

INSERT INTO `t_footer` (`id`, `copyright`) VALUES
(1, '');

-- --------------------------------------------------------

--
-- Table structure for table `t_gallery`
--

CREATE TABLE `t_gallery` (
  `id` int(100) NOT NULL,
  `id_album` int(100) NOT NULL DEFAULT '0',
  `title` varchar(200) NOT NULL,
  `seotitle` varchar(200) NOT NULL,
  `picture` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `t_gallery`
--

INSERT INTO `t_gallery` (`id`, `id_album`, `title`, `seotitle`, `picture`) VALUES
(1, 1, 'Nature2', 'nature2-8934506721', 'gallery/nature-1.jpg'),
(2, 1, 'Nature3', 'nature3-8527641309', 'gallery/nature-2.jpg'),
(3, 1, 'Nature4', 'nature4-5897463120', 'gallery/nature-3.jpg'),
(4, 1, 'Nature5', 'nature5-9847502136', 'gallery/nature-4.jpg'),
(5, 1, 'Nature6', 'nature6-3582649071', 'gallery/nature-5.jpg'),
(6, 2, 'Vintage2', 'vintage2-2906751438', 'gallery/vintage-1.jpg'),
(7, 2, 'Vintage3', 'vintage3-4170583296', 'gallery/vintage-2.jpg'),
(8, 2, 'Vintage4', 'vintage4-9208513647', 'gallery/vintage-3.jpg'),
(9, 2, 'Vintage5', 'vintage5-9587624310', 'gallery/vintage-4.jpg'),
(10, 2, 'Vintage6', 'vintage6-2651483079', 'gallery/vintage-5.jpg'),
(11, 2, 'Vintage7', 'vintage7-4936502781', 'gallery/vintage-6.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `t_homepage`
--

CREATE TABLE `t_homepage` (
  `id` int(100) NOT NULL,
  `judul` varchar(50) NOT NULL,
  `section` varchar(150) NOT NULL,
  `content` text NOT NULL,
  `picture` text NOT NULL,
  `jenis` varchar(150) NOT NULL,
  `active` enum('Y','N') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `t_homepage`
--

INSERT INTO `t_homepage` (`id`, `judul`, `section`, `content`, `picture`, `jenis`, `active`) VALUES
(1, 'Step Register', 'Langkah awal untuk memulai kesuksesan bersama', '&lt;p&gt;Daftar sekarang, dapatkan akses edukasi gratis untuk semua level&lt;/p&gt;', '', 'step', 'Y'),
(2, 'Account Type', 'Semua orang mempunyai kesempatan sukses di trading emas', '&lt;p&gt;Gratis materi edukasi trading emas&amp;nbsp;&lt;/p&gt;', '', 'typeaccount', 'Y'),
(4, 'News Title', 'In-Depth daily market analysis', '&lt;p&gt;Get timely news &amp;amp; analysis from top financial experts&lt;/p&gt;', '', 'news', 'Y'),
(5, 'News Footer', 'We are in The Press', '', 'PARALAX.jpg', 'news2', 'Y'),
(6, 'Market Titile', 'online stocks, currencies &amp; commodities trades 3', '&lt;p&gt;Tradingpas memberikan pelatihan kepada Anda bagaimana memabaca market, sebagai analisa Anda untuk trading sendiri.&lt;/p&gt;', '', 'market', 'Y'),
(7, 'Risk Warning', 'Risk Warning', '&lt;p&gt;Before you start trading, you need to fully understand the risks involved in the money market, trading on margin, and also have to know your level of knowledge. Any form of copying, reproduction, and any material from this website is only available with written permission..&lt;/p&gt;', '', 'cta', 'Y'),
(8, 'Trading Platform', 'Trade on world class platform', '&lt;p&gt;30,000 lebih pengguna telah menggunakan platform trading MT4 untuk bertransaksi berbagai macam komditas, gunakan platform trading sesuai dengan kenyamanaan, kami sediakan untuk Anda.&lt;/p&gt;', '', 'riskwarning', 'Y'),
(9, 'Account Type', 'Complete package for every traders', '&lt;p&gt;We give each client the freedom to determine the type of account they are interested in. You are free to choose an account according to your trading convenience&lt;/p&gt;', '', 'sdmtrainer', 'Y'),
(10, 'Why Choose Us', 'BEST BROKER STP', '&lt;p&gt;Alasan kenapa para trader menggunakan broker kami&lt;/p&gt;', 'Kami berkomitemen untuk mengedukasi bagaimana cara cerdas investasi di industri keungan dengan cara cerdas', 'aboutus', 'Y');

-- --------------------------------------------------------

--
-- Table structure for table `t_internal_transfer`
--

CREATE TABLE `t_internal_transfer` (
  `id` int(11) NOT NULL,
  `from_tf` varchar(250) NOT NULL,
  `to_tf` varchar(250) NOT NULL,
  `amount` double(20,4) NOT NULL,
  `user_id` int(11) NOT NULL,
  `status` enum('Pending','Approved','Rejected') NOT NULL,
  `keterangan` text NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `t_internal_transfer`
--

INSERT INTO `t_internal_transfer` (`id`, `from_tf`, `to_tf`, `amount`, `user_id`, `status`, `keterangan`, `date`) VALUES
(1, 'Wallet', '1674571517', 500.0000, 6, 'Approved', 'internal transfer wallet to personal account1674571517', '2021-11-02 09:33:18'),
(2, 'Wallet', '1674571518', 500.0000, 8, 'Approved', 'internal transfer wallet to personal account1674571518', '2021-11-02 09:42:21'),
(3, 'Wallet', '1674571521', 500.0000, 11, 'Approved', 'internal transfer wallet to personal account1674571521', '2021-11-02 11:50:20'),
(4, 'Wallet', '1674571520', 500.0000, 7, 'Approved', 'internal transfer wallet to personal account1674571520', '2021-11-02 11:50:44'),
(5, 'Wallet', '1674571519', 500.0000, 10, 'Approved', 'internal transfer wallet to personal account1674571519', '2021-11-02 11:51:24'),
(6, 'Wallet', '1674571522', 500.0000, 9, 'Approved', 'internal transfer wallet to personal account1674571522', '2021-11-02 11:51:46');

-- --------------------------------------------------------

--
-- Table structure for table `t_landingpage`
--

CREATE TABLE `t_landingpage` (
  `id` int(100) NOT NULL,
  `judul` varchar(50) NOT NULL,
  `section` varchar(150) NOT NULL,
  `content` text NOT NULL,
  `picture` text NOT NULL,
  `jenis` varchar(150) NOT NULL,
  `active` enum('Y','N') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `t_landingpage`
--

INSERT INTO `t_landingpage` (`id`, `judul`, `section`, `content`, `picture`, `jenis`, `active`) VALUES
(1, '', 'Content Holder 1', '&lt;p style=&quot;text-align: justify;&quot;&gt;&lt;span style=&quot;color: #ffffff;&quot;&gt;&lt;span style=&quot;font-size: 26px; background-color: #ff6600;&quot;&gt;&lt;strong&gt;&lt;span class=&quot;badge&quot;&gt;OPEN MIND BISNIS ONLINE&lt;/span&gt;&lt;/strong&gt;&lt;/span&gt;&lt;strong&gt;&lt;span style=&quot;font-size: 24px;&quot;&gt; #KerjaDiRumahAja&lt;/span&gt;&lt;span style=&quot;font-size: 1rem;&quot;&gt;&amp;nbsp;&lt;/span&gt;&lt;/strong&gt;&lt;/span&gt;&lt;/p&gt;\r\n&lt;p style=&quot;text-align: justify;&quot;&gt;&lt;span style=&quot;color: #333333; font-size: 24px;&quot;&gt;&lt;img class=&quot;img-fluid rounded&quot; src=&quot;https://bisnis.websitepintar.com/content/uploads/website-murah-websitepintar.jpg?1579481667476&quot; alt=&quot;&quot; width=&quot;400&quot; height=&quot;86&quot; /&gt;&lt;/span&gt;&lt;/p&gt;\r\n&lt;p style=&quot;text-align: justify;&quot;&gt;&lt;span style=&quot;font-size: 16px; color: #ffffff;&quot;&gt;Bangun bisnis dari rumah &lt;strong&gt;APAPUN LATAR BELAKANG ANDA! &lt;/strong&gt;Mau karyawan, pegawai negeri, wirausaha, agent asuransi, toko kelontong apapaun!&lt;/span&gt;&lt;/p&gt;\r\n&lt;p&gt;&lt;span style=&quot;font-size: 18px; color: #ffffff;&quot;&gt;&lt;strong&gt;Kamu mau dapat uang dari rumah? Gampang!!!&lt;/strong&gt;&lt;/span&gt;&lt;/p&gt;\r\n&lt;p style=&quot;text-align: justify;&quot;&gt;&lt;span style=&quot;color: #ffff00;&quot;&gt;&lt;img class=&quot;img-fluid rounded&quot; style=&quot;margin-top: -40px;&quot; src=&quot;https://bisnis.websitepintar.com/content/uploads/line2.png?1579215633123&quot; alt=&quot;websitepintar.com&quot; width=&quot;400&quot; height=&quot;8&quot; /&gt;&lt;/span&gt;&lt;/p&gt;\r\n&lt;p&gt;&lt;span style=&quot;color: #ffffff;&quot;&gt;&lt;a style=&quot;color: #ffffff;&quot; href=&quot;https://www.bisnis.websitepintar.com/#buatwebsitesekarang&quot; rel=&quot;noopener&quot; data-offset=&quot;80&quot;&gt; &lt;button class=&quot;btn btn-rounded btn-reveal btn-warning&quot; style=&quot;background-color: #ef5f0b;&quot; type=&quot;button&quot;&gt;Join Sekolah YESS&lt;/button&gt;&lt;/a&gt;&lt;/span&gt;&lt;/p&gt;', 'karyawati2.png', 'bagian1', 'Y'),
(2, '', 'Content Holder 2', '&lt;p&gt;Kami sangat seneng bisa membantu &amp;amp; bermitra dengan Anda&lt;/p&gt;', '', 'bagian2', 'Y'),
(4, '', 'Content Holder 3', '&lt;p&gt;Kami akan selalu meberikan fasilitas terbaik untuk anda beribadah&lt;/p&gt;', '', 'bagian3', 'Y'),
(5, 'PERMASALAHAN', 'Content Holder 4', '&lt;p&gt;&lt;span style=&quot;font-size: 18px;&quot;&gt;&lt;span style=&quot;color: #000000;&quot;&gt;&lt;strong&gt;Tunggu Sebentar..&lt;/strong&gt; &lt;/span&gt;&lt;span style=&quot;color: #333333;&quot;&gt;Sebelum Anda melanjutkan membaca, sebagian dari Anda mungkin mengalami beberapa hal dibawah ini:&lt;/span&gt;&lt;/span&gt;&lt;/p&gt;\r\n&lt;p&gt;&lt;span style=&quot;color: #333333; font-size: 18px; text-align: justify;&quot;&gt;&lt;span style=&quot;font-weight: 400; font-size: 18px; color: #333333;&quot;&gt;&lt;img src=&quot;https://bisnis.websitepintar.com/content/uploads/hand.png?1579141057856&quot; alt=&quot;&quot; width=&quot;24&quot; height=&quot;24&quot; /&gt;&lt;/span&gt; &lt;/span&gt;&lt;span style=&quot;color: #333333; font-size: 18px; text-align: justify;&quot;&gt;Mau punya website tapi harga pembuatan website mahal kayanya&lt;/span&gt;&lt;/p&gt;\r\n&lt;p&gt;&lt;span style=&quot;font-weight: 400; font-size: 18px; color: #333333;&quot;&gt;&lt;img src=&quot;https://bisnis.websitepintar.com/content/uploads/hand.png?1579141057856&quot; alt=&quot;&quot; width=&quot;24&quot; height=&quot;24&quot; /&gt; Mau bikin sendiri website tidak ada waktu untuk belajar bikin website&lt;/span&gt;&lt;/p&gt;\r\n&lt;p&gt;&lt;span style=&quot;font-weight: 400; font-size: 18px; color: #333333;&quot;&gt;&lt;img src=&quot;https://bisnis.websitepintar.com/content/uploads/hand.png?1579141057856&quot; alt=&quot;&quot; width=&quot;24&quot; height=&quot;24&quot; /&gt; Pernah punya website tapi sepi pengunjung :(&lt;/span&gt;&lt;/p&gt;\r\n&lt;p&gt;&lt;span style=&quot;font-weight: 400; font-size: 18px; color: #333333;&quot;&gt;&lt;img src=&quot;https://bisnis.websitepintar.com/content/uploads/hand.png?1579141057856&quot; alt=&quot;&quot; width=&quot;24&quot; height=&quot;24&quot; /&gt; Pernah punya website tapi tidak tahu cara mendatangkan pengunjung&lt;/span&gt;&lt;/p&gt;\r\n&lt;p&gt;&lt;span style=&quot;font-weight: 400; font-size: 18px; color: #333333;&quot;&gt;&lt;img src=&quot;https://bisnis.websitepintar.com/content/uploads/hand.png?1579141057856&quot; alt=&quot;&quot; width=&quot;24&quot; height=&quot;24&quot; /&gt; Bingung cara untuk mendatangkan pembeli dari internet&lt;/span&gt;&lt;/p&gt;\r\n&lt;p&gt;&lt;span style=&quot;font-weight: 400; font-size: 18px; color: #333333;&quot;&gt;&lt;img src=&quot;https://bisnis.websitepintar.com/content/uploads/hand.png?1579141057856&quot; alt=&quot;&quot; width=&quot;24&quot; height=&quot;24&quot; /&gt; Mau punya sampingan usaha dari online tapi tidak tahu mulai dari mana&lt;/span&gt;&lt;/p&gt;\r\n&lt;p&gt;&lt;span style=&quot;font-weight: 400; font-size: 18px; color: #333333;&quot;&gt;&lt;img src=&quot;https://bisnis.websitepintar.com/content/uploads/hand.png?1579141057856&quot; alt=&quot;&quot; width=&quot;24&quot; height=&quot;24&quot; /&gt; Merasa gaptek sama internet, cuman bisa whatsapp-an sama instagram-an aja&lt;/span&gt;&lt;/p&gt;\r\n&lt;p&gt;&lt;span style=&quot;font-weight: 400; font-size: 18px; color: #000000;&quot;&gt;&lt;span style=&quot;font-weight: 600; color: #333333;&quot;&gt;jika salah satu jawabanya &lt;/span&gt;&lt;span style=&quot;color: #ff6600;&quot;&gt;&lt;strong&gt;&amp;ldquo;IYA&amp;rdquo;&lt;/strong&gt;&lt;/span&gt;&lt;span style=&quot;font-weight: 600;&quot;&gt;,&lt;span style=&quot;color: #333333;&quot;&gt; saya akan berikan &lt;/span&gt;&lt;/span&gt;&lt;span style=&quot;color: #333333;&quot;&gt;&lt;strong&gt;SOLUSI &lt;/strong&gt;&lt;span style=&quot;font-weight: 600;&quot;&gt;nya yang &lt;/span&gt;&lt;strong&gt;DIJAMIN WORK&lt;/strong&gt;&lt;span style=&quot;font-weight: 600;&quot;&gt; jika anda menjalankan, Silahkan dilanjutkan bacanya tidak sampai 5 menit!&lt;/span&gt;&lt;/span&gt;&lt;/span&gt;&lt;/p&gt;', 'masalah.jpg', 'bagian4', 'Y'),
(6, '', 'Content Holder 5', '&lt;p&gt;&lt;span style=&quot;font-size: 18px;&quot;&gt;&lt;span style=&quot;color: #000000;&quot;&gt;&lt;strong&gt;Tunggu Sebentar..&lt;/strong&gt; &lt;/span&gt;&lt;span style=&quot;color: #333333;&quot;&gt;Sebelum Anda melanjutkan membaca, sebagian dari Anda mungkin mengalami beberapa hal dibawah ini:&lt;/span&gt;&lt;/span&gt;&lt;/p&gt;\r\n&lt;p&gt;&lt;span style=&quot;color: #333333; font-size: 18px; text-align: justify;&quot;&gt;&lt;span style=&quot;font-weight: 400; font-size: 18px; color: #333333;&quot;&gt;&lt;img src=&quot;https://bisnis.websitepintar.com/content/uploads/hand.png?1579141057856&quot; alt=&quot;&quot; width=&quot;24&quot; height=&quot;24&quot; /&gt;&lt;/span&gt; &lt;/span&gt;&lt;span style=&quot;color: #333333; font-size: 18px; text-align: justify;&quot;&gt;Mau punya website tapi harga pembuatan website mahal kayanya&lt;/span&gt;&lt;/p&gt;\r\n&lt;p&gt;&lt;span style=&quot;font-weight: 400; font-size: 18px; color: #333333;&quot;&gt;&lt;img src=&quot;https://bisnis.websitepintar.com/content/uploads/hand.png?1579141057856&quot; alt=&quot;&quot; width=&quot;24&quot; height=&quot;24&quot; /&gt; Mau bikin sendiri website tidak ada waktu untuk belajar bikin website&lt;/span&gt;&lt;/p&gt;\r\n&lt;p&gt;&lt;span style=&quot;font-weight: 400; font-size: 18px; color: #333333;&quot;&gt;&lt;img src=&quot;https://bisnis.websitepintar.com/content/uploads/hand.png?1579141057856&quot; alt=&quot;&quot; width=&quot;24&quot; height=&quot;24&quot; /&gt; Pernah punya website tapi sepi pengunjung :(&lt;/span&gt;&lt;/p&gt;\r\n&lt;p&gt;&lt;span style=&quot;font-weight: 400; font-size: 18px; color: #333333;&quot;&gt;&lt;img src=&quot;https://bisnis.websitepintar.com/content/uploads/hand.png?1579141057856&quot; alt=&quot;&quot; width=&quot;24&quot; height=&quot;24&quot; /&gt; Pernah punya website tapi tidak tahu cara mendatangkan pengunjung&lt;/span&gt;&lt;/p&gt;\r\n&lt;p&gt;&lt;span style=&quot;font-weight: 400; font-size: 18px; color: #333333;&quot;&gt;&lt;img src=&quot;https://bisnis.websitepintar.com/content/uploads/hand.png?1579141057856&quot; alt=&quot;&quot; width=&quot;24&quot; height=&quot;24&quot; /&gt; Bingung cara untuk mendatangkan pembeli dari internet&lt;/span&gt;&lt;/p&gt;\r\n&lt;p&gt;&lt;span style=&quot;font-weight: 400; font-size: 18px; color: #333333;&quot;&gt;&lt;img src=&quot;https://bisnis.websitepintar.com/content/uploads/hand.png?1579141057856&quot; alt=&quot;&quot; width=&quot;24&quot; height=&quot;24&quot; /&gt; Mau punya sampingan usaha dari online tapi tidak tahu mulai dari mana&lt;/span&gt;&lt;/p&gt;\r\n&lt;p&gt;&lt;span style=&quot;font-weight: 400; font-size: 18px; color: #333333;&quot;&gt;&lt;img src=&quot;https://bisnis.websitepintar.com/content/uploads/hand.png?1579141057856&quot; alt=&quot;&quot; width=&quot;24&quot; height=&quot;24&quot; /&gt; Merasa gaptek sama internet, cuman bisa whatsapp-an sama instagram-an aja&lt;/span&gt;&lt;/p&gt;\r\n&lt;p&gt;&lt;span style=&quot;font-weight: 400; font-size: 18px; color: #000000;&quot;&gt;&lt;span style=&quot;font-weight: 600; color: #333333;&quot;&gt;jika salah satu jawabanya &lt;/span&gt;&lt;span style=&quot;color: #ff6600;&quot;&gt;&lt;strong&gt;&amp;ldquo;IYA&amp;rdquo;&lt;/strong&gt;&lt;/span&gt;&lt;span style=&quot;font-weight: 600;&quot;&gt;,&lt;span style=&quot;color: #333333;&quot;&gt; saya akan berikan &lt;/span&gt;&lt;/span&gt;&lt;span style=&quot;color: #333333;&quot;&gt;&lt;strong&gt;SOLUSI &lt;/strong&gt;&lt;span style=&quot;font-weight: 600;&quot;&gt;nya yang &lt;/span&gt;&lt;strong&gt;DIJAMIN WORK&lt;/strong&gt;&lt;span style=&quot;font-weight: 600;&quot;&gt; jika anda menjalankan, Silahkan dilanjutkan bacanya tidak sampai 5 menit!&lt;/span&gt;&lt;/span&gt;&lt;/span&gt;&lt;/p&gt;', '', 'bagian5', 'Y'),
(7, '', 'Content Holder 6', '&lt;div class=&quot;row&quot;&gt;\r\n&lt;div class=&quot;col-lg-3 mt-3&quot;&gt;\r\n&lt;div class=&quot;card&quot;&gt;&lt;img class=&quot;card-img-top&quot; src=&quot;https://bisnis.websitepintar.com/content/uploads/demo-1-websitepintar.png&quot; alt=&quot;Website Murah WebsitePintar&quot; /&gt;\r\n&lt;div class=&quot;card-body&quot;&gt;\r\n&lt;h5 class=&quot;card-title&quot;&gt;Tema website franchise&lt;/h5&gt;\r\n&lt;p class=&quot;card-text&quot;&gt;Tema ini cocok digunakan untuk pemilik usaha franchsie, kuliner, MUA, Snack, katalog produk online, UMKM dan profile usaha lainnya&lt;/p&gt;\r\n&lt;span style=&quot;color: #0000ff;&quot;&gt;&lt;a class=&quot;card-link&quot; style=&quot;color: #0000ff;&quot; href=&quot;https://websitepintar.com/demo-profile-bisnis-1&quot; target=&quot;_blank&quot; rel=&quot;noopener&quot;&gt;Lihat Demo Website&lt;/a&gt;&lt;/span&gt;&lt;/div&gt;\r\n&lt;/div&gt;\r\n&lt;/div&gt;\r\n&lt;div class=&quot;col-lg-3 mt-3&quot;&gt;\r\n&lt;div class=&quot;card&quot;&gt;&lt;img class=&quot;card-img-top&quot; src=&quot;https://bisnis.websitepintar.com/content/uploads/demo-2-websitepintar.png&quot; alt=&quot;Website Murah WebsitePintar&quot; /&gt;\r\n&lt;div class=&quot;card-body&quot;&gt;\r\n&lt;h5 class=&quot;card-title&quot;&gt;Tema company profile&lt;/h5&gt;\r\n&lt;p class=&quot;card-text&quot;&gt;Tema website ini digunakan untuk jasa, konsultan bisnis, konsultan jasa, konsultan pajak dan untuk website jasa-jasa lainnya&lt;/p&gt;\r\n&lt;span style=&quot;color: #0000ff;&quot;&gt;&lt;a class=&quot;card-link&quot; style=&quot;color: #0000ff;&quot; href=&quot;https://websitepintar.com/demo-profile-bisnis-2&quot; target=&quot;_blank&quot; rel=&quot;noopener&quot;&gt;Lihat Demo Website&lt;/a&gt;&lt;/span&gt;&lt;/div&gt;\r\n&lt;/div&gt;\r\n&lt;/div&gt;\r\n&lt;div class=&quot;col-lg-3 mt-3&quot;&gt;\r\n&lt;div class=&quot;card&quot;&gt;&lt;img class=&quot;card-img-top&quot; src=&quot;https://bisnis.websitepintar.com/content/uploads/demo-3-websitepintar.png&quot; alt=&quot;Website Murah WebsitePintar.com&quot; /&gt;\r\n&lt;div class=&quot;card-body&quot;&gt;\r\n&lt;h5 class=&quot;card-title&quot;&gt;Tema Website Rental&lt;/h5&gt;\r\n&lt;p class=&quot;card-text&quot;&gt;Tema website ini cocok untuk jasa penyewaan kendaraan, penyewaaan tenda, tour &amp;amp; travel, jasa antar anak sekolah &amp;amp; jenis profesi usaha lain nya&lt;/p&gt;\r\n&lt;span style=&quot;color: #0000ff;&quot;&gt;&lt;a class=&quot;card-link&quot; style=&quot;color: #0000ff;&quot; href=&quot;https://websitepintar.com/demo-profile-bisnis-3&quot; target=&quot;_blank&quot; rel=&quot;noopener&quot;&gt;Lihat Demo Website&lt;/a&gt;&lt;/span&gt;&lt;/div&gt;\r\n&lt;/div&gt;\r\n&lt;/div&gt;\r\n&lt;div class=&quot;col-lg-3 mt-3&quot;&gt;\r\n&lt;div class=&quot;card&quot;&gt;&lt;img class=&quot;card-img-top mt-3&quot; src=&quot;https://bisnis.websitepintar.com/content/uploads/	\r\ndemo_yoga_websitepintar.png&quot; alt=&quot;Website Murah WebsitePintar.com&quot; /&gt;\r\n&lt;div class=&quot;card-body&quot;&gt;\r\n&lt;h5 class=&quot;card-title&quot;&gt;Tema Website Yoga&lt;/h5&gt;\r\n&lt;p class=&quot;card-text&quot;&gt;Tema ini cocok untuk company profile, yoga, salon, club senam, komunitas ataupun jenis profesi usaha lain nya&lt;/p&gt;\r\n&lt;span style=&quot;color: #0000ff;&quot;&gt;&lt;a class=&quot;card-link&quot; style=&quot;color: #0000ff;&quot; href=&quot;https://websitepintar.com/demo-profile-bisnis-15/&quot; target=&quot;_blank&quot; rel=&quot;noopener&quot;&gt;Lihat Demo Website&lt;/a&gt;&lt;/span&gt;&lt;/div&gt;\r\n&lt;/div&gt;\r\n&lt;/div&gt;\r\n&lt;/div&gt;\r\n&lt;div class=&quot;row&quot;&gt;\r\n&lt;div class=&quot;col-lg-3 mt-3&quot;&gt;\r\n&lt;div class=&quot;card&quot;&gt;&lt;img class=&quot;card-img-top mt-3&quot; src=&quot;https://bisnis.websitepintar.com/content/uploads/demo_onlineshop_1_websitepintar_promo.png&quot; alt=&quot;Website Murah WebsitePintar&quot; /&gt;\r\n&lt;div class=&quot;card-body&quot;&gt;\r\n&lt;h5 class=&quot;card-title&quot;&gt;Tema Onlineshop Hijab&lt;/h5&gt;\r\n&lt;p class=&quot;card-text&quot;&gt;Tema ini cocok untuk usaha menjual produk hijab, jilbab, sirwal, closthing ataupun usaha lain nya&lt;/p&gt;\r\n&lt;span style=&quot;color: #0000ff;&quot;&gt;&lt;a class=&quot;card-link&quot; style=&quot;color: #0000ff;&quot; href=&quot;https://websitepintar.com/olshop-1/&quot; target=&quot;_blank&quot; rel=&quot;noopener&quot;&gt;Lihat Demo Website&lt;/a&gt;&lt;/span&gt;&lt;/div&gt;\r\n&lt;/div&gt;\r\n&lt;/div&gt;\r\n&lt;div class=&quot;col-lg-3 mt-3&quot;&gt;\r\n&lt;div class=&quot;card&quot;&gt;&lt;img class=&quot;card-img-top mt-3&quot; src=&quot;https://bisnis.websitepintar.com/content/uploads/demo_onlinshop_2_websitepintar_promo.png&quot; alt=&quot;Website Murah WebsitePintar&quot; /&gt;\r\n&lt;div class=&quot;card-body&quot;&gt;\r\n&lt;h5 class=&quot;card-title&quot;&gt;Tema Onlinshop Costmetic&lt;/h5&gt;\r\n&lt;p class=&quot;card-text&quot;&gt;Tema cocok digunakan untuk jasa ekspidisi, jasa pengiriman, konsultan bisnis, konsultan jasa, konsultan pajak dan untuk website jasa-jasa lainnya&lt;/p&gt;\r\n&lt;span style=&quot;color: #0000ff;&quot;&gt;&lt;a class=&quot;card-link&quot; style=&quot;color: #0000ff;&quot; href=&quot;https://websitepintar.com/demo-profile-bisnis-6&quot; target=&quot;_blank&quot; rel=&quot;noopener&quot;&gt;Lihat Demo Website&lt;/a&gt;&lt;/span&gt;&lt;/div&gt;\r\n&lt;/div&gt;\r\n&lt;/div&gt;\r\n&lt;div class=&quot;col-lg-3 mt-3&quot;&gt;\r\n&lt;div class=&quot;card&quot;&gt;&lt;img class=&quot;card-img-top&quot; src=&quot;https://bisnis.websitepintar.com/content/uploads/demo-3-websitepintar.png&quot; alt=&quot;Website Murah WebsitePintar.com&quot; /&gt;\r\n&lt;div class=&quot;card-body&quot;&gt;\r\n&lt;h5 class=&quot;card-title&quot;&gt;Website Tema Profile Bisnis 7&lt;/h5&gt;\r\n&lt;p class=&quot;card-text&quot;&gt;Tema website ini cocok untuk jasa penyewaan kendaraan, penyewaaan tenda, tour &amp;amp; travel, jasa antar anak sekolah &amp;amp; jenis profesi usaha lain nya&lt;/p&gt;\r\n&lt;span style=&quot;color: #0000ff;&quot;&gt;&lt;a class=&quot;card-link&quot; style=&quot;color: #0000ff;&quot; href=&quot;https://websitepintar.com/demo-profile-bisnis-7&quot; target=&quot;_blank&quot; rel=&quot;noopener&quot;&gt;Lihat Demo Website&lt;/a&gt;&lt;/span&gt;&lt;/div&gt;\r\n&lt;/div&gt;\r\n&lt;/div&gt;\r\n&lt;div class=&quot;col-lg-3 mt-3&quot;&gt;\r\n&lt;div class=&quot;card&quot;&gt;&lt;img class=&quot;card-img-top mt-3&quot; src=&quot;https://bisnis.websitepintar.com/content/uploads/	\r\ndemo_onlineshop_4_websitepintar.png&quot; alt=&quot;Website Murah WebsitePintar.com&quot; /&gt;\r\n&lt;div class=&quot;card-body&quot;&gt;\r\n&lt;h5 class=&quot;card-title&quot;&gt;Tema Onlineshop Baju Anak&lt;/h5&gt;\r\n&lt;p class=&quot;card-text&quot;&gt;Tema onlinesbop ini cocok untuk usaha menjual produk-produk baju anak, mainan anak, edukasi anak ataupun usaha lain nya&lt;/p&gt;\r\n&lt;span style=&quot;color: #0000ff;&quot;&gt;&lt;a class=&quot;card-link&quot; style=&quot;color: #0000ff;&quot; href=&quot;https://websitepintar.com/olshop-4/&quot; target=&quot;_blank&quot; rel=&quot;noopener&quot;&gt;Lihat Demo Website&lt;/a&gt;&lt;/span&gt;&lt;/div&gt;\r\n&lt;/div&gt;\r\n&lt;/div&gt;\r\n&lt;/div&gt;\r\n&lt;p&gt;===========&lt;/p&gt;\r\n&lt;p style=&quot;text-align: center;&quot;&gt;&amp;nbsp;&lt;/p&gt;\r\n&lt;p style=&quot;text-align: center;&quot;&gt;&lt;span style=&quot;text-decoration: underline;&quot;&gt;&lt;span style=&quot;color: #800000; font-size: 24px; text-decoration: underline;&quot;&gt;Dan masih banyak tema lainnya, Tema website ini bisa Anda sesuaikan dengan bisnis Anda&lt;/span&gt;&lt;/span&gt;&lt;/p&gt;\r\n&lt;div class=&quot;youtube&quot;&gt;&amp;nbsp;&lt;/div&gt;\r\n&lt;p style=&quot;text-align: center;&quot;&gt;&lt;span style=&quot;text-decoration: underline;&quot;&gt;&lt;span style=&quot;color: #800000; font-size: 24px; text-decoration: underline;&quot;&gt;&lt;iframe src=&quot;https://www.youtube.com/embed/dNttDm6Gxew&quot; width=&quot;640&quot; height=&quot;385&quot; frameborder=&quot;0&quot; allowfullscreen=&quot;allowfullscreen&quot;&gt; &lt;/iframe&gt;&lt;/span&gt;&lt;/span&gt;&lt;/p&gt;\r\n&lt;p style=&quot;text-align: center;&quot;&gt;&lt;span style=&quot;text-decoration: underline;&quot;&gt;&lt;span style=&quot;color: #800000; font-size: 24px; text-decoration: underline;&quot;&gt;Edit website pun sudah semudah ini, lihat video nya!&lt;/span&gt;&lt;/span&gt;&lt;/p&gt;\r\n&lt;p style=&quot;text-align: center;&quot;&gt;&lt;span style=&quot;color: #800000; font-size: 36px;&quot;&gt;&lt;strong&gt;Berapa Harganya?&lt;/strong&gt;&lt;/span&gt;&lt;/p&gt;\r\n&lt;h2 style=&quot;text-align: center;&quot;&gt;&lt;span style=&quot;color: #800000; font-size: 24px;&quot;&gt;&lt;strong&gt;&lt;span style=&quot;font-weight: 400; color: #000000;&quot;&gt;Sebentar jangan nanya harga dulu. Sebab saat Anda order website di WebsitePintar.com, Anda Akan Mendapatkan &lt;/span&gt;SUPER BONUS&lt;span style=&quot;font-weight: 400; color: #000000;&quot;&gt; yang &lt;/span&gt;AMAZING&lt;span style=&quot;font-weight: 400;&quot;&gt;, &lt;span style=&quot;color: #000000;&quot;&gt;yakni&lt;/span&gt;:&lt;/span&gt;&lt;/strong&gt;&lt;/span&gt;&lt;/h2&gt;\r\n&lt;div class=&quot;row&quot;&gt;\r\n&lt;div class=&quot;col-lg-4 mt-3&quot;&gt;\r\n&lt;div class=&quot;card&quot;&gt;&lt;img class=&quot;card-img-top&quot; src=&quot;https://bisnis.websitepintar.com/content/uploads/E_Book_10_Strategi_Mendatangkan_Traffic_Ke_Website_WebsitePintarCom.png&quot; alt=&quot;10 Strategi Mendatangkan Trafic Ke Website&quot; /&gt;\r\n&lt;div class=&quot;card-body&quot;&gt;\r\n&lt;h5 class=&quot;card-title&quot;&gt;10 Strategi Mendatangkan Traffic&lt;/h5&gt;\r\n&lt;p class=&quot;card-text&quot;&gt;Datangkan traffic secara konsisten &amp;amp; ubah menjadi pelanggan loyal Anda&lt;/p&gt;\r\n&lt;h2&gt;&lt;span class=&quot;badge badge-danger&quot; style=&quot;font-size: 18px;&quot;&gt;SENILAI Rp 375.000&lt;/span&gt;&lt;/h2&gt;\r\n&lt;/div&gt;\r\n&lt;/div&gt;\r\n&lt;/div&gt;\r\n&lt;div class=&quot;col-lg-4 mt-3&quot;&gt;\r\n&lt;div class=&quot;card&quot;&gt;&lt;img class=&quot;card-img-top&quot; src=&quot;https://bisnis.websitepintar.com/content/uploads/ebook-tips-jitu-mendatangkan-pembeli.png&quot; alt=&quot;Cari Prosfek Dengan Digital Marketing&quot; /&gt;\r\n&lt;div class=&quot;card-body&quot;&gt;\r\n&lt;h5 class=&quot;card-title&quot;&gt;Cari Prosfek Dengan Digital Marketing&lt;/h5&gt;\r\n&lt;p class=&quot;card-text&quot;&gt;Bagaimana settings mindset &amp;amp; teknik untuk mencari prosfek dengan digital marketing&lt;/p&gt;\r\n&lt;h2&gt;&lt;span class=&quot;badge badge-danger&quot; style=&quot;font-size: 18px;&quot;&gt;SENILAI Rp 270.000&lt;/span&gt;&lt;/h2&gt;\r\n&lt;/div&gt;\r\n&lt;/div&gt;\r\n&lt;/div&gt;\r\n&lt;div class=&quot;col-lg-4 mt-3&quot;&gt;\r\n&lt;div class=&quot;card&quot;&gt;&lt;img class=&quot;card-img-top&quot; src=&quot;https://bisnis.websitepintar.com/content/uploads/	\r\nebook-mockup-cover-ebook-lp.png&quot; alt=&quot;Membuat Mockup Ebook Cover Powered By WebsitePintar&quot; /&gt;\r\n&lt;div class=&quot;card-body&quot;&gt;\r\n&lt;h5 class=&quot;card-title&quot;&gt;Membuat Mockup Ebook Cover Elegant&lt;/h5&gt;\r\n&lt;p class=&quot;card-text&quot;&gt;Bagaimana membuat mockup ebook cover dengan &lt;strong&gt;canva &amp;amp; phtoshop&lt;/strong&gt;&lt;/p&gt;\r\n&lt;h2&gt;&lt;span class=&quot;badge badge-danger&quot; style=&quot;font-size: 18px;&quot;&gt;SENILAI Rp 275.000&lt;/span&gt;&lt;/h2&gt;\r\n&lt;/div&gt;\r\n&lt;/div&gt;\r\n&lt;/div&gt;\r\n&lt;/div&gt;\r\n&lt;p style=&quot;text-align: center;&quot;&gt;&amp;nbsp;&lt;/p&gt;\r\n&lt;div class=&quot;row&quot;&gt;\r\n&lt;div class=&quot;col-lg-4 mt-3&quot;&gt;\r\n&lt;div class=&quot;card&quot;&gt;&lt;img class=&quot;card-img-top&quot; src=&quot;https://bisnis.websitepintar.com/content/uploads/\r\ne-book-alat-temput-pebisnis-online-websitepintar.png&quot; alt=&quot;Buat Website Murah Jakarta&quot; /&gt;\r\n&lt;div class=&quot;card-body&quot;&gt;\r\n&lt;h5 class=&quot;card-title&quot;&gt;Alat Tempur Pebisnis Online Sukses&lt;/h5&gt;\r\n&lt;p class=&quot;card-text&quot;&gt;Apa saja alat tempur yang digunakan para bisnis online sukses&lt;/p&gt;\r\n&lt;h2&gt;&lt;span class=&quot;badge badge-danger&quot; style=&quot;font-size: 18px;&quot;&gt;SENILAI Rp 285.000&lt;/span&gt;&lt;/h2&gt;\r\n&lt;/div&gt;\r\n&lt;/div&gt;\r\n&lt;/div&gt;\r\n&lt;div class=&quot;col-lg-4 mt-3&quot;&gt;\r\n&lt;div class=&quot;card&quot;&gt;&lt;img class=&quot;card-img-top&quot; src=&quot;https://bisnis.websitepintar.com/content/uploads/sosial-media-marketing-wp.png&quot; alt=&quot;Sosial Media Marketing&quot; /&gt;\r\n&lt;div class=&quot;card-body&quot;&gt;\r\n&lt;h5 class=&quot;card-title&quot;&gt;Sosial Media Marketing&lt;/h5&gt;\r\n&lt;p class=&quot;card-text&quot;&gt;Mercancang digital &amp;amp; sosial media marketing strategi yang POWERFUL&lt;/p&gt;\r\n&lt;h2&gt;&lt;span class=&quot;badge badge-danger&quot; style=&quot;font-size: 18px;&quot;&gt;SENILAI Rp 265.000&lt;/span&gt;&lt;/h2&gt;\r\n&lt;/div&gt;\r\n&lt;/div&gt;\r\n&lt;/div&gt;\r\n&lt;div class=&quot;col-lg-4 mt-3&quot;&gt;\r\n&lt;div class=&quot;card&quot;&gt;&lt;img class=&quot;card-img-top&quot; src=&quot;https://bisnis.websitepintar.com/content/uploads/7-kiat-sukses-jualan-online.png&quot; alt=&quot;7 Kiat Sukses Jualan Online&quot; /&gt;\r\n&lt;div class=&quot;card-body&quot;&gt;\r\n&lt;h5 class=&quot;card-title&quot;&gt;7 Kias Sukses Jualan Online&lt;/h5&gt;\r\n&lt;p class=&quot;card-text&quot;&gt;Bedah bagaimana kiat-kiat sukses untuk jualan online yang profitable&lt;/p&gt;\r\n&lt;h2&gt;&lt;span class=&quot;badge badge-danger&quot; style=&quot;font-size: 18px;&quot;&gt;SENILAI Rp 255.000&lt;/span&gt;&lt;/h2&gt;\r\n&lt;/div&gt;\r\n&lt;/div&gt;\r\n&lt;/div&gt;\r\n&lt;/div&gt;\r\n&lt;p&gt;&amp;nbsp;&lt;/p&gt;\r\n&lt;h2&gt;&lt;span style=&quot;color: #000000;&quot;&gt;&lt;strong&gt;&lt;span style=&quot;font-size: 24px;&quot;&gt;Bonus-bonus &lt;span style=&quot;color: #ff0000;&quot;&gt;senilai Rp 1.725.000&lt;/span&gt; diatas bisa Anda dapatkan secara Free alias &lt;span style=&quot;color: #333399;&quot;&gt;GRATIS &lt;span style=&quot;color: #000000;&quot;&gt;yang akan dikirimkan untuk Anda&lt;/span&gt;&lt;/span&gt;&lt;/span&gt;&lt;/strong&gt;&lt;/span&gt;&lt;/h2&gt;', '', 'bagian6', 'Y'),
(8, '', 'Content Holder 7', '&lt;div class=&quot;container&quot;&gt;\r\n&lt;div class=&quot;container&quot;&gt;\r\n&lt;h2 style=&quot;text-align: center;&quot; data-selector=&quot;Footer&quot;&gt;&lt;span style=&quot;color: #999999;&quot;&gt;Dengan&amp;nbsp;&lt;strong&gt;SEGUDANG KEUNTUNGAN&lt;/strong&gt;&amp;nbsp;diatas ditambah bonus ebook senilai&amp;nbsp;Rp 1.725.000&lt;/span&gt;&lt;br /&gt;&lt;span style=&quot;color: #999999;&quot;&gt;Kira-kira berapa biaya pembuatan website yang harus Anda bayarkan?&lt;/span&gt;&lt;br /&gt;&lt;span style=&quot;color: #999999;&quot;&gt;20 juta? 15 juta? Atau 10 juta ?&lt;/span&gt;&lt;/h2&gt;\r\n&lt;p style=&quot;text-align: center;&quot;&gt;&amp;nbsp;&lt;/p&gt;\r\n&lt;p style=&quot;text-align: center;&quot;&gt;&lt;span style=&quot;color: #999999;&quot;&gt;Karena kami percaya, Anda akan melihat ini sebagai peluang untuk usaha Anda&lt;/span&gt;&lt;br /&gt;&lt;span style=&quot;color: #999999;&quot;&gt;maka kami putuskan biaya pembuatan website&amp;nbsp;&lt;strong&gt;PAKET PREMIUM&lt;/strong&gt;&amp;nbsp;&lt;strong&gt;hanya Rp 5.000.000,-&lt;/strong&gt;&lt;/span&gt;&lt;/p&gt;\r\n&lt;p style=&quot;text-align: center;&quot;&gt;&amp;nbsp;&lt;/p&gt;\r\n&lt;p style=&quot;text-align: center;&quot;&gt;&lt;span style=&quot;color: #999999;&quot;&gt;&lt;strong&gt;TAPI ... SPESIAL&lt;/strong&gt;&amp;nbsp;untuk Anda yang Daftar Sekarang&amp;nbsp;&amp;nbsp;dan melakukan pembayaran&lt;/span&gt;&lt;br /&gt;&lt;span style=&quot;color: #999999;&quot;&gt;selambatnya&amp;nbsp;Senin, 11 Mei 2020&amp;nbsp;, &amp;nbsp;maka kami akan memberikan&lt;/span&gt;&lt;/p&gt;\r\n&lt;p style=&quot;text-align: center;&quot;&gt;&lt;span style=&quot;color: #999999;&quot;&gt;&lt;img class=&quot;img-fluid rounded&quot; src=&quot;https://bisnis.websitepintar.com/content/uploads/line2.png?1579396678017&quot; alt=&quot;&quot; width=&quot;909&quot; height=&quot;18&quot; /&gt;&lt;/span&gt;&lt;/p&gt;\r\n&lt;h3 style=&quot;text-align: center;&quot; data-selector=&quot;h5&quot;&gt;&lt;span class=&quot;text-highlight&quot; style=&quot;color: #999999;&quot;&gt;&lt;strong&gt;POTONGAN HARGA SEBESAR 50%&lt;/strong&gt;&lt;/span&gt;&lt;/h3&gt;\r\n&lt;p style=&quot;text-align: center;&quot;&gt;&lt;span style=&quot;color: #999999;&quot;&gt;Jadi Anda cukup ber-investasi :&lt;/span&gt;&lt;/p&gt;\r\n&lt;p style=&quot;text-align: center;&quot;&gt;&lt;span style=&quot;color: #999999;&quot;&gt;&lt;strong&gt;Rp 2.500.000,-&amp;nbsp;&lt;/strong&gt;&lt;/span&gt;&lt;/p&gt;\r\n&lt;p style=&quot;text-align: center;&quot;&gt;&lt;span style=&quot;color: #999999;&quot;&gt;&lt;img class=&quot;img-fluid rounded&quot; src=&quot;https://bisnis.websitepintar.com/content/uploads/line2.png?1579215633123&quot; alt=&quot;websitepintar.com&quot; width=&quot;900&quot; height=&quot;18&quot; /&gt;&lt;/span&gt;&lt;/p&gt;\r\n&lt;/div&gt;\r\n&lt;div class=&quot;row align-items-center&quot; style=&quot;text-align: center;&quot;&gt;\r\n&lt;div class=&quot;col-lg-12 text-center m-b-20&quot;&gt;\r\n&lt;h3&gt;&lt;span style=&quot;color: #999999;&quot;&gt;Bagi Anda yang Berani&amp;nbsp;&lt;strong&gt;Ambil Keputusan Cepat&lt;/strong&gt;&amp;nbsp;Anda Mendapatkan&lt;/span&gt;&lt;/h3&gt;\r\n&lt;h3&gt;&lt;span style=&quot;color: #999999;&quot;&gt;Diskon tambahan 15% jadi total diskon 65% atau senilai :&lt;/span&gt;&lt;/h3&gt;\r\n&lt;h2&gt;&lt;span style=&quot;color: #999999;&quot;&gt;Rp 1.750.000,-&lt;/span&gt;&lt;/h2&gt;\r\n&lt;h3&gt;&lt;span style=&quot;color: #999999;&quot;&gt;Untuk Anda&lt;/span&gt;&lt;br /&gt;&lt;span style=&quot;color: #999999;&quot;&gt;Berlaku Hanya Hingga&lt;/span&gt;&lt;/h3&gt;\r\n&lt;div class=&quot;countdown medium animated fadeInUp visible&quot; data-countdown=&quot;2020/05/06 1:00:51&quot; data-animate=&quot;fadeInUp&quot;&gt;\r\n&lt;div class=&quot;countdown-container&quot;&gt;\r\n&lt;div class=&quot;countdown-box&quot;&gt;\r\n&lt;div class=&quot;number&quot;&gt;&lt;span style=&quot;color: #999999;&quot;&gt;0&lt;/span&gt;&lt;/div&gt;\r\n&lt;span style=&quot;color: #999999;&quot;&gt;Day&lt;/span&gt;&lt;/div&gt;\r\n&lt;div class=&quot;countdown-box&quot;&gt;\r\n&lt;div class=&quot;number&quot;&gt;&lt;span style=&quot;color: #999999;&quot;&gt;10&lt;/span&gt;&lt;/div&gt;\r\n&lt;span style=&quot;color: #999999;&quot;&gt;Hours&lt;/span&gt;&lt;/div&gt;\r\n&lt;div class=&quot;countdown-box&quot;&gt;\r\n&lt;div class=&quot;number&quot;&gt;&lt;span style=&quot;color: #999999;&quot;&gt;13&lt;/span&gt;&lt;/div&gt;\r\n&lt;span style=&quot;color: #999999;&quot;&gt;Minutes&lt;/span&gt;&lt;/div&gt;\r\n&lt;div class=&quot;countdown-box&quot;&gt;\r\n&lt;div class=&quot;number&quot;&gt;&lt;span style=&quot;color: #999999;&quot;&gt;13&lt;/span&gt;&lt;/div&gt;\r\n&lt;span style=&quot;color: #999999;&quot;&gt;Seconds&lt;/span&gt;&lt;/div&gt;\r\n&lt;/div&gt;\r\n&lt;/div&gt;\r\n&lt;/div&gt;\r\n&lt;/div&gt;\r\n&lt;div class=&quot;container&quot;&gt;\r\n&lt;div class=&quot;row align-items-center&quot;&gt;\r\n&lt;div class=&quot;col-lg-12 text-center m-b-20&quot;&gt;\r\n&lt;h3 style=&quot;text-align: center;&quot;&gt;&lt;span style=&quot;color: #999999;&quot;&gt;Untuk memastikan Anda mendapatkan&amp;nbsp;&lt;strong&gt;DISKON 65%&lt;/strong&gt;&lt;/span&gt;&lt;/h3&gt;\r\n&lt;h3 style=&quot;text-align: center;&quot;&gt;&lt;span style=&quot;color: #999999;&quot;&gt;Segera isi formulir order website dibawah ini&lt;/span&gt;&lt;/h3&gt;\r\n&lt;/div&gt;\r\n&lt;/div&gt;\r\n&lt;/div&gt;\r\n&lt;/div&gt;', '', 'bagian7', 'Y'),
(9, '', 'Content Holder 8', '', '', 'bagian8', 'Y'),
(10, '', 'Content Holder 9', '', '', 'bagian9', 'Y'),
(11, '', 'Content Holder 10', '', '', 'bagian10', 'N');

-- --------------------------------------------------------

--
-- Table structure for table `t_language`
--

CREATE TABLE `t_language` (
  `id` int(11) NOT NULL,
  `title` varchar(100) NOT NULL,
  `seotitle` varchar(100) NOT NULL,
  `kode` varchar(100) NOT NULL,
  `active` enum('Y','N') NOT NULL DEFAULT 'N'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `t_language`
--

INSERT INTO `t_language` (`id`, `title`, `seotitle`, `kode`, `active`) VALUES
(1, 'Indonesia', 'indonesia', 'id', 'Y'),
(2, 'English', 'english', 'gb', 'Y');

-- --------------------------------------------------------

--
-- Table structure for table `t_mail`
--

CREATE TABLE `t_mail` (
  `id` int(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(80) NOT NULL,
  `subject` varchar(100) NOT NULL,
  `message` text NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `ip` varchar(50) NOT NULL,
  `active` enum('N','Y') NOT NULL DEFAULT 'N',
  `box` enum('in','out') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `t_menu`
--

CREATE TABLE `t_menu` (
  `id` int(100) NOT NULL,
  `parent_id` int(100) NOT NULL DEFAULT '0',
  `title` varchar(255) NOT NULL DEFAULT '',
  `url` varchar(255) NOT NULL DEFAULT '',
  `class` varchar(255) NOT NULL DEFAULT '',
  `position` int(100) NOT NULL,
  `group_id` tinyint(10) UNSIGNED NOT NULL DEFAULT '1',
  `active` enum('Y','N') NOT NULL DEFAULT 'N'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `t_menu`
--

INSERT INTO `t_menu` (`id`, `parent_id`, `title`, `url`, `class`, `position`, `group_id`, `active`) VALUES
(1, 0, 'Dashboard', 'home', 'fa fa-home', 3, 1, 'Y'),
(10, 0, 'Pages', 'pages', 'icon-file-text2', 18, 1, 'Y'),
(19, 0, 'Menu Manager', 'menumanager/?', 'icon-list ', 28, 1, 'Y'),
(20, 0, 'Users', 'user', 'icon-users2', 25, 1, 'Y'),
(23, 0, 'Level', 'user/level', 'icon-medal2 ', 26, 1, 'Y'),
(24, 0, 'Setting', 'setting', 'fa fa-gear', 29, 1, 'Y'),
(27, 0, 'Mail', 'mail', 'icon-envelop2', 23, 1, 'Y'),
(28, 0, 'Gallery', 'gallery', 'icon-images2 ', 20, 1, 'Y'),
(29, 0, 'Dashboard', 'home', 'fa fa-home', 2, 3, 'Y'),
(51, 0, 'File Manager', 'filemanager', 'icon-grid-alt', 21, 1, 'Y'),
(55, 0, 'Dashboard', 'home', 'fa fa-home', 2, 2, 'Y'),
(81, 0, 'Post', 'post', 'icon-book2', 13, 2, 'Y'),
(84, 0, 'Category', 'category', 'fa fa-folder-open-o', 14, 2, 'Y'),
(87, 0, 'Home', 'home', '', 1, 4, 'Y'),
(91, 0, 'Tag', 'tag', 'icon-price-tags2', 15, 2, 'Y'),
(92, 0, 'Comment', 'comment', 'icon-bubble9', 16, 2, 'Y'),
(93, 0, 'Pages', 'pages', 'icon-file-text2', 12, 2, 'Y'),
(94, 0, 'Gallery', 'gallery', 'icon-images2', 19, 2, 'Y'),
(95, 0, 'Mail', 'mail', 'icon-envelop2', 22, 2, 'Y'),
(96, 0, 'User', 'user', 'icon-users2', 24, 2, 'Y'),
(98, 0, 'File Manager', 'filemanager', 'icon-grid-alt', 20, 2, 'Y'),
(102, 0, 'Post', 'post', 'icon-book2', 4, 3, 'Y'),
(103, 0, 'Category', 'category', 'fa fa-folder-o', 5, 3, 'Y'),
(104, 0, 'Tag', 'tag', 'icon-price-tags2', 6, 3, 'Y'),
(105, 0, 'Gallery', 'gallery', 'icon-images2 ', 9, 3, 'Y'),
(108, 0, 'Comment', 'comment', 'icon-bubble9', 7, 3, 'Y'),
(109, 0, 'KABINET', '#', 'header', 2, 1, 'Y'),
(110, 0, 'CONTENT WEBSITE', '#', 'header', 13, 1, 'Y'),
(111, 0, 'MEDIA', '#', 'header', 19, 1, 'Y'),
(112, 0, 'USER', '#', 'header', 24, 1, 'Y'),
(113, 0, 'CONTACT', '#', 'header', 22, 1, 'Y'),
(114, 0, 'APPEARANCE', '#', 'header', 27, 1, 'Y'),
(117, 0, 'DASHBOARD', '#', 'header', 1, 2, 'Y'),
(118, 0, 'CONTENT', '#', 'header', 8, 2, 'Y'),
(119, 0, 'MEDIA', '#', 'header', 18, 2, 'Y'),
(120, 0, 'USER', '#', 'header', 23, 2, 'Y'),
(121, 0, 'CONTACT', '#', 'header', 21, 2, 'Y'),
(122, 0, 'DASHBOARD', '#', 'header', 1, 3, 'Y'),
(123, 0, 'CONTENT', '#', 'header', 3, 3, 'Y'),
(124, 0, 'MEDIA', '#', 'header', 8, 3, 'Y'),
(127, 0, 'Slider', 'slider', 'icon-images2', 14, 1, 'Y'),
(130, 0, 'Account Type', 'product', 'fa fa-vcard-o', 17, 1, 'Y'),
(132, 0, 'Homepage', 'homepage', 'fa fa-home', 15, 1, 'Y'),
(191, 0, '', '0', '', 1, 1, 'N'),
(222, 0, 'Homepage', 'homepage', 'fa fa-home', 9, 2, 'Y'),
(223, 0, 'Landingpage', 'landingpage', 'fa fa-home', 10, 2, 'Y'),
(224, 0, 'Product', 'product', 'icon-book2', 11, 2, 'Y'),
(225, 0, 'Web Analytics', 'web_analytics', 'fa fa-gear', 17, 2, 'Y'),
(227, 0, 'Transaksi', '', 'header', 4, 1, 'Y'),
(228, 0, 'Setting Kurs', 'rate', 'fa fa-dollar', 5, 1, 'Y'),
(229, 0, 'Deposit', 'deposit', 'fa fa-credit-card', 6, 1, 'Y'),
(230, 0, 'Withdrawal', 'withdrawal', 'fa fa-archive', 7, 1, 'Y'),
(231, 0, 'TRANSAKSI', '#', 'header', 3, 2, 'Y'),
(232, 0, 'Rate', 'rate', 'fa fa-dollar', 4, 2, 'Y'),
(234, 0, 'Deposit', 'deposit', 'fa fa-cloud-download', 6, 2, 'Y'),
(235, 0, 'Account Trading', 'account_trading', 'fa fa-address-card', 8, 1, 'Y'),
(236, 0, 'Account Trading', 'account_trading', 'fa fa-users', 5, 2, 'Y'),
(237, 0, 'Withdrawal', 'withdrawal', 'fa fa-cloud-upload', 7, 2, 'Y'),
(240, 0, 'Internal Transfer', 'internal_transfer', 'fa fa-exchange', 9, 1, 'Y'),
(244, 0, 'DATA NASABAH', '', 'header', 10, 1, 'Y'),
(245, 0, 'Members', 'member', 'fa fa-drivers-license-o', 11, 1, 'Y'),
(249, 0, 'Platform Trading', 'pages/platform-trading', '', 2, 4, 'Y'),
(250, 0, 'Contact us', 'contact', '', 3, 4, 'Y'),
(251, 0, 'Registration Step', 'step_registrasi', 'fa fa-file-text', 16, 1, 'Y'),
(252, 0, 'Upload CSV', 'mt/upload', 'fa fa-upload', 12, 1, 'Y');

-- --------------------------------------------------------

--
-- Table structure for table `t_menu_group`
--

CREATE TABLE `t_menu_group` (
  `id` int(100) NOT NULL,
  `title` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `t_menu_group`
--

INSERT INTO `t_menu_group` (`id`, `title`) VALUES
(1, 'Dashboard Super Admin'),
(2, 'Dashboard Admin'),
(3, 'Dashboard User'),
(4, 'Web');

-- --------------------------------------------------------

--
-- Table structure for table `t_pages`
--

CREATE TABLE `t_pages` (
  `id` int(100) NOT NULL,
  `title` varchar(200) NOT NULL,
  `seotitle` varchar(200) NOT NULL,
  `content` text NOT NULL,
  `picture` text NOT NULL,
  `active` enum('Y','N') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `t_pages`
--

INSERT INTO `t_pages` (`id`, `title`, `seotitle`, `content`, `picture`, `active`) VALUES
(8, 'Term And Conditions', 'term-and-conditions', '&lt;p style=&quot;text-align: justify;&quot;&gt;&lt;strong&gt;Resiko Perdagangan web&lt;/strong&gt;&lt;br /&gt;Ada risiko tertentu pada perdagangan berbasis internet. Yang mungkin mencakup tapi tidak terbatas pada, kegagalan dari perangkat keras, perangkat lunak, dan koneksi internet. Karena Money Market International tidak mengontrol penyedia internet, peralatan dan teknologi mereka, kecepatan koneksi internet atau keandalan, konfigurasi peralatan anda atau keandalan koneksinya, kami tidak dapat bertanggung jawab atas kegagalan komunikasi, distorsi atau keterlambatan ketika trading menggunakan Internet.&lt;/p&gt;\r\n&lt;p style=&quot;text-align: justify;&quot;&gt;&lt;strong&gt;Investasi Resiko Tinggi&lt;/strong&gt;&lt;br /&gt;Forex trading melibatkan resiko yang tinggi. Forex trading menghadapkan peserta pada risiko termasuk, tapi tidak terbatas pada, perubahan kondisi politik, faktor ekonomi, bencana alam dan faktor lainnya, yang semuanya dapat secara substansial mempengaruhi harga ketersediaan satu atau lebih mata uang asing. Trading spekulasi adalah prospek yang menantang, bahkan bagi mereka yang berpengalaman pasar dan memahami tentang resiko yang terlibat. Hanya dana yang dapat dialokasikan oleh seseorang pada investasi berisiko tinggi (misalnya, dana yang jika hilang tidak akan mempengaruhi standar orang hidup atau kesejahteraan finansial) yang seharusnya digunakan dalam trading. Dalam kasus dimana Klien sudah terbiasa hanya pada bentuk konservatif investasi di masa lalu, forex trading mungkin tidak sesuai untuk Klien tersebut. Seorang Klien harus memahami bahwa kerugian pada seluruh uang yang disimpan dapat terjadi, berikut sejumlah besar tambahan modal, memungkinkan pasar melawan posisi klien.&lt;/p&gt;\r\n&lt;p style=&quot;text-align: justify;&quot;&gt;&lt;strong&gt;Resiko Software&lt;/strong&gt;&lt;br /&gt;Software trading Metatrader 4 menggunakan mekanisme order entry yang canggih dan sistem pelacakan pesanan. LinggaFX melakukan yang terbaik untuk memenuhi trading anda sesuai dengan harga yang diminta. Trading Internet, terlepas dari bagaimana nyaman atau efisiennya tidak selalu mengurangi risiko yang terkait dengan perdagangan mata uang. Semua kutipan dan perdagangan tunduk pada syarat dan kondisi dari Perjanjian Klien.&lt;/p&gt;\r\n&lt;p style=&quot;text-align: justify;&quot;&gt;Resiko lainnya&lt;br /&gt;Money Market International tidak dan tidak dapat menjamin modal awal portofolio Nasabah atau nilainya setiap saat atau setiap uang yang diinvestasikan dalam instrumen keuangan.&lt;/p&gt;\r\n&lt;p style=&quot;text-align: justify;&quot;&gt;Klien tanpa syarat harus mengakui dan menerima bahwa ia menjalankan sebuah risiko besar terjadinya kerugian dan kerusakan akibat pembelian dan / atau penjualan Instrumen Keuangan dan menerima dan menyatakan bahwa dia bersedia untuk mengambil risiko ini.&lt;/p&gt;\r\n&lt;p style=&quot;text-align: justify;&quot;&gt;Klien tidak boleh terlibat dalam investasi langsung atau tidak langsung dalam Instrumen Keuangan kecuali ia tahu dan memahami resiko yang terlibat pada masing-masing Instrumen Keuangan.&lt;/p&gt;', 'in-team-background-1.png', 'Y'),
(10, 'Contact us', 'contact-us', '&lt;div class=&quot;uk-section&quot;&gt;\r\n&lt;div class=&quot;uk-container&quot;&gt;\r\n&lt;div class=&quot;uk-grid&quot;&gt;\r\n&lt;div class=&quot;uk-width-3-5@m&quot;&gt;\r\n&lt;h1 class=&quot;uk-margin-remove-bottom&quot;&gt;Contact Us&lt;/h1&gt;\r\n&lt;p&gt;&lt;strong&gt;Money Market International, LTD &lt;/strong&gt;&lt;/p&gt;\r\n&lt;p class=&quot;uk-text-lead uk-text-muted uk-margin-small-top&quot;&gt;Do not hesitate to reach out. Just fill in the contact form here and we&amp;rsquo;ll be sure to reply as fast as possible.&lt;/p&gt;\r\n&lt;p class=&quot;uk-text-lead uk-text-muted uk-margin-small-top&quot;&gt;&amp;nbsp;&lt;/p&gt;\r\n&lt;p class=&quot;uk-text-lead uk-text-muted uk-margin-small-top&quot;&gt;&lt;strong&gt;Office&lt;/strong&gt;&lt;/p&gt;\r\n&lt;p class=&quot;p1&quot;&gt;&lt;span class=&quot;s1&quot;&gt;Suite 305, Griffith Corporate Centre, Kingstown&lt;span class=&quot;Apple-converted-space&quot;&gt;&amp;nbsp;&lt;/span&gt;&lt;/span&gt;&lt;/p&gt;\r\n&lt;p class=&quot;p1&quot;&gt;&lt;span class=&quot;s1&quot;&gt;St. Vincent and the Grenadines&lt;/span&gt;&lt;/p&gt;\r\n&lt;/div&gt;\r\n&lt;div class=&quot;uk-width-1-1@m uk-margin-large-top&quot;&gt;\r\n&lt;div class=&quot;uk-grid uk-grid-large&quot; data-uk-grid=&quot;&quot;&gt;\r\n&lt;div class=&quot;uk-width-1-3@m uk-first-column&quot;&gt;\r\n&lt;h4 class=&quot;uk-margin-medium-top uk-margin-remove-bottom&quot;&gt;Message us&lt;/h4&gt;\r\n&lt;p class=&quot;uk-margin-small-top&quot;&gt;hello@moneymarketint.com&lt;br /&gt;+62 851-1338-3222&lt;/p&gt;\r\n&lt;div class=&quot;uk-margin-medium-top in-contact-socials&quot;&gt;&amp;nbsp;&lt;/div&gt;\r\n&lt;/div&gt;\r\n&lt;div class=&quot;uk-width-2-3@m&quot;&gt;\r\n&lt;div class=&quot;uk-margin-medium-left in-margin-remove-left@s&quot;&gt;&lt;form id=&quot;contact-form&quot; class=&quot;uk-form uk-grid-small uk-grid&quot; data-uk-grid=&quot;&quot;&gt;\r\n&lt;div class=&quot;uk-width-1-1 uk-grid-margin&quot;&gt;&amp;nbsp;&lt;/div&gt;\r\n&lt;/form&gt;&lt;/div&gt;\r\n&lt;/div&gt;\r\n&lt;/div&gt;\r\n&lt;/div&gt;\r\n&lt;/div&gt;\r\n&lt;/div&gt;\r\n&lt;/div&gt;', '', 'Y'),
(16, 'Risk Notice', 'risk-notice', '&lt;p style=&quot;text-align: justify;&quot;&gt;&lt;strong&gt;Resiko Perdagangan web&lt;/strong&gt;&lt;br /&gt;Ada risiko tertentu pada perdagangan berbasis internet. Yang mungkin mencakup tapi tidak terbatas pada, kegagalan dari perangkat keras, perangkat lunak, dan koneksi internet. Karena LinggaFX tidak mengontrol penyedia internet, peralatan dan teknologi mereka, kecepatan koneksi internet atau keandalan, konfigurasi peralatan anda atau keandalan koneksinya, kami tidak dapat bertanggung jawab atas kegagalan komunikasi, distorsi atau keterlambatan ketika trading menggunakan Internet.&lt;/p&gt;\r\n&lt;p style=&quot;text-align: justify;&quot;&gt;&lt;strong&gt;Investasi Resiko Tinggi&lt;/strong&gt;&lt;br /&gt;Forex trading melibatkan resiko yang tinggi. Forex trading menghadapkan peserta pada risiko termasuk, tapi tidak terbatas pada, perubahan kondisi politik, faktor ekonomi, bencana alam dan faktor lainnya, yang semuanya dapat secara substansial mempengaruhi harga ketersediaan satu atau lebih mata uang asing. Trading spekulasi adalah prospek yang menantang, bahkan bagi mereka yang berpengalaman pasar dan memahami tentang resiko yang terlibat. Hanya dana yang dapat dialokasikan oleh seseorang pada investasi berisiko tinggi (misalnya, dana yang jika hilang tidak akan mempengaruhi standar orang hidup atau kesejahteraan finansial) yang seharusnya digunakan dalam trading. Dalam kasus dimana Klien sudah terbiasa hanya pada bentuk konservatif investasi di masa lalu, forex trading mungkin tidak sesuai untuk Klien tersebut. Seorang Klien harus memahami bahwa kerugian pada seluruh uang yang disimpan dapat terjadi, berikut sejumlah besar tambahan modal, memungkinkan pasar melawan posisi klien.&lt;/p&gt;\r\n&lt;p style=&quot;text-align: justify;&quot;&gt;&lt;strong&gt;Resiko Software&lt;/strong&gt;&lt;br /&gt;Software trading Metatrader 4 menggunakan mekanisme order entry yang canggih dan sistem pelacakan pesanan. Money Market International melakukan yang terbaik untuk memenuhi trading anda sesuai dengan harga yang diminta. Trading Internet, terlepas dari bagaimana nyaman atau efisiennya tidak selalu mengurangi risiko yang terkait dengan perdagangan mata uang. Semua kutipan dan perdagangan tunduk pada syarat dan kondisi dari Perjanjian Klien.&lt;/p&gt;\r\n&lt;p style=&quot;text-align: justify;&quot;&gt;Resiko lainnya&lt;br /&gt;Money Market International tidak dan tidak dapat menjamin modal awal portofolio Nasabah atau nilainya setiap saat atau setiap uang yang diinvestasikan dalam instrumen keuangan.&lt;/p&gt;\r\n&lt;p style=&quot;text-align: justify;&quot;&gt;Klien tanpa syarat harus mengakui dan menerima bahwa ia menjalankan sebuah risiko besar terjadinya kerugian dan kerusakan akibat pembelian dan / atau penjualan Instrumen Keuangan dan menerima dan menyatakan bahwa dia bersedia untuk mengambil risiko ini.&lt;/p&gt;\r\n&lt;p style=&quot;text-align: justify;&quot;&gt;Klien tidak boleh terlibat dalam investasi langsung atau tidak langsung dalam Instrumen Keuangan kecuali ia tahu dan memahami resiko yang terlibat pada masing-masing Instrumen Keuangan.&lt;/p&gt;', 'in-team-background-1.png', 'Y'),
(17, 'Client Aggrement', 'client-aggrement', '&lt;div id=&quot;lipsum&quot;&gt;\r\n&lt;p style=&quot;text-align: justify;&quot;&gt;&lt;strong&gt;Lorem ipsum dolor sit amet, consectetur adipiscing&lt;/strong&gt; elit. Sed a rutrum felis, at posuere nisi. Proin non pellentesque metus. Donec sed sem eget nisl hendrerit tempus at eu mauris. Duis at ex vitae orci rhoncus placerat. In suscipit risus et dolor iaculis, non vulputate dolor ultricies. Maecenas non diam ac tortor gravida tempus eu ac turpis. Nam libero mauris, ornare vitae aliquam eu, mollis at massa. Pellentesque sem tellus, pulvinar at dui eu, finibus dapibus mi. Sed lacinia enim velit, vitae tempor sem aliquam non. Phasellus efficitur lobortis convallis. Fusce ut volutpat orci, vel mattis nulla. Curabitur rhoncus, nunc eu faucibus congue, turpis mauris ultrices justo, a pulvinar ipsum purus eu sapien. Quisque quis erat odio.&lt;/p&gt;\r\n&lt;p style=&quot;text-align: justify;&quot;&gt;Nam turpis nisl, tempus eget sagittis non, vulputate nec elit. Phasellus a placerat ex. Cras eu rutrum diam, ut viverra risus. Cras at scelerisque velit, id interdum tortor. Morbi sed odio arcu. Vestibulum lacus purus, dignissim eget nisl vitae, euismod tristique enim. Donec vel nibh arcu. Morbi lobortis imperdiet dolor sed facilisis. Cras fringilla sit amet odio a elementum. Nunc condimentum eu est et cursus. Proin vel libero vel lacus venenatis iaculis sed ac diam. Pellentesque eros nisl, venenatis eu consectetur non, mattis a dui.&lt;/p&gt;\r\n&lt;p style=&quot;text-align: justify;&quot;&gt;Etiam lobortis vehicula vestibulum. Suspendisse potenti. Quisque posuere mattis velit luctus vulputate. Sed blandit id eros sed pellentesque. Duis placerat posuere porttitor. Sed placerat, sem id mattis ornare, neque metus ullamcorper nibh, quis finibus metus eros vitae justo. Fusce porttitor pellentesque tellus ut commodo.&lt;/p&gt;\r\n&lt;p style=&quot;text-align: justify;&quot;&gt;Nunc imperdiet efficitur mi nec accumsan. Maecenas nec malesuada magna. Donec felis sem, finibus nec vehicula eu, iaculis vel magna. Vivamus aliquet risus eu dolor cursus ullamcorper. Nullam venenatis orci sed odio rhoncus sagittis. Ut eget pharetra orci, ut iaculis tortor. Integer posuere ultricies ligula. Sed aliquam, odio non egestas maximus, nunc orci blandit velit, quis elementum turpis enim a lectus. Ut mollis pharetra blandit. Duis hendrerit nisi ac ligula rhoncus, sit amet dapibus risus ullamcorper.&lt;/p&gt;\r\n&lt;p style=&quot;text-align: justify;&quot;&gt;In pellentesque purus turpis, in rhoncus ex tempor pulvinar. Morbi ac tincidunt tellus. Nunc et diam odio. Donec pretium at felis eu suscipit. Fusce sed magna metus. Donec felis felis, tempor ut dui condimentum, egestas auctor mauris. Duis sollicitudin tristique dui, in elementum arcu bibendum eu. Morbi ultricies felis eget porttitor placerat. Vivamus sit amet enim risus. Duis mauris sem, aliquam quis tincidunt sit amet, aliquet quis metus. Nunc lacus quam, hendrerit in vestibulum a, hendrerit at leo. Nunc aliquet rhoncus rutrum. Maecenas dolor lacus, porta quis consequat ac, hendrerit at mauris. Integer ornare eros sed viverra efficitur. Fusce ultricies sem id dolor bibendum, at imperdiet turpis vestibulum. Morbi placerat magna enim, quis facilisis ligula suscipit vitae.&lt;/p&gt;\r\n&lt;/div&gt;\r\n&lt;div id=&quot;generated&quot; style=&quot;text-align: justify;&quot;&gt;Generated 5 paragraphs, 438 words, 2894 bytes of&amp;nbsp;&lt;a title=&quot;Lorem Ipsum&quot; href=&quot;https://www.lipsum.com/&quot;&gt;Lorem Ipsum&lt;/a&gt;&lt;/div&gt;', '', 'Y'),
(18, 'Trading Rules', 'trading-rules', '&lt;div id=&quot;lipsum&quot;&gt;\r\n&lt;p style=&quot;text-align: justify;&quot;&gt;Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed a rutrum felis, at posuere nisi. Proin non pellentesque metus. Donec sed sem eget nisl hendrerit tempus at eu mauris. Duis at ex vitae orci rhoncus placerat. In suscipit risus et dolor iaculis, non vulputate dolor ultricies. Maecenas non diam ac tortor gravida tempus eu ac turpis. Nam libero mauris, ornare vitae aliquam eu, mollis at massa. Pellentesque sem tellus, pulvinar at dui eu, finibus dapibus mi. Sed lacinia enim velit, vitae tempor sem aliquam non. Phasellus efficitur lobortis convallis. Fusce ut volutpat orci, vel mattis nulla. Curabitur rhoncus, nunc eu faucibus congue, turpis mauris ultrices justo, a pulvinar ipsum purus eu sapien. Quisque quis erat odio.&lt;/p&gt;\r\n&lt;p style=&quot;text-align: justify;&quot;&gt;Nam turpis nisl, tempus eget sagittis non, vulputate nec elit. Phasellus a placerat ex. Cras eu rutrum diam, ut viverra risus. Cras at scelerisque velit, id interdum tortor. Morbi sed odio arcu. Vestibulum lacus purus, dignissim eget nisl vitae, euismod tristique enim. Donec vel nibh arcu. Morbi lobortis imperdiet dolor sed facilisis. Cras fringilla sit amet odio a elementum. Nunc condimentum eu est et cursus. Proin vel libero vel lacus venenatis iaculis sed ac diam. Pellentesque eros nisl, venenatis eu consectetur non, mattis a dui.&lt;/p&gt;\r\n&lt;p style=&quot;text-align: justify;&quot;&gt;Etiam lobortis vehicula vestibulum. Suspendisse potenti. Quisque posuere mattis velit luctus vulputate. Sed blandit id eros sed pellentesque. Duis placerat posuere porttitor. Sed placerat, sem id mattis ornare, neque metus ullamcorper nibh, quis finibus metus eros vitae justo. Fusce porttitor pellentesque tellus ut commodo.&lt;/p&gt;\r\n&lt;p style=&quot;text-align: justify;&quot;&gt;Nunc imperdiet efficitur mi nec accumsan. Maecenas nec malesuada magna. Donec felis sem, finibus nec vehicula eu, iaculis vel magna. Vivamus aliquet risus eu dolor cursus ullamcorper. Nullam venenatis orci sed odio rhoncus sagittis. Ut eget pharetra orci, ut iaculis tortor. Integer posuere ultricies ligula. Sed aliquam, odio non egestas maximus, nunc orci blandit velit, quis elementum turpis enim a lectus. Ut mollis pharetra blandit. Duis hendrerit nisi ac ligula rhoncus, sit amet dapibus risus ullamcorper.&lt;/p&gt;\r\n&lt;p style=&quot;text-align: justify;&quot;&gt;In pellentesque purus turpis, in rhoncus ex tempor pulvinar. Morbi ac tincidunt tellus. Nunc et diam odio. Donec pretium at felis eu suscipit. Fusce sed magna metus. Donec felis felis, tempor ut dui condimentum, egestas auctor mauris. Duis sollicitudin tristique dui, in elementum arcu bibendum eu. Morbi ultricies felis eget porttitor placerat. Vivamus sit amet enim risus. Duis mauris sem, aliquam quis tincidunt sit amet, aliquet quis metus. Nunc lacus quam, hendrerit in vestibulum a, hendrerit at leo. Nunc aliquet rhoncus rutrum. Maecenas dolor lacus, porta quis consequat ac, hendrerit at mauris. Integer ornare eros sed viverra efficitur. Fusce ultricies sem id dolor bibendum, at imperdiet turpis vestibulum. Morbi placerat magna enim, quis facilisis ligula suscipit vitae.&lt;/p&gt;\r\n&lt;/div&gt;\r\n&lt;div id=&quot;generated&quot; style=&quot;text-align: justify;&quot;&gt;Generated 5 paragraphs, 438 words, 2894 bytes of&amp;nbsp;&lt;a title=&quot;Lorem Ipsum&quot; href=&quot;https://www.lipsum.com/&quot;&gt;Lorem Ipsum&lt;/a&gt;&lt;/div&gt;', '', 'Y'),
(19, 'Trading Platform', 'trading-platform', '&lt;div class=&quot;uk-section uk-section-muted uk-padding-large&quot;&gt;\r\n        &lt;div class=&quot;uk-container in-wave-13&quot;&gt;\r\n            &lt;div class=&quot;uk-grid-large uk-position-relative uk-grid uk-grid-stack&quot; data-uk-grid=&quot;&quot;&gt;\r\n                &lt;div class=&quot;uk-position-bottom-right in-wave-mockup uk-first-column&quot;&gt;\r\n                    &lt;img src=&quot;https://moneymarketint.com/content/themes/yasta-f72c25a3e4a274716c616b5da2bd726e/img/in-wave-mockup-3.png &quot; alt=&quot;linggafx-platform&quot; width=&quot;860&quot; height=&quot;530&quot;&gt;\r\n                &lt;/div&gt;\r\n                &lt;div class=&quot;uk-width-1-2@m uk-first-column&quot;&gt;\r\n                    &lt;h1 class=&quot;uk-text-primary uk-margin-remove&quot;&gt;Metatrader 4:&lt;/h1&gt;\r\n                    &lt;h2 class=&quot;uk-margin-remove-top uk-margin-medium-bottom&quot;&gt;Your trusted trading platfrom for any trade conditions&lt;/h2&gt;\r\n                    &lt;a href=&quot;#&quot; class=&quot;uk-button uk-button-secondary uk-border-rounded in-button-app&quot;&gt;\r\n                        &lt;i class=&quot;fab fa-google-play fa-2x&quot;&gt;&lt;/i&gt;\r\n                        &lt;span class=&quot;wrapper&quot;&gt;Download from&lt;span&gt;Play Store&lt;/span&gt;&lt;/span&gt;\r\n                    &lt;/a&gt;\r\n                    &lt;a href=&quot;#&quot; class=&quot;uk-button uk-button-secondary uk-border-rounded in-button-app uk-margin-small-left in-margin-remove-left@s&quot;&gt;\r\n                        &lt;i class=&quot;fab fa-apple fa-2x&quot;&gt;&lt;/i&gt;\r\n                        &lt;span class=&quot;wrapper&quot;&gt;Download from&lt;span&gt;App Store&lt;/span&gt;&lt;/span&gt;\r\n                    &lt;/a&gt;\r\n                    &lt;div class=&quot;uk-child-width-1-3@m uk-margin-medium-top uk-grid&quot; data-uk-grid=&quot;&quot;&gt;\r\n                        &lt;div class=&quot;uk-first-column&quot;&gt;\r\n                            &lt;img class=&quot;uk-margin-remove-bottom&quot; src=&quot;https://moneymarketint.com/content/themes/yasta-f72c25a3e4a274716c616b5da2bd726e/img/in-wave-icon-11.svg&quot; alt=&quot;wave-icon&quot; width=&quot;42&quot;&gt;\r\n                            &lt;h4 class=&quot;uk-margin-top&quot;&gt;Daily analysis&lt;/h4&gt;\r\n                            &lt;p&gt;Get it now free analysis money market everyday.&lt;/p&gt;\r\n                        &lt;/div&gt;\r\n                        &lt;div&gt;\r\n                            &lt;img class=&quot;uk-margin-remove-bottom&quot; src=&quot;https://moneymarketint.com/content/themes/yasta-f72c25a3e4a274716c616b5da2bd726e/img/in-wave-icon-12.svg&quot; alt=&quot;wave-icon&quot; width=&quot;42&quot;&gt;\r\n                            &lt;h4 class=&quot;uk-margin-top&quot;&gt;$100 deposit&lt;/h4&gt;\r\n                            &lt;p&gt;Start deposit from $100.&lt;/p&gt;\r\n                        &lt;/div&gt;\r\n                        &lt;div&gt;\r\n                            &lt;img class=&quot;uk-margin-remove-bottom&quot; src=&quot;https://moneymarketint.com/content/themes/yasta-f72c25a3e4a274716c616b5da2bd726e/img/in-wave-icon-13.svg&quot; alt=&quot;wave-icon&quot; width=&quot;42&quot;&gt;\r\n                            &lt;h4 class=&quot;uk-margin-top&quot;&gt;Low spread&lt;/h4&gt;\r\n                            &lt;p&gt;We provide very low spread.&lt;/p&gt;\r\n                        &lt;/div&gt;\r\n                    &lt;/div&gt;\r\n                &lt;/div&gt;\r\n            &lt;/div&gt;\r\n        &lt;/div&gt;\r\n    &lt;/div&gt;', '', 'Y'),
(20, 'Company', 'company', '&lt;div class=&quot;uk-section&quot;&gt;\r\n&lt;div class=&quot;uk-container&quot;&gt;\r\n&lt;div class=&quot;uk-grid&quot;&gt;\r\n&lt;div class=&quot;uk-width-1-1&quot;&gt;\r\n&lt;div class=&quot;uk-width-3-5@m&quot;&gt;\r\n&lt;p class=&quot;uk-text-lead uk-text-muted uk-margin-remove-top&quot;&gt;&amp;nbsp;&lt;/p&gt;\r\n&lt;/div&gt;\r\n&lt;/div&gt;\r\n&lt;div class=&quot;uk-grid uk-grid-large uk-child-width-1-3@m uk-margin-medium-top&quot; data-uk-grid=&quot;&quot;&gt;\r\n&lt;div class=&quot;uk-flex uk-flex-left uk-first-column&quot;&gt;\r\n&lt;div&gt;\r\n&lt;h3&gt;Philosophy&lt;/h3&gt;\r\n&lt;p&gt;At vero eos etme accusamus iusto odio ent dignissimos deleniti atque corrupti quos ducimus moll quilla blanditiis expedita est distinctio.&lt;/p&gt;\r\n&lt;/div&gt;\r\n&lt;/div&gt;\r\n&lt;div class=&quot;uk-flex uk-flex-left&quot;&gt;\r\n&lt;div class=&quot;uk-margin-right&quot;&gt;&amp;nbsp;&lt;/div&gt;\r\n&lt;div&gt;\r\n&lt;h3&gt;History&lt;/h3&gt;\r\n&lt;p&gt;At vero eos etme accusamus iusto odio ent dignissimos deleniti atque corrupti quos ducimus moll quilla blanditiis expedita est distinctio.&lt;/p&gt;\r\n&lt;/div&gt;\r\n&lt;/div&gt;\r\n&lt;div class=&quot;uk-flex uk-flex-left&quot;&gt;\r\n&lt;div class=&quot;uk-margin-right&quot;&gt;&amp;nbsp;&lt;/div&gt;\r\n&lt;div&gt;\r\n&lt;h3&gt;Culture&lt;/h3&gt;\r\n&lt;p&gt;At vero eos etme accusamus iusto odio ent dignissimos deleniti atque corrupti quos ducimus moll quilla blanditiis expedita est distinctio.&lt;/p&gt;\r\n&lt;/div&gt;\r\n&lt;/div&gt;\r\n&lt;/div&gt;\r\n&lt;div class=&quot;uk-section&quot;&gt;\r\n&lt;div class=&quot;uk-container&quot;&gt;\r\n&lt;div class=&quot;uk-grid uk-flex uk-flex-center&quot;&gt;\r\n&lt;div class=&quot;uk-width-3-4@m&quot;&gt;\r\n&lt;div class=&quot;uk-grid uk-flex uk-flex-middle&quot; data-uk-grid=&quot;&quot;&gt;\r\n&lt;div class=&quot;uk-width-1-2@m uk-first-column&quot;&gt;\r\n&lt;h4 class=&quot;uk-text-muted&quot;&gt;&amp;nbsp;&lt;/h4&gt;\r\n&lt;/div&gt;\r\n&lt;div class=&quot;uk-width-1-2@m&quot;&gt;\r\n&lt;div class=&quot;uk-margin-large uk-grid&quot; data-uk-grid=&quot;&quot;&gt;\r\n&lt;div class=&quot;uk-width-expand@m&quot;&gt;\r\n&lt;p&gt;&amp;nbsp;&lt;/p&gt;\r\n&lt;/div&gt;\r\n&lt;/div&gt;\r\n&lt;/div&gt;\r\n&lt;/div&gt;\r\n&lt;/div&gt;\r\n&lt;/div&gt;\r\n&lt;/div&gt;\r\n&lt;/div&gt;\r\n&lt;/div&gt;\r\n&lt;/div&gt;\r\n&lt;/div&gt;', '', 'Y'),
(21, 'market', 'market', '&lt;div class=&quot;uk-section&quot;&gt;\r\n&lt;div class=&quot;uk-container&quot;&gt;\r\n&lt;div class=&quot;uk-grid&quot;&gt;\r\n&lt;div class=&quot;uk-width-2-3@m&quot;&gt;\r\n&lt;div class=&quot;uk-grid uk-grid-small&quot; data-uk-grid=&quot;&quot;&gt;\r\n&lt;div class=&quot;uk-width-auto@m uk-first-column&quot;&gt;&amp;nbsp;&lt;/div&gt;\r\n&lt;div class=&quot;uk-width-expand&quot;&gt;\r\n&lt;h3&gt;Why trade with Money Market International Capital?&lt;/h3&gt;\r\n&lt;p&gt;We take the lead in exceptional services &amp;amp; conditions - setting industry standards. We&amp;rsquo;re one of the lowest cost service providers in the industry! All strategies allowed.&lt;/p&gt;\r\n&lt;div class=&quot;uk-grid uk-child-width-1-2@s uk-child-width-1-2@m in-margin-bottom-30@s&quot; data-uk-grid=&quot;&quot;&gt;\r\n&lt;div class=&quot;uk-first-column&quot;&gt;\r\n&lt;ul class=&quot;uk-list uk-list-bullet in-list-check&quot;&gt;\r\n&lt;li&gt;Direct Market Access (DMA)&lt;/li&gt;\r\n&lt;li&gt;Leverage up to 1:500&lt;/li&gt;\r\n&lt;li&gt;T+0 settlement&lt;/li&gt;\r\n&lt;li&gt;Dividends paid in cash&lt;/li&gt;\r\n&lt;/ul&gt;\r\n&lt;/div&gt;\r\n&lt;div class=&quot;in-margin-small-top@s in-margin-bottom@s&quot;&gt;\r\n&lt;ul class=&quot;uk-list uk-list-bullet in-list-check&quot;&gt;\r\n&lt;li&gt;Free from UK Stamp Duty&lt;/li&gt;\r\n&lt;li&gt;Short selling available&lt;/li&gt;\r\n&lt;li&gt;Commissions from 0.08%&lt;/li&gt;\r\n&lt;li&gt;Access to 1500 global shares&lt;/li&gt;\r\n&lt;/ul&gt;\r\n&lt;/div&gt;\r\n&lt;/div&gt;\r\n&lt;/div&gt;\r\n&lt;/div&gt;\r\n&lt;/div&gt;\r\n&lt;div class=&quot;uk-width-1-3@m&quot;&gt;\r\n&lt;h3&gt;Check out our Shares offer&lt;/h3&gt;\r\n&lt;table class=&quot;uk-table uk-table-divider uk-table-striped uk-text-small uk-text-center&quot;&gt;\r\n&lt;thead&gt;\r\n&lt;tr&gt;\r\n&lt;th class=&quot;uk-text-center&quot;&gt;Name&lt;/th&gt;\r\n&lt;th class=&quot;uk-text-center&quot;&gt;Initial Deposit&lt;/th&gt;\r\n&lt;/tr&gt;\r\n&lt;/thead&gt;\r\n&lt;tbody&gt;\r\n&lt;tr&gt;\r\n&lt;td&gt;Apple Inc CFD&lt;/td&gt;\r\n&lt;td&gt;10%&lt;/td&gt;\r\n&lt;/tr&gt;\r\n&lt;tr&gt;\r\n&lt;td&gt;Alibaba CFD&lt;/td&gt;\r\n&lt;td&gt;10%&lt;/td&gt;\r\n&lt;/tr&gt;\r\n&lt;tr&gt;\r\n&lt;td&gt;Facebook CFD&lt;/td&gt;\r\n&lt;td&gt;10%&lt;/td&gt;\r\n&lt;/tr&gt;\r\n&lt;/tbody&gt;\r\n&lt;/table&gt;\r\n&lt;p class=&quot;uk-text-small&quot;&gt;&lt;a href=&quot;#&quot;&gt;See Full Shares Table&lt;/a&gt;&lt;/p&gt;\r\n&lt;/div&gt;\r\n&lt;/div&gt;\r\n&lt;/div&gt;\r\n&lt;/div&gt;', '', 'Y'),
(22, 'Education', 'education', '&lt;div class=&quot;uk-section&quot;&gt;\r\n            &lt;div class=&quot;uk-container&quot;&gt;\r\n                &lt;div class=&quot;uk-grid&quot; data-uk-grid=&quot;&quot;&gt;\r\n                    &lt;div class=&quot;uk-width-3-5@m uk-first-column&quot;&gt;\r\n                        &lt;h1 class=&quot;uk-margin-small-bottom&quot;&gt;&lt;span class=&quot;in-highlight&quot;&gt;Knowledge&lt;/span&gt; is a wise investment&lt;/h1&gt;\r\n                        &lt;p class=&quot;uk-text-lead uk-text-muted uk-margin-remove-top&quot;&gt;By combining easy-to-understand information with actionable insights, Our company helps make the market seem less daunting—and more approachable.&lt;/p&gt;\r\n                        &lt;span class=&quot;uk-label uk-text-small uk-text-uppercase uk-border-pill&quot;&gt;Learn&lt;/span&gt;\r\n                        &lt;i class=&quot;fas fa-arrows-alt-h fa-sm uk-margin-small-left uk-margin-small-right&quot;&gt;&lt;/i&gt;\r\n                        &lt;span class=&quot;uk-label uk-text-small uk-text-uppercase uk-border-pill&quot;&gt;Understand&lt;/span&gt;\r\n                        &lt;i class=&quot;fas fa-arrows-alt-h fa-sm uk-margin-small-left uk-margin-small-right&quot;&gt;&lt;/i&gt;\r\n                        &lt;span class=&quot;uk-label uk-text-small uk-text-uppercase uk-border-pill&quot;&gt;Trade&lt;/span&gt;\r\n                    &lt;/div&gt;\r\n                    &lt;div class=&quot;uk-width-2-5@m&quot;&gt;\r\n                        &lt;div class=&quot;uk-card uk-card-default uk-card-body uk-border-rounded&quot;&gt;\r\n                            &lt;div class=&quot;uk-grid uk-grid-small&quot;&gt;\r\n                                &lt;div class=&quot;uk-width-expand@m&quot;&gt;\r\n                                    &lt;h3 class=&quot;uk-margin-remove-bottom&quot;&gt;Trade Academy&lt;/h3&gt;\r\n                                    &lt;p class=&quot;uk-margin-small-top&quot;&gt;Reprehenderit in voluptate velit esse cillum dolore laboris aute irure.&lt;/p&gt;\r\n                                    &lt;a class=&quot;uk-button uk-button-primary uk-border-rounded&quot; href=&quot;#&quot;&gt;Start Learning&lt;/a&gt;\r\n                                &lt;/div&gt;\r\n                                &lt;div class=&quot;uk-width-auto@m uk-visible@m&quot;&gt;\r\n                                    &lt;div class=&quot;in-icon-wrapper transparent uk-margin-top&quot;&gt;\r\n                                        &lt;i class=&quot;fas fa-user-graduate fa-5x&quot;&gt;&lt;/i&gt;\r\n                                    &lt;/div&gt;\r\n                                &lt;/div&gt;\r\n                            &lt;/div&gt;\r\n                        &lt;/div&gt;\r\n                    &lt;/div&gt;\r\n                &lt;/div&gt;\r\n            &lt;/div&gt;\r\n        &lt;/div&gt;', '', 'Y');

-- --------------------------------------------------------

--
-- Table structure for table `t_partnership`
--

CREATE TABLE `t_partnership` (
  `id` int(128) NOT NULL,
  `content` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `t_popup_gambar`
--

CREATE TABLE `t_popup_gambar` (
  `id` int(11) NOT NULL,
  `picture` varchar(250) NOT NULL,
  `type` enum('Gambar 1','Gambar 2') NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `t_popup_gambar`
--

INSERT INTO `t_popup_gambar` (`id`, `picture`, `type`) VALUES
(1, 'img4-corpedu.png', 'Gambar 1'),
(2, '3D2N-Favourite-Komodo-Trails-1-Night-on-Board-and-1-Night-in-Hotel.jpg', 'Gambar 2');

-- --------------------------------------------------------

--
-- Table structure for table `t_post`
--

CREATE TABLE `t_post` (
  `id` int(100) NOT NULL,
  `id_category` int(100) NOT NULL,
  `id_user` int(100) NOT NULL,
  `tag` varchar(200) NOT NULL,
  `title` varchar(300) NOT NULL,
  `seotitle` varchar(300) NOT NULL,
  `content` text NOT NULL,
  `datepost` date NOT NULL,
  `timepost` time NOT NULL,
  `picture` text NOT NULL,
  `image_caption` text NOT NULL,
  `hits` int(50) NOT NULL DEFAULT '0',
  `headline` enum('N','Y') NOT NULL DEFAULT 'N',
  `comment` enum('N','Y') NOT NULL DEFAULT 'Y',
  `active` enum('N','Y','-1') NOT NULL DEFAULT 'N'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `t_post`
--

INSERT INTO `t_post` (`id`, `id_category`, `id_user`, `tag`, `title`, `seotitle`, `content`, `datepost`, `timepost`, `picture`, `image_caption`, `hits`, `headline`, `comment`, `active`) VALUES
(1, 6, 1, '', 'Hubungan Rasa Takut Antara Investor dengan Pasar Forex', 'hubungan-rasa-takut-antara-investor-dengan-pasar-forex', '&lt;p&gt;Salah satu hal yang paling penting untuk Anda ingat adalah&amp;nbsp;pasar forex berisi para pelaku yang membuat harga bergerak oleh transaksi-transaksi dari para pelakunya. Para pelaku tersebut sama halnya seperti kita, mereka juga manusia yang memiliki berbagai perasaan dan tujuan masing-masing saat melakukan transaksi. Pasar forex sangat dipenuhi oleh berbagai emosi dari para pelakunya, salah satunya adalah rasa takut.&lt;/p&gt;\r\n&lt;p&gt;Perasaan takut dari para&amp;nbsp;pelaku pasar&amp;nbsp;juga merupakan salah satu kekuatan dalam menggerakan harga mata uang di pasar forex. Termasuk ketika sebuah faktor fundamental seperti laporan ekonomi yang segera dirilis diperkirakan memburuk maka perasaan takut bercampur ragu akan menyelimuti pasar. Hal tersebut bisa terlihat dimana ketika harga melonjak bergerak liar tanpa arah yang tak tentu ketika sebuah&amp;nbsp;berita ekonomi&amp;nbsp;akan dirilis.&lt;/p&gt;\r\n&lt;p&gt;Untuk mendapatkan keuntungan dari dinamika yang macam-macam dari forex trading ini, Anda perlu tahu mana mata uang yang cenderung dalam kondisi positif maupun negatif.&lt;/p&gt;\r\n&lt;h2&gt;Mata Uang Safe Haven&lt;/h2&gt;\r\n&lt;p&gt;Mata uang safe haven&amp;nbsp;bergerak dengan sangat stabil jika para investornya takut ketika akan berbuat &amp;ldquo;seenaknya&amp;rdquo;. Dalam pengertian takut disini adalah para investor menjadi lebih berhati-hati dalam melakukan spekulasi yang tidak perlu dilakukan seperti &amp;ldquo;hit and run&amp;rdquo;. Mata uang safe haven merupakan sebuah istilah yang diberikan kepada mata uang yang dianggap tahan dan berhasil stabil dalam melewati masa krisis atau gejolak keuangan, sehingga para investor takut dan merasa sayang untuk melepaskannya.&lt;/p&gt;\r\n&lt;p&gt;Saat ini mata uang yang dianggap sebagai mata uang safe haven diantaranya US Dolar (USD), Franc Swiss (CHF) dan Jepang Yen (JPY) dimana ketiga mata uang ini menjadi pilihan populer bagi para investor untuk mengamankan aset yang mereka miliki.&lt;/p&gt;\r\n&lt;p&gt;Ketiga mata uang tersebut dianggap sebagai safe haven currencies dengan alasan yang berbeda-beda. Us Dolar misalnya, dipilih karena para investor tertarik terhadap USD dikarenakan keamanan obilgasi pemerintah ketika krisis global melanda pasar keuangan. Kenaikan permintaan obligasi AS ini memicu peningkatan permintaan terhadap US Dolar, dimana hal ini juga mendorong nilai US Dolar bergerak lebih tinggi.&lt;/p&gt;\r\n&lt;p&gt;Di sisi lain Swiss France dianggap sebagai mata uang safe-haven dikarenakan sebagian besar nilai CHF didukung oleh nilai emas. Tak seperti dulu dimana semua fiat currencies diukur dengan emas dengan cukup stabil, namun sekarang hanya CHF lah satu-satunya fiat currencies yang sangat stabil karena mendapatkan dukungan nilai emas. Selain itu, perekonomian Swiss juga dianggap sangat stabil dengan tingkat inflasi yang rendah.&lt;/p&gt;\r\n&lt;p&gt;Sementara itu&amp;nbsp;Jepang Yen&amp;nbsp;dianggap sebagai mata uang safe-haven karena keamanan utang pemerintah Jepang. Berbeda dengan Amerika Serikat yang menggunakan skema utang publik, dimana dapat dipegang oleh pemerintah asing dan investor asing, sebaliknya utang publik Jepang hampir seluruhnya dipegang oleh para investor yang berasal dari Jepang itu sendiri. Jadi Jepang dapat mengendalikan kestabilan ekonomi mereka tanpa ada pengaruh dari luar. Karena Jepang merupakan salah satu negara dengan hutang yang cukup tinggi, maka Jepang tidak mau mengambil resiko dengan menjual surat utang pemerintah kepada para pelaku investor asing dalam skala besar.&lt;/p&gt;\r\n&lt;p&gt;Sekarang minimal Anda sudah mengerti mata uang mana yang mudah terpengaruhi oleh gejolak pasar atau stabil ketika masa krisis keuangan datang, yang harus Anda lakukan sekarang adalah mengukur seberapa kuatnya dampak krisis keuangan terhadap rasa takut dari para investor.&lt;/p&gt;\r\n&lt;h2&gt;Mengukur Ketakutan Investor&lt;/h2&gt;\r\n&lt;p&gt;Perasaan takut dan yakin dari para pelaku pasar&amp;nbsp;merupakan kekuatan yang dapat menggerakan pasar, namun paling sulit untuk dianalisa karena hal ini termasuk sebagai salah satu analisa sentimen pasar. Lalu bagaimana cara mengukur ketakutan dari para investor ? Ada salah satu indikator yang dimana dapat mengukur ketakutan dari para investor, salah satunya menggunakan CBOE Volatility Index (VIX), cara membacanya kurang lebih seperti ini&lt;/p&gt;\r\n&lt;ul&gt;\r\n&lt;li&gt;VIX didasari oleh tingkat volatilitas yang terjadi dari S&amp;amp;P 500 Index options.&lt;/li&gt;\r\n&lt;li&gt;Ketika VIX bergerak lebih tinggi, bisa disimpulkan bahwa ketakutan para investor meningkat&lt;/li&gt;\r\n&lt;li&gt;Ketika VIX bergerak lebih rendah, bisa disimpulkan bahwa ketakutan para investor menurun.&lt;/li&gt;\r\n&lt;/ul&gt;\r\n&lt;p&gt;Sekarang Anda mungkin mulai bertanya-tanya kenapa kita harus perlu merepotkan diri sendiri mengamati indikator indeks saham dimana kita hanya berinvestasi di pasar forex. Anda akan terkejut ketika Anda mengetahui bahwa pasar forex juga berkaitan erat dengan pasar saham. Tugas Anda adalah mencari saham-saham apa saja yang berkaitan dengan mata uang yang diperdagangkan di pasar forex, salah satu contohnya adalah&amp;nbsp;Indeks Dow Jones&amp;nbsp;dengan US Dolar.&lt;/p&gt;', '2021-01-24', '06:41:29', 'oil_5.jpg', 'wwforex', 17, 'Y', 'N', 'Y'),
(2, 6, 1, '', 'Ini rekomendasi saham emiten properti usai BI menahan suku bunga di bulan ini', 'ini-rekomendasi-saham-emiten-properti-usai-bi-menahan-suku-bunga-di-bulan-ini', '&lt;p&gt;Reporter:&amp;nbsp;&lt;strong&gt;Benedicta Prima&lt;/strong&gt;&amp;nbsp;| Editor:&amp;nbsp;&lt;strong&gt;Tendi Mahadi&lt;/strong&gt;&lt;/p&gt;\r\n&lt;p&gt;&lt;strong&gt;KONTAN.CO.ID -&amp;nbsp;JAKARTA.&amp;nbsp;&lt;/strong&gt;Indeks saham sektor properti mengalami penguatan tipis bila dihitung sejak awal tahun. Analis Sucor Sekuritas Joey Faustian menilai hal tersebut adalah fluktuasi harga yang normal, bukan karena efek terbatas akibat penahanan suku bunga acuan Bank Indonesia (BI) di level 3,75%.&lt;/p&gt;\r\n&lt;p&gt;Justru penahanan suku bunga tersebut memberikan prospek baik bagi emiten properti karena calon pembeli bisa memanfaatkan momentum ini. Apalagi tren suku bunga rendah juga diprediksi masih berlanjut.&amp;nbsp;&lt;/p&gt;\r\n&lt;div class=&quot;high-10&quot;&gt;&amp;nbsp;&lt;/div&gt;\r\n&lt;div class=&quot;pad-10 pad-l pad-r&quot;&gt;\r\n&lt;div id=&quot;div-inside-Investasi&quot;&gt;&amp;nbsp;&lt;/div&gt;\r\n&lt;/div&gt;\r\n&lt;p&gt;&quot;Prospek sektor ini cukup baik mengingat suku bunga saat ini merupakan titik terendah dalam 5 bahkan 10 tahun terakhir,&quot; jelas Joey, Jumat (22/1).&amp;nbsp;&lt;/p&gt;\r\n&lt;p&gt;&lt;strong&gt;Baca Juga:&amp;nbsp;&lt;a href=&quot;https://investasi.kontan.co.id/news/saham-dan-obligasi-prospektif-simak-rekomendasi-mandiri-manajemen-investasi-berikut&quot;&gt;Saham dan obligasi prospektif, simak rekomendasi Mandiri Manajemen Investasi berikut&lt;/a&gt;&lt;/strong&gt;&lt;/p&gt;\r\n&lt;p&gt;Joey memprediksi di tahun ini bank sentral juga masih akan memangkas suku bunga satu kali lagi. Pemangkasan ini tentu akan memberikan efek positif pada penjualan properti. Namun, bila dibandingkan dengan perkembangan Covid-19 maka pemangkasan ini berefek lebih terbatas.&amp;nbsp;&lt;/p&gt;\r\n&lt;p&gt;&quot;Faktor yang akan lebih mempengaruhi sektor properti saya rasa lebih ke arah angka kasus Covid-19 yang naik terus. Apabila angka ini bisa ditekan, saya rasa konsumen akan lebih&amp;nbsp;&lt;em&gt;confidence&amp;nbsp;&lt;/em&gt;untuk melakukan pembelian properti,&quot; jelas Joey.&amp;nbsp;&lt;/p&gt;\r\n&lt;p&gt;Dus, Joey masih merekomendasikan investor untuk melirik sektor properti seperti PT Bumi Serpong Damai Tbk (&lt;a href=&quot;https://pusatdata.kontan.co.id/quote/BSDE&quot;&gt;BSDE&lt;/a&gt;), PT Ciputra Development Tbk (&lt;a href=&quot;https://pusatdata.kontan.co.id/quote/CTRA&quot;&gt;CTRA&lt;/a&gt;), PT Summarecon Agung Tbk (&lt;a href=&quot;https://pusatdata.kontan.co.id/quote/SMRA&quot;&gt;SMRA&lt;/a&gt;) dan PT Pakuwon Jati Tbk (&lt;a href=&quot;https://pusatdata.kontan.co.id/quote/PWON&quot;&gt;PWON&lt;/a&gt;).&amp;nbsp;&lt;/p&gt;\r\n&lt;p&gt;Untuk saham PT Bumi Serpong Damai Tbk (&lt;a href=&quot;https://pusatdata.kontan.co.id/quote/BSDE&quot;&gt;BSDE&lt;/a&gt;) dan PT Ciputra Development Tbk (&lt;a href=&quot;https://pusatdata.kontan.co.id/quote/CTRA&quot;&gt;CTRA&lt;/a&gt;) karena&amp;nbsp;&lt;em&gt;net gearing&amp;nbsp;&lt;/em&gt;masih di kisaran 30% disertai dengan portofolio produk di bawah Rp 2 miliar mencapai sekitar masing-masing 82% dan 62%. Sedangkan SMRA memiliki&amp;nbsp;&lt;em&gt;gearing&amp;nbsp;&lt;/em&gt;96% dengan portofolio di bawah Rp 2 miliar sebesar 52%.&lt;/p&gt;\r\n&lt;p&gt;&lt;strong&gt;Baca Juga:&amp;nbsp;&lt;a href=&quot;https://investasi.kontan.co.id/news/daya-beli-masyarakat-yang-masih-lemah-menahan-penguatan-indeks-saham-sektor-properti&quot;&gt;Daya beli masyarakat yang masih lemah menahan penguatan indeks saham sektor properti&lt;/a&gt;&lt;/strong&gt;&lt;/p&gt;\r\n&lt;p&gt;&quot;BSDE juga diperdagangkan dengan valuasi cukup murah di bawah 1 kali&amp;nbsp;&lt;em&gt;price book value&amp;nbsp;&lt;/em&gt;(PBV), yaitu 0,8 kali,&quot; imbuhnya.&amp;nbsp;&lt;/p&gt;\r\n&lt;p&gt;Joey menambahkan PWON juga memiliki fundamental yang cukup baik dengan&amp;nbsp;&lt;em&gt;net gearing&amp;nbsp;&lt;/em&gt;0,3% namun karena kontribusi&amp;nbsp;&lt;em&gt;recurring income&amp;nbsp;&lt;/em&gt;yang cukup besar mencapai 50% menyebabkan kinerja masih tertekan. Terutama karena trafik mal dan okupansi hotel yang masih rendah selama pandemi berkepanjangan ini.&amp;nbsp;&lt;/p&gt;\r\n&lt;p&gt;Adapun target harga saham BSDE Rp 1.500, CTRA Rp 1.200, SMRA Rp 950, PWON Rp 600.&amp;nbsp;&lt;/p&gt;\r\n&lt;h2&gt;Selanjutnya:&amp;nbsp;&lt;a href=&quot;https://investasi.kontan.co.id/news/waspada-koreksi-ihsg-january-effect-hampir-berakhir&quot;&gt;Waspada koreksi IHSG, January Effect hampir berakhir&lt;/a&gt;&lt;/h2&gt;', '2021-01-24', '06:45:34', 'kontan.jpg', '', 24, 'Y', 'N', 'Y'),
(3, 1, 1, '', 'Mengenal Average Down Dalam Investasi Saham', 'mengenal-average-down-dalam-investasi-saham', '&lt;p&gt;&quot;Avg down dong!&quot; kata seorang investor saham saat menyarankan temannya yang juga investor saham ketika membahas harga saham X sedang turun.&lt;/p&gt;\r\n&lt;p&gt;&lt;em&gt;Avg down&amp;nbsp;&lt;/em&gt;saham? Apa itu?&amp;nbsp;&lt;em&gt;Avg down&lt;/em&gt;&amp;nbsp;adalah singkatan dari&amp;nbsp;&lt;em&gt;average down&lt;/em&gt;&amp;nbsp;yang merupakan salah satu strategi investasi saham.&amp;nbsp;&lt;em&gt;Average down&lt;/em&gt;&amp;nbsp;adalah keputusan membeli saham yang sama yang telah dimiliki sebelumnya ketika harganya sedang turun.&lt;/p&gt;\r\n&lt;p&gt;Bagaimana maksudnya? Untuk memudahkan pemahaman, berikut ini ilustrasinya:&amp;nbsp;&lt;/p&gt;\r\n&lt;p&gt;&amp;nbsp;&lt;/p&gt;\r\n&lt;p&gt;&amp;nbsp;&lt;/p&gt;', '2021-01-24', '06:48:12', 'mengenal_saham.jpg', '', 32, 'Y', 'N', 'Y'),
(4, 1, 1, '', 'GOLD NEWS', 'gold-news', '&lt;p&gt;Harga Emas Berpotensi Naik Menguji Resisten 1885, Waspadai Support 1841&lt;br /&gt;COMMODITY&lt;br /&gt;25 Januari 2021 | 09:40 WIB&lt;br /&gt;Harga emas dibuka menguat pada perdagangan hari Senin (25/1) karena tertopang oleh kekhawatiran pasar terhadap tingginya kasus baru covid-19 yang memicu pesimisme investor terhadap pemulihan ekonomi global.&lt;/p&gt;\r\n&lt;p&gt;Potensi Pergerakan : Harga emas berpotensi dibeli hari ini menguji level resisten 1868 dan selanjutnya 1885 selama mampu bertahan di atas level support 1842.&lt;/p&gt;\r\n&lt;p&gt;Alternatif : Namun, bila bergerak lebih rendah dari level support 1842. Maka harga emas berpotensi dijual menargetkan level support selanjutnya 1837.&lt;/p&gt;\r\n&lt;p&gt;Resisten : 1860 - 1868 - 1885&lt;br /&gt;Support : 1848 - 1841 - 1837&lt;/p&gt;', '2021-01-25', '23:44:08', '', '', 20, 'Y', 'N', 'Y'),
(5, 1, 30, '', 'ANALISA MINYAK', 'analisa-minyak', '&lt;p&gt;MINYAK&lt;/p&gt;\r\n&lt;p&gt;&lt;br /&gt;Harga minyak berakhir turun sebesar $1.03 ke level $51.97 di akhir sesi Jumat karena tertekan laporan cadangan minyak mentah AS yang menunjukkan peningkatan cadangan sebesar 4.4 juta barel, serta masih tingginya kasus baru covid-19 disejumlah negara.&lt;/p&gt;\r\n&lt;p&gt;Aksi jual terhadap harga minyak berpotensi berlanjut menguji level support $51.45 selama harga tidak mampu menembus level resisten $52.65. Kenaikan lebih tinggi dari level resisten tersebut, harga minyak berpeluang dibeli menguji level resisten selanjutnya $53.15. Rentang perdagangan potensial di sesi Asia $51.45 - $53.15.&lt;/p&gt;', '2021-01-25', '23:54:36', 'oil_5.jpg', '', 16, 'Y', 'N', 'Y'),
(6, 1, 30, '', 'MARKET EURUSD', 'market-eurusd', '&lt;p&gt;EURUSD&lt;/p&gt;\r\n&lt;p&gt;&lt;br /&gt;EURUSD berakhir naik 3 pip ke level 1.2170 di sesi Jumat, di tengah upaya Bank Sentral Eropa memulihkan ekonomi Zona Euro dan laporan indeks Manufaktur dan jasa Jerman serta Zona Euro yang dirilis alami kenaikan dari ekspektasi.&lt;/p&gt;\r\n&lt;p&gt;Pagi ini (25/1) potensi beli EURUSD berpeluang masih berlanjut menargetkan resisten 1.2200 selama harga konsisten di atas level support 1.2155. Namun, penurunan lebih rendah dari support ini bisa memicu aksi jual EURUSD menguji level support selanjutnya 1.2135. Rentang perdagangan potensial di sesi Asia 1.2135 - 1.2200.&lt;/p&gt;', '2021-01-26', '00:02:04', 'forex.png', '', 19, 'Y', 'N', 'Y'),
(7, 7, 1, '', 'MARKET GBP', 'market-gbp', '&lt;p&gt;GBPUSD&lt;/p&gt;\r\n&lt;p&gt;&lt;br /&gt;Memburuknya aktivitas manufaktur di Inggris serta masih tingginya kasus baru virus covid-19 telah memicu penurunan GBPUSD pada hari Jumat sebesar 51 pip dan ditutup di level 1.3681.&lt;/p&gt;\r\n&lt;p&gt;Pagi ini (25/1), GBPUSD berpeluang dijual menargetkan level support 1.3640 selama tidak mampu menembus level resisten 1.3710. Penembusan level resisten tersebut, GBPUSD berpotensi dibeli menguji level resisten berikutnya 1.3735. Rentang perdagangan potensial di sesi Asia 1.3640 - 1.3735.&lt;/p&gt;', '2021-01-26', '00:07:15', '1.png', '', 18, 'Y', 'N', 'Y'),
(8, 7, 3, '', 'trading mudah', 'trading-mudah', '&lt;p&gt;asdad&lt;/p&gt;', '2021-02-03', '18:49:32', '', '', 15, 'Y', 'N', 'Y'),
(9, 1, 3, '', 'asdasdas', 'asdasdas', '&lt;p&gt;asdasdasdasd&lt;/p&gt;', '2021-02-03', '23:39:55', '', '', 11, 'Y', 'N', 'Y');

-- --------------------------------------------------------

--
-- Table structure for table `t_product`
--

CREATE TABLE `t_product` (
  `id` int(100) NOT NULL,
  `title` varchar(200) NOT NULL,
  `subtitle` varchar(500) NOT NULL,
  `seotitle` varchar(200) NOT NULL,
  `leverage` varchar(20) NOT NULL,
  `content` text NOT NULL,
  `picture` text NOT NULL,
  `highlight` enum('N','Y') NOT NULL,
  `active` enum('Y','N') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `t_product`
--

INSERT INTO `t_product` (`id`, `title`, `subtitle`, `seotitle`, `leverage`, `content`, `picture`, `highlight`, `active`) VALUES
(1, 'STANDARD ACCOUNT', '100', 'standard-account', '1000', '&lt;ul class=&quot;uk-list uk-list-bullet uk-margin-bottom&quot;&gt;\r\n&lt;li&gt;Min. Deposit $100&lt;/li&gt;\r\n&lt;/ul&gt;\r\n&lt;p&gt;&lt;br /&gt;&lt;a class=&quot;btn btn-3d btn-warning btn-md mb-2&quot; href=&quot;https://mkp-promax.com/l-member/register&quot; target=&quot;_blank&quot; rel=&quot;noopener&quot;&gt;CHOOSE PACKAGE&lt;/a&gt;&lt;/p&gt;', 'in-section-profit-13a.png', 'N', 'Y');

-- --------------------------------------------------------

--
-- Table structure for table `t_rate`
--

CREATE TABLE `t_rate` (
  `id` int(11) NOT NULL,
  `rate_type` enum('Fix Rate','Floating Rate') NOT NULL,
  `amount` double(10,2) NOT NULL,
  `type` enum('Deposit','Withdraw') NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `t_rate`
--

INSERT INTO `t_rate` (`id`, `rate_type`, `amount`, `type`, `date`) VALUES
(2, 'Floating Rate', 15000.00, 'Deposit', '2021-11-01 08:54:31'),
(4, 'Floating Rate', 14000.00, 'Withdraw', '2021-11-01 08:54:06');

-- --------------------------------------------------------

--
-- Table structure for table `t_running_price_dua`
--

CREATE TABLE `t_running_price_dua` (
  `id` int(11) NOT NULL,
  `mata_uang` varchar(15) NOT NULL,
  `price` double(20,4) NOT NULL,
  `date` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `t_running_price_dua`
--

INSERT INTO `t_running_price_dua` (`id`, `mata_uang`, `price`, `date`) VALUES
(1, 'XAUUSD', 0.0000, 0),
(2, 'GBPUSD', 0.0000, 0),
(3, 'EURUSD', 0.0000, 0),
(4, 'USDJPY', 0.0000, 0),
(5, 'USDCAD', 0.0000, 0),
(6, 'USDCHF', 0.0000, 0),
(7, 'AUDUSD', 0.0000, 0),
(8, 'GBPJPY', 0.0000, 0);

-- --------------------------------------------------------

--
-- Table structure for table `t_running_price_satu`
--

CREATE TABLE `t_running_price_satu` (
  `id` int(11) NOT NULL,
  `mata_uang` varchar(15) NOT NULL,
  `price` double(20,4) NOT NULL,
  `date` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `t_running_price_satu`
--

INSERT INTO `t_running_price_satu` (`id`, `mata_uang`, `price`, `date`) VALUES
(1, 'XAUUSD', 0.0000, 0),
(2, 'GBPUSD', 0.0000, 0),
(3, 'EURUSD', 0.0000, 0),
(4, 'USDJPY', 0.0000, 0),
(5, 'USDCAD', 0.0000, 0),
(6, 'USDCHF', 0.0000, 0),
(7, 'AUDUSD', 0.0000, 0),
(8, 'GBPJPY', 0.0000, 0);

-- --------------------------------------------------------

--
-- Table structure for table `t_setting`
--

CREATE TABLE `t_setting` (
  `id` int(100) NOT NULL,
  `groups` varchar(200) NOT NULL,
  `options` varchar(200) NOT NULL,
  `value` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `t_setting`
--

INSERT INTO `t_setting` (`id`, `groups`, `options`, `value`) VALUES
(1, 'general', 'web_name', 'MoneyMarketInt.com'),
(2, 'general', 'web_url', 'https://www.moneymarketint.com'),
(3, 'general', 'meta_description', 'Brokererd Forex'),
(4, 'general', 'meta_keyword', 'Robot Trading Terbaik, Robot Forex, Robot Automatic'),
(5, 'general', 'web_email', 'support@moneymarketint.com'),
(6, 'general', 'tlpn', '+62 851-1338-3222'),
(7, 'general', 'fax', '0123456789'),
(8, 'general', 'address', 'Money Market International LTD &lt;br&gt;\nSuite 305, Griffith Corporate Centre, Kingstown &lt;br&gt;\nSt. Vincent and the Grenadines &lt;br&gt;'),
(9, 'local', 'language', '2'),
(10, 'local', 'country', 'Indonesia'),
(11, 'local', 'timezone', 'Asia/Jakarta'),
(12, 'image', 'favicon', 'favicon.png'),
(13, 'image', 'logo', 'logo.png'),
(14, 'image', 'web_image', 'web.png'),
(15, 'config', 'visitors', 'Y'),
(16, 'config', 'maintenance', 'N'),
(17, 'config', 'maintenance_time', '30-12-2019'),
(18, 'config', 'member_registration', 'Y'),
(19, 'config', 'cache', 'N'),
(20, 'config', 'cache_time', '1'),
(21, 'config', 'slug_url', 'slug/seotitle'),
(22, 'config', 'slug_title', 'detailpost'),
(23, 'config', 'page_item', '5'),
(24, 'config', 'captcha', 'N'),
(25, 'config', 'recaptcha_site_key', '6LfJzIoUAAAAAN1-sOfEpehjAE5YAwGiWXT0ydh-'),
(26, 'config', 'recaptcha_secret_key', '6LfJzIoUAAAAAA6eXmTd7oINHnPjOQok-cIQ0rQ-'),
(27, 'mail', 'protocol', 'mail'),
(28, 'mail', 'hostname', 'mail.moneymarketint.com'),
(29, 'mail', 'username', 'noreply@mail.moneymarketint.com'),
(30, 'mail', 'password', '5ed9f734b04163b92d842ef0da0311026edb2be35af85732f70335b0bde75d7f625408bdaeb11124e0ba1f56f31bbae2f63135e5f0072494964082dd90b388ebrKQaQJNIjR7iBHXcgLRvr8iWAyCDS14wr9NWg6i+NcA='),
(31, 'mail', 'port', '587'),
(32, 'general', 'email_alert', 'linggafx99@gmail.com, dimasmkppromax@gmail.com'),
(33, 'general', 'web_title', 'MoneyMarketInt.com | Brokered');

-- --------------------------------------------------------

--
-- Table structure for table `t_slider`
--

CREATE TABLE `t_slider` (
  `id` int(100) NOT NULL,
  `title` varchar(200) NOT NULL,
  `seotitle` varchar(200) NOT NULL,
  `subtitle` varchar(150) NOT NULL,
  `content` text NOT NULL,
  `picture` text NOT NULL,
  `active` enum('Y','N') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `t_slider`
--

INSERT INTO `t_slider` (`id`, `title`, `seotitle`, `subtitle`, `content`, `picture`, `active`) VALUES
(2, 'Trade Shares and Forex with Financial Thinking', 'trade-shares-and-forex-with-financial-thinking', '', '&lt;p&gt;Access instruments &amp;ndash; across asset classes &amp;ndash; to trade, hedge and invest from a single account. &lt;br /&gt;&lt;a class=&quot;uk-button uk-button-primary uk-border-rounded uk-visible@m&quot; href=&quot;#&quot;&gt;Discover it now&lt;/a&gt;&lt;/p&gt;', 'in-slideshow-image-4.jpg', 'Y');

-- --------------------------------------------------------

--
-- Table structure for table `t_slug`
--

CREATE TABLE `t_slug` (
  `id` int(100) NOT NULL,
  `title` varchar(100) NOT NULL,
  `slug` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `t_slug`
--

INSERT INTO `t_slug` (`id`, `title`, `slug`) VALUES
(1, 'slug/seotitle', 'slug/([a-z0-9-]+)'),
(2, 'yyyy/seotitle', '([0-9-]+)/([a-z0-9-]+)'),
(3, 'yyyy/mm/seotitle', '([0-9-]+)/([0-9-]+)/([a-z0-9-]+)'),
(4, 'yyyy/mm/dd/seotitle', '([0-9-]+)/([0-9-]+)/([0-9-]+)/([a-z0-9-]+)'),
(5, 'seotitle', '([a-z0-9-]+)');

-- --------------------------------------------------------

--
-- Table structure for table `t_step_register`
--

CREATE TABLE `t_step_register` (
  `id` int(11) NOT NULL,
  `title` varchar(150) NOT NULL,
  `subtitle` varchar(250) NOT NULL,
  `information` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `t_step_register`
--

INSERT INTO `t_step_register` (`id`, `title`, `subtitle`, `information`) VALUES
(1, '1', 'Register', 'Choose an account type and submit your application'),
(2, '2', 'Fund', 'Fund your account using a wide range of funding methods.'),
(3, '3', 'Trades', '&lt;p&gt;Access 180+ instruments across all asset classes on App&lt;/p&gt;');

-- --------------------------------------------------------

--
-- Table structure for table `t_tag`
--

CREATE TABLE `t_tag` (
  `id` int(100) NOT NULL,
  `title` varchar(100) NOT NULL,
  `seotitle` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `t_tag`
--

INSERT INTO `t_tag` (`id`, `title`, `seotitle`) VALUES
(18, 'Lorem', 'lorem'),
(19, '', '');

-- --------------------------------------------------------

--
-- Table structure for table `t_testimoni`
--

CREATE TABLE `t_testimoni` (
  `id` int(100) NOT NULL,
  `id_user` int(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `pekerjaan` varchar(100) NOT NULL,
  `email` varchar(50) NOT NULL,
  `comment` text NOT NULL,
  `picture` text NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `ip` varchar(30) NOT NULL,
  `active` enum('N','Y','X') NOT NULL DEFAULT 'N'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `t_theme`
--

CREATE TABLE `t_theme` (
  `id` int(100) NOT NULL,
  `title` varchar(100) NOT NULL,
  `folder` varchar(100) NOT NULL,
  `active` enum('Y','N') NOT NULL DEFAULT 'N'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `t_theme`
--

INSERT INTO `t_theme` (`id`, `title`, `folder`, `active`) VALUES
(46, 'LinggaFX', 'linggafx-d63521b73e0da66c0061cb8d65080504', 'N'),
(49, 'Kalingga', 'kalingga-def3faa51d697def1e6355c1487c0ee6', 'N'),
(50, 'Yasta', 'yasta-f72c25a3e4a274716c616b5da2bd726e', 'Y'),
(52, 'Niskala', 'niskala-1c43ff9d2635fa66e00f5eea743550a5', 'N'),
(56, 'onepages', 'onepages-82a090bf7351a48465564b9f135be096', 'N'),
(58, 'pwa-forex-1', 'pwa-forex-1-dc51507d56d84608b2ee20d220db2c26', 'N'),
(59, 'liquid', 'liquid-d2037d6029fd5a9adcb4e46b5191cebd', 'N'),
(60, 'demoforexapps', 'demoforexapps-0a5c1abee2909ea1dc6c17b0dbad2ae8', 'N'),
(61, 'ProMax', 'promax-519de64833aaea3d3e31b8160bb9c97c', 'N');

-- --------------------------------------------------------

--
-- Table structure for table `t_trade_report`
--

CREATE TABLE `t_trade_report` (
  `id` int(11) NOT NULL,
  `login` varchar(20) NOT NULL,
  `type` varchar(25) DEFAULT NULL,
  `symbol` varchar(25) DEFAULT NULL,
  `volume` decimal(10,2) NOT NULL,
  `open_price` varchar(100) DEFAULT NULL,
  `open_time` datetime DEFAULT NULL,
  `close_price` varchar(100) DEFAULT NULL,
  `close_time` datetime DEFAULT NULL,
  `profit` double(20,4) NOT NULL,
  `pips` int(11) NOT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `t_user`
--

CREATE TABLE `t_user` (
  `id` int(100) NOT NULL,
  `level` int(100) DEFAULT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(60) NOT NULL,
  `name` varchar(50) NOT NULL,
  `gender` enum('M','F') NOT NULL DEFAULT 'M',
  `birthday` date NOT NULL DEFAULT '1999-01-01',
  `about` text NOT NULL,
  `address` text NOT NULL,
  `tlpn` varchar(15) NOT NULL,
  `id_type` varchar(250) NOT NULL,
  `id_number` varchar(50) NOT NULL,
  `id_photo` text NOT NULL,
  `photo` varchar(300) NOT NULL DEFAULT 'avatar.jpg',
  `referral_id` int(11) NOT NULL,
  `referral_username` varchar(250) NOT NULL,
  `status_data` enum('Incomplete','Complete') NOT NULL,
  `active` enum('Y','N') NOT NULL DEFAULT 'N',
  `activation_key` varchar(100) NOT NULL DEFAULT '0',
  `forgot_key` varchar(100) NOT NULL DEFAULT '0',
  `remember_key` varchar(100) NOT NULL,
  `join_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `t_user`
--

INSERT INTO `t_user` (`id`, `level`, `username`, `password`, `email`, `name`, `gender`, `birthday`, `about`, `address`, `tlpn`, `id_type`, `id_number`, `id_photo`, `photo`, `referral_id`, `referral_username`, `status_data`, `active`, `activation_key`, `forgot_key`, `remember_key`, `join_date`) VALUES
(1, 1, 'adminkeenar', '33ff66d5d9c686a930e666eb21f44e4423b659b819559517aa69bc68342fa841180159990a778be1baddd9350cd89b22f3815cd93ed33219a93d94c84f5994e9MV91DMivfbdU6gBOWZgVROjRQAjLZYPE/UvLbc5D5mo=', 'admin@kelola.work', 'Admin', 'M', '2019-10-22', 'Lorem ipsum dolor sit amet consectetur adipiscing elit fusce eget turpis pulvinar interdum tellus blandit imperdiet velit.', 'Lorem ipsum dolor sit amet consectetur adipiscing elit fusce eget turpis pulvinar interdum tellus blandit imperdiet velit.', '08123456789', '', '', '', 'user-1.jpg', 0, '', 'Incomplete', 'Y', '0', '0', '', '0000-00-00'),
(2, 1, 'userit', '224b9a1e110fb6358df48c92c63ef82603818c8f5b04301077dc7fa204ae8ef8437948c71a50bb2e101f833fc89ea8bf495a88f7f3a2ae369dbfedd21bdc07f4KAj60pwua2THkPAbnhz2VdBkgSb3r9qrSmEBeLMjzow=', 'userit@gmail.com', 'User IT', 'F', '1999-01-01', 'sssstt', 'depok', '554345345345', '', '', '', 'user-59423963274187050861.jpg', 0, '', 'Incomplete', 'Y', '0', '0', '', '0000-00-00'),
(3, 1, 'demoadmin', '113ce5fb862667591cbf33160c76c2f6cec9ec4daf237111d29ff2bfcae44e029f9efaecc9dfb18c9886b2f24d1e88b571ba7b471e19ea238e53c6ed2ec9f739Q/tGMLm3dj7j/p05HQdZxDNIYBGLSezOzZusl72Jm5Q=', 'demoadmin@demo.com', 'Admin Demo', 'M', '1999-01-01', '', '', '081818185139', '', '', '', 'user-19369210628557484307.jpg', 0, '', 'Incomplete', 'Y', '0', '0', '', '0000-00-00'),
(4, 1, 'admin01', '17da0e6e4879d7cff008749d579937d5accfe407b956be955bda15de7ccf5acef5273108bc49970623b47fce1894141a991f61dfe858c05ed688a1f429ea5855mKLjc8erxEA6E5pqLKc7mx+tGjvDELqMEs1Ok0PJl4E=', 'admin01@demo.com', 'Admin 01', 'M', '1999-01-01', '', '', '081029340234', '', '', '', 'user-55209248763913671084.jpg', 0, '', 'Incomplete', 'Y', '0', '0', '', '0000-00-00'),
(5, 4, 'dimasfer1502', '2c727a16cb9a0eaef6a1dbc0d734d20be88bffc5d2adf808c54e0fa43b4826379152e31bb9fb66533e6d76fd2f6af74bdc362d4a3b149a18e7fe50bb2dd092feYIxF2UgSoQkNAt3eI+V3ClTYkIBsfwHqwooQ3tRKXRQ=', 'dimasfer1502@gmail.com', 'Dimas Ferdiansyah', 'M', '1999-01-01', 'Karyawan', '', '82114338172', 'KTP', '214567874187', '5375ec7988954141016df212f7a2dd9a.png', 'user-7bd189ad8ea186eb0dbeb077d0d097bc.jpg', 0, '', 'Complete', 'Y', '0', '0', '', '2021-11-01'),
(6, 4, 'mkpromax', 'b22d13bf2f739a1d1212a41240eca80e4aef576839382669b423d83d6efa5b32ffe53d00725d593e135e14f6ccf0e3e49bed9a438c8b5964d5e631862b48a062SFwio4DGaA3oi9k8y9zsnPLIZN1kpv6xexluKoZYp6g=', 'aswinjahja.sip@gmail.com', 'Aswin Jahja', 'M', '1986-10-04', '', 'Kanginan 8', '81238081818', 'KTP', '3578070410860001', '4872185c72926bea30bcef83e660361c.jpg', 'user-6609c968fe217f6de9a8569ae31bbdea.jpg', 0, '', 'Complete', 'Y', '0', '0', '', '2021-11-02'),
(7, 4, 'harrier7', 'd584cf7236f69581d1d7d6c9066ce1a12ede6e5b77f28b61c3a3db76506e3d0b961f91b51400862822f964b43fd1a679d47dc14886db143f7ef2aa6815a88c3488xMqUaVaR4pktWJimUIuNOIhRfmacMFPVgZHo1rgS4=', 'decson1512@gmail.com', 'Decson', 'M', '1992-12-15', 'Wiraswasta', 'Jln. Melati', '8115491512', 'KTP', '6473011512920010', '331584ba0ee0c9ae658cbc78d60df301.jpg', 'user-82bbc02cba0173ffa578fd49ac54e696.jpg', 6, '', 'Complete', 'Y', '0', '0', '', '2021-11-02'),
(8, 4, 'evolution', '8c56d7042d8167643484ab75b837e0912810e821c7fecd0aa99b34bc91c6e1b3ef9d7955a8ac89833e817b8319d2acc43cfb373e2ac0aecf963df2f806099c8bEKDcCUsW8xk+UB3UIsi4fzq0Phfi90JqJTX+sp6Fl+4=', 'irawandziqronqulhu@gmail.com', 'Irawan Dziqron Qulhu', 'M', '1986-01-29', '-', 'Tarakan', '81287872662', 'KTP', '6473022901860007', 'afed9f95650e14a9b240f75d3919ccb6.jpg', 'user-4cf485f1d8c6a86fc84a550df508998a.jpg', 6, '', 'Complete', 'Y', '0', '0', '', '2021-11-02'),
(9, 4, 'sultan18', '8d46fd3c79a67dd0432c2794a23142a46c93002c6c7be1bdec675389b2eca2f6274bc07969366599f85b746db65809f00344e2ff5c514f5790ba733d092b313bdss/7cBVUAl80uTyu+iWUpXlwwTc6hVipBXeT0t5aEg=', 'Richarddyap168@gmail.com', 'Richard', 'M', '1997-02-02', 'Entrepreneur', 'Kencanasari Timur 3 D-11, Surabaya', '81235151571', 'KTP', '3578210202970003', 'cec28d9731c31878fe1cb6ba4f162926.jpg', 'user-d91a8fba8357b916610266537af1a836.jpg', 6, '', 'Complete', 'Y', '0', '0', '', '2021-11-02'),
(10, 4, 'glory8', 'b8db6b6b252dfdf8532b679b2ece5176b89036d38d72776c38a5da57cb5cb0e7491f341801960545301d30c0cf4d151d526593e83ac51bbcfc784709f2358f90G7E2gwJW8EPO9hUHgYi6dz1+PwAjB19LPfbMN/yvl0U=', 'tianilianto@gmail.com', 'Christian Tara Ilianto', 'M', '1986-04-05', '', '', '81231657888', 'KTP', '3578100504860009', '9f05e277c235dfbbb902565b787b579f.jpg', 'user-772d0963aefad15ffc8f9caab3b79a4a.jpg', 6, '', 'Complete', 'Y', '0', '0', '', '2021-11-02'),
(11, 4, 'richmaker', 'cd711d90a6e8a542600d3222a33737132c7d4dd6c4dee0fd65d3404d1e9ea77e8f33c5de0ce26304fed163da3023574ca1e644e073ee90ee59ecf8b483e6f6a4dpxp8Pkp9ixP8gs7gqDJ13V42ZLZZJEUgqLemOlGKes=', 'gatotsiswantoboss@gmail.com', 'Gatot siswanto', 'M', '1995-12-17', 'Entrepreneur', 'Jalan K.H.Mimbar no 112b, Jombang', '82244356069', 'KTP', '3517091712930001', '9b7ca39703c57efebb843e1ad720577c.jpeg', 'user-b860a0f3a5c4e67b1a05939155859594.jpg', 6, '', 'Complete', 'Y', '0', '0', '', '2021-11-02'),
(12, 4, 'harizjum2306', '6c478136ef7af13c0b9a815f7402dc6681d024f585d188ec8748e38bd24aec8b4063899f87f6dbae1ff21a4d06dbd9b93f6d2755174239f5ab2119ce2aa209feZ/dfdLAOn3wgzXDXt73FiMYAN6343DQs5ZXJrHbFcws=', 'harisjumara@gmail.com', 'Hariz Jumara', 'M', '1983-06-23', 'Konsultant IT', 'Jl. Nurusshobah II No 7, Kp Bulu\r\nKel. Setia Mekar, Kec. Tambun Selatan', '81806506327', 'KTP', '3216062306830016', '', 'user-700fd98c903d70de580a1c6fdbafbc78.jpg', 0, '', 'Incomplete', 'Y', '0', '0', '', '2021-11-02');

-- --------------------------------------------------------

--
-- Table structure for table `t_user_level`
--

CREATE TABLE `t_user_level` (
  `id` int(100) NOT NULL,
  `title` varchar(100) NOT NULL,
  `level` varchar(100) NOT NULL,
  `menu` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `t_user_level`
--

INSERT INTO `t_user_level` (`id`, `title`, `level`, `menu`) VALUES
(1, 'Super Administrator', 'super-admin', 1),
(2, 'Administrator', 'admin', 2),
(3, 'User', 'user', 3),
(4, 'Member', 'member', 0);

-- --------------------------------------------------------

--
-- Table structure for table `t_user_role`
--

CREATE TABLE `t_user_role` (
  `id` int(100) NOT NULL,
  `level` int(100) NOT NULL,
  `module` varchar(150) NOT NULL,
  `read_access` enum('N','Y') NOT NULL,
  `write_access` enum('N','Y') NOT NULL,
  `delete_access` enum('N','Y') NOT NULL,
  `modify_access` enum('N','Y') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `t_user_role`
--

INSERT INTO `t_user_role` (`id`, `level`, `module`, `read_access`, `write_access`, `delete_access`, `modify_access`) VALUES
(1, 2, 'home', 'Y', 'Y', 'Y', 'Y'),
(2, 2, 'post', 'Y', 'Y', 'Y', 'Y'),
(3, 2, 'category', 'Y', 'Y', 'Y', 'Y'),
(4, 2, 'tag', 'Y', 'Y', 'Y', 'Y'),
(6, 2, 'comment', 'Y', 'Y', 'Y', 'Y'),
(7, 2, 'gallery', 'Y', 'Y', 'Y', 'Y'),
(8, 2, 'pages', 'Y', 'Y', 'Y', 'Y'),
(9, 2, 'mail', 'Y', 'Y', 'Y', 'Y'),
(10, 2, 'filemanager', 'Y', 'Y', 'Y', 'Y'),
(11, 2, 'user', 'Y', 'Y', 'Y', 'Y'),
(12, 2, 'component', 'Y', 'N', 'N', 'N'),
(13, 3, 'home', 'Y', 'N', 'N', 'N'),
(14, 3, 'post', 'Y', 'Y', 'Y', 'Y'),
(15, 3, 'category', 'Y', 'N', 'N', 'N'),
(16, 3, 'tag', 'Y', 'N', 'N', 'N'),
(17, 3, 'comment', 'Y', 'N', 'N', 'Y'),
(18, 3, 'gallery', 'Y', 'Y', 'Y', 'Y'),
(19, 5, 'slider', 'Y', 'Y', 'Y', 'Y'),
(21, 7, 'home', 'Y', 'Y', 'Y', 'Y'),
(22, 7, 'slider', 'Y', 'Y', 'Y', 'Y'),
(23, 7, 'homepage', 'Y', 'Y', 'Y', 'Y'),
(24, 7, 'product', 'Y', 'Y', 'Y', 'Y'),
(25, 7, 'category', 'Y', 'Y', 'Y', 'Y'),
(26, 7, 'post', 'Y', 'Y', 'Y', 'Y'),
(27, 7, 'tag', 'Y', 'Y', 'Y', 'Y'),
(28, 7, 'testimoni', 'Y', 'Y', 'Y', 'Y'),
(29, 7, 'comment', 'Y', 'N', 'Y', 'Y'),
(30, 7, 'filemanager', 'Y', 'Y', 'Y', 'Y'),
(31, 7, 'mail', 'Y', 'N', 'N', 'N'),
(32, 6, 'home', 'Y', 'Y', 'Y', 'Y'),
(33, 6, 'slider', 'Y', 'Y', 'Y', 'Y'),
(34, 6, 'homepage', 'Y', 'Y', 'Y', 'Y'),
(35, 6, 'product', 'Y', 'Y', 'Y', 'Y'),
(36, 6, 'testimoni', 'Y', 'Y', 'Y', 'Y'),
(37, 6, 'post', 'Y', 'Y', 'Y', 'Y'),
(38, 6, 'category', 'Y', 'Y', 'Y', 'Y'),
(39, 6, 'tag', 'Y', 'Y', 'Y', 'Y'),
(40, 6, 'comment', 'Y', 'Y', 'Y', 'Y'),
(41, 6, 'filemanager', 'Y', 'Y', 'Y', 'Y'),
(42, 6, 'mail', 'Y', 'Y', 'Y', 'Y'),
(44, 5, 'home', 'Y', 'Y', 'Y', 'Y'),
(45, 5, 'homepage', 'Y', 'Y', 'Y', 'Y'),
(46, 5, 'filemanager', 'Y', 'Y', 'Y', 'Y'),
(47, 5, 'product', 'Y', 'Y', 'Y', 'Y'),
(48, 5, 'testimoni', 'Y', 'Y', 'Y', 'Y'),
(49, 5, 'profile', 'Y', 'N', 'N', 'Y'),
(50, 7, 'footer', 'Y', 'N', 'N', 'Y'),
(51, 6, 'theme', 'Y', 'Y', 'Y', 'Y'),
(52, 7, 'theme', 'Y', 'Y', 'Y', 'Y'),
(53, 7, 'setting', 'Y', 'Y', 'N', 'Y'),
(54, 6, 'setting', 'Y', 'Y', 'N', 'Y'),
(55, 5, 'setting', 'Y', 'Y', 'N', 'Y'),
(56, 5, 'menuwebsite', 'Y', 'Y', 'Y', 'Y'),
(57, 6, 'menuwebsite', 'Y', 'Y', 'Y', 'Y'),
(58, 7, 'menuwebsite', 'Y', 'Y', 'Y', 'Y'),
(59, 5, 'web_analytics', 'Y', 'Y', 'N', 'Y'),
(60, 5, 'post', 'Y', 'Y', 'Y', 'Y'),
(61, 5, 'category', 'Y', 'Y', 'Y', 'Y'),
(62, 5, 'tag', 'Y', 'Y', 'Y', 'Y'),
(63, 5, 'comment', 'Y', 'Y', 'Y', 'Y'),
(64, 5, 'chat_whatsapp', 'Y', 'Y', 'Y', 'Y'),
(65, 6, 'pages', 'Y', 'Y', 'Y', 'Y'),
(66, 6, 'chat_whatsapp', 'Y', 'Y', 'Y', 'Y'),
(67, 6, 'web_analytics', 'Y', 'Y', 'Y', 'Y'),
(68, 7, 'web_analytics', 'Y', 'Y', 'Y', 'Y'),
(69, 7, 'chat_whatsapp', 'Y', 'Y', 'Y', 'Y'),
(70, 2, 'homepage', 'Y', 'Y', 'Y', 'Y'),
(71, 2, 'menuwebsite', 'Y', 'Y', 'Y', 'Y'),
(72, 2, 'chat_whatsa', 'Y', 'Y', 'Y', 'Y'),
(73, 2, 'landingpage', 'Y', 'Y', 'Y', 'Y'),
(74, 2, 'product', 'Y', 'Y', 'Y', 'Y'),
(75, 2, 'slider', 'Y', 'Y', 'Y', 'Y'),
(76, 2, 'menumanager', 'Y', 'Y', 'Y', 'Y'),
(77, 2, 'web_analytics', 'Y', 'Y', 'Y', 'Y'),
(78, 2, 'deposit', 'Y', 'Y', 'Y', 'Y'),
(79, 2, 'rate', 'Y', 'Y', 'Y', 'Y'),
(80, 2, 'withdrawal', 'Y', 'Y', 'Y', 'Y'),
(81, 2, 'account_trading', 'Y', 'Y', 'Y', 'Y');

-- --------------------------------------------------------

--
-- Table structure for table `t_visitor`
--

CREATE TABLE `t_visitor` (
  `id` int(100) NOT NULL,
  `ip` varchar(50) NOT NULL,
  `os` varchar(255) NOT NULL,
  `platform` varchar(255) NOT NULL,
  `browser` varchar(255) NOT NULL,
  `country` varchar(255) NOT NULL,
  `city` varchar(255) NOT NULL,
  `date` date NOT NULL,
  `hits` int(50) NOT NULL,
  `online` int(50) NOT NULL,
  `url` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `t_visitor`
--

INSERT INTO `t_visitor` (`id`, `ip`, `os`, `platform`, `browser`, `country`, `city`, `date`, `hits`, `online`, `url`) VALUES
(1, '180.252.174.83', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/94.0.4606.81 Safari/537.36 OPR/80.0.4170.63', 'Mac OS X', 'Opera', 'Others', 'Others', '2021-11-01', 1, 0, '/'),
(2, '180.252.174.83', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/94.0.4606.81 Safari/537.36 OPR/80.0.4170.63', 'Mac OS X', 'Opera', 'Others', 'Others', '2021-11-01', 1, 0, '/img/in-lazy.gif'),
(3, '34.222.108.186', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64)AppleWebKit/537.36 (KHTML, like Gecko) Chrome/66.0.3359.181 Safari/537.36', 'Windows 10', 'Chrome', 'Others', 'Others', '2021-11-01', 2, 1635773468, '/'),
(4, '54.218.80.197', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.97 Safari/537.36', 'Linux', 'Chrome', 'Others', 'Others', '2021-11-01', 1, 0, '/'),
(5, '34.213.188.215', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.97 Safari/537.36', 'Linux', 'Chrome', 'Others', 'Others', '2021-11-01', 1, 0, '/'),
(6, '159.65.24.22', 'Mozilla/5.0 (Windows NT 6.0) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/34.0.1847.116 Safari/537.36', 'Windows Vista', 'Chrome', 'Others', 'Others', '2021-11-01', 1, 0, '/'),
(7, '184.168.119.100', 'Mozilla/5.0 (Windows NT 6.0) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/34.0.1847.116 Safari/537.36', 'Windows Vista', 'Chrome', 'ID', 'Belakangpadang', '2021-11-01', 1, 0, '/pages/company'),
(8, '159.65.24.22', 'Mozilla/5.0 (Windows NT 6.0) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/34.0.1847.116 Safari/537.36', 'Windows Vista', 'Chrome', 'Others', 'Others', '2021-11-01', 1, 0, '/pages/market'),
(9, '159.65.24.22', 'Mozilla/5.0 (Windows NT 6.0) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/34.0.1847.116 Safari/537.36', 'Windows Vista', 'Chrome', 'Others', 'Others', '2021-11-01', 1, 0, '/pages/education'),
(10, '159.65.24.22', 'Mozilla/5.0 (Windows NT 6.0) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/34.0.1847.116 Safari/537.36', 'Windows Vista', 'Chrome', 'Others', 'Others', '2021-11-01', 1, 0, '/pages/contact-us'),
(11, '103.109.160.38', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/95.0.4638.54 Safari/537.36', 'Windows 10', 'Chrome', 'Others', 'Others', '2021-11-01', 3, 1635776717, '/'),
(12, '103.109.160.38', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/95.0.4638.54 Safari/537.36', 'Windows 10', 'Chrome', 'Others', 'Others', '2021-11-01', 3, 1635776718, '/img/in-lazy.gif'),
(13, '103.109.160.38', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/95.0.4638.54 Safari/537.36', 'Windows 10', 'Chrome', 'Others', 'Others', '2021-11-01', 5, 1635776798, '/content/plugins/member/js/login.js'),
(14, '103.109.160.38', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/95.0.4638.54 Safari/537.36', 'Windows 10', 'Chrome', 'Others', 'Others', '2021-11-01', 4, 1635776798, '/l-member/img/in-lazy.svg'),
(15, '103.109.160.38', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/95.0.4638.54 Safari/537.36', 'Windows 10', 'Chrome', 'Others', 'Others', '2021-11-01', 1, 0, '/l-member/img/in-logo-1.svg'),
(16, '103.109.160.38', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/95.0.4638.54 Safari/537.36', 'Windows 10', 'Chrome', 'Others', 'Others', '2021-11-01', 1, 0, '/img/in-lazy.svg'),
(17, '103.109.160.38', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/95.0.4638.54 Safari/537.36', 'Windows 10', 'Chrome', 'Others', 'Others', '2021-11-01', 1, 0, '/favicon.ico'),
(18, '103.109.160.38', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/95.0.4638.54 Safari/537.36', 'Windows 10', 'Chrome', 'Others', 'Others', '2021-11-01', 18, 1635776773, '/content/plugins/linggafx.com/js/daygrid.min.js'),
(19, '103.109.160.38', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/95.0.4638.54 Safari/537.36', 'Windows 10', 'Chrome', 'Others', 'Others', '2021-11-01', 18, 1635776774, '/content/plugins/linggafx.com/js/fullcalendar.min.js'),
(20, '103.109.160.38', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/95.0.4638.54 Safari/537.36', 'Windows 10', 'Chrome', 'Others', 'Others', '2021-11-01', 18, 1635776773, '/content/plugins/linggafx.com/js/timegrid.min.js'),
(21, '103.109.160.38', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/95.0.4638.54 Safari/537.36', 'Windows 10', 'Chrome', 'Others', 'Others', '2021-11-01', 18, 1635776774, '/content/plugins/linggafx.com/js/interaction.min.js'),
(22, '103.109.160.38', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/95.0.4638.54 Safari/537.36', 'Windows 10', 'Chrome', 'Others', 'Others', '2021-11-01', 10, 1635776763, '/assets/img//favicon.png'),
(23, '103.109.160.38', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/95.0.4638.54 Safari/537.36', 'Windows 10', 'Chrome', 'Others', 'Others', '2021-11-01', 8, 1635776773, '/assets/img/default-avatar.png'),
(24, '113.197.108.36', 'Mozilla/5.0 (Windows NT 10.0; WOW64) AppleWebKit/537.11 (KHTML, like Gecko) Chrome/23.0.1271.64 Safari/537.11', 'Windows 10', 'Chrome', 'Others', 'Others', '2021-11-01', 1, 0, '/img/in-lazy.svg'),
(25, '113.197.108.36', 'Mozilla/5.0 (Windows NT 10.0; WOW64) AppleWebKit/537.11 (KHTML, like Gecko) Chrome/23.0.1271.64 Safari/537.11', 'Windows 10', 'Chrome', 'Others', 'Others', '2021-11-01', 1, 0, '/content/plugins/member/js/login.js'),
(26, '103.109.160.38', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/95.0.4638.54 Safari/537.36', 'Windows 10', 'Chrome', 'Others', 'Others', '2021-11-01', 2, 1635776774, '/l-member/assets/img//favicon.png'),
(27, '182.0.236.141', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/95.0.4638.54 Safari/537.36', 'Mac OS X', 'Chrome', 'Others', 'Others', '2021-11-01', 2, 1635777554, '/'),
(28, '182.0.236.141', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/95.0.4638.54 Safari/537.36', 'Mac OS X', 'Chrome', 'Others', 'Others', '2021-11-01', 2, 1635777556, '/img/in-lazy.gif'),
(29, '184.168.119.100', 'Mozilla/5.0 (compatible; AhrefsBot/7.0; +http://ahrefs.com/robot/)', 'Unknown Platform', 'Mozilla', 'ID', 'Belakangpadang', '2021-11-02', 3, 1635815469, '/robots.txt'),
(30, '185.104.44.147', 'Mozilla/5.0 (X11; Ubuntu; Linux x86_64; rv:62.0) Gecko/20100101 Firefox/62.0', 'Linux', 'Firefox', 'Others', 'Others', '2021-11-02', 1, 0, '/index.php/wp-login.php'),
(31, '184.168.119.100', 'Expanse indexes the network perimeters of our customers. If you have any questions or concerns, please reach out to: scaninfo@expanseinc.com', 'Unknown Platform', '', 'ID', 'Belakangpadang', '2021-11-02', 22, 1635870748, '/'),
(32, '184.154.139.14', 'SiteLockSpider [en] (WinNT; I ;Nav)', 'Windows NT', '', 'Others', 'Others', '2021-11-02', 1, 0, '/th1s_1s_a_4o4.html'),
(33, '184.154.139.14', 'Mozilla/5.0 (compatible; MSIE 9.0; Windows NT 6.1; WOW64; Trident/6.0)', 'Windows 7', 'Internet Explorer', 'Others', 'Others', '2021-11-02', 1, 0, '/pages/trading-platform'),
(34, '184.154.139.14', 'SiteLockSpider [en] (WinNT; I ;Nav)', 'Windows NT', '', 'Others', 'Others', '2021-11-02', 1, 0, '/pages/contact-us'),
(35, '103.171.83.34', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/95.0.4638.54 Safari/537.36', 'Mac OS X', 'Chrome', 'Others', 'Others', '2021-11-02', 7, 1635806464, '/'),
(36, '103.171.83.34', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/95.0.4638.54 Safari/537.36', 'Mac OS X', 'Chrome', 'Others', 'Others', '2021-11-02', 7, 1635806465, '/img/in-lazy.gif'),
(37, '103.171.83.34', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/95.0.4638.54 Safari/537.36', 'Mac OS X', 'Chrome', 'Others', 'Others', '2021-11-02', 1, 0, '/img/in-lazy.svg'),
(38, '184.168.119.100', 'Mozilla/5.0 (Linux; Android 10; SAMSUNG SM-G965F) AppleWebKit/537.36 (KHTML, like Gecko) SamsungBrowser/15.0 Chrome/90.0.4430.210 Mobile Safari/537.36', 'Android', 'Chrome', 'ID', 'Belakangpadang', '2021-11-02', 53, 1635840954, '/content/plugins/member/js/login.js'),
(39, '103.171.83.34', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/95.0.4638.54 Safari/537.36', 'Mac OS X', 'Chrome', 'Others', 'Others', '2021-11-02', 2, 1635805431, '/content/plugins/member/js/login.js'),
(40, '103.171.83.34', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/95.0.4638.54 Safari/537.36', 'Mac OS X', 'Chrome', 'Others', 'Others', '2021-11-02', 1, 0, '/l-member/img/in-lazy.svg'),
(41, '103.171.83.34', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/95.0.4638.54 Safari/537.36', 'Mac OS X', 'Chrome', 'Others', 'Others', '2021-11-02', 1, 0, '/l-member/img/in-logo-1.svg'),
(42, '103.171.83.34', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/95.0.4638.54 Safari/537.36', 'Mac OS X', 'Chrome', 'Others', 'Others', '2021-11-02', 3, 1635805914, '/img/in-logo-2.svg'),
(43, '54.36.149.11', 'Mozilla/5.0 (compatible; AhrefsBot/7.0; +http://ahrefs.com/robot/)', 'Unknown Platform', 'Mozilla', 'Others', 'Others', '2021-11-02', 1, 0, '/robots.txt'),
(44, '54.36.148.130', 'Mozilla/5.0 (compatible; AhrefsBot/7.0; +http://ahrefs.com/robot/)', 'Unknown Platform', 'Mozilla', 'Others', 'Others', '2021-11-02', 1, 0, '/'),
(45, '103.171.83.34', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/95.0.4638.54 Safari/537.36', 'Mac OS X', 'Chrome', 'Others', 'Others', '2021-11-02', 1, 0, '/pages/company'),
(46, '103.171.83.34', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/95.0.4638.54 Safari/537.36', 'Mac OS X', 'Chrome', 'Others', 'Others', '2021-11-02', 1, 0, '/pages/img/in-lazy.gif'),
(47, '103.171.83.34', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/95.0.4638.54 Safari/537.36', 'Mac OS X', 'Chrome', 'Others', 'Others', '2021-11-02', 1, 0, '/pages/img/in-logo-2.svg'),
(48, '184.168.119.100', 'Mozilla/5.0 (Linux; Android 10; SAMSUNG SM-G965F) AppleWebKit/537.36 (KHTML, like Gecko) SamsungBrowser/15.0 Chrome/90.0.4430.210 Mobile Safari/537.36', 'Android', 'Chrome', 'ID', 'Belakangpadang', '2021-11-02', 12, 1635840893, '/img/in-lazy.gif'),
(49, '184.168.119.100', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/95.0.4638.54 Safari/537.36', 'Windows 10', 'Chrome', 'ID', 'Belakangpadang', '2021-11-02', 3, 1635834854, '/img/in-logo-2.svg'),
(50, '184.168.119.100', 'Mozilla/5.0 (Linux; Android 11; SM-A515F) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/95.0.4638.50 Mobile Safari/537.36', 'Android', 'Chrome', 'ID', 'Belakangpadang', '2021-11-02', 2, 1635825167, '/pages/contact-us'),
(51, '184.168.119.100', 'Mozilla/5.0 (Linux; Android 11; SM-A515F) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/95.0.4638.50 Mobile Safari/537.36', 'Android', 'Chrome', 'ID', 'Belakangpadang', '2021-11-02', 3, 1635825167, '/pages/img/in-lazy.gif'),
(52, '184.168.119.100', 'Mozilla/5.0 (Linux; Android 11; SM-A515F) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/95.0.4638.50 Mobile Safari/537.36', 'Android', 'Chrome', 'ID', 'Belakangpadang', '2021-11-02', 3, 1635825168, '/pages/img/in-logo-2.svg'),
(53, '184.168.119.100', 'Mozilla/5.0 (Linux; Android 10; SAMSUNG SM-G965F) AppleWebKit/537.36 (KHTML, like Gecko) SamsungBrowser/15.0 Chrome/90.0.4430.210 Mobile Safari/537.36', 'Android', 'Chrome', 'ID', 'Belakangpadang', '2021-11-02', 11, 1635840954, '/img/in-lazy.svg'),
(54, '184.168.119.100', 'Mozilla/5.0 (Linux; Android 10; SAMSUNG SM-G965F) AppleWebKit/537.36 (KHTML, like Gecko) SamsungBrowser/15.0 Chrome/90.0.4430.210 Mobile Safari/537.36', 'Android', 'Chrome', 'ID', 'Belakangpadang', '2021-11-02', 13, 1635840979, '/favicon.ico'),
(55, '184.168.119.100', 'Mozilla/5.0 (Linux; Android 10; SAMSUNG SM-G965F) AppleWebKit/537.36 (KHTML, like Gecko) SamsungBrowser/15.0 Chrome/90.0.4430.210 Mobile Safari/537.36', 'Android', 'Chrome', 'ID', 'Belakangpadang', '2021-11-02', 115, 1635849015, '/content/plugins/linggafx.com/js/interaction.min.js'),
(56, '184.168.119.100', 'Mozilla/5.0 (Linux; Android 10; SAMSUNG SM-G965F) AppleWebKit/537.36 (KHTML, like Gecko) SamsungBrowser/15.0 Chrome/90.0.4430.210 Mobile Safari/537.36', 'Android', 'Chrome', 'ID', 'Belakangpadang', '2021-11-02', 115, 1635841028, '/content/plugins/linggafx.com/js/fullcalendar.min.js'),
(57, '184.168.119.100', 'Mozilla/5.0 (Linux; Android 10; SAMSUNG SM-G965F) AppleWebKit/537.36 (KHTML, like Gecko) SamsungBrowser/15.0 Chrome/90.0.4430.210 Mobile Safari/537.36', 'Android', 'Chrome', 'ID', 'Belakangpadang', '2021-11-02', 114, 1635841028, '/content/plugins/linggafx.com/js/timegrid.min.js'),
(58, '184.168.119.100', 'Mozilla/5.0 (Linux; Android 10; SAMSUNG SM-G965F) AppleWebKit/537.36 (KHTML, like Gecko) SamsungBrowser/15.0 Chrome/90.0.4430.210 Mobile Safari/537.36', 'Android', 'Chrome', 'ID', 'Belakangpadang', '2021-11-02', 115, 1635841028, '/content/plugins/linggafx.com/js/daygrid.min.js'),
(59, '184.168.119.100', 'Mozilla/5.0 (Linux; Android 10; VOG-L29) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/92.0.4515.166 Mobile Safari/537.36', 'Android', 'Chrome', 'ID', 'Belakangpadang', '2021-11-02', 82, 1635866972, '/assets/img//favicon.png'),
(60, '184.168.119.100', 'Mozilla/5.0 (Linux; Android 10; SAMSUNG SM-G960U) AppleWebKit/537.36 (KHTML, like Gecko) SamsungBrowser/15.0 Chrome/90.0.4430.210 Mobile Safari/537.36', 'Android', 'Chrome', 'ID', 'Belakangpadang', '2021-11-02', 21, 1635842289, '/l-member/img/in-lazy.svg'),
(61, '184.168.119.100', 'Mozilla/5.0 (Linux; Android 11; V2025) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/95.0.4638.50 Mobile Safari/537.36', 'Android', 'Chrome', 'ID', 'Belakangpadang', '2021-11-02', 6, 1635831167, '/l-member/img/in-logo-1.svg'),
(62, '184.168.119.100', 'Mozilla/5.0 (Linux; Android 10; SAMSUNG SM-G965F) AppleWebKit/537.36 (KHTML, like Gecko) SamsungBrowser/15.0 Chrome/90.0.4430.210 Mobile Safari/537.36', 'Android', 'Chrome', 'ID', 'Belakangpadang', '2021-11-02', 58, 1635841028, '/assets/img/default-avatar.png'),
(63, '184.168.119.100', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/95.0.4638.54 Safari/537.36', 'Windows 10', 'Chrome', 'ID', 'Belakangpadang', '2021-11-02', 9, 1635834800, '/l-member/assets/img//favicon.png'),
(64, '184.168.119.100', 'Mozilla/5.0 (Linux; Android 10; SAMSUNG SM-G965F) AppleWebKit/537.36 (KHTML, like Gecko) SamsungBrowser/15.0 Chrome/90.0.4430.210 Mobile Safari/537.36', 'Android', 'Chrome', 'ID', 'Belakangpadang', '2021-11-02', 4, 1635840896, '/apple-touch-icon.png'),
(65, '184.168.119.100', 'Mozilla/5.0 (Linux; Android 11; SM-A515F) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/95.0.4638.50 Mobile Safari/537.36', 'Android', 'Chrome', 'ID', 'Belakangpadang', '2021-11-02', 1, 0, '/index.php/pages/trading-platform'),
(66, '184.168.119.100', 'Mozilla/5.0 (Linux; Android 11; SM-A515F) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/95.0.4638.50 Mobile Safari/537.36', 'Android', 'Chrome', 'ID', 'Belakangpadang', '2021-11-02', 1, 0, '/index.php/pages/apple-touch-icon.png'),
(67, '184.168.119.100', 'Mozilla/5.0 (Linux; Android 11; SM-A515F) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/95.0.4638.50 Mobile Safari/537.36', 'Android', 'Chrome', 'ID', 'Belakangpadang', '2021-11-02', 1, 0, '/pages/education'),
(68, '184.168.119.100', 'Mozilla/5.0 (Linux; Android 11; SM-A515F) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/95.0.4638.50 Mobile Safari/537.36', 'Android', 'Chrome', 'ID', 'Belakangpadang', '2021-11-02', 2, 1635825168, '/pages/apple-touch-icon.png'),
(69, '184.168.119.100', 'Mozilla/5.0 (Linux; Android 10; SAMSUNG SM-G965F) AppleWebKit/537.36 (KHTML, like Gecko) SamsungBrowser/15.0 Chrome/90.0.4430.210 Mobile Safari/537.36', 'Android', 'Chrome', 'ID', 'Belakangpadang', '2021-11-02', 63, 1635841029, '/assets/img//apple-icon.png'),
(70, '184.168.119.100', 'Dalvik/2.1.0 (Linux; U; Android 10; SM-G965F Build/QP1A.190711.020)', 'Android', '', 'ID', 'Belakangpadang', '2021-11-02', 3, 1635840780, '/l-member/assets/img//apple-icon.png'),
(71, '184.168.119.100', 'Mozilla/5.0 (Linux; Android 10; SAMSUNG SM-G965F) AppleWebKit/537.36 (KHTML, like Gecko) SamsungBrowser/15.0 Chrome/90.0.4430.210 Mobile Safari/537.36', 'Android', 'Chrome', 'ID', 'Belakangpadang', '2021-11-02', 6, 1635840950, '/l-member/register/img/in-lazy.svg'),
(72, '184.168.119.100', 'Mozilla/5.0 (Linux; Android 10; SAMSUNG SM-G965F) AppleWebKit/537.36 (KHTML, like Gecko) SamsungBrowser/15.0 Chrome/90.0.4430.210 Mobile Safari/537.36', 'Android', 'Chrome', 'ID', 'Belakangpadang', '2021-11-02', 8, 1635840950, '/l-member/register/img/in-logo-1.svg'),
(73, '36.85.19.208', 'Mozilla/5.0 (Linux; Android 10; SAMSUNG SM-G965F) AppleWebKit/537.36 (KHTML, like Gecko) SamsungBrowser/15.0 Chrome/90.0.4430.210 Mobile Safari/537.36', 'Android', 'Chrome', 'Others', 'Others', '2021-11-02', 49, 1635865122, '/content/plugins/linggafx.com/js/fullcalendar.min.js'),
(74, '36.85.19.208', 'Mozilla/5.0 (Linux; Android 10; SAMSUNG SM-G965F) AppleWebKit/537.36 (KHTML, like Gecko) SamsungBrowser/15.0 Chrome/90.0.4430.210 Mobile Safari/537.36', 'Android', 'Chrome', 'Others', 'Others', '2021-11-02', 49, 1635865122, '/content/plugins/linggafx.com/js/timegrid.min.js'),
(75, '36.85.19.208', 'Mozilla/5.0 (Linux; Android 10; SAMSUNG SM-G965F) AppleWebKit/537.36 (KHTML, like Gecko) SamsungBrowser/15.0 Chrome/90.0.4430.210 Mobile Safari/537.36', 'Android', 'Chrome', 'Others', 'Others', '2021-11-02', 13, 1635865123, '/assets/img/default-avatar.png'),
(76, '36.85.19.208', 'Mozilla/5.0 (Linux; Android 10; SAMSUNG SM-G965F) AppleWebKit/537.36 (KHTML, like Gecko) SamsungBrowser/15.0 Chrome/90.0.4430.210 Mobile Safari/537.36', 'Android', 'Chrome', 'Others', 'Others', '2021-11-02', 49, 1635865122, '/content/plugins/linggafx.com/js/daygrid.min.js'),
(77, '36.85.19.208', 'Mozilla/5.0 (Linux; Android 10; SAMSUNG SM-G965F) AppleWebKit/537.36 (KHTML, like Gecko) SamsungBrowser/15.0 Chrome/90.0.4430.210 Mobile Safari/537.36', 'Android', 'Chrome', 'Others', 'Others', '2021-11-02', 48, 1635865122, '/content/plugins/linggafx.com/js/interaction.min.js'),
(78, '36.85.19.208', 'Mozilla/5.0 (Linux; Android 10; SAMSUNG SM-G965F) AppleWebKit/537.36 (KHTML, like Gecko) SamsungBrowser/15.0 Chrome/90.0.4430.210 Mobile Safari/537.36', 'Android', 'Chrome', 'Others', 'Others', '2021-11-02', 36, 1635865123, '/assets/img//favicon.png'),
(79, '36.85.19.208', 'Mozilla/5.0 (Linux; Android 10; SAMSUNG SM-G965F) AppleWebKit/537.36 (KHTML, like Gecko) SamsungBrowser/15.0 Chrome/90.0.4430.210 Mobile Safari/537.36', 'Android', 'Chrome', 'Others', 'Others', '2021-11-02', 35, 1635865123, '/assets/img//apple-icon.png'),
(80, '36.85.19.208', 'Mozilla/5.0 (Linux; Android 10; SAMSUNG SM-G965F) AppleWebKit/537.36 (KHTML, like Gecko) SamsungBrowser/15.0 Chrome/90.0.4430.210 Mobile Safari/537.36', 'Android', 'Chrome', 'Others', 'Others', '2021-11-02', 5, 1635848343, '/l-member/assets/img//apple-icon.png'),
(81, '103.109.160.38', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/95.0.4638.69 Safari/537.36', 'Windows 10', 'Chrome', 'Others', 'Others', '2021-11-02', 1, 0, '/favicon.ico'),
(82, '36.85.19.208', 'Mozilla/5.0 (Linux; Android 10; SAMSUNG SM-G965F) AppleWebKit/537.36 (KHTML, like Gecko) SamsungBrowser/15.0 Chrome/90.0.4430.210 Mobile Safari/537.36', 'Android', 'Chrome', 'Others', 'Others', '2021-11-02', 4, 1635848342, '/l-member/assets/img//favicon.png'),
(83, '180.241.30.211', 'Mozilla/5.0 (Linux; Android 11; V2025) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/95.0.4638.50 Mobile Safari/537.36', 'Android', 'Chrome', 'Others', 'Others', '2021-11-02', 1, 0, '/content/plugins/member/js/login.js'),
(84, '180.241.30.211', 'Mozilla/5.0 (Linux; Android 11; V2025) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/95.0.4638.50 Mobile Safari/537.36', 'Android', 'Chrome', 'Others', 'Others', '2021-11-02', 28, 1635847129, '/content/plugins/linggafx.com/js/fullcalendar.min.js'),
(85, '180.241.30.211', 'Mozilla/5.0 (Linux; Android 11; V2025) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/95.0.4638.50 Mobile Safari/537.36', 'Android', 'Chrome', 'Others', 'Others', '2021-11-02', 28, 1635847129, '/content/plugins/linggafx.com/js/daygrid.min.js'),
(86, '180.241.30.211', 'Mozilla/5.0 (Linux; Android 11; V2025) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/95.0.4638.50 Mobile Safari/537.36', 'Android', 'Chrome', 'Others', 'Others', '2021-11-02', 27, 1635847129, '/content/plugins/linggafx.com/js/timegrid.min.js'),
(87, '180.241.30.211', 'Mozilla/5.0 (Linux; Android 11; V2025) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/95.0.4638.50 Mobile Safari/537.36', 'Android', 'Chrome', 'Others', 'Others', '2021-11-02', 27, 1635847129, '/content/plugins/linggafx.com/js/interaction.min.js'),
(88, '180.241.30.211', 'Mozilla/5.0 (Linux; Android 11; V2025) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/95.0.4638.50 Mobile Safari/537.36', 'Android', 'Chrome', 'Others', 'Others', '2021-11-02', 18, 1635847130, '/assets/img//favicon.png'),
(89, '180.241.30.211', 'Mozilla/5.0 (Linux; Android 11; V2025) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/95.0.4638.50 Mobile Safari/537.36', 'Android', 'Chrome', 'Others', 'Others', '2021-11-02', 18, 1635847130, '/assets/img//apple-icon.png'),
(90, '180.241.30.211', 'Mozilla/5.0 (Linux; Android 11; V2025) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/95.0.4638.50 Mobile Safari/537.36', 'Android', 'Chrome', 'Others', 'Others', '2021-11-02', 6, 1635846043, '/assets/img/default-avatar.png'),
(91, '113.197.108.37', 'Mozilla/5.0 (Linux; Android 10; SAMSUNG SM-G960U) AppleWebKit/537.36 (KHTML, like Gecko) SamsungBrowser/15.0 Chrome/90.0.4430.210 Mobile Safari/537.36', 'Android', 'Chrome', 'Others', 'Others', '2021-11-02', 1, 0, '/content/plugins/member/js/login.js'),
(92, '180.241.30.211', 'Mozilla/5.0 (Linux; Android 11; V2025) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/95.0.4638.50 Mobile Safari/537.36', 'Android', 'Chrome', 'Others', 'Others', '2021-11-02', 3, 1635846073, '/l-member/assets/img//apple-icon.png'),
(93, '180.241.30.211', 'Mozilla/5.0 (Linux; Android 11; V2025) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/95.0.4638.50 Mobile Safari/537.36', 'Android', 'Chrome', 'Others', 'Others', '2021-11-02', 3, 1635846073, '/l-member/assets/img//favicon.png'),
(94, '180.241.30.84', 'Mozilla/5.0 (Linux; U; Android 10; id-id; POCO X3 NFC Build/QKQ1.200512.002) AppleWebKit/537.36 (KHTML, like Gecko) Version/4.0 Chrome/89.0.4389.116 Mobile Safari/537.36 XiaoMi/MiuiBrowser/12.13.2-gn', 'Android', 'Chrome', 'Others', 'Others', '2021-11-02', 1, 0, '/favicon.ico'),
(95, '180.241.30.84', 'Mozilla/5.0 (Linux; U; Android 10; id-id; POCO X3 NFC Build/QKQ1.200512.002) AppleWebKit/537.36 (KHTML, like Gecko) Version/4.0 Chrome/89.0.4389.116 Mobile Safari/537.36 XiaoMi/MiuiBrowser/12.13.2-gn', 'Android', 'Chrome', 'Others', 'Others', '2021-11-02', 1, 0, '/l-member/img/in-lazy.svg'),
(96, '180.241.30.84', 'Mozilla/5.0 (Linux; U; Android 10; id-id; POCO X3 NFC Build/QKQ1.200512.002) AppleWebKit/537.36 (KHTML, like Gecko) Version/4.0 Chrome/89.0.4389.116 Mobile Safari/537.36 XiaoMi/MiuiBrowser/12.13.2-gn', 'Android', 'Chrome', 'Others', 'Others', '2021-11-02', 1, 0, '/content/plugins/member/js/login.js'),
(97, '180.241.30.84', 'Mozilla/5.0 (Linux; U; Android 10; id-id; POCO X3 NFC Build/QKQ1.200512.002) AppleWebKit/537.36 (KHTML, like Gecko) Version/4.0 Chrome/89.0.4389.116 Mobile Safari/537.36 XiaoMi/MiuiBrowser/12.13.2-gn', 'Android', 'Chrome', 'Others', 'Others', '2021-11-02', 10, 1635843698, '/content/plugins/linggafx.com/js/fullcalendar.min.js'),
(98, '180.241.30.84', 'Mozilla/5.0 (Linux; U; Android 10; id-id; POCO X3 NFC Build/QKQ1.200512.002) AppleWebKit/537.36 (KHTML, like Gecko) Version/4.0 Chrome/89.0.4389.116 Mobile Safari/537.36 XiaoMi/MiuiBrowser/12.13.2-gn', 'Android', 'Chrome', 'Others', 'Others', '2021-11-02', 10, 1635843699, '/content/plugins/linggafx.com/js/timegrid.min.js'),
(99, '180.241.30.84', 'Mozilla/5.0 (Linux; U; Android 10; id-id; POCO X3 NFC Build/QKQ1.200512.002) AppleWebKit/537.36 (KHTML, like Gecko) Version/4.0 Chrome/89.0.4389.116 Mobile Safari/537.36 XiaoMi/MiuiBrowser/12.13.2-gn', 'Android', 'Chrome', 'Others', 'Others', '2021-11-02', 10, 1635843699, '/content/plugins/linggafx.com/js/interaction.min.js'),
(100, '180.241.30.84', 'Mozilla/5.0 (Linux; U; Android 10; id-id; POCO X3 NFC Build/QKQ1.200512.002) AppleWebKit/537.36 (KHTML, like Gecko) Version/4.0 Chrome/89.0.4389.116 Mobile Safari/537.36 XiaoMi/MiuiBrowser/12.13.2-gn', 'Android', 'Chrome', 'Others', 'Others', '2021-11-02', 10, 1635843699, '/content/plugins/linggafx.com/js/daygrid.min.js'),
(101, '180.241.30.84', 'Mozilla/5.0 (Linux; U; Android 10; id-id; POCO X3 NFC Build/QKQ1.200512.002) AppleWebKit/537.36 (KHTML, like Gecko) Version/4.0 Chrome/89.0.4389.116 Mobile Safari/537.36 XiaoMi/MiuiBrowser/12.13.2-gn', 'Android', 'Chrome', 'Others', 'Others', '2021-11-02', 5, 1635843700, '/assets/img//favicon.png'),
(102, '180.241.30.84', 'Mozilla%2F5.0+%28Linux%3B+U%3B+Android+10%3B+id-id%3B+POCO+X3+NFC+Build%2FQKQ1.200512.002%29+AppleWebKit%2F537.36+%28KHTML%2C+like+Gecko%29+Version%2F4.0+Chrome%2F89.0.4389.116+Mobile+Safari%2F537.36+XiaoMi%2FMiuiBrowser%2F12.13.2-gn', 'Android', 'Chrome', 'Others', 'Others', '2021-11-02', 5, 1635843700, '/assets/img//apple-icon.png'),
(103, '180.241.30.84', 'Mozilla/5.0 (Linux; U; Android 10; id-id; POCO X3 NFC Build/QKQ1.200512.002) AppleWebKit/537.36 (KHTML, like Gecko) Version/4.0 Chrome/89.0.4389.116 Mobile Safari/537.36 XiaoMi/MiuiBrowser/12.13.2-gn', 'Android', 'Chrome', 'Others', 'Others', '2021-11-02', 4, 1635843692, '/assets/img/default-avatar.png'),
(104, '180.241.30.84', 'Mozilla/5.0 (Linux; U; Android 10; id-id; POCO X3 NFC Build/QKQ1.200512.002) AppleWebKit/537.36 (KHTML, like Gecko) Version/4.0 Chrome/89.0.4389.116 Mobile Safari/537.36 XiaoMi/MiuiBrowser/12.13.2-gn', 'Android', 'Chrome', 'Others', 'Others', '2021-11-02', 3, 1635843694, '/l-member/assets/img//favicon.png'),
(105, '180.241.30.84', 'Mozilla%2F5.0+%28Linux%3B+U%3B+Android+10%3B+id-id%3B+POCO+X3+NFC+Build%2FQKQ1.200512.002%29+AppleWebKit%2F537.36+%28KHTML%2C+like+Gecko%29+Version%2F4.0+Chrome%2F89.0.4389.116+Mobile+Safari%2F537.36+XiaoMi%2FMiuiBrowser%2F12.13.2-gn', 'Android', 'Chrome', 'Others', 'Others', '2021-11-02', 3, 1635843694, '/l-member/assets/img//apple-icon.png'),
(106, '139.228.246.38', 'Mozilla/5.0 (Linux; Android 10; VOG-L29) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/92.0.4515.166 Mobile Safari/537.36', 'Android', 'Chrome', 'Others', 'Others', '2021-11-02', 2, 1635842721, '/favicon.ico'),
(107, '139.228.246.38', 'Mozilla/5.0 (Linux; Android 10; VOG-L29) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/92.0.4515.166 Mobile Safari/537.36', 'Android', 'Chrome', 'Others', 'Others', '2021-11-02', 1, 0, '/content/plugins/member/js/login.js'),
(108, '139.228.246.38', 'Mozilla/5.0 (Linux; Android 10; VOG-L29) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/92.0.4515.166 Mobile Safari/537.36', 'Android', 'Chrome', 'Others', 'Others', '2021-11-02', 8, 1635842846, '/content/plugins/linggafx.com/js/fullcalendar.min.js'),
(109, '139.228.246.38', 'Mozilla/5.0 (Linux; Android 10; VOG-L29) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/92.0.4515.166 Mobile Safari/537.36', 'Android', 'Chrome', 'Others', 'Others', '2021-11-02', 7, 1635842847, '/content/plugins/linggafx.com/js/interaction.min.js'),
(110, '139.228.246.38', 'Mozilla/5.0 (Linux; Android 10; VOG-L29) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/92.0.4515.166 Mobile Safari/537.36', 'Android', 'Chrome', 'Others', 'Others', '2021-11-02', 7, 1635842847, '/content/plugins/linggafx.com/js/timegrid.min.js'),
(111, '139.228.246.38', 'Mozilla/5.0 (Linux; Android 10; VOG-L29) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/92.0.4515.166 Mobile Safari/537.36', 'Android', 'Chrome', 'Others', 'Others', '2021-11-02', 7, 1635842846, '/content/plugins/linggafx.com/js/daygrid.min.js'),
(112, '139.228.246.38', 'Mozilla/5.0 (Linux; Android 10; VOG-L29) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/92.0.4515.166 Mobile Safari/537.36', 'Android', 'Chrome', 'Others', 'Others', '2021-11-02', 3, 1635842847, '/assets/img//favicon.png'),
(113, '139.228.246.38', 'Mozilla/5.0 (Linux; Android 10; VOG-L29) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/92.0.4515.166 Mobile Safari/537.36', 'Android', 'Chrome', 'Others', 'Others', '2021-11-02', 3, 1635842848, '/assets/img//apple-icon.png'),
(114, '139.228.246.38', 'Mozilla/5.0 (Linux; Android 10; VOG-L29) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/92.0.4515.166 Mobile Safari/537.36', 'Android', 'Chrome', 'Others', 'Others', '2021-11-02', 3, 1635842846, '/assets/img/default-avatar.png'),
(115, '139.228.246.38', 'Mozilla/5.0 (Linux; Android 10; VOG-L29) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/92.0.4515.166 Mobile Safari/537.36', 'Android', 'Chrome', 'Others', 'Others', '2021-11-02', 2, 1635842744, '/l-member/assets/img//favicon.png'),
(116, '139.228.246.38', 'Mozilla/5.0 (Linux; Android 10; VOG-L29) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/92.0.4515.166 Mobile Safari/537.36', 'Android', 'Chrome', 'Others', 'Others', '2021-11-02', 2, 1635842745, '/l-member/assets/img//apple-icon.png'),
(117, '150.129.59.5', 'Mozilla/5.0 (Linux; Android 10; SM-G960U) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/94.0.4606.61 Mobile Safari/537.36', 'Android', 'Chrome', 'Others', 'Others', '2021-11-02', 1, 0, '/l-member/img/in-lazy.svg'),
(118, '150.129.59.5', 'Mozilla/5.0 (Linux; Android 10; SM-G960U) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/94.0.4606.61 Mobile Safari/537.36', 'Android', 'Chrome', 'Others', 'Others', '2021-11-02', 1, 0, '/content/plugins/member/js/login.js'),
(119, '182.1.113.14', 'Mozilla/5.0 (Linux; Android 10; CPH1819) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/93.0.4577.82 Mobile Safari/537.36', 'Android', 'Chrome', 'Others', 'Others', '2021-11-02', 4, 1635843571, '/content/plugins/member/js/login.js'),
(120, '182.1.113.14', 'Mozilla/5.0 (Linux; Android 10; CPH1819) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/93.0.4577.82 Mobile Safari/537.36', 'Android', 'Chrome', 'Others', 'Others', '2021-11-02', 3, 1635843571, '/l-member/img/in-lazy.svg'),
(121, '182.1.113.14', 'Mozilla/5.0 (Linux; Android 10; CPH1819) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/93.0.4577.82 Mobile Safari/537.36', 'Android', 'Chrome', 'Others', 'Others', '2021-11-02', 1, 0, '/favicon.ico'),
(122, '182.1.113.14', 'Mozilla/5.0 (Linux; Android 10; CPH1819) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/93.0.4577.82 Mobile Safari/537.36', 'Android', 'Chrome', 'Others', 'Others', '2021-11-02', 43, 1635844093, '/content/plugins/linggafx.com/js/timegrid.min.js'),
(123, '182.1.113.14', 'Mozilla/5.0 (Linux; Android 10; CPH1819) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/93.0.4577.82 Mobile Safari/537.36', 'Android', 'Chrome', 'Others', 'Others', '2021-11-02', 44, 1635844092, '/content/plugins/linggafx.com/js/fullcalendar.min.js'),
(124, '182.1.113.14', 'Mozilla/5.0 (Linux; Android 10; CPH1819) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/93.0.4577.82 Mobile Safari/537.36', 'Android', 'Chrome', 'Others', 'Others', '2021-11-02', 43, 1635844093, '/content/plugins/linggafx.com/js/interaction.min.js'),
(125, '182.1.113.14', 'Mozilla/5.0 (Linux; Android 10; CPH1819) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/93.0.4577.82 Mobile Safari/537.36', 'Android', 'Chrome', 'Others', 'Others', '2021-11-02', 43, 1635844092, '/content/plugins/linggafx.com/js/daygrid.min.js'),
(126, '182.1.113.14', 'Mozilla/5.0 (Linux; Android 10; CPH1819) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/93.0.4577.82 Mobile Safari/537.36', 'Android', 'Chrome', 'Others', 'Others', '2021-11-02', 27, 1635844094, '/assets/img//apple-icon.png'),
(127, '182.1.113.14', 'Mozilla/5.0 (Linux; Android 10; CPH1819) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/93.0.4577.82 Mobile Safari/537.36', 'Android', 'Chrome', 'Others', 'Others', '2021-11-02', 27, 1635844093, '/assets/img//favicon.png'),
(128, '182.1.113.14', 'Mozilla/5.0 (Linux; Android 10; CPH1819) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/93.0.4577.82 Mobile Safari/537.36', 'Android', 'Chrome', 'Others', 'Others', '2021-11-02', 16, 1635844092, '/assets/img/default-avatar.png'),
(129, '182.1.113.14', 'Mozilla/5.0 (Linux; Android 10; CPH1819) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/93.0.4577.82 Mobile Safari/537.36', 'Android', 'Chrome', 'Others', 'Others', '2021-11-02', 1, 0, '/'),
(130, '182.1.113.14', 'Mozilla/5.0 (Linux; Android 10; CPH1819) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/93.0.4577.82 Mobile Safari/537.36', 'Android', 'Chrome', 'Others', 'Others', '2021-11-02', 1, 0, '/img/in-lazy.gif'),
(131, '182.1.113.14', 'Mozilla/5.0 (Linux; Android 10; CPH1819) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/93.0.4577.82 Mobile Safari/537.36', 'Android', 'Chrome', 'Others', 'Others', '2021-11-02', 1, 0, '/apple-touch-icon.png'),
(132, '182.1.113.14', 'Mozilla/5.0 (Linux; Android 10; CPH1819) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/93.0.4577.82 Mobile Safari/537.36', 'Android', 'Chrome', 'Others', 'Others', '2021-11-02', 2, 1635843988, '/l-member/assets/img//favicon.png'),
(133, '182.1.113.14', 'Mozilla/5.0 (Linux; Android 10; CPH1819) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/93.0.4577.82 Mobile Safari/537.36', 'Android', 'Chrome', 'Others', 'Others', '2021-11-02', 2, 1635843988, '/l-member/assets/img//apple-icon.png'),
(134, '182.1.119.115', 'Mozilla/5.0 (Linux; Android 11; SM-A305F) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/91.0.4472.120 Mobile Safari/537.36', 'Android', 'Chrome', 'Others', 'Others', '2021-11-02', 1, 0, '/favicon.ico'),
(135, '182.1.119.115', 'Mozilla/5.0 (Linux; Android 11; SM-A305F) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/91.0.4472.120 Mobile Safari/537.36', 'Android', 'Chrome', 'Others', 'Others', '2021-11-02', 3, 1635854263, '/content/plugins/member/js/login.js'),
(136, '182.1.119.115', 'Mozilla/5.0 (Linux; Android 11; SM-A305F) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/91.0.4472.120 Mobile Safari/537.36', 'Android', 'Chrome', 'Others', 'Others', '2021-11-02', 11, 1635845513, '/content/plugins/linggafx.com/js/fullcalendar.min.js'),
(137, '182.1.119.115', 'Mozilla/5.0 (Linux; Android 11; SM-A305F) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/91.0.4472.120 Mobile Safari/537.36', 'Android', 'Chrome', 'Others', 'Others', '2021-11-02', 11, 1635845513, '/content/plugins/linggafx.com/js/daygrid.min.js'),
(138, '182.1.119.115', 'Mozilla/5.0 (Linux; Android 11; SM-A305F) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/91.0.4472.120 Mobile Safari/537.36', 'Android', 'Chrome', 'Others', 'Others', '2021-11-02', 11, 1635845513, '/content/plugins/linggafx.com/js/interaction.min.js'),
(139, '182.1.119.115', 'Mozilla/5.0 (Linux; Android 11; SM-A305F) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/91.0.4472.120 Mobile Safari/537.36', 'Android', 'Chrome', 'Others', 'Others', '2021-11-02', 11, 1635845513, '/content/plugins/linggafx.com/js/timegrid.min.js'),
(140, '182.1.119.115', 'Mozilla/5.0 (Linux; Android 11; SM-A305F) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/91.0.4472.120 Mobile Safari/537.36', 'Android', 'Chrome', 'Others', 'Others', '2021-11-02', 7, 1635845515, '/assets/img//apple-icon.png'),
(141, '182.1.119.115', 'Mozilla/5.0 (Linux; Android 11; SM-A305F) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/91.0.4472.120 Mobile Safari/537.36', 'Android', 'Chrome', 'Others', 'Others', '2021-11-02', 7, 1635845515, '/assets/img//favicon.png'),
(142, '182.1.119.115', 'Mozilla/5.0 (Linux; Android 11; SM-A305F) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/91.0.4472.120 Mobile Safari/537.36', 'Android', 'Chrome', 'Others', 'Others', '2021-11-02', 3, 1635845486, '/l-member/assets/img//apple-icon.png'),
(143, '182.1.119.115', 'Mozilla/5.0 (Linux; Android 11; SM-A305F) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/91.0.4472.120 Mobile Safari/537.36', 'Android', 'Chrome', 'Others', 'Others', '2021-11-02', 3, 1635845486, '/l-member/assets/img//favicon.png'),
(144, '103.109.160.38', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/95.0.4638.54 Safari/537.36', 'Windows 10', 'Chrome', 'Others', 'Others', '2021-11-02', 6, 1635846727, '/content/plugins/font-awesome/css/font-awesome.min.css'),
(145, '103.109.160.38', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/95.0.4638.54 Safari/537.36', 'Windows 10', 'Chrome', 'Others', 'Others', '2021-11-02', 7, 1635846727, '/content/plugins/member/css/bootstrap.min.css'),
(146, '184.168.119.100', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/95.0.4638.54 Safari/537.36', 'Windows 10', 'Chrome', 'ID', 'Belakangpadang', '2021-11-02', 1, 0, '/content/plugins/font-awesome/css/font-awesome.min.css'),
(147, '182.2.138.102', 'Mozilla/5.0 (Linux; Android 11; RMX3261) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/95.0.4638.50 Mobile Safari/537.36', 'Android', 'Chrome', 'Others', 'Others', '2021-11-02', 1, 0, '/'),
(148, '182.2.138.102', 'Mozilla/5.0 (Linux; Android 11; RMX3261) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/95.0.4638.50 Mobile Safari/537.36', 'Android', 'Chrome', 'Others', 'Others', '2021-11-02', 1, 0, '/apple-touch-icon.png'),
(149, '182.2.138.102', 'Mozilla/5.0 (Linux; Android 11; RMX3261) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/95.0.4638.50 Mobile Safari/537.36', 'Android', 'Chrome', 'Others', 'Others', '2021-11-02', 5, 1635845854, '/content/plugins/member/js/login.js'),
(150, '182.2.138.102', 'Mozilla/5.0 (Linux; Android 11; RMX3261) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/95.0.4638.50 Mobile Safari/537.36', 'Android', 'Chrome', 'Others', 'Others', '2021-11-02', 1, 0, '/img/in-lazy.svg'),
(151, '182.2.138.102', 'Mozilla/5.0 (Linux; Android 11; RMX3261) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/95.0.4638.50 Mobile Safari/537.36', 'Android', 'Chrome', 'Others', 'Others', '2021-11-02', 1, 0, '/l-member/img/in-logo-1.svg'),
(152, '182.2.138.102', 'Mozilla/5.0 (Linux; Android 11; RMX3261) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/95.0.4638.50 Mobile Safari/537.36', 'Android', 'Chrome', 'Others', 'Others', '2021-11-02', 1, 0, '/l-member/img/in-lazy.svg'),
(153, '202.80.217.147', 'Mozilla/5.0 (Linux; Android 10; VOG-L29) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/92.0.4515.166 Mobile Safari/537.36', 'Android', 'Chrome', 'Others', 'Others', '2021-11-02', 6, 1635845764, '/content/plugins/linggafx.com/js/fullcalendar.min.js'),
(154, '202.80.217.147', 'Mozilla/5.0 (Linux; Android 10; VOG-L29) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/92.0.4515.166 Mobile Safari/537.36', 'Android', 'Chrome', 'Others', 'Others', '2021-11-02', 1, 0, '/assets/img/default-avatar.png'),
(155, '202.80.217.147', 'Mozilla/5.0 (Linux; Android 10; VOG-L29) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/92.0.4515.166 Mobile Safari/537.36', 'Android', 'Chrome', 'Others', 'Others', '2021-11-02', 6, 1635845764, '/content/plugins/linggafx.com/js/interaction.min.js'),
(156, '202.80.217.147', 'Mozilla/5.0 (Linux; Android 10; VOG-L29) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/92.0.4515.166 Mobile Safari/537.36', 'Android', 'Chrome', 'Others', 'Others', '2021-11-02', 6, 1635845764, '/content/plugins/linggafx.com/js/timegrid.min.js'),
(157, '202.80.217.147', 'Mozilla/5.0 (Linux; Android 10; VOG-L29) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/92.0.4515.166 Mobile Safari/537.36', 'Android', 'Chrome', 'Others', 'Others', '2021-11-02', 6, 1635845764, '/content/plugins/linggafx.com/js/daygrid.min.js'),
(158, '202.80.217.147', 'Mozilla/5.0 (Linux; Android 10; VOG-L29) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/92.0.4515.166 Mobile Safari/537.36', 'Android', 'Chrome', 'Others', 'Others', '2021-11-02', 4, 1635845765, '/assets/img//favicon.png'),
(159, '202.80.217.147', 'Mozilla/5.0 (Linux; Android 10; VOG-L29) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/92.0.4515.166 Mobile Safari/537.36', 'Android', 'Chrome', 'Others', 'Others', '2021-11-02', 4, 1635845765, '/assets/img//apple-icon.png'),
(160, '202.80.217.147', 'Mozilla/5.0 (Linux; Android 10; VOG-L29) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/92.0.4515.166 Mobile Safari/537.36', 'Android', 'Chrome', 'Others', 'Others', '2021-11-02', 1, 0, '/'),
(161, '114.4.4.135', 'Mozilla/5.0 (Linux; Android 11; SM-G998U) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/94.0.4606.61 Mobile Safari/537.36', 'Android', 'Chrome', 'Others', 'Others', '2021-11-02', 1, 0, '/'),
(162, '202.80.217.147', 'Mozilla/5.0 (Linux; Android 10; VOG-L29) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/92.0.4515.166 Mobile Safari/537.36', 'Android', 'Chrome', 'Others', 'Others', '2021-11-02', 1, 0, '/apple-touch-icon.png'),
(163, '114.4.4.135', 'Mozilla/5.0 (Linux; Android 11; SM-G998U) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/94.0.4606.61 Mobile Safari/537.36', 'Android', 'Chrome', 'Others', 'Others', '2021-11-02', 1, 0, '/img/in-lazy.gif'),
(164, '202.80.217.147', 'Mozilla/5.0 (Linux; Android 10; VOG-L29) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/92.0.4515.166 Mobile Safari/537.36', 'Android', 'Chrome', 'Others', 'Others', '2021-11-02', 1, 0, '/l-member/assets/img//apple-icon.png'),
(165, '202.80.217.147', 'Mozilla/5.0 (Linux; Android 10; VOG-L29) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/92.0.4515.166 Mobile Safari/537.36', 'Android', 'Chrome', 'Others', 'Others', '2021-11-02', 1, 0, '/l-member/assets/img//favicon.png'),
(166, '203.176.177.4', 'Mozilla/5.0 (Linux; Android 8.0.0; Pixel 2 XL Build/OPD1.170816.004) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/75.0.3765.0 Mobile Safari/537.36', 'Android', 'Chrome', 'Others', 'Others', '2021-11-02', 1, 0, '/content/plugins/member/js/login.js'),
(167, '203.176.177.4', 'Mozilla/5.0 (Linux; Android 8.0.0; Pixel 2 XL Build/OPD1.170816.004) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/75.0.3765.0 Mobile Safari/537.36', 'Android', 'Chrome', 'Others', 'Others', '2021-11-02', 1, 0, '/l-member/img/in-lazy.svg'),
(168, '114.4.4.137', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/94.0.4606.61 Safari/537.36', 'Windows 10', 'Chrome', 'Others', 'Others', '2021-11-02', 1, 0, '/content/plugins/member/js/login.js'),
(169, '114.4.4.137', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/94.0.4606.61 Safari/537.36', 'Windows 10', 'Chrome', 'Others', 'Others', '2021-11-02', 1, 0, '/img/in-lazy.svg'),
(170, '182.2.138.102', 'Mozilla/5.0 (Linux; Android 11; RMX3261) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/95.0.4638.50 Mobile Safari/537.36', 'Android', 'Chrome', 'Others', 'Others', '2021-11-02', 1, 0, '/favicon.ico'),
(171, '182.2.138.102', 'Mozilla/5.0 (Linux; Android 11; RMX3261) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/95.0.4638.50 Mobile Safari/537.36', 'Android', 'Chrome', 'Others', 'Others', '2021-11-02', 7, 1635846045, '/content/plugins/linggafx.com/js/fullcalendar.min.js'),
(172, '182.2.138.102', 'Mozilla/5.0 (Linux; Android 11; RMX3261) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/95.0.4638.50 Mobile Safari/537.36', 'Android', 'Chrome', 'Others', 'Others', '2021-11-02', 7, 1635846046, '/content/plugins/linggafx.com/js/timegrid.min.js'),
(173, '182.2.138.102', 'Mozilla/5.0 (Linux; Android 11; RMX3261) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/95.0.4638.50 Mobile Safari/537.36', 'Android', 'Chrome', 'Others', 'Others', '2021-11-02', 7, 1635846045, '/content/plugins/linggafx.com/js/interaction.min.js'),
(174, '182.2.138.102', 'Mozilla/5.0 (Linux; Android 11; RMX3261) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/95.0.4638.50 Mobile Safari/537.36', 'Android', 'Chrome', 'Others', 'Others', '2021-11-02', 7, 1635846045, '/content/plugins/linggafx.com/js/daygrid.min.js'),
(175, '182.2.138.102', 'Mozilla/5.0 (Linux; Android 11; RMX3261) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/95.0.4638.50 Mobile Safari/537.36', 'Android', 'Chrome', 'Others', 'Others', '2021-11-02', 7, 1635846046, '/assets/img//favicon.png'),
(176, '182.2.138.102', 'Mozilla/5.0 (Linux; Android 11; RMX3261) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/95.0.4638.50 Mobile Safari/537.36', 'Android', 'Chrome', 'Others', 'Others', '2021-11-02', 7, 1635846046, '/assets/img//apple-icon.png'),
(177, '182.2.138.102', 'Mozilla/5.0 (Linux; Android 11; RMX3261) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/95.0.4638.50 Mobile Safari/537.36', 'Android', 'Chrome', 'Others', 'Others', '2021-11-02', 5, 1635846043, '/assets/img/default-avatar.png'),
(178, '110.50.81.199', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/94.0.4606.61 Safari/537.36', 'Windows 10', 'Chrome', 'Others', 'Others', '2021-11-02', 1, 0, '/img/in-lazy.svg'),
(179, '110.50.81.199', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/94.0.4606.61 Safari/537.36', 'Windows 10', 'Chrome', 'Others', 'Others', '2021-11-02', 1, 0, '/content/plugins/member/js/login.js'),
(180, '182.1.181.13', 'Mozilla/5.0 (Linux; U; Android 10; id-id; POCO X3 NFC Build/QKQ1.200512.002) AppleWebKit/537.36 (KHTML, like Gecko) Version/4.0 Chrome/89.0.4389.116 Mobile Safari/537.36 XiaoMi/MiuiBrowser/12.13.2-gn', 'Android', 'Chrome', 'Others', 'Others', '2021-11-02', 3, 1635847319, '/content/plugins/linggafx.com/js/fullcalendar.min.js'),
(181, '182.1.181.13', 'Mozilla/5.0 (Linux; U; Android 10; id-id; POCO X3 NFC Build/QKQ1.200512.002) AppleWebKit/537.36 (KHTML, like Gecko) Version/4.0 Chrome/89.0.4389.116 Mobile Safari/537.36 XiaoMi/MiuiBrowser/12.13.2-gn', 'Android', 'Chrome', 'Others', 'Others', '2021-11-02', 3, 1635847319, '/content/plugins/linggafx.com/js/daygrid.min.js'),
(182, '182.1.181.13', 'Mozilla/5.0 (Linux; U; Android 10; id-id; POCO X3 NFC Build/QKQ1.200512.002) AppleWebKit/537.36 (KHTML, like Gecko) Version/4.0 Chrome/89.0.4389.116 Mobile Safari/537.36 XiaoMi/MiuiBrowser/12.13.2-gn', 'Android', 'Chrome', 'Others', 'Others', '2021-11-02', 3, 1635847319, '/content/plugins/linggafx.com/js/timegrid.min.js'),
(183, '182.1.181.13', 'Mozilla/5.0 (Linux; U; Android 10; id-id; POCO X3 NFC Build/QKQ1.200512.002) AppleWebKit/537.36 (KHTML, like Gecko) Version/4.0 Chrome/89.0.4389.116 Mobile Safari/537.36 XiaoMi/MiuiBrowser/12.13.2-gn', 'Android', 'Chrome', 'Others', 'Others', '2021-11-02', 3, 1635847319, '/content/plugins/linggafx.com/js/interaction.min.js'),
(184, '182.1.181.13', 'Mozilla/5.0 (Linux; U; Android 10; id-id; POCO X3 NFC Build/QKQ1.200512.002) AppleWebKit/537.36 (KHTML, like Gecko) Version/4.0 Chrome/89.0.4389.116 Mobile Safari/537.36 XiaoMi/MiuiBrowser/12.13.2-gn', 'Android', 'Chrome', 'Others', 'Others', '2021-11-02', 2, 1635847320, '/assets/img//favicon.png'),
(185, '182.1.181.13', 'Mozilla%2F5.0+%28Linux%3B+U%3B+Android+10%3B+id-id%3B+POCO+X3+NFC+Build%2FQKQ1.200512.002%29+AppleWebKit%2F537.36+%28KHTML%2C+like+Gecko%29+Version%2F4.0+Chrome%2F89.0.4389.116+Mobile+Safari%2F537.36+XiaoMi%2FMiuiBrowser%2F12.13.2-gn', 'Android', 'Chrome', 'Others', 'Others', '2021-11-02', 2, 1635847320, '/assets/img//apple-icon.png'),
(186, '182.1.181.13', 'Mozilla/5.0 (Linux; U; Android 10; id-id; POCO X3 NFC Build/QKQ1.200512.002) AppleWebKit/537.36 (KHTML, like Gecko) Version/4.0 Chrome/89.0.4389.116 Mobile Safari/537.36 XiaoMi/MiuiBrowser/12.13.2-gn', 'Android', 'Chrome', 'Others', 'Others', '2021-11-02', 1, 0, '/l-member/assets/img//favicon.png'),
(187, '182.1.181.13', 'Mozilla%2F5.0+%28Linux%3B+U%3B+Android+10%3B+id-id%3B+POCO+X3+NFC+Build%2FQKQ1.200512.002%29+AppleWebKit%2F537.36+%28KHTML%2C+like+Gecko%29+Version%2F4.0+Chrome%2F89.0.4389.116+Mobile+Safari%2F537.36+XiaoMi%2FMiuiBrowser%2F12.13.2-gn', 'Android', 'Chrome', 'Others', 'Others', '2021-11-02', 1, 0, '/l-member/assets/img//apple-icon.png'),
(188, '175.158.38.110', 'Mozilla/5.0 (Linux; Android 10; CPH1819) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/93.0.4577.82 Mobile Safari/537.36', 'Android', 'Chrome', 'Others', 'Others', '2021-11-02', 18, 1635854246, '/content/plugins/linggafx.com/js/fullcalendar.min.js'),
(189, '175.158.38.110', 'Mozilla/5.0 (Linux; Android 10; CPH1819) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/93.0.4577.82 Mobile Safari/537.36', 'Android', 'Chrome', 'Others', 'Others', '2021-11-02', 18, 1635854246, '/content/plugins/linggafx.com/js/timegrid.min.js'),
(190, '175.158.38.110', 'Mozilla/5.0 (Linux; Android 10; CPH1819) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/93.0.4577.82 Mobile Safari/537.36', 'Android', 'Chrome', 'Others', 'Others', '2021-11-02', 1, 0, '/assets/img/default-avatar.png'),
(191, '175.158.38.110', 'Mozilla/5.0 (Linux; Android 10; CPH1819) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/93.0.4577.82 Mobile Safari/537.36', 'Android', 'Chrome', 'Others', 'Others', '2021-11-02', 18, 1635854246, '/content/plugins/linggafx.com/js/interaction.min.js'),
(192, '175.158.38.110', 'Mozilla/5.0 (Linux; Android 10; CPH1819) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/93.0.4577.82 Mobile Safari/537.36', 'Android', 'Chrome', 'Others', 'Others', '2021-11-02', 18, 1635854246, '/content/plugins/linggafx.com/js/daygrid.min.js'),
(193, '175.158.38.110', 'Mozilla/5.0 (Linux; Android 10; CPH1819) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/93.0.4577.82 Mobile Safari/537.36', 'Android', 'Chrome', 'Others', 'Others', '2021-11-02', 11, 1635854247, '/assets/img//favicon.png');
INSERT INTO `t_visitor` (`id`, `ip`, `os`, `platform`, `browser`, `country`, `city`, `date`, `hits`, `online`, `url`) VALUES
(194, '175.158.38.110', 'Mozilla/5.0 (Linux; Android 10; CPH1819) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/93.0.4577.82 Mobile Safari/537.36', 'Android', 'Chrome', 'Others', 'Others', '2021-11-02', 12, 1635854247, '/assets/img//apple-icon.png'),
(195, '175.158.38.110', 'Mozilla/5.0 (Linux; Android 10; CPH1819) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/93.0.4577.82 Mobile Safari/537.36', 'Android', 'Chrome', 'Others', 'Others', '2021-11-02', 3, 1635848702, '/l-member/assets/img//favicon.png'),
(196, '175.158.38.110', 'Mozilla/5.0 (Linux; Android 10; CPH1819) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/93.0.4577.82 Mobile Safari/537.36', 'Android', 'Chrome', 'Others', 'Others', '2021-11-02', 3, 1635848702, '/l-member/assets/img//apple-icon.png'),
(197, '36.85.19.208', 'Dalvik/2.1.0 (Linux; U; Android 10; SM-G965F Build/QP1A.190711.020)', 'Android', '', 'Others', 'Others', '2021-11-02', 1, 0, '/l-member/account_trading/assets/img//apple-icon.png'),
(198, '182.1.216.199', 'Mozilla/5.0 (Linux; U; Android 10; id-id; POCO X3 NFC Build/QKQ1.200512.002) AppleWebKit/537.36 (KHTML, like Gecko) Version/4.0 Chrome/89.0.4389.116 Mobile Safari/537.36 XiaoMi/MiuiBrowser/12.13.2-gn', 'Android', 'Chrome', 'Others', 'Others', '2021-11-02', 8, 1635848558, '/content/plugins/linggafx.com/js/fullcalendar.min.js'),
(199, '182.1.216.199', 'Mozilla/5.0 (Linux; U; Android 10; id-id; POCO X3 NFC Build/QKQ1.200512.002) AppleWebKit/537.36 (KHTML, like Gecko) Version/4.0 Chrome/89.0.4389.116 Mobile Safari/537.36 XiaoMi/MiuiBrowser/12.13.2-gn', 'Android', 'Chrome', 'Others', 'Others', '2021-11-02', 8, 1635848557, '/content/plugins/linggafx.com/js/interaction.min.js'),
(200, '182.1.216.199', 'Mozilla/5.0 (Linux; U; Android 10; id-id; POCO X3 NFC Build/QKQ1.200512.002) AppleWebKit/537.36 (KHTML, like Gecko) Version/4.0 Chrome/89.0.4389.116 Mobile Safari/537.36 XiaoMi/MiuiBrowser/12.13.2-gn', 'Android', 'Chrome', 'Others', 'Others', '2021-11-02', 8, 1635848558, '/content/plugins/linggafx.com/js/daygrid.min.js'),
(201, '182.1.216.199', 'Mozilla/5.0 (Linux; U; Android 10; id-id; POCO X3 NFC Build/QKQ1.200512.002) AppleWebKit/537.36 (KHTML, like Gecko) Version/4.0 Chrome/89.0.4389.116 Mobile Safari/537.36 XiaoMi/MiuiBrowser/12.13.2-gn', 'Android', 'Chrome', 'Others', 'Others', '2021-11-02', 8, 1635848558, '/content/plugins/linggafx.com/js/timegrid.min.js'),
(202, '182.1.216.199', 'Mozilla/5.0 (Linux; U; Android 10; id-id; POCO X3 NFC Build/QKQ1.200512.002) AppleWebKit/537.36 (KHTML, like Gecko) Version/4.0 Chrome/89.0.4389.116 Mobile Safari/537.36 XiaoMi/MiuiBrowser/12.13.2-gn', 'Android', 'Chrome', 'Others', 'Others', '2021-11-02', 4, 1635848559, '/assets/img//favicon.png'),
(203, '182.1.216.199', 'Mozilla%2F5.0+%28Linux%3B+U%3B+Android+10%3B+id-id%3B+POCO+X3+NFC+Build%2FQKQ1.200512.002%29+AppleWebKit%2F537.36+%28KHTML%2C+like+Gecko%29+Version%2F4.0+Chrome%2F89.0.4389.116+Mobile+Safari%2F537.36+XiaoMi%2FMiuiBrowser%2F12.13.2-gn', 'Android', 'Chrome', 'Others', 'Others', '2021-11-02', 4, 1635848559, '/assets/img//apple-icon.png'),
(204, '182.1.216.199', 'Mozilla/5.0 (Linux; U; Android 10; id-id; POCO X3 NFC Build/QKQ1.200512.002) AppleWebKit/537.36 (KHTML, like Gecko) Version/4.0 Chrome/89.0.4389.116 Mobile Safari/537.36 XiaoMi/MiuiBrowser/12.13.2-gn', 'Android', 'Chrome', 'Others', 'Others', '2021-11-02', 2, 1635848507, '/l-member/assets/img//favicon.png'),
(205, '182.1.216.199', 'Mozilla%2F5.0+%28Linux%3B+U%3B+Android+10%3B+id-id%3B+POCO+X3+NFC+Build%2FQKQ1.200512.002%29+AppleWebKit%2F537.36+%28KHTML%2C+like+Gecko%29+Version%2F4.0+Chrome%2F89.0.4389.116+Mobile+Safari%2F537.36+XiaoMi%2FMiuiBrowser%2F12.13.2-gn', 'Android', 'Chrome', 'Others', 'Others', '2021-11-02', 2, 1635848507, '/l-member/assets/img//apple-icon.png'),
(206, '103.213.129.150', 'Mozilla/5.0 (Linux; Android 10; VOG-L29) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/92.0.4515.166 Mobile Safari/537.36', 'Android', 'Chrome', 'Others', 'Others', '2021-11-02', 24, 1635866982, '/content/plugins/linggafx.com/js/interaction.min.js'),
(207, '103.213.129.150', 'Mozilla/5.0 (Linux; Android 10; VOG-L29) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/92.0.4515.166 Mobile Safari/537.36', 'Android', 'Chrome', 'Others', 'Others', '2021-11-02', 24, 1635866981, '/content/plugins/linggafx.com/js/fullcalendar.min.js'),
(208, '103.213.129.150', 'Mozilla/5.0 (Linux; Android 10; VOG-L29) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/92.0.4515.166 Mobile Safari/537.36', 'Android', 'Chrome', 'Others', 'Others', '2021-11-02', 24, 1635866981, '/content/plugins/linggafx.com/js/timegrid.min.js'),
(209, '103.213.129.150', 'Mozilla/5.0 (Linux; Android 10; VOG-L29) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/92.0.4515.166 Mobile Safari/537.36', 'Android', 'Chrome', 'Others', 'Others', '2021-11-02', 24, 1635866981, '/content/plugins/linggafx.com/js/daygrid.min.js'),
(210, '103.213.129.150', 'Mozilla/5.0 (Linux; Android 10; VOG-L29) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/92.0.4515.166 Mobile Safari/537.36', 'Android', 'Chrome', 'Others', 'Others', '2021-11-02', 12, 1635866982, '/assets/img//favicon.png'),
(211, '103.213.129.150', 'Mozilla/5.0 (Linux; Android 10; VOG-L29) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/92.0.4515.166 Mobile Safari/537.36', 'Android', 'Chrome', 'Others', 'Others', '2021-11-02', 13, 1635866982, '/assets/img//apple-icon.png'),
(212, '103.213.129.150', 'Mozilla/5.0 (Linux; Android 10; VOG-L29) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/92.0.4515.166 Mobile Safari/537.36', 'Android', 'Chrome', 'Others', 'Others', '2021-11-02', 5, 1635866966, '/l-member/assets/img//favicon.png'),
(213, '103.213.129.150', 'Mozilla/5.0 (Linux; Android 10; VOG-L29) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/92.0.4515.166 Mobile Safari/537.36', 'Android', 'Chrome', 'Others', 'Others', '2021-11-02', 5, 1635866967, '/l-member/assets/img//apple-icon.png'),
(214, '114.4.4.198', 'Mozilla/5.0 (Linux; Android 10; SM-G960U) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/94.0.4606.61 Mobile Safari/537.36', 'Android', 'Chrome', 'Others', 'Others', '2021-11-02', 1, 0, '/content/plugins/member/js/login.js'),
(215, '114.4.4.198', 'Mozilla/5.0 (Linux; Android 10; SM-G960U) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/94.0.4606.61 Mobile Safari/537.36', 'Android', 'Chrome', 'Others', 'Others', '2021-11-02', 1, 0, '/l-member/img/in-lazy.svg'),
(216, '159.65.11.53', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/94.0.4606.61 Safari/537.36/Nutch-1.18', 'Mac OS X', 'Chrome', 'Others', 'Others', '2021-11-02', 2, 1635849376, '/robots.txt'),
(217, '159.65.11.53', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/94.0.4606.61 Safari/537.36/Nutch-1.18', 'Mac OS X', 'Chrome', 'Others', 'Others', '2021-11-02', 1, 0, '/'),
(218, '103.109.160.38', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/95.0.4638.54 Safari/537.36', 'Windows 10', 'Chrome', 'Others', 'Others', '2021-11-02', 1, 0, '/'),
(219, '103.109.160.38', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/95.0.4638.54 Safari/537.36', 'Windows 10', 'Chrome', 'Others', 'Others', '2021-11-02', 1, 0, '/img/in-lazy.gif'),
(220, '182.1.119.115', 'Mozilla/5.0 (Linux; Android 11; SM-A305F) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/91.0.4472.120 Mobile Safari/537.36', 'Android', 'Chrome', 'Others', 'Others', '2021-11-02', 1, 0, '/l-member/img/in-lazy.svg'),
(221, '182.1.119.115', 'Mozilla/5.0 (Linux; Android 11; SM-A305F) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/91.0.4472.120 Mobile Safari/537.36', 'Android', 'Chrome', 'Others', 'Others', '2021-11-02', 1, 0, '/l-member/img/in-logo-1.svg'),
(222, '114.125.78.127', 'Mozilla/5.0 (Linux; Android 10; VOG-L29) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/92.0.4515.166 Mobile Safari/537.36', 'Android', 'Chrome', 'Others', 'Others', '2021-11-02', 3, 1635855010, '/content/plugins/linggafx.com/js/fullcalendar.min.js'),
(223, '114.125.78.127', 'Mozilla/5.0 (Linux; Android 10; VOG-L29) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/92.0.4515.166 Mobile Safari/537.36', 'Android', 'Chrome', 'Others', 'Others', '2021-11-02', 3, 1635855010, '/content/plugins/linggafx.com/js/timegrid.min.js'),
(224, '114.125.78.127', 'Mozilla/5.0 (Linux; Android 10; VOG-L29) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/92.0.4515.166 Mobile Safari/537.36', 'Android', 'Chrome', 'Others', 'Others', '2021-11-02', 3, 1635855011, '/content/plugins/linggafx.com/js/daygrid.min.js'),
(225, '114.125.78.127', 'Mozilla/5.0 (Linux; Android 10; VOG-L29) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/92.0.4515.166 Mobile Safari/537.36', 'Android', 'Chrome', 'Others', 'Others', '2021-11-02', 3, 1635855010, '/content/plugins/linggafx.com/js/interaction.min.js'),
(226, '114.125.78.127', 'Mozilla/5.0 (Linux; Android 10; VOG-L29) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/92.0.4515.166 Mobile Safari/537.36', 'Android', 'Chrome', 'Others', 'Others', '2021-11-02', 3, 1635855011, '/assets/img//favicon.png'),
(227, '114.125.78.127', 'Mozilla/5.0 (Linux; Android 10; VOG-L29) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/92.0.4515.166 Mobile Safari/537.36', 'Android', 'Chrome', 'Others', 'Others', '2021-11-02', 3, 1635855011, '/assets/img//apple-icon.png'),
(228, '114.125.78.127', 'Mozilla/5.0 (Linux; Android 10; VOG-L29) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/92.0.4515.166 Mobile Safari/537.36', 'Android', 'Chrome', 'Others', 'Others', '2021-11-02', 1, 0, '/content/plugins/member/js/login.js'),
(229, '182.1.66.73', 'Mozilla/5.0 (Linux; Android 10; SAMSUNG SM-G965F) AppleWebKit/537.36 (KHTML, like Gecko) SamsungBrowser/15.0 Chrome/90.0.4430.210 Mobile Safari/537.36', 'Android', 'Chrome', 'Others', 'Others', '2021-11-02', 12, 1635856982, '/content/plugins/linggafx.com/js/fullcalendar.min.js'),
(230, '182.1.66.73', 'Mozilla/5.0 (Linux; Android 10; SAMSUNG SM-G965F) AppleWebKit/537.36 (KHTML, like Gecko) SamsungBrowser/15.0 Chrome/90.0.4430.210 Mobile Safari/537.36', 'Android', 'Chrome', 'Others', 'Others', '2021-11-02', 12, 1635856981, '/content/plugins/linggafx.com/js/daygrid.min.js'),
(231, '182.1.66.73', 'Mozilla/5.0 (Linux; Android 10; SAMSUNG SM-G965F) AppleWebKit/537.36 (KHTML, like Gecko) SamsungBrowser/15.0 Chrome/90.0.4430.210 Mobile Safari/537.36', 'Android', 'Chrome', 'Others', 'Others', '2021-11-02', 12, 1635856981, '/content/plugins/linggafx.com/js/interaction.min.js'),
(232, '182.1.66.73', 'Mozilla/5.0 (Linux; Android 10; SAMSUNG SM-G965F) AppleWebKit/537.36 (KHTML, like Gecko) SamsungBrowser/15.0 Chrome/90.0.4430.210 Mobile Safari/537.36', 'Android', 'Chrome', 'Others', 'Others', '2021-11-02', 12, 1635856981, '/content/plugins/linggafx.com/js/timegrid.min.js'),
(233, '182.1.66.73', 'Mozilla/5.0 (Linux; Android 10; SAMSUNG SM-G965F) AppleWebKit/537.36 (KHTML, like Gecko) SamsungBrowser/15.0 Chrome/90.0.4430.210 Mobile Safari/537.36', 'Android', 'Chrome', 'Others', 'Others', '2021-11-02', 12, 1635856983, '/assets/img//apple-icon.png'),
(234, '182.1.66.73', 'Mozilla/5.0 (Linux; Android 10; SAMSUNG SM-G965F) AppleWebKit/537.36 (KHTML, like Gecko) SamsungBrowser/15.0 Chrome/90.0.4430.210 Mobile Safari/537.36', 'Android', 'Chrome', 'Others', 'Others', '2021-11-02', 12, 1635856982, '/assets/img//favicon.png'),
(235, '182.1.66.73', 'Mozilla/5.0 (Linux; Android 10; SAMSUNG SM-G965F) AppleWebKit/537.36 (KHTML, like Gecko) SamsungBrowser/15.0 Chrome/90.0.4430.210 Mobile Safari/537.36', 'Android', 'Chrome', 'Others', 'Others', '2021-11-02', 2, 1635856301, '/content/plugins/member/js/login.js'),
(236, '182.1.66.73', 'Mozilla/5.0 (Linux; Android 10; SAMSUNG SM-G965F) AppleWebKit/537.36 (KHTML, like Gecko) SamsungBrowser/15.0 Chrome/90.0.4430.210 Mobile Safari/537.36', 'Android', 'Chrome', 'Others', 'Others', '2021-11-02', 2, 1635856301, '/l-member/img/in-lazy.svg'),
(237, '182.1.66.73', 'Mozilla/5.0 (Linux; Android 10; SAMSUNG SM-G965F) AppleWebKit/537.36 (KHTML, like Gecko) SamsungBrowser/15.0 Chrome/90.0.4430.210 Mobile Safari/537.36', 'Android', 'Chrome', 'Others', 'Others', '2021-11-02', 2, 1635856951, '/favicon.ico'),
(238, '182.1.66.73', 'Mozilla/5.0 (Linux; Android 10; SAMSUNG SM-G965F) AppleWebKit/537.36 (KHTML, like Gecko) SamsungBrowser/15.0 Chrome/90.0.4430.210 Mobile Safari/537.36', 'Android', 'Chrome', 'Others', 'Others', '2021-11-02', 3, 1635856977, '/assets/img/default-avatar.png'),
(239, '182.1.66.73', 'Mozilla/5.0 (Linux; Android 10; SAMSUNG SM-G965F) AppleWebKit/537.36 (KHTML, like Gecko) SamsungBrowser/15.0 Chrome/90.0.4430.210 Mobile Safari/537.36', 'Android', 'Chrome', 'Others', 'Others', '2021-11-02', 1, 0, '/'),
(240, '182.1.66.73', 'Mozilla/5.0 (Linux; Android 10; SAMSUNG SM-G965F) AppleWebKit/537.36 (KHTML, like Gecko) SamsungBrowser/15.0 Chrome/90.0.4430.210 Mobile Safari/537.36', 'Android', 'Chrome', 'Others', 'Others', '2021-11-02', 1, 0, '/img/in-lazy.gif'),
(241, '182.1.66.73', 'Mozilla/5.0 (Linux; Android 10; SAMSUNG SM-G965F) AppleWebKit/537.36 (KHTML, like Gecko) SamsungBrowser/15.0 Chrome/90.0.4430.210 Mobile Safari/537.36', 'Android', 'Chrome', 'Others', 'Others', '2021-11-02', 1, 0, '/apple-touch-icon.png'),
(242, '54.36.149.14', 'Mozilla/5.0 (compatible; AhrefsBot/7.0; +http://ahrefs.com/robot/)', 'Unknown Platform', 'Mozilla', 'Others', 'Others', '2021-11-02', 1, 0, '/robots.txt'),
(243, '51.222.253.14', 'Mozilla/5.0 (compatible; AhrefsBot/7.0; +http://ahrefs.com/robot/)', 'Unknown Platform', 'Mozilla', 'Others', 'Others', '2021-11-02', 1, 0, '/'),
(244, '52.39.170.180', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.97 Safari/537.36', 'Linux', 'Chrome', 'Others', 'Others', '2021-11-02', 1, 0, '/'),
(245, '54.185.159.212', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.97 Safari/537.36', 'Linux', 'Chrome', 'Others', 'Others', '2021-11-02', 1, 0, '/'),
(246, '54.187.159.142', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.97 Safari/537.36', 'Linux', 'Chrome', 'Others', 'Others', '2021-11-02', 1, 0, '/favicon.ico'),
(247, '54.187.159.142', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.97 Safari/537.36', 'Linux', 'Chrome', 'Others', 'Others', '2021-11-02', 1, 0, '/'),
(248, '54.244.49.95', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.97 Safari/537.36', 'Linux', 'Chrome', 'Others', 'Others', '2021-11-02', 1, 0, '/favicon.ico'),
(249, '54.71.132.101', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64)AppleWebKit/537.36 (KHTML, like Gecko) Chrome/66.0.3359.181 Safari/537.36', 'Windows 10', 'Chrome', 'Others', 'Others', '2021-11-02', 1, 0, '/'),
(250, '36.85.19.208', 'Mozilla/5.0 (Linux; Android 10; SAMSUNG SM-G965F) AppleWebKit/537.36 (KHTML, like Gecko) SamsungBrowser/15.0 Chrome/90.0.4430.210 Mobile Safari/537.36', 'Android', 'Chrome', 'Others', 'Others', '2021-11-02', 3, 1635865127, '/content/plugins/member/js/login.js'),
(251, '36.85.19.208', 'Mozilla/5.0 (Linux; Android 10; SAMSUNG SM-G965F) AppleWebKit/537.36 (KHTML, like Gecko) SamsungBrowser/15.0 Chrome/90.0.4430.210 Mobile Safari/537.36', 'Android', 'Chrome', 'Others', 'Others', '2021-11-02', 3, 1635865127, '/l-member/img/in-lazy.svg'),
(252, '36.85.19.208', 'Mozilla/5.0 (Linux; Android 10; SAMSUNG SM-G965F) AppleWebKit/537.36 (KHTML, like Gecko) SamsungBrowser/15.0 Chrome/90.0.4430.210 Mobile Safari/537.36', 'Android', 'Chrome', 'Others', 'Others', '2021-11-02', 2, 1635864416, '/favicon.ico'),
(253, '103.213.129.150', 'Mozilla/5.0 (Linux; Android 10; VOG-L29) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/92.0.4515.166 Mobile Safari/537.36', 'Android', 'Chrome', 'Others', 'Others', '2021-11-02', 1, 0, '/content/plugins/member/js/login.js'),
(254, '103.213.129.150', 'Mozilla/5.0 (Linux; Android 10; VOG-L29) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/92.0.4515.166 Mobile Safari/537.36', 'Android', 'Chrome', 'Others', 'Others', '2021-11-02', 1, 0, '/favicon.ico'),
(255, '103.213.129.150', 'Mozilla/5.0 (Linux; Android 10; VOG-L29) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/92.0.4515.166 Mobile Safari/537.36', 'Android', 'Chrome', 'Others', 'Others', '2021-11-02', 1, 0, '/assets/img/default-avatar.png'),
(256, '182.1.119.115', 'Mozilla/5.0 (Linux; Android 11; SM-A305F) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/91.0.4472.120 Mobile Safari/537.36', 'Android', 'Chrome', 'Others', 'Others', '2021-11-03', 1, 0, '/content/plugins/member/js/login.js'),
(257, '182.1.119.115', 'Mozilla/5.0 (Linux; Android 11; SM-A305F) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/91.0.4472.120 Mobile Safari/537.36', 'Android', 'Chrome', 'Others', 'Others', '2021-11-03', 1, 0, '/l-member/img/in-lazy.svg'),
(258, '198.20.67.197', 'Mozilla/5.0 (compatible; MSIE 9.0; Windows NT 6.1; WOW64; Trident/6.0)', 'Windows 7', 'Internet Explorer', 'Others', 'Others', '2021-11-03', 2, 1635878854, '/'),
(259, '198.20.67.197', 'SiteLockSpider [en] (WinNT; I ;Nav)', 'Windows NT', '', 'Others', 'Others', '2021-11-03', 1, 0, '/th1s_1s_a_4o4.html'),
(260, '198.20.67.197', 'Mozilla/5.0 (compatible; MSIE 9.0; Windows NT 6.1; WOW64; Trident/6.0)', 'Windows 7', 'Internet Explorer', 'Others', 'Others', '2021-11-03', 1, 0, '/pages/company'),
(261, '198.20.67.197', 'SiteLockSpider [en] (WinNT; I ;Nav)', 'Windows NT', '', 'Others', 'Others', '2021-11-03', 1, 0, '/pages/education'),
(262, '198.20.67.197', 'SiteLockSpider [en] (WinNT; I ;Nav)', 'Windows NT', '', 'Others', 'Others', '2021-11-03', 1, 0, '/pages/trading-platform'),
(263, '184.168.119.100', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/95.0.4638.69 Safari/537.36', 'Mac OS X', 'Chrome', 'ID', 'Belakangpadang', '2021-11-03', 4, 1635935701, '/robots.txt'),
(264, '184.168.119.100', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_4) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.97 Safari/537.36', 'Mac OS X', 'Chrome', 'ID', 'Belakangpadang', '2021-11-03', 1, 0, '/magento_version'),
(265, '184.168.119.100', 'Mozilla/5.0 (Windows NT 10.0; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.106 Safari/537.36', 'Windows 10', 'Chrome', 'ID', 'Belakangpadang', '2021-11-03', 13, 1635936819, '/'),
(266, '184.168.119.100', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_4) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.97 Safari/537.36', 'Mac OS X', 'Chrome', 'ID', 'Belakangpadang', '2021-11-03', 1, 0, '/pages/contact-us'),
(267, '184.168.119.100', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_4) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.97 Safari/537.36', 'Mac OS X', 'Chrome', 'ID', 'Belakangpadang', '2021-11-03', 1, 0, '/pages/education'),
(268, '184.168.119.100', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_4) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.97 Safari/537.36', 'Mac OS X', 'Chrome', 'ID', 'Belakangpadang', '2021-11-03', 1, 0, '/pages/trading-platform'),
(269, '184.168.119.100', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_4) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.97 Safari/537.36', 'Mac OS X', 'Chrome', 'ID', 'Belakangpadang', '2021-11-03', 1, 0, '/pages/company'),
(270, '184.168.119.100', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/95.0.4638.69 Safari/537.36', 'Mac OS X', 'Chrome', 'ID', 'Belakangpadang', '2021-11-03', 6, 1635935711, '/content/plugins/member/js/login.js'),
(271, '184.168.119.100', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/95.0.4638.69 Safari/537.36', 'Mac OS X', 'Chrome', 'ID', 'Belakangpadang', '2021-11-03', 4, 1635935711, '/l-member/img/in-lazy.svg'),
(272, '184.168.119.100', 'Mozilla/5.0 (Linux; Android 10; SAMSUNG SM-G965F) AppleWebKit/537.36 (KHTML, like Gecko) SamsungBrowser/15.0 Chrome/90.0.4430.210 Mobile Safari/537.36', 'Android', 'Chrome', 'ID', 'Belakangpadang', '2021-11-03', 1, 0, '/favicon.ico'),
(273, '184.168.119.100', 'Mozilla/5.0 (Linux; Android 10; SAMSUNG SM-G965F) AppleWebKit/537.36 (KHTML, like Gecko) SamsungBrowser/15.0 Chrome/90.0.4430.210 Mobile Safari/537.36', 'Android', 'Chrome', 'ID', 'Belakangpadang', '2021-11-03', 5, 1635918887, '/content/plugins/linggafx.com/js/fullcalendar.min.js'),
(274, '184.168.119.100', 'Mozilla/5.0 (Linux; Android 10; SAMSUNG SM-G965F) AppleWebKit/537.36 (KHTML, like Gecko) SamsungBrowser/15.0 Chrome/90.0.4430.210 Mobile Safari/537.36', 'Android', 'Chrome', 'ID', 'Belakangpadang', '2021-11-03', 5, 1635918887, '/content/plugins/linggafx.com/js/daygrid.min.js'),
(275, '184.168.119.100', 'Mozilla/5.0 (Linux; Android 10; SAMSUNG SM-G965F) AppleWebKit/537.36 (KHTML, like Gecko) SamsungBrowser/15.0 Chrome/90.0.4430.210 Mobile Safari/537.36', 'Android', 'Chrome', 'ID', 'Belakangpadang', '2021-11-03', 5, 1635918887, '/content/plugins/linggafx.com/js/interaction.min.js'),
(276, '184.168.119.100', 'Mozilla/5.0 (Linux; Android 10; SAMSUNG SM-G965F) AppleWebKit/537.36 (KHTML, like Gecko) SamsungBrowser/15.0 Chrome/90.0.4430.210 Mobile Safari/537.36', 'Android', 'Chrome', 'ID', 'Belakangpadang', '2021-11-03', 5, 1635918887, '/content/plugins/linggafx.com/js/timegrid.min.js'),
(277, '184.168.119.100', 'Mozilla/5.0 (Linux; Android 10; SAMSUNG SM-G965F) AppleWebKit/537.36 (KHTML, like Gecko) SamsungBrowser/15.0 Chrome/90.0.4430.210 Mobile Safari/537.36', 'Android', 'Chrome', 'ID', 'Belakangpadang', '2021-11-03', 4, 1635918888, '/assets/img//favicon.png'),
(278, '184.168.119.100', 'Mozilla/5.0 (Linux; Android 10; SAMSUNG SM-G965F) AppleWebKit/537.36 (KHTML, like Gecko) SamsungBrowser/15.0 Chrome/90.0.4430.210 Mobile Safari/537.36', 'Android', 'Chrome', 'ID', 'Belakangpadang', '2021-11-03', 4, 1635918888, '/assets/img//apple-icon.png'),
(279, '184.168.119.100', 'Mozilla/5.0 (Linux; Android 10; SAMSUNG SM-G965F) AppleWebKit/537.36 (KHTML, like Gecko) SamsungBrowser/15.0 Chrome/90.0.4430.210 Mobile Safari/537.36', 'Android', 'Chrome', 'ID', 'Belakangpadang', '2021-11-03', 2, 1635918876, '/l-member/assets/img//apple-icon.png'),
(280, '184.168.119.100', 'Mozilla/5.0 (Linux; Android 10; SAMSUNG SM-G965F) AppleWebKit/537.36 (KHTML, like Gecko) SamsungBrowser/15.0 Chrome/90.0.4430.210 Mobile Safari/537.36', 'Android', 'Chrome', 'ID', 'Belakangpadang', '2021-11-03', 1, 0, '/l-member/assets/img//favicon.png'),
(281, '184.168.119.100', 'Dalvik/2.1.0 (Linux; U; Android 10; SM-G965F Build/QP1A.190711.020)', 'Android', '', 'ID', 'Belakangpadang', '2021-11-03', 1, 0, '/l-member/account_trading/assets/img//apple-icon.png'),
(282, '184.168.119.100', 'Mozilla/5.0 (X11; Ubuntu; Linux x86_64; rv:62.0) Gecko/20100101 Firefox/62.0', 'Linux', 'Firefox', 'ID', 'Belakangpadang', '2021-11-03', 1, 0, '/index.php/admin/'),
(283, '184.168.119.100', 'Mozilla/5.0 (X11; Ubuntu; Linux x86_64; rv:62.0) Gecko/20100101 Firefox/62.0', 'Linux', 'Firefox', 'ID', 'Belakangpadang', '2021-11-03', 1, 0, '/old/index.php/admin/'),
(284, '184.168.119.100', 'Mozilla/5.0 (X11; Ubuntu; Linux x86_64; rv:62.0) Gecko/20100101 Firefox/62.0', 'Linux', 'Firefox', 'ID', 'Belakangpadang', '2021-11-03', 1, 0, '/dev/index.php/admin/'),
(285, '184.168.119.100', 'Mozilla/5.0 (X11; Ubuntu; Linux x86_64; rv:62.0) Gecko/20100101 Firefox/62.0', 'Linux', 'Firefox', 'ID', 'Belakangpadang', '2021-11-03', 1, 0, '/shop/index.php/admin/'),
(286, '184.168.119.100', 'Mozilla/5.0 (X11; Ubuntu; Linux x86_64; rv:62.0) Gecko/20100101 Firefox/62.0', 'Linux', 'Firefox', 'ID', 'Belakangpadang', '2021-11-03', 1, 0, '/test/index.php/admin/'),
(287, '184.168.119.100', 'Mozilla/5.0 (X11; Ubuntu; Linux x86_64; rv:62.0) Gecko/20100101 Firefox/62.0', 'Linux', 'Firefox', 'ID', 'Belakangpadang', '2021-11-03', 1, 0, '/demo/index.php/admin/'),
(288, '184.168.119.100', 'Mozilla/5.0 (X11; Ubuntu; Linux x86_64; rv:62.0) Gecko/20100101 Firefox/62.0', 'Linux', 'Firefox', 'ID', 'Belakangpadang', '2021-11-03', 1, 0, '/store/index.php/admin/'),
(289, '184.168.119.100', 'Mozilla/5.0 (X11; Ubuntu; Linux x86_64; rv:62.0) Gecko/20100101 Firefox/62.0', 'Linux', 'Firefox', 'ID', 'Belakangpadang', '2021-11-03', 1, 0, '/staging/index.php/admin/'),
(290, '184.168.119.100', 'Mozilla/5.0 (X11; Ubuntu; Linux x86_64; rv:62.0) Gecko/20100101 Firefox/62.0', 'Linux', 'Firefox', 'ID', 'Belakangpadang', '2021-11-03', 1, 0, '/magento/index.php/admin/'),
(291, '184.168.119.100', 'Mozilla/5.0 (X11; Ubuntu; Linux x86_64; rv:62.0) Gecko/20100101 Firefox/62.0', 'Linux', 'Firefox', 'ID', 'Belakangpadang', '2021-11-03', 1, 0, '/rss/order/new'),
(292, '184.168.119.100', 'Mozilla/5.0 (X11; Ubuntu; Linux x86_64; rv:62.0) Gecko/20100101 Firefox/62.0', 'Linux', 'Firefox', 'ID', 'Belakangpadang', '2021-11-03', 1, 0, '/rss/catalog/notifystock'),
(293, '184.168.119.100', 'Mozilla/5.0 (X11; Ubuntu; Linux x86_64; rv:62.0) Gecko/20100101 Firefox/62.0', 'Linux', 'Firefox', 'ID', 'Belakangpadang', '2021-11-03', 1, 0, '/rss/catalog/review'),
(294, '184.168.119.100', 'Mozilla/5.0 (X11; Ubuntu; Linux x86_64; rv:62.0) Gecko/20100101 Firefox/62.0', 'Linux', 'Firefox', 'ID', 'Belakangpadang', '2021-11-03', 1, 0, '/old/rss/order/new'),
(295, '184.168.119.100', 'Mozilla/5.0 (X11; Ubuntu; Linux x86_64; rv:62.0) Gecko/20100101 Firefox/62.0', 'Linux', 'Firefox', 'ID', 'Belakangpadang', '2021-11-03', 1, 0, '/old/rss/catalog/notifystock'),
(296, '184.168.119.100', 'Mozilla/5.0 (X11; Ubuntu; Linux x86_64; rv:62.0) Gecko/20100101 Firefox/62.0', 'Linux', 'Firefox', 'ID', 'Belakangpadang', '2021-11-03', 1, 0, '/old/rss/catalog/review'),
(297, '184.168.119.100', 'Mozilla/5.0 (X11; Ubuntu; Linux x86_64; rv:62.0) Gecko/20100101 Firefox/62.0', 'Linux', 'Firefox', 'ID', 'Belakangpadang', '2021-11-03', 1, 0, '/dev/rss/order/new'),
(298, '184.168.119.100', 'Mozilla/5.0 (X11; Ubuntu; Linux x86_64; rv:62.0) Gecko/20100101 Firefox/62.0', 'Linux', 'Firefox', 'ID', 'Belakangpadang', '2021-11-03', 1, 0, '/dev/rss/catalog/notifystock'),
(299, '184.168.119.100', 'Mozilla/5.0 (X11; Ubuntu; Linux x86_64; rv:62.0) Gecko/20100101 Firefox/62.0', 'Linux', 'Firefox', 'ID', 'Belakangpadang', '2021-11-03', 1, 0, '/dev/rss/catalog/review'),
(300, '184.168.119.100', 'Mozilla/5.0 (X11; Ubuntu; Linux x86_64; rv:62.0) Gecko/20100101 Firefox/62.0', 'Linux', 'Firefox', 'ID', 'Belakangpadang', '2021-11-03', 1, 0, '/shop/rss/order/new'),
(301, '184.168.119.100', 'Mozilla/5.0 (X11; Ubuntu; Linux x86_64; rv:62.0) Gecko/20100101 Firefox/62.0', 'Linux', 'Firefox', 'ID', 'Belakangpadang', '2021-11-03', 1, 0, '/shop/rss/catalog/notifystock'),
(302, '184.168.119.100', 'Mozilla/5.0 (X11; Ubuntu; Linux x86_64; rv:62.0) Gecko/20100101 Firefox/62.0', 'Linux', 'Firefox', 'ID', 'Belakangpadang', '2021-11-03', 1, 0, '/shop/rss/catalog/review'),
(303, '184.168.119.100', 'Mozilla/5.0 (X11; Ubuntu; Linux x86_64; rv:62.0) Gecko/20100101 Firefox/62.0', 'Linux', 'Firefox', 'ID', 'Belakangpadang', '2021-11-03', 1, 0, '/test/rss/order/new'),
(304, '184.168.119.100', 'Mozilla/5.0 (X11; Ubuntu; Linux x86_64; rv:62.0) Gecko/20100101 Firefox/62.0', 'Linux', 'Firefox', 'ID', 'Belakangpadang', '2021-11-03', 1, 0, '/test/rss/catalog/notifystock'),
(305, '184.168.119.100', 'Mozilla/5.0 (X11; Ubuntu; Linux x86_64; rv:62.0) Gecko/20100101 Firefox/62.0', 'Linux', 'Firefox', 'ID', 'Belakangpadang', '2021-11-03', 1, 0, '/test/rss/catalog/review'),
(306, '184.168.119.100', 'Mozilla/5.0 (X11; Ubuntu; Linux x86_64; rv:62.0) Gecko/20100101 Firefox/62.0', 'Linux', 'Firefox', 'ID', 'Belakangpadang', '2021-11-03', 1, 0, '/demo/rss/order/new'),
(307, '184.168.119.100', 'Mozilla/5.0 (X11; Ubuntu; Linux x86_64; rv:62.0) Gecko/20100101 Firefox/62.0', 'Linux', 'Firefox', 'ID', 'Belakangpadang', '2021-11-03', 1, 0, '/demo/rss/catalog/notifystock'),
(308, '184.168.119.100', 'Mozilla/5.0 (X11; Ubuntu; Linux x86_64; rv:62.0) Gecko/20100101 Firefox/62.0', 'Linux', 'Firefox', 'ID', 'Belakangpadang', '2021-11-03', 1, 0, '/demo/rss/catalog/review'),
(309, '184.168.119.100', 'Mozilla/5.0 (X11; Ubuntu; Linux x86_64; rv:62.0) Gecko/20100101 Firefox/62.0', 'Linux', 'Firefox', 'ID', 'Belakangpadang', '2021-11-03', 1, 0, '/store/rss/order/new'),
(310, '184.168.119.100', 'Mozilla/5.0 (X11; Ubuntu; Linux x86_64; rv:62.0) Gecko/20100101 Firefox/62.0', 'Linux', 'Firefox', 'ID', 'Belakangpadang', '2021-11-03', 1, 0, '/store/rss/catalog/notifystock'),
(311, '184.168.119.100', 'Mozilla/5.0 (X11; Ubuntu; Linux x86_64; rv:62.0) Gecko/20100101 Firefox/62.0', 'Linux', 'Firefox', 'ID', 'Belakangpadang', '2021-11-03', 1, 0, '/store/rss/catalog/review'),
(312, '184.168.119.100', 'Mozilla/5.0 (X11; Ubuntu; Linux x86_64; rv:62.0) Gecko/20100101 Firefox/62.0', 'Linux', 'Firefox', 'ID', 'Belakangpadang', '2021-11-03', 1, 0, '/staging/rss/order/new'),
(313, '184.168.119.100', 'Mozilla/5.0 (X11; Ubuntu; Linux x86_64; rv:62.0) Gecko/20100101 Firefox/62.0', 'Linux', 'Firefox', 'ID', 'Belakangpadang', '2021-11-03', 1, 0, '/staging/rss/catalog/notifystock'),
(314, '184.168.119.100', 'Mozilla/5.0 (X11; Ubuntu; Linux x86_64; rv:62.0) Gecko/20100101 Firefox/62.0', 'Linux', 'Firefox', 'ID', 'Belakangpadang', '2021-11-03', 1, 0, '/staging/rss/catalog/review'),
(315, '184.168.119.100', 'Mozilla/5.0 (X11; Ubuntu; Linux x86_64; rv:62.0) Gecko/20100101 Firefox/62.0', 'Linux', 'Firefox', 'ID', 'Belakangpadang', '2021-11-03', 1, 0, '/magento/rss/order/new'),
(316, '184.168.119.100', 'Mozilla/5.0 (X11; Ubuntu; Linux x86_64; rv:62.0) Gecko/20100101 Firefox/62.0', 'Linux', 'Firefox', 'ID', 'Belakangpadang', '2021-11-03', 1, 0, '/magento/rss/catalog/notifystock'),
(317, '184.168.119.100', 'Mozilla/5.0 (X11; Ubuntu; Linux x86_64; rv:62.0) Gecko/20100101 Firefox/62.0', 'Linux', 'Firefox', 'ID', 'Belakangpadang', '2021-11-03', 1, 0, '/magento/rss/catalog/review'),
(318, '184.168.119.100', 'Mozilla/5.0 (X11; Ubuntu; Linux x86_64; rv:62.0) Gecko/20100101 Firefox/62.0', 'Linux', 'Firefox', 'ID', 'Belakangpadang', '2021-11-03', 1, 0, '/downloader/index.php'),
(319, '184.168.119.100', 'Mozilla/5.0 (X11; Ubuntu; Linux x86_64; rv:62.0) Gecko/20100101 Firefox/62.0', 'Linux', 'Firefox', 'ID', 'Belakangpadang', '2021-11-03', 1, 0, '/old/downloader/index.php'),
(320, '184.168.119.100', 'Mozilla/5.0 (X11; Ubuntu; Linux x86_64; rv:62.0) Gecko/20100101 Firefox/62.0', 'Linux', 'Firefox', 'ID', 'Belakangpadang', '2021-11-03', 1, 0, '/dev/downloader/index.php'),
(321, '184.168.119.100', 'Mozilla/5.0 (X11; Ubuntu; Linux x86_64; rv:62.0) Gecko/20100101 Firefox/62.0', 'Linux', 'Firefox', 'ID', 'Belakangpadang', '2021-11-03', 1, 0, '/shop/downloader/index.php'),
(322, '184.168.119.100', 'Mozilla/5.0 (X11; Ubuntu; Linux x86_64; rv:62.0) Gecko/20100101 Firefox/62.0', 'Linux', 'Firefox', 'ID', 'Belakangpadang', '2021-11-03', 1, 0, '/test/downloader/index.php'),
(323, '184.168.119.100', 'Mozilla/5.0 (X11; Ubuntu; Linux x86_64; rv:62.0) Gecko/20100101 Firefox/62.0', 'Linux', 'Firefox', 'ID', 'Belakangpadang', '2021-11-03', 1, 0, '/demo/downloader/index.php'),
(324, '184.168.119.100', 'Mozilla/5.0 (X11; Ubuntu; Linux x86_64; rv:62.0) Gecko/20100101 Firefox/62.0', 'Linux', 'Firefox', 'ID', 'Belakangpadang', '2021-11-03', 1, 0, '/store/downloader/index.php'),
(325, '184.168.119.100', 'Mozilla/5.0 (X11; Ubuntu; Linux x86_64; rv:62.0) Gecko/20100101 Firefox/62.0', 'Linux', 'Firefox', 'ID', 'Belakangpadang', '2021-11-03', 1, 0, '/staging/downloader/index.php'),
(326, '184.168.119.100', 'Mozilla/5.0 (X11; Ubuntu; Linux x86_64; rv:62.0) Gecko/20100101 Firefox/62.0', 'Linux', 'Firefox', 'ID', 'Belakangpadang', '2021-11-03', 1, 0, '/magento/downloader/index.php'),
(327, '184.168.119.100', 'Mozilla/5.0 (X11; Ubuntu; Linux x86_64; rv:62.0) Gecko/20100101 Firefox/62.0', 'Linux', 'Firefox', 'ID', 'Belakangpadang', '2021-11-03', 1, 0, '/errors/503.php'),
(328, '184.168.119.100', 'Mozilla/5.0 (X11; Ubuntu; Linux x86_64; rv:62.0) Gecko/20100101 Firefox/62.0', 'Linux', 'Firefox', 'ID', 'Belakangpadang', '2021-11-03', 1, 0, '/old/errors/503.php'),
(329, '184.168.119.100', 'Mozilla/5.0 (X11; Ubuntu; Linux x86_64; rv:62.0) Gecko/20100101 Firefox/62.0', 'Linux', 'Firefox', 'ID', 'Belakangpadang', '2021-11-03', 1, 0, '/dev/errors/503.php'),
(330, '184.168.119.100', 'Mozilla/5.0 (X11; Ubuntu; Linux x86_64; rv:62.0) Gecko/20100101 Firefox/62.0', 'Linux', 'Firefox', 'ID', 'Belakangpadang', '2021-11-03', 1, 0, '/shop/errors/503.php'),
(331, '184.168.119.100', 'Mozilla/5.0 (X11; Ubuntu; Linux x86_64; rv:62.0) Gecko/20100101 Firefox/62.0', 'Linux', 'Firefox', 'ID', 'Belakangpadang', '2021-11-03', 1, 0, '/test/errors/503.php'),
(332, '184.168.119.100', 'Mozilla/5.0 (X11; Ubuntu; Linux x86_64; rv:62.0) Gecko/20100101 Firefox/62.0', 'Linux', 'Firefox', 'ID', 'Belakangpadang', '2021-11-03', 1, 0, '/demo/errors/503.php'),
(333, '184.168.119.100', 'Mozilla/5.0 (X11; Ubuntu; Linux x86_64; rv:62.0) Gecko/20100101 Firefox/62.0', 'Linux', 'Firefox', 'ID', 'Belakangpadang', '2021-11-03', 1, 0, '/store/errors/503.php'),
(334, '184.168.119.100', 'Mozilla/5.0 (X11; Ubuntu; Linux x86_64; rv:62.0) Gecko/20100101 Firefox/62.0', 'Linux', 'Firefox', 'ID', 'Belakangpadang', '2021-11-03', 1, 0, '/staging/errors/503.php'),
(335, '184.168.119.100', 'Mozilla/5.0 (X11; Ubuntu; Linux x86_64; rv:62.0) Gecko/20100101 Firefox/62.0', 'Linux', 'Firefox', 'ID', 'Belakangpadang', '2021-11-03', 1, 0, '/magento/errors/503.php'),
(336, '184.168.119.100', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/89.0.4389.90 Safari/537.36', 'Windows 10', 'Chrome', 'ID', 'Belakangpadang', '2021-11-03', 4, 1635936821, '/img/in-lazy.gif'),
(337, '184.168.119.100', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/95.0.4638.69 Safari/537.36', 'Windows 10', 'Chrome', 'ID', 'Belakangpadang', '2021-11-03', 1, 0, '/img/in-logo-2.svg'),
(338, '184.168.119.100', 'Go-http-client/1.1', 'Unknown Platform', '', 'ID', 'Belakangpadang', '2021-11-03', 1, 0, '/apple-touch-icon.png');

-- --------------------------------------------------------

--
-- Table structure for table `t_wallet`
--

CREATE TABLE `t_wallet` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `amount` double(20,4) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `t_wallet`
--

INSERT INTO `t_wallet` (`id`, `user_id`, `amount`) VALUES
(1, 5, 0.0000),
(2, 6, 0.0000),
(3, 7, 0.0000),
(4, 8, 0.0000),
(5, 9, 0.0000),
(6, 10, 0.0000),
(7, 11, 0.0000),
(8, 12, 0.0000);

-- --------------------------------------------------------

--
-- Table structure for table `t_wallet_history`
--

CREATE TABLE `t_wallet_history` (
  `id` int(11) NOT NULL,
  `wallet_id` int(11) NOT NULL,
  `amount_before` double(10,2) NOT NULL,
  `amount` double(10,2) NOT NULL,
  `amount_after` double(10,2) NOT NULL,
  `source` enum('Deposit','Withdrawal','Account','Internal Transfer','Approval Deposit Member','Withdrawal Rejected','Internal Transfer Rejected') NOT NULL,
  `deposit_id` int(11) NOT NULL,
  `withdraw_id` int(11) NOT NULL,
  `internal_transfer_id` int(11) NOT NULL,
  `account` varchar(25) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `t_wallet_history`
--

INSERT INTO `t_wallet_history` (`id`, `wallet_id`, `amount_before`, `amount`, `amount_after`, `source`, `deposit_id`, `withdraw_id`, `internal_transfer_id`, `account`, `date`) VALUES
(1, 2, 0.00, 500.00, 500.00, 'Deposit', 1, 0, 0, '', '2021-11-02 05:10:40'),
(2, 7, 0.00, 500.00, 500.00, 'Deposit', 2, 0, 0, '', '2021-11-02 09:05:44'),
(3, 4, 0.00, 500.00, 500.00, 'Deposit', 3, 0, 0, '', '2021-11-02 09:05:59'),
(4, 3, 0.00, 500.00, 500.00, 'Deposit', 4, 0, 0, '', '2021-11-02 09:06:14'),
(5, 6, 0.00, 500.00, 500.00, 'Deposit', 5, 0, 0, '', '2021-11-02 09:06:31'),
(6, 5, 0.00, 500.00, 500.00, 'Deposit', 6, 0, 0, '', '2021-11-02 09:09:22'),
(7, 2, 500.00, 500.00, 0.00, 'Internal Transfer', 0, 0, 1, '', '2021-11-02 09:31:49'),
(8, 4, 500.00, 500.00, 0.00, 'Internal Transfer', 0, 0, 2, '', '2021-11-02 09:41:16'),
(9, 7, 500.00, 500.00, 0.00, 'Internal Transfer', 0, 0, 3, '', '2021-11-02 10:19:18'),
(10, 3, 500.00, 500.00, 0.00, 'Internal Transfer', 0, 0, 4, '', '2021-11-02 10:22:08'),
(11, 6, 500.00, 500.00, 0.00, 'Internal Transfer', 0, 0, 5, '', '2021-11-02 10:23:42'),
(12, 5, 500.00, 500.00, 0.00, 'Internal Transfer', 0, 0, 6, '', '2021-11-02 10:25:22');

-- --------------------------------------------------------

--
-- Table structure for table `t_web_analytics`
--

CREATE TABLE `t_web_analytics` (
  `id` int(11) NOT NULL,
  `analytics` text NOT NULL,
  `type` enum('Google Analytics','Facebook Pixel','Google Tag Manager') NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `t_web_analytics`
--

INSERT INTO `t_web_analytics` (`id`, `analytics`, `type`) VALUES
(1, '&lt;!-- Global site tag (gtag.js) - Google Analytics --&gt;\r\n&lt;script async src=&quot;https://www.googletagmanager.com/gtag/js?id=UA-158592208-1&quot;&gt;&lt;/script&gt;\r\n&lt;script&gt;\r\n	  window.dataLayer = window.dataLayer || [];\r\n	  function gtag(){dataLayer.push(arguments);}\r\n	  gtag(&#039;js&#039;, new Date());\r\n\r\n	  gtag(&#039;config&#039;, &#039;UA-158592208-1&#039;);\r\n&lt;/script&gt;', 'Google Analytics'),
(2, '&lt;!-- Facebook Pixel Code --&gt;\r\n&lt;script&gt;\r\n  !function(f,b,e,v,n,t,s)\r\n  {if(f.fbq)return;n=f.fbq=function(){n.callMethod?\r\n  n.callMethod.apply(n,arguments):n.queue.push(arguments)};\r\n  if(!f._fbq)f._fbq=n;n.push=n;n.loaded=!0;n.version=&#039;2.0&#039;;\r\n  n.queue=[];t=b.createElement(e);t.async=!0;\r\n  t.src=v;s=b.getElementsByTagName(e)[0];\r\n  s.parentNode.insertBefore(t,s)}(window, document,&#039;script&#039;,\r\n  &#039;https://connect.facebook.net/en_US/fbevents.js&#039;);\r\n  fbq(&#039;init&#039;, &#039;231930291193109&#039;);\r\n  fbq(&#039;track&#039;, &#039;PageView&#039;);\r\n&lt;/script&gt;\r\n&lt;noscript&gt;&lt;img height=&quot;1&quot; width=&quot;1&quot; style=&quot;display:none&quot;\r\n  src=&quot;https://www.facebook.com/tr?id=231930291193109&amp;ev=PageView&amp;noscript=1&quot;\r\n/&gt;&lt;/noscript&gt;\r\n&lt;!-- End Facebook Pixel Code --&gt;', 'Facebook Pixel'),
(3, '', 'Google Tag Manager');

-- --------------------------------------------------------

--
-- Table structure for table `t_withdraw`
--

CREATE TABLE `t_withdraw` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `bank_id` int(11) NOT NULL,
  `username` varchar(150) NOT NULL,
  `source` enum('Wallet') NOT NULL,
  `rate_amount` double(10,2) NOT NULL,
  `amount_usd` double(20,4) NOT NULL,
  `amount` double(20,4) NOT NULL,
  `status` enum('Pending','Approved','Rejected') NOT NULL,
  `date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `update_date` double(10,2) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `t_account_receiver`
--
ALTER TABLE `t_account_receiver`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `t_account_trading`
--
ALTER TABLE `t_account_trading`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `t_account_trading_amount_history`
--
ALTER TABLE `t_account_trading_amount_history`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `t_activity`
--
ALTER TABLE `t_activity`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `t_album`
--
ALTER TABLE `t_album`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `t_bank`
--
ALTER TABLE `t_bank`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `t_broker`
--
ALTER TABLE `t_broker`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `t_broker_investor`
--
ALTER TABLE `t_broker_investor`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `t_category`
--
ALTER TABLE `t_category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `t_chat_whatsapp`
--
ALTER TABLE `t_chat_whatsapp`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `t_comment`
--
ALTER TABLE `t_comment`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `t_component`
--
ALTER TABLE `t_component`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `t_data_pesan`
--
ALTER TABLE `t_data_pesan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `t_deposit`
--
ALTER TABLE `t_deposit`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `t_footer`
--
ALTER TABLE `t_footer`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `t_gallery`
--
ALTER TABLE `t_gallery`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `t_homepage`
--
ALTER TABLE `t_homepage`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `t_internal_transfer`
--
ALTER TABLE `t_internal_transfer`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `t_landingpage`
--
ALTER TABLE `t_landingpage`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `t_language`
--
ALTER TABLE `t_language`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `t_mail`
--
ALTER TABLE `t_mail`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `t_menu`
--
ALTER TABLE `t_menu`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `t_menu_group`
--
ALTER TABLE `t_menu_group`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `t_pages`
--
ALTER TABLE `t_pages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `t_partnership`
--
ALTER TABLE `t_partnership`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `t_popup_gambar`
--
ALTER TABLE `t_popup_gambar`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `t_post`
--
ALTER TABLE `t_post`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `t_product`
--
ALTER TABLE `t_product`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `t_rate`
--
ALTER TABLE `t_rate`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `t_running_price_dua`
--
ALTER TABLE `t_running_price_dua`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `t_running_price_satu`
--
ALTER TABLE `t_running_price_satu`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `t_setting`
--
ALTER TABLE `t_setting`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `t_slider`
--
ALTER TABLE `t_slider`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `t_slug`
--
ALTER TABLE `t_slug`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `t_step_register`
--
ALTER TABLE `t_step_register`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `t_tag`
--
ALTER TABLE `t_tag`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `t_testimoni`
--
ALTER TABLE `t_testimoni`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `t_theme`
--
ALTER TABLE `t_theme`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `t_trade_report`
--
ALTER TABLE `t_trade_report`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `t_user`
--
ALTER TABLE `t_user`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `t_user_level`
--
ALTER TABLE `t_user_level`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `t_user_role`
--
ALTER TABLE `t_user_role`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `t_visitor`
--
ALTER TABLE `t_visitor`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `t_wallet`
--
ALTER TABLE `t_wallet`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `t_wallet_history`
--
ALTER TABLE `t_wallet_history`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `t_web_analytics`
--
ALTER TABLE `t_web_analytics`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `t_withdraw`
--
ALTER TABLE `t_withdraw`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `t_account_receiver`
--
ALTER TABLE `t_account_receiver`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `t_account_trading`
--
ALTER TABLE `t_account_trading`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `t_account_trading_amount_history`
--
ALTER TABLE `t_account_trading_amount_history`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `t_activity`
--
ALTER TABLE `t_activity`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=59;

--
-- AUTO_INCREMENT for table `t_album`
--
ALTER TABLE `t_album`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `t_bank`
--
ALTER TABLE `t_bank`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `t_broker`
--
ALTER TABLE `t_broker`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `t_broker_investor`
--
ALTER TABLE `t_broker_investor`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `t_category`
--
ALTER TABLE `t_category`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `t_chat_whatsapp`
--
ALTER TABLE `t_chat_whatsapp`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `t_comment`
--
ALTER TABLE `t_comment`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `t_component`
--
ALTER TABLE `t_component`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `t_data_pesan`
--
ALTER TABLE `t_data_pesan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `t_deposit`
--
ALTER TABLE `t_deposit`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `t_footer`
--
ALTER TABLE `t_footer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `t_gallery`
--
ALTER TABLE `t_gallery`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `t_homepage`
--
ALTER TABLE `t_homepage`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `t_internal_transfer`
--
ALTER TABLE `t_internal_transfer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `t_landingpage`
--
ALTER TABLE `t_landingpage`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `t_language`
--
ALTER TABLE `t_language`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `t_mail`
--
ALTER TABLE `t_mail`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `t_menu`
--
ALTER TABLE `t_menu`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=253;

--
-- AUTO_INCREMENT for table `t_menu_group`
--
ALTER TABLE `t_menu_group`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `t_pages`
--
ALTER TABLE `t_pages`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `t_partnership`
--
ALTER TABLE `t_partnership`
  MODIFY `id` int(128) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `t_popup_gambar`
--
ALTER TABLE `t_popup_gambar`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `t_post`
--
ALTER TABLE `t_post`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `t_product`
--
ALTER TABLE `t_product`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `t_rate`
--
ALTER TABLE `t_rate`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `t_running_price_dua`
--
ALTER TABLE `t_running_price_dua`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `t_running_price_satu`
--
ALTER TABLE `t_running_price_satu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `t_setting`
--
ALTER TABLE `t_setting`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `t_slider`
--
ALTER TABLE `t_slider`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `t_slug`
--
ALTER TABLE `t_slug`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `t_step_register`
--
ALTER TABLE `t_step_register`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `t_tag`
--
ALTER TABLE `t_tag`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `t_testimoni`
--
ALTER TABLE `t_testimoni`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `t_theme`
--
ALTER TABLE `t_theme`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=62;

--
-- AUTO_INCREMENT for table `t_trade_report`
--
ALTER TABLE `t_trade_report`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `t_user`
--
ALTER TABLE `t_user`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `t_user_level`
--
ALTER TABLE `t_user_level`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `t_user_role`
--
ALTER TABLE `t_user_role`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=82;

--
-- AUTO_INCREMENT for table `t_visitor`
--
ALTER TABLE `t_visitor`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=339;

--
-- AUTO_INCREMENT for table `t_wallet`
--
ALTER TABLE `t_wallet`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `t_wallet_history`
--
ALTER TABLE `t_wallet_history`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `t_web_analytics`
--
ALTER TABLE `t_web_analytics`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `t_withdraw`
--
ALTER TABLE `t_withdraw`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
