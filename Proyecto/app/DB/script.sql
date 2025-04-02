DROP DATABASE IF EXISTS sc502_1c2025_grupo7;
CREATE DATABASE sc502_1c2025_grupo7;
USE sc502_1c2025_grupo7;

-- Eliminar tablas si ya existen
DROP TABLE IF EXISTS Direccion;
DROP TABLE IF EXISTS Profesores;
DROP TABLE IF EXISTS Estudiantes;
DROP TABLE IF EXISTS Telefonos;
DROP TABLE IF EXISTS Cursos;
DROP TABLE IF EXISTS Profesor_Curso;
DROP TABLE IF EXISTS Estudiante_Curso;
DROP TABLE IF EXISTS Horarios;
DROP TABLE IF EXISTS Salarios;
DROP TABLE IF EXISTS Metodos_Pago;
DROP TABLE IF EXISTS Pagos;
DROP TABLE IF EXISTS Tipos_Telefono;
DROP TABLE IF EXISTS Historial_Salarios;
DROP TABLE IF EXISTS Estados_Inscripcion;
DROP TABLE IF EXISTS Inscripciones;
DROP TABLE IF EXISTS Turnos;

-- Crear las tablas nuevamente
CREATE TABLE Direccion (
  id_direccion INT PRIMARY KEY AUTO_INCREMENT,
  calle VARCHAR(150) NOT NULL,
  ciudad VARCHAR(100) NOT NULL,
  estado VARCHAR(100) NOT NULL,
  codigo_postal VARCHAR(10) NOT NULL
);

CREATE TABLE Profesores (
  id_profesor INT PRIMARY KEY AUTO_INCREMENT,
  nombre VARCHAR(100) NOT NULL,
  apellido VARCHAR(100) NOT NULL,
  email VARCHAR(100) UNIQUE NOT NULL,
  password VARCHAR(255) NOT NULL,
  direccion_id INT,
  puesto VARCHAR(200),
  FOREIGN KEY (direccion_id) REFERENCES Direccion(id_direccion)
);

CREATE TABLE Estudiantes (
  id_estudiante INT PRIMARY KEY AUTO_INCREMENT,
  nombre VARCHAR(100) NOT NULL,
  apellido VARCHAR(100) NOT NULL,
  email VARCHAR(100) UNIQUE NOT NULL,
  password VARCHAR(255) NOT NULL,
  direccion_id INT,
  FOREIGN KEY (direccion_id) REFERENCES Direccion(id_direccion)
);

CREATE TABLE Telefonos (
  id_telefono INT PRIMARY KEY AUTO_INCREMENT,
  id_persona INT NOT NULL,
  tipo ENUM('Profesor', 'Estudiante') NOT NULL,
  numero VARCHAR(20) UNIQUE NOT NULL
);

CREATE TABLE Cursos (
  id_curso INT PRIMARY KEY AUTO_INCREMENT,
  nombre_curso VARCHAR(150) NOT NULL,
  descripcion TEXT
);

CREATE TABLE Profesor_Curso (
  id_profesor INT NOT NULL,
  id_curso INT NOT NULL,
  PRIMARY KEY (id_profesor, id_curso),
  FOREIGN KEY (id_profesor) REFERENCES Profesores(id_profesor),
  FOREIGN KEY (id_curso) REFERENCES Cursos(id_curso)
);

CREATE TABLE Estudiante_Curso (
  id_estudiante INT NOT NULL,
  id_curso INT NOT NULL,
  fecha_inscripcion DATE NOT NULL,
  PRIMARY KEY (id_estudiante, id_curso),
  FOREIGN KEY (id_estudiante) REFERENCES Estudiantes(id_estudiante),
  FOREIGN KEY (id_curso) REFERENCES Cursos(id_curso)
);

CREATE TABLE Horarios (
  id_horario INT PRIMARY KEY AUTO_INCREMENT,
  id_curso INT NOT NULL,
  dia_semana ENUM('Lunes', 'Martes', 'Miércoles', 'Jueves', 'Viernes', 'Sábado', 'Domingo') NOT NULL,
  hora_inicio TIME NOT NULL,
  hora_fin TIME NOT NULL,
  FOREIGN KEY (id_curso) REFERENCES Cursos(id_curso)
);

CREATE TABLE Salarios (
  id_salario INT PRIMARY KEY AUTO_INCREMENT,
  id_profesor INT UNIQUE NOT NULL,
  salario DECIMAL(10,2) NOT NULL,
  fecha_actualizacion DATE NOT NULL,
  FOREIGN KEY (id_profesor) REFERENCES Profesores(id_profesor)
);

CREATE TABLE Metodos_Pago (
  id_metodo_pago INT PRIMARY KEY AUTO_INCREMENT,
  nombre_metodo VARCHAR(50) UNIQUE NOT NULL
);

CREATE TABLE Pagos (
  id_pago INT PRIMARY KEY AUTO_INCREMENT,
  id_estudiante INT NOT NULL,
  monto DECIMAL(10,2) NOT NULL,
  fecha_pago DATE NOT NULL,
  id_metodo_pago INT NOT NULL,
  FOREIGN KEY (id_estudiante) REFERENCES Estudiantes(id_estudiante),
  FOREIGN KEY (id_metodo_pago) REFERENCES Metodos_Pago(id_metodo_pago)
);

CREATE TABLE Tipos_Telefono (
  id_tipo_telefono INT PRIMARY KEY AUTO_INCREMENT,
  tipo VARCHAR(50) UNIQUE NOT NULL
);

CREATE TABLE Historial_Salarios (
  id_historial INT PRIMARY KEY AUTO_INCREMENT,
  id_profesor INT NOT NULL,
  salario DECIMAL(10,2) NOT NULL,
  fecha_inicio DATE NOT NULL,
  fecha_fin DATE,
  FOREIGN KEY (id_profesor) REFERENCES Profesores(id_profesor)
);

CREATE TABLE Estados_Inscripcion (
  id_estado INT PRIMARY KEY AUTO_INCREMENT,
  estado VARCHAR(50) UNIQUE NOT NULL
);

CREATE TABLE Inscripciones (
  id_inscripcion INT PRIMARY KEY AUTO_INCREMENT,
  id_estudiante INT NOT NULL,
  id_curso INT NOT NULL,
  fecha_inscripcion DATE NOT NULL,
  id_estado INT NOT NULL DEFAULT 1,
  FOREIGN KEY (id_estudiante) REFERENCES Estudiantes(id_estudiante),
  FOREIGN KEY (id_curso) REFERENCES Cursos(id_curso),
  FOREIGN KEY (id_estado) REFERENCES Estados_Inscripcion(id_estado)
);

CREATE TABLE Turnos (
  id_turno INT PRIMARY KEY AUTO_INCREMENT,
  nombre_turno VARCHAR(50) UNIQUE NOT NULL,
  hora_inicio TIME NOT NULL,
  hora_fin TIME NOT NULL
);

-- Insertar los datos nuevamente
INSERT INTO Direccion (calle, ciudad, estado, codigo_postal) VALUES
('Av. Central 123', 'San José', 'San José', '10101'),
('Calle 45 Norte', 'Heredia', 'Heredia', '40101');

INSERT INTO Profesores (nombre, apellido, email, password, direccion_id, puesto) VALUES
('Carlos', 'Fernández', 'cfernandez@gmail.com', 'clave123', 1, NULL),
('María', 'Gómez', 'mgomez@gmail.com', 'segura456', 2, NULL),
('Brandon', 'Vargas', 'Bvargas@mail.com', 'a', 2, 'Fullstack Developer');

INSERT INTO Estudiantes (nombre, apellido, email, password, direccion_id) VALUES
('Juan', 'Pérez', 'jperez@gmail.com', 'estudiante789', 1),
('Ana', 'Ramírez', 'aramirez@gmail.com', 'claveestu123', 2);
