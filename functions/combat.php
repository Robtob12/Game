<?php

require_once "../models/Weapon.php";

function combat(Object $p1){

    // # CARGAR ENEMIGO //
    # GENERAR NOMBRE #

    $sort = RANDOM(1, 10);
    $name = null;
    switch ($sort) {

        case 1:
            $name = "Bestia Salvaje";
            break;

        case 2:
            $name = "Ogro";
            break;

        case 3:
            $name = "Troll";
            break;

        case 4:
            $name = "Minotauro";
            break;

        case 5:
            $name = "Gigante";
            break;

        case 6:
            $name = "Hidra";
            break;

        case 7:
            $name = "Demonio";
            break;

        case 8:
            $name = "Señor Demoníaco";
            break;

        case 9:
            $name = "Dragón Ancestral";
            break;

        case 10:
            $name = "Titán";
            break;
    }

    # COLOCAR NIVEL
    $lvl = RANDOM(1, 5);
    
    # GENERAR ENEMIGO
    $p2 = new Character($name, (10 * $lvl), 5);
    
    # GENERAR ARMA
    $sort = RANDOM(1, 10);
    $damage = 0;
    $skin = "";
    
    switch ($sort) {
        case 1:
            $name = "Daga";
            $damage = RANDOM(5, 10);
            $skin = "=𝄔𝈷";
            break;

        case 2:
            $name = "Espada";
            $damage = RANDOM(10, 18);
            $skin = "";
            break;
        case 3:
            $name = "Hacha";
            $damage = RANDOM(15, 25);
            break;

        case 4:
            $name = "Maza";
            $damage = RANDOM(18, 28);
            break;

        case 5:
            $name = "Lanza";
            $damage = RANDOM(20, 30);
            break;

        case 6:
            $name = "Espada Pesada";
            $damage = RANDOM(25, 35);
            break;

        case 7:
            $name = "Hacha de Guerra";
            $damage = RANDOM(30, 40);
            break;

        case 8:
            $name = "Espada Maldita";
            $damage = RANDOM(35, 50);
            break;

        case 9:
            $name = "Espada Demoníaca";
            $damage = RANDOM(45, 60);
            break;

        case 10:
            $name = "Espada del Titán";
            $damage = RANDOM(60, 80);
            break;
    }

    $w = new Weapon($name, $damage, $skin);
}