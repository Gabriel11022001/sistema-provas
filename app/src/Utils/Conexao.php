<?php

namespace Gabriel\SistemaProvas\Utils;

use PDO;
use PDOException;

class Conexao
{
    /**
     * Método que me retorna um objeto do tipo PDO
     * caso a conexão com o banco de dados seja efetivada com sucesso,
     * caso seja lançado alguma exceção, o método retorna null
     */
    public static function getConexao(): PDO|null
    {
        $bancoDados = "sistema_provas";
        $usuarioBancoDados = "root";
        $senhaUsuarioBancoDados = "Gabriel@11022001";
        try {
            return new PDO("mysql:host=localhost;dbname=" . $bancoDados, $usuarioBancoDados, $senhaUsuarioBancoDados);
        } catch (PDOException $e) {
            return null;
        }
    }
}