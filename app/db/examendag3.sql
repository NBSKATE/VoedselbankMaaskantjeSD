CREATE DATABASE IF NOT EXISTS examendag3;
USE examendag3;

-- Tabel Gezin
CREATE TABLE Gezin (
  Id INT NOT NULL AUTO_INCREMENT,
  Straatnaam VARCHAR(255) NOT NULL,
  Huisnummer INT NOT NULL,
  Toevoeging VARCHAR(255),
  Postcode VARCHAR(255) NOT NULL,
  Plaats VARCHAR(255) NOT NULL,
  Telefoonnummer VARCHAR(255),
  Emailadres VARCHAR(255),
  IsActief BOOLEAN,
  Opmerking VARCHAR(255) NULL,
  DatumAangemaakt DATETIME NOT NULL,
  DatumGewijzigd DATETIME NOT NULL,
  PRIMARY KEY (Id)
);

-- Tabel Persoon
CREATE TABLE Persoon (
  Id INT NOT NULL AUTO_INCREMENT,
  GezinId INT NOT NULL,
  Voornaam VARCHAR(255) NOT NULL,
  Tussenvoegsel VARCHAR(255),
  Achternaam VARCHAR(255) NOT NULL,
  Geboortedatum DATE NOT NULL,
  TypePersoon VARCHAR(255) NOT NULL,
  IsVertegenwoordiger BOOLEAN,
  IsActief BOOLEAN,
  Opmerking VARCHAR(255) NULL,
  DatumAangemaakt DATETIME NOT NULL
  DatumGewijzigd DATETIME NOT NULL,
  PRIMARY KEY (Id),
  FOREIGN KEY (GezinId) REFERENCES Gezin(Id)
);

-- Tabel Eetwens
CREATE TABLE Eetwens (
  Id INT NOT NULL AUTO_INCREMENT,
  Naam VARCHAR(255) NOT NULL,
  Omschrijving VARCHAR(255) NOT NULL,
  IsActief BOOLEAN,
  Opmerking VARCHAR(255) NULL,
  DatumAangemaakt DATETIME NOT NULL,
  DatumGewijzigd DATETIME NOT NULL,
  PRIMARY KEY (Id)
);

-- Tabel EetwensPerGezin
CREATE TABLE EetwensPerGezin (
  Id INT NOT NULL AUTO_INCREMENT,
  GezinId INT NOT NULL,
  EetwensId INT NOT NULL,
  IsActief BOOLEAN,
  Opmerking VARCHAR(255) NULL,
  DatumAangemaakt DATETIME NOT NULL,
  DatumGewijzigd DATETIME NOT NULL,
  PRIMARY KEY (Id),
  FOREIGN KEY (GezinId) REFERENCES Gezin(Id),
  FOREIGN KEY (EetwensId) REFERENCES Eetwens(Id)
);

-- Tabel Voedselpakket
CREATE TABLE Voedselpakket (
  Id INT NOT NULL AUTO_INCREMENT,
  GezinId INT NOT NULL,
  -- Other columns for Voedselpakket
  PRIMARY KEY (Id),
  FOREIGN KEY (GezinId) REFERENCES Gezin(Id)
);

-- Tabel Product
CREATE TABLE Product (
  Id INT NOT NULL AUTO_INCREMENT,
  Naam VARCHAR(255) NOT NULL,
  -- Other columns for Product
  PRIMARY KEY (Id)
);

-- Tabel ProductPerVoedselpakket
CREATE TABLE ProductPerVoedselpakket (
  Id INT NOT NULL AUTO_INCREMENT,
  VoedselpakketId INT NOT NULL,
  ProductId INT NOT NULL,
  Aantal INT NOT NULL,
  -- Other columns for ProductPerVoedselpakket
  PRIMARY KEY (Id),
  FOREIGN KEY (VoedselpakketId) REFERENCES Voedselpakket(Id),
  FOREIGN KEY (ProductId) REFERENCES Product(Id)
);

-- Tabel Maaltijd
CREATE TABLE Maaltijd (
  Id INT NOT NULL AUTO_INCREMENT,
  Naam VARCHAR(255) NOT NULL,
  -- Other columns for Maaltijd
  PRIMARY KEY (Id)
);

-- Tabel MaaltijdPerPersoon
CREATE TABLE MaaltijdPerPersoon (
  Id INT NOT NULL AUTO_INCREMENT,
  PersoonId INT NOT NULL,
  MaaltijdId INT NOT NULL,
  Datum DATE NOT NULL,
  -- Other columns for MaaltijdPerPersoon
  PRIMARY KEY (Id),
  FOREIGN KEY (PersoonId) REFERENCES Persoon(Id),
  FOREIGN KEY (MaaltijdId) REFERENCES Maaltijd(Id)
);