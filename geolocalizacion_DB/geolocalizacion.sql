CREATE TABLE Persona
(
licencia varchar(7) NOT NULL,
nombre varchar(255) NOT NULL,
apellido varchar(255) NOT NULL,
direccion varchar(255) NOT NULL,
celular varchar(9) NOT NULL,
email varchar(255) NOT NULL,
foto varchar(255) NOT NULL,
PRIMARY KEY (licencia)
);

CREATE TABLE lugar (
id int AUTO_INCREMENT,
nomLugar varchar(255) NOT NULL,
latitud varchar(255) NOT NULL,
longitud varchar(255) NOT NULL,
codLugar varchar(255) NOT NULL,
PRIMARY KEY (id)
);
CREATE TABLE usuarios(
id int AUTO_INCREMENT,
nombres varchar(255) NOT NULL,
usuarios varchar(255) NOT NULL,
password varchar(255) NOT NULL,
tipo varchar(255) NOT NULL,
PRIMARY KEY (id)
);
CREATE TABLE icono(
codicono int AUTO_INCREMENT,
desicono varchar(255) NOT NULL,
imagen varchar(255) NOT NULL,
PRIMARY KEY (codicono)
);
CREATE TABLE auto(
placa varchar(7) NOT NULL,
codicono int NOT NULL,
color varchar(255) NOT NULL,
foto varchar(255) NOT NULL,
marca varchar(255) NOT NULL,

PRIMARY KEY(placa),
FOREIGN KEY(codicono)
REFERENCES icono(codicono)
ON DELETE CASCADE
ON UPDATE CASCADE
);
CREATE TABLE conduce(
id int AUTO_INCREMENT,
licencia varchar(255) NOT NULL,
placa varchar(7) NOT NULL,
PRIMARY KEY(id),
FOREIGN KEY(licencia)
REFERENCES Persona(licencia)
ON DELETE CASCADE
ON UPDATE CASCADE,

FOREIGN KEY(placa)
REFERENCES auto(placa)
ON DELETE CASCADE
ON UPDATE CASCADE
);
CREATE TABLE trakeo(
codigo int AUTO_INCREMENT,
placa varchar(7) NOT NULL,
codLugar int NOT NULL,
fecha date NOT NULL,
hora time NOT NULL,
velocidad varchar(255) NOT NULL,

PRIMARY KEY(codigo),
FOREIGN KEY(codLugar)
REFERENCES lugar(id)
ON DELETE CASCADE
ON UPDATE CASCADE,

FOREIGN KEY(placa)
REFERENCES auto(placa)
ON DELETE CASCADE
ON UPDATE CASCADE
);