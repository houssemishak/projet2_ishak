<?php

$url = $_SERVER['REQUEST_URI'];
//echo 'REQUEST_URI : ' . $_SERVER['REQUEST_URI'];

//$urltrim = ltrim($url, '/ecom-2/mvc/');
$explodeUrl = explode('/',$url);
var_dump($explodeUrl[3]);
switch ($explodeUrl[3]) {
    case 'products':
        $page = new Page;
        $page->products();

        break;
    case 'cart':
        $page = new Page;
        $page->cart();
        break;
    default:
        $page = new Page;
        $page->homePage();
        break;
}