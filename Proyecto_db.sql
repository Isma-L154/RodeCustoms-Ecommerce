create database Proyecto_db;
use Proyecto_db;

/*Crear el usuario y conectarse a la base de datos con este usuario*/
create user 'Usuario123'@'%' identified by 'Proyecto';

/*Se asignan los prvilegios sobre la base de datos al usuario creado */
grant all privileges on Proyecto_db.* to 'Usuario123'@'%';
flush privileges;

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--------------------------------------------------------
--  DDL for Table Tipo_Prroducto
--------------------------------------------------------
CREATE TABLE Tipo_Producto(
idProducto INT PRIMARY KEY,
NombreTipo VARCHAR(255)
);
--------------------------------------------------------
--  DDL for Table Categoria
--------------------------------------------------------
CREATE TABLE Categoria (
    idCategoria INT PRIMARY KEY,
    nombreCategoria VARCHAR(50) NOT NULL
);
--------------------------------------------------------
--  DDL for Table ARTICULO
--------------------------------------------------------
CREATE TABLE Articulo (
    idArticulo INT PRIMARY KEY AUTO_INCREMENT,
    nombre VARCHAR(255) NOT NULL,
    descripcion VARCHAR(250),
    ruta_imagen VARCHAR(500),
    precio DECIMAL(10) NOT NULL,
    idCategoria INT,
    idTipoProducto INT,
	FOREIGN KEY (idTipoProducto) REFERENCES Tipo_Producto(idProducto), 
    FOREIGN KEY (idCategoria) REFERENCES Categoria(idCategoria)
);
--------------------------------------------------------
--  DDL for Table ARTICULO_Personalizable
--------------------------------------------------------
CREATE TABLE Articulo_Personalize (
    id INT PRIMARY KEY AUTO_INCREMENT,
    nombre VARCHAR(255) NOT NULL,
	descripcion VARCHAR(250),
    ruta_imagen VARCHAR(500),
    precio DECIMAL(10) NOT NULL,
    idCategoria INT,
    idTipoProducto INT,
	FOREIGN KEY (idTipoProducto) REFERENCES Tipo_Producto(idProducto), 
    FOREIGN KEY (idCategoria) REFERENCES Categoria(idCategoria)
);
--------------------------------------------------------
--  DDL for Table Rol
--------------------------------------------------------
CREATE TABLE Rol (
    idRol INT PRIMARY KEY,
    nombreRol VARCHAR(50) NOT NULL
);

--------------------------------------------------------
--  DDL for Table Usuario
--------------------------------------------------------

CREATE TABLE Usuario (
    idUsuario INT PRIMARY KEY AUTO_INCREMENT,
    nombre VARCHAR(50) NOT NULL,
    apellidos VARCHAR(50) NOT NULL,
    email VARCHAR(255) NOT NULL UNIQUE KEY,
    clave VARCHAR(255) NOT NULL,
    idRol INT,
    FOREIGN KEY (idRol) REFERENCES Rol(idRol)
);
--------------------------------------------------------
--  DDL for Table CARRITO
--------------------------------------------------------
CREATE TABLE Carrito (
    idLinea INT PRIMARY KEY AUTO_INCREMENT,
    idArticulo INT null,
    idArtPersonalizado INT null,
    Cantidad INT not null,
    Talla Varchar(2) null,
    Total_Linea Decimal (10),
	FOREIGN KEY (idArtPersonalizado) REFERENCES Articulo_Personalize(id),
    FOREIGN KEY (idArticulo) REFERENCES Articulo(idArticulo)
);
--------------------------------------------------------
--  DDL for Table Reportes
--------------------------------------------------------
Create table Reports(
idReport INT PRIMARY KEY AUTO_INCREMENT
);
--------------------------------------------------------
--  DDL for Table FACTURA_ENCABEZADO
--------------------------------------------------------
CREATE TABLE Factura_Encabezado (
    idFactura INT PRIMARY KEY AUTO_INCREMENT,
    idUsuario INT,
    Fecha DATE,
    Total DECIMAL(10),
    FOREIGN KEY (idUsuario) REFERENCES Usuario(idUsuario)
);
--------------------------------------------------------
--  DDL for Table FACTURA_DETALLE
--------------------------------------------------------
CREATE TABLE Factura_Detalle (
    idFactura INT,
    Num_Linea INT Primary Key AUTO_INCREMENT,
    Linea_Carrito int,
    FOREIGN KEY (Linea_Carrito) REFERENCES  Carrito(idLinea),
	FOREIGN KEY (idFactura) REFERENCES Factura_Encabezado(idFactura)
);

drop table Carrito;
INSERT INTO Proyecto_db.Tipo_Producto(idProducto , NombreTipo) VALUES
(1, "Articulos Regulares"),(2, "Articulos Personalizables");

INSERT INTO Proyecto_db.Categoria(nombreCategoria, idCategoria) VALUES 
("Sudaderas",1), ("Camisetas",2) ,("Productos_Varios",3);

INSERT INTO Proyecto_db.Articulo(nombre, descripcion, ruta_imagen, precio,idCategoria, idTipoProducto) VALUES 
("Camiseta Land Rover", "Camiseta LandRover color Negro","https://i.imgur.com/eYSdIX0.png" ,7500 , 2, 1 ),
("Hoddie HW", "Hoddie con logo de HW-Gris","https://i.imgur.com/PU8iZDy.png" ,15000 , 1, 1),
("Skyline Shirt", "Camiseta con logo de SkyLine-Negra","https://i.imgur.com/2OAmETf.png" ,7500 , 2, 1),
("Box-Box", "Camiseta Box F1-Blanca","https://i.imgur.com/9fL0Mzi.png" ,7500 , 2, 1),
("Costa Rican's Nature", "Camiseta de Costa Rica con Oso Perezoso-Blanca","https://i.imgur.com/wcmZx43.png" ,7500 , 2, 1),
("Gas Monkey Garage", "Camiseta Gas Monkey Garage-Blanca","https://i.imgur.com/UD8vYGv.png" ,7500 , 2, 1),
("Territorio Tico", "Camiseta del Territorio Tico","https://i.imgur.com/FGcCWzw.png" ,7500 , 2, 1),
("Mitsubishi", "Camiseta Mitsubishi-Negra","https://i.imgur.com/HTkYMEA.png" ,7500 , 2, 1);

INSERT INTO Proyecto_db.Articulo_Personalize(nombre, descripcion, ruta_imagen, precio,idCategoria, idTipoProducto) VALUES
("Estampado Grande", "Área del estampado: no mas de 28x28cm. Tamaño ideal para el frente de la camiseta o espalda. Colores de la camiseta a elegir.","https://i.imgur.com/qvcKOsy.png" ,13000, 2,2),
("Estampado pequeño", "Área del estampado: no mas de 8x8cm. Tamaño ideal para pecho o manga. Colores de la camiseta a elegir.","https://i.imgur.com/vGBs1aQ.png" ,8500 , 2,2),
("Estampado regular", "Área del estampado: no mas de 20x20cm. Tamaño ideal para el frente de la camiseta. Colores de la camiseta a elegir.","https://i.imgur.com/VAf06Ng.png" ,10500 , 2,2),
("Estampado extra", "Estampado extra de no más de 20x20 cm","https://i.imgur.com/ZwgrUjS.png" ,3500 , 2, 2),
("Estampado frente", "Área del estampado: no mas de 20x20cm. Colores del hoodie a elegir.","https://i.imgur.com/7Y8SNg6.png" ,13000 , 1,2),
("Estampado espalda", "Área del estampado: no mas de 28x28cm. Colores del hoodie a elegir.","https://i.imgur.com/2pXJyXi.png" , 16000 , 1,2),
("Estampado manga", "Área del estampado: no mas de 38x5cm. Colores del hoodie a elegir.","https://i.imgur.com/hmJMzvR.png" , 13000 , 1,2),
("Estampado extra", "Estampado extra de no más de 20x20 cm","https://i.imgur.com/C8GRo8B.png" ,3500 , 1,2);

INSERT INTO Proyecto_db.Rol(idRol, nombreRol)VALUES
(1,"Administrador"),(2,"Cliente");

select * from Articulo_Personalize;
select * from Articulo;
select * from Usuario;
select * from Carrito;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
