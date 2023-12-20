<?php

class Crud
{
    public $connexion;

    public function __construct()
    {
        $host = 'localhost';
        $dbName = 'ecom2_project';
        $user = 'root';
        $password = '';

        $dsn = "mysql:host=$host;dbname=$dbName;charset=utf8";

        try {
            $this->connexion = new PDO($dsn, $user, $password);
            $this->connexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            echo "Error connecting to the database: " . $e->getMessage();
        }
    }

    public function testConnection(): bool
    {
        return isset($this->connexion);
    }
    public function getAll(string $table): array
    {
        $stmt = $this->connexion->query("SELECT * FROM $table ORDER BY id ASC");
        $data = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $data;
    }

    public function getById(string $table, int $id): array
    {
        $stmt = $this->connexion->prepare("SELECT * FROM $table WHERE id = :id");
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
        $data = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $data;
    }

    public function add(string $table, array $data): bool
    {
        $fields = implode(', ', array_keys($data));
        $values = ':' . implode(', :', array_keys($data));

        $sql = "INSERT INTO $table ($fields) VALUES ($values)";
        $stmt = $this->connexion->prepare($sql);

        foreach ($data as $key => $value) {
            if (is_int($value)) {
                $stmt->bindValue(':' . $key, $value, PDO::PARAM_INT);
            } else {
                $stmt->bindValue(':' . $key, $value, PDO::PARAM_STR);
            }
        }

        $test = $stmt->execute();
        var_dump("je suis dans mon CRUD add");
        var_dump($test);
        die;

        return $test;
    }

    public function delete(string $table, int $id): string
    {
        $element = $this->getById($table, $id);
        if ($element) {
            $stmt = $this->connexion->prepare("DELETE FROM $table WHERE id = :id");
            $stmt->bindParam(':id', $id, PDO::PARAM_INT);
            $stmt->execute();
            return "L'élément avec l'id $id a été supprimé.";
        } else {
            return "Élément introuvable";
        }
    }
    public function getOneByField(string $table, string $field, $value)
    {
        $stmt = $this->connexion->prepare("SELECT * FROM $table WHERE $field = :value");
        $stmt->bindParam(':value', $value);
        $stmt->execute();
        $data = $stmt->fetch(PDO::FETCH_ASSOC);
        return $data;
    }

    public function update(string $table, int $id, array $itemdata): bool
    {
        $element = $this->getById($table, $id);

        if ($element) {
            $updateFields = '';
            foreach ($itemdata as $key => $value) {
                $updateFields .= "$key = :$key, ";
            }
            $updateFields = rtrim($updateFields, ', ');

            $sql = "UPDATE $table SET $updateFields WHERE id = :id";
            $stmt = $this->connexion->prepare($sql);

            foreach ($itemdata as $key => $value) {
                if (is_int($value)) {
                    $stmt->bindValue(':' . $key, $value, PDO::PARAM_INT);
                } else {
                    $stmt->bindValue(':' . $key, $value, PDO::PARAM_STR);
                }
            }

            $stmt->bindParam(':id', $id, PDO::PARAM_INT);

            return $stmt->execute();
        } else {
            return false; // Element not found
        }
    }
}