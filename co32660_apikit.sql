-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- Хост: localhost
-- Время создания: Июн 29 2022 г., 20:46
-- Версия сервера: 5.7.35-38
-- Версия PHP: 7.4.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `co32660_apikit`
--

-- --------------------------------------------------------

--
-- Структура таблицы `price`
--

CREATE TABLE IF NOT EXISTS `price` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `prod_id` int(11) NOT NULL,
  `price_value` varchar(255) NOT NULL,
  `region_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=82 DEFAULT CHARSET=utf8mb4;

--
-- Дамп данных таблицы `price`
--

INSERT INTO `price` (`id`, `prod_id`, `price_value`, `region_id`) VALUES
(1, 1, '1;2;3', 1),
(3, 1, '10003333;12003333;110033333', 3),
(5, 1, '100055555;120055555;110055555', 5),
(7, 1, '10007777;12007777;11007777', 7),
(9, 2, '11:12;13', 1),
(10, 2, '15;19;20', 3),
(11, 2, '20005;22005;21005', 5),
(12, 2, '20007;22007;21007', 7),
(13, 5, '100000;12001000;1100100', 1),
(14, 5, '1000300;1200300;1100300', 3),
(15, 5, '10005;12005;11005', 5),
(16, 5, '10007;12007;11007', 7),
(17, 6, '100;200;300', 1),
(18, 6, '20003;22003;21003', 3),
(19, 6, '20005;22005;21005', 5),
(20, 6, '20007;22007;21007', 7),
(41, 10, '20001;22001;21001', 1),
(42, 10, '20002;22002;21002', 2),
(43, 10, '20003;22003;21003', 3),
(44, 10, '20004;22004;21004', 4),
(45, 10, '20005;22005;21005', 5),
(46, 10, '20006;22006;21006', 6),
(47, 10, '20007;22007;21007', 7),
(48, 10, '20008;22008;21008', 8),
(49, 10, '20009;22009;21009', 9),
(50, 10, '20010;22010;21010', 10),
(51, 10, '20011;22011;21011', 11),
(52, 10, '20012;22012;21012', 12),
(53, 10, '20013;22013;21013', 13),
(54, 10, '20014;22014;21014', 14),
(55, 10, '20015;22015;21015', 15),
(56, 10, '20016;22016;21016', 16),
(57, 10, '20017;22017;21017', 17),
(58, 10, '20018;22018;21018', 18),
(59, 10, '20019;22019;21019', 19),
(60, 10, '20020;22020;21020', 20),
(61, 6, '100022222;12002222;110022222', 2),
(62, 11, '20001;22001;21001', 1),
(63, 11, '20002;22002;21002', 2),
(64, 11, '20003;22003;21003', 3),
(65, 11, '20004;22004;21004', 4),
(66, 11, '20005;22005;21005', 5),
(67, 11, '20006;22006;21006', 6),
(68, 11, '20007;22007;21007', 7),
(69, 11, '20008;22008;21008', 8),
(70, 11, '20009;22009;21009', 9),
(71, 11, '20010;22010;21010', 10),
(72, 11, '20011;22011;21011', 11),
(73, 11, '20012;22012;21012', 12),
(74, 11, '20013;22013;21013', 13),
(75, 11, '20014;22014;21014', 14),
(76, 11, '20015;22015;21015', 15),
(77, 11, '20016;22016;21016', 16),
(78, 11, '20017;22017;21017', 17),
(79, 11, '20018;22018;21018', 18),
(80, 11, '20019;22019;21019', 19),
(81, 11, '20020;22020;21020', 20);

-- --------------------------------------------------------

--
-- Структура таблицы `product`
--

CREATE TABLE IF NOT EXISTS `product` (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `description` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4;

--
-- Дамп данных таблицы `product`
--

INSERT INTO `product` (`id`, `name`, `description`) VALUES
(1, 'tovar_1', 'omnis iste natus error sit voluptatem'),
(2, 'tovar_2', 'Quis autem vel eum iure reprehenderit'),
(5, 'tovar_3', 'Sed ut perspiciatis'),
(6, 'tovar_4', 'quia dolor sit amet consectetur adipisci[ng] v'),
(10, 'api_product', 'qwerty u i op asdfghj kl z xccvbnm'),
(11, 'api_product20', 'qwerty u i op asdfghj kl z xccvbnm');

-- --------------------------------------------------------

--
-- Структура таблицы `region`
--

CREATE TABLE IF NOT EXISTS `region` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `region_name` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4;

--
-- Дамп данных таблицы `region`
--

INSERT INTO `region` (`id`, `region_name`) VALUES
(1, 'sverdlovsk'),
(3, 'moskow'),
(5, 'tymen'),
(7, 'perm');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
