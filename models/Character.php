<?php

Class Character{
    public int $hp;
    public int $damage;
    public string $name;
    public string $hand1;
    public string $hadn2;

    public function __construct(string $name ,int $hp ,int $damage,string $hand1 = "", string $hadn2 = ""){
        $this->name      = $name;
        $this->hp        = $hp;
        $this->damage    = $damage;
        $this->hand1     = $hand1;
        $this->hadn2     = $hand1;
    }

    public function name(){
        return $this->name;
    }

    public function hp(){
        return $this->hp;
    }

    public function equip(Weapon $item){
        $this->hand1 = $item->skin();
        $this->damage += $item->use();
    }

    public function unequip(Weapon $item){
        $this->hand1 = "";
        $this->damage -= $item->use();
    }

    public function Attack(Character $entity){
        $entity->getDamage($this->damage);
        return $this->damage;
    }
    
    public function getDamage(int $damage){
        $this->hp -= $damage;
    }
}