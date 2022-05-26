create DATABASE easytravelst2122;
USE EasyTravelst2122;
CREATE USER 'adminuser'@'localhost' IDENTIFIED BY 'admin123'; 
GRANT ALL PRIVILEGES ON * . * to 'adminuser'@'localhost'; 
CREATE TABLE Usuario(
	idUsuario INT NOT NULL AUTO_INCREMENT UNIQUE PRIMARY KEY,
    nombre VARCHAR(20) NOT NULL,
    apellido1 VARCHAR(20) NULL, 
    apellido2 VARCHAR(20) NULL, 
    fechaDeNacimiento DATE NOT NULL, 
    telefono VARCHAR(9) NULL, 
    mail VARCHAR(50) NOT NULL,
    nombreUsuario VARCHAR(10) UNIQUE NOT NULL,
    userPassword VARCHAR(60) NOT NULL, 
    rol VARCHAR(10) DEFAULT('user') NOT NULL     
); 

CREATE TABLE TARJETA (
	idUsuario INT NOT NULL,
	numero VARCHAR(16) NOT NULL,
    fecha VARCHAR(100) NOT NULL,
    cvc VARCHAR(3) NOT NULL,
    nombre VARCHAR(100) NOT NULL,
    CONSTRAINT pk_id PRIMARY KEY(idUsuario),
    CONSTRAINT fk_id FOREIGN KEY(idUsuario) REFERENCES Usuario(idUsuario)
);
SELECT * FROM TARJETA;
DROP TABLE TARJETA;


CREATE TABLE Producto(
	idProducto INT NOT NULL AUTO_INCREMENT UNIQUE PRIMARY KEY, 
    nombre VARCHAR(20) NOT NULL, 
    precio INT NOT NULL, 
    descripcion VARCHAR (250) NOT NULL,
    stock INT NOT NULL, 
    Habilitado BOOLEAN NOT NULL
); 

CREATE TABLE Carrito(
	producto int NOT NULL,
    usuario int NOT NULL,
    CONSTRAINT pkCarrito PRIMARY KEY(producto, usuario), 
    CONSTRAINT fk_carrito_producto FOREIGN KEY(producto) REFERENCES Producto(idProducto),
    CONSTRAINT fk_carrito_usuario FOREIGN KEY(usuario) REFERENCES Usuario(idUsuario)
);

CREATE TABLE Logros(
	idLogro INT AUTO_INCREMENT UNIQUE NOT NULL,
    nombre VARCHAR(20) NOT NULL, 
    descripcion VARCHAR(100) NOT NULL 
);


CREATE TABLE logrosObtenidos(
	logro INT NOT NULL,
    usuario INT NOT NULL,
    fechaObtención DATETIME NOT NULL, 
    CONSTRAINT pk_logrosObtenidos PRIMARY KEY(logro, usuario),
    CONSTRAINT fk_logrosObtenidos_logro FOREIGN KEY(logro) REFERENCES Logros(idLogro),
    CONSTRAINT fk_logrosObtenidos_usuario FOREIGN KEY(usuario) REFERENCES Usuario(idUsuario)
); 



CREATE TABLE Intereses(
	idInteres INT AUTO_INCREMENT UNIQUE NOT NULL PRIMARY KEY, 
    nombre VARCHAR(25) NOT NULL, 
    descripcion VARCHAR(100) NOT NULL
);

CREATE TABLE UsuarioInteres(
	interes INT NOT NULL, 
    usuario INT NOT NULL, 
    CONSTRAINT pk_UsuarioInteres PRIMARY KEY(interes, usuario),
    CONSTRAINT fk_UsuarioInteres_interes FOREIGN KEY(interes) REFERENCES Intereses(idInteres),
    CONSTRAINT fk_UsuarioInteres_usuario FOREIGN KEY(usuario) REFERENCES Usuario(idUsuario)
); 

CREATE TABLE Actividades(
	idActividad INT AUTO_INCREMENT UNIQUE NOT NULL PRIMARY KEY, 
    nombre VARCHAR(20) NOT NULL, 
    descripcion VARCHAR(150) NOT NULL,
    precio INT NOT NULL, 
    duracionEstimada TIME NOT NULL
);

CREATE TABLE ActividadesSueltas(
	actividad INT NOT NULL, 
    usuario INT NOT NULL, 
    CONSTRAINT pk_ActividadesSueltas PRIMARY KEY(actividad,usuario), 
    CONSTRAINT fk_ActividadesSueltas_actividad FOREIGN KEY(actividad) REFERENCES Actividades(idActividad),
    CONSTRAINT fk_ActividadesSueltas_usuario FOREIGN KEY(usuario) REFERENCES Usuario(idUsuario)
); 

CREATE TABLE Intereses_Actividades(
	interes INT NOT NULL,
    actividad INT NOT NULL, 
    CONSTRAINT pk_Intereses_Actividades PRIMARY KEY(interes,actividad),
    CONSTRAINT fk_Intereses_Actividades_interes FOREIGN KEY(interes) REFERENCES Intereses(idInteres),
    CONSTRAINT fk_Intereses_Actividades_actividad FOREIGN KEY(actividad) REFERENCES Actividades(idActividad)
); 

CREATE TABLE Estancia(
	idEstancia INT AUTO_INCREMENT UNIQUE NOT NULL PRIMARY KEY, 
    fechaInicio DATETIME NOT NULL,
    fechaFin DATETIME NOT NULL, 
    nombre VARCHAR(20), 
    descripcion VARCHAR(250), 
    precioDia INT NOT NULL, 
    precioTotal INT NOT NULL
); 

CREATE TABLE Vuelo(
	idVuelo INT AUTO_INCREMENT UNIQUE NOT NULL PRIMARY KEY, 
    aeroliniea VARCHAR(25) NOT NULL, 
    ciudadDestino VARCHAR(30) NOT NULL, 
    ciudadOrigen VARCHAR(30) NOT NULL, 
    fechaSalida DATETIME NOT NULL, 
    fechaVuelta DATETIME NOT NULL
); 
CREATE TABLE Viaje(
	idViaje INT AUTO_INCREMENT NOT NULL PRIMARY KEY, 
    fechaInicio DATE NOT NULL, 
    fechaFin DATE NOT NULL, 
    idVuelo INT NOT NULL, 
    idEstancia INT NOT NULL
); 

CREATE TABLE Planner(
	actividad INT NOT NULL, 
    viaje INT NOT NULL, 
    idPlanner INT AUTO_INCREMENT UNIQUE NOT NULL, 
    CONSTRAINT pk_Planner PRIMARY KEY(actividad,viaje,idPlanner), 
    CONSTRAINT fk_Planner_actividad FOREIGN KEY(actividad) REFERENCES Actividades(idActividad), 
    CONSTRAINT fk_Planner_viaje FOREIGN KEY(viaje) REFERENCES Viaje(idViaje) 
); 

insert into intereses VALUES(1,"Arte","Me vale verga");
insert into intereses VALUES(2,"Night Life","Me vale verga");
insert into intereses VALUES(3,"Rural","Me vale verga");
insert into intereses VALUES(4,"Tecnologia","Me vale verga");
insert into intereses VALUES(5,"Eventos","Me vale verga");
insert into intereses VALUES(6,"Ocio","Me vale verga");
insert into intereses VALUES(7,"Gastronomia","Me vale verga");
insert into intereses VALUES(8,"Naturaleza","Me vale verga");
insert into intereses VALUES(9,"Cultura","Me vale verga");
insert into intereses VALUES(10,"Deporte","Me vale verga");

