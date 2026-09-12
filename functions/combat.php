<?php

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
    $p2 = new Monster($name, "(o-0)", 10, 5, $lvl);
    
    # GENERAR ARMA
    $sort = RANDOM(1, 10);
    $damage = 0;
    $skin = "";
    
    switch ($sort) {
        case 1:
            $name = "Daga";
            $damage = RANDOM(5, 10);
            $skin = '🗡';
            break;

        case 2:
            $name = "Espada";
            $damage = RANDOM(10, 18);
            $skin = "🖌";
            break;
        case 3:
            $name = "Hacha";
            $damage = RANDOM(15, 25);
            $skin = "𐃈";
            break;

        case 4:
            $name = "Maza";
            $damage = RANDOM(18, 28);
            $skin = "T";
            break;

        case 5:
            $name = "Lanza";
            $damage = RANDOM(20, 30);
            $skin = "𓐬";
            break;

        case 6:
            $name = "Espada Pesada";
            $damage = RANDOM(25, 35);
            $skin = "╽";
            break;

        case 7:
            $name = "Hacha de Guerra";
            $damage = RANDOM(30, 40);
            $skin = "༒︎";
            break;

        case 8:
            $name = "Espada Maldita";
            $damage = RANDOM(35, 50);
            $skin = "𒌐";
            break;
            
        case 9:
            $name = "Espada Demoníaca";
            $damage = RANDOM(45, 60);
            $skin = "ⴕ";
            break;

        case 10:
            $name = "Espada del Titán";
            $damage = RANDOM(60, 80);
            $skin = "┆";
            break;
    }

    $w = new Weapon($name, $damage, $skin);

    # EQUIPAR ARMA
    $p2->equip($w);

   while ($p1->hp > 0 && $p2->hp > 0) {
        CLEAR();
        SAY("\n\nHP:" . $p1->hp() . "                                     HP:" .$p2->hp());
        SAY("\n《LVL".$p1->lvl()."》                                  《LVL".$p2->lvl()."》");
        SAY("\n\n\n".$p1->generate()."                                     ".$p2->generate());
        SAY("\n=================================================");
        $option = READ("\n\n");

        
   }
}