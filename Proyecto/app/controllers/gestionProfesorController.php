<?php
require_once __DIR__ . '/../models/profeModel.php';

class gestionProfesorController {
    private $pdo;

    public function __construct($pdo) {
        $this->pdo = $pdo;
    }

    public function agregarProfesor() {
        if (isset($_POST['nombre'], $_POST['apellido'], $_POST['email'], $_POST['password'], $_POST['telefono'], $_POST['puesto'], $_POST['rol_id'])) {
            $profeModel = new profeModel($this->pdo);

            // Llama al modelo para insertar el profesor
            $resultado = $profeModel->agregarProfesor(
                $_POST['nombre'],
                $_POST['apellido'],
                $_POST['email'],
                $_POST['password'], // Encripta la contraseña
                $_POST['telefono'],
                $_POST['puesto'],
                $_POST['rol_id']
            );

            header('Location: views/content/adminProfesores.php');
            exit();
        }
    }
}
?>