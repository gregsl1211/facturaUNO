<?php
require "../models/clientModel.php";
echo json_encode(Client::getAllClients());
