<?php

require_once './models/User.php';

class AuthController
{
    public function register()
    {
        $authModel = new User();

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $newUsername = $_POST['username'];
            $newPassword = $_POST['password'];
            $newFirstName = $_POST['first_name'];
            $newLastName = $_POST['last_name'];
            $newEmail = $_POST['email'];


            $newToken = bin2hex(random_bytes(32));
            $existingUser = $authModel->getUserByUsername($newUsername);

            if (!$existingUser) {
                $userId = $authModel->registerUser(
                    $newEmail,
                    $newUsername,
                    $newFirstName,
                    $newLastName,
                    $newPassword
                );

                if ($userId) {
                    echo "Utilisateur enregistré avec succès!";
                } else {
                    echo "Erreur lors de l'enregistrement de l'utilisateur.";
                }
            } else {
                echo "Ce nom d'utilisateur est déjà utilisé. Choisissez un autre.";
            }
        }
    }

    public function login()
{
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $authModel = new User();

        $username = $_POST['username'];
        $password = $_POST['password'];

        $user = $authModel->getUserByUsername($username);

        var_dump($user); // Débogage pour voir les données de l'utilisateur

        if ($user && password_verify($password, $user['pwd'])) {
            header('Location: views/pages/produits.php');
            exit();
        } else {
            echo 'Nom d\'utilisateur ou mot de passe incorrect.';
            exit();
        }
    }
}


    public function logout()
    {
    }
}