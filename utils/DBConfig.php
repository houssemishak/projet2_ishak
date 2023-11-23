<?php
class DbConfig
{
    private $_host = 'localhost';
    private $_username = 'root';
    private $_password = 'root';
    private $_database = 'test';
    private $_dsn = '';
    protected $connexion;

    public function __construct()
    {
        if(!isset($this->_dsn))
        {
            $this->_dsn = "mysql:host=$this->_host;dbname=$this->_database;charset=UTF8";
        }
        if (!isset($this->connection)) {

            try {
                $this->connexion = new PDO(
                    $this->_dsn, 
                    $this->_username, 
                    $this->_password);
                if ($this->connexion) {
                    //echo "Connected to the $db database successfully";
                }
            } catch (PDOException $e) {
                echo $e->getMessage();
            }
        }

        return $this->connection;
    }
}
?>