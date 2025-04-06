<?php

class salarioModel {
    private $pdo;

    public function __construct($pdo) {
        $this->pdo = $pdo;
    }

    public function historialSalario($idProfesor) {
        $stmt = $this->pdo->prepare('
            SELECT 
                h.salario AS cantidad,
                h.fecha_inicio AS fecha
            FROM Historial_Salarios h
            WHERE h.id_profesor = :id_profesor
        ');

        $stmt->execute(['id_profesor' => $idProfesor]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }     

    public function salarioActual($idProfesor) {
        $stmt = $this->pdo->prepare('
            SELECT 
                s.salario AS cantidad,
                s.fecha_actualizacion AS fecha
            FROM Salarios s
            WHERE s.id_profesor = :id_profesor
        ');

        $stmt->execute(['id_profesor' => $idProfesor]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }   
}

?>