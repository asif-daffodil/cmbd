<?php

namespace db;

class db
{
    private $host = "localhost";
    private $user = "root";
    private $password = "";
    private $database = "cmbd";
    public $conn;

    public function __construct()
    {
        $this->conn = mysqli_connect($this->host, $this->user, $this->password, $this->database);
    }

    public function __destruct()
    {
        $this->conn->close();
    }
}
