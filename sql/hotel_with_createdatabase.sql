-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Gép: 127.0.0.1
-- Létrehozás ideje: 2023. Nov 26. 15:10
-- Kiszolgáló verziója: 10.4.27-MariaDB
-- PHP verzió: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Adatbázis: `hotel`
--
CREATE DATABASE IF NOT EXISTS `hotel` DEFAULT CHARACTER SET utf8 COLLATE utf8_hungarian_ci;
USE `hotel`;

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `felhasznalok`
--

CREATE TABLE `felhasznalok` (
  `felhasznalonev` varchar(25) NOT NULL,
  `nev` varchar(50) NOT NULL,
  `jelszo` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_hungarian_ci;

--
-- A tábla adatainak kiíratása `felhasznalok`
--

INSERT INTO `felhasznalok` (`felhasznalonev`, `nev`, `jelszo`) VALUES
('admin', 'admin', '$2y$10$Do/qt73Pyf0ag8SQcWC1quo1U5AHiV5mgbbs51y5pHbKedqRjydG.'),
('asd', 'asd', '$2y$10$8IwJ4ZGjy6Gxa3LSFaIIfulBwQYpaOjWhvy6eYEImTFvWGq3WM/t.'),
('valaki', 'valaki', '$2y$10$AtuJNYbp1jPvZYeyE40OL.Kfy/RX1ZJDVeFLmR7aaA68YmKn84UTK'),
('valaki2', 'valaki2', '$2y$10$5HAUoQwggqM8CYEVHgipSufhaXRpH3SyBYjSSIftfZviMUglvRG0G');

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `foglalasok`
--

CREATE TABLE `foglalasok` (
  `vendegid` int(11) NOT NULL,
  `szobaszam` int(11) NOT NULL,
  `mettol` date NOT NULL,
  `meddig` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_hungarian_ci;

--
-- A tábla adatainak kiíratása `foglalasok`
--

INSERT INTO `foglalasok` (`vendegid`, `szobaszam`, `mettol`, `meddig`) VALUES
(8577, 108, '2023-11-20', '2023-12-01'),
(4005, 204, '2023-05-20', '2023-05-27'),
(2921, 206, '2023-11-26', '2023-11-27'),
(3652, 301, '2023-10-21', '2023-10-27'),
(7704, 304, '2023-05-21', '2023-05-27'),
(3519, 305, '2023-11-26', '2023-11-30'),
(3434, 403, '2023-03-19', '2023-03-27'),
(5499, 501, '2023-11-26', '2023-12-02'),
(2278, 502, '2023-02-26', '2023-03-02'),
(3473, 601, '2023-12-26', '2023-12-31'),
(2278, 801, '2023-12-15', '2023-12-20'),
(7914, 802, '2023-11-22', '2023-11-27'),
(2915, 902, '2023-11-26', '2023-12-15'),
(7704, 902, '2023-12-02', '2023-12-04'),
(3473, 906, '2023-11-20', '2023-11-27'),
(2921, 908, '2023-11-26', '2023-12-01');

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `szobak`
--

CREATE TABLE `szobak` (
  `szobaszam` int(11) NOT NULL,
  `megnevezesid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_hungarian_ci;

--
-- A tábla adatainak kiíratása `szobak`
--

INSERT INTO `szobak` (`szobaszam`, `megnevezesid`) VALUES
(101, 1),
(102, 1),
(103, 1),
(104, 1),
(105, 1),
(106, 1),
(107, 1),
(108, 1),
(109, 1),
(110, 1),
(201, 2),
(202, 2),
(203, 2),
(204, 2),
(205, 2),
(206, 2),
(207, 2),
(208, 2),
(209, 2),
(210, 2),
(301, 3),
(302, 3),
(303, 3),
(304, 3),
(305, 3),
(306, 3),
(307, 3),
(308, 3),
(309, 3),
(310, 3),
(401, 4),
(402, 4),
(403, 4),
(404, 4),
(405, 4),
(406, 4),
(407, 4),
(408, 4),
(409, 4),
(410, 4),
(501, 5),
(502, 5),
(503, 5),
(504, 5),
(505, 5),
(506, 5),
(507, 5),
(508, 5),
(509, 5),
(510, 5),
(601, 6),
(602, 6),
(603, 6),
(604, 6),
(605, 6),
(606, 6),
(607, 6),
(608, 6),
(609, 6),
(610, 6),
(701, 7),
(702, 7),
(703, 7),
(704, 7),
(705, 7),
(706, 7),
(707, 7),
(708, 7),
(709, 7),
(710, 7),
(801, 8),
(802, 8),
(803, 8),
(804, 8),
(805, 8),
(806, 8),
(807, 8),
(808, 8),
(809, 8),
(810, 8),
(901, 9),
(902, 9),
(903, 9),
(904, 9),
(905, 9),
(906, 9),
(907, 9),
(908, 9),
(909, 9),
(910, 9),
(1001, 10),
(1002, 10),
(1003, 10),
(1004, 10),
(1005, 10),
(1006, 10),
(1007, 10),
(1008, 10),
(1009, 10),
(1010, 10);

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `szobatipusok`
--

CREATE TABLE `szobatipusok` (
  `megnevezesid` int(11) NOT NULL,
  `megnevezes` varchar(50) NOT NULL,
  `leiras` text NOT NULL,
  `napiar` int(11) NOT NULL,
  `fekvohelyekszama` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_hungarian_ci;

--
-- A tábla adatainak kiíratása `szobatipusok`
--

INSERT INTO `szobatipusok` (`megnevezesid`, `megnevezes`, `leiras`, `napiar`, `fekvohelyekszama`) VALUES
(1, 'Családi Szoba', 'Tágas szoba, amely több ágyat és helyet kínál a családok számára.', 30000, 5),
(2, 'Deluxe Szoba', 'Nagy méretű szoba, luxus felszereltséggel és kilátással.', 25000, 2),
(3, 'Háziállat-barát Szoba', 'Különleges szoba, amely háziállatok fogadására alkalmas.', 20000, 2),
(4, 'Hostel Szoba', 'Egyszerű szoba közös fürdőszobával, ideális költségvetési utazók számára.', 5000, 1),
(5, 'Hozzáférhetőségi Szoba', 'Akadálymentesített szoba mozgáskorlátozott vendégek számára.', 15000, 2),
(6, 'Lakosztály', 'Nagy lakosztály nappalival, hálószobával és luxus fürdőszobával.', 40000, 2),
(7, 'Penthouse Lakosztály', 'A legfelső emeleten található, panorámás kilátást nyújtó luxus lakosztály.', 50000, 2),
(8, 'Standard Szoba', 'Kényelmes, alapfelszereltségű szoba egy vagy két fő részére.', 15000, 3),
(9, 'Stúdió Apartman', 'Önellátó szoba kis konyhával és étkezővel.', 35000, 2),
(10, 'Superior Szoba', 'Tágasabb, modern berendezésű szoba extra kényelmi szolgáltatásokkal.', 20000, 2);

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `vendegek`
--

CREATE TABLE `vendegek` (
  `vendegid` int(11) NOT NULL,
  `nev` varchar(100) NOT NULL,
  `email` varchar(255) NOT NULL,
  `telefonszam` varchar(20) NOT NULL,
  `szuletesidatum` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_hungarian_ci;

--
-- A tábla adatainak kiíratása `vendegek`
--

INSERT INTO `vendegek` (`vendegid`, `nev`, `email`, `telefonszam`, `szuletesidatum`) VALUES
(2278, 'Nagy István', 'nagy.istvan@outlook.com', '+36 30 321 9876', '1981-08-12'),
(2439, 'Orosz Lajos', 'orosz.lajos@freemail.hu', '+36 30 654 3211', '1991-12-12'),
(2505, 'Horváth László', 'horvath.laszlo@freemail.hu', '+36 20 456 1234', '1978-05-12'),
(2915, 'Kiss Mária', 'kiss.maria@yahoo.com', '+36 20 987 6543', '1999-07-18'),
(2921, 'Szűcs Andrea', 'szucs.andrea@gmail.com', '+36 70 456 9871', '1994-07-06'),
(3434, 'Kovács Anna', 'kovacs.anna@gmail.com', '+36 20 789 3210', '1997-11-11'),
(3473, 'Balogh Tamás', 'balogh.tamas@outlook.com', '+36 20 321 6547', '1995-09-23'),
(3519, 'Fekete Erzsébet', 'fekete.erzsebet@yahoo.com', '+36 30 987 1231', '1982-09-14'),
(3609, 'Németh Péter', 'nemeth.peter@freemail.hu', '+36 70 654 7890', '1990-06-15'),
(3652, 'Simon Eszter', 'simon.eszter@gmail.com', '+36 30 789 4561', '1997-10-13'),
(4005, 'Varga Zoltán', 'varga.zoltan@outlook.com', '+36 70 123 7890', '1992-03-14'),
(4773, 'Rácz József', 'racz.jozsef@outlook.com', '+36 70 123 4561', '1979-04-08'),
(5471, 'Farkas Gábor', 'farkas.gabor@citromail.hu', '+36 30 654 3210', '1983-11-08'),
(5499, 'Török Gabriella', 'torok.gabriella@yahoo.com', '+36 20 987 6541', '1984-07-10'),
(7704, 'Molnár Judit', 'molnar.judit@gmail.com', '+36 70 456 9876', '1975-09-30'),
(7914, 'Tóth Éva', 'toth.eva@gmail.com', '+36 30 789 4567', '1985-10-23'),
(8020, 'Papp Zsuzsanna', 'papp.zsuzsanna@yahoo.com', '+36 70 789 6543', '1986-01-01'),
(8577, 'Szabó Katalin', 'szabo.katalin@yahoo.com', '+36 30 987 1234', '1988-04-12'),
(9294, 'Takács Gergely', 'takacs.gergely@outlook.com', '+36 20 321 6541', '1988-07-17'),
(9631, 'Lakatos Béla', 'lakatos.bela@freemail.hu', '+36 20 654 9871', '1993-08-06');

--
-- Indexek a kiírt táblákhoz
--

--
-- A tábla indexei `felhasznalok`
--
ALTER TABLE `felhasznalok`
  ADD PRIMARY KEY (`felhasznalonev`);

--
-- A tábla indexei `foglalasok`
--
ALTER TABLE `foglalasok`
  ADD PRIMARY KEY (`szobaszam`,`mettol`),
  ADD KEY `vendegid` (`vendegid`),
  ADD KEY `szobaszam` (`szobaszam`),
  ADD KEY `szobaszam_2` (`szobaszam`);

--
-- A tábla indexei `szobak`
--
ALTER TABLE `szobak`
  ADD PRIMARY KEY (`szobaszam`),
  ADD KEY `megnevezesid` (`megnevezesid`);

--
-- A tábla indexei `szobatipusok`
--
ALTER TABLE `szobatipusok`
  ADD PRIMARY KEY (`megnevezesid`),
  ADD UNIQUE KEY `megnevezes` (`megnevezes`);

--
-- A tábla indexei `vendegek`
--
ALTER TABLE `vendegek`
  ADD PRIMARY KEY (`vendegid`),
  ADD UNIQUE KEY `email` (`email`);

--
-- A kiírt táblák AUTO_INCREMENT értéke
--

--
-- AUTO_INCREMENT a táblához `szobatipusok`
--
ALTER TABLE `szobatipusok`
  MODIFY `megnevezesid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Megkötések a kiírt táblákhoz
--

--
-- Megkötések a táblához `foglalasok`
--
ALTER TABLE `foglalasok`
  ADD CONSTRAINT `foglalasok_ibfk_1` FOREIGN KEY (`vendegid`) REFERENCES `vendegek` (`vendegid`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `foglalasok_ibfk_2` FOREIGN KEY (`szobaszam`) REFERENCES `szobak` (`szobaszam`);

--
-- Megkötések a táblához `szobak`
--
ALTER TABLE `szobak`
  ADD CONSTRAINT `szobak_ibfk_1` FOREIGN KEY (`megnevezesid`) REFERENCES `szobatipusok` (`megnevezesid`) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
