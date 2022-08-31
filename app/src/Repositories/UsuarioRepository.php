<?php

namespace Gabriel\SistemaProvas\Repositories;

use Gabriel\SistemaProvas\Dtos\UsuarioDTO;
use Gabriel\SistemaProvas\Utils\Queries;
use PDO;
use PDOException;

class UsuarioRepository
{
    /**
     * Método da camada de repositório que recebe como parâmetro o email do usuário,
     * a senha desse usuário e um objeto da classe PDO, esse método me retorna um objeto
     * da classe UsuarioDTO caso exista um usuário cadastrado no banco de dados
     * com o e-mail e senha informados, caso não exista, o método retorna null.
     */
    public static function buscarUsuarioPeloEmailSenha(string $email, string $senha, PDO $conexao): UsuarioDTO|null
    {
        $query = Queries::query("buscar_usuario_pelo_email_senha");
        $stmt = $conexao->prepare($query);
        $stmt->bindValue(":email", $email);
        $stmt->bindValue(":senha", $senha);
        $stmt->execute();
        $dadosConsulta = $stmt->fetch(PDO::FETCH_ASSOC);
        if ($dadosConsulta == false) {
            return null;
        }
        $usuarioDTO = new UsuarioDTO();
        $usuarioDTO->setId($dadosConsulta["usuario_id"]);
        $usuarioDTO->setNome($dadosConsulta["usuario_nome"]);
        return $usuarioDTO;
    }
    public static function salvarUsuario(UsuarioDTO $usuarioDTO, PDO $conexao): int
    { 
        $query = Queries::query("cadastrar_usuario"); 
        $stmt = $conexao->prepare($query);
        $stmt->bindValue(":nome", $usuarioDTO->getNome());
        $stmt->bindValue(":email", $usuarioDTO->getEmail());
        $stmt->bindValue(":senha", $usuarioDTO->getSenha());
        $stmt->bindValue(":rg", $usuarioDTO->getRg());
        $stmt->bindValue(":cpf", $usuarioDTO->getCpf());
        $stmt->bindValue(":dataCadastro", $usuarioDTO->getDataCadastro()->format("Y-m-d H:i:s"));
        if ($stmt->execute() == false) {
            throw new PDOException("Ocorreu um erro ao tentar-se cadastrar o usuário no banco de dados!");
        }
        // Pegar o id do último usuário cadastrado
        $idUsuarioCadastrado = $conexao->lastInsertId();
        return $idUsuarioCadastrado;
    }
}