<?php
require_once "../models/productModel.php";
$prodData = array(
    'nombre' => $_POST['nombre'],
    'descripcion' => $_POST['descripcion'],
    'precio_compra' => $_POST['precio_compra'],
    'precio_venta' => $_POST['precio_venta'],
    'tasa_impuesto' => $_POST['tasa_impuesto']

);
echo json_encode(Producto::insertProduct($prodData));
