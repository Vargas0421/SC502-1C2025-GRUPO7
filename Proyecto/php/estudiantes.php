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

// Definimos cursos quemados
$cursos = [
    new Curso("Matemáticas", "Juan Pérez", 4, 30, "Lunes 8:00 - 10:00", "Sede Central"),
    new Curso("Programación", "Ana Gómez", 3, 25, "Martes 10:00 - 12:00", "Sede Norte"),
    new Curso("Bases de Datos", "Carlos Ramírez", 4, 20, "Miércoles 14:00 - 16:00", "Sede Sur"),
];
?>
