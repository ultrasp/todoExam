-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Авг 21 2021 г., 11:57
-- Версия сервера: 10.3.13-MariaDB
-- Версия PHP: 7.3.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `todos`
--

-- --------------------------------------------------------

--
-- Структура таблицы `todos`
--

CREATE TABLE `todos` (
  `id` int(11) NOT NULL,
  `username` varchar(150) NOT NULL,
  `email` varchar(150) NOT NULL,
  `description` text NOT NULL,
  `status` varchar(50) NOT NULL,
  `is_admin_changed` int(11) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;

--
-- Дамп данных таблицы `todos`
--

INSERT INTO `todos` (`id`, `username`, `email`, `description`, `status`, `is_admin_changed`) VALUES
(1, 'test2', '1', '323', 'draft', 1),
(6, 'qweqw', 'asdas@dff.rt', 'asd\r\n', 'draft', 0),
(7, 'qweqw', 'asdas@dff.rt', 'asd\r\n', 'draft', 0),
(8, 'asd', 'sdas@sdask.rt', 'asds', 'draft', 0),
(9, 'qqw', 'asdj@asd.qwe', 'asd', 'draft', 0),
(11, 'document.write(&quot;I\'m running&quot;);', 'admin@gmail.com', 'DAS', 'draft', 0),
(12, '&lt;div&gt;&lt;script src=&quot;http://example.com/runme.js&quot;&gt;&lt;/script&gt;&lt;/div&gt;', 'admin@gmail.com', 'asdasdssaqw', 'draft', 1);

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(150) NOT NULL,
  `password` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `username`, `password`) VALUES
(1, 'admin', '$2y$10$KEZ7VZIsmer06OYVSlkMCuo9mpVdypJTFiMQ9ux7A/rdlgFZpYH7e');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `todos`
--
ALTER TABLE `todos`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `todos`
--
ALTER TABLE `todos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
