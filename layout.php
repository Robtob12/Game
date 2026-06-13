function menu1($cursor){

    $op1 = ($cursor == 1) ? "► [1] Nueva partida" : "  [1] Nueva partida";
    $op2 = ($cursor == 2) ? "► [2] Continuar"    : "  [2] Continuar";
    $op3 = ($cursor == 3) ? "► [3] Créditos"     : "  [3] Créditos";
    $op4 = ($cursor == 4) ? "► [4] Salir"        : "  [4] Salir";

    return <<<TEXT
╔══════════════════════════════════════╗
║      SANS Y LOS HUESOUNIVERSOS       ║
╚══════════════════════════════════════╝

$op1
$op2
$op3
$op4
TEXT;
}