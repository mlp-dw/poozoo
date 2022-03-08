<?php

include './config/autoload.php';
$data = array(
    'name'=> $_POST['animal-name'],
    'size'=> $_POST['animal-size'],
    'age'=> $_POST['animal-age'],
    'weight'=> $_POST["animal-weight"],
    'type'=> $_POST['animal-specie']
);

$animal = Animal::getSpecie($data);

$employee = new Employee;

$employee->createAnimal($animal);
