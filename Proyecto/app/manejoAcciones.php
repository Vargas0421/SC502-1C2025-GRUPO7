<?php
// manejoAcciones.php
require_once 'config/config.php';
require_once 'controllers/loginController.php';
require_once 'controllers/HomeController.php';
require_once 'controllers/ArticuloController.php';

$action = $_GET['action'] ?? 'login';

switch ($action) {
    case 'login':
        $loginController = new LoginController($pdo);
        $loginController->index();
        break;
    case 'home':
        $homeController = new HomeController();
        $homeController->index();
        break;
    case 'logout':
        $loginController = new LoginController($pdo);
        $loginController->logout();
        break;
    case 'listarArticulos':
        $controller = new ArticuloController();
        $controller->listarArticulos();
        break;
    case 'agregarArticulo':
        $controller = new ArticuloController();
        $controller->agregarArticulo();
        break;
    case 'guardarArticulo':
        $controller = new ArticuloController();
        $controller->guardarArticulo();
        break;
    case 'editarArticulo':
        $controller = new ArticuloController();
        $controller->editarArticulo($_GET['id']);
        break;
    case 'actualizarArticulo':
        $controller = new ArticuloController();
        $controller->actualizarArticulo();
        break;
    case 'eliminarArticulo':
        $controller = new ArticuloController();
        $controller->eliminarArticulo($_GET['id']);
        break;
    // default:
    //     require_once 'views/home.php';
    //     break;
    default:
        $loginController = new LoginController($pdo);
        $loginController->index();
        break;
}
