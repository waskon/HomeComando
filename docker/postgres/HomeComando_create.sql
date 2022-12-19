-- DROP TABLE IF EXISTS Announcement
-- DROP TABLE IF EXISTS Announcement_Details
-- DROP TABLE IF EXISTS Announcement_Location
-- DROP TABLE IF EXISTS User
-- tables
-- Table: Announcement

-- Table: Announcement_Location
CREATE TABLE Announcement_Location
(
    location_Id  SERIAL       NOT NULL,
    street       varchar(200) NOT NULL,
    house_number varchar(10)  NOT NULL,
    flat_number  varchar(10)  NULL,
    postal_code  varchar(6)   NOT NULL,
    country      varchar(200) NOT NULL,
    CONSTRAINT Announcement_Location_pk PRIMARY KEY (location_Id)
);

CREATE TABLE Announcement
(
    ann_Id  SERIAL      NOT NULL,
    User_Id int         NOT NULL,
    type    varchar(50) NOT NULL,
    purpose varchar(50) NOT NULL,
    CONSTRAINT Announcement_pk PRIMARY KEY (ann_Id)
);

-- Table: Announcement_Details
CREATE TABLE Announcement_Details
(
    details_Id                        SERIAL         NOT NULL,
    title                             varchar(200)   NOT NULL,
    description                       varchar(2000)  NOT NULL,
    image                             varchar(200)   NOT NULL,
    price                             numeric(10, 2) NOT NULL,
    size                              numeric(10, 2) NOT NULL,
    phone_number                      varchar(15)    NOT NULL,
    Announcement_ann_Id               int            NOT NULL,
    Announcement_Location_location_Id int            NOT NULL,
    CONSTRAINT Announcement_Details_pk PRIMARY KEY (details_Id)
);

-- Table: User
CREATE TABLE User_data
(
    User_Id  SERIAL       NOT NULL,
    name     varchar(100) NOT NULL,
    surname  varchar(100) NOT NULL,
    email    varchar(200) NOT NULL,
    country  varchar(100) NOT NULL,
    password varchar(200) NOT NULL,
    CONSTRAINT User_data_pk PRIMARY KEY (User_Id)
);

-- foreign keys
-- Reference: Announcement_Details_Announcement (table: Announcement_Details)
ALTER TABLE Announcement_Details
    ADD CONSTRAINT Announcement_Details_Announcement
        FOREIGN KEY (Announcement_ann_Id)
            REFERENCES Announcement (ann_Id)
            NOT DEFERRABLE
                INITIALLY IMMEDIATE
;

-- Reference: Announcement_Details_Announcement_Location (table: Announcement_Details)
ALTER TABLE Announcement_Details
    ADD CONSTRAINT Announcement_Details_Announcement_Location
        FOREIGN KEY (Announcement_Location_location_Id)
            REFERENCES Announcement_Location (location_Id)
            NOT DEFERRABLE
                INITIALLY IMMEDIATE
;

-- Reference: Announcement_User (table: Announcement)
ALTER TABLE Announcement
    ADD CONSTRAINT Announcement_User
        FOREIGN KEY (User_Id)
            REFERENCES User_data (User_Id)
            NOT DEFERRABLE
                INITIALLY IMMEDIATE
;

INSERT INTO User_data (name, surname, email, country, password)
VALUES ('Adam', 'Kowalski', 'adam.kowalski@gmail.com', 'Poland', 'adamKowalski');
INSERT INTO User_data (name, surname, email, country, password)
VALUES ('Andrzej', 'Duda', 'andrzej.duda@gmail.com', 'Poland', 'andrzejDuda');
INSERT INTO User_data (name, surname, email, country, password)
VALUES ('Konrad', 'Broda', 'konrad.broda@gmail.com', 'Poland', 'konradBroda');
INSERT INTO User_data (name, surname, email, country, password)
VALUES ('Jakub', 'Stolik', 'jakub.stolik@gmail.com', 'Poland', 'jakubStolik');
INSERT INTO User_data (name, surname, email, country, password)
VALUES ('John', 'Snow', 'john.snow@gmail.com', 'England', 'johnSnow');
INSERT INTO User_data (name, surname, email, country, password)
VALUES ('Piotr', 'Fama', 'piotr.fama@gmail.com', 'Poland', 'piotrFama');

INSERT INTO Announcement
VALUES (1, 1, 'Home', 'For Rent');
INSERT INTO Announcement
VALUES (2, 2, 'Apartment', 'For Sale');
INSERT INTO Announcement
VALUES (3, 3, 'Apartment', 'For Sale');
INSERT INTO Announcement
VALUES (4, 4, 'Home', 'For Sale');
INSERT INTO Announcement
VALUES (5, 5, 'Home', 'For Sale');

INSERT INTO Announcement_Location
VALUES (1, 'Sezamowa', '25B', '3', '30-526', 'Poznań');
INSERT INTO Announcement_Location
VALUES (2, 'Ogrodowa', '2A', '5', '24-532', 'Kraków');
INSERT INTO Announcement_Location
VALUES (3, 'Goździkowa', '23A', '1', '24-532', 'Kraków');
INSERT INTO Announcement_Location
VALUES (4, 'Zbożowa', '26B', '7', '24-532', 'Kraków');
INSERT INTO Announcement_Location
VALUES (5, 'Zielona', '29B', '2', '24-532', 'Kraków');

INSERT INTO Announcement_Details (details_Id, title, description, image, price, size, phone_number,
                                  Announcement_ann_Id, Announcement_Location_location_Id)
VALUES (1, 'Dom wolnostojący!',
        'Sprzedam wyjątkowy dom wolnostojący o powierzchni całkowitej ok. 300m2, położony w Krakowie na granicy dzielnic: Krowodrza i Bronowice, na działce ok. 500m2, super lokalizacja, wszędzie blisko',
        'dom-wolnostojacy.jpg',
        1290000.00,
        300.00,
        '+48 500 700 234',
        1, 1);

INSERT INTO Announcement_Details (details_Id, title, description, image, price, size, phone_number,
                                  Announcement_ann_Id, Announcement_Location_location_Id)
VALUES (2, '2-pokojowy apartament 44m2 + ogródek',
        '2-pokojowy apartament numer C1-0-3 na parterze w budynku C w Inwestycji Lokum Siesta Dewelopera Lokum Deweloper. Trasa pieszo-rowerowa wzdłuż rzeki Wilgi (1 minuta spacerem).',
        'kawalerka.jpg',
        679000.00,
        44.66,
        '+48 525 541 275',
        2, 2);

INSERT INTO Announcement_Details (details_Id, title, description, image, price, size, phone_number,
                                  Announcement_ann_Id, Announcement_Location_location_Id)
VALUES (3, 'Mieszkanie w centrum',
        'Mieszkanie w centrum. Posiada 2 pokoje, lazienke, kuchnie oraz aneks jadalny.',
        'kawalerka2.jpg',
        600000.00,
        50.00,
        '+48 759 262 234',
        3, 3);

INSERT INTO Announcement_Details (details_Id, title, description, image, price, size, phone_number,
                                  Announcement_ann_Id, Announcement_Location_location_Id)
VALUES (4, 'Dom szeregowy',
        'Dom szeregowy, w niedalekiej odleglosci od centrum. Dom posiada 2 pokoje, lazienke, kuchnie oraz aneks jadalny.',
        'dom-szeregowy.jpg',
        700000.00,
        100.00,
        '+48 553 700 234',
        4, 4);

INSERT INTO Announcement_Details (details_Id, title, description, image, price, size, phone_number,
                                  Announcement_ann_Id, Announcement_Location_location_Id)
VALUES (5, 'Piękny, nowy dom Orłowo/Mały Kack, widok na morze!',
        'Sprzedam wyjątkowy dom w stanie deweloperskim o powierzchni całkowitej ok. 330m2, na działce ok. 500m2, super lokalizacja, w niedalekiej odległość od plaży.',
        'dom_z_widokiem_na_morze.jpeg',
        3990000.00,
        335.00,
        '+48 500 700 234',
        5, 5);

-- End of file.

