<?php
require_once "../models/clientModel.php";
$clientData = array(
    'nombres' => $_POST['nombres'],
    'email' => $_POST['email'],
    'edad' => $_POST['edad'],
    'direccion' => $_POST['direccion']
);

echo json_encode(Client::insertClient($clientData));
