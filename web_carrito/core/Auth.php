<?php

class Auth
{
    public static function login($usuario)
    {
        if (!isset($_SESSION))
            session_start();
        $_SESSION["auth"] = $usuario;
    }

    public static function logout()
    {
        if (!isset($_SESSION))
            session_start();
        unset($_SESSION["auth"]);
    }

    public static function check()
    {
        if (!isset($_SESSION))
            session_start();
        if (!isset($_SESSION['auth'])) {
            header("Location: " . BASE_URL . "/login");
        }
    }

    public static function checkAdmin()
    {
        if (!isset($_SESSION))
            session_start();
        if (!isset($_SESSION['auth']) || $_SESSION['auth']->admin_lvl==null) {
            header("Location: " . BASE_URL . "/login");
        }
    }
    public static function getUser()
    {
        if (!isset($_SESSION))
            session_start();
        if (!isset($_SESSION['auth'])) {
            return null;
        } else {
            return $_SESSION["auth"];
        }
    }
}
