-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Gegenereerd op: 22 jun 2023 om 07:39
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
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=latin1;

--
-- Gegevens worden geëxporteerd voor tabel `contact`
--

INSERT INTO `contact` (`Id`, `ContactId`, `Straat`, `Huisnummer`, `Toevoeging`, `Postcode`, `Woonplaats`, `Email`, `Mobiel`) VALUES
(1, 1, 'Prinses Irenestraat', '12', 'A', '5271TH', 'Maaskantje', 'j.van.zevenhuizen@gmail.com', '+31623456123'),
(2, 2, 'Gibraltarstraat', '234', '', '5271TJ', 'Maaskantje', 'a.bergkamp@hotmail.com', '+31623456123'),
(3, 3, 'Der Kinderenstraat', '456', 'Bis', '5271TH', 'Maaskantje', 's.van.de.heuvel@gmail.com', '+31623456123'),
(4, 4, 'Nachtegaalstraat', '233', 'A', '5271TJ', 'Maaskantje', 'e.scherder@gmail.com', '+31623456123'),
(5, 5, 'Bertram Russellstraat', '45', '', '5271TH', 'Maaskantje', 'f.de.jong@hotmail.com', '+31623456123'),
(6, 6, 'Leonardo Da VinciHof', '34', '', '5271ZE', 'Maaskantje', 'h.van.der.berg@gmail.com', '+31623456123'),
(7, 7, 'Siegfried Knutsenlaan', '234', '', '5271ZE', 'Maaskantje', 'r.ter.weijden@ah.nl', '+31623456123'),
(8, 8, 'Theo de Bokstraat', '256', '', '5271ZH', 'Maaskantje', 'l.pastoor@gmail.com', '+31623456123'),
(9, 9, 'Meester van Leerhof', '2', 'A', '5271ZH', 'Maaskantje', 'm.yazidi@gemeenteutrecht.nl', '+31623456123'),
(10, 10, 'Van Wemelenplantsoen', '300', '', '5271TH', 'Maaskantje', 'b.van.driel@gmail.com', '+31623456123'),
(11, 11, 'Terlingenhof', '20', '', '5271TH', 'Maaskantje', 'j.pastorius@gmail.com', '+31623456356'),
(12, 12, '31', '', '5271ZE', '', 'Maaskantje', 's.dollaard@gmail.com', '+31 623452314'),
(13, 13, 'ScheringaDreef', '37', '', '5271ZE', 'Vught', 'j.blokker@gemeentevught.nl', '+31623452314');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `contactpergezin`
--

DROP TABLE IF EXISTS `contactpergezin`;
CREATE TABLE IF NOT EXISTS `contactpergezin` (
  `Id` int NOT NULL AUTO_INCREMENT,
  `GezinId` int UNSIGNED NOT NULL,
  `ContactId` int UNSIGNED NOT NULL,
  PRIMARY KEY (`Id`)
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
(1, 1, 'ZevenhuizenGezin', 'G0001', 'Bijstandsgezin', 2, 2, 0, 4),
(2, 2, 'BergkampGezin', 'G0002', 'Bijstandsgezin', 2, 1, 1, 4),
(3, 3, 'HeuvelGezin', 'G0003', 'Bijstandsgezin', 2, 0, 0, 2),
(4, 4, 'SchrederGezin', 'G0004', 'Bijstandsgezin', 1, 0, 2, 3),
(5, 5, 'DeJongGezin', 'G0005', 'Bijstandsgezin', 1, 1, 0, 2),
(6, 6, 'VanDerBergGezin', 'G0006', 'Alleenstaande', 1, 0, 0, 1);

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `persoon`
--

DROP TABLE IF EXISTS `persoon`;
CREATE TABLE IF NOT EXISTS `persoon` (
  `Id` int NOT NULL AUTO_INCREMENT,
  `GezinId` int UNSIGNED NOT NULL,
  `Voornaam` varchar(255) NOT NULL,
  `Tussenvoegsel` varchar(255) NOT NULL,
  `Achternaam` varchar(255) NOT NULL,
  `Geboortedatum` date NOT NULL,
  `TypePersoon` enum('Manager','Medewerker','Vrijwilliger','KLant') NOT NULL,
  `IsVertegenwoordig` enum('Ja','Nee') NOT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=latin1;

--
-- Gegevens worden geëxporteerd voor tabel `persoon`
--

INSERT INTO `persoon` (`Id`, `GezinId`, `Voornaam`, `Tussenvoegsel`, `Achternaam`, `Geboortedatum`, `TypePersoon`, `IsVertegenwoordig`) VALUES
(1, 0, 'Hans', 'van', 'Leeuwen', '1958-02-12', 'Manager', b'0'),
(2, 0, 'Jan', 'van der', 'Sluijs', '1993-04-30', 'Medewerker', b'0'),
(3, 0, 'Herman', 'den', 'Duiker', '1989-08-30', 'Vrijwilliger', b'0'),
(4, 1, 'Johan', 'van', 'Zevenhuizen', '1990-05-20', 'KLant', b'Ja'),
(5, 1, 'Sarah', 'den', 'Dolder', '1985-03-23', 'KLant', b'Nee'),
(6, 1, 'Theo', 'van', 'Zevenhuizen', '2015-03-08', 'KLant', b'Nee'),
(7, 1, 'Jantien', 'van', 'Zevenhuizen', '2016-09-20', 'KLant', b'Nee'),
(8, 2, 'Arjan', '', 'Bergkamp', '1968-07-12', 'KLant', b'Ja'),
(9, 2, 'Janneke', '', 'Sanders', '1969-05-11', 'KLant', b'Nee'),
(10, 2, 'Stein', '', 'Bergkamp', '2009-02-02', 'KLant', b'Nee'),
(11, 2, 'Judith', '', 'Bergkamp', '2022-02-05', 'KLant', b'Nee'),
(12, 3, 'Mazin', 'van', 'Vliet', '1968-08-18', 'KLant', b'Nee'),
(13, 3, 'Selma', 'van de', 'Heuvel', '1965-09-24', 'KLant', b'Ja'),
(14, 4, 'Eva', '', 'Scherder', '2000-04-07', 'KLant', b'Ja'),
(15, 4, 'Felicia', '', 'Scherder', '2021-11-29', 'KLant', b'Nee'),
(16, 4, 'Devin', '', 'Scherder', '2023-03-01', 'KLant', b'Nee'),
(17, 5, 'Frieda', 'de', 'Jong', '1980-09-04', 'KLant', b'Ja'),
(18, 5, 'Simeon', 'de', 'Jong', '2018-05-03', 'KLant', b'Nee'),
(19, 6, 'Hanna', 'van der', 'Berg', '1999-09-09', 'KLant', b'Ja');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
