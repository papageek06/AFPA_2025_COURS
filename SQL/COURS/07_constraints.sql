CREATE DATABASE library;
USE library;

-- NOT NULL
-- PRIMARY KEY
CREATE TABLE subscribers (
    id_subscriber INT(3) NOT NULL AUTO_INCREMENT,
    first_name VARCHAR(25) NOT NULL,
    PRIMARY KEY (id_subscriber)
);

DROP TABLE subscribers;

-- UNIQUE

CREATE TABLE subscribers (
    id_subscriber INT(3) NOT NULL AUTO_INCREMENT,
    first_name VARCHAR(25) NOT NULL,
    UNIQUE (id_subscriber, first_name)
);
DROP TABLE subscribers;

-- DEFAULT

CREATE TABLE subscribers (
    id_subscriber INT(3) NOT NULL AUTO_INCREMENT,
    first_name VARCHAR(25) NOT NULL,
    status INT NOT NULL DEFAULT 1,
    PRIMARY KEY (id_subscriber)
);
DROP TABLE subscribers;

-- CHECK

CREATE TABLE subscribers (
    id_subscriber INT(3) NOT NULL,
    first_name VARCHAR(25) NOT NULL,
    age INT,
    CHECK (age >= 18)
);

INSERT INTO subscribers VALUES( 1, 'Thomas', 18);
DROP TABLE subscribers;

-- INDEX

CREATE TABLE subscribers (
    id_subscriber INT(3) NOT NULL AUTO_INCREMENT,
    first_name VARCHAR(25) NOT NULL,
    email VARCHAR(25) NOT NULL,
    PRIMARY KEY (id_subscriber)
);

CREATE INDEX idx_subscribers ON subscribers (first_name, email);

DROP TABLE subscribers;

-- FOREIGN KEY

CREATE TABLE subscribers (
    id_subscriber INT(3) NOT NULL AUTO_INCREMENT,
    first_name VARCHAR(25) NOT NULL,
    email VARCHAR(25) NOT NULL,
    PRIMARY KEY (id_subscriber)
);

CREATE TABLE books(
    id_book INT(3) NOT NULL AUTO_INCREMENT,
    author VARCHAR(25) NOT NULL,
    title VARCHAR(30) NOT NULL,
    PRIMARY KEY (id_book)
);

CREATE TABLE loans(
    id_loan INT(3) NOT NULL AUTO_INCREMENT,
    id_book INT(3) NOT NULL,
    id_subscriber INT(3) NOT NULL,
    date_out DATE NOT NULL,
    date_in DATE DEFAULT NULL,
    PRIMARY KEY (id_loan),
    FOREIGN KEY (id_book) REFERENCES books(id_book),
    FOREIGN KEY (id_subscriber) REFERENCES subscribers(id_subscriber)
);

DROP TABLE subscribers;
DROP TABLE books;
DROP TABLE loans;


-- Synthax CHECK

CREATE TABLE subscribers (
    id_subscriber INT(3) NOT NULL,
    first_name VARCHAR(25) NOT NULL,
    age INT
);

ALTER TABLE subscribers
ADD CONSTRAINT CHK_agetooyoung CHECK(age >= 18);

INSERT INTO subscribers VALUES( 1, 'Thomas', 17);

-- Delete CHECK
ALTER TABLE subscribers
DROP CHECK CHK_agetooyoung;


-- UNIQUE

ALTER TABLE subscribers
ADD UNIQUE(first_name);

ALTER TABLE subscribers
ADD CONSTRAINT UC_first_name UNIQUE(first_name);

-- Delete UNIQUE CONSTRAINT

ALTER TABLE subscribers
DROP INDEX UC_first_name;


-- FOREIGN KEY

CREATE TABLE subscribers (
    id_subscriber INT(3) NOT NULL AUTO_INCREMENT,
    first_name VARCHAR(25) NOT NULL,
    email VARCHAR(25) NOT NULL,
    PRIMARY KEY (id_subscriber)
)
ENGINE = InnoDB
CHARACTER SET utf8mb4
COLLATE utf8mb4_unicode_ci
;

CREATE TABLE books(
    id_book INT(3) NOT NULL AUTO_INCREMENT,
    author VARCHAR(25) NOT NULL,
    title VARCHAR(30) NOT NULL,
    PRIMARY KEY (id_book)
);

CREATE TABLE loans(
    id_loan INT(3) NOT NULL AUTO_INCREMENT,
    id_book INT(3) NOT NULL,
    id_subscriber INT(3) NOT NULL,
    date_out DATE NOT NULL,
    date_in DATE DEFAULT NULL,
    PRIMARY KEY (id_loan)
);

ALTER TABLE loans
ADD FOREIGN KEY(id_book) REFERENCES books(id_book);

ALTER TABLE loans
ADD FOREIGN KEY(id_subscriber) REFERENCES subscribers(id_subscriber);

-- FK with NAME

ALTER TABLE loans
ADD CONSTRAINT FK_myconstraint FOREIGN KEY (id_book) REFERENCES books(id_book);

-- delete FK

ALTER TABLE loans
DROP FOREIGN KEY FK_myconstraint;