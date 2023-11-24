
<?php
require_once('../utils/Crud.php');

class Product extends Crud {
    // Propriétés spécifiques aux produits
    private $id;
    private $name;
    private $price;
    private $category;

    // Constructeur
    public function __construct($id = null, $name = null, $price = null, $category = null) {
        $this->id = $id;
        $this->name = $name;
        $this->price = $price;
        $this->category = $category;

        // Appel du constructeur de la classe parente
        parent::__construct('products', 'id'); // 'products' est la table des produits, 'id' est la clé primaire
    }

    // Méthode pour ajouter un produit dans la base de données
    public function addProduct() {
        $data = array(
            'name' => $this->name,
            'price' => $this->price,
            'category' => $this->category
        );

        return $this->insert($data);
    }

    // Méthode pour obtenir tous les produits de la base de données
    public function getAllProducts() {
        return $this->getAll();
    }

    // Méthode pour obtenir un produit par son ID
    public function getProductById($productId) {
        return $this->getById($productId);
    }

    // Méthode pour mettre à jour les informations d'un produit
    public function updateProduct() {
        $data = array(
            'name' => $this->name,
            'price' => $this->price,
            'category' => $this->category
        );

        return $this->update($data, $this->id);
    }

    // Méthode pour supprimer un produit par son ID
    public function deleteProduct() {
        return $this->delete($this->id);
    }
}

