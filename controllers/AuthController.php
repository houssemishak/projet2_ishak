<?php

require_once('models/Crud.php');

class AuthController extends Crud {
    public function __construct() {
        parent::__construct();
    }

    public function login() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $username = $_POST['username'];
            $password = $_POST['password'];

            $user = $this->getByUsername($username);

            if ($user && password_verify($password, $user['password'])) {
                $this->startSession($user);
                header('Location: home.php');
                exit();
            } else {
                header('Location: login.php?error=1');
                exit();
            }
        }
    }

    public function register() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $newUsername = $_POST['new_username'];
            $newPassword = $_POST['new_password'];

            // Hash du mot de passe avant de l'ajouter à la base de données
            $hashedPassword = password_hash($newPassword, PASSWORD_DEFAULT);

            $userId = $this->add('INSERT INTO users (username, password) VALUES (:username, :password)', [
                'username' => $newUsername,
                'password' => $hashedPassword
            ]);

            if ($userId) {
                $user = $this->getById('users', $userId);
                $this->startSession($user);
                header('Location: home.php');
                exit();
            } else {
                header('Location: register.php?error=1');
                exit();
            }
        }
    }

    public function logout() {
        session_start();
        session_unset();
        session_destroy();
        header('Location: login.php');
        exit();
    }

    private function startSession($user) {
        session_start();
        $_SESSION['user_id'] = $user['id'];
        $_SESSION['username'] = $user['username'];
    }
}
?>
