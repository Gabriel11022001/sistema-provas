<?php

namespace Gabriel\SistemaProvas\Services;

use Gabriel\SistemaProvas\Utils\Retorno;

class LoginService
{
    private UsuarioService $usuarioService;

    public function __construct()
    {
        $this->usuarioService = new UsuarioService();
    }
    public function login(): Retorno
    {
        $retorno = $this->usuarioService->buscarUsuarioPeloEmailSenha();
        if ($retorno->getMensagem() == "Aluno encontrado com sucesso!"
        || $retorno->getMensagem() == "Professor encontrado com sucesso!") {
            session_start();
            $_SESSION["usuario_logado"] = $retorno->getConteudo();
        }
        return $retorno;
    }
}