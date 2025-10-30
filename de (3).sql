-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Апр 18 2025 г., 22:53
-- Версия сервера: 8.0.30
-- Версия PHP: 8.1.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `de`
--

-- --------------------------------------------------------

--
-- Структура таблицы `category`
--

CREATE TABLE `category` (
  `id` int NOT NULL,
  `title` varchar(255) NOT NULL,
  `parent_id` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп данных таблицы `category`
--

INSERT INTO `category` (`id`, `title`, `parent_id`) VALUES
(2, 'Женское', NULL),
(3, 'Мужское', NULL);

-- --------------------------------------------------------

--
-- Структура таблицы `music`
--

CREATE TABLE `music` (
  `id` int NOT NULL,
  `title` varchar(255) NOT NULL,
  `youtube_link` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп данных таблицы `music`
--

INSERT INTO `music` (`id`, `title`, `youtube_link`) VALUES
(2, 'Я посмотрел все фильмы с Киллианом Мерфи', 'https://www.youtube.com/watch?v=JSkS_W3G6FM'),
(3, 'Я посмотрел все фильмы с Киллианом Мерфи', 'https://www.youtube.com/watch?v=JSkS_W3G6FM'),
(4, 'Я посмотрел все фильмы с Киллианом Мерфи', 'https://www.youtube.com/watch?v=JSkS_W3G6FM'),
(5, 'Я посмотрел все фильмы с Киллианом Мерфи', 'https://www.youtube.com/watch?v=JSkS_W3G6FM');

-- --------------------------------------------------------

--
-- Структура таблицы `news`
--

CREATE TABLE `news` (
  `id` int NOT NULL,
  `title` varchar(255) NOT NULL,
  `content` text NOT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `image_path` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Дамп данных таблицы `news`
--

INSERT INTO `news` (`id`, `title`, `content`, `created_at`, `image_path`) VALUES
(8, 'Тюлень-сорванец устроил вечеринку в супермаркете', 'Сегодня утром сотрудники одного из супермаркетов были шокированы неожиданным гостем — тюленем, который каким-то образом пробрался внутрь магазина через запасной выход. Хищник несколько часов разгуливал между полками, пока покупатели снимали его на телефоны. Сотрудники зоозащитной организации быстро прибыли на место и вернули тюленя обратно в море. По словам очевидцев, тюлень выглядел довольным и сытым после своего маленького приключения.\r\n\r\n', '2025-03-16 14:48:05', NULL),
(9, 'Осьминог научился пользоваться планшетом и теперь требует Wi-Fi', 'В одном из аквариумов осьминог по имени Сэнди стал настоящей звездой интернета благодаря своему новому увлечению — планшетам. Работники аквариума заметили, что Сэнди проявляет интерес к гаджету, когда его показывают посетителям. Теперь Сэнди регулярно смотрит видео и даже пытается играть в игры.', '2025-03-16 14:48:56', NULL),
(10, 'Кошка устроила забастовку, отказываясь ловить мышей до повышения зарплаты', 'В одной из деревень кошка по кличке Мурка объявила забастовку, требуя улучшения условий труда. Она отказалась ловить мышей, пока ей не повысят \"зарплату\" в виде лучшего корма и большего количества игрушек. Хозяева, понимая серьёзность ситуации, решили пойти на уступки и заключили с Муркой новый \"контракт\". Теперь она получает премиальные за каждую пойманную мышь.', '2025-03-16 14:49:10', NULL);

-- --------------------------------------------------------

--
-- Структура таблицы `order`
--

CREATE TABLE `order` (
  `id` int NOT NULL,
  `product_id` int NOT NULL,
  `user_id` int NOT NULL,
  `status_id` int NOT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `pay_type`
--

CREATE TABLE `pay_type` (
  `id` int NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `photo`
--

CREATE TABLE `photo` (
  `id` int NOT NULL,
  `product_id` int NOT NULL,
  `file_name` varchar(255) NOT NULL,
  `order` int DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп данных таблицы `photo`
--

INSERT INTO `photo` (`id`, `product_id`, `file_name`, `order`) VALUES
(90, 47, 'ro1.png', 0),
(91, 47, 'ro2_110439c3-8c14-4dba-a400-690792601e6f.png', 0),
(92, 47, 'ro3.png', 0),
(93, 47, 'ro4.png', 0),
(94, 48, 'ro4.png', 0),
(95, 48, 'ro1.png', 0),
(96, 48, 'ro2_110439c3-8c14-4dba-a400-690792601e6f.png', 0),
(97, 48, 'ro3.png', 0),
(98, 49, 'ro4.png', 0),
(99, 49, 'ro4.png', 0),
(100, 50, 'ro4.png', 0);

-- --------------------------------------------------------

--
-- Структура таблицы `product`
--

CREATE TABLE `product` (
  `id` int NOT NULL,
  `title` varchar(255) NOT NULL,
  `item_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `count` int UNSIGNED NOT NULL DEFAULT '1',
  `cost` int UNSIGNED NOT NULL DEFAULT '0',
  `category_id` int NOT NULL,
  `description` text,
  `image_path` varchar(255) DEFAULT NULL,
  `size` varchar(255) DEFAULT NULL,
  `status` int DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп данных таблицы `product`
--

INSERT INTO `product` (`id`, `title`, `item_name`, `count`, `cost`, `category_id`, `description`, `image_path`, `size`, `status`) VALUES
(47, 'Raf Simons', 'AW2008 Phoenix Coat', 1, 5000, 3, 'cascascasccsac', NULL, '2', 1),
(48, 'Raf Simons', 'AW2008 Phoenix Coat', 1, 5000, 3, 'cascascasccsac', NULL, '2', 1),
(49, 'Raf Simons', 'AW2008 Phoenix Coat', 1, 5000, 3, 'cascascasccsac', NULL, '2', 1),
(50, 'Raf Simons', 'AW2008 Phoenix Coat', 1, 5000, 3, 'cascascasccsac', NULL, '2', 1);

-- --------------------------------------------------------

--
-- Структура таблицы `role`
--

CREATE TABLE `role` (
  `id` int NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Дамп данных таблицы `role`
--

INSERT INTO `role` (`id`, `title`) VALUES
(1, 'admin'),
(2, 'user');

-- --------------------------------------------------------

--
-- Структура таблицы `status`
--

CREATE TABLE `status` (
  `id` int NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Дамп данных таблицы `status`
--

INSERT INTO `status` (`id`, `title`) VALUES
(1, 'Новая'),
(2, 'В работе'),
(3, 'Выполнено'),
(4, 'Отменено');

-- --------------------------------------------------------

--
-- Структура таблицы `user`
--

CREATE TABLE `user` (
  `id` int NOT NULL,
  `login` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `full_name` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `role_id` int NOT NULL,
  `auth_key` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Дамп данных таблицы `user`
--

INSERT INTO `user` (`id`, `login`, `password`, `full_name`, `phone`, `email`, `role_id`, `auth_key`) VALUES
(9, 'adminka', '$2y$13$QcN/a3zLZuGJHcoziftq6uuD.DkHQNgRGTXeDc50F67s37lonLjHG', 'н п а', '+7(999)-999-99-99', 'p@p.p', 1, 'eqEzDUM-DKfz64NlGYEu1cKQ5dudz2jt'),
(10, 'user', '$2y$13$2GMA1zYd7C6QARhUKG78J.aNno5HGvjw1/cXeUnSc5Zvx1vO9FPTC', 'н п а', '+7(999)-999-99-99', 'p@p.p', 2, 'R7LxNnPGdIoKXuawsEuNR-R0CJbQS-Pq'),
(11, '1111', '$2y$13$LHOQrT5WmzYSj6vG0OMmnejFi.RiYiK3i2Y0MMJsNuHY6daGV6TS2', 'н п а', '+7(999)-999-99-99', 'p@p.p', 2, 'P3qzMAN_feSrhIWdFUjv-RQZHKi9qVHf'),
(12, 'das22222222', '$2y$13$d6sc1y3s3QvXvCN84cOFi.A.8P/ZIokW8rNdN9nNr70nSRQUZy/Yi', 'н п а', '+7(999)-999-99-99', 'p@p.p', 2, 'IbB3iEenElPt60XCvbmqEFF90ExGDGIe'),
(13, 'das222222223442323432', '$2y$13$UeFfcg81EuNOfBswWAl04.X/aKvOylfRsHbFlpvMFMkusJTYfHP4a', 'н п а', '+7(999)-999-99-99', 'p@p.p', 2, 'Wg5fKeLhu92oAfNxhTIOpHoKeE3sUk2W');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `music`
--
ALTER TABLE `music`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `order`
--
ALTER TABLE `order`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_id` (`product_id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `status_id` (`status_id`);

--
-- Индексы таблицы `pay_type`
--
ALTER TABLE `pay_type`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `photo`
--
ALTER TABLE `photo`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_id` (`product_id`);

--
-- Индексы таблицы `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`),
  ADD KEY `category_id` (`category_id`),
  ADD KEY `size_id` (`size`);

--
-- Индексы таблицы `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `status`
--
ALTER TABLE `status`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `login` (`login`),
  ADD KEY `role_id` (`role_id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `category`
--
ALTER TABLE `category`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT для таблицы `music`
--
ALTER TABLE `music`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT для таблицы `news`
--
ALTER TABLE `news`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT для таблицы `order`
--
ALTER TABLE `order`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT для таблицы `pay_type`
--
ALTER TABLE `pay_type`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT для таблицы `photo`
--
ALTER TABLE `photo`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=101;

--
-- AUTO_INCREMENT для таблицы `product`
--
ALTER TABLE `product`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT для таблицы `role`
--
ALTER TABLE `role`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT для таблицы `status`
--
ALTER TABLE `status`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT для таблицы `user`
--
ALTER TABLE `user`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `order`
--
ALTER TABLE `order`
  ADD CONSTRAINT `order_ibfk_1` FOREIGN KEY (`product_id`) REFERENCES `product` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `order_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `order_ibfk_3` FOREIGN KEY (`status_id`) REFERENCES `status` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ограничения внешнего ключа таблицы `photo`
--
ALTER TABLE `photo`
  ADD CONSTRAINT `photo_ibfk_1` FOREIGN KEY (`product_id`) REFERENCES `product` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ограничения внешнего ключа таблицы `product`
--
ALTER TABLE `product`
  ADD CONSTRAINT `product_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `category` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ограничения внешнего ключа таблицы `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `user_ibfk_1` FOREIGN KEY (`role_id`) REFERENCES `role` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
