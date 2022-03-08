-- phpMyAdmin SQL Dump
-- version 4.5.4.1deb2ubuntu2.1
-- http://www.phpmyadmin.net
--
-- Värd: localhost
-- Tid vid skapande: 25 feb 2022 kl 01:52
-- Serverversion: 5.7.32-0ubuntu0.16.04.1-log
-- PHP-version: 7.0.33-0ubuntu0.16.04.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Databas: `dato1700`
--

-- --------------------------------------------------------

--
-- Tabellstruktur `news`
--

CREATE TABLE `news` (
  `id` int(11) NOT NULL,
  `title` varchar(20) NOT NULL,
  `content` text NOT NULL,
  `postdate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumpning av Data i tabell `news`
--

INSERT INTO `news` (`id`, `title`, `content`, `postdate`) VALUES
(1, 'RTX4090', 'zlola x jzlola x jzlola x jzlola x jzlola x jzlola x jzlola x jzlola x jzlola x jzlola x jzlola x jzlola x jzlola x jzlola x jzlola x jzlola x jzlola x jzlola x jzlola x jzlola x jzlola x jzlola x jzlola x jzlola x jzlola x jzlola x jzlola x jzlola x jzlola x jzlola x jzlola x jzlola x jzlola x jzlola x jzlola x jzlola x jzlola x jzlola x jzlola x jzlola x jzlola x jzlola x jzlola x jzlola x jzlola x jzlola x jzlola x jzlola x jzlola x jzlola x jzlola x jzlola x jzlola x jzlola x jzlola x jzlola x jzlola x jzlola x jzlola x jzlola x jzlola x jzlola x jzlola x jzlola x jzlola x jzlola x jzlola x jzlola x jzlola x jzlola x jzlola x jzlola x jzlola x jzlola x jzlola x jzlola x jzlola x jzlola x jzlola x jzlola x jzlola x jzlola x jzlola x jzlola x jzlola x jzlola x jzlola x jzlola x jzlola x jzlola x jzlola x jzlola x jzlola x jzlola x jzlola x jzlola x jzlola x jzlola x jzlola x jzlola x jzlola x jzlola x j', '2022-02-23 18:05:08'),
(2, 'Superduper CPU', '100 KÃ„RNOR!', '2022-02-23 19:38:54');

-- --------------------------------------------------------

--
-- Tabellstruktur `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(64) NOT NULL,
  `password` varchar(128) NOT NULL,
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumpning av Data i tabell `user`
--

INSERT INTO `user` (`id`, `username`, `password`, `created`) VALUES
(1, 'admin', 'password', '2022-02-23 18:04:00');

--
-- Index för dumpade tabeller
--

--
-- Index för tabell `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`id`);

--
-- Index för tabell `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT för dumpade tabeller
--

--
-- AUTO_INCREMENT för tabell `news`
--
ALTER TABLE `news`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT för tabell `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
