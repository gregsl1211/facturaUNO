<?php
require "../models/clientModel.php";
echo json_encode(Client::getClientById($_POST["clientId"]));
