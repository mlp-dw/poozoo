<?php

class Paddock extends Enclos{

    public function clean(){
        if(empty($this->animals)){
            switch ($this->cleanState) {
                case 0:

                    break;
                case 1:
                    $this->cleanState = 0;
                    break;
                case 2:
                    $this->cleanState--;
                    break;
                default:
                    throw new Exception("Paddock's cleanstate accepts only values 0, 1 or 2. " . strval($this->cleanState) . " given");
                    break;
            }
        }else{
            // Affichage d'une erreur à destination de l'utilisateur
        }
    }
}
?>