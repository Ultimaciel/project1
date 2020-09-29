--
-- Database maken als het nog niet bestaat.
--
CREATE DATABASE IF NOT EXISTS project1;

--
-- Database gebruiken als nog niet wordt gebruikt.
--
USE project1;

--
-- Tabel account maken met id, email, password en primary key defineren.
--
CREATE TABLE account(
    id INT(255) NOT NULL AUTO_INCREMENT,
    email VARCHAR(255) UNIQUE NOT NULL,
    password VARCHAR(255) NOT NULL,
    PRIMARY KEY(id)
);

--
-- Tabel persoon maken met id, firstname, middlename, lastname, username, account_id en dan primary key en foreign key defineren.
--
CREATE TABLE persoon(
    id INT NOT NULL AUTO_INCREMENT,
    firstname VARCHAR(255) NOT NULL,
    middlename VARCHAR(255),
    lastname VARCHAR(255) NOT NULL,
    username VARCHAR(255) NOT NULL,
    account_id INT NOT NULL,
    PRIMARY KEY(id),
    FOREIGN KEY(account_id) REFERENCES account(id)
);