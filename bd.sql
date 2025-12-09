CREATE DATABASE biblioteca;
USE biblioteca;

CREATE TABLE livros (
    id INT AUTO_INCREMENT PRIMARY KEY,
    titulo VARCHAR(255),
    autor VARCHAR(255),
    ano INT,
    editora VARCHAR(255)
);
