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
            'SELECT c.id_curso, c.nombre_curso 
            FROM estudiante_curso ec
            INNER JOIN cursos c ON ec.id_curso = c.id_curso
            WHERE ec.id_estudiante = :id_estudiante'
        );
        $stmt->execute(['id_estudiante' => $idEstudiante]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function agregarEstudiantes($nombre, $apellido, $email, $password, $telefono) {
        $stmt = $this->pdo->prepare(
            'INSERT INTO estudiantes (nombre, apellido, email, password, telefono) 
             VALUES (:nombre, :apellido, :email, :password, :telefono)'
        );
        return $stmt->execute([
            'nombre' => $nombre,
            'apellido' => $apellido,
            'email' => $email,
            'password' => $password,
            'telefono' => $telefono
        ]);
    }
    
    public function obtenerCursos() {
        $stmt = $this->pdo->prepare('SELECT * FROM cursos');
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function CursosNoIngresados($idEstudiante) {
        $stmt = $this->pdo->prepare(
            'SELECT c.id_curso, c.nombre_curso FROM cursos c
            WHERE c.id_curso NOT IN (
                SELECT ec.id_curso 
                FROM estudiante_curso ec 
                WHERE ec.id_estudiante = :id_estudiante
            )'
        );
        $stmt->execute(['id_estudiante' => $idEstudiante]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function agregarCursoEstudiante($idEstudiante, $idCurso) {
        $stmt = $this->pdo->prepare(
            'INSERT INTO estudiante_curso (id_estudiante, id_curso) 
             VALUES (:id_estudiante, :id_curso)'
        );
        return $stmt->execute([
            'id_estudiante' => $idEstudiante,
            'id_curso' => $idCurso
        ]);
    }

    public function eliminarEstudiante($idEstudiante) {
        $stmt = $this->pdo->prepare('DELETE FROM pagos WHERE id_estudiante = :id_estudiante');
        $stmt->execute(['id_estudiante' => $idEstudiante]);

        $stmt = $this->pdo->prepare('DELETE FROM inscripciones WHERE id_estudiante = :id_estudiante');
        $stmt->execute(['id_estudiante' => $idEstudiante]);

        $stmt = $this->pdo->prepare('DELETE FROM estudiante_curso WHERE id_estudiante = :id_estudiante');
        $stmt->execute(['id_estudiante' => $idEstudiante]);

        $stmt = $this->pdo->prepare('DELETE FROM estudiantes WHERE id_estudiante = :id_estudiante');
        return $stmt->execute(['id_estudiante' => $idEstudiante]);
    }

    public function desinscribirEstudiante($idEstudiante, $idCurso) {
        $stmt = $this->pdo->prepare('DELETE FROM estudiante_curso 
             WHERE id_estudiante = :id_estudiante AND id_curso = :id_curso'
        );
        return $stmt->execute([
            'id_estudiante' => $idEstudiante,
            'id_curso' => $idCurso
        ]);
    }
}
?>