<?php

namespace App\Handlers;

use App\Handlers\BaseHandler;
use App\Helpers;
use App\Usuario;

class AuthenticateHandler extends BaseHandler
{
    public function handle($request)
    {
        session_start();
        if (isset($_SESSION["user_id"])) {
            return true;
        } else {
            Helpers::redirect('/login', ['message' => 'Datos incorrectos']);
        }
    }
}
