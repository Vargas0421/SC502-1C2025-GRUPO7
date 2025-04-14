<?php
require_once __DIR__ . '/../models/profeModel.php';

class gestionProfesorController {
    private $pdo;

    public function __construct($pdo) {
        $this->pdo = $pdo;
    }   

    public function agregarProfesor() {
        if (
            isset(
                $_POST['nombre'], $_POST['apellido'], $_POST['email'], $_POST['password'],
                $_POST['telefono'], $_POST['puesto'], $_POST['rol_id'],
                $_POST['calle'], $_POST['ciudad'], $_POST['estado'], $_POST['codigo_postal']
            )
        ) {
            $profeModel = new profeModel($this->pdo);
            $resultado = $profeModel->agregarProfesor(
                $_POST['nombre'],
                $_POST['apellido'],
                $_POST['email'],
                $_POST['password'],
                $_POST['telefono'],
                $_POST['puesto'],
                $_POST['rol_id'],
                $_POST['calle'],
                $_POST['ciudad'],
                $_POST['estado'],
                $_POST['codigo_postal']
            );
    
            if ($resultado) {
                header('Location: views/content/adminProfesores.php');
            } else {
                echo "Error al registrar el profesor.";
            }
            exit();
        } else {
            echo "Faltan datos obligatorios.";
        }
    }
    

    public function eliminarProfesor() {
        if (isset($_POST['id_profesor'])) {
            $profeModel = new profeModel($this->pdo);
            $resultado = $profeModel->eliminarProfesor($_POST['id_profesor']);

            header("Location: views/content/adminProfesores.php");
            exit();
        }
    }

    

    
}
?>