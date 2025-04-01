<?php
// controllers/LoginController.php

require_once 'app/models/loginModel.php';

class LoginController {
    private $userModel;

    public function __construct($pdo) {
        $this->userModel = new loginModel($pdo);
    }

    public function manejo() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $email = $_POST['email'];
            $password = $_POST['password'];

            $user = $this->userModel->login($email, $password);
            if ($user) {
                session_start();
                $_SESSION['user'] = $user;
                header('Location: manejo.php?action=home');
                exit;
            } else {
                $error = 'Usuario o contraseña incorrectos';
                require 'app/views/content/login.html';
            }
        } else {
            require 'app/views/content/login.html';
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
