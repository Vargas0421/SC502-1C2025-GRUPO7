<?php

class UserController {
        
    public function actualizarProfesor() {
        if (isset($_POST['id_profesor'], $_POST['nombre'], $_POST['apellido'], $_POST['puesto'])) {
            $profesorModel = new ProfesorModel();
            $profesorModel->updateProfesor($_POST['id_profesor'], $_POST['nombre'], $_POST['apellido'], $_POST['puesto']);
            header('Location: index.php?action=listarProfesores');
            exit(); // Asegura que el script se detenga después de la redirección
        }
    }
}

?>