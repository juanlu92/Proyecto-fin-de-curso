CREATE DATABASE Proyecto;
USE Proyecto;

CREATE TABLE Usuarios (
idUsuario INT NOT NULL AUTO_INCREMENT,
nombre VARCHAR(60),
password VARCHAR(255),
primerApellido VARCHAR(60),
segundoApellido VARCHAR(60),
estado BOOLEAN,
PRIMARY KEY(idUsuario)
) ENGINE=InnoDB;

CREATE TABLE Familiares (
idFamiliar INT NOT NULL AUTO_INCREMENT,
idUsuario INT NOT NULL,
nombre VARCHAR(60),
password VARCHAR(255),
primerApellido VARCHAR(60),
segundoApellido VARCHAR(60),
estado BOOLEAN,
PRIMARY KEY(idFamiliar),
FOREIGN KEY(idUsuario) REFERENCES Usuarios(idUsuario)
ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB;

CREATE TABLE Casas(
  idCasa INT NOT NULL AUTO_INCREMENT,
  nombre VARCHAR(60),
  numHabitaciones INT NOT NULL,
  PRIMARY KEY(idCasa)
) ENGINE=InnoDB;

CREATE TABLE Habitaciones(
  idHabitacion INT NOT NULL AUTO_INCREMENT,
  idCasa INT NOT NULL,
  nombre VARCHAR(60),
  PRIMARY KEY(idHabitacion),
  numComponentes INT NOT NULL,
  FOREIGN KEY (idCasa) REFERENCES Casas (idCasa)
  ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB;

CREATE TABLE Componentes(
  idComponente INT NOT NULL AUTO_INCREMENT,
  idCasa INT NOT NULL,
  idHabitacion INT NOT NULL,
  voltaje INT NOT NULL,
  estado BOOLEAN,
  PRIMARY KEY(idComponente),
  FOREIGN KEY(idCasa) REFERENCES Casas(idCasa),
  FOREIGN KEY (idHabitacion) REFERENCES Habitaciones(idHabitacion)
  ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB;

CREATE TABLE Propiedades(
  idPropiedad INT NOT NULL AUTO_INCREMENT,
  nombre VARCHAR(60),
  tipo VARCHAR(60),
  PRIMARY KEY(idPropiedad)
) ENGINE=InnoDB;

CREATE TABLE Manejan (
idFamiliar INT NOT NULL,
idComponente INT NOT NULL,
idCasa INT NOT NULL,
idHabitacion INT NOT NULL,
FOREIGN KEY (idFamiliar) REFERENCES Familiares(idFamiliar),
FOREIGN KEY (idComponente) REFERENCES Componentes(idComponente),
FOREIGN KEY (idCasa) REFERENCES Casas(idCasa),
FOREIGN KEY (idHabitacion) REFERENCES Habitaciones(idHabitacion)
) ENGINE=InnoDB;

CREATE TABLE Poseen(
  idUsuario INT NOT NULL,
  idCasa INT NOT NULL,
  fechaCompra DATE,
  FOREIGN KEY(idUsuario) REFERENCES Usuarios(idUsuario),
  FOREIGN KEY(idCasa) REFERENCES Casas(idCasa)
) ENGINE=InnoDB;
