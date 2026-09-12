<?php

Class Character{
    public int $hp;
    public int $damage;
    public int $lvl;
    public string $name;
    public string $skin;
    public string $hand1;
    public string $hand2;

    public function __construct(string $name ,string $skin,int $hp ,int $damage, int $lvl,string $hand1 = "", string $hand2 = ""){
        $this->name      = $name;
        $this->skin      = $skin;
        $this->lvl       = $lvl;
        $this->hp        = $hp * $lvl;
        $this->damage    = $damage * $lvl;
        $this->hand1     = $hand1;
        $this->hand2     = $hand2;
    }

    public function name(){
        return $this->name;
    }

    public function lvl(){
        return $this->lvl;
    }

    public function hp(){
        return $this->hp;
    }

    public function skin(){
        return $this->skin;
    }

    public function hand1(){
        return $this->hand1;
    }

    public function hand2(){
        return $this->hand2;
    }

    public function generate(){
        return $this->hand2().$this->skin().$this->hand1();
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