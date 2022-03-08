<?php

abstract class Enclos{

    private $maxSize = 6;
    public $id;
    private $name;
    public $cleanState;
    public $animals;
    static public $CLEANSTATE_CLEAN = 0;
    static public $CLEANSTATE_CORRECT = 1;
    static public $CLEANSTATE_DIRTY = 2;

    public function __construct($data)
    {
        $this->hydrate($data);
    }

    private function hydrate($data){
        $this->id = $data['id'];
        $this->name = $data['name'];
        $this->cleanState = $data['clean_state'] ?? self::$CLEANSTATE_CORRECT;
        $this->animals = isset($data['animals']) ?
         array_map(function($animalData){
            return Animal::getSpecie($animalData);
         }, $data['animals']):[];
    }

    private function toSql() {
        // Convertit notre instance Enclos en données brutes
        return array(
            'id' => $this->id,
            'name' => $this->name,
            'clean_state' => $this->cleanState,
        );
    }

    private function persist(){
        // On enregistre les changements de notre enclos uniquement
        $database = new Database();
        $database->updateRow('enclos', $this->id, $this->toSql());
        // foreach ($this->animals as $animal)
        // {
        //     $animal->persist();
        // }
    }

    public function showStats(){

    }

    public function getName() {
        return $this->name;
    }

    public function setName($name) {
        $this->name = $name;

        $this->persist();
    }

    public function getAnimalsCount(){

       return count($this->animals);

    }

    public function showAnimalsStats(){

    }

    public function addAnimal($animal){

        if ($this->getAnimalsCount() < $this->maxSize){

            if ($this->isAnimalCompatible($animal)){

                array_push($this->animals, $animal);
                $animal->setEnclosId($this->id);

                $this->persist();
            }
        }
    }

    private function isAnimalCompatible($animal){
        if($this->getAnimalsCount() == 0){

             return true;

        }
       if ($animal->getType() == $this->animals[0] ->getType() ){

           return true;

       }

           return false;
    }

    public function removeAnimal($animal){
        $key = array_search($animal, $this->animals);
        unset($this->animals[$key]);

    }

    static public function getSubType($data){
        switch ($data['type']) {
            case 'paddock':
        $enclos = new Paddock($data);
            break;
            case 'aquarium':
        $enclos = new Aquarium($data);
            break;
                case 'aviary':
        $enclos = new Aviary($data);
            break;
    }
    return $enclos;
    }


    abstract public function clean();

}

?>