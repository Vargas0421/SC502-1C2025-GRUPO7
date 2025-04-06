<?php

class EstudiantesModel {
    private $pdo;

    public function __construct($pdo) {
        $this->pdo = $pdo;
    }

    public function obtenerEstudiantes() {
        $stmt = $this->pdo->prepare('SELECT * FROM estudiantes');
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
?>