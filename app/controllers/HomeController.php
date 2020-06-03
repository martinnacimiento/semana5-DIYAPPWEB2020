<?php
namespace App\Controllers;
use App\Helpers;

class HomeController
{
    public function index()
    {
        return Helpers::view("/home.php");
    }
}
