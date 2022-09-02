<?php

namespace Gabriel\SistemaProvas\Utils;

use JsonSerializable;

class Retorno implements JsonSerializable
{
    private string $mensagem;
    private $conteudo;

    public function __construct(string $mensagem, $conteudo)
    {
        $this->mensagem = $mensagem;
        $this->conteudo = $conteudo;
    }
    /**
     * Método para serializar os objetos da classe Retorno
     */
    public function jsonSerialize(): mixed
    {
        return get_object_vars($this);
    }
    public function getMensagem(): string
    {
        return $this->mensagem;
    }
    public function getConteudo()
    {
        return $this->conteudo;
    }
}