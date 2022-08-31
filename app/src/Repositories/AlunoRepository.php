<?php

namespace Gabriel\SistemaProvas\Repositories;

use Gabriel\SistemaProvas\Dtos\AlunoDTO;
use Gabriel\SistemaProvas\Utils\Queries;
use PDO;

class AlunoRepository implements IRepository
{
    private PDO $pdo;

    public function __construct(PDO $pdo)
    {
        $this->pdo = $pdo;
    }
    public function salvar($entidade): string
    {
        return "";
    }
    /**
     * Método da camada de repositório para buscar todos os alunos
     * cadastrados no banco de dados, o método retorna um array
     * assossiativo com os dados de todos os alunos.
     */
    public function buscarTodos(): array
    {
        $query = Queries::query("buscar_todos_alunos");
        $stmt = $this->pdo->prepare($query);
        $stmt->execute();
        $dadosConsulta = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $dadosConsulta;
    }
    public function editar($entidade): string
    {
        return "";
    }
    public function buscarPeloId(int $id): array
    {
        return [];
    }
    /**
     * Método da camada de repositório para consultar um aluno
     * pela chave estrangeira(usuario_id), o método recebe como parâmetro
     * o id do usuário e caso exista um aluno cadastrado no banco de dados
     * com o valor da chave estrangeira(usuario_id) igual ao id passado como parâmetro,
     * o método retorna um objeto da classe AlunoDTO, caso contrário, retorna null.
     */
    public function buscarAlunoPeloIdDoUsuario(int $id): AlunoDTO|null
    {
        $query = Queries::query("buscar_aluno_pelo_id_do_usuario");
        $stmt = $this->pdo->prepare($query);
        $stmt->bindValue(":id", $id, PDO::PARAM_INT);
        $stmt->execute();
        $dadosConsulta = $stmt->fetch(PDO::FETCH_ASSOC);
        if ($dadosConsulta == false) {
            return null;
        }
        $alunoDTO = new AlunoDTO();
        $alunoDTO->setId($dadosConsulta["aluno_id"]);
        $alunoDTO->setRa($dadosConsulta["aluno_ra"]);
        return $alunoDTO;
    }
}