<?php
class Curso {
    public $nombre;
    public $profesor;
    public $creditos;
    public $cantidadAlumnos;
    public $horario;
    public $sede;

    public function __construct($nombre, $profesor, $creditos, $cantidadAlumnos, $horario, $sede) {
        $this->nombre = $nombre;
        $this->profesor = $profesor;
        $this->creditos = $creditos;
        $this->cantidadAlumnos = $cantidadAlumnos;
        $this->horario = $horario;
        $this->sede = $sede;
    }
}

$cursos = [
    new Curso("Bases de Datos", "Carlos Ramírez", 4, 20, "Miércoles 14:00 - 16:00", "Sede Sur"),
    new Curso("Programación Web", "Laura Fernández", 3, 25, "Lunes 10:00 - 12:00", "Sede Norte"),
    new Curso("Inteligencia Artificial", "Roberto Castro", 5, 15, "Viernes 08:00 - 10:00", "Sede Central"),
    new Curso("Estructuras de Datos", "María Jiménez", 4, 30, "Martes 14:00 - 16:00", "Sede Este"),
    new Curso("Redes de Computadoras", "José Rodríguez", 3, 18, "Jueves 09:00 - 11:00", "Sede Oeste"),
    new Curso("Ciberseguridad", "Ana Méndez", 4, 22, "Lunes 13:00 - 15:00", "Sede Central"),
    new Curso("Desarrollo Móvil", "Daniel Vargas", 3, 20, "Miércoles 16:00 - 18:00", "Sede Sur"),
    new Curso("Sistemas Operativos", "Pedro López", 4, 28, "Viernes 10:00 - 12:00", "Sede Norte"),
    new Curso("Análisis y Diseño de Sistemas", "Fernanda Rojas", 3, 26, "Martes 08:00 - 10:00", "Sede Este"),
    new Curso("Gestión de Proyectos", "Luis Herrera", 2, 24, "Jueves 15:00 - 17:00", "Sede Oeste"),
    new Curso("Arquitectura de Computadoras", "Elena Gutiérrez", 5, 12, "Lunes 09:00 - 11:00", "Sede Central"),
    new Curso("Big Data", "Manuel Pérez", 4, 18, "Miércoles 12:00 - 14:00", "Sede Norte"),
    new Curso("Desarrollo de Videojuegos", "Carmen Salazar", 3, 21, "Viernes 14:00 - 16:00", "Sede Sur"),
    new Curso("Computación en la Nube", "Héctor Ramírez", 4, 17, "Martes 11:00 - 13:00", "Sede Oeste"),
    new Curso("Internet de las Cosas", "Patricia León", 3, 19, "Jueves 08:00 - 10:00", "Sede Este")
];
?>
