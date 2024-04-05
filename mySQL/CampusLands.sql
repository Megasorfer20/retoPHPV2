/*
Entrega de SQL

Esteban Dario Ruiz Paredes
V2
*/

CREATE DATABASE campusLands;
USE campusLands;

CREATE TABLE pais(
    idPais INT PRIMARY KEY AUTO_INCREMENT NOT NULL,
    nombrePais VARCHAR(50) NOT NULL
);

CREATE TABLE departamento(
    idDep INT PRIMARY KEY AUTO_INCREMENT NOT NULL,
    nombreDep VARCHAR(50) NOT NULL,
    idPais INT NOT NULL,
    FOREIGN KEY (idPais) REFERENCES pais(idPais)
);

CREATE TABLE region(
    idReg INT PRIMARY KEY AUTO_INCREMENT NOT NULL,
    nombreReg VARCHAR(60) NOT NULL,
    idDep INT NOT NULL,
    FOREIGN KEY (idDep) REFERENCES departamento(idDep)
);

CREATE TABLE campers(
    idCamper INT PRIMARY KEY AUTO_INCREMENT NOT NULL,
    nombreCamper VARCHAR(50) NOT NULL,
    apellidoCamper VARCHAR(50) NOT NULL,
    fechaNac DATE NOT NULL,
    idReg INT NOT NULL,
    FOREIGN KEY (idReg) REFERENCES region(idReg)
);