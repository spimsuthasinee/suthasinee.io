SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

CREATE DATABASE IF NOT EXISTS `feedback` DEFAULT CHARACTER SET utf8 COLLATE utf8_bin;
USE `feedback`;

CREATE TABLE `customer_feedback` (
  `id` int(11) NOT NULL,
  `firstname` varchar(255) COLLATE utf8_bin NOT NULL,
  `lastname` varchar(255) COLLATE utf8_bin NOT NULL,
  `emailaddress` varchar(255) COLLATE utf8_bin NOT NULL,
  `phonenumber` varchar(10) COLLATE utf8_bin DEFAULT NULL,
  `comments` text COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

INSERT INTO `customer_feedback` (`id`, `firstname`, `lastname`, `emailaddress`, `phonenumber`, `comments`) VALUES
(1, 'Tanyarat', 'Tadchomuang', 'tanyarat.tcm@gmail.com', '', 'Please add more details in your products.'),
(2, 'Nopporn', 'Naichit', 'nopporn4924@gmail.com', '0884834924', 'Adding more products.');


ALTER TABLE `customer_feedback`
  ADD PRIMARY KEY (`id`);


ALTER TABLE `customer_feedback`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
