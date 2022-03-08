<?php


class Employee{

public function createAnimal($animal){

    include './config/db.php';
    $req = $db->prepare("INSERT INTO animals (name, type, size, weight, age) VALUES (?,?,?,?,?)");
    $req->execute([$animal->name, $animal->getType(), $animal->getSize(), $animal->weight, $animal->age]);

}
public function createEnclos($enclos){

    include './config/db.php';
    $req = $db->prepare("INSERT INTO enclos (name, type) VALUES (?,?)");
    $req->execute([$enclos->name, $enclos->type]);


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

    $recup= $db->prepare("SELECT * FROM enclos");
    $recup->execute();
    $enclosData = $recup->fetchAll();
    //pour chaque donnés d'animal on retourne un animal
    $enclos = [];
    foreach ($enclosData as $data) {

        $enclosSimple = Enclos::getSubType($data);

        array_push($enclos, $enclosSimple);

    }
    return $enclos;
}


}

?>