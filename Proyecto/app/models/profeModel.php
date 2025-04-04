<?php

class profeModel {
    private $pdo;

    public function __construct($pdo) {
        $this->pdo = $pdo;
    }

    public function updateProfesor($id, $nombre, $apellido, $password, $puesto) {
        $stmt = $this->pdo->prepare(
            "UPDATE profesores 
                SET nombre = :nombre, apellido = :apellido, password = :password, puesto = :puesto 
                WHERE id_profesor = :id_profesor"
        );
        error_log("Se ejecuta la mitad del Model profesor");
        $resultado = $stmt->execute([
            'nombre' => $nombre,
            'apellido' => $apellido,
            'password' => $password, 
            'puesto' => $puesto,
            'id_profesor' => $id
        ]);

        return $resultado;
    }
}

?>