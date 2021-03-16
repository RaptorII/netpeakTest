-- phpMyAdmin SQL Dump
-- version 5.0.4deb2
-- https://www.phpmyadmin.net/
--
-- Хост: localhost:3306
-- Час створення: Бер 16 2021 р., 16:32
-- Версія сервера: 10.5.9-MariaDB-1
-- Версія PHP: 7.4.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База даних: `testphp`
--

-- --------------------------------------------------------

--
-- Структура таблиці `product`
--

CREATE TABLE `product` (
  `id` int(11) NOT NULL,
  `product_name` varchar(255) DEFAULT NULL,
  `product_img` text DEFAULT NULL,
  `product_data` date DEFAULT NULL,
  `product_usr_add` varchar(255) DEFAULT NULL,
  `product_review` int(11) DEFAULT NULL,
  `product_midprice` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Дамп даних таблиці `product`
--

INSERT INTO `product` (`id`, `product_name`, `product_img`, `product_data`, `product_usr_add`, `product_review`, `product_midprice`) VALUES
(1, 'some product', './uploads/P6130230.JPG', '2021-03-15', '3', 8, '234'),
(2, 'next product', './uploads/P6130230.JPG', '2021-03-15', '2', 2, '100'),
(3, 'qwe', NULL, '2021-03-15', '1', NULL, '345'),
(4, 'qwe', './uploads/P6130230.JPG', '2021-03-15', '2', NULL, '12312'),
(5, 'best product', './uploads/Debian-Desktop-Wallpaper-HD.jpg', '2021-03-15', '3', 1, '12312'),
(6, 'гигиги', NULL, '2021-03-15', '1', NULL, '123'),
(7, 'product', '', '2021-03-15', '1', NULL, '45'),
(8, 'qwe', '', '2021-03-15', '3', 2, '234'),
(9, 'best product 3', './uploads/0-04-0a-9309c8d5bd6c6c6fc8d3e96884269d25404fcff0c87b9d9de3acae940881dc58_2061e13b77e221.png', '2021-03-16', '6', 2, '123'),
(10, 'Product', './uploads/0-02-0a-64c515571d123904d636ff2aa9f51fc510af031a0980f864f8780ac9a2ed8ffb_1f8d210629d342.jpg', '2021-03-16', '4', 1, '345'),
(11, '123', './uploads/Debian-Desktop-Wallpaper-HD.jpg', '2021-03-16', '3', NULL, '');

-- --------------------------------------------------------

--
-- Структура таблиці `reviews`
--

CREATE TABLE `reviews` (
  `id` int(11) NOT NULL,
  `rev_usr_name` varchar(255) NOT NULL,
  `rev_estimate` int(11) DEFAULT NULL,
  `rev_comment` text DEFAULT NULL,
  `rev_date` date NOT NULL,
  `product_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Дамп даних таблиці `reviews`
--

INSERT INTO `reviews` (`id`, `rev_usr_name`, `rev_estimate`, `rev_comment`, `rev_date`, `product_id`) VALUES
(1, 'user', 3, 'some long commet about some product', '2021-03-16', 1),
(2, 'user', 4, 'some long commet about some product', '2021-03-16', 2),
(3, 'user', 6, 'some long commet about some product', '2021-03-16', 3),
(4, 'user2', 10, 'some long commet about some product 13 123', '2021-03-16', 9),
(5, 'user65', 6, 'commet about some product', '2021-03-16', 7),
(6, 'user65', 8, 'commet about some product', '2021-03-16', 7),
(7, 'user65', 8, 'commet about some product', '2021-03-16', 7),
(8, 'user65', 8, 'commet about some product', '2021-03-16', 7),
(9, 'user65', 8, 'commet about some product', '2021-03-16', 7),
(10, 'user65', 8, 'commet about some product', '2021-03-16', 7),
(11, 'user65', 6, 'commet about some product', '2021-03-16', 7),
(12, 'user65', 1, 'commet about some product', '2021-03-16', 7),
(13, 'user65', 1, 'commet about some product', '2021-03-16', 7),
(14, 'user65', 1, 'commet about some product', '2021-03-16', 7),
(15, 'user65', 1, 'commet about some product', '2021-03-16', 7),
(16, 'user65', 1, 'commet about some product', '2021-03-16', 7),
(17, 'user65', 1, 'commet about some product', '2021-03-16', 7),
(18, 'user65', 1, 'commet about some product', '2021-03-16', 7),
(19, 'user65', 1, 'commet about some product', '2021-03-16', 7),
(20, 'user65', 1, 'commet about some product', '2021-03-16', 7),
(21, 'user65', 4, 'commet about some product', '2021-03-16', 8),
(22, 'user65', 4, 'commet about some product', '2021-03-16', 8),
(23, 'user', 3, 'some long commet about some product 13 13131 fa asf as fa sfs ', '2021-03-16', 9),
(24, '12312312', 10, 'some long commet about some product 13 123', '2021-03-16', 5),
(25, 'user', 5, 'some long commet about some product', '2021-03-16', 10),
(26, 'Man', 9, 'like', '2021-03-16', 2);

-- --------------------------------------------------------

--
-- Структура таблиці `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `user_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Дамп даних таблиці `users`
--

INSERT INTO `users` (`id`, `user_name`) VALUES
(1, 'Vasya'),
(2, 'Petro'),
(3, 'Admin'),
(4, 'Ninja'),
(6, 'Innokentiy');

--
-- Індекси збережених таблиць
--

--
-- Індекси таблиці `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`);

--
-- Індекси таблиці `reviews`
--
ALTER TABLE `reviews`
  ADD PRIMARY KEY (`id`);

--
-- Індекси таблиці `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для збережених таблиць
--

--
-- AUTO_INCREMENT для таблиці `product`
--
ALTER TABLE `product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT для таблиці `reviews`
--
ALTER TABLE `reviews`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT для таблиці `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
