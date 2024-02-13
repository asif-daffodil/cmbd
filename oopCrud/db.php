<?php

namespace oopcrud\data;

class base
{
    private $dbhost = 'localhost';
    private $dbuser = 'root';
    private $dbpass = '';
    private $dbname = 'oopcrud';

    public $conn;

    public function __construct()
    {
        $this->conn = mysqli_connect($this->dbhost, $this->dbuser, $this->dbpass);
        // create database if not exists
        $sql = "CREATE DATABASE IF NOT EXISTS $this->dbname";
        $this->conn->query($sql);
        $this->conn->select_db($this->dbname);
    }

    public function __destruct()
    {
        $this->conn->close();
    }

    public function checkActive($pageName)
    {
        if (basename($_SERVER['PHP_SELF']) === $pageName) {
            echo 'active';
        }
    }
}
