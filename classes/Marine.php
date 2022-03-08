<?php

class Marine extends Paddock{

    function __construct($data)
    {
        parent::__construct($data);

    }
    
    public function getType(){
        return 'marine';
    }
   
    
}

?>