<?php
class VerificacionController {
    public function verificarSesion() {
        session_start();
        if (!isset($_SESSION['email'])) {
            header('Location: index.php'); 
            exit;
        }
    }
}
?>