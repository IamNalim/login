-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Počítač: 127.0.0.1
-- Vytvořeno: Pon 03. kvě 2021, 11:07
-- Verze serveru: 10.4.14-MariaDB
-- Verze PHP: 7.4.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Databáze: `cv`
--

-- --------------------------------------------------------

--
-- Struktura tabulky `cv-images`
--

CREATE TABLE `cv-images` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `user_id` int(11) NOT NULL,
  `place` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Vypisuji data pro tabulku `cv-images`
--

INSERT INTO `cv-images` (`id`, `name`, `user_id`, `place`) VALUES
(28, 'halfaman.PNG', 2, 'albums/JaneDoe-album/halfaman.PNG'),
(29, 'bůabůa.PNG', 2, 'albums/JaneDoe-album/bůabůa.PNG'),
(30, 'Snímek obrazovky (405).png', 2, 'albums/JaneDoe-album/Snímek obrazovky (405).png'),
(31, 'Snímek obrazovky (404).png', 2, 'albums/JaneDoe-album/Snímek obrazovky (404).png'),
(32, 'Snímek obrazovky (403).png', 2, 'albums/JaneDoe-album/Snímek obrazovky (403).png'),
(33, 'Snímek obrazovky (375).png', 2, 'albums/JaneDoe-album/Snímek obrazovky (375).png'),
(34, 'Snímek obrazovky (342).png', 2, 'albums/JaneDoe-album/Snímek obrazovky (342).png'),
(35, 'Snímek obrazovky (336).png', 2, 'albums/JaneDoe-album/Snímek obrazovky (336).png'),
(36, 'Snímek obrazovky (365).png', 2, 'albums/JaneDoe-album/Snímek obrazovky (365).png'),
(37, 'Snímek obrazovky (405).png', 4, 'albums/Milan-album/Snímek obrazovky (405).png'),
(38, 'Snímek obrazovky (404).png', 4, 'albums/Milan-album/Snímek obrazovky (404).png'),
(39, 'Snímek obrazovky (396).png', 4, 'albums/Milan-album/Snímek obrazovky (396).png'),
(40, 'Snímek obrazovky (404).png', 1, 'albums/JohnDoe-album/Snímek obrazovky (404).png'),
(41, 'Snímek obrazovky (403).png', 4, 'albums/Milan-album/Snímek obrazovky (403).png'),
(42, 'Snímek obrazovky (405).png', 1, 'albums/JohnDoe-album/Snímek obrazovky (405).png'),
(43, 'Snímek obrazovky (405).png', 6, 'albums/DalsiJmeno-album/Snímek obrazovky (405).png'),
(44, 'me.jpg', 4, 'albums/Milan-album/me.jpg'),
(45, 'Snímek obrazovky (390).png', 4, 'albums/Milan-album/Snímek obrazovky (390).png'),
(46, 'Snímek obrazovky (125).png', 4, 'albums/Milan-album/Snímek obrazovky (125).png');

-- --------------------------------------------------------

--
-- Struktura tabulky `cv-users`
--

CREATE TABLE `cv-users` (
  `id` int(11) NOT NULL,
  `nickname` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Vypisuji data pro tabulku `cv-users`
--

INSERT INTO `cv-users` (`id`, `nickname`, `password`, `email`) VALUES
(1, 'JohnDoe', '$2y$10$iz7oVTv0/Q.18rezs3cU..0HDpEBrChRf4JoOxC23YjTlHUS/rg1C', 'john.dome@gmail.com'),
(2, 'JaneDoe', '$2y$10$L0jy67GcpG.8pOE9xMEKKOoL.F0ROCRijKm32ApGLBO5hNoIHl0gW', 'jane.doe@gmail.com'),
(4, 'Milan', '$2y$10$A01j4W5omAmV7oHd6YcFWOGaR1k90wKKvws86gYqphrIpPSBWpXee', 'milan@seznam.cz'),
(5, 'vaznedlouhynickcovim', '$2y$10$Bg37WIpNrBhpiEAyhXQmN.OO6J2cM24VrP/acgIYJHqEWq9Xmk4QS', 'zkusimetohle@seznam.cz'),
(6, 'DalsiJmeno', '$2y$10$Gnr1UMj0b4hcgzN6Ye/BfO9jvTkBZc0O7tl1CGeo17KCzP7Cze2p6', 'dalsiemail@seznam.cz'),
(7, 'Mamka', '$2y$10$1Z2zdZb1XF2tbDdHR5OtXuIDCc1.ah6FqdBR4Af7dH36Iolq06U5S', 'blabla@seznam.cz');

--
-- Klíče pro exportované tabulky
--

--
-- Klíče pro tabulku `cv-images`
--
ALTER TABLE `cv-images`
  ADD PRIMARY KEY (`id`);

--
-- Klíče pro tabulku `cv-users`
--
ALTER TABLE `cv-users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pro tabulky
--

--
-- AUTO_INCREMENT pro tabulku `cv-images`
--
ALTER TABLE `cv-images`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- AUTO_INCREMENT pro tabulku `cv-users`
--
ALTER TABLE `cv-users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
