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


            header('Location: views/content/profile.php');
            exit();


            
        }
        print "No pasa el if"; 
    }
    public function actualizarDireccion() {
        if (isset($_POST['id_profesor'], $_POST['calle'], $_POST['ciudad'], $_POST['estado'], $_POST['codigo_postal'])) {
            $profeModel = new profeModel($this->pdo);
    
            $resultado = $profeModel->updateDireccion($_POST['id_profesor'], $_POST['calle'],$_POST['ciudad'], $_POST['estado'], $_POST['codigo_postal']);
    
            header('Location: views/content/profile.php');
            exit();
        }
    }
}
?>