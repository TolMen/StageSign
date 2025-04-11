
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
    etat ENUM('attente', 'signe', 'archive') NOT NULL,
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
