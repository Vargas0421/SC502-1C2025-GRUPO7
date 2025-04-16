<?php
class cursosModel
{
    private $pdo;

    public function __construct($pdo)
    {
        $this->pdo = $pdo;
    }

    public function obtenerCursos()
    {
        $stmt = $this->pdo->prepare('SELECT * FROM cursos');
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function obtenerCursosPorId($id_curso)
    {
        $stmt = $this->pdo->prepare('SELECT * FROM cursos WHERE id_curso = :id_curso');
        $stmt->bindParam(':id_curso', $id_curso, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC); 
    }


    public function info_cursos($idProfesor)
    {
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

    public function obtenerCursoFullPorId($idCurso)
    {
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
            FROM profesor_curso pc
            INNER JOIN Cursos c ON pc.id_curso = c.id_curso
            INNER JOIN Profesores p ON pc.id_profesor = p.id_profesor
            LEFT JOIN Direccion d ON p.id_direccion = d.id_direccion
            LEFT JOIN Horarios h ON h.id_curso = c.id_curso
            WHERE c.id_curso = :idCurso
        ');
        $stmt->execute(['idCurso' => $idCurso]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function obtenerEstudiantesPorCurso($idCurso) {
        $stmt = $this->pdo->prepare("
            SELECT e.nombre, e.apellido, e.email
            FROM Estudiantes e
            INNER JOIN Estudiante_Curso ec ON e.id_estudiante = ec.id_estudiante
            WHERE ec.id_curso = :idCurso
        ");
        $stmt->execute([':idCurso' => $idCurso]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    


    // Admin
    
    public function agregarCurso($nombre, $descripcion, $diaSemana, $horaInicio, $horaFin) {
        $stmt = $this->pdo->prepare('INSERT INTO Cursos (nombre_curso, descripcion) VALUES (:nombre, :descripcion);');
        return $stmt->execute([
            ':nombre' => $nombre,
            ':descripcion' => $descripcion
        ]);

        $stmt = $this->pdo->prepare(
            'INSERT INTO Horarios (id_curso, dia_semana, hora_inicio, hora_fin) 
             VALUES (:idCurso, :diaSemana, :horaInicio, :horaFin)'
        );
        $stmt->execute([
            ':idCurso' => $idCurso,
            ':diaSemana' => $diaSemana,
            ':horaInicio' => $horaInicio,
            ':horaFin' => $horaFin
        ]);
    }

}
?>