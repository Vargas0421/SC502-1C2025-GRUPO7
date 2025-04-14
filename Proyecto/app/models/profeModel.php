<?php

class profeModel {
    private $pdo;

    public function __construct($pdo) {
        $this->pdo = $pdo;
    }

    public function agregarProfesor($nombre, $apellido, $email, $password, $telefono, $puesto, $rol_id) {
        $stmt = $this->pdo->prepare(
            'INSERT INTO profesores (nombre, apellido, email, password, telefono, puesto, rol_id) 
             VALUES (:nombre, :apellido, :email, :password, :telefono, ;puesto, rol id)'
        );  
        return $stmt->execute([
            'nombre' => $nombre,
            'apellido' => $apellido,
            'email' => $email,
            'password' => $password,
            'telefono' => $telefono,
            'puesto' => $puesto,
            'rol_id' => $rol_id
        ]);
    }

    public function eliminarProfesor($idProfesor) {
        $stmt = $this->pdo->prepare('DELETE FROM profesor_curso WHERE id_profesor = :id_profesor');
        $stmt->execute(['id_profesor' => $idProfesor]);

        $stmt = $this->pdo->prepare('DELETE FROM historial_salarios WHERE id_profesor = :id_profesor');
        $stmt->execute(['id_profesor' => $idProfesor]);

        $stmt = $this->pdo->prepare('DELETE FROM salarios WHERE id_profesor = :id_profesor');
        $stmt->execute(['id_profesor' => $idProfesor]);

        $stmt = $this->pdo->prepare('DELETE FROM profesores WHERE id_profesor = :id_profesor');
        return $stmt->execute(['id_profesor' => $idProfesor]);

        
    }

    public function updateProfesor($id, $nombre, $apellido, $password, $telefono, $puesto) {
        $stmt = $this->pdo->prepare(
            'UPDATE profesores 
                SET nombre = :nombre, apellido = :apellido, password = :password, telefono = :telefono, puesto = :puesto 
                WHERE id_profesor = :id_profesor'
        );
        $resultado = $stmt->execute([
            'nombre' => $nombre,
            'apellido' => $apellido,
            'password' => $password, 
            'telefono' => $telefono,
            'puesto' => $puesto,
            'id_profesor' => $id
        ]);
        
        return $resultado;
    }

    public function updateDireccion($id, $calle, $ciudad, $estado, $codigo_postal) {
        $stmt = $this->pdo->prepare(
            "UPDATE Direccion 
            SET calle = :calle, ciudad = :ciudad, estado = :estado, codigo_postal = :codigo_postal
            WHERE id_direccion = (
                SELECT id_direccion FROM Profesores WHERE id_profesor = :id_profesor
            )"
        );
        $resultado = $stmt->execute([
            'calle' => $calle,
            'ciudad' => $ciudad,
            'estado' => $estado, 
            'codigo_postal' => $codigo_postal,
            'id_profesor' => $id
        ]);
        
        return $resultado;
    }

    public function obtenerDireccionId($idProfesor) {
        $stmt = $this->pdo->prepare('
            SELECT d.calle, d.ciudad, d.estado, d.codigo_postal FROM Direccion d
            INNER JOIN Profesores p ON d.id_direccion = p.id_direccion
            WHERE p.id_profesor = :id_profesor
        ');
        $stmt->execute(['id_profesor' => $idProfesor]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
    public function obtenerProfesores() { 
        $stmt = $this->pdo->prepare('SELECT * FROM profesores');
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    public function obtenerProfesorPorId($id_profesor) {
        $stmt = $this->pdo->prepare("SELECT * FROM profesores WHERE id_profesor = :id_profesor");
        $stmt->bindParam(':id_profesor', $id_profesor, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
}

?>