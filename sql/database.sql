CREATE DATABASE App;
USE App;

CREATE TABLE Organizacja(
    id INT PRIMARY KEY NOT NULL AUTO_INCREMENT,
    nazwa VARCHAR(255) NOT NULL,
    nip VARCHAR(13) NOT NULL,
    adres VARCHAR(255) NOT NULL,
    email VARCHAR(50),
    telefon VARCHAR(50)
);

CREATE TABLE Pracownik(
    id INT PRIMARY KEY NOT NULL AUTO_INCREMENT,
    imie VARCHAR(50) NOT NULL,
    nazwisko VARCHAR(50) NOT NULL,
    email VARCHAR(50) NOT NULL,
    telefon VARCHAR(50) NOT NULL,
    nazwa_uzytkownika VARCHAR(50) NOT NULL,
    haslo VARCHAR(255)
);

CREATE TABLE Projekt(
    id INT PRIMARY KEY NOT NULL AUTO_INCREMENT,
    nazwa VARCHAR(255) NOT NULL,

    handlowiec INT NOT NULL,
    CONSTRAINT `handlowiec_id`
        FOREIGN KEY (handlowiec) REFERENCES Pracownik(id)
        ON DELETE RESTRICT
        ON UPDATE CASCADE,

    opiekun INT NOT NULL,
    CONSTRAINT `opiekun_id`
        FOREIGN KEY (opiekun) REFERENCES Pracownik(id)
        ON DELETE RESTRICT
        ON UPDATE CASCADE,

    ksiegowosc INT NOT NULL,
    CONSTRAINT `ksiegowosc_id`
        FOREIGN KEY (ksiegowosc) REFERENCES Pracownik(id)
        ON DELETE RESTRICT
        ON UPDATE CASCADE,

    organizacja INT NOT NULL,
    CONSTRAINT `organizacja_id`
        FOREIGN KEY (organizacja) REFERENCES Organizacja(id)
        ON DELETE RESTRICT
        ON UPDATE CASCADE,

    rozpoczecie DATE NOT NULL,
    planowane_zakonczenie DATE NOT NULL,
    realne_zakonczenie DATE,
    przewidywane_zyski DOUBLE(10, 2) NOT NULL,
    przewidywane_koszta DOUBLE(10, 2) NOT NULL,
    kary_umowne DOUBLE(10, 2) NOT NULL,
    status_realizacji VARCHAR(50) NOT NULL
);

CREATE TABLE Etap(
    id INT PRIMARY KEY NOT NULL AUTO_INCREMENT,

    projekt INT NOT NULL,
    CONSTRAINT `projekt_id`
        FOREIGN KEY (projekt) REFERENCES Projekt(id)
        ON DELETE CASCADE
        ON UPDATE CASCADE,

    nazwa VARCHAR(255) NOT NULL,
    rozpoczecie DATE NOT NULL,
    planowane_zakonczenie DATE NOT NULL,
    realne_zakonczenie DATE,
    etap_koncowy BOOL NOT NULL
);

CREATE TABLE Usluga(
    id INT PRIMARY KEY NOT NULL AUTO_INCREMENT,

    projekt INT NOT NULL,
    CONSTRAINT `usluga_fk_projekt_id`
        FOREIGN KEY (projekt) REFERENCES Projekt(id)
        ON DELETE CASCADE
        ON UPDATE CASCADE,

    nazwa VARCHAR(255) NOT NULL,
    planowane_zakonczenie DATE NOT NULL,
    realne_zakonczenie DATE,
    planowany_koszt DOUBLE(10,2) NOT NULL,
    uwagi VARCHAR(512)
);

CREATE TABLE Koszt(
    id INT PRIMARY KEY NOT NULL AUTO_INCREMENT,

    usluga INT NOT NULL,
    CONSTRAINT `koszt_fk_usluga_id`
        FOREIGN KEY (usluga) REFERENCES Usluga(id)
        ON DELETE CASCADE
        ON UPDATE CASCADE,

    nazwa VARCHAR(255) NOT NULL,
    ilosc DOUBLE(10, 2) NOT NULL,
    wartosc_jednostkowa DOUBLE(10, 2) NOT NULL
);

CREATE TABLE Faktura(
    id INT PRIMARY KEY NOT NULL AUTO_INCREMENT,

    projekt INT NOT NULL,
    CONSTRAINT `faktura_fk_projekt_id`
        FOREIGN KEY (projekt) REFERENCES Projekt(id)
        ON DELETE CASCADE
        ON UPDATE CASCADE,

    data_wystawienia DATE NOT NULL,
    termin_zaplaty DATE NOT NULL,
    realny_termin_zaplaty DATE,
    uniewazniona BOOL NOT NULL,
    uwagi VARCHAR(512)
);

CREATE TABLE PrzedmiotFaktury(
    id INT PRIMARY KEY NOT NULL AUTO_INCREMENT,

    faktura INT NOT NULL,
    CONSTRAINT `przedmiot_faktury_fk_faktura_id`
        FOREIGN KEY (faktura) REFERENCES Faktura(id)
        ON DELETE CASCADE
        ON UPDATE CASCADE,

    nazwa VARCHAR(512) NOT NULL,
    ilosc DOUBLE(10, 2) NOT NULL,
    wartosc_jednostkowa DOUBLE(10, 2) NOT NULL
);