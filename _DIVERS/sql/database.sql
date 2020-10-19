CREATE DATABASE IF NOT EXISTS a6kdb DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;

use a6kdb;
SET NAMES utf8;
CREATE TABLE IF NOT EXISTS a6k_clients(
    id INT NOT NULL AUTO_INCREMENT,
    PRIMARY KEY(id),
    lastname VARCHAR(50),
    firstname VARCHAR(50),
    email VARCHAR(255),
    adress VARCHAR(255),
    phone VARCHAR(25),
    tva VARCHAR(25),
    company_type VARCHAR(50)
);

CREATE TABLE IF NOT EXISTS a6k_material_type(
    id INT NOT NULL AUTO_INCREMENT,
    PRIMARY KEY(id),
    description VARCHAR(255),
    type VARCHAR(255)
);

CREATE TABLE IF NOT EXISTS a6k_materials(
    id INT NOT NULL AUTO_INCREMENT,
    PRIMARY KEY(id),
    name VARCHAR(255),
    description VARCHAR(255),
    price INT UNSIGNED NOT NULL,
    quantity SMALLINT UNSIGNED NOT NULL,
    id_material_type INT,
    FOREIGN KEY (id_material_type) REFERENCES a6k_material_type(id)
);

CREATE TABLE IF NOT EXISTS a6k_rooms(
    id INT NOT NULL AUTO_INCREMENT,
    PRIMARY KEY(id),
    name VARCHAR(255),
    price INT UNSIGNED NOT NULL,
    seats_number SMALLINT UNSIGNED NOT NULL,
    area DECIMAL(5,2) UNSIGNED
);

CREATE TABLE IF NOT EXISTS a6k_booking(
    id INT NOT NULL AUTO_INCREMENT,
    PRIMARY KEY(id),
    start DATETIME,
    end DATETIME,
    price INT UNSIGNED NOT NULL,
    cancel_status BOOLEAN DEFAULT 0,
    validation_status BOOLEAN DEFAULT 0,
    id_clients INT,
    id_rooms INT,
    FOREIGN KEY (id_clients) REFERENCES a6k_clients(id),
    FOREIGN KEY (id_rooms) REFERENCES a6k_rooms(id)
);

CREATE TABLE IF NOT EXISTS a6k_invoices(
    id INT NOT NULL AUTO_INCREMENT,
    PRIMARY KEY(id),
    date_emit DATETIME,
    paid_status BOOLEAN DEFAULT 0,
    id_booking INT,
    FOREIGN KEY (id_booking) REFERENCES a6k_booking(id)
);

CREATE TABLE IF NOT EXISTS a6k_pictures_rooms(
    id INT NOT NULL AUTO_INCREMENT,
    PRIMARY KEY(id),
    url VARCHAR(255),
    id_rooms INT,
    FOREIGN KEY (id_rooms) REFERENCES a6k_rooms(id)
);

CREATE TABLE IF NOT EXISTS a6k_pictures_materials(
    id INT NOT NULL AUTO_INCREMENT,
    PRIMARY KEY(id),
    url VARCHAR(255),
    id_materials INT,
    FOREIGN KEY (id_materials) REFERENCES a6k_materials(id)
);

CREATE TABLE IF NOT EXISTS a6k_materials_basis(
    quantity SMALLINT UNSIGNED NOT NULL,
    id_rooms INT,
    id_materials INT,
    FOREIGN KEY (id_rooms) REFERENCES a6k_rooms(id),
    FOREIGN KEY (id_materials) REFERENCES a6k_materials(id)
);

CREATE TABLE IF NOT EXISTS a6k_materials_options(
    quantity SMALLINT UNSIGNED NOT NULL,
    price INT UNSIGNED NOT NULL,
    id_materials INT,
    id_booking INT,
    FOREIGN KEY (id_materials) REFERENCES a6k_materials(id),
    FOREIGN KEY (id_booking) REFERENCES a6k_booking(id)
);