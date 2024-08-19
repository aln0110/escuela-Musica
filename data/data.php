<?php


class Data
{
    public $server = "localhost";
    public $user = "root";
    public $password = "";
    public $db = "bdescuelamusica";
    public $conn;

    public function __construct()
    {
        $this->conn = new mysqli($this->server, $this->user, $this->password, $this->db);
        if ($this->conn->connect_error) {
            die("Connection failed: " . $this->conn->connect_error);
        }
        $this->conn->set_charset("utf8");
    }
}



?>