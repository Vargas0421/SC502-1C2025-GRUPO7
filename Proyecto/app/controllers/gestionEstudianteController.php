<?php
require_once __DIR__ . '/../models/estudiantesModel.php';
class gestionEstudianteController {
    private $pdo;
    public function __construct($pdo) {
        $this->pdo = $pdo;
    }
    public function agregarEstudiante() {
        if (isset($_POST['nombre'], $_POST['apellido'], $_POST['email'], $_POST['password'], $_POST['telefono'], $_POST['calle'], $_POST['ciudad'], $_POST['estado'], $_POST['codigo_postal'])) {
            $estudiantesModel = new estudiantesModel($this->pdo);
            $resultado = $estudiantesModel->agregarEstudiantes($_POST['nombre'], $_POST['apellido'], $_POST['email'], $_POST['password'], $_POST['telefono'], $_POST['calle'], $_POST['ciudad'], $_POST['estado'], $_POST['codigo_postal']);

            header('Location: views/content/adminEstudiantes.php');
            exit();
        }
    }
    
    public function agregarCursoEstudiante() {
        if (isset($_POST['id_estudiante'], $_POST['id_curso'])) {
            $estudiantesModel = new estudiantesModel($this->pdo);
            $resultado = $estudiantesModel->agregarCursoEstudiante($_POST['id_estudiante'], $_POST['id_curso']);

            header("Location: views/content/gestionEstudiante.php?id=" . $_POST['id_estudiante']);
            exit();
        } 
    }
    
    public function eliminarEstudiante() {
        if (isset($_POST['id_estudiante'])) {
            $estudiantesModel = new estudiantesModel($this->pdo);
            $resultado = $estudiantesModel->eliminarEstudiante($_POST['id_estudiante']);

            header("Location: views/content/adminEstudiantes.php");
            exit();
        }
    }

    public function desinscribirEstudiante() {
            if (isset($_POST['id_estudiante'], $_POST['id_curso'])) {
            $estudiantesModel = new estudiantesModel($this->pdo);
            $resultado = $estudiantesModel->desinscribirEstudiante($_POST['id_estudiante'], $_POST['id_curso']);
            header("Location: views/content/gestionEstudiante.php?id=" . $_POST['id_estudiante']);
            exit();
        }
    }
}
?>