-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Хост: 127.0.0.1
-- Время создания: Окт 03 2016 г., 12:39
-- Версия сервера: 10.1.13-MariaDB
-- Версия PHP: 5.6.23

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `u857097171_main`
--
CREATE DATABASE IF NOT EXISTS `u857097171_main` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `u857097171_main`;

-- --------------------------------------------------------

--
-- Структура таблицы `category`
--

CREATE TABLE `category` (
  `id` int(15) NOT NULL,
  `cat` varchar(40) NOT NULL,
  `podcat` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Категории';

-- --------------------------------------------------------

--
-- Структура таблицы `reviews`
--

CREATE TABLE `reviews` (
  `id` int(15) NOT NULL,
  `name` varchar(40) NOT NULL,
  `review` varchar(1000) NOT NULL,
  `img` varchar(100) NOT NULL,
  `publich` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `statemenu`
--

CREATE TABLE `statemenu` (
  `id` int(255) NOT NULL,
  `title` varchar(255) NOT NULL,
  `title_url` varchar(255) NOT NULL,
  `parent` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Меню';

--
-- Дамп данных таблицы `statemenu`
--

INSERT INTO `statemenu` (`id`, `title`, `title_url`, `parent`) VALUES
(1, 'Образ невесты', '', 'none'),
(2, 'Стили невест', '', 'none'),
(3, 'Макияж', '', 'none'),
(4, 'Прически', '', 'none'),
(5, 'Подготовка к макияжу', '', 'none'),
(6, 'Подготовка к прическе', '', 'none'),
(7, 'Репетиция', '', 'none'),
(8, 'Последние тенденции', '', 'none');

-- --------------------------------------------------------

--
-- Структура таблицы `states`
--

CREATE TABLE `states` (
  `id` int(15) NOT NULL,
  `cat` varchar(40) NOT NULL,
  `podcat` varchar(40) NOT NULL,
  `header` varchar(40) NOT NULL,
  `images` varchar(100) NOT NULL,
  `statetext` varchar(1000) NOT NULL,
  `status` int(1) NOT NULL,
  `view` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Статьи';

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `log` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `pass` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `ip` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `ip_del_time` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`log`, `pass`, `ip`, `ip_del_time`) VALUES
('user', 'pass', '', 0);

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `statemenu`
--
ALTER TABLE `statemenu`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `statemenu`
--
ALTER TABLE `statemenu`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
