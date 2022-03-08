<?php

abstract class Enclos{

    private $maxSize;
    public $name;
    public $cleanState;
    public $animals;
    static public $CLEANSTATE_CLEAN = 0;
    static public $CLEANSTATE_CORRECT = 1;
    static public $CLEANSTATE_DIRTY = 2;


    public function showStats(){

    }

    public function getAnimalsCount(){

    }

    public function showAnimalsStats(){

    }

    public function addAnimal($animal){

    }

    public function removeAnimal($animal){

    }

    abstract public function clean();

}

?>