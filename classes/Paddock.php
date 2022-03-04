<?php

abstract class Paddock  {

    public $name;
    public $type;
    public $isClean;
    public $numberOfAnimals;

    function __construct($data){
        $this->hydrate($data);
    }

    public function cleaning(){
        $this->isClean = "clean";
    }

    public function countAnimal(){
        $this->numberOfAnimals = 0;
    }

    private function hydrate($data) {
        $this->name = $data['name'] ;
        $this->age = $data['type'] ;
        $this->isClean = $data['is_clean'] ?? "clean" ;
        $this->numberOfAnimals = $data['number_of_animals'] ?? 0 ;
    }

    abstract function getType();

}

?>