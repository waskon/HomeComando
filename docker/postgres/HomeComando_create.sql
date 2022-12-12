-- DROP TABLE IF EXISTS Announcement
-- DROP TABLE IF EXISTS Announcement_Details
-- DROP TABLE IF EXISTS Announcement_Location
-- DROP TABLE IF EXISTS User
-- tables
-- Table: Announcement

CREATE TABLE Announcement (
    ann_Id int  NOT NULL,
    User_Id int  NOT NULL,
    type varchar(50)  NOT NULL,
    purpose varchar(50)  NOT NULL,
    CONSTRAINT Announcement_pk PRIMARY KEY (ann_Id)
);

-- Table: Announcement_Details
CREATE TABLE Announcement_Details (
    details_Id int  NOT NULL,
    title varchar(200)  NOT NULL,
    description varchar(2000)  NOT NULL,
    path_to_image varchar(200)  NOT NULL,
    price numeric(10,2)  NOT NULL,
    size numeric(10,2)  NOT NULL,
    phone_number bigint  NOT NULL,
    Announcement_ann_Id int  NOT NULL,
    Announcement_Location_location_Id int  NOT NULL,
    CONSTRAINT Announcement_Details_pk PRIMARY KEY (details_Id)
);

-- Table: Announcement_Location
CREATE TABLE Announcement_Location (
    location_Id int  NOT NULL,
    street varchar(200)  NOT NULL,
    house_number varchar(10)  NOT NULL,
    flat_number varchar(10)  NULL,
    postal_code varchar(6)  NOT NULL,
    country varchar(200)  NOT NULL,
    CONSTRAINT Announcement_Location_pk PRIMARY KEY (location_Id)
);

-- Table: User
CREATE TABLE "User" (
    Id int  NOT NULL,
    name varchar(100)  NOT NULL,
    surname varchar(100)  NOT NULL,
    email varchar(200)  NOT NULL,
    country varchar(100)  NOT NULL,
    password varchar(200)  NOT NULL,
    CONSTRAINT Id PRIMARY KEY (Id)
);

-- foreign keys
-- Reference: Announcement_Details_Announcement (table: Announcement_Details)
ALTER TABLE Announcement_Details ADD CONSTRAINT Announcement_Details_Announcement
    FOREIGN KEY (Announcement_ann_Id)
    REFERENCES Announcement (ann_Id)  
    NOT DEFERRABLE 
    INITIALLY IMMEDIATE
;

-- Reference: Announcement_Details_Announcement_Location (table: Announcement_Details)
ALTER TABLE Announcement_Details ADD CONSTRAINT Announcement_Details_Announcement_Location
    FOREIGN KEY (Announcement_Location_location_Id)
    REFERENCES Announcement_Location (location_Id)  
    NOT DEFERRABLE 
    INITIALLY IMMEDIATE
;

-- Reference: Announcement_User (table: Announcement)
ALTER TABLE Announcement ADD CONSTRAINT Announcement_User
    FOREIGN KEY (User_Id)
    REFERENCES "User" (Id)  
    NOT DEFERRABLE 
    INITIALLY IMMEDIATE
;

-- End of file.

