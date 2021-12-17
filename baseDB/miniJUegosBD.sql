CREATE DATABASE juegos CHARACTER SET 'UTF8' COLLATE 'utf8_general_ci';




CREATE TABLE usuario (
idUsuario TINYINT unsigned not NULL AUTO_INCREMENT,
nombre VARCHAR(40) NOT NULL,
correo VARCHAR(40)NOT NULL,
contrasena VARCHAR(40) NOT NULL,
tipo CHAR(1),
PRIMARY KEY(idUsuario)

);



CREATE TABLE minijuegos(
idMinijuegos TINYINT unsigned NOT NULL AUTO_INCREMENT,
nombre VARCHAR(20) NOT NULL,
url VARCHAR(60),
PRIMARY KEY(idMinijuegos)

);
CREATE TABLE preferencias(
idUsuario TINYINT unsigned not NULL,
idMinijuegos TINYINT unsigned not NULL,
FOREIGN KEY (idUsuario) REFERENCES usuario(idUsuario),
FOREIGN KEY (idMinijuegos) REFERENCES minijuegos(idMinijuegos)
);

INSERT INTO minijuegos(nombre) VALUES ('Reciclaje');
INSERT INTO minijuegos(nombre) VALUES ('Multiplos');
INSERT INTO minijuegos(nombre) VALUES ('Tabla Periodica');


