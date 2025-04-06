<?php
require_once __DIR__ . '/../models/profeModel.php';
print "Llegp al controller\n";
class ProfesorController {
    private $pdo;
    public function __construct($pdo) {
        $this->pdo = $pdo;
        print "Se ejecuta el controller";
    }
    public function actualizarProfesor() {
        if (isset($_POST['id_profesor'], $_POST['nombre'], $_POST['apellido'], $_POST['password'], $_POST['telefono'], $_POST['puesto'])) {
            $profeModel = new profeModel($this->pdo);
            $resultado = $profeModel->updateProfesor($_POST['id_profesor'], $_POST['nombre'], $_POST['apellido'], $_POST['password'], $_POST['telefono'], $_POST['puesto']);

            $_SESSION['email']['nombre'] = $_POST['nombre'];
            $_SESSION['email']['apellido'] = $_POST['apellido'];
            $_SESSION['email']['password'] = $_POST['password']; 
            $_SESSION['email']['telefono'] = $_POST['telefono'];
            $_SESSION['email']['puesto'] = $_POST['puesto'];



            header('Location: views/content/profile.php');
            exit();
        }
        print "No pasa el if"; 
    }
}
?>