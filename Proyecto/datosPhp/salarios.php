<?php
class Salario {
    public $cantidad;
    public $fecha;

    public function __construct($cantidad, $fecha) {
        $this->cantidad = $cantidad;
        $this->fecha = $fecha;
    }
}

$salarios = [
    new Salario(500000, "2024-01-15"),
    new Salario(510000, "2024-01-30"),  // Subió
    new Salario(500000, "2024-02-15"),  // Bajó
    new Salario(505000, "2024-02-28"),  // Subió
    new Salario(505000, "2024-03-15"),  // No cambió
    new Salario(500000, "2024-03-30"),  // Bajó
    new Salario(510000, "2024-04-15"),  // Subió
    new Salario(505000, "2024-04-30"),  // Bajó
    new Salario(500000, "2024-05-15"),  // No cambió
    new Salario(495000, "2024-05-30"),  // Bajó
    new Salario(505000, "2024-06-15"),  // Subió
    new Salario(515000, "2024-06-30"),  // Subió
    new Salario(510000, "2024-07-15"),  // Bajó
    new Salario(510000, "2024-07-30"),  // No cambió
    new Salario(520000, "2024-08-15"),  // Subió
    new Salario(515000, "2024-08-30"),  // Bajó
    new Salario(525000, "2024-09-15"),  // Subió
    new Salario(520000, "2024-09-30")  // Bajó
    
];
?>
