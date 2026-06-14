<?php
Class player{
    public string $nombre;
    public string $skin;
    public flaot $vida;
    public flaot $mana;
    public flaot $dpt;
    public flaot $def;
    public string $ultimate;
    public array $skills = [];

    public function _construct(string $nombre){
        $this->nombre = $nombre;
        $this->skin = "(•-•)";
        $this->vida = 100.0;
        $this->mana = 100.0;
        $this->dpt  = 1.0;
        $this-> def = 0.0;
        $this->ultimate = "None";
        $this->skills = [];
    }

    //! FUNCIONES DE DEPURACION !//
    public function get_skin(){
        return $this->skin;
    }
}