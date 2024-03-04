<?php

namespace classes\registration;

require_once 'db.php';

class registrationClass
{
    public function validation($name, $email, $password)
    {
        if (empty($name) || empty($email) || empty($password)) {
            return false;
        } else {
            global $conn;
            $sql = "SELECT * FROM users WHERE email = '$email'";
            $result = $conn->query($sql);
            if ($result->num_rows > 0) {
                return false;
            } else {
                return true;
            }
        }
    }

    public function register($name, $email, $password)
    {
        global $conn;
        $sql = "INSERT INTO users (name, email, password) VALUES ('$name', '$email', '$password')";
        if ($conn->query($sql) === TRUE) {
            return true;
        } else {
            return false;
        }
    }
}
