<?php


class Employee{
    public $id;
    public $name;
    public $age;
    public $gender;

    // function __construct($data){
    // $this->hydrate($data);
    // }

    // private function hydrate($data) {
    //     $this->id = $data['id'] ?? null;
    //     $this->name = $data['name'] ;
    //     $this->age = $data['age'] ;
    //     $this->gender = $data['gender'] ;
    // }

    public function persist(){
        $database = new Database();
        $database->updateRow('employee', $this->id, $this->toSql());
    }

    public function toSql() {
        return array(
            'id' => $this->id,
            'name' => $this->name,
            'age' => $this->age,
            'gender' => $this->gender,
        );
    }

    public function scanEclos(){
        //affiche les aniamux contenu dans l'enclos et leur caractéristique
    }

    public function cleanEnclos(){
        //nettoie l'enclos s'il est sale et vide
    }

    public function giveFood(){
        //nourrir si les animaux ne dorment pas
    }

    public function addPaddockForNewAnimal(){

    }

    public function wakeUpAnimal(){

    }

    public function transferAnimal(){
        include './config/db.php';
        $req = $db->prepare("UPDATE animals SET enclos_id= ? WHERE id = '".$data['id']."'");
        $req->execute([$animal->getEnclosId()]);
    }

    public function createAnimal($animal){

        include './config/db.php';
        $req = $db->prepare("INSERT INTO animals (name, type, size, weight, age, enclos_id) VALUES (?,?,?,?,?,?)");
        $req->execute([$animal->name, $animal->getType(), $animal->getSize(), $animal->weight, $animal->age, $animal->getEnclosId()]);
    }

    public function createEnclos($enclos){

        include './config/db.php';
        $req = $db->prepare("INSERT INTO enclos (name, type) VALUES (?,?)");
        $req->execute([$enclos->getName(), $enclos->getType()]);
    }

    public function showAnimals(){

        include './config/db.php';

        $recup= $db->prepare("SELECT * FROM animals");
        $recup->execute();
        $animalsData = $recup->fetchAll();
        //pour chaque donnés d'animal on retourne un animal
        $animals = [];
        foreach ($animalsData as $data) {

            $animal = Animal::getSpecie($data);

            array_push($animals, $animal);

        }
        return $animals;
    }

    public function showEnclos(){

        include './config/db.php';
        // On récupère les données des enclos_
        $recup= $db->prepare("SELECT * FROM enclos");
        $recup->execute();
        $enclosData = $recup->fetchAll();
        //pour chaque donnés d'animal on retourne un animal
        $enclos = [];
        foreach ($enclosData as $data) {
            // Pour chaque enclos, on récupère les données des animaux
            $recup= $db->prepare("SELECT * FROM animals WHERE enclos_id = '".$data['id']."'");
            $recup->execute();
            $animalsData = $recup->fetchAll();
            $data['animals'] = $animalsData;
            $enclosSimple = Enclos::getSubType($data);

            array_push($enclos, $enclosSimple);
        }
        return $enclos;
    }


}

?>