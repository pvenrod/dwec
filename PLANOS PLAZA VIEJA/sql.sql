CREATE DATABASE plazaVieja CHARACTER SET utf8mb4;

USE plazaVieja;

CREATE TABLE imagenes (
    id INT PRIMARY KEY,
    descripcion TEXT,
    anyo INT,
    imagen VARCHAR(100)
);