<?php
require_once "../models/billsModel.php";

$factData = array(
    'id_cliente' => $_POST['id_cliente'],
    'monto_total' => $_POST['monto_total'],
    'monto_impuesto_total' => $_POST['monto_impuesto_total'],
);

echo json_encode(Factura::insertBillsEnc($factData));
