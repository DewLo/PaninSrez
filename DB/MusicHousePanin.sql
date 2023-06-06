-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Июн 06 2023 г., 10:25
-- Версия сервера: 8.0.30
-- Версия PHP: 7.2.34

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `MusicHousePanin`
--

-- --------------------------------------------------------

--
-- Структура таблицы `Cart`
--

CREATE TABLE `Cart` (
  `ID` int NOT NULL,
  `IDUser` int NOT NULL,
  `IDProduct` int NOT NULL,
  `Quantity` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `Category`
--

CREATE TABLE `Category` (
  `ID` int NOT NULL,
  `NameCategory` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп данных таблицы `Category`
--

INSERT INTO `Category` (`ID`, `NameCategory`) VALUES
(1, 'Смычковые'),
(2, 'Клавишные'),
(3, 'Струнные');

-- --------------------------------------------------------

--
-- Структура таблицы `Product`
--

CREATE TABLE `Product` (
  `ID` int NOT NULL,
  `Image` varchar(255) NOT NULL,
  `Name` varchar(75) NOT NULL,
  `Price` varchar(255) NOT NULL,
  `Description` varchar(550) NOT NULL,
  `Country` varchar(75) NOT NULL,
  `Model` varchar(255) NOT NULL,
  `Year` int NOT NULL,
  `Count` int NOT NULL,
  `IDCategory` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп данных таблицы `Product`
--

INSERT INTO `Product` (`ID`, `Image`, `Name`, `Price`, `Description`, `Country`, `Model`, `Year`, `Count`, `IDCategory`) VALUES
(1, '../Image/gitara1.jpeg', 'Черная гитара', '2000', 'Гитара бомба', 'Россия', 'УберБлек', 1999, 13, 3),
(2, '../Image/pianino1.jpeg', 'Пианино', '400', 'Это не пианино вообще', 'Россия', 'Бомбовая честно говоря', 1342, 1, 2),
(3, '../Image/skripka1.jpeg', 'Скрипка', '1200', 'Скрипка кузнечика', 'Советский союз', 'Старинная', 998, 3, 1),
(4, '../Image/gitara2.jpeg', 'Гитара 2', '4000', 'Гитара наемника', 'Россия', 'Опасная', 2017, 1, 3);

-- --------------------------------------------------------

--
-- Структура таблицы `User`
--

CREATE TABLE `User` (
  `ID` int NOT NULL,
  `Name` varchar(75) NOT NULL,
  `Lastname` varchar(75) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `Patronymic` varchar(75) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `Login` varchar(255) NOT NULL,
  `Email` varchar(255) NOT NULL,
  `Password` varchar(255) NOT NULL,
  `ReapeatPass` varchar(255) NOT NULL,
  `Role` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп данных таблицы `User`
--

INSERT INTO `User` (`ID`, `Name`, `Lastname`, `Patronymic`, `Login`, `Email`, `Password`, `ReapeatPass`, `Role`) VALUES
(3, 'Дмитрий', 'Панин', 'Евгеньевич', 'ajax', 'dipad3d@gmail.com', '$2y$10$fuJZ6Cqo7eZFTtHBU/LsU.1k3ELxhLlWOBUwDALaDmsYFOXLnc.gC', '12345', 'Client'),
(4, 'Дмитрий', 'Панин', 'Евгеньевич', 'Ajax1344', 'dipad3@yandex.ru', '$2y$10$TeAww5I8u.Bmr5anFELPp.s0TmR9MM1dY4wE4xraYtaVMNDbT2uMi', '1344dp', 'Admin');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `Cart`
--
ALTER TABLE `Cart`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `IDProduct` (`IDProduct`),
  ADD KEY `IDUser` (`IDUser`);

--
-- Индексы таблицы `Category`
--
ALTER TABLE `Category`
  ADD PRIMARY KEY (`ID`);

--
-- Индексы таблицы `Product`
--
ALTER TABLE `Product`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `IDCategory` (`IDCategory`);

--
-- Индексы таблицы `User`
--
ALTER TABLE `User`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `Cart`
--
ALTER TABLE `Cart`
  MODIFY `ID` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `Category`
--
ALTER TABLE `Category`
  MODIFY `ID` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT для таблицы `Product`
--
ALTER TABLE `Product`
  MODIFY `ID` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT для таблицы `User`
--
ALTER TABLE `User`
  MODIFY `ID` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `Cart`
--
ALTER TABLE `Cart`
  ADD CONSTRAINT `cart_ibfk_1` FOREIGN KEY (`IDProduct`) REFERENCES `Product` (`ID`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `cart_ibfk_2` FOREIGN KEY (`IDUser`) REFERENCES `User` (`ID`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Ограничения внешнего ключа таблицы `Product`
--
ALTER TABLE `Product`
  ADD CONSTRAINT `product_ibfk_1` FOREIGN KEY (`IDCategory`) REFERENCES `Category` (`ID`) ON DELETE RESTRICT ON UPDATE RESTRICT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
