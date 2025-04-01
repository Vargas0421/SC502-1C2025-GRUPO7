<?php
// controllers/LoginController.php
require_once 'models/UserModel.php';

class LoginController {
    private $userModel;

    public function __construct($pdo) {
        $this->userModel = new UserModel($pdo);
    }

    public function index() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $username = $_POST['email'];
            $password = $_POST['password'];

            $user = $this->userModel->login($username, $password);
            if ($user) {
                session_start();
                $_SESSION['user'] = $user;
                header('Laction=homeocation: index.php?');
                exit;
            } else {
                $error = 'Usuario o contraseña incorrectos';
                require '../views/content/login.php';
            }
        } else {
            require '../views/content/login.php';
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
