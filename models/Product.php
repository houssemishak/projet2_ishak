
<?php
require_once('../utils/Crud.php');
class Product extends Crud  {
    # code...

    public function test () {
        $array = $this->getAll('voiture');
    }
}

