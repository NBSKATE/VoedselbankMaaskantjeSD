DROP DATABASE IF EXISTS Voedselbank;
CREATE DATABASE Voedselbank;
USE Voedselbank;

CREATE TABLE Contact (
    `Id` INT UNSIGNED AUTO_INCREMENT,
    `Straat` VARCHAR(255) NOT NULL,
    `Huisnummer` INT NOT NULL,
    `Toevoeging` VARCHAR(255) NULL,
    `Postcode` VARCHAR(10) NOT NULL,
    `Woonplaats` VARCHAR(255) NOT NULL,
    `Email` VARCHAR(255) NOT NULL,
    `Mobiel` INT NOT NULL,
    `IsActief` BIT NOT NULL,
    `Opmerking` VARCHAR(255) NULL,
    `DatumAangemaakt` DATETIME NOT NULL,
    `DatumGewijzigd` DATETIME NOT NULL,
    PRIMARY KEY (`Id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

CREATE TABLE Product (
    `Id` INT UNSIGNED AUTO_INCREMENT NOT NULL,
    `ProductCategorieId` INT UNSIGNED NULL,
    `Naam` VARCHAR(255) NOT NULL,
    `SoortAllergie` VARCHAR(255) NULL,
    `Barcode` BIGINT NOT NULL,
    `Houdbaarheidsdatum` DATE NOT NULL,
    `Omschrijving` VARCHAR(255) NOT NULL,
    `Status` VARCHAR(255) NOT NULL,
    `IsActief` BIT NOT NULL,
    `Opmerking` VARCHAR(255) NULL,
    `DatumAangemaakt` DATETIME NOT NULL,
    `DatumGewijzigd` DATETIME NOT NULL,
    PRIMARY KEY (`Id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

CREATE TABLE Leverancier (
    `Id` INT UNSIGNED AUTO_INCREMENT NOT NULL,
    `Naam` VARCHAR(255) NOT NULL,
    `ContactPersoon` VARCHAR(255) NOT NULL,
    `LeverancierNummer` VARCHAR(5) NOT NULL,
    `LeverancierType` VARCHAR(255) NOT NULL,
    `IsActief` BIT NOT NULL,
    `Opmerking` VARCHAR(255) NULL,
    `DatumAangemaakt` DATETIME NOT NULL,
    `DatumGewijzigd` DATETIME NOT NULL,
    PRIMARY KEY (`Id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

CREATE TABLE ContactPerLeverancier (
    `Id` INT UNSIGNED AUTO_INCREMENT NOT NULL,
    `LeverancierId` INT UNSIGNED NOT NULL,
    `ContactId` INT UNSIGNED NOT NULL,
    `IsActief` BIT NOT NULL,
    `Opmerking` VARCHAR(255) NULL,
    `DatumAangemaakt` DATETIME NOT NULL,
    `DatumGewijzigd` DATETIME NOT NULL,
    PRIMARY KEY (`Id`),
    FOREIGN KEY(`LeverancierId`) REFERENCES `Leverancier`(`Id`),
    FOREIGN KEY(`ContactId`) REFERENCES `Contact`(`Id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

CREATE TABLE ProductPerLeverancier (
    `Id` INT UNSIGNED AUTO_INCREMENT NOT NULL,
    `LeverancierId` INT UNSIGNED NOT NULL,
    `ProductId` INT UNSIGNED NOT NULL,
    `DatumAangeleverd` DATE NOT NULL,
    `DatumEerstVolgendeLevering` DATE NOT NULL,
    `IsActief` BIT NOT NULL,
    `Opmerking` VARCHAR(255) NULL,
    `DatumAangemaakt` DATETIME NOT NULL,
    `DatumGewijzigd` DATETIME NOT NULL,
    PRIMARY KEY (`Id`),
    FOREIGN KEY(`LeverancierId`) REFERENCES `Leverancier`(`Id`),
    FOREIGN KEY(`ProductId`) REFERENCES `Product`(`Id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;





use Voedselbank;

INSERT INTO Contact (Straat, Huisnummer, Toevoeging, Postcode, Woonplaats, Email, Mobiel, IsActief, Opmerking, DatumAangemaakt, DatumGewijzigd)
VALUES
('Prinses Irenestraat', 12, 'A', '5271TH', 'Maaskantje', 'j.van.zevenhuizen@gmail.com', '0623456123', 1, NULL, SYSDATE(), SYSDATE()),
('Gibraltarstraat', 234, NULL, '5271TJ', 'Maaskantje', 'a.bergkamp@hotmail.com', '0623456123', 1, NULL, SYSDATE(), SYSDATE()),
('Der Kinderenstraat', 456, 'Bis', '5271TH', 'Maaskantje', 's.van.de.heuvel@gmail.com', '0623456123', 1, NULL, SYSDATE(), SYSDATE()),
('Nachtegaalstraat', 233, 'A', '5271TJ', 'Maaskantje', 'e.scherder@gmail.com', '0623456123', 1, NULL, SYSDATE(), SYSDATE()),
('Bertram Russellstraat', 45, NULL, '5271TH', 'Maaskantje', 'f.de.jong@hotmail.com', '0623456123', 1, NULL, SYSDATE(), SYSDATE()),
('Leonardo Da VinciHof', 34, NULL, '5271ZE', 'Maaskantje', 'h.van.der.berg@gmail.com', '0623456123', 1, NULL, SYSDATE(), SYSDATE()),
('Siegfried Knutsenlaan', 234, NULL, '5271ZE', 'Maaskantje', 'r.ter.weijden@ah.nl', '0623456123', 1, NULL, SYSDATE(), SYSDATE()),
('Theo de Bokstraat', 256, NULL, '5271ZH', 'Maaskantje', 'l.pastoor@gmail.com', '0623456123', 1, NULL, SYSDATE(), SYSDATE()),
('Meester van Leerhof', 2, 'A', '5271ZH', 'Maaskantje', 'm.yazidi@gemeenteutrecht.nl', '0623456123', 1, NULL, SYSDATE(), SYSDATE()),
('Van Wemelenplantsoen', 300, NULL, '5271TH', 'Maaskantje', 'b.van.driel@gmail.com', '0623456123', 1, NULL, SYSDATE(), SYSDATE()),
('Terlingenhof', 20, NULL, '5271TH', 'Maaskantje', 'j.pastorius@gmail.com', '0623456356', 1, NULL, SYSDATE(), SYSDATE()),
('Veldhoen', 31, NULL, '5271ZE', 'Maaskantje', 's.dollaard@gmail.com', '0623452314', 1, NULL, SYSDATE(), SYSDATE()),
('ScheringaDreef', 37, NULL, '5271ZE', 'Vught', 'j.blokker@gemeentevught.nl', '0623452314', 1, NULL, SYSDATE(), SYSDATE());


INSERT INTO Product (ProductCategorieId, Naam, SoortAllergie, Barcode, Houdbaarheidsdatum, Omschrijving, Status, IsActief, Opmerking, DatumAangemaakt, DatumGewijzigd)
VALUES
(1, 'Aardappel', NULL, '8719587321239', '2023-06-12', 'Kruimige aardappel', 'OpVoorraad', 1, NULL, SYSDATE(), SYSDATE()),
(1, 'Ui', NULL, '8719437321335', '2023-05-02', 'Gele ui', 'NietOpVoorraad', 1, NULL, SYSDATE(), SYSDATE()),
(1, 'Appel', NULL, '8719486321332', '2023-09-16', 'Granny Smith', 'NietLeverbaar', 1, NULL, SYSDATE(), SYSDATE()),
(1, 'Banaan', 'Banaan', '8719484321336', '2023-04-12', 'Biologische Banaan', 'OverHoudbaarheidsDatum', 1, NULL, SYSDATE(), SYSDATE()),
(2, 'Kaas', 'Lactose', '8719487421338', '2023-07-19', 'Jonge Kaas', 'OpVoorraad', 1, NULL, SYSDATE(), SYSDATE()),
(2, 'Rosbief', NULL, '8719487421331', '2023-08-23', 'Rundvlees', 'OpVoorraad', 1, NULL, SYSDATE(), SYSDATE()),
(3, 'Melk', 'Lactose', '8719447321332', '2023-08-23', 'Halfvolle melk', 'OpVoorraad', 1, NULL, SYSDATE(), SYSDATE()),
(3, 'Margarine', NULL, '8719486321336', '2023-07-02', 'Plantaardige boter', 'OpVoorraad', 1, NULL, SYSDATE(), SYSDATE()),
(3, 'Ei', 'Eier', '8719487421334', '2023-02-04', 'Scharrelei', 'OpVoorraad', 1, NULL, SYSDATE(), SYSDATE()),
(4, 'Brood', 'Gluten', '8719487721337', '2023-05-07', 'Volkoren brood', 'OpVoorraad', 1, NULL, SYSDATE(), SYSDATE()),
(4, 'Gevulde Koek', 'Amandel', '8719483321333', '2023-05-04', 'Banketbakkers kwaliteit', 'OpVoorraad', 1, NULL, SYSDATE(), SYSDATE()),
(5, 'Fristi', 'Lactose', '8719487121331', '2023-05-28', 'Frisdrank', 'NietOpVoorraad', 1, NULL, SYSDATE(), SYSDATE()),
(5, 'Appelsap', NULL, '8719487521335', '2023-05-19', '100% vruchtensap', 'OpVoorraad', 1, NULL, SYSDATE(), SYSDATE()),
(5, 'Koffie', 'Caffeïne', '8719487381338', '2023-05-23', 'Arabica koffie', 'OverHoudbaarheidsDatum', 1, NULL, SYSDATE(), SYSDATE()),
(5, 'Thee', 'Theïne', '8719487329339', '2023-04-02', 'Ceylon thee', 'OpVoorraad', 1, NULL, SYSDATE(), SYSDATE()),
(6, 'Pasta', 'Gluten', '8719487321334', '2023-05-16', 'Macaroni', 'NietLeverbaar', 1, NULL, SYSDATE(), SYSDATE()),
(6, 'Rijst', NULL, '8719487331332', '2023-05-25', 'Basmati Rijst', 'OpVoorraad', 1, NULL, SYSDATE(), SYSDATE()),
(6, 'Knorr Nasi Mix', NULL, '8719487351354', '2023-05-13', 'Nasi kruiden', 'OpVoorraad', 1, NULL, SYSDATE(), SYSDATE()),
(7, 'Tomatensoep', NULL, '8719487371337', '2023-05-23', 'Romige tomatensoep', 'OpVoorraad', 1, NULL, SYSDATE(), SYSDATE()),
(7, 'Tomatensaus', NULL, '8719487341334', '2023-05-21', 'Pizza saus', 'NietOpVoorraad', 1, NULL, SYSDATE(), SYSDATE()),
(7, 'Peterselie', NULL, '8719487321636', '2023-05-31', 'Verse kruidenpot', 'OpVoorraaad', 1, NULL, SYSDATE(), SYSDATE()),
(8, 'Olie', NULL, '8719487327337', '2023-05-27', 'Olijfolie', 'OpVoorraad', 1, NULL, SYSDATE(), SYSDATE()),
(8, 'Mars', NULL, '8719487324334', '2023-05-11', 'Snoep', 'OpVoorraad', 1, NULL, SYSDATE(), SYSDATE()),
(8, 'Biscuit', NULL, '8719487311331', '2023-05-07', 'San Francisco biscuit', 'OpVoorraad', 1, NULL, SYSDATE(), SYSDATE()),
(8, 'Paprika Chips', NULL, '8719487321839', '2023-05-22', 'Ribbelchips paprika', 'OpVoorraad', 1, NULL, SYSDATE(), SYSDATE()),
(8, 'Chocolade reep', 'Cacoa', '8719487321533', '2023-05-21', 'Tony Chocolonely', 'OpVoorraad', 1, NULL, SYSDATE(), SYSDATE()),
(9, 'Luier', NULL, '8719487321436', '2023-05-30', 'Baby luier', 'OpVoorraad', 1, NULL, SYSDATE(), SYSDATE()),
(9, 'Scheerschuim', NULL, '8719487323338', '2023-02-22', 'Verzorgende scheerschuim', 'OpVoorraad', 1, NULL, SYSDATE(), SYSDATE()),
(9, 'Toiletpapier', NULL, '8719487321535', '2023-01-02', '24 rollen 3 laags toiletpapier', 'OpVoorraad', 1, NULL, SYSDATE(), SYSDATE());


INSERT INTO Leverancier (Naam, ContactPersoon, LeverancierNummer, LeverancierType, IsActief, Opmerking, DatumAangemaakt, DatumGewijzigd)
VALUES 
    ('Albert Heijn', 'Ruud ter Weijden', 'L0001', 'Bedrijf', true, NULL, SYSDATE(), SYSDATE()),
    ('Albertus Kerk', 'Leo Pastoor', 'L0002', 'Instelling', true, NULL, SYSDATE(), SYSDATE()),
    ('Gemeente Utrecht', 'Mohammed Yazidi', 'L0003', 'Overheid', true, NULL, SYSDATE(), SYSDATE()),
    ('Boerderij Meerhoven', 'Bertus van Driel', 'L0004', 'Particulier', true, NULL, SYSDATE(), SYSDATE()),
    ('Jan van der Heijden', 'Jan van der Heijden', 'L0005', 'Donor', true, NULL, SYSDATE(), SYSDATE()),
    ('Vomar', 'Jaco Pastorius', 'L0006', 'Bedrijf', true, NULL, SYSDATE(), SYSDATE()),
    ('DekaMarkt', 'Sil den Dollaard', 'L0007', 'Bedrijf', true, NULL, SYSDATE(), SYSDATE()),
    ('Gemeente Vught', 'Jan Blokker', 'L0008', 'Overheid', true, NULL, SYSDATE(), SYSDATE());


INSERT INTO ContactPerLeverancier (LeverancierId, ContactId, IsActief, Opmerking, DatumAangemaakt, DatumGewijzigd)
VALUES 
    (1, 1, true, NULL, SYSDATE(), SYSDATE()),
    (2, 2, true, NULL, SYSDATE(), SYSDATE()),
    (3, 3, true, NULL, SYSDATE(), SYSDATE()),
    (4, 4, true, NULL, SYSDATE(), SYSDATE()),
    (5, 6, true, NULL, SYSDATE(), SYSDATE()),
    (6, 7, true, NULL, SYSDATE(), SYSDATE()),
    (7, 8, true, NULL, SYSDATE(), SYSDATE());


INSERT INTO ProductPerLeverancier (LeverancierId, ProductId, DatumAangeleverd, DatumEerstVolgendeLevering, IsActief, Opmerking, DatumAangemaakt, DatumGewijzigd)
VALUES
    (4,1, '2023-04-12', '2023-05-12', true, NULL, SYSDATE(), SYSDATE()),
    (4,2, '2023-03-02', '2023-04-02', true, NULL, SYSDATE(), SYSDATE()),
    (2,3, '2023-07-16', '2023-08-16', true, NULL, SYSDATE(), SYSDATE()),
    (1,4, '2023-02-12', '2023-03-12', true, NULL, SYSDATE(), SYSDATE()),
    (4,5, '2023-05-19', '2023-06-19', true, NULL, SYSDATE(), SYSDATE()),
    (1,6, '2023-06-23', '2023-07-23', true, NULL, SYSDATE(), SYSDATE()),
    (4,7, '2023-06-20', '2023-07-20', true, NULL, SYSDATE(), SYSDATE()),
    (4,8, '2023-05-02', '2023-06-02', true, NULL, SYSDATE(), SYSDATE()),
    (4,9, '2022-12-04', '2023-01-04', true, NULL, SYSDATE(), SYSDATE()),
    (3,10, '2023-03-07', '2023-04-07', true, NULL, SYSDATE(), SYSDATE()),
    (3,11, '2023-02-04', '2023-03-04', true, NULL, SYSDATE(), SYSDATE()),
    (3,12, '2023-02-28', '2023-03-28', true, NULL, SYSDATE(), SYSDATE()),
    (3,13, '2023-03-19', '2023-04-19', true, NULL, SYSDATE(), SYSDATE()),
    (2,14, '2023-03-23', '2023-04-23', true, NULL, SYSDATE(), SYSDATE()),
    (2,15, '2023-02-02', '2023-03-02', true, NULL, SYSDATE(), SYSDATE()),
    (1,16, '2023-02-16', '2023-03-16', true, NULL, SYSDATE(), SYSDATE()),
    (1,17, '2023-03-25', '2023-04-25', true, NULL, SYSDATE(), SYSDATE()),
    (1,18, '2023-03-13', '2023-04-13', true, NULL, SYSDATE(), SYSDATE()),
    (1,19, '2023-03-23', '2023-04-23', true, NULL, SYSDATE(), SYSDATE()),
    (4,20, '2023-02-21', '2023-03-21', true, NULL, SYSDATE(), SYSDATE()),
    (2,21, '2023-03-31', '2023-04-30', true, NULL, SYSDATE(), SYSDATE()),
    (1,22, '2023-03-27', '2023-04-27', true, NULL, SYSDATE(), SYSDATE()),
    (3,23, '2023-04-11', '2023-04-18', true, NULL, SYSDATE(), SYSDATE()),
    (3,24, '2023-04-07', '2023-04-14', true, NULL, SYSDATE(), SYSDATE()),
    (1,25, '2023-05-07', '2023-05-14', true, NULL, SYSDATE(), SYSDATE()),
    (2,26, '2023-05-05', '2023-05-12', true, NULL, SYSDATE(), SYSDATE()),
    (1,27, '2023-05-02', '2023-05-09', true, NULL, SYSDATE(), SYSDATE()),
    (4,28, '2022-12-22', '2023-01-22', true, NULL, SYSDATE(), SYSDATE()),
    (4,29, '2022-12-12', '2023-01-19', true, NULL, SYSDATE(), SYSDATE());
