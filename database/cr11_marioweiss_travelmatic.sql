-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Erstellungszeit: 17. Nov 2018 um 17:00
-- Server-Version: 10.1.30-MariaDB
-- PHP-Version: 7.2.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Datenbank: `cr11_marioweiss_travelmatic`
--
CREATE DATABASE IF NOT EXISTS `cr11_marioweiss_travelmatic` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `cr11_marioweiss_travelmatic`;

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `poi`
--

DROP TABLE IF EXISTS `poi`;
CREATE TABLE `poi` (
  `id` int(11) NOT NULL,
  `name` varchar(55) NOT NULL,
  `adress` varchar(55) NOT NULL,
  `zip` varchar(10) NOT NULL,
  `city` varchar(55) NOT NULL,
  `country` varchar(55) NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `type` varchar(55) NOT NULL,
  `short_desc` varchar(2048) NOT NULL,
  `web` varchar(255) DEFAULT NULL,
  `c_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `last_updated` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Daten für Tabelle `poi`
--

INSERT INTO `poi` (`id`, `name`, `adress`, `zip`, `city`, `country`, `image`, `type`, `short_desc`, `web`, `c_date`, `last_updated`) VALUES
(1, 'Zoo Vienna', 'MaxingstraÃŸe 13b', '1130', '', 'Austria', 'zooVienna.jpg', 'zoo', 'The first address for a trip into the fascinating world of animals is the Tiergarten SchÃ¶nbrunn, which offers a unique combination of culture and nature all year round. The oldest zoo in the world and the best zoo in Europe is part of the UNESCO World Heritage SchÃ¶nbrunn and home to over 700 species of animals, including the rare Great Pandas. Watch polar bears, tigers, orangutans, koalas and elephants, dive into the Amazon and experience the tropical rainforest. Commented feedings, guided tours and the panoramic lift make the visit to the zoo an unforgettable experience.', 'https://www.zoovienna.at/', '2013-04-06 08:45:00', '2018-11-17 13:18:54'),
(2, 'Aqualandia', 'Via Michelangelo Buonarroti 15', '30016', '', 'Italy', 'aqualandia.jpg', 'theme park', 'The Aqualandia water park offers visitors a range of bathing facilities and slides. Sunbathing, sandy beach, wave pool, shows and Caribbean feeling complete the experience.', 'https://www.aqualandia.it', '2013-07-22 07:00:00', '2018-11-17 13:14:37'),
(3, 'Familypark', 'MÃ¤rchenparkweg 1', '7062', 'St. Margarethen', 'Austria', 'familypark.jpg', 'theme park', 'Immerse yourself in a world full of fun and magic - Familypark guarantees adventure and entertainment for the whole family! In four themed worlds on more than 145,000 mÂ², a multitude of attractions ensures an unforgettable day.', 'https://www.familypark.at', '2014-09-20 08:30:00', '2018-11-17 12:57:52'),
(4, 'Gardaland', 'Via Derna 4', '37014', 'Castelnuovo del Garda', 'Italy', 'gardaland.jpg', 'theme park', 'Gardaland is an amusement park located in North-Eastern Italy. Opened 19 July 1975, the resort includes Gardaland Park, Gardaland Sea-Life, and the Gardaland Hotel. It is adjacent to Lake Garda, but does not actually face the water. The entire complex covers an area of 445,000 m2 (4,789,940 sq ft), while the theme park alone measures 200,000 m2 (2,152,782 sq ft). Sporting both traditional attractions and entertainment shows, it attracts nearly 3 million visitors every year.', 'https://www.gardaland.it', '2015-08-08 06:15:00', '2018-11-17 12:58:44'),
(5, 'Marineland', '306 Avenue Mozart', '06600', 'Antibes', 'France', 'marineland.jpg', 'theme park', 'The Marineland of Antibes is a theme park founded in 1970 by Roland de La Poype in Antibes (Alpes-Maritimes), in the French Riviera. On 26 hectares it includes a marine zoological park with dolphinarium, a water park (Aquasplash), a children\'s play park (Kid\'s Island), a mini golf (Aventure Golf) and a three-star hotel (Marineland Resort). It is the property of the Spanish multinational company Parques Reunidos, whose majority shareholder is the British investment fund Arle Capital Partners. The actual director is Arnaud Palu.', 'https://www.marineland.fr', '2015-08-15 14:00:00', '2018-11-17 12:58:36'),
(6, 'Amethyst Welt', 'Horner Straße 36', '3712', 'Maissau', 'Austria', 'amethystwelt.jpg', 'exhibition', 'The adventure world for the whole family! Immerse yourself in the magical world of precious stones and see the largest uncovered amethyst in the world.\r\n\r\nIt sparkles, sparkles and shines: Hardly an hour\'s drive from Vienna lies one of the world\'s most exciting gemstone sites. This very special treasure can be admired in the small Lower Austrian town of Maissau. Because exactly at the transition from Weinviertel to Waldviertel, amethyst was first discovered around 150 years ago.', 'https://www.amethystwelt.at/', '2015-10-10 11:00:00', '2015-10-10 11:00:00'),
(7, 'Pyramidenkogel', 'Linden 62', '9074', 'Linden', 'Austria', 'pyramidenkogel.jpg', 'sight', 'Pyramidekogel tower is a 54-metre-tall (177 ft) observation and broadcasting tower of steel and concrete, the Pyramidenkogel Tower, was built between 1966 and 1968 and was a well-known &amp;quot;futuristic&amp;quot; tourist attraction, according to the Rough Guide to Austria; Lonely Planet calls it &amp;quot;avant-garde.&amp;quot; In 2008, the last summer season before construction of a new edifice, the tower welcomed the five-millionth visitor.', 'https://www.pyramidenkogel.info/', '2016-07-27 12:00:00', '2018-11-17 12:58:26'),
(8, 'Schneeberg', 'Bahnhofpl. 1', '2734', 'Puchberg', 'Austria', 'schneeberg.jpg', 'mountain', 'In a beautiful basin Puchberg is located on Schneeberg. The market town is the first port of call for those who want to see the paradise of looks in all its beauty. In addition, Puchberg is a certified hiking village with hotels especially for hikers. If you stay here, learn more about the most beautiful tours in the region, can rent equipment for free or book a tour with a guide. And in winter there are family-friendly ski deals with the Salamander chairlift, salamander tow lift and Kinderland in the district of Losenheim. When it\'s cold enough, the pond in the spa park in Puchberg becomes a nature skating rink.', 'https://www.puchberg.at/', '2018-05-20 09:00:00', '2018-11-17 12:58:17');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `name` varchar(55) NOT NULL,
  `email` varchar(255) NOT NULL,
  `pw` varchar(255) NOT NULL,
  `role` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Daten für Tabelle `user`
--

INSERT INTO `user` (`id`, `name`, `email`, `pw`, `role`) VALUES
(1, 'Mario', 'mario@weiss.com', '$2y$10$qlQdmuLmfn5XPHXnO6sQ/u6dmXnBiSEIujaCCXcABVKg7ccheISeO', 2),
(2, 'Mario', '123@123.com', '$2y$10$6ibuP5FZfrw80OIQOvyr3uxMCC.FwhyePMcGVy5HFs5zuDwmNb1ZW', NULL),
(3, 'Mario', '123@123.com1', '$2y$10$tUHzOdN.RPQSZYan2ddeWe2Ny.va.MDyCHuhDqtJiI52C6WhIscQi', NULL);

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `user_role`
--

DROP TABLE IF EXISTS `user_role`;
CREATE TABLE `user_role` (
  `id` int(11) NOT NULL,
  `description` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Daten für Tabelle `user_role`
--

INSERT INTO `user_role` (`id`, `description`) VALUES
(1, 'standard User'),
(2, 'Admin'),
(3, 'Super Admin');

--
-- Indizes der exportierten Tabellen
--

--
-- Indizes für die Tabelle `poi`
--
ALTER TABLE `poi`
  ADD PRIMARY KEY (`id`);

--
-- Indizes für die Tabelle `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- Indizes für die Tabelle `user_role`
--
ALTER TABLE `user_role`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT für exportierte Tabellen
--

--
-- AUTO_INCREMENT für Tabelle `poi`
--
ALTER TABLE `poi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT für Tabelle `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT für Tabelle `user_role`
--
ALTER TABLE `user_role`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
