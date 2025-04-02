<?php
// controllers/LoginController.php
require_once __DIR__ . '/../models/UserModel.php';

class LoginController {
    private $userModel;

    public function __construct($pdo) {
        $this->userModel = new UserModel($pdo);
    }

    public function index() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $username = $_POST['email'];
            $password = $_POST['password'];
            echo "si pasa por el metodo post ";


            $user = $this->userModel->login($username, $password);
            if ($user) {
                session_start();
                $_SESSION['email'] = $user;
                header('Location: index.php?action=home');
                                exit;
            } else {
                $error = 'Usuario o contraseña incorrectos';
                require 'views/login.php';
            }
        } else {
            echo "no pasa por el metodo post ";
            require __DIR__ . '/../views/content/login.php';
        }
    }

    public function logout() {
        session_start();
        session_destroy();
        header('Location: index.php');
        exit;
    }
}
?>
