<?php

namespace Gabriel\SistemaProvas\Dtos;

class ProfessorDTO extends UsuarioDTO
{
    private int $usuarioId;

    public function setUsuarioId(int $usuarioId): void
    {
        $this->usuarioId = $usuarioId;
    }
    public function getUsuarioId(): int
    {
        return $this->usuarioId;
    }
}