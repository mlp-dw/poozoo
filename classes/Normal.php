<?php

class Normal extends Paddock{

    function __construct($data)
    {
        parent::__construct($data);

    }
    
    public function getType(){
        return 'normal';
    }

    public function getAnimal(){
        parent::$animals;
        foreach ($animals as $data) {

            switch ($data['type']) {
                case 'tiger':
                    $animal = new Tiger($data);
                    break;
    
                case 'bear':
                    $animal = new Bear($data);
                    break;
    
            }
    
            array_push($animals, $animal);
    
        }
        return $animals;;
    }

}

?>