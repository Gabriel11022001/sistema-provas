<?php

namespace Gabriel\SistemaProvas\Controllers;

abstract class Controller
{
    /**
     * Método que recebe como parâmatro o nome de uma view,
     * caso a view exista, carrega essa view na tela por meio
     * do require_once.
     */
    protected function view(string $view): void
    {
        $view .= ".php";
        if (file_exists($view)) {
            require_once "app/views/" . $view;
        }
    }
}