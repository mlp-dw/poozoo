<?php

class Aviary extends Paddock{

    function __construct($data)
    {
        parent::__construct($data);

    }
    
    public function getType(){
        return 'aviary';
    }

    public function getAnimal(){
        parent::$animals;
        $data['type'] = 'eagle';
        $animal = new Tiger($data);
        array_push($animals, $animal);
        return $animals;;
    }

}

?>