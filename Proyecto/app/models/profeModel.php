<?php

class profeModel {
    private $pdo;

    public function __construct($pdo) {
        $this->pdo = $pdo;
    }

    public function updateProfesor($id, $nombre, $apellido, $password, $telefono, $puesto) {
        $stmt = $this->pdo->prepare(
            "UPDATE profesores 
                SET nombre = :nombre, apellido = :apellido, password = :password, telefono = :telefono, puesto = :puesto 
                WHERE id_profesor = :id_profesor"
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
}

?>