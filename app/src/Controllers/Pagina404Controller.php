<?php

namespace Gabriel\SistemaProvas\Controllers;

class Pagina404Controller extends Controller
{
    public function pagina404(): void
    {
        parent::view("pagina404");
    }
}