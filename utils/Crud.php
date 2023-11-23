<?php
class Crud
{
    public $connexion;
    public function __construct()
    {
        $host = "localhost";
        $db = "tp_1";
        $user = "root";
        $password = "";

        $dsn = "mysql:host=$host;dbname=$db;charset=UTF8";

        try {
            $this->connexion = new PDO($dsn, $user, $password);
            if ($this->connexion) {
                //echo "Connected to the $db database successfully";
            }
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }

    /**
     * methode pour récupérer toutes les données d'une table 
     * @param string $table
     * @return array
    */
    public function getAll(string $table):array
    {

        $PDOStatement = $this->connexion->query("SELECT * FROM $table ORDER BY id ASC");
        $data = $PDOStatement->fetchAll(PDO::FETCH_ASSOC);
        return $data;
    }

    // methode pour un élément d'une table avec son id 
    public function getById(string $table,int $id):array
    {
        $PDOStatement = $this->connexion->prepare("SELECT * FROM $table WHERE id = :id"); // preparation de rqt sql pour affichage 
        $PDOStatement->bindParam(':id', $id, PDO::PARAM_INT);
        $PDOStatement->execute();
        $data = $PDOStatement->fetchAll(PDO::FETCH_ASSOC);
        return $data;
    }

    // methode pour ajouter un item 
    public function add(string $request, array $itemdata): int|bool
    {
        $PDOStatement = $this->connexion->prepare($request);
        foreach ($itemdata as $key => $value) {
            if (is_int($value)) {
                $PDOStatement->bindValue(':' . $key, $value, PDO::PARAM_INT);
            } else {
                $PDOStatement->bindValue(':' . $key, $value, PDO::PARAM_STR);
            }
        }
        $PDOStatement->execute();
        if ($PDOStatement->rowCount() <= 0) {
            return false;
        }
        return $this->connexion->lastInsertId();
    }

    public function delete(string $table,int $id): string
    {
        $element = $this->getById($table, $id);
        if ($element) {
            $PDOStatement = $this->connexion->prepare("DELETE FROM $table WHERE id = :id"); // preparation de requete sql 
            $PDOStatement->bindParam(':id', $id, PDO::PARAM_INT);
            $PDOStatement->execute();
            return "L'élément avec l'id " . $id . " a été supprimée.";
        } else {
            return "Élément introuvable";
        }
    }

    public function __destruct()
    {
        $this->connexion = null;
    }
}
