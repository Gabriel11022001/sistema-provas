<?php

namespace Gabriel\SistemaProvas\Repositories;

interface IRepositoryRemover extends IRepository
{
    public function remover(int $id): string;
}