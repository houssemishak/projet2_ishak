<?php
require_once('../models/Product.php');

class ProductController extends Crud {
    
    public function __construct() {
        parent::__construct();
    }

    public function getAllProducts() {
        return $this->getAll('products');
    }

    public function getProductById($id) {
        return $this->getById('products', $id);
    }

    public function addProduct($name, $price, $category) {
        $productData = [
            'name' => $name,
            'price' => $price,
            'category' => $category
        ];
        return $this->add('INSERT INTO products (name, price, category) VALUES (:name, :price, :category)', $productData);
    }

    public function deleteProduct($id) {
        return $this->delete('products', $id);
    }

}
?>
