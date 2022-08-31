<?php

/**
 * Autoload de classes
 */
spl_autoload_register(function ($caminhoCompletoClasse) {
    $caminhoCompletoClasse = str_replace("Gabriel\\SistemaProvas", "app/src/", $caminhoCompletoClasse);
    $caminhoCompletoClasse = str_replace("\\", DIRECTORY_SEPARATOR, $caminhoCompletoClasse);
    $caminhoCompletoClasse = $caminhoCompletoClasse . ".php";
    if (file_exists($caminhoCompletoClasse)) {
        require_once $caminhoCompletoClasse;
    }
});