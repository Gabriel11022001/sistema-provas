<?php

namespace Gabriel\SistemaProvas\Dtos;

class AlunoDTO extends UsuarioDTO
{
    private string $ra;

    public function setRa(string $ra): void
    {
        $this->ra = $ra;
    }
    public function getRa(): string
    {
        return $this->ra;
    }
}