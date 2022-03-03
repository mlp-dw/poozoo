<?php

class Tiger extends Animal{

    function __construct($data)
    {
        parent::__construct($data);

    }
    public function errant(){


    }
   public function getType(){
       return 'tiger';
   }
   public function makeSound(){

    echo 'griii bagera';
   }


}

?>