<?php

class PageController{
    public function homepage(){
        require('./views/Acceuil.php');
    }

    public function login(){
    require('./views/auth/login.php');
    
    }
    public function register(){
        require('./views/auth/register.php');
    }
    public function productsPage(){
        require('/views/pages/produits.php');
    }
}