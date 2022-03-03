<?php

class Bear extends Animal{

    function __construct($data)
    {
        parent::__construct($data);

    }
    public function climbTree(){


    }

    public function getType(){
        return 'bear';
    }
    public function makeSound(){

        echo 'greeee ';
       }

}

?>