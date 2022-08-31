<?php

namespace Gabriel\SistemaProvas\Models;

use DateTime;

class Usuario
{
    private int $id;
    private string $nome;
    private string $email;
    private string $senha;
    private string $cpf;
    private string $rg;
    private DateTime $dataCadastro;

    public function setId(int $id): void
    {
        $this->id = $id;
    }
    public function getId(): int
    {
        return $this->id;
    }
    public function setNome(string $nome): void
    {
        $this->nome = $nome;
    }
    public function getNome(): string
    {
        return $this->nome;
    }
    public function setDataCadastro(DateTime $dataCadastro): void
    {
        $this->dataCadastro = $dataCadastro;
    }
    public function getDataCadastro(): DateTime
    {
        return $this->dataCadastro;
    }   
    public function setEmail(string $email): void
    {
        $this->email = $email;
    }
    public function getEmail(): string
    {
        return $this->email;
    }
    public function setSenha(string $senha): void
    {
        $this->senha = md5($senha);
    }
    public function getSenha(): string
    {
        return $this->senha;
    }
    public function setCpf(string $cpf): void
    {
        $this->cpf = $cpf;
    }
    public function getCpf(): string
    {
        return $this->cpf;
    }
    public function setRg(string $rg): void
    {
        $this->rg = $rg;
    }
    public function getRg(): string
    {
        return $this->rg;
    }
}