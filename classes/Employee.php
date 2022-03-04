<?php


class Employee{

public function createAnimal($animal){

    include '../config/db.php';
    $req = $db->prepare("INSERT INTO animals (name, type, size, weight, age) VALUES (?,?,?,?,?)");
    $req->execute([$animal->name, $animal->getType(), $animal->size, $animal->weight, $animal->age]);


}
public function showAnimals(){

    include './config/db.php';

    $recup= $db->prepare("SELECT * FROM animals");
    $recup->execute();
    $animalsData = $recup->fetchAll();
    //pour chaque donnés d'animal on retourne un animal
    $animals = [];
    foreach ($animalsData as $data) {

        switch ($data['type']) {
            case 'tiger':
                $animal = new Tiger($data);
                break;

            case 'fish':
                $animal = new Fish($data);
                break;

            case 'eagle':
                $animal = new Eagle($data);
                break;

            case 'bear':
                $animal = new Bear($data);
                break;

        }

        array_push($animals, $animal);

    }
    return $animals;
}
/////////////////////////////////////////////////////////////////////
//PADDOCK

public function createPaddock($paddock){

    include '../config/db.php';
    $req = $db->prepare("INSERT INTO paddocks (name, type) VALUES (?,?)");
    $req->execute([$paddock->name, $paddock->getType()]);

}

public function showPaddocks(){

    include './config/db.php';

    $recup= $db->prepare("SELECT * FROM paddocks");
    $recup->execute();
    $paddocksData = $recup->fetchAll();
    //pour chaque donnés d'animal on retourne un animal
    $paddocks = [];
    foreach ($paddocksData as $data) {

        switch ($data['type']) {
            case 'aviary':
                $paddock = new Aviary($data);
                break;

            case 'marine':
                $paddock = new Marine($data);
                break;

            case 'normal':
                $paddock = new Normal($data);
                break;
        }

        array_push($paddocks, $paddock);

    }
    return $paddocks;
}




}

?>