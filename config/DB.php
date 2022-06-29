<?php

class Database {

    
    private $host = "localhost";
    private $db_name = "co32660_apikit";
    private $username = "co32660_apikit";
    private $password = "axF6xWsg";
    public $conn;

    // получаем соединение с БД
    public function getConnection(){

        $this->conn = null;

        try {
            $this->conn = new PDO("mysql:host=" . $this->host . ";dbname=" . $this->db_name, $this->username, $this->password);
            $this->conn->exec("set names utf8");
        } catch(PDOException $exception){
            echo "Connection error: " . $exception->getMessage();
        }

        return $this->conn;
    }

    
}



?>