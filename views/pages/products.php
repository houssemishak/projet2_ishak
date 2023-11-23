<?php
global $pageData;
$products = $pageData['products']
//$products=[];
?>
<h1>Page product</h1>
<h2>Mes produits</h2>
<ul>
    <?php
    foreach ($products as $key => $value) {
        # code...
        ?>
        <li>Toto</li>
<?php
    }
    ?>
</ul>
