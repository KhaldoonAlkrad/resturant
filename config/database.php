<?php

class Database {

    private $hostname = 'localhost';
    private $databasenaam = 'resturant';
    private $username = 'root';
    private $password = '';
    public $conn;

    public function getConnection() {

        $this->conn = null;

        try {
            $this->conn = new mysqli($this->hostname, $this->username, $this->password, $this->databasenaam);
        } catch (mysqli_sql_exception $exception) {
            echo "Connection error: " . $exception->getMessage();
        }
        return $this->conn;
    }

}
