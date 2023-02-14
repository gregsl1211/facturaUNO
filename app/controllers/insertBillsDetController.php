<?php
require_once "../models/billsModel.php";

$factDataDet = array(
    'id_producto' => $_POST['id_producto'],
    'id_factura' => $_POST['id_factura'],
    'cantidad' => $_POST['cantidad'],
    'totalImpProd' => $_POST['totalImpProd'],
    'totalProd' => $_POST['totalProd'],
);

echo json_encode(Factura::insertBillsDet($factDataDet));
