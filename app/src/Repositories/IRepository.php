<?php

namespace Gabriel\SistemaProvas\Repositories;

interface IRepository
{
    public function salvar($entidade): string;
    public function buscarTodos(): array;
    public function buscarPeloId(int $id): array;
    public function editar($entidade): string;
}