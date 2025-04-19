DROP DATABASE IF EXISTS sc502_1c2025_grupo7;
CREATE DATABASE sc502_1c2025_grupo7;
USE sc502_1c2025_grupo7;

-- Eliminar tablas si ya existen
DROP TABLE IF EXISTS Direccion;
DROP TABLE IF EXISTS Profesores;
DROP TABLE IF EXISTS Estudiantes;
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

CREATE TABLE Rol (
  id_rol INT PRIMARY KEY AUTO_INCREMENT, 
  nombre varchar(30) not null
);

CREATE TABLE Profesores (
  id_profesor INT PRIMARY KEY AUTO_INCREMENT,
  nombre VARCHAR(100) NOT NULL,
  apellido VARCHAR(100) NOT NULL,
  email VARCHAR(100) UNIQUE NOT NULL,
  password VARCHAR(255) NOT NULL,
  id_direccion INT,
  telefono VARCHAR(20),
  puesto VARCHAR(200),
  rol_id int,
  FOREIGN KEY (rol_id) REFERENCES Rol(id_rol),
  FOREIGN KEY (id_direccion) REFERENCES Direccion(id_direccion)
);

CREATE TABLE Calendario (
  id_calendario INT PRIMARY KEY AUTO_INCREMENT,
  titulo VARCHAR(50) NOT NULL,
  descripcion VARCHAR(200) NOT NULL,
  fecha_inicial DATE NOT NULL,
  hora TIME NOT NULL,
  id_profesor INT NULL,
  FOREIGN KEY (id_profesor) REFERENCES Profesores(id_profesor)
);

CREATE TABLE Estudiantes (
  id_estudiante INT PRIMARY KEY AUTO_INCREMENT,
  nombre VARCHAR(100) NOT NULL,
  apellido VARCHAR(100) NOT NULL,
  email VARCHAR(100) UNIQUE NOT NULL,
  password VARCHAR(255) NOT NULL,
  id_direccion INT,
  telefono VARCHAR(20),
  rol_id int,
  FOREIGN KEY (rol_id) REFERENCES Rol(id_rol),
  FOREIGN KEY (id_direccion) REFERENCES Direccion(id_direccion)
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


INSERT INTO Direccion (calle, ciudad, estado, codigo_postal) VALUES
('Av. Central 123', 'San José', 'San José', '10101'),
('Calle 45 Norte', 'Heredia', 'Heredia', '40101');

INSERT INTO Profesores (nombre, apellido, email, password, id_direccion, telefono, puesto) VALUES
('Carlos', 'Fernández', 'cfernandez@gmail.com', '$2y$10$g9XEJoeckD3bpFecolW0RuvckRwiQTgc5t5BaRKORNx58SaAUrJMi', 1, "8765-4321", 'Profesor de Matemáticas'), -- clave123
('María', 'Gómez', 'mgomez@gmail.com', '$2y$10$G2zZGmUE3kqlySzoO9.ncOLaSRu1eeMsM7L.jXiOJ1Ql4Ze8Jc0wK', 2, "6012-3456", 'Profesor de Física'), -- segura456
('Brandon', 'Vargas', 'Bvargas@mail.com', '$2y$10$XR5iv7bWJmHN9Sdx2ZHcfu7MfFiGeJCq2K2sX6wYmI1YH.uyYVMAC', 2, "8369-0296", 'Desarrollador Full Stack'); -- a


-- $2y$10$l72HvHwGi/56GRiLBXMdles5SnrTet4voyXRpW4mDU.Z2Vo62tUAC
-- $2y$10$jwYhRg0q/CUDLINUIyMK9uHHM0TzjBMxJ0CijmgwFjuwqJuzd5BHy
-- $2y$10$doMJlJNU/XP3nraYY8M2tee3ElzpzKVMbkqfCMxQNkmDDIgRhoC/q



INSERT INTO Estudiantes (nombre, apellido, email, password, id_direccion, telefono) VALUES
('Juan', 'Pérez', 'jperez@gmail.com', 'estudiante789', 1, "7111-2222"),
('Ana', 'Ramírez', 'aramirez@gmail.com', 'claveestu123', 2, "8333-9999");

INSERT INTO Cursos (nombre_curso, descripcion) VALUES
('Matemáticas Avanzadas', 'Curso sobre álgebra y cálculo avanzado'),
('Física Moderna', 'Introducción a la física cuántica y relatividad');

INSERT INTO Profesor_Curso (id_profesor, id_curso) VALUES
(1, 1),  
(2, 2);  

INSERT INTO Rol (id_rol, nombre) VALUES
(1, "Admin"),
(2, "Usuario Comun");

INSERT INTO Estudiante_Curso (id_estudiante, id_curso, fecha_inscripcion) VALUES
(1, 1, '2025-03-01'),  
(2, 2, '2025-03-01');  

INSERT INTO Horarios (id_curso, dia_semana, hora_inicio, hora_fin) VALUES
(1, 'Lunes', '08:00', '11:00'),  
(2, 'Martes', '10:00', '13:00');  

INSERT INTO Salarios (id_profesor, salario, fecha_actualizacion) VALUES
(1, 1500.00, '2025-04-01'),
(2, 1600.00, '2025-04-22'); 

INSERT INTO Historial_Salarios (id_profesor, salario, fecha_inicio, fecha_fin) VALUES
(1, 1450.00, '2025-01-01', '2025-03-31'),  
(2, 1550.00, '2025-01-01', '2025-03-31'),
(1, 1450.00, '2025-01-01', '2025-03-31'),
(2, 1550.00, '2025-01-01', '2025-03-31'),
(1, 1650.00, '2025-01-15', '2025-03-31'),
(2, 1800.00, '2025-02-01', '2025-05-09'),
(1, 1520.00, '2025-03-01', '2025-05-14'),
(2, 1680.50, '2025-04-01', '2025-05-31'),
(1, 1850.75, '2025-04-15', '2025-06-14'),
(2, 1590.20, '2025-05-01', '2025-06-30'); 

INSERT INTO Metodos_Pago (nombre_metodo) VALUES
('Tarjeta de Crédito'),
('Transferencia Bancaria');

INSERT INTO Pagos (id_estudiante, monto, fecha_pago, id_metodo_pago) VALUES
(1, 200.00, '2025-04-01', 1),  
(2, 250.00, '2025-04-01', 2); 


INSERT INTO Estados_Inscripcion (estado) VALUES
('Inscrito'),
('Pendiente');

INSERT INTO Inscripciones (id_estudiante, id_curso, fecha_inscripcion, id_estado) VALUES
(1, 1, '2025-03-01', 1),  
(2, 2, '2025-03-01', 1);  

INSERT INTO Turnos (nombre_turno, hora_inicio, hora_fin) VALUES
('Mañana', '08:00', '11:00'),
('Tarde', '14:00', '17:00');
