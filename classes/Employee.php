<?php


class Employee{

public function createAnimal($animal){

    include '../config/db.php';
    $req = $db->prepare("INSERT INTO animals (name, type, size, weight, age, paddock_id) VALUES (?,?,?,?,?,?)");
    $req->execute([$animal->name, $animal->getType(), $animal->size, $animal->weight, $animal->age, $animal->paddockId]);

    // $animalId = $db->lastInsertId();

    // $paddockChoice = $db->prepare("INSERT INTO paddocks (type, id) VALUES (?, ?)");
    // $paddockChoice->execute($animal-> $qqch, $animalId]);

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

// public function putAnimalInPaddock($animal){
//     include './config/db.php';
//     $request = $db->prepare("SELECT * FROM animals WHERE paddock_id = ?");
//     $request->execute([$animal->id]);
// }

    // public function countAnimals(){
    //     include './config/db.php';
    //     $req = $db->prepare("SELECT COUNT(*) FROM animals WHERE paddock-id = ?");
    //     $req->execute();
    //     $countData = $req->fetchAll();

    //     $counts = [];
    //     foreach ($countData as $data) {

    //         if($data < 7){
    //             echo "Vous avez atteinds le nombre maximum d'animaux pour cet enclos";
    //         }
            
            

    //         array_push($counts, $count);

    //     }
    //     return $counts;

    // }




}

?>