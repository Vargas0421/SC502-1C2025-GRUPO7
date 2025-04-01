<?php

require_once 'app/config/config.php';
require_once 'app/controllers/loginController.php';
require_once 'app/controllers/indexController.php';

$action = $_GET['action'] ?? 'login';

switch ($action) {
    case 'login':
        $loginController = new loginController($pdo);
        $loginController->manejo();
        break;
    case 'home':
        $indexController = new indexController();
        $indexController->manejo();
        break;
}
?>