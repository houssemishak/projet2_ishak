<?php
require_once('../models/Product.php');

class ProductController {
    private $productModel;

    public function __construct() {
        $this->productModel = new Product();
    }

    public function getAllProducts() {
        return $this->productModel->getAllProducts();
    }

    public function getProductById($productId) {
        return $this->productModel->getProductById($productId);
    }

    public function addProduct($name, $price, $category) {
        $this->productModel->setName($name);
        $this->productModel->setPrice($price);
        $this->productModel->setCategory($category);
        return $this->productModel->addProduct();
    }

    public function updateProduct($id, $name, $price, $category) {
        $this->productModel->setId($id);
        $this->productModel->setName($name);
        $this->productModel->setPrice($price);
        $this->productModel->setCategory($category);
        return $this->productModel->updateProduct();
    }

    public function deleteProduct($id) {
        $this->productModel->setId($id);
        return $this->productModel->deleteProduct();
    }
}

// Utilisation du contrôleur
// $productController = new ProductController();
// $allProducts = $productController->getAllProducts();
// $product = $productController->getProductById(1);
// $productController->addProduct("New Product", 100.00, "Category");
// $productController->updateProduct(1, "Updated Product", 150.00, "New Category");
// $productController->deleteProduct(1);
?>

