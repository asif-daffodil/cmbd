<?php

namespace oopcrud\studentClass;

require_once 'db.php';

use \oopcrud\data\base as database;

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
        $db = new database();
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

    public function getAllData($table, $startPoint = 0, $limit = null)
    {
        $db = new database();
        $conn = $db->conn;
        if ($limit == null) {
            $sql = "SELECT * FROM $table";
            $result = $conn->query($sql);
            return $result;
        }
        $sql = "SELECT * FROM $table LIMIT $startPoint, $limit";
        $result = $conn->query($sql);
        return $result;
    }

    public function getSingleData($table, $id)
    {
        $db = new database();
        $conn = $db->conn;
        $sql = "SELECT * FROM $table WHERE id = $id";
        $result = $conn->query($sql);
        return $result;
    }

    public function updateStudent($name, $id)
    {
        $db = new database();
        $conn = $db->conn;
        $name = $conn->real_escape_string($name);
        $sql = "UPDATE students SET name = '$name' WHERE id = $id";
        if ($conn->query($sql) === TRUE) {
            $this->msg = "Record updated successfully";
            $this->oldName = null;
            return true;
        } else {
            $this->msg = "Error: " . $sql . "<br>" . $conn->error;
            return false;
        }
    }

    public function deleteStudent($id)
    {
        $db = new database();
        $conn = $db->conn;
        $sql = "DELETE FROM students WHERE id = $id";
        if ($conn->query($sql) === TRUE) {
            $this->msg = "Record deleted successfully";
            return true;
        } else {
            $this->msg = "Error: " . $sql . "<br>" . $conn->error;
            return false;
        }
    }
}
