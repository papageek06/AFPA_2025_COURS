-- Création de la base de données
CREATE DATABASE IF NOT EXISTS twitter;

-- Utilisation de la base de données
USE twitter;

-- Création de la table users
CREATE TABLE users (
    id INT PRIMARY KEY AUTO_INCREMENT,       -- Identifiant unique
    nom VARCHAR(100) NOT NULL,               -- Nom de l'utilisateur
    email VARCHAR(255) UNIQUE NOT NULL,      -- Adresse email unique
    password VARCHAR(255) NOT NULL,          -- Mot de passe (hashé)
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP -- Date d'inscription
);

-- Ajout d'un index sur l'email pour accélérer les recherches
CREATE UNIQUE INDEX idx_email ON users(email);

CREATE TABLE tweets (
    id INT PRIMARY KEY AUTO_INCREMENT,       -- Identifiant unique
    date DATE NOT NULL,               -- date du tweet
    content VARCHAR(255) NOT NULL,      -- le tweet    
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP -- Date d'inscription
);