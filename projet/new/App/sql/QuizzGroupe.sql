CREATE DATABASE IF NOT EXISTS quizz CHARSET utf8mb4;
USE quizz;

CREATE TABLE IF NOT EXISTS utilisateur(
id_utilisateur INT PRIMARY KEY AUTO_INCREMENT NOT NULL,
pseudo_utilisateur VARCHAR(50) NOT NULL,
email_utilisateur VARCHAR(150) NOT NULL UNIQUE
mdp_utilisateur VARCHAR(100) NOT NULL,
)Engine=InnoDB;

CREATE TABLE IF NOT EXISTS question(
id_question INT PRIMARY KEY AUTO_INCREMENT NOT NULL,
texte_question VARCHAR(255) NOT NULL
)Engine=InnoDB;

CREATE TABLE IF NOT EXISTS reponse(
id_reponse INT PRIMARY KEY AUTO_INCREMENT NOT NULL,
texte_reponse VARCHAR(255) NOT NULL,
correcte VARCHAR(255) NOT NULL,
id_question INT
)Engine=InnoDB;

ALTER TABLE reponse
ADD CONSTRAINT fk_reponse_question
FOREIGN KEY(id_question)
REFERENCES question(id_question);