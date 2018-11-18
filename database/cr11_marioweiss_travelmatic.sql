-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Erstellungszeit: 18. Nov 2018 um 03:44
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
-- Tabellenstruktur für Tabelle `event`
--

DROP TABLE IF EXISTS `event`;
CREATE TABLE `event` (
  `id` int(11) NOT NULL,
  `name` varchar(55) NOT NULL,
  `adress` varchar(55) NOT NULL,
  `zip` varchar(10) NOT NULL,
  `city` varchar(55) NOT NULL,
  `country` varchar(55) NOT NULL,
  `image` varchar(255) NOT NULL DEFAULT 'nopic.png',
  `type` varchar(55) NOT NULL,
  `short_desc` varchar(2048) NOT NULL,
  `datetime` datetime NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `web` varchar(255) DEFAULT NULL,
  `c_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `last_updated` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Daten für Tabelle `event`
--

INSERT INTO `event` (`id`, `name`, `adress`, `zip`, `city`, `country`, `image`, `type`, `short_desc`, `datetime`, `price`, `web`, `c_date`, `last_updated`) VALUES
(1, 'electric love', 'SALZBURGRING - Salzburgring 1', '5325', 'Plainfeld', 'Austria', 'electriclove.jpg', 'music festival', 'Electric Love Festival is an electronic and EDM festival that takes place from 04.07.2019 to 06.07.2019 in Plainfeld near Salzburgring (AT). There are about 40,000 fans expected.\\r\\n\\r\\nSo far no artists are known for Electric Love Festival 2019. Armin Van Buuren, Axwell & Ingrosso, Dmitri Vegas & Like Mike and many more were among the last.', '2019-07-04 12:00:00', '149.00', 'https://www.electriclove.at', '2018-11-17 23:26:28', '2018-11-17 23:26:28'),
(2, 'Donauinselfest', 'Vienna - Donauinsel', '1210', 'Vienna', 'Austria', 'donauinsel.jpg', 'music festival', 'The Donauinselfest (German for Danube Island Festival) is a free open-air music festival taking place annually at Donauinsel in Vienna, Austria and it\\\'s hosted by SPÃ– Wien. With over 3 million visitors in 3 days, it\\\'s the biggest open-air music festival in the world.\\r\\nPerformances take place on the festival area at a length of 4.5 km on 11 different open-air stages and in 16 tented areas around the island. Local bands and DJs as well as many world-famous artists have performed since 1984.', '2019-03-21 13:00:00', '0.00', 'https://www.donauinselfest.at', '2018-11-17 23:31:07', '2018-11-17 23:31:07'),
(3, 'medieval pageant', 'WienerstraÃŸe 13', '3730', 'Eggenburg', 'Austria', 'eggenburg.jpg', 'medieval', 'That was the time travel to the Middle Ages - so far!\\r\\nSince 1995, well-traveled traders in Eggenburg have been selling their wares and showing craftsmen their skills. Smells of exotic spices, roast wild boar and ox fill the streets, fanfares ring when the flag-wavers arrive, and metal beats on metal during spectacular show bouts. Gaukelei enlivens the squares, music invites everyone to dance and people listen to stories from bygone times.\\r\\n\\r\\nDive into the past time travel with us into the Middle Ages!', '2019-09-07 10:00:00', '7.00', 'https://www.mittelalter.co.at', '2018-11-17 23:38:55', '2018-11-17 23:38:55'),
(4, 'Ritterfest', 'Schlossplatz 1', '2361', 'Laxenburg', 'Austria', 'ritterfest.jpg', 'medieval', '\\r\\n896/5000\\r\\nOn the two weekends 23./24. and 29./30. In September 2018, the autumnal equestrian festival on horseback Laxenburg in 2018 once again captivated our visitors. Ghostly riders and noble knights had created astonishing faces with spectacular shows. Mystic flair and the magic of yesteryear spread magicians, jugglers and musicians with their exciting performances.\\r\\n\\r\\nFor our youngest guests the Jungritterparcours with the following Jungritter hit was a lasting experience. The absolute highlight, however, were again the big knight tournaments on horseback, where the riders had to compete in various competitions. Boredom was out of place and we can once again look back on a successful knight festival.\\r\\n\\r\\nThank you very much for your esteemed visit and we look forward to seeing you again at the Ritterfest 2019!', '2019-09-21 10:00:00', '16.60', 'https://www.schloss-laxenburg.at', '2018-11-17 23:43:22', '2018-11-17 23:43:22'),
(5, 'Die Fantastischen Vier', 'Stadthalle Wien, Vogelweidplatz 14', '1150', 'Vienna', 'Austria', 'fanta4.jpg', 'live concert', '\\r\\n500/5000\\r\\nCAPTAIN FANTASTIC OPEN AIRS 2019\\r\\nThe Fantastic Four in front of a large outdoor backdrop: Starting June 6, 2019, the Fantastic Four are on a major open-air tour in Germany and Austria. Of course, besides the new songs of their latest album \\\'Captain Fantastic\\\', they have all their big hits that have since grown to double albums. Of course, it is spectacular in terms of stage, light and show. Tickets are now available at all known ticket agencies.', '2019-01-09 20:00:00', '66.50', 'http://www.diefantastischenvier.de', '2018-11-17 23:45:33', '2018-11-17 23:45:33'),
(6, 'Glow in the Dark - Circusshow', 'Kultursaal VÃ¶sendorf, Kindbergstrasse 12', '2331', 'VÃ¶sendorf', 'Austria', 'glow.jpg', 'circus show', 'A glow in the dark circus show...', '2018-10-27 17:00:00', '13.00', 'http://www.zirkusstoffl.at', '2018-11-17 23:47:33', '2018-11-17 23:47:33'),
(7, 'Paul Pizzera & Otto Jaus - UnerhÃ¶rt Solide', 'Republic - Anton-Neumayr-Platz 2', '5020', 'Salzburg', 'Austria', 'paul.jpg', 'live concert', 'Paul Pizzera & Otto Jaus, the two hottest irons the Austrian cabaret landscape currently has to offer, set off to the halls of the country with their UNERHÃ–RT-SOLIDE-TOUR to do what they do best: Inspire! Together on stage, they are willing to turn every cabaret into a cauldron of ecstasy and even the most massive cabaret stage to level the ground! Music cabaret at its finest, which consists of self-irony, honesty and the joy of life and demands both of talent and passion to the last sound. A 10.0 on the poetry scale and the art of laughing about life.', '2019-02-09 20:00:00', '41.00', 'http://www.paulpizzera.at/pizzera-jaus', '2018-11-17 23:49:14', '2018-11-17 23:49:14'),
(8, 'Elton John', 'Messe Graz - Messeplatz 1', '8010', 'Graz', 'Austria', 'elton.jpg', 'live concert', 'After more than half a century on the road and an unparalleled career that has redefined the cultural landscape and seen him claim his place as a true global icon, Elton has announced via an exclusive VR180 Live Stream on YouTube, details of his final tour called \\\'Farewell Yellow Brick Road\\\'.', '2019-07-03 20:00:00', '149.90', 'https://www.eltonjohn.com/', '2018-11-17 23:51:20', '2018-11-17 23:51:20');

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
  `image` varchar(255) NOT NULL DEFAULT 'nopic.png',
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
(1, 'Zoo Vienna', 'MaxingstraÃŸe 13b', '1130', 'Vienna', 'Austria', 'zooVienna.jpg', 'zoo', 'The first address for a trip into the fascinating world of animals is the Tiergarten SchÃ¶nbrunn, which offers a unique combination of culture and nature all year round. The oldest zoo in the world and the best zoo in Europe is part of the UNESCO World Heritage SchÃ¶nbrunn and home to over 700 species of animals, including the rare Great Pandas. Watch polar bears, tigers, orangutans, koalas and elephants, dive into the Amazon and experience the tropical rainforest. Commented feedings, guided tours and the panoramic lift make the visit to the zoo an unforgettable experience.', 'https://www.zoovienna.at/', '2013-04-06 08:45:00', '2018-11-17 20:32:28'),
(2, 'Aqualandia', 'Via Michelangelo Buonarroti 15', '30016', 'Lido di Jesolo', 'Italy', 'aqualandia.jpg', 'theme park', 'The Aqualandia water park offers visitors a range of bathing facilities and slides. Sunbathing, sandy beach, wave pool, shows and Caribbean feeling complete the experience.', 'https://www.aqualandia.it', '2013-07-22 07:00:00', '2018-11-17 20:32:50'),
(3, 'Familypark', 'MÃ¤rchenparkweg 1', '7062', 'St. Margarethen', 'Austria', 'familypark.jpg', 'theme park', 'Immerse yourself in a world full of fun and magic - Familypark guarantees adventure and entertainment for the whole family! In four themed worlds on more than 145,000 mÂ², a multitude of attractions ensures an unforgettable day.', 'https://www.familypark.at', '2014-09-20 08:30:00', '2018-11-17 12:57:52'),
(4, 'Gardaland', 'Via Derna 4', '37014', 'Castelnuovo del Garda', 'Italy', 'gardaland.jpg', 'theme park', 'Gardaland is an amusement park located in North-Eastern Italy. Opened 19 July 1975, the resort includes Gardaland Park, Gardaland Sea-Life, and the Gardaland Hotel. It is adjacent to Lake Garda, but does not actually face the water. The entire complex covers an area of 445,000 m2 (4,789,940 sq ft), while the theme park alone measures 200,000 m2 (2,152,782 sq ft). Sporting both traditional attractions and entertainment shows, it attracts nearly 3 million visitors every year.', 'https://www.gardaland.it', '2015-08-08 06:15:00', '2018-11-17 12:58:44'),
(5, 'Marineland', '306 Avenue Mozart', '06600', 'Antibes', 'France', 'marineland.jpg', 'theme park', 'The Marineland of Antibes is a theme park founded in 1970 by Roland de La Poype in Antibes (Alpes-Maritimes), in the French Riviera. On 26 hectares it includes a marine zoological park with dolphinarium, a water park (Aquasplash), a children\'s play park (Kid\'s Island), a mini golf (Aventure Golf) and a three-star hotel (Marineland Resort). It is the property of the Spanish multinational company Parques Reunidos, whose majority shareholder is the British investment fund Arle Capital Partners. The actual director is Arnaud Palu.', 'https://www.marineland.fr', '2015-08-15 14:00:00', '2018-11-17 12:58:36'),
(6, 'Amethyst Welt', 'Horner StraÃŸe 36', '3712', '', 'Austria', 'amethystwelt.jpg', 'exhibition', 'The adventure world for the whole family! Immerse yourself in the magical world of precious stones and see the largest uncovered amethyst in the world.\r\n\r\nIt sparkles, sparkles and shines: Hardly an hour\'s drive from Vienna lies one of the world\'s most exciting gemstone sites. This very special treasure can be admired in the small Lower Austrian town of Maissau. Because exactly at the transition from Weinviertel to Waldviertel, amethyst was first discovered around 150 years ago.', 'https://www.amethystwelt.at/', '2015-10-10 11:00:00', '2018-11-17 16:32:26'),
(7, 'Pyramidenkogel', 'Linden 62', '9074', 'Linden', 'Austria', 'pyramidenkogel.jpg', 'sight', 'Pyramidekogel tower is a 54-metre-tall (177 ft) observation and broadcasting tower of steel and concrete, the Pyramidenkogel Tower, was built between 1966 and 1968 and was a well-known &amp;quot;futuristic&amp;quot; tourist attraction, according to the Rough Guide to Austria; Lonely Planet calls it &amp;quot;avant-garde.&amp;quot; In 2008, the last summer season before construction of a new edifice, the tower welcomed the five-millionth visitor.', 'https://www.pyramidenkogel.info/', '2016-07-27 12:00:00', '2018-11-17 12:58:26'),
(8, 'Schneeberg', 'Bahnhofpl. 1', '2734', 'Puchberg', 'Austria', 'schneeberg.jpg', 'mountain', 'In a beautiful basin Puchberg is located on Schneeberg. The market town is the first port of call for those who want to see the paradise of looks in all its beauty. In addition, Puchberg is a certified hiking village with hotels especially for hikers. If you stay here, learn more about the most beautiful tours in the region, can rent equipment for free or book a tour with a guide. And in winter there are family-friendly ski deals with the Salamander chairlift, salamander tow lift and Kinderland in the district of Losenheim. When it\'s cold enough, the pond in the spa park in Puchberg becomes a nature skating rink.', 'https://www.puchberg.at/', '2018-05-20 09:00:00', '2018-11-17 12:58:17'),
(9, 'Mario', 'Steinfeldgasse 13', '2500', 'Baden', 'Austria', 'nopic.png', 'human', 'its just me', 'https://mario.codefactory.live', '2018-11-17 17:45:05', '2018-11-17 17:45:05');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `restaurant`
--

DROP TABLE IF EXISTS `restaurant`;
CREATE TABLE `restaurant` (
  `id` int(11) NOT NULL,
  `name` varchar(55) NOT NULL,
  `adress` varchar(55) NOT NULL,
  `zip` varchar(10) NOT NULL,
  `city` varchar(55) NOT NULL,
  `country` varchar(55) NOT NULL,
  `image` varchar(255) NOT NULL DEFAULT 'nopic.png',
  `type` varchar(55) NOT NULL,
  `short_desc` varchar(2048) NOT NULL,
  `phone` varchar(55) NOT NULL,
  `web` varchar(255) DEFAULT NULL,
  `c_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `last_updated` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Daten für Tabelle `restaurant`
--

INSERT INTO `restaurant` (`id`, `name`, `adress`, `zip`, `city`, `country`, `image`, `type`, `short_desc`, `phone`, `web`, `c_date`, `last_updated`) VALUES
(1, 'Wok & Tea', 'Arkadiaweg 1', '2514 ', 'Traiskirchen ', 'Austria', 'wokntea.jpg', 'asian food', 'need to be done', '+43 2252 50 87 77', 'https://www.firmenabc.at/wok-tea-restaurant_HxGJ', '2018-11-17 21:28:06', '2018-11-17 21:28:06'),
(2, 'Klostergasthaus Thallern', 'Thallern 1', '2352', 'Gumpoldskirchen', 'Austria', 'thallern.jpg', 'regional spezialities', '', '+43 2236 53477', 'https://www.klostergasthaus-thallern.at', '2018-11-17 21:37:43', '2018-11-17 21:37:43'),
(3, 'Graselwirtin', 'MÃ¶rtersdorf 43', '3580', 'MÃ¶rtersdorf', 'Austria', 'graselwirtin.jpg', 'regional spezialities', '', '+43 2982 8235', 'http://www.graselwirtin.at', '2018-11-17 21:39:24', '2018-11-17 21:39:24'),
(4, 'Werkstatt Eat & Drink', 'ZehnergÃ¼rtel 12-24', '2700', 'Wiener Neustadt', 'Austria', 'werkstatt.jpg', 'exquisite specialities', '', '+43 664 / 380 15 75', 'https://www.mittag.at/r/werkstatt-fischapark', '2018-11-17 21:42:19', '2018-11-17 21:42:19'),
(5, 'Camping-Gasthof Maltschacher Seewirt', 'Maltschach 2', '9560', 'Feldkirchen', 'Austria', 'seewirt.jpg', 'regional specialities', '', '+43 4277 2637', 'http://www.seewirt-spiess.com', '2018-11-17 21:44:52', '2018-11-17 21:44:52'),
(6, 'Thermenrestaurant', 'Brusattiplatz 4', '2500', 'Baden', 'Austria', 'thermenrestaurant.jpg', 'traditional & vegan food', '', '+43 664 / 56 29 108', 'http://www.thermenrestaurant.at', '2018-11-17 21:46:01', '2018-11-17 21:46:01'),
(7, 'Bento', 'SCS Shopping City SÃ¼d', '2334', 'VÃ¶sendorf', 'Austria', 'bento.jpg', 'asian food', '', '+43 2236 64515', 'https://www.scs.at/en/restaurant/bento', '2018-11-17 21:47:09', '2018-11-17 21:47:09'),
(8, 'Tsatsiki', 'Bezirksstrasse 1', '2500', 'SooÃŸ', 'Austria', 'tsatsiki.jpg', 'greek food', '', '+43 2252 22870', 'https://www.tsatsiki.at/', '2018-11-17 21:48:06', '2018-11-17 21:48:06');

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
-- Indizes für die Tabelle `event`
--
ALTER TABLE `event`
  ADD PRIMARY KEY (`id`);

--
-- Indizes für die Tabelle `poi`
--
ALTER TABLE `poi`
  ADD PRIMARY KEY (`id`);

--
-- Indizes für die Tabelle `restaurant`
--
ALTER TABLE `restaurant`
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
-- AUTO_INCREMENT für Tabelle `event`
--
ALTER TABLE `event`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT für Tabelle `poi`
--
ALTER TABLE `poi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT für Tabelle `restaurant`
--
ALTER TABLE `restaurant`
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
