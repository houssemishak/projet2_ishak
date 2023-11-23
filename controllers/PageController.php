<?php


class Page
{

    public function products()
    {
        //Va me chercher mes produits 
        $products = [
            ['brand'=>'Addidas',
            'price'=>42,
            'category'=>'shoes'

            ],
            ['brand'=>'Rebook',
            'price'=>42,
            'category'=>'shoes'

            ]
        ];
        global $pageData;
        $pageData['products'] = $products;
        // boucle a travers mon tableau de produits
        // fait moi un liste avec mes produits
        require('./views/pages/products.php');
    }

    public function cart()
    {
        echo '<h1>Page cart</h1>';
    }
    public function homepage()
    {
        echo '<h1>Page accueil</h1>';
    }
}
