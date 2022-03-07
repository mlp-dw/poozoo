<?php

class Marine extends Paddock{

    function __construct($data)
    {
        parent::__construct($data);

    }
    
    public function getType(){
        return 'marine';
    }
   
    public function getAnimal(){
        parent::$animals;
        $data['type'] = 'fish';
        $animal = new Tiger($data);
        array_push($animals, $animal);
        return $animals;;
    }
}

?>