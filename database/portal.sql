-- phpMyAdmin SQL Dump
-- version 4.8.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Czas generowania: 17 Gru 2018, 13:33
-- Wersja serwera: 10.1.33-MariaDB
-- Wersja PHP: 5.6.37

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Baza danych: `portal`
--

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` text NOT NULL,
  `lastname` text NOT NULL,
  `sex` text NOT NULL,
  `email` varchar(255) NOT NULL,
  `city` varchar(255) NOT NULL,
  `job` varchar(255) NOT NULL,
  `password` text NOT NULL,
  `avatar` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Zrzut danych tabeli `users`
--

INSERT INTO `users` (`id`, `name`, `lastname`, `sex`, `email`, `city`, `job`, `password`, `avatar`) VALUES
(1, 'Michał', 'Kowalski', 'male', 'kowalski@example.pl', 'Gdynia', 'cukiernia \"Śnieżka\"', '$2y$10$TcOX3M61ZlZMMYvU8fmAw.kLeh.pw0fI9k9Cd8Y1QbDN/GhiLrxgi', '1.jpg'),
(2, 'Jacek', 'Michalski', 'male', 'michalski@example.pl', 'Toruń', '', '$2y$10$rhZNMTjEKwWFHR1f40bwwuLZxzvSo9GhnDb6dMI2ObSzCJBqhjrwe', '2.jpg'),
(3, 'Anna', 'Jeder', 'female', 'jeder@example.pl', '', '', '$2y$10$fvVQxLBRUS37NVFgzzpI1OE1NzodRd61uETgAO57T1c3Uh6F1h/0.', '3.jpg'),
(4, 'Karolina', 'Klacz', 'female', 'klacz@example.pl', 'Miasto', 'Praca', '$2y$10$U.5eCtINOziyIx.CJpokRutnj.VztZSJnjcFYjSKeJBzZNF.FcJ..', 'start_avatar/female.png'),
(5, 'Kacper', 'Stryj', 'male', 'stryj@example.pl', 'Olsztynek', 'Michelin', '$2y$10$ChJdaTmVJE2shCriHr8p8Oyq4n0cvcipxdYOwoIQMvSbZiDqhFzSK', '5.jpg'),
(6, 'Jan', 'Brzoza', 'male', 'brzoza@example.pl', '', '', '$2y$10$hsG8tGo3p2mSKjqiktFS2eCZjnYW9X7Kmn76dm6fc5cRgFPpEogFG', '6.jpg'),
(7, 'Małgorzata', 'Szczur', 'female', 'szczur@example.pl', 'Warszawa', 'Biuro Orange', '$2y$10$ysCs6iqcN6PzbDdPJkPjvexsHNmcgSotTbSmyaxZKJ9Pu/uhDbUK.', '7.jpg'),
(8, 'Mateusz', 'Bacowski', 'male', 'bacowski@example.pl', 'Bytom', 'Lakiernia samochodowa', '$2y$10$JKRWNYx0i/EWt2XOGd8L2.oEBMHCjk6/9DQTA2q6kuY0KeAawJ17C', '8.jpg'),
(9, 'Dawid', 'Kwiatek', 'male', 'kwiatek@example.pl', 'Kraków', 'Muzeum Natury', '$2y$10$/jdY0rna17WABrUFHbHWg.v3c.YWf6vtd202Rjl6381rEth2cyQd2', '9.jpg'),
(10, 'Karolina', 'Ciarkowska', 'female', 'ciarkowska@example.pl', 'Katowice', '', '$2y$10$C9upkz7CJfCFHK7XHT0L9.NFwYUzO7Vg38P1FV/Cwd9q/KeINwrsm', '10.jpg'),
(11, 'Ewa', 'Małysz', 'female', 'malysz@example.pl', 'Wrocław', 'Prezes małej firmy', '$2y$10$3GR3sh0P5VNSrQguA0trq.lz6NFALcMR7K49lE3k/vApMW36kzHce', '11.jpg'),
(12, 'Krzysztof', 'Kadziolka', 'male', 'kadziolka@example.pl', '', '', '$2y$10$2X1P26fgYFqrYw1NL0jKPOP65ehWbp/L4xTFfcLGZyfUxg7toQr46', 'start_avatar/male.png');

--
-- Indeksy dla zrzutów tabel
--

--
-- Indeksy dla tabeli `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT dla tabeli `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
