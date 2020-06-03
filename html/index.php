<?php
require __DIR__.'/../autoload.php';
require __DIR__.'/../routes/api.php';
use App\Kernel\Router;
// Rutas
$url_actual = $_SERVER["REQUEST_URI"];
$method = $_POST['_method'];
if ($method) {
    Router::routing($url_actual, $method);
} else {
    Router::routing($url_actual);
}