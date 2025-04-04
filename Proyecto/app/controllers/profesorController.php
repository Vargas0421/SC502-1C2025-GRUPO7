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
        if (isset($_POST['id_profesor'], $_POST['nombre'], $_POST['apellido'], $_POST['password'], $_POST['puesto'])) {
            $profeModel = new profeModel($this->pdo);
            $resultado = $profeModel->updateProfesor($_POST['id_profesor'], $_POST['nombre'], $_POST['apellido'], $_POST['password'], $_POST['puesto']);

            if ($resultado) {
                $_SESSION['success'] = "El perfil del profesor se actualizó correctamente.";
            } else {
                $_SESSION['error'] = "Hubo un error al actualizar el perfil del profesor.";
            }

            header('Location: views/content/profile.php');
            exit();
        }
        print "No pasa el if"; 
    }
}
?>