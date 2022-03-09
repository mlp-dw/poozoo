<?php


class Employee{

    // public $id;
    // public $name;
    // public $age;
    // public $gender;
    
    // function __construct($data){
    //     $this->hydrate($data);
    // }
    
    // private function hydrate($data) {
    //     $this->id = $data['id'] ?? null;
    //     $this->name = $data['name'] ;
    //     $this->age = $data['age'] ;
    //     $this->gender = $data['gender'] ;
    // }
    
    // public function persist(){
    //     $database = new Database();
    //     $database->updateRow('employee', $this->id, $this->toSql());
    // }
    
    // public function toSql() {
    //     return array(
    //         'id' => $this->id,
    //         'name' => $this->name,
    //         'age' => $this->age,
    //         'gender' => $this->gender,
    //     );
    // }
    
    // public function getId() {
    //     return $this->id;
    // }
    // public function setId($id) {
    //     $this->id = $id;
    // }
    
    // public function getName() {
    //     return $this->name;
    // }
    // public function setName($name) {
    //     $this->name = $name;
        
    //     $this->persist();
    // }
    
    // public function getAge() {
    //     return $this->age;
    // }
    // public function setAge($age) {
    //     $this->age = $age;
    // }
    
    // public function getGender() {
    //     if($this->gender == 0){
    //         return "Femme";
    //     }else{
    //         return "Homme";
    //     }
    // }
    // public function setGender($gender) {
    //     $this->gender = $gender;
    // }
    
    // public function getEmployeeDetails(){
    //     include './config/db.php';
    
    //     $recup= $db->prepare("SELECT * FROM employees");
    //     $recup->execute();
    //     $employees = $recup->fetchAll();
    //     return $employees;
    // }

    public function scanEclos(){
        //affiche les aniamux contenu dans l'enclos et leur caractéristique

    }
    public function getCountAnimalsZoo(){
        include './config/db.php';

        $count= $db->prepare("SELECT COUNT(*) FROM animals");
        $count->execute();
        $countAnimals = $count->fetch();
        return $countAnimals;
    }

    public function cleanEnclos($animals){
        //nettoie l'enclos s'il est sale et vide
        $dirty = Enclos::$CLEANSTATE_DIRTY;
        $correct = Enclos::$CLEANSTATE_CORRECT;
        $clean = Enclos::$CLEANSTATE_CLEAN;

        if($animals->getAnimalsCount() == 0 && $dirty || $correct){
            return $clean;
        }else {
            echo '<script>alert("Votre enclos doit être vide pour le nettoyer !")</script>';
        }
        
        
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
    

    public function createAnimal($animal, Enclos $enclos){

        include './config/db.php';
        if ($enclos->isAnimalCompatible($animal) && $enclos->getAnimalsCount()<6) {
            $req = $db->prepare("INSERT INTO animals (name, type, size, weight, age, enclos_id) VALUES (?,?,?,?,?,?)");
            $req->execute([$animal->name, $animal->getType(), $animal->getSize(), $animal->weight, $animal->age, $animal->getEnclosId()]);
        }else{
            throw new Exception("Vous ne pouvez plus ajouter d'animaux ou ils ne sont pas de la même espèces.");
        }
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

    public function selectAnimal($idAnimal){
        include './config/db.php';
        $recup= $db->prepare("SELECT * FROM animals WHERE id = ?");
        $recup->execute([$idAnimal]);
        $animalData = $recup->fetch();
        return Animal::getSpecie($animalData);
    }
    public function selectEnclos($idEnclos){
        include './config/db.php';
        $recup= $db->prepare("SELECT * FROM enclos WHERE id = ?");
        $recup->execute([$idEnclos]);
        $enclosData = $recup->fetch();
        // Pour chaque enclos, on récupère les données des animaux
        $recup= $db->prepare("SELECT * FROM animals WHERE enclos_id = '".$enclosData['id']."'");
        $recup->execute();
        $animalsData = $recup->fetchAll();
        $enclosData['animals'] = $animalsData;
        $enclosSimple = Enclos::getSubType($enclosData);
        return $enclosSimple;
        
    }

}

?>