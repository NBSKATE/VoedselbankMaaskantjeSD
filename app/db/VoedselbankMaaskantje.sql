DROP DATABASE IF EXISTS VoedselbankMaaskantje;
CREATE DATABASE VoedselbankMaaskantje;
USE VoedselbankMaaskantje;

DROP DATABASE IF EXISTS VoedselbankMaaskantje;
CREATE DATABASE VoedselbankMaaskantje;
USE VoedselbankMaaskantje;

CREATE TABLE `contact` (
    `Id` INT UNSIGNED NOT NULL AUTO_INCREMENT,
    `Telefoon` INT NOT NULL,
    `Email` VARCHAR(255) NOT NULL,
    `IsActief` BIT NOT NULL,
    `Opmerking` VARCHAR(255) NULL,
    `DatumAangemaakt` DATETIME NOT NULL,
    `DatumGewijzigd` DATETIME NOT NULL,
    PRIMARY KEY (`Id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;





CREATE TABLE `adres` (
    `Id` INT UNSIGNED NOT NULL AUTO_INCREMENT,
    `Straatnaam` VARCHAR(255) NOT NULL,
    `Huisnummer` INT NOT NULL,
    `Toevoeging` VARCHAR(255) NULL,
    `Postcode` VARCHAR(255) NOT NULL,
    `Plaats` VARCHAR(255) NOT NULL,
    `IsActief` BIT NOT NULL,
    `Opmerking` VARCHAR(255) NULL,
    `DatumAangemaakt` DATETIME NOT NULL,
    `DatumGewijzigd` DATETIME NOT NULL,
    PRIMARY KEY (`Id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;





CREATE TABLE `categorie` (
    `Id` INT UNSIGNED NOT NULL AUTO_INCREMENT,
    `Categorieomschrijving` VARCHAR(255) NOT NULL,
    `IsActief` BIT NOT NULL,
    `Opmerking` VARCHAR(255) NULL,
    `DatumAangemaakt` DATETIME NOT NULL,
    `DatumGewijzigd` DATETIME NOT NULL,
    PRIMARY KEY (`Id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;






CREATE TABLE `klant` (
    `Id` INT UNSIGNED NOT NULL AUTO_INCREMENT,
    `Naam` VARCHAR(255) NOT NULL,
	`Tussenvoegsel` VARCHAR(255) NULL,
	`Achternaam` VARCHAR(255) NOT NULL,
    `AdresId` INT UNSIGNED NOT NULL,
    `KlantContactId` INT UNSIGNED NOT NULL,
    `Volwassenen` INT NOT NULL,
    `Kinderen` INT NULL,
    `Babies` INT NULL,
	`Wens` VARCHAR(255) NULL,
    `IsActief` BIT NOT NULL,
    `Opmerking` VARCHAR(255) NULL,
    `DatumAangemaakt` DATETIME NOT NULL,
    `DatumGewijzigd` DATETIME NOT NULL,
    PRIMARY KEY (`Id`),
    FOREIGN KEY (`AdresId`) REFERENCES `adres` (`Id`),
    FOREIGN KEY (`KlantContactId`) REFERENCES `contact` (`Id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;





CREATE TABLE `leverancier` (
    `Id` INT UNSIGNED NOT NULL AUTO_INCREMENT,
    `Bedrijfsnaam` VARCHAR(255) NOT NULL,
    `AdresId` INT UNSIGNED NOT NULL,
    `EerstvolgendeLeveringDatumEnTijd` DATETIME NOT NULL,
    `ContactId` INT UNSIGNED NOT NULL,
    `Btwnummer` VARCHAR(255) NOT NULL,
    `Kvknummer` INT NOT NULL,
    `IsActief` BIT NOT NULL,
    `Opmerking` VARCHAR(255) NULL,
    `DatumAangemaakt` DATETIME NOT NULL,
    `DatumGewijzigd` DATETIME NOT NULL,
    PRIMARY KEY (`Id`),
    FOREIGN KEY (`AdresId`) REFERENCES `adres` (`Id`),
    FOREIGN KEY (`ContactId`) REFERENCES `contact` (`Id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

CREATE TABLE `product` (
    `Id` INT UNSIGNED NOT NULL AUTO_INCREMENT,
    `Productnaam` VARCHAR(255) NOT NULL,
    `CategorieId` INT UNSIGNED NOT NULL,
    `Streepjescode` VARCHAR(255) NOT NULL,
    `Aantal` INT NOT NULL,
    `LeverancierId` INT UNSIGNED NOT NULL,
    `IsActief` BIT NOT NULL,
    `Opmerking` VARCHAR(255) NULL,
    `DatumAangemaakt` DATETIME NOT NULL,
    `DatumGewijzigd` DATETIME NOT NULL,
    PRIMARY KEY (`Id`),
    FOREIGN KEY (`CategorieId`) REFERENCES `categorie` (`Id`),
    FOREIGN KEY (`LeverancierId`) REFERENCES `leverancier` (`Id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

CREATE TABLE `voedselpakket` (
    `Id` INT UNSIGNED NOT NULL AUTO_INCREMENT,
    `KlantId` INT UNSIGNED NOT NULL,
    `Samenstellingsdatum` DATETIME NOT NULL,
    `Uitgiftedatum` DATETIME NOT NULL,
    `IsActief` BIT NOT NULL,
    `Opmerking` VARCHAR(255) NULL,
    `DatumAangemaakt` DATETIME NOT NULL,
    `DatumGewijzigd` DATETIME NOT NULL,
    PRIMARY KEY (`Id`),
    FOREIGN KEY (`KlantId`) REFERENCES `klant` (`Id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

CREATE TABLE `productenVoedselpakket` (
    `Id` INT UNSIGNED NOT NULL AUTO_INCREMENT,
    `ProductId` INT UNSIGNED NOT NULL,
    `Aantal` INT NOT NULL,
    `VoedselpakketId` INT UNSIGNED NOT NULL,
    `IsActief` BIT NOT NULL,
    `Opmerking` VARCHAR(255) NULL,
    `DatumAangemaakt` DATETIME NOT NULL,
    `DatumGewijzigd` DATETIME NOT NULL,
    PRIMARY KEY (`Id`),
    FOREIGN KEY (`ProductId`) REFERENCES `product` (`Id`),
    FOREIGN KEY (`VoedselpakketId`) REFERENCES `voedselpakket` (`Id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;






-- Insert values into the `contact` table
INSERT INTO `contact` (`Telefoon`, `Email`, `IsActief`, `Opmerking`, `DatumAangemaakt`, `DatumGewijzigd`)
VALUES
    (0611111111, 'nummer1@gmail.com', 1, NULL, SYSDATE(), SYSDATE()),
    (0622222222, 'nummer2@gmail.com', 1, NULL, SYSDATE(), SYSDATE()),
    (0633333333, 'nummer3@gmail.com', 1, NULL, SYSDATE(), SYSDATE()),
    (0644444444, 'nummer4@gmail.com', 1, NULL, SYSDATE(), SYSDATE()),
    (0655555555, 'nummer5@gmail.com', 1, NULL, SYSDATE(), SYSDATE()),
    (0666666666, 'nummer6@gmail.com', 1, NULL, SYSDATE(), SYSDATE()),
    (0677777777, 'nummer7@gmail.com', 1, NULL, SYSDATE(), SYSDATE()),
    (0688888888, 'nummer8@gmail.com', 1, NULL, SYSDATE(), SYSDATE()),
    (0699999999, 'nummer9@gmail.com', 1, NULL, SYSDATE(), SYSDATE()),
    (0610101010, 'nummer10@gmail.com', 1, NULL, SYSDATE(), SYSDATE());

-- Insert values into the `adres` table
INSERT INTO `adres` (`Straatnaam`, `Huisnummer`, `Toevoeging`, `Postcode`, `Plaats`, `IsActief`, `Opmerking`, `DatumAangemaakt`, `DatumGewijzigd`)
VALUES
    ('straat1', 11, NULL, '1111AT', 'Utrecht', 1, NULL, SYSDATE(), SYSDATE()),
    ('straat2', 22, 'A', '2222AT', 'Utrecht', 1, NULL, SYSDATE(), SYSDATE()),
    ('straat3', 33, NULL, '3333AT', 'Utrecht', 1, NULL, SYSDATE(), SYSDATE()),
    ('straat4', 44, 'B', '4444AT', 'Utrecht', 1, NULL, SYSDATE(), SYSDATE()),
    ('straat5', 55, NULL, '5555AT', 'Utrecht', 1, NULL, SYSDATE(), SYSDATE()),
    ('straat6', 66, 'C', '6666AT', 'Utrecht', 1, NULL, SYSDATE(), SYSDATE()),
    ('straat7', 77, NULL, '7777AT', 'Utrecht', 1, NULL, SYSDATE(), SYSDATE()),
    ('straat8', 88, 'D', '8888AT', 'Utrecht', 1, NULL, SYSDATE(), SYSDATE()),
    ('straat9', 99, NULL, '9999AT', 'Utrecht', 1, NULL, SYSDATE(), SYSDATE()),
    ('straat10', 100, NULL, '1010AT', 'Utrecht', 1, NULL, SYSDATE(), SYSDATE());

-- Insert values into the `categorie` table
INSERT INTO `categorie` (`Categorieomschrijving`, `IsActief`, `Opmerking`, `DatumAangemaakt`, `DatumGewijzigd`)
VALUES
    ('categorie1', 1, NULL, SYSDATE(), SYSDATE()),
    ('categorie2', 1, NULL, SYSDATE(), SYSDATE()),
    ('categorie3', 1, NULL, SYSDATE(), SYSDATE()),
    ('categorie4', 1, NULL, SYSDATE(), SYSDATE()),
    ('categorie5', 1, NULL, SYSDATE(), SYSDATE());

-- Insert values into the `klant` table
INSERT INTO `klant` (`Naam`, `Tussenvoegsel`, `Achternaam`, `AdresId`, `KlantContactId`, `Volwassenen`, `Kinderen`, `Babies`, `Wens`, `IsActief`, `Opmerking`, `DatumAangemaakt`, `DatumGewijzigd`)
VALUES
    ('klant1', NULL, 'achternaam1', 1, 1, 2, 1, 0,'geen varkensvlees', 1, NULL, SYSDATE(), SYSDATE()),
    ('klant2', NULL, 'achternaam2', 2, 2, 1, 0, 0,'allergie pindas ', 1, NULL, SYSDATE(), SYSDATE()),
    ('klant3', 'van der', 'achternaam3', 3, 3, 2, 2, 1,'vegetarisch', 1, NULL, SYSDATE(), SYSDATE()),
    ('klant4', NULL, 'achternaam4', 4, 4, 2, 0, 0, NULL, 1, NULL, SYSDATE(), SYSDATE()),
    ('klant5', 'zo', 'achternaam5', 5, 5, 1, 0, 1,'Veganistisch', 1, NULL, SYSDATE(), SYSDATE());

-- Insert values into the `leverancier` table
INSERT INTO `leverancier` (`Bedrijfsnaam`, `AdresId`, `EerstvolgendeLeveringDatumEnTijd`, `ContactId`, `Btwnummer`, `Kvknummer`, `IsActief`, `Opmerking`, `DatumAangemaakt`, `DatumGewijzigd`)
VALUES
    ('leverancier1', 6, '2023-06-20 10:00:00', 6, 'NL123456789B01', 12345678, 1, NULL, SYSDATE(), SYSDATE()),
    ('leverancier2', 7, '2023-06-21 12:00:00', 7, 'NL987654321B01', 87654321, 1, NULL, SYSDATE(), SYSDATE()),
    ('leverancier3', 8, '2023-06-22 09:30:00', 8, 'NL246813579B01', 24681357, 1, NULL, SYSDATE(), SYSDATE()),
    ('leverancier4', 9, '2023-06-23 14:15:00', 9, 'NL135792468B01', 13579246, 1, NULL, SYSDATE(), SYSDATE()),
    ('leverancier5', 10, '2023-06-24 11:45:00', 10, 'NL864209753B01', 86420975, 1, NULL, SYSDATE(), SYSDATE());

-- Insert values into the `product` table
INSERT INTO `product` (`Productnaam`, `CategorieId`, `Streepjescode`, `Aantal`, `LeverancierId`, `IsActief`, `Opmerking`, `DatumAangemaakt`, `DatumGewijzigd`)
VALUES
    ('product1', 1, '123456789', 10, 1, 1, NULL, SYSDATE(), SYSDATE()),
    ('product2', 2, '987654321', 20, 2, 1, NULL, SYSDATE(), SYSDATE()),
    ('product3', 3, '246813579', 15, 3, 1, NULL, SYSDATE(), SYSDATE()),
    ('product4', 4, '135792468', 30, 4, 1, NULL, SYSDATE(), SYSDATE()),
    ('product5', 5, '864209753', 25, 5, 1, NULL, SYSDATE(), SYSDATE());

-- Insert values into the `voedselpakket` table
INSERT INTO `voedselpakket` (`KlantId`, `Samenstellingsdatum`, `Uitgiftedatum`, `IsActief`, `Opmerking`, `DatumAangemaakt`, `DatumGewijzigd`)
VALUES
    (1, '2023-06-20 10:00:00', '2023-06-21 10:00:00', 1, NULL, SYSDATE(), SYSDATE()),
    (2, '2023-06-21 12:00:00', '2023-06-22 12:00:00', 1, NULL, SYSDATE(), SYSDATE()),
    (3, '2023-06-22 09:30:00', '2023-06-23 09:30:00', 1, NULL, SYSDATE(), SYSDATE()),
    (4, '2023-06-23 14:15:00', '2023-06-24 14:15:00', 1, NULL, SYSDATE(), SYSDATE()),
    (5, '2023-06-24 11:45:00', '2023-06-25 11:45:00', 1, NULL, SYSDATE(), SYSDATE());

-- Insert values into the `productenVoedselpakket` table
INSERT INTO `productenVoedselpakket` (`ProductId`, `Aantal`, `VoedselpakketId`, `IsActief`, `Opmerking`, `DatumAangemaakt`, `DatumGewijzigd`)
VALUES
    (1, 2, 1, 1, NULL, SYSDATE(), SYSDATE()),
    (2, 3, 1, 1, NULL, SYSDATE(), SYSDATE()),
    (3, 1, 2, 1, NULL, SYSDATE(), SYSDATE()),
    (4, 2, 2, 1, NULL, SYSDATE(), SYSDATE()),
    (5, 1, 3, 1, NULL, SYSDATE(), SYSDATE());