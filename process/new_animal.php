<?php

include '../config/autoload.php';
$data = array(
    'name'=> $_POST['animal-name'],
    'age'=> $_POST['animal-age'],
    'type'=> $_POST['animal-specie'],
    'size'=> $_POST['animal-size'],
    'weight'=> $_POST["animal-weight"],
    'paddock_id'=> $_POST["paddock-id"]
);
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

$employee = new Employee;
$employee->createAnimal($animal);

header("Location: ../index.php");
