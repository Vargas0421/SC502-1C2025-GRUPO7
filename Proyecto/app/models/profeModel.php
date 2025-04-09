<?php

class profeModel {
    private $pdo;

    public function __construct($pdo) {
        $this->pdo = $pdo;
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
}

?>