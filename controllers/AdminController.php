<?php

require_once('../models/Product.php');
require_once('../models/User.php');

class AdminController {
    public function addProduct() {
        // Logique pour gérer l'ajout de produits
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Récupérez les données du formulaire
            $productName = $_POST['product_name'];
            $productPrice = $_POST['product_price'];
            $productCategory = $_POST['product_category'];

            // Logique pour ajouter le produit dans la base de données
            $product = $this->addProductToDatabase($productName, $productPrice, $productCategory);

            if ($product) {
                // Redirigez vers une page de confirmation ou d'affichage des produits
                header('Location: /products');
                exit;
            } else {
                $errorMessage = 'Erreur lors de l\'ajout du produit';
            }
        }

        // Chargement de la vue d'ajout de produit
        require('../views/admin/add_product.php');
    }

    public function manageUsers() {
        // Logique pour gérer les utilisateurs (liste, modification de rôle, suppression)
        $users = $this->getAllUsers(); // Vous devez implémenter la logique pour récupérer tous les utilisateurs

        // Passage des données à la vue
        $pageData['users'] = $users;

        // Chargement de la vue de gestion des utilisateurs
        require('../views/admin/manage_users.php');
    }

    public function upgradeUserRole($userId) {
        // Logique pour améliorer le rôle de l'utilisateur (par exemple, de client à administrateur)
        $success = $this->upgradeUserToAdmin($userId);

        if ($success) {
            // Redirigez vers la page de gestion des utilisateurs
            header('Location: /manage-users');
            exit;
        } else {
            $errorMessage = 'Erreur lors de la mise à niveau du rôle de l\'utilisateur';
        }
    }

    public function deleteUser($userId) {
        // Logique pour supprimer un utilisateur
        $success = $this->deleteUserFromDatabase($userId);

        if ($success) {
            // Redirigez vers la page de gestion des utilisateurs
            header('Location: /manage-users');
            exit;
        } else {
            $errorMessage = 'Erreur lors de la suppression de l\'utilisateur';
        }

    }


private function addProductToDatabase($productName, $productPrice, $productCategory) {
    $product = new Product();
    return $product->add($productName, $productPrice, $productCategory);
}

private function getAllUsers() {
    $user = new User();
    return $user->getAll();
}

private function upgradeUserToAdmin($userId) {
    $user = new User();
    return $user->upgradeToAdmin($userId);
}

private function deleteUserFromDatabase($userId) {
    $user = new User();
    return $user->delete($userId);
}

}
