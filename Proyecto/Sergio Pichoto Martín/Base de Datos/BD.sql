CREATE DATABASE Proyecto;
USE Proyecto;

CREATE TABLE Usuarios (
idUsuario INT NOT NULL AUTO_INCREMENT,
esAdmin BOOLEAN,
nombre VARCHAR(60),
primerApellido VARCHAR(60),
segundoApellido VARCHAR(60),
estado BOOLEAN,
email VARCHAR (255),
password VARCHAR(512),
PRIMARY KEY(idUsuario)
) ENGINE=InnoDB;

CREATE TABLE Casas(
  idCasa INT NOT NULL AUTO_INCREMENT,
  nombre VARCHAR(60),
  PRIMARY KEY(idCasa)
) ENGINE=InnoDB;

CREATE TABLE Habitaciones(
  idHabitacion INT NOT NULL AUTO_INCREMENT,
  nombre VARCHAR(60),
  idCasa INT NOT NULL,
  PRIMARY KEY(idHabitacion),
  FOREIGN KEY (idCasa) REFERENCES Casas (idCasa)
  ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB;

CREATE TABLE Componentes(
  idComponente INT NOT NULL AUTO_INCREMENT,
  estado BOOLEAN,
  tipo VARCHAR(255),
  privilegios SET('1','2','3','4','5','6','7') NULL DEFAULT NULL,
  PRIMARY KEY(idComponente)
) ENGINE=InnoDB;

CREATE TABLE Poseen(
  idUsuario INT NOT NULL,
  idCasa INT NOT NULL,
  fechaCompra DATE NULL,
  FOREIGN KEY(idUsuario) REFERENCES Usuarios(idUsuario),
  FOREIGN KEY(idCasa) REFERENCES Casas(idCasa)
  ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB;

CREATE TABLE Pertenece(
  idHabitacion INT NOT NULL,
  idComponente INT NOT NULL,
  idUsuario INT NOT NULL,
  privilegios SET('1','2','3','4','5','6','7') NULL DEFAULT NULL,
  FOREIGN KEY(idHabitacion) REFERENCES Habitaciones(idHabitacion),
  FOREIGN KEY(idComponente) REFERENCES Componentes(idComponente),
  FOREIGN KEY (idUsuario) REFERENCES Usuarios(idUsuario)
  ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB;
