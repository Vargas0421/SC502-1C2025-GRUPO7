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

    public function obtenerCursosEstudiante($idEstudiante) {
        $stmt = $this->pdo->prepare(
            'SELECT 
                c.nombre_curso 
            FROM estudiante_curso ec
            INNER JOIN cursos c ON ec.id_curso = c.id_curso
            WHERE ec.id_estudiante = :id_estudiante'
        );
        $stmt->execute(['id_estudiante' => $idEstudiante]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
?>