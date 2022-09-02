<?php

namespace Gabriel\SistemaProvas\Services;

use Exception;
use Gabriel\SistemaProvas\Repositories\AlunoRepository;
use Gabriel\SistemaProvas\Repositories\ProfessorRepository;
use Gabriel\SistemaProvas\Repositories\UsuarioRepository;
use Gabriel\SistemaProvas\Utils\Conexao;
use Gabriel\SistemaProvas\Utils\Retorno;
use PDOException;
use RuntimeException;

class UsuarioService
{
    public function buscarUsuarioPeloEmailSenha(): Retorno
    {
        try {
            if (empty($_POST["email"]) || empty($_POST["senha"])) {
                throw new RuntimeException("Informe o e-mail e a senha!");
            }
            $conexao = Conexao::getConexao();
            if ($conexao == null) {
                throw new PDOException("Ocorreu um erro ao tentar-se realizar a conexão com o banco de dados!");
            }
            $email = $_POST["email"];
            $senha = md5($_POST["senha"]);
            $usuarioDTO = UsuarioRepository::buscarUsuarioPeloEmailSenha($email, $senha, $conexao);
            if ($usuarioDTO == null) {
                return new Retorno("Não existe um usuário cadastrado no banco de dados com esse e-mail e senha!", null);
            }
            $alunoRepository = new AlunoRepository($conexao);
            $alunoDTO = $alunoRepository->buscarAlunoPeloIdDoUsuario($usuarioDTO->getId());
            if ($alunoDTO != null) {
                $alunoDTO->setNome($usuarioDTO->getNome());
                return new Retorno("Aluno encontrado com sucesso!", [
                    "id" => $alunoDTO->getId(),
                    "nome" => $alunoDTO->getNome(),
                    "ra" => $alunoDTO->getRa()
                ]);
            }
            $professorRepository = new ProfessorRepository($conexao);
            $professorDTO = $professorRepository->buscarProfessorPeloIdDoUsuario($usuarioDTO->getId());
            $professorDTO->setNome($usuarioDTO->getNome());
            return new Retorno("Professor encontrado com sucesso!", [
                
            ]);
        } catch (Exception $e) {
            return new Retorno($e->getMessage(), null);
        }
    }
}