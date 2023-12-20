<?php

require_once 'Crud.php';

class User extends Crud
{
    public function __construct()
    {
        parent::__construct();
    }

    // Fonction pour enregistrer un nouvel utilisateur
    public function registerUser($email, $username, $fname, $lname, $pwd)
    {


        // Validation de l'email
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            // Gérer l'erreur d'email invalide
            return false;
        }

        // Vérification de la non-existence de l'email et du nom d'utilisateur
        if ($this->getUserByEmail($email) || $this->getUserByUsername($username)) {
            // L'email ou le nom d'utilisateur existe déjà
            return false;
        }

        // Hachage du mot de passe
        $hashedPassword = password_hash($pwd, PASSWORD_DEFAULT);

        // Génération d'un token sécurisé
        $token = bin2hex(random_bytes(16));

        // Ajout de l'utilisateur à la base de données
        $userId = $this->add('user', [
            'email' => $email,
            'token' => $token,

            'username' => $username,
            'fname' => $fname,
            'lname' => $lname,
            'pwd' => $hashedPassword,
            'billing_address_id' => 1,
            'shipping_address_id' => 1,
            'role_id' => 3
        ]);

        return $userId;
    }

    // Fonction pour récupérer un utilisateur par son nom d'utilisateur
    public function getUserByUsername($username)
    {
        return $this->getOneByField('user', 'username', $username);
    }

    // Fonction pour récupérer un utilisateur par son email
    private function getUserByEmail($email)
    {
        return $this->getOneByField('user', 'email', $email);
    }

    
}