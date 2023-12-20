<?php

require_once('Crud.php');

class User extends Crud {
    private $id;
    private $username;
    private $password;
    private $firstName;
    private $lastName;
    private $address;

    public function __construct($id = null, $username = "", $password = "", $firstName = "", $lastName = "", $address = "") {
        parent::__construct();
        $this->id = $id;
        $this->username = $username;
        $this->password = $password;
        $this->firstName = $firstName;
        $this->lastName = $lastName;
        $this->address = $address;
    }

    // Getters
    public function getId() {
        return $this->id;
    }

    public function getUsername() {
        return $this->username;
    }

    public function getPassword() {
        return $this->password;
    }

    public function getFirstName() {
        return $this->firstName;
    }

    public function getLastName() {
        return $this->lastName;
    }

    public function getAddress() {
        return $this->address;
    }

    // Setters
    public function setUsername($username) {
        $this->username = $username;
    }

    public function setPassword($password) {
        $this->password = password_hash($password, PASSWORD_DEFAULT);
    }

    public function setFirstName($firstName) {
        $this->firstName = $firstName;
    }

    public function setLastName($lastName) {
        $this->lastName = $lastName;
    }

    public function setAddress($address) {
        $this->address = $address;
    }

}
?>
