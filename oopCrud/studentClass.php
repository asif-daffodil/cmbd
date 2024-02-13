<?php

namespace oopcrud\studentClass;

class studentClass
{
    public $errName, $oldName, $msg;
    public function clean($data)
    {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    public function vallidation($data)
    {
        $this->oldName = $data;
        if (empty($data)) {
            $this->errName = "Please write your name";
            return false;
        } elseif (!preg_match("/^[A-Za-z. ]*$/", $data)) {
            $this->errName = "Invalid name format";
            return false;
        } else {
            $this->errName = null;
            return true;
        }
    }

    public function addStudent($name)
    {
        require_once 'db.php';
        $db = new \oopcrud\data\base();
        $conn = $db->conn;
        $name = $conn->real_escape_string($name);
        $sql = "INSERT INTO students (name) VALUES ('$name')";
        if ($conn->query($sql) === TRUE) {
            $this->msg = "New record created successfully";
            $this->oldName = null;
            return true;
        } else {
            $this->msg = "Error: " . $sql . "<br>" . $conn->error;
            return false;
        }
    }
}
