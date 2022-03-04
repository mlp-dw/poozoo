<?php

include '../config/autoload.php';
$data = array(
    'name'=> $_POST['paddock-name'],
    'type'=> $_POST['paddock-type'],
);
switch ($data['type']) {
    case 'normal':
    $paddock = new Normal($data);
        break;
    case 'aviary':
    $paddock = new Aviary($data);
        break;
    case 'marine':
    $paddock = new Marine($data);
        break;
        
}
$employee = new Employee;

$employee->createPaddock($paddock);
