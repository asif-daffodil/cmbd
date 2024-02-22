<?php
require_once 'db.php';

use db\db as db;

class crud extends db
{
    private $msg = [];
    public function __construct()
    {
        parent::__construct();
    }

    public function addStudent()
    {
        if ($_SERVER['REQUEST_METHOD'] == "POST" && isset($_POST['addStudnet'])) {
            $studentName = $_POST['studentName'];
            if (empty($studentName)) {
                $msg['err'] = "Student Name is required";
                return;
            } else {
                $sql = "INSERT INTO users (name) VALUES ('$studentName')";
                $insert = $this->conn->query($sql);
                if ($insert) {
                    $msg['success'] = "Student Added Successfully";
                } else {
                    $msg['err'] = "Student Not Added";
                }
            }
            echo json_encode($msg);
        }
    }

    public function getAllStudents()
    {
        if ($_SERVER['REQUEST_METHOD'] == "GET" && isset($_GET['getAllStudents'])) {
            $sql = "SELECT * FROM users ORDER BY id DESC";
            $result = $this->conn->query($sql);
            if ($result->num_rows > 0) {
                echo json_encode($result->fetch_all(MYSQLI_ASSOC));
            }
        }
    }

    public function getSingleStudent()
    {
        if ($_SERVER['REQUEST_METHOD'] == "GET" && isset($_GET['getSingleStudent'])) {
            $id = $_GET['id'];
            $sql = "SELECT * FROM users WHERE id = $id";
            $result = $this->conn->query($sql);
            if ($result->num_rows > 0) {
                echo json_encode($result->fetch_assoc());
            }
        }
    }

    public function updateStudent()
    {
        if ($_SERVER['REQUEST_METHOD'] == "POST" && isset($_POST['updateStudnet'])) {
            $id = $_POST['id'];
            $studentName = $_POST['studentName'];
            $msg = [];
            if (empty($studentName)) {
                $msg['err'] = "Student Name is required";
                return;
            } else {
                $sql = "UPDATE users SET name = '$studentName' WHERE id = $id";
                $update = $this->conn->query($sql);
                if ($update) {
                    $msg['success'] = "Student Updated Successfully";
                } else {
                    $msg['err'] = "Student Not Updated";
                }
            }
            echo json_encode($msg);
        }
    }

    public function deleteStudent()
    {
        if ($_SERVER['REQUEST_METHOD'] == "POST" && isset($_POST['deleteStudnet'])) {
            $id = $_POST['id'];
            $msg = [];
            $sql = "DELETE FROM users WHERE id = $id";
            $delete = $this->conn->query($sql);
            if ($delete) {
                $msg['success'] = "Student Deleted Successfully";
            } else {
                $msg['err'] = "Student Not Deleted";
            }
            echo json_encode($msg);
        }
    }
}

$crud = new crud();
$crud->addStudent();
$crud->getAllStudents();
$crud->getSingleStudent();
$crud->updateStudent();
$crud->deleteStudent();
