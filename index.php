<?php

require_once "autoload.php";

use Gabriel\SistemaProvas\Services\ProfessorService;

$_POST["nome"] = "Gabriel Rodrigues";
$_POST["email"] = "gabriel2@gmail.com";
$_POST["rg"] = "18.024.584-3";
$_POST["cpf"] = "424.741.700-22";
$_POST["senha"] = "gabriel1234";
$professorService = new ProfessorService();
echo "<pre>";
var_dump($professorService->cadastrarProfessor());
echo "</pre>";