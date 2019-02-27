-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Gép: 127.0.0.1
-- Létrehozás ideje: 2019. Feb 27. 16:13
-- Kiszolgáló verziója: 10.1.30-MariaDB
-- PHP verzió: 7.2.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Adatbázis: `esti_gallery`
--
CREATE DATABASE IF NOT EXISTS `esti_gallery` DEFAULT CHARACTER SET utf8 COLLATE utf8_hungarian_ci;
USE `esti_gallery`;

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `gallery`
--

CREATE TABLE `gallery` (
  `id` int(11) NOT NULL,
  `uid` int(11) NOT NULL,
  `title` varchar(255) COLLATE utf8_hungarian_ci NOT NULL,
  `description` varchar(255) COLLATE utf8_hungarian_ci NOT NULL,
  `image` varchar(255) COLLATE utf8_hungarian_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_hungarian_ci;

--
-- A tábla adatainak kiíratása `gallery`
--

INSERT INTO `gallery` (`id`, `uid`, `title`, `description`, `image`) VALUES
(1, 1, 'Oroszlán', 'Egy oroszlán', 'lion.jpg'),
(2, 1, 'Part', 'Séta a parton', 'pexels-photo-1903707.jpeg'),
(9, 1, 'Beach', 'Beach kÃ©p', 'beach.jpg'),
(10, 1, 'Beach', 'Beach kÃ©p', '2beach.jpg'),
(11, 1, 'Beach', 'Beach kÃ©p', '32beach.jpg'),
(12, 1, 'Pug', 'UniPug', '3pug.jpg'),
(13, 1, 'Pug', 'UniPug', '4pug.jpg'),
(14, 1, 'boat', 'boat', 'boat.jpg'),
(15, 1, 'boat', 'boat', '2boat.jpg'),
(16, 1, 'boat', 'boat', '3boat.jpg'),
(17, 1, 'Pug', 'UniPug', '5pug.jpg'),
(18, 1, 'Pug', 'UniPug', '6pug.jpg');

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `email` varchar(255) COLLATE utf8_hungarian_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_hungarian_ci NOT NULL,
  `firstname` varchar(50) COLLATE utf8_hungarian_ci NOT NULL,
  `lastname` varchar(50) COLLATE utf8_hungarian_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_hungarian_ci;

--
-- A tábla adatainak kiíratása `user`
--

INSERT INTO `user` (`id`, `email`, `password`, `firstname`, `lastname`) VALUES
(1, 'mail@vasvari.hu', 'teszt', 'Elek', 'Teszt');

--
-- Indexek a kiírt táblákhoz
--

--
-- A tábla indexei `gallery`
--
ALTER TABLE `gallery`
  ADD PRIMARY KEY (`id`);

--
-- A tábla indexei `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- A kiírt táblák AUTO_INCREMENT értéke
--

--
-- AUTO_INCREMENT a táblához `gallery`
--
ALTER TABLE `gallery`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT a táblához `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
