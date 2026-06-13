<?php

// ? FUNCION ACTION
/*
    Esta funcion sera usada simplemente para saltar aciones o leerlas
    esta devolvera lo que el jugador indique
*/

function READ_ACTION(){
    return trim(fgets(STDIN));
}

// ? FUNCION CLEAR
/*
    Esta funcion limpiara el terminal y la suciedad de 
    la panalla asiendo qeu el juego se sienta mas realista
*/

function CLEAR(){
    if(php_uname('s') === "Linux"){
        echo shell_exec('clear');
    }
    else if(php_uname('s') === "Windows"){
        echo shell_exec('cls');
    }
}

// ? FUNCION NARRATIVE (IA)
/*
    Esta narra qualquier texto que le pasemos
    de forma mas humana
*/

function NARRATIVE($texto = ''){
    foreach(preg_split('//u', $texto, -1, PREG_SPLIT_NO_EMPTY) as $char){
        echo $char;
        flush();
        if($char === ' '){
            usleep(150000);
        } else{
            usleep(rand(20000, 80000));
        }
    }

}

// ? FUNCION READ_KEY (IA)
/*
    Esta funcion nos permitira leer las flechas
    del teclado como otras teclas
*/

function READ_KEY(){
    shell_exec('stty -icanon -echo');

    $key = fread(STDIN, 1);

    if ($key === "\033") {
        $key .= fread(STDIN, 2);
    }

    shell_exec('stty sane');

    switch ($key) {
        case "\033[A":
            return 'up';

        case "\033[B":
            return 'down';

        case "\033[C":
            return 'right';

        case "\033[D":
            return 'left';

        case "\n":
        case "\r":
            return 'enter';

        default:
            return $key;
    }
}

function _(){
    echo "\n";
}