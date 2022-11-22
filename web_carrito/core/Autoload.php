<?php

class Autoload
{
    public static function runCore(){

        require_once(".\core\Router.php");
        require_once(".\core\Render.php");
        require_once(".\core\db.php");
        require_once(".\core\Auth.php");

    }

    public static function exec()
    {
        spl_autoload_register(function ($class) {
            $ruta = str_replace("\\", "/", $class) . ".php";
            if(is_readable($ruta)){
                include_once $ruta;
            }
        });
    }

    public static function defaultpassword(): string {
        return "abcd12345+";
    }

    public static function createhash():string {
        $permitted_chars 	= '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $string2hash 		= $permitted_chars;
        $hash_created 		= substr(str_shuffle($string2hash),0,49);

        return $hash_created;
    }

    public static function getImpuestoIVA() {
        /* 21 % */
        return 0.21;
    }
}
