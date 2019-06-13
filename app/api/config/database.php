<?php

class Database
{

    private $host = "db";
    private $db_name = "dotdot";
    private $username = "root";
    private $password = "root";
    public $conn;

    public function getConn()
    {

        $this->conn = null;

        try {
            $this->conn = new PDO("mysql:host=" . $this->host . ";dbname=" . $this->db_name, $this->username, $this->password);
            $this->conn->exec("set names utf8");

        } catch (PDOException $exception) {
            echo "Connection error: " . $exception->getMessage();
        }
        //var_dump($this->conn);die("morreu na conn");
        return $this->conn;
    }
}

