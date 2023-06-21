-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Gegenereerd op: 21 jun 2023 om 11:41
-- Serverversie: 8.0.27
-- PHP-versie: 7.4.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dbvoedselbankmaaskantje`
--

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `contact`
--

DROP TABLE IF EXISTS `contact`;
CREATE TABLE IF NOT EXISTS `contact` (
  `Id` int NOT NULL AUTO_INCREMENT,
  `ContactId` int UNSIGNED NOT NULL,
  `Straat` varchar(255) NOT NULL,
  `Huisnummer` varchar(255) NOT NULL,
  `Toevoeging` varchar(255) NOT NULL,
  `Postcode` varchar(6) NOT NULL,
  `Woonplaats` varchar(255) NOT NULL,
  `Email` varchar(255) NOT NULL,
  `Mobiel` char(255) NOT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Gegevens worden geëxporteerd voor tabel `contact`
--

INSERT INTO `contact` (`Id`, `ContactId`, `Straat`, `Huisnummer`, `Toevoeging`, `Postcode`, `Woonplaats`, `Email`, `Mobiel`) VALUES
(1, 0, 'Prinses Irenestraat', '12', 'A', '5271TH', 'Maaskantje', 'j.van.zevenhuizen@gmail.com', '+31623456123'),
(2, 0, 'Gibraltarstraat', '234', '', '5271TJ', 'Maaskantje', 'a.bergkamp@hotmail.com', '+31623456123');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `contactpergezin`
--

DROP TABLE IF EXISTS `contactpergezin`;
CREATE TABLE IF NOT EXISTS `contactpergezin` (
  `Id` int NOT NULL AUTO_INCREMENT,
  `GezinId` int UNSIGNED NOT NULL,
  `ContactId` int UNSIGNED NOT NULL,
  PRIMARY KEY (`Id`),
  FOREIGN KEY (`GezinId`) REFERENCES `gezin`(`Id`),
  FOREIGN KEY (`ContactId`) REFERENCES `contact`(`Id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Gegevens worden geëxporteerd voor tabel `contactpergezin`
--

INSERT INTO `contactpergezin` (`Id`, `GezinId`, `ContactId`) VALUES
(1, 1, 1),
(2, 2, 2),
(3, 3, 3),
(4, 4, 4),
(5, 5, 5),
(6, 6, 6);

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `gezin`
--

DROP TABLE IF EXISTS `gezin`;
CREATE TABLE IF NOT EXISTS `gezin` (
  `Id` int NOT NULL AUTO_INCREMENT,
  `GezinId` int UNSIGNED NOT NULL,
  `Naam` varchar(255) NOT NULL,
  `Code` varchar(255) NOT NULL,
  `Omschrijving` enum('Bijstandsgezin','Alleenstaande','Werkloze') CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `AantalVolwassenen` int NOT NULL,
  `AantalKinderen` int NOT NULL,
  `AantalBabys` int NOT NULL,
  `TotaalAantaPersonen` int NOT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Gegevens worden geëxporteerd voor tabel `gezin`
--

INSERT INTO `gezin` (`Id`, `GezinId`, `Naam`, `Code`, `Omschrijving`, `AantalVolwassenen`, `AantalKinderen`, `AantalBabys`, `TotaalAantaPersonen`) VALUES
(1, 0, 'ZevenhuizenGezin', 'G0001', 'Bijstandsgezin', 2, 2, 0, 4),
(2, 0, 'BergkampGezin', 'G0002', 'Bijstandsgezin', 2, 1, 1, 4),
(3, 0, 'HeuvelGezin', 'G0003', 'Bijstandsgezin', 2, 0, 0, 2),
(4, 0, 'SchrederGezin', 'G0004', 'Bijstandsgezin', 1, 0, 2, 3),
(5, 0, 'DeJongGezin', 'G0005', 'Bijstandsgezin', 1, 1, 0, 2),
(6, 0, 'VanDerBergGezin', 'G0006', 'Alleenstaande', 1, 0, 0, 1);

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `persoon`
--

DROP TABLE IF EXISTS `persoon`;
CREATE TABLE IF NOT EXISTS `persoon` (
  `Id` int NOT NULL AUTO_INCREMENT,
  `GezinId` int UNSIGNED NOT NULL,
  `Voornaam` varchar(255) NOT NULL,
  `Tuusenvoegsel` varchar(255) NOT NULL,
  `Achternaam` varchar(255) NOT NULL,
  `Geboortedatum` date NOT NULL,
  `TypePersoon` enum('Manager','Medewerker','Vrijwilliger','KLant') NOT NULL,
  `IsVertegenwoordig` bit(1) NOT NULL,
  PRIMARY KEY (`Id`),
  FOREIGN KEY (`GezinId`) REFERENCES `gezin`(`Id`)
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=latin1;

--
-- Gegevens worden geëxporteerd voor tabel `persoon`
--

INSERT INTO `persoon` (`Id`, `GezinId`, `Voornaam`, `Tuusenvoegsel`, `Achternaam`, `Geboortedatum`, `TypePersoon`, `IsVertegenwoordig`) VALUES
(1, 0, 'Hans', 'van', 'Leeuwen', '1958-02-12', 'Manager', b'0'),
(2, 0, 'Jan', 'van der', 'Sluijs', '1993-04-30', 'Medewerker', b'0'),
(3, 0, 'Herman', 'den', 'Duiker', '1989-08-30', 'Vrijwilliger', b'0'),
(4, 1, 'Johan', 'van', 'Zevenhuizen', '1990-05-20', 'KLant', b'1'),
(5, 1, 'Sarah', 'den', 'Dolder', '1985-03-23', 'KLant', b'0'),
(6, 1, 'Theo', 'van', 'Zevenhuizen', '2015-03-08', 'KLant', b'0'),
(7, 1, 'Jantien', 'van', 'Zevenhuizen', '2016-09-20', 'KLant', b'0'),
(8, 2, 'Arjan', '', 'Bergkamp', '1968-07-12', 'KLant', b'1'),
(9, 2, 'Janneke', '', 'Sanders', '1969-05-11', 'KLant', b'0'),
(10, 2, 'Stein', '', 'Bergkamp', '2009-02-02', 'KLant', b'0'),
(11, 2, 'Judith', '', 'Bergkamp', '2022-02-05', 'KLant', b'0'),
(12, 3, 'Mazin', 'van', 'Vliet', '1968-08-18', 'KLant', b'0'),
(13, 3, 'Selma', 'van de', 'Heuvel', '1965-09-24', 'KLant', b'1'),
(14, 4, 'Eva', '', 'Scherder', '2000-04-07', 'KLant', b'1'),
(15, 4, 'Felicia', '', 'Scherder', '2021-11-29', 'KLant', b'0'),
(16, 4, 'Devin', '', 'Scherder', '2023-03-01', 'KLant', b'0'),
(17, 5, 'Frieda', 'de', 'Jong', '1980-09-04', 'KLant', b'1'),
(18, 5, 'Simeon', 'de', 'Jong', '2018-05-03', 'KLant', b'0'),
(19, 6, 'Hanna', 'van der', 'Berg', '1999-09-09', 'KLant', b'1');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;