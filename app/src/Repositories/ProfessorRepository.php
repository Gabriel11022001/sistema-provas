<?php

namespace Gabriel\SistemaProvas\Repositories;

use Gabriel\SistemaProvas\Dtos\ProfessorDTO;
use Gabriel\SistemaProvas\Utils\Queries;
use PDO;
use PDOException;

class ProfessorRepository implements IRepository
{
    private PDO $pdo;

    public function __construct(PDO $pdo)
    {   
        $this->pdo = $pdo;
    }
    /**
     * Método da camada de repositório que recebe como parâmetro
     * um objeto da classe ProfessorDTO e salvar no banco de dados o 
     * professor, caso ocorra algum problema no momento de persistir
     * os dados do professor no banco de dados é lançado uma exceção 
     * do tipo PDOException, caso contrário, é retornado uma mensagem
     * informando que o professor foi cadastrado com sucesso no banco 
     * de dados.
     */
    public function salvar($entidade): string
    {
        $query = Queries::query("cadastrar_professor");
        $stmt = $this->pdo->prepare($query);
        $stmt->bindValue(":usuarioId", $entidade->getUsuarioId(), PDO::PARAM_INT);
        if ($stmt->execute() == false) {
            throw new PDOException("Ocorreu um erro ao tentar-se cadastrar o professor no banco de dados!");
        }
        return "Professor cadastrado com sucesso!";
    }
    public function buscarPeloId(int $id): array
    {
        return [];
    }
    public function buscarTodos(): array
    {
        return [];
    }
    public function editar($entidade): string
    {
        return "";
    }
    /**
     * Método da camada de repositório para consultar um professor
     * pela chave estrangeira(usuario_id), o método recebe como parâmetro
     * o id do usuário e caso exista um professor cadastrado no banco de dados
     * com o valor da chave estrangeira(usuario_id) igual ao id passado como parâmetro,
     * o método retorna um objeto da classe ProfessorDTO, caso contrário, retorna null.
     */
    public function buscarProfessorPeloIdDoUsuario(int $id): ProfessorDTO|null
    {
        $query = Queries::query("buscar_professor_pelo_id_do_usuario");
        $stmt = $this->pdo->prepare($query);
        $stmt->bindValue(":id", $id, PDO::PARAM_INT);
        $stmt->execute();
        $dadosConsulta = $stmt->fetch(PDO::FETCH_ASSOC);
        if ($dadosConsulta == false) {
            return null;
        }
        $professorDTO = new ProfessorDTO();
        $professorDTO->setId($dadosConsulta["professor_id"]);
        return $professorDTO;
    }
}