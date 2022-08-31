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
    public function login(): void
    {
        $this->view("login");
    }
    public function logout(): void
    {
        $this->view("login");
    }
}