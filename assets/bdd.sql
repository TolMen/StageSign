
SET NAMES utf8mb4;
DROP  DATABASE IF EXISTS stagesign;
CREATE DATABASE IF NOT EXISTS stagesign;
USE stagesign;

-- Table des utilisateurs
CREATE TABLE IF NOT EXISTS users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    pseudo VARCHAR(255) NOT NULL UNIQUE,
    firstname VARCHAR(255) NOT NULL,
    lastname VARCHAR(255) NOT NULL,
    civility VARCHAR(255) NOT NULL,
    password VARCHAR(255) NOT NULL,
    email VARCHAR(255) NOT NULL,
    phone VARCHAR(255) NOT NULL,
    created_at DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
) ENGINE=InnoDB;

-- Table des entreprise
CREATE TABLE IF NOT EXISTS compagnies (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL,
    firts_adress VARCHAR(255) NOT NULL,
    second_adress VARCHAR(255),
    postal_code INT NOT NULL,
    city VARCHAR(255) NOT NULL,
    country VARCHAR(255) NOT NULL
) ENGINE=InnoDB;


-- Table des étudiants
CREATE TABLE IF NOT EXISTS students (
    id INT AUTO_INCREMENT PRIMARY KEY,
    class VARCHAR(255) NOT NULL,
    date_of_birth DATE NOT NULL, 
    user_id INT NOT NULL
    FOREIGN KEY (user_id) REFERENCES users(id) ON DELETE CASCADE
) ENGINE=InnoDB;

-- Table des tuteurs
CREATE TABLE IF NOT EXISTS tutors (
    id INT AUTO_INCREMENT PRIMARY KEY,
    function VARCHAR(255) NOT NULL,
    user_id INT NOT NULL
    compagny_id INT NOT NULL
    FOREIGN KEY (user_id) REFERENCES users(id) ON DELETE CASCADE
    FOREIGN KEY (compagny_id) REFERENCES compagnies(id) ON DELETE CASCADE
) ENGINE=InnoDB;

-- Table des directions
CREATE TABLE IF NOT EXISTS directions (
    id INT AUTO_INCREMENT PRIMARY KEY,
    user_id INT NOT NULL
    compagny_id INT NOT NULL
    FOREIGN KEY (user_id) REFERENCES users(id) ON DELETE CASCADE
    FOREIGN KEY (compagny_id) REFERENCES compagnies(id) ON DELETE CASCADE
) ENGINE=InnoDB;

-- Table des administrateurs
CREATE TABLE IF NOT EXISTS school (
    id INT AUTO_INCREMENT PRIMARY KEY,
    user_id INT NOT NULL
    FOREIGN KEY (user_id) REFERENCES users(id) ON DELETE CASCADE
) ENGINE=InnoDB;

-- Table des convention
CREATE TABLE IF NOT EXISTS convention (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL UNIQUE DEFAULT 
    etat ENUM("attente", "signe", "archive"),
    start_date DATE NOT NULL,
    end_date DATE NOT NULL,
    place VARCHAR(255),
    subject TEXT NOT NULL,
    created_at DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
) ENGINE=InnoDB;


