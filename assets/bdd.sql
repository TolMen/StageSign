
SET NAMES utf8mb4;
DROP  DATABASE IF EXISTS stagesign;
CREATE DATABASE IF NOT EXISTS stagesign;
USE stagesign;

-- Table des utilisateurs
CREATE TABLE IF NOT EXISTS user (
    id INT AUTO_INCREMENT PRIMARY KEY,
    pseudo VARCHAR(255) NOT NULL UNIQUE,
    firstname VARCHAR(255) NOT NULL,
    lastname VARCHAR(255) NOT NULL,
    civility VARCHAR(255) NOT NULL,
    password VARCHAR(255) NOT NULL,
    email VARCHAR(255) NOT NULL,
    phone VARCHAR(255) NOT NULL,
    created_at DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB;

-- Table des entreprises
CREATE TABLE IF NOT EXISTS compagnie (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL,
    first_address VARCHAR(255) NOT NULL,
    second_address VARCHAR(255),
    postal_code VARCHAR(10) NOT NULL,
    city VARCHAR(255) NOT NULL,
    country VARCHAR(255) NOT NULL
) ENGINE=InnoDB;

-- Table des étudiants
CREATE TABLE IF NOT EXISTS student (
    id INT AUTO_INCREMENT PRIMARY KEY,
    class VARCHAR(255) NOT NULL,
    date_of_birth DATE NOT NULL, 
    user_id INT NOT NULL,
    FOREIGN KEY (user_id) REFERENCES user(id) ON DELETE CASCADE
) ENGINE=InnoDB;

-- Table des professeurs
CREATE TABLE IF NOT EXISTS teacher (
    id INT AUTO_INCREMENT PRIMARY KEY,
    user_id INT NOT NULL,
    FOREIGN KEY (user_id) REFERENCES user(id) ON DELETE CASCADE
) ENGINE=InnoDB;

-- Table des tuteurs
CREATE TABLE IF NOT EXISTS tutor (
    id INT AUTO_INCREMENT PRIMARY KEY,
    function VARCHAR(255) NOT NULL,
    user_id INT NOT NULL,
    compagnie_id INT NOT NULL,
    FOREIGN KEY (user_id) REFERENCES user(id) ON DELETE CASCADE,
    FOREIGN KEY (compagnie_id) REFERENCES compagnie(id) ON DELETE CASCADE
) ENGINE=InnoDB;

-- Table des directions
CREATE TABLE IF NOT EXISTS direction (
    id INT AUTO_INCREMENT PRIMARY KEY,
    user_id INT NOT NULL,
    compagnie_id INT NOT NULL,
    FOREIGN KEY (user_id) REFERENCES user(id) ON DELETE CASCADE,
    FOREIGN KEY (compagnie_id) REFERENCES compagnie(id) ON DELETE CASCADE
) ENGINE=InnoDB;

-- Table des administrateurs
CREATE TABLE IF NOT EXISTS administrator (
    id INT AUTO_INCREMENT PRIMARY KEY,
    user_id INT NOT NULL,
    FOREIGN KEY (user_id) REFERENCES user(id) ON DELETE CASCADE
) ENGINE=InnoDB;

-- Table des conventions
CREATE TABLE IF NOT EXISTS convention (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL UNIQUE,
    start_date DATE NOT NULL,
    end_date DATE NOT NULL,
    place VARCHAR(255),
    subject TEXT NOT NULL,
    student_id INT NOT NULL,
    tutor_id INT NOT NULL,
    teacher_id INT NOT NULL,
    direction_id INT NOT NULL,
    etat ENUM('attente', 'signee', 'archive') NOT NULL,
    FOREIGN KEY (student_id) REFERENCES student(id) ON DELETE CASCADE,
    FOREIGN KEY (tutor_id) REFERENCES tutor(id) ON DELETE CASCADE,
    FOREIGN KEY (teacher_id) REFERENCES teacher(id) ON DELETE CASCADE,
    FOREIGN KEY (direction_id) REFERENCES direction(id) ON DELETE CASCADE,
    created_at DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB;

-- Table des horaires
CREATE TABLE IF NOT EXISTS schedule (
    id INT AUTO_INCREMENT PRIMARY KEY,
    start_time TIME NOT NULL,
    end_time TIME NOT NULL,
    pause_time TIME NOT NULL,
    day ENUM("lundi", "mardi", "mercredi", "jeudi", "vendredi", "samedi", "dimanche"),
    student_id INT NOT NULL,
    FOREIGN KEY (student_id) REFERENCES student(id) ON DELETE CASCADE,
    created_at DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB;

-- Table reliant les conventions aux horaires
CREATE TABLE IF NOT EXISTS convention_schedule (
    id INT AUTO_INCREMENT PRIMARY KEY,
    convention_id INT NOT NULL,
    schedule_id INT NOT NULL,
    FOREIGN KEY (convention_id) REFERENCES convention(id) ON DELETE CASCADE,
    FOREIGN KEY (schedule_id) REFERENCES schedule(id) ON DELETE CASCADE
) ENGINE=InnoDB;

CREATE TABLE IF NOT EXISTS preconv (
    id INT PRIMARY KEY AUTO_INCREMENT,
    start_date DATE NOT NULL,
    end_date DATE NOT NULL,
    student_civility ENUM('M', 'Mme', 'Mlle') NOT NULL,
    student_name VARCHAR(100) NOT NULL,
    student_class VARCHAR(50) NOT NULL,
    program_referent VARCHAR(100) NOT NULL,
    company_name VARCHAR(255) NOT NULL,
    company_address TEXT NOT NULL,
    internship_location TEXT NOT NULL,
    director_civility ENUM('M', 'Mme', 'Mlle') NOT NULL,
    director_name VARCHAR(100) NOT NULL,
    director_phone VARCHAR(20) NOT NULL,
    director_email VARCHAR(255) NOT NULL,
    tutor_civility ENUM('M', 'Mme', 'Mlle') DEFAULT NULL,
    tutor_name VARCHAR(100) DEFAULT NULL,
    tutor_phone VARCHAR(20) DEFAULT NULL,
    tutor_email VARCHAR(255) DEFAULT NULL,
    tutor_function VARCHAR(100) DEFAULT NULL,
    mission_description TEXT NOT NULL,
    working_hours TEXT NOT NULL,
    additional_remarks TEXT DEFAULT NULL,
    variable_schedule BOOLEAN NOT NULL DEFAULT 0
) ENGINE=InnoDB;

-- A SUPPRIMER EN FIN DE PROJET !!!

-- Insertion des utilisateurs
INSERT INTO user (pseudo, firstname, lastname, civility, password, email, phone) VALUES
('narsac', 'Nolan', 'Arsac', 'M', SHA2('btssio', 256), 'Arsac15611@lasalle63.fr', '0000000000'),
('root', 'Root', 'Root', 'M', SHA2('root', 256), 'root@lasalle63.fr', '0000000000'),
('teacher', 'Jane', 'Smith', 'Mme', SHA2('btssio', 256), 'jane.smith@example.com', '0000000000'),
('tutor', 'Tom', 'Tutor', 'M', SHA2('btssio', 256), 'tom.tutor@example.com', '0000000000'),
('director', 'Anna', 'Director', 'Mme', SHA2('btssio', 256), 'anna.director@example.com', '0000000000');

-- Insertion d'un étudiant
INSERT INTO student (class, date_of_birth, user_id) VALUES
                                                        ('SIO1', '2005-10-05', 1);

-- Insertion d'un administrateur
INSERT INTO administrator (user_id) VALUES
(2);

-- Insertion d'un professeur
INSERT INTO teacher (user_id) VALUES
(3);

-- Insertion d'une entreprise
INSERT INTO compagnie (name, first_address, postal_code, city, country) VALUES
('123 Entreprise', '123 Adresse', '63000', 'Clermont-Ferrand', 'France');

-- Insertion d'un tuteur
INSERT INTO tutor (function, user_id, compagnie_id) VALUES
('Développeur', 4, 1);

-- Insertion d'un directeur (direction)
INSERT INTO direction (user_id, compagnie_id) VALUES
(5, 1);


