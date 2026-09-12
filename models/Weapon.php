<?php

class Weapon{
    public string $name;
    public int $damage;
    public string $skin;

    public function __construct(string $name, int $damage,string $skin){
        $this->name = $name;
        $this->damage = $damage;
        $this->skin = $skin;
    }
    
    public function Use(){
        return  $this->damage;
    }

    public function name(){
        return $this->name;
    }

    public function skin(){
        return $this->skin;
    }
}

