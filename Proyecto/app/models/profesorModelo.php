<?php
class profesorModelo {
    private $pdo;

    public function __construct($pdo) {
        $this->pdo = $pdo;
    }

    public function login($username, $password) {
        $stmt = $this->pdo->prepare('SELECT * FROM profesores WHERE username = a AND password = :password');
        $stmt->execute(['username' => $username, 'password' => $password]);
        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        // var_dump($user);

        if ($user) {
            return $user;
        }
        return false;
    }
}
?>