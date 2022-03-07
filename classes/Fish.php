<?php

class Fish extends Animal{

    function __construct($data)
    {
        parent::__construct($data);

    }
    public function swim(){


    }
    public function getType(){
        return 'fish';
    }
    public function makeSound(){

        echo "splash ! (Vous avez reçu de l'eau en pleine tête)";
       }
}

?>