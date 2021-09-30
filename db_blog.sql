-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 07, 2021 at 10:24 PM
-- Server version: 10.1.35-MariaDB
-- PHP Version: 7.2.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_blog`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_category`
--

CREATE TABLE `tbl_category` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_category`
--

INSERT INTO `tbl_category` (`id`, `name`) VALUES
(1, 'java'),
(2, 'php'),
(3, 'html'),
(4, 'css'),
(5, 'test Cat'),
(8, 'Health'),
(9, 'Sports');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_contact`
--

CREATE TABLE `tbl_contact` (
  `id` int(11) NOT NULL,
  `firstname` varchar(255) DEFAULT NULL,
  `lastname` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `body` text,
  `status` int(11) DEFAULT '0',
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_contact`
--

INSERT INTO `tbl_contact` (`id`, `firstname`, `lastname`, `email`, `body`, `status`, `date`) VALUES
(3, 'Selim', 'Fakir', 'selim@gmail.com', '\r\nLorem ipsum dolor sit amet, vestibulum sit, odio vestibulum. A torquent, volutpat tortor class', 1, '2020-07-24 09:37:07'),
(4, 'Tusar', 'Akondo', 'tusar@gmail.com', 'Lorem ipsum dolor sit amet, vestibulum sit, odio vestibulum. A torquent, volutpat tortor class ', 1, '2020-07-24 09:45:54'),
(5, 'Turan', 'Akondo', 'turan@gmail.com', 'Lorem ipsum dolor sit amet, vestibulum sit, odio vestibulum. A torquent, volutpat tortor class ', 1, '2020-07-24 09:46:15'),
(6, 'Pappu', 'Akondo', 'pulsefornurses2000@gmail.com', '\r\nLorem ipsum dolor sit amet, vestibulum sit, odio vestibulum.', 0, '2020-07-24 16:12:13'),
(7, 'Pappu', 'Akondo', 'pulsefornurses2000@gmail.com', '\r\nLorem ipsum dolor sit amet, vestibulum sit, odio vestibulum.', 0, '2020-07-24 16:12:32');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_footer`
--

CREATE TABLE `tbl_footer` (
  `id` int(11) NOT NULL,
  `note` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_footer`
--

INSERT INTO `tbl_footer` (`id`, `note`) VALUES
(1, 'Copyright Training with live project');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_page`
--

CREATE TABLE `tbl_page` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `body` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_page`
--

INSERT INTO `tbl_page` (`id`, `name`, `body`) VALUES
(1, 'About Us', '<p align=\"justify\">About us Page. Lorem ipsum dolor sit amet, vestibulum sit, odio vestibulum. A torquent, volutpat tortor class dui pellentesque, quis eu nisl, magna euismod cursus magna, in semper. Suspendisse et feugiat non ante vulputate et, pretium integer sem amet, magna diam vestibulum ipsum torquent ultricies et, sem rutrum ut magna, sit ut consequat vestibulum porttitor. Pretium ligula orci quam faucibus aliquet in, erat donec integer nunc, mus ligula luctus ipsum platea, nihil lobortis feugiat commodo augue lacinia non, ipsum massa aliquet condimentum. Per hendrerit velit vel nisl, enim consectetuer imperdiet auctor ullamcorper mauris, mauris aspernatur ultricies nec, ultrices odio amet congue fusce amet arcu.</p>\r\n<p align=\"justify\">Semper ipsum, non duis. Eu ad venenatis lobortis sit. Incididunt nec velit in mollis, ut in pellentesque imperdiet congue. Mi et tortor dis ornare sed, magna sed, id neque, suscipit scelerisque metus et urna maecenas nulla, sit vel mollis imperdiet. Nunc vitae id nec condimentum turpis non.</p>\r\n<p align=\"justify\">Et accumsan egestas sem vestibulum nulla. Magna necessitatibus ipsum ac, habitasse magna neque per tempus primis, magna consectetuer vivamus vel est eros. Sed luctus eros adipiscing arcu pellentesque, luctus maecenas, mattis porta inceptos, vel eros sociosqu nam leo aliquam elit, adipiscing ornare. Ornare magna tortor sodales interdum nonummy est, justo faucibus. Mollitia habitant enim lacus arcu, leo sapien interdum viverra quisque vestibulum ante. Integer odio posuere per mi, odio aliquam mauris magna auctor in amet, id natoque curabitur est porta tellus, mauris mauris sit rerum blandit, etiam dolor lacus ipsum id quis nonummy.</p>'),
(2, 'Privacy', '<p align=\"justify\">Privacy policy.Lorem ipsum dolor sit amet, vestibulum sit, odio vestibulum. A torquent, volutpat tortor class dui pellentesque, quis eu nisl, magna euismod cursus magna, in semper. Suspendisse et feugiat non ante vulputate et, pretium integer sem amet, magna diam vestibulum ipsum torquent ultricies et, sem rutrum ut magna, sit ut consequat vestibulum porttitor. Pretium ligula orci quam faucibus aliquet in, erat donec integer nunc, mus ligula luctus ipsum platea, nihil lobortis feugiat commodo augue lacinia non, ipsum massa aliquet condimentum. Per hendrerit velit vel nisl, enim consectetuer imperdiet auctor ullamcorper mauris, mauris aspernatur ultricies nec, ultrices odio amet congue fusce amet arcu.</p>\r\n<p align=\"justify\">Semper ipsum, non duis. Eu ad venenatis lobortis sit. Incididunt nec velit in mollis, ut in pellentesque imperdiet congue. Mi et tortor dis ornare sed, magna sed, id neque, suscipit scelerisque metus et urna maecenas nulla, sit vel mollis imperdiet. Nunc vitae id nec condimentum turpis non.</p>\r\n<p align=\"justify\">Et accumsan egestas sem vestibulum nulla. Magna necessitatibus ipsum ac, habitasse magna neque per tempus primis, magna consectetuer vivamus vel est eros. Sed luctus eros adipiscing arcu pellentesque, luctus maecenas, mattis porta inceptos, vel eros sociosqu nam leo aliquam elit, adipiscing ornare. Ornare magna tortor sodales interdum nonummy est, justo faucibus. Mollitia habitant enim lacus arcu, leo sapien interdum viverra quisque vestibulum ante. Integer odio posuere per mi, odio aliquam mauris magna auctor in amet, id natoque curabitur est porta tellus, mauris mauris sit rerum blandit, etiam dolor lacus ipsum id quis nonummy.</p>'),
(3, 'DMCA', '<p>DMCA.&nbsp;</p>\r\n<p align=\"justify\">Lorem ipsum dolor sit amet, vestibulum sit, odio vestibulum. A torquent, volutpat tortor class dui pellentesque, quis eu nisl, magna euismod cursus magna, in semper. Suspendisse et feugiat non ante vulputate et, pretium integer sem amet, magna diam vestibulum ipsum torquent ultricies et, sem rutrum ut magna, sit ut consequat vestibulum porttitor. Pretium ligula orci quam faucibus aliquet in, erat donec integer nunc, mus ligula luctus ipsum platea, nihil lobortis feugiat commodo augue lacinia non, ipsum massa aliquet condimentum. Per hendrerit velit vel nisl, enim consectetuer imperdiet auctor ullamcorper mauris, mauris aspernatur ultricies nec, ultrices odio amet congue fusce amet arcu.</p>\r\n<p align=\"justify\">Semper ipsum, non duis. Eu ad venenatis lobortis sit. Incididunt nec velit in mollis, ut in pellentesque imperdiet congue. Mi et tortor dis ornare sed, magna sed, id neque, suscipit scelerisque metus et urna maecenas nulla, sit vel mollis imperdiet. Nunc vitae id nec condimentum turpis non.</p>\r\n<p align=\"justify\">Et accumsan egestas sem vestibulum nulla. Magna necessitatibus ipsum ac, habitasse magna neque per tempus primis, magna consectetuer vivamus vel est eros. Sed luctus eros adipiscing arcu pellentesque, luctus maecenas, mattis porta inceptos, vel eros sociosqu nam leo aliquam elit, adipiscing ornare. Ornare magna tortor sodales interdum nonummy est, justo faucibus. Mollitia habitant enim lacus arcu, leo sapien interdum viverra quisque vestibulum ante. Integer odio posuere per mi, odio aliquam mauris magna auctor in amet, id natoque curabitur est porta tellus, mauris mauris sit rerum blandit, etiam dolor lacus ipsum id quis nonummy.</p>');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_post`
--

CREATE TABLE `tbl_post` (
  `id` int(11) NOT NULL,
  `cat` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `body` text NOT NULL,
  `image` varchar(255) NOT NULL,
  `author` varchar(255) NOT NULL,
  `tags` varchar(255) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `userid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_post`
--

INSERT INTO `tbl_post` (`id`, `cat`, `title`, `body`, `image`, `author`, `tags`, `date`, `userid`) VALUES
(10, 2, 'PHP related posts will go here', '<p align=\"justify\">Lorem ipsum dolor sit amet, vestibulum sit, odio vestibulum. A torquent, volutpat tortor class dui pellentesque, quis eu nisl, magna euismod cursus magna, in semper. Suspendisse et feugiat non ante vulputate et, pretium integer sem amet, magna diam vestibulum ipsum torquent ultricies et, sem rutrum ut magna, sit ut consequat vestibulum porttitor. Pretium ligula orci quam faucibus aliquet in, erat donec integer nunc, mus ligula luctus ipsum platea, nihil lobortis feugiat commodo augue lacinia non, ipsum massa aliquet condimentum. Per hendrerit velit vel nisl, enim consectetuer imperdiet auctor ullamcorper mauris, mauris aspernatur ultricies nec, ultrices odio amet congue fusce amet arcu.</p>\r\n<p align=\"justify\">Semper ipsum, non duis. Eu ad venenatis lobortis sit. Incididunt nec velit in mollis, ut in pellentesque imperdiet congue. Mi et tortor dis ornare sed, magna sed, id neque, suscipit scelerisque metus et urna maecenas nulla, sit vel mollis imperdiet. Nunc vitae id nec condimentum turpis non.</p>\r\n<p align=\"justify\">Et accumsan egestas sem vestibulum nulla. Magna necessitatibus ipsum ac, habitasse magna neque per tempus primis, magna consectetuer vivamus vel est eros. Sed luctus eros adipiscing arcu pellentesque, luctus maecenas, mattis porta inceptos, vel eros sociosqu nam leo aliquam elit, adipiscing ornare. Ornare magna tortor sodales interdum nonummy est, justo faucibus. Mollitia habitant enim lacus arcu, leo sapien interdum viverra quisque vestibulum ante. Integer odio posuere per mi, odio aliquam mauris magna auctor in amet, id natoque curabitur est porta tellus, mauris mauris sit rerum blandit, etiam dolor lacus ipsum id quis nonummy.</p>', 'Upload/6c1ebb30ac.jpg', 'Kanchon Siddique', 'php, programming', '2020-07-12 04:09:19', 0),
(11, 3, 'This page is dedicated for html post', '<p align=\"justify\">Lorem ipsum dolor sit amet, vestibulum sit, odio vestibulum. A torquent, volutpat tortor class dui pellentesque, quis eu nisl, magna euismod cursus magna, in semper. Suspendisse et feugiat non ante vulputate et, pretium integer sem amet, magna diam vestibulum ipsum torquent ultricies et, sem rutrum ut magna, sit ut consequat vestibulum porttitor. Pretium ligula orci quam faucibus aliquet in, erat donec integer nunc, mus ligula luctus ipsum platea, nihil lobortis feugiat commodo augue lacinia non, ipsum massa aliquet condimentum. Per hendrerit velit vel nisl, enim consectetuer imperdiet auctor ullamcorper mauris, mauris aspernatur ultricies nec, ultrices odio amet congue fusce amet arcu.</p>\r\n<p align=\"justify\">Semper ipsum, non duis. Eu ad venenatis lobortis sit. Incididunt nec velit in mollis, ut in pellentesque imperdiet congue. Mi et tortor dis ornare sed, magna sed, id neque, suscipit scelerisque metus et urna maecenas nulla, sit vel mollis imperdiet. Nunc vitae id nec condimentum turpis non.</p>\r\n<p align=\"justify\">Et accumsan egestas sem vestibulum nulla. Magna necessitatibus ipsum ac, habitasse magna neque per tempus primis, magna consectetuer vivamus vel est eros. Sed luctus eros adipiscing arcu pellentesque, luctus maecenas, mattis porta inceptos, vel eros sociosqu nam leo aliquam elit, adipiscing ornare. Ornare magna tortor sodales interdum nonummy est, justo faucibus. Mollitia habitant enim lacus arcu, leo sapien interdum viverra quisque vestibulum ante. Integer odio posuere per mi, odio aliquam mauris magna auctor in amet, id natoque curabitur est porta tellus, mauris mauris sit rerum blandit, etiam dolor lacus ipsum id quis nonummy.</p>', 'Upload/245da91ec0.jpg', 'Kanchon Siddique', 'html', '2020-07-12 04:11:59', 1),
(12, 4, 'Css related posts will go here', '<p align=\"justify\">Lorem ipsum dolor sit amet, vestibulum sit, odio vestibulum. A torquent, volutpat tortor class dui pellentesque, quis eu nisl, magna euismod cursus magna, in semper. Suspendisse et feugiat non ante vulputate et, pretium integer sem amet, magna diam vestibulum ipsum torquent ultricies et, sem rutrum ut magna, sit ut consequat vestibulum porttitor. Pretium ligula orci quam faucibus aliquet in, erat donec integer nunc, mus ligula luctus ipsum platea, nihil lobortis feugiat commodo augue lacinia non, ipsum massa aliquet condimentum. Per hendrerit velit vel nisl, enim consectetuer imperdiet auctor ullamcorper mauris, mauris aspernatur ultricies nec, ultrices odio amet congue fusce amet arcu.</p>\r\n<p align=\"justify\">Semper ipsum, non duis. Eu ad venenatis lobortis sit. Incididunt nec velit in mollis, ut in pellentesque imperdiet congue. Mi et tortor dis ornare sed, magna sed, id neque, suscipit scelerisque metus et urna maecenas nulla, sit vel mollis imperdiet. Nunc vitae id nec condimentum turpis non.</p>\r\n<p align=\"justify\">Et accumsan egestas sem vestibulum nulla. Magna necessitatibus ipsum ac, habitasse magna neque per tempus primis, magna consectetuer vivamus vel est eros. Sed luctus eros adipiscing arcu pellentesque, luctus maecenas, mattis porta inceptos, vel eros sociosqu nam leo aliquam elit, adipiscing ornare. Ornare magna tortor sodales interdum nonummy est, justo faucibus. Mollitia habitant enim lacus arcu, leo sapien interdum viverra quisque vestibulum ante. Integer odio posuere per mi, odio aliquam mauris magna auctor in amet, id natoque curabitur est porta tellus, mauris mauris sit rerum blandit, etiam dolor lacus ipsum id quis nonummy.</p>', 'Upload/b6149df3c8.jpg', 'Saddam Mondol', 'css', '2020-07-12 04:13:20', 3),
(14, 8, 'Health related posts go here', '<p align=\"justify\">Lorem ipsum dolor sit amet, vestibulum sit, odio vestibulum. A torquent, volutpat tortor class dui pellentesque, quis eu nisl, magna euismod cursus magna, in semper. Suspendisse et feugiat non ante vulputate et, pretium integer sem amet, magna diam vestibulum ipsum torquent ultricies et, sem rutrum ut magna, sit ut consequat vestibulum porttitor. Pretium ligula orci quam faucibus aliquet in, erat donec integer nunc, mus ligula luctus ipsum platea, nihil lobortis feugiat commodo augue lacinia non, ipsum massa aliquet condimentum. Per hendrerit velit vel nisl, enim consectetuer imperdiet auctor ullamcorper mauris, mauris aspernatur ultricies nec, ultrices odio amet congue fusce amet arcu.</p>\r\n<p align=\"justify\">Semper ipsum, non duis. Eu ad venenatis lobortis sit. Incididunt nec velit in mollis, ut in pellentesque imperdiet congue. Mi et tortor dis ornare sed, magna sed, id neque, suscipit scelerisque metus et urna maecenas nulla, sit vel mollis imperdiet. Nunc vitae id nec condimentum turpis non.</p>\r\n<p align=\"justify\">Et accumsan egestas sem vestibulum nulla. Magna necessitatibus ipsum ac, habitasse magna neque per tempus primis, magna consectetuer vivamus vel est eros. Sed luctus eros adipiscing arcu pellentesque, luctus maecenas, mattis porta inceptos, vel eros sociosqu nam leo aliquam elit, adipiscing ornare. Ornare magna tortor sodales interdum nonummy est, justo faucibus. Mollitia habitant enim lacus arcu, leo sapien interdum viverra quisque vestibulum ante. Integer odio posuere per mi, odio aliquam mauris magna auctor in amet, id natoque curabitur est porta tellus, mauris mauris sit rerum blandit, etiam dolor lacus ipsum id quis nonummy.</p>', 'Upload/03452c0d36.jpg', 'Nazmul Huda', 'health, hospital', '2020-07-12 04:16:40', 0),
(15, 9, 'Sports related posts go here', '<p align=\"justify\">Lorem ipsum dolor sit amet, vestibulum sit, odio vestibulum. A torquent, volutpat tortor class dui pellentesque, quis eu nisl, magna euismod cursus magna, in semper. Suspendisse et feugiat non ante vulputate et, pretium integer sem amet, magna diam vestibulum ipsum torquent ultricies et, sem rutrum ut magna, sit ut consequat vestibulum porttitor. Pretium ligula orci quam faucibus aliquet in, erat donec integer nunc, mus ligula luctus ipsum platea, nihil lobortis feugiat commodo augue lacinia non, ipsum massa aliquet condimentum. Per hendrerit velit vel nisl, enim consectetuer imperdiet auctor ullamcorper mauris, mauris aspernatur ultricies nec, ultrices odio amet congue fusce amet arcu.</p>\r\n<p align=\"justify\">Semper ipsum, non duis. Eu ad venenatis lobortis sit. Incididunt nec velit in mollis, ut in pellentesque imperdiet congue. Mi et tortor dis ornare sed, magna sed, id neque, suscipit scelerisque metus et urna maecenas nulla, sit vel mollis imperdiet. Nunc vitae id nec condimentum turpis non cricket.</p>\r\n<p align=\"justify\">Et accumsan egestas sem vestibulum nulla. Magna necessitatibus ipsum ac, habitasse magna neque per tempus primis, magna consectetuer vivamus vel est eros. Sed luctus eros adipiscing arcu pellentesque, luctus maecenas, mattis porta inceptos, vel eros sociosqu nam leo aliquam elit, adipiscing ornare. Ornare magna tortor sodales interdum nonummy est, justo faucibus. Mollitia habitant enim lacus arcu, leo sapien interdum viverra quisque vestibulum ante. Integer odio posuere per mi, odio aliquam mauris magna auctor in amet, id natoque curabitur est porta tellus, mauris mauris sit rerum blandit, etiam dolor lacus ipsum id quis nonummy.</p>', 'Upload/b717bcc9d0.jpg', 'Kolom Mondol', 'cricket, sports', '2020-07-12 04:17:46', 2),
(16, 2, 'PHP related posts will go here', '<p align=\"justify\">Lorem ipsum dolor sit amet, vestibulum sit, odio vestibulum. A torquent, volutpat tortor class dui pellentesque, quis eu nisl, magna euismod cursus magna, in semper. Suspendisse et feugiat non ante vulputate et, pretium integer sem amet, magna diam vestibulum ipsum torquent ultricies et, sem rutrum ut magna, sit ut consequat vestibulum porttitor. Pretium ligula orci quam faucibus aliquet in, erat donec integer nunc, mus ligula luctus ipsum platea, nihil lobortis feugiat commodo augue lacinia non, ipsum massa aliquet condimentum. Per hendrerit velit vel nisl, enim consectetuer imperdiet auctor ullamcorper mauris, mauris aspernatur ultricies nec, ultrices odio amet congue fusce amet arcu.</p>\r\n<p align=\"justify\">Semper ipsum, non duis. Eu ad venenatis lobortis sit. Incididunt nec velit in mollis, ut in pellentesque imperdiet congue. Mi et tortor dis ornare sed, magna sed, id neque, suscipit scelerisque metus et urna maecenas nulla, sit vel mollis imperdiet. Nunc vitae id nec condimentum turpis non.</p>\r\n<p align=\"justify\">Et accumsan egestas sem vestibulum nulla. Magna necessitatibus ipsum ac, habitasse magna neque per tempus primis, magna consectetuer vivamus vel est eros. Sed luctus eros adipiscing arcu pellentesque, luctus maecenas, mattis porta inceptos, vel eros sociosqu nam leo aliquam elit, adipiscing ornare. Ornare magna tortor sodales interdum nonummy est, justo faucibus. Mollitia habitant enim lacus arcu, leo sapien interdum viverra quisque vestibulum ante. Integer odio posuere per mi, odio aliquam mauris magna auctor in amet, id natoque curabitur est porta tellus, mauris mauris sit rerum blandit, etiam dolor lacus ipsum id quis nonummy.</p>', 'Upload/64b7a1e31a.jpg', 'Pappu Akondo', 'php, programming', '2020-07-12 04:20:49', 0),
(17, 4, 'PHP related posts will go here', '<p align=\"justify\">Lorem ipsum dolor sit amet, vestibulum sit, odio vestibulum. A torquent, volutpat tortor class dui pellentesque, quis eu nisl, magna euismod cursus magna, in semper. Suspendisse et feugiat non ante vulputate et, pretium integer sem amet, magna diam vestibulum ipsum torquent ultricies et, sem rutrum ut magna, sit ut consequat vestibulum porttitor. Pretium ligula orci quam faucibus aliquet in, erat donec integer nunc, mus ligula luctus ipsum platea, nihil lobortis feugiat commodo augue lacinia non, ipsum massa aliquet condimentum. Per hendrerit velit vel nisl, enim consectetuer imperdiet auctor ullamcorper mauris, mauris aspernatur ultricies nec, ultrices odio amet congue fusce amet arcu.</p>\r\n<p align=\"justify\">Semper ipsum, non duis. Eu ad venenatis lobortis sit. Incididunt nec velit in mollis, ut in pellentesque imperdiet congue. Mi et tortor dis ornare sed, magna sed, id neque, suscipit scelerisque metus et urna maecenas nulla, sit vel mollis imperdiet. Nunc vitae id nec condimentum turpis non.</p>\r\n<p align=\"justify\">Et accumsan egestas sem vestibulum nulla. Magna necessitatibus ipsum ac, habitasse magna neque per tempus primis, magna consectetuer vivamus vel est eros. Sed luctus eros adipiscing arcu pellentesque, luctus maecenas, mattis porta inceptos, vel eros sociosqu nam leo aliquam elit, adipiscing ornare. Ornare magna tortor sodales interdum nonummy est, justo faucibus. Mollitia habitant enim lacus arcu, leo sapien interdum viverra quisque vestibulum ante. Integer odio posuere per mi, odio aliquam mauris magna auctor in amet, id natoque curabitur est porta tellus, mauris mauris sit rerum blandit, etiam dolor lacus ipsum id quis nonummy.</p>', 'Upload/d76699d247.jpg', 'Rahul', 'php, programming', '2020-07-12 04:29:35', 2),
(18, 1, 'Java related posts', '<p align=\"justify\">Lorem ipsum dolor sit amet, vestibulum sit, odio vestibulum. A torquent, volutpat tortor class dui pellentesque, quis eu nisl, magna euismod cursus magna, in semper. Suspendisse et feugiat non ante vulputate et, pretium integer sem amet, magna diam vestibulum ipsum torquent ultricies et, sem rutrum ut magna, sit ut consequat vestibulum porttitor. Pretium ligula orci quam faucibus aliquet in, erat donec integer nunc, mus ligula luctus ipsum platea, nihil lobortis feugiat commodo augue lacinia non, ipsum massa aliquet condimentum. Per hendrerit velit vel nisl, enim consectetuer imperdiet auctor ullamcorper mauris, mauris aspernatur ultricies nec, ultrices odio amet congue fusce amet arcu.</p>\r\n<p align=\"justify\">Semper ipsum, non duis. Eu ad venenatis lobortis sit. Incididunt nec velit in mollis, ut in pellentesque imperdiet congue. Mi et tortor dis ornare sed, magna sed, id neque, suscipit scelerisque metus et urna maecenas nulla, sit vel mollis imperdiet. Nunc vitae id nec condimentum turpis non.</p>\r\n<p align=\"justify\">Et accumsan egestas sem vestibulum nulla. Magna necessitatibus ipsum ac, habitasse magna neque per tempus primis, magna consectetuer vivamus vel est eros. Sed luctus eros adipiscing arcu pellentesque, luctus maecenas, mattis porta inceptos, vel eros sociosqu nam leo aliquam elit, adipiscing ornare. Ornare magna tortor sodales interdum nonummy est, justo faucibus. Mollitia habitant enim lacus arcu, leo sapien interdum viverra quisque vestibulum ante. Integer odio posuere per mi, odio aliquam mauris magna auctor in amet, id natoque curabitur est porta tellus, mauris mauris sit rerum blandit, etiam dolor lacus ipsum id quis nonummy.</p>', 'Upload/96a6e4b4d4.jpg', 'mainul', 'java, programming', '2020-07-12 04:30:32', 1),
(20, 1, 'html related posts will go here ff', '<p align=\"justify\">Lorem ipsum dolor sit amet, vestibulum sit, odio vestibulum. A torquent, volutpat tortor class dui pellentesque, quis eu nisl, magna euismod cursus magna, in semper. Suspendisse et feugiat non ante vulputate et, pretium integer sem amet, magna diam vestibulum ipsum torquent ultricies et, sem rutrum ut magna, sit ut consequat vestibulum porttitor. Pretium ligula orci quam faucibus aliquet in, erat donec integer nunc, mus ligula luctus ipsum platea, nihil lobortis feugiat commodo augue lacinia non, ipsum massa aliquet condimentum. Per hendrerit velit vel nisl, enim consectetuer imperdiet auctor ullamcorper mauris, mauris aspernatur ultricies nec, ultrices odio amet congue fusce amet arcu.</p>\r\n<p align=\"justify\">Semper ipsum, non duis. Eu ad venenatis lobortis sit. Incididunt nec velit in mollis, ut in pellentesque imperdiet congue. Mi et tortor dis ornare sed, magna sed, id neque, suscipit scelerisque metus et urna maecenas nulla, sit vel mollis imperdiet. Nunc vitae id nec condimentum turpis non.</p>\r\n<p align=\"justify\">Et accumsan egestas sem vestibulum nulla. Magna necessitatibus ipsum ac, habitasse magna neque per tempus primis, magna consectetuer vivamus vel est eros. Sed luctus eros adipiscing arcu pellentesque, luctus maecenas, mattis porta inceptos, vel eros sociosqu nam leo aliquam elit, adipiscing ornare. Ornare magna tortor sodales interdum nonummy est, justo faucibus. Mollitia habitant enim lacus arcu, leo sapien interdum viverra quisque vestibulum ante. Integer odio posuere per mi, odio aliquam mauris magna auctor in amet, id natoque curabitur est porta tellus, mauris mauris sit rerum blandit, etiam dolor lacus ipsum id quis nonummy.</p>', 'Upload/aa98c94349.jpg', 'Billal', 'html', '2020-07-12 04:32:21', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_social`
--

CREATE TABLE `tbl_social` (
  `id` int(11) NOT NULL,
  `fb` varchar(255) DEFAULT NULL,
  `tw` varchar(255) DEFAULT NULL,
  `ln` varchar(255) DEFAULT NULL,
  `gp` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_social`
--

INSERT INTO `tbl_social` (`id`, `fb`, `tw`, `ln`, `gp`) VALUES
(1, 'https://facebook.com/live', 'https://twitter.com/live', 'https://linkedin.com/live', 'https://google.com/live');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user`
--

CREATE TABLE `tbl_user` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(255) DEFAULT NULL,
  `details` text,
  `role` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_user`
--

INSERT INTO `tbl_user` (`id`, `name`, `username`, `password`, `email`, `details`, `role`) VALUES
(1, 'Pappu Akondo', 'admin', '202cb962ac59075b964b07152d234b70', 'pappu@gmail.com', '<p><span>Hi during the installation of GLPI (windows) i have an&nbsp;</span><span>error</span><span>.&nbsp;<span>Hi during the installation of GLPI (windows) i have an&nbsp;</span><span>error</span><span>.</span></span></p>', 0),
(2, 'Kanchon Siddique', 'author', '202cb962ac59075b964b07152d234b70', 'kanchon@gmail.com', '<p><span>Hi during the installation of GLPI (windows) i have an&nbsp;</span><span>error</span><span>.</span></p>', 1),
(4, '', 'New User', '202cb962ac59075b964b07152d234b70', 'newuser@gmail.com', NULL, 2);

-- --------------------------------------------------------

--
-- Table structure for table `title_slogan`
--

CREATE TABLE `title_slogan` (
  `id` int(11) NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `slogan` varchar(255) DEFAULT NULL,
  `logo` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `title_slogan`
--

INSERT INTO `title_slogan` (`id`, `title`, `slogan`, `logo`) VALUES
(1, 'Our  site title', 'Our site  Slogan', 'Upload/logo.png');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_category`
--
ALTER TABLE `tbl_category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_contact`
--
ALTER TABLE `tbl_contact`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_footer`
--
ALTER TABLE `tbl_footer`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_page`
--
ALTER TABLE `tbl_page`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_post`
--
ALTER TABLE `tbl_post`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_social`
--
ALTER TABLE `tbl_social`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_user`
--
ALTER TABLE `tbl_user`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `title_slogan`
--
ALTER TABLE `title_slogan`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_category`
--
ALTER TABLE `tbl_category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `tbl_contact`
--
ALTER TABLE `tbl_contact`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tbl_footer`
--
ALTER TABLE `tbl_footer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_page`
--
ALTER TABLE `tbl_page`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbl_post`
--
ALTER TABLE `tbl_post`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `tbl_social`
--
ALTER TABLE `tbl_social`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_user`
--
ALTER TABLE `tbl_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `title_slogan`
--
ALTER TABLE `title_slogan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
