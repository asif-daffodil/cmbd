<?php

namespace classes\session;

class sessionClass
{
    public function __construct()
    {
        // start session if it's not started
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }
    }

    public function setSession($name, $value)
    {
        $_SESSION[$name] = $value;
    }

    public function getSession($name)
    {
        if (isset($_SESSION[$name])) {
            return $_SESSION[$name];
        }
        return null;
    }

    public function getSingleData($name, $field)
    {
        if (isset($_SESSION[$name][$field])) {
            return $_SESSION[$name][$field];
        }
        return null;
    }

    public function unsetSession($name)
    {
        unset($_SESSION[$name]);
    }

    public function updateSession($name, $field, $value)
    {
        $_SESSION[$name][$field] = $value;
    }
}
