CREATE DATABASE IF NOT EXISTS appDB;
CREATE USER IF NOT EXISTS 'user' @'%' IDENTIFIED BY 'password';
GRANT ALL PRIVILEGES ON appDB.* TO 'user' @'%';
FLUSH PRIVILEGES;
USE appDB;
-- Fix Russian language
SET NAMES utf8mb4;
-- Tables
CREATE TABLE IF NOT EXISTS users (
    ID INT(11) NOT NULL AUTO_INCREMENT,
    name CHAR(20) NOT NULL UNIQUE,
    password CHAR(40) NOT NULL,
    PRIMARY KEY (ID)
) ENGINE = InnoDB DEFAULT CHARSET = utf8mb4;
CREATE TABLE IF NOT EXISTS games (
    ID INT(10) NOT NULL AUTO_INCREMENT,
    title VARCHAR(32) NOT NULL UNIQUE,
    description VARCHAR(256) NOT NULL,
    cost INT(6) NOT NULL,
    PRIMARY KEY (ID)
) ENGINE = InnoDB DEFAULT CHARSET = utf8mb4;
-- Admin (MD5)
-- https://www.web2generators.com/apache-tools/htpasswd-generator
INSERT INTO users (name, password)
VALUES (
        'Iadmin',
        '$apr1$h2d7mpgc$VFHTdWRYYJDQqqUMCr5T5.' -- 12312312344
    ),
    (
        'User1',
        '$apr1$7qsfwyml$em3JnUlgqLvRJlVD9dX5G0' -- 123123123
    ),
    (
        'Tiger',
        '$apr1$mlhiow74$CGlvUxgzW.GOWpn9CEbFT/' -- gty3411
    ),
    (
        'lexa',
        '$apr1$gr84mtn1$p8mCxlFogAu2t2oVWhlrJ1' -- errrre
    );
-- games
INSERT INTO games (title, description, cost)
VALUES (
        'Монополия',
        'Игра для всей семьи',
        420
    ),
    ('Амонгус', 'Веселый амонгус', 900);