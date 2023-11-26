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
    precio DECIMAL(10, 2) NOT NULL,
    idCategoria INT,
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
    idLinea INT PRIMARY KEY,
    idArticulo INT,
    Cantidad INT not null,
    Talla Varchar(2) null,
    Total_Linea Decimal (10,2),
    FOREIGN KEY (idArticulo) REFERENCES Articulo(idArticulo)
);
--------------------------------------------------------
--  DDL for Table FACTURA_ENCABEZADO
--------------------------------------------------------
CREATE TABLE Factura_Encabezado (
    idFactura INT PRIMARY KEY AUTO_INCREMENT,
    idUsuario INT,
    Fecha DATE,
    Total DECIMAL(10, 2),
    FOREIGN KEY (idUsuario) REFERENCES Usuario(idUsuario)
);
--------------------------------------------------------
--  DDL for Table FACTURA_DETALLE
--------------------------------------------------------
CREATE TABLE Factura_Detalle (
    idFactura INT,
    Num_Linea INT Primary Key AUTO_INCREMENT,
    Talla_Articulo Varchar(2) null,
    Cantidad_Articulo Int not null,
    Total_Linea DECIMAL(10, 2),
	FOREIGN KEY (idFactura) REFERENCES Factura_Encabezado(idFactura)
);

INSERT INTO Proyecto_db.Categoria(nombreCategoria, idCategoria) VALUES 
("Sudaderas",1), ("Camisetas",2) , ("Productos_Varios",3);

INSERT INTO Proyecto_db.Articulo(nombre, descripcion, ruta_imagen, precio,idCategoria) VALUES 
("Camiseta Land Rover", "Camiseta LandRover color Negro","https://i.imgur.com/eYSdIX0.png" ,7500 , 2),
("Hoddie HW", "Hoddie con logo de HW-Gris","https://i.imgur.com/PU8iZDy.png" ,15000 , 1),
("Skyline Shirt", "Camiseta con logo de SkyLine-Negra","https://i.imgur.com/2OAmETf.png" ,7500 , 2),
("Box-Box", "Camiseta Box F1-Blanca","https://i.imgur.com/9fL0Mzi.png" ,7500 , 2),
("Costa Rican's Nature", "Camiseta de Costa Rica con Oso Perezoso-Blanca","https://i.imgur.com/wcmZx43.png" ,7500 , 2),
("Gas Monkey Garage", "Camiseta Gas Monkey Garage-Blanca","https://i.imgur.com/UD8vYGv.png" ,7500 , 2),
("Territorio Tico", "Camiseta del Territorio Tico","https://i.imgur.com/FGcCWzw.png" ,7500 , 2),
("Mitsubishi", "Camiseta Mitsubishi-Negra","https://i.imgur.com/HTkYMEA.png" ,7500 , 2);

/*Solo se cuentan con dos Roles, ya que al ser una pagina para un negocio pequeño, 
todo lo hace el administrador (No cuenta con vendedores u otra clase de empleados que tengan que acceder)*/
INSERT INTO Proyecto_db.Rol(idRol, nombreRol)VALUES
(1,"Administrador"),(2,"Cliente");

/*Se va agregar unicamente el Usuario Administrador y 1 usuario cliente 
para que se pueda visualizar la pagina y con el afan de realizar pruebas*/
INSERT INTO Proyecto_db.Usuario( nombre , apellidos , email , clave , idRol)VALUES
("Roderick" ,"Campos" , "RodeCustoms@gmail.com" ,"Admin","1"),
("Ismael" ,"Leon" , "ismaleonsaenz@gmail.com" ,"123","2");


select * from Articulo;
select * from Usuario;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
