<?php
// index.php
session_start(); // Es necesario para acceder a $_SESSION

require_once 'config/config.php';
require_once 'controllers/loginController.php';
require_once 'controllers/dashboardController.php';
require_once 'controllers/UserController.php';

$action = $_GET['action'] ?? 'login';


switch ($action) {
    case 'login':
        $loginController = new LoginController($pdo);
        $loginController->index();
        break;
    case 'home':
        $dashboardController = new DashboardController();
        $dashboardController->index();
        break;
    case 'logout':
        $loginController = new LoginController($pdo);
        $loginController->logout();
        break;
    case 'actualizarUser':
        $controller = new UserController();
        $controller->actualizarUser();
        break;
    default:
        $loginController = new LoginController($pdo);
        $loginController->index();
        break;
}
