<?php
// controllers/DashboardAdminController.php

class DashboardAdminController {
    public function index() {
        session_start();
        if (!isset($_SESSION['email'])) {
            header('Location: index.php');
            exit;
        }

        $user = $_SESSION['email'];

 
        require 'views/content/dashboard_admin.php';
    }

    public function manejarProfesores() {
        session_start();
        if (!isset($_SESSION['email'])) {
            header('Location: index.php');
            exit;
        }

    

        require 'views/content/manejo_profesores.php';
    }

    public function manejarEstudiantes() {
        session_start();
        if (!isset($_SESSION['email'])) {
            header('Location: index.php');
            exit;
        }

    

        require 'views/content/manejo_estudiantes.php';
    }
}
?>
