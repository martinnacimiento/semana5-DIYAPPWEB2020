
-- CREAR BASE DE DATOS
CREATE DATABASE semana5;

-- USAR BASE DE DATOS
USE semana5;

-- TABLA EMPRESAS
CREATE TABLE empresas (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(30) NOT NULL
);

-- TABLA PERSONAS
CREATE TABLE personas (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    cuil VARCHAR(10) NOT NULL,
    apellido VARCHAR(30) NOT NULL,
    nombre VARCHAR(30) NOT NULL,
    empresa_id INT(6) UNSIGNED,
    FOREIGN KEY (empresa_id) REFERENCES empresas(id)
);

-- TABLA EMPLEADOS
CREATE TABLE empleados (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    nro_legajo VARCHAR(7) NOT NULL,
    dependencia VARCHAR(25) NOT NULL,
    fecha_ingreso VARCHAR(10) NOT NULL,
    persona_id INT(6) UNSIGNED,
    FOREIGN KEY (persona_id) REFERENCES personas(id)
);

-- TABLA CORREOS
CREATE TABLE correos (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    email VARCHAR(30) NOT NULL,
    persona_id INT(6) UNSIGNED,
    FOREIGN KEY (persona_id) REFERENCES personas(id)
);

-- TABLA USUARIOS
CREATE TABLE usuarios (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(30) NOT NULL,
    password VARCHAR(60) NOT NULL,
    empresa_id INT(6) UNSIGNED,
    FOREIGN KEY (empresa_id) REFERENCES empresas(id)
);

-- TABLA PERMISOS
CREATE TABLE permisos (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    slug VARCHAR(30) NOT NULL,
    description VARCHAR(100) NOT NULL,
    empresa_id INT(6) UNSIGNED,
    FOREIGN KEY (empresa_id) REFERENCES empresas(id)
);

-- TABLA USUARIOS_PERMISOS
CREATE TABLE usuarios_permisos (
    usuario_id INT(6) UNSIGNED,
    permiso_id INT(6) UNSIGNED,
    FOREIGN KEY (usuario_id) REFERENCES usuarios(id),
    FOREIGN KEY (permiso_id) REFERENCES permisos(id)
);