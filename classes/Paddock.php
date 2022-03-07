<?php

abstract class Paddock  {
    public $id;
    public $name;
    public $type;
    public $isClean;  
    public $animals = [];

    function __construct($data){
        $this->hydrate($data);
    }

    public function cleaning(){
        $this->isClean = "clean";
    }

    public function putAnimalInPaddock(){
        
    }

    private function hydrate($data) {
        $this->id = $data["id"] ;
        $this->name = $data['name'] ;
        $this->type = $data['type'] ;
        $this->isClean = $data['is_clean'] ?? "clean" ;
    }

    abstract function getType();
    abstract function getAnimal();

    

}

?>