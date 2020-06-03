<?php

namespace App;

class Helpers
{
    static function view(String $path, Array $data = null) {
        session_start();
        if (count($_SESSION) > 0){
            extract($_SESSION, EXTR_OVERWRITE);
        }
        if (!empty($data)) {
            extract($data);
        }
        $_SESSION = [];
        unset($_POST);
        $content = __DIR__."/../views/".$path;
        include __DIR__."/../views/layout.php";
    }
    
    static function redirect(String $uri, Array $data) {
        session_start();
        $keys = array_keys($data);
        extract($data);
        $vars = compact($keys);
        foreach ($vars as $key => $value) {
            $_SESSION[$key]=$value;
        }
        header("Location: $uri", TRUE, 301);
    }
}
