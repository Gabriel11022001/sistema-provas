<?php

namespace Gabriel\SistemaProvas\Utils;

class Queries
{
    private static array $queries = [
        "buscar_todos_alunos" => "SELECT * FROM usuarios, alunos WHERE usuarios.usuario_id = alunos.usuario_id;",
        "cadastrar_aluno" => "",
        "buscar_todos_professores" => "",
        "cadastrar_professor" => "INSERT INTO professores(usuario_id) VALUES(:usuarioId);",
        "buscar_todas_provas" => "",
        "buscar_usuario_pelo_email_senha" => "SELECT * FROM usuarios WHERE usuario_email = :email AND usuario_senha = :senha;",
        "buscar_aluno_pelo_id_do_usuario" => "SELECT * FROM usuarios, alunos WHERE usuarios.usuario_id = alunos.usuario_id AND usuarios.usuario_id = :id;",
        "buscar_professor_pelo_id_do_usuario" => "SELECT * FROM usuarios, professores WHERE usuarios.usuario_id = professores.usuario_id AND usuarios.usuario_id = :id;",
        "cadastrar_usuario" => "INSERT INTO usuarios(usuario_nome, usuario_email, usuario_senha, usuario_rg, usuario_cpf, usuario_data_cadastro) VALUES(:nome, :email, :senha, :rg, :cpf, :dataCadastro);"
    ];

    public static function query(string $indice): string
    {
        return self::$queries[$indice];
    }
}