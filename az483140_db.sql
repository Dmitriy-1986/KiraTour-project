-- phpMyAdmin SQL Dump
-- version 5.1.4
-- https://www.phpmyadmin.net/
--
-- Хост: az483140.mysql.ukraine.com.ua
-- Время создания: Янв 25 2023 г., 11:42
-- Версия сервера: 5.7.33-36-log
-- Версия PHP: 7.4.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `az483140_db`
--

-- --------------------------------------------------------

--
-- Структура таблицы `company_card_title`
--

CREATE TABLE `company_card_title` (
  `id` int(11) NOT NULL,
  `card_title` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Дамп данных таблицы `company_card_title`
--

INSERT INTO `company_card_title` (`id`, `card_title`) VALUES
(1, '<h2> Популярные направления </h2>');

-- --------------------------------------------------------

--
-- Структура таблицы `company_description`
--

CREATE TABLE `company_description` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` text CHARACTER SET utf8 NOT NULL,
  `blockquote` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Дамп данных таблицы `company_description`
--

INSERT INTO `company_description` (`id`, `title`, `description`, `blockquote`) VALUES
(1, '<h2>Украина - Германия, перевозки пассажиров и посылок<h2>', '<p>   \r\n<b>Выезд из Украины / прибытие в Украину : </b>Киев, Житомир, Ровно, Львов, Луцк. \r\n\r\n<b>Через Польшу:</b> Люблин, Варшава, Лодзь, Познань.\r\n \r\n<b>Прибытие в Германию / выезд из Германии :</b> Берлин, Магдебург, Ганновер, Билефельд, Оснабрюк, Мюнстер, Дортмунд, Эссен, Дойсбург, Дюссельдорф, Кельн, Бонн, Колбенц, Майнц, Франкфурт-на-Майне, Кассель, Лайпциг, Дрезден и все города по дороге (уточняйте).\r\nКомфортабельная доставка пассажиров и посылок по адресу в Германии.\r\n</p>\r\n<p>\r\n<b>Перевозка посылок:</b> генераторы, старлинки, аккумуляторы, колеса, велосипеды, мотоциклы, стиральные машинки, холодильники, печки, мебель и другие грузы.\r\n</p>\r\n<p>\r\nМеленькие, средние и большие посылки. \r\n<b>Перевозка животных:</b> котов и собак с хозяевами и без по-договорённости.\r\n</p>\r\n<p>\r\nПрием и отправка посылок с Германии / в Германию по всей \r\nУкраине по Новой почте. \r\n</p>\r\n<p>\r\n<b>Микроавтобус 7 мест комфорт:</b> откидные сидения, розетки и телевизор. Привезем прямо к вашему дому!\r\n</p>\r\n', '<p>\r\n Для бронирования заполняйте форму обратной связи или пишите /звоните Viber/Telegram/WhatsApp +380995697772 и +380965697772\r\n</p>');

-- --------------------------------------------------------

--
-- Структура таблицы `company_directions`
--

CREATE TABLE `company_directions` (
  `id` int(11) NOT NULL,
  `img_direction` varchar(255) CHARACTER SET utf8 NOT NULL,
  `from_where` varchar(255) CHARACTER SET utf8 NOT NULL,
  `where_destination` varchar(255) CHARACTER SET utf8 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Дамп данных таблицы `company_directions`
--

INSERT INTO `company_directions` (`id`, `img_direction`, `from_where`, `where_destination`) VALUES
(31, 'assets/img/Leipzig.jpg', 'Ровно', 'Лейпциг'),
(32, 'assets/img/Dortmund.jpg', 'Житомир', 'Дортмунд'),
(33, 'assets/img/Gannover.jpg', 'Луцк', 'Ганновер'),
(34, 'assets/img/Dresden.jpg', 'Львов', 'Дрезден'),
(35, 'assets/img/Frankf.jpg', 'Киев', 'Франкфур-на-Майне'),
(36, 'assets/img/Keln.jpg', 'Киев', 'Кельн'),
(37, 'assets/img/Duseldorf.jpg', 'Киев', 'Дюсельдорф'),
(38, 'assets/img/berlin.jpg', 'Киев', 'Берлин');

-- --------------------------------------------------------

--
-- Структура таблицы `company_header_img`
--

CREATE TABLE `company_header_img` (
  `1` int(11) NOT NULL,
  `image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Дамп данных таблицы `company_header_img`
--

INSERT INTO `company_header_img` (`1`, `image`) VALUES
(1, 'assets/img/germany-0111.jpg');

-- --------------------------------------------------------

--
-- Структура таблицы `company_name`
--

CREATE TABLE `company_name` (
  `id` int(11) NOT NULL,
  `company` varchar(255) CHARACTER SET utf8 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Дамп данных таблицы `company_name`
--

INSERT INTO `company_name` (`id`, `company`) VALUES
(1, 'KiraTour');

-- --------------------------------------------------------

--
-- Структура таблицы `company_orders`
--

CREATE TABLE `company_orders` (
  `id` int(11) NOT NULL,
  `order_from_where` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `order_where_destination` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `order_phone` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `order_date` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `order_cargo` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `order_passengers` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `order_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Дамп данных таблицы `company_orders`
--

INSERT INTO `company_orders` (`id`, `order_from_where`, `order_where_destination`, `order_phone`, `order_date`, `order_cargo`, `order_passengers`, `order_time`) VALUES
(108, '<script>alert(\'Привет от хакера\');</script>', '<script>alert(\'Привет от хакера\');</script>', '12345678910111213141', '2023-01-24', 'груз/передача', 'пасажири', '2023-01-24 10:43:57'),
(161, 'Тестовый заказ', 'Тестовый заказ', '380981180209', '2023-01-25', 'Груз/передача', 'Пасажири', '2023-01-25 09:09:13'),
(162, 'киев', 'Дортмунд', '380997774928', '2023-01-25', 'Невыбрано', 'Пасажири', '2023-01-25 09:21:42');

-- --------------------------------------------------------

--
-- Структура таблицы `company_phone`
--

CREATE TABLE `company_phone` (
  `id` int(11) NOT NULL,
  `phone` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Дамп данных таблицы `company_phone`
--

INSERT INTO `company_phone` (`id`, `phone`) VALUES
(1, ' +380965697772'),
(2, ' +380995697772');

-- --------------------------------------------------------

--
-- Структура таблицы `destination`
--

CREATE TABLE `destination` (
  `id` int(11) NOT NULL,
  `from_where` varchar(255) CHARACTER SET utf8 NOT NULL,
  `where_destination` varchar(255) CHARACTER SET utf8 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Дамп данных таблицы `destination`
--

INSERT INTO `destination` (`id`, `from_where`, `where_destination`) VALUES
(1, 'Украина', 'Мальдивы');

-- --------------------------------------------------------

--
-- Структура таблицы `social_media_chat`
--

CREATE TABLE `social_media_chat` (
  `id` int(11) NOT NULL,
  `viber` varchar(255) CHARACTER SET utf8 NOT NULL,
  `telegram` varchar(255) CHARACTER SET utf8 NOT NULL,
  `whatsapp` varchar(255) CHARACTER SET utf8 NOT NULL,
  `phone` varchar(255) CHARACTER SET utf8 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Дамп данных таблицы `social_media_chat`
--

INSERT INTO `social_media_chat` (`id`, `viber`, `telegram`, `whatsapp`, `phone`) VALUES
(1, '380965697772', 'KiraTour777', '+380995697772', '+380965697772');

-- --------------------------------------------------------

--
-- Структура таблицы `social_media_group`
--

CREATE TABLE `social_media_group` (
  `id` int(11) NOT NULL,
  `viber` varchar(255) NOT NULL,
  `telegram` varchar(255) NOT NULL,
  `facebook` varchar(255) NOT NULL,
  `instagram` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Дамп данных таблицы `social_media_group`
--

INSERT INTO `social_media_group` (`id`, `viber`, `telegram`, `facebook`, `instagram`) VALUES
(1, 'https://invite.viber.com/?g=NI4xXDNmbFDPybMhCjUpszqqZ-JmvK9v', 'sKiraTour', 'https://www.facebook.com/groups/723604285755585/', 'https://instagram.com/kira_tour777');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `company_card_title`
--
ALTER TABLE `company_card_title`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `company_description`
--
ALTER TABLE `company_description`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `company_directions`
--
ALTER TABLE `company_directions`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `company_header_img`
--
ALTER TABLE `company_header_img`
  ADD PRIMARY KEY (`1`);

--
-- Индексы таблицы `company_name`
--
ALTER TABLE `company_name`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `company_orders`
--
ALTER TABLE `company_orders`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `company_phone`
--
ALTER TABLE `company_phone`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `destination`
--
ALTER TABLE `destination`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `social_media_chat`
--
ALTER TABLE `social_media_chat`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `social_media_group`
--
ALTER TABLE `social_media_group`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `company_card_title`
--
ALTER TABLE `company_card_title`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT для таблицы `company_description`
--
ALTER TABLE `company_description`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT для таблицы `company_directions`
--
ALTER TABLE `company_directions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT для таблицы `company_header_img`
--
ALTER TABLE `company_header_img`
  MODIFY `1` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT для таблицы `company_name`
--
ALTER TABLE `company_name`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT для таблицы `company_orders`
--
ALTER TABLE `company_orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=163;

--
-- AUTO_INCREMENT для таблицы `company_phone`
--
ALTER TABLE `company_phone`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT для таблицы `destination`
--
ALTER TABLE `destination`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT для таблицы `social_media_chat`
--
ALTER TABLE `social_media_chat`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT для таблицы `social_media_group`
--
ALTER TABLE `social_media_group`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
