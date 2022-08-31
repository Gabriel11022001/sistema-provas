<?php

namespace Gabriel\SistemaProvas\Models;

class Aluno extends Usuario
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