<?php

namespace Gabriel\SistemaProvas\Controllers;

use Gabriel\SistemaProvas\Services\LoginService;

class LoginController extends Controller
{
    private LoginService $loginService;

    public function __construct()
    {
        $this->loginService = new LoginService();
    }
    /**
     * /login
     */
    public function login(): void
    {
        $this->view("login");
    }
    /**
     * /logout
     */
    public function logout(): void
    {
        session_start();
        if (!empty($_SESSION["usuario_logado"])) {
            session_destroy();
        }
        $this->view("login");
    }
    /**
     * /login/realizar-login
     */
    public function realizarLogin(): void
    {
        echo json_encode($this->loginService->login());
    }
}