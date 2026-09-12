<?php

class Monster extends Character{
    
     public function generate(){
        return $this->hand1().$this->skin().$this->hand2();
    }
}