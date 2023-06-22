-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Gegenereerd op: 22 jun 2023 om 10:35
-- Serverversie: 5.7.31
-- PHP-versie: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `voedselmaaskantje`
--

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `Voedselpakket`
--

DROP TABLE IF EXISTS `Voedselpakket`;
CREATE TABLE IF NOT EXISTS `Voedselpakket` (
  `Id` int(11) NOT NULL,
  `GezinId` int(11) NOT NULL,
  `PakketNummer` int(11) DEFAULT NULL,
  `DatumSamenstelling` date NOT NULL,
  `DatumUitgifte` date DEFAULT NULL,
  `Status` varchar(15) NOT NULL,
  `IsActief` bit(1) DEFAULT NULL,
  `Opmerking` varchar(255) DEFAULT NULL,
  `DatumAangemaakt` datetime(6) NOT NULL,
  `DatumGewijzigd` datetime(6) DEFAULT NULL,
  PRIMARY KEY (`Id`),
  KEY `GezinId` (`GezinId`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Gegevens worden geëxporteerd voor tabel `Voedselpakket`
--

INSERT INTO `Voedselpakket` (`Id`, `GezinId`, `PakketNummer`, `DatumSamenstelling`, `DatumUitgifte`, `Status`, `IsActief`, `Opmerking`, `DatumAangemaakt`, `DatumGewijzigd`) VALUES
(1, 1, 1, '2023-04-06', '2023-04-07', 'Uitgereikt', b'1', NULL, '2023-06-22 00:04:26.000000', NULL),
(2, 1, 2, '2023-04-13', NULL, 'NietUitgereikt', b'1', NULL, '2023-06-22 00:04:26.000000', NULL),
(3, 1, 3, '2023-04-20', NULL, 'NietUitgereikt', b'1', NULL, '2023-06-22 00:04:26.000000', NULL),
(4, 2, 4, '2023-04-06', '2023-04-07', 'Uitgereikt', b'1', NULL, '2023-06-22 00:04:26.000000', NULL),
(5, 2, 5, '2023-04-13', '2023-04-14', 'Uitgereikt', b'1', NULL, '2023-06-22 00:04:26.000000', NULL),
(6, 2, 6, '2023-04-20', NULL, 'NietUitgereikt', b'1', NULL, '2023-06-22 00:04:26.000000', NULL);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
