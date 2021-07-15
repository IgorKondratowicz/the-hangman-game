-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Czas generowania: 15 Lip 2021, 17:39
-- Wersja serwera: 10.4.20-MariaDB
-- Wersja PHP: 8.0.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Baza danych: `wisielec`
--

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `haslo`
--

CREATE TABLE `haslo` (
  `id` int(11) NOT NULL,
  `haslo` varchar(50) DEFAULT NULL,
  `poziom` varchar(6) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Zrzut danych tabeli `haslo`
--

INSERT INTO `haslo` (`id`, `haslo`, `poziom`) VALUES
(1, 'komputer', 'sredni'),
(2, 'laptop', 'latwy'),
(3, 'klawiatura', 'sredni'),
(4, 'myszka', 'latwy'),
(5, 'monitor', 'sredni'),
(6, 'procesor', 'sredni'),
(7, 'grafika', 'sredni'),
(10, 'programowanie', 'trudny'),
(11, 'kabelki', 'sredni'),
(12, 'obudowa', 'sredni'),
(13, 'strona internetowa', 'trudny'),
(14, 'aplikacja', 'sredni'),
(15, 'python', 'latwy'),
(16, 'excel', 'latwy'),
(17, 'baza danych', 'trudny'),
(18, 'projekt', 'sredni'),
(19, 'internet', 'sredni'),
(20, 'projektor', 'sredni'),
(21, 'matura', 'latwy'),
(22, 'zapytanie', 'sredni'),
(23, 'tabela', 'latwy'),
(24, 'jezyk programowania', 'trudny'),
(25, 'moc obliczeniowa', 'trudny'),
(26, 'pseudokod', 'sredni'),
(27, 'klawisz', 'sredni'),
(28, 'aplikacja internetowa', 'trudny'),
(29, 'srodowisko', 'sredni'),
(30, 'visual studio code', 'trudny'),
(31, 'studia informatyczne', 'trudny'),
(32, 'photoshop', 'sredni'),
(33, 'adobe', 'latwy'),
(34, 'program', 'sredni'),
(35, 'zmienna', 'sredni'),
(36, 'obiekt', 'latwy'),
(37, 'klasa', 'latwy'),
(38, 'funkcja', 'latwy'),
(39, 'kompilator', 'sredni'),
(40, 'programista', 'trudny'),
(41, 'access', 'latwy'),
(42, 'dane', 'latwy'),
(43, 'informatyka', 'trudny'),
(44, 'dokumentacja', 'trudny'),
(45, 'przegladarka', 'trudny'),
(46, 'strona internetowa', 'trudny'),
(47, 'polaczenie internetowe', 'trudny'),
(48, 'dysk twardy', 'sredni'),
(49, 'dysk ssd', 'sredni'),
(50, 'kamerka internetowa', 'trudny'),
(51, 'google chrome', 'trudny'),
(52, 'dysk zewnetrzny', 'trudny'),
(53, 'nieprzespane noce', 'trudny'),
(54, 'egzaminy', 'trudny'),
(55, 'uklad scalony', 'trudny'),
(56, 'elektrycznosc', 'trudny'),
(57, 'wtyczka', 'sredni'),
(58, 'chlodzenie', 'sredni'),
(59, 'serwer', 'latwy'),
(60, 'localhost', 'sredni'),
(61, 'rekurencja', 'sredni'),
(62, 'miroslaw zelent', 'trudny'),
(63, 'programowanie obiektowe', 'trudny'),
(64, 'javascript', 'sredni'),
(65, 'enter', 'latwy'),
(66, 'spacja', 'latwy'),
(67, 'tabulacja', 'sredni'),
(68, 'linijka', 'sredni'),
(69, 'wyzwalacze', 'sredni'),
(70, 'uprawnienia', 'trudny'),
(71, 'zapytania', 'sredni'),
(72, 'phpmyadmin', 'sredni'),
(73, 'kodowanie', 'sredni'),
(74, 'grafika wektorowa', 'trudny'),
(75, 'obiektowosc', 'trudny'),
(76, 'polimorfizm', 'trudny'),
(77, 'dziedziczenie', 'trudny'),
(78, 'tablica', 'sredni'),
(79, 'format', 'latwy'),
(80, 'zasilacz', 'sredni'),
(81, 'srednik', 'sredni'),
(82, 'struktura', 'sredni'),
(83, 'serwerownia', 'trudny'),
(84, 'aplikacja webowa', 'trudny'),
(85, 'antywirus', 'sredni'),
(86, 'zespol programistyczny', 'trudny'),
(87, 'kontrola wersji', 'trudny'),
(88, 'capslock', 'sredni'),
(89, 'ochrona danych', 'trudny'),
(90, 'null', 'latwy'),
(91, 'kolumna', 'sredni'),
(92, 'typ zmiennej', 'trudny'),
(93, 'lancuch znakow', 'trudny'),
(94, 'tabela ascii', 'trudny'),
(95, 'szyfrowanie', 'trudny'),
(96, 'algorytm', 'sredni'),
(97, 'algorytmika', 'trudny'),
(98, 'projekt zespolowy', 'trudny'),
(99, 'zbior danych', 'trudny'),
(100, 'haslo', 'latwy');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `uzytkownicy`
--

CREATE TABLE `uzytkownicy` (
  `id` int(11) NOT NULL,
  `punkty` int(11) NOT NULL,
  `uzytkownik` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Zrzut danych tabeli `uzytkownicy`
--

INSERT INTO `uzytkownicy` (`id`, `punkty`, `uzytkownik`) VALUES
(1, 58, 'test1'),
(2, 95, 'test2'),
(3, 27, 'test3');

--
-- Indeksy dla zrzutów tabel
--

--
-- Indeksy dla tabeli `uzytkownicy`
--
ALTER TABLE `uzytkownicy`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT dla zrzuconych tabel
--

--
-- AUTO_INCREMENT dla tabeli `uzytkownicy`
--
ALTER TABLE `uzytkownicy`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
