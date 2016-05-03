CREATE DATABASE Proyecto;
USE Proyecto;

CREATE TABLE Usuarios (
idUsuario INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
nombre VARCHAR(60),
primerApellido VARCHAR(60),
segundoApellido VARCHAR(60),
estado BOOLEAN
) ENGINE=InnoDB;

CREATE TABLE Familiares (
idFamiliar INT NOT NULL AUTO_INCREMENT,
idUsuario INT NOT NULL,
nombre VARCHAR(60),
primerApellido VARCHAR(60),
segundoApellido VARCHAR(60),
estado BOOLEAN
) ENGINE=InnoDB;

CREATE TABLE Manejan (
idFamiliar INT NOT NULL,
idComponente INT NOT NULL,
idCasa INT NOT NULL,
idHabitacion INT NOT NULL
) ENGINE=InnoDB;

CREATE TABLE Casas(
  idCasa INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
  nombre VARCHAR(60),
  numHabitaciones INT NOT NULL
)

CREATE TABLE Poseen(
  idUsuario INT NOT NULL,
  idCasa INT NOT NULL,
  fechaCompra DATE
) ENGINE=InnoDB;

CREATE TABLE Habitacion(
  idHabitacion INT NOT NULL AUTO_INCREMENT,
  idCasa INT NOT NULL,
  nombre VARCHAR(60)
) ENGINE=InnoDB;

CREATE TABLE Componentes(
  idComponente INT NOT NULL AUTO_INCREMENT,
  idCasa INT NOT NULL,
  idHabitacion INT NOT NULL,
  voltaje INT NOT NULL,
  estado BOOLEAN
) ENGINE=InnoDB;

CREATE TABLE Propiedades(
  idPropiedad INT NOT NULL AUTO_INCREMENT,
  nombre VARCHAR(60),
  tipo VARCHAR(60)
) ENGINE=InnoDB;

PRIMARY KEY (idFamiliar),
KEY(idUsuario),
FOREIGN KEY (idUsuario)
REFERENCES Familiares(idUsuario)
ON DELETE SET NULL
ON UPDATE CASCADE
) ENGINE=InnoDB;

/*
CREATE TABLE editorial (
claveeditorial SMALLINT NOT NULL,
nombre  VARCHAR(60),
direccion VARCHAR(60),
telefono VARCHAR(15),
PRIMARY KEY (claveeditorial)
) ENGINE=InnoDB;

CREATE TABLE libro (
clavelibro INT NOT NULL,
titulo VARCHAR(60),
idioma VARCHAR(15),
formato VARCHAR(15),
categoria CHAR,
claveeditorial SMALLINT,
portada varchar(60) DEFAULT NULL,
ruta varchar(100) DEFAULT NULL,

PRIMARY KEY (clavelibro),
KEY(claveeditorial),
FOREIGN KEY (claveeditorial)
REFERENCES editorial(claveeditorial)
ON DELETE SET NULL
ON UPDATE CASCADE
) ENGINE=InnoDB;

CREATE TABLE tema (
clavetema SMALLINT NOT NULL,
nombre VARCHAR(40),
PRIMARY KEY (clavetema)
) ENGINE=InnoDB;

CREATE TABLE autor (
claveautor INT NOT NULL,
nombre VARCHAR(60),
PRIMARY KEY (claveautor)
) ENGINE=InnoDB;

CREATE TABLE ejemplar (
clavelibro INT NOT NULL,
numeroorden SMALLINT NOT NULL,
edicion SMALLINT,
ubicacion VARCHAR(15),
estado char(10),
PRIMARY KEY (clavelibro,numeroorden),
FOREIGN KEY (clavelibro)
REFERENCES libro(clavelibro)
ON DELETE CASCADE
ON UPDATE CASCADE
) ENGINE=InnoDB;

CREATE TABLE usuarios (
claveusuarios INT NOT NULL AUTO_INCREMENT,
nombre VARCHAR(15),
apellido1 VARCHAR(15),
apellido2 Varchar(15),
pass VARCHAR(30),
nick VARCHAR(20),
direccion VARCHAR(60),
telefono VARCHAR(15),
estado char(10),
rol char(15),
foto varchar(60),
PRIMARY KEY (claveusuarios)
) ENGINE=InnoDB;

CREATE TABLE prestamo (
claveusuarios INT,
clavelibro INT,
numeroorden SMALLINT,
fecha_prestamo DATE NOT NULL,
fecha_devolucion DATE DEFAULT NULL,
notas BLOB,
FOREIGN KEY (claveusuarios)
REFERENCES usuarios(claveusuarios)
ON DELETE SET NULL
ON UPDATE CASCADE,
FOREIGN KEY (clavelibro,numeroorden)
REFERENCES ejemplar(clavelibro,numeroorden)
ON DELETE SET NULL
ON UPDATE CASCADE
) ENGINE=InnoDB;

CREATE TABLE reserva (
claveusuarios INT,
clavelibro INT,
numeroorden SMALLINT,
fecha_reserva DATE NOT NULL,
notas BLOB,
FOREIGN KEY (claveusuarios)
REFERENCES usuarios(claveusuarios)
ON DELETE SET NULL
ON UPDATE CASCADE,
FOREIGN KEY (clavelibro,numeroorden)
REFERENCES ejemplar(clavelibro,numeroorden)
ON DELETE SET NULL
ON UPDATE CASCADE
) ENGINE=InnoDB;

CREATE TABLE trata_sobre (
clavelibro INT NOT NULL,
clavetema SMALLINT NOT NULL,
FOREIGN KEY (clavelibro)
REFERENCES libro(clavelibro)
ON DELETE CASCADE
ON UPDATE CASCADE,
FOREIGN KEY (clavetema)
REFERENCES tema(clavetema)
ON DELETE CASCADE
ON UPDATE CASCADE
) ENGINE=InnoDB;

CREATE TABLE escrito_por (
clavelibro INT NOT NULL,
claveautor INT NOT NULL,
FOREIGN KEY (clavelibro)
REFERENCES libro(clavelibro)
ON DELETE CASCADE
ON UPDATE CASCADE,
FOREIGN KEY (claveautor)
REFERENCES autor(claveautor)
ON DELETE CASCADE
ON UPDATE CASCADE
) ENGINE=InnoDB;

CREATE TABLE incidencias (
claveusuarios INT,
clavelibro INT,
numeroorden SMALLINT,
fechasancion DATE,
sancion INT,
fechadesbloqueo DATE,
observaciones BLOB,
FOREIGN KEY (clavelibro,numeroorden)
REFERENCES ejemplar(clavelibro,numeroorden),
FOREIGN KEY (claveusuarios)
REFERENCES usuarios(claveusuarios)
)ENGINE=InnoDB;

CREATE TABLE baja (
clavelibro INT,
numeroorden SMALLINT,
fecha_baja DATE NOT NULL,
observaciones BLOB,
FOREIGN KEY (clavelibro,numeroorden)
REFERENCES ejemplar(clavelibro,numeroorden)
ON DELETE SET NULL
ON UPDATE CASCADE
) ENGINE=InnoDB;

*/
