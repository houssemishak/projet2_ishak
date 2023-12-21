<?php

require_once './Controllers/PageController.php';

?>

<a href="login">Login</a>
<a href="register">Register</a>
<a href="products">Products</a>

<?php

// Instancier le PageController
$oPageController = new PageController();

// Appeler la méthode route avec l'action spécifiée
$oPageController->route();