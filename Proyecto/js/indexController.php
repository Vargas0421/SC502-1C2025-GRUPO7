<?php
// controllers/HomeController.php
class indexController {
    public function manejo() {
        // Verificar si la sesión ya está activa
        if (session_status() === PHP_SESSION_ACTIVE) {
            session_destroy(); // Destruir la sesión activa
        }
        session_start(); // Iniciar una nueva sesión

        if (!isset($_SESSION['user'])) {
            exit;
        }

        $user = $_SESSION['user'];
        require 'app/views/content/index.php';
    }
}
?>