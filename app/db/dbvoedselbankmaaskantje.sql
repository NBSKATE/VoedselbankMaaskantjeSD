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
  `GezinId` int NOT NULL,
  `Straat` varchar(255) NOT NULL,
  `Huisnummer` varchar(10) NOT NULL,
  `Toevoeging` varchar(255) DEFAULT NULL,
  `Postcode` varchar(10) NOT NULL,
  `Woonplaats` varchar(255) NOT NULL,
  `Email` varchar(255) DEFAULT NULL,
  `Mobiel` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`Id`)
  FOREIGN KEY (`ContactId`) REFERENCES `contact` (`Id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `contactpergezin`
--

DROP TABLE IF EXISTS `contactpergezin`;
CREATE TABLE IF NOT EXISTS `contactpergezin` (
  `Id` int NOT NULL AUTO_INCREMENT,
  `GezinId` int NOT NULL,
  `ContactId` int NOT NULL,
  PRIMARY KEY (`Id`)
  FOREIGN KEY (`GezinId`) REFERENCES `gezin` (`Id`)
  FOREIGN KEY (`ContactId`) REFERENCES `contact` (`Id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `gezin`
--

DROP TABLE IF EXISTS `gezin`;
CREATE TABLE IF NOT EXISTS `gezin` (
  `Id` int NOT NULL AUTO_INCREMENT,
  `Naam` varchar(255) NOT NULL,
  `Code` varchar(255) NOT NULL,
  `Omschrijving` enum('Bijstandsgezin','Alleenstaande','Werkloze') NOT NULL,
  `AantalVolwassenen` int NOT NULL,
  `AantalKinderen` int NOT NULL,
  `AantalBabys` int NOT NULL,
  `TotaalAantalPersonen` int NOT NULL,
  PRIMARY KEY (`Id`)
  FOREIGN KEY (`GezinId`) REFERENCES `gezin` (`Id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `persoon`
--

DROP TABLE IF EXISTS `persoon`;
CREATE TABLE IF NOT EXISTS `persoon` (
  `Id` int NOT NULL AUTO_INCREMENT,
  `GezinId` int NOT NULL,
  `Voornaam` varchar(255) NOT NULL,
  `Tussenvoegsel` varchar(255) DEFAULT NULL,
  `Achternaam` varchar(255) NOT NULL,
  `Geboortedatum` date NOT NULL,
  `TypePersoon` enum('Manager','Medewerker','Vrijwilliger','Klant') NOT NULL,
  `IsVertegenwoordiger` bit('1') NOT NULL,
  PRIMARY KEY (`Id`)
  FOREIGN KEY (`GezinId`) REFERENCES `gezin` (`Id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;