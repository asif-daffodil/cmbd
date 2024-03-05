<?php

namespace classes\updateProfile;

require_once 'db.php';
require_once 'sessionClass.php';

use classes\session\sessionClass as session;

class updateProfile
{
    public function updateProfile($name, $email, $address, $id)
    {
        global $conn;
        $sql = "UPDATE users SET name = '$name', email = '$email', city = '$address' WHERE id = $id";
        if ($conn->query($sql)) {
            $session = new session();
            $user = $session->getSession('user');
            $user['name'] = $name;
            $user['email'] = $email;
            $user['city'] = $address;
            $session->setSession('user', $user);
            return true;
        } else {
            return false;
        }
    }

    public function validateProfileImg($file)
    {
        $fileType = strtolower(pathinfo($file["name"], PATHINFO_EXTENSION));
        if ($fileType != "jpg" && $fileType != "png" && $fileType != "jpeg") {
            return false;
        } else {
            return true;
        }
    }

    public function updateProfileImg($file, $id)
    {
        $target_dir = "./Assets/images";
        // get file extension
        $fileType = strtolower(pathinfo($file["name"], PATHINFO_EXTENSION));
        // new file name
        $newFileName = uniqid() . '_' . time() . '_' . $id . '.' . $fileType;
        $target_file = $target_dir . '/' . $newFileName;
        if (move_uploaded_file($file["tmp_name"], $target_file)) {
            global $conn;
            $sql = "UPDATE users SET img = '$newFileName' WHERE id = $id";
            if ($conn->query($sql)) {
                $session = new session();
                $user = $session->getSession('user');
                // delete old image if exists
                if ($user['img'] != null) {
                    unlink($target_dir . '/' . $user['img']);
                }
                $user['img'] = $newFileName;
                $session->setSession('user', $user);

                return true;
            } else {
                return false;
            }
        } else {
            return false;
        }
    }

    public function validatePassword($oldPassword, $newPassword, $confirmPassword, $id)
    {
        if (empty($oldPassword) || empty($newPassword) || empty($confirmPassword)) {
            return false;
        }

        if (strlen($newPassword) < 6) {
            return false;
        }

        if ($newPassword != $confirmPassword) {
            return false;
        }

        global $conn;
        $sql = "SELECT * FROM users WHERE id = $id";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            if (password_verify($oldPassword, $row['password'])) {
                if ($newPassword == $confirmPassword) {
                    return true;
                } else {
                    return false;
                }
            } else {
                return false;
            }
        } else {
            return false;
        }
    }

    public function updatePassword($newPassword, $id)
    {
        global $conn;
        $newPassword = password_hash($newPassword, PASSWORD_DEFAULT);
        $sql = "UPDATE users SET password = '$newPassword' WHERE id = $id";
        if ($conn->query($sql)) {
            return true;
        } else {
            return false;
        }
    }
}
