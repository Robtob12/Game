<?php

# MENU DE INICIO #

echo "============( Menu )===========";
_();
_();
echo "";

$key = READ_KEY();

if ($key == 'up') {
    $cursor--;
}

if ($key == 'down') {
    $cursor++;
}

if ($key == 'enter') {
    echo "Seleccionado";
}