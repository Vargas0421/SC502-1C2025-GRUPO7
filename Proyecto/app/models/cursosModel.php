<?php
class cursosModel {
    private $pdo;

    public function __construct($pdo) {
        $this->pdo = $pdo;
    }

    public function info_cursos() {
        $stmt = $this->pdo->prepare('
        SELECT 
            c.id_curso, -- Asegúrate de incluir este campo
            c.nombre_curso AS nombre,
            c.descripcion,
            CONCAT(p.nombre, " ", p.apellido) AS profesor
        FROM Profesor_Curso pc
        INNER JOIN Cursos c ON pc.id_curso = c.id_curso
        INNER JOIN Profesores p ON pc.id_profesor = p.id_profesor
    ');

        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    
    }

    public function obtenerCursoPorId($idCurso) {
    $stmt = $this->pdo->prepare('
        SELECT 
            c.nombre_curso AS nombre,
            c.descripcion,
            CONCAT(p.nombre, " ", p.apellido) AS profesor,
            h.dia_semana AS horario,
            h.hora_inicio,
            h.hora_fin,
            "Campus Central" AS sede 
        FROM Profesor_Curso pc
        INNER JOIN Cursos c ON pc.id_curso = c.id_curso
        INNER JOIN Profesores p ON pc.id_profesor = p.id_profesor
        LEFT JOIN Horarios h ON h.id_curso = c.id_curso
        WHERE c.id_curso = :idCurso
    ');
    $stmt->execute(['idCurso' => $idCurso]);
    return $stmt->fetch(PDO::FETCH_ASSOC); 
}
    
}
?>
