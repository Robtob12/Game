<?php
function menu(array $opciones, int $cursor): string{
    $texto = [];

    foreach ($opciones as $indice => $opcion) {
        $texto[] = ($cursor == $indice)
            ? "► [$indice] $opcion"
            : "  [$indice] $opcion";
    }

    return implode("\n", $texto);
}