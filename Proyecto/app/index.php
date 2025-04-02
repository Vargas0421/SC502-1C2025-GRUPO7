<?php
// index.php
require_once 'config/config.php';
require_once 'controllers/loginController.php';
require_once 'controllers/dashboardController.php';

$action = $_GET['action'] ?? 'login';

switch ($action) {
    case 'login':
        $loginController = new loginController($pdo);
        $loginController->index();
        break;
    case 'home':
        $dashboardController = new dashboardController();
        $dashboardController->index();
        break;
    case 'logout':
        $loginController = new LoginController($pdo);
        $loginController->logout();
        break;
    default:
        $loginController = new LoginController($pdo);
        $loginController->index();
        break;
}
