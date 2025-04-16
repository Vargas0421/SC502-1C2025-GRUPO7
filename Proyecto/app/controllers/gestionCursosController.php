<?php
require_once __DIR__ . '/../models/cursosModel.php';
class gestionCursosController {
    private $pdo;
    public function __construct($pdo) {
        $this->pdo = $pdo;
    }
    public function agregarCurso() {
        if (isset($_POST['nombre'], $_POST['descripcion'], $_POST['diaSemana'], $_POST['horaInicio'], $_POST['horaFin'])) {
            $cursosModel = new cursosModel($this->pdo);
            $resultado = $cursosModel->agregarCurso($_POST['nombre'], $_POST['descripcion'], $_POST['diaSemana'], $_POST['horaInicio'], $_POST['horaFin']);

            header('Location: views/content/adminCursos.php');
            exit();
        }
        echo "No llego";
    }
    
    public function editarCurso() {
        if (isset($_POST['nombre'], $_POST['apellido'], $_POST['email'], $_POST['password'], $_POST['telefono'], $_POST['calle'], $_POST['ciudad'], $_POST['estado'], $_POST['codigo_postal'])) {
            $estudiantesModel = new estudiantesModel($this->pdo);
            $resultado = $estudiantesModel->agregarEstudiantes($_POST['nombre'], $_POST['apellido'], $_POST['email'], $_POST['password'], $_POST['telefono'], $_POST['calle'], $_POST['ciudad'], $_POST['estado'], $_POST['codigo_postal']);

            header('Location: views/content/adminEstudiantes.php');
            exit();
        }
    }
}
?>