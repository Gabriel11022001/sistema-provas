<?php

use Gabriel\SistemaProvas\Controllers\LoginController;
use Gabriel\SistemaProvas\Controllers\Pagina404Controller;

require_once "autoload.php";

$endpoint = $_SERVER["REQUEST_URI"];
if ($endpoint === "/" || $endpoint === "/login") {
    $loginController = new LoginController();
    $loginController->login();
    exit;
}
if ($endpoint === "/login/realizar-login") {
    $loginController = new LoginController();
    $loginController->realizarLogin();
    exit;
}
if ($endpoint === "/logout") {
    $loginController = new LoginController();
    $loginController->logout();
    exit;
}
$pagina404Controller = new Pagina404Controller();
$pagina404Controller->pagina404();