CREATE DATABASE yaprofe;

CREATE TABLE modalidad (
	id INTEGER NOT NULL PRIMARY KEY AUTO_INCREMENT,
	name VARCHAR(20)
);

CREATE TABLE niveleducacional (
	id INTEGER NOT NULL PRIMARY KEY AUTO_INCREMENT,
	name VARCHAR(60)
);

CREATE TABLE asignatura (
	id INTEGER NOT NULL PRIMARY KEY AUTO_INCREMENT,
	name VARCHAR(60)
);

CREATE TABLE users (
	id INTEGER NOT NULL PRIMARY KEY AUTO_INCREMENT,
	name VARCHAR(60) NOT NULL,
	lastname VARCHAR(120)NOT NULL,
	email VARCHAR(250) NOT NULL,
	password VARCHAR(250)NOT NULL,
	ciudad VARCHAR(60),
	telefono VARCHAR(30),
	descripcion VARCHAR(500),
	foto_perfil VARCHAR(250),
    id_modalidad INTEGER,
    id_niveleducacional INTEGER,
    id_asignatura INTEGER,
	INDEX (id_modalidad),
    INDEX (id_niveleducacional),
    INDEX (id_asignatura),
    FOREIGN KEY (id_modalidad) REFERENCES modalidad(id),
	FOREIGN KEY (id_niveleducacional) REFERENCES niveleducacional(id),
	FOREIGN KEY (id_asignatura) REFERENCES asignatura(id)
);



