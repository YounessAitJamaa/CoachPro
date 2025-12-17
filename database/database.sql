CREATE DATABASE CoachPro;

USE CoachPro;

CREATE TABLE Role (
    id_role INT PRIMARY KEY AUTO_INCREMENT,
    nom_role VARCHAR(50) NOT NULL
);

CREATE TABLE Utilisateur (
    id_user INT PRIMARY KEY AUTO_INCREMENT,
    nom VARCHAR(50) NOT NULL,
    prenom VARCHAR(50) NOT NULL,
    email VARCHAR(255) NOT NULL UNIQUE,
    mot_de_passe VARCHAR(255) NOT NULL,
    date_inscription DATETIME DEFAULT CURRENT_TIMESTAMP,
    id_role INT,
    FOREIGN KEY (id_role) REFERENCES Role(id_role)
);

CREATE TABLE sportif (
    id_sportif INT PRIMARY KEY AUTO_INCREMENT,
    telephone VARCHAR(25),
    date_naissance DATE,
    id_user INT,
    FOREIGN KEY (id_user) REFERENCES Utilisateur(id_user) ON DELETE CASCADE
);

CREATE TABLE coach (
    id_coach INT PRIMARY KEY AUTO_INCREMENT,
    photo VARCHAR(255),
    biographie TEXT,
    experience INT,
    niveau VARCHAR(50),
    adresse VARCHAR(255),
    telephone VARCHAR(25),
    id_user INT,
    FOREIGN KEY (id_user) REFERENCES Utilisateur(id_user) ON DELETE CASCADE
);


CREATE TABLE seance (
    id_seance INT PRIMARY KEY AUTO_INCREMENT,
    date_seance DATE,
    heure TIME,
    statut VARCHAR(25),
    id_sportif INT,
    id_coach INT,
    FOREIGN KEY (id_sportif) REFERENCES sportif(id_sportif) ON DELETE CASCADE,
    FOREIGN KEY (id_coach) REFERENCES coach(id_coach) ON DELETE CASCADE
);


CREATE TABLE avis (
    id_avis INT PRIMARY KEY AUTO_INCREMENT,
    date_avis DATETIME DEFAULT CURRENT_TIMESTAMP,
    note INT CHECK (note BETWEEN 1 AND 5),
    commentaire TEXT,
    id_sportif INT,
    id_coach INT,
    FOREIGN KEY (id_sportif) REFERENCES sportif(id_sportif) ON DELETE CASCADE,
    FOREIGN KEY (id_coach) REFERENCES coach(id_coach) ON DELETE CASCADE
);

CREATE TABLE disponibilite (
    id_disponibilite INT PRIMARY KEY AUTO_INCREMENT,
    date_disponibilite DATE,
    heure_debut TIME,
    heure_fin TIME,
    id_coach INT,
    FOREIGN KEY (id_coach) REFERENCES coach(id_coach) ON DELETE CASCADE
);

CREATE TABLE disciplines  (
    id_discipline INT PRIMARY KEY AUTO_INCREMENT,
    nom_discipline VARCHAR(50) NOT NULL
);

CREATE TABLE coach_discipline (
    id_coach INT,
    id_discipline INT,
    PRIMARY KEY(id_coach, id_discipline),
    FOREIGN KEY (id_coach) REFERENCES coach(id_coach) ON DELETE CASCADE,
    FOREIGN KEY (id_discipline) REFERENCES disciplines(id_discipline) ON DELETE CASCADE
)