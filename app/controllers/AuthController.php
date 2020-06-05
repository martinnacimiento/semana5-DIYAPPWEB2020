<?php
namespace App\Controllers;
use App\Helpers;
use App\Usuario;

class AuthController
{
    public function indexLogin()
    {
        Helpers::view('auth/login.php');
    }

    public function login($request)
    {
        session_start();
        $user = Usuario::findByUsername($request->username);
        if (isset($user) && password_verify($request->password, $user->password)) {
            $_SESSION['user_id'] = $user->id;
            Helpers::redirect('home', ['message' => "Bienvenido $user->username"]);
        } else {
            Helpers::redirect('login', ['message' => 'Datos incorrectos']);
        }
    }
    public function logout($request)
    {
        session_start();
        session_destroy();
        Helpers::redirect('home');
    }
}
