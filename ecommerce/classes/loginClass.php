<?php

namespace classes\login;

require_once 'db.php';
require_once 'sessionClass.php';

use classes\session\sessionClass as session;

class loginClass
{
    public function login($email, $password)
    {
        global $conn;
        $email = $conn->real_escape_string($email);
        $password = $conn->real_escape_string($password);
        $sql = "SELECT * FROM users WHERE email = '$email'";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            if (password_verify($password, $row['password'])) {
                // set session
                $session = new session();
                $session->setSession('user', $row);
                return true;
            } else {
                return false;
            }
        } else {
            return false;
        }
    }
}
