<?php
class VerificacionController {
    private $acceso = [
        // Acciones basadas en "action"
        'adminHome'     => [1],
        'home'          => [1, 2],
        'dashboard'     => [1, 2],
        'usuarioHome'   => [2],

        // Rutas de archivos PHP directos
        'views/content/adminEstudiantes.php'    => [1],
        'views/content/adminCurso.php'          => [1],
        'views/content/adminDashboard.php'      => [1],
        'views/content/adminProfesores.php'     => [1],
        'views/content/adminSalario.php'        => [1],
        'views/content/adminVistaCurso.php'     => [1],
        'views/content/adminVistaProfesor.php'  => [1],
        'views/content/calendario.php'          => [1, 2],
        'views/content/dashboard.php'           => [1, 2],
        'views/content/estudiantes.php'         => [1, 2],
        'views/content/gestionEstudiante.php'   => [1],
        'views/content/gestionSalario.php'      => [1],
        'views/content/informacionCurso.php'    => [1],
        'views/content/profile.php'             => [1, 2],
        'views/content/salario.php'             => [1, 2],
    ];

    public function __construct() {
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }
    }

    public function verificarAcceso() {
        if (!isset($_SESSION['email']['rol_id'])) {
            header("Location: index.php");
            exit();
        }

        $rolUsuario = $_SESSION['email']['rol_id'];
        $accion = $_GET['action'] ?? null;

        if ($accion && isset($this->acceso[$accion])) {
            if (!in_array($rolUsuario, $this->acceso[$accion])) {
                header("Location: acceso_denegado.php");
                exit();
            }
        } else {
            // Limpiar la ruta a formato relativo
            $rutaActual = $_SERVER['PHP_SELF']; // ej: /Proyecto/app/views/content/adminEstudiantes.php
            $rutaRelativa = ltrim(str_replace('/Proyectos/SC502-1C2025-GRUPO7/Proyecto/app/', '', $rutaActual), '/');

            if (isset($this->acceso[$rutaRelativa])) {
                if (!in_array($rolUsuario, $this->acceso[$rutaRelativa])) {
                    header("Location: acceso_denegado.php");
                    exit();
                }
            }
        }
    }
}
