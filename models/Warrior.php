<?php

class Warrior extends Character{
    public int $defens;
    
    public function getDamage(int $damage){
        $realDamage = $damage - $this->defens;
        $realDamage = $realDamage < 0 ? 0 : $realDamage;
        $this->hp -= $realDamage;
    }
}