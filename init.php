<?php
include "battle.php";
$cursor = 1;

# MENU DE INICIO #


while(true){
    CLEAR();
    echo "================( MENU )====================\n [$key]\n\n";
    echo menu([
        1 => "Iniciar",
        2 => "Tienda",
        3 => "Inventario",
        4 => "Salir"
    ], $cursor);
    
    $key = KEYS();

    if($key === "up" && $cursor > 1){
        $cursor--;
    }

    else if($key === "down" && $cursor < 4){
        $cursor++;
    }

    else if($key === "enter"){

    }
}

