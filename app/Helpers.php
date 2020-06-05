<?php

namespace App;

class Helpers
{
    static function view(String $path, array $data = [])
    {
        session_start();
        if (count($_SESSION) > 0) {
            extract($_SESSION, EXTR_OVERWRITE);
        }
        if (!empty($data)) {
            extract($data);
        }
        if (isset($_SESSION['user_id'])) {
            $user_id = $_SESSION['user_id'];
        }
        session_unset();
        $_SESSION['user_id'] = $user_id;
        session_write_close();
        unset($_POST);
        $content = __DIR__ . "/../views/" . $path;
        include __DIR__ . "/../views/layout.php";
    }
    
    static function redirect(String $uri, array $data = [])
    {
        session_start();
        if (count($data) > 0) {
            $keys = array_keys($data);
            extract($data);
            $vars = compact($keys);
            foreach ($vars as $key => $value) {
                $_SESSION[$key] = $value;
            }
        }
        header("Location: $uri", TRUE, 301);
    }
}
