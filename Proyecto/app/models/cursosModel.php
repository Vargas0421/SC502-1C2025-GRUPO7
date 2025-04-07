<?php
class cursosModel {
    private $pdo;

    public function __construct($pdo) {
        $this->pdo = $pdo;
    }

    public function info_cursos($idProfesor) {
        $stmt = $this->pdo->prepare('
            SELECT 
                c.id_curso,
                c.nombre_curso AS nombre,
                c.descripcion,
                CONCAT(p.nombre, " ", p.apellido) AS profesor
            FROM Profesor_Curso pc
            INNER JOIN Cursos c ON pc.id_curso = c.id_curso
            INNER JOIN Profesores p ON pc.id_profesor = p.id_profesor
            WHERE pc.id_profesor = :idProfesor
        ');
    
        $stmt->execute(['idProfesor' => $idProfesor]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function obtenerCursoPorId($idCurso) {
        $stmt = $this->pdo->prepare('
            SELECT 
                c.nombre_curso AS nombre,
                c.descripcion,
                CONCAT(p.nombre, " ", p.apellido) AS profesor,
                p.telefono AS telefono,
                p.email AS email,
                h.dia_semana AS horario,
                h.hora_inicio,
                h.hora_fin
            FROM Profesor_Curso pc
            INNER JOIN Cursos c ON pc.id_curso = c.id_curso
            INNER JOIN Profesores p ON pc.id_profesor = p.id_profesor
            LEFT JOIN Direccion d ON p.id_direccion = d.id_direccion
            LEFT JOIN Horarios h ON h.id_curso = c.id_curso
            WHERE c.id_curso = :idCurso
        ');
        $stmt->execute(['idCurso' => $idCurso]);
        return $stmt->fetch(PDO::FETCH_ASSOC); 
}
    
}
?>
