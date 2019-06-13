<?php


/*abstract*/ class DatabaseConnection
{
    public static $instance;
    public $host, $user, $password, $database;
    private $conn;

    public function __construct($host, $user, $password)
    {
        $this->host = $host;
        $this->user = $user;
        $this->password = $password;
        $this->database = "minhabasededados";
        $this->conn = $this->getConn();
    }

    public function getConn()
    {
        return new PDO("mysql:host=" . $this->host . ";
            dbname=", ".$this->user.", ".$this->user.",
            array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));

    }

    public function query($sql)
    {
        return $this->conn->query($sql);
    }

}

class MyUserClass //extends DatabaseConnection
{
    private $dbconn;
    public function __construct()
    {
        $this->dbconn = new DatabaseConnection('localhost', 'user', 'password');

    }

    public function getUserList()
    {
        $results = $this->dbconn->query("select name from user");
        sort($results);
        return $results;
    }
}
