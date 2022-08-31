<?php

namespace Gabriel\SistemaProvas\Services;

use DateTime;
use Exception;
use Gabriel\SistemaProvas\Dtos\ProfessorDTO;
use Gabriel\SistemaProvas\Dtos\UsuarioDTO;
use Gabriel\SistemaProvas\Repositories\ProfessorRepository;
use Gabriel\SistemaProvas\Repositories\UsuarioRepository;
use Gabriel\SistemaProvas\Utils\Conexao;
use Gabriel\SistemaProvas\Utils\Retorno;

class ProfessorService
{
    public function cadastrarProfessor(): Retorno
    {
        $conexao = Conexao::getConexao();
        if ($conexao == null) {
            return new Retorno("Ocorreu um erro ao tentar-se realizar uma conexão com o banco de dados!", null);
        }
        try {
            // Iniciar a transação
            $conexao->beginTransaction();
            if (empty($_POST["nome"]) || empty($_POST["email"])
            || empty($_POST["senha"]) || empty($_POST["rg"])
            || empty($_POST["cpf"])) {
                throw new Exception("Preencha todos os campos obrigatórios!");
            }
            $usuarioDTO = new UsuarioDTO();
            $usuarioDTO->setNome($_POST["nome"]);
            $usuarioDTO->setEmail($_POST["email"]);
            $usuarioDTO->setSenha(md5($_POST["senha"]));
            $usuarioDTO->setRg($_POST["rg"]);
            $usuarioDTO->setCpf($_POST["cpf"]);
            $usuarioDTO->setDataCadastro(new DateTime());
            $idUsuarioCadastrado = UsuarioRepository::salvarUsuario($usuarioDTO, $conexao);
            $professorRepository = new ProfessorRepository($conexao);
            $professorDTO = new ProfessorDTO();
            $professorDTO->setUsuarioId($idUsuarioCadastrado);
            $resultador = $professorRepository->salvar($professorDTO);
            // Efetivar a transação
            $conexao->commit();
            $professorDTO->setNome($usuarioDTO->getNome());
            $professorDTO->setEmail($usuarioDTO->getEmail());
            return new Retorno($resultador, $professorDTO);
        } catch (Exception $e) {
            // Cancelar a transação
            $conexao->rollBack();
            return new Retorno($e->getMessage(), null);
        }
    }
}