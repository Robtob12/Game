<?php

// # REQUERIR ENGINE # //
require_once "Engine/dev.php";
require_once "models/Character.php";
require_once "models/Warrior.php";
require_once "models/Monster.php";
require_once "functions/combat.php";
require_once "models/Weapon.php";

# [1] - historia

# OBTENER DIALOGOS
// $dialogs = [];
//
// for($i = 1;$i <= 3;$i++){
//     CLEAR();
//     EFFECT("Animation String",file_get_contents("dialogs/dialog{$i}.txt"));
//     SAY("\nPreciona Enter >");
//     READ();
// }
//
// CLEAR();
// EFFECT("Animation String", COLOR(file_get_contents("dialogs/dialog4.txt"),"red"));
// SAY("\nPreciona Enter 💀");
// READ();

# [2] Escojer un nombre
$name = false;

$n = "";

while (!$name) {

    CLEAR();

    SAY("===[ ESCOJE UN NOMBRE ]===");

    $option = READ("\n\n\n:");

    if ($option !== "") {

        $n = $option;
        $name = true;

    }
}

# [3] Escojer clase

# LOOP de ACIONES
$class = false;
$p1 = null;
$money = 100;

while(!$class){
    CLEAR();
    SAY("===[ ESCOJE UNA CLASE ]===");
    SAY("\n\n[1] - " . COLOR("Warrior", "red"));
    SAY("\n\n[2] - " . COLOR("Wizard", "black"));
    SAY("\n\n[3] - " . COLOR("Archer", "black"));
    
    # OPTENER OPCION
    $option = READ("\n\n");
    
    switch($option){
        case "1":
            $p1 = new Warrior($n, "(0-0)", 100, 10, 1);
            $p1->defens = 5;
            $class = true;
        break;
        default:
        break;
    }
}

# [4] Menu

while($p1->hp > 0){
    CLEAR();
    SAY("=====[ ~        MENU        ~ ]====");

    # STATUS
    SAY("\n".$p1->name()."Money: {$money}$");
    SAY("\n\n".COLOR("[1]", "yellow")." - Comenzar");
    SAY("\n".COLOR("[2]", "yellow")." - Tienda");
    SAY("\n".COLOR("[3]", "yellow")." - Inventario");
    SAY("\n".COLOR("[4]", "yellow")." - ".COLOR("Salir", "red"));

    $option = READ("\n\n");
    switch($option){
        case "1":
            combat($p1);
        break;
    }
}