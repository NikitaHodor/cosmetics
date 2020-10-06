-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1
-- Время создания: Окт 06 2020 г., 17:03
-- Версия сервера: 10.4.11-MariaDB
-- Версия PHP: 7.2.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `enso_cosmetics`
--

-- --------------------------------------------------------

--
-- Структура таблицы `adresses`
--

CREATE TABLE `adresses` (
  `adress_id` int(10) UNSIGNED NOT NULL,
  `adress_name` varchar(255) CHARACTER SET utf8 DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- ССЫЛКИ ТАБЛИЦЫ `adresses`:
--

--
-- Дамп данных таблицы `adresses`
--

INSERT INTO `adresses` (`adress_id`, `adress_name`) VALUES
(1, 'ул.Савушкина 111 к 2');

-- --------------------------------------------------------

--
-- Структура таблицы `brands`
--

CREATE TABLE `brands` (
  `brand_id` int(10) UNSIGNED NOT NULL,
  `brand_name` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `brand_is_deleted` tinyint(1) UNSIGNED NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- ССЫЛКИ ТАБЛИЦЫ `brands`:
--

--
-- Дамп данных таблицы `brands`
--

INSERT INTO `brands` (`brand_id`, `brand_name`, `brand_is_deleted`) VALUES
(1, 'Pier Auge', 0),
(3, 'Metatron', 0),
(4, 'Tony&guy', 0),
(7, 'Тестируем добавление/обновление в админке.', 0);

-- --------------------------------------------------------

--
-- Структура таблицы `brand_images`
--

CREATE TABLE `brand_images` (
  `image_id` int(10) UNSIGNED NOT NULL,
  `image_url` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `image_brand_id` int(10) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- ССЫЛКИ ТАБЛИЦЫ `brand_images`:
--   `image_brand_id`
--       `brands` -> `brand_id`
--

--
-- Дамп данных таблицы `brand_images`
--

INSERT INTO `brand_images` (`image_id`, `image_url`, `image_brand_id`) VALUES
(6, '/enso_cosmetics/assets/img/brands/11832.jpg', 1),
(7, '/enso_cosmetics/assets/img/brands/31470.jpg', 3),
(8, '/enso_cosmetics/assets/img/brands/55609.png', 4);

-- --------------------------------------------------------

--
-- Структура таблицы `carts`
--

CREATE TABLE `carts` (
  `cart_id` int(10) UNSIGNED NOT NULL,
  `cart_cosmetic_id` int(10) UNSIGNED DEFAULT NULL,
  `cart_order_id` int(10) UNSIGNED DEFAULT NULL,
  `cart_count` int(3) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- ССЫЛКИ ТАБЛИЦЫ `carts`:
--   `cart_cosmetic_id`
--       `cosmetics` -> `cosmetic_id`
--   `cart_order_id`
--       `orders` -> `order_id`
--

--
-- Дамп данных таблицы `carts`
--

INSERT INTO `carts` (`cart_id`, `cart_cosmetic_id`, `cart_order_id`, `cart_count`) VALUES
(57, 2, 49, 66),
(58, 31, 50, 6);

-- --------------------------------------------------------

--
-- Структура таблицы `categories`
--

CREATE TABLE `categories` (
  `category_id` int(10) UNSIGNED NOT NULL,
  `category_name` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `category_is_deleted` tinyint(1) UNSIGNED NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- ССЫЛКИ ТАБЛИЦЫ `categories`:
--

--
-- Дамп данных таблицы `categories`
--

INSERT INTO `categories` (`category_id`, `category_name`, `category_is_deleted`) VALUES
(1, 'Уход за кожей', 0),
(2, 'Тело', 0),
(3, 'Волосы', 0),
(4, 'Для мужчин', 0),
(5, 'Специальные предложения', 0),
(6, 'Тест на добавление/обновление', 1);

-- --------------------------------------------------------

--
-- Структура таблицы `category_images`
--

CREATE TABLE `category_images` (
  `image_id` int(10) UNSIGNED NOT NULL,
  `image_url` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `image_category_id` int(10) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- ССЫЛКИ ТАБЛИЦЫ `category_images`:
--   `image_category_id`
--       `categories` -> `category_id`
--

--
-- Дамп данных таблицы `category_images`
--

INSERT INTO `category_images` (`image_id`, `image_url`, `image_category_id`) VALUES
(28, '/enso_cosmetics/assets/img/categories/41398.jpg', 1),
(29, '/enso_cosmetics/assets/img/categories/48059.jpg', 2),
(30, '/enso_cosmetics/assets/img/categories/29968.jpg', 3),
(31, '/enso_cosmetics/assets/img/categories/68859.jpg', 4),
(32, '/enso_cosmetics/assets/img/categories/1600844246.jpg', 5);

-- --------------------------------------------------------

--
-- Структура таблицы `connects`
--

CREATE TABLE `connects` (
  `connect_id` int(10) UNSIGNED NOT NULL,
  `connect_session_id` char(64) CHARACTER SET utf8 NOT NULL,
  `connect_token` char(32) CHARACTER SET utf8 NOT NULL,
  `connect_user_id` int(10) UNSIGNED NOT NULL,
  `connect_token_time` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- ССЫЛКИ ТАБЛИЦЫ `connects`:
--   `connect_user_id`
--       `users` -> `user_id`
--

-- --------------------------------------------------------

--
-- Структура таблицы `cosmetics`
--

CREATE TABLE `cosmetics` (
  `cosmetic_id` int(10) UNSIGNED NOT NULL,
  `cosmetic_name` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `cosmetic_type_id` int(10) UNSIGNED DEFAULT NULL,
  `cosmetic_category_id` int(10) UNSIGNED DEFAULT NULL,
  `cosmetic_brand_id` int(10) UNSIGNED DEFAULT NULL,
  `cosmetic_price` int(5) UNSIGNED DEFAULT NULL,
  `cosmetic_volume` int(5) UNSIGNED DEFAULT NULL,
  `cosmetic_country_id` int(10) UNSIGNED DEFAULT NULL,
  `cosmetic_description` text CHARACTER SET utf8 DEFAULT NULL,
  `cosmetic_is_deleted` tinyint(1) UNSIGNED NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- ССЫЛКИ ТАБЛИЦЫ `cosmetics`:
--   `cosmetic_type_id`
--       `types` -> `type_id`
--   `cosmetic_brand_id`
--       `brands` -> `brand_id`
--   `cosmetic_category_id`
--       `categories` -> `category_id`
--   `cosmetic_country_id`
--       `countries` -> `country_id`
--

--
-- Дамп данных таблицы `cosmetics`
--

INSERT INTO `cosmetics` (`cosmetic_id`, `cosmetic_name`, `cosmetic_type_id`, `cosmetic_category_id`, `cosmetic_brand_id`, `cosmetic_price`, `cosmetic_volume`, `cosmetic_country_id`, `cosmetic_description`, `cosmetic_is_deleted`) VALUES
(1, 'Гель - контур вокруг глаз', 1, 1, 1, 3000, 30, 1, 'Высокоэффективный продукт, который усиливает регенерацию кожи и возвращает ей свежесть, разглаживает морщины и осветляет темные круги под глазами. ', 0),
(2, 'Шампунь для окрашенных волос', 6, 3, 1, 2000, 400, 1, 'Поддерживает тон волос и предотвращает ломкость.', 0),
(3, 'delete', 2, 5, 1, 228, 228, 4, 'delete this shit', 1),
(4, 'Beard lotion', 3, 4, 4, 2500, 30, 5, 'Лосьон для роста бороды', 0),
(12, 'ADD CHECK', NULL, NULL, NULL, 1488, 1488, NULL, 'work or not?', 1),
(13, 'ADD CHECK2', NULL, NULL, NULL, 222, 222, NULL, 'work or not2?', 1),
(28, 'ADD CHECK3', 3, 2, 3, 666, 66, 3, 'work or not3?', 0),
(29, 'FULL ADD CHECK', 4, 5, 4, 6666, 66, 5, 'Проверка на добавление всех полей.', 0),
(30, 'admin_test', 1, 6, 7, 5151, 220, 2, 'Тестим редактирование в админке.', 0),
(31, 'Butthole cream', 2, 1, 7, 455, 455, 4, 'Cream for your butthole', 0),
(32, 'Gel', 1, 4, 1, 3333, 333, 2, 'gel for men', 0),
(33, 'Lotion', 3, 2, 1, 4444, 444, 1, 'Body lotion', 0),
(34, 'Oil', 6, 1, 3, 5555, 555, 3, 'Skin oil', 0),
(35, 'Shampoo', 6, 3, 4, 6666, 666, 5, 'Men shampoo', 0),
(44, 'Problem', 2, 5, 1, 7777, 40, 1, 'Problem?', 0),
(47, 'Cream', 2, 1, 1, 5665, 65, 1, 'Skin cream', 0),
(48, 'Body oil', 4, 2, 3, 2344, 234, 3, 'oil for body', 0);

-- --------------------------------------------------------

--
-- Структура таблицы `countries`
--

CREATE TABLE `countries` (
  `country_id` int(10) UNSIGNED NOT NULL,
  `country_name` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `country_is_deleted` tinyint(1) UNSIGNED NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- ССЫЛКИ ТАБЛИЦЫ `countries`:
--

--
-- Дамп данных таблицы `countries`
--

INSERT INTO `countries` (`country_id`, `country_name`, `country_is_deleted`) VALUES
(1, 'Франция', 0),
(2, 'Италия', 0),
(3, 'Япония', 0),
(4, 'Южная Корея', 0),
(5, 'Великобритания', 0);

-- --------------------------------------------------------

--
-- Структура таблицы `genders`
--

CREATE TABLE `genders` (
  `gender_id` tinyint(1) UNSIGNED NOT NULL,
  `gender_name` varchar(30) CHARACTER SET utf8 DEFAULT NULL,
  `gender_short_name` char(1) CHARACTER SET utf8 DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- ССЫЛКИ ТАБЛИЦЫ `genders`:
--

--
-- Дамп данных таблицы `genders`
--

INSERT INTO `genders` (`gender_id`, `gender_name`, `gender_short_name`) VALUES
(1, 'Мужской', 'м'),
(2, 'Женский', 'ж');

-- --------------------------------------------------------

--
-- Структура таблицы `images`
--

CREATE TABLE `images` (
  `image_id` int(10) UNSIGNED NOT NULL,
  `image_url` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `image_cosmetic_id` int(10) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- ССЫЛКИ ТАБЛИЦЫ `images`:
--   `image_cosmetic_id`
--       `cosmetics` -> `cosmetic_id`
--

--
-- Дамп данных таблицы `images`
--

INSERT INTO `images` (`image_id`, `image_url`, `image_cosmetic_id`) VALUES
(239, '/enso_cosmetics/assets/img/cosmetics/1600454426.jpg', 1),
(240, '/enso_cosmetics/assets/img/cosmetics/1600454457.jpg', 2),
(241, '/enso_cosmetics/assets/img/cosmetics/1600454465.jpg', 4),
(242, '/enso_cosmetics/assets/img/cosmetics/1600454476.jpg', 28),
(243, '/enso_cosmetics/assets/img/cosmetics/1600454484.jpg', 29),
(244, '/enso_cosmetics/assets/img/cosmetics/1600458608.jpg', 30),
(245, '/enso_cosmetics/assets/img/cosmetics/1600666933.jpg', 31),
(246, '/enso_cosmetics/assets/img/cosmetics/1600842984.jpg', 32),
(247, '/enso_cosmetics/assets/img/cosmetics/1600843058.jpg', 33),
(248, '/enso_cosmetics/assets/img/cosmetics/1600843128.jpg', 34),
(249, '/enso_cosmetics/assets/img/cosmetics/1600843181.jpg', 35),
(250, '/enso_cosmetics/assets/img/cosmetics/1600844697.jpg', 44),
(251, '/enso_cosmetics/assets/img/cosmetics/1600846601.jpg', 47),
(252, '/enso_cosmetics/assets/img/cosmetics/1600846616.jpg', 48);

-- --------------------------------------------------------

--
-- Структура таблицы `orders`
--

CREATE TABLE `orders` (
  `order_id` int(10) UNSIGNED NOT NULL,
  `order_user_id` int(10) UNSIGNED DEFAULT NULL,
  `order_status_id` tinyint(1) UNSIGNED DEFAULT NULL,
  `order_info` varchar(255) CHARACTER SET utf8 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- ССЫЛКИ ТАБЛИЦЫ `orders`:
--   `order_user_id`
--       `users` -> `user_id`
--   `order_status_id`
--       `statuses` -> `status_id`
--

--
-- Дамп данных таблицы `orders`
--

INSERT INTO `orders` (`order_id`, `order_user_id`, `order_status_id`, `order_info`) VALUES
(49, 36, NULL, 'имя: Johnny Sins, телефон: 222222222222222, email: brazzers@mail.com'),
(50, 36, NULL, 'имя: lolkekcheburek, телефон: 89112231488, email: bolt@gmail.com');

-- --------------------------------------------------------

--
-- Структура таблицы `services`
--

CREATE TABLE `services` (
  `service_id` int(10) UNSIGNED NOT NULL,
  `service_name` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `service_specialist_id` int(10) UNSIGNED DEFAULT NULL,
  `service_is_deleted` tinyint(1) UNSIGNED NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- ССЫЛКИ ТАБЛИЦЫ `services`:
--   `service_specialist_id`
--       `specialists` -> `specialist_id`
--

--
-- Дамп данных таблицы `services`
--

INSERT INTO `services` (`service_id`, `service_name`, `service_specialist_id`, `service_is_deleted`) VALUES
(1, 'Услуги косметолога', 1, 0),
(2, 'Услуги массажиста', 2, 0),
(3, 'Услуги мастера перманентного макияжа', 3, 0),
(4, 'Тестим добавление/обновление в админке.', 4, 0);

-- --------------------------------------------------------

--
-- Структура таблицы `service_images`
--

CREATE TABLE `service_images` (
  `image_id` int(10) UNSIGNED NOT NULL,
  `image_url` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `image_service_id` int(10) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- ССЫЛКИ ТАБЛИЦЫ `service_images`:
--   `image_service_id`
--       `services` -> `service_id`
--

--
-- Дамп данных таблицы `service_images`
--

INSERT INTO `service_images` (`image_id`, `image_url`, `image_service_id`) VALUES
(6, '/enso_cosmetics/assets/img/services/65547.jpg', 1),
(7, '/enso_cosmetics/assets/img/services/24845.jpg', 2),
(8, '/enso_cosmetics/assets/img/services/66604.jpg', 3);

-- --------------------------------------------------------

--
-- Структура таблицы `service_items`
--

CREATE TABLE `service_items` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `services_service_id` int(10) UNSIGNED DEFAULT NULL,
  `price` int(5) DEFAULT NULL,
  `description` text CHARACTER SET utf8 DEFAULT NULL,
  `is_deleted` tinyint(1) UNSIGNED NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- ССЫЛКИ ТАБЛИЦЫ `service_items`:
--   `services_service_id`
--       `services` -> `service_id`
--

--
-- Дамп данных таблицы `service_items`
--

INSERT INTO `service_items` (`id`, `name`, `services_service_id`, `price`, `description`, `is_deleted`) VALUES
(1, 'Спортивный массаж', 2, 2000, 'Повышает мышечный тонус.', 0),
(5, 'Дренажный массаж', 2, 1500, 'Обеспечивает дренаж лимфатической жидкости.', 0),
(6, 'Нитевая подтяжка лица', 1, 12000, 'Изменение контура лица.', 0),
(7, 'Перманентное окрашивание бровей.', 3, 8000, 'Перманентный макияж, обеспечивающий улучшение контура бровей.', 0),
(8, 'Тестовое добавление/ред', 4, 2000, 'тест ред', 0);

-- --------------------------------------------------------

--
-- Структура таблицы `service_items_images`
--

CREATE TABLE `service_items_images` (
  `image_id` int(10) UNSIGNED NOT NULL,
  `image_url` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `image_service_item_id` int(10) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- ССЫЛКИ ТАБЛИЦЫ `service_items_images`:
--   `image_service_item_id`
--       `service_items` -> `id`
--

--
-- Дамп данных таблицы `service_items_images`
--

INSERT INTO `service_items_images` (`image_id`, `image_url`, `image_service_item_id`) VALUES
(1, '/enso_cosmetics/assets/img/serviceItems/1601038535.jpg', 8),
(2, '/enso_cosmetics/assets/img/serviceItems/1601039498.jpg', 7),
(3, '/enso_cosmetics/assets/img/serviceItems/1601039797.jpg', 1),
(4, '/enso_cosmetics/assets/img/serviceItems/1601040087.jpg', 5),
(5, '/enso_cosmetics/assets/img/serviceItems/1601040120.jpg', 6);

-- --------------------------------------------------------

--
-- Структура таблицы `specialists`
--

CREATE TABLE `specialists` (
  `specialist_id` int(10) UNSIGNED NOT NULL,
  `specialist_name` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `specialist_is_deleted` tinyint(1) UNSIGNED NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- ССЫЛКИ ТАБЛИЦЫ `specialists`:
--

--
-- Дамп данных таблицы `specialists`
--

INSERT INTO `specialists` (`specialist_id`, `specialist_name`, `specialist_is_deleted`) VALUES
(1, 'Косметолог', 0),
(2, 'Массажист', 0),
(3, 'Мастер перманентного макияжа', 0),
(4, 'Админ', 0);

-- --------------------------------------------------------

--
-- Структура таблицы `statuses`
--

CREATE TABLE `statuses` (
  `status_id` tinyint(1) UNSIGNED NOT NULL,
  `status_name` varchar(255) CHARACTER SET utf8 DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- ССЫЛКИ ТАБЛИЦЫ `statuses`:
--

--
-- Дамп данных таблицы `statuses`
--

INSERT INTO `statuses` (`status_id`, `status_name`) VALUES
(1, 'Принят'),
(2, 'В обработке'),
(3, 'В пути'),
(4, 'Доставлен');

-- --------------------------------------------------------

--
-- Структура таблицы `timetable`
--

CREATE TABLE `timetable` (
  `timetable_id` int(10) UNSIGNED NOT NULL,
  `timetable_service_items_id` int(10) UNSIGNED DEFAULT NULL,
  `timetable_location` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `timetable_start_date` datetime DEFAULT NULL,
  `timetable_end_date` datetime DEFAULT NULL,
  `timetable_status` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `timetable_specialist_id` int(10) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- ССЫЛКИ ТАБЛИЦЫ `timetable`:
--   `timetable_specialist_id`
--       `specialists` -> `specialist_id`
--   `timetable_service_items_id`
--       `service_items` -> `id`
--

--
-- Дамп данных таблицы `timetable`
--

INSERT INTO `timetable` (`timetable_id`, `timetable_service_items_id`, `timetable_location`, `timetable_start_date`, `timetable_end_date`, `timetable_status`, `timetable_specialist_id`) VALUES
(174, 7, '11-10-2020', '2020-10-05 09:00:00', '2020-10-05 10:30:00', NULL, 3),
(175, 1, '6-10-2020', '2020-10-05 09:00:00', '2020-10-05 10:30:00', NULL, 2),
(177, 5, '5-10-2020', '2020-10-05 09:00:00', '2020-10-05 10:30:00', NULL, 2);

-- --------------------------------------------------------

--
-- Структура таблицы `types`
--

CREATE TABLE `types` (
  `type_id` int(10) UNSIGNED NOT NULL,
  `type_name` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `type_is_deleted` tinyint(1) UNSIGNED NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- ССЫЛКИ ТАБЛИЦЫ `types`:
--

--
-- Дамп данных таблицы `types`
--

INSERT INTO `types` (`type_id`, `type_name`, `type_is_deleted`) VALUES
(1, 'Гель', 0),
(2, 'Крем', 0),
(3, 'Лосьон', 0),
(4, 'Масло', 0),
(6, 'Шампунь', 0);

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `user_id` int(10) UNSIGNED NOT NULL,
  `user_name` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `user_surname` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `user_login` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `user_password` char(32) CHARACTER SET utf8 DEFAULT NULL,
  `user_phone` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `user_email` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `user_gender_id` tinyint(1) UNSIGNED DEFAULT NULL,
  `user_adress_id` int(10) UNSIGNED DEFAULT NULL,
  `user_is_admin` tinyint(1) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- ССЫЛКИ ТАБЛИЦЫ `users`:
--   `user_gender_id`
--       `genders` -> `gender_id`
--   `user_adress_id`
--       `adresses` -> `adress_id`
--

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`user_id`, `user_name`, `user_surname`, `user_login`, `user_password`, `user_phone`, `user_email`, `user_gender_id`, `user_adress_id`, `user_is_admin`) VALUES
(2, NULL, NULL, 'admin', '21232f297a57a5a743894a0e4a801fc3', NULL, NULL, NULL, NULL, 1),
(3, NULL, NULL, 'Johnny Sins', '15830c2f3218394a63d70b23d235cc1c', NULL, NULL, NULL, NULL, 0),
(8, NULL, NULL, 'LoginCheck', '0ba4439ee9a46d9d9f14c60f88f45f87', NULL, NULL, NULL, NULL, 0),
(13, NULL, NULL, 'lolkek', '72b539c7a3e2391537445b2b876e2320', NULL, NULL, NULL, NULL, 0),
(14, NULL, NULL, 'Malahov+', 'f576eb7edb662b8d5eabba2276e1d2bc', NULL, NULL, NULL, NULL, 0),
(19, NULL, NULL, 'panel check', '3a2f39e05d7ff45c30d07400b4c3f070', NULL, NULL, NULL, NULL, 0),
(32, NULL, NULL, 'test', '098f6bcd4621d373cade4e832627b4f6', NULL, NULL, NULL, NULL, 0),
(33, NULL, NULL, 'test2', 'ad0234829205b9033196ba818f7a872b', NULL, NULL, NULL, NULL, 0),
(36, NULL, NULL, 'darth Bane', '2d96f82c7001328a8caab444cc26c335', NULL, NULL, NULL, NULL, 1),
(43, NULL, NULL, 'Butthead', 'acdf11f13df3520b2accef73bc97476e', NULL, NULL, NULL, NULL, 0);

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `adresses`
--
ALTER TABLE `adresses`
  ADD PRIMARY KEY (`adress_id`);

--
-- Индексы таблицы `brands`
--
ALTER TABLE `brands`
  ADD PRIMARY KEY (`brand_id`);

--
-- Индексы таблицы `brand_images`
--
ALTER TABLE `brand_images`
  ADD PRIMARY KEY (`image_id`),
  ADD UNIQUE KEY `image_brand_id` (`image_brand_id`);

--
-- Индексы таблицы `carts`
--
ALTER TABLE `carts`
  ADD PRIMARY KEY (`cart_id`),
  ADD UNIQUE KEY `cart_cosmetic_id` (`cart_cosmetic_id`,`cart_order_id`),
  ADD KEY `cart_order_id` (`cart_order_id`);

--
-- Индексы таблицы `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`category_id`);

--
-- Индексы таблицы `category_images`
--
ALTER TABLE `category_images`
  ADD PRIMARY KEY (`image_id`),
  ADD UNIQUE KEY `image_category_id` (`image_category_id`);

--
-- Индексы таблицы `connects`
--
ALTER TABLE `connects`
  ADD PRIMARY KEY (`connect_id`),
  ADD UNIQUE KEY `connect_user_id` (`connect_user_id`);

--
-- Индексы таблицы `cosmetics`
--
ALTER TABLE `cosmetics`
  ADD PRIMARY KEY (`cosmetic_id`),
  ADD KEY `cosmetic_type_id` (`cosmetic_type_id`) USING BTREE,
  ADD KEY `cosmetic_brand_id` (`cosmetic_brand_id`),
  ADD KEY `cosmetic_country_id` (`cosmetic_country_id`),
  ADD KEY `cosmetic_category_id` (`cosmetic_category_id`) USING BTREE;

--
-- Индексы таблицы `countries`
--
ALTER TABLE `countries`
  ADD PRIMARY KEY (`country_id`);

--
-- Индексы таблицы `genders`
--
ALTER TABLE `genders`
  ADD PRIMARY KEY (`gender_id`);

--
-- Индексы таблицы `images`
--
ALTER TABLE `images`
  ADD PRIMARY KEY (`image_id`),
  ADD UNIQUE KEY `image_cosmetic_id` (`image_cosmetic_id`);

--
-- Индексы таблицы `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`order_id`),
  ADD UNIQUE KEY `order_user_id` (`order_user_id`,`order_status_id`),
  ADD KEY `order_status_id` (`order_status_id`);

--
-- Индексы таблицы `services`
--
ALTER TABLE `services`
  ADD PRIMARY KEY (`service_id`),
  ADD KEY `service_specialist_id` (`service_specialist_id`);

--
-- Индексы таблицы `service_images`
--
ALTER TABLE `service_images`
  ADD PRIMARY KEY (`image_id`),
  ADD UNIQUE KEY `image_service_id` (`image_service_id`);

--
-- Индексы таблицы `service_items`
--
ALTER TABLE `service_items`
  ADD PRIMARY KEY (`id`),
  ADD KEY `service_id` (`services_service_id`) USING BTREE;

--
-- Индексы таблицы `service_items_images`
--
ALTER TABLE `service_items_images`
  ADD PRIMARY KEY (`image_id`),
  ADD KEY `image_service_item_id` (`image_service_item_id`);

--
-- Индексы таблицы `specialists`
--
ALTER TABLE `specialists`
  ADD PRIMARY KEY (`specialist_id`);

--
-- Индексы таблицы `statuses`
--
ALTER TABLE `statuses`
  ADD PRIMARY KEY (`status_id`);

--
-- Индексы таблицы `timetable`
--
ALTER TABLE `timetable`
  ADD PRIMARY KEY (`timetable_id`),
  ADD KEY `timetable_specialist_id` (`timetable_specialist_id`),
  ADD KEY `timetable_service_items_id` (`timetable_service_items_id`);

--
-- Индексы таблицы `types`
--
ALTER TABLE `types`
  ADD PRIMARY KEY (`type_id`);

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `user_gender_id` (`user_gender_id`,`user_adress_id`),
  ADD KEY `user_adress_id` (`user_adress_id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `adresses`
--
ALTER TABLE `adresses`
  MODIFY `adress_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT для таблицы `brands`
--
ALTER TABLE `brands`
  MODIFY `brand_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT для таблицы `brand_images`
--
ALTER TABLE `brand_images`
  MODIFY `image_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT для таблицы `carts`
--
ALTER TABLE `carts`
  MODIFY `cart_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=59;

--
-- AUTO_INCREMENT для таблицы `categories`
--
ALTER TABLE `categories`
  MODIFY `category_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT для таблицы `category_images`
--
ALTER TABLE `category_images`
  MODIFY `image_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT для таблицы `connects`
--
ALTER TABLE `connects`
  MODIFY `connect_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=321;

--
-- AUTO_INCREMENT для таблицы `cosmetics`
--
ALTER TABLE `cosmetics`
  MODIFY `cosmetic_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT для таблицы `countries`
--
ALTER TABLE `countries`
  MODIFY `country_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT для таблицы `genders`
--
ALTER TABLE `genders`
  MODIFY `gender_id` tinyint(1) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT для таблицы `images`
--
ALTER TABLE `images`
  MODIFY `image_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=253;

--
-- AUTO_INCREMENT для таблицы `orders`
--
ALTER TABLE `orders`
  MODIFY `order_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT для таблицы `services`
--
ALTER TABLE `services`
  MODIFY `service_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT для таблицы `service_images`
--
ALTER TABLE `service_images`
  MODIFY `image_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT для таблицы `service_items`
--
ALTER TABLE `service_items`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT для таблицы `service_items_images`
--
ALTER TABLE `service_items_images`
  MODIFY `image_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT для таблицы `specialists`
--
ALTER TABLE `specialists`
  MODIFY `specialist_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT для таблицы `statuses`
--
ALTER TABLE `statuses`
  MODIFY `status_id` tinyint(1) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT для таблицы `timetable`
--
ALTER TABLE `timetable`
  MODIFY `timetable_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=178;

--
-- AUTO_INCREMENT для таблицы `types`
--
ALTER TABLE `types`
  MODIFY `type_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `brand_images`
--
ALTER TABLE `brand_images`
  ADD CONSTRAINT `brand_images_ibfk_1` FOREIGN KEY (`image_brand_id`) REFERENCES `brands` (`brand_id`);

--
-- Ограничения внешнего ключа таблицы `carts`
--
ALTER TABLE `carts`
  ADD CONSTRAINT `carts_ibfk_1` FOREIGN KEY (`cart_cosmetic_id`) REFERENCES `cosmetics` (`cosmetic_id`),
  ADD CONSTRAINT `carts_ibfk_2` FOREIGN KEY (`cart_order_id`) REFERENCES `orders` (`order_id`);

--
-- Ограничения внешнего ключа таблицы `category_images`
--
ALTER TABLE `category_images`
  ADD CONSTRAINT `category_images_ibfk_1` FOREIGN KEY (`image_category_id`) REFERENCES `categories` (`category_id`);

--
-- Ограничения внешнего ключа таблицы `connects`
--
ALTER TABLE `connects`
  ADD CONSTRAINT `connects_ibfk_1` FOREIGN KEY (`connect_user_id`) REFERENCES `users` (`user_id`);

--
-- Ограничения внешнего ключа таблицы `cosmetics`
--
ALTER TABLE `cosmetics`
  ADD CONSTRAINT `cosmetics_ibfk_1` FOREIGN KEY (`cosmetic_type_id`) REFERENCES `types` (`type_id`),
  ADD CONSTRAINT `cosmetics_ibfk_2` FOREIGN KEY (`cosmetic_brand_id`) REFERENCES `brands` (`brand_id`),
  ADD CONSTRAINT `cosmetics_ibfk_3` FOREIGN KEY (`cosmetic_category_id`) REFERENCES `categories` (`category_id`),
  ADD CONSTRAINT `cosmetics_ibfk_4` FOREIGN KEY (`cosmetic_country_id`) REFERENCES `countries` (`country_id`);

--
-- Ограничения внешнего ключа таблицы `images`
--
ALTER TABLE `images`
  ADD CONSTRAINT `images_ibfk_1` FOREIGN KEY (`image_cosmetic_id`) REFERENCES `cosmetics` (`cosmetic_id`);

--
-- Ограничения внешнего ключа таблицы `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`order_user_id`) REFERENCES `users` (`user_id`),
  ADD CONSTRAINT `orders_ibfk_2` FOREIGN KEY (`order_status_id`) REFERENCES `statuses` (`status_id`);

--
-- Ограничения внешнего ключа таблицы `services`
--
ALTER TABLE `services`
  ADD CONSTRAINT `services_ibfk_1` FOREIGN KEY (`service_specialist_id`) REFERENCES `specialists` (`specialist_id`);

--
-- Ограничения внешнего ключа таблицы `service_images`
--
ALTER TABLE `service_images`
  ADD CONSTRAINT `service_images_ibfk_1` FOREIGN KEY (`image_service_id`) REFERENCES `services` (`service_id`);

--
-- Ограничения внешнего ключа таблицы `service_items`
--
ALTER TABLE `service_items`
  ADD CONSTRAINT `service_items_ibfk_1` FOREIGN KEY (`services_service_id`) REFERENCES `services` (`service_id`);

--
-- Ограничения внешнего ключа таблицы `service_items_images`
--
ALTER TABLE `service_items_images`
  ADD CONSTRAINT `service_items_images_ibfk_1` FOREIGN KEY (`image_service_item_id`) REFERENCES `service_items` (`id`);

--
-- Ограничения внешнего ключа таблицы `timetable`
--
ALTER TABLE `timetable`
  ADD CONSTRAINT `timetable_ibfk_1` FOREIGN KEY (`timetable_specialist_id`) REFERENCES `specialists` (`specialist_id`),
  ADD CONSTRAINT `timetable_ibfk_2` FOREIGN KEY (`timetable_service_items_id`) REFERENCES `service_items` (`id`);

--
-- Ограничения внешнего ключа таблицы `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`user_gender_id`) REFERENCES `genders` (`gender_id`),
  ADD CONSTRAINT `users_ibfk_2` FOREIGN KEY (`user_adress_id`) REFERENCES `adresses` (`adress_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
