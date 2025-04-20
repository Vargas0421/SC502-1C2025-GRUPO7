<?php
class VerificacionController {
    private $acceso;

    public function __construct() {
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }

        $this->accesoPorVista = require '../../config/access_config.php';
    }

    public function verificarAcceso() {
        if (!isset($_SESSION['email']['rol_id'])) {
            header("Location: index.php");
            exit();
        }

        $rolUsuario = $_SESSION['email']['rol_id'];

        // Detectar si accede por ?action=
        $accion = $_GET['action'] ?? null;

        if ($accion && isset($this->acceso[$accion])) {
            if (!in_array($rolUsuario, $this->acceso[$accion])) {
                header("Location: acceso_denegado.php");
                exit();
            }
        } else {
            // Acceso por archivo directo
            $rutaActual = $_SERVER['PHP_SELF']; // ej: /Proyecto/app/views/content/adminEstudiantes.php
            $rutaRelativa = str_replace('/Proyectos/SC502-1C2025-GRUPO7/Proyecto/app/', '', $rutaActual);

            if (isset($this->acceso[$rutaRelativa])) {
                if (!in_array($rolUsuario, $this->acceso[$rutaRelativa])) {
                    header("Location: acceso_denegado.php");
                    exit();
                }
            }
        }
    }
}
